<?php namespace App\Controllers;

use App\Models\DigitalThermometerModel;
use App\Models\TemperatureSource;
use App\Models\ThermoStandardAddDriftModel;
use App\Models\ThermoStandardAddDriftPRTModel;
use App\Models\ThermoStandardAddTestPointsModel;

use App\Models\ThermoStandard;

use App\Models\UserModel;
use App\Models\CustomersModel;
use App\Models\VerifierModel;
use App\Models\PersonnelModel;
use App\Models\Defaults;
use App\Models\ElectModel_image;
use App\Models\ImageModel;
use Dompdf\Options; 
use App\Models\PlaceholderModel;
use App\Models\CMCmodel;

class DigitalThermometerController extends BaseController{

    public function worksheet($id = null, $verify = null){
        $data = [];
        $VerifierModel = new VerifierModel();
        $PersonnelModel = new PersonnelModel();
        $standardModel = new ThermoStandard();
        $standardValueModel = new ThermoStandardAddTestPointsModel();
        $TemperatureSource = new TemperatureSource();
        $driftValuePRT = new ThermoStandardAddDriftPRTModel();

        
        // if(session()->get('id') == 13){
        //     $data['id'] = $id;
        //     $data['verifier'] = $VerifierModel->findAll();
        //     $data['personnel'] = $PersonnelModel->findAll();
        //     $data['standard'] = $standardModel->where('status', 'active')->findAll();
        //     $data['standardValue'] = $standardValueModel->findAll();
        //     $data['temperatureSource'] = $TemperatureSource->findAll();
        //     $data['driftValuePRT'] = $driftValuePRT->findAll();

        //     return view('DigitalThermometer/thermometerWorksheetNEW', $data); 
        // }else{
        //     $data['id'] = $id;
        //     $data['verifier'] = $VerifierModel->findAll();
        //     $data['personnel'] = $PersonnelModel->findAll();
        //     $data['standard'] = $standardModel->where('status', 'active')->findAll();
        //     $data['standardValue'] = $standardValueModel->findAll();
        //     $data['temperatureSource'] = $TemperatureSource->findAll();
        //     $data['driftValuePRT'] = $driftValuePRT->findAll();

        //     return view('DigitalThermometer/thermometerWorksheet', $data); 
        // }

        $data['id'] = $id;
        $data['verifier'] = $VerifierModel->findAll();
        $data['personnel'] = $PersonnelModel->findAll();
        $data['standard'] = $standardModel->where('status', 'active')->findAll();
        $data['standardValue'] = $standardValueModel->findAll();
        $data['temperatureSource'] = $TemperatureSource->findAll();
        $data['driftValuePRT'] = $driftValuePRT->findAll();

        return view('DigitalThermometer/thermometerWorksheet', $data); 
    

      
    }

    public function get_data_by_id(){
        $model = new DigitalThermometerModel();
        $userModel = new UserModel();
        $idOfCertificate = $this->request->getPost('idOfCertificate');
        $results['worksheetData'] = $model->where('id', $idOfCertificate)->first();
        $results['userData'] = $userModel->where('id', session()->get('id'))->first();
        return $this->response->setJSON($results);
    }
    public function get_data_for_previous_table(){
        $model = new DigitalThermometerModel();
        $results['previousData'] = $model->select('id, certificateNumber')->findAll();
        return $this->response->setJSON($results);
    }
    public function verifyCorrection(){
        $mainModel = new DigitalThermometerModel();
        $data = [
                'comments' => $this->request->getPost('comments'),
                'completion' => $this->request->getPost('completion'),
        ];        
        $id = $this->request->getPost('idOfCertificate');
        $mainModel->update($id,$data);
        return json_encode(['id' => $id]);
    }
    public function certificateNumberChecker(){
        $rml = new DigitalThermometerModel();
        $certNumToCheck = $this->request->getPost('certificateNumberToCheck');
        $isValid = 'false';
        $numberInDatabase = $rml->where('certificateNumber', $certNumToCheck)->countAllResults();
        if($numberInDatabase > 0){
                        $isValid = 'false';
                }else{
                        $isValid = 'true';
                }
        return $isValid;
    }
    public function certificateTable(){
        $data = [];
        $VerifierModel = new VerifierModel();
        $PersonnelModel = new PersonnelModel();
        $moduleModel = new DigitalThermometerModel();
        $data['verifier'] = $VerifierModel->findAll();
        $data['personnel'] = $PersonnelModel->findAll();
        $data['tableData'] = $moduleModel->findAll();
        return view('DigitalThermometer/thermometerTable', $data);
    }
    public function worksheetPrint($id, $verify = null){
        $rml = new DigitalThermometerModel();
        $VerifierModel = new VerifierModel();
        $PersonnelModel = new PersonnelModel();
        $userModel = new UserModel();

        $data['verifier'] = $VerifierModel->findAll();
        $data['personnel'] = $PersonnelModel->findAll();
        $data['datas'] = $rml->where('id', $id)->first();
        $data['forVerification'] = $verify;
        $data['user'] = $userModel->where('id', session()->get('id'))->first(); 
        if($verify == 'forVerification'){
                $dataToUpdate = [
                'completion' => 'On-going verification'
                ]; 
                $rml->update($id,$dataToUpdate);
        }
        return view('DigitalThermometer/thermometerPrintView',  $data);
    }
    public function deleteWorksheet($id){
        $model = new DigitalThermometerModel;
        $model->where('id', $id)->delete(); 
        return redirect()->to(base_url('digitalThermometer/certificates'))->with('status', 'Data Deleted Successfully!');
    }

