<?php namespace App\Controllers;

use App\Models\ElectModel_image;

use App\Models\UserModel;
use App\Models\VerifierModel;
use App\Models\PersonnelModel;
use App\Models\DigitalTimerModel;
use App\Models\TimerStandardModel;
use Dompdf\Options; 

class TempControlController extends BaseController
{
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

       return view('TemperatureController/TempControllerInputView',$data);
    }

    public function store(){
        if ($this->request->getMethod() == 'post') {
            //let's do the validation here
            $rules = [
                'certificateNumber' => 'required|min_length[3]|is_unique[digitaltimertable.certificateNumber]',
            ];

            if (!$this->validate($rules)) {
                $data = [];
                $model = new DigitalTimerModel();
           //     $data['user'] = $model->where('id', session()->get('id'))->first();
                return view('DigitalTimer/DigitalTimerView', [
                    "validation" => $this->validator,
                ]);
            } else {
        $model = new DigitalTimerModel();
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

            
            'obsPeriod1' => $this->request->getPost('obsPeriod1'),
            'obsPeriod2' => $this->request->getPost('obsPeriod2'),

            'std1' => $this->request->getPost('std1'),
            'uuc1' => $this->request->getPost('uuc1'),
            'hst1' => $this->request->getPost('hst1'),
            'stdOb1' => $this->request->getPost('stdOb1'),
            'uucOb1' => $this->request->getPost('uucOb1'),
            'std2' => $this->request->getPost('std2'),
            'uuc2' => $this->request->getPost('uuc2'),
            'hst2' => $this->request->getPost('hst2'),
            'stdOb2' => $this->request->getPost('stdOb2'),
            'uucOb2' => $this->request->getPost('uucOb2'),
            'std3' => $this->request->getPost('std3'),
            'uuc3' => $this->request->getPost('uuc3'),
            'hst3' => $this->request->getPost('hst3'),
            'stdOb3' => $this->request->getPost('stdOb3'),
            'uucOb3' => $this->request->getPost('uucOb3'),
            'std4' => $this->request->getPost('std4'),
            'uuc4' => $this->request->getPost('uuc4'),
            'hst4' => $this->request->getPost('hst4'),
            'stdOb4' => $this->request->getPost('stdOb4'),
            'uucOb4' => $this->request->getPost('uucOb4'),
            'std5' => $this->request->getPost('std5'),
            'uuc5' => $this->request->getPost('uuc5'),
            'hst5' => $this->request->getPost('hst5'),
            'stdOb5' => $this->request->getPost('stdOb5'),
            'uucOb5' => $this->request->getPost('uucOb5'),

            'std6' => $this->request->getPost('std6'),
            'uuc6' => $this->request->getPost('uuc6'),
            'hst6' => $this->request->getPost('hst6'),
            'stdOb6' => $this->request->getPost('stdOb6'),
            'uucOb6' => $this->request->getPost('uucOb6'),

            'std7' => $this->request->getPost('std7'),
            'uuc7' => $this->request->getPost('uuc7'),
            'hst7' => $this->request->getPost('hst7'),
            'stdOb7' => $this->request->getPost('stdOb7'),
            'uucOb7' => $this->request->getPost('uucOb7'),

            'std8' => $this->request->getPost('std8'),
            'uuc8' => $this->request->getPost('uuc8'),
            'hst8' => $this->request->getPost('hst8'),
            'stdOb8' => $this->request->getPost('stdOb8'),
            'uucOb8' => $this->request->getPost('uucOb8'),

            'std9' => $this->request->getPost('std9'),
            'uuc9' => $this->request->getPost('uuc9'),
            'hst9' => $this->request->getPost('hst9'),
            'stdOb9' => $this->request->getPost('stdOb9'),
            'uucOb9' => $this->request->getPost('uucOb9'),

            'std10' => $this->request->getPost('std10'),
            'uuc10' => $this->request->getPost('uuc10'),
            'hst10' => $this->request->getPost('hst10'),
            'stdOb10' => $this->request->getPost('stdOb10'),
            'uucOb10' => $this->request->getPost('uucOb10'),
        
            'hstAve' => $this->request->getPost('hstAve'),
            'stdAve' => $this->request->getPost('stdAve'),
            'uucAve' => $this->request->getPost('uucAve'),
            'esdm' => $this->request->getPost('esdm'),
            
            'uucReso' => $this->request->getPost('uucReso'),
            'resnSTd' => $this->request->getPost('resnSTd'),
            'prevYear' => $this->request->getPost('prevYear'),
            'uncerPrevYear' => $this->request->getPost('uncerPrevYear'),
            'presentYear' => $this->request->getPost('presentYear'),
            'uncerPresentYear' => $this->request->getPost('uncerPresentYear'),
            'driftt' => $this->request->getPost('driftt'),
            'correctionPresYear' => $this->request->getPost('correctionPresYear'),
            'stdUncen' => $this->request->getPost('stdUncen'),
            'driftStd' => $this->request->getPost('driftStd'),
            'uncStd' => $this->request->getPost('uncStd'),
            'uncUuc' => $this->request->getPost('uncUuc'),
            'hstBias' => $this->request->getPost('hstBias'),
            'repeatabilityEsdm' => $this->request->getPost('repeatabilityEsdm'),
            'combinedUnc' => $this->request->getPost('combinedUnc'),
            'expUncer' => $this->request->getPost('expUncer'),
            'stdUsed' => $this->request->getPost('stdUsed'),



            'remarksA' => $this->request->getPost('remarksA'),
            'remarks' => $this->request->getPost('remarksF'),
            'calibratedBy' => $this->request->getPost('calibratedBy'),
            'encodedBy' => $this->request->getPost('encodedBy'),
            'checkedby' => $this->request->getPost('checkedby'),

            
            'calibratorAccountEmail' => $this->request->getPost('calibratorAccountEmail'),
            'calibratorAccountID' => $this->request->getPost('calibratorAccountID'),
            'verifierEmail' => $this->request->getPost('verifierEmail'),
            // 'comment' => $this->request->getPost('comment'),
            
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
        $model->insert($data);
        return redirect()->to(base_url('digitalTimerInputView'))->with('status', 'Data Added Successfully!');
    }}}


    public function timerTable(){
        $timer = new DigitalTimerModel();
        $data['timerData'] = $timer->findAll();
        $model = new UserModel();
        $data['user'] = $model->where('id', session()->get('id'))->first();

        return view('DigitalTimer/TimerTable',  $data);
    }

    public function editTimer($id, $verify = null){
        $rml = new DigitalTimerModel();
        $data['timerData'] = $rml->where('id', $id)->first(); 
        $data['forVerification'] = $verify;
        if($verify == 'forVerification'){
            $dataToUpdate = [
                'completion' => 'On-going verification'
            ]; 
            $rml->update($id,$dataToUpdate);
        }
        return view('DigitalTimer/editTimer', $data);
    }

    public function timerUpdate($id, $verify = null){
        $VerifierModel = new VerifierModel();
        $PersonnelModel = new PersonnelModel();
        $data['verifier'] = $VerifierModel->findAll();
        $data['personnel'] = $PersonnelModel->findAll();
        $rml = new DigitalTimerModel();
        $data['digitaltimertable'] = $rml->where('id', $id)->first(); 
        $data['forVerification'] = $verify;
        $model = new UserModel();
        $data['user'] = $model->where('id', session()->get('id'))->first();
        return view('DigitalTimer/DigitalTimerInputEdit', $data);
    }

    public function timerUpdateData(){
        $timer = new DigitalTimerModel();
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

            
            'std1' => $this->request->getPost('std1'),
            'uuc1' => $this->request->getPost('uuc1'),
            'hst1' => $this->request->getPost('hst1'),
            'stdOb1' => $this->request->getPost('stdOb1'),
            'uucOb1' => $this->request->getPost('uucOb1'),
            'std2' => $this->request->getPost('std2'),
            'uuc2' => $this->request->getPost('uuc2'),
            'hst2' => $this->request->getPost('hst2'),
            'stdOb2' => $this->request->getPost('stdOb2'),
            'uucOb2' => $this->request->getPost('uucOb2'),
            'std3' => $this->request->getPost('std3'),
            'uuc3' => $this->request->getPost('uuc3'),
            'hst3' => $this->request->getPost('hst3'),
            'stdOb3' => $this->request->getPost('stdOb3'),
            'uucOb3' => $this->request->getPost('uucOb3'),
            'std4' => $this->request->getPost('std4'),
            'uuc4' => $this->request->getPost('uuc4'),
            'hst4' => $this->request->getPost('hst4'),
            'stdOb4' => $this->request->getPost('stdOb4'),
            'uucOb4' => $this->request->getPost('uucOb4'),
            'std5' => $this->request->getPost('std5'),
            'uuc5' => $this->request->getPost('uuc5'),
            'hst5' => $this->request->getPost('hst5'),
            'stdOb5' => $this->request->getPost('stdOb5'),
            'uucOb5' => $this->request->getPost('uucOb5'),

            'std6' => $this->request->getPost('std6'),
            'uuc6' => $this->request->getPost('uuc6'),
            'hst6' => $this->request->getPost('hst6'),
            'stdOb6' => $this->request->getPost('stdOb6'),
            'uucOb6' => $this->request->getPost('uucOb6'),

            'std7' => $this->request->getPost('std7'),
            'uuc7' => $this->request->getPost('uuc7'),
            'hst7' => $this->request->getPost('hst7'),
            'stdOb7' => $this->request->getPost('stdOb7'),
            'uucOb7' => $this->request->getPost('uucOb7'),

            'std8' => $this->request->getPost('std8'),
            'uuc8' => $this->request->getPost('uuc8'),
            'hst8' => $this->request->getPost('hst8'),
            'stdOb8' => $this->request->getPost('stdOb8'),
            'uucOb8' => $this->request->getPost('uucOb8'),

            'std9' => $this->request->getPost('std9'),
            'uuc9' => $this->request->getPost('uuc9'),
            'hst9' => $this->request->getPost('hst9'),
            'stdOb9' => $this->request->getPost('stdOb9'),
            'uucOb9' => $this->request->getPost('uucOb9'),

            'std10' => $this->request->getPost('std10'),
            'uuc10' => $this->request->getPost('uuc10'),
            'hst10' => $this->request->getPost('hst10'),
            'stdOb10' => $this->request->getPost('stdOb10'),
            'uucOb10' => $this->request->getPost('uucOb10'),
        
            'hstAve' => $this->request->getPost('hstAve'),
            'stdAve' => $this->request->getPost('stdAve'),
            'uucAve' => $this->request->getPost('uucAve'),
            'esdm' => $this->request->getPost('esdm'),
            
            'uucReso' => $this->request->getPost('uucReso'),
            'resnSTd' => $this->request->getPost('resnSTd'),
            'prevYear' => $this->request->getPost('prevYear'),
            'uncerPrevYear' => $this->request->getPost('uncerPrevYear'),
            'presentYear' => $this->request->getPost('presentYear'),
            'uncerPresentYear' => $this->request->getPost('uncerPresentYear'),
            'driftt' => $this->request->getPost('driftt'),
            'correctionPresYear' => $this->request->getPost('correctionPresYear'),
            'stdUncen' => $this->request->getPost('stdUncen'),
            'driftStd' => $this->request->getPost('driftStd'),
            'uncStd' => $this->request->getPost('uncStd'),
            'uncUuc' => $this->request->getPost('uncUuc'),
            'hstBias' => $this->request->getPost('hstBias'),
            'repeatabilityEsdm' => $this->request->getPost('repeatabilityEsdm'),
            'combinedUnc' => $this->request->getPost('combinedUnc'),
            'expUncer' => $this->request->getPost('expUncer'),
            'stdUsed' => $this->request->getPost('stdUsed'),



            'remarksA' => $this->request->getPost('remarksA'),
            'remarks' => $this->request->getPost('remarksF'),
            'calibratedBy' => $this->request->getPost('calibratedBy'),
            'encodedBy' => $this->request->getPost('encodedBy'),
            'checkedby' => $this->request->getPost('checkedby'),

            
            'calibratorAccountEmail' => $this->request->getPost('calibratorAccountEmail'),
            'calibratorAccountID' => $this->request->getPost('calibratorAccountID'),
            'verifierEmail' => $this->request->getPost('verifierEmail'),
            // 'comment' => $this->request->getPost('comment'),
            
        ];
        $idOfCert = $this->request->getPost('idHere');
        $completion = $this->request->getPost('completion');
        $timer->update($idOfCert,$data);
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
        if($completion == 'For printing'){
            return redirect()->to(base_url('forVerifyTable'))->with('status', 'Data Verified!');
        }else{
            return redirect()->to(base_url('timerTable'))->with('status', 'Data Updated Successfully!');
        }
    }
    
       

    public function timerDelete($certificateNumber){
        $rml = new DigitalTimerModel();
        // $imageTable = new ElectModel_image();
        $rml->where('id', $certificateNumber)->delete(); 
        // $imageTable->where('certificateNumber', $certificateNumber)->delete(); 
        return redirect()->to( base_url('timerTable'))->with('status', 'Data Deleted Successfully!');
    }

    public function updateVerify(){
        $rml = new DigitalTimerModel();
        $data = [
            'completion' => $this->request->getPost('completion'),
        ];        
        $idOfCert = $this->request->getPost('idVerify');
        $rml->update($idOfCert,$data);
        return redirect()->to(base_url('forVerifyTable'))->with('status', 'Data Validated!');
    }

    public function updateCorrection(){
        $rml = new DigitalTimerModel();
        $data = [
            'completion' => $this->request->getPost('completion'),
        ];        
        $idOfCert = $this->request->getPost('idCorrection');
        $rml->update($idOfCert,$data);
        return redirect()->to(base_url('forVerifyTable'))->with('status', 'Data for Correction!');
    }

    public function PabLogoUpdate(){
        $rml = new DigitalTimerModel();
        $data = [
            'PabLogo' => $this->request->getPost('pablogoValue'),
        ];
        $ID = $this->request->getPost('id');
        $rml->update($ID,$data);
        return redirect()->to(base_url('timerEdit/'.$ID))->with('status', 'Data Updated Successfully!');
    }

    public function updateWord(){
        $DigitalTimerModel = new DigitalTimerModel();
        $data = [
            'settingCalibrationProcedureAndTraceability' => $this->request->getPost('settingCalibrationProcedureAndTraceability'),
            'settingUncertaintyOfMeasurement' => $this->request->getPost('settingUncertaintyOfMeasurement'),
            'CalibrationResults' => $this->request->getPost('CalibrationResults'),
            'settingRemarks1' => $this->request->getPost('remarkHere'),
        ];        
        $idOfCert = $this->request->getPost('idHere');
        $DigitalTimerModel->update($idOfCert,$data);
        return redirect()->to(base_url('timerEdit/'.$idOfCert))->with('status', 'Data Updated Successfully!');
    }
    
    public function standardTable(){
        $timer_standard = new TimerStandardModel();
        $data['timer_standard'] = $timer_standard->findAll();
        //echo view('templates/header');
        $model = new UserModel();
        $data['user'] = $model->where('id', session()->get('id'))->first();

        if($this->request->getGet('q')){
			$q=$this->request->getGet('q');
			$data['timer_standard'] = $timer_standard->where('serialNumber', $q)->findAll();
		}else{
			$data['timer_standard'] = $timer_standard->findAll();
		}
        return view('DigitalTimer/DigitalTimerStandardTable', $data);

        //$elect_calib_1 = new ElectModel_1();
    }
    public function standardTableEdit($id){
        $rml = new TimerStandardModel();
        $data['timer_standard'] = $rml->where('id', $id)->first(); 
        $data["snID"] = ["id"=>$id];
        #echo view('templates/header');
        return view('DigitalTimer/DigitalTimerStandardEdit', $data);
    }

    public function standardTableUpdateInfo(){
        $TimerStandardModel = new TimerStandardModel();
        $data = [
            'description' => $this->request->getPost('description'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'certificateNumber'	=> $this->request->getPost('certificateNumber'),
            'calibrationProvider' => $this->request->getPost('calibrationProvider'),
            'dateOfCali' => $this->request->getPost('dateOfCali'),
            'dateOfNextCali' => $this->request->getPost('dateOfNextCali'),
            'manufacturer' => $this->request->getPost('manufacturer'),
            'modelNumber' => $this->request->getPost('modelNumber'),
        ];
        $table2Id = $this->request->getPost('idTable2');
        $TimerStandardModel->update($table2Id,$data);
        #echo view('templates/header');
        return redirect()->to(base_url('timerStandardEdit/'.$table2Id));
    }
    public function standardTableAddNew(){
        #echo view('templates/header');
        return view('SingleRangeElectronicBalance/SRElectronicStandardAddNew');
    }
    public function standardTableAddNewDetails(){
        
        helper(['form', 'url']);
         
        $val = $this->validate([
            'dateCalibrated' => 'required',
            'frequency' => 'required',
            'deviation'  => 'required',
            'uncertainty' => 'required',
        ]);
 
        $model = new TimerStandardModel();
 
        if (!$val)
        {
 
            echo view('SingleRangeElectronicBalance/SRElectronicStandardAddNew', [
                   'validation' => $this->validator
            ]);
 
        }
        else
        { 
            $model->save([
            'description' => $this->request->getPost('description'),
            'manufacturer' => $this->request->getPost('manufacturer'),
            'type' => $this->request->getPost('class'),
            'class' => $this->request->getPost('type'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'dateOfCalibration' => $this->request->getPost('dateOfCali'),
            'calibrationProvider' => $this->request->getPost('calibrationProvider'),
            'prevAirDensity' => $this->request->getPost('prevAirDensity'),
       ]);
 
            return redirect()->to(base_url('electStandard'))->with('status', 'Data Added Successfully!');
   
    }
       /*
        $data = [
            'description' => $this->request->getPost('description'),
            'manufacturer' => $this->request->getPost('manufacturer'),
            'type' => $this->request->getPost('class'),
            'class' => $this->request->getPost('type'),
            'serialNumber' => $this->request->getPost('serialNumber'),
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'dateOfCalibration' => $this->request->getPost('dateOfCali'),
            'calibrationProvider' => $this->request->getPost('calibrationProvider'),
        ]; 
        $elect_calib_2->insert($data); */
      //  return redirect()->to(base_url('electStandard'))->with('status', 'Data Added Successfully!');
    }
    public function standardTableStore(){
        $elect_calib_3 = new ElectModel_3();
        $data = [
            'serialNumber' => $this->request->getPost('serialNumber'),
            'type' => $this->request->getPost('type'),
            'nominalValue' => $this->request->getPost('nominalValue'),
            'nominalUnit' => $this->request->getPost('nominalUnit'),
            'marking' => $this->request->getPost('marking'),
            'conventionalMass' => $this->request->getPost('conventionalMass'),
            'unit' => $this->request->getPost('unit'),
            'uncertainty' => $this->request->getPost('uncertainty'),
            'mpe' => $this->request->getPost('mpe'),
            'calibrationProvider' => $this->request->getPost('calibrationProvider'),
            'standardID' => $this->request->getPost('standardID'),
        ];
        $elect_calib_3->insert($data);
        $table2Id = $this->request->getPost('idTable2');
        #echo view('templates/header');
       return $this->standardTableEdit($table2Id);
    }

 

    function htmlToPDF($id){
        $rml = new DigitalTimerModel();
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $data['timerData'] = $rml->where('id', $id)->first();
        $data['page'] = $this->request->getPost('pagerDown');
        $data['datePrev'] = $this->request->getPost('datePrevDown');
       
        $data['imageDraft'] = $this->request->getPost('imageDraftDown');

        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('DigitalTimer/CalibrationCertificateTimer', $data));
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream($data['timerData']['certificateNumber']." - ".$data['timerData']['equipmentDescription']." - ".$data['timerData']['calibratedBy'].".pdf",array("Attachment" => 1 ));
    }

    function htmlToPDFPreview($id){
        $rml = new DigitalTimerModel();
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $data['timerData'] = $rml->where('id', $id)->first();
        $data['page'] = $this->request->getPost('pagerPrev');
        $data['datePrev'] = $this->request->getPost('datePrev');
       
        $data['imageDraft'] = 'false';

        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('DigitalTimer/CalibrationCertificateTimer', $data));
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream('DigitalTimer Certificate #'.$id.".pdf",array("Attachment" => 0));
    }

    function htmlToPDFFullScreen($id){
        $rml = new DigitalTimerModel();
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $data['timerData'] = $rml->where('id', $id)->first();
        $data['page'] = $this->request->getPost('pagerFull');
        $data['datePrev'] = $this->request->getPost('datePrevFull');
      
        $data['imageDraft'] = 'false';

        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('DigitalTimer/CalibrationCertificateTimer', $data));
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream('DigitalTimer Certificate #'.$id.".pdf",array("Attachment" => 0));
    }
}

?>