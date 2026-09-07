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
    <style>
         @font-face {
            font-family: "source_sans_proregular";           
            src: local("Calibri"), url("fonts/sourcesans/sourcesanspro-calibri.ttf") format("truetype");
            font-weight: normal;
            font-style: normal;

        }        
        body{
            font-family: "source_sans_proregular", Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;            
        }
        

        @page { margin: 100px 50px; border:0px red solid;}
        header { position: fixed; top: -80px; left: 0px; right: 0px; }
        
        footer { position: fixed; bottom: -100px; left: 0px; right: 0px; height: 50px; }
        .page { page-break-after: always; }
        .page:last-child { page-break-after: never; }


        .table {        
            table-layout: fixed;
            border-collapse: collapse; 
            width: 100%;
            border: 1px solid #000;
            text-align: right;
        }
        .table th, .table td {
            border: 1px solid #000; 
            padding: 2px;
            height: 5px;
            vertical-align: middle;
        }

        .tableTD{
            white-space: nowrap;       /* Prevent text from wrapping */
            overflow: hidden;          /* Hide overflowing content */
            text-overflow: ellipsis;  /* Display ellipsis (...) for long content */
            max-width: 100px;          /* Adjust the maximum width as needed */
            font-size: .75em;           /* Initial font size */
        }

        .textLeft {
            text-align: left;
        }
        .textCenter {
            text-align: center;
        }
        .textRight {
            text-align: right;
        }
        .underlined{
            text-decoration: underline;
        }

   </style>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>RML ++</title>	
    </head>
    <body>
        <header style="">
            <div style="font-size:11pt">
                <div style="line-height: 0.1; border: 0px solid blue">
                    <center><p>Republic of the Philippines</p></center> 
                    <center><h4>DEPARTMENT OF SCIENCE AND TECHNOLOGY</h4></center>
                    <center>CALABARZON</center>
                    <center><h4>Regional Metrology Laboratory</h4></center>
                   <center><p>Calibration Worksheet</p></center>
                </div>

                <table class="table" style="font-weight: bold; border:1px black solid;">
                    <tr>
                        <td class="td textLeft">Certificate No.</td>
                        <td class="td textCenter" style="width: 40%;"><?= $equipmentInfo->certificateNumber?></td>
                        <td class="td textLeft">Date Received</td>
                        <td class="td textCenter" style="width: 15%;"><?= $customerInfo->dateReceived?></td>
                    </tr>
                    <tr>
                        <td class="td textLeft">Customer</td>
                        <td class="td textCenter"><?= $customerInfo->customer?></td>
                        <td class="td textLeft">Date Calibrated</td>
                        <td class="td textCenter"><?= $equipmentInfo->dateCalibrated?></td>
                    </tr>
                    <tr>
                        <td class="td textLeft">Place of Calibration</td>
                        <td class="td textCenter"><?= $equipmentInfo->placeOfCalibration?></td>
                        <td class="td textLeft">Recom. Due Date</td>
                        <td class="td textCenter"><?= $customerInfo->recommendedDueDate?></td>
                    </tr>
                </table>
            </div>
        </header>
        <footer>
            <div style="width:100% ;line-height: 1; font-size:0.6em; border: 0px solid green">
                <table class='table' style='border: 0px'>
                    <thead>
                        <tr>
                            <td style='border: 0px' class="textRight">CP-012-F1 Rev. 0</td>
                        </tr>
                        <tr>
                            <td style='border: 0px' class="textRight">Effectivity Date : 27 Aug 2019</td>
                        </tr>
                    </thead>
                </table>
            </div>
        </footer>
        <main>
            <div class="page" style="position:absolute;top:110;height:auto;border:0px solid red">
                <table class="table" style='margin-bottom:10px'>
                    <tbody style="font-size: .7em;">
                        <tr>
                            <td class='textLeft' style="width: 18%;">Equipment Description</td>
                            <td class='textLeft' colspan="3" style="width: 32%;"><?= $equipmentInfo->equipmentDescription?></td>
                        </tr>
                        <tr>
                            <td class='textLeft'>Manufacturer</td>
                            <td class='textLeft'><?= $equipmentInfo->manufacturer?></td>
                            <td class='textLeft' >Start Temp (°C)</td>
                            <td class='textLeft' ><?= $environmentInfo->tempStart?></td>
                        </tr>
                        <tr>
                            <td class='textLeft'>Model</td>
                            <td class='textLeft'><?= $equipmentInfo->modelNumber?></td>
                            <td class='textLeft'>End Temp (°C)</td>
                            <td class='textLeft'><?= $environmentInfo->tempEnd?></td>
                        </tr>
                        <tr>
                            <td class='textLeft'>Serial No.</td>
                            <td class='textLeft'><?= $equipmentInfo->serialNumber?></td>
                            <td class='textLeft'>Start RH (% RH)</td>
                            <td class='textLeft'><?= $environmentInfo->rhStart?></td>
                        </tr>
                        <tr>
                            <td class='textLeft'>Equipment ID</td>
                            <td class='textLeft'><?= $equipmentInfo->equipmentId?></td>
                            <td class='textLeft'>End RH (% RH)</td>
                            <td class='textLeft'><?= $environmentInfo->rhEnd?></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table" style='margin-bottom:10px;font-size: .75em;'>
                    <thead >
                        <tr>
                            <th><center>Standard</center></th>
                            <th><center>Chamber</center></th>
                        </tr>
                    </thead>
                    <tbody >
                        <tr>
                            <td class='textCenter'>
                                <?php
                                    $string_standard = $WorksheetData['standard'];
                                    $array_standard = explode("(SPLITHERE)", $string_standard);
                                    for ($i=0; $i < count($array_standard); $i++) { 
                                        echo $i == 0 ? $array_standard[$i] : " + ".$array_standard[$i];
                                    }
                                ?>
                            </td>
                            <td class='textCenter'>
                                <?php
                                    $string_chamber = $WorksheetData['chamber'];
                                    $array_chamber = explode("(SPLITHERE)", $string_chamber);
                                    for ($i=0; $i < count($array_chamber); $i++) { 
                                        echo $i == 0 ? $array_chamber[$i] : " + ".$array_chamber[$i];
                                    }
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table" style='margin-bottom:10px'>
                    <thead style="font-size: .75em;">
                        <tr>
                            <th colspan="10"><center>Measurement Data</center></th>
                        </tr>
                    </thead>
                    <?php
                        $countOfTables = countStringInKeys($dataInputs, 'functionTable');
                        for ($i=1; $i <= $countOfTables; $i++) { 
                            
                            $functionKey = "functionTable".$i;
                            $channelNameKey = "channelNameTable".$i;
                            $brandKey = "brandTable".$i;
                            $serialNumberKey = "serialNumberTable".$i;
                            $modelKey = "modelTable".$i;

                            $testPointPattern = "testPointTbodyTable".$i;
                            $countOfRow = countStringInKeys($dataInputs, $testPointPattern);
                    ?>
                    <tbody style="font-size: .7em;">
                        <tr>
                            <td class='textCenter'>Function</td>
                            <td class='textCenter'><?= $dataInputs->$functionKey == 'Temp' ? 'Temperature':'Relative Humidity'?></td>
                            <td class='textCenter'>Channel</td>
                            <td class='textCenter'><?= $dataInputs->$channelNameKey == '' ? 'N/A': $dataInputs->$channelNameKey?></td>
                            <td class='textCenter'>Brand</td>
                            <td class='textCenter'><?= $dataInputs->$brandKey == '' ? 'N/A': $dataInputs->$brandKey?></td>
                            <td class='textCenter'>Serial Number</td>
                            <td class='textCenter'><?= $dataInputs->$serialNumberKey == '' ? 'N/A': $dataInputs->$serialNumberKey?></td>
                            <td class='textCenter'>Model</td>
                            <td class='textCenter'><?= $dataInputs->$modelKey == '' ? 'N/A': $dataInputs->$modelKey?></td>
                        </tr>
                        <tr>
                            <td rowspan='2' class="textCenter">Test Points</td>
                            <td colspan='3' class="textCenter">UUC Reading</td>
                            <td colspan='3' class="textCenter">Standard Reading</td>
                            <td rowspan='2' class="textCenter">Range</td>
                            <td rowspan='2' class="textCenter">Res/Grand'n</td>
                            <td rowspan='2' class="textCenter">Readability</td>
                        </tr>
                        <tr>
                            <td class="textCenter">Trial 1</td>
                            <td class="textCenter">Trial 2</td>
                            <td class="textCenter">Trial 3</td>
                            <td class="textCenter">Trial 1</td>
                            <td class="textCenter">Trial 2</td>
                            <td class="textCenter">Trial 3</td> 
                        </tr>
                        <?php
                            for ($x=1; $x <= $countOfRow; $x++) { 
                                $testPointTbodyKey = 'testPointTbodyTable'.$i.'Row'.$x;
                                $UUCtrial1TbodyKey = 'UUCtrial1TbodyTable'.$i.'Row'.$x;
                                $UUCtrial2TbodyKey = 'UUCtrial2TbodyTable'.$i.'Row'.$x;
                                $UUCtrial3TbodyKey = 'UUCtrial3TbodyTable'.$i.'Row'.$x;
                                $standardTrial1TbodyKey = 'standardTrial1TbodyTable'.$i.'Row'.$x;
                                $standardTrial2TbodyKey = 'standardTrial2TbodyTable'.$i.'Row'.$x;
                                $standardTrial3TbodyKey = 'standardTrial3TbodyTable'.$i.'Row'.$x;
                                $rangeTbodyKey = 'rangeTbodyTable'.$i.'Row'.$x;
                                $resolutionTbodyKey = 'resolutionTbodyTable'.$i.'Row'.$x;
                                $readabilityTbodyKey = 'readabilityTbodyTable'.$i.'Row'.$x;
                        ?>
                        <tr>
                            <td class="textCenter"><?= $dataInputs->$testPointTbodyKey?></td>
                            <td class="textCenter"><?= $dataInputs->$UUCtrial1TbodyKey?></td>
                            <td class="textCenter"><?= $dataInputs->$UUCtrial2TbodyKey?></td>
                            <td class="textCenter"><?= $dataInputs->$UUCtrial3TbodyKey?></td>
                            <td class="textCenter"><?= $dataInputs->$standardTrial1TbodyKey?></td>
                            <td class="textCenter"><?= $dataInputs->$standardTrial2TbodyKey?></td>
                            <td class="textCenter"><?= $dataInputs->$standardTrial3TbodyKey?></td>
                            <td class="textCenter"><?= $dataInputs->$rangeTbodyKey?></td>
                            <td class="textCenter"><?= $dataInputs->$resolutionTbodyKey?></td>
                            <td class="textCenter"><?= $dataInputs->$readabilityTbodyKey?></td>
                        </tr>
                        <?php
                            }
                        ?>
                        <tr>
                            <td colspan='10'></td>
                        </tr>
                    </tbody>
                    <?php 
                        }
                    ?>
                </table>
            </div>
            <div class="page" style="position:absolute;top:110;height:auto;border:0px solid red">
                <table class="table" style='margin-bottom:10px; '>
                    <thead>
                        <tr>
                            <th colspan='14'>
                                Uncertainty Budget
                            </th>
                        </tr>
                        
                    </thead>
                    <?php
                        foreach($calculatedData as $key => $value) {
                            $unit =  $value->functionType =='Temp'?'°C':'%RH';
                    ?>
                    <tbody >
                        <tr style='font-size: .7em;'>
                          <td class="textCenter" colspan='1'>Channel</td>
                          <td class="textCenter" colspan='2'><?= $value->channelName == '' ? 'N/A': $value->channelName?></td>
                          <td class="textCenter" colspan='1'>Brand</td>
                          <td class="textCenter" colspan='2'><?= $value->brand == '' ? 'N/A': $value->brand?></td>
                          <td class="textCenter" colspan='2'>Serial Number</td>
                          <td class="textCenter" colspan='2'><?= $value->serialNumber == '' ? 'N/A': $value->serialNumber?></td>
                          <td class="textCenter" colspan='2'>Model</td>
                          <td class="textCenter" colspan='2'><?= $value->modelName == '' ? 'N/A': $value->modelName?></td>
                        </tr>
                        <tr style="font-size: .7em;">
                            <td class="textCenter">Test Point</td>
							<td class="textCenter">u<sub>std</sub></td>
							<td class="textCenter">u<sub>std_rep</sub></td>
							<td class="textCenter">u<sub>drift</sub></td>
							<td class="textCenter">u<sub>std_res</sub></td>
							<td class="textCenter">u<sub style="font-size: .6em;">uuc_res</sub></td>
							<td class="textCenter">u<sub style="font-size: .6em;">uuc_rep</sub></td>
							<td class="textCenter">u<sub style="font-size: .6em;">uuc_hyst</sub></td>
							<td class="textCenter">u<sub style="font-size: .6em;">uniformity</sub></td>
							<td class="textCenter">u<sub style="font-size: .6em;">instability</sub></td>
							<td class="textCenter">u<sub>c</sub></td>
							<td class="textCenter">k</td>
							<td class="textCenter">U</td>
							<td class="textCenter">Unit</td>
                        </tr>
                        <?php
                            $calculated = $value->caluculated;
                            foreach($calculated as $calculatedKey => $calculatedValue){
                                $testPoint = $value->inputs->$calculatedKey->testPoint;
                        ?>
                        <tr style="font-size: .6em;">
                            <td class="textCenter"><?= number_format($testPoint, 5)?></td>
                            <td class="textCenter"><?= number_format($calculatedValue->UncStandardPRT, 5)?></td>
                            <td class="textCenter"><?= number_format($calculatedValue->UncStandardRepeatability, 5)?></td>
                            <td class="textCenter"><?= number_format($calculatedValue->UncDrift, 5)?></td>
                            <td class="textCenter"><?= number_format($calculatedValue->UncSTDResolution, 5)?></td>
                            <td class="textCenter"><?= number_format($calculatedValue->UncUUCResolution, 5)?></td>
                            <td class="textCenter"><?= number_format($calculatedValue->UncUUCRepeatability, 5)?></td>
                            <td class="textCenter"><?= number_format($calculatedValue->hysteresis, 5)?></td>
                            <td class="textCenter"><?= number_format($calculatedValue->UncChamberUniformity, 5)?></td>
                            <td class="textCenter"><?= number_format($calculatedValue->UncChamberInstability, 5)?></td>
                            <td class="textCenter"><?= number_format($calculatedValue->combinedUncertainty, 5)?></td>
                            <td class="textCenter"><?= number_format($calculatedValue->k, 5)?></td>
                            <td class="textCenter"><?= number_format($calculatedValue->expandedUncertainty, 5)?></td>
                            <td class="textCenter"><?= $unit?></td>
                        </tr>
                        <?php
                            }
                        ?>
                        <tr>
                            <td colspan='14'></td>
                        </tr>
                    </tbody>
                    <?php
                            
                        }
                    ?>
                </table>
            </div>
        </main>
    </body>
</html>   