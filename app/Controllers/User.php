<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\UserGuestModel;

class User extends BaseController
{

    public function __construct()
	{
		helper(['url', 'form']);
        
	}
    public function login()
    {
        $data = [];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => "Email or Password don't match",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

                return view('layouts/login', [
                    "validation" => $this->validator,
                ]);

            } else {
                $model = new UserModel();

                $user = $model->where('email', $this->request->getVar('email'))
                    ->first();

                // Storing session values
                $this->setUserSession($user);
                // Redirecting to dashboard after login
                return redirect()->to(base_url('dashboard'));

            }
        }
        return view('layouts/login');
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'name' => $user['name'],
            'lname' => $user['lname'],
            'phone_no' => $user['phone_no'],
            'email' => $user['email'],
            'profile_image' => $user['profile_image'],
            'role' => $user['role'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function register()
    {
        

        if ($this->request->getMethod() == 'post') {
            //let's do the validation here
            $rules = [
                'name' => 'required|min_length[3]|max_length[20]',
                'lname' => 'required|min_length[3]|max_length[20]',
                'phone_no' => 'required|min_length[11]|max_length[11]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[tbl_users.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'password_confirm' => 'matches[password]',
            ];

            if (!$this->validate($rules)) {
                $data = [];
                $model = new UserModel();
                $data['user'] = $model->where('id', session()->get('id'))->first();
                return view('UserMgmt/CreateUser', [
                    "validation" => $this->validator,
                ]);
            } else {
                $model = new UserModel();

                $file = $this->request->getFile('profile_image');
                $signFile = $this->request->getFile('signature');
    
                if($file->isValid() && ! $file -> hasMoved() && $signFile->isValid() && ! $signFile -> hasMoved()){
                    $imageName = $file->getRandomName();
                    $imageNameSign = $signFile->getRandomName();
                    $file->move('ProfilePics/', $imageName);
                    $signFile->move('Signature/', $imageNameSign);
                }else{
                    $imageName = null;
                    $imageNameSign = null;
                }

                $newData = [
                    'name' => $this->request->getPost('name'),
                    'lname' => $this->request->getPost('lname'),
                    'phone_no' => $this->request->getPost('phone_no'),
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password'),
                    'profile_image' => $imageName,
                    'signature' => $imageNameSign,
                ];

                $model->save($newData);
                $session = session();
                $session->setFlashdata('status', 'New User Added!');
                return redirect()->to(base_url('manageUser'));
            }
        }
     
    }



    public function table()
    {
        //to check if admin is logged in
        if (session()->get('role') != "admin") {
            echo 'Access denied!';
            exit;
        }
        $data = [];
        
        $tbl_users = new UserModel();
        $data['tbl_users'] = $tbl_users->findAll();
        $data['user'] = $tbl_users->where('id', session()->get('id'))->first();
        return view('UserMgmt/ManageUser', $data);
    }

    public function profile()
    {
        //to check if admin is logged in
        // if (session()->get('role') != "admin") {
        //     echo 'Access denied!';
        //     exit;
        // }
        $data = [];
        $model = new UserModel();

        $data['user'] = $model->where('id', session()->get('id'))->first();
        return view('profile', $data);
    }

    public function delete($id){
        //to check if admin is logged in
        if (session()->get('role') != "admin") {
            echo 'Access denied!';
            exit;
        }
        $model = new UserModel();
        $model->where('id', $id)->delete(); 
        return redirect()->to( base_url('manageUser'))->with('status', 'Data Deleted Successfully!');
    }
    
    public function profileGuest()
    {
        //to check if user is logged in
        if (session()->get('role') != "user") {
            echo 'Access denied!';
            exit;
        }
        $data = [];
        $model = new UserGuestModel();

        $data['user'] = $model->where('id', session()->get('id'))->first();
        return view('profile', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

//guest
public function guestIndex(){
    //to check if admin is logged in
    if (session()->get('role') != "admin") {
        echo 'Access denied!';
        exit;
    }
return view('UserMgmt/CreateGuest');
}




public function registerGuest()
{
    //to check if admin is logged in
    if (session()->get('role') != "admin") {
        echo 'Access denied!';
        exit;
    }
    if ($this->request->getMethod() == 'post') {
        //let's do the validation here
        $rules = [
            'name' => 'required|min_length[3]|max_length[20]',
            'lname' => 'required|min_length[3]|max_length[20]',
            'phone_no' => 'required|min_length[9]|max_length[20]',
            'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[tbl_users.email]',
            'password' => 'required|min_length[8]|max_length[255]',
            'password_confirm' => 'matches[password]',
        ];

        if (!$this->validate($rules)) {
            $data = [];
            $model = new UserGuestModel();
            $data['user'] = $model->where('id', session()->get('id'))->first();
            return view('UserMgmt/CreateUser', [
                "validation" => $this->validator,
            ]);
        } else {
            $model = new UserGuestModel();

            $file = $this->request->getFile('profile_image');
            $signFile = $this->request->getFile('signature');

            if($file->isValid() && ! $file -> hasMoved() && $signFile->isValid() && ! $signFile -> hasMoved()){
                $imageName = $file->getRandomName();
                $imageNameSign = $signFile->getRandomName();
                $file->move('ProfilePics/', $imageName);
                $signFile->move('Signature/', $imageNameSign);
            }else{
                $imageName = null;
                $imageNameSign = null;
            }

            $newData = [
                'name' => $this->request->getVar('name'),
                'lname' => $this->request->getVar('lname'),
                'phone_no' => $this->request->getVar('phone_no'),
                'email' => $this->request->getVar('email'),
                'password' => $this->request->getVar('password'),
                'profile_image' => $imageName,
                'signature' => $imageNameSign,
            ];
            $model->insert($newData);
            $session = session();
            $session->setFlashdata('status', 'New User Added!');
            return redirect()->to(base_url('manageGuestUser'));
        }
    }
 
}


public function guestTable(){

        //to check if admin is logged in
        if (session()->get('role') != "admin") {
            echo 'Access denied!';
            exit;
        }
    $data = [];
    
    $tbl_users_guest = new UserGuestModel();
    $data['tbl_users_guest'] = $tbl_users_guest->findAll();
    $tbl_users = new UserModel();
    $data['user'] = $tbl_users->where('id', session()->get('id'))->first();
    return view('UserMgmt/ManageGuest', $data);
}

public function deleteGuest($id){
    //to check if admin is logged in
    if (session()->get('role') != "admin") {
        echo 'Access denied!';
        exit;
    }
    $model = new UserGuestModel();
    $model->where('id', $id)->delete(); 
    return redirect()->to( base_url('manageGuestUser'))->with('status', 'Data Deleted Successfully!');
}
//guest

}