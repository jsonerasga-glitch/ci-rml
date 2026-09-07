<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class GaugeBlockModel extends Model{
    protected $table = 'standard_gaugeblock';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'description',
        'manufacturer',
        'material',
        'serialNumber',
        'certificateNumber',
        'dateOfCalibration',
        'coverageFactor',
        'calibrationProvider',
        'status',
        'measurement',
    ];
}       
    