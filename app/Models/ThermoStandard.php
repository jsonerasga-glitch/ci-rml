<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class ThermoStandard extends Model{
    protected $table = 'thermostandardtable';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'standard',
        'manufacturer',
        'modelNumber',
        'serialNumber',
        'certificateNumber',
        'dateOfCali',
        'dateOfNextCali',
        'standardUsed',
        'stdResolutionTemp',
        'stdResolutionRH',
        'issuingLab',
        'coverageFactor',
    ];
}  
