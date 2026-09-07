<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CustomersModel;
use App\Models\VerifierModel;
use App\Models\PersonnelModel;
use App\Models\Defaults;
use App\Models\ElectModel_image;
use Dompdf\Options; 

use App\Models\BarometerStandardModel; 

class standardBarometerController extends BaseController{

    public function table(){
        $standardModel = new BarometerStandardModel();
        $userModel = new UserModel();

        $data['standardData'] = $standardModel->findAll();
        $data['user'] = $userModel->where('id', session()->get('id'))->first();

        return view('Standards/Barometer/barometerTable',$data);

    }
    
    public function newStandard(){
        $standardModel = new BarometerStandardModel();
        $data = [
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'description' => $this->request->getPost('description'),
            'provider' => $this->request->getPost('provider'),
            'resolution' => $this->request->getPost('resolution'),
            'uncertaintyHPA' => $this->request->getPost('uncertaintyHPA'),
            'uncertaintyRH' => $this->request->getPost('uncertaintyRH'),
            'uncertaintyTEMPAIR' => $this->request->getPost('uncertaintyTEMPAIR'),
        ];
        $standardModel->insert($data);
        return redirect()->to(base_url('standard/barometer'))->with('status', 'Data Added Successfully!');
    }
    
    public function deleteStandard($id){
        $standardModel = new BarometerStandardModel();
        $standardModel->where('id', $id)->delete(); 
        return redirect()->to(base_url('standard/barometer'))->with('status', 'Data Deleted Successfully!');
    }

    public function updateStandard(){
        $standardModel = new BarometerStandardModel();
        $data = [
            'certificateNumber' => $this->request->getPost('certificateNumberEdit'),
            'serialNumber' => $this->request->getPost('serialNumberEdit'),
            'description' => $this->request->getPost('descriptionEdit'),
            'provider' => $this->request->getPost('providerEdit'),
            'resolution' => $this->request->getPost('resolutionEdit'),
            'uncertaintyHPA' => $this->request->getPost('uncertaintyHPAEdit'),
            'uncertaintyRH' => $this->request->getPost('uncertaintyRHEdit'),
            'uncertaintyTEMPAIR' => $this->request->getPost('uncertaintyTEMPAIREdit'),
        ];
        $ID = $this->request->getPost('standardID');
        $standardModel->update($ID,$data);
        return redirect()->to(base_url('standard/barometer'))->with('status', 'Data Updated Successfully!');
    }
}
