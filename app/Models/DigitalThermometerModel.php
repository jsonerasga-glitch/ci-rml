<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class DigitalThermometerModel extends Model{
    protected $table = 'digitalthermometertable';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'tsrID',
        'certificateNumber',
        'PabLogo',
        'customer',
        'address',
        'dateReceived',
        'dateCalibrated',
        'recommendedDueDate',
        'placeOfCalibration',
        'standardUsed',

        'completion',
        'calibrationOfficer',
        'checkedBy',
        'verifierPosition',
        'calibratorAccountEmail',
        'calibratorAccountID',
        'verifierEmail',
        'settingCalibrationProcedureAndTraceability',
        'settingUncertaintyOfMeasurement',
        'settingCalibrationResults',
        'settingRemarks1',
        'specificationsArray',
        'environmentArray',
        'calculatedValues',

        'standard',
        'customerInfo',
        'equipmentInfo',
        'environmentInfo',
        'dataInputs',
        'calculatedData',   
        'images',
        'comments',
        'dateOfIssue',
    ];
}       
    