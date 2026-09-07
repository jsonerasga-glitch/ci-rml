<?php
    use App\Models\ElectModel_image;
    use App\Models\ElectModel_2;
    $electStandardTable = new ElectModel_2();
    $arrayOfWeights = $elect_table_1['weight'];
    $pieces = explode(",", $arrayOfWeights);
    $elect_table_2[] = $electStandardTable->whereIn('serialNumber',  $pieces)->findAll();
   
    $electImageTable = new ElectModel_image();
    $image[] = $electImageTable->where('certificateNumber',  $elect_table_1['certificateNumber'])->first();

    $path = 'image/dost.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    $pathPAB = 'image/pab logo.png';
    $typePAB = pathinfo($pathPAB, PATHINFO_EXTENSION);
    $dataPAB = file_get_contents($pathPAB);
    $base64PAB = 'data:image/' . $typePAB . ';base64,' . base64_encode($dataPAB);

    $readabilityDecimalPoint = seeDecimal($elect_table_1['readability']);

    function addZeros($value,$numberOfZeros){
        return number_format($value,$numberOfZeros,'.','');
    }
    
    
    function sigFig($value, $digits){
        $value = floatval($value);
        $digits = floatval($digits);
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
        if ((int)$value == $value){
            return 0;
        }
        else if (! is_numeric($value)){
            return false;
        }

        return strlen($value) - strrpos($value, '.') - 1;
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
       

        /* .form-control{
            border: 0;
            margin-top:-10;
            text-decoration:underline;
        } */
    </style>
</head>
<body  style="margin: 0; padding: 0; font-family: Calibri; font-size: 16px;">
    <div class="card mt-2 shadow mx-auto text-center col-12 container-fluid" style="width: 100%;">
    <div class="">
			<!-- HEADER --> 
			<div class="row text-left mt-4">
                <div class="col mx-5 p-5">
                    <h1 class="card-title mt-4">Single Range Electronic balance</h1>
                    <h4 class="card-title mb-4">Calibration Certificate (View)</h4></div>
				<!--div class="col-xl-3 col-md-3 col-sm-3 col-12 mt-5">
					<img src="<?php# echo $base64; ?>" alt="DOST LOGO" height='120px' style=" top:0"> 
				</div>
				<div class="col-xl-6 col-md-6 col-sm-6 mt-5">
					<h6>Republic of the Philippines</h6>
					<h6>DEPARTMENT OF SCIENCE AND TECHNOLOGY</h6>
					<h6>CALABARZON</h6>
					<h6>Regional Metrology Laboratory</h6>
				</div-->
				<div class="col-xl-2 col-md-2 col-sm-3 col-6 text-center mr-5">
                        <form action="<?= base_url('guestUpdatePabLogo') ?>" method="POST" id="pabForm">
                        <div class="input-group mb-3">
                            <input type="hidden" value="<?php echo $elect_table_1['id']; ?>" name="id">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                <?php if($elect_table_1['PabLogo']=='true'){
                                    echo '<input type="checkbox" checked id="checkBoxPabLogo" onclick="pabLOGO(\''.$base64PAB.'\');">';
                                }else{
                                    echo '<input type="checkbox" id="checkBoxPabLogo" onclick="pabLOGO(\''.$base64PAB.'\');">';
                                }?>
                                    <input type="hidden" value="" name="pablogoValue" id="pablogoValue">
                                </div>
                            </div>
                            <Label for="checkBoxPabLogo" class="">
                                <?php if($elect_table_1['PabLogo']=='true'){
                                    echo '<img src="'.$base64PAB.'" alt="No Pab logo" id="pabLogo" height="150px" >';
                                }else{
                                    echo ' <img src="" alt="No Pab logo" id="pabLogo" height="150px" >';
                                }?>
                                   
                            </Label>
                            
                            </div>
                            <i style="font-size: 14px;">CLick the logo to add or remove</i>
                            <button type="submit" class="btn btn-success"><i class="fas fa-pencil-alt"></i> CLick here to Update logo</button>
                            
                            <!--input type="submit" value="Update PAB Logo" class="btn btn-success"-->
                        </form>                               
				</div>
			</div> <hr>
    <!-- HEADER -->	
    </div>
        <div class="container">
            <form action="">
                <div class="row mt-4">
                    <div class="col-xl-3 col-sm-6 text-left">
                        <label class="">Certificate Number:</label> 
                        <h4 class="mt-n2"><?php echo $elect_table_1['certificateNumber']?></h4>   
                    </div>
                </div>

                <div class="row">
                    <div class="col col-sm-6 text-left">
                        <label>Customer:</label> 
                        <h4 class="mt-n2"><?php echo $elect_table_1['customer']?></h4>   
                    </div>
                </div>

                <div class="row">
                    <div class="col col-sm-6 text-left">
                        <label>Address:</label>
                        <h4 class="mt-n2"><?php echo $elect_table_1['address']?></h4>   
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-2 col-sm-6 text-left">
                        <label>Equipment Description: </label>
                        <h4 class="mt-n2"><?php echo $elect_table_1['equipmentDescription']?></h4>  
                    </div>
                    <div class="col-xl-4"></div>
                    <div class="col-xl-2 col-sm-6 text-left">
                        <label class="">Date Received: </label>
                        <h4 class="mt-n2">
                        <?php 
                            $date = $elect_table_1['dateReceived']; 
                            $mysql_date = date('Y-m-d G:i:s', strtotime($date));
                            $date2 = $elect_table_1['dateCalibrated']; 
                            $mysql_date2 = date('Y-m-d G:i:s', strtotime($date2));
                            $date3 = $elect_table_1['recommendedDueDate']; 
                            $mysql_date3 = date('Y-m-d G:i:s', strtotime($date3));
                        ?>
                        <?php echo date('d F Y', strtotime($mysql_date));?></h4> 
                    </div>
                </div>

                <div class="row text-left">
                    <div class="col-xl-2 col-sm-6">
                        <label>Manufacturer: </label>
                        <h4 class="mt-n2"><?php echo $elect_table_1['manufacturer']?></h4>    
                    </div>
                    <div class="col-xl-4"></div>
                    <div class="col-xl-2 col-sm-6">
                        <label class="">Date Calibrated: </label>
                        <h4 class="mt-n2"><?php echo date('d F Y', strtotime($mysql_date2));?></h4>    
                    </div>
                </div>

                <div class="row text-left">
                    <div class="col-xl-2 col-sm-6">
                        <label>Model Number: </label>
                        <h4 class="mt-n2"><?php echo $elect_table_1['modelNumber']?></h4>    
                    </div>
                    <div class="col-xl-4"></div>
                    <div class="col-xl-2 col-sm-6">
                        <label class="">Reccomended Due Date:</label>
                        <h4 class="mt-n2"><?php echo date('d F Y', strtotime($mysql_date3));?></h4>     
                    </div>
                </div>

                <div class="row text-left">
                    <div class="col-xl-2 col-sm-6 ">
                        <label>Serial Number: </label>
                        <h4 class="mt-n2"><?php echo $elect_table_1['serialNumber']?></h4>    
                    </div>
                    <div class="col-xl-4"></div>
                    <div class="col-xl-2 col-sm-6">
                        <label class="">Place of Calibration: </label>
                        <h4 class="mt-n2"><?php echo $elect_table_1['placeOfCalibration']?></h4>         
                    </div>
                </div>

                <div class="row text-left">
                    <div class="col-xl-2 col-sm-6">
                        <label>Equipment ID: </label>
                        <h4><?php echo $elect_table_1['equipmentID']?></h4>    
                    </div>
                    <div class="col-xl-4"></div>
                    <div class="col-xl-2 col-sm-6">
                        <label class="">Ambient Temperature:  </label>
                        <h4><?php echo $elect_table_1['aveTemp']?> &#8451;</h4>         
                    </div>
                </div>

                <div class="row text-left">
                    <div class="col-xl-2 col-sm-6">
                        <label>Maximum Capacity: </label>
                        <h4><?php echo $elect_table_1['maxCapacity']?> <?php echo $elect_table_1['maxCapacityMeasurement']?></h4>    
                    </div>
                    <div class="col-xl-4"></div>
                    <div class="col-xl-2 col-sm-6">
                        <label class="">Relative Humidity:  </label>
                        <h4><?php echo $elect_table_1['AveRh']?>% RH</h4>         
                    </div>
                </div>

                <div class="row text-left">
                    <div class="col-xl-2 col-sm-6">
                        <label>Readability: </label>
                        <h4><?php echo $elect_table_1['readability']?> <?php echo $elect_table_1['readabilityMeasurement']?></h4>    
                    </div>
                
                </div>
                    <div class="row text-left">
                        <div class="col-xl-2 col-sm-6">
                            <label>Date of issue: </label>
                            <input type="date" id="datePicker" class="form-control" onchange="document.getElementById('datePrev').value = this.value; document.getElementById('datePrevDown').value = this.value;">
                        </div>
                    
                    </div>
               
                      
                
        <hr>
          
        <label class="col-4"><u><b>Standard Used</b></u></label>
        <label class="col-3"><u><b>Calibration Certificate No.</b></u></label>
        <label class="col-3"><u><b>Issuing laboratory</b></u></label>
        
        <?php foreach($elect_table_2 as $value){
            foreach($value as $serial){
                  echo 
                  "<label class='col-4'>". $serial['serialNumber']."<br></label>"."<label class='col-3'>". $serial['certificateNumber']."<br></label>"."<label class='col-3'>". $serial['calibrationProvider']."<br></label>"."";
                }}
             ?>
                
            </form>

    <hr>    

    <br>

    <div class="text-center">
            <table class="table">
                <thead>
                    <th></th>
                    <th>Test Load</th>
                    <th>Indication</th>
                    <th>Error</th>
                    <th>Uncertainty</th>
                </thead>
                <tbody>
                                <tr>
                                    <td>
                                        <input type="checkbox" checked id="linear1" name="linear" value='1'>
                                    </td>
                                    <td> <label for="linear1"> <?php echo addZeros($elect_table_1['linearLoad1'],$readabilityDecimalPoint )?></label></td>
                                    <td> <label for="linear1"> <?php echo addZeros($elect_table_1['indication1'],$readabilityDecimalPoint)?></label></td>
                                    <td> <label for="linear1"> <?php echo addZeros($elect_table_1['linearError1'],$readabilityDecimalPoint)?></label></td>
                                    <td id="uncert1" data-value="<?php echo sigFig($elect_table_1['expandedUncertain1'],2)?>"> <label for="linear1"> <?php echo sigFig($elect_table_1['expandedUncertain1'],2)?></label></td>
                                </tr>
                                <tr>
                                <td>
                                        <input type="checkbox" checked id="linear2" name="linear" value='2'>
                                    </td>
                                    <td><?php echo addZeros($elect_table_1['linearLoad2'],$readabilityDecimalPoint )?></td>
                                    <td><?php echo addZeros($elect_table_1['indication2'],$readabilityDecimalPoint)?></td>
                                    <td><?php echo addZeros($elect_table_1['linearError2'],$readabilityDecimalPoint)?></td>
                                    <td id="uncert2" data-value="<?php echo sigFig($elect_table_1['expandedUncertain2'],2)?>"><?php echo sigFig($elect_table_1['expandedUncertain2'],2)?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" checked id="linear3" name="linear" value='3'>
                                    </td>
                                    <td><?php echo addZeros($elect_table_1['linearLoad3'],$readabilityDecimalPoint)?></td>
                                    <td><?php echo addZeros($elect_table_1['indication3'],$readabilityDecimalPoint)?></td>
                                    <td><?php echo addZeros($elect_table_1['linearError3'],$readabilityDecimalPoint)?></td>
                                    <td id="uncert3" data-value="<?php echo sigFig($elect_table_1['expandedUncertain3'],2)?>"><?php echo sigFig($elect_table_1['expandedUncertain3'],2)?></td>
                                </tr>
                                <tr>
                                <td>
                                        <input type="checkbox" checked id="linear4" name="linear" value='4'>
                                    </td>
                                    <td><?php echo addZeros($elect_table_1['linearLoad4'],$readabilityDecimalPoint)?></td>
                                    <td><?php echo addZeros($elect_table_1['indication4'],$readabilityDecimalPoint)?></td>
                                    <td><?php echo  addZeros($elect_table_1['linearError4'],$readabilityDecimalPoint)?></td>
                                    <td id="uncert4" data-value="<?php echo sigFig($elect_table_1['expandedUncertain4'],2)?>"><?php echo sigFig($elect_table_1['expandedUncertain4'],2)?></td>
                                </tr>
                                <tr>
                                <td>
                                        <input type="checkbox" checked id="linear5" name="linear" value='5'>
                                    </td>
                                    <td><?php echo addZeros($elect_table_1['linearLoad5'],$readabilityDecimalPoint)?></td>
                                    <td><?php echo addZeros($elect_table_1['indication5'],$readabilityDecimalPoint)?></td>
                                    <td><?php echo  addZeros($elect_table_1['linearError5'],$readabilityDecimalPoint)?></td>
                                    <td id="uncert5" data-value="<?php echo sigFig($elect_table_1['expandedUncertain5'],2)?>"><?php echo sigFig($elect_table_1['expandedUncertain5'],2)?></td>
                                </tr>
                                <tr>
                                <td>
                                        <input type="checkbox" checked id="linear6" name="linear" value='6'>
                                    </td>
                                    <td><?php echo addZeros($elect_table_1['linearLoad6'],$readabilityDecimalPoint)?></td>
                                    <td><?php echo addZeros($elect_table_1['indication6'],$readabilityDecimalPoint)?></td>
                                    <td><?php echo  addZeros($elect_table_1['linearError6'],$readabilityDecimalPoint)?></td>
                                    <td id="uncert6" data-value="<?php echo sigFig($elect_table_1['expandedUncertain6'],2)?>"><?php echo sigFig($elect_table_1['expandedUncertain6'],2)?></td>
                                </tr>
                                <tr>
                                <td>
                                        <input type="checkbox" checked id="linear7" name="linear" value='7'>
                                    </td>
                                    <td><?php echo addZeros($elect_table_1['linearLoad7'],$readabilityDecimalPoint)?></td>
                                    <td><?php echo addZeros($elect_table_1['indication7'],$readabilityDecimalPoint)?></td>
                                    <td><?php echo  addZeros($elect_table_1['linearError7'],$readabilityDecimalPoint)?></td>
                                    <td id="uncert7" data-value="<?php echo sigFig($elect_table_1['expandedUncertain7'],2)?>"><?php echo sigFig($elect_table_1['expandedUncertain7'],2)?></td>
                                </tr>
                                <tr>
                                <td>
                                        <input type="checkbox" checked id="linear8" name="linear" value='8'>
                                    </td>
                                    <td><?php echo addZeros($elect_table_1['linearLoad8'],$readabilityDecimalPoint)?></td>
                                    <td><?php echo addZeros($elect_table_1['indication8'],$readabilityDecimalPoint)?></td>
                                    <td><?php echo  addZeros($elect_table_1['linearError8'],$readabilityDecimalPoint)?></td>
                                    <td id="uncert8" data-value="<?php echo sigFig($elect_table_1['expandedUncertain8'],2)?>"><?php echo sigFig($elect_table_1['expandedUncertain8'],2)?></td>
                                </tr>
                            </tbody>
            </table>
    </div>
        <div class="text-center">
           <form action="/guestGraphDataSave" method="post">
                <div class="input-group mt-3">
                    <div class="input-group-prepend">
                        <button class="btn btn-secondary" type="button" onclick="setPoints()">
                            <i class="fas fa-th-list"></i>
                                Filter
                        </button>
                        <button class="btn btn-secondary" type="button" onclick="MaximizeVaxis()">
                            <i class="fas fa-th-list"></i>
                                Optimize
                        </button>
                        <button class="btn btn-dark" type="button" id="checkbutton" onclick="customVaxis()">
                            <i class="far fa-check-square"></i>
                            Check
                        </button>
                    </div>
                    <input value="<?= $elect_table_1['graphMin']?>" type="text" id="min" name='graphMin' class="form-control" placeholder="Min" aria-label="Example text with button addon" aria-describedby="button-addon1" >
                    <input value="<?= $elect_table_1['graphMax']?>" type="text" id="max" name='graphMax' class="form-control" placeholder="Max" aria-label="Example text with button addon" aria-describedby="button-addon1">
                    <input value="0.000" type="text" id="vFormat" name='vFormat' class="form-control" placeholder="format" aria-label="Example text with button addon" aria-describedby="button-addon1">
                    <input value="<?= $elect_table_1['graphStep']?>" type="text" id="step" name='graphStep' class="form-control" placeholder="Step" tabindex="0" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Use -1 for default">
                    <input type="hidden" name="idOfData" value="<?= $elect_table_1['id']?>">
                    <button class="btn btn-secondary" type="submit">
                            Save
                    </button>
                </div>
            </form>

            <div id="chart_display" style="width:98%; height: 450px; image-resolution:1200dpi; border: 0px solid black;justify-content:center;display:flex;z-index:2;" ></div>
                <i>Figure 2. Graphical Representation of error with expanded uncertainties</i><br>
            <button type="button" class="btn btn-primary mt-3 grp" data-toggle="modal" data-target="#imageModal">
            <i class="fas fa-images"></i> View Image
            </button>
        </div>
       

    

    <br> 
    <div id="forVerificationButtons">
    </div>       

    <div>
        <form name="verifyForm" action="/electVerify" method="post">
            <input type="hidden" name="completion" id="" value="For printing">
            <input type="hidden" value="<?php echo $elect_table_1['id']; ?>" name="idVerify" id="idVerify">
        </form>
        <form name="correctionForm" action="/electCorrection" method="post">
            <input type="hidden" name="completion" id="" value="For correction">
            <input type="hidden" value="<?php echo $elect_table_1['id']; ?>" name="idCorrection">
        </form>
    </div>
    
    <hr> <br>


    <div class="btn-group" role="group" style="position:fixed;display:flex; flex-direction:row;align-content:center; bottom:0; z-index:99; border:solid 0px">
            <form name='formPrev' class="btn" action="<?= base_url('guestElectToPdfPreview/'.$elect_table_1['id']) ?>" method="POST" target="iframeHere">
                <input type="hidden" name="chartImg" id="chartImgPreview"> 
                <input type="hidden" name="chart_input" id="chart_inputPreview">   
               <input type="hidden" name="datePrev" id="datePrev">
               <input type="hidden" name="imageDraft" id="imageDraft" value="">
                <input type="hidden" name="certNumberPrev" value="<?= $elect_table_1['certificateNumber']?>" id="">  
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#previewModal" onclick="redirectOnFrame()">
                    <i class="far fa-eye">
                    </i>
                    Preview PDF
                </button>
            </form>
            <form name="formDown" class="btn" action="<?= base_url('guestElectToPdf/'.$elect_table_1['id']) ?>" method="POST" target="_blank">
                <input type="hidden" name="chartImg" id="chartImg"> 
                <input type="hidden" name="chart_input" id="chart_input">    
               <input type="hidden" name="datePrevDown" id="datePrevDown">
               <input type="hidden" name="imageDraft" id="imageDraft" value="">
                <input type="hidden" name="certNumberDown" value="<?= $elect_table_1['certificateNumber']?>" id="">  
                <button type="submit" class="btn btn-info">
                <i class="fas fa-file-download"></i>
                    Download PDF
                </button>
            </form>
            <div class="btn">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#EditModal">
                <i class="fas fa-edit"></i>   
                Edit Remarks
                </button>
            </div>
            <form name='formDraft' class="btn" action="<?= base_url('guestElectToDraft/'.$elect_table_1['id']) ?>" method="POST" target="iframeHere">
                <input type="hidden" name="chartImg" id="chartImgDraft"> 
                <input type="hidden" name="chart_input" id="chart_inputDraft">   
               <input type="hidden" name="datePrev" id="datePrev">
               <input type="hidden" name="imageDraft" id="imageDraft" value="TRUE">
                <input type="hidden" name="certNumberDraft" value="<?= $elect_table_1['certificateNumber']?>" id="">  
                <button type="button" class="btn btn-success" onclick="redirectOnAnewWindowDraft()">
                    <i class="fab fa-elementor"></i>
                   Download Draft
                </button>
                
                
            </form>
            <!-- <div class="btn">
                <button type="button" class="btn btn-info" onclick="redirectOnAnewWindow()">
                    <i class="far fa-eye"></i>
                    View Pdf
                </button>
            </div> -->
            <div class="btn">
                <a class="btn btn-danger" id='backButton' ><i class="fas fa-arrow-circle-left"></i> Back</a>
            </div>
            <div class="btn" id='forverification'>
            </div>
       </div>
        
       
    </div>
    </div>
    <!-- Hidden - this chart is sent to pdf -->
    <div class="row">
        <div class="col-12 col-xl-5 text-center" >
            <div id="chart_div" style="height:300px width:1338.68px; border: 0px solid black;justify-content:center;display:flex;visibility: hidden; z-index:1;" ></div>
        </div>
    </div>
        

 
<!-- PDF preview -->
    <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Preview <code class="h6">(May Not Work on Mobile Devices)</code> </h5>
                <!--button type="button" class="close" data-dismiss="modal" aria-label="Close"-->
                    
                <button type="button" class="btn btn-info" onclick="redirectOnAnewWindow()">View Pdf</button>
             
            </div>
            <div class="modal-body"style="height:50%">
                <div class="embed-responsive embed-responsive-1by1"  style="height:25em">
                    <iframe class="embed-responsive-item" name="iframeHere" title="description"></iframe>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-door-open"></i> Close</button>
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
                    <form name="updateRemarksForm" method="post" action="<?php echo base_URL('guestUpdateWord')?>">
                        <input type="hidden" name="idHere" value="<?=$elect_table_1['id']?>">
                        <div class="form-group">
                            <label for="CalibrationProcedureandTraceability">Calibration Procedure and Traceability</label>
                            <textarea class="form-control" id="CalibrationProcedureandTraceability" rows="3" name="settingCalibrationProcedureAndTraceability"><?=$elect_table_1['settingCalibrationProcedureAndTraceability']?></textarea>
                        </div> 
                        <div class="form-group">
                            <label for="UncertaintyofMeasurement">Uncertainty of Measurement</label>
                            <textarea class="form-control" id="UncertaintyofMeasurement" rows="3" name="settingUncertaintyOfMeasurement"><?=$elect_table_1['settingUncertaintyOfMeasurement']?></textarea>
                        </div> 
                        <div class="form-group">
                            <label for="CalibrationResults">Calibration Results</label>
                            <textarea class="form-control" id="CalibrationResults" rows="3" name="settingCalibrationResults"><?=$elect_table_1['settingCalibrationResults']?></textarea>
                        </div>
                        <div class="form-group" id="remarksDiv">
                            
                        </div>
                        <div class="form-group" id="remarksButton">

                        </div>
                        <input type="hidden" name="remarkHere" id="remarkHere">
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" onclick="mergeRemarks()">Update</button>
            </div>
        </form>
            </div>
        </div>
    </div>
<!-- Edit Words -->

</body>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/js/ElectEdit.js"></script>
    
    <script type="text/javascript">
        var countOfRemarks = 0;
        var remarkRaw = '<?=$elect_table_1['settingRemarks1']?>';

        function layoutRemarks(){
            var remarksDiv = document.getElementById('remarksDiv');
            var remarksButton = document.getElementById('remarksButton');
            const remarkSplited = remarkRaw.split('(splitHere)');
            remarkSplited.forEach((value,index)=>{
                var label = document.createElement('label');
                var textarea = document.createElement('textarea');
                label.setAttribute('for','remarks'+(index+1));
                label.innerHTML='Remark '+(index+1);
                textarea.setAttribute('class','form-control');
                textarea.setAttribute('id','remarks'+(index+1));
                textarea.setAttribute('rows','3');
                textarea.innerHTML = value;
                remarksDiv.appendChild(label);
                remarksDiv.appendChild(textarea);
                countOfRemarks++;
            })

            
            var button = document.createElement('button');
            button.setAttribute('class','btn btn-warning mt-3');
            button.setAttribute('type','button');
            button.setAttribute('id','AddRemarksButton');
            button.setAttribute('onclick', `addRemark();`)
            button.innerHTML = `Add Remark`;
            remarksButton.appendChild(button);

            var button = document.createElement('button');
            button.setAttribute('class','btn btn-danger mt-3');
            button.setAttribute('type','button');
            button.setAttribute('id','deleteRemarksButton');
            button.setAttribute('onclick', `deleteRemark();`)
            button.innerHTML = `Delete Remark`;
            remarksButton.appendChild(button);
        }      
        layoutRemarks()

        function mergeRemarks(){
            var input = document.getElementById('remarkHere').value;
            for (var i = 1; i <= countOfRemarks; i++) {
                if(i!=countOfRemarks){
                    document.getElementById('remarkHere').value += document.getElementById('remarks'+i).value+"(splitHere)";
                }else{
                    document.getElementById('remarkHere').value += document.getElementById('remarks'+i).value;
                }
            }
            document.updateRemarksForm.submit();
        }

        function addRemark(){
            var remarksDiv = document.getElementById('remarksDiv');
            var label = document.createElement('label');
            var textarea = document.createElement('textarea');
            label.setAttribute('for','remarks'+(countOfRemarks+1));
            label.innerHTML='Remark '+(countOfRemarks+1);
            textarea.setAttribute('class','form-control');
            textarea.setAttribute('id','remarks'+(countOfRemarks+1));
            textarea.setAttribute('rows','3');
            remarksDiv.appendChild(label);
            remarksDiv.appendChild(textarea);
            countOfRemarks++;
        }

        const deleteRemark = () =>{
            var remarksDiv = document.getElementById('remarksDiv');
            for (let i = 0; i < 2; i++) {
                var childCount = remarksDiv.childElementCount;
                // -3 because it starts at 0 and theres 2 button at the end
                remarksDiv.removeChild(remarksDiv.children[(childCount-1)]);      
            }
            countOfRemarks--;
        }


                
        function switchFromActionForHanging(){
            document.formPrev.action =  `<?= base_url('guestElectToPdfPreviewHanging/'.$elect_table_1['id']) ?>`;
            document.formDown.action =  `<?= base_url('guestElectToPdfHanging/'.$elect_table_1['id']) ?>`;
            document.formDraft.action =  `<?= base_url('guestElectToDraftHanging/'.$elect_table_1['id']) ?>`;
        }
        function seeIfHanging(){
            var equipmentDesc = `<?php echo $elect_table_1['equipmentDescription']?>`;
            if(equipmentDesc.toString().toLowerCase().includes(`hanging`)){
				switchFromActionForHanging();
			}
        }
        seeIfHanging();

        var elect_table = <?= json_encode($elect_table_1)?>;

        $(function () {
            $('[data-toggle="popover"]').popover();
        })


       
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChartDisplay);
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawChart2);
        google.charts.setOnLoadCallback(drawChartDisplay);
        

        var array = [];

        function getDecimalOfUncert(){
            var vFormat = document.getElementById('vFormat');
            var max = 0;
            var format = '0.';
            for(var i = 1; i <= 8 ; i++){
                var value = String(document.getElementById('uncert'+i).dataset.value);
                var valueAsInt = String(parseInt(document.getElementById('uncert'+i).dataset.value));
                if(value == valueAsInt){
                    value +='.0';
                }
                var splittedValue = value.split('.');
                if(splittedValue[1].length > max){
                    max = splittedValue[1].length;
                }
            }
            for(i=1;i<=max;i++){
                format+= '0';
            }
            vFormat.value = format;           
        }
        getDecimalOfUncert();
    
        function drawChart(vMin,vMax,mode,step,vFormat) {
            if(vMin == null){
                vMin = 'auto';
            }
            if(vMax == null){
                vMax = 'auto';
            }
            if(mode == null){
                mode = false;
            }
            if(step == null){
                step = -1;
            }
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Load');
            data.addColumn('number', 'values');
            data.addColumn({id:'i0', type:'number', role:'interval'});
            data.addColumn({id:'i1', type:'number', role:'interval'});
        
            data.addRows(array);

            var options = {
                curveType: 'function',
                pointSize: 10,
                pointShape: { type: 'diamond', sides: 4 },
                chartArea: {
                    'left': '10%',
                    'width': '87%',
                    'height': '80%'},
                series: [{'color': '#01a8eb'}],
                intervals: { style: 'bars',
                 color: 'red' ,
                 },
                hAxis: {
                title: 'Load ('+elect_table['readabilityMeasurement']+')',
                textStyle : {
                    color: '#030201',
                }
                },
                vAxis: {
                    format: vFormat,
                    colors: '#33ac71',
                    textStyle : {
                        fontSize: '14',
                        color: '#030201', // DL
                    },
                    title: 'Error ('+elect_table['readabilityMeasurement']+')', 
                    viewWindow: {
                            min: vMin,
                            max: vMax
                        },
                    viewWindowMode: mode,
                    gridlines: {
                        count: step,
                        color: 'white' ,
                    }   
                },
                
                height: 370,
                width: 1000,
                legend: 'none',
            };

            var chart_div = document.getElementById('chart_div');
            var chart_input = document.getElementById('chart_input');
            var charta = new google.visualization.CandlestickChart(document.getElementById('chart_div'));
            var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));

            google.visualization.events.addListener(chart, 'ready', function () {
                chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
                chart_input.value = chart.getImageURI();
            });    

            chart.draw(data, options);
        }

        function drawChartDisplay(vMin,vMax,mode,step,vFormat) {
            if(vMin == null){
                vMin = 'auto';
            }
            if(vMax == null){
                vMax = 'auto';
            }
            if(mode == null){
                mode = false;
            }
            if(step == null){
                step = -1;
            }
            if(vFormat == null){
                vFormat = '0.0000';
            }
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Load');
            data.addColumn('number', 'values');
            data.addColumn({id:'i0', type:'number', role:'interval'});
            data.addColumn({id:'i1', type:'number', role:'interval'});
            data.addRows(array);

            var options = {
                curveType: 'function',
                pointSize: 10,
                pointShape: { type: 'diamond', sides: 4 },
                series: [{
                   // 'color': '#FF0000'
                }],
                
                pointShape: {
                    type: 'circle', 
                    
                },
                intervals: { 
                    style: 'bars',
                
                    color: 'red' ,
                },
                hAxis: {
                    title: 'Load ('+elect_table['readabilityMeasurement']+')',
                },
                vAxis: {
                    format: vFormat,
                    title: 'Error ('+elect_table['readabilityMeasurement']+')', 
                    viewWindow: {
                        min: vMin,
                        max: vMax,
                    },
                    viewWindowMode: mode,
                    gridlines: {
                        count: step,
                        color: 'white' ,
                    }
                },
                
                
    
                legend: 'none',
            };

            var chart_div = document.getElementById('chart_display');
            var charta = new google.visualization.CandlestickChart(document.getElementById('chart_display'));
            var chart = new google.visualization.ScatterChart(document.getElementById('chart_display'));

            chart.draw(data, options);
        }

        function drawChart2(vMin,vMax,mode,step,vFormat) {
            if(vMin == null){
                vMin = 'auto';
            }
            if(vMax == null){
                vMax = 'auto';
            }
            if(mode == null){
                mode = false;
            }
            if(step == null){
                step = -1;
            }
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Load');
            data.addColumn('number', 'values');
            data.addColumn({id:'i0', type:'number', role:'interval'});
            data.addColumn({id:'i1', type:'number', role:'interval'});
        
            data.addRows(array);

            var options = {
                curveType: 'function',
                pointSize: 10,
                pointShape: { type: 'diamond', sides: 4 },
                chartArea: {
                    'left': '10%',
                    'width': '87%',
                    'height': '80%'},
                series: [{'color': '#01a8eb'}],
                intervals: { style: 'bars',
                 color: 'red' ,
                 },
                hAxis: {
                title: 'Load ('+elect_table['readabilityMeasurement']+')',
                },
                vAxis: {
                    format: vFormat,
                    colors: '#33ac71',
                    textStyle : {
                        fontSize: '14', // preview
                    },
                    title: 'Error ('+elect_table['readabilityMeasurement']+')', 
                    viewWindow: {
                            min: vMin,
                            max: vMax
                        },
                    viewWindowMode: mode,
                    gridlines: {
                        count: step,
                        color: 'white' ,
                    } 
                },
                
                height: 370,
                width: 1000,
                legend: 'none',
            };

            var chart_div = document.getElementById('chart_div');
            var chart_input = document.getElementById('chart_inputPreview');
            var charta = new google.visualization.CandlestickChart(document.getElementById('chart_div'));
            var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));

            google.visualization.events.addListener(chart, 'ready', function () {
                chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
                chart_input.value = chart.getImageURI();
            });   

            chart.draw(data, options);
           
        }
        //draft
        function drawChartDraft(vMin,vMax,mode,step,vFormat) {
            if(vMin == null){
                vMin = 'auto';
            }
            if(vMax == null){
                vMax = 'auto';
            }
            if(mode == null){
                mode = false;
            }
            if(step == null){
                step = -1;
            }
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Load');
            data.addColumn('number', 'values');
            data.addColumn({id:'i0', type:'number', role:'interval'});
            data.addColumn({id:'i1', type:'number', role:'interval'});
        
            data.addRows(array);

            var options = {
                curveType: 'function',
                pointSize: 10,
                pointShape: { type: 'diamond', sides: 4 },
                chartArea: {
                    'left': '10%',
                    'width': '87%',
                    'height': '80%'},
                series: [{'color': '#01a8eb'}],
                intervals: { style: 'bars',
                 color: 'red' ,
                 },
                hAxis: {
                title: 'Load ('+elect_table['readabilityMeasurement']+')',
                },
                vAxis: {
                    format: vFormat,
                    colors: '#33ac71',
                    textStyle : {
                        fontSize: '14', // draft
                    },
                    title: 'Error ('+elect_table['readabilityMeasurement']+')', 
                    viewWindow: {
                            min: vMin,
                            max: vMax
                        },
                    viewWindowMode: mode,
                    gridlines: {
                        count: step,
                        color: 'white' ,
                    } 
                },
                
                height: 370,
                width: 1000,
                legend: 'none',
            };

            var chart_div = document.getElementById('chart_div');
            var chart_input = document.getElementById('chart_inputDraft');
            var charta = new google.visualization.CandlestickChart(document.getElementById('chart_div'));
            var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));

            google.visualization.events.addListener(chart, 'ready', function () {
                chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
                chart_input.value = chart.getImageURI();
            });   

            chart.draw(data, options);
           
        }

        function customVaxis(){
            var min = document.getElementById('min');
            var max = document.getElementById('max');
            var step = document.getElementById('step');
            var vFormat = document.getElementById('vFormat');
            google.charts.setOnLoadCallback(drawChartDisplay(parseFloat(min.value),parseFloat(max.value),null,parseFloat(step.value),(vFormat.value)));
            google.charts.setOnLoadCallback(drawChart2(parseFloat(min.value),parseFloat(max.value),null,parseFloat(step.value),(vFormat.value)));
            google.charts.setOnLoadCallback(drawChart(parseFloat(min.value),parseFloat(max.value),null,parseFloat(step.value),(vFormat.value)));
            google.charts.setOnLoadCallback(drawChartDraft(parseFloat(min.value),parseFloat(max.value),null,parseFloat(step.value),(vFormat.value)));
        }
        function MaximizeVaxis(){
            var step = document.getElementById('step');
            google.charts.setOnLoadCallback(drawChartDisplay(null,null,'maximized',step.value));
            google.charts.setOnLoadCallback(drawChart2(null,null,'maximized',step.value));
            google.charts.setOnLoadCallback(drawChart(null,null,'maximized',step.value));
        }

        function setPoints(){
            array = [];
            var checkboxes = document.getElementsByName('linear');
            for (var i=0; i<checkboxes.length; i++) {
                var checkboxesChecked = [];
                if (checkboxes[i].checked) {
                    checkboxesChecked.push(elect_table['linearLoad'+checkboxes[i].value]);
                    checkboxesChecked.push(parseFloat(elect_table['linearError'+checkboxes[i].value]));
                    checkboxesChecked.push(parseFloat(elect_table['linearError'+checkboxes[i].value] )+ parseFloat(elect_table['expandedUncertain'+checkboxes[i].value]));
                    checkboxesChecked.push( (parseFloat(elect_table['linearError'+checkboxes[i].value]) + (parseFloat(elect_table['expandedUncertain'+checkboxes[i].value])*-1)));
                    array.push(checkboxesChecked)
                }
                
            }

            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChartDisplay);
            google.charts.setOnLoadCallback(drawChart);
            google.charts.setOnLoadCallback(drawChart2);
            google.charts.setOnLoadCallback(drawChartDraft);

        }
        setPoints();

        function redirectOnAnewWindow(event) {
            document.formPrev.target = "_blank";
            document.formPrev.submit();
        }
        function redirectOnAnewWindowDraft(event) {
            document.formDraft.target = "_blank";
            document.formDraft.submit();
        }
        function redirectOnFrame(event) {
            document.formPrev.target = "iframeHere";
            document.formPrev.submit();
        }

        document.getElementById('datePicker').valueAsDate = new Date(); 
       

       
        console.log('end')
        setTimeout(function(){customVaxis()}, 500);

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
            a.setAttribute('href', '<?= base_url('updateElect/'.$elect_table_1['id'].'/forVerification') ?>');
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
            backButton.setAttribute('href','/guestElectTable');            
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