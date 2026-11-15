<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CustomersModel;
use App\Models\VerifierModel;
use App\Models\PersonnelModel;
use App\Models\Defaults;
use App\Models\ElectModel_image;
use App\Models\ImageModel;
use Dompdf\Options; 
use App\Models\PlaceholderModel;

use App\Models\PressureGaugeModel;
use App\Models\PressureGaugeStandardModel;
use App\Models\PressureGaugeStandardValueModel;

class PressureGaugeController extends BaseController{
        public function worksheet($id = null, $verify = null){
                $data = [];
                $VerifierModel = new VerifierModel();
                $PersonnelModel = new PersonnelModel();
                $StandardModel = new PressureGaugeStandardModel();
                $data['id'] = $id;
                $data['verifier'] = $VerifierModel->findAll();
                $data['personnel'] = $PersonnelModel->findAll();
                $data['standardData'] = $StandardModel->where('status', 'active')->findAll();
                
                return view('PressureGauge/pressureGaugeWorksheet', $data);        
	}

        public function get_data_by_id(){
                $model = new PressureGaugeModel();
                $userModel = new UserModel();
                //  //DELETE AFTER FIX
                //  if(session()->get('role') == 'user' || session()->get('role') == "'user'"){
                //         $userModel = new UserGuestModel();
                // }else{
                //         $userModel = new UserModel();
                // }

                $idOfCertificate = $this->request->getPost('idOfCertificate');
		$results['worksheetData'] = $model->where('id', $idOfCertificate)->first();
                $results['userData'] = $userModel->where('id', session()->get('id'))->first(); 
		return $this->response->setJSON($results);
        }

        public function get_customer_data(){
                $customerModel = new CustomersModel();
                $results['customers'] = $customerModel->findAll();
                return $this->response->setJSON($results);
            }

        public function certificateNumberChecker(){
                $rml = new PressureGaugeModel();
                $certNumToCheck = $this->request->getPost('certificateNumberToCheck');
                $isValid = 'false';
                $elect_table_1 = $rml->where('certificateNumber', $certNumToCheck)->first(); 
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
                $moduleModel = new PressureGaugeModel();
                $data['verifier'] = $VerifierModel->findAll();
                $data['personnel'] = $PersonnelModel->findAll();
                $data['tableData'] = $moduleModel->findAll();
                return view('PressureGauge/pressureGaugeTable', $data);
        }
 
        public function standardTable(){
                $data = [];
                $VerifierModel = new VerifierModel();
                $PersonnelModel = new PersonnelModel();
                $StandardModel = new PressureGaugeStandardModel();
                $data['verifier'] = $VerifierModel->findAll();
                $data['personnel'] = $PersonnelModel->findAll();
                $data['standardData'] = $StandardModel->where('status', 'active')->findAll();
                return view('PressureGauge/pressureGaugeStandardTable', $data);        
	}

        public function addNewStandardDetails(){
                $models = new PressureGaugeStandardModel();
                $data = [
                    'standardDescription' => $this->request->getPost('standardDescription'),
                    'serialNumber' => $this->request->getPost('serialNumber'),
                    'model' => $this->request->getPost('model'),
                    'calibrationCertificate' => $this->request->getPost('calibrationCertificate'),
                    'laboratory' => $this->request->getPost('laboratory'),
                    'unit_Original' => $this->request->getPost('unit_Original'),    
                    'unit_Converted' => $this->request->getPost('unit_Converted'),   
                    'dateOfCalibration' => $this->request->getPost('dateOfCalibration'),             
                ];        
                $models->insert($data);
                return redirect()->to(base_url('pressureGauge/standardTable'))->with('status', 'Standard Added Successfully!');
        }     
        
        public function deleteData($certificateNumber){
            $rml = new PressureGaugeModel();
            $rml->where('id', $certificateNumber)->delete(); 
            return redirect()->to( base_url('pressureGauge/certificates'))->with('status', 'Data Deleted Successfully!');
        }

