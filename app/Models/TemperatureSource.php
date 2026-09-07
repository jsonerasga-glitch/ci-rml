<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class TemperatureSource extends Model{
    protected $table = 'temperaturesource';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'code',
        'maxInstability',
        'maxAxial',
        'maxRadial',
        'description',
        'status',
    ];
}       
    