<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class TemperatureControllModel extends Model{
    protected $table = 'temperaturecontrollertable';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'tsrID',
        'certificateNumber',
        'standard',
        'customerInfo',
        'equipmentInfo',
        'environmentInfo',
        'dataInputs',
        'calculatedData',
        'images',
        'completion',
        'calibrationOfficer',
        'checkedBy',
        'verifierPosition',
        'calibratorAccountEmail',
        'calibratorAccountID',
        'verifierEmail',
        'settingCalibrationProcedureAndTraceability',
        'settingCalibrationResults',
        'settingUncertaintyOfMeasurement',
        'settingMeasurementCondition',
        'settingRemarks',
        'dateOfIssue',

        'comments',
    ];
}         