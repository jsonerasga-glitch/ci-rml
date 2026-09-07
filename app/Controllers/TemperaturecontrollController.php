<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CustomersModel;
use App\Models\VerifierModel;
use App\Models\PersonnelModel;
use App\Models\Defaults;
use App\Models\ElectModel_image;
use App\Models\PlaceholderModel;
use Dompdf\Options; 


use App\Models\TemperatureControllModel;
use App\Models\TestWeightSensitivityTestModel; 
use App\Models\MultiProductCalibratorStandardModel; //multi-product calibrator details
use App\Models\MultiProductCalibratorStandardValuesModel; //multi-product calibrator values
use App\Models\DocumentingProcessCalibratorStandardModel; //documenting process calibrator details
use App\Models\DocumentingProcessCalibratorStandardValuesModel; //documenting process calibrator values



class TemperaturecontrollController extends BaseController{
	public function worksheet($id = null, $verify = null){
        $data = [];
        $VerifierModel = new VerifierModel();
        $PersonnelModel = new PersonnelModel();
        $customerModel = new CustomersModel();
        $placeholderModel = new PlaceholderModel();

        $standardMultiproduct = new MultiProductCalibratorStandardModel();
        $standardMultiProductValues = new MultiProductCalibratorStandardModel();

        $standardDocumentingProcess = new DocumentingProcessCalibratorStandardModel();
        $standardDocumentingProcessValues = new DocumentingProcessCalibratorStandardValuesModel();

        $data['id'] = $id;
        $data['verifier'] = $VerifierModel->findAll();
        $data['personnel'] = $PersonnelModel->findAll();

        $data['standardDataMultiProductCalibrator'] = $standardMultiproduct->where('status', 'active')->findAll();
        $data['standardDataMultiProductCalibratorValues'] = $standardMultiProductValues->where('status', 'active')->findAll();

        $data['standardDataDocumentingProcessCalibrator'] = $standardDocumentingProcess->where('status', 'active')->findAll();
        $data['standardDataDocumentingProcessCalibratorValues'] = $standardDocumentingProcessValues->where('status', 'active')->findAll();

        $data['customers'] = $customerModel->findAll();
        $data['placeholders'] = $placeholderModel->findAll();

        return view('TemperatureControll/temperaturecontrollWorksheet', $data);        
    }

    public function get_data_by_id(){
        $model = new TemperaturecontrollModel();
        $userModel = new UserModel();
        $idOfCertificate = $this->request->getPost('idOfCertificate');
        $results['userData'] = $userModel->where('id', session()->get('id'))->first(); 
        $results['worksheetData'] = $model->where('id', $idOfCertificate)->first();
        return $this->response->setJSON($results);
    }
    public function certificateNumberChecker(){
        $rml = new TemperaturecontrollModel();
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
        $moduleModel = new TemperatureControllModel();
        $data['verifier'] = $VerifierModel->findAll();
        $data['personnel'] = $PersonnelModel->findAll();
        $data['tableData'] = $moduleModel->findAll();
        return view('TemperatureControll/temperaturecontrollTable', $data);
    }
    public function worksheetPrint($id, $verify = null){
        $rml = new TemperatureControllModel();
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
        return view('TemperatureControll/temperaturecontrollrPrintView',  $data);
    }

    public function addNewWorksheetData(){
        $mainModel = new TemperatureControllModel();
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
        return json_encode(['id' => $worksheetID]);
    }

    public function updateWorksheetData(){
        $mainModel = new TemperatureControllModel();
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
        return json_encode(['id' => $id]);
    }

