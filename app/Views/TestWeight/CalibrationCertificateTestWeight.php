<?php 
    ini_set('memory_limit', '1024M'); // or you could use 1G

    use App\Models\TestWeightPABModel;
    use App\Models\TestWeightStandardValuesModel;
    use App\Models\TestWeightStandardDetailsModel;
    use App\Models\ElectModel_2;
    use App\Models\ElectModel_3;
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

    $allData = json_decode($testWeightData['allData'],true);
    $PAB = new TestWeightPABModel();
    $Standard = new ElectModel_3();
    $standardDetailsModel = new ElectModel_2();
    $MPE = $MPEData;
    $PABData[] = $PAB->findAll();
    $standardDetailsValue = $standardDetailsModel->findAll();
    $arrayOfClass = [];
    for ($q=0; $q < count($PABData[0]); $q++) { 
        if(makeSubToNumber($PABData[0][$q]['class']) == makeSubToNumber($testWeightData['approxClass'])){
            array_push($arrayOfClass,$PABData[0][$q]);
        }
    }

    $isBouyancy = $bouyancy;
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
    border-width: 2px;
    border-color: #c7c7c7;
    border-style: solid;
    color: #000000;
    }

    table.GeneratedTable td, table.GeneratedTable th {
    border-width: 2px;
    border-color: #c7c7c7;
    border-style: solid;
    padding: 2px;
    text-align:center;
    }

    table.GeneratedTable thead {
    background-color: #ffffff;
    }
   </style>

<style>
table, th, td {
  border: 0px solid black;
  /*text-align:center; */
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
</style>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RML ++</title>	
</head>

<?php
    function getCMCOfNonPAB($approxClass, $unit, $value, $MPE){
        $approxClassNumber = makeSubToNumber($approxClass);
        $find = array("E2","F1","F2","M1","M2");
        $replace = array("E1","E2","F1","F2","M1");
        $newClass = str_replace($find,$replace,$approxClassNumber);
        $arrMPEClass = [];
        foreach ($MPE as $key => $val) {
            if ($val['class'] == $newClass) {
                if ($val['nominalUnit'] == $unit) {
                    if ($val['nominalValue'] == $value) {
                        array_push($arrMPEClass, $val);
                    }
                }
            }   
        }
        return $arrMPEClass[0]['MPE'];

    }

    function TrimTrailingZeroes($nbr) {
        return strpos($nbr,'.')!==false ? rtrim(rtrim($nbr,'0'),'.') : $nbr;
    } ;

    //$readabilityDecimalPoint = strlen(substr(strrchr(TrimTrailingZeroes($testWeightData['readability']), "."), 1));
    
    function sigFig($value, $digits)
    {
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
            return $answer;
        }
    }
    //count how many decimal places
    function seeDecimal($value){
        if ((int)$value === $value){
            return 0;
        }
        else if (! is_numeric($value)){
            return false;
        }
    
        return strlen(substr(strrchr($value, "."), 1));
    }
    function searchInArray($class,$serialNumber,$value,$unit, $array, $MPEarray) {
        
        foreach ($array as $key => $val) {
            if (makeSubToNumber($val['class']) == $class) {
                if ($val['serialNumber'] == $serialNumber) {
                    if ($val['nominalValue'] == $value) {
                        if ($val['nominalUnit'] == $unit) {
                            foreach ($MPEarray as $MPEKey => $MPEval) {
                                if (makeSubToNumber($MPEval['class']) == $class) {
                                    if ($MPEval['nominalValue'] == $value) {
                                        if ($MPEval['nominalUnit'] == $unit) {
                                            return $MPEval['MPE'];
                                        }  
                                    }   
                                }
                            }
                        }  
                    }  
                }   
            }
        }
        return $class.' '.$serialNumber.' '.$value.' '.$unit;
    }

    function searchInArrayDetails($serialNumber, $array) {
        foreach ($array as $key => $val) {
                if ($val['serialNumber'] == $serialNumber) {
                    return $val;
                }   
        }
        return null;
    }

    function searchInArrayDynamic($searchWhat, $searchIn, $array) {
        foreach ($array as $key => $val) {
                if ($val[$searchIn] == $searchWhat) {
                    return $val;
                }   
        }
        return null;
    }

    function makeSubToNumber($value){
        // ₀ ₁ ₂ ₃ ₄ ₅ ₆ ₇ ₈ ₉
        $find = array("₁","₂","₃","₄","₅","₆","₇","₈","₉","₀");
        $replace = array("1","2","3","4","5","6","7","8","9","0");
        return str_replace($find,$replace,$value);
    }

    $sn = $testWeightData['weight']; 
	$SNARRAY;
	if($sn == null){
		$sn = '0,0';
		$SNARRAY = explode(",", $sn);
	}else{
		$SNARRAY = explode(",", $sn);
	}

?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@3.4.1/dist/chart.min.js "></script> 

