<?php 
ini_set('memory_limit', '1024M'); // or you could use 1G

    $path = 'image/dost.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    $pathPAB = 'image/pressure.png';
    $typePAB = pathinfo($pathPAB, PATHINFO_EXTENSION);
    $dataPAB = file_get_contents($pathPAB);
    $base64PAB = 'data:image/' . $typePAB . ';base64,' . base64_encode($dataPAB);

    $pathIllusa = 'image/SREBillustrationA.png';
    $typeIllusa = pathinfo($pathIllusa, PATHINFO_EXTENSION);
    $dataIllusa = file_get_contents($pathIllusa);
    $base64Illusa = 'data:image/' . $typeIllusa . ';base64,' . base64_encode($dataIllusa);

    $pathIllusB = 'image/SREBillustrationB.png';
    $typeIllusB = pathinfo($pathIllusB, PATHINFO_EXTENSION);
    $dataIllusB = file_get_contents($pathIllusB);
    $base64IllusB = 'data:image/' . $typeIllusB . ';base64,' . base64_encode($dataIllusB);

    $pathIllusDraft = 'image/draft.png';
    $typeIllusDraft = pathinfo($pathIllusDraft, PATHINFO_EXTENSION);
    $dataIllusDraft = file_get_contents($pathIllusDraft);
    $base64IllusDraft = 'data:image/' . $typeIllusDraft . ';base64,' . base64_encode($dataIllusDraft);
?>


<!DOCTYPE html>
<html lang="en">
<style>
    .container{
        display: flex;
    }
    .borderYes{
        border-style: solid;
        border-width: 1px;
    }
    .padding{
        padding:10px
    }
    .head{
        flex-direction:row;
    }

        table.GeneratedTable {
    background-color: #ffffff;
    border-collapse: collapse;
    border-width: 1px;
    border-color: black;
    border-style: solid;
    color: #000000;
    }

    table.GeneratedTable td, table.GeneratedTable th {
    border-width: 1px;
    border-color: black;
    border-style: solid;
    padding: 2px;
    text-align:center;
    }

    table.GeneratedTable thead {
    background-color: #ffffff;
    }


    @font-face {
            font-family: "source_sans_proregular";           
            src: local("Calibri"), url("fonts/sourcesans/sourcesanspro-calibri.ttf") format("truetype");
            font-weight: normal;
            font-style: normal;

        }        
        body{
            font-family: "source_sans_proregular", Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;            
        }
        @media print {
        .myimage {
            image-resolution: 3200dpi;
        }
        }

        table{
            border:solid 1px;
        }
   </style>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calibration Woorksheet</title>	
</head>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@3.4.1/dist/chart.min.js "></script> 

