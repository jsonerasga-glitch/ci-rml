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
            margin-top: 3px; 
            margin-bottom: 3px;
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
        .table3 {
            font-size: .7em;
            margin-top: 1px; 
            margin-bottom: 1px;
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black; 
        }
        .table3 th,  {
            border: 1px solid black;
            padding: 1px;
        }
        .table3 td {
            border: 1px solid black; 
            padding: 1px;
            text-align: left;
            
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
            <h4 style="margin: 0;">CP-001: Calibration Worksheet for Pressure Gauge </h4>
        </div>
    </header>
    <footer>
        <div style="font-size: .5em;">
            <table style="border-collapse: collapse; border: none; width: 100%; text-align: right; z-index: -1;">
                <tr><td>Page ____ of ____</td></tr>
                <tr><td>CP-001-F1 Rev. 2</td></tr>
                <tr><td>Effectivity Date: 01 December 2022</td></tr>
            </table>
        </div>
    </footer>
    <!-- first page -->
    <div class="page">
        <!-- customer info -->
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
        <!-- equipment info      -->
        <div>
            <table class="table" style=" text-align: left;">
                <thead >
                    <tr>
                        <td rowspan="2" colspan="2">Equipment Description: <?= $equipmentInfo->equipmentDescription?><br>
                        
                        
                        </td>
                        <td colspan="2">Capacity:<?= $equipmentInfo->capacity?></td>
                    </tr>  
                    <tr>
                        <td colspan="2">Range:<?= $equipmentInfo->range?></td>
                    </tr>
                </thead>
                <tbody >
                    <tr>
                        <td colspan="2">Manufacturer: <?= $equipmentInfo->manufacturer?></td>
                        <td colspan="2">Resolution/Graduation:<i>UUC <?= $equipmentInfo->resolution?></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>Std <?= $equipmentInfo->resolutionSTD?></i></td>
                    </tr>
                    <tr>
                        <td colspan="2">Model No.: <?= $equipmentInfo->modelNumber?></td>
                        <td colspan="2">Readability: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>UUC <?= $equipmentInfo->readability?></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>Std <?= $equipmentInfo->readabilitySTD?></i></td>
                    </tr>
                        <?php
                            $medium;
                        
                                $key = 'medium';
                                if (isset($equipmentInfo->$key)) {
                                    $medium = $equipmentInfo->$key;
                                }
                        ?>

                    <tr style="">
                        <td colspan="2">Serial No.: <?= $equipmentInfo->serialNumber?></td>
                        <td colspan="2">Medium:
                            <br>
                            <!-- <label>
                                <input type="checkbox"> Air 
                            </label>
                            <label>
                                <input type="checkbox">Water 
                            </label>
                            <label>
                                <input type="checkbox">Oil
                            </label> -->

                                    <label>
                            <input type="checkbox" id="mediumAir" name="mediumAir" <?= strpos($medium, 'Air') !== false ? 'checked' : '' ?>>
                            Air
                            </label>
                            <label>
                            <input type="checkbox" id="mediumWater" name="mediumWater" <?= strpos($medium, 'Water') !== false ? 'checked' : '' ?>>
                            Water
                            </label>
                            <label>
                            <input type="checkbox" id="mediumOil" name="mediumOil" <?= strpos($medium, 'Oil') !== false ? 'checked' : '' ?>>
                            Oil
                            </label> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Equipment ID: <?= $equipmentInfo->equipmentId?></td>
                        <td>Start Temp (°C):<?= $environmentInfo->tempStart?></td>
                        <td>Start RH (% RH):<?= $environmentInfo->rhStart?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Accuracy (min/max, if not given):</td>
                        <td>End Temp (°C):<?= $environmentInfo->tempEnd?></td>
                        <td>End RH (% RH):<?= $environmentInfo->rhEnd?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- calibration info -->
        <div>
            <table class="table" style="font-size: .6em; text-align: center;">
                <tr>
                    <td rowspan="2">Calibration Sequence</td>
                    <td rowspan="2">Measurement uncertainty aimed at, in % of the measurement span</td>
                    <td rowspan="2">Number of measurement points with zero up/down</td>
                    <td rowspan="2">Number of preloadings</td>
                    <td rowspan="2">Load change + waiting time . .seconds</td>
                    <td rowspan="2">Waiting time at upper limit of measurement range minutes</td>
                    <td colspan="2">Number of measurement series</td>
                </tr>
                <tr>
                    <td>up</td>
                    <td>down</td>
                </tr>
                <tr>
                    <td>B</td>
                    <td>0,1 ... 0,6</td>
                    <td>9</td>
                    <td>2</td>
                    <td>>30</td>
                    <td>2</td>
                    <td>2</td>
                    <td>1</td>
                </tr>
            </table>
        </div>
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
                                Visual Inspection (clean the equipment w/ soft cloth to remove dust and small particles)
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td style="">
                            <label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox">
                                Pointer
                            </label>
                            <label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox">
                                Threads
                            </label>
                            <label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox">
                                Sealing Surface
                            </label>
                            <label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox">
                                Pressure Channel
                            </label>
                            <label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox">
                                Window
                            </label>
                            <label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox">
                                Indication
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                <input type="checkbox">
                                Contamination and cleanliness (clean the equipment w/ soft cloth to remove dust and small particles)
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                <input type="checkbox">
                                Check if the stylus or pointer move smoothly when applied with increasing and decreasing pressure

                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox">
                                With initial reading of __________________
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                <input type="checkbox">
                                Apply increasing pressure (pre-loading) up to 80% of maximum capacity for at least 30 seconds.
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                          &nbsp;
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- measurement data  -->
        <div>
            <table class="table" style=" text-align: center;">
                <tr>
                    <th colspan="6">Measurement Data</th>
                </tr>
                <tr>
                    <td colspan="2">1st Measurement Series, psi</td>
                    <td colspan="2">2nd Measurement Series, psi</td>
                    <td colspan="2">3rd Measurement Series, psi</td>
                </tr>
                <tr>
                    <td>UUC Reading</td>
                    <td>Standard Reading</td>
                    <td>UUC Reading</td>
                    <td>Standard Reading</td>
                    <td>UUC Reading</td>
                    <td>Standard Reading</td>
                </tr>
                <?php
                    for ($i = 0; $i <= 8; $i++) {
                        echo "<tr>";
                        echo "<td>{$dataInputs->{'M1uucRow' . $i}}</td>";
                        echo "<td>{$dataInputs->{'M1stdRow' . $i}}</td>";
                        echo "<td>{$dataInputs->{'M2uucRow' . $i}}</td>";
                        echo "<td>{$dataInputs->{'M2stdRow' . $i}}</td>";
                        echo "<td>{$dataInputs->{'M3uucRow' . $i}}</td>";
                        echo "<td>{$dataInputs->{'M3stdRow' . $i}}</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
        <!-- standard info -->
        <div>
            <table class="table2">
                <thead >
                    <tr>
                        <th colspan="2">Standards and Accessories Used</th>
                    </tr>
                </thead>
                <tbody style="font-size: .7em;">
                    <tr>
                        <td><label><input type="checkbox">GE Druck DPI 104 / SN 3593048 / Range 0 to 20 bar</label></td>
                        <td><label><input type="checkbox">GE Druck PV 621 / SN 3300383 / Range -1 to 20 bar</label></td>
                    </tr>
                    <tr>
                        <td><label><input type="checkbox">GE Druck PM 620 / SN 2883658 / Range -1 to 20 bar </label></td>
                        <td><label><input type="checkbox"> GE Druck PV 622 / SN 3220689 / Range 0 to 20 bar</label></td>
                    </tr>
                    <tr>
                        <td><label><input type="checkbox">GE Druck PM 620 / SN 3905003 / Range 0 to 100 bar</label></td>
                        <td><label><input type="checkbox">GE Druck PV 623 / SN 3299011 / Range 0 to 100 bar</label></td>
                    </tr>
                    <tr>
                        <td><label><input type="checkbox"> GE Druck PM 620 / SN 3485385 / Range 0 to 1,000 bara</label></td>
                        <td><label><input type="checkbox"> Additel ADT918 / SN 11817090007/ Range -1 to 100 bar</label></td>
                    </tr>
                    <tr>
                        <td><label><input type="checkbox">Fluke 718-30G / SN 4323213 / Range -12 to 30 psi </label></td>
                        <td><label><input type="checkbox">GE Druck DPI 620 Gen ii / SN 5217868 </label></td>
                    </tr>
                    <tr>
                        <td><label><input type="checkbox">Fluke 700G04 / SN 4003026 / Range -14 to 15 psi</label></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><label><input type="checkbox">Fluke 700G31 / SN 4024042 / Range 0 to 10,000 psi</label></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><label><input type="checkbox"> Additel 680 / SN 218181B0037 / Range 0 to 3,000 psi</label></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- remarks -->
        <div>
            <table class="table2">
                <thead>
                    <tr>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody >
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
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- presonnel -->
        <div>
            <table class="table3" >
                <tr>
                    <td>&nbsp;&nbsp;Calibrated by</td>
                    <td>&nbsp;&nbsp;Encoded by</td>
                    <td>&nbsp;&nbsp;Checked by</td>
                </tr>
            </table>
        </div>

    </div>
    <!-- uncertainty budget table -->
    <div class="page">
        <?php
            $numberOfItems = 1; // Default to 1 table
            $calculatedDataArray = json_decode(json_encode($calculatedData), true);
            function handleUnit($unit) {
                // Directly encode the string to handle special characters
                return htmlspecialchars($unit, ENT_QUOTES, 'UTF-8');
            }
            for ($i = 1; $i <= $numberOfItems; $i++) {
                $tableKey = 'testPoints';
                 $unit = handleUnit($calculatedDataArray['unit']);
             
                // First Table
                echo '<table class="table"">';
                    echo '<thead>';
                        echo '<tr><th class="textCenter" colspan="7">Uncertainty Budget Table - Part 1</th></tr>';

                        echo '<tr>';
                        echo '<th class="textCenter" colspan="1" rowspan="2">Test Point</th>';
                        echo '<th class="textCenter" colspan="2">Ustd</th>';
                        echo '<th class="textCenter" colspan="2">Ures_std</th>';
                        echo '<th class="textCenter" colspan="2">Ures_uuc</th>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td class="textCenter" colspan="1" >' . $unit . '</td>';
                        echo '<td class="textCenter" colspan="1" >kPa</td>';
                        echo '<td class="textCenter" colspan="1" >' . $unit . '</td>';
                        echo '<td class="textCenter" colspan="1" >kPa</td>';
                        echo '<td class="textCenter" colspan="1" >' . $unit . '</td>';
                        echo '<td class="textCenter" colspan="1" >kPa</td>';

                        echo '</tr>';

                    echo '</thead>';
                    echo '<tbody>';

                        $testPoints = $calculatedDataArray['testPoints'];
                        $uStdMax1 = $calculatedDataArray['uStdMax'];
                        $uStdMax2 = $calculatedDataArray['uStdMax'];
                        $uResolutionSTD1 = $calculatedDataArray['uResolutionSTD'];
                        $uResolutionSTD2 = $calculatedDataArray['uResolutionSTD'];
                        $uResolutionUUC1 = $calculatedDataArray['uResolutionSTD'];
                        $uResolutionUUC2 = $calculatedDataArray['uResolutionSTD'];

                        $uZeroDeviation1 = $calculatedDataArray['uZeroDeviation'];
                        $uZeroDeviation1 = $calculatedDataArray['uZeroDeviation'];
                        $uHysterisis1 = $calculatedDataArray['uHysterisis'];
                        $uHysterisis2 = $calculatedDataArray['uHysterisis'];
                        $uRepeatability1 = $calculatedDataArray['uRepeatability'];
                        $uRepeatability2 = $calculatedDataArray['uRepeatability'];

                        $uCUucUnit = $calculatedDataArray['uCUucUnit'];
                        $uCStdUnit = $calculatedDataArray['uCStdUnit'];
                        $k = 2;
                        $uEUucUnit = $calculatedDataArray['uEUucUnit'];
                        $uEStdUnit = $calculatedDataArray['uEStdUnit'];

                        $totalRows = count($testPoints);

                        for ($x = 0; $x < $totalRows; $x++) {
                            echo '<tr>';
                            echo '<td class="textCenter">' . ($testPoints[$x] ?? 'N/A') . '</td>';
                            echo '<td class="textCenter">' . ($uStdMax1[$unit] ?? 'N/A') . '</td>';
                            echo '<td class="textCenter">' . ($uStdMax2['kPa'] ?? 'N/A') . '</td>';
                            echo '<td class="textCenter">' . ($uResolutionSTD1[$unit] ?? 'N/A') . '</td>';
                            echo '<td class="textCenter">' . ($uResolutionSTD2['kPa'] ?? 'N/A') . '</td>';
                            echo '<td class="textCenter">' . ($uResolutionUUC1[$unit] ?? 'N/A') . '</td>';
                            echo '<td class="textCenter">' . ($uResolutionUUC2['kPa']  ?? 'N/A') . '</td>';
                            echo '</tr>';
                        }

                    echo '</tbody>';
                echo '</table>';

                // Second Table
                echo '<table class="table">';
                    echo '<thead>';
                        echo '<tr><th class="textCenter" colspan="6">Uncertainty Budget Table - Part 2</th></tr>';

                        echo '<tr>';
                        echo '<th class="textCenter" colspan="2">Uz</th>';
                        echo '<th class="textCenter" colspan="2">Uhys</th>';
                        echo '<th class="textCenter" colspan="2">Urep(max)</th>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td class="textCenter">' . $unit . '</td>';
                        echo '<td class="textCenter">kPa</td>';
                        echo '<td class="textCenter">' . $unit . '</td>';
                        echo '<td class="textCenter">kPa</td>';
                        echo '<td class="textCenter">' . $unit . '</td>';
                        echo '<td class="textCenter">kPa</td>';
                        echo '</tr>';

                    echo '</thead>';
                    echo '<tbody>';

                    for ($x = 0; $x < $totalRows; $x++) {
                        echo '<tr>';
                        echo '<td class="textCenter">' . ($uZeroDeviation1[$unit] ?? 'N/A') . '</td>';
                        echo '<td class="textCenter">' . ($uZeroDeviation1[$unit] ?? 'N/A') . '</td>';
                        echo '<td class="textCenter">' . ($uHysterisis1[$x][$unit] ?? 'N/A') . '</td>';
                        echo '<td class="textCenter">' . ($uHysterisis2[$x][$unit] ?? 'N/A') . '</td>';
                        echo '<td class="textCenter">' . ($uRepeatability1[$unit] ?? 'N/A') . '</td>';
                        echo '<td class="textCenter">' . ($uRepeatability2[$unit] ?? 'N/A') . '</td>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                echo '</table>';

                // Third Table
                echo '<table class="table">';
                    echo '<thead>';
                        echo '<tr><th class="textCenter" colspan="5">Uncertainty Budget Table - Part 3</th></tr>';
                    
                        echo '<tr>';
                        echo '<th class="textCenter" colspan="2">Uc</th>';
                        echo '<th class="textCenter" rowspan="2">k</th>';
                        echo '<th class="textCenter" colspan="2">U</th  >';
                        echo '</tr>';
                    
                        echo '<tr>';
                        echo '<td class="textCenter">' . $unit . '</td>';
                        echo '<td class="textCenter">kPa</td>';
                        echo '<td class="textCenter" colspan="1" >' . $unit . '</td>';
                        echo '<td class="textCenter" colspan="1" >kPa</td>';
                        echo '</tr>';
                    
                    echo '</thead>';
                    echo '<tbody>';
                
                    for ($x = 0; $x < $totalRows; $x++) {
                        echo '<tr>';
                        echo '<td class="textCenter">' . ($uCUucUnit[$x] ?? 'N/A') . '</td>';
                        echo '<td class="textCenter">' . ($uCStdUnit[$x] ?? 'N/A') . '</td>';
                        echo '<td class="textCenter">' . ($k ?? 'N/A') . '</td>';
                        echo '<td class="textCenter">' . ($uEUucUnit[$x] ?? 'N/A') . '</td>';
                        echo '<td class="textCenter">' . ($uEStdUnit[$x] ?? 'N/A') . '</td>';
                        echo '</tr>';
                    }
                
                    echo '</tbody>';
                echo '</table>';


            }
        ?>
    </div>
</body>
</html>