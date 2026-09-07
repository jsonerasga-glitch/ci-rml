<?php
use App\Models\ThermoStandardAddTestPointsModel;
use App\Models\ThermoStandardAddDriftModel;
use App\Models\ThermoStandardAddDriftPRTModel;
use App\Models\ThermoStandard;
use App\Models\CustomersModel;


    $path = 'image/dost.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    $pathPAB = 'image/pab logo.png';
    $typePAB = pathinfo($pathPAB, PATHINFO_EXTENSION);
    $dataPAB = file_get_contents($pathPAB);
    $base64PAB = 'data:image/' . $typePAB . ';base64,' . base64_encode($dataPAB);

    $pathIllusA = 'image/SREBillustrationA.png';
    $typeIllusA = pathinfo($pathIllusA, PATHINFO_EXTENSION);
    $dataIllusA = file_get_contents($pathIllusA);
    $base64IllusA = 'data:image/' . $typeIllusA . ';base64,' . base64_encode($dataIllusA);

    $pathIllusB = 'image/SREBillustrationB.png';
    $typeIllusB = pathinfo($pathIllusB, PATHINFO_EXTENSION);
    $dataIllusB = file_get_contents($pathIllusB);
    $base64IllusB = 'data:image/' . $typeIllusB . ';base64,' . base64_encode($dataIllusB);
	
    $pathicon5 = 'image/dashboard-images/male-user.png';
    $typeIcon5 = pathinfo($pathicon5, PATHINFO_EXTENSION);
    $dataIcon5 = file_get_contents($pathicon5);
    $base64Icon5 = 'data:image/' . $typeIcon5 . ';base64,' . base64_encode($dataIcon5);
	
	$pathicon7 = 'image/dashboard-images/person.png';
    $typeIcon7 = pathinfo($pathicon7, PATHINFO_EXTENSION);
    $dataIcon7 = file_get_contents($pathicon7);
    $base64Icon7 = 'data:image/' . $typeIcon7 . ';base64,' . base64_encode($dataIcon7);

	function contains($str, array $arr){
		foreach($arr as $a) {
			if (stripos($str,$a) !== false) return true;
		}
		return false;
	}

	$sn = $thermoData['standardAndAccessories']; 
	$SNARRAY;
	if($sn == null){
		$sn = '0,0';
		$SNARRAY = explode(",", $sn);
	}else{
		$SNARRAY = explode(",", $sn);
	}	


	$sn="NULL";
	?>

<!DOCTYPE html>
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
<style>

	.modal4TempInRow tbody tr td input{
		width: auto;
	}
	
	table td {
	position: relative;
	}

	table td input {
		position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	/*resize: none;
	
	for full width without spacing */
	width: 100%;
	border: none;
	}
</style>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="">
    <meta name="author" content="Themepixels">

    <!-- Favicon -->
    <!-- <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png"> -->

    <title>RML ++</title>
    
    <link href="/dashboardAsset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="/dashboardAsset/lib/remixicon/fonts/remixicon.css" rel="stylesheet">
    
    <!-- Template CSS -->
    <link rel="stylesheet" href="/dashboardAsset/assets/css/style.min.css">
   </head>  
  <body class="skin-base animate">
  	<?php
		$data = [
			'active' => 'worksheet7',
			'show' => 'worksheet',
		];
		echo view('layouts/sidebarAdmin',$data)?>

	<?php
		if($forVerification == 'forCorrection'){
			$data = [
				'comment' => $thermoData['comment'],
				'verifier' => $thermoData['encodedBy'],
			];
			echo view('layouts/comments',$data);
		}?>

    <!-- Page Content -->
	<div class="content">
      <div class="content-header">
        <a id="contentMenu" href="#" class="content-menu d-none d-lg-flex"><i data-feather="menu"></i></a>
        <a id="mobileMenu" href="#" class="content-menu d-lg-none"><i data-feather="menu"></i></a>
      </div><!-- content-header -->
      <div class="content-body">
        <div class="container-fluid">
            <!--h1 class="mt-4">Admin Dashboard</h1-->
			<div id="userTable"> </div>
		<div class="">
			<div class="card shadow p-3 mb-5 bg-white rounded">
				<div class="card-header bg-white">
					<div class="">
						<label class="content-label"><b>Thermohygrometer</b></label>
					</div>
					<div class="">
						<label class="content-label" style="font-size:20pt; line-height:0.2">(UPDATE)</label>
						<label class="content-label">Calibration Worksheet</label>
					</div>
							<?php if (isset($validation)) : ?>
								<div class="col-12">
									<div class="alert alert-danger" role="alert">
										<?= $validation->listErrors() ?>
									</div>
								</div>
							<?php endif; ?>
							<form action="<?= base_url('thermoUpdateData') ?>" method="POST" id='formMain' enctype="multipart/form-data">
								<input type="hidden" name="completion" id="completion" value="Complete">
								<input type="hidden" name="idHere" value="<?=$thermoData['id']?>">
						<!-- INFORMATION-->
						
									<div class='row mt-2'>
											<input type="hidden" name="inputtedArrayTempIn" id="inputtedArrayTempIn" value="<?php if($thermoData['inputtedArrayTempIn']==null){echo null;}else{echo $thermoData['inputtedArrayTempIn'];}?>">
											<input type="hidden" name="inputtedArrayTempOut" id="inputtedArrayTempOut" value="<?php if($thermoData['inputtedArrayTempOut']==null){echo null;}else{echo $thermoData['inputtedArrayTempOut'];}?>">
											<input type="hidden" name="inputtedArrayRHIn" id="inputtedArrayRHIn" value="<?php if($thermoData['inputtedArrayRHIn']==null){echo null;}else{echo $thermoData['inputtedArrayRHIn'];}?>">
											<input type="hidden" name="inputtedArrayRHOunt" id="inputtedArrayRHOunt" value="<?php if($thermoData['inputtedArrayRHOunt']==null){echo null;}else{echo $thermoData['inputtedArrayRHOunt'];}?>">
										<div class='col-xl-6 col-12'>
											<i>Important: Please make sure that no space is added in Certificate No.</i><b style="color: red;"> *</b>
											<div class="mb-3">
												<label>Certificate No.</label>
												<input name='certificateNumber' value="<?=$thermoData['certificateNumber']?>" type="text" style="height: 50px;" class="form-control mt-n2 text-break" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
											</div>
											<div class=" mb-3">
											<label>Customer</label>
													<input name='customer' id="customer" list='customerList' required type="text" class="form-control mt-n2 text-break"  value="<?= $thermoData['customer']?>" onchange="getCustomerDetails()">
													<datalist id="customerList">
														<option selected>
															Customers
														</option>
														<?php
															try {
																$customers = new CustomersModel();			
																$arrCustomer[] = $customers->findAll(); 
																foreach($arrCustomer as $value){		
																	for ($i=0; $i < count($value); $i++) { 
														?>
														<option value="<?=  $arrCustomer[0][$i]['customer'];?> @ <?=  $arrCustomer[0][$i]['address'];?>">
														<?php
															}}
															} catch (\Throwable $th) {
														?>
														<option>
															<?=  $th;?>
														</option>
														<?php
															}
														?>
													</datalist>
													<input type="hidden" name="idOfCustomer" id="idOfCustomer">		
									</div>
									<div class=" mb-3">
										<label>Address</label>
										<textarea name='address' id="address"  type="text" style="height: 50px;" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" style="margin-top: 0px;margin-bottom: 0px;height: 80px;"><?=$thermoData['address']?></textarea>
									</div>
								</div>
								<div class='col-xl-6 col-12'>
									<h6>Dates</h6>
									<div class="row mt-2">
										<div class="col-6 mb-3">
											<label>Date Received</label>
											<input name='dateReceived' id='dateReceived' value="<?=$thermoData['dateReceived']?>" type="date" class="form-control text-break" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
										</div>
										<div class="col-6 mb-3">
											<label>Date Calibrated</label>
											<input name='dateCalibrated' id="sDate" value="<?=$thermoData['dateCalibrated']?>" type="date" class="form-control text-break" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
										</div>
									</div>
									

									<div class="row mb-3">
										<div class="col-5">
											<label>Recommended Due Date</label>												
											<select id="mon" class="form-control mt-n1" style="height: 50px;">
												<option value="6">6 Months</option>
												<option value="12">1 Year</option>
												<option value="24">2 Years</option>
											</select>
										</div>
										<div class="col mt-4">
										<input name='recommendedDueDate' id="eDate" value="<?=$thermoData['recommendedDueDate']?>" type="date" class="form-control text-break" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
										</div>
									</div>

									<!--div class="mb-3">
										<label>Place of Calibration</label> <br>
										<input list="calib" class="form-control" name="placeOfCalibration"/>
										<datalist id="calib">
											<option value="Hygrometry Laboratory">
											<option value="On Site">
										</datalist>
										<input name='placeOfCalibration' value="Hygrometry Laboratory" type="text" class="form-control text-break" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
									</div-->

									<div id="billdesc" class="mb-3">
									<label>Place of Calibration</label>
										<select id="test" class="form-control" name="placeOfCalibration">
											<option class="non" value="Hygrometry Laboratory" selected>Hygrometry Laboratory</option>
											<option class="non" value="On site">On site</option>
											<option class="editable" value="">Type here..</option>
										</select>
										<input class="editOption form-control" name="" style="display:none;  width: 90%; position: relative; top: -38px"></input>
									</div>
								</div>
								
							</div>
						<!-- INFORMATION -->
							<hr> 
						<!-- SPECIFICATION -->	
							<div class="mx-auto d-flex justify-content-center">
								<h5>Specifications of the Instrument</h5>
							</div>
							<div class='row mb-3'>
								<div class='col-12 col-xl-6 mt-2'>
									<label>Equipment Description</label>
									<input name='equipmentDescription'value="<?=$thermoData['equipmentDescription']?>"  style="height: 50px;"  type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
								</div>
								<div class="col-12 col-xl-6 mt-2">
									<label>Manufacturer</label>
									<input name="manufacturer"value="<?=$thermoData['manufacturer']?>"  style="height: 50px;" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
								</div>
								<div class="col-12 col-xl-6 mt-2">
									<label>Model No.</label>
									<input name='modelNumber'value="<?=$thermoData['modelNumber']?>"  style="height: 50px;" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
								</div>
								<div class="col-12 col-xl-6 mt-2">
									<label>Serial No.</label>
									<input name='serialNumber'value="<?=$thermoData['serialNumber']?>"  style="height: 50px;" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
								</div>
								<div class="col-12 col-xl-6 mt-2">
									<label>Equipment ID.</label>
									<input name='equipmentID'value="<?=$thermoData['equipmentID']?>"  style="height: 50px;" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
								</div>
								<div class="col-12 col-xl-6 mt-2">
									<label>Type of equipment</label>
									<select name="typeOfEquipment" id="typeOfEquipment" class="form-control" required>
										<option value="">Choose . . . </option>
										<option <?php if($thermoData['typeOfEquipment'] == "digital"){echo 'selected';}?> value="digital">Digital</option>
										<option <?php if($thermoData['typeOfEquipment'] == "analog"){echo 'selected';}?> value="analog">Analog</option>
									</select>
								</div>
							</div>
						<!-- SPECIFICATION -->
							<datalist id="graduationList">
								<option value="0.5">
								<option value="0.2">
								<option value="0.1">
							</datalist>
							<br>
							<hr>
						<!-- ENVIRONMENT -->
							<div class="mx-auto d-flex justify-content-center">
								<h5>Environment Condition</h5>
							</div>
								<div class='row mb-3'>
									<div class="col-6 col-xl-3 mt-2">
										<label>Start Temp</label>
										<input name='startTemp' type="text" style="height: 50px;" value="<?=$thermoData['startTemp']?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
									</div>
									<div class="col-6 col-xl-3 mt-2">
										<label>End Temp</label>
										<input name='endTemp' type="text" style="height: 50px;" value="<?=$thermoData['endTemp']?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
									</div>
									<div class="col-6 col-xl-3 mt-2">
										<label>Start RH</label>
										<input name='startRh'  type="text" style="height: 50px;" value="<?=$thermoData['startRh']?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
									</div>
									<div class="col-6 col-xl-3 mt-2">
										<label>End RH</label>
										<input name='endRh' type="text" style="height: 50px;" value="<?=$thermoData['endRh']?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
									</div>
								</div>	
							<div class='row mb-3'>
								<div class='col'>
									<label>Ambient Temperature</label>
									<input readonly name="ambTemp" style="height: 50px;" value="<?=$thermoData['ambTemp']?>" id="aveTemp" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
								</div>
								<div class="col">
									<label>Relative Humidity</label>
									<input readonly name="ambRh" style="height: 50px;" value="<?=$thermoData['ambRh']?>" id="AveRh" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
								</div>
							</div>		
							</div>
							
						<!-- ENVIRONMENT -->
							<br>

						

							
						<!-- Standards and Accessories REDO THE SELECT-->
								<div class="mx-auto d-flex justify-content-center">
									<h5>Standards and Accessories Used</h5>
								</div>

								<br>
								<div class="text-center">   
									
								<button type="button" class="btn btn-primary float-end btn-lg" style="right:0;top:0;" data-toggle="modal" data-target="#modalChamber">
									Select/Change chamber
								</button>
								<button type="button" class="btn btn-danger float-end btn-lg" style="right:0;top:0;" data-toggle="modal" data-target="#staticBackdrop">
									Select/Change Standard
								</button>						
								<input type="hidden" id="weights" value="">
									<input type="hidden" name="selectedChamber" id="selectedChamber" value="<?=$thermoData['selectedChamber']?>">
									<input type="hidden" name="standardAndAccessories" id="standardAndAccessories" value="<?=$thermoData['standardAndAccessories']?>" >
								</div>
								
								
						<!-- Standards and Accessories -->
							<hr>
							<br>
						<!-- PRELIMINARY -->
								<div class="mx-auto d-flex justify-content-center">
									<h5>Preliminary Inspection</h5>
								</div>
							
								<br>
								<div class="start-50" >
									<div class="form-check">
									<input class="form-check-input" type="checkbox" value="A" name="premA" id="premA" <?php if($thermoData['premA'] != NULL){echo"checked";}?>>
										<label class="form-check-label" for="premA" name="premA">
										Visual Inspection (clean the equipment w/ soft cloth to remove dust and small particles)
										</label>
									</div>
									<div class="form-check">
									<input class="form-check-input" type="checkbox" value="B" name="premB" id="premB" <?php if($thermoData['premB'] != NULL){echo"checked";}?>>
										<label class="form-check-label" for="premB" name="premB">
										Check the surface and edges of the equipment for any damages. (note in remarks)
										</label>
									</div>
									<div class="form-check">
									<input class="form-check-input" type="checkbox" value="C" name="premC" id="premC" <?php if($thermoData['premC'] != NULL){echo"checked";}?>>
										<label class="form-check-label" for="premC" name="premC">
										Check the protective window of the equipment for cracks/scratches, color change, and broken window.
										</label>
									</div>
									<div class="form-check">
									<input class="form-check-input" type="checkbox" value="D" name="premD" id="premD" <?php if($thermoData['premD'] != NULL){echo"checked";}?>>
										<label class="form-check-label" for="premD" name="premD">
										Record all necessary and vital information
										</label>
									</div>
								</div>
							</div>
						<!-- PRELIMINARY -->
							<hr>
							<br>
						<!--Measurement Table-->
							<div class="row">
								<div class="mx-auto my-3 d-flex justify-content-center">
									<h5 class="mx-5 mt-2">Measurement Data</h5>
									<div class="btn-group" role="group">
										<button type="button" class="btn btn-success" id='addButtonMeasurementTables' >Add</button>
										<button type="button" class="btn btn-danger" id='removeButtonMeasurementTables'>Remove</button>
										<button type="button" class="btn btn-warning" id='calculateButtonMeasurementTables' onclick="calculateAll()">Calculate</button>
										<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Show Uncertainty Budget</button>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="mx-auto justify-content-center table-responsive" id="measurementDataTables"></div>
							</div>
							<input type="hidden" name="measurementDatas" id="measurementDatas">
						<!--Measurement Table-->
						<!-- REMARKS-->
							<div class='position-relative mt-2'>
								<div class="position-absolute top-0 start-50 translate-middle">
									<h6>Remarks</h6>
								</div>
								<br>
								<div class="start-50" style=>
									<div class="form-check">
									<input class="form-check-input" type="checkbox" value="E" id="remarksE" name="remarksA">
										<label class="form-check-label" for="remarksE">
										Standard/s, accessory/ies, and UUC are in good condition before and after calibration
										</label>
									</div>
									<div class="form-check">
									<input class="form-check-input" type="checkbox" value="F" id="remarksF" >
										<label class="form-check-label" for="remarksF">
										Others:
										</label>
										<textarea name="remarksF" id='remarksFOthers' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" style="margin-top: 0px;margin-bottom: 0px;height: 80px;"></textarea>
									</div>
								</div>
							</div>
						<!-- REMARKS -->
							<hr>
						<!-- FOOTER -->
									<div class="row mb">
									<input type="hidden" name="verifierEmail" id="verifierEmail">
									<table class="table table-borderless" >
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <select  name="calibratedBy" id="calibratedBy" class="form-control">
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <select  name="encodedBy" id="encodedBy" class="form-control">
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type='text' name="" id="" class="form-control" value="Calibration Officer" disabled>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <select  name="checkedby" id="checkedby" class="form-control">
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
									</div>
						<!-- FOOTER -->
						<!-- IMAGE -->
							<div class="d-flex justify-content-center mt-4">
									<h6>Add Picture </h6>
							</div>
							<div class="input-group mb-3 d-flex justify-content-center">
								<input type="file" name="imageInput[]" accept="image/*" id="imageInput" onchange="loadFile(event)" multiple>
								<img id="output"/>
							</div>
						<!-- IMAGE -->
							<br>
							<div class=' text-center'>
								<!-- <Button type="button" class="btn btn-lg btn-primary mb-5" onclick='submitForm("formMain")' ><i class="fas fa-folder-plus"></i> Insert Data</Button> -->
							</div> 
							
										<div class="container">
														<div  id="forVerificationButtons" class="row justify-content-md-center">
															<div class="col-sm-1 text-center" id='verifyButtonDIV'>
															
															</div>
															<div class="col-sm-2 text-center" id='correctionButtonDIV'>
															
															</div>
															<div class="row">
																<div class="col text-center" id='commentDIV'>
																
																</div>
															</div>
														</div>
														
													</div>
													<div class="container">
													<a href="/thermoTable" class="btn btn-danger" style="float: right;" id='backButton'><i class="fas fa-door-closed"></i> Back</a>
												</div>
						</form>

						<button type="button" class="btn btn-warning float" data-toggle="modal" data-target="#confirmationModal" style="top: 350; right: 50;">
							<i data-feather="save" style="font-size: 50px;"></i>
						</button>
					</div>
				</div>
			</div>
					<form name="correctionForm" action="/thermoCorrection" method="post">
						<input type="hidden" name="completion" id="" value="For correction">
						<input type="hidden" value="<?php echo $thermoData['id']; ?>" name="idCorrection">
						<input type="hidden" name="comment" id="commentHidden"></input>
					</form>


		<!-- Modal 1-->
			<div class="modal  fade" id="staticBackdrop"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
				<div class="modal-dialog modal-lg modal-dialog-scrollable">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticBackdropLabel">Standards and Accessories Used</h5>
							<!--button type="button" class="btn-close btn btn-danger" data-bs-dismiss="modal" aria-label="Close">&times</button-->
						</div>

						<div class="modal-body">
							<div class="row">
								<div class="col-8">
									<h5><i>(Select and check the standard/s)</i></h5>
								</div>
								<div class="col" style="color: red; font-size: 18px;">
									<ul>
										<li>Expire</li>
									</ul>							
								</div>
								<div class="col" style="color: green; font-size: 18px;">
									<ul>
										<li>Okay</li>
									</ul>
								</div>
							</div>
								<table class="table table-sm ">
									<thead>
										<tr>
											<th>Checkbox</th>
											<th>Manufacturer</th>
											<th>Model No.</th>
											<th>Serial No.</th>
											<th>Calibration date</th>
											<th>Due date</th>
										</tr>
									</thead>
									<tbody id="tableStandardBody">
										<?php
											
											try {
												$rmlStandard = new ThermoStandard();
												$arrStandard[] = $rmlStandard->findAll(); 
												foreach($arrStandard as $value){
												for ($i=0; $i < count($value); $i++) { 
										?>
										<tr
										<?php 
											date_default_timezone_set('Asia/Manila');
											$forComparisonToday = strtotime(date('Y-m-d'));
											$standardDue = $arrStandard[0][$i]['dateOfCali']; 
											$standardDue = strtotime($standardDue); 
											$standardDue_Date = strtotime('+ 1 year', $standardDue); 
											$standardDue_DateBefore = strtotime('+ 11 month', $standardDue); 
											$forComparisonStandardDue = strtotime(date('Y-m-d', $standardDue_Date));
											$forComparisonStandardDueBefore = strtotime(date('Y-m-d', $standardDue_DateBefore));
											$s = $forComparisonToday>$forComparisonStandardDueBefore;
											$t = $forComparisonStandardDueBefore<$forComparisonStandardDue;
											if($forComparisonToday>$forComparisonStandardDue){
												echo'style="background-color:rgba(255,0,0,0.5) "'; //red
												}elseif($s && $t ){
													echo'style="background-color:rgba(255,165,0,0.5)"'; //orange
												}else{
													echo'style="background-color:rgba(0,128,0,0.5)"'; //green
												}
											?>
										>	
											<td>
												<div class="">
													<input class="" type="checkbox" name="weightCheckbox" <?php if(contains($arrStandard[0][$i]['serialNumber'],$SNARRAY)){echo 'checked';};?> value="<?=  $arrStandard[0][$i]['serialNumber'];?>" id="flexCheck<?=$i?>">
												</div>
											</td>
											<td><label class="form-check-label" for="flexCheck<?=$i?>"><?=  $arrStandard[0][$i]['manufacturer'];?></label></td>
											<td><?=  $arrStandard[0][$i]['modelNumber'];?></td>
											<td><?=  $arrStandard[0][$i]['serialNumber'];?></td>
											<td> <?php $date = $arrStandard[0][$i]['dateOfCali']; $new_date = strtotime( $date); echo date('M d, Y', $new_date); ?></td>		
											<td> <?php $date = $arrStandard[0][$i]['dateOfCali']; $date = strtotime($date); $new_date = strtotime('+ 1 year', $date); echo date('M d, Y', $new_date); ?></td>				
										
										</tr>
									</div>	
									<?php
										}}
											} catch (\Throwable $th) {
												var_dump($th);
											}
									?>
								</tbody>
									<input name='weight' class="form-check-input" type="hidden" id="weight">
								</div>
							</div>
						</div>
										</table>
						<div class="float-right">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-success" onclick=" getWeight()" data-dismiss="modal"><i class="fas fa-check"></i> Select</button>
					
						</div>
					</div>
				</div>
			</div>
		<!-- Modal -->

		<!--Modal 3-->

			<div class="modal fade" id="standardModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl modal-dialog-scrollable">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Standards</h5>
					
					
					<div class="input-group w-50 close">
						<input type="text" class="form-control " id="searchStandard" placeholder="Nominal Value" aria-label="Search" aria-describedby="button-addon2">
						<input type="text" class="form-control " id="searchStandardUnit" placeholder="Unit" aria-label="Search" aria-describedby="button-addon2">
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="filterOriginal()">Seach</button>
						</div>
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="refreshToOriginal()">Refresh</button>
						</div>
					</div>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					
				</div>
				<div class="modal-body">
			
				<table class="table " id="standardRows">
						<thead>
							<tr>
								<th >Description</th>
								<th >Type</th>
								<th style="font-size:.9em">Serial Number</th>
								<th></th>
							</tr>
						</thead>
						
					</table>



					<div id="StandardRowsHere">
						<table class="table " id="standardRows">
							<thead>
								<tr>
									<th >Test Point</th>
									<th >RML</th>
									<th >NML</th>
									<th >Correction</th>
									<th>Readout Standard Uncertainty from Certificate</th>
									<th>Uncertainty</th>
								</tr>
							</thead>

							<tbody>
								
								
							</tbody>
							
						</table>
					</div>
					
				</div>
				<!-- <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Use Standard</button>
				</div> -->
				</div>
			</div>
			</div>

		<!--Modal-->

		<!--Modal 3 Drift-->

			<div class="modal fade" id="standardDriftModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-xl modal-dialog-scrollable">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Standards</h5>
						
						
						<div class="input-group w-50 close">
							<input type="text" class="form-control " id="searchStandard" placeholder="Nominal Value" aria-label="Search" aria-describedby="button-addon2">
							<input type="text" class="form-control " id="searchStandardUnit" placeholder="Unit" aria-label="Search" aria-describedby="button-addon2">
							<div class="input-group-append">
								<button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="filterOriginal()">Seach</button>
							</div>
							<div class="input-group-append">
								<button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="refreshToOriginal()">Refresh</button>
							</div>
						</div>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						
					</div>
					<div class="modal-body">
				
						<div id="StandardRowsHere">
							<table class="table " id="standardRows">
								<thead>
									<tr>
										<th >Date Calibrated</th>
										<th >Test Point</th>
										<th >Value</th>
										<th >Unit</th>
									</tr>
								</thead>

								<tbody>
									
										
								</tbody>
								
							</table>
						</div>
						
					</div>
					<!-- <div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Use Standard</button>
					</div> -->
					</div>
				</div>
				</div>

		<!--Modal-->

		<!--Modal 4-->
			<div class="modal fade" id="modalForCalculation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="width:100%;">
				<div class="modal-dialog modal-dialog-scrollable modal-xl" >
					<div class="modal-content  modal-xl">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Calculated Values</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">		
						<div class="table-responsive">
									<table class="table table-bordered modal4TempInRow" id="">
										<thead>
											<tr>
												<th>UUC Std Dev</th>
												<th scope="col">Unc due to UUC Resolution</th>
												<th scope="col">Unc due to UUC repeatability</th>
												<th scope="col">Standard Std Dev</th>
												<th scope="col">Caculated Value considering Correction</th>
												<th scope="col">corrected value</th>
												<th scope="col">Unc due to Standard repeatability</th>
												<th scope="col">Readout Standard Uncertainty from Certificate</th>
												<th scope="col">PRT Standard Uncertainty from Certificate</th>	
												<th scope="col">Uncertainty due to Standard Readout</th>
												<th scope="col">Uncertainty due to Standard PRT</th>
												<th scope="col">Drift</th>
												<th scope="col">Uncertainty due to Drift</th>
												<th scope="col">STD Res</th>
												<th scope="col">Unc due to STD Resolution</th>
												<th scope="col">Chamber Uniformity</th>
												<th scope="col">Unc due to Chamber Uniformity</th>
												<th scope="col">Hysteresis</th>	
												<th scope="col">DOF</th>
												<th scope="col">Combined Uncertainty</th>
												<th scope="col">k</th>
												<th scope="col">Expanded Uncertainty</th>	
											</tr>
										</thead>
										<tbody>
											
											<tr> 
												<td >						
													<input id='UUCStdDev' type="text" class="form-control" >
												</td>
												<td>						
													<input id='uncResolution' type="text" class="form-control" >
												</td>
												<td>						
													<input id='uncRepeatability' type="text" class="form-control" >
												</td>
												<td>						
													<input id='standardStdDev' type="text" class="form-control" >
												</td>
												<td>						
													<input id='calculatedValueConsideringCorrection' type="text" class="form-control" >
												</td>
												<td>						
													<input id='correctedValue' type="text" class="form-control" >
												</td>
												<td>						
													<input id='uncStandardRepeatability' type="text" class="form-control" >
												</td>
												<td>						
													<input id='readoutStandardUncertaintyFromCertificate' type="text" class="form-control" >
												</td>
												<td>						
													<input id='PRTStandardUncertaintyFromCertificate' type="text" class="form-control" >
												</td>
												<td>						
													<input id='uncertatityStandardReadout' type="text" class="form-control" >
												</td>
												<td>						
													<input id='uncertatityStandardPRT' type="text" class="form-control" >
												</td>
												<td>						
													<input id='drift' type="text" class="form-control" >
												</td>
												<td>						
													<input id='uncertaintyDrift' type="text" class="form-control" >
												</td>
												<td>						
													<input id='STDRes' type="text" class="form-control" >
												</td>
												<td>						
													<input id='uncSTDResolution' type="text" class="form-control" >
												</td>
												<td>						
													<input id='chamberUniformity' type="text" class="form-control" >
												</td>
												<td>						
													<input id='uncChamberUniformity' type="text" class="form-control" >
												</td>
												<td>						
													<input id='hysteresis' type="text" class="form-control" >
												</td>
												<td>						
													<input id='DOF' type="text" class="form-control" >
												</td>
												<td>						
													<input id='combinedUncertainty' type="text" class="form-control" >
												</td>
												<td>						
													<input id='k' type="text" class="form-control" >
												</td>
												<td>						
													<input id='expandedUncertainty' type="text" class="form-control" >
												</td>
											</tr>
										</tbody>
									</table>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-primary">Save</button>
					</div>
					</div>
				</div>
			</div>
		<!--Modal 4-->
