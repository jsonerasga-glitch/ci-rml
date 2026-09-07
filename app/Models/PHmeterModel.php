<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class PHMeterModel extends Model{
    protected $table = 'phmetertable';
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
        'settingCalibrationResultsOffsetRemarks',
        'settingUncertaintyOfMeasurement',
        'settingMeasurementCondition',
        'settingRemarks',
        'settingCalibrationAdditionalInfo',
        'serialNumber',
        'dateOfIssue',


   
    ];
}       

