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
        <center><h4>DOST CALABARZON</h4></center> 
        <center>Regional Metrology Laboratory</center>
        <center><h4>CALABARZON</h4></center>
        <center>CP-001: Calibration Worksheet for Pressure Gauge </center>
    </div>
    <div style="font-size: .7em;">
        <table class="table" style="text-align: left;">
            <tr>
                <td colspan="2">Certificate No.</td>
                <td colspan="2">Date Received</td>
            </tr>
            <tr>
                <td colspan="2">Customer</td>
                <td colspan="2">Date Calibrated</td>
            </tr>
            <tr>
                <td colspan="2">Place of Calibration</td>
                <td colspan="2">Recommended Due Date:</td>
            </tr>
        </table>
    </div>
    <div style="">
        <table class="table" style=" text-align: left;">
            <thead style="font-size: .7em;">
                <tr>
                    <td rowspan="2" colspan="2">Equipment Description: <br>
                        <label>
                            <input type="checkbox">Pressure Gauge
                        </label>
                        <label>
                            <input type="checkbox">Vacuum Gauge
                        </label>
                        <label>
                            <input type="checkbox">Compound Gauge
                        </label>
                    </td>
                    <td colspan="2">Capacity:</td>
                </tr>  
                <tr>
                    <td colspan="2">Range:</td>
                </tr>
            </thead>
            <tbody style="font-size: .7em;">
                <tr>
                    <td colspan="2">Manufacturer:</td>
                    <td colspan="2">Resolution/Graduation:<i>UUC</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>Std</i></td>
                </tr>
                <tr>
                    <td colspan="2">Model No.:</td>
                    <td colspan="2">Readability: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>UUC</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>Std</i></td>
                </tr>
                <tr style="">
                    <td colspan="2">Serial No.:</td>
                    <td colspan="2">Medium:
                        <br>
                        <label>
                            <input type="checkbox"> Air 
                        </label>
                        <label>
                            <input type="checkbox">Water 
                        </label>
                        <label>
                            <input type="checkbox">Oil
                        </label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Equipment ID:</td>
                    <td>Start Temp (°C):</td>
                    <td>Start RH (% RH):</td>
                </tr>
                <tr>
                    <td colspan="2">Accuracy (min/max, if not given):</td>
                    <td>End Temp (°C):</td>
                    <td>End RH (% RH):</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <table class="table" style="font-size: .7em; text-align: center;">
            <tr>
                <td rowspan="2">Calibration Sequence</td>
                <td rowspan="2">Measurement uncertainty aimed at, in % of the measurement span</td>
                <td rowspan="2">Number of measurement points with zero up/down</td>
                <td rowspan="2">Number of preloadings</td>
                <td rowspan="2">Load change + waiting time . .seconds</td>
                <td rowspan="2">Waiting time at upper limit of measurement range minutes</td>
                <td colspan="2">Number of measurement series</td>
            </tr>
            <tr>
                <td>up</td>
                <td>down</td>
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
            </tr>
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
                    <td style="">
                        <label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox">
                            Pointer
                        </label>
                        <label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox">
                            Threads
                        </label>
                        <label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox">
                            Sealing Surface
                        </label>
                        <label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox">
                            Pressure Channel
                        </label>
                        <label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox">
                            Window
                        </label>
                        <label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox">
                            Indication
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            <input type="checkbox">
                            Contamination and cleanliness (clean the equipment w/ soft cloth to remove dust and small particles)
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            <input type="checkbox">
                            Check if the stylus or pointer move smoothly when applied with increasing and decreasing pressure

                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox">
                            With initial reading of __________________
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            <input type="checkbox">
                            Apply increasing pressure (pre-loading) up to 80% of maximum capacity for at least 30 seconds.
                        </label>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<div>
    <table class="table" style="font-size: .7em; text-align: center;">
        <tr>
            <td colspan="6"><center>Measurement Data</center></td>
        </tr>
        <tr>
            <td colspan="2">1st Measurement Series, ____________</td>
            <td colspan="2">2nd Measurement Series, ____________</td>
            <td colspan="2">3rd Measurement Series, ____________</td>
        </tr>
        <tr>
            <td>UUC Reading</td>
            <td>Standard Reading</td>
            <td>UUC Reading</td>
            <td>Standard Reading</td>
            <td>UUC Reading</td>
            <td>Standard Reading</td>
        </tr>
        <tr>
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
        </tr>
        <tr>
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
        </tr>
        <tr>
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
        </tr>
        <tr>
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
        </tr>
        <tr>
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
        </tr>
        <tr>
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
        </tr>
    </table>
</div>

    <div>
        <table class="table2">
            <thead style="font-size: .7em;">
                <tr>
                    <td colspan="2"><center>Standards and Accessories Used</center></td>
                </tr>
            </thead>
            <tbody style="font-size: .7em;">
                <tr>
                    <td><label><input type="checkbox">GE Druck DPI 104 / SN 3593048 / Range 0 to 20 bar</label></td>
                    <td><label><input type="checkbox">GE Druck PV 621 / SN 3300383 / Range -1 to 20 bar</label></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox">GE Druck PM 620 / SN 2883658 / Range -1 to 20 bar </label></td>
                    <td><label><input type="checkbox"> GE Druck PV 622 / SN 3220689 / Range 0 to 20 bar</label></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox">GE Druck PM 620 / SN 3905003 / Range 0 to 100 bar</label></td>
                    <td><label><input type="checkbox">GE Druck PV 623 / SN 3299011 / Range 0 to 100 bar</label></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox"> GE Druck PM 620 / SN 3485385 / Range 0 to 1,000 bara</label></td>
                    <td><label><input type="checkbox"> Additel ADT918 / SN 11817090007/ Range -1 to 100 bar</label></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox">Fluke 718-30G / SN 4323213 / Range -12 to 30 psi </label></td>
                    <td><label><input type="checkbox">GE Druck DPI 620 Gen ii / SN 5217868 </label></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox">Fluke 700G04 / SN 4003026 / Range -14 to 15 psi</label></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox">Fluke 700G31 / SN 4024042 / Range 0 to 10,000 psi</label></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox"> Additel 680 / SN 218181B0037 / Range 0 to 3,000 psi</label></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <table class="table2">
            <thead style="font-size: .7em;">
                <tr>
                    <td><center>Remarks</center></td>
                </tr>
            </thead>
            <tbody style="font-size: .7em;">
                <tr>
                    <td><label><input type="checkbox"> Calibration was performed</label></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox"> No adjustment was done</label></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox">Standard/s, accessory/ies, and UUC are in good condition before and after calibration</label></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox">Others:</label></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <table class="table4" style="font-size: .7em; text-align: left;">
            <tr>
                <th>Calibrated by</th>
                <th>Encoded by</th>
                <th>Checked by</th>
            </tr>
        </table>
    </div>
    <div style="font-size: .5em;">
        <table style=" border-collapse: collapse; border: none; width: 100%; text-align: right;">
            <tr><td>CP-001-F1 Rev. 2</td></tr>
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