</div>
		
<!-- Modal uncert -->
<div class="modal fade" id="modalUncertBudget" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Uncertainty budget</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table>
			<thead>
				<th>Test Point</th>
				<th>u<sub>std</sub></th>
				<th>u<sub>std_rep</sub></th>
				<th>u<sub>drift</sub></th>
				<th>u<sub>std_res</sub></th>
				<th>u<sub>uuc_res</sub></th>
				<th>u<sub>uuc_rep</sub></th>
				<th>u<sub>uuc_hyst</sub></th>
				<th>u<sub>uniformity</sub></th>
				<th>u<sub>instability</sub></th>
				<th>u<sub>c</sub></th>
				<th>k</th>
				<th>U</th>
				<th>Unit</th>
			</thead>
			<tbody id="uncertBudgetTBody">

			</tbody>
		</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

		<!-- Modal chamber-->
			<div class="modal fade" id="modalChamber" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Chamber</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<table class="table table-sm table-bordered" id="users-list">
							<thead class="">
								<tr>
									<th>Checkbox</th>
									<th>Serial No.</th>
								
								</tr>
							</thead>
							<tbody>
								<?php 
									use App\Models\ThermoChamberModel;
									$model = new ThermoChamberModel();
									$thermochamber = $model->findAll(); 
									$lastSN = '';
									foreach($thermochamber as $row) : 
										
										if($row['serialNumber'] == $lastSN){
											$lastSN = $row['serialNumber']; 
											continue;
										}else{
											$lastSN = $row['serialNumber'];
								?>
									<tr id="<?php echo $row['id'] ?>">
										<td>
											<input class="form-check-input" type="radio" name="chamberSelection" <?php if($thermoData['selectedChamber'] == $row['serialNumber']){echo 'checked';};?> value="<?= $row['serialNumber'];?>" id="flexCheck<?=$i?>">
										</td>
										<td>
											<label class="form-check-label" for="flexCheck<?=$i?>"><?= $row['serialNumber'];?>
										</td>
									</tr>   
								<?php }endforeach; 
								?>        
							</tbody>
						</table>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="getChamberValue()">Save changes</button>
					</div>
					</div>
				</div>
			</div>
		<!-- Modal -->
		<!-- modal for Confirmation -->
					<div class="modal fade" id="confirmationModal" tabindex="-1">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Changes have been made.</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									Would you like to save? 
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Dismiss</button>
									<button type="button" class="btn btn-primary" onclick="confirmationSave('formMain')">Save changes</button>
								</div>
							</div>
						</div>
					</div>
		<!-- modal for Confirmation -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<!--Formula.js-->
<script src="https://cdn.jsdelivr.net/npm/jstat@1.9.2/dist/jstat.min.js"></script> 
<script src="https://cdn.jsdelivr.net/gh/formulajs/formulajs@2.5.0/dist/formula.min.js"></script>

