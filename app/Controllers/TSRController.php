<?php
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CustomersModel;
use App\Models\VerifierModel;
use App\Models\PersonnelModel;
use App\Models\Defaults;
use App\Models\ElectModel_image;
use Dompdf\Options; 

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


// balancestandard
// barometerstandard
// buffersolutionstandard
// buffersolutionstandardvalues
// digitaltimerstandard
// digitaltimerstandardvalues
// documentingprocesscalibratorstandard
// documentingprocesscalibratorstandardvalues
// elect_table_2
// elect_table_3
// multiproductcalibratorstandard
// multiproductcalibratorstandardvalues
// ph_meter_standard
// pressuregaugestandarddetails
// pressuregaugestandardvalues
// standard_balance
// standard_chamber
// standard_currentcoil
// standard_gaugeblock
// standard_measurement_gaugeblock
// standard_uncertainty_gaugeblock
// temperaturerecorder
// temperaturesource
// testweightmaterial
// testweightmpe
// testweightpab

// testweightstandarddetails
// testweightstandardvalues
// thermostandarddrift
// thermostandarddriftprt

// thermostandardtable
// thermostandardtestpoints
// timer_standard
// wirelesstemperaturelogger

use App\Models\BalanceStandardModel;
use App\Models\BarometerStandardModel;
use App\Models\BufferSolutionStandardModel;
use App\Models\BufferSolutionStandardValuesModel;
use App\Models\ChamberStandardModel;
use App\Models\CurrentCoilModel;
use App\Models\DigitalTimerStandardModel;
use App\Models\DigitalTimerStandardValuesModel;
use App\Models\DocumentingProcessCalibratorStandardModel;
use App\Models\DocumentingProcessCalibratorStandardValuesModel;
use App\Models\ElectModel_2;
use App\Models\ElectModel_3;
use App\Models\GaugeBlockMeasurementModel;
use App\Models\GaugeBlockModel;
use App\Models\GaugeBlockUncertaintyModel;
use App\Models\MultiProductCalibratorStandardModel;
use App\Models\MultiProductCalibratorStandardValuesModel;
use App\Models\PressureGaugeStandardModel;
use App\Models\PressureGaugeStandardValueModel;
use App\Models\TemperatureRecorderModel;
use App\Models\TemperatureSource;
use App\Models\TestWeightAlloyModel;
use App\Models\TestWeightMPEModel;
use App\Models\TestWeightPABModel;
use App\Models\ThermoChamberModel;
use App\Models\ThermoStandard;
use App\Models\ThermoStandardAddDriftModel;
use App\Models\ThermoStandardAddDriftPRTModel;
use App\Models\ThermoStandardAddTestPointsModel;
use App\Models\TimerStandardModel;
use App\Models\WirelessTemperatureLoggerModel;


use App\Models\TSRModel;




class TSRController extends BaseController
{
    public function requestTable(){
        $data = [];
        $VerifierModel = new VerifierModel();
        $PersonnelModel = new PersonnelModel();
        $data['verifier'] = $VerifierModel->findAll();
        $data['personnel'] = $PersonnelModel->findAll();
        return view('TSR/tsrTable', $data);
    }

