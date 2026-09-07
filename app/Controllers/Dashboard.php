<?php

namespace App\Controllers;
use App\Models\UserModel;

use App\Controllers\BaseController;

use App\Models\ElectModel_1;

use App\Models\ElectronicBalanceModel;
use App\Models\ThermoModel;
use App\Models\TestWeightModel;
use App\Models\WeighingScaleModel;
use App\Models\DigitalThermometerModel;
use App\Models\DigitalTimerModel;
use App\Models\PressureGaugeModel;
use App\Models\PHMeterModel;
use App\Models\GlasswareModel;
use App\Models\TemperatureControllModel;
use App\Models\EnclosureModel;
use App\Models\RefractometerModel;
use App\Models\CaliperModel;
use App\Models\ElectricalMetersModel;

class Dashboard extends BaseController
{

    protected $table = 'elect_table_1';
    protected $table2 = 'thermotable';
    protected $table3 = 'testweighttable';
    protected $table4 = 'tbl_users_guest';
    protected $table5 = 'elect_table_2';
    protected $table6 = 'thermostandardtable';
    protected $table7 = 'testweightstandarddetails';
    protected $table8 = 'tbl_users';
    //protected $table = 'elect_table_1';
	private $db;

	public function __construct(){
		$this->db = \Config\Database::connect();
        
        //to check if admin is logged in
        // if (session()->get('role') != "admin") {
        //     echo 'Access denied!';
        //     exit;
        // }
	}
     
    public function index(){
        $data = [];
        $model = new UserModel();
        $data['tbl_users'] = $model->findAll();
        $data['user'] = $model->where('id', session()->get('id'))->first();

        $db = \Config\Database::connect();
        $builder = $db->table('elect_table_1');
        $query = $builder->select("COUNT(DISTINCT(id)) as s, (dateCalibrated) as day");
        $query = $builder->where("(dateCalibrated) GROUP BY (dateCalibrated)")->get();
        $record = $query->getResult();
        $inputs = [];
        foreach($record as $row) {
            $inputs[] = array(
                'day'   => $row->day,   
                'name' => intval($row->s)
            );
        }
        
        
		$data['count'] = $this->db->table($this->table)->countAllResults();
		$data['count2'] = $this->db->table($this->table2)->countAllResults();
		$data['count3'] = $this->db->table($this->table3)->countAllResults();
		$data['count4'] = $this->db->table($this->table4)->countAllResults();
        $data['count5'] = $this->db->table($this->table5)->countAllResults();
		$data['count6'] = $this->db->table($this->table6)->countAllResults();
		$data['count7'] = $this->db->table($this->table7)->countAllResults();
		$data['count8'] = $this->db->table($this->table8)->countAllResults();
        $data['inputs'] = ($inputs);    
         
      return view('dashboardAdmin',$data);
    }

   
    public function profile(){
        $model = new UserModel();
        $data['user'] = $model->where('id', session()->get('id'))->first();
        return view('Profile', $data);
   }

