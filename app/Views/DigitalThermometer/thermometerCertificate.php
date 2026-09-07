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

    $pathIllusDraft = 'image/draft.png';
    $typeIllusDraft = pathinfo($pathIllusDraft, PATHINFO_EXTENSION);
    $dataIllusDraft = file_get_contents($pathIllusDraft);
    $base64IllusDraft = 'data:image/' . $typeIllusDraft . ';base64,' . base64_encode($dataIllusDraft);

    $customerData = json_decode($dataFromDB['customerInfo']);   
    $environmentData = json_decode($dataFromDB['environmentArray'])->environment ?? json_decode($dataFromDB['environmentInfo']);   
    $specificationsData = json_decode($dataFromDB['specificationsArray'])->specifications ?? json_decode($dataFromDB['equipmentInfo']);
    $dataInputs = json_decode($dataFromDB['dataInputs']) ?? 0;
    $calculatedData = json_decode($dataFromDB['calculatedValues']) ?? json_decode($dataFromDB['calculatedData']);

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

    $datas = $calculatedData;

    $standardReadingDecimalPointCount = seeDecimal($specificationsData->resolution);

    $numberOfPages = 2;

    if(isset($specificationsData->customDecimal)){
        if($specificationsData->customDecimal != '-1'){
            $standardReadingDecimalPointCount = $specificationsData->customDecimal;
        }
    }


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
    function ambient($start, $end){
        $float_start = floatval($start);
        $float_end = floatval($end);
        $average = round((($float_start + $float_end) / 2), 1);
        $result = round(abs($float_end - $average), 1);
        return "(" . $average. " ± " . $result . ")";
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

    $byTable = array_keys((array)$datas[0]);
    

    function addingReso($specificationsData, ){
        $leftSideArray = [];        

        if(isset($specificationsData->equipmentType)){
            if($specificationsData->type == 'analog'){
                $resolution_graduation = 'Graduation';
            }else{
                $resolution_graduation = 'Resolution';
            }
        }else{
            $resolution_graduation = 'Resolution';
        }

        $range_text = '';

        if($specificationsData->range != "" && $specificationsData->rangeMax != ""){
            $range_text = $specificationsData->range." ".$specificationsData->rangeUnit." to ".$specificationsData->rangeMax." ".$specificationsData->rangeMaxUnit;
        }
        if($specificationsData->range == "" && $specificationsData->rangeMax != ""){
            $range_text = $specificationsData->rangeMax." ".$specificationsData->rangeMaxUnit;
        }
        if($specificationsData->range != "" && $specificationsData->rangeMax == ""){
            $range_text = $specificationsData->range." ".$specificationsData->rangeUnit;
        }
        if(strtoupper($specificationsData->rangeMax) == "NONE INDICATED"){
            $range_text = $specificationsData->rangeMax;
        }
        


        $reso = '<span class="label">'.$resolution_graduation.'</span><span class="between">: </span><p class="text">'.$specificationsData->resolution." ".$specificationsData->rangeMaxUnit.'</p>';
        $range = '<span class="label">Range</span><span class="between">: </span><p class="text">'.$range_text.'</p>';
        $manu = '<span class="label">Manufacturer</span><span class="between">: </span><p class="text">'.$specificationsData->manufacturer.'</p>';
        $model = '<span class="label">Model No.</span><span class="between">: </span><p class="text">'.$specificationsData->modelNumber.'</p>';
        $seri = '<span class="label">Serial No.</span><span class="between">: </span><p class="text">'.$specificationsData->serialNumber.'</p>';
        $equipID = '<span class="label">Equipment ID</span><span class="between">: </span><p class="text">'.$specificationsData->equipmentNumber.'</p>';
        array_push($leftSideArray,$reso);
        array_push($leftSideArray,$range);
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

    function isCmc($val){
        if($val==-20){
            return 0.66;
        }
        if($val==0){
            return 0.17;
        }
        if($val>0){
            if($val<76){
                return 0.18;
            }
        }
        if($val>75){
            if($val<201){
                return 0.18;
            }
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

    function standardUsedGetDetails($array_selectedStandard, $array_standardDetails){
        $selectedStandardsInRow = '';
        foreach ($array_standardDetails as $item) {
            if(in_array($item['serialNumber'], $array_selectedStandard)){
                $description = $item['standard'];
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

    function set_custom($CP, $depth, $statement, $immersion = 'complete'){
        $exploded_statement = explode("////COMMENTS", $statement);
        $statement = explode("(DEPTH)",  $exploded_statement[0]);

        if($CP == '1'){
            $depth = $immersion . ' depth of ' . $depth . ' cm';
        }else{
            $depth = 'depth of ' . $depth . ' cm';
        }

        $return_statement = $statement[0] . " " . $depth . $statement[1];
        return $return_statement;
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
    $isPAB = true;
    $cmc_array = json_decode($cmc[0]['conditions']);
    function checkCMC($class, $range, &$isPAB, $cmc_array){
        $float_range = floatval($range);
        $cmc = 0;
        $cmc_conditions = json_decode($cmc_array[0]['conditions'], true);
        
        // if($class == '1'){ 
        //     //Digital Temperature indicator systems CMC
        //     // if($float_range >= -40 && $float_range <=250){
        //     if($float_range >= -40 && $float_range <=100){
        //         $cmc = 0.18;
        //     }
        //     if($float_range > 100 && $float_range <=250){
        //         $cmc = 0.23;
        //     }
        // }else if($class == '2'){
        //     //Liquid-in-Glass CMC
        //     if($float_range >= -40 && $float_range <=100){
        //         $cmc = 0.18;
        //     }
        //     if($float_range > 100 && $float_range <=250){
        //         $cmc = 0.23;
        //     }
        // }else{
        //     //Bimetallic System CMC
        //     if($float_range >= -40 && $float_range <=100){
        //         $cmc = 0.19;
        //     }
        //     if($float_range > 100 && $float_range <=250){
        //         $cmc = 0.24;
        //     }
        // }

        foreach($cmc_conditions as $key => $value ){
            $row_num = $key + 1;
            
            $rangeMin_key = 'rangeMinRow'.$row_num;
            $rangeMinUnit_key = 'rangeMinUnitRow'.$row_num;
            $rangeMax_key = 'rangeMaxRow'.$row_num;
            $rangeMaxUnit_key = 'rangeMaxUnitRow'.$row_num;
            $cmcValue_key = 'cmcValueRow'.$row_num;
            $classification_key = 'classRow'.$row_num;

            $cmc_classification = $value[$classification_key] + 1;

            if($class == $cmc_classification){ 
                if($float_range >= $value[$rangeMin_key] && $float_range <= $value[$rangeMax_key]){
                    $cmc = $value[$cmcValue_key];
                    break;
                }
            }

        }


        return $cmc;
    }

    function dynamic_page_two($calculatedData, $dataInputs, $specificationsData, $placeholders, $dataFromDB, $standardReadingDecimalPointCount, &$numberOfPages,$cmc){

        $tableCount = count($calculatedData);
        $remarksStart = '<div class="" style="position: relative;font-size:9.5pt;height:auto; border:0px black dotted;margin-top:-1%; margin-bottom:1%"><p style="font-weight:bold;text-decoration: underline;margin-top:5;">Remarks:</p> <br><table style="border: 0px; width: 90%; font-size:9.5pt;margin-top:-15;"><tbody>';
        function remarksBody($specificationsData, $placeholders, $dataFromDB){
            $immersionDepthKey = 'statement_immersionDepth';
            $calibrationProcedureKey = 'calibrationProcedure';

            $liquidInGlassCKey = 'liquidInGlassC';
            $liquidInGlassTKey = 'liquidInGlassT';
            $liquidInGlassPKey = 'liquidInGlassP';
            $liquidInGlassNKey = 'liquidInGlassN';
            $partialImmersionKey = 'partialImmersion';
            $otherDepthKey = 'otherDepth';
            
            $immersionDepthValue = $specificationsData->$immersionDepthKey;
            $calibrationProcedureValue = $specificationsData->$calibrationProcedureKey;

            $liquidInGlassCValue = $specificationsData->$liquidInGlassCKey;
            $liquidInGlassTValue = $specificationsData->$liquidInGlassTKey;
            $liquidInGlassPValue = $specificationsData->$liquidInGlassPKey;
            $liquidInGlassNValue = $specificationsData->$liquidInGlassNKey;

            $immersion = 'Complete';
            if($liquidInGlassCValue === 'checked'){
                $immersion = 'complete';
            }
            if($liquidInGlassTValue === 'checked'){
                $immersion = 'total';
            }
            if($liquidInGlassPValue === 'checked' || $liquidInGlassNValue === 'checked'){
                $immersion = 'partial';
            }

            

            if($dataFromDB['settingRemarks1'] == ""){
                $statement = set_custom($calibrationProcedureValue, $immersionDepthValue, $placeholders[0]['module5Remarks'], $immersion);
                $remarks = $statement;
            }else{
                $statement = set_custom($calibrationProcedureValue, $immersionDepthValue, $dataFromDB['settingRemarks1'], $immersion);
                $remarks = $statement;
            }

            $remarksSeparated = explode("(splitHere)", $remarks);
            $remarks_full = '';
            for ($i=0; $i < count($remarksSeparated); $i++) { 
                $remarks_full .= "<tr valign='top' style='font-size:9.5pt;'><td>".($i+1).". "."</td><td>".$remarksSeparated[$i]."</td></tr>";
            }
            return $remarks_full;
        }
        $remarksEnd = '</tbody></table></div>';
        function sensors_statement($dataInputs, $table_capital_t){
            $sensorTypeKey = 'sensorType'.$table_capital_t; 
            $manufacturerKey = 'manufacturer'.$table_capital_t;
            $modelNumberKey = 'modelNumber'.$table_capital_t; 
            $serialNumberKey = 'serialNumber'.$table_capital_t; 
            $equipmentIDKey = 'equipmentID'.$table_capital_t; 
            $probeLengthKey = 'probeLength'.$table_capital_t; 
            $channelKey = 'channel'.$table_capital_t; 

            $sensorTypeValue_key_check = isset($dataInputs->$sensorTypeKey) ? $dataInputs->$sensorTypeKey : '(NotSet)';
            $manufacturerValue_key_check = isset($dataInputs->$manufacturerKey) ? $dataInputs->$manufacturerKey : '(NotSet)';
            $modelNumberValue_key_check = isset($dataInputs->$modelNumberKey) ? $dataInputs->$modelNumberKey : '(NotSet)';
            $serialNumberValue_key_check = isset($dataInputs->$serialNumberKey) ? $dataInputs->$serialNumberKey : '(NotSet)';
            $equipmentIDValue_key_check = isset($dataInputs->$equipmentIDKey) ? $dataInputs->$equipmentIDKey : '(NotSet)';
            $probeLengthValue_key_check = isset($dataInputs->$probeLengthKey) ? $dataInputs->$probeLengthKey : '(NotSet)';
            $channelValue_key_check = isset($dataInputs->$channelKey) ? $dataInputs->$channelKey : '(NotSet)';

            $sensorTypeValue = $sensorTypeValue_key_check != '' ? $sensorTypeValue_key_check : '(NotSet)'; 
            $manufacturerValue = $manufacturerValue_key_check != '' ? $manufacturerValue_key_check : '(NotSet)'; 
            $modelNumberValue = $modelNumberValue_key_check != '' ? $modelNumberValue_key_check : '(NotSet)'; 
            $serialNumberValue = $serialNumberValue_key_check != '' ? $serialNumberValue_key_check : '(NotSet)'; 
            $equipmentIDValue = $equipmentIDValue_key_check != '' ? $equipmentIDValue_key_check : '(NotSet)'; 
            $probeLengthValue = $probeLengthValue_key_check != '' ? $probeLengthValue_key_check : '(NotSet)'; 
            $channelValue = $channelValue_key_check != '' ? $channelValue_key_check : '(NotSet)'; 


            $sensor_start = '<div style="position: relative; border:0px blue dotted; margin-top:1em; margin-bottom:0.5em"><table style="width:100%">';
            $sensor_end = '</table></div>';
            $sensor_row_start = '<tr>';
            $sensor_row_end = '</tr>';
            $sensor_title_start = '<td style="border:0px black solid; width:100px">';
            $sensor_colon_start = '<td style="border:0px black solid; width:10px">';
            $sensor_value_start = '<td style="border:0px black solid; ">';
            $sensor_data_end = '</td>';

            $sensor_type = $sensorTypeValue != '(NotSet)' ? $sensor_row_start . $sensor_title_start . 'Sensor Type' . $sensor_data_end . $sensor_colon_start . ':' . $sensor_data_end . $sensor_value_start . $sensorTypeValue . $sensor_data_end . $sensor_row_end : '';
            $sensor_manufacturer = $manufacturerValue != '(NotSet)' ? $sensor_row_start . $sensor_title_start . 'Manufacturer' . $sensor_data_end . $sensor_colon_start . ':' . $sensor_data_end . $sensor_value_start . $manufacturerValue . $sensor_data_end . $sensor_row_end : '';
            $sensor_model_number = $modelNumberValue != '(NotSet)' ? $sensor_row_start . $sensor_title_start . 'Model Number' . $sensor_data_end . $sensor_colon_start . ':' . $sensor_data_end . $sensor_value_start . $modelNumberValue . $sensor_data_end . $sensor_row_end : '';
            $sensor_serial_number = $serialNumberValue != '(NotSet)' ? $sensor_row_start . $sensor_title_start . 'Serial Number' . $sensor_data_end . $sensor_colon_start . ':' . $sensor_data_end . $sensor_value_start . $serialNumberValue . $sensor_data_end . $sensor_row_end : '';
            $sensor_equipment_id = $equipmentIDValue != '(NotSet)' ? $sensor_row_start . $sensor_title_start . 'Equipment ID' . $sensor_data_end . $sensor_colon_start . ':' . $sensor_data_end . $sensor_value_start . $equipmentIDValue . $sensor_data_end . $sensor_row_end : '';
            $probe_length_id = $probeLengthValue != '(NotSet)' ? $sensor_row_start . $sensor_title_start . 'Length of Probe' . $sensor_data_end . $sensor_colon_start . ':' . $sensor_data_end . $sensor_value_start . $probeLengthValue . $sensor_data_end . $sensor_row_end : '';
            $sensor_channel = $channelValue != '(NotSet)' ? $sensor_row_start . $sensor_title_start . 'Channel' . $sensor_data_end . $sensor_colon_start . ':' . $sensor_data_end . $sensor_value_start . $channelValue . $sensor_data_end . $sensor_row_end : '';
                    



            $sensor_full = $sensor_start . $sensor_type . $sensor_manufacturer . $sensor_model_number . $sensor_serial_number . $sensor_equipment_id . $probe_length_id . $sensor_channel . $sensor_end;
            
            return $sensor_full;
        } 
        $currentPageNumber = 2;
        

        $pageStart = '<div class="page" style="border:0px green dotted; max-height:90%; font-size:9.5pt"><div class="measureThis" style="position: relative;top:120; border:0px blue dotted ">';
        $pageStartContinued = '<span style="font-size:11pt;border 1px blue dotted"><b>Calibration Results</b></span><div style="position: relative; border:0px green dotted;">';
        $result_start = '<table width="100%" style="text-align:center; border:0px black solid; margin-top:0.5em; margin-bottom:1em">
        <thead><tr><td colspan="2">Standard Reading</td><td colspan="2">UUC Reading</td><td colspan="2">Correction</td><td colspan="2">Uncertainty</td></tr></thead><tbody>';
        $page_more_than_one = 682;
        $page_first_multiple_page = 572;
        $page_last_multiple_page = 562;
        $page_OTHER = 572;
        $page_is_one = 572;
        $pageEnd = '</tbody>
                            </table>
                        </div>
                <div style="position: absolute; bottom:';
        $pageEnd_2 = '; right:13%; font-size:9.5pt;">
                    <p style="position: absolute; top:0;font-size:9.5pt;">';
                    
        $pageEndContinued = '</p>
                </div>
            </div></div>';
        $trS = '<tr>';
        $trE = '</tr>';
        $tdSR = '<td style="text-align:right">';
        $tdSL = '<td style="text-align:left">';
        $tdE = '</td>';
            
        
        $limit = 20;
        $counter = 0;    
        
        $equipment_class = isset($specificationsData->classification) ? $specificationsData->classification : '1';
        
        $complete_page = '';
        
        for ($i=0; $i < $tableCount; $i++) { 
           
            $tableName = 'table'.($i+1);
            $table_capital_t = 'Table'.($i+1);
            $countofRows = count(array_keys((array)$calculatedData[$i]->$tableName));
            $sensorKey = 'sensorType'.$table_capital_t; 
            $with_sensor = false;
            $first_page_limit_hit = false;

            if($i == 0){
                $complete_page .= $pageStart . $remarksStart . remarksBody($specificationsData, $placeholders, $dataFromDB) . $remarksEnd . $pageStartContinued;
                $counter += 1;
            }else if($counter == 0){
                $complete_page .= $pageStart . $pageStartContinued;
            }
            // if(($counter + $countofRows) > $limit){
            //     $complete_page .= $pageStart . $pageStartContinued;
            // }

            if($dataInputs->$sensorKey != ''){
                $with_sensor = true;
                $complete_page .= sensors_statement($dataInputs, $table_capital_t);
                $counter += 9;
            }   

            if($tableName === 'table1' && $with_sensor && $countofRows > 10){
                $first_page_limit_hit = true;
            }else if($tableName === 'table1'){
                if(isset($calculatedData[$i]->table2)){
                    $tableName_table2 = 'table'.'2';
                    $table_capital_t_table2 = 'Table'.'2';
                    $countofRows_table2 = count(array_keys((array)$calculatedData[$i]->table2));
                    $sensorKey_table2 = 'sensorType'.$table_capital_t; 
                    $with_sensor_table2 = false;
                    if(isset($dataInputs->$sensorKey_table2) && $dataInputs->$sensorKey_table2 != ''){
                        $with_sensor_table2 = true;
                    }  
                    if($with_sensor_table2 && $countofRows > 5){
                        $first_page_limit_hit = true;
                    }
                }else{
                    $first_page_limit_hit = true;
                }
            }

            $result_complete = $result_start;


            for ($x=1; $x < $countofRows; $x++) { 
                $rowName = 'row'.$x;
                $lastRowName = 'row'.$countofRows;
                $lastTestPoint = $calculatedData[$i]->$tableName->$lastRowName->testPoint;
                $resolution_name = 'resolutionTbody'.$table_capital_t.'Row'.$x;
                //isCmc(floatval($lastTestPoint));
                $cmcVal;
                $corVal;
                $uucAve;
                $expVal;
                if($x==1){
                    
                    // $corVal = $calculatedData[$i]->$tableName->$lastRowName->correctedValue;
                    $corVal = isset($calculatedData[$i]->$tableName->$lastRowName->correctedValue_input) ? $calculatedData[$i]->$tableName->$lastRowName->correctedValue_input : $calculatedData[$i]->$tableName->$lastRowName->correctedValue;
                    $uucAve = $calculatedData[$i]->$tableName->$lastRowName->uucTrialAverage;
                    // $cmcVal = checkCMC($equipment_class, $uucAve);
                    $cmcVal = checkCMC($equipment_class, $lastTestPoint, $isPAB, $cmc);
                    $uncert = floatval($calculatedData[$i]->$tableName->$lastRowName->expandedUncertainty);
                    $expVal = $uncert > $cmcVal ? $uncert : $cmcVal;
                    //$expVal = $cmcVal;
                    $stdResolution_decimalCount = seeDecimal($calculatedData[$i]->$tableName->$lastRowName->resolutiontemp);
                }else{
                    
                    $testPoint = $calculatedData[$i]->$tableName->$rowName->testPoint;
                    // $corVal = $calculatedData[$i]->$tableName->$rowName->correctedValue;
                    $corVal = isset($calculatedData[$i]->$tableName->$rowName->correctedValue_input) ? $calculatedData[$i]->$tableName->$rowName->correctedValue_input : $calculatedData[$i]->$tableName->$rowName->correctedValue;
                    $uucAve = $calculatedData[$i]->$tableName->$rowName->uucTrialAverage;
                    // $cmcVal = checkCMC($equipment_class, $uucAve);
                    $cmcVal = checkCMC($equipment_class, $testPoint, $isPAB,$cmc);
                    $uncert = floatval($calculatedData[$i]->$tableName->$rowName->expandedUncertainty);
                    $expVal = $uncert > $cmcVal ? $uncert : $cmcVal;
                    //$expVal = $cmcVal;
                    $stdResolution_decimalCount = seeDecimal($calculatedData[$i]->$tableName->$rowName->resolutiontemp);
                }
                
                $current_row_resolution = intval($dataInputs->$resolution_name) != -1 ? seeDecimal(floatval($dataInputs->$resolution_name)) : $standardReadingDecimalPointCount;
                
                $uncertaintyDecimalCount = seeDecimal(sigFig($expVal, 2));
                $corr = roundTo(floatval($corVal), $uncertaintyDecimalCount) - roundTo(floatval($uucAve), $uncertaintyDecimalCount);

                $standardReading = matchDecimal(roundTo($corVal, $uncertaintyDecimalCount), $stdResolution_decimalCount);
                // $standardReading = $corVal;
                $uucReading = matchDecimal(roundTo($uucAve, $standardReadingDecimalPointCount), $current_row_resolution);
                $correction = matchDecimal(roundTo($corr, $uncertaintyDecimalCount), $uncertaintyDecimalCount);
                $uncertainty = strval(sigFig($expVal, 2));
                $unit = $specificationsData->rangeMaxUnit;

                $results_per_row = $trS . $tdSR . $standardReading . $tdE . $tdSL . $unit . $tdE . $tdSR . $uucReading . $tdE . $tdSL . $unit . $tdE . $tdSR . $correction . $tdE . $tdSL . $unit . $tdE . $tdSR . $uncertainty . $tdE . $tdSL . $unit . $tdE . $trE;
                
                $result_complete .= $results_per_row;
                $counter += 1;
                
            }
            $complete_page .= $result_complete;
           

            // if($first_page_limit_hit){
            //     if($tableCount - 1 == 0){
            //         $complete_page .= $pageEnd . $page_is_one . $pageEnd_2. "1Page " . $currentPageNumber . ' of ' . $numberOfPages .  $pageEndContinued;
            //     }else{
            //         $complete_page .= $pageEnd . $page_first_multiple_page . $pageEnd_2. "2Page " . $currentPageNumber . ' of ' . $numberOfPages .  $pageEndContinued;
            //     }
            //     $counter = 0;
            //     $currentPageNumber += 1;
            // }else if($i == ($tableCount - 1)){
            //     if($tableCount - 1 == 0){
            //         $complete_page .= $pageEnd . $page_is_one . $pageEnd_2. "3Page " . $currentPageNumber . ' of ' . $numberOfPages .  $pageEndContinued;
            //     }else{
            //         $complete_page .= $pageEnd . $page_last_multiple_page . $pageEnd_2. "4Page " . $currentPageNumber . ' of ' . $numberOfPages .  $pageEndContinued;
            //     }
                
            //     $counter = 0;
            //     $currentPageNumber += 1;
            // }else if($counter >= $limit){
            //     // $complete_page .= $pageEnd . $pageEnd_2 . "Page " . $currentPageNumber . ' of ' . $numberOfPages .  $pageEndContinued;
            //     if($tableCount - 1 == 0){
            //         $complete_page .= $pageEnd . $page_is_one . $pageEnd_2. "5Page " . $currentPageNumber . ' of ' . $numberOfPages .  $pageEndContinued;
            //     }else{
            //         $complete_page .= $pageEnd . $page_last_multiple_page . $pageEnd_2. "6Page " . $currentPageNumber . ' of ' . $numberOfPages .  $pageEndContinued;
            //     }
            //     $counter = 0;
            //     $currentPageNumber += 1;
            // }
            if($first_page_limit_hit){
                $complete_page .= $pageEnd . '77' . $pageEnd_2. "Page " . $currentPageNumber . ' of ' . $numberOfPages .  $pageEndContinued;
                $counter = 0;
                $currentPageNumber += 1;
            }else if($i == ($tableCount - 1)){
                $complete_page .= $pageEnd . '77' . $pageEnd_2. "Page " . $currentPageNumber . ' of ' . $numberOfPages .  $pageEndContinued;
                $counter = 0;
                $currentPageNumber += 1;
            }else if($counter >= $limit){
                $complete_page .= $pageEnd . '77' . $pageEnd_2. "Page " . $currentPageNumber . ' of ' . $numberOfPages .  $pageEndContinued;
                $counter = 0;
                $currentPageNumber += 1;
            }

        }

      
        
        return $complete_page;
        
       
          
    }

    function total_page_number($calculatedData, $dataInputs, $specificationsData, $placeholders, $dataFromDB, $standardReadingDecimalPointCount, &$numberOfPages){
        $tableCount = count($calculatedData);
        $currentPageNumber = 1;
        $limit = 20;
        $counter = 0;    
        for ($i=0; $i < $tableCount; $i++) { 
            $tableName = 'table'.($i+1);
            $table_capital_t = 'Table'.($i+1);
            $countofRows = count(array_keys((array)$calculatedData[$i]->$tableName));
            $sensorKey = 'sensorType'.$table_capital_t; 
            $with_sensor = false;
            $first_page_limit_hit = false;

            if($i == 0){
                $counter += 1;
            }else if($counter == 0){
            }

            if($dataInputs->$sensorKey != ''){
                $with_sensor = true;
                $counter += 9;
            }   

            if($tableName === 'table1' && $with_sensor && $countofRows > 10){
                $first_page_limit_hit = true;
            }else if($tableName === 'table1'){
                if(isset($calculatedData[$i]->table2)){
                    $tableName_table2 = 'table'.'2';
                    $table_capital_t_table2 = 'Table'.'2';
                    $countofRows_table2 = count(array_keys((array)$calculatedData[$i]->table2));
                    $sensorKey_table2 = 'sensorType'.$table_capital_t; 
                    $with_sensor_table2 = false;
                    if(isset($dataInputs->$sensorKey_table2) && $dataInputs->$sensorKey_table2 != ''){
                        $with_sensor_table2 = true;
                    }  
                    if($with_sensor_table2 && $countofRows > 5){
                        $first_page_limit_hit = true;
                    }
                }else{
                    $first_page_limit_hit = true;
                }
            }

            for ($x=1; $x < $countofRows; $x++) { 
                $counter += 1;
            }
           

            if($first_page_limit_hit){
                $counter = 0;
                $currentPageNumber += 1;
            }else if($i == ($tableCount - 1)){
                $counter = 0;
                $currentPageNumber += 1;
            }else if($counter >= $limit){
                $counter = 0;
                $currentPageNumber += 1;
            }

        }
        $numberOfPages = $currentPageNumber;
        return $currentPageNumber;

          
    }

    $custonerName = $dataFromDB['customer'] ?? $customerData->customer;
    $addressName = $dataFromDB['address'] ?? $customerData->address;

    $selectedStandard = $dataFromDB['standard'];
    $selectedStandardPieces = explode("(SPLIT)", $selectedStandard);
    $selectedStandardDetails = $standardDetails; 	
    // print_r($selectedStandardDetails);
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
            max-width: 55%;
            padding: 0;
            margin: 0;
            height:15px
        }

        .item-left {
            margin-bottom: 10px;
        }

        .item-left .between,
        .item-left .label,
        .item-left .label i,
        .item-left .text {
            display: inline-block;
            vertical-align: top;
        }

        .item-left .label, 
        .item-left .label i {
            width: 25%;
            display: inline-block;
            white-space: nowrap;
            margin-right:4%;
        }

        .item-left .between {
            width: 5%;
            padding: 0;
            margin: 0;
        }

        .item-left .text {
            max-width: 70%;
            padding: 0;
            margin: 0;
            height:15px
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
</head>

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
        <div class='' style="position:absolute;top:90; left:27%">
            <p style='font-weight:bold;font-size:19pt'>CALIBRATION CERTIFICATE</p>
        </div>
        <div style="position:absolute;top:120;line-height: 1;">
            <table style='border:0px solid black'>
                <tr style='border:0px solid black'>
                    <td style="font-size:9.5pt; border:0px solid black">Calibration Certificate No.</td>
                    <td style="font-size:9.5pt; width: 10px; border:0px solid black">:</td>
                    <td colspan="4" style="font-size:9.5pt; padding-left: 5px; border:0px solid black"><b><?php echo $dataFromDB['certificateNumber']?></b></td>
                </tr>
                <tr style='border:0px solid black'>
                    <td style="font-size:9.5pt">Customer</td>
                    <td style="font-size:9.5pt; ">:</td>
                    <td colspan="4" style="font-size:9.5pt; padding-left: 5px; border:0px solid black"><b><?php echo $customerData->customer?></b></td>
                </tr>
                <tr style='border:0px solid black'>
                    <td style="font-size:9.5pt">Address</td>
                    <td style="font-size:9.5pt; ">:</td>
                    <td colspan="4" style="font-size:9.5pt; padding-left: 5px; border:0px solid black"><b><?php echo $customerData->address ?></b></td>
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
           <div style="position:absolute;top:120;height:auto;border:0px solid red">
               <div class='' style="position:relative;height:auto;">
                   <ul class='ul'>
                        <li class='li'>
                            <div class="item-left">
                                <span class="label">Equipment</span><span class="between">: </span><p class="text"><?php echo $specificationsData->description?></p>
                            </div>
                            <?php
                                for ($i=0; $i < count($leftSideArray); $i++) { 
                                    echo '<div class="item-left">'.$leftSideArray[$i].'</div>';
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
                   <p style='margin-top:-5;'>
                       <?php 
                           if($dataFromDB['settingCalibrationProcedureAndTraceability'] == ""){
                               echo $placeholders[0]['module5CalibrationProcedureAndTraceability'];
                           }else{
                               echo $dataFromDB['settingCalibrationProcedureAndTraceability'];
                           }
                       ?>
                   </p>
               </div>
               <div class="" style="position: relative; font-size:9.5pt;">
               <table style="border: 0px solid black; min-width: 95%; text-align: center;line-height: 1;" id="standardTable">
                       <thead style="border: 0px solid blue; margin-bottom:10px">
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
                   <p style='max-width:95%;font-size:9.5pt;margin-top:-5;'>
                  
                           <?php 
                           if($dataFromDB['settingCalibrationResults'] == ""){
                               echo $placeholders[0]['module5CalibrationResults'];
                           }else{
                               echo $dataFromDB['settingCalibrationResults'];
                           }
                       ?>
               </p>
               </div>
               <div class="" style="position: relative; font-size:9.5pt;height:auto;border:0px green dotted;margin-top:-1%;">
                   <p style='font-weight:bold;text-decoration: underline;font-size:9.5pt;top:2;'>Uncertainty of Measurement</p>
                   <p style='max-width:95%;font-size:9.5pt;margin-top:-5;'>
                   <?php 
                           if($dataFromDB['settingUncertaintyOfMeasurement'] == ""){
                               echo $placeholders[0]['module5UncertaintyOfMeasurement'];
                           }else{
                               echo $dataFromDB['settingUncertaintyOfMeasurement'];
                           }
                       ?></p>
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
               <p style='position: absolute; top:0;font-size:9.5pt;'>Page 1 of <?= total_page_number($calculatedData, $dataInputs, $specificationsData, $placeholders, $dataFromDB, $standardReadingDecimalPointCount, $numberOfPages)?></p>
           </div>
        </div>            

        <?= dynamic_page_two($calculatedData, $dataInputs, $specificationsData, $placeholders, $dataFromDB, $standardReadingDecimalPointCount, $numberOfPages, $cmc)?>         

    </main>
   
    
</body>





</html>   