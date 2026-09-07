<?php 
ini_set('memory_limit', '1024M'); // or you could use 1G

    $path = 'image/dost smaller.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    $pathPAB = 'image/pab logo.png';
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

    
    $customerData = json_decode($dataFromDB['customerInfo']);   
    $environmentData = json_decode($dataFromDB['environmentInfo']);   
    $specificationsData = json_decode($dataFromDB['equipmentInfo']);
    $dataInputs = json_decode($dataFromDB['dataInputs']);
    $calculatedData = json_decode($dataFromDB['calculatedData']);

    $date = $customerData->dateReceived; 
    $mysql_date = date('Y-m-d G:i:s', strtotime($date));
    $date2 = $specificationsData->dateCalibrated;
    $mysql_date2 = date('Y-m-d G:i:s', strtotime($date2));
    $date3 = $customerData->recommendedDueDate; 
    $mysql_date3 = date('Y-m-d G:i:s', strtotime($date3));

    $dateCal =  '<td style="font-size:9.5pt">Date Calibrated</td><td style="font-size:9.5pt; padding-right: 5px;">:</td><td style="font-size:9.5pt">'.date('d F Y', strtotime($mysql_date2)).'</td>';
    $dueDate =  '<td style="font-size:9.5pt">Recommended Due Date</td><td style="font-size:9.5pt">:</td><td style="font-size:9.5pt">'.date('d F Y', strtotime($mysql_date3)).'</td>';
    $placeOfCali =  '<td style="font-size:9.5pt">Place of Calibration</td><td style="font-size:9.5pt">:</td><td style="font-size:9.5pt">'.$specificationsData->placeOfCalibration.'</td>';
    $ambTemp =  '<td style="font-size:9.5pt">Ambient Temperature</td><td style="font-size:9.5pt">:</td><td style="font-size:9.5pt">'.$environmentData->tempStart.'-'.$environmentData->tempEnd.'</td>';
    $ambhum =  '<td style="font-size:9.5pt">Relative Humidity</td><td style="font-size:9.5pt">:</td><td style="font-size:9.5pt">'.$environmentData->rhStart.'-'.$environmentData->rhEnd.'</td>';

    $rightSideArray = [$dateCal, $dueDate, $placeOfCali, $ambTemp, $ambhum];


?>


<!DOCTYPE html>
<html lang="en">
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

       

        @font-face {
            font-family: "source_sans_proregular";           
            src: local("Calibri"), url("fonts/sourcesans/sourcesanspro-calibri.ttf") format("truetype");
            font-weight: normal;
            font-style: normal;

        }        
        body{
            font-family: "source_sans_proregular", Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;     
            top:10px;
            position: fixed;
            width: 90%;
        }
        .infoTable{
            border-spacing: 0px;
            font-size:9.5pt;
        }
        .infoTable tbody tr td{
            white-space:nowrap;
        }

        .ul {
            padding-top: 8px;
            padding-left: 0px;
            margin: 0;
            list-style: none;
            display: block;
            font-size:9.5pt;
            line-height:0.4;

        }

        .li {
            width: 46%;
            display: inline-block;
            vertical-align: top;
            margin-bottom: 4px;
        }

        .liLeft {
            margin-left: 3%;
        }

        .item {
            margin-bottom: 10px;
        }

        .item .between,
        .item .label,
        .item .label i,
        .item .text {
            display: inline-block;
            vertical-align: top;
        }

        .item .label, 
        .item .label i {
            width: 45%;
            display: inline-block;
            white-space: nowrap;
            margin-right:4%;
        }

        .item .between {
            width: 5%;
            padding: 0;
            margin: 0;
        }

        .item .text {
            width: 55%;
            padding: 0;
            margin: 0;
        }

        @page { margin: 100px 50px; border:1px red solid;}
        header { position: fixed; top: -80px; left: 0px; right: 0px; }
        
        footer { position: fixed; bottom: -30px; left: 0px; right: 0px; height: 50px; }
        .page { page-break-after: always; }
        .page:last-child { page-break-after: never; }


   </style>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RML ++</title>	
</head>

