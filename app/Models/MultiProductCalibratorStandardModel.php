<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class MultiProductCalibratorStandardModel extends Model
{
    protected $table = 'multiproductcalibratorstandard';
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