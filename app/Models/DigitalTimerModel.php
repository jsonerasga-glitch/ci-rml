<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class DigitalTimerModel extends Model{
    protected $table = 'digitaltimertable';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'tsrID',
        'certificateNumber',
        'PabLogo',
        'standard',
        'customerInfo',
        'equipmentInfo',
        'environmentInfo',
        'dataInputs',
        'calculatedData',
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
        'settingRemarks',
        'settingOffsetInfo',
        'dateOfIssue',
        'dateTimeCalibrated',

    ];
}              
