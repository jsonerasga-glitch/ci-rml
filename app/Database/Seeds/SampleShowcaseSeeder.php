<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Showcase / demo data for the three enabled modules
 * (Single Range Electronic Balance, Thermohygrometer, Test Weights).
 *
 *   php spark db:seed SampleShowcaseSeeder
 *
 * Adds, per module, three worksheets at different workflow stages:
 *   SAMPLE-…-001  For printing      verified, Date of Issue set -> final certificate
 *   SAMPLE-…-002  For Verification  submitted, waiting in the verifier's queue
 *   SAMPLE-…-003  Pending           draft worksheet (draft certificate only)
 * plus a "(Sample Data)" customer and three login accounts:
 *   sample.officer@rml.local   / Sample@2026   staff  (/adminLogin)
 *   sample.verifier@rml.local  / Sample@2026   staff  (/adminLogin)
 *   sample.customer@rml.local  / Sample@2026   customer portal (/customer/login)
 * and four customer-portal requests that follow systemFlow.png:
 *   CR-SAMPLE-2026-0001  Completed     (the -001 worksheets, approved)
 *   CR-SAMPLE-2026-0002  In progress   (the -002 worksheets, under verification)
 *   CR-SAMPLE-2026-0003  In progress   (the -003 worksheets, calibration)
 *   CR-SAMPLE-2026-0004  Submitted     (new, waiting in the staff queue)
 *
 * All names, addresses, serial numbers and certificate numbers are fictitious.
 * Re-running replaces the previous sample data; real records are never touched
 * (everything is matched on the SAMPLE- / "(Sample Data)" / @rml.local markers).
 */
class SampleShowcaseSeeder extends Seeder
{
	public const PASSWORD = 'Sample@2026';
	public const CUSTOMER_EMAIL = 'sample.customer@rml.local';

	public function run()
	{
		$file = APPPATH . 'Database/Data/sample_showcase.json';
		$data = json_decode((string) @file_get_contents($file), true);
		if (! $data) {
			echo "Missing or invalid {$file}\n";

			return;
		}

		$this->db->transStart();
		$this->removeExisting($data);

		// Login accounts (admin login page: /adminLogin).
		$ids = [];
		foreach (['officer', 'verifier'] as $who) {
			$p = $data[$who];
			[$first, $last] = explode(' ', $p['name'], 2) + [1 => ''];
			$this->db->table('tbl_users')->insert([
				'name'       => $first,
				'lname'      => $last,
				'email'      => $p['email'],
				'phone_no'   => '09000000000',
				'password'   => password_hash(self::PASSWORD, PASSWORD_DEFAULT),
				'created_at' => date('Y-m-d H:i:s'),
				'position'   => $p['position'],
				'role'       => 'admin',
			]);
			$ids[$who] = $this->db->insertID();
		}

		// Drop-down lists on the worksheet (Calibrated by / Checked by).
		$this->db->table('personnel')->insert([
			'personnelName' => $data['officer']['name'],
			'position'      => $data['officer']['position'],
			'email'         => $data['officer']['email'],
		]);
		$this->db->table('verifier')->insert([
			'verifierName'     => $data['verifier']['name'],
			'verifierPosition' => $data['verifier']['position'],
			'verifierEmail'    => $data['verifier']['email'],
		]);

		foreach ($data['customers'] as [$name, $address]) {
			$this->db->table('customerdetails')->insert(['customer' => $name, 'address' => $address]);
		}

		$count = 0;
		$wsIds = []; // module => [id of -001, -002, -003]
		foreach ($data['records'] as $rec) {
			$row = $rec['row'];
			$row['calibratorAccountID'] = (string) $ids['officer'];
			// Only insert columns that exist on this installation.
			$fields = $this->db->getFieldNames($rec['table']);
			$row    = array_intersect_key($row, array_flip($fields));
			$this->db->table($rec['table'])->insert($row);
			$wsIds[$rec['module']][] = (int) $this->db->insertID();
			$count++;
		}

		$this->seedPortal($data, $wsIds);

		$this->db->transComplete();

		echo "Inserted {$count} sample worksheets, 4 customer-portal requests, 1 sample customer and 3 sample logins.\n";
		echo "Staff: /adminLogin as sample.officer@rml.local or sample.verifier@rml.local. Customer: /customer/login as " . self::CUSTOMER_EMAIL . ". Password " . self::PASSWORD . "\n";
	}

