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
        <center><h4>DEPARTMENT OF SCIENCE AND TECHNOLOGY</h4></center>
        <center><h4>CALABARZON</h4></center>
        <center>Regional Metrology Laboratory</center>
        <center>Calibration Worksheet for Autoclaves and Liquid Baths</center>
    </div>
    <div style="font-size: .7em;">
        <table class="table" style="text-align: left;">
            <tr>
                <td colspan="2">Certificate No.:</td>
                <td colspan="2">Date Received:</td>
            </tr>
            <tr>
                <td colspan="2">Customer:</td>
                <td colspan="2">Date Calibrated:</td>

            </tr>
            <tr>
                <td colspan="2">Place of Calibration:</td>
                <td colspan="2">Recommended Due Date:</td>
            </tr>
        </table>
    </div>
    <div style="">
        <table class="table" style=" text-align: left;">
            <thead style="font-size: .7em;">
            <tr>
                <td colspan="6"><center><b>Equipment Description</b></center></td>
            </tr>
                <tr>
                    <td>
                        <label>
                            <input type="checkbox">Water Bath
                        </label></td>
                    <td>
                        <label>
                            <input type="checkbox">Oil Bath
                        </label></td>
                    <td>
                        <label>
                            <input type="checkbox">Autoclave
                        </label>
                    </td>
                    <td colspan="3"></td>
                </tr>  
                <tr> 
                    <td colspan="3">
                        <label>
                            <input type="checkbox">Others:
                        </label>
                    </td>
                    <td colspan="3"><center>Temperature Controller</center></td>
                </tr>
            </thead>
            <tbody style="font-size: .7em;">
                <tr>
                    <td colspan="3">Manufacturer:</td>
                    <td>
                        <label>
                            <input type="checkbox">digital
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox">analog
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox">default
                        </label>
                    </td>
                  </tr>
                <tr>
                    <td colspan="3">Model No.:</td>
                    <td colspan="3"><center>Temperature readout /Indicator</center></td>
                </tr>
                <tr style="">
                    <td colspan="3">Serial No.:</td>
                    <td>
                        <label>
                            <input type="checkbox">without readout
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox">analog/mechanical
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox">digital
                        </label>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">Equipment ID:</td>
                    <td colspan="2">Resolution/Graduation :</td>
                    <td>Readability :</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <table class="table" style="font-size: .6em; text-align: left;">
            <tr>
                <th colspan="2"><center>Preliminary Inspection</center></th>
                <th><center>Environment Condition</center></th>
            </tr>
            <tr>
                <td colspan="2">
                    <label>
                        <input type="checkbox">Visual Inspection (clean the equipment with soft cloth to remove dust and small
                        particles)
                    </label>
                </td>
                <td>Start Temp (°C):</td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>
                        <input type="checkbox">
                        Check the protective window of the equipment for cracks/scratches, color change, and broken window</label>
                </td>
                <td>Start RH (% RH):</td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>
                        <input type="checkbox">
                        Check the surface and edges of the equipment for any damages. (note in remarks) 
                    </label>
                </td>
                <td>End Temp (°C):</td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>
                        <input type="checkbox"> Record all necessary and vital information 
                    </label>
                </td>
                <td>End RH:</td>
            </tr>
        </table>
    </div>

    <div>
        <table class="table" style="text-align: center;">
            <thead style="font-size: .7em;">
                <tr>
                    <th colspan="10"><center>Measurement Data</center></th>
                </tr>
            </thead>
            <tbody style="font-size: .7em;">
               <tr>
                <td rowspan="2">
                    Temperature<br> requirement<br>_____
                </td>
                <td rowspan="2">
                    Test point <br>_____
                </td>
                <td rowspan="2">
                Temperature <br> setting <br>_____
                </td>
                <td rowspan="2">
                    Standard <br> used
                </td>
                <td colspan="3">
                    UUC reading, _____
                </td>
                <td colspan="3">
                    Standard reading, _____
                </td>
               </tr>
               <tr>
                <td>Trial 1 </td>
                <td>Trial 2 </td>
                <td>Trial 3 </td>
                <td>Trial 1 </td>
                <td>Trial 2 </td>
                <td>Trial 3 </td>
               </tr>
                <tr>
                    <td></td>
                    <td></td>
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
                    <td></td>
                    <td></td>
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
                    <td></td>
                    <td></td>
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
                    <td></td>
                    <td></td>
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
                    <td></td>
                    <td></td>
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
                    <td></td>
                    <td></td>
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
                    <td></td>
                    <td></td>
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
                    <td></td>
                    <td></td>
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
                    <td></td>
                    <td></td>
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
                    <td></td>
                    <td></td>
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
        <table class ="table" style="text-align: left; font-size: .6em;">
            <tr>
                <td colspan ="2"><center><b>Calibration standard</b></center></td>
                <td><center><b>Measurement location</b></center></td>
            </tr>
            <tr>
                <td width="2%">A</td>
                <td>Wireless Data Logger; Ellab; TrackSense® Pro Compact S/N: 256882</td>
                <td rowspan="22"></td>
            </tr>
            <tr>
                <td width="2%">B</td>
                <td>Wireless Data Logger; Ellab; TrackSense® Pro Compact S/N: 256888</td>
            </tr>
            <tr>
                <td width="2%">C</td>
                <td>Wireless Data Logger; Ellab; TrackSense® Pro Compact S/N: 256899</td>
            </tr>
            <tr>
                <td width="2%">D</td>
                <td>Wireless Data Logger; Ellab; TrackSense® Pro Compact S/N: 398825</td>
            </tr>
            <tr>
                <td width="2%">E</td>
                <td>Wireless Data Logger; Ellab; TrackSense® Pro Compact S/N: 398828</td>
            </tr>
            <tr>
                <td width="2%">F</td>
                <td>Wireless Data Logger; Ellab; TrackSense® Pro Compact S/N: 398841</td>
            </tr>
            <tr>
                <td width="2%">G</td>
                <td>Wireless Data Logger; Ellab; TrackSense® Pro Compact S/N: 398850</td>
            </tr>
            <tr>
                <td width="2%">H</td>
                <td>Wireless Data Logger; Ellab; TrackSense® Pro Compact S/N: 398855</td>
            </tr>
            <tr>
                <td width="2%">I</td>
                <td>Wireless Data Logger; Ellab; TrackSense® Pro Compact S/N: 398857</td>
            </tr>
            <tr>
                <td width="2%">J</td>
                <td>Wireless Data Logger; Ellab; TrackSense® Pro Compact S/N: 398961</td>
            </tr>
            <tr>
                <td width="2%">K</td>
                <td>Wireless Data Logger; Ellab; TrackSense® Pro Compact S/N: 398964</td>
            </tr>
            <tr>
                <td width="2%">L</td>
                <td>Wireless Data Logger; Ellab; TrackSense® Pro Compact S/N: 398981</td>
            </tr>
            <tr>
                <td width="2%">M</td>
                <td>Wireless Data Logger; Ellab; TrackSense® Pro Compact S/N: 424923</td>
            </tr>
            <tr>
                <td width="2%">N</td>
                <td>Wireless Data Logger; Ellab; TrackSense® Pro Compact S/N: 424933</td>
            </tr>
            <tr>
                <td width="2%">O</td>
                <td>Wireless Data Logger; Ellab; TrackSense® Pro Compact S/N: 424975</td>
            </tr>
            <tr>
                <td width="2%">P</td>
                <td>Wireless Data Logger; Ellab; TrackSense® Micro PRS/TMP 2G S/N: 398013</td>
            </tr>
            <tr>
                <td width="2%">Q</td>
                <td>Wireless Data Logger; Ellab; TrackSense® Pro Pressure Combi S/N: 461294</td>
            </tr>
            <tr>
                <td width="2%">R</td>
                <td>Wireless Data Logger; Ellab; TrackSense® Pro Pressure Combi S/N: 461381</td>
            </tr>
            <tr>
                <td width="2%">S</td>
                <td>Wireless Data Logger; Ellab; TrackSense® Pro Single Temperature S/N: 460673</td>
            </tr>
            <tr>
                <td width="2%">T</td>
                <td>Wireless Data Logger; Ellab; TrackSense® Pro Single Temperature S/N: 460737</td>
            </tr>
            <tr>
                <td width="2%">U</td>
                <td>Temperature Data Logger; Yokogawa; FX 112-1-2; S/N: S5D607665 with Thermocouple</td>
            </tr>
            <tr>
                <td width="2%">V</td>
                <td>Temperature Data Logger; Yokogawa; FX1012; S/N: S5UC09154 with Thermocouple</td>
            </tr>
            <tr>
                <td width="2%">W</td>
                <td> Temperature Data Logger; Yokogawa; FX1012; S/N: S5UC09155 with Thermocouple</td>
                <td rowspan="2" style="text-align: center;">Graphical Representation of the measurement locations of the UUC</td>
            </tr>
            <tr>
                <td width="2%">X</td>
                <td>Temperature Data Logger; Graphtec; GL820; S/N: H31173261 with Thermocouple</td>
            </tr>
        </table>
    </div>
    

    <div>
        <table class="table2" style="font-size: .7em;">
            <tr>
                <td colspan="2">
                    <center>
                        <b> Remarks</b>
                    </center>
                </td>
            </tr>
            <tr>
                <td>
                    <label>
                        <input type="checkbox">Loaded
                    </label>
                </td>
                <td>
                    <label>
                        <input type="checkbox">Unloaded
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <label>
                        <input type="checkbox">Standard/s, accessory/ies, and UUC are in good condition before and after calibration
                    </label>
                </td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <label>
                        <input type="checkbox">Calibration was performed 
                    </label>
                </td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <label>
                        <input type="checkbox">No adjustment was done 
                    </label>
                </td>
                <td></td>
            </tr>
            <tr>
                <td><label><input type="checkbox">Others: </label></td>
                <td></td>
            </tr>
        </table>
    </div>

<div>
    <table class="table" style="text-align: left; font-size: .7em;">
        <tr>
            <td>Calibrated by:</td>
            <td>Encoded by:</td>
            <td>Checked by:</td>
        </tr>
    </table>
</div>

    <div style="font-size: .5em;">
        <table style=" border-collapse: collapse; border: none; width: 100%; text-align: right; z-index: -1;">
            <tr><td>Page ___ of ___ </td></tr>
            <tr><td>CP-009-F2 Rev. 0</td></tr>
            <tr><td>Effectivity Date: 01 December 2022</td></tr>
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