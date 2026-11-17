<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CustomersModel;
use App\Models\VerifierModel;
use App\Models\PersonnelModel;
use App\Models\Defaults;
use App\Models\ElectModel_image;
use App\Models\ImageModel;
use App\Models\PlaceholderModel;
use App\Models\CMCmodel;

use Dompdf\Options; 
use App\Models\Thermo_HygrometerModel;
use App\Models\ThermoModel;
use App\Models\ThermoStandard;
use App\Models\ThermoStandardAddTestPointsModel;
use App\Models\ThermoChamberModel;
use App\Models\ThermoStandardAddDriftModel;
use App\Models\ThermoStandardAddDriftPRTModel;

use App\Models\ChamberStandardModel;

class Thermo_HygrometerController extends BaseController{
    public function worksheet($id = null, $verify = null){
            $data = [];
            $VerifierModel = new VerifierModel();
            $PersonnelModel = new PersonnelModel();
            $customerModel = new CustomersModel();
            $StandardModel = new ThermoStandard();
            $ChamberModel = new ChamberStandardModel();
            $StandardValuesModel = new ThermoStandardAddTestPointsModel();
            $driftModel = new ThermoStandardAddDriftModel();
            $prtDriftModel = new ThermoStandardAddDriftPRTModel();

            $data['id'] = $id;
            $data['verifier'] = $VerifierModel->findAll();
            $data['personnel'] = $PersonnelModel->findAll();
            $data['customers'] = $customerModel->findAll();
            $data['standardData'] = $StandardModel->findAll();
            $data['standardValues'] = $StandardValuesModel->findAll();
            $data['chamberStandard'] = $ChamberModel->where('status', 'active')->findAll();
            $data['driftValues'] = $driftModel->findAll();
            $data['prtDriftValues'] = $prtDriftModel->findAll();

            return view('Thermo_Hygrometer/thermoHygrometerWorksheet', $data);        
    }

    public function get_data_by_id(){
            $model = new ThermoModel();
            $userModel = new UserModel();
            $idOfCertificate = $this->request->getPost('idOfCertificate');
            $results['worksheetData'] = $model->where('id', $idOfCertificate)->first();
            $results['userData'] = $userModel->where('id', session()->get('id'))->first(); 
            return $this->response->setJSON($results);
    }

    public function get_data_for_previous_table(){
        $model = new ThermoModel();
        $results['previousData'] = $model->select('id, certificateNumber')->findAll();
        return $this->response->setJSON($results);
    }

    public function certificateNumberChecker(){
        $rml = new ThermoModel();
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
            $moduleModel = new ThermoModel();
            $data['verifier'] = $VerifierModel->findAll();
            $data['personnel'] = $PersonnelModel->findAll();
            $data['tableData'] = $moduleModel->findAll();
            return view('Thermo_Hygrometer/thermoHygrometerTable', $data);
    }  
    
    public function get_standard_value_by_serial(){
        $detailModel = new ThermoStandard();
        $valueModel = new ThermoStandardAddTestPointsModel();
        // $serialNumber = $this->request->getPost('serialNumber');
	// $results['details'] = $detailModel->whereIn('serialNumber', $serialNumber)->findAll();
        // $results['values'] = $valueModel->whereIn('serialNumber', $serialNumber)->findAll();
        $serialNumber = $this->request->getPost('serialNumber');
	$results['details'] = $detailModel->whereIn('id', $serialNumber)->findAll();
        $results['values'] = $valueModel->whereIn('standardID', $serialNumber)->findAll();
	return $this->response->setJSON($results);
    }

    public function addNewWorksheetData(){
            $mainModel = new ThermoModel();
            $data = [
                'certificateNumber' => $this->request->getPost('calibrationCertificate'),
                'standard' => $this->request->getPost('standard'),
                'chamber' => $this->request->getPost('chamber'),
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

                'standardAndAccessories' => $this->request->getPost('standardAndAccessories'),
                'selectedChamber' => $this->request->getPost('selectedChamber'),
                
                
            ];        
            $mainModel->insert($data);
            $worksheetID = $mainModel->insertID();
            return json_encode(['id' => $worksheetID]);;
    }

