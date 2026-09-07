<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class About extends Model{
    protected $table = 'about';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'tel',
        'email',
        'url',
    ];
}       
    