<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class PressureGaugeStandardModel extends Model{
    protected $table = 'pressuregaugestandarddetails';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'serialNumber',
        'standardDescription',
        'calibrationCertificate',
        'model',
        'laboratory',
        'dateOfCalibration',
        'unit_Original',
        'unit_Converted',
        'coverageFactor',
        'status',
    ];
}         