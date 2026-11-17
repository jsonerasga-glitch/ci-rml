<?php

namespace App\Controllers;

use App\Libraries\CertificateQr;

/**
 * Administrative KPI dashboard.
 *
 * index() renders the page; data() returns one normalised JSON payload
 * (worksheets, QR verifications, reference standards). All KPI maths is done
 * in the browser by public/js/kpi-v1.0.js so the page can be filtered without
 * further requests.
 */
class KpiController extends BaseController
{
	/** Module key (same keys as CertificateQr::MODULES) => worksheet table. */
	private const WORKSHEET_TABLES = [
		'electronicBalance'     => 'electronicbalancetable',
		'thermohygrometer'      => 'thermotable',
		'testWeight'            => 'testweighttable',
		'weighingScale'         => 'weighingscaletable',
		'digitalThermometer'    => 'digitalthermometertable',
		'digitalTimer'          => 'digitaltimertable',
		'pressureGauge'         => 'pressuregaugetable',
		'pHMeter'               => 'phmetertable',
		'glassware'             => 'glasswaretable',
		'temperatureController' => 'temperaturecontrollertable',
		'enclosure'             => 'enclosuretable',
		'refractometer'         => 'refractometertable',
		'caliper'               => 'calipertable',
		'electricalMeter'       => 'electricalmetertable',
	];

	/**
	 * Reference standard tables => [type label, description col, serial col,
	 * certificate col, calibration-date col, next-calibration col|null].
	 * When no next-calibration date is stored, the due date is calibration
	 * date + 1 year (the same rule the worksheet standard pickers use).
	 */
	private const STANDARD_TABLES = [
		'thermostandardtable'                  => ['Thermometer / Hygrometer', 'standard', 'serialNumber', 'certificateNumber', 'dateOfCali', 'dateOfNextCali'],
		'balancestandard'                      => ['Balance', 'description', 'balance', 'certificateNumber', 'dateCalibrated', null],
		'standard_balance'                     => ['Balance (new)', 'description', 'serialNumber', 'certificateNumber', 'dateCalibrated', null],
		'testweightstandarddetails'            => ['Test Weight', 'description', 'serialNumber', 'certificateNumber', 'dateOfCalibration', null],
		'barometerstandard'                    => ['Barometer', 'description', 'serialNumber', 'certificateNumber', 'dateOfCalibration', null],
		'buffersolutionstandard'               => ['Buffer Solution', 'description', 'pHValue', 'certificateNumber', 'dateOfCalibration', null],
		'digitaltimerstandard'                 => ['Timer', 'description', 'serialNumber', 'certificateNumber', 'dateOfCalibration', null],
		'documentingprocesscalibratorstandard' => ['Process Calibrator', 'description', 'serialNumber', 'certificateNumber', 'dateOfCalibration', null],
		'multiproductcalibratorstandard'       => ['Multi-Product Calibrator', 'description', 'serialNumber', 'certificateNumber', 'dateOfCalibration', null],
		'pressuregaugestandarddetails'         => ['Pressure', 'standardDescription', 'serialNumber', 'calibrationCertificate', 'dateOfCalibration', null],
		'standard_gaugeblock'                  => ['Gauge Block', 'description', 'serialNumber', 'certificateNumber', 'dateOfCalibration', null],
		'temperaturerecorder'                  => ['Temperature Recorder', 'description', 'serialNumber', 'certificateNumber', 'dateOfCalibration', null],
		'wirelesstemperaturelogger'            => ['Wireless Temperature Logger', 'description', 'serialNumber', 'certificateNumber', 'dateOfCalibration', null],
	];

	public function index()
	{
		return view('Kpi/kpiDashboard');
	}

	public function data()
	{
		$db = \Config\Database::connect();

		return $this->response->setJSON([
			'generatedAt'   => date('Y-m-d H:i:s'),
			'modules'       => array_map(static fn ($m) => $m[0], CertificateQr::MODULES),
			'worksheets'    => $this->worksheets($db),
			'verifications' => $this->verifications($db),
			'standards'     => $this->standards($db),
		]);
	}