    public function requestSampleWorksheetID(){
        $mainModel = new TSRModel();
        $data = [
                'sampleID'  => $this->request->getPost('sampleID'),
                'requestReferenceNumber' => $this->request->getPost('requestReferenceNumber'),
                'sampleCode' => $this->request->getPost('sampleCode'),
                'worksheetType' => $this->request->getPost('worksheetType'),
                'worksheetID' => $this->request->getPost('worksheetID'),
                'rawData' => $this->request->getPost('rawData'),
        ]; 
        $insertingToDatabse = $mainModel->insert($data);

        if($insertingToDatabse){
            $tsrID = $mainModel->insertID();
            $response = [
                'status' => 'success',
                'message' => 'Worksheet added',
                'tsrID' => $tsrID,
            ];
            return $this->response->setJSON($response);
        }else{
            return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function requestSampleWorksheetID_import(){
        $mainModel = new TSRModel();
        $data = [
                'id'  => $this->request->getPost('id'),
                'sampleID'  => $this->request->getPost('sampleID'),
                'requestReferenceNumber' => $this->request->getPost('requestReferenceNumber'),
                'sampleCode' => $this->request->getPost('sampleCode'),
                'worksheetType' => $this->request->getPost('worksheetType'),
                'worksheetID' => $this->request->getPost('worksheetID'),
                'rawData' => $this->request->getPost('rawData'),
        ]; 
        $insertingToDatabse = $mainModel->insert($data);

        if($insertingToDatabse){
            $tsrID = $mainModel->insertID();
            $response = [
                'status' => 'success',
                'message' => 'Worksheet added',
                'tsrID' => $tsrID,
            ];
            return $this->response->setJSON($response);
        }else{
            return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function get_worksheet_tsr_id(){

        // new ElectronicBalanceModel();
        // new ThermoModel();
        // new TestWeightModel();
        // new WeighingScaleModel();
        // new DigitalThermometerModel();
        // new DigitalTimerModel();
        // new PressureGaugeModel();
        // new PHMeterModel();
        // new GlasswareModel();

        // new EnclosureModel();
        // new RefractometerModel();
        // new CaliperModel();
        // new ElectricalMetersModel();

        // worksheetType
        // worksheetID
        // sampleID

        $TSRModel = new TSRModel();

        $referenceNumber = $this->request->getPost('referenceNumber');
        $worksheetUsed = $this->request->getPost('worksheetType');
        $worksheetID = $this->request->getPost('worksheetID'); 
        $sampleID = $this->request->getPost('sampleID'); 

        switch ($worksheetUsed) {
            case "BALANCE":
                   $mainModel = new ElectronicBalanceModel();
                   break;
            case "THERMOHYGROMETER":
                   $mainModel = new ThermoModel();
                   break;
            case "TEST WEIGHT":
            case "MASS STANDARD":
            case "SET OF WEIGHTS":
                   $mainModel = new TestWeightModel();
                   break;
            case "SCALE":
                   $mainModel = new WeighingScaleModel();
                   break;
            case "THERMOMETER":
                   $mainModel = new DigitalThermometerModel();
                   break;
            case "TIMER":
                   $mainModel = new DigitalTimerModel();
                   break;
            case "PRESSURE GAUGE":
                   $mainModel = new PressureGaugeModel();
                   break;
            case "PH":
                   $mainModel = new PHMeterModel();
                   break;
            case "TEMPERATURE CONTROLLER":
                   $mainModel = new TemperatureControllModel();
                   break;
            case "PIPETTE":
            case "VOLUMETRIC":
            case "POVA":
                   $mainModel = new GlasswareModel();
                   break;
            case "OVEN":
            case "CHILLER":
            case "INCUBATOR":
            case "FREEZER":
            case "WATERBATH":
                   $mainModel = new EnclosureModel();
                   break;
            case "REFRACTOMETER":
                   $mainModel = new RefractometerModel();
                   break;
            case "CALIPER":
                   $mainModel = new CaliperModel();
                   break;
            case "OHM":
            case "VOLT":
                   $mainModel = new ElectricalMetersModel();
                   break;
            default:
                   return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
        //$result = $mainModel->where('id', $worksheetID)->first();

        $with_extra = false;
        $reference_count = $TSRModel->where('requestReferenceNumber', $referenceNumber)->where('worksheetType', $worksheetUsed)->countAllResults();
        $worksheetCount = $mainModel->countAll();
        $worksheetInDB = $mainModel->where('id', $worksheetID)->countAllResults();

        if($worksheetInDB > 0){
            $result = $mainModel->where('id', $worksheetID)->first();
        }

        if($worksheetInDB <= 0){
            $result = $mainModel->where('tsrID', )->first();
            $data = [
                'tsrID' => 'ADDED',
            ];  
            $extra_worksheet_id =  $result['id'];
            $mainModel->update($extra_worksheet_id,$data);
        }

        $response = [
            'status' => 'success',
            'message' => 'Worksheet added',
            'data' => $result,
        ];
        return $this->response->setJSON($response);
    }

    public function get_all_from_type(){
        $TSRModel = new TSRModel();
        $worksheetUsed = $this->request->getPost('worksheetType');

        switch ($worksheetUsed) {
            case "BALANCE":
                   $mainModel = new ElectronicBalanceModel();
                   break;
            case "THERMOHYGROMETER":
                   $mainModel = new ThermoModel();
                   break;
            case "TEST WEIGHT":
            case "MASS STANDARD":
            case "SET OF WEIGHTS":
                   $mainModel = new TestWeightModel();
                   break;
            case "SCALE":
                   $mainModel = new WeighingScaleModel();
                   break;
            case "THERMOMETER":
                   $mainModel = new DigitalThermometerModel();
                   break;
            case "TIMER":
                   $mainModel = new DigitalTimerModel();
                   break;
            case "PRESSURE GAUGE":
                   $mainModel = new PressureGaugeModel();
                   break;
            case "PH":
                   $mainModel = new PHMeterModel();
                   break;
            case "TEMPERATURE CONTROLLER":
                   $mainModel = new TemperatureControllModel();
                   break;
            case "PIPETTE":
            case "VOLUMETRIC":
            case "POVA":
                   $mainModel = new GlasswareModel();
                   break;
            case "OVEN":
            case "CHILLER":
            case "INCUBATOR":
            case "FREEZER":
            case "WATERBATH":
                   $mainModel = new EnclosureModel();
                   break;
            case "REFRACTOMETER":
                   $mainModel = new RefractometerModel();
                   break;
            case "CALIPER":
                   $mainModel = new CaliperModel();
                   break;
            case "OHM":
            case "VOLT":
                   $mainModel = new ElectricalMetersModel();
                   break;
            default:
                   return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
        $result = $mainModel->findAll();
        $response = [
            'status' => 'success',
            'message' => 'Worksheet added',
            'data' => $result,
        ];
        return $this->response->setJSON($response);
    }

    public function get_reference_data(){
        $mainModel = new TSRModel();
        $request_number = $this->request->getPost('request_number');
        $data = $mainModel->where('requestReferenceNumber', $request_number)->findAll();
        $response = [
            'status' => 'success',
            'message' => 'request successful',
            'request_data' => $data,
        ];
        return $this->response->setJSON($response);
    }

    public function worksheetElectronicBalance(){
        $mainModel = new ElectronicBalanceModel();
        $data = [
                'certificateNumber' => $this->request->getPost('calibrationCertificate'),
                'standard' => $this->request->getPost('standard'),
                'customerInfo' => $this->request->getPost('customerInfo'),
                'equipmentInfo' => $this->request->getPost('equipmentInfo'),
        ];     

        $insertingToDatabse = $mainModel->insert($data);

        if($insertingToDatabse){
            $worksheetID = $mainModel->insertID();
            $response = [
                'status' => 'success',
                'message' => 'Worksheet added',
                'worksheetID' => $worksheetID,
            ];
            return $this->response->setJSON($response);
        }else{
            return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function worksheetThermoHygrometer(){
        $mainModel = new ThermoModel();
        $data = [
                'certificateNumber' => $this->request->getPost('calibrationCertificate'),
                'standard' => $this->request->getPost('standard'),
                'customerInfo' => $this->request->getPost('customerInfo'),
                'equipmentInfo' => $this->request->getPost('equipmentInfo'),
        ];     

        $insertingToDatabse = $mainModel->insert($data);

        if($insertingToDatabse){
            $worksheetID = $mainModel->insertID();
            $response = [
                'status' => 'success',
                'message' => 'Worksheet added',
                'worksheetID' => $worksheetID,
            ];
            return $this->response->setJSON($response);
        }else{
            return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function worksheetTestWeight(){
        $mainModel = new TestWeightModel();
        $data = [
                'certificateNumber' => $this->request->getPost('calibrationCertificate'),
                'standard' => $this->request->getPost('standard'),
                'customerInfo' => $this->request->getPost('customerInfo'),
                'equipmentInfo' => $this->request->getPost('equipmentInfo'),
        ];     

        $insertingToDatabse = $mainModel->insert($data);

        if($insertingToDatabse){
            $worksheetID = $mainModel->insertID();
            $response = [
                'status' => 'success',
                'message' => 'Worksheet added',
                'worksheetID' => $worksheetID,
            ];
            return $this->response->setJSON($response);
        }else{
            return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function worksheetWeighingScale(){
        $mainModel = new WeighingScaleModel();
        $data = [
                'certificateNumber' => $this->request->getPost('calibrationCertificate'),
                'standard' => $this->request->getPost('standard'),
                'customerInfo' => $this->request->getPost('customerInfo'),
                'equipmentInfo' => $this->request->getPost('equipmentInfo'),
        ];     

        $insertingToDatabse = $mainModel->insert($data);

        if($insertingToDatabse){
            $worksheetID = $mainModel->insertID();
            $response = [
                'status' => 'success',
                'message' => 'Worksheet added',
                'worksheetID' => $worksheetID,
            ];
            return $this->response->setJSON($response);
        }else{
            return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function worksheetThermometer(){
        $mainModel = new DigitalThermometerModel();
        $data = [
                'certificateNumber' => $this->request->getPost('calibrationCertificate'),
                'standard' => $this->request->getPost('standard'),
                'customerInfo' => $this->request->getPost('customerInfo'),
                'equipmentInfo' => $this->request->getPost('equipmentInfo'),
        ];     

        $insertingToDatabse = $mainModel->insert($data);

        if($insertingToDatabse){
            $worksheetID = $mainModel->insertID();
            $response = [
                'status' => 'success',
                'message' => 'Worksheet added',
                'worksheetID' => $worksheetID,
            ];
            return $this->response->setJSON($response);
        }else{
            return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function worksheetTimer(){
        $mainModel = new DigitalTimerModel();
        $data = [
                'certificateNumber' => $this->request->getPost('calibrationCertificate'),
                'standard' => $this->request->getPost('standard'),
                'customerInfo' => $this->request->getPost('customerInfo'),
                'equipmentInfo' => $this->request->getPost('equipmentInfo'),
        ];     

        $insertingToDatabse = $mainModel->insert($data);

        if($insertingToDatabse){
            $worksheetID = $mainModel->insertID();
            $response = [
                'status' => 'success',
                'message' => 'Worksheet added',
                'worksheetID' => $worksheetID,
            ];
            return $this->response->setJSON($response);
        }else{
            return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function worksheetTemperatureController(){
        $mainModel = new TemperatureControllModel();
        $data = [
                'certificateNumber' => $this->request->getPost('calibrationCertificate'),
                'standard' => $this->request->getPost('standard'),
                'customerInfo' => $this->request->getPost('customerInfo'),
                'equipmentInfo' => $this->request->getPost('equipmentInfo'),
        ];     

        $insertingToDatabse = $mainModel->insert($data);

        if($insertingToDatabse){
            $worksheetID = $mainModel->insertID();
            $response = [
                'status' => 'success',
                'message' => 'Worksheet added',
                'worksheetID' => $worksheetID,
            ];
            return $this->response->setJSON($response);
        }else{
            return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function worksheetPressure(){
        $mainModel = new PressureGaugeModel();
        $data = [
                'certificateNumber' => $this->request->getPost('calibrationCertificate'),
                'standard' => $this->request->getPost('standard'),
                'customerInfo' => $this->request->getPost('customerInfo'),
                'equipmentInfo' => $this->request->getPost('equipmentInfo'),
        ];     

        $insertingToDatabse = $mainModel->insert($data);

        if($insertingToDatabse){
            $worksheetID = $mainModel->insertID();
            $response = [
                'status' => 'success',
                'message' => 'Worksheet added',
                'worksheetID' => $worksheetID,
            ];
            return $this->response->setJSON($response);
        }else{
            return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function worksheetPHmeter(){
        $mainModel = new PHMeterModel();
        $data = [
                'certificateNumber' => $this->request->getPost('calibrationCertificate'),
                'standard' => $this->request->getPost('standard'),
                'customerInfo' => $this->request->getPost('customerInfo'),
                'equipmentInfo' => $this->request->getPost('equipmentInfo'),
        ];     

        $insertingToDatabse = $mainModel->insert($data);

        if($insertingToDatabse){
            $worksheetID = $mainModel->insertID();
            $response = [
                'status' => 'success',
                'message' => 'Worksheet added',
                'worksheetID' => $worksheetID,
            ];
            return $this->response->setJSON($response);
        }else{
            return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function worksheetVolumetric(){
        $mainModel = new GlasswareModel();
        $data = [
                'certificateNumber' => $this->request->getPost('calibrationCertificate'),
                'standard' => $this->request->getPost('standard'),
                'customerInfo' => $this->request->getPost('customerInfo'),
                'equipmentInfo' => $this->request->getPost('equipmentInfo'),
        ];     

        $insertingToDatabse = $mainModel->insert($data);

        if($insertingToDatabse){
            $worksheetID = $mainModel->insertID();
            $response = [
                'status' => 'success',
                'message' => 'Worksheet added',
                'worksheetID' => $worksheetID,
            ];
            return $this->response->setJSON($response);
        }else{
            return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function worksheetEnclosure(){
        $mainModel = new EnclosureModel();
        $data = [
                'certificateNumber' => $this->request->getPost('calibrationCertificate'),
                'standard' => $this->request->getPost('standard'),
                'customerInfo' => $this->request->getPost('customerInfo'),
                'equipmentInfo' => $this->request->getPost('equipmentInfo'),
        ];     

        $insertingToDatabse = $mainModel->insert($data);

        if($insertingToDatabse){
            $worksheetID = $mainModel->insertID();
            $response = [
                'status' => 'success',
                'message' => 'Worksheet added',
                'worksheetID' => $worksheetID,
            ];
            return $this->response->setJSON($response);
        }else{
            return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function worksheetRefractometer(){
        $mainModel = new RefractometerModel();
        $data = [
                'certificateNumber' => $this->request->getPost('calibrationCertificate'),
                'standard' => $this->request->getPost('standard'),
                'customerInfo' => $this->request->getPost('customerInfo'),
                'equipmentInfo' => $this->request->getPost('equipmentInfo'),
        ];     

        $insertingToDatabse = $mainModel->insert($data);

        if($insertingToDatabse){
            $worksheetID = $mainModel->insertID();
            $response = [
                'status' => 'success',
                'message' => 'Worksheet added',
                'worksheetID' => $worksheetID,
            ];
            return $this->response->setJSON($response);
        }else{
            return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function worksheetCaliper(){
        $mainModel = new CaliperModel();
        $data = [
                'certificateNumber' => $this->request->getPost('calibrationCertificate'),
                'standard' => $this->request->getPost('standard'),
                'customerInfo' => $this->request->getPost('customerInfo'),
                'equipmentInfo' => $this->request->getPost('equipmentInfo'),
        ];     

        $insertingToDatabse = $mainModel->insert($data);

        if($insertingToDatabse){
            $worksheetID = $mainModel->insertID();
            $response = [
                'status' => 'success',
                'message' => 'Worksheet added',
                'worksheetID' => $worksheetID,
            ];
            return $this->response->setJSON($response);
        }else{
            return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function worksheetElectricalMeters(){
        $mainModel = new ElectricalMetersModel();
        $data = [
                'certificateNumber' => $this->request->getPost('calibrationCertificate'),
                'standard' => $this->request->getPost('standard'),
                'customerInfo' => $this->request->getPost('customerInfo'),
                'equipmentInfo' => $this->request->getPost('equipmentInfo'),
        ];     

        $insertingToDatabse = $mainModel->insert($data);

        if($insertingToDatabse){
            $worksheetID = $mainModel->insertID();
            $response = [
                'status' => 'success',
                'message' => 'Worksheet added',
                'worksheetID' => $worksheetID,
            ];
            return $this->response->setJSON($response);
        }else{
            return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    

    public function updateTSRID(){
        $worksheetUsed = $this->request->getPost('worksheetUsed');
        switch ($worksheetUsed) {
            case "BALANCE":
                   $mainModel = new ElectronicBalanceModel();
                   break;
            case "THERMOHYGROMETER":
                   $mainModel = new ThermoModel();
                   break;
            case "TEST WEIGHT":
            case "MASS STANDARD":
            case "SET OF WEIGHTS":
                   $mainModel = new TestWeightModel();
                   break;
            case "SCALE":
                   $mainModel = new WeighingScaleModel();
                   break;
            case "THERMOMETER":
                   $mainModel = new DigitalThermometerModel();
                   break;
            case "TIMER":
                   $mainModel = new DigitalTimerModel();
                   break;
            case "PRESSURE GAUGE":
                   $mainModel = new PressureGaugeModel();
                   break;
            case "PH":
                   $mainModel = new PHMeterModel();
                   break;
            case "TEMPERATURE CONTROLLER":
                   $mainModel = new TemperatureControllModel();
                   break;
            case "PIPETTE":
            case "VOLUMETRIC":
            case "POVA":
                   $mainModel = new GlasswareModel();
                   break;
            case "OVEN":
            case "CHILLER":
            case "INCUBATOR":
            case "FREEZER":
            case "WATERBATH":
                   $mainModel = new EnclosureModel();
                   break;
            case "REFRACTOMETER":
                   $mainModel = new RefractometerModel();
                   break;
            case "CALIPER":
                   $mainModel = new CaliperModel();
                   break;
            case "OHM":
            case "VOLT":
            case "ELECTRICAL METER":
                   $mainModel = new ElectricalMetersModel();
                   break;
            default:
                   return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
        
        $worksheetID = $this->request->getPost('worksheetID');
        $data = [
            'tsrID' => $this->request->getPost('tsrID'),
        ];  
        $mainModel->update($worksheetID,$data);
        $response = [
            'status' => 'success',
            'message' => 'Worksheet added',
        ];
        return $this->response->setJSON($response);
    }

    public function updateTSRIDImport(){
        $worksheetUsed = $this->request->getPost('worksheetUsed');
        switch ($worksheetUsed) {
            case "BALANCE":
                   $mainModel = new ElectronicBalanceModel();
                   break;
            case "THERMOHYGROMETER":
                   $mainModel = new ThermoModel();
                   break;
            case "TEST WEIGHT":
            case "MASS STANDARD":
            case "SET OF WEIGHTS":
                   $mainModel = new TestWeightModel();
                   break;
            case "SCALE":
                   $mainModel = new WeighingScaleModel();
                   break;
            case "THERMOMETER":
                   $mainModel = new DigitalThermometerModel();
                   break;
            case "TIMER":
                   $mainModel = new DigitalTimerModel();
                   break;
            case "PRESSURE GAUGE":
                   $mainModel = new PressureGaugeModel();
                   break;
            case "PH":
                   $mainModel = new PHMeterModel();
                   break;
            case "TEMPERATURE CONTROLLER":
                   $mainModel = new TemperatureControllModel();
                   break;
            case "PIPETTE":
            case "VOLUMETRIC":
            case "POVA":
                   $mainModel = new GlasswareModel();
                   break;
            case "OVEN":
            case "CHILLER":
            case "INCUBATOR":
            case "FREEZER":
            case "WATERBATH":
                   $mainModel = new EnclosureModel();
                   break;
            case "REFRACTOMETER":
                   $mainModel = new RefractometerModel();
                   break;
            case "CALIPER":
                   $mainModel = new CaliperModel();
                   break;
            case "OHM":
            case "VOLT":
            case "ELECTRICAL METER":
                   $mainModel = new ElectricalMetersModel();
                   break;
            default:
                   return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
        
        $this_ID = $this->request->getPost('this_ID');
        $data = [
            'id' => $this->request->getPost('lan_ID'),
            'tsrID' => $this->request->getPost('reference_id'),
        ];  
        $mainModel->update($this_ID,$data);
        $response = [
            'status' => 'success',
            'message' => 'Worksheet added',
        ];
        return $this->response->setJSON($response);
    }

    public function update_from_offline(){
        $worksheetUsed = $this->request->getPost('worksheetType');
        $worksheetID = $this->request->getPost('worksheetID');
        $tsrID = $this->request->getPost('tsrID');
        $string_data = $this->request->getPost('data');
        $data = json_decode($string_data);
        switch ($worksheetUsed) {
            case "BALANCE":
                   $mainModel = new ElectronicBalanceModel();
                   break;
            case "THERMOHYGROMETER":
                   $mainModel = new ThermoModel();
                   break;
            case "TEST WEIGHT":
            case "MASS STANDARD":
            case "SET OF WEIGHTS":
                   $mainModel = new TestWeightModel();
                   break;
            case "SCALE":
                   $mainModel = new WeighingScaleModel();
                   break;
            case "THERMOMETER":
                   $mainModel = new DigitalThermometerModel();
                   break;
            case "TIMER":
                   $mainModel = new DigitalTimerModel();
                   break;
            case "PRESSURE GAUGE":
                   $mainModel = new PressureGaugeModel();
                   break;
            case "PH":
                   $mainModel = new PHMeterModel();
                   break;
            case "TEMPERATURE CONTROLLER":
                   $mainModel = new TemperatureControllModel();
                   break;
            case "PIPETTE":
            case "VOLUMETRIC":
            case "POVA":
                   $mainModel = new GlasswareModel();
                   break;
            case "OVEN":
            case "CHILLER":
            case "INCUBATOR":
            case "FREEZER":
            case "WATERBATH":
                   $mainModel = new EnclosureModel();
                   break;
            case "REFRACTOMETER":
                   $mainModel = new RefractometerModel();
                   break;
            case "CALIPER":
                   $mainModel = new CaliperModel();
                   break;
            case "OHM":
            case "VOLT":
                   $mainModel = new ElectricalMetersModel();
                   break;
            default:
                   return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }

        if($tsrID != ''){
            $mainModel->update($worksheetID,$data);
            $response = [
                'status' => 'success',
                'message' => 'Worksheet Updated',
            ];
        }else{
            $mainModel->insert($data);
            $response = [
                'status' => 'success',
                'message' => 'Worksheet Added',
            ];
        }
        return $this->response->setJSON($response);
    }

    public function checkRequestSample(){
        $mainModel = new TSRModel();
        $requestReferenceNumber = $this->request->getPost('requestReferenceNumber');
        $worksheetType = $this->request->getPost('worksheetType');
        $countOfSamplePerType = $mainModel->where('requestReferenceNumber', $requestReferenceNumber)->where('worksheetType', $worksheetType)->countAllResults();
        $response = [
            'worksheetType' => $worksheetType,
            'count' => $countOfSamplePerType,
        ];
        return $this->response->setJSON($response);
    }

    public function checkSampleId(){
        $mainModel = new TSRModel();
        $sampleId = $this->request->getPost('sampleID');
        $isInDB = $mainModel->where('sampleID', $sampleId)->countAllResults();
        $result = $isInDB > 0 ? true : false; 
        $response = [
            'isInDB' => $result,
        ];
        return $this->response->setJSON($response);
    }

    public function get_request_sample_id(){
        $mainModel = new TSRModel();
        $sampleId = $this->request->getPost('sampleID');
        $result = $mainModel->where('sampleID', $sampleId)->first();
        $response = [
            'status' => 'success',
            'message' => 'Worksheet added',
            'sampleData' => $result,
            'lan_ID' => $result['worksheetID'],
            'reference_id' => $result["id"],
            'worksheetUsed' => $result['worksheetType']
        ];
        return $this->response->setJSON($response);
    }
    

    public function get_data_from_request_samples(){
        $mainModel = new TSRModel();
        $data['data'] = $mainModel->findAll();
        $response = [
            'status' => 'success',
            'message' => 'Worksheet added',
            'data' => $data,
        ];
        return $this->response->setJSON($response);
    }

    public function get_data_from_worksheet_type(){
        $mainModel = new TSRModel();

        //$referenceNumber = $this->request->getPost('referenceNumber');
        $worksheetUsed = $this->request->getPost('worksheetType');

        //$data = $mainModel->where('requestReferenceNumber', $referenceNumber)->where('worksheetType', $worksheetUsed)->findAll();
        $data = $mainModel->where('worksheetType', $worksheetUsed)->findAll();
        $response = [
            'status' => 'success',
            'message' => 'Worksheet added',
            'data' => $data,
        ];
        return $this->response->setJSON($response);
    }

    public function standard_updated_data(){
        $db = db_connect();
        $tables = $db->listTables();

        $std_table_name = [
            "barometerstandard",
            "buffersolutionstandard",
            "buffersolutionstandardvalues",
            "digitaltimerstandard",
            "digitaltimerstandardvalues",
            "documentingprocesscalibratorstandard",
            "documentingprocesscalibratorstandardvalues",
            "elect_table_2",
            "elect_table_3",
            "multiproductcalibratorstandard",
            "multiproductcalibratorstandardvalues",
            "pressuregaugestandarddetails",
            "pressuregaugestandardvalues",
            "standard_balance",
            "standard_chamber",
            "standard_currentcoil",
            "standard_gaugeblock",
            "standard_measurement_gaugeblock",
            "standard_uncertainty_gaugeblock",
            "temperaturerecorder",
            "temperaturesource",
            "testweightmaterial",
            "testweightmpe",
            "testweightpab",
            "thermostandarddrift",
            "thermostandarddriftprt",
            "thermostandardtable",
            "thermostandardtestpoints",
            "timer_standard",
            "wirelesstemperaturelogger"
        ];

        $obj_table_name_to_model = [
            "barometerstandard" => new BarometerStandardModel(),
            "buffersolutionstandard" => new BufferSolutionStandardModel(),
            "buffersolutionstandardvalues" => new BufferSolutionStandardValuesModel(),
            "digitaltimerstandard" =>  new DigitalTimerStandardModel(),
            "digitaltimerstandardvalues" =>  new DigitalTimerStandardValuesModel(),
            "documentingprocesscalibratorstandard" =>new DocumentingProcessCalibratorStandardModel(),
            "documentingprocesscalibratorstandardvalues" => new DocumentingProcessCalibratorStandardValuesModel(),
            "elect_table_2" => new ElectModel_2(),
            "elect_table_3" => new ElectModel_3(),
            "multiproductcalibratorstandard" =>  new MultiProductCalibratorStandardModel(),
            "multiproductcalibratorstandardvalues" =>  new MultiProductCalibratorStandardValuesModel(),
            "pressuregaugestandarddetails" => new PressureGaugeStandardModel(),
            "pressuregaugestandardvalues" => new PressureGaugeStandardValueModel(),
            "standard_balance" => new BalanceStandardModel(),
            "standard_chamber" => new ChamberStandardModel(),
            "standard_currentcoil" => new CurrentCoilModel(),
            "standard_gaugeblock" => new GaugeBlockModel(),
            "standard_measurement_gaugeblock" => new GaugeBlockMeasurementModel(),
            "standard_uncertainty_gaugeblock" => new GaugeBlockUncertaintyModel(),
            "temperaturerecorder" => new TemperatureRecorderModel(),
            "temperaturesource" => new TemperatureSource(),
            "testweightmaterial" =>new TestWeightAlloyModel(),
            "testweightmpe" => new TestWeightMPEModel(),
            "testweightpab" =>new TestWeightPABModel(),
            "thermostandarddrift" => new ThermoStandardAddDriftModel(),
            "thermostandarddriftprt" => new ThermoStandardAddDriftPRTModel(),
            "thermostandardtable" => new ThermoStandardAddTestPointsModel(),
            "thermostandardtestpoints" => new ThermoStandard(),
            "timer_standard" => new TimerStandardModel(),
            "wirelesstemperaturelogger" => new WirelessTemperatureLoggerModel(),
        ];

        for ($i=0; $i < count($tables); $i++) { 
            if(!in_array($tables[$i], $std_table_name)){
                continue;
            }
            
            switch ($tables[$i]) {
                case "barometerstandard" : 
                    $std_model = new BarometerStandardModel();
                    break;
                case "buffersolutionstandard" : 
                    $std_model = new BufferSolutionStandardModel();
                    break;
                case "buffersolutionstandardvalues" : 
                    $std_model = new BufferSolutionStandardValuesModel();
                    break;
                case "digitaltimerstandard" : 
                    $std_model = new DigitalTimerStandardModel();
                    break;
                case "digitaltimerstandardvalues" : 
                    $std_model = new DigitalTimerStandardValuesModel();
                    break;
                case "documentingprocesscalibratorstandard" : 
                    $std_model = new DocumentingProcessCalibratorStandardModel();
                    break;
                case "documentingprocesscalibratorstandardvalues" : 
                    $std_model = new DocumentingProcessCalibratorStandardValuesModel();
                    break;
                case "elect_table_2" : 
                    $std_model = new ElectModel_2();
                    break;
                case "elect_table_3" : 
                    $std_model = new ElectModel_3();
                    break;
                case "multiproductcalibratorstandard" : 
                    $std_model = new MultiProductCalibratorStandardModel();
                    break;
                case "multiproductcalibratorstandardvalues" : 
                    $std_model = new MultiProductCalibratorStandardValuesModel();
                    break;
                case "pressuregaugestandarddetails" : 
                    $std_model = new PressureGaugeStandardModel();
                    break;
                case "pressuregaugestandardvalues" : 
                    $std_model = new PressureGaugeStandardValueModel();
                    break;
                case "standard_balance" : 
                    $std_model = new BalanceStandardModel();
                    break;
                case "standard_chamber" : 
                    $std_model = new ChamberStandardModel();
                    break;
                case "standard_currentcoil" : 
                    $std_model = new CurrentCoilModel();
                    break;
                case "standard_gaugeblock" : 
                    $std_model = new GaugeBlockModel();
                    break;
                case "standard_measurement_gaugeblock" : 
                    $std_model = new GaugeBlockMeasurementModel();
                    break;
                case "standard_uncertainty_gaugeblock" : 
                    $std_model = new GaugeBlockUncertaintyModel();
                    break;
                case "temperaturerecorder" : 
                    $std_model = new TemperatureRecorderModel();
                    break;
                case "temperaturesource" : 
                    $std_model = new TemperatureSource();
                    break;
                case "testweightmaterial" : 
                    $std_model = new TestWeightAlloyModel();
                    break;
                case "testweightmpe" : 
                    $std_model = new TestWeightMPEModel();
                    break;
                case "testweightpab" : 
                    $std_model = new TestWeightPABModel();
                    break;
                case "thermostandarddrift" : 
                    $std_model = new ThermoStandardAddDriftModel();
                    break;
                case "thermostandarddriftprt" : 
                    $std_model = new ThermoStandardAddDriftPRTModel();
                    break;
                case "thermostandardtable" : 
                    $std_model = new ThermoStandardAddTestPointsModel();
                    break;
                case "thermostandardtestpoints" : 
                    $std_model = new ThermoStandard();
                    break;
                case "timer_standard" : 
                    $std_model = new TimerStandardModel();
                    break;
                case "wirelesstemperaturelogger" : 
                    $std_model = new WirelessTemperatureLoggerModel();
                    break;
                default:
                    $std_model = new TSRModel();
                    break;
            }

            $data[$tables[$i]] = $std_model->findAll();
            
        }

        $response = [
            'status' => 'success',
            'message' => 'Worksheet added',
            'data' => $data,
        ];

        $std_json = json_encode($data);
        try {
            file_put_contents('std_json/std.json',$std_json);
        } catch (\Throwable $th) {
            $response = [
                'status' => 'success',
                'message' => 'Worksheet added',
                'data' => $th,
            ];
        }
        

        
        return $this->response->setJSON($response);
    }
}