<body style="padding: 15px; ">
    <div style="font-size: .75em; margin-top: 10px; margin-bottom: 10px;">
        <center>Republic of the Philippines</center> 
        <center><h4 style="color: blue;">DEPARTMENT OF SCIENCE AND TECHNOLOGY</h4></center>
        <center>CALABARZON</center>
        <center><h4>Regional Metrology Laboratory</h4></center>
        <center><h4>Calibration Worksheet</h4></center>
        <center><u><i>CP-004</i></u> : Electrical Meter</center>
      
    </div>
    <div style="font-size: .7em;">
        <table class="table" style="text-align: left;">
            <tr>
                <td colspan="2">Certificate No.:</td>
                <td>Date Received:</td>
            </tr>
            <tr>
                <td colspan="2">Customer:</td>
                <td>Date Calibrated:</td>

            </tr>
            <tr>
                <td colspan="2" rowspan="2" style="vertical-align: top;">Address:</td>
                <td>Recommended Due Date:</td>
            </tr>
            <tr>
                <td>Place of Calibraton:</td>
            </tr>
            <tr>
                <td>Equipment Description: </td>
                <td>Start Temp (°C):</td>
                <td>Start RH (% RH):</td>
            </tr>
            <tr>
                <td>Manufacturer:</td>
                <td>End Temp (°C): </td>
                <td>End RH (% RH):</td>
            </tr>
            <tr>
                <td colspan="3">Model No.:</td>
            </tr>
            <tr>
                <td colspan="3">Serial No.:</td>
            </tr>
            <tr>
                <td colspan="3">Equipment ID:</td>
            </tr>
        </table>
    </div>

    <div>
        <table class="table2" style="font-size: .7em; text-align: left;">
            <tr>
                <th colspan="2"><center>Preliminary Inspection</center></th>
            </tr>
            <tr>
                <td colspan="2">
                    <label>
                        <input type="checkbox">Visual Inspection (clean the equipment w/ soft cloth to remove dust and small particles)
                    </label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>
                        <input type="checkbox">
                        Check the surface and edges of the equipment for any damages. (note in remarks)
                    </label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>
                        <input type="checkbox"> Check the protective window of the equipment for cracks/scratches, color change, and broken window 
                    </label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>
                        <input type="checkbox"> Check if the stylus or pointer move smoothly when applied with increasing and decreasing test point
                    </label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>
                        <input type="checkbox"> Check if the battery and the fuse are still in good condition
                    </label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>
                        <input type="checkbox">Check the continuity of the test leads
                    </label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>
                        <input type="checkbox">Record all necessary and vital information
                    </label>
                </td>
            </tr>
        </table>
    </div>

    <div>
        <table class="table" style="font-size: .7em; text-align: center;">
            <tr>
                <th colspan="5"><center>Measurement Data</center></th>
            </tr>
            <tr style="text-align: left;" >
                <td>___ AC ___ DC</td>
                <td>Function</td>
                <td>Range</td>
                <td>Res/Grad'n:</td>
                <td>Readability</td>
            </tr>
            <tr>
                <td colspan="2">Test Points</td>
                <td>Trial 1</td>
                <td>Trial 2</td>
                <td>Trial 3</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>

    <div>
        <table class="table" style="font-size: .7em; text-align: center;">
            <tr>
                <th colspan="5"><center>Measurement Data</center></th>
            </tr>
            <tr style="text-align: left;" >
                <td>___ AC ___ DC</td>
                <td>Function</td>
                <td>Range</td>
                <td>Res/Grad'n:</td>
                <td>Readability</td>
            </tr>
            <tr>
                <td colspan="2">Test Points</td>
                <td>Trial 1</td>
                <td>Trial 2</td>
                <td>Trial 3</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
    
    <div>
        <table class="table" style="font-size: .7em; text-align: center;">
            <tr>
                <th colspan="5"><center>Measurement Data</center></th>
            </tr>
            <tr style="text-align: left;" >
                <td>___ AC ___ DC</td>
                <td>Function</td>
                <td>Range</td>
                <td>Res/Grad'n:</td>
                <td>Readability</td>
            </tr>
            <tr>
                <td colspan="2">Test Points</td>
                <td>Trial 1</td>
                <td>Trial 2</td>
                <td>Trial 3</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>

    <div>
        <table class="table2" style="font-size: .7em;">
            <tr>
                <td style="height: 40px; vertical-align: top;">Remarks:</td>
            </tr>
        </table>
    </div>

    <div>
        <table class="table" style="text-align: left; font-size: .7em;">
            <tr>
                <th colspan="2"><center><b>Standard Used </center></th>
            </tr>
            <tr>
                <td>Standard Description:</td>
                <td rowspan="2">Remarks:</td>
            </tr>
            <tr>
                <td>Manufacturer</td>
            </tr>
            <tr>
                <td>Model No.:</td>
                <td rowspan="3">Accessories:</td>
            </tr>
            <tr>
                <td>Serial No.:</td>
            </tr>
            <tr>
                <td>Date of Next Calibration:</td>
            </tr>
        </table>
    </div>

    <div>
        <table class="table mt-2" style="text-align: left; font-size: .7em; ">
            <tr>
                <td>Time Started:</td>
                <td rowspan="2">Calibrated by:</td>
                <td>Checked by:</td>
            </tr>
            <tr>
                <td>Time Started:</td>
                <td>Date:</td>
            </tr>
        </table>
    </div>

   <div style="font-size: .5em;">
        <table style=" border-collapse: collapse; border: none; width: 100%; text-align: right; z-index: -1;">
            <tr><td>Page ____ of ____</td></tr>
            <tr><td>CP-004-F1 Rev. 0</td></tr>
            <tr><td>Effectivity Date: 27 August 2019</td></tr>
        </table>
    </div>
 </body>
   <style>
    * {
      margin: 0;
    }
.table {
    table-layout: fixed; /* Use fixed table layout */
    border-collapse: collapse; /* Optional: Collapses the border into a single border */
    width: 100%; /* Optional: Set the table width */
    border: 1px solid #000; /* 1px solid black border for the whole table */
    text-align: right;
}
.table th, .table td {
    border: 1px solid #000; /* 1px solid black border for table cells */
    padding: 2px; /* Optional: Add padding to cells for spacing */
    height: 10px;
    vertical-align: middle; /* Vertically align content within the cell */
}
input[type="text"] {
  border: none; /* Remove the border */
  /* Additional styling if needed */
}
.table2 {
  border-collapse: collapse; /* Optional: Collapses the border into a single border */
  width: 100%; /* Optional: Set the table width */
}
.table3 {
  border-collapse: collapse; /* Optional: Collapses the border into a single border */
  width: 100%; /* Optional: Set the table width */
}
.table3 th, .table3 td {
    text-align: left;
    padding: 2px;
}
.table4 {
    table-layout: fixed; /* Use fixed table layout */
    border-collapse: collapse; /* Optional: Collapses the border into a single border */
    width: 100%; /* Optional: Set the table width */
    border: 1px solid #000; /* 1px solid black border for the whole table */
    text-align: left;
}
.table4 th, .table4 td {
    vertical-align: center;
    border: 1px solid #000; /* 1px solid black border for table cells */'
}
input[type="checkbox"] {
      transform: scale(.5); /* Adjust the scale value for the desired size */
      vertical-align: middle; /* Vertically align label and checkbox */
    }
    label{
      display: inline-block;
      cursor: pointer;
      vertical-align: middle; /* Vertically align label and checkbox */
    }
    .table5 {
    table-layout: fixed; /* Use fixed table layout */
    border-collapse: collapse; /* Optional: Collapses the border into a single border */
    width: 100%; /* Optional: Set the table width */
    border: 1px solid #000; /* 1px solid black border for the whole table */
    text-align: center;
}
.table5 th, .table5 td {
    border: 1px solid #000; /* 1px solid black border for table cells */
    padding: 2px; /* Optional: Add padding to cells for spacing */
    height: 12px;
    vertical-align: middle; /* Vertically align content within the cell */
}
table td{
    padding: 0;
}


   </style>
</html>   