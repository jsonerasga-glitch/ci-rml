<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\UserGuestModel;
use App\Models\CustomersModel;
use App\Models\VerifierModel;
use App\Models\PersonnelModel;
use App\Models\Defaults;
use App\Models\ElectModel_image;
use App\Models\PlaceholderModel;
use App\Models\DigitalTimerModel; 
use Dompdf\Options; 
use App\Models\CMCmodel;

use App\Models\DigitalTimerStandardModel; 



class DigitalTimerController extends BaseController
{          
        public function worksheet($id = null, $verify = null){
                $data = [];
                $VerifierModel = new VerifierModel();
                $PersonnelModel = new PersonnelModel();
                $StandardModel = new DigitalTimerStandardModel();
                $customerModel = new CustomersModel();
                $placeholderModel = new PlaceholderModel();
                $data['id'] = $id;
                $data['verifier'] = $VerifierModel->findAll();
                $data['personnel'] = $PersonnelModel->findAll();
                // $data['standardData'] = $StandardModel->findAll();
                $data['standardData'] = $StandardModel->where('status', 'active')->findAll();
                
                $data['customers'] = $customerModel->findAll();
                $data['placeholders'] = $placeholderModel->findAll();
                return view('DigitalTimer/digitalTimerWorksheet', $data);        
        }

        public function get_data_by_id(){
                $model = new DigitalTimerModel();
                $idOfCertificate = $this->request->getPost('idOfCertificate');
                $results['worksheetData'] = $model->where('id', $idOfCertificate)->first();
                return $this->response->setJSON($results);
        }

