<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CustomersModel;
use App\Models\VerifierModel;
use App\Models\PersonnelModel;
use App\Models\Defaults;
use App\Models\ElectModel_image;
use Dompdf\Options; 

use App\Models\PHMeterStandardModel; 
// use App\Models\DigitalTimerStandardModel; 

class standardPHMeterController extends BaseController{

    public function standardTable(){
        $standardModel = new PHMeterStandardModel();
        $userModel = new UserModel();

        $data['standardData'] = $standardModel->where('status', 'active')->findAll();
        $data['user'] = $userModel->where('id', session()->get('id'))->first();
        
        return view('Standards/phMeter/phMeterTable',$data);
      
    }

    public function newStandardPHMeter(){
        $standardModel = new PHMeterStandardModel();
        $data = [
            'pHStandard' => $this->request->getPost('pHStandard'),
            'description' => $this->request->getPost('description'),
            'certificateNumber' => $this->request->getPost('certificateNumber'),
        
            'provider' => $this->request->getPost('provider'),
            'batchNumber' => $this->request->getPost('batchNumber'),
             'bufferUncertaintyStandard' => $this->request->getPost('bufferUncertaintyStandard'),
             'bufferTemperatureStandard' => $this->request->getPost('bufferTemperatureStandard'),
            // 'provider' => $this->request->getPost('provider'),
        ];

        $standardModel->insert($data);
        $standardID = $standardModel->insertID();
        return json_encode(['id' => $standardID]);

        $standardModel->insert($data);
        $standardID = $standardModel->insertID();
        return json_encode(['id' => $standardID]);
        
        // return redirect()->to(base_url('standard/pHStandard'))->with('status', 'Data Added Successfully!');
    }

    public function getStandardDataPHMeter(){
        $standardModel = new PHMeterStandardModel();
        $results['standardData'] = $standardModel->where('status','active')->findAll();
        return $this->response->setJSON($results);
    }

    public function updateStandardPHMeter(){
        $standardModel = new PHMeterStandardModel();
        $data = [
      
            'pHStandard' => $this->request->getPost('pHStandard'),
             'certificateNumber' => $this->request->getPost('certificateNumber'),
          
            // 'serialNumber' => $this->request->getPost('serialNumber'),
             'description' => $this->request->getPost('description'),
            'provider' => $this->request->getPost('provider'),

            'batchNumber' => $this->request->getPost('batchNumber'),
            'bufferUncertaintyStandard' => $this->request->getPost('bufferUncertaintyStandard'),
            'bufferTemperatureStandard' => $this->request->getPost('bufferTemperatureStandard'),


            // 'dateOfCalibration' => $this->request->getPost('dateOfCalibration'),
            // 'coverageFactor' => $this->request->getPost('coverageFactor'),
            'measurements' => $this->request->getPost('measurements'),
        ];

        $ID = $this->request->getPost('standardID');
        $standardModel->update($ID,$data);
        
        // return redirect()->to(base_url('standard/tempRecorder'))->with('status', 'Data Updated Successfully!');
    }

    public function updateStandardMeasurementsPHMeter(){
            $standardModel = new PHMeterStandardModel();
            $data = [
                // 'uncertainty' => $this->request->getPost('uncertainty'),
                'measurements' => $this->request->getPost('measurements'),
            ];

            $ID = $this->request->getPost('standardID');
            $standardModel->update($ID,$data);
            // return redirect()->to(base_url('standard/tempRecorder'))->with('status', 'Data Updated Successfully!');
    }

    public function removeStandard(){
        $standardModel = new PHMeterStandardModel;

        $id = $this->request->getPost('id');

        $data = [
                'status' => "inactive",
        ];
        $standardModel->where('id', $id)->set($data)->update();     
    }

}
