<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class ImageModel extends Model{
    protected $table = 'imageTable';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'imageName',
        'path',
        'worksheetID',
        'worksheetType',
        'fileType',                                                                                                                                                         
    ];
}        