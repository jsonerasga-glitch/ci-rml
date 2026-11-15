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

    $customerData = json_decode($thermoData['customerInfo']);   
    $environmentData = json_decode($thermoData['environmentInfo']);   
    $specificationsData = json_decode($thermoData['equipmentInfo']);
    $dataInputs = json_decode($thermoData['dataInputs']);
    $calculatedData = json_decode($thermoData['calculatedData']);

    $date = $thermoData['dateReceived']; 
    $mysql_date = date('Y-m-d G:i:s', strtotime($date));
    $date2 = $thermoData['dateCalibrated']; 
    $mysql_date2 = date('Y-m-d G:i:s', strtotime($date2));
    $date3 = $thermoData['recommendedDueDate']; 
    $mysql_date3 = date('Y-m-d G:i:s', strtotime($date3));

    $date = $customerData->dateReceived; 
    $mysql_date = date('Y-m-d G:i:s', strtotime($date));
    $date2 = $specificationsData->dateCalibrated;
    $mysql_date2 = date('Y-m-d G:i:s', strtotime($date2));
    $date3 = $customerData->recommendedDueDate; 
    $mysql_date3 = date('Y-m-d G:i:s', strtotime($date3));

    $dateCal = '<span class="label">Date Calibrated</span><span class="between">: </span><p class="text">'.date('d F Y', strtotime($mysql_date2)).'</p>';
    $dueDate = '<span class="label">Recommended Due Date</span><span class="between">: </span><p class="text">'.date('d F Y', strtotime($mysql_date3)).'</p>';
    $placeOfCali = '<span class="label">Place of Calibration</span><span class="between">: </span><p class="text">'.$thermoData['placeOfCalibration'].'</p>';
    $ambTemp = '<span class="label">Ambient Temperature</span><span class="between">: </span><p class="text">'.ambient(floatval($environmentData -> tempStart), floatval($environmentData->tempEnd)).'°C</p>';
    $ambhum = '<span class="label">Relative Humidity</span><span class="between">: </span><p class="text">'.ambient(floatval($environmentData -> rhStart), floatval($environmentData->rhEnd)).' % R.H.</p>';

    $rightSideArray = [$dateCal, $dueDate, $placeOfCali, $ambTemp, $ambhum];

    $selectedStandardDetails = $standardDetails; 	
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
            width: 44%;
            display: inline-block;
            white-space: nowrap;
            margin-right:1%;
        }

        .item .between {
            width: 3%;
            padding: 0;
            margin: 0;
        }

        .item .text {
            width: 48%;
            padding: 0;
            margin: 0;
        }

        p[style*="position: absolute"], p[style*="position:absolute"] { white-space: nowrap; }
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
    $arrayOfWeights = $thermoData['standard'];
    $pieces = explode("(SPLITHERE)", $arrayOfWeights);
	
    $datas = json_decode($thermoData['datas']);

    function TrimTrailingZeroes($nbr) {
        return strpos($nbr,'.')!==false ? rtrim(rtrim($nbr,'0'),'.') : $nbr;
    } ;
    
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
    
    function matchDecimal($value, $numberOfDecimalPoints){
        if (is_numeric($value)) {
            return number_format((float)$value, $numberOfDecimalPoints, '.', '');
        } elseif (is_string($value)) {
            $numericValue = floatval($value);
            if (is_numeric($numericValue)) {
                return number_format($numericValue, $numberOfDecimalPoints, '.', '');
            } else {
                return "Error: Invalid numeric value in value";
            }
        } else {
            return "Error: Invalid type for value (NaN)";
        }
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


    function addingReso($thermoData, $bySerialNumber, $haveTemp, $haveRh){
        $leftSideArray = [];        
        $typeOfEquipment = $thermoData['typeOfEquipment'];
        $equipmentIDText = $thermoData['equipmentID'] == '' ? 'None' : $thermoData['equipmentID'];
        $manu = '<span class="label">Manufacturer</span><span class="between">: </span><p class="text">'.$thermoData['manufacturer'].'</p>';
        $model = '<span class="label">Model No.</span><span class="between">: </span><p class="text">'.$thermoData['modelNumber'].'</p>';
        $seri = '<span class="label">Serial No.</span><span class="between">: </span><p class="text">'.$thermoData['serialNumber'].'</p>';
        $equipID = '<span class="label">Equipment ID</span><span class="between">: </span><p class="text">'.$equipmentIDText.'</p>';

        $IN = '';
        $INRH = '';

        $displayType;

        if($typeOfEquipment=='analog'){
            $displayType = 'Graduation';
        }else{
            $displayType = 'Resolution';
        }
        $serialNumberCount = count(array_keys((array)$bySerialNumber));
        foreach ($bySerialNumber as $functionChannel) {
            foreach($functionChannel as $values){
                $functionType = '';
                $unitForReso = $values->functionType == "Temp"|| $values->functionType == "TempOut"? '°C':'%RH';

                if($haveTemp == true && $haveRh == true){
                    if($values->functionType == "Temp" || $values->functionType == "TempOut"){
                        if(str_contains(strtoupper($values->channelName), 'IN')){
                            $functionType ='<i>(temperature in)</i>';
                        }else if(str_contains(strtoupper($values->channelName), 'OUT')){
                            $functionType ='<i>(temperature out)</i>';
                        }else{
                            $functionType ='<i>(temperature)</i>';
                        }
                    }
                    if($values->functionType == "Rh" || $values->functionType == "RhOut"){
                        if(str_contains(strtoupper($values->channelName), 'IN')){
                            $functionType ='<i>(humidity in)</i>';
                        }else if(str_contains(strtoupper($values->channelName), 'OUT')){
                            $functionType ='<i>(humidity out)</i>';
                        }else{
                            $functionType ='<i>(humidity)</i>';
                        }
                    }
                }

                if($serialNumberCount == 1){
                    $resolution =   $values->inputs->Row1->resolution;
                    $resoTemp = '<span class="label">'.$displayType.''.$functionType.'</span><span class="between">: </span><p class="text">'.$resolution.' '.$unitForReso.'</p>';
                    array_push($leftSideArray,$resoTemp);
                }

                continue;
            }
        }
        array_push($leftSideArray,$manu);
        array_push($leftSideArray,$model);
        array_push($leftSideArray,$seri);
        array_push($leftSideArray,$equipID);
        return $leftSideArray;
    }
    $leftSideArray = addingReso($thermoData, $bySerialNumber, $haveTemp, $haveRh);
    
    function isItalic($reso, $testPoint, $func){
        $reso = floatval($reso);
        $testPoint = floatval($testPoint);
        if($func == 'Temp'){
         
                if($testPoint < 15){
                    return false;
                }
                if($testPoint > 40){
                    return false;
                }
                return true;
        }
        if($func == 'TempOut'){
         
            if($testPoint < 15){
                return false;
            }
            if($testPoint > 40){
                return false;
            }
            return true;
    }
        if($func == 'Rh'){
                if($testPoint < 40){
                    return false;
                }
                if($testPoint > 60){
                    return false;
                }
                return true;
            }
            if($func == 'RhOut'){
                if($testPoint < 40){
                    return false;
                }
                if($testPoint > 60){
                    return false;
                }
                return true;
            }
    }

    function cmcChecker($val, $uncertainty, $unit){
        $float_val = floatval($val);
        $float_uncertainty = floatval($uncertainty);
        
        if(stripos($unit, 'Temp') !== false){
            $cmc = $uncertainty;
            if($float_val >= 15 && $float_val <= 40){
                if($float_uncertainty > 0.29){
                    $cmc = $uncertainty;
                }else{
                    $cmc = 0.29;
                }
            }
            if($float_val >= -20 && $float_val <= 100){
                if($float_uncertainty > 0.29){
                    $cmc = $uncertainty;
                }else{
                    $cmc = 0.29;
                }
            }
            return $cmc;
        }
        if(stripos($unit, 'TempOut') !== false){
            $cmc = $uncertainty;
            if($float_val >= 15 && $float_val <= 40){
                if($float_uncertainty > 0.29){
                    $cmc = $uncertainty;
                }else{
                    $cmc = 0.29;
                }
            }
            if($float_val >= -20 && $float_val <= 100){
                if($float_uncertainty > 0.29){
                    $cmc = $uncertainty;
                }else{
                    $cmc = 0.29;
                }
            }
            return $cmc;
        }
        if(stripos($unit, 'Rh') !== false){
            return getCMCRH($float_val, $uncertainty);
        }
        if(stripos($unit, 'RhOut') !== false){
            return getCMCRH($float_val, $uncertainty);
        }
    }

    function check_cmc($val, $uncertainty, $unit, $cmc_array){
        $cmc_conditions = json_decode($cmc_array[0]['conditions'], true);
        $count_of_conditions = count($cmc_conditions);
        $cmc = $uncertainty;
        $process_unit = '';
        $uncertainty_float = floatval($uncertainty);

        if($unit == 'Temp' || $unit == 'TempOut'){
            $process_unit = 'Temperature';
        }

        if($unit == 'Rh' || $unit == 'RhOut'){
            $process_unit = 'Relative Humidity';
        }

        // for ($i=0; $i < $count_of_conditions; $i++) { 
        //     $rangeMinID = 'rangeMinRow'.($i+1);
        //     $rangeMinUnitID = 'rangeMinUnitRow'.($i+1);
        //     $rangeMaxID = 'rangeMaxRow'.($i+1);
        //     $rangeMaxUnitID = 'rangeMaxUnitRow'.($i+1);
        //     $cmcValueID = 'cmcValueRow'.($i+1);

        //     $range_min = floatval($cmc_conditions[$i]->$rangeMinID);
        //     $range_max = floatval($cmc_conditions[$i]->$rangeMaxID);

        //     if($process_unit == $cmc_conditions[$i]->$rangeMaxUnitID){
        //         if($range_min === $range_max){
        //             if($val == $range_max){
        //                 $cmc = $uncertainty >= floatval($cmc_conditions[$i]->$cmcValueID) ? $uncertainty : floatval($cmc_conditions[$i]->$cmcValueID);
        //             }else{
        //                 $cmc = $uncertainty;
        //             }
        //         }else{
        //             if($val >= $range_min && $val <= $range_max){
        //                 $cmc = $uncertainty >= floatval($cmc_conditions[$i]->$cmcValueID) ? $uncertainty : floatval($cmc_conditions[$i]->$cmcValueID);
        //             }else{
        //                 $cmc = $uncertainty;
        //             }
        //         }
        //     }
        // }

        foreach($cmc_conditions as $key => $value){
            $row_num = $key + 1;
            
            $rangeMin_key = 'rangeMinRow'.$row_num;
            $rangeMinUnit_key = 'rangeMinUnitRow'.$row_num;
            $rangeMax_key = 'rangeMaxRow'.$row_num;
            $rangeMaxUnit_key = 'rangeMaxUnitRow'.$row_num;
            $cmcValue_key = 'cmcValueRow'.$row_num;

            $range_min = floatval($value[$rangeMin_key]);
            $range_max = floatval($value[$rangeMax_key]);

            if($process_unit == $value[$rangeMaxUnit_key]){
                if($range_min === $range_max){
                    if($val == $range_max){
                        if($uncertainty_float <= $value[$cmcValue_key]){
                            $cmc = $value[$cmcValue_key];
                        }
                    }
                }else{
                    if($val >= $range_min && $val <= $range_max){
                        if($uncertainty_float <= $value[$cmcValue_key]){
                            $cmc = $value[$cmcValue_key];
                        }
                    }
                }
            }
        }

        return $cmc;
    }
    

    function getCMCRH($raw_testPoint, $raw_uncertainty){
        $testPoint = floatVal($raw_testPoint);
        $uncertainty = floatVal($raw_uncertainty);

        $array = [40, 60, 80];

        if ($testPoint < 40 || $testPoint > 80) {
            return $raw_uncertainty;
        }
        if ($testPoint == 40 || $testPoint == 60 || $testPoint == 80) {
           if($testPoint == 40){
                if($uncertainty > 1.2){
                    return $raw_uncertainty;
                }else{
                    return 1.2;
                }
            }
            if($testPoint == 60){
                if($uncertainty > 1.6){
                    return $raw_uncertainty;
                }else{
                    return 1.6;
                }
            }
            if($testPoint == 80){
                if($uncertainty > 2.5){
                    return $raw_uncertainty;
                }else{
                    return 2.5;
                }
            }
            
        }
        $array[] = $testPoint;
        sort($array);
        $index = array_search($testPoint, $array);
        if($array[$index + 1] == 40){
            if($uncertainty > 1.2){
                return $raw_uncertainty;
            }else{
                return 1.2;
            }
        }
        if($array[$index + 1] == 60){
            if($uncertainty > 1.6){
                return $raw_uncertainty;
            }else{
                return 1.6;
            }
        }
        if($array[$index + 1] == 80){
            if($uncertainty > 2.5){
                return $raw_uncertainty;
            }else{
                return 2.5;
            }
        }
    }
    
    function ambient($start, $end){
        $float_start = floatval($start);
        $float_end = floatval($end);
        $average = round((($float_start + $float_end) / 2), 1);
        $result = round(abs($float_end - $average), 1);
        return "(" . $average. " ± " . $result . ")";
    }

    function standardUsedGetDetails($array_selectedStandard, $array_standardDetails){
        $selectedStandardsInRow = '';
        foreach ($array_standardDetails as $item) {
            if(in_array($item['id'], $array_selectedStandard)){
                $description = $item['standardUsed'];
                $certificateNumber = $item['certificateNumber'];
                $calibrationProvider = $item['issuingLab'];
                $trS = '<tr>';
                $trE = '</tr>';
                $tdS = "<td valign='top' style='margin-top:-8px;font-size:9.5pt;max-width:50px'><p style='margin: 0;'>";
                $tdSLA = "<td valign='top' style='margin-top:-8px;font-size:9.5pt;max-width:50px;text-align:left;'><p style='margin: 0;'>";
                $tdE = '<br></p></td>';
                $td1 = "<td valign='top' style='margin-top:-8px;font-size:9.5pt;max-width:10px' class='td1'><p style='margin: 0;'>";
                $td2 = "<td valign='top' style='margin-top:-8px;font-size:9.5pt;max-width:10px' class='td2'><p style='margin: 0;'>";
                $td3 = "<td valign='top' style='margin-top:-8px;font-size:9.5pt;max-width:10px' class='td3'><p style='margin: 0;'>";
                $td4 = "<td valign='top' style='margin-top:-8px;font-size:9.5pt;max-width:10px' class='td4'><p style='margin: 0;'>";
                $formatted = $trS. $td1.$tdE. $tdSLA .$description. $tdE. $td2.$tdE. $tdS .$certificateNumber. $tdE. $td3.$tdE. $tdS .$calibrationProvider. $tdE. $td4.$tdE .$trE;
                $selectedStandardsInRow .= $formatted;
                
            }
        }
        return $selectedStandardsInRow;
    }

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
        <div style="position: absolute; top:65;font-size:7; width:100%;">
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
                                echo  $placeholders[0]['module2CalibrationProcedureAndTraceability'];
                            }
                        ?>

                    </p>
                </div>

                <div class="" style="position: relative; font-size:9.5pt;">
                    <table style="border: 0px solid black; min-width: 95%; text-align: center;line-height: 1;" id="standardTable">
                        <thead style="border: 0px solid blue;">
                            <tr>
                                <td valign='top' style='margin-top:-8px;font-size:9.5pt;' class='td1'></td>
                                <td valign='top' style='margin-top:-8px;font-size:9.5pt;max-width:50px;text-align:left;'>
                                    <p style='margin: 0;text-decoration: underline;'>Standard Used</p>
                                </td>
                                <td valign='top' style='margin-top:-8px;font-size:9.5pt;' class='td2'></td>
                                <td valign='top' style='margin-top:-8px;font-size:9.5pt;max-width:50px'>
                                    <p style='margin: 0;text-decoration: underline;'>Calibration Certificate No.</p>
                                </td>
                                <td valign='top' style='margin-top:-8px;font-size:9.5pt;' class='td3'></td>
                                <td valign='top' style='margin-top:-8px;font-size:9.5pt;max-width:50px'>
                                    <p style='margin: 0;text-decoration: underline;'>Issuing Laboratory</p>
                                </td>
                                <td valign='top' style='margin-top:-8px;font-size:9.5pt;' class='td4'></td>
                            </tr>
                        </thead>
                        <tbody style="border: 0px solid red;">
                            <?php  
                                echo standardUsedGetDetails($pieces, $selectedStandardDetails);
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
                                echo  $placeholders[0]['module2CalibrationResults'];
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
                                echo  $placeholders[0]['module2UncertaintyOfMeasurement'];
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
                                    $remarks = $placeholders[0]['module2Remarks'];
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

            <div style="position: absolute; top:682; right:13%; font-size:9.5pt;">
                <p style='position: absolute; top:0;font-size:9.5pt;'>Page 1 of <?=(count(array_keys((array)$bySerialNumber))+1)?></p>
            </div>
              
        </div>
      
        <?php  
            $serialNumberCount = count(array_keys((array)$bySerialNumber));
            $display = $serialNumberCount>1?'':'display:none';
            $customDecimalPlaceObject = json_decode($thermoData['customDecimalPlace']);
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
                            
                            $customUUCDecimal = '';
                            if(isset($values->custonDecimalPlace)){
                                if($values->custonDecimalPlace != '-1'){
                                    $customUUCDecimal = $values->custonDecimalPlace;
                                }
                                
                            }

                            // if($customDecimalPlaceObject != NULL){
                            //     $customCorrectionDecimal = $customDecimalPlaceObject->$customCorrectionID;
                            //     $customUUCDecimal = $customDecimalPlaceObject->$customUUCReadingID;
                            // }
                            
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

                            if($values->channelName == ''){
                                $functionDisplay = $values->functionType == 'Temp' || $values->functionType == 'TempOut'?'Temperature':'Humidity';
                            }else{
                                $functionDisplay = $values->channelName;
                            }
                            $humidityStandardReading = $values->functionType == 'Rh'?'Standard Reading at 23°C':'Standard Reading';
                    ?>
                            <div style="position: relative; left:3%; max-width:90%; border:0px green dotted;">
                                <p style="text-decoration:underline"><?=$functionDisplay;?></p>
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
                                                        $standardReading = matchDecimal(round(floatval($values->caluculated->$rowWithCount->correctedValueFull),$uncertaintyCountOfDecimal),$standardReadability);
                                                        //$standardReading_full = $values->caluculated->$rowWithCount->correctedValueFull;
                                                        if($customUUCDecimal != ''){
                                                            $uucReading = matchDecimal($values->inputs->$rowWithCount->uucAverage,$customUUCDecimal);
                                                        }else{
                                                            $uucReading = matchDecimal($values->inputs->$rowWithCount->uucAverage,$uucReadability);
                                                        }
                                                        $correction = floatval($standardReading) - floatval($uucReading);  
                                                        $correctionWithFormat = matchDecimal($correction,$uncertaintyCountOfDecimal);
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
                                                        $standardReading = matchDecimal(round(floatval($rows->correctedValue),$uncertaintyCountOfDecimal),$standardReadability);
                                                        //$standardReading_full = $rows->correctedValue;
                                                        if($customUUCDecimal != ''){
                                                            $uucReading = matchDecimal($values->inputs->$rowName->uucAverage,$customUUCDecimal);
                                                        }else{
                                                            $uucReading = matchDecimal($values->inputs->$rowName->uucAverage,$uucReadability);
                                                        }
                                                        $correction = floatval($standardReading) - floatval($uucReading);
                                                        $correctionWithFormat = matchDecimal($correction,$uncertaintyCountOfDecimal);
                                                        $uucTestpoint = floatval($values->inputs->$rowName->testPoint);
                                                        $functionType = $values->functionType;
                                                        $reso = $rows->resolution;
                                                       
                                                    }    
                                                    $countForRows++;  
                                                    $unit =  $functionType == 'Temp' || $functionType == 'TempOut'?'°C':'%RH';
                                                    $italic = true; //$italic = isItalic($reso, $uucTestpoint, $functionType);  // removed due to update in PAB cmc
                                                    // $cmcCheckedUncertainty = cmcChecker($uucTestpoint, $uncertainty, $functionType); // old cmc checker (hard coded cmc conditions)
                                                    $cmcCheckedUncertainty = check_cmc($uucTestpoint, $uncertainty, $functionType, $cmc);
                                                    if($italic){        
                                            ?>
                                                <tr>
                                                    <td align="right"><?= $standardReading;?></td>
                                                    <td align="left"><?=$unit?></td>

                                                    <td align="right"><?= $uucReading;?></td>
                                                    <td align="left"><?=$unit?></td>

                                                    <td align="right"><?= $correctionWithFormat?></td>
                                                    <td align="left"><?=$unit?></td>

                                                    <td align="right"><?= $cmcCheckedUncertainty?></td>
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

                                                    <td align="right"><i><?= $cmcCheckedUncertainty?></i></td>
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
                <div style="position: absolute; top:682; right:13%; font-size:9.5pt;">
                    <p style='position: absolute; top:0;font-size:9.5pt;'>Page <?= $pageNumber;?> of <?=(count(array_keys((array)$bySerialNumber))+1)?></p>
                </div>
            </div>
        <?php
                $pageNumber++;
            }
        ?>
    </main>
   
</body>





</html>   