    public function addNewWorksheetData(){
        $mainModel = new DigitalThermometerModel();
        $data = [
                'certificateNumber' => $this->request->getPost('calibrationCertificate'),
                'standard' => $this->request->getPost('standard'),
                'customerInfo' => $this->request->getPost('customerInfo'),
                'equipmentInfo' => $this->request->getPost('equipmentInfo'),
                'environmentInfo' => $this->request->getPost('environmentInfo'),
                'dataInputs' => $this->request->getPost('dataInputs'),
                'calculatedData' => $this->request->getPost('calculatedData'),
                'completion' => $this->request->getPost('completion'),
                'calibrationOfficer' => $this->request->getPost('calibrationOfficer'),
                'checkedBy' => $this->request->getPost('checkedBy'),
                'verifierPosition' => $this->request->getPost('verifierPosition'),
                'calibratorAccountEmail' => $this->request->getPost('calibratorAccountEmail'),
                'calibratorAccountID' => $this->request->getPost('calibratorAccountID'),
                'verifierEmail' => $this->request->getPost('verifierEmail'),
        ];        
        $mainModel->insert($data);
        $worksheetID = $mainModel->insertID();
        return json_encode(['id' => $worksheetID]);;
    }
    public function updateWorksheetData(){
        $mainModel = new DigitalThermometerModel();
        $data = [
                'certificateNumber' => $this->request->getPost('calibrationCertificate'),
                'standard' => $this->request->getPost('standard'),
                'customerInfo' => $this->request->getPost('customerInfo'),
                'equipmentInfo' => $this->request->getPost('equipmentInfo'),
                'environmentInfo' => $this->request->getPost('environmentInfo'),
                'dataInputs' => $this->request->getPost('dataInputs'),
                'calculatedData' => $this->request->getPost('calculatedData'),
                'completion' => $this->request->getPost('completion'),
                'calibrationOfficer' => $this->request->getPost('calibrationOfficer'),
                'checkedBy' => $this->request->getPost('checkedBy'),
                'verifierPosition' => $this->request->getPost('verifierPosition'),
                'calibratorAccountEmail' => $this->request->getPost('calibratorAccountEmail'),
                'calibratorAccountID' => $this->request->getPost('calibratorAccountID'),
                'verifierEmail' => $this->request->getPost('verifierEmail'),
        ];        
        $id = $this->request->getPost('idOfCertificate');
        $mainModel->update($id,$data);
        return json_encode(['id' => $id]);;
    }
    // public function updatePlaceholder(){
    //     $rml = new DigitalThermometerModel();
    //     $data = [
    //         'settingCalibrationProcedureAndTraceability' => $this->request->getPost('settingCalibrationProcedureAndTraceability'),
    //         'settingUncertaintyOfMeasurement' => $this->request->getPost('settingUncertaintyOfMeasurement'),
    //         'settingCalibrationResults' => $this->request->getPost('settingCalibrationResults'),
    //         'settingRemarks' => $this->request->getPost('remarkHere'),            
    //     ];        
    //     $idOfCert = $this->request->getPost('idHere');
    //     $rml->update($idOfCert,$data);
    //     return redirect()->to(base_url('digitalThermometer/print/'.$idOfCert))->with('status', 'Data Updated Successfully!');
    // }
    public function updatePlaceholder(){
        $rml = new DigitalThermometerModel();
        $data = [
        'settingCalibrationProcedureAndTraceability' => $this->request->getPost('settingCalibrationProcedureAndTraceability'),
        'settingUncertaintyOfMeasurement' => $this->request->getPost('settingUncertaintyOfMeasurement'),
        'settingCalibrationResults' => $this->request->getPost('settingCalibrationResults'),
        'settingRemarks1' => $this->request->getPost('settingRemarks'),            
        ];        
        $idOfCert = $this->request->getPost('idOfCertificate');
        $rml->update($idOfCert,$data);
        return redirect()->to(base_url('caliper/worksheet/'.$idOfCert))->with('status', 'Data Updated Successfully!');
    }

