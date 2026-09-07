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

class WorksheetLayout extends BaseController{

    public function __construct(){
		helper(['url', 'form']);
        
        // if (session()->get('role') != "admin") {
        //     echo 'Access denied!';
        //     exit;
        // }     
	}

    function SingleRange(){
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     

        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('WorksheetLayout/sreb'));
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream(".pdf",array("Attachment" => 0));
    }

    function testWeight(){
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     

        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('WorksheetLayout/testweight'));
        $dompdf->setPaper('legal', 'portrait');
        $dompdf->render();
        $dompdf->stream(".pdf",array("Attachment" => 0));
    }
    
    function phMeter(){
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     

        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('WorksheetLayout/phmeter'));
        $dompdf->setPaper('legal', 'portrait');
        $dompdf->render();
        $dompdf->stream(".pdf",array("Attachment" => 0));
    }

    function thermoHygrometer(){
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     

        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('WorksheetLayout/thermohygrometer'));
        $dompdf->setPaper('legal', 'portrait');
        $dompdf->render();
        $dompdf->stream(".pdf",array("Attachment" => 0));
    }
    function pressureGauge(){
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     

        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('WorksheetLayout/pressuregauge'));
        $dompdf->setPaper('legal', 'portrait');
        $dompdf->render();
        $dompdf->stream(".pdf",array("Attachment" => 0));
        
    }
    function tempEnclosure(){
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     

        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('WorksheetLayout/tempenclosure'));
        $dompdf->setPaper('legal', 'portrait');
        $dompdf->render();
        $dompdf->stream(".pdf",array("Attachment" => 0));
        
    }
    function thermometer(){
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     

        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('WorksheetLayout/thermometer'));
        $dompdf->setPaper('legal', 'portrait');
        $dompdf->render();
        $dompdf->stream(".pdf",array("Attachment" => 0));
        
    }

    function autoclave(){
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     

        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('WorksheetLayout/autoclave'));
        $dompdf->setPaper('legal', 'portrait');
        $dompdf->render();
        $dompdf->stream(".pdf",array("Attachment" => 0));
        
    }
    
    function timer(){
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     

        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('WorksheetLayout/timer'));
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream(".pdf",array("Attachment" => 0));
        
    }

    function electricmeter(){
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     

        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('WorksheetLayout/electricmeter'));
        $dompdf->setPaper('legal', 'portrait');
        $dompdf->render();
        $dompdf->stream(".pdf",array("Attachment" => 0));
        
    }

    function volumetric(){
        $options = new Options();
        $options->set('isJavascriptEnabled', TRUE); 
        $options->set('isHtml5ParserEnabled', TRUE);     

        $customPaper = array(0, 0, 595.28, 841.89); 
        $dompdf = new \Dompdf\Dompdf($options); 
        $dompdf->loadHtml(view('WorksheetLayout/volumetric'));
        $dompdf->setPaper('legal', 'portrait');
        $dompdf->render();
        $dompdf->stream(".pdf",array("Attachment" => 0));
        
    }
    


}