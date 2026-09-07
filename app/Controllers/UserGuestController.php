<?php namespace App\Controllers;

//electController
use App\Models\ElectModel_1;
use App\Models\ElectModel_2;
use App\Models\ElectModel_3;
use App\Models\ElectModel_image;
use App\Models\UserModel;
use App\Models\UserGuestModel;

//thermo Controller
use App\Models\ThermoModel;
use App\Models\ThermoStandard;
use App\Models\ThermoModelImage;
use App\Models\ThermoStandardAddTestPointsModel;
use App\Models\ThermoStandardAddDriftModel;
use App\Models\ThermoStandardAddDriftPRTModel;
use App\Models\ThermoChamberModel;

use App\Models\TestWeightModel;
use App\Models\TestWeightStandardDetailsModel;
use App\Models\TestWeightStandardValuesModel;
use App\Models\TestWeightSensitivityTestModel;
use App\Models\TestWeightPABModel;
use App\Models\TestWeightMPEModel;
use App\Models\TestWeightAlloyModel;

use Dompdf\Options; 
use App\Models\CustomersModel;
use App\Models\VerifierModel;
use App\Models\PersonnelModel;
use App\Models\Defaults;
use App\Models\About;

class UserGuestController extends BaseController
{
    
    public function __construct(){
		helper(['url', 'form']);
        
	}

