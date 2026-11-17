<?php

namespace App\Libraries;

/**
 * Shared logic for customer calibration requests (customer portal + staff queue):
 * request numbers, the stage of each item derived from its worksheet, the
 * overall request status, and creating a worksheet from a request item.
 *
 * Item stages follow systemFlow.png:
 *   0 Submitted  1 In queue  2 Calibration  3 Verification  4 Approved  5 Certificate released
 */
class CalibrationRequests
{
	public const STAGES = ['Submitted', 'In queue', 'Calibration', 'Verification', 'Approved', 'Certificate released'];

	/** Worksheet table and model per module key (same keys as CertificateQr::MODULES). */
	public const WORKSHEETS = [
		'electronicBalance' => ['table' => 'electronicbalancetable', 'model' => \App\Models\ElectronicBalanceModel::class, 'path' => 'electronicBalance'],
		'thermohygrometer'  => ['table' => 'thermotable', 'model' => \App\Models\ThermoModel::class, 'path' => 'thermohygrometer'],
		'testWeight'        => ['table' => 'testweighttable', 'model' => \App\Models\TestWeightModel::class, 'path' => 'testWeight'],
	];

	/** Calibration processes a customer can request: the enabled modules that have a worksheet mapping. */
	public static function processes(): array
	{
		$out = [];
		foreach (config('CalibrationModules')->visible() as $key => $m) {
			if (isset(self::WORKSHEETS[$key])) {
				$out[$key] = $m['label'];
			}
		}

		return $out;
	}

	public static function processLabel(string $module): string
	{
		$cat = config('CalibrationModules')->catalog;

		return $cat[$module]['label'] ?? $module;
	}

	public static function nextRequestNo(): string
	{
		$db     = \Config\Database::connect();
		$prefix = 'CR-' . date('Y') . '-';
		$last   = $db->table('calibration_requests')->select('request_no')->like('request_no', $prefix, 'after')
			->orderBy('id', 'DESC')->get(1)->getRowArray();
		$n = $last ? ((int) substr($last['request_no'], strlen($prefix))) + 1 : 1;

		return $prefix . str_pad((string) $n, 4, '0', STR_PAD_LEFT);
	}

	/**
	 * Loads items with their worksheet status attached:
	 * worksheet (array|null), stage (int), stageLabel, note, certificateReady (bool).
	 */
	public static function itemsWithProgress(array $request): array
	{
		$db    = \Config\Database::connect();
		$items = $db->table('calibration_request_items')->where('request_id', $request['id'])->orderBy('id')->get()->getResultArray();

		foreach ($items as &$item) {
			$item['processLabel']     = self::processLabel($item['module']);
			$item['worksheet']        = null;
			$item['certificateReady'] = false;
			$item['note']             = '';

			if ($item['worksheet_id'] && isset(self::WORKSHEETS[$item['module']])) {
				$item['worksheet'] = $db->table(self::WORKSHEETS[$item['module']]['table'])
					->select('id, completion, certificateNumber, dateOfIssue, comments')
					->where('id', $item['worksheet_id'])->get()->getRowArray();
			}

			if ($request['status'] === 'Cancelled') {
				$item['stage'] = 0;
				$item['note']  = 'Request cancelled';
			} elseif ($request['status'] === 'Submitted') {
				$item['stage'] = 0;
				$item['note']  = 'Waiting for the laboratory to receive the request';
			} elseif (! $item['worksheet']) {
				$item['stage'] = 1;
				$item['note']  = 'Received; waiting for calibration';
			} else {
				switch ($item['worksheet']['completion']) {
					case 'For Verification':
						$item['stage'] = 3;
						$item['note']  = 'Results under verification';
						break;
					case 'For printing':
						$released                 = CertificateQr::issuedFile($item['module'], (int) $item['worksheet_id']) !== null;
						$item['stage']            = $released ? 5 : 4;
						$item['certificateReady'] = $released;
						$item['note']             = $released ? 'Certificate available for download' : 'Approved; certificate being prepared for release';
						break;
					case 'For Correction':
						$item['stage'] = 2;
						$item['note']  = 'Returned by the verifier for correction';
						break;
					default:
						$item['stage'] = 2;
						$item['note']  = 'Calibration in progress';
				}
			}
			$item['stageLabel'] = self::STAGES[$item['stage']];
		}

		return $items;
	}