	/** Customer account + portal requests linked to the sample worksheets. */
	private function seedPortal(array $data, array $wsIds): void
	{
		if (! $this->db->tableExists('calibration_requests')) {
			echo "Customer portal tables missing (run php spark migrate); portal sample skipped.\n";

			return;
		}
		[$company, $address] = $data['customers'][0];
		$row        = $this->db->table('customerdetails')->select('id')->where('customer', $company)->get()->getRowArray();
		$customerId = $row['id'] ?? null;

		$this->db->table('customer_accounts')->insert([
			'customer_id'    => $customerId,
			'company'        => $company,
			'address'        => $address,
			'contact_person' => 'Sample Customer Contact',
			'email'          => self::CUSTOMER_EMAIL,
			'phone'          => '09000000001',
			'password'       => password_hash(self::PASSWORD, PASSWORD_DEFAULT),
			'created_at'     => '2026-09-28 09:00:00',
		]);
		$accountId = $this->db->insertID();
		$staff     = $data['officer']['name'];

		// [request no, submitted, received (null = still in the staff queue), place, worksheet position | new items]
		$requests = [
			['CR-SAMPLE-2026-0001', '2026-10-03 10:15:00', '2026-10-05 09:00:00', 'In-laboratory', 0],
			['CR-SAMPLE-2026-0002', '2026-11-01 14:20:00', '2026-11-03 09:00:00', 'In-laboratory', 1],
			['CR-SAMPLE-2026-0003', '2026-11-08 08:45:00', '2026-11-10 09:00:00', 'On-site', 2],
			['CR-SAMPLE-2026-0004', '2026-11-17 16:05:00', null, 'In-laboratory', [
				['electronicBalance', 'Electronic Balance, 220 g', 'Sample Manufacturer', 'SM-EB-200', 'SAMPLE-SN-EB-004', 'SAMPLE-EQ-EB-004', '0 to 220 g'],
				['thermohygrometer', 'Digital Thermohygrometer', 'Sample Manufacturer', 'SM-TH-200', 'SAMPLE-SN-TH-004', 'SAMPLE-EQ-TH-004', '0 to 50 degC / 20 to 90 %RH'],
				['testWeight', 'Test Weight, 1 kg', 'Sample Manufacturer', 'SM-TW-200', 'SAMPLE-SN-TW-004', 'SAMPLE-EQ-TW-004', '1 kg'],
			]],
		];

		foreach ($requests as [$no, $submitted, $received, $place, $items]) {
			$this->db->table('calibration_requests')->insert([
				'request_no'           => $no,
				'customer_account_id'  => $accountId,
				'customer_id'          => $customerId,
				'company'              => $company,
				'address'              => $address,
				'contact_person'       => 'Sample Customer Contact',
				'contact_phone'        => '09000000001',
				'place_of_calibration' => $place,
				'remarks'              => 'Sample request for demonstration.',
				'status'               => $received ? 'Received' : 'Submitted',
				'received_at'          => $received,
				'received_by'          => $received ? $staff : null,
				'created_at'           => $submitted,
				'updated_at'           => $received ?: $submitted,
			]);
			$requestId = $this->db->insertID();

			if (is_int($items)) {
				// One item per module, linked to the sample worksheet at this position.
				foreach ($wsIds as $module => $ids) {
					$table = \App\Libraries\CalibrationRequests::WORKSHEETS[$module]['table'];
					$ws    = $this->db->table($table)->select('equipmentInfo')->where('id', $ids[$items])->get()->getRowArray();
					$ei    = json_decode($ws['equipmentInfo'] ?? '', true) ?: [];
					$this->db->table('calibration_request_items')->insert([
						'request_id'            => $requestId,
						'module'                => $module,
						'equipment_description' => $ei['equipmentDescription'] ?? 'Sample instrument',
						'manufacturer'          => $ei['manufacturer'] ?? null,
						'model'                 => $ei['modelNumber'] ?? ($ei['model'] ?? null),
						'serial_number'         => $ei['serialNumber'] ?? null,
						'equipment_id'          => $ei['equipmentId'] ?? ($ei['equipmentID'] ?? null),
						'worksheet_id'          => $ids[$items],
						'worksheet_created_at'  => $received,
						'created_at'            => $submitted,
					]);
				}
			} else {
				foreach ($items as [$module, $desc, $make, $model, $serial, $eqId, $range]) {
					$this->db->table('calibration_request_items')->insert([
						'request_id'            => $requestId,
						'module'                => $module,
						'equipment_description' => $desc,
						'manufacturer'          => $make,
						'model'                 => $model,
						'serial_number'         => $serial,
						'equipment_id'          => $eqId,
						'capacity_range'        => $range,
						'created_at'            => $submitted,
					]);
				}
			}
		}
	}

