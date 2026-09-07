<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class RefractometerModel extends Model{
    protected $table = 'refractometertable';
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
        'settingMeasurementCondition',
        'settingRemarks',
        'dateOfIssue',
    ];
}         