        public function removeStandard(){
                $model = new PressureGaugeStandardModel;
                $modelValues = new PressureGaugeStandardValueModel;
                $id = $this->request->getPost('id');
                $serialNumber = $this->request->getPost('serialNumber');
                $data = [
                        'status' => "inactive",
                ];
                $model->where('id', $id)->set($data)->update();
                $modelValues->where('serialNumber', $serialNumber)->set($data)->update();
        }
        public function removeStandardValue(){
                $modelValues = new PressureGaugeStandardValueModel;
                $id = $this->request->getPost('id');
                $data = [
                        'status' => "inactive",
                ];
                $modelValues->where('id', $id)->set($data)->update();
        }
        
        public function get_standard_value_by_serial(){
                $valueModel = new PressureGaugeStandardValueModel();
                $detailModel = new PressureGaugeStandardModel();
                $serialNumber = $this->request->getPost('serialNumber');
		$results['standardDetails'] = $detailModel->where('status', 'active')->where('serialNumber', $serialNumber)->findAll();
                $results['standardValue'] = $valueModel->where('status', 'active')->where('serialNumber', $serialNumber)->findAll();
		return $this->response->setJSON($results);
        }

        public function addNewStandardValues(){
                $models = new PressureGaugeStandardValueModel();
                $data = [
                    'serialNumber' => $this->request->getPost('newValueSerialNumber'),
                    'applied' => $this->request->getPost('newValuesApplied'),
                    'increasing' => $this->request->getPost('newValuesIncreasing'),
                    'decreasing' => $this->request->getPost('newValuesDecreasing'),
                    'mean' => $this->request->getPost('newValuesMean'),
                    'deviation' => $this->request->getPost('newValuesDeviation'),
                    'uncertainty' => $this->request->getPost('newValuesUncertainty'),
                    'correction' => $this->request->getPost('newValuesCorrection'),
                ];        
                $models->insert($data);
        }
        public function updateStandardValues(){
                $models = new PressureGaugeStandardValueModel();
                $data = [
                    'applied' => $this->request->getPost('editValuesApplied'),
                    'increasing' => $this->request->getPost('editValuesIncreasing'),
                    'decreasing' => $this->request->getPost('editValuesDecreasing'),
                    'mean' => $this->request->getPost('editValuesMean'),
                    'deviation' => $this->request->getPost('editValuesDeviation'),
                    'uncertainty' => $this->request->getPost('editValuesUncertainty'),
                    'correction' => $this->request->getPost('editValuesCorrection'),
                ];        
                $id = $this->request->getPost('editID');
                $models->update($id,$data);
        }
        public function updateStandardDetails(){
                $models = new PressureGaugeStandardModel();
                $modelValues = new PressureGaugeStandardValueModel;
                $data = [
                    'standardDescription' => $this->request->getPost('detailsDescription'),
                    'model' => $this->request->getPost('detailsModel'),
                    'serialNumber' => $this->request->getPost('detailsSerialNumber'),
                    'unit_Original' => $this->request->getPost('detailsUnitOriginal'),
                    'unit_Converted' => $this->request->getPost('detailsUnitConverted'),
                    'calibrationCertificate' => $this->request->getPost('detailsCalibrationCertificate'),
                    'laboratory' => $this->request->getPost('detailsLaboratory'),
                    'coverageFactor' => $this->request->getPost('detailsCoverageFactor'),
                    'dateOfCalibration' => $this->request->getPost('detailsDateOfCalibration'),          
                ];        
                $id = $this->request->getPost('detailsID');
                $models->update($id,$data);
                
                $serialNumber = $this->request->getPost('detailsOldSerialNumber');
                $valueData = [
                        'serialNumber' => $this->request->getPost('detailsSerialNumber'),
                ];
                $modelValues->where('serialNumber', $serialNumber)->set($valueData)->update();
        }


