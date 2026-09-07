<?php
    use App\Models\ElectModel_image;
    use App\Models\ThermoStandard;
    $electStandardTable = new ThermoStandard();
    $arrayOfWeights = $thermoData['standardAndAccessories'];
    $pieces = explode(",", $arrayOfWeights);
    $thermoStandard[] = $electStandardTable->whereIn('serialNumber',  $pieces)->findAll();
   
    $electImageTable = new ElectModel_image();
    $image[] = $electImageTable->where('certificateNumber',  $thermoData['certificateNumber'])->first();

    $path = 'image/dost.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    $pathPAB = 'image/pab logo.png';
    $typePAB = pathinfo($pathPAB, PATHINFO_EXTENSION);
    $dataPAB = file_get_contents($pathPAB);
    $base64PAB = 'data:image/' . $typePAB . ';base64,' . base64_encode($dataPAB);

    $DATAtempIn = json_decode($thermoData['tableTempIn'],true);
    $DATARHIn = json_decode($thermoData['tableRH'],true);
    $DATAtempoOut = json_decode($thermoData['tableTempOut'],true);
    $DATARHOut = json_decode($thermoData['tableRNOut'],true);
    $page = 'all';
?>


<?php
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

?>
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
<!DOCTYPE html>
<html>
<head>
<title>RML ++</title>
<!--FONTAWESOME CDN-->
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
     <!--FONTAWESOME CDN-->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=0.6, user-scalable=no ">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">  
    <style>
        <?php include 'css/bootstrap.css'; ?>
        
    </style>
