<?php namespace App\Controllers;

use Dompdf\Options; 
use App\Models\UserModel;

use App\Models\ElectronicBalanceModel;
use App\Models\TestWeightModel;
use App\Models\ThermoModel;
use App\Models\WeighingScaleModel;
use App\Models\DigitalThermometerModel;
use App\Models\DigitalTimerModel;
use App\Models\PHMeterModel;
use App\Models\TemperatureControllModel;
use App\Models\PressureGaugeModel;
use App\Models\ElectricalMetersModel;
use App\Models\GlasswareModel;
use App\Models\RefractometerModel;
use App\Models\EnclosureModel;
use App\Models\CaliperModel;

use App\Models\ImageModel;

class WorksheetController extends BaseController{
    function ElectronicBalanceWorksheet($id){
        $rml = new ElectronicBalanceModel();
        $data['WorksheetData'] = $rml->where('id', $id)->first();
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('Worksheets/ElectronicBalanceWorksheet', $data), 'UTF-8');
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Worksheet No.'.$id.".pdf",array("Attachment" => 0));
    }

    function TestWeightWorksheet($id){
        $rml = new TestWeightModel();
        $data['WorksheetData'] = $rml->where('id', $id)->first();
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('Worksheets/TestWeightWorksheet', $data), 'UTF-8');
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Worksheet No.'.$id.".pdf",array("Attachment" => 0));
    }

    function ThermoHygrometerWorksheet($id){
        $rml = new ThermoModel();
        $data['WorksheetData'] = $rml->where('id', $id)->first();
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('Worksheets/ThermoHygrometerWorksheet', $data), 'UTF-8');
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Worksheet No.'.$id.".pdf",array("Attachment" => 0));
    }

    function WeighingScaleWorksheet($id){
        $rml = new WeighingScaleModel();
        $data['WorksheetData'] = $rml->where('id', $id)->first();
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('Worksheets/WeighingScaleWorksheet', $data), 'UTF-8');
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Worksheet No.'.$id.".pdf",array("Attachment" => 0));
    }

    function DigitalThermometerWorksheet($id){
        $rml = new DigitalThermometerModel();
        $data['WorksheetData'] = $rml->where('id', $id)->first();
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('Worksheets/DigitalThermometerWorksheet', $data), 'UTF-8');
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Worksheet No.'.$id.".pdf",array("Attachment" => 0));
    }
    
    function DigitalTimerWorksheet($id){
        $rml = new DigitalTimerModel();
        $data['WorksheetData'] = $rml->where('id', $id)->first();
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('Worksheets/DigitalTimerWorksheet', $data), 'UTF-8');
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Worksheet No.'.$id.".pdf",array("Attachment" => 0));
    }

    function PHMeterWorksheet($id){
        $rml = new PHMeterModel();
        $data['WorksheetData'] = $rml->where('id', $id)->first();
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('Worksheets/PHMeterWorksheet', $data), 'UTF-8');
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Worksheet No.'.$id.".pdf",array("Attachment" => 0));
    }

    
    function TemperatureControllerWorksheet($id){
        $rml = new TemperatureControllModel();
        $data['WorksheetData'] = $rml->where('id', $id)->first();
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('Worksheets/TemperatureControllerWorksheet', $data), 'UTF-8');
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Worksheet No.'.$id.".pdf",array("Attachment" => 0));
    }
    
    function PressureGaugeWorksheet($id){
        $rml = new PressureGaugeModel();
        $data['WorksheetData'] = $rml->where('id', $id)->first();
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('Worksheets/PressureGaugeWorksheet', $data), 'UTF-8');
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Worksheet No.'.$id.".pdf",array("Attachment" => 0));
    }

    function ElectricalMeterWorksheet($id){
        $rml = new ElectricalMetersModel();
        $data['WorksheetData'] = $rml->where('id', $id)->first();
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('Worksheets/ElectricalMeterWorksheet', $data), 'UTF-8');
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Worksheet No.'.$id.".pdf",array("Attachment" => 0));
    }

    function GlasswareWorksheet($id){
        $rml = new GlasswareModel();
        $data['WorksheetData'] = $rml->where('id', $id)->first();
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('Worksheets/GlasswareWorksheet', $data), 'UTF-8');
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Worksheet No.'.$id.".pdf",array("Attachment" => 0));
    }

    function RefractometerWorksheet($id){
        $rml = new RefractometerModel();
        $data['WorksheetData'] = $rml->where('id', $id)->first();
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('Worksheets/RefractometerWorksheet', $data), 'UTF-8');
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Worksheet No.'.$id.".pdf",array("Attachment" => 0));
    }

    function EnclosureWorksheet($id){
        $rml = new EnclosureModel();
        $data['WorksheetData'] = $rml->where('id', $id)->first();
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('Worksheets/EnclosureWorksheet', $data), 'UTF-8');
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Worksheet No.'.$id.".pdf",array("Attachment" => 0));
    }

    function CaliperWorksheet($id){
        $rml = new CaliperModel();
        $data['WorksheetData'] = $rml->where('id', $id)->first();
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     
        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('Worksheets/CaliperWorksheet', $data), 'UTF-8');
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Worksheet No.'.$id.".pdf",array("Attachment" => 0));
    }

    public function save_image($worksheetID = null){
        $mainModel = new ImageModel();

        $certificate_id = $this->request->getPost('certificate_id');
        $imageFiles = $this->request->getFiles('imageFiles');
        $module_Number = $this->request->getPost('module_Number');
        $fileType = $this->request->getPost('fileType');

        $imageIDArray = [];
        foreach ($imageFiles as $file) {
            foreach ($file as $individualFile) {
                if ($individualFile->isValid() && !$individualFile->hasMoved()) {
                    if($fileType == 'data'){
                        $newName = $individualFile->getName();
                    }else{
                        $newName = $individualFile->getRandomName();
                    }
                    $individualFile->move(FCPATH . 'uploads/', $newName);
    
                    $filePath = 'uploads/' . $newName;
                    $data = [
                        'worksheetID' => $certificate_id,
                        'worksheetType' => $module_Number,
                        'path' => $filePath,
                        'imageName' => $newName,
                        'fileType' => $fileType,
                    ];
                    $mainModel->insert($data);
                    $imageID = $mainModel->insertID();
                    array_push($imageIDArray, $imageID);
                }
            }
        }
        return json_encode(['imageIDArray' => $imageIDArray]);   
    }

    public function get_image_data(){
        $imageModel = new ImageModel(); 
        $worksheetType = $this->request->getPost('worksheetType');
        $worksheetID = $this->request->getPost('worksheetID');
        $results['files_data'] = $imageModel->where('worksheetType', $worksheetType)->where('worksheetID', $worksheetID)->findAll();
        return $this->response->setJSON($results);
    }

    function update_worksheet_image(){
        $worksheetType = $this->request->getPost('worksheetType');
        switch ($worksheetType) {
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

        $data = [
            'images' => $this->request->getPost('images')
        ];
        $ID = $this->request->getPost('certificateID');
        $mainModel->update($ID,$data);
    }

    function get_worksheet_image_data(){
        $worksheetType = $this->request->getPost('worksheetType');
        switch ($worksheetType) {
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

        $worksheetID = $this->request->getPost('worksheetID');
        $results = $mainModel->where('id', $worksheetID)->select("images")->first();    
        return $this->response->setJSON($results);
    }

    function update_worksheet_status(){
       $worksheetType = $this->request->getPost('worksheetType');
       switch ($worksheetType) {
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
       $data = [
              'completion' => $this->request->getPost('completion')
       ];
       $worksheetID = $this->request->getPost('worksheetID');
       $mainModel->update($worksheetID,$data);
    }

}