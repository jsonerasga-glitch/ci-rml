<?php namespace App\Controllers;

//use App\Models\RML;
class LoginController extends BaseController
{
    public function adminLogin(){
        return view('AdminLogin');
    }
}