</head>
<body style="margin: 0; padding: 0; font-family: Calibri; font-size: 16px;">
    <div class="card mt-2 mx-auto text-center col-12" style="width: 100%;">
    <div class="">
		<!-- HEADER --> 
			<div class="row text-left mt-4">
				<div class="col mx-5 p-5">
                    <h1 class="card-title mt-4">Thermohygrometer</h1>
                    <h4 class="card-title mb-4">Calibration Certificate (View)</h4></div>
				
				    <div class="col-xl-2 col-md-2 col-sm-3 col-6 text-center float-center mr-5">
                    
                        <form action="<?= base_url('UpdatePabLogoThermo') ?>" method="POST" id="pabForm">
                        <div class="input-group mb-3">
                            <input type="hidden" value="<?php echo $thermoData['id']; ?>" name="id">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                <?php if($thermoData['PabLogo']=='true'){
                                    echo '<input type="checkbox" checked id="checkBoxPabLogo" onclick="pabLOGO(\''.$base64PAB.'\');">';
                                }else{
                                    echo '<input type="checkbox" id="checkBoxPabLogo" onclick="pabLOGO(\''.$base64PAB.'\');">';
                                }?>
                                    <input type="hidden" value="" name="pablogoValue" id="pablogoValue">
                                </div>
                            </div>
                            <Label for="checkBoxPabLogo">
                                <?php if($thermoData['PabLogo']=='true'){
                                    echo '<img src="'.$base64PAB.'" alt="No PAB LOGO" id="pabLogo" height="150px">';
                                }else{
                                    echo ' <img src="" alt="No PAB LOGO" id="pabLogo" height="150px">';
                                }?>
                                   
                            </Label>
                            
                            </div>
                            <input type="submit" value="update">
                        </form>                               
				</div>
			</div>
        <!-- HEADER -->	
    </div> <hr>
        <div class="container">
        <form action="">
                <div class="row">
                    <div class="col col-sm-6 text-left">
                        <label class="">Certificate Number:</label> 
                        <h4 class="mt-n2"><?php echo $thermoData['certificateNumber']?></h4>   
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-6 text-left">
                        <label>Customer:</label> 
                        <h4 class="mt-n2"><?php echo $thermoData['customer']?></h4>   
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-6 text-left">
                        <label>Address:</label> 
                        <h4 class="mt-n2"><?php echo $thermoData['address']?></h4>   
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-sm-6 text-left">
                        <label>Equipment Description: </label>
                        <h4 class="mt-n2"><?php echo $thermoData['equipmentDescription']?></h4>  
                    </div>
                    <div class="col-xl-2 col-sm-6 text-left">
                        <label class="">Date Received: </label>
                        <h4 class="mt-n2">
                        <?php 
                            $date = $thermoData['dateReceived']; 
                            $mysql_date = date('Y-m-d G:i:s', strtotime($date));
                            $date2 = $thermoData['dateCalibrated']; 
                            $mysql_date2 = date('Y-m-d G:i:s', strtotime($date2));
                            $date3 = $thermoData['recommendedDueDate']; 
                            $mysql_date3 = date('Y-m-d G:i:s', strtotime($date3));
                        ?>
                        <?php echo date('d F Y', strtotime($mysql_date));?></h4> 
                    </div>
                </div>

                <div class="row text-left">
                    <div class="col-xl-6 col-sm-6">
                        <label>Manufacturer: </label>
                        <h4 class="mt-n2"><?php echo $thermoData['manufacturer']?></h4>    
                    </div>
                    <div class="col-xl-2 col-sm-6">
                        <label class="">Date Calibrated: </label>
                        <h4 class="mt-n2"><?php echo date('d F Y', strtotime($mysql_date2));?></h4>    
                    </div>
                </div>
                <div class="row text-left">
                    <div class="col-xl-6 col-sm-6">
                        <label>Model Number: </label>
                        <h4 class="mt-n2"><?php echo $thermoData['modelNumber']?></h4>    
                    </div>
                    <div class="col-xl-2 col-sm-6">
                        <label class="">Reccomended Due Date: </label>
                        <h4 class="mt-n2"><?php echo date('d F Y', strtotime($mysql_date3));?></h4>    
                    </div>
                </div>
                <div class="row text-left">
                    <div class="col-xl-6 col-sm-6">
                        <label>Serial Number: </label>
                        <h4 class="mt-n2"><?php echo $thermoData['serialNumber']?></h4>    
                    </div>
                    <div class="col-xl-2 col-sm-6">
                        <label class="">Place of Calibration: </label>
                        <h4 class="mt-n2"><?php echo $thermoData['placeOfCalibration']?></h4>    
                    </div>
                </div>
                <div class="row text-left">
                    <div class="col-xl-6 col-sm-6">
                        <label>Resolution (temperature): </label>
                        <h4 class="mt-n2">0.1 °C</h4>    
                    </div>
                    <div class="col-xl-2 col-sm-6">
                        <label class="">Resolution (humidity): </label>
                        <h4 class="mt-n2">1 % RH</h4>    
                    </div>
                </div>
                <div class="row text-left">
                    <div class="col-xl-6 col-sm-6">
                        <label>Ambient Temperature: </label>
                        <h4 class="mt-n2"><?php echo $thermoData['ambTemp']?></h4>    
                    </div>
                    <div class="col-xl-2 col-sm-6">
                        <label class="">Ambient Humidity:  </label>
                        <h4 class="mt-n2"><?php echo $thermoData['ambRh']?></h4>    
                    </div>
                </div>
                <div class="row text-left">
                    <div class="col-xl-6 col-sm-6">
                        <label>Equipment ID: </label>
                        <h4 class="mt-n2"><?php echo $thermoData['equipmentID']?></h4>    
                    </div>
                </div>
                <div class="row text-left">
                    <div class="col-xl-2 col-sm-6">
                        <label>Date of issue: </label>
                        <input type="date" class="form-control" id="datePicker" onchange="document.getElementById('datePrev').value = this.value; document.getElementById('datePrevDown').value = this.value; document.getElementById('datePrevFull').value = this.value;">
                    </div>
                </div>
              
               <hr>
             

            <div style="position:relative; text-decoration:underline;<?php if($DATAtempIn == []){echo"display:none";}?>" >
                <p>Temperature Indicator Test (IN)</p> 
                <!-- <p><input type="range" id="uucDecimalPointTempIn" name="" min="0" max="10" oninput="addTempIn()"></p> -->
                <!-- <p><input type="range" id="correctionDecimalPointTempIn" name="" min="0" max="10" oninput="addTempIn()"></p> -->
            </div>
            
            <div style="position:relative;<?php if($DATAtempIn == []){echo"display:none";}?>">
                <table width="100%">
                    <thead style="">
                        <tr>
                            <th>Standard Reading</th>
                            <th>UUC Reading <p><input type="range" id="uucDecimalPointTempIn" name="" min="0" max="10" oninput="addTempIn()"></p></th>
                            <th>Correction <p><input  type="range" id="correctionDecimalPointTempIn" name="" min="0" max="10" oninput="addTempIn()"></p></th>
                            <th>Uncertainty</th>
                            <th>Computed Uncertainty</th>
                        </tr>    
                    </thead>
                    <tbody id="tempInBody">
                            
                    </tbody>
                </table>
            </div>

            <div style="position:relative; text-decoration:underline;<?php if($DATARHIn == [] ||$page == 'inOutTemp'){echo"display:none";}?>">
                <p>Humidity Indicator Test (IN)</p> 
                <!-- <p><input type="range" id="uucDecimalPointRhIn" name="" min="0" max="10" oninput="addRhIn()"></p> -->
            </div>
            
            <div style="position:relative; <?php if($DATARHIn == [] ||$page == 'inOutTemp'){echo"display:none";}?>">
                <table width="100%">
                    <thead style="">
                        <tr>
                            <!-- <th>Standard Reading at 23 °C</th> -->
                            <th>Standard Reading</th>
                            <th>UUC Reading <p><input type="range" id="uucDecimalPointRhIn" name="" min="0" max="10" oninput="addRhIn()"></p></th>
                            <th>Correction <p><input  type="range" id="correctionDecimalPointRhIn" name="" min="0" max="10" oninput="addRhIn()"></p></th>
                            <th>Uncertainty</th>
                            <th>Computed Uncertainty</th>                        
                        </tr>    
                    </thead>
                    <tbody id="rhInBody">
                                                  
                </table>
            </div>

            <div style="position:relative; text-decoration:underline; <?php  if($DATAtempoOut == [] || $page == 'default'|| $page == 'sensor'){echo"display:none";}?>">
                <p>Temperature Indicator Test <?php if($page == 'inOutTemp' || $page == 'inOutRH'){echo"(OUT)";} if($page == 'all' ){echo"(OUT) - Channel 1";}?></p> 
                <!-- <p><input type="range" id="uucDecimalPointTempOut" name="" min="0" max="10" oninput="addTempOut()"></p> -->
            </div>
            
            <div style="position:relative; <?php  if($DATAtempoOut == [] || $page == 'default'|| $page == 'sensor'){echo"display:none";}?>">
                <table width="100%">
                    <thead style="">
                        <tr>
                            <th>Standard Reading</th>
                            <th>UUC Reading <p><input type="range" id="uucDecimalPointTempOut" name="" min="0" max="10" oninput="addTempOut()"></p></th>
                            <th>Correction <p><input  type="range" id="correctionDecimalPointTempOut" name="" min="0" max="10" oninput="addTempOut()"></p></th>
                            <th>Uncertainty</th>
                            <th>Computed Uncertainty</th>                        
                        </tr>    
                    </thead>
                    <tbody id="tempOutBody">
                           
                    </tbody>
                </table>
            </div>

            <div style="position:relative; text-decoration:underline; <?php  if($DATARHOut == [] ||$page != 'all'){echo"display:none";}?>">
                <p>Humidity Indicator Test (OUT) - Channel 1</p> 
                <!-- <p><input type="range" id="uucDecimalPointRhOut" name="" min="0" max="10" oninput="addRhOut()"></p> -->
            </div>
            
            <div style="position:relative; <?php  if($DATARHOut == [] ||$page != 'all'){echo"display:none";}?>">
                <table width="100%">
                    <thead style="<?php  if($DATARHOut == [] ){echo"display:none";}?>">
                        <tr>
                            <th>Standard Reading</th>
                            <th>UUC Reading <p><input type="range" id="uucDecimalPointRhOut" name="" min="0" max="10" oninput="addRhOut()"></p></th>
                            <th>Correction <p><input  type="range" id="correctionDecimalPointRhOut" name="" min="0" max="10" oninput="addRhOut()"></p></th>
                            <th>Uncertainty</th>
                            <th>Computed Uncertainty</th>                        
                        </tr>    
                    </thead>
                    <tbody id="rhOutBody">
                            
                    </tbody>
                </table>
            </div>

           
               
            
    <hr>

            <table class="table table-borderless">
                <tr>
                    <td class="col-3"><u><b>Standard Used</b></u></td>
                    <td class="col-3"><u><b>Calibration Certificate No.</b></u></td>
                    <td class="col-3"><u><b>Issuing laboratory</b></u></td>
                </tr>
                 
                    <?php foreach($thermoStandard as $value){
                       foreach($value as $serial){
                        echo 
                        "<tr><td class='col-3'>". $serial['serialNumber']."<br></td>"."<td class='col-3'>". $serial['certificateNumber']."<br></td>"."<td class='col-3'>". $serial['issuingLab']."<br></td>"."</tr>";
                    }}
                    ?>
            </table>
        </form>
    <hr>   
    <div class="form-group row">
        <div class='col-sm-10 text-left'>
            <div class="form-check">
                
                <input class="form-check-input" type="radio" value="default" id="default" name="page2" onchange="pageHere()" checked>
                <label class="form-check-label" for="default">
                    Page 2 Default
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="sensor" id="sensor" name="page2" onchange="pageHere()">
                <label class="form-check-label" for="sensor">
                    Page 2 with Sensor details
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="inOutTemp" id="inOutTemp" name="page2" onchange="pageHere()">
                <label class="form-check-label" for="inOutTemp">
                    Page 2 with In and Out Temperature only
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="inOutRH" id="inOutRH" name="page2" onchange="pageHere()">
                <label class="form-check-label" for="inOutRH">
                    Page 2 with Temperature In and Out, and Humidity
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="all" id="all" name="page2" onchange="pageHere()">
                <label class="form-check-label" for="all">
                    Page 2 with Temperature In and Out, and Relative humidity In and out
                </label>
            </div>
        </div>
        
    </div>
            <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#imageModal">
                View Image of Unit
            </button>
    <br> 
    <div id="forVerificationButtons">
    </div>
    <hr> 
    <br>          
    
    <div>
        <form name="verifyForm" action="/thermoVerify" method="post">
            <input type="hidden" name="completion" id="" value="For printing">
            <input type="hidden" value="<?php echo $thermoData['id']; ?>" name="idVerify" id="idVerify">
        </form>
        <form name="correctionForm" action="/thermoCorrection" method="post">
            <input type="hidden" name="completion" id="" value="For correction">
            <input type="hidden" value="<?php echo $thermoData['id']; ?>" name="idCorrection">
        </form>
    </div>
                    

            <div class="btn-group" role="group" style="position:fixed;display:flex; flex-direction:row;align-content:center; bottom:0; z-index:99; border:solid 0px">
                <form class="btn" action="<?= base_url('ThermoToPdfPreview/'.$thermoData['id']) ?>" method="POST" target="iframeHere" id="prevForm" name="prevForm">
                    <input type="hidden" name="pagerPrev" id="pagerPrev"> 
                    <input type="hidden" name="datePrev" id="datePrev">

                    <input type="hidden" name="uucDecimalPointTempInPrev" id='uucDecimalPointTempInHiddenPrev'>
                    <input type="hidden" name="uucDecimalPointRhInPrev" id='uucDecimalPointRhInHiddenPrev'>
                    <input type="hidden" name="uucDecimalPointTempOutPrev" id='uucDecimalPointTempOutHiddenPrev'>
                    <input type="hidden" name="uucDecimalPointRhOutPrev" id='uucDecimalPointRhOutHiddenPrev'>

                    <input type="hidden" name="correctionDecimalPointTempInPrev" id='correctionDecimalPointTempInHiddenPrev'>
                    <input type="hidden" name="correctionDecimalPointRhInPrev" id='correctionDecimalPointRhInHiddenPrev'>
                    <input type="hidden" name="correctionDecimalPointTempOutPrev" id='correctionDecimalPointTempOutHiddenPrev'>
                    <input type="hidden" name="correctionDecimalPointRhOutPrev" id='correctionDecimalPointRhOutHiddenPrev'>

                  

                    <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#previewModal">
                        <i class="far fa-eye"></i> Preview PDF
                    </button>
                </form>
                <form class="btn" action="<?= base_url('ThermoToPdf/'.$thermoData['id']) ?>" method="POST" target="_blank" id="downForm" name="downForm" rel="noopener">
                    <input type="hidden" name="pagerDown" id="pagerDown">
                    <input type="hidden" name="datePrevDown" id="datePrevDown">

                    <input type="hidden" name="uucDecimalPointTempInDown" id='uucDecimalPointTempInHiddenDown'>
                    <input type="hidden" name="uucDecimalPointRhInDown" id='uucDecimalPointRhInHiddenDown'>
                    <input type="hidden" name="uucDecimalPointTempOutDown" id='uucDecimalPointTempOutHiddenDown'>
                    <input type="hidden" name="uucDecimalPointRhOutDown" id='uucDecimalPointRhOutHiddenDown'>

                    <input type="hidden" name="correctionDecimalPointTempInDown" id='correctionDecimalPointTempInHiddenDown'>
                    <input type="hidden" name="correctionDecimalPointRhInDown" id='correctionDecimalPointRhInHiddenDown'>
                    <input type="hidden" name="correctionDecimalPointTempOutDown" id='correctionDecimalPointTempOutHiddenDown'>
                    <input type="hidden" name="correctionDecimalPointRhOutDown" id='correctionDecimalPointRhOutHiddenDown'>

                    <input type="hidden" name="imageDraftDown" id='imageDraftDown' value="false">

                    <button type="button" class="btn btn-info" onclick="setToNotDraft()">
                        <i class="fas fa-file-download"></i>Download PDF
                    </button>
                </form>
                
                <div class="btn">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#EditModal">
                    <i class="fas fa-edit"></i>   
                    Edit Remarks
                    </button>
                </div>
                <div class="btn">
                    <button type="button" class="btn btn-success" onclick="setToDraft()">
                    <i class="fas fa-edit"></i>   
                    Download Draft
                    </button>
                </div>
                <div class="btn">
                    <a class="btn btn-danger" id='backButton'><i class="fas fa-arrow-circle-left"></i> Back</a>
                </div>
                <div class="btn" id='forverification'>
                </div>
            </div>

            
    </div>
    </div>
    </div>

 
