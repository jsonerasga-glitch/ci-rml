<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class DigitalTimerStandardValuesModel extends Model
{
    protected $table = 'digitaltimerstandardvalues';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'standardID',
        'serialNumber',
        'type',
        'function',
        'rmlReading',
        'nmlReading',
        'correctionSecond',
        'previousCorrectionSecond',
        'driftSecond',
        'uncertaintySecond',
        'measuredFrequency',
        'previousMeasuredFrequency',
        'deviationHertz',
        'uncertaintyHertz',
        'status',
    ];
    
    }        