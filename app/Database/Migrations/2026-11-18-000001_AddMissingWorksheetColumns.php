<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Adds columns the code already reads and writes but that were never created
 * in the database (found by comparing each model's $allowedFields with the
 * table):
 *
 *  - electronicbalancetable.graph_data
 *      module1 JS does JSON.parse(worksheetData.graph_data) when a worksheet
 *      loads. The missing column made it throw, so the script stopped before
 *      enabling "Certificate PDF" for verified (For printing) records, and
 *      add/update could not store the graph settings.
 *  - testweighttable.calibratedBy / encodedBy / settingRemarks2-4
 *      written by TestWeightController::updateData (called after every save)
 *      and ::updateWord.
 *
 * Every column is nullable and only added when absent, so it is safe on any
 * copy of the database and does not change existing data.
 */
class AddMissingWorksheetColumns extends Migration
{
	private const COLUMNS = [
		'electronicbalancetable' => [
			'graph_data' => ['type' => 'LONGTEXT', 'null' => true],
		],
		'testweighttable' => [
			'calibratedBy'    => ['type' => 'TEXT', 'null' => true],
			'encodedBy'       => ['type' => 'TEXT', 'null' => true],
			'settingRemarks2' => ['type' => 'LONGTEXT', 'null' => true],
			'settingRemarks3' => ['type' => 'LONGTEXT', 'null' => true],
			'settingRemarks4' => ['type' => 'LONGTEXT', 'null' => true],
		],
	];

	public function up()
	{
		foreach (self::COLUMNS as $table => $columns) {
			if (! $this->db->tableExists($table)) {
				continue;
			}
			$add = array_filter($columns, fn ($name) => ! $this->db->fieldExists($name, $table), ARRAY_FILTER_USE_KEY);
			if ($add) {
				$this->forge->addColumn($table, $add);
			}
		}
	}

	public function down()
	{
		foreach (self::COLUMNS as $table => $columns) {
			foreach (array_keys($columns) as $name) {
				if ($this->db->tableExists($table) && $this->db->fieldExists($name, $table)) {
					$this->forge->dropColumn($table, $name);
				}
			}
		}
	}
}
