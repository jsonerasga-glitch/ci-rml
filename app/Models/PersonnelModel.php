<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class PersonnelModel extends Model{
    protected $table = 'personnel';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'personnelName',
        'position',
        'email',
    ];
}       
    