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
            bottom: 10px;
            left: 0px;
            right: 0px;
            height: 10px;
        }
        .page {
            page-break-after: always;
        }
        .page:last-child {
            page-break-after: never;
        }
    
        .textLeft {
             text-align: left;
        }
        .textCenter {
             text-align: center;
        }
        .table {
            font-size: .7em;
            margin-top: 1px; 
            margin-bottom: 1px;
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black; 
        }
        .table th,  {
            border: 1px solid black; /* Borders for specific th and td */
            padding: 0.5px;
            /* text-align: left; */
        }
        .table td {
            vertical-align: top;
            border: 1px solid black; /* Borders for specific th and td */
            padding: 0.5px;
        }
        .table1 {
            font-size: .7em;
            margin-top: 1px; 
            margin-bottom: 1px;
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black; 
        }
        .table1 th,  {
            border: 1px solid black; /* Borders for specific th and td */
            padding: 1px;
            /* text-align: center; */
        }
        .table1 td {
            border: 1px solid black; /* Borders for specific th and td */
            padding: 1px;
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
            margin-top: 1px; 
            margin-bottom: 1px;
            border-collapse: collapse;
            width: 100%;
           
        }
        .table3 th{
            /* border: 1px solid black; Borders for specific th and td */
            padding: 1px;
            /* text-align: left; */
        }
        .table3 td {
            /* border: 1px solid black; Borders for specific th and td */
            padding: 1px;
            /* text-align: left; */
        }


        


    </style>
