<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CustomersModel;
use App\Models\VerifierModel;
use App\Models\PersonnelModel;
use App\Models\Defaults;
use App\Models\ElectModel_image;
use Dompdf\Options; 

use App\Models\BalanceStandardModel; 

class standardBalanceController extends BaseController{

    public function table(){
        $standardModel = new BalanceStandardModel();
        $userModel = new UserModel();

        $data['standardData'] = $standardModel->findAll();
        $data['user'] = $userModel->where('id', session()->get('id'))->first();

        return view('Standards/balance/balanceTable',$data);

    }
    
    public function newStandard(){
        $standardModel = new BalanceStandardModel();
        $data = [
            'balance' => $this->request->getPost('balance'),
            'description' => $this->request->getPost('description'),
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'provider' => $this->request->getPost('provider'),
            'empty1' => $this->request->getPost('empty1'),
            'full1' => $this->request->getPost('full1'),
            'empty2' => $this->request->getPost('empty2'),
            'full2' => $this->request->getPost('full2'),
            'empty3' => $this->request->getPost('empty3'),
            'full3' => $this->request->getPost('full3'),
            'empty4' => $this->request->getPost('empty4'),
            'full4' => $this->request->getPost('full4'),
            'empty5' => $this->request->getPost('empty5'),
            'full5' => $this->request->getPost('full5'),
            'emptySD' => $this->request->getPost('emptySD'),
            'fullSD' => $this->request->getPost('fullSD'),
            'nominalEmpty' => $this->request->getPost('nominalEmpty'),
            'nominalFull' => $this->request->getPost('nominalFull'),
            'sensitivityWeight' => $this->request->getPost('sensitivityWeight'),
            'uncertSensitivityWeight' => $this->request->getPost('uncertSensitivityWeight'),
            'sensitivityWeightDelta' => $this->request->getPost('sensitivityWeightDelta'),
            'uncertSensitivityWeightDelta' => $this->request->getPost('uncertSensitivityWeightDelta'),
            'pooledValue' => $this->request->getPost('pooledValue'),
            'maximumValue' => $this->request->getPost('maximumValue'),
            'minimumValue' => $this->request->getPost('minimumValue'),
            'differenceValue' => $this->request->getPost('differenceValue'),
            'dateCalibrated' => $this->request->getPost('dateCalibrated'),
            'resolution1' => $this->request->getPost('resolution1'),
            'resolution2' => $this->request->getPost('resolution2'),
            'conditionForResolution' => $this->request->getPost('conditionForResolution'),
        ];

        $standardModel->insert($data);
        return redirect()->to(base_url('standard/balance'))->with('status', 'Data Added Successfully!');
    }
    
    public function deleteStandard($id){
        $standardModel = new BalanceStandardModel();
        $standardModel->where('id', $id)->delete(); 
        return redirect()->to(base_url('standard/balance'))->with('status', 'Data Deleted Successfully!');
    }

    public function updateStandard(){
        $standardModel = new BalanceStandardModel();
        $data = [
            'balance' => $this->request->getPost('balanceEdit'),
            'description' => $this->request->getPost('descriptionEdit'),
            'certificateNumber' => $this->request->getPost('certificateNumberEdit'),
            'provider' => $this->request->getPost('providerEdit'),
            'dateCalibrated' => $this->request->getPost('dateCalibratedEdit'),
            'nominalEmpty' => $this->request->getPost('nominalEmptyEdit'),
            'nominalFull' => $this->request->getPost('nominalFullEdit'),
            'empty1' => $this->request->getPost('empty1Edit'),
            'full1' => $this->request->getPost('full1Edit'),
            'empty2' => $this->request->getPost('empty2Edit'),
            'full2' => $this->request->getPost('full2Edit'),
            'empty3' => $this->request->getPost('empty3Edit'),
            'full3' => $this->request->getPost('full3Edit'),
            'empty4' => $this->request->getPost('empty4Edit'),
            'full4' => $this->request->getPost('full4Edit'),
            'empty5' => $this->request->getPost('empty5Edit'),
            'full5' => $this->request->getPost('full5Edit'),
            'emptySD' => $this->request->getPost('emptySDEdit'),
            'fullSD' => $this->request->getPost('fullSDEdit'),
            'sensitivityWeightDelta' => $this->request->getPost('sensitivityWeightDeltaEdit'),
            'uncertSensitivityWeightDelta' => $this->request->getPost('uncertSensitivityWeightDeltaEdit'),
            'sensitivityWeight' => $this->request->getPost('sensitivityWeightEdit'),
            'uncertSensitivityWeight' => $this->request->getPost('uncertSensitivityWeightEdit'),
            'pooledValue' => $this->request->getPost('pooledValueEdit'),
            'maximumValue' => $this->request->getPost('maximumValueEdit'),
            'minimumValue' => $this->request->getPost('minimumValueEdit'),
            'differenceValue' => $this->request->getPost('differenceValueEdit'),
            'resolution1' => $this->request->getPost('resolution1Edit'),
            'conditionForResolution' => $this->request->getPost('conditionForResolutionEdit'),
            'resolution2' => $this->request->getPost('resolution2Edit'),
            'measurements' => $this->request->getPost('measurements'),
        ];
        $ID = $this->request->getPost('standardID');
        $standardModel->update($ID,$data);
        return redirect()->to(base_url('standard/balance'))->with('status', 'Data Updated Successfully!');
    }
}