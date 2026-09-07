<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class MultiProductCalibratorStandardValuesModel extends Model
{
    protected $table = 'multiproductcalibratorstandardvalues';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'standardID',
        'serialNumber',
        'type',
        'function',
        'rangeMin',
        'rangeMinUnit',
        'rangeMax',
        'rangeMaxUnit',
        'outputSetting',
        'outputSettingUnit',
        'outputSettingHertz',
        'outputSettingHertzUnit',
        'coverageFactorValue',
        'measuredOutputVoltage',
        'measuredOutputVoltageUnit',
        'uncertainty',
        'uncertaintyUnit',
        'previousMeasuredOutputVoltage',
        'previousMeasuredOutputVoltageUnit',
        'drift',
        'status',
    ];
}