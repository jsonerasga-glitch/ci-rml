<?php
use App\Models\ElectModel_3;
use App\Models\ElectModel_2;
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
 


?>
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
  <script type="text/javascript">
   <?php 
//    if(!isset($_GET['SN'])){
// 	   $sn=NULL;
// 	   echo " $(window).on('load', function() {
//         $('#staticBackdrop').modal('show');
//     });";
//    }else{
// 	   $sn= isset($_GET['SN']) ? $_GET['SN'] : NULL;
//    }
   $sn= $elect_table_1['weight'];
   $SNARRAY;
	if($sn == null){
		$sn = '0,0';
		$SNARRAY = explode(",", $sn);
	}else{
		$SNARRAY = explode(",", $sn);
	}
	
   ?>
   </script>

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
    
    <link href="/dashboardAsset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="/dashboardAsset/lib/remixicon/fonts/remixicon.css" rel="stylesheet">
    
    <!-- Template CSS -->
    <link rel="stylesheet" href="/dashboardAsset/assets/css/style.min.css">
   </head>  
  <body class="skin-base animate">
	<div class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-logo"><span></span></a>
        <a href="#" class="sidebar-logo-text">RML<span>++</span></a>
      </div><!-- sidebar-header -->
      <div class="sidebar-body">
        <ul class="nav-sidebar">
          <li class="nav-item active show">
            <a href="" onclick="window.location.href = '/guestDashboard'" class="nav-link"><i data-feather="home"></i><span>Dashboard</span></a>              
          </li>
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i data-feather="clipboard"></i><span>Certificates</span></a>
            <nav class="nav-sub">
              <a href="#" onclick="window.location.href = '/guestAddElect'"  class="sub-link" style="">Single Range E-balance</a>
              <a href="#" onclick="window.location.href = '/guestAddThermo'"  class="sub-link">Thermohygrometer</a>
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
              <a href="#" onclick="window.location.href = '/guestTestWeightStandardTable'" class="sub-link">Test Weights</a>
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
        <a href="" class="avatar online" onclick="logoutConfirmation('<?= base_url('logout') ?>')">
            <span class="avatar-initial">
                <?php $user1 = session('name'); $fstchar = $user1[0]; echo $fstchar;?>
            </span>
        </a>
        <div class="avatar-body">
          <div class="d-flex align-items-center justify-content-between">
            <h6><?= session('name')?> <?= session('lname')?></h6>
          </div>
          <span>Administrator</span>
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
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid" style="background-color:#f9f9f9;">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                 </div>
					<!--h1 class="mt-4">Admin Dashboard</h1--> 
					<div class="container-fluid ">
						<!--h1 class="mt-4">Admin Dashboard</h1-->
						<div id="userTable"> </div>
						<div class="">
							<div class="card shadow p-3 mb-5 mt-4 bg-white rounded">
								<div class="card-header bg-white">
									<!-- HEADER --> 
										<!--div class="row text-center mt-4">
											<div class="col-3">
												<img src="<?php #echo $base64; ?>" alt="DOST LOGO" height='90px' style=" top:0"> 
											</div>
											<div class="col-6 mt-n4">
												<h6>Republic of the Philippines</h6>
												<h6>DEPARTMENT OF SCIENCE AND TECHNOLOGY</h6>
												<h6>CALABARZON</h6>
												<h6>Regional Metrology Laboratory</h6>
											</div>
											<div class="col-3">
												<img src="<?php# echo $base64PAB; ?>" alt="PAB LOGO" height='90px' style="">
											</div>			
										</div-->
									<!-- HEADER -->	

										<div class="row mt-2">
											<h2 class="mx-auto d-flex justify-content-center">Single Range Electronic Balance</h2>
										</div>
										<div class="row mt-n2 mb-3">
											<h4 class="mx-auto d-flex justify-content-center">(Update)Calibration Worksheet</h4>
										</div>
										<div class="row mt-2">
											<form action="<?= base_url('guestElectUpdateData') ?>" method="POST" id='formMain' enctype="multipart/form-data">
											<input type="hidden" name="idHere" value="<?=$elect_table_1['id']?>">
											<input type="hidden" name="completion" id="completion">
									<!-- INFORMATION DONE-->
										<div class='row'>
											<div class='col-xl-6 col-12'>
												<i>Important: Please make sure that no space is added in Certificate No.</i><b style="color: red;"> *</b>
												<div class="mb-3">
													<label>Certificate No. <i style="color: red;">(If the textbox changes to red, it means that the Cert. No. is currently in use.)</i></label>
													<input name='certificateNumber' type="text" class="form-control  mt-n2 " value="<?=$elect_table_1['certificateNumber']?>"/>
												</div>
												<div class="mb-3">
													<label>Customer</label>
													<input name='customer' id="customer" list='customerList' required type="text" class="form-control mt-n2 text-break" onchange="getCustomerDetails()" value="<?=$elect_table_1['customer']?>">
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
													<input type="hidden" name="idOfCustomer" id="idOfCustomer">													</div>
												<div class="mb-3">
													<label for="">Address</label>
													<textarea name='address' id='address' style="" required type="text" class="form-control mt-n2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" style="margin-top: 0px;margin-bottom: 0px;height: 80px;"><?=$elect_table_1['address']?></textarea>
												</div>
											</div>
											<div class='col-xl-6 col-12'>
												<h6>Dates</h6>
												<div class="row mt-2">
													<div class="col-6 mb-3 ">
														<label for="">Date Received</label>
														<input name='dateReceived' required type="date" class="form-control mt-n2 text-break" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  value="<?=$elect_table_1['dateReceived']?>">
													</div>
													<div class="col-6 mb-3 ">
														<label>Date Calibrated</label>
														<input name='dateCalibrated' id="sDate" required type="date" class="form-control mt-n2 text-break" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?=$elect_table_1['dateCalibrated']?>">
													</div>
												</div>
												
												<div class="row mb-3">
													<div class="col-5">
														<label>Recommended Due Date</label>
														<select id="mon" class="form-control mt-n1" style="height: 50px;">
															<option value="">Select range</option>
															<option value="6">6 Months</option>
															<option value="12">1 Year</option>
															<option value="24">2 Years</option>
														</select>
													</div>
													<div class="col mt-4">
														<input name='recommendedDueDate' id="eDate" required type="date" class="form-control text-break" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?=$elect_table_1['recommendedDueDate']?>">
													</div>
													
												</div>
												<div class=" mb-3">
													<label>Place of Calibration</label> <br>
													<select id="test" class="form-control" name="placeOfCalibration">
														<option class=""  value="<?=$elect_table_1['placeOfCalibration']?>"><?=$elect_table_1['placeOfCalibration']?></option>
														<option class="non" value="Mass Lab">Mass Lab</option>
														<option class="non" value="On site">On site</option>
														<option class="editable" value="">Type here..</option>
													</select>
													<input class="editOption form-control" name="" style="display:none;  width: 90%; position: relative; top: -38px"></input>
												
												</div>
											</div>

											

										</div>
									<!-- INFORMATION -->
										<hr> 
										
									<!-- ENVIRONMENT -->
										<div class="mx-auto d-flex justify-content-center">
											<h5>Environment Condition</h5>
										</div>
										<div class='row mb-3'>
											<div class='col-6 col-xl-3 mt-2'>
													<label>Start Temp (°C)</label>
													<input oninput="averageTempRh()" name="startTemp" value="<?=$elect_table_1['startTemp']?>" required id="startTemp" type="text" class="form-control mt-n2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
											</div>
											<div class="col-6 col-xl-3 mt-2">
												<label>End Temp (°C)</label>
												<input oninput="averageTempRh()" name="endTemp" value="<?=$elect_table_1['endTemp']?>" required id="endTemp" type="text" class="form-control mt-n2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
											</div>
											<div class="col-6 col-xl-3 mt-2">
												<label>Average Temp (°C)</label>
													<input readonly name="aveTemp" required style="background-color: #F1C40F;" id="aveTemp" value="<?=$elect_table_1['aveTemp']?>" type="text" class="form-control mt-n2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
												
											</div>
											<div class="col-6 col-xl-3 mt-2">
												<label for="">Place of Calibration</label>
												<select name="" class="form-control mt-n2" id="locTemp"  onchange="myFunction(event)">
													<option value="">Drop down to select location</option>
													<option value="23 ± 3 °C">Base Lab</option>
													<option value="">On Site</option>
												</select>
											</div>
										</div>
										<div class="row mb-3">
												<div class="col-6 col-xl-3 mt-2">
													<label>Start RH (% RH)</label>
													<input oninput="averageTempRh()" value="<?=$elect_table_1['startRh']?>" name="startRh" id="startRh" type="text" class="form-control mt-n2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
												</div>
												<div class="col-6 col-xl-3 mt-2">
													<label>End RH (% RH)</label>
													<input oninput="averageTempRh()" value="<?=$elect_table_1['endRh']?>" name="endRh" id="endRh" type="text" class="form-control mt-n2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
												</div>
												<div class="col-6 col-xl-3 mt-2">
													<label>Average RH (% RH)</label>
													<input readonly style="background-color: #F1C40F;" name="AveRh" value="<?=$elect_table_1['AveRh']?>" required id="AveRh" type="text" class="form-control mt-n2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
												</div>
												<div class="col-6 col-xl-3 mt-2">
												<label for="">Place of Calibration</label>
													<select name="" class="form-control mt-n2" id="locRh"  onchange="myFunction1(event)">
														<option value="">Drop down to select location</option>
														<option value="55 ± 15 %RH">Base Lab</option>
														<option value="">On Site</option>
													</select>
												</div>		
										</div>
									<!-- ENVIRONMENT -->
										<hr>
									<!-- SPECIFICATION -->	
										<div class="mx-auto d-flex justify-content-center">
												<h5>Specifications of the Weighing Instrument</h5>
											</div>
										<div class='row'>
											<div class='col-6 '>
												<div class=" mb-3">
													<label>Equipment Description</label>
													<input name='equipmentDescription' id='equipmentDescription' required type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?=$elect_table_1['equipmentDescription']?>">
												</div>
												<div class=" mb-3">
													<label>Manufacturer</label>
													<input name="manufacturer" required type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?=$elect_table_1['manufacturer']?>">
												</div>
												<div class=" mb-3">
													<span>Model No.</span>
													<input name='modelNumber' required type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?=$elect_table_1['modelNumber']?>">
												</div>
												<div class=" mb-3">
													<span >Serial No.</span>
													<input name='serialNumber' required type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?=$elect_table_1['serialNumber']?>">
												</div>
												
											</div>
											<div class='col-6 '>
												<div class=" mb-3">
													<label>Equipment ID.</label>
													<input name='equipmentID' required type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default " value="<?=$elect_table_1['equipmentID']?>">
												</div>
												<label>Maximum Capacity</label>
												<div class="input-group mb-3">
													<input name='maxCapacity' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?=$elect_table_1['maxCapacity']?>">
													<div class="input-group-append">
														<select name='maxCapacityMeasurement' required class="form-select btn-outline-secondary" aria-label=".form-select-sm example" value="<?=$elect_table_1['maxCapacity']?>">
															<option selected>Choose. . .</option>
															<option value="mg" <?php if($elect_table_1['maxCapacityMeasurement'] == 'mg'){echo"selected";}?>>mg</option>
															<option value="g"<?php if($elect_table_1['maxCapacityMeasurement'] == 'g'){echo"selected";}?>>g</option>
															<option value="kg"<?php if($elect_table_1['maxCapacityMeasurement'] == 'kg'){echo"selected";}?>>kg</option>
														</select>
													</div>
												</div>
												<label>Minimum Capacity</label>
												<div class="input-group mb-3">
													<input name='minCapacity' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?=$elect_table_1['minCapacity']?>">
													<div class="input-group-append">
														<select name='minCapacityMeasurement' required class="form-select btn-outline-secondary" aria-label=".form-select-sm example">
															<option selected>Choose. . .</option>
															<option value="mg" <?php if($elect_table_1['minCapacityMeasurement'] == 'mg'){echo"selected";}?>>mg</option>
															<option value="g"<?php if($elect_table_1['minCapacityMeasurement'] == 'g'){echo"selected";}?>>g</option>
															<option value="kg"<?php if($elect_table_1['minCapacityMeasurement'] == 'kg'){echo"selected";}?>>kg</option>
														</select>
													</div>
												</div>
												<label>Readability</label>
												<div class="input-group mb-3">
													<input name='readability' required id='readability' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?=$elect_table_1['readability']?>">
													<div class="input-group-append">
													<select name='readabilityMeasurement' required id='readabilityMeasurement' onchange="console.log(this.value)" class="form-select btn-outline-secondary" aria-label=".form-select-sm example">
														<option selected>Choose. . .</option>
														<option value="mg" <?php if($elect_table_1['readabilityMeasurement'] == 'mg'){echo"selected";}?>>mg</option>
														<option value="g"<?php if($elect_table_1['readabilityMeasurement'] == 'g'){echo"selected";}?>>g</option>
														<option value="kg"<?php if($elect_table_1['readabilityMeasurement'] == 'kg'){echo"selected";}?>>kg</option>
													</select>
													</div>
												</div>
											
												
											</div>		
										</div>
									<!-- SPECIFICATION -->
										<hr>
										<br>

									

										
									<!-- WEIGHTS -->
										<div class='position-relative'>
											<div class="mx-auto d-flex justify-content-center">
												<h5>Weights</h5>
											</div>

											<br>
											<div class="mx-auto d-flex justify-content-center">   						
												<input name='weight' required class="form-check-input" type="hidden" id="weight" value="<?php echo $sn ?>">
												<!-- <a href="<?php //base_url('electHome') ?>" class="btn btn-danger float-end" style="right:0;top:0;"><i class="fas fa-balance-scale"></i> Change Weight</a> -->
												<button type="button" class="btn btn-danger float-end btn-lg" style="right:0;top:0;" data-toggle="modal" data-target="#staticBackdrop">
												Select/Change Weight
												</button>
												
												
												
											</div>
											
											
										</div>
									<!-- WEIGHTS -->
										<hr>
										<br>
									<!-- PRELIMINARY -->
										<div class='position-relative'>
											<div class="position-absolute top-0 start-50 translate-middle">
												<h6>Preliminary Inspection</h6>
											</div>
											<br>
											<div class="start-50" style=>
												<div class="form-check">
													<input name="premA" class="form-check-input" type="checkbox" value="A" id="premA"  <?php if($elect_table_1['premA'] != NULL){echo"checked";}?>>
													<label class="form-check-label" for="premA">
													The equipment should be free from dust and dirt
													</label>
												</div>
												<div class="form-check">
													<input name="premB" class="form-check-input" type="checkbox" value="B" id="premB"<?php if($elect_table_1['premB'] != NULL){echo"checked";}?>>
													<label class="form-check-label" for="premB">
													The weighing pan should be clean and in proper form
													</label>
												</div>
												<div class="form-check">
													<input name="premC" class="form-check-input" type="checkbox" value="C" id="premC"<?php if($elect_table_1['premC'] != NULL){echo"checked";}?>>
													<label class="form-check-label" for="premC">
													The readout display shall be without defects (such as color changes) that would impair the reading of the indication
													</label>
												</div>
												<div class="form-check">
													<input name="premD" class="form-check-input" type="checkbox" value="D" id="premD"<?php if($elect_table_1['premD'] != NULL){echo"checked";}?>>
													<label class="form-check-label" for="premD">
													Level the instrument if indicating means is provided and note its conditions
													</label>
												</div>
												<div class="form-check">
													<input name="premE" class="form-check-input" type="checkbox" value="E" id="premE"<?php if($elect_table_1['premE'] != NULL){echo"checked";}?>>
													<label class="form-check-label" for="premE">
													Check the tare mechanism if available
													</label>
												</div>
												<div class="form-check">
													<input name="premF" class="form-check-input" type="checkbox" value="F" id="premF"<?php if($elect_table_1['premF'] != NULL){echo"checked";}?>>
													<label class="form-check-label" for="premF">
													Exercise the instrument by loading up to 80% of maximum capacity
													</label>
												</div>
												<div class="form-check">
													<input name="premG" class="form-check-input" type="checkbox" value="G" id="premG"<?php if($elect_table_1['premG'] != NULL){echo"checked";}?>>
													<label class="form-check-label" for="premG">
													Record all necessary and vital information
													</label>
												</div>
											</div>
										</div>
									<!-- PRELIMINARY -->
										<hr>
										<br>
									<!-- ECCENTRICITY -->
										<div class="position-relative" id='eccentricityTest'>
											<div class=" row ">
												<h6 class='col text-center'>Eccentricity Test <select  class="btn-outline-secondary " name="eccentricityUnit" required onchange="console.log(this.value)">
														<option selected>Choose. . .</option>
														<option value="mg" <?php if($elect_table_1['eccentricityUnit'] == 'mg'){echo"selected";}?>>mg</option>
														<option value="g"<?php if($elect_table_1['eccentricityUnit'] == 'g'){echo"selected";}?>>g</option>
														<option value="kg"<?php if($elect_table_1['eccentricityUnit'] == 'kg'){echo"selected";}?>>kg</option>
													</select></h6>
											</div>
											<br>
											<table class="table">
												<thead>
													<tr>
													<th scope="col" style="text-align: center;">Load Position</th>
													<th scope="col" style="text-align: center;">Indication</th>
													<th scope="col" style="text-align: center;">Error</th>
													<th scope="col"></th>	
													</tr>
												</thead>
												<tbody>
													<tr>
														<td style="text-align: center;">						
															1
														</td>
														<td>						
															<input type="text" class="form-control" id='eccentricity1Start' oninput='eccentricityError(this.id)' name="eccentricity1Start" required value="<?=$elect_table_1['eccentricity1Start']?>">
														</td>
														<td class="table-secondary">						
														</td>
														<td class="table-secondary">						
														</td>
													</tr>
													<tr>
														<td style="text-align: center;">						
															2
														</td>
														<td>						
															<input type="text" class="form-control" id='eccentricity2' name='eccentricity2' required oninput='eccentricityError(this.id)' value="<?=$elect_table_1['eccentricity2']?>">
														</td>
														<td >
														<input type="hidden"id="error2" name="error2" value="<?=$elect_table_1['error2']?>">
														<input type="text" class="form-control" id="error2View" name="error2View" readonly style="background-color: #F1C40F;" required value="<?=$elect_table_1['error2View']?>">						
														</td>
														<th scope="col" class='align-middle' style="text-align: center;">Load</th>
													</tr>
													<tr>
														<td style="text-align: center;">						
															3
														</td>
														<td>						
															<input type="text" class="form-control" id='eccentricity3' name='eccentricity3' required oninput='eccentricityError(this.id)' value="<?=$elect_table_1['eccentricity3']?>">
														</td>
														<td>
															<input type="hidden"id="error3" name="error3" value="<?=$elect_table_1['error3']?>">
															<input type="text" class="form-control" id="error3View" name="error3View" readonly style="background-color: #F1C40F;" required value="<?=$elect_table_1['error3View']?>">						
														</td>
														<td>
															<input type="text" class="form-control" name="load" id="load" required value="<?=$elect_table_1['load']?>">						
														</td>
													</tr>
													<tr>
														<td style="text-align: center;">						
															4
														</td>
														<td>						
															<input type="text" class="form-control" id='eccentricity4' name='eccentricity4' required oninput='eccentricityError(this.id)' value="<?=$elect_table_1['eccentricity4']?>">
														</td>
														<td>
														<input type="hidden"id="error4" name="error4" value="<?=$elect_table_1['error4']?>">
														<input type="text" class="form-control" id="error4View" name="error4View" readonly style="background-color: #F1C40F;" required value="<?=$elect_table_1['error4View']?>">						
														</td>
														<th scope="col" class='align-middle' style="text-align: center;">Error Difference</th>
													</tr>
													<tr>
														<td style="text-align: center;">						
															5
														</td>
														<td>						
															<input type="text" class="form-control" id='eccentricity5' name='eccentricity5' required oninput='eccentricityError(this.id)' value="<?=$elect_table_1['eccentricity5']?>">
														</td>
														<td>
															<input type="hidden"id="error5" name="error5" value="<?=$elect_table_1['error5']?>">
															<input type="text" class="form-control"id="error5View" name="error5View" readonly style="background-color: #F1C40F;" required value="<?=$elect_table_1['error5View']?>">						
														</td>
														<td>
															<input type="text" class="form-control" id="errDiff" name="errDiff" required readonly style="background-color: #F1C40F;" value="<?=$elect_table_1['errDiff']?>">						
														</td>
													</tr>
													<tr>
														<td style="text-align: center;">						
															1
														</td>
														<td>						
															<input type="text" class="form-control" id='eccentricity1End' name='eccentricity1End' required oninput='eccentricityError(this.id)' value="<?=$elect_table_1['eccentricity1End']?>">
														</td>
														<td>
															<input type="hidden"id="error1" name="error1" value="<?=$elect_table_1['error1']?>">
															<input type="text" class="form-control" id="error1View" name="error1View" readonly style="background-color: #F1C40F;" required value="<?=$elect_table_1['error1View']?>">						
														</td>
														<td  class="table-secondary"></td>
													</tr>
													
												</tbody>
											</table>
											<br>
											<div class="position-relative">
												<div class="position-absolute top-0 start-50 translate-middle">
													<h6>Illustration</h6>
												</div>
												
												<br>
												<div class='row '>
													<div class="form-check col d-flex justify-content-center">
														<div class="input-group-prepend">
															<input class="form-check-input me-3" type="checkbox" value="A" id="illusA" name="illusA" <?php if($elect_table_1['illusA'] != Null){echo"checked";}?>>
														</div>	
														<label class="form-check-label" for="illusA">
															<img src="<?php echo $base64IllusA; ?>" alt="DOST LOGO" height='90px' > 
														</label>
													</div>
													<div class="form-check col d-flex justify-content-center">
														<div class="input-group-prepend">
															<input class="form-check-input me-3" type="checkbox" value="B" id="illusB" name="illusB" <?php if($elect_table_1['illusB'] != Null){echo"checked";}?>>
														</div>	
														<label class="form-check-label" for="illusB">
															<img src="<?php echo $base64IllusB; ?>" alt="DOST LOGO" height='90px' > 
														</label>
													</div>
												</div>
											</div>
											<br>
										</div>
									
									<!-- ECCENTRICITY -->
										<hr>
										<br>
									<!-- LINEARITY -->
											<div class="position-relative">
												<div class=" row ">
													<!--div class="col-4 text-left ml-5 card ">		
														<h5>Weight Conversion KG to G</h5>		
															<input id="inputKG" type="number" placeholder="Enter Kilogram" 
															oninput="KgtoGConverter(this.value)" onchange="KgtoGConverter(this.value)">
															</p>
															<h4>Result: <b><u><span id="outputGrams"></span></u> grams</b></h4>
													</div-->
													<h6 class='col text-center'>Linearity Test <select class="btn-outline-secondary " name="linearityUnit" id="linearityUnit" required>
															<option selected>Choose. . .</option>
															<option value="mg" <?php if($elect_table_1['linearityUnit'] == 'mg'){echo"selected";}?>>mg</option>
															<option value="g"<?php if($elect_table_1['linearityUnit'] == 'g'){echo"selected";}?>>g</option>
															<option value="kg"<?php if($elect_table_1['linearityUnit'] == 'kg'){echo"selected";}?>>kg</option>
														</select> <!--button type="button" class="btn btn-warning" onclick="calculateExtendedUncert()">Calculate Expanded Ucertainty</button--></h6>
												</div>
												<input type="text" required style="display:none" id="calculateExtendUncert"> 
												<br>
											
												<i>Note: If you're using mobile phone, switch to landscape mode.</i>
												<table class="table table-bordered table-sm text-center" >
													<thead>
														<tr>
															<th>Load</th>
															<th>Indication</th>
															<th>Standard Used</th>
															<th style="font-size:.9em">Conventional Mass (g)</th>
															<th style="font-size:.9em">Conventional Mass <select class=" " name="" id="" onchange="triggerConversionOfCovenMass(this.value)">
																		<option selected>Choose. . .</option>
																		<option value="mg" <?= set_select('linearityUnit[]', 'mg'); ?>>(mg)</option>
																		<option value="g" <?= set_select('linearityUnit[]', 'g'); ?>>(g)</option>
																		<option value="kg" <?= set_select('linearityUnit[]', 'kg'); ?>>(kg)</option>
																	</select>
																</th>
															<th>Error</th>
															<th style="font-size:.9em">Expanded Uncertainty</th>
															<th>k</th>	
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>						
																<input type="text" class="form-control" name="linearLoad1" required id="linearLoad1" value="<?=$elect_table_1['linearLoad1']?>">
															</td>
															<td>						
																<input type="text" class="form-control" name="indication1" required id="indication1" value="<?=$elect_table_1['indication1']?>"onchange="LinearityError({covenMass:'convenMassG1',Indiction:'indication1',LinError:'linearError1'})">
															</td>
															<td>						
															<div class="input-group ">
													<input type="text" tabindex="30" class="form-control" placeholder="" id="mark1" name="mark1" value="<?=$elect_table_1['markings1']?>">
													<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="selectedInd({id:'1'})">
													+
													</button>
													<button type="button" class="btn btn-danger" onclick="DeleteInd({id:'1'})">
													-
													</button></div>
															</td>
															<td>						
																<input type="text" class="form-control" name="convenMass1" required readonly style="background-color: #F1C40F;" id="convenMass1" value="<?=$elect_table_1['convenMass1']?>">
															</td>
															<td>	
																<div class="input-group">
																	<input type="text" tabindex="38" class="form-control" name="convenMassG1" required readonly style="background-color: #F1C40F;" id="convenMassG1" value="<?=$elect_table_1['convenMassG1']?>">
																	<select class="btn btn-outline-dark" id="covenMassUnit1" onchange="convertConventionalMass('convenMass1',this.value,'indication1','linearError1')">
																		<option value="mg">mg</option>
																		<option selected value="g">g</option>
																		<option value="kg">kg</option>
																	</select>
																</div>					
															</td>
															<td>						
																<input type="text" class="form-control" name="linearError1" required readonly style="background-color: #F1C40F;" id="linearError1" value="<?=$elect_table_1['linearError1']?>">
															</td>
															<td>						
																<input type="text" class="form-control" name="expandedUncertain1" required readonly style="background-color: #F1C40F;" id="expandedUncertain1"value="<?=$elect_table_1['expandedUncertain1']?>">
															</td>
															<td>						
																<input type="text" class="form-control" name="k1" required readonly style="background-color: #F1C40F;" id="k1" value=2.0000>
															</td>
														</tr>
														<tr>
															<td>						
																<input type="text" class="form-control" name="linearLoad2" required id="linearLoad2" value="<?=$elect_table_1['linearLoad2']?>">
															</td>
															<td>						
																<input type="text" class="form-control" name="indication2" required id="indication2" value="<?=$elect_table_1['indication2']?>" onchange="LinearityError({covenMass:'convenMassG2',Indiction:'indication2',LinError:'linearError2'})">
															</td>
															<td>						
															<div class="input-group ">
															<input type="text" class="form-control" placeholder="" id="mark2" name="mark2"value="<?=$elect_table_1['markings2']?>">
															<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="selectedInd({id:'2'})">
															+
															</button>
															<button type="button" class="btn btn-danger" onclick="DeleteInd({id:'2'})">
													-
													</button></div>
															</td>
															<td>						
																<input type="text" class="form-control" name="convenMass2" required readonly style="background-color: #F1C40F;" id="convenMass2"value="<?=$elect_table_1['convenMass2']?>">
															</td>
															<td>	
																<div class="input-group">
																	<input type="text" tabindex="38" class="form-control" name="convenMassG2" required readonly style="background-color: #F1C40F;" id="convenMassG2" value="<?=$elect_table_1['convenMassG2']?>">
																	<select class="btn btn-outline-dark" id="covenMassUnit2" onchange="convertConventionalMass('convenMass2',this.value,'indication2','linearError2')">
																		<option value="mg">mg</option>
																		<option selected value="g">g</option>
																		<option value="kg">kg</option>
																	</select>
																</div>					
															</td>
															<td>						
																<input type="text" class="form-control" name="linearError2" required readonly style="background-color: #F1C40F;" id="linearError2" value="<?=$elect_table_1['linearError2']?>">
															</td>
															<td>						
																<input type="text" class="form-control" name="expandedUncertain2" required readonly style="background-color: #F1C40F;" id="expandedUncertain2"value="<?=$elect_table_1['expandedUncertain2']?>">
															</td>
															<td>						
																<input type="text" class="form-control" readonly style="background-color: #F1C40F;" name="k2" id="k2"value=2.0000>
															</td>
														</tr>
														<tr>
															<td>						
																<input type="text" class="form-control" name="linearLoad3" id="linearLoad3" value="<?=$elect_table_1['linearLoad3']?>">
															</td>
															<td>						
																<input type="text" class="form-control" name="indication3" id="indication3"value="<?=$elect_table_1['indication3']?>"onchange="LinearityError({covenMass:'convenMassG3',Indiction:'indication3',LinError:'linearError3'})">
															</td>
															<td>						
															<div class="input-group ">
													<input type="text" class="form-control" placeholder="" id="mark3" name="mark3"value="<?=$elect_table_1['markings3']?>">
													<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="selectedInd({id:'3'})">
													+
													</button>
													<button type="button" class="btn btn-danger" onclick="DeleteInd({id:'3'})">
													-
													</button></div>
															</td>
															<td>						
																<input type="text" class="form-control" name="convenMass3" readonly style="background-color: #F1C40F;" id="convenMass3"value="<?=$elect_table_1['convenMass3']?>">
															</td>
															<td>	
																<div class="input-group">
																	<input type="text" tabindex="38" class="form-control" name="convenMassG3" readonly style="background-color: #F1C40F;" required id="convenMassG3" value="<?=$elect_table_1['convenMassG3']?>">
																	<select class="btn btn-outline-dark" id="covenMassUnit3" onchange="convertConventionalMass('convenMass3',this.value,'indication3','linearError3')">
																		<option value="mg">mg</option>
																		<option selected value="g">g</option>
																		<option value="kg">kg</option>
																	</select>
																</div>					
															</td>
															<td>						
																<input type="text" class="form-control" name="linearError3" readonly style="background-color: #F1C40F;" id="linearError3" value="<?=$elect_table_1['linearError3']?>">
															</td>
															<td>						
																<input type="text" class="form-control" name="expandedUncertain3" readonly style="background-color: #F1C40F;" id="expandedUncertain3"value="<?=$elect_table_1['expandedUncertain3']?>">
															</td>
															<td>						
																<input type="text" class="form-control" name="k3" readonly style="background-color: #F1C40F;" id="k3"value=2.0000>
															</td>
														</tr>
														<tr>
															<td>						
																<input type="text" class="form-control" name="linearLoad4" id="linearLoad4"value="<?=$elect_table_1['linearLoad4']?>">
															</td>
															<td>						
																<input type="text" class="form-control" name="indication4" id="indication4"value="<?=$elect_table_1['indication4']?>"onchange="LinearityError({covenMass:'convenMassG4',Indiction:'indication4',LinError:'linearError4'})">
															</td>
															<td>						
															<div class="input-group">
													<input type="text" class="form-control" placeholder="" id="mark4" name="mark4"value="<?=$elect_table_1['markings4']?>">
													<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"onclick="selectedInd({id:'4'})">
													+
													</button>
													<button type="button" class="btn btn-danger" onclick="DeleteInd({id:'4'})">
													-
													</button></div>
															</td>
															<td>						
																<input type="text" class="form-control" name="convenMass4" readonly style="background-color: #F1C40F;" id="convenMass4"value="<?=$elect_table_1['convenMass4']?>">
															</td>
															<td>	
																<div class="input-group">
																	<input type="text" tabindex="38" class="form-control" name="convenMassG4" required readonly style="background-color: #F1C40F;" id="convenMassG4" value="<?=$elect_table_1['convenMassG4']?>">
																	<select class="btn btn-outline-dark" id="covenMassUnit4" onchange="convertConventionalMass('convenMass4',this.value,'indication4','linearError4')">
																		<option value="mg">mg</option>
																		<option selected value="g">g</option>
																		<option value="kg">kg</option>
																	</select>
																</div>					
															</td>
															
															<td>						
																<input type="text" class="form-control" name="linearError4" readonly style="background-color: #F1C40F;" id="linearError4" value="<?=$elect_table_1['linearError4']?>">
															</td>
															<td>						
																<input type="text" class="form-control" name="expandedUncertain4" readonly style="background-color: #F1C40F;" id="expandedUncertain4"value="<?=$elect_table_1['expandedUncertain4']?>">
															</td>
															<td>						
																<input type="text" class="form-control" name="k4" readonly style="background-color: #F1C40F;" id="k4"value=2.0000>
															</td>
														</tr>
														<tr>
															<td>						
																<input type="text" class="form-control"name="linearLoad5" id="linearLoad5"value="<?=$elect_table_1['linearLoad5']?>">
															</td>
															<td>						
																<input type="text" class="form-control" name="indication5" id="indication5"value="<?=$elect_table_1['indication5']?>"onchange="LinearityError({covenMass:'convenMassG5',Indiction:'indication5',LinError:'linearError5'})">
															</td>
															<td>						
															<div class="input-group ">
													<input type="text" class="form-control" placeholder="" id="mark5" name="mark5"value="<?=$elect_table_1['markings5']?>">
													<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="selectedInd({id:'5'})">
													+
													</button>
													<button type="button" class="btn btn-danger" onclick="DeleteInd({id:'5'})">
													-
													</button></div>
															</td>
															<td>						
																<input type="text" class="form-control" name="convenMass5" readonly style="background-color: #F1C40F;" id="convenMass5"value="<?=$elect_table_1['convenMass5']?>">
															</td>
															<td>	
																<div class="input-group">
																	<input type="text" tabindex="38" class="form-control" name="convenMassG5" required readonly style="background-color: #F1C40F;" id="convenMassG5" value="<?=$elect_table_1['convenMassG5']?>">
																	<select class="btn btn-outline-dark" id="covenMassUnit5" onchange="convertConventionalMass('convenMass5',this.value,'indication5','linearError5')">
																		<option value="mg">mg</option>
																		<option selected value="g">g</option>
																		<option value="kg">kg</option>
																	</select>
																</div>					
															</td>
															
															<td>						
																<input type="text" class="form-control" name="linearError5" readonly style="background-color: #F1C40F;" id="linearError5" value="<?=$elect_table_1['linearError5']?>">
															</td>
															<td>						
																<input type="text" class="form-control" name="expandedUncertain5" readonly style="background-color: #F1C40F;" id="expandedUncertain5"value="<?=$elect_table_1['expandedUncertain5']?>">
															</td>
															<td>						
																<input type="text" class="form-control" name="k5" id="k5" readonly style="background-color: #F1C40F;"value=2.0000>
															</td>
														</tr>
														<tr>
															<td>						
																<input type="text" class="form-control" name="linearLoad6" id="linearLoad6"value="<?=$elect_table_1['linearLoad6']?>">
															</td>
															<td>						
																<input type="text" class="form-control" name="indication6" id="indication6"value="<?=$elect_table_1['indication6']?>"onchange="LinearityError({covenMass:'convenMassG6',Indiction:'indication6',LinError:'linearError6'})">
															</td>
															<td>						
															<div class="input-group ">
													<input type="text" class="form-control" placeholder="" id="mark6" name="mark6"value="<?=$elect_table_1['markings6']?>">
													<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"onclick="selectedInd({id:'6'})">
													+
													</button>
													<button type="button" class="btn btn-danger" onclick="DeleteInd({id:'6'})">
													-
													</button></div>
															</td>
															<td>						
																<input type="text" class="form-control" name="convenMass6" readonly style="background-color: #F1C40F;" id="convenMass6"value="<?=$elect_table_1['convenMass6']?>">
															</td>
															<td>	
																<div class="input-group">
																	<input type="text" tabindex="38" class="form-control" readonly style="background-color: #F1C40F;" name="convenMassG6" required id="convenMassG6" value="<?=$elect_table_1['convenMassG6']?>">
																	<select class="btn btn-outline-dark" id="covenMassUnit6" onchange="convertConventionalMass('convenMass6',this.value,'indication6','linearError6')">
																		<option value="mg">mg</option>
																		<option selected value="g">g</option>
																		<option value="kg">kg</option>
																	</select>
																</div>					
															</td>
															
															<td>						
																<input type="text" class="form-control" name="linearError6" id="linearError6" readonly style="background-color: #F1C40F;" value="<?=$elect_table_1['linearError6']?>">
															</td>
															<td>						
																<input type="text" class="form-control" name="expandedUncertain6" readonly style="background-color: #F1C40F;" id="expandedUncertain6"value="<?=$elect_table_1['expandedUncertain6']?>">
															</td>
															<td>						
																<input type="text" class="form-control" name="k6" id="k6" readonly style="background-color: #F1C40F;" value=2.0000>
															</td>
														</tr>
														<tr>
															<td>						
																<input type="text" class="form-control" name="linearLoad7" id="linearLoad7"value="<?=$elect_table_1['linearLoad7']?>">
															</td>
															<td>						
																<input type="text" class="form-control" name="indication7" id="indication7"value="<?=$elect_table_1['indication7']?>"onchange="LinearityError({covenMass:'convenMassG7',Indiction:'indication7',LinError:'linearError7'})">
															</td>
															<td>						
															<div class="input-group ">
													<input type="text" class="form-control" placeholder="" id="mark7" name="mark7"value="<?=$elect_table_1['markings7']?>">
													<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"onclick="selectedInd({id:'7'})">
													+
													</button>
													<button type="button" class="btn btn-danger" onclick="DeleteInd({id:'7'})">
													-
													</button></div>
															</td>
															<td>						
																<input type="text" class="form-control" name="convenMass7" readonly style="background-color: #F1C40F;" id="convenMass7"value="<?=$elect_table_1['convenMass7']?>">
															</td>
															<td>	
																<div class="input-group">
																	<input type="text" tabindex="38" class="form-control" name="convenMassG7" required readonly style="background-color: #F1C40F;" id="convenMassG7" value="<?=$elect_table_1['convenMassG7']?>">
																	<select class="btn btn-outline-dark" id="covenMassUnit7" onchange="convertConventionalMass('convenMass7',this.value,'indication7','linearError7')">
																		<option value="mg">mg</option>
																		<option selected value="g">g</option>
																		<option value="kg">kg</option>
																	</select>
																</div>					
															</td>
															
															<td>						
																<input type="text" class="form-control" name="linearError7" readonly style="background-color: #F1C40F;" id="linearError7" value="<?=$elect_table_1['linearError7']?>">
															</td>
															<td>						
																<input type="text" class="form-control" name="expandedUncertain7" readonly style="background-color: #F1C40F;" id="expandedUncertain7"value="<?=$elect_table_1['expandedUncertain7']?>">
															</td>
															<td>						
																<input type="text" class="form-control" name="k7"  readonly style="background-color: #F1C40F;" id="k7"value=2.0000>
															</td>
														</tr>
														<tr>
															<td>						
																<input type="text" class="form-control"name="linearLoad8" id="linearLoad8"value="<?=$elect_table_1['linearLoad8']?>">
															</td>
															<td>						
																<input type="text" class="form-control" name="indication8" id="indication8"value="<?=$elect_table_1['indication8']?>"onchange="LinearityError({covenMass:'convenMassG8',Indiction:'indication8',LinError:'linearError8'})">
															</td>
															<td>						
															<div class="input-group ">
													<input type="text" class="form-control" placeholder=""id="mark8" name="mark8"value="<?=$elect_table_1['markings8']?>">
													<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"onclick="selectedInd({id:'8'})">
													+
													</button>
													<button type="button" class="btn btn-danger" onclick="DeleteInd({id:'8'})">
													-
													</button>
													</div>
															</td>
															<td>						
																<input type="text" class="form-control" name="convenMass8" readonly style="background-color: #F1C40F;" id="convenMass8"value="<?=$elect_table_1['convenMass8']?>">
															</td>
															<td>	
																<div class="input-group">
																	<input type="text" tabindex="38" class="form-control" readonly style="background-color: #F1C40F;" name="convenMassG8" required id="convenMassG8" value="<?=$elect_table_1['convenMassG8']?>">
																	<select class="btn btn-outline-dark" id="covenMassUnit8" onchange="convertConventionalMass('convenMass8',this.value,'indication8','linearError8')">
																		<option value="mg">mg</option>
																		<option selected value="g">g</option>
																		<option value="kg">kg</option>
																	</select>
																</div>					
															</td>
															
															<td>						
																<input type="text" class="form-control" name="linearError8" readonly style="background-color: #F1C40F;" id="linearError8" value="<?=$elect_table_1['linearError8']?>">
															</td>
															<td>						
																<input type="text" class="form-control" name="expandedUncertain8" readonly style="background-color: #F1C40F;" id="expandedUncertain8"value="<?=$elect_table_1['expandedUncertain8']?>">
															</td>
															<td>						
																<input type="text" class="form-control" name="k8" id="k8" readonly style="background-color: #F1C40F;" value=2.0000>
															</td>
														</tr>
													</tbody>
												</table>

												<table class="table table-bordered text-center table-sm">
													<thead>
														<tr>
															<th style="font-size:.9em">Uncertainty, k=2 (mg)</th>
															<th>MPE (mg)</th>
															<th>Convection (mg)</th>
															<th style="font-size:.9em">Class of Std.:</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>						
																<input type="text" class="form-control" name="uncertain1" id="uncertain1" readonly style="background-color: #F1C40F;" tabIndex="-1" value="<?=$elect_table_1['uncertain1']?>">
															</td>
															<td>						
																<input type="text" class="form-control" name="mpe1" readonly style="background-color: #F1C40F;" id="mpe1" value="<?=$elect_table_1['mpe1']?>">
															</td>
															<td>						
																<input type="text" class="form-control" name="convection1" id="convection1"  style="background-color: #F1C40F;" tabIndex="-1"  value="<?=$elect_table_1['convection1']?>">
															</td>
															<td>						
																<input type="text" class="form-control" style="background-color: #F1C40F;" tabIndex="-1"  name="class1" id="class1" value="<?=$elect_table_1['class1']?>">
															</td>
														</tr>
														<tr>
															<td>						
																<input type="text" class="form-control" name="uncertain2"  style="background-color: #F1C40F;" tabIndex="-1" id="uncertain2"value="<?=$elect_table_1['uncertain2']?>">
															</td>
															<td>						
																<input type="text" class="form-control" name="mpe2" id="mpe2" style="background-color: #F1C40F;" tabIndex="-1" value="<?=$elect_table_1['mpe2']?>">
															</td>
															<td>						
																<input type="text" class="form-control" name="convection2" id="convection2" style="background-color: #F1C40F;" tabIndex="-1"  value="<?=$elect_table_1['convection2']?>">
															</td>
															<td>						
																<input type="text" class="form-control" style="background-color: #F1C40F;" tabIndex="-1"  name="class2" id="class2" value="<?=$elect_table_1['class2']?>" onchange="document.getElementById('class1').value = this.value">
															</td>
														</tr>
														<tr>
															<td>						
																<input type="text" class="form-control" name="uncertain3" id="uncertain3"  style="background-color: #F1C40F;" tabIndex="-1" value="<?=$elect_table_1['uncertain3']?>">
															</td>
															<td>						
																<input type="text" class="form-control" name="mpe3" style="background-color: #F1C40F;" tabIndex="-1"  id="mpe3"value="<?=$elect_table_1['mpe3']?>">
															</td>
															<td>						
																<input type="text" class="form-control" name="convection3" id="convection3"  style="background-color: #F1C40F;" tabIndex="-1"  value="<?=$elect_table_1['convection3']?>">
															</td>
															<td>						
																<input type="text" class="form-control" style="background-color: #F1C40F;" tabIndex="-1"  name="class3" id="class3" value="<?=$elect_table_1['class3']?>">
															</td>
														</tr>
														<tr>
															<td>						
																<input type="text" class="form-control" name="uncertain4"  style="background-color: #F1C40F;" tabIndex="-1"  id="uncertain4"value="<?=$elect_table_1['uncertain4']?>">
															</td>
															<td>						
																<input type="text" class="form-control" style="background-color: #F1C40F;" tabIndex="-1"  name="mpe4" id="mpe4"value="<?=$elect_table_1['mpe4']?>">
															</td>
															<td>						
																<input type="text" class="form-control" style="background-color: #F1C40F;" tabIndex="-1"  name="convection4" id="convection4" value="<?=$elect_table_1['convection4']?>">
															</td>
															<td>						
																<input type="text" class="form-control" name="class4" id="class4" style="background-color: #F1C40F;" tabIndex="-1"  value="<?=$elect_table_1['class4']?>">
															</td>
														</tr>
														<tr>
															<td>						
																<input type="text" class="form-control" style="background-color: #F1C40F;" tabIndex="-1"  name="uncertain5" id="uncertain5"value="<?=$elect_table_1['uncertain5']?>">
															</td>
															<td>						
																<input type="text" class="form-control" style="background-color: #F1C40F;" tabIndex="-1"  name="mpe5" id="mpe5"value="<?=$elect_table_1['mpe5']?>">
															</td>
															<td>						
																<input type="text" class="form-control" style="background-color: #F1C40F;" tabIndex="-1"  name="convection5" id="convection5" value="<?=$elect_table_1['convection5']?>">
															</td>
															<td>						
																<input type="text" class="form-control" style="background-color: #F1C40F;" tabIndex="-1"  name="class5" id="class5" value="<?=$elect_table_1['class5']?>">
															</td>
														</tr>
														<tr>
															<td>						
																<input type="text" class="form-control" style="background-color: #F1C40F;" tabIndex="-1"  name="uncertain6" id="uncertain6"value="<?=$elect_table_1['uncertain6']?>">
															</td>
															<td>						
																<input type="text" class="form-control" style="background-color: #F1C40F;" tabIndex="-1"  name="mpe6" id="mpe6"value="<?=$elect_table_1['mpe6']?>">
															</td>
															<td>						
																<input type="text" class="form-control" style="background-color: #F1C40F;" tabIndex="-1"  name="convection6" id="convection6" value="<?=$elect_table_1['convection6']?>">
															</td>
															<td>						
																<input type="text" class="form-control" style="background-color: #F1C40F;" tabIndex="-1"  name="class6" id="class6" value="<?=$elect_table_1['class6']?>">
															</td>
														</tr>
														<tr>
															<td>						
																<input type="text" class="form-control" style="background-color: #F1C40F;" tabIndex="-1"  name="uncertain7" id="uncertain7"value="<?=$elect_table_1['uncertain7']?>">
															</td>
															<td>						
																<input type="text" class="form-control" style="background-color: #F1C40F;" tabIndex="-1"  name="mpe7" id="mpe7"value="<?=$elect_table_1['mpe7']?>">
															</td>
															<td>						
																<input type="text" class="form-control" style="background-color: #F1C40F;" tabIndex="-1"  name="convection7" id="convection7" value="<?=$elect_table_1['convection7']?>">
															</td>
															<td>						
																<input type="text" class="form-control" style="background-color: #F1C40F;" tabIndex="-1"  name="class7" id="class7" value="<?=$elect_table_1['class7']?>">
															</td>
														</tr>
														<tr>
															<td>						
																<input type="text" class="form-control" style="background-color: #F1C40F;" tabIndex="-1"  name="uncertain8" id="uncertain8"value="<?=$elect_table_1['uncertain8']?>">
															</td>
															<td>						
																<input type="text" class="form-control" style="background-color: #F1C40F;" tabIndex="-1"  name="mpe8" id="mpe8"value="<?=$elect_table_1['mpe8']?>">
															</td>
															<td>						
																<input type="text" class="form-control" style="background-color: #F1C40F;" tabIndex="-1"  name="convection8" id="convection8"value="<?=$elect_table_1['convection8']?>">
															</td>
															<td>						
																<input type="text" class="form-control" style="background-color: #F1C40F;" tabIndex="-1"  name="class8" id="class8" value="<?=$elect_table_1['class8']?>">
															</td>
														</tr>
													</tbody>
												</table>
											</div>
									<!-- LINEARITY -->
									<!-- REPEATABLITY -->
										<div>
											<div class=" row ">
												<h6 class='col text-center'>Repeatability Test <input class="" type="text" name="repeatabilityValue" value="<?=$elect_table_1['repeatabilityValue']?>"> 
												<select class="btn-outline-secondary " name="repeatabilityUnit">
															<option selected>Choose. . .</option>
															<option value="mg" <?php if($elect_table_1['repeatabilityUnit'] == 'mg'){echo"selected";}?>>mg</option>
															<option value="g"<?php if($elect_table_1['repeatabilityUnit'] == 'g'){echo"selected";}?>>g</option>
															<option value="kg"<?php if($elect_table_1['repeatabilityUnit'] == 'kg'){echo"selected";}?>>kg</option>
														</select></h6>									
											</div>

												<table class="table table-bordered text-center table-sm" id="measurementTable">
													<thead>
														
														<tr>
														<th >Trial</th>
														<th >Indication</th>
														<th >Trial</th>
														<th >Indication</th>
														
														</tr>
													</thead>
													<tbody>
														
														<tr>
															<td>						
																1
															</td>
															<td>						
																<input name='repeat1'  type="text" class="form-control" id='repeat1' onchange="stdevRepeat()" value="<?=$elect_table_1['repeat1']?>">
															</td>
															<td>						
																6
															</td>
															<td>						
																<input name='repeat6' type="text" class="form-control" id='repeat6' onchange="stdevRepeat()" value="<?=$elect_table_1['repeat6']?>">
															</td>
														</tr>
														<tr>
															<td>						
																2
															</td>
															<td>						
																<input name="repeat2"  type="text" class="form-control" id="repeat2" onchange="stdevRepeat()" value="<?=$elect_table_1['repeat2']?>">
															</td>
															<td>						
																7
															</td>
															<td>						
																<input name="repeat7" type="text" class="form-control" id="repeat7" onchange="stdevRepeat()" value="<?=$elect_table_1['repeat7']?>"> 
															</td>
														</tr>
														<tr>
															<td>						
																3
															</td>
															<td>						
																<input name="repeat3" type="text" class="form-control" id="repeat3" onchange="stdevRepeat()" value="<?=$elect_table_1['repeat3']?>">
															</td>
															<td>						
																8
															</td>
															<td>						
																<input name="repeat8" type="text" class="form-control" id="repeat8" onchange="stdevRepeat()" value="<?=$elect_table_1['repeat8']?>">
															</td>
														</tr>
														<tr>
															<td>						
																4
															</td>
															<td>						
																<input name="repeat4"  type="text" class="form-control" id="repeat4" onchange="stdevRepeat()" value="<?=$elect_table_1['repeat4']?>">
															</td>
															<td>						
																9
															</td>
															<td>						
																<input name="repeat9" type="text" class="form-control" id="repeat9" onchange="stdevRepeat()" value="<?=$elect_table_1['repeat9']?>">
															</td>
														</tr>
														<tr>
															<td>						
																5
															</td>
															<td>						
																<input name="repeat5" type="text" class="form-control" id="repeat5" onchange="stdevRepeat()" value="<?=$elect_table_1['repeat5']?>">
															</td>
															<td>						
																10
															</td>
															<td>						
																<input name="repeat10" type="text" class="form-control" id="repeat10" onchange="stdevRepeat()" value="<?=$elect_table_1['repeat10']?>">
															</td>
														</tr>
														<tr>
															<td colspan='2' style="text-align:end">						
															St. Dev. (g)
															</td>
															<td colspan='2'>						
																<input name="stDev"  style="background-color: #F1C40F;" tabIndex="-1"  type="text" class="form-control" id="stDev"  value="<?=$elect_table_1['stDev']?>">
																<input name="stDevReal"  type="hidden" class="form-control" id="stDevReal"  value="<?=$elect_table_1['stDevReal']?>">
															</td>
															
														</tr>
														
													</tbody>
												</table>
										</div>
										<div class="">
											<h5><i>Important: Don't forget to press Calculate Expanded Uncertainty </i><b style="color: red;">*</b></h5>
										</div>
										<div class="text-center	">
											<button type="button" class="btn btn-danger btn-lg mt-2" id="calculateButton" onclick="calculateExtendedUncert()">
												<i class="fas fa-calculator"></i> 
												Calculate Expanded Uncertainty
											</button>
											<span id="cancelCalculate" style="display:none" onclick="cancelCalculate()">Cancel</span>
										</div>
									<!-- REPEATABLITY -->
										<hr>
										<br>
									<!-- REMARKS DONE-->
										<div class='position-relative'>
											<div class="position-absolute top-0 start-50 translate-middle">
												<h6>Remarks</h6>
											</div>
											<br>
											<div class="start-50" style=>
												<div class="form-check">
													<input class="form-check-input" type="checkbox" value="A" id="remarksA" name="remarksA" <?php if($elect_table_1['remarksA'] != Null){echo"checked";}?>>
													<label class="form-check-label" for="remarksA">
													Calibration was performed
													</label>
												</div>
												<div class="form-check">
													<div class="row">
														<div class="col">
															<input class="form-check-input" type="checkbox" value="B" id="remarksB" name="remarksB" <?php if($elect_table_1['remarksB'] != Null){echo"checked";}?>>
															<label class="form-check-label" for="remarksB">
															No Adjustment was done
															</label>
														</div>
														<div class="col">
															<input class="form-check-input" type="checkbox" value="C" id="remarksC" name="remarksC" <?php if($elect_table_1['remarksC'] != Null){echo"checked";}?>>
															<label class="form-check-label" for="remarksC">
															Internal Adjustment was done
															</label>
														</div>
														<div class="col">
															<input class="form-check-input" type="checkbox" value="D" id="remarksD" name="remarksD" <?php if($elect_table_1['remarksD'] != Null){echo"checked";}?>>
															<label class="form-check-label" for="remarksD">
															External Adjustment was done
															</label>
														</div>
														
													</div>
													
												</div>
												<div class="form-check">
													<input class="form-check-input" type="checkbox" value="E" id="remarksE" name="remarksE" <?php if($elect_table_1['remarksE'] != Null){echo"checked";}?>>
													<label class="form-check-label" for="remarksE">
													Standard/s, accessory/ies, and UUC are in good condition before and after calibration
													</label>
												</div>
												<div class="form-check">
													<input class="form-check-input" type="checkbox" value="F" id="remarksF" <?php if($elect_table_1['remarksF'] != Null){echo"checked";}?>>
													<label class="form-check-label" for="remarksF">
													Others:
													</label>
													<textarea id='remarksFOthers' name="remarksF" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" style="margin-top: 0px;margin-bottom: 0px;height: 80px;"><?=$elect_table_1['remarksF']?></textarea>
													<input type="hidden"  id="remarksFHidden" >
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
																	<select id="personnelList" name="calibratedBy" id="calibratedBy" class="form-control" value="<?php echo $elect_table_1['calibratedBy'];?>">
																	</select>
																</div>
															</td>
															<td>
																<div class="input-group input-group-sm">
																	<select id="verifierList" name="encodedBy" id="encodedBy" class="form-control" value="<?php echo $elect_table_1['encodedBy'];?>">
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
																	<select id="verifierPositionList" name="checkedby" id="checkedby" class="form-control" value="<?php echo $elect_table_1['checkedby'];?>">
																	</select>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									<!-- FOOTER -->
									<div class="d-flex justify-content-center mt-5">
											<h6>Add Picture </h6>
										</div>
										<div class="input-group mb-3 d-flex justify-content-center">
											<input type="file" name="image" accept="image/*" id="imageInput" onchange="loadFile(event)">
											<img id="output"/>
										</div>	
									<br>
										<div class=' text-center' id="btns">
											<!-- <Button type="button" class="btn btn-lg btn-primary" onclick='toggleAlert();submitForm("formMain")' ><i class="fas fa-save"></i> Update</Button> -->

										</div> 
										</form>
										
										<br>	
										<div id="forVerificationButtons">
    									</div>
										<button type="button" class="btn btn-success float saveButton" data-toggle="modal" data-target="#confirmationModal">
											<i data-feather="save" style="font-size: 50px;"></i>
										</button>
							</div>
							<div class="container">
								<a href="/electTable" class="btn btn-danger" style="float: right;"><i class="fas fa-door-closed"></i> Back</a>
							</div>




						<!-- Modal 1-->
							<div class="modal  fade" id="staticBackdrop"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
								<div class="modal-dialog modal-xl modal-dialog-scrollable" style="width:100%">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="staticBackdropLabel">Standard</h5>
										</div>
										<div class="modal-body">
											<div class="row">
												<div class="col-8">
													<h5>Weights <i>(Select and check the standard/s)></i></h5>
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
											<table class="table table-sm " style="height:60%">
														<thead>
															<tr>
																<th>Checkbox</th>
																<th>Manufacturer</th>
																<th>Class</th>
																<th>Serial No.</th>
																<th>Description</th>
																<th>Calibration date</th>
																<th>Due date</th>
															</tr>

														</thead>
														<tbody id="tableTbodyWeights">
															<?php
																$rmlStandard = new ElectModel_2();
																$arrStandard[] = $rmlStandard->findAll();
																$M2Serial = '';
																$M2ArrayOfDates = [];
																foreach($arrStandard as $value){
																	for ($i=0; $i < count($value); $i++) {
																		if($arrStandard[0][$i]['class'] == 'M2' || $arrStandard[0][$i]['class'] =='M₂'){
																			$M2Serial .= ','.$arrStandard[0][$i]['serialNumber'];
																			array_push($M2ArrayOfDates,strtotime($arrStandard[0][$i]['dateOfCalibration']));	
																		}
																		if($arrStandard[0][$i]['class'] != 'M2' && $arrStandard[0][$i]['class'] !='M₂'){
															?>
																<tr 
																	<?php 
																		date_default_timezone_set('Asia/Manila');
																		$forComparisonToday = strtotime(date('Y-m-d'));
																		$standardDue = $arrStandard[0][$i]['dateOfCalibration']; 
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
																		<div class="form-check">
																			<input class="form-check" type="checkbox" name="weightCheckbox" <?php if(contains($arrStandard[0][$i]['serialNumber'],$SNARRAY)){echo 'checked';};?> value="<?=  $arrStandard[0][$i]['serialNumber'];?>" id="flexCheck<?=$i?>">
																		</div>
																	</td>
																	<td>
																		<label for="flexCheck<?=$i?>"><?= $arrStandard[0][$i]['manufacturer'];?></label>
																	</td>
																	<td>
																		<?=  $arrStandard[0][$i]['class'];?>
																	</td>
																	<td>
																		<?=  $arrStandard[0][$i]['serialNumber'];?>
																	</td>
																	<td>
																		<?=  $arrStandard[0][$i]['description'];?></td>
																	<td>
																		<?php $date = $arrStandard[0][$i]['dateOfCalibration'];  $new_date = strtotime($date); echo date('M d, Y', $new_date); ?>
																	</td>
																	<td>
																		<?php $date = $arrStandard[0][$i]['dateOfCalibration']; $date = strtotime($date); $new_date = strtotime('+ 1 year', $date); echo date('M d, Y', $new_date); ?>
																	</td>
																</tr>
															<?php				
																		}
																	}
															?>
															
															<?php
																}
															?>
														</tbody>
														<input name='weight' class="form-check-input" type="hidden" id="weight">
													</div>
												</div>
											</div>
											</table>
											
										</div>
										<div class="modal-footer">
											<div class="float-right">
												<!-- <a class="btn btn btn-danger"  href="dashboard">
												<i class="fas fa-door-open"></i> Cancel</a> -->
												<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												<button type="button" class="btn btn-success" onclick=" getWeight()" data-dismiss="modal">Select</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						<!-- Modal -->

						<!--Modal 3-->

							<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-xl modal-dialog-scrollable">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Standards</h5>
									
									
									<div class="input-group close">
										<input type="text" class="form-control " id="searchStandard" placeholder="Nominal Value" aria-label="Search" aria-describedby="button-addon2">
										<input type="text" class="form-control " id="searchStandardUnit" placeholder="Unit" aria-label="Search" aria-describedby="button-addon2">
										<input type="text" class="form-control " id="searchStandardSerialNumber" placeholder="Serial Number" aria-label="Search" aria-describedby="button-addon2">
										<input type="text" class="form-control " id="searchStandardUnitMarking" placeholder="Marking" aria-label="Search" aria-describedby="button-addon2">
										<div class="input-group-append">
											<button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="filterOriginal()">Search</button>
										</div>
										<div class="input-group-append">
											<button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="refreshToOriginal()">Refresh</button>
										</div>
									</div>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									
								</div>
								<div class="modal-body" >
							 
									
										<table class="table" id="standardRows" style="height:50%;width:100%">
											<thead>
												<tr>
													<th >Description</th>
													<th >Type</th>
													<th style="font-size:.9em">Serial Number</th>
													<th></th>
												</tr>
											</thead>
											<tbody id='headStandards'>
														
											</tbody>
										</table>
									
									



									<div id="StandardRowsHere">
										<table class="table " id="standardRows">
											<thead>
												<tr>
													<th >Nominal Value</th>
													<th >Serial Number</th>
													<th >Marking</th>
													<th style="font-size:.9em">Conventional Mass</th>
													<th >Unit</th>
													<th  style="font-size:.9em;">Uncertainty of Measurement mg</th>
													<th style="font-size:.9em">MPE (mg)</th>
													<th>Calibration Provider</th>
													<th>Action</th>
													
												</tr>
											</thead>
											<tbody id="tbodyStandardRows">
												

											
												
											
										
											</tbody>
										</table>
									</div>
									
								</div>
								</div>
								</div>
							</div>
							</div>
										</div>
										<!-- <div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
											<button type="button" class="btn btn-primary">Use Standard</button>
										</div> -->
										</div>
									</div>

						<!--Modal-->

					</div>

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


					<script>
						<?php
							$rml = new ElectModel_3();
							$arr[] = $rml->findAll(); 
							$rml2 = new ElectModel_2();
							$arr2[] = $rml2->findAll(); 
						?>
						var selectedIndication;
						var ArrayOfStandardAll = <?= json_encode($arr)?>;
						var ArrayOfStandardAllDetails = <?= json_encode($arr2)?>;
						var weight;
						var objectOfSelectedStandard = {};

						const addToObject = (indication,serialNumber,marking,value) => {
							if (typeof objectOfSelectedStandard[indication] != 'undefined') {
								if (typeof objectOfSelectedStandard[indication][serialNumber] != 'undefined') {
									var length = (Object.keys(objectOfSelectedStandard[indication][serialNumber]).length + 1)
									objectOfSelectedStandard[indication] = {...objectOfSelectedStandard[indication],[serialNumber]:{...objectOfSelectedStandard[indication][serialNumber],[length]:{marking:marking,conveMass:value}}}
								}else{
									objectOfSelectedStandard[indication]= {...objectOfSelectedStandard[indication],[serialNumber]:{1:{marking:marking,conveMass:value}}}
								}
							}else{
								objectOfSelectedStandard[indication]= {[serialNumber]:{1:{marking:marking,conveMass:value}}}
							}
						}

						//load Image
						var loadFile = function(event) {
							var output = document.getElementById('output');
							output.src = URL.createObjectURL(event.target.files[0]);
							output.onload = function() {
							URL.revokeObjectURL(output.src) // free memory
							}
						};

						function addStandardToTbody(){
							var Tbody = document.getElementById('tbodyStandardRows');
							
							while (Tbody.hasChildNodes()) {  
								Tbody.removeChild(Tbody.firstChild);
							}
							
							const weightSplit = weight.split(",");
							for (let weightSplitIndex = 0; weightSplitIndex < weightSplit.length; weightSplitIndex++) {
								const element = weightSplit[weightSplitIndex];

								let filteredDATAWeight = [ArrayOfStandardAll[0].filter(function (e) {
									return e.serialNumber == element;
								})]

								filteredDATAWeight.forEach(WeightElements => {
									WeightElements.forEach(DataItem => {
										var tr = document.createElement('tr');
										var NominalValue = document.createElement('td');
										var SerialNumber = document.createElement('td');
										var Marking = document.createElement('td');
										var ConventionalMass = document.createElement('td');
										var Unit = document.createElement('td');
										var Uncertainty = document.createElement('td');
										var MPE = document.createElement('td');
										var CalibrationProvider = document.createElement('td');
										var Action = document.createElement('Button');
										NominalValue.innerHTML = DataItem['nominalValue']+' '+DataItem['nominalUnit'];
										SerialNumber.innerHTML = DataItem['serialNumber'];
										Marking.innerHTML = DataItem['marking'];
										ConventionalMass.innerHTML = DataItem['conventionalMass'];
										Unit.innerHTML = DataItem['unit'];
										Uncertainty.innerHTML = DataItem['uncertainty'];
										MPE.innerHTML = DataItem['mpe'];
										CalibrationProvider.innerHTML = DataItem['calibrationProvider'];
										Action.innerHTML = 'Use';
										var fuctionText = 'toStandardUsed({ convenMassVal:'+DataItem['conventionalMass']+', uncertainVal:'+DataItem['uncertainty']+', mpeVal:'+DataItem['mpe']+", markVal:'"+DataItem['marking']+"',classiVal:'"+DataItem['class']+"',serialNumber:'"+DataItem['serialNumber']+"'})";
										Action.setAttribute('type',"button");
										Action.setAttribute('class',"btn btn-outline-secondary");
										Action.setAttribute('onclick',fuctionText);
										Action.setAttribute('data-bs-dismiss','modal');
										
										tr.appendChild(NominalValue);
										tr.appendChild(SerialNumber);
										tr.appendChild(Marking);
										tr.appendChild(ConventionalMass);
										tr.appendChild(Unit);
										tr.appendChild(Uncertainty);
										tr.appendChild(MPE);
										tr.appendChild(CalibrationProvider);
										tr.appendChild(Action);
										Tbody.appendChild(tr);
									
									})
								})
								
								

							}
									
							
						}
						function addDetailsToHead(){
							var head = document.getElementById('headStandards');
							const weightSplit = weight.split(",");
							for (let weightSplitIndex = 0; weightSplitIndex < weightSplit.length; weightSplitIndex++) {
								const element = weightSplit[weightSplitIndex];

								let filteredDATAWeight = [ArrayOfStandardAllDetails[0].filter(function (e) {
									return e.serialNumber == element;
								})]

								filteredDATAWeight.forEach(WeightElements => {
									WeightElements.forEach(DataItem => {
										var tr = document.createElement('tr');
										var Description = document.createElement('td');
										var Type = document.createElement('td');
										var SerialNumber = document.createElement('td');
										Description.innerHTML = DataItem['description'];
										Type.innerHTML = DataItem['type'];
										SerialNumber.innerHTML = DataItem['serialNumber'];
										tr.appendChild(Description);
										tr.appendChild(Type);
										tr.appendChild(SerialNumber);
										head.appendChild(tr);
									})
								})
							}
						}

						function handleRequiredCalculateExtendUncert(){
							document.getElementById('calculateExtendUncert').value = 1
						}
						function filterOriginal(){
							var searchingFor = document.getElementById('searchStandard').value;
							var searchingForUnit = document.getElementById('searchStandardUnit').value;
							var searchingForSerialNumber = document.getElementById('searchStandardSerialNumber').value;
							var searchingForMarking = document.getElementById('searchStandardUnitMarking').value;

							// console.log(searchingFor,searchingForUnit,searchingForSerialNumber,searchingForMarking);
							let index;
							let filteredDATAWeight;
							const weightSplit = weight.split(",");

							filteredDATAWeight=[(ArrayOfStandardAll[0].filter(function (e) {
								let tempArr;
								for (let weightSplitIndex = 0; weightSplitIndex < weightSplit.length; weightSplitIndex++) {
									const element = weightSplit[weightSplitIndex];
									if(e.serialNumber == element){
										tempArr = e
							}

						}
								return tempArr;
							}))]
							let filteredDATA = [filteredDATAWeight[0].filter(function (e) {
																
								if(searchingFor!=null&&searchingForUnit==""&&searchingForSerialNumber==""&&searchingForMarking==""){
									return e.nominalValue == searchingFor;
								}
								if(searchingFor==""&&searchingForUnit!=null&&searchingForSerialNumber==""&&searchingForMarking==""){
									return e.nominalUnit == searchingForUnit;
								}
								if(searchingFor==""&&searchingForUnit==""&&searchingForSerialNumber!=null&&searchingForMarking==""){
									return e.serialNumber == searchingForSerialNumber;
								}
								if(searchingFor==""&&searchingForUnit==""&&searchingForSerialNumber==""&&searchingForMarking!=null){
									return e.marking.includes(searchingForMarking);
								}
								if(searchingFor!=null&&searchingForUnit!=null&&searchingForSerialNumber==""&&searchingForMarking==""){
									return e.nominalValue == searchingFor && e.nominalUnit == searchingForUnit;
								}
								if(searchingFor!=null&&searchingForUnit==""&&searchingForSerialNumber!=null&&searchingForMarking==""){
									return e.nominalValue == searchingFor && e.serialNumber == searchingForSerialNumber;
								}
								if(searchingFor!=null&&searchingForUnit==""&&searchingForSerialNumber==""&&searchingForMarking!=null){
									return e.nominalValue == searchingFor && e.marking.includes(searchingForMarking);
								}
								if(searchingFor==""&&searchingForUnit!=null&&searchingForSerialNumber!=null&&searchingForMarking==""){
									return e.nominalUnit == searchingForUnit && e.serialNumber == searchingForSerialNumber;
								}
								if(searchingFor==""&&searchingForUnit!=null&&searchingForSerialNumber==""&&searchingForMarking!=null){
									return e.nominalUnit == searchingForUnit && e.marking.includes(searchingForMarking);
								}
								if(searchingFor==""&&searchingForUnit==""&&searchingForSerialNumber!=null&&searchingForMarking!=null){
									return e.serialNumber == searchingForSerialNumber && e.marking.includes(searchingForMarking);
								}
								if(searchingFor!=null&&searchingForUnit!=null&&searchingForSerialNumber!=null&&searchingForMarking==""){
									return e.nominalValue == searchingFor &&
									e.nominalUnit == searchingForUnit &&
									e.serialNumber == searchingForSerialNumber;
								}
								if(searchingFor==""&&searchingForUnit!=null&&searchingForSerialNumber!=null&&searchingForMarking!=null){
									return e.nominalUnit == searchingForUnit &&
									e.serialNumber == searchingForSerialNumber &&
									e.marking.includes(searchingForMarking);
								}
								if(searchingFor!=null&&searchingForUnit==""&&searchingForSerialNumber!=null&&searchingForMarking!=null){
									return e.nominalValue == searchingFor &&
									e.serialNumber == searchingForSerialNumber &&
									e.marking.includes(searchingForMarking);
								}
								if(searchingFor!=null&&searchingForUnit!=null&&searchingForSerialNumber==""&&searchingForMarking!=null){
									return e.nominalValue == searchingFor &&
									e.nominalUnit == searchingForUnit &&
									e.marking.includes(searchingForMarking);
								}
								if(searchingFor!=null&&searchingForUnit!=null&&searchingForSerialNumber!=null&&searchingForMarking!=null){
									return e.nominalValue == searchingFor &&
									e.nominalUnit == searchingForUnit &&
									e.serialNumber == searchingForSerialNumber &&
									e.marking.includes(searchingForMarking);
								}



						


							
							})];

							let head = "<table class='table' id='standardRows'><thead><tr><th >Nominal Value</th><th >Serial Number</th><th >Marking</th><th style='font-size:.9em'>Conventional Mass</th><th >Unit</th><th  style='font-size:.9em;'>Uncertainty of Measurement mg</th><th style='font-size:.9em'>MPE (mg)</th><th>Calibration Provider</th><th>Action</th></tr></thead><tbody id='tbodyStandardRows'>";
							let end = "</tbody></table>";
							var html;

							filteredDATA.forEach(element => {
								element.forEach(item =>{
									if(html == null){
									html = "<tr><td>"+
									item["nominalValue"]+
									" "+item["nominalUnit"]+
									"</td><td>"+item["serialNumber"]+
									"</td><td>"+item["marking"]+
									"</td><td>"+item["conventionalMass"]+
									"</td><td>"+item["unit"]+"</td><td>"+
									item["uncertainty"]+"</td><td>"+item["mpe"]+
									"</td><td>"+item["calibrationProvider"]+
									'</td><td><button type="button" class="btn btn-primary" onclick="toStandardUsed({ convenMassVal:'
										+item["conventionalMass"]+
										", uncertainVal:"+
										item["uncertainty"]+
										", mpeVal:"+item["mpe"]+
										",markVal:'"+item["marking"]+
										"',classiVal:'"+item["class"]+
										"',serialNumber:'"+item["serialNumber"]+"'"+
										'})" data-bs-dismiss="modal">Use</button></td></tr>';
									}else{
										html +="<tr><td>"+
									item["nominalValue"]+
									" "+item["nominalUnit"]+
									"</td><td>"+item["serialNumber"]+
									"</td><td>"+item["marking"]+
									"</td><td>"+item["conventionalMass"]+
									"</td><td>"+item["unit"]+"</td><td>"+
									item["uncertainty"]+"</td><td>"+item["mpe"]+
									"</td><td>"+item["calibrationProvider"]+
									'</td><td><button type="button" class="btn btn-primary" onclick="toStandardUsed({ convenMassVal:'
										+item["conventionalMass"]+
										", uncertainVal:"+
										item["uncertainty"]+
										", mpeVal:"+item["mpe"]+
										",markVal:'"+item["marking"]+
										"',classiVal:'"+item["class"]+
										"',serialNumber:'"+item["serialNumber"]+"'"+
										'})" data-bs-dismiss="modal">Use</button></td></tr>';

									}


								})
							});{
								
							}
							document.getElementById('StandardRowsHere').innerHTML=head+html+end
						}			
						function refreshToOriginal(){
							addStandardToTbody()
							makeUseButtonRed();
						}			
						const selectedInd=({id})=>{
							selectedIndication = id;
							refreshToOriginal();
							
						}

						const makeUseButtonRed = () => {
							var tr = document.getElementById("tbodyStandardRows");
							var td = tr.childElementCount;
							var indicate = "markingSelected"+selectedIndication;
							
							
							for (var key in objectOfSelectedStandard) {
								
								if (objectOfSelectedStandard.hasOwnProperty(indicate)) {
									for (var serialNumber in objectOfSelectedStandard[indicate]) {
										
										if (objectOfSelectedStandard[indicate].hasOwnProperty(serialNumber)) {
											for (var numberInSerial in objectOfSelectedStandard[indicate][serialNumber]) {
												
												if (objectOfSelectedStandard[indicate][serialNumber].hasOwnProperty(numberInSerial)) {
													// console.log('objectOfSelectedStandard[indicate][serialNumber][numberInSerial]', objectOfSelectedStandard[indicate][serialNumber][numberInSerial]);
													
													for(var i = 0; i<td;i++){
													 	
													 		if((tr.children[i].children[1].innerHTML == serialNumber)&&(tr.children[i].children[2].innerHTML == objectOfSelectedStandard[indicate][serialNumber][numberInSerial]['marking'])&&(tr.children[i].children[3].innerHTML == objectOfSelectedStandard[indicate][serialNumber][numberInSerial]['conveMass'])){
																tr.children[i].children[8].setAttribute('class','btn btn-warning')
													 		}else{
																console.log(tr.children[i])
																console.log(tr.children[i].children[2])
																console.log(tr.children[i].children[2].innerHTML)
															 }
													}
												}
											}
										}
									}
								}
							}
							// console.log(objectOfSelectedStandard);
							
						}
						const DeleteInd=({id})=>{
							document.getElementById('mark'+id).value = '';
							document.getElementById('convenMass'+id).value = 0;
							document.getElementById('convenMassG'+id).value = 0;
							document.getElementById('linearError'+id).value = 0;
							document.getElementById('expandedUncertain'+id).value = 0;
							document.getElementById('uncertain'+id).value = 0;
							document.getElementById('mpe'+id).value = 0;
							document.getElementById('convection'+id).value = 0;
							document.getElementById('class'+id).value = '';
							delete objectOfSelectedStandard['markingSelected'+id];
						}
						function convertConventionalMass(convenMass,convenUnit,indication,linError){
							var convenMassValue = document.getElementById(convenMass).value;
							if(convenUnit == 'kg'){
								document.getElementById(convenMass).value = convenMassValue/1000;
							}
							if(convenUnit == 'g'){
								document.getElementById(convenMass).value = convenMassValue*1000;
							}
							LinearityError({covenMass:convenMass,Indiction:indication,LinError:linError});

						}
						function triggerConversionOfCovenMass(unit){
							for(var i = 1; i <= 8; i++){
								covenMassUnit = document.getElementById('covenMassUnit'+i);
								covenMassUnit.value = unit;
								covenMassUnit.onchange();
							}
						}
						function LinearityError({covenMass,Indiction,LinError}){
							var computed = parseFloat(document.getElementById(Indiction).value)-parseFloat(document.getElementById(covenMass).value);
							var toDOM = toStringWithSignificantDigits(computed,2);
							document.getElementById(LinError).value = computed.toFixed(20);
						}
						function toStandardUsed({convenMassVal,convenMassVal2,uncertainVal,mpeVal,markVal,classiVal,serialNumber}){
							var	convenMass = "convenMass"+selectedIndication;
							var	convenMass2 = "convenMassG"+selectedIndication;
							var	indication="indication"+selectedIndication;
							var	linearError="linearError"+selectedIndication;
							var expandedUncertain="expandedUncertain"+selectedIndication;
							var k="k"+selectedIndication;
							var uncertain="uncertain"+selectedIndication;
							var mpe="mpe"+selectedIndication;
							var convectin="convection"+selectedIndication;
							var classi="class"+selectedIndication;
							var mark="mark"+selectedIndication;
							
							//here conversion
							var conMassValue = parseFloat(document.getElementById(convenMass).value)+parseFloat(convenMassVal);
							document.getElementById(convenMass).value = conMassValue;
							document.getElementById(convenMass2).value = conMassValue;
							document.getElementById(uncertain).value = parseFloat(document.getElementById(uncertain).value)+parseFloat(uncertainVal);
							document.getElementById(mpe).value = parseFloat(document.getElementById(mpe).value)+parseFloat(mpeVal);
							document.getElementById(mark).value = document.getElementById(mark).value+"+"+markVal;
							document.getElementById(classi).value = classiVal;
							LinearityError({covenMass:convenMass,Indiction:indication,LinError:linearError});
							convection(convectin,String(document.getElementById(classi).value),mpe);
							
							//hereStoreToArray
							var indicationToAdd = "markingSelected"+selectedIndication

							var markToAdd = markVal;
							addToObject(indicationToAdd,serialNumber,markToAdd,convenMassVal)
							// indication,serialNumber,marking,value

						}
						function calculateExtendedUncert(){
							if(!seeIfHanging()){
								try {
									stdevRepeat();
									for (let index = 2; index <= 8; index++) {
									var	indication="indication"+index;
									var expandedUncertain="expandedUncertain"+index;
									var uncertain="uncertain"+index;
									var mpe="mpe"+index;
									var convectin="convection"+index;
									var calculationSuccess = extendedUncert({Un:uncertain,Mpe:mpe,c:convectin,i:indication,expandedID:expandedUncertain})
									if(calculationSuccess == false){
										throw "NaN";
									}
									}
									var calculationSuccess0 = extendedUncertIndication0({Un:"uncertain1",Mpe:"mpe1",c:"convection1",i:"indication1",expandedID:"expandedUncertain1"})
									if(calculationSuccess0 == false){
										throw "NaN";
									}
									handleRequiredCalculateExtendUncert();
									document.getElementById('calculateButton').setAttribute('class', 'btn btn-success btn-lg mt-2');
									document.getElementById('calculateButton').setAttribute('disabled', 'true');
									document.getElementById('cancelCalculate').setAttribute('style', 'display:initial');
									
									alert('Calculation Successful');
								} catch (error) {
									alert('unable to calculate \n'+error.message);
								}
							}else{
								try {
									stdevRepeat();
									for (let index = 2; index <= 8; index++) {
									var	indication="indication"+index;
									var expandedUncertain="expandedUncertain"+index;
									var uncertain="uncertain"+index;
									var mpe="mpe"+index;
									var convectin="convection"+index;
									var calculationSuccess = extendedUncertForHanging({Un:uncertain,Mpe:mpe,c:convectin,i:indication,expandedID:expandedUncertain})
									if(calculationSuccess == false){
										throw "NaN";
									}
									}
									var calculationSuccess0 = extendedUncertForHangingIndication0({Un:"uncertain1",Mpe:"mpe1",c:"convection1",i:"indication1",expandedID:"expandedUncertain1"})
									if(calculationSuccess0 == false){
										throw "NaN";
									}
									handleRequiredCalculateExtendUncert();
									document.getElementById('calculateButton').setAttribute('class', 'btn btn-success btn-lg mt-2');
									document.getElementById('calculateButton').setAttribute('disabled', 'true');
									document.getElementById('cancelCalculate').setAttribute('style', 'display:initial');
									
									alert('Calculation Successful');
								} catch (error) {
									alert('unable to calculate \n'+error.message);
								}
							}


						}
						const cancelCalculate = () => {
							document.getElementById('calculateButton').setAttribute('class', 'btn btn-danger btn-lg mt-2');
							document.getElementById('calculateButton').removeAttribute('disabled');
							document.getElementById('cancelCalculate').setAttribute('style', 'display:none');
						}
						function convection(convec,classi,mpeVal){
							if (classi.includes("F2")||classi.includes("M1")||classi.includes("M2")||classi.includes("F₂")||classi.includes("M₁")||classi.includes("M₂")){
								document.getElementById(convec).value = 0;
							};
							if (classi.includes("F1")||classi.includes("E2")||classi.includes("F₁")||classi.includes("E₂")){
								document.getElementById(convec).value = parseFloat(document.getElementById(mpeVal).value)/3
							}	
						}
						function toStringWithSignificantDigits( x, len ){
							if(x==0) return x.toFixed(len-1);
							var numDigits = Math.ceil(Math.log10(Math.abs(x)));
							var rounded = Math.round(x*Math.pow(10,len-numDigits))*Math.pow(10,numDigits-len); 
							return rounded.toFixed(Math.max(len-numDigits,0));  
						}
						function addNewStandard(tableID){
								var table = document.getElementById(tableID);

								var rowCount = table.rows.length;
								var rowNum = rowCount ;
								var row = table.insertRow(rowCount);

								// console.log(table.rows.length );
								rowOfTable = table.rows.length;

								var cell1 = row.insertCell(0);
								var element1 = document.createElement("input");
								element1.type = "text";
								element1.id="nominalValue"+rowNum;
								element1.className="form-control";
								cell1.appendChild(element1);

								var cell2 = row.insertCell(1);
								var element1 = document.createElement("input");
								element1.type = "text";
								element1.id="marking"+rowNum;
								element1.className="form-control";
								cell2.appendChild(element1);

								var cell3 = row.insertCell(2);
								var element1 = document.createElement("input");
								element1.type = "text";
								element1.id="conventionalMass"+rowNum;
								element1.className="form-control";
								cell3.appendChild(element1);

								var cell4 = row.insertCell(3);
								var element1 = document.createElement("input");
								element1.type = "text";
								element1.id="unit"+rowNum;
								element1.className="form-control";
								cell4.appendChild(element1);

								var cell5 = row.insertCell(4);
								var element1 = document.createElement("input");
								element1.type = "text";
								element1.id="uncertainty"+rowNum;
								element1.className="form-control";
								cell5.appendChild(element1);

								var cell6 = row.insertCell(5);
								var element1 = document.createElement("input");
								element1.type = "text";
								element1.id="mpe"+rowNum;
								element1.className="form-control";
								cell6.appendChild(element1);


						}

						function toggleAlert(){
							$('.alert').alert()
						}
						

						function eccentricityError(pos){
							var p1Start = document.getElementById('eccentricity1Start');
							var p1End = document.getElementById('eccentricity1End');
							var p2 = document.getElementById('eccentricity2');
							var p3 = document.getElementById('eccentricity3');
							var p4 = document.getElementById('eccentricity4');
							var p5 = document.getElementById('eccentricity5');
							var e2 = document.getElementById('error2');
							var e3 = document.getElementById('error3');
							var e4 = document.getElementById('error4');
							var e5 = document.getElementById('error5');
							var e1 = document.getElementById('error1');
							var e2View = document.getElementById('error2View');
							var e3View = document.getElementById('error3View');
							var e4View = document.getElementById('error4View');
							var e5View = document.getElementById('error5View');
							var e1View = document.getElementById('error1View');
							var errDiff = document.getElementById('errDiff');
							var p1SValue = parseFloat(p1Start.value).toFixed(4);
							var p1EValue = parseFloat(p1End.value).toFixed(4);
							var p2Value = parseFloat(p2.value).toFixed(4);
							var p3Value = parseFloat(p3.value).toFixed(4);
							var p4Value = parseFloat(p4.value).toFixed(4);
							var p5Value = parseFloat(p5.value).toFixed(4);

							var e2value=parseFloat(p2Value-((parseFloat(p1SValue)+parseFloat(p1EValue))/2)).toFixed(4);
							var e3value=parseFloat(p3Value-((parseFloat(p1SValue)+parseFloat(p1EValue))/2)).toFixed(4);
							var e4value=parseFloat(p4Value-((parseFloat(p1SValue)+parseFloat(p1EValue))/2)).toFixed(4);
							var e5value=parseFloat(p5Value-((parseFloat(p1SValue)+parseFloat(p1EValue))/2)).toFixed(4);
							var e1value=parseFloat(p1EValue-((parseFloat(p1SValue)+parseFloat(p1EValue))/2)).toFixed(4);

							e2View.value=parseFloat(p2Value-((parseFloat(p1SValue)+parseFloat(p1EValue))/2)).toFixed(4);
							e3View.value=parseFloat(p3Value-((parseFloat(p1SValue)+parseFloat(p1EValue))/2)).toFixed(4);
							e4View.value=parseFloat(p4Value-((parseFloat(p1SValue)+parseFloat(p1EValue))/2)).toFixed(4);
							e5View.value=parseFloat(p5Value-((parseFloat(p1SValue)+parseFloat(p1EValue))/2)).toFixed(4);
							e1View.value=parseFloat(p1EValue-((parseFloat(p1SValue)+parseFloat(p1EValue))/2)).toFixed(4);

							e2.value=parseFloat(p2Value-((parseFloat(p1SValue)+parseFloat(p1EValue))/2));
							e3.value=parseFloat(p3Value-((parseFloat(p1SValue)+parseFloat(p1EValue))/2));
							e4.value=parseFloat(p4Value-((parseFloat(p1SValue)+parseFloat(p1EValue))/2));
							e5.value=parseFloat(p5Value-((parseFloat(p1SValue)+parseFloat(p1EValue))/2));
							e1.value=parseFloat(p1EValue-((parseFloat(p1SValue)+parseFloat(p1EValue))/2));
							errDiff.value=parseFloat(Math.max(Math.abs(e2value),Math.abs(e3value),Math.abs(e4value),Math.abs(e5value))).toFixed(4);
							

							
						}

						function averageTempRh(){
							var sTemp =document.getElementById('startTemp').value;
							var eTemp = document.getElementById('endTemp').value;
							var aTemp = document.getElementById('aveTemp');
							var sRh =document.getElementById('startRh').value;
							var eRh = document.getElementById('endRh').value;
							var aRh = document.getElementById('AveRh');
							var sumOfTemp = parseFloat(sTemp)+parseFloat(eTemp);
							var sumOfRh= parseFloat(sRh)+parseFloat(eRh);
							aTemp.value = toStringWithSignificantDigits(sumOfTemp/2,4);
							aRh.value = toStringWithSignificantDigits(sumOfRh/2,4);
							
						}

						function addStandarkMark({conven,uncer,mpe}){
							var ConventionalMass = document.getElementById(conven);
							var Uncertainty = document.getElementById(uncer);
							var Mpe = document.getElementById(mpe);

							
						}

						function getWeight(){
							// var weight = document.getElementById('weight2').value;
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
							document.getElementById('weight').value = weight;
							addStandardToTbody();
							addDetailsToHead();
						}
						getWeight();
						function extendedUncert({Un,Mpe,c,i,expandedID}){
							var ReferenceWeightCalculated;
							var AirBuoyancytCalculated;
							var DriftOfWeightCalculated;
							var ConvectionEffectsCalculated;
							var RoundingNoLoadCalculated;
							var RoundingWithLoadCalculated;
							var EccentricityCalculated;
							var RepeatabilityCalculated;
							var StandardUncertaintyError;
							var U3 = document.getElementById('readabilityMeasurement').value;
							var Un2 = parseFloat(document.getElementById(Un).value);
							var Mpe2 = parseFloat(document.getElementById(Mpe).value);
							var c2 = parseFloat(document.getElementById(c).value);
							var i2 = parseFloat(document.getElementById(i).value);
							var d = parseFloat(document.getElementById("readability").value);
							var ErrDiff = parseFloat(document.getElementById("errDiff").value);
							var TestLoad = parseFloat(document.getElementById("load").value);

							// console.log(U3+" U3 "+Un2+ " Un2 "+Mpe2+ " Mpe2 "+c2+ " c2 "+i2+ " i2 "+d+ " d "+ErrDiff+ " ErrDiff "+TestLoad+ " TestLoad ");
							//old formula mg = ConvectionEffectsCalculated = c2/(3*Math.sqrt(3)); g = ConvectionEffectsCalculated = c2/1000/(3*Math.sqrt(3)); kg = ConvectionEffectsCalculated = c2/(1000000/(3*Math.sqrt(3)));
							if(U3=="mg"){
								ReferenceWeightCalculated = Un2/2;
								AirBuoyancytCalculated = Mpe2/(4*Math.sqrt(3));
								DriftOfWeightCalculated = Mpe2/(3*Math.sqrt(3));
								ConvectionEffectsCalculated = c2/(Math.sqrt(3));

							}
							if(U3=="g"){
								ReferenceWeightCalculated = Un2/(1000*2);
								AirBuoyancytCalculated = Mpe2/1000/(4*Math.sqrt(3));
								DriftOfWeightCalculated = Mpe2/1000/(3*Math.sqrt(3));
								ConvectionEffectsCalculated = c2/1000/(Math.sqrt(3));
							}
							if(U3=="kg"){
								ReferenceWeightCalculated = Un2/(1000000*2);
								AirBuoyancytCalculated = Mpe2/(1000000*4*Math.sqrt(3));
								DriftOfWeightCalculated = Mpe2/(1000000*3*Math.sqrt(3));
								ConvectionEffectsCalculated = c2/(1000000*Math.sqrt(3));
							}

							RoundingNoLoadCalculated = d/(2*Math.sqrt(3));
							RoundingWithLoadCalculated = d/(2*Math.sqrt(3));
							EccentricityCalculated = i2*ErrDiff/2/TestLoad/Math.sqrt(3);
							RepeatabilityCalculated = parseFloat(document.getElementById("stDevReal").value);

							StandardUncertaintyError = 
							Math.sqrt((Math.pow(ReferenceWeightCalculated,2))+
							(Math.pow(AirBuoyancytCalculated,2))+
							(Math.pow(DriftOfWeightCalculated,2))+
							(Math.pow(ConvectionEffectsCalculated,2))+
							(Math.pow(RoundingNoLoadCalculated,2))+
							(Math.pow(RoundingWithLoadCalculated,2))+
							(Math.pow(EccentricityCalculated,2))+
							(Math.pow(RepeatabilityCalculated,2)));

							// console.log((Math.pow(ReferenceWeightCalculated,2))+
							// (Math.pow(AirBuoyancytCalculated,2))+
							// (Math.pow(DriftOfWeightCalculated,2))+
							// (Math.pow(ConvectionEffectsCalculated,2))+
							// (Math.pow(RoundingNoLoadCalculated,2))+
							// (Math.pow(RoundingWithLoadCalculated,2))+
							// (Math.pow(EccentricityCalculated,2))+
							// (Math.pow(RepeatabilityCalculated,2)))

							 console.log(ReferenceWeightCalculated+" ReferenceWeightCalculated");
							 console.log(AirBuoyancytCalculated+" AirBuoyancytCalculated");
							 console.log(DriftOfWeightCalculated+" DriftOfWeightCalculated");
							 console.log(ConvectionEffectsCalculated+" ConvectionEffectsCalculated");
							 console.log(RoundingNoLoadCalculated+" RoundingNoLoadCalculated");
							 console.log(RoundingWithLoadCalculated+" RoundingWithLoadCalculated");
							 console.log(EccentricityCalculated+" EccentricityCalculated");
							 console.log(RepeatabilityCalculated+" RepeatabilityCalculated");
							 console.log(StandardUncertaintyError+" StandardUncertaintyError");
							 console.log((StandardUncertaintyError*2)+" uncertaintyExpanded");

							//document.getElementById(expandedID).value = toStringWithSignificantDigits(StandardUncertaintyError*2,4);
							document.getElementById(expandedID).value = StandardUncertaintyError*2;
							if(Number.isNaN(Number(StandardUncertaintyError*2))){
								return false;
							}else{
								return true;
							}
						}
						function extendedUncertIndication0({Un,Mpe,c,i,expandedID}){
							var ReferenceWeightCalculated;
							var AirBuoyancytCalculated;
							var DriftOfWeightCalculated;
							var ConvectionEffectsCalculated;
							var RoundingNoLoadCalculated;
							var RoundingWithLoadCalculated;
							var EccentricityCalculated;
							var RepeatabilityCalculated;
							var StandardUncertaintyError;
							var U3 = document.getElementById('readabilityMeasurement').value;
							var Un2 = parseFloat(document.getElementById(Un).value);
							var Mpe2 = parseFloat(document.getElementById(Mpe).value);
							var c2 = parseFloat(document.getElementById(c).value);
							var i2 = parseFloat(document.getElementById(i).value);
							var d = parseFloat(document.getElementById("readability").value);
							var ErrDiff = parseFloat(document.getElementById("errDiff").value);
							var TestLoad = parseFloat(document.getElementById("load").value);

							console.log(U3+" U3 "+Un2+ " Un2 "+Mpe2+ " Mpe2 "+c2+ " c2 "+i2+ " i2 "+d+ " d "+ErrDiff+ " ErrDiff "+TestLoad+ " TestLoad ");

							if(U3=="mg"){
								ReferenceWeightCalculated = Un2/2;
								AirBuoyancytCalculated = Mpe2/(4*Math.sqrt(3));
								DriftOfWeightCalculated = Mpe2/(3*Math.sqrt(3));
								ConvectionEffectsCalculated = c2/(3*Math.sqrt(3));

							}
							if(U3=="g"){
								ReferenceWeightCalculated = Un2/(1000*2);
								AirBuoyancytCalculated = Mpe2/1000/(4*Math.sqrt(3));
								DriftOfWeightCalculated = Mpe2/1000/(3*Math.sqrt(3));
								ConvectionEffectsCalculated = c2/1000/(3*Math.sqrt(3));
							}
							if(U3=="kg"){
								ReferenceWeightCalculated = Un2/(1000000*2);
								AirBuoyancytCalculated = Mpe2/(1000000*4*Math.sqrt(3));
								DriftOfWeightCalculated = Mpe2/(1000000*3*Math.sqrt(3));
								ConvectionEffectsCalculated = c2/(1000000/(3*Math.sqrt(3)));
							}

							RoundingNoLoadCalculated = d/(2*Math.sqrt(3));
							RoundingWithLoadCalculated = d/(2*Math.sqrt(3));
							EccentricityCalculated = i2*ErrDiff/2/TestLoad/Math.sqrt(3);
							RepeatabilityCalculated = parseFloat(document.getElementById("stDevReal").value);

							StandardUncertaintyError = 
							Math.sqrt((Math.pow(ReferenceWeightCalculated,2))+
							(Math.pow(AirBuoyancytCalculated,2))+
							(Math.pow(DriftOfWeightCalculated,2))+
							(Math.pow(ConvectionEffectsCalculated,2))+
							(Math.pow(RoundingNoLoadCalculated,2))+
							(Math.pow(EccentricityCalculated,2))+
							(Math.pow(RepeatabilityCalculated,2)));

							console.log((Math.pow(ReferenceWeightCalculated,2))+
							(Math.pow(AirBuoyancytCalculated,2))+
							(Math.pow(DriftOfWeightCalculated,2))+
							(Math.pow(ConvectionEffectsCalculated,2))+
							(Math.pow(RoundingNoLoadCalculated,2))+
							(Math.pow(EccentricityCalculated,2))+
							(Math.pow(RepeatabilityCalculated,2)))

							 console.log(ReferenceWeightCalculated+" ReferenceWeightCalculated");
							 console.log(AirBuoyancytCalculated+" AirBuoyancytCalculated");
							 console.log(DriftOfWeightCalculated+" DriftOfWeightCalculated");
							 console.log(ConvectionEffectsCalculated+" ConvectionEffectsCalculated");
							 console.log(RoundingNoLoadCalculated+" RoundingNoLoadCalculated");
							 console.log(RoundingWithLoadCalculated+" RoundingWithLoadCalculated");
							 console.log(EccentricityCalculated+" EccentricityCalculated");
							 console.log(RepeatabilityCalculated+" RepeatabilityCalculated");
							 console.log(StandardUncertaintyError+" StandardUncertaintyError");
							 console.log((StandardUncertaintyError*2)+" uncertaintyExpanded");

							//document.getElementById(expandedID).value = toStringWithSignificantDigits(StandardUncertaintyError*2,4);
							document.getElementById(expandedID).value = StandardUncertaintyError*2;
							if(Number.isNaN(Number(StandardUncertaintyError*2))){
								return false;
							}else{
								return true;
							}
						}
						function extendedUncertForHanging({Un,Mpe,c,i,expandedID}){
							var ReferenceWeightCalculated;
							var AirBuoyancytCalculated;
							var DriftOfWeightCalculated;
							var ConvectionEffectsCalculated;
							var RoundingNoLoadCalculated;
							var RoundingWithLoadCalculated;
							var EccentricityCalculated;
							var RepeatabilityCalculated;
							var StandardUncertaintyError;
							var U3 = document.getElementById('readabilityMeasurement').value;
							var Un2 = parseFloat(document.getElementById(Un).value);
							var Mpe2 = parseFloat(document.getElementById(Mpe).value);
							var c2 = parseFloat(document.getElementById(c).value);
							var i2 = parseFloat(document.getElementById(i).value);
							var d = parseFloat(document.getElementById("readability").value);
							var TestLoad = parseFloat(document.getElementById("load").value);

							if(U3=="mg"){
								ReferenceWeightCalculated = Un2/2;
								AirBuoyancytCalculated = Mpe2/(4*Math.sqrt(3));
								DriftOfWeightCalculated = Mpe2/(3*Math.sqrt(3));
								ConvectionEffectsCalculated = c2/(Math.sqrt(3));

							}
							if(U3=="g"){
								ReferenceWeightCalculated = Un2/(1000*2);
								AirBuoyancytCalculated = Mpe2/1000/(4*Math.sqrt(3));
								DriftOfWeightCalculated = Mpe2/1000/(3*Math.sqrt(3));
								ConvectionEffectsCalculated = c2/1000/(Math.sqrt(3));
							}
							if(U3=="kg"){
								ReferenceWeightCalculated = Un2/(1000000*2);
								AirBuoyancytCalculated = Mpe2/(1000000*4*Math.sqrt(3));
								DriftOfWeightCalculated = Mpe2/(1000000*3*Math.sqrt(3));
								ConvectionEffectsCalculated = c2/(1000000*Math.sqrt(3));
							}

							RoundingNoLoadCalculated = d/(2*Math.sqrt(3));
							RoundingWithLoadCalculated = d/(2*Math.sqrt(3));
							RepeatabilityCalculated = parseFloat(document.getElementById("stDevReal").value);

							StandardUncertaintyError = 
							Math.sqrt((Math.pow(ReferenceWeightCalculated,2))+
							(Math.pow(AirBuoyancytCalculated,2))+
							(Math.pow(DriftOfWeightCalculated,2))+
							(Math.pow(ConvectionEffectsCalculated,2))+
							(Math.pow(RoundingNoLoadCalculated,2))+
							(Math.pow(RoundingWithLoadCalculated,2))+
							(Math.pow(RepeatabilityCalculated,2)));

							console.log(ReferenceWeightCalculated+" ReferenceWeightCalculated");
							console.log(AirBuoyancytCalculated+" AirBuoyancytCalculated");
							console.log(DriftOfWeightCalculated+" DriftOfWeightCalculated");
							console.log(ConvectionEffectsCalculated+" ConvectionEffectsCalculated");
							console.log(RoundingNoLoadCalculated+" RoundingNoLoadCalculated");
							console.log(RoundingWithLoadCalculated+" RoundingWithLoadCalculated");
							console.log(EccentricityCalculated+" EccentricityCalculated");
							console.log(RepeatabilityCalculated+" RepeatabilityCalculated");
							console.log(StandardUncertaintyError+" StandardUncertaintyError");
							console.log((StandardUncertaintyError*2)+" uncertaintyExpanded");

							//document.getElementById(expandedID).value = toStringWithSignificantDigits(StandardUncertaintyError*2,4);
							document.getElementById(expandedID).value = StandardUncertaintyError*2;
							if(Number.isNaN(Number(StandardUncertaintyError*2))){
								return false;
							}else{
								return true;
							}
						}
						function extendedUncertForHangingIndication0({Un,Mpe,c,i,expandedID}){
							var ReferenceWeightCalculated;
							var AirBuoyancytCalculated;
							var DriftOfWeightCalculated;
							var ConvectionEffectsCalculated;
							var RoundingNoLoadCalculated;
							var RoundingWithLoadCalculated;
							var EccentricityCalculated;
							var RepeatabilityCalculated;
							var StandardUncertaintyError;
							var U3 = document.getElementById('readabilityMeasurement').value;
							var Un2 = parseFloat(document.getElementById(Un).value);
							var Mpe2 = parseFloat(document.getElementById(Mpe).value);
							var c2 = parseFloat(document.getElementById(c).value);
							var i2 = parseFloat(document.getElementById(i).value);
							var d = parseFloat(document.getElementById("readability").value);
							var TestLoad = parseFloat(document.getElementById("load").value);

							if(U3=="mg"){
								ReferenceWeightCalculated = Un2/2;
								AirBuoyancytCalculated = Mpe2/(4*Math.sqrt(3));
								DriftOfWeightCalculated = Mpe2/(3*Math.sqrt(3));
								ConvectionEffectsCalculated = c2/(3*Math.sqrt(3));

							}
							if(U3=="g"){
								ReferenceWeightCalculated = Un2/(1000*2);
								AirBuoyancytCalculated = Mpe2/1000/(4*Math.sqrt(3));
								DriftOfWeightCalculated = Mpe2/1000/(3*Math.sqrt(3));
								ConvectionEffectsCalculated = c2/1000/(3*Math.sqrt(3));
							}
							if(U3=="kg"){
								ReferenceWeightCalculated = Un2/(1000000*2);
								AirBuoyancytCalculated = Mpe2/(1000000*4*Math.sqrt(3));
								DriftOfWeightCalculated = Mpe2/(1000000*3*Math.sqrt(3));
								ConvectionEffectsCalculated = c2/(1000000/(3*Math.sqrt(3)));
							}

							RoundingNoLoadCalculated = d/(2*Math.sqrt(3));
							RoundingWithLoadCalculated = d/(2*Math.sqrt(3));
							RepeatabilityCalculated = parseFloat(document.getElementById("stDevReal").value);

							StandardUncertaintyError = 
							Math.sqrt((Math.pow(ReferenceWeightCalculated,2))+
							(Math.pow(AirBuoyancytCalculated,2))+
							(Math.pow(DriftOfWeightCalculated,2))+
							(Math.pow(ConvectionEffectsCalculated,2))+
							(Math.pow(RoundingNoLoadCalculated,2))+
							(Math.pow(RepeatabilityCalculated,2)));

							//document.getElementById(expandedID).value = toStringWithSignificantDigits(StandardUncertaintyError*2,4);
							document.getElementById(expandedID).value = StandardUncertaintyError*2;
							if(Number.isNaN(Number(StandardUncertaintyError*2))){
								return false;
							}else{
								return true;
							}
						}
						function seeIfHanging(){
							var Description = document.getElementById('equipmentDescription');
							if(Description.value.toString().toLowerCase().includes(`hanging`)){
								return true;
							}else{
								return false;
							}

						}
						function disableEccentricityIfhanging(){
							var Description = document.getElementById('equipmentDescription');
							if(Description.value.toString().toLowerCase().includes(`digital hanging scale`)){
								console.log(`true`);
								document.getElementById('eccentricityTest').setAttribute(`style`,`display:none`)
							}else{
								console.log(`false`);
								document.getElementById('eccentricityTest').setAttribute(`style`,`display:block`)
							}
						}
						document.getElementById('equipmentDescription').addEventListener("input", disableEccentricityIfhanging);

						function stdevRepeat(){			
							var ArrayOfRepeat =[
								parseFloat(document.getElementById('repeat1').value), 
								parseFloat(document.getElementById('repeat2').value), 
								parseFloat(document.getElementById('repeat3').value),
								parseFloat(document.getElementById('repeat4').value),
								parseFloat(document.getElementById('repeat5').value),
								parseFloat(document.getElementById('repeat6').value),
								parseFloat(document.getElementById('repeat7').value),
								parseFloat(document.getElementById('repeat8').value),
								parseFloat(document.getElementById('repeat9').value),
								parseFloat(document.getElementById('repeat10').value)
							];
							var mean = (parseFloat(document.getElementById('repeat1').value)+
								parseFloat(document.getElementById('repeat2').value)+
								parseFloat(document.getElementById('repeat3').value)+
								parseFloat(document.getElementById('repeat4').value)+
								parseFloat(document.getElementById('repeat5').value)+
								parseFloat(document.getElementById('repeat6').value)+
								parseFloat(document.getElementById('repeat7').value)+
								parseFloat(document.getElementById('repeat8').value)+
								parseFloat(document.getElementById('repeat9').value)+
								parseFloat(document.getElementById('repeat10').value))/10;
							console.log(mean);
							
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
							SquaredOfSum = addingTheSquared / (10 - 1);

							var readability = parseFloat(document.getElementById('readability').value)
							
							if(Math.sqrt(SquaredOfSum) == '0' ){
								console.log('Math.sqrt(SquaredOfSum) = 0')
								//document.getElementById('stDev').value = readability/2;
								//document.getElementById('stDevReal').value =  readability/2;
								document.getElementById('stDev').value = Math.sqrt(SquaredOfSum);
								document.getElementById('stDevReal').value = Math.sqrt(SquaredOfSum);
							}else{
								console.log('Math.sqrt(SquaredOfSum)', Math.sqrt(SquaredOfSum))
								document.getElementById('stDev').value = toStringWithSignificantDigits(Math.sqrt(SquaredOfSum),2);
								document.getElementById('stDevReal').value = Math.sqrt(SquaredOfSum);
							}
					
						}
						function logValue(){
							var idName = document.getElementById("logInput").value;
							console.log("ID is: "+idName+" value is: "+document.getElementById(idName).value);
						}

					
					</script>

					<script>
						function triggerConversionOfCovenMass(unit){
							for(var i = 1; i <= 8; i++){
								covenMassUnit = document.getElementById('covenMassUnit'+i);
								covenMassUnit.value = unit;
								covenMassUnit.onchange();
							}
						}
					</script>
					
					<form name="correctionForm" action="/electCorrection" method="post">
						<input type="hidden" name="completion" id="" value="For correction">
						<input type="hidden" value="<?php echo $elect_table_1['id']; ?>" name="idCorrection">
					</form>
				
			</div>
			<!-- /#page-content-wrapper -->
		</div>
	</body>
