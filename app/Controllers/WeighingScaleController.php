<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CustomersModel;
use App\Models\VerifierModel;
use App\Models\PersonnelModel;
use App\Models\Defaults;
use App\Models\ElectModel_image;
use App\Models\ImageModel;
use Dompdf\Options; 
use App\Models\CMCmodel;

use App\Models\WeighingScaleModel;
use App\Models\ElectModel_3;
use App\Models\ElectModel_2;

class WeighingScaleController extends BaseController{

    public function worksheet($id = null, $verify = null){
        $data = [];
        $VerifierModel = new VerifierModel();
        $PersonnelModel = new PersonnelModel();
        $standardDetailsModel = new ElectModel_2();
        $standardValuesModel = new ElectModel_3();

        $data['id'] = $id;
        $data['verifier'] = $VerifierModel->findAll();
        $data['personnel'] = $PersonnelModel->findAll();
        
        return view('WeighingScale/weighingScaleNew', $data);        
    }
    public function addNewWorksheetData(){
        $mainModel = new WeighingScaleModel();
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
        $mainModel = new WeighingScaleModel();
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
    public function certificateNumberChecker(){
        $rml = new WeighingScaleModel();
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
    public function get_data_by_id(){
        $model = new WeighingScaleModel();
        $userModel = new UserModel();
        $idOfCertificate = $this->request->getPost('idOfCertificate');
        $results['worksheetData'] = $model->where('id', $idOfCertificate)->first();
        $results['userData'] = $userModel->where('id', session()->get('id'))->first();
        return $this->response->setJSON($results);
    }
    public function verifyCorrection(){
        $mainModel = new WeighingScaleModel();
        $data = [
                'comments' => $this->request->getPost('comments'),
                'completion' => $this->request->getPost('completion'),
        ];        
        $id = $this->request->getPost('idOfCertificate');
        $mainModel->update($id,$data);
        return json_encode(['id' => $id]);
    }
    public function deleteData($certificateNumber){
        $rml = new WeighingScaleModel();
        $rml->where('id', $certificateNumber)->delete(); 
        return redirect()->to( base_url('weighingScaleTable'))->with('status', 'Data Deleted Successfully!');
    }
    public function addImage($worksheetID = null){
        $mainModel = new ImageModel();
        $worksheetModel = new WeighingScaleModel();
        
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
    public function updatePlaceholder(){
        $rml = new WeighingScaleModel();
        $data = [
        'settingCalibrationProcedureAndTraceability' => $this->request->getPost('settingCalibrationProcedureAndTraceability'),
        'settingUncertaintyOfMeasurement' => $this->request->getPost('settingUncertaintyOfMeasurement'),
        'settingCalibrationResults' => $this->request->getPost('settingCalibrationResults'),
        'settingRemarks' => $this->request->getPost('settingRemarks'),            
        ];        
        $idOfCert = $this->request->getPost('idOfCertificate');
        $rml->update($idOfCert,$data);
        return redirect()->to(base_url('caliper/worksheet/'.$idOfCert))->with('status', 'Data Updated Successfully!');
    }
    public function generateReport(){
        try {
            $rml = new WeighingScaleModel();
            $cmc = new CMCmodel();

            $id = $this->request->getPost('certificateId');
            $draft = $this->request->getPost('certificateDraft');
            $download = $this->request->getPost('certificateDownload');
            $data['imageDraft'] = $draft;
            $PDFState = $download;
    
            $html =  $_POST['chart'] ;
            $options = new Options();
            $options->set('isJavascriptEnabled', TRUE); 
            $options->set('isHtml5ParserEnabled', TRUE);     
            $data['weighingScaleData'] = $rml->where('id', $id)->first();
            $data["img"] = ["image"=>$html];
            $data['datePrev'] = $this->request->getPost('datePrev');
            $data['cmc'] = $cmc->where('modulenumber', '4')->findAll();
            $PDFState = $this->request->getPost('PDFState');
            $certNumberPrev = $this->request->getPost('certNumberPrev');
            $customPaper = array(0, 0, 595.28, 841.89); 
            $data = \App\Libraries\CertificateQr::attach($data, 'weighingScale', 'weighingScaleData');
            $dompdf = new \Dompdf\Dompdf($options); 
            $dompdf->loadHtml(view('WeighingScale/weighingScaleCalibrationCertificate', $data), 'UTF-8');
            $dompdf->setPaper('a4', 'portrait');
            $dompdf->render();
            if($download == '0'){
                $dompdf->stream('Certificate No.'.$certNumberPrev.".pdf",array("Attachment" => 0));
            }
            if($download == '1'){
                $dompdf->stream('Certificate No.'.$certNumberPrev.".pdf",array("Attachment" => 1));
            }
        } catch (\Throwable $th) {
            log_message('error', 'Weighing scale certificate failed: {message} in {errorFile}:{errorLine}', ['message' => $th->getMessage(), 'errorFile' => $th->getFile(), 'errorLine' => $th->getLine()]);
            return $this->response->setStatusCode(500)->setBody('The certificate could not be generated: ' . esc($th->getMessage()));
        }


    }
   

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



    public function weighingScaleNew(){
        $data = [];
        $VerifierModel = new VerifierModel();
        $PersonnelModel = new PersonnelModel();
        $data['verifier'] = $VerifierModel->findAll();
        $data['personnel'] = $PersonnelModel->findAll();
        return view('WeighingScale/weighingScaleNew copy', $data);
    }
    public function weighingScaleEdit($id, $verify = null){
        $data = [];
        $VerifierModel = new VerifierModel();
        $PersonnelModel = new PersonnelModel();
        $WeighingScaleModel = new WeighingScaleModel();
        $data['verifier'] = $VerifierModel->findAll();
        $data['personnel'] = $PersonnelModel->findAll();
        $data['weighingScaleData'] = $WeighingScaleModel->where('id', $id)->first();
        $data['forVerification'] = $verify;
        
        return view('WeighingScale/weighingScaleEdit', $data);
    }
    
    public function weighingScaleTable(){
        $data = [];
        $VerifierModel = new VerifierModel();
        $PersonnelModel = new PersonnelModel();
        $WeighingScaleModel = new WeighingScaleModel();
        $data['verifier'] = $VerifierModel->findAll();
        $data['personnel'] = $PersonnelModel->findAll();
        $data['tableData'] = $WeighingScaleModel->findAll();
        return view('WeighingScale/weighingScaleTable', $data);
    }
    public function weighingScalePrint($id, $verify = null){
        $rml = new WeighingScaleModel();
        $VerifierModel = new VerifierModel();
        $PersonnelModel = new PersonnelModel();
        $userModel = new UserModel();

        $data['verifier'] = $VerifierModel->findAll();
        $data['personnel'] = $PersonnelModel->findAll();
        $data['weighingScaleData'] = $rml->where('id', $id)->first();
        $data['forVerification'] = $verify;
        $data['user'] = $userModel->where('id', session()->get('id'))->first(); 
        if($verify == 'forVerification'){
            $dataToUpdate = [
                'completion' => 'On-going verification'
            ]; 
            $rml->update($id,$dataToUpdate);
        }
        return view('WeighingScale/weighingScalePrint',  $data);
    }
    public function checkCertNum(){
        $rml = new WeighingScaleModel();
        $certNumToCheck = $this->request->getPost('q');
        $existing = false;
        if($rml->where('certificateNumber', $certNumToCheck)->countAllResults()>0){
			$existing = 'true';
		}else{
			$existing = 'false';
		}
        return $existing;
    }
    public function storeData(){
        $model = new WeighingScaleModel();
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
            'premE' => $this->request->getPost('premE'),
            'premF' => $this->request->getPost('premF'),
            'premG' => $this->request->getPost('premG'),
            'illustration' => $this->request->getPost('illustration'),
            'calibrationOfficer' => $this->request->getPost('calibrationOfficer'),
            'checkedBy' => $this->request->getPost('checkedBy'),
            'verifierPosition' => $this->request->getPost('verifierPosition'),
            'specificationData' => $this->request->getPost('specificationsArray'),
            'environmentData' => $this->request->getPost('environmentArray'),
            'spanCalibrationData' => $this->request->getPost('spanTableArray'),
            'sensitivityTestData' => $this->request->getPost('sensitivityTableArray'),
            'eccentricityTestData' => $this->request->getPost('eccentricityTableArray'),
            'linearityTestData' => $this->request->getPost('linearityTestTableArray'),
            'repeatabilityTestData' => $this->request->getPost('repeatabilityTableArray'),
            'calculatedValuesData' => $this->request->getPost('calculatedValues'),
            'completion' => $this->request->getPost('completion'),
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
        return redirect()->to(base_url('weighingScaleTable'))->with('status', 'Data Added Successfully!');
    }
    public function updateData(){
        $model = new WeighingScaleModel();
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
            'premE' => $this->request->getPost('premE'),
            'premF' => $this->request->getPost('premF'),
            'premG' => $this->request->getPost('premG'),
            'illustration' => $this->request->getPost('illustration'),
            'calibrationOfficer' => $this->request->getPost('calibrationOfficer'),
            'checkedBy' => $this->request->getPost('checkedBy'),
            'verifierPosition' => $this->request->getPost('verifierPosition'),
            'specificationData' => $this->request->getPost('specificationsArray'),
            'environmentData' => $this->request->getPost('environmentArray'),
            'spanCalibrationData' => $this->request->getPost('spanTableArray'),
            'sensitivityTestData' => $this->request->getPost('sensitivityTableArray'),
            'eccentricityTestData' => $this->request->getPost('eccentricityTableArray'),
            'linearityTestData' => $this->request->getPost('linearityTestTableArray'),
            'repeatabilityTestData' => $this->request->getPost('repeatabilityTableArray'),
            'calculatedValuesData' => $this->request->getPost('calculatedValues'),
            'completion' => $this->request->getPost('completion'),
        ];

        $table2Id = $this->request->getPost('idOfCertificate');
        $completion = $this->request->getPost('completion');
        $model->update($table2Id,$data);
        if($completion == 'For printing'){
            return redirect()->to(base_url('forVerifyTable'))->with('status', 'Data Verified!');
        }else{
            return redirect()->to(base_url('weighingScaleTable'))->with('status', 'Data Added Successfully!');
        }
    }
    public function PabLogoUpdate(){
        $rml = new WeighingScaleModel();
        $data = [
            'PabLogo' => $this->request->getPost('pablogoValue'),
        ];
        $ID = $this->request->getPost('id');
        $rml->update($ID,$data);
        return redirect()->to(base_url('weighingScalePrint/'.$ID))->with('status', 'PAB Updated Successfully!');
    }
    public function updateCorrection(){
        $model = new WeighingScaleModel();
        $data = [
            'completion' => $this->request->getPost('completion'),
        ];        
        $idOfCert = $this->request->getPost('idOfCertificate');
        $model->update($idOfCert,$data);
        return redirect()->to(base_url('forVerifyTable'))->with('status', 'Data for Correction!');
    }
    public function updateVerify(){
        $model = new WeighingScaleModel();
        $data = [
            'completion' => $this->request->getPost('completion'),
        ];        
        $idOfCert = $this->request->getPost('idOfCertificate');
        $model->update($idOfCert,$data);
        return redirect()->to(base_url('forVerifyTable'))->with('status', 'Data Validated!');
    }
    public function updateWord(){
        $rml = new WeighingScaleModel();
        $data = [
            'settingCalibrationProcedureAndTraceability' => $this->request->getPost('settingCalibrationProcedureAndTraceability'),
            'settingUncertaintyOfMeasurement' => $this->request->getPost('settingUncertaintyOfMeasurement'),
            'settingCalibrationResults' => $this->request->getPost('settingCalibrationResults'),
            'settingRemarks' => $this->request->getPost('remarkHere'),            
        ];        
        $idOfCert = $this->request->getPost('idHere');
        $rml->update($idOfCert,$data);
        return redirect()->to(base_url('weighingScalePrint/'.$idOfCert))->with('status', 'Data Updated Successfully!');
    }
    function htmlToPDF($id){
        $rml = new WeighingScaleModel();
        $html =  $_POST['chart'] ;
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $data['weighingScaleData'] = $rml->where('id', $id)->first();
        $data["img"] = ["image"=>$html];
        $data['datePrev'] = $this->request->getPost('datePrev');
        $data['imageDraft'] = $this->request->getPost('imageDraft');
        $PDFState = $this->request->getPost('PDFState');
        $certNumberPrev = $this->request->getPost('certNumberPrev');
        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('WeighingScale/weighingScaleCalibrationCertificate', $data), 'UTF-8');
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        if($PDFState == 'Preview' || $PDFState == 'PreviewFull'){
            $dompdf->stream('Certificate No.'.$certNumberPrev.".pdf",array("Attachment" => 0));
        }
        if($PDFState == 'Download'){
            $dompdf->stream('Certificate No.'.$certNumberPrev.".pdf",array("Attachment" => 1));
        }
    }
}

    


