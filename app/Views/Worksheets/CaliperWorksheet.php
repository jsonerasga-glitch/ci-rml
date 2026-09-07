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
            margin-top: 5px; 
            margin-bottom: 5px;
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black; 
        }
        .table th,  {
            border: 1px solid black; 
            padding: 1px;
        }
        .table td {
            vertical-align: top;
            border: 1px solid black; 
            padding: 1px;
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
            border: 1px solid black;
            padding: 1px;
        }
        .table1 td {
            border: 1px solid black; 
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
        .table2 th, .table2 td {
            padding: 1px;
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
            width: 100px; /* Adjust the width as needed */
            border-bottom: 1px solid black;
         }
         .fixed-underline2 {
            display: inline-block;
            width: 80px; 
            border-bottom: 1px solid black;
         }
        .fixed-underline3 {
            display: inline-block;
            width: 120px; /* Adjust the width as needed */
            border-bottom: 1px solid black;
        }
        input[type="checkbox"] {
            width: 16px;
            height: 16px;
            margin-left:4px;
            margin-right:10pxe;
        }
   </style>
</head>
<body>
    <header>
        <?php
                $equipmentInfoArray = json_decode(json_encode($equipmentInfo), true);
                $selectedType = null;
                if (isset($equipmentInfoArray['equipmentDescription']) && strpos($equipmentInfoArray['equipmentDescription'], 'Micrometer') !== false) {
                    $selectedType = 'Micrometer';
                }
                if ($selectedType !== null) {
                    ?> 
                   
                    <div style="text-align: center; border: 0px solid blue; line-height: 1;">
                        Republic of the Philippines<br>
                        <h5 style="margin: 0; color: blue">DEPARTMENT OF SCIENCE AND TECHNOLOGY</h5>
                        CALABARZON<br>
                        <h5 style="margin: 0;">Regional Metrology Laboratory</h5>
                        Calibration Worksheet<br>

                        <h4 style="margin: 0;">Micrometer</h4>
                    </div>
                    <?php
                } else {
                    ?> 
                    <div style="text-align: center; border: 0px solid blue; line-height: 1;">
                        Republic of the Philippines<br>
                        <h5 style="margin: 0; color: blue">DEPARTMENT OF SCIENCE AND TECHNOLOGY</h5>
                        CALABARZON<br>
                        <h5 style="margin: 0;">Regional Metrology Laboratory</h5>
                        Calibration Worksheet<br>

                        <h4 style="margin: 0;">Caliper</h4>
                    </div>
                    <?php
                }
        ?>
    </header>
    <footer>
        <div style="font-size: .5em;">
                    <table style="border-collapse: collapse; border: none; width: 100%; text-align: right; z-index: -1;">
                        <tr><td>Page ____ of ____</td></tr>
                        <!-- <tr><td>CP-004-F1 Rev. 0</td></tr>
                        <tr><td>Effectivity Date: 27 August 2019</td></tr> -->
                    </table>
        </div>
    </footer>
    <div class="page">
            <!-- Customer and Equipment Details -->
            <div >
                <table class="table" style="text-align: left;">
                    <tr>
                        <td colspan="2">Certificate No.: <?= $equipmentInfo->certificateNumber?></td>
                        <td colspan="2">Date Received:<?= $customerInfo->dateReceived?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Customer: <?= $customerInfo->customer?></td>
                        <td colspan="2">Date Calibrated: <?= $equipmentInfo->dateCalibrated?></td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="2" style="vertical-align: top;">Address: <?= $customerInfo->address?></td>
                        <td colspan="2">Recommended Due Date: <?= $customerInfo->recommendedDueDate?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Place of Calibration: <?= $equipmentInfo->placeOfCalibration?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Equipment Description: <?= $equipmentInfo->equipmentDescription?></td>

                        <td colspan="2">Range: <?= $equipmentInfo->equipmentRange?>&nbsp;&nbsp;&nbsp;<?= $equipmentInfo->equipmentRangeUnit?></td>
                
                    </tr>
                    <tr>
                        <td colspan="2">Manufacturer: <?= $equipmentInfo->manufacturer?></td>
                        <td colspan="2">Graduation: </td>
                    </tr>
                    <tr>
                        <td colspan="2">Model No.: <?= $equipmentInfo->modelNumber?></td>
                        <td colspan="2">Readability: </td>
                      
                    </tr>
                    <tr>
                        <td colspan="2">Serial No.: <?= $equipmentInfo->serialNumber?></td>
                        <td colspan="1">Start Temp (°C): <?= $environmentInfo->tempStart?></td>
                        <td colspan="1 ">Start RH (% RH): <?= $environmentInfo->rhStart?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Equipment ID: <?= $equipmentInfo->equipmentId?></td>
                        <td colspan="1">End Temp (°C): <?= $environmentInfo->tempEnd?></td>
                        <td colspan="1">End RH (% RH): <?= $environmentInfo->rhEnd?></td>
                      
                    </tr>
                </table>
            </div>
            <!-- Preliminary Inspection    -->
            <div>
                <table class="table2">
                    <tr>
                        <th colspan="6">Preliminary Inspection</th>
                    </tr>
                    <tr>
                        <td colspan="1"></td>
                        <td colspan="1">Scale / Graduation</td>
                        <td colspan="2"><label><input type="checkbox">readable</label></td>
                        <td colspan="2"><label><input type="checkbox">unsatisfactory</label></td>
                    </tr>
                    <tr>
                        <td colspan="1"></td>
                        <td colspan="1">Missing / Broken Parts</td>
                        <td colspan="2"><label><input type="checkbox"><span class="fixed-underline1"> </span></label></td>
                        <td colspan="2"><label><input type="checkbox"><span class="fixed-underline1"> </span></label></td>
                    </tr>
                    <tr>
                        <td colspan="1"></td>
                        <td colspan="5">Visual inspection shows that the general condition and workmanship of the instrument <span class="fixed-underline1"> </span>.</td>
                    </tr>
                    <tr>
                        <td colspan="1"></td>
                        <td colspan="5">&nbsp;</td>
                    </tr>
   
                </table>
            </div> 
            <!-- Display if Micrometer Type Table    -->
            <?php
                $selectedType = null;

                // Iterate through the data inputs
                foreach ($dataInputs as $key => $value) {
                    if (strpos($key, 'type') !== false && $value == 'Micrometer') {
                        $selectedType = str_replace('type', '', $key);
                    }
                }

                // Display the table if $selectedType is set
                if ($selectedType !== null) {
                    ?>
                    <div>
                        <table class="table no-border" >
                            <tr>
                                <td  colspan='8'>&nbsp;</td>
                            </tr>
                            <tr>
                                <td  colspan='1'>Parallelism of Measuring Faces:</td>
                           
                                <td  colspan='2'  class="td textCenter"><span class="fixed-underline3"  class="td textCenter">&nbsp; 1 mm</span></td>
                                <td  colspan='1'></td>
                                <td  colspan='1'></td>
                                <td  colspan='1'></td>
                                <td  colspan='1'>&nbsp;</td>
                                <td  colspan='1'>&nbsp;</td>
                            </tr>  
                            <tr>
                                <td  colspan='8'></td>
                            </tr>
                            <tr>
                                <td  colspan='8'></td>
                            </tr>
                            <tr>
                                <td  colspan='8'></td>
                            </tr>
                             
                            <tr>
                             
                                <td colspan='1'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Gauge Block Position</td>
                              
                                <td colspan='1'>1<span class="fixed-underline2"> </span></td>
                                <td colspan='1'>2<span class="fixed-underline2"> </span></td>
                                <td colspan='1'>3<span class="fixed-underline2"> </span></td>
                                <td colspan='1'>4<span class="fixed-underline2"> </span></td>
                                <td colspan='1'>5<span class="fixed-underline2"> </span></td>
                                <td  colspan='1'>&nbsp;</td>
                                <td  colspan='1'>&nbsp;</td>
                            </tr>

                            <tr>
                                <td  colspan='8'>&nbsp;</td>
                            
                            </tr>
                                 
                            <tr>
                                <td  colspan='1'>Flatness of Measuring Faces:</td>
                         
                                <td  colspan='2'  class="td textCenter"><span class="fixed-underline3"  class="td textCenter">&nbsp;</span></td>
                              
                                <td  colspan='1'></td>
                                <td  colspan='1'></td>
                                <td  colspan='1'></td>
                         
                                <td  colspan='1'>&nbsp;</td>
                                <td  colspan='1'>&nbsp;</td>
                            </tr>
                            <tr>
                                <td  colspan='8'></td>
                            </tr>
                            <tr>
                                <td  colspan='8'></td>
                            
                            </tr>
                            <tr>
                                <td  colspan='8'></td>
                            </tr>
                            
                            </tr>
                             
                            <tr>
                        
                                <td colspan='1'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Wavelemght (λ): 0.575 μm</td>
                                <td colspan='1'>1<span class="fixed-underline2"> </span></td>
                                <td colspan='1'>2<span class="fixed-underline2"> </span></td>
                                <td colspan='1'>3<span class="fixed-underline2"> </span></td>
                                <td colspan='1'>4<span class="fixed-underline2"> </span></td>
                                <td colspan='1'>5<span class="fixed-underline2"> </span></td>
                                <td  colspan='1'>&nbsp;</td>
                                <td  colspan='1'>&nbsp;</td>
                            
                            </tr>

                            <tr>
                                <td  colspan='8'>&nbsp;</td>
                            
                                <tr>
                                <td  colspan='8'>&nbsp;</td>
                            
                            </tr>

                            <tr>
                                <td  colspan='1'></td>
                                <td  colspan='1'>Spindle</td>
                                <td  colspan='1'> &nbsp;&nbsp;<span class="fixed-underline2"></span></td>
                                <td  colspan='3'> &nbsp;&nbsp; x &nbsp;&nbsp; (&nbsp;&nbsp;λ&nbsp;&nbsp;)&nbsp;&nbsp;=&nbsp;&nbsp;
                                <span class="fixed-underline2">
                               </span>
                                </td>
                            </tr>
                            <tr>
                                <td  colspan='1'></td>
                         
                                <td  colspan='1'></span></td>
                                <td  colspan='1' class="td textCenter">2</td>
                                <td  colspan='1'></td>
                                <td  colspan='1'></td>
                                <td  colspan='1'></td>
                                <td  colspan='1'>&nbsp;</td>
                                <td  colspan='1'>&nbsp;</td>
                            </tr>
                            <tr>
                                <td  colspan='1'></td>
                                <td  colspan='1'>Anvil</td>
                                <td  colspan='1'> &nbsp;&nbsp;<span class="fixed-underline2"></span></td>
                                <td  colspan='3'> &nbsp;&nbsp; x &nbsp;&nbsp; (&nbsp;&nbsp;λ&nbsp;&nbsp;)&nbsp;&nbsp;=&nbsp;&nbsp;
                                <span class="fixed-underline2">
                               </span>
                                </td>
                            </tr>
                            <tr>
                                <td  colspan='1'></td>
                         
                                <td  colspan='1'></span></td>
                                <td  colspan='1' class="td textCenter">2</td>
                                <td  colspan='1'></td>
                                <td  colspan='1'></td>
                                <td  colspan='1'></td>
                                <td  colspan='1'>&nbsp;</td>
                                <td  colspan='1'>&nbsp;</td>
                            </tr>

                            <tr>
                                <td  colspan='8'>&nbsp;</td>
                            
                            </tr>
                   
                   
                        </table>
                    </div>
                    <?php
                }
            ?>
            <!-- Meter Table -->
            <?php
                $numberOfItems = 1;
                while (isset($dataInputs->{'numberOfTables' .  ($numberOfItems + 1)})) {
                    $numberOfItems++;
                }
                $dataInputsArray = json_decode(json_encode($dataInputs), true);
                for ($i = 1; $i <= $numberOfItems; $i++) {
                    $numTrialsKey = 'numberOfTrialsTable' . $i;
                    $unitTableKey = 'unitTable' . $i;

                    $numTrials = isset($dataInputsArray[$numTrialsKey]) ? $dataInputsArray[$numTrialsKey] : 5;
                    
                    $initialColumns = 1;
                    $totalColumns = 1;

                    echo '<table class="table" style="width:100%">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<td class="textCenter" colspan="3" style="width:20%">Nominal Size, '. $dataInputs->$unitTableKey .'</td>';
                    echo '<td class="textCenter" colspan="' . $numTrials . '">Reading, '. $dataInputs->$unitTableKey .'</td>';
                    echo '<td class="textCenter" style="width:10%" >Unit</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td class="textCenter" colspan="2" style="width:15%">Gauge Block Used</td>';
                    echo '<td class="textCenter" colspan="1" style="width:5%">Equiv.</td>';

                    
                    for ($j = 1; $j <= $numTrials; $j++) {
                        echo '<td class="td textCenter" colspan="1">Trial ' . $j . '</td>';
                    }
                    echo '<td class="textCenter" colspan="1">Unit</td>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    $numRows = 1;
                    while (isset($dataInputsArray['gaugeBlockUsedATABLE' . $i . 'ROW' . ($numRows + 1)])) {
                        $numRows++;
                    }

                    for ($x = 1; $x <= $numRows; $x++) {
                        $gaugeBlockUsedAKey = 'gaugeBlockUsedATABLE' . $i . 'ROW' . $x;
                        $gaugeBlockUsedBKey = 'gaugeBlockUsedBTABLE' . $i . 'ROW' . $x;
                        $equivKey = 'equivTABLE' . $i . 'ROW' . $x;

                        echo '<tr>';
                        echo '<td class="textCenter" >
                        ' . $dataInputsArray[$gaugeBlockUsedAKey] . ' 
                        </td>';
                        echo '<td class="textCenter" >
                
                        ' . $dataInputsArray[$gaugeBlockUsedBKey] . '

                        </td>';
                        echo '<td class="textCenter" >
                
                        ' . $dataInputsArray[$equivKey] . '
                        </td>';

                    
                        for ($j = 1; $j <= $numTrials; $j++) {
                            $trialKey = 'trial' . $j . 'TABLE' . $i . 'ROW' . $x;
                            echo '<td class="textCenter" >' . (isset($dataInputsArray[$trialKey]) ? $dataInputsArray[$trialKey] : '') . '</td>';
                        }
                        echo '<td class="textCenter" >' . $dataInputsArray[$unitTableKey] . '</td>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                }
            ?>
            <!-- Standard Used -->
            <div>
                <table class="table" style="width: 100%;">

                    <tr>
                        <th colspan='2'>Standard Used</th>
                    </tr>
                    <tr>
                        <td style="width: 60%;">Standard Description:</td>
                        <td rowspan="2" style="width: 40%;">
                            Remarks: <br>
                            <label>
                                <input type="checkbox">
                                UUC and standards are in good condition <br> 
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                before and after calibration
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td >Manufacturer</td>
                    </tr>
                    <tr>
                        <td >Model No.:</td>
                        <td  rowspan="3">Accessories:</td>
                    </tr>
                    <tr>
                        <td >Serial No.:</td>
                    </tr>
                    <tr>
                        <td >Date of Next Calibration:</td>
                    </tr>
                </table>
            </div>
            <!-- Personnel  Calibrated info -->
            <div>
                <table class="table mt-2" style="text-align: left; font-size: .7em;">
                    <tr>
                        <td>Time Started:</td>
                        <td>Calibrated by:</td>
                        <td>Checked by:</td>
                    </tr>
                    <tr>
                        <td>Time Started:</td>
                        <td>Date:</td>
                        <td>Date:</td>
                    </tr>
                </table>
            </div>

            
    </div>
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
                'Nominal size' => 'equiv',
                'Unit' => 'unit',
                'Uncertainty due to standard' => 'unc_standard',
                'Uncertainty due to build up of reference standard' => 'unc_buildUpReferenceStandard',
                'Uncertainty due to difference in C.T.E (cal item & standard)' => 'unc_differenceCTE',
                'Uncertainty due to C.T.E (cal item)' => 'unc_CTE',
                'Uncertainty due to difference in temperature' => 'unc_diffTemp',
                'Uncertainty due to temperature of Cal Item' => 'unc_tempCalItem',
                'Uncertainty due to sensitivity / resolution' => 'unc_sensitivityResolution',
                'Uncertainty due to repeated reading' => 'unc_repeatedReading',
                'Combined Uncertainty' => 'calculated_combinedUncertainty',
                'k' => 'k',
                'Expanded Uncertainty' => 'calculated_expandedUncertainty'
            ];

            $columnsPerTable = 7; // Number of columns per table
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

                    echo '<table class="table" style="text-align: left; font-size: .6em;">';
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
