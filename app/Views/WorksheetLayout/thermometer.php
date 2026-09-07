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
        <center><h4>Calibration Worksheet for Thermometers</h4></center>
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
                    <td colspan="3" style="text-align: center ;">Equipment Description:</td>
                </tr>  
            </thead>
            <tbody style="font-size: .7em;">
                <tr>
                    <td>
                        <label>
                            <input type="checkbox">Bimetal thermometer
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox">Digital thermometer 
                        </label>
                    </td>
                    <td>Range :</td>
                </tr>
                <tr>
                    <td>
                        <label>
                            <input type="checkbox">L-I-G thermometer
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox">Temperature controller
                        </label>
                    </td>
                    <td>Resolution/Graduation :</td>
                </tr>
                <tr>
                    <td>
                        <label>
                            <input type="checkbox">Gas-filled thermometer
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox">Temperature recorder
                        </label>
                    </td>
                    <td>Readability :</td>
                </tr> 
                <tr>
                    <td>
                        <label>
                            <input type="checkbox">Industrial glass thermometer
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox">Others: </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div style="">
        <table class="table" style=" text-align: left;">
            <thead style="font-size: .7em;">
                <tr>
                    <td colspan="2" style="text-align: center ;">Equipment Description:</td>
                </tr>  
            </thead>
            <tbody style="font-size: .7em;">
                <tr>
                    <td>Readout (or details of UUC if sensor is built-in or analog/mechanical type)</td>
                    <td>Sensor Type (if applicable):</td>
                </tr>
                <tr>
                    <td>Manufacturer:</td>
                    <td>Manufacturer:</td>
                </tr>
                <tr>
                    <td>Model :</td>
                    <td>Model :</td>
                </tr>
                <tr>
                    <td>Serial No.:</td>
                    <td>Serial No.:</td>
                </tr>
                <tr>
                    <td>Equipment ID:</td>
                    <td>Equipment ID:</td>
                </tr>
                <tr>
                    <td><i>Immersion Depth:</i></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <table style="width: 100%; font-size: .7em;">
            <tr>
                <td>If UUC is Liquid-In-Glass thermometer</td>
                <td>
                    <label>
                        <input type="checkbox">Total Immersion
                    </label>
                </td>
                <td>
                    <label>
                        <input type="checkbox">Partial immersion with depth of
                    </label>
                </td>
                <td>mm from bulb tip</td>
            </tr>
        </table>
    </div>

    <div>
        <table class="table3" >
            <thead style="font-size: .7em;">
                <tr>
                    <td style="border: 1px solid black;"><center>Preliminary Inspection</center></td>
                    <td style="border: 1px solid black;"><center>Environment Condition</td>
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
                    <td style="border: 1px solid black;">Start Temp (°C):</td>
                </tr>
                <tr>
                    <td>
                        <label>
                            <input type="checkbox">
                            Check the surface and edges of the equipment for any damages. (note in remarks)
                        </label>
                    </td>
                    <td style="border: 1px solid black;">Start RH (% RH):</td>
                </tr>
                <tr>
                    <td>
                        <label>
                            <input type="checkbox">
                            Check the protective window of the equipment for cracks/scratches, color change, and broken window
                        </label>
                    </td>
                    <td style="border: 1px solid black;">End Temp (°C):</td>
                </tr>
                <tr>
                    <td>
                        <label>
                            <input type="checkbox">
                            Record all necessary and vital information
                        </label>
                    </td>
                    <td style="border: 1px solid black;">End RH (% RH):</td>
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
                <tr style="text-align: center;">
                   <td rowspan="2" style="vertical-align: middle;">Test Points, <br>°C</td>
                   <td rowspan="2" style="vertical-align: middle;">Standard <br>Used</td>
                   <td rowspan="2" style="vertical-align: middle;">Temp. <br>Source</td>
                   <td colspan="3">UUC reading, °C</td>
                   <td colspan="3">Standard reading, °C</td>
                </tr>
                <tr style="text-align: center;">
                    <td>TRIAL 1</td>
                    <td>TRIAL 2</td>
                    <td>TRIAL 3</td>
                    <td>TRIAL 1</td>
                    <td>TRIAL 2</td>
                    <td>TRIAL 3</td>
                </tr>
                <tr>
                    <td>0</td>
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
                    <td>-40</td>
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
                    <td>-20</td>
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
                    <td>-10</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                </tr>
                <tr>
                    <td>10</td>
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
                    <td>37</td>
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
                    <td>50</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                </tr>
                <tr>
                    <td>75</td>
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
                    <td>100</td>
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
                    <td>150</td>
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
                    <td>200</td>
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
                    <td>230</td>
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
                    <td>0</td>
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
        <table class="table4" style=" width: 100%;">
            <thead style="font-size: .7em;">
                <tr>
                    <th colspan="2">Standards</th>
                    <th colspan="2">Temperature Source</th>
                </tr>
            </thead>
            <tbody style="font-size: .6em;">
                <tr>
                    <td style="text-align: center; width: 2%;"><b>A</b></td>
                    <td>P.R.T.; Isotech; 935-14-116; S/N: 32452/2 (with readout Isotech TTI-7+; S/N: 32452/1)</td>
                    <td style="text-align: center; width: 2%;"><b>A</b></td>
                    <td>Ice bath</td>
                </tr>
                <tr>
                    <td style="text-align: center;"><b>B</b></td>
                    <td>B P.R.T.; Isotech; 935-14-116; S/N: 32452/3 (with readout Isotech TTI-7+; S/N: 32452/1) </td>
                    <td style="text-align: center;"><b>B</b></td>
                    <td>Dryblock; Isotech; Fastcal; S/N: 281198-15</td>
                </tr>
                <tr>
                    <td style="text-align: center;"><b>C</b></td>
                    <td>P.R.T. (Bended); Fluke; 5609; S/N: 03304 (with readout Fluke 1524; S/N: 2078009)</td>
                    <td style="text-align: center;"><b>C</b></td>
                    <td>Stirred Liquid Bath; Hart Scientific; 7341; S/N: A48046</td>
                </tr>
                <tr>
                    <td style="text-align: center;"><b>D</b></td>
                    <td>P.R.T.; Fluke; 5616-12; S/N: 1003058 (with readout Fluke 1524; S/N: 2078009)</td>
                    <td style="text-align: center;"><b>D</b></td>
                    <td>Stirred Liquid Bath; Isotech; 798 EHT; S/N: 32452/6</td>
                </tr>
                <tr>
                    <td style="text-align: center;"><b>E</b></td>
                    <td>P.R.T.; Fluke; 5616-12; S/N: 98773 (with readout Fluke 1523; S/N: 3491454)</td>
                    <td style="text-align: center;"><b>E</b></td>
                    <td>Stirred Liquid Bath; Isotech; 798 m; S/N: 33826/2</td>
                </tr>
                <tr>
                    <td style="text-align: center;"><b>F</b></td>
                    <td>P.R.T.; Fluke; 5616-12; S/N: 98769 (with readout Fluke 1523; S/N: 3491456)</td>
                    <td style="text-align: center;"><b>F</b></td>
                    <td>Isothermal Calibration Bath; Fluke; 7342A; S/N: B8C004</td>
                </tr>
                <tr>
                    <td style="text-align: center;"><b>G</b></td>
                    <td>P.R.T.; Fluke; 5616-12; S/N: 98770 (with readout Fluke 1523; S/N: 3491452)</td>
                    <td style="text-align: center;"><b>G</b></td>
                    <td>Micro-bath; Fluke; 7103; S/N: B51880</td>
                </tr>
                <tr>
                    <td style="text-align: center;"><b>H</b></td>
                    <td>Digital Thermometer "Stik" with probe; Fluke 1551A; S/N: 4010016</td>
                    <td style="text-align: center;"><b>H</b></td>
                    <td>Portable Calibration Bath; Fluke; 7109A; S/N: 4387006</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="text-align: center;"><b>I</b></td>
                    <td>Portable Calibration Bath; Fluke; 6109A; S/N: 4334001</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>&nbsp; </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>&nbsp; </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>&nbsp; </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
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
                    <td><label><input type="checkbox">Calibration was performed</label></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox">No adjustment was done</label></td>
                </tr>
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
            <tr><td>Page ___ of ___</td></tr>
            <tr><td>CP-011-F1 Rev. 1</td></tr>
            <tr><td>Effectivity Date : 01 August 2020</td></tr>
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
    height: 20px;
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