    public function updatePlaceholder(){
        $rml = new TemperatureControllModel();
        $data = [
            'settingCalibrationProcedureAndTraceability' => $this->request->getPost('settingCalibrationProcedureAndTraceability'),
            'settingUncertaintyOfMeasurement' => $this->request->getPost('settingUncertaintyOfMeasurement'),
            'settingCalibrationResults' => $this->request->getPost('settingCalibrationResults'),
            'settingRemarks' => $this->request->getPost('settingRemarks'),            
        ];        
        $idOfCert = $this->request->getPost('idOfCertificate');
        $rml->update($idOfCert,$data);
        return redirect()->to(base_url('temperaturecontroll/worksheet/'.$idOfCert))->with('status', 'Data Updated Successfully!');
    }
    public function deleteWorksheet($id){
        $model = new TemperatureControllModel;
        $model->where('id', $id)->delete(); 
        return redirect()->to(base_url('temperaturecontroll/certificates'))->with('status', 'Data Deleted Successfully!');
    }
    function htmlToPDF($id){
        $rml = new TemperatureControllModel();
        $placeholders = new PlaceholderModel();
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $data['dataFromDB'] = $rml->where('id', $id)->first();
        $data['placeholders'] = $placeholders->findAll();
        $data['datePrev'] = $this->request->getPost('datePrev');
        $data['imageDraft'] = $this->request->getPost('imageDraft');
        $PDFState = $this->request->getPost('typeOfPrint');
        $certNumberPrev = $this->request->getPost('certNumberPrev');
        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('TemperatureControll/temperaturecontrollCertificate', $data), 'UTF-8');
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        if($PDFState == 'preview' || $PDFState == 'fullPreview'){
            $dompdf->stream('Certificate No.'.$certNumberPrev.".pdf",array("Attachment" => 0));
        }
        if($PDFState == 'download'){
            $dompdf->stream('Certificate No.'.$certNumberPrev.".pdf",array("Attachment" => 1));
        }
    }

    // function generateReport($id, $draft = '0', $download = '0'){
    //     $rml = new TemperatureControllModel();
    //     $placeholders = new PlaceholderModel();
    //     $options = new Options();
    //     $options->set('isJavascriptEnabled', TRUE); 
    //     $options->set('isHtml5ParserEnabled', TRUE);     
    //     $certNumberPrev = 'TO BE REPLACED';
    //     $customPaper = array(0, 0, 595.28, 841.89); 
    //     $data['dataFromDB'] = $rml->where('id', $id)->first();
    //     $data['isDraft'] = $draft;
    //     $dompdf = new \Dompdf\Dompdf($options); 
    //     $dompdf->loadHtml(view('TemperatureControll/temperaturecontrollCertificate', $data), 'UTF-8');
    //     $dompdf->setPaper('a4', 'portrait');
    //     $dompdf->render();
    //     if($download == '0'){
    //         $dompdf->stream('Certificate No.'.$certNumberPrev.".pdf",array("Attachment" => 0));
    //     }
    //     if($download == '1'){
    //         $dompdf->stream('Certificate No.'.$certNumberPrev.".pdf",array("Attachment" => 1));
    //     }
    // }


    function generateReport(){
        $id = $this->request->getPost('certificateId');
        $draft = $this->request->getPost('certificateDraft');
        $download = $this->request->getPost('certificateDownload');
        $html = $_POST['chart_input'];
        $data["img"] = ["image"=>$html];
        $data['imageDraft'] = $draft;
        $PDFState = $download;
    
        $rml = new TemperatureControllModel();
        $placeholders = new PlaceholderModel();
        $options = new Options();
        
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        
        $data['dataFromDB'] = $rml->where('id', $id)->first();
        $data['placeholders'] = $placeholders->findAll();
        $data['datePrev'] = $this->request->getPost('datePrev');
        
    
        $certificateLabel = $this->request->getPost('certificateLabel');
        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('TemperatureControll/temperaturecontrollCertificate', $data), 'UTF-8');
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();      
        if($PDFState == '0'){
        $dompdf->stream($certificateLabel.".pdf",array("Attachment" => 0));
        }
        if($PDFState == '1'){
        $dompdf->stream($certificateLabel.".pdf",array("Attachment" => 1));
        }
    //$dompdf->stream('Certificate No.'.$id.".pdf",array("Attachment" => 1));
    }

    

}
