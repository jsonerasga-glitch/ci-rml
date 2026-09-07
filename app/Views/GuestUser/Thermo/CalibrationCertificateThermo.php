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

  

    $DATAtempIn = json_decode($thermoData['tableTempIn'],true);
    $DATARHIn = json_decode($thermoData['tableRH'],true);
    $DATAtempoOut = json_decode($thermoData['tableTempOut'],true);
    $DATARHOut = json_decode($thermoData['tableRNOut'],true);

    if($page==null){$page = 'default';}

    $date = $thermoData['dateReceived']; 
    $mysql_date = date('Y-m-d G:i:s', strtotime($date));
    $date2 = $thermoData['dateCalibrated']; 
    $mysql_date2 = date('Y-m-d G:i:s', strtotime($date2));
    $date3 = $thermoData['recommendedDueDate']; 
    $mysql_date3 = date('Y-m-d G:i:s', strtotime($date3));

    $dateCal =  '<td style="font-size:9.5pt">Date Calibrated</td><td style="font-size:9.5pt; padding-right: 5px;">:</td><td style="font-size:9.5pt">'.date('d F Y', strtotime($mysql_date2)).'</td>';
    $dueDate =  '<td style="font-size:9.5pt">Recommended Due Date</td><td style="font-size:9.5pt">:</td><td style="font-size:9.5pt">'.date('d F Y', strtotime($mysql_date3)).'</td>';
    $placeOfCali =  '<td style="font-size:9.5pt">Place of Calibration</td><td style="font-size:9.5pt">:</td><td style="font-size:9.5pt">'.$thermoData['placeOfCalibration'].'</td>';
    $ambTemp =  '<td style="font-size:9.5pt">Ambient Temperature</td><td style="font-size:9.5pt">:</td><td style="font-size:9.5pt">'.$thermoData['ambTemp'].'</td>';
    $ambhum =  '<td style="font-size:9.5pt">Relative Humidity</td><td style="font-size:9.5pt">:</td><td style="font-size:9.5pt">'.$thermoData['ambRh'].'</td>';

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
        }
        .infoTable{
            border-spacing: 0px;
            font-size:9.5pt;
        }
        .infoTable tbody tr td{
            white-space:nowrap;
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
    use App\Models\ThermoStandard;
    use App\Models\ThermoStandardAddTestPointsModel;
    
    $rml2 = new ThermoStandard();
    $arrayOfWeights = $thermoData['standardAndAccessories'];
    $pieces = explode(",", $arrayOfWeights);
	$arr2[] = $rml2->whereIn('serialNumber', $pieces)->findAll(); 	
    $rml3 = new ThermoStandardAddTestPointsModel();
	$arr3[] = $rml3->whereIn('serialNumber', $pieces)->first();	

    function TrimTrailingZeroes($nbr) {
        return strpos($nbr,'.')!==false ? rtrim(rtrim($nbr,'0'),'.') : $nbr;
    } ;

    //$readabilityDecimalPoint = strlen(substr(strrchr(TrimTrailingZeroes($thermoData['readability']), "."), 1));
    
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

    


    function addingReso($thermoData){
        $leftSideArray = [];
        $manu =  '<td style="font-size:9.5pt">Manufacturer</td><td style="font-size:9.5pt; padding-left: 55px;">:</td><td style="font-size:9.5pt; padding-left: 5px;">'.$thermoData['manufacturer'].'</td>';
        $model =  '<td style="font-size:9.5pt;">Model No.</td><td style="font-size:9.5pt;  padding-left: 55px;">:</td><td style="font-size:9.5pt; padding-left: 5px;">'.$thermoData['modelNumber'].'</td>';
        $seri =  '<td style="font-size:9.5pt">Serial No.</td><td style="font-size:9.5pt; padding-left: 55px;">:</td><td style="font-size:9.5pt; padding-left: 5px;">'.$thermoData['serialNumber'].'</td>';
        $equipID =  '<td style="font-size:9.5pt">Equipment ID</td><td style="font-size:9.5pt; padding-left: 55px;">:</td><td style="font-size:9.5pt; padding-left: 5px;">'.$thermoData['equipmentID'].'</td>';

        $DATAtempIn = json_decode($thermoData['tableTempIn'],true);
        $DATARHIn = json_decode($thermoData['tableRH'],true);
        $DATAtempoOut = json_decode($thermoData['tableTempOut'],true);
        $DATARHOut = json_decode($thermoData['tableRNOut'],true);
        $typeOfEquipment = $thermoData['typeOfEquipment'];


        $IN = '';
        $INRH = '';

        $tempInTrue = false;
        $tempOutTrue = false;
        $RhinTrue = false;
        $RhOutTrue= false;
        $displayType;

        if($typeOfEquipment=='analog'){
            $displayType = 'Graduation';
        }else{
            $displayType = 'Resolution';
        }


        if(count($DATAtempoOut)!=0){
            $IN = ' IN';
        }
        if(count($DATARHOut)!=0){
            $INRH = ' IN';
        }

        if(count($DATAtempIn)!=0){
            $tempInTrue = true;
            $resoTempIn =  "<td style='white-space:wrap;font-size:9.5pt;' width='100'>".$displayType." (<i style='font-size:8pt;'>temperature".$IN."</i>)</td><td style='font-size:9.5pt;padding-left: 55px;'>:</td><td style='font-size:9.5pt; padding-left: 5px;'>".$DATAtempIn[0]['resUsed']." °C</td>";
            array_push($leftSideArray,$resoTempIn);
        }
        if(count($DATAtempoOut)!=0){
            $tempOutTrue = true;
            $resoTempOut = "<td style='white-space:wrap;font-size:9.5pt;'width='120'>".$displayType." (<i style='font-size:8pt;'>temperature OUT</i>)</td><td style='font-size:9.5pt; padding-left: 55px;'>:</td><td style='font-size:9.5pt; padding-left: 5px;'>".$DATAtempoOut[0]['resUsed']." °C</td>";
            array_push($leftSideArray,$resoTempOut);
        }
        if(count($DATARHIn)!=0){
            $RhinTrue = true;
            $resoRhIn =    "<td style='white-space:wrap;font-size:9.5pt;'>".$displayType." (<i style='font-size:8pt;'>humidity".$INRH."</i>)</td><td style='font-size:9.5pt; padding-left: 55px;'>:</td><td style='font-size:9.5pt; padding-left: 5px;'>".$DATARHIn[0]['resUsed']." % RH</td>";
            array_push($leftSideArray,$resoRhIn);
        }
        if(count($DATARHOut)!=0){
            $RhOutTrue = true;
            $resoRhIn =    "<td style='white-space:wrap;font-size:9.5pt;'>".$displayType." (<i style='font-size:8pt;'>humidity OUT</i>)</td><td style='font-size:9.5pt; padding-left: 55px;'>:</td><td style='font-size:9.5pt; padding-left: 5px;'>".$DATARHOut[0]['resUsed']." % RH</td>";
            array_push($leftSideArray,$resoRhIn);
        }

        array_push($leftSideArray,$manu);
        array_push($leftSideArray,$model);
        array_push($leftSideArray,$seri);
        array_push($leftSideArray,$equipID);
        return $leftSideArray;
    }
    $leftSideArray = addingReso($thermoData);

?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@3.4.1/dist/chart.min.js "></script> 

<body>
    
    <div class="container">

    
    <!-- HEADER --> 
        <?php   
            if($thermoData['completion'] != 'For printing'||$imageDraft == 'true'){
                echo " 
                <div style='z-index: 999; position:absolute; top: 150px; margin-left: 40px;'>
                <img src='". $base64."'  style='margin-left: -40px; height: 700px; opacity: 0.1; position: absolute;'>
                <img src='". $base64IllusDraft."'  style='background-size: 100% 100%; opacity: 0.5; position: absolute;'>
                </div>";
            }
        ?> 
        <div style="position:relative; font-family: DejaVu Sans; top:-10">
            <img src="<?php echo $base64; ?>" alt="DOST LOGO" height='80px' style="position: absolute; top:12"> 
            <p style="position: absolute; top:0; left:80; font-size: 13px;">Republic of the Philippines</p>
            <p style="position: absolute; top:14; left:80; font-size: 13px; color:blue">DEPARTMENT OF SCIENCE AND TECHNOLOGY</p>
            <p style="position: absolute; top:30; font-size: 13px; left:80">CALABARZON</p>
            <p style="position: absolute; top:44; left:80; font-size: 15px; font-weight:bold">Regional Metrology Laboratory</p>
            <?php 
               if($DATAtempIn != []){
                    $TempInreso = floatval($DATAtempIn[0]['resUsed']);
                    $trueArray = [];
                    if($thermoData['PabLogo']=='true'){
                        for($i = 1; $i<count($DATAtempIn);$i++){
                            if($TempInreso <=0.1 && (round($DATAtempIn[$i]['CorrectedValue'],2)>=-20 && round($DATAtempIn[$i]['CorrectedValue'],2)<=70)){
                                array_push($trueArray,"true");
                            }else{
                                array_push($trueArray,"false");
                            } 
                        }
                        if((in_array("true", $trueArray))){
                            echo " <img src='". $base64PAB."' alt='PAB LOGO' height='80px' style='position: absolute; top:12; left:425'>";
                        }
                    }
               } else if($DATAtempoOut != []){
                    $TempInreso = floatval($DATAtempoOut[0]['resUsed']);
                    $trueArray = [];
                    if($thermoData['PabLogo']=='true'){
                        for($i = 1; $i<count($DATAtempoOut);$i++){
                            if($TempInreso <=0.1 && (round($DATAtempoOut[$i]['CorrectedValue'],2)>=-20 && round($DATAtempoOut[$i]['CorrectedValue'],2)<=70)){
                                array_push($trueArray,"true");
                            }else{
                                array_push($trueArray,"false");
                            } 
                        }
                        if((in_array("true", $trueArray))){
                            echo " <img src='". $base64PAB."' alt='PAB LOGO' height='80px' style='position: absolute; top:0; left:425'>";
                        }
                    }
                }else if($DATARHIn != []){
                            $TempInreso = floatval($DATARHIn[0]['resUsed']);
                            $trueArray = [];
                            if($thermoData['PabLogo']=='true'){
                                for($i = 1; $i<count($DATARHIn);$i++){
                                    if($TempInreso <=0.1 && (round($DATARHIn[$i]['CorrectedValue'],2)>=-20 && round($DATARHIn[$i]['CorrectedValue'],2)<=70)){
                                        array_push($trueArray,"true");
                                    }else{
                                        array_push($trueArray,"false");
                                    } 
                                }
                                if((in_array("true", $trueArray))){
                                    echo " <img src='". $base64PAB."' alt='PAB LOGO' height='80px' style='position: absolute; top:0; left:425'>";
                                }
                            }
                }else if($DATARHOut != []){
                    $TempInreso = floatval($DATARHOut[0]['resUsed']);
                    $trueArray = [];
                    if($thermoData['PabLogo']=='true'){
                        for($i = 1; $i<count($DATARHOut);$i++){
                            if($TempInreso <=0.1 && (round($DATARHOut[$i]['CorrectedValue'],2)>=-20 && round($DATARHOut[$i]['CorrectedValue'],2)<=70)){
                                array_push($trueArray,"true");
                            }else{
                                array_push($trueArray,"false");
                            } 
                        }
                        if((in_array("true", $trueArray))){
                            echo " <img src='". $base64PAB."' alt='PAB LOGO' height='80px' style='position: absolute; top:0; left:425'>";
                        }
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
    
    <!-- BODY -->
        <div class='' style="position: absolute;top:70;">
            <div class='' style="position:relative;left:23%">
                <p style='font-weight:bold;font-size:19pt'>CALIBRATION CERTIFICATE</p>
            </div>
            <div class='' style="position:relative;margin-bottom:20">
                <table class='infoTable' style="border: 0px solid black;">
                    <thead>
                        <tr valign='top'>
                            <td style="white-space:nowrap;" style="font-size:9.5pt">Calibration Certificate No.</td>
                            <td style="font-size:9.5pt; padding-left: 45px;">:</td>
                            <td colspan="4" style="font-size:9.5pt; padding-left: 5px;"><b><?php echo $thermoData['certificateNumber']?></b></td>
                        </tr>
                        <tr valign='top'>
                            <td style="font-size:9.5pt">Customer</td>
                            <td style="font-size:9.5pt;  padding-left: 45px;">:</td>
                            <td colspan="4" style="font-size:9.5pt; padding-left: 5px;"><b><?php echo $thermoData['customer']?></b></td>
                        </tr>
                        <tr valign='top'>
                            <td style="font-size:9.5pt">Address</td>
                            <td style="font-size:9.5pt;  padding-left: 45px;">:</td>
                            <td colspan="4" style="font-size:9.5pt; padding-left: 5px;"><b><?php echo $thermoData['address']?></b></td>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class='' style="position:relative;height:16%;">
                <div class='' style="position:absolute; left:0; top:0; max-width:55%;">
                    <table class='infoTable' style="border: 0px solid black;font-size:9.5pt;">
                        <thead>
                            <tr valign='top'>
                                <td style="font-size:9.5pt;">Equipment</td>
                                <td style="font-size:9.5pt; padding-left: 55px; width:10%">:</td>
                                <td style="white-space:wrap;font-size:9.5pt; padding-left: 5px;"><?php echo $thermoData['equipmentDescription']?></td>
                            </tr>
                            <?php
                                for ($i=0; $i < count($leftSideArray); $i++) { 
                                    echo '<tr valign="top" style="font-size:9.5pt">'.$leftSideArray[$i].'</tr>';
                                }
                            ?>
                        </thead>
                    </table>
                </div>
                
                <div class='' style="position:absolute;  right:0; top:0; max-width:45%;">
                    <table class='infoTable' style="border: 0px solid black;font-size:9.5pt;">
                        <thead>
                            <tr valign='top'>
                                <td style="font-size:9.5pt" width='120'>Date Received</td>
                                <td style="font-size:9.5pt;">:</td>
                                <td style="font-size:9.5pt;"><?php echo date('d F Y', strtotime($mysql_date));?></td>
                            </tr>
                            <?php
                                for ($i=0; $i < count($rightSideArray); $i++) { 
                                    echo '<tr valign="top" style="font-size:9.5pt">'.$rightSideArray[$i].'</tr>';
                                }
                            ?>
                        </thead>
                    </table>
                </div>
                
            </div>
            <div class="" style="position: relative; font-size:9.5pt;">
                <p style='font-weight:bold;text-decoration: underline;'>Calibration Procedure and Traceability</p>
                <p style='margin-top:-10;'><?=$thermoData['settingCalibrationProcedureAndTraceability']?></p>
            </div>
            <div style="position: relative; font-size:9.5pt;left:6%;">
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
                                    echo "  <tr><td  valign='top' style='margin-top: -8px;text-align: left;font-size:9.5pt;'><p style='margin: 0;'>".$classString[$i]['standardUsed']."</p></td>";
                                    echo "<td  valign='top' style='margin-top: -8px;font-size:9.5pt'><p style='margin:0;'>". $classString[$i]['certificateNumber']. " <br></p></td>";
                                    echo "<td  valign='top' style='margin-top: -8px;font-size:9.5pt'><p style='margin:0;'>". $classString[$i]['issuingLab']. " <br></p></td></tr>";
                                }
                            ?>
                    </tbody>
                </table>
            </div>
            <div class="" style="position: relative; font-size:9.5pt;height:3%;margin-bottom:-10pt;">
                <p style='font-weight:bold;text-decoration: underline;font-size:9.5pt;top:2;'>Calibration Results</p>
                <p style='max-width:95%;font-size:9.5pt;margin-top:-10;'><?=$thermoData['settingCalibrationResults']?></p>
            </div>
            <div class="" style="position: relative; font-size:9.5pt;height:4%;margin-bottom:-10;">
                <p style='font-weight:bold;text-decoration: underline;font-size:9.5pt;top:2;'>Uncertainty of Measurement</p>
                <p style='max-width:95%;font-size:9.5pt;margin-top:-10;'><?=$thermoData['settingUncertaintyOfMeasurement']?></p>
            </div>
            <br>
            <div class="" style="position: relative; font-size:9.5pt;height:7%">
                <p style='font-weight:bold;text-decoration: underline;margin-top:5;'>Remarks:</p> <br>
                <table style="border: 0px; width: 90%; font-size:9.5pt;margin-top:-15;">
                    <tbody>
                        <?php
                            $remarks = $thermoData['settingRemarks1'];
                            $remarksSeparated = explode("(splitHere)", $remarks);
                            for ($i=0; $i < count($remarksSeparated); $i++) { 
                                echo "<tr valign='top' style='font-size:9.5pt;'><td>".($i+1).". "."</td><td>".$remarksSeparated[$i]."</td></tr>";
                            }
                        ?>
                    </tbody>
                </table> 
            </div>
        </div>
    <!-- BODY -->       
    
    <!-- SIGNATURE -->     
        <div style="position: absolute; top:660; left:6%; font-size:9.5pt;">
            <p style='position: absolute; top:0;text-decoration: underline;font-size:9.5pt;'> <?php echo $thermoData['calibratedBy'];?></p>
            <p style='position: absolute; top:15;font-size:9.5pt;'>Calibration Officer</p>
        </div>
        <div style="position: absolute; top:660; left:70%; font-size:9.5pt;">
            <p style='position: absolute; top:0;text-decoration: underline;font-size:9.5pt;'>Engr. Rogerson A. Esmeria</p>
            <p style='position: absolute; top:15;font-size:9.5pt;'>Laboratory Head</p>
        </div>
    <!-- SIGNATURE -->     
    <!-- FOOTER -->        
        <div style="position: absolute; top:700; left:8.5%; font-size:8pt;">
            <p style='position: absolute; top:0; font-style: italic;'>This Certificate shall not be reproduced in any form, except in full, without the written approval of the DOST CALABARZON RML</p>
        </div>
        <div style="position: absolute; top:712; font-size:9.5pt;">
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
        <div style="position: absolute; top:712; left:90%; font-size:9.5pt;">
            <p style='position: absolute; top:0;'>Page 1 of 2</p>
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
        <div style="position:relative; font-family: DejaVu Sans; top:-10">
            <img src="<?php echo $base64; ?>" alt="DOST LOGO" height='80px' style="position: absolute; top:12"> 
            <p style="position: absolute; top:0; left:80; font-size: 13px;">Republic of the Philippines</p>
            <p style="position: absolute; top:14; left:80; font-size: 13px; color:blue">DEPARTMENT OF SCIENCE AND TECHNOLOGY</p>
            <p style="position: absolute; top:30; font-size: 13px; left:80">CALABARZON</p>
            <p style="position: absolute; top:44; left:80; font-size: 15px; font-weight:bold">Regional Metrology Laboratory</p>
            <?php 
               if($DATAtempIn != []){
                    $TempInreso = floatval($DATAtempIn[0]['resUsed']);
                    $trueArray = [];
                    if($thermoData['PabLogo']=='true'){
                        for($i = 1; $i<count($DATAtempIn);$i++){
                            if($TempInreso <=0.1 && (round($DATAtempIn[$i]['CorrectedValue'],2)>=-20 && round($DATAtempIn[$i]['CorrectedValue'],2)<=70)){
                                array_push($trueArray,"true");
                            }else{
                                array_push($trueArray,"false");
                            } 
                        }
                        if((in_array("true", $trueArray))){
                            echo " <img src='". $base64PAB."' alt='PAB LOGO' height='80px' style='position: absolute; top:12; left:425'>";
                        }
                    }
               } else if($DATAtempoOut != []){
                    $TempInreso = floatval($DATAtempoOut[0]['resUsed']);
                    $trueArray = [];
                    if($thermoData['PabLogo']=='true'){
                        for($i = 1; $i<count($DATAtempoOut);$i++){
                            if($TempInreso <=0.1 && (round($DATAtempoOut[$i]['CorrectedValue'],2)>=-20 && round($DATAtempoOut[$i]['CorrectedValue'],2)<=70)){
                                array_push($trueArray,"true");
                            }else{
                                array_push($trueArray,"false");
                            } 
                        }
                        if((in_array("true", $trueArray))){
                            echo " <img src='". $base64PAB."' alt='PAB LOGO' height='80px' style='position: absolute; top:0; left:425'>";
                        }
                    }
                }else if($DATARHIn != []){
                            $TempInreso = floatval($DATARHIn[0]['resUsed']);
                            $trueArray = [];
                            if($thermoData['PabLogo']=='true'){
                                for($i = 1; $i<count($DATARHIn);$i++){
                                    if($TempInreso <=0.1 && (round($DATARHIn[$i]['CorrectedValue'],2)>=-20 && round($DATARHIn[$i]['CorrectedValue'],2)<=70)){
                                        array_push($trueArray,"true");
                                    }else{
                                        array_push($trueArray,"false");
                                    } 
                                }
                                if((in_array("true", $trueArray))){
                                    echo " <img src='". $base64PAB."' alt='PAB LOGO' height='80px' style='position: absolute; top:0; left:425'>";
                                }
                            }
                }else if($DATARHOut != []){
                    $TempInreso = floatval($DATARHOut[0]['resUsed']);
                    $trueArray = [];
                    if($thermoData['PabLogo']=='true'){
                        for($i = 1; $i<count($DATARHOut);$i++){
                            if($TempInreso <=0.1 && (round($DATARHOut[$i]['CorrectedValue'],2)>=-20 && round($DATARHOut[$i]['CorrectedValue'],2)<=70)){
                                array_push($trueArray,"true");
                            }else{
                                array_push($trueArray,"false");
                            } 
                        }
                        if((in_array("true", $trueArray))){
                            echo " <img src='". $base64PAB."' alt='PAB LOGO' height='80px' style='position: absolute; top:0; left:425'>";
                        }
                    }
                   }
               
               
                
                
            ?>   </div>
        <div style="position: absolute; top:60;">
            <hr>
        </div>
        <div style="position: absolute; top:62;">
            <hr>
        </div>
    <!-- HEADER -->
        <?php   
            if($thermoData['completion'] != 'For printing'||$imageDraft == 'true'){
                echo " 
                <div style='z-index: 999; position:absolute; top: 150px; margin-left: 40px;'>
                <img src='". $base64."'  style='margin-left: -40px; height: 700px; opacity: 0.1; position: absolute;'>
                <img src='". $base64IllusDraft."'  style='background-size: 100% 100%; opacity: 0.5; position: absolute;'>
                </div>";
            }
        ?> 
    <!-- BODY -->
        <div class='' style="position: absolute;top:70;">
            <div class='' style="position:relative;left:23%">
                <p style='font-weight:bold;font-size:19pt'>CALIBRATION CERTIFICATE</p>
            </div>
            <div class='' style="position:relative;margin-bottom:20">
                <table class='infoTable' style="border: 0px solid black;">
                    <thead>
                        <tr valign='top'>
                            <td style="white-space:nowrap;" style="font-size:9.5pt">Calibration Certificate No.</td>
                            <td style="font-size:9.5pt; padding-left: 45px;">:</td>
                            <td colspan="4" style="font-size:9.5pt;  padding-left: 5px;"><b><?php echo $thermoData['certificateNumber']?></b></td>
                        </tr>
                        <tr valign='top'>
                            <td style="font-size:9.5pt">Customer</td>
                            <td style="font-size:9.5pt;padding-left: 45px;">:</td>
                            <td colspan="4" style="font-size:9.5pt; padding-left: 5px;"><b><?php echo $thermoData['customer']?></b></td>
                        </tr>
                        <tr valign='top'>
                            <td style="font-size:9.5pt">Address</td>
                            <td style="font-size:9.5pt; padding-left: 45px;">:</td>
                            <td colspan="4" style="font-size:9.5pt; padding-left: 5px;"><b><?php echo $thermoData['address']?></b></td>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class='' style="position:relative;">
                <p style='font-size:9.5pt; font-weight:bold;'>Calibration Results</p>
            </div>
            <div style="position:relative; text-decoration:underline; font-size:9.5pt; <?php  if($DATAtempIn == []){echo"display:none";}?>" >
                <p>Temperature Indicator Test <?php if($page == 'inOutTemp' || $page == 'inOutRH'|| $page == 'all' ){echo"(IN)";}?></p> 
            </div>
            
            <div style="position:relative; left:-5%; font-size:9.5pt; <?php  if($DATAtempIn == []){echo"display:none";}?>">
                <table width="100%">
                    <thead style="">
                        <tr>
                            <th colspan=2>Standard Reading</th>
                            <th colspan=2>UUC Reading</th>
                            <th colspan=2>Correction</th>
                            <th colspan=2>Uncertainty</th>
                        </tr>    
                    </thead>
                    <tbody >
                     
                            <?php 
                                for($i = 0; $i<count($DATAtempIn);$i++){
                                    $tempInStandardDecimalPoint = seeDecimal($DATAtempIn[0]['STDRes']);
                                    $tempInUUCDecimalPoint = seeDecimal($DATAtempIn[0]['resUsed']);
                                    $tempInUUCDecimalPointCustom = $uucDecimalPointTempIn;
                                    $tempInDecimalPointCustom = $corrDecimalPointTempIn;
                                    $tempInRoundingUncertaintyFirst;
                                    $tempInRoundingUncertainty;
                                    $tempInRoundingCorrectionFirst;
                                    $tempInRoundingCorrection;
                                    $tdFront = '<th align="right" style="font-weight:normal">';
                                    $tdMid = "</th><th align='left' style='font-weight:normal'>";
                                    $tdEnd = '</th>';
                                    $tdIFront = '<th align="right"style="font-weight:normal"><i>';
                                    $tdIMid = "</i></th><th align='left' style='font-weight:normal'><i>";
                                    $tdIEnd = '</i></th>';
                                
                                    for($aIN = count($DATAtempIn)-1; $aIN<count($DATAtempIn);$aIN++){
                                        if($DATAtempIn[$aIN]['ExpandedUncertainty']<=0.76){
                                            $tempInRoundingUncertaintyFirst = 2;
                                        }else{
                                            $tempInRoundingUncertaintyFirst = seeDecimal(sigFig($DATAtempIn[$aIN]['ExpandedUncertainty'],2));
                                        };
                                        $tempInRoundingCorrectionFirst = seeDecimal(number_format($DATAtempIn[$aIN]['ExpandedUncertainty'],$tempInRoundingUncertaintyFirst,'.',''));
                                        if(floatval($DATAtempIn[$aIN]['resUsed']) >=0.01 && (round($DATAtempIn[$aIN]['id'],2)>=-20 && round($DATAtempIn[$aIN]['id'],2)<=70)){

                                            echo '<tr>'.$tdFront.number_format(round($DATAtempIn[$aIN]['CorrectedValue'],$tempInRoundingCorrectionFirst),$tempInStandardDecimalPoint,'.','').$tdMid."°C".$tdEnd;
                                            echo $tdFront.number_format($DATAtempIn[$aIN]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.','').$tdMid."°C".$tdEnd;
                                            echo $tdFront.number_format(number_format(round($DATAtempIn[$aIN]['CorrectedValue'],$tempInRoundingCorrectionFirst),$tempInStandardDecimalPoint,'.','') - number_format($DATAtempIn[$aIN]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.',''),$tempInDecimalPointCustom,'.','').$tdMid."°C".$tdEnd;
                                            if($DATAtempIn[$aIN]['ExpandedUncertainty']<=0.76){
                                                echo $tdFront."0.76".$tdMid."°C".$tdEnd;
                                            }else{
                                                echo $tdFront.sigFig($DATAtempIn[$aIN]['ExpandedUncertainty'],2).$tdMid."°C".$tdEnd.'</tr>';
                                            }
                                            
                                        }else{

                                            echo '<tr>'.$tdIFront.number_format(round($DATAtempIn[$aIN]['CorrectedValue'],$tempInRoundingCorrectionFirst),$tempInStandardDecimalPoint,'.','').$tdIMid."°C".$tdIEnd;
                                            echo $tdIFront.number_format($DATAtempIn[$aIN]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.','').$tdIMid."°C".$tdIEnd;
                                            echo $tdIFront.number_format(number_format(round($DATAtempIn[$aIN]['CorrectedValue'],$tempInRoundingCorrectionFirst),$tempInStandardDecimalPoint,'.','') - number_format($DATAtempIn[$aIN]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.',''),$tempInDecimalPointCustom,'.','').$tdIMid."°C".$tdIEnd;
                                            if($DATAtempIn[$aIN]['ExpandedUncertainty']<=0.76){
                                                echo $tdIFront."0.76".$tdIMid."°C".$tdIEnd;
                                            }else{
                                                echo $tdIFront.sigFig($DATAtempIn[$aIN]['ExpandedUncertainty'],2).$tdIMid.'°C'.$tdIEnd.'</tr>';
                                            }
                                        }
                                        for($xIn = 1; $xIn<(count($DATAtempIn) - 1);$xIn++){
                                            if($DATAtempIn[$xIn]['ExpandedUncertainty']<=0.76){
                                                $tempInRoundingUncertainty = 2;
                                            }else{
                                                $tempInRoundingUncertainty = seeDecimal(sigFig($DATAtempIn[$xIn]['ExpandedUncertainty'],2));
                                            };
                                            $tempInRoundingCorrection = seeDecimal(number_format($DATAtempIn[$xIn]['ExpandedUncertainty'],$tempInRoundingUncertainty,'.',''));
                                            if(floatval($DATAtempIn[$xIn]['resUsed']) >=0.1 && (round($DATAtempIn[$xIn]['id'],2)>=-20 && round($DATAtempIn[$xIn]['id'],2)<=70)){

                                                echo '<tr>'.$tdFront.number_format(round($DATAtempIn[$xIn]['CorrectedValue'],$tempInRoundingCorrection),$tempInStandardDecimalPoint,'.','').$tdMid."°C".$tdEnd;
                                                echo $tdFront.number_format($DATAtempIn[$xIn]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.','').$tdMid."°C".$tdEnd;
                                                echo $tdFront.number_format(number_format(round($DATAtempIn[$xIn]['CorrectedValue'],$tempInRoundingCorrectionFirst),$tempInStandardDecimalPoint,'.','') - number_format($DATAtempIn[$xIn]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.',''),$tempInDecimalPointCustom,'.','').$tdMid."°C".$tdEnd;
                                                if($DATAtempIn[$xIn]['ExpandedUncertainty']<=0.76){
                                                    echo $tdFront."0.76".$tdMid."°C".$tdEnd;
                                                }else{
                                                    echo $tdFront.sigFig($DATAtempIn[$xIn]['ExpandedUncertainty'],2).$tdMid."°C".$tdEnd.'</tr>';
                                                }
                                                
                                            }else{

                                                echo '<tr>'.$tdIFront.number_format(round($DATAtempIn[$xIn]['CorrectedValue'],$tempInRoundingCorrection),$tempInStandardDecimalPoint,'.','').$tdIMid."°C".$tdIEnd;
                                                echo $tdIFront.number_format($DATAtempIn[$xIn]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.','').$tdIMid."°C".$tdIEnd;
                                                echo $tdIFront.number_format(number_format(round($DATAtempIn[$xIn]['CorrectedValue'],$tempInRoundingCorrectionFirst),$tempInStandardDecimalPoint,'.','') - number_format($DATAtempIn[$xIn]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.',''),$tempInDecimalPointCustom,'.','').$tdIMid."°C".$tdIEnd;
                                                if($DATAtempIn[$xIn]['ExpandedUncertainty']<=0.76){
                                                    echo $tdIFront."0.76".$tdIMid."°C".$tdIEnd;
                                                }else{
                                                    echo $tdIFront.sigFig($DATAtempIn[$xIn]['ExpandedUncertainty'],2).' °C'.$tdIEnd.'</tr>';
                                                }
                                            }

                                        }
                                    }
                                    $i=count($DATAtempIn);
                                }
                                
                            ?>
                       
                       
                       
                    </tbody>
                </table>
            </div>

            <div style="position:relative; text-decoration:underline;  font-size:9.5pt; <?php  if($DATAtempoOut == [] || $page == 'default'|| $page == 'sensor'){echo"display:none";}?>">
                <p>Temperature Indicator Test <?php if($page == 'inOutTemp' || $page == 'inOutRH'){echo"(OUT)";} if($page == 'all' ){echo"(OUT) - Channel 1";}?></p> 
            </div>
            
            <div style="position:relative; left:-5%;  font-size:9.5pt; <?php  if($DATAtempoOut == [] || $page == 'default'|| $page == 'sensor'){echo"display:none";}?>">
                <table width="100%">
                    <thead style="">
                        <tr>
                            <th colspan=2>Standard Reading</th>
                            <th colspan=2>UUC Reading</th>
                            <th colspan=2>Correction</th>
                            <th colspan=2>Uncertainty</th>
                        </tr>    
                    </thead>
                    <tbody >
                            <?php 
                              for($i = 0; $i<count($DATAtempoOut);$i++){
                                $tempInStandardDecimalPoint = seeDecimal($DATAtempoOut[0]['STDRes']);
                                $tempInUUCDecimalPoint = seeDecimal($DATAtempoOut[0]['resUsed']);
                                $tempInUUCDecimalPointCustom = (int)$uucDecimalPointTempOut;
                                $tempInDecimalPointCustom = (int)$corrDecimalPointTempOut;
                                $tempInRoundingUncertaintyFirst;
                                $tempInRoundingUncertainty;
                                $tempInRoundingCorrectionFirst;
                                $tempInRoundingCorrection;
                                $tdFront = '<th align="right" style="font-weight:normal">';
                                $tdMid = "</th><th align='left' style='font-weight:normal'>";
                                $tdEnd = '</th>';
                                $tdIFront = '<th align="right"style="font-weight:normal"><i>';
                                $tdIMid = "</i></th><th align='left' style='font-weight:normal'><i>";
                                $tdIEnd = '</i></th>';
                                for($aIN = count($DATAtempoOut)-1; $aIN<count($DATAtempoOut);$aIN++){
                                    if($DATAtempoOut[$aIN]['ExpandedUncertainty']<=0.76){
                                        $tempInRoundingUncertaintyFirst = 2;
                                    }else{
                                        $tempInRoundingUncertaintyFirst = seeDecimal(sigFig($DATAtempoOut[$aIN]['ExpandedUncertainty'],2));
                                    };
                                    $tempInRoundingCorrectionFirst = seeDecimal(number_format($DATAtempoOut[$aIN]['ExpandedUncertainty'],$tempInRoundingUncertaintyFirst,'.',''));
                                    if(floatval($DATAtempoOut[$aIN]['resUsed']) >=0.01 && (round($DATAtempoOut[$aIN]['id'],2)>=-20 && round($DATAtempoOut[$aIN]['id'],2)<=70)){

                                        echo '<tr>'.$tdFront.number_format(round($DATAtempoOut[$aIN]['CorrectedValue'],$tempInRoundingCorrectionFirst),$tempInStandardDecimalPoint,'.','').$tdMid." °C".$tdEnd;
                                        echo $tdFront.number_format($DATAtempoOut[$aIN]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.','').$tdMid."°C".$tdEnd;
                                        echo $tdFront.number_format(number_format(round($DATAtempoOut[$aIN]['CorrectedValue'],$tempInRoundingCorrectionFirst),$tempInStandardDecimalPoint,'.','') - number_format($DATAtempoOut[$aIN]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.',''),$tempInDecimalPointCustom,'.','').$tdMid."°C".$tdEnd;
                                        if($DATAtempoOut[$aIN]['ExpandedUncertainty']<=0.76){
                                            echo $tdFront."0.76".$tdMid."°C".$tdEnd;
                                        }else{
                                            echo $tdFront.sigFig($DATAtempoOut[$aIN]['ExpandedUncertainty'],2).$tdMid.' °C'.$tdEnd.'</tr>';
                                        }
                                        
                                    }else{
                                        echo '<tr>'.$tdIFront.number_format(round($DATAtempoOut[$aIN]['CorrectedValue'],$tempInRoundingCorrectionFirst),$tempInStandardDecimalPoint,'.','').$tdIMid." °C".$tdIEnd;
                                        echo $tdIFront.number_format($DATAtempoOut[$aIN]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.','').$tdIMid."°C".$tdIEnd;
                                        echo $tdIFront.number_format(number_format(round($DATAtempoOut[$aIN]['CorrectedValue'],$tempInRoundingCorrectionFirst),$tempInStandardDecimalPoint,'.','') - number_format($DATAtempoOut[$aIN]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.',''),$tempInDecimalPointCustom,'.','').$tdIMid."°C".$tdIEnd;
                                        if($DATAtempoOut[$aIN]['ExpandedUncertainty']<=0.76){
                                            echo $tdIFront."0.76".$tdIMid."°C".$tdIEnd;
                                        }else{
                                            echo $tdIFront.sigFig($DATAtempoOut[$aIN]['ExpandedUncertainty'],2).$tdIMid.' °C'.$tdIEnd.'</tr>';
                                        }
                                    }
                                     for($xIn = 1; $xIn<(count($DATAtempoOut) - 1);$xIn++){
                                         if($DATAtempoOut[$xIn]['ExpandedUncertainty']<=0.76){
                                             $tempInRoundingUncertainty = 2;
                                         }else{
                                             $tempInRoundingUncertainty = seeDecimal(sigFig($DATAtempoOut[$xIn]['ExpandedUncertainty'],2));
                                         };
                                         $tempInRoundingCorrection = seeDecimal(number_format($DATAtempoOut[$xIn]['ExpandedUncertainty'],$tempInRoundingUncertainty,'.',''));
                                         if(floatval($DATAtempoOut[$xIn]['resUsed']) >=0.1 && (round($DATAtempoOut[$xIn]['id'],2)>=-20 && round($DATAtempoOut[$xIn]['id'],2)<=70)){

                                            echo '<tr>'.$tdFront.number_format(round($DATAtempoOut[$xIn]['CorrectedValue'],$tempInRoundingCorrectionFirst),$tempInStandardDecimalPoint,'.','').$tdMid." °C".$tdEnd;
                                            echo $tdFront.number_format($DATAtempoOut[$xIn]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.','').$tdMid."°C".$tdEnd;
                                            echo $tdFront.number_format(number_format(round($DATAtempoOut[$xIn]['CorrectedValue'],$tempInRoundingCorrectionFirst),$tempInStandardDecimalPoint,'.','') - number_format($DATAtempoOut[$xIn]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.',''),$tempInDecimalPointCustom,'.','').$tdMid."°C".$tdEnd;
                                            if($DATAtempoOut[$xIn]['ExpandedUncertainty']<=0.76){
                                                echo $tdFront."0.76".$tdMid."°C".$tdEnd;
                                            }else{
                                                echo $tdFront.sigFig($DATAtempoOut[$xIn]['ExpandedUncertainty'],2).$tdMid.' °C'.$tdEnd.'</tr>';
                                            }
                                            
                                        }else{
                                            echo '<tr>'.$tdIFront.number_format(round($DATAtempoOut[$xIn]['CorrectedValue'],$tempInRoundingCorrectionFirst),$tempInStandardDecimalPoint,'.','').$tdIMid." °C".$tdIEnd;
                                            echo $tdIFront.number_format($DATAtempoOut[$xIn]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.','').$tdIMid."°C".$tdIEnd;
                                            echo $tdIFront.number_format(number_format(round($DATAtempoOut[$xIn]['CorrectedValue'],$tempInRoundingCorrectionFirst),$tempInStandardDecimalPoint,'.','') - number_format($DATAtempoOut[$xIn]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.',''),$tempInDecimalPointCustom,'.','').$tdIMid."°C".$tdIEnd;
                                            if($DATAtempoOut[$xIn]['ExpandedUncertainty']<=0.76){
                                                echo $tdIFront."0.76".$tdIMid."°C".$tdIEnd;
                                            }else{
                                                echo $tdIFront.sigFig($DATAtempoOut[$xIn]['ExpandedUncertainty'],2).$tdIMid.' °C'.$tdIEnd.'</tr>';
                                            }
                                        }

                                     }
                                }
                                $i=count($DATAtempoOut);
                              }                                
                            ?>
                    </tbody>
                </table>
            </div>


            <div style="position:relative; text-decoration:underline; font-size:9.5pt;<?php if(($page == 'inOutTemp') || (count($DATARHIn)<=0) ){echo"display:none";}?>">
                <p>Humidity Indicator Test <?php if($page == 'all'){echo"(IN)";}?></p> 
            </div>
            
            <div style="position:relative; left:-5%; font-size:9.5pt;<?php if(($page == 'inOutTemp')  || (count($DATARHIn)<=0)){echo"display:none";}?>">
                <table width="100%">
                    <thead style="">
                        <tr>
                            <th colspan=2>Standard Reading</th>
                            <th colspan=2>UUC Reading</th>
                            <th colspan=2>Correction</th>
                            <th colspan=2>Uncertainty</th>
                        </tr>    
                    </thead>
                    <tbody >
                            <?php 
                                for($i = 0; $i<count($DATARHIn);$i++){
                                    $tempInStandardDecimalPoint = seeDecimal($DATARHIn[0]['STDRes']);
                                    $tempInUUCDecimalPoint = seeDecimal($DATARHIn[0]['resUsed']);
                                    $tempInUUCDecimalPointCustom = (int)$uucDecimalPointRhIn;
                                    $tempInDecimalPointCustom = (int)$corrDecimalPointRhIn;
                                    $tempInRoundingUncertaintyFirst;
                                    $tempInRoundingUncertainty;
                                    $tempInRoundingCorrectionFirst;
                                    $tempInRoundingCorrection;
                                    $tdFront = '<th align="right" style="font-weight:normal">';
                                    $tdMid = "</th><th align='left' style='font-weight:normal'>";
                                    $tdEnd = '</th>';
                                    $tdIFront = '<th align="right"style="font-weight:normal"><i>';
                                    $tdIMid = "</i></th><th align='left' style='font-weight:normal'><i>";
                                    $tdIEnd = '</i></th>';
                                    for($aIN = count($DATARHIn)-1; $aIN<count($DATARHIn);$aIN++){
                                        if($DATARHIn[$aIN]['ExpandedUncertainty']<=1.5){
                                            $tempInRoundingUncertaintyFirst = 2;
                                        }else{
                                            $tempInRoundingUncertaintyFirst = seeDecimal(sigFig($DATARHIn[$aIN]['ExpandedUncertainty'],2));
                                        };
                                        $tempInRoundingCorrectionFirst = seeDecimal(number_format($DATARHIn[$aIN]['ExpandedUncertainty'],$tempInRoundingUncertaintyFirst,'.',''));
                                        if(floatval($DATARHIn[$aIN]['resUsed']) >=1 && (round($DATARHIn[$aIN]['id'],2)>=40 && round($DATARHIn[$aIN]['id'],2)<=60)){

                                            echo '<tr>'.$tdFront.number_format(round($DATARHIn[$aIN]['CorrectedValue'],$tempInRoundingCorrectionFirst),$tempInStandardDecimalPoint,'.','').$tdMid." % RH".$tdEnd;
                                            echo $tdFront.number_format($DATARHIn[$aIN]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.','').$tdMid." % RH".$tdEnd;
                                            echo $tdFront.number_format(number_format(round($DATARHIn[$aIN]['CorrectedValue'],$tempInRoundingCorrectionFirst),$tempInStandardDecimalPoint,'.','') - number_format($DATARHIn[$aIN]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.',''),$tempInDecimalPointCustom,'.','').$tdMid." % RH".$tdEnd;
                                            if($DATARHIn[$aIN]['ExpandedUncertainty']<=1.5){
                                                echo $tdFront."1.5".$tdMid."% RH".$tdEnd;
                                            }else{
                                                echo $tdFront.sigFig($DATARHIn[$aIN]['ExpandedUncertainty'],2).$tdMid.' % RH'.$tdEnd.'</tr>';
                                            }
                                            
                                        }else{
                                            echo '<tr>'.$tdIFront.number_format(round($DATARHIn[$aIN]['CorrectedValue'],$tempInRoundingCorrectionFirst),$tempInStandardDecimalPoint,'.','').$tdIMid." % RH".$tdIEnd;
                                            echo $tdIFront.number_format($DATARHIn[$aIN]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.','').$tdIMid." % RH".$tdIEnd;
                                            echo $tdIFront.number_format(number_format(round($DATARHIn[$aIN]['CorrectedValue'],$tempInRoundingCorrectionFirst),$tempInStandardDecimalPoint,'.','') - number_format($DATARHIn[$aIN]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.',''),$tempInDecimalPointCustom,'.','').$tdIMid." % RH".$tdIEnd;
                                            if($DATARHIn[$aIN]['ExpandedUncertainty']<=1.5){
                                                echo $tdIFront."1.5".$tdIMid."% RH".$tdIEnd;
                                            }else{
                                                echo $tdIFront.sigFig($DATARHIn[$aIN]['ExpandedUncertainty'],2).$tdIMid.' % RH'.$tdIEnd.'</tr>';
                                            }
                                        }
                                        for($xIn = 1; $xIn<(count($DATARHIn) - 1);$xIn++){
                                            if($DATARHIn[$xIn]['ExpandedUncertainty']<=1.5){
                                                $tempInRoundingUncertainty = 2;
                                            }else{
                                                $tempInRoundingUncertainty = seeDecimal(sigFig($DATARHIn[$xIn]['ExpandedUncertainty'],2));
                                            };
                                            $tempInRoundingCorrection = seeDecimal(number_format($DATARHIn[$xIn]['ExpandedUncertainty'],$tempInRoundingUncertainty,'.',''));
                                            if(floatval($DATARHIn[$xIn]['resUsed']) >=1 && (round($DATARHIn[$xIn]['id'],2)>=40 && round($DATARHIn[$xIn]['id'],2)<=60)){

                                                echo '<tr>'.$tdFront.number_format(round($DATARHIn[$xIn]['CorrectedValue'],$tempInRoundingCorrectionFirst),$tempInStandardDecimalPoint,'.','').$tdMid." % RH".$tdEnd;
                                                echo $tdFront.number_format($DATARHIn[$xIn]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.','').$tdMid." % RH".$tdEnd;
                                                echo $tdFront.number_format(number_format(round($DATARHIn[$xIn]['CorrectedValue'],$tempInRoundingCorrectionFirst),$tempInStandardDecimalPoint,'.','') - number_format($DATARHIn[$xIn]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.',''),$tempInDecimalPointCustom,'.','').$tdMid." % RH".$tdEnd;
                                                if($DATARHIn[$xIn]['ExpandedUncertainty']<=1.5){
                                                    echo $tdFront."1.5".$tdMid."% RH".$tdEnd;
                                                }else{
                                                    echo $tdFront.sigFig($DATARHIn[$xIn]['ExpandedUncertainty'],2).$tdMid.' % RH'.$tdEnd.'</tr>';
                                                }
                                                
                                            }else{
                                                echo '<tr>'.$tdIFront.number_format(round($DATARHIn[$xIn]['CorrectedValue'],$tempInRoundingCorrectionFirst),$tempInStandardDecimalPoint,'.','').$tdIMid." % RH".$tdIEnd;
                                            echo $tdIFront.number_format($DATARHIn[$xIn]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.','').$tdIMid." % RH".$tdIEnd;
                                            echo $tdIFront.number_format(number_format(round($DATARHIn[$xIn]['CorrectedValue'],$tempInRoundingCorrectionFirst),$tempInStandardDecimalPoint,'.','') - number_format($DATARHIn[$xIn]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.',''),$tempInDecimalPointCustom,'.','').$tdIMid." % RH".$tdIEnd;
                                                if($DATARHIn[$xIn]['ExpandedUncertainty']<=1.5){
                                                    echo $tdIFront."1.5".$tdIMid."% RH".$tdIEnd;
                                                }else{
                                                    echo $tdIFront.sigFig($DATARHIn[$xIn]['ExpandedUncertainty'],2).$tdIMid.' % RH'.$tdIEnd.'</tr>';
                                                }
                                            }

                                        }
                                    }
                                    $i=count($DATARHIn);
                                }
                            ?>
                    </tbody> 
                </table>
            </div>

            <div style="position:relative; text-decoration:underline;  font-size:9.5pt; <?php  if($DATARHOut == [] ||$page != 'all'){echo"display:none";}?>">
                <p>Humidity Indicator Test (OUT) - Channel 1</p> 
            </div>
            
            <div style="position:relative; left:-5%; font-size:9.5pt;<?php  if($DATARHOut == [] ||$page != 'all'){echo"display:none";}?>">
                <table width="100%">
                    <thead style="<?php  if($DATARHOut == [] ){echo"display:none";}?>">
                        <tr>
                            <th colspan=2>Standard Reading</th>
                            <th colspan=2>UUC Reading</th>
                            <th colspan=2>Correction</th>
                            <th colspan=2>Uncertainty</th>
                        </tr>    
                    </thead>
                    <tbody >
                            <?php 
                                for($i = 0; $i<count($DATARHOut);$i++){
                                    $tempInStandardDecimalPoint = seeDecimal($DATARHOut[0]['STDRes']);
                                    $tempInUUCDecimalPoint = seeDecimal($DATARHOut[0]['resUsed']);
                                    $tempInUUCDecimalPointCustom = (int)$uucDecimalPointRhOut;
                                    $tempInDecimalPointCustom = (int)$corrDecimalPointRhOut;
                                    
                                    $tempInRoundingUncertaintyFirst;
                                    $tempInRoundingUncertainty;
                                    $tempInRoundingCorrectionFirst;
                                    $tempInRoundingCorrection;
                                    $tdFront = '<th align="right" style="font-weight:normal">';
                                    $tdMid = "</th><th align='left' style='font-weight:normal'>";
                                    $tdEnd = '</th>';
                                    $tdIFront = '<th align="right"style="font-weight:normal"><i>';
                                    $tdIMid = "</i></th><th align='left' style='font-weight:normal'><i>";
                                    $tdIEnd = '</i></th>';
                                    for($aIN = count($DATARHOut)-1; $aIN<count($DATARHOut);$aIN++){
                                        if($DATARHOut[$aIN]['ExpandedUncertainty']<=1.5){
                                            $tempInRoundingUncertaintyFirst = 2;
                                        }else{
                                            $tempInRoundingUncertaintyFirst = seeDecimal(sigFig($DATARHOut[$aIN]['ExpandedUncertainty'],2));
                                        };
                                        $tempInRoundingCorrectionFirst = seeDecimal(number_format($DATARHOut[$aIN]['ExpandedUncertainty'],$tempInRoundingUncertaintyFirst,'.',''));
                                        if(floatval($DATARHOut[$aIN]['resUsed']) >=1 && (round($DATARHOut[$aIN]['id'],2)>=40 && round($DATARHOut[$aIN]['id'],2)<=60)){

                                            echo '<tr>'.$tdFront.number_format(round($DATARHOut[$aIN]['CorrectedValue'],$tempInRoundingCorrectionFirst),$tempInStandardDecimalPoint,'.','').$tdMid." % RH".$tdEnd;
                                            echo $tdFront.number_format($DATARHOut[$aIN]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.','').$tdMid."°C".$tdEnd;
                                            echo $tdFront.number_format(number_format(round($DATARHOut[$aIN]['CorrectedValue'],$tempInRoundingCorrectionFirst),$tempInStandardDecimalPoint,'.','') - number_format($DATARHOut[$aIN]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.',''),$tempInDecimalPointCustom,'.','').$tdMid."°C".$tdEnd;
                                            if($DATARHOut[$aIN]['ExpandedUncertainty']<=1.5){
                                                echo $tdFront."1.5 %".$tdMid."RH".$tdEnd;
                                            }else{
                                                echo $tdFront.sigFig($DATARHOut[$aIN]['ExpandedUncertainty'],2).$tdMid.' % RH'.$tdEnd.'</tr>';
                                            }
                                            
                                        }else{
                                            echo '<tr>'.$tdIFront.number_format(round($DATARHOut[$aIN]['CorrectedValue'],$tempInRoundingCorrectionFirst),$tempInStandardDecimalPoint,'.','').$tdIMid." % RH".$tdIEnd;
                                            echo $tdIFront.number_format($DATARHOut[$aIN]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.','').$tdIMid."°C".$tdIEnd;
                                            echo $tdIFront.number_format(number_format(round($DATARHOut[$aIN]['CorrectedValue'],$tempInRoundingCorrectionFirst),$tempInStandardDecimalPoint,'.','') - number_format($DATARHOut[$aIN]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.',''),$tempInDecimalPointCustom,'.','').$tdIMid."°C".$tdIEnd;
                                            if($DATARHOut[$aIN]['ExpandedUncertainty']<=1.5){
                                                echo $tdIFront."1.5".$tdIMid."% RH".$tdIEnd;
                                            }else{
                                                echo $tdIFront.sigFig($DATARHOut[$aIN]['ExpandedUncertainty'],2).$tdIMid.' % RH'.$tdIEnd.'</tr>';
                                            }
                                        }
                                        for($xIn = 1; $xIn<(count($DATARHOut) - 1);$xIn++){
                                            if($DATARHOut[$xIn]['ExpandedUncertainty']<=1.5){
                                                $tempInRoundingUncertainty = 2;
                                            }else{
                                                $tempInRoundingUncertainty = seeDecimal(sigFig($DATARHOut[$xIn]['ExpandedUncertainty'],2));
                                            };
                                            $tempInRoundingCorrection = seeDecimal(number_format($DATARHOut[$xIn]['ExpandedUncertainty'],$tempInRoundingUncertainty,'.',''));
                                            if(floatval($DATARHOut[$xIn]['resUsed']) >=1 && (round($DATARHOut[$xIn]['id'],2)>=40 && round($DATARHOut[$xIn]['id'],2)<=60)){
                                                echo '<tr>'.$tdFront.number_format(round($DATARHOut[$xIn]['CorrectedValue'],$tempInRoundingCorrectionFirst),$tempInStandardDecimalPoint,'.','').$tdMid." % RH".$tdEnd;
                                                echo $tdFront.number_format($DATARHOut[$xIn]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.','').$tdMid."°C".$tdEnd;
                                                echo $tdFront.number_format(number_format(round($DATARHOut[$xIn]['CorrectedValue'],$tempInRoundingCorrectionFirst),$tempInStandardDecimalPoint,'.','') - number_format($DATARHOut[$xIn]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.',''),$tempInDecimalPointCustom,'.','').$tdMid."°C".$tdEnd;
                                                if($DATARHOut[$xIn]['ExpandedUncertainty']<=1.5){
                                                    echo $tdFront."1.5".$tdMid."% RH".$tdEnd;
                                                }else{
                                                    echo $tdFront.sigFig($DATARHOut[$xIn]['ExpandedUncertainty'],2).$tdMid.' % RH'.$tdEnd.'</tr>';
                                                }
                                                
                                            }else{
                                                echo '<tr>'.$tdIFront.number_format(round($DATARHOut[$xIn]['CorrectedValue'],$tempInRoundingCorrectionFirst),$tempInStandardDecimalPoint,'.','')." % RH".$tdIEnd;
                                                echo $tdIFront.number_format($DATARHOut[$xIn]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.','').$tdIMid."°C".$tdIEnd;
                                                echo $tdIFront.number_format(number_format(round($DATARHOut[$xIn]['CorrectedValue'],$tempInRoundingCorrectionFirst),$tempInStandardDecimalPoint,'.','') - number_format($DATARHOut[$xIn]['UUCtrialAverage'],$tempInUUCDecimalPointCustom,'.',''),$tempInDecimalPointCustom,'.','').$tdIMid."°C".$tdIEnd;
                                                if($DATARHOut[$xIn]['ExpandedUncertainty']<=1.5){
                                                    echo $tdIFront."1.5 % RH".$tdIEnd;
                                                }else{
                                                    echo $tdIFront.sigFig($DATARHOut[$xIn]['ExpandedUncertainty'],2).' % RH'.$tdIEnd.'</tr>';
                                                }
                                            }

                                        }
                                    }
                                    $i=count($DATARHOut);
                                }
                            ?>
                    </tbody>
                </table>
            </div>  
            
        </div>
    <!-- BODY -->  
   
    <!-- FOOTER -->        
        <div style="position: absolute; top:700; left:8.9%; font-size:8;">
            <p style='position: absolute; top:0; font-style: italic;'>This Certificate shall not be reproduced in any form, except in full, without the written approval of the DOST CALABARZON RML</p>
        </div>
        <div style="position: absolute; top:712; font-size:9.5pt;">
        <p style='position: absolute; top:0; '>Date of Issue: 
            <?php 
            if(($datePrev)==TRUE){
                 $date=date_create($datePrev);
                echo date_format($date,"d F Y");
            }else{
                date_default_timezone_set('Asia/Manila');
                $today = date("d F Y");  echo $today;
            }
             ?></p>
        </div>
        <div style="position: absolute; top:712; left:90%; font-size:9.5pt;">
            <p style='position: absolute; top:0;'>Page 2 of 2</p>
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
    <!-- FOOTER -->  
    <!-- PAGE 3 / PAGE BREAK -->
        <!-- <div style='page-break-after: always;'></div> -->
    <!-- PAGE 3 / PAGE BREAK-->
    </div>     
</body>





</html>   