   public function forVerifyTable(){
    $model = new UserModel();

    $ElectronicBalanceModel = new ElectronicBalanceModel();
    $ThermoModel = new ThermoModel();
    $TestWeightModel = new TestWeightModel();
    $WeighingScaleModel = new WeighingScaleModel();
    $DigitalThermometerModel = new DigitalThermometerModel();
    $DigitalTimerModel = new DigitalTimerModel();
    $PressureGaugeModel = new PressureGaugeModel();
    $PHMeterModel = new PHMeterModel();
    $GlasswareModel = new GlasswareModel();
    $TemperatureControllModel = new TemperatureControllModel();
    $EnclosureModel = new EnclosureModel();
    $RefractometerModel = new RefractometerModel();
    $CaliperModel = new CaliperModel();
    $ElectricalMetersModel = new ElectricalMetersModel();


    $toFilter = ['Complete', 'Not Completed', 'For Correction', 'For printing', 'Pending', ''];
    $data['user'] = $model->where('id', session()->get('id'))->first();
    // $data['forverification'][0] = $ElectModel_1->whereNotIn('completion', $toFilter)->where('verifierEmail', session()->get('email'))->findAll();
    // $data['forverification'][1] = $ThermoModel->whereNotIn('completion', $toFilter)->where('verifierEmail', session()->get('email'))->findAll();
    // $data['thermoData'] = $ThermoModel->whereNotIn('completion', $toFilter)->where('verifierEmail', session()->get('email'))->findAll();
    // $data['forverification'][2] = $TestWeightModel->whereNotIn('completion', $toFilter)->where('verifierEmail', session()->get('email'))->findAll();
    // $data['forverification'][3] = $WeighingScaleModel->whereNotIn('completion', $toFilter)->where('verifierEmail', session()->get('email'))->findAll();

    $data['forverification'][0] = $ElectronicBalanceModel->whereNotIn('completion', $toFilter)->where('verifierEmail', session()->get('email'))->findAll();
    $data['forverification'][1] = $ThermoModel->whereNotIn('completion', $toFilter)->where('verifierEmail', session()->get('email'))->findAll();
    $data['forverification'][2] = $TestWeightModel->whereNotIn('completion', $toFilter)->where('verifierEmail', session()->get('email'))->findAll();
    $data['forverification'][3] = $WeighingScaleModel->whereNotIn('completion', $toFilter)->where('verifierEmail', session()->get('email'))->findAll();
    $data['forverification'][4] = $DigitalThermometerModel->whereNotIn('completion', $toFilter)->where('verifierEmail', session()->get('email'))->findAll();
    $data['forverification'][5] = $DigitalTimerModel->whereNotIn('completion', $toFilter)->where('verifierEmail', session()->get('email'))->findAll();
    $data['forverification'][6] = $PressureGaugeModel->whereNotIn('completion', $toFilter)->where('verifierEmail', session()->get('email'))->findAll();
    $data['forverification'][7] = $PHMeterModel->whereNotIn('completion', $toFilter)->where('verifierEmail', session()->get('email'))->findAll();
    $data['forverification'][8] = $GlasswareModel->whereNotIn('completion', $toFilter)->where('verifierEmail', session()->get('email'))->findAll();
    $data['forverification'][9] = $TemperatureControllModel->whereNotIn('completion', $toFilter)->where('verifierEmail', session()->get('email'))->findAll();
    $data['forverification'][10] = $EnclosureModel->whereNotIn('completion', $toFilter)->where('verifierEmail', session()->get('email'))->findAll();
    $data['forverification'][11] = $RefractometerModel->whereNotIn('completion', $toFilter)->where('verifierEmail', session()->get('email'))->findAll();
    $data['forverification'][12] = $CaliperModel->whereNotIn('completion', $toFilter)->where('verifierEmail', session()->get('email'))->findAll();
    $data['forverification'][13] = $ElectricalMetersModel->whereNotIn('completion', $toFilter)->where('verifierEmail', session()->get('email'))->findAll();


    return view('ForVerificationTable', $data);
   }

   public function pendingForCorrectionTable(){
    $model = new UserModel();
    $ElectronicBalanceModel = new ElectronicBalanceModel();
    $ThermoModel = new ThermoModel();
    $TestWeightModel = new TestWeightModel();
    $WeighingScaleModel = new WeighingScaleModel();
    $DigitalThermometerModel = new DigitalThermometerModel();
    $DigitalTimerModel = new DigitalTimerModel();
    $PressureGaugeModel = new PressureGaugeModel();
    $PHMeterModel = new PHMeterModel();
    $GlasswareModel = new GlasswareModel();
    $TemperatureControllModel = new TemperatureControllModel();
    $EnclosureModel = new EnclosureModel();
    $RefractometerModel = new RefractometerModel();
    $CaliperModel = new CaliperModel();
    $ElectricalMetersModel = new ElectricalMetersModel();
    
    $toFilter = ['Pending', 'For correction', ''];
    $data['user'] = $model->where('id', session()->get('id'))->first();
    // $data['forPending'][0] = $ElectModel_1->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
    // $data['forPending'][1] = $ThermoModel->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
    // $data['forPending'][2] = $TestWeightModel->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
    // $data['forPending'][3] = $WeighingScaleModel->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();

    $data['forPending'][0] = $ElectronicBalanceModel->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
    $data['forPending'][1] = $ThermoModel->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
    $data['forPending'][2] = $TestWeightModel->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
    $data['forPending'][3] = $WeighingScaleModel->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
    $data['forPending'][4] = $DigitalThermometerModel->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
    $data['forPending'][5] = $DigitalTimerModel->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
    $data['forPending'][6] = $PressureGaugeModel->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
    $data['forPending'][7] = $PHMeterModel->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
    $data['forPending'][8] = $GlasswareModel->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
    $data['forPending'][9] = $TemperatureControllModel->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
    $data['forPending'][10] = $EnclosureModel->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
    $data['forPending'][11] = $RefractometerModel->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
    $data['forPending'][12] = $CaliperModel->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
    $data['forPending'][13] = $ElectricalMetersModel->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();

    return view('PendingForCorrection', $data);
   }

   public function forNotificationVerifier(){
    $model = new UserModel();
    $ElectModel_1 = new ElectronicBalanceModel();
    $ThermoModel = new ThermoModel();
    $TestWeightModel = new TestWeightModel();
    $WeighingScaleModel = new WeighingScaleModel();
    $userID = $this->request->getPost('ID');
    $toFilterAdmin =  ['Complete', 'Not Completed', 'For Correction', 'For printing', 'Pending'];
    $data['admin'][0] = $ElectModel_1Admin->whereNotIn('completion', $toFilterAdmin)->where('verifierEmail', session()->get('email'))->findAll();
    $data['admin'][1] = $ThermoModelAdmin->whereNotIn('completion', $toFilterAdmin)->where('verifierEmail', session()->get('email'))->findAll();
    $data['admin'][2] = $TestWeightModelAdmin->whereNotIn('completion', $toFilterAdmin)->where('verifierEmail', session()->get('email'))->findAll();
    $data['admin'][3] = $WeighingScaleModelAdmin->whereNotIn('completion', $toFilterAdmin)->where('verifierEmail', session()->get('email'))->findAll();
    return $data;
   }

