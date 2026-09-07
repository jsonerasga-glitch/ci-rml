<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class ChamberStandardModel extends Model
{
    protected $table = 'standard_chamber';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'description',
        'serialNumber',
        'measurements',
        'status',
    ];
}