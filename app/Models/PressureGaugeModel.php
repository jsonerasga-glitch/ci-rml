<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class PressureGaugeModel extends Model{
    protected $table = 'pressuregaugetable';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
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
        'comments',
        'dateOfIssue',
    ];
}         