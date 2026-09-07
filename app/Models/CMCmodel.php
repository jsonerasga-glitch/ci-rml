<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class CMCmodel extends Model{
    protected $table = 'cmc';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'calibrationProcedure',
        'moduleNumber',
        'cmcValue',
        'conditions',
    ];
}         