<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CustomersModel;
use App\Models\Defaults;
use App\Models\PlaceholderModel;

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

class DefaultsController extends BaseController{
        public function fetchTableController(){
                $model = new UserModel();
                $module1 = new ElectModel_1();
                $module2 = new ThermoModel();
                $module3 = new TestWeightModel();
                $data['user'] = $model->where('id', session()->get('id'))->first();
                $data['module1Defaults'] = $module1->getFieldData('elect_table_1');
                $data['module2Defaults'] = $module2->getFieldData('thermotable');
                $data['module3Defaults'] = $module3->getFieldData('testweighttable');
                return view('/defaultEdit', $data);
	}
        public function saveModule1(){
                $module = new ElectModel_1();

                $settingRemarks1Module1 = $this->request->getPost('settingRemarks1Module1');
                $settingCalibrationProcedureAndTraceabilityModule1 = $this->request->getPost('settingCalibrationProcedureAndTraceabilityModule1');
                $settingUncertaintyOfMeasurementModule1 = $this->request->getPost('settingUncertaintyOfMeasurementModule1');
                $settingCalibrationResultsModule1 = $this->request->getPost('settingCalibrationResultsModule1');

                $module->query("ALTER TABLE `elect_table_1` CHANGE `settingRemarks1` `settingRemarks1` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '$settingRemarks1Module1';");
                $module->query("ALTER TABLE `elect_table_1` CHANGE `settingCalibrationProcedureAndTraceability` `settingCalibrationProcedureAndTraceability` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '$settingCalibrationProcedureAndTraceabilityModule1';");
                $module->query("ALTER TABLE `elect_table_1` CHANGE `settingUncertaintyOfMeasurement` `settingUncertaintyOfMeasurement` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '$settingUncertaintyOfMeasurementModule1';");
                $module->query("ALTER TABLE `elect_table_1` CHANGE `settingCalibrationResults` `settingCalibrationResults` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '$settingCalibrationResultsModule1';");

                return redirect()->to(base_url('defaultEdit'));
	}
        public function saveModule2(){
                $module = new ThermoModel();

                $settingRemarks1Module2 = $this->request->getPost('settingRemarks1Module2');
                $settingCalibrationProcedureAndTraceabilityModule2 = $this->request->getPost('settingCalibrationProcedureAndTraceabilityModule2');
                $settingUncertaintyOfMeasurementModule2 = $this->request->getPost('settingUncertaintyOfMeasurementModule2');
                $settingCalibrationResultsModule2 = $this->request->getPost('settingCalibrationResultsModule2');

                $module->query("ALTER TABLE `thermotable` CHANGE `settingRemarks1` `settingRemarks1` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '$settingRemarks1Module2';");
                $module->query("ALTER TABLE `thermotable` CHANGE `settingCalibrationProcedureAndTraceability` `settingCalibrationProcedureAndTraceability` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '$settingCalibrationProcedureAndTraceabilityModule2';");
                $module->query("ALTER TABLE `thermotable` CHANGE `settingUncertaintyOfMeasurement` `settingUncertaintyOfMeasurement` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '$settingUncertaintyOfMeasurementModule2';");
                $module->query("ALTER TABLE `thermotable` CHANGE `settingCalibrationResults` `settingCalibrationResults` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '$settingCalibrationResultsModule2';");

                return redirect()->to(base_url('defaultEdit'));
	}

        public function saveModule3(){
                $module = new TestWeightModel();

                $settingRemarks1Module3 = $this->request->getPost('settingRemarks1Module3');
                $settingCalibrationProcedureAndTraceabilityModule3 = $this->request->getPost('settingCalibrationProcedureAndTraceabilityModule3');
                $calibrationProcedureAndTraceabilityNotModule3 = $this->request->getPost('calibrationProcedureAndTraceabilityNotModule3');
                $settingUncertaintyOfMeasurementModule3 = $this->request->getPost('settingUncertaintyOfMeasurementModule3');
                $settingCalibrationResultsModule3 = $this->request->getPost('settingCalibrationResultsModule3');

                $module->query("ALTER TABLE `testweighttable` CHANGE `settingRemarks1` `settingRemarks1` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '$settingRemarks1Module3';");
                $module->query("ALTER TABLE `testweighttable` CHANGE `settingCalibrationProcedureAndTraceability` `settingCalibrationProcedureAndTraceability` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '$settingCalibrationProcedureAndTraceabilityModule3';");
                $module->query("ALTER TABLE `testweighttable` CHANGE `calibrationProcedureAndTraceabilityNot` `calibrationProcedureAndTraceabilityNot` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '$calibrationProcedureAndTraceabilityNotModule3';");
                $module->query("ALTER TABLE `testweighttable` CHANGE `settingUncertaintyOfMeasurement` `settingUncertaintyOfMeasurement` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '$settingUncertaintyOfMeasurementModule3';");
                $module->query("ALTER TABLE `testweighttable` CHANGE `settingCalibrationResults` `settingCalibrationResults` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '$settingCalibrationResultsModule3';");

                return redirect()->to(base_url('defaultEdit'));
	}

        public function get_placeholders(){
                $PlaceholderModel = new PlaceholderModel();
                $data = $PlaceholderModel->findAll();
                $response = [
                        'status' => 'success',
                        'message' => 'Fetched',
                        'data' => $data,
                ];
                return $this->response->setJSON($response);
        }

        public function update_statements(){
                $PlaceholderModel = new PlaceholderModel();
                $data = json_decode($this->request->getPost('statement'));
                $PlaceholderModel->update(1,$data);
        } 
        public function update_date_issued(){
                $moduleNumber = $this->request->getPost('moduleNumber');
                $data = [
                        'dateOfIssue' => $this->request->getPost('dateOfIssue'),
                ];
                $certificate_id =  $this->request->getPost('idOfCertificate');
                switch ($moduleNumber) {
                        case "1":
                               $mainModel = new ElectronicBalanceModel();
                               break;
                        case "2":
                               $mainModel = new ThermoModel();
                               break;
                        case "3":
                               $mainModel = new TestWeightModel();
                               break;
                        case "4":
                               $mainModel = new WeighingScaleModel();
                               break;
                        case "5":
                               $mainModel = new DigitalThermometerModel();
                               break;
                        case "6":
                               $mainModel = new DigitalTimerModel();
                               break;
                        case "7":
                               $mainModel = new PressureGaugeModel();
                               break;
                        case "8":
                               $mainModel = new PHMeterModel();
                               break;
                        case "9":
                               $mainModel = new GlasswareModel();
                               break;
                        case "10":
                               $mainModel = new TemperatureControllModel();
                               break;
                        case "11":
                               $mainModel = new EnclosureModel();
                               break;
                        case "13":
                               $mainModel = new RefractometerModel();
                               break;
                        case "14":
                               $mainModel = new CaliperModel();
                               break;
                        case "15":
                               $mainModel = new ElectricalMetersModel();
                               break;
                        default:
                               return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
                }
                $mainModel->update($certificate_id, $data);
        }
}