<?php
    use App\Models\ThermoStandard;
    use App\Models\ThermoStandardAddTestPointsModel;
    
    $rml2 = new ThermoStandard();
    $arrayOfWeights = $dataFromDB['standard'];
    $pieces = explode(",", $arrayOfWeights);
	$arr2[] = $rml2->whereIn('serialNumber', $pieces)->findAll(); 	
    $rml3 = new ThermoStandardAddTestPointsModel();
	$arr3[] = $rml3->whereIn('serialNumber', $pieces)->first();	

    function TrimTrailingZeroes($nbr) {
        return strpos($nbr,'.')!==false ? rtrim(rtrim($nbr,'0'),'.') : $nbr;
    } ;

    //$readabilityDecimalPoint = strlen(substr(strrchr(TrimTrailingZeroes($thermoData['readability']), "."), 1));
    
    function sigFig($value, $digits){
        if ($value == 0) {
            $decimalPlaces = $digits - 1;
        } elseif ($value < 0) {
            $decimalPlaces = $digits - floor(log10($value * -1)) - 1;
        } else {
            $decimalPlaces = $digits - floor(log10($value)) - 1;
        }
        if(floor(log10($value)) !== floor(log10(round($value, $decimalPlaces)))) {
            $decimalPlaces--;
        }
        $answer = ($decimalPlaces > 0) ?
            number_format($value, $decimalPlaces) : round($value, $decimalPlaces);
        return $answer;
    }
    

    function roundTo($value, $digits){  
        $decimalPoint = strlen(substr(strrchr(TrimTrailingZeroes($value), "."), 1));
        if($decimalPoint == 0){
            $answer = number_format((float)TrimTrailingZeroes($value), $digits, '.', ''); 
            return $answer;
        }else{
            $answer = round($value, $digits);
            return $answer;
        }
    }
    function seeDecimal($value){
        if ((int)$value === $value){
            return 0;
        }
        else if (! is_numeric($value)){
            return false;
        }

        return strlen(substr(strrchr($value, "."), 1));
    }

    function getCountOfInOut($calculatedData){
        $count = 0;
        $matchingValues = array();
        foreach ($calculatedData as $key => $value) {
            if (strpos($key, $pattern) === 0) {
                $matchingValues[$key] = $value;
            }
        }
        return $matchingValues;
    }

    $arrayFunction = getCountOfInOut($calculatedData);

    function contains($str, array $arr){
        $var = false;
        for ($x=0; $x < count($arr); $x++) { 
            if (str_contains($arr[$x], $str)) { 
                $var = true;
            }
        }
        return $var;
    }

    $bySerialNumber = new stdClass();
    $keys = array_keys((array)$datas);
    foreach ($keys as $keyOfDatas) {
        $allData = $datas->$keyOfDatas;
        $serialNumber = $allData->serialNumber;
        if(!property_exists($bySerialNumber, $serialNumber)){     
            $temp = new stdClass();
            $temp->$keyOfDatas = $allData;
            $bySerialNumber = (array)$bySerialNumber;
            $bySerialNumber[$serialNumber] = $temp;
            $bySerialNumber = (object)$bySerialNumber;
        }
        else{
            $bySerialNumber->$serialNumber->$keyOfDatas = $allData;
        }
        
    }
    $haveTemp = contains("Temp", $keys);
    $haveRh = contains("Rh", $keys);
    function addingReso($thermoData, $arrayFunction){
        $leftSideArray = [];
        $manu = '<span class="label">Manufacturer</span><span class="between">: </span><p class="text">'.$thermoData->manufacturer.'</p>';
        $model = '<span class="label">Model No.</span><span class="between">: </span><p class="text">'.$thermoData->modelNumber.'</p>';
        $seri = '<span class="label">Serial No.</span><span class="between">: </span><p class="text">'.$thermoData->serialNumber.'</p>';
        $equipID = '<span class="label">Equipment ID</span><span class="between">: </span><p class="text">'.$thermoData->equipmentId.'</p>';

        var_dump($arrayFunction);
        $typeOfEquipment = $thermoData->typeOfEquipment;


        $IN = '';
        $INRH = '';

        $tempInTrue = false;
        $tempOutTrue = false;
        $RhinTrue = false;
        $RhOutTrue= false;
        $displayType;

        if($typeOfEquipment=='analog'){
            $displayType = 'Graduation';
        }else{
            $displayType = 'Resolution';
        }


        // if(count($DATAtempoOut)!=0){
        //     $IN = ' IN';
        // }
        // if(count($DATARHOut)!=0){
        //     $INRH = ' IN';
        // }

        // if(count($DATAtempIn)!=0){
        //     $tempInTrue = true;
        //     $resoTempIn =  "<td style='white-space:wrap;font-size:9.5pt;' width='100'>".$displayType." <i style='font-size:8pt;'>(temperature)".$IN."</i></td><td style='font-size:9.5pt;padding-left: 55px;'>:</td><td style='font-size:9.5pt; padding-left: 5px;'>".$DATAtempIn[0]['resUsed']." °C</td>";
        //     array_push($leftSideArray,$resoTempIn);
        // }
        // if(count($DATAtempoOut)!=0){
        //     $tempOutTrue = true;
        //     $resoTempOut = "<td style='white-space:wrap;font-size:9.5pt;'width='120'>".$displayType." <i style='font-size:8pt;'>(temperature OUT)</i></td><td style='font-size:9.5pt; padding-left: 55px;'>:</td><td style='font-size:9.5pt; padding-left: 5px;'>".$DATAtempoOut[0]['resUsed']." °C</td>";
        //     array_push($leftSideArray,$resoTempOut);
        // }
        // if(count($DATARHIn)!=0){
        //     $RhinTrue = true;
        //     $resoRhIn =    "<td style='white-space:wrap;font-size:9.5pt;'>".$displayType." <i style='font-size:8pt;'>(humidity)".$INRH."</i></td><td style='font-size:9.5pt; padding-left: 55px;'>:</td><td style='font-size:9.5pt; padding-left: 5px;'>".$DATARHIn[0]['resUsed']." % RH</td>";
        //     array_push($leftSideArray,$resoRhIn);
        // }
        // if(count($DATARHOut)!=0){
        //     $RhOutTrue = true;
        //     $resoRhIn =    "<td style='white-space:wrap;font-size:9.5pt;'>".$displayType." <i style='font-size:8pt;'>(humidity OUT)</i></td><td style='font-size:9.5pt; padding-left: 55px;'>:</td><td style='font-size:9.5pt; padding-left: 5px;'>".$DATARHOut[0]['resUsed']." % RH</td>";
        //     array_push($leftSideArray,$resoRhIn);
        // }

        // array_push($leftSideArray,$manu);
        // array_push($leftSideArray,$model);
        // array_push($leftSideArray,$seri);
        // array_push($leftSideArray,$equipID);
        return $leftSideArray;
    }
    $leftSideArray = addingReso($specificationsData, $arrayFunction); 

