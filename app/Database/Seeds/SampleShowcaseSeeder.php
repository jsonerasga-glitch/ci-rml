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
 * plus three "(Sample Data)" customers and two login accounts:
 *   sample.officer@rml.local   / Sample@2026   (Sample Calibration Officer)
 *   sample.verifier@rml.local  / Sample@2026   (Sample Verifier)
 *
 * All names, addresses, serial numbers and certificate numbers are fictitious.
 * Re-running replaces the previous sample data; real records are never touched
 * (everything is matched on the SAMPLE- / "(Sample Data)" / @rml.local markers).
 */
class SampleShowcaseSeeder extends Seeder
{
	public const PASSWORD = 'Sample@2026';

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
		foreach ($data['records'] as $rec) {
			$row = $rec['row'];
			$row['calibratorAccountID'] = (string) $ids['officer'];
			// Only insert columns that exist on this installation.
			$fields = $this->db->getFieldNames($rec['table']);
			$row    = array_intersect_key($row, array_flip($fields));
			$this->db->table($rec['table'])->insert($row);
			$count++;
		}

		$this->db->transComplete();

		echo "Inserted {$count} sample worksheets, " . count($data['customers']) . " sample customers and 2 sample logins.\n";
		echo "Log in at /adminLogin with sample.officer@rml.local or sample.verifier@rml.local, password " . self::PASSWORD . "\n";
	}

	public function removeExisting(array $data): void
	{
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
		$this->db->table('customerdetails')->whereIn('customer', array_column($data['customers'], 0))->delete();
	}
}