    public function updateWorksheetData(){
            $mainModel = new ThermoModel();
            $data = [
                'certificateNumber' => $this->request->getPost('calibrationCertificate'),
                'standard' => $this->request->getPost('standard'),
                'chamber' => $this->request->getPost('chamber'),
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

                'standardAndAccessories' => $this->request->getPost('standardAndAccessories'),
                'selectedChamber' => $this->request->getPost('selectedChamber'),
            ];        
            $id = $this->request->getPost('idOfCertificate');
            $mainModel->update($id,$data);
            return json_encode(['id' => $id]);
    }


        public function deleteWorksheet($id){
                $model = new ThermoModel;
                $model->where('id', $id)->delete(); 
                return redirect()->to(base_url('thermohygrometer/certificates'))->with('status', 'Data Deleted Successfully!');
        }

    public function verifyCorrection(){
        $mainModel = new ThermoModel();
        $data = [
                'comments' => $this->request->getPost('comments'),
                'completion' => $this->request->getPost('completion'),
        ];        
        $id = $this->request->getPost('idOfCertificate');
        $mainModel->update($id,$data);
        return json_encode(['id' => $id]);
    }

    public function worksheetPrint($id, $verify = null){
            $rml = new ThermoModel();
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
            return view('Thermo_Hygrometer/thermoHygrometerPrintView',  $data);
    }

    public function updatePlaceholder(){
            $rml = new PressureGaugeModel();
            $data = [
                'settingCalibrationProcedureAndTraceability' => $this->request->getPost('settingCalibrationProcedureAndTraceability'),
                'settingUncertaintyOfMeasurement' => $this->request->getPost('settingUncertaintyOfMeasurement'),
                'settingCalibrationResults' => $this->request->getPost('settingCalibrationResults'),
                'settingMeasurementCondition' => $this->request->getPost('settingMeasurementCondition'),
                'settingRemarks' => $this->request->getPost('remarkHere'),            
            ];        
            $idOfCert = $this->request->getPost('idHere');
            $rml->update($idOfCert,$data);
            return redirect()->to(base_url('pressureGauge/print/'.$idOfCert))->with('status', 'Data Updated Successfully!');
    }

    public function addImage($worksheetID = null){
        $mainModel = new ImageModel();
        $worksheetModel = new ThermoModel();
        
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

    function htmlToPDF($id){
            $rml = new ThermoModel();
            $placeholders = new PlaceholderModel();
            $options = new Options();
            $options->set('isJavascriptEnabled', TRUE); 
            $options->set('isHtml5ParserEnabled', TRUE);     
            $data['thermoData'] = $rml->where('id', $id)->first();
            $data['placeholders'] = $placeholders->findAll();
            $data['datePrev'] = $this->request->getPost('datePrev');
            $data['imageDraft'] = $this->request->getPost('imageDraft');
            $PDFState = $this->request->getPost('typeOfPrint');
            $certNumberPrev = $this->request->getPost('certNumberPrev');
            $customPaper = array(0, 0, 595.28, 841.89); 
            $dompdf = new \Dompdf\Dompdf($options); 
            $dompdf->loadHtml(view('Thermohygrometer/CalibrationCertificateThermo', $data), 'UTF-8');
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
        $data['imageDraft'] = $draft;
        $PDFState = $download;
    
        $rml = new ThermoModel();
        $placeholders = new PlaceholderModel();
        $standardDetails = new ThermoStandard();
        $options = new Options();
        $cmc = new CMCmodel();
        
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        
        $data['thermoData'] = $rml->where('id', $id)->first();
        $data['placeholders'] = $placeholders->findAll();
        $data['datePrev'] = $this->request->getPost('datePrev');
        $data['standardDetails'] = $standardDetails->where('status', 'active')->findAll();
        $data['cmc'] = $cmc->where('modulenumber', '2')->findAll();
    
        $certificateLabel = $this->request->getPost('certificateLabel');
        $customPaper = array(0, 0, 595.28, 841.89); 
        $data = \App\Libraries\CertificateQr::attach($data, 'thermohygrometer', 'thermoData');
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('Thermohygrometer/CalibrationCertificateThermo', $data), 'UTF-8');
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
