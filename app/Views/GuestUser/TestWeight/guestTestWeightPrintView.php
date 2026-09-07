<?php
    use App\Models\ElectModel_image;
    use App\Models\TestWeightStandardDetailsModel;
    $TestWeightStandardDetailsModel = new TestWeightStandardDetailsModel();
    $arrayOfWeights = $testWeightData['serialNumberStandard'];
    $pieces = explode(",", $arrayOfWeights);
    $testWeightStandard[] = $TestWeightStandardDetailsModel->whereIn('serialNumber',  $pieces)->findAll();


    $testWeightALLDATA = $testWeightData['allData'];
   
    $electImageTable = new ElectModel_image();
    $image[] = $electImageTable->where('certificateNumber',  $testWeightData['certificateNumber'])->first();

    $path = 'image/dost.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    $pathPAB = 'image/pab logo.png';
    $typePAB = pathinfo($pathPAB, PATHINFO_EXTENSION);
    $dataPAB = file_get_contents($pathPAB);
    $base64PAB = 'data:image/' . $typePAB . ';base64,' . base64_encode($dataPAB);
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
                    <h1 class="card-title mt-4">Test weight</h1>
                    <h4 class="card-title mb-4">Calibration Certificate (View)</h4></div>
                    <div class="col-xl-2 col-md-2 col-sm-3 col-6 text-center float-center mr-5">
                    
                    <form action="<?= base_url('UpdatePabLogoTestWeight') ?>" method="POST" id="pabForm">
                        <div class="input-group mb-3">
                            <input type="hidden" value="<?php echo $testWeightData['id']; ?>" name="id">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                <?php if($testWeightData['PabLogo']=='true'){
                                    echo '<input type="checkbox" checked id="checkBoxPabLogo" onclick="pabLOGO(\''.$base64PAB.'\');">';
                                }else{
                                    echo '<input type="checkbox" id="checkBoxPabLogo" onclick="pabLOGO(\''.$base64PAB.'\');">';
                                }?>
                                    <input type="hidden" value="" name="pablogoValue" id="pablogoValue">
                                </div>
                            </div>
                            <Label for="checkBoxPabLogo">
                                <?php if($testWeightData['PabLogo']=='true'){
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
                    <h4 class="mt-n2"><?php echo $testWeightData['certificateNumber']?></h4>   
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-6 text-left">
                    <label>Customer:</label> 
                    <h4 class="mt-n2"><?php echo $testWeightData['customer']?></h4>   
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-6 text-left">
                    <label>Address:</label> 
                    <h4 class="mt-n2"><?php echo $testWeightData['address']?></h4>   
                </div>
            </div>

             <div class="row">
                    <div class="col-xl-6 col-sm-6 text-left">
                        <label>Equipment Description: </label>
                        <h4 class="mt-n2"><?php echo $testWeightData['equipmentDescription']?></h4>  
                    </div>
                    <div class="col-xl-2 col-sm-6 text-left">
                        <label class="">Date Received: </label>
                        <h4 class="mt-n2">
                        <?php 
                            $date = $testWeightData['dateReceived']; 
                            $mysql_date = date('Y-m-d G:i:s', strtotime($date));
                            $date2 = $testWeightData['dateCalibrated']; 
                            $mysql_date2 = date('Y-m-d G:i:s', strtotime($date2));
                            $date3 = $testWeightData['recommendedDueDate']; 
                            $mysql_date3 = date('Y-m-d G:i:s', strtotime($date3));
                        ?>
                        <?php echo date('d F Y', strtotime($mysql_date));?></h4> 
                    </div>
                </div>


                <div class="row text-left">
                    <div class="col-xl-6 col-sm-6">
                        <label>Manufacturer: </label>
                        <h4 class="mt-n2"><?php echo $testWeightData['manufacturer']?></h4>    
                    </div>
                    <div class="col-xl-2 col-sm-6">
                        <label class="">Date Calibrated: </label>
                        <h4 class="mt-n2"><?php echo date('d F Y', strtotime($mysql_date2));?></h4>    
                    </div>
                </div>
                <div class="row text-left">
                    <div class="col-xl-2 col-sm-6">
                        <label class="">Reccomended Due Date: </label>
                        <h4 class="mt-n2"><?php echo date('d F Y', strtotime($mysql_date3));?></h4>    
                    </div>
                </div>
                <div class="row text-left">
                    <div class="col-xl-6 col-sm-6">
                        <label>Serial Number: </label>
                        <h4 class="mt-n2"><?php echo $testWeightData['serialNumber']?></h4>    
                    </div>
                    <div class="col-xl-2 col-sm-6">
                        <label class="">Place of Calibration: </label>
                        <h4 class="mt-n2"><?php echo $testWeightData['placeOfCalibration']?></h4>    
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
                        <label>Serial Number: </label>
                        <h4 class="mt-n2"><?php echo $testWeightData['serialNumber']?></h4>    
                    </div>
                    <div class="col-xl-2 col-sm-6">
                        <label class="">Equipment ID: </label>
                        <h4 class="mt-n2"><?php echo $testWeightData['equipmentID']?></h4>    
                    </div>
                </div>

                
                <div class="row text-left">
                    <div class="col-xl-2 col-sm-6">
                        <label>Date of issue: </label>
                        <input type="date" class="form-control" id="datePicker" onchange="document.getElementById('datePrev').value = this.value; document.getElementById('datePrevDown').value = this.value; document.getElementById('datePrevFull').value = this.value;">
                    </div>
                </div>

                   
            
    <hr>

            <table class="table table-borderless">
                <tr>
                    <td class="col-3"><u><b>Standard Used</b></u></td>
                    <td class="col-3"><u><b>Calibration Certificate No.</b></u></td>
                    <td class="col-3"><u><b>Issuing laboratory</b></u></td>
                </tr>
                 
                    <?php foreach($testWeightStandard as $value){
                       foreach($value as $serial){
                        echo 
                        "<tr><td class='col-3'>". $serial['serialNumber']."<br></td>"."<td class='col-3'>". $serial['certificateNumber']."<br></td>"."<td class='col-3'>". $serial['issuer']."<br></td>"."</tr>";
                    }}
                    ?>
            </table>
        </form>
    <hr>   
    <div class="form-group row">
        <div class='col-sm-10 text-left'>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="mg" id="mg" name="page2" onchange="pageHere()" checked>
                <label class="form-check-label" for="mg">
                    mg
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="g" id="g" name="page2" onchange="pageHere()">
                <label class="form-check-label" for="g">
                    g
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="kg" id="kg" name="page2" onchange="pageHere()">
                <label class="form-check-label" for="kg">
                    kg
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
        <form name="verifyForm" action="/testWeightVerify" method="post">
            <input type="hidden" name="completion" id="" value="For printing">
            <input type="hidden" value="<?php echo $testWeightData['id']; ?>" name="idVerify" id="idVerify">
        </form>
        <form name="correctionForm" action="/testWeightCorrection" method="post">
            <input type="hidden" name="completion" id="" value="For correction">
            <input type="hidden" value="<?php echo $testWeightData['id']; ?>" name="idCorrection">
        </form>
    </div>

            <div class="btn-group" role="group" style="position:fixed;display:flex; flex-direction:row;align-content:center; bottom:0; z-index:99; border:solid 0px">
                <form class="btn" action="<?= base_url('guestTestWeighToPdfPreview/'.$testWeightData['id']) ?>" method="POST" target="iframeHere" id="prevForm" rel="noopener"><!--iframeHere-->
                    <input type="hidden" name="unitPrev" id="unitPrev" value="g">
                    <input type="hidden" name="pagerPrev" id="pagerPrev">
                    <input type="hidden" name="datePrev" id="datePrev">
                    <input type="hidden" name="bouyancyPrev" id="bouyancyPrev">
                    <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#previewModal">
                        <i class="far fa-eye"></i> Preview PDF
                    </button>
                </form>
                <form class="btn" action="<?= base_url('testWeighToPdf/'.$testWeightData['id']) ?>" method="POST" target="_blank" id="downForm" name="downForm" rel="noopener">
                    <input type="hidden" name="unitDown" id="unitDown">
                    <input type="hidden" name="datePrevDown" id="datePrevDown">
                    <input type="hidden" name="datePrev" id="Date">
                    <input type="hidden" name="bouyancyDown" id="bouyancyDown">

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
                <form class="btn" action="<?= base_url('guestTestWeighToPdfPreview/'.$testWeightData['id']) ?>" method="POST" target="_blank" id="downForm" rel="noopener">
                    <input type="hidden" name="unitFull" id="unitFull" value="g">
                    <input type="hidden" name="pagerFull" id="pagerFull">
                    <input type="hidden" name="datePrevFull" id="datePrevFull">
                    <input type="hidden" name="bouyancyPrev" id="bouyancyPrevFull">
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
                    <form method="post" action="<?php echo base_URL('testWeightUpdateWord')?>">
                        <input type="hidden" name="idHere" value="<?=$testWeightData['id']?>">
                        <div class="form-group">
                            <label for="CalibrationProcedureandTraceability">Calibration Procedure and Traceability</label>
                            <textarea class="form-control" id="CalibrationProcedureandTraceability" rows="3" name="settingCalibrationProcedureAndTraceability"><?=$testWeightData['settingCalibrationProcedureAndTraceability']?></textarea>
                        </div> 
                        <div class="form-group">
                            <label for="UncertaintyofMeasurement">Uncertainty of Measurement</label>
                            <textarea class="form-control" id="UncertaintyofMeasurement" rows="3" name="settingUncertaintyOfMeasurement"><?=$testWeightData['settingUncertaintyOfMeasurement']?></textarea>
                        </div> 
                        <div class="form-group">
                            <label for="CalibrationResults">Calibration Results</label>
                            <textarea class="form-control" id="CalibrationResults" rows="3" name="settingCalibrationResults"><?=$testWeightData['settingCalibrationResults']?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="remarks1">Remarks 1.</label>
                            <textarea class="form-control" id="remarks1" rows="3" name="settingRemarks1"><?=$testWeightData['settingRemarks1']?></textarea>
                            <label for="remarks2">Remarks 2.</label>
                            <textarea class="form-control" id="remarks2" rows="3" name="settingRemarks2"><?=$testWeightData['settingRemarks2']?></textarea>
                            <label for="remarks3">Remarks 3.</label>
                            <textarea class="form-control" id="remarks3" rows="3" name="settingRemarks3"><?=$testWeightData['settingRemarks3']?></textarea>
                            <label for="remarks4">Remarks 4.</label>
                            <textarea class="form-control" id="remarks4" rows="3" name="settingRemarks4"><?=$testWeightData['settingRemarks4']?></textarea>
                            <label for="remarks5">Remarks 5.</label>
                            <textarea class="form-control" id="remarks5" rows="3" name="settingRemarks5"><?=$testWeightData['remarks']?></textarea>
                        </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning">Update</button>
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
        var allData = <?= $testWeightALLDATA?> ;

        function setToDraft(){
            document.getElementById('imageDraftDown').value = 'true';
            document.downForm.submit();
        }    

        function setToNotDraft(){
            document.getElementById('imageDraftDown').value = 'false';
            document.downForm.submit();
        }

     function pageHere() {
        var pageToPrint = document.querySelector('input[name="page2"]:checked').value;
        document.getElementById("unitPrev").value = pageToPrint;
        document.getElementById("unitDown").value = pageToPrint;
        document.getElementById("unitFull").value = pageToPrint;
     }
     pageHere();

     console.log(Object.keys(allData).length)
     var numOfTable = Object.keys(allData).length;

     function bouyancyCondition(){
         var sameMaterial = true;
         for (let i = 1; i <= numOfTable; i++) {
            allData['Table'+i]['referenceSelected']['value'] == allData['Table'+i]['sampleSelected']['value']? sameMaterial = true: sameMaterial = false;
         }
         document.getElementById('bouyancyPrev').value = sameMaterial; 
         document.getElementById('bouyancyPrevFull').value = sameMaterial; 
         document.getElementById('bouyancyDown').value = sameMaterial; 
     }

     bouyancyCondition();

    
    

    


     
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
            a.setAttribute('href', '<?= base_url('testWeightEditDataView/'.$testWeightData['id'].'/forVerification') ?>');
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
            backButton.setAttribute('href','/guestTestWeightTable');            
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