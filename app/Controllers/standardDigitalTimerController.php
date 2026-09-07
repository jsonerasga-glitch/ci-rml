<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CustomersModel;
use App\Models\VerifierModel;
use App\Models\PersonnelModel;
use App\Models\Defaults;
use App\Models\ElectModel_image;
use Dompdf\Options; 

use App\Models\DigitalTimerStandardModel; 

class standardDigitalTimerController extends BaseController{

    public function standardTable(){
 
        $userModel = new UserModel();
        $data = [];
        $data['user'] = $userModel->where('id', session()->get('id'))->first();
        return view('Standards/digitalTimer/digitalTimerTable',$data);
    }
    
    // public function newStandard(){
    //     $standardModel = new DigitalTimerStandardModel();
    //     $data = [

   
    //         'certificateNumber' => $this->request->getPost('certificateNumber'),
    //         'serialNumber' => $this->request->getPost('serialNumber'),
    //         'description' => $this->request->getPost('description'),
    //         'provider' => $this->request->getPost('provider'),
    //         'dateOfCalibration' => $this->request->getPost('dateOfCalibration'),
    //         'coverageFactor' => $this->request->getPost('coverageFactor'),
    //         'measurements' => $this->request->getPost('measurements'),

    //     ];
    //     $standardModel->insert($data);
    //     return redirect()->to(base_url('standard/digitalTimer'))->with('status', 'Data Added Successfully!');
    // }
    
    public function newStandardDigitalTimer(){
        $standardModel = new DigitalTimerStandardModel();
        $data = [
      
            'serialNumber' => $this->request->getPost('serialNumber'),
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'description' => $this->request->getPost('description'),
            'provider' => $this->request->getPost('provider'),
            'dateOfCalibration' => $this->request->getPost('dateOfCalibration'),
            'coverageFactor' => $this->request->getPost('coverageFactor'),
        ];

        $standardModel->insert($data);
        $standardID = $standardModel->insertID();
        return json_encode(['id' => $standardID]);

    }
    public function getStandardDataDigitalTimer(){
        $standardModel = new DigitalTimerStandardModel();
        $results['standardData'] = $standardModel->where('status', 'active')->findAll();
        return $this->response->setJSON($results);
    }  

    public function updateStandardDigitalTimer(){
        $standardModel = new DigitalTimerStandardModel();
        $data = [
      
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'description' => $this->request->getPost('description'),
            'provider' => $this->request->getPost('provider'),
            'dateOfCalibration' => $this->request->getPost('dateOfCalibration'),
            'coverageFactor' => $this->request->getPost('coverageFactor'),
            'measurements' => $this->request->getPost('measurements'),
        ];

        $ID = $this->request->getPost('standardID');
        $standardModel->update($ID,$data);
        return redirect()->to(base_url('standard/phMeter'))->with('status', 'Data Updated Successfully!');
      
    }

    public function updateStandardMeasurementsDigitalTimer(){
        $standardModel = new DigitalTimerStandardModel();
        $data = [
            'uncertainty' => $this->request->getPost('uncertainty'),
            'measurements' => $this->request->getPost('measurements'),
        ];

        $ID = $this->request->getPost('standardID');
        $standardModel->update($ID,$data);
        
    }

    public function removeStandard(){
        $standardModel = new DigitalTimerStandardModel;

        $id = $this->request->getPost('id');

        $data = [
                'status' => "inactive",
        ];
        $standardModel->where('id', $id)->set($data)->update();     
    }
}


