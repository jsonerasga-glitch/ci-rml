<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class CustomersModel extends Model{
    protected $table = 'customerdetails';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'customer',
        'address',
    ];
}       
    