<?php namespace App\Controllers;

use App\Models\ThermoModel;
use App\Models\ThermoStandard;
use App\Models\ElectModel_image;
use App\Models\ThermoStandardAddTestPointsModel;
use App\Models\ThermoStandardAddDriftModel;
use App\Models\ThermoStandardAddDriftPRTModel;
use App\Models\ThermoChamberModel;
use App\Models\UserModel;
use App\Models\VerifierModel;
use App\Models\PersonnelModel;
use Dompdf\Options; 

class UserGuestThermoController extends BaseController
{
    public function __construct(){
		helper(['url', 'form']);
        if (session()->get('role') != "user") {
            echo 'Access denied!';
            exit;
        } 
	}
    public function addView(){
        $data = [];
        $VerifierModel = new VerifierModel();
        $PersonnelModel = new PersonnelModel();
        $data['verifier'] = $VerifierModel->findAll();
        $data['personnel'] = $PersonnelModel->findAll();

        $ThermoModel = new ThermoModel();
        $data['ThermoData'] = $ThermoModel->select('id')->select('certificateNumber')->orderBy('id', 'DESC')->findAll();
        return view('GuestUser/Thermo/thermoAdd',$data);
    }

    public function thermoTable(){
        $thermo = new ThermoModel();
        $data['thermoData'] = $thermo->findAll();
        $model = new UserModel();
        $data['user'] = $model->where('id', session()->get('id'))->first();
        $data['thermoData'] = $thermo->where('calibratorAccountID',session()->get('id'))->findAll();


        // if($this->request->getGet('q')){
		// 	$q=$this->request->getGet('q');
		// 	$data['thermoData'] = $thermo->where('certificateNumber', $q)->orWhere('customer', $q)->findAll();
		// }else{
		// 	$data['thermoData'] = $thermo->findAll();
		// }
        return view('GuestUser/Thermo/thermoGuestTable',  $data);
    }

    public function thermoEdit($id, $verify = null){
        $rml = new ThermoModel();
        $data['thermoData'] = $rml->where('id', $id)->first(); 
        $data['forVerification'] = $verify;
        if($verify == 'forVerification'){
            $dataToUpdate = [
                'completion' => 'On-going verification'
            ]; 
            $rml->update($id,$dataToUpdate);
        }
        return view('GuestUser/Thermo/thermoViewPrint', $data);
    }

    public function thermoUpdate($id, $verify = null){
        $VerifierModel = new VerifierModel();
        $PersonnelModel = new PersonnelModel();
        $data['verifier'] = $VerifierModel->findAll();
        $data['personnel'] = $PersonnelModel->findAll();
        $rml = new ThermoModel();
        $data['thermoData'] = $rml->where('id', $id)->first(); 
        $data['forVerification'] = $verify;
        $model = new UserModel();
        $data['user'] = $model->where('id', session()->get('id'))->first();
        return view('GuestUser/Thermo/ThermoInputEdit', $data);
    }

    public function thermoDelete($certificateNumber){
        $rml = new ThermoModel();
        // $imageTable = new ElectModel_image();
        $rml->where('id', $certificateNumber)->delete(); 
        // $imageTable->where('certificateNumber', $certificateNumber)->delete(); 
        return redirect()->to( base_url('guestThermoTable'))->with('status', 'Data Deleted Successfully!');
    }

    // public function updateVerify(){
    //     $rml = new ThermoModel();
    //     $data = [
    //         'completion' => $this->request->getPost('completion'),
    //     ];        
    //     $idOfCert = $this->request->getPost('idVerify');
    //     $rml->update($idOfCert,$data);
    //     return redirect()->to(base_url('forVerifyTable'))->with('status', 'Data Validated!');
    // }

    // public function updateCorrection(){
    //     $rml = new ThermoModel();
    //     $data = [
    //         'completion' => $this->request->getPost('completion'),
    //     ];        
    //     $idOfCert = $this->request->getPost('idCorrection');
    //     $rml->update($idOfCert,$data);
    //     return redirect()->to(base_url('forVerifyTable'))->with('status', 'Data for Correction!');
    // }

    public function PabLogoUpdate(){
        $rml = new ThermoModel();
        $data = [
            'PabLogo' => $this->request->getPost('pablogoValue'),
        ];
        $ID = $this->request->getPost('id');
        $rml->update($ID,$data);
        return redirect()->to(base_url('guestThermoPreview/'.$ID))->with('status', 'Data Updated Successfully!');
    }