<script src="/js/module2Formulas.js"></script>
<script>
	function getAverageOfEnvironment(start, end, average){
		let startVal = parseFloat(document.getElementById(start).value);
		let endVal = parseFloat(document.getElementById(end).value);
		document.getElementById(average).value = (startVal+endVal)/2;
	}

	var isSubmitting = false

	url = new URL(window.location.href);

	if (url.searchParams.get('SN')) {
		$(document).ready(function () {
			$('#formMain').submit(function(){
				isSubmitting = true
			})

			$('#formMain').data('initial-state', $('#formMain').serialize());

			$(window).on('beforeunload', function(e) {
				if (!isSubmitting && $('#formMain').serialize() != $('#formMain').data('initial-state')){
					return 'You have unsaved changes which will not be saved.'
				}
			});
		})

	}
	
	function openModal(modalId){
		$(modalId).modal('toggle');
	}

	function confirmationSave(idOfForm){
		var actionUrl = '<?= base_url('thermoUpdateSaveData') ?>';
		document.getElementById(idOfForm).setAttribute('action', actionUrl);
		document.getElementById('completion').value = "Not Completed";
		//automaticAddToObject();		
		calculateAll();
		document.getElementById(idOfForm).submit();

	}

	$(document).ready(function(){
		$('#formMain').submit(function(e){
			e.preventDefault();
			var form = $(this);
			$.ajax({
				url: form.attr('action'),
				type: "POST",
				data: $(this).serialize(),
				success: function(data){
					alert(data)
				},
				error: function(){
					alert("Form submission failed!");
				}
			});
		});
	});

	function submitForm(idOfForm){
		var status = '<?=  $thermoData['completion'];?>';
		if(status == "For printing"){
			document.getElementById('completion').value = "For printing";
		}else{
			document.getElementById('completion').value = "Pending";
		}
		calculateAll();
		document.getElementById(idOfForm).submit();
	}
