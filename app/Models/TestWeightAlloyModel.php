<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class TestWeightAlloyModel extends Model{
    protected $table = 'testweightmaterial';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'material',
        'density',
        'uncertainty',
        'unit',
    ];
}