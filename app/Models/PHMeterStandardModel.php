<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class PHMeterStandardModel extends Model
{
    protected $table = 'phmeterstandard';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        // 'tempC',
        // 'tempK',
        // 'LN',
        // 'En',
        // 'slope',

        'pHStandard',
        'serialNumber',
      
        'description',
        'certificateNumber',
        'provider',

        'batchNumber',
        'bufferUncertaintyStandard',
        'bufferTemperatureStandard',

        'measurements',
        'status',


    ];
    }        