	public function removeExisting(array $data): void
	{
		// Portal sample: requests, their items, and worksheets staff created from them during a demo.
		if ($this->db->tableExists('calibration_requests')) {
			$reqIds = array_column($this->db->table('calibration_requests')->select('id')
				->like('request_no', 'CR-SAMPLE-', 'after')->get()->getResultArray(), 'id');
			if ($reqIds) {
				foreach ($this->db->table('calibration_request_items')->whereIn('request_id', $reqIds)->get()->getResultArray() as $it) {
					$cfg = \App\Libraries\CalibrationRequests::WORKSHEETS[$it['module']] ?? null;
					if ($cfg && $it['worksheet_id']) {
						if ($f = \App\Libraries\CertificateQr::issuedFile($it['module'], (int) $it['worksheet_id'])) {
							@unlink($f);
						}
						$this->db->table($cfg['table'])->where('id', $it['worksheet_id'])->delete();
					}
				}
				$this->db->table('calibration_request_items')->whereIn('request_id', $reqIds)->delete();
				$this->db->table('calibration_requests')->whereIn('id', $reqIds)->delete();
			}
			$this->db->table('customer_accounts')->where('email', self::CUSTOMER_EMAIL)->delete();
		}

		// Released-certificate copies of the SAMPLE- worksheets.
		foreach (array_unique(array_column($data['records'], 'module')) as $module) {
			$table = \App\Libraries\CalibrationRequests::WORKSHEETS[$module]['table'] ?? null;
			if (! $table) {
				continue;
			}
			foreach ($this->db->table($table)->select('id')->like('certificateNumber', 'SAMPLE-', 'after')->get()->getResultArray() as $r) {
				if ($f = \App\Libraries\CertificateQr::issuedFile($module, (int) $r['id'])) {
					@unlink($f);
				}
			}
		}

		foreach (array_unique(array_column($data['records'], 'table')) as $table) {
			$this->db->table($table)->like('certificateNumber', 'SAMPLE-', 'after')->delete();
		}
		if ($this->db->tableExists('certificate_verifications')) {
			$this->db->table('certificate_verifications')->like('certificate_number', 'SAMPLE-', 'after')->delete();
		}
		$emails = [$data['officer']['email'], $data['verifier']['email']];
		$this->db->table('tbl_users')->whereIn('email', $emails)->delete();
		$this->db->table('personnel')->whereIn('email', $emails)->delete();
		$this->db->table('verifier')->whereIn('verifierEmail', $emails)->delete();
		$this->db->table('customerdetails')->like('customer', '(Sample Data)', 'before')->delete();
	}
}
