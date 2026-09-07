<?php namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;

//use App\Models\RML;
class DashboardController extends BaseController
{
    public function dashboardAdmin(){

        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_users');   
 
        $query = $builder->query("SELECT COUNT(id) as count,DAY(created_at) as day_date FROM tbl_users WHERE MONTH(created_at) = '" . date('m') . "'
        AND YEAR(created_at) = '" . date('Y') . "'
      GROUP BY DAY(created_at)");
 
      $data['day_wise'] = $query->getResult();
         
        return view('dashboardAdmin', $data);
    }
}