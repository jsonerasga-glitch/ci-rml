<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class PressureGaugeStandardValueModel extends Model{
    protected $table = 'pressuregaugestandardvalues';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'serialNumber',
        'applied',
        'increasing',
        'decreasing',
        'mean',
        'deviation',
        'uncertainty',
        'correction',
        'status',
    ];
}         