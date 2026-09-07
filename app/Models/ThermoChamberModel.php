<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class ThermoChamberModel extends Model{
    protected $table = 'thermochamber';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'serialNumber',
        'unit',
        'inhomogeneity',
        'Instability',	
    ];
}