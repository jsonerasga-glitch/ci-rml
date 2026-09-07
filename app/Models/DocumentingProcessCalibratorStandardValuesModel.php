<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class DocumentingProcessCalibratorStandardValuesModel extends Model
{
    protected $table = 'documentingprocesscalibratorstandardvalues';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'standardID',
        'serialNumber',
        'type',
        'function',
        'functionType',
        'sensorType',
        'settingValue',
        'settingValueUnit',
        'settingValueHertz',
        'settingValueHertzUnit',
        'coverageFactorValue',
        'standardResolution',
        'standardReadability',
        'influenceFactorValue',
        'percentageValue',
        'indicatedValue',
        'indicatedValueUnit',
        'uncertainty',
        'uncertaintyUnit',
        'rangeValue',
        'rangeValueUnit',
        'previousIndicatedValue',
        'previousIndicatedValueUnit',
        'drift',
        'status',
    ];
}