</head>
<body>
    <header>
        <div style="text-align: center; border: 0px solid blue; line-height: 1;">
            Republic of the Philippines<br>
            <h5 style="margin: 0; color: blue">DEPARTMENT OF SCIENCE AND TECHNOLOGY</h5>
            CALABARZON<br>
            <h5 style="margin: 0;">Regional Metrology Laboratory</h5>
            Calibration Worksheet<br>
            <p style="margin: 0;"><u><i>CP-004</i></u> : Electrical Meter</p>
        </div>
    </header>
    <footer>
    <div style="font-size: .5em;">
                <table style="border-collapse: collapse; border: none; width: 100%; text-align: right; z-index: -1;">
                    <tr><td>Page ____ of ____</td></tr>
                    <tr><td>CP-004-F1 Rev. 0</td></tr>
                    <tr><td>Effectivity Date: 27 August 2019</td></tr>
                </table>
            </div>
    </footer>

    <div class="page">
            <!-- Customer and Equipment Details -->
            <div >
                <table class="table" style="text-align: left;">
                    <tr>
                        <td colspan="2">Certificate No.: <?= $equipmentInfo->certificateNumber?></td>
                        <td>Date Received:<?= $customerInfo->dateReceived?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Customer: <?= $customerInfo->customer?></td>
                        <td>Date Calibrated: <?= $equipmentInfo->dateCalibrated?></td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="2" style="vertical-align: top;">Address: <?= $customerInfo->address?></td>
                        <td>Recommended Due Date: <?= $customerInfo->recommendedDueDateSelect?></td>
                    </tr>
                    <tr>
                        <td>Place of Calibration: <?= $equipmentInfo->placeOfCalibration?></td>
                    </tr>
                    <tr>
                        <td>Equipment Description: <?= $equipmentInfo->equipmentDescription?></td>
                        <td>Start Temp (°C): <?= $environmentInfo->tempStart?></td>
                        <td>Start RH (% RH): <?= $environmentInfo->rhStart?></td>
                    </tr>
                    <tr>
                        <td>Manufacturer: <?= $equipmentInfo->manufacturer?></td>
                        <td>End Temp (°C): <?= $environmentInfo->tempEnd?></td>
                        <td>End RH (% RH): <?= $environmentInfo->rhEnd?></td>
                    </tr>
                    <tr>
                        <td colspan="3">Model No.: <?= $equipmentInfo->modelNumber?></td>
                    </tr>
                    <tr>
                        <td colspan="3">Serial No.: <?= $equipmentInfo->serialNumber?></td>
                    </tr>
                    <tr>
                        <td colspan="3">Equipment ID: <?= $equipmentInfo->equipmentId?></td>
                    </tr>
                </table>
            </div>
            <!-- Preliminary Inspection    -->
            <div>
                <table class="table2">
                    <tr>
                        <th >Preliminary Inspection</th>
                    </tr>
                    <tr>
                        <td >
                            <label>
                                <input type="checkbox"> Visual Inspection (clean the equipment w/ soft cloth to remove dust and small particles)
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <label>
                                <input type="checkbox"> Check the surface and edges of the equipment for any damages. (note in remarks)
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <label>
                                <input type="checkbox"> Check the protective window of the equipment for cracks/scratches, color change, and broken window 
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <label>
                                <input type="checkbox"> Check if the stylus or pointer move smoothly when applied with increasing and decreasing test point
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <label>
                                <input type="checkbox"> Check if the battery and the fuse are still in good condition
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <label>
                                <input type="checkbox"> Check the continuity of the test leads
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <label>
                                <input type="checkbox"> Record all necessary and vital information
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td >
                   
                        </td>
                    </tr>

                </table>
            </div> 
             <!-- Measurement Data title    -->
            <div>
                <table class="table3">
                    <tr>
                        <th>Measurement Data</th>
                    </tr>
                
                </table>
            </div> 
            <!-- Meter Table -->
            <?php
                       $numberOfItems = 1;
                       // Count rows dynamically based on available data
                       while (isset($dataInputs->{'powerTable' .  ($numberOfItems + 1)})) {
                           $numberOfItems++;
                       }
       
                      $dataInputsArray = json_decode(json_encode($dataInputs), true);
                      $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                      // Determine items per page, maximum of 3
                      $itemsPerPage = min(3, max(1, $numberOfItems));     
                      $numberOfItems = count($dataInputsArray);
                      $startIndex = ($page - 1) * $itemsPerPage + 1;
                      $endIndex = min($startIndex + $itemsPerPage - 1, $numberOfItems);
  

                    // Loop through items/tables based on start and end index
                    for ($i = $startIndex; $i <= $endIndex; $i++) {
                        $powerTable = 'powerTable' . $i;
                        $functionTable = 'functionTable' . $i;
                        $rangeTable = 'rangeTable' . $i;
                        $resolutionTable = 'resolutionTable' . $i;
                        $readabilityTable = 'readabilityTable' . $i;
                        $numTrialsKey = 'numberOfTrialsTable' . $i;

                        // Check if number of trials is set
                        if (isset($dataInputsArray[$numTrialsKey])) {
                            $numTrials = $dataInputsArray[$numTrialsKey];
                        } else {
                            $numTrials = 3; // Default number of trials if not set
                        }

                        // Adjust initialColumns and totalColumns based on the number of trials
                        if ($numTrials == 3) {
                            $initialColumns = 2;
                            $totalColumns = 2;
                        } elseif ($numTrials == 5) {
                            $initialColumns = 3;
                            $totalColumns = 1;
                        }

                        echo '<table class="table">';
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th class="td textLeft" colspan="1"> ' . $dataInputsArray[$powerTable] . '</th>';
                        echo '<th class="td textLeft" colspan="1">Function ' . $dataInputsArray[$functionTable] . '</th>';
                        echo '<th class="td textLeft" colspan="2">Range ' . $dataInputsArray[$rangeTable] . '</th>';
                        echo '<th class="td textLeft" colspan="2">Res/Grad ' . $dataInputsArray[$resolutionTable] . '</th>';
                        echo '<th class="td textLeft" colspan="2">Readability ' . $dataInputsArray[$readabilityTable] . '</th>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<th class="td textCenter" colspan="' . $initialColumns . '">Test Points</th>';

                        // Dynamically generate trial headers based on the number of trials
                        for ($j = 1; $j <= $numTrials; $j++) {
                            echo '<th class="td textCenter" colspan="' . $totalColumns . '">Trial ' . $j . '</th>';
                        }

                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';

                        // Count the number of rows dynamically based on available data
                        $numRows = 1;
                        while (isset($dataInputsArray['testPointTABLE' . $i . 'ROW' . ($numRows + 1)])) {
                            $numRows++;
                        }

                        for ($x = 1; $x <= $numRows; $x++) {
                            $testPointKey = 'testPointTABLE' . $i . 'ROW' . $x;
                            echo '<tr>';
                            echo '<td class="textCenter" colspan="' . $initialColumns . '">' . $dataInputsArray[$testPointKey] . '</td>';
                            for ($j = 1; $j <= $numTrials; $j++) {
                                $trialKey = 'trial' . $j . 'TABLE' . $i . 'ROW' . $x;
                                echo '<td class="textCenter" colspan="' . $totalColumns . '">' . (isset($dataInputsArray[$trialKey]) ? $dataInputsArray[$trialKey] : '') . '</td>';
                            }
                            echo '</tr>';
                        }

                        echo '</tbody>';
                        echo '</table>';
                    }


            ?>
            <!-- Remarks -->
            <div>
                <table class="table2" style="font-size: .7em;">
                    <tr>
                        <td style="height: 40px; vertical-align: top;">Remarks:</td>
                    </tr>
                </table>
            </div>
            <!-- Standard Used -->
            <div>
                <table class="table" style="text-align: left; font-size: .7em;">
                    <tr>
                        <th colspan="2">Standard Used</th>
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
            <!-- Personnel  Calibrated info -->
            <div>
                <table class="table mt-2" style="text-align: left; font-size: .7em;">
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
             
    </div>

    <div class="page">

            <!-- personnel calibration performed        -->
            <table class="table" >
                    <tr>
                    <td class="td textLeft" colspan='3'>Certificate No: <?= $equipmentInfo->certificateNumber?></td>
                    <td class="td textLeft" colspan='1'>Equipment Description: <?= $equipmentInfo->equipmentDescription?></td>
                    </tr>
            </table>
        
            <!-- New table on the second page -->
            <?php
                    $numberOfItems = 1;
                    // Count rows dynamically based on available data
                    while (isset($dataInputs->{'powerTable' .  ($numberOfItems + 1)})) {
                        $numberOfItems++;
                    }

                // $numberOfTables; // Default value
                // Render the remaining tables on the second page
                if ($numberOfItems > 1) {
                    echo '<div class="page">';
                    for ($i = 4; $i <= $numberOfItems; $i++) {
                        $powerTable = 'powerTable' . $i;
                        $functionTable = 'functionTable' . $i;
                        $rangeTable = 'rangeTable' . $i;
                        $resolutionTable = 'resolutionTable' . $i;
                        $readabilityTable = 'readabilityTable' . $i;
                        $numTrialsKey = 'numberOfTrialsTable' . $i;

                        // Check if number of trials is set
                        if (isset($dataInputs->$numTrialsKey)) {
                            $numTrials = $dataInputs->$numTrialsKey;
                        } 
                        // Adjust initialColumns and totalColumns based on the number of trials
                        if ($numTrials == 3) {
                            $initialColumns = 2;
                            $totalColumns = 2;
                        } elseif ($numTrials == 5) {
                            $initialColumns = 3;
                            $totalColumns = 1;
                        }

                        echo '<table class="table">';
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th class="td textLeft" colspan="1"> ' . $dataInputsArray[$powerTable] . '</th>';
                        echo '<th class="td textLeft" colspan="1">Function ' . $dataInputsArray[$functionTable] . '</th>';
                        echo '<th class="td textLeft" colspan="2">Range ' . $dataInputsArray[$rangeTable] . '</th>';
                        echo '<th class="td textLeft" colspan="2">Res/Grad ' . $dataInputs->$resolutionTable . '</th>';
                        echo '<th class="td textLeft" colspan="2">Readability ' . $dataInputs->$readabilityTable . '</th>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<th class="td textCenter" colspan="' . $initialColumns .  '">Test Points</th>';

                        // Dynamically generate trial headers based on the number of trials
                        for ($j = 1; $j <= $numTrials; $j++) {
                            echo '<th class="td textCenter" colspan="' . $totalColumns.  '">Trial ' . $j . '</th>';
                        }

                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';

                        // Count the number of rows dynamically based on available data
                        $numRows = 1;
                        while (isset($dataInputs->{'testPointTABLE' . $i . 'ROW' . ($numRows + 1)})) {
                            $numRows++;
                        }

                        for ($x = 1; $x <= $numRows; $x++) {
                            $testPointKey = 'testPointTABLE' . $i . 'ROW' . $x;
                            echo '<tr>';
                            echo '<td class="textCenter" colspan="' . $initialColumns .  '">' . $dataInputs->$testPointKey . '</td>';
                            for ($j = 1; $j <= $numTrials; $j++) {
                                $trialKey = 'trial' . $j . 'TABLE' . $i . 'ROW' . $x;
                                echo '<td class="textCenter" colspan="' . $totalColumns .  '">' . (isset($dataInputs->$trialKey) ? $dataInputs->$trialKey : '') . '</td>';
                            }
                            echo '</tr>';
                        }

                        echo '</tbody>';
                        echo '</table>';
                    }
                    echo '</div>';
                }
            ?>
    </div>

    <!-- uncertainty budget table -->
    <div class="page">
        <?php
            $calculatedDataArray = json_decode(json_encode($calculatedData), true);
            $numberOfItems = 0;
            while (isset($calculatedDataArray['table' . ($numberOfItems + 1)])) {
                $numberOfItems++;
            }
            $columnsPerTable = 6; // Number of columns per table
            // Define all column names
            $dataColumns = [
                'testpoint',
                'average',
                'deviation',
                'standardDeviation',
                'valueRepeatability',
                'uncertaintyRepeatability',
                'uncertaintyUUCResolution',
                'uncertaintyStandard',
                'combinedUncertainty',
                'vEff',
                'k',
                'expandedUncertainty'
            ];

            foreach ($dataColumns as $column) {
                $columnHeaders[] = $column;
            }

            for ($i = 1; $i <= $numberOfItems; $i++) {
                $tableKey = 'table' . $i;

                if (!isset($calculatedDataArray[$tableKey])) {
                    continue; // Skip if the table data does not exist
                }

                $numColumns = count($columnHeaders);
                $numTables = ceil($numColumns / $columnsPerTable);

                for ($t = 0; $t < $numTables; $t++) {
                    $startCol = $t * $columnsPerTable;
                    $endCol = min($startCol + $columnsPerTable, $numColumns);
                    $currentColumns = array_slice($columnHeaders, $startCol, $endCol - $startCol);

                    echo '<table class="table" style="text-align: left; font-size: .6em;">';
                    echo '<thead>';
                    echo '<tr><th class="textCenter" colspan="' . count($currentColumns) . '">Uncertainty Budget Table ' . $i . ' (Part ' . ($t + 1) . ')</th></tr>';
                    echo '<tr>';

                    foreach ($currentColumns as $header) {
                        echo '<th class="textCenter">' . ucfirst(str_replace('_', ' ', $header)) . '</th>';
                    }

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

                        foreach ($currentColumns as $column) {
                            echo '<td class="textCenter">' . ($rowData[$column] ?? 'N/A') . '</td>';
                        }

                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                }
            }
        ?>


    </div>
</body>
</html>


