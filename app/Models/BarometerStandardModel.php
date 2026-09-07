<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class BarometerStandardModel extends Model
{
    protected $table = 'barometerstandard';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'serialNumber',
        'certificateNumber',
        'description',
        'dateOfCalibration',
        'provider',	
        'resolution',	
        'uncertaintyHPA',	
        'uncertaintyRH',
        'uncertaintyTEMPAIR',
    ];
}