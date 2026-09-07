<?php
    ini_set('memory_limit', '1024M'); // or you could use 1G

    use App\Models\About;
    use App\Models\PlaceholderModel;
    $placeholdersModel = new PlaceholderModel();
    $placeholder[] = $placeholdersModel->findAll(); 	


    $path = 'image/dost smaller.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    $pathPAB = 'image/pab logo.png';
    $typePAB = pathinfo($pathPAB, PATHINFO_EXTENSION);
    $dataPAB = file_get_contents($pathPAB);
    $base64PAB = 'data:image/' . $typePAB . ';base64,' . base64_encode($dataPAB);

    $pathIllusa = 'image/weighingScaleSquareNumber.png';
    $typeIllusa = pathinfo($pathIllusa, PATHINFO_EXTENSION);
    $dataIllusa = file_get_contents($pathIllusa);
    $base64Illusa = 'data:image/' . $typeIllusa . ';base64,' . base64_encode($dataIllusa);

    $pathIllusB = 'image/weighingScaleCircleNumber.png';
    $typeIllusB = pathinfo($pathIllusB, PATHINFO_EXTENSION);
    $dataIllusB = file_get_contents($pathIllusB);
    $base64IllusB = 'data:image/' . $typeIllusB . ';base64,' . base64_encode($dataIllusB);

    $pathIllusDraft = 'image/draft.png';
    $typeIllusDraft = pathinfo($pathIllusDraft, PATHINFO_EXTENSION);
    $dataIllusDraft = file_get_contents($pathIllusDraft);
    $base64IllusDraft = 'data:image/' . $typeIllusDraft . ';base64,' . base64_encode($dataIllusDraft);

   
    

    $specific = json_decode($weighingScaleData['specificationData'],true);
    $environmentData = json_decode($weighingScaleData['environmentData'],true);
    $spanCalibration = json_decode($weighingScaleData['spanCalibrationData'],true);
    $sensitivity = json_decode($weighingScaleData['sensitivityTestData'],true);
    $eccentricity = json_decode($weighingScaleData['eccentricityTestData'],true);
    $repeatability = json_decode($weighingScaleData['repeatabilityTestData'],true);
    $calculated = json_decode($weighingScaleData['calculatedValuesData'],true);
    $linearity = json_decode($weighingScaleData['linearityTestData'],true);

    $dataInputs = json_decode($weighingScaleData['dataInputs'],true);


    $base64Illus = '';
    $desc = '';
    if ($dataInputs['illusA'] == 'checked'){
        $base64Illus = $base64Illusa;
        $desc = '1 - Center <br>2 - Front Left <br>3 - Back Left <br>4 - Back Right <br>5 - Front Right';
    }
    if ($dataInputs['illusB'] == 'checked'){
        $base64Illus = $base64IllusB;
        $desc = '1 - Center <br>2 - Front <br>3 - Back <br>4 - Left <br>5 - Right';
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

    function uncertaintyMeasurement($specific,$calculated,$cmc){
        $maxCapacity        = $specific['specifications']['maxCapacity'];
        $equipment_class    = $specific['specifications']['equipment_class'];
        $readabilityUnit    = $specific['specifications']['readabilityUnit'];
        $expandedUncertain  = $calculated['calculated']['expandedUncertaintyCalculated'];

        $cmc_checked_value = check_cmc($maxCapacity, $equipment_class, $readabilityUnit, $expandedUncertain, $cmc);

        if ($specific['specifications']['readabilityUnit'] == 'kg'){
            $calculatedValue = floatval($cmc_checked_value)/1000;
            $value = roundTo($calculatedValue,2). ' kg';
            return 'The expanded uncertainty of measurement is '.$value.' estimated at a confidence level of 95% with a coverage factor of k = 2.';

        }
        if ($specific['specifications']['readabilityUnit'] == 'g'){
            $calculatedValue = floatval($cmc_checked_value);
            $value = roundTo($calculatedValue,1). ' g';
            return 'The expanded uncertainty of measurement is '.$value.' estimated at a confidence level of 95% with a coverage factor of k = 2.';
        }
        if ($specific['specifications']['readabilityUnit'] == 'mg'){
            $calculatedValue = floatval($cmc_checked_value);
            $value = roundTo($calculatedValue,0). ' mg';
            return 'The expanded uncertainty of measurement is '.$value.' estimated at a confidence level of 95% with a coverage factor of k = 2.';
        }

        return 'aaa';

    } 

    function repeatabilityStdDev($repeatability){
        $result;
        if($repeatability['repeatabilityTable']['repeatabilityIndicationUnit'] == 'kg'){
            $calculatedValue = floatval($repeatability['repeatabilityTable']['datas']['repeatabilitySD'])/1000;
            $value = sigFig($calculatedValue,2);
            $result = $value;
        }
        if($repeatability['repeatabilityTable']['repeatabilityIndicationUnit'] == 'g'){
            $calculatedValue = floatval($repeatability['repeatabilityTable']['datas']['repeatabilitySD']);
            $value = sigFig($calculatedValue,2);
            $result = $value;
        }
        if($repeatability['repeatabilityTable']['repeatabilityIndicationUnit'] == 'mg'){
            $calculatedValue = floatval($repeatability['repeatabilityTable']['datas']['repeatabilitySD'])*1000;
            $value = sigFig($calculatedValue,2);
            $result = $value;
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




    $linearityNumberOfRows = count($linearity['linearityTestTable']['datas'])/7;//7 because there are 7 keys per row


    function check_cmc($maxCapacity, $class, $unit, $expandedUncertain, $cmc_array){
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
                if($maxCapacityG >= $cmc_conditions[$i]->$rangeMinID && $maxCapacityG < $cmc_conditions[$i]->$rangeMaxID){
                    $cmc = $cmc_conditions[$i]->$cmcValueID;
                }
            }
        }

        $uncertainty = $float_expandedUncertain > $cmc ? $float_expandedUncertain : $cmc;
        return $uncertainty;
    }
    
    function classSearch($input, $searchingFor){
        if (strpos($input, $searchingFor) !== false) {
            return true;
        } else {
            return false;
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

?>


<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@3.4.1/dist/chart.min.js "></script>

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

            table.GeneratedTable {
        background-color: transparent;
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
        }

        table.GeneratedTable thead {
        background-color: transparent;
        }


        @font-face {
            font-family: "source_sans_proregular";
            src: local("Calibri"), url("fonts/sourcesans/sourcesanspro-calibri.ttf") format("truetype");
            font-weight: normal;
            font-style: normal;
        }
        body{
            font-family: "source_sans_proregular", Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;
        }
        @media print {
        .myimage {
            image-resolution: 3200dpi;
        }
        }
        table{
            border:solid 1px;
        }
        .borders{
            border:solid 1px;
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
        use App\Models\ElectModel_3;

        $rml2 = new ElectModel_2();
        $arrayOfWeights = $weighingScaleData['standard'];
        $pieces = explode("(SPLIT)", $arrayOfWeights);
        $arr2[] = $rml2->whereIn('id', $pieces)->findAll();
        $rml3 = new ElectModel_3();
        $arr3[] = $rml3->whereIn('standardID', $pieces)->first();

        function TrimTrailingZeroes($nbr) {
            $string = strval($nbr);
            return strpos($string,'.')!==false ? rtrim(rtrim($string,'0'),'.') : $string;
        }

        function addZeros($value,$numberOfZeros){
            return number_format($value,$numberOfZeros,'.','');
        }

        function sigFig($value, $digits){
            if ($value == 0) {
                $decimalPlaces = $digits - 1;
            } elseif ($value < 0) {
                $decimalPlaces = $digits - floor(log10($value * -1)) - 1;
            } else {
                $decimalPlaces = $digits - floor(log10($value)) - 1;
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
                if($answer == 0){
                    $answerIf0 = addZeros($answer,$digits);
                    return $answerIf0;
                }else{
                    return addZeros($answer,$digits);
                }
            }
        }

        function seeDecimal($value){
            if ((int)$value == $value){
                return 0;
            }
            else if (! is_numeric($value)){
                return false;
            }

            return strlen($value) - strrpos($value, '.') - 1;
        }

        $readabilityDecimalPoints = seeDecimal($specific['specifications']['readability']);

        function checkIfPAB($value,$unit, $placeOfCalib){
            //$value = max capacity
            //$unit = max capacity unit
            if($placeOfCalib == 'Mass Laboratory'){
                if($unit == 'kg'){
                    if(($value > 60)&&($value < 300)){
                        return "8.2@g";
                    }
                    return false;
                }else{
                    return false;
                }
            }else{
                if($unit == 'mg'){
                    return '0.011@mg';
                }
                if($unit == 'g'){
                    if(($value > 0)&&($value < 500)){
                        return "0.011@mg";
                    }
                    if(($value > 600)&&($value <= 6000)){
                        return "0.82@mg";
                    }
                    if(($value > 6000)&&($value <= 60000)){
                        return "82@mg";
                    }
                    if(($value > 60000)&&($value <= 300000)){
                        return "8.2@g";
                    }
                    return false;
                }
                if($unit == 'kg'){
                    if(($value > 0.6)&&($value <= 6)){
                        return "0.82@mg";
                    }
                    if(($value > 6)&&($value <= 60)){
                        return "82@mg";
                    }
                    if(($value > 60)&&($value <= 300)){
                        return "8.2@g";
                    }
                    return false;
                }
            }

        }
        $isPAB = true;
        //    $isPAB = checkIfPAB($weighingScaleData['maxCapacity'],$weighingScaleData['maxCapacityMeasurement'], $weighingScaleData['placeOfCalibration']);

        function convertValueWithSignificantFigure($value,$unit,$figure){
            $floatValue = floatval($value);
            $calculated = 0;
            if($value == 0.50){
                return number_format($floatValue,$figure);  
            }
            if($unit == 'kg'){
                $calculated = $floatValue/1000;
            }
            if($unit == 'g'){
                $calculated = $floatValue;
            }
            if($unit == 'mg'){
                $calculated = $floatValue*1000;
            }
            return roundTo($calculated,$figure);
        }
    ?>

    <body style="">
        <!-- HEADER -->
            <div>
                <div style="position:relative; font-family: DejaVu Sans;">
                    <img src="<?php echo $base64; ?>" alt="DOST LOGO" height='80px' style="position: absolute; top:0 ">
                    <div style="position: absolute; line-height: 0.4; left:90px">
                        <p style="position: relative; font-size: 13px;">Republic of the Philippines</p>
                        <p style="position: relative; font-size: 13px; color:blue">DEPARTMENT OF SCIENCE AND TECHNOLOGY</p>
                        <p style="position: relative; font-size: 13px;">CALABARZON</p>
                        <p style="position: relative; font-size: 15px; font-weight:bold">Regional Metrology Laboratory</p>
                    </div>
                    <?php
                        if($weighingScaleData['PabLogo']=='true'){
                                if($isPAB){
                                echo " <img src='". $base64PAB."' alt='PAB LOGO' height='80px' style='position: absolute; top:0; left:425'>";
                            }
                        }
                    ?>
                </div>
                <div style="position: absolute; top:60;">
                    <hr>
                </div>
                <div style="position: absolute; top:62;">
                    <hr>
                </div>
                <div style="position: absolute; top:70; left:23%">
                    <p style='font-weight:bold;font-size:20'>CALIBRATION CERTIFICATE</p>
                </div>
            </div>
        <!-- HEADER -->
        <!-- INFORMATIONS -->
            <div style="position: absolute; top:135; left:5%; font-size:10pt">
                <div>
                    <table style="border: 0px; overflow-x:auto;">
                        <tbody>
                            <tr valign='top'>
                                <td>Calibration Certificate No.</td>
                                <td>:</td>
                                <td style="font-size: 10;"><strong><?php echo $weighingScaleData['certificateNumber']?></strong></td>
                            </tr>
                            <tr valign='top' style="font-size: 10;">
                                <td>Customer</td>
                                <td>:</td>
                                <td><b><?php echo $weighingScaleData['customer']?></b></td>
                            </tr>
                            <tr valign='top' style="font-size: 10;">
                                <td>Address</td>
                                <td>:</td>
                                <td><b><?php echo $weighingScaleData['address']?></b></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <?php
                    // if($imageDraft == 'true'){
                    //     echo "
                    //     <div style='z-index: 999; margin-top: 170px; margin-left: 40px;'>
                    //     <img src='". $base64."'  style='margin-left: -40px; height: 700px; opacity: 0.1; position: absolute;'>
                    //     <img src='". $base64IllusDraft."'  style='background-size: 100% 100%; opacity: 0.5; position: absolute;'>
                    //     </div>";

                    //     }
                        if($weighingScaleData['completion'] != 'For printing'||$imageDraft == 'true'){
                            echo " 
                            <div style='z-index: 999; position:absolute; top: 80px; margin-left: 25px;'>
                            <img src='". $base64."'  style='margin-left: -40px; height: 700px; opacity: 0.1; position: absolute;'>
                            <img src='". $base64IllusDraft."'  style='background-size: 100% 100%; opacity: 0.5; position: absolute;'>
                            </div>";
                        }
                ?>
            </div>
        <!-- INFORMATIONS -->
        <!-- Specific Datas -->
            <div style=" position: absolute; top:190; left:5%; font-size:10pt;">
                <div  style=" position: absolute; top:0; font-size:10pt;">
                    <table class='' style="border: 0px; width: 360px">
                        <tbody>
                            <tr valign='top' style="border: 0px;">
                                <td width='150px'>Equipment Description</td>
                                <td width='2px'>:</td>
                                <td><?php echo $specific['specifications']['equipmentDescription']?></td>
                            </tr>
                            <tr valign='top'>
                                <td>Manufacturer</td>
                                <td>:</td>
                                <td><?php echo $specific['specifications']['manufacturer']?></td>
                            </tr>
                            <tr valign='top'>
                                <td>Model No.</td>
                                <td>:</td>
                                <td><?php echo $specific['specifications']['modelNumber']?></td>
                            </tr>
                            <tr valign='top'>
                                <td>Serial No.</td>
                                <td>:</td>
                                <td><?php echo $specific['specifications']['serialNumber']?></td>
                            </tr>
                            <tr valign='top'>
                                <td>Equipment ID</td>
                                <td>:</td>
                                <td><?php echo $specific['specifications']['equipmentNumber']?></td>
                            </tr>
                            <tr valign='top'>
                                <td>Maximum Capacity</td>
                                <td>:</td>
                                <td><?php echo $specific['specifications']['maxCapacity']?> <?php echo $specific['specifications']['maxCapacityMeasurement']?></td>
                            </tr>
                            <tr valign='top'>
                                <td>Readability</td>
                                <td>:</td>
                                <td><?php echo TrimTrailingZeroes($specific['specifications']['readability'])?> <?php echo $specific['specifications']['readabilityUnit']?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div  style="position: absolute; top:0; left:55%; font-size:10pt; ">
                    <table style="border: 0px;">
                        <?php 
                            $date = $weighingScaleData['dateReceived']; 
                            $mysql_date = date('Y-m-d G:i:s', strtotime($date));
                            $date2 = $weighingScaleData['dateCalibrated']; 
                            $mysql_date2 = date('Y-m-d G:i:s', strtotime($date2));
                            $date3 = $weighingScaleData['recommendedDueDate']; 
                            $mysql_date3 = date('Y-m-d G:i:s', strtotime($date3));
                        ?>
                        <tbody>
                            <tr valign='top'>
                                <td>Date Received</td>
                                <td>:</td>
                                <td><?php echo date('d F Y', strtotime($mysql_date));?></td>
                            </tr>
                            <tr valign='top'>
                                <td>Date Calibrated</td>
                                <td>:</td>
                                <td><?php echo date('d F Y', strtotime($mysql_date2));?></td>
                            </tr>
                            <tr valign='top'>
                                <td>Recommended Due Date</td>
                                <td>:</td>
                                <td><?php echo date('d F Y', strtotime($mysql_date3));?></td>
                            </tr>
                            <tr valign='top'>
                                <td>Place of Calibration</td>
                                <td>:</td>
                                <td><?php echo $weighingScaleData['placeOfCalibration']?></td>
                            </tr>
                            <tr valign='top'>
                                <td>Ambient Temperature</td>
                                <td>:</td>
                                <td><?php echo ambient($environmentData['environment']['tempStart'], $environmentData['environment']['tempEnd']);?> &deg;C</td>
                            </tr>
                            <tr valign='top'>
                                <td>Relative Humidity</td>
                                <td>:</td>
                                <td><?php echo ambient($environmentData['environment']['rhStart'], $environmentData['environment']['rhEnd']);?> % RH</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        <!-- Specific Datas -->
        <!-- Procedures -->
            <div style=" position: absolute; top:320; left:5%; font-size:10pt;">
                <div  style=" position: absolute; top:0; font-size:10pt;">
                    <table style="border: 0px;">
                        <tbody>
                            <tr valign='top'>
                                <td style="font-weight:bold">Calibration Procedure and Traceability</td>
                            </tr>
                            <tr valign='top'>
                                <td>
                                <?php
                                    if($weighingScaleData['settingCalibrationProcedureAndTraceability'] != null){
                                        echo $weighingScaleData['settingCalibrationProcedureAndTraceability'];
                                    }else{
                                        echo  $placeholder[0][0]['module4CalibrationProcedureAndTraceability'];
                                    }
                                ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div style="position: relative; top:375; font-size:10pt;">
                <table padding="0" style="align-text: center; border-collapse: collapse; border: none; width: 830px; margin-left: 25%;">
                    <tr>
                        <th height="10" ><u>Standard Used</u></th>
                        <th height="10" ><u>Calibration Certificate No.</u></th>
                        <th height="10" ><u>Issuing Laboratory</u></th>
                    </tr>
                    
                    <?php
                        $search = array("₀", "₁", "₂", "₃", "₄", "₅", "₆", "₇", "₈", "₉","0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
                        $replace = array("<sub>0</sub>", "<sub>1</sub>", "<sub style='font-size:10ptpx;'>2</sub>", "<sub>3</sub>","<sub>4</sub>", "<sub>5</sub>","<sub>6</sub>", "<sub>7</sub>","<sub>8</sub>", "<sub>9</sub>","<sub>0</sub>", "<sub>1</sub>", "<sub style='font-size:10ptpx;'>2</sub>", "<sub>3</sub>","<sub>4</sub>", "<sub>5</sub>","<sub>6</sub>", "<sub>7</sub>","<sub>8</sub>", "<sub>9</sub>",);
                        $classString = $arr2[0]; 
                        $m2 = [];
                        for($i = 0; $i < count($classString);$i++){ 
                    ?>
                    <tr>
                        <td height="5" width="35%" style="text-align: center; padding: 0px; vertical-align: center;">
                            <?= str_replace($search,$replace,$classString[$i]['description']); ?> 
                        </td>
                        <td height="5" width="30%" style="text-align: center; padding: 0px; vertical-align: center;">
                            <?= $classString[$i]['certificateNumber']; ?>
                        </td>
                        <td height="5" width="35%" style="text-align: center; padding: 0px; vertical-align: center;">
                            <?= $classString[$i]['calibrationProvider']; ?>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                    
                    
                </table>
                 <div style="position: relative; left:5%; font-size:10pt; height:1%">
                    <p style='position: absolute; top:2; font-weight:bold;text-decoration: underline;'>Calibration Results</p>
                    <p style='position: absolute; top:7; line-height: 150%; max-width:95%'>
                        <?php
                            if($weighingScaleData['settingCalibrationResults'] != null){
                                echo $weighingScaleData['settingCalibrationResults'];
                            }else{
                                echo  $placeholder[0][0]['module4CalibrationResults'];
                            }
                        ?>
                    </p>
                </div>   
                <div style="position: relative; left:5%; font-size:10pt;">
                    <p style='position: absolute; top:10;font-weight:bold;text-decoration: underline;'>Uncertainty of Measurement</p>
                    <p style='position: absolute; top:15; max-width:95%'><?= uncertaintyMeasurement($specific, $calculated, $cmc);?></p>
                </div>
                <div style="position: relative; left:5%;font-size:10pt;border-width:0;border-style:solid;">
                    <div style="position: absolute; top:53">
                        <p style='top:0;font-weight:bold;text-decoration: underline;'>Remarks:</p>
                        <table style="border: 0px; width: 90%;">
                            <tbody>
                                <?php

                                    $remarks;
                                    if($weighingScaleData['settingRemarks'] != null){
                                        $remarks = $weighingScaleData['settingRemarks'];
                                    }else{
                                        $remarks = $placeholder[0][0]['module4Remarks'];
                                    } 
                                    $remarksSeparated = explode("(splitHere)", $remarks);
                                    for ($i=0; $i < count($remarksSeparated); $i++) { 
                                        echo "<tr valign='top'><td>".($i+1).'. '.'</td><td>'.$remarksSeparated[$i].'</td></tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                         
                </div>
                <div style="position: relative; top:200;left:5%;font-size:10pt;border-width:0;border-style:solid;">
                    <div style="position: absolute; font-size:9.5pt;">
                        <p style='position: absolute; top:0;text-decoration: underline;font-size:9.5pt;'> <?php echo $weighingScaleData['calibrationOfficer'];?></p>
                        <p style='position: absolute; top:15;font-size:9.5pt;'>Calibration Officer</p>
                    </div>
                    <div style="position: absolute; left:70%; font-size:9.5pt;">
                        <p style='position: absolute; top:0;text-decoration: underline;font-size:9.5pt;'><?php echo $weighingScaleData['checkedBy'];?></p>
                        <p style='position: absolute; top:15;font-size:9.5pt;'><?php echo $weighingScaleData['verifierPosition'];?></p>
                    </div>
                </div>
            </div>
        <!-- Procedures -->

        <!-- FOOTER -->        
            <div style="position: absolute; top:700; left:8.9%; font-size:8;">
                <p style='position: absolute; top:0; font-style: italic;'>This Certificate shall not be reproduced in any form, except in full, without the written approval of the DOST CALABARZON RML</p>
            </div>
            <div style="position: absolute; top:712;  font-size:10pt;">
                <p style='position: absolute; top:0; '>Date of Issue: 
                <?php 
                if($weighingScaleData['dateOfIssue'] != ''){
                    $date=date_create($weighingScaleData['dateOfIssue']);
                    echo date_format($date,"d F Y");
                }else{
                    date_default_timezone_set('Asia/Manila');
                    $today = date("d F Y");  
                    echo $today;
                }
             ?>
             </p>
            </div>
            <div style="position: absolute; top:712; left:90%; font-size:10pt;">
                <p style='position: absolute; top:0;'>Page 1 of 3</p>
            </div>
            <div style='position: absolute; top:738;width:100%;border-width:1;border:solid;'></div>
            <div style="position: absolute; top:734.5; left:33%; font-size:8;">
                <p style='position: absolute; font-style: italic;'>A joint program with the Laguna State Polytechnic University</p>
            </div>
            <div style='position: absolute; top:755; width:100%; border-width:1; border:solid;'></div>
            <div style="position: absolute; top:753; left:25%; font-size:7;">
                <p style='position: absolute;'>RML Bldg., DOST CALABARZON Complex, Jamboree Road, Timugan, Los Baños, Laguna 4030</p>
            </div>
            <div style="position: absolute; top:765;font-size:7;">
            <?php
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

        <!-- FOOTER -->
        <!-- PAGE 2 / PAGE BREAK -->
            <div style='page-break-after: always;'></div>
        <!-- PAGE 2 / PAGE BREAK-->
        <!-- HEADER -->
            <div>
                <div style="position:relative; font-family: DejaVu Sans;">
                    <img src="<?php echo $base64; ?>" alt="DOST LOGO" height='80px' style="position: absolute; top:0 ">
                    <div style="position: absolute; line-height: 0.4; left:90px">
                        <p style="position: relative; font-size: 13px;">Republic of the Philippines</p>
                        <p style="position: relative; font-size: 13px; color:blue">DEPARTMENT OF SCIENCE AND TECHNOLOGY</p>
                        <p style="position: relative; font-size: 13px;">CALABARZON</p>
                        <p style="position: relative; font-size: 15px; font-weight:bold">Regional Metrology Laboratory</p>
                    </div>
                    <?php
                        if($weighingScaleData['PabLogo']=='true'){
                                if($isPAB){
                                echo " <img src='". $base64PAB."' alt='PAB LOGO' height='80px' style='position: absolute; top:0; left:425'>";
                            }
                        }
                    ?>
                </div>
                <div style="position: absolute; top:60;">
                    <hr>
                </div>
                <div style="position: absolute; top:62;">
                    <hr>
                </div>
                <div style="position: absolute; top:70; left:23%">
                    <p style='font-weight:bold;font-size:20'>CALIBRATION CERTIFICATE</p>
                </div>
            </div>
        <!-- HEADER -->
        <!-- INFORMATIONS -->
            <div style="position: absolute; top:135; left:5%; font-size:10pt">
                <div>
                    <table style="border: 0px; overflow-x:auto;">
                        <tbody>
                            <tr valign='top'>
                                <td>Calibration Certificate No.</td>
                                <td>:</td>
                                <td style="font-size: 10;"><strong><?php echo $weighingScaleData['certificateNumber']?></strong></td>
                            </tr>
                            <tr valign='top' style="font-size: 10;">
                                <td>Customer</td>
                                <td>:</td>
                                <td><b><?php echo $weighingScaleData['customer']?></b></td>
                            </tr>
                            <tr valign='top' style="font-size: 10;">
                                <td>Address</td>
                                <td>:</td>
                                <td><b><?php echo $weighingScaleData['address']?></b></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <?php
                    // if($imageDraft == 'true'){
                    //     echo "
                    //     <div style='z-index: 999; margin-top: 170px; margin-left: 40px;'>
                    //     <img src='". $base64."'  style='margin-left: -40px; height: 700px; opacity: 0.1; position: absolute;'>
                    //     <img src='". $base64IllusDraft."'  style='background-size: 100% 100%; opacity: 0.5; position: absolute;'>
                    //     </div>";

                    //     }
                        if($weighingScaleData['completion'] != 'For printing'||$imageDraft == 'true'){
                            echo " 
                            <div style='z-index: 999; position:absolute; top: 80px; margin-left: 25px;'>
                            <img src='". $base64."'  style='margin-left: -40px; height: 700px; opacity: 0.1; position: absolute;'>
                            <img src='". $base64IllusDraft."'  style='background-size: 100% 100%; opacity: 0.5; position: absolute;'>
                            </div>";
                        }
                ?>
            </div>
        <!-- INFORMATIONS -->
        <!-- Tables -->
            <div style=" position: absolute; top:190; left:5%; font-size:10pt;">
                <div  style=" position: absolute; top:0; font-size:10pt;">
                    <p style='position: absolute; top:5;font-weight:bold;text-decoration: underline;'>Calibration Results</p>
                </div>
                <div style=" position: absolute; top:25; font-size:10pt;">
                    <p style='position: relative;text-decoration: underline;'>Repeatability</p>
                    <table class='GeneratedTable' style='position: relative; text-align: center; border-collapse: collapse; border: none; width:40%'>
                        <tbody>
                            <tr>
                                <td>Trial</td>
                                <td>Indication, <?= $repeatability['repeatabilityTable']['repeatabilityIndicationUnit']; ?></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td><?= $repeatability['repeatabilityTable']['datas']['repeatabilityTrial1']?></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><?= $repeatability['repeatabilityTable']['datas']['repeatabilityTrial2']?></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><?= $repeatability['repeatabilityTable']['datas']['repeatabilityTrial3']?></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td><?= $repeatability['repeatabilityTable']['datas']['repeatabilityTrial4']?></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td><?= $repeatability['repeatabilityTable']['datas']['repeatabilityTrial5']?></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td><?= $repeatability['repeatabilityTable']['datas']['repeatabilityTrial6']?></td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td><?= $repeatability['repeatabilityTable']['datas']['repeatabilityTrial7']?></td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td><?= $repeatability['repeatabilityTable']['datas']['repeatabilityTrial8']?></td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td><?= $repeatability['repeatabilityTable']['datas']['repeatabilityTrial9']?></td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td><?= $repeatability['repeatabilityTable']['datas']['repeatabilityTrial10']?></td>
                            </tr>
                            <tr>
                                <td>Std. Dev. (<?= $repeatability['repeatabilityTable']['repeatabilityIndicationUnit']; ?>)</td>
                                <!-- <td><?= matchDecimal(repeatabilityStdDev($repeatability), $readabilityDecimalPoints)?></td> -->
                                <!-- <td><?= matchDecimal($repeatability['repeatabilityTable']['datas']['repeatabilitySD'], $readabilityDecimalPoints)?></td> -->
                                 <td><?= sigFig($repeatability['repeatabilityTable']['datas']['repeatabilitySD'], 2)?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style=" position: absolute; top:25; left:50%;font-size:10pt; ">
                    <p style='position: relative;text-decoration: underline;'>Sensitivity</p>
                    <table class='GeneratedTable' style='position: relative; text-align: center; border-collapse: collapse; border: none; width:90%'>
                        <tbody>
                            <tr>
                                <td style="width:3em">Trial</td>
                                <td>Empty + <span style="font-family: DejaVu Sans;">Δ</span>m, <?= $sensitivity['sensitivityTable']['sensitivityEmptyUnit']; ?></td>
                                <td>Max + <span style="font-family: DejaVu Sans;">Δ</span>m, <?= $sensitivity['sensitivityTable']['sensitivityMaxUnit']; ?></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td><?= $sensitivity['sensitivityTable']['datas']['sensitivityEmptyTrial1']?></td>
                                <td><?= $sensitivity['sensitivityTable']['datas']['sensitivityMaxTrial1']?></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><?= $sensitivity['sensitivityTable']['datas']['sensitivityEmptyTrial2']?></td>
                                <td><?= $sensitivity['sensitivityTable']['datas']['sensitivityMaxTrial2']?></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><?= $sensitivity['sensitivityTable']['datas']['sensitivityEmptyTrial3']?></td>
                                <td><?= $sensitivity['sensitivityTable']['datas']['sensitivityMaxTrial3']?></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td><?= $sensitivity['sensitivityTable']['datas']['sensitivityEmptyTrial4']?></td>
                                <td><?= $sensitivity['sensitivityTable']['datas']['sensitivityMaxTrial4']?></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td><?= $sensitivity['sensitivityTable']['datas']['sensitivityEmptyTrial5']?></td>
                                <td><?= $sensitivity['sensitivityTable']['datas']['sensitivityMaxTrial5']?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style=" position: absolute; top:250; left:30%;font-size:10pt;">
                    <p style='position: relative;text-decoration: underline;'>Eccentricity</p>
                    <table class='GeneratedTable' style='position: relative; text-align: center; border-collapse: collapse; border: none; width:40%'>
                        <tbody>
                            <tr>
                                <td width='5em'>Position</td>
                                <td width='5em'>Indication, <?= $eccentricity['eccentricityTable']['eccentricityIndicationUnit']; ?></td>
                                <td width='5em'>Error, <?= $eccentricity['eccentricityTable']['eccentricityErrorUnit']; ?></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td><?= roundTo($eccentricity['eccentricityTable']['datas']['eccentricityIndicationPosition1Start'],$readabilityDecimalPoints)?></td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><?= roundTo($eccentricity['eccentricityTable']['datas']['eccentricityIndicationPosition2'],$readabilityDecimalPoints)?></td>
                                <td><?= roundTo($eccentricity['eccentricityTable']['datas']['eccentricityErrorPosition2'],$readabilityDecimalPoints)?></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><?= roundTo($eccentricity['eccentricityTable']['datas']['eccentricityIndicationPosition3'],$readabilityDecimalPoints)?></td>
                                <td><?= roundTo($eccentricity['eccentricityTable']['datas']['eccentricityErrorPosition3'],$readabilityDecimalPoints)?></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td><?= roundTo($eccentricity['eccentricityTable']['datas']['eccentricityIndicationPosition4'],$readabilityDecimalPoints)?></td>
                                <td><?= roundTo($eccentricity['eccentricityTable']['datas']['eccentricityErrorPosition4'],$readabilityDecimalPoints)?></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td><?= roundTo($eccentricity['eccentricityTable']['datas']['eccentricityIndicationPosition5'],$readabilityDecimalPoints)?></td>
                                <td><?= roundTo($eccentricity['eccentricityTable']['datas']['eccentricityErrorPosition5'],$readabilityDecimalPoints)?></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td><?= roundTo($eccentricity['eccentricityTable']['datas']['eccentricityIndicationPosition1End'],$readabilityDecimalPoints)?></td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style=" position: absolute; top:410; left:-6%;font-size:10pt;">
                    <p style='position: relative; text-align:center'>Figure 1. Positions for Eccentricity Test</p>
                    
                    <div style='position: relative; top:0;left:37%;'>
                        <img src="<?= $base64Illus;?>" alt="Scale" height='90px' style="position: absolute">
                        <p style='position: absolute; top:-7; left:80'><?= $desc?></p>
                    </div>
                </div>
            </div>
            
        <!-- Tables -->
        <!-- FOOTER -->        
            <div style="position: absolute; top:700; left:8.9%; font-size:8;">
                <p style='position: absolute; top:0; font-style: italic;'>This Certificate shall not be reproduced in any form, except in full, without the written approval of the DOST CALABARZON RML</p>
            </div>
            <div style="position: absolute; top:712;  font-size:10pt;">
                <p style='position: absolute; top:0; '>Date of Issue: 
                <?php 
                if($weighingScaleData['dateOfIssue'] != ''){
                    $date=date_create($weighingScaleData['dateOfIssue']);
                    echo date_format($date,"d F Y");
                }else{
                    date_default_timezone_set('Asia/Manila');
                    $today = date("d F Y");  
                    echo $today;
                }
             ?></p>
            </div>
            <div style="position: absolute; top:712; left:90%; font-size:10pt;">
                <p style='position: absolute; top:0;'>Page 2 of 3</p>
            </div>
            <div style='position: absolute; top:738;width:100%;border-width:1;border:solid;'></div>
            <div style="position: absolute; top:734.5; left:33%; font-size:8;">
                <p style='position: absolute; font-style: italic;'>A joint program with the Laguna State Polytechnic University</p>
            </div>
            <div style='position: absolute; top:755; width:100%; border-width:1; border:solid;'></div>
            <div style="position: absolute; top:753; left:25%; font-size:7;">
                <p style='position: absolute;'>RML Bldg., DOST CALABARZON Complex, Jamboree Road, Timugan, Los Baños, Laguna 4030</p>
            </div>
            <div style="position: absolute; top:765;font-size:7;">
            <?php
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

        <!-- FOOTER -->
        <!-- PAGE 3 / PAGE BREAK -->
            <div style='page-break-after: always;'></div>
        <!-- PAGE 3 / PAGE BREAK-->
        <!-- HEADER -->
            <div>
                <div style="position:relative; font-family: DejaVu Sans;">
                    <img src="<?php echo $base64; ?>" alt="DOST LOGO" height='80px' style="position: absolute; top:0 ">
                    <div style="position: absolute; line-height: 0.4; left:90px">
                        <p style="position: relative; font-size: 13px;">Republic of the Philippines</p>
                        <p style="position: relative; font-size: 13px; color:blue">DEPARTMENT OF SCIENCE AND TECHNOLOGY</p>
                        <p style="position: relative; font-size: 13px;">CALABARZON</p>
                        <p style="position: relative; font-size: 15px; font-weight:bold">Regional Metrology Laboratory</p>
                    </div>
                    <?php
                        if($weighingScaleData['PabLogo']=='true'){
                                if($isPAB){
                                echo " <img src='". $base64PAB."' alt='PAB LOGO' height='80px' style='position: absolute; top:0; left:425'>";
                            }
                        }
                    ?>
                </div>
                <div style="position: absolute; top:60;">
                    <hr>
                </div>
                <div style="position: absolute; top:62;">
                    <hr>
                </div>
                <div style="position: absolute; top:70; left:23%">
                    <p style='font-weight:bold;font-size:20'>CALIBRATION CERTIFICATE</p>
                </div>
            </div>
        <!-- HEADER -->
        <!-- INFORMATIONS -->
            <div style="position: absolute; top:135; left:5%; font-size:10pt">
                <div>
                    <table style="border: 0px; overflow-x:auto;">
                        <tbody>
                            <tr valign='top'>
                                <td>Calibration Certificate No.</td>
                                <td>:</td>
                                <td style="font-size: 10;"><strong><?php echo $weighingScaleData['certificateNumber']?></strong></td>
                            </tr>
                            <tr valign='top' style="font-size: 10;">
                                <td>Customer</td>
                                <td>:</td>
                                <td><b><?php echo $weighingScaleData['customer']?></b></td>
                            </tr>
                            <tr valign='top' style="font-size: 10;">
                                <td>Address</td>
                                <td>:</td>
                                <td><b><?php echo $weighingScaleData['address']?></b></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <?php
                    // if($imageDraft == 'true'){
                    //     echo "
                    //     <div style='z-index: 999; margin-top: 170px; margin-left: 40px;'>
                    //     <img src='". $base64."'  style='margin-left: -40px; height: 700px; opacity: 0.1; position: absolute;'>
                    //     <img src='". $base64IllusDraft."'  style='background-size: 100% 100%; opacity: 0.5; position: absolute;'>
                    //     </div>";

                    //     }
                    if($weighingScaleData['completion'] != 'For printing'||$imageDraft == 'true'){
                        echo " 
                        <div style='z-index: 999; position:absolute; top: 80px; margin-left: 25px;'>
                        <img src='". $base64."'  style='margin-left: -40px; height: 700px; opacity: 0.1; position: absolute;'>
                        <img src='". $base64IllusDraft."'  style='background-size: 100% 100%; opacity: 0.5; position: absolute;'>
                        </div>";
                    }
                ?>
            </div>
        <!-- INFORMATIONS -->
        <!-- Tables -->
            <div style=" position: absolute; top:190; left:5%; font-size:10pt;">
                <div  style=" position: absolute; top:0; font-size:10pt;">
                    <p style='position: absolute; top:5;font-weight:bold;text-decoration: underline;'>Calibration Results</p>
                </div>
                <div style=" position: absolute; top:35; left:3%; font-size:10pt;">
                    <p style='position: relative; text-decoration: underline;'>Linearity</p>
                    <table class='GeneratedTable' style='position: relative; text-align: center; border-collapse: collapse; border: none; width:100%'>
                        <tbody>
                            <tr>
                                <td rowspan='2'>Nominal Value, <?= $linearity['linearityTestTable']['linearityNominalValueUnit']?></td>
                                <td rowspan='2'>Conventional Mass, <?= $linearity['linearityTestTable']['linearityConventionalMassUnit']?></td>
                                <td colspan='2'>Indication, <?= $linearity['linearityTestTable']['linearityIndicationUnit']?></td>
                                <td colspan='2'>Error, <?= $linearity['linearityTestTable']['linearityIndicationUnit']?></td>
                            </tr>
                            <tr>
                                <td>Upward</td>
                                <td>Downward</td>
                                <td>Upward</td>
                                <td>Downward </td>
                            </tr>
                            <?php
                                for ($i=1; $i <= $linearityNumberOfRows; $i++) { 
                                    $convenMass = convertValueWithSignificantFigure($linearity['linearityTestTable']['datas']['ConventionalMassRow'.$i],$linearity['linearityTestTable']['linearityConventionalMassUnit'],$readabilityDecimalPoints);
                                    $errorUp = number_format(floatval($linearity['linearityTestTable']['datas']['UpwardRow'.$i])-floatval($convenMass),$readabilityDecimalPoints);
                                    $errorDown = number_format(floatval($linearity['linearityTestTable']['datas']['DownwardRow'.$i])-floatval($convenMass),$readabilityDecimalPoints);

                            ?>   
                                <tr>
                                    <td><?= $linearity['linearityTestTable']['datas']['NominalValueRow'.$i]?></td>
                                    <td><?= $convenMass;?></td>
                                    <td><?= $linearity['linearityTestTable']['datas']['UpwardRow'.$i]?></td>
                                    <td><?= $linearity['linearityTestTable']['datas']['DownwardRow'.$i]?></td>
                                    <td><?= $errorUp?></td>
                                    <td><?= $errorDown?></td>
                                </tr>
                            <?php
                                }                       
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div style="position: relative;font-size:9.5pt;height:auto; border:0px black dotted; top:450">
                <div style="position: absolute;font-size:9.5pt;height:auto; border:0px black dotted;left:15%">
                    <p style='font-weight:bold;text-decoration: underline;margin-top:5;'>Figure 2. Graphical Representation of the error relative to load of the standards used</p>
                    <img src="<?php echo $img['image']?>" alt="Chart Error" class="myimage" style="top: 7%;position:absolute; width:80%; height:200; border-style: solid; ">
                </div>
            </div>
        <!-- Tables -->
        <!-- FOOTER -->        
            <div style="position: absolute; top:700; left:8.9%; font-size:8;">
                <p style='position: absolute; top:0; font-style: italic;'>This Certificate shall not be reproduced in any form, except in full, without the written approval of the DOST CALABARZON RML</p>
            </div>
            <div style="position: absolute; top:712;  font-size:10pt;">
                <p style='position: absolute; top:0; '>Date of Issue: 
                <?php 
                if($weighingScaleData['dateOfIssue'] != ''){
                    $date=date_create($weighingScaleData['dateOfIssue']);
                    echo date_format($date,"d F Y");
                }else{
                    date_default_timezone_set('Asia/Manila');
                    $today = date("d F Y");  
                    echo $today;
                }
             ?></p>
            </div>
            <div style="position: absolute; top:712; left:90%; font-size:10pt;">
                <p style='position: absolute; top:0;'>Page 3 of 3</p>
            </div>
            <div style='position: absolute; top:738;width:100%;border-width:1;border:solid;'></div>
            <div style="position: absolute; top:734.5; left:33%; font-size:8;">
                <p style='position: absolute; font-style: italic;'>A joint program with the Laguna State Polytechnic University</p>
            </div>
            <div style='position: absolute; top:755; width:100%; border-width:1; border:solid;'></div>
            <div style="position: absolute; top:753; left:25%; font-size:7;">
                <p style='position: absolute;'>RML Bldg., DOST CALABARZON Complex, Jamboree Road, Timugan, Los Baños, Laguna 4030</p>
            </div>
            <div style="position: absolute; top:765;font-size:7;">
            <?php
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

        <!-- FOOTER -->
    </body>





</html>