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
        <center><h4>CALABARZON</h4></center>
        <center>Regional Metrology Laboratory</center>
        <center>CP-009 Calibration Worksheet for Temperature-Controlled Enclosure</center>
    </div>
    <div style="font-size: .7em;">
        <table class="table" style="text-align: left;">
            <tr>
                <td colspan="2">Certificate No.:</td>
                <td colspan="2">Date Received:</td>
                <td colspan="2">Calibrated by:</td>
            </tr>
            <tr>
                <td colspan="2">Customer:</td>
                <td colspan="2">Date Calibrated:</td>
                <td colspan="2">Encoded by:</td>

            </tr>
            <tr>
                <td colspan="2">Place of Calibration:</td>
                <td colspan="2">Recommended Due Date:</td>
                <td colspan="2">Checked by:</td>
            </tr>
        </table>
    </div>
    <div style="">
        <table class="table" style=" text-align: left;">
            <thead style="font-size: .7em;">
                <tr>
                    <td colspan="2">Equipment Description:</td>
                    <td>Start Temp (°C):</td>
                    <td>End Temp (°C):</td>
                </tr>  
            </thead>
            <tbody style="font-size: .7em;">
                <tr>
                    <td colspan="2">Manufacturer:</td>
                    <td>Start RH (% RH)::</td>
                    <td>End RH (% RH)::</td>
                  </tr>
                <tr>
                    <td colspan="2">Model No.:</td>
                    <td colspan="2" rowspan="5" style="vertical-align: top; padding: 2px;"><img src="<?= $base64PAB?>" alt="" style="height: 190px; position: absolute;"></td>
                </tr>
                <tr style="">
                    <td colspan="2">Serial No.:</td>
                </tr>
                <tr>
                    <td colspan="2">Equipment ID:</td>
                </tr>
                <tr>
                    <td colspan="2">Temperature Range:</td>
                </tr>
                <tr>
                    <td colspan="2"><center>Preliminary Inspection</center>
                        <br>
                        <label>
                        <input type="checkbox">Visual Inspection (clean the equipment with soft cloth to remove dust and small
                        particles) </label>
                        <br>
                        <label>
                        <input type="checkbox">
                        Check the surface and edges of the equipment for any damages. (note in
                        remarks)     </label><br>
                        <label>
                        <input type="checkbox">
                        Check the chamber indicator/controller for possible defects  </label><br>
                        <label>
                        <input type="checkbox">
                        Record all necessary and vital information </label>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <table class="table2">
            <thead style="font-size: .7em;">
                <tr>
                    <td><center>Standard/s Used</center></td>
                    <td><center>Remarks</center></td>
                </tr>
            </thead>
            <tbody style="font-size: .7em;">
                <tr>
                    <td><label><input type="checkbox">T.D.L.; Yokogawa; FX 112-1-2; S/N: S5D607665 with T/C</label></td>
                    <td><label><input type="checkbox">Loaded state</label></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox">T.D.L.; Yokogawa; FX1012; S/N: S5UC09154 with T/C </label></td>
                    <td><label><input type="checkbox">Unloaded state</label></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox">T.D.L.; Yokogawa; FX1012; S/N: S5UC09155 with T/C</label></td>
                    <td><label><input type="checkbox">Standard and UUC are in good condition before and after calibration</label></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox">T.D.L.; Graphtec; GL820; S/N: H31173261with T/C</label></td>
                    <td><label><input type="checkbox">Others:</label></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox">Wireless Data Logger; Ellab; TSP; S/N: 256888; 256882;</label></td>
                    <td></td>
                </tr>
                <tr>
                    <td>256899; 398828; 398855; 398857; 398964; 398841; 398850;</td>
                    <td></td>
                </tr>
                <tr>
                    <td>398981; 398961; 398825; 398013</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    
<div>
    <table class="table5" style="font-size: .7em;">
        <tr>
            <td colspan="14"><center>Measurement Data</center></td>
        </tr>
        <tr style="text-align: left;">
            <td colspan="7">Temperature Setting ( °C ) :</td>
            <td colspan="7"> Resolution / Graduation:</td>
        </tr>
        <tr style="text-align: left;">
            <td colspan="7">Test Point ( °C ) : </td>
            <td colspan="7">Readability:</td>
        </tr>
        <tr style="text-align: center;">
            <td rowspan="2">Time</td>
            <td rowspan="2">UUC Indicator Reading, ___</td>
            <td colspan="12">Standard Reading, ____</td>
        </tr>
        <tr>
            <td>Position <br>1</td>
            <td>Position <br>2</td>
            <td>Position <br>3</td>
            <td>Position <br>4</td>
            <td>Position <br>5</td>
            <td>Position <br>6</td>
            <td>Position <br>7</td>
            <td>Position <br>8</td>
            <td>Position <br>9</td>
            <td>Position <br>10</td>
            <td>Position <br>11</td>    
            <td>Position <br>12</td>
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
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr style="text-align: left;">
            <td colspan="14">
                Remarks:
            </td>
        </tr>
    </table>
</div>
<div>
    <table class="table5" style="font-size: .7em;">
        <tr style="text-align: left;">
            <td colspan="7">Temperature Setting (&nbsp;&nbsp;&nbsp;) :</td>
            <td colspan="7"> Resolution / Graduation:</td>
        </tr>
        <tr style="text-align: left;">
            <td colspan="7">Test Point (&nbsp;&nbsp;&nbsp;) : </td>
            <td colspan="7">Readability:</td>
        </tr>
        <tr style="text-align: center;">
            <td>Time</td>
            <td>UUC Indicator Reading, ___</td>
            <td>Position <br>1</td>
            <td>Position <br>2</td>
            <td>Position <br>3</td>
            <td>Position <br>4</td>
            <td>Position <br>5</td>
            <td>Position <br>6</td>
            <td>Position <br>7</td>
            <td>Position <br>8</td>
            <td>Position <br>9</td>
            <td>Position <br>10</td>
            <td>Position <br>11</td>
            <td>Position <br>12</td>
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
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr style="text-align: left;">
            <td colspan="14">
                Remarks:
            </td>
        </tr>
    </table>
</div>
    <!-- <div>
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
    </div> -->
    <div style="font-size: .5em;">
        <table style=" border-collapse: collapse; border: none; width: 100%; text-align: right; z-index: -1;">
            <tr><td>Page ___ of ___ </td></tr>
            <tr><td>CP-009-F1 Rev. 1</td></tr>
            <tr><td>Effectivity Date: 06 February 2019</td></tr>
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