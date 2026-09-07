<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;
class ThermoStandardAddTestPointsModel extends Model{
    protected $table = 'thermostandardtestpoints';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'standardID',
        'serialNumber',
        'testPoint',
        'unit',
        'RML',
        'NML',
        'correction',
        'readoutStandardUncertaintyFromCertificate',
        'uncertainty', 
        'range',
        'res',
        'readability',  
        'coverageFactor',
        'previousRML',
        'drift',
    ];
}   