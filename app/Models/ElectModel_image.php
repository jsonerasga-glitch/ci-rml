<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class ElectModel_image extends Model
{
    protected $table = 'imageTable';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'certificateNumber',
        'image',
        'idOfCertificate',
    ];
    }        