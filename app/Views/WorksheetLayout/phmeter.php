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
    <div style="font-size: .6em; margin-top: 20px;">
    <img style="height: 50px; position: absolute; margin-left: 200px;" src="<?= $base64?>"
        <center><p style="margin-left: 340px;">Republic of the Philippines</p></center> 
        <center><h4 style="color: blue;">DEPARTMENT OF SCIENCE AND TECHNOLOGY</h4></center>
        <center>CALABARZON</center>
        <center><h4>Regional Metrology Laboratory</h4></center>
        <center><h4>CP-014: Calibration Worksheet for pH Meter</h4></center>
    </div>
    <div style="font-size: .6em;">
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
            <thead style="font-size: .65em;">
                <tr>
                    <td>Equipment Description:</td>
                    <td><label><input type="checkbox">pH meter (with separate electrode)</label></td>
                    <td colspan=""><label><input type="checkbox">pH meter (with built-in electrode)</label></td>
                </tr>  
            </thead>
            <tbody style="font-size: .6em;">
                <tr>
                    <td style="width: 18%;" colspan="2"><b>Meter:</b></td>
                    <td style="width: 32%;"></td>
                </tr>
                <tr>
                    <td colspan="2">Manufacturer:</td>
                    <td>Start Temp (°C):</td>
                </tr>
                <tr>
                    <td colspan="2">Model:</td>
                    <td>End Temp (°C):</td>
                </tr>
                <tr>
                    <td colspan="2">Serial No.:</td>
                    <td>Start RH (% RH):</td>
                </tr>
                <tr>
                    <td colspan="2">Equipment ID:</td>
                    <td>End RH (% RH):</td>
                </tr>

                <tr>
                    <td style="width: 18%;" colspan="2"><b>Electrode: </b></td>
                    <td style="width: 18%;" rowspan="6">Standardization Points <br>
                        <label><input type="checkbox">7.00</label>
                        <label><input type="checkbox">4.00</label>
                        <label><input type="checkbox">10.00</label>
                        <br>
                        others: 
                        <br>
                        <label><input type="checkbox">___________</label>
                        <label><input type="checkbox">___________</label>
                        <label><input type="checkbox">___________</label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Manufacturer:</td>
                </tr>
                <tr>
                    <td colspan="2">Model:</td>
                </tr>
                <tr>
                    <td colspan="2">Serial No.:</td>
                </tr>
                <tr>
                    <td colspan="2">Equipment ID:</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
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
            <tbody style="font-size: .6em;">
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
                            Check the equipment for any damages. (note in remarks)
                        </label>
                    </td>
                    
                </tr>
                <tr>
                    <td>
                        <label>
                            <input type="checkbox">
                            Check buffer solution to be used is not out-dated and contaminated.
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            <input type="checkbox">
                            Hair cracks are not present in the membrane of the electrode.
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            <input type="checkbox">
                            Inspect for the level of the electrolyte or filling solution of the electrode, this should be properly filled based on the manufacturer
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            <input type="checkbox">
                            Inspect for the connection of the electrode to the meter. Check for worn-out cable and plugs.
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            <input type="checkbox">
                            Battery-operated pH meter should have enough power during the whole calibration process. Allow warm-up time.
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            <input type="checkbox">
                            Allow warm-up time for electrically powered pH meter for at least 30 minutes or as specified by the manufacturer.
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            <input type="checkbox">
                            Record all necessary and vital information.
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
                    <td colspan="8"><center>Measurement Data</center></td>
                </tr>
            </thead>
            <tbody style="font-size: .6em;">
                <tr>
                    <td colspan="3"><b>Meter Test</b></td>
                    <td colspan="2">Range:</td>
                    <td colspan="2">Res/Grad'n:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Temp:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; °C</td>
                    <td style="text-align: right;">pH</td>
                </tr>
                <tr style="text-align: center;">
                   <td rowspan="2" style="vertical-align: middle;">Test Points, pH</td>
                   <td colspan="7">UUC READING ( at 25 °C Temp. Setting)</td>
                </tr>
                <tr style="text-align: center;">
                    <td>As-Found</td>
                    <td>TRIAL 1</td>
                    <td>TRIAL 2</td>
                    <td>TRIAL 3</td>
                    <td>TRIAL 4</td>
                    <td>TRIAL 5</td>
                    <td>REMARKS</td>
                </tr>
                <tr>
                    <td>1.00 (354.91 mV)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>4.00 (177.46 mV)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>7.00 (0.00 mV)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>10.00 (-177.46 mV)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>13.00 (-354.91 mV)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="8"><b>Electrode Tests</b></td>
                </tr>
                <tr style="text-align: center;">
                    <td rowspan="2">Test Points, pH 4</td>
                    <td rowspan="2">UUC READING before adjustment</td>
                    <td colspan="2">Buffer Solutions Temp. (°C)</td>
                    <td rowspan="2">UUC READING after adjustment</td>
                    <td colspan="2">Buffer Solutions Temp. (°C)</td>
                    <td>REMARKS</td>
                </tr>
                <tr>
                    <td>Before</td>
                    <td>After</td>
                    <td>Before</td>
                    <td>After</td>
                    <td></td>
                </tr>
                <tr>
                    <td>TRIAL 1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>TRIAL 2</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>TRIAL 3</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>TRIAL 4</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>TRIAL 5</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr style="text-align: center;">
                    <td rowspan="2">Test Points, pH 7</td>
                    <td rowspan="2">UUC READING before adjustment</td>
                    <td colspan="2">Buffer Solutions Temp. (°C)</td>
                    <td rowspan="2">UUC READING after adjustment</td>
                    <td colspan="2">Buffer Solutions Temp. (°C)</td>
                    <td>REMARKS</td>
                </tr>
                <tr>
                    <td>Before</td>
                    <td>After</td>
                    <td>Before</td>
                    <td>After</td>
                    <td></td>
                </tr>
                <tr>
                    <td>TRIAL 1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>TRIAL 2</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>TRIAL 3</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>TRIAL 4</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>TRIAL 5</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr style="text-align: center;">
                    <td rowspan="2">Test Points, pH 10</td>
                    <td rowspan="2">UUC READING before adjustment</td>
                    <td colspan="2">Buffer Solutions Temp. (°C)</td>
                    <td rowspan="2">UUC READING after adjustment</td>
                    <td colspan="2">Buffer Solutions Temp. (°C)</td>
                    <td>REMARKS</td>
                </tr>
                <tr>
                    <td>Before</td>
                    <td>After</td>
                    <td>Before</td>
                    <td>After</td>
                    <td></td>
                </tr>
                <tr>
                    <td>TRIAL 1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>TRIAL 2</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>TRIAL 3</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>TRIAL 4</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>TRIAL 5</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="8" style="padding: 2px; text-align: left;"><p>Remarks:</p>
                    <label><input type="checkbox">Calibration was performed</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label><input type="checkbox">No adjustment was done </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="checkbox">Others:</label>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <table class="table2">
            <thead style="font-size: .6em;">
                <tr>
                    <th colspan ="2">Standards and Accessories Used</th>
                </tr>
            </thead>
            <tbody style="font-size: .6em;">
                <tr>
                    <td><label><input type="checkbox">A.M.C.; GE Druck; DPI 620; S/N: 02838715</label></td>
                    <td><b>Note: Electrode Test are:</b></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox">Documenting Process Calibrator; Fluke; 754; S/N: 2885803</label></td>
                    <td>Isopotential Point: < ± 2 pH units ______________________________</td>
                </tr>
                <tr>
                    <td><label><input type="checkbox">Multi-Product Calibrator; Fluke; 5502A; S/N: 2885802</label></td>
                    <td>Slope: must be > 80 % (59.15 mV / pH) ______________________________</td>
                </tr>
                <tr>
                    <td><label><input type="checkbox"> pH 4.00 Buffer Solution, Batch no. : ______________________________</label></td>
                    <td> Response Time: must be < 30 s ( to 90% of final value) ______________________________</td>
                </tr>
                <tr>
                    <td><label><input type="checkbox"> pH 7.00 Buffer Solution, Batch no. : ______________________________</label></td>
                    <td>Repeatability: ______________________________</td>
                </tr>
                <tr>
                    <td><label><input type="checkbox"> pH 10.00 Buffer Solution, Batch no. : _____________________________</label></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <table class="table2">
            <thead style="font-size: .6em;">
                <tr>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody style="font-size: .6em;">
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
    <div style="font-size: .35em;">
        <table style=" border-collapse: collapse; border: none; width: 100%; text-align: right;">
            <tr><td>CP-014-F1 Rev. 0</td></tr>
            <tr><td>Effectivity Date: 15 August 2021</td></tr>
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