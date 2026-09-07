<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class TemperatureRecorderModel extends Model{
    protected $table = 'temperaturerecorder';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'serialNumber',
        'certificateNumber',
        'description',
        'provider',
        'brand',
        'model',
        'dateOfCalibration',
        'channelNumber',
        'testPoint',
        'stdReading',
        'uucReading',
        'correction',
        'uncertainty',
        'measurements',
    ];
}       
    