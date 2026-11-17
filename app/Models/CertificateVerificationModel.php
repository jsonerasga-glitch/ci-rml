<?php

namespace App\Models;

use CodeIgniter\Model;

class CertificateVerificationModel extends Model
{
	protected $table         = 'certificate_verifications';
	protected $primaryKey    = 'id';
	protected $returnType    = 'array';
	protected $useTimestamps = false;
	protected $allowedFields = [
		'token',
		'module',
		'record_id',
		'certificate_number',
		'is_draft',
		'data_hash',
		'snapshot',
		'generated_by',
		'scan_count',
		'first_scanned_at',
		'last_scanned_at',
		'created_at',
	];
}
