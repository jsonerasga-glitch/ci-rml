<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class TestWeightStandardValuesModel extends Model
{
    protected $table = 'testweightstandardvalues';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'serialNumber',
        'nominalValue',	
        'nominalUnit',
        'marking',	
        'conventionalMass',	
        'unit',
        'uncertainty', 
        'mpe',
        'issuer',
        'class',
    ];
    }        