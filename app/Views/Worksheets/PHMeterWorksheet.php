
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
            margin-top: 8px; 
            margin-bottom: 8px;
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
            <p style="margin: 0;">CP-014: Calibration Worksheet for pH Meter</p>
        </div>
    </header>
    <footer>
            <div style="font-size: .5em;">
                <table style="border-collapse: collapse; border: none; width: 100%; text-align: right; z-index: -1;">
                    <tr><td>Page ____ of ____</td></tr>
                    <tr><td>CP-014-F1 Rev. 0</td></tr>
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
                        <td class="td textLeft" colspan='2'>Place of Calibration: <?= $equipmentInfo->placeOfCalibration?></td>
                        <td class="td textLeft" colspan='2'>Recommended Due Date: <?= $customerInfo->recommendedDueDate?></td>
                    </tr>

                </table>
                <!-- Equipment and customer information table -->
                <?php
                        // Determine the number of items dynamically
                        $numberOfItems = count((array)$dataInputs);
                        // Assuming $dataInputs is an object that contains the selectFunction values
                        $selectFunctions = [];
                        for ($i = 1; $i <= $numberOfItems; $i++) {
                            $key = 'selectFunction' . $i;
                            if (isset($dataInputs->$key)) {
                                $selectFunctions[] = $dataInputs->$key;
                            }
                        }
                    ?>

                <?php
                        // Determine the number of items dynamically
                        $numberOfItems = count((array)$dataInputs);
                        // Assuming $dataInputs is an object that contains the selectFunction values
                        $stdPts = [];
                        for ($i = 1; $i <= $numberOfItems; $i++) {
                            $key = 'bufferSolutiontable' . $i;
                            if (isset($dataInputs->$key)) {
                                $stdPts[] = $dataInputs->$key;
                            }
                        }
                    ?>

                <table class="table" >
                    <tr>
                        <td class="td textLeft" colspan="4">
                            Equipment Description:
                            <input style="padding-left: 20px;" type="checkbox" id="phMeter1" name="phMeter1" <?= in_array('testForMeter', $selectFunctions) ? 'checked' : '' ?>>
                            <label for="phMeter1">pH meter (with separate electrode)</label>
                            
                            <input style="padding-left: 90px;" type="checkbox" id="phMeter2" name="phMeter2" <?= in_array('testForElectrode', $selectFunctions) ? 'checked' : '' ?>>
                            <label for="phMeter2">pH meter (with built-in electrode)</label>
                        </td>
                    </tr>

                    <tr>
                        <td class="td textLeft" colspan='4'>Meter:</td>
                    </tr>
                    <tr>
                        <td class="td textLeft "colspan='3' style="padding-left: 40px;" >Manufacturer: <?= $equipmentInfo->manufacturer?></td>
                        <td class="td textLeft" colspan='1'>Start Temp(°C): <?= $environmentInfo->tempStart?></td>
                    </tr>
                    <tr>
                        <td class="td textLeft" colspan='3' style="padding-left: 40px;" >Model No: <?= $equipmentInfo->modelNumber?></td>
                        <td class="td textLeft" colspan='1'>Start RH(%RH): <?= $environmentInfo->rhStart?></td>
                    </tr>
                    <tr>
                        <td class="td textLeft" colspan='3' style="padding-left: 40px;" >Serial No: <?= $equipmentInfo->serialNumber?></td>
                        <td class="td textLeft" colspan='1'>End Temp(°C): <?= $environmentInfo->tempEnd?></td>
                    </tr>
                    <tr>
                        <td class="td textLeft" colspan='3' style="padding-left: 40px;" >Equipment ID: <?= $equipmentInfo->equipmentId?></td>
                        <td class="td textLeft" colspan='1'>End RH(%RH): <?= $environmentInfo->rhEnd?></td>
                    </tr>
                    <tr>
                        <td class="td textLeft" colspan='3'>Electrode:</td>
                        <td class="td textLeft" colspan='1' rowspan='5' >Standardization Points 
                             <br>
                            <input style="padding-left: 20px;" type="checkbox" id="stdPtsSeven" name="stdPtsSeven" <?= in_array('7', $stdPts) ? 'checked' : '' ?>>
                            <label for="stdPtsSeven">7.00</label>    
                            
                            <input style="padding-left: 20px;" type="checkbox" id="stdPtsFour" name="stdPtsFour" <?= in_array('4', $stdPts) ? 'checked' : '' ?>>
                            <label for="stdPtsFour">4.00</label>

                            <input style="padding-left: 20px;" type="checkbox" id="stdPtsTen" name="stdPtsTen" <?= in_array('10', $stdPts) ? 'checked' : '' ?>>
                            <label for="stdPtsTen">10.00</label>

                            <br>
                            Others:
                            <br>

                            <input style="padding-left: 20px;" type="checkbox" id="othersOne" name="othersOne" >
                            <label for="othersOne">__________</label>    
                            
                            <input style="padding-left: 20px;" type="checkbox" id="othersTwo" name="othersTwo" >
                            <label for="othersTwo">__________</label>

                            <input style="padding-left: 20px;" type="checkbox" id="othersThree" name="othersThree" >
                            <label for="othersThree">__________</label>


                        </td>
                    </tr>   
                    <tr>
                        <td class="td textLeft " colspan='3' style="padding-left: 40px;">Manufacturer: <?= $equipmentInfo->electrodeMaker?></td>
                    
                    </tr>
                    <tr>
                        <td class="td textLeft " colspan='3' style="padding-left: 40px;">Model No: <?= $equipmentInfo->electrodeModel?></td>
                
                    </tr>
                    <tr>
                        <td class="td textLeft " colspan='3' style="padding-left: 40px;">Serial No: <?= $equipmentInfo->electrodeSN?></td>
       
                    </tr>
                    <tr>
                        <td class="td textLeft " colspan='3' style="padding-left: 40px;">Equipment ID: <?= $equipmentInfo->electrodeID?></td>
               
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
                                        Check buffer solution to be used is not out-dated and contaminated.

                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>
                                        <input type="checkbox">
                                        Hair cracks are not present in the membrane of the electrode.
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>
                                        <input type="checkbox">
                                        Inspect for the level of the electrolyte or filling solution of the electrode, this should be properly filled based on the manufacturer.
                                    </label>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <label>
                                        <input type="checkbox">
                                        Battery-operated pH meter should have enough power during the whole calibration process. Allow warm-up time.
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>
                                        <input type="checkbox">
                                        Allow warm-up time for electrically powered pH meter for at least 30 minutes or as specified by the manufacturer.
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
                 <!-- Meter Table    -->
                <?php
                    $selectedMeterTables = [];
                    foreach ($dataInputs as $key => $value) {
                        if (strpos($key, 'selectFunction') !== false && $value == 'testForMeter') {
                            $selectedMeterTables[] = str_replace('selectFunction', '', $key);
                        }
                    }

                    echo '<table class="table" ';
                    echo '<tr>';
                    echo '<th class="textCenter" colspan="8">Measurement Data</th>';
                    echo '</tr>';

                    echo '<thead>';
                    echo '<tr colspan="8">';
                    echo '<th class="td textLeft" colspan="2" >Meter Test</th>';
                    echo '<td class="td textLeft" colspan="2" >Range:</th>';
                    echo '<td class="td textLeft" colspan="3" >Res/Grad n: &nbsp;&nbsp;&nbsp; Temp:' .' ' .$equipmentInfo->resolutionOfPH .' '. '°C</td>';
                    echo '<td class="td textLeft" colspan="1" >' .$equipmentInfo->resolutionOfPH .' ' . 'pH</td>';
                    echo '</tr>';

                    echo '<tr colspan="8">';
                    echo '<td class="td textCenter" colspan="1" rowspan="2">Test Points, pH</td>';
           
                    $tempDegree = ' '; // Default value
                    for ($i = 1; $i <= $numberOfItems; $i++) {
                        $key = 'tempDegreeForMeterTesttable' . $i;
                        if (isset($dataInputs->$key) && !empty($dataInputs->$key)) {
                            $tempDegree = $dataInputs->$key;
                            break; // Exit the loop once the first valid value is found
                        }
                    }
                    echo '<td class="td textCenter" colspan="7" rowspan="1">UUC READING ( at ' . $tempDegree . ' °C Temp. Setting)</td>';
                    echo '</tr>';

                    echo '<tr>';
                    echo '<td class="td textCenter" colspan="1">As Found</td>';
                    echo '<td class="td textCenter" colspan="1">Trial 1</td>';
                    echo '<td class="td textCenter" colspan="1">Trial 2</td>';
                    echo '<td class="td textCenter" colspan="1">Trial 3</td>';
                    echo '<td class="td textCenter" colspan="1">Trial 4</td>';
                    echo '<td class="td textCenter" colspan="1">Trial 5</td>';
                    echo '<td class="td textCenter" colspan="1">Remarks</td>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    
                    if (empty($selectedMeterTables)) {
                        // Generate 5 empty rows if there are no testForMeter entries
                        for ($i = 0; $i < 5; $i++) {
                            echo '<tr>';

                            echo '<td class="textCenter">&nbsp; </td>'; // Empty cell for As Found
                            echo '<td class="textCenter">&nbsp; </td>'; // Empty cell for As Found
                            echo '<td class="textCenter">&nbsp; </td>'; // Empty cell for Trial 1
                            echo '<td class="textCenter">&nbsp;</td>'; // Empty cell for Trial 2
                            echo '<td class="textCenter"> &nbsp;</td>'; // Empty cell for Trial 3
                            echo '<td class="textCenter">&nbsp; </td>'; // Empty cell for Trial 4
                            echo '<td class="textCenter">&nbsp; </td>'; // Empty cell for Trial 5
                            echo '<td class="textCenter"> &nbsp;</td>'; // Empty cell for Remarks
                            echo '</tr>';
                        }
                    } else {


                    foreach ($selectedMeterTables as $tableMeterIndex) {
                        $numberOfTablesKey = 'numberOfTables' . $tableMeterIndex;
                        $testpointpHMeterKey = 'pHForMeterTesttable' . $tableMeterIndex;
                        $asfoundValueKey = 'asfoundValuetable' . $tableMeterIndex;
                        $appliedVoltagemVKey = 'appliedVoltagemVtable' . $tableMeterIndex;
                        $meterRemarksKey = 'meterRemarkstable' . $tableMeterIndex;

                        $numTrials = 1;
                        while (isset($dataInputs->{'trialTestForMetertable' . $tableMeterIndex . 'row' . ($numTrials + 1)})) {
                            $numTrials++;
                        }
                        echo '<tr>';
                        echo '<td class="textCenter" >' . $dataInputs->$testpointpHMeterKey . ' '. '(' . $dataInputs->$appliedVoltagemVKey .' ' .'mV)'.'</td>';
                        echo '<td class="textCenter" >' . $dataInputs->$asfoundValueKey . '</td>';
                            // Outputting each trial result row
                            for ($i = 1; $i <= $numTrials; $i++) { // Loop from trial 1 to trial 5
                                echo '<td class="textCenter">' . (isset($dataInputs->{'readingForMeterTesttable' . $tableMeterIndex . 'row' . $i}) ? $dataInputs->{'readingForMeterTesttable' . $tableMeterIndex . 'row' . $i} : '') . '</td>';
                            }
                        echo '<td class="textCenter">' . (isset($dataInputs->$meterRemarksKey) ? $dataInputs->$meterRemarksKey : '') . '</td>';
                        echo '</tr>';          
                    }
             
                    echo '</tbody>';
                    echo '</table>';
                }
                ?>
                <!-- Electrode Table    -->
                <?php
                    $selectedElectrodeTables = [];
                    foreach ($dataInputs as $key => $value) {
                        if (strpos($key, 'selectFunction') !== false && $value == 'testForElectrode') {
                            $selectedElectrodeTables[] = str_replace('selectFunction', '', $key);
                        }
                    }
                    $isFirstTable = true; // Initialize a flag to track the first table

                    foreach ($selectedElectrodeTables as $tableElectrodeIndex) {
                        $numberOfTablesKey = 'numberOfTables' . $tableElectrodeIndex;
                        $bufferSolutionKey = 'bufferSolutiontable' . $tableElectrodeIndex;
                        $bufferSolutionInitialTempBeforeAdjustmentKey = 'bufferSolutionTempInitialBeforeAdjustmenttable' . $tableElectrodeIndex;
                        $bufferSolutionFinalTempBeforeAdjustmentKey = 'bufferSolutionTempFinalBeforeAdjustmenttable' . $tableElectrodeIndex;
                        $bufferSolutionInitialTempAfterAdjustmentKey = 'bufferSolutionTempBeforeCalibrationtable' . $tableElectrodeIndex;
                        $bufferSolutionFinalTempAfterAdjustmentKey = 'bufferSolutionTempDuringCalibrationtable' . $tableElectrodeIndex;
                        $changeInTempKey = 'changeinTemptable' . $tableElectrodeIndex;
                        $changeInAtcKey = 'changeinAtctable' . $tableElectrodeIndex;
                        echo '<table class="table1">';
                        echo '<thead>';
                         // Add a new row if it's the first table
                        if ($isFirstTable) {
                            echo '<tr>';
                            echo '<th class="textLeft" colspan="8">Test for Electrode</th>';
                            echo '</tr>';
                            
                            $isFirstTable = false; // Set the flag to false after processing the first table
                        }
                
                        echo '<tr>';
                        echo '<td class="td textCenter" colspan="1" rowspan="2">Test Points, pH ' . $dataInputs->$bufferSolutionKey . '</td>';
                        echo '<td class="td textLeft" colspan="1" rowspan="2">UUC RREADING <br></br> before adjustment</td>';
                        echo '<td class="td textLeft" colspan="2">Buffer Solutions Temp. C</td>';
                        echo '<td class="td textLeft" colspan="1" rowspan="2">UUC RREADING <br></br> after adjustment</td>';
                        echo '<td class="td textLeft" colspan="2">Buffer Solutions Temp. C</td>';
                        echo '<td class="td textLeft" colspan="1" rowspan="2">Remarks</td>';

                        echo '</tr>';
                        echo '<tr>';
                        echo '<td class="textCenter" colspan="1" >Before</td>';
                        echo '<td class="textCenter" colspan="1" >After</td>';
                        echo '<td class="textCenter" colspan="1" >Before</td>';
                        echo '<td class="textCenter" colspan="1" >After</td>';
            
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
              

                      


                    $rowIndex = 1;
                    while (true) {
                        $trialKey = 'trialTestForElectrodetable' . $tableElectrodeIndex . 'row' . $rowIndex;
                        $electrodeValueBeforeKey = 'appliedValueForElectrodeBeforetable' . $tableElectrodeIndex . 'row' . $rowIndex;
                        $appliedValueKey = 'appliedValueForElectrodeTesttable' . $tableElectrodeIndex . 'row' . $rowIndex;
                        $temp1KeyBefore = 'bufferSolutionTempInitialBeforeAdjustmenttable' . $tableElectrodeIndex;
                        $temp2KeyBefore = 'bufferSolutionTempFinalBeforeAdjustmenttable' . $tableElectrodeIndex;
                        $temp1KeyAfter = 'bufferSolutionTempBeforeCalibrationtable' . $tableElectrodeIndex;
                        $temp2KeyAfter = 'bufferSolutionTempDuringCalibrationtable' . $tableElectrodeIndex;
                        $remarksKey = 'electrodeRemarkstable' . $tableElectrodeIndex . 'row' . $rowIndex;

                        if (!isset($dataInputs->$trialKey)) {
                            break;
                        }
                        

                        echo '<tr>';
                        echo '<td class="textCenter">' . $dataInputs->$trialKey . '</td>';
                        echo '<td class="textCenter">' . $dataInputs->$electrodeValueBeforeKey . '</td>';
                        echo '<td class="textCenter">' . $dataInputs->$temp1KeyBefore . '</td>';
                        echo '<td class="textCenter">' . $dataInputs->$temp2KeyBefore . '</td>';
                        echo '<td class="textCenter">' . $dataInputs->$appliedValueKey . '</td>';
                        echo '<td class="textCenter">' . $dataInputs->$temp1KeyAfter . '</td>';
                        echo '<td class="textCenter">' . $dataInputs->$temp2KeyAfter . '</td>';
                        echo '<td class="textCenter">' . $dataInputs->$remarksKey . '</td>';
                        echo '</tr>';

                        $rowIndex++;
                    } 
                    echo '</tbody>';
                    echo '</table>';
                    }
                ?>
                <!-- Remarks -->
                  <table class="table2" >
                    <tr>
                        <td class="td textLeft"  colspan='1' >  Remarks:</td>
                        <td class="td textLeft"  colspan='1' >  <input type="checkbox" id="remarks1" name="remarks1">&nbsp;Calibration was performed.</td>
                        <td class="td textLeft"  colspan='2' >  <input type="checkbox" id="remarks1" name="remarks1">&nbsp;No adjustment was done</td>
                      
                      
                    </tr>
                    <tr>
                    <td class="td textLeft"  colspan='1' > </td>
                        <td class="td textLeft"  colspan='1' >  <input type="checkbox" id="remarks1" name="remarks1">&nbsp;Others</td>
                        <td class="td textLeft"  colspan='2' > </td>
                 
                    </tr>
                    <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>
               
                </table>

                <!-- standard used  -->
                <table class="table2" >
                    <tr>
                        <th  colspan='4'>Standard and Accessories Used</th>
                        <!-- <td class="td textLeft"  colspan='1' rowspan='3'>Remarks:</td> -->
                    </tr>
                    <tr>
                        <td class="td textLeft"  colspan='2' >  <input type="checkbox" id="remarks1" name="remarks1">&nbsp;A.M.C.; GE Druck; DPI 620; S/N: 02838715</td>
                        <td class="td textLeft"  colspan='2' >Note: Electrode Test are: _______________</td>
                    </tr>
                    <tr>
                        <td class="td textLeft" colspan='2'><input type="checkbox" id="remarks1" name="remarks1">&nbsp;Documenting Process Calibrator; Fluke; 754; S/N: 2885803</td>
                        <td class="td textLeft"  colspan='2' >1. Isopotential Point: < ± 2 pH units _______________</td>
                    </tr>
                    <tr>
                        <td class="td textLeft" colspan='2'><input type="checkbox" id="remarks1" name="remarks1">&nbsp;Multi-Product Calibrator; Fluke; 5502A; S/N: 2885802</td>
                        <td class="td textLeft"  colspan='2' >2. Slope: must be > 80 % (59.15 mV / pH) _______________</td>
                    </tr>
                    <tr>
                        <td class="td textLeft"  colspan='2' ><input type="checkbox" id="remarks1" name="remarks1">&nbsp;pH 4.00 Buffer  Solution, Batch no. :    </td>
                        <td class="td textLeft"  colspan='2' >3. Response Time: must be < 30 s ( to 90% of final value) _______________</td>
                    </tr>
                    <tr>
                        <td class="td textLeft" colspan='2'> <input type="checkbox" id="remarks1" name="remarks1">&nbsp;pH 7.00 Buffer  Solution, Batch no. :                                              </td>
                        <td class="td textLeft"  colspan='2' >4. Repeatability: _______________ </td>
                    </tr>
                    <tr>
                        <td class="td textLeft" colspan='2'> <input type="checkbox" id="remarks1" name="remarks1">&nbsp;pH 10.00 Buffer  Solution, Batch no. :                                              </td>
                        <td class="td textLeft"  colspan='2' ></td>
                    </tr>
                    <tr>
                        <td class="td textLeft" colspan='2'> </td>
                        <td class="td textLeft"  colspan='2' ></td>
                    </tr>
                </table>
         
                <!-- Remarks  -->
                <div>
                    <table class="table2" >
                        <thead >
                            <tr>
                                <th> Remarks:</th>
                            </tr>
                        </thead>
                        <tbody >
                            
                            <tr>
                                <td>
                                    <label>
                                        <input type="checkbox">
                                        Standard/s, accessory/ies, and UUC are in good condition before and after calibration
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>
                                        <input type="checkbox">
                                        Others:
                                    </label>
                                </td>
                            </tr>
                            </tr>
                            <td>
                               
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- personnel calibration performed        -->
                <table class="table" >
                    <tr>
                        <td class="td textLeft" style="width: 15%;">Calibrated by:</td>
                        <td class="td textLeft" style="width: 15%;">Encoded by:</td>
                        <td class="td textLeft" style="width: 15%;">Checked by:</td>
                    </tr>
                </table>

                 <!-- uncertainty budget table -->
                 <table class="table3" >
                    <tr>
                        <th class="td textCenter" colspan='8'>Uncertainty Budget Table</th>
                    </tr>
                </table>
                 <?php
                    /** Assume $calculatedDataArray is a PHP array obtained from some source */
                    $calculatedDataArray = json_decode(json_encode($calculatedData), true);

                    // Flag to check if there is data for meter
                    $showMeterTable = false;

                    // Check if there is at least one entry with valid data for meter
                    foreach ($calculatedDataArray as $data) {
                        if (isset($data['averageAppliedValueForMeterTest']) && $data['averageAppliedValueForMeterTest'] !== null) {
                            $showMeterTable = true;
                            break;
                        }
                    }

                    // Handle table for meter if there is data
                    if ($showMeterTable) {
                        echo '<table id="uncertaintyBudgetForMeter" class="table" style="text-align: center; font-size: .6em;">';
                        echo '<tr>';
                        echo '<th>meter <br> average</th>';
                        echo '<th>Ustd_unc</th>';
                        echo '<th>Urep_uuc</th>';
                        echo '<th>Ures_uuc pH</th>';
                        echo '<th>Ures_uuc temp</th>';
                        echo '<th>uc</th>';
                        echo '<th>Veff</th>';
                        echo '<th>k</th>';
                        echo '<th>Ue</th>';
                        echo '</tr>';

                        // Generate rows for the meter table
                        foreach ($calculatedDataArray as $data) {
                            if (isset($data['averageAppliedValueForMeterTest']) && $data['averageAppliedValueForMeterTest'] !== null) {
                                echo '<tr>';
                                echo '<td>' . number_format((float)$data['averageAppliedValueForMeterTest'], 4) . '</td>';
                                echo '<td>' . number_format((float)$data['uncertaintyDueToCalibrationForMeter'], 12) . '</td>';
                                echo '<td>' . number_format((float)$data['uncertaintyDueToRepeatabilityForMeter'], 12) . '</td>';
                                echo '<td>' . number_format((float)$data['uncertaintyDueToResOfPHForMeter'], 12) . '</td>';
                                echo '<td>' . number_format((float)$data['uncertaintyDueToResOfDegreesForMeter'], 12) . '</td>';
                                echo '<td>' . number_format((float)$data['combinedUncertaintyForMeter'], 12) . '</td>';
                                echo '<td>' . number_format((float)$data['vEffectiveForMeter'], 12) . '</td>';
                                echo '<td>' . number_format((float)$data['coverageFactorkforMeter'], 2) . '</td>';
                                echo '<td>' . number_format((float)$data['expandedUncertaintyForMeter'], 12) . '</td>';
                                echo '</tr>';
                            }
                        }

                        echo '</table>';
                    } else {

                    }

                    // Flag to check if there is data for electrode
                    $showElectrodeTable = false;

                    // Check if there is at least one entry with valid data for electrode
                    foreach ($calculatedDataArray as $data) {
                        if (isset($data['averageAppliedValueForElectrode']) && $data['averageAppliedValueForElectrode'] !== null) {
                            $showElectrodeTable = true;
                            break;
                        }
                    }

                    // Handle table for electrode if there is data
                    if ($showElectrodeTable) {
                        echo '<table id="uncertaintyBudgetForElectrode" class="table" style="text-align: center; font-size: .6em;">';
                        echo '<tr>';
                        echo '<th>electrode <br> average</th>';
                        echo '<th>Ustd_unc</th>';
                        echo '<th>Urep_uuc</th>';
                        echo '<th>Ures_uuc</th>';
                        echo '<th>Ures_uuc temp</th>';
                        echo '<th>uc</th>';
                        echo '<th>Veff</th>';
                        echo '<th>k</th>';
                        echo '<th>Ue</th>';
                        echo '</tr>';

                        // Generate rows for the electrode table
                        foreach ($calculatedDataArray as $data) {
                            if (isset($data['averageAppliedValueForElectrode']) && $data['averageAppliedValueForElectrode'] !== null) {
                                echo '<tr>';
                                echo '<td>' . number_format((float)$data['averageAppliedValueForElectrode'], 4) . '</td>';
                                echo '<td>' . number_format((float)$data['uncertaintyDueToCalibrationForElectrode'], 12) . '</td>';
                                echo '<td>' . number_format((float)$data['uncertaintyDueToRepeatabilityForElectrode'], 12) . '</td>';
                                echo '<td>' . number_format((float)$data['uncertaintyDueToResOfPHForElectrode'], 12) . '</td>';
                                echo '<td>' . number_format((float)$data['uncertaintyDueToResOfDegreesForElectrode'], 12) . '</td>';
                                echo '<td>' . number_format((float)$data['combinedUncertaintyForElectrode'], 12) . '</td>';
                                echo '<td>' . number_format((float)$data['vEffectiveForElectrode'], 12) . '</td>';
                                echo '<td>' . number_format((float)$data['coverageFactorkForElcetrode'], 2) . '</td>';
                                echo '<td>' . number_format((float)$data['expandedUncertaintyForElectrode'], 12) . '</td>';
                                echo '</tr>';
                            }
                        }

                        echo '</table>';
                    } else {

                    }

                ?>
             
    </div>

   

</body>
</html>


