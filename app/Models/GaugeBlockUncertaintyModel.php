<?php namespace App\Models;

use CodeIgniter\Model;
//use tidy;

class GaugeBlockUncertaintyModel extends Model{
    protected $table = 'standard_uncertainty_gaugeblock';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'standardID',
        'rangeMin',
        'rangeMax',
        'uncertainty',
        'errorGrade0',
        'parallelismGrade0',
        'errorGrade1',
        'parallelismGrade1',
        'errorGrade2',
        'parallelismGrade2',
        'status',
    ];
}       
    