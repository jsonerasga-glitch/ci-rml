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
    $ambTemp = '<span class="label">Ambient Temperature</span><span class="between">: </span><p class="text">'.$aveTemp.'°C</p>';
    $ambhum = '<span class="label">Relative Humidity</span><span class="between">: </span><p class="text">'.$aveRH.' % R.H.</p>';

    $rightSideArray = [$dateCal, $dueDate, $placeOfCali, $ambTemp, $ambhum];


    $conversionTable = array(
        "atm"=>array(
            "atm"=> 1,
            "bar"=> 1.01325,
            "kPa"=> 101.325,
            "psi"=> 14.6959,
            "mmHG"=> 760,
            "Mpa"=> 0.101325,
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
            "Mpa"=> 0.1,
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
            "Mpa"=> 0.001,
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
            "Mpa"=> 0.00689476,
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
            "Mpa"=> 0.00013332239,
            "kg/cm2"=> 0.0013595101283313,
            "inHg"=> 0.039370079197446,
            "inH2O"=> 0.536,
            "mH2O"=> 0.013595,
            "mmH2O"=> 13.5951,
            "mbar"=> 1.333,
            "Pa"=> 133.3
        ),
        "Mpa"=>array(
            "atm"=> 9.86923,
            "bar"=> 10,
            "kPa"=> 1000,
            "psi"=> 145.038,
            "mmHG"=> 7500.6,
            "Mpa"=> 1,
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
            "Mpa"=> 0.0981,
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
            "Mpa"=> 0.00338639,
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
            "Mpa"=> 0.00025,
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
            "Mpa"=> 0.00980638,
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
            "Mpa"=> 0.0000098,
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
            "Mpa"=> 0.0001,
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
            "Mpa"=> 0.000001,
            "kg/cm2"=> 0.00001,
            "inHg"=> 0.000295,
            "inH2O"=> 0.00402,
            "mH2O"=> 0.00010197442889221,
            "mmH2O"=> 0.102,
            "mbar"=> 0.01,
            "Pa"=> 1
        )
    );


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

   </style>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RML ++</title>	
</head>

<?php
    use App\Models\PressureGaugeStandardModel;
    use App\Models\PressureGaugeStandardValueModel;
    
    $rml2 = new PressureGaugeStandardModel();
    $arrayOfWeights = $dataFromDB['standard'];
    $pieces = explode("(SPLIT)", $arrayOfWeights);
	$arr2[] = $rml2->whereIn('serialNumber', $pieces)->findAll(); 	
    $rml3 = new PressureGaugeStandardValueModel();
	$arr3[] = $rml3->whereIn('serialNumber', $pieces)->first();	

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

    function addingReso($specificationsData, ){
        $leftSideArray = [];        
        $manu = '<span class="label">Manufacturer</span><span class="between">: </span><p class="text">'.$specificationsData->manufacturer.'</p>';
        $model = '<span class="label">Model No.</span><span class="between">: </span><p class="text">'.$specificationsData->modelNumber.'</p>';
        $seri = '<span class="label">Serial No.</span><span class="between">: </span><p class="text">'.$specificationsData->serialNumber.'</p>';
        $equipID = '<span class="label">Equipment ID</span><span class="between">: </span><p class="text">'.$specificationsData->equipmentId.'</p>';
        $reso = '<span class="label">Graduation</span><span class="between">: </span><p class="text">'.$specificationsData->resolution.' '.$specificationsData->unit.'</p>';
        //$range = '<span class="label">Range</span><span class="between">: </span><p class="text">'.$specificationsData->range.' '.$specificationsData->rangeUnit.'</p>';
       
        array_push($leftSideArray,$manu);
        array_push($leftSideArray,$model);
        array_push($leftSideArray,$seri);
        array_push($leftSideArray,$equipID);
        //array_push($leftSideArray,$range);
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

?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@3.4.1/dist/chart.min.js "></script> 

<body>
    <header style="line-height: 0;">
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
        
            
    </header>
    <footer>
        <div style="position: absolute; top:0; left:8.5%; font-size:8pt;">
            <p style='position: absolute; top:0; font-style: italic;'>This Certificate shall not be reproduced in any form, except in full, without the written approval of the DOST CALABARZON RML</p>
        </div>
        <div style="position: absolute; top:12; font-size:9.5pt;">
            <p style='position: absolute; top:0; '>Date of Issue: 
            <?php 
                if(($datePrev)==TRUE){
                    $date=date_create($datePrev);
                    echo date_format($date,"d F Y");
                }else{
                    date_default_timezone_set('Asia/Manila');
                    $today = date("d F Y");  echo $today;
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
                if($dataFromDB['completion'] != 'For printing'||$imageDraft == 'true'){
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
                <div class="" style="position: relative;font-size:9.5pt;">
                    <p style='font-weight:bold;text-decoration: underline;'>Calibration Procedure and Traceability</p>
                    <p style='margin-top:-10;'><?=$dataFromDB['settingCalibrationProcedureAndTraceability']?></p>
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
                                        echo "  <tr><td  valign='top' style='margin-top: -8px;text-align: left;font-size:9.5pt;'><p style='margin: 0;'>".$classString[$i]['standardDescription']."</p></td>";
                                        echo "<td  valign='top' style='margin-top: -8px;font-size:9.5pt'><p style='margin:0;'>". $classString[$i]['calibrationCertificate']. " <br></p></td>";
                                        echo "<td  valign='top' style='margin-top: -8px;font-size:9.5pt'><p style='margin:0;'>". $classString[$i]['laboratory']. " <br></p></td></tr>";
                                    }
                                ?>
                        </tbody>
                    </table>
                </div>
                <div class="" style="position: relative;font-size:9.5pt;height:auto;border:0px blue dotted;">
                    <p style='font-weight:bold;text-decoration: underline;font-size:9.5pt;top:2;'>Calibration Results</p>
                    <p style='max-width:95%;font-size:9.5pt;margin-top:-10;'><?=$dataFromDB['settingCalibrationResults']?></p>
                </div>
                <div class="" style="position: relative; font-size:9.5pt;height:auto;border:0px green dotted;margin-top:-1%;">
                    <p style='font-weight:bold;text-decoration: underline;font-size:9.5pt;top:2;'>Uncertainty of Measurement</p>
                    <p style='max-width:95%;font-size:9.5pt;margin-top:-10;'><?=$dataFromDB['settingUncertaintyOfMeasurement']?></p>
                </div>

                <div class="" style="position: relative;font-size:9.5pt;height:auto; border:0px black dotted;margin-top:-1%;">
                    <p style='font-weight:bold;text-decoration: underline;font-size:9.5pt;top:2;'>Measurement Condition</p>
                    <p style='max-width:95%;font-size:9.5pt;margin-top:-10;'><?=$dataFromDB['settingMeasurementCondition']?></p>
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
                <p style='position: absolute; top:0;font-size:9.5pt;'>1 of 1?></p>
            </div>
              
        </div>

    </main>
   
</body>





</html>   