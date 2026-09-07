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
            margin-top: 4px; 
            margin-bottom: 4px;
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black; 
        }
        .table th,  {
            border: 1px solid black;
            padding: 2px;
        }
        .table td {
            vertical-align: top;
            border: 1px solid black;
            padding:2px;
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
            margin: 0px; 
            margin-top: 1px; 
            margin-bottom: 1px;
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black; 
          
        }
        .table2 th{
            padding: 4px;
        }
        .table2 th, .table2 td {
            padding: 4px;
        }


        .table3 {
            font-size: .7em;
            margin-top: 10px; 
            margin-bottom: 10px;
            border-collapse: collapse;
            width: 100%;
           
        }
        .table3 th{
            padding: 1px;
            text-align: center; 
        }
        .table3 td {
            padding: 1px;
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


    </style>
</head>
<body>
    <header>
        <div style="text-align: center; border: 0px solid blue; line-height: 1;">
            Republic of the Philippines<br>
            <h5 style="margin: 0; color: blue">DEPARTMENT OF SCIENCE AND TECHNOLOGY</h5>
            CALABARZON<br>
            <h5 style="margin: 0;">Regional Metrology Laboratory</h5>
           
        </div>
    </header>
    <footer>
            <div style="font-size: .5em;">
                <table style="border-collapse: collapse; border: none; width: 100%; text-align: right; z-index: -1;">
                    <tr><td>Page ____ of ____</td></tr>
                    <tr><td>CP-002-F1 Rev. 1</td></tr>
                    <tr><td>Effectivity Date: 27 August 2019</td></tr>
                </table>
            </div>
    </footer>


    <div class="page">

        <!-- First Header info -->
        <div >
            <table class="table"  style="text-align: center;">
                <tr>
                    <th>Calibration Worksheet</th>
                </tr>
            </table>
            <table class="table3">
                <tr>
                    <td>CP-002: Calibration Worksheet for Non-Automatic Weighing Instrument Meter</td>
                </tr>
            </table>
        </div>

        <!-- Customer and Equipment Details -->
        <div >
            <table class="table" style="text-align: left;">
                <tr>
                    <td colspan="2">Certificate No.: <?= $equipmentInfo->certificateNumber?></td>
                    <td>Date Received:<?= $customerInfo->dateReceived?></td>
                </tr>
            
                <tr>
                    <td colspan="2"  style="vertical-align: top;">Customer: <?= $customerInfo->customer?></td>
                    <td>Date Calibrated: <?= $equipmentInfo->sDate?></td>
                </tr>
                <tr>
                    <td colspan="2">Place of Calibration: <?= $equipmentInfo->placeOfCalibration?></td>
                    <td>Recommended DUe Date: <?= $equipmentInfo->sDate?></td>
                </tr>
            
            </table>
        </div>

        <!-- Equipment Information -->
        <div >
            <table class="table">
                <thead>
                    <tr>
                        <th colspan='8'>Specifications of the Weighing Instrument</th>
                    </tr>
                </thead>
                <tbody >
                    <tr>
                        <td class="td textLeft"colspan='8'>Description: <?= $equipmentInfo->equipmentDescription?></td>
                    
                    
                    
                    </tr>
                    </tr>
                    <tr>
                        <td class="td textLeft"colspan='4'>Manufacturer: <?= $equipmentInfo->manufacturer?></td>
                        <td class="td textLeft"colspan='4'>Maximum Capacity:<?= $equipmentInfo->maxCapacity?>&nbsp;<?= $equipmentInfo->maxCapacityMeasurement?></td>
                
                    
                    <tr>
                        <td class="td textLeft"colspan='4'>Model: <?= $equipmentInfo->modelNumber?></td>
                
                        <td class="td textLeft"colspan='4'>Readability: <?= $equipmentInfo->readability?>&nbsp;<?=$equipmentInfo->readabilityUnit?></td>
                    
                    </tr>
                            <tr>
                                <td class="td textLeft"colspan='4'>Serial No: <?= $equipmentInfo->serialNumber?></td>
                            
                                <td class="td textLeft"colspan='4'>e:<?= $equipmentInfo->e?></td>
                            
                            </tr>
                            <tr>
                                <td class="td textLeft"colspan='4'>Equipment No: <?= $equipmentInfo->equipmentNumber?></td>
                            
                                <td class="td textLeft"colspan='4'>Remarks: <?= $equipmentInfo->equipmentRemarks?></td>
                            
                            </tr>
                </tbody>
            </table>
        </div>

        <!-- Environment Condition -->
        <div >
                <table class="table" style="border:1px black solid;">
                    <thead>
                        <tr>
                            <th colspan='8'>Environmental Condition</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="td textLeft" colspan='4'>Start Temp (°C): <?= $environmentInfo->tempStart?></td>
                        
                            <td class="td textLeft" colspan='4'>Start RH (% RH): <?= $environmentInfo->rhStart?></td>
                    
                        </tr>
                        <tr>
                            <td class="td textLeft"colspan='4'>End Temp (°C): <?= $environmentInfo->tempEnd?></td>
                    
                            <td class="td textLeft"colspan="4">End RH (% RH): <?= $environmentInfo->rhEnd?></td>
                        
                        </tr>
                    </tbody>
                </table>
        </div>
        <!-- Preliminary Inspection    -->
        <div>
            <table class="table2">
                <tr>
                    <th colspan="2"><center>Preliminary Inspection</center></th>
                </tr>
                <tr>
                    <td colspan="2">
                        <label>
                            <input type="checkbox"> Visual Inspection (clean the equipment w/ soft cloth to remove dust and small particles)
                        </label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label>
                            <input type="checkbox"> Check the surface and edges of the equipment for any damages. (note in remarks)
                        </label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label>
                            <input type="checkbox"> Check the protective window of the equipment for cracks/scratches, color change, and broken window 
                        </label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label>
                            <input type="checkbox"> Check if the stylus or pointer move smoothly when applied with increasing and decreasing test point
                        </label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label>
                            <input type="checkbox"> Check if the battery and the fuse are still in good condition
                        </label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label>
                            <input type="checkbox"> Check the continuity of the test leads
                        </label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label>
                            <input type="checkbox"> Record all necessary and vital information
                        </label>
                    </td>
                </tr>
            </table>
        </div> 

        <!-- Preliminary Inspection    -->
        <div>
            <table class="table" >
                <thead>
                <tr>
                    <th colspan="6">Weights</th>
                </tr>
                </thead>
                <tbody style="font-size:.6em;">
                <tr>
                    <td colspan="3">
                        <label>
                            <input type="checkbox" >Troemner Class E2 / SN 91096 (200 g), SN 91095 (100 g), SN 91094 (50 g), SN 91093 (10 g)
                        </label>
                    </td>
                    <td colspan="2">
                        <label>
                            <input type="checkbox">Troemner Class F2 / SN 57249 / 2 mg to 1 kg
                        </label>
                    </td>
                    <td colspan="1">
                        <label>
                            <input type="checkbox">Haefner Class F1 / SN 7740119 / 1 mg 500 g
                        </label>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <label>
                            <input type="checkbox">Troemner Class E2 / SN 4000014940 / 1 mg to 5 kg
                        </label>
                    </td>
                    <td colspan="2">
                        <label>
                            <input type="checkbox">Haefner Class F2 / SN 6021214 / 20 kg
                        </label>
                    </td>
                    <td colspan="1">
                        <label>
                            <input type="checkbox">Haefner Class F1 / SN 7740119 / 1 mg 500 g
                        </label>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <label>
                            <input type="checkbox">Troemner Class F2 / SN 57248 / 1 mg to 20 kg
                        </label>
                    </td>
                    <td colspan="2">
                        <label>
                            <input type="checkbox">Haefner Class F2 / SN 6031214 / 1 mg to 10 kg
                        </label>
                    </td>
                    <td colspan="1">
                        <label>
                            <input type="checkbox">
                        </label>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <label>
                            <input type="checkbox"> Fuji Class M1 / SN 09000800 / 500 g to 5 kg
                        </label>
                    </td>
                    <td colspan="2">
                        <label>
                            <input type="checkbox"> Haefner Class M1 / SN 4640918 / 1 g to 10 kg
                        </label>
                    </td>
                    <td colspan="1">
                        <label>
                            <input type="checkbox">
                        </label>
                    </td>
                </tr>
                <!-- 3x3 columns -->

                <tr>
                    <td colspan="1">
                        <label>
                            <input type="checkbox"> Fuji Free Nominal Mass
                        </label>
                    </td>
                    <td colspan="1">
                        <label>
                            <input type="checkbox"> S/N: 10002070       (5 kg)
                        </label>
                    </td>
                    <td colspan="1">
                        <label>
                            <input type="checkbox"> B  S/N: 03TW10-1      (10 kg)
                        </label>
                    </td>
                    <td colspan="1">
                        <label>
                            <input type="checkbox"> C   S/N: 03TW10-2     (10 kg)
                        </label>
                    </td>
                    <td colspan="1">
                        <label>
                            <input type="checkbox"> D   S/N: 10007155     (20 kg)
                        </label>
                    </td>
                    <td colspan="1">
                        <label>
                            <input type="checkbox"> E   S/N: 10007181     (20 kg)
                        </label>
                    </td>



                </tr>

                <tr>
                    <td colspan="1">
                        <label>
                            <input type="checkbox"> F   S/N: 10007173      (20 kg)
                    </td>
                    <td colspan="1">
                        <label>
                            <input type="checkbox"> G   S/N: 10002114     (20 kg)
                        </label>
                    </td>
                    <td colspan="1">
                        <label>
                            <input type="checkbox"> H  S/N: 10002765      (20 kg)
                        </label>
                    </td>
                    <td colspan="1">
                        <label>
                            <input type="checkbox"> I    S/N: 10002780      (20 kg)
                        </label>
                    </td>
                    <td colspan="1">
                        <label>
                            <input type="checkbox"> J    S/N: 10007177     (20 kg)
                        </label>
                    </td>
                    <td colspan="1">
                        <label>
                            <input type="checkbox"> K   S/N: 10007174     (20 kg)
                        </label>
                    </td>



                </tr>
                <tr>
                    <td colspan="1">
                        <label>
                            <input type="checkbox"> L   S/N: 10002129      (20 kg)
                    </td>
                    <td colspan="1">
                        <label>
                            <input type="checkbox"> M  S/N: 10002113     (20 kg)
                        </label>
                    </td>
                    <td colspan="1">
                        <label>
                            <input type="checkbox"> N  S/N: 10007172      (20 kg)
                        </label>
                    </td>
                    <td colspan="1">
                        <label>
                            <input type="checkbox"> O  S/N: 10007167      (20 kg)
                        </label>
                    </td>
                    <td colspan="1">
                        <label>
                            <input type="checkbox"> P   S/N: 10002781      (20 kg)
                        </label>
                    </td>
                    <td colspan="1">
                        <label>
                            <input type="checkbox"> Q  S/N: 10007169     (20 kg)
                        </label>
                    </td>
                </tr>
                <tr>
                    <td colspan="1">
                        <label>
                            <input type="checkbox"> R  S/N: 10007178       (20 kg)
                    </td>
                    <td colspan="1">
                        <label>
                            <input type="checkbox"> S   S/N: 10007156      (20 kg)
                        </label>
                    </td>
                    <td colspan="1">
                        <label>
                            <input type="checkbox"> T   S/N: 03TW20-1      (20 kg)
                        </label>
                    </td>
                    <td colspan="1">
                        <label>
                            <input type="checkbox"> U  S/N: 03TW20-2     (20 kg)
                        </label>
                    </td>
                    <td colspan="1">
                        <label>
                            <input type="checkbox"> V  S/N: LPW0002679  (20 kg)
                        </label>
                    </td>
                    <td colspan="1">
                    
                    </td>
                </tr>

                </tbody>
            </table>
        </div> 
        <!-- Span Calibration -->
        <div style="margin-bottom:10">
                <table class="table" style="border:1px black solid;">
                    <thead>
                        <tr>
                            <th colspan='4'>Span Calibration</th>
                        </tr>
                        <tr>
                            <td class="td textCenter">Load</td>
                            <td class="td textCenter">Trial</td>
                            <td class="td textCenter">Before Adjustment, <?= $dataInputs->spanBeforeUnit?></td>
                            <td class="td textCenter">After Adjustment, <?= $dataInputs->spanAfterUnit?></td>                    
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="td textCenter" rowspan="5">Empty</td>
                            <td class="td textCenter">1</td>
                            <td class="td textCenter"><?= $dataInputs->spanBefore1?></td>
                            <td class="td textCenter"><?= $dataInputs->spanAfter1?></td>
                        </tr>
                        <tr>
                            <td class="td textCenter">3</td>
                            <td class="td textCenter"><?= $dataInputs->spanBefore3?></td>
                            <td class="td textCenter"><?= $dataInputs->spanAfter3?></td>
                        </tr>
                        <tr>
                            <td class="td textCenter">5</td>
                            <td class="td textCenter"><?= $dataInputs->spanBefore5?></td>
                            <td class="td textCenter"><?= $dataInputs->spanAfter5?></td>
                        </tr>
                        <tr>
                            <td class="td textCenter">7</td>
                            <td class="td textCenter"><?= $dataInputs->spanBefore7?></td>
                            <td class="td textCenter"><?= $dataInputs->spanAfter7?></td>
                        </tr>
                        <tr>
                            <td class="td textCenter">9</td>
                            <td class="td textCenter"><?= $dataInputs->spanBefore9?></td>
                            <td class="td textCenter"><?= $dataInputs->spanAfter9?></td>
                        </tr>
                        <tr>
                            <td class="td textCenter" rowspan="5">Maximum</td>
                            <td class="td textCenter">2</td>
                            <td class="td textCenter"><?= $dataInputs->spanBefore2?></td>
                            <td class="td textCenter"><?= $dataInputs->spanAfter2?></td>
                        </tr>
                        <tr>
                            <td class="td textCenter">4</td>
                            <td class="td textCenter"><?= $dataInputs->spanBefore4?></td>
                            <td class="td textCenter"><?= $dataInputs->spanAfter4?></td>
                        </tr>
                        <tr>
                            <td class="td textCenter">6</td>
                            <td class="td textCenter"><?= $dataInputs->spanBefore6?></td>
                            <td class="td textCenter"><?= $dataInputs->spanAfter6?></td>
                        </tr>
                        <tr>
                            <td class="td textCenter">8</td>
                            <td class="td textCenter"><?= $dataInputs->spanBefore8?></td>
                            <td class="td textCenter"><?= $dataInputs->spanAfter8?></td>
                        </tr>
                        <tr>
                            <td class="td textCenter">10</td>
                            <td class="td textCenter"><?= $dataInputs->spanBefore10?></td>
                            <td class="td textCenter"><?= $dataInputs->spanAfter10?></td>
                        </tr>
                    </tbody>
                </table>
        </div>

    </div>

    <div class="page">

        <!-- Second Header info -->
        <div >
            <table class="table"  style="text-align: center;">
                <tr>
                    <th>Calibration Worksheet</th>
                </tr>
            </table>
            <table class="table3">
                <tr>
                    <td>CP-002: Calibration Worksheet for Non-Automatic Weighing Instrument Meter</td>
                </tr>
            </table>
        </div>
        <!-- Certificate page header       -->
        <table class="table" >
                <tr>
                    <td class="td textLeft" colspan='4'>Certificate No.: <?= $equipmentInfo->certificateNumber?></td>
                </tr>
        </table>
        <!-- Sensitivity Test    -->
        <div style="margin-bottom:6">
                <table class="table" style="border:1px black solid; font-size:0.8em;">
                    <thead>
                        <tr>
                            <th colspan='6'>Sensitivity Test</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="td textLeft" colspan='3'>Nominal Value <?= $dataInputs->sensitivityNominalValue?>&nbsp;<?=$dataInputs->sensitivityNominalUnit?></td>
                        
                            <td class="td textLeft" colspan='3'>Marking <?= $dataInputs->sensitivityMarking?></td>
                        
                        </tr>
                        <tr>
                            <td class="td textCenter" colspan="2">Trial</td>
                            <td class="td textCenter"colspan="2">Empty + Δm,&nbsp;&nbsp;<?= $dataInputs->sensitivityCM?>&nbsp;<?= $dataInputs->sensitivityEmptyUnit?></td>
                            <td class="td textCenter"colspan="2">Maximum (<?= $dataInputs->sensitivityMaxNominalValue?>) + Δm, &nbsp;&nbsp;<?= $dataInputs->sensitivityU?>&nbsp;<?= $dataInputs->sensitivityUUnit?></td>
                        </tr>
                        <tr>
                            <td class="td textCenter" colspan="2">1</td>
                            <td class="td textCenter" colspan="2"><?= $dataInputs->sensitivityEmptyTrial1?></td>
                            <td class="td textCenter" colspan="2"><?= $dataInputs->sensitivityMaxTrial1?></td>
                        </tr>
                        <tr>
                            <td class="td textCenter" colspan="2">2</td>
                            <td class="td textCenter" colspan="2"><?= $dataInputs->sensitivityEmptyTrial2?></td>
                            <td class="td textCenter" colspan="2"><?= $dataInputs->sensitivityMaxTrial2?></td>
                        </tr>
                        <tr>
                            <td class="td textCenter" colspan="2">3</td>
                            <td class="td textCenter" colspan="2"><?= $dataInputs->sensitivityEmptyTrial3?></td>
                            <td class="td textCenter" colspan="2"><?= $dataInputs->sensitivityMaxTrial3?></td>
                        </tr>
                        <tr>
                            <td class="td textCenter" colspan="2">4</td>
                            <td class="td textCenter" colspan="2"><?= $dataInputs->sensitivityEmptyTrial4?></td>
                            <td class="td textCenter" colspan="2"><?= $dataInputs->sensitivityMaxTrial4?></td>
                        </tr>
                        <tr>
                            <td class="td textCenter" colspan="2">5</td>
                            <td class="td textCenter" colspan="2"><?= $dataInputs->sensitivityEmptyTrial5?></td>
                            <td class="td textCenter" colspan="2"><?= $dataInputs->sensitivityMaxTrial5?></td>
                        </tr>
                    </tbody>
                </table>
        </div>  
        <!-- Eccentricity Test -->
        <div style="margin-bottom:6">
                <table class="table" style="border:1px black solid; font-size:0.8em;">
                    <thead>
                        <tr>
                            <th colspan='3'>Eccentricity Test</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="td textCenter">Position</td>
                            <td class="td textCenter">Indication, <?= $dataInputs->eccentricityIndicationUnit?></td>
                        
                            <td class="td textCenter" >Illustration</td>
                    </tr>
                            
                        </tr>
                        <tr>
                            <td class="td textCenter">1</td>
                            <td class="td textCenter"><?= $dataInputs->eccentricityIndicationPosition1Start?></td>
                            <td class="td textCenter" rowspan='6' style="vertical-align: middle;"> 
                                <img src="<?= $dataInputs->illusA == 'checked'?$base64Illusa : $base64IllusB?>" style="height: 70px;" alt="">
                            
                            </td>
                    
                        </tr>
                        <tr>
                            <td class="td textCenter">2</td>
                            <td class="td textCenter"><?= $dataInputs->eccentricityIndicationPosition2?></td>
                        </tr>
                        <tr>
                            <td class="td textCenter">3</td>
                            <td class="td textCenter"><?= $dataInputs->eccentricityIndicationPosition3?></td>
                        </tr>
                        <tr>
                            <td class="td textCenter">4</td>
                            <td class="td textCenter"><?= $dataInputs->eccentricityIndicationPosition4?></td>
                        </tr>
                        <tr>
                            <td class="td textCenter">5</td>
                            <td class="td textCenter"><?= $dataInputs->eccentricityIndicationPosition5?></td>
                        </tr>
                        <tr>
                            <td class="td textCenter">1</td>
                            <td class="td textCenter"><?= $dataInputs->eccentricityIndicationPosition1End?></td>
                        </tr>
                    </tbody>
                </table>
        </div>

        <!-- Linearity -->
        <div style="margin-bottom:6">
                <table class="table" style="border:1px black solid;">
                    <thead>
                        <tr>
                            <th colspan='5'>Linearity Test</th>
                        </tr>
                        <tr>
                            <td class="td textCenter" rowspan="2"  style="vertical-align: middle;">Nominal Value, <?= $dataInputs->linearityNominalValueUnit?></td>
                            <td class="td textCenter" rowspan="2" colspan="2" style="vertical-align: middle;">Test Weight/s Used</td>
                            <td class="td textCenter" colspan="2">Indication <?= $dataInputs->linearityIndicationUnit?></td>
                        </tr>
                        <tr>
                            <td class="td textCenter">Upward</td>
                            <td class="td textCenter">Downward</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $countLinearityTest = countStringInKeys($dataInputs, 'NominalValueRow');
                            for ($i=1; $i <= $countLinearityTest; $i++) { 
                                $nominalKey = 'NominalValueRow'.$i;
                                $standardUsedKey = 'StandardUsedRow'.$i;
                                $upwardKey = 'UpwardRow'.$i;
                                $downwardKey = 'DownwardRow'.$i;
                        ?>
                            <tr>
                                <td class="td textCenter"><?= $dataInputs->$nominalKey?></td>
                                <td class="td textCenter" colspan='2' style="font-size:0.8em"><?= $dataInputs->$standardUsedKey?></td>
                                <td class="td textCenter"><?= $dataInputs->$upwardKey?></td>
                                <td class="td textCenter"><?= $dataInputs->$downwardKey?></td>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
        </div>
        <!-- Repeatability -->
        <div style="margin-bottom:6">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan='4'><center>Repeatability Test</center></th>
                        </tr>
                        <tr>
                            <td class="td textCenter">Trial</td>
                            <td class="td textCenter">Indication (<?= $dataInputs->repeatabilitySUnit?>)</td>
                            <td class="td textCenter">Trial</td>
                            <td class="td textCenter">Indication (<?= $dataInputs->repeatabilitySUnit?>)</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $countRepeat = countStringInKeys($dataInputs, 'repeatabilityTrial');
                            $leftCount = ceil($countRepeat/2);
                            $rightCount = floor($countRepeat/2);

                            $trStart = '<tr>';
                            $tdStart = '<td class="td textCenter">';
                            $tdEnd = '</td>';
                            $td2Start = '<td class="td textCenter">';
                            $td2End = '</td>';
                            $trEnd = '</tr>';

                            for ($i=1; $i <= $leftCount; $i++) { 
                                $leftLoadCount = $i;
                                $rightLoadCount = $leftCount + $i;
                                $leftKey = 'repeatabilityTrial'.$i;
                                
                                if($rightLoadCount <= $countRepeat){
                                    $rightKey = 'repeatabilityTrial'.($leftLoadCount + $i);
                                    echo $trStart . $tdStart . $leftLoadCount . $tdEnd . $td2Start . $dataInputs->$leftKey . $td2End . $tdStart . $rightLoadCount . $tdEnd . $td2Start . $dataInputs->$rightKey . $td2End . $trEnd;
                                }else{
                                    echo $trStart . $tdStart . $leftLoadCount . $tdEnd . $td2Start . $dataInputs->$leftKey . $td2End . $tdStart . $tdEnd . $td2Start . $td2End . $trEnd;
                                }
                            }
                        ?>
                    </tbody>
                </table>
        </div>
        <!-- Remarks -->
        <div>
            <table class="table2" >
                <tr>
                    <th>Remarks</th>
                </tr>
                <tr>
                    <td >
                        <label>
                            <input type="checkbox">Testing was performed.
                        </label>
                    </td>
                </tr>
                <tr>
                    <td >
                        <label>
                            <input type="checkbox">No adjustment was done.
                        </label>
                    </td>
                </tr>
                <tr>
                    <td >
                        <label>
                            <input type="checkbox">Standard/s, accesory/ies, and UUC are in good condition before and after conduct of test.
                        </label>
                    </td>
                </tr>
                <tr>
                    <td >
                        <label>
                            <input type="checkbox">Others: <span class="fixed-underline2"></span>
                        </label>
                    </td>
                </tr>
            </table>
        </div>
        <!-- Personnel  Calibrated info -->
        <div>
            <table class="table">
                <tr>
                    <td>Calibrated by:</td>
                
                    <td>Encoded by:</td>
                
                    <td>Checked by:</td>
                
                
                
                </tr>
            </table>
    </div>

    <!-- uncertainty budget table -->
    <div class="page">
        <?php
                $numberOfItems = 1; // Default to 1 table
                $calculatedDataArray = json_decode(json_encode($calculatedData), true);
                 for ($i = 1; $i <= $numberOfItems; $i++) {
                                $tableKey = 'calculated';

                                echo '<table class="table" style="text-align: left; font-size: .6em;">';
                                echo '<thead>';
                                echo '<tr><th class="textCenter" colspan="10">Uncertainty Budget Table</th></tr>';
                                echo '<tr>';
                                echo '<td class="textCenter">Uncertainty of Reference Weights</td>';
                                echo '<td class="textCenter">Uncertainty of Reference Weights for Sensitivity Test</td>';
                                echo '<td class="textCenter">Uncertainty due to SD of Sensitivity Test</td>';
                                echo '<td class="textCenter">Uncertainty due to Sensitivity</td>';
                                echo '<td class="textCenter">Uncertainty due to Readability</td>';
                                echo '<td class="textCenter">Uncertainty due to Eccentricity</td>';
                                echo '<td class="textCenter">Uncertainty of Balance</td>';
                                echo '<td class="textCenter">Uncertainty due to Repeatability</td>';
                                echo '<td class="textCenter">Combined Uncertainty</td>';
                                echo '<td class="textCenter">Expanded Uncertainty</td>';
                     

                                echo '</tr>';
                                echo '</thead>';
                                echo '<tbody>';

                                $numRows = 1;
                                while (isset($calculatedDataArray[$tableKey]['row' . ($numRows + 1)])) {
                                    $numRows++;
                                }

                        
                                for ($x = 1; $x <= $numRows; $x++) {
                                    $rowKey = 'row' . $x;
                                    echo '<tr>';

                                    $rowData = $calculatedDataArray[$tableKey]?? [];
                                    echo '<td class="textCenter">' . ($rowData['uncertaintyReferenceWeightCalculated'] ?? '') . '</td>';
                                    echo '<td class="textCenter">' . ($rowData['uncertaintyReferenceWeightsSensitivityTestCalculated'] ?? '') . '</td>';
                                    echo '<td class="textCenter">' . ($rowData['uncertaintySDSensitivityTestCalculated'] ?? '') . '</td>';
                                    echo '<td class="textCenter">' . ($rowData['uncertaintySensitivityCalculated'] ?? '') . '</td>';
                                    echo '<td class="textCenter">' . ($rowData['uncertaintyReadabilityCalculated'] ?? '') . '</td>';
                                    echo '<td class="textCenter">' . ($rowData['uncertaintyEccenticityCalculated'] ?? '') . '</td>';
                                    echo '<td class="textCenter">' . ($rowData['uncertaintyBalanceCalculated'] ?? '') . '</td>';
                                    echo '<td class="textCenter">' . ($rowData['uncertaintyRepeatabilityCalculated'] ?? '') . '</td>';
                                    echo '<td class="textCenter">' . ($rowData['combinedUncertaintyCalculated'] ?? '') . '</td>';
                                    echo '<td class="textCenter">' . ($rowData['expandedUncertaintyCalculated'] ?? '') . '</td>';
                      
                                    echo '</tr>';
                                }

                                echo '</tbody>';
                                echo '</table>';
                }
        ?>
    </div>
     

</body>
</html>