   public function forNotification(){
    $model = new UserModel();
    $ElectronicBalanceModel = new ElectronicBalanceModel();
    $ThermoModel = new ThermoModel();
    $TestWeightModel = new TestWeightModel();
    $WeighingScaleModel = new WeighingScaleModel();
    $DigitalThermometerModel = new DigitalThermometerModel();
    $DigitalTimerModel = new DigitalTimerModel();
    $PressureGaugeModel = new PressureGaugeModel();
    $PHMeterModel = new PHMeterModel();
    $GlasswareModel = new GlasswareModel();
    $TemperatureControllModel = new TemperatureControllModel();
    $EnclosureModel = new EnclosureModel();
    $RefractometerModel = new RefractometerModel();
    $CaliperModel = new CaliperModel();
    $ElectricalMetersModel = new ElectricalMetersModel();
    $userID = $this->request->getPost('ID');
    
    $toFilter = ['Pending', 'For correction'];
    $data['user'][0] = $ElectronicBalanceModel->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
    $data['user'][1] = $ThermoModel->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
    $data['user'][2] = $TestWeightModel->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
    $data['user'][3] = $WeighingScaleModel->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
    $data['user'][4] = $DigitalThermometerModel->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
    $data['user'][5] = $DigitalTimerModel->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
    $data['user'][6] = $PressureGaugeModel->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
    $data['user'][7] = $PHMeterModel->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
    $data['user'][8] = $GlasswareModel->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
    $data['user'][9] = $TemperatureControllModel->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
    $data['user'][10] = $EnclosureModel->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
    $data['user'][11] = $RefractometerModel->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
    $data['user'][12] = $CaliperModel->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();
    $data['user'][13] = $ElectricalMetersModel->whereIn('completion', $toFilter)->where('calibratorAccountID', session()->get('id'))->findAll();

    
    if(session()->get('role') == 'admin'){
        $toFilterAdmin = ['Complete', 'Not Completed', 'For correction', 'For printing'];

        $data['admin'][0] = $ElectronicBalanceModel->whereNotIn('completion', $toFilterAdmin)->where('verifierEmail', session()->get('email'))->findAll();
        $data['admin'][1] = $ThermoModel->whereNotIn('completion', $toFilterAdmin)->where('verifierEmail', session()->get('email'))->findAll();
        $data['admin'][2] = $TestWeightModel->whereNotIn('completion', $toFilterAdmin)->where('verifierEmail', session()->get('email'))->findAll();
        $data['admin'][3] = $WeighingScaleModel->whereNotIn('completion', $toFilterAdmin)->where('verifierEmail', session()->get('email'))->findAll();
        $data['admin'][4] = $DigitalThermometerModel->whereNotIn('completion', $toFilterAdmin)->where('verifierEmail', session()->get('email'))->findAll();
        $data['admin'][5] = $DigitalTimerModel->whereNotIn('completion', $toFilterAdmin)->where('verifierEmail', session()->get('email'))->findAll();
        $data['admin'][6] = $PressureGaugeModel->whereNotIn('completion', $toFilterAdmin)->where('verifierEmail', session()->get('email'))->findAll();
        $data['admin'][7] = $PHMeterModel->whereNotIn('completion', $toFilterAdmin)->where('verifierEmail', session()->get('email'))->findAll();
        $data['admin'][8] = $GlasswareModel->whereNotIn('completion', $toFilterAdmin)->where('verifierEmail', session()->get('email'))->findAll();
        $data['admin'][9] = $TemperatureControllModel->whereNotIn('completion', $toFilterAdmin)->where('verifierEmail', session()->get('email'))->findAll();
        $data['admin'][10] = $EnclosureModel->whereNotIn('completion', $toFilterAdmin)->where('verifierEmail', session()->get('email'))->findAll();
        $data['admin'][11] = $RefractometerModel->whereNotIn('completion', $toFilterAdmin)->where('verifierEmail', session()->get('email'))->findAll();
        $data['admin'][12] = $CaliperModel->whereNotIn('completion', $toFilterAdmin)->where('verifierEmail', session()->get('email'))->findAll();
        $data['admin'][13] = $ElectricalMetersModel->whereNotIn('completion', $toFilterAdmin)->where('verifierEmail', session()->get('email'))->findAll();
    


    }
    return json_encode($data);
   }
        
}

    


