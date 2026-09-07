<?php
    use App\Models\ElectModel_image;
    use App\Models\ThermoStandard;
    $electStandardTable = new ThermoStandard();
    $arrayOfWeights = $thermoData['standardAndAccessories'];
    $pieces = explode("(SPLIT)", $arrayOfWeights);
    $thermoStandard[] = $electStandardTable->whereIn('serialNumber',  $pieces)->findAll();
   
    $electImageTable = new ElectModel_image();
    $image[] = $electImageTable->where('idOfCertificate',  $thermoData['id'])->findAll();

    $path = 'image/dost.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    $pathPAB = 'image/pab logo.png';
    $typePAB = pathinfo($pathPAB, PATHINFO_EXTENSION);
    $dataPAB = file_get_contents($pathPAB);
    $base64PAB = 'data:image/' . $typePAB . ';base64,' . base64_encode($dataPAB);

    $datas = json_decode($thermoData['datas'],true);
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
   <style>
        <?php include 'css/bootstrap.css'; ?>
        .hidden{
            display:none;
        }
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
                    
                    <!-- <?php  //if(count($DATAtempIn)!=0){echo '<div class="col-xl-6 col-sm-6"><label class="">Resolution (temperature): </label><h4 class="mt-n2">'.$DATAtempIn[0]['resUsed'].' °C</h4></div>';} ?>

                    <?php  //if(count($DATARHIn)!=0){echo '<div class="col-xl-2 col-sm-6"><label class="">Resolution (humidity): </label><h4 class="mt-n2">'.$DATARHIn[0]['resUsed'].' % RH</h4></div>';} ?> -->
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
                        <input type="date" class="form-control" id="datePicker"  onchange="document.getElementById('datePrevDown').value = this.value;">
                    </div>
                </div>
              
               <hr>

                   

                <div id="measurementData">
                    
                </div>
                <input class="btn btn-warning" type="button" value="Save Decimal Points" onclick="saveCustomRange()">


               

            
                
                
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

            <form action="<?= base_url('thermoSaveCustomDecimal') ?>" method="POST" name='customDecimalForm'>
                <input type="hidden" name="customDecimalPlace" id="customDecimalPlace">
                <input type="hidden" name="type" value="new">
                <input type="hidden" name="idHere" value="<?=$thermoData['id']?>">                        
            </form>
            
            <hr>   
            <div class="form-group row hidden">
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
                    <input type="hidden" name="comment" id="commentHidden"></input>
                </form>
            </div>
                    

            <div class="btn-group" role="group" style="position:fixed;display:flex; flex-direction:row;align-content:center; bottom:0; z-index:99; border:solid 0px">
                <form class="btn" action="<?= base_url('ThermoToPdfNew/'.$thermoData['id']) ?>" method="POST" target="_blank" id="printForm" name="printForm" rel="noopener">
                    <input type="hidden" name="datePrevDown" id="datePrevDown" value="<?= $thermoData['dateOfIssue']?>">
                    <input type="hidden" name="decimalCount" id="decimalCount">
                    <input type="hidden" name="typeOfPrint" id="typeOfPrint">
                    <input type="hidden" name="imageDraftDown" id='imageDraftDown' value="false">                    
                </form>
                <div class="btn">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#previewModal" onclick="print('preview')">
                        <i class="far fa-eye"></i> Preview PDF
                    </button>
                </div>
                <div class="btn">
                    <button type="button" class="btn btn-info" onclick="setToNotDraft();print('download')">
                        <i class="fas fa-file-download"></i>Download PDF
                    </button>
                </div>
                
                <div class="btn">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#EditModal">
                    <i class="fas fa-edit"></i>   
                    Edit Remarks
                    </button>
                </div>
                <div class="btn">
                    <button type="button" class="btn btn-success" onclick="setToDraft();print('download')">
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
                <button type="submit" class="btn btn-info" onclick="print('fullPreview')">
                    View PDF
                </button>
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
                        <?php
                            if(count($image)>0){
                                for ($i=0; $i < count($image[0]) ; $i++) { 
                                    if($i==0){
                                        echo ' <img src="/uploads/'.$image[0][$i]['image'].'"  width="100%" height="100%" style="border:1px solid black"alt="No Image">';
                                    }else{
                                        echo ' <img src="/uploads/'.$image[0][$i]['image'].'"  width="100%" height="100%" style="border:1px solid black"alt="No Image">';
                                    }
                                }
                            }else{
                                echo " ";
                            }
                            
                        ?>
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
                        <input type="hidden" name="type" value="new">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/js/ElectEdit.js"></script>

    <script>
        var countOfRemarks = 0;
        var remarkRaw = "<?=$thermoData['settingRemarks1']?>";
        function setDate(dateVal){
            if(dateVal!= ''){
                document.getElementById('datePicker').value = dateVal;
            }else{
                document.getElementById('datePicker').valueAsDate = new Date(); 
            }
        }
        setDate('<?= $thermoData['dateOfIssue']?>');
        
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
        
        var datas = <?=json_encode($datas);?>;

        function setToDraft(){
            document.getElementById('imageDraftDown').value = 'true';
        }    

        function setToNotDraft(){
            document.getElementById('imageDraftDown').value = 'false';
        }

        var countDecimals = function(value) {
            let text = value.toString()
            arrayOfValue = text.split(".");
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

        function print(type){
            if(type == 'download'){
                var form = document.getElementById('printForm');
                form.setAttribute('target', '_blank');
                var typeElementHudden = document.getElementById('typeOfPrint');
                typeElementHudden.value = type;
                document.printForm.submit();
            }
            if(type == 'preview'){
                var form = document.getElementById('printForm');
                form.setAttribute('target', 'iframeHere');
                var typeElementHudden = document.getElementById('typeOfPrint');
                typeElementHudden.value = type;
                document.printForm.submit();
            }
            if(type == 'fullPreview'){
                var form = document.getElementById('printForm');
                form.setAttribute('target', '_blank');
                var typeElementHudden = document.getElementById('typeOfPrint');
                typeElementHudden.value = type;
                document.printForm.submit();
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

        var customDecimalPlaces = <?php
            if($thermoData['customDecimalPlace']==NULL){
                echo '{}';
            }else{
                echo $thermoData['customDecimalPlace'];
            }
        ?>;

        function addMeasurementData(){
            var tableContainer = document.getElementById('measurementData');
            for (var key in datas) {
                var table = document.createElement('table');
                table.setAttribute('class', 'table table-bordered');
                var thead = document.createElement('thead');
                var tbody = document.createElement('tbody');
                tbody.setAttribute('class','table-hover');
                var obj = datas[key];  
                var countOfTable = Object.keys(datas[key]['inputs']).length;
               
                var tr = document.createElement('tr');
                var td = document.createElement('td');
                var nameForRange = datas[key].functionType + "" + datas[key].channelName;

                var functionType = datas[key].functionType == 'Temp' ? 'Temperature': "Relative humidity"

                // td.innerHTML = "<b>" + datas[key].functionType + " " + datas[key].channelName + "</b>";
                td.innerHTML = "<b>" + functionType + " " + datas[key].channelName + "</b>";
                td.setAttribute('colspan', '4');
                td.setAttribute('style', 'text-align: center');
                tr.appendChild(td);
                thead.appendChild(tr);

                var uncertaintyWithFormat = formatNumber(datas[key]['caluculated']['Row'+countOfTable].expandedUncertainty,2);
                var uncertainty = datas[key]['caluculated']['Row'+countOfTable].expandedUncertainty;
                var standardReading = datas[key]['inputs']['Row'+countOfTable].correctedValue;
                var uucReading = datas[key]['inputs']['Row'+countOfTable].uucAverage;
                var correction = parseFloat(standardReading) - parseFloat(uucReading);
                var uucReadingDecimalPoint = countDecimals(uucReading);
                var standardResolution = countDecimals(datas[key]['inputs']['Row'+countOfTable].standardResolution);
                var uucResolution = countDecimals(datas[key]['inputs']['Row'+countOfTable].resolution);
                var uncertaintyDecimalPoint = countDecimals(uncertaintyWithFormat);

                var correctionWithFormat = number_format(correction,uncertaintyDecimalPoint);
                var correctionWithFormatDecimalPoint = countDecimals(correctionWithFormat);
                var standardReadingWithFormat = number_format(round(uncertaintyDecimalPoint, standardReading),standardResolution);
                var uucReadingWithFormat = number_format(round(uncertaintyDecimalPoint, uucReading),uucResolution);
                

                
                var tr = document.createElement('tr');
                var td1 = document.createElement('th');
                var td2 = document.createElement('th');
                var td3 = document.createElement('th');
                var td4 = document.createElement('th');
                var td5 = document.createElement('th');
                td1.innerHTML = 'Standard Reading';

                if('uucCustomReading'+nameForRange in customDecimalPlaces ){
                    td2.innerHTML = '<label for="uucCustomReading'+nameForRange+'" class="form-label mr-3" style="vertical-align: super;">UUC Reading</label><input oninput="adjustUUCDecimalPoint(`'+nameForRange+'`, this.value);this.setAttribute(`value`,this.value);" type="range" class="form-range" min="0" max="16" value="'+customDecimalPlaces['uucCustomReading'+nameForRange]+'" step="1" id="uucCustomReading'+nameForRange+'" style="width: 50%;">';
                    td3.innerHTML = '<label for="correctionCustom'+nameForRange+'" class="form-label mr-3" style="vertical-align: super;">Correction</label><input oninput="adjustCorrectionDecimalPoint(`'+nameForRange+'`,  this.value);this.setAttribute(`value`,this.value);" type="range" class="form-range" min="0" max="16" value="'+customDecimalPlaces['correctionCustom'+nameForRange]+'" step="1" id="correctionCustom'+nameForRange+'" style="width: 50%;">';
                }else{
                    td2.innerHTML = '<label for="uucCustomReading'+nameForRange+'" class="form-label mr-3" style="vertical-align: super;">UUC Reading</label><input oninput="adjustUUCDecimalPoint(`'+nameForRange+'`, this.value);this.setAttribute(`value`,this.value);" type="range" class="form-range" min="0" max="16" value="'+uucResolution+'" step="1" id="uucCustomReading'+nameForRange+'" style="width: 50%;">';
                    td3.innerHTML = '<label for="correctionCustom'+nameForRange+'" class="form-label mr-3" style="vertical-align: super;">Correction</label><input oninput="adjustCorrectionDecimalPoint(`'+nameForRange+'`,  this.value);this.setAttribute(`value`,this.value);" type="range" class="form-range" min="0" max="16" value="'+uncertaintyDecimalPoint+'" step="1" id="correctionCustom'+nameForRange+'" style="width: 50%;">';
                }
                
                td4.innerHTML = 'Uncertainty at 2 significant values';
                td5.innerHTML = 'Uncertainty Calculated';
                tr.appendChild(td1);
                tr.appendChild(td2);
                tr.appendChild(td3);
                tr.appendChild(td4);
                tr.appendChild(td5);
                thead.appendChild(tr);
                for (let i = 1; i <= countOfTable-1; i++) {
                    if(i == 1){
                        var tr = document.createElement('tr');
                        var td1 = document.createElement('td');
                        var td2 = document.createElement('td');
                        var td3 = document.createElement('td');
                        var td4 = document.createElement('td');
                        var td5 = document.createElement('td');
                        tr.setAttribute('id', nameForRange+'Row'+i);
                        td1.setAttribute('id', nameForRange+'standardReading'+i);
                        td2.setAttribute('id', nameForRange+'uucReadingRow'+i);
                        td3.setAttribute('id', nameForRange+'correctionRow'+i);
                        td4.setAttribute('id', nameForRange+'uncertainty'+i);
                        td5.setAttribute('id', nameForRange+'uncertainty2'+i);
                        td1.setAttribute('data-originalValue', standardReading);
                        td1.setAttribute('data-standardResolutionCount', standardResolution);
                        td2.setAttribute('data-originalValue', uucReading);
                        td2.setAttribute('data-resolutionCount', uucResolution);
                        td3.setAttribute('data-originalValue', correction);
                        td1.innerHTML = standardReadingWithFormat;
                        td2.innerHTML = uucReadingWithFormat;
                        td3.innerHTML = correctionWithFormat;
                        td4.innerHTML = uncertaintyWithFormat;
                        td5.innerHTML = uncertainty;
                        tr.appendChild(td1);
                        tr.appendChild(td2);
                        tr.appendChild(td3);
                        tr.appendChild(td4);
                        tr.appendChild(td5);

                        tbody.appendChild(tr);
                    }else{
                        var uncertaintyWithFormat = formatNumber(datas[key]['caluculated']['Row'+i].expandedUncertainty,2);
                        var uncertainty = datas[key]['caluculated']['Row'+i].expandedUncertainty;
                        var standardReading = datas[key]['inputs']['Row'+i].correctedValue;
                        var uucReading = datas[key]['inputs']['Row'+i].uucAverage;
                        var correction = parseFloat(standardReading) - parseFloat(uucReading);
                        var uucReadingDecimalPoint = countDecimals(uucReading);
                        var standardResolution = countDecimals(datas[key]['inputs']['Row'+i].standardResolution);
                        var uucResolution = countDecimals(datas[key]['inputs']['Row'+i].resolution);
                        var uncertaintyDecimalPoint = countDecimals(uncertaintyWithFormat);

                        var standardReadingWithFormat = number_format(round(uncertaintyDecimalPoint, standardReading),standardResolution);
                        var uucReadingWithFormat = number_format(round(uncertaintyDecimalPoint, uucReading),uucResolution);
                        var correctionWithFormat = number_format(correction,uncertaintyDecimalPoint);
                        var tr = document.createElement('tr');
                        var td1 = document.createElement('td');
                        var td2 = document.createElement('td');
                        var td3 = document.createElement('td');
                        var td4 = document.createElement('td');
                        var td5 = document.createElement('td');
                        tr.setAttribute('id', nameForRange+'Row'+i);
                        td1.setAttribute('id', nameForRange+'standardReading'+i);
                        td2.setAttribute('id', nameForRange+'uucReadingRow'+i);
                        td3.setAttribute('id', nameForRange+'correctionRow'+i);
                        td4.setAttribute('id', nameForRange+'uncertainty'+i);
                        td5.setAttribute('id', nameForRange+'uncertainty2'+i);
                        td1.setAttribute('data-originalValue', standardReading);
                        td1.setAttribute('data-standardResolutionCount', standardResolution);
                        td2.setAttribute('data-originalValue', uucReading);
                        td2.setAttribute('data-resolutionCount', uucResolution);
                        td3.setAttribute('data-originalValue', correction);
                        td1.innerHTML = standardReadingWithFormat;
                        td2.innerHTML = uucReadingWithFormat;
                        td3.innerHTML = correctionWithFormat;
                        td4.innerHTML = uncertaintyWithFormat;
                        td5.innerHTML = uncertainty;
                        tr.appendChild(td1);
                        tr.appendChild(td2);
                        tr.appendChild(td3);
                        tr.appendChild(td4);
                        tr.appendChild(td5);

                        tbody.appendChild(tr);
                    }
                }

                table.appendChild(thead);
                table.appendChild(tbody);
                tableContainer.appendChild(table);

                
                $('#uucCustomReading'+nameForRange).trigger("input");
                $('#correctionCustom'+nameForRange).trigger("input");
            }
        }
        addMeasurementData();

        const changeSliderValue = () => {
            document.getElementById('uucReadingTempIn')
        }

        function adjustUUCDecimalPoint(key, value){
            $("td[id*='"+key+"uucReading']").each(function(e){
                var inputValue = parseFloat($(this).data("originalvalue"));
                var converted = number_format(inputValue,value);
                $(this).html(converted);
                
            });
        }
        function adjustCorrectionDecimalPoint(key, value){
            var standardReadingFormat = 0;
            var uucReadingFormat = 0;
            $("tr[id*='"+key+"Row']").each(function(i,tr){
                //console.log('tr')
                $(tr).children("td").each(function(ii,td){
                    if($(td).attr('id').includes('standardReading')){
                      
                        // let inputValue = parseFloat($(this).data("originalvalue"));
                        // let resolution = $(this).data("standardresolutioncount");
                        // standardReadingFormat = number_format(round(value, inputValue),resolution);
                        standardReadingFormat = parseFloat($(this).html());
                    }
                    else if($(td).attr('id').includes('uucReading')){
                      
                        //let inputValue = parseFloat($(this).data("originalvalue"));
                        //let resolution = $(this).data("resolutioncount");
                        //uucReadingFormat = number_format(round(value, inputValue),resolution);
                        uucReadingFormat = parseFloat($(this).html());
                       
                    }
                    else if($(td).attr('id').includes('correction')){
                       
                        // let correctionResult = standardReadingFormat-uucReadingFormat;
                        let correctionResult = standardReadingFormat-uucReadingFormat;
                      
                        //var correctionResult = parseFloat($(this).data("originalvalue"));
                        let converted = number_format(correctionResult,value);
                        $(this).html(converted);
                    }
                    else{
                        //console.log(ii);
                    }
                })
                
               
                // $("td[id*='"+key+"standardReading']").each(function(e){
                //     var inputValue = parseFloat($(this).data("originalvalue"));
                //     var resolution = $(this).data("standardresolutioncount");
                //     standardReadingFormat = number_format(round(value, inputValue),resolution);
                // });
                // $("td[id*='"+key+"uucReading']").each(function(e){
                //     var inputValue = parseFloat($(this).data("originalvalue"));
                //     var resolution = $(this).data("resolutioncount");
                //     uucReadingFormat = number_format(round(value, inputValue),resolution);
                // });
                // $("td[id*='"+key+"correction']").each(function(e){
                //     var correctionResult = standardReadingFormat-uucReadingFormat;
                //     var converted = number_format(correctionResult,value);

                //     $(this).html(converted);
                // });
            });
            
        }

        function pageHere() {
            var pageToPrint = document.querySelector('input[name="page2"]:checked').value;
            document.getElementById("pagerPrev").value = pageToPrint;
            document.getElementById("pagerDown").value = pageToPrint;
            document.getElementById("pagerFull").value = pageToPrint;
        }

        function deleteConfirmation(url){
            // windows.confirm("are u sure?");
            href="" 
            var txt;
            if (confirm("Do you want to delete?")) {
                location.href = url;
            }
        }

        function getValueOfCustomRange(){
            var measurementData= $("#measurementData");
            var ranges = measurementData.find("input[type=range]");
            let objectForCustom = {};
            ranges.each(function( index ) {
                let idOfSlider = $( this ).attr('id');
                let valOfSlider = $( this ).attr('value');
                objectForCustom[idOfSlider] = valOfSlider;
            });

            return JSON.stringify(objectForCustom);
        }

        function saveCustomRange(){
            let result = getValueOfCustomRange();
            $('#customDecimalPlace').val(result);
            document.customDecimalForm.submit();
        }
    </script>
     <script>
        var role = '<?= $_SESSION['role'];?>';
        var page = '<?= $forVerification;?>';
        const getComment = () => {
            var hiddenComment = document.getElementById('commentHidden');
            var displayedComment = document.getElementById('displayedComment');
            hiddenComment.value = displayedComment.value
        }
        if(role == 'admin' && page == 'forVerification'){
            var div = document.getElementById('forverification');
            var buttonDiv = document.getElementById('forVerificationButtons');
            var backButton = document.getElementById('backButton');
			var hiddenComment = document.getElementById('commentHidden');

            
            var a = document.createElement('a');
            a.setAttribute('class', 'btn btn-info')
            a.setAttribute('href', '<?= base_url('thermoUpdate/'.$thermoData['id'].'/forVerification') ?>');
            a.innerHTML = '<i class="fas fa-clipboard-list-check"></i> Check Input';
            div.appendChild(a);

            var verifyButton = document.createElement('button');
            var correctionButton = document.createElement('button');
            var textArea = document.createElement('textarea');

			textArea.setAttribute('rows','4');
			textArea.setAttribute('cols','50');
			textArea.setAttribute('placeholder','Comments');
			textArea.setAttribute('class','mt-3 row w-100');
			textArea.setAttribute('oninput', 'getComment()')
			textArea.setAttribute('id','displayedComment')

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
            buttonDiv.appendChild(textArea);
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