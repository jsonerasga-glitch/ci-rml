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
    function dynamic_diagram($image_diagram) {
        // Default image path and type
        $path = 'image/enclosureIncubator.png';
        
        // Check if the file exists
        if (file_exists($path)) {
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        } else {
            // If the default image is not found, use a placeholder or return an error
            $base64 = ''; // Or use a placeholder image
        }
    
        // Set image source from the function parameter if provided
        $image_src = $base64;
        if (!empty($image_diagram['image'])) {
            $image_src = $image_diagram['image'];
        }
        
        // Return the HTML for the image
        return "<img src='". htmlspecialchars($image_src, ENT_QUOTES, 'UTF-8') ."' height='120px'>";
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
        }
        @page {
            margin-top: 90px;    
            margin-bottom: 25px; 
            margin-left: 25px;  
            margin-right: 25px;   
            border: 0px red solid; 
                }

        header {
            position: fixed;
            top: -80px;
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
            margin-top: 3px; 
            margin-bottom: 3px;
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black;
        }
        .table th,  {
            border: 1px solid black;
        }
        .table td {
            border: 1px solid black;
           
        }
        .table1 {
            font-size: .6em;
            margin-top: 1px; 
            margin-bottom: 1px;
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black; 
        }
        .table1 th,  {
            border: 1px solid black; 
            text-align: center; 
        }
        .table1 td {
            border: 1px solid black;
            text-align: center;
        }
        .table2 {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black;    
        }
        .table2 th{
            text-align: center; 
        }
        .table2 td {
            text-align: left; 
        }
        .table3 {
            font-size: .7em;
            border-collapse: collapse;
            width: 100%; 
        }
        .table3 th{
            text-align: center; 
        }
        .table3 td {
            text-align: center; 
        }
        .fixed-underline1 {
            display: inline-block;
            width: 30px; 
            border-bottom: 1px solid black;
        }
        .fixed-underline2 {
            display: inline-block;
            width: 500px; 
            border-bottom: 1px solid black;
        }
        input[type="checkbox"] {
            width: 16px;
            height: 16px;
        }
        table.no-border {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black; 
            margin-top:1px;
            margin-bottom:1px;
        }
        table.no-border td,
        table.no-border th {
            border: none;
        }
        .table4 {
            font-size: .6em;
            margin-top: 3px; 
            margin-bottom: 3px;
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black;
        }
        .table4 th,  {
            border: 1px solid black;
        }
        .table4 td {
            border: 1px solid black;    
        }

        .table5 {
            font-size: .67em;
            margin-bottom: 10px; 
            margin-bottom: 10px; 
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black;
        }
        .table5 th,  {
            border: 1px solid black;
        }
        .table5 td {
            border: 1px solid black;  
        }
    </style>
