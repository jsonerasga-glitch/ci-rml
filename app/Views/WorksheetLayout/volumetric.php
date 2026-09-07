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
   
    <div style="font-size: .6em;">
        <table style="text-align: left; border: 0; width: 100%;">
            <tr>
                <th colspan="2" style="width: 400px;">DATA SHEET FOR CALIBRATION OF VOLUMETRIC APPARATUS </th>
                <td style="width: 400px; text-align: right;">For glassware only 
                </td>
            </tr>
            <tr>
                <td colspan="2" style="width: 400px;">Request Reference No: &nbsp;_________________________________</td>
                <td style="text-align: right; width: 400px;">
                    <label>
                        <input type="checkbox">for graduated (Case 1)
                    </label>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="width: 400px;">Customer: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_________________________________</td>
                <td style="text-align: right;">a+ __________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a- __________</td>
            </tr>
            <tr>
                <td colspan="2" style="width: 400px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_________________________________</td>
                <td style="text-align: right;">
                    <label>
                        <input type="checkbox">For one-mark (Case 2)
                    </label>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="width: 400px;">Place of Calibraton:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_________________________________</td>
                <td style="text-align: right;">Neck Diameter: __________________________</td>
            </tr>
            <tr>
                <td colspan="2" style="width: 400px;">Date Received: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_________________________________</td>
                <td style="text-align: right;">Graduation Height: __________________________</td>
            </tr>
            <tr>
                <td colspan="2" style="width: 400px;">Date Calibrated:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_________________________________</td>
                <td style="text-align: right;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;__________________________</td>
            </tr>
            <tr>
                <td colspan="2" style="width: 400px;">Recommended Due Date:_________________________________</td>
                <td style="text-align: right;"> Count. of Repeatablity (n): _________________________________</td>
            </tr>
            <tr>
                <td colspan="2" style="width: 400px;">Equipment Description / Sample:&nbsp;&nbsp;&nbsp;&nbsp;_________________________________</td>
                <td style="text-align: right;">Start Temp (°C): _________________________________</td>
            </tr>
            <tr>
                <td colspan="2" style="width: 400px;">Type:&nbsp;&nbsp;&nbsp;&nbsp;_________________________________</td>
                <td style="text-align: right;">Start RH (%): _________________________________</td>
            </tr>
            <tr>
                <td colspan="2" style="width: 400px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_________________________________</td>
                <td style="text-align: right;">End Temp (°C) _________________________________</td>
            </tr>
            <tr>
                <td colspan="2" style="width: 400px;">Manufacturer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_________________________________</td>
                <td style="text-align: right;">End RH (%) _________________________________</td>
            </tr>
            <tr>
                <td colspan="2" style="width: 400px;">Identifying Mark&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_________________________________</td>
                <td>For piston pipette only</td>
            </tr>
            <tr>
                <td colspan="2" style="width: 400px;">Capacity&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_________________________________</td>
                <td>
                    <label>
                        <input type="checkbox">Single Channel
                    </label>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="width: 400px;">Material&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_________________________________</td>
                <td>Single with varialble volume /</td>
            </tr>
            <tr>
                <td colspan="2" style="width: 400px;">Serial No. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_________________________________</td>
                <td>Multi-Channel</td>
            </tr>
            <tr>
                <td>Equipment ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_________________________________</td>
            </tr>
             
        </table>
    </div>

    <div>
        <table class="" style="font-size: .6em; text-align: center; border: 0; width: 500px;">
            <tr>
                <td >
                    <label>
                        <input type="checkbox">Visual Inspection (clean the equipment w/ soft cloth to remove dust and small particles)
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
                        <input type="checkbox"> Note any crack/scratch, color change, or broken parts of the equipment
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <label>
                        <input type="checkbox">Record all necessary and vital information
                    </label>
                </td>
            </tr>
        </table>
    </div>

    <div>
        <table class="table" style="font-size: .6em; text-align: center; ">
            <tr>
                <th>Capacity</th>
                <th>Trial</th>
                <th>T<sub>A</sub></th>
                <th>RH<sub>A</sub></th>
                <th>P<sub>A</sub></th>
                <th>T<sub>w</sub></th>
                <th>Wg</th>
                <th>Ww + Wg</th>
                <th>W<sub>w</sub></th>
            </tr>
            <tr>
                <td rowspan="10"></td>
                <td>1</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>2</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>4</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>5</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>6</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>7</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>8</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>9</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
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
            </tr>

            <tr>
                <td>Range</td>
                <td>min __________</td>
                <td>max __________</td>
                <th></th>
                <th></th>
                <th></th>
                <td>11 (evap.loss)</td>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <td rowspan="10"></td>
                <td>1</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>2</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>4</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>5</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>6</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>7</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>8</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>9</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
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
            </tr>

            <tr>
                <td>Range</td>
                <td>min __________</td>
                <td>max __________</td>
                <th></th>
                <th></th>
                <th></th>
                <td>11 (evap.loss)</td>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <td rowspan="10"></td>
                <td>1</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>2</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>4</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>5</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>6</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>7</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>8</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>9</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
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
            </tr>
            <tr>
                <td>Range</td>
                <td>min __________</td>
                <td>max __________</td>
                <th></th>
                <th></th>
                <th></th>
                <td>11 (evap.loss)</td>
                <th></th>
                <th></th>
            </tr>
        </table>
    </div>


    <div>
        <table class="table2" style="font-size: .7em; border: 0;">
            <tr>
                <td style="height: 20px; vertical-align: top;">Remarks:</td>
            </tr>
            <tr>
                <td>
                    <label>
                        <input type="checkbox">
                        Standard/s, accessory/ies, and UUC are in good condition before and after calibration</label>
                    </td>
            </tr>
            <tr>
                <td>
                    <label>
                        <input type="checkbox">No adjustment was done
                    </label>
                </td>
            </tr>
            <tr>    
                <td>
                    <label>
                        <input type="checkbox">Others:________________________________________________________________
                    </label>
                </td>
            </tr>
        </table>
    </div>

    <div>
        <table class="table2" style="text-align: left; font-size: .7em; border: 0;">
            <tr>
                <th>Standard and Accessories Used</th>
                <td>RH & Air Pressure</td>
                <td>Temperature for Air</td>
                <td>Temperature for Water</td>
                <td>H2O Conductivity Result</td>
            </tr>
            <tr>
                <td>
                    <label>
                        <input type="checkbox">XS2002S
                    </label>
                </td>
                <td>
                    <label>
                        <input type="checkbox">A17110063 Barometer
                    </label>
                </td>
                <td>
                    <label>
                        <input type="checkbox">A0006380 DT
                    </label>
                </td>
                <td>
                    <label>
                        <input type="checkbox">A0006380 DT
                    </label>
                </td>
                <td>________________</td>
            </tr>
            <tr>
                <td>
                    <label>
                        <input type="checkbox">XPE206
                    </label>
                </td>
                <td>
                    <label>
                        <input type="checkbox">A17110002 Barometer
                    </label>
                </td>
                <td>
                    <label>
                        <input type="checkbox">4010016 DT
                    </label>
                </td>
                <td>
                    <label>
                        <input type="checkbox">4010016 DT
                    </label>
                </td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <label>
                        <input type="checkbox">CC5001
                    </label>
                </td>
                <td>
                    <label>
                        <input type="checkbox">
                    </label>
                </td>
                <td>
                    <label>
                        <input type="checkbox">
                    </label>
                </td>
                <td>
                    <label>
                        <input type="checkbox">
                    </label>
                </td>
            </tr>
            
        </table>
    </div>

    <div>
        <table class="table2 mt-2" style="text-align: left; font-size: .7em; border: 0;">
            <tr>
                <td>Calibrated by: ___________________</td>
                <td>Encoded by: ___________________</td>
                <td>Checked by: ___________________</td>
            </tr>
        </table>
    </div>

   <div class="mt-4" style="font-size: .5em;">
        <table style=" border-collapse: collapse; border: none; width: 100%; text-align: right; z-index: -1;">
          
            <tr><td>CP-015-F1 Rev. 1</td></tr>
            <tr><td>Effectivity Date: 24 April 2023</td></tr>
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