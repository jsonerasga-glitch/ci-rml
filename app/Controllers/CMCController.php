<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CustomersModel;
use App\Models\VerifierModel;
use App\Models\PersonnelModel;
use App\Models\Defaults;
use App\Models\CMCmodel;
use App\Models\PlaceholderModel;
use Dompdf\Options; 


class CMCController extends BaseController{
	public function cmc(){
        return view('layouts/cmc');        
    }

    public function get_cmc_data_full(){
        $cmcModel = new CMCmodel();
        $data['cmcData'] = $cmcModel->findAll();

        return $this->response->setJSON($data);
    }

    public function save_data(){
        $cmcModel = new CMCmodel();
        $data = [
            'conditions' => $this->request->getPost('conditions'),
            'moduleNumber' => $this->request->getPost('moduleNumber'),
        ];        
        $cmcModel->insert($data);
        $worksheetID = $cmcModel->insertID();
        return json_encode(['id' => $worksheetID]);
    }

    public function update_data(){
        $cmcModel = new CMCmodel();
        $data = [
            'conditions' => $this->request->getPost('conditions'),
            'moduleNumber' => $this->request->getPost('moduleNumber'),
        ];        
        $id = $this->request->getPost('conditionID');
        $cmcModel->update($id,$data);
        return json_encode(['id' => $id]);
    }


}
