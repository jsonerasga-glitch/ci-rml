<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;
class WeighingScaleModel extends Model{
    protected $table = 'weighingscaletable';
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
        'premA',
        'premB',
        'premC',
        'premD',
        'premE',
        'premF',
        'premG',
        'illustration',
        'calibrationOfficer',
        'checkedBy',
        'verifierPosition',
        'specificationData',
        'environmentData',
        'spanCalibrationData',
        'sensitivityTestData',
        'eccentricityTestData',
        'linearityTestData',
        'repeatabilityTestData',
        'calculatedValuesData',
        'completion',

        'settingCalibrationProcedureAndTraceability',
        'settingUncertaintyOfMeasurement',
        'settingCalibrationResults',
        'settingRemarks',

        'calibratorAccountEmail',
        'calibratorAccountID',
        'dateTimeCalibrated',

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