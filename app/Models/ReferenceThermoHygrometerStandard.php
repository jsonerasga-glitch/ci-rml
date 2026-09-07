<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class ReferenceThermoHygrometerStandard extends Model{
    protected $table = 'ReferenceThermoHygrometer';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'serialNumber',
        'certificateNumber',
        'description',
        'provider',
        'brand',
        'model',
        'dateOfCalibration',
        'measurements',
    ];
}       
    