</script>

	<script>
		<?php
			$rmlStandard = new ThermoStandard();
			$arrStandard[] = $rmlStandard->findAll();
			$rmlTestPoint = new ThermoStandardAddTestPointsModel();
			$arrTestPoint[] = $rmlTestPoint->findAll(); 
			$rml = new ThermoStandardAddDriftModel();
			$rmlPRT = new ThermoStandardAddDriftPRTModel();
			$arrDrift[] = $rml->findAll();
			$PRT = 0;
			$arrDrifPRTt[] = $rmlPRT->findAll();
		
		?>
		var weight;
		var weightSplitted;
		var selectedIndication;
		var ArrayOfStandardDetails = <?= json_encode($arrStandard)?>;

		var ArrayOfStandardOriginal = <?= json_encode($arrTestPoint)?>;
		var ArrayOfChamber = <?= json_encode($thermochamber)?>;
		var driftArray = <?= json_encode($arrDrift)?>;
		var driftArrayPRT = <?= json_encode($arrDrifPRTt)?>;

		var inhomoTemp = 0;
		var instaTemp = 0;
		var inhomoRH = 0;
		var instaRH = 0;
		function getChamberValue(){
			

			var selectedChamber = document.querySelector('input[name="chamberSelection"]:checked').value;
			var chamberHiddenInput = document.getElementById('selectedChamber');
			chamberHiddenInput.value = document.querySelector('input[name="chamberSelection"]:checked').value;;
			var data = filterDataDynamic(selectedChamber,'serialNumber',ArrayOfChamber)
			var tempData =  filterDataDynamic('Temperature','unit',data);
			var rhData =  filterDataDynamic('Relative Humidity','unit',data);
			inhomoTemp = tempData[0]['inhomogeneity']
			instaTemp = tempData[0]['Instability']
			inhomoRH = rhData[0]['inhomogeneity']
			instaRH = rhData[0]['Instability']
			
		}
		getChamberValue();

		function filterDataDynamic(searchingFor, searchIn, UnfilteredArray){
			let filteredDATA = UnfilteredArray.filter(function (e) {
			if (searchingFor == searchingFor ) {
				return e[searchIn] == searchingFor;
				}
			});
			return filteredDATA;
		}

		var datas;
		function calculateAll(){
			var numberOfTables = document.getElementById('measurementDataTables').childElementCount;
			var arrayOfComputedPerTable = {};
			for (let i = 1; i <= numberOfTables; i++) {
				var table = document.getElementById('table'+i);
				var inputs = table.getElementsByTagName('input');
				var selects = table.getElementsByTagName('select');

				var functionType = selects['functionTable'+i].value;
				var channelName = inputs['channelNameTable'+i].value;
				var brand = inputs['brandTable'+i].value
				var serialNumber = inputs['serialNumberTable'+i].value
				var modelName = inputs['modelTable'+i].value


				var numberOfRows = table.rows.length - 3;
				var objectKey = functionType+channelName;
				var objectOfComputedPerRow = {
					"functionType":functionType,
					"channelName":channelName,
					"brand":brand,
					"serialNumber":serialNumber,
					"modelName":modelName,
					"inputs":{},
					"caluculated":{},

				};
				

				var firstTestPoint = inputs['testPointTbodyTable'+i+'Row'+1].value;
				var firstStandardUsed = selects['standardUsedTbodyTable'+i+'Row'+1].value; 

				var firstUUCAverage = inputs['UUCAverageTbodyTable'+i+'Row'+1].value;
				var firstStandardReadingAve = inputs['standardAverageTbodyTable'+i+'Row'+1].value;

				function firstSortedArrayForRow(){	
					var tempTemp = [];
					var tempRh = [];
					var sorted = {
						"Temp":[],
						"Rh":[],
					}
					
					for(let x=0;x<ArrayOfStandardOriginal[0].length;x++){
						if (ArrayOfStandardOriginal[0][x].serialNumber == firstStandardUsed) {
							if (ArrayOfStandardOriginal[0][x].unit == "Temperature") {
								tempTemp.push({
									TP:	ArrayOfStandardOriginal[0][x].testPoint,
									Corr : ArrayOfStandardOriginal[0][x].correction
								});
							}
							if (ArrayOfStandardOriginal[0][x].unit == "Relative Humidity") {
								tempRh.push({
									TP:	ArrayOfStandardOriginal[0][x].testPoint,
									Corr : ArrayOfStandardOriginal[0][x].correction
								});
							}
						}
					};
					sorted["Temp"] = tempTemp.sort(function(a, b){return a.TP - b.TP});
					sorted["Rh"] = tempRh.sort(function(a, b){return a.TP - b.TP});
					return sorted;
				}	
				var firstSortedArray = function(){
					if(functionType == "Temp"){
						return firstSortedArrayForRow()['Temp'];
					}else if(functionType == "Rh"){
						return firstSortedArrayForRow()['Rh'];
					}
				}

				var firstCorrectionFromCertificate;
				if(search(firstTestPoint,firstSortedArray())){
					if(functionType == "Temp"){
						var firstCorrection = correctionFromCert(firstTestPoint,firstStandardUsed);
					}else if(functionType == "Rh"){
						var firstCorrection = correctionFromCertRH(firstTestPoint,firstStandardUsed);
					}
				}
				else {
					var firstCorrection = interpolationCorr(firstTestPoint,firstStandardUsed);
				}
				firstCorrectionFromCertificate = firstCorrection;

				var firstCorrectedValue = correctedValueFunction({standardReadingAve:firstStandardReadingAve, correctionFromCertificate:parseFloat(firstCorrectionFromCertificate)});

				var endTestPoint = inputs['testPointTbodyTable'+i+'Row'+numberOfRows].value;
				var endStandardUsed = selects['standardUsedTbodyTable'+i+'Row'+numberOfRows].value; 

				var endUUCAverage = inputs['UUCAverageTbodyTable'+i+'Row'+numberOfRows].value;
				var endStandardReadingAve = inputs['standardAverageTbodyTable'+i+'Row'+numberOfRows].value;

				var endSortedArrayForRow = function(){	
					var tempTemp = [];
					var tempRh = [];
					var sorted = {
						"Temp":[],
						"Rh":[],
					}
					
					for(let x=0;x<ArrayOfStandardOriginal[0].length;x++){
						if (ArrayOfStandardOriginal[0][x].serialNumber == endStandardUsed) {
							if (ArrayOfStandardOriginal[0][x].unit == "Temperature") {
								tempTemp.push({
									TP:	ArrayOfStandardOriginal[0][x].testPoint,
									Corr : ArrayOfStandardOriginal[0][x].correction
								});
							}
							if (ArrayOfStandardOriginal[0][x].unit == "Relative Humidity") {
								tempRh.push({
									TP:	ArrayOfStandardOriginal[0][x].testPoint,
									Corr : ArrayOfStandardOriginal[0][x].correction
								});
							}
						}
					};
					sorted["Temp"] = tempTemp.sort(function(a, b){return a.TP - b.TP});
					sorted["Rh"] = tempRh.sort(function(a, b){return a.TP - b.TP});
					return sorted;
				}	
				var endSortedArray = function(){
					if(functionType == "Temp"){
						return endSortedArrayForRow()['Temp'];
					}else if(functionType == "Rh"){
						return endSortedArrayForRow()['Rh'];
					}
				}

				var endCorrectionFromCertificate;
				if(search(endTestPoint,endSortedArray())){
					if(functionType == "Temp"){
						var endCorrection = correctionFromCert(endTestPoint,endStandardUsed);
					}else if(functionType == "Rh"){
						var endCorrection = correctionFromCertRH(endTestPoint,endStandardUsed);
					}
				}
				else {
					var endCorrection = interpolationCorr(endTestPoint,endStandardUsed);
				}
				endCorrectionFromCertificate = endCorrection;

				var endCorrectedValue = correctedValueFunction({standardReadingAve:endStandardReadingAve, correctionFromCertificate:parseFloat(endCorrectionFromCertificate)});

				for (let x = 1; x <= numberOfRows; x++) {
					objectOfComputedPerRow["inputs"]['Row'+x] = {};
					objectOfComputedPerRow["caluculated"]['Row'+x] = {};

					var testPoint = inputs['testPointTbodyTable'+i+'Row'+x].value;
					var standardUsed = selects['standardUsedTbodyTable'+i+'Row'+x].value; 
					var consideringCorrection = inputs['consideringCorrectionTbodyTable'+i+'Row'+x].value; 
					var resolution = inputs['resolutionTbodyTable'+i+'Row'+x].value; 
					var readablitiy = inputs['readabilityTbodyTable'+i+'Row'+x].value; 
					var uucTrial1 = inputs['UUCtrial1TbodyTable'+i+'Row'+x].value;
					var uucTrial2 = inputs['UUCtrial2TbodyTable'+i+'Row'+x].value; 
					var uucTrial3 = inputs['UUCtrial3TbodyTable'+i+'Row'+x].value;
					var uucAverage = inputs['UUCAverageTbodyTable'+i+'Row'+x].value;
					var standardTrial1 = inputs['standardTrial1TbodyTable'+i+'Row'+x].value;
					var standardTrial2 = inputs['standardTrial2TbodyTable'+i+'Row'+x].value; 
					var standardTrial3 = inputs['standardTrial3TbodyTable'+i+'Row'+x].value;
					var standardAverage = inputs['standardAverageTbodyTable'+i+'Row'+x].value;
					var standardResolution = inputs['standardResolutionTbodyTable'+i+'Row'+x].value;
					var chamberInhomogeneity = inputs['chamberInhomogeneityTbodyTable'+i+'Row'+x].value;
					var chamberInstability = inputs['chamberInstabilityTbodyTable'+i+'Row'+x].value; 
					var range = inputs['rangeTbodyTable'+i+'Row'+x].value;
					var correctedValue = inputs['correctedValueTbodyTable'+i+'Row'+x].value;

					objectOfComputedPerRow["inputs"]['Row'+x]['testPoint'] = testPoint;
					objectOfComputedPerRow["inputs"]['Row'+x]['standardUsed'] = standardUsed;
					objectOfComputedPerRow["inputs"]['Row'+x]['consideringCorrection'] = consideringCorrection;
					objectOfComputedPerRow["inputs"]['Row'+x]['resolution'] = resolution;
					objectOfComputedPerRow["inputs"]['Row'+x]['readablitiy'] = readablitiy;
					objectOfComputedPerRow["inputs"]['Row'+x]['uucTrial1'] = uucTrial1;
					objectOfComputedPerRow["inputs"]['Row'+x]['uucTrial2'] = uucTrial2;
					objectOfComputedPerRow["inputs"]['Row'+x]['uucTrial3'] = uucTrial3;
					objectOfComputedPerRow["inputs"]['Row'+x]['uucAverage'] = uucAverage;
					objectOfComputedPerRow["inputs"]['Row'+x]['standardTrial1'] = standardTrial1;
					objectOfComputedPerRow["inputs"]['Row'+x]['standardTrial2'] = standardTrial2;
					objectOfComputedPerRow["inputs"]['Row'+x]['standardTrial3'] = standardTrial3;
					objectOfComputedPerRow["inputs"]['Row'+x]['standardAverage'] = standardAverage;
					objectOfComputedPerRow["inputs"]['Row'+x]['standardResolution'] = standardResolution;
					objectOfComputedPerRow["inputs"]['Row'+x]['chamberInhomogeneity'] = chamberInhomogeneity;
					objectOfComputedPerRow["inputs"]['Row'+x]['chamberInstability'] = chamberInstability;
					objectOfComputedPerRow["inputs"]['Row'+x]['range'] = range;
					objectOfComputedPerRow["inputs"]['Row'+x]['correctedValue'] = correctedValue;

					var isPRT = checkIfPRT(standardUsed);
					try{
						function sortedArrayForRow(){	
							var tempTemp = [];
							var tempRh = [];
							var sorted = {
								"Temp":[],
								"Rh":[],
							}
							
							for(sorted_x=0;sorted_x<ArrayOfStandardOriginal[0].length;sorted_x++){
								if (ArrayOfStandardOriginal[0][sorted_x].serialNumber == standardUsed) {
									if (ArrayOfStandardOriginal[0][sorted_x].unit == "Temperature") {
										tempTemp.push({
											TP:	ArrayOfStandardOriginal[0][sorted_x].testPoint,
											Corr : ArrayOfStandardOriginal[0][sorted_x].correction
										});
									}
									if (ArrayOfStandardOriginal[0][sorted_x].unit == "Relative Humidity") {
										tempRh.push({
											TP:	ArrayOfStandardOriginal[0][sorted_x].testPoint,
											Corr : ArrayOfStandardOriginal[0][sorted_x].correction
										});
									}
								}
							};
							sorted["Temp"] = tempTemp.sort(function(a, b){return a.TP - b.TP});
							sorted["Rh"] = tempRh.sort(function(a, b){return a.TP - b.TP});
							return sorted;
						}	

						var sortedArray = function(){
							if(functionType == "Temp"){
								return sortedArrayForRow()['Temp'];
							}else if(functionType == "Rh"){
								return sortedArrayForRow()['Rh'];
							}
						}

						function driftArrayForRow(){
							var driftForReturn = {
								"Temp":[],
								"Rh":[],
								"PRT":[],
							};
							if(!isPRT){
								for(drift_x=0;drift_x<driftArray[0].length;drift_x++){
									if (driftArray[0][drift_x].serialNumber == standardUsed) {
										if (driftArray[0][drift_x].unit == 'Air Temperature') {
											driftForReturn['Temp'].push({
												dateCalibrated: driftArray[0][drift_x].dateCalibrated,
												dateValue: formulajs.DATEVALUE(driftArray[0][drift_x].dateCalibrated),
												testPoint:	driftArray[0][drift_x].testPoint,
												testValue:	driftArray[0][drift_x].testPointValue,
											});
										}
										if (driftArray[0][drift_x].unit == 'Relative Humidity') {
											driftForReturn['Rh'].push({
												dateCalibrated: driftArray[0][drift_x].dateCalibrated,
												dateValue: formulajs.DATEVALUE(driftArray[0][drift_x].dateCalibrated),
												testPoint:	driftArray[0][drift_x].testPoint,
												testValue:	driftArray[0][drift_x].testPointValue,
											});
										}
									}
								};
							}else{
								for(driftPRT_x=0;driftPRT_x<driftArrayPRT[0].length;driftPRT_x++){
									if (driftArrayPRT[0][driftPRT_x].serialNumber ==  standardUsed) {
										driftForReturn['PRT'].push({
											testPoint: driftArrayPRT[0][driftPRT_x].testPoint,
											previousTest: driftArrayPRT[0][driftPRT_x].previousTest,
											currentTest:	driftArrayPRT[0][driftPRT_x].currentTest,
											drift:	driftArrayPRT[0][driftPRT_x].drift,
										});
									}
								};
							}	
							return driftForReturn;
						}

						var driftArrayFiltered = function(){
							if (isPRT) {
								return driftArrayForRow()['PRT'];
							} else {
								if(functionType == "Temp"){
									return driftArrayForRow()['Temp'];
								}else if(functionType == "Rh"){
									return driftArrayForRow()['Rh'];
								}
							}
						}

						var uucSTDDev = standardDev({trial1:uucTrial1,trial2:uucTrial2,trial3:uucTrial3}); 
						var standardSTDDev = standardDev({trial1:standardTrial1,trial2:standardTrial2,trial3:standardTrial3}); ;
						var correctionFromCertCondition;
						if(search(testPoint,sortedArray())){
							if(functionType == "Temp"){
								var correction = correctionFromCert(testPoint,standardUsed);
							}else if(functionType == "Rh"){
								var correction = correctionFromCertRH(testPoint,standardUsed);
							}
						}
						else {
							var correction = interpolationCorr(testPoint,standardUsed);
						}
						correctionFromCertCondition = correction;

						
						var readoutStandardUncertaintyFromCertificate = readoutStandardUncertaintyFromCertificateGetMax(standardUsed);
						var PRTStandardUncertaintyFromCertificate = PRTStandardUncertaintyFromCertificateGetMax(functionType,standardUsed);
						var consideringCorrectionFull = calculatedValueConsideringCorrection(testPoint,correction);
						var correctedValueFull = correctedValueFunction({standardReadingAve:standardAverage, correctionFromCertificate:parseFloat(correctionFromCertCondition)});
						var drift = slopeFormula(driftArrayFiltered(),testPoint,isPRT);

						var UncUUCResolution = UncUUCResolutionFunction(i,x);
						var UncUUCRepeatability = UncUUCRepeatabilityFunction(uucSTDDev);
						var UncStandardRepeatability = UncStandardRepeatabilityFunction(standardSTDDev);
						var UncStandardReadout = UncStandardReadoutFunction(parseFloat(readoutStandardUncertaintyFromCertificate));
						var UncStandardPRT = UncStandardPRTFunction(parseFloat(PRTStandardUncertaintyFromCertificate));
						var UncDrift = UncDriftFunction(drift);
						var UncSTDResolution = UncSTDResolutionFunction(standardResolution);
						var UncChamberUniformity = UncChamberUniformityFunction(chamberInhomogeneity);
						var UncChamberInstability = UncChamberInstabilityFunction(chamberInstability);

						var hysteresis = hysteresisFunction({
							uucReadingAve1:firstUUCAverage,
							uucReadingAve2:endUUCAverage,
							correctedValue1:firstCorrectedValue,
							correctedValue2:endCorrectedValue
						});
						var combinedUncertainty = combinedUncertaintyFunction({
							i:UncUUCResolution,
							o:UncUUCRepeatability,
							z:UncStandardReadout,
							ac:UncDrift,
							ae:UncSTDResolution,
							ag:UncChamberUniformity,
							ah:hysteresis,
							aa:UncStandardPRT,
							w:UncStandardRepeatability,
							ai:	UncChamberInstability,
						});
						var DOF = DOFFunction({
							i:UncUUCResolution,
							o:UncUUCRepeatability,
							z:UncStandardReadout,
							ac:UncDrift,
							ae:UncSTDResolution,
							ag:UncChamberUniformity,
							ah:hysteresis,
							aa:UncStandardPRT,
							w:UncStandardRepeatability,
							aj:combinedUncertainty,
							ai:	UncChamberInstability,
						});
						var k = calculateKFunction(parseFloat(DOF));
						var expandedUncertainty = expandedUncertaintyFunction(combinedUncertainty,k);

						objectOfComputedPerRow["caluculated"]['Row'+x]['isPRT'] = isPRT;
						objectOfComputedPerRow["caluculated"]['Row'+x]['uucSTDDev'] = uucSTDDev;
						objectOfComputedPerRow["caluculated"]['Row'+x]['standardSTDDev'] = standardSTDDev;
						objectOfComputedPerRow["caluculated"]['Row'+x]['correctionFromCertCondition'] = correctionFromCertCondition;
						objectOfComputedPerRow["caluculated"]['Row'+x]['readoutStandardUncertaintyFromCertificate'] = readoutStandardUncertaintyFromCertificate;
						objectOfComputedPerRow["caluculated"]['Row'+x]['PRTStandardUncertaintyFromCertificate'] = PRTStandardUncertaintyFromCertificate;
						objectOfComputedPerRow["caluculated"]['Row'+x]['consideringCorrectionFull'] = consideringCorrectionFull;
						objectOfComputedPerRow["caluculated"]['Row'+x]['correctedValueFull'] = correctedValueFull;
						objectOfComputedPerRow["caluculated"]['Row'+x]['drift'] = drift;
						objectOfComputedPerRow["caluculated"]['Row'+x]['UncUUCResolution'] = UncUUCResolution;
						objectOfComputedPerRow["caluculated"]['Row'+x]['UncUUCRepeatability'] = UncUUCRepeatability;
						objectOfComputedPerRow["caluculated"]['Row'+x]['UncStandardRepeatability'] = UncStandardRepeatability;
						objectOfComputedPerRow["caluculated"]['Row'+x]['UncStandardReadout'] = UncStandardReadout;
						objectOfComputedPerRow["caluculated"]['Row'+x]['UncStandardPRT'] = UncStandardPRT;
						objectOfComputedPerRow["caluculated"]['Row'+x]['UncDrift'] = UncDrift;
						objectOfComputedPerRow["caluculated"]['Row'+x]['UncSTDResolution'] = UncSTDResolution;
						objectOfComputedPerRow["caluculated"]['Row'+x]['UncChamberUniformity'] = UncChamberUniformity;
						objectOfComputedPerRow["caluculated"]['Row'+x]['UncChamberInstability'] = UncChamberInstability;
						objectOfComputedPerRow["caluculated"]['Row'+x]['hysteresis'] = hysteresis;
						objectOfComputedPerRow["caluculated"]['Row'+x]['combinedUncertainty'] = combinedUncertainty;
						objectOfComputedPerRow["caluculated"]['Row'+x]['DOF'] = DOF;
						objectOfComputedPerRow["caluculated"]['Row'+x]['k'] = k;
						objectOfComputedPerRow["caluculated"]['Row'+x]['expandedUncertainty'] = expandedUncertainty;
					}catch(e){
						console.log(e)
					}
				}
				arrayOfComputedPerTable[objectKey] = objectOfComputedPerRow;
			}
			console.log(arrayOfComputedPerTable);
			datas = arrayOfComputedPerTable;
			calculateCancelCalculate();

			let modatTableTbody = document.getElementById('uncertBudgetTBody');
			Object.keys(datas).forEach(keys=>{
				console.log(keys)
				Object.keys(datas[keys]['caluculated']).forEach(rows=>{
					let modalTestpoint = datas[keys]['inputs'][rows]['testPoint']
					let uncStandard = datas[keys]['inputs'][rows]['UncStandardPRT']
					let uncStdRepeatability = datas[keys]['inputs'][rows]['UncStandardRepeatability']
					let uncStdDrift = datas[keys]['inputs'][rows]['UncDrift']
					let uncStdResolution = datas[keys]['inputs'][rows]['UncSTDResolution']
					let uncUucResokution = datas[keys]['inputs'][rows]['UncUUCResolution']
					let uncUucRepeatability = datas[keys]['inputs'][rows]['UncUUCRepeatability']
					let hysterisis = datas[keys]['inputs'][rows]['hysteresis']
					let uncChamberInhomo = datas[keys]['inputs'][rows]['UncChamberUniformity']
					let uncChamberInstability = datas[keys]['inputs'][rows]['UncChamberInstability']
					let combinedUnc = datas[keys]['inputs'][rows]['combinedUncertainty']
					let coverageFactor = datas[keys]['inputs'][rows]['DOF']
					let ExpandedUnc = datas[keys]['inputs'][rows]['expandedUncertainty']
					let unit = datas[keys]['functionType']

					let tr = document.createElement('tr');
					let td1 = document.createElement('td');
					let td2 = document.createElement('td');
					let td3 = document.createElement('td');
					let td4 = document.createElement('td');
					let td5 = document.createElement('td');
					let td6 = document.createElement('td');
					let td7 = document.createElement('td');
					let td8 = document.createElement('td');
					let td9 = document.createElement('td');
					let td10 = document.createElement('td');
					let td11 = document.createElement('td');
					let td12 = document.createElement('td');
					let td13 = document.createElement('td');
					let td14 = document.createElement('td');
					td1.innerHTML = modalTestpoint;
					td2.innerHTML = uncStandard;
					td3.innerHTML = uncStdRepeatability;
					td4.innerHTML = uncStdDrift;
					td5.innerHTML = uncStdResolution;
					td6.innerHTML = uncUucResokution;
					td7.innerHTML = uncUucRepeatability;
					td8.innerHTML = hysterisis;
					td9.innerHTML = uncChamberInhomo;
					td10.innerHTML = uncChamberInstability;
					td11.innerHTML = combinedUnc;
					td12.innerHTML = coverageFactor;
					td13.innerHTML = ExpandedUnc;
					td14.innerHTML = unit;

					tr.append(td1)
					tr.append(td2)
					tr.append(td3)
					tr.append(td4)
					tr.append(td5)
					tr.append(td6)
					tr.append(td7)
					tr.append(td8)
					tr.append(td9)
					tr.append(td10)
					tr.append(td11)
					tr.append(td12)
					tr.append(td13)
					tr.append(td14)
					modatTableTbody.append(tr);
					
				})
				
			})
			



			document.getElementById('measurementDatas').value = JSON.stringify(arrayOfComputedPerTable);
			calculateCancelCalculate();
		}

		function interpolationCorr(midValue, standardUsed,resultID){
			var arrayofTemp = [];
			var sortedArrayofTemp = [];
			let testPointMax;
			let testPointMin;
			let corrMax;
			let corrMin;
			let midIndex;
			//let mid = document.getElementById(midValue).value; // mid needs to be a string
			let mid = midValue;
			let difTP;
			let difCorr;
			let ratio;

			var arrayOfSet = filterDataDynamic(standardUsed,'serialNumber',ArrayOfStandardOriginal[0])

			for(x=0;x<arrayOfSet.length;x++){
				if (arrayOfSet[x].unit == "Temperature") {
					arrayofTemp.push({
						TP:	arrayOfSet[x].testPoint,
						Corr : arrayOfSet[x].correction
					});
				}
			};

			arrayofTemp.push({TP:mid});
			sortedArrayofTemp = arrayofTemp.sort(function(a, b){return a.TP - b.TP});

			// Find 
			for(var i=0; i<sortedArrayofTemp.length; i++) {
				if(sortedArrayofTemp[i].TP == mid) {
					// midIndex is set to the index of the element
					midIndex = i;
					break;
				}
			}

			testPointMax = sortedArrayofTemp[midIndex+1].TP;
			testPointMin = sortedArrayofTemp[midIndex-1].TP;
			corrMax = sortedArrayofTemp[midIndex+1].Corr;
			corrMin = sortedArrayofTemp[midIndex-1].Corr;
			difTP = parseFloat(testPointMax) - parseFloat(testPointMin);
			difCorr = parseFloat(corrMax) - parseFloat(corrMin);
			ratio = difCorr/difTP;
			midCorr = parseFloat(corrMin)+((parseFloat(mid)-parseFloat(testPointMin))*ratio);
			
			//document.getElementById(resultID).innerHTML = midCorr;
			return midCorr;
		}
		function interpolationCorrRH(midValue,standardUsed, resultID){
			var arrayofTemp = [];
			var sortedArrayofTemp = [];
			let testPointMax;
			let testPointMin;
			let corrMax;
			let corrMin;
			let midIndex;
			//let mid = document.getElementById(midValue).value; // mid needs to be a string
			let mid = midValue;
			let difTP;
			let difCorr;
			let ratio;

			var arrayOfSet = filterDataDynamic(standardUsed,'serialNumber',ArrayOfStandardOriginal[0])
			
			for(x=0;x<arrayOfSet.length;x++){
				if (arrayOfSet[x].unit == "Relative Humidity") {
					arrayofTemp.push({
						TP:	arrayOfSet[x].testPoint,
						Corr : arrayOfSet[x].correction
					});
				}
			};

			arrayofTemp.push({TP:mid});
			sortedArrayofTemp = arrayofTemp.sort(function(a, b){return a.TP - b.TP});

			// Find 
			for(var i=0; i<sortedArrayofTemp.length; i++) {
				if(sortedArrayofTemp[i].TP == mid) {
					// midIndex is set to the index of the element
					midIndex = i;
					break;
				}
			}

			testPointMax = sortedArrayofTemp[midIndex+1].TP;
			testPointMin = sortedArrayofTemp[midIndex-1].TP;
			corrMax = sortedArrayofTemp[midIndex+1].Corr;
			corrMin = sortedArrayofTemp[midIndex-1].Corr;
			difTP = parseFloat(testPointMax) - parseFloat(testPointMin);
			difCorr = parseFloat(corrMax) - parseFloat(corrMin);
			ratio = difCorr/difTP;
			midCorr = parseFloat(corrMin)+((parseFloat(mid)-parseFloat(testPointMin))*ratio);
			
			//document.getElementById(resultID).innerHTML = midCorr;
			return midCorr;
		}

		function correctionFromCertDisplay(midValue,resultID,rowStandard,serialNum,cosiderCorrect,){	
			var arrayofTemp = [];
			var sortedArrayofTemp = [];
			//let mid = document.getElementById(midValue).value;
			let mid = parseFloat(document.getElementById(midValue).value);
			let midIndex;

			var arrayOfSet = filterDataDynamic(document.getElementById(serialNum).value,'serialNumber',ArrayOfStandardOriginal[0])

			for(x=0;x<arrayOfSet.length;x++){
				if (arrayOfSet[x].serialNumber == document.getElementById(serialNum).value) {
					if (arrayOfSet[x].unit == "Temperature") {
						arrayofTemp.push({
							TP:	arrayOfSet[x].testPoint,
							Corr : arrayOfSet[x].correction
						});
					}
				}
			};
			
			sortedArrayofTemp = arrayofTemp.sort(function(a, b){return a.TP - b.TP});
			for(var i=0; i<sortedArrayofTemp.length; i++) {
				if(sortedArrayofTemp[i].TP == mid) {
					// midIndex is set to the index of the element
					midIndex = i;
					break;
				}
			};

			// correctionFromCertDisplay('tableTempInUUCTestPointRow"+rowNum+"',
			// 'tableTempInCorrectedRow"+rowNum+"',
			// 'tableTempInStandardTrialAverageRow"+rowNum+"',
			// 'tableTempInStandardUse"+rowNum+"',
			// 'tableTempInConsideringCorrectedRow"+rowNum+"')
		
			//error Here 

				if(search(document.getElementById(midValue).value,sortedArrayofTemp)){
					var standardAve = parseFloat(document.getElementById(rowStandard).value);
					var correctionValue = parseFloat(sortedArrayofTemp[midIndex].Corr);
					console.log('standardAve', standardAve, ' correctionValue', correctionValue)
					document.getElementById(resultID).value = correctedValue({standardReadingAve:standardAve, correctionFromCertificate:correctionValue}) ;
					document.getElementById(cosiderCorrect).value = calculatedValueConsideringCorrection(mid, correctionValue);
					
				 }
				 else {
					var standardAve = parseFloat(document.getElementById(rowStandard).value);
					var correctionValue = interpolationCorr(document.getElementById(midValue).value,document.getElementById(serialNum).value);
					console.log('standardAve', standardAve, ' correctionValue', correctionValue)
					document.getElementById(resultID).value = correctedValue({standardReadingAve:standardAve, correctionFromCertificate:correctionValue}) ;
					document.getElementById(cosiderCorrect).value = calculatedValueConsideringCorrection(mid, correctionValue);				
				}


			
		}

		function correctionFromCert(midValue, serialNum, standardUsed){	
			var arrayofTemp = [];
			var sortedArrayofTemp = [];
			//let mid = document.getElementById(midValue).value;
			let mid = midValue;
			let midIndex;

			var arrayOfSet = filterDataDynamic(serialNum,'serialNumber',ArrayOfStandardOriginal[0])
			
			for(x=0;x<arrayOfSet.length;x++){
				if (arrayOfSet[x].serialNumber == serialNum) {
					if (arrayOfSet[x].unit == "Temperature") {
						arrayofTemp.push({
							TP:	arrayOfSet[x].testPoint,
							Corr : arrayOfSet[x].correction
						});
					}
				}
			};

			sortedArrayofTemp = arrayofTemp.sort(function(a, b){return a.TP - b.TP});
			for(var i=0; i<sortedArrayofTemp.length; i++) {
				if(sortedArrayofTemp[i].TP == mid) {
					// midIndex is set to the index of the element
					midIndex = i;
					break;
				}
			};
			if(midIndex == undefined){
				return interpolationCorr(midValue, serialNum);
			}else{
				return sortedArrayofTemp[midIndex].Corr;
			}
		}

		function correctionFromCertRHDisplay(midValue,resultID,rowStandard,serialNum,cosiderCorrect){	
			console.log('correctionFromCertRHDisplay');
			var arrayofTemp = [];
			var sortedArrayofTemp = [];
			//let mid = document.getElementById(midValue).value;
			let mid = parseFloat(document.getElementById(midValue).value);
			let midIndex;

			var arrayOfSet = filterDataDynamic(document.getElementById(serialNum).value,'serialNumber',ArrayOfStandardOriginal[0])

			for(x=0;x<arrayOfSet.length;x++){
				if (arrayOfSet[x].serialNumber == document.getElementById(serialNum).value) {
					if (arrayOfSet[x].unit == "Relative Humidity") {
						arrayofTemp.push({
							TP:	arrayOfSet[x].testPoint,
							Corr : arrayOfSet[x].correction
						});
					}
				}
			};
			sortedArrayofTemp = arrayofTemp.sort(function(a, b){return a.TP - b.TP});
			for(var i=0; i<sortedArrayofTemp.length; i++) {
				if(sortedArrayofTemp[i].TP == mid) {
					// midIndex is set to the index of the element
					midIndex = i;
					break;
				}
			};
			//console.log(sortedArrayofTemp);
			
		

			if(search(document.getElementById(midValue).value,sortedArrayofTemp)){
					var standardAve = parseFloat(document.getElementById(rowStandard).value);
					var correctionValue = parseFloat(sortedArrayofTemp[midIndex].Corr);
					console.log('standardAve', standardAve, ' correctionValue', correctionValue)
					document.getElementById(resultID).value = correctedValue({standardReadingAve:standardAve, correctionFromCertificate:correctionValue}) ;
					document.getElementById(cosiderCorrect).value = calculatedValueConsideringCorrection(mid, correctionValue);
					
				 }
				 else {
					var standardAve = parseFloat(document.getElementById(rowStandard).value);
					var correctionValue = interpolationCorrRH(document.getElementById(midValue).value,document.getElementById(serialNum).value);
					console.log('standardAve', standardAve, ' correctionValue', correctionValue)
					document.getElementById(resultID).value = correctedValue({standardReadingAve:standardAve, correctionFromCertificate:correctionValue}) ;
					document.getElementById(cosiderCorrect).value = calculatedValueConsideringCorrection(mid, correctionValue);				
				}

		}

		function correctionFromCertRH(midValue, serialNum, standardUsed){	
			var arrayofTemp = [];
			var sortedArrayofTemp = [];
			//let mid = document.getElementById(midValue).value;
			let mid = midValue;
			let midIndex;

			var arrayOfSet = filterDataDynamic(serialNum,'serialNumber',ArrayOfStandardOriginal[0])
			
			for(x=0;x<arrayOfSet.length;x++){
				if (arrayOfSet[x].serialNumber == serialNum) {
					if (arrayOfSet[x].unit == "Relative Humidity") {
						arrayofTemp.push({
							TP:	arrayOfSet[x].testPoint,
							Corr : arrayOfSet[x].correction
						});
					}
				}
			};
			sortedArrayofTemp = arrayofTemp.sort(function(a, b){return a.TP - b.TP});
			for(var i=0; i<sortedArrayofTemp.length; i++) {
				if(sortedArrayofTemp[i].TP == mid) {
					// midIndex is set to the index of the element
					midIndex = i;
					break;
				}
			};
			//console.log(sortedArrayofTemp);
			//document.getElementById(resultID).innerHTML = sortedArrayofTemp[midIndex].Corr;
			if(midIndex == undefined){
				return interpolationCorrRH(midValue, serialNum);
			}else{
				return sortedArrayofTemp[midIndex].Corr;
			}
		}

		function setResRead(serialNum, testPoint, unit, range, resInput,readInput){
			let filteredDATA = [ArrayOfStandardDetails[0].filter(function (e) {
					return e.serialNumber == serialNum;
			})];
			console.log(filteredDATA)

			if(unit == 'Temperature'){
				document.getElementById(resInput).value = filteredDATA[0][0].stdResolutionTemp;
				document.getElementById(range).value = 0;
			}else{
				document.getElementById(resInput).value = filteredDATA[0][0].stdResolutionRH;
				document.getElementById(range).value = 0;
			}
			
		
			// document.getElementById(readInput).value = filteredDATA[0][0].readability;
		}

		var loadFile = function(event) {
			var output = document.getElementById('output');
			output.src = URL.createObjectURL(event.target.files[0]);
			output.onload = function() {
			URL.revokeObjectURL(output.src) // free memory
			}
		};
		function filterOriginal(){
			var searchingFor = document.getElementById('searchStandard').value;
			var searchingForUnit = document.getElementById('searchStandardUnit').value;
			let filteredDATA = [ArrayOfStandardOriginal[0].filter(function (e) {
				
				if (searchingFor != null && searchingForUnit == "") {
					return e.testPoint == searchingFor;
				}
				else	if (searchingFor == "" && searchingForUnit != null) {
					return e.unit == searchingForUnit;
				}
				if(searchingFor != null && searchingForUnit != null){
					return e.testPoint == searchingFor && e.unit == searchingForUnit;
				}
			
			})];

			let head = "<table class='table' id='standardRows'><thead><tr><th >Test Point</th><th >RML</th><th>NML</th><th >Correction</th><th>Readout Standard Uncertainty From Certificate</th><th>Uncertainty</th></tr></thead><tbody>";
			let end = "</tbody></table>";
			var html;

			filteredDATA.forEach(element => {
				element.forEach(item =>{
					if(html == null){
					 html = "<tr><td>"+item["testPoint"]+" "+item["unit"]+"</td><td>"+item["RML"]+"</td><td>"+item["NML"]+"</td><td>"+item["correction"]+"</td><td>"+item["readoutStandardUncertaintyFromCertificate"]+"</td><td>"+item["uncertainty"]+"</td>";
					}else{
						html += "<tr><td>"+item["testPoint"]+" "+item["unit"]+"</td><td>"+item["RML"]+"</td><td>"+item["NML"]+"</td><td>"+item["correction"]+"</td><td>"+item["readoutStandardUncertaintyFromCertificate"]+"</td><td>"+item["uncertainty"]+"</td>";

					}


				})
			});{
				
			}
			document.getElementById('StandardRowsHere').innerHTML=head+html+end
		}
		function refreshToOriginal(){
			var searchingFor = document.getElementById('searchStandard').value;
			var searchingForUnit = document.getElementById('searchStandardUnit').value;
			let filteredDATA = [ArrayOfStandardOriginal[0]];


			let head = "<table class='table' id='standardRows'><thead><tr><th >Test Point</th><th >RML</th><th>NML</th><th >Correction</th><th>Readout Standard Uncertainty From Certificate</th><th>Uncertainty</th></tr></thead><tbody>";
			let end = "</tbody></table>";
			var html;

			filteredDATA.forEach(element => {
				element.forEach(item =>{
					if(html == null){
					 	html = "<tr><td>"+item["testPoint"]+" "+item["unit"]+"</td><td>"+item["RML"]+"</td><td>"+item["NML"]+"</td><td>"+item["correction"]+"</td><td>"+item["readoutStandardUncertaintyFromCertificate"]+"</td><td>"+item["uncertainty"]+"</td>";
					}else{
						html += "<tr><td>"+item["testPoint"]+" "+item["unit"]+"</td><td>"+item["RML"]+"</td><td>"+item["NML"]+"</td><td>"+item["correction"]+"</td><td>"+item["readoutStandardUncertaintyFromCertificate"]+"</td><td>"+item["uncertainty"]+"</td>";

					}


				})
			});{
				
			}
			document.getElementById('StandardRowsHere').innerHTML=head+html+end
		}

		function getCustomerDetails(){
			var customerDetails = document.getElementById('CustomerDetails');
			var customer = document.getElementById('customer');
			var address = document.getElementById('address');
			var idOfCustomer = document.getElementById('idOfCustomer');
			
			const detailsSplit = customer.value.split(' @ ');
			if(detailsSplit.length > 1){
				customer.value = detailsSplit[0];
				address.value = detailsSplit[1];
			}else{
				address.value = ''
			}
		}
		
		function toStringWithSignificantDigits( x, len ){
			if(x==0) return x.toFixed(len-1);
			var numDigits = Math.ceil(Math.log10(Math.abs(x)));
			var rounded = Math.round(x*Math.pow(10,len-numDigits))*Math.pow(10,numDigits-len); 
			return rounded.toFixed(Math.max(len-numDigits,0));  
		}
		
		function getWeight(){
			var markedCheckbox = document.getElementsByName('weightCheckbox');  
			var PlaceholderWeight;
			for (var checkbox of markedCheckbox) {  
				if (checkbox.checked){
					if(PlaceholderWeight == null){
						PlaceholderWeight = checkbox.value ;  
					}else {
						if(!PlaceholderWeight.includes(checkbox.value)){
							PlaceholderWeight += '(SPLIT)'+checkbox.value;}
					}
				}  
			}  
			weight = PlaceholderWeight;
			weightSplitted = weight.split(",");
			document.getElementById('standardAndAccessories').value = weight;
		}
		// getWeight()

		function logValue(){
			var idName = document.getElementById("logInput").value;
			console.log("ID is: "+idName+" value is: "+document.getElementById(idName).value);
		}

		function SetuucReading({rowNumber,value}){
			document.getElementById("uucReadingSecondRow"+rowNumber).value=value;
			document.getElementById("uucReadingThirdRow"+rowNumber).value=value;
		}

		function deleteRow(tableID, row) {
			try {
			var table = document.getElementById(tableID);
			var rowCount = table.rows.length;			
				if(rowCount==row){
					alert('No more row to delete')
				}else{
					table.deleteRow(rowCount-1);
					console.log("table.rows.length "+table.rows.length);
					rowOfTable = table.rows.length;
				}
			}catch(e) {
				alert(e);
			}
		}

		function search(nameKey, myArray){
			for (var i=0; i < myArray.length; i++) {
				if (myArray[i].TP === nameKey) {
					return true;
				}
			}
		}

		function cancelDisabledButton(idOfText,idOfButton){
			document.getElementById(idOfButton).disabled = false;
			document.getElementById(idOfText).innerHTML = " ";

		}
		
		function setDate() {
			let d = new Date(document.getElementById("sDate").value)
			let mon = +document.getElementById("mon").value;
			d.setMonth(d.getMonth()+mon)
			document.getElementById("eDate").valueAsDate = d;
		}

		document.getElementById("sDate").addEventListener("change",setDate)
		document.getElementById("mon").addEventListener("change",setDate)

		function logoutConfirmation(url){
			// windows.confirm("are u sure?");
			href="" 
			var txt;
			if (confirm("Do you want to logout <?= session('name')?>?")) {
				location.href = url;
			}
		}

		const checkIfPRT = (serialNumber) => {
			var PRT = false;
			for(var i = 0; i < driftArrayPRT[0].length; i++){
				if(serialNumber == driftArrayPRT[0][i].serialNumber){
					PRT = true
				}
				if(PRT == true){
					return PRT
				}
			}
			return PRT
		}

		function automaticAddToObject(){
			var inputtedData = {};
			var inputtedDataTempIn = {};
			var inputtedDataTempOut = {};
			var inputtedDataRHIn = {};
			var inputtedDataRHOut = {};
			var tableTempIn = document.getElementById('temperatureTable');
			var tableTempOut = document.getElementById('temperatureTableOut');
			var tableRH = document.getElementById('temperatureTableRH');
			var tableRNOut = document.getElementById('temperatureTableRNOut');
			var tempInlength = tableTempIn.rows.length - 3;
			var tempOutlength = tableTempOut.rows.length - 3;
			var rhInlength = tableRH.rows.length - 3;
			var rhOutlength = tableRNOut.rows.length - 3;
			
			for (let index = 1; index <= tempInlength; index++) {
				inputtedDataTempIn['row'+index] = {
					['tableTempInUUCTestPointRow'+index] : document.getElementById('tableTempInUUCTestPointRow'+index).value,
					['tableTempInStandardUse'+index] : document.getElementById('tableTempInStandardUse'+index).value,
					['tableTempInUUCTrial1Row'+index] : document.getElementById('tableTempInUUCTrial1Row'+index).value,
					['tableTempInUUCTrial2Row'+index] : document.getElementById('tableTempInUUCTrial2Row'+index).value,
					['tableTempInUUCTrial3Row'+index] : document.getElementById('tableTempInUUCTrial3Row'+index).value,
					['tableTempInUUCTrialAverageRow'+index] : document.getElementById('tableTempInUUCTrialAverageRow'+index).value,
					['tableTempInStandardTrial1Row'+index] : document.getElementById('tableTempInStandardTrial1Row'+index).value,
					['tableTempInStandardTrial2Row'+index] : document.getElementById('tableTempInStandardTrial2Row'+index).value,
					['tableTempInStandardTrial3Row'+index] : document.getElementById('tableTempInStandardTrial3Row'+index).value,
					['tableTempInStandardTrialAverageRow'+index] : document.getElementById('tableTempInStandardTrialAverageRow'+index).value,
					['tableTempInSTDResRow'+index] : document.getElementById('tableTempInSTDResRow'+index).value,
					['tableTempInChamberUniformityRow'+index] : document.getElementById('tableTempInChamberUniformityRow'+index).value,
					['tableTempInChamberInstabilityRow'+index] : document.getElementById('tableTempInChamberInstabilityRow'+index).value,
					['tableTempInRangeRow'+index] : document.getElementById('tableTempInRangeRow'+index).value,
					['tableTempInResGradRow'+index] : document.getElementById('tableTempInResGradRow'+index).value,
					['tableTempInReadabilityRow'+index] : document.getElementById('tableTempInReadabilityRow'+index).value,
					['tableTempInCorrectedRow'+index] : document.getElementById('tableTempInCorrectedRow'+index).value,
				}
			}
			for (let index = 1; index <= tempOutlength; index++) {
				inputtedDataTempOut['row'+index] = {
					['tableTempOutUUCTestPointRow'+index] : document.getElementById('tableTempOutUUCTestPointRow'+index).value,
					['tableTempOutStandardUse'+index] : document.getElementById('tableTempOutStandardUse'+index).value,
					['tableTempOutUUCTrial1Row'+index] : document.getElementById('tableTempOutUUCTrial1Row'+index).value,
					['tableTempOutUUCTrial2Row'+index] : document.getElementById('tableTempOutUUCTrial2Row'+index).value,
					['tableTempOutUUCTrial3Row'+index] : document.getElementById('tableTempOutUUCTrial3Row'+index).value,
					['tableTempOutUUCTrialAverageRow'+index] : document.getElementById('tableTempOutUUCTrialAverageRow'+index).value,
					['tableTempOutStandardTrial1Row'+index] : document.getElementById('tableTempOutStandardTrial1Row'+index).value,
					['tableTempOutStandardTrial2Row'+index] : document.getElementById('tableTempOutStandardTrial2Row'+index).value,
					['tableTempOutStandardTrial3Row'+index] : document.getElementById('tableTempOutStandardTrial3Row'+index).value,
					['tableTempOutStandardTrialAverageRow'+index] : document.getElementById('tableTempOutStandardTrialAverageRow'+index).value,
					['tableTempOutSTDResRow'+index] : document.getElementById('tableTempOutSTDResRow'+index).value,
					['tableTempOutChamberUniformityRow'+index] : document.getElementById('tableTempOutChamberUniformityRow'+index).value,
					['tableTempOutChamberInstabilityRow'+index] : document.getElementById('tableTempOutChamberInstabilityRow'+index).value,
					['tableTempOutRangeRow'+index] : document.getElementById('tableTempOutRangeRow'+index).value,
					['tableTempOutResGradRow'+index] : document.getElementById('tableTempOutResGradRow'+index).value,
					['tableTempOutReadabilityRow'+index] : document.getElementById('tableTempOutReadabilityRow'+index).value,
				}
			}
			for (let index = 1; index <= rhInlength; index++) {
				inputtedDataRHIn['row'+index] = {
					['tableRHUUCTestPointRow'+index] : document.getElementById('tableRHUUCTestPointRow'+index).value,
					['tableRHStandardUse'+index] : document.getElementById('tableRHStandardUse'+index).value,
					['tableRHUUCTrial1Row'+index] : document.getElementById('tableRHUUCTrial1Row'+index).value,
					['tableRHUUCTrial2Row'+index] : document.getElementById('tableRHUUCTrial2Row'+index).value,
					['tableRHUUCTrial3Row'+index] : document.getElementById('tableRHUUCTrial3Row'+index).value,
					['tableRHUUCTrialAverageRow'+index] : document.getElementById('tableRHUUCTrialAverageRow'+index).value,
					['tableRHStandardTrial1Row'+index] : document.getElementById('tableRHStandardTrial1Row'+index).value,
					['tableRHStandardTrial2Row'+index] : document.getElementById('tableRHStandardTrial2Row'+index).value,
					['tableRHStandardTrial3Row'+index] : document.getElementById('tableRHStandardTrial3Row'+index).value,
					['tableRHStandardTrialAverageRow'+index] : document.getElementById('tableRHStandardTrialAverageRow'+index).value,
					['tableRHSTDResRow'+index] : document.getElementById('tableRHSTDResRow'+index).value,
					['tableRHChamberUniformityRow'+index] : document.getElementById('tableRHChamberUniformityRow'+index).value,
					['tableRHChamberInstabilityRow'+index] : document.getElementById('tableRHChamberInstabilityRow'+index).value,
					['tableRHRangeRow'+index] : document.getElementById('tableRHRangeRow'+index).value,
					['tableRHResGradRow'+index] : document.getElementById('tableRHResGradRow'+index).value,
					['tableRHReadabilityRow'+index] : document.getElementById('tableRHReadabilityRow'+index).value,
				}
			}
			for (let index = 1; index <= rhOutlength; index++) {
				inputtedDataRHOut['row'+index] = {
					['tableRNOutUUCTestPointRow'+index] : document.getElementById('tableRNOutUUCTestPointRow'+index).value,
					['tableRNOutStandardUse'+index] : document.getElementById('tableRNOutStandardUse'+index).value,
					['tableRNOutUUCTrial1Row'+index] : document.getElementById('tableRNOutUUCTrial1Row'+index).value,
					['tableRNOutUUCTrial2Row'+index] : document.getElementById('tableRNOutUUCTrial2Row'+index).value,
					['tableRNOutUUCTrial3Row'+index] : document.getElementById('tableRNOutUUCTrial3Row'+index).value,
					['tableRNOutUUCTrialAverageRow'+index] : document.getElementById('tableRNOutUUCTrialAverageRow'+index).value,
					['tableRNOutStandardTrial1Row'+index] : document.getElementById('tableRNOutStandardTrial1Row'+index).value,
					['tableRNOutStandardTrial2Row'+index] : document.getElementById('tableRNOutStandardTrial2Row'+index).value,
					['tableRNOutStandardTrial3Row'+index] : document.getElementById('tableRNOutStandardTrial3Row'+index).value,
					['tableRNOutStandardTrialAverageRow'+index] : document.getElementById('tableRNOutStandardTrialAverageRow'+index).value,
					['tableRNOutSTDResRow'+index] : document.getElementById('tableRNOutSTDResRow'+index).value,
					['tableRNOutChamberUniformityRow'+index] : document.getElementById('tableRNOutChamberUniformityRow'+index).value,
					['tableRNOutChamberInstabilityRow'+index] : document.getElementById('tableRNOutChamberInstabilityRow'+index).value,
					['tableRNOutRangeRow'+index] : document.getElementById('tableRNOutRangeRow'+index).value,
					['tableRNOutResGradRow'+index] : document.getElementById('tableRNOutResGradRow'+index).value,
					['tableRNOutReadabilityRow'+index] : document.getElementById('tableRNOutReadabilityRow'+index).value,
				}
			}

			// document.getElementById('inputtedArrayTempIn').value = JSON.stringify(inputtedDataTempIn);
			// document.getElementById('inputtedArrayTempOut').value = JSON.stringify(inputtedDataTempOut);
			// document.getElementById('inputtedArrayRHIn').value = JSON.stringify(inputtedDataRHIn);
			// document.getElementById('inputtedArrayRHOunt').value = JSON.stringify(inputtedDataRHOut);
			document.getElementById('inputtedArrayTempIn').value = {};
			document.getElementById('inputtedArrayTempOut').value = {};
			document.getElementById('inputtedArrayRHIn').value = {};
			document.getElementById('inputtedArrayRHOunt').value = {};

			window.setTimeout(automaticAddToObject, 10000);
		}
		//window.setTimeout(automaticAddToObject, 5000);

	</script>

