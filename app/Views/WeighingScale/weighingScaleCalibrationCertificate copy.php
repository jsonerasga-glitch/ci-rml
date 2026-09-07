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

    if ($weighingScaleData['illustration'] == 'A'){
        $base64Illus = $base64Illusa;
    }
    if ($weighingScaleData['illustration'] == 'B'){
        $base64Illus = $base64IllusB;
    }

    $specific = json_decode($weighingScaleData['specificationData'],true);
    $environmentData = json_decode($weighingScaleData['environmentData'],true);
    $spanCalibration = json_decode($weighingScaleData['spanCalibrationData'],true);
    $sensitivity = json_decode($weighingScaleData['sensitivityTestData'],true);
    $eccentricity = json_decode($weighingScaleData['eccentricityTestData'],true);
    $repeatability = json_decode($weighingScaleData['repeatabilityTestData'],true);

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
    $arrayOfWeights = $weighingScaleData['standardUsed'];
    $pieces = explode(",", $arrayOfWeights);
	$arr2[] = $rml2->whereIn('serialNumber', $pieces)->findAll(); 	
    $rml3 = new ElectModel_3();
	$arr3[] = $rml3->whereIn('serialNumber', $pieces)->first();	

    function TrimTrailingZeroes($nbr) {
        return strpos($nbr,'.')!==false ? rtrim(rtrim($nbr,'0'),'.') : $nbr;
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


?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@3.4.1/dist/chart.min.js "></script> 

<body style="">
    <div class="container" style="">
    <!-- HEADER --> 
        <div style="position:relative; font-family: DejaVu Sans;">
            <img src="<?php echo $base64; ?>" alt="DOST LOGO" height='80px' style="position: absolute; top:0"> 
            <p style="position: absolute; top:-11; left:80; font-size: 13px;">Republic of the Philippines</p>
            <p style="position: absolute; top:5; left:80; font-size: 13px; color:blue">DEPARTMENT OF SCIENCE AND TECHNOLOGY</p>
            <p style="position: absolute; top:20; font-size: 13px; left:80">CALABARZON</p>
            <p style="position: absolute; top:36; left:80; font-size: 15px; font-weight:bold">Regional Metrology Laboratory</p>
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
    <!-- HEADER -->
    <!-- Informations -->    
        <div style="position: absolute; top:80; left:23%">
            <p style='font-weight:bold;font-size:20'>CALIBRATION CERTIFICATE</p>
        </div>
        <div style="position: absolute; top:150; left:5%; font-size:10;">
            <table style="border: 0px;">
                <tbody>
                    <tr valign='top' >
                        <td>Calibration Certificate No.</td>
                        <td>:</td>
                        <td  style="font-size: 10;"><b><?php echo $weighingScaleData['certificateNumber']?></b></td>
                    </tr>
                    <tr valign='top'>
                        <td>Customer</td>
                        <td>:</td>
                        <td style="font-size: 10;"><b><?php echo $weighingScaleData['customer']?></b></td>
                    </tr>
                    <tr valign='top'>
                        <td>Address</td>
                        <td>:</td>
                        <td style="font-size: 10;"><b><?php echo $weighingScaleData['address']?></b></td>
                    </tr>
                    
                </tbody>
            </table> 
        </div>

        <?php   
            if($imageDraft == TRUE){
                echo " 
                <div style='z-index: 999; margin-top: 170px; margin-left: 40px;'>
                <img src='". $base64."'  style='margin-left: -40px; height: 700px; opacity: 0.1; position: absolute;'>
                <img src='". $base64IllusDraft."'  style='background-size: 100% 100%; opacity: 0.5; position: absolute;'>
                </div>";
                    
                }
        ?> 

        <div  style=" position: absolute; top:230; left:5%; font-size:10;">
            <table style="border: 0px; width: 292px;">
                <tbody>
                    <tr valign='top'>
                        <td>Equipment Description</td>
                        <td>:</td>
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



        <div  style="position: absolute; top:230; left:50%; font-size:10; ">
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
                        <td><?php echo $environmentData['environment']['averageTemp']?> &deg;C</td>
                    </tr>
                    <tr valign='top'>
                        <td>Relative Humidity</td>
                        <td>:</td>
                        <td><?php echo $environmentData['environment']['averageRH']?>% RH</td>
                    </tr>
                </tbody>
            </table>
        </div>
    <!-- Informations -->
    <!-- Calibration Procedure and Traceability -->
        <div style="position: absolute; top:355; left:5%; font-size:10; line-height: 150%;">
            <p style='position: absolute; top:0;font-weight:bold;text-decoration: underline;'>Calibration Procedure and Traceability</p>
            <p style='position: absolute; top:15; max-width:95%'><?=$weighingScaleData['settingCalibrationProcedureAndTraceability']?></p>
        </div>
        <div style="position: relative; top:435; font-size:10;">
                <table padding="0" style="align-text: center; border-collapse: collapse; border: none; width: 830px; margin-left: 25%;" >
                    <tr>
                        <th height="15" style="text-align: center;  padding: 0px;"><u>Standard Used</u></th>
                        <th height="15" style="text-align: center; padding: 0px; "><u>Calibration Certificate No.</u></th>
                        <th height="15" style="text-align: center; padding: 0px;"><u>Issuing Laboratory</u></th>
                    </tr>
                   

                    <?php
                        $search = array("₀", "₁", "₂", "₃", "₄", "₅", "₆", "₇", "₈", "₉","0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
                        $replace = array("<sub>0</sub>", "<sub>1</sub>", "<sub style='font-size:10px;'>2</sub>", "<sub>3</sub>","<sub>4</sub>", "<sub>5</sub>","<sub>6</sub>", "<sub>7</sub>","<sub>8</sub>", "<sub>9</sub>","<sub>0</sub>", "<sub>1</sub>", "<sub style='font-size:10px;'>2</sub>", "<sub>3</sub>","<sub>4</sub>", "<sub>5</sub>","<sub>6</sub>", "<sub>7</sub>","<sub>8</sub>", "<sub>9</sub>",);
                        $classString = $arr2[0]; 
                        $m2 = [];
                        // echo str_replace($search,$replace,$classString);
                        for($i = 0; $i < count($classString);$i++){ 
                    ?>
                    <tr>
                        <td height="5" width="35%" style="text-align: center; padding: 0px; vertical-align: center;">
                            <?= str_replace($search,$replace,$classString[$i]['type']); ?> 
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
    <!-- Calibration Procedure and Traceability -->    
    <!-- Uncertainty of Measurement -->      
             <div style="position: relative; left:5%; font-size:10; height:10%">
                <p style='position: absolute; top:5;font-weight:bold;text-decoration: underline;'>Uncertainty of Measurement</p>
                <p style='position: absolute; top:10; line-height: 150%; max-width:95%'><?=$weighingScaleData['settingUncertaintyOfMeasurement']?></p>
            </div>   
    <!-- Uncertainty of Measurement -->    
    <!-- Calibration Results -->
            <div style="position: relative; left:5%; font-size:10; line-height: 150%;">
                <p style='position: absolute; top:10;font-weight:bold;text-decoration: underline;'>Calibration Results</p>
                <p style='position: absolute; top:15; max-width:95%'><?=$weighingScaleData['settingCalibrationResults']?></p>
            </div>
        </div>
    <!-- Calibration Results -->
    <!-- Remarks -->
        <div style="position: relative; top:0; font-size:10;border-width:0;border-style:solid;">
            <p style='position: relative; top:10;font-weight:bold;text-decoration: underline;'>Remarks:</p>
            <table style="border: 0px; width: 90%; ">
                <tbody>
                    <?php
                        $remarks = $weighingScaleData['settingRemarks'];
                        $remarksSeparated = explode("(splitHere)", $remarks);
                        for ($i=0; $i < count($remarksSeparated); $i++) { 
                            echo "<tr valign='top'><td>".($i+1).'. '.'</td><td>'.$remarksSeparated[$i].'</td></tr>';
                        }
                    ?>
                </tbody>
            </table> 
        </div>
    <!-- Remarks -->
    <!-- SIGNATURE -->     
        <div style="position: absolute; top:630; left:10%; font-size:10;">
            <p style='position: absolute; top:0;text-decoration: underline;'> <?php echo $weighingScaleData['calibrationOfficer'];?></p>
            <p style='position: absolute; top:15;'>Calibration Officer</p>
        </div>
        <div style="position: absolute; top:630; left:70%; font-size:10;">
            <p style='position: absolute; top:0;text-decoration: underline;'><?php echo $weighingScaleData['checkedBy'];?></p>
            <p style='position: absolute; top:15;'><?php echo $weighingScaleData['verifierPosition'];?></p>
        </div>
    <!-- SIGNATURE -->     
    <!-- FOOTER -->        
        <div style="position: absolute; top:700; left:8.9%; font-size:8;">
            <p style='position: absolute; top:0; font-style: italic;'>This Certificate shall not be reproduced in any form, except in full, without the written approval of the DOST CALABARZON RML</p>
        </div>
        <div style="position: absolute; top:712;  font-size:10;">
            <p style='position: absolute; top:0; '>Date of Issue: 
            <?php 
            if(($datePrev)==TRUE){
                 $date=date_create($datePrev);
                echo date_format($date,"j F Y");
            }else{
                date_default_timezone_set('Asia/Manila');
                $today = date("j F Y");  echo $today;
            }
             ?></p>
        </div>
        <div style="position: absolute; top:712; left:90%; font-size:10;">
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

    <!-- FOOTER -->   
    <!-- PAGE 2 / PAGE BREAK -->
        <div style='page-break-after: always;'></div>
    <!-- PAGE 2 / PAGE BREAK-->
    <!-- HEADER --> 
        <div style="position:relative; font-family: DejaVu Sans;">
            <img src="<?php echo $base64; ?>" alt="DOST LOGO" height='80px' style="position: absolute; top:0"> 
            <p style="position: absolute; top:-11; font-size: 13px; left:80">Republic of the Philippines</p>
            <p style="position: absolute; top:5; left:80; color:blue; font-size: 13px">DEPARTMENT OF SCIENCE AND TECHNOLOGY</p>
            <p style="position: absolute; top:20; left:80; font-size: 13px">CALABARZON</p>
            <p style="position: absolute; top:36; left:80; font-weight:bold; font-size: 15px">Regional Metrology Laboratory</p>
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
    <!-- HEADER -->
    <!-- INFORMATIONS -->
        <div style="position: absolute; top:80; left:23%">
            <p style='font-weight:bold;font-size:20'>CALIBRATION CERTIFICATE</p>
        </div>
        <div style="position: absolute; top:150; left:5%; font-size:10">
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
            if($imageDraft == TRUE){
                echo " 
                <div style='z-index: 999; margin-top: 170px; margin-left: 40px;'>
                <img src='". $base64."'  style='margin-left: -40px; height: 700px; opacity: 0.1; position: absolute;'>
                <img src='". $base64IllusDraft."'  style='background-size: 100% 100%; opacity: 0.5; position: absolute;'>
                </div>";
                    
                }
        ?> 
    <!-- INFORMATIONS -->
    <!-- FOOTER -->        
        <div style="position: absolute; top:700; left:8.9%; font-size:8;">
            <p style='position: absolute; top:0; font-style: italic;'>This Certificate shall not be reproduced in any form, except in full, without the written approval of the DOST CALABARZON RML</p>
        </div>
        <div style="position: absolute; top:712;  font-size:10;">
            <p style='position: absolute; top:0; '>Date of Issue: 
            <?php 
            if(($datePrev)==TRUE){
                 $date=date_create($datePrev);
                echo date_format($date,"j F Y");
            }else{
                date_default_timezone_set('Asia/Manila');
                $today = date("j F Y");  echo $today;
            }
             ?></p>
        </div>
        <div style="position: absolute; top:712; left:90%; font-size:10;">
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
        <div style="position:relative; font-family: DejaVu Sans;">
            <img src="<?php echo $base64; ?>" alt="DOST LOGO" height='80px' style="position: absolute; top:0"> 
            <p style="position: absolute; top:-11; left:80; font-size: 13px">Republic of the Philippines</p>
            <p style="position: absolute; top:5; left:80; font-size: 13px; color:blue">DEPARTMENT OF SCIENCE AND TECHNOLOGY</p>
            <p style="position: absolute; top:20; font-size: 13px; left:80">CALABARZON</p>
            <p style="position: absolute; top:36; font-size: 15px; left:80; font-weight:bold">Regional Metrology Laboratory</p>
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
    <!-- HEADER -->
    <!-- INFORMATIONS -->
        <div style="position: absolute; top:80; left:23%">
            <p style='font-weight:bold;font-size:20'>CALIBRATION CERTIFICATE</p>
        </div>
        <div style="position: absolute; top:150; left:5%; font-size:10">
            <table style="border: 0px;">
                <tbody>
                    <tr valign='top'>
                        <td>Calibration Certificate No.</td>
                        <td>:</td>
                        <td style="font-size: 10;"><b><?php echo $weighingScaleData['certificateNumber']?></b></td>
                    </tr>
                    <tr valign='top'>
                        <td>Customer</td>
                        <td>:</td>
                        <td><b><?php echo $weighingScaleData['customer']?></b></td>
                    </tr>
                    <tr valign='top'>
                        <td>Address</td>
                        <td>:</td>
                        <td><b><?php echo $weighingScaleData['address']?></b></td>
                    </tr>
                    
                </tbody>
            </table> 
        </div>
        <?php   
            if($imageDraft == TRUE){
                echo " 
                <div style='z-index: 999; margin-top: 170px; margin-left: 40px;'>
                <img src='". $base64."'  style='margin-left: -40px; height: 700px; opacity: 0.1; position: absolute;'>
                <img src='". $base64IllusDraft."'  style='background-size: 100% 100%; opacity: 0.5; position: absolute;'>
                </div>";
                    
                }
        ?> 
    <!-- INFORMATIONS -->
    <!-- FOOTER -->        
        <div style="position: absolute; top:700; left:8.9%; font-size:8;">
            <p style='position: absolute; top:0; font-style: italic;'>This Certificate shall not be reproduced in any form, except in full, without the written approval of the DOST CALABARZON RML</p>
        </div>
        <div style="position: absolute; top:712;  font-size:10;">
            <p style='position: absolute; top:0; '>Date of Issue: 
            <?php 
            if(($datePrev)==TRUE){
                 $date=date_create($datePrev);
                echo date_format($date,"j F Y");
            }else{
                date_default_timezone_set('Asia/Manila');
                $today = date("j F Y");  echo $today;
            }
             ?></p>
        </div>
        <div style="position: absolute; top:712; left:90%; font-size:10;">
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
    </div>     
</body>





</html>   