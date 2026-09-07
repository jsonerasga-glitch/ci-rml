<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class GaugeBlockMeasurementModel extends Model{
    protected $table = 'standard_measurement_gaugeblock';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'standardID',
        'nominalLength',
        'serialNumberError',
        'centLngError',
        'maxLngError',
        'minLngError',
        'parallel',
        'calResult',
        'status',
    ];
}       
    