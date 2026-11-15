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

    $tableNumber = 1; $tableNumber <= $tableNumber; $tableNumber++;

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
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@3.4.1/dist/chart.min.js "></script> 
 
<?php
    use App\Models\DigitalTimerStandardModel;
    
    $detailsModel = new DigitalTimerStandardModel();
    $arrayOfWeights = $dataFromDB['standard'];
    $pieces = explode("(SPLITHERE)", $arrayOfWeights);
	$details[] = $detailsModel->whereIn('certificateNumber', $pieces)->findAll(); 	

    $datas = $calculatedData;
      
    /**Assuming the number of tables is known or can be determined dynamically */
    $numTable = 1;
    for ($tableNumber = 1; $tableNumber <= $numTable; $tableNumber++) {
        $currentTable = 'table' . $tableNumber;
        $tableData = $calculatedData->$currentTable;
    }
          
    $uncertaintyDecimalPoint = seeDecimal(sigFig($tableData->expandedUncertainty,2));

    $stdReferenceDecimalPointValue = TrimTrailingZeroes($tableData->standardResolutionValue);
    $stdReferenceDecimalPoint = seeDecimal($stdReferenceDecimalPointValue);

    $uucReferenceDecimalPointValue = TrimTrailingZeroes($tableData->uucResolution);
    $uucReferenceDecimalPoint = seeDecimal($uucReferenceDecimalPointValue);
   
    function TrimTrailingZeroes($nbr) {
        return strpos($nbr,'.')!==false ? rtrim(rtrim($nbr,'0'),'.') : $nbr;
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
        $manu = '<span class="label">Manufacturer</span><span class="between">: </span><p class="text">'.$specificationsData->manufacturer.'</p>';
        $model = '<span class="label">Model No.</span><span class="between">: </span><p class="text">'.$specificationsData->modelNumber.'</p>';
        $seri = '<span class="label">Serial No.</span><span class="between">: </span><p class="text">'.$specificationsData->serialNumber.'</p>';
        $equipID = '<span class="label">Equipment ID</span><span class="between">: </span><p class="text">'.$specificationsData->equipmentId.'</p>';
        array_push($leftSideArray,$manu);
        array_push($leftSideArray,$model);
        array_push($leftSideArray,$seri);
        array_push($leftSideArray,$equipID); 
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

    function calculateDifference($value1,$value2){
        $val1 = strval($value1);
        $val2 = strval($value2);
        $result = $val1 -  $val2;
        
        return $result;
    }

    function getAsString($value) {
        $stringValue = strval($value);
        return $stringValue;
    }
    
    function secondsToHour($value) {
        $result = $value / 3600; // 3600 seconds in an hour
        return $result;
    }
    
    function secondsToMinutes($value) {
        $result = $value / 60; // 60 seconds in a minute
        return $result;
    }
    
    function secondsToMilliseconds($value) {
        $result = $value * 60; // Convert seconds to milliseconds
        return $result;
    }
    
    function explodeNumbers($number) {
        $parts = explode('.', $number);
        $integerPart = isset($parts[0]) ? $parts[0] : '00';
        $decimalPart = isset($parts[1]) ? $parts[1] : '00'; // Default decimal part to '00'
        return array($integerPart, $decimalPart);
    }

    function explodeNumberDecimal($number) {
        $parts = explode('.', $number);
        $integerPart = isset($parts[0]) ? $parts[0] : 0;
        $decimalPart = isset($parts[1]) ? $parts[1] : 0;
        return array($integerPart, $decimalPart);
    }

    $rangeToBeCalibrated = 10800;
    $cmc = 0.0059;
    $numTables = 1;

    for ($tableNumber = 1; $tableNumber <= $numTables; $tableNumber++) {
        $currentTable = 'table' . $tableNumber;
        $tableData = $calculatedData->$currentTable;
   
        $timerCalibrationReadingValue =  roundTo($tableData->timerCalibrationReading,$uucReferenceDecimalPoint) ;
        $timerCalibrationReading =  matchDecimal($timerCalibrationReadingValue,$uucReferenceDecimalPoint) ;

        $standardTimerReadingValue = roundTo($tableData->standardTimerReading, $stdReferenceDecimalPoint);
        $standardTimerReading = matchDecimal($standardTimerReadingValue,  $stdReferenceDecimalPoint);

        $offsetValue =  ($timerCalibrationReading - $standardTimerReading);
        $offset = matchDecimal($offsetValue, $stdReferenceDecimalPoint);
        $expandedUncertainty =  sigFig($tableData->expandedUncertainty, 2) ;

        /** Convert seconds to hours, minutes, and seconds */
        $timerCalibrationReadingStringValue = getAsString($timerCalibrationReading);

        $convert_Hour = secondsToHour($timerCalibrationReadingStringValue); 
        $convert_Minutes = secondsToMinutes($timerCalibrationReadingStringValue);   
                
        list($timerReadingHour, $unusedDecimal) = explodeNumbers($convert_Hour);
        list($timerReadingMinutes, $decimalSeconds) = explodeNumbers($convert_Minutes - ($timerReadingHour * 60));

        $remainingSeconds = $timerCalibrationReading - ($timerReadingHour * 3600) - ($timerReadingMinutes * 60);
        list($timerReadingSeconds, $decimalMilliseconds) = explodeNumbers($remainingSeconds);

   
        $milisecondsValue = matchDecimal($timerCalibrationReadingStringValue, $uucReferenceDecimalPoint);
        list($integer,$timerReadingMilliseconds) = explodeNumberDecimal($milisecondsValue);

        $timerReadingHour = str_pad($timerReadingHour, 2, '0', STR_PAD_LEFT);
        $timerReadingMinutes = str_pad($timerReadingMinutes, 2, '0', STR_PAD_LEFT);
        $timerReadingSeconds = str_pad($timerReadingSeconds, 2, '0', STR_PAD_LEFT);
     
        /**
         * adjusting  timer reading to account for timer calibration error
         */
        if ($timerCalibrationReading <= $rangeToBeCalibrated){
            $expandedUncertainty = $expandedUncertainty > $cmc ? $expandedUncertainty : $cmc;
        }
        else if ($rangeToBeCalibrated > 10800){
            $expandedUncertainty = $expandedUncertainty;
        }
      
    }

    function check_cmc($max_range, $unit, $expandedUncertain, $cmc_array){
        $float_max_range = floatval($max_range);
        $cmc_conditions = json_decode($cmc_array[0]['conditions'], true);
        $count_of_conditions = count($cmc_conditions);
        $cmc = $expandedUncertain;
        $uncertainty_float = floatval($expandedUncertain);

        foreach($cmc_conditions as $key => $value){
            $row_num = $key + 1;
            
            $rangeMin_key = 'rangeMinRow'.$row_num;
            $rangeMinUnit_key = 'rangeMinUnitRow'.$row_num;
            $rangeMax_key = 'rangeMaxRow'.$row_num;
            $rangeMaxUnit_key = 'rangeMaxUnitRow'.$row_num;
            $cmcValue_key = 'cmcValueRow'.$row_num;

            $range_min = floatval($value[$rangeMin_key]);
            $range_max = floatval($value[$rangeMax_key]);

            if($value[$rangeMinUnit_key] == 's'){
                $range_min = $range_min * 1000; // convert to ms
            }
            if($value[$rangeMaxUnit_key] == 's'){
                $range_max = $range_max * 1000; // convert to ms
            }
            if($unit == 's'){
                $float_max_range = $float_max_range * 1000; // convert to ms
            }

            if($float_max_range >= $range_min && $float_max_range <= $range_max){
                if($uncertainty_float <= $value[$cmcValue_key]){
                    $cmc = $value[$cmcValue_key];
                }
            }
        
        }

        return $cmc;
    }

?>

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
                <!-- Equipment -->
                <div style="position:absolute;top:120;height:auto;border:0px solid red">
                <div class='' style="position:relative;height:auto;">
                    <ul class='ul'>
                        <li class='li'>
                            <div class="item">
                                <span class="label">Equipment</span><span class="between">: </span><p class="text">
                                   <?php echo $specificationsData->equipmentDescription?> 
                                </p>
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
                <!-- Calibration Procedure and Traceability -->
                <div class="" style="position: relative;height:auto;font-size:9.5pt;margin-top:20px">
                    <p style='font-weight:bold;text-decoration: underline;'>Calibration Procedure and Traceability</p>
                    <p style='margin-top:-10;'>
                        <?php 
                            if($dataFromDB['settingCalibrationProcedureAndTraceability'] == ""){
                                echo $placeholders[0]['module6CalibrationProcedureAndTraceability'];
                            }else{
                                echo $dataFromDB['settingCalibrationProcedureAndTraceability'];
                            }
                        ?>
                    </p>
                </div>
              <!-- standard  table -->
              <div class="" style="position: relative; font-size:9.5pt;">
                        <table style="border: 0px solid black; min-width: 95%; text-align: center;line-height: 1;" id="standardTable">
                            <thead style="border: 0px solid blue;">
                                <tr>
                            
                                <th width="30%" align="left" >
                                    <u style='font-size:9.5pt;font-weight:none; margin-left:20px'>Standard Used</u>
                                </th>
                           

                                <th width="35%">
                                    <u style='font-size:9.5pt;font-weight:none;'>Calibration Certificate No.</u>
                                </th>
                             
                                <th width="30%"> 
                                    <u style='font-size:9.5pt;font-weight:none;'>Issuing Laboratory</u>
                                </th>

                             
                            </tr>
                            </thead>
                            <tbody style="border: 0px solid red;">
                                <?php  
                                    $classString = $details[0]; 
                                    for($i = 0; $i < count($details[0]);$i++){
                                        echo " <td><p style='margin-top: 0;margin-left:20px; text-align:left; '>" . $classString[$i]['description']."</p></td>";
                                       

                                   
                                        echo "<td ><p style='margin-top:0;'>". $classString[$i]['certificateNumber']. "</p></td>";
                                 
                                        
                                        echo "<td  ><p style='margin-top:0; margin-left:3;'>". $classString[$i]['calibrationProvider']. "</p></td>";
                                 
                                  
                                 
                                 
                                       
                                      
                                    }
                                ?>
                            </tbody>
                        </table>
                </div>        
                <!-- calibration results     -->
                <div class="" style="position: relative;font-size:9.5pt;height:auto;border:0px blue dotted;margin-top:20px">
                    <p style='font-weight:bold;text-decoration: underline;font-size:9.5pt;top:2;'>Calibration Results</p>
                    <p style='max-width:95%;font-size:9.5pt;margin-top:-10;'>
                        <?php 
                            if($dataFromDB['settingCalibrationResults'] == ""){
                                echo $placeholders[0]['module6CalibrationResults'];
                            }else{
                                echo $dataFromDB['settingCalibrationResults'];
                            }
                        ?>
                    </p>
                </div>     
                <!-- Uncertainty of Measurement -->
                <div class="" style="position: relative;font-size:9.5pt;height:auto;border:0px green dotted;margin-top:20px">
                    <p style='font-weight:bold;text-decoration: underline;font-size:9.5pt;top:2;'>Uncertainty of Measurement</p>
                    <p style='max-width:95%;font-size:9.5pt;margin-top:-10;'><?=$dataFromDB['settingUncertaintyOfMeasurement']?>
                        <?php 
                            if($dataFromDB['settingUncertaintyOfMeasurement'] == ""){
                                echo $placeholders[0]['module6UncertaintyOfMeasurement'];
                            }else{
                                echo $dataFromDB['settingUncertaintyOfMeasurement'];
                            }
                        ?>
                    </p>
                </div> 
                <!-- remarks -->
                <div class="" style="position: relative;font-size:9.5pt;height:auto;border:0px green dotted;margin-top:20px">
                    <p style='font-weight:bold;text-decoration: underline;font-size:9.5pt;top:2;'>Remarks:</p>
                    <br>
                    <table style="border: 0px; width: 90%; font-size:9.5pt;margin-top:-15;">
                        <tbody>
                            <?php
                                if($dataFromDB['settingRemarks'] == ""){
                                    $remarks = $placeholders[0]['module6Remarks'];
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
                <!-- end div -->
            </div>
            <div style="position: absolute; top:635; left:6%; font-size:9.5pt;">
                <p style='position: absolute; top:0;text-decoration: underline;font-size:9.5pt;'> <?php echo $dataFromDB['calibrationOfficer'];?></p>
                <p style='position: absolute; top:15;font-size:9.5pt;'>Calibration Officer</p>
            </div>
            <div style="position: absolute; top:635; left:70%; font-size:9.5pt;">
                <p style='position: absolute; top:0;text-decoration: underline;font-size:9.5pt;'><?php echo $dataFromDB['checkedBy'];?></p>
                <p style='position: absolute; top:15;font-size:9.5pt;'><?php echo $dataFromDB['verifierPosition'];?></p>
            </div>
            <div style="position: absolute; top:682; right:10%; font-size:9.5pt;">
                <p style='position: absolute; top:0;font-size:9.5pt;'>1 of 2</p>
            </div>
        <!-- end page 1 -->
        </div>
        <!-- end page 2 -->
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
                      <table class="GeneratedTable" style="height:auto; width:90%;">
                                <thead>
                                    <tr>
                                        <th> Standard Timer Reading </th>
                                        <th colspan= '2'>Timer Under Calibration Reading	 </th>
                                        <th>Offset, s</th>
                                        <th>Uncertainty, s		</th>	
                                    </tr>
                                </thead>
                                <tbody>
                                <?php      
                                        echo '<tr>';
                                        echo '<td>' . $standardTimerReading . ' ' .  $specificationsData->unit . '</td>';      
                                        echo '<td>' . $timerCalibrationReading . ' ' .  $specificationsData->unit . '</td>';  
                                        /**Convert the string values back to integers for checking */
                                            $hour = (int)$timerReadingHour;
                                            $minutes = (int)$timerReadingMinutes;
                                            $seconds = (int)$timerReadingSeconds;
                                            $milliseconds = (int)$timerReadingMilliseconds;
                                        echo '<td>';
                                            // Display hours if greater than 0
                                            if ($hour > 0) {
                                                echo $timerReadingHour . ':';
                                            }
                                            // Display minutes if greater than 0 or if hours were displayed (to ensure proper formatting)
                                            if ($minutes > 0 || $hour > 0) {
                                                echo $timerReadingMinutes . '`';
                                            }
                                                // Always display seconds
                                                echo $timerReadingSeconds . '``';


                                                
                                            if ($uucReferenceDecimalPoint > 0) {
                                                echo '<span class="small-font">' . $timerReadingMilliseconds . '</span>';
                                            } else {
                                                echo '<span class="small-font"></span>'; // No milliseconds to display
                                            }

                                            echo '</td>';
                                       



                                        echo '<td>' . $offset . '</td>';
                                        $uncertainty_checked = check_cmc($timerCalibrationReading, $specificationsData->unit, $expandedUncertainty, $cmc_data);
                                        echo '<td>' . $uncertainty_checked . '</td>';
                                        echo '</tr>';                                                            
                                ?>
                                </tbody>
                        </table>  
                            
                                
                    <!-- Uncertainty of Measurement -->
                    <div class="" style="position: relative;font-size:9.5pt;height:auto;border:0px green dotted;margin-top:20px ;margin-left:100px">                 
                        <?php 
                            if (empty($dataFromDB['settingOffsetInfo'])) {
                                $offsetInfo = $placeholders[0]['module6OffsetInfo'];
                            } else {
                                $offsetInfo = $dataFromDB['settingOffsetInfo'];
                            }
                            
                            /** Split the offset information into an array using "." as a delimiter */
                            $remarksSeparated1 = explode(".", $offsetInfo);
                            /** Iterate through the separated info and display each item in a new row */
                            echo "<table>";
                            foreach ($remarksSeparated1 as $remark) {
                                /**Trim any leading or trailing whitespace from the remark*/
                                $remark = trim($remark);
                            
                                /**Only display non-empty remarks*/
                                if (!empty($remark)) {
                                    echo "<tr valign='top' style='font-size:9.5pt;'><td></td><td>{$remark}<br></td></tr>";
                                }
                            }
                            echo "</table>";
                        ?>
                       
                    </div> 

                    </div>
                    </div>          
            </div>
            <div style="position: absolute; top:682; right:10%; font-size:9.5pt;">
                <p style='position: absolute; top:0;font-size:9.5pt;'>2 of 2</p>
            </div>
        </div> 

    </main>
</body>
</html>   
<style>
    .small-font {
        font-size: 80%; /* Adjust the percentage as needed */
    }
</style>