</html>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
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
		calculateExtendedUncert();
		document.getElementById(idOfForm).submit();
	}
</script>
<script>
	$("#menu-toggle").click(function(e) {
	e.preventDefault();
	$("#wrapper").toggleClass("toggled");
	});


	function KgtoGConverter(weight) {
		document.getElementById("outputGrams").innerHTML=weight*1000;
	}

	function setDate() {
			let d = new Date(document.getElementById("sDate").value)
			let mon = +document.getElementById("mon").value;
			d.setMonth(d.getMonth()+mon)
			document.getElementById("eDate").valueAsDate = d;
		}

	document.getElementById("sDate").addEventListener("change",setDate)
	document.getElementById("mon").addEventListener("change",setDate)


	function myFunction(e) {
		document.getElementById("aveTemp").value = e.target.value
	}

	function myFunction1(e) {
		document.getElementById("AveRh").value = e.target.value
	}

	function logoutConfirmation(url){
		// windows.confirm("are u sure?");
		href="" 
			var txt;
			if (confirm("Do you want to logout <?= session('name')?>?")) {
				location.href = url;
			}
		}


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
			address.value = '';
		}
		
	}

	var personnels = <?= json_encode($personnel)?>;
    var verifiers = <?= json_encode($verifier)?>;
	$(document).ready(function(){
        addPersonnel();
    });

	function addPersonnel(){
        var calibrationOfficer = document.getElementById('personnelList');
        var verifier = document.getElementById('verifierList');
        var verifierPosition = document.getElementById('verifierPositionList');

		var selectedCalOff = '<?php echo $elect_table_1['calibratedBy'];?>';
		var selectedEncoded = '<?php echo $elect_table_1['encodedBy'];?>';
		var selectedChecked = '<?php echo $elect_table_1['checkedby'];?>';
		 

        personnels.forEach(item => {
            var option = document.createElement('option');
            option.setAttribute('value', item.personnelName);
            option.innerHTML = item.personnelName;
			if(item.personnelName == selectedCalOff){
				option.setAttribute('selected', '');
			}
            calibrationOfficer.appendChild(option);
			
        })
        verifiers.forEach(item => {
            var option = document.createElement('option');
            option.setAttribute('value', item.verifierName);
            option.setAttribute('data-verifierposition', item.verifierPosition);
            option.innerHTML = item.verifierName;
			if(item.verifierPosition == selectedEncoded){
				option.setAttribute('selected', '');
			}
            verifier.appendChild(option);

            var option = document.createElement('option');
            option.setAttribute('value', item.verifierPosition);
            option.setAttribute('data-verifiername', item.verifierName);
            option.innerHTML = item.verifierPosition;
			if(item.verifierName == selectedChecked){
				option.setAttribute('selected', '');
			}
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
        bind('verifierList','change',function(){
            copyFromDataset('verifierList', 'verifierPositionList', 'verifierposition')
        });
        bind('verifierPositionList','change',function(){
            copyFromDataset('verifierPositionList', 'verifierList', 'verifiername')
        });
	}
	bindEventsToInputAndButtons()

	function copyFromDataset(copyFrom, copyTo, datasetName){
        var from = document.getElementById(copyFrom);
        var to = document.getElementById(copyTo);
        to.value = from.selectedOptions[0].dataset[datasetName];
    }
</script>

<script>
	var role = '<?= $_SESSION['role'];?>';
    var page = '<?= $forVerification;?>';
    
    if(role == 'admin' && page == 'forVerification'){
        var buttonDiv = document.getElementById('forVerificationButtons');
        
        var verifyButton = document.createElement('button');
        var correctionButton = document.createElement('button');

        verifyButton.setAttribute('type', 'button');
        correctionButton.setAttribute('type', 'button');
        verifyButton.setAttribute('class', 'btn btn-success mr-3');
        correctionButton.setAttribute('class', 'btn btn-danger');
		verifyButton.setAttribute('onclick', 'toggleAlert();verify("formMain")');
		correctionButton.setAttribute('onclick', 'correction()');

        verifyButton.innerHTML = "Verify";
        correctionButton.innerHTML = "For Correction";
        buttonDiv.appendChild(verifyButton);
        buttonDiv.appendChild(correctionButton);
    } else{
		var buttonDiv = document.getElementById('forVerificationButtons');
		var updateButton = document.createElement('button');
		updateButton.setAttribute('type', 'button');
		updateButton.setAttribute('id', 'updateButton');
		updateButton.setAttribute('class', 'btn btn-lg btn-primary');
		updateButton.setAttribute('onclick', 'toggleAlert();submitForm("formMain")');
		updateButton.innerHTML = "<i class='fas fa-save'></i> Update";
		buttonDiv.appendChild(updateButton);
	}
	function verify(idOfForm){
		if(confirm("Are you sure you want to proceed?") == true){
			document.getElementById('completion').value = "For printing";
			calculateExtendedUncert();
			document.getElementById(idOfForm).submit();
        }
	}
    function correction(){
        if(confirm("Are you sure you want to proceed?") == true){
            document.correctionForm.submit();
        }
    }
</script>

<script src="/dashboardAsset/lib/jquery/jquery.min.js"></script>
<script src="/dashboardAsset/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/dashboardAsset/lib/feathericons/feather.min.js"></script>
<script src="/dashboardAsset/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/dashboardAsset/assets/js/script.js"></script>
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
</body>
</html>




<!-- 

	name of inputs

	certificateNumber
	customer
	address
	dateReceived
	dateCalibrated
	recommendedDueDate
	placeOfCalibration
	equipmentDescription
	manufacturer
	modelNumber
	serialNumber
	equipmentID
	maxCapacity
	maxCapacityMeasurement
	minCapacity
	minCapacityMeasurement
	readability
	readabilityMeasurement
	startTemp
	endTemp
	aveTemp
	startRh
	endRh
	AveRh
	weights
	preliminaryInspection
	repeat1
	repeat2
	repeat3
	repeat4
	repeat5
	repeat6
	repeat7
	repeat8
	repeat9
	repeat10
	stDev
	remarksA
	remarksB
	remarksC
	remarksD
	remarksE
	remarksF
	calibratedBy
	encodedBy
	checkedby
-->
