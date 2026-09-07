<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class TestWeightStandardDetailsModel extends Model
{
    protected $table = 'testweightstandarddetails';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'description',
        'manufacturer',
        'type',	
        'serialNumber',	
        'certificateNumber',	
        'dateOfCalibration',
        'issuer',
        'class',
        'prevAirDensity',
    ];
    }