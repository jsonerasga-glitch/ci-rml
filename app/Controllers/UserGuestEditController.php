<?php namespace App\Controllers;

use App\Models\ElectModel_1;
use App\Models\ElectModel_2;
use App\Models\ElectModel_3;
use App\Models\ElectModel_image;
use App\Models\UserModel;
use App\Models\CustomersModel;
use App\Models\VerifierModel;
use App\Models\PersonnelModel;
use App\Models\Defaults;
use Dompdf\Options; 

class UserGuestEditController extends BaseController{

    public function __construct(){
		helper(['url', 'form']);
        
        //to check if admin is logged in
        if (session()->get('role') != "user") {
            echo 'Access denied!';
            exit;
        }
	}
    //Elect
    
    public function viewPrint($id, $verify = null){
        $rml = new ElectModel_1();
        $data['elect_table_1'] = $rml->where('id', $id)->first(); 
        $data['forVerification'] = $verify;
        if($verify == 'forVerification'){
            $dataToUpdate = [
                'completion' => 'On-going verification'
            ]; 
            $rml->update($id,$dataToUpdate);
        }
        return view('GuestUser/Elect/guestViewPrint', $data);
    }

    //fetch elect data 
    public function update($id, $verify = null){
        $VerifierModel = new VerifierModel();
        $PersonnelModel = new PersonnelModel();
        $data['verifier'] = $VerifierModel->findAll();
        $data['personnel'] = $PersonnelModel->findAll();
        $rml = new ElectModel_1();
        $data['elect_table_1'] = $rml->where('id', $id)->first(); 
        $data['forVerification'] = $verify;
        $model = new UserModel();
        $data['user'] = $model->where('id', session()->get('id'))->first();
        return view('GuestUser/Elect/SRElectronicEdit', $data);
    }
    //update elect data from database
    public function updateData(){
        $elect_calib_1 = new ElectModel_1();
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
            'maxCapacity' => $this->request->getPost('maxCapacity'),
            'maxCapacityMeasurement' => $this->request->getPost('maxCapacityMeasurement'),
            'minCapacity' => $this->request->getPost('minCapacity'),
            'minCapacityMeasurement' => $this->request->getPost('minCapacityMeasurement'),
            'readability' => $this->request->getPost('readability'),
            'readabilityMeasurement' => $this->request->getPost('readabilityMeasurement'),
            'startTemp' => $this->request->getPost('startTemp'),
            'endTemp' => $this->request->getPost('endTemp'),
            'aveTemp' => $this->request->getPost('aveTemp'),
            'startRh' => $this->request->getPost('startRh'),
            'endRh' => $this->request->getPost('endRh'),
            'AveRh' => $this->request->getPost('AveRh'),
            'weight' => $this->request->getPost('weight'),
            "premA"=> $this->request->getPost('premA'),
            "premB"=> $this->request->getPost('premB'),
            "premC"=> $this->request->getPost('premC'),
            "premD"=> $this->request->getPost('premD'),
            "premE"=> $this->request->getPost('premE'),
            "premF"=> $this->request->getPost('premF'),
            "premG"=> $this->request->getPost('premG'),            
            'repeat1' => $this->request->getPost('repeat1'),
            'repeat2' => $this->request->getPost('repeat2'),
            'repeat3' => $this->request->getPost('repeat3'),
            'repeat4' => $this->request->getPost('repeat4'),
            'repeat5' => $this->request->getPost('repeat5'),
            'repeat6' => $this->request->getPost('repeat6'),
            'repeat7' => $this->request->getPost('repeat7'),
            'repeat8' => $this->request->getPost('repeat8'),
            'repeat9' => $this->request->getPost('repeat9'),
            'repeat10' => $this->request->getPost('repeat10'),
            'stDev' => $this->request->getPost('stDev'),
            'stDevReal' => $this->request->getPost('stDevReal'),
            'remarksA' => $this->request->getPost('remarksA'),
            'remarksB' => $this->request->getPost('remarksB'),
            'remarksC' => $this->request->getPost('remarksC'),
            'remarksD' => $this->request->getPost('remarksD'),
            'remarksE' => $this->request->getPost('remarksE'),
            'remarksF' => $this->request->getPost('remarksF'),
            'calibratedBy' => $this->request->getPost('calibratedBy'),
            'encodedBy' => $this->request->getPost('encodedBy'),
            'checkedby' => $this->request->getPost('checkedby'),
            'eccentricityUnit' => $this->request->getPost('eccentricityUnit'),
            'eccentricity1Start' => $this->request->getPost('eccentricity1Start'),
            'eccentricity2' => $this->request->getPost('eccentricity2'),
            'eccentricity3' => $this->request->getPost('eccentricity3'),
            'eccentricity4' => $this->request->getPost('eccentricity4'),
            'eccentricity5' => $this->request->getPost('eccentricity5'),
            'eccentricity1End' => $this->request->getPost('eccentricity1End'),
            'error2' => $this->request->getPost('error2'),
            'error3' => $this->request->getPost('error3'),
            'error4' => $this->request->getPost('error4'),
            'error5' => $this->request->getPost('error5'),
            'error1' => $this->request->getPost('error1'),
            'error2View' => $this->request->getPost('error2View'),
            'error3View' => $this->request->getPost('error3View'),
            'error4View' => $this->request->getPost('error4View'),
            'error5View' => $this->request->getPost('error5View'),
            'error1View' => $this->request->getPost('error1View'),
            'load' => $this->request->getPost('load'),
            'errDiff' => $this->request->getPost('errDiff'),
            'illusA' => $this->request->getPost('illusA'),
            'illusB' => $this->request->getPost('illusB'),
            'linearityUnit' => $this->request->getPost('linearityUnit'),
            'convenMass1' => $this->request->getPost('convenMass1'),
            'indication1' => $this->request->getPost('indication1'),
            'linearError1' => $this->request->getPost('linearError1'),
            'expandedUncertain1' => $this->request->getPost('expandedUncertain1'),
            'k1' => $this->request->getPost('k1'),
            'uncertain1' => $this->request->getPost('uncertain1'),
            'mpe1' => $this->request->getPost('mpe1'),
            'convection1' => $this->request->getPost('convection1'),
            'class1' => $this->request->getPost('class1'),
            'convenMass2' => $this->request->getPost('convenMass2'),
            'indication2' => $this->request->getPost('indication2'),
            'linearError2' => $this->request->getPost('linearError2'),
            'expandedUncertain2' => $this->request->getPost('expandedUncertain2'),
            'k2' => $this->request->getPost('k2'),
            'uncertain2' => $this->request->getPost('uncertain2'),
            'mpe2' => $this->request->getPost('mpe2'),
            'convection2' => $this->request->getPost('convection2'),
            'class2' => $this->request->getPost('class2'),
            'convenMass3' => $this->request->getPost('convenMass3'),
            'indication3' => $this->request->getPost('indication3'),
            'linearError3' => $this->request->getPost('linearError3'),
            'expandedUncertain3' => $this->request->getPost('expandedUncertain3'),
            'k3' => $this->request->getPost('k3'),
            'uncertain3' => $this->request->getPost('uncertain3'),
            'mpe3' => $this->request->getPost('mpe3'),
            'convection3' => $this->request->getPost('convection3'),
            'class3' => $this->request->getPost('class3'),
            'convenMass4' => $this->request->getPost('convenMass4'),
            'indication4' => $this->request->getPost('indication4'),
            'linearError4' => $this->request->getPost('linearError4'),
            'expandedUncertain4' => $this->request->getPost('expandedUncertain4'),
            'k4' => $this->request->getPost('k4'),
            'uncertain4' => $this->request->getPost('uncertain4'),
            'mpe4' => $this->request->getPost('mpe4'),
            'convection4' => $this->request->getPost('convection4'),
            'class4' => $this->request->getPost('class4'),
            'convenMass5' => $this->request->getPost('convenMass5'),
            'indication5' => $this->request->getPost('indication5'),
            'linearError5' => $this->request->getPost('linearError5'),
            'expandedUncertain5' => $this->request->getPost('expandedUncertain5'),
            'k5' => $this->request->getPost('k5'),
            'uncertain5' => $this->request->getPost('uncertain5'),
            'mpe5' => $this->request->getPost('mpe5'),
            'convection5' => $this->request->getPost('convection5'),
            'class5' => $this->request->getPost('class5'),
            'convenMass6' => $this->request->getPost('convenMass6'),
            'indication6' => $this->request->getPost('indication6'),
            'linearError6' => $this->request->getPost('linearError6'),
            'expandedUncertain6' => $this->request->getPost('expandedUncertain6'),
            'k6' => $this->request->getPost('k6'),
            'uncertain6' => $this->request->getPost('uncertain6'),
            'mpe6' => $this->request->getPost('mpe6'),
            'convection6' => $this->request->getPost('convection6'),
            'class6' => $this->request->getPost('class6'),
            'convenMass7' => $this->request->getPost('convenMass7'),
            'indication7' => $this->request->getPost('indication7'),
            'linearError7' => $this->request->getPost('linearError7'),
            'expandedUncertain7' => $this->request->getPost('expandedUncertain7'),
            'k7' => $this->request->getPost('k7'),
            'uncertain7' => $this->request->getPost('uncertain7'),
            'mpe7' => $this->request->getPost('mpe7'),
            'convection7' => $this->request->getPost('convection7'),
            'class7' => $this->request->getPost('class7'),
            'convenMass8' => $this->request->getPost('convenMass8'),
            'indication8' => $this->request->getPost('indication8'),
            'linearError8' => $this->request->getPost('linearError8'),
            'expandedUncertain8' => $this->request->getPost('expandedUncertain8'),
            'k8' => $this->request->getPost('k8'),
            'uncertain8' => $this->request->getPost('uncertain8'),
            'mpe8' => $this->request->getPost('mpe8'),
            'convection8' => $this->request->getPost('convection8'),
            'class8' => $this->request->getPost('class8'),
            'linearLoad1' => $this->request->getPost('linearLoad1'),
            'linearLoad2' => $this->request->getPost('linearLoad2'),
            'linearLoad3' => $this->request->getPost('linearLoad3'),
            'linearLoad4' => $this->request->getPost('linearLoad4'),
            'linearLoad5' => $this->request->getPost('linearLoad5'),
            'linearLoad6' => $this->request->getPost('linearLoad6'),
            'linearLoad7' => $this->request->getPost('linearLoad7'),
            'linearLoad8' => $this->request->getPost('linearLoad8'),

            'markings1' => $this->request->getPost('mark1'),
            'markings2' => $this->request->getPost('mark2'),
            'markings3' => $this->request->getPost('mark3'),
            'markings4' => $this->request->getPost('mark4'),
            'markings5' => $this->request->getPost('mark5'),
            'markings6' => $this->request->getPost('mark6'),
            'markings7' => $this->request->getPost('mark7'),
            'markings8' => $this->request->getPost('mark8'),

            'convenMassG1' => $this->request->getPost('convenMassG1'),
            'convenMassG2' => $this->request->getPost('convenMassG2'),
            'convenMassG3' => $this->request->getPost('convenMassG3'),
            'convenMassG4' => $this->request->getPost('convenMassG4'),
            'convenMassG5' => $this->request->getPost('convenMassG5'),
            'convenMassG6' => $this->request->getPost('convenMassG6'),
            'convenMassG7' => $this->request->getPost('convenMassG7'),
            'convenMassG8' => $this->request->getPost('convenMassG8'),

            'repeatabilityValue' => $this->request->getPost('repeatabilityValue'),
            'repeatabilityUnit' => $this->request->getPost('repeatabilityUnit'),
        ];        
        $idOfCert = $this->request->getPost('idHere');
        $elect_calib_1->update($idOfCert,$data);
        return redirect()->to(base_url('guestElectTable'))->with('status', 'Data Updated Successfully!');
    }
    public function updateWord(){
        $elect_calib_1 = new ElectModel_1();
        $data = [
            'settingCalibrationProcedureAndTraceability' => $this->request->getPost('settingCalibrationProcedureAndTraceability'),
            'settingUncertaintyOfMeasurement' => $this->request->getPost('settingUncertaintyOfMeasurement'),
            'CalibrationResults' => $this->request->getPost('CalibrationResults'),
            'settingRemarks1' => $this->request->getPost('remarkHere'),            
        ];        
        $idOfCert = $this->request->getPost('idHere');
        $elect_calib_1->update($idOfCert,$data);
        return redirect()->to(base_url('editElect/'.$idOfCert))->with('status', 'Data Updated Successfully!');
    }

    public function delete($certificateNumber){
        $rml = new ElectModel_1();
        $imageTable = new ElectModel_image();
        $checkIfExisting = $rml->where('certificateNumber', $certificateNumber)->countAll(); 
        if($checkIfExisting > 0){
            $rml->where('certificateNumber', $certificateNumber)->delete(); 
            $imageTable->where('certificateNumber', $certificateNumber)->delete();
        }else{
            return redirect()->to( base_url('electTable'))->with('status', "ERROR: Certificate Number doesn't exists!");
        }
         
        return redirect()->to( base_url('electTable'))->with('status', 'Data Deleted Successfully!');
    }
   
}

//ELect
?>