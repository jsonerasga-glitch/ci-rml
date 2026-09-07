<?php
use App\Models\ThermoStandardAddTestPointsModel;
use App\Models\ThermoStandardAddDriftModel;
use App\Models\ThermoStandardAddDriftPRTModel;
use App\Models\ThermoStandard;
use App\Models\CustomersModel;
use App\Models\PersonnelModel;


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

?>
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
  <script type="text/javascript">
   <?php 
		//    if(!isset($_GET['SN'])){
		// 	   $sn="NULL";
		// 	   echo " $(window).on('load', function() {
		//         $('#usePrevData').modal('show');
		//     });";
		//    }else{
		// 	   $sn= isset($_GET['SN']) ? $_GET['SN'] : "NULL";
		//    }
		$sn="NULL";
   ?>
   </script>
<style>
	.modal4TempInRow tbody tr td input{
		width: auto;
	}
	table td {
	position: relative;
	}
	table td input{
		position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	/*for full width without spacing */
	width: 100%;
	border: none;
	}
</style>
<!DOCTYPE html>

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
    
    <link href="dashboardAsset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="dashboardAsset/lib/remixicon/fonts/remixicon.css" rel="stylesheet">
    
    <!-- Template CSS -->
    <link rel="stylesheet" href="dashboardAsset/assets/css/style.min.css">
   </head>  
  <body class="skin-base animate">
	<div class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-logo"><span></span></a>
        <a href="#" class="sidebar-logo-text">RML<span>++</span></a>
      </div><!-- sidebar-header -->
      <div class="sidebar-body">
        <ul class="nav-sidebar">
          <li class="nav-item ">
            <a href="" onclick="window.location.href = '/guestDashboard'" class="nav-link"><i data-feather="home"></i><span>Dashboard</span></a>              
          </li>
          <li class="nav-item show">
            <a href="" class="nav-link with-sub"><i data-feather="clipboard"></i><span>Certificates</span></a>
            <nav class="nav-sub">
              <a href="#" onclick="window.location.href = '/guestAddElect'"  class="sub-link" style="">Single Range E-balance</a>
              <a href="#" onclick="window.location.href = '/guestAddThermo'"  class="sub-link active ">Thermohygrometer</a>
              <a href="#" onclick="window.location.href = '/guestTestWeightAddDataView'"  class="sub-link">Test Weights</a>
            </nav>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i data-feather="monitor"></i><span>Records</span></a>
            <nav class="nav-sub">
              <a href="#" onclick="window.location.href = '/guestElectTable'"  class="sub-link">Single Range E-balance</a>
              <a href="#" onclick="window.location.href = '/guestThermoTable'"  class="sub-link">Thermohygrometer</a>
              <a href="#" onclick="window.location.href = '/guestTestWeightTable'"  class="sub-link">Test Weights</a>
            </nav>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i data-feather="archive"></i><span>Standards</span></a>
            <nav class="nav-sub">
              <a href="#" onclick="window.location.href = '/guestElectStandard'" class="sub-link">Single Range E-balance</a>
              <a href="#" onclick="window.location.href = '/guestThermoStandardTable'" class="sub-link">Thermohygrometer</a>
              <a href="#" onclick="window.location.href = '/testWeightStandardTable'" class="sub-link">Test Weights</a>
            </nav>
          </li> 
        </ul>
        <hr>
         <hr>
        <hr>
        <ul class="nav-sidebar">
          <li class="nav-item"><a href="#" onclick="window.location.href = '/pendingTable'" class="nav-link"><i data-feather="user-check"></i><span>Pending/For Correction</span></a></li>
          <li class="nav-item"><a href="#" class="nav-link" onclick="window.location.href = '/guestProfile'"><i data-feather="smartphone"></i><span>My Profile</span></a></li>
          <li class="nav-item"><a href="#" class="nav-link" onclick="window.location.href = '/guestAbout'"><i data-feather="align-justify"></i><span>About</span></a></li>
        </ul>
        <hr>
      </div><!-- sidebar-body -->
      <div class="sidebar-footer">
        <a href="#" class="avatar online" onclick="logoutConfirmation('<?= base_url('logout') ?>')">
            <span class="avatar-initial">
                <?php $user1 = session('name'); $fstchar = $user1[0]; echo $fstchar;?>
            </span>
        </a>
        <div class="avatar-body">
          <div class="d-flex align-items-center justify-content-between">
            <h6><?= session('name')?> <?= session('lname')?></h6>
          </div>
          <span>Calibration Officer</span>
        </div><!-- avatar-body -->
      </div><!-- sidebar-footer -->
    </div><!-- sidebar -->
    <!-- /#sidebar-wrapper -->
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
						<label class="content-label">Calibration Worksheet</label>
					</div>
							<?php if (isset($validation)) : ?>
								<div class="col-12">
									<div class="alert alert-danger" role="alert">
										<?= $validation->listErrors() ?>
									</div>
								</div>
							<?php endif; ?>
							<form action="<?= base_url('guestThermoAddData') ?>" method="POST" id='formMain' enctype="multipart/form-data">
								<input type="hidden" name="completion" id="completion" value="Complete">
								<input type="hidden" name="calibratorAccountEmail" id="calibratorAccountEmail" value="<?= session('email')?>">
								<input type="hidden" name="calibratorAccountID" id="calibratorAccountID" value="<?= session('id')?>">

						<!-- INFORMATION-->
							<div class='row mt-2'>
								<div class='col-xl-6 col-12'>
									<input type="hidden" name="inputtedArrayTempIn" id="inputtedArrayTempIn">
									<input type="hidden" name="inputtedArrayTempOut" id="inputtedArrayTempOut">
									<input type="hidden" name="inputtedArrayRHIn" id="inputtedArrayRHIn">
									<input type="hidden" name="inputtedArrayRHOunt" id="inputtedArrayRHOunt">
									<i>Important: Please make sure that no space is added in Certificate No.</i><b style="color: red;"> *</b>
									<div class="mb-3">
										<label>Certificate No.</label>
										<input name='certificateNumber' id="certificateNumber" oninput="checkCertNum()" value="<?= set_value('certificateNumber')?>" style="height: 50px;" type="text" class="form-control text-break mt-n2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
									</div>
									<div class=" mb-3">
									<label>Customer</label>
													<input name='customer' id="customer" list='customerList' required type="text" class="form-control mt-n2 text-break" onchange="getCustomerDetails()">
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
													<input type="hidden" name="idOfCustomer" id="idOfCustomer">									</div>
									<div class=" mb-3">
										<label>Address</label>
										<input name='address' value="<?= set_value('address')?>" id="address" type="text" class="form-control mt-n2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" style="margin-top: 0px;margin-bottom: 0px;height: 80px;">
									</div>
								</div>
								<div class='col-xl-6 col-12'>
									<h6>Dates</h6>
									<div class="row mt-2">
										<div class="col-6 mb-3">
											<label>Date Received</label>
											<input name='dateReceived' id='dateReceived' value="<?= set_value('dateReceived')?>"  required type="date" class="form-control text-break" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
										</div>
										<div class="col-6 mb-3">
											<label>Date Calibrated</label>
											<input name='dateCalibrated' id='dateCalibrated' value="<?= set_value('dateCalibrated')?>"  required type="date" class="form-control text-break" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
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
											<input name='recommendedDueDate' id='recommendedDueDate' value="<?= set_value('recommendedDueDate')?>" required type="date" class="form-control text-break" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
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
										<select  class="form-control" name="placeOfCalibration" id="placeOfCalibration">
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
									<input name='equipmentDescription'  id='equipmentDescription'  value="<?= set_value('equipmentDescription')?>"  style="height: 50px;" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
								</div>
								<div class="col-12 col-xl-6 mt-2">
									<label>Manufacturer</label>
									<input name="manufacturer" id="manufacturer" value="<?= set_value('manufacturer')?>" type="text" style="height: 50px;" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
								</div>
								<div class="col-12 col-xl-6 mt-2">
									<label>Model No.</label>
									<input name='modelNumber' id='modelNumber' value="<?= set_value('modelNumber')?>" type="text" style="height: 50px;" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">									
								</div>
								<div class="col-12 col-xl-6 mt-2">
									<label>Serial No.</label>
									<input name='serialNumber' id='serialNumber' value="<?= set_value('serialNumber')?>" type="text" style="height: 50px;" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
								</div>
								<div class="col-12 col-xl-6 mt-2">
									<label>Equipment ID.</label>
									<input name='equipmentID' id='equipmentID' value="<?= set_value('equipmentID')?>" type="text" style="height: 50px;" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
								</div>
								<div class="col-12 col-xl-6 mt-2">
									<label>Type of equipment</label>
									<select name="typeOfEquipment" id="typeOfEquipment" class="form-control" required>
										<option value="">Choose . . . </option>
										<option value="digital">Digital</option>
										<option value="analog">Analog</option>
									</select>
								</div>
							</div>
							
						<!-- SPECIFICATION -->
							<br>
							<hr>
						<!-- ENVIRONMENT -->
							<div class="mx-auto d-flex justify-content-center">
								<h5>Environment Condition</h5>
							</div>
								<div class='row mb-3'>
									<div class="col-6 col-xl-3 mt-2">
										<label>Start Temp</label>
										<input name='startTemp' id='startTemp' value="<?= set_value('startTemp')?>" style="height: 50px;" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
									</div>
									<div class="col-6 col-xl-3 mt-2">
										<label>End Temp</label>
										<input name='endTemp' id='endTemp' value="<?= set_value('endTemp')?>" style="height: 50px;" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
									</div>
									<div class="col-6 col-xl-3 mt-2">
										<label>Start RH</label>
										<input name='startRh' id='startRh' value="<?= set_value('startRh')?>"  style="height: 50px;" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
									</div>
									<div class="col-6 col-xl-3 mt-2">
										<label>End RH</label>
										<input name='endRh' id='endRh' value="<?= set_value('endRh')?>" type="text" style="height: 50px;" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
									</div>
								</div>	
							<div class='row mb-3'>
								<div class='col'>
									<label>Ambient Temperature</label>
									<input readonly name="ambTemp" id="ambTemp"  style="height: 50px;" value="23 ± 3 °C"  type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
								</div>
								<div class="col">
									<label>Relative Humidity</label>
									<input readonly name="ambRh" id="ambRh"  style="height: 50px;" value="55 ± 15 %RH"  type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
								</div>
							</div>		
							</div>
							
						<!-- ENVIRONMENT -->
							<br>

						

							
						<!-- Standards and Accessories REDO THE SELECT-->
								<div class="">
									<h5>Standards and Accessories Used</h5>
								</div>

								<br>
								<div class="row ">
									<div class="col-5">
										<button type="button" class="btn btn-primary btn-lg" style="right:0;top:0;" data-toggle="modal" data-target="#modalChamber">
											Select/Change chamber
										</button>
									</div>
									<div class="col-5">
										<button type="button" class="btn btn-danger  btn-lg" style="right:0;top:0;" data-toggle="modal" data-target="#staticBackdrop">
											Select/Change Standard
										</button>
									</div>
								</div>
								
														
									
									<input type="hidden" name="standardAndAccessories" id="standardAndAccessories" >
									<input type="hidden" name="selectedChamber" id="selectedChamber" >
									 
									
								
								
						<!-- Standards and Accessories -->
							<hr>
							<br>
						<!-- PRELIMINARY -->
								<div class="">
									<h5>Preliminary Inspection</h5>
								</div>
							
								<br>
								<div class="start-50" >
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="A" <?= set_checkbox('premA', 'A'); ?> name="premA" id="premA">
										<label class="form-check-label" for="premA" name="premA">
										Visual Inspection (clean the equipment w/ soft cloth to remove dust and small particles)
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="B" <?= set_checkbox('premB', 'B'); ?> name="premB" id="premB">
										<label class="form-check-label" for="premB" name="premB">
										Check the surface and edges of the equipment for any damages. (note in remarks)
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="C" <?= set_checkbox('premC', 'C'); ?> name="premC" id="premC">
										<label class="form-check-label" for="premC" name="premC">
										Check the protective window of the equipment for cracks/scratches, color change, and broken window.
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="D" <?= set_checkbox('premD', 'D'); ?> name="premD" id="premD">
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
							<div class="">
								<div class="mx-auto d-flex justify-content-center">
									<h4>Measurement Data</h4>
								</div>
								<br>
								<div class="container-fluid shadow card p-2">
									<div class="row m-2">
										<div class="col">
											<input class="btn btn-primary" type="button" value="Add Row" onclick="addRowIn('temperatureTable',2)" />
										</div>
										<div class="col">
											<input class="btn btn-danger" type="button" value="Delete Last Row" onclick="deleteRow('temperatureTable',3)" />
										</div>
									</div>
								
									<input name='tableTempIn' class="form-check-input" type="hidden" value="[]" id="tableTempIn">
								
									<div class="table-responsive" >
										<table class="table table-bordered text-center mt-2" id="temperatureTable">
											<thead>
												<tr>
													<th scope="col" colspan='16'>Function: Temperature In</th>
												</tr>
												<tr>
													<th scope="col" rowspan='2' style="width:15%">Test Points, °C</th>
													<th scope="col" rowspan='2' style="width:15%">Considering Correction</th>
													<th scope="col" rowspan='2' style="width:15%">Standard To Use</th>
													<th scope="col" colspan='4'>UUC Reading</th>
													<th scope="col" colspan='4'>Standard Reading</th>
													<th scope="col" rowspan='2'>STD Resolution</th>
													<th scope="col" rowspan='2'>Chamber Inhomogeneity</th>	
													<th scope="col" rowspan='2'>Chamber Instability</th>
													<th scope="col" rowspan='2'>Range</th>
													<th scope="col" rowspan='2'>Res/Grad'n</th>
													<th scope="col" rowspan='2'>Readability</th>
													<th scope="col" rowspan='2'>Corrected Value</th>
												</tr>
												<tr>
													<th scope="col">TRIAL 1</th>
													<th scope="col">TRIAL 2</th>
													<th scope="col">TRIAL 3</th>
													<th scope="col">AVERAGE</th>
													<th scope="col">TRIAL 1</th>
													<th scope="col">TRIAL 2</th>
													<th scope="col">TRIAL 3</th>
													<th scope="col">AVERAGE</th>	
												</tr>
											</thead>
											<tbody>
										
												
											</tbody>
											
										</table>

									</div>
									<div class="row">
										<div class="col-12 text-center">
											<input class="btn btn-success mt-2" type="button" value="Store to database" id="tempInAddToArray" onclick="inputToArrayTempIn('temperatureTable','tableTempIn',this.id)" />
											<p class="h4" id="tempInAddToArrayText"></p>
										</div>
									</div>
								</div>


								<hr>
								<div class="container-fluid card shadow p-2">
								<div class="row m-2">
									<div class="col">
										<input class="btn btn-primary" type="button" value="Add Row" onclick="addRowOut('temperatureTableOut',2)" />
									</div>
									<div class="col">
										<input class="btn btn-danger" type="button" value="Delete Last Row" onclick="deleteRow('temperatureTableOut',3)" />
									</div>
										
								</div>
								
								<input name='tableTempOut' class="form-check-input" type="hidden" value="[]" id="tableTempOut">
								
								<div class="table-responsive">
									<table class="table table-bordered text-center mt-2" id="temperatureTableOut">
										<thead>
											<tr>
												<th scope="col" colspan='16'>Function: Temperature Out</th>
											
											</tr>
											<tr>
												<th scope="col" rowspan='2' style="width:15%">Test Points, °C</th>
												<th scope="col" rowspan='2' style="width:15%">Considering Correction</th>
												<th scope="col" rowspan='2' style="width:15%">Standard To Use</th>
												<th scope="col" colspan='4'>UUC Reading</th>
												<th scope="col" colspan='4'>Standard Reading</th>
												<th scope="col" rowspan='2'>STD Resolution</th>
												<th scope="col" rowspan='2'>Chamber Inhomogeneity</th>	
												<th scope="col" rowspan='2'>Chamber Instability</th>
												<th scope="col" rowspan='2'>Range</th>
												<th scope="col" rowspan='2'>Res/Grad'n</th>
												<th scope="col" rowspan='2'>Readability</th>
												<th scope="col" rowspan='2'>Corrected Value</th>
											</tr>
											<tr>
												<th scope="col">TRIAL 1</th>
												<th scope="col">TRIAL 2</th>
												<th scope="col">TRIAL 3</th>
												<th scope="col">AVERAGE</th>
												<th scope="col">TRIAL 1</th>
												<th scope="col">TRIAL 2</th>
												<th scope="col">TRIAL 3</th>
												<th scope="col">AVERAGE</th>		
											</tr>
										</thead>
										<tbody>
											
										
										</tbody>
									</table>
								</div>
										<div class="row">
											<div class="col-12 text-center">
											<input class="btn btn-success mt-2" type="button" value="Store to database" id="tempOutAddToArray" onclick="inputToArrayTempOut('temperatureTableOut','tableTempOut',this.id)" />
											<p class="h4" id="tempOutAddToArrayText"></p>
										</div>
									</div>
								</div>

								<hr>
								<div class="container-fluid shadow card p-2">
									<div class="row m-2">
										<div class="col">
											<input class="btn btn-primary" type="button" value="Add Row" onclick="addRowRH('temperatureTableRH',2)" />
										</div>
										<div class="col">
											<input class="btn btn-danger" type="button" value="Delete Last Row" onclick="deleteRow('temperatureTableRH',3)" />
										</div>
									</div>
								
								<input name='tableRH' class="form-check-input" type="hidden" value="[]" id="tableRH">
								
								<div class="table-responsive">
									<table class="table table-bordered text-center mt-2" id="temperatureTableRH">
										<thead>
											<tr>
												<th scope="col" colspan='16'>Function: Relative Humidity In</th>
											</tr>
											<tr>
												<th scope="col" rowspan='2' style="width:15%">Test Points, % RH</th>
												<th scope="col" rowspan='2' style="width:15%">Considering Correction</th>
												<th scope="col" rowspan='2' style="width:15%">Standard To Use</th>
												<th scope="col" colspan='4'>UUC Reading</th>
												<th scope="col" colspan='4'>Standard Reading</th>
												<th scope="col" rowspan='2'>STD Resolution</th>
												<th scope="col" rowspan='2'>Chamber Inhomogeneity</th>	
												<th scope="col" rowspan='2'>Chamber Instability</th>
												<th scope="col" rowspan='2'>Range</th>
												<th scope="col" rowspan='2'>Res/Grad'n</th>
												<th scope="col" rowspan='2'>Readability</th>
												<th scope="col" rowspan='2'>Corrected Value</th>
											</tr>
											<tr>
												<th scope="col">TRIAL 1</th>
												<th scope="col">TRIAL 2</th>
												<th scope="col">TRIAL 3</th>
												<th scope="col">AVERAGE</th>
												<th scope="col">TRIAL 1</th>
												<th scope="col">TRIAL 2</th>
												<th scope="col">TRIAL 3</th>
												<th scope="col">AVERAGE</th>		
											</tr>
										</thead>
										<tbody>
											
									
				
										</tbody>
									</table>
								</div>
									<div class="row">
										<div class="col-12 text-center">
											<input class="btn btn-success mt-2" type="button" value="Store to database"id="RHAddToArray" onclick="inputToArrayRH('temperatureTableRH','tableRH',this.id)" />
											<p class="h4" id="RHAddToArrayText"></p>
										</div>
									</div>
									</div>
								<hr>
								<div class="container-fluid shadow card p-2">
								<div class="row m-2">
									<div class="col">
										<input class="btn btn-primary" type="button" value="Add Row" onclick="addRowRNOut('temperatureTableRNOut',2)" />
									</div>
									<div class="col">
										<input class="btn btn-danger" type="button" value="Delete Row" onclick="deleteRow('temperatureTableRNOut',3)" />
									</div>
								
								</div>
								
								<input name='tableRNOut' class="form-check-input" type="hidden" value="[]" id="tableRNOut">
								
								<div class="table-responsive">
									<table class="table table-bordered text-center mt-2" id="temperatureTableRNOut">
										<thead>
											<tr>
												<th scope="col" colspan='16'>Function: Relative Humidity Out</th>
												
											</tr>
											<tr>
												<th scope="col" rowspan='2' style="width:15%">Test Points, % RH</th>
												<th scope="col" rowspan='2' style="width:15%">Considering Correction</th>
												<th scope="col" rowspan='2' style="width:15%">Standard To Use</th>
												<th scope="col" colspan='4'>UUC Reading</th>
												<th scope="col" colspan='4'>Standard Reading</th>
												<th scope="col" rowspan='2'>STD Resolution</th>
												<th scope="col" rowspan='2'>Chamber Inhomogeneity</th>	
												<th scope="col" rowspan='2'>Chamber Instability</th>
												<th scope="col" rowspan='2'>Range</th>
												<th scope="col" rowspan='2'>Res/Grad'n</th>
												<th scope="col" rowspan='2'>Readability</th>
												<th scope="col" rowspan='2'>Corrected Value</th>
											</tr>
											<tr>
												<th scope="col">TRIAL 1</th>
												<th scope="col">TRIAL 2</th>
												<th scope="col">TRIAL 3</th>
												<th scope="col">AVERAGE</th>
												<th scope="col">TRIAL 1</th>
												<th scope="col">TRIAL 2</th>
												<th scope="col">TRIAL 3</th>
												<th scope="col">AVERAGE</th>		
											</tr>
										</thead>
										<tbody>

										</tbody>
									</table>
								</div>
								<div class="row">
										<div class="col-12 text-center">
										<input class="btn btn-success mt-2" type="button" value="Store to database"id="RNOutAddToArray" onclick="inputToArrayRNOut('temperatureTableRNOut','tableRNOut',this.id)" />
										<p class="h4" id="RNOutAddToArrayText"></p>	
									</div>
									</div>
								

							</div>
							</div>

						<!--Measurement Table-->
						<!-- REMARKS-->
							<div class='position-relative mt-2'>
								<div class="position-absolute top-0 start-50 translate-middle">
									<h6>Remarks</h6>
								</div>
								<br>
								<div class="start-50" style=>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="E" <?= set_checkbox('remarksA', 'E'); ?> id="remarksE" name="remarksA">
										<label class="form-check-label" for="remarksE">
										Standard/s, accessory/ies, and UUC are in good condition before and after calibration
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="F" <?= set_checkbox('remarksF', 'F'); ?> id="remarksF" >
										<label class="form-check-label" for="remarksF">
										Others:
										</label>
										<input name="remarksF" value="<?= set_value('remarksF')?>" id='remarksFOthers' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" style="margin-top: 0px;margin-bottom: 0px;height: 80px;">
									</div>
								</div>
							</div>
						<!-- REMARKS -->
							<hr>
						<!-- FOOTER -->
						<div class="row">
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
								<input type="file" name="image" accept="image/*" id="imageInput" onchange="loadFile(event)">
								<img id="output"/>
							</div>
						<!-- IMAGE -->
							<br>
							<div class=' text-center'>
								<Button type="button" class="btn btn-lg btn-primary mb-5" onclick='submitForm("formMain")' ><i class="fas fa-folder-plus"></i> Generate Data</Button>
							</div> 
						</form>

						<button type="button" class=" float saveButton" style="position: fixed; bottom: 75;" data-toggle="modal" data-target="#confirmationModal">
							<i data-feather="save" style="font-size: 50px;"></i>
						</button>
						<button type="button" id='usePrevDataButton' class=" use_prev" data-toggle="modal" data-target="#usePrevData" style="position:fixed; top: 75;">
							<i data-feather="hard-drive" style="font-size: 50px;"></i>
						</button>

						
					</div>

					<datalist id="graduationList">
						<option value="0.5">
						<option value="0.2">
						<option value="0.1">
					</datalist>
				</div>
				 <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalForCalculation">
				modalForCalculation
				</button>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#standardModal">
				standardModal
				</button>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#standardDriftModal">
				standardDriftModal
				</button> -->

				<!-- <input type="text" id='testNum'>
				<button onclick="interpolationCorr('testNum','resultHere')">Test</button>
				<p id="resultHere"> Result Here </p>  -->
				
			</div>


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
											<td style="float: right;">
												<div class="form-check">
													<input class="form-check-input" type="checkbox" name="weightCheckbox" value="<?=  $arrStandard[0][$i]['serialNumber'];?>" id="flexCheck<?=$i?>">
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
									$lastSN =0;
									foreach($thermochamber as $row) : 
										
										if($row['serialNumber'] == $lastSN){
											$lastSN = $row['serialNumber']; 
											continue;
										}else{
											$lastSN = $row['serialNumber'];?>
									<tr id="<?php echo $row['id'] ?>">
									<td><input class="form-check-input" type="radio" name="chamberSelection" value="<?=  $row['serialNumber'];?>" id="flexCheck<?=$i?>"></td>
																<td><label class="form-check-label" for="flexCheck<?=$i?>"><?= $row['serialNumber'];?></td>
																
																
																
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
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

		<div class="modal fade" id="usePrevData" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Use Previous Data</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					
					<input class="form-control mt-n2" style="height: 50px;" list="dataListForPrevCert" id="prevCert">
					<datalist id="dataListForPrevCert">							
					</datalist>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-primary" id="useThisData" data-dismiss="modal">Use</button>
				</div>
				</div>
			</div>
		</div>
										</div>
<!--script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script-->
<!--Formula.js-->
<script src="https://cdn.jsdelivr.net/npm/jstat@1.9.2/dist/jstat.min.js"></script> 
<script src="https://cdn.jsdelivr.net/gh/formulajs/formulajs@2.5.0/dist/formula.min.js"></script>

<script>
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
		document.getElementById('completion').value = "Not Completed";
		try {
			getInputValueFromTables();
		} catch (error) {
			console.log(error)
		}
		
		document.getElementById(idOfForm).submit();
	}

	function submitForm(idOfForm){
		document.getElementById('completion').value = "Pending";
		inputToArrayTempIn('temperatureTable','tableTempIn',document.getElementById('tempInAddToArray').id);
		inputToArrayTempOut('temperatureTableOut','tableTempOut',document.getElementById('tempOutAddToArray').id)
		inputToArrayRH('temperatureTableRH','tableRH',document.getElementById('RHAddToArray').id);
		inputToArrayRNOut('temperatureTableRNOut','tableRNOut',document.getElementById('RNOutAddToArray').id)
		automaticAddToObject();
		var Checking = checkInputs();
		if(Checking == false){
			console.log('not submit')
		}else{
			document.getElementById(idOfForm).submit();
		}
	}

	function checkInputs(){
		if(document.getElementById('certificateNumber').value == ''|| document.getElementById('certificateNumber').value == null){
			alert("Certificate Number Empty");
			return false;
		}
		if(document.getElementById('customer').value == ''|| document.getElementById('customer').value == null){
			alert("Customer Empty");
			return false;
		}
		if(document.getElementById('address').value == ''|| document.getElementById('address').value == null){
			alert("Address Empty");
			return false;
		}
		if(document.getElementById('dateReceived').value == ''|| document.getElementById('dateReceived').value == null){
			alert("Date Received Empty");
			return false;
		}
		if(document.getElementById('dateCalibrated').value == ''|| document.getElementById('dateCalibrated').value == null){
			alert("Date Calibrated Empty");
			return false;
		}
		if(document.getElementById('recommendedDueDate').value == ''|| document.getElementById('recommendedDueDate').value == null){
			alert("Recommended Due Date Empty");
			return false;
		}

		if(document.getElementById('placeOfCalibration').value == ''|| document.getElementById('placeOfCalibration').value == null){
			alert("Place Of Calibration Empty");
			return false;
		}
		if(document.getElementById('equipmentDescription').value == ''|| document.getElementById('equipmentDescription').value == null){
			alert("Equipment Description Empty");
			return false;
		}
		if(document.getElementById('manufacturer').value == ''|| document.getElementById('manufacturer').value == null){
			alert("Manufacturer Empty");
			return false;
		}
		if(document.getElementById('modelNumber').value == ''|| document.getElementById('modelNumber').value == null){
			alert("Model Number Empty");
			return false;
		}
		if(document.getElementById('serialNumber').value == ''|| document.getElementById('serialNumber').value == null){
			alert("Serial Number Empty");
			return false;
		}
		if(document.getElementById('equipmentID').value == ''|| document.getElementById('equipmentID').value == null){
			alert("Equipment ID Empty");
			return false;
		}
		if(document.getElementById('typeOfEquipment').value == ''|| document.getElementById('typeOfEquipment').value == null){
			alert("Type of Equipment Empty");
			return false;
		}		
		if(document.getElementById('startTemp').value == ''|| document.getElementById('startTemp').value == null){
			alert("Starting Temp Empty");
			return false;
		}
		if(document.getElementById('endTemp').value == ''|| document.getElementById('endTemp').value == null){
			alert("Finishing RTemp Empty");
			return false;
		}
		if(document.getElementById('startRh').value == ''|| document.getElementById('startRh').value == null){
			alert("Starting RH Empty");
			return false;
		}
		if(document.getElementById('endRh').value == ''|| document.getElementById('endRh').value == null){
			alert("Finishing RH Empty");
			return false;
		}

		if(document.getElementById('ambTemp').value == ''|| document.getElementById('ambTemp').value == null){
			alert("Ambient Temperature Empty");
			return false;
		}
		if(document.getElementById('ambRh').value == ''|| document.getElementById('ambRh').value == null){
			alert("Ambient Relative Humidity Empty");
			return false;
		}

		if(document.getElementById('calibratedBy').value == ''|| document.getElementById('calibratedBy').value == null){
			alert("Calibrated Empty");
			return false;
		}
		if(document.getElementById('encodedBy').value == ''|| document.getElementById('encodedBy').value == null){
			alert("Encoded Empty");
			return false;
		}
		if(document.getElementById('checkedby').value == ''|| document.getElementById('checkedby').value == null){
			alert("Position Empty");
			return false;
		}		
		
	}

