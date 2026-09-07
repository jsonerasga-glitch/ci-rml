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


    $mpeFromDB = $mpeFromDB;

    $unitOfStandard = 'kPa';

    $date = $customerData->dateReceived; 
    $mysql_date = date('Y-m-d G:i:s', strtotime($date));
    $date2 = $specificationsData->sDate;
    $mysql_date2 = date('Y-m-d G:i:s', strtotime($date2));
    $date3 = $customerData->eDate; 
    $mysql_date3 = date('Y-m-d G:i:s', strtotime($date3));

    $dateCal = '<span class="label">Date Calibrated</span><span class="between">: </span><p class="text">'.date('d F Y', strtotime($mysql_date2)).'</p>';
    $dueDate = '<span class="label">Recommended Due Date</span><span class="between">: </span><p class="text">'.date('d F Y', strtotime($mysql_date3)).'</p>';
    $placeOfCali = '<span class="label">Place of Calibration</span><span class="between">: </span><p class="text">'.$specificationsData->placeOfCalibration.'</p>';
    $ambTemp = '<span class="label">Ambient Temperature</span><span class="between">: </span><p class="text">'.ambientTemp($dataInputs).' °C</p>';
    $ambhum = '<span class="label">Relative Humidity</span><span class="between">: </span><p class="text">'.ambientRH($dataInputs).' % RH</p>';
    $ambPress = '<span class="label">Atmospheric Pressure</span><span class="between">: </span><p class="text">'.ambientPressure($dataInputs).' hPa</p>';
    

    $rightSideArray = [$dateCal, $dueDate, $placeOfCali, $ambTemp, $ambhum, $ambPress];

    

    $isPAB = true;

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
	$details[] = $detailsModel->whereIn('serialNumber', $pieces)->findAll(); 	

    $datas = $calculatedData;

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
        if($decimalPlaces<0){
            $decimalPlaces = 0;
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
        $manu = '<span class="label">Manufacturer</span><span class="between">: </span><p class="text">'.$specificationsData->manufacturer.'</p>';
        $model = '<span class="label">Model No.</span><span class="between">: </span><p class="text">'.$specificationsData->model.'</p>';
        $seri = '<span class="label">Serial No.</span><span class="between">: </span><p class="text">'.$specificationsData->serialNumber.'</p>';
        $equipID = '<span class="label">Equipment ID</span><span class="between">: </span><p class="text">'.$specificationsData->equipmentID.'</p>';
       
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

    function otherCMC($value){
        $ranges = array(
            array('min' => 1000, 'max' => 10000, 'cmc' => 0.15),
            array('min' => 10000, 'max' => 100000, 'cmc' => 0.16),
            array('min' => 100000, 'max' => 200000, 'cmc' => 0.30),
            array('min' => 200000, 'max' => 500000, 'cmc' => 0.80),
            array('min' => 500000, 'max' => 1000000, 'cmc' => 1.6),
            array('min' => 1000000, 'max' => 2000000, 'cmc' => 3.0),
            array('min' => 2000000, 'max' => 5000000, 'cmc' => 8.0),
            array('min' => 5000000, 'max' => 10000000, 'cmc' => 160),
            array('min' => 10000000, 'max' => 20000000, 'cmc' => 300),
            array('min' => 20000000, 'max' => 50000000, 'cmc' => 800),
        );
 
        foreach ($ranges as $range) {
            if ($value >= $range['min'] && $value <= $range['max']) {
                return $range['cmc'];
            }
        }
 
        return 0;
    }
    function getCMCValue($range, $class, $unit, $uncertain, $mpeFromDB, &$isPAB){
        $float_val = floatval($range);
        $float_uncertain = floatval($uncertain);
        $range_mg = intval(convertToMg($float_val, $unit));
        $processedClass = removeSubscripts($class);
        $cmc;
     
      
     
        if(classSearch($processedClass, "F1")){
            $rangeCMC = [
                '50000' => 0.13,
                '100000' => 0.16,
                '200000' => 0.3,
                '500000' => 0.8,
                '1000000' => 1.6,
                '2000000' => 3.0,
                '5000000' => 8.0,
            ];
            $pab_condition = isset($rangeCMC[$range_mg]);
            if($pab_condition){
                $cmc = $rangeCMC[$range_mg];
            }else{
                $cmc = floatval(get_mpe($range, $unit, $processedClass, $mpeFromDB));
            }
            
        }
        elseif(classSearch($processedClass, "F2")){
            $rangeCMC = [
                '2000' => 0.15,
                '5000' => 0.16,
                '10000' => 0.20,
                '20000' => 0.25,
                '50000' => 0.3,
                '100000' => 0.5,
                '200000' => 1.0,
                '500000' => 2.5,
                '1000000' => 5.0,
                '2000000' => 10,
                '5000000' => 25,
            ];
            $pab_condition = isset($rangeCMC[$range_mg]);
            if($pab_condition){
                $cmc = $rangeCMC[$range_mg];
            }else{
                $cmc = floatval(get_mpe($range, $unit, $processedClass, $mpeFromDB));
            }
        }
        elseif(classSearch($processedClass, "M1") || classSearch($processedClass, "M2")){
            $rangeCMC = [
                '200' => 0.20,
                '500' => 0.25,
                '1000' => 0.30,
                '2000' => 0.40,
                '5000' => 0.50,
                '10000' => 0.60,
                '20000' => 0.80,
                '50000' => 1.0,
                '100000' => 1.6,
                '200000' => 3.0,
                '500000' => 8.0,
                '1000000' => 16,
                '2000000' => 30,
                '5000000' => 80,
                '10000000' => 160,
                '20000000' => 300,
                '50000000' => 800,
            ];
            $pab_condition = isset($rangeCMC[$range_mg]);
            if($pab_condition){
                $cmc = $rangeCMC[$range_mg];
            }else{
                $cmc = floatval(get_mpe($range, $unit, $processedClass, $mpeFromDB));
            }
        }
        else{
            $cmc = otherCMC($range_mg);
        }
     
        if($float_uncertain > $cmc){
            return $float_uncertain;
        }else{
            return $cmc;
        }
    }

    function get_mpe($value, $unit, $class, $mpe_data){
        $class_MPE = [
            'M3' => 'M2',
            'M2' => 'M1',
            'M1' => 'F2',
            'F2' => 'F1',
            'F1' => 'E2',
            'E2' => 'E1',
        ];

        $mpe_data_class = searchInArrayDetails('class', $class_MPE[$class], $mpe_data);
        $mpe_data_value = searchInArrayDetails('nominalValue', $value, $mpe_data_class);
        $mpe_data_Unit = searchInArrayDetails('nominalUnit', $unit, $mpe_data_value);
        //var_dump($mpe_data_class);
        return $mpe_data_Unit[0]['MPE'];
    }

    function check_cmc($range, $class, $unit, $uncertain, $mpeFromDB, &$isPAB, $cmc_array){
        $number_to_class = [
            '0' => 'E1',
            '1' => 'E2',
            '2' => 'F1',
            '3' => 'F2',
            '4' => 'M1',
            '5' => 'M2',
            '6' => 'FREE',
        ];

        $float_val = floatval($range);
        $float_uncertain = floatval($uncertain);
        $range_mg = floatval(convertToMg($float_val, $unit));
        $processedClass = removeSubscripts($class);

        $cmc_conditions = json_decode($cmc_array[0]['conditions']);
        $count_of_conditions = count($cmc_conditions);

        $class_UUC = $processedClass == 'None Indicated' ? 'FREE' : $processedClass;

        for ($i=0; $i < $count_of_conditions; $i++) { 
            $classID = 'classRow'.($i+1);
            $rangeMinID = 'rangeMinRow'.($i+1);
            $rangeMinUnitID = 'rangeMinUnitRow'.($i+1);
            $rangeMaxID = 'rangeMaxRow'.($i+1);
            $rangeMaxUnitID = 'rangeMaxUnitRow'.($i+1);
            $cmcValueID = 'cmcValueRow'.($i+1);

            $range_min = floatval($cmc_conditions[$i]->$rangeMinID);
            $range_max = floatval($cmc_conditions[$i]->$rangeMaxID);

            $range_min_mg = convertUnit($range_min, $cmc_conditions[$i]->$rangeMinUnitID, 'mg');
            $range_max_mg = convertUnit($range_max, $cmc_conditions[$i]->$rangeMaxUnitID, 'mg');
            
            // if(classSearch($class_UUC,  $number_to_class[$cmc_conditions[$i]->$classID])){
            //     if($class_UUC != 'FREE'){
            //         if($range_min === $range_max){
            //             if($range_mg == $range_max_mg){
            //                 $cmc = $float_uncertain >= floatval($cmc_conditions[$i]->$cmcValueID) ? $float_uncertain : floatval($cmc_conditions[$i]->$cmcValueID);
            //             }else{
            //                 $cmc = floatval(get_mpe($float_val, $unit, $processedClass, $mpeFromDB));
            //             }
            //         }
            //     }
            //    else if($class_UUC == 'FREE'){
            //         if($float_val >= $range_min && $float_val <= $range_max){
            //             $cmc = $float_uncertain >= floatval($cmc_conditions[$i]->$cmcValueID) ? $float_uncertain : floatval($cmc_conditions[$i]->$cmcValueID);
            //         }
            //     }
            // }
            
            if($class_UUC != 'FREE'){
                if(classSearch($class_UUC,  $number_to_class[$cmc_conditions[$i]->$classID])){
                    if($range_mg >= $range_min_mg && $range_mg <= $range_max_mg){
                        $cmc = floatval($cmc_conditions[$i]->$cmcValueID);
                        break;
                    }else{
                        $cmc = floatval(get_mpe($float_val, $unit, $processedClass, $mpeFromDB));
                    }
                }
            }elseif($class_UUC == 'FREE'){
                if($range_mg >= $range_min_mg && $range_mg <= $range_max_mg){
                    $cmc = floatval($cmc_conditions[$i]->$cmcValueID);
                }
            }
        }

        $uncertainty = $float_uncertain > $cmc ? $float_uncertain : $cmc;
        return $uncertainty;

    }

    function searchInArrayDetails($key_to_get, $value, $array){
        $result = [];
        foreach ($array as $key => $val) {
                if ($val[$key_to_get] == $value) {
                    array_push($result, $val);
                }   
        }
        return $result;
    }

    function ambient($start, $end){
        $float_start = floatval($start);
        $float_end = floatval($end);
        $average = round((($float_start + $float_end) / 2), 1);
        $result = round(abs($float_end - $average), 1);
        return "(" . $average. " ± " . $result . ")";
    }

    function ambientTemp($dataInputs){
        $countOfTable = count(get_object_vars($dataInputs));
        $firstTable = 'table1';
        $lastTable = 'table'.$countOfTable;

        $start = $dataInputs->$firstTable->TemperatureStart;
        $finished = $dataInputs->$lastTable->TemperatureFinish;
        
        return ambient($start, $finished);
    }
    function ambientRH($dataInputs){
        $countOfTable = count(get_object_vars($dataInputs));
        $firstTable = 'table1';
        $lastTable = 'table'.$countOfTable;

        $start = $dataInputs->$firstTable->HumidityStart;
        $finished = $dataInputs->$lastTable->HumidityFinish;
        
        return ambient($start, $finished);
    }
    function ambientPressure($dataInputs){
        $countOfTable = count(get_object_vars($dataInputs));
        $firstTable = 'table1';
        $lastTable = 'table'.$countOfTable;

        $start = $dataInputs->$firstTable->PressureStart;
        $finished = $dataInputs->$lastTable->PressureFinish;
        
        return ambient($start, $finished);
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
        <?php
            if($isPAB){
                echo "<img src='".$base64PAB."' alt='PAB LOGO' height='80px' style='position: absolute; top:0; left:425'>";
            }
        ?>
        
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
                                <span class="label">Equipment</span><span class="between">: </span><p class="text"><?php echo $specificationsData->equipmentDescription?></p>
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
                                echo $placeholders[0]['module3CalibrationProcedureAndTraceability'];
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
               
                  
                <div class="" style="position: relative;font-size:9.5pt;height:auto;border:0px blue dotted;margin-top:5px">
                    <p style='font-weight:bold;text-decoration: underline;font-size:9.5pt;top:2;'>Calibration Results</p>
                    <p style='max-width:95%;font-size:9.5pt;margin-top:-10;'>
                        <?php 
                            if($dataFromDB['settingCalibrationResults'] == ""){
                                echo $placeholders[0]['module3CalibrationResults'];
                            }else{
                                echo $dataFromDB['settingCalibrationResults'];
                            }
                        ?>
                    </p>
                </div> 
                <div class="" style="position: relative;font-size:9.5pt;height:auto;border:0px green dotted;margin-top:5px">
                    <p style='font-weight:bold;text-decoration: underline;font-size:9.5pt;top:2;'>Uncertainty of Measurement</p>
                    <p style='max-width:95%;font-size:9.5pt;margin-top:-10;'><?=$dataFromDB['settingUncertaintyOfMeasurement']?>
                        <?php 
                            if($dataFromDB['settingUncertaintyOfMeasurement'] == ""){
                                echo $placeholders[0]['module3UncertaintyOfMeasurement'];
                            }else{
                                echo $dataFromDB['settingUncertaintyOfMeasurement'];
                            }
                        ?>
                    </p>
                </div>  
                <div class="" style="position: relative;font-size:9.5pt;height:auto; border:0px black dotted;margin-top:15px">
                    <p style='font-weight:bold;text-decoration: underline;margin-top:5;'>Remarks:</p> <br>
                    <table style="border: 0px; width: 90%; font-size:9.5pt;margin-top:-15;">
                        <tbody>
                            <?php
                                if($dataFromDB['settingRemarks1'] == ""){
                                    $remarks = $placeholders[0]['module3Remarks'];
                                }else{
                                    $remarks = $dataFromDB['settingRemarks1'];
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
                
                <div style="position: relative;font-size:9.5pt;height:auto; border:0px black dotted;margin-top:-1%;top:170">
                    <p style='font-weight:bold;text-decoration: underline;margin-top:5;'>Calibration Results</p>

                    <table width="100%" style="text-align:center;">
                        <thead>
                            <tr>
                                <th colspan="2">Nominal Value</th>
                                <th></th>
                                <th><?php if( str_contains(strtoupper($specificationsData->serialNumber), 'SEE MEASUREMENT RESULT') ){echo'Serial Number';}else{echo 'Marking';}?></th>
                                <th></th>
                                <th colspan="1">Conventional Mass</th>
                                <th></th>
                                <th colspan="2">Uncertainty</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $trStart = '<tr>';
                            $trEnd = '</tr>';
                            $tdStartLeft = '<td style="text-align:left">';
                            $tdStartRight = '<td style="text-align:right">';
                            $tdStartCenter = '<td style="text-align:center">';
                            $tdEnd = '</td>';
                            $countOfTable = count(get_object_vars($dataInputs));

                            $approxClass = $specificationsData->approxClass;

                            for ($i=1; $i <= $countOfTable; $i++) { 
                                $tableWithNumber = 'table'.$i;
                                $tableWithNumberCaps = 'Table'.$i;
                                $SampleNominalValueTable = 'SampleNominalValueTable'.$i;
                                $SampleNominalUnitTable = 'SampleNominalUnitTable'.$i;
                                $SampleMarkingTable = 'SampleMarkingTable'.$i;
                                $uncertaintyUnitTable = 'uncertaintyUnitTable'.$i;
                                
                                $nominalValue = $dataInputs->$tableWithNumber->$SampleNominalValueTable;
                                $nominalUnit = $dataInputs->$tableWithNumber->$SampleNominalUnitTable;

                                $uncertaintyUnitValue = isset($dataInputs->$tableWithNumber->$uncertaintyUnitTable) ? $dataInputs->$tableWithNumber->$uncertaintyUnitTable : '';

                                $marking = $dataInputs->$tableWithNumber->$SampleMarkingTable == '' ? 'None' : $dataInputs->$tableWithNumber->$SampleMarkingTable; 
                                $deviation = floatval($calculatedData->$tableWithNumberCaps->deviationCalculated->value);

                                $convenMassSign = $deviation > 0 ? '+' : '-';
                                // $uncertaintyUnit = $nominalUnit == 'kg' ? 'g' : ($nominalUnit == 'g' ? 'mg' : 'mg');
                                if($uncertaintyUnitValue != ""){
                                    $uncertaintyUnit = $uncertaintyUnitValue; 
                                }else{
                                    $uncertaintyUnit = $nominalUnit == 'kg' ? 'g' : ($nominalUnit == 'g' ? 'mg' : 'mg');
                                }
                                                              
                                $expandedUncertainty = floatval($calculatedData->$tableWithNumberCaps->expandedUncertainty->value);
                                $expandedUncertaintyMG = convertUnit($expandedUncertainty, 'g', 'mg');
                                // $expandedUncertaintyMG = convertUnit($expandedUncertainty, $nominalUnit, 'mg');
                                //$cmcConsideredUncertainty = getCMCValue($nominalValue, $approxClass, $nominalUnit, $expandedUncertaintyMG, $mpeFromDB, $isPAB);
                                $cmcConsideredUncertainty = check_cmc($nominalValue, $approxClass, $nominalUnit, $expandedUncertaintyMG, $mpeFromDB, $isPAB, $cmc);
                                $expandedUncertaintyMGtoUnit = convertUnit($cmcConsideredUncertainty, 'mg', $uncertaintyUnit);
                                $expandedUncertaintyMGtoUnitSigFig = sigFig($expandedUncertaintyMGtoUnit, 2);

                                $expandedUncertaintySigFigNumberOfDecimal = seeDecimal($expandedUncertaintyMGtoUnitSigFig);
                                if($uncertaintyUnit == 'mg' && $expandedUncertaintySigFigNumberOfDecimal == '0'){
                                    $expandedUncertaintySigFigNumberOfDecimal = 2;
                                }

                                // $deviationConverted = $uncertaintyUnit == 'g' ? abs($deviation) * 1000 : ($uncertaintyUnit == 'mg' ? abs($deviation) : abs($deviation));

                                $deviationConverted = convertUnit(abs($deviation), $nominalUnit, $uncertaintyUnit);
                                $deviation_format = matchDecimal($deviationConverted, $expandedUncertaintySigFigNumberOfDecimal);

                                $conventionalMassHTML = $dataInputs->$tableWithNumber->$SampleNominalValueTable . " " . $nominalUnit . ' ' . $convenMassSign . " " . $deviation_format . " " . $uncertaintyUnit;                                
                                
                                echo $trStart;
                                echo $tdStartRight . $dataInputs->$tableWithNumber->$SampleNominalValueTable . $tdEnd;
                                echo $tdStartLeft . $nominalUnit . $tdEnd;
                                echo $tdStartCenter . $tdEnd;
                                echo $tdStartCenter . $marking . $tdEnd;
                                echo $tdStartCenter . $tdEnd;
                                echo $tdStartCenter . $conventionalMassHTML . $tdEnd;    
                                echo $tdStartCenter . $tdEnd;
                                echo $tdStartRight . $expandedUncertaintyMGtoUnitSigFig . $tdEnd;
                                echo $tdStartLeft . $uncertaintyUnit . $tdEnd;
                                echo $trEnd;

                            }
                            
                            

                            ?>
                        </tbody>
                    </table>

                </div>
                
                <div style="position: absolute; top:682; right:10%; font-size:9.5pt;">
                    <p style='position: absolute; top:0;font-size:9.5pt;'>2 of 2</p>
                </div>
        </div>

    </main>
</body>





</html>   