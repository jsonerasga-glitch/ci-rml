<?php 
ini_set('memory_limit', '1024M'); // or you could use 1G

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
    
    $pathIllusC = 'image/SREBillustrationC.png';
    $typeIllusC = pathinfo($pathIllusC, PATHINFO_EXTENSION);
    $dataIllusC = file_get_contents($pathIllusC);
    $base64IllusC = 'data:image/' . $typeIllusC . ';base64,' . base64_encode($dataIllusC);

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
        .tableData{
            text-align: left;
        }
        .centerTD{
            text-align: center;
            vertical-align: middle; 
        }
        .table th, .table td {
            border: 1px solid #000; /* 1px solid black border for table cells */
            padding: 2px; /* Optional: Add padding to cells for spacing */
            height: 5px;
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
            border: 1px solid #000; /* 1px solid black border for table cells */
        }
        input[type="checkbox"] {
            transform: scale(.4); /* Adjust the scale value for the desired size */
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
    <div style="font-size: .5em; margin-top: 30px;">
        <center><p>Republic of the Philippines</p></center> 
        <center><h4>DEPARTMENT OF SCIENCE AND TECHNOLOGY</h4></center>
        <center>CALABARZON</center>
        <center><h4>Regional Metrology Laboratory</h4></center>
    </div>
    <div style="border: 1px solid black; font-size: .75em;">
        <h4><center>Calibration Worksheet</center></h4>
    </div>
    <div style="font-size: .5em;">
        <center>CP-010: Calibration Worksheet for Single Range Electronic Balance</center>
    </div>
    <div style="font-size: .6em;">
        <table class="table" style="font-weight: bold;">
            <tr>
                <td style="width: 15%;">Certificate No.</td>
                <td class="tableData" style="width: 40%;"><?= $equipmentInfo->certificateNumber?></td>
                <td style="width: 15%;">Date Received</td>
                <td class="tableData" style="width: 15%;"><?= $customerInfo->dateReceived?><input type="text"></td>
            </tr>
            <tr>
                <td>Customer</td>
                <td class="tableData"><?= $customerInfo->customer?></td>
                <td>Date Calibrated</td>
                <td class="tableData"><?= $equipmentInfo->dateCalibrated?></td>
            </tr>
            <tr>
                <td>Place of Calibration</td>
                <td class="tableData"><?= $equipmentInfo->placeOfCalibration?></td>
                <td>Recom. Due Date</td>
                <td class="tableData"><?= $customerInfo->recommendedDueDate?></td>
            </tr>
        </table>
    </div>
    <div style="font-weight: bold;">
        <table class="table" style=" text-align: right;">
            <thead style="font-size: .75em;">
                <tr>
                    <td colspan="4"><center>Specifications of the Weighing Instrument</center></td>
                </tr>  
            </thead>
            <tbody style="font-size: .6em;">
                <tr>
                    <td style="width: 18%;">Equipment Description</td>
                    <td style="width: 32%;"><?= $equipmentInfo->equipmentDescription?></td>
                    <td style="width: 32%;">Maximum Capacity (<?= $equipmentInfo->unit?>)</td>
                    <td style="width: 18%;"><?= $equipmentInfo->maxCapacity?></td>
                </tr>
                <tr>
                    <td>Manufacturer</td>
                    <td><?= $equipmentInfo->manufacturer?></td>
                    <td>Minimum Capacity (<?= $equipmentInfo->unit?>)</td>
                    <td><?= $equipmentInfo->minCapacity?></td>
                </tr>
                <tr>
                    <td>Model</td>
                    <td><?= $equipmentInfo->modelNumber?></td>
                    <td>Readability (<?= $equipmentInfo->unit?>)</td>
                    <td><?= $equipmentInfo->readability?></td>
                </tr>
                <tr>
                    <td>Serial No.</td>
                    <td><?= $equipmentInfo->serialNumber?></td>
                    <td>e (<?= $equipmentInfo->unit?>)</td>
                    <td><?= $equipmentInfo->resolution?></td>
                </tr>
                <tr>
                    <td>Equipment ID</td>
                    <td><?= $equipmentInfo->equipmentId?></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div style="font-weight: bold;">
        <table class="table">
            <thead style="font-size: .75em;">
                <tr>
                    <th colspan="4"><center>Environment Condition</center></th>
                </tr>
             </thead>
             <tbody style="font-size: .6em;">
                <tr>
                    <td style="width: 18%;">Start Temp (°C)</td>
                    <td style="width: 32%;"><?= $environmentInfo->tempStart?></td>
                    <td style="width: 32%;">End Temp (°C)</td>
                    <td style="width: 18%;"><?= $environmentInfo->tempEnd?></td>
                </tr>
                <tr>
                    <td>Start RH (% RH)</td>
                    <td><?= $environmentInfo->rhStart?></td>
                    <td>End RH (% RH)</td>
                    <td><?= $environmentInfo->rhEnd?></td>                    
                </tr>
             </tbody>
        </table>
    </div>

    <div>
        <table class="table4" style="">
            <thead style="font-size: .75em;">
                <tr>
                    <td><center><b>Weights</b></center></td>
                    <td><center><b>Illustration</b></center></td>
                </tr>
            </thead>
            <tbody style="">
                <tr>
                    <td class='centerTD' style="align-items: center; font-size: 1em;">
                        <?= $WorksheetData['standard']?>
                    </td>
                    <td class='centerTD'>
                       <!-- <img src="<?php //$base64;?>" style="height: 70px;" alt=""> -->
                       <img src="<?= $dataInputs->illusA == 'checked' ? $base64Illusa : ($dataInputs->illusB == 'checked'? $base64IllusB : $base64IllusC)?>" style="height: 70px;" alt="">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div style="display:none">
        <table class="table4" style="height: 50px; ">
            <thead style="font-size: .75em;">
                <tr>
                    <td colspan="2"><center><b>Preliminary Inspection</b></center></td>
                </tr>
            </thead>
            <tbody style="font-size: .5em;">
                <tr>
                    <td style="width: 50%;">
                        <label>
                            <input type="checkbox">The equipment should be free from dust and dirt
                        </label>
                    </td>
                    <td style="width: 50%;">
                        <label>
                            <input type="checkbox">Level the instrument if indicating means is provided and note its conditions
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            <input type="checkbox">The weighing pan should be clean and in proper form
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox">Check the tare mechanism if available
                        </label>
                    </td>
                </tr>
                <tr>
                    <td rowspan="2">
                        <label>
                            <input type="checkbox">The readout display shall be without defects (such as color changes) that would impair the reading of the indication</td>
                    </label>
                    <td>
                        <label>
                            <input type="checkbox">Exercise the instrument by loading up to 80% of maximum capacity
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
            </tbody>

        </table>
    </div>
    <div>
        <table class="table5"  style="font-size: .6em;">
            <tr>
                <td colspan="2"><center><b>Eccentricity Test</b></center></td>
            </tr>
            <tr>
                <th>Position</th>
                <th>Indication (<?= $equipmentInfo->unit?>)</th>
            </tr>
            <tr>
                <td>1</td>
                <td><?= $dataInputs->eccentricity1Start?></td>
            </tr>
            <tr>
                <td>2</td>
                <td><?= $dataInputs->eccentricity2?></td>
            </tr>
            <tr>
                <td>3</td>
                <td><?= $dataInputs->eccentricity3?></td>
            </tr>
            <tr>
                <td>4</td>
                <td><?= $dataInputs->eccentricity4?></td>
            </tr>
            <tr>
                <td>5</td>
                <td><?= $dataInputs->eccentricity5?></td>
            </tr>
          
        </table>
    </div>

  
    


    <div>
        <table class="table5"  style="font-size: .6em;">
            <thead>
                <tr>
                    <td colspan="3"><center><b>Linearity Test</b></center></td>
                </tr>
                <tr>
                    <th>Load (<?= $equipmentInfo->unit?>)</th>
                    <th>Test weights used (<?= $equipmentInfo->unit?>)</th>
                    <th>Indication (<?= $equipmentInfo->unit?>)</th>
                </tr>
            </thead>
            <tbody>
                <?php 

                    $count = countStringInKeys($dataInputs, 'linearLoad');
                    
                   
                    for ($i=1; $i <= $count; $i++) { 
                        $linearLoadKey = "linearLoad".$i;
                        $markingsUsedKey = "markingsUsed".$i;
                        $indicationKey = "indication".$i;

                        $marking = str_replace('(SPLIT)', ' + ', $dataInputs->$markingsUsedKey);
                        
                ?>
                    <tr>
                        <td><?= $dataInputs->$linearLoadKey?></td>
                        <td><?= $marking?></td>
                        <td><?= $dataInputs->$indicationKey?></td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>


   
    <div>
        <table class="table" style="font-size: .6em;">
            <thead>
                <tr>
                    <th colspan='4'><center>Repeatability Test</center></th>
                </tr>
                <tr>
                    <th>Trial</th>
                    <th>Indication (<?= $equipmentInfo->unit?>)</th>
                    <th>Trial</th>
                    <th>Indication (<?= $equipmentInfo->unit?>)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $countRepeat = countStringInKeys($dataInputs, 'repeat');
                    $leftCount = ceil($countRepeat/2);
                    $rightCount = floor($countRepeat/2);

                    $trStart = '<tr>';
                    $tdStart = '<td><center>';
                    $tdEnd = '</center></td>';
                    $td2Start = '<td><center>';
                    $td2End = '</center></td>';
                    $trEnd = '</tr>';

                    for ($i=1; $i <= $leftCount; $i++) { 
                        $leftLoadCount = $i;
                        $rightLoadCount = $leftCount + $i;
                        $leftKey = 'repeat'.$i;
                        
                        if($rightLoadCount <= $countRepeat){
                            $rightKey = 'repeat'.($leftLoadCount + $i);
                            echo $trStart . $tdStart . $leftLoadCount . $tdEnd . $td2Start . $dataInputs->$leftKey . $td2End . $tdStart . $rightLoadCount . $tdEnd . $td2Start . $dataInputs->$rightKey . $td2End . $trEnd;
                        }else{
                            echo $trStart . $tdStart . $leftLoadCount . $tdEnd . $td2Start . $dataInputs->$leftKey . $td2End . $tdStart . $tdEnd . $td2Start . $td2End . $trEnd;
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div style="margin-top: 5px; display:none">
        <table class="table3" >
            <thead style="font-size: .5em;">
                <tr>
                    <td colspan="3" style="border: 1px solid #000;"><center>Remarks</center></td>
                </tr>
            </thead>
            <tbody style="font-size: .5em;">
                <tr>
                    <td style="width: 45%;">
                            <label>
                                <input type="checkbox">
                                Calibration was performed
                            </label>
                        </td>
                    <td style="width: 28%;"></td>
                    <td style="width: 27%;"></td>
                </tr>
                <tr>
                    <td>
                        <label>
                            <input type="checkbox">
                            No adjustment was done 
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox">
                            Internal adjustment was done 
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox">
                            External adjustment was done
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            <input type="checkbox">
                            Standard/s, accessory/ies, and UUC are in good condition before and after calibration
                        </label>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <label>
                            <input type="checkbox">
                            Others: ___________________________________________________________
                        </label>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <table id="uncertBudgetTable" class="table" style="font-size: .6em;">
            <thead class='align-middle'>
                <tr>
                    <th colspan="12">Uncertainty Balance</th>
                </tr>
                <tr>
                    <th>Nominal Value</th>
                    <th>Uncertainty Due to Reference Mass</th>
                    <th>Uncertainty Due to Air Buoyancy</th>
                    <th>Uncertainty Due to Drift Of Weight</th>
                    <th>Uncertainty Due to Convection Effects</th>
                    <th>Uncertainty Due to Rounding Error (Without Load)</th>
                    <th>Uncertainty Due to Rounding Error (With Load)</th>
                    <th>Uncertainty Due to Eccentricity</th>
                    <th>Uncertainty Due to Repeatability</th>
                    <th>Combined Uncertainty</th>
                    <th>k</th>
                    <th>Expanded Uncertainty</th>
                </tr>
            </thead>
            <tbody id="uncertBudgetTBody">
                <?php
                    $numberOfRows = count($calculatedData);
                    for ($i=0; $i < $numberOfRows; $i++) { 
                ?>
                    <tr>
                        <td>
                            <?= $calculatedData[$i]->linearLoad?>
                        </td>
                        <td>
                            <?= number_format($calculatedData[$i]->ReferenceWeightCalculated, 5)?>
                        </td>
                        <td>
                            <?= number_format($calculatedData[$i]->AirBuoyancytCalculated, 5)?>
                        </td>
                        <td>
                            <?= number_format($calculatedData[$i]->DriftOfWeightCalculated, 5)?>
                        </td>
                        <td>
                            <?= number_format($calculatedData[$i]->ConvectionEffectsCalculated, 5)?>
                        </td>
                        <td>
                            <?= number_format($calculatedData[$i]->RoundingNoLoadCalculated, 5)?>
                        </td>
                        <td>
                            <?= number_format($calculatedData[$i]->RoundingNoLoadCalculated, 5)?>
                        </td>
                        <td>
                            <?= number_format($calculatedData[$i]->EccentricityCalculated, 5)?>
                        </td>
                        <td>
                            <?= number_format($calculatedData[$i]->stDevRepeatability, 5)?>
                        </td>
                        <td>
                            <?= number_format($calculatedData[$i]->StandardUncertaintyError, 5)?>
                        </td>
                        <td>
                            <?= number_format($calculatedData[$i]->kForCompute, 5)?>
                        </td>
                        <td>
                            <?= number_format($calculatedData[$i]->expandedUncertainty, 5)?>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div>
        <table class="table">
            <tr>
                <th>Calibrated by</th>
                <td></td>
                <th>Encoded by</th>
                <td></td>
                <th>Checked by</th>
                <td></td>
            </tr>
        </table>
    </div>
    <div style="font-size: .35em;">
        <table style=" border-collapse: collapse; border: none; width: 100%; text-align: right;">
            <tr><td>CP-010-F1 Rev. 0</td></tr>
            <tr><td>Effectivity Date: 2 November 2015</td></tr>
        </table>
    
    
    </div>
</body>
</html>   