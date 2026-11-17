<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CustomersModel;
use App\Models\VerifierModel;
use App\Models\PersonnelModel;
use App\Models\Defaults;
use App\Models\ElectModel_image;
use App\Models\ImageModel;
use App\Models\PlaceholderModel;
use Dompdf\Options; 
use App\Models\CMCmodel;

use App\Models\TestWeightSensitivityTestModel; 
use App\Models\BarometerStandardModel; 
use App\Models\BalanceStandardModel; 

use App\Models\ThermoStandard;
use App\Models\ThermoStandardAddDriftModel;
use App\Models\ThermoStandardAddDriftPRTModel;
use App\Models\ThermoStandardAddTestPointsModel;

use App\Models\GlasswareModel;

class GlasswareController extends BaseController{
	public function worksheet($id = null, $verify = null){
        $data = [];
        $VerifierModel = new VerifierModel();
        $PersonnelModel = new PersonnelModel();
        $customerModel = new CustomersModel();
        // $balanceModel = new TestWeightSensitivityTestModel();
        $balanceModel = new BalanceStandardModel();
        $barometerModel = new BarometerStandardModel();

        $thermometerDetailsModel = new ThermoStandard();
        $thermometerDriftModel = new ThermoStandardAddDriftModel();
        $thermometerDriftPRTModel = new ThermoStandardAddDriftPRTModel();
        $thermometerTestpointModel = new ThermoStandardAddTestPointsModel();

        $data['id'] = $id;
        $data['verifier'] = $VerifierModel->findAll();
        $data['personnel'] = $PersonnelModel->findAll();
        $data['customers'] = $customerModel->findAll();
        
        $data['standardBalance'] = $balanceModel->where('status', 'active')->findAll();
        $data['standardBarometer'] = $barometerModel->findAll();

        $data['standardThermometerDetails'] = $thermometerDetailsModel->findAll();
        $data['standardThermometerDrift'] = $thermometerDriftModel->findAll();
        $data['standardThermometerDriftPRT'] = $thermometerDriftPRTModel->findAll();
        $data['standardThermometerTestpoint'] = $thermometerTestpointModel->findAll();

        return view('Glassware/glasswareWorksheet', $data);        
    }

    public function get_data_by_id(){
        $model = new GlasswareModel();
        $idOfCertificate = $this->request->getPost('idOfCertificate');
        $results['worksheetData'] = $model->where('id', $idOfCertificate)->first();
        return $this->response->setJSON($results);
    }
    public function certificateNumberChecker(){
        $rml = new GlasswareModel();
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
        $moduleModel = new GlasswareModel();
        $data['verifier'] = $VerifierModel->findAll();
        $data['personnel'] = $PersonnelModel->findAll();
        $data['tableData'] = $moduleModel->findAll();
        return view('Glassware/glasswareTable', $data);
    }
    public function worksheetPrint($id, $verify = null){
        $rml = new GlasswareModel();
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
        return view('Glassware/glasswarePrintView',  $data);
    }
    public function deleteWorksheet($id){
        $model = new GlasswareModel;
        $model->where('id', $id)->delete(); 
        return redirect()->to(base_url('glassware/certificates'))->with('status', 'Data Deleted Successfully!');
    }

    public function addImage($worksheetID = null){
        $mainModel = new ImageModel();
        $worksheetModel = new GlasswareModel();
        
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

    public function addNewWorksheetData(){
        $mainModel = new GlasswareModel();
        $data = [
                'certificateNumber' => $this->request->getPost('calibrationCertificate'),
                'selectedBalance' => $this->request->getPost('selectedBalance'),
                'selectedBarometer' => $this->request->getPost('selectedBarometer'),
                'selectedThermometer' => $this->request->getPost('selectedThermometer'),
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
        $mainModel = new GlasswareModel();
        $data = [
                'certificateNumber' => $this->request->getPost('calibrationCertificate'),
                'selectedBalance' => $this->request->getPost('selectedBalance'),
                'selectedBarometer' => $this->request->getPost('selectedBarometer'),
                'selectedThermometer' => $this->request->getPost('selectedThermometer'),
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
    function htmlToPDF($id){
        $rml = new GlasswareModel();
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
        $dompdf->loadHtml(view('Glassware/glasswareCertificate', $data), 'UTF-8');
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

        $rml = new GlasswareModel();
        $standardBarometerDetails = new BarometerStandardModel();
        $standardBalanceDetails = new BalanceStandardModel();
        $standardThermometerDetails = new ThermoStandard();
        $placeholders = new PlaceholderModel();
        $options = new Options();
        $cmc = new CMCmodel();
        
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        
        $data['dataFromDB'] = $rml->where('id', $id)->first();
        if($incomplete = $this->incompleteWorksheetResponse($data['dataFromDB'])){
            return $incomplete;
        }
        $data['placeholders'] = $placeholders->findAll();
        $data['datePrev'] = $this->request->getPost('datePrev');

        $data['standardBarometerDetails'] = $standardBarometerDetails->where('status', 'active')->findAll();
        $data['standardBalanceDetails'] = $standardBalanceDetails->where('status', 'active')->findAll();
        $data['standardThermometerDetails'] = $standardThermometerDetails->where('status', 'active')->findAll();
        $data['cmc_array'] = $cmc->where('modulenumber', '9')->findAll();
        // The certificate compares uncertainties against the lab's CMC; without it the reported uncertainty would be wrong
        if(empty($data['cmc_array'])){
            return $this->response->setStatusCode(422)
                ->setBody('No CMC is configured for Glassware yet. Set it up with the CMC editor on the Glassware worksheet, then generate the certificate again.');
        }

        $certificateLabel = $this->request->getPost('certificateLabel');
        $customPaper = array(0, 0, 595.28, 841.89); 
        $data = \App\Libraries\CertificateQr::attach($data, 'glassware', 'dataFromDB');
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('Glassware/glasswareCertificate', $data), 'UTF-8');
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        if($PDFState == '0'){
            $dompdf->stream($certificateLabel.".pdf",array("Attachment" => 0));
        }
        if($PDFState == '1'){
            $dompdf->stream($certificateLabel.".pdf",array("Attachment" => 1));
        }   
    }
}