<!-- PDF preview -->
    <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Preview <code class="h6">(May Not Work on Mobile Devices)</code> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <form class="btn" action="<?= base_url('htmlToPDFFullScreen/'.$thermoData['id']) ?>" method="POST" target="_blank" id="" rel="noopener">
                    <input type="hidden" name="pagerFull" id="pagerFull">
                    <input type="hidden" name="datePrevFull" id="datePrevFull">

                    <input type="hidden" name="uucDecimalPointTempInPrevFull" id='uucDecimalPointTempInHiddenPrevFull'>
                    <input type="hidden" name="uucDecimalPointRhInPrevFull" id='uucDecimalPointRhInHiddenPrevFull'>
                    <input type="hidden" name="uucDecimalPointTempOutPrevFull" id='uucDecimalPointTempOutHiddenPrevFull'>
                    <input type="hidden" name="uucDecimalPointRhOutPrevFull" id='uucDecimalPointRhOutHiddenPrevFull'>

                    <input type="hidden" name="correctionDecimalPointTempInPrevFull" id='correctionDecimalPointTempInHiddenPrevFull'>
                    <input type="hidden" name="correctionDecimalPointRhInPrevFull" id='correctionDecimalPointRhInHiddenPrevFull'>
                    <input type="hidden" name="correctionDecimalPointTempOutPrevFull" id='correctionDecimalPointTempOutHiddenPrevFull'>
                    <input type="hidden" name="correctionDecimalPointRhOutPrevFull" id='correctionDecimalPointRhOutHiddenPrevFull'>

                   

                    <button type="submit" class="btn btn-info">
                       View PDF
                    </button>
                </form>
                </button>
            </div>
            <div class="modal-body"style="height:50%">
                <div class="embed-responsive embed-responsive-1by1"  style="height:25em">
                    <iframe class="embed-responsive-item" name="iframeHere" title="description"></iframe>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
<!-- PDF preview -->
<!-- Image preview -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Image of Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="" style="justify-content:center;">
                <img src="/<?php if($image[0]!=null){echo "uploads/".$image[0]['image'];}else{echo " ";}?>" width="100%" height="100%" style="border:1px solid black"alt="No Image">
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
<!-- Image preview -->
<!-- Edit Words -->
    <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Fixed Sentences</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="" style="justify-content:center;">
                    <form method="post" action="<?php echo base_URL('thermoUpdateWord')?>" name='updateRemarksForm'>
                        <input type="hidden" name="idHere" value="<?=$thermoData['id']?>">
                        <input type="hidden" name="type" value="old">
                        <div class="form-group">
                            <label for="CalibrationProcedureandTraceability">Calibration Procedure and Traceability</label>
                            <textarea class="form-control" id="CalibrationProcedureandTraceability" rows="3" name="settingCalibrationProcedureAndTraceability"><?=$thermoData['settingCalibrationProcedureAndTraceability']?></textarea>
                        </div> 
                        <div class="form-group">
                            <label for="UncertaintyofMeasurement">Uncertainty of Measurement</label>
                            <textarea class="form-control" id="UncertaintyofMeasurement" rows="3" name="settingUncertaintyOfMeasurement"><?=$thermoData['settingUncertaintyOfMeasurement']?></textarea>
                        </div> 
                        <div class="form-group">
                            <label for="CalibrationResults">Calibration Results</label>
                            <textarea class="form-control" id="CalibrationResults" rows="3" name="settingCalibrationResults"><?=$thermoData['settingCalibrationResults']?></textarea>
                        </div>
                        <div class="form-group" id="remarksDiv">
                            
                        </div>
                        <div class="form-group" id="remarksButton">

                        </div>
                        <input type="hidden" name="remarkHere" id="remarkHere">
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning" onclick="mergeRemarks()">Update</button>
            </div>
        </form>
            </div>
        </div>
    </div>
<!-- Edit Words -->

