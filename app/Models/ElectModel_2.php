<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class ElectModel_2 extends Model
{
    protected $table = 'elect_table_2';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'description',
        'manufacturer',
        'type',	
        'serialNumber',	
        'certificateNumber',	
        'dateOfCalibration',
        'class',
        'calibrationProvider',
        'prevAirDensity',
        'status',
        'coverageFactor',
    ];
}