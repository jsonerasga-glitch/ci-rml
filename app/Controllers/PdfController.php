<?php 
namespace App\Controllers;
use CodeIgniter\Controller;


class PdfController extends Controller{
   
    public function index(){
        return view('edit');
    }

    function htmlToPDF(){
        $dompdf = new \Dompdf\Dompdf(); 
        $dompdf->loadHtml(view('edit'));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream();
    }

}