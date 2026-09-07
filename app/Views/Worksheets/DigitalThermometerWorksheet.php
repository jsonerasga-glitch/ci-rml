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
            margin-bottom: 30px; 
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
            bottom: 2px;
            left: 0px;
            right: 0px;
            height: 10px;
        }
        .page {
            page-break-after: always;
        }
        .page:last-child {
            page-break-after: auto;
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
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black;     
        }
        .table2 th{
            padding: 0px; 
        }
        .table2 td {
            padding: 0px;
        }
        .table3 {
            font-size: .6em;
            margin-top: 1px; 
            margin-bottom: 1px;
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black; 
        }
        .table3 th,  {
            padding: 0.5px;
        }
        .table3 td {
            vertical-align: top;
            padding: 0.5px;
        }
        .table4 {
            font-size: .6em;
            margin-top: 1px; 
            margin-bottom: 1px;
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black; 
        }
        .table4 th,  {
            border: 1px solid black; 
            padding: 0.5px;
     
        }
        .table4 td {
            vertical-align: top;
            border: 1px solid black; 
            padding: 0.5px;
        }
        input[type="checkbox"] {
            width: 1em;
            height: 1em;
            padding-left:5px;
            padding-right:5px;
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
            <p style="margin: 0;"><u><i>CP-011</i></u> : Digital Thermometer</p>
        </div>
    </header>
    <footer>
        <div style="font-size: .5em;">
                <table style="border-collapse: collapse; border: none; width: 100%; text-align: right; z-index: -1;">
                    <tr><td>Page ____ of ____</td></tr>
                    <tr><td>CP-011-F1 Rev. 1</td></tr>
                    <tr><td>Effectivity Date : 01 August 2020</td></tr>
                </table>
        </div>
    </footer>

    <div class="page" >
        <div >
        <!-- Customer and Equipment Details -->
        <table class="table" style="text-align: left;">
                    <tr>
                        <td colspan="4">Certificate No.: <?= $equipmentInfo->certificateNumber?></td>
                        <td>Date Received:<?= $customerInfo->dateReceived?></td>
                    </tr>
                    <tr>
                        <td colspan="4">Customer: <?= $customerInfo->customer?></td>
                        <td>Date Calibrated: <?= $equipmentInfo->dateCalibrated?></td>
                    </tr>
                    <tr>
                        <td colspan="4" >Place of Calibration: 
                          
                            <?= $equipmentInfo->placeOfCalibration?>

                        </td>
                        <td>Recommended Due Date: <?= $customerInfo->recommendedDueDate?></td>
                    </tr>
        </table>
        <!-- Equipment Description   1  -->
        <div style="">
            <table class="table" style=" text-align: left;">
                <thead>
                    <tr>
                        <th colspan="3" style="text-align: center ;">Equipment Description</th>
                    </tr>  
                </thead>
                <tbody >
                    <tr>
                        <td>
                            <label>
                                <input type="checkbox" >Bimetal thermometer
                            </label>
                        </td>
                        <td>
                            <label>
                                <input type="checkbox">Digital thermometer 
                            </label>
                        </td>
                        <td>Range: <?= $equipmentInfo->range?>&nbsp;to&nbsp;<?= $equipmentInfo->rangeMax?>&nbsp;<?= $equipmentInfo->rangeMaxUnit?></td>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                <input type="checkbox">L-I-G thermometer
                            </label>
                        </td>
                        <td>
                            <label>
                                <input type="checkbox">Temperature controller
                            </label>
                        </td>
                        <td>Resolution/Graduation: <?= $equipmentInfo->resolution?></td>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                <input type="checkbox">Gas-filled thermometer
                            </label>
                        </td>
                        <td>
                            <label>
                                <input type="checkbox">Temperature recorder
                            </label>
                        </td>
                        <td>Readability: <?= $equipmentInfo->readability?></td>
                    </tr> 
                    <tr>
                        <td>
                            <label>
                                <input type="checkbox">Industrial glass thermometer
                            </label>
                        </td>
                        <td>
                            <label>
                                <input type="checkbox">Others: <?= $equipmentInfo->otherDepth?></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Equipment Description  2  -->
        <div>
            <table class="table" style=" text-align: left;">
                <tr>
                    <td>Readout (or details of UUC if sensor is built-in or analog/mechanical type)</td>
                    <td>Sensor Type (if applicable):
                        <?php /*
                        <?= $equipmentInfo->sensorTypeTable1?>
                        */
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Manufacturer: <?= $equipmentInfo->manufacturer?></td>
                    <td>Manufacturer: 
                        <?php /*
                        <?= $equipmentInfo->manufacturerTable1?>
                        */
                        ?>
                    </td>

                    
                </tr>
                <tr>
                    <td>Model : <?= $equipmentInfo->modelNumber?></td>
                    <td>Model :
                        <?php /*
                        <?= $equipmentInfo->modelNumberTable1?>
                        */
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Serial No.: <?= $equipmentInfo->serialNumber?></td>
                    <td>Serial No.:
                        <?php /*
                        <?= $equipmentInfo->serialNumberTable1?>
                        */
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Equipment ID: <?= $equipmentInfo->equipmentNumber?></td>
                    <td>Equipment ID:
                        <?php /*
                        <?= $equipmentInfo->equipmentIDTable1?>
                        */
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><i>Immersion Depth: 
                        <?php /*
                            <?= $equipmentInfo->statement_immersionDepth?>
                            */?>
                    </i></td>
                    <td></td>
                </tr>
         
            </table>
            <table class="table3" >
                <tr>
                    <td>If UUC is Liquid-In-Glass thermometer</td>
                    <td>
                        <label>
                            <input type="checkbox">Total Immersion
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox">Partial immersion with depth of
                        </label>
                    </td>
                    <td>mm from bulb tip</td>
                </tr>
            </table>
        </div>
        <!-- Preliminary Inspection    -->
        <div>
            <table class="table3" >
                <thead>
                    <tr>
                        <th style="border: 1px solid black;"><center>Preliminary Inspection</center></th>
                        <th style="border: 1px solid black;"><center>Environment Condition</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="">
                            <label>
                                <input type="checkbox">
                                Visual Inspection (clean the equipment w/ soft cloth to remove dust and small particles)
                            </label>
                        </td>
                        <td style="border: 1px solid black;">Start Temp (°C): <?= $environmentInfo->tempStart?></td>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                <input type="checkbox">
                                Check the surface and edges of the equipment for any damages. (note in remarks)
                            </label>
                        </td>
                        <td style="border: 1px solid black;">Start RH (% RH): <?= $environmentInfo->rhStart?></td>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                <input type="checkbox">
                                Check the protective window of the equipment for cracks/scratches, color change, and broken window
                            </label>
                        </td>
                        <td style="border: 1px solid black;">End Temp (°C): <?= $environmentInfo->tempEnd?></td>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                <input type="checkbox">
                                Record all necessary and vital information
                            </label>
                        </td>
                        <td style="border: 1px solid black;">End RH (% RH): <?= $environmentInfo->rhEnd?></td>
                    </tr>
                </tbody>
            </table>
        </div>  
        <!-- Measurement Data Table -->
        <?php
                $numberOfItems = 1;
                // Count rows dynamically based on available data
                while (isset($dataInputs->{'numberOfTables' .  ($numberOfItems + 1)})) {
                    $numberOfItems++;
                }
            
                for ($i = 1; $i <= $numberOfItems; $i++) {
        
                    echo '<table class="table" style="font-size: .7em; text-align: center;">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th class="td textCenter" colspan="9">Measurement Data </th>';
                    echo '</tr>';
    
                    echo '<tr>';
                    echo '<td class="td textCenter" colspan="1" rowspan="2">Test Points, °C</td>';
                    echo '<td class="td textCenter" colspan="1" rowspan="2">Standard Used</td>';
                    echo '<td class="td textCenter" colspan="1" rowspan="2">Temp Source</td>';
                    echo '<td class="td textCenter" colspan="3" >UUC reading, °C</td>';
                    echo '<td class="td textCenter" colspan="3" >Standard reading, °C</td>';
                    echo '</tr>';

                    echo '<tr>';
                    echo '<td  colspan="1" >Trial 1 </td>';
                    echo '<td  colspan="1" >Trial 2 </td>';
                    echo '<td  colspan="1" >Trial 3 </td>';
                    echo '<td  colspan="1" >Trial 1 </td>';
                    echo '<td  colspan="1" >Trial 2 </td>';
                    echo '<td  colspan="1" >Trial 3 </td>';
                    echo '</tr>';

                    echo '</thead>';
                    echo '<tbody>';

                    $numRows = 1;
                    while (isset($dataInputs->{'UUCtrial1TbodyTable' . $i . 'Row' . ($numRows + 1)})) {
                        $numRows++;
                    }

                    for ($x = 1; $x <= $numRows; $x++) {

                        $testPointKey = 'testPointTbodyTable' . $i . 'Row' . $x;
                        $stdKey       = 'standardUsedTbodyTable' . $i . 'Row' . $x;
                        $tempSourceKey = 'temperatureSourceTbodyTable' . $i . 'Row' . $x;

                        $uucTrial1Key = 'UUCtrial1TbodyTable' . $i . 'Row' . $x;
                        $uucTrial2Key = 'UUCtrial2TbodyTable' . $i . 'Row' . $x;
                        $uucTrial3Key = 'UUCtrial3TbodyTable' . $i . 'Row' . $x;

                        $stdTrial1Key = 'standardTrial1TbodyTable' . $i . 'Row' . $x;
                        $stdTrial2Key = 'standardTrial2TbodyTable' . $i . 'Row' . $x;
                        $stdTrial3Key = 'standardTrial3TbodyTable' . $i . 'Row' . $x;
                        echo '<tr>';
                        echo '<td class="textCenter" >' . $dataInputs->$testPointKey . '</td>';
                        echo '<td class="textCenter" >' . $dataInputs->$stdKey . '</td>';
                        echo '<td class="textCenter" >' . $dataInputs->$tempSourceKey . '</td>';
                        
                        echo '<td class="textCenter" >' . $dataInputs->$uucTrial1Key . '</td>';
                        echo '<td class="textCenter" >' . $dataInputs->$uucTrial2Key . '</td>';
                        echo '<td class="textCenter" >' . $dataInputs->$uucTrial3Key . '</td>';

                        echo '<td class="textCenter" >' . $dataInputs->$stdTrial1Key . '</td>';
                        echo '<td class="textCenter" >' . $dataInputs->$stdTrial2Key . '</td>';
                        echo '<td class="textCenter" >' . $dataInputs->$stdTrial3Key . '</td>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                }

                
                
        ?>
        <!-- Standard Used -->
        <div>
            <table class="table4" style=" width: 100%;">
                <thead >
                    <tr>
                        <th colspan="2">Standards</th>
                        <th colspan="2">Temperature Source</th>
                    </tr>
                </thead>
                <tbody >
                    <tr>
                        <td style="text-align: center; width: 2%;"><b>A</b></td>
                        <td>P.R.T.; Isotech; 935-14-116; S/N: 32452/2 (with readout Isotech TTI-7+; S/N: 32452/1)</td>
                        <td style="text-align: center; width: 2%;"><b>A</b></td>
                        <td>Ice bath</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;"><b>B</b></td>
                        <td>B P.R.T.; Isotech; 935-14-116; S/N: 32452/3 (with readout Isotech TTI-7+; S/N: 32452/1) </td>
                        <td style="text-align: center;"><b>B</b></td>
                        <td>Dryblock; Isotech; Fastcal; S/N: 281198-15</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;"><b>C</b></td>
                        <td>P.R.T. (Bended); Fluke; 5609; S/N: 03304 (with readout Fluke 1524; S/N: 2078009)</td>
                        <td style="text-align: center;"><b>C</b></td>
                        <td>Stirred Liquid Bath; Hart Scientific; 7341; S/N: A48046</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;"><b>D</b></td>
                        <td>P.R.T.; Fluke; 5616-12; S/N: 1003058 (with readout Fluke 1524; S/N: 2078009)</td>
                        <td style="text-align: center;"><b>D</b></td>
                        <td>Stirred Liquid Bath; Isotech; 798 EHT; S/N: 32452/6</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;"><b>E</b></td>
                        <td>P.R.T.; Fluke; 5616-12; S/N: 98773 (with readout Fluke 1523; S/N: 3491454)</td>
                        <td style="text-align: center;"><b>E</b></td>
                        <td>Stirred Liquid Bath; Isotech; 798 m; S/N: 33826/2</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;"><b>F</b></td>
                        <td>P.R.T.; Fluke; 5616-12; S/N: 98769 (with readout Fluke 1523; S/N: 3491456)</td>
                        <td style="text-align: center;"><b>F</b></td>
                        <td>Isothermal Calibration Bath; Fluke; 7342A; S/N: B8C004</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;"><b>G</b></td>
                        <td>P.R.T.; Fluke; 5616-12; S/N: 98770 (with readout Fluke 1523; S/N: 3491452)</td>
                        <td style="text-align: center;"><b>G</b></td>
                        <td>Micro-bath; Fluke; 7103; S/N: B51880</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;"><b>H</b></td>
                        <td>Digital Thermometer "Stik" with probe; Fluke 1551A; S/N: 4010016</td>
                        <td style="text-align: center;"><b>H</b></td>
                        <td>Portable Calibration Bath; Fluke; 7109A; S/N: 4387006</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td style="text-align: center;"><b>I</b></td>
                        <td>Portable Calibration Bath; Fluke; 6109A; S/N: 4334001</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>&nbsp; </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>&nbsp; </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>&nbsp; </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        <!-- Remarks -->
        <div>   
                    <table class="table2">
                        <thead>
                            <tr>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><label><input type="checkbox">Calibration was performed</label></td>
                            </tr>
                            <tr>
                                <td><label><input type="checkbox">No adjustment was done</label></td>
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
        <!-- Personnel  Calibrated info -->
        <div>
                    <table class="table" style="text-align: left; ">
                        <tr>
                            <td>Calibrated by:</td>
                            <td >Encoded by:</td>
                            <td>Checked by:</td>
                        </tr>
                    </table>
        </div>
    </div>

    <!-- Uncertainty Budget Table -->
    <div class="page">
    
        <?php
          
            $calculatedDataArray = json_decode(json_encode($calculatedData), true); // Convert to associative array

            // Define the headers and corresponding keys
            $columns = [
                'Test Point' => 'testPoint',
                'Unc due to UUC Resolution' => 'uncUUCResolution',
                'Unc due to repeatability of STD' => 'UncRepeatabilityStandard',
                'Unc due to repeatability of UUC' => 'UncRepeatabilityUUC',
                'Uncertainty due to Standard PRT' => 'uncStandardPRT',
                'Uncertainty due to Drift' => 'UncDrift',
                'Bath Instability' => 'bathInstability',
                'Axial Homogenity' => 'axialHomogenity',
                'Radial Homogenity' => 'radialHomogenity',
                'Hysteresis' => 'hysteresis',
                'Combined Uncertainty' => 'combinedUncertainty',
                'vEff' => 'veffect',
                'k' => 'k',
                'Expanded Uncertainty' => 'expandedUncertainty'
            ];

            $columnsPerTable = 7; // Max columns per table

            foreach ($calculatedDataArray as $tableIndex => $tableData) {
                foreach ($tableData as $tableKey => $rows) {
                    // Split columns into chunks of 7
                    $columnChunks = array_chunk(array_keys($columns), $columnsPerTable);

                    foreach ($columnChunks as $chunkIndex => $columnChunk) {
                        echo '<table class="table" style="text-align: left; font-size: .6em;">';
                        echo '<thead>';
                        echo '<tr><th class="textCenter" colspan="' . count($columnChunk) . '">Uncertainty Budget Table </th></tr>';
                        echo '<tr>';

                        // Print headers
                        foreach ($columnChunk as $columnName) {
                            echo '<td class="textCenter">' . $columnName . '</td>';
                        }

                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';

                        // Print data rows
                        foreach ($rows as $rowData) {
                            echo '<tr>';
                            foreach ($columnChunk as $columnName) {
                                $key = $columns[$columnName];
                                echo '<td class="textCenter">' . ($rowData[$key] ?? '') . '</td>';
                            }
                            echo '</tr>';
                        }

                        echo '</tbody>';
                        echo '</table>';
                    }
                }
            }
        ?>
    </div>
</body>
</html> 