</head>
<body>

        <?php
            $equipmentInfoArray = json_decode(json_encode($equipmentInfo), true);
            $selectedType = null;

            /** Check if '4' or '5' is present in 'equipmentDescription' */
            if (isset($equipmentInfoArray['equipmentType']) &&
                (strpos($equipmentInfoArray['equipmentType'], '4') !== false ||
                strpos($equipmentInfoArray['equipmentType'], '5') !== false)) {
                $selectedType = '4 or 5'; // Set a generic value since the exact type isn't needed
            }

            /**  Display the appropriate title based on the selected type */
            if ($selectedType !== null) {
                ?> 
                <!-- autoclave and liquid bath -->
                 <div>
                    <header>
                        <div style="text-align: center; border: 0px solid blue; line-height: 1;">
                        Republic of the Philippines<br>
                        <h5 style="margin: 0; color: blue">DEPARTMENT OF SCIENCE AND TECHNOLOGY</h5>
                        CALABARZON<br>
                        <h5 style="margin: 0;">Regional Metrology Laboratory</h5>
                            <h4 style="margin: 0;">Calibration Worksheet for Autoclaves and Liquid Baths</h4>
                        </div>
                    </header>
                    <footer>
                            <div style="font-size: .5em;">
                                <table style="border-collapse: collapse; border: none; width: 100%; text-align: right; z-index: -1;">
                                    <tr><td>Page ____ of ____</td></tr>
                                    <!-- <tr><td>CP-000-F2 Rev. 0</td></tr>
                                    <tr><td>Effectivity Date: 01 December 2022</td></tr> -->
                                </table>
                            </div>
                    </footer>
                    <div class="page">
                        <!-- Customer info -->
                        <div>
                                <table class="table" style="text-align: left;">
                                    <tr>
                                        <td colspan="2">Certificate No.: <?= $equipmentInfo->certificateNumber?></td>
                                        <td colspan="2">Date Received: <?= $customerInfo->dateReceived?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Customer: <?= $customerInfo->customer?></td>
                                        <td colspan="2">Date Calibrated: <?= $equipmentInfo->dateCalibrated?></td>

                                    </tr>
                                    <tr>
                                        <td colspan="2">Place of Calibration: <?= $equipmentInfo->placeOfCalibration?></td>
                                        <td colspan="2">Recommended Due Date: <?= $customerInfo->recommendedDueDate?></td>
                                    </tr>
                                </table>
                        </div>
                        <!-- Equipment info -->
                        <div >
                                <table class="table" style=" text-align: left;">
                                    <thead>
                                        <tr>
                                            <th colspan="6">Equipment Description</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input type="checkbox">Water Bath
                                                </label></td>
                                            <td>
                                                <label>
                                                    <input type="checkbox">Oil Bath
                                                </label></td>
                                            <td>
                                                <label>
                                                    <input type="checkbox">Autoclave
                                                </label>
                                            </td>
                                            <td colspan="3"></td>
                                        </tr>  
                                        <tr> 
                                            <td colspan="3">
                                                <label>
                                                    <input type="checkbox">Others:
                                                </label>
                                            </td>
                                            <td colspan="3" style="text-align:center">Temperature Controller</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="3">Manufacturer: <?= $equipmentInfo->manufacturer?></td>
                                            <td>
                                                <label>
                                                    <input type="checkbox">digital
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input type="checkbox">analog
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input type="checkbox">default
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Model No.: <?= $equipmentInfo->modelNumber?></td>
                                            <td colspan="3"><center>Temperature readout /Indicator</center></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Serial No.: <?= $equipmentInfo->serialNumber?></td>
                                            <td>
                                                <label>
                                                    <input type="checkbox">without readout  
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input type="checkbox">analog/mechanical
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input type="checkbox">digital
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Equipment ID: <?= $equipmentInfo->equipmentId?></td>
                                            <td colspan="2">Resolution/Graduation : <?= $dataInputs->resolution1?></td>
                                            <td>Readability : <?= $dataInputs->readability1?></td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                        <!-- Equipment info -->
                        <div>
                            <table class="table" style="text-align: left;">
                                    <tr>
                                        <th colspan="2">Preliminary Inspection</th>
                                        <th>Environment Condition</th>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <label>
                                                <input type="checkbox">Visual Inspection (clean the equipment with soft cloth to remove dust and small
                                                particles)
                                            </label>
                                        </td>
                                        <td>Start Temp (°C): <?= $environmentInfo->tempStart?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <label>
                                                <input type="checkbox">
                                                Check the protective window of the equipment for cracks/scratches, color change, and broken window</label>
                                        </td>
                                        <td>Start RH (% RH): <?= $environmentInfo->rhStart?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <label>
                                                <input type="checkbox">
                                                Check the surface and edges of the equipment for any damages. (note in remarks) 
                                            </label>
                                        </td>
                                        <td>End Temp (°C): <?= $environmentInfo->tempEnd?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <label>
                                                <input type="checkbox"> Record all necessary and vital information 
                                            </label>
                                        </td>
                                        <td>End RH: <?= $environmentInfo->rhEnd?></td>
                                    </tr>
                            </table>
                        </div>
                        <!-- Measurement Data Table -->
                        <table class="table" style="font-size: .6em; text-align: center;">
                            <?php
                            $tableName = 'TABLE';
                            $rowName = 'ROW';   
                            $numberOfItems = 1;
                            // Count rows dynamically based on available data
                            while (isset($dataInputs->{'usedStandard' .  ($numberOfItems + 1)})) {
                                $numberOfItems++;
                            }

                            for ($i = 1; $i <= $numberOfItems; $i++) { 
                                $countOfRow = 1;
                                // Count rows dynamically based on available data
                                while (isset($dataInputs->{'position' . $tableName . $i . $rowName . ($countOfRow + 1)})) {
                                    $countOfRow++;
                                }


                            ?>
                            <tbody>
                            <tr>
                                <td class='textCenter' colspan='2' rowspan='2'><?= 'Temperature <br> requirement' ?> <br>_____</td>
                                <td class='textCenter' colspan='2' rowspan='2'><?= 'Test point' ?> <br>_____</td>
                                <td class='textCenter' colspan='2' rowspan='2'><?= 'Temperature <br> setting ' ?> <br>_____</td>
                                <td class='textCenter' colspan='2' rowspan='2'><?= 'Standard <br> used' ?></td>
                                <td class='textCenter' colspan='2' rowspan='2'><?= 'Trial' ?></td>
                                <td class='textCenter' colspan='2' rowspan='2'><?= 'UUC reading, _____' ?></td>
                                <td class='textCenter' colspan='6'><?= 'Standard reading, _____' ?></td> 
                            </tr>
                            <tr>
                                <td class='textCenter' colspan='2'>Trial 1</td>
                                <td class='textCenter' colspan='2'>Trial 2</td>
                                <td class='textCenter' colspan='2'>Trial 3</td>
                            </tr>
                            <?php 
                                for ($x = 1; $x <= $countOfRow; $x++) { 
                                    $tempSettingKey = 'tempSetting' . $i;
                                    $positionKey = 'position' . $tableName . $i . $rowName . $x;
                                    $uucIndicationKey = 'uucIndication' . $tableName . $i . $rowName . $x;

                                    // Check if data is available for the current row
                                    $tempSettingValue = isset($dataInputs->$tempSettingKey) ? $dataInputs->$tempSettingKey : '';
                                    $positionValue = isset($dataInputs->$positionKey) ? $dataInputs->$positionKey : '';
                                    $uucIndicationValue = isset($dataInputs->$uucIndicationKey) ? $dataInputs->$uucIndicationKey : '';
                            ?>
                            <tr>
                                <?php if ($x == 1): ?>
                                    <td class="textCenter" colspan='2'><?= $tempSettingValue ?></td>
                                <?php else: ?>
                                    <td class="textCenter" colspan='2'></td>
                                <?php endif; ?>
                                <?php if ($x == 1): ?>
                                    <td class="textCenter" colspan='2'><?= $tempSettingValue ?></td>
                                <?php else: ?>
                                    <td class="textCenter" colspan='2'></td>
                                <?php endif; ?>
                                <?php if ($x == 1): ?>
                                    <td class="textCenter" colspan='2'><?= $tempSettingValue ?></td>
                                <?php else: ?>
                                    <td class="textCenter" colspan='2'></td>
                                <?php endif; ?>
                                <td class="textCenter" colspan='2'></td>
                                <td class="textCenter" colspan='2'><?= $positionValue ?></td>
                                <td class="textCenter" colspan='2'><?= $uucIndicationValue ?></td>
                                <td class="textCenter" colspan='2'></td>
                                <td class="textCenter" colspan='2'></td>
                                <td class="textCenter" colspan='2'></td>
                            </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                            <?php 
                            }
                            ?>
                        </table>
                        <!-- Calibration standard info -->   
                        <div>
                            <table class ="table" style="text-align: left; font-size: .6em;">
                                <tr>
                                    <td colspan ="2"><center><b>Calibration standard</b></center></td>
                                    <td><center><b>Measurement location</b></center></td>
                                </tr>
                                <tr>
                                    <td width="2%">A</td>
                                    <td>Wireless Data Logger; Ellab; TrackSense® Pro Compact S/N: 256882</td>
                                    <td rowspan="22"></td>
                                </tr>
                                <tr>
                                    <td width="2%">B</td>
                                    <td>Wireless Data Logger; Ellab; TrackSense® Pro Compact S/N: 256888</td>
                                </tr>
                                <tr>
                                    <td width="2%">C</td>
                                    <td>Wireless Data Logger; Ellab; TrackSense® Pro Compact S/N: 256899</td>
                                </tr>
                                <tr>
                                    <td width="2%">D</td>
                                    <td>Wireless Data Logger; Ellab; TrackSense® Pro Compact S/N: 398825</td>
                                </tr>
                                <tr>
                                    <td width="2%">E</td>
                                    <td>Wireless Data Logger; Ellab; TrackSense® Pro Compact S/N: 398828</td>
                                </tr>
                                <tr>
                                    <td width="2%">F</td>
                                    <td>Wireless Data Logger; Ellab; TrackSense® Pro Compact S/N: 398841</td>
                                </tr>
                                <tr>
                                    <td width="2%">G</td>
                                    <td>Wireless Data Logger; Ellab; TrackSense® Pro Compact S/N: 398850</td>
                                </tr>
                                <tr>
                                    <td width="2%">H</td>
                                    <td>Wireless Data Logger; Ellab; TrackSense® Pro Compact S/N: 398855</td>
                                </tr>
                                <tr>
                                    <td width="2%">I</td>
                                    <td>Wireless Data Logger; Ellab; TrackSense® Pro Compact S/N: 398857</td>
                                </tr>
                                <tr>
                                    <td width="2%">J</td>
                                    <td>Wireless Data Logger; Ellab; TrackSense® Pro Compact S/N: 398961</td>
                                </tr>
                                <tr>
                                    <td width="2%">K</td>
                                    <td>Wireless Data Logger; Ellab; TrackSense® Pro Compact S/N: 398964</td>
                                </tr>
                                <tr>
                                    <td width="2%">L</td>
                                    <td>Wireless Data Logger; Ellab; TrackSense® Pro Compact S/N: 398981</td>
                                </tr>
                                <tr>
                                    <td width="2%">M</td>
                                    <td>Wireless Data Logger; Ellab; TrackSense® Pro Compact S/N: 424923</td>
                                </tr>
                                <tr>
                                    <td width="2%">N</td>
                                    <td>Wireless Data Logger; Ellab; TrackSense® Pro Compact S/N: 424933</td>
                                </tr>
                                <tr>
                                    <td width="2%">O</td>
                                    <td>Wireless Data Logger; Ellab; TrackSense® Pro Compact S/N: 424975</td>
                                </tr>
                                <tr>
                                    <td width="2%">P</td>
                                    <td>Wireless Data Logger; Ellab; TrackSense® Micro PRS/TMP 2G S/N: 398013</td>
                                </tr>
                                <tr>
                                    <td width="2%">Q</td>
                                    <td>Wireless Data Logger; Ellab; TrackSense® Pro Pressure Combi S/N: 461294</td>
                                </tr>
                                <tr>
                                    <td width="2%">R</td>
                                    <td>Wireless Data Logger; Ellab; TrackSense® Pro Pressure Combi S/N: 461381</td>
                                </tr>
                                <tr>
                                    <td width="2%">S</td>
                                    <td>Wireless Data Logger; Ellab; TrackSense® Pro Single Temperature S/N: 460673</td>
                                </tr>
                                <tr>
                                    <td width="2%">T</td>
                                    <td>Wireless Data Logger; Ellab; TrackSense® Pro Single Temperature S/N: 460737</td>
                                </tr>
                                <tr>
                                    <td width="2%">U</td>
                                    <td>Temperature Data Logger; Yokogawa; FX 112-1-2; S/N: S5D607665 with Thermocouple</td>
                                </tr>
                                <tr>
                                    <td width="2%">V</td>
                                    <td>Temperature Data Logger; Yokogawa; FX1012; S/N: S5UC09154 with Thermocouple</td>
                                </tr>
                                <tr>
                                    <td width="2%">W</td>
                                    <td> Temperature Data Logger; Yokogawa; FX1012; S/N: S5UC09155 with Thermocouple</td>
                                    <td rowspan="2" style="text-align: center;">Graphical Representation of the measurement locations of the UUC</td>
                                </tr>
                                <tr>
                                    <td width="2%">X</td>
                                    <td>Temperature Data Logger; Graphtec; GL820; S/N: H31173261 with Thermocouple</td>
                                </tr>
                            </table>
                        </div>    
                        <!-- Remarks info -->      
                        <div>
                            <table class="table no-border"  style=" font-size: .6em; text-align: left; ">
                                <tr>
                                    <th colspan="2">Remarks</th>
                                </tr>
                                <tr>
                                    <td ><label><input type="checkbox">Loaded</label>
                                    </td>
                                    <td ><label><input type="checkbox">Unloaded</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label><input type="checkbox">Standard/s, accessory/ies, and UUC are in good condition before and after calibration</label></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><label><input type="checkbox">Calibration was performed </label>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>
                                            <input type="checkbox">No adjustment was done 
                                        </label>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><label><input type="checkbox">Others: </label></td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                        <!-- Calibrated info -->     
                        <div>
                            <table class="table" style="text-align: left; font-size: .7em;">
                                <tr>
                                    <td>Calibrated by:</td>
                                    <td>Encoded by:</td>
                                    <td>Checked by:</td>
                                </tr>
                            </table>
                        </div> 

                    </div>
                    <!-- uncertainty budget table -->
                    <div class="page">
                    <?php

                        $calculatedDataArray = json_decode(json_encode($calculatedData), true);

                        // Define the column headers and their corresponding data keys
                        $columns = [
                            [
                                'header' => 'Uncertainty Due To UUC Resolution',
                                'key' => 'uncertaintyDueToUUCResolution'
                            ],
                            [
                                'header' => 'Uncertainty Due To UUC Repeatability',
                                'key' => 'uncertaintyDueToUUCRepeatability'
                            ],
                            [
                                'header' => 'Uncertainty Due To STD Resolution',
                                'key' => 'uncertaintyDueToSTDResolution'
                            ],
                            [
                                'header' => 'Uncertainty Reference Standard Used',
                                'key' => 'uncertaintyReferenceStandardUsed'
                            ],
                            [
                                'header' => 'Uncertainty Drift Standard Used',
                                'key' => 'uncertaintyDriftStandardUsed'
                            ],
                            [
                                'header' => 'Uncertainty Temperature Instability',
                                'key' => 'uncertaintyTemperatureInstability'
                            ],
                            [
                                'header' => 'Uncertainty Spatial Inhomogenity',
                                'key' => 'uncertaintySpatialInhomogenity'
                            ],
                            [
                                'header' => 'Uncertainty Radiation Effect',
                                'key' => 'uncertaintyRadiationEffect'
                            ],
                            [
                                'header' => 'Uncertainty Loading Effect',
                                'key' => 'uncertaintyLoadingEffect'
                            ],
                            [
                                'header' => 'Combined Uncertainty',
                                'key' => 'combinedUncertainty'
                            ],
                            [
                                'header' => 'Effective Degree Of Freedom',
                                'key' => 'effectiveDegreeOfFreedom'
                            ],
                            [
                                'header' => 'Calculate K',
                                'key' => 'calculateKFunction'
                            ],
                            [
                                'header' => 'Expanded Uncertainty',
                                'key' => 'expandedUncertainty'
                            ]
                        ];

                        // Split the columns into two groups for the two tables
                        $columns1 = array_slice($columns, 0, 7);
                        $columns2 = array_slice($columns, 7);

                        // Function to render a table with given columns
                        function renderTable($columns, $data)
                        {
                            echo '<table class="table" style="text-align: left; font-size: .6em;">';
                            echo '<thead>';
                            echo '<tr><th class="textCenter" colspan="' . count($columns) . '">Uncertainty Budget Table</th></tr>';
                            echo '<tr>';
                            foreach ($columns as $column) {
                                echo '<th class="textCenter">' . $column['header'] . '</th>';
                            }
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';

                            // Loop through each row of data
                            foreach ($data as $tableData) {
                                echo '<tr>';
                                foreach ($columns as $column) {
                                    echo '<td class="textCenter">' . ($tableData['uncertainty'][$column['key']] ?? '') . '</td>';
                                }
                                echo '</tr>';
                            }

                            echo '</tbody>';
                            echo '</table>';
                        }

                        // Render the first table with the first set of columns
                        renderTable($columns1, $calculatedDataArray);

                        // Render the second table with the second set of columns
                        renderTable($columns2, $calculatedDataArray);

                    ?>
                    </div>
                    
                 </div>
                <?php

            } else {
                ?> 
                <header>
                        <div style="text-align: center; border: 0px solid blue; line-height: 1;">
                        Republic of the Philippines<br>
                        <h5 style="margin: 0; color: blue">DEPARTMENT OF SCIENCE AND TECHNOLOGY</h5>
                        CALABARZON<br>
                        <h5 style="margin: 0;">Regional Metrology Laboratory</h5>
                            <h4 style="margin: 0;">CP-009 Calibration Worksheet for Temperature-Controlled Enclosure</h4>
                        </div>
                </header>
                <footer>
                            <div style="font-size: .5em;">
                                <table style="border-collapse: collapse; border: none; width: 100%; text-align: right; z-index: -1;">
                                    <tr><td>Page ____ of ____</td></tr>
                                    <tr><td>CP-009-F2 Rev. 0</td></tr>
                                    <tr><td>Effectivity Date: 01 December 2022</td></tr>
                                </table>
                            </div>
                </footer>
                <!-- oven -->
            
                
                    <!-- first page -->
                    <div class="page">
                        <!-- Customer info -->
                        <div>
                                <table class="table" style="text-align: left;">
                                    <tr>
                                        <td style="width:50%;">Certificate No.: <?= $equipmentInfo->certificateNumber?></td>
                                        <td style="width:30%;">Date Received: <?= $customerInfo->dateReceived?></td>
                                        <td style="width:20%;">Calibrated by:</td>
                                    </tr>
                                    <tr>
                                        <td >Customer: <?= $customerInfo->customer?></td>
                                        <td >Date Calibrated: <?= $equipmentInfo->dateCalibrated?></td>
                                        <td >Encoded by:</td>

                                    </tr>
                                    <tr>
                                        <td >Place of Calibration: <?= $equipmentInfo->placeOfCalibration?></td>
                                        <td >Recommended Due Date: <?= $customerInfo->recommendedDueDate?></td>
                                        <td >Checked by:</td>
                                    </tr>
                                </table>
                        </div>
                        <!-- Equipment info -->
                        <div>
                                <table class="table" style="text-align: left;">
                                    <tr>
                                        <td colspan="2">Equipment Description: <?= $equipmentInfo->certificateNumber?></td>
                                        <td colspan="2">Start Temp (°C): <?= $environmentInfo->tempStart?></td>
                                        <td colspan="2">End Temp (°C): <?= $environmentInfo->tempEnd?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Manufacturer: <?= $equipmentInfo->manufacturer?></td>
                                        <td colspan="2">Start RH (%RH): <?= $environmentInfo->rhStart?></td>
                                        <td colspan="2">End RH (%RH): <?= $environmentInfo->rhEnd?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">Model No.: <?= $equipmentInfo->placeOfCalibration?></td>
                                        <td colspan="3" rowspan="9"> 
                                            
                                                <?php  
                                               
                                                    $img_diagram = ['image' => '']; 
                                                    echo dynamic_diagram($img_diagram);
                                                ?>                    
                                           
                                        </td>                                    
                                    </tr>
                                    <tr>
                                        <td colspan="3">Serial No.: <?= $equipmentInfo->serialNumber?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">Equipment ID: <?= $equipmentInfo->equipmentId?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">Temperature Range:</td>
                                    </tr>
                                    <tr>
                                        <th colspan="3" >Preliminary Inspection</th>
                                    </tr>
                                    <tr>                                    
                                        <td colspan="3"><label><input type="checkbox">Visual Inspection (clean the equipment with soft cloth to remove dust and small particles)</label></td>                               
                                    </tr>
                                    <tr>
                                        <td colspan="3"><label><input type="checkbox">Check the surface and edges of the equipment for any damages. (note in remarks)</label></td>                   
                                    </tr>
                                    <tr>                                    
                                        <td colspan="3"><label><input type="checkbox">Check the chamber indicator/controller for possible defects</label></td>                               
                                    </tr>                         
                                    <tr>
                                        <td colspan="3"><label><input type="checkbox">Record all necessary and vital information</label></td>
                                    </tr>
                                </table>
                        </div>
                        <!-- standard info -->
                        <div>
                                <table class="table4" style="text-align: left; width 100%">
                                    <tr>
                                        <th style="50%">Standard/Used</th>
                                        <th style="50%">Remarks</th>
                                    </tr>
                                    <tr>
                                        <td ><label><input type="checkbox">T.D.L.; Yokogawa; FX 112-1-2; S/N: S5D607665 with T/C</label></td>
                                        <td ><label><input type="checkbox">Loaded state</label></td>
                                    </tr>
                                    <tr>
                                        <td ><label><input type="checkbox">T.D.L.; Yokogawa; FX1012; S/N: S5UC09154 with T/C</label></td>
                                        <td ><label><input type="checkbox">Unloaded state</label></td>
                                    </tr>
                                    <tr>
                                        <td ><label><input type="checkbox">T.D.L.; Yokogawa; FX1012; S/N: S5UC09155 with T/C</label></td>
                                        <td ><label><input type="checkbox">Standard and UUC are  in good condition before and after calibration</label></td>
                                    </tr>
                                    <tr>
                                        <td ><label><input type="checkbox">T.D.L.; Graphtec; GL820; S/N: H31173261with T/C</label></td>
                                        <td ><label><input type="checkbox">Others:</label></td>
                                    </tr>
                                    <tr>
                                        <td ><label><input type="checkbox">Wireless Data Logger; Ellab; TSP; S/N: 256888; 256882; 256899; 398828; 398855; 398857; 398964; 398841; 398850; 398981;  398961; 398825; 398013</label></td>
                                        <td ><label></td>
                                    </tr>
                                </table>
                        </div>
                        <!-- Neasurement Data Table -->
                        <table class="table1" >
                            <tr>
                                <th class="td textCenter" colspan='4'>Measurement Data</th>
                            </tr>
                        </table>
                        <?php

                            $numberOfItems = 2; // Set default to 2 to always display 2 tables
                            /**  Check for the existence of usedStandard3 and beyond*/
                            // while (isset($dataInputs->{'usedStandard' . ($numberOfItems + 1)})) {
                            //     $numberOfItems++;
                            // }
                            $dataInputsArray = json_decode(json_encode($dataInputs), true);
                            for ($i = 1; $i <= $numberOfItems; $i++) {
                                $numTrialsKey = 'position' . $i;
                                $tempSettingKey = 'tempSetting' . $i;
                                $resolutionKey = 'resolution' . $i;
                                $readabilityKey = 'readability' . $i;

                                $numTrials = isset($dataInputsArray[$numTrialsKey]) ? $dataInputsArray[$numTrialsKey] : 12;

                                $initialColumns = 1;
                                $totalColumns = 1;
                                echo '<table class="table4" >';
                                echo '<thead>';
                                echo '<tr>';
                                echo '<th class="textCenter"  colspan="14">&nbsp;</th>';
                                echo '</tr>';
                                echo '<tr>';
                                echo '<td class="textLeft"  colspan="7">Temperature Setting °C) : ' . (isset($dataInputsArray[$tempSettingKey]) ? $dataInputsArray[$tempSettingKey] : '') . ' </td>';

                                echo '<td class="textLeft"  colspan="7">Resolution / Graduation: ' . (isset($dataInputsArray[$resolutionKey]) ? $dataInputsArray[$resolutionKey] : '') . '</td>';
                                echo '</tr>';



                                echo '<tr>';
                                echo '<td class="textLeft"   colspan="7">Test Point (°C): ' . (isset($dataInputsArray[$tempSettingKey]) ? $dataInputsArray[$tempSettingKey] : '') . '</td>';
                                echo '<td class="textLeft"   colspan="7">Readability: ' . (isset($dataInputsArray[$readabilityKey]) ? $dataInputsArray[$readabilityKey] : '') . '</td>';
                                echo '</tr>';
                                echo '<tr>';
                                echo '<td class="textCenter"  rowspan="2">Time</td>';
                                echo '<td class="textCenter"   rowspan="2">UUC Indicator  Reading, ___</td>';
                            
                                echo '<td class="textCenter"  colspan="12">Standard Reading,  ____</td>';
                                echo '</tr>';
                                echo '<tr>';
                    
                                for ($j = 1; $j <= $numTrials; $j++) {
                                    echo '<td class="td textCenter">Position' .'<br>' . $j . '</td>';
                                }
                            
                                echo '</tr>';
                                echo '</thead>';
                                echo '<tbody>';

                                $numRows = 1;
                                while (isset($dataInputsArray['uucIndicationTABLE' . $i . 'ROW' . ($numRows + 1)])) {
                                    $numRows++;
                                }

                                // Ensure at least 11 rows
                                $minRows = 11;
                                $totalRows = max($numRows, $minRows);

                                for ($x = 1; $x <= $totalRows; $x++) {
                                    $uucIndicationKey = 'uucIndicationTABLE' . $i . 'ROW' . $x;
                        

                                    echo '<tr>';
                                    echo '<td class="textCenter" >&nbsp;</td>';
                                    echo '<td class="textCenter" >' . (isset($dataInputsArray[$uucIndicationKey]) ? $dataInputsArray[$uucIndicationKey] : '') . '</td>';
                                    for ($j = 1; $j <= $numTrials; $j++) {
                                        $trialKey = 'trial' . $j . 'TABLE' . $i . 'ROW' . $x;
                                        echo '<td class="textCenter" >' . (isset($dataInputsArray[$trialKey]) ? $dataInputsArray[$trialKey] : '') . '</td>';
                                    }
                                
                                    echo '</tr>';
                                }
                                echo '<tr>';
                                echo '<td class="textLeft"  colspan="14">Remarks:</td>';
                                echo '</tr>';
                                echo '</tbody>';
                                echo '</table>';
                            }
                        ?>
                    </div>
                    <!-- succeeding page -->
                    <?php
                        $numberOfItems = 2; /* Start with 2, we'll check for the existence of item 3 and beyond*/

                        /**  Check for the existence of usedStandard3 and beyond*/
                        while (isset($dataInputs->{'usedStandard' . ($numberOfItems + 1)})) {
                            $numberOfItems++;
                        }

                        $dataInputsArray = json_decode(json_encode($dataInputs), true);

                        if ($numberOfItems >= 3) {
                            // Display the div and table content only if there are at least 3 usedStandard items
                            $tableCount = 0;

                            // Start from table 3
                            for ($i = 3; $i <= $numberOfItems; $i++) {
                                if ($tableCount % 3 == 0) {
                                    if ($tableCount > 0) {
                                        // Close previous page div if it exists
                                        echo '</div>';
                                    }
                                    // Start a new page div
                                    echo '<div class="page">';
                                    echo '<div>';
                                    echo '<table class="table5" style="text-align: left;">';
                                    echo '<tr>';
                                    echo '<td colspan="2">Certificate No.: ' . $equipmentInfo->certificateNumber . '</td>';
                                    echo '<td colspan="2">Customer: ' . $customerInfo->customer . '</td>';
                                    echo '</tr>';
                                    echo '</table>';
                                    echo '</div>';
                                    echo '<table class="table3">';
                                    echo '<tr>';
                                    echo '<th class="td textCenter" colspan="4">Measurement Data</th>';
                                    echo '</tr>';
                                    echo '</table>';
                                }

                                $numTrialsKey = 'position' . $i;
                                $tempSettingKey = 'tempSetting' . $i;
                                $resolutionKey = 'resolution' . $i;
                                $readabilityKey = 'readability' . $i;

                                $numTrials = isset($dataInputsArray[$numTrialsKey]) ? $dataInputsArray[$numTrialsKey] : 12;

                                echo '<table class="table5">';
                                echo '<thead>';
                                echo '<tr>';
                                echo '<th class="textCenter" colspan="14">&nbsp;</th>';
                                echo '</tr>';
                                echo '<tr>';
                                echo '<td class="textLeft" colspan="7">Temperature Setting (°C): ' . (isset($dataInputsArray[$tempSettingKey]) ? $dataInputsArray[$tempSettingKey] : '') . '</td>';
                                echo '<td class="textLeft" colspan="7">Resolution / Graduation: ' . (isset($dataInputsArray[$resolutionKey]) ? $dataInputsArray[$resolutionKey] : '') . '</td>';
                                echo '</tr>';
                                echo '<tr>';
                                echo '<td class="textLeft" colspan="7">Test Point (°C): ' . (isset($dataInputsArray[$tempSettingKey]) ? $dataInputsArray[$tempSettingKey] : '') . '</td>';
                                echo '<td class="textLeft" colspan="7">Readability: ' . (isset($dataInputsArray[$readabilityKey]) ? $dataInputsArray[$readabilityKey] : '') . '</td>';
                                echo '</tr>';
                                echo '<tr>';
                                echo '<td class="textCenter" rowspan="2">Time</td>';
                                echo '<td class="textCenter" rowspan="2">UUC Indicator Reading, ___</td>';
                                echo '<td class="textCenter" colspan="12">Standard Reading, ____</td>';
                                echo '</tr>';
                                echo '<tr>';

                                for ($j = 1; $j <= $numTrials; $j++) {
                                    echo '<td class="td textCenter">Position<br>' . $j . '</td>';
                                }

                                echo '</tr>';
                                echo '</thead>';
                                echo '<tbody>';

                                $numRows = 1;
                                while (isset($dataInputsArray['uucIndicationTABLE' . $i . 'ROW' . ($numRows + 1)])) {
                                    $numRows++;
                                }

                                // Ensure at least 11 rows
                                $minRows = 11;
                                $totalRows = max($numRows, $minRows);

                                for ($x = 1; $x <= $totalRows; $x++) {
                                    $uucIndicationKey = 'uucIndicationTABLE' . $i . 'ROW' . $x;

                                    echo '<tr>';
                                    echo '<td class="textCenter">&nbsp;</td>';
                                    echo '<td class="textCenter">' . (isset($dataInputsArray[$uucIndicationKey]) ? $dataInputsArray[$uucIndicationKey] : '') . '</td>';
                                    for ($j = 1; $j <= $numTrials; $j++) {
                                        $trialKey = 'trial' . $j . 'TABLE' . $i . 'ROW' . $x;
                                        echo '<td class="textCenter">' . (isset($dataInputsArray[$trialKey]) ? $dataInputsArray[$trialKey] : '') . '</td>';
                                    }

                                    echo '</tr>';
                                }
                                echo '<tr>';
                                echo '<td class="textLeft" colspan="14">Remarks:</td>';
                                echo '</tr>';
                                echo '</tbody>';
                                echo '</table>';

                                $tableCount++;
                            }

                            // Close the last page div if it exists
                            if ($tableCount > 0) {
                                echo '</div>';
                            }
                        }
                    ?>    
                    <!-- uncertainty budget table -->
                    <div class="page">
                        <?php

                            $calculatedDataArray = json_decode(json_encode($calculatedData), true);

                            // Define the column headers and their corresponding data keys
                            $columns = [
                                [
                                    'header' => 'Uncertainty Due To UUC Resolution',
                                    'key' => 'uncertaintyDueToUUCResolution'
                                ],
                                [
                                    'header' => 'Uncertainty Due To UUC Repeatability',
                                    'key' => 'uncertaintyDueToUUCRepeatability'
                                ],
                                [
                                    'header' => 'Uncertainty Due To STD Resolution',
                                    'key' => 'uncertaintyDueToSTDResolution'
                                ],
                                [
                                    'header' => 'Uncertainty Reference Standard Used',
                                    'key' => 'uncertaintyReferenceStandardUsed'
                                ],
                                [
                                    'header' => 'Uncertainty Drift Standard Used',
                                    'key' => 'uncertaintyDriftStandardUsed'
                                ],
                                [
                                    'header' => 'Uncertainty Temperature Instability',
                                    'key' => 'uncertaintyTemperatureInstability'
                                ],
                                [
                                    'header' => 'Uncertainty Spatial Inhomogenity',
                                    'key' => 'uncertaintySpatialInhomogenity'
                                ],
                                [
                                    'header' => 'Uncertainty Radiation Effect',
                                    'key' => 'uncertaintyRadiationEffect'
                                ],
                                [
                                    'header' => 'Uncertainty Loading Effect',
                                    'key' => 'uncertaintyLoadingEffect'
                                ],
                                [
                                    'header' => 'Combined Uncertainty',
                                    'key' => 'combinedUncertainty'
                                ],
                                [
                                    'header' => 'Effective Degree Of Freedom',
                                    'key' => 'effectiveDegreeOfFreedom'
                                ],
                                [
                                    'header' => 'Calculate K',
                                    'key' => 'calculateKFunction'
                                ],
                                [
                                    'header' => 'Expanded Uncertainty',
                                    'key' => 'expandedUncertainty'
                                ]
                            ];

                            // Split the columns into two groups for the two tables
                            $columns1 = array_slice($columns, 0, 7);
                            $columns2 = array_slice($columns, 7);

                            // Function to render a table with given columns
                            function renderTable($columns, $data)
                            {
                                echo '<table class="table" ">';
                                echo '<thead>';
                                echo '<tr><th class="textCenter" colspan="' . count($columns) . '">Uncertainty Budget Table</th></tr>';
                                echo '<tr>';
                                foreach ($columns as $column) {
                                    echo '<th class="textCenter">' . $column['header'] . '</th>';
                                }
                                echo '</tr>';
                                echo '</thead>';
                                echo '<tbody>';

                                // Loop through each row of data
                                foreach ($data as $tableData) {
                                    echo '<tr>';
                                    foreach ($columns as $column) {
                                        echo '<td class="textCenter">' . ($tableData['uncertainty'][$column['key']] ?? '') . '</td>';
                                    }
                                    echo '</tr>';
                                }

                                echo '</tbody>';
                                echo '</table>';
                            }

                            // Render the first table with the first set of columns
                            renderTable($columns1, $calculatedDataArray);

                            // Render the second table with the second set of columns
                            renderTable($columns2, $calculatedDataArray);

                        ?>
                    </div>
                    <?php
            }
            ?>

</body>
</html>

