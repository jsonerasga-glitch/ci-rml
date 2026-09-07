<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class TimerStandardModel extends Model
{
    protected $table = 'timer_standard';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'description',
        'serialNumber',	
        'certificateNumber',	
        'calibrationProvider',
        'dateOfCali', 
        'dateOfNextCali', 
        'manufacturer', 
        'modelNumber',
    ];
}