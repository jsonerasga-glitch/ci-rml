<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class RML extends Model
{
    protected $table = 'rml_table';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'ccno',
        'costumer',
        'address',
        'equipment',
        'manufacturer',
        'modelno',
        'serialno',
        'equipid',
        'accuracy',
        'range_range',
        'graduation',
        'readability',
        'datereceived',
        'datecalibrated',
        'reccduedate',
        'placeofcalib',
        'capacity',
        'ambtemp',
        'relhumidity',
        'Patm',
        'prelimInspec',
        'MeasurementData',
        'hstd',
        'huuc',
        'heightDifference',
        'medium',
        'remarks',
        'standardDescription',
        'standardManufacturer',
        'standardModelNumber',
        'standardSerialNumber',
        'dateOfNextCalibration',
        'standardRemarks',
        'standardAccessories',
        'timeStarted',
        'timeFinished',
        'calibratedBy',
        'checkedBy',
        'daten',
    ];
}
?>