<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class TestWeightMPEModel extends Model{
    protected $table = 'testweightmpe';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nominalValue',
        'nominalUnit',
        'class',
        'MPE',
    ];
}