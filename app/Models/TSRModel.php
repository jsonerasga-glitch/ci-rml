<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class TSRModel extends Model{
    protected $table = 'requestsamples';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'sampleID',
        'requestReferenceNumber',
        'sampleCode',
        'worksheetType',
        'worksheetID',
        'rawData',
    ];
}     