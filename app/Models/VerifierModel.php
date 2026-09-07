<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class VerifierModel extends Model{
    protected $table = 'verifier';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'verifierName',
        'verifierPosition',
        'verifierEmail',
    ];
}       
    