?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@3.4.1/dist/chart.min.js "></script> 

<body>
<header style="line-height: 0;">
        <img src="<?php echo $base64; ?>" alt="DOST LOGO" height='80px' style="position: absolute; top:0" > 
        <p style="position: absolute; top:0; left:80; font-size: 13px;">Republic of the Philippines</p>
        <p style="position: absolute; top:14; left:80; font-size: 13px; color:blue">DEPARTMENT OF SCIENCE AND TECHNOLOGY</p>
        <p style="position: absolute; top:30; left:80; font-size: 13px;">CALABARZON</p>
        <p style="position: absolute; top:44; left:80; font-size: 15px; font-weight:bold">Regional Metrology Laboratory</p>
        <?php 
            foreach ($bySerialNumber as $functionChannel) {
                foreach($functionChannel as $values){
                    $countForRows = 1;
                    $rowCount = count(array_keys((array)$values->inputs));
                    foreach($values->inputs as $rowName => $rows){
                        if($countForRows == 1){
                            $rowWithCount = 'Row'.$rowCount;
                            $uncertaintyCountOfDecimal = seeDecimal(sigFig($values->caluculated->$rowWithCount->expandedUncertainty,2));
                            $uncertainty = sigFig($values->caluculated->$rowWithCount->expandedUncertainty,2);
                            $uucReadability = seeDecimal($values->inputs->$rowWithCount->resolution);
                            $standardReadability = seeDecimal($values->inputs->$rowWithCount->standardResolution);
                            $standardReading = number_format(floatval(round(floatval($values->inputs->$rowWithCount->correctedValue),$uncertaintyCountOfDecimal)),$standardReadability,'.','');
                            $uucReading = number_format(round($values->inputs->$rowWithCount->uucAverage,$uncertaintyCountOfDecimal),$uucReadability,'.','');
                            $correction = floatval($standardReading) - floatval($uucReading);
                            $correctionWithFormat = number_format($correction,$uucReadability,'.','');
                            $uucTestpoint = floatval($values->inputs->$rowWithCount->testPoint);
                            $functionType = $values->functionType;
                            $reso = $values->inputs->$rowWithCount->resolution;
                        }elseif($countForRows == $rowCount){
                            break;
                        }else{
                            $uncertaintyCountOfDecimal = seeDecimal(sigFig($values->caluculated->$rowName->expandedUncertainty,2));
                            $uncertainty = sigFig($values->caluculated->$rowName->expandedUncertainty,2);
                            $uucReadability = seeDecimal($rows->resolution);
                            $standardReadability = seeDecimal($rows->standardResolution);
                            $standardReading = number_format(floatval(round(floatval($rows->correctedValue),$uncertaintyCountOfDecimal)),$standardReadability,'.','');
                            $uucReading = number_format(round($rows->uucAverage,$uncertaintyCountOfDecimal),$uucReadability,'.','');
                            $correction = floatval($standardReading) - floatval($uucReading);
                            $correctionWithFormat = number_format($correction,$uncertaintyCountOfDecimal,'.','');
                            $uucTestpoint = floatval($values->inputs->$rowName->testPoint);
                            $functionType = $values->functionType;
                            $reso = $rows->resolution;
                        }
                        $italic = isItalic($reso, $uucTestpoint, $functionType); 
                        if($italic){
                            echo " <img src='". $base64PAB."' alt='PAB LOGO' height='80px' style='position: absolute; top:0; left:425'>";
                            break;
                        }   
                    }
                }
            }
        ?>
       
        <div style="position: absolute; top:60;">
            <hr>
        </div>
        <div style="position: absolute; top:62;">
            <hr>
        </div>
        <div class='' style="position:absolute;top:90; left:27%">
            <p style='font-weight:bold;font-size:19pt'>CALIBRATION CERTIFICATE</p>
        </div>

        <div style="position:absolute;top:120;line-height: 1;">
            <table>
                <tr >
                    <td style="white-space:nowrap;font-size:9.5pt">Calibration Certificate No.</td>
                    <td style="font-size:9.5pt; padding-left: 15px;">:</td>
                    <td colspan="4" style="font-size:9.5pt; padding-left: 5px;"><b><?php echo $thermoData['certificateNumber']?></b></td>
                </tr>
                <tr >
                    <td style="font-size:9.5pt">Customer</td>
                    <td style="font-size:9.5pt;  padding-left: 15px;">:</td>
                    <td colspan="4" style="font-size:9.5pt; padding-left: 5px;"><b><?php echo $thermoData['customer']?></b></td>
                </tr>
                <tr valign='top'>
                    <td style="font-size:9.5pt">Address</td>
                    <td style="font-size:9.5pt;  padding-left: 15px;">:</td>
                    <td colspan="4" style="font-size:9.5pt; padding-left: 5px;"><b><?php echo $thermoData['address']?></b></td>
                </tr>
            </table>
        </div>
        
            
    </header>
    <footer>
        <div style="position: absolute; top:0; left:8.5%; font-size:8pt;">
            <p style='position: absolute; top:0; font-style: italic;'>This Certificate shall not be reproduced in any form, except in full, without the written approval of the DOST CALABARZON RML</p>
        </div>
        <div style="position: absolute; top:12; font-size:9.5pt;">
            <p style='position: absolute; top:0; '>Date of Issue: 
            <?php 
                if($thermoData['dateOfIssue'] != ''){
                    $date=date_create($thermoData['dateOfIssue']);
                    echo date_format($date,"d F Y");
                }else{
                    date_default_timezone_set('Asia/Manila');
                    $today = date("d F Y");  
                    echo $today;
                }
             ?>
            </p>
        </div>
        <div style='position: absolute; top:38;width:100%;border-width:1;border:solid;'></div>
        <div style="position: absolute; top:34.5; left:33%; font-size:8;">
            <p style='position: absolute; font-style: italic;'>A joint program with the Laguna State Polytechnic University</p>
        </div>
        <div style='position: absolute; top:55; width:100%; border-width:1; border:solid;'></div>
        <div style="position: absolute; top:53; left:25%; font-size:7;">
            <p style='position: absolute;'>RML Bldg., DOST CALABARZON Complex, Jamboree Road, Timugan, Los Baños, Laguna 4030</p>
        </div>
        <div style="position: absolute; top:65;font-size:7;">
            <?php use App\Models\About;
            $model = new About();
            $about = $model->findAll();
                foreach($about as $row) :
            ?>
            <table width="80%" style=" font-size:7;top: 20%; border: none; position: absolute; margin-left: auto; margin-right: auto;">
                <tr valign='top'>
                    <td style="text-align: left; width: 25%;">Telefax Nos.: <?= $row['tel'];?></td>
                    <td style="text-align: center; width: 45%;">Email address: <?= $row['email'];?></td>
                    <td style="text-align: right; width: 25%;">URL: <?= $row['url'];?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    
    </footer>
    <main>
        <div class="page">
           
            <?php 
                if($thermoData['completion'] != 'For printing'||$imageDraft == 'true'){
                    echo " 
                    <div style='z-index: 999; position:absolute; top: 150px; margin-left: 40px;'>
                    <img src='". $base64."'  style='margin-left: -40px; height: 700px; opacity: 0.1; position: absolute;'>
                    <img src='". $base64IllusDraft."'  style='background-size: 100% 100%; opacity: 0.5; position: absolute;'>
                    </div>";
                }
            ?> 
            <div style="position:absolute;top:120;height:auto;border:0px solid red">
                <div class='' style="position:relative;height:auto;">
                    <ul class='ul'>
                        <li class='li'>
                            <div class="item">
                                <span class="label">Equipment</span><span class="between">: </span><p class="text"><?php echo $thermoData['equipmentDescription']?></p>
                            </div>
                            <?php
                                for ($i=0; $i < count($leftSideArray); $i++) { 
                                    echo '<div class="item">'.$leftSideArray[$i].'</div>';
                                }
                            ?>
                            
                        <li class="li liLeft">
                            <div class="item">
                                <span class="label">Date Received</span><span class="between">: </span><p class="text"><?php echo date('d F Y', strtotime($mysql_date));?></p>
                            </div>
                            <?php
                                for ($i=0; $i < count($rightSideArray); $i++) { 
                                    echo '<div class="item">'.$rightSideArray[$i].'</div>';
                                }
                            ?>
                            
                    </ul>
                </div>
                <div class="" style="position: relative;font-size:9.5pt;">
                    <p style='font-weight:bold;text-decoration: underline;'>Calibration Procedure and Traceability</p>
                    <p style='margin-top:-10;'>
                        <?php
                            if($thermoData['settingCalibrationProcedureAndTraceability'] != null){
                                echo $thermoData['settingCalibrationProcedureAndTraceability'];
                            }else{
                                echo  $placeholder[0]['module2CalibrationProcedureAndTraceability'];
                            }
                        ?>

                    </p>
                </div>
                <div class="" style="position: relative; font-size:9.5pt;left:6%;">
                    <table style="border: 0px solid black; min-width: 95%; text-align: center;line-height: 0.9;">
                        <tbody style="">
                            <tr>
                                <th width="33%" align="left">
                                    <u style='font-size:9.5pt;font-weight:none;text-align:left;'>Standard Used</u>
                                </th>
                                <th width="33%">
                                    <u style='font-size:9.5pt;font-weight:none;'>Certificate No.</u>
                                </th>
                                <th width="33%"> 
                                    <u style='font-size:9.5pt;font-weight:none;'>Issuing Laboratory</u>
                                </th>
                            </tr>
                                <?php
                                    $classString = $arr2[0]; 
                                    for($i = 0; $i < count($arr2[0]);$i++){
                                        echo "  <tr><td  valign='top' style='margin-top: -8px;text-align: left;font-size:9.5pt;'><p style='margin: 0;'>".$classString[$i]['standardUsed']."</p></td>";
                                        echo "<td  valign='top' style='margin-top: -8px;font-size:9.5pt'><p style='margin:0;'>". $classString[$i]['certificateNumber']. " <br></p></td>";
                                        echo "<td  valign='top' style='margin-top: -8px;font-size:9.5pt'><p style='margin:0;'>". $classString[$i]['issuingLab']. " <br></p></td></tr>";
                                    }
                                ?>
                        </tbody>
                    </table>
                </div>
                <div class="" style="position: relative;font-size:9.5pt;height:auto;border:0px blue dotted;">
                    <p style='font-weight:bold;text-decoration: underline;font-size:9.5pt;top:2;'>Calibration Results</p>
                    <p style='max-width:95%;font-size:9.5pt;margin-top:-10;'><?=$thermoData['settingCalibrationResults']?>

                        <?php
                            if($thermoData['settingCalibrationResults'] != null){
                                echo $thermoData['settingCalibrationResults'];
                            }else{
                                echo  $placeholder[0]['module2CalibrationResults'];
                            }
                        ?>

                    </p>

                </div>
                <div class="" style="position: relative; font-size:9.5pt;height:auto;border:0px green dotted;margin-top:-1%;">
                    <p style='font-weight:bold;text-decoration: underline;font-size:9.5pt;top:2;'>Uncertainty of Measurement</p>
                    <p style='max-width:95%;font-size:9.5pt;margin-top:-10;'>
                        <?php
                            if($thermoData['settingUncertaintyOfMeasurement'] != null){
                                echo $thermoData['settingUncertaintyOfMeasurement'];
                            }else{
                                echo  $placeholder[0]['module2UncertaintyOfMeasurement'];
                            }
                        ?>
                    </p>

                </div>
                <div class="" style="position: relative;font-size:9.5pt;height:auto; border:0px black dotted;margin-top:-1%;">
                    <p style='font-weight:bold;text-decoration: underline;margin-top:5;'>Remarks:</p> <br>
                    <table style="border: 0px; width: 90%; font-size:9.5pt;margin-top:-15;">
                        <tbody>
                            <?php
                                $remarks;
                                if($thermoData['settingRemarks1'] != null){
                                    $remarks = $thermoData['settingRemarks1'];
                                }else{
                                    $remarks = $placeholder['module2Remarks'];
                                } 
                                $remarksSeparated = explode("(splitHere)", $remarks);
                                for ($i=0; $i < count($remarksSeparated); $i++) { 
                                    echo "<tr valign='top' style='font-size:9.5pt;'><td>".($i+1).". "."</td><td>".$remarksSeparated[$i]."</td></tr>";
                                }
                            ?>
                        </tbody>
                    </table> 
                </div>
            </div>
           
            
            <div style="position: absolute; top:635; left:6%; font-size:9.5pt;">
                <p style='position: absolute; top:0;text-decoration: underline;font-size:9.5pt;'> <?php echo $thermoData['calibrationOfficer'];?></p>
                <p style='position: absolute; top:15;font-size:9.5pt;'>Calibration Officer</p>
            </div>
            <div style="position: absolute; top:635; left:70%; font-size:9.5pt;">
                <p style='position: absolute; top:0;text-decoration: underline;font-size:9.5pt;'><?php echo $thermoData['checkedBy'];?></p>
                <p style='position: absolute; top:15;font-size:9.5pt;'><?php echo $thermoData['verifierPosition'];?></p>
            </div>

            <div style="position: absolute; top:682; right:10%; font-size:9.5pt;">
                <p style='position: absolute; top:0;font-size:9.5pt;'>1 of <?=(count(array_keys((array)$bySerialNumber))+1)?></p>
            </div>
              
        </div>
      
        <?php  
            $serialNumberCount = count(array_keys((array)$bySerialNumber));
            $display = $serialNumberCount>1?'':'display:none';
            $customDecimalPlaceObject = json_decode($thermoData['customDecimalPlace']);
            //var_dump($customDecimalPlaceObject);
            $pageNumber = 2;
            foreach ($bySerialNumber as $functionChannel) {
        ?>
            <div class="page" style="border:0px green dotted; max-height:90%; font-size:9.5pt">
                <?php 
                    if($thermoData['completion'] != 'For printing'||$imageDraft == 'true'){
                        echo " 
                        <div style='z-index: 999; position:absolute; top: 150px; margin-left: 40px;'>
                        <img src='". $base64."'  style='margin-left: -40px; height: 700px; opacity: 0.1; position: absolute;'>
                        <img src='". $base64IllusDraft."'  style='background-size: 100% 100%; opacity: 0.5; position: absolute;'>
                        </div>";
                    }
                ?> 
                <div class="measureThis" style="position: absolute;top:120">
                    <p><b>Calibration Results</b></p>
                    <?php
                        $counterForfunctionChannel = 0;
                        foreach($functionChannel as $values){
                            
                            $customUUCReadingID = 'uucCustomReading'.$values->functionType."".$values->channelName;
                            $customCorrectionID = 'correctionCustom'.$values->functionType."".$values->channelName;
                            
                            if($customDecimalPlaceObject != NULL){
                                $customCorrectionDecimal = $customDecimalPlaceObject->$customCorrectionID;
                                $customUUCDecimal = $customDecimalPlaceObject->$customUUCReadingID;
                            }
                            //var_dump($customDecimalPlaceObject->$customCorrectionID);
                            //{"uucCustomReadingTempIn":"1","correctionCustomTempIn":"1","uucCustomReadingRhIn":"3","correctionCustomRhIn":"3"}
                            
                            if($counterForfunctionChannel == 0){
                    ?>
                                <div style="line-height:0.2;<?=$display?>">
                                    <p><?=$values->channelName;?></p>
                                    <p>Brand: <?=$values->brand;?></p>
                                    <p>Serial Number: <?=$values->serialNumber;?></p>
                                    <p>Model: <?=$values->modelName;?></p>
                                </div>
                    <?php
                            }
                            $counterForfunctionChannel++;
                            //$functionDisplay = $values->functionType == 'Temp'?'Temperature':'Humidity';
                            //$functionDisplay = $values->channelName;

                            if($values->channelName == ''){
                                $functionDisplay = $values->functionType == 'Temp'?'Temperature':'Humidity';
                            }else{
                                $functionDisplay = $values->channelName;
                            }
                            $humidityStandardReading = $values->functionType == 'Rh'?'Standard Reading at 23°C':'Standard Reading';
                    ?>
                            <div style="position: relative; left:3%; max-width:90%; border:0px green dotted;">
                                <p style="text-decoration:underline"><?=$functionDisplay;?> Indicator Test</p>
                                <div style="position: relative; max-width:100%; border:0px blue dotted;">
                                    <table width="100%" style="text-align:center">
                                        <thead>
                                            <tr>
                                                <td colspan='2'><?= $humidityStandardReading;?></td>
                                                <td colspan='2'>UUC Reading</td>
                                                <td colspan='2'>Correction</td>
                                                <td colspan='2'>Uncertainty</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $countForRows = 1;
                                                $rowCount = count(array_keys((array)$values->inputs));
                                                
                                                foreach($values->inputs as $rowName => $rows){
                                                    if($countForRows == 1){
                                                        $rowWithCount = 'Row'.$rowCount;
                                                        $uncertaintyCountOfDecimal = seeDecimal(sigFig($values->caluculated->$rowWithCount->expandedUncertainty,2));
                                                        $uncertainty = sigFig($values->caluculated->$rowWithCount->expandedUncertainty,2);
                                                        $uucReadability = seeDecimal($values->inputs->$rowWithCount->resolution);
                                                        $standardReadability = seeDecimal($values->inputs->$rowWithCount->standardResolution);
                                                        $standardReading = number_format(floatval(round(floatval($values->inputs->$rowWithCount->correctedValue),$uncertaintyCountOfDecimal)),$standardReadability,'.','');
                                                        // $uucReading = number_format(round($values->inputs->$rowWithCount->uucAverage,$uncertaintyCountOfDecimal),$uucReadability,'.','');
                                                        // $correction = floatval($standardReading) - floatval($uucReading);
                                                        // $correctionWithFormat = number_format($correction,$uncertaintyCountOfDecimal,'.','');
                                                        //var_dump(' UUC Reading '.$rows->uucAverage,$uncertaintyCountOfDecimal);
                                                        //var_dump(' Standard Reading '.$standardReading);
                                                        if($customDecimalPlaceObject != NULL){
                                                            $uucReading = number_format(round($values->inputs->$rowWithCount->uucAverage,$customUUCDecimal),$customUUCDecimal,'.','');
                                                            $correction = floatval($standardReading) - floatval($uucReading);    
                                                            $correctionWithFormat = number_format($correction,$customCorrectionDecimal,'.','');
                                                        }else{
                                                            $uucReading = number_format(round($values->inputs->$rowWithCount->uucAverage,$uncertaintyCountOfDecimal),$uucReadability,'.','');
                                                            $correction = floatval($standardReading) - floatval($uucReading);    
                                                            $correctionWithFormat = number_format($correction,$uncertaintyCountOfDecimal,'.','');
                                                        }
                                                        $uucTestpoint = floatval($values->inputs->$rowWithCount->testPoint);
                                                        $functionType = $values->functionType;
                                                        $reso = $values->inputs->$rowWithCount->resolution;
                                                    }elseif($countForRows == $rowCount){
                                                        break;
                                                    }else{
                                                        $uncertaintyCountOfDecimal = seeDecimal(sigFig($values->caluculated->$rowName->expandedUncertainty,2));
                                                        $uncertainty = sigFig($values->caluculated->$rowName->expandedUncertainty,2);
                                                        $uucReadability = seeDecimal($rows->resolution);
                                                        $standardReadability = seeDecimal($rows->standardResolution);
                                                        $standardReading = number_format(floatval(round(floatval($rows->correctedValue),$uncertaintyCountOfDecimal)),$standardReadability,'.','');
                                                        // $uucReading = number_format(round($rows->uucAverage,$uncertaintyCountOfDecimal),$uucReadability,'.','');
                                                        // $correction = floatval($standardReading) - floatval($uucReading);
                                                        // $correctionWithFormat = number_format($correction,$uncertaintyCountOfDecimal,'.','');
                                                        //var_dump(' UUC Reading '.$rows->uucAverage,$uncertaintyCountOfDecimal);
                                                        //var_dump(' Standard Reading '.$standardReading);
                                                        if($customDecimalPlaceObject != NULL){
                                                            $uucReading = number_format(round($rows->uucAverage,$customUUCDecimal),$customUUCDecimal,'.','');
                                                            $correction = floatval($standardReading) - floatval($uucReading);    
                                                            $correctionWithFormat = number_format($correction,$customCorrectionDecimal,'.','');
                                                        }else{
                                                            $uucReading = number_format(round($rows->uucAverage,$uncertaintyCountOfDecimal),$uucReadability,'.','');
                                                            $correction = floatval($standardReading) - floatval($uucReading);    
                                                            $correctionWithFormat = number_format($correction,$uncertaintyCountOfDecimal,'.','');
                                                        }
                                                        $uucTestpoint = floatval($values->inputs->$rowName->testPoint);
                                                        $functionType = $values->functionType;
                                                        $reso = $rows->resolution;
                                                    }    
                                                    $countForRows++;  
                                                    $unit =  $functionType == 'Temp'?'°C':'%RH';
                                                    $italic = isItalic($reso, $uucTestpoint, $functionType); 
                                                    if($italic){        
                                            ?>
                                                <tr>
                                                    <td align="right"><?= $standardReading;?></td>
                                                    <td align="left"><?=$unit?></td>

                                                    <td align="right"><?= $uucReading;?></td>
                                                    <td align="left"><?=$unit?></td>

                                                    <td align="right"><?= $correctionWithFormat?></td>
                                                    <td align="left"><?=$unit?></td>

                                                    <td align="right"><?= $uncertainty?></td>
                                                    <td align="left"><?=$unit?></td>
                                                </tr>
                                            <?php
                                                    }else{
                                            ?>
                                                <tr>
                                                    <td align="right"><i><?= $standardReading;?></i></td>
                                                    <td align="left"><i><?=$unit?></i></td>

                                                    <td align="right"><i><?= $uucReading;?></i></td>
                                                    <td align="left"><i><?=$unit?></i></td>

                                                    <td align="right"><i><?= $correctionWithFormat?></i></td>
                                                    <td align="left"><i><?=$unit?></i></td>

                                                    <td align="right"><i><?= $uncertainty?></i></td>
                                                    <td align="left"><i><?=$unit?></i></td>
                                                </tr>
                                             <?php
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    <?php
                        }
                    ?>
                </div>
                <div style="position: absolute; top:682; right:10%; font-size:9.5pt;">
                    <p style='position: absolute; top:0;font-size:9.5pt;'><?= $pageNumber;?> of <?=(count(array_keys((array)$bySerialNumber))+1)?></p>
                </div>
            </div>
        <?php
                $pageNumber++;
            }
        ?>
    </main>
     
</body>





</html>   