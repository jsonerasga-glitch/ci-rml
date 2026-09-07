<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\TestWeightModel;
use App\Models\TestWeightStandardDetailsModel;
use App\Models\TestWeightStandardValuesModel;
use App\Models\ElectModel_2;
use App\Models\ElectModel_3;
use App\Models\TestWeightSensitivityTestModel;
use App\Models\TestWeightPABModel;
use App\Models\TestWeightMPEModel;
use App\Models\TestWeightAlloyModel;
use App\Models\ElectModel_image;
use App\Models\VerifierModel;
use App\Models\PersonnelModel;
use Dompdf\Options; 

class UserGuestTestWeightController extends BaseController{
    public function __construct(){
		helper(['url', 'form']);
        if (session()->get('role') != "user") {
            echo 'Access denied!';
            exit;
        } 
	}

	public function addDataView(){
        $data = [];
        $VerifierModel = new VerifierModel();
        $PersonnelModel = new PersonnelModel();
        $TestWeightMPEModel = new TestWeightMPEModel();

        $data['verifier'] = $VerifierModel->findAll();
        $data['personnel'] = $PersonnelModel->findAll();
        $data['mpe'] = $TestWeightMPEModel->findAll();

        return view('GuestUser/TestWeight/TestWeightInputView',$data);
    }
    public function testWeightTable(){
        $TestWeightModel = new TestWeightModel();
        $data['TestWeightData'] = $TestWeightModel->findAll();
        $model = new UserModel();
        $data['user'] = $model->where('id', session()->get('id'))->first();


        if($this->request->getGet('q')){
			$q=$this->request->getGet('q');
			$data['TestWeightData'] = $TestWeightModel->where('certificateNumber', $q)->orWhere('customer', $q)->findAll();
		}else{
			$data['TestWeightData'] = $TestWeightModel->findAll();
		}
        return view('GuestUser/TestWeight/guestTestWeightTable',  $data);
    }
    public function testWeightTableDATA(){
        $TestWeightModel = new TestWeightModel();
        $data['TestWeightData'] = $TestWeightModel->findAll();
        $model = new UserModel();
        $data['user'] = $model->where('id', session()->get('id'))->first();


        if($this->request->getGet('q')){
			$q=$this->request->getGet('q');
			$data['TestWeightData'] = $TestWeightModel->like('certificateNumber', $q)->orLike('customer', $q)->findAll();
		}else{
			$data['TestWeightData'] = $TestWeightModel->findAll();
		}
        return view('GuestUser/TestWeight/TestWeightTableData',  $data);
    }
    public function testWeightEdit($id, $verify = null){

        $rml = new TestWeightModel();
        $data['testWeightData'] = $rml->where('id', $id)->first(); 
        $data['forVerification'] = $verify;
        if($verify == 'forVerification'){
            $dataToUpdate = [
                'completion' => 'On-going verification'
            ]; 
            $rml->update($id,$dataToUpdate);
        }
        return view('GuestUser/TestWeight/guestTestWeightPrintView',  $data);
    }
    public function editDataView($id, $verify = null){
        $rml = new TestWeightModel();
        $VerifierModel = new VerifierModel();
        $PersonnelModel = new PersonnelModel();
        $TestWeightMPEModel = new TestWeightMPEModel();

        $data['verifier'] = $VerifierModel->findAll();
        $data['personnel'] = $PersonnelModel->findAll();
        $data['testWeightData'] = $rml->where('id', $id)->first();
        $data['mpe'] = $TestWeightMPEModel->findAll();

        $model = new UserModel();
        $data['forVerification'] = $verify;
        $data['user'] = $model->where('id', session()->get('id'))->first(); 
        return view('GuestUser/TestWeight/TestWeightInputEdit',  $data);
    }
    public function storeData(){
        $TestWeightModel = new TestWeightModel();
        $imageTable = new ElectModel_image();
        $data = [
            'completion' => $this->request->getPost('completion'),
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'weight' => $this->request->getPost('weight'),
            'allData' => $this->request->getPost('allData'),
            'customer' => $this->request->getPost('customer'),
            'address' => $this->request->getPost('address'),
            'dateReceived' => $this->request->getPost('dateReceived'),
            'dateCalibrated' => $this->request->getPost('dateCalibrated'),
            'recommendedDueDate' => $this->request->getPost('recommendedDueDate'),
            'placeOfCalibration' => $this->request->getPost('placeOfCalibration'),
            'equipmentDescription' => $this->request->getPost('equipmentDescription'),
            'manufacturer' => $this->request->getPost('manufacturer'),
            'Class' => $this->request->getPost('Class'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'equipmentID' => $this->request->getPost('equipmentID'),
            'approxClass' => $this->request->getPost('approxClass'),
            'cycle' => $this->request->getPost('cycle'),
            'standardDescription' => $this->request->getPost('standardDescription'),
            'accessories' => $this->request->getPost('accessories'),
            'maker' => $this->request->getPost('maker'),
            'classStandard' => $this->request->getPost('classStandard'),
            'remarks' => $this->request->getPost('remarks'),
            'serialNumberStandard' => $this->request->getPost('serialNumberStandard'),
            'dateOfNextCalib' => $this->request->getPost('dateOfNextCalib'),
            'timeStart' => $this->request->getPost('timeStart'),
            'timeFinished' => $this->request->getPost('timeFinished'),
            'calibratedBy' => $this->request->getPost('calibratedBy'),
            'encodedBy' => $this->request->getPost('encodedBy'),
            'checkedBy' => $this->request->getPost('checkedBy'),
            'dateCalibratedBy' => $this->request->getPost('dateCalibratedBy'),
            'dateCheckedBy' => $this->request->getPost('dateCheckedBy'),
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

        $TestWeightModel->insert($data);
        return redirect()->to(base_url('guestTestWeightTable'))->with('status', 'Data Added Successfully!');
    }
    public function updateData(){
        $TestWeightModel = new TestWeightModel();
        $imageTable = new ElectModel_image();
        $data = [
            'completion' => $this->request->getPost('completion'),
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'weight' => $this->request->getPost('weight'),
            'allData' => $this->request->getPost('allData'),
            'customer' => $this->request->getPost('customer'),
            'address' => $this->request->getPost('address'),
            'dateReceived' => $this->request->getPost('dateReceived'),
            'dateCalibrated' => $this->request->getPost('dateCalibrated'),
            'recommendedDueDate' => $this->request->getPost('recommendedDueDate'),
            'placeOfCalibration' => $this->request->getPost('placeOfCalibration'),
            'equipmentDescription' => $this->request->getPost('equipmentDescription'),
            'manufacturer' => $this->request->getPost('manufacturer'),
            'Class' => $this->request->getPost('Class'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'equipmentID' => $this->request->getPost('equipmentID'),
            'approxClass' => $this->request->getPost('approxClass'),
            'cycle' => $this->request->getPost('cycle'),
            'standardDescription' => $this->request->getPost('standardDescription'),
            'accessories' => $this->request->getPost('accessories'),
            'maker' => $this->request->getPost('maker'),
            'classStandard' => $this->request->getPost('classStandard'),
            'remarks' => $this->request->getPost('remarks'),
            'serialNumberStandard' => $this->request->getPost('serialNumberStandard'),
            'dateOfNextCalib' => $this->request->getPost('dateOfNextCalib'),
            'timeStart' => $this->request->getPost('timeStart'),
            'timeFinished' => $this->request->getPost('timeFinished'),
            'calibratedBy' => $this->request->getPost('calibratedBy'),
            'encodedBy' => $this->request->getPost('encodedBy'),
            'checkedBy' => $this->request->getPost('checkedBy'),
            'dateCalibratedBy' => $this->request->getPost('dateCalibratedBy'),
            'dateCheckedBy' => $this->request->getPost('dateCheckedBy'),
        ];

        $table2Id = $this->request->getPost('idTable2');
        $completion = $this->request->getPost('completion');
        $TestWeightModel->update($table2Id,$data);
        if($completion == 'For printing'){
            return redirect()->to(base_url('pendingTable'))->with('status', 'Data Verified!');
        }else{
            return redirect()->to(base_url('guestTestWeightTable'))->with('status', 'Data Added Successfully!');
        }
    }
    public function deleteData($certificateNumber){
        $rml = new TestWeightModel();
        // $imageTable = new ElectModel_image();
        $rml->where('id', $certificateNumber)->delete(); 
        // $imageTable->where('certificateNumber', $certificateNumber)->delete(); 
        return redirect()->to( base_url('guestTestWeightTable'))->with('status', 'Data Deleted Successfully!');
    }
    // public function updateVerify(){
    //     $model = new TestWeightModel();
    //     $data = [
    //         'completion' => $this->request->getPost('completion'),
    //     ];        
    //     $idOfCert = $this->request->getPost('idVerify');
    //     $model->update($idOfCert,$data);
    //     return redirect()->to(base_url('forVerifyTable'))->with('status', 'Data Validated!');
    // }
    // public function updateCorrection(){
    //     $model = new TestWeightModel();
    //     $data = [
    //         'completion' => $this->request->getPost('completion'),
    //     ];        
    //     $idOfCert = $this->request->getPost('idCorrection');
    //     $model->update($idOfCert,$data);
    //     return redirect()->to(base_url('forVerifyTable'))->with('status', 'Data for Correction!');
    // }
    public function standardTable(){
        $TestWeightStandardDetailsModel = new ElectModel_2();
        $data['TestWeightStandardDetailsModel'] = $TestWeightStandardDetailsModel->findAll();
        $model = new UserModel();
        $data['user'] = $model->where('id', session()->get('id'))->first();

        if($this->request->getGet('q')){
			$q=$this->request->getGet('q');
			$data['TestWeightStandardDetailsModel'] = $TestWeightStandardDetailsModel->where('serialNumber', $q)->findAll();
		}else{
			$data['TestWeightStandardDetailsModel'] = $TestWeightStandardDetailsModel->findAll();
		}
        return view('GuestUser/TestWeight/TestWeightStandardTable', $data);
    }
    public function standardTableEdit($id){
        $rml = new ElectModel_2();
        $data['TestWeightStandardDetailsModel'] = $rml->where('id', $id)->first(); 
        $data["snID"] = ["id"=>$id];
        #echo view('templates/header');
        return view('GuestUser/TestWeight/TestWeightStandardEdit', $data);
    }

    public function standardTableStore(){
        $TestWeightStandardValuesModel = new TestWeightStandardValuesModel();
        $data = [
            'serialNumber' => $this->request->getPost('serialNumber'),
            'nominalValue' => $this->request->getPost('nominalValue'),
            'nominalUnit' => $this->request->getPost('nominalUnit'),
            'marking' => $this->request->getPost('marking'),
            'conventionalMass' => $this->request->getPost('conventionalMass'),
            'unit' => $this->request->getPost('unit'),
            'uncertainty' => $this->request->getPost('uncertainty'),
            'mpe' => $this->request->getPost('mpe'),
            'issuer' => $this->request->getPost('calibrationProvider'),
            'class' => $this->request->getPost('class'),
        ];
        $TestWeightStandardValuesModel->insert($data);
        $table2Id = $this->request->getPost('idTable2');
        return $this->standardTableEdit($table2Id);
    }
    public function standardTableUpdateInfo(){
        $TestWeightStandardDetailsModel = new TestWeightStandardDetailsModel();
        $data = [
            'description' => $this->request->getPost('description'),
            'manufacturer' => $this->request->getPost('manufacturer'),
            'type' => $this->request->getPost('type'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'prevAirDensity' => $this->request->getPost('prevAirDensity'),
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'dateOfCalibration' => $this->request->getPost('dateOfCalibration'),
        ];
        $table2Id = $this->request->getPost('idTable2');
        $TestWeightStandardDetailsModel->update($table2Id,$data);
        #echo view('templates/header');
       return $this->standardTableEdit($table2Id);
    }
    public function standardTableEditValues($id){
        $TestWeightStandardValuesModel = new TestWeightStandardValuesModel();
        $data = [
            'serialNumber' => $this->request->getPost('serialNumber'),
            'nominalValue' => $this->request->getPost('nominalValue'),
            'nominalUnit' => $this->request->getPost('nominalUnit'),
            'marking' => $this->request->getPost('marking'),
            'conventionalMass' => $this->request->getPost('conventionalMass'),
            'unit' => $this->request->getPost('unit'),
            'uncertainty' => $this->request->getPost('uncertainty'),
            'mpe' => $this->request->getPost('mpe'),
            'issuer' => $this->request->getPost('calibrationProvider'),
        ];
        $snID = $this->request->getPost('snID');
        $ID = $this->request->getPost('selectedID');
        $TestWeightStandardValuesModel->update($ID,$data);
        return redirect()->to(base_url('testWeightStandardEdit/'.$snID))->with('status', 'Data Updated Successfully!');    
    }

    
    //delete STD values
    public function deleteTestWeightValues(){
        $rml = new TestWeightStandardValuesModel();
        $snID = $this->request->getPost('snOfpageTestWeight');
        $ID = $this->request->getPost('selectedIdtestWeight');
        $rml->where('id', $ID)->delete(); 
        return redirect()->to(base_url('testWeightStandardEdit/'.$snID))->with('status', 'Data deleted Successfully!'); 
    }

    public function standardTableAddNew(){
        return view('GuestUser/TestWeight/TestWeightStandardAddNew');
    }
    public function PABTable(){
        $TestWeightPABModel = new TestWeightPABModel();
        $data['TestWeightPAB'] = $TestWeightPABModel->findAll();
        $model = new UserModel();
        $data['user'] = $model->where('id', session()->get('id'))->first();

        return view('GuestUser/TestWeight/TestWeightPABTable', $data);
    }
    public function pabAddNew(){
        return view('GuestUser/TestWeight/TestWeightPABAddNew');
    }
    public function pabUpdateData(){
        $TestWeightPABModel = new TestWeightPABModel();
        $imageTable = new ElectModel_image();
        $data = [
            'classification' => $this->request->getPost('classification'),
            'class' => $this->request->getPost('class'),
            'instrument' => $this->request->getPost('instrument'),
            'rangePAB' => $this->request->getPost('rangePAB'),
            'cmc' => $this->request->getPost('cmc'),
            'method' => $this->request->getPost('method'),
        ];

        $table2Id = $this->request->getPost('id');
        $TestWeightPABModel->update($table2Id,$data);
        return redirect()->to(base_url('testWeightPABTable'))->with('status', 'Data Updated Successfully!');
    }
    public function MPETable(){
        $TestWeightMPEModel = new TestWeightMPEModel();
        $data['TestWeightMPE'] = $TestWeightMPEModel->findAll();
        $model = new UserModel();
        $data['user'] = $model->where('id', session()->get('id'))->first();

        return view('GuestUser/TestWeight/TestWeightMPETable', $data);
    }
    public function mpeAddNew(){
        return view('GuestUser/TestWeight/TestWeightMPEAddNew');
    }
    public function mpeUpdateData(){
        $TestWeightMPEModel = new TestWeightMPEModel();
        $imageTable = new ElectModel_image();
        $data = [
            'class' => $this->request->getPost('class'),
            'nominalValue' => $this->request->getPost('nominalValue'),
            'nominalUnit' => $this->request->getPost('nominalUnit'),
            'MPE' => $this->request->getPost('mpe'),
        ];

        $table2Id = $this->request->getPost('id');
        $TestWeightMPEModel->update($table2Id,$data);
        return redirect()->to(base_url('testWeightPABTable'))->with('status', 'Data Updated Successfully!');
    }
    public function mpeAddNewDetails(){
        $TestWeightMPE = new TestWeightMPEModel();
        $data = [
            'class' => $this->request->getPost('class'),
            'nominalValue' => $this->request->getPost('nominalValue'),
            'nominalUnit' => $this->request->getPost('nominalUnit'),
            'MPE' => $this->request->getPost('mpe'),
        ];
        $TestWeightMPE->insert($data);
        return redirect()->to(base_url('testWeightMPETable'))->with('status', 'Data Added Successfully!');
    }
    public function pabAddNewDetails(){
        $TestWeightPAB = new TestWeightPABModel();
        $data = [
            'classification' => $this->request->getPost('classification'),
            'class' => $this->request->getPost('class'),
            'instrument' => $this->request->getPost('instrument'),
            'rangePAB' => $this->request->getPost('rangePAB'),
            'cmc' => $this->request->getPost('cmc'),
            'method' => $this->request->getPost('method'),
        ];
        $TestWeightPAB->insert($data);
        return redirect()->to(base_url('testWeightPABTable'))->with('status', 'Data Added Successfully!');
    }
    public function AlloyTable(){
        $TestWeightAlloyModel = new TestWeightAlloyModel();
        $data['TestWeightAlloy'] = $TestWeightAlloyModel->findAll();
        $model = new UserModel();
        $data['user'] = $model->where('id', session()->get('id'))->first();
        return view('GuestUser/TestWeight/TestWeightAlloyTable', $data);
    }
    public function alloyAddNew(){
        return view('GuestUser/TestWeight/TestWeightAlloyAddNew');
    }
    public function alloyAddNewDetails(){
        $TestWeightAlloyModel = new TestWeightAlloyModel();
        $data = [
            'material' => $this->request->getPost('material'),
            'density' => $this->request->getPost('density'),
            'uncertainty' => $this->request->getPost('uncertainty'),
            'unit' => $this->request->getPost('unit'),
        ];
        $TestWeightAlloyModel->insert($data);
        return redirect()->to(base_url('testWeightAlloyTable'))->with('status', 'Data Added Successfully!');
    }
    public function alloyUpdateData(){
        $TestWeightAlloyModel = new TestWeightAlloyModel();
        $data = [
            'material' => $this->request->getPost('material'),
            'density' => $this->request->getPost('density'),
            'uncertainty' => $this->request->getPost('uncertainty'),
            'unit' => $this->request->getPost('unit'),
        ];
        $table2Id = $this->request->getPost('id');
        $TestWeightAlloyModel->update($table2Id,$data);
        return redirect()->to(base_url('testWeightAlloyTable'))->with('status', 'Data Updated Successfully!');
    }
    public function standardTableAddNewDetails(){
        $TestWeightStandardDetailsModel = new TestWeightStandardDetailsModel();
        $data = [
            'description' => $this->request->getPost('description'),
            'manufacturer' => $this->request->getPost('manufacturer'),
            'type' => $this->request->getPost('type'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'dateOfCalibration' => $this->request->getPost('dateOfCali'),
            'issuer' => $this->request->getPost('calibrationProvider'),
            'class' => $this->request->getPost('class'),
            'prevAirDensity' => $this->request->getPost('prevAirDensity')
        ];
        $TestWeightStandardDetailsModel->insert($data);
        return redirect()->to(base_url('testWeightStandardTable'))->with('status', 'Data Added Successfully!');
    }
    public function sensitivityTestTable(){
        $TestWeightSensitivityTestModel = new TestWeightSensitivityTestModel();
        $data['TestWeightSensitivityTestModel'] = $TestWeightSensitivityTestModel->findAll();
        $model = new UserModel();
        $data['user'] = $model->where('id', session()->get('id'))->first();

        if($this->request->getGet('q')){
			$q=$this->request->getGet('q');
			$data['TestWeightSensitivityTestModel'] = $TestWeightSensitivityTestModel->where('serialNumber', $q)->findAll();
		}else{
			$data['TestWeightSensitivityTestModel'] = $TestWeightSensitivityTestModel->findAll();
		}
        return view('GuestUser/TestWeight/TestWeightSensitivityTestTable',$data);
    }
    public function sensitivityTestAdd(){
        $data = [];
        $model = new Usermodel();
        $data['user'] = $model->where('id', session()->get('id'))->first();
        return view('GuestUser/TestWeight/TestWeightSensitivityTest',$data);
    }
    public function sensitivityTestAddValue(){
        $TestWeightSensitivityTestModel = new TestWeightSensitivityTestModel();
        $data = [
            'balance' => $this->request->getPost('balance'),
            'empty1' => $this->request->getPost('empty1'),
            'full1' => $this->request->getPost('full1'),
            'empty2' => $this->request->getPost('empty2'),
            'full2' => $this->request->getPost('full2'),
            'empty3' => $this->request->getPost('empty3'),
            'full3' => $this->request->getPost('full3'),
            'empty4' => $this->request->getPost('empty4'),
            'full4' => $this->request->getPost('full4'),
            'empty5' => $this->request->getPost('empty5'),
            'full5' => $this->request->getPost('full5'),
            'emptySD' => $this->request->getPost('emptySD'),
            'fullSD' => $this->request->getPost('fullSD'),
            'sensitivityWeight' => $this->request->getPost('sensitivityWeight'),
            'maximumValue' => $this->request->getPost('maximumValue'),
            'minimumValue' => $this->request->getPost('minimumValue'),
            'differenceValue' => $this->request->getPost('differenceValue'),
            'dateCalibrated' => $this->request->getPost('dateCalibrated'),
            'uncertSensitivityWeight' => $this->request->getPost('uncertSensitivityWeight'),
            'sensitivityWeightDelta' => $this->request->getPost('sensitivityWeightDelta'),
            'uncertSensitivityWeightDelta' => $this->request->getPost('uncertSensitivityWeightDelta'),
            'pooledValue' => $this->request->getPost('pooledValue'),

        ];
        $TestWeightSensitivityTestModel->insert($data);
        return redirect()->to(base_url('testWeightSensitivityTestTable'))->with('status', 'Data Added Successfully!');
    }
    public function sensitivityTestEdit($id){
        $rml = new TestWeightSensitivityTestModel();
        $data['TestWeightSensitivityTestModel'] = $rml->where('id', $id)->first(); 
        $data["snID"] = ["id"=>$id];
        return view('GuestUser/TestWeight/TestWeightSensitivityTestEdit', $data);
    }
    public function sensitivityTestUpdateInfo(){
        $TestWeightSensitivityTestModel = new TestWeightSensitivityTestModel();
        $data = [
            'balance' => $this->request->getPost('balance'),
            'empty1' => $this->request->getPost('empty1'),
            'full1' => $this->request->getPost('full1'),
            'empty2' => $this->request->getPost('empty2'),
            'full2' => $this->request->getPost('full2'),
            'empty3' => $this->request->getPost('empty3'),
            'full3' => $this->request->getPost('full3'),
            'empty4' => $this->request->getPost('empty4'),
            'full4' => $this->request->getPost('full4'),
            'empty5' => $this->request->getPost('empty5'),
            'full5' => $this->request->getPost('full5'),
            'emptySD' => $this->request->getPost('emptySD'),
            'fullSD' => $this->request->getPost('fullSD'),
            'sensitivityWeight' => $this->request->getPost('sensitivityWeight'),
            'maximumValue' => $this->request->getPost('maximumValue'),
            'minimumValue' => $this->request->getPost('minimumValue'),
            'differenceValue' => $this->request->getPost('differenceValue'),
            'dateCalibrated' => $this->request->getPost('dateCalibrated'),
            'uncertSensitivityWeight' => $this->request->getPost('uncertSensitivityWeight'),
            'resolution1' => $this->request->getPost('resolution1'),
            'resolution2' => $this->request->getPost('resolution2'),
            'conditionForResolution' => $this->request->getPost('conditionForResolution'),
            'sensitivityWeightDelta' => $this->request->getPost('sensitivityWeightDelta'),
            'uncertSensitivityWeightDelta' => $this->request->getPost('uncertSensitivityWeightDelta'),
            'pooledValue' => $this->request->getPost('pooledValue'),
        ];
        $table2Id = $this->request->getPost('idTable2');
        $TestWeightSensitivityTestModel->update($table2Id,$data);
        #echo view('templates/header');
        return redirect()->to(base_url('testWeightSensitivityTestEdit/'.$table2Id))->with('status', 'Data Added Successfully!');
    }
    public function updateWord(){
        $TestWeightModel = new TestWeightModel();
        $data = [
            'settingCalibrationProcedureAndTraceability' => $this->request->getPost('settingCalibrationProcedureAndTraceability'),
            'settingUncertaintyOfMeasurement' => $this->request->getPost('settingUncertaintyOfMeasurement'),
            'CalibrationResults' => $this->request->getPost('CalibrationResults'),
            'settingRemarks1' => $this->request->getPost('settingRemarks1'),
            'settingRemarks2' => $this->request->getPost('settingRemarks2'),
            'settingRemarks3' => $this->request->getPost('settingRemarks3'),
            'settingRemarks4' => $this->request->getPost('settingRemarks4'),
            'remarks' => $this->request->getPost('settingRemarks5'),
        ];        
        $idOfCert = $this->request->getPost('idHere');
        $TestWeightModel->update($idOfCert,$data);
        return redirect()->to(base_url('testWeightTable'))->with('status', 'Data Updated Successfully!');
    }
    public function PabLogoUpdate(){
        $rml = new TestWeightModel();
        $data = [
            'PabLogo' => $this->request->getPost('pablogoValue'),
        ];
        $ID = $this->request->getPost('id');
        $rml->update($ID,$data);
        return redirect()->to(base_url('testWeightEdit/'.$ID))->with('status', 'Data Updated Successfully!');
    }

    public function checkCertNum(){
        $rml = new TestWeightModel();
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
    function htmlToPDF($id){
        $rml = new TestWeightModel();
        $standardValues = new ElectModel_3();
        $MPEValues = new TestWeightMPEModel();
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $data['testWeightData'] = $rml->where('id', $id)->first();
        $data['StandardData'] = $standardValues->findAll();
        $data['MPEData'] = $MPEValues->findAll();
        $data['units'] = $this->request->getPost('unitDown');
        $data['datePrev'] = $this->request->getPost('datePrevDown');
        $data['bouyancy'] = $this->request->getPost('bouyancyDown');

        $data['imageDraft'] = $this->request->getPost('imageDraftDown');

        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('GuestUser/TestWeight/CalibrationCertificateTestWeight', $data));
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream('TestWeight Certificate #'.$id.".pdf",array("Attachment" => 1 ));
    }

    function htmlToPDFPreview($id){
        $rml = new TestWeightModel();
        $standardValues = new ElectModel_3();
        $MPEValues = new TestWeightMPEModel();
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $data['testWeightData'] = $rml->where('id', $id)->first();
        $data['StandardData'] = $standardValues->findAll();
        $data['MPEData'] = $MPEValues->findAll();
        $data['units'] = $this->request->getPost('unitPrev');
        $data['datePrev'] = $this->request->getPost('datePrev');
        $data['bouyancy'] = $this->request->getPost('bouyancyPrev');

        $data['imageDraft'] = 'false';

        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('GuestUser/TestWeight/CalibrationCertificateTestWeight', $data));
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream('TestWeight Certificate #'.$id.".pdf",array("Attachment" => 0));
    }
    function htmlToPDFFull($id){
        $rml = new TestWeightModel();
        $standardValues = new ElectModel_3();
        $MPEValues = new TestWeightMPEModel();
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $data['testWeightData'] = $rml->where('id', $id)->first();
        $data['StandardData'] = $standardValues->findAll();
        $data['MPEData'] = $MPEValues->findAll();
        $data['units'] = $this->request->getPost('unitFull');
        $data['datePrev'] = $this->request->getPost('datePrevFull');
        $data['bouyancy'] = $this->request->getPost('bouyancyPrevFull');
        
        $data['imageDraft'] = 'false';

        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('GuestUser/TestWeight/CalibrationCertificateTestWeight', $data));
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream('TestWeight Certificate #'.$id.".pdf",array("Attachment" => 0 ));
    }
}
?>