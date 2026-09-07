<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class WirelessTemperatureLoggerModel extends Model{
    protected $table = 'wirelesstemperaturelogger';
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
    