</body>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/js/ElectEdit.js"></script>
    <script>
        var countOfRemarks = 0;
        var remarkRaw = "<?=$thermoData['settingRemarks1']?>";
        function layoutRemarks() {
            var remarksDiv = document.getElementById("remarksDiv");
            var remarksButton = document.getElementById("remarksButton");
            const remarkSplited = remarkRaw.split("(splitHere)");
            remarkSplited.forEach((value, index) => {
                var label = document.createElement("label");
                var textarea = document.createElement("textarea");
                label.setAttribute("for", "remarks" + (index + 1));
                label.innerHTML = "Remark " + (index + 1);
                textarea.setAttribute("class", "form-control");
                textarea.setAttribute("id", "remarks" + (index + 1));
                textarea.setAttribute("rows", "3");
                textarea.innerHTML = value;
                remarksDiv.appendChild(label);
                remarksDiv.appendChild(textarea);
                countOfRemarks++;
            });

            var button = document.createElement("button");
            button.setAttribute("class", "btn btn-warning mt-3");
            button.setAttribute("type", "button");
            button.setAttribute("id", "AddRemarksButton");
            button.setAttribute("onclick", `addRemark();`);
            button.innerHTML = `Add Remark`;
            remarksButton.appendChild(button);

            var button = document.createElement("button");
            button.setAttribute("class", "btn btn-danger mt-3");
            button.setAttribute("type", "button");
            button.setAttribute("id", "deleteRemarksButton");
            button.setAttribute("onclick", `deleteRemark();`);
            button.innerHTML = `Delete Remark`;
            remarksButton.appendChild(button);
        }

        function mergeRemarks() {
            var input = document.getElementById("remarkHere").value;
            for (var i = 1; i <= countOfRemarks; i++) {
                if (i != countOfRemarks) {
                document.getElementById("remarkHere").value +=
                    document.getElementById("remarks" + i).value + "(splitHere)";
                } else {
                document.getElementById("remarkHere").value += document.getElementById(
                    "remarks" + i
                ).value;
                }
            }
            document.updateRemarksForm.submit();
        }

        function addRemark() {
            var remarksDiv = document.getElementById("remarksDiv");
            var label = document.createElement("label");
            var textarea = document.createElement("textarea");
            label.setAttribute("for", "remarks" + (countOfRemarks + 1));
            label.innerHTML = "Remark " + (countOfRemarks + 1);
            textarea.setAttribute("class", "form-control");
            textarea.setAttribute("id", "remarks" + (countOfRemarks + 1));
            textarea.setAttribute("rows", "3");
            remarksDiv.appendChild(label);
            remarksDiv.appendChild(textarea);
            countOfRemarks++;
        }

        const deleteRemark = () => {
            var remarksDiv = document.getElementById("remarksDiv");
            for (let i = 0; i < 2; i++) {
                var childCount = remarksDiv.childElementCount;
                // -3 because it starts at 0 and theres 2 button at the end
                remarksDiv.removeChild(remarksDiv.children[childCount - 1]);
            }
            countOfRemarks--;
        };

        layoutRemarks();
        
        var DATAtempIn = <?=json_encode($DATAtempIn);?>;
        var DATAtempoOut = <?=json_encode($DATAtempoOut);?>;
        var DATARHIn = <?=json_encode($DATARHIn);?>;
        var DATARHOut = <?=json_encode($DATARHOut);?>;

        function setToDraft(){
            document.getElementById('imageDraftDown').value = 'true';
            document.downForm.submit();
        }    

        function setToNotDraft(){
            document.getElementById('imageDraftDown').value = 'false';
            document.downForm.submit();
        }

        var countDecimals = function(value) {
            let text = value.toString()
            arrayOfValue = value.split(".");
            // verify if number 0.000005 is represented as "5e-6"
            if (text.indexOf('e-') > -1) {
                let [base, trail] = text.split('e-');
                let deg = parseInt(trail, 10);
                return deg;
            }
            // count decimals for number in representation like "0.123456"
            if (Math.floor(value) !== value) {
                if(value.toString().split(".").length >= 2){
                    return value.toString().split(".")[1].length || 0;
                }
            }
            return 0;
        }

        function formatNumber (number,precision) {
            if (typeof number === 'undefined' || number === null) return ''

            if (number === 0) return '0'

            const roundedValue = round(precision, number)
            const floorValue = Math.floor(roundedValue)

            const isInteger = Math.abs(floorValue - roundedValue) < Number.EPSILON

            const numberOfFloorDigits = String(floorValue).length
            const numberOfDigits = String(roundedValue).length

            if (numberOfFloorDigits > precision) {
                return String(floorValue)
            } else {
                const padding = isInteger ? precision - numberOfFloorDigits : precision - numberOfDigits + 1

                if (padding > 0) {
                if (isInteger) {
                    return `${String(floorValue)}.${'0'.repeat(padding)}`
                } else {
                    return `${String(roundedValue)}${'0'.repeat(padding)}`
                }
                } else {
                return String(roundedValue)
                }
            }
        }

        // function round(precision, testpoint) {
        //     return parseFloat(testpoint.toPrecision(precision))
        // }

        function round(precision, testpoint) {
            var roundTo = '1';
            for(var i = 1;i<=precision;i++){
                roundTo += '0' 
            }
            var toUse = (testpoint * Number(roundTo)) / Number(roundTo);
            return roundTo=='1'||roundTo=='10'? parseFloat(toUse.toFixed(precision)) : parseFloat(toUse.toPrecision(precision));
        }
         
        function checkIfPabTemp(resolution, testPoint){
            var resolutionUsed = parseFloat(resolution);
            if(resolutionUsed >= 0.01){
                if (testPoint >= -20) {
                    if (testPoint <=70) {   
                        return true
                    }
                }
            }
            return false
        }
        function checkIfPabRH(resolution, testPoint){
            var resolutionUsed = parseFloat(resolution);
            if(resolutionUsed >= 1){
                if (testPoint >= -20) {
                    if (testPoint <=70) {
                        return true
                    }
                }
            }
            return false
        }

        function number_format(testPoint,precision){
            return parseFloat(testPoint).toFixed(precision)
        }
        

        var symbol = ' °C';
        var symbolRH = ' %RH';

        function addTempIn(){
            if(DATAtempIn.length > 0){
                var sliderTempIn = document.getElementById('uucDecimalPointTempIn');
                var sliderCorrectionTempIn = document.getElementById('correctionDecimalPointTempIn');
                
                var body = document.getElementById('tempInBody');

                var child = body.lastElementChild; 
                while (child) {
                    body.removeChild(child);
                    child = body.lastElementChild;
                }

                var tdFront = '<th align="right" style="font-weight:normal">';
                var tdMid = "</th><th align='left' style='font-weight:normal'>";
                var tdEnd = '</th>';
                var tdIFront = '<th style="font-weight:normal"><i>';
                var tdIMid = "</i></th><th align='left' style='font-weight:normal'><i>";
                var tdIEnd = '</i></th>';

                var uucResDecimalPointsForSlider = countDecimals(DATAtempIn[0]['resUsed']);
                sliderTempIn.setAttribute('value',uucResDecimalPointsForSlider);
                var correctionDecimalPointsForSlider = countDecimals(formatNumber(DATAtempIn[0]['ExpandedUncertainty'],2))
                sliderCorrectionTempIn.setAttribute('value',correctionDecimalPointsForSlider);
                for (let i = 0; i < DATAtempIn.length -1; i++) {
                    var stdResDecimalPoints = countDecimals(DATAtempIn[0]['STDRes']);
                    var uucResDecimalPoints = sliderTempIn.value;
                    var correctionDecimalPoints = sliderCorrectionTempIn.value;
                    var lastCount = DATAtempIn.length - 1;
                    if(i == 0){
                        if (DATAtempIn[lastCount]['ExpandedUncertainty']<=0.76) {
                            correctionDecimalPoints = 2;

                        } 
                        if(checkIfPabTemp(DATAtempIn[lastCount]['resUsed'],round(2,parseFloat(DATAtempIn[lastCount]['id'])))){
                            var decimalPointsForSTDreading = countDecimals(number_format(DATAtempIn[lastCount]['ExpandedUncertainty'],correctionDecimalPoints));
                            var valueForSTDreading = number_format(round(decimalPointsForSTDreading,DATAtempIn[lastCount]['CorrectedValue']),stdResDecimalPoints);
                            var valueForUUCreading = number_format(parseFloat(DATAtempIn[lastCount]['UUCtrialAverage']),uucResDecimalPoints);
                            var correction = number_format((valueForSTDreading - valueForUUCreading),correctionDecimalPoints);
                            var Uncertainty = () => {
                                if (DATAtempIn[lastCount]['ExpandedUncertainty']<=0.76) {
                                    return 0.76;
                                } else {
                                    return formatNumber(DATAtempIn[lastCount]['ExpandedUncertainty'],2);
                                }
                            }
                            var uncertaintyRaw = DATAtempIn[lastCount]['ExpandedUncertainty'];
                            body.innerHTML += '<tr>'+tdFront+""+valueForSTDreading+""+symbol+tdEnd+""+tdFront+""+valueForUUCreading+''+symbol+tdEnd+""+tdFront+correction+symbol+tdEnd+""+tdFront+Uncertainty()+symbol+tdEnd+""+tdFront+uncertaintyRaw+symbol+tdEnd+'</tr>';
                        }else{
                            var decimalPointsForSTDreading = countDecimals(number_format(DATAtempIn[lastCount]['ExpandedUncertainty'],correctionDecimalPoints));
                            var valueForSTDreading = number_format(round(decimalPointsForSTDreading,DATAtempIn[lastCount]['CorrectedValue']),stdResDecimalPoints);
                            var valueForUUCreading = number_format(round(decimalPointsForSTDreading,DATAtempIn[lastCount]['UUCtrialAverage']),uucResDecimalPoints);
                            var correction = number_format((valueForSTDreading - valueForUUCreading),correctionDecimalPoints);
                            var Uncertainty = () => {
                                if (DATAtempIn[lastCount]['ExpandedUncertainty']<=0.76) {
                                    return 0.76;
                                } else {
                                    return formatNumber(DATAtempIn[lastCount]['ExpandedUncertainty'],2);
                                }
                            }
                            var uncertaintyRaw = DATAtempIn[lastCount]['ExpandedUncertainty'];
                            body.innerHTML += '<tr>'+tdIFront+""+valueForSTDreading+""+symbol+tdIEnd+""+tdIFront+""+valueForUUCreading+''+symbol+tdIEnd+""+tdIFront+correction+symbol+tdEnd+""+tdIFront+Uncertainty()+symbol+tdIEnd+""+tdIFront+uncertaintyRaw+symbol+tdIEnd+'</tr>';
                        }
                    }else{
                        if (DATAtempIn[i]['ExpandedUncertainty']<=0.76) {
                            correctionDecimalPoints = 2;
                        } 
                        if(checkIfPabTemp(DATAtempIn[i]['resUsed'],round(2,parseFloat(DATAtempIn[i]['id'])))){
                            var decimalPointsForSTDreading = countDecimals(number_format(DATAtempIn[i]['ExpandedUncertainty'],correctionDecimalPoints));
                            var valueForSTDreading = number_format(round(decimalPointsForSTDreading,DATAtempIn[i]['CorrectedValue']),stdResDecimalPoints);
                            var valueForUUCreading = number_format(parseFloat(DATAtempIn[i]['UUCtrialAverage']),uucResDecimalPoints);
                            var correction = number_format((valueForSTDreading - valueForUUCreading),correctionDecimalPoints);
                            var Uncertainty = () => {
                                if (DATAtempIn[i]['ExpandedUncertainty']<=0.76) {
                                    return 0.76;
                                } else {
                                    return formatNumber(DATAtempIn[i]['ExpandedUncertainty'],2);
                                }
                            }
                            var uncertaintyRaw = DATAtempIn[lastCount]['ExpandedUncertainty'];
                            body.innerHTML += '<tr>'+tdFront+""+valueForSTDreading+""+symbol+tdEnd+""+tdFront+""+valueForUUCreading+''+symbol+tdEnd+""+tdFront+correction+symbol+tdEnd+""+tdFront+Uncertainty()+symbol+tdEnd+""+tdFront+uncertaintyRaw+symbol+tdEnd+'</tr>';
                        }else{
                            var decimalPointsForSTDreading = countDecimals(number_format(DATAtempIn[i]['ExpandedUncertainty'],correctionDecimalPoints));
                            var valueForSTDreading = number_format(round(decimalPointsForSTDreading,DATAtempIn[i]['CorrectedValue']),stdResDecimalPoints);
                            var valueForUUCreading = number_format(DATAtempIn[i]['UUCtrialAverage'],uucResDecimalPoints);
                            var correction = number_format((valueForSTDreading - valueForUUCreading),correctionDecimalPoints);
                            var Uncertainty = () => {
                                if (DATAtempIn[i]['ExpandedUncertainty']<=0.76) {
                                    return 0.76;
                                } else {
                                    return formatNumber(DATAtempIn[i]['ExpandedUncertainty'],2);
                                }
                            }
                            var uncertaintyRaw = DATAtempIn[lastCount]['ExpandedUncertainty'];
                            body.innerHTML += '<tr>'+tdIFront+""+valueForSTDreading+""+symbol+tdIEnd+""+tdIFront+""+valueForUUCreading+''+symbol+tdIEnd+""+tdIFront+correction+symbol+tdEnd+""+tdIFront+Uncertainty()+symbol+tdIEnd+""+tdIFront+uncertaintyRaw+symbol+tdIEnd+'</tr>';
                        }
                    }    
                }
                document.getElementById('uucDecimalPointTempInHiddenPrev').value = sliderTempIn.value;
                document.getElementById('uucDecimalPointTempInHiddenPrevFull').value = sliderTempIn.value;
                document.getElementById('uucDecimalPointTempInHiddenDown').value = sliderTempIn.value;

                document.getElementById('correctionDecimalPointTempInHiddenPrev').value = sliderCorrectionTempIn.value;
                document.getElementById('correctionDecimalPointTempInHiddenDown').value = sliderCorrectionTempIn.value;
                document.getElementById('correctionDecimalPointTempInHiddenPrevFull').value = sliderCorrectionTempIn.value;

                
            }
        }
        function addTempOut(){
            if(DATAtempoOut.length > 0){
                var sliderTempOut = document.getElementById('uucDecimalPointTempOut');
                var sliderCorrectionTempOut = document.getElementById('correctionDecimalPointTempOut');

                var body = document.getElementById('tempOutBody');

                var child = body.lastElementChild; 
                while (child) {
                    body.removeChild(child);
                    child = body.lastElementChild;
                }

                var tdFront = '<th align="right" style="font-weight:normal">';
                var tdMid = "</th><th align='left' style='font-weight:normal'>";
                var tdEnd = '</th>';
                var tdIFront = '<th style="font-weight:normal"><i>';
                var tdIMid = "</i></th><th align='left' style='font-weight:normal'><i>";
                var tdIEnd = '</i></th>';

                var uucResDecimalPointsForSlider = countDecimals(DATAtempoOut[0]['resUsed']);
                sliderTempOut.setAttribute('value',uucResDecimalPointsForSlider);
                var correctionDecimalPointsForSlider = countDecimals(formatNumber(parseFloat(DATAtempoOut[0]['ExpandedUncertainty']),2))
                sliderCorrectionTempOut.setAttribute('value',correctionDecimalPointsForSlider);
                for (let i = 0; i < DATAtempoOut.length -1; i++) {
                    var stdResDecimalPoints = countDecimals(DATAtempoOut[0]['STDRes']);
                    var uucResDecimalPoints = sliderTempOut.value;
                    var correctionDecimalPoints = sliderCorrectionTempOut.value;
                    var lastCount = DATAtempoOut.length - 1;
                    if(i == 0){
                        if (DATAtempoOut[lastCount]['ExpandedUncertainty']<=0.76) {
                            correctionDecimalPoints = 2;

                        }
                        if(checkIfPabTemp(DATAtempoOut[lastCount]['resUsed'],round(2,parseFloat(DATAtempoOut[lastCount]['id'])))){
                            var decimalPointsForSTDreading = countDecimals(number_format(DATAtempoOut[lastCount]['ExpandedUncertainty'],correctionDecimalPoints));
                            var valueForSTDreading = number_format(round(decimalPointsForSTDreading,DATAtempoOut[lastCount]['CorrectedValue']),stdResDecimalPoints);
                            var valueForUUCreading = number_format(parseFloat(DATAtempoOut[lastCount]['UUCtrialAverage']),uucResDecimalPoints);
                            var correction = number_format((valueForSTDreading - valueForUUCreading),correctionDecimalPoints);
                            var Uncertainty = () => {
                                if (DATAtempoOut[lastCount]['ExpandedUncertainty']<=0.76) {
                                    return 0.76;
                                } else {
                                    return formatNumber(DATAtempoOut[lastCount]['ExpandedUncertainty'],2);
                                }
                            }
                            var uncertaintyRaw = DATAtempoOut[lastCount]['ExpandedUncertainty'];
                            body.innerHTML += '<tr>'+tdFront+""+valueForSTDreading+""+symbol+tdEnd+""+tdFront+""+valueForUUCreading+''+symbol+tdEnd+""+tdFront+correction+symbol+tdEnd+""+tdFront+Uncertainty()+symbol+tdEnd+""+tdFront+uncertaintyRaw+symbol+tdEnd+'</tr>';
                        }else{
                            var decimalPointsForSTDreading = countDecimals(number_format(DATAtempoOut[lastCount]['ExpandedUncertainty'],correctionDecimalPoints));
                            var valueForSTDreading = number_format(round(decimalPointsForSTDreading,DATAtempoOut[lastCount]['CorrectedValue']),stdResDecimalPoints);
                            var valueForUUCreading = number_format(round(decimalPointsForSTDreading,DATAtempoOut[lastCount]['UUCtrialAverage']),uucResDecimalPoints);
                            var correction = number_format((valueForSTDreading - valueForUUCreading),correctionDecimalPoints);
                            var Uncertainty = () => {
                                if (DATAtempoOut[lastCount]['ExpandedUncertainty']<=0.76) {
                                    return 0.76;
                                } else {
                                    return formatNumber(DATAtempoOut[lastCount]['ExpandedUncertainty'],2);
                                }
                            }
                            var uncertaintyRaw = DATAtempoOut[lastCount]['ExpandedUncertainty'];
                            body.innerHTML += '<tr>'+tdIFront+""+valueForSTDreading+""+symbol+tdIEnd+""+tdIFront+""+valueForUUCreading+''+symbol+tdIEnd+""+tdIFront+correction+symbol+tdEnd+""+tdIFront+Uncertainty()+symbol+tdIEnd+""+tdIFront+uncertaintyRaw+symbol+tdIEnd+'</tr>';
                        }
                    }else{
                        if (DATAtempoOut[i]['ExpandedUncertainty']<=0.76) {
                            correctionDecimalPoints = 2;
                        } 
                        if(checkIfPabTemp(DATAtempoOut[i]['resUsed'],round(2,parseFloat(DATAtempoOut[i]['id'])))){
                            var decimalPointsForSTDreading = countDecimals(number_format(DATAtempoOut[i]['ExpandedUncertainty'],correctionDecimalPoints));
                            var valueForSTDreading = number_format(round(decimalPointsForSTDreading,DATAtempoOut[i]['CorrectedValue']),stdResDecimalPoints);
                            var valueForUUCreading = number_format(parseFloat(DATAtempoOut[i]['UUCtrialAverage']),uucResDecimalPoints);
                            var correction = number_format((valueForSTDreading - valueForUUCreading),correctionDecimalPoints);
                            var Uncertainty = () => {
                                if (DATAtempoOut[i]['ExpandedUncertainty']<=0.76) {
                                    return 0.76;
                                } else {
                                    return formatNumber(DATAtempoOut[i]['ExpandedUncertainty'],2);
                                }
                            }
                            var uncertaintyRaw = DATAtempoOut[lastCount]['ExpandedUncertainty'];
                            body.innerHTML += '<tr>'+tdFront+""+valueForSTDreading+""+symbol+tdEnd+""+tdFront+""+valueForUUCreading+''+symbol+tdEnd+""+tdFront+correction+symbol+tdEnd+""+tdFront+Uncertainty()+symbol+tdEnd+""+tdFront+uncertaintyRaw+symbol+tdEnd+'</tr>';
                        }else{
                            var decimalPointsForSTDreading = countDecimals(number_format(DATAtempoOut[i]['ExpandedUncertainty'],correctionDecimalPoints));
                            var valueForSTDreading = number_format(round(decimalPointsForSTDreading,DATAtempoOut[i]['CorrectedValue']),stdResDecimalPoints);
                            var valueForUUCreading = number_format(DATAtempoOut[i]['UUCtrialAverage'],uucResDecimalPoints);
                            var correction = number_format((valueForSTDreading - valueForUUCreading),correctionDecimalPoints);
                            var Uncertainty = () => {
                                if (DATAtempoOut[i]['ExpandedUncertainty']<=0.76) {
                                    return 0.76;
                                } else {
                                    return formatNumber(DATAtempoOut[i]['ExpandedUncertainty'],2);
                                }
                            }
                            var uncertaintyRaw = DATAtempoOut[lastCount]['ExpandedUncertainty'];
                            body.innerHTML += '<tr>'+tdIFront+""+valueForSTDreading+""+symbol+tdIEnd+""+tdIFront+""+valueForUUCreading+''+symbol+tdIEnd+""+tdIFront+correction+symbol+tdEnd+""+tdIFront+Uncertainty()+symbol+tdIEnd+""+tdIFront+uncertaintyRaw+symbol+tdIEnd+'</tr>';
                        }
                    }    
                }

                document.getElementById('uucDecimalPointTempOutHiddenPrev').value = sliderTempOut.value
                document.getElementById('uucDecimalPointTempOutHiddenPrevFull').value = sliderTempOut.value;
                document.getElementById('uucDecimalPointTempOutHiddenDown').value = sliderTempOut.value

                document.getElementById('correctionDecimalPointTempOutHiddenPrevFull').value = sliderTempOut.value;
                document.getElementById('correctionDecimalPointTempOutHiddenDown').value = sliderTempOut.value;
                document.getElementById('correctionDecimalPointTempOutHiddenPrev').value = sliderTempOut.value;

            }
        }
        function addRhIn(){
            if(DATARHIn.length > 0){
                var sliderRhIn = document.getElementById('uucDecimalPointRhIn');
                var sliderCorrectionRhIn = document.getElementById('correctionDecimalPointRhIn');

                var body = document.getElementById('rhInBody');

                var child = body.lastElementChild; 
                while (child) {
                    body.removeChild(child);
                    child = body.lastElementChild;
                }

                var tdFront = '<th align="right" style="font-weight:normal">';
                var tdMid = "</th><th align='left' style='font-weight:normal'>";
                var tdEnd = '</th>';
                var tdIFront = '<th style="font-weight:normal"><i>';
                var tdIMid = "</i></th><th align='left' style='font-weight:normal'><i>";
                var tdIEnd = '</i></th>';

                var uucResDecimalPointsForSlider = countDecimals(DATARHIn[0]['resUsed']);
                sliderRhIn.setAttribute('value',uucResDecimalPointsForSlider);
                var correctionDecimalPointsForSlider = countDecimals(formatNumber(DATARHIn[0]['ExpandedUncertainty'],2))
                sliderCorrectionRhIn.setAttribute('value',correctionDecimalPointsForSlider);
                for (let i = 0; i < DATARHIn.length -1; i++) {
                    var stdResDecimalPoints = countDecimals(DATARHIn[0]['STDRes']);
                    var uucResDecimalPoints = sliderRhIn.value;
                    var correctionDecimalPoints = sliderCorrectionRhIn.value;
                    var lastCount = DATARHIn.length - 1;
                    if(i == 0){
                        if (DATARHIn[lastCount]['ExpandedUncertainty']<=0.76) {
                            correctionDecimalPoints = 2;

                        }
                        if(checkIfPabRH(DATARHIn[lastCount]['resUsed'],round(2,parseFloat(DATARHIn[lastCount]['id'])))){
                            var decimalPointsForSTDreading = countDecimals(number_format(DATARHIn[lastCount]['ExpandedUncertainty'],correctionDecimalPoints));
                            var valueForSTDreading = number_format(round(decimalPointsForSTDreading,DATARHIn[lastCount]['CorrectedValue']),stdResDecimalPoints);
                            var valueForUUCreading = number_format(parseFloat(DATARHIn[lastCount]['UUCtrialAverage']),uucResDecimalPoints);
                            var correction = number_format((valueForSTDreading - valueForUUCreading),correctionDecimalPoints);
                            var Uncertainty = () => {
                                if (DATARHIn[lastCount]['ExpandedUncertainty']<=0.76) {
                                    return 0.76;
                                } else {
                                    return formatNumber(DATARHIn[lastCount]['ExpandedUncertainty'],2);
                                }
                            }
                            var uncertaintyRaw = DATARHIn[lastCount]['ExpandedUncertainty'];
                            body.innerHTML += '<tr>'+tdFront+""+valueForSTDreading+""+symbolRH+tdEnd+""+tdFront+""+valueForUUCreading+''+symbolRH+tdEnd+""+tdFront+correction+symbolRH+tdEnd+""+tdFront+Uncertainty()+symbolRH+tdEnd+""+tdFront+uncertaintyRaw+symbolRH+tdEnd+'</tr>';
                        }else{
                            var decimalPointsForSTDreading = countDecimals(number_format(DATARHIn[lastCount]['ExpandedUncertainty'],correctionDecimalPoints));
                            var valueForSTDreading = number_format(round(decimalPointsForSTDreading,DATARHIn[lastCount]['CorrectedValue']),stdResDecimalPoints);
                            var valueForUUCreading = number_format(round(decimalPointsForSTDreading,DATARHIn[lastCount]['UUCtrialAverage']),uucResDecimalPoints);
                            var correction = number_format((valueForSTDreading - valueForUUCreading),correctionDecimalPoints);
                            var Uncertainty = () => {
                                if (DATARHIn[lastCount]['ExpandedUncertainty']<=0.76) {
                                    return 0.76;
                                } else {
                                    return formatNumber(DATARHIn[lastCount]['ExpandedUncertainty'],2);
                                }
                            }
                            var uncertaintyRaw = DATARHIn[lastCount]['ExpandedUncertainty'];
                            body.innerHTML += '<tr>'+tdIFront+""+valueForSTDreading+""+symbolRH+tdIEnd+""+tdIFront+""+valueForUUCreading+''+symbolRH+tdIEnd+""+tdIFront+correction+symbolRH+tdEnd+""+tdIFront+Uncertainty()+symbolRH+tdIEnd+""+tdIFront+uncertaintyRaw+symbolRH+tdIEnd+'</tr>';
                        }
                    }else{
                        if (DATARHIn[i]['ExpandedUncertainty']<=0.76) {
                            correctionDecimalPoints = 2;
                        }
                        if(checkIfPabRH(DATARHIn[i]['resUsed'],round(2,parseFloat(DATARHIn[i]['id'])))){
                            var decimalPointsForSTDreading = countDecimals(number_format(DATARHIn[i]['ExpandedUncertainty'],correctionDecimalPoints));
                            var valueForSTDreading = number_format(round(decimalPointsForSTDreading,DATARHIn[i]['CorrectedValue']),stdResDecimalPoints);
                            var valueForUUCreading = number_format(parseFloat(DATARHIn[i]['UUCtrialAverage']),uucResDecimalPoints);
                            var correction = number_format((valueForSTDreading - valueForUUCreading),correctionDecimalPoints);
                            var Uncertainty = () => {
                                if (DATARHIn[i]['ExpandedUncertainty']<=0.76) {
                                    return 0.76;
                                } else {
                                    return formatNumber(DATARHIn[i]['ExpandedUncertainty'],2);
                                }
                            }
                            var uncertaintyRaw = DATARHIn[lastCount]['ExpandedUncertainty'];
                            body.innerHTML += '<tr>'+tdFront+""+valueForSTDreading+""+symbolRH+tdEnd+""+tdFront+""+valueForUUCreading+''+symbolRH+tdEnd+""+tdFront+correction+symbolRH+tdEnd+""+tdFront+Uncertainty()+symbolRH+tdEnd+""+tdFront+uncertaintyRaw+symbolRH+tdEnd+'</tr>';
                        }else{
                            var decimalPointsForSTDreading = countDecimals(number_format(DATARHIn[i]['ExpandedUncertainty'],correctionDecimalPoints));
                            var valueForSTDreading = number_format(round(decimalPointsForSTDreading,DATARHIn[i]['CorrectedValue']),stdResDecimalPoints);
                            var valueForUUCreading = number_format(DATARHIn[i]['UUCtrialAverage'],uucResDecimalPoints);
                            var correction = number_format((valueForSTDreading - valueForUUCreading),correctionDecimalPoints);
                            var Uncertainty = () => {
                                if (DATARHIn[i]['ExpandedUncertainty']<=0.76) {
                                    return 0.76;
                                } else {
                                    return formatNumber(DATARHIn[i]['ExpandedUncertainty'],2);
                                }
                            }
                            var uncertaintyRaw = DATARHIn[lastCount]['ExpandedUncertainty'];
                            body.innerHTML += '<tr>'+tdIFront+""+valueForSTDreading+""+symbolRH+tdIEnd+""+tdIFront+""+valueForUUCreading+''+symbolRH+tdIEnd+""+tdIFront+correction+symbolRH+tdEnd+""+tdIFront+Uncertainty()+symbolRH+tdIEnd+""+tdIFront+uncertaintyRaw+symbolRH+tdIEnd+'</tr>';
                        }
                    }    
                }
                

                document.getElementById('uucDecimalPointRhInHiddenPrev').value = sliderRhIn.value;
                document.getElementById('uucDecimalPointRhInHiddenPrevFull').value = sliderRhIn.value;
                document.getElementById('uucDecimalPointRhInHiddenDown').value = sliderRhIn.value

                document.getElementById('correctionDecimalPointRhInHiddenPrevFull').value = sliderCorrectionRhIn.value;
                document.getElementById('correctionDecimalPointRhInHiddenDown').value = sliderCorrectionRhIn.value;
                document.getElementById('correctionDecimalPointRhInHiddenPrev').value = sliderCorrectionRhIn.value;
                
            }
        }
        function addRhOut(){
            if(DATARHOut.length > 0){
                var sliderRhOut = document.getElementById('uucDecimalPointRhOut');
                var sliderCorrectionRhOut = document.getElementById('correctionDecimalPointRhOut');

                var body = document.getElementById('rhOutBody');

                var child = body.lastElementChild; 
                while (child) {
                    body.removeChild(child);
                    child = body.lastElementChild;
                }

                var tdFront = '<th align="right" style="font-weight:normal">';
                var tdMid = "</th><th align='left' style='font-weight:normal'>";
                var tdEnd = '</th>';
                var tdIFront = '<th style="font-weight:normal"><i>';
                var tdIMid = "</i></th><th align='left' style='font-weight:normal'><i>";
                var tdIEnd = '</i></th>';

                var uucResDecimalPointsForSlider = countDecimals(DATARHOut[0]['resUsed']    );
                sliderRhOut.setAttribute('value',uucResDecimalPointsForSlider);
                var correctionDecimalPointsForSlider = countDecimals(formatNumber(DATARHOut[0]['ExpandedUncertainty'],2))
                sliderCorrectionRhOut.setAttribute('value',correctionDecimalPointsForSlider);
                for (let i = 0; i < DATARHOut.length -1; i++) {
                    var stdResDecimalPoints = countDecimals(DATARHOut[0]['STDRes']);
                    var uucResDecimalPoints = sliderRhOut.value;
                    var correctionDecimalPoints = sliderCorrectionRhOut.value;
                    var lastCount = DATARHOut.length - 1;
                    if(i == 0){
                        if (DATARHOut[lastCount]['ExpandedUncertainty']<=0.76) {
                            correctionDecimalPoints = 2;

                        } 
                        if(checkIfPabRH(DATARHOut[lastCount]['resUsed'],round(2,parseFloat(DATARHOut[lastCount]['id'])))){
                            var decimalPointsForSTDreading = countDecimals(number_format(DATARHOut[lastCount]['ExpandedUncertainty'],correctionDecimalPoints));
                            var valueForSTDreading = number_format(round(decimalPointsForSTDreading,DATARHOut[lastCount]['CorrectedValue']),stdResDecimalPoints);
                            var valueForUUCreading = number_format(parseFloat(DATARHOut[lastCount]['UUCtrialAverage']),uucResDecimalPoints);
                            var correction = number_format((valueForSTDreading - valueForUUCreading),correctionDecimalPoints);
                            var Uncertainty = () => {
                                if (DATARHOut[lastCount]['ExpandedUncertainty']<=0.76) {
                                    return 0.76;
                                } else {
                                    return formatNumber(DATARHOut[lastCount]['ExpandedUncertainty'],2);
                                }
                            }
                            var uncertaintyRaw = DATARHOut[lastCount]['ExpandedUncertainty'];
                            body.innerHTML += '<tr>'+tdFront+""+valueForSTDreading+""+symbolRH+tdEnd+""+tdFront+""+valueForUUCreading+''+symbolRH+tdEnd+""+tdFront+correction+symbolRH+tdEnd+""+tdFront+Uncertainty()+symbolRH+tdEnd+""+tdFront+uncertaintyRaw+symbolRH+tdEnd+'</tr>';
                        }else{
                            var decimalPointsForSTDreading = countDecimals(number_format(DATARHOut[lastCount]['ExpandedUncertainty'],correctionDecimalPoints));
                            var valueForSTDreading = number_format(round(decimalPointsForSTDreading,DATARHOut[lastCount]['CorrectedValue']),stdResDecimalPoints);
                            var valueForUUCreading = number_format(round(decimalPointsForSTDreading,DATARHOut[lastCount]['UUCtrialAverage']),uucResDecimalPoints);
                            var correction = number_format((valueForSTDreading - valueForUUCreading),correctionDecimalPoints);
                            var Uncertainty = () => {
                                if (DATARHOut[lastCount]['ExpandedUncertainty']<=0.76) {
                                    return 0.76;
                                } else {
                                    return formatNumber(DATARHOut[lastCount]['ExpandedUncertainty'],2);
                                }
                            }
                            var uncertaintyRaw = DATARHOut[lastCount]['ExpandedUncertainty'];
                            body.innerHTML += '<tr>'+tdIFront+""+valueForSTDreading+""+symbolRH+tdIEnd+""+tdIFront+""+valueForUUCreading+''+symbolRH+tdIEnd+""+tdIFront+correction+symbolRH+tdEnd+""+tdIFront+Uncertainty()+symbolRH+tdIEnd+""+tdIFront+uncertaintyRaw+symbolRH+tdIEnd+'</tr>';
                        }
                    }else{
                        if (DATARHOut[i]['ExpandedUncertainty']<=0.76) {
                            correctionDecimalPoints = 2;
                        }
                        if(checkIfPabRH(DATARHOut[i]['resUsed'],round(2,parseFloat(DATARHOut[i]['id'])))){
                            var decimalPointsForSTDreading = countDecimals(number_format(DATARHOut[i]['ExpandedUncertainty'],correctionDecimalPoints));
                            var valueForSTDreading = number_format(round(decimalPointsForSTDreading,DATARHOut[i]['CorrectedValue']),stdResDecimalPoints);
                            var valueForUUCreading = number_format(parseFloat(DATARHOut[i]['UUCtrialAverage']),uucResDecimalPoints);
                            var correction = number_format((valueForSTDreading - valueForUUCreading),correctionDecimalPoints);
                            var Uncertainty = () => {
                                if (DATARHOut[i]['ExpandedUncertainty']<=0.76) {
                                    return 0.76;
                                } else {
                                    return formatNumber(DATARHOut[i]['ExpandedUncertainty'],2);
                                }
                            }
                            var uncertaintyRaw = DATARHOut[lastCount]['ExpandedUncertainty'];
                            body.innerHTML += '<tr>'+tdFront+""+valueForSTDreading+""+symbolRH+tdEnd+""+tdFront+""+valueForUUCreading+''+symbolRH+tdEnd+""+tdFront+correction+symbolRH+tdEnd+""+tdFront+Uncertainty()+symbolRH+tdEnd+""+tdFront+uncertaintyRaw+symbolRH+tdEnd+'</tr>';
                        }else{
                            var decimalPointsForSTDreading = countDecimals(number_format(DATARHOut[i]['ExpandedUncertainty'],correctionDecimalPoints));
                            var valueForSTDreading = number_format(round(decimalPointsForSTDreading,DATARHOut[i]['CorrectedValue']),stdResDecimalPoints);
                            var valueForUUCreading = number_format(DATARHOut[i]['UUCtrialAverage'],uucResDecimalPoints);
                            var correction = number_format((valueForSTDreading - valueForUUCreading),correctionDecimalPoints);
                            var Uncertainty = () => {
                                if (DATARHOut[i]['ExpandedUncertainty']<=0.76) {
                                    return 0.76;
                                } else {
                                    return formatNumber(DATARHOut[i]['ExpandedUncertainty'],2);
                                }
                            }
                            var uncertaintyRaw = DATARHOut[lastCount]['ExpandedUncertainty'];
                            body.innerHTML += '<tr>'+tdIFront+""+valueForSTDreading+""+symbolRH+tdIEnd+""+tdIFront+""+valueForUUCreading+''+symbolRH+tdIEnd+""+tdIFront+correction+symbolRH+tdEnd+""+tdIFront+Uncertainty()+symbolRH+tdIEnd+""+tdIFront+uncertaintyRaw+symbolRH+tdIEnd+'</tr>';
                        }
                    }    
                }
                document.getElementById('uucDecimalPointRhOutHiddenPrev').value = sliderRhOut.value
                document.getElementById('uucDecimalPointRhOutHiddenPrevFull').value = sliderRhOut.value;
                document.getElementById('uucDecimalPointRhOutHiddenDown').value = sliderRhOut.value

                document.getElementById('correctionDecimalPointRhOutHiddenPrevFull').value = sliderCorrectionRhOut.value;
                document.getElementById('correctionDecimalPointRhOutHiddenDown').value = sliderCorrectionRhOut.value;
                document.getElementById('correctionDecimalPointRhOutHiddenPrev').value = sliderCorrectionRhOut.value;
                
            }

        }

        addTempIn();
        addTempOut();
        addRhIn();
        addRhOut();

        function pageHere() {
            var pageToPrint = document.querySelector('input[name="page2"]:checked').value;
            document.getElementById("pagerPrev").value = pageToPrint;
            document.getElementById("pagerDown").value = pageToPrint;
            document.getElementById("pagerFull").value = pageToPrint;
        }

     document.getElementById('datePicker').valueAsDate = new Date(); 
    </script>
     <script>
        var role = '<?= $_SESSION['role'];?>';
        var page = '<?= $forVerification;?>';
        
        if(role == 'admin' && page == 'forVerification'){
            var div = document.getElementById('forverification');
            var buttonDiv = document.getElementById('forVerificationButtons');
            var backButton = document.getElementById('backButton');

            
            var a = document.createElement('a');
            a.setAttribute('class', 'btn btn-info')
            a.setAttribute('href', '<?= base_url('thermoUpdate/'.$thermoData['id'].'/forVerification') ?>');
            a.innerHTML = '<i class="fas fa-clipboard-list-check"></i> Check Input';
            div.appendChild(a);

            var verifyButton = document.createElement('button');
            var correctionButton = document.createElement('button');

            verifyButton.setAttribute('type', 'button');
            correctionButton.setAttribute('type', 'button');
            verifyButton.setAttribute('class', 'btn btn-success mr-3');
            correctionButton.setAttribute('class', 'btn btn-danger');
            verifyButton.setAttribute('onclick', 'verify()');
            correctionButton.setAttribute('onclick', 'correction()');

            backButton.setAttribute('href','/forVerifyTable');

            verifyButton.innerHTML = "Verify";
            correctionButton.innerHTML = "For Correction";
            buttonDiv.appendChild(verifyButton);
            buttonDiv.appendChild(correctionButton);
        }   else {
            var backButton = document.getElementById('backButton');
            backButton.setAttribute('href','/thermoTable');            
        }

        function verify(){
            if(confirm("Are you sure you want to proceed?") == true){
                document.verifyForm.submit();
            }
        }
        function correction(){
            if(confirm("Are you sure you want to proceed?") == true){
                document.correctionForm.submit();
            }
        }

        

    </script>

</html>   