</script>

	<script>
		<?php
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
		var ThermoData = <?= json_encode($ThermoData)?>;
		var inhomoTemp = 0;
		var instaTemp = 0;
		var inhomoRH = 0;
		var instaRH = 0;
		function getChamberValue(){
			var selectedChamber = document.querySelector('input[name="chamberSelection"]:checked').value;
			var chamberHiddenInput = document.getElementById('selectedChamber');
			chamberHiddenInput.value = document.querySelector('input[name="chamberSelection"]:checked').value;
			var data = filterDataDynamic(selectedChamber,'serialNumber',ArrayOfChamber);
			var tempData =  filterDataDynamic('Temperature','unit',data);
			var rhData =  filterDataDynamic('Relative Humidity','unit',data);
			inhomoTemp = tempData[0]['inhomogeneity'];
			instaTemp = tempData[0]['Instability'];
			inhomoRH = rhData[0]['inhomogeneity'];
			instaRH = rhData[0]['Instability'];
			
		}

		function filterDataDynamic(searchingFor, searchIn, UnfilteredArray){
			let filteredDATA = UnfilteredArray.filter(function (e) {
			if (searchingFor == searchingFor ) {
				return e[searchIn] == searchingFor;
				}
			});
			return filteredDATA;
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

			var arrayOfSet = filterDataDynamic(serialNum.value,'serialNumber',ArrayOfStandardOriginal[0])
			
			for(x=0;x<arrayOfSet.length;x++){
				if (arrayOfSet[x].serialNumber == serialNum.value) {
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
				return interpolationCorr(midValue, serialNum.value);
			}else{
				return sortedArrayofTemp[midIndex].Corr;
			}
		}

		function correctionFromCertRHDisplay(midValue,resultID,rowStandard,serialNum,cosiderCorrect){	
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

			var arrayOfSet = filterDataDynamic(serialNum.value,'serialNumber',ArrayOfStandardOriginal[0])
			
			for(x=0;x<arrayOfSet.length;x++){
				if (arrayOfSet[x].serialNumber == serialNum.value) {
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
				return interpolationCorrRH(midValue, serialNum.value);
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
							PlaceholderWeight += ','+checkbox.value;}
					}
				}  
			}  
			weight = PlaceholderWeight;
			weightSplitted = weight.split(",");
			document.getElementById('standardAndAccessories').value = weight;

			$("select[id*='tableTempInStandardUse']").each( function (e){
				$(this).empty(); 	
				weightSplitted.forEach(element => {
					$(this).append($("<option></option>").attr("value", element).text(element));
				});
            });
			$("select[id*='tableTempOutStandardUse']").each( function (e){
				$(this).empty(); 	
				weightSplitted.forEach(element => {
					$(this).append($("<option></option>").attr("value", element).text(element));
				});
            });
			$("select[id*='tableRHStandardUse']").each( function (e){
				$(this).empty(); 	
				weightSplitted.forEach(element => {
					$(this).append($("<option></option>").attr("value", element).text(element));
				});
            });
			$("select[id*='tableRNOutStandardUse']").each( function (e){
				$(this).empty(); 	
				weightSplitted.forEach(element => {
					$(this).append($("<option></option>").attr("value", element).text(element));
				});
            });
		}

		function logValue(){
			var idName = document.getElementById("logInput").value;
			console.log("ID is: "+idName+" value is: "+document.getElementById(idName).value);
		}

		function SetuucReading({rowNumber,value}){
			document.getElementById("uucReadingSecondRow"+rowNumber).value=value;
			document.getElementById("uucReadingThirdRow"+rowNumber).value=value;
		}


		function addRowIn(tableID, row) {


			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var rowNum = rowCount - row;
			var row = table.insertRow(rowCount);

			console.log("table.rows.length "+table.rows.length);
			rowOfTable = table.rows.length;

			var cell1 = row.insertCell(0);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempInUUCTestPointRow"+rowNum;
			//element1.className="form-control";
			element1.setAttribute('onkeyup', "correctionFromCertDisplay('tableTempInUUCTestPointRow"+rowNum+"','tableTempInCorrectedRow"+rowNum+"','tableTempInStandardTrialAverageRow"+rowNum+"','tableTempInStandardUse"+rowNum+"','tableTempInConsideringCorrectedRow"+rowNum+"');setResRead(document.getElementById('tableTempInStandardUse"+rowNum+"').value,'tableTempInUUCTestPointRow"+rowNum+"','Temperature','tableTempInRangeRow"+rowNum+"','tableTempInSTDResRow"+rowNum+"','tableTempInReadabilityRow"+rowNum+"')");

			cell1.appendChild(element1);

			var valueConsideringCorrection = row.insertCell(1);
			var element1 = document.createElement("input");
			element1.style="background-color: yellow;"
			element1.type = "text";
			element1.id="tableTempInConsideringCorrectedRow"+rowNum;
			//element1.className="form-control";
			valueConsideringCorrection.appendChild(element1);

			var cell2 = row.insertCell(2);
			var element1 = document.createElement("select");
			var options = document.createElement("option");
				options.innerHTML = 'Choose . . .';
				options.setAttribute('value',weightSplitted[i]);
				element1.appendChild(options);
			for(var i = 0; i<weightSplitted.length;i++){
				var options = document.createElement("option");
				options.innerHTML = weightSplitted[i];
				options.setAttribute('value',weightSplitted[i]);
				element1.appendChild(options);
				
			}			
			element1.id="tableTempInStandardUse"+rowNum;
			element1.setAttribute('onchange', "setResRead(this.value,'tableTempInUUCTestPointRow"+rowNum+"','Temperature','tableTempInRangeRow"+rowNum+"','tableTempInSTDResRow"+rowNum+"','tableTempInReadabilityRow"+rowNum+"');correctionFromCertDisplay('tableTempInUUCTestPointRow"+rowNum+"','tableTempInCorrectedRow"+rowNum+"','tableTempInStandardTrialAverageRow"+rowNum+"','tableTempInStandardUse"+rowNum+"','tableTempInConsideringCorrectedRow"+rowNum+"')");
			cell2.appendChild(element1);

			var cell3 = row.insertCell(3);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempInUUCTrial1Row"+rowNum;
			//element1.className="form-control";
			element1.setAttribute("onkeyup", "average({trial1:'tableTempInUUCTrial1Row"+rowNum+"',trial2:'tableTempInUUCTrial2Row"+rowNum+"',trial3:'tableTempInUUCTrial3Row"+rowNum+"',aver:'tableTempInUUCTrialAverageRow"+rowNum+"'})");
			cell3.appendChild(element1);



			var cell4 = row.insertCell(4);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempInUUCTrial2Row"+rowNum;
			//element1.className="form-control";
			element1.setAttribute("onkeyup", "average({trial1:'tableTempInUUCTrial1Row"+rowNum+"',trial2:'tableTempInUUCTrial2Row"+rowNum+"',trial3:'tableTempInUUCTrial3Row"+rowNum+"',aver:'tableTempInUUCTrialAverageRow"+rowNum+"'})");
			cell4.appendChild(element1);

			var cell5 = row.insertCell(5);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempInUUCTrial3Row"+rowNum;
			//element1.className="form-control";
			element1.setAttribute("onkeyup", "average({trial1:'tableTempInUUCTrial1Row"+rowNum+"',trial2:'tableTempInUUCTrial2Row"+rowNum+"',trial3:'tableTempInUUCTrial3Row"+rowNum+"',aver:'tableTempInUUCTrialAverageRow"+rowNum+"'})");
			cell5.appendChild(element1);

			var cell6 = row.insertCell(6);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempInUUCTrialAverageRow"+rowNum;
			element1.setAttribute("tabindex", "-1");
			element1.style="background-color: yellow;"
			//element1.className="form-control";
			cell6.appendChild(element1);

			var cell7 = row.insertCell(7);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempInStandardTrial1Row"+rowNum;
			//element1.className="form-control";
			element1.setAttribute("onkeyup", "average({trial1:'tableTempInStandardTrial1Row"+rowNum+"',trial2:'tableTempInStandardTrial2Row"+rowNum+"',trial3:'tableTempInStandardTrial3Row"+rowNum+"',aver:'tableTempInStandardTrialAverageRow"+rowNum+"'}); correctionFromCertDisplay('tableTempInUUCTestPointRow"+rowNum+"','tableTempInCorrectedRow"+rowNum+"','tableTempInStandardTrialAverageRow"+rowNum+"','tableTempInStandardUse"+rowNum+"')");
			cell7.appendChild(element1);

			var cell8 = row.insertCell(8);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempInStandardTrial2Row"+rowNum;
			//element1.className="form-control";
			element1.setAttribute("onkeyup", "average({trial1:'tableTempInStandardTrial1Row"+rowNum+"',trial2:'tableTempInStandardTrial2Row"+rowNum+"',trial3:'tableTempInStandardTrial3Row"+rowNum+"',aver:'tableTempInStandardTrialAverageRow"+rowNum+"'}); correctionFromCertDisplay('tableTempInUUCTestPointRow"+rowNum+"','tableTempInCorrectedRow"+rowNum+"','tableTempInStandardTrialAverageRow"+rowNum+"','tableTempInStandardUse"+rowNum+"')");
			cell8.appendChild(element1);

			var cell9 = row.insertCell(9);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempInStandardTrial3Row"+rowNum;
			//element1.className="form-control";
			element1.setAttribute("onkeyup", "average({trial1:'tableTempInStandardTrial1Row"+rowNum+"',trial2:'tableTempInStandardTrial2Row"+rowNum+"',trial3:'tableTempInStandardTrial3Row"+rowNum+"',aver:'tableTempInStandardTrialAverageRow"+rowNum+"'}); correctionFromCertDisplay('tableTempInUUCTestPointRow"+rowNum+"','tableTempInCorrectedRow"+rowNum+"','tableTempInStandardTrialAverageRow"+rowNum+"','tableTempInStandardUse"+rowNum+"')");
			cell9.appendChild(element1);

			var cell10 = row.insertCell(10);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.style="background-color: yellow;"
			element1.id="tableTempInStandardTrialAverageRow"+rowNum;
			element1.setAttribute("tabindex", "-1");
			//element1.className="form-control";
			cell10.appendChild(element1);

			var cell11 = row.insertCell(11);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempInSTDResRow"+rowNum;
			element1.style="background-color: yellow;"
			//element1.className="form-control";
			cell11.appendChild(element1);

			
			<?php 
            use App\Models\About;
			$model = new About();
			$about = $model->findAll();
            foreach($about as $row) : ?>

			var cell12 = row.insertCell(12);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempInChamberUniformityRow"+rowNum;
			element1.style="background-color: yellow;"
			element1.value = inhomoTemp;
			//element1.className="form-control";
			cell12.appendChild(element1);

			var cell13 = row.insertCell(13);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempInChamberInstabilityRow"+rowNum;
			element1.style="background-color: yellow;"
			element1.value = instaTemp;
			//element1.className="form-control";
			cell13.appendChild(element1);
			
			     

			var cell14 = row.insertCell(14);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempInRangeRow"+rowNum;
			//element1.className="form-control";
			cell14.appendChild(element1);

			var cell15 = row.insertCell(15);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempInResGradRow"+rowNum;
			
			//element1.className="form-control";
			cell15.appendChild(element1);

			var cell16 = row.insertCell(16);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempInReadabilityRow"+rowNum;
			if(document.getElementById('typeOfEquipment').value.includes("digital")){
				element1.setAttribute('value','0.5');
			}else if(document.getElementById('typeOfEquipment').value.includes("analog")){
				element1.setAttribute('list','graduationList');
			}
			//element1.className="form-control";
			cell16.appendChild(element1);

			var cell17 = row.insertCell(17);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempInCorrectedRow"+rowNum;
			element1.setAttribute('tabindex','-1');
			//element1.className="form-control";
			cell17.appendChild(element1);
			element1.style="background-color: yellow;"

		

		}

		function addRowOut(tableID, row) {

			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var rowNum = rowCount - row;
			var row = table.insertRow(rowCount);

			console.log("table.rows.length "+table.rows.length);
			rowOfTable = table.rows.length;

			var cell1 = row.insertCell(0);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutUUCTestPointRow"+rowNum;
			//element1.className="form-control";
			element1.setAttribute('onkeyup', "correctionFromCertDisplay('tableTempOutUUCTestPointRow"+rowNum+"','tableTempOutCorrectedRow"+rowNum+"','tableTempOutStandardTrialAverageRow"+rowNum+"','tableTempOutStandardUse"+rowNum+"','tableTempOutConsideringCorrectedRow"+rowNum+"');setResRead(document.getElementById('tableTempOutStandardUse"+rowNum+"').value,'tableTempOutUUCTestPointRow"+rowNum+"','Temperature','tableTempOutRangeRow"+rowNum+"','tableTempOutSTDResRow"+rowNum+"','tableTempOutReadabilityRow"+rowNum+"')");

			cell1.appendChild(element1);

			var valueConsideringCorrection = row.insertCell(1);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutConsideringCorrectedRow"+rowNum;
			element1.style="background-color: yellow;"
			//element1.className="form-control";
			valueConsideringCorrection.appendChild(element1);

			var cell2 = row.insertCell(2);
			var element1 = document.createElement("select");
			var options = document.createElement("option");
				options.innerHTML = 'Choose . . .';
				options.setAttribute('value',weightSplitted[i]);
				element1.appendChild(options);
			for(var i = 0; i<weightSplitted.length;i++){
				var options = document.createElement("option");
				options.innerHTML = weightSplitted[i];
				options.setAttribute('value',weightSplitted[i]);
				element1.appendChild(options);
				
			}			
			element1.id="tableTempOutStandardUse"+rowNum;
			element1.setAttribute('onchange', "setResRead(this.value,'tableTempOutUUCTestPointRow"+rowNum+"','Temperature','tableTempOutRangeRow"+rowNum+"','tableTempOutSTDResRow"+rowNum+"','tableTempOutReadabilityRow"+rowNum+"');correctionFromCertDisplay('tableTempOutUUCTestPointRow"+rowNum+"','tableTempOutCorrectedRow"+rowNum+"','tableTempOutStandardTrialAverageRow"+rowNum+"','tableTempOutStandardUse"+rowNum+"','tableTempOutConsideringCorrectedRow"+rowNum+"')");
			cell2.appendChild(element1);

			var cell3 = row.insertCell(3);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutUUCTrial1Row"+rowNum;
			//element1.className="form-control";
			element1.setAttribute("onkeyup", "average({trial1:'tableTempOutUUCTrial1Row"+rowNum+"',trial2:'tableTempOutUUCTrial2Row"+rowNum+"',trial3:'tableTempOutUUCTrial3Row"+rowNum+"',aver:'tableTempOutUUCTrialAverageRow"+rowNum+"'})");
			cell3.appendChild(element1);



			var cell4 = row.insertCell(4);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutUUCTrial2Row"+rowNum;
			//element1.className="form-control";
			element1.setAttribute("onkeyup", "average({trial1:'tableTempOutUUCTrial1Row"+rowNum+"',trial2:'tableTempOutUUCTrial2Row"+rowNum+"',trial3:'tableTempOutUUCTrial3Row"+rowNum+"',aver:'tableTempOutUUCTrialAverageRow"+rowNum+"'})");
			cell4.appendChild(element1);

			var cell5 = row.insertCell(5);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutUUCTrial3Row"+rowNum;
			//element1.className="form-control";
			element1.setAttribute("onkeyup", "average({trial1:'tableTempOutUUCTrial1Row"+rowNum+"',trial2:'tableTempOutUUCTrial2Row"+rowNum+"',trial3:'tableTempOutUUCTrial3Row"+rowNum+"',aver:'tableTempOutUUCTrialAverageRow"+rowNum+"'})");
			cell5.appendChild(element1);

			var cell6 = row.insertCell(6);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutUUCTrialAverageRow"+rowNum;
			element1.setAttribute("tabindex", "-1");
			//element1.className="form-control";
			element1.style="background-color: yellow;"
			cell6.appendChild(element1);

			var cell7 = row.insertCell(7);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutStandardTrial1Row"+rowNum;
			//element1.className="form-control";
			element1.setAttribute("onkeyup", "average({trial1:'tableTempOutStandardTrial1Row"+rowNum+"',trial2:'tableTempOutStandardTrial2Row"+rowNum+"',trial3:'tableTempOutStandardTrial3Row"+rowNum+"',aver:'tableTempOutStandardTrialAverageRow"+rowNum+"'}); correctionFromCertDisplay('tableTempOutUUCTestPointRow"+rowNum+"','tableTempOutCorrectedRow"+rowNum+"','tableTempOutStandardTrialAverageRow"+rowNum+"','tableTempOutStandardUse"+rowNum+"')");
			cell7.appendChild(element1);

			var cell8 = row.insertCell(8);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutStandardTrial2Row"+rowNum;
			//element1.className="form-control";
			element1.setAttribute("onkeyup", "average({trial1:'tableTempOutStandardTrial1Row"+rowNum+"',trial2:'tableTempOutStandardTrial2Row"+rowNum+"',trial3:'tableTempOutStandardTrial3Row"+rowNum+"',aver:'tableTempOutStandardTrialAverageRow"+rowNum+"'}); correctionFromCertDisplay('tableTempOutUUCTestPointRow"+rowNum+"','tableTempOutCorrectedRow"+rowNum+"','tableTempOutStandardTrialAverageRow"+rowNum+"','tableTempOutStandardUse"+rowNum+"')");
			cell8.appendChild(element1);

			var cell9 = row.insertCell(9);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutStandardTrial3Row"+rowNum;
			//element1.className="form-control";
			element1.setAttribute("onkeyup", "average({trial1:'tableTempOutStandardTrial1Row"+rowNum+"',trial2:'tableTempOutStandardTrial2Row"+rowNum+"',trial3:'tableTempOutStandardTrial3Row"+rowNum+"',aver:'tableTempOutStandardTrialAverageRow"+rowNum+"'}); correctionFromCertDisplay('tableTempOutUUCTestPointRow"+rowNum+"','tableTempOutCorrectedRow"+rowNum+"','tableTempOutStandardTrialAverageRow"+rowNum+"','tableTempOutStandardUse"+rowNum+"')");
			cell9.appendChild(element1);

			var cell10 = row.insertCell(10);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutStandardTrialAverageRow"+rowNum;
			element1.setAttribute("tabindex", "-1");
			element1.style="background-color: yellow;"
			//element1.className="form-control";
			cell10.appendChild(element1);

			var cell11 = row.insertCell(11);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutSTDResRow"+rowNum;
			element1.style="background-color: yellow;"
			//element1.className="form-control";
			cell11.appendChild(element1);

			var cell12 = row.insertCell(12);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutChamberUniformityRow"+rowNum;
			element1.style="background-color: yellow;"
			element1.value = inhomoTemp;
			//element1.className="form-control";
			cell12.appendChild(element1);

			var cell13 = row.insertCell(13);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutChamberInstabilityRow"+rowNum;
			element1.style="background-color: yellow;"
			element1.value = instaTemp;
			//element1.className="form-control";
			cell13.appendChild(element1);

			var cell14 = row.insertCell(14);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutRangeRow"+rowNum;
			//element1.className="form-control";
			cell14.appendChild(element1);

			var cell15 = row.insertCell(15);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutResGradRow"+rowNum;
			//element1.className="form-control";
			cell15.appendChild(element1);

			var cell16 = row.insertCell(16);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutReadabilityRow"+rowNum;
			//element1.className="form-control";
			cell16.appendChild(element1);

			var cell17 = row.insertCell(17);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutCorrectedRow"+rowNum;
			element1.setAttribute('tabindex','-1');
			//element1.className="form-control";
			element1.style="background-color: yellow;"
			cell17.appendChild(element1);

		}

		function addRowRH(tableID, row) {

			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var rowNum = rowCount - row;
			var row = table.insertRow(rowCount);

			console.log("table.rows.length "+table.rows.length);
			rowOfTable = table.rows.length;

			var cell1 = row.insertCell(0);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRHUUCTestPointRow"+rowNum;
			//element1.className="form-control";
			element1.setAttribute('onkeyup', "correctionFromCertRHDisplay('tableRHUUCTestPointRow"+rowNum+"','tableRHCorrectedRow"+rowNum+"','tableRHStandardTrialAverageRow"+rowNum+"','tableRHStandardUse"+rowNum+"','tableRHConsideringCorrectedRow"+rowNum+"');setResRead(document.getElementById('tableRHStandardUse"+rowNum+"').value,'tableRHUUCTestPointRow"+rowNum+"','Relative Humidity','tableRHRangeRow"+rowNum+"','tableRHSTDResRow"+rowNum+"','tableRHReadabilityRow"+rowNum+"')");

			cell1.appendChild(element1);

			var valueConsideringCorrection = row.insertCell(1);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRHConsideringCorrectedRow"+rowNum;
			element1.style="background-color: yellow;"
			//element1.className="form-control";
			valueConsideringCorrection.appendChild(element1);

			var cell2 = row.insertCell(2);
			var element1 = document.createElement("select");
			var options = document.createElement("option");
				options.innerHTML = 'Choose . . .';
				options.setAttribute('value',weightSplitted[i]);
				element1.appendChild(options);
			for(var i = 0; i<weightSplitted.length;i++){
				var options = document.createElement("option");
				options.innerHTML = weightSplitted[i];
				options.setAttribute('value',weightSplitted[i]);
				element1.appendChild(options);
				
			}			
			element1.id="tableRHStandardUse"+rowNum;
			element1.setAttribute('onchange', "setResRead(this.value,'tableRHUUCTestPointRow"+rowNum+"','Relative Humidity','tableRHRangeRow"+rowNum+"','tableRHSTDResRow"+rowNum+"','tableRHReadabilityRow"+rowNum+"');correctionFromCertRHDisplay('tableRHUUCTestPointRow"+rowNum+"','tableRHCorrectedRow"+rowNum+"','tableRHStandardTrialAverageRow"+rowNum+"','tableRHStandardUse"+rowNum+"','tableRHConsideringCorrectedRow"+rowNum+"')");
			cell2.appendChild(element1);

			var cell3 = row.insertCell(3);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRHUUCTrial1Row"+rowNum;
			//element1.className="form-control";
			element1.setAttribute("onkeyup", "average({trial1:'tableRHUUCTrial1Row"+rowNum+"',trial2:'tableRHUUCTrial2Row"+rowNum+"',trial3:'tableRHUUCTrial3Row"+rowNum+"',aver:'tableRHUUCTrialAverageRow"+rowNum+"'})");
			cell3.appendChild(element1);



			var cell4 = row.insertCell(4);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRHUUCTrial2Row"+rowNum;
			//element1.className="form-control";
			element1.setAttribute("onkeyup", "average({trial1:'tableRHUUCTrial1Row"+rowNum+"',trial2:'tableRHUUCTrial2Row"+rowNum+"',trial3:'tableRHUUCTrial3Row"+rowNum+"',aver:'tableRHUUCTrialAverageRow"+rowNum+"'})");
			cell4.appendChild(element1);

			var cell5 = row.insertCell(5);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRHUUCTrial3Row"+rowNum;
			//element1.className="form-control";
			element1.setAttribute("onkeyup", "average({trial1:'tableRHUUCTrial1Row"+rowNum+"',trial2:'tableRHUUCTrial2Row"+rowNum+"',trial3:'tableRHUUCTrial3Row"+rowNum+"',aver:'tableRHUUCTrialAverageRow"+rowNum+"'})");
			cell5.appendChild(element1);

			var cell6 = row.insertCell(6);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRHUUCTrialAverageRow"+rowNum;
			element1.setAttribute("tabindex", "-1");
			element1.style="background-color: yellow;"
			//element1.className="form-control";
			cell6.appendChild(element1);

			var cell7 = row.insertCell(7);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRHStandardTrial1Row"+rowNum;
			//element1.className="form-control";
			element1.setAttribute("onkeyup", "average({trial1:'tableRHStandardTrial1Row"+rowNum+"',trial2:'tableRHStandardTrial2Row"+rowNum+"',trial3:'tableRHStandardTrial3Row"+rowNum+"',aver:'tableRHStandardTrialAverageRow"+rowNum+"'}); correctionFromCertRHDisplay('tableRHUUCTestPointRow"+rowNum+"','tableRHCorrectedRow"+rowNum+"','tableRHStandardTrialAverageRow"+rowNum+"','tableRHStandardUse"+rowNum+"')");
			cell7.appendChild(element1);

			var cell8 = row.insertCell(8);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRHStandardTrial2Row"+rowNum;
			//element1.className="form-control";
			element1.setAttribute("onkeyup", "average({trial1:'tableRHStandardTrial1Row"+rowNum+"',trial2:'tableRHStandardTrial2Row"+rowNum+"',trial3:'tableRHStandardTrial3Row"+rowNum+"',aver:'tableRHStandardTrialAverageRow"+rowNum+"'}); correctionFromCertRHDisplay('tableRHUUCTestPointRow"+rowNum+"','tableRHCorrectedRow"+rowNum+"','tableRHStandardTrialAverageRow"+rowNum+"','tableRHStandardUse"+rowNum+"')");
			cell8.appendChild(element1);

			var cell9 = row.insertCell(9);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRHStandardTrial3Row"+rowNum;
			//element1.className="form-control";
			element1.setAttribute("onkeyup", "average({trial1:'tableRHStandardTrial1Row"+rowNum+"',trial2:'tableRHStandardTrial2Row"+rowNum+"',trial3:'tableRHStandardTrial3Row"+rowNum+"',aver:'tableRHStandardTrialAverageRow"+rowNum+"'}); correctionFromCertRHDisplay('tableRHUUCTestPointRow"+rowNum+"','tableRHCorrectedRow"+rowNum+"','tableRHStandardTrialAverageRow"+rowNum+"','tableRHStandardUse"+rowNum+"')");
			cell9.appendChild(element1);

			var cell10 = row.insertCell(10);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRHStandardTrialAverageRow"+rowNum;
			element1.setAttribute("tabindex", "-1");
			element1.style="background-color: yellow;"
			//element1.className="form-control";
			cell10.appendChild(element1);

			var cell11 = row.insertCell(11);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRHSTDResRow"+rowNum;
			element1.style="background-color: yellow;"
			//element1.className="form-control";
			cell11.appendChild(element1);

			var cell12 = row.insertCell(12);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRHChamberUniformityRow"+rowNum;
			element1.style="background-color: yellow;"
			element1.value = inhomoRH;
			//element1.className="form-control";
			cell12.appendChild(element1);

			var cell13 = row.insertCell(13);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRHChamberInstabilityRow"+rowNum;
			element1.style="background-color: yellow;"
			element1.value = instaRH;
			//element1.className="form-control";
			cell13.appendChild(element1);

			var cell14 = row.insertCell(14);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRHRangeRow"+rowNum;
			//element1.className="form-control";
			cell14.appendChild(element1);

			var cell15 = row.insertCell(15);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRHResGradRow"+rowNum;
			//element1.className="form-control";
			cell15.appendChild(element1);

			var cell16 = row.insertCell(16);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRHReadabilityRow"+rowNum;
			//element1.className="form-control";
			cell16.appendChild(element1);

			var cell17 = row.insertCell(17);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRHCorrectedRow"+rowNum;
			element1.setAttribute('tabindex','-1');
			//element1.className="form-control";
			element1.style="background-color: yellow;"
			cell17.appendChild(element1);



		}

		function addRowRNOut(tableID, row) {

			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var rowNum = rowCount - row;
			var row = table.insertRow(rowCount);

			console.log("table.rows.length "+table.rows.length);
			rowOfTable = table.rows.length;

			var cell1 = row.insertCell(0);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutUUCTestPointRow"+rowNum;
			//element1.className="form-control";
			element1.setAttribute('onkeyup', "correctionFromCertRHDisplay('tableRNOutUUCTestPointRow"+rowNum+"','tableRNOutCorrectedRow"+rowNum+"','tableRNOutStandardTrialAverageRow"+rowNum+"','tableRNOutStandardUse"+rowNum+"','tableRNOutConsideringCorrectedRow"+rowNum+"');setResRead(document.getElementById('tableRNOutStandardUse"+rowNum+"').value,'tableRNOutUUCTestPointRow"+rowNum+"','Relative Humidity','tableRNOutRangeRow"+rowNum+"','tableRNOutSTDResRow"+rowNum+"','tableRNOutReadabilityRow"+rowNum+"')");

			cell1.appendChild(element1);

			var valueConsideringCorrection = row.insertCell(1);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutConsideringCorrectedRow"+rowNum;
			element1.style="background-color: yellow;"
			//element1.className="form-control";
			valueConsideringCorrection.appendChild(element1);
 

			var cell2 = row.insertCell(2);
			var element1 = document.createElement("select");
			var options = document.createElement("option");
				options.innerHTML = 'Choose . . .';
				options.setAttribute('value',weightSplitted[i]);
				element1.appendChild(options);
			for(var i = 0; i<weightSplitted.length;i++){
				var options = document.createElement("option");
				options.innerHTML = weightSplitted[i];
				console.log(weightSplitted);
				console.log(weightSplitted[i]);
				options.setAttribute('value',weightSplitted[i]);
				element1.appendChild(options);
				
				
			}			
			element1.id="tableRNOutStandardUse"+rowNum;
			element1.setAttribute('onchange', "setResRead(this.value,'tableRNOutUUCTestPointRow"+rowNum+"','Relative Humidity','tableRNOutRangeRow"+rowNum+"','tableRNOutSTDResRow"+rowNum+"','tableRNOutReadabilityRow"+rowNum+"');correctionFromCertRHDisplay('tableRNOutUUCTestPointRow"+rowNum+"','tableRNOutCorrectedRow"+rowNum+"','tableRNOutStandardTrialAverageRow"+rowNum+"','tableRNOutStandardUse"+rowNum+"','tableRNOutConsideringCorrectedRow"+rowNum+"')");
			cell2.appendChild(element1);

			var cell3 = row.insertCell(3);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutUUCTrial1Row"+rowNum;
			//element1.className="form-control";
			element1.setAttribute("onkeyup", "average({trial1:'tableRNOutUUCTrial1Row"+rowNum+"',trial2:'tableRNOutUUCTrial2Row"+rowNum+"',trial3:'tableRNOutUUCTrial3Row"+rowNum+"',aver:'tableRNOutUUCTrialAverageRow"+rowNum+"'})");
			cell3.appendChild(element1);



			var cell4 = row.insertCell(4);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutUUCTrial2Row"+rowNum;
			//element1.className="form-control";
			element1.setAttribute("onkeyup", "average({trial1:'tableRNOutUUCTrial1Row"+rowNum+"',trial2:'tableRNOutUUCTrial2Row"+rowNum+"',trial3:'tableRNOutUUCTrial3Row"+rowNum+"',aver:'tableRNOutUUCTrialAverageRow"+rowNum+"'})");
			cell4.appendChild(element1);

			var cell5 = row.insertCell(5);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutUUCTrial3Row"+rowNum;
			//element1.className="form-control";
			element1.setAttribute("onkeyup", "average({trial1:'tableRNOutUUCTrial1Row"+rowNum+"',trial2:'tableRNOutUUCTrial2Row"+rowNum+"',trial3:'tableRNOutUUCTrial3Row"+rowNum+"',aver:'tableRNOutUUCTrialAverageRow"+rowNum+"'})");
			cell5.appendChild(element1);

			var cell6 = row.insertCell(6);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutUUCTrialAverageRow"+rowNum;
			element1.style="background-color: yellow;"
			element1.setAttribute("tabindex", "-1");
			//element1.className="form-control";
			cell6.appendChild(element1);

			var cell7 = row.insertCell(7);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutStandardTrial1Row"+rowNum;
			//element1.className="form-control";
			element1.setAttribute("onkeyup", "average({trial1:'tableRNOutStandardTrial1Row"+rowNum+"',trial2:'tableRNOutStandardTrial2Row"+rowNum+"',trial3:'tableRNOutStandardTrial3Row"+rowNum+"',aver:'tableRNOutStandardTrialAverageRow"+rowNum+"'}); correctionFromCertRHDisplay('tableRNOutUUCTestPointRow"+rowNum+"','tableRNOutCorrectedRow"+rowNum+"','tableRNOutStandardTrialAverageRow"+rowNum+"','tableRNOutStandardUse"+rowNum+"')");
			cell7.appendChild(element1);

			var cell8 = row.insertCell(8);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutStandardTrial2Row"+rowNum;
			//element1.className="form-control";
			element1.setAttribute("onkeyup", "average({trial1:'tableRNOutStandardTrial1Row"+rowNum+"',trial2:'tableRNOutStandardTrial2Row"+rowNum+"',trial3:'tableRNOutStandardTrial3Row"+rowNum+"',aver:'tableRNOutStandardTrialAverageRow"+rowNum+"'}); correctionFromCertRHDisplay('tableRNOutUUCTestPointRow"+rowNum+"','tableRNOutCorrectedRow"+rowNum+"','tableRNOutStandardTrialAverageRow"+rowNum+"','tableRNOutStandardUse"+rowNum+"')");
			cell8.appendChild(element1);

			var cell9 = row.insertCell(9);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutStandardTrial3Row"+rowNum;
			//element1.className="form-control";
			element1.setAttribute("onkeyup", "average({trial1:'tableRNOutStandardTrial1Row"+rowNum+"',trial2:'tableRNOutStandardTrial2Row"+rowNum+"',trial3:'tableRNOutStandardTrial3Row"+rowNum+"',aver:'tableRNOutStandardTrialAverageRow"+rowNum+"'}); correctionFromCertRHDisplay('tableRNOutUUCTestPointRow"+rowNum+"','tableRNOutCorrectedRow"+rowNum+"','tableRNOutStandardTrialAverageRow"+rowNum+"','tableRNOutStandardUse"+rowNum+"')");
			cell9.appendChild(element1);

			var cell10 = row.insertCell(10);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutStandardTrialAverageRow"+rowNum;
			element1.style="background-color: yellow;"
			element1.setAttribute("tabindex", "-1");
			//element1.className="form-control";
			cell10.appendChild(element1);

			var cell11 = row.insertCell(11);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutSTDResRow"+rowNum;
			element1.style="background-color: yellow;"
			//element1.className="form-control";
			cell11.appendChild(element1);

			var cell12 = row.insertCell(12);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutChamberUniformityRow"+rowNum;
			element1.value = inhomoRH;
			element1.style="background-color: yellow;"
			//element1.className="form-control";
			cell12.appendChild(element1);

			var cell13 = row.insertCell(13);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutChamberInstabilityRow"+rowNum;
			element1.value = instaRH;
			element1.style="background-color: yellow;"
			//element1.className="form-control";
			cell13.appendChild(element1);

			var cell14 = row.insertCell(14);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutRangeRow"+rowNum;
			//element1.className="form-control";
			cell14.appendChild(element1);

			var cell15 = row.insertCell(15);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutResGradRow"+rowNum;
			//element1.className="form-control";
			cell15.appendChild(element1);

			var cell16 = row.insertCell(16);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutReadabilityRow"+rowNum;
			//element1.className="form-control";
			cell16.appendChild(element1);

			var cell17 = row.insertCell(17);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutCorrectedRow"+rowNum;
			element1.setAttribute('tabindex','-1');
			//element1.className="form-control";
			element1.style="background-color: yellow;"
			cell17.appendChild(element1);

			<?php endforeach; 
                        ?>

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

		function inputToArrayTempIn(tableID,tableHiddenInput,buttonId){
			var arrTempIn = [];
			function correctionFromCertCondition(serialNum){	
				var arrayofTemp = [];
				var sortedArrayofTemp = [];
				for(x=0;x<ArrayOfStandardOriginal[0].length;x++){
					if (ArrayOfStandardOriginal[0][x].serialNumber == serialNum) {
						if (ArrayOfStandardOriginal[0][x].unit == "Temperature") {
							arrayofTemp.push({
								TP:	ArrayOfStandardOriginal[0][x].testPoint,
								Corr : ArrayOfStandardOriginal[0][x].correction
							});
						}
					}
				};
				sortedArrayofTemp = arrayofTemp.sort(function(a, b){return a.TP - b.TP});
				return sortedArrayofTemp;
			}	
			var driftArrayFiltered = [];
			var computerdDriftArray = [];
			var rowOfTable = document.getElementById(tableID).rows.length - 3;
			
			console.log('sortedArray ', sortedArray)
			var isPRT = <?=$PRT?>;

			function slopeFormula(driftArray, searchingFor){
				if(isPRT == 0){
					var UnfilteredArray = driftArray;
					var arrayOfTestPoint = [];
					
					for (let index = 0; index < UnfilteredArray.length; index++) {
						var arr= [];
						var arrDateValue = [];
						var arrTestValue = [];

						let filteredDATA = UnfilteredArray.filter(function (e) {
							return e.testPoint == UnfilteredArray[index].testPoint;
						});

						for(x=0;x<filteredDATA.length;x++){
							arrDateValue.push(filteredDATA[x].dateValue);
							arrTestValue.push(parseFloat(filteredDATA[x].testValue));
						}
						
						var perday = formulajs.SLOPE(arrTestValue, arrDateValue);
						var peryear = (formulajs.SLOPE(arrTestValue, arrDateValue)*365.25);
						var roundedperYear = formulajs.ROUNDUP(peryear, 3);
						arrayOfTestPoint.push(Math.abs(roundedperYear));
					}
					
					return Math.max(...arrayOfTestPoint)
				}else{
					var UnfilteredArray = driftArray;
					var driftPRTArray = [];
					var largest= 0;
					for(var i = 0; i < UnfilteredArray.length; i++){
						driftPRTArray.push(UnfilteredArray[i]['drift'])
					}
					for (i=0; i<driftPRTArray.length;i++){
						if (driftPRTArray[i]>largest) {
							var largest=driftPRTArray[i];
						}
					}
					console.log('driftPRTArray',Math.max(driftPRTArray));
					console.log('driftPRTArray',driftPRTArray);
					console.log('largest',largest);
					return largest;
				}
			}
					

			for (let index = 1; index <= rowOfTable; index++) {
				var sortedArray = correctionFromCertCondition(document.getElementById('tableTempInStandardUse'+(index)).value);
				if(!checkIfPRT(document.getElementById('tableTempInStandardUse'+(index)).value)){
					isPRT = 0;
					for(x=0;x<driftArray[0].length;x++){
						if (driftArray[0][x].serialNumber == document.getElementById('tableTempInStandardUse'+(index)).value) {
							if (driftArray[0][x].unit == 'Air Temperature') {
								driftArrayFiltered.push({
									dateCalibrated: driftArray[0][x].dateCalibrated,
									dateValue: formulajs.DATEVALUE(driftArray[0][x].dateCalibrated),
									testPoint:	driftArray[0][x].testPoint,
									testValue:	driftArray[0][x].testPointValue,
								});
							}
						}
					};
				}else{
					isPRT = 1;
					for(x=0;x<driftArrayPRT[0].length;x++){
						if (driftArrayPRT[0][x].serialNumber ==  document.getElementById('tableTempInStandardUse'+(index)).value) {
							driftArrayFiltered.push({
								testPoint: driftArrayPRT[0][x].testPoint,
								previousTest: driftArrayPRT[0][x].previousTest,
								currentTest:	driftArrayPRT[0][x].currentTest,
								drift:	driftArrayPRT[0][x].drift,
							});
						}
					};
				}	
			

				// console.log('tableTempInUUCTestPointRow'+(index), "Index " +index, "rowOfTable "+rowOfTable);
				console.log(search(document.getElementById('tableTempInUUCTestPointRow'+(index)).value,sortedArray))
				 if(search(document.getElementById('tableTempInUUCTestPointRow'+(index)).value,sortedArray)){
				 	var correction = correctionFromCert(document.getElementById('tableTempInUUCTestPointRow'+(index)).value,document.getElementById('tableTempInStandardUse'+(index)));
				 }
				 else {
				 	var correction = interpolationCorr(document.getElementById('tableTempInUUCTestPointRow'+(index)).value,document.getElementById('tableTempInStandardUse'+(index)).value,);
				}
				// console.log('',document.getElementById('tableTempInUUCTestPointRow'+(index)).value)
				var combinedUncer = combinedUncertainty({
					i:UncUUCResolution('TempIn',index),
					o:UncUUCRepeatability(standardDev({trial1:'tableTempInUUCTrial1Row'+(index),trial2:'tableTempInUUCTrial2Row'+(index),trial3:'tableTempInUUCTrial3Row'+(index)})),
					z:UncStandardReadout(parseFloat(readoutStandardUncertaintyFromCertificateGetMax(document.getElementById('tableTempInStandardUse'+(index)).value))),
					ac:UncDrift(slopeFormula(driftArrayFiltered,document.getElementById('tableTempInUUCTestPointRow'+(index)).value)),
					ae:UncSTDResolution(parseFloat(document.getElementById('tableTempInSTDResRow'+(index)).value)),
					ag:UncChamberUniformity(parseFloat(document.getElementById('tableTempInChamberUniformityRow'+(index)).value)),
					ah:hysteresis({
						uucReadingAve1:parseFloat(document.getElementById('tableTempInUUCTrialAverageRow1').value),
						uucReadingAve2:parseFloat(document.getElementById('tableTempInUUCTrialAverageRow'+rowOfTable).value),
						correctedValue1:correctedValue({
							standardReadingAve:parseFloat(document.getElementById('tableTempInStandardTrialAverageRow1').value), 
							correctionFromCertificate:parseFloat(correctionFromCert(document.getElementById('tableTempInUUCTestPointRow1').value,document.getElementById('tableTempInStandardUse'+(index))))
						}),
						correctedValue2:correctedValue({
							standardReadingAve:parseFloat(document.getElementById('tableTempInStandardTrialAverageRow'+rowOfTable).value), 
							correctionFromCertificate:parseFloat(correctionFromCert(document.getElementById('tableTempInUUCTestPointRow'+rowOfTable).value,document.getElementById('tableTempInStandardUse'+(index))))
						})
					}),
					aa:UncStandardPRT(parseFloat(PRTStandardUncertaintyFromCertificateGetMax('Temperature',document.getElementById('tableTempInStandardUse'+(index)).value))),
					w:UncStandardRepeatability(
						standardDev({
							trial1:'tableTempInStandardTrial1Row'+(index),
							trial2:'tableTempInStandardTrial2Row'+(index),
							trial3:'tableTempInStandardTrial3Row'+(index)
						})
						),
					ai:	UncChamberInstability(parseFloat(document.getElementById('tableTempInChamberInstabilityRow'+(index)).value)),
				});

				var CalculateDOF = DOF({
					i:UncUUCResolution('TempIn',index),
					o:UncUUCRepeatability(standardDev({trial1:'tableTempInUUCTrial1Row'+(index),trial2:'tableTempInUUCTrial2Row'+(index),trial3:'tableTempInUUCTrial3Row'+(index)})),
					z:UncStandardReadout(parseFloat(readoutStandardUncertaintyFromCertificateGetMax(document.getElementById('tableTempInStandardUse'+(index)).value))),
					ac:UncDrift(slopeFormula(driftArrayFiltered,document.getElementById('tableTempInUUCTestPointRow'+(index)).value)),
					ae:UncSTDResolution(parseFloat(document.getElementById('tableTempInSTDResRow'+(index)).value)),
					ag:UncChamberUniformity(parseFloat(document.getElementById('tableTempInChamberUniformityRow'+(index)).value)),
					ah:hysteresis({
						uucReadingAve1:parseFloat(document.getElementById('tableTempInUUCTrialAverageRow1').value),
						uucReadingAve2:parseFloat(document.getElementById('tableTempInUUCTrialAverageRow'+rowOfTable).value),
						correctedValue1:correctedValue({
							standardReadingAve:parseFloat(document.getElementById('tableTempInStandardTrialAverageRow1').value), 
							correctionFromCertificate:parseFloat(correctionFromCert(document.getElementById('tableTempInUUCTestPointRow1').value,document.getElementById('tableTempInStandardUse'+(index))))
						}),
						correctedValue2:correctedValue({
							standardReadingAve:parseFloat(document.getElementById('tableTempInStandardTrialAverageRow'+rowOfTable).value), 
							correctionFromCertificate:parseFloat(correctionFromCert(document.getElementById('tableTempInUUCTestPointRow'+rowOfTable).value,document.getElementById('tableTempInStandardUse'+(index))))
						})
					}),
					aa:UncStandardPRT(parseFloat(PRTStandardUncertaintyFromCertificateGetMax('Temperature',document.getElementById('tableTempInStandardUse'+(index)).value))),
					w:UncStandardRepeatability(
						standardDev({
							trial1:'tableTempInStandardTrial1Row'+(index),
							trial2:'tableTempInStandardTrial2Row'+(index),
							trial3:'tableTempInStandardTrial3Row'+(index)
						})
					),
					aj:combinedUncer,
					ai:UncChamberInstability(parseFloat(document.getElementById('tableTempInChamberInstabilityRow'+(index)).value)),
				});

				var calculatedK = calculateK(parseFloat(CalculateDOF));
				
				arrTempIn.push({
				 	key:index,
				 	id:document.getElementById('tableTempInUUCTestPointRow'+(index)).value,
					standardUsed:document.getElementById('tableTempInStandardUse'+(index)).value,
					rangeUsed:document.getElementById('tableTempInRangeRow'+(index)).value,
					resUsed:document.getElementById('tableTempInResGradRow'+(index)).value,
					readUsed:document.getElementById('tableTempInReadabilityRow'+(index)).value,
				 	UUCtrial1:document.getElementById('tableTempInUUCTrial1Row'+(index)).value,
				 	UUCtrial2:document.getElementById('tableTempInUUCTrial2Row'+(index)).value,
				 	UUCtrial3:document.getElementById('tableTempInUUCTrial3Row'+(index)).value,	
				 	UUCtrialAverage:document.getElementById('tableTempInUUCTrialAverageRow'+(index)).value,
				 	Standardtrial1:document.getElementById('tableTempInStandardTrial1Row'+(index)).value,
				 	Standardtrial2:document.getElementById('tableTempInStandardTrial2Row'+(index)).value,
				 	Standardtrial3:document.getElementById('tableTempInStandardTrial3Row'+(index)).value,
				 	StandardtrialAverage:document.getElementById('tableTempInStandardTrialAverageRow'+(index)).value,
					UUCStandardDev:standardDev({trial1:'tableTempInUUCTrial1Row'+(index),trial2:'tableTempInUUCTrial2Row'+(index),trial3:'tableTempInUUCTrial3Row'+(index)}),
					StandardStandardDev:standardDev({trial1:'tableTempInStandardTrial1Row'+(index),trial2:'tableTempInStandardTrial2Row'+(index),trial3:'tableTempInStandardTrial3Row'+(index)}),
					UncUUCResolution:UncUUCResolution('TempIn',index),
					UncUUCRepeatability:UncUUCRepeatability(standardDev({trial1:'tableTempInUUCTrial1Row'+(index),trial2:'tableTempInUUCTrial2Row'+(index),trial3:'tableTempInUUCTrial3Row'+(index)})),
					UncStandardRepeatability:UncStandardRepeatability(standardDev({trial1:'tableTempInStandardTrial1Row'+(index),trial2:'tableTempInStandardTrial2Row'+(index),trial3:'tableTempInStandardTrial3Row'+(index)})),
					ReadoutStandardUncertainty:readoutStandardUncertaintyFromCertificateGetMax(document.getElementById('tableTempInStandardUse'+(index)).value),
					PRTStandardUncertaintyFromCertificate:PRTStandardUncertaintyFromCertificateGetMax('Temperature',document.getElementById('tableTempInStandardUse'+(index)).value),
					CorrectionFromCertificate:correction,
					CalculatedValueConsideringCorrection:calculatedValueConsideringCorrection(document.getElementById('tableTempInUUCTestPointRow'+(index)).value,correction),
					CorrectedValue:correctedValue({standardReadingAve:parseFloat(document.getElementById('tableTempInStandardTrialAverageRow'+(index)).value), correctionFromCertificate:parseFloat(correction)}),
					UncDueToStandardReadout:UncStandardReadout(parseFloat(readoutStandardUncertaintyFromCertificateGetMax(document.getElementById('tableTempInStandardUse'+(index)).value))),
					UncStandardPRT:UncStandardPRT(parseFloat(PRTStandardUncertaintyFromCertificateGetMax('Temperature',document.getElementById('tableTempInStandardUse'+(index)).value))),
					Drift:slopeFormula(driftArrayFiltered,document.getElementById('tableTempInUUCTestPointRow'+(index)).value),
					UncDueToDrift:UncDrift(slopeFormula(driftArrayFiltered,document.getElementById('tableTempInUUCTestPointRow'+(index)).value)),
					STDRes:document.getElementById('tableTempInSTDResRow'+(index)).value,
					UncDueToSTDRes:UncSTDResolution(parseFloat(document.getElementById('tableTempInSTDResRow'+(index)).value)),
					ChamberUniformity:document.getElementById('tableTempInChamberUniformityRow'+(index)).value,
					ChanmberInstability:document.getElementById('tableTempInChamberInstabilityRow'+(index)).value,
					UncDueToChamberUniformity:UncChamberUniformity(parseFloat(document.getElementById('tableTempInChamberUniformityRow'+(index)).value)),
					UncDueToChamberInstability:UncChamberInstability(parseFloat(document.getElementById('tableTempInChamberInstabilityRow'+(index)).value)),
					Hysteresis:hysteresis({uucReadingAve1:parseFloat(document.getElementById('tableTempInUUCTrialAverageRow1').value),uucReadingAve2:parseFloat(document.getElementById('tableTempInUUCTrialAverageRow'+rowOfTable).value),
						correctedValue1:correctedValue({
							standardReadingAve:parseFloat(document.getElementById('tableTempInStandardTrialAverageRow1').value), 
							correctionFromCertificate:parseFloat(correctionFromCert(document.getElementById('tableTempInUUCTestPointRow1').value,document.getElementById('tableTempInStandardUse'+(index))))
						}),
							correctedValue2:correctedValue({
								standardReadingAve:parseFloat(document.getElementById('tableTempInStandardTrialAverageRow'+rowOfTable).value), 
								correctionFromCertificate:parseFloat(correctionFromCert(document.getElementById('tableTempInUUCTestPointRow'+rowOfTable).value,document.getElementById('tableTempInStandardUse'+(index)))
								)
							})
						}),
					CombinedUncertainty:combinedUncer,
					DOF:CalculateDOF,
					ExpandedUncertainty:expandedUncertainty(combinedUncer,calculatedK),
					K:calculatedK,
					unit:"Temperature In"
					});
			}
			console.log("arrTempIn ",arrTempIn);
			arr2 = btoa(JSON.stringify(arrTempIn));
			document.getElementById(tableHiddenInput).value = JSON.stringify(arrTempIn);
			document.getElementById(buttonId).disabled = true;
			var butttonText =  '<a type="button" class="btn btn-link" onclick="cancelDisabledButton(\'tempInAddToArrayText\',\''+buttonId+'\')">here</a>';
			document.getElementById('tempInAddToArrayText').innerHTML = 'Calculated and added to array click'+ butttonText +' to cancel';

		}

		function inputToArrayTempOut(tableID,tableHiddenInput,buttonId){
			var arrTempOut = [];
				function correctionFromCertCondition(serialNum){	
					var arrayofTemp = [];
					var sortedArrayofTemp = [];
					for(x=0;x<ArrayOfStandardOriginal[0].length;x++){
						if (ArrayOfStandardOriginal[0][x].serialNumber == serialNum) {
							if (ArrayOfStandardOriginal[0][x].unit == "Temperature") {
								arrayofTemp.push({
									TP:	ArrayOfStandardOriginal[0][x].testPoint,
									Corr : ArrayOfStandardOriginal[0][x].correction
								});
							}
						}
					};
					sortedArrayofTemp = arrayofTemp.sort(function(a, b){return a.TP - b.TP});
					return sortedArrayofTemp;
				}	
				var driftArrayFiltered = [];
				var computerdDriftArray = [];
				var rowOfTable = document.getElementById(tableID).rows.length - 3;
				
				var isPRT = <?=$PRT?>;

				for (let index = 1; index <= rowOfTable; index++) {
				function slopeFormula(driftArray, searchingFor){
					if(!checkIfPRT(document.getElementById('tableTempOutStandardUse'+(index)).value)){
						/* OLD METHOD DRIFT IS PER TEST POINT
							var UnfilteredArray = driftArray;
							var arr= [];
							var arrDateValue = [];
							var arrTestValue = [];

							let filteredDATA = UnfilteredArray.filter(function (e) {
						
								if (searchingFor == searchingFor) {
									return e.testPoint == searchingFor;
								}
							
							});

							for(x=0;x<filteredDATA.length;x++){
								arrDateValue.push(filteredDATA[x].dateValue);
								arrTestValue.push(parseFloat(filteredDATA[x].testValue));
							}
							
							var perday = formulajs.SLOPE(arrTestValue, arrDateValue);
							var peryear = (formulajs.SLOPE(arrTestValue, arrDateValue)*365.25);
							var roundedperYear = formulajs.ROUNDUP(peryear, 3);

							return Math.abs(roundedperYear) 
						*/
						var UnfilteredArray = driftArray;
						var arrayOfTestPoint = [];
						
						for (let index = 0; index < UnfilteredArray.length; index++) {
							var arr= [];
							var arrDateValue = [];
							var arrTestValue = [];

							let filteredDATA = UnfilteredArray.filter(function (e) {
								return e.testPoint == UnfilteredArray[index].testPoint;
							});

							for(x=0;x<filteredDATA.length;x++){
								arrDateValue.push(filteredDATA[x].dateValue);
								arrTestValue.push(parseFloat(filteredDATA[x].testValue));
							}
							
							var perday = formulajs.SLOPE(arrTestValue, arrDateValue);
							var peryear = (formulajs.SLOPE(arrTestValue, arrDateValue)*365.25);
							var roundedperYear = formulajs.ROUNDUP(peryear, 3);
							arrayOfTestPoint.push(Math.abs(roundedperYear));
						}
						
						return Math.max(...arrayOfTestPoint)
						
					}else{
						var UnfilteredArray = driftArray;
						var driftPRTArray = [];
						var largest= 0;
						for(var i = 0; i < UnfilteredArray.length; i++){
							driftPRTArray.push(UnfilteredArray[i]['drift'])
						}
						for (i=0; i<driftPRTArray.length;i++){
							if (driftPRTArray[i]>largest) {
								var largest=driftPRTArray[i];
							}
						}
						console.log('driftPRTArray',Math.max(driftPRTArray));
						console.log('driftPRTArray',driftPRTArray);
						console.log('largest',largest);
						return largest;
					}
				}
				var sortedArray = correctionFromCertCondition(document.getElementById('tableTempOutStandardUse'+(index)).value);
				if(!checkIfPRT(document.getElementById('tableTempOutStandardUse'+(index)).value)){
					for(x=0;x<driftArray[0].length;x++){
						if (driftArray[0][x].serialNumber == document.getElementById('tableTempOutStandardUse'+(index)).value) {
							if (driftArray[0][x].unit == 'Air Temperature') {
								driftArrayFiltered.push({
									dateCalibrated: driftArray[0][x].dateCalibrated,
									dateValue: formulajs.DATEVALUE(driftArray[0][x].dateCalibrated),
									testPoint:	driftArray[0][x].testPoint,
									testValue:	driftArray[0][x].testPointValue,
								});
							}
						}
					};
				}else{
					for(x=0;x<driftArrayPRT[0].length;x++){
						if (driftArrayPRT[0][x].serialNumber == document.getElementById('tableTempOutStandardUse'+(index)).value) {
							driftArrayFiltered.push({
								testPoint: driftArrayPRT[0][x].testPoint,
								previousTest: driftArrayPRT[0][x].previousTest,
								currentTest:	driftArrayPRT[0][x].currentTest,
								drift:	driftArrayPRT[0][x].drift,
							});
						}
					};
				}
				// console.log('tableTempOutUUCTestPointRow'+(index), "Index " +index, "rowOfTable "+rowOfTable);
				console.log(search(document.getElementById('tableTempOutUUCTestPointRow'+(index)).value,sortedArray))
				 if(search(document.getElementById('tableTempOutUUCTestPointRow'+(index)).value,sortedArray)){
					var correction = correctionFromCert(document.getElementById('tableTempOutUUCTestPointRow'+(index)).value,document.getElementById('tableTempOutStandardUse'+(index)));
				 }
				 else {
					var correction = interpolationCorr(document.getElementById('tableTempOutUUCTestPointRow'+(index)).value,document.getElementById('tableTempOutStandardUse'+(index)).value,);

				}
				// console.log('',document.getElementById('tableTempOutUUCTestPointRow'+(index)).value)


				var combinedUncer = combinedUncertainty({
					i:UncUUCResolution('TempOut',index),
					o:UncUUCRepeatability(standardDev({trial1:'tableTempOutUUCTrial1Row'+(index),trial2:'tableTempOutUUCTrial2Row'+(index),trial3:'tableTempOutUUCTrial3Row'+(index)})),
					z:UncStandardReadout(parseFloat(readoutStandardUncertaintyFromCertificateGetMax(document.getElementById('tableTempOutStandardUse'+(index)).value))),
					ac:UncDrift(slopeFormula(driftArrayFiltered,document.getElementById('tableTempOutUUCTestPointRow'+(index)).value)),
					ae:UncSTDResolution(parseFloat(document.getElementById('tableTempOutSTDResRow'+(index)).value)),
					ag:UncChamberUniformity(parseFloat(document.getElementById('tableTempOutChamberUniformityRow'+(index)).value)),
					ah:hysteresis({
						uucReadingAve1:parseFloat(document.getElementById('tableTempOutUUCTrialAverageRow1').value),
						uucReadingAve2:parseFloat(document.getElementById('tableTempOutUUCTrialAverageRow'+rowOfTable).value),
						correctedValue1:correctedValue({
							standardReadingAve:parseFloat(document.getElementById('tableTempOutStandardTrialAverageRow1').value), 
							correctionFromCertificate:parseFloat(correctionFromCert(document.getElementById('tableTempOutUUCTestPointRow1').value,document.getElementById('tableTempOutStandardUse'+(index)),document.getElementById('tableTempOutStandardUse'+(index)).value))
						}),
						correctedValue2:correctedValue({
							standardReadingAve:parseFloat(document.getElementById('tableTempOutStandardTrialAverageRow'+rowOfTable).value), 
							correctionFromCertificate:parseFloat(correctionFromCert(document.getElementById('tableTempOutUUCTestPointRow'+rowOfTable).value,document.getElementById('tableTempOutStandardUse'+(index)),document.getElementById('tableTempOutStandardUse'+(index)).value))
						})
					}),
					aa:UncStandardPRT(parseFloat(PRTStandardUncertaintyFromCertificateGetMax('Temperature', document.getElementById('tableTempOutStandardUse'+(index)).value))),
					w:UncStandardRepeatability(
						standardDev({
							trial1:'tableTempOutStandardTrial1Row'+(index),
							trial2:'tableTempOutStandardTrial2Row'+(index),
							trial3:'tableTempOutStandardTrial3Row'+(index)
						})
						),
					ai:	UncChamberInstability(parseFloat(document.getElementById('tableTempOutChamberInstabilityRow'+(index)).value)),
				});

				var CalculateDOF = DOF({
					i:UncUUCResolution('TempOut',index),
					o:UncUUCRepeatability(standardDev({trial1:'tableTempOutUUCTrial1Row'+(index),trial2:'tableTempOutUUCTrial2Row'+(index),trial3:'tableTempOutUUCTrial3Row'+(index)})),
					z:UncStandardReadout(parseFloat(readoutStandardUncertaintyFromCertificateGetMax(document.getElementById('tableTempOutStandardUse'+(index)).value))),
					ac:UncDrift(slopeFormula(driftArrayFiltered,document.getElementById('tableTempOutUUCTestPointRow'+(index)).value)),
					ae:UncSTDResolution(parseFloat(document.getElementById('tableTempOutSTDResRow'+(index)).value)),
					ag:UncChamberUniformity(parseFloat(document.getElementById('tableTempOutChamberUniformityRow'+(index)).value)),
					ah:hysteresis({
						uucReadingAve1:parseFloat(document.getElementById('tableTempOutUUCTrialAverageRow1').value),
						uucReadingAve2:parseFloat(document.getElementById('tableTempOutUUCTrialAverageRow'+rowOfTable).value),
						correctedValue1:correctedValue({
							standardReadingAve:parseFloat(document.getElementById('tableTempOutStandardTrialAverageRow1').value), 
							correctionFromCertificate:parseFloat(correctionFromCert(document.getElementById('tableTempOutUUCTestPointRow1').value,document.getElementById('tableTempOutStandardUse'+(index)),document.getElementById('tableTempOutStandardUse'+(index)).value))
						}),
						correctedValue2:correctedValue({
							standardReadingAve:parseFloat(document.getElementById('tableTempOutStandardTrialAverageRow'+rowOfTable).value), 
							correctionFromCertificate:parseFloat(correctionFromCert(document.getElementById('tableTempOutUUCTestPointRow'+rowOfTable).value,document.getElementById('tableTempOutStandardUse'+(index)),document.getElementById('tableTempOutStandardUse'+(index)).value))
						})
					}),
					aa:UncStandardPRT(parseFloat(PRTStandardUncertaintyFromCertificateGetMax('Temperature', document.getElementById('tableTempOutStandardUse'+(index)).value))),
					w:UncStandardRepeatability(
						standardDev({
							trial1:'tableTempOutStandardTrial1Row'+(index),
							trial2:'tableTempOutStandardTrial2Row'+(index),
							trial3:'tableTempOutStandardTrial3Row'+(index)
						})
					),
					aj:combinedUncer,
					ai:UncChamberInstability(parseFloat(document.getElementById('tableTempOutChamberInstabilityRow'+(index)).value)),
				});

				var calculatedK = calculateK(parseFloat(CalculateDOF));
				
				arrTempOut.push({
				 	key:index,
				 	id:document.getElementById('tableTempOutUUCTestPointRow'+(index)).value,
					standardUsed:document.getElementById('tableTempOutStandardUse'+(index)).value,
					rangeUsed:document.getElementById('tableTempOutRangeRow'+(index)).value,
					resUsed:document.getElementById('tableTempOutResGradRow'+(index)).value,
					readUsed:document.getElementById('tableTempOutReadabilityRow'+(index)).value,
				 	UUCtrial1:document.getElementById('tableTempOutUUCTrial1Row'+(index)).value,
				 	UUCtrial2:document.getElementById('tableTempOutUUCTrial2Row'+(index)).value,
				 	UUCtrial3:document.getElementById('tableTempOutUUCTrial3Row'+(index)).value,	
				 	UUCtrialAverage:document.getElementById('tableTempOutUUCTrialAverageRow'+(index)).value,
				 	Standardtrial1:document.getElementById('tableTempOutStandardTrial1Row'+(index)).value,
				 	Standardtrial2:document.getElementById('tableTempOutStandardTrial2Row'+(index)).value,
				 	Standardtrial3:document.getElementById('tableTempOutStandardTrial3Row'+(index)).value,
				 	StandardtrialAverage:document.getElementById('tableTempOutStandardTrialAverageRow'+(index)).value,
					UUCStandardDev:standardDev({trial1:'tableTempOutUUCTrial1Row'+(index),trial2:'tableTempOutUUCTrial2Row'+(index),trial3:'tableTempOutUUCTrial3Row'+(index)}),
					StandardStandardDev:standardDev({trial1:'tableTempOutStandardTrial1Row'+(index),trial2:'tableTempOutStandardTrial2Row'+(index),trial3:'tableTempOutStandardTrial3Row'+(index)}),
					UncUUCResolution:UncUUCResolution('TempOut',index),
					UncUUCRepeatability:UncUUCRepeatability(standardDev({trial1:'tableTempOutUUCTrial1Row'+(index),trial2:'tableTempOutUUCTrial2Row'+(index),trial3:'tableTempOutUUCTrial3Row'+(index)})),
					UncStandardRepeatability:UncStandardRepeatability(standardDev({trial1:'tableTempOutStandardTrial1Row'+(index),trial2:'tableTempOutStandardTrial2Row'+(index),trial3:'tableTempOutStandardTrial3Row'+(index)})),
					ReadoutStandardUncertainty:readoutStandardUncertaintyFromCertificateGetMax(document.getElementById('tableTempOutStandardUse'+(index)).value),
					PRTStandardUncertaintyFromCertificate:PRTStandardUncertaintyFromCertificateGetMax('Temperature', document.getElementById('tableTempOutStandardUse'+(index)).value),
					CorrectionFromCertificate:correction,
					CalculatedValueConsideringCorrection:calculatedValueConsideringCorrection(document.getElementById('tableTempOutUUCTestPointRow'+(index)).value,correction),
					CorrectedValue:correctedValue({standardReadingAve:parseFloat(document.getElementById('tableTempOutStandardTrialAverageRow'+(index)).value), correctionFromCertificate:parseFloat(correction)}),
					UncDueToStandardReadout:UncStandardReadout(parseFloat(readoutStandardUncertaintyFromCertificateGetMax(document.getElementById('tableTempOutStandardUse'+(index)).value))),
					UncStandardPRT:UncStandardPRT(parseFloat(PRTStandardUncertaintyFromCertificateGetMax('Temperature', document.getElementById('tableTempOutStandardUse'+(index)).value))),
					Drift:slopeFormula(driftArrayFiltered,document.getElementById('tableTempOutUUCTestPointRow'+(index)).value),
					UncDueToDrift:UncDrift(slopeFormula(driftArrayFiltered,document.getElementById('tableTempOutUUCTestPointRow'+(index)).value)),
					STDRes:document.getElementById('tableTempOutSTDResRow'+(index)).value,
					UncDueToSTDRes:UncSTDResolution(parseFloat(document.getElementById('tableTempOutSTDResRow'+(index)).value)),
					ChamberUniformity:document.getElementById('tableTempOutChamberUniformityRow'+(index)).value,
					ChanmberInstability:document.getElementById('tableTempOutChamberInstabilityRow'+(index)).value,
					UncDueToChamberUniformity:UncChamberUniformity(parseFloat(document.getElementById('tableTempOutChamberUniformityRow'+(index)).value)),
					UncDueToChamberInstability:UncChamberInstability(parseFloat(document.getElementById('tableTempOutChamberInstabilityRow'+(index)).value)),
					Hysteresis:hysteresis({
						uucReadingAve1:parseFloat(document.getElementById('tableTempOutUUCTrialAverageRow1').value),
						uucReadingAve2:parseFloat(document.getElementById('tableTempOutUUCTrialAverageRow'+rowOfTable).value),
						correctedValue1:correctedValue({
							standardReadingAve:parseFloat(document.getElementById('tableTempOutStandardTrialAverageRow1').value), 
							correctionFromCertificate:parseFloat(correctionFromCert(document.getElementById('tableTempOutUUCTestPointRow1').value,document.getElementById('tableTempOutStandardUse'+(index)),document.getElementById('tableTempOutStandardUse'+(index)).value))
						}),
						correctedValue2:correctedValue({
							standardReadingAve:parseFloat(document.getElementById('tableTempOutStandardTrialAverageRow'+rowOfTable).value), 
							correctionFromCertificate:parseFloat(correctionFromCert(document.getElementById('tableTempOutUUCTestPointRow'+rowOfTable).value,document.getElementById('tableTempOutStandardUse'+(index)),document.getElementById('tableTempOutStandardUse'+(index)).value))
						})
					}),
					CombinedUncertainty:combinedUncer,
					DOF:CalculateDOF,
					ExpandedUncertainty:expandedUncertainty(combinedUncer,calculatedK),
					K:calculatedK,
					unit:"Temperature Out"
					});
			}

			console.log(expandedUncertainty(combinedUncer,k),'expandedUncertainty(combinedUncer,k)',combinedUncer,calculatedK ,'combinedUncer,k',CalculateDOF,'CalculateDOF');
			console.log("arrTempOut ",arrTempOut);
			arr2 = btoa(JSON.stringify(arrTempOut));
			document.getElementById(tableHiddenInput).value = JSON.stringify(arrTempOut);
			document.getElementById(buttonId).disabled = true;
			var butttonText =  '<a type="button" class="btn btn-link" onclick="cancelDisabledButton(\'tempOutAddToArrayText\',\''+buttonId+'\')">here</a>';
			document.getElementById('tempOutAddToArrayText').innerHTML = 'Calculated and added to array click'+ butttonText +' to cancel';

		}

		function inputToArrayRH(tableID,tableHiddenInput,buttonId){
			var arrRH = [];
				function correctionFromCertCondition(serialNum){	
					var arrayofTemp = [];
					var sortedArrayofTemp = [];
					for(x=0;x<ArrayOfStandardOriginal[0].length;x++){
						if (ArrayOfStandardOriginal[0][x].serialNumber == serialNum) {
							if (ArrayOfStandardOriginal[0][x].unit == "Relative Humidity") {
								arrayofTemp.push({
									TP:	ArrayOfStandardOriginal[0][x].testPoint,
									Corr : ArrayOfStandardOriginal[0][x].correction
								});
							}
						}
					};
					sortedArrayofTemp = arrayofTemp.sort(function(a, b){return a.TP - b.TP});
					return sortedArrayofTemp;
				}	

				var driftArrayFiltered = [];
				var computerdDriftArray = [];
				var rowOfTable = document.getElementById(tableID).rows.length - 3;
				
				var isPRT = <?=$PRT?>;				
									

			for (let index = 1; index <= rowOfTable; index++) {
				function slopeFormula(driftArray, searchingFor){
					if(!checkIfPRT(document.getElementById('tableRHStandardUse'+(index)).value)){
						var UnfilteredArray = driftArray;
						var arrayOfTestPoint = [];
						
						for (let index = 0; index < UnfilteredArray.length; index++) {
							var arr= [];
							var arrDateValue = [];
							var arrTestValue = [];

							let filteredDATA = UnfilteredArray.filter(function (e) {
								return e.testPoint == UnfilteredArray[index].testPoint;
							});

							for(x=0;x<filteredDATA.length;x++){
								arrDateValue.push(filteredDATA[x].dateValue);
								arrTestValue.push(parseFloat(filteredDATA[x].testValue));
							}
							
							var perday = formulajs.SLOPE(arrTestValue, arrDateValue);
							var peryear = (formulajs.SLOPE(arrTestValue, arrDateValue)*365.25);
							var roundedperYear = formulajs.ROUNDUP(peryear, 3);
							arrayOfTestPoint.push(Math.abs(roundedperYear));
						}
						
						return Math.max(...arrayOfTestPoint)
					}else{
						var UnfilteredArray = driftArray;
						var driftPRTArray = [];
						var largest= 0;
						for(var i = 0; i < UnfilteredArray.length; i++){
							driftPRTArray.push(UnfilteredArray[i]['drift'])
						}
						for (i=0; i<driftPRTArray.length;i++){
							if (driftPRTArray[i]>largest) {
								var largest=driftPRTArray[i];
							}
						}
						console.log('driftPRTArray',Math.max(driftPRTArray));
						console.log('driftPRTArray',driftPRTArray);
						console.log('largest',largest);
						return largest;
					}
				}
				var sortedArray = correctionFromCertCondition(document.getElementById('tableRHStandardUse'+(index)).value);
				if(!checkIfPRT(document.getElementById('tableRHStandardUse'+(index)).value)){
					for(x=0;x<driftArray[0].length;x++){
						if (driftArray[0][x].serialNumber == document.getElementById('tableRHStandardUse'+(index)).value) {
							if (driftArray[0][x].unit == 'Relative Humidity') {
									driftArrayFiltered.push({
										dateCalibrated: driftArray[0][x].dateCalibrated,
										dateValue: formulajs.DATEVALUE(driftArray[0][x].dateCalibrated),
										testPoint:	driftArray[0][x].testPoint,
										testValue:	driftArray[0][x].testPointValue,
									});
							}
						}
					};
				}else{
					for(x=0;x<driftArrayPRT[0].length;x++){
						if (driftArrayPRT[0][x].serialNumber == document.getElementById('tableRHStandardUse'+(index)).value) {
							driftArrayFiltered.push({
								testPoint: driftArrayPRT[0][x].testPoint,
								previousTest: driftArrayPRT[0][x].previousTest,
								currentTest:	driftArrayPRT[0][x].currentTest,
								drift:	driftArrayPRT[0][x].drift,
							});
						}
					};
				}
				// console.log('tableRHUUCTestPointRow'+(index), "Index " +index, "rowOfTable "+rowOfTable);
				console.log(search(document.getElementById('tableRHUUCTestPointRow'+(index)).value,sortedArray))
				if(search(document.getElementById('tableRHUUCTestPointRow'+(index)).value,sortedArray)){
					var correction = correctionFromCertRH(document.getElementById('tableRHUUCTestPointRow'+(index)).value,document.getElementById('tableRHStandardUse'+(index)));
				}
				else {
					var correction = interpolationCorrRH(document.getElementById('tableRHUUCTestPointRow'+(index)).value,document.getElementById('tableRHStandardUse'+(index)).value,);

				}
				// console.log('',document.getElementById('tableRHUUCTestPointRow'+(index)).value)


				var combinedUncer = combinedUncertainty({
					i:UncUUCResolution('RH',index),
					o:UncUUCRepeatability(standardDev({trial1:'tableRHUUCTrial1Row'+(index),trial2:'tableRHUUCTrial2Row'+(index),trial3:'tableRHUUCTrial3Row'+(index)})),
					z:UncStandardReadout(parseFloat(readoutStandardUncertaintyFromCertificateGetMax(document.getElementById('tableRHStandardUse'+(index)).value))),
					ac:UncDrift(slopeFormula(driftArrayFiltered,document.getElementById('tableRHUUCTestPointRow'+(index)).value)),
					ae:UncSTDResolution(parseFloat(document.getElementById('tableRHSTDResRow'+(index)).value)),
					ag:UncChamberUniformity(parseFloat(document.getElementById('tableRHChamberUniformityRow'+(index)).value)),
					ah:hysteresis({
						uucReadingAve1:parseFloat(document.getElementById('tableRHUUCTrialAverageRow1').value),
						uucReadingAve2:parseFloat(document.getElementById('tableRHUUCTrialAverageRow'+rowOfTable).value),
						correctedValue1:correctedValue({
							standardReadingAve:parseFloat(document.getElementById('tableRHStandardTrialAverageRow1').value), 
							correctionFromCertificate:parseFloat(correctionFromCertRH(document.getElementById('tableRHUUCTestPointRow1').value,document.getElementById('tableRHStandardUse'+(index))))
						}),
						correctedValue2:correctedValue({
							standardReadingAve:parseFloat(document.getElementById('tableRHStandardTrialAverageRow'+rowOfTable).value), 
							correctionFromCertificate:parseFloat(correctionFromCertRH(document.getElementById('tableRHUUCTestPointRow'+rowOfTable).value,document.getElementById('tableRHStandardUse'+(index))))
						})
					}),
					aa:UncStandardPRT(parseFloat(PRTStandardUncertaintyFromCertificateGetMax('Relative Humidity', document.getElementById('tableRHStandardUse'+(index)).value))),
					w:UncStandardRepeatability(
						standardDev({
							trial1:'tableRHStandardTrial1Row'+(index),
							trial2:'tableRHStandardTrial2Row'+(index),
							trial3:'tableRHStandardTrial3Row'+(index)
						})
						),
					ai:	UncChamberInstability(parseFloat(document.getElementById('tableRHChamberInstabilityRow'+(index)).value)),
				});

				var CalculateDOF = DOF({
					i:UncUUCResolution('RH',index),
					o:UncUUCRepeatability(standardDev({trial1:'tableRHUUCTrial1Row'+(index),trial2:'tableRHUUCTrial2Row'+(index),trial3:'tableRHUUCTrial3Row'+(index)})),
					z:UncStandardReadout(parseFloat(readoutStandardUncertaintyFromCertificateGetMax(document.getElementById('tableRHStandardUse'+(index)).value))),
					ac:UncDrift(slopeFormula(driftArrayFiltered,document.getElementById('tableRHUUCTestPointRow'+(index)).value)),
					ae:UncSTDResolution(parseFloat(document.getElementById('tableRHSTDResRow'+(index)).value)),
					ag:UncChamberUniformity(parseFloat(document.getElementById('tableRHChamberUniformityRow'+(index)).value)),
					ah:hysteresis({
						uucReadingAve1:parseFloat(document.getElementById('tableRHUUCTrialAverageRow1').value),
						uucReadingAve2:parseFloat(document.getElementById('tableRHUUCTrialAverageRow'+rowOfTable).value),
						correctedValue1:correctedValue({
							standardReadingAve:parseFloat(document.getElementById('tableRHStandardTrialAverageRow1').value), 
							correctionFromCertificate:parseFloat(correctionFromCertRH(document.getElementById('tableRHUUCTestPointRow1').value,document.getElementById('tableRHStandardUse'+(index))))
						}),
						correctedValue2:correctedValue({
							standardReadingAve:parseFloat(document.getElementById('tableRHStandardTrialAverageRow'+rowOfTable).value), 
							correctionFromCertificate:parseFloat(correctionFromCertRH(document.getElementById('tableRHUUCTestPointRow'+rowOfTable).value,document.getElementById('tableRHStandardUse'+(index))))
						})
					}),
					aa:UncStandardPRT(parseFloat(PRTStandardUncertaintyFromCertificateGetMax('Relative Humidity', document.getElementById('tableRHStandardUse'+(index)).value))),
					w:UncStandardRepeatability(
						standardDev({
							trial1:'tableRHStandardTrial1Row'+(index),
							trial2:'tableRHStandardTrial2Row'+(index),
							trial3:'tableRHStandardTrial3Row'+(index)
						})
					),
					aj:combinedUncer,
					ai:	UncChamberInstability(parseFloat(document.getElementById('tableRHChamberInstabilityRow'+(index)).value)),
				});

				var calculatedK = calculateK(parseFloat(CalculateDOF));
				
				arrRH.push({
					key:index,
					id:document.getElementById('tableRHUUCTestPointRow'+(index)).value,
					standardUsed:document.getElementById('tableRHStandardUse'+(index)).value,
					rangeUsed:document.getElementById('tableRHRangeRow'+(index)).value,
					resUsed:document.getElementById('tableRHResGradRow'+(index)).value,
					readUsed:document.getElementById('tableRHReadabilityRow'+(index)).value,
					UUCtrial1:document.getElementById('tableRHUUCTrial1Row'+(index)).value,
					UUCtrial2:document.getElementById('tableRHUUCTrial2Row'+(index)).value,
					UUCtrial3:document.getElementById('tableRHUUCTrial3Row'+(index)).value,	
					UUCtrialAverage:document.getElementById('tableRHUUCTrialAverageRow'+(index)).value,
					Standardtrial1:document.getElementById('tableRHStandardTrial1Row'+(index)).value,
					Standardtrial2:document.getElementById('tableRHStandardTrial2Row'+(index)).value,
					Standardtrial3:document.getElementById('tableRHStandardTrial3Row'+(index)).value,
					StandardtrialAverage:document.getElementById('tableRHStandardTrialAverageRow'+(index)).value,
					UUCStandardDev:standardDev({trial1:'tableRHUUCTrial1Row'+(index),trial2:'tableRHUUCTrial2Row'+(index),trial3:'tableRHUUCTrial3Row'+(index)}),
					StandardStandardDev:standardDev({trial1:'tableRHStandardTrial1Row'+(index),trial2:'tableRHStandardTrial2Row'+(index),trial3:'tableRHStandardTrial3Row'+(index)}),
					UncUUCResolution:UncUUCResolution('RH',index),
					UncUUCRepeatability:UncUUCRepeatability(standardDev({trial1:'tableRHUUCTrial1Row'+(index),trial2:'tableRHUUCTrial2Row'+(index),trial3:'tableRHUUCTrial3Row'+(index)})),
					UncStandardRepeatability:UncStandardRepeatability(standardDev({trial1:'tableRHStandardTrial1Row'+(index),trial2:'tableRHStandardTrial2Row'+(index),trial3:'tableRHStandardTrial3Row'+(index)})),
					ReadoutStandardUncertainty:readoutStandardUncertaintyFromCertificateGetMax(document.getElementById('tableRHStandardUse'+(index)).value),
					PRTStandardUncertaintyFromCertificate:PRTStandardUncertaintyFromCertificateGetMax('Relative Humidity', document.getElementById('tableRHStandardUse'+(index)).value),
					CorrectionFromCertificate:correction,
					CalculatedValueConsideringCorrection:calculatedValueConsideringCorrection(document.getElementById('tableRHUUCTestPointRow'+(index)).value,correction),
					CorrectedValue:correctedValue({standardReadingAve:parseFloat(document.getElementById('tableRHStandardTrialAverageRow'+(index)).value), correctionFromCertificate:parseFloat(correction)}),
					UncDueToStandardReadout:UncStandardReadout(parseFloat(readoutStandardUncertaintyFromCertificateGetMax(document.getElementById('tableRHStandardUse'+(index)).value))),
					UncStandardPRT:UncStandardPRT(parseFloat(PRTStandardUncertaintyFromCertificateGetMax('Relative Humidity', document.getElementById('tableRHStandardUse'+(index)).value))),
					Drift:slopeFormula(driftArrayFiltered,document.getElementById('tableRHUUCTestPointRow'+(index)).value),
					UncDueToDrift:UncDrift(slopeFormula(driftArrayFiltered,document.getElementById('tableRHUUCTestPointRow'+(index)).value)),
					STDRes:document.getElementById('tableRHSTDResRow'+(index)).value,
					UncDueToSTDRes:UncSTDResolution(parseFloat(document.getElementById('tableRHSTDResRow'+(index)).value)),
					ChamberUniformity:document.getElementById('tableRHChamberUniformityRow'+(index)).value,
					ChanmberInstability:document.getElementById('tableRHChamberInstabilityRow'+(index)).value,
					UncDueToChamberUniformity:UncChamberUniformity(parseFloat(document.getElementById('tableRHChamberUniformityRow'+(index)).value)),
					UncDueToChamberInstability:UncChamberInstability(parseFloat(document.getElementById('tableRHChamberInstabilityRow'+(index)).value)),
					Hysteresis:hysteresis({
						uucReadingAve1:parseFloat(document.getElementById('tableRHUUCTrialAverageRow1').value),
						uucReadingAve2:parseFloat(document.getElementById('tableRHUUCTrialAverageRow'+rowOfTable).value),
						correctedValue1:correctedValue({
							standardReadingAve:parseFloat(document.getElementById('tableRHStandardTrialAverageRow1').value), 
							correctionFromCertificate:parseFloat(correctionFromCertRH(document.getElementById('tableRHUUCTestPointRow1').value,document.getElementById('tableRHStandardUse'+(index))))
						}),
						correctedValue2:correctedValue({
							standardReadingAve:parseFloat(document.getElementById('tableRHStandardTrialAverageRow'+rowOfTable).value), 
							correctionFromCertificate:parseFloat(correctionFromCertRH(document.getElementById('tableRHUUCTestPointRow'+rowOfTable).value,document.getElementById('tableRHStandardUse'+(index))))
						})
					}),
					CombinedUncertainty:combinedUncer,
					DOF:CalculateDOF,
					ExpandedUncertainty:expandedUncertainty(combinedUncer,calculatedK),
					K:calculatedK,
					unit:"RH In"
					});
			}

			console.log(expandedUncertainty(combinedUncer,k),'expandedUncertainty(combinedUncer,k)',combinedUncer,calculatedK ,'combinedUncer,k',CalculateDOF,'CalculateDOF');
			console.log("arrRH ",arrRH);
			arr2 = btoa(JSON.stringify(arrRH));
			document.getElementById(tableHiddenInput).value = JSON.stringify(arrRH);
			document.getElementById(buttonId).disabled = true;
			var butttonText =  '<a type="button" class="btn btn-link" onclick="cancelDisabledButton(\'RHAddToArrayText\',\''+buttonId+'\')">here</a>';
			document.getElementById('RHAddToArrayText').innerHTML = 'Calculated and added to array click'+ butttonText +' to cancel';

		}

		function inputToArrayRNOut(tableID,tableHiddenInput,buttonId){
			var arrRNOut = [];
				function correctionFromCertCondition(serialNum){	
					var arrayofTemp = [];
					var sortedArrayofTemp = [];
					for(x=0;x<ArrayOfStandardOriginal[0].length;x++){
						if (ArrayOfStandardOriginal[0][x].serialNumber == serialNum) {
							if (ArrayOfStandardOriginal[0][x].unit == "Relative Humidity") {
								arrayofTemp.push({
									TP:	ArrayOfStandardOriginal[0][x].testPoint,
									Corr : ArrayOfStandardOriginal[0][x].correction
								});
							}
						}
					};
					sortedArrayofTemp = arrayofTemp.sort(function(a, b){return a.TP - b.TP});
					return sortedArrayofTemp;
				}	

				var driftArrayFiltered = [];
				var computerdDriftArray = [];
				var rowOfTable = document.getElementById(tableID).rows.length - 3;
				
				var isPRT = <?=$PRT?>;				
					

			for (let index = 1; index <= rowOfTable; index++) {
				function slopeFormula(driftArray, searchingFor){
					if(!checkIfPRT(document.getElementById('tableRNOutStandardUse'+(index)).value)){
						var UnfilteredArray = driftArray;
						var arrayOfTestPoint = [];
						
						for (let index = 0; index < UnfilteredArray.length; index++) {
							var arr= [];
							var arrDateValue = [];
							var arrTestValue = [];

							let filteredDATA = UnfilteredArray.filter(function (e) {
								return e.testPoint == UnfilteredArray[index].testPoint;
							});

							for(x=0;x<filteredDATA.length;x++){
								arrDateValue.push(filteredDATA[x].dateValue);
								arrTestValue.push(parseFloat(filteredDATA[x].testValue));
							}
							
							var perday = formulajs.SLOPE(arrTestValue, arrDateValue);
							var peryear = (formulajs.SLOPE(arrTestValue, arrDateValue)*365.25);
							var roundedperYear = formulajs.ROUNDUP(peryear, 3);
							arrayOfTestPoint.push(Math.abs(roundedperYear));
						}
						
						return Math.max(...arrayOfTestPoint)
					}else{
						var UnfilteredArray = driftArray;
						var driftPRTArray = [];
						var largest= 0;
						for(var i = 0; i < UnfilteredArray.length; i++){
							driftPRTArray.push(UnfilteredArray[i]['drift'])
						}
						for (i=0; i<driftPRTArray.length;i++){
							if (driftPRTArray[i]>largest) {
								var largest=driftPRTArray[i];
							}
						}
						console.log('driftPRTArray',Math.max(driftPRTArray));
						console.log('driftPRTArray',driftPRTArray);
						console.log('largest',largest);
						return largest;
					}
				}
				var sortedArray = correctionFromCertCondition(document.getElementById('tableRNOutStandardUse'+(index)).value);
				if(!checkIfPRT(document.getElementById('tableRNOutStandardUse'+(index)).value)){
					for(x=0;x<driftArray[0].length;x++){
						if (driftArray[0][x].serialNumber == document.getElementById('tableRNOutStandardUse'+(index)).value) {
							if (driftArray[0][x].unit == 'Relative Humidity') {
									driftArrayFiltered.push({
										dateCalibrated: driftArray[0][x].dateCalibrated,
										dateValue: formulajs.DATEVALUE(driftArray[0][x].dateCalibrated),
										testPoint:	driftArray[0][x].testPoint,
										testValue:	driftArray[0][x].testPointValue,
									});
							}
						}
					};
				}else{
					for(x=0;x<driftArrayPRT[0].length;x++){
						if (driftArrayPRT[0][x].serialNumber == document.getElementById('tableRNOutStandardUse'+(index)).value) {
							driftArrayFiltered.push({
								testPoint: driftArrayPRT[0][x].testPoint,
								previousTest: driftArrayPRT[0][x].previousTest,
								currentTest:	driftArrayPRT[0][x].currentTest,
								drift:	driftArrayPRT[0][x].drift,
							});
						}
					};
				}
				// console.log('tableRNOutUUCTestPointRow'+(index), "Index " +index, "rowOfTable "+rowOfTable);
				console.log(search(document.getElementById('tableRNOutUUCTestPointRow'+(index)).value,sortedArray))
				if(search(document.getElementById('tableRNOutUUCTestPointRow'+(index)).value,sortedArray)){
					var correction = correctionFromCertRH(document.getElementById('tableRNOutUUCTestPointRow'+(index)).value,document.getElementById('tableRNOutStandardUse'+(index)));
				}
				else {
					var correction = interpolationCorrRH(document.getElementById('tableRNOutUUCTestPointRow'+(index)).value,document.getElementById('tableRNOutStandardUse'+(index)).value,);

				}
				// console.log('',document.getElementById('tableRNOutUUCTestPointRow'+(index)).value)


				var combinedUncer = combinedUncertainty({
					i:UncUUCResolution('RNOut',index),
					o:UncUUCRepeatability(standardDev({trial1:'tableRNOutUUCTrial1Row'+(index),trial2:'tableRNOutUUCTrial2Row'+(index),trial3:'tableRNOutUUCTrial3Row'+(index)})),
					z:UncStandardReadout(parseFloat(readoutStandardUncertaintyFromCertificateGetMax(document.getElementById('tableRNOutStandardUse'+(index)).value))),
					ac:UncDrift(slopeFormula(driftArrayFiltered,document.getElementById('tableRNOutUUCTestPointRow'+(index)).value)),
					ae:UncSTDResolution(parseFloat(document.getElementById('tableRNOutSTDResRow'+(index)).value)),
					ag:UncChamberUniformity(parseFloat(document.getElementById('tableRNOutChamberUniformityRow'+(index)).value)),
					ah:hysteresis({
						uucReadingAve1:parseFloat(document.getElementById('tableRNOutUUCTrialAverageRow1').value),
						uucReadingAve2:parseFloat(document.getElementById('tableRNOutUUCTrialAverageRow'+rowOfTable).value),
						correctedValue1:correctedValue({
							standardReadingAve:parseFloat(document.getElementById('tableRNOutStandardTrialAverageRow1').value), 
							correctionFromCertificate:parseFloat(correctionFromCertRH(document.getElementById('tableRNOutUUCTestPointRow1').value,document.getElementById('tableRNOutStandardUse'+(index))))
						}),
						correctedValue2:correctedValue({
							standardReadingAve:parseFloat(document.getElementById('tableRNOutStandardTrialAverageRow'+rowOfTable).value), 
							correctionFromCertificate:parseFloat(correctionFromCertRH(document.getElementById('tableRNOutUUCTestPointRow'+rowOfTable).value,document.getElementById('tableRNOutStandardUse'+(index))))
						})
					}),
					aa:UncStandardPRT(parseFloat(PRTStandardUncertaintyFromCertificateGetMax('Relative Humidity', document.getElementById('tableRNOutStandardUse'+(index)).value))),
					w:UncStandardRepeatability(
						standardDev({
							trial1:'tableRNOutStandardTrial1Row'+(index),
							trial2:'tableRNOutStandardTrial2Row'+(index),
							trial3:'tableRNOutStandardTrial3Row'+(index)
						})
						),
					ai:	UncChamberInstability(parseFloat(document.getElementById('tableRNOutChamberInstabilityRow'+(index)).value)),
				});

				var CalculateDOF = DOF({
					i:UncUUCResolution('RNOut',index),
					o:UncUUCRepeatability(standardDev({trial1:'tableRNOutUUCTrial1Row'+(index),trial2:'tableRNOutUUCTrial2Row'+(index),trial3:'tableRNOutUUCTrial3Row'+(index)})),
					z:UncStandardReadout(parseFloat(readoutStandardUncertaintyFromCertificateGetMax(document.getElementById('tableRNOutStandardUse'+(index)).value))),
					ac:UncDrift(slopeFormula(driftArrayFiltered,document.getElementById('tableRNOutUUCTestPointRow'+(index)).value)),
					ae:UncSTDResolution(parseFloat(document.getElementById('tableRNOutSTDResRow'+(index)).value)),
					ag:UncChamberUniformity(parseFloat(document.getElementById('tableRNOutChamberUniformityRow'+(index)).value)),
					ah:hysteresis({
						uucReadingAve1:parseFloat(document.getElementById('tableRNOutUUCTrialAverageRow1').value),
						uucReadingAve2:parseFloat(document.getElementById('tableRNOutUUCTrialAverageRow'+rowOfTable).value),
						correctedValue1:correctedValue({
							standardReadingAve:parseFloat(document.getElementById('tableRNOutStandardTrialAverageRow1').value), 
							correctionFromCertificate:parseFloat(correctionFromCertRH(document.getElementById('tableRNOutUUCTestPointRow1').value,document.getElementById('tableRNOutStandardUse'+(index))))
						}),
						correctedValue2:correctedValue({
							standardReadingAve:parseFloat(document.getElementById('tableRNOutStandardTrialAverageRow'+rowOfTable).value), 
							correctionFromCertificate:parseFloat(correctionFromCertRH(document.getElementById('tableRNOutUUCTestPointRow'+rowOfTable).value,document.getElementById('tableRNOutStandardUse'+(index))))
						})
					}),
					aa:UncStandardPRT(parseFloat(PRTStandardUncertaintyFromCertificateGetMax('Relative Humidity', document.getElementById('tableRNOutStandardUse'+(index)).value))),
					w:UncStandardRepeatability(
						standardDev({
							trial1:'tableRNOutStandardTrial1Row'+(index),
							trial2:'tableRNOutStandardTrial2Row'+(index),
							trial3:'tableRNOutStandardTrial3Row'+(index)
						})
					),
					aj:combinedUncer,
					ai:	UncChamberInstability(parseFloat(document.getElementById('tableRNOutChamberInstabilityRow'+(index)).value)),
				});

				var calculatedK = calculateK(parseFloat(CalculateDOF));
				
				arrRNOut.push({
					key:index,
					id:document.getElementById('tableRNOutUUCTestPointRow'+(index)).value,
					standardUsed:document.getElementById('tableRNOutStandardUse'+(index)).value,
					rangeUsed:document.getElementById('tableRNOutRangeRow'+(index)).value,
					resUsed:document.getElementById('tableRNOutResGradRow'+(index)).value,
					readUsed:document.getElementById('tableRNOutReadabilityRow'+(index)).value,
					UUCtrial1:document.getElementById('tableRNOutUUCTrial1Row'+(index)).value,
					UUCtrial2:document.getElementById('tableRNOutUUCTrial2Row'+(index)).value,
					UUCtrial3:document.getElementById('tableRNOutUUCTrial3Row'+(index)).value,	
					UUCtrialAverage:document.getElementById('tableRNOutUUCTrialAverageRow'+(index)).value,
					Standardtrial1:document.getElementById('tableRNOutStandardTrial1Row'+(index)).value,
					Standardtrial2:document.getElementById('tableRNOutStandardTrial2Row'+(index)).value,
					Standardtrial3:document.getElementById('tableRNOutStandardTrial3Row'+(index)).value,
					StandardtrialAverage:document.getElementById('tableRNOutStandardTrialAverageRow'+(index)).value,
					UUCStandardDev:standardDev({trial1:'tableRNOutUUCTrial1Row'+(index),trial2:'tableRNOutUUCTrial2Row'+(index),trial3:'tableRNOutUUCTrial3Row'+(index)}),
					StandardStandardDev:standardDev({trial1:'tableRNOutStandardTrial1Row'+(index),trial2:'tableRNOutStandardTrial2Row'+(index),trial3:'tableRNOutStandardTrial3Row'+(index)}),
					UncUUCResolution:UncUUCResolution('RNOut',index),
					UncUUCRepeatability:UncUUCRepeatability(standardDev({trial1:'tableRNOutUUCTrial1Row'+(index),trial2:'tableRNOutUUCTrial2Row'+(index),trial3:'tableRNOutUUCTrial3Row'+(index)})),
					UncStandardRepeatability:UncStandardRepeatability(standardDev({trial1:'tableRNOutStandardTrial1Row'+(index),trial2:'tableRNOutStandardTrial2Row'+(index),trial3:'tableRNOutStandardTrial3Row'+(index)})),
					ReadoutStandardUncertainty:readoutStandardUncertaintyFromCertificateGetMax(document.getElementById('tableRNOutStandardUse'+(index)).value),
					PRTStandardUncertaintyFromCertificate:PRTStandardUncertaintyFromCertificateGetMax('Relative Humidity', document.getElementById('tableRNOutStandardUse'+(index)).value),
					CorrectionFromCertificate:correction,
					CalculatedValueConsideringCorrection:calculatedValueConsideringCorrection(document.getElementById('tableRNOutUUCTestPointRow'+(index)).value,correction),
					CorrectedValue:correctedValue({standardReadingAve:parseFloat(document.getElementById('tableRNOutStandardTrialAverageRow'+(index)).value), correctionFromCertificate:parseFloat(correction)}),
					UncDueToStandardReadout:UncStandardReadout(parseFloat(readoutStandardUncertaintyFromCertificateGetMax(document.getElementById('tableRNOutStandardUse'+(index)).value))),
					UncStandardPRT:UncStandardPRT(parseFloat(PRTStandardUncertaintyFromCertificateGetMax('Relative Humidity', document.getElementById('tableRNOutStandardUse'+(index)).value))),
					Drift:slopeFormula(driftArrayFiltered,document.getElementById('tableRNOutUUCTestPointRow'+(index)).value),
					UncDueToDrift:UncDrift(slopeFormula(driftArrayFiltered,document.getElementById('tableRNOutUUCTestPointRow'+(index)).value)),
					STDRes:document.getElementById('tableRNOutSTDResRow'+(index)).value,
					UncDueToSTDRes:UncSTDResolution(parseFloat(document.getElementById('tableRNOutSTDResRow'+(index)).value)),
					ChamberUniformity:document.getElementById('tableRNOutChamberUniformityRow'+(index)).value,
					ChanmberInstability:document.getElementById('tableRNOutChamberInstabilityRow'+(index)).value,
					UncDueToChamberUniformity:UncChamberUniformity(parseFloat(document.getElementById('tableRNOutChamberUniformityRow'+(index)).value)),
					UncDueToChamberInstability:UncChamberInstability(parseFloat(document.getElementById('tableRNOutChamberInstabilityRow'+(index)).value)),
					Hysteresis:hysteresis({
						uucReadingAve1:parseFloat(document.getElementById('tableRNOutUUCTrialAverageRow1').value),
						uucReadingAve2:parseFloat(document.getElementById('tableRNOutUUCTrialAverageRow'+rowOfTable).value),
						correctedValue1:correctedValue({
							standardReadingAve:parseFloat(document.getElementById('tableRNOutStandardTrialAverageRow1').value), 
							correctionFromCertificate:parseFloat(correctionFromCertRH(document.getElementById('tableRNOutUUCTestPointRow1').value,document.getElementById('tableRNOutStandardUse'+(index))))
						}),
						correctedValue2:correctedValue({
							standardReadingAve:parseFloat(document.getElementById('tableRNOutStandardTrialAverageRow'+rowOfTable).value), 
							correctionFromCertificate:parseFloat(correctionFromCertRH(document.getElementById('tableRNOutUUCTestPointRow'+rowOfTable).value,document.getElementById('tableRNOutStandardUse'+(index))))
						})
					}),
					CombinedUncertainty:combinedUncer,
					DOF:CalculateDOF,
					ExpandedUncertainty:expandedUncertainty(combinedUncer,calculatedK),
					K:calculatedK,
					unit:"RH Out"
					});
			}

			console.log(expandedUncertainty(combinedUncer,k),'expandedUncertainty(combinedUncer,k)',combinedUncer,calculatedK ,'combinedUncer,k',CalculateDOF,'CalculateDOF');
			console.log("arrRNOut ",arrRNOut);
			arr2 = btoa(JSON.stringify(arrRNOut));
			document.getElementById(tableHiddenInput).value = JSON.stringify(arrRNOut);
			document.getElementById(buttonId).disabled = true;
			var butttonText =  '<a type="button" class="btn btn-link" onclick="cancelDisabledButton(\'RNOutAddToArrayText\',\''+buttonId+'\')">here</a>';
			document.getElementById('RNOutAddToArrayText').innerHTML = 'Calculated and added to array click'+ butttonText +' to cancel';

		}

		function calculatedValueConsideringCorrection(setting, correction){
			// console.log("calculatedValueConsideringCorrection "+ correction +" "+ setting);
			return (parseFloat(setting)-parseFloat(correction));
		}

		function standardDev({trial1,trial2,trial3	}){
			t1 = parseFloat(document.getElementById(trial1).value);
			t2 = parseFloat(document.getElementById(trial2).value);
			t3 = parseFloat(document.getElementById(trial3).value);
			var ArrayOfRepeat =[t1,t2,t3];
			var mean = (t1+t2+t3)/3;
			var arrayOfSquared = [];
			var addingTheSquared = 0;
			var SquaredOfSum;
			ArrayOfRepeat.forEach((item) => {
			let y = item - mean;
			let x = Math.pow(y, 2);
			arrayOfSquared.push(x);
			});
			arrayOfSquared.forEach((item) => {
			addingTheSquared = (item + addingTheSquared);
			});
			SquaredOfSum = addingTheSquared / (3 - 1);
			//document.getElementById(standard).value = Math.sqrt(SquaredOfSum);
			return Math.sqrt(SquaredOfSum);
		}

		function average({trial1,trial2,trial3,aver,standardDevs}){
			t1 = parseFloat(document.getElementById(trial1).value);
			t2 = parseFloat(document.getElementById(trial2).value);
			t3 = parseFloat(document.getElementById(trial3).value);
			document.getElementById(aver).value = (t1+t2+t3)/3;
		}

		function UncUUCResolution(unit,rowNumber){
			console.log('"table'+unit+'RangeRow'+rowNumber+'"')
			var tableRange = parseFloat(document.getElementById('table'+unit+'RangeRow'+rowNumber).value);
			var tableResGrad = parseFloat(document.getElementById('table'+unit+'ResGradRow'+rowNumber).value);
			var tableReadability = parseFloat(document.getElementById('table'+unit+'ReadabilityRow'+rowNumber).value);
			console.log("UncUUCResolution",tableResGrad," ",tableReadability, " ",Math.sqrt(3), " ", (tableResGrad*tableReadability)/Math.sqrt(3) );
			return (tableResGrad*tableReadability)/Math.sqrt(3);
		}

		function UncUUCRepeatability(stdDevUUC){
			return stdDevUUC/Math.sqrt(3);
		}
		
		function UncStandardRepeatability(stdDevStandard){
			return stdDevStandard/Math.sqrt(3);
		}

		function correctedValue({standardReadingAve, correctionFromCertificate}){
			return standardReadingAve+correctionFromCertificate;
		}

		function UncStandardReadout(readoutStandardUncFromCert){
			return (readoutStandardUncFromCert/2);
		}

		function UncStandardPRT(PRTStandardUncFromCert){
			return PRTStandardUncFromCert/2;
		}

		function UncDrift(drift){
			return drift/Math.sqrt(3);
		}

		function UncSTDResolution(STDRes){
			return STDRes/(2*Math.sqrt(3));
		}

		function UncChamberUniformity(chamberUniformity){
			return chamberUniformity/Math.sqrt(3);
		}
		function UncChamberInstability(chamberInstability){
			return chamberInstability/Math.sqrt(3);
		}

		function hysteresis({uucReadingAve1,uucReadingAve2,correctedValue1,correctedValue2}){
			//return (uucReadingAve1-uucReadingAve2)-(correctedValue1-correctedValue2);
			return (((uucReadingAve1-uucReadingAve2)-(correctedValue1-correctedValue2))/(Math.sqrt(3)));
		}

		//Veffective
		function DOF({aj,aa,ac,ae,ag,i,w,o,ah,ai}){
			var calclatedAJ = Math.pow(aj,4);
			var calclatedAA = Math.pow(aa,4);
			var calclatedAC = Math.pow(ac,4);
			var calclatedAE = Math.pow(ae,4);
			var calclatedAG = Math.pow(ag,4);
			var calclatedI = Math.pow(i,4);
			var calclatedW = Math.pow(w,4);
			var calclatedO = Math.pow(o,4);
			var calclatedAh = Math.pow(ah,4);
			var calclatedAi = Math.pow(ai,4);
			// return (calclatedAJ/((calclatedAA/1000000)+
			// (calclatedAC/1000000)+(calclatedAE/1000000)+
			// (calclatedAG/1000000)+(calclatedI/1000000)+
			// (calclatedW/1000000)+(calclatedO/1000000)+(calclatedAh/1000000)+(calclatedAi/1000000)));
			return (calclatedAJ/((calclatedAA/1000000)+
			(calclatedAC/1000000)+(calclatedAE/1000000)+
			(calclatedAG/1000000)+(calclatedI/1000000)+
			(calclatedW/2)+(calclatedO/2)+(calclatedAh/1000000)+(calclatedAi/1000000)));
		}

		function combinedUncertainty({i,o,z,ac,ae,ag,ah,aa,w,ai}){
			var calclatedI = Math.pow(i,2);
			var calclatedO = Math.pow(o,2);
			var calclatedZ = Math.pow(z,2);
			var calclatedAC = Math.pow(ac,2);
			var calclatedAE = Math.pow(ae,2);
			var calclatedAG = Math.pow(ag,2);
			var calclatedAH = Math.pow(ah,2);
			var calclatedAA = Math.pow(aa,2);
			var calclatedW = Math.pow(w,2);
			var calclatedAI = Math.pow(ai,2);
			

			return Math.sqrt((calclatedI+calclatedO+calclatedZ+calclatedAC+calclatedAE+calclatedAG+calclatedAH+calclatedAA+calclatedW+calclatedAI));
		}

		function calculateK(valueDOF){
			return (formulajs.TINV((1-(0.0455)/2),valueDOF));
		}

		function expandedUncertainty(combinedUncertain,K){
			return combinedUncertain*K;
		}

		function readoutStandardUncertaintyFromCertificateGetMax(serialNumber){
			var filteredArrayOfStandard = filterDataDynamic(serialNumber, 'serialNumber', ArrayOfStandardOriginal[0])
			let arrayReadoutStandard = [];
			for(i=0;i<filteredArrayOfStandard.length;i++){
				arrayReadoutStandard.push(parseFloat(filteredArrayOfStandard[i].readoutStandardUncertaintyFromCertificate));
			}
			max = Math.max.apply(null, arrayReadoutStandard)

			return max.toFixed(3);
		}

		function PRTStandardUncertaintyFromCertificateGetMax(unit, sn){
			let arrayReadoutStandard = [];
			for(i=0;i<ArrayOfStandardOriginal[0].length;i++){
				if (ArrayOfStandardOriginal[0][i].unit == unit && ArrayOfStandardOriginal[0][i].serialNumber == sn) {
					arrayReadoutStandard.push(parseFloat(ArrayOfStandardOriginal[0][i].uncertainty));
				}
			}
			max = Math.max.apply(null, arrayReadoutStandard)

			return max.toFixed(3);
		}

		function linearRegression(y,x){
			var lr = {};
			var n = y.length;
			var sum_x = 0;
			var sum_y = 0;
			var sum_xy = 0;
			var sum_xx = 0;
			var sum_yy = 0;

			for (var i = 0; i < y.length; i++) {

				sum_x += x[i];
				sum_y += y[i];
				sum_xy += (x[i]*y[i]);
				sum_xx += (x[i]*x[i]);
				sum_yy += (y[i]*y[i]);
			} 

			lr['slope'] = (n * sum_xy - sum_x * sum_y) / (n*sum_xx - sum_x * sum_x);
			lr['intercept'] = (sum_y - lr.slope * sum_x)/n;
			lr['r2'] = Math.pow((n*sum_xy - sum_x*sum_y)/Math.sqrt((n*sum_xx-sum_x*sum_x)*(n*sum_yy-sum_y*sum_y)),2);

			console.log(lr['slope']);
			return lr['slope'];
		}	

		// document.getElementById("tableTempInStandardTrial1Row2").addEventListener("keyup", function() {
		// 	average({trial1:'tableTempInStandardTrial1Row2',trial2:'tableTempInStandardTrial2Row2',trial3:'tableTempInStandardTrial3Row2',aver:"tableTempInStandardTrialAverageRow2"})
		// });
		
		
		function setDate() {
			let d = new Date(document.getElementById("dateCalibrated").value)
			let mon = +document.getElementById("mon").value;
			d.setMonth(d.getMonth()+mon)
			document.getElementById("recommendedDueDate").valueAsDate = d;
		}

		document.getElementById("dateCalibrated").addEventListener("change",setDate)
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

		function checkCertNum(){
			var search = document.getElementById('certificateNumber').value;
			var certNum = document.getElementById('certificateNumber');
			$.ajax({
				cache: false,
				type: "post",
				url: "<?= base_url('UserGuestThermoController/checkCertNum')?>",
				data: {'q': search},
				success:function(result){
					console.log(result)
					if(result == 'true'){
						
						certNum.setAttribute('style','background-color:rgba(255,0,0,0.5)')
					}else{
						certNum.setAttribute('style','background-color:rgba(0,255,0,0.5)')
					}
					window.setTimeout(checkCertNum, 5000);
				},
			})
		}


		//For automatic get value then save to hidden then when saving its 

		
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

			document.getElementById('inputtedArrayTempIn').value = JSON.stringify(inputtedDataTempIn);
			document.getElementById('inputtedArrayTempOut').value = JSON.stringify(inputtedDataTempOut);
			document.getElementById('inputtedArrayRHIn').value = JSON.stringify(inputtedDataRHIn);
			document.getElementById('inputtedArrayRHOunt').value = JSON.stringify(inputtedDataRHOut);

			console.log(
				document.getElementById('inputtedArrayTempIn').value +" , " +
				document.getElementById('inputtedArrayTempOut').value+" , " +
				document.getElementById('inputtedArrayRHIn').value +" , " +
				document.getElementById('inputtedArrayRHOunt').value 
			);

			window.setTimeout(automaticAddToObject, 5000);
		}
		window.setTimeout(automaticAddToObject, 5000);


	</script>

