<?php namespace App\Controllers;

use App\Models\RML;
class CrudController extends BaseController
{
    public function index(){
        echo view('templates/header');
        $rml_calib = new RML();
        $data['rml_table'] = $rml_calib->findAll();
        return view('BourdonTubeIndustrialPressureGauge/CalibTable', $data);
    }

    public function store(){
        $rml_calib = new RML();
        $data = [
            'ccno' => $this->request->getPost('certificateNumber'),
            'costumer' => $this->request->getPost('customer'),
            'address' => $this->request->getPost('address'),
            'equipment' => $this->request->getPost('equipmentDescription'),
            'manufacturer' => $this->request->getPost('manufacturer'),
            'modelno' => $this->request->getPost('modelNumber'),
            'serialno' => $this->request->getPost('serialNumber'),
            'equipid' => $this->request->getPost('equipmentID'),
            'accuracy' => $this->request->getPost('accuracy'),
            'range_range' => $this->request->getPost('range'),
            'graduation' => $this->request->getPost('resolution'),
            'readability' => $this->request->getPost('readability'),
            'datereceived' => $this->request->getPost('dateReceived'),
            'datecalibrated' => $this->request->getPost('dateCalibrated'),
            'measurement' => $this->request->getPost('measurement'),
            'reccduedate' => $this->request->getPost('recommendedDueDate'),
            'placeofcalib' => $this->request->getPost('placeOfCalibration'),
            'capacity' => $this->request->getPost('capacity'),
            'ambtemp' => $this->request->getPost('tamb'),
            'relhumidity' => $this->request->getPost('rh'),
            'Patm' => $this->request->getPost('patm'),
            'prelimInspec' => $this->request->getPost('preliminaryInspection'),
            'MeasurementData' => $this->request->getPost('MeasurementData'),
            'hstd' => $this->request->getPost('hstd'),
            'huuc' => $this->request->getPost('huuc'),
            'heightDifference' => $this->request->getPost('heightDifference'),
            'medium' => $this->request->getPost('medium'),
            'remarks' => $this->request->getPost('remarks'),
            'standardDescription' => $this->request->getPost('standardDescription'),
            'standardManufacturer' => $this->request->getPost('standardManufacturer'),
            'standardModelNumber' => $this->request->getPost('standardModelNumber'),
            'standardSerialNumber' => $this->request->getPost('standardSerialNumber'),
            'dateOfNextCalibration' => $this->request->getPost('dateOfNextCalibration'),
            'standardRemarks' => $this->request->getPost('standardRemarks'),
            'standardAccessories' => $this->request->getPost('standardAccessories'),
            'timeStarted' => $this->request->getPost('timeStarted'),
            'timeFinished' => $this->request->getPost('timeFinished'),
            'calibratedBy' => $this->request->getPost('calibratedBy'),
            'checkedBy' => $this->request->getPost('checkedBy'),
            'daten' => $this->request->getPost('daten')
        ];
        $rml_calib->save($data);
        return redirect()->to(base_url('table'))->with('status', 'Data Added Successfully!');
    }

    public function edit($id){
        $rml = new RML();
        $data['rml_table'] = $rml->where('id', $id)->first(); 
        return view('BourdonTubeIndustrialPressureGauge/edit', $data);
    }

    function htmlToPDF($id){
        $rml = new RML();
        $data['rml_table'] = $rml->where('id', $id)->first();
        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf(); 
        $dompdf->loadHtml(view('BourdonTubeIndustrialPressureGauge/CalibrationCertificatePage1', $data));
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->set_option('isHtml5ParserEnabled', true);
        $dompdf->render();
        $dompdf->stream('RML Certificate #'.$id.".pdf",array("Attachment" => false));
    }
}


?>