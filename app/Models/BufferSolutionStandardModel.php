<?php namespace App\Models;

use CodeIgniter\Model;


class BufferSolutionStandardModel extends Model
{
    protected $table = 'buffersolutionstandard';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'certificateNumber',
        'description',
        'pHValue',
        'calibrationProvider',	
        'dateOfCalibration',
        'uncertaintypH',
        'measurements',
        'status',
    ];
}
