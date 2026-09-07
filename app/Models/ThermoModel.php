<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class ThermoModelImage extends Model{
    protected $table = 'imageTable';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'certificateNumber',
        'image'
    ];
}  

class ThermoModel extends Model{
    protected $table = 'thermotable';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'tsrID',
        'PabLogo',
        'certificateNumber',
        'customer',
        'address',
        'dateReceived',
        'dateCalibrated',
        'recommendedDueDate',
        'placeOfCalibration',
        'equipmentDescription',
        'manufacturer',
        'modelNumber',
        'serialNumber',
        'equipmentID',
        
        'startTemp',
        'endTemp',
        'startRh',
        'endRh',
        'ambTemp',
        'ambRh',
        'standardAndAccessories',
        'selectedChamber',
        'premA', 
        'premB', 
        'premC', 
        'premD',     

        'tableTempIn',
        'tableTempInRange',
        'tableTempInResGrad',
        'tableTempInReadability',

        'tableTempOut',
        'tableTempOutRange',
        'tableTempOutResGrad',
        'tableTempOutReadability',

        'tableRH',
        'tableRHRange',
        'tableRHResGrad',
        'tableRHReadability',

        'tableRNOut',
        'tableRNOutRange',
        'tableRNOutResGrad',
        'tableRNOutReadability',

        'remarksA',
        'remarks',


        // 'calibratedBy',
        // 'encodedBy',
        // 'checkedby',

        'calibrationOfficer',
        'checkedBy',
        'verifierPosition',

        'image',

        'typeOfEquipment',

        'UUCStdDev ',
        'uncResolution ',
        'uncRepeatability ',
        'standardStdDev ',
        'calculatedValueConsideringCorrection ',
        'correctedValue ',
        'uncStandardRepeatability ',
        'readoutStandardUncertaintyFromCertificate ', 
        'PRTStandardUncertaintyFromCertificate ',
        'uncertatityStandardReadout ',
        'uncertatityStandardPRT ',
        'drift ',
        'uncertaintyDrift ',
        'STDRes ',
        'uncSTDResolution ',
        'chamberUniformity ',
        'uncChamberUniformity ',
        'hysteresis ',
        'DOF ',
        'combinedUncertainty ',
        'k ',
        'expandedUncertainty ',

        'settingCalibrationProcedureAndTraceability',
        'settingUncertaintyOfMeasurement',
        'settingCalibrationResults',
        'settingRemarks1',
        'settingRemarks2',
        'settingRemarks3',
        'settingRemarks4',

        'inputtedArrayTempIn',
        'inputtedArrayTempOut',
        'inputtedArrayRHIn',
        'inputtedArrayRHOunt',

        'datas',
        'customDecimalPlace',
        'dateOfIssue',
        
        'completion',
        
        'calibratorAccountEmail',
        'calibratorAccountID',
        'verifierEmail',
        'comments',


        'standard',
        'chamber',
        'customerInfo',
        'equipmentInfo',
        'environmentInfo',
        'dataInputs',
        'calculatedData',
        'settingMeasurementCondition',
        'settingRemarks',

        'images',

    ];
}       
  

