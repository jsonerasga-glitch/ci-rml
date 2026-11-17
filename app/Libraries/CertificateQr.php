<?php

namespace App\Libraries;

use App\Models\CertificateVerificationModel;
use chillerlan\QRCode\Common\EccLevel;
use chillerlan\QRCode\Output\QROutputInterface;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

/**
 * Issues a unique verification token for every generated certificate PDF
 * (actual and draft) and renders it as a QR code pointing at the public
 * verification page.
 */
class CertificateQr
{
	/**
	 * Module key => [display name, model class used by the module's generateReport()].
	 */
	public const MODULES = [
		'electronicBalance'     => ['Electronic Balance', \App\Models\ElectronicBalanceModel::class],
		'thermohygrometer'      => ['Thermo-Hygrometer', \App\Models\ThermoModel::class],
		'testWeight'            => ['Test Weight', \App\Models\TestWeightModel::class],
		'weighingScale'         => ['Weighing Scale', \App\Models\WeighingScaleModel::class],
		'digitalThermometer'    => ['Digital Thermometer', \App\Models\DigitalThermometerModel::class],
		'digitalTimer'          => ['Digital Timer', \App\Models\DigitalTimerModel::class],
		'pressureGauge'         => ['Pressure Gauge', \App\Models\PressureGaugeModel::class],
		'pHMeter'               => ['pH Meter', \App\Models\PHMeterModel::class],
		'glassware'             => ['Volumetric Glassware', \App\Models\GlasswareModel::class],
		'temperatureController' => ['Temperature Controller', \App\Models\TemperatureControllModel::class],
		'enclosure'             => ['Enclosure', \App\Models\EnclosureModel::class],
		'refractometer'         => ['Refractometer', \App\Models\RefractometerModel::class],
		'caliper'               => ['Caliper / Micrometer', \App\Models\CaliperModel::class],
		'electricalMeter'       => ['Electrical Meter', \App\Models\ElectricalMetersModel::class],
	];

	/** Columns that change without changing what is printed on the certificate. */
	private const VOLATILE_COLUMNS = ['created_at', 'updated_at', 'deleted_at'];

	/**
	 * Registers a verification token for the certificate about to be rendered and
	 * adds `$data['certificateQr']` for the certificate view.
	 *
	 * If anything goes wrong the error is logged and the certificate is still
	 * generated, just without the QR code.
	 *
	 * @param array  $data      The data array passed to the certificate view.
	 * @param string $module    A key of self::MODULES.
	 * @param string $recordKey The key in $data that holds the certificate's DB row.
	 */
	public static function attach(array $data, string $module, string $recordKey = 'dataFromDB'): array
	{
		$data['certificateQr'] = null;
		$record = $data[$recordKey] ?? null;

		if (! is_array($record) || empty($record['id']) || ! isset(self::MODULES[$module])) {
			return $data;
		}

		try {
			$isDraft = self::isDraft($record, $data['imageDraft'] ?? null);
			$token   = bin2hex(random_bytes(16));

			(new CertificateVerificationModel())->insert([
				'token'              => $token,
				'module'             => $module,
				'record_id'          => (int) $record['id'],
				'certificate_number' => $record['certificateNumber'] ?? null,
				'is_draft'           => $isDraft ? 1 : 0,
				'data_hash'          => self::hashRecord($record),
				'snapshot'           => json_encode(self::snapshot($record)),
				'generated_by'       => session()->get('id') ?: null,
				'scan_count'         => 0,
				'created_at'         => self::now(),
			]);

			$url = site_url('certificate/verify/' . $token);

			$data['certificateQr'] = [
				'url'     => $url,
				'image'   => self::render($url),
				'isDraft' => $isDraft,
			];
		} catch (\Throwable $e) {
			log_message('error', 'Certificate QR code could not be created for {module} #{id}: {message}', [
				'module'  => $module,
				'id'      => $record['id'],
				'message' => $e->getMessage(),
			]);
		}

		return $data;
	}