    //guest login
	public function guestLogin()
	{
        $data = [];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]|validateUserGuest[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUserGuest' => "Email or Password don't match",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

                return view('GuestUser/guestLogin', [
                    "validation" => $this->validator,
                ]);

            } else {
                $model = new UserGuestModel();

                $user = $model->where('email', $this->request->getVar('email'))
                    ->first();

                // Storing session values
                $this->setUserSession($user);
                // Redirecting to dashboard after login
                return redirect()->to(base_url('dashboard'));

            }
        }
        return view('GuestUser/guestLogin');
    }

    
    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'name' => $user['name'],
            'phone_no' => $user['phone_no'],
            'email' => $user['email'],
           // 'profile_image' => $user['profile_image'],
            'isLoggedIn' => true,
            'role' => $user['role'],
        ];

        session()->set($data);
        return true;
    }
    //user dashboard
	public function guestDashboard(){

    //to check if user is logged in
        if (session()->get('role') != "user") {
            echo 'Access denied!';
            exit;
        }

        $data = [];
        $model = new UserGuestModel();
        $data['user'] = $model->where('id', session()->get('id'))->first();
		return view('GuestUser/guestDashboard' , $data);
	}

    //userAddElectView
	public function guestAddElect(){

         //to check if user is logged in
         if (session()->get('role') != "user") {
            echo 'Access denied!';
            exit;
        }
        $data = [];
        $VerifierModel = new VerifierModel();
        $PersonnelModel = new PersonnelModel();
        $data['verifier'] = $VerifierModel->findAll();
        $data['personnel'] = $PersonnelModel->findAll();
		return view('GuestUser/Elect/addElect', $data);
	}

    //userPrinting of elect
	public function guestPrintElect(){

         //to check if user is logged in
         if (session()->get('role') != "user") {
            echo 'Access denied!';
            exit;
        }
        $elect_calib_1 = new ElectModel_1();
		if($this->request->getGet('q')){
			$q=$this->request->getGet('q');
			$data['elect_table_1'] = $elect_calib_1->where('certificateNumber', $q)->findAll();
		}else{
			$data['elect_table_1'] = $elect_calib_1->findAll();
		}
        return view('GuestUser/Elect/printElect',  $data);
    
        
	}

    //user guest elect table
	public function guestElectTable(){

         //to check if user is logged in
         if (session()->get('role') != "user") {
            echo 'Access denied!';
            exit;
        }
        $elect_calib_1 = new ElectModel_1();
        $VerifierModel = new VerifierModel();
        $PersonnelModel = new PersonnelModel();
        $data['verifier'] = $VerifierModel->findAll();
        $data['personnel'] = $PersonnelModel->findAll();
        $data['elect_table_1'] = $elect_calib_1->where('calibratorAccountID',session()->get('id'))->findAll();
    
        $model = new UserModel();
      #  $data['user'] = $model->where('id', session()->get('id'))->first();
        return view('GUestUser/Elect/guestElectTable',  $data);
    }

    //user preview elect
	public function viewPrint($id, $verify = null){
        //to check if user is logged in
         if (session()->get('role') != "user") {
            echo 'Access denied!';
            exit;
        }
        $rml = new ElectModel_1();
        $data['elect_table_1'] = $rml->where('id', $id)->first(); 
        $data['forVerification'] = $verify;
        return view('GuestUser/Elect/guestViewPrint', $data);
    
	}

    //User print to pdf
	function userElectToPdf($id){
        if (session()->get('role') != "user") {
            echo 'Access denied!';
            exit;
        }
        $rml = new ElectModel_1();
        $html = $_POST['chart_input'] ;
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $data['elect_table_1'] = $rml->where('id', $id)->first();
        $data["img"] = ["image"=>$html];
        $data['datePrev'] = $this->request->getPost('datePrevDown');
        $data['imageDraft'] = $this->request->getPost('imageDraft');
        $certNumberDown = $this->request->getPost('certNumberDown');
        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('GuestUser/Elect/electCertificate', $data));
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        //$dompdf->stream('Single Range Electronic Balance Certificate #'.$id.".pdf",array("Attachment" => 1 ));
        $dompdf->stream('Certificate No.'.$certNumberDown.".pdf",array("Attachment" => 1));
  
    }

    function htmlToPDFPreview($id){
        if (session()->get('role') != "user") {
            echo 'Access denied!';
            exit;
        }
        $rml = new ElectModel_1();
        $html =  $_POST['chart_input'] ;
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $data['elect_table_1'] = $rml->where('id', $id)->first();
        $data["img"] = ["image"=>$html];
        $data['datePrev'] = $this->request->getPost('datePrev');
        $data['imageDraft'] = $this->request->getPost('imageDraft');
        $certNumberPrev = $this->request->getPost('certNumberPrev');
        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('GuestUser/Elect/electCertificate', $data));
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Certificate No.'.$certNumberPrev.".pdf",array("Attachment" => 0));
    }

    
    function htmlToDraft($id){
        $rml = new ElectModel_1();
        $html =  $_POST['chart_input'] ;
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $data['elect_table_1'] = $rml->where('id', $id)->first();
        $data["img"] = ["image"=>$html];
        $data['datePrev'] = $this->request->getPost('datePrev');
        $data['imageDraft'] = $this->request->getPost('imageDraft');
        $certNumberPrev = $this->request->getPost('certNumberDraft');
        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('GuestUser/Elect/electCertificate', $data));
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Draft '.$certNumberPrev.".pdf",array("Attachment" => 1));
    }   
    //printHangingElectPDF

    function htmlToPDFHanging($id){
        $rml = new ElectModel_1();
        $html = $_POST['chart_input'] ;
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $data['elect_table_1'] = $rml->where('id', $id)->first();
        $data["img"] = ["image"=>$html];
        $data['datePrev'] = $this->request->getPost('datePrevDown');
        $data['imageDraft'] = $this->request->getPost('imageDraft');
        $certNumberDown = $this->request->getPost('certNumberDown');
        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('GuestUser/Elect/electCertificate', $data));
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        //$dompdf->stream('Single Range Electronic Balance Certificate #'.$id.".pdf",array("Attachment" => 1 ));
        $dompdf->stream('Certificate No.'.$certNumberDown.".pdf",array("Attachment" => 1));
    }

    //previewHanging PDF
    function htmlToPDFPreviewHanging($id){
        $rml = new ElectModel_1();
        $html =  $_POST['chart_input'] ;
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $data['elect_table_1'] = $rml->where('id', $id)->first();
        $data["img"] = ["image"=>$html];
        $data['datePrev'] = $this->request->getPost('datePrev');
        $data['imageDraft'] = $this->request->getPost('imageDraft');
        $certNumberPrev = $this->request->getPost('certNumberPrev');
        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('GuestUser/Elect/electCertificate', $data));
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Certificate No.'.$certNumberPrev.".pdf",array("Attachment" => 0));
    }

    //draftHangingPDF
    function htmlToDraftHanging($id){
        $rml = new ElectModel_1();
        $html =  $_POST['chart_input'] ;
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $data['elect_table_1'] = $rml->where('id', $id)->first();
        $data["img"] = ["image"=>$html];
        $data['datePrev'] = $this->request->getPost('datePrev');
        $data['imageDraft'] = $this->request->getPost('imageDraft');
        $certNumberPrev = $this->request->getPost('certNumberDraft');
        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('GuestUser/Elect/electCertificate', $data));
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Draft '.$certNumberPrev.".pdf",array("Attachment" => 1));
    }

  

    //user insert elect image
    public function ElectImageStore(){
        $electImageTable = new ElectModel_image();
        $data = [
            'certificateNumber' => $this->request->getPost('certificateNumber'),
            'image' => $this->request->getFile('image')
        ];
        $electImageTable->insert($data);
       return $this->table();
    }

    //User pab logo update in elect
    public function PabLogoUpdate(){
        $elect_calib_3 = new ElectModel_1();
        $data = [
            'PabLogo' => $this->request->getPost('pablogoValue'),
        ];
        $ID = $this->request->getPost('id');
        $elect_calib_3->update($ID,$data);
        return redirect()->to(base_url('editElect/'.$ID))->with('status', 'Data Updated Successfully!');
    }

    //user storing elect
    public function guestStore(){
        $elect_calib_1 = new ElectModel_1();
        $electImageTable = new ElectModel_image();
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
            $electImageTable->save($dataImage);
        }
        
        $elect_calib_1->insert($data);
        return redirect()->to(base_url('guestElectTable'))->with('status', 'Data Added Successfully!');
    }

    public function checkElectCertNum(){
        $rml = new ElectModel_1();
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

    //elect

    //guestThermo input view
    public function guestAddThermo(){

         //to check if user is logged in
         if (session()->get('role') != "user") {
            echo 'Access denied!';
            exit;
        }

        $data = [];
        $VerifierModel = new VerifierModel();
        $PersonnelModel = new PersonnelModel();
        $ThermoModel = new ThermoModel();
        $data['verifier'] = $VerifierModel->findAll();
        $data['personnel'] = $PersonnelModel->findAll();
        $data['ThermoData'] = $ThermoModel->select('id')->select('certificateNumber')->orderBy('id', 'DESC')->findAll();
     
        return view('GuestUser/Thermo/thermoAdd', $data);
    }

    // user adding thermo data
    public function guestThermoAddData(){
        $model = new ThermoModel();
        $ImageTable = new ThermoModelImage();
        $data = [
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
        return redirect()->to(base_url('thermoTable'))->with('status', 'Data Added Successfully!');
    }

    
    //user guest thermo table
    public function guestThermoTable(){

         //to check if user is logged in
         if (session()->get('role') != "user") {
            echo 'Access denied!';
            exit;
        }
        $thermo = new ThermoModel();
        $data['thermoData'] = $thermo->findAll();
        $model = new UserModel();
        $data['user'] = $model->where('id', session()->get('id'))->first();

        return view('GuestUser/Thermo/thermoGuestTable',  $data);
    }

    //guestThermo

    //guestTestweight
    //guest test weight input view
    public function guestTestWeightInputView(){
         //to check if user is logged in
         if (session()->get('role') != "user") {
            echo 'Access denied!';
            exit;
        }
        $data = [];
        $VerifierModel = new VerifierModel();
        $PersonnelModel = new PersonnelModel();
        $data['verifier'] = $VerifierModel->findAll();
        $data['personnel'] = $PersonnelModel->findAll();
        return view('GuestUser/TestWeight/guestTestWeightInputView', $data);
    }

    //guest test weight table
    public function guestTestWeightTable(){
         //to check if user is logged in
         if (session()->get('role') != "user") {
            echo 'Access denied!';
            exit;
        }
        $TestWeightModel = new TestWeightModel();
        $data['TestWeightData'] = $TestWeightModel->findAll();
        $model = new UserModel();
        $data['user'] = $model->where('id', session()->get('id'))->first();

        return view('GuestUser/TestWeight/guestTestWeightTable',  $data);
    }

    //pending table
    public function pendingTable(){
        $model = new UserModel();
        $ElectModel_1 = new ElectModel_1();
        $ThermoModel = new ThermoModel();
        $TestWeightModel = new TestWeightModel();
        $toFilter = ['Complete', 'Not Completed', 'For printing'];
        $data['user'] = $model->where('id', session()->get('id'))->first();
        $data['forverification'][0] = $ElectModel_1->whereNotIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
        $data['forverification'][1] = $ThermoModel->whereNotIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
        $data['forverification'][2] = $TestWeightModel->whereNotIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
        return view('GuestUser/pendingTable', $data);
       }

       //profile
       
    public function profile()
    {
        //to check if user is logged in
        if (session()->get('role') != "user") {
            echo 'Access denied!';
            exit;
        }
        $data = [];
        $model = new UserGuestModel();

        $data['user'] = $model->where('id', session()->get('id'))->first();
        return view('GuestUser/guestProfile', $data);
    }

    public function about(){
        $data = [];
        $model = new About();
        $data['about'] = $model->findAll();
        return view('GuestUser/guestAbout', $data);
    }

}
