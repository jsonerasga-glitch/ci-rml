<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class BalanceStandardModel extends Model{
    protected $table = 'standard_balance';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'description',
        'serialNumber',
        'certificateNumber',
        'provider',
        'dateCalibrated',
        'resolution',
        'resolution2',
        'conditionForResolution',
        'tempCoefficient',
        'uncertainty',
        'coverageFactor',
        'sensitivityWeightDelta',
        'uncertSensitivityWeightDelta',
        'sensitivityWeight',
        'uncertSensitivityWeight',
        'pooledValue',
        'sdValues',
        'measurements',
        'status',
    ];
}