<?php 
    $path = 'image/dostLogoBigger-svg.png';
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

    $dateCal = '<span class="label">Date Calibrated</span><span class="between">: </span><p class="text">'.date('d F Y', strtotime($mysql_date2)).'</p>';
    $dueDate = '<span class="label">Recommended Due Date</span><span class="between">: </span><p class="text">'.date('d F Y', strtotime($mysql_date3)).'</p>';
    $placeOfCali = '<span class="label">Place of Calibration</span><span class="between">: </span><p class="text">'.$specificationsData->placeOfCalibration.'</p>';
    $ambTemp = '<span class="label">Ambient Temperature</span><span class="between">: </span><p class="text">'.ambient(floatval($environmentData -> tempStart), floatval($environmentData->tempEnd)).'°C</p>';
    $ambhum = '<span class="label">Relative Humidity</span><span class="between">: </span><p class="text">'.ambient(floatval($environmentData -> rhStart), floatval($environmentData->rhEnd)).' % R.H.</p>';

    $rightSideArray = [$dateCal, $dueDate, $placeOfCali, $ambTemp, $ambhum];

    $selectedStandard = $dataFromDB['standard'];
    $selectedStandardPieces = explode("(SPLIT)", $selectedStandard);
    $selectedStandardDetails = $standardDetails; 	

    $datas = $calculatedData;
    $unitOfStandard = 'kPa';
    $originalUnitOfStandard = '';

    function TrimTrailingZeroes($nbr) {
        return strpos($nbr,'.')!==false ? rtrim(rtrim($nbr,'0'),'.') : $nbr;
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
        $model = '<span class="label">Identifying Mark/Model</span><span class="between">: </span><p class="text">'.$specificationsData->modelNumber.'</p>';
        $seri = '<span class="label">Serial No.</span><span class="between">: </span><p class="text">'.$specificationsData->serialNumber.'</p>';
        $equipID = '<span class="label">Equipment ID</span><span class="between">: </span><p class="text">'.$specificationsData->equipmentId.'</p>';
        $range = '<span class="label">Range</span><span class="between">: </span><p class="text">'.$specificationsData->range. " ". $specificationsData->rangeUnit.'</p>';
        $reso = '<span class="label">Graduation</span><span class="between">: </span><p class="text">'.$specificationsData->resolution. " ". $specificationsData->resolutionUnit.'</p>';
        

        array_push($leftSideArray,$manu);
        array_push($leftSideArray,$model);
        array_push($leftSideArray,$seri);
        array_push($leftSideArray,$equipID);
        array_push($leftSideArray,$range);
        array_push($leftSideArray,$reso);

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

    function convertVolume($value, $fromUnit, $toUnit) {
        $conversionTable = [
            'microliters' => 1,
            'milliliters' => 1000,
        ];
    
        if (!array_key_exists($fromUnit, $conversionTable) || !array_key_exists($toUnit, $conversionTable)) {
            return "Invalid units provided";
        }
    
        $conversionFactor = $conversionTable[$toUnit] / $conversionTable[$fromUnit];
    
        return $value * $conversionFactor;
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

    function calculateAverage($numbers){
        $sum = array_sum($numbers);
        $count = count($numbers);
        $average = $sum / $count;
        
        return $average;
    }

    function getAverageOfObject($obj){
        $keys = array_keys(get_object_vars($obj));
        $countOfkeys = count($keys);
        $sumOfObjects = 0;
        foreach ($keys as $key) {
            $val = floatval($obj -> $key);
            $sumOfObjects += $val;
        }
        return $sumOfObjects/$countOfkeys;
        
    }

    function ambient($start, $end){
        $float_start = floatval($start);
        $float_end = floatval($end);
        $average = round((($float_start + $float_end) / 2), 1);
        $result = round(abs($float_end - $average), 1);
        return "(" . $average. " ± " . $result . ")";
    }

    function standardUsedGetDetails($array_selectedStandard, $array_standardDetails, &$originalUnitOfStandard){
        $originalUnitOfStandard = '';
        $selectedStandardsInRow = '';
        foreach ($array_standardDetails as $item){
            if(in_array($item['serialNumber'], $array_selectedStandard)){
                // $originalUnitOfStandard = $item['unit_Original'];
                $originalUnitOfStandard = $item['unit_Converted'];
                $description = $item['standardDescription'];
                $certificateNumber = $item['calibrationCertificate'];
                $calibrationProvider = $item['laboratory'];
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
    
    function interpolationOfCorrection_conversionIncluded($num_tp_min, $num_tp_max, $num_corr_min, $num_corr_max, $num_mid, $unit_from, $unit_to){
        $float_tp_min = floatval($num_tp_min);
        $float_tp_max = floatval($num_tp_max);
        $float_corr_min = floatval($num_corr_min);
        $float_corr_max = floatval($num_corr_max);
        $float_mid = floatval($num_mid);

        $converted_float_tp_min = convert2($float_tp_min, $unit_from, $unit_to);
        $converted_float_tp_max = convert2($float_tp_max, $unit_from, $unit_to);
        $converted_float_corr_min = convert2($float_corr_min, $unit_from, $unit_to);
        $converted_float_corr_max = convert2($float_corr_max, $unit_from, $unit_to);

    
        $diff_tp = $converted_float_tp_max - $converted_float_tp_min;
        $diff_corr = $converted_float_corr_max - $converted_float_corr_min;
        $ratio = $diff_corr / $diff_tp;
    
        $correction = $converted_float_corr_min + (($float_mid - $converted_float_tp_min) * $ratio);
        return $correction;
    }

    function generateTableUsingTableNumber($tableNumber, $array_DataInputs, $array_CalculatedData){
        $divS = "<div>";
        $divE = "</div>";
        $tableS = '<table class="resultTable" width="100%">';
        $tableE = '</table>';
        $theadS = '<thead>';
        $theadE = '</thead>';
        $tbodyS = '<tbody>';
        $tbodyE = '</tbody>';
        $trS = '<tr>';
        $trE = '</tr>';

        $labels = '<tr>
        <td colspan="2" style="border: 0px solid blue; font-size:9.5pt;">Test Point</td>
        <td colspan="2" style="border: 0px solid blue; font-size:9.5pt;">Mean Standard Reading</td>
        <td colspan="2" style="border: 0px solid blue; font-size:9.5pt;">Deviation</td>
        <td style="border: 0px solid blue; font-size:9.5pt;">Uncertainty</td>
        <td style="border: 0px solid blue;"> </td>
        </tr>';
        $tdRange = '<td colspan="7" style="text-align:left; border: 0px solid red;">';
        $tdSpace = '<td colspan="8">';
        $tdHeader = '<td colspan="2">';
        $tdSLA = '<td style="border: 0px solid green; width:12.5%; text-align:left; padding:0">';
        $tdSRA = '<td style="border: 0px solid blue; width:12.5%; text-align:right;">';
        $tdUnitue = '<td style="border: 0px solid red; width:7%; text-align:left;">';
        $tdS = '<td style="border: 0px solid red; width:12.5%">';
        $tdE = '</td>';

        $resolutionKey = 'resolutionTable'.$tableNumber;
        $readabilityKey = 'readabilityTable'.$tableNumber;
        $rangeKey = 'rangeTable'.$tableNumber;
        $unitKey = 'unitTable'.$tableNumber;
        $powerKey = 'powerTable'.$tableNumber;
        $functionKey = 'functionTable'.$tableNumber;

        

        $rangeValue = $array_DataInputs->$rangeKey;
        // $unitValue = strpos($array_DataInputs->$unitKey, 'Ω') ? "<span style='font-family:DejaVu Sans '>".$array_DataInputs->$unitKey."</span>" : $array_DataInputs->$unitKey; 
        $unitValue = strpos($array_DataInputs->$unitKey, 'Ω') ? utf8_decode($array_DataInputs->$unitKey) : $array_DataInputs->$unitKey; 
        
        $powerValue = $array_DataInputs->$powerKey == 'N/A' ? '' : $array_DataInputs->$powerKey;
        $functionValue = $array_DataInputs->$functionKey;

        $resolutionValue = $array_DataInputs->$resolutionKey;
        $resolutionDecimal = seeDecimal($resolutionValue);
        $readabilityValue = $array_DataInputs->$readabilityKey;
        $readabilityDecimal = seeDecimal($readabilityValue);
    
        $numberOfRow = 0;
        foreach ($array_DataInputs as $key => $value) {
            if (strpos($key, 'testPointTABLE'.$tableNumber) === 0) {
                $numberOfRow++;
            }
        }

        $rangeRow = $trS . $tdS . $powerValue . " " . $functionValue . $tdE . $tdRange . $rangeValue . " " . $unitValue . $tdE . $trE;
        $spaceRow = $trS . $tdSpace . $tdE . $trE;
        
        $theadS .= $rangeRow . $spaceRow . $labels . $theadE;

        for ($x=1; $x <= $numberOfRow; $x++) { 
            $tableKey = 'table'.$tableNumber;
            $rowKey = 'row'.$x;

            $testpointKey = 'testPointTABLE'.$tableNumber.'ROW'.$x;
            $testpointHertz = 'testPointHertzTABLE'.$tableNumber.'ROW'.$x;
            $testpointHertzUnit = 'testPointHertzUnitTABLE'.$tableNumber.'ROW'.$x;
            
            $testpointHertzValue = '';
            $testpointHertzUnitValue = '';
            $unitCombined = '';
            if(property_exists($array_DataInputs, $testpointHertz)){
                $testpointHertzValue = $array_DataInputs->$testpointHertz;
                $testpointHertzUnitValue = $array_DataInputs->$testpointHertzUnit;
                $unitCombined = $unitValue . ', ' . $testpointHertzValue . $testpointHertzUnitValue;
            }else{
                $unitCombined = $unitValue;
            }
            $meanKey = 'average';
            $deviation = 0;
            $uncertaintyKey = 'expandedUncertainty';

            $testpointValue = $array_DataInputs->$testpointKey;
            $meanValue =    matchDecimal($array_CalculatedData->$tableKey->$rowKey->$meanKey, $readabilityDecimal);
            $uncertaintyValue = $array_CalculatedData->$tableKey->$rowKey->$uncertaintyKey;
            $deviation = floatval($meanValue) - floatval($testpointValue);
            $resultRow = $trS . $tdSRA . formatNumber($testpointValue) . $tdE . $tdSLA . $unitCombined . $tdE . $tdSRA . formatNumber(matchDecimal($meanValue, $readabilityDecimal)) . $tdSLA . $unitValue . $tdE . $tdE . $tdSRA . formatNumber($deviation) . $tdE . $tdSLA . $unitValue . $tdE . $tdS . formatNumber(sigFig($uncertaintyValue, 2)) . $tdE . $tdUnitue . $unitValue . $tdE . $trE;
    
            $tbodyS .= $resultRow;       
        }
        $spaceRow = $trS . $tdSpace . "<br>" . $tdE . $trE;
        $tbodyS .=  $spaceRow . $tbodyE;   
        $tableS .= $theadS . $tbodyS . $tableE;
        $divS .= $tableS;
        $divS .=  $divE;
        return $divS;
    }

    function groupToLimit($arr, $lim){
        $sum = 0;
        $limit = $lim;
        $groups = [];
        $indexGroups = [];
        $currentGroup = [];
        $indexCurrentGroup = [];
    
        foreach($arr as $index => $number){
            $sum += $number;
            $tableNumber = $index + 1;
            if ($sum <= $limit) {
                $currentGroup[] = $number;
                $indexCurrentGroup[] = $tableNumber;
            }else{
                $groups[] = $currentGroup;
                $indexGroups[] = $indexCurrentGroup;
                $currentGroup = [$number];
                $indexCurrentGroup = [$tableNumber];
                $sum = $number;
            }
        }

        if (!empty($currentGroup)) {
            $groups[] = $currentGroup;
            $indexGroups[] = $indexCurrentGroup;
        }

        return [$indexGroups, $groups];
    
    }

    $limit = 30;
    function dynamicLayoutBaseOnRows($array_DataInputs, $array_CalculatedData, $limit){
        
        $numberOfTables = 0;
        $numberOfRowsPerTable = [];
        $tableNumbers = [];
        foreach ($array_DataInputs as $key => $value) {
            if (strpos($key, 'rangeTable') === 0) {
                $numberOfTables++;
            }
        }
        for ($i=1; $i <= $numberOfTables; $i++) { 
            $numberOfRow = 0;
            foreach ($array_DataInputs as $key => $value) {
                if (strpos($key, 'testPointTABLE'.$i) === 0) {
                    $numberOfRow++;
                }
            }
            array_push($tableNumbers, $i);
            array_push($numberOfRowsPerTable, $numberOfRow);
        }

        $pageHead = '<div class="page" style="border:0px green dotted; max-height:90%; font-size:9.5pt"><div class="measureThis" style="position: relative; top:120; font-size:11pt;"><p><b>Calibration Results</b></p><div style="position: relative; left:4%; max-width:90%; border:0px green dotted;"><div style="position: relative; max-width:100%; border:0px blue dotted;">';
        function pageFoot($pageNum, $pageCount){
            $pageFoot = '</div></div></div><div class="" style="position: relative;font-size:9.5pt;height:auto; border:0px black dotted;margin-top:-1%; top:250"></div><div style="position: absolute; top:682; right:10%; font-size:9.5pt;"><p style="position: absolute; top:0;font-size:9.5pt;">'.$pageNum.' of '.$pageCount.'</p></div></div>';
            return $pageFoot;
        }

        $array_groups = groupToLimit($numberOfRowsPerTable,$limit);
        $array_groupedTableNumber = $array_groups[0];
        $array_groupedTableRow = $array_groups[1];

        $numberOfPages = count($array_groupedTableNumber) + 1;

        $forReturn ='';
        foreach($array_groupedTableNumber as $index => $grouped_tableNumber){
            $pageNumber = $index + 2;
            $page = '';
            $page = $pageHead;
                foreach($grouped_tableNumber as $i => $tableNumber){
                    $page .= generateTableUsingTableNumber($tableNumber, $array_DataInputs, $array_CalculatedData);
                }
            $page .= pageFoot($pageNumber, $numberOfPages);

            $forReturn .= $page;
        }

        return $forReturn;
    }

    $conversionTable = array(
        "atm"=>array(
            "atm"=> 1,
            "bar"=> 1.01325,
            "kPa"=> 101.325,
            "psi"=> 14.6959,
            "mmHG"=> 760,
            "MPa"=> 0.101325,
            "kg/cm2"=> 1.03323,
            "inHg"=> 29.9213,
            "inH2O"=> 407.189,
            "mH2O"=> 10.3326,
            "mmH2O"=> 10343,
            "mbar"=> 1013.25,
            "Pa"=> 101325
        ),
        "bar"=>array(
            "atm"=> 0.986923,
            "bar"=> 1,
            "kPa"=> 100,
            "psi"=> 14.504,
            "mmHG"=> 750.1,
            "MPa"=> 0.1,
            "kg/cm2"=> 1.02,
            "inHg"=> 29.53,
            "inH2O"=> 401.865,
            "mH2O"=> 10.1974,
            "mmH2O"=> 10210,
            "mbar"=> 1000,
            "Pa"=> 100000
        ),
        "kPa"=>array(
            "atm"=> 0.00986923,
            "bar"=> 0.01,
            "kPa"=> 1,
            "psi"=> 0.145038,
            "mmHG"=> 7.50062,
            "MPa"=> 0.001,
            "kg/cm2"=> 0.0101972,
            "inHg"=> 0.2953,
            "inH2O"=> 4.01865,
            "mH2O"=> 0.101974,
            "mmH2O"=> 102.07,
            "mbar"=> 10,
            "Pa"=> 1000
        ),
        "psi"=>array(
            "atm"=> 0.0681,
            "bar"=> 0.0689476,
            "kPa"=> 6.8947600000196,
            "psi"=> 1,
            "mmHG"=> 51.715,
            "MPa"=> 0.00689476,
            "kg/cm2"=> 0.0704,
            "inHg"=> 2.03602,
            "inH2O"=> 27.71,
            "mH2O"=> 0.70308890742557,
            "mmH2O"=> 703.08,
            "mbar"=> 68.9476,
            "Pa"=> 6895
        ),
        "mmHG"=>array(
            "atm"=> 0.00131579,
            "bar"=> 0.00133322,
            "kPa"=> 0.133322,
            "psi"=> 0.0193368,
            "mmHG"=> 1,
            "MPa"=> 0.00013332239,
            "kg/cm2"=> 0.0013595101283313,
            "inHg"=> 0.039370079197446,
            "inH2O"=> 0.536,
            "mH2O"=> 0.013595,
            "mmH2O"=> 13.5951,
            "mbar"=> 1.333,
            "Pa"=> 133.3
        ),
        "MPa"=>array(
            "atm"=> 9.86923,
            "bar"=> 10,
            "kPa"=> 1000,
            "psi"=> 145.038,
            "mmHG"=> 7500.6,
            "MPa"=> 1,
            "kg/cm2"=> 10.1972,
            "inHg"=> 295.3,
            "inH2O"=> 4014.65,
            "mH2O"=> 101.97,
            "mmH2O"=> 101971.62129779,
            "mbar"=> 10000,
            "Pa"=> 1000000
        ),
        "kg/cm2"=>array(
            "atm"=> 0.968,
            "bar"=> 0.980665,
            "kPa"=> 98.0665,
            "psi"=> 14.2233,
            "mmHG"=> 735.6,
            "MPa"=> 0.0981,
            "kg/cm2"=> 1,
            "inHg"=> 28.96,
            "inH2O"=> 394.1,
            "mH2O"=> 10.0003,
            "mmH2O"=> 10010,
            "mbar"=> 980.665,
            "Pa"=> 98067
        ),
        "inHg"=>array(
            "atm"=> 0.0334211,
            "bar"=> 0.0338639,
            "kPa"=> 3.38639,
            "psi"=> 0.491154,
            "mmHG"=> 25.4,
            "MPa"=> 0.00338639,
            "kg/cm2"=> 0.0345316,
            "inHg"=> 1,
            "inH2O"=> 13.6087,
            "mH2O"=> 0.345,
            "mmH2O"=> 345.7,
            "mbar"=> 33.8639,
            "Pa"=> 3386
        ),
        "inH2O"=>array(
            "atm"=> 0.00245586,
            "bar"=> 0.0024884,
            "kPa"=> 0.24884,
            "psi"=> 0.0361,
            "mmHG"=> 1.866,
            "MPa"=> 0.00025,
            "kg/cm2"=> 0.00254,
            "inHg"=> 0.0735,
            "inH2O"=> 1,
            "mH2O"=> 0.02539999469733,
            "mmH2O"=> 25.4,
            "mbar"=> 2.488,
            "Pa"=> 248.8
        ),
        "mH2O"=>array(
            "atm"=> 0.096781,
            "bar"=> 0.098064,
            "kPa"=> 9.8064,
            "psi"=> 1.4223,
            "mmHG"=> 73.55388,
            "MPa"=> 0.00980638,
            "kg/cm2"=> 0.1,
            "inHg"=> 2.9,
            "inH2O"=> 39.4,
            "mH2O"=> 1,
            "mmH2O"=> 1000,
            "mbar"=> 98.064,
            "Pa"=> 9806.38
        ),
        "mmH2O"=>array(
            "atm"=> 0.000097,
            "bar"=> 0.000098,
            "kPa"=> 0.0098,
            "psi"=> 0.001421,
            "mmHG"=> 0.00735,
            "MPa"=> 0.0000098,
            "kg/cm2"=> 0.0001,
            "inHg"=> 0.00289,
            "inH2O"=> 0.0394,
            "mH2O"=> 0.001,
            "mmH2O"=> 1,
            "mbar"=> 0.098,
            "Pa"=> 9.8
        ),
        "mbar"=>array(
            "atm"=> 0.000967,
            "bar"=> 0.001,
            "kPa"=> 0.1,
            "psi"=> 0.0145,
            "mmHG"=> 0.75,
            "MPa"=> 0.0001,
            "kg/cm2"=> 0.00102,
            "inHg"=> 0.0295,
            "inH2O"=> 0.402,
            "mH2O"=> 0.010197442889221,
            "mmH2O"=> 10.21,
            "mbar"=> 1,
            "Pa"=> 100
        ),
        "Pa"=>array(
            "atm"=> 0.00001,
            "bar"=> 0.00001,
            "kPa"=> 0.001,
            "psi"=> 0.000145,
            "mmHG"=> 0.0075,
            "MPa"=> 0.000001,
            "kg/cm2"=> 0.00001,
            "inHg"=> 0.000295,
            "inH2O"=> 0.00402,
            "mH2O"=> 0.00010197442889221,
            "mmH2O"=> 0.102,
            "mbar"=> 0.01,
            "Pa"=> 1
        )
    );

    function convert2($val, $from, $to){
        $no_specialCharacters_from = str_replace('₂', '2', $from);
        $no_specialCharacters_to = str_replace('₂', '2', $to);
        $conversionTable = array(
            "atm"=>array(
                "atm"=> 1,
                "bar"=> 1.01325,
                "kPa"=> 101.325,
                "psi"=> 14.6959,
                "mmHG"=> 760,
                "MPa"=> 0.101325,
                "kg/cm2"=> 1.03323,
                "inHg"=> 29.9213,
                "inH2O"=> 407.189,
                "mH2O"=> 10.3326,
                "mmH2O"=> 10343,
                "mbar"=> 1013.25,
                "Pa"=> 101325
            ),
            "bar"=>array(
                "atm"=> 0.986923,
                "bar"=> 1,
                "kPa"=> 100,
                "psi"=> 14.504,
                "mmHG"=> 750.1,
                "MPa"=> 0.1,
                "kg/cm2"=> 1.02,
                "inHg"=> 29.53,
                "inH2O"=> 401.865,
                "mH2O"=> 10.1974,
                "mmH2O"=> 10210,
                "mbar"=> 1000,
                "Pa"=> 100000
            ),
            "kPa"=>array(
                "atm"=> 0.00986923,
                "bar"=> 0.01,
                "kPa"=> 1,
                "psi"=> 0.145038,
                "mmHG"=> 7.50062,
                "MPa"=> 0.001,
                "kg/cm2"=> 0.0101972,
                "inHg"=> 0.2953,
                "inH2O"=> 4.01865,
                "mH2O"=> 0.101974,
                "mmH2O"=> 102.07,
                "mbar"=> 10,
                "Pa"=> 1000
            ),
            "psi"=>array(
                "atm"=> 0.0681,
                "bar"=> 0.0689476,
                "kPa"=> 6.8947600000196,
                "psi"=> 1,
                "mmHG"=> 51.715,
                "MPa"=> 0.00689476,
                "kg/cm2"=> 0.0704,
                "inHg"=> 2.03602,
                "inH2O"=> 27.71,
                "mH2O"=> 0.70308890742557,
                "mmH2O"=> 703.08,
                "mbar"=> 68.9476,
                "Pa"=> 6895
            ),
            "mmHG"=>array(
                "atm"=> 0.00131579,
                "bar"=> 0.00133322,
                "kPa"=> 0.133322,
                "psi"=> 0.0193368,
                "mmHG"=> 1,
                "MPa"=> 0.00013332239,
                "kg/cm2"=> 0.0013595101283313,
                "inHg"=> 0.039370079197446,
                "inH2O"=> 0.536,
                "mH2O"=> 0.013595,
                "mmH2O"=> 13.5951,
                "mbar"=> 1.333,
                "Pa"=> 133.3
            ),
            "MPa"=>array(
                "atm"=> 9.86923,
                "bar"=> 10,
                "kPa"=> 1000,
                "psi"=> 145.038,
                "mmHG"=> 7500.6,
                "MPa"=> 1,
                "kg/cm2"=> 10.1972,
                "inHg"=> 295.3,
                "inH2O"=> 4014.65,
                "mH2O"=> 101.97,
                "mmH2O"=> 101971.62129779,
                "mbar"=> 10000,
                "Pa"=> 1000000
            ),
            "kg/cm2"=>array(
                "atm"=> 0.968,
                "bar"=> 0.980665,
                "kPa"=> 98.0665,
                "psi"=> 14.2233,
                "mmHG"=> 735.6,
                "MPa"=> 0.0981,
                "kg/cm2"=> 1,
                "inHg"=> 28.96,
                "inH2O"=> 394.1,
                "mH2O"=> 10.0003,
                "mmH2O"=> 10010,
                "mbar"=> 980.665,
                "Pa"=> 98067
            ),
            "inHg"=>array(
                "atm"=> 0.0334211,
                "bar"=> 0.0338639,
                "kPa"=> 3.38639,
                "psi"=> 0.491154,
                "mmHG"=> 25.4,
                "MPa"=> 0.00338639,
                "kg/cm2"=> 0.0345316,
                "inHg"=> 1,
                "inH2O"=> 13.6087,
                "mH2O"=> 0.345,
                "mmH2O"=> 345.7,
                "mbar"=> 33.8639,
                "Pa"=> 3386
            ),
            "inH2O"=>array(
                "atm"=> 0.00245586,
                "bar"=> 0.0024884,
                "kPa"=> 0.24884,
                "psi"=> 0.0361,
                "mmHG"=> 1.866,
                "MPa"=> 0.00025,
                "kg/cm2"=> 0.00254,
                "inHg"=> 0.0735,
                "inH2O"=> 1,
                "mH2O"=> 0.02539999469733,
                "mmH2O"=> 25.4,
                "mbar"=> 2.488,
                "Pa"=> 248.8
            ),
            "mH2O"=>array(
                "atm"=> 0.096781,
                "bar"=> 0.098064,
                "kPa"=> 9.8064,
                "psi"=> 1.4223,
                "mmHG"=> 73.55388,
                "MPa"=> 0.00980638,
                "kg/cm2"=> 0.1,
                "inHg"=> 2.9,
                "inH2O"=> 39.4,
                "mH2O"=> 1,
                "mmH2O"=> 1000,
                "mbar"=> 98.064,
                "Pa"=> 9806.38
            ),
            "mmH2O"=>array(
                "atm"=> 0.000097,
                "bar"=> 0.000098,
                "kPa"=> 0.0098,
                "psi"=> 0.001421,
                "mmHG"=> 0.00735,
                "MPa"=> 0.0000098,
                "kg/cm2"=> 0.0001,
                "inHg"=> 0.00289,
                "inH2O"=> 0.0394,
                "mH2O"=> 0.001,
                "mmH2O"=> 1,
                "mbar"=> 0.098,
                "Pa"=> 9.8
            ),
            "mbar"=>array(
                "atm"=> 0.000967,
                "bar"=> 0.001,
                "kPa"=> 0.1,
                "psi"=> 0.0145,
                "mmHG"=> 0.75,
                "MPa"=> 0.0001,
                "kg/cm2"=> 0.00102,
                "inHg"=> 0.0295,
                "inH2O"=> 0.402,
                "mH2O"=> 0.010197442889221,
                "mmH2O"=> 10.21,
                "mbar"=> 1,
                "Pa"=> 100
            ),
            "Pa"=>array(
                "atm"=> 0.00001,
                "bar"=> 0.00001,
                "kPa"=> 0.001,
                "psi"=> 0.000145,
                "mmHG"=> 0.0075,
                "MPa"=> 0.000001,
                "kg/cm2"=> 0.00001,
                "inHg"=> 0.000295,
                "inH2O"=> 0.00402,
                "mH2O"=> 0.00010197442889221,
                "mmH2O"=> 0.102,
                "mbar"=> 0.01,
                "Pa"=> 1
            )
        );
        $convertMultiple = floatval($conversionTable[$no_specialCharacters_from][$no_specialCharacters_to]);
        return floatval($val)*$convertMultiple;
    } 

    function getCountOfPages($array_DataInputs, $array_CalculatedData, $limit){
        $numberOfTables = 0;
        $numberOfRowsPerTable = [];
        $tableNumbers = [];
        foreach ($array_DataInputs as $key => $value) {
            if (strpos($key, 'rangeTable') === 0) {
                $numberOfTables++;
            }
        }

        for ($i=1; $i <= $numberOfTables; $i++) { 
            $numberOfRow = 0;
            foreach ($array_DataInputs as $key => $value) {
                if (strpos($key, 'testPointTABLE'.$i) === 0) {
                    $numberOfRow++;
                }
            }
            array_push($tableNumbers, $i);
            array_push($numberOfRowsPerTable, $numberOfRow);
        }

        $array_groups = groupToLimit($numberOfRowsPerTable,$limit);
        $array_groupedTableNumber = $array_groups[0];
        return count($array_groupedTableNumber) + 1;
    }

    function formatNumber($num_val){
        $isNegative = $num_val < 0 ? 'true' : 'false';
        $num = abs($num_val);
        $exploded_num = explode('.', $num);
        
        if(count($exploded_num) > 1){
            $exploded_num_int = $exploded_num[0];
            $exploded_num_dec = $exploded_num[1];
            $int_length = strlen($exploded_num_int);
            $dec_length = strlen($exploded_num_dec);
    
            $formatted_int = number_format($exploded_num_int, 0, '', ' ');
            
            $reversed_dec = strrev($exploded_num_dec);
            $reversed_formatted_dec = number_format($reversed_dec, 0, '', ' ');
            $exploded_reversed_formatted_dec = explode(' ', $reversed_formatted_dec);
            $temp_formatted_dec = [];
            foreach ($exploded_reversed_formatted_dec as $value){
                array_push($temp_formatted_dec, strrev($value));
            }
            $temp_array_reversed = array_reverse($temp_formatted_dec);
            $formatted_dec = join(' ', $temp_array_reversed);
            
            $return_formatted = $formatted_int.'.'.$formatted_dec;
    
        }else{
            $exploded_num_int = $exploded_num[0];
            $int_length = strlen($exploded_num_int);
    
            $formatted_int = number_format($exploded_num_int, 0, '', ' ');
            $return_formatted = $formatted_int;
        }
        
        $return_formatted_with_sign = $isNegative === 'true' ? '-'.$return_formatted : $return_formatted;
        return $return_formatted_with_sign;
    }

    function getCMCValuePSI($val){
        $float_val = floatval($val);
        $cmc;
        if($float_val <= 14.5){
            $cmc = 0.0058;
        }
        elseif($float_val <= 72.5){
            $cmc = 0.029;
        }
        elseif($float_val <= 145.0){
            $cmc = 0.058;
        }
        elseif($float_val <= 725.2){
            $cmc = 0.29;
        }
        elseif($float_val <= 1450.4){
            $cmc = 4;
        }
        
        if($float_val > $cmc){
            return $float_val;
        }else{
            return $cmc;
        }
    }

    function get_min_max_correction($val, $std, $originalUnitOfStandard, $selectedStd, $unit_from, $unit_to){
        $float_val = floatval($val);
        $selected_std_by_serial = [];
        $min_max = [];
        $correction;
        $last_applied=0;
        $standard_unit_original = $originalUnitOfStandard;
        foreach ($std as $value) {
            if($value['serialNumber'] == $selectedStd){
                if(floatval($value['applied']) == $float_val){
                    $corr = convert2($value['correction'], $originalUnitOfStandard, $unit_to);
                    //$corr = $value['correction'];
                    return $corr;
                }
             
                if(count($selected_std_by_serial) == 0){
                    array_push($selected_std_by_serial , $value);//first value
                    $last_applied = floatval($value['applied']);
                }
             
                if(floatval($value['applied']) > $last_applied){
                    array_push($selected_std_by_serial , $value);//end
                }
                if(floatval($value['applied']) < $last_applied){
                    array_unshift($selected_std_by_serial , $value);//front
                }
            }
        }
        
        foreach ($selected_std_by_serial as $value) {
            $converted_applied = convert2(floatval($value['applied']), $originalUnitOfStandard, $unit_to);
            if(floatval($converted_applied) > $float_val){
                // array_push($min_max , $value);
                $min_max[1] = $value;
                break;
               
            }
            if(floatval($converted_applied) < $float_val){
                // array_push($min_max , $value);
                $min_max[0] = $value;
            }
        }

        if(!isset($min_max[0], $min_max[1])){
            throw new \RangeException('Test point '.$float_val.' '.$unit_to.' is outside the calibrated range of standard "'.$selectedStd.'", so its correction cannot be interpolated. Check the standard selected on the worksheet.');
        }


        $correction = interpolationOfCorrection_conversionIncluded($min_max[0]['applied'], $min_max[1]['applied'], $min_max[0]['correction'], $min_max[1]['correction'], $float_val, $originalUnitOfStandard, $unit_to);
    
    
        return $correction;
        //return $min_max[0]['applied'];
    }
    
    function set_range_measurement_condition($range, $rangeUnit, $medium, $statement){
        $exploded_statement = explode("////COMMENTS", $statement);
        $statement = explode("(CHANGE_RANGE)",  $exploded_statement[0]);
        $mediumStatement = explode("(MEDIUM)",  $statement[1]);

        $return_statement = $statement[0] . " " . $range . " " . $rangeUnit . " " . $mediumStatement[0] . " " . $medium . " " . $mediumStatement[1];
        return $return_statement;
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

        #standardTable {
            table-layout: fixed;
            width: 100%;
        }
        #standardTable td {
            border: 0px solid green; 
            width: 25%; 
            vertical-align: middle;
        }
    
        #standardTable .td1 {
            width: 4%; 
        }
        #standardTable .td2 {
            width: 7%;
        }
        #standardTable .td3 {
            width: 8%; 
        }
        #standardTable .td4 {
            width: 6%; 
        }
    </style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RML ++</title>	
