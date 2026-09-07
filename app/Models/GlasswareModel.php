<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class GlasswareModel extends Model{
    protected $table = 'glasswaretable';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'tsrID',
        'certificateNumber',
        'selectedBalance',
        'selectedBarometer',
        'selectedThermometer',
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
    ];
}         