        public function certificateTable(){
                $data = [];
                $VerifierModel = new VerifierModel();
                $PersonnelModel = new PersonnelModel();
                $moduleModel = new DigitalTimerModel();
                $data['verifier'] = $VerifierModel->findAll();
                $data['personnel'] = $PersonnelModel->findAll();
                $data['tableData'] = $moduleModel->findAll();
                return view('DigitalTimer/digitalTimerTable', $data);
        }  
        public function certificateNumberChecker(){
                $rml = new DigitalTimerModel();
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

        public function get_standard_value_by_serial(){
                $detailModel = new DigitalTimerModel();
                $valueModel = new DigitalStandardModel();
                $serialNumber = $this->request->getPost('serialNumber');
                $results['details'] = $detailModel->where('serialNumber', $serialNumber)->findAll();
                $results['values'] = $valueModel->where('serialNumber', $serialNumber)->findAll();
        return $this->response->setJSON($results);
        }

        public function addNewWorksheetData(){
                $mainModel = new DigitalTimerModel();
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

        public function addImage($worksheetID = null){
                $mainModel = new ImageModel();
                $worksheetModel = new DigitalTimerModel();
                
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

        public function updateWorksheetData(){
                $mainModel = new DigitalTimerModel();
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

        public function verifyCorrection(){
                $mainModel = new DigigtalTimerModel();
                $data = [
                        'comments' => $this->request->getPost('comments'),
                        'completion' => $this->request->getPost('completion'),
                ];        
                $id = $this->request->getPost('idOfCertificate');
                $mainModel->update($id,$data);
                return json_encode(['id' => $id]);
        }

        public function worksheetPrint($id, $verify = null){
                $rml = new DigitalTimerModel();
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
                return view('DigitalTimer/digitalTimerPrintView',  $data);
        }

        public function updatePlaceholder(){
                $rml = new DigitalTimerModel();
                $data = [
                'settingCalibrationProcedureAndTraceability' => $this->request->getPost('settingCalibrationProcedureAndTraceability'),
                'settingUncertaintyOfMeasurement' => $this->request->getPost('settingUncertaintyOfMeasurement'),
                'settingCalibrationResults' => $this->request->getPost('settingCalibrationResults'),
                'settingRemarks' => $this->request->getPost('settingRemarks'),    
                'settingOffsetInfo' => $this->request->getPost('settingOffsetInfo'),          
                ];        
                $idOfCert = $this->request->getPost('idOfCertificate');
                $rml->update($idOfCert,$data);
                return redirect()->to(base_url('digitalTimer/worksheet/'.$idOfCert))->with('status', 'Data Updated Successfully!');
        }

        public function deleteWorksheet($id){
                $model = new DigitalTimerModel;
                $model->where('id', $id)->delete(); 
                return redirect()->to(base_url('digitalTimer/certificates'))->with('status', 'Data Deleted Successfully!');
        }

        public function deleteStandard(){
                $modelDetails = new DigitalTimerModel();
                $modelValues = new DigitalStandardModel();

                $id = $this->request->getPost('deleteId');
                $serialNumber = $this->request->getPost('deleteSerialNumber');
                
                $deleteingDetailsFromDatabase = $modelDetails->where('id', $id)->delete(); 
                $deleteingValuesFromDatabase = $modelValues->where('serialNumber', $serialNumber)->delete(); 

                $responseArray = [];

                if($deleteingDetailsFromDatabase){
                        $response = [
                        'status details' => 'success',
                        'message details' => 'details deleted',
                        ];
                        array_push($responseArray, $response);
                }else{
                        $response = [
                        'status details' => 'Failed',
                        'message details' => 'detail delete failed',
                        ];
                        array_push($responseArray, $response);
                }
                if($deleteingValuesFromDatabase){
                        $response = [
                        'status value' => 'success',
                        'message value' => 'value deleted',
                        ];
                        array_push($responseArray, $response);
                }else{
                        $response = [
                        'status value' => 'Failed',
                        'message value' => 'value delete failed',
                        ];
                        array_push($responseArray, $response);
                }

                if(count($responseArray)){
                        return $this->response->setJSON($responseArray);
                }else{
                        return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
                }
                
        }

        function htmlToPDF($id){
                $rml = new DigitalTimerModel();
                $placeholders = new PlaceholderModel();
                $options = new Options();
                $html = $_POST['chart_input'];
                $options->set('isJavascriptEnabled', TRUE); 
                $options->set('isHtml5ParserEnabled', TRUE);     
                $data["img"] = ["image"=>$html];
                $data['dataFromDB'] = $rml->where('id', $id)->first();
                $data['placeholders'] = $placeholders->findAll();
                $data['datePrev'] = $this->request->getPost('datePrev');
                $data['imageDraft'] = $this->request->getPost('imageDraft');
                $PDFState = $this->request->getPost('typeOfPrint');
                $certNumberPrev = $this->request->getPost('certNumberPrev');
                $customPaper = array(0, 0, 595.28, 841.89); 
                $dompdf = new \Dompdf\Dompdf($options); 
                $dompdf->loadHtml(view('DigitalTimer/digitalTimerCertificate', $data), 'UTF-8');
                $dompdf->setPaper('a4', 'portrait');
                $dompdf->render();
                if($PDFState == 'preview' || $PDFState == 'fullPreview'){
                $dompdf->stream('Certificate No.'.$certNumberPrev.".pdf",array("Attachment" => 0));
                }
                if($PDFState == 'download'){
                $dompdf->stream('Certificate No.'.$certNumberPrev.".pdf",array("Attachment" => 1));
                }
                $dompdf->stream('Certificate No.'.$id.".pdf",array("Attachment" => 1));
        }

        function generateReport(){
                $id = $this->request->getPost('certificateId');
                $draft = $this->request->getPost('certificateDraft');
                $download = $this->request->getPost('certificateDownload');
                $html = $_POST['chart_input'];
                $data["img"] = ["image"=>$html];
                $data['imageDraft'] = $draft;
                $PDFState = $download;

                $rml = new DigitalTimerModel();
                $placeholders = new PlaceholderModel();
                $options = new Options();
                $cmc = new CMCmodel();

                $options->set('isJavascriptEnabled', TRUE); 
                $options->set('isHtml5ParserEnabled', TRUE);     
                
                $data['dataFromDB'] = $rml->where('id', $id)->first();
                $data['placeholders'] = $placeholders->findAll();
                $data['datePrev'] = $this->request->getPost('datePrev');
                $data['cmc_data'] = $cmc->where('modulenumber', '6')->findAll();

                $certificateLabel = $this->request->getPost('certificateLabel');
                $customPaper = array(0, 0, 595.28, 841.89); 
                $data = \App\Libraries\CertificateQr::attach($data, 'digitalTimer', 'dataFromDB');
                $dompdf = new \Dompdf\Dompdf($options); 
                $dompdf->loadHtml(view('DigitalTImer/digitalTimerCertificate', $data), 'UTF-8');
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








