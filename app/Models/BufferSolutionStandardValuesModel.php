<?php namespace App\Models;

use CodeIgniter\Model;


class BufferSolutionStandardValuesModel extends Model
{   
    protected $table = 'buffersolutionstandardvalues';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'standardID',
        'certificateNumber',
        // 'pHValue',
        'bufferSolutionReading',
        'nextBufferSolutionReading',
        'driftOfBufferSolutionReading',
        'temperature',
        'nextTemperature',
        'changeInTemperature',
        'sensitivityCoefficient',
        'status',
    ];
}