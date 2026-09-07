<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class ElectModel_3 extends Model
{
    protected $table = 'elect_table_3';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'serialNumber',
        'type',
        'class',
        'nominalValue',	
        'nominalUnit',
        'marking',	
        'conventionalMass',	
        'unit',
        'uncertainty', 
        'mpe',
        'calibrationProvider',
        'standardID',

        'drift',
        'previousConventionalMass',

        'status',
        'coverageFactor',
    ];
}        