</head>
<body>
    <header style="line-height: 0;">
        <?= view('templates/certificateQr', ['certificateQr' => $certificateQr ?? null]) ?>
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
        <div class='' style="position:absolute;top:90; left:27%">
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

        <?php 
            if($dataFromDB['completion'] != 'For printing'||$imageDraft == 'true'){
                echo " 
                <div style='z-index: 999; position:absolute; top: 150px; margin-left: 40px;'>
                <img src='". $base64."'  style='margin-left: -40px; height: 700px; opacity: 0.1; position: absolute;'>
                <img src='". $base64IllusDraft."'  style='background-size: 100% 100%; opacity: 0.5; position: absolute;'>
                </div>";
            }
        ?> 
    </header>
    <footer>
        <div style="position: absolute; top:0; left:8.5%; font-size:8pt;">
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
                <div class="" style="position: relative;font-size:9.5pt;">
                    <p style='font-weight:bold;text-decoration: underline;'>Calibration Procedure</p>
                    <p style='margin-top:-10;'>
                        <?php 

                            if($dataFromDB['settingCalibrationProcedureAndTraceability'] == ""){
                                echo $placeholders[0]['module7CalibrationProcedureAndTraceability'];
                            }else{
                                echo $dataFromDB['settingCalibrationProcedureAndTraceability'];
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
                                echo standardUsedGetDetails($selectedStandardPieces, $selectedStandardDetails, $originalUnitOfStandard);
                            ?>
                        </tbody>
    

                    </table>
                </div>
                <div class="" style="position: relative;font-size:9.5pt;height:auto;border:0px blue dotted;">
                    <p style='font-weight:bold;text-decoration: underline;font-size:9.5pt;top:2;'>Calibration Results</p>
                    <p style='max-width:95%;font-size:9.5pt;margin-top:-10;'>
                        <?php 
                            if($dataFromDB['settingCalibrationResults'] == ""){
                                echo $placeholders[0]['module7CalibrationResults'];
                            }else{
                                echo $dataFromDB['settingCalibrationResults'];
                            }
                        ?>
                    </p>
                </div>
                <div class="" style="position: relative; font-size:9.5pt;height:auto;border:0px green dotted;margin-top:-1%;">
                    <p style='font-weight:bold;text-decoration: underline;font-size:9.5pt;top:2;'>Uncertainty of Measurement</p>
                    <p style='max-width:95%;font-size:9.5pt;margin-top:-10;'>
                        <?php 
                            if($dataFromDB['settingUncertaintyOfMeasurement'] == ""){
                                echo $placeholders[0]['module7UncertaintyOfMeasurement'];
                            }else{
                                echo $dataFromDB['settingUncertaintyOfMeasurement'];
                            }
                        ?>
                    </p>
                </div>
                <div class="" style="position: relative;font-size:9.5pt;height:auto; border:0px black dotted;margin-top:-1%;">
                    <p style='font-weight:bold;text-decoration: underline;font-size:9.5pt;top:2;'>Measurement Condition</p>
                    <p style='max-width:95%;font-size:9.5pt;margin-top:-10;'>
                        <?php 
                            $rangeKey = 'range';
                            $rangeUnitKey = 'rangeUnit';
                            $mediumKey = 'medium';
                            
                            $rangeValue = $specificationsData->$rangeKey;
                            $rangeUnitValue = $specificationsData->$rangeUnitKey;
                            $mediumKeyValue = $specificationsData->$mediumKey;

                            if($dataFromDB['settingMeasurementCondition'] == ""){
                                $statement = set_range_measurement_condition($rangeValue, $rangeUnitValue, $mediumKeyValue, $placeholders[0]['module7MeasurementCondition']);
                                echo  $statement;

                            }else{
                                $statement = set_range_measurement_condition($rangeValue, $rangeUnitValue, $mediumKeyValue, $dataFromDB['settingMeasurementCondition']);
                                echo $statement;
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
                <p style='position: absolute; top:0;font-size:9.5pt;'>Page 1 of 2</p>
            </div>
        </div>

        <div class="page" style="border:0px green dotted; max-height:90%; font-size:9.5pt">
                <div class="measureThis" style="position: relative; top:120; font-size:11pt;">
                    <p><b>Calibration Results</b></p>
                    <div style="position: relative; left:3%; max-width:90%; border:0px green dotted;">
                        <div style="position: relative; max-width:100%; border:0px blue dotted;">
                            <table class="resultTable" width="100%">
                                <thead>
                                    <tr>
                                        <td colspan='2' rowspan='2'>UUC Reading <div style="font-family:DejaVu Sans; font-size:9.5pt; font-style:italic;">(ρ<span style="font-size:4.5pt; bottom:50px">UUC</span>)</div></td> 
                                        <td colspan='3'>Standard Reading</td>
                                        <td rowspan='2'>Deviation <div style="font-family:DejaVu Sans; font-size:9.5pt; font-style:italic;">(ρ<span style="font-size:4.5pt; bottom:50px">UUC</span> - ρ<span style="font-size:4.5pt; bottom:50px">ind</span>)</div></td>
                                        <td colspan='2' rowspan='2'>Uncertainty</td>
                                    </tr>
                                    <tr>
                                        <td>Increasing</td>
                                        <td>Decreasing</td>
                                        <td>Mean <div style="font-family:DejaVu Sans; font-size:9.5pt; font-style:italic;">(ρ<span style="font-size:4.5pt; bottom:50px">ind</span>)</div></td>
                                    </tr>
                                    <?php
                                        $unit_for_print_mpa = $specificationsData->resolutionUnit === 'MPa' ? 'MPa' : $specificationsData->resolutionUnit;
                                        $unit_for_print = $unit_for_print_mpa === 'kpa' ? 'kPa' : $unit_for_print_mpa;
                                    ?>
                                    <tr>
                                        <td style="font-family:DejaVu Sans;"><?= $unit_for_print?></td>
                                        <td><?= $unitOfStandard?></td>
                                        <td style="font-family:DejaVu Sans;"><?= $unit_for_print?></td>
                                        <td style="font-family:DejaVu Sans;"><?= $unit_for_print?></td>
                                        <td style="font-family:DejaVu Sans;"><?= $unit_for_print?></td>
                                        <td style="font-family:DejaVu Sans;"><?= $unit_for_print?></td>
                                        <td style="font-family:DejaVu Sans;"><?= $unit_for_print?></td>
                                        <td><?= $unitOfStandard?></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                        for ($i=0; $i < 9; $i++) { 
                                            $idM1 = 'M1uucRow'.$i;
                                            $idM2 = 'M2uucRow'.$i;
                                            $idM3 = 'M3uucRow'.$i;

                                            $id_testpoint = 'testPointRow'.$i;
                                            $idForCorrStdReading0 = 'M1stdRow0';
                                            $idForCorrStdReading = 'M1stdRow'.$i;
                                            $idForCorrStdReadingM20 = 'M2stdRow0';
                                            $idForCorrStdReadingM2 = 'M2stdRow'.$i;
                                            $idForCorrStdReadingM30 = 'M3stdRow0';
                                            $idForCorrStdReadingM3 = 'M3stdRow'.$i;
                                           
                                            $valm1 =  floatval($dataInputs->$idM1);
                                            $valm3 =  floatval($dataInputs->$idM3);
                                            $valueAsArray = [$valm1, $valm3];
                                            
                                            $td1st = floatval(calculateAverage($valueAsArray));
                                            $td2nd =  convert2($td1st, $specificationsData->resolutionUnit, $unitOfStandard);

                                            //getCMCValuePSI
                                            $uncertaintyStandardUnit = $calculatedData->uEStdUnit[$i]; 
                                            $uncertaintyStandardUnit_Converted_psi = convert2($uncertaintyStandardUnit, 'kPa', 'psi');
                                            $uncertaintyStandardUnit_Converted_psi_CMC = getCMCValuePSI($uncertaintyStandardUnit_Converted_psi);
                                            $uncertaintyStandardUnit_Converted_StandardUnit_CMC = convert2($uncertaintyStandardUnit_Converted_psi_CMC, 'psi', 'kPa');

                                            $uncertaintyUUCUnit = $calculatedData->uEUucUnit[$i]; 
                                            $uncertaintyUUCUnit_Converted_psi = convert2($uncertaintyUUCUnit, $specificationsData->resolutionUnit, 'psi');
                                            $uncertaintyUUCUnit_Converted_psi_CMC = getCMCValuePSI($uncertaintyUUCUnit_Converted_psi);
                                            $uncertaintyUUCUnit_Converted_UUCUnit_CMC = convert2($uncertaintyUUCUnit_Converted_psi_CMC, 'psi', $specificationsData->resolutionUnit);

                                            $corrStdReading = floatval($dataInputs->$idForCorrStdReading) - floatval($dataInputs->$idForCorrStdReading0);
                                            // $corrStdReadingM2 = floatval($dataInputs->$idForCorrStdReadingM2) - floatval($dataInputs->$idForCorrStdReadingM20);
                                            $corrStdReadingM2 = floatval($dataInputs->$idForCorrStdReadingM2) - floatval($dataInputs->$idForCorrStdReading0);
                                            $corrStdReadingM3 = floatval($dataInputs->$idForCorrStdReadingM3) - floatval($dataInputs->$idForCorrStdReadingM30);

                                            $decimalOfUncertainty = seeDecimal(sigFig($uncertaintyUUCUnit_Converted_UUCUnit_CMC, 2));

                                            // $correction = floatval(get_min_max_correction($td1st, $standardValues, $originalUnitOfStandard, $selectedStandardPieces[0], $unitOfStandard, $specificationsData->resolutionUnit));
                                            $correction = floatval(get_min_max_correction($dataInputs->$id_testpoint, $standardValues, $originalUnitOfStandard, $selectedStandardPieces[0], $unitOfStandard, $specificationsData->resolutionUnit));
                                            $array_correction = [$corrStdReading, ($corrStdReadingM3 + $correction)];

                                            $stdReading1 = floatval(calculateAverage($array_correction));
                                            $stdReading2 = floatval($corrStdReadingM2 + $correction);
                                            $stdReading3 = ($stdReading1 + $stdReading2) / 2;

                                            $format_stdReading1 = matchDecimal(floatval(calculateAverage($array_correction)),$decimalOfUncertainty);
                                            $format_stdReading2 = matchDecimal(floatval($corrStdReadingM2 + $correction),$decimalOfUncertainty);
                                            $format_stdReading3 = matchDecimal(($format_stdReading1 + $format_stdReading2) / 2, $decimalOfUncertainty);


                                            $deviation = $td1st - $format_stdReading3;

                                            $decimal_uuc_unit = seeDecimal($td1st);

                                            // $stdReading1 =0;
                                            // $stdReading2 =0;
                                            // $stdReading3 =0;
                                            // $deviation =0;

                                            // echo '
                                            //     <tr>
                                            //         <td>'.$td1st.'</td>
                                            //         <td>'.matchDecimal($td2nd, $decimalOfUncertainty).'</td>
                                            //         <td>'.matchDecimal($stdReading1, $decimalOfUncertainty).'</td>
                                            //         <td>'.matchDecimal($stdReading2, $decimalOfUncertainty).'</td>
                                            //         <td>'.matchDecimal($stdReading3, $decimalOfUncertainty).'</td>
                                            //         <td>'.matchDecimal($deviation, $decimalOfUncertainty).'</td>
                                            //         <td>'.sigFig($uncertaintyUUCUnit_Converted_UUCUnit_CMC, 2).'</td>
                                            //         <td>'.sigFig($uncertaintyStandardUnit_Converted_StandardUnit_CMC, 2).'</td>
                                            //     </tr>
                                            // ';
                                            // <td>'.matchDecimal($td2nd, $decimalOfUncertainty).'</td>


                                            echo '
                                                <tr>
                                                    <td>'.$td1st.'</td>
                                                    <td>'.matchDecimal($td2nd, $decimal_uuc_unit).'</td>
                                                    <td>'.$format_stdReading1.'</td>
                                                    <td>'.$format_stdReading2.'</td>
                                                    <td>'.$format_stdReading3.'</td>
                                                    <td>'.matchDecimal($deviation, $decimalOfUncertainty).'</td>
                                                    <td style="width:5em">'.sigFig($uncertaintyUUCUnit_Converted_UUCUnit_CMC, 2).'</td>
                                                    <td style="width:5em">'.sigFig($uncertaintyStandardUnit_Converted_StandardUnit_CMC, 2).'</td>
                                                </tr>
                                            ';


                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="" style="position: relative;font-size:9.5pt;height:auto; border:0px black dotted;margin-top:-1%; top:250">
                    <p style='font-weight:bold;text-decoration: underline;margin-top:5;'>Remarks:</p> <br>
                    <table style="border: 0px; width: 90%; font-size:9.5pt;margin-top:-15;">
                        <tbody>
                            <?php
                                if($dataFromDB['settingRemarks'] == ""){
                                    $remarks = $placeholders[0]['module7Remarks'];
                                }else{
                                    $remarks = $dataFromDB['settingRemarks'];
                                }
                                $remarksSeparated = explode("(splitHere)", $remarks);
                                for ($i=0; $i < count($remarksSeparated); $i++) { 

                                    for ($i=0; $i < count($remarksSeparated); $i++) { 
                                        if(str_contains($remarksSeparated[$i], 'The conversion factor used is')){
                                             echo "<tr valign='top' style='font-size:9.5pt;'><td>".($i+1).". "."</td><td>The conversion factor used is: 1 kPa = " . convert2(1, 'kPa', $unit_for_print) . " " . $unit_for_print. ".</td></tr>";
                                        }else{
                                            echo "<tr valign='top' style='font-size:9.5pt;'><td>".($i+1).". "."</td><td>".$remarksSeparated[$i]."</td></tr>";
                                        }
                                    
                                    }
                                    // echo "<tr valign='top' style='font-size:9.5pt;'><td>".($i+1).". "."</td><td>".$remarksSeparated[$i]."</td></tr>";
                                }
                            ?>
                        </tbody>
                    </table> 
                </div>
                <div style="position: absolute; top:682; right:13%; font-size:9.5pt;">
                    <p style='position: absolute; top:0;font-size:9.5pt;'>Page 2 of 2</p>
                </div>
            </div>                       
    </main>
</body>
</html>   