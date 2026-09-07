<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class TestWeightModel extends Model{
    protected $table = 'testweighttable';
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
        'dateOfIssue',
////LEGACY////


        'allData',
        'weight',
        'customer',
        'address',
        'dateReceived',	
        'dateCalibrated',
        'recommendedDueDate',
        'placeOfCalibration',
        'equipmentDescription',
        'manufacturer',
        'Class',
        'serialNumber',	
        'equipmentID',	
        'approxClass',
        'cycle',
        'standardDescription',
        'accessories',
        'maker',
        'classStandard',
        'remarks',
        'serialNumberStandard',
        'dateOfNextCalib',
        'timeStart',
        'timeFinished',
        'calibratedBy',
        
        'encodedBy',
        'dateCalibratedBy',
        'dateCheckedBy',
        'PabLogo',
        'settingCalibrationProcedureAndTraceability',
        'settingUncertaintyOfMeasurement',
        'settingCalibrationResults',
        'settingRemarks1',
        'settingRemarks2',
        'settingRemarks3',
        'settingRemarks4',
        
        'comments',
        
    ];
}