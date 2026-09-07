<?php namespace App\Controllers;

use App\Models\CustomersModel;
use App\Models\About;
use App\Models\Chamber;


class Customer extends BaseController{
    
	public function __construct()
	{
		$this->db = \Config\Database::connect();
        
        //to check if admin is logged in
        // if (session()->get('role') != "admin") {
        //     echo 'Access denied!';
        //     exit;
        // }
	}
    public function customerTable(){
        $cus = new CustomersModel();
        $data['customerdetails'] = $cus->findAll();
        return view('Customer/ManageCustomer', $data);
    }

    public function store(){
        $cus = new CustomersModel();
        $data = [
            'customer' => $this->request->getPost('customer'),
            'address' => $this->request->getPost('address'),
        ];
        $cus->insert($data);
        #echo view('templates/header');
        return redirect()->to(base_url('customerTable'))->with('status', 'Data Added Successfully!');
    }

    public function delete($id){
        $cus = new CustomersModel();
        $cus->where('id', $id)->delete(); 
        return redirect()->to( base_url('customerTable'))->with('status', 'Data Deleted Successfully!');
    }
   

    public function edit($id = null ){
        $model = new CustomersModel();
        $data = $model->where('id', $id)->first();  
        if($data){
            echo json_encode(array("status" => true , 'data' => $data));
        }else{
            echo json_encode(array("status" => false));
        }
    } 
    public function update()
    {  
  
        helper(['form', 'url']);
          
        $model = new CustomersModel();
 
        $id = $this->request->getVar('id');
 
         $data = [
            'customer'  => $this->request->getVar('customer'),
            'address'  => $this->request->getVar('address'),
            ];
 
        $update = $model->update($id,$data);
        return redirect()->to( base_url('customerTable'))->with('status', 'Data Updated Successfully!');
        /*if($update != false)
        {
            $data = $model->where('id', $id)->first();
            echo json_encode(array("status" => true , 'data' => $data));
        }
        else{
            echo json_encode(array("status" => false , 'data' => $data));
        }*/
    }

    public function about(){
        $model = new About();
        $data['about'] = $model->findAll();
        return view('Customer/about', $data);
    }

    public function aboutEdit($id = null ){
        $model = new About();
        $data = $model->where('id', $id)->first();  
        if($data){
            echo json_encode(array("status" => true , 'data' => $data));
        }else{
            echo json_encode(array("status" => false));
        }
    } 

    public function updateAbout(){  
        $model = new About();
 
        $id = $this->request->getPost('id');
 
         $data = [
            'tel'  => $this->request->getPost('tel'),
            'email'  => $this->request->getPost('email'),
            'url'  => $this->request->getPost('url'),
            ];
 
        $update = $model->update($id,$data);
    }

    }