<script>
	dataListForPrevCert = document.getElementById('dataListForPrevCert');
	var inputtedArrayTempIn;
	var inputtedArrayTempOut;
	var inputtedArrayRHIn;
	var inputtedArrayRHOut;
	var selectedCertData;
	for (let i = 0; i < ThermoData.length; i++) {
		var option = document.createElement("option");		
		option.setAttribute('data-value',ThermoData[i].id);
		option.setAttribute('value',ThermoData[i].certificateNumber);
		dataListForPrevCert.appendChild(option);
	}	
	function getDataOfSelectedCert(){
		var SelectedCert = document.getElementById('prevCert').dataset.value;
	}					
	$("#useThisData").click(function() {
		var inputs = $('#prevCert').val()
		var values = $('#dataListForPrevCert option').filter(function() {
			return this.value == inputs;
		}).data('value');
		var msg = values ? 'id = ' + values : 'No Match';
		getData(values);
		transferDataToInputs();

	})	


	function getData(id){
		$.ajax({
			cache: false,
			async: false,
			type: "post",
			dataType:'json',
			url: "<?= base_url('UserGuestThermoController/sendSelectedData')?>",
			data: {'q': id},
			success:function(data){
			inputtedArrayTempIn = JSON.parse(data.inputtedArrayTempIn);
			inputtedArrayTempOut = JSON.parse(data.inputtedArrayTempOut);
			inputtedArrayRHIn = JSON.parse(data.inputtedArrayRHIn);
			inputtedArrayRHOut = JSON.parse(data.inputtedArrayRHOunt);
			selectedCertData = data;
			}  
		})
	}
	
	function transferDataToInputs(){
		function addRowInPrevCert(tableID, row, value1,value2,value3,value4,value5,value6,value7,value8,value9,value10,value11,value12,value13,value14,value15,value16,standardUsed) {
			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var rowNum = rowCount - row;
			var row = table.insertRow(rowCount);

			console.log("table.rows.length "+table.rows.length);
			rowOfTable = table.rows.length;

			var cell1 = row.insertCell(0);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempInUUCTestPointRow"+rowNum;
			//element1.className="form-control";
			element1.setAttribute('onkeyup', "correctionFromCertDisplay('tableTempInUUCTestPointRow"+rowNum+"','tableTempInCorrectedRow"+rowNum+"','tableTempInStandardTrialAverageRow"+rowNum+"','tableTempInStandardUse"+rowNum+"','tableTempInConsideringCorrectedRow"+rowNum+"');setResRead(document.getElementById('tableTempInStandardUse"+rowNum+"').value,'tableTempInUUCTestPointRow"+rowNum+"','Temperature','tableTempInRangeRow"+rowNum+"','tableTempInSTDResRow"+rowNum+"','tableTempInReadabilityRow"+rowNum+"')");
			element1.value=value1;
			cell1.appendChild(element1);

			var valueConsideringCorrection = row.insertCell(1);
			var element1 = document.createElement("input");
			element1.style="background-color: yellow;";
			element1.type = "text";
			element1.id="tableTempInConsideringCorrectedRow"+rowNum;
			//element1.className="form-control";
			valueConsideringCorrection.appendChild(element1);

			var cell2 = row.insertCell(2);
			var element1 = document.createElement("select");
			var options = document.createElement("option");
				options.innerHTML = 'Choose . . .';
				options.setAttribute('value',weightSplitted[i]);
				element1.appendChild(options);
			for(var i = 0; i<weightSplitted.length;i++){
				if(standardUsed == weightSplitted[i]){
					var options = document.createElement("option");
					options.innerHTML = weightSplitted[i];
					options.setAttribute('selected','');	
					options.setAttribute('value',weightSplitted[i]);
					element1.appendChild(options);
				}else{
					var options = document.createElement("option");
					options.innerHTML = weightSplitted[i];
					options.setAttribute('value',weightSplitted[i]);
					element1.appendChild(options);
				}
			}			
			element1.id="tableTempInStandardUse"+rowNum;
			element1.setAttribute('onchange', "setResRead(this.value,'tableTempInUUCTestPointRow"+rowNum+"','Temperature','tableTempInRangeRow"+rowNum+"','tableTempInSTDResRow"+rowNum+"','tableTempInReadabilityRow"+rowNum+"');correctionFromCertDisplay('tableTempInUUCTestPointRow"+rowNum+"','tableTempInCorrectedRow"+rowNum+"','tableTempInStandardTrialAverageRow"+rowNum+"','tableTempInStandardUse"+rowNum+"','tableTempInConsideringCorrectedRow"+rowNum+"')");
			cell2.appendChild(element1);

			var cell3 = row.insertCell(3);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempInUUCTrial1Row"+rowNum;
			//element1.className="form-control";
			element1.value=value2;
			element1.setAttribute("onkeyup", "average({trial1:'tableTempInUUCTrial1Row"+rowNum+"',trial2:'tableTempInUUCTrial2Row"+rowNum+"',trial3:'tableTempInUUCTrial3Row"+rowNum+"',aver:'tableTempInUUCTrialAverageRow"+rowNum+"'})");
			cell3.appendChild(element1);



			var cell4 = row.insertCell(4);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempInUUCTrial2Row"+rowNum;
			//element1.className="form-control";
			element1.value=value3;
			element1.setAttribute("onkeyup", "average({trial1:'tableTempInUUCTrial1Row"+rowNum+"',trial2:'tableTempInUUCTrial2Row"+rowNum+"',trial3:'tableTempInUUCTrial3Row"+rowNum+"',aver:'tableTempInUUCTrialAverageRow"+rowNum+"'})");
			cell4.appendChild(element1);

			var cell5 = row.insertCell(5);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempInUUCTrial3Row"+rowNum;
			//element1.className="form-control";
			element1.value=value4;
			element1.setAttribute("onkeyup", "average({trial1:'tableTempInUUCTrial1Row"+rowNum+"',trial2:'tableTempInUUCTrial2Row"+rowNum+"',trial3:'tableTempInUUCTrial3Row"+rowNum+"',aver:'tableTempInUUCTrialAverageRow"+rowNum+"'})");
			cell5.appendChild(element1);

			var cell6 = row.insertCell(6);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempInUUCTrialAverageRow"+rowNum;
			element1.style="background-color: yellow;";
			element1.setAttribute("tabindex", "-1");
			//element1.className="form-control";
			element1.value=value5;
			cell6.appendChild(element1);

			var cell7 = row.insertCell(7);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempInStandardTrial1Row"+rowNum;
			//element1.className="form-control";
			element1.value=value6;
			element1.setAttribute("onkeyup", "average({trial1:'tableTempInStandardTrial1Row"+rowNum+"',trial2:'tableTempInStandardTrial2Row"+rowNum+"',trial3:'tableTempInStandardTrial3Row"+rowNum+"',aver:'tableTempInStandardTrialAverageRow"+rowNum+"'}); correctionFromCertDisplay('tableTempInUUCTestPointRow"+rowNum+"','tableTempInCorrectedRow"+rowNum+"','tableTempInStandardTrialAverageRow"+rowNum+"','tableTempInStandardUse"+rowNum+"')");
			cell7.appendChild(element1);

			var cell8 = row.insertCell(8);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempInStandardTrial2Row"+rowNum;
			//element1.className="form-control";
			element1.value=value7;
			element1.setAttribute("onkeyup", "average({trial1:'tableTempInStandardTrial1Row"+rowNum+"',trial2:'tableTempInStandardTrial2Row"+rowNum+"',trial3:'tableTempInStandardTrial3Row"+rowNum+"',aver:'tableTempInStandardTrialAverageRow"+rowNum+"'}); correctionFromCertDisplay('tableTempInUUCTestPointRow"+rowNum+"','tableTempInCorrectedRow"+rowNum+"','tableTempInStandardTrialAverageRow"+rowNum+"','tableTempInStandardUse"+rowNum+"')");
			cell8.appendChild(element1);

			var cell9 = row.insertCell(9);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempInStandardTrial3Row"+rowNum;
			//element1.className="form-control";
			element1.value=value8;
			element1.setAttribute("onkeyup", "average({trial1:'tableTempInStandardTrial1Row"+rowNum+"',trial2:'tableTempInStandardTrial2Row"+rowNum+"',trial3:'tableTempInStandardTrial3Row"+rowNum+"',aver:'tableTempInStandardTrialAverageRow"+rowNum+"'}); correctionFromCertDisplay('tableTempInUUCTestPointRow"+rowNum+"','tableTempInCorrectedRow"+rowNum+"','tableTempInStandardTrialAverageRow"+rowNum+"','tableTempInStandardUse"+rowNum+"')");
			cell9.appendChild(element1);

			var cell10 = row.insertCell(10);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempInStandardTrialAverageRow"+rowNum;
			element1.style="background-color: yellow;"
			element1.setAttribute("tabindex", "-1");
			//element1.className="form-control";
			element1.value=value9;
			cell10.appendChild(element1);

			var cell11 = row.insertCell(11);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.style="background-color: yellow;"
			element1.id="tableTempInSTDResRow"+rowNum;
			//element1.className="form-control";
			element1.value=value10;
			cell11.appendChild(element1);

			var cell12 = row.insertCell(12);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempInChamberUniformityRow"+rowNum;
			element1.style="background-color: yellow;"
			element1.value=value11;
			//element1.className="form-control";
			cell12.appendChild(element1);

			var cell13 = row.insertCell(13);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempInChamberInstabilityRow"+rowNum;
			element1.style="background-color: yellow;"
			//element1.className="form-control";
			element1.value=value12;
			cell13.appendChild(element1);
			
			var cell14 = row.insertCell(14);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempInRangeRow"+rowNum;
			//element1.className="form-control";
			element1.value=value13;
			cell14.appendChild(element1);

			var cell15 = row.insertCell(15);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempInResGradRow"+rowNum;
			//element1.className="form-control";
			element1.value=value14;
			cell15.appendChild(element1);

			var cell16 = row.insertCell(16);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempInReadabilityRow"+rowNum;
			if(document.getElementById('typeOfEquipment').value.includes("analog")){
				element1.setAttribute('list','graduationList');
			}
			//element1.className="form-control";
			element1.value=value15;
			cell16.appendChild(element1);

			var cell17 = row.insertCell(17);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempInCorrectedRow"+rowNum;
			element1.setAttribute('tabindex','-1');
			element1.value=value16;
			element1.style="background-color: yellow;"
			//element1.className="form-control";
			cell17.appendChild(element1);

		

		}

		function addRowOutPrevCert(tableID, row, value1,value2,value3,value4,value5,value6,value7,value8,value9,value10,value11,value12,value13,value14,value15,value16,standardUsed) {

			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var rowNum = rowCount - row;
			var row = table.insertRow(rowCount);

			console.log("table.rows.length "+table.rows.length);
			rowOfTable = table.rows.length;

			var cell1 = row.insertCell(0);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutUUCTestPointRow"+rowNum;
			//element1.className="form-control";
			element1.value=value1;
			element1.setAttribute('onkeyup', "correctionFromCertDisplay('tableTempOutUUCTestPointRow"+rowNum+"','tableTempOutCorrectedRow"+rowNum+"','tableTempOutStandardTrialAverageRow"+rowNum+"','tableTempOutStandardUse"+rowNum+"','tableTempOutConsideringCorrectedRow"+rowNum+"');setResRead(document.getElementById('tableTempOutStandardUse"+rowNum+"').value,'tableTempOutUUCTestPointRow"+rowNum+"','Temperature','tableTempOutRangeRow"+rowNum+"','tableTempOutSTDResRow"+rowNum+"','tableTempOutReadabilityRow"+rowNum+"')");

			cell1.appendChild(element1);

			var valueConsideringCorrection = row.insertCell(1);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.style="background-color: yellow;";
			element1.id="tableTempOutConsideringCorrectedRow"+rowNum;
			//element1.className="form-control";
			valueConsideringCorrection.appendChild(element1);

			var cell2 = row.insertCell(2);
			var element1 = document.createElement("select");
			var options = document.createElement("option");
				options.innerHTML = 'Choose . . .';
				options.setAttribute('value',weightSplitted[i]);
				element1.appendChild(options);
			for(var i = 0; i<weightSplitted.length;i++){
				if(standardUsed == weightSplitted[i]){
					var options = document.createElement("option");
					options.innerHTML = weightSplitted[i];
					options.setAttribute('selected','');
					options.setAttribute('value',weightSplitted[i]);
					element1.appendChild(options);
				}else{
					var options = document.createElement("option");
					options.innerHTML = weightSplitted[i];
					options.setAttribute('value',weightSplitted[i]);
					element1.appendChild(options);
				}
							}		
							
							for(var i = 0; i<weightSplitted.length;i++){
				if(standardUsed == weightSplitted[i]){
					var options = document.createElement("option");
					options.innerHTML = weightSplitted[i];
					options.setAttribute('selected','');	
					options.setAttribute('value',weightSplitted[i]);
					element1.appendChild(options);
				}else{
					var options = document.createElement("option");
					options.innerHTML = weightSplitted[i];
					options.setAttribute('value',weightSplitted[i]);
					element1.appendChild(options);
				}
			}	
			element1.id="tableTempOutStandardUse"+rowNum;
			element1.setAttribute('onchange', "setResRead(this.value,'tableTempOutUUCTestPointRow"+rowNum+"','Temperature','tableTempOutRangeRow"+rowNum+"','tableTempOutSTDResRow"+rowNum+"','tableTempOutReadabilityRow"+rowNum+"');correctionFromCertDisplay('tableTempOutUUCTestPointRow"+rowNum+"','tableTempOutCorrectedRow"+rowNum+"','tableTempOutStandardTrialAverageRow"+rowNum+"','tableTempOutStandardUse"+rowNum+"','tableTempOutConsideringCorrectedRow"+rowNum+"')");
			cell2.appendChild(element1);

			var cell3 = row.insertCell(3);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutUUCTrial1Row"+rowNum;
			//element1.className="form-control";
			element1.value=value2;
			element1.setAttribute("onkeyup", "average({trial1:'tableTempOutUUCTrial1Row"+rowNum+"',trial2:'tableTempOutUUCTrial2Row"+rowNum+"',trial3:'tableTempOutUUCTrial3Row"+rowNum+"',aver:'tableTempOutUUCTrialAverageRow"+rowNum+"'})");
			cell3.appendChild(element1);



			var cell4 = row.insertCell(4);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutUUCTrial2Row"+rowNum;
			//element1.className="form-control";
			element1.value=value3;
			element1.setAttribute("onkeyup", "average({trial1:'tableTempOutUUCTrial1Row"+rowNum+"',trial2:'tableTempOutUUCTrial2Row"+rowNum+"',trial3:'tableTempOutUUCTrial3Row"+rowNum+"',aver:'tableTempOutUUCTrialAverageRow"+rowNum+"'})");
			cell4.appendChild(element1);

			var cell5 = row.insertCell(5);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutUUCTrial3Row"+rowNum;
			//element1.className="form-control";
			element1.value=value4;
			element1.setAttribute("onkeyup", "average({trial1:'tableTempOutUUCTrial1Row"+rowNum+"',trial2:'tableTempOutUUCTrial2Row"+rowNum+"',trial3:'tableTempOutUUCTrial3Row"+rowNum+"',aver:'tableTempOutUUCTrialAverageRow"+rowNum+"'})");
			cell5.appendChild(element1);

			var cell6 = row.insertCell(6);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutUUCTrialAverageRow"+rowNum;
			element1.style="background-color: yellow;";
			element1.setAttribute("tabindex", "-1");
			//element1.className="form-control";
			element1.value=value5;
			cell6.appendChild(element1);

			var cell7 = row.insertCell(7);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutStandardTrial1Row"+rowNum;
			//element1.className="form-control";
			element1.value=value6;
			element1.setAttribute("onkeyup", "average({trial1:'tableTempOutStandardTrial1Row"+rowNum+"',trial2:'tableTempOutStandardTrial2Row"+rowNum+"',trial3:'tableTempOutStandardTrial3Row"+rowNum+"',aver:'tableTempOutStandardTrialAverageRow"+rowNum+"'}); correctionFromCertDisplay('tableTempOutUUCTestPointRow"+rowNum+"','tableTempOutCorrectedRow"+rowNum+"','tableTempOutStandardTrialAverageRow"+rowNum+"','tableTempOutStandardUse"+rowNum+"')");
			cell7.appendChild(element1);

			var cell8 = row.insertCell(8);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutStandardTrial2Row"+rowNum;
			//element1.className="form-control";
			element1.value=value7;
			element1.setAttribute("onkeyup", "average({trial1:'tableTempOutStandardTrial1Row"+rowNum+"',trial2:'tableTempOutStandardTrial2Row"+rowNum+"',trial3:'tableTempOutStandardTrial3Row"+rowNum+"',aver:'tableTempOutStandardTrialAverageRow"+rowNum+"'}); correctionFromCertDisplay('tableTempOutUUCTestPointRow"+rowNum+"','tableTempOutCorrectedRow"+rowNum+"','tableTempOutStandardTrialAverageRow"+rowNum+"','tableTempOutStandardUse"+rowNum+"')");
			cell8.appendChild(element1);

			var cell9 = row.insertCell(9);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutStandardTrial3Row"+rowNum;
			//element1.className="form-control";
			element1.value=value8;
			element1.setAttribute("onkeyup", "average({trial1:'tableTempOutStandardTrial1Row"+rowNum+"',trial2:'tableTempOutStandardTrial2Row"+rowNum+"',trial3:'tableTempOutStandardTrial3Row"+rowNum+"',aver:'tableTempOutStandardTrialAverageRow"+rowNum+"'}); correctionFromCertDisplay('tableTempOutUUCTestPointRow"+rowNum+"','tableTempOutCorrectedRow"+rowNum+"','tableTempOutStandardTrialAverageRow"+rowNum+"','tableTempOutStandardUse"+rowNum+"')");
			cell9.appendChild(element1);

			var cell10 = row.insertCell(10);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutStandardTrialAverageRow"+rowNum;
			element1.style="background-color: yellow;";
			element1.setAttribute("tabindex", "-1");
			//element1.className="form-control";
			element1.value=value9;
			cell10.appendChild(element1);

			var cell11 = row.insertCell(11);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.style="background-color: yellow;";
			element1.id="tableTempOutSTDResRow"+rowNum;
			//element1.className="form-control";
			element1.value=value10;
			cell11.appendChild(element1);

			var cell12 = row.insertCell(12);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutChamberUniformityRow"+rowNum;
			element1.style="background-color: yellow;";
			//element1.className="form-control";
			element1.value=value11;
			cell12.appendChild(element1);

			var cell13 = row.insertCell(13);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutChamberInstabilityRow"+rowNum;
			element1.style="background-color: yellow;";
			//element1.className="form-control";
			element1.value=value12;
			cell13.appendChild(element1);

			var cell14 = row.insertCell(14);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutRangeRow"+rowNum;
			//element1.className="form-control";
			element1.value=value13;
			cell14.appendChild(element1);

			var cell15 = row.insertCell(15);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutResGradRow"+rowNum;
			//element1.className="form-control";
			element1.value=value14;
			cell15.appendChild(element1);

			var cell16 = row.insertCell(16);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutReadabilityRow"+rowNum;
			if(document.getElementById('typeOfEquipment').value.includes("analog")){
				element1.setAttribute('list','graduationList');
			}
			//element1.className="form-control";
			element1.value=value15;
			cell16.appendChild(element1);

			var cell17 = row.insertCell(17);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableTempOutCorrectedRow"+rowNum;
			element1.setAttribute('tabindex','-1');
			//element1.className="form-control";
			element1.value=value16;
			cell17.appendChild(element1);
			element1.style="background-color: yellow;";

		}

		function addRowRHPrevCert(tableID, row, value1,value2,value3,value4,value5,value6,value7,value8,value9,value10,value11,value12,value13,value14,value15,value16,standardUsed) {

			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var rowNum = rowCount - row;
			var row = table.insertRow(rowCount);

			console.log("table.rows.length "+table.rows.length);
			rowOfTable = table.rows.length;

			var cell1 = row.insertCell(0);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRHUUCTestPointRow"+rowNum;
			//element1.className="form-control";
			element1.value=value1;
			element1.setAttribute('onkeyup', "correctionFromCertRHDisplay('tableRHUUCTestPointRow"+rowNum+"','tableRHCorrectedRow"+rowNum+"','tableRHStandardTrialAverageRow"+rowNum+"','tableRHStandardUse"+rowNum+"','tableRHConsideringCorrectedRow"+rowNum+"');setResRead(document.getElementById('tableRHStandardUse"+rowNum+"').value,'tableRHUUCTestPointRow"+rowNum+"','Relative Humidity','tableRHRangeRow"+rowNum+"','tableRHSTDResRow"+rowNum+"','tableRHReadabilityRow"+rowNum+"')");

			cell1.appendChild(element1);

			var valueConsideringCorrection = row.insertCell(1);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRHConsideringCorrectedRow"+rowNum;
			element1.style="background-color: yellow;";
			//element1.className="form-control";
			valueConsideringCorrection.appendChild(element1);

			var cell2 = row.insertCell(2);
			var element1 = document.createElement("select");
			var options = document.createElement("option");
				options.innerHTML = 'Choose . . .';
				options.setAttribute('value',weightSplitted[i]);
				element1.appendChild(options);
			for(var i = 0; i<weightSplitted.length;i++){
				if(standardUsed == weightSplitted[i]){
					var options = document.createElement("option");
					options.innerHTML = weightSplitted[i];
					options.setAttribute('selected','');
					options.setAttribute('value',weightSplitted[i]);
					element1.appendChild(options);
				}else{
					var options = document.createElement("option");
					options.innerHTML = weightSplitted[i];
					options.setAttribute('value',weightSplitted[i]);
					element1.appendChild(options);
				}
				
			}			
			element1.id="tableRHStandardUse"+rowNum;
			element1.setAttribute('onchange', "setResRead(this.value,'tableRHUUCTestPointRow"+rowNum+"','Relative Humidity','tableRHRangeRow"+rowNum+"','tableRHSTDResRow"+rowNum+"','tableRHReadabilityRow"+rowNum+"');correctionFromCertRHDisplay('tableRHUUCTestPointRow"+rowNum+"','tableRHCorrectedRow"+rowNum+"','tableRHStandardTrialAverageRow"+rowNum+"','tableRHStandardUse"+rowNum+"','tableRHConsideringCorrectedRow"+rowNum+"')");
			cell2.appendChild(element1);

			var cell3 = row.insertCell(3);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRHUUCTrial1Row"+rowNum;
			//element1.className="form-control";
			element1.value=value2;
			element1.setAttribute("onkeyup", "average({trial1:'tableRHUUCTrial1Row"+rowNum+"',trial2:'tableRHUUCTrial2Row"+rowNum+"',trial3:'tableRHUUCTrial3Row"+rowNum+"',aver:'tableRHUUCTrialAverageRow"+rowNum+"'})");
			cell3.appendChild(element1);



			var cell4 = row.insertCell(4);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRHUUCTrial2Row"+rowNum;
			//element1.className="form-control";
			element1.value=value3;
			element1.setAttribute("onkeyup", "average({trial1:'tableRHUUCTrial1Row"+rowNum+"',trial2:'tableRHUUCTrial2Row"+rowNum+"',trial3:'tableRHUUCTrial3Row"+rowNum+"',aver:'tableRHUUCTrialAverageRow"+rowNum+"'})");
			cell4.appendChild(element1);

			var cell5 = row.insertCell(5);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRHUUCTrial3Row"+rowNum;
			//element1.className="form-control";
			element1.value=value4;
			element1.setAttribute("onkeyup", "average({trial1:'tableRHUUCTrial1Row"+rowNum+"',trial2:'tableRHUUCTrial2Row"+rowNum+"',trial3:'tableRHUUCTrial3Row"+rowNum+"',aver:'tableRHUUCTrialAverageRow"+rowNum+"'})");
			cell5.appendChild(element1);

			var cell6 = row.insertCell(6);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRHUUCTrialAverageRow"+rowNum;
			element1.style="background-color: yellow;";
			element1.setAttribute("tabindex", "-1");
			//element1.className="form-control";
			element1.value=value5;
			cell6.appendChild(element1);

			var cell7 = row.insertCell(7);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRHStandardTrial1Row"+rowNum;
			//element1.className="form-control";
			element1.value=value6;
			element1.setAttribute("onkeyup", "average({trial1:'tableRHStandardTrial1Row"+rowNum+"',trial2:'tableRHStandardTrial2Row"+rowNum+"',trial3:'tableRHStandardTrial3Row"+rowNum+"',aver:'tableRHStandardTrialAverageRow"+rowNum+"'}); correctionFromCertRHDisplay('tableRHUUCTestPointRow"+rowNum+"','tableRHCorrectedRow"+rowNum+"','tableRHStandardTrialAverageRow"+rowNum+"','tableRHStandardUse"+rowNum+"')");
			cell7.appendChild(element1);

			var cell8 = row.insertCell(8);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRHStandardTrial2Row"+rowNum;
			//element1.className="form-control";
			element1.value=value7;
			element1.setAttribute("onkeyup", "average({trial1:'tableRHStandardTrial1Row"+rowNum+"',trial2:'tableRHStandardTrial2Row"+rowNum+"',trial3:'tableRHStandardTrial3Row"+rowNum+"',aver:'tableRHStandardTrialAverageRow"+rowNum+"'}); correctionFromCertRHDisplay('tableRHUUCTestPointRow"+rowNum+"','tableRHCorrectedRow"+rowNum+"','tableRHStandardTrialAverageRow"+rowNum+"','tableRHStandardUse"+rowNum+"')");
			cell8.appendChild(element1);

			var cell9 = row.insertCell(9);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRHStandardTrial3Row"+rowNum;
			//element1.className="form-control";
			element1.value=value8;
			element1.setAttribute("onkeyup", "average({trial1:'tableRHStandardTrial1Row"+rowNum+"',trial2:'tableRHStandardTrial2Row"+rowNum+"',trial3:'tableRHStandardTrial3Row"+rowNum+"',aver:'tableRHStandardTrialAverageRow"+rowNum+"'}); correctionFromCertRHDisplay('tableRHUUCTestPointRow"+rowNum+"','tableRHCorrectedRow"+rowNum+"','tableRHStandardTrialAverageRow"+rowNum+"','tableRHStandardUse"+rowNum+"')");
			cell9.appendChild(element1);

			var cell10 = row.insertCell(10);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRHStandardTrialAverageRow"+rowNum;
			element1.style="background-color: yellow;";
			element1.setAttribute("tabindex", "-1");
			//element1.className="form-control";
			element1.value=value9;
			cell10.appendChild(element1);

			var cell11 = row.insertCell(11);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.style="background-color: yellow;";
			element1.id="tableRHSTDResRow"+rowNum;
			//element1.className="form-control";
			element1.value=value10;
			cell11.appendChild(element1);

			var cell12 = row.insertCell(12);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.style="background-color: yellow;";
			element1.id="tableRHChamberUniformityRow"+rowNum;
			//element1.className="form-control";
			element1.value=value11;
			cell12.appendChild(element1);

			var cell13 = row.insertCell(13);
			var element1 = document.createElement("input");
			element1.style="background-color: yellow;";
			element1.type = "text";
			element1.id="tableRHChamberInstabilityRow"+rowNum;
			//element1.className="form-control";
			element1.value=value12;
			cell13.appendChild(element1);

			var cell14 = row.insertCell(14);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRHRangeRow"+rowNum;
			//element1.className="form-control";
			element1.value=value13;
			cell14.appendChild(element1);

			var cell15 = row.insertCell(15);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRHResGradRow"+rowNum;
			//element1.className="form-control";
			element1.value=value14;
			cell15.appendChild(element1);

			var cell16 = row.insertCell(16);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRHReadabilityRow"+rowNum;
			if(document.getElementById('typeOfEquipment').value.includes("analog")){
				element1.setAttribute('list','graduationList');
			}
			//element1.className="form-control";
			element1.value=value15;
			cell16.appendChild(element1);

			var cell17 = row.insertCell(17);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRHCorrectedRow"+rowNum;
			element1.setAttribute('tabindex','-1');
			//element1.className="form-control";
			element1.value=value16;
			cell17.appendChild(element1);
			element1.style="background-color: yellow;";



		}

		function addRowRNOutPrevCert(tableID, row, value1,value2,value3,value4,value5,value6,value7,value8,value9,value10,value11,value12,value13,value14,value15,value16,standardUsed) {

			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var rowNum = rowCount - row;
			var row = table.insertRow(rowCount);

			console.log("table.rows.length "+table.rows.length);
			rowOfTable = table.rows.length;

			var cell1 = row.insertCell(0);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutUUCTestPointRow"+rowNum;
			//element1.className="form-control";
			element1.value=value1;
			element1.setAttribute('onkeyup', "correctionFromCertRHDisplay('tableRNOutUUCTestPointRow"+rowNum+"','tableRNOutCorrectedRow"+rowNum+"','tableRNOutStandardTrialAverageRow"+rowNum+"','tableRNOutStandardUse"+rowNum+"','tableRNOutConsideringCorrectedRow"+rowNum+"');setResRead(document.getElementById('tableRNOutStandardUse"+rowNum+"').value,'tableRNOutUUCTestPointRow"+rowNum+"','Relative Humidity','tableRNOutRangeRow"+rowNum+"','tableRNOutSTDResRow"+rowNum+"','tableRNOutReadabilityRow"+rowNum+"')");

			cell1.appendChild(element1);

			var valueConsideringCorrection = row.insertCell(1);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutConsideringCorrectedRow"+rowNum;
			element1.style="background-color: yellow;";
			//element1.className="form-control";
			valueConsideringCorrection.appendChild(element1);
 

			var cell2 = row.insertCell(2);
			var element1 = document.createElement("select");
			var options = document.createElement("option");
				options.innerHTML = 'Choose . . .';
				options.setAttribute('value',weightSplitted[i]);
				element1.appendChild(options);
			for(var i = 0; i<weightSplitted.length;i++){
				if(standardUsed == weightSplitted[i]){
					var options = document.createElement("option");
					options.innerHTML = weightSplitted[i];
					options.setAttribute('selected','');
					options.setAttribute('value',weightSplitted[i]);
					element1.appendChild(options);
				}else{
					var options = document.createElement("option");
					options.innerHTML = weightSplitted[i];
					options.setAttribute('value',weightSplitted[i]);
					element1.appendChild(options);
				}
			}			
			element1.id="tableRNOutStandardUse"+rowNum;
			element1.setAttribute('onchange', "setResRead(this.value,'tableRNOutUUCTestPointRow"+rowNum+"','Relative Humidity','tableRNOutRangeRow"+rowNum+"','tableRNOutSTDResRow"+rowNum+"','tableRNOutReadabilityRow"+rowNum+"');correctionFromCertRHDisplay('tableRNOutUUCTestPointRow"+rowNum+"','tableRNOutCorrectedRow"+rowNum+"','tableRNOutStandardTrialAverageRow"+rowNum+"','tableRNOutStandardUse"+rowNum+"','tableRNOutConsideringCorrectedRow"+rowNum+"')");
			cell2.appendChild(element1);

			var cell3 = row.insertCell(3);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutUUCTrial1Row"+rowNum;
			//element1.className="form-control";
			element1.value=value2;
			element1.setAttribute("onkeyup", "average({trial1:'tableRNOutUUCTrial1Row"+rowNum+"',trial2:'tableRNOutUUCTrial2Row"+rowNum+"',trial3:'tableRNOutUUCTrial3Row"+rowNum+"',aver:'tableRNOutUUCTrialAverageRow"+rowNum+"'})");
			cell3.appendChild(element1);



			var cell4 = row.insertCell(4);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutUUCTrial2Row"+rowNum;
			//element1.className="form-control";
			element1.value=value3;
			element1.setAttribute("onkeyup", "average({trial1:'tableRNOutUUCTrial1Row"+rowNum+"',trial2:'tableRNOutUUCTrial2Row"+rowNum+"',trial3:'tableRNOutUUCTrial3Row"+rowNum+"',aver:'tableRNOutUUCTrialAverageRow"+rowNum+"'})");
			cell4.appendChild(element1);

			var cell5 = row.insertCell(5);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutUUCTrial3Row"+rowNum;
			//element1.className="form-control";
			element1.value=value4;
			element1.setAttribute("onkeyup", "average({trial1:'tableRNOutUUCTrial1Row"+rowNum+"',trial2:'tableRNOutUUCTrial2Row"+rowNum+"',trial3:'tableRNOutUUCTrial3Row"+rowNum+"',aver:'tableRNOutUUCTrialAverageRow"+rowNum+"'})");
			cell5.appendChild(element1);

			var cell6 = row.insertCell(6);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutUUCTrialAverageRow"+rowNum;
			element1.style="background-color: yellow;";
			element1.setAttribute("tabindex", "-1");
			//element1.className="form-control";
			element1.value=value5;
			cell6.appendChild(element1);

			var cell7 = row.insertCell(7);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutStandardTrial1Row"+rowNum;
			//element1.className="form-control";
			element1.value=value6;
			element1.setAttribute("onkeyup", "average({trial1:'tableRNOutStandardTrial1Row"+rowNum+"',trial2:'tableRNOutStandardTrial2Row"+rowNum+"',trial3:'tableRNOutStandardTrial3Row"+rowNum+"',aver:'tableRNOutStandardTrialAverageRow"+rowNum+"'}); correctionFromCertRHDisplay('tableRNOutUUCTestPointRow"+rowNum+"','tableRNOutCorrectedRow"+rowNum+"','tableRNOutStandardTrialAverageRow"+rowNum+"','tableRNOutStandardUse"+rowNum+"')");
			cell7.appendChild(element1);

			var cell8 = row.insertCell(8);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutStandardTrial2Row"+rowNum;
			//element1.className="form-control";
			element1.value=value7;
			element1.setAttribute("onkeyup", "average({trial1:'tableRNOutStandardTrial1Row"+rowNum+"',trial2:'tableRNOutStandardTrial2Row"+rowNum+"',trial3:'tableRNOutStandardTrial3Row"+rowNum+"',aver:'tableRNOutStandardTrialAverageRow"+rowNum+"'}); correctionFromCertRHDisplay('tableRNOutUUCTestPointRow"+rowNum+"','tableRNOutCorrectedRow"+rowNum+"','tableRNOutStandardTrialAverageRow"+rowNum+"','tableRNOutStandardUse"+rowNum+"')");
			cell8.appendChild(element1);

			var cell9 = row.insertCell(9);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutStandardTrial3Row"+rowNum;
			//element1.className="form-control";
			element1.value=value8;
			element1.setAttribute("onkeyup", "average({trial1:'tableRNOutStandardTrial1Row"+rowNum+"',trial2:'tableRNOutStandardTrial2Row"+rowNum+"',trial3:'tableRNOutStandardTrial3Row"+rowNum+"',aver:'tableRNOutStandardTrialAverageRow"+rowNum+"'}); correctionFromCertRHDisplay('tableRNOutUUCTestPointRow"+rowNum+"','tableRNOutCorrectedRow"+rowNum+"','tableRNOutStandardTrialAverageRow"+rowNum+"','tableRNOutStandardUse"+rowNum+"')");
			cell9.appendChild(element1);

			var cell10 = row.insertCell(10);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutStandardTrialAverageRow"+rowNum;
			element1.style="background-color: yellow;";
			element1.setAttribute("tabindex", "-1");
			//element1.className="form-control";
			element1.value=value9;
			cell10.appendChild(element1);

			var cell11 = row.insertCell(11);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutSTDResRow"+rowNum;
			element1.style="background-color: yellow;";
			//element1.className="form-control";
			element1.value=value10;
			cell11.appendChild(element1);

			var cell12 = row.insertCell(12);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.style="background-color: yellow;";
			element1.id="tableRNOutChamberUniformityRow"+rowNum;
			//element1.className="form-control";
			element1.value=value11;
			cell12.appendChild(element1);

			var cell13 = row.insertCell(13);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutChamberInstabilityRow"+rowNum;
			element1.style="background-color: yellow;";
			//element1.className="form-control";
			element1.value=value12;
			cell13.appendChild(element1);

			var cell14 = row.insertCell(14);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutRangeRow"+rowNum;
			//element1.className="form-control";
			element1.value=value13;
			cell14.appendChild(element1);

			var cell15 = row.insertCell(15);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutResGradRow"+rowNum;
			//element1.className="form-control";
			element1.value=value14;
			cell15.appendChild(element1);

			var cell16 = row.insertCell(16);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutReadabilityRow"+rowNum;
			if(document.getElementById('typeOfEquipment').value.includes("analog")){
				element1.setAttribute('list','graduationList');
			}
			//element1.className="form-control";
			element1.value=value15;
			cell16.appendChild(element1);

			var cell17 = row.insertCell(17);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="tableRNOutCorrectedRow"+rowNum;
			element1.setAttribute('tabindex','-1');
			//element1.className="form-control";
			element1.value=value16;
			cell17.appendChild(element1);
			element1.style="background-color: yellow;";

			

		}

		function setStandardAccesso(standardAndAccess){
			var arrayStandardAndAccessories = standardAndAccess.split(',');
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
		
		var lengthOfTempIn = Object.keys(inputtedArrayTempIn).length;
		var lengthOfTempOut = Object.keys(inputtedArrayTempOut).length;
		var lengthOfRHIn = Object.keys(inputtedArrayRHIn).length;
		var lengthOfRHOut = Object.keys(inputtedArrayRHOut).length;

		document.getElementById('customer').value = selectedCertData.customer;
		document.getElementById('address').value = selectedCertData.address;
		document.getElementById('dateReceived').value = selectedCertData.dateReceived;
		document.getElementById('dateCalibrated').value = selectedCertData.dateCalibrated;
		document.getElementById('recommendedDueDate').value = selectedCertData.recommendedDueDate;
		document.getElementById('placeOfCalibration').value = selectedCertData.placeOfCalibration;
		// document.getElementById('CustomerDetails').value = selectedCertData.CustomerDetails;
		document.getElementById('equipmentDescription').value = selectedCertData.equipmentDescription;
		document.getElementById('manufacturer').value = selectedCertData.manufacturer;
		document.getElementById('modelNumber').value = selectedCertData.modelNumber;
		document.getElementById('serialNumber').value = selectedCertData.serialNumber;
		document.getElementById('equipmentID').value = selectedCertData.equipmentID;
		document.getElementById('startTemp').value = selectedCertData.startTemp;
		document.getElementById('endTemp').value = selectedCertData.endTemp;
		document.getElementById('startRh').value = selectedCertData.startRh;
		document.getElementById('endRh').value = selectedCertData.endRh;
		document.getElementById('ambTemp').value = selectedCertData.ambTemp;
		document.getElementById('ambRh').value = selectedCertData.ambRh;
		//document.getElementById('standardAndAccessories').value = selectedCertData.standardAndAccessories;
		setStandardAccesso(selectedCertData.standardAndAccessories);
		setSelectedChamber(selectedCertData.selectedChamber);
		setPrelim();
		
		document.getElementById('remarksE').value = selectedCertData.remarksE;
		document.getElementById('remarksF').value = selectedCertData.remarks;
		// document.getElementById('remarksFOthers').value = selectedCertData.remarksFOthers;
		document.getElementById('calibratedBy').value = selectedCertData.calibratedBy;
		document.getElementById('encodedBy').value = selectedCertData.encodedBy;
		document.getElementById('checkedby').value = selectedCertData.checkedby;



		getWeight();

		if(lengthOfTempIn != 0){
			for(var i = 1 ; i <= lengthOfTempIn ; i++){
				var index = i;
				addRowInPrevCert(
					'temperatureTable',
					2,
					inputtedArrayTempIn['row'+index]['tableTempInUUCTestPointRow'+index],
					inputtedArrayTempIn['row'+index]['tableTempInUUCTrial1Row'+index],
					inputtedArrayTempIn['row'+index]['tableTempInUUCTrial2Row'+index],
					inputtedArrayTempIn['row'+index]['tableTempInUUCTrial3Row'+index],
					inputtedArrayTempIn['row'+index]['tableTempInUUCTrialAverageRow'+index],
					inputtedArrayTempIn['row'+index]['tableTempInStandardTrial1Row'+index],
					inputtedArrayTempIn['row'+index]['tableTempInStandardTrial2Row'+index],
					inputtedArrayTempIn['row'+index]['tableTempInStandardTrial3Row'+index],
					inputtedArrayTempIn['row'+index]['tableTempInStandardTrialAverageRow'+index],
					inputtedArrayTempIn['row'+index]['tableTempInSTDResRow'+index],
					inputtedArrayTempIn['row'+index]['tableTempInChamberUniformityRow'+index],
					inputtedArrayTempIn['row'+index]['tableTempInChamberInstabilityRow'+index],
					inputtedArrayTempIn['row'+index]['tableTempInRangeRow'+index],
					inputtedArrayTempIn['row'+index]['tableTempInResGradRow'+index],
					inputtedArrayTempIn['row'+index]['tableTempInReadabilityRow'+index],
					inputtedArrayTempIn['row'+index]['tableTempInCorrectedRow'+index],
					inputtedArrayTempIn['row'+index]['tableTempInStandardUse'+index],
				);
				correctionFromCertDisplay(
					"tableTempInUUCTestPointRow"+index,
					"tableTempInCorrectedRow"+index,
					"tableTempInStandardTrialAverageRow"+index,
					"tableTempInStandardUse"+index,
					"tableTempInConsideringCorrectedRow"+index
				)
			}
		}
		if(lengthOfTempOut != 0){
			for(var i = 1 ; i <= lengthOfTempOut; i++){
				var index = i;
				addRowOutPrevCert(
					'temperatureTableOut',
					2,
					inputtedArrayTempOut['row'+index]['tableTempOutUUCTestPointRow'+index],
					inputtedArrayTempOut['row'+index]['tableTempOutUUCTrial1Row'+index],
					inputtedArrayTempOut['row'+index]['tableTempOutUUCTrial2Row'+index],
					inputtedArrayTempOut['row'+index]['tableTempOutUUCTrial3Row'+index],
					inputtedArrayTempOut['row'+index]['tableTempOutUUCTrialAverageRow'+index],
					inputtedArrayTempOut['row'+index]['tableTempOutStandardTrial1Row'+index],
					inputtedArrayTempOut['row'+index]['tableTempOutStandardTrial2Row'+index],
					inputtedArrayTempOut['row'+index]['tableTempOutStandardTrial3Row'+index],
					inputtedArrayTempOut['row'+index]['tableTempOutStandardTrialAverageRow'+index],
					inputtedArrayTempOut['row'+index]['tableTempOutSTDResRow'+index],
					inputtedArrayTempOut['row'+index]['tableTempOutChamberUniformityRow'+index],
					inputtedArrayTempOut['row'+index]['tableTempOutChamberInstabilityRow'+index],
					inputtedArrayTempOut['row'+index]['tableTempOutRangeRow'+index],
					inputtedArrayTempOut['row'+index]['tableTempOutResGradRow'+index],
					inputtedArrayTempOut['row'+index]['tableTempOutReadabilityRow'+index],
					inputtedArrayTempOut['row'+index]['tableTempOutCorrectedRow'+index],
					inputtedArrayTempOut['row'+index]['tableTempOutStandardUse'+index],
				);
				correctionFromCertDisplay(
					"tableTempOutUUCTestPointRow"+index,
					"tableTempOutCorrectedRow"+index,
					"tableTempOutStandardTrialAverageRow"+index,
					"tableTempOutStandardUse"+index,
					"tableTempOutConsideringCorrectedRow"+index
				)
			}

		}
		if(lengthOfRHIn != 0){
			for(var i = 1 ; i <= lengthOfRHIn; i++){
				var index = i;
				addRowRHPrevCert(
					'temperatureTableRH',
					2,
					inputtedArrayRHIn['row'+index]['tableRHUUCTestPointRow'+index],
					inputtedArrayRHIn['row'+index]['tableRHUUCTrial1Row'+index],
					inputtedArrayRHIn['row'+index]['tableRHUUCTrial2Row'+index],
					inputtedArrayRHIn['row'+index]['tableRHUUCTrial3Row'+index],
					inputtedArrayRHIn['row'+index]['tableRHUUCTrialAverageRow'+index],
					inputtedArrayRHIn['row'+index]['tableRHStandardTrial1Row'+index],
					inputtedArrayRHIn['row'+index]['tableRHStandardTrial2Row'+index],
					inputtedArrayRHIn['row'+index]['tableRHStandardTrial3Row'+index],
					inputtedArrayRHIn['row'+index]['tableRHStandardTrialAverageRow'+index],
					inputtedArrayRHIn['row'+index]['tableRHSTDResRow'+index],
					inputtedArrayRHIn['row'+index]['tableRHChamberUniformityRow'+index],
					inputtedArrayRHIn['row'+index]['tableRHChamberInstabilityRow'+index],
					inputtedArrayRHIn['row'+index]['tableRHRangeRow'+index],
					inputtedArrayRHIn['row'+index]['tableRHResGradRow'+index],
					inputtedArrayRHIn['row'+index]['tableRHReadabilityRow'+index],
					inputtedArrayRHIn['row'+index]['tableRHCorrectedRow'+index],
					inputtedArrayRHIn['row'+index]['tableRHStandardUse'+index],
				);
				correctionFromCertRHDisplay(
					"tableRHUUCTestPointRow"+index,
					"tableRHCorrectedRow"+index,
					"tableRHStandardTrialAverageRow"+index,
					"tableRHStandardUse"+index,
					"tableRHConsideringCorrectedRow"+index
				)
			}
		}
		if(lengthOfRHOut != 0){
			for(var i = 1 ; i <= lengthOfRHOut ; i++){
				var index = i;
				addRowRNOutPrevCert(
					'temperatureTableRNOut',
					2,
					inputtedArrayRNOut['row'+index]['tableRNOutUUCTestPointRow'+index],
					inputtedArrayRNOut['row'+index]['tableRNOutUUCTrial1Row'+index],
					inputtedArrayRNOut['row'+index]['tableRNOutUUCTrial2Row'+index],
					inputtedArrayRNOut['row'+index]['tableRNOutUUCTrial3Row'+index],
					inputtedArrayRNOut['row'+index]['tableRNOutUUCTrialAverageRow'+index],
					inputtedArrayRNOut['row'+index]['tableRNOutStandardTrial1Row'+index],
					inputtedArrayRNOut['row'+index]['tableRNOutStandardTrial2Row'+index],
					inputtedArrayRNOut['row'+index]['tableRNOutStandardTrial3Row'+index],
					inputtedArrayRNOut['row'+index]['tableRNOutStandardTrialAverageRow'+index],
					inputtedArrayRNOut['row'+index]['tableRNOutSTDResRow'+index],
					inputtedArrayRNOut['row'+index]['tableRNOutChamberUniformityRow'+index],
					inputtedArrayRNOut['row'+index]['tableRNOutChamberInstabilityRow'+index],
					inputtedArrayRNOut['row'+index]['tableRNOutRangeRow'+index],
					inputtedArrayRNOut['row'+index]['tableRNOutResGradRow'+index],
					inputtedArrayRNOut['row'+index]['tableRNOutReadabilityRow'+index],
					inputtedArrayRNOut['row'+index]['tableRNOutCorrectedRow'+index],
					inputtedArrayRNOut['row'+index]['tableRNOutStandardUse'+index],
				);
				correctionFromCertRHDisplay(
					"tableRNOutUUCTestPointRow"+index,
					"tableRNOutCorrectedRow"+index,
					"tableRNOutStandardTrialAverageRow"+index,
					"tableRNOutStandardUse"+index,
					"tableRNOutConsideringCorrectedRow"+index
				)
			}
		}


	}
	

</script>
        </div>
      </div>
      <!-- /#page-content-wrapper -->
    </div>
  </body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="dashboardAsset/lib/jquery/jquery.min.js"></script>
<script src="dashboardAsset/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dashboardAsset/lib/feathericons/feather.min.js"></script>
<script src="dashboardAsset/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="dashboardAsset/assets/js/script.js"></script>
<script>
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

        personnels.forEach(item => {
            var option = document.createElement('option');
            option.setAttribute('value', item.personnelName);
            option.innerHTML = item.personnelName;
            calibrationOfficer.appendChild(option);
        })
        verifiers.forEach(item => {
            var option = document.createElement('option');
            option.setAttribute('value', item.verifierName);
            option.setAttribute('data-verifierposition', item.verifierPosition);
            option.innerHTML = item.verifierName;
            verifier.appendChild(option);

            var option = document.createElement('option');
            option.setAttribute('value', item.verifierPosition);
            option.setAttribute('data-verifiername', item.verifierName);
            option.innerHTML = item.verifierPosition;
            verifierPosition.appendChild(option);
        })
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
            copyFromDataset('encodedBy', 'checkedby', 'verifierposition')
        });
        bind('checkedby','change',function(){
            copyFromDataset('checkedby', 'encodedBy', 'verifiername')
        });
	}
	bindEventsToInputAndButtons()

	function copyFromDataset(copyFrom, copyTo, datasetName){
        var from = document.getElementById(copyFrom);
        var to = document.getElementById(copyTo);
        to.value = from.selectedOptions[0].dataset[datasetName];
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

.use_prev{
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