	/** Overall request status shown to customers and staff. */
	public static function displayStatus(array $request, array $items): string
	{
		if (in_array($request['status'], ['Submitted', 'Cancelled'], true)) {
			return $request['status'];
		}
		if ($items && min(array_column($items, 'stage')) >= 4) {
			return 'Completed';
		}
		if ($items && max(array_column($items, 'stage')) >= 2) {
			return 'In progress';
		}

		return 'Received';
	}

	public static function statusBadge(string $status): string
	{
		$cls = [
			'Submitted' => 'bg-secondary', 'Received' => 'bg-info text-dark', 'In progress' => 'bg-warning text-dark',
			'Completed' => 'bg-success', 'Cancelled' => 'bg-dark',
			'In queue' => 'bg-info text-dark', 'Calibration' => 'bg-warning text-dark', 'Verification' => 'bg-primary',
			'Approved' => 'bg-success', 'Certificate released' => 'bg-success',
		][$status] ?? 'bg-secondary';

		return '<span class="badge ' . $cls . '">' . esc($status) . '</span>';
	}

	/**
	 * Creates the module worksheet for a request item (the same way the TSR/ULIMS
	 * import does: a row holding only customerInfo + equipmentInfo) and links it.
	 * Returns the worksheet id.
	 */
	public static function createWorksheet(array $request, array $item): int
	{
		$cfg = self::WORKSHEETS[$item['module']] ?? null;
		if (! $cfg) {
			throw new \InvalidArgumentException('No worksheet for module ' . $item['module']);
		}

		$received = substr((string) ($request['received_at'] ?: date('Y-m-d')), 0, 10);
		$place    = $request['place_of_calibration'] === 'On-site' ? 'On-site' : '';

		$customerInfo = [
			'customer'     => $request['company'],
			'address'      => $request['address'],
			'tsrNumber'    => $request['request_no'],
			'dateReceived' => $received,
		];

		// Keys are the input ids of each worksheet form (the page fills inputs by id).
		if ($item['module'] === 'testWeight') {
			$equipmentInfo = [
				'equipmentDescription' => $item['equipment_description'],
				'manufacturer'         => $item['manufacturer'],
				'model'                => $item['model'],
				'serialNumber'         => $item['serial_number'],
				'equipmentID'          => $item['equipment_id'],
				'placeOfCalibration'   => $place,
			];
		} else {
			$equipmentInfo = [
				'equipmentDescription' => $item['equipment_description'],
				'manufacturer'         => $item['manufacturer'],
				'modelNumber'          => $item['model'],
				'serialNumber'         => $item['serial_number'],
				'equipmentId'          => $item['equipment_id'],
				'placeOfCalibration'   => $place,
			];
		}
		$equipmentInfo = array_map(static fn ($v) => (string) $v, $equipmentInfo);

		$model = new $cfg['model']();
		$model->insert([
			'customerInfo'   => json_encode($customerInfo, JSON_UNESCAPED_UNICODE),
			'equipmentInfo'  => json_encode($equipmentInfo, JSON_UNESCAPED_UNICODE),
			// Empty JSON instead of NULL: the worksheet scripts JSON.parse these
			// on load and fail on null (SREB expects a results array). Empty
			// values still count as "no calibration data" for certificates.
			'environmentInfo' => '{}',
			'dataInputs'      => '{}',
			'calculatedData'  => $item['module'] === 'electronicBalance' ? '[]' : '{}',
			'completion'      => 'Pending',
		]);
		$worksheetId = (int) $model->getInsertID();

		\Config\Database::connect()->table('calibration_request_items')->where('id', $item['id'])->update([
			'worksheet_id'         => $worksheetId,
			'worksheet_created_at' => date('Y-m-d H:i:s'),
		]);

		return $worksheetId;
	}

	public static function worksheetUrl(string $module, int $id): string
	{
		return base_url(self::WORKSHEETS[$module]['path'] . '/worksheet/' . $id);
	}
}
