<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;
class ThermoStandardAddDriftModel extends Model{
    protected $table = 'thermostandarddrift';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'serialNumber',
        'unit',
        'dateCalibrated',
        'testPoint',
        'testPointValue',
    ];
}   