    function htmlToPDF($id){
        $rml = new DigitalThermometerModel();
        $placeholders = new PlaceholderModel();
        $cmc = new CMCmodel();
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $data['dataFromDB'] = $rml->where('id', $id)->first();
        $data['placeholders'] = $placeholders->findAll();
        $data['datePrev'] = $this->request->getPost('datePrev');
        $data['imageDraft'] = $this->request->getPost('imageDraft');
        $data['cmc'] = $cmc->where('modulenumber', '5')->findAll();
        $PDFState = $this->request->getPost('typeOfPrint');
        $certNumberPrev = $this->request->getPost('certNumberPrev');
        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('Enclosure/thermometerCertificate', $data), 'UTF-8');
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        if($PDFState == 'preview' || $PDFState == 'fullPreview'){
            $dompdf->stream('Certificate No.'.$certNumberPrev.".pdf",array("Attachment" => 0));
        }
        if($PDFState == 'download'){
            $dompdf->stream('Certificate No.'.$certNumberPrev.".pdf",array("Attachment" => 1));
        }
    }
    function generateReport(){
        $id = $this->request->getPost('certificateId');
        $draft = $this->request->getPost('certificateDraft');
        $download = $this->request->getPost('certificateDownload');
        $data['imageDraft'] = $draft;
        $PDFState = $download;

        $rml = new DigitalThermometerModel();
        $standardDetails = new ThermoStandard();
        $placeholders = new PlaceholderModel();
        $options = new Options();
        $cmc = new CMCmodel();
        
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        
        $data['dataFromDB'] = $rml->where('id', $id)->first();
        $data['placeholders'] = $placeholders->findAll();
        $data['datePrev'] = $this->request->getPost('datePrev');
        $data['standardDetails'] = $standardDetails->where('status', 'active')->findAll();
         $data['cmc'] = $cmc->where('modulenumber', '5')->findAll();

        $certificateLabel = $this->request->getPost('certificateLabel');
        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('DigitalThermometer/thermometerCertificate', $data), 'UTF-8');
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        if($PDFState == '0'){
            $dompdf->stream($certificateLabel.".pdf",array("Attachment" => 0));
        }
        if($PDFState == '1'){
            $dompdf->stream($certificateLabel.".pdf",array("Attachment" => 1));
        }   
    }

    //legacy


    public function new(){
        $data = [];
        $VerifierModel = new VerifierModel();
        $PersonnelModel = new PersonnelModel();
        $TemperatureSource = new ThermoStandardAddDriftModel();
        $driftValuePRT = new ThermoStandardAddDriftPRTModel();
        $data['verifier'] = $VerifierModel->findAll();
        $data['personnel'] = $PersonnelModel->findAll();
        $data['temperatureSource'] = $TemperatureSource->findAll();
        $data['driftValuePRT'] = $driftValuePRT->findAll();
        return view('DigitalThermometer/thermometerWorksheet-BACKUP', $data);
    }

    public function table(){
        $model = new DigitalThermometerModel();    
        $VerifierModel = new VerifierModel();
        $PersonnelModel = new PersonnelModel();

        $data = [];
        $data['verifier'] = $VerifierModel->findAll();
        $data['personnel'] = $PersonnelModel->findAll();
        $data['tableData'] = $model->findAll();

        return view('DigitalThermometer/thermometerTable', $data);
    }
    public function thermometerStandardTable(){
        $ThermoStandard = new ThermoStandard();
        $data['thermostandardtable'] = $ThermoStandard->findAll();
        //return view('Thermohygrometer/ThermoStandardTable',$data);

        if($this->request->getGet('q')){
			$q=$this->request->getGet('q');
			$data['thermostandardtable'] = $ThermoStandard->where('certificateNumber', $q)->orWhere('serialNumber', $q)->findAll();
		}else{
			$data['thermostandardtable'] = $ThermoStandard->findAll();
		}
        return view('DigitalThermometer/thermometerStandardTable',  $data);
    }
    

    public function storeData(){
        $model = new DigitalThermometerModel();
        $imageTable = new ElectModel_image();
        $data = [
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'customer' => $this->request->getPost('customer'),
            'address' => $this->request->getPost('address'),
            'dateReceived' => $this->request->getPost('dateReceived'),
            'dateCalibrated' => $this->request->getPost('dateCalibrated'),
            'recommendedDueDate' => $this->request->getPost('recommendedDueDate'),
            'placeOfCalibration' => $this->request->getPost('placeOfCalibration'),
            'standardUsed' => $this->request->getPost('standardUsed'),
            'premA' => $this->request->getPost('premA'),
            'premB' => $this->request->getPost('premB'),
            'premC' => $this->request->getPost('premC'),
            'premD' => $this->request->getPost('premD'),
            'calibrationOfficer' => $this->request->getPost('calibrationOfficer'),
            'checkedBy' => $this->request->getPost('checkedBy'),
            'verifierPosition' => $this->request->getPost('verifierPosition'),
            'specificationsArray' => $this->request->getPost('specificationsArray'),
            'environmentArray' => $this->request->getPost('environmentArray'),
            'calculatedValues' => $this->request->getPost('calculatedValues'),
            'completion' => $this->request->getPost('completion'),
            
            'calibratorAccountEmail' => $this->request->getPost('calibratorAccountEmail'),
            'calibratorAccountID' => $this->request->getPost('calibratorAccountID'),
            'verifierEmail' => $this->request->getPost('verifierEmail'),

        ];
        $file = $this->request->getFile('image');

        if($file->isValid() && ! $file -> hasMoved()){
            $imageName = $file->getRandomName();
            $file->move('uploads/', $imageName);
        }else{
            $imageName = null;
        }

        $dataImage = [
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'image' =>  $imageName,
        ];

        if($imageName != null){
            $imageTable->save($dataImage);
        }

        $model->insert($data);
        return redirect()->to(base_url('digitalThermometer/table'))->with('status', 'Data Added Successfully!');
    }
    public function editData($id = null, $verify = null){
        // $DigitalThermometerModel = new DigitalThermometerModel();
        // $VerifierModel = new VerifierModel();
        // $PersonnelModel = new PersonnelModel();
        // $TemperatureSource = new ThermoStandardAddDriftModel();
        // $driftValuePRT = new ThermoStandardAddDriftPRTModel();
        // $data['verifier'] = $VerifierModel->findAll();
        // $data['personnel'] = $PersonnelModel->findAll();
        // $data['temperatureSource'] = $TemperatureSource->findAll();
        // $data['driftValuePRT'] = $driftValuePRT->findAll();
        // $data['editData'] = $DigitalThermometerModel->where('id', $id)->first();
        // $data['forVerification'] = $verify;
        
        // return view('DigitalThermometer/thermometerWorksheetEdit', $data);

        $data = [];
        $VerifierModel = new VerifierModel();
        $PersonnelModel = new PersonnelModel();
        $TemperatureSource = new ThermoStandardAddDriftModel();
        $driftValuePRT = new ThermoStandardAddDriftPRTModel();
        $standardModel = new ThermoStandard();

        $data['id'] = $id;
        $data['verifier'] = $VerifierModel->findAll();
        $data['personnel'] = $PersonnelModel->findAll();
        $data['temperatureSource'] = $TemperatureSource->findAll();
        $data['driftValuePRT'] = $driftValuePRT->findAll();
        $data['standard'] = $standardModel->findAll();

        return view('DigitalThermometer/thermometerWorksheetEdit', $data);        

    }

    public function temperatureSource(){
        $TemperatureSource = new TemperatureSource();
        $data['TemperatureSource'] = $TemperatureSource->findAll();
        return view('DigitalThermometer/temperatureSourceTable', $data);
    }

    public function addNewSource(){
        $model = new TemperatureSource;
        $data = [
            'code' => $this->request->getPost('code'),
            'maxInstability' => $this->request->getPost('maxInstability'),
            'maxAxial' => $this->request->getPost('maxAxial'),
            'maxRadial' => $this->request->getPost('maxRadial'),
            'description' => $this->request->getPost('description'),
        ];
        $model->insert($data);
        return redirect()->to(base_url('digitalThermometer/temperatureSourceTable'))->with('status', 'Data Added Successfully!');
    }
    public function updateSource(){
        $model = new TemperatureSource;
        $data = [
            'code' => $this->request->getPost('code'),
            'maxInstability' => $this->request->getPost('maxInstability'),
            'maxAxial' => $this->request->getPost('maxAxial'),
            'maxRadial' => $this->request->getPost('maxRadial'),
            'description' => $this->request->getPost('description'),
        ];
        $standardID = $this->request->getPost('standardID');
        $model->update($standardID,$data);
        return redirect()->to(base_url('digitalThermometer/temperatureSourceTable'))->with('status', 'Data Added Successfully!');
    }

    public function deleteNewSource($id){
        $model = new TemperatureSource;
        $model->where('id', $id)->delete(); 
        return redirect()->to(base_url('digitalThermometer/temperatureSourceTable'))->with('status', 'Data Deleted Successfully!');
    }
    public function getSourceStandard(){
        $standardModel = new TemperatureSource();
        $results['standardData'] = $standardModel->findAll();
        return $this->response->setJSON($results);
    }
    public function getSourceById(){
        $standardModel = new TemperatureSource();
        $standardID = $this->request->getPost('selectedStandardID');
        $results['standardValues'] = $standardModel->whereIn('standardID', $standardID)->findAll();
        return $this->response->setJSON($results);
    }





    public function addImage($worksheetID = null){
        $mainModel = new ImageModel();
        $worksheetModel = new TemperatureSource();
        
        $imageFiles = $this->request->getFiles('imageFiles');
        
        $imageIDArray = [];

        foreach ($imageFiles as $file) {
                foreach ($file as $individualFile) {
                    if ($individualFile->isValid() && !$individualFile->hasMoved()) {
                                $newName = $individualFile->getRandomName();
                                $individualFile->move(WRITEPATH . 'uploads/', $newName);
        
                                $filePath = 'uploads/' . $newName;

                                $data = [
                                        'worksheetID' => $worksheetID,
                                        'imagePath' => $filePath,
                                        'imageName' => $newName,
                                ];
                                $mainModel->insert($data);
                                $imageID = $mainModel->insertID();
                                array_push($imageIDArray, $imageID);
                        }
                }
        }
        if($worksheetID != null){
                $worksheetUpdateData = [
                        'images' => json_encode($imageIDArray),
                ];
                $worksheetModel->update($worksheetID,$worksheetUpdateData);
        }

        return json_encode(['imageIDArray' => $imageIDArray]);
        
    }

    
    
    public function print($id, $verify = null){
        $rml = new DigitalThermometerModel();
        $VerifierModel = new VerifierModel();
        $PersonnelModel = new PersonnelModel();
        $userModel = new UserModel();

        $data['verifier'] = $VerifierModel->findAll();
        $data['personnel'] = $PersonnelModel->findAll();
        $data['datas'] = $rml->where('id', $id)->first();
        $data['forVerification'] = $verify;
        $data['user'] = $userModel->where('id', session()->get('id'))->first(); 
        if($verify == 'forVerification'){
            $dataToUpdate = [
                'completion' => 'On-going verification'
            ]; 
            $rml->update($id,$dataToUpdate);
        }
        return view('DigitalThermometer/thermometerPrintView',  $data);
    }
    public function checkCertNum(){
        $rml = new DigitalThermometerModel();
        $certNumToCheck = $this->request->getPost('q');
        $existing = false;
        if($rml->where('certificateNumber', $certNumToCheck)->countAllResults()>0){
			$existing = 'true';
		}else{
			$existing = 'false';
		}
        return $existing;
    }
   
    public function updateData(){
        $model = new DigitalThermometerModel();
        $imageTable = new ElectModel_image();
        $data = [
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'customer' => $this->request->getPost('customer'),
            'address' => $this->request->getPost('address'),
            'dateReceived' => $this->request->getPost('dateReceived'),
            'dateCalibrated' => $this->request->getPost('dateCalibrated'),
            'recommendedDueDate' => $this->request->getPost('recommendedDueDate'),
            'placeOfCalibration' => $this->request->getPost('placeOfCalibration'),
            'standardUsed' => $this->request->getPost('standardUsed'),
            'premA' => $this->request->getPost('premA'),
            'premB' => $this->request->getPost('premB'),
            'premC' => $this->request->getPost('premC'),
            'premD' => $this->request->getPost('premD'),
            'calibrationOfficer' => $this->request->getPost('calibrationOfficer'),
            'checkedBy' => $this->request->getPost('checkedBy'),
            'verifierPosition' => $this->request->getPost('verifierPosition'),
            'specificationsArray' => $this->request->getPost('specificationsArray'),
            'environmentArray' => $this->request->getPost('environmentArray'),
            'calculatedValues' => $this->request->getPost('calculatedValues'),
            'completion' => $this->request->getPost('completion'),
            
            'calibratorAccountEmail' => $this->request->getPost('calibratorAccountEmail'),
            'calibratorAccountID' => $this->request->getPost('calibratorAccountID'),
            'verifierEmail' => $this->request->getPost('verifierEmail'),

        ];

        $idForImage = $this->request->getPost('idOfCertificate');
    
        $idOfCert = $this->request->getPost('idOfCertificate');
        $completion = $this->request->getPost('completion');

        $model->update($idOfCert,$data);
        if($completion == 'For printing'){
            return redirect()->to(base_url('forVerifyTable'))->with('status', 'Data Verified!');
        }else{
            return redirect()->to(base_url('digitalThermometer/table'))->with('status', 'Data Added Successfully!');
        }
    }
    public function PabLogoUpdate(){
        $rml = new DigitalThermometerModel();
        $data = [
            'PabLogo' => $this->request->getPost('pablogoValue'),
        ];
        $ID = $this->request->getPost('id');
        $rml->update($ID,$data);
        return redirect()->to(base_url('weighingScalePrint/'.$ID))->with('status', 'PAB Updated Successfully!');
    }
    public function correction(){
        $model = new DigitalThermometerModel();
        $data = [
            'completion' => $this->request->getPost('completion'),
        ];        
        $idOfCert = $this->request->getPost('idOfCertificate');
        $model->update($idOfCert,$data);
        return redirect()->to(base_url('forVerifyTable'))->with('status', 'Data for Correction!');
    }
    public function verify(){
        $model = new DigitalThermometerModel();
        $data = [
            'completion' => $this->request->getPost('completion'),
        ];        
        $idOfCert = $this->request->getPost('idOfCertificate');
        $model->update($idOfCert,$data);
        return redirect()->to(base_url('forVerifyTable'))->with('status', 'Data Validated!');
    }
    public function updateWord(){
        $rml = new DigitalThermometerModel();
        $data = [
            'settingCalibrationProcedureAndTraceability' => $this->request->getPost('settingCalibrationProcedureAndTraceability'),
            'settingUncertaintyOfMeasurement' => $this->request->getPost('settingUncertaintyOfMeasurement'),
            'settingCalibrationResults' => $this->request->getPost('settingCalibrationResults'),
            'settingRemarks1' => $this->request->getPost('remarkHere'),            
        ];        
        $idOfCert = $this->request->getPost('idHere');
        $rml->update($idOfCert,$data);
        return redirect()->to(base_url('digitalThermometer/print/'.$idOfCert))->with('status', 'Data Updated Successfully!');
    }
    // function htmlToPDF($id){
    //     $rml = new DigitalThermometerModel();
    //     // $html =  $_POST['chart_input'] ;
    //     $options = new Options();
    //     $options->set('isJavascriptEnabled', TRUE); 
    //     $options->set('isHtml5ParserEnabled', TRUE);     
    //     $data['dataFromDB'] = $rml->where('id', $id)->first();
    //     $data['datePrev'] = $this->request->getPost('datePrev');
    //     $data['imageDraft'] = $this->request->getPost('imageDraft');
    //     $PDFState = $this->request->getPost('typeOfPrint');
    //     $certNumberPrev = $this->request->getPost('certNumberPrev');
    //     $customPaper = array(0, 0, 595.28, 841.89); 
    //     $dompdf = new \Dompdf\Dompdf($options); 
    //     $dompdf->loadHtml(view('DigitalThermometer/thermometerCertificate', $data), 'UTF-8');
    //     $dompdf->setPaper('a4', 'portrait');
    //     $dompdf->render();
    //     if($PDFState == 'preview' || $PDFState == 'fullPreview'){
    //         $dompdf->stream('Certificate No.'.$certNumberPrev.".pdf",array("Attachment" => 0));
    //     }
    //     if($PDFState == 'download'){
    //         $dompdf->stream('Certificate No.'.$certNumberPrev.".pdf",array("Attachment" => 1));
    //     }
    // }
}





    


