<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class DigitalTimerStandardModel extends Model
{
    protected $table = 'digitaltimerstandard';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'serialNumber',
        'certificateNumber',
        'description',
        'calibrationProvider',	
        'brand',
        'model',
        'dateOfCalibration',
        'coverageFactor',
        'standardResolution',
        'measurements',
        'status',
    ];
}