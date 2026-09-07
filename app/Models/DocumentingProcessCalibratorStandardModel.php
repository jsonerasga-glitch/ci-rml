<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class DocumentingProcessCalibratorStandardModel extends Model
{
    protected $table = 'documentingprocesscalibratorstandard';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'serialNumber',
        'certificateNumber',
        'description',
        'calibrationProvider',	
        'brand',
        'model',
        'dateOfCalibration',
        'coverageFactor',
        'measurements',
        'status',
    ];
}
