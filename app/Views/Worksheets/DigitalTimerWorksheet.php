

<?php 
    $path = 'image/SREBillustrationA.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    $pathPAB = 'image/SREBillustrationB.png';
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
    
    function countStringInKeys($object, $pattern){
        $count = 0;
    
        foreach ($object as $key => $value) {
            if($pattern == 'repeat'){
                if($key != 'repeatabilityRaw'){
                    if (strpos($key, $pattern) !== false) {
                        $count++;
                    }
                }
            }else{
                if (strpos($key, $pattern) !== false) {
                    $count++;
                }
            }
        }
    
        return $count;
    }

    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RML ++</title>
    <style>
        @font-face {
            font-family: "source_sans_proregular";           
            src: local("Calibri"), url("fonts/sourcesans/sourcesanspro-calibri.ttf") format("truetype");
            font-weight: normal;
            font-style: normal;
        }        
        body {
            font-family: "source_sans_proregular", Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        @page {
                    margin-top: 100px;    
                    margin-bottom: 25px; 
                    margin-left: 25px;  
                    margin-right: 25px;   
                    border: 0px red solid; 
        }
        header {
            position: fixed;
            top: -90px;
            left: 0px;
            right: 0px;
        }
        footer {
            position: fixed;
            bottom: -100px;
            left: 0px;
            right: 0px;
            height: 120px;
        }
        .page {
            page-break-after: always;
        }
        .page:last-child {
            page-break-after: never;
        }
        .table {
            font-size: .7em;
            margin-top: 4px; 
            margin-bottom: 4px;
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black; 
            
        }
        .table th {
            border: 1px solid black;
            padding: 2px;
            text-align: center;
        }
        .table td {
            border: 1px solid black;
            padding: 2px;
            text-align: left;
        }
        .table1 {
            font-size: .7em;
            margin-bottom: 6px;
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black; 
            margin-top: 6px; 
        }
        .table1 th,  {
            border: 1px solid black; 
            padding: 1px;
            text-align: center;
        }
        .table1 td {
            border: 1px solid black; 
            padding: 1px;
            text-align: center;
        }
        .textLeft {
             text-align: left;
        }
        .textCenter {
             text-align: center;
        }
        .table2 {
            font-size: .7em;
            margin-top: 4px; 
            margin-bottom: 6px;
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black;   
        }
        .table2 th {
            margin-top: 5px; 
            margin-bottom: 5px;  
            padding: 1px;
            text-align: center;
        }
        .table2 td {
            margin-top: 5px;  
            margin-bottom: 5px;  
            padding: 1px;
            text-align: left;
        }
        input[type="checkbox"] {
            width: 16px;
            height: 16px;
            margin-left:4px;
            margin-right:10pxe;
        }
        .table3 {
            font-size: .7em;
            margin-bottom: 6px;
            margin-top: 15px; 
            border-collapse: collapse;
            width: 100%;   
        }
        .table3 th {
            padding: 1px;
            text-align: center;
        }
        .table3 td {
            padding: 1px;
            text-align: left;
        }

    </style>
</head>
<body>
    <header>
        <div style="text-align: center; border: 0px solid blue; line-height: 1;">
            Republic of the Philippines<br>
            <h5 style="margin: 0;">DEPARTMENT OF SCIENCE AND TECHNOLOGY</h5>
            CALABARZON<br>
            <h5 style="margin: 0;">Regional Metrology Laboratory</h5>
            Calibration Worksheet<br>
            <p style="margin: 0;">CP-017 Calibration of Stopwatch and Timers</p>
        </div>
    </header>
    <footer>
            <div style="font-size: .5em;">
                <table style="border-collapse: collapse; border: none; width: 100%; text-align: right; z-index: -1;">
                    <tr><td>Page ____ of ____</td></tr>
                    <tr><td>CP-017</td></tr>
                    <!-- <tr><td>Effectivity Date : 15 Aug 2021</td></tr> -->
                </table>
            </div>
    </footer>
    <!-- first table -->
    <div class="page"> 
                <!-- Equipment and customer information table -->
                <table class="table" >
                    <tr>
                        <td class="td textLeft" colspan='2'>Certificate No: <?= $equipmentInfo->certificateNumber?></td>
                        <td class="td textLeft" colspan='2' >Date Received: <?= $customerInfo->dateReceived?></td>
                    </tr>
                    <tr>
                        <td class="td textLeft" colspan='2'>Customer: <?= $customerInfo->customer?></td>
                        <td class="td textLeft" colspan='2' >Date Calibrated: <?= $equipmentInfo->dateCalibrated?></td>
                    </tr>
                    <tr>
                        <td class="td textLeft" colspan='2'>Equipment Description: <?= $equipmentInfo->equipmentDescription?></td>
                        <td class="td textLeft" colspan='2'>Recommended Due Date: <?= $customerInfo->recommendedDueDate?></td>
                    </tr>
                    <tr>
                        <td class="td textLeft" colspan='2'>Manufacturer: <?= $equipmentInfo->manufacturer?></td>
                        <td class="td textLeft" colspan='2'>Place of Calibration: <?= $equipmentInfo->placeOfCalibration?></td>
                    </tr>
                    <tr>
                        <td class="td textLeft" colspan='4'>Model No: <?= $equipmentInfo->modelNumber?></td>
               
                    </tr>
                    <tr>
                        <td class="td textLeft" colspan='2'>Serial No: <?= $equipmentInfo->serialNumber?></td>
                        <td class="td textLeft" colspan='1'>Start Temp(°C): <?= $environmentInfo->tempStart?></td>
                        <td class="td textLeft" colspan='1'>Start RH(%RH): <?= $environmentInfo->rhStart?></td>
                    </tr>
                    <tr>
                        <td class="td textLeft" colspan='2'>Equipment ID: <?= $equipmentInfo->equipmentId?></td>
                        <td class="td textLeft" colspan='1'>End Temp(°C): <?= $environmentInfo->tempEnd?></td>
                        <td class="td textLeft" colspan='1'>End RH(%RH): <?= $environmentInfo->rhEnd?></td>
                 
                    </tr>
                    <tr>
                        <td class="td textLeft" colspan='4'>Accuracy (s/day): <?= $equipmentInfo->accuracySecond?></td>
                    </tr>
                    <tr>
                        <td class="td textLeft" colspan='4'>Resolution/Graduation: <?= $dataInputs->uucResolution1?></td>
                    </tr>
                    
                </table>
                <!-- preliminary inspection -->
                <div>
                    <table class="table2" >
                        <thead >
                            <tr>
                                <th>Preliminary Inspection</th>
                            </tr>
                        </thead>
                        <tbody >
                          
                           
                            <tr>
                                <td>
                                    <label>
                                        <input type="checkbox">
                                        Visual Inspection (clean the equipment w/ soft cloth to remove dust and small particles).
                                    </label>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <label>
                                        <input type="checkbox">
                                        Check the surface and edges of the equipment for any damages (note in remarks).
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
                            <td>
                           
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                 <!-- Human Synchronization Time Table    -->
                <table class="table1">
                    <thead >
                            <th colspan="4"><center>Measurement Data</center></th>
                            <tr >
                            <td class="td textLeft">Human Synchronization Time</td>
                            <td class="td textLeft">Observation Period</td>
                            <td colspan='2' class="td textLeft"><?= $dataInputs->humanSynchronizationObsPeriod1?> s</td>
                        </tr>
                    </thead>
                    <?php
                        $numberOfTables = $dataInputs->numberOfTables1;
                        for ($i=1; $i <= $numberOfTables; $i++) { 
                            // $countOfRow = 10; // Assuming 10 rows of data per table

                            $countOfRow = 1;
                            while(isset($dataInputs->{'std1table' . $i . 'row' . ($countOfRow + 1)})){
                                $countOfRow++;
                            }
                        ?>
                    <tbody >
                        <tr>
                            <td class='textCenter'>Trial</td>
                            <td class='textCenter'><?= 'Standard Timer Reading' ?></td>
                            <td class='textCenter'><?= 'Timer Under Calibration' ?></td>
                            <td class='textCenter'><?= 'Synchronization Time' ?></td>
                        </tr>
                        <?php
                            for ($x=1; $x <= $countOfRow; $x++) { 
                                $std1Key = 'std1table1row'.$x;
                                $uuc1Key = 'uuc1table1row'.$x;
                        
                        ?>
                        <tr>
                            <td class="textCenter"><?= $x ?></td>
                            <td class="textCenter"><?= $dataInputs->$std1Key ?></td>
                            <td class="textCenter"><?= $dataInputs->$uuc1Key ?></td>
                            <td class="textCenter"></td>
                        </tr>
                        <?php
                            }
                        ?>
                        <tr>
                            <td  colspan='3' class="textRight">Average</td>
                            <td colspan='1'></td>
                        </tr>
                    </tbody>
                    <?php 
                        }
                    ?>
                </table>
                 <!-- calculation obs  period  table  -->
                 <table class="table1">
                    <thead >
                        <tr >
                            <td class="td textLeft" colspan='3'>Calculation of Observation Period</td>
                       
                            <td class="td textLeft" colspan='2'></td>
                        </tr>
                    </thead>
                    <?php
                        $numberOfTables = $dataInputs->numberOfTables1;
                        for ($i=1; $i <= $numberOfTables; $i++) { 
                            //$countOfRow = 10; 
                            $countOfRow = 1;
                            while(isset($dataInputs->{'std2table' . $i . 'row' . ($countOfRow + 1)})){
                                $countOfRow++;
                            }

                        ?>
                    <tbody>
                        <tr>
                            <td class='textCenter'  rowspan='11' colspan='2'><?= 'Observation Time = Resolution/(Accuracy of Timer) ' ?></td>
                            <td class='textCenter' colspan='1'>Trial</td>
                            <td class='textCenter' colspan='1'><?= 'Standard Timer Reading' ?></td>
                            <td class='textCenter' colspan='1'><?= 'Timer Under Calibration' ?></td>
                        
                        </tr>
                        <?php 
                            for ($x=1; $x <= $countOfRow; $x++) { 
                                $std2Key = 'std2table1row'.$x;
                                $uuc2Key = 'uuc2table1row'.$x;
                        
                        ?>
                        <tr>
                         
                            <td class="textCenter"><?= $x ?></td>
                            <td class="textCenter"><?= $dataInputs->$std2Key?></td>
                            <td class="textCenter"><?= $dataInputs->$uuc2Key?></td>
                        
                        </tr>
                        <?php
                            }
                        ?>
              
                    </tbody>
                    <?php 
                        }
                    ?>
                </table>
                 <!-- preliminary inspection -->
                 <div>
                    <table class="table2" >
                        <thead >
                            <tr>
                                <td>Remarks</td>
                            </tr>
                        </thead>
                        <tbody >
                          
                           
                            <tr>
                                <td>
                                 
                                </td>
                            </tr>
                             <tr>
                                <td>
                                  
                                </td>
                            </tr>
                            <tr>
                                <td>
                                 
                                </td>
                            </tr>
                            <td>
                                &nbsp;
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- standard used  -->
                <table class="table" >
                    <tr>
                        <th  colspan='3'>Standard Used</th>
                        <td class="td textLeft"  colspan='1' rowspan='3'>Remarks:</td>
                    </tr>
                    <tr>
                        <td class="td textLeft"  colspan='3' >Standard Description:</td>
                    </tr>
                    <tr>
                        <td class="td textLeft" colspan='3'>Manufacturer:</td>
                    </tr>
                    <tr>
                        <td class="td textLeft" colspan='3'>Model No:</td>
                        <td class="td textLeft"  colspan='1' rowspan='3'>Accessories:</td>
                    </tr>
                    <tr>
                        <td class="td textLeft"  colspan='3' >Serial No:</td>
                    </tr>
                    <tr>
                        <td class="td textLeft" colspan='3'>Date of Next Calibration:</td>
                    </tr>
                </table>
                 <!-- personnel calibration performed        -->
                <table class="table" >
                    <tr>
                        <td class="td textLeft" style="width: 15%;">Calibrated by:</td>
                        <td class="td textLeft" style="width: 15%;">Encoded by:</td>
                        <td class="td textLeft" style="width: 15%;">Checked by:</td>
                    </tr>
                </table>
    </div>
    <!-- uncertainty budget table -->
    <div class="page">
        <?php
            $numberOfItems = 1; // Default to 1 table
            $calculatedDataArray = json_decode(json_encode($calculatedData), true);

            $columnsPerTable = 5; // Number of columns per table

            /** Define all column names and their corresponding data keys*/
            $dataColumns = [
                'udrift' => 'driftOfStandard',
                'ustd' => 'standardUncertaintyValue',
                'ustd_unc' => 'uncertaintyOfStandardUsed',
                'udrift' => 'uncertaintyOfDriftStandard',
                'ures_std' => 'uncertaintyResOfStandard',
                'ures_uuc' => 'uncertaintyResOfUUC',
                'hst_bias' => 'hstBias',
                'u_hst_std_dev' => 'uncertaintyHstStandardDeviation',
                'uc' => 'combinedUncertainty',
                'k' => 'coverageFactor',
                'Ue' => 'expandedUncertainty'
            ];

            foreach ($calculatedDataArray as $tableKey => $rowData) {
                $numColumns = count($dataColumns);
                $numTables = ceil($numColumns / $columnsPerTable);

                for ($t = 0; $t < $numTables; $t++) {
                    $startCol = $t * $columnsPerTable;
                    $endCol = min($startCol + $columnsPerTable, $numColumns);
                    $currentColumns = array_slice(array_keys($dataColumns), $startCol, $columnsPerTable);

                    echo '<table class="table1">';
                    echo '<thead>';
                    echo '<tr><th class="textCenter" colspan="' . count($currentColumns) . '">Uncertainty Budget Table (Part ' . ($t + 1) . ')</th></tr>';
                    echo '<tr>';

                    foreach ($currentColumns as $header) {
                        echo '<td class="textCenter">' . $header . '</td>';
                    }

                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    echo '<tr>';
                    foreach ($currentColumns as $header) {
                        $dataKey = $dataColumns[$header];
                        echo '<td class="textCenter">' . ($rowData[$dataKey] ?? 'N/A') . '</td>';
                    }
                    echo '</tr>';

                    echo '</tbody>';
                    echo '</table>';
                }
            }
        ?>
    </div>
</body>
</html>   