<script>
	var selectedCertData;

	$( window ).on( "load", function() {
        getData(<?= $thermoData['id'];?>);
		transferDataToInputs();
		roleFunction();
		calculateAll();
    });


	function getData(id){
		$.ajax({
			cache: false,
			async: false,
			type: "post",
			dataType:'json',
			url: "<?= base_url('ThermoController/sendSelectedData')?>",
			data: {'q': id},
			success:function(data){
			selectedCertData = data;
			}  
		})
	}
	
	function transferDataToInputs(){
		var datas = JSON.parse(selectedCertData.datas);

		var count = Object.keys(datas).length;

		setStandardAccesso(selectedCertData.standardAndAccessories);
		setSelectedChamber(selectedCertData.selectedChamber);
		// setPrelim();
		getWeight();

		for (var key in datas) {
			var obj = datas[key];
			var tableName = addTablesToDiv("measurementDataTables");
			for (var dataFromInputs in obj['inputs']) {
				addRowToTableWithData(
					tableName,
					obj['inputs'][dataFromInputs].testPoint,
					obj['inputs'][dataFromInputs].consideringCorrection,
					obj['inputs'][dataFromInputs].standardUsed,
					obj['inputs'][dataFromInputs].uucTrial1,
					obj['inputs'][dataFromInputs].uucTrial2,
					obj['inputs'][dataFromInputs].uucTrial3,
					obj['inputs'][dataFromInputs].uucAverage,
					obj['inputs'][dataFromInputs].standardTrial1,
					obj['inputs'][dataFromInputs].standardTrial2,
					obj['inputs'][dataFromInputs].standardTrial3,
					obj['inputs'][dataFromInputs].standardAverage,
					obj['inputs'][dataFromInputs].standardResolution,
					obj['inputs'][dataFromInputs].chamberInhomogeneity,
					obj['inputs'][dataFromInputs].chamberInstability,
					obj['inputs'][dataFromInputs].range,
					obj['inputs'][dataFromInputs].resolution,
					obj['inputs'][dataFromInputs].readablitiy,
					obj['inputs'][dataFromInputs].correctedValue,
					obj['functionType'],
					obj['channelName'],
					obj['brand'],
					obj['serialNumber'],
					obj['modelName'],
				)
			}
		}

		function setStandardAccesso(standardAndAccess){
			var arrayStandardAndAccessories = standardAndAccess.split('(SPLIT)');
			for (let i = 0; i < arrayStandardAndAccessories.length; i++) {
				const element = arrayStandardAndAccessories[i];
				$("input[name='weightCheckbox']").each( function (e){
					if($(this).val() == element){
						$(this).prop('checked', true);
					}
            });
				
				
				
				
			}
		}

		function setSelectedChamber(chamber){
			$("[name='chamberSelection']").each( function (e){
				if($(this).val() == chamber){
					$(this).prop('checked', true);
				}
            });
			document.getElementById('selectedChamber').value = chamber;
			getChamberValue();
		}

		function setPrelim(){
			function checkPrelim(prelimLetter){
				if(selectedCertData[prelimLetter] != null){
					document.getElementById(prelimLetter).checked = true
				}
			}
			checkPrelim('premA');
			checkPrelim('premB');
			checkPrelim('premC');
			checkPrelim('premD');

		}
		
	}
	

