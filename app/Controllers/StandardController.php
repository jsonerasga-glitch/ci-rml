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
use App\Models\BalanceStandardModel; 
use App\Models\TemperatureRecorderModel; 
use App\Models\ReferenceThermoHygrometerStandard; 
use App\Models\WirelessTemperatureLoggerModel;
use App\Models\ElectModel_2; //reference weight details
use App\Models\ElectModel_3; //reference weight values
use App\Models\MultiProductCalibratorStandardModel; //multi-product calibrator details
use App\Models\MultiProductCalibratorStandardValuesModel; //multi-product calibrator values
use App\Models\TemperatureSource;
use App\Models\CurrentCoilModel;
use App\Models\GaugeBlockModel;//gauge block details
use App\Models\GaugeBlockUncertaintyModel;//gauge block uncertainty
use App\Models\GaugeBlockMeasurementModel;//gauge block measurements
use App\Models\ChamberStandardModel;




use App\Models\DocumentingProcessCalibratorStandardModel; //documenting process calibrator details
use App\Models\DocumentingProcessCalibratorStandardValuesModel; //docuemnting process calibrator values

use App\Models\BufferSolutionStandardModel; 
use App\Models\BufferSolutionStandardValuesModel; 


use App\Models\DigitalTimerStandardModel; //documenting process calibrator details
use App\Models\DigitalTimerStandardValuesModel; //docuemnting process calibrator values

class StandardController extends BaseController{
//barometer
    public function tableBarometer(){
        $standardModel = new BarometerStandardModel();
        $userModel = new UserModel();

        $data['standardData'] = $standardModel->findAll();
        $data['user'] = $userModel->where('id', session()->get('id'))->first();

        return view('Standards/Barometer/barometerTable',$data);

    }
    
    public function newStandardBarometer(){
        $standardModel = new BarometerStandardModel();
        $data = [
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'description' => $this->request->getPost('description'),
            'provider' => $this->request->getPost('provider'),
            'dateOfCalibration' => $this->request->getPost('dateOfCalibration'),
            'resolution' => $this->request->getPost('resolution'),
            'uncertaintyHPA' => $this->request->getPost('uncertaintyHPA'),
            'uncertaintyRH' => $this->request->getPost('uncertaintyRH'),
            'uncertaintyTEMPAIR' => $this->request->getPost('uncertaintyTEMPAIR'),
        ];
        $standardModel->insert($data);
        return redirect()->to(base_url('standard/barometer'))->with('status', 'Data Added Successfully!');
    }
    
    public function deleteStandardBarometer($id){
        $standardModel = new BarometerStandardModel();
        $standardModel->where('id', $id)->delete(); 
        return redirect()->to(base_url('standard/barometer'))->with('status', 'Data Deleted Successfully!');
    }