	private function worksheets($db): array
	{
		$rows = [];

		foreach (self::WORKSHEET_TABLES as $module => $table) {
			if (! $db->tableExists($table)) {
				continue;
			}
			$fields = $db->getFieldNames($table);
			$has    = static fn ($f) => in_array($f, $fields, true);

			// Only select what the KPIs need; the JSON blobs below are small,
			// dataInputs / calculatedData are not loaded.
			$want = ['id', 'tsrID', 'certificateNumber', 'completion', 'calibrationOfficer', 'checkedBy',
				'verifierEmail', 'calibratorAccountEmail', 'customerInfo', 'equipmentInfo', 'comments',
				'dateOfIssue', 'dateTimeCalibrated',
				// legacy flat columns used as fall-backs
				'customer', 'address', 'tsrNumber', 'dateReceived', 'dateCalibrated', 'recommendedDueDate',
				'placeOfCalibration', 'equipmentDescription', 'equipmentID', 'serialNumber'];
			$select = array_values(array_filter($want, $has));

			foreach ($db->table($table)->select(implode(',', $select))->get()->getResultArray() as $r) {
				$ci = json_decode($r['customerInfo'] ?? '', true) ?: [];
				$ei = json_decode($r['equipmentInfo'] ?? '', true) ?: [];

				$pick = static function (array $sources, array $keys) {
					foreach ($sources as $src) {
						foreach ($keys as $k) {
							if (isset($src[$k]) && is_scalar($src[$k]) && trim((string) $src[$k]) !== '') {
								return trim((string) $src[$k]);
							}
						}
					}

					return '';
				};

				// Submit stores {"ids":[],"comment":""}; a verifier's return adds
				// highlighted field ids and/or remarks. Only the latter means "returned".
				$comments = trim((string) ($r['comments'] ?? ''));
				$parsed   = json_decode($comments, true);
				if (is_array($parsed)) {
					$returned = ! empty($parsed['ids']) || trim((string) ($parsed['comment'] ?? '')) !== '';
				} else {
					$returned = ! in_array($comments, ['', '[]', '{}', 'null'], true);
				}

				$rows[] = [
					'module'             => $module,
					'id'                 => (int) $r['id'],
					'certificateNumber'  => $pick([$r, $ei], ['certificateNumber']),
					'tsrNumber'          => $pick([$ci, $r], ['tsrNumber', 'tsrID']),
					'customer'           => $pick([$ci, $r], ['customer']),
					'address'            => $pick([$ci, $r], ['address']),
					'dateReceived'       => $this->date($pick([$ci, $r], ['dateReceived'])),
					'dateCalibrated'     => $this->date($pick([$ei, $r], ['dateCalibrated'])),
					'recommendedDueDate' => $this->date($pick([$ci, $r], ['recommendedDueDate'])),
					'dateOfIssue'        => $this->date($r['dateOfIssue'] ?? ''),
					'lastSaved'          => $r['dateTimeCalibrated'] ?? null,
					'placeOfCalibration' => $pick([$ei, $r], ['placeOfCalibration']),
					'equipmentDescription' => $pick([$ei, $r], ['equipmentDescription', 'description']),
					'equipmentId'        => $pick([$ei, $r], ['equipmentId', 'equipmentID', 'equipmentNumber']),
					'serialNumber'       => $pick([$ei, $r], ['serialNumber']),
					'status'             => trim((string) ($r['completion'] ?? '')) ?: 'Pending',
					'calibrationOfficer' => trim((string) ($r['calibrationOfficer'] ?? '')),
					'checkedBy'          => trim((string) ($r['checkedBy'] ?? '')),
					// Correction remarks are kept after resubmission, so remarks or
					// highlighted fields mean the worksheet was returned at least once.
					'returned'           => $returned,
				];
			}
		}

		return $rows;
	}

	private function verifications($db): array
	{
		if (! $db->tableExists('certificate_verifications')) {
			return [];
		}

		return array_map(static fn ($r) => [
			'module'            => $r['module'],
			'recordId'          => (int) $r['record_id'],
			'certificateNumber' => $r['certificate_number'],
			'isDraft'           => (bool) $r['is_draft'],
			'scanCount'         => (int) $r['scan_count'],
			'lastScannedAt'     => $r['last_scanned_at'],
			'createdAt'         => $r['created_at'],
		], $db->table('certificate_verifications')
			->select('module, record_id, certificate_number, is_draft, scan_count, last_scanned_at, created_at')
			->get()->getResultArray());
	}

	private function standards($db): array
	{
		$out = [];

		foreach (self::STANDARD_TABLES as $table => [$type, $descCol, $serialCol, $certCol, $calCol, $nextCol]) {
			if (! $db->tableExists($table)) {
				continue;
			}
			$fields = $db->getFieldNames($table);

			foreach ($db->table($table)->get()->getResultArray() as $r) {
				$cal  = $this->date($r[$calCol] ?? '');
				$next = $nextCol ? $this->date($r[$nextCol] ?? '') : '';
				if ($next === '' && $cal !== '') {
					$next = date('Y-m-d', strtotime($cal . ' +1 year'));
				}

				$out[] = [
					'type'              => $type,
					'table'             => $table,
					'id'                => (int) ($r['id'] ?? 0),
					'description'       => trim((string) ($r[$descCol] ?? '')),
					'serialNumber'      => trim((string) ($r[$serialCol] ?? '')),
					'certificateNumber' => trim((string) ($r[$certCol] ?? '')),
					'dateCalibrated'    => $cal,
					'dueDate'           => $next,
					'active'            => ! in_array('status', $fields, true) || strtolower((string) $r['status']) !== 'inactive',
				];
			}
		}

		return $out;
	}

	/** Normalises the free-text date columns to Y-m-d, or '' when unusable. */
	private function date($value): string
	{
		$value = trim((string) $value);
		if ($value === '' || str_starts_with($value, '0000')) {
			return '';
		}
		$ts = strtotime($value);
		if ($ts === false) {
			return '';
		}
		$year = (int) date('Y', $ts);

		return ($year < 1990 || $year > 2100) ? '' : date('Y-m-d', $ts);
	}
}
