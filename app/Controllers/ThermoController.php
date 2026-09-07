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

class ThermoController extends BaseController{
    public function __construct(){
		helper(['url', 'form']);
        // if (session()->get('role') != "admin") {
        //     echo 'Access denied!';
        //     exit;
        // } 
	}
    public function addView(){
        $data = [];
        $VerifierModel = new VerifierModel();
        $PersonnelModel = new PersonnelModel();
        $data['verifier'] = $VerifierModel->findAll();
        $data['personnel'] = $PersonnelModel->findAll();

        $ThermoModel = new ThermoModel();
        $data['ThermoData'] = $ThermoModel->select('id')->select('certificateNumber')->select('datas')->orderBy('id', 'DESC')->findAll();
        return view('Thermohygrometer/ThermoInputView',$data);
    }

    public function thermoTable(){
        $thermo = new ThermoModel();
        $model = new UserModel();
         $data['thermoData'] = $thermo->where('calibratorAccountID', session()->get('id'))->orWhere('verifierEmail',  session()->get('email'))->findAll();
        //$data['thermoData'] = $thermo->findAll();
        $data['user'] = $model->where('id', session()->get('id'))->first();


        // if($this->request->getGet('q')){
		// 	$q=$this->request->getGet('q');
		// 	$data['thermoData'] = $thermo->where('certificateNumber', $q)->orWhere('customer', $q)->findAll();
		// }else{
		// 	$data['thermoData'] = $thermo->findAll();
		// }
        return view('Thermohygrometer/ThermoTable',  $data);
    }

    public function thermoEdit($type,$id, $verify = null){
        $rml = new ThermoModel();
        $data['thermoData'] = $rml->where('id', $id)->first(); 
        $data['forVerification'] = $verify;
        if($verify == 'forVerification'){
            $dataToUpdate = [
                'completion' => 'On-going verification'
            ]; 
            $rml->update($id,$dataToUpdate);
        }
        if($type == 'new'){
            return view('Thermohygrometer/ThermoEdit', $data);
        }
        if($type == 'old'){
            return view('Thermohygrometer/ThermoEdit_old', $data);
        }
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
        return view('Thermohygrometer/ThermoInputEdit', $data);
    }

    public function thermoDelete($certificateNumber){
        $rml = new ThermoModel();
        // $imageTable = new ElectModel_image();
        $rml->where('id', $certificateNumber)->delete(); 
        // $imageTable->where('certificateNumber', $certificateNumber)->delete(); 
        return redirect()->to( base_url('thermoTable'))->with('status', 'Data Deleted Successfully!');
    }

    public function updateVerify(){
        $rml = new ThermoModel();
        $data = [
            'completion' => $this->request->getPost('completion'),
        ];        
        $idOfCert = $this->request->getPost('idVerify');
        $rml->update($idOfCert,$data);
        return redirect()->to(base_url('forVerifyTable'))->with('status', 'Data Validated!');
    }

    public function updateCorrection(){
        $rml = new ThermoModel();
        $data = [
            'completion' => $this->request->getPost('completion'),
            'comment' => $this->request->getPost('comment'),
        ];        
        $idOfCert = $this->request->getPost('idCorrection');
        $rml->update($idOfCert,$data);
        return redirect()->to(base_url('forVerifyTable'))->with('status', 'Data for Correction!');
    }

    public function PabLogoUpdate(){
        $rml = new ThermoModel();
        $data = [
            'PabLogo' => $this->request->getPost('pablogoValue'),
        ];
        $ID = $this->request->getPost('id');
        $rml->update($ID,$data);
        return redirect()->to(base_url('thermoEdit/'.$ID))->with('status', 'Data Updated Successfully!');
    }

    public function thermoStandardTable(){
        $ThermoStandard = new ThermoStandard();
        $data['thermostandardtable'] = $ThermoStandard->findAll();
        //return view('Thermohygrometer/ThermoStandardTable',$data);

        if($this->request->getGet('q')){
			$q=$this->request->getGet('q');
			$data['thermostandardtable'] = $ThermoStandard->where('certificateNumber', $q)->orWhere('serialNumber', $q)->findAll();
		}else{
			$data['thermostandardtable'] = $ThermoStandard->findAll();
		}
        return view('Thermohygrometer/ThermoStandardTable',  $data);
    }

