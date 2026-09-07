<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class Defaults extends Model{
    protected $table = 'defaults';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'module1ProcedureTraceability',
        'module1UncertaintyMeasurement',
        'module1Result',
        'module1R1',
        'module1R2',
        'module1R3',
        'module1R4',
    ];
}        