<?php namespace App\Controllers;

use App\Models\VerifierModel;


class Verifier extends BaseController{
    

    public function store(){
        $model = new VerifierModel();
        $data = [
            'verifierName' => $this->request->getPost('verifierName'),
            'verifierPosition' => $this->request->getPost('verifierPosition'),
            'verifierEmail' => $this->request->getPost('verifierEmail'),
        ];
        $model->insert($data);
        #echo view('templates/header');
        return redirect()->to(base_url('personnelTable'))->with('status', 'Data Added Successfully!');
    }

    public function delete($id){
        $cus = new VerifierModel();
        $cus->where('verifier_id', $id)->delete(); 
        return redirect()->to( base_url('personnelTable'))->with('status', 'Data Deleted Successfully!');
    }
   

    public function edit($id = null ){
        $model = new VerifierModel();
        $data = $model->where('verifier_id', $id)->first();  
        if($data){
            echo json_encode(array("status" => true , 'data' => $data));
        }else{
            echo json_encode(array("status" => false));
        }
    } 
    public function update()
    {  
  
        helper(['form', 'url']);
          
        $model = new VerifierModel();
 
        $id = $this->request->getVar('verifier_id');
 
         $data = [
            'verifierName'  => $this->request->getVar('verifierName'),
            'verifierPosition'  => $this->request->getVar('verifierPosition'),
            'verifierEmail' => $this->request->getPost('verifierEmail'),
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