        public function addNewWorksheetData(){
                $mainModel = new PressureGaugeModel();
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
                $mainModel = new PressureGaugeModel();
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

        public function worksheetPrint($id, $verify = null){
                $rml = new PressureGaugeModel();
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
                return view('PressureGauge/pressureGaugePrintView',  $data);
        }

        public function updatePlaceholder(){
                $rml = new PressureGaugeModel();
                $data = [
                    'settingCalibrationProcedureAndTraceability' => $this->request->getPost('settingCalibrationProcedureAndTraceability'),
                    'settingUncertaintyOfMeasurement' => $this->request->getPost('settingUncertaintyOfMeasurement'),
                    'settingCalibrationResults' => $this->request->getPost('settingCalibrationResults'),
                    'settingMeasurementCondition' => $this->request->getPost('settingMeasurementCondition'),
                    'settingRemarks' => $this->request->getPost('settingRemarks'),            
                ];        
                $idOfCert = $this->request->getPost('idHere');
                $rml->update($idOfCert,$data);
                return redirect()->to(base_url('pressureGauge/worksheet/'.$idOfCert))->with('status', 'Data Updated Successfully!');
        }

        public function verifyCorrection(){
                $mainModel = new PressureGaugeModel();
                $data = [
                        'comments' => $this->request->getPost('comments'),
                        'completion' => $this->request->getPost('completion'),
                ];        
                $id = $this->request->getPost('idOfCertificate');
                $mainModel->update($id,$data);
                return json_encode(['id' => $id]);
            }

        function htmlToPDF($id){
                $rml = new PressureGaugeModel();
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
                $obLevel = ob_get_level();
                try{
                    $html = view('PressureGauge/pressureGaugeCertificate', $data);
                }catch(\RangeException $e){
                    // drop the partially rendered certificate left in the view's output buffer
                    while(ob_get_level() > $obLevel){
                        ob_end_clean();
                    }
                    return $this->response->setStatusCode(422)->setBody($e->getMessage());
                }
                $dompdf->loadHtml($html, 'UTF-8');
                $dompdf->setPaper('a4', 'portrait');
                $dompdf->render();
                if($PDFState == 'preview' || $PDFState == 'fullPreview'){
                    $dompdf->stream('Certificate No.'.$certNumberPrev.".pdf",array("Attachment" => 0));
                }
                if($PDFState == 'download'){
                    $dompdf->stream('Certificate No.'.$certNumberPrev.".pdf",array("Attachment" => 1));
                }
        }
        
        public function addImage($worksheetID = null){
                $mainModel = new ImageModel();
                $worksheetModel = new PressureGaugeModel();
                
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
        
        function generateReport(){
                $id = $this->request->getPost('certificateId');
                $draft = $this->request->getPost('certificateDraft');
                $download = $this->request->getPost('certificateDownload');
                $data['imageDraft'] = $draft;
                $PDFState = $download;

                $rml = new PressureGaugeModel();
                $placeholders = new PlaceholderModel();
                $options = new Options();
                $StandardModel = new PressureGaugeStandardModel();
                $StandardValueModel = new PressureGaugeStandardValueModel();
                
                
                $options->set('isJavascriptEnabled', TRUE); 
                $options->set('isHtml5ParserEnabled', TRUE);     
                
                $data['dataFromDB'] = $rml->where('id', $id)->first();
                $data['placeholders'] = $placeholders->findAll();
                $data['datePrev'] = $this->request->getPost('datePrev');
                $data['standardDetails'] = $StandardModel->where('status', 'active')->findAll();     
                $data['standardValues'] = $StandardValueModel->where('status', 'active')->findAll();         

                $certificateLabel = $this->request->getPost('certificateLabel');
                $customPaper = array(0, 0, 595.28, 841.89); 
                $dompdf = new \Dompdf\Dompdf($options);
                $obLevel = ob_get_level();
                try{
                    $html = view('PressureGauge/pressureGaugeCertificate', $data);
                }catch(\RangeException $e){
                    // drop the partially rendered certificate left in the view's output buffer
                    while(ob_get_level() > $obLevel){
                        ob_end_clean();
                    }
                    return $this->response->setStatusCode(422)->setBody($e->getMessage());
                }
                $dompdf->loadHtml($html, 'UTF-8');
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