	/**
	 * Keeps a copy of a FINAL certificate PDF when staff generate it, so the
	 * customer portal can serve exactly what the laboratory released (including
	 * the browser-drawn chart that cannot be re-created on the server).
	 * Drafts are never stored. Failures are logged and never block printing.
	 *
	 * @param array $data The view data after attach() (holds certificateQr + the record).
	 */
	public static function storeIssued(string $module, array $data, string $recordKey, string $pdf): void
	{
		$record = $data[$recordKey] ?? null;
		$qr     = $data['certificateQr'] ?? null;
		if (! is_array($record) || empty($record['id']) || $pdf === '') {
			return;
		}
		if (self::isDraft($record, $data['imageDraft'] ?? null) || (is_array($qr) && ! empty($qr['isDraft']))) {
			return;
		}

		try {
			$dir = self::issuedDir();
			if (! is_dir($dir)) {
				mkdir($dir, 0775, true);
			}
			file_put_contents($dir . $module . '-' . (int) $record['id'] . '.pdf', $pdf);
		} catch (\Throwable $e) {
			log_message('error', 'Issued certificate could not be stored for {module} #{id}: {message}', [
				'module' => $module, 'id' => $record['id'], 'message' => $e->getMessage(),
			]);
		}
	}

	/** Path of the stored final certificate, or null if none was released yet. */
	public static function issuedFile(string $module, int $recordId): ?string
	{
		$file = self::issuedDir() . $module . '-' . $recordId . '.pdf';

		return is_file($file) ? $file : null;
	}

	/** Inside writable/uploads so it lives on the Docker uploads volume. */
	private static function issuedDir(): string
	{
		return WRITEPATH . 'uploads/certificates/';
	}

	/**
	 * Mirrors the watermark rule used by the certificate views.
	 */
	public static function isDraft(array $record, $imageDraft): bool
	{
		$flag = strtolower(trim((string) $imageDraft));

		return in_array($flag, ['1', 'true'], true) || ($record['completion'] ?? '') !== 'For printing';
	}

	public static function hashRecord(array $record): string
	{
		foreach (self::VOLATILE_COLUMNS as $column) {
			unset($record[$column]);
		}
		ksort($record);

		return hash('sha256', json_encode($record));
	}

	/**
	 * The details that are printed on the certificate, frozen at print time so
	 * the person scanning can compare them with the paper copy.
	 */
	public static function snapshot(array $record): array
	{
		$customer  = self::decode($record['customerInfo'] ?? null);
		$equipment = self::decode($record['equipmentInfo'] ?? ($record['specificationData'] ?? null));

		$dateOfIssue = ! empty($record['dateOfIssue'])
			? $record['dateOfIssue']
			: (new \DateTime('now', new \DateTimeZone('Asia/Manila')))->format('Y-m-d');

		return [
			'certificateNumber'  => $record['certificateNumber'] ?? null,
			'customer'           => $customer['customer'] ?? ($record['customer'] ?? null),
			'address'            => $customer['address'] ?? ($record['address'] ?? null),
			'equipment'          => $equipment['equipmentDescription'] ?? ($equipment['equipmentType'] ?? null),
			'manufacturer'       => $equipment['manufacturer'] ?? null,
			'modelNumber'        => $equipment['modelNumber'] ?? null,
			'serialNumber'       => $equipment['serialNumber'] ?? null,
			'dateCalibrated'     => $equipment['dateCalibrated'] ?? ($record['dateCalibrated'] ?? null),
			'dateOfIssue'        => $dateOfIssue,
			'calibrationOfficer' => $record['calibrationOfficer'] ?? null,
		];
	}

	public static function render(string $url): string
	{
		$options = new QROptions([
			'outputType'   => QROutputInterface::MARKUP_SVG,
			'eccLevel'     => EccLevel::M,
			'addQuietzone' => true,
			'quietzoneSize' => 2,
			'outputBase64' => true,
			'svgAddXmlHeader' => true,
			'connectPaths' => true,
			'drawLightModules' => false,
		]);

		return (new QRCode($options))->render($url);
	}

	public static function now(): string
	{
		return (new \DateTime('now', new \DateTimeZone('Asia/Manila')))->format('Y-m-d H:i:s');
	}

	private static function decode($value): array
	{
		if (is_array($value)) {
			return $value;
		}
		if (! is_string($value) || $value === '') {
			return [];
		}
		$decoded = json_decode($value, true);

		return is_array($decoded) ? $decoded : [];
	}
}
