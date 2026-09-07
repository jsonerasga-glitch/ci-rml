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

    $customerInfo = json_decode($WorksheetData['customerInfo']);
    $equipmentInfo = json_decode($WorksheetData['equipmentInfo']);
    $environmentInfo = json_decode($WorksheetData['environmentInfo']);
    $dataInputs = json_decode($WorksheetData['dataInputs']);
    $calculatedData = json_decode($WorksheetData['calculatedData']);
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
    @page {
            margin-top:  25px;    
            margin-bottom: 25px; 
            margin-left: 25px;  
            margin-right: 25px;   
            border: 0px red solid; 
    }
    .table {
        font-size: .7em;
        table-layout: fixed; 
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #000;
        text-align: right;   
        border:solid 1px;
        margin-top:5px;
        margin-bottom:5px;

    }
    .table th,  {
        border: 1px solid #000;
        padding: 2px; 
        vertical-align: middle;
    }
    .table td {
        border: 1px solid #000;
        padding: 2px; 
        vertical-align: middle; 
    }


    table.no-border {
        border: none;
        padding:1px;
        margin-top:5px;
        margin-bottom:5px;
    }
    table.no-border td,
    table.no-border th {
        border: none;
        padding:1px;
    }
    .fixed-underline1 {
        display: inline-block;
        width: 310px; /* Adjust the width as needed */
        border-bottom: 1px solid black;

    }
    .fixed-underline2 {
        display: inline-block;
        width: 50px; /* Adjust the width as needed */
        border-bottom: 1px solid black;

    }
    .fixed-underline3 {
        display: inline-block;
        width: 170px; /* Adjust the width as needed */
        border-bottom: 1px solid black;

    }
    .fixed-underline4 {
        display: inline-block;
        width: 160px; /* Adjust the width as needed */
        border-bottom: 1px solid black;

    }
    input[type="checkbox"] {
            width: 16px;
            height: 16px;
            margin-left:4px;
            margin-right:10pxe;
        }

    .table1 {
        font-size: .6em;
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #000;
        text-align: center;   
        border:solid 1px;
        margin-top:15px;
        margin-bottom:5px;

    }
    .table1 th,  {
        border: 1px solid #000;
        padding: 2px; 
    }
    .table1 td {
        border: 1px solid #000;
        padding: 2px; 
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

<body >
    <div class="page">
        <!-- Customer and Equipment Info -->
        <div >
                    <table class="table no-border" style=" font-size: .7em; text-align: left; ">
                        <tr>
                            <th colspan="7">DATA SHEET FOR CALIBRATION OF VOLUMETRIC APPARATUS</th>
                            <td colspan="3"></td>
                            <td colspan="2"></td>
                    
                        </tr>
                        <tr>      
                            <td colspan="3">Request Reference No.</td>
                            <td colspan="5"><span class="fixed-underline1"><?= $equipmentInfo->certificateNumber?></span></td>
                            <td colspan="2" style="text-align: right; ">Res DT:</td>
                            <td colspan="1"><span class="fixed-underline2"></td>
                            <td colspan="1">°C</td>
                            
                        </tr>
                        <tr>
                            <td colspan="3" >Customer</td>
                            <td colspan="5" ><span class="fixed-underline1"><?= $customerInfo->customer?></span></td>
                            <td colspan="2" style="  text-align: right; ">Temp</td>
                            <td colspan="1" style="  text-align: center; "><span class="fixed-underline2"><?= $environmentInfo->tempStart?></span></td>
                            <td colspan="1" style="  text-align: center; "><span class="fixed-underline2"><?= $environmentInfo->tempEnd?></span></td>
                        </tr>
                    
                        <tr>
                            <td colspan="3">Place of Calibraton</td>
                            <td colspan="5" ><span class="fixed-underline1"><?= $equipmentInfo->placeOfCalibration?></span></td>
                            <td colspan="2" style="  text-align: right; ">RH Start</td>
                            <td colspan="1" style="  text-align: center; "><span class="fixed-underline2"><?= $environmentInfo->rhStart?></span></td>
                            <td colspan="1" style="  text-align: center; "><span class="fixed-underline2"><?= $environmentInfo->rhEnd?></span></td>  </tr>
                        <tr>
                            <td colspan="3">Date Received</span></td>
                            <td colspan="5"><span class="fixed-underline1"><?= $customerInfo->dateReceived?></td>
                            <td colspan="4"></td>
                        
                        </tr>
                        <tr>
                            <td colspan="3">Date Calibrated</td>
                            <td colspan="5" ><span class="fixed-underline1"><?= $equipmentInfo->dateCalibrated?></span></td>
                            <td colspan="4"></td>

                        </tr>
                        <tr>
                            <td colspan="3">Recommended Dute Date</td>
                            <td colspan="5" > <span class="fixed-underline1"><?= $customerInfo->recommendedDueDate?></span></td>
                            <td colspan="4"></td>
                        </tr>
                        <tr>
                            <td colspan="3">Equipment Description / Sample:</td>
                            <td colspan="5"> <span class="fixed-underline1"><?= $equipmentInfo->equipmentDescription?></span></td>
                            <td colspan="4"></td>
                        </tr>
                        <tr>
                            <td colspan="1"></td>
                            <td colspan="2"  >Type:</td>
                            <td colspan="6"  >
                                <span class="fixed-underline1">
                                    <?php
                                    if ($equipmentInfo->type == 1) {
                                        echo 'Analog';
                                    } elseif ($equipmentInfo->type == 2) {
                                        echo 'Digital';
                                    }
                                    ?>
                                </span>
                            </td>
                            <td colspan="3"></td>
                        </tr>
            
                        <tr>
                            <td colspan="1"></td>
                            <td colspan="2">Manufacturer:</td>
                            <td colspan="3"><span class="fixed-underline3"><?= $equipmentInfo->manufacturer?></span></td>
                            <td colspan="1">Serial No.:</td>
                            <td colspan="2" style=" text-align: left;"><span class="fixed-underline3"><?= $equipmentInfo->serialNumber?></span></td>
                            <td colspan="3"></td>
                    
                        </tr>
                        <tr>
                            <td colspan="1"></td>
                            <td colspan="2">Model:</td>
                            <td colspan="3"><span class="fixed-underline3"><?= $equipmentInfo->modelNumber?></span></td>
                            <td colspan="1">Equipment ID:</td>
                            <td colspan="2"><span class="fixed-underline3"><?= $equipmentInfo->equipmentId?></span></td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td colspan="1"></td>
                            <td colspan="2">Capacity:</td>
                            <td colspan="3"><span class="fixed-underline3"><?= $equipmentInfo->rangeMin?>&nbsp;to&nbsp; <?= $equipmentInfo->rangeMax?>&nbsp; <?= $equipmentInfo->rangeUnit?></span></td>
                            <td colspan="1">Resolution</td>
                            <td colspan="2"><span class="fixed-underline3"></span></td>
                            <td colspan="3"></td>
                        </tr>
                    
                        <tr>
                            <td colspan="1">&nbsp;</td>
                            <td colspan="2">&nbsp;</td>
                            <td colspan="3">&nbsp;</td>
                            <td colspan="1">&nbsp;</td>
                            <td colspan="2">&nbsp;</td>
                            <td colspan="3">&nbsp;</td>
                        </tr>

            

                    <tr>
                        <td colspan="2" style="padding: 0;"></td>
                        <td colspan="2" style="padding: 0;"></td>
                        <td colspan="8" style="padding: 0; border: 0;">
                            <label>
                                <input type="checkbox">Visual Inspection (clean the equipment w/ soft cloth to remove dust and small particles)
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding: 0;"></td>
                        <td colspan="2" style="padding: 0;"></td>
                        <td colspan="8" style="padding: 0;">
                            <label>
                                <input type="checkbox">Check the surface and edges of the equipment for any damages. (note in remarks)
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding: 0;"></td>
                        <td colspan="2" style="padding: 0;"></td>
                        <td colspan="8" style="padding: 0;">
                            <label>
                                <input type="checkbox">Note any crack/scratch, color change, or broken parts of the equipment
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding: 0;"></td>
                        <td colspan="2" style="padding: 0;"></td>
                        <td colspan="8" style="padding: 0;">
                            <label>
                                <input type="checkbox">Record all necessary and vital information
                            </label>
                        </td>
                    </tr>

                    <tr>
                            <td colspan="1">&nbsp;</td>
                            <td colspan="1">&nbsp;</td>
                            <td colspan="3">&nbsp;</td>
                            <td colspan="1">&nbsp;</td>
                            <td colspan="2">&nbsp;</td>
                            <td colspan="3">&nbsp;</td>
                    </tr>
                    </table>
        </div>

        <!-- Measurement Data  Table    -->
        <?php
            $numberOfItems = 1;
            while (isset($dataInputs->{'numberOfTables1' .  ($numberOfItems + 1)})) {
                $numberOfItems++;
            }

            for ($i = 1; $i <= $numberOfItems; $i++) {
                $tableName = "TABLE" . $i;
                $tableRow = "ROW" . $i;
                $comparatorKey = "testPoint" . $tableName . $tableRow;
                $rowCount = 1;

                // Determine the number of rows in the table
                while (isset($dataInputs->{'testPoint' . $tableName . 'ROW' . ($rowCount + 1)})) {
                    $rowCount++;
                }

                echo '<table class="table">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Test Point</th>';
                echo '<th>UUC Resolution</th>';
                echo '<th>Trial</th>';
                echo '<th>T air</th>';
                echo '<th>RH air</th>';
                echo '<th>T solution</th>';
                echo '<th>Reading before Adjustment</th>';
                echo '<th>T air</th>';
                echo '<th>RH air</th>';
                echo '<th>T solution</th>';
                echo '<th>Reading after Adjustment</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody style="text-align: center; ">';

                for ($rowIndex = 1; $rowIndex <= $rowCount; $rowIndex++) {
                    $testPointKey = 'testPoint' . $tableName . 'ROW' . $rowIndex;
                    $uucResolutionKey = 'uucResolution' . $tableName . 'ROW' . $rowIndex;
                    $trialKeys = [];
                    for ($trialIndex = 1; $trialIndex <= 3; $trialIndex++) {
                        $trialKeys[] = 'trial' . $trialIndex . $tableName . 'ROW' . $rowIndex;
                    }

                    echo '<tr>';
                    echo '<td rowspan="3">' . $dataInputs->$testPointKey . '</td>';
                    echo '<td rowspan="3" >' . $dataInputs->$uucResolutionKey . '</td>';

                    foreach ($trialKeys as $trialKey) {
                        echo '<td>' . (isset($dataInputs->$trialKey) ? $dataInputs->$trialKey : '') . '</td>';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '</tr>';
                        if (next($trialKeys)) {
                            echo '<tr>';
                        }
                    }
                }

                echo '</tbody>';
                echo '</table>';
            }
        ?>

        <!-- Remarks -->
        <table class="table no-border" style=" font-size: .7em; text-align: left; ">
            <tr>
                <th colspan="2" rowspan= "3" style="padding: 1;vertical-align: top; text-align: left; ">
                Remarks
                </th>
                <td colspan="6" >
                    <label>
                        <input type="checkbox">Standard/s, accessory/ies, and UUC are in good condition before and after calibration
                    </label>
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <label>
                        <input type="checkbox">No Adjustement was done.
                    </label>
                </td>
            </tr>
            <tr>
                <td colspan="6" >
                    <label>
                        <input type="checkbox">Others:  <span class="fixed-underline1"></span>
                    </label>
                </td>
            </tr>

            
        </table>
        <!-- standard used -->
        <table class="table no-border" style=" font-size: .6em; text-align: left; ">
            
                    <tr>
                        <th colspan="2"  style=" text-align: left; ">
                            Standards and Accessories Used
                        </th>
                        <td colspan="2" >
                        </td>
                        <td colspan="2" >
                        </td>
                        <td colspan="2" >
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">
                        </th>
                        <td colspan="2" >
                            <label>
                                <input type="checkbox">MCM2004
                            </label>
                        </td>
                        <td colspan="2" >
                            <label>
                                <input type="checkbox">OIML E2
                            </label>
                        </td>
                        <td colspan="2" >
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">
                        </th>
                        <td colspan="2" >
                            <label>
                                <input type="checkbox">MCM60K3
                            </label>
                        </td>
                        <td colspan="2" >
                            <label>
                                <input type="checkbox">OIMLF1
                            </label>
                        </td>
                        <td colspan="2" >
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">
                        </th>
                        <td colspan="2" >
                            <label>
                                <input type="checkbox">XS2XS20025002S
                            </label>
                        </td>
                        <td colspan="2" >
                            <label>
                                <input type="checkbox">OIML F2
                            </label>
                        </td>
                        <td colspan="2" >
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">
                        </th>
                        <td colspan="2" >
                            <label>
                                <input type="checkbox">XPE206DR
                            </label>
                        </td>
                        <td colspan="2" >
                    
                        </td>
                        <td colspan="2" >
                        </td>
                    </tr>

        </table>
        <!-- personnel calibration performed        -->
        <table class="table no-border" style=" font-size: .7em; text-align: left; ">
                        <tr>
                        <td colspan="3">
                        Calibrated by: <span class="fixed-underline4"> </span>
                        </td>
                        <td colspan="3" >
                        Encoded by: <span class="fixed-underline4"> </span>
                        </td>
                        <td colspan="3" >
                        Checked by: <span class="fixed-underline4"> </span>
                        </td>
                    </tr>
        </table>

    </div>
    <!-- uncertainty budget table -->
    <div class="page">
        <?php
            $numberOfItems = 1; // Default to 1 table
            $calculatedDataArray = json_decode(json_encode($calculatedData), true);
            while (isset($calculatedDataArray['table' . ($numberOfItems + 1)])) {
                $numberOfItems++;
            }

            for ($i = 1; $i <= $numberOfItems; $i++) {
                $tableKey = 'table' . $i;

                echo '<table class="table1">';
                echo '<thead>';
                echo '<tr><th class="textCenter" colspan="9">Uncertainty Budget Table</th></tr>';
                echo '<tr>';
                echo '<td class="textCenter" colspan="1">Test Point</td>';
                echo '<td class="textCenter" colspan="1">Average</td>';
                echo '<td class="textCenter" colspan="1">TYPE A (repeatability)	</td>';
                echo '<td class="textCenter" colspan="1">TYPE B (uuc resolution)</td>';
                echo '<td class="textCenter" colspan="1">TYPE B (standard)</td>';
                echo '<td class="textCenter" colspan="1">TYPE B (bal resolution)</td>';
                echo '<td class="textCenter" colspan="1">Combined Uncertainty</td>';
                echo '<td class="textCenter" colspan="1">K</td>';
                echo '<td class="textCenter" colspan="1">Expanded Uncertainty</td>';
       

                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                $numRows = 0;
                while (isset($calculatedDataArray[$tableKey]['row' . ($numRows + 1)])) {
                    $numRows++;
                }

                for ($x = 1; $x <= $numRows; $x++) {
                    $rowKey = 'row' . $x;
                    echo '<tr>';

                    $rowData = $calculatedDataArray[$tableKey][$rowKey] ?? [];
                    echo '<td class="textCenter">' . ($rowData['testPoint'] ?? '') . '</td>';
                    echo '<td class="textCenter">' . ($rowData['average'] ?? '') . '</td>';
                    echo '<td class="textCenter">' . ($rowData['typeA_Repeatability'] ?? '') . '</td>';
                    echo '<td class="textCenter">' . ($rowData['typeB_UUCResolution'] ?? '') . '</td>';
                    echo '<td class="textCenter">' . ($rowData['typeB_Standard'] ?? '') . '</td>';
                    echo '<td class="textCenter">' . ($rowData['typeB_BalanceResolution'] ?? '') . '</td>';
                    echo '<td class="textCenter">' . ($rowData['combinedUncertainty'] ?? '') . '</td>';
                    echo '<td class="textCenter">' . ($rowData['k'] ?? '') . '</td>';
                    echo '<td class="textCenter">' . ($rowData['expandedUncertainty'] ?? '') . '</td>';



                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
            }
        ?>
    </div>

</body>
</html>   