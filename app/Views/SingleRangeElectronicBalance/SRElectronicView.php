<?php
	use App\Models\ElectModel_3;
	use App\Models\ElectModel_2;
	use App\Models\CustomersModel;
	use App\Models\VerifierModel;

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

	$sn=NULL;
?>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<!DOCTYPE html>
<html lang="en">
	<title>RML ++</title>
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Favicon -->
		<!-- <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png"> -->
		
		<link href="dashboardAsset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Vendor CSS -->
		<link href="dashboardAsset/lib/remixicon/fonts/remixicon.css" rel="stylesheet">
		
		<!-- Template CSS -->
		<link rel="stylesheet" href="dashboardAsset/assets/css/style.min.css">

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
			.disable{
				display:none;
			}
			
			.inputTable{
				border: none; 
				outline: none; 
			}
		</style>
	</head>  
<body class="skin-base animate">
	<?php
		$data = [
			'active' => 'worksheet2',
			'show' => 'worksheet',
		];
	echo view('layouts/sidebarAdmin',$data)?>


   
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div class="content">
        <div class="card m-5">
					<div class="card-body">
						<h2 class="mx-auto d-flex justify-content-center">Single Range Electronic Balance</h2>
						<div class="card m-2 border-light">
							<div class="card-header text-white bg-primary">
								<h3 class="card-title d-flex justify-content-center">Customer information</h3>
							</div>
							<div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)">
                  				<?php if (isset($validation)) : ?>
												<div class="col-12">
													<div class="alert alert-danger" role="alert">
														<?= $validation->listErrors() ?>
													</div>
												</div>
											<?php endif; ?>
										<div class="card-body">
											<form action="<?= base_url('electSave') ?>" method="POST" id='formMain' enctype="multipart/form-data">
											<input type="hidden" name="completion" id="completion">
											<input type="hidden" name="calibratorAccountEmail" id="calibratorAccountEmail" value="<?= session('email')?>">
											<input type="hidden" name="calibratorAccountID" id="calibratorAccountID" value="<?= session('id')?>">


									<!--Customer INFORMATION-->
										<div class='row bg'>
											<div class='col'>
												<div class="mb-3">
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
													<input type="hidden" name="idOfCustomer" id="idOfCustomer">	
											</div>
												<div class="mb-3">
													<label for="">Address</label>
													<input type="text" name='address' value="<?= set_value('address')?>" id="address" style="height:130px" required type="text" class="form-control mt-n2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
												</div>
											</div>
											<div class='col'>
												<div class="mb-3 ">
														<label for="">TSR Number:</label>
													<input name='tsrNumber' type="text" class="form-control mt-n2 text-break">
												</div>
												<div class="mb-3 ">
													<label for="">Date Received</label>
													<input name='dateReceived' value="<?= set_value('dateReceived')?>" required type="date" class="form-control mt-n2 text-break" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
												</div>
												<div class="mb-3">
													<label>Recommended Due Date (Optional)</label>
													<input name='recommendedDueDate' value="<?= set_value('recommendedDueDate')?>" id="eDate" required type="date" class="form-control text-break" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
												</div>
											</div>
										</div>
									</div>
											
								</div>
									<!--Customer INFORMATION-->
										
									<!-- EQUIPMENT -->
										<div class="card mt-2 border-light">
											<div class="card-header text-white bg-primary">
												<h3 class="card-title d-flex justify-content-center">Equipment information</h3>
											</div>
										<div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)">
										<div class="row">		
											<div class="col">
												<div class="mb-3">
													<label>Date Calibrated</label>
													<input name='dateCalibrated' value="<?= set_value('dateCalibrated')?>" required type="date" class="form-control mt-n2 text-break" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
												</div>
												<div class="mb-2">
													<label>Calibration Certificate Number</label>
													<input oninput="checkCertNum()" name='certificateNumber' id='certificateNumber' value="<?= set_value('certificateNumber')?>" type="text" class="form-control  mt-n2 " required/>
													<input type="hidden" id="isSameCertNum" value='false'>
												</div>
												<div class="mb-2">
													<label>Description</label>
													<input name='equipmentDescription' id='equipmentDescription' value="<?= set_value('equipmentDescription')?>" required type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
												</div>
												<div class="mb-2">
													<label>Manufacturer</label>
													<input name="manufacturer" id="manufacturer" value="<?= set_value('manufacturer')?>" required type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
												</div>
												<div class="mb-2">
													<span>Model</span>
													<input name='modelNumber' id='modelNumber' value="<?= set_value('modelNumber')?>" required type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
												</div>
												<div class="mb-2">
													<span >Serial Number</span>
													<input name='serialNumber' id='serialNumber' value="<?= set_value('serialNumber')?>" required type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
												</div>
												<div class="">
													<label>Equipment ID (Optional):</label>
													<input name='equipmentID' id='equipmentID' value="<?= set_value('equipmentID')?>" required type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
												</div>
											</div>
											<div class="col my-auto">
												<div class="mb-3">
													<label>Place of Calibration</label>    
													<input  name="placeOfCalibration" type="text" class="form-control  mt-n2 " required/>
												</div>
												<div class="mb-3">
													<label>Capacity / Range / Span</label>
													<div class="input-group mb-2">
														<input name='maxCapacity' id='maxCapacity' value="<?= set_value('maxCapacity')?>" required type="text" class="form-control ">
														<div class="input-group-append">
															<select name='maxCapacityMeasurement' required id='maxCapacityMeasurement' onchange="console.log(this.value)" class="form-select btn-outline-secondary " >
																<option selected>Choose. . .</option>
																<option value="mg" <?php echo set_select('maxCapacityMeasurement[]', 'mg'); ?> >mg</option>
																<option value="g" <?php echo set_select('maxCapacityMeasurement[]', 'g'); ?> >g</option>
																<option value="kg" <?php echo set_select('maxCapacityMeasurement[]', 'kg'); ?> >kg</option>
															</select>
														</div>
													</div>
												</div>
												<div class="mb-3">
													<label for="">Resolution / Graduation</label>
													<input  name="resolution" type="text" class="form-control  mt-n2 "/>
												</div>
												
												<label>Readability(for graduation)</label>
												<div class="input-group mb-2">
													<input name='readability' id='readability' value="<?= set_value('readability')?>" required id='readability' type="text" class="form-control " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
														<div class="input-group-append">
															<select name='readabilityMeasurement' required id='readabilityMeasurement' onchange="console.log(this.value)" class="form-select btn-outline-secondary " aria-label=".form-select-sm example">
																<option selected>Choose. . .</option>
																<option value="mg" <?php echo set_select('readabilityMeasurement[]', 'mg'); ?> >mg</option>
																<option value="g" <?php echo set_select('readabilityMeasurement[]', 'g'); ?> >g</option>
																<option value="kg" <?php echo set_select('readabilityMeasurement[]', 'kg'); ?> >kg</option>
															</select>
														</div>
												</div>
												<label>K</label>
												<div class="input-group mb-3">
													<input name='kForCompute' required id='kForCompute' type="text" class="form-control" value="2">
												</div>
											</div>
										</div>
									</div>

										<div class="card mt-2 border-light "style="background-color:rgba(13, 110, 253, 0.36)">
											<div class="card-header text-white bg-primary">
												<div class="row">
													<div class="mx-auto d-flex justify-content-center">
														<h3>Environmental Condition</h3>
													</div>
												</div>
											</div>  
											<div class='card-body text-white'>
												<div class='row'>
													<div class="col">
														<div class="row">
															<div>
																<label>Start:</label>
															</div>
														</div>
														<div class="row">
															<div class="">
																<label>Ambient Temperature:</label>
																<input oninput="averageTempRh()" name="startTemp" value="<?= set_value('startTemp')?>" required id="startTemp" type="text" class="form-control mt-n2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
															</div>
														</div>
														<div class="row">
															<div class="">
																<label>Relative Humidity:</label>
																<input oninput="averageTempRh()" name='startRh' id='startRH' type="text" class="form-control  mt-n2 " required/>
															</div>
														</div>
														<div class="row">
															<div class="">
																<label>Atmosperic Pressure (Optional)</label>
																<input  name='startAtmPressure' id='startAtmPressure' type="text" class="form-control  mt-n2 " />
															</div>
														</div>
													</div>
													<div class="col">
														<div class="row">
															<div class="">
																<label>End:</label>
															</div>
														</div>
														<div class="row">
															<div>
																<label>Ambient Temperature:</label>
																<input oninput="averageTempRh()" name="endTemp" value="<?= set_value('endTemp')?>" required id="endTemp" type="text" class="form-control mt-n2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
															</div>
														</div>
														<div class="row">
															<div>
																<label>Relative Humidity:</label>
																<input oninput="averageTempRh()" name="endRh" value="<?= set_value('endRh')?>" id="endRh" type="text" class="form-control mt-n2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
															</div>
														</div>
														<div class="row">
															<div class="">
																<label>Atmosperic Pressure (Optional)</label>
																<input name='endAtmPressure' id='endtAtmPressure' type="text" class="form-control  mt-n2 " />
															</div>
														</div>
													</div>
													<input name="aveTemp" value="<?php echo set_value('aveTemp')?>" id="aveTemp" type="hidden" class="form-control mt-n2" >
													<input name="AveRh" value="<?php echo set_value('AveRh')?>" id="AveRh" type="hidden" class="form-control mt-n2" >
												</div>
											</div>
										<!-- <div class="row mb-3">
												<div class="">
													<label>Start RH (% RH)</label>
													<input oninput="averageTempRh()" name="startRh" value="<?php# echo set_value('startRh')?>" id="startRh" type="text" class="form-control mt-n2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
												</div>
												<div class="col-6 col-xl-3 mt-2">
													<label>Average RH (% RH)</label>
													<input readonly name="AveRh" value="<?php# echo set_value('AveRh')?>"  style="background-color: #F1C40F;" required id="AveRh" type="text" class="form-control mt-n2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
												</div>		
										</div> -->
									<!-- EQUIPMENT -->
										<hr>
									<!-- SPECIFICATION -->	
										<!-- <div class='row'>
											<div class='col-6 '> -->
												<!-- <label>Maximum Capacity</label>
												<div class="input-group mb-3">
													<input name='maxCapacity' id='maxCapacity' value="<?php# echo set_value('maxCapacity')?>" required type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
													<div class="input-group-append">
														<select name='maxCapacityMeasurement' value="<?php #echo set_value('maxCapacityMeasurement')?>" required class="form-select btn-outline-secondary" aria-label=".form-select-sm example">
															<option selected>Choose. . .</option>
															<option value="mg"<?php #echo set_select('maxCapacityMeasurement[]', 'mg'); ?>>mg</option>
															<option value="g" <?php #echo set_select('maxCapacityMeasurement[]', 'g'); ?>>g</option>
															<option value="kg"<?php #echo set_select('maxCapacityMeasurement[]', 'kg'); ?>>kg</option>
														</select>
													</div>
												</div> -->
												<!-- <label>Minimum Capacity</label>
												<div class="input-group mb-3">
													<input name='minCapacity' value="N/A" required type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
													<div class="input-group-append">
															<select name='minCapacityMeasurement'  required class="form-select btn-outline-secondary "  aria-label=".form-select-sm example">
																<option selected>Choose. . .</option>
																<option value="mg" <?php #echo set_select('minCapacityMeasurement[]', 'mg'); ?>>mg</option>
																<option value="g" <?php #echo set_select('minCapacityMeasurement[]', 'g'); ?>>g</option>
																<option value="kg" <?php# echo set_select('minCapacityMeasurement[]', 'kg'); ?>>kg</option>
															</select>
													</div>
												</div> -->
												<!-- <label>Readability</label>
												<div class="input-group mb-3">
													<input name='readability' id='readability' value="<?php# echo set_value('readability')?>" required id='readability' type="text" class="form-control " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
														<div class="input-group-append">
															<select name='readabilityMeasurement' required id='readabilityMeasurement' onchange="console.log(this.value)" class="form-select btn-outline-secondary " aria-label=".form-select-sm example">
																<option selected>Choose. . .</option>
																<option value="mg" <?php# echo set_select('readabilityMeasurement[]', 'mg'); ?> >mg</option>
																<option value="g" <?php #echo set_select('readabilityMeasurement[]', 'g'); ?> >g</option>
																<option value="kg" <?php #echo set_select('readabilityMeasurement[]', 'kg'); ?> >kg</option>
															</select>
														</div>
													
												</div> -->
												
											<!-- </div>		
										</div> -->
									<!-- SPECIFICATION -->
										<br>

									

										
									<!-- WEIGHTS -->
										<div class="card mt-2 border-light "style="">
											<div class="card-header text-white bg-primary">
												<div class="row">
													<div class="mx-auto d-flex justify-content-center">
														<h3>Weights</h3>
													</div>
												</div>
											</div>  

											<div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36);">   						
												<div class="row">
													<div class="mx-auto d-flex justify-content-center">  
														<input name='weight' required class="form-check-input" type="hidden" id="weight">
														<!-- <a href="<?php //base_url('electHome') ?>" class="btn btn-danger float-end" style="right:0;top:0;"><i class="fas fa-balance-scale"></i> Change Weight</a> -->
														<button type="button" class="btn btn-success btn-lg" style="right:0;top:0;" data-toggle="modal" data-target="#staticBackdrop">
														Select/Change Weight
														</button>
													</div>	
												</div>
											</div>
									<!-- WEIGHTS -->
									<!-- PRELIMINARY -->
										<!-- <div class='position-relative'>
											<div class="position-absolute top-0 start-50 translate-middle">
												<h6>Preliminary Inspection</h6>
											</div>
											<br>
											<div class="start-50">
												<div class="form-check">
													<input name="premA" <?php #echo set_checkbox('premA', 'A'); ?> class="form-check-input" type="checkbox" value="A" id="premA">
													<label class="form-check-label" for="premA">
													The equipment should be free from dust and dirt
													</label>
												</div>
												<div class="form-check">
													<input name="premB" <?php #echo set_checkbox('premB', 'B'); ?> class="form-check-input" type="checkbox" value="B" id="premB">
													<label class="form-check-label" for="premB">
													The weighing pan should be clean and in proper form
													</label>
												</div>
												<div class="form-check">
													<input name="premC" <?php# echo set_checkbox('premC', 'C'); ?> class="form-check-input" type="checkbox" value="C" id="premC">
													<label class="form-check-label" for="premC">
													The readout display shall be without defects (such as color changes) that would impair the reading of the indication
													</label>
												</div>
												<div class="form-check">
													<input name="premD" <?php #echo set_checkbox('premD', 'D'); ?> class="form-check-input" type="checkbox" value="D" id="premD">
													<label class="form-check-label" for="premD">
													Level the instrument if indicating means is provided and note its conditions
													</label>
												</div>
												<div class="form-check">
													<input name="premE" <?php# echo set_checkbox('premE', 'E'); ?> class="form-check-input" type="checkbox" value="E" id="premE">
													<label class="form-check-label" for="premE">
													Check the tare mechanism if available
													</label>
												</div>
												<div class="form-check">
													<input name="premF" <?php# echo set_checkbox('premF', 'F'); ?> class="form-check-input" type="checkbox" value="F" id="premF">
													<label class="form-check-label" for="premF">
													Exercise the instrument by loading up to 80% of maximum capacity
													</label>
												</div>
												<div class="form-check">
													<input name="premG" <?php #echo set_checkbox('premG', 'G'); ?> class="form-check-input" type="checkbox" value="G" id="premG">
													<label class="form-check-label" for="premG">
													Record all necessary and vital information
													</label>
												</div>
											</div>
										</div> -->
									<!-- PRELIMINARY -->
									<!-- ECCENTRICITY -->
									<div class="card mt-2 border-light " style="">
										<div class="card-header text-white bg-primary">
											<div class="row">
												<h3 class="card-title mx-auto d-flex justify-content-center">Raw Data</h3> 
											</div>
										</div>
										<div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)">
											
										<div class="position-relative" id='eccentricityTest'>
											<div class=" row ">
												<h6 class='col text-center'>Eccentricity Test <select  class="btn-outline-secondary " name="eccentricityUnit" required onchange="console.log(this.value)">
														<option selected>Choose. . .</option>
														<option value="mg" <?= set_select('eccentricityUnit[]', 'mg'); ?> >mg</option>
														<option value="g" <?= set_select('eccentricityUnit[]', 'g'); ?>>g</option>
														<option value="kg" <?= set_select('eccentricityUnit[]', 'kg'); ?>>kg</option>
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
															<input type="text" tabindex="1" class="form-control" id='eccentricity1Start' oninput='eccentricityError(this.id)' name="eccentricity1Start" value="<?= set_value('eccentricity1Start')?>" required>
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
															<input type="text" tabindex="2" class="form-control" id='eccentricity2' name='eccentricity2' required oninput='eccentricityError(this.id)' value="<?= set_value('eccentricity2')?>">
														</td>
														<td >
														<input type="hidden"id="error2" name="error2">
														<input type="text"  tabindex="7" tabindex="" class="form-control" id="error2View" name="error2View" value="<?= set_value('error2')?>" required  style="background-color: #F1C40F;" readonly>						
														</td>
														<th scope="col" class='align-middle' style="text-align: center;">Load</th>
													</tr>
													<tr>
														<td style="text-align: center;">						
															3
														</td>
														<td>						
															<input type="text" tabindex="3"  class="form-control" id='eccentricity3' name='eccentricity3' required oninput='eccentricityError(this.id)' value="<?= set_value('eccentricity3')?>">
														</td>
														<td>
														<input type="hidden"id="error3" name="error3">
															<input type="text" tabindex="8"  class="form-control" id="error3View" name="error3View" value="<?= set_value('error3')?>" required readonly style="background-color: #F1C40F;">						
														</td>
														<td>
															<input type="text" tabindex="12" class="form-control" name="load" value="<?= set_value('load')?>" id="load" required>						
														</td>
													</tr>
													<tr>
														<td style="text-align: center;">						
															4
														</td>
														<td>						
															<input type="text" tabindex="4"  class="form-control" id='eccentricity4' name='eccentricity4' value="<?= set_value('eccentricity4')?>" required oninput='eccentricityError(this.id)'>
														</td>
														<td>
														<input type="text" tabindex="9"  class="form-control" id="error4View" name="error4View" value="<?= set_value('error4')?>" required readonly style="background-color: #F1C40F;">						
														<input type="hidden"id="error4" name="error4">						
														</td>
														<th scope="col" class='align-middle' style="text-align: center;">Error Difference</th>
													</tr>
													<tr>
														<td style="text-align: center;">						
															5
														</td>
														<td>						
															<input type="text" tabindex="5" class="form-control" id='eccentricity5' name='eccentricity5' value="<?= set_value('eccentricity5')?>" required oninput='eccentricityError(this.id)'>
														</td>
														<td>
														<input type="hidden"id="error5" name="error5">
															<input type="text" tabindex="10"  class="form-control"id="error5View" name="error5View" value="<?= set_value('error5')?>" required readonly  style="background-color: #F1C40F;">						
														</td>
														<td>
															<input type="text" tabindex="13" class="form-control" id="errDiff" name="errDiff" value="<?= set_value('errDiff')?>" required readonly  style="background-color: #F1C40F;">						
														</td>
													</tr>
													<tr>
														<td style="text-align: center;">						
															1
														</td>
														<td>						
															<input type="text" tabindex="6" class="form-control" id='eccentricity1End' name='eccentricity1End' value="<?= set_value('eccentricity1End')?>" required oninput='eccentricityError(this.id)'>
														</td>
														<td>
														<input type="hidden"id="error1" name="error1">
															<input type="text" tabindex="11"  class="form-control" id="error1View" name="error1View" value="<?= set_value('error1')?>" required readonly  style="background-color: #F1C40F;">						
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
															<input class="form-check-input me-3" type="checkbox" value="A" id="illusA" name="illusA" <?= set_checkbox('illusA', 'A')?>>
														</div>	
														<label class="form-check-label" for="illusA">
															<img src="<?php echo $base64IllusA; ?>" alt="DOST LOGO" height='90px' > 
														</label>
													</div>
													<div class="form-check col d-flex justify-content-center">
														<div class="input-group-prepend">
															<input class="form-check-input me-3" type="checkbox" value="B" id="illusB" name="illusB"  <?= set_checkbox('illusB', 'B')?>>
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
													<h6 class='col text-center'>Linearity Test 
														<select class="btn-outline-secondary " name="linearityUnit" id="linearityUnit" required onchange="triggerConversionOfCovenMass(this.value)">
															<option selected>Choose. . .</option>
															<option value="mg" <?= set_select('linearityUnit[]', 'mg'); ?>>mg</option>
															<option selected value="g" <?= set_select('linearityUnit[]', 'g'); ?>>g</option>
															<option value="kg" <?= set_select('linearityUnit[]', 'kg'); ?>>kg</option>
														</select> 
													</h6>
												</div>
												<input type="text" required style="display:none" id="calculateExtendUncert">
												<br>
											
												<input class="form-check-input" type="hidden" value="">
												<i>Note: If you're using mobile phone, switch to landscape mode.</i>
												
													<table class="table text-center table-bordered table-sm mb-3" >
														<thead>
															<tr>
																<th>Load</th>
																<th>Indication</th>
																<th>Standard Used</th>
																<th class='disable' style="font-size:.9em">Conventional Mass (g)</th>
																<th style="font-size:.9em">Conventional Mass <select class="disable" name="" id="" onchange="triggerConversionOfCovenMass(this.value)">
																		<option selected>Choose. . .</option>
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
																	<input type="text" tabindex="14" class="form-control" name="linearLoad1" required id="linearLoad1" value="0">
																</td>
																<td>						
																	<input type="text" tabindex="22" class="form-control" name="indication1" required id="indication1" value="0"onchange="LinearityError({covenMass:'convenMass1',Indiction:'indication1',LinError:'linearError1'})">
																</td>
																<td>						
																<div class="input-group ">
																	<input type="text" tabindex="30" class="form-control" placeholder="" id="mark1" name="mark1">
																	<input type="hidden" id="markHidden1" name="markHidden1">
																	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="selectedInd({id:'1'})">
																	+
																	</button>
																	<button type="button" class="btn btn-danger" onclick="DeleteInd({id:'1'})">
																	-
																	</button>
																</div>
																</td>
																<td class='disable'>	
																	<input type="text" tabindex="38" class="form-control" name="convenMass1" required id="convenMass1" value="0" readonly  style="background-color: #F1C40F;"> 																				
																</td>
																<td>	
																	<div class="input-group">
																		<input type="text" tabindex="38" class="form-control" name="convenMassG1" required id="convenMassG1" value="0" readonly style="background-color: #F1C40F;">
																		<select class="btn btn-outline-dark disable" id="covenMassUnit1" onchange="convertConventionalMass('convenMass1',this.value,'indication1','linearError1','convenMassG1')">
																			<!-- <option value="mg">mg</option> -->
																			<option selected value="g">g</option>
																			<option value="kg">kg</option>
																		</select>
																	</div>					
																</td>
																
																<td>						
																	<input type="text" tabindex="46" class="form-control" name="linearError1" required id="linearError1" value="0" readonly style="background-color: #F1C40F;">
																</td>
																<td>						
																	<input type="text"  tabindex="54" class="form-control" name="expandedUncertain1" required id="expandedUncertain1"value="0" readonly style="background-color: #F1C40F;">
																</td>
																<td>						
																	<input type="text"  tabindex="62" class="form-control" name="k1" required id="k1" readonly style="background-color: #F1C40F;" value=2.0000>
																</td>
															</tr>
															<tr>
																<td>						
																	<input type="text" tabindex="15" class="form-control" name="linearLoad2" value="<?= set_value('linearLoad2')?>" required id="linearLoad2">
																</td>
																<td>						
																	<input type="text" tabindex="23" class="form-control" name="indication2"  value="<?= set_value('indication2')?>" required id="indication2" onchange="LinearityError({covenMass:'convenMass2',Indiction:'indication2',LinError:'linearError2'})">
																</td>
																<td>						
																<div class="input-group ">
																<input type="text" tabindex="31" class="form-control" placeholder="" id="mark2" name="mark2" required>
																<input type="hidden" id="markHidden2" name="markHidden2">
																<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="selectedInd({id:'2'})">
																+
																</button>
																<button type="button" class="btn btn-danger" onclick="DeleteInd({id:'2'})">
																		-
																	</button>
																</div>
																</td>
																<td class='disable'>						
																	<input type="text" tabindex="39" class="form-control" name="convenMass2" required id="convenMass2"value="0" readonly style="background-color: #F1C40F;">
																</td>
																<td>	
																	<div class="input-group">
																		<input type="text" tabindex="38" class="form-control" name="convenMassG2" required id="convenMassG2" value="0" readonly style="background-color: #F1C40F;">
																		<select class="btn btn-outline-dark disable" id="covenMassUnit2" onchange="convertConventionalMass('convenMass2',this.value,'indication2','linearError2','convenMassG2')">
																			<!-- <option value="mg">mg</option> -->
																			<option selected value="g">g</option>
																			<option value="kg">kg</option>
																		</select>
																	</div>					
																</td>
																
																<td>						
																	<input type="text" tabindex="47" class="form-control" name="linearError2" required id="linearError2" value="0" readonly style="background-color: #F1C40F;">
																</td>
																<td>						
																	<input type="text"  tabindex="55" class="form-control" name="expandedUncertain2" required readonly style="background-color: #F1C40F;" id="expandedUncertain2"value="0">
																</td>
																<td>						
																	<input type="text"  tabindex="63" class="form-control" name="k2" id="k2" readonly style="background-color: #F1C40F;" value=2.0000>
																</td>
															</tr>
															<tr>
																<td>						
																	<input type="text" tabindex="16" class="form-control" name="linearLoad3" value="<?= set_value('linearLoad3')?>" id="linearLoad3">
																</td>
																<td>						
																	<input type="text" tabindex="24" class="form-control" name="indication3" value="<?= set_value('indication3')?>" id="indication3"onchange="LinearityError({covenMass:'convenMass3',Indiction:'indication3',LinError:'linearError3'})">
																</td>
																<td>						
																<div class="input-group ">
																<input type="text" tabindex="32" class="form-control" placeholder="" id="mark3" name="mark3">
																<input type="hidden" id="markHidden3" name="markHidden3">
																<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="selectedInd({id:'3'})">
																+
																</button>
																<button type="button" class="btn btn-danger" onclick="DeleteInd({id:'3'})">
																-
																</button></div>
																</td>
																<td class='disable'>						
																	<input type="text" tabindex="40" class="form-control" name="convenMass3" id="convenMass3"value="0" readonly style="background-color: #F1C40F;">
																</td>
																<td>	
																	<div class="input-group">
																		<input type="text" tabindex="38" class="form-control" name="convenMassG3" required id="convenMassG3" value="0" readonly style="background-color: #F1C40F;">
																		<select class="btn btn-outline-dark disable" id="covenMassUnit3" onchange="convertConventionalMass('convenMass3',this.value,'indication3','linearError3','convenMassG3')">
																			<!-- <option value="mg">mg</option> -->
																			<option selected value="g">g</option>
																			<option value="kg">kg</option>
																		</select>
																	</div>					
																</td>
																
																<td>						
																	<input type="text" tabindex="48" class="form-control" name="linearError3" id="linearError3" value="0" readonly style="background-color: #F1C40F;">
																</td>
																<td>						
																	<input type="text"  tabindex="56" class="form-control" name="expandedUncertain3" id="expandedUncertain3" readonly style="background-color: #F1C40F;" value="0">
																</td>
																<td>						
																	<input type="text"  tabindex="64" class="form-control" name="k3" id="k3" readonly style="background-color: #F1C40F;" value=2.0000>
																</td>
															</tr>
															<tr>
																<td>						
																	<input type="text" tabindex="17" class="form-control" name="linearLoad4" value="<?= set_value('linearLoad4')?>" id="linearLoad4">
																</td>
																<td>						
																	<input type="text" tabindex="25" class="form-control" name="indication4" value="<?= set_value('indication4')?>" id="indication4"onchange="LinearityError({covenMass:'convenMass4',Indiction:'indication4',LinError:'linearError4'})">
																</td>
																<td>						
																<div class="input-group">
																<input type="text" tabindex="33" class="form-control" placeholder="" id="mark4" name="mark4">
																<input type="hidden" id="markHidden4" name="markHidden4">
																<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"onclick="selectedInd({id:'4'})">
																+
																</button>
																<button type="button" class="btn btn-danger" onclick="DeleteInd({id:'4'})">
																-
																</button></div>
																</td>
																<td  class='disable'>						
																	<input type="text" tabindex="41" class="form-control" name="convenMass4" id="convenMass4"value="0" readonly style="background-color: #F1C40F;">
																</td>
																<td>	
																	<div class="input-group">
																		<input type="text" tabindex="38" class="form-control" name="convenMassG4" required id="convenMassG4" value="0" readonly style="background-color: #F1C40F;">
																		<select class="btn btn-outline-dark disable" id="covenMassUnit4" onchange="convertConventionalMass('convenMass4',this.value,'indication4','linearError4','convenMassG4')">
																			<!-- <option value="mg">mg</option> -->
																			<option selected value="g">g</option>
																			<option value="kg">kg</option>
																		</select>
																	</div>					
																</td>
																
																<td>						
																	<input type="text" tabindex="49" class="form-control" name="linearError4" id="linearError4" value="0" readonly style="background-color: #F1C40F;">
																</td>
																<td>						
																	<input type="text"  tabindex="57" class="form-control" name="expandedUncertain4" readonly style="background-color: #F1C40F;" id="expandedUncertain4"value="0">
																</td>
																<td>						
																	<input type="text"  tabindex="65" class="form-control" name="k4" id="k4" readonly style="background-color: #F1C40F;" value=2.0000>
																</td>
															</tr>
															<tr>
																<td>						
																	<input type="text" tabindex="18"  class="form-control"name="linearLoad5" value="<?= set_value('linearLoad5')?>" id="linearLoad5">
																</td>
																<td>						
																	<input type="text" tabindex="26" class="form-control" name="indication5" value="<?= set_value('indication5')?>" id="indication5"onchange="LinearityError({covenMass:'convenMass5',Indiction:'indication5',LinError:'linearError5'})">
																</td>
																<td>						
																<div class="input-group ">
																<input type="text" tabindex="34" class="form-control" placeholder="" id="mark5" name="mark5">
																<input type="hidden" id="markHidden5" name="markHidden5">
																<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="selectedInd({id:'5'})">
																+
																</button>
																<button type="button" class="btn btn-danger" onclick="DeleteInd({id:'5'})">
																-
																</button></div>
																		</td>
																<td  class='disable'>						
																	<input type="text" tabindex="42" class="form-control" name="convenMass5" id="convenMass5"value="0" readonly style="background-color: #F1C40F;">
																</td>
																<td>	
																	<div class="input-group">
																		<input type="text" tabindex="38" class="form-control" name="convenMassG5" required id="convenMassG5" value="0" readonly style="background-color: #F1C40F;">
																		<select class="btn btn-outline-dark disable" id="covenMassUnit5" onchange="convertConventionalMass('convenMass5',this.value,'indication5','linearError5','convenMassG5')">
																			<!-- <option value="mg">mg</option> -->
																			<option selected value="g">g</option>
																			<option value="kg">kg</option>
																		</select>
																	</div>					
																</td>
																
																<td>						
																	<input type="text" tabindex="50" class="form-control" name="linearError5" id="linearError5" value="0" readonly style="background-color: #F1C40F;">
																</td>
																<td>						
																	<input type="text"  tabindex="58" class="form-control" name="expandedUncertain5" id="expandedUncertain5" readonly style="background-color: #F1C40F;" value="0">
																</td>
																<td>						
																	<input type="text"  tabindex="66" class="form-control" name="k5" id="k5" readonly style="background-color: #F1C40F;" value=2.0000>
																</td>
															</tr>
															<tr>
																<td>						
																	<input type="text" tabindex="19" class="form-control" name="linearLoad6" value="<?= set_value('linearLoad6')?>"  id="linearLoad6">
																</td>
																<td>						
																	<input type="text" tabindex="27" class="form-control" name="indication6" value="<?= set_value('indication6')?>"  id="indication6"onchange="LinearityError({covenMass:'convenMass6',Indiction:'indication6',LinError:'linearError6'})">
																</td>
																<td>						
																<div class="input-group ">
																<input type="text" tabindex="35" class="form-control" placeholder="" id="mark6" name="mark6">
																<input type="hidden" id="markHidden6" name="markHidden6">
																<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"onclick="selectedInd({id:'6'})">
																+
																</button>
																<button type="button" class="btn btn-danger" onclick="DeleteInd({id:'6'})">
																-
																</button></div>
																</td>
																<td class='disable'>						
																	<input type="text" tabindex="43" class="form-control" name="convenMass6" id="convenMass6"value="0" readonly style="background-color: #F1C40F;">
																</td>
																<td>	
																	<div class="input-group">
																		<input type="text" tabindex="38" class="form-control" name="convenMassG6" required id="convenMassG6" value="0" readonly style="background-color: #F1C40F;">
																		<select class="btn btn-outline-dark disable" id="covenMassUnit6" onchange="convertConventionalMass('convenMass6',this.value,'indication6','linearError6','convenMassG6')">
																			<!-- <option value="mg">mg</option> -->
																			<option selected value="g">g</option>
																			<option value="kg">kg</option>
																		</select>
																	</div>					
																</td>
																
																<td>						
																	<input type="text" tabindex="51" class="form-control" name="linearError6" id="linearError6" value="0" readonly style="background-color: #F1C40F;">
																</td>
																<td>						
																	<input type="text"  tabindex="59" class="form-control" name="expandedUncertain6" readonly style="background-color: #F1C40F;" id="expandedUncertain6"value="0">
																</td>
																<td>						
																	<input type="text" tabindex="67" class="form-control" name="k6" id="k6" readonly style="background-color: #F1C40F;" value=2.0000>
																</td>
															</tr>
															<tr>
																<td>						
																	<input type="text" tabindex="20" class="form-control" name="linearLoad7" value="<?= set_value('linearLoad7')?>"  id="linearLoad7">
																</td>
																<td>						
																	<input type="text" tabindex="28" class="form-control" name="indication7" value="<?= set_value('indication7')?>"  id="indication7"onchange="LinearityError({covenMass:'convenMass7',Indiction:'indication7',LinError:'linearError7'})">
																</td>
																<td>						
																		<div class="input-group ">
																<input type="text" tabindex="36" class="form-control" placeholder="" id="mark7" name="mark7">
																<input type="hidden" id="markHidden7" name="markHidden7">
																<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"onclick="selectedInd({id:'7'})">
																+
																</button>
																<button type="button" class="btn btn-danger" onclick="DeleteInd({id:'7'})">
																-
																</button></div>
																</td>
																<td class='disable'>						
																	<input type="text" tabindex="44" class="form-control" name="convenMass7" id="convenMass7"value="0" readonly style="background-color: #F1C40F;">
																</td>
																<td>	
																	<div class="input-group">
																		<input type="text" tabindex="38" class="form-control" name="convenMassG7" required id="convenMassG7" value="0" readonly style="background-color: #F1C40F;">
																		<select class="btn btn-outline-dark disable" id="covenMassUnit7" onchange="convertConventionalMass('convenMass7',this.value,'indication7','linearError7','convenMassG7')">
																			<!-- <option value="mg">mg</option> -->
																			<option selected value="g">g</option>
																			<option value="kg">kg</option>
																		</select>
																	</div>					
																</td>
																
																<td>						
																	<input type="text"  tabindex="52" class="form-control" name="linearError7" id="linearError7" value="0" readonly style="background-color: #F1C40F;">
																</td>
																<td>						
																	<input type="text"  tabindex="60" class="form-control" name="expandedUncertain7" readonly style="background-color: #F1C40F;" id="expandedUncertain7"value="0">
																</td>
																<td>						
																	<input type="text"  tabindex="68" class="form-control" name="k7" id="k7" readonly style="background-color: #F1C40F;" value=2.0000>
																</td>
															</tr>
															<tr>
																<td>						
																	<input type="text" tabindex="21" class="form-control"name="linearLoad8" value="<?= set_value('linearLoad8')?>"  id="linearLoad8">
																</td>
																<td>						
																	<input type="text" tabindex="29" class="form-control" name="indication8" value="<?= set_value('indication8')?>"  id="indication8"onchange="LinearityError({covenMass:'convenMass8',Indiction:'indication8',LinError:'linearError8'})">
																</td>
																<td>						
																<div class="input-group ">
																<input type="text" tabindex="37" class="form-control" placeholder=""id="mark8" name="mark8">
																<input type="hidden" id="markHidden8" name="markHidden8">
																<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"onclick="selectedInd({id:'8'})">
																+
																</button>
																<button type="button" class="btn btn-danger" onclick="DeleteInd({id:'8'})">
																-
																</button>
																</div>
																</td>
																<td class='disable'>						
																	<input type="text" tabindex="45" class="form-control" name="convenMass8" id="convenMass8"value="0" readonly style="background-color: #F1C40F;">
																</td>
																<td>	
																	<div class="input-group">
																		<input type="text" tabindex="38" class="form-control" name="convenMassG8" required id="convenMassG8" value="0" readonly style="background-color: #F1C40F;">
																		<select class="btn btn-outline-dark disable" id="covenMassUnit8" onchange="convertConventionalMass('convenMass8',this.value,'indication8','linearError8','convenMassG8')">
																			<!-- <option value="mg">mg</option> -->
																			<option selected value="g">g</option>
																			<option value="kg">kg</option>
																		</select>
																	</div>					
																</td>
																
																<td>						
																	<input type="text"  tabindex="53" class="form-control" name="linearError8" id="linearError8" value="0" readonly style="background-color: #F1C40F;">
																</td>
																<td>						
																	<input type="text"  tabindex="61" class="form-control" name="expandedUncertain8" readonly style="background-color: #F1C40F;" id="expandedUncertain8"value="0">
																</td>
																<td>						
																	<input type="text"  tabindex="69" class="form-control" name="k8" id="k8" readonly style="background-color: #F1C40F;" value=2.0000>
																</td>
															</tr>
														</tbody>
													</table>
												

												<table class="table table-bordered text-center table-sm mt-4">
													<thead>
														<tr>
															<th style="font-size:.9em">Uncertainty, k=2 (mg)</th>
															<th>MPE (mg)</th>
															<th>Convection (mg)</th>
															<th style="font-size:.9em">Class of Std. used :</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>						
																<input type="text" tabindex="70" class="form-control" readonly style="background-color: #F1C40F;" tabIndex="-1" name="uncertain1" id="uncertain1" value="0">
															</td>
															<td>						
																<input type="text" tabindex="78" class="form-control" name="mpe1" readonly style="background-color: #F1C40F;" id="mpe1" value="0">
															</td>
															<td>						
																<input type="text"  tabindex="86" class="form-control" name="convection1" readonly style="background-color: #F1C40F;" tabIndex="-1" id="convection1" value="0">
															</td>
															<td>						
																<input type="text"  tabindex="94" class="form-control" name="class1" id="class1" value="" readonly style="background-color: #F1C40F;">
															</td>
														</tr>
														<tr>
															<td>						
																<input type="text"  tabindex="71" class="form-control" name="uncertain2" id="uncertain2"value="0" readonly style="background-color: #F1C40F;" tabIndex="-1">
															</td>
															<td>						
																<input type="text" tabindex="79" class="form-control" name="mpe2" id="mpe2" readonly style="background-color: #F1C40F;" value="0">
															</td>
															<td>						
																<input type="text" tabindex="87" class="form-control" name="convection2" id="convection2" value="0" readonly style="background-color: #F1C40F;" tabIndex="-1">
															</td>
															<td>						
																<input type="text" tabindex="95" class="form-control" name="class2" id="class2" onchange="document.getElementById('class1').value = this.value" readonly style="background-color: #F1C40F;">
															</td>
														</tr>
														<tr>
															<td>						
																<input type="text"  tabindex="72" class="form-control" name="uncertain3" id="uncertain3"value="0" readonly style="background-color: #F1C40F;" tabIndex="-1">
															</td>
															<td>						
																<input type="text" tabindex="80" class="form-control" name="mpe3" readonly style="background-color: #F1C40F;" id="mpe3"value="0">
															</td>
															<td>						
																<input type="text" tabindex="88" class="form-control" name="convection3" id="convection3" value="0" readonly style="background-color: #F1C40F;" tabIndex="-1">
															</td>
															<td>						
																<input type="text" tabindex="96" class="form-control" name="class3" id="class3" readonly style="background-color: #F1C40F;">
														</tr>
														<tr>
															<td>						
																<input type="text" tabindex="73" class="form-control" name="uncertain4" id="uncertain4"value="0" readonly style="background-color: #F1C40F;" tabIndex="-1">
															</td>
															<td>						
																<input type="text" tabindex="81"  class="form-control" name="mpe4" readonly style="background-color: #F1C40F;" id="mpe4"value="0">
															</td>
															<td>						
																<input type="text" tabindex="89" class="form-control" name="convection4" id="convection4" value="0" readonly style="background-color: #F1C40F;" tabIndex="-1">
															</td>
															<td>						
																<input type="text" tabindex="97" class="form-control" name="class4" id="class4" readonly style="background-color: #F1C40F;">
															</td>
														</tr>
														<tr>
															<td>						
																<input type="text" tabindex="74" class="form-control" name="uncertain5" id="uncertain5"value="0" readonly style="background-color: #F1C40F;" tabIndex="-1">
															</td>
															<td>						
																<input type="text" tabindex="82" class="form-control" name="mpe5" id="mpe5"value="0" readonly style="background-color: #F1C40F;">
															</td>
															<td>						
																<input type="text" tabindex="90" class="form-control" name="convection5" id="convection5" value="0" readonly style="background-color: #F1C40F;" tabIndex="-1">
															</td>
															<td>						
																<input type="text" tabindex="98" class="form-control" name="class5" id="class5" readonly style="background-color: #F1C40F;">
															</td>
														</tr>
														<tr>
															<td>						
																<input type="text" tabindex="75" class="form-control" name="uncertain6" id="uncertain6"value="0" readonly style="background-color: #F1C40F;" tabIndex="-1">
															</td>
															<td>						
																<input type="text" tabindex="83" class="form-control" name="mpe6" id="mpe6"value="0" readonly style="background-color: #F1C40F;">
															</td>
															<td>						
																<input type="text" tabindex="91" class="form-control" name="convection6" id="convection6" value="0" readonly style="background-color: #F1C40F;" tabIndex="-1">
															</td>
															<td>						
																<input type="text" tabindex="99" class="form-control" name="class6" id="class6" readonly style="background-color: #F1C40F;">
															</td>
														</tr>
														<tr>
															<td>						
																<input type="text" tabindex="76" class="form-control" name="uncertain7" id="uncertain7"value="0" readonly style="background-color: #F1C40F;" tabIndex="-1">
															</td>
															<td>						
																<input type="text" tabindex="84" class="form-control" name="mpe7" id="mpe7"value="0" readonly style="background-color: #F1C40F;">
															</td>
															<td>						
																<input type="text" tabindex="92" class="form-control" name="convection7" id="convection7" value="0" readonly style="background-color: #F1C40F;" tabIndex="-1">
															</td>
															<td>						
																<input type="text" tabindex="100" class="form-control" name="class7" id="class7" readonly style="background-color: #F1C40F;">
															</td>
														</tr>
														<tr>
															<td>						
																<input type="text" tabindex="77" class="form-control" name="uncertain8" id="uncertain8"value="0" readonly style="background-color: #F1C40F;" tabIndex="-1">
															</td>
															<td>						
																<input type="text" tabindex="85" class="form-control" name="mpe8" id="mpe8"value="0" readonly style="background-color: #F1C40F;">
															</td>
															<td>						
																<input type="text" tabindex="93" class="form-control" name="convection8" id="convection8" value="0" readonly style="background-color: #F1C40F;" tabIndex="-1">
															</td>
															<td>						
																<input type="text" tabindex="101" class="form-control" name="class8" id="class8" readonly style="background-color: #F1C40F;">
															</td>
														</tr>
													</tbody>
												</table>
											</div>
									<!-- LINEARITY -->
									<!-- REPEATABLITY -->
										<div>
											<div class="container">
												<label class=''>Repeatability Test </label>
												<div class=" input-group mb-3">
													<input class=" text-center" type="text" name="repeatabilityValue" value="<?= set_value('repeatabilityValue')?>">
														<div class="input-group-append">
															<select class="btn-outline-secondary " name="repeatabilityUnit">
																<option selected>Choose. . .</option>
																<option value="mg"<?= set_select('repeatabilityUnit[]', 'mg'); ?>>mg</option>
																<option value="g"<?= set_select('repeatabilityUnit[]', 'g'); ?>>g</option>
																<option value="kg"<?= set_select('repeatabilityUnit[]', 'kg'); ?>>kg</option>
															</select>
														</div>								
												</div>
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
																<input name='repeat1' value="<?= set_value('repeat1')?>"  tabindex="102"  type="text" class="form-control" id='repeat1' onchange="stdevRepeat()">
															</td>
															<td>						
																6
															</td>
															<td>						
																<input name='repeat6' value="<?= set_value('repeat6')?>" tabindex="107" type="text" class="form-control" id='repeat6' onchange="stdevRepeat()">
															</td>
														</tr>
														<tr>
															<td>						
																2
															</td>
															<td>						
																<input name="repeat2" value="<?= set_value('repeat2')?>" tabindex="103" tabindex="103" type="text" class="form-control" id="repeat2" onchange="stdevRepeat()">
															</td>
															<td>						
																7
															</td>
															<td>						
																<input name="repeat7" value="<?= set_value('repeat7')?>" tabindex="109" type="text" class="form-control" id="repeat7" onchange="stdevRepeat()"> 
															</td>
														</tr>
														<tr>
															<td>						
																3
															</td>
															<td>						
																<input name="repeat3" value="<?= set_value('repeat3')?>" tabindex="104" type="text" class="form-control" id="repeat3" onchange="stdevRepeat()">
															</td>
															<td>						
																8
															</td>
															<td>						
																<input name="repeat8" value="<?= set_value('repeat8')?>" tabindex="110" type="text" class="form-control" id="repeat8" onchange="stdevRepeat()">
															</td>
														</tr>
														<tr>
															<td>						
																4
															</td>
															<td>						
																<input name="repeat4" value="<?= set_value('repeat4')?>" tabindex="105" type="text" class="form-control" id="repeat4" onchange="stdevRepeat()">
															</td>
															<td>						
																9
															</td>
															<td>						
																<input name="repeat9" value="<?= set_value('repeat9')?>" tabindex="111" type="text" class="form-control" id="repeat9" onchange="stdevRepeat()">
															</td>
														</tr>
														<tr>
															<td>						
																5
															</td>
															<td>						
																<input name="repeat5" value="<?= set_value('repeat5')?>" type="text"  tabindex="106" class="form-control" id="repeat5" onchange="stdevRepeat()">
															</td>
															<td>						
																10
															</td>
															<td>						
																<input name="repeat10" value="<?= set_value('repeat10')?>" tabindex="112" type="text" class="form-control" id="repeat10" onchange="stdevRepeat()">
															</td>
														</tr>
														<tr>
															<td colspan='2' style="text-align:end">						
															St. Dev. (g)
															</td>
															<td colspan='2'>						
																<input name="stDev" value="<?= set_value('stDev')?>"  tabindex="113" type="text" class="form-control" id="stDev" readonly  style="background-color: #F1C40F;">
																<input name="stDevReal"  type="hidden" class="form-control" id="stDevReal">
															</td>
															
														</tr>
														
												</tbody>
											</table>
										</div>
										<!-- <div class="">
											<h5><i>Important: Don't forget to press Calculate Expanded Uncertainty </i><b style="color: red;">*</b></h5>
										</div> -->
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
										<!-- <div class='position-relative'>
											<div class="position-absolute top-0 start-50 translate-middle">
												<h6>Remarks</h6>
											</div>
											<br>
											<div class="start-50" style=>
												<div class="form-check">
													<input class="form-check-input" type="checkbox" value="A" <?php# echo set_checkbox('remarksA', 'A'); ?> id="remarksA" name="remarksA">
													<label class="form-check-label" for="remarksA">
													Calibration was performed
													</label>
												</div>
												<div class="form-check">
													<div class="row">
														<div class="col">
															<input class="form-check-input" type="checkbox" value="B" <?php# set_checkbox('remarksB', 'B'); ?> id="remarksB" name="remarksB">
															<label class="form-check-label" for="remarksB">
															No Adjustment was done
															</label>
														</div>
														<div class="col">
															<input class="form-check-input" type="checkbox" value="C" <?php# set_checkbox('remarksC', 'C'); ?> id="remarksC" name="remarksC">
															<label class="form-check-label" for="remarksC">
															Internal Adjustment was done
															</label>
														</div>
														<div class="col">
															<input class="form-check-input" type="checkbox" value="D" <?php# set_checkbox('remarksD', 'D'); ?> id="remarksD" name="remarksD">
															<label class="form-check-label" for="remarksD">
															External Adjustment was done
															</label>
														</div>
														
													</div>
													
												</div>
												<div class="form-check">
													<input class="form-check-input" type="checkbox" value="E" <?php# set_checkbox('remarksE', 'E'); ?> id="remarksE" name="remarksE">
													<label class="form-check-label" for="remarksE">
													Standard/s, accessory/ies, and UUC are in good condition before and after calibration
													</label>
												</div>
												<div class="form-check">
													<input class="form-check-input" type="checkbox" value="F" <?php# set_checkbox('remarksF', 'F'); ?> id="remarksF">
													<label class="form-check-label" for="remarksF">
													Others:
													</label>
													<textarea id='remarksF' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" style="margin-top: 0px;margin-bottom: 0px;height: 80px;"></textarea>
													<input type="hidden" name="remarksFOthers" id="remarksFHidden">
												</div>
											</div>
										</div> -->
									<!-- REMARKS -->
								</div>
									<div class="card mt-2 border-light">
										<div class="card mt-2 border-light">
											<div class="card-header text-white bg-primary">
												<h3 class="card-title mx-auto d-flex justify-content-center">Uncertainty Budget</h3> 
											</div>
										</div>
										<div class="card-body table-responsive text-white" style="background-color:rgba(13, 110, 253, 0.36)">
											<table class="table" id="myTableBody">
												<thead>
													<tr>
														<th>Nominal Value</th>
														<th>ReferenceWeightCalculated</th>
														<th>AirBuoyancytCalculated</th>
														<th>DriftOfWeightCalculated</th>
														<th>ConvectionEffectsCalculated</th>
														<th>RoundingNoLoadCalculated</th>
														<th>RoundingWithLoadCalculated</th>
														<th>EccentricityCalculated</th>
														<th>RepeatabilityCalculated</th>
														<th>StandardUncertaintyError</th>
													</tr>
												</thead>
												<script>
												</script>
												<tbody id="uncertBudgetTBody">
												</tbody>
											</table>
										</div>
									</div>
										<hr>
									<!-- FOOTER -->
										<div class="card mt-2 border-light">
											<div class="card-header text-white bg-primary">
												<h3 class="card-title">Personnel</h3> 
											</div>
											<div class="card-body table-responsive text-white" style="background-color:rgba(13, 110, 253, 0.36)">
             
										<div class="row">
											<input type="hidden" name="verifierEmail" id="verifierEmail">
											<table class="table table-borderless" >
												<tbody>
													<tr>
														<td>
															<div class="input-group input-group-sm">
																<select id="personnelList" name="calibratedBy" id="calibratedBy" class="form-control">
																</select>
															</div>
														</td>
														<td>
															<div class="input-group input-group-sm">
																<select id="verifierList" name="encodedBy" id="encodedBy" class="form-control">
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
																<select id="verifierPositionList" name="checkedby" id="checkedby" class="form-control">
																</select>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
										</div>
									<!-- FOOTER -->
									<div class="card">
										<div class="card-header text-white bg-primary">
											<div class="row">
												<div class="mx-auto d-flex justify-content-center">
													<h3>Image</h3>
												</div>
											</div> 
										</div>
										<div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)"> 
											<div class="row">
												<div class="col-12">
													<input type="file" name="imageInput[]" accept="image/*" id="imageInput" onchange="loadFile(event)" multiple>
													<img id="output"/>
												</div>	
											</div>
										</div>
									<br>
									<div class="card">
										<div class="card-header text-white bg-primary">
											<div class="row">
												<div class="mx-auto d-flex justify-content-center">
													<h3>Actions</h3>
												</div>
											</div> 
										</div>
										<div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)"> 
											<div class="row">
												<div class='col text-center'>
													<button type="submit" class="btn btn-lg btn-warning" onclick='toggleAlert();submitForm("formMain")' ><i data-feather="database"></i> Generate Data</button>
												</div> 
										<br>	
									</form>
									</div>
														</div>
													</div>
									<div class="row">
										<!-- <div class="col justify-content-right">
											<a href="dashboard" class="btn btn-lg btn-danger mt-3 mx-3 float-right"><i data-feather="skip-back"></i> Back</a>
										</div> -->
										<div class="col">
											<button type="button" class="btn btn-success float saveButton" data-toggle="modal" data-target="#confirmationModal" style="">
												<i data-feather="save" style="font-size: 50px;"></i>
											</button>
										</div>
									</div>
							</div>

						<!-- Modal 1-->
							<div class="modal  fade" id="staticBackdrop"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
								<div class="modal-dialog modal-xl modal-dialog-scrollable" style="width:100%">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="">Standard</h5>
										</div>
										<div class="modal-body">
											<div class="row">
												<div class="col-6">
													<h5>Weights <i>(Select and check the standard/s)></i></h5>
												</div>
												<div class="col" style="color: rgba(0,128,0,0.5); font-size: 18px;">
													<ul>
														<li>Okay</li>
													</ul>
												</div>
												<div class="col" style="color: rgba(255,165,0,0.5); font-size: 18px;">
													<ul>
														<li>Near Expiry</li>
													</ul>
												</div>
												<div class="col" style="color: rgba(255,0,0,0.5); font-size: 18px;">
													<ul>
														<li>Expire</li>
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
																		if($arrStandard[0][$i]['class'] == 'M2' || $arrStandard[0][$i]['class'] =='M₂')
																		{
																			$M2Serial .= ','.$arrStandard[0][$i]['serialNumber'];
																			array_push($M2ArrayOfDates,strtotime($arrStandard[0][$i]['dateOfCalibration']));	
																			//var_dump($arrStandard[0][$i]['dateOfCalibration']);

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
																			<input class="form-check" type="checkbox" name="weightCheckbox" value="<?=  $arrStandard[0][$i]['serialNumber'];?>" id="flexCheck<?=$i?>">
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
																<!-- <tr <?php 
																	// $dueDate_Date = strtotime('+ 1 year', min($M2ArrayOfDates)); 
																	// $dueDate_DateBefore = strtotime('+ 11 month', min($M2ArrayOfDates)); 
																	// $forComparisonStandardDueM2 = strtotime(date('Y-m-d', $dueDate_Date));
																	// $forComparisonStandardDueBeforeM2 = strtotime(date('Y-m-d', $dueDate_DateBefore));
																	// $s = $forComparisonToday>$forComparisonStandardDueBeforeM2;
																	// $t = $forComparisonStandardDueBeforeM2<$forComparisonStandardDueM2;
																	// if($forComparisonToday>$forComparisonStandardDueM2){
																	// echo'style="background-color:rgba(255,0,0,0.5) "'; //red
																	// }elseif($s && $t ){
																	// 	echo'style="background-color:rgba(255,165,0,0.5)"'; //orange
																	// }else{
																	// 	echo'style="background-color:rgba(0,128,0,0.5)"'; //green
																	// }
																	?> >	
																	<td>
																		<div class="form-check">
																			<input class="form-check" type="checkbox" name="weightCheckbox" value="<?php//echo $M2Serial;?>" id="flexCheckM2">
																		</div>
																	</td>
																	<td>
																		
																		<label for="flexCheckM2>"> M2</label>
																	</td>
																	<td>
																		M2
																	</td>
																	<td>
																		M2 A - V
																	</td>
																	<td>
																		Set of weights	
																	</td>
																	<td>
																		<?php//echo date("M d, Y", min($M2ArrayOfDates));?>
																	</td>
																	<td>
																		<?php//echo date("M d, Y", $forComparisonStandardDueM2) ; ?>
																	</td>
																</tr> -->
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

						

					</div>

					<!-- modal for Confirmation -->
								<div class="modal fade" id="confirmationModal" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Changes have been made.</h5>
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

					 <!-- standard select Modal -->             
						<div class="modal fade" id="exampleModal" tabindex="-1">
							<div class="modal-dialog modal-xl modal-dialog-scrollable" style="width:100%">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Selected Standard</h5>
										<div class="input-group close">
											<input type="text" class="form-control " id="searchStandard" placeholder="Nominal Value" >
											<input type="text" class="form-control " id="searchStandardUnit" placeholder="Unit">
											<input type="text" class="form-control " id="searchStandardSerialNumber" placeholder="Serial Number">
											<input type="text" class="form-control " id="searchStandardUnitMarking" placeholder="Marking">
											<div class="input-group-append">
												<button class="btn btn-outline-secondary" type="button" id="selectModalSearchButton" onclick="filterOriginal();">Search</button>
											</div>
											<div class="input-group-append">
												<button class="btn btn-outline-secondary" type="button" id="selectModalRefreshButton" onclick="refreshToOriginal();">Refresh</button>
											</div>
										</div>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="card">
											<div class="card-header" id="testWeightSelectHead"> </div>
											<table class="card-header table" id="standardRows" style="height:50%;width:100%">
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
											<div class="card-body">
												<table class="table table-sm " style="height:60%">
													<thead>
														<tr>
															<th>Selected Test Weight Marking: </th>
															<th colspan='7' id='testWeightSelectedTestPoint' style="text-decoration: underline;"></th>
														</tr>
														<tr>
															<th>Nominal Value</th>
															<!-- <th>Nominal Unit</th> -->
															<th>Serial Number</th>
															<th>Marking</th>
															<th></th>
															<th>Conventional Mass</th>
															<th>Unit</th>
															<th>Uncertainty (mg)</th>
															<th>MPE</th>
														</tr>
													</thead>
													<tbody id="tbodyStandardRows">
													</tbody>					
												</table>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="" >Close</button>
									</div>
								</div>
							</div>
						</div>
					<!-- standard select Modal -->

					<!--script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
					<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script-->


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
						var selectedStandard = [];
						


						const addToObject = (indication,serialNumber,marking,value) => {
							if (typeof objectOfSelectedStandard[indication] != 'undefined') {
								if (typeof objectOfSelectedStandard[indication][serialNumber] != 'undefined') {
									var length = (Object.keys(objectOfSelectedStandard[indication][serialNumber]).length + 1)
									objectOfSelectedStandard[indication] = {...objectOfSelectedStandard[indication],[serialNumber]:
										{...objectOfSelectedStandard[indication][serialNumber],[length]:{marking:marking,conveMass:value}}}
								}else{
									objectOfSelectedStandard[indication]= {...objectOfSelectedStandard[indication],[serialNumber]:
										{1:{marking:marking,conveMass:value}}}
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
							var selectedIDText = document.getElementById('markHidden'+selectedIndication).value;
							var selectedIDArray = [];
							if (selectedIDText.includes('(SPLITHERE)')){
								selectedIDArray = selectedIDText.split('(SPLITHERE)');
							}else{
								selectedIDArray.push(document.getElementById("markHidden"+selectedIndication).value);
							}
							

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
										Action.setAttribute('type',"button");
										
										Action.setAttribute('data-bs-dismiss','modal');

										if(!selectedIDArray.includes(DataItem['id'])){
											Action.innerHTML = 'Use';
											Action.setAttribute('class',"btn btn-outline-secondary");
											var fuctionText = 'useToUnselect({ convenMassVal:'+DataItem['conventionalMass']+', uncertainVal:'+DataItem['uncertainty']+', mpeVal:'+DataItem['mpe']+", markVal:'"+DataItem['marking']+"',classiVal:'"+DataItem['class']+"',serialNumber:'"+DataItem['serialNumber']+"',id:'"+DataItem['id']+"',row:'"+selectedIndication+"',button:this});storeIdOfUsed('"+DataItem['id']+"', '"+selectedIndication+"','"+DataItem['marking']+"')";
											Action.setAttribute('onclick',fuctionText);
											
										}else{
											Action.innerHTML = 'Unselect';
											Action.setAttribute('class',"btn btn-outline-warning");
											var fuctionText = 'useToUnselect({ convenMassVal:-'+DataItem['conventionalMass']+', uncertainVal:-'+DataItem['uncertainty']+', mpeVal:-'+DataItem['mpe']+", markVal:'"+DataItem['marking']+"',classiVal:'"+DataItem['class']+"',serialNumber:'"+DataItem['serialNumber']+"',id:'"+DataItem['id']+"',row:'"+selectedIndication+"',button:this});removeIdOfUsed('"+DataItem['id']+"', '"+selectedIndication+"','"+DataItem['marking']+"')";
											Action.setAttribute('onclick',fuctionText);
										}


										
										tr.appendChild(NominalValue);
										tr.appendChild(SerialNumber);
										tr.appendChild(Marking);
										tr.appendChild(Action);
										tr.appendChild(ConventionalMass);
										tr.appendChild(Unit);
										tr.appendChild(Uncertainty);
										tr.appendChild(MPE);
										// tr.appendChild(CalibrationProvider);
										
										Tbody.appendChild(tr);
									
									})
								})
								
								

							}
									
							
						}
						function addDetailsToHead(){
							var head = document.getElementById('headStandards');
							while (head.hasChildNodes()) {  
								head.removeChild(head.firstChild);
							}
							var m2Ok = false;
							const weightSplit = weight.split(",");
							for (let weightSplitIndex = 0; weightSplitIndex < weightSplit.length; weightSplitIndex++) {
								const element = weightSplit[weightSplitIndex];

								let filteredDATAWeight = [ArrayOfStandardAllDetails[0].filter(function (e) {
									return e.serialNumber == element;
								})]

								filteredDATAWeight.forEach(WeightElements => {
									WeightElements.forEach(DataItem => {

										if((DataItem['class']=='M2')||(DataItem['class']=='M₂')){
                                   
											if(m2Ok) {
												return;
											}else{
												var tr = document.createElement('tr');
												var Description = document.createElement('td');
												var Type = document.createElement('td');
												var SerialNumber = document.createElement('td');
												Description.innerHTML = DataItem['description'];
												Type.innerHTML = DataItem['type'];
												SerialNumber.innerHTML = 'M₂ (A to V)';
												tr.appendChild(Description);
												tr.appendChild(Type);
												tr.appendChild(SerialNumber);
												head.appendChild(tr);
												m2Ok = true;
											}

										}else{
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
											
										}

										
										
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
							var selectedIDText = document.getElementById('markHidden'+selectedIndication).value;

							var selectedIDArray = [];
							if (selectedIDText.includes('(SPLITHERE)')){
								selectedIDArray = selectedIDText.split('(SPLITHERE)');
							}else{
								selectedIDArray.push(document.getElementById("markHidden"+selectedIndication).value);
							}

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

							let head = "<table class='table' id='standardRows'><thead><tr><th >Nominal Value</th><th >Serial Number</th><th >Marking</th><th>Action</th><th style='font-size:.9em'>Conventional Mass</th><th >Unit</th><th  style='font-size:.9em;'>Uncertainty of Measurement mg</th><th style='font-size:.9em'>MPE (mg)</th></tr></thead><tbody id='tbodyStandardRows'>";
							let end = "</tbody></table>";
							var html;


							filteredDATA.forEach(element => {
								element.forEach(item =>{
									if(!selectedIDArray.includes(item['id'])){
										var fuctionText = 'useToUnselect({ convenMassVal:'+item['conventionalMass']+', uncertainVal:'+item['uncertainty']+', mpeVal:'+item['mpe']+", markVal:'"+item['marking']+"',classiVal:'"+item['class']+"',serialNumber:'"+item['serialNumber']+"',id:'"+item['id']+"',row:'"+selectedIndication+"',button:this});storeIdOfUsed('"+item['id']+"', '"+selectedIndication+"','"+item['marking']+"')";
										var button = '<button type="button" class="btn btn-outline-secondary" onclick="'+fuctionText+'" data-bs-dismiss="modal">Use</button>'
									}else{
										var fuctionText = 'useToUnselect({ convenMassVal:-'+item['conventionalMass']+', uncertainVal:-'+item['uncertainty']+', mpeVal:-'+item['mpe']+", markVal:'"+item['marking']+"',classiVal:'"+item['class']+"',serialNumber:'"+item['serialNumber']+"',id:'"+item['id']+"',row:'"+selectedIndication+"',button:this});removeIdOfUsed('"+item['id']+"', '"+selectedIndication+"','"+item['marking']+"')";
										var button = '<button type="button" class="btn btn-outline-warning" onclick="'+fuctionText+'" data-bs-dismiss="modal">Unselect</button>'
									}

									if(html == null){
									html = "<tr><td>"+
									item["nominalValue"]+
									" "+item["nominalUnit"]+
									"</td><td>"+item["serialNumber"]+
									"</td><td>"+item["marking"]+
									'</td><td>'+button+
									"</td><td>"+item["conventionalMass"]+
									"</td><td>"+item["unit"]+"</td><td>"+
									item["uncertainty"]+"</td><td>"+item["mpe"]+
									'</td></tr>';
									}else{
										html +="<tr><td>"+
									item["nominalValue"]+
									" "+item["nominalUnit"]+
									"</td><td>"+item["serialNumber"]+
									"</td><td>"+item["marking"]+
									'</td><td>'+button+
									"</td><td>"+item["conventionalMass"]+
									"</td><td>"+item["unit"]+"</td><td>"+
									item["uncertainty"]+"</td><td>"+item["mpe"]+
									'</td></tr>';

									}


								})
							});{
								
							}
							document.getElementById('tbodyStandardRows').innerHTML=html+end
						}			
						function refreshToOriginal(){
							addStandardToTbody()
							//makeUseButtonRed();
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
																tr.children[i].children[8].setAttribute('class','btn btn-warning');
																tr.children[i].children[8].innerHTML = 'Unselect';
																if(tr.children[i].children[8].dataset.selected == 'true'){
																	tr.children[i].children[8].dataset.selected == 'false'
																}else{
																	tr.children[i].children[8].dataset.selected == 'true'
																}
													 		}else{
																// console.log(tr.children[i])
																// console.log(tr.children[i].children[2])
																// console.log(tr.children[i].children[2].innerHTML)
																console.log('Error')

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

						const selectToUnselect = (row) => {

						}

						const storeIdOfUsed = (buttonID, hiddenMarking, markings) => {
							var hiddenMark = document.getElementById("markHidden"+hiddenMarking);
							var marking = document.getElementById("mark"+hiddenMarking);

							if(hiddenMark.value != ''){
								hiddenMark.value += "(SPLITHERE)"+buttonID;
							}else{
								hiddenMark.value = buttonID;
							}

							if(marking.value != ''){
								marking.value += " + "+markings;
							}else{
								marking.value = markings;
							}
							
						}

						const removeIdOfUsed = (buttonID,row, marks) => {
							var hiddenMark= document.getElementById("markHidden"+row);
							var marking = document.getElementById("mark"+row);
							var selected = [];
							var selectedMarking = [];
							if (hiddenMark.value.includes('(SPLITHERE)')){
								selected = document.getElementById("markHidden"+row).value.split('(SPLITHERE)');
							}else{
								selected.push(document.getElementById("markHidden"+row).value);
							}
							if (marking.value.includes(' + ')){
								selectedMarking = document.getElementById("mark"+row).value.split(' + ');
							}else{
								selectedMarking.push(document.getElementById("mark"+row).value);
							}
							var toDeleteArray = [];
        					var newSelected = [];
							toDeleteArray.push(buttonID);
							for (let x = 0; x < selected.length; x++) {
								for (let i = 0; i < toDeleteArray.length; i++) {
									if(selected[x] != toDeleteArray[i]){
										newSelected.push(selected[x]);
									}
								}
							}   
							hiddenMark.value = "";
							for (let i = 0; i < newSelected.length; i++) {
								if(hiddenMark.value != ''){
									hiddenMark.value += "(SPLITHERE)"+newSelected[i];
								}else{
									hiddenMark.value = newSelected[i];
								}
							}
							var toDeleteArraymark = [];
        					var newSelectedmark = [];
							toDeleteArraymark.push(marks);
							for (let x = 0; x < selectedMarking.length; x++) {
								for (let i = 0; i < toDeleteArraymark.length; i++) {
									if(selectedMarking[x] != toDeleteArraymark[i]){
										newSelectedmark.push(selectedMarking[x]);
									}
								}
							}   
							marking.value = "";
							for (let i = 0; i < newSelectedmark.length; i++) {
								if(marking.value != ''){
									marking.value += " + "+newSelectedmark[i];
								}else{
									marking.value = newSelectedmark[i];
								}
							}
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
							document.getElementById('markHidden'+id).value = '';
							delete objectOfSelectedStandard['markingSelected'+id];
						}
						function convertConventionalMass(convenMass,convenUnit,indication,linError,convenMassToChange){
							var convenMassValue = document.getElementById(convenMass).value;
							var unit = document.getElementById('linearityUnit').value;
							if(unit == 'kg'){
								document.getElementById(convenMassToChange).value = convenMassValue/1000;
							}
							if(unit == 'g'){
								document.getElementById(convenMassToChange).value = convenMassValue;
							}
							if(unit == 'mg'){
								document.getElementById(convenMassToChange).value = convenMassValue*1000;
							}
							LinearityError({covenMass:convenMassToChange,Indiction:indication,LinError:linError});

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
						function useToUnselect({convenMassVal,convenMassVal2,uncertainVal,mpeVal,markVal,classiVal,serialNumber,id,row,button}){
							var mark = document.getElementById('mark'+row);
							if(button.dataset.selected == 'true'){
								button.dataset.selected = 'false';
								toStandardUsed({convenMassVal:'-'+convenMassVal,
									convenMassVal2:'-'+convenMassVal2,
									uncertainVal:'-'+uncertainVal,
									mpeVal:'-'+mpeVal,
									markVal:markVal,
									classiVal:classiVal,
									serialNumber:serialNumber,
								});

							}
							else{
								button.setAttribute('data-selected','true');
								toStandardUsed({convenMassVal:convenMassVal,
									convenMassVal2:convenMassVal2,
									uncertainVal:uncertainVal,
									mpeVal:mpeVal,
									markVal:markVal,
									classiVal:classiVal,
									serialNumber:serialNumber,
								});
							}

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
							//document.getElementById(mark).value = document.getElementById(mark).value+"+"+markVal;
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

						function extendedUncert({Un,Mpe,c,i,expandedID}){
							//Un = Uncertainty Of Load
							//Mpe = Mpe Of Load
							//c = Convection of Load
							//i = indication of Load
							//expandedID = element of expanded unceratinty
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
							var k = document.getElementById('kForCompute').value;

							if(U3=="mg"){
								ReferenceWeightCalculated = Un2/k;
								AirBuoyancytCalculated = Mpe2/(4*Math.sqrt(3));
								DriftOfWeightCalculated = Mpe2/(3*Math.sqrt(3));
								ConvectionEffectsCalculated = c2/(Math.sqrt(3));

							}
							if(U3=="g"){
								ReferenceWeightCalculated = Un2/(1000*k);
								AirBuoyancytCalculated = Mpe2/1000/(4*Math.sqrt(3));
								DriftOfWeightCalculated = Mpe2/1000/(3*Math.sqrt(3));
								ConvectionEffectsCalculated = c2/1000/(Math.sqrt(3));
							}
							if(U3=="kg"){
								ReferenceWeightCalculated = Un2/(1000000*k);
								AirBuoyancytCalculated = Mpe2/(1000000*4*Math.sqrt(3));
								DriftOfWeightCalculated = Mpe2/(1000000*3*Math.sqrt(3));
								ConvectionEffectsCalculated = c2/(1000000*Math.sqrt(3));
							}

							RoundingNoLoadCalculated = d/(2*Math.sqrt(3));
							RoundingWithLoadCalculated = d/(2*Math.sqrt(3));
							EccentricityCalculated = i2*ErrDiff/2/TestLoad/Math.sqrt(3);
							RepeatabilityCalculated = parseFloat(document.getElementById("stDevReal").value);
							//stDevReal no formating, raw value 

							StandardUncertaintyError = 
							Math.sqrt((Math.pow(ReferenceWeightCalculated,2))+
							(Math.pow(AirBuoyancytCalculated,2))+
							(Math.pow(DriftOfWeightCalculated,2))+
							(Math.pow(ConvectionEffectsCalculated,2))+
							(Math.pow(RoundingNoLoadCalculated,2))+
							(Math.pow(RoundingWithLoadCalculated,2))+
							(Math.pow(EccentricityCalculated,2))+
							(Math.pow(RepeatabilityCalculated,2)));

							// console.log('Indication: '+ i);
							// console.log('Uncertainty: '+ Un);
							// console.log('Mpe: '+ Mpe);
							// console.log('Convection: '+ c);
							// console.log(" ReferenceWeightCalculated: "+ ReferenceWeightCalculated);
							// console.log(" AirBuoyancytCalculated: "+ AirBuoyancytCalculated);
							// console.log(" DriftOfWeightCalculated: "+ DriftOfWeightCalculated);
							// console.log(" ConvectionEffectsCalculated: "+ ConvectionEffectsCalculated);
							// console.log(" RoundingNoLoadCalculated: "+ RoundingNoLoadCalculated);
							// console.log(" RoundingWithLoadCalculated: "+ RoundingWithLoadCalculated);
							// console.log(" EccentricityCalculated: "+ EccentricityCalculated);
							// console.log(" RepeatabilityCalculated: "+ RepeatabilityCalculated);
							// console.log(" StandardUncertaintyError: "+ StandardUncertaintyError);
							// console.log(" uncertaintyExpanded: "+ (StandardUncertaintyError*2));
							// console.log("_____________________________________________________________________")

							let uncBudgetTbody = document.getElementById('uncertBudgetTBody');
							var tr = document.createElement('tr');

							var TestLoadTd = document.createElement('td');
							var ReferenceWeightCalculatedTd = document.createElement('td');
							var AirBuoyancytCalculatedTd = document.createElement('td');
							var DriftOfWeightCalculatedTd = document.createElement('td');
							var ConvectionEffectsCalculatedTd = document.createElement('td');
							var RoundingNoLoadCalculatedTd = document.createElement('td');
							var RoundingWithLoadCalculatedTd = document.createElement('td');
							var RepeatabilityCalculatedTd = document.createElement('td');
							var StandardUncertaintyErrorTd = document.createElement('td');
							var uncertaintyExpandedTd = document.createElement('td');

							TestLoadTd.innerHTML = i2;
							ReferenceWeightCalculatedTd.innerHTML = ReferenceWeightCalculated;
							AirBuoyancytCalculatedTd.innerHTML = AirBuoyancytCalculated;
							DriftOfWeightCalculatedTd.innerHTML = DriftOfWeightCalculated;
							ConvectionEffectsCalculatedTd.innerHTML = ConvectionEffectsCalculated;
							RoundingNoLoadCalculatedTd.innerHTML = RoundingNoLoadCalculated;
							RoundingWithLoadCalculatedTd.innerHTML = RoundingWithLoadCalculated;
							RepeatabilityCalculatedTd.innerHTML = EccentricityCalculated;
							StandardUncertaintyErrorTd.innerHTML = RepeatabilityCalculated;
							uncertaintyExpandedTd.innerHTML = StandardUncertaintyError*2;
							
							tr.append(TestLoadTd);
							tr.append(ReferenceWeightCalculatedTd);
							tr.append(AirBuoyancytCalculatedTd);
							tr.append(DriftOfWeightCalculatedTd);
							tr.append(ConvectionEffectsCalculatedTd);
							tr.append(RoundingNoLoadCalculatedTd);
							tr.append(RoundingWithLoadCalculatedTd);
							tr.append(RepeatabilityCalculatedTd);
							tr.append(StandardUncertaintyErrorTd);
							tr.append(uncertaintyExpandedTd);


							uncBudgetTbody.append(tr)

							document.getElementById(expandedID).value = StandardUncertaintyError*2;
							if(Number.isNaN(Number(StandardUncertaintyError*2))){
								return false;
							}else{
								return true;
							}
						}

						//extendedUncertIndication0 for first load
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
							var k = document.getElementById('kForCompute').value;
							//console.log(U3+" U3 "+Un2+ " Un2 "+Mpe2+ " Mpe2 "+c2+ " c2 "+i2+ " i2 "+d+ " d "+ErrDiff+ " ErrDiff "+TestLoad+ " TestLoad ");

							if(U3=="mg"){
								ReferenceWeightCalculated = Un2/k;
								AirBuoyancytCalculated = Mpe2/(4*Math.sqrt(3));
								DriftOfWeightCalculated = Mpe2/(3*Math.sqrt(3));
								ConvectionEffectsCalculated = c2/(3*Math.sqrt(3));

							}
							if(U3=="g"){
								ReferenceWeightCalculated = Un2/(1000*k);
								AirBuoyancytCalculated = Mpe2/1000/(4*Math.sqrt(3));
								DriftOfWeightCalculated = Mpe2/1000/(3*Math.sqrt(3));
								ConvectionEffectsCalculated = c2/1000/(3*Math.sqrt(3));
							}
							if(U3=="kg"){
								ReferenceWeightCalculated = Un2/(1000000*k);
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

							// console.log('Indication: '+ i);
							// console.log('Uncertainty: '+ Un);
							// console.log('Mpe: '+ Mpe);
							// console.log('Convection: '+ c);
							// console.log(" ReferenceWeightCalculated: "+ ReferenceWeightCalculated);
							// console.log(" AirBuoyancytCalculated: "+ AirBuoyancytCalculated);
							// console.log(" DriftOfWeightCalculated: "+ DriftOfWeightCalculated);
							// console.log(" ConvectionEffectsCalculated: "+ ConvectionEffectsCalculated);
							// console.log(" RoundingNoLoadCalculated: "+ RoundingNoLoadCalculated);
							// console.log(" RoundingWithLoadCalculated: "+ RoundingWithLoadCalculated);
							// console.log(" EccentricityCalculated: "+ EccentricityCalculated);
							// console.log(" RepeatabilityCalculated: "+ RepeatabilityCalculated);
							// console.log(" StandardUncertaintyError: "+ StandardUncertaintyError);
							// console.log(" uncertaintyExpanded: "+ (StandardUncertaintyError*2));
							// console.log("_____________________________________________________________________")


							let uncBudgetTbody = document.getElementById('uncertBudgetTBody');
							var tr = document.createElement('tr');

							var TestLoadTd = document.createElement('td');
							var ReferenceWeightCalculatedTd = document.createElement('td');
							var AirBuoyancytCalculatedTd = document.createElement('td');
							var DriftOfWeightCalculatedTd = document.createElement('td');
							var ConvectionEffectsCalculatedTd = document.createElement('td');
							var RoundingNoLoadCalculatedTd = document.createElement('td');
							var RoundingWithLoadCalculatedTd = document.createElement('td');
							var RepeatabilityCalculatedTd = document.createElement('td');
							var StandardUncertaintyErrorTd = document.createElement('td');
							var uncertaintyExpandedTd = document.createElement('td');
							
							TestLoadTd.innerHTML = i2;
							ReferenceWeightCalculatedTd.innerHTML = ReferenceWeightCalculated;
							AirBuoyancytCalculatedTd.innerHTML = AirBuoyancytCalculated;
							DriftOfWeightCalculatedTd.innerHTML = DriftOfWeightCalculated;
							ConvectionEffectsCalculatedTd.innerHTML = ConvectionEffectsCalculated;
							RoundingNoLoadCalculatedTd.innerHTML = RoundingNoLoadCalculated;
							RoundingWithLoadCalculatedTd.innerHTML = RoundingWithLoadCalculated;
							RepeatabilityCalculatedTd.innerHTML = EccentricityCalculated;
							StandardUncertaintyErrorTd.innerHTML = RepeatabilityCalculated;
							uncertaintyExpandedTd.innerHTML = StandardUncertaintyError*2;
							
							tr.append(TestLoadTd);
							tr.append(ReferenceWeightCalculatedTd);
							tr.append(AirBuoyancytCalculatedTd);
							tr.append(DriftOfWeightCalculatedTd);
							tr.append(ConvectionEffectsCalculatedTd);
							tr.append(RoundingNoLoadCalculatedTd);
							tr.append(RoundingWithLoadCalculatedTd);
							tr.append(RepeatabilityCalculatedTd);
							tr.append(StandardUncertaintyErrorTd);
							tr.append(uncertaintyExpandedTd);


							uncBudgetTbody.prepend (tr)
							//document.getElementById(expandedID).value = toStringWithSignificantDigits(StandardUncertaintyError*2,4);
							document.getElementById(expandedID).value = StandardUncertaintyError*2;
							if(Number.isNaN(Number(StandardUncertaintyError*2))){
								return false;
							}else{
								return true;
							}
						}


						// extendedUncertForHanging
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

							// console.log(ReferenceWeightCalculated+" ReferenceWeightCalculated");
							// console.log(AirBuoyancytCalculated+" AirBuoyancytCalculated");
							// console.log(DriftOfWeightCalculated+" DriftOfWeightCalculated");
							// console.log(ConvectionEffectsCalculated+" ConvectionEffectsCalculated");
							// console.log(RoundingNoLoadCalculated+" RoundingNoLoadCalculated");
							// console.log(RoundingWithLoadCalculated+" RoundingWithLoadCalculated");
							// console.log(EccentricityCalculated+" EccentricityCalculated");
							// console.log(RepeatabilityCalculated+" RepeatabilityCalculated");
							// console.log(StandardUncertaintyError+" StandardUncertaintyError");
							// console.log((StandardUncertaintyError*2)+" uncertaintyExpanded");

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
							if(Description.value.toString().toLowerCase().includes(`digital hanging scale`)){
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
						function getCustomerDetails(){
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
						function checkCertNum(){
							var search = document.getElementById('certificateNumber').value;
							var certNum = document.getElementById('certificateNumber');
							var isSame = document.getElementById('isSameCertNum');
							$.ajax({
								cache: false,
								type: "post",
								url: "<?= base_url('ElectController/checkCertNum')?>",
								data: {'q': search},
								success:function(result){
									if(result == 'true'){
										certNum.setAttribute('style','background-color:rgba(255,0,0,0.5)')
										isSame.value = 'true';
									}else{
										certNum.setAttribute('style','background-color:rgba(0,255,0,0.5)')
										isSame.value = 'false';
									}
									window.setTimeout(checkCertNum, 5000);
								},
							})
						}
					</script>

					<script>
						// function triggerConversionOfCovenMass(unit){
						// 	for(var i = 1; i <= 8; i++){
						// 		covenMassUnit = document.getElementById('covenMassUnit'+i);
						// 		covenMassUnit.value = unit;
						// 		covenMassUnit.onchange();
						// 	}
						// }
					</script>

				
			</div>
			<!-- /#page-content-wrapper -->
		</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

	<script src="dashboardAsset/lib/jquery/jquery.min.js"></script>
	<script src="dashboardAsset/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="dashboardAsset/lib/feathericons/feather.min.js"></script>
	<script src="dashboardAsset/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="dashboardAsset/assets/js/script.js"></script>


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
			var Checking = checkInputs();
			if(Checking == false){
				console.log('not submit')
			}else{
				document.getElementById(idOfForm).submit();
			}
		}

		function checkInputs(){
			if(document.getElementById('isSameCertNum').value == 'true'){
				alert("Certificate Number Already Exists");
				return false;
			}
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


			if(document.getElementById('maxCapacity').value == ''|| document.getElementById('maxCapacity').value == null){
				alert("Maximum Capacity Empty");
				return false;
			}
			if(document.getElementById('readability').value == ''|| document.getElementById('readability').value == null){
				alert("Readability Empty");
				return false;
			}
			if(document.getElementById('weight').value == ''|| document.getElementById('weight').value == null){
				alert("Weight Empty");
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
		$("#menu-toggle").click(function(e) {
		e.preventDefault();
		$("#wrapper").toggleClass("toggled");
		});


		function KgtoGConverter(weight) {
			document.getElementById("outputGrams").innerHTML=weight*1000;
		}

		// function setDate() {
		// 		let d = new Date(document.getElementById("sDate").value)
		// 		let mon = +document.getElementById("mon").value;
		// 		d.setMonth(d.getMonth()+mon)
		// 		document.getElementById("eDate").valueAsDate = d;
		// 	}

		// document.getElementById("sDate").addEventListener("change",setDate)
		// document.getElementById("mon").addEventListener("change",setDate)


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


		// var initialText = $('.editable').val();
		// $('.editOption').val(initialText);

		// $('#test').change(function(){
		// var selected = $('option:selected', this).attr('class');
		// var optionText = $('.editable').text();

		// if(selected == "editable"){
		// $('.editOption').show();

		
		// $('.editOption').keyup(function(){
		// 	var editText = $('.editOption').val();
		// 	$('.editable').val(editText);
		// 	$('.editable').html(editText);
		// });

		// }else{
		// $('.editOption').hide();
		// }
		// });

		var personnels = <?= json_encode($personnel)?>;
		var verifiers = <?= json_encode($verifier)?>;

		$(document).ready(function(){
			addPersonnel();
		});

		function addPersonnel(){
			var calibrationOfficer = document.getElementById('personnelList');
			var verifier = document.getElementById('verifierList');
			var verifierPosition = document.getElementById('verifierPositionList');
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
				option.setAttribute('data-email', item.verifierEmail);
				option.innerHTML = item.verifierName;
				verifier.appendChild(option);

				var option = document.createElement('option');
				option.setAttribute('value', item.verifierPosition);
				option.setAttribute('data-verifiername', item.verifierName);
				option.setAttribute('data-email', item.verifierEmail);
				option.innerHTML = item.verifierPosition;
				verifierPosition.appendChild(option);
			})
			getEmailOfVerifier('verifierList');
			
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
				getEmailOfVerifier('verifierList');
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

		function getEmailOfVerifier(copyFrom){
			var from = document.getElementById(copyFrom);
			var verifierEmail = document.getElementById('verifierEmail');
			verifierEmail.value = from.selectedOptions[0].dataset['email'];
		}

	
		
	</script>

</body>
</html>

