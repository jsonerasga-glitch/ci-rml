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
                    margin-bottom: 50px; 
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
            bottom: -90px;
            left: 0px;
            right: 0px;
            height: 80px;
        }
        .page {
            page-break-after: always;
        }
        .page:last-child {
            page-break-after: never;
        }
        .table {
            font-size: .7em;
            margin-bottom: 4px;
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black; 
            margin-top: 4px; 
        }
        .table th, .table td {
            border: 1px solid black; /* Borders for specific th and td */
            padding: 1px;
            /* text-align: left; */
        }
        .td {
            vertical-align: top;
        }
        .table1 {
            font-size: .7em;
            margin-bottom: 4px;
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black; 
            margin-top: 4px; 
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
            margin: 0px; 
            margin-top: 5px; 
            margin-bottom: 5px;
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black; 
        }
        .table2 th{
            padding: 1px;
        }
        .table2 td {
            padding: 1px;
        }
        input[type="checkbox"] {
            width: 16px;
            height: 16px;
            margin-left:4px;
            margin-right:10pxe;
        }
        .remarks-container {
            font-size: .7em;
            margin-top: 5px;
            margin-bottom: 2px;
            border: 1px solid black; /* Outside border */
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
        }
        .remarks-header {
      
            text-align: left;
            font-weight: bold;
            margin-bottom: 2px;
        }
        .remarks-item {
            text-align: left;
            padding: 8px 0;
            border-top: 1px solid black; /* Top border for item */
        }
        .remarks-item:first-of-type {
            border-top: none; /* Remove top border from the first item */
        }
        .textLeft {
             text-align: left;
        }
        .textCenter {
             text-align: center;
        }
        .table2 {
            font-size: .7em;
            margin-bottom: 5px;
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black; 
            margin-top: 4px; 
        }
        .table2 th{
            padding: 1px;
            text-align: center;
        }
        .table2 th, .table2 td {
            /* border: 1px solid black; Borders for specific th and td */
            padding: 1px;
            /* text-align: left; */
        }
        .table3 {
            font-size: .7em;
            margin-bottom: 1px;
            border-collapse: collapse;
            width: 100%;
            /* border: 1px solid black;  */
            margin-top: 1px; 
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
            <h5 style="margin: 0;">DEPARTMENT OF SCIENCE AND TECHNOLOGY</h5>
            CALABARZON<br>
            <h5 style="margin: 0;">Regional Metrology Laboratory</h5>
            Calibration Worksheet<br>
            <p style="margin: 0;">CP-018: Calibration Worksheet for Temperature Controller</p>
        </div>
    </header>
    <footer>
        <div style="font-size: .5em;">
                <table style="border-collapse: collapse; border: none; width: 100%; text-align: right; z-index: -1;">
                    <tr><td>Page ____ of ____</td></tr>
                    <tr><td>CP-018-F1 Rev. 0</td></tr>
                    <tr><td>Effectivity Date : 15 Aug 2021</td></tr>
                </table>
        </div>
    </footer>


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
                        <td class="td textLeft" colspan='2' rowspan='2'>Address: <?= $customerInfo->address?></td>
                        <td class="td textLeft" colspan='2'>Recommended Due Date: <?= $customerInfo->recommendedDueDate?></td>
                    </tr>
                    <tr>
                        <td class="td textLeft" colspan='2'>Place of Calibration: <?= $equipmentInfo->placeOfCalibration?></td>
  
                    </tr>

                </table>

                <!-- Equipment and customer information table -->
                <table class="table" >
                    <tr>
                        <td class="td textLeft" colspan='2'>Equipment Description: <?= $equipmentInfo->equipmentDescription?></td>
                        <td class="td textLeft" colspan='1' rowspan='2'>Tamb: <?= $environmentInfo->tempAmb?></td>
                        <td class="td textLeft" colspan='1' rowspan='2'>RH: <?= $environmentInfo->rhAmb?></td>
                    </tr>
                    <tr>
                        <td class="td textLeft" colspan='2'>Manufacturer: <?= $equipmentInfo->manufacturer?></td>
                    </tr>
                    <tr>
                        <td class="td textLeft" colspan='2' >Model No: <?= $equipmentInfo->modelNumber?></td>
                        <td class="td textLeft" colspan='1' ></td>
                        <td class="td textLeft" colspan='1' ></td>
               
                    </tr>
                    <tr>
                        <td class="td textLeft" colspan='2'>Serial No: <?= $equipmentInfo->serialNumber?></td>
                        <td class="td textLeft" colspan='1' ></td>
                        <td class="td textLeft" colspan='1' ></td>
  
                    </tr>
                    <tr>
                        <td class="td textLeft" colspan='2'>Equipment ID: <?= $equipmentInfo->equipmentId?></td>
                        <td class="td textLeft" colspan='1' ></td>
                        <td class="td textLeft" colspan='1' ></td>
  
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
                                <td style="">
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
                                        Check the protective window of the equipment for cracks/scratches, color change, and broken window.

                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>
                                        <input type="checkbox">
                                        Check if the stylus or pointer move smoothly when applied with increasing and decreasing pressure.
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>
                                        <input type="checkbox">
                                        Check if the battery and the fuse are still in good condition.
                                    </label>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <label>
                                        <input type="checkbox">
                                        Check the continuity of the test leads.
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
                            <td>
                                &nbsp;
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- measurement data table title -->
                <table class="table3" >
                    <tr>
                        <th class="td textCenter" colspan='8'>Measurement Data</th>
                    </tr>
                </table>

                <!-- Temperature Controller Table -->
                <?php
                  
                    $dataInputsArray = json_decode(json_encode($dataInputs), true);
                    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                    $itemsPerPage = 1;
                    $numberOfItems = count($dataInputsArray);
                    $startIndex = ($page - 1) * $itemsPerPage + 1;
                    $endIndex = min($startIndex + $itemsPerPage - 1, $numberOfItems);
                    for ($i = $startIndex; $i <= $endIndex; $i++) {
                        $resolutionTable = 'resolutionTable' . $i;
                        $readabilityTable = 'readabilityTable' . $i;
                        $numTrialsKey = 'numberOfTrialsTable' . $i;

                 
                        if (isset($dataInputsArray[$numTrialsKey])) {
                            $numTrials = $dataInputsArray[$numTrialsKey];
                        } else {
                            $numTrials = 3; 
                        }

                  
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
                        echo '<th class="td textLeft" colspan="3">Function</th>';
                        echo '<th class="td textLeft" colspan="1">Range</th>';
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
                <div class="remarks-container">
                    <div class="remarks-header">Remarks</div>
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
                        <td class="td textLeft" style="width: 15%;">Time Started:</td>
                        <td class="td textLeft" style="width: 15%;" rowspan='2'>Calibrated by:</td>
                        <td class="td textLeft" style="width: 15%;">Checked by:</td>
                    </tr>
                    <tr>
                        <td class="td textLeft" style="width: 15%;">Time Finished:</td>
               
                        <td class="td textLeft" style="width: 15%;">Date:</td>
                    </tr>
                </table>
             
    </div>
    <!-- New table on the first and subsequent pages -->
    <?php
                $numberOfItems = 1;
                // Count rows dynamically based on available data
                while (isset($dataInputs->{'powerTable' .  ($numberOfItems + 1)})) {
                    $numberOfItems++;
                }
                echo '<table class="table">';
                echo '<tr>';
                echo '<td class="td textLeft" colspan="3">Certificate ' . $equipmentInfo->certificateNumber . '</td>';
                echo '<td class="td textLeft" colspan="2">Equipment Description: ' . $equipmentInfo->equipmentDescription . '</td>';
                echo '</tr>';
                echo '</table>';
                echo '<table class="table3">';
                echo '<tr>';
                echo '<th class="td textCenter" colspan="3">Measurement Data</th>';
                echo '</tr>';
                echo '</table>';
                for ($i = 2; $i <= $numberOfItems; $i++) {
                    $resolutionTable = 'resolutionTable' . $i;
                    $readabilityTable = 'readabilityTable' . $i;
                    $numTrialsKey = 'numberOfTrialsTable' . $i;

                    // Check if number of trials is set
                    if (isset($dataInputs->$numTrialsKey)) {
                        $numTrials = $dataInputs->$numTrialsKey;
                    } 

                    // Adjust initialColumns and totalColumnsa based on the number of trials
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
                    echo '<th class="td textLeft" colspan="3">Function</th>';
                    echo '<th class="td textLeft" colspan="1">Range</th>';
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
                    echo '</div>';
                }
    ?>
    <!-- uncertainty budget table -->
    <div class="page">
        <?php
            $numberOfItems = 1; // Default to 1 table
            $calculatedDataArray = json_decode(json_encode($calculatedData), true);

            // Determine the number of items (tables)
            while (isset($calculatedDataArray['table' . ($numberOfItems + 1)])) {
                $numberOfItems++;
            }

            // Define all column names and their corresponding data keys
            $dataColumns = [
                'Test Point' => 'testpoint',
                'Urep_uuc' => 'uncertaintyUUCRepeatability',
                'Ures_uuc' => 'uncertaintyUUCResolution',
                'Ustd_unc' => 'uncertaintyReferenceStandard',
                'Ures_std' => 'uncertaintyResolutionStandard',
                'Ustd_influ' => 'uncertaintyInfluenceFactor',
                'Udrift' => 'uncertaintyDrifStandard',
                'Uc' => 'combinedUncertainty',
                'Veff' => 'vEff',
                'k' => 'k',
                'Ue' => 'expandedUncertainty'
            ];

            $columnsPerTable = 6; // Number of columns per table
            $totalColumns = count($dataColumns);

            for ($i = 1; $i <= $numberOfItems; $i++) {
                $tableKey = 'table' . $i;
                $rowData = $calculatedDataArray[$tableKey] ?? [];

                // Calculate the number of tables needed based on columnsPerTable
                $numTables = ceil($totalColumns / $columnsPerTable);

                // Loop to create each table segment
                for ($t = 0; $t < $numTables; $t++) {
                    $startCol = $t * $columnsPerTable;
                    $currentColumns = array_slice(array_keys($dataColumns), $startCol, $columnsPerTable);

                    echo '<table class="table" >';
                    echo '<thead>';
                    echo '<tr><th class="textCenter" colspan="' . count($currentColumns) . '">Uncertainty Budget Table ' . $i . ' (Part ' . ($t + 1) . ')</th></tr>';
                    echo '<tr>';

                    foreach ($currentColumns as $header) {
                        echo '<td class="textCenter">' . $header . '</td>';
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

                        foreach ($currentColumns as $header) {
                            $dataKey = $dataColumns[$header];
                            echo '<td class="textCenter">' . ($rowData[$rowKey][$dataKey] ?? 'N/A') . '</td>';
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


