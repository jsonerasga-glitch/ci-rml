<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Stores the token embedded in each certificate's QR code so a scanned
 * certificate can be checked against the record it was printed from.
 */
class CreateCertificateVerifications extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'                 => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'token'              => ['type' => 'VARCHAR', 'constraint' => 64],
			'module'             => ['type' => 'VARCHAR', 'constraint' => 50],
			'record_id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
			'certificate_number' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
			'is_draft'           => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
			'data_hash'          => ['type' => 'CHAR', 'constraint' => 64],
			'snapshot'           => ['type' => 'TEXT', 'null' => true],
			'generated_by'       => ['type' => 'INT', 'constraint' => 11, 'null' => true],
			'scan_count'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
			'first_scanned_at'   => ['type' => 'DATETIME', 'null' => true],
			'last_scanned_at'    => ['type' => 'DATETIME', 'null' => true],
			'created_at'         => ['type' => 'DATETIME', 'null' => true],
		]);
		$this->forge->addKey('id', true);
		$this->forge->addUniqueKey('token');
		$this->forge->addKey(['module', 'record_id']);
		$this->forge->createTable('certificate_verifications', true);
	}

	public function down()
	{
		$this->forge->dropTable('certificate_verifications', true);
	}
}