    public function updateStandardBarometer(){
        $standardModel = new BarometerStandardModel();
        $data = [
            'certificateNumber' => $this->request->getPost('certificateNumberEdit'),
            'serialNumber' => $this->request->getPost('serialNumberEdit'),
            'description' => $this->request->getPost('descriptionEdit'),
            'dateOfCalibration' => $this->request->getPost('dateOfCalibrationEdit'),
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
    
//balance
    // public function tableBalance(){
    //     $standardModel = new BalanceStandardModel();
    //     $userModel = new UserModel();

    //     $data['standardData'] = $standardModel->findAll();
    //     $data['user'] = $userModel->where('id', session()->get('id'))->first();

    //     return view('Standards/balance/balanceTable',$data);

    // }
    
    // public function newStandardBalance(){
    //     $standardModel = new BalanceStandardModel();
    //     $data = [
    //         'balance' => $this->request->getPost('balance'),
    //         'description' => $this->request->getPost('description'),
    //         'certificateNumber' => $this->request->getPost('certificateNumber'),
    //         'provider' => $this->request->getPost('provider'),
    //         'empty1' => $this->request->getPost('empty1'),
    //         'full1' => $this->request->getPost('full1'),
    //         'empty2' => $this->request->getPost('empty2'),
    //         'full2' => $this->request->getPost('full2'),
    //         'empty3' => $this->request->getPost('empty3'),
    //         'full3' => $this->request->getPost('full3'),
    //         'empty4' => $this->request->getPost('empty4'),
    //         'full4' => $this->request->getPost('full4'),
    //         'empty5' => $this->request->getPost('empty5'),
    //         'full5' => $this->request->getPost('full5'),
    //         'emptySD' => $this->request->getPost('emptySD'),
    //         'fullSD' => $this->request->getPost('fullSD'),
    //         'nominalEmpty' => $this->request->getPost('nominalEmpty'),
    //         'nominalFull' => $this->request->getPost('nominalFull'),
    //         'sensitivityWeight' => $this->request->getPost('sensitivityWeight'),
    //         'uncertSensitivityWeight' => $this->request->getPost('uncertSensitivityWeight'),
    //         'sensitivityWeightDelta' => $this->request->getPost('sensitivityWeightDelta'),
    //         'uncertSensitivityWeightDelta' => $this->request->getPost('uncertSensitivityWeightDelta'),
    //         'pooledValue' => $this->request->getPost('pooledValue'),
    //         'maximumValue' => $this->request->getPost('maximumValue'),
    //         'minimumValue' => $this->request->getPost('minimumValue'),
    //         'differenceValue' => $this->request->getPost('differenceValue'),
    //         'dateCalibrated' => $this->request->getPost('dateCalibrated'),
    //         'resolution1' => $this->request->getPost('resolution1'),
    //         'resolution2' => $this->request->getPost('resolution2'),
    //         'conditionForResolution' => $this->request->getPost('conditionForResolution'),
    //     ];

    //     $standardModel->insert($data);
    //     return redirect()->to(base_url('standard/balance'))->with('status', 'Data Added Successfully!');
    // }
    
    // public function deleteStandardBalance($id){
    //     $standardModel = new BalanceStandardModel();
    //     $standardModel->where('id', $id)->delete(); 
    //     return redirect()->to(base_url('standard/balance'))->with('status', 'Data Deleted Successfully!');
    // }

    // public function updateStandardBalance(){
    //     $standardModel = new BalanceStandardModel();
    //     $data = [
    //         'balance' => $this->request->getPost('balanceEdit'),
    //         'description' => $this->request->getPost('descriptionEdit'),
    //         'certificateNumber' => $this->request->getPost('certificateNumberEdit'),
    //         'provider' => $this->request->getPost('providerEdit'),
    //         'dateCalibrated' => $this->request->getPost('dateCalibratedEdit'),
    //         'nominalEmpty' => $this->request->getPost('nominalEmptyEdit'),
    //         'nominalFull' => $this->request->getPost('nominalFullEdit'),
    //         'empty1' => $this->request->getPost('empty1Edit'),
    //         'full1' => $this->request->getPost('full1Edit'),
    //         'empty2' => $this->request->getPost('empty2Edit'),
    //         'full2' => $this->request->getPost('full2Edit'),
    //         'empty3' => $this->request->getPost('empty3Edit'),
    //         'full3' => $this->request->getPost('full3Edit'),
    //         'empty4' => $this->request->getPost('empty4Edit'),
    //         'full4' => $this->request->getPost('full4Edit'),
    //         'empty5' => $this->request->getPost('empty5Edit'),
    //         'full5' => $this->request->getPost('full5Edit'),
    //         'emptySD' => $this->request->getPost('emptySDEdit'),
    //         'fullSD' => $this->request->getPost('fullSDEdit'),
    //         'sensitivityWeightDelta' => $this->request->getPost('sensitivityWeightDeltaEdit'),
    //         'uncertSensitivityWeightDelta' => $this->request->getPost('uncertSensitivityWeightDeltaEdit'),
    //         'sensitivityWeight' => $this->request->getPost('sensitivityWeightEdit'),
    //         'uncertSensitivityWeight' => $this->request->getPost('uncertSensitivityWeightEdit'),
    //         'pooledValue' => $this->request->getPost('pooledValueEdit'),
    //         'maximumValue' => $this->request->getPost('maximumValueEdit'),
    //         'minimumValue' => $this->request->getPost('minimumValueEdit'),
    //         'differenceValue' => $this->request->getPost('differenceValueEdit'),
    //         'resolution1' => $this->request->getPost('resolution1Edit'),
    //         'conditionForResolution' => $this->request->getPost('conditionForResolutionEdit'),
    //         'resolution2' => $this->request->getPost('resolution2Edit'),
    //         'measurements' => $this->request->getPost('measurements'),
    //     ];
    //     $ID = $this->request->getPost('standardID');
    //     $standardModel->update($ID,$data);
    //     return redirect()->to(base_url('standard/balance'))->with('status', 'Data Updated Successfully!');
    // }

//temperature recorder 
    public function tableTempRecorder(){
        $standardModel = new TemperatureRecorderModel();
        $userModel = new UserModel();

        $data['standardData'] = $standardModel->findAll();
        $data['user'] = $userModel->where('id', session()->get('id'))->first();

        return view('Standards/Temperature Recorder/temperatureRecorderTable',$data);

    }
    
    public function newStandardTempRecorder(){
        $standardModel = new TemperatureRecorderModel();
        $data = [
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'description' => $this->request->getPost('description'),
            'brand' => $this->request->getPost('brand'),
            'model' => $this->request->getPost('model'),
            'provider' => $this->request->getPost('provider'),
            'dateOfCalibration' => $this->request->getPost('dateOfCalibration'),
        ];

        $standardModel->insert($data);
        $standardID = $standardModel->insertID();
        return json_encode(['id' => $standardID]);
        //return redirect()->to(base_url('standard/tempRecorder'))->with('status', 'Data Added Successfully!');
    }
    
    public function deleteStandardTempRecorder($id){
        $standardModel = new TemperatureRecorderModel();
        $standardModel->where('id', $id)->delete(); 
        return;
        //return redirect()->to(base_url('standard/tempRecorder'))->with('status', 'Data Deleted Successfully!');
    }

    public function updateStandardTempRecorder(){
        $standardModel = new TemperatureRecorderModel();
        $data = [
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'description' => $this->request->getPost('description'),
            'brand' => $this->request->getPost('brand'),
            'model' => $this->request->getPost('model'),
            'provider' => $this->request->getPost('provider'),
            'dateOfCalibration' => $this->request->getPost('dateOfCalibration'),
            
        ];

        $ID = $this->request->getPost('standardID');
        $standardModel->update($ID,$data);
        // return redirect()->to(base_url('standard/tempRecorder'))->with('status', 'Data Updated Successfully!');
    }
    public function updateStandardMeasurementsTempRecorder(){
        $standardModel = new TemperatureRecorderModel();
        $data = [
            'uncertainty' => $this->request->getPost('uncertainty'),
            'measurements' => $this->request->getPost('measurements'),
        ];

        $ID = $this->request->getPost('standardID');
        $standardModel->update($ID,$data);
        // return redirect()->to(base_url('standard/tempRecorder'))->with('status', 'Data Updated Successfully!');
    }

    public function getStandardDataTempRecorder(){
        $standardModel = new TemperatureRecorderModel();
        $results['standardData'] = $standardModel->findAll();
        return $this->response->setJSON($results);
    }
//wireless temperature logger 
    public function tableWirelessTempLogger(){
        $standardModel = new WirelessTemperatureLoggerModel();
        $userModel = new UserModel();

        $data['standardData'] = $standardModel->findAll();
        $data['user'] = $userModel->where('id', session()->get('id'))->first();

        return view('Standards/Wireless Temperature Logger/wirelessTemperatureLoggerTable',$data);

    }

    public function newStandardWirelessTempLogger(){
        $standardModel = new WirelessTemperatureLoggerModel();
        $data = [
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'description' => $this->request->getPost('description'),
            'brand' => $this->request->getPost('brand'),
            'model' => $this->request->getPost('model'),
            'provider' => $this->request->getPost('provider'),
            'dateOfCalibration' => $this->request->getPost('dateOfCalibration'),
        ];

        $standardModel->insert($data);
        $standardID = $standardModel->insertID();
        return json_encode(['id' => $standardID]);
        //return redirect()->to(base_url('standard/tempRecorder'))->with('status', 'Data Added Successfully!');
    }

    public function deleteStandardWirelessTempLogger($id){
        $standardModel = new WirelessTemperatureLoggerModel();
        $standardModel->where('id', $id)->delete(); 
        return;
        //return redirect()->to(base_url('standard/tempRecorder'))->with('status', 'Data Deleted Successfully!');
    }

    public function updateStandardWirelessTempLogger(){
        $standardModel = new WirelessTemperatureLoggerModel();
        $data = [
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'description' => $this->request->getPost('description'),
            'brand' => $this->request->getPost('brand'),
            'model' => $this->request->getPost('model'),
            'provider' => $this->request->getPost('provider'),
            'dateOfCalibration' => $this->request->getPost('dateOfCalibration'),
            'measurements' => $this->request->getPost('measurements'),
        ];

        $ID = $this->request->getPost('standardID');
        $standardModel->update($ID,$data);
        // return redirect()->to(base_url('standard/tempRecorder'))->with('status', 'Data Updated Successfully!');
    }
    public function updateStandardMeasurementsWirelessTempLogger(){
        $standardModel = new WirelessTemperatureLoggerModel();
        $data = [
            'uncertainty' => $this->request->getPost('uncertainty'),
            'measurements' => $this->request->getPost('measurements'),
        ];

        $ID = $this->request->getPost('standardID');
        $standardModel->update($ID,$data);
        // return redirect()->to(base_url('standard/tempRecorder'))->with('status', 'Data Updated Successfully!');
    }

    public function getStandardDataWirelessTempLogger(){
        $standardModel = new WirelessTemperatureLoggerModel();
        $results['standardData'] = $standardModel->findAll();
        return $this->response->setJSON($results);
    }
//thermo-hygrometer 
    public function tableThermoHygrometer(){
        $standardModel = new ReferenceThermoHygrometerStandard();
        $userModel = new UserModel();

        $data['standardData'] = $standardModel->findAll();
        $data['user'] = $userModel->where('id', session()->get('id'))->first();

        return view('Standards/Reference ThermoHygrometer/thermoHygrometerTable',$data);

    }

    public function newStandardThermoHygrometer(){
        $standardModel = new ReferenceThermoHygrometerStandard();
        $data = [
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'description' => $this->request->getPost('description'),
            'brand' => $this->request->getPost('brand'),
            'model' => $this->request->getPost('model'),
            'provider' => $this->request->getPost('provider'),
            'dateOfCalibration' => $this->request->getPost('dateOfCalibration'),
        ];

        $standardModel->insert($data);
        $standardID = $standardModel->insertID();
        return json_encode(['id' => $standardID]);
        //return redirect()->to(base_url('standard/tempRecorder'))->with('status', 'Data Added Successfully!');
    }

    public function deleteStandardThermoHygrometer($id){
        $standardModel = new ReferenceThermoHygrometerStandard();
        $standardModel->where('id', $id)->delete(); 
        return;
        //return redirect()->to(base_url('standard/tempRecorder'))->with('status', 'Data Deleted Successfully!');
    }

    public function updateStandardThermoHygrometer(){
        $standardModel = new ReferenceThermoHygrometerStandard();
        $data = [
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'description' => $this->request->getPost('description'),
            'brand' => $this->request->getPost('brand'),
            'model' => $this->request->getPost('model'),
            'provider' => $this->request->getPost('provider'),
            'dateOfCalibration' => $this->request->getPost('dateOfCalibration'),
            'measurements' => $this->request->getPost('measurements'),
        ];

        $ID = $this->request->getPost('standardID');
        $standardModel->update($ID,$data);
        // return redirect()->to(base_url('standard/tempRecorder'))->with('status', 'Data Updated Successfully!');
    }
    public function updateStandardMeasurementsThermoHygrometer(){
        $standardModel = new ReferenceThermoHygrometerStandard();
        $data = [
            'uncertainty' => $this->request->getPost('uncertainty'),
            'measurements' => $this->request->getPost('measurements'),
        ];

        $ID = $this->request->getPost('standardID');
        $standardModel->update($ID,$data);
        // return redirect()->to(base_url('standard/tempRecorder'))->with('status', 'Data Updated Successfully!');
    }

    public function getStandardDataThermoHygrometer(){
        $standardModel = new ReferenceThermoHygrometerStandard();
        $results['standardData'] = $standardModel->findAll();
        return $this->response->setJSON($results);
    }
//reference weight
    public function tableReferenceWeight(){
        $standardModel = new ElectModel_2();
        $standardValueModel = new ElectModel_3();
        $userModel = new UserModel();

        $data['standardData'] = $standardModel->where('status', 'active')->findAll();
        $data['standardValue'] = $standardValueModel->where('status', 'active')->findAll();
        $data['user'] = $userModel->where('id', session()->get('id'))->first();

        return view('Standards/Reference Weight/referenceWeightTable',$data);
    }
    public function getStandardDataReferenceWeight(){
        $standardModel = new ElectModel_2();
        $results['standardData'] = $standardModel->where('status', 'active')->findAll();
        return $this->response->setJSON($results);
    }
    public function getStandardValuesReferenceWeightByDetailsID(){
        $standardModel = new ElectModel_3();
        $standardID = $this->request->getPost('selectedStandardID');
        $results['standardValues'] = $standardModel->where('status', 'active')->whereIn('standardID', $standardID)->findAll();
        return $this->response->setJSON($results);
    }
    public function newStandardReferenceWeight(){
        $standardModel = new ElectModel_2();
        $data = [
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'description' => $this->request->getPost('description'),
            'calibrationProvider' => $this->request->getPost('provider'),
            'class' => $this->request->getPost('equipmentClass'),
            'type' => $this->request->getPost('type'),
            'manufacturer' => $this->request->getPost('manufacturer'),
            'dateOfCalibration' => $this->request->getPost('dateOfCalibration'),
            'prevAirDensity' => $this->request->getPost('prevAirDensity'),
            'coverageFactor' => $this->request->getPost('coverageFactor'),
        ];

        $standardModel->insert($data);
        $standardID = $standardModel->insertID();
        return json_encode(['id' => $standardID]);
        //return redirect()->to(base_url('standard/tempRecorder'))->with('status', 'Data Added Successfully!');
    }
    public function updateStandardReferenceWeight(){
        $standardModel = new ElectModel_2();
        $data = [
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'description' => $this->request->getPost('description'),
            'calibrationProvider' => $this->request->getPost('provider'),
            'class' => $this->request->getPost('equipmentClass'),
            'type' => $this->request->getPost('type'),
            'manufacturer' => $this->request->getPost('manufacturer'),
            'dateOfCalibration' => $this->request->getPost('dateOfCalibration'),
            'prevAirDensity' => $this->request->getPost('prevAirDensity'),
            'coverageFactor' => $this->request->getPost('coverageFactor'),
        ];

        $ID = $this->request->getPost('standardID');
        $standardModel->update($ID,$data);      
        // return redirect()->to(base_url('standard/tempRecorder'))->with('status', 'Data Updated Successfully!');
    }
    public function newStandardValuesReferenceWeight(){
        $standardModel = new ElectModel_3();
        $data = [            
            'serialNumber' => $this->request->getPost('serialNumber'),
            'standardID' => $this->request->getPost('standardID'),
            'nominalValue' => $this->request->getPost('nominalValue'),
            'nominalUnit' => $this->request->getPost('nominalUnit'),
            'marking' => $this->request->getPost('marking'),
            'conventionalMass' => $this->request->getPost('conventionalMass'),
            'unit' => $this->request->getPost('unit'),
            'uncertainty' => $this->request->getPost('uncertainty'),
            'mpe' => $this->request->getPost('mpe'),
            'drift' => $this->request->getPost('drift'),
            'previousConventionalMass' => $this->request->getPost('previousConventionalMass'),
            'coverageFactor' => $this->request->getPost('coverageFactor'),
        ];

        $standardModel->insert($data);
        $standardID = $standardModel->insertID();
        return json_encode(['id' => $standardID]);
        // return redirect()->to(base_url('standard/tempRecorder'))->with('status', 'Data Updated Successfully!');
    }
    public function updateStandardValuesReferenceWeight(){
        $standardModel = new ElectModel_3();
        $data = [
            'nominalValue' => $this->request->getPost('nominalValue'),
            'nominalUnit' => $this->request->getPost('nominalUnit'),
            'marking' => $this->request->getPost('marking'),
            'conventionalMass' => $this->request->getPost('conventionalMass'),
            'unit' => $this->request->getPost('unit'),
            'uncertainty' => $this->request->getPost('uncertainty'),
            'mpe' => $this->request->getPost('mpe'),
            'drift' => $this->request->getPost('drift'),
            'previousConventionalMass' => $this->request->getPost('previousConventionalMass'),
            'coverageFactor' => $this->request->getPost('coverageFactor'),
        ];


        $ID = $this->request->getPost('valueID');
        $standardModel->update($ID,$data);      
        // return redirect()->to(base_url('standard/tempRecorder'))->with('status', 'Data Updated Successfully!');
    }

    public function removeStandardReferenceWeight(){
        $model = new ElectModel_2();
        $modelValues = new ElectModel_3();
        $id = $this->request->getPost('standardID');
        //$serialNumber = $this->request->getPost('serialNumber');
        $data = [
                'status' => 'inactive',
        ];
        $model->where('id', $id)->set($data)->update();
        $modelValues->where('standardID', $id)->set($data)->update();
    }
    public function removeStandardValueReferenceWeight(){
            $modelValues = new ElectModel_3();
            $id = $this->request->getPost('valID');
            $data = [
                    'status' => 'inactive',
            ];
            $modelValues->where('id', $id)->set($data)->update();
    }

//multi-product calibrator
    public function tableMultiProductCalibrator(){
        $standardModel = new MultiProductCalibratorStandardModel();
        $userModel = new UserModel();

        $data['standardData'] = $standardModel->where('status', 'active')->findAll();
        //$data['standardValue'] = $standardValueModel->where('status', 'active')->findAll();
        $data['user'] = $userModel->where('id', session()->get('id'))->first();

        return view('Standards/Multi-Product Calibrator/multiProductCalibratorTable',$data);
    }
    public function getStandardDataMultiProductCalibrator(){
        $standardModel = new MultiProductCalibratorStandardModel();
        $results['standardData'] = $standardModel->where('status', 'active')->findAll();
        return $this->response->setJSON($results);
    }
    public function getStandardValuesMultiProductCalibratorByDetailsID(){
        $standardModel = new MultiProductCalibratorStandardValuesModel();
        $standardID = $this->request->getPost('selectedStandardID');
        $results['standardValues'] = $standardModel->where('status', 'active')->whereIn('standardID', $standardID)->findAll();
        return $this->response->setJSON($results);
    }
    public function newStandardMultiProductCalibrator(){
        $standardModel = new MultiProductCalibratorStandardModel();
        $data = [
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'description' => $this->request->getPost('description'),
            'calibrationProvider' => $this->request->getPost('provider'),
            'brand' => $this->request->getPost('brand'),
            'model' => $this->request->getPost('model'),
            'dateOfCalibration' => $this->request->getPost('dateOfCalibration'),
            'coverageFactor' => $this->request->getPost('coverageFactor'),
        ];

        $standardModel->insert($data);
        $standardID = $standardModel->insertID();
        return json_encode(['id' => $standardID]);
    }
    public function updateStandardMultiProductCalibrator(){
        $standardModel = new MultiProductCalibratorStandardModel();
        $data = [
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'description' => $this->request->getPost('description'),
            'calibrationProvider' => $this->request->getPost('provider'),
            'brand' => $this->request->getPost('brand'),
            'model' => $this->request->getPost('model'),
            'dateOfCalibration' => $this->request->getPost('dateOfCalibration'),
            'coverageFactor' => $this->request->getPost('coverageFactor'),
        ];

        $ID = $this->request->getPost('standardID');
        $standardModel->update($ID,$data);      
    }
    public function newStandardValuesMultiProductCalibrator(){
        $standardModel = new MultiProductCalibratorStandardValuesModel();
        $data = [            
            'serialNumber' => $this->request->getPost('serialNumber'),
            'standardID' => $this->request->getPost('standardID'),
            'type' => $this->request->getPost('type'),
            'function' => $this->request->getPost('function'),
            'rangeMin' => $this->request->getPost('rangeMin'),
            'rangeMinUnit' => $this->request->getPost('rangeMinUnit'),
            'rangeMax' => $this->request->getPost('rangeMax'),
            'rangeMaxUnit' => $this->request->getPost('rangeMaxUnit'),
            'outputSetting' => $this->request->getPost('outputSetting'),
            'outputSettingUnit' => $this->request->getPost('outputSettingUnit'),
            'outputSettingHertz' => $this->request->getPost('outputSettingHertz'),
            'outputSettingHertzUnit' => $this->request->getPost('outputSettingHertzUnit'),
            'coverageFactorValue' => $this->request->getPost('coverageFactorValue'),
            'measuredOutputVoltage' => $this->request->getPost('measuredOutputVoltage'),
            'measuredOutputVoltageUnit' => $this->request->getPost('measuredOutputVoltageUnit'),
            'uncertainty' => $this->request->getPost('uncertainty'),
            'uncertaintyUnit' => $this->request->getPost('uncertaintyUnit'),
            'previousMeasuredOutputVoltage' => $this->request->getPost('previousMeasuredOutputVoltage'),
            'previousMeasuredOutputVoltageUnit' => $this->request->getPost('previousMeasuredOutputVoltageUnit'),
            'drift' => $this->request->getPost('drift'),
        ];

        $standardModel->insert($data);
        $standardID = $standardModel->insertID();
        return json_encode(['id' => $standardID]);
    }
    public function updateStandardValuesMultiProductCalibrator(){
        $standardModel = new MultiProductCalibratorStandardValuesModel();
        $data = [
            'type' => $this->request->getPost('type'),
            'function' => $this->request->getPost('function'),
            'rangeMin' => $this->request->getPost('rangeMin'),
            'rangeMinUnit' => $this->request->getPost('rangeMinUnit'),
            'rangeMax' => $this->request->getPost('rangeMax'),
            'rangeMaxUnit' => $this->request->getPost('rangeMaxUnit'),
            'outputSetting' => $this->request->getPost('outputSetting'),
            'outputSettingUnit' => $this->request->getPost('outputSettingUnit'),
            'outputSettingHertz' => $this->request->getPost('outputSettingHertz'),
            'outputSettingHertzUnit' => $this->request->getPost('outputSettingHertzUnit'),
            'coverageFactorValue' => $this->request->getPost('coverageFactorValue'),
            'measuredOutputVoltage' => $this->request->getPost('measuredOutputVoltage'),
            'measuredOutputVoltageUnit' => $this->request->getPost('measuredOutputVoltageUnit'),
            'uncertainty' => $this->request->getPost('uncertainty'),
            'uncertaintyUnit' => $this->request->getPost('uncertaintyUnit'),
            'previousMeasuredOutputVoltage' => $this->request->getPost('previousMeasuredOutputVoltage'),
            'previousMeasuredOutputVoltageUnit' => $this->request->getPost('previousMeasuredOutputVoltageUnit'),
            'drift' => $this->request->getPost('drift'),
        ];


        $ID = $this->request->getPost('valueID');
        $standardModel->update($ID,$data);      
    }

    public function removeStandardMultiProductCalibrator(){
        $model = new MultiProductCalibratorStandardModel();
        $modelValues = new MultiProductCalibratorStandardValuesModel();
        $id = $this->request->getPost('standardID');
        //$serialNumber = $this->request->getPost('serialNumber');
        $data = [
                'status' => 'inactive',
        ];
        $model->where('id', $id)->set($data)->update();
        $modelValues->where('standardID', $id)->set($data)->update();
    }
    public function removeStandardValueMultiProductCalibrator(){
        $modelValues = new MultiProductCalibratorStandardValuesModel();
        $id = $this->request->getPost('valID');
        $data = [
                    'status' => 'inactive',
        ];
        $modelValues->where('id', $id)->set($data)->update();
    }


//temperature source
    public function tableTemperatureSource(){
        $standardModel = new TemperatureSource();
        $userModel = new UserModel();

        $data['standardData'] = $standardModel->where('status', 'active')->findAll();
        //$data['standardValue'] = $standardValueModel->where('status', 'active')->findAll();
        $data['user'] = $userModel->where('id', session()->get('id'))->first();

        return view('Standards/Temperature Source/temperatureSourceTable',$data);
    }
    public function getStandardDataTemperatureSource(){
        $standardModel = new TemperatureSource();
        $results['standardData'] = $standardModel->where('status', 'active')->findAll();
        return $this->response->setJSON($results);
    }
    public function getStandardValuesTemperatureSourceByDetailsID(){
        $standardModel = new TemperatureSource();
        $standardID = $this->request->getPost('selectedStandardID');
        $results['standardValues'] = $standardModel->where('status', 'active')->whereIn('id', $standardID)->findAll();
        return $this->response->setJSON($results);
    }
    public function newStandardTemperatureSource(){
        $standardModel = new TemperatureSource();
        $data = [
            'code' => $this->request->getPost('code'),
            'maxInstability' => $this->request->getPost('maxInstability'),
            'maxAxial' => $this->request->getPost('maxAxial'),
            'maxRadial' => $this->request->getPost('maxRadial'),
            'description' => $this->request->getPost('description'),
        ];

        $standardModel->insert($data);
        $standardID = $standardModel->insertID();
        return json_encode(['id' => $standardID]);
    }
    public function updateStandardTemperatureSource(){
        $standardModel = new TemperatureSource();
        $data = [
            'code' => $this->request->getPost('code'),
            'maxInstability' => $this->request->getPost('maxInstability'),
            'maxAxial' => $this->request->getPost('maxAxial'),
            'maxRadial' => $this->request->getPost('maxRadial'),
            'description' => $this->request->getPost('description'),
        ];

        $ID = $this->request->getPost('standardID');
        $standardModel->update($ID,$data);      
    }

    public function removeStandardTemperatureSource(){
        $model = new TemperatureSource();
        $id = $this->request->getPost('standardID');
        //$serialNumber = $this->request->getPost('serialNumber');
        $data = [
                'status' => 'inactive',
        ];
        $model->where('id', $id)->set($data)->update();
    }

//current coil
    public function tableCurrentCoil(){
        $standardModel = new CurrentCoilModel();
        $userModel = new UserModel();
        $data['standardData'] = $standardModel->where('status', 'active')->findAll();
        $data['user'] = $userModel->where('id', session()->get('id'))->first();
        return view('Standards/Current Coil/currentCoilTable',$data);
    }
    public function getStandardDataCurrentCoil(){
        $standardModel = new CurrentCoilModel();
        $results['standardData'] = $standardModel->where('status', 'active')->findAll();
        return $this->response->setJSON($results);
    }
    public function getStandardValuesCurrentCoilByDetailsID(){
        $standardModel = new CurrentCoilModel();
        $standardID = $this->request->getPost('selectedStandardID');
        $results['standardValues'] = $standardModel->where('status', 'active')->whereIn('id', $standardID)->findAll();
        return $this->response->setJSON($results);
    }
    public function newStandardCurrentCoil(){
        $standardModel = new CurrentCoilModel();
        $data = [
            'description' => $this->request->getPost('description'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'turns' => $this->request->getPost('turns'),
        ];
        $standardModel->insert($data);
        $standardID = $standardModel->insertID();
        return json_encode(['id' => $standardID]);
    }
    public function updateStandardCurrentCoil(){
        $standardModel = new CurrentCoilModel();
        $data = [
            'description' => $this->request->getPost('description'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'turns' => $this->request->getPost('turns'),
        ];
        $ID = $this->request->getPost('standardID');
        $standardModel->update($ID,$data);      
    }

    public function removeStandardCurrentCoil(){
        $model = new CurrentCoilModel();
        $id = $this->request->getPost('standardID');
        $data = [
                'status' => 'inactive',
        ];
        $model->where('id', $id)->set($data)->update();
    }


//gauge blocks
    public function tableGaugeBlock(){
        $standardModel = new GaugeBlockModel();
        $userModel = new UserModel();
        $data['standardData'] = $standardModel->where('status', 'active')->findAll();
        $data['user'] = $userModel->where('id', session()->get('id'))->first();
        return view('Standards/Gauge Block/gaugeBlockTable',$data);
    }
    public function getStandardDataGaugeBlockDetails(){
        $standardModel = new GaugeBlockModel();
        $results['standardData'] = $standardModel->where('status', 'active')->findAll();
        return $this->response->setJSON($results);
    }
    public function getStandardDataGaugeBlock(){
        $standardModel = new GaugeBlockModel();
        $standardUncertaintyModel = new GaugeBlockUncertaintyModel();
        $standardMeasurementModel = new GaugeBlockMeasurementModel();
        
        $results['standardData'] = $standardModel->where('status', 'active')->findAll();
        $results['standardUncertaintyData'] = $standardUncertaintyModel->where('status', 'active')->findAll();
        $results['standardMeasurementData'] = $standardMeasurementModel->where('status', 'active')->findAll();
        return $this->response->setJSON($results);
    }
    public function getStandardValuesGaugeBlockByDetailsID(){
        $standardModel = new GaugeBlockModel();
        $standardUncertaintyModel = new GaugeBlockUncertaintyModel();
        $standardMeasurementModel = new GaugeBlockMeasurementModel();
        
        $standardID = $this->request->getPost('selectedStandardID');
        $results['standardValues'] = $standardModel->where('status', 'active')->whereIn('id', $standardID)->findAll();
        $results['standardUncertaintyData'] = $standardUncertaintyModel->where('status', 'active')->whereIn('standardID', $standardID)->findAll();
        $results['standardMeasurementData'] = $standardMeasurementModel->where('status', 'active')->whereIn('standardID', $standardID)->findAll();
        return $this->response->setJSON($results);
    }
    public function newStandardGaugeBlock(){
        $standardModel = new GaugeBlockModel();
        $data = [
            'description' => $this->request->getPost('description'),
            'manufacturer' => $this->request->getPost('manufacturer'),
            'material' => $this->request->getPost('material'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'dateOfCalibration' => $this->request->getPost('dateOfCalibration'),
            'coverageFactor' => $this->request->getPost('coverageFactor'),
            'calibrationProvider' => $this->request->getPost('calibrationProvider'),
        ];

        $standardModel->insert($data);
        $standardID = $standardModel->insertID();
        return json_encode(['id' => $standardID]);
    }

    public function updateStandardGaugeBlock(){
        $standardModel = new GaugeBlockModel();
        $data = [
            'description' => $this->request->getPost('description'),
            'manufacturer' => $this->request->getPost('manufacturer'),
            'material' => $this->request->getPost('material'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'dateOfCalibration' => $this->request->getPost('dateOfCalibration'),
            'coverageFactor' => $this->request->getPost('coverageFactor'),
            'calibrationProvider' => $this->request->getPost('calibrationProvider'),
        ];
        $ID = $this->request->getPost('standardID');
        $standardModel->update($ID,$data);      
    }
    public function removeStandardGaugeBlock(){
        $model = new GaugeBlockModel();
        $uncertaintyModel = new GaugeBlockUncertaintyModel();
        $measurementModel = new GaugeBlockMeasurementModel();
        $id = $this->request->getPost('standardID');
        $data = [
                'status' => 'inactive',
        ];
        $model->where('id', $id)->set($data)->update();
        $uncertaintyModel->where('standardID', $id)->set($data)->update();
        $measurementModel->where('standardID', $id)->set($data)->update();
    }

    public function newUncertainty(){
        $standardModel = new GaugeBlockUncertaintyModel();
        $data = [
            "standardID" => $this->request->getPost('standardID'),
            "rangeMin" => $this->request->getPost('rangeMin'),
            "rangeMax" => $this->request->getPost('rangeMax'),
            "uncertainty" => $this->request->getPost('uncertainty'),
            "errorGrade0" => $this->request->getPost('errorGrade0'),
            "parallelismGrade0" => $this->request->getPost('parallelismGrade0'),
            "errorGrade1" => $this->request->getPost('errorGrade1'),
            "parallelismGrade1" => $this->request->getPost('parallelismGrade1'),
            "errorGrade2" => $this->request->getPost('errorGrade2'),
            "parallelismGrade2" => $this->request->getPost('parallelismGrade2'),
        ];
        $standardModel->insert($data);
        $standardID = $standardModel->insertID();
        return json_encode(['id' => $standardID]);
    }
    public function editUncertainty(){
        $standardModel = new GaugeBlockUncertaintyModel();
        $data = [
            "rangeMin" => $this->request->getPost('rangeMin'),
            "rangeMax" => $this->request->getPost('rangeMax'),
            "uncertainty" => $this->request->getPost('uncertainty'),
            "errorGrade0" => $this->request->getPost('errorGrade0'),
            "parallelismGrade0" => $this->request->getPost('parallelismGrade0'),
            "errorGrade1" => $this->request->getPost('errorGrade1'),
            "parallelismGrade1" => $this->request->getPost('parallelismGrade1'),
            "errorGrade2" => $this->request->getPost('errorGrade2'),
            "parallelismGrade2" => $this->request->getPost('parallelismGrade2'),
        ];
        $ID = $this->request->getPost('valueID');
        $standardModel->update($ID,$data);      
    }
    public function removeUncertainty(){
        $model = new GaugeBlockUncertaintyModel();
        $id = $this->request->getPost('valueID');
        $data = [
            'status' => 'inactive',
        ];
        $model->where('id', $id)->set($data)->update();
    }

    public function newMeasurement(){
        $standardModel = new GaugeBlockMeasurementModel();
        $data = [
            "standardID" => $this->request->getPost('standardID'),
            "nominalLength" => $this->request->getPost('nominalLength'),
            "serialNumberError" => $this->request->getPost('serialNumberError'),
            "centLngError" => $this->request->getPost('centLngError'),
            "maxLngError" => $this->request->getPost('maxLngError'),
            "minLngError" => $this->request->getPost('minLngError'),
            "parallel" => $this->request->getPost('parallel'),
            "calResult" => $this->request->getPost('calResult'),
             ];
        $standardModel->insert($data);
        $standardID = $standardModel->insertID();
        return json_encode(['id' => $standardID]);
    }

    public function editMeasurement(){
        $standardModel = new GaugeBlockMeasurementModel();
        $data = [
            "nominalLength" => $this->request->getPost('nominalLength'),
            "serialNumberError" => $this->request->getPost('serialNumberError'),
            "centLngError" => $this->request->getPost('centLngError'),
            "maxLngError" => $this->request->getPost('maxLngError'),
            "minLngError" => $this->request->getPost('minLngError'),
            "parallel" => $this->request->getPost('parallel'),
            "calResult" => $this->request->getPost('calResult'),
        ];
        $ID = $this->request->getPost('valueID');
        $standardModel->update($ID,$data);    
    }
    public function removeMeasurement(){
        $model = new GaugeBlockMeasurementModel();
        $id = $this->request->getPost('valueID');
        $data = [
            'status' => 'inactive',
        ];
        $model->where('id', $id)->set($data)->update();
    }

//balance NEW
    public function tableBalance(){
        $standardModel = new BalanceStandardModel();
        $userModel = new UserModel();
        $data['standardData'] = $standardModel->where('status', 'active')->findAll();
        $data['user'] = $userModel->where('id', session()->get('id'))->first();
        return view('Standards/Balance/balanceTable',$data);
    }
    public function getStandardDataBalance(){
        $standardModel = new BalanceStandardModel();
        $results['standardData'] = $standardModel->where('status', 'active')->findAll();
        return $this->response->setJSON($results);
    }
    public function getStandardValuesBalanceByDetailsID(){
        $standardModel = new BalanceStandardModel();
        $standardID = $this->request->getPost('selectedStandardID');
        $results['standardValues'] = $standardModel->where('status', 'active')->whereIn('id', $standardID)->findAll();
        return $this->response->setJSON($results);
    }
    public function newStandardBalance(){
        $standardModel = new BalanceStandardModel();
        $data = [
            'description' => $this->request->getPost('description'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'provider' => $this->request->getPost('provider'),
            'dateCalibrated' => $this->request->getPost('dateCalibrated'),
            'resolution' => $this->request->getPost('resolution'),
            'resolution2' => $this->request->getPost('resolution2'),
            'conditionForResolution' => $this->request->getPost('conditionForResolution'),
            'tempCoefficient' => $this->request->getPost('tempCoefficient'),
            'uncertainty' => $this->request->getPost('uncertainty'),
            'coverageFactor' => $this->request->getPost('coverageFactor'),
            'sensitivityWeightDelta' => $this->request->getPost('sensitivityWeightDelta'),
            'uncertSensitivityWeightDelta' => $this->request->getPost('uncertSensitivityWeightDelta'),
            'sensitivityWeight' => $this->request->getPost('sensitivityWeight'),
            'uncertSensitivityWeight' => $this->request->getPost('uncertSensitivityWeight'),
            'pooledValue' => $this->request->getPost('pooledValue'),
            'sdValues' => $this->request->getPost('sdValues'),
        ];
        $standardModel->insert($data);
        $standardID = $standardModel->insertID();
        return json_encode(['id' => $standardID]);
    }
    public function updateStandardBalance(){
        $standardModel = new BalanceStandardModel();
        $data = [
            'description' => $this->request->getPost('description'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'provider' => $this->request->getPost('provider'),
            'dateCalibrated' => $this->request->getPost('dateCalibrated'),
            'resolution' => $this->request->getPost('resolution'),
            'resolution2' => $this->request->getPost('resolution2'),
            'conditionForResolution' => $this->request->getPost('conditionForResolution'),
            'tempCoefficient' => $this->request->getPost('tempCoefficient'),
            'uncertainty' => $this->request->getPost('uncertainty'),
            'coverageFactor' => $this->request->getPost('coverageFactor'),
            'sensitivityWeightDelta' => $this->request->getPost('sensitivityWeightDelta'),
            'uncertSensitivityWeightDelta' => $this->request->getPost('uncertSensitivityWeightDelta'),
            'sensitivityWeight' => $this->request->getPost('sensitivityWeight'),
            'uncertSensitivityWeight' => $this->request->getPost('uncertSensitivityWeight'),
            'pooledValue' => $this->request->getPost('pooledValue'),
            'sdValues' => $this->request->getPost('sdValues'),
        ];
        $ID = $this->request->getPost('standardID');
        $standardModel->update($ID,$data);      
    }
    public function updateMeasurementsStandardBalance(){
        $standardModel = new BalanceStandardModel();
        $data = [
            'measurements' => $this->request->getPost('measurements'),
        ];
        $ID = $this->request->getPost('standardID');
        $standardModel->update($ID,$data);      
    }
    public function removeStandardBalance(){
        $model = new BalanceStandardModel();
        $id = $this->request->getPost('standardID');
        $data = [
                'status' => 'inactive',
        ];
        $model->where('id', $id)->set($data)->update();
    }



//documenting process calibrator
    public function tableDocumentingProcessCalibrator(){
        $standardModel = new DocumentingProcessCalibratorStandardModel();
        $userModel = new UserModel();
        $data['standardData'] = $standardModel->where('status', 'active')->findAll();
        //$data['standardValue'] = $standardValueModel->where('status', 'active')->findAll();
        $data['user'] = $userModel->where('id', session()->get('id'))->first();
        return view('Standards/DocumentingProcessCalibrator/documentingProcessCalibratorTable',$data);
    }
    public function getStandardDataDocumentingProcessCalibrator(){
        $standardModel = new DocumentingProcessCalibratorStandardModel();
        $results['standardData'] = $standardModel->where('status', 'active')->findAll();
        return $this->response->setJSON($results);
    }
    public function getStandardValuesDocumentingProcessCalibratorByDetailsID(){
        $standardModel = new DocumentingProcessCalibratorStandardValuesModel();
        $standardID = $this->request->getPost('selectedStandardID');
        $results['standardValues'] = $standardModel->where('status', 'active')->whereIn('standardID', $standardID)->findAll();
        return $this->response->setJSON($results);
    }
    public function newStandardDocumentingProcessCalibrator(){
        $standardModel = new DocumentingProcessCalibratorStandardModel();
        $data = [
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'description' => $this->request->getPost('description'),
            'calibrationProvider' => $this->request->getPost('provider'),
            'brand' => $this->request->getPost('brand'),
            'model' => $this->request->getPost('model'),
            'dateOfCalibration' => $this->request->getPost('dateOfCalibration'),
            'coverageFactor' => $this->request->getPost('coverageFactor'),
        ];

        $standardModel->insert($data);
        $standardID = $standardModel->insertID();
        return json_encode(['id' => $standardID]);
    }
    public function updateStandardDocumentingProcessCalibrator(){
            $standardModel = new DocumentingProcessCalibratorStandardModel();
            $data = [
                'certificateNumber' => $this->request->getPost('certificateNumber'),
                'serialNumber' => $this->request->getPost('serialNumber'),
                'description' => $this->request->getPost('description'),
                'calibrationProvider' => $this->request->getPost('provider'),
                'brand' => $this->request->getPost('brand'),
                'model' => $this->request->getPost('model'),
                'dateOfCalibration' => $this->request->getPost('dateOfCalibration'),
                'coverageFactor' => $this->request->getPost('coverageFactor'),
            ];

            $ID = $this->request->getPost('standardID');
            $standardModel->update($ID,$data);      
    }
    public function newStandardValuesDocumentingProcessCalibrator(){
        $standardModel = new DocumentingProcessCalibratorStandardValuesModel();
        $data = [            
            'serialNumber' => $this->request->getPost('serialNumber'),
            'standardID' => $this->request->getPost('standardID'),
            'type' => $this->request->getPost('type'),
            'function' => $this->request->getPost('function'),
            'functionType' => $this->request->getPost('functionType'),
            'sensorType' => $this->request->getPost('sensorType'),
            'coverageFactorValue' => $this->request->getPost('coverageFactorValue'),
            'standardResolution' => $this->request->getPost('standardResolution'),
            'standardReadability' => $this->request->getPost('standardReadability'),
            'influenceFactorValue' => $this->request->getPost('influenceFactorValue'),
            'percentageValue' => $this->request->getPost('percentageValue'),
            'uncertainty' => $this->request->getPost('uncertainty'),
            'uncertaintyUnit' => $this->request->getPost('uncertaintyUnit'),
            'rangeValue' => $this->request->getPost('rangeValue'),
            'rangeValueUnit' => $this->request->getPost('rangeValueUnit'),
            'settingValue' => $this->request->getPost('settingValue'),
            'settingValueUnit' => $this->request->getPost('settingValueUnit'),
            'settingValueHertz' => $this->request->getPost('settingValueHertz'),
            'settingValueHertzUnit' => $this->request->getPost('settingValueHertzUnit'),
            'indicatedValue' => $this->request->getPost('indicatedValue'),
            'indicatedValueUnit' => $this->request->getPost('indicatedValueUnit'),
            'previousIndicatedValue' => $this->request->getPost('previousIndicatedValue'),
            'previousIndicatedValueUnit' => $this->request->getPost('previousIndicatedValueUnit'),
            'drift' => $this->request->getPost('drift'),
        ];


        $standardModel->insert($data);
        $standardID = $standardModel->insertID();
        return json_encode(['id' => $standardID]);
    }
    public function updateStandardValuesDocumentingProcessCalibrator(){
        $standardModel = new DocumentingProcessCalibratorStandardValuesModel();
        $data = [
            'type' => $this->request->getPost('type'),
            'function' => $this->request->getPost('function'),
            'functionType' => $this->request->getPost('functionType'),
            'sensorType' => $this->request->getPost('sensorType'),
            'coverageFactorValue' => $this->request->getPost('coverageFactorValue'),
            'standardResolution' => $this->request->getPost('standardResolution'),
            'standardReadability' => $this->request->getPost('standardReadability'),
            'influenceFactorValue' => $this->request->getPost('influenceFactorValue'),
            'percentageValue' => $this->request->getPost('percentageValue'),
            'uncertainty' => $this->request->getPost('uncertainty'),
            'uncertaintyUnit' => $this->request->getPost('uncertaintyUnit'),
            'rangeValue' => $this->request->getPost('rangeValue'),
            'rangeValueUnit' => $this->request->getPost('rangeValueUnit'),
            'settingValue' => $this->request->getPost('settingValue'),
            'settingValueUnit' => $this->request->getPost('settingValueUnit'),
            'settingValueHertz' => $this->request->getPost('settingValueHertz'),
            'settingValueHertzUnit' => $this->request->getPost('settingValueHertzUnit'),
            'indicatedValue' => $this->request->getPost('indicatedValue'),
            'indicatedValueUnit' => $this->request->getPost('indicatedValueUnit'),
            'previousIndicatedValue' => $this->request->getPost('previousIndicatedValue'),
            'previousIndicatedValueUnit' => $this->request->getPost('previousIndicatedValueUnit'),
            'drift' => $this->request->getPost('drift'),
        ];


        $ID = $this->request->getPost('valueID');
        $standardModel->update($ID,$data);      
    }
    public function removeStandardDocumentingProcessCalibrator(){
        $model = new DocumentingProcessCalibratorStandardModel();
        $modelValues = new DocumentingProcessCalibratorStandardValuesModel();
        $id = $this->request->getPost('standardID');
        //$serialNumber = $this->request->getPost('serialNumber');
        $data = [
                'status' => 'inactive',
        ];
        $model->where('id', $id)->set($data)->update();
        $modelValues->where('standardID', $id)->set($data)->update();
    }
    public function removeStandardValueDocumentingProcessCalibrator(){
        $modelValues = new DocumentingProcessCalibratorStandardValuesModel();
        $id = $this->request->getPost('valID');
        $data = [
                    'status' => 'inactive',
        ];
        $modelValues->where('id', $id)->set($data)->update();
    }
//documenting process calibrator
//buffer solution
    public function tableBufferSolution(){
        $standardModel = new BufferSolutionStandardModel();
        $userModel = new UserModel();
        $data['standardData'] = $standardModel->where('status', 'active')->findAll();
        $data['user'] = $userModel->where('id', session()->get('id'))->first();
        return view('Standards/BufferSolution/bufferSolutionTable',$data);
    }
    public function getStandardDataBufferSolution(){
        $standardModel = new BufferSolutionStandardModel();
        $results['standardData'] = $standardModel->where('status', 'active')->findAll();
        return $this->response->setJSON($results);
    }
    public function getStandardValuesBufferSolutionByDetailsID(){
        $standardModel = new BufferSolutionStandardValuesModel();
        $standardID = $this->request->getPost('selectedStandardID');
        $results['standardValues'] = $standardModel->where('status', 'active')->whereIn('standardID', $standardID)->findAll();
        return $this->response->setJSON($results);
    }
    public function newStandardBufferSolution(){
        $standardModel = new BufferSolutionStandardModel();
        $data = [
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'description' => $this->request->getPost('description'),
            'calibrationProvider' => $this->request->getPost('provider'),
            'pHValue' => $this->request->getPost('pHValue'),
            'dateOfCalibration' => $this->request->getPost('dateOfCalibration'),
             'uncertaintypH' => $this->request->getPost('uncertaintypH'),
        ];
        $standardModel->insert($data);
        $standardID = $standardModel->insertID();
        return json_encode(['id' => $standardID]);
    }
    public function updateStandardBufferSolution(){
        $standardModel = new BufferSolutionStandardModel();
        $data = [
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'description' => $this->request->getPost('description'),
            'calibrationProvider' => $this->request->getPost('provider'),
            'pHValue' => $this->request->getPost('pHValue'),
            'dateOfCalibration' => $this->request->getPost('dateOfCalibration'),
            'uncertaintypH' => $this->request->getPost('uncertaintypH'),
        ];
        $ID = $this->request->getPost('standardID');
        $standardModel->update($ID,$data);      
    }
    public function newStandardValuesBufferSolution(){
        $standardModel = new BufferSolutionStandardValuesModel();
        $data = [            
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'standardID' => $this->request->getPost('standardID'),
            // 'pHValue' => $this->request->getPost('pHValue'),
            'bufferSolutionReading' => $this->request->getPost('bufferSolutionReading'),
            'nextBufferSolutionReading' => $this->request->getPost('nextBufferSolutionReading'),
            'driftOfBufferSolutionReading' => $this->request->getPost('driftOfBufferSolutionReading'),
            'temperature' => $this->request->getPost('temperature'),
            'nextTemperature' => $this->request->getPost('nextTemperature'),
            'changeInTemperature' => $this->request->getPost('changeInTemperature'),
            'sensitivityCoefficient' => $this->request->getPost('sensitivityCoefficient'),

        ];
        $standardModel->insert($data);
        $standardID = $standardModel->insertID();
        return json_encode(['id' => $standardID]);
    }

    public function updateStandardValuesBufferSolution(){
        $standardModel = new BufferSolutionStandardValuesModel();
        $data = [
            'bufferSolutionReading' => $this->request->getPost('bufferSolutionReading'),
            'nextBufferSolutionReading' => $this->request->getPost('nextBufferSolutionReading'),
            'driftOfBufferSolutionReading' => $this->request->getPost('driftOfBufferSolutionReading'),
            'temperature' => $this->request->getPost('temperature'),
            'nextTemperature' => $this->request->getPost('nextTemperature'),
            'changeInTemperature' => $this->request->getPost('changeInTemperature'),
            'sensitivityCoefficient' => $this->request->getPost('sensitivityCoefficient'),
        ];
        $ID = $this->request->getPost('valueID');
        $standardModel->update($ID,$data);      
    }
    public function removeStandardBufferSolution(){
        $model = new BufferSolutionStandardModel();
        $modelValues = new BufferSolutionStandardValuesModel();
        $id = $this->request->getPost('standardID');

        $data = [
                'status' => 'inactive',
        ];
        $model->where('id', $id)->set($data)->update();

    }

//buffer solution

//digital timer controller
    public function tableDigitalTimer(){
        $standardModel = new DigitalTimerStandardModel();
        $userModel = new UserModel();

        $data['standardData'] = $standardModel->where('status', 'active')->findAll();
        //$data['standardValue'] = $standardValueModel->where('status', 'active')->findAll();
        $data['user'] = $userModel->where('id', session()->get('id'))->first();

        return view('Standards/DigitalTimer/digitalTimerTable',$data);
    }
    public function getStandardDataDigitalTimer(){
        $standardModel = new DigitalTimerStandardModel();
        $results['standardData'] = $standardModel->where('status', 'active')->findAll();
        return $this->response->setJSON($results);
    }
    public function getStandardValuesDigitalTimerByDetailsID(){
        $standardModel = new DigitalTimerStandardValuesModel();
        $standardID = $this->request->getPost('selectedStandardID');
        $results['standardValues'] = $standardModel->where('status', 'active')->whereIn('standardID', $standardID)->findAll();
        return $this->response->setJSON($results);
    }
    public function newStandardDigitalTimer(){
        $standardModel = new DigitalTimerStandardModel();
        $data = [
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'description' => $this->request->getPost('description'),
            'calibrationProvider' => $this->request->getPost('provider'),
            'brand' => $this->request->getPost('brand'),
            'model' => $this->request->getPost('model'),
            'dateOfCalibration' => $this->request->getPost('dateOfCalibration'),
            'coverageFactor' => $this->request->getPost('coverageFactor'),
            'standardResolution' => $this->request->getPost('standardResolution'),
        ];


        $standardModel->insert($data);
        $standardID = $standardModel->insertID();
        return json_encode(['id' => $standardID]);
    }

    public function updateStandardDigitalTimer(){
        $standardModel = new DigitalTimerStandardModel();
        $data = [
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'description' => $this->request->getPost('description'),
            'calibrationProvider' => $this->request->getPost('provider'),
            'brand' => $this->request->getPost('brand'),
            'model' => $this->request->getPost('model'),
            'dateOfCalibration' => $this->request->getPost('dateOfCalibration'),
            'coverageFactor' => $this->request->getPost('coverageFactor'),
            'standardResolution' => $this->request->getPost('standardResolution'),
        ];

        $ID = $this->request->getPost('standardID');
        $standardModel->update($ID,$data);      
    }
    public function newStandardValuesDigitalTimer(){
        $standardModel = new DigitalTimerStandardValuesModel();
        $data = [            
            'serialNumber' => $this->request->getPost('serialNumber'),
            'standardID' => $this->request->getPost('standardID'),
            'type' => $this->request->getPost('type'),
            
            
            'rmlReading' => $this->request->getPost('rmlReading'),
            'nmlReading' => $this->request->getPost('nmlReading'),
            'correctionSecond' => $this->request->getPost('correctionSecond'),
            'previousCorrectionSecond' => $this->request->getPost('previousCorrectionSecond'),
            'driftSecond' => $this->request->getPost('driftSecond'),
            'uncertaintySecond' => $this->request->getPost('uncertaintySecond'),

            'measuredFrequency' => $this->request->getPost('measuredFrequency'),
            'previousMeasuredFrequency' => $this->request->getPost('previousMeasuredFrequency'),
            'deviationHertz' => $this->request->getPost('deviationHertz'),
            'uncertaintyHertz' => $this->request->getPost('uncertaintyHertz'),
        
    
        ];

        $standardModel->insert($data);
        $standardID = $standardModel->insertID();
        return json_encode(['id' => $standardID]);
    }
    public function updateStandardValuesDigitalTimer(){
        $standardModel = new DigitalTimerStandardValuesModel();
        $data = [
            'type' => $this->request->getPost('type'),

            'rmlReading' => $this->request->getPost('rmlReading'),
            'nmlReading' => $this->request->getPost('nmlReading'),
            'correctionSecond' => $this->request->getPost('correctionSecond'),
            'previousCorrectionSecond' => $this->request->getPost('previousCorrectionSecond'),
            'driftSecond' => $this->request->getPost('driftSecond'),
            'uncertaintySecond' => $this->request->getPost('uncertaintySecond'),

            'measuredFrequency' => $this->request->getPost('measuredFrequency'),
            'previousMeasuredFrequency' => $this->request->getPost('previousMeasuredFrequency'),
            'deviationHertz' => $this->request->getPost('deviationHertz'),
            'uncertaintyHertz' => $this->request->getPost('uncertaintyHertz'),
        
    
        ];


        $ID = $this->request->getPost('valueID');
        $standardModel->update($ID,$data);      
    }
    public function removeStandardDigitalTimer(){
        $model = new DigitalTimerStandardModel();
        $modelValues = new DigitalTimerStandardValuesModel();
        $id = $this->request->getPost('standardID');
        $data = [
                'status' => 'inactive',
        ];
        $model->where('id', $id)->set($data)->update();
        $modelValues->where('standardID', $id)->set($data)->update();
    }

    public function removeStandardValueBufferSolution(){
        $modelValues = new BufferSolutionStandardValuesModel();
        $id = $this->request->getPost('valID');
        $data = [
                    'status' => 'inactive',
        ];
        $modelValues->where('id', $id)->set($data)->update();
    }
    public function removeStandardValueDigitalTimer(){
        $modelValues = new DigitalTimerStandardValuesModel();
        $id = $this->request->getPost('valID');
        $data = [
                    'status' => 'inactive',
        ];
        $modelValues->where('id', $id)->set($data)->update();
    }
//digitalTimer

//chamber
    public function tableChamber(){
        $standardModel = new ChamberStandardModel();
        $userModel = new UserModel();
        $data['standardData'] = $standardModel->where('status', 'active')->findAll();
        $data['user'] = $userModel->where('id', session()->get('id'))->first();
        return view('Standards/Chamber/chamberTable',$data);
    }
    public function getStandardDataChamber(){
        $standardModel = new ChamberStandardModel();
        $results['standardData'] = $standardModel->where('status', 'active')->findAll();
        return $this->response->setJSON($results);
    }
    public function getStandardValuesChamberByDetailsID(){
        $standardModel = new ChamberStandardModel();
        $standardID = $this->request->getPost('selectedStandardID');
        $results['standardValues'] = $standardModel->where('status', 'active')->whereIn('id', $standardID)->findAll();
        return $this->response->setJSON($results);
    }
    public function newStandardChamber(){
        $standardModel = new ChamberStandardModel();
        $data = [
            'description' => $this->request->getPost('description'),
            'serialNumber' => $this->request->getPost('serialNumber'),
        ];
        $standardModel->insert($data);
        $standardID = $standardModel->insertID();
        return json_encode(['id' => $standardID]);
    }
    public function updateStandardChamber(){
        $standardModel = new ChamberStandardModel();
        $data = [
            'description' => $this->request->getPost('description'),
            'serialNumber' => $this->request->getPost('serialNumber'),
        ];
        $ID = $this->request->getPost('standardID');
        $standardModel->update($ID,$data);      
    }
    public function updateMeasurementsStandardChamber(){
        $standardModel = new ChamberStandardModel();
        $data = [
            'measurements' => $this->request->getPost('measurements'),
        ];
        $ID = $this->request->getPost('standardID');
        $standardModel->update($ID,$data);      
    }
    public function removeStandardChamber(){
        $model = new ChamberStandardModel();
        $id = $this->request->getPost('standardID');
        $data = [
                'status' => 'inactive',
        ];
        $model->where('id', $id)->set($data)->update();
    }


}