    public function thermoStandardEdit($id){
        $ThermoStandard = new ThermoStandard();
        $data['thermostandardtable'] = $ThermoStandard->where('id', $id)->first(); 
        $data["snID"] = ["id"=>$id];
        $model = new UserModel();
        $data['user'] = $model->where('id', session()->get('id'))->first();
        return view('Thermohygrometer/ThermoStandardEdit',$data);
    }

    public function thermoStandardAddView(){
        return view('Thermohygrometer/ThermoStandardAddNew');
    }

    public function thermoStandardAddViewPRT(){
        return view('Thermohygrometer/ThermoStandardAddNewPRT');
    }

    public function thermoStandardEditValues($id){
        $TestPointsModel = new ThermoStandardAddTestPointsModel();
        $data = [
            'standardID' => $this->request->getPost('snID'),
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
            'previousRML' => $this->request->getPost('prevRML'),
            'drift' => $this->request->getPost('drift'),
            'coverageFactor' => $this->request->getPost('coverageFactor'),
        ];   
       
        $snID = $this->request->getPost('snID');
        $ID = $this->request->getPost('selectedID');
        $TestPointsModel->update($ID,$data);
        return redirect()->to(base_url('thermoStandardEdit/'.$snID))->with('status', 'Data Updated Successfully! '. $snID );    
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
        return redirect()->to(base_url('thermoStandardEdit/'.$snID))->with('status', 'Data Updated Successfully!');    
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
        return redirect()->to(base_url('thermoStandardEdit/'.$snID))->with('status', 'Data Updated Successfully!');    
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
        return redirect()->to(base_url('thermoStandardTable'))->with('status', 'Data Added Successfully!');
    }
    public function thermoStandardAddTestPoint(){
        $models = new ThermoStandardAddTestPointsModel();
        $data = [
            'standardID' => $this->request->getPost('idTable'),
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
            'previousRML' => $this->request->getPost('prevRML'),
            'drift' => $this->request->getPost('drift'),
            'coverageFactor' => $this->request->getPost('coverageFactor'),
        ];   
        $models->insert($data);
        $table2Id = $this->request->getPost('idTable');
        return redirect()->to(base_url('thermoStandardEdit/'.$table2Id));
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
        return redirect()->to(base_url('thermoStandardEdit/'.$table2Id));
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
        return redirect()->to(base_url('thermoStandardEdit/'.$table2Id));
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
                return view('Thermohygrometer/ThermoInputView', [
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

            'inputtedArrayTempIn' => $this->request->getPost('inputtedArrayTempIn') == ''? null : $this->request->getPost('inputtedArrayTempIn'),
            'inputtedArrayTempOut' => $this->request->getPost('inputtedArrayTempOut') == ''? null : $this->request->getPost('inputtedArrayTempOut'),
            'inputtedArrayRHIn' => $this->request->getPost('inputtedArrayRHIn') == ''? null : $this->request->getPost('inputtedArrayRHIn'),
            'inputtedArrayRHOunt' => $this->request->getPost('inputtedArrayRHOunt') == ''? null : $this->request->getPost('inputtedArrayRHOunt'),
    
            'datas' => $this->request->getPost('measurementDatas'),

            'calibratorAccountEmail' => $this->request->getPost('calibratorAccountEmail'),
            'calibratorAccountID' => $this->request->getPost('calibratorAccountID'),
            'verifierEmail' => $this->request->getPost('verifierEmail'),

            
        ];

        $model->insert($data);
        $idForImage = $model->insertID();

        $file = $this->request->getFile('imageInput');

        if($file->isValid() && ! $file -> hasMoved()){
            $imageName = $file->getRandomName();
            $file->move('uploads', $imageName);
        }else{
            $imageName = null;
        }
    
        $dataImage = [
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'image' =>  $imageName,
            'idOfCertificate' => $idForImage,
        ];
        if($imageName != null){
            $ImageTable->save($dataImage);
        }

        
        
        return redirect()->to(base_url('thermoTable'))->with('status', 'Data Added Successfully!');
    }}}
    public function thermoSaveOnlyData(){
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


                    'inputtedArrayTempIn' => $this->request->getPost('inputtedArrayTempIn') == ''? null : $this->request->getPost('inputtedArrayTempIn'),
                    'inputtedArrayTempOut' => $this->request->getPost('inputtedArrayTempOut') == ''? null : $this->request->getPost('inputtedArrayTempOut'),
                    'inputtedArrayRHIn' => $this->request->getPost('inputtedArrayRHIn') == ''? null : $this->request->getPost('inputtedArrayRHIn'),
                    'inputtedArrayRHOunt' => $this->request->getPost('inputtedArrayRHOunt') == ''? null : $this->request->getPost('inputtedArrayRHOunt'),
                    
                    'datas' => $this->request->getPost('measurementDatas'),
        

                    'calibratorAccountEmail' => $this->request->getPost('calibratorAccountEmail'),
                    'calibratorAccountID' => $this->request->getPost('calibratorAccountID'),
                    'verifierEmail' => $this->request->getPost('verifierEmail'),

                    
        ];
        $model->insert($data);
        $idInserted = $model->insertID();
        return redirect()->to(base_url('thermoUpdate/'.$idInserted));             
    }
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

            // 'inputtedArrayTempIn' => $this->request->getPost('inputtedArrayTempIn'),
            // 'inputtedArrayTempOut' => $this->request->getPost('inputtedArrayTempOut'),
            // 'inputtedArrayRHIn' => $this->request->getPost('inputtedArrayRHIn'),
            // 'inputtedArrayRHOunt' => $this->request->getPost('inputtedArrayRHOunt'),
            'inputtedArrayTempIn' => $this->request->getPost('inputtedArrayTempIn') == ''? null : $this->request->getPost('inputtedArrayTempIn'),
            'inputtedArrayTempOut' => $this->request->getPost('inputtedArrayTempOut') == ''? null : $this->request->getPost('inputtedArrayTempOut'),
            'inputtedArrayRHIn' => $this->request->getPost('inputtedArrayRHIn') == ''? null : $this->request->getPost('inputtedArrayRHIn'),
            'inputtedArrayRHOunt' => $this->request->getPost('inputtedArrayRHOunt') == ''? null : $this->request->getPost('inputtedArrayRHOunt'),

            'datas' => $this->request->getPost('measurementDatas'),

            'verifierEmail' => $this->request->getPost('verifierEmail'),
            
        ];
        
        $idForImage = $this->request->getPost('idOfCertificate');

        if ($imagefile = $this->request->getFiles()){
            foreach($imagefile['imageInput'] as $file){   
                if($file->isValid() && ! $file -> hasMoved()){
                    $imageName = $file->getRandomName();
                    $file->move('uploads/', $imageName);
                    //$file->move(WRITEPATH . 'uploads', $imageName);
                }else{
                    $imageName = null;
                }
                $dataImage = [
                    'certificateNumber' => $this->request->getPost('certificateNumber'),
                    'image' =>  $imageName,
                    'idOfCertificate' => $idForImage,
                ];
                if($imageName != null){
                    $ImageTable->insert($dataImage);
                }
            }    
            $msgs = 'have files';        
        }
    
        $idOfCert = $this->request->getPost('idOfCertificate');
        $completion = $this->request->getPost('completion');
        $model->update($idOfCert,$data);
        if($completion == 'For printing'){
            return redirect()->to(base_url('forVerifyTable'))->with('status', 'Data Verified!');
        }else{
            return redirect()->to(base_url('thermoTable'))->with('status', 'Data Updated Successfully!');
        }
    }
    public function thermoUpdateSaveData(){
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

            'inputtedArrayTempIn' => $this->request->getPost('inputtedArrayTempIn') == ''? null : $this->request->getPost('inputtedArrayTempIn'),
            'inputtedArrayTempOut' => $this->request->getPost('inputtedArrayTempOut') == ''? null : $this->request->getPost('inputtedArrayTempOut'),
            'inputtedArrayRHIn' => $this->request->getPost('inputtedArrayRHIn') == ''? null : $this->request->getPost('inputtedArrayRHIn'),
            'inputtedArrayRHOunt' => $this->request->getPost('inputtedArrayRHOunt') == ''? null : $this->request->getPost('inputtedArrayRHOunt'),
            'datas' => $this->request->getPost('measurementDatas'),

            'verifierEmail' => $this->request->getPost('verifierEmail'),
            
        ];

        if ($imagefile = $this->request->getFiles()){
            foreach($imagefile['imageInput'] as $file){   
                if($file->isValid() && ! $file -> hasMoved()){
                    $imageName = $file->getRandomName();
                    $file->move(WRITEPATH . 'uploads', $imageName);
                    //$file->move('uploads/', $imageName);
                }else{
                    $imageName = null;
                }
                $dataImage = [
                    'certificateNumber' => $this->request->getPost('certificateNumber'),
                    'image' =>  $imageName,
                ];
                if($imageName != null){
                    $ImageTable->insert($dataImage);
                }
            }    
            $msgs = 'have files';        
        }
        else{
            $file = $this->request->getFile('imageInput');

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
        }
    
        $idOfCert = $this->request->getPost('idHere');
        $completion = $this->request->getPost('completion');
        $model->update($idOfCert,$data);
        return redirect()->to(base_url('thermoUpdate/'.$idOfCert));
    }
    

    public function standardTableUpdateInfo(){
        $ThermoStandard = new ThermoStandard();
        $TestPointsModel = new ThermoStandardAddTestPointsModel();
        
        $serialNumber = $this->request->getPost('serialNumberTable');
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
            'coverageFactor' => $this->request->getPost('coverageFactor'),

        ];
        $table2Id = $this->request->getPost('idTable2');
        $ThermoStandard->update($table2Id,$data);

        $data_testPoint = [
            'standardID' => $this->request->getPost('idTable2'),
            'serialNumber' => $this->request->getPost('serialNumber'),
        ];
        $TestPointsModel->where('serialNumber', $serialNumber)->set($data_testPoint)->update();
        
        #echo view('templates/header');
        return redirect()->to(base_url('thermoStandardEdit/'.$table2Id));
    }


    public function thermoStandardAddChamber(){
        
        $thermo = new ThermoChamberModel();
        $data['thermochamber'] = $thermo->findAll();

         return view('Thermohygrometer/ThermoAddChamber',  $data);
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
        return redirect()->to(base_url('thermoStandardAddChamber'))->with('status', 'Data Added Successfully!');
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
        return redirect()->to(base_url('thermoStandardAddChamber'))->with('status', 'Data Added Successfully!');
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
        return redirect()->to( base_url('thermoChamberView/'.$snOfSelected))->with('status', 'Data Updated Successfully!');
    }

    public function deleteChamber($id){
        $model = new ThermoChamberModel();
        // $imageTable = new ElectModel_image();
        $model->where('id', $id)->delete(); 
        // $imageTable->where('certificateNumber', $certificateNumber)->delete(); 
        return redirect()->to( base_url('thermoStandardAddChamber'))->with('status', 'Data Deleted Successfully!');
    }

    public function thermoChamberView($id){
        $thermo = new ThermoChamberModel();
        $data['thermochamber'] = $thermo->where('serialNumber',$id)->findAll();

        return view('Thermohygrometer/thermoChamberView',  $data);
    }
    public function deleteThermoStd($serialNumber){
        $rml = new ThermoStandard();
        $rml2 = new ThermoStandardAddTestPointsModel();
        $rml->where('serialNumber', $serialNumber)->delete(); 
        $rml2->where('serialNumber', $serialNumber)->delete(); 
        return redirect()->to( base_url('thermoStandardTable'))->with('status', 'Data Deleted Successfully!');
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
        $type = $this->request->getPost('type');
        $ThermoModel->update($idOfCert,$data);
        if($type == 'new'){
            return redirect()->to(base_url('thermoEdit/new/'.$idOfCert))->with('status', 'Data Updated Successfully!');
        }
        if($type == 'old'){
            return redirect()->to(base_url('thermoEdit/old/'.$idOfCert))->with('status', 'Data Updated Successfully!');
        }
    }
    
    public function deleteStandardTestPoint(){
        $rml = new ThermoStandardAddTestPointsModel();
        $snID = $this->request->getPost('snOfpage');
        $ID = $this->request->getPost('selectedIDToDelete');
        $rml->where('id', $ID)->delete(); 
        return redirect()->to(base_url('thermoStandardEdit/'.$snID))->with('status', 'Data Deleted Successfully!');    
    }

    public function deleteStandardDrift(){
        $rml = new ThermoStandardAddDriftModel();
        $snID = $this->request->getPost('snOfpageDrift');
        $ID = $this->request->getPost('selectedIDToDeleteDrift');
        $rml->where('id', $ID)->delete(); 
        return redirect()->to(base_url('thermoStandardEdit/'.$snID))->with('status', 'Data Deleted Successfully!');    
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

    function saveDateOfIssue(){
        $ThermoModel = new ThermoModel();
        $data = [
            'settingCalibrationProcedureAndTraceability' => $this->request->getPost('settingCalibrationProcedureAndTraceability'),
            'settingUncertaintyOfMeasurement' => $this->request->getPost('settingUncertaintyOfMeasurement'),
            'CalibrationResults' => $this->request->getPost('CalibrationResults'),
            'settingRemarks1' => $this->request->getPost('remarkHere'),
        ];        
        $idOfCert = $this->request->getPost('idHere');
        $type = $this->request->getPost('type');
        $ThermoModel->update($idOfCert,$data);
        if($type == 'new'){
            return redirect()->to(base_url('thermoEdit/new/'.$idOfCert))->with('status', 'Data Updated Successfully!');
        }
        if($type == 'old'){
            return redirect()->to(base_url('thermoEdit/old/'.$idOfCert))->with('status', 'Data Updated Successfully!');
        }
    }
    function saveCustomDecimal(){
        $ThermoModel = new ThermoModel();
        $data = [
            'customDecimalPlace' => $this->request->getPost('customDecimalPlace'),
        ];        
        $idOfCert = $this->request->getPost('idHere');
        $type = $this->request->getPost('type');
        $ThermoModel->update($idOfCert,$data);
        if($type == 'new'){
            return redirect()->to(base_url('thermoEdit/new/'.$idOfCert))->with('status', 'Data Updated Successfully!');
        }
        if($type == 'old'){
            return redirect()->to(base_url('thermoEdit/old/'.$idOfCert))->with('status', 'Data Updated Successfully!');
        }
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

        $data['imageDraft'] = 'false';

        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('Thermohygrometer/CalibrationCertificateThermo_old', $data));
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream($data['thermoData']['certificateNumber']." - ".$data['thermoData']['customer']." - ".$data['thermoData']['equipmentDescription']." - ".$data['thermoData']['calibratedBy'].".pdf",array("Attachment" => true ));
    }

    function htmlToPDFNew($id){
        $rml = new ThermoModel();
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $data['thermoData'] = $rml->where('id', $id)->first();
        $data['page'] = $this->request->getPost('pagerDown');
        $data['datePrev'] = $this->request->getPost('datePrevDown');
        $typeOfPrint = $this->request->getPost('typeOfPrint');
        $decimalCount = $this->request->getPost('decimalCount');
        
        $data['imageDraft'] = $this->request->getPost('imageDraftDown');

        $dataForUpdate = [
            'dateOfIssue' => $this->request->getPost('datePrevDown'),
        ];
        $rml->update($id,$dataForUpdate);

        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('Thermohygrometer/CalibrationCertificateThermo', $data));
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        if($typeOfPrint == 'download'){
            $dompdf->stream($data['thermoData']['certificateNumber']." - ".$data['thermoData']['customer']." - ".$data['thermoData']['equipmentDescription']." - ".$data['thermoData']['calibratedBy'].".pdf",array("Attachment" => 1 ));
        }
        if($typeOfPrint == 'preview' || $typeOfPrint == 'fullPreview'){
            $dompdf->stream($data['thermoData']['certificateNumber']." - ".$data['thermoData']['customer']." - ".$data['thermoData']['equipmentDescription']." - ".$data['thermoData']['calibratedBy'].".pdf",array("Attachment" => 0 ));
        }
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
        $dompdf->loadHtml(view('Thermohygrometer/CalibrationCertificateThermo_old', $data));
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream($data['thermoData']['certificateNumber']." - ".$data['thermoData']['customer']." - ".$data['thermoData']['equipmentDescription']." - ".$data['thermoData']['calibratedBy'].".pdf",array("Attachment" => false ));
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
        $dompdf->loadHtml(view('Thermohygrometer/CalibrationCertificateThermo_old', $data));
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream($data['thermoData']['certificateNumber']." - ".$data['thermoData']['customer']." - ".$data['thermoData']['equipmentDescription']." - ".$data['thermoData']['calibratedBy'].".pdf",array("Attachment" => false));
    }
    

}




?>