<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;
class ThermoStandardAddDriftPRTModel extends Model{
    protected $table = 'thermostandarddriftprt';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'serialNumber',
        'testPoint',
        'previousTest',
        'currentTest',
        'drift',
    ];
}   