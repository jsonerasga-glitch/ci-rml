<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\UserGuestModel;

use Config\Services;

class UserController extends BaseController
{

    //create admin
    public function index(){
        return view('UserMgmt/CreateUser');
    }
    public function store(){
        $userModel = new UserModel();
        $data = [
            'lname' => $this->request->getPost('lname'),
            'fname' => $this->request->getPost('fname'),
            'mname' => $this->request->getPost('mname'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
        ];
        $userModel->insert($data);
        return redirect()->to(base_url('createUser'))->with('status', 'Data Added Successfully!');
    }

    public function manage(){
        $user_admin = new UserModel();
        $data['user_admin'] = $user_admin->findAll();
        return view('UserMgmt/ManageUser', $data);
    }
    //create admin

    //user guest
    
    public function storeGuestindex(){
        return view('UserMgmt/CreateGuest');
    }  

    public function storeGuest(){
        $userModel = new UserGuestModel();
        $data = [
            'lname' => $this->request->getPost('lname'),
            'fname' => $this->request->getPost('fname'),
            'mname' => $this->request->getPost('mname'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
        ];
        $userModel->insert($data);
        return redirect()->to(base_url('guestUserIndex'))->with('status', 'User Added Successfully!');
    }
    //user guest

    public function changePassword(){
        $acc_role = $this->request->getPost('acc_role');
        if($acc_role == 'admin'){
            $model = new UserModel();
        }else{
            $model = new UserGuestModel();
        }

        $acc_id = $this->request->getPost('acc_id');
        $email = $this->request->getPost('email');

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
            ];
    
            if ($this->validate($rules)) {
                $model = new UserModel();
    
                $newData = [
                    'password' => $this->request->getPost('password_new'),
                ];

                $model->update($acc_id,$newData);
                
                return redirect()->to(base_url('profile'))->with('status', 'Password Changed Successfully!');
            }else{
                return redirect()->to(base_url('profile'))->with('status', 'Email or Password Error');
            }
        }
         
    } 

   

}