<body>
    <div class="container">
    <!-- HEADER --> 
        <div style="position:relative; font-family: DejaVu Sans;">
            <img src="<?php echo $base64; ?>" alt="DOST LOGO" height='80px' style="position: absolute; top:0"> 
            <p style="position: absolute; top:-11; left:80; font-size: 13px;">Republic of the Philippines</p>
            <p style="position: absolute; top:5; left:80; font-size: 13px; color:blue">DEPARTMENT OF SCIENCE AND TECHNOLOGY</p>
            <p style="position: absolute; top:20; font-size: 13px; left:80">CALABARZON</p>
            <p style="position: absolute; top:36; left:80; font-size: 15px; font-weight:bold">Regional Metrology Laboratory</p>
            <?php if($testWeightData['PabLogo']=='true'){
                echo " <img src='". $base64PAB."' alt='PAB LOGO' height='80px' style='position: absolute; top:0; left:425'>";
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
        <div style="position: absolute; top:90; left:23%">
            <p style='font-weight:bold;font-size:20'>CALIBRATION CERTIFICATE</p>
        </div>
        <div style="position: absolute; top:150; left:5%; font-size:9">
            <p style='position: absolute;'>Calibration Certificate No.</p>
            <p style='position: absolute; top:15'>Customer</p>
            <p style='position: absolute; top:30'>Address</p>
        </div>
        <div style="position: absolute; top:150; left:25%; font-size:9">
            <p style='position: absolute;'>: <b><?php echo $testWeightData['certificateNumber']?></b></p>
            <p style='position: absolute; top:15'>: <b><?php echo $testWeightData['customer']?></b></p>
            <p style='position: absolute; top:30'>: <b><?php echo $testWeightData['address']?></b></p>
        </div>
        <div  style="position: absolute; top:200; left:5%; font-size:9">
            <p style='position: absolute; top:15'>Equipment Description</p>
            <p style='position: absolute; top:30'>Manufacturer</p>
            <p style='position: absolute; top:45'>Class/Model No.</p>
            <p style='position: absolute; top:60'>Serial No.</p>
            <p style='position: absolute; top:75'>Equipment ID</p>
        </div>
        <div  style="position: absolute; top:200; left:25%; font-size:9">
            <p style='position: absolute; top:15'>: <?php echo $testWeightData['equipmentDescription']?></p>
            <p style='position: absolute; top:30'>: <?php echo $testWeightData['manufacturer']?></p>
            <p style='position: absolute; top:45'>: <?php echo $testWeightData['Class']?></p>
            <p style='position: absolute; top:60'>: <?php echo $testWeightData['serialNumber']?></p>
            <p style='position: absolute; top:75'>: <?php echo $testWeightData['equipmentID']?></p>
        </div>
        <div  style="position: absolute; top:200; left:50%; font-size:9">
            <p style='position: absolute; top:15'>Date Received</p>
            <p style='position: absolute; top:30'>Date Calibrated</p>
            <p style='position: absolute; top:45'>Recommended Due Date</p>
            <p style='position: absolute; top:60'>Place of Calibration</p>
            <p style='position: absolute; top:75'>Ambient Temperature</p>
            <p style='position: absolute; top:90'>Relative Humidity</p>
        </div>
        <div style="position: absolute; top:200; left:75%; font-size:9">
        <?php 
                $date = $testWeightData['dateReceived']; 
                $mysql_date = date('Y-m-d G:i:s', strtotime($date));
                $date2 = $testWeightData['dateCalibrated']; 
                $mysql_date2 = date('Y-m-d G:i:s', strtotime($date2));
                $date3 = $testWeightData['recommendedDueDate']; 
                $mysql_date3 = date('Y-m-d G:i:s', strtotime($date3));
            ?>
            <p style='position: absolute; top:15'>: <?php echo date('d F Y', strtotime($mysql_date));?></p>
            <p style='position: absolute; top:30'>: <?php echo date('d F Y', strtotime($mysql_date2));?></p>
            <p style='position: absolute; top:45'>: <?php echo date('d F Y', strtotime($mysql_date3));?></p>
            <p style='position: absolute; top:60'>: <?php echo $testWeightData['placeOfCalibration']?></p>
            <p style='position: absolute; top:75'>: 23 ± 3 °C</p>
            <p style='position: absolute; top:90'>: 55 ± 15 % RH</p>
        </div>
    <!-- Informations -->
        <?php   
            if($testWeightData['completion'] != 'For printing'||$imageDraft == 'true'){
                echo " 
                <div style='z-index: 999; position:absolute; top: 150px; margin-left: 40px;'>
                <img src='". $base64."'  style='margin-left: -40px; height: 700px; opacity: 0.1; position: absolute;'>
                <img src='". $base64IllusDraft."'  style='background-size: 100% 100%; opacity: 0.5; position: absolute;'>
                </div>";
            }
        ?> 
    <!-- Calibration Procedure and Traceability -->
        <div style="position: absolute; top:335; left:5%; font-size:10;">
            <p style='position: absolute; top:0;font-weight:bold;text-decoration: underline;'>Calibration Procedure and Traceability</p>
            <p style='position: absolute; top:15; max-width:95%'>
                <?php
                    if($testWeightData['settingCalibrationProcedureAndTraceability'] != null || $testWeightData['calibrationProcedureAndTraceabilityNot'] != null){
                        if($isBouyancy == 'true'){
                            echo  $testWeightData['settingCalibrationProcedureAndTraceability'];
                        }else{
                            echo $testWeightData['calibrationProcedureAndTraceabilityNot'];
                        }
                        
                    }else{
                        if($isBouyancy == 'true'){
                            echo  $placeholder[0]['module3CalibrationProcedureAndTraceability'];
                        }else{
                            echo  $placeholder[0]['module3CalibrationProcedureAndTraceability2'];
                        }
                        
                    }
                ?>
            </p>        
        </div>
        <div style="position: relative; top:395; left:10%; font-size:10;">
            <div style="position: relative; left:-5%; font-size:10; border:solid 0px">
                <div style='position: relative; top:0;'>
                    <p style='position: relative; top:0;text-decoration: underline;'><b>Standard Used</b></p>
                    <div style='position: relative; top:0;' >
                    <?php 

                    $search = array("₀", "₁", "₂", "₃", "₄", "₅", "₆", "₇", "₈", "₉","0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
                    $replace = array("<sub>0</sub>", "<sub>1</sub>", "<sub style='font-size:10px;'>2</sub>", "<sub>3</sub>","<sub>4</sub>", "<sub>5</sub>","<sub>6</sub>", "<sub>7</sub>","<sub>8</sub>", "<sub>9</sub>","<sub>0</sub>", "<sub>1</sub>", "<sub style='font-size:10px;'>2</sub>", "<sub>3</sub>","<sub>4</sub>", "<sub>5</sub>","<sub>6</sub>", "<sub>7</sub>","<sub>8</sub>", "<sub>9</sub>",);
                    // echo str_replace($search,$replace,$classString);
                    for($i = 0; $i < count($SNARRAY);$i++){
                        $arraySearchedDetailsA = searchInArrayDetails($SNARRAY[$i],$standardDetailsValue);
                        try {
                            echo "<p style='margin:0;'>".str_replace($search,$replace,$arraySearchedDetailsA['type'])." </p>";
                        } catch (\Throwable $th) {
                            echo "<p style='margin:0;'>".$th." </p>";
                        }
                        
                    }
                       
                        // for ($i=0; $i < count($SNARRAY) ; $i++) { 
                        //     $arraySearchedDetailsA = searchInArrayDetails($SNARRAY[$i],$standardDetailsValue);
                        //     echo "<p style='margin:0;'>".$arraySearchedDetailsA['type']."</p>";
                        // }
                            
                    ?>
                    </div>
                </div>
                
                <div style='position: absolute; top:0;'>
                    <p style='position: relative; top:0;left:35%;text-decoration: underline;'><b>Calibration Certificate No.</b></p>
                    <div style='position: relative;left:37%;'>
                    <?php for ($i=0; $i < count($SNARRAY) ; $i++) { 
                            $arraySearchedDetailsB = searchInArrayDetails($SNARRAY[$i],$standardDetailsValue);
                            try {
                                echo "<p style='margin:0;'>".$arraySearchedDetailsB['certificateNumber']."</p>";
                            } catch (\Throwable $th) {
                                echo "<p style='margin:0;'>".$th." </p>";
                            }
                            
                        }
                        ?>
                    </div>
                </div>
                <div style='position: absolute; top:0;'>
                    <p style='position: relative; top:0;left:70%;text-decoration: underline;'><b>Issuing Laboratory</b></p>
                    <div style='position: relative;left:70%;'>
                    <?php for ($i=0; $i < count($SNARRAY) ; $i++) { 
                            $arraySearchedDetailsB = searchInArrayDetails($SNARRAY[$i],$standardDetailsValue);
                            try {
                                echo "<p style='margin:0;'>".$arraySearchedDetailsB['calibrationProvider']."</p>";
                            } catch (\Throwable $th) {
                                echo "<p style='margin:0;'>".$th." </p>";
                            }
                            
                        }
                        ?>
                    </div> 
                </div>
            </div>
    <!-- Calibration Procedure and Traceability -->
    
    <!-- Calibration Results -->   
    
            <div style="position: relative; left:-5%; font-size:10;height:5%">
                <p style='position: absolute; top:0;font-weight:bold;text-decoration: underline;'>Calibration Results</p>
                <p style='position: absolute; top:5; max-width:95%'>
                    <?php
                        if($testWeightData['settingCalibrationResults'] != null){
                            echo $testWeightData['settingCalibrationResults'];
                        }else{
                            echo  $placeholder[0]['module3CalibrationResults'];
                        }
                    ?>
                </p>
            </div>
    <!-- Calibration Results -->

   
    <!-- Uncertainty of Measurement -->      
             <div style="position: relative; left:-5%; font-size:10;height:8% ">
                <p style='position: absolute; top:0;font-weight:bold;text-decoration: underline;'>Uncertainty of Measurement</p>
                <p style='position: absolute; top:5; max-width:95%'>
                    <?php
                        if($testWeightData['settingUncertaintyOfMeasurement'] != null){
                            echo $testWeightData['settingUncertaintyOfMeasurement'];
                        }else{
                            echo  $placeholder[0]['module3UncertaintyOfMeasurement'];
                        }
                    ?>
                </p>
            </div>   
    <!-- Uncertainty of Measurement -->    
    <!-- Remarks -->
            <div style="position: relative; left:-5%; font-size:10; ">
                <p style='position: absolute; top:0;font-weight:bold;text-decoration: underline;'>Remarks:</p> <br>
               

                <table style="border: 0px; width: 90%; font-size:9.5pt;margin-top:-15;">
                        <tbody>
                            <?php
                                $remarks;
                                if($testWeightData['settingRemarks1'] != null){
                                    $remarks = $testWeightData['settingRemarks1'];
                                }else{
                                    $remarks = $placeholder['module2Remarks'];
                                } 
                                $remarksSeparated = explode("(splitHere)", $remarks);
                                for ($i=0; $i < count($remarksSeparated); $i++) { 
                                    echo "<tr valign='top' style='font-size:9.5pt;'><td>".($i+1).". "."</td><td>".$remarksSeparated[$i]."</td></tr>";
                                }
                            ?>
                        </tbody>
                    </table> 
             </div>      
            
            <!--p style='position: absolute; top:5; max-width:95%;'>1. <?#=$testWeightData['settingRemarks1']?> <br>2. <?#=$testWeightData['settingRemarks2']?> <br>3. <?#=$testWeightData['settingRemarks3']?><br>4. <?#=$testWeightData['settingRemarks4']?><br><?php# if($testWeightData['remarks'] != null){ echo "5. ".$testWeightData['remarks'];}?><br></p-->
          
    <!-- Remarks -->
        </div>
    
    <!-- SIGNATURE -->     
        <div style="position: absolute; top:660; left:10%; font-size:10;">
            <p style='position: absolute; top:0;text-decoration: underline;'> <?php echo $testWeightData['calibratedBy'];?></p>
            <p style='position: absolute; top:15;'>Calibration Officer</p>
        </div>
        <div style="position: absolute; top:660; left:70%; font-size:10;">
            <p style='position: absolute; top:0;text-decoration: underline;'>Engr. Rogerson A. Esmeria</p>
            <p style='position: absolute; top:15;'>Laboratory Head</p>
        </div>
    <!-- SIGNATURE -->     
    <!-- FOOTER -->        
        <div style="position: absolute; top:700; left:8.7%; font-size:8;">
            <p style='position: absolute; top:0; font-style: italic;'>This Certificate shall not be reproduced in any form, except in full, without the written approval of the DOST CALABARZON RML</p>
        </div>
        <div style="position: absolute; top:712; font-size:10;">
            <p style='position: absolute; top:0;'>Date of Issue:
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
        <div style="position:relative; font-family: DejaVu Sans;">
            <img src="<?php echo $base64; ?>" alt="DOST LOGO" height='80px' style="position: absolute; top:0"> 
            <p style="position: absolute; top:-11; left:80; font-size: 13px;">Republic of the Philippines</p>
            <p style="position: absolute; top:5; left:80; font-size: 13px; color:blue">DEPARTMENT OF SCIENCE AND TECHNOLOGY</p>
            <p style="position: absolute; top:20; font-size: 13px; left:80">CALABARZON</p>
            <p style="position: absolute; top:36; left:80; font-size: 15px; font-weight:bold">Regional Metrology Laboratory</p>
            <?php if($testWeightData['PabLogo']=='true'){
                echo " <img src='". $base64PAB."' alt='PAB LOGO' height='80px' style='position: absolute; top:0; left:425'>";
                }
            ?>        </div>
            <div style="position: absolute; top:60;">
                <hr>
            </div>
            <div style="position: absolute; top:62;">
                <hr>
            </div>
    <!-- HEADER -->
    <!-- INFORMATIONS -->
        <div style="position: absolute; top:90; left:23%">
            <p style='font-weight:bold;font-size:20'>CALIBRATION CERTIFICATE</p>
        </div>
        <div style="position: absolute; top:150; left:5%; font-size:9">
            <p style='position: absolute;'>Calibration Certificate No.</p>
            <p style='position: absolute; top:15'>Customer</p>
            <p style='position: absolute; top:30'>Address</p>
        </div>
        <div style="position: absolute; top:150; left:25%; font-size:9">
            <p style='position: absolute;'>: <b><?php echo $testWeightData['certificateNumber']?></b></p>
            <p style='position: absolute; top:15'>: <b><?php echo $testWeightData['customer']?></b></p>
            <p style='position: absolute; top:30'>: <b><?php echo $testWeightData['address']?></b></p>
            <?php //echo var_dump($allData);?>
        </div>
    <!-- INFORMATIONS -->

        <?php   
            if($testWeightData['completion'] != 'For printing'||$imageDraft == 'true'){
                echo " 
                <div style='z-index: 999; position:absolute; top: 150px; margin-left: 40px;'>
                <img src='". $base64."'  style='margin-left: -40px; height: 700px; opacity: 0.1; position: absolute;'>
                <img src='". $base64IllusDraft."'  style='background-size: 100% 100%; opacity: 0.5; position: absolute;'>
                </div>";
            }
        ?> 
    <!-- CALIBRATION RESULTS --> 
        <div id="calibrationResults" style="position: absolute; top:225; left:5%; font-size:10;border-width:0;border-style:solid;">
            <div style="position:relative; font-weight:bold; margin-bottom:10">
                <p>Calibration Results</p> 
            </div>
            <div style="position:relative;  font-weight:normal;">
                <table width="100%" style="text-align:center;">
                    <thead>
                    <tr>
                        <th colspan="2">Nominal Value</th>
                        <th></th>
                        <th><?php if( str_contains($testWeightData['serialNumber'], 'See measurement result') ){echo'Serial Number';}else{echo 'Marking';}?></th>
                        <th></th>
                        <th colspan="1">Conventional Mass</th>
                        <th></th>
                        <th colspan="2">Uncertainty</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        for($i = 1; $i<=count($allData); $i++){
                    ?>
                    <tr>
                        <td style="text-align:right"><?= $allData["Table".$i]['SampleNominalValue']['value']?></td>
                        <td style="text-align:left"><?= $allData["Table".$i]['SampleNominalUnit']['value']?></td>
                        <td></td>
                        <td><?= $allData["Table".$i]['SampleMarking']['value']?></td>
                        <td></td>
                        <td style="text-align:center"><?= $allData["Table".$i]['SampleNominalValue']['value']?> <?= $allData["Table".$i]['SampleNominalUnit']['value']?> <?php
                         if($allData["Table".$i]['SampleNominalUnit']['value'] == 'mg'){
                            if(floatval($allData["Table".$i]['deviation']['value'])<0){
                                echo "-";
                            }else{
                                echo "+";
                            }
                        }
                        if($allData["Table".$i]['SampleNominalUnit']['value'] == 'g'){
                            if((floatval($allData["Table".$i]['deviation']['value'])*1000)<0){
                                echo "-";
                            }else{
                                echo "+";
                            }
                        }
                        if($allData["Table".$i]['SampleNominalUnit']['value'] == 'kg'){
                            if((floatval($allData["Table".$i]['deviation']['value'])*1000000)<0){
                                echo "-";
                            }else{
                                echo "+";
                            }
                        }
                        ?>           
                        <?php 
                            $Sample = $allData["Table".$i]['SampleNominalValue']['value'].' '.$allData["Table".$i]['SampleNominalUnit']['value'];
                            $uemg = $allData["Table".$i]['ue']['value']*1000;
                            $decimal = 0;
                            $whereInArray;
                            for ($w=0; $w < count($arrayOfClass); $w++) {
                                $inArray = in_array($Sample, $arrayOfClass[$w]);
                                if ($inArray == true) {
                                    $whereInArray = $w;
                                    break;
                                }
                            }

                            if ($inArray) {
                                if($units == 'mg'){
                                    if($uemg < floatval($arrayOfClass[$whereInArray]['cmc'])){
                                        $decimal =  seeDecimal(sigFig(floatval($arrayOfClass[$whereInArray]['cmc']),2));
                                    } else{
                                        $decimal = seeDecimal(sigFig($uemg,2));
                                    }
                                }
                                if($units == 'g'){
                                    if($uemg < floatval($arrayOfClass[$whereInArray]['cmc'])){
                                        $decimal = seeDecimal(sigFig((floatval($arrayOfClass[$w]['cmc'])/1000),2));
                                    } else{
                                        $decimal = seeDecimal(sigFig(($uemg/1000),2));
                                    }
                                }
                                if($units == 'kg'){
                                    if($uemg < floatval($arrayOfClass[$whereInArray]['cmc'])){
                                        $decimal = seeDecimal(sigFig((floatval($arrayOfClass[$w]['cmc'])/1000000),2));
                                    } else{
                                        $decimal = seeDecimal(sigFig(($uemg/1000000),2));
                                    }
                                }
                            }else{
                                if($units == 'mg'){
                                    $arrayOfStandardFiltered = searchInArray($allData["Table".$i]['StandardIdNumber']['value'], $allData["Table".$i]['StandardSerialNumber']['value'], $allData["Table".$i]['StandardNominalValue']['value'], $allData["Table".$i]['StandardNominalUnit']['value'],$StandardData,$MPE);
                                    if($uemg < floatval($arrayOfStandardFiltered)){
                                        $decimal = seeDecimal(sigFig($arrayOfStandardFiltered,2));
                                    } else{
                                        $decimal = seeDecimal(sigFig($uemg,2));
                                    }
                                }
                                if($units == 'g'){
                                    $arrayOfStandardFiltered = searchInArray($allData["Table".$i]['StandardIdNumber']['value'], $allData["Table".$i]['StandardSerialNumber']['value'], $allData["Table".$i]['StandardNominalValue']['value'], $allData["Table".$i]['StandardNominalUnit']['value'],$StandardData,$MPE);
                                    if($uemg < floatval($arrayOfStandardFiltered)){
                                        $decimal = seeDecimal(sigFig((floatval($arrayOfStandardFiltered)/1000),2));                                        
                                    } else{
                                        $decimal = seeDecimal(sigFig(($uemg/1000),2));                                       
                                    }
                                }
                                if($units == 'kg'){
                                    $arrayOfStandardFiltered = searchInArray($allData["Table".$i]['StandardIdNumber']['value'], $allData["Table".$i]['StandardSerialNumber']['value'], $allData["Table".$i]['StandardNominalValue']['value'], $allData["Table".$i]['StandardNominalUnit']['value'],$StandardData,$MPE);
                                    if($uemg < floatval($arrayOfStandardFiltered)){
                                        $decimal = seeDecimal(sigFig((floatval($arrayOfStandardFiltered)/1000000),2));                                      
                                    } else{
                                        $decimal = seeDecimal(sigFig(($uemg/1000000),2));
                                      
                                    }
                                }

                            }

                            //old rule = convert unit to one unit lower
                            //new rule = convert to mg
                            for ($w=0; $w < count($arrayOfClass); $w++) { 
                                if($units){
                                    if($arrayOfClass[$w]['rangePAB'] == $Sample){
                                        if($uemg < floatval($arrayOfClass[$w]['cmc'])){
                                            if($allData["Table".$i]['SampleNominalUnit']['value'] == 'mg'){
                                                $correction =   abs(floatval($allData["Table".$i]['deviation']['value']));
                                                echo roundTo($correction,$decimal)." mg";
                                            }
                                            if($allData["Table".$i]['SampleNominalUnit']['value'] == 'g'){
                                                $correction =   (abs(floatval($allData["Table".$i]['deviation']['value']))*1000);
                                                echo roundTo($correction,$decimal)." mg";
                                            }
                                            if($allData["Table".$i]['SampleNominalUnit']['value'] == 'kg'){
                                                $correction =   (abs(floatval($allData["Table".$i]['deviation']['value']))*1000000);
                                                echo roundTo($correction,$decimal)." mg";
                                            }
                                            break;
                                        } else{
                                            if($allData["Table".$i]['SampleNominalUnit']['value'] == 'mg'){
                                                $correction =   abs(floatval($allData["Table".$i]['deviation']['value']));
                                                echo roundTo($correction,$decimal)." mg";
                                            }
                                            if($allData["Table".$i]['SampleNominalUnit']['value'] == 'g'){
                                                $correction =   (abs(floatval($allData["Table".$i]['deviation']['value']))*1000);
                                                echo roundTo($correction,$decimal)." mg";
                                            }
                                            if($allData["Table".$i]['SampleNominalUnit']['value'] == 'kg'){
                                                $correction =   (abs(floatval($allData["Table".$i]['deviation']['value']))*1000000);
                                                echo roundTo($correction,$decimal)." mg";
                                            }
                                            break;
                                        }
                                        
                                    } 
                                    else{
                                        $arrayOfStandardFiltered = searchInArray($allData["Table".$i]['StandardIdNumber']['value'], $allData["Table".$i]['StandardSerialNumber']['value'], $allData["Table".$i]['StandardNominalValue']['value'], $allData["Table".$i]['StandardNominalUnit']['value'],$StandardData,$MPE);
                                        if($uemg < floatval($arrayOfStandardFiltered)){
                                            if($allData["Table".$i]['SampleNominalUnit']['value'] == 'mg'){
                                                $correction =   abs(floatval($allData["Table".$i]['deviation']['value']));
                                                echo roundTo($correction,$decimal)." mg";
                                            }
                                            if($allData["Table".$i]['SampleNominalUnit']['value'] == 'g'){
                                                $correction =   (abs(floatval($allData["Table".$i]['deviation']['value']))*1000);
                                                echo roundTo($correction,$decimal)." mg";
                                            }
                                            if($allData["Table".$i]['SampleNominalUnit']['value'] == 'kg'){
                                                $correction =   (abs(floatval($allData["Table".$i]['deviation']['value']))*1000000);
                                                echo roundTo($correction,$decimal)." mg";
                                            }
                                            break;
                                        } else{
                                            if($allData["Table".$i]['SampleNominalUnit']['value'] == 'mg'){
                                                $correction =   abs(floatval($allData["Table".$i]['deviation']['value']));
                                                echo roundTo($correction,$decimal)." mg";
                                            }
                                            if($allData["Table".$i]['SampleNominalUnit']['value'] == 'g'){
                                                $correction =   (abs(floatval($allData["Table".$i]['deviation']['value']))*1000);
                                                echo roundTo($correction,$decimal)." mg";
                                            }
                                            if($allData["Table".$i]['SampleNominalUnit']['value'] == 'kg'){
                                                $correction =   (abs(floatval($allData["Table".$i]['deviation']['value']))*1000000);
                                                echo roundTo($correction,$decimal)." mg";
                                            }
                                            break;
                                        }
                                        
                                       
                                    }  
                                }
                            }
                            
                            
                            
                            
                        ?>
                   </td>
                        <td></td>
                        <td style="text-align:right"><?php 
                            $Sample = $allData["Table".$i]['SampleNominalValue']['value'].' '.$allData["Table".$i]['SampleNominalUnit']['value'];
                            $uemg = $allData["Table".$i]['ue']['value']*1000;
                            $inArray;
                            $whereInArray;
                            //var_dump($arrayOfClass);
                                // for ($w=0; $w < count($arrayOfClass); $w++) { 
                                //     if($units == 'mg'){
                                //         if($arrayOfClass[$w]['rangePAB'] == $Sample){
                                //             if($uemg < floatval($arrayOfClass[$w]['cmc'])){
                                //                 echo sigFig(floatval($arrayOfClass[$w]['cmc']),2);
                                //                 break;
                                //             } else{
                                //                 echo sigFig($uemg,2);
                                //                 break;
                                //             }
                                            
                                //         } 
                                //         else{
                                //             $arrayOfStandardFiltered = searchInArray($allData["Table".$i]['StandardIdNumber']['value'], $allData["Table".$i]['StandardSerialNumber']['value'], $allData["Table".$i]['StandardNominalValue']['value'], $allData["Table".$i]['StandardNominalUnit']['value'],$StandardData,$MPE);
                                //             if($uemg < floatval($arrayOfStandardFiltered)){
                                //                 echo sigFig($arrayOfStandardFiltered,2);
                                //                 break;
                                //             } else{
                                //                 echo sigFig($uemg,2);
                                //                 break;
                                //             }
                                            
                                        
                                //         }  
                                //     }
                                //     if($units == 'g'){
                                //         if($arrayOfClass[$w]['rangePAB'] == $Sample){
                                //             if($uemg < floatval($arrayOfClass[$w]['cmc'])){
                                //                 echo sigFig((floatval($arrayOfClass[$w]['cmc'])/1000),2);
                                //                 break;
                                //             } else{
                                //                 echo sigFig(($uemg/1000),2);
                                //                 break;
                                //             }
                                            
                                //         } 
                                //         else{
                                //             $arrayOfStandardFiltered = searchInArray($allData["Table".$i]['StandardIdNumber']['value'], $allData["Table".$i]['StandardSerialNumber']['value'], $allData["Table".$i]['StandardNominalValue']['value'], $allData["Table".$i]['StandardNominalUnit']['value'],$StandardData,$MPE);
                                //             if($uemg < floatval($arrayOfStandardFiltered)){
                                //                 echo sigFig((floatval($arrayOfStandardFiltered)/1000),2);
                                //                 break;
                                //             } else{
                                //                 echo sigFig(($uemg/1000),2);
                                //                 break;
                                //             }
                                            
                                        
                                //         }  
                                //     }
                                //     if($units == 'kg'){
                                //         if($arrayOfClass[$w]['rangePAB'] == $Sample){
                                //             if($uemg < floatval($arrayOfClass[$w]['cmc'])){
                                //                 echo sigFig((floatval($arrayOfClass[$w]['cmc'])/1000000),2);
                                //                 break;
                                //             } else{
                                //                 echo sigFig(($uemg/1000000),2);
                                //                 break;
                                //             }
                                            
                                //         } 
                                //         else{
                                //             $arrayOfStandardFiltered = searchInArray($allData["Table".$i]['StandardIdNumber']['value'], $allData["Table".$i]['StandardSerialNumber']['value'], $allData["Table".$i]['StandardNominalValue']['value'], $allData["Table".$i]['StandardNominalUnit']['value'],$StandardData,$MPE);
                                //             if($uemg < floatval($arrayOfStandardFiltered)){
                                //                 echo sigFig((floatval($arrayOfStandardFiltered)/1000000),2);
                                //                 break;
                                //             } else{
                                //                 echo sigFig(($uemg/1000000),2);
                                //                 break;
                                //             }
                                            
                                        
                                //         }  
                                //     }
                            // }

                            for ($w=0; $w < count($arrayOfClass); $w++) {
                                $inArray = in_array($Sample, $arrayOfClass[$w]);
                                if ($inArray == true) {
                                    $whereInArray = $w;
                                    break;
                                }
                            }

                            $stda = explode(',',$allData["Table".$i]['STDa'.$i]['value']);
                            $stdb = explode(',',$allData["Table".$i]['STDb'.$i]['value']);
                            $stdc = explode(',',$allData["Table".$i]['STDc'.$i]['value']);
                            $stdd = explode(',',$allData["Table".$i]['STDd'.$i]['value']);
                            $stde = explode(',',$allData["Table".$i]['STDe'.$i]['value']);

                            //searchInArrayDynamic($searchWhat, $searchIn, $array);

                            $stdaGetNominal = searchInArrayDynamic($stda[2], 'id', $StandardData);
                            $stdbGetNominal = searchInArrayDynamic($stdb[2], 'id', $StandardData);
                            $stdcGetNominal = searchInArrayDynamic($stdc[2], 'id', $StandardData);
                            $stddGetNominal = searchInArrayDynamic($stdd[2], 'id', $StandardData);
                            $stdeGetNominal = searchInArrayDynamic($stde[2], 'id', $StandardData);
                            $stdaCMC;
                            $stdbCMC;
                            $stdcCMC;
                            $stddCMC;
                            $stdeCMC;
                            $sumOfCMC = 0;
                            $sumOfNotCMC = $allData["Table".$i]['ue']['value'];

                            $stdaCMC = getCMCOfNonPAB($testWeightData['approxClass'], $stdaGetNominal['nominalUnit'], $stdaGetNominal['nominalValue'], $MPE);
                            $arrayOfStandardFiltereda = searchInArray(makeSubToNumber($stdaGetNominal['class']), $stdaGetNominal['serialNumber'], $stdaGetNominal['nominalValue'], $stdaGetNominal['nominalUnit'],$StandardData,$MPE);

                            $sumOfCMC += floatVal($stdaCMC);
                            // $sumOfNotCMC += floatVal($arrayOfStandardFiltereda);

                            if($stdbGetNominal != null){
                                $arrayOfStandardFilteredb = searchInArray(makeSubToNumber($stdbGetNominal['class']), $stdbGetNominal['serialNumber'], $stdbGetNominal['nominalValue'], $stdbGetNominal['nominalUnit'],$StandardData,$MPE);

                                $stdbCMC = getCMCOfNonPAB($testWeightData['approxClass'], $stdbGetNominal['nominalUnit'], $stdbGetNominal['nominalValue'], $MPE);
                                $sumOfCMC += floatVal($stdbCMC);
                                // $sumOfNotCMC += floatVal($arrayOfStandardFilteredb);
                            }
                            if($stdcGetNominal != null){
                                $arrayOfStandardFilteredc = searchInArray(makeSubToNumber($stdcGetNominal['class']), $stdcGetNominal['serialNumber'], $stdcGetNominal['nominalValue'], $stdcGetNominal['nominalUnit'],$StandardData,$MPE);

                                $stdcCMC = getCMCOfNonPAB($testWeightData['approxClass'], $stdcGetNominal['nominalUnit'], $stdcGetNominal['nominalValue'], $MPE);
                                $sumOfCMC += floatVal($stdcCMC);
                                // $sumOfNotCMC += floatVal($arrayOfStandardFilteredc);
                            }
                            if($stddGetNominal != null){
                                $arrayOfStandardFilteredd = searchInArray(makeSubToNumber($stddGetNominal['class']), $stddGetNominal['serialNumber'], $stddGetNominal['nominalValue'], $stddGetNominal['nominalUnit'],$StandardData,$MPE);

                                $stddCMC = getCMCOfNonPAB($testWeightData['approxClass'], $stddGetNominal['nominalUnit'], $stddGetNominal['nominalValue'], $MPE);
                                $sumOfCMC += floatVal($stddCMC);
                                // $sumOfNotCMC += floatVal($arrayOfStandardFilteredd);
                            }
                            if($stdeGetNominal != null){
                                $arrayOfStandardFilterede = searchInArray(makeSubToNumber($stdeGetNominal['class']), $stdeGetNominal['serialNumber'], $stdeGetNominal['nominalValue'], $stdeGetNominal['nominalUnit'],$StandardData,$MPE);

                                $stdeCMC = getCMCOfNonPAB($testWeightData['approxClass'], $stdeGetNominal['nominalUnit'], $stdeGetNominal['nominalValue'], $MPE);
                                $sumOfCMC += floatVal($stdeCMC);
                                // $sumOfNotCMC += floatVal($arrayOfStandardFilterede);
                            }
                        
                            if ($inArray) {   
                                if($units == 'mg'){
                                    if($uemg < $sumOfCMC){
                                        echo sigFig(floatval($sumOfCMC),2);
                                    } else{
                                        echo sigFig($uemg,2);
                                    }
                                }
                                if($units == 'g'){
                                    if($uemg < $sumOfCMC){
                                        echo sigFig((floatval($sumOfCMC)/1000),2);
                                    } else{
                                        echo sigFig(($uemg/1000),2);
                                    }
                                }
                                if($units == 'kg'){
                                    if($uemg < $sumOfCMC){
                                        echo sigFig((floatval($sumOfCMC)/1000000),2);
                                  
                                    } else{
                                        echo sigFig(($uemg/1000000),2);
                                 
                                    }
                                }
                            }else{
                                if($units == 'mg'){
                                    $arrayOfStandardFiltered = searchInArray($allData["Table".$i]['StandardIdNumber']['value'], $allData["Table".$i]['StandardSerialNumber']['value'], $allData["Table".$i]['StandardNominalValue']['value'], $allData["Table".$i]['StandardNominalUnit']['value'],$StandardData,$MPE);
                                    if($uemg < floatval($sumOfNotCMC)){
                                        echo sigFig($sumOfNotCMC,2);
                                        // echo sigFig($sumOfCMC,2);
                                    } else{
                                        echo sigFig($uemg,2);
                                 
                                    }
                                }
                                if($units == 'g'){
                                    $arrayOfStandardFiltered = searchInArray($allData["Table".$i]['StandardIdNumber']['value'], $allData["Table".$i]['StandardSerialNumber']['value'], $allData["Table".$i]['StandardNominalValue']['value'], $allData["Table".$i]['StandardNominalUnit']['value'],$StandardData,$MPE);
                                    if($uemg < floatval($sumOfNotCMC)){
                                        echo sigFig((floatval($sumOfNotCMC)/1000),2);
                                        // echo sigFig((floatval($sumOfCMC)/1000),2);
                                    } else{
                                        echo sigFig(($uemg/1000),2);
                                 
                                    }
                                }
                                if($units == 'kg'){
                                    $arrayOfStandardFiltered = searchInArray($allData["Table".$i]['StandardIdNumber']['value'], $allData["Table".$i]['StandardSerialNumber']['value'], $allData["Table".$i]['StandardNominalValue']['value'], $allData["Table".$i]['StandardNominalUnit']['value'],$StandardData,$MPE);
                                    if($uemg < floatval($sumOfNotCMC)){
                                        echo sigFig((floatval($sumOfNotCMC)/1000000),2);
                                        // echo sigFig((floatval($sumOfCMC)/1000000),2);
                                    } else{
                                        echo sigFig(($uemg/1000000),2);
                                
                                    }
                                }
                            }

                           
                            
                            
                            
                        ?></td>
                       
                        <td style="text-align:left"><?=$units?></td>
                    </tr>

                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

    <!-- CALIBRATION RESULTS --> 

    <!-- FOOTER -->        
        <div style="position: absolute; top:700; left:8.9%; font-size:8;">
            <p style='position: absolute; top:0; font-style: italic;'>This Certificate shall not be reproduced in any form, except in full, without the written approval of the DOST CALABARZON RML</p>
        </div>
        <div style="position: absolute; top:712; font-size:10;">
        <p style='position: absolute; top:0;'>Date of Issue:
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
         </div>
    <!-- FOOTER -->  
    <!-- PAGE 3 / PAGE BREAK -->
        <!-- <div style='page-break-after: always;'></div> -->
    <!-- PAGE 3 / PAGE BREAK-->
    </div>     
</body>





</html>   