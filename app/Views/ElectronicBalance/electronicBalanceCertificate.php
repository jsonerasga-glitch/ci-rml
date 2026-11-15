<?php 
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

    $pathIllusC = 'image/SREBillustrationC.png';
    $typeIllusC = pathinfo($pathIllusC, PATHINFO_EXTENSION);
    $dataIllusC = file_get_contents($pathIllusC);
    $base64IllusC = 'data:image/' . $typeIllusC . ';base64,' . base64_encode($dataIllusC);

    $pathIllusDraft = 'image/draft.png';
    $typeIllusDraft = pathinfo($pathIllusDraft, PATHINFO_EXTENSION);
    $dataIllusDraft = file_get_contents($pathIllusDraft);
    $base64IllusDraft = 'data:image/' . $typeIllusDraft . ';base64,' . base64_encode($dataIllusDraft);


    $customerData = json_decode($dataFromDB['customerInfo']);   
    $environmentData = json_decode($dataFromDB['environmentInfo']);   
    $specificationsData = json_decode($dataFromDB['equipmentInfo']);
    $dataInputs = json_decode($dataFromDB['dataInputs']);
    $calculatedData = json_decode($dataFromDB['calculatedData']);
    $unitOfStandard = 'kPa';

    $date = $customerData->dateReceived; 
    $mysql_date = date('Y-m-d G:i:s', strtotime($date));
    $date2 = $specificationsData->dateCalibrated;
    $mysql_date2 = date('Y-m-d G:i:s', strtotime($date2));
    $date3 = $customerData->recommendedDueDate; 
    $mysql_date3 = date('Y-m-d G:i:s', strtotime($date3));

    $aveTemp = (floatval($environmentData -> tempStart)+floatval($environmentData->tempEnd))/2;
    $aveRH = (floatval($environmentData -> rhStart)+floatval($environmentData->rhEnd))/2;

    $dateCal = '<span class="label">Date Calibrated</span><span class="between">: </span><p class="text">'.date('d F Y', strtotime($mysql_date2)).'</p>';
    $dueDate = '<span class="label">Recommended Due Date</span><span class="between">: </span><p class="text">'.date('d F Y', strtotime($mysql_date3)).'</p>';
    $placeOfCali = '<span class="label">Place of Calibration</span><span class="between">: </span><p class="text">'.$specificationsData->placeOfCalibration.'</p>';
    $ambTemp = '<span class="label">Ambient Temperature</span><span class="between">: </span><p class="text">'.ambient(floatval($environmentData -> tempStart), floatval($environmentData->tempEnd)).'°C</p>';
    $ambhum = '<span class="label">Relative Humidity</span><span class="between">: </span><p class="text">'.ambient(floatval($environmentData -> rhStart), floatval($environmentData->rhEnd)).' % R.H.</p>';

    $rightSideArray = [$dateCal, $dueDate, $placeOfCali, $ambTemp, $ambhum];

    $repeatabilityMost = [
        $dataInputs->repeat1,
        $dataInputs->repeat2,
        $dataInputs->repeat3,
        $dataInputs->repeat4,
        $dataInputs->repeat5,
        $dataInputs->repeat6,
        $dataInputs->repeat7,
        $dataInputs->repeat8,
        $dataInputs->repeat9,
        $dataInputs->repeat10
    ];
    $perfectRepeat = false;
    $compare = $repeatabilityMost[0];
    for ($i=0; $i < count($repeatabilityMost); $i++) { 
        if($compare == $repeatabilityMost[$i]){
            $compare = $repeatabilityMost[$i];
            $perfectRepeat = true;
        }
        else{
            $perfectRepeat = false;
            break;
        }
    }

    $illus = 'A';   
    if($dataInputs->illusA === 'checked'){
        $illus = 'A';
    }
    if($dataInputs->illusB === 'checked'){
        $illus = 'B';
    }
    if($dataInputs->illusC === 'checked'){
        $illus = 'C';
    }
    if($dataInputs->illusOther === 'checked'){
        $illus = 'O';
    }
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


        .resultTable, .resultTable th, .resultTable td,{
            border: 1px solid black;
            border-collapse: collapse;
            text-align:center;
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

   </style>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RML ++</title>	
</head>

<?php
    use App\Models\ElectModel_2;
    
    $detailsModel = new ElectModel_2();
    $arrayOfWeights = $dataFromDB['standard'];
    $pieces = explode("(SPLITHERE)", $arrayOfWeights);
	// $details[] = $detailsModel->whereIn('serialNumber', $pieces)->findAll(); 	
    $details[] = $detailsModel->whereIn('id', $pieces)->findAll(); 	
    
    $datas = $calculatedData;

    $readabilityDecimalPoint = seeDecimal(TrimTrailingZeroes($specificationsData->resolution));

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
    function sigFigAbsolute($number, $n) {
        if ($number == 0) {
            return 0;
        }
        $decimalPlaces = $n - ceil(log10(abs($number)));
        return number_format($number, $decimalPlaces);
    }
    function formatToSignificantFigures($number, $n) {
        if ($number == 0) {
            return 0;
        }
    
        $decimalPlaces = $n - ceil(log10(abs($number)));
    
        return number_format($number, $decimalPlaces);
    }
    function addZeros($value,$numberOfZeros){
        return number_format($value,$numberOfZeros,'.','');
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

    function addingReso($specificationsData){
        $leftSideArray = [];        
        $resolution_graduation;
        
        if(isset($specificationsData->equipmentType)){
            if($specificationsData->equipmentType == 'analog'){
                $resolution_graduation = 'Graduation';
            }else{
                $resolution_graduation = 'Resolution';
            }
        }else{
            $resolution_graduation = 'Resolution';
        }

        $manu = '<span class="label">Manufacturer</span><span class="between">: </span><p class="text">'.$specificationsData->manufacturer.'</p>';
        $model = '<span class="label">Model No.</span><span class="between">: </span><p class="text">'.$specificationsData->modelNumber.'</p>';
        $seri = '<span class="label">Serial No.</span><span class="between">: </span><p class="text">'.$specificationsData->serialNumber.'</p>';
        $equipID = '<span class="label">Equipment ID</span><span class="between">: </span><p class="text">'.$specificationsData->equipmentId.'</p>';
        $readability = '<span class="label">'.$resolution_graduation.'</span><span class="between">: </span><p class="text">'.$specificationsData->resolution.' '.$specificationsData->unit.'</p>';
        $range = '<span class="label">Maximum Capacity</span><span class="between">: </span><p class="text">'.$specificationsData->maxCapacity.' '.$specificationsData->unit.'</p>';
       
        array_push($leftSideArray,$manu);
        array_push($leftSideArray,$model);
        array_push($leftSideArray,$seri);
        array_push($leftSideArray,$equipID);
        array_push($leftSideArray,$range);
        array_push($leftSideArray,$readability);
       
        return $leftSideArray;
    }

    $leftSideArray = addingReso($specificationsData);  
    
    function isItalic($reso, $testPoint, $func){
        $reso = floatval($reso);
        $testPoint = floatval($testPoint);
        if($func == 'Temp'){
            if($reso >= 0.01){
                if($testPoint < -20){
                    return false;
                }
                if($testPoint > 70){
                    return false;
                }
                return true;
            }
            return false;
        }
        if($func == 'Rh'){
            if($reso >= 1){
                if($testPoint < 40){
                    return false;
                }
                if($testPoint > 60){
                    return false;
                }
                return true;
            }
            return false;
        }
    }

    function convertToMg($value, $unit){
        $conversionFactors = [
            "mg" => 1,
            "g" => 1000,
            "kg" => 1000000,
        ];
    
        if (array_key_exists($unit, $conversionFactors)) {
            return $value * $conversionFactors[$unit];
        } else {
            throw new Exception("Invalid unit. Supported units: mg, g, kg");
        }
    }
    function convertUnit($value, $fromUnit, $toUnit){
        $unitConversions = [
            'mg' => 1,
            'g'  => 1000,   
            'kg' => 1000000,
        ];
    
        if (!array_key_exists($fromUnit, $unitConversions) || !array_key_exists($toUnit, $unitConversions)) {
            return "Invalid units provided.";
        }
    
        $conversionFactor = $unitConversions[$fromUnit] / $unitConversions[$toUnit];
        $convertedValue = $value * $conversionFactor;
    
        return $convertedValue;
    }
    function removeSubscripts($inputs){
        $subscripts = array(
            '₀' => '0', '₁' => '1', '₂' => '2', '₃' => '3', '₄' => '4',
            '₅' => '5', '₆' => '6', '₇' => '7', '₈' => '8', '₉' => '9'
        );
    
        $noSubscript = str_replace(array_keys($subscripts), array_values($subscripts), $inputs);
        return $noSubscript;
    }
    function addSubscripts($inputs){
        $subscripts = array(
            '0' => '<sub>0</sub>', '1' => '<sub>1</sub>', '2' => '<sub>2</sub>', '3' => '<sub>3</sub>', '4' => '<sub>4</sub>',
            '5' => '<sub>5</sub>', '6' => '<sub>6</sub>', '7' => '<sub>7</sub>', '8' => '<sub>8</sub>', '9' => '<sub>9</sub>'
        );
    
        $withSubscript = str_replace(array_keys($subscripts), array_values($subscripts), $inputs);
        return $withSubscript;
    }
    function classSearch($input, $searchingFor){
        if (strpos($input, $searchingFor) !== false) {
            return true;
        } else {
            return false;
        }
    }

    // function matchDecimal($valueString, $readabilityNumberOFPoints){
    //     $value = floatval($valueString);
    //     if(seeDecimal($value) == 0){
    //         $result = addZeros($value,$readabilityNumberOFPoints);
    //     }else{
    //         $result = roundTo($value, $readabilityNumberOFPoints);
    //     }
    //     return $result;
    // }
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

    // function getCMCValue($range, $class, $unit, $uncertain){
    //     $float_val = floatval($range);
    //     $float_uncertain = floatval($uncertain);
    //     $range_mg = convertToMg($float_val, $unit);
    //     $processedClass = removeSubscripts($class);
    //     $cmc;
        
    //     function otherCMC($value){
    //         $ranges = array(
    //             array('min' => 1000, 'max' => 10000, 'cmc' => 0.15),
    //             array('min' => 10000, 'max' => 100000, 'cmc' => 0.16),
    //             array('min' => 100000, 'max' => 200000, 'cmc' => 0.30),
    //             array('min' => 200000, 'max' => 500000, 'cmc' => 0.80),
    //             array('min' => 500000, 'max' => 1000000, 'cmc' => 1.6),
    //             array('min' => 1000000, 'max' => 2000000, 'cmc' => 3.0),
    //             array('min' => 2000000, 'max' => 5000000, 'cmc' => 8.0),
    //             array('min' => 5000000, 'max' => 10000000, 'cmc' => 160),
    //             array('min' => 10000000, 'max' => 20000000, 'cmc' => 300),
    //             array('min' => 20000000, 'max' => 50000000, 'cmc' => 800),
    //         );
        
    //         foreach ($ranges as $range) {
    //             if ($value >= $range['min'] && $value < $range['max']) {
    //                 return $range['cmc'];
    //             }
    //         }
        
    //         return 0;
    //     }
        
    //     if(classSearch($processedClass, "F1")){
    //         $rangeCMC = [
    //             '50000' => 0.13,
    //             '100000' => 0.16,
    //             '200000' => 0.3,
    //             '500000' => 0.8,
    //             '1000000' => 1.6,
    //             '2000000' => 3.0,
    //             '5000000' => 8.0,
    //         ];

    //         $cmc = $rangeCMC[$range_mg];
    //     }
    //     elseif(classSearch($processedClass, "F2")){
    //         $rangeCMC = [
    //             '2000' => 0.15,
    //             '5000' => 0.16,
    //             '10000' => 0.20,
    //             '20000' => 0.25,
    //             '50000' => 0.3,
    //             '100000' => 0.5,
    //             '200000' => 1.0,
    //             '500000' => 2.5,
    //             '1000000' => 5.0,
    //             '2000000' => 10,
    //             '5000000' => 25,
    //         ];

    //         $cmc = $rangeCMC[$range_mg];
    //     }
    //     elseif(classSearch($processedClass, "M1") || classSearch($processedClass, "M2")){
    //         $rangeCMC = [
    //             '200' => 0.20,
    //             '500' => 0.25,
    //             '1000' => 0.30,
    //             '2000' => 0.40,
    //             '5000' => 0.50,
    //             '10000' => 0.60,
    //             '20000' => 0.80,
    //             '50000' => 1.0,
    //             '100000' => 1.6,
    //             '200000' => 3.0,
    //             '500000' => 8.0,
    //             '1000000' => 16,
    //             '2000000' => 30,
    //             '5000000' => 80,
    //             '10000000' => 160,
    //             '20000000' => 300,
    //             '50000000' => 800,
    //         ];

    //         $cmc = $rangeCMC[$range_mg];
    //     }
    //     else{
    //         $cmc = otherCMC($range_mg);
    //     }
        
    //     if($float_uncertain > $cmc){
    //         return $float_uncertain;
    //     }else{
    //         return $cmc;
    //     }
    // }

    $cmc_array = json_decode($cmc[0]['conditions']);

    function getCMCValue($maxCapacity, $class, $unit, $conventionalMass, $expandedUncertain){
        $float_maxCapacity = floatval($maxCapacity);
        $float_expandedUncertain = floatval($expandedUncertain);
        $float_conventionalMass = floatval($conventionalMass);
        $noSubClass = removeSubscripts($class);
        $processedClass = strtoupper($noSubClass);
        $cmc = 0;

        if(classSearch($processedClass, "E2")){
            $maxCapacityG = convertUnit($maxCapacity, $unit, 'g');
            if($maxCapacityG <= 610){
                $cmc = $float_conventionalMass * 0.0000014;
            }
        }
        if(classSearch($processedClass, "F1")){
            $maxCapacityG = convertUnit($maxCapacity, $unit, 'g');
            if($maxCapacityG <= 610){
                $cmc = $float_conventionalMass * 0.0000083;
            }
        }
        if(classSearch($processedClass, "F2")){
            $maxCapacitKG = convertUnit($maxCapacity, $unit, 'kg');
            if($maxCapacitKG <= 60){
                $cmc = $float_conventionalMass * 0.00002;
            }
        }
        if(classSearch($processedClass, "FREE")){
            $maxCapacitKG = convertUnit($maxCapacity, $unit, 'kg');
            if($maxCapacitKG <= 300){
                $cmc = $float_conventionalMass * 0.000092;
            }
        }

        $uncertainty = $float_expandedUncertain > $cmc ? $float_expandedUncertain : $cmc;
        return $uncertainty;

    }
    
    function check_cmc($maxCapacity, $class, $unit, $conventionalMass, $expandedUncertain, $cmc_array){
        $number_to_class = [
            '0' => 'E1',
            '1' => 'E2',
            '2' => 'F1',
            '3' => 'F2',
            '4' => 'M1',
            '5' => 'M2',
            '6' => 'FREE',
        ];

        $float_maxCapacity = floatval($maxCapacity);
        $float_expandedUncertain = floatval($expandedUncertain);
        $float_conventionalMass = floatval($conventionalMass);
        $noSubClass = removeSubscripts($class);
        $processedClass = strtoupper($noSubClass);
        $cmc = -1;

        $cmc_conditions = json_decode($cmc_array[0]['conditions']);
        $count_of_conditions = count($cmc_conditions);
        for ($i=0; $i < $count_of_conditions; $i++) { 
            $classID = 'classRow'.($i+1);
            $rangeMinID = 'rangeMinRow'.($i+1);
            $rangeMinUnitID = 'rangeMinUnitRow'.($i+1);
            $rangeMaxID = 'rangeMaxRow'.($i+1);
            $rangeMaxUnitID = 'rangeMaxUnitRow'.($i+1);
            $cmcValueID = 'cmcValueRow'.($i+1);

            if(classSearch($processedClass,  $number_to_class[$cmc_conditions[$i]->$classID])){
                $maxCapacityG = convertUnit($maxCapacity, $unit, $cmc_conditions[$i]->$rangeMaxUnitID);
                if($maxCapacityG <= $cmc_conditions[$i]->$rangeMaxID){
                    $cmc = $float_conventionalMass * $cmc_conditions[$i]->$cmcValueID;
                }
            }
        }

        $uncertainty = $float_expandedUncertain > $cmc ? $float_expandedUncertain : $cmc;
        return $uncertainty;

    }

    function ambient($start, $end){
        $float_start = floatval($start);
        $float_end = floatval($end);
        $average = round((($float_start + $float_end) / 2), 1);
        $result = round(abs($float_end - $average), 1);
        return "(" . $average. " ± " . $result . ")";
    }


    function calculateAverage($numbers){
        $sum = array_sum($numbers);
        $count = count($numbers);
        $average = $sum / $count;
        
        return $average;
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
        <img src='<?= $base64PAB?>' alt='PAB LOGO' height='80px' style='position: absolute; top:0; left:425'>
        <div style="position: absolute; top:60;">
            <hr>
        </div>
        <div style="position: absolute; top:62;">
            <hr>
        </div>
        <div class='' style="position:absolute;top:87; left:27%">
            <p style='font-weight:bold;font-size:19pt'>CALIBRATION CERTIFICATE</p>
        </div>

        <div style="position:absolute;top:120;line-height: 1;">
            <table>
                <tr >
                    <td style="white-space:nowrap;font-size:9.5pt">Calibration Certificate No.</td>
                    <td style="font-size:9.5pt; padding-left: 15px;">:</td>
                    <td colspan="4" style="font-size:9.5pt; padding-left: 5px;"><b><?php echo $dataFromDB['certificateNumber']?></b></td>
                </tr>
                <tr >
                    <td style="font-size:9.5pt">Customer</td>
                    <td style="font-size:9.5pt;  padding-left: 15px;">:</td>
                    <td colspan="4" style="font-size:9.5pt; padding-left: 5px;"><b><?php echo $customerData->customer?></b></td>
                </tr>
                <tr valign='top'>
                    <td style="font-size:9.5pt">Address</td>
                    <td style="font-size:9.5pt;  padding-left: 15px;">:</td>
                    <td colspan="4" style="font-size:9.5pt; padding-left: 5px;"><b><?php echo $customerData->address ?></b></td>
                </tr>
            </table>
        </div>
        
            
    </header>
    <footer>
        <div style="position: absolute; top:0; left:6.4%; font-size:8pt;">
            <p style='position: absolute; top:0; font-style: italic;'>This Certificate shall not be reproduced in any form, except in full, without the written approval of the DOST CALABARZON RML</p>
        </div>
        <div style="position: absolute; top:12; font-size:9.5pt;">
            <p style='position: absolute; top:0; '>Date of Issue: 
            <?php 
                if($dataFromDB['dateOfIssue'] != ''){
                    $date=date_create($dataFromDB['dateOfIssue']);
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
                if($dataFromDB['completion'] != 'For printing'||$imageDraft == '1'){
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
                                <span class="label">Equipment Description</span><span class="between">: </span><p class="text"><?php echo $specificationsData->equipmentDescription?></p>
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
                <div class="" style="position: relative;height:auto;font-size:9.5pt;margin-top:20px">
                    <p style='font-weight:bold;text-decoration: underline;'>Calibration Procedure and Traceability</p>
                    <p style='margin-top:-10;'>
                        <?php 
                            if($dataFromDB['settingCalibrationProcedureAndTraceability'] == ""){
                                echo $placeholders[0]['module1CalibrationProcedureAndTraceability'];
                            }else{
                                echo $dataFromDB['settingCalibrationProcedureAndTraceability'];
                            }
                        ?>
                    </p>
                </div>
                <div class="" style="position: relative;height:auto;font-size:9.5pt;left:6%;">
                    <table style="border: 0px solid black; min-width: 95%; text-align: center;line-height: 0.9;">
                        <tbody style="">
                            <tr>
                                <th width="33%" align="left">
                                    <u style='font-size:9.5pt;font-weight:none;text-align:left;'>Standard Used</u>
                                </th>
                                <th width="33%">
                                    <u style='font-size:9.5pt;font-weight:none;'>Calibration Certificate No.</u>
                                </th>
                                <th width="33%"> 
                                    <u style='font-size:9.5pt;font-weight:none;'>Issuing Laboratory</u>
                                </th>
                            </tr>
                                <?php
                                    $classString = $details[0]; 
                                    for($i = 0; $i < count($details[0]);$i++){
                                        echo "  <tr><td  valign='top' style='margin-top: -8px;text-align: left;font-size:9.5pt;'><p style='margin: 0;'>".addSubscripts($classString[$i]['description'])."</p></td>";
                                        echo "<td  valign='top' style='margin-top: -8px;font-size:9.5pt'><p style='margin:0;'>". $classString[$i]['certificateNumber']. " <br></p></td>";
                                        echo "<td  valign='top' style='margin-top: -8px;font-size:9.5pt'><p style='margin:0;'>". $classString[$i]['calibrationProvider']. " <br></p></td></tr>";
                                    }
                                ?>
                        </tbody>
                    </table>
                </div>
               
                <div class="" style="position: relative;font-size:9.5pt;height:auto;border:0px green dotted;margin-top:20px">
                    <p style='font-weight:bold;text-decoration: underline;font-size:9.5pt;top:2;'>Uncertainty of Measurement</p>
                    <p style='max-width:95%;font-size:9.5pt;margin-top:-10;'><?=$dataFromDB['settingUncertaintyOfMeasurement']?>
                        <?php 
                            if($dataFromDB['settingUncertaintyOfMeasurement'] == ""){
                                echo $placeholders[0]['module1UncertaintyOfMeasurement'];
                            }else{
                                echo $dataFromDB['settingUncertaintyOfMeasurement'];
                            }
                        ?>
                    </p>
                </div>      
                <div class="" style="position: relative;font-size:9.5pt;height:auto;border:0px blue dotted;margin-top:20px">
                    <p style='font-weight:bold;text-decoration: underline;font-size:9.5pt;top:2;'>Calibration Results</p>
                    <p style='max-width:95%;font-size:9.5pt;margin-top:-10;'>
                        <?php 
                            if($dataFromDB['settingCalibrationResults'] == ""){
                                echo $placeholders[0]['module1CalibrationResults'];
                            }else{
                                echo $dataFromDB['settingCalibrationResults'];
                            }
                        ?>
                    </p>
                </div>          
            </div>
           
            
            <div style="position: absolute; top:615; left:6%; font-size:9.5pt;">
                <p style='position: absolute; top:0;text-decoration: underline;font-size:9.5pt;'> <?php echo $dataFromDB['calibrationOfficer'];?></p>
                <p style='position: absolute; top:15;font-size:9.5pt;'>Calibration Officer</p>
            </div>
            <div style="position: absolute; top:615; left:70%; font-size:9.5pt;">
                <p style='position: absolute; top:0;text-decoration: underline;font-size:9.5pt;'><?php echo $dataFromDB['checkedBy'];?></p>
                <p style='position: absolute; top:15;font-size:9.5pt;'><?php echo $dataFromDB['verifierPosition'];?></p>
            </div>

            <div style="position: absolute; top:682; right:13%; font-size:9.5pt;">
                <p style='position: absolute; top:0;font-size:9.5pt;'>Page 1 of 3</p>
            </div>
              
        </div>

        <div class="page" style="border:0px green dotted; max-height:90%; font-size:9.5pt; ">
                <?php 
                    if($dataFromDB['completion'] != 'For printing'||$imageDraft == '1'){
                        echo " 
                        <div style='z-index: 999; position:absolute; top: 150px; margin-left: 40px;'>
                        <img src='". $base64."'  style='margin-left: -40px; height: 700px; opacity: 0.1; position: absolute;'>
                        <img src='". $base64IllusDraft."'  style='background-size: 100% 100%; opacity: 0.5; position: absolute;'>
                        </div>";
                    }
                ?> 
                <div class="" style="position: relative;font-size:9.5pt;height:auto; border:0px black dotted;margin-top:-1%;top:120">
                    <p style='font-weight:bold;text-decoration: underline;margin-top:5;'>Remarks:</p> <br>
                    <table style="border: 0px; width: 90%; font-size:9.5pt;margin-top:-15;">
                        <tbody>
                            <?php
                                if($dataFromDB['settingRemarks'] == ""){
                                    $remarks = $placeholders[0]['module1Remarks'];
                                }else{
                                    $remarks = $dataFromDB['settingRemarks'];
                                }
                                $remarksSeparated = explode("(splitHere)", $remarks);
                                for ($i=0; $i < count($remarksSeparated); $i++) { 
                                    echo "<tr valign='top' style='font-size:9.5pt;'><td>".($i+1).". "."</td><td>".$remarksSeparated[$i]."</td></tr>";
                                }
                            ?>
                        </tbody>
                    </table> 
                </div>
                <div style="position: relative;font-size:9.5pt;height:auto; border:0px black dotted;margin-top:-1%;top:170">
                    <p style='font-weight:bold;text-decoration: underline;margin-top:5;'>Calibration Results</p>

                    <div style="position: relative;font-size:9.5pt;height:auto; border:0px black dotted; ">
                        <div style="position: absolute;font-size:9.5pt;height:auto; border:0px black dotted;left:5%">
                            <p style='font-weight:bold;text-decoration: underline;margin-top:5;'>Repeatability at <?= $dataInputs->repeatabilityRaw?> <?= $specificationsData->unit?></p>
                            <table class="GeneratedTable" style="line-height: .9;height:auto;">
                                <thead>
                                    <tr>
                                        <th>Trial</th>
                                        <th>Indication(<?= $specificationsData->unit?>)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><?php echo matchDecimal($dataInputs->repeat1,$readabilityDecimalPoint)?></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><?php echo matchDecimal($dataInputs->repeat2,$readabilityDecimalPoint)?></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td><?php echo matchDecimal($dataInputs->repeat3,$readabilityDecimalPoint)?></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td><?php echo matchDecimal($dataInputs->repeat4,$readabilityDecimalPoint)?></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td><?php echo matchDecimal($dataInputs->repeat5,$readabilityDecimalPoint)?></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td><?php echo matchDecimal($dataInputs->repeat6,$readabilityDecimalPoint)?></td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td><?php echo matchDecimal($dataInputs->repeat7,$readabilityDecimalPoint)?></td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td><?php echo matchDecimal($dataInputs->repeat8,$readabilityDecimalPoint)?></td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td><?php echo matchDecimal($dataInputs->repeat9,$readabilityDecimalPoint)?></td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td><?php echo matchDecimal($dataInputs->repeat10,$readabilityDecimalPoint)?></td>
                                    </tr>
                                    <tr>
                                        <td>St. Dev. (<?= $specificationsData->unit?>)</td>
                                        <td><?php if($perfectRepeat){
                                            echo "0.0";
                                        }else{
                                            //echo $dataInputs->stDev;
                                            //echo roundTo($dataInputs->stDev,6);
                                            echo sigFig($dataInputs->stDev,2);
                                        }
                                    ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="position: absolute;font-size:9.5pt;height:auto; border:0px black dotted;left:35%">
                            <p style='font-weight:bold;text-decoration: underline;margin-top:5;'>Eccentricity at <?= $dataInputs->load?> <?= $specificationsData->unit?></p>
                            <table class="GeneratedTable"  style='width:80%; line-height: .9;height:auto;'>
                                <thead>
                                    <tr>
                                        <th>Load Position</th>
                                        <th>Indication(<?= $specificationsData->unit?>)</th>
                                        <th>Error of Indication Relative to the Center (<?= $specificationsData->unit?>)</th>
                                    </tr>
                                </thead>
                                    <?php //$averageOfP1 = (($dataInputs->eccentricity1Start+$dataInputs->eccentricity1End)/2)
                                    $averageOfP1 = $dataInputs->eccentricity1Start?>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><?php echo matchDecimal($averageOfP1,$readabilityDecimalPoint)?></td>
                                        <td><?php //echo roundTo($dataInputs->error1 ,$readabilityDecimalPoint)?>-</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><?php echo matchDecimal($dataInputs->eccentricity2 ,$readabilityDecimalPoint)?></td>
                                        <td><?php echo matchDecimal($dataInputs->error2View ,$readabilityDecimalPoint)?></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td><?php echo matchDecimal($dataInputs->eccentricity3 ,$readabilityDecimalPoint)?></td>
                                        <td><?php echo matchDecimal($dataInputs->error3View ,$readabilityDecimalPoint)?></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td><?php echo matchDecimal($dataInputs->eccentricity4 ,$readabilityDecimalPoint)?></td>
                                        <td><?php echo matchDecimal($dataInputs->error4View ,$readabilityDecimalPoint)?></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td><?php echo matchDecimal($dataInputs->eccentricity5 ,$readabilityDecimalPoint)?></td>
                                        <td><?php echo matchDecimal($dataInputs->error5View ,$readabilityDecimalPoint)?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- <p style='font-style: italic;margin-top:10;width:80%'>The indication reported at Load Position 1 is the average of two readings at the center of the pan.</p> -->
                        </div>
                    </div>

                </div>
                <div style="position: relative;font-size:9.5pt;height:auto; border:0px black dotted;margin-top:-1%;top:450; left:30%">
                    <p style='font-weight:bold;text-decoration: underline;margin-top:5;'>Figure 1. Positions for Eccentricity Test</p> <br>
                    <img src="<?php
                        if($illus === 'A'){
                            echo $base64Illusa;
                        }elseif ($illus === 'B') {
                            echo $base64IllusB;
                        }elseif ($illus === 'C') {
                            echo $base64IllusC;
                        }elseif ($illus === '0') {
                            echo $$base64;
                        }


                        ?>"height='90px' style="position: absolute;left:5%; top:8%"> 
                    <p style='position: absolute;left:20%; top:6s%'>1 - Center <br>2 - Front Left <br>3 - Back Left <br>4 - Back Right <br>5 - Front Right</p>  

                </div>
                <div style="position: absolute; top:682; right:13%; font-size:9.5pt;">
                    <p style='position: absolute; top:0;font-size:9.5pt;'>Page 2 of 3</p>
                </div>
        </div>

        <div class="page" style="border:0px green dotted; max-height:90%; font-size:9.5pt; ">
            <?php 
                    if($dataFromDB['completion'] != 'For printing'||$imageDraft == '1'){
                        echo " 
                        <div style='z-index: 999; position:absolute; top: 150px; margin-left: 40px;'>
                        <img src='". $base64."'  style='margin-left: -40px; height: 700px; opacity: 0.1; position: absolute;'>
                        <img src='". $base64IllusDraft."'  style='background-size: 100% 100%; opacity: 0.5; position: absolute;'>
                        </div>";
                    }
            ?> 
            <div style="position: relative;font-size:9.5pt;height:auto; border:0px black dotted;margin-top:-1%;top:120">
                <p style='font-weight:bold;text-decoration: underline;margin-top:5;'>Calibration Results</p>

                <div style="position: relative;font-size:9.5pt;height:auto; border:0px black dotted; ">
                    <div style="position: absolute;font-size:9.5pt;height:auto; border:0px black dotted;left:5%">
                        <p style='font-weight:bold;text-decoration: underline;margin-top:5;'>Test for Errors of Indication</p>
                        <table class="GeneratedTable" style="height:auto; width:90%;">
                                <thead>
                                    <tr>
                                        <th>Test Loads (<?= $specificationsData->unit?>)</th>
                                        <th>Indication (<?= $specificationsData->unit?>)</th>
                                        <th>Error (<?= $specificationsData->unit?>)</th>
                                        <th>Uncertainty (<?= $specificationsData->unit?>)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $maxCapacity = $specificationsData->maxCapacity;
                                        $unit = $specificationsData->unit;
                                        foreach ($calculatedData as $index => $value) {
                                           
                                            $idNumber = $index + 1;
                                            $selectedClassID = $idNumber === 1 ? 'class2' : 'class' . $idNumber;                                            
                                            $conventionalMassID = 'conventionalMassCurrentUnit'.$idNumber;
                                            $testload = 'linearLoad'.$idNumber;
                                            $indicationID = 'indication'.$idNumber;
                                            $linearErrorID = 'linearError'.$idNumber;

                                            $classPerTestPoint = $dataInputs->$selectedClassID;
                                            $conventionalMassForCMC = strval(matchDecimal(roundTo($dataInputs->$conventionalMassID, $readabilityDecimalPoint),$readabilityDecimalPoint));
                                            $expandedUncertaintyForCMC = $value->expandedUncertainty;
                                            $testloadForCMC = $dataInputs->$testload;
                                           
                                            //$uncertaintyFromCMCChecker = getCMCValue($maxCapacity, $classPerTestPoint, $unit, $conventionalMassForCMC, $expandedUncertaintyForCMC);
                                            $uncertaintyFromCMCChecker = check_cmc($maxCapacity, $classPerTestPoint, $unit, $conventionalMassForCMC, $expandedUncertaintyForCMC, $cmc);
                                            //$uncertaintyFromCMCChecker = getCMCValue($maxCapacity, $classPerTestPoint, $unit, $testloadForCMC, $expandedUncertaintyForCMC);

                                            $tr = '<tr>';
                                            $conventionalMass = '<td>'. strval(matchDecimal(roundTo($dataInputs->$conventionalMassID, $readabilityDecimalPoint),$readabilityDecimalPoint)).'</td>';
                                            $indication = '<td>'.matchDecimal($dataInputs->$indicationID, $readabilityDecimalPoint).'</td>';
                                            // $linearError = '<td>'.matchDecimal($dataInputs->$linearErrorID, $readabilityDecimalPoint).'</td>';
                                            $linearError_value = floatval(roundTo($dataInputs->$indicationID, $readabilityDecimalPoint)) - floatval(matchDecimal($dataInputs->$conventionalMassID, $readabilityDecimalPoint));
                                            $linearError = '<td>'.matchDecimal($linearError_value, $readabilityDecimalPoint).'</td>';
                                            $uncertainty = '<td>'.sigFig($uncertaintyFromCMCChecker, 2).'</td>';
                                            $trEnd = '</tr>';
                                            echo $tr. $conventionalMass. $indication. $linearError. $uncertainty. $trEnd;
                                        }
                                    ?>
                                </tbody>
                        </table>
                    </div>
                </div>
                <div style="position: relative;font-size:9.5pt;height:auto; border:0px black dotted; top:250">
                    <div style="position: absolute;font-size:9.5pt;height:auto; border:0px black dotted;left:5%">
                        <p style='font-weight:bold;text-decoration: underline;margin-top:5;'>Figure 2. Graphical Representation of error with expanded uncertainties</p>
                        <img src="<?php echo $img['image']?>" alt="Chart Error" class="myimage" style="top: 7%;position:absolute; width:90%; height:240; border-style: solid; ">
                    </div>
                </div>
            </div>
            <div style="position: absolute; top:682; right:13%; font-size:9.5pt;">
                <p style='position: absolute; top:0;font-size:9.5pt;'>Page 3 of 3</p>
            </div>
        </div>
    </main>
</body>





</html>   