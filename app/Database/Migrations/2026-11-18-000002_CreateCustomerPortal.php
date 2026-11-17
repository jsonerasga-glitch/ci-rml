<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Customer portal (see systemFlow.png):
 *   customer_accounts          – customer logins, linked to customerdetails
 *   calibration_requests       – a request submitted by a customer (the staff queue)
 *   calibration_request_items  – one instrument + calibration process per row,
 *                                linked to the worksheet created for it
 */
class CreateCustomerPortal extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'             => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
			'customer_id'    => ['type' => 'INT', 'null' => true, 'comment' => 'customerdetails.id'],
			'company'        => ['type' => 'VARCHAR', 'constraint' => 255],
			'address'        => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
			'contact_person' => ['type' => 'VARCHAR', 'constraint' => 150],
			'email'          => ['type' => 'VARCHAR', 'constraint' => 150],
			'phone'          => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
			'password'       => ['type' => 'VARCHAR', 'constraint' => 255],
			'last_login_at'  => ['type' => 'DATETIME', 'null' => true],
			'created_at'     => ['type' => 'DATETIME', 'null' => true],
		]);
		$this->forge->addKey('id', true);
		$this->forge->addUniqueKey('email');
		$this->forge->createTable('customer_accounts', true);

		$this->forge->addField([
			'id'                  => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
			'request_no'          => ['type' => 'VARCHAR', 'constraint' => 50],
			'customer_account_id' => ['type' => 'INT', 'unsigned' => true],
			'customer_id'         => ['type' => 'INT', 'null' => true],
			'company'             => ['type' => 'VARCHAR', 'constraint' => 255],
			'address'             => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
			'contact_person'      => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
			'contact_phone'       => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
			'place_of_calibration' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'In-laboratory'],
			'preferred_date'      => ['type' => 'DATE', 'null' => true],
			'remarks'             => ['type' => 'TEXT', 'null' => true],
			// Submitted -> Received -> (In Progress / Completed are derived from the worksheets) | Cancelled
			'status'              => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'Submitted'],
			'staff_remarks'       => ['type' => 'TEXT', 'null' => true],
			'received_at'         => ['type' => 'DATETIME', 'null' => true],
			'received_by'         => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
			'created_at'          => ['type' => 'DATETIME', 'null' => true],
			'updated_at'          => ['type' => 'DATETIME', 'null' => true],
		]);
		$this->forge->addKey('id', true);
		$this->forge->addUniqueKey('request_no');
		$this->forge->addKey('customer_account_id');
		$this->forge->addKey('status');
		$this->forge->createTable('calibration_requests', true);

		$this->forge->addField([
			'id'                    => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
			'request_id'            => ['type' => 'INT', 'unsigned' => true],
			'module'                => ['type' => 'VARCHAR', 'constraint' => 50, 'comment' => 'CalibrationModules key'],
			'equipment_description' => ['type' => 'VARCHAR', 'constraint' => 255],
			'manufacturer'          => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
			'model'                 => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
			'serial_number'         => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
			'equipment_id'          => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
			'capacity_range'        => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
			'remarks'               => ['type' => 'TEXT', 'null' => true],
			'worksheet_id'          => ['type' => 'INT', 'null' => true, 'comment' => 'id in the module worksheet table'],
			'worksheet_created_at'  => ['type' => 'DATETIME', 'null' => true],
			'created_at'            => ['type' => 'DATETIME', 'null' => true],
		]);
		$this->forge->addKey('id', true);
		$this->forge->addKey('request_id');
		$this->forge->createTable('calibration_request_items', true);
	}

	public function down()
	{
		$this->forge->dropTable('calibration_request_items', true);
		$this->forge->dropTable('calibration_requests', true);
		$this->forge->dropTable('customer_accounts', true);
	}
}
