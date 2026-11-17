<?php 
    $path = 'image/dostLogoBigger-svg.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    $pathPAB = 'image/pab logo.png';
    $typePAB = pathinfo($pathPAB, PATHINFO_EXTENSION);
    $dataPAB = file_get_contents($pathPAB);
    $base64PAB = 'data:image/' . $typePAB . ';base64,' . base64_encode($dataPAB);

    $incubatorPath = 'image/enclosureIncubator.png';
    $incubatorType = pathinfo($incubatorPath, PATHINFO_EXTENSION);
    $incubatorData = file_get_contents($incubatorPath);
    $incubatorBase64 = 'data:image/' . $incubatorType . ';base64,' . base64_encode($incubatorData);

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

    $tableCount = count((array)$calculatedData);
    $pageCount = 3;

    $equipmentType = isset($specificationsData->equipmentType) ? $specificationsData->equipmentType : '0';

    if($tableCount>1){
        $additional_page = intval($tableCount/2) + $tableCount%2;
        $pageCount += $additional_page;
    }
    


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
            $val = floatVal($obj -> $key);
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
    function standardUsedGetDetails($array_selectedStandard, $array_standardDetails){
        $selectedStandardsInRow = '';
        foreach ($array_standardDetails as $item) {
            if(in_array($item['serialNumber'], $array_selectedStandard)){
                $description = $item['description'];
                $certificateNumber = $item['certificateNumber'];
                $calibrationProvider = $item['provider'];
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
        <td colspan="5" style="border: 0px solid blue; font-size:9.5pt;">Nominal Size</td>
        <td colspan="5" style="border: 0px solid blue; font-size:9.5pt;">Error</td>
        <td colspan="5" style="border: 0px solid blue; font-size:9.5pt;">Uncertanity</td>
        </tr>';

        $tdSpace = '<td colspan="15">';
        $tdInbetween = '<td></td>';
        $tdSLA = '<td style="border: 0px solid green; width:12.5%; text-align:left; padding:0; margin: right 100px;px">';
        $tdSRA = '<td style="border: 0px solid blue; width:12.5%; text-align:right;">';
        $tdUnitue = '<td style="border: 0px solid red; width:7%; text-align:left;">';
        $tdS = '<td style="border: 0px solid red; width:12.5%">';
        $tdE = '</td>';
        $theadS .= $labels . $theadE;

        $unitKey = 'unitTable'.$tableNumber;
        $resolutionKey = 'graduationTable'.$tableNumber;
        $readabilityKey = 'readabilityTable'.$tableNumber;
        
        $unitValue = $array_DataInputs->$unitKey; 
        $resolutionValue = $array_DataInputs->$resolutionKey;
        $resolutionDecimal = seeDecimal($resolutionValue);
        $readabilityValue = $array_DataInputs->$readabilityKey;
        $readabilityDecimal = seeDecimal($readabilityValue);

        $numberOfRow = 0;
        foreach ($array_DataInputs as $key => $value) {
            if (strpos($key, 'equivTABLE'.$tableNumber) === 0) {
                $numberOfRow++;
            }
        }
        for ($x=1; $x <= $numberOfRow; $x++) { 
            $tableKey = 'table'.$tableNumber;
            $rowKey = 'row'.$x;

            $equiv = 'equivTABLE'.$tableNumber.'ROW'.$x;
            $uuc_err = 'uuc_err';

            $uncertaintyKey = 'calculated_expandedUncertainty';
            $uncertaintyValue = $array_CalculatedData->$tableKey->$rowKey->$uncertaintyKey;
            $decimalForError = seeDecimal(sigFig($uncertaintyValue, 2));

            $equivValue = $array_DataInputs->$equiv;
            $uucErrorValue =    matchDecimal($array_CalculatedData->$tableKey->$rowKey->$uuc_err, $decimalForError);
            
            $resultRow = $trS . $tdInbetween . $tdSRA . formatNumber($equivValue) . $tdE . $tdInbetween . $tdSLA . $unitValue . $tdE . $tdInbetween . $tdInbetween . $tdSRA . formatNumber(matchDecimal($uucErrorValue, $decimalForError)). $tdE . $tdInbetween . $tdSLA . $unitValue . $tdE . $tdInbetween . $tdInbetween . $tdSRA . formatNumber(sigFig($uncertaintyValue, 2)) . $tdE . $tdInbetween . $tdSLA . $unitValue . $tdE . $tdInbetween . $trE;
    
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
                if (strpos($key, 'equivTABLE'.$i) === 0) {
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

    function get_cmc($specificationsData, $testpoint, $uncertainty){
        $equipmentType = $specificationsData->equipmentType;
        $float_testpoint = floatval($testpoint);
        $float_uncertainty = floatval($uncertainty);
        if($equipmentType == '1'){
            if($float_testpoint >= -40 && $float_testpoint <= 20){
                if($float_uncertainty > 1.5){
                    return $float_uncertainty;
                }else{
                    return 1.5;
                }
            }
        }
        if($equipmentType == '2'){
            if($float_testpoint >= -10 && $float_testpoint <= 80){
                if($float_uncertainty > 0.86){
                    return $float_uncertainty;
                }else{
                    return 0.86;
                }
            }
        }
        if($equipmentType == '3'){
            if($float_testpoint >= 20 && $float_testpoint <= 200){
                if($float_uncertainty > 1.8){
                    return $float_uncertainty;
                }else{
                    return 1.8;
                }
            }
        }
        if($equipmentType == '4'){
            if($float_testpoint >= -40 && $float_testpoint <= 200){
                if($float_uncertainty > 1.4){
                    return $float_uncertainty;
                }else{
                    return 1.4;
                }
            }
        }
        if($equipmentType == '5'  || $equipmentType == '6'){
            if($float_testpoint >= 20 && $float_testpoint <= 130){
                if($float_uncertainty > 0.97){
                    return $float_uncertainty;
                }else{
                    return 0.97;
                }
            }
            if($float_testpoint >= 20 && $float_testpoint <= 200){
                if($float_uncertainty > 1.8){
                    return $float_uncertainty;
                }else{
                    return 1.8;
                }
            }
        }
    }

    function check_cmc($specificationsData, $testpoint, $uncertainty, $cmc_array){
        $cmc_conditions = json_decode($cmc_array[0]['conditions'], true);
        $equipmentType = $specificationsData->equipmentType;
        $float_testpoint = floatval($testpoint);
        $float_uncertainty = floatval($uncertainty);
        $cmc = $float_uncertainty;

        foreach($cmc_conditions as $key => $value){
            $row_num = $key + 1;
            
            $rangeMin_key = 'rangeMinRow'.$row_num;
            $rangeMinUnit_key = 'rangeMinUnitRow'.$row_num;
            $rangeMax_key = 'rangeMaxRow'.$row_num;
            $rangeMaxUnit_key = 'rangeMaxUnitRow'.$row_num;
            $cmcValue_key = 'cmcValueRow'.$row_num;
            $type_key = 'typeRow'.$row_num;

            $range_min = floatval($value[$rangeMin_key]);
            $range_max = floatval($value[$rangeMax_key]);
            $range_min_unit = $value[$rangeMinUnit_key];
            $range_max_unit = $value[$rangeMaxUnit_key];
            $type = intval($value[$type_key]) + 1;

            if($equipmentType == $type){
                if($float_testpoint >= $range_min && $float_testpoint <= $range_max){
                    $cmc = floatval($value[$cmcValue_key]);
                }
            }
        }

        return $cmc;
    }

    function dynamic_chamber_temperature_accuracy($specificationsData, $dataInputs, $calculatedData, $cmc_array = []){
        $channelCount = count((array)$calculatedData->table1->array_channels_used);

        $center_channel = $calculatedData->table1->variables->center;
        $center = str_replace('CH', '', $center_channel);
        $equipmentType = $specificationsData->equipmentType;

        $tableStart = 
        "<thead>
            <tr>
                <td valign='middle' style='margin-top:-8px;font-size:9.5pt;max-width:50px;padding:5px;' colspan='2'>
                   Chamber Temperature Controller/Indicator, °C
                </td>
               
                <td valign='middle' style='margin-top:-8px;font-size:9.5pt;max-width:50px;padding:5px;' colspan='".$channelCount."'>
                    Measured Mean Temperature at Measurement Location, °C
                </td>
              
                <td valign='middle' style='margin-top:-8px;font-size:9.5pt;max-width:50px;padding:5px;' rowspan='2'>
                    Uncertainty, °C
                </td>
              
            </tr>
        </thead>
        <tbody style='border: 0px solid red;'>";
        $tableEnd = '</tbody>';
        $trS = "<tr>";
        $trE = '</tr>';
        $tdS = "<td style='padding:10px;'>";
        $tdE = '</td>';

        $labels = $trS . $tdS . 'Setting' . $tdE . $tdS . 'Mean Indicator Reading' . $tdE;

        for ($i=1; $i <= $channelCount; $i++) { 
            if($i == $center){
                $labels .=  $tdS . $i.' (ref.)' . $tdE;
            }else{
                $labels .=  $tdS . $i . $tdE;
            }
        }

        $complete_table = $tableStart . $labels ;

        $tableCount = count((array)$calculatedData);

        for ($i=1; $i <= $tableCount; $i++) { 
            $tableKey = 'table'.$i;
            $tempSettingDisplay_key = 'tempSettingDisplay'.$i;
            $readability = $calculatedData->$tableKey->variables->resolution;
            $standardResolution = $calculatedData->$tableKey->variables->standardResolution;
            $number_decimal_readability = seeDecimal($readability);
            $number_decimal_standardResolution = seeDecimal($standardResolution);

            $setting_value = matchDecimal($calculatedData->$tableKey->variables->testPoint, $number_decimal_readability);
            $setting_value_display = matchDecimal($calculatedData->$tableKey->variables->testPoint, $number_decimal_readability);
            // $tempSettingDisplay = isset($calculatedData->$tableKey->variables->$tempSettingDisplay_key) ? ($calculatedData->$tableKey->variables->$tempSettingDisplay_key != "" ?  $calculatedData->$tableKey->variables->$tempSettingDisplay_key : $setting_value) : $setting_value;
            $tempSettingDisplay = isset($dataInputs->$tempSettingDisplay_key) ? ($dataInputs->$tempSettingDisplay_key != "" ?  $dataInputs->$tempSettingDisplay_key : $setting_value) : $setting_value;


            $mean_indicator_read = matchDecimal($calculatedData->$tableKey->variables->averageOfUUCIndication, $number_decimal_readability);

            $uncert_cmc_checked = check_cmc($specificationsData, $calculatedData->$tableKey->variables->testPoint, $calculatedData->$tableKey->uncertainty->expandedUncertainty, $cmc_array);
            $uncertainty = sigFig($uncert_cmc_checked, 2);

            $channels = $calculatedData->$tableKey->array_channels_used;

            // $results = $trS . $tdS . $setting_value . $tdE . $tdS . $mean_indicator_read . $tdE;
            $results = $trS . $tdS . $tempSettingDisplay . $tdE . $tdS . $mean_indicator_read . $tdE;

            //check for ellab
            $channel_1 = '1';
            $isEllab = isset($calculatedData->$tableKey->correctionForCertificate->$channel_1) ? 'true' : 'false';

            if($equipmentType != '5'){
                for ($ii=0; $ii < $channelCount; $ii++) { 

                    if($isEllab === 'true'){
                        $channelNumber = $ii + 1;
                        $correction = floatval($calculatedData->$tableKey->correctionForCertificate->$channelNumber);
                    }else{
                        $serialNumber = 'standardPerPositionTABLE'.$i.'ROW'.($ii+1);
                        $serialNumberKey = $dataInputs->$serialNumber;
                        $correction = floatval($calculatedData->$tableKey->correctionForCertificate->$serialNumberKey);
                    }

                    $channelKey = $channels[$ii];
                    $averageValue = floatval($calculatedData->$tableKey->averages->$channelKey);

                    $average = matchDecimal(($averageValue+$correction), $number_decimal_standardResolution);
                    $results .= $tdS . $average . $tdE;
                }
            }else{
                for ($ii=0; $ii < $channelCount; $ii++) { 
                    
                    $serialNumber = 'standardPerPositionTABLE'.$i.'ROW'.($ii+1);
                    $serialNumberKey = $dataInputs->$serialNumber;
                    $correction = floatval($calculatedData->$tableKey->correctionForCertificate->$serialNumberKey);

                    $channelKey = $channels[$ii];
                    $averageValue = floatval($calculatedData->$tableKey->averages->$channelKey);

                    $average = matchDecimal(($averageValue+$correction), $number_decimal_standardResolution);
                    $results .= $tdS . $average . $tdE;
                }
            }
            
            $results .= $tdS . $uncertainty . $tdE . $trE;
            $complete_table .= $results;
        }

        $complete_table .= $tableEnd;
        return $complete_table;
    }

    function dynamic_chamber_spatial_inhomogeneity($specificationsData, $dataInputs, $calculatedData){
        $channelCount = count($calculatedData->table1->array_inhomogeneity_channel_Keys);

        $tableStart = 
        "<thead>
            <tr>
                <td valign='middle' style='margin-top:-8px;font-size:9.5pt;max-width:50px;padding:10px;' rowspan='2'>
                   Chamber Temperature Setting, °C
                </td>
               
                <td valign='middle' style='margin-top:-8px;font-size:9.5pt;max-width:50px;padding:10px;' colspan='".$channelCount."'>
                    Temperature Spatial Inhomogeneity at Measurement Location, °C
                </td>

            </tr>
        </thead>
        <tbody style='border: 0px solid red;'>";
        $tableEnd = '</tbody>';
        $trS = "<tr>";
        $trE = '</tr>';
        $tdS = "<td style='padding:10px;'>";
        $tdE = '</td>';

        $labels = $trS ;

        for ($i=0; $i < $channelCount; $i++) { 
            $channel_number = str_replace('CH', '', $calculatedData->table1->array_inhomogeneity_channel_Keys[$i]);
            $labels .=  $tdS . intval($channel_number) . $tdE;
        }
        

        $complete_table = $tableStart . $labels ;

        $tableCount = count((array)$calculatedData);

        for ($i=1; $i <= $tableCount; $i++) { 
            $tableKey = 'table'.$i;

            $tempSettingDisplay_key = 'tempSettingDisplay'.$i;
            $readability = $calculatedData->$tableKey->variables->readability;
            $resolution = $calculatedData->$tableKey->variables->resolution;
            $standardResolution = $calculatedData->$tableKey->variables->standardResolution;
            $number_decimal_readability = seeDecimal($readability);
            $number_decimal_resolution = seeDecimal($resolution);
            $number_decimal_standardResolution = seeDecimal($standardResolution);

            $setting_value = matchDecimal($calculatedData->$tableKey->variables->testPoint, $number_decimal_resolution);
            $tempSettingDisplay = isset($dataInputs->$tempSettingDisplay_key) ? ($dataInputs->$tempSettingDisplay_key != "" ?  $dataInputs->$tempSettingDisplay_key : $setting_value) : $setting_value;

            $channels = $calculatedData->$tableKey->array_inhomogeneity_channel_Keys;

            $results = $trS . $tdS . $tempSettingDisplay . $tdE ;
            for ($ii=0; $ii < $channelCount; $ii++) { 
                $channelKey = $channels[$ii];
                $max_inhomogeneity = matchDecimal($calculatedData->$tableKey->spatial_inhomogeneity_min_max_certificate_value->$channelKey->max, $number_decimal_standardResolution);
                $results .= $tdS . $max_inhomogeneity . $tdE;
            }
            $results .= $trE;
            $complete_table .= $results;
        }

        $complete_table .= $tableEnd;
        return $complete_table;
    }

    function dynamic_chamber_temporal_instability($specificationsData, $dataInputs, $calculatedData){
        $channelCount = count($calculatedData->table1->array_inhomogeneity_channel_Keys);
        $center_channel = $calculatedData->table1->variables->center;

        $tableStart = 
        "<thead>
            <tr>
                <td valign='middle' style='margin-top:-8px;font-size:9.5pt;max-width:50px;padding:10px;'>
                   Chamber Temperature Setting, °C
                </td>
               
                <td valign='middle' style='margin-top:-8px;font-size:9.5pt;max-width:50px'>
                    Temperature Instability, °C
                </td>

            </tr>
        </thead>
        <tbody style='border: 0px solid red;'>";
        $tableEnd = '</tbody>';
        $trS = "<tr>";
        $trE = '</tr>';
        $tdS = "<td style='padding:10px;'>";
        $tdE = '</td>';

        $complete_table = $tableStart;

        $tableCount = count((array)$calculatedData);

        for ($i=1; $i <= $tableCount; $i++) { 
            $tableKey = 'table'.$i;

            $tempSettingDisplay_key = 'tempSettingDisplay'.$i;
            $readability = $calculatedData->$tableKey->variables->readability;
            $resolution = $calculatedData->$tableKey->variables->resolution;
            $standardResolution = $calculatedData->$tableKey->variables->standardResolution;
            $number_decimal_readability = seeDecimal($readability);
            $number_decimal_resolution = seeDecimal($resolution);
            $number_decimal_standardResolution = seeDecimal($standardResolution);

            $setting_value = matchDecimal($calculatedData->$tableKey->variables->testPoint, $resolution);
            // $tempSettingDisplay = isset($calculatedData->$tableKey->variables->tempSettingDisplay) ? ($calculatedData->$tableKey->variables->tempSettingDisplay != "" ?  $calculatedData->$tableKey->variables->tempSettingDisplay : $setting_value) : $setting_value;
            $tempSettingDisplay = isset($dataInputs->$tempSettingDisplay_key) ? ($dataInputs->$tempSettingDisplay_key != "" ?  $dataInputs->$tempSettingDisplay_key : $setting_value) : $setting_value;

            $channels = $calculatedData->$tableKey->array_channels_used;

            // $results = $trS . $tdS . $setting_value . $tdE ;
            $results = $trS . $tdS . $tempSettingDisplay . $tdE ;
            $channelKey = $center_channel;

            $max_instability = matchDecimal($calculatedData->$tableKey->temporal_instability_min_max_certificate_value->$channelKey->max, $number_decimal_standardResolution);
            $results .= $tdS . $max_instability . $tdE;

            $results .= $trE;
            $complete_table .= $results;
        }

        $complete_table .= $tableEnd;
        return $complete_table;
    }

    function dynamic_graphs($img_data){
        $img_full = $img_data;
        $array_img_data = explode('(SPLITHERE)', $img_full);
        
        $complete_table = '';

        for ($i=0; $i < count($array_img_data); $i++) { 
            $img_start = '<img src="';
            $img_end = '" alt="Chart Error" class="myimage" style="top: 7%;position:relative; width:90%;border:1px solid black"><br><br>';
            $url = $array_img_data[$i];

            $results = $img_start . $url . $img_end;


            $complete_table .= $results;
        }

        return $complete_table;
    }
    function dynamic_graphs_multipoints($img_data, $pageCount, $equipmentType = '0'){
        $img_full = $img_data;
        $array_img_data = explode('(SPLITHERE)', $img_full);
        if($equipmentType == '5'){
            $pageStart = ' <div class="page">
                <div style="position:relative;height:auto;border:0px solid red;">
                    <div class="" style="position: relative; font-size:9.5pt;">
                        <p style="font-weight:bold; font-size:9.5pt;">Calibration Results</p>
                    </div>
                    <div style="position: relative; font-size:9.5pt; ">
                        <div class="" >
                            <div>
                                <p>4. Graphical representation of the Chamber Temperature Instability</p>
                            </div>
                            <div style="position: relative;font-size:9.5pt;height:auto; border:0px black dotted; left:300px;">';
        }else{
            $pageStart = ' <div class="page">
                <div style="position:absolute;top:120;height:auto;border:0px solid red">
                    <div class="" style="position: relative; font-size:9.5pt;">
                        <p style="font-weight:bold; font-size:9.5pt;">Calibration Results</p>
                    </div>
                    <div style="position: relative; font-size:9.5pt; margin-left:2em;">
                        <div class="" >
                            <div>
                                <p>4. Graphical representation of the Chamber Temperature Instability</p>
                            </div>
                            <div style="position: relative;font-size:9.5pt;height:auto; border:0px black dotted;">';
        }

        
        $pageStartContinuation = ' <div class="page">
                <div style="position:absolute;top:120;height:auto;border:0px solid red">
                    <div class="" style="position: relative; font-size:9.5pt;">
                        <p style="font-weight:bold; font-size:9.5pt;">Calibration Results</p>
                    </div>
                    <div style="position: relative; font-size:9.5pt; margin-left:2em;">
                        <div class="" >
                          <div>
                                <p> <br></p>
                            </div>
                            <div style="position: relative;font-size:9.5pt;height:auto; border:0px black dotted;">';
        $pageEnd = '</div>
                        </div>
                    </div>
                </div>
                <div style="position: absolute; top:682; right:10%; font-size:9.5pt;">
                    <p style="position: absolute; top:0;font-size:9.5pt;">';
        $pageAfterNumber = ' of '.$pageCount.'</p>
                </div>
            </div>';

        $complete_table = '';

       $pageNumber = 4;

        for ($i=0; $i < count($array_img_data); $i++) { 
            
            if($i == 0){
                $complete_table .= $pageStart;
            }else if((($i+1) % 2) == 1 && $equipmentType != '5'){
                $complete_table .= $pageStartContinuation;
            }

            $img_start = '<img src="';
            if($equipmentType == '5'){
                $img_end = '" alt="Chart Error" class="myimage" style="top: 7%;position:relative; width:60%;border:1px solid black"><br><br>';
            }else{
                $img_end = '" alt="Chart Error" class="myimage" style="top: 7%;position:relative; width:90%;border:1px solid black"><br><br>';
            }
            
            $url = $array_img_data[$i];

            $results = $img_start . $url . $img_end;


            $complete_table .= $results;

            if($equipmentType == '5'){
                if((($i+1) % 3) == 0 || ($i+1) == count($array_img_data)){
                    $complete_table .= $pageEnd . $pageNumber . $pageAfterNumber;
                    $pageNumber += 1;
                }
            }else{
                if((($i+1) % 2) == 0 || ($i+1) == count($array_img_data)){
                    $complete_table .= $pageEnd . $pageNumber . $pageAfterNumber;
                    $pageNumber += 1;
                }
            }
        }

        return $complete_table;
    }

    function dynamic_diagram($image_diagram){
        // $image_paths = [
        //     'diagram1' => 'image/Autoclave sensor 2.png',
        //     'diagram2' => 'image/enclosureIncubator.png',
        //     'diagram3' => 'image/Freezer.png',
        //     'diagram4' => 'image/liquid Bath bowl no sensor.png',
        //     'diagram5' => 'image/liquid Bath rectangle left sensor.png',
        //     'diagram6' => 'image/liquid Bath rectangle right sensor.png',
        // ];

        // $image = '';

        // $diagram1_inDB = isset($array_DataInput->diagram1) ? $array_DataInput->diagram1 : 'false'; 
        // $diagram2_inDB = isset($array_DataInput->diagram2) ? $array_DataInput->diagram2 : 'false'; 
        // $diagram3_inDB = isset($array_DataInput->diagram3) ? $array_DataInput->diagram3 : 'false'; 
        // $diagram4_inDB = isset($array_DataInput->diagram4) ? $array_DataInput->diagram4 : 'false'; 
        // $diagram5_inDB = isset($array_DataInput->diagram5) ? $array_DataInput->diagram5 : 'false'; 
        // $diagram6_inDB = isset($array_DataInput->diagram6) ? $array_DataInput->diagram6 : 'false'; 
        // $diagramOther_inDB = isset($array_DataInput->diagramOther) ? $array_DataInput->diagramOther : 'false'; 

        // if($diagram1_inDB == 'checked'){
        //     $path = $image_paths['diagram1'];
        //     $type = pathinfo($path, PATHINFO_EXTENSION);
        //     $data = file_get_contents($path);
        //     $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        //     $image = "<img src='". $base64 ."' height='200px'>";
        // }elseif($diagram2_inDB == 'checked'){
        //     $path = $image_paths['diagram2'];
        //     $type = pathinfo($path, PATHINFO_EXTENSION);
        //     $data = file_get_contents($path);
        //     $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        //     $image = "<img src='". $base64 ."' height='200px'>";
        // }elseif($diagram3_inDB == 'checked'){
        //     $path = $image_paths['diagram3'];
        //     $type = pathinfo($path, PATHINFO_EXTENSION);
        //     $data = file_get_contents($path);
        //     $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        //     $image = "<img src='". $base64 ."' height='200px'>";
        // }elseif($diagram4_inDB == 'checked'){
        //     $path = $image_paths['diagram4'];
        //     $type = pathinfo($path, PATHINFO_EXTENSION);
        //     $data = file_get_contents($path);
        //     $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        //     $image = "<img src='". $base64 ."' height='200px'>";
        // }elseif($diagram5_inDB == 'checked'){
        //     $path = $image_paths['diagram5'];
        //     $type = pathinfo($path, PATHINFO_EXTENSION);
        //     $data = file_get_contents($path);
        //     $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        //     $image = "<img src='". $base64 ."' height='200px'>";
        // }elseif($diagram6_inDB == 'checked'){
        //     $path = $image_paths['diagram6'];
        //     $type = pathinfo($path, PATHINFO_EXTENSION);
        //     $data = file_get_contents($path);
        //     $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        //     $image = "<img src='". $base64 ."' height='200px'>";
        // }elseif($diagramOther_inDB == 'checked'){
        //     $image = "<img src='". $incubatorBase64 ."' height='200px'>";
        // }else{
        //     $path = 'image/enclosureIncubator.png';
        //     $type = pathinfo($path, PATHINFO_EXTENSION);
        //     $data = file_get_contents($path);
        //     $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        //     $image = "<img src='". $base64 ."' height='200px'>";
        // }
        
        // $image = "<img src='". $image_diagram[0] ."' height='200px'>";


        $path = 'image/enclosureIncubator.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);


        $image_src = $base64;
        if($image_diagram['image'] != ''){
            $image_src = $image_diagram['image'];
        }
        $image = "<img src='". $image_src ."' height='200px'>";
        return $image;
        
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

    </style>

    <style>
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
    <?php 
        if($equipmentType != '5'){

    ?>

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
                                echo $placeholders[0]['module11CalibrationProcedureAndTraceability'];
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
                                echo standardUsedGetDetails($selectedStandardPieces, $selectedStandardDetails);
                            ?>
                        </tbody>
    

                    </table>
                </div>
                <div class="" style="position: relative;font-size:9.5pt;height:auto;border:0px blue dotted;">
                    <p style='font-weight:bold;text-decoration: underline;font-size:9.5pt;top:2;'>Calibration Results</p>
                    <p style='max-width:95%;font-size:9.5pt;margin-top:-10;'>
                        <?php 
                            if($dataFromDB['settingCalibrationResults'] == ""){
                                echo $placeholders[0]['module11CalibrationResults'];
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
                                echo $placeholders[0]['module11UncertaintyOfMeasurement'];
                            }else{
                                echo $dataFromDB['settingUncertaintyOfMeasurement'];
                            }
                        ?>
                    </p>
                </div>

                <div class="" style="position: relative;font-size:9.5pt;height:auto; border:0px black dotted;margin-top:-1%;">
                    <p style='font-weight:bold;text-decoration: underline;margin-top:5;'>Remarks:</p> <br>
                    <table style="border: 0px; width: 90%; font-size:9.5pt;margin-top:-15;">
                        <tbody>
                            <?php
                                if($dataFromDB['settingRemarks'] == ""){
                                    $remarks = $placeholders[0]['module11Remarks'];
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
                <p style='position: absolute; top:0;font-size:9.5pt;'>1 of <?= $pageCount?></p>
            </div>
        </div>

        <div class="page">
            <div style="position:absolute;top:120;height:auto;border:0px solid red">
                <div class="" style="position: relative; font-size:9.5pt;">
                    <p style='font-weight:bold; font-size:9.5pt;'>Calibration Results</p>
                </div>
                <div style="position: relative; font-size:9.5pt; margin-left:2em;">
                    <div class="" >
                        <div>
                            <p>1. Chamber Temperature Accuracy</p>
                        </div>
                        <table class='resultTable' style="min-width: 95%;line-height: 1;" id="">
                            <?php  
                                echo dynamic_chamber_temperature_accuracy($specificationsData,$dataInputs,$calculatedData,$cmc_array);
                            ?>
                        </table>
                    </div>
                    
                    <div class="" style="position: relative; font-size:9.5pt; line-height: 1.5;">
                        <div>
                            <p style="font-style:italic; font-weight:bold; font-size:9pt;">Results were obtained with the chamber in unloaded state. The results stated are valid only for the useful volume of the chamber spanned by the measuring locations. All other parts of the chamber volume are considered not to be calibrated.</p>
                        </div>
                    </div>

                    <div style="position: relative; top:5%">
                        <?php  
                            echo dynamic_diagram($img_diagram);
                        ?>                    
                    </div>
                </div>
                
                <!-- Results were obtained with the chamber in unloaded state. The results stated are valid only for the useful volume of the chamber spanned by the measuring locations. All other parts of the chamber volume are considered not to be calibrated.
                Results were obtained with the chamber in loaded state. The loading effect was not attributed in the measurement uncertainty stated.The results stated are valid only for the useful volume of the chamber spanned by the measuring locations. All other parts of the chamber volume are considered not to be calibrated. -->
            </div>
            <div style="position: absolute; top:682; right:10%; font-size:9.5pt;">
                <p style='position: absolute; top:0;font-size:9.5pt;'>2 of <?= $pageCount?></p>
            </div>
        </div>



        <?php
           
            if($tableCount === 1){

            
        ?>
            <div class="page">
                <div style="position:absolute;top:120;height:auto;border:0px solid red">
                    <div class="" style="position: relative; font-size:9.5pt;">
                        <p style='font-weight:bold; font-size:9.5pt;'>Calibration Results</p>
                    </div>
                    <div style="position: relative; font-size:9.5pt; margin-left:2em;">
                        <div class="" >
                            <div>
                                <p>2. Chamber Temperature Spatial Inhomogeneity</p>
                            </div>
                            <table class='resultTable' style="min-width: 95%;line-height: 1;" id="">
                                <?php  
                                    echo dynamic_chamber_spatial_inhomogeneity($specificationsData,$dataInputs,$calculatedData);
                                ?>
                            </table>
                        </div>
                        <div class="" style="position: relative; font-size:9.5pt; line-height: 1.5;">
                            <div>
                                <p style="font-size:9pt;">Temperature spatial  inhomogeneity is the maximum value of the temperature differences observed between the various measurement locations and the reference location.</p>
                            </div>
                        </div>
                    </div>
                    <div style="position: relative; font-size:9.5pt; margin-left:2em;">
                        <div class="" >
                            <div>
                                <p>3. Chamber Temperature Temporal Instability</p>
                            </div>
                            <table class='resultTable' style="min-width: 60%;line-height: 1;" id="">
                                <?php  
                                    echo dynamic_chamber_temporal_instability($specificationsData,$dataInputs,$calculatedData);
                                ?>
                            </table>
                        </div>
                        <div class="" style="position: relative; font-size:9.5pt; line-height: 1.5;">
                            <div>
                                <p style="font-size:9pt;">Temperature instability is the maximum temperature variation at the reference measurement  position observed over a period of at least 30 min after steady-state conditions have been reached.</p>
                            </div>
                        </div>
                    </div>
                    <div style="position: relative; font-size:9.5pt; margin-left:2em;">
                        <div class="" >
                            <div>
                                <p>4. Graphical representation of the Chamber Temperature Instability</p>
                            </div>
                            <div style="position: relative;font-size:9.5pt;height:auto; border:0px black dotted;">
                                <?php  
                                    echo dynamic_graphs($img['image']);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="position: absolute; top:682; right:10%; font-size:9.5pt;">
                    <p style='position: absolute; top:0;font-size:9.5pt;'>3 of <?= $pageCount?></p>
                </div>
            </div>
        <?php
            }else{
        ?>
            <div class="page">
                <div style="position:absolute;top:120;height:auto;border:0px solid red">
                    <div class="" style="position: relative; font-size:9.5pt;">
                        <p style='font-weight:bold; font-size:9.5pt;'>Calibration Results</p>
                    </div>
                    <div style="position: relative; font-size:9.5pt; margin-left:2em;">
                        <div class="" >
                            <div>
                                <p>2. Chamber Temperature Spatial Inhomogeneity</p>
                            </div>
                            <table class='resultTable' style="min-width: 95%;line-height: 1;" id="">
                                <?php  
                                    echo dynamic_chamber_spatial_inhomogeneity($specificationsData,$dataInputs,$calculatedData);
                                ?>
                            </table>
                        </div>
                        <div class="" style="position: relative; font-size:9.5pt; line-height: 1.5;">
                            <div>
                                <p style="font-size:9pt;">Temperature spatial  inhomogeneity is the maximum value of the temperature differences observed between the various measurement locations and the reference location.</p>
                            </div>
                        </div>
                    </div>
                    <div style="position: relative; font-size:9.5pt; margin-left:2em;">
                        <div class="" >
                            <div>
                                <p>3. Chamber Temperature Temporal Instability</p>
                            </div>
                            <table class='resultTable' style="min-width: 60%;line-height: 1;" id="">
                                <?php  
                                    echo dynamic_chamber_temporal_instability($specificationsData,$dataInputs,$calculatedData);
                                ?>
                            </table>
                        </div>
                        <div class="" style="position: relative; font-size:9.5pt; line-height: 1.5;">
                            <div>
                                <p style="font-size:9pt;">Temperature instability is the maximum temperature variation at the reference measurement  position observed over a period of at least 30 min after steady-state conditions have been reached.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Results were obtained with the chamber in unloaded state. The results stated are valid only for the useful volume of the chamber spanned by the measuring locations. All other parts of the chamber volume are considered not to be calibrated.
                    Results were obtained with the chamber in loaded state. The loading effect was not attributed in the measurement uncertainty stated.The results stated are valid only for the useful volume of the chamber spanned by the measuring locations. All other parts of the chamber volume are considered not to be calibrated. -->
                </div>
                <div style="position: absolute; top:682; right:10%; font-size:9.5pt;">
                    <p style='position: absolute; top:0;font-size:9.5pt;'>3 of <?= $pageCount?></p>
                </div>
            </div>

            <?php  
                echo dynamic_graphs_multipoints($img['image'], $pageCount);
            ?>

        <?php
            
            }
        ?>
    <?php 
        }else{
    ?>
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
                                echo $placeholders[0]['module11CalibrationProcedureAndTraceability'];
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
                                echo standardUsedGetDetails($selectedStandardPieces, $selectedStandardDetails);
                            ?>
                        </tbody>
    

                    </table>
                </div>
                <div class="" style="position: relative;font-size:9.5pt;height:auto;border:0px blue dotted;">
                    <p style='font-weight:bold;text-decoration: underline;font-size:9.5pt;top:2;'>Calibration Results</p>
                    <p style='max-width:95%;font-size:9.5pt;margin-top:-10;'>
                        <?php 
                            if($dataFromDB['settingCalibrationResults'] == ""){
                                echo $placeholders[0]['module11CalibrationResults'];
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
                                echo $placeholders[0]['module11UncertaintyOfMeasurement'];
                            }else{
                                echo $dataFromDB['settingUncertaintyOfMeasurement'];
                            }
                        ?>
                    </p>
                </div>

                <div class="" style="position: relative;font-size:9.5pt;height:auto; border:0px black dotted;margin-top:-1%;">
                    <p style='font-weight:bold;text-decoration: underline;margin-top:5;'>Remarks:</p> <br>
                    <table style="border: 0px; width: 90%; font-size:9.5pt;margin-top:-15;">
                        <tbody>
                            <?php
                                if($dataFromDB['settingRemarks'] == ""){
                                    $remarks = $placeholders[0]['module11Remarks'];
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
                <p style='position: absolute; top:0;font-size:9.5pt;'>1 of <?= $pageCount?></p>
            </div>
        </div>

        <div class="page">
            <div style="position:absolute;top:120;height:auto;border:0px solid red">
                <div class="" style="position: relative; font-size:9.5pt;">
                    <p style='font-weight:bold; font-size:9.5pt;'>Calibration Results</p>
                </div>
                <div style="position: relative; font-size:9.5pt; margin-left:2em;">
                    <div class="" >
                        <div>
                            <p>1. Chamber Temperature Accuracy</p>
                        </div>
                        <table class='resultTable' style="min-width: 95%;line-height: 1;" id="">
                            <?php  
                                echo dynamic_chamber_temperature_accuracy($specificationsData,$dataInputs,$calculatedData,$cmc_array);
                            ?>
                        </table>
                    </div>
                    <div class="" >
                            <div>
                                <p>2. Chamber Temperature Spatial Inhomogeneity</p>
                            </div>
                            <table class='resultTable' style="min-width: 95%;line-height: 1;" id="">
                                <?php  
                                    echo dynamic_chamber_spatial_inhomogeneity($specificationsData,$dataInputs,$calculatedData);
                                ?>
                            </table>
                        </div>
                        <div class="" style="position: relative; font-size:9.5pt; line-height: 1.5;">
                            <div>
                                <p style="font-size:9pt;">Temperature spatial  inhomogeneity is the maximum value of the temperature differences observed between the various measurement locations and the reference location.</p>
                            </div>
                        </div>

                        <div class="" >
                            <div>
                                <p>3. Chamber Temperature Temporal Instability</p>
                            </div>
                            <table class='resultTable' style="min-width: 60%;line-height: 1;" id="">
                                <?php  
                                    echo dynamic_chamber_temporal_instability($specificationsData,$dataInputs,$calculatedData);
                                ?>
                            </table>
                        </div>
                        <div class="" style="position: relative; font-size:9.5pt; line-height: 1.5;">
                            <div>
                                <p style="font-size:9pt;">Temperature instability is the maximum temperature variation at the reference measurement  position observed over a period of at least 30 min after steady-state conditions have been reached.</p>
                            </div>
                        </div>
                </div>
                
                <!-- Results were obtained with the chamber in unloaded state. The results stated are valid only for the useful volume of the chamber spanned by the measuring locations. All other parts of the chamber volume are considered not to be calibrated.
                Results were obtained with the chamber in loaded state. The loading effect was not attributed in the measurement uncertainty stated.The results stated are valid only for the useful volume of the chamber spanned by the measuring locations. All other parts of the chamber volume are considered not to be calibrated. -->
            </div>
            <div style="position: absolute; top:682; right:10%; font-size:9.5pt;">
                <p style='position: absolute; top:0;font-size:9.5pt;'>2 of <?= $pageCount?></p>
            </div>
        </div>

            <div class="page">
                <div style="position:absolute;top:120;height:auto;border:0px solid red">
                    <div style="position: absolute; font-size:9.5pt; z-index:0">
                        <div style="position: relative; top:35%">
                            <?php  
                                echo dynamic_diagram($img_diagram);
                            ?>   
                            <p><b>X</b> Sensor Location</p>
                        </div>
                    </div>
                    <?php  
                        echo dynamic_graphs_multipoints($img['image'], $pageCount, '5');
                    ?>
                </div>
                <div style="position: absolute; top:682; right:10%; font-size:9.5pt;">
                    <p style='position: absolute; top:0;font-size:9.5pt;'>3 of <?= $pageCount?></p>
                </div>
            </div>

    <?php 
        }
    ?>
        
    </main>
</body>
</html>   