<?php namespace App\Controllers;

use App\Models\PersonnelModel;
use App\Models\VerifierModel;


class Personnel extends BaseController{
    
    public function personnelTable(){
        $model = new PersonnelModel();
        $VerifierModel = new VerifierModel();
        $data['personnel'] = $model->findAll();
        $data['verifier'] = $VerifierModel->findAll();
        return view('personnel', $data);
    }

    public function store(){
        $model = new PersonnelModel();
        $data = [
            'personnelName' => $this->request->getPost('personnelName'),
            'position' => $this->request->getPost('position'),
            'email' => $this->request->getPost('email'),
        ];
        $model->insert($data);
        #echo view('templates/header');
        return redirect()->to(base_url('personnelTable'))->with('status', 'Data Added Successfully!');
    }

    public function delete($id){
        $cus = new PersonnelModel();
        $cus->where('id', $id)->delete(); 
        return redirect()->to( base_url('personnelTable'))->with('status', 'Data Deleted Successfully!');
    }
   

    public function edit($id = null ){
        $model = new PersonnelModel();
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
          
        $model = new PersonnelModel();
 
        $id = $this->request->getVar('id');
 
         $data = [
            'personnelName'  => $this->request->getVar('personnelName'),
            'position'  => $this->request->getVar('position'),
            'email' => $this->request->getPost('email'),
            ];
 
        $update = $model->update($id,$data);
        return redirect()->to( base_url('personnelTable'))->with('status', 'Data Updated Successfully!');
        /*if($update != false)
        {
            $data = $model->where('id', $id)->first();
            echo json_encode(array("status" => true , 'data' => $data));
        }
        else{
            echo json_encode(array("status" => false , 'data' => $data));
        }*/
    }



    }
