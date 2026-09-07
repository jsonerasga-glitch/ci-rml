<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class TestWeightPABModel extends Model{
    protected $table = 'testweightpab';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'classification',
        'class',
        'instrument',
        'rangePAB',
        'cmc',
        'method',	
    ];
}