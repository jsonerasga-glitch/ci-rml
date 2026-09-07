<?php 
ini_set('memory_limit', '1024M'); // or you could use 1G

    $path = 'image/dost.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    $pathPAB = 'image/pab logo.png';
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
        <center><p>Republic of the Philippines</p></center> 
        <center><h4>DEPARTMENT OF SCIENCE AND TECHNOLOGY</h4></center>
        <center>CALABARZON</center>
        <center><h4>Regional Metrology</h4></center>
    </div>
    <div style="font-size: .7em;">
        <table class="table" style="text-align: left;">
            <tr>
                <td style="width: 15%;">Certificate No.</td>
                <td style="width: 15%;">Date Received</td>
            </tr>
            <tr>
                <td>Customer</td>
                <td>Date Calibrated</td>
            </tr>
            <tr>
                <td>Place of Calibration</td>
                <td>Recommended Due Date:</td>
            </tr>
        </table>
    </div>
    <div style="">
        <table class="table" style=" text-align: left;">
            <thead style="font-size: .7em;">
                <tr>
                    <td colspan="2">Equipment Description:</td>
                </tr>  
            </thead>
            <tbody style="font-size: .7em;">
                <tr>
                    <td>Manufacturer:</td>
                    <td>Start Temp (°C):</td>
                </tr>
                <tr>
                    <td>Model No.:</td>
                    <td>End Temp (°C):</td>
                </tr>
                <tr>
                    <td>Serial No.:</td>
                    <td>Start RH (% RH):</td>
                </tr>
                <tr>
                    <td>Equipment ID:</td>
                    <td>End RH (% RH):</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <table class="table3" >
            <thead style="font-size: .7em;">
                <tr>
                    <td style=""><center>Preliminary Inspection</center></td>
                </tr>
            </thead>
            <tbody style="font-size: .7em;">
                <tr>
                    <td style="">
                            <label>
                                <input type="checkbox">
                                Visual Inspection (clean the equipment w/ soft cloth to remove dust and small particles)
                            </label>
                        </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            <input type="checkbox">
                            Check the surface and edges of the equipment for any damages. (note in remarks)
                        </label>
                    </td>
                    
                </tr>
                <tr>
                    <td>
                        <label>
                            <input type="checkbox">
                            Check the protective window of the equipment for cracks/scratches, color change, and broken window
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            <input type="checkbox">
                            Record all necessary and vital information
                        </label>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <table class="table4" style="text-align: center;">
            <thead style="font-size: .75em;">
                <tr>
                    <td colspan="9"><center>Measurement Data</center></td>
                </tr>
            </thead>
            <tbody style="font-size: .65em;">
                <tr style="text-align: left;">
                    <td>Function: </td>
                    <td colspan="2"><b>Temperature</b></td>
                    <td colspan="2">Range: 0 to 50 °C</td>
                    <td colspan="2">Res/Grad'n:</td>
                    <td colspan="2">Readability:</td>
                </tr>
                <tr style="text-align: center;">
                   <td rowspan="2" style="vertical-align: middle;">Test Points, pH</td>
                   <td colspan="8">UUC READING ( at 25 °C Temp. Setting)</td>
                </tr>
                <tr style="text-align: center;">
                    <td>TRIAL 1</td>
                    <td>TRIAL 2</td>
                    <td>TRIAL 3</td>
                    <td>Average</td>
                    <td>TRIAL 1</td>
                    <td>TRIAL 2</td>
                    <td>TRIAL 3</td>
                    <td>Average</td>
                </tr>
                <tr>
                    <td>20</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>25</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>30</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>20</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <table class="table4" style="text-align: center;">
            <tbody style="font-size: .7em;">
                <tr style="text-align: left;">
                    <td>Function: </td>
                    <td colspan="2"><b>Temperature</b></td>
                    <td colspan="2">Range:</td>
                    <td colspan="2">Res/Grad'n:</td>
                    <td colspan="2">Readability:</td>
                </tr>
                <tr style="text-align: center;">
                   <td rowspan="2" style="vertical-align: middle;">Test Points, pH</td>
                   <td colspan="8">UUC READING ( at 25 °C Temp. Setting)</td>
                </tr>
                <tr style="text-align: center;">
                    <td>TRIAL 1</td>
                    <td>TRIAL 2</td>
                    <td>TRIAL 3</td>
                    <td>Average</td>
                    <td>TRIAL 1</td>
                    <td>TRIAL 2</td>
                    <td>TRIAL 3</td>
                    <td>Average</td>
                </tr>
                <tr>
                    <td>20</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>25</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>30</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>20</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td colspan="9" style="padding: 2px; text-align: left;"><p>Remarks:</p>
                    <label><input type="checkbox">Calibration was performed</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label><input type="checkbox">No adjustment was done </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="checkbox">Others:</label>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <table class="table4" style="text-align: center;">
            <tbody style="font-size: .7em;">
                <tr style="text-align: left;">
                    <td>Function: </td>
                    <td colspan="2"><b>Temperature</b></td>
                    <td colspan="2">Range:</td>
                    <td colspan="2">Res/Grad'n:</td>
                    <td colspan="2">Readability:</td>
                </tr>
                <tr style="text-align: center;">
                   <td rowspan="2" style="vertical-align: middle;">Test Points, pH</td>
                   <td colspan="8">UUC READING ( at 25 °C Temp. Setting)</td>
                </tr>
                <tr style="text-align: center;">
                    <td>TRIAL 1</td>
                    <td>TRIAL 2</td>
                    <td>TRIAL 3</td>
                    <td>Average</td>
                    <td>TRIAL 1</td>
                    <td>TRIAL 2</td>
                    <td>TRIAL 3</td>
                    <td>Average</td>
                </tr>
                <tr>
                    <td>40</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>60</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>40</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td colspan="9" style="padding: 2px; text-align: left;"><p>Remarks:</p>
                    <label><input type="checkbox">Calibration was performed</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label><input type="checkbox">No adjustment was done </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="checkbox">Others:</label>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <table class="table2">
            <thead style="font-size: .7em;">
                <tr>
                    <th>Standards and Accessories Used</th>
                </tr>
            </thead>
            <tbody style="font-size: .7em;">
                <tr>
                    <td><label><input type="checkbox">Temp. & Hum. Transmitter; E+E; EE31; S/N: 12099313038289 </label></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox">HygroLog; Rotronic; HL-NT2; S/N: 61830467</label></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox">PRT; Fluke; 1003058</label></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox">Climatic Chamber; Isuzu; TPAV-120-20; S/N: 0443970-01</label></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <table class="table2">
            <thead style="font-size: .7em;">
                <tr>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody style="font-size: .7em;">
                <tr>
                    <td><label><input type="checkbox"> Standard/s, accessory/ies, and UUC are in good condition before and after calibration</label></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox">Others:</label></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <table style="font-size: .7em; text-align: left; table-layout: fixed; border-collapse: collapse; width: 100%;">
            <tr>
                <th>Calibrated by</th>
                <th>Encoded by</th>
                <th>Checked by</th>
            </tr>
        </table>
    </div>
    <div style="font-size: .5em;">
        <table style=" border-collapse: collapse; border: none; width: 100%; text-align: right;">
            <tr><td>CP-012-F1 Rev. 0</td></tr>
            <tr><td>Effectivity Date : 27 Aug 2019</td></tr>
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
    height: 5px;
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