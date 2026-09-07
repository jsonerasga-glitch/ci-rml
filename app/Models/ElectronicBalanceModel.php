<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class ElectronicBalanceModel extends Model{
    protected $table = 'electronicbalancetable';
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
        'graphMin',
        'graphMax',
        'graphStep',
        'dateOfIssue',
        'comments',
        'graph_data',
    ];
}         