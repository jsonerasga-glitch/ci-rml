<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Removes everything SampleShowcaseSeeder added, leaving real data untouched:
 *
 *   php spark db:seed RemoveSampleShowcaseSeeder
 *
 * Deletes the SAMPLE-… worksheets and their QR records, the "(Sample Data)"
 * customers, and the sample.officer / sample.verifier logins, personnel and
 * verifier entries.
 */
class RemoveSampleShowcaseSeeder extends Seeder
{
	public function run()
	{
		$data = json_decode((string) @file_get_contents(APPPATH . 'Database/Data/sample_showcase.json'), true);
		if (! $data) {
			echo "Missing app/Database/Data/sample_showcase.json; nothing removed.\n";

			return;
		}

		$this->db->transStart();
		(new SampleShowcaseSeeder(config('Database'), $this->db))->removeExisting($data);
		$this->db->transComplete();

		echo "Sample showcase data removed. Real records were not touched.\n";
	}
}
