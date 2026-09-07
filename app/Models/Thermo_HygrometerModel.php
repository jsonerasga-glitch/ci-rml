<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class Thermo_HygrometerModel extends Model{
    protected $table = 'thermohygrometertable';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'certificateNumber',
        'standard',
        'chamber',
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