</script>
<script>
		function addTablesToDiv(divId){
			var div = document.getElementById(divId);
			var divTable = document.createElement('div');
			divTable.setAttribute('class', 'row');
			var tableCount = (div.childElementCount + 1);
			var table = document.createElement('table');
			var tbody = document.createElement('tbody');
			table.setAttribute('class', 'table table-bordered align-middle');
			table.setAttribute('id', 'table'+tableCount);
			tbody.setAttribute('id', 'TbodyTable'+tableCount);
			
			const thead = function(tableNumber){
				var head = document.createElement('thead');
				var tr1 = document.createElement('tr');
				var tr2 = document.createElement('tr');
				var trButton = document.createElement('tr');
				var trSpace = document.createElement('tr');
				var buttonsDiv = document.createElement('div');
				var h3 = document.createElement('h3');

				var div = document.createElement('div');
				var select = document.createElement('select');
				var option = document.createElement('option');
				var option1 = document.createElement('option');
				var option2 = document.createElement('option');
				var input1 = document.createElement('input');
				var input2 = document.createElement('input');
				var input3 = document.createElement('input');
				var input4 = document.createElement('input');

				div.setAttribute('class', 'input-group');
				select.setAttribute('class', 'form-select')
				select.setAttribute('name', 'functionTable'+tableNumber)
				select.setAttribute('id', 'functionTable'+tableNumber)
				option.setAttribute('selected'," ");
				option.setAttribute('value'," ");
				option1.setAttribute('value',"Temp");
				option2.setAttribute('value',"Rh");
				option.innerHTML = "Choose function";
				option1.innerHTML = "Temperature";
				option2.innerHTML = "Relative Humidity";
				input1.setAttribute('class',"form-control");
				input2.setAttribute('class',"form-control");
				input3.setAttribute('class',"form-control");
				input4.setAttribute('class',"form-control");
				input1.setAttribute('type',"text");
				input2.setAttribute('type',"text");
				input3.setAttribute('type',"text");
				input4.setAttribute('type',"text");
				input1.setAttribute('name', 'channelNameTable'+tableNumber);
				input1.setAttribute('id', 'channelNameTable'+tableNumber);
				input2.setAttribute('name', 'brandTable'+tableNumber);
				input2.setAttribute('id', 'brandTable'+tableNumber);
				input3.setAttribute('name', 'serialNumberTable'+tableNumber);
				input3.setAttribute('id', 'serialNumberTable'+tableNumber);
				input4.setAttribute('name', 'modelTable'+tableNumber);
				input4.setAttribute('id', 'modelTable'+tableNumber);
				input1.setAttribute('placeholder',"Channel Name");
				input2.setAttribute('placeholder',"Brand");
				input3.setAttribute('placeholder',"Serial Number");
				input4.setAttribute('placeholder',"Model");

				select.appendChild(option);
				select.appendChild(option1);
				select.appendChild(option2);

				buttonsDiv.setAttribute('class', 'btn-group float-end');
				buttonsDiv.setAttribute('role', 'group');
				var button = document.createElement('button');
				button.setAttribute('type', 'button');	
				button.setAttribute('class', 'btn btn-success');
				button.innerHTML = 'Add';
				//button.setAttribute('onclick', 'addRowToTable("TbodyTable'+tableNumber+'")');
				button.setAttribute('onclick', 'checkIfHaveFuntiontype(this,"'+tableNumber+'")');
				div.appendChild(button);
				var button = document.createElement('button');
				button.setAttribute('type', 'button');
				button.setAttribute('class', 'btn btn-danger');
				button.innerHTML = 'Remove';
				button.setAttribute('onclick', 'deleteRow("TbodyTable'+tableNumber+'")');
				div.appendChild(button);
				
				div.appendChild(select);
				div.appendChild(input1);
				div.appendChild(input2);
				div.appendChild(input3);
				div.appendChild(input4);

				h3.setAttribute('class', 'align-bottom input-group display-6 m-0');
				h3.appendChild(div);

				var th = document.createElement('th');
				th.setAttribute('colspan', '18');
				th.appendChild(h3);
				trButton.appendChild(th);

				var th = document.createElement('th');
				th.setAttribute('colspan', '7');
				trButton.appendChild(th);


				var th = document.createElement('th');
				th.innerHTML = 'Test Points, °C';
				th.setAttribute('rowspan', '2');
				tr1.appendChild(th);

				var th = document.createElement('th');
				th.innerHTML = 'Considering Correction';
				th.setAttribute('rowspan', '2');
				tr1.appendChild(th);

				var th = document.createElement('th');
				th.innerHTML = 'Standard Used';
				th.setAttribute('rowspan', '2');
				tr1.appendChild(th);

				var th = document.createElement('th');
				th.innerHTML = 'UUC reading, °C';
				th.setAttribute('colspan', '4');
				tr1.appendChild(th);

				var th = document.createElement('th');
				th.innerHTML = 'Standard reading, °C';
				th.setAttribute('colspan', '4');
				tr1.appendChild(th);


				var th = document.createElement('th');
				th.innerHTML = 'Trial 1';
				tr2.appendChild(th);

				var th = document.createElement('th');
				th.innerHTML = 'Trial 2';
				tr2.appendChild(th);

				var th = document.createElement('th');
				th.innerHTML = 'Trial 3';
				tr2.appendChild(th);

				var th = document.createElement('th');
				th.innerHTML = 'Average';
				tr2.appendChild(th);

				var th = document.createElement('th');
				th.innerHTML = 'Trial 1';
				tr2.appendChild(th);

				var th = document.createElement('th');
				th.innerHTML = 'Trial 2';
				tr2.appendChild(th);

				var th = document.createElement('th');
				th.innerHTML = 'Trial 3';
				tr2.appendChild(th);

				var th = document.createElement('th');
				th.innerHTML = 'Average';
				tr2.appendChild(th);

				var th = document.createElement('th');
				th.innerHTML = 'STD Resolution';
				th.setAttribute('rowspan', '2');
				tr1.appendChild(th);
				var th = document.createElement('th');
				th.innerHTML = 'Chamber Inhomogeneity';
				th.setAttribute('rowspan', '2');
				tr1.appendChild(th);
				var th = document.createElement('th');
				th.innerHTML = 'Chamber Instability';
				th.setAttribute('rowspan', '2');
				tr1.appendChild(th);
				var th = document.createElement('th');
				th.innerHTML = 'Range';
				th.setAttribute('rowspan', '2');
				tr1.appendChild(th);
				var th = document.createElement('th');
				th.innerHTML = "Res/Grad'n";
				th.setAttribute('rowspan', '2');
				tr1.appendChild(th);
				var th = document.createElement('th');
				th.innerHTML = 'Readability';
				th.setAttribute('rowspan', '2');
				tr1.appendChild(th);
				var th = document.createElement('th');
				th.innerHTML = 'Corrected Value';
				th.setAttribute('rowspan', '2');
				tr1.appendChild(th);

				
				head.appendChild(trButton);
				head.appendChild(tr1);
				head.appendChild(tr2);

				return head;
			}

			table.appendChild(thead(tableCount));
			table.appendChild(tbody);
			divTable.appendChild(table);
			div.appendChild(divTable);

			return 'TbodyTable'+tableCount;
		}

		function addRowToTable(id){    
			var tbody = document.getElementById(id);
			var tableName = tbody.parentElement.id;
			var table = document.getElementById(tableName);
			var TableNameCapitalFirst = tableName.charAt(0).toUpperCase() + tableName.slice(1);
			var functionName = table.getElementsByTagName('select')['function'+TableNameCapitalFirst].value;


			function addNewTD(rowNumber, nameID){
				var automaticArray = [
					'consideringCorrection',
					'UUCAverage',
					'standardAverage',
					'standardResolution',
					'chamberInhomogeneity',
					'chamberInstability',
					'correctedValue',
				]
				try {
					var td = document.createElement("td");
					var div = document.createElement("div");
					var input = document.createElement("input");
					div.setAttribute('class', 'input-group');
					div.setAttribute('style', 'width:5em');
					input.setAttribute('class', 'form-control');
					input.setAttribute('type', 'text');
					input.setAttribute('data-rowNumber', rowNumber);
					input.setAttribute('name', nameID+id+"Row"+rowNumber);
					input.setAttribute('id', nameID+id+"Row"+rowNumber);
					if(automaticArray.includes(nameID)){
						input.setAttribute('style', 'background-color:yellow');
					}
					if(nameID == "chamberInhomogeneity"){
						if (functionName == 'Temp') {
							input.setAttribute('value', inhomoTemp);
						}
						if (functionName == 'Rh') {
							input.setAttribute('value', inhomoRH);
						}
					}
					if(nameID == "chamberInstability"){
						if (functionName == 'Temp') {
							input.setAttribute('value', instaTemp);
						}
						if (functionName == 'Rh') {
							input.setAttribute('value', instaRH);
						}
					}
					if(nameID == 'readability'){
						if(document.getElementById('typeOfEquipment').value.includes("digital")){
							input.setAttribute('value','0.5');
						}else if(document.getElementById('typeOfEquipment').value.includes("analog")){
							input.setAttribute('list','graduationList');
						}
					}
					div.appendChild(input);
					td.appendChild(div);
					return td
				} catch (error) {
					var td = document.createElement("td");
					var div = document.createElement("div");
					var input = document.createElement("input");
					var p = document.createElement("p");
					div.setAttribute('class', 'input-group');
					p.innerHTML = error;
					div.appendChild(p);
					td.appendChild(div);
					return td 
				}
			}
			function addNewSTDUsed(rowNumber, nameID){
				var selected = document.getElementById('standardAndAccessories').value;
				var selectedSplit = selected.split('(SPLIT)');
				try {
					var td = document.createElement("td");
					var div = document.createElement("div");
					var input = document.createElement("select");
					div.setAttribute('class', 'input-group');
					div.setAttribute('style', 'width:5em');
					input.setAttribute('class', 'form-control');
					input.setAttribute('type', 'text');
					input.setAttribute('data-rowNumber', rowNumber);
					//Edit after adding db
					input.setAttribute('name', nameID+id+"Row"+rowNumber);
					input.setAttribute('id', nameID+id+"Row"+rowNumber);
					var option = document.createElement("option");
					option.innerHTML = 'Choose';
					option.setAttribute('value',' ');
					input.appendChild(option)
					for (let i = 0; i < selectedSplit.length; i++) {
						var option = document.createElement("option");
						option.innerHTML = selectedSplit[i];
						input.appendChild(option)
					}

					div.appendChild(input);
					td.appendChild(div);
					return td
				} catch (error) {
					var td = document.createElement("td");
					var div = document.createElement("div");
					var input = document.createElement("input");
					div.setAttribute('class', 'input-group');
					p.innerHTML = error;
					div.appendChild(p);
					td.appendChild(div);
					return td 
				}
			}
			function addNewTempSource(rowNumber, nameID){
				try {
					var td = document.createElement("td");
					var div = document.createElement("div");
					var input = document.createElement("select");
					div.setAttribute('class', 'input-group');
					div.setAttribute('style', 'width:5em');
					input.setAttribute('class', 'form-control');
					input.setAttribute('type', 'text');
					input.setAttribute('data-rowNumber', rowNumber);
					//Edit after adding db
					input.setAttribute('name', nameID+id+"Row"+rowNumber);
					input.setAttribute('id', nameID+id+"Row"+rowNumber);

					for (let i = 0; i < tempSource.length; i++) {
						var option = document.createElement("option");
						option.innerHTML = tempSource[i].code + " " + tempSource[i].description;
						option.setAttribute('value', tempSource[i].id);
						input.appendChild(option)
					}

					div.appendChild(input);
					td.appendChild(div);
					return td
				} catch (error) {
					var td = document.createElement("td");
					var div = document.createElement("div");
					var input = document.createElement("input");
					div.setAttribute('class', 'input-group');
					p.innerHTML = error;
					div.appendChild(p);
					td.appendChild(div);
					return td 
				}
			}

				var tbody = document.getElementById(id);
				var tr = document.createElement("tr");
				var numberOfRow = (tbody.childElementCount+1);
				var rowNumber = numberOfRow;
				tr.appendChild(addNewTD(rowNumber,'testPoint'));
				tr.appendChild(addNewTD(rowNumber,'consideringCorrection'));
				tr.appendChild(addNewSTDUsed(rowNumber,'standardUsed'));
				tr.appendChild(addNewTD(rowNumber,'UUCtrial1'));
				tr.appendChild(addNewTD(rowNumber,'UUCtrial2'));
				tr.appendChild(addNewTD(rowNumber,'UUCtrial3'));
				tr.appendChild(addNewTD(rowNumber,'UUCAverage'));
				tr.appendChild(addNewTD(rowNumber,'standardTrial1'));
				tr.appendChild(addNewTD(rowNumber,'standardTrial2'));
				tr.appendChild(addNewTD(rowNumber,'standardTrial3'));
				tr.appendChild(addNewTD(rowNumber,'standardAverage'));
				tr.appendChild(addNewTD(rowNumber,'standardResolution'));
				tr.appendChild(addNewTD(rowNumber,'chamberInhomogeneity'));
				tr.appendChild(addNewTD(rowNumber,'chamberInstability'));
				tr.appendChild(addNewTD(rowNumber,'range'));
				tr.appendChild(addNewTD(rowNumber,'resolution'));
				tr.appendChild(addNewTD(rowNumber,'readability'));
				tr.appendChild(addNewTD(rowNumber,'correctedValue'));
				tbody.appendChild(tr);
				


				if(functionName=="Temp"){
					bind('testPoint'+id+"Row"+rowNumber,'keyup',function(){
						setResRead(document.getElementById('standardUsed'+id+"Row"+rowNumber,).value,'testPoint'+id+"Row"+rowNumber,'Temperature','range'+id+"Row"+rowNumber,'standardResolution'+id+"Row"+rowNumber,'readability'+id+"Row"+rowNumber);
						correctionFromCertDisplay('testPoint'+id+"Row"+rowNumber,'correctedValue'+id+"Row"+rowNumber,'standardAverage'+id+"Row"+rowNumber,'standardUsed'+id+"Row"+rowNumber,'consideringCorrection'+id+"Row"+rowNumber);
					});

					bind('standardUsed'+id+"Row"+rowNumber,'change',function(){
						setResRead(this.value,'testPoint'+id+"Row"+rowNumber,'Temperature','range'+id+"Row"+rowNumber,'standardResolution'+id+"Row"+rowNumber,'readability'+id+"Row"+rowNumber);
						correctionFromCertDisplay('testPoint'+id+"Row"+rowNumber,'correctedValue'+id+"Row"+rowNumber,'standardAverage'+id+"Row"+rowNumber,'standardUsed'+id+"Row"+rowNumber,'consideringCorrection'+id+"Row"+rowNumber);
					});
				}
				if(functionName=="Rh"){
					bind('testPoint'+id+"Row"+rowNumber,'keyup',function(){
						setResRead(document.getElementById('standardUsed'+id+"Row"+rowNumber,).value,'testPoint'+id+"Row"+rowNumber,'Relative Humidity','range'+id+"Row"+rowNumber,'standardResolution'+id+"Row"+rowNumber,'readability'+id+"Row"+rowNumber);
						correctionFromCertDisplay('testPoint'+id+"Row"+rowNumber,'correctedValue'+id+"Row"+rowNumber,'standardAverage'+id+"Row"+rowNumber,'standardUsed'+id+"Row"+rowNumber,'consideringCorrection'+id+"Row"+rowNumber);
					});
					bind('standardUsed'+id+"Row"+rowNumber,'change',function(){
						setResRead(this.value,'testPoint'+id+"Row"+rowNumber,'Relative Humidity','range'+id+"Row"+rowNumber,'standardResolution'+id+"Row"+rowNumber,'readability'+id+"Row"+rowNumber);
						correctionFromCertRHDisplay('testPoint'+id+"Row"+rowNumber,'correctedValue'+id+"Row"+rowNumber,'standardAverage'+id+"Row"+rowNumber,'standardUsed'+id+"Row"+rowNumber,'consideringCorrection'+id+"Row"+rowNumber);
					});
				}
				
				bind('UUCtrial1'+id+"Row"+rowNumber,'keyup',function(){
					average({trial1:'UUCtrial1'+id+"Row"+rowNumber,trial2:'UUCtrial2'+id+"Row"+rowNumber,trial3:'UUCtrial3'+id+"Row"+rowNumber,aver:'UUCAverage'+id+"Row"+rowNumber});
				});
				bind('UUCtrial2'+id+"Row"+rowNumber,'keyup',function(){
					average({trial1:'UUCtrial1'+id+"Row"+rowNumber,trial2:'UUCtrial2'+id+"Row"+rowNumber,trial3:'UUCtrial3'+id+"Row"+rowNumber,aver:'UUCAverage'+id+"Row"+rowNumber});
				});
				bind('UUCtrial3'+id+"Row"+rowNumber,'keyup',function(){
					average({trial1:'UUCtrial1'+id+"Row"+rowNumber,trial2:'UUCtrial2'+id+"Row"+rowNumber,trial3:'UUCtrial3'+id+"Row"+rowNumber,aver:'UUCAverage'+id+"Row"+rowNumber});
				});
				bind('standardTrial1'+id+"Row"+rowNumber,'keyup',function(){
					average({trial1:'standardTrial1'+id+"Row"+rowNumber,trial2:'standardTrial2'+id+"Row"+rowNumber,trial3:'standardTrial3'+id+"Row"+rowNumber,aver:'standardAverage'+id+"Row"+rowNumber});
					correctionFromCertDisplay('testPoint'+id+"Row"+rowNumber,'correctedValue'+id+"Row"+rowNumber,'standardAverage'+id+"Row"+rowNumber,'standardUsed'+id+"Row"+rowNumber,'consideringCorrection'+id+"Row"+rowNumber);
				});
				bind('standardTrial2'+id+"Row"+rowNumber,'keyup',function(){
					average({trial1:'standardTrial1'+id+"Row"+rowNumber,trial2:'standardTrial2'+id+"Row"+rowNumber,trial3:'standardTrial3'+id+"Row"+rowNumber,aver:'standardAverage'+id+"Row"+rowNumber});
					correctionFromCertDisplay('testPoint'+id+"Row"+rowNumber,'correctedValue'+id+"Row"+rowNumber,'standardAverage'+id+"Row"+rowNumber,'standardUsed'+id+"Row"+rowNumber,'consideringCorrection'+id+"Row"+rowNumber);
				});
				bind('standardTrial3'+id+"Row"+rowNumber,'keyup',function(){
					average({trial1:'standardTrial1'+id+"Row"+rowNumber,trial2:'standardTrial2'+id+"Row"+rowNumber,trial3:'standardTrial3'+id+"Row"+rowNumber,aver:'standardAverage'+id+"Row"+rowNumber});
					correctionFromCertDisplay('testPoint'+id+"Row"+rowNumber,'correctedValue'+id+"Row"+rowNumber,'standardAverage'+id+"Row"+rowNumber,'standardUsed'+id+"Row"+rowNumber,'consideringCorrection'+id+"Row"+rowNumber);
				});
		}

		function addRowToTableWithData(id,
			testPoint,
			consideringCorrection,
			standardUsed,
			UUCtrial1,
			UUCtrial2,
			UUCtrial3,
			UUCAverage,
			standardTrial1,
			standardTrial2,
			standardTrial3,
			standardAverage,
			standardResolution,
			chamberInhomogeneity,
			chamberInstability,
			range,
			resolution,
			readability,
			correctedValue, 
			functionType,
			channel,
			brand,
			serialNumber,
			model
			){    
			var tbody = document.getElementById(id);
			var tableName = tbody.parentElement.id;
			var table = document.getElementById(tableName);
			var TableNameCapitalFirst = tableName.charAt(0).toUpperCase() + tableName.slice(1);

			var loopfunctionTableCount = table.getElementsByTagName('select')['function'+TableNameCapitalFirst]['options'].length;

			for (let functionIndex = 0; functionIndex < loopfunctionTableCount; functionIndex++) {
				if (table.getElementsByTagName('select')['function'+TableNameCapitalFirst]['options'][functionIndex].value == functionType){
					table.getElementsByTagName('select')['function'+TableNameCapitalFirst]['options'][functionIndex].setAttribute('selected', "");
				}
			}

			var functionName = table.getElementsByTagName('select')['function'+TableNameCapitalFirst].value;

			table.getElementsByTagName('input')['channelName'+TableNameCapitalFirst].value = channel;
			table.getElementsByTagName('input')['brand'+TableNameCapitalFirst].value = brand;
			table.getElementsByTagName('input')['serialNumber'+TableNameCapitalFirst].value = serialNumber;
			table.getElementsByTagName('input')['model'+TableNameCapitalFirst].value = model;



			function addNewTD(rowNumber, nameID, value){
				var automaticArray = [
					'consideringCorrection',
					'UUCAverage',
					'standardAverage',
					'standardResolution',
					'chamberInhomogeneity',
					'chamberInstability',
					'correctedValue',
				]

				try {
					var td = document.createElement("td");
					var div = document.createElement("div");
					var input = document.createElement("input");
					div.setAttribute('class', 'input-group');
					div.setAttribute('style', 'width:5em');
					input.setAttribute('class', 'form-control');
					input.setAttribute('type', 'text');
					input.setAttribute('data-rowNumber', rowNumber);
					input.setAttribute('name', nameID+id+"Row"+rowNumber);
					input.setAttribute('id', nameID+id+"Row"+rowNumber);
					input.setAttribute('value', value);
					if(automaticArray.includes(nameID)){
						input.setAttribute('style', 'background-color:yellow');
					}
					div.appendChild(input);
					td.appendChild(div);
					return td
				} catch (error) {
					var td = document.createElement("td");
					var div = document.createElement("div");
					var input = document.createElement("input");
					var p = document.createElement("p");
					div.setAttribute('class', 'input-group');
					p.innerHTML = error;
					div.appendChild(p);
					td.appendChild(div);
					return td 
				}
			}
			function addNewSTDUsed(rowNumber, nameID, value){
				var selected = document.getElementById('standardAndAccessories').value;
				var selectedSplit = selected.split('(SPLIT)');
				try {
					var td = document.createElement("td");
					var div = document.createElement("div");
					var input = document.createElement("select");
					div.setAttribute('class', 'input-group');
					div.setAttribute('style', 'width:5em');
					input.setAttribute('class', 'form-control');
					input.setAttribute('type', 'text');
					input.setAttribute('data-rowNumber', rowNumber);
					//Edit after adding db
					input.setAttribute('name', nameID+id+"Row"+rowNumber);
					input.setAttribute('id', nameID+id+"Row"+rowNumber);
					var option = document.createElement("option");
					option.innerHTML = 'Choose';
					option.setAttribute('value',' ');
					input.appendChild(option)
					for (let i = 0; i < selectedSplit.length; i++) {
						var option = document.createElement("option");
						option.innerHTML = selectedSplit[i];
						if(selectedSplit[i] == value){
							option.setAttribute('selected','')
						}

						input.appendChild(option)
					}

					div.appendChild(input);
					td.appendChild(div);
					return td
				} catch (error) {
					var td = document.createElement("td");
					var div = document.createElement("div");
					var input = document.createElement("input");
					div.setAttribute('class', 'input-group');
					p.innerHTML = error;
					div.appendChild(p);
					td.appendChild(div);
					return td 
				}
			}

				var tbody = document.getElementById(id);
				var tr = document.createElement("tr");
				var numberOfRow = (tbody.childElementCount+1);
				var rowNumber = numberOfRow;
				tr.appendChild(addNewTD(rowNumber,'testPoint',testPoint));
				tr.appendChild(addNewTD(rowNumber,'consideringCorrection',consideringCorrection));
				tr.appendChild(addNewSTDUsed(rowNumber,'standardUsed',standardUsed));
				tr.appendChild(addNewTD(rowNumber,'UUCtrial1',UUCtrial1));
				tr.appendChild(addNewTD(rowNumber,'UUCtrial2',UUCtrial2));
				tr.appendChild(addNewTD(rowNumber,'UUCtrial3',UUCtrial3));
				tr.appendChild(addNewTD(rowNumber,'UUCAverage',UUCAverage));
				tr.appendChild(addNewTD(rowNumber,'standardTrial1',standardTrial1));
				tr.appendChild(addNewTD(rowNumber,'standardTrial2',standardTrial2));
				tr.appendChild(addNewTD(rowNumber,'standardTrial3',standardTrial3));
				tr.appendChild(addNewTD(rowNumber,'standardAverage',standardAverage));
				tr.appendChild(addNewTD(rowNumber,'standardResolution',standardResolution));
				tr.appendChild(addNewTD(rowNumber,'chamberInhomogeneity',chamberInhomogeneity));
				tr.appendChild(addNewTD(rowNumber,'chamberInstability',chamberInstability));
				tr.appendChild(addNewTD(rowNumber,'range',range));
				tr.appendChild(addNewTD(rowNumber,'resolution',resolution));
				tr.appendChild(addNewTD(rowNumber,'readability',readability));
				tr.appendChild(addNewTD(rowNumber,'correctedValue',correctedValue));
				tbody.appendChild(tr);
				


				if(functionName=="Temp"){
					bind('testPoint'+id+"Row"+rowNumber,'keyup',function(){
						setResRead(document.getElementById('standardUsed'+id+"Row"+rowNumber,).value,'testPoint'+id+"Row"+rowNumber,'Temperature','range'+id+"Row"+rowNumber,'standardResolution'+id+"Row"+rowNumber,'readability'+id+"Row"+rowNumber);
						correctionFromCertDisplay('testPoint'+id+"Row"+rowNumber,'correctedValue'+id+"Row"+rowNumber,'standardAverage'+id+"Row"+rowNumber,'standardUsed'+id+"Row"+rowNumber,'consideringCorrection'+id+"Row"+rowNumber);
					});

					bind('standardUsed'+id+"Row"+rowNumber,'change',function(){
						setResRead(this.value,'testPoint'+id+"Row"+rowNumber,'Temperature','range'+id+"Row"+rowNumber,'standardResolution'+id+"Row"+rowNumber,'readability'+id+"Row"+rowNumber);
						correctionFromCertDisplay('testPoint'+id+"Row"+rowNumber,'correctedValue'+id+"Row"+rowNumber,'standardAverage'+id+"Row"+rowNumber,'standardUsed'+id+"Row"+rowNumber,'consideringCorrection'+id+"Row"+rowNumber);
					});
					bind('standardTrial1'+id+"Row"+rowNumber,'keyup',function(){
						average({trial1:'standardTrial1'+id+"Row"+rowNumber,trial2:'standardTrial2'+id+"Row"+rowNumber,trial3:'standardTrial3'+id+"Row"+rowNumber,aver:'standardAverage'+id+"Row"+rowNumber});
						correctionFromCertDisplay('testPoint'+id+"Row"+rowNumber,'correctedValue'+id+"Row"+rowNumber,'standardAverage'+id+"Row"+rowNumber,'standardUsed'+id+"Row"+rowNumber,'consideringCorrection'+id+"Row"+rowNumber);
					});
					bind('standardTrial2'+id+"Row"+rowNumber,'keyup',function(){
						average({trial1:'standardTrial1'+id+"Row"+rowNumber,trial2:'standardTrial2'+id+"Row"+rowNumber,trial3:'standardTrial3'+id+"Row"+rowNumber,aver:'standardAverage'+id+"Row"+rowNumber});
						correctionFromCertDisplay('testPoint'+id+"Row"+rowNumber,'correctedValue'+id+"Row"+rowNumber,'standardAverage'+id+"Row"+rowNumber,'standardUsed'+id+"Row"+rowNumber,'consideringCorrection'+id+"Row"+rowNumber);
					});
					bind('standardTrial3'+id+"Row"+rowNumber,'keyup',function(){
						average({trial1:'standardTrial1'+id+"Row"+rowNumber,trial2:'standardTrial2'+id+"Row"+rowNumber,trial3:'standardTrial3'+id+"Row"+rowNumber,aver:'standardAverage'+id+"Row"+rowNumber});
						correctionFromCertDisplay('testPoint'+id+"Row"+rowNumber,'correctedValue'+id+"Row"+rowNumber,'standardAverage'+id+"Row"+rowNumber,'standardUsed'+id+"Row"+rowNumber,'consideringCorrection'+id+"Row"+rowNumber);
					});
				}
				if(functionName=="Rh"){
					bind('testPoint'+id+"Row"+rowNumber,'keyup',function(){
						setResRead(document.getElementById('standardUsed'+id+"Row"+rowNumber,).value,'testPoint'+id+"Row"+rowNumber,'Relative Humidity','range'+id+"Row"+rowNumber,'standardResolution'+id+"Row"+rowNumber,'readability'+id+"Row"+rowNumber);
						correctionFromCertRHDisplay('testPoint'+id+"Row"+rowNumber,'correctedValue'+id+"Row"+rowNumber,'standardAverage'+id+"Row"+rowNumber,'standardUsed'+id+"Row"+rowNumber,'consideringCorrection'+id+"Row"+rowNumber);
					});
					bind('standardUsed'+id+"Row"+rowNumber,'change',function(){
						setResRead(this.value,'testPoint'+id+"Row"+rowNumber,'Relative Humidity','range'+id+"Row"+rowNumber,'standardResolution'+id+"Row"+rowNumber,'readability'+id+"Row"+rowNumber);
						correctionFromCertRHDisplay('testPoint'+id+"Row"+rowNumber,'correctedValue'+id+"Row"+rowNumber,'standardAverage'+id+"Row"+rowNumber,'standardUsed'+id+"Row"+rowNumber,'consideringCorrection'+id+"Row"+rowNumber);
					});
					bind('standardTrial1'+id+"Row"+rowNumber,'keyup',function(){
						average({trial1:'standardTrial1'+id+"Row"+rowNumber,trial2:'standardTrial2'+id+"Row"+rowNumber,trial3:'standardTrial3'+id+"Row"+rowNumber,aver:'standardAverage'+id+"Row"+rowNumber});
						correctionFromCertRHDisplay('testPoint'+id+"Row"+rowNumber,'correctedValue'+id+"Row"+rowNumber,'standardAverage'+id+"Row"+rowNumber,'standardUsed'+id+"Row"+rowNumber,'consideringCorrection'+id+"Row"+rowNumber);
					});
					bind('standardTrial2'+id+"Row"+rowNumber,'keyup',function(){
						average({trial1:'standardTrial1'+id+"Row"+rowNumber,trial2:'standardTrial2'+id+"Row"+rowNumber,trial3:'standardTrial3'+id+"Row"+rowNumber,aver:'standardAverage'+id+"Row"+rowNumber});
						correctionFromCertRHDisplay('testPoint'+id+"Row"+rowNumber,'correctedValue'+id+"Row"+rowNumber,'standardAverage'+id+"Row"+rowNumber,'standardUsed'+id+"Row"+rowNumber,'consideringCorrection'+id+"Row"+rowNumber);
					});
					bind('standardTrial3'+id+"Row"+rowNumber,'keyup',function(){
						average({trial1:'standardTrial1'+id+"Row"+rowNumber,trial2:'standardTrial2'+id+"Row"+rowNumber,trial3:'standardTrial3'+id+"Row"+rowNumber,aver:'standardAverage'+id+"Row"+rowNumber});
						correctionFromCertRHDisplay('testPoint'+id+"Row"+rowNumber,'correctedValue'+id+"Row"+rowNumber,'standardAverage'+id+"Row"+rowNumber,'standardUsed'+id+"Row"+rowNumber,'consideringCorrection'+id+"Row"+rowNumber);
					});
				}

				//$('"#standardUsed'+id+'Row'+rowNumber+'"').trigger("change");

				
				bind('UUCtrial1'+id+"Row"+rowNumber,'keyup',function(){
					average({trial1:'UUCtrial1'+id+"Row"+rowNumber,trial2:'UUCtrial2'+id+"Row"+rowNumber,trial3:'UUCtrial3'+id+"Row"+rowNumber,aver:'UUCAverage'+id+"Row"+rowNumber});
				});
				bind('UUCtrial2'+id+"Row"+rowNumber,'keyup',function(){
					average({trial1:'UUCtrial1'+id+"Row"+rowNumber,trial2:'UUCtrial2'+id+"Row"+rowNumber,trial3:'UUCtrial3'+id+"Row"+rowNumber,aver:'UUCAverage'+id+"Row"+rowNumber});
				});
				bind('UUCtrial3'+id+"Row"+rowNumber,'keyup',function(){
					average({trial1:'UUCtrial1'+id+"Row"+rowNumber,trial2:'UUCtrial2'+id+"Row"+rowNumber,trial3:'UUCtrial3'+id+"Row"+rowNumber,aver:'UUCAverage'+id+"Row"+rowNumber});
				});
				
		}

		function checkIfHaveFuntiontype(button, tableNumber){
			var tableID = button.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.id;
			var TableIDCapitalFirst = tableID.charAt(0).toUpperCase() + tableID.slice(1);
			var functionElement = document.getElementById('function'+TableIDCapitalFirst);
			if(functionElement.value == " "){
				alert('Choose a function');
			}else{
				addRowToTable("TbodyTable"+tableNumber);
			}
		}
		
		function deleteTable(divID){
			try {
				var div = document.getElementById(divID);
				var tableCount = div.childElementCount;			
				if(tableCount==0){
					alert('No more table to delete')
				}else{
					div.lastChild.remove();
					tableCount = div.childElementCount;
				}
			}catch(e) {
				alert(e);
			}
		}

		function calculateCancelCalculate(){
			
			$("#calculateButtonMeasurementTables").each(function(e){
				if($(this).html() == 'Calculate'){
					$(this).removeAttr("onclick");
					$(this).attr('onclick', 'calculateCancelCalculate()');
					$(this).html("Cancel");
					$("button[id*='addButton']").each(function(e){
						$(this).attr("disabled", "disabled");
						$(this).removeClass("btn-success");
						$(this).addClass("btn-secondary");
					});
					$("button[id*='removeButton']").each(function(e){
						$(this).attr("disabled", "disabled");
						$(this).removeClass("btn-danger");
						$(this).addClass("btn-secondary");
					});
					return;
				}
				if($(this).html() == 'Cancel'){
					$(this).attr('onclick', 'calculateAll()');
					$(this).html("Calculate");
					$("button[id*='addButton']").each(function(e){
						$(this).removeAttr("disabled");
						$(this).removeClass("btn-secondary");
						$(this).addClass("btn-success");
					});
					$("button[id*='removeButton']").each(function(e){
						$(this).removeAttr("disabled");
						$(this).removeClass("btn-secondary");
						$(this).addClass("btn-danger");
					});
					return;
				}
			});
		}

</script>
        </div>
      </div>
      <!-- /#page-content-wrapper -->
    </div>
  </body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="/dashboardAsset/lib/jquery/jquery.min.js"></script>
<script src="/dashboardAsset/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/dashboardAsset/lib/feathericons/feather.min.js"></script>
<script src="/dashboardAsset/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/dashboardAsset/assets/js/script.js"></script>
<script>
	$("#menu-toggle").click(function(e) {
	e.preventDefault();
	$("#wrapper").toggleClass("toggled");
	});


	var initialText = $('.editable').val();
	$('.editOption').val(initialText);

	$('#test').change(function(){
	var selected = $('option:selected', this).attr('class');
	var optionText = $('.editable').text();

	if(selected == "editable"){
	$('.editOption').show();

	
	$('.editOption').keyup(function(){
		var editText = $('.editOption').val();
		$('.editable').val(editText);
		$('.editable').html(editText);
	});

	}else{
	$('.editOption').hide();
	}
	});

	var personnels = <?= json_encode($personnel)?>;
    var verifiers = <?= json_encode($verifier)?>;

	$(document).ready(function(){
        addPersonnel();
    });

	function addPersonnel(){
        var calibrationOfficer = document.getElementById('calibratedBy');
        var verifier = document.getElementById('encodedBy');
        var verifierPosition = document.getElementById('checkedby');
		var selected = '<?= $thermoData['calibratedBy']?>';
		var encodedBy = '<?= $thermoData['encodedBy']?>';
        personnels.forEach(item => {
            var option = document.createElement('option');
            option.setAttribute('value', item.personnelName);
            option.innerHTML = item.personnelName;
			if(item.personnelName == selected){
				option.setAttribute('selected', '');
			}
            calibrationOfficer.appendChild(option);
        })
        verifiers.forEach(item => {
            var option = document.createElement('option');
            option.setAttribute('value', item.verifierName);
            option.setAttribute('data-verifierposition', item.verifierPosition);
			option.setAttribute('data-email', item.verifierEmail);
            option.innerHTML = item.verifierName;
			if(item.verifierName == encodedBy){
				option.setAttribute('selected', '');
			}
            verifier.appendChild(option);

            var option = document.createElement('option');
            option.setAttribute('value', item.verifierPosition);
            option.setAttribute('data-verifiername', item.verifierName);
			option.setAttribute('data-email', item.verifierEmail);
            option.innerHTML = item.verifierPosition;
			if(item.verifierName == encodedBy){
				option.setAttribute('selected', '');
			}
            verifierPosition.appendChild(option);
        })
		getEmailOfVerifier('encodedBy');
    }

	function bind(id, evt, func) {
		var el = document.getElementById(id);
		if (el.addEventListener){
			el.addEventListener(evt, func);
		} else if (el.attachEvent) {
			el.attachEvent('on' + evt, func);
		}
	}

	function bindEventsToInputAndButtons(){
        bind('encodedBy','change',function(){
            copyFromDataset('encodedBy', 'checkedby', 'verifierposition');
			getEmailOfVerifier('encodedBy');
        });
        bind('checkedby','change',function(){
            copyFromDataset('checkedby', 'encodedBy', 'verifiername')
        });
		bind('addButtonMeasurementTables','click',function(){
            addTablesToDiv("measurementDataTables")
        });
		bind('removeButtonMeasurementTables','click',function(){
            deleteTable("measurementDataTables")
        }); 
	}
	bindEventsToInputAndButtons()

	function copyFromDataset(copyFrom, copyTo, datasetName){
        var from = document.getElementById(copyFrom);
        var to = document.getElementById(copyTo);
        to.value = from.selectedOptions[0].dataset[datasetName];
    }
	function getEmailOfVerifier(copyFrom){
		var from = document.getElementById(copyFrom);
		var verifierEmail = document.getElementById('verifierEmail');
		verifierEmail.value = from.selectedOptions[0].dataset['email'];
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

	function roleFunction(){
		if(role == 'admin' && page == 'forVerification'){
			var verifyButtonDIV = document.getElementById('verifyButtonDIV');
			var correctionButtonDIV = document.getElementById('correctionButtonDIV');
			var commentDIV = document.getElementById('commentDIV');
			var hiddenComment = document.getElementById('commentHidden');
			
			var verifyButton = document.createElement('button');
			var correctionButton = document.createElement('button');
			var backButton = document.getElementById('backButton');
			var textArea = document.createElement('textarea');

			textArea.setAttribute('rows','4');
			textArea.setAttribute('cols','50');
			textArea.setAttribute('placeholder','Comments');
			textArea.setAttribute('class','mt-3');
			textArea.setAttribute('oninput', 'getComment()')
			textArea.setAttribute('id','displayedComment')

			verifyButton.setAttribute('type', 'button');
			correctionButton.setAttribute('type', 'button');
			verifyButton.setAttribute('class', 'btn btn-success mr-3');
			correctionButton.setAttribute('class', 'btn btn-danger');
			verifyButton.setAttribute('onclick', 'toggleAlert();verify("formMain")');
			correctionButton.setAttribute('onclick', 'correction()');

			$("button[id*='addButton']").each(function(e){
				$(this).attr("disabled", "disabled");
				$(this).removeClass("btn-success");
				$(this).addClass("btn-secondary");
			});
			$("button[id*='removeButton']").each(function(e){
				$(this).attr("disabled", "disabled");
				$(this).removeClass("btn-danger");
				$(this).addClass("btn-secondary");
			});

			
			backButton.setAttribute('href','/thermoEdit/'+<?=$thermoData['id']?>+'/forVerification');	

			verifyButton.innerHTML = "Verify";
			correctionButton.innerHTML = "For Correction";
			verifyButtonDIV.appendChild(verifyButton);
			correctionButtonDIV.appendChild(correctionButton);
			commentDIV.appendChild(textArea);
		} else{
			var buttonDiv = document.getElementById('forVerificationButtons');
			var updateButton = document.createElement('button');
			updateButton.setAttribute('type', 'button');
			updateButton.setAttribute('id', 'updateButton');
			updateButton.setAttribute('class', 'btn btn-lg btn-primary');
			updateButton.setAttribute('onclick', 'submitForm("formMain")');
			updateButton.innerHTML = "<i class='fas fa-save'></i> Update";
			buttonDiv.appendChild(updateButton);
		}
	}
    
	function verify(idOfForm){
		if(confirm("Are you sure you want to proceed?") == true){
			document.getElementById('completion').value = "For printing";
			inputToArrayTempIn('temperatureTable','tableTempIn',document.getElementById('tempInAddToArray').id);
			inputToArrayTempOut('temperatureTableOut','tableTempOut',document.getElementById('tempOutAddToArray').id)
			inputToArrayRH('temperatureTableRH','tableRH',document.getElementById('RHAddToArray').id);
			inputToArrayRNOut('temperatureTableRNOut','tableRNOut',document.getElementById('RNOutAddToArray').id)
			automaticAddToObject();
			document.getElementById(idOfForm).submit();
        }
	}
    function correction(){
        if(confirm("Are you sure you want to proceed?") == true){
            document.correctionForm.submit();
        }
    }
	
</script>
<style>
	.float{
		position:fixed;
		width:60px;
		height:60px;
		bottom:40px;
		right:40px;
		background-color:#0C9;
		color:#FFF;
		border-radius:50px;
		text-align:center;
		box-shadow: 2px 2px 3px #999;
	}
</style>