    public function thermoStandardTable(){
        $ThermoStandard = new ThermoStandard();
        $data['thermostandardtable'] = $ThermoStandard->findAll();
        //return view('GuestUser/Thermo/ThermoStandardTable',$data);

        if($this->request->getGet('q')){
			$q=$this->request->getGet('q');
			$data['thermostandardtable'] = $ThermoStandard->where('certificateNumber', $q)->orWhere('serialNumber', $q)->findAll();
		}else{
			$data['thermostandardtable'] = $ThermoStandard->findAll();
		}
        return view('GuestUser/Thermo/ThermoStandardTable',  $data);
    }

    public function thermoStandardEdit($id){
        $ThermoStandard = new ThermoStandard();
        $data['thermostandardtable'] = $ThermoStandard->where('id', $id)->first(); 
        $data["snID"] = ["id"=>$id];
        $model = new UserModel();
        $data['user'] = $model->where('id', session()->get('id'))->first();
        return view('GuestUser/Thermo/ThermoStandardEdit',$data);
    }

    public function thermoStandardAddView(){
        return view('GuestUser/Thermo/ThermoStandardAddNew');
    }

    public function thermoStandardAddViewPRT(){
        return view('GuestUser/Thermo/ThermoStandardAddNewPRT');
    }

    public function thermoStandardEditValues($id){
        $TestPointsModel = new ThermoStandardAddTestPointsModel();
        $data = [
            'serialNumber' => $this->request->getPost('serialNumber'),
            'testPoint' => $this->request->getPost('testPoint'),
            'unit' => $this->request->getPost('unit'),
            'RML' => $this->request->getPost('rml'),
            'NML' => $this->request->getPost('nml'),
            'correction' => $this->request->getPost('correction'),
            'readoutStandardUncertaintyFromCertificate' => $this->request->getPost('readOut'),
            'uncertainty' => $this->request->getPost('uncert'),
            'range' => $this->request->getPost('range'),
            'res' => $this->request->getPost('res'),
        ];   
       
        $snID = $this->request->getPost('snID');
        $ID = $this->request->getPost('selectedID');
        $TestPointsModel->update($ID,$data);
        return redirect()->to(base_url('guestThermoStandardEdit/'.$snID))->with('status', 'Data Updated Successfully!');    
    }
    public function thermoStandardEditDrift($id){
        $driftPRT = new ThermoStandardAddDriftModel();
        $data = [
            'dateCalibrated' => $this->request->getPost('dateCali'),
            'unit' => $this->request->getPost('unit'),
            'testPoint' => $this->request->getPost('testpoint'),
            'testPointValue' => $this->request->getPost('value'),
        ];   
        $snID = $this->request->getPost('snID');
        $ID = $this->request->getPost('selectedID');
        $driftPRT->update($ID,$data);
        return redirect()->to(base_url('guestThermoStandardEdit/'.$snID))->with('status', 'Data Updated Successfully!');    
    }
    public function thermoStandardEditDriftPRT($id){
        $driftPRT = new ThermoStandardAddDriftPRTModel();
        $data = [
            'serialNumber' => $this->request->getPost('serialNumber'),
            'testPoint' => $this->request->getPost('testPoint'),
            'previousTest' => $this->request->getPost('previousTest'),
            'currentTest' => $this->request->getPost('currentTest'),
            'drift' => $this->request->getPost('drift'),
        ];   
        $snID = $this->request->getPost('snID');
        $ID = $this->request->getPost('selectedID');
        $driftPRT->update($ID,$data);
        return redirect()->to(base_url('guestThermoStandardEdit/'.$snID))->with('status', 'Data Updated Successfully!');    
    }
    public function thermoStandardAddData(){
        $models = new ThermoStandard();
        $data = [
            'standard' => $this->request->getPost('standard'),
            'manufacturer' => $this->request->getPost('manufacturer'),
            'modelNumber' => $this->request->getPost('modelNumber'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'dateOfCali' => $this->request->getPost('dateOfCali'),
            'dateOfNextCali' => $this->request->getPost('dateOfNextCali'),
            'standardUsed' => $this->request->getPost('standardUsed'),
            'stdResolutionTemp' => $this->request->getPost('stdResolutionTemp'),
            'stdResolutionRH' => $this->request->getPost('stdResolutionRH'),
            'issuingLab' => $this->request->getPost('issuingLab'),
        ];    
        $models->insert($data);
        return redirect()->to(base_url('guestThermoTable'))->with('status', 'Data Added Successfully!');
    }
    public function thermoStandardAddTestPoint(){
        $models = new ThermoStandardAddTestPointsModel();
        $data = [
            'serialNumber' => $this->request->getPost('serialNumber'),
            'testPoint' => $this->request->getPost('testPoint'),
            'unit' => $this->request->getPost('unit'),
            'RML' => $this->request->getPost('RML'),
            'NML' => $this->request->getPost('NML'),
            'correction' => $this->request->getPost('correction'),
            'readoutStandardUncertaintyFromCertificate' => $this->request->getPost('readoutStandardUncertaintyFromCertificate'),
            'uncertainty' => $this->request->getPost('uncertainty'),
            'range' => $this->request->getPost('range'),
            'res' => $this->request->getPost('res'),
        ];   
        $models->insert($data);
        $table2Id = $this->request->getPost('idTable');
        return redirect()->to(base_url('guestThermoStandardEdit/'.$table2Id));
    }
    public function thermoStandardAddDrift(){
        $models = new ThermoStandardAddDriftModel();
        $data = [
            'serialNumber' => $this->request->getPost('serialNumber'),
            'unit' => $this->request->getPost('unit'),
            'dateCalibrated' => $this->request->getPost('dateCalibrated'),
            'testPoint' => $this->request->getPost('testPoint'),
            'testPointValue' => $this->request->getPost('testPointValue'),
        ];   
        $models->insert($data);
        $table2Id = $this->request->getPost('idTable2');
        return redirect()->to(base_url('guestThermoStandardEdit/'.$table2Id));
    }
    public function thermoStandardAddDriftPRT(){
        $models = new ThermoStandardAddDriftPRTModel();
        $data = [
            'serialNumber' => $this->request->getPost('serialNumber'),
            'testPoint' => $this->request->getPost('testPoint'),
            'previousTest' => $this->request->getPost('previousTest'),
            'currentTest' => $this->request->getPost('currentTest'),
            'drift' => $this->request->getPost('drift'),
        ];   
        $models->insert($data);
        $table2Id = $this->request->getPost('idTable2');
        return redirect()->to(base_url('guestThermoStandardEdit/'.$table2Id));
    }
    
    public function thermoAddData(){
        if ($this->request->getMethod() == 'post') {
            //let's do the validation here
            $rules = [
                'certificateNumber' => 'required|min_length[3]|is_unique[thermotable.certificateNumber]',
             
            ];

            if (!$this->validate($rules)) {
                $data = [];
                $model = new ThermoModel();
           //     $data['user'] = $model->where('id', session()->get('id'))->first();
                return view('GuestUser/Thermo/thermoAdd', [
                    "validation" => $this->validator,
                ]);
            } else {
        $model = new ThermoModel();
        $ImageTable = new ElectModel_image();
        $data = [
            'completion' => $this->request->getPost('completion'),
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'customer' => $this->request->getPost('customer'),
            'address' => $this->request->getPost('address'),
            'dateReceived' => $this->request->getPost('dateReceived'),
            'dateCalibrated' => $this->request->getPost('dateCalibrated'),
            'recommendedDueDate' => $this->request->getPost('recommendedDueDate'),
            'placeOfCalibration' => $this->request->getPost('placeOfCalibration'),
            'equipmentDescription' => $this->request->getPost('equipmentDescription'),
            'manufacturer' => $this->request->getPost('manufacturer'),
            'modelNumber' => $this->request->getPost('modelNumber'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'equipmentID' => $this->request->getPost('equipmentID'),
            'typeOfEquipment' => $this->request->getPost('typeOfEquipment'),
            'startTemp' => $this->request->getPost('startTemp'),
            'endTemp' => $this->request->getPost('endTemp'),
            'startRh' => $this->request->getPost('startRh'),
            'endRh' => $this->request->getPost('endRh'),
            'ambTemp' => $this->request->getPost('ambTemp'),
            'ambRh' => $this->request->getPost('ambRh'),
            'weight' => $this->request->getPost('weight'),
            'premA' => $this->request->getPost('premA'),
            'premB' => $this->request->getPost('premB'),
            'premC' => $this->request->getPost('premC'),
            'premD' => $this->request->getPost('premD'), 
            'standardAndAccessories' => $this->request->getPost('standardAndAccessories'),
            'selectedChamber' => $this->request->getPost('selectedChamber'),
            'tableTempIn'=> $this->request->getPost('tableTempIn'),
            'tableTempInRange'=> $this->request->getPost('tableTempInRange'),
            'tableTempInResGrad'=> $this->request->getPost('tableTempInResGrad'),
            'tableTempInReadability'=> $this->request->getPost('tableTempInReadability'),
            'tableTempOut'=> $this->request->getPost('tableTempOut'),
            'tableTempOutRange'=> $this->request->getPost('tableTempOutRange'),
            'tableTempOutResGrad'=> $this->request->getPost('tableTempOutResGrad'),
            'tableTempOutReadability'=> $this->request->getPost('tableTempOutReadability'),
            'tableRH'=> $this->request->getPost('tableRH'),
            'tableRHRange'=> $this->request->getPost('tableRHRange'),
            'tableRHResGrad'=> $this->request->getPost('tableRHResGrad'),
            'tableRHReadability'=> $this->request->getPost('tableRHReadability'),
            'tableRNOut'=> $this->request->getPost('tableRNOut'),
            'tableRNOutRange'=> $this->request->getPost('tableRNOutRange'),
            'tableRNOutResGrad'=> $this->request->getPost('tableRNOutResGrad'),
            'tableRNOutReadability'=> $this->request->getPost('tableRNOutReadability'),
            'remarksA' => $this->request->getPost('remarksA'),
            'remarks' => $this->request->getPost('remarksF'),
            'calibratedBy' => $this->request->getPost('calibratedBy'),
            'encodedBy' => $this->request->getPost('encodedBy'),
            'checkedby' => $this->request->getPost('checkedby'),

            'inputtedArrayTempIn' => $this->request->getPost('inputtedArrayTempIn'),
            'inputtedArrayTempOut' => $this->request->getPost('inputtedArrayTempOut'),
            'inputtedArrayRHIn' => $this->request->getPost('inputtedArrayRHIn'),
            'inputtedArrayRHOunt' => $this->request->getPost('inputtedArrayRHOunt'),

            'calibratorAccountEmail' => $this->request->getPost('calibratorAccountEmail'),
            'calibratorAccountID' => $this->request->getPost('calibratorAccountID'),

            
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
            $ImageTable->save($dataImage);
        }

        $model->insert($data);
        return redirect()->to(base_url('guestThermoTable'))->with('status', 'Data Added Successfully!');
    }}}
    public function thermoUpdateData(){
        $model = new ThermoModel();
        $ImageTable = new ElectModel_image();
        $data = [
            'completion' => $this->request->getPost('completion'),
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'customer' => $this->request->getPost('customer'),
            'address' => $this->request->getPost('address'),
            'dateReceived' => $this->request->getPost('dateReceived'),
            'dateCalibrated' => $this->request->getPost('dateCalibrated'),
            'recommendedDueDate' => $this->request->getPost('recommendedDueDate'),
            'placeOfCalibration' => $this->request->getPost('placeOfCalibration'),
            'equipmentDescription' => $this->request->getPost('equipmentDescription'),
            'manufacturer' => $this->request->getPost('manufacturer'),
            'modelNumber' => $this->request->getPost('modelNumber'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'equipmentID' => $this->request->getPost('equipmentID'),
            'typeOfEquipment' => $this->request->getPost('typeOfEquipment'),
            'startTemp' => $this->request->getPost('startTemp'),
            'endTemp' => $this->request->getPost('endTemp'),
            'startRh' => $this->request->getPost('startRh'),
            'endRh' => $this->request->getPost('endRh'),
            'ambTemp' => $this->request->getPost('ambTemp'),
            'ambRh' => $this->request->getPost('ambRh'),
            'weight' => $this->request->getPost('weight'),
            'premA' => $this->request->getPost('premA'),
            'premB' => $this->request->getPost('premB'),
            'premC' => $this->request->getPost('premC'),
            'premD' => $this->request->getPost('premD'), 
            'standardAndAccessories' => $this->request->getPost('standardAndAccessories'),
            'selectedChamber' => $this->request->getPost('selectedChamber'),
            'tableTempIn'=> $this->request->getPost('tableTempIn'),
            'tableTempInRange'=> $this->request->getPost('tableTempInRange'),
            'tableTempInResGrad'=> $this->request->getPost('tableTempInResGrad'),
            'tableTempInReadability'=> $this->request->getPost('tableTempInReadability'),
            'tableTempOut'=> $this->request->getPost('tableTempOut'),
            'tableTempOutRange'=> $this->request->getPost('tableTempOutRange'),
            'tableTempOutResGrad'=> $this->request->getPost('tableTempOutResGrad'),
            'tableTempOutReadability'=> $this->request->getPost('tableTempOutReadability'),
            'tableRH'=> $this->request->getPost('tableRH'),
            'tableRHRange'=> $this->request->getPost('tableRHRange'),
            'tableRHResGrad'=> $this->request->getPost('tableRHResGrad'),
            'tableRHReadability'=> $this->request->getPost('tableRHReadability'),
            'tableRNOut'=> $this->request->getPost('tableRNOut'),
            'tableRNOutRange'=> $this->request->getPost('tableRNOutRange'),
            'tableRNOutResGrad'=> $this->request->getPost('tableRNOutResGrad'),
            'tableRNOutReadability'=> $this->request->getPost('tableRNOutReadability'),
            'remarksA' => $this->request->getPost('remarksA'),
            'remarks' => $this->request->getPost('remarksF'),
            'calibratedBy' => $this->request->getPost('calibratedBy'),
            'encodedBy' => $this->request->getPost('encodedBy'),
            'checkedby' => $this->request->getPost('checkedby'),

            'inputtedArrayTempIn' => $this->request->getPost('inputtedArrayTempIn'),
            'inputtedArrayTempOut' => $this->request->getPost('inputtedArrayTempOut'),
            'inputtedArrayRHIn' => $this->request->getPost('inputtedArrayRHIn'),
            'inputtedArrayRHOunt' => $this->request->getPost('inputtedArrayRHOunt'),
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
            $ImageTable->replace($dataImage);
        }
    
        $idOfCert = $this->request->getPost('idHere');
        $completion = $this->request->getPost('completion');
        $model->update($idOfCert,$data);
        if($completion == 'For printing'){
            return redirect()->to(base_url('pendingTable'))->with('status', 'Data Verified!');
        }else{
            return redirect()->to(base_url('guestThermoTable'))->with('status', 'Data Updated Successfully!');
        }
    }

    public function standardTableUpdateInfo(){
        $ThermoStandard = new ThermoStandard();
        $data = [
            'standard' => $this->request->getPost('standard'),
            'manufacturer' => $this->request->getPost('manufacturer'),
            'modelNumber' => $this->request->getPost('modelNumber'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'dateOfCali' => $this->request->getPost('dateOfCali'),
            'dateOfNextCali' => $this->request->getPost('dateOfNextCali'),
            'standardUsed' => $this->request->getPost('standardUsed'),
            'stdResolutionTemp' => $this->request->getPost('stdResolutionTemp'),
            'stdResolutionRH' => $this->request->getPost('stdResolutionRH'),
            'issuingLab' => $this->request->getPost('issuingLab'),
        ];
        $table2Id = $this->request->getPost('idTable2');
        $ThermoStandard->update($table2Id,$data);
        #echo view('templates/header');
        return redirect()->to(base_url('guestThermoStandardEdit/'.$table2Id));
    }


    public function thermoStandardAddChamber(){
        
        $thermo = new ThermoChamberModel();
        $data['thermochamber'] = $thermo->findAll();

         return view('GuestUser/Thermo/ThermoAddChamber',  $data);
    }

    public function thermoStandardStoreChamber(){
        $models = new ThermoChamberModel();
        $temp = [
            'serialNumber'  => $this->request->getVar('serialNumber'),
            'unit' => 'Temperature',
            'Instability'  => $this->request->getVar('tempInstability'),
            'inhomogeneity'  => $this->request->getVar('tempInhomogeneity'),
        ];   
        $RH = [
            'serialNumber'  => $this->request->getVar('serialNumber'),
            'unit' => 'Relative Humidity',
            'Instability'  => $this->request->getVar('RHInstability'),
            'inhomogeneity'  => $this->request->getVar('RHInhomogeneity'),
        ];  
        $models->insert($temp);
        $models->insert($RH);
        return redirect()->to(base_url('guestThermoStandardAddChamber'))->with('status', 'Data Added Successfully!');
    }

    public function thermoChamberAddNew(){
        $models = new ThermoChamberModel();
        $temp = [
            'serialNumber'  => $this->request->getVar('serialNumber'),
            'unit' => 'Temperature',
            'Instability'  => 0,
            'inhomogeneity'  => 0,
        ];   
        $RH = [
            'serialNumber'  => $this->request->getVar('serialNumber'),
            'unit' => 'Relative Humidity',
            'Instability'  => 0,
            'inhomogeneity'  => 0,
        ];  
        $models->insert($temp);
        $models->insert($RH);
        return redirect()->to(base_url('guestThermoStandardAddChamber'))->with('status', 'Data Added Successfully!');
    }

    public function chamberEdit($id = null ){
        $model = new ThermoChamberModel();
        $data = $model->where('id', $id)->first();  
        if($data){
            echo json_encode(array("status" => true , 'data' => $data));
        }else{
            echo json_encode(array("status" => false));
        }
    } 

    public function thermoChamberUpdate(){  
        $model = new ThermoChamberModel();
        $id = $this->request->getVar('id');
        $snOfSelected = $this->request->getVar('snOfSelected');
         $data = [
            'Instability'  => $this->request->getVar('Instability'),
            'inhomogeneity'  => $this->request->getVar('inhomogeneity'),
            ];
            
 
        $update = $model->update($id,$data);
        return redirect()->to( base_url('guestThermoChamberView/'.$snOfSelected))->with('status', 'Data Updated Successfully!');
    }

    public function deleteChamber($id){
        $model = new ThermoChamberModel();
        // $imageTable = new ElectModel_image();
        $model->where('id', $id)->delete(); 
        // $imageTable->where('certificateNumber', $certificateNumber)->delete(); 
        return redirect()->to( base_url('guestThermoStandardAddChamber'))->with('status', 'Data Deleted Successfully!');
    }

    public function thermoChamberView($id){
        $thermo = new ThermoChamberModel();
        $data['thermochamber'] = $thermo->where('serialNumber',$id)->findAll();

        return view('GuestUser/Thermo/thermoChamberView',  $data);
    }
    public function deleteThermoStd($serialNumber){
        $rml = new ThermoStandard();
        $rml2 = new ThermoStandardAddTestPointsModel();
        $rml->where('serialNumber', $serialNumber)->delete(); 
        $rml2->where('serialNumber', $serialNumber)->delete(); 
        return redirect()->to( base_url('guestThermoStandardTable'))->with('status', 'Data Deleted Successfully!');
    }

    public function updateWord(){
        $ThermoModel = new ThermoModel();
        $data = [
            'settingCalibrationProcedureAndTraceability' => $this->request->getPost('settingCalibrationProcedureAndTraceability'),
            'settingUncertaintyOfMeasurement' => $this->request->getPost('settingUncertaintyOfMeasurement'),
            'CalibrationResults' => $this->request->getPost('CalibrationResults'),
            'settingRemarks1' => $this->request->getPost('remarkHere'),
        ];        
        $idOfCert = $this->request->getPost('idHere');
        $ThermoModel->update($idOfCert,$data);
        return redirect()->to(base_url('guestThermoPreview/'.$idOfCert))->with('status', 'Data Updated Successfully!');
    }
    
    public function deleteStandardTestPoint(){
        $rml = new ThermoStandardAddTestPointsModel();
        $snID = $this->request->getPost('snOfpage');
        $ID = $this->request->getPost('selectedIDToDelete');
        $rml->where('id', $ID)->delete(); 
        return redirect()->to(base_url('guestThermoStandardEdit/'.$snID))->with('status', 'Data Deleted Successfully!');    
    }

    public function deleteStandardDrift(){
        $rml = new ThermoStandardAddDriftModel();
        $snID = $this->request->getPost('snOfpageDrift');
        $ID = $this->request->getPost('selectedIDToDeleteDrift');
        $rml->where('id', $ID)->delete(); 
        return redirect()->to(base_url('guestThermoEdit/'.$snID))->with('status', 'Data Deleted Successfully!');    
    }

    public function checkCertNum(){
        $rml = new ThermoModel();
        $certNumToCheck = $this->request->getPost('q');
        $elect_table_1 = $rml->where('certificateNumber', $certNumToCheck)->first(); 
        $existing = false;
        if($rml->where('certificateNumber', $certNumToCheck)->countAllResults()>0){
			$existing = 'true';
		}else{
			$existing = 'false';
		}
        return $existing;
    }
    public function sendSelectedData(){
        $rml = new ThermoModel();
        $idOfSelected = $this->request->getPost('q');
        $selectedData = $rml->where('id', $idOfSelected)->first(); 
        return json_encode($selectedData);  
    }

    function htmlToPDF($id){
        $rml = new ThermoModel();
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $data['thermoData'] = $rml->where('id', $id)->first();
        $data['page'] = $this->request->getPost('pagerDown');
        $data['datePrev'] = $this->request->getPost('datePrevDown');
        $data['uucDecimalPointTempIn'] = $this->request->getPost('uucDecimalPointTempInDown');
        $data['uucDecimalPointRhIn'] = $this->request->getPost('uucDecimalPointRhInDown');
        $data['uucDecimalPointTempOut'] = $this->request->getPost('uucDecimalPointTempOutDown');
        $data['uucDecimalPointRhOut'] = $this->request->getPost('uucDecimalPointRhOutDown');

        $data['corrDecimalPointTempIn'] = $this->request->getPost('correctionDecimalPointTempInDown');
        $data['corrDecimalPointRhIn'] = $this->request->getPost('correctionDecimalPointRhInDown');
        $data['corrDecimalPointTempOut'] = $this->request->getPost('correctionDecimalPointTempOutDown');
        $data['corrDecimalPointRhOut'] = $this->request->getPost('correctionDecimalPointRhOutDown');

        $data['imageDraft'] = $this->request->getPost('imageDraftDown');

        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('GuestUser/Thermo/CalibrationCertificateThermo', $data));
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream($data['thermoData']['certificateNumber']." - ".$data['thermoData']['equipmentDescription']." - ".$data['thermoData']['calibratedBy'].".pdf",array("Attachment" => 1 ));
    }

    function htmlToPDFPreview($id){
        $rml = new ThermoModel();
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $data['thermoData'] = $rml->where('id', $id)->first();
        $data['page'] = $this->request->getPost('pagerPrev');
        $data['datePrev'] = $this->request->getPost('datePrev');
        $data['uucDecimalPointTempIn'] = $this->request->getPost('uucDecimalPointTempInPrev');
        $data['uucDecimalPointRhIn'] = $this->request->getPost('uucDecimalPointRhInPrev');
        $data['uucDecimalPointTempOut'] = $this->request->getPost('uucDecimalPointTempOutPrev');
        $data['uucDecimalPointRhOut'] = $this->request->getPost('uucDecimalPointRhOutPrev');
        
        $data['corrDecimalPointTempIn'] = $this->request->getPost('correctionDecimalPointTempInPrev');
        $data['corrDecimalPointRhIn'] = $this->request->getPost('correctionDecimalPointRhInPrev');
        $data['corrDecimalPointTempOut'] = $this->request->getPost('correctionDecimalPointTempOutPrev');
        $data['corrDecimalPointRhOut'] = $this->request->getPost('correctionDecimalPointRhOutPrev');

        $data['imageDraft'] = 'false';

        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('GuestUser/Thermo/CalibrationCertificateThermo', $data));
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Thermohygrometer Certificate #'.$id.".pdf",array("Attachment" => 0));
    }

    function htmlToPDFFullScreen($id){
        $rml = new ThermoModel();
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $data['thermoData'] = $rml->where('id', $id)->first();
        $data['page'] = $this->request->getPost('pagerFull');
        $data['datePrev'] = $this->request->getPost('datePrevFull');
        $data['uucDecimalPointTempIn'] = $this->request->getPost('uucDecimalPointTempInPrevFull');
        $data['uucDecimalPointRhIn'] = $this->request->getPost('uucDecimalPointRhInPrevFull');
        $data['uucDecimalPointTempOut'] = $this->request->getPost('uucDecimalPointTempOutPrevFull');
        $data['uucDecimalPointRhOut'] = $this->request->getPost('uucDecimalPointRhOutPrevFull');
        
        $data['corrDecimalPointTempIn'] = $this->request->getPost('correctionDecimalPointTempInPrevFull');
        $data['corrDecimalPointRhIn'] = $this->request->getPost('correctionDecimalPointRhInPrevFull');
        $data['corrDecimalPointTempOut'] = $this->request->getPost('correctionDecimalPointTempOutPrevFull');
        $data['corrDecimalPointRhOut'] = $this->request->getPost('correctionDecimalPointRhOutPrevFull');

        $data['imageDraft'] = 'false';

        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('GuestUser/Thermo/CalibrationCertificateThermo', $data));
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Thermohygrometer Certificate #'.$id.".pdf",array("Attachment" => 0));
    }
}
?>