<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class BalanceStandardModel extends Model{
    protected $table = 'balancestandard';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'balance',
        'description',
        'certificateNumber',
        'provider',
        'empty1',
        'full1',
        'empty2',
        'full2',	
        'empty3',
        'full3',
        'empty4',
        'full4',
        'empty5',
        'full5',
        'emptySD',	
        'fullSD',	
        'nominalEmpty',
        'nominalFull',
        'sensitivityWeight',
        'uncertSensitivityWeight',
        'sensitivityWeightDelta',
        'uncertSensitivityWeightDelta',
        'pooledValue',
        'maximumValue',
        'minimumValue',
        'differenceValue',
        'dateCalibrated',
        'resolution1',
        'resolution2',
        'conditionForResolution',
        'measurements',
    ];
}