<?php
    use App\Models\ElectModel_3;
    use App\Models\ElectModel_2;
    use App\Models\CustomersModel;
    use App\Models\VerifierModel;

	$standardDetails = new ElectModel_2();
	$standardValues = new ElectModel_3();

	$arrStandardDetails[] = $standardDetails->findAll(); 
	$arrStandardValues[] = $standardValues->findAll(); 

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
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>

<!DOCTYPE html>
<html>
<head>
    <title>RML ++</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.6">
	<style>
		.saveButton{
			position:fixed;
			top:8em;
			right:15;
		}

		input[type="text"]{
			height: 50px; 
		}
		input[type="number"]{
			height: 50px; 
		}
		input[type="date"]{
			height: 50px; 
		}
		.select-lg {
		-webkit-appearance: menulist-button;
		height: 50px;
		}
        .input-group-text{
            background-color:transparent !important;
        }
        #spanCalibrationTable input, #sensitivityTable input, #eccentricityTable input, #linearityTestTable input, #repeatabilityTable input{
            height:100%;
            border:0px solid black;
        }

       

        .automatic {
            background-color:#F1C40F!important;
        }

	</style>
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
		</style>
    <link href="/dashboardAsset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Vendor CSS -->
<link href="/dashboardAsset/lib/remixicon/fonts/remixicon.css" rel="stylesheet">

<!-- Template CSS -->
<link rel="stylesheet" href="/dashboardAsset/assets/css/style.min.css"><!--FONTAWESOME CDN-->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<!--FONTAWESOME CDN-->
</head>  

<body class="skin-base animate">
    <!-- Sidebar vh-100-->
    <?php
		$data = [
			'active' => 'worksheet3',
			'show' => 'worksheet',
		];
		echo view('layouts/sidebarAdmin',$data)?>
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div class="content">
      <div class="content-header">
        <a id="contentMenu" href="#" class="content-menu d-none d-lg-flex"><i data-feather="menu"></i></a>
        <a id="mobileMenu" href="#" class="content-menu d-lg-none"><i data-feather="menu"></i></a>
      </div><!-- content-header -->
        <div class="content-body">
        <form action="/weighingScaleAddData" method="post" id="weighingScaleForm" enctype="multipart/form-data">
			<div class="container-fluid ">
				<div class="card shadow p-3 mb-5 mt-4 bg-white rounded">
					<div class="card-header bg-white">
						<!-- HEADER --> 
                            <div class="row mt-2">
								<h2 class="mx-auto d-flex justify-content-center">Non-automatic Weighing Instrument</h2>
							</div>
							<div class="row mt-n2 mb-3">
								<h4 class="mx-auto d-flex justify-content-center">Calibration Worksheet</h4>
							</div>
						<!-- HEADER -->	
                    </div>
                    <div class="card-body bg-white">
						<input type="hidden" name="standardUsed" id="standardUsed">
                        <input type="hidden" name="specificationsArray" id="specificationsArray">
                        <input type="hidden" name="environmentArray" id="environmentArray">
                        <input type="hidden" name="spanTableArray" id="spanTableArray">
                        <input type="hidden" name="sensitivityTableArray" id="sensitivityTableArray">
                        <input type="hidden" name="eccentricityTableArray" id="eccentricityTableArray">
                        <input type="hidden" name="linearityTestTableArray" id="linearityTestTableArray">
                        <input type="hidden" name="repeatabilityTableArray" id="repeatabilityTableArray">
                        <input type="hidden" name="calculatedValues" id="calculatedValues">
                        <input type="hidden" name="completion" id="completion">
                        <div class='row'>
							<div class='col'>
								<i>Important: Please make sure that no space is added in Certificate No.</i><b style="color: red;"> *</b>
								<div class="mb-3">
									<label>Certificate No. <i style="color: red;">(If the textbox changes to red, it means that the Cert. No. is currently in use.)</i></label>
									<input oninput="checkCertNum()" name='certificateNumber' id='certificateNumber' type="text" class="form-control  mt-n2 " required/>
								</div>
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
									<input type="text" name='address' id="address" style="" required type="text" class="form-control mt-n2">
								</div>
							</div>
							<div class='col'>
								<div class="row mt-3">
									<div class="col-6 mb-3 ">
										<label for="">Date Received</label>
										<input name='dateReceived' required type="date" class="form-control mt-n2 text-break">
									</div>
									<div class="col-6 mb-3 ">
										<label>Date Calibrated</label>
										<input name='dateCalibrated' id="sDate" required type="date" class="form-control mt-n2 text-break">
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
										<input name='recommendedDueDate' id="eDate" required type="date" class="form-control text-break">
									</div>
									
								</div>
								<div class=" mb-3">
									<label>Place of Calibration</label> <br>
									<select id="test"  class="form-control" name="placeOfCalibration">
										<option class="non" value="Mass Laboratory">Mass Laboratory</option>
										<option class="non" value="On site">On site</option>
										<option class="editable" value="">Type here..</option>
									</select>
									<input class="editOption form-control" name="" style="display:none;  width: 90%; position: relative; top: -38px"></input>
								
								</div>
							</div>
						</div>
                        <hr>
                        <div class="row">
                             <div class="mx-auto d-flex justify-content-center">
								<h5>Specifications of the Weighing Instrument</h5>
							</div>
                        </div>      
                        <div class="row">
                            <div class="col mb-2">
                                <label>Description</label>
								<input name='equipmentDescription' id='equipmentDescription' required type="text" class="form-control">
                            </div>
                        </div>  
						<div class='row'>
							<div class='col '>
								<div class=" mb-3">
									<label>Manufacturer/Brand/Make</label>
									<input name="manufacturer" id="manufacturer" required type="text" class="form-control">
								</div>
								<div class=" mb-3">
									<span>Model</span>
									<input name='modelNumber' id='modelNumber'required type="text" class="form-control">
								</div>
								<div class=" mb-3">
									<span >Serial Number</span>
									<input name='serialNumber' id='serialNumber' required type="text" class="form-control">
								</div>
                                <div class=" mb-3">
									<label>Equipment ID(Optional)</label>
									<input name='equipmentNumber' id='equipmentNumber' required type="text" class="form-control">
								</div>
							</div>
							<div class='col '>
								<label>Maximum Capacity</label>
								<div class="input-group mb-2">
									<input name='maxCapacity' id='maxCapacity' required type="text" class="form-control">
									<div class="input-group-append">
										<select name='maxCapacityMeasurement' id='maxCapacityMeasurement' required class="form-select btn-outline-secondary">
											<option selected>Choose. . .</option>
											<option value="mg">mg</option>
											<option value="g">g</option>
											<option value="kg">kg</option>
										</select>
									</div>
								</div>
								<label>Readability</label>
								<div class="input-group mb-2">
									<input name='readability' id='readability' required type="text" class="form-control">
                                    <div class="input-group-append">
                                        <select name='readabilityUnit' id='readabilityUnit' required class="form-select btn-outline-secondary ">
                                            <option selected>Choose. . .</option>
                                            <option value="mg">mg</option>
                                            <option value="g">g</option>
                                            <option value="kg">kg</option>
                                        </select>
                                        <span class="input-group-text">x</span>
										<select name='readabilityX' id='readabilityX' required class="form-select btn-outline-secondary ">
											<option selected>Choose. . .</option>
											<option value="0.5">1/2</option>
											<option value="0.2">1/5</option>
											<option value="0.1">1/10</option>
										</select>
									</div>
								</div>
								<label>e</label>
								<div class="input-group mb-3">
									<input name='e' id='e' required type="text" class="form-control ">
								</div>
                                <label>Remarks</label>
								<div class="input-group mb-3">
									<input name='equipmentRemarks' id='equipmentRemarks' required type="text" class="form-control ">
								</div>
							</div>		
						</div>
                        <hr>
                        <div class="row">
                             <div class="mx-auto d-flex justify-content-center">
								<h5>Environment</h5>
							</div>
                        </div>      
						<div class='row'>
							<div class='col'>
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text">Start temp</label>
                                        </div>
                                        <input name="startTemp" id="startTemp" required type="text" class="form-control">
                                        <div class="input-group-append">
                                            <label class="input-group-text">End temp</label>
                                        </div>
                                        <input name='endTemp' id='endTemp'required type="text" class="form-control">
                                        <div class="input-group-append">
                                            <label class="input-group-text">Average</label>
                                        </div>
                                        <input name='averageTemp' id='averageTemp'required type="text" class="form-control automatic" tabindex='-1'>
                                    </div>
                                </div>
							</div>
                            <div class='col'>
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text">Start RH</label>
                                        </div>
                                        <input name="startRH" id="startRH" required type="text" class="form-control">
                                        <div class="input-group-append">
                                            <label class="input-group-text">End RH</label>
                                        </div>
                                        <input name='endRH' id='endRH'required type="text" class="form-control">
                                        <div class="input-group-append">
                                            <label class="input-group-text">Average</label>
                                        </div>
                                        <input name='averageRH' id='averageRH'required type="text" class="form-control automatic" tabindex='-1'>
                                    </div>
                                </div>
							</div>
						</div>
						<hr>
                        <div class="row">
                             <div class="mx-auto d-flex justify-content-center">
								<h5>Standard weights</h5>
							</div>
                        </div> 
						<div class="row">
							<div class="mx-auto d-flex justify-content-center">   		
								<button type="button" class="btn btn-danger float-end btn-lg" style="right:0;top:0;" data-toggle="modal" data-target="#standardModal">
									Select/Change Weight
								</button>
							</div>
						</div>
                        <hr>
                        <div class="row">
                            <div class="mx-auto d-flex justify-content-center">
								<h5>Preliminary Inspection</h5>
							</div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-check">
                                    <input name="premA" class="form-check-input" type="checkbox" value="A" id="premA">
                                    <label class="form-check-label" for="premA">
                                    Visual Inspection ( clean the equipment with soft cloth to remove dust and small particles  )
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="premB" class="form-check-input" type="checkbox" value="B" id="premB">
                                    <label class="form-check-label" for="premB">
                                    Check the surfaces, edges, and weighing pan of the equipment for any damages (Note in remarks)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="premC" class="form-check-input" type="checkbox" value="C" id="premC">
                                    <label class="form-check-label" for="premC">
                                    Check the display of the equipment for cracks/scratches, and color changes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="premD" class="form-check-input" type="checkbox" value="D" id="premD">
                                    <label class="form-check-label" for="premD">
                                    Level the instrument if indicating means is provided and note its conditions
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input name="premE" class="form-check-input" type="checkbox" value="E" id="premE">
                                    <label class="form-check-label" for="premE">
                                    Exercise the instrument by loading up to 80% of maximum capacity
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="premF" class="form-check-input" type="checkbox" value="F" id="premF">
                                    <label class="form-check-label" for="premF">
                                    Record all necessary and vital information
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="premG"class="form-check-input" type="checkbox" value="G" id="premG">
                                    <label class="form-check-label" for="premG">
                                    Check the tare mechanism if available
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="mx-auto d-flex justify-content-center">
								<h5>Span Calibration</h5>
							</div>
                        </div>
                        <div class="row">
                            <table class="table table-bordered text-center" id="spanCalibrationTable">
                                <thead>
                                    <tr>
                                        <th>Load</th>
                                        <th>Trial</th>
                                        <th>
                                            Before adjustment 
                                            <select name='spanBeforeUnit' id="spanBeforeUnit" class="">
                                                <option value="mg">mg</option>
                                                <option value="g" selected>g</option>
                                                <option value="kg">kg</option>
                                            </select>
                                        </th>
                                        <th>
                                            After adjustment
                                            <select name='spanAfterUnit' id='spanAfterUnit' class="">
                                                <option value="mg">mg</option>
                                                <option value="g" selected>g</option>
                                                <option value="kg">kg</option>
                                            </select>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class=''>
                                    <tr>
                                        <td rowspan='5' class="align-self-center">
                                            Empty
                                        </td>
                                        <td>1</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanBefore1" id="spanBefore1" class="form-control">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanAfter1" id="spanAfter1" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanBefore3" id="spanBefore3" class="form-control">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanAfter3" id="spanAfter3" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanBefore5" id="spanBefore5" class="form-control">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanAfter5" id="spanAfter5" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanBefore7" id="spanBefore7" class="form-control">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanAfter7" id="spanAfter7" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanBefore9" id="spanBefore9" class="form-control">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanAfter9" id="spanAfter9" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td rowspan='5' class="align-self-center">
                                            Maximum
                                        </td>
                                        <td>2</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanBefore2" id="spanBefore2" class="form-control">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanAfter2" id="spanAfter2" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanBefore4" id="spanBefore4" class="form-control">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanAfter4" id="spanAfter4" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanBefore6" id="spanBefore6" class="form-control">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanAfter6" id="spanAfter6" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanBefore8" id="spanBefore8" class="form-control">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanAfter8" id="spanAfter8" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanBefore10" id="spanBefore10" class="form-control">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanAfter10" id="spanAfter10" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="mx-auto d-flex justify-content-center">
								<h5>Sensitivity Test</h5>
							</div>
                        </div>
                        <div class='row'>
							<div class="row">
								<div class="col" style='display:none'>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text">Reference weight</label>
										</div>
										<input name="sensitivityReferenceWeight" id="sensitivityReferenceWeight" required type="text" class="form-control" value='n/a'>
									</div>
								</div>
								<div class="col">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text">Nominal value</label>
										</div>
										<input name="sensitivityNominalValue" id="sensitivityNominalValue" required type="text" class="form-control">
                                        <div class="input-group-append">
                                            <select name="sensitivityNominalUnit" id="sensitivityNominalUnit" class="input-group-text">
                                                <option value="mg">mg</option>
                                                <option value="g" selected>g</option>
                                                <option value="kg">kg</option>
                                            </select>
                                        </div>
									</div>
								</div>
								<div class="col">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text">Marking</label>
										</div>
										<input name="sensitivityMarking" id="sensitivityMarking" required type="text" class="form-control">
									</div>
								</div>
						   		<div class="col">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text">CM</label>
										</div>
										<input name="sensitivityCM" id="sensitivityCM" required type="text" class="form-control">
                                        <div class="input-group-append">
                                            <select name="sensitivityCMUnit" id="sensitivityCMUnit" class="input-group-text">
                                                <option value="mg">mg</option>
                                                <option value="g" selected>g</option>
                                                <option value="kg">kg</option>
                                            </select>
                                        </div>
									</div>
								</div>
								<div class="col">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text">U</label>
										</div>
										<input name="sensitivityU" id="sensitivityU" required type="text" class="form-control">
                                        <div class="input-group-append">
                                            <select name="sensitivityUUnit" id="sensitivityUUnit" class="input-group-text">
                                                <option value="mg">mg</option>
                                                <option value="g" selected>g</option>
                                                <option value="kg">kg</option>
                                            </select>
                                        </div>
									</div>
								</div>
						   	</div>
						</div>
						<div class="row">
                            <table class="table table-bordered text-center" id="sensitivityTable">
                                <thead>
                                    <tr>
                                        <th>Trial</th>
                                        <th>
										Empty + Δm, 
                                            <select name="sensitivityEmptyUnit" id="sensitivityEmptyUnit" class="">
                                                <option value="mg">mg</option>
                                                <option value="g" selected>g</option>
                                                <option value="kg">kg</option>
                                            </select>
                                        </th>
                                        <th>
										Max ( <input name="sensitivityMaxNominalValue" id="sensitivityMaxNominalValue" required type="text" class="" style="width: 5%;"> ) + Δm,
                                            <select name="sensitivityMaxUnit" id="sensitivityMaxUnit" class="">
                                                <option value="mg">mg</option>
                                                <option value="g" selected>g</option>
                                                <option value="kg">kg</option>
                                            </select>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class=''>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="sensitivityEmptyTrial1" id="sensitivityEmptyTrial1" class="form-control">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="sensitivityMaxTrial1" id="sensitivityMaxTrial1" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="sensitivityEmptyTrial2" id="sensitivityEmptyTrial2" class="form-control">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="sensitivityMaxTrial2" id="sensitivityMaxTrial2" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="sensitivityEmptyTrial3" id="sensitivityEmptyTrial3" class="form-control">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="sensitivityMaxTrial3" id="sensitivityMaxTrial3" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="sensitivityEmptyTrial4" id="sensitivityEmptyTrial4" class="form-control">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="sensitivityMaxTrial4" id="sensitivityMaxTrial4" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="sensitivityEmptyTrial5" id="sensitivityEmptyTrial5" class="form-control">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="sensitivityMaxTrial5" id="sensitivityMaxTrial5" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Std. Dev. (g)</td>
                                        <td class="automatic">
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="sensitivityEmptyStandardDev" id="sensitivityEmptyStandardDev" class="form-control automatic" tabindex="-1">
                                            </div>
                                        </td>
                                        <td class="automatic">
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="sensitivityMaxStandardDev" id="sensitivityMaxStandardDev" class="form-control automatic" tabindex="-1">
                                            </div>
                                        </td>
                                    </tr>
                                   
                                </tbody>
                            </table>
                        </div>
						<hr>
                        <div class="row">
                            <div class="mx-auto d-flex justify-content-center">
								<h5>Eccentricity Test</h5>
							</div>
                        </div>
						<div class="row">
                            <table class="table table-bordered text-center" id="eccentricityTable">
                                <thead>
                                    <tr>
                                        <th>Position</th>
                                        <th>
										Indication,
                                            <select name="eccentricityIndicationUnit" id="eccentricityIndicationUnit" class="">
                                                <option value="mg">mg</option>
                                                <option value="g" selected>g</option>
                                                <option value="kg">kg</option>
                                            </select>
                                        </th>
                                        <th>
										Error,
                                            <select name="eccentricityErrorUnit" id="eccentricityErrorUnit" class="">
                                                <option value="mg">mg</option>
                                                <option value="g" selected>g</option>
                                                <option value="kg">kg</option>
                                            </select>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class=''>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="eccentricityIndicationPosition1Start" id="eccentricityIndicationPosition1Start" class="form-control">
                                            </div>
                                        </td>
                                        <td class="automatic">
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="eccentricityErrorPosition1Start" id="eccentricityErrorPosition1Start" class="form-control automatic">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="eccentricityIndicationPosition2" id="eccentricityIndicationPosition2" class="form-control">
                                            </div>
                                        </td>
                                        <td class="automatic">
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="eccentricityErrorPosition2" id="eccentricityErrorPosition2" class="form-control automatic">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="eccentricityIndicationPosition3" id="eccentricityIndicationPosition3" class="form-control">
                                            </div>
                                        </td>
                                        <td class="automatic">
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="eccentricityErrorPosition3" id="eccentricityErrorPosition3" class="form-control automatic">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="eccentricityIndicationPosition4" id="eccentricityIndicationPosition4" class="form-control">
                                            </div>
                                        </td>
                                        <td class="automatic">
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="eccentricityErrorPosition4" id="eccentricityErrorPosition4" class="form-control automatic">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="eccentricityIndicationPosition5" id="eccentricityIndicationPosition5" class="form-control">
                                            </div>
                                        </td>
                                        <td class="automatic">
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="eccentricityErrorPosition5" id="eccentricityErrorPosition5" class="form-control automatic">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="eccentricityIndicationPosition1End" id="eccentricityIndicationPosition1End" class="form-control">
                                            </div>
                                        </td>
                                        <td class="automatic">
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="eccentricityErrorPosition1End" id="eccentricityErrorPosition1End" class="form-control automatic">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
						<hr>
                        <div class="row">
                            <div class="mx-auto d-flex justify-content-center">
								<h5>Illustration</h5>
							</div>
                        </div>
						<div class='row '>
							<div class="form-check col d-flex justify-content-center mb-2">
								<div class="input-group-prepend">
									<input class="form-check-input me-3" type="radio" value="A" id="illusA" name="illustration">
								</div>	
								<label class="form-check-label" for="illusA">
									<img src="/image/weighingScaleSquare.png" alt="DOST LOGO" height='90px' > 
								</label>
							</div>
							<div class="form-check col d-flex justify-content-center">
								<div class="input-group-prepend">
									<input class="form-check-input me-3" type="radio" value="B" id="illusB" name="illustration">
								</div>	
								<label class="form-check-label" for="illusB">
									<img src="/image/weighingScaleCircle.png" alt="DOST LOGO" height='90px' > 
								</label>
							</div>
						</div>
						<div class="row">
							<div class="mx-auto d-flex justify-content-center">
								<h6><i>Eccentricity Error = Position (Front, Back, Left, Right) - Average of Center</i></h6>
							</div>
						</div>
						<hr>
                        <div class="row">
							<div class="col">
								<div class="mx-auto d-flex justify-content-center">
									<h5>Linearity Test</h5>
								</div>		
							</div>
							<div class="col mb-2">
								<div class="mx-auto d-flex justify-content-center">
									<button type="button" class="btn btn-outline-success" id="linearityTestAddButton" >Add</button>
									<button type="button" class="btn btn-outline-danger" id="linearityTestDeleteButton">Delete</button>
								</div>		
							</div>
                        </div>
						<div class="row">
							<table class="table table-bordered text-center" id="linearityTestTable">
                                <thead>
                                    <tr>
                                        <th rowspan='2'>
										Nominal value, 
                                            <select class="" name="linearityNominalValueUnit" id="linearityNominalValueUnit">
                                                <option value="mg">mg</option>
                                                <option value="g" selected>g</option>
                                                <option value="kg">kg</option>
                                            </select>
                                        </th>
										<th colspan='3'>Test weight/s used</th>
                                        <th colspan='2'>
										Indication, 
                                            <select class="" name="linearityIndicationUnit" id="linearityIndicationUnit">
                                                <option value="mg">mg</option>
                                                <option value="g" selected>g</option>
                                                <option value="kg">kg</option>
                                            </select>
                                        </th>
                                    </tr>
									<tr>
                                        <th>Standard used</th>
                                        <th>
                                            Convertional Mass 
                                            <select class="" name="linearityConventionalMassUnit" id="linearityConventionalMassUnit">
                                                <option value="mg">mg</option>
                                                <option value="g" selected>g</option>
                                                <option value="kg">kg</option>
                                            </select>
                                        </th>
									    <th>Uncertainty</th>
									    <th>Upward</th>
									    <th>Downward</th>
                                    </tr>
                                </thead>
								<tbody id="linearityTestTableBody">

								</tbody>
                            </table>
						</div>
						<hr>
                        <div class="row">
                            <div class="mx-auto d-flex justify-content-center">
								<h5>Repeatability Test</h5>
							</div>
                        </div>
						<div class="row">
                            <table class="table table-bordered text-center" id="repeatabilityTable">
                                <thead>
                                    <tr>
                                        <th>Trial</th>
                                        <th>
											Indication,
                                            <select name='repeatabilityIndicationUnit' id='repeatabilityIndicationUnit'>
                                                <option value="mg">mg</option>
                                                <option value="g" selected>g</option>
                                                <option value="kg">kg</option>
                                            </select>
                                        </th>
										<th>Trial</th>
                                        <th>
											Indication,
                                            <select name='repeatabilityIndicationUnit2' id='repeatabilityIndicationUnit2'>
                                                <option value="mg">mg</option>
                                                <option value="g" selected>g</option>
                                                <option value="kg">kg</option>
                                            </select>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class=''>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="repeatabilityTrial1" id="repeatabilityTrial1" class="form-control">
                                            </div>
                                        </td>
										<td>6</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="repeatabilityTrial6" id="repeatabilityTrial6" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="repeatabilityTrial2" id="repeatabilityTrial2" class="form-control">
                                            </div>
                                        </td>
										<td>7</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="repeatabilityTrial7" id="repeatabilityTrial7" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="repeatabilityTrial3" id="repeatabilityTrial3" class="form-control">
                                            </div>
                                        </td>
										<td>8</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="repeatabilityTrial8" id="repeatabilityTrial8" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="repeatabilityTrial4" id="repeatabilityTrial4" class="form-control">
                                            </div>
                                        </td>
										<td>9</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="repeatabilityTrial9" id="repeatabilityTrial9" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="repeatabilityTrial5" id="repeatabilityTrial5" class="form-control">
                                            </div>
                                        </td>
										<td>10</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="repeatabilityTrial10" id="repeatabilityTrial10" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan='2'>SD</td>
                                        <td colspan='2'>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="repeatabilitySD" id="repeatabilitySD" class="form-control">
												<select  name="repeatabilitySUnit" id="repeatabilitySUnit" class="">
													<option value="mg">mg</option>
													<option value="g" selected>g</option>
													<option value="kg">kg</option>
												</select>
											</div>
                                        </td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="mx-auto d-flex justify-content-center">
								<h5>Personnel</h5>
							</div>
                        </div>
                        <div class="row">
                            <table class="table table-borderless" >
                                <thead>
                                    <tr>
                                        <td><p style="margin:0">Calibration Officer</p></td>
                                        <td><p style="margin:0">Checked By</p></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <select id="personnelList" name="calibrationOfficer" class="form-control">
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <select id="verifierList" name="checkedBy" class="form-control">
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
                                                <select id="verifierPositionList" name="verifierPosition" class="form-control">
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
							<div class="col-12">
								<input type="file" name="image" accept="image/*" id="imageInput" onchange="loadFile(event)">
								<img id="output"/>
							</div>	
						</div>
					</div>
                    <div class="card-footer bg-white">
                        <div class="row">
							<div class='col text-center'>
								<button type="button" class="btn btn-lg btn-primary" id="generateDataButton"><i class="fas fa-plus-square"></i> Generate Data</button>
							</div> 
							<br>	
						</div>
						<div class="row">
							<div class="col justify-content-right">
								<a href="dashboard" class="btn btn-lg btn-danger mt-3 mx-3 float-right"><i class="fas fa-door-closed"></i> Back</a>
							</div>
						</div>
					</div>
                </div>	
                <!-- <button type="button" class="btn btn-success saveButton" data-toggle="modal" data-target="#testWeightSelectModal" style="top: 350; right: 50;"> -->
                <button type="button" class="btn btn-success saveButton" onclick="saveOnly('weighingScaleForm')" style="top: 350; right: 50;">
                    <i class="fas fa-save" style="font-size: 50px;"></i>
                </button>
            </div>		
        </div>
        </form>
    </div>   
    <!-- /#page-content-wrapper -->
    <!-- standard Modal -->             
	<div class="modal fade" id="standardModal" tabindex="-1">
		<div class="modal-dialog modal-xl modal-dialog-scrollable" style="width:100%">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Standard</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
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
								
									$arrStandard[] = $standardDetails->findAll();
									foreach($arrStandard as $value){
										for ($i=0; $i < count($value); $i++) {
							
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
										<label for="flexCheck<?=$i?>"><?=  $arrStandard[0][$i]['class'];?></label>
										</td>
										<td>
										<label for="flexCheck<?=$i?>"><?=  $arrStandard[0][$i]['serialNumber'];?></label>
										</td>
										<td>
										<label for="flexCheck<?=$i?>"><?=  $arrStandard[0][$i]['description'];?></td></label>
										<td>
										<label for="flexCheck<?=$i?>"><?php $date = $arrStandard[0][$i]['dateOfCalibration'];  $new_date = strtotime($date); echo date('M d, Y', $new_date); ?></label>
										</td>
										<td>
										<label for="flexCheck<?=$i?>"><?php $date = $arrStandard[0][$i]['dateOfCalibration']; $date = strtotime($date); $new_date = strtotime('+ 1 year', $date); echo date('M d, Y', $new_date); ?></label>
										</td>
									</tr>
								<?php				
										}	
									}
								?>
						</tbody>					
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-success" data-dismiss="modal" id="standardModalSelect">Select</button>
				</div>
			</div>
		</div>
	</div>
    <!-- standard Modal -->
    <!-- standard select Modal -->             
	<div class="modal fade" id="testWeightSelectModal" tabindex="-1">
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
							<button class="btn btn-outline-secondary" type="button" id="selectModalSearchButton" onclick="filterTestWeightSelectModal('testWeightSelectBody');">Search</button>
						</div>
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" type="button" id="selectModalRefreshButton" onclick="addRowToTestWeightSelectModal('testWeightSelectHead','testWeightSelectBody');">Refresh</button>
						</div>
					</div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
                    <div class="card">
                        <div class="card-header" id="testWeightSelectHead"> </div>
                       
                        <div class="card-body">
                            <table class="table table-sm " style="height:60%">
                                <thead>
                                    <tr>
                                        <th>Selected Test Weight Marking: </th>
                                        <th colspan='7' id='testWeightSelectedTestPoint' style="text-decoration: underline;"></th>
                                    </tr>
                                    <tr>
                                        <th>Nominal Value</th>
                                        <th>Nominal Unit</th>
                                        <th>Serial Number</th>
                                        <th>Marking</th>
                                        <th>Conventional Mass</th>
                                        <th>Unit</th>
                                        <th>Uncertainty (mg)</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="testWeightSelectBody">
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
</body>
</html>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<script>
    //Datas

    var standardArrayDetails = <?= json_encode($arrStandardDetails[0])?>;   
    var standardArrayValues = <?= json_encode($arrStandardValues[0])?>;
    var personnels = <?= json_encode($personnel)?>;
    var verifiers = <?= json_encode($verifier)?>;

    //Variables

    var selectedStandard;
    var selectedTestpoint = [];  
    var lineraityTestSelectedRow = 0;
    var linearityTestNumberOfRow = 0;

    var kForFormula = 2;
    
    //Data Manipulation

    $(document).ready(function(){
        addPersonnel();
    });

    function getAllCheckedCheckbox(idOfCheckbox){
        var array1 = selectedTestpoint;
        var array2 = [];
        
        var checkboxes = document.querySelectorAll('input[name='+idOfCheckbox+']:checked')
        for (var i = 0; i < checkboxes.length; i++) {
            array2.push(checkboxes[i].value)
        }
        selectedTestpoint.push(array2);
        console.log('array 1 ',array1)
        console.log('array 2 ',array2)
        var testPointSplitted = '';
        for (let x = 0; x < array2.length; x++) {
            var testPointMarkings = array2[x].split("(SPLIT)");
            testPointSplitted += testPointMarkings[2]+" + ";
        }
        document.getElementById('testWeightSelectedTestPoint').innerHTML = testPointSplitted;
        
    }

    function recheckCheckbox(idOfCheckbox){
        var checkboxes = document.querySelectorAll('input[name='+idOfCheckbox+']');
        for (var i = 0; i < checkboxes.length; i++) {
            for (var x = 0; x < selectedTestpoint.length; x++) {
                if (checkboxes[i].value == selectedTestpoint[x]) {
                    checkboxes[i].setAttribute('checked','');
                }  
            }
        }
    }

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
            option.innerHTML = item.verifierName;
            verifier.appendChild(option);

            var option = document.createElement('option');
            option.setAttribute('value', item.verifierPosition);
            option.setAttribute('data-verifiername', item.verifierName);
            option.innerHTML = item.verifierPosition;
            verifierPosition.appendChild(option);
        })
    }

    function getValueFromUseButton(button){
        var selected = JSON.parse(document.getElementById('StandardUsedHiddenRow'+lineraityTestSelectedRow).value);
        var tempArray = [];
        selected.push(button.id);
        selectedTestpoint = selected;
        var testPointSplitted = '';
        for (let x = 0; x < selected.length; x++) {
            var testPointMarkings = selected[x].split("(SPLIT)");
            testPointSplitted += testPointMarkings[2]+" + ";
        }
        getValuesFromSelectedStandard(selected, 'ConventionalMassRow'+lineraityTestSelectedRow , 'UncertaintyRow'+lineraityTestSelectedRow, 'StandardUsedRow'+lineraityTestSelectedRow);

        document.getElementById('testWeightSelectedTestPoint').innerHTML = document.getElementById('StandardUsedRow'+lineraityTestSelectedRow).value;
        document.getElementById(button.id).innerHTML = 'Unselect';
        document.getElementById(button.id).setAttribute('class','btn btn-outline-warning');
        document.getElementById(button.id).setAttribute('onclick','removeValueFromUseButton(this)');
        document.getElementById('StandardUsedHiddenRow'+lineraityTestSelectedRow).value = JSON.stringify(selected);
        
    }

    function removeValueFromUseButton(button){
        var selected = selectedTestpoint;
        var toDeleteArray = [];
        var newSelected = [];

        toDeleteArray.push(button.id);
        for (let x = 0; x < selected.length; x++) {
            for (let i = 0; i < toDeleteArray.length; i++) {
                if(selected[x] != toDeleteArray[i]){
                    newSelected.push(selected[x]);
                }
            }
        }   
        selectedTestpoint = newSelected;
        var testPointSplitted = document.getElementById('StandardUsedRow'+lineraityTestSelectedRow).value;
        for (let x = 0; x < selectedTestpoint.length; x++) {
            var testPointMarkings = selectedTestpoint[x].split("(SPLIT)");
            testPointSplitted += testPointMarkings[2]+" + ";
        }
        document.getElementById('testWeightSelectedTestPoint').innerHTML = testPointSplitted;
        document.getElementById(button.id).innerHTML = 'Use';
        document.getElementById(button.id).setAttribute('class','btn btn-outline-secondary');
        document.getElementById(button.id).setAttribute('onclick','getValueFromUseButton(this)');
        document.getElementById('StandardUsedHiddenRow'+lineraityTestSelectedRow).value = JSON.stringify(selectedTestpoint);
        getValuesFromSelectedStandard(selectedTestpoint, 'ConventionalMassRow'+lineraityTestSelectedRow , 'UncertaintyRow'+lineraityTestSelectedRow , 'StandardUsedRow'+lineraityTestSelectedRow);
    }

    function useButtonState(button){
        var buttonForReturn = document.createElement("button");
        if(selectedTestpoint.length!=0){
            var isSelected = selectedTestpoint.includes(button);
            if(!isSelected){
                buttonForReturn.setAttribute('type','button');
                buttonForReturn.setAttribute('class','btn btn-outline-secondary');
                buttonForReturn.innerHTML = "Use";
                buttonForReturn.setAttribute('id',button);
                buttonForReturn.setAttribute('onclick', 'getValueFromUseButton(this)');
                console.log(false);
            }else{
                buttonForReturn.setAttribute('type','button');
                buttonForReturn.setAttribute('class','btn btn-outline-warning');
                buttonForReturn.innerHTML = "Unselect";
                buttonForReturn.setAttribute('id',button);
                buttonForReturn.setAttribute('onclick', 'removeValueFromUseButton(this)');
                console.log(true);
            }
        }else{
            buttonForReturn.setAttribute('type','button');
            buttonForReturn.setAttribute('class','btn btn-outline-secondary');
            buttonForReturn.innerHTML = "Use";
            buttonForReturn.setAttribute('id',button);
            buttonForReturn.setAttribute('onclick', 'getValueFromUseButton(this)');
            console.log('no selected');
        }
        return buttonForReturn;
        
    }

	function addRow(id){    
		function addNewTD(rowNumber, nameID){
			try {
				var td = document.createElement("td");
				var div = document.createElement("div");
				var input = document.createElement("input");
				div.setAttribute('class', 'input-group');
				input.setAttribute('class', 'form-control');
				input.setAttribute('type', 'text');
                input.setAttribute('data-rowNumber', rowNumber);
				//Edit after adding db
				input.setAttribute('name', nameID+"Row"+rowNumber);
				input.setAttribute('id', nameID+"Row"+rowNumber);
                if(nameID == 'ConventionalMass' || nameID == 'Uncertainty'){
                    input.setAttribute('style', 'background-color:yellow');
				    input.setAttribute('tabindex', '-1');
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
        function addNewTDWithButton(rowNumber){
			try {
				var td = document.createElement("td");
				var div = document.createElement("div");
                var divOutside = document.createElement("div");
                var AddButton = document.createElement("button");
                var DeleteButton = document.createElement("button");
				div.setAttribute('class', 'col btn-group');
                divOutside.setAttribute('class', 'row');
				AddButton.setAttribute('class', 'btn btn-success addBtn');
                AddButton.setAttribute('data-toggle', 'modal');
                AddButton.setAttribute('data-target', '#testWeightSelectModal');
                AddButton.setAttribute('data-rowNumber', rowNumber);
                AddButton.setAttribute('onclick', 'linearityTestGetRowNumber(this);addRowToTestWeightSelectModal("testWeightSelectHead","testWeightSelectBody");');
                DeleteButton.setAttribute('class', 'btn btn-danger');
				AddButton.setAttribute('type', 'button');
                DeleteButton.setAttribute('type', 'button');
                AddButton.innerHTML = "Add";
                DeleteButton.innerHTML = "Clear";
				div.appendChild(AddButton);
                div.appendChild(DeleteButton);
                divOutside.appendChild(div);
                var div = document.createElement("div");
                var input = document.createElement("input");
				div.setAttribute('class', 'col btn-group');
				input.setAttribute('class', 'form-control');
				input.setAttribute('type', 'text');
                input.setAttribute('name', 'StandardUsedRow'+rowNumber);
				input.setAttribute('id', 'StandardUsedRow'+rowNumber);
                var inputHidden = document.createElement("input");
				inputHidden.setAttribute('type', 'hidden');
                inputHidden.setAttribute('name', 'StandardUsedHiddenRow'+rowNumber);
				inputHidden.setAttribute('id', 'StandardUsedHiddenRow'+rowNumber);
                inputHidden.setAttribute('value', '[]');
                div.appendChild(input);
                div.appendChild(inputHidden);
                divOutside.appendChild(div);
				td.appendChild(divOutside);
				return td
			} catch (error) {
				var td = document.createElement("td");
				var div = document.createElement("div");
				div.setAttribute('class', 'input-group input-group-sm');
				p.innerHTML = error;
				div.appendChild(p);
				td.appendChild(div);
				return td 
			}
		}
		try {
			var tbody = document.getElementById(id);
			var tr = document.createElement("tr");
            linearityTestNumberOfRow += 1;
            var rowNumber = linearityTestNumberOfRow;
            tr.appendChild(addNewTD(rowNumber,'NominalValue'));
			tr.appendChild(addNewTDWithButton(rowNumber));
            tr.appendChild(addNewTD(rowNumber,'ConventionalMass'));
			tr.appendChild(addNewTD(rowNumber,'Uncertainty'));
			tr.appendChild(addNewTD(rowNumber,'Upward'));
			tr.appendChild(addNewTD(rowNumber,'Downward'));
			tbody.appendChild(tr);
		} catch (e) {
			alert(e);
		}
	}

	function deleteRow(tableID) {
		try {
			var table = document.getElementById(tableID);
			var rowCount = table.rows.length;			
			if(rowCount==0){
				alert('No more row to delete')
			}else{
				table.deleteRow(rowCount-1);
				console.log("table.rows.length "+table.rows.length);
				rowOfTable = table.rows.length;
                linearityTestNumberOfRow -= 1;
			}
		}catch(e) {
			alert(e);
		}
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
		selectedStandard = PlaceholderWeight;
		weightSplitted = selectedStandard.split("(SPLIT)");
		document.getElementById('standardUsed').value = selectedStandard;
	}

    function addRowToTestWeightSelectModal(idOfDetails,idOfBody){
        document.getElementById('testWeightSelectedTestPoint').innerHTML = document.getElementById('StandardUsedRow'+lineraityTestSelectedRow).value == null? '' :document.getElementById('StandardUsedRow'+lineraityTestSelectedRow).value;
        selectedTestpoint = JSON.parse(document.getElementById('StandardUsedHiddenRow'+lineraityTestSelectedRow).value);
        function addDetails(classes,serial,description,type){
			try {
				var div = document.createElement("div");
				var p_class = document.createElement("p");
                var p_serial = document.createElement("p");
                var p_desc = document.createElement("p");
                var p_type = document.createElement("p");
				div.setAttribute('class', 'input-group input-group-sm');
				p_class.setAttribute('class', 'h6 col');
				p_class.setAttribute('type', 'text');
                p_class.innerHTML = classes;
                
                p_serial.setAttribute('class', 'h6 col');
				p_serial.setAttribute('type', 'text');
                p_serial.innerHTML = serial;

                p_desc.setAttribute('class', 'h6 col');
				p_desc.setAttribute('type', 'text');
                p_desc.innerHTML = description;

                p_type.setAttribute('class', 'h6 col');
				p_type.setAttribute('type', 'text');
                p_type.innerHTML = type;


				div.appendChild(p_class);
                div.appendChild(p_serial);
                div.appendChild(p_desc);
                div.appendChild(p_type);
				return div;
			} catch (error) {
				var td = document.createElement("td");
				var div = document.createElement("div");
				var p = document.createElement("p");
				div.setAttribute('class', 'input-group input-group-sm');
				p.innerHTML = error;
				div.appendChild(p);
				td.appendChild(div);
				return td 
			}
		}
        function addNewTD(value){
			try {
				var td = document.createElement("td");
				var div = document.createElement("div");
				var p = document.createElement("p");
				div.setAttribute('class', 'input-group input-group-sm');
				p.setAttribute('class', 'h6');
                p.innerHTML = value
				div.appendChild(p);
				td.appendChild(div);
				return td
			} catch (error) {
				var td = document.createElement("td");
				var div = document.createElement("div");
				var p = document.createElement("p");
				div.setAttribute('class', 'input-group input-group-sm');
				p.innerHTML = error;
				div.appendChild(p);
				td.appendChild(div);
				return td 
			}
		}

		try {
            const standardSplitted = selectedStandard.split("(SPLIT)");
			var details = document.getElementById(idOfDetails);
            var tbody = document.getElementById(idOfBody);

            while (tbody.hasChildNodes()) {
                tbody.removeChild(tbody.firstChild);
            }
            while (details.hasChildNodes()) {
                details.removeChild(details.firstChild);
            }
           
            for (let i = 0; i < standardSplitted.length; i++) {
                const e = standardSplitted[i];
                var filteredDetails = filterDataDynamic(e,"serialNumber",standardArrayDetails);
                details.appendChild(addDetails(filteredDetails[0].class,filteredDetails[0].serialNumber,filteredDetails[0].description,filteredDetails[0].type));
                var filteredValues = filterDataDynamic(e,"serialNumber",standardArrayValues);
                for (let x = 0; x < filteredValues.length; x++) {
                    var tr = document.createElement("tr");
                    var td = document.createElement("td");

                    var idForButton = e+"(SPLIT)"+filteredValues[x].id+"(SPLIT)"+filteredValues[x].marking;
                    
                    tr.appendChild(addNewTD(filteredValues[x].nominalValue));
                    tr.appendChild(addNewTD(filteredValues[x].nominalUnit));
                    tr.appendChild(addNewTD(filteredValues[x].serialNumber));
                    tr.appendChild(addNewTD(filteredValues[x].marking));
                    tr.appendChild(addNewTD(filteredValues[x].conventionalMass));
                    tr.appendChild(addNewTD(filteredValues[x].unit));
                    tr.appendChild(addNewTD(filteredValues[x].uncertainty));
                    td.appendChild(useButtonState(idForButton));
                    tr.appendChild(td);
                    tbody.appendChild(tr);
                }
            }
		} catch (e) {
			alert(e);
		}
    }

    function filterTestWeightSelectModal(idOfBody){
        function addNewTD(value){
			try {
				var td = document.createElement("td");
				var div = document.createElement("div");
				var p = document.createElement("p");
				div.setAttribute('class', 'input-group input-group-sm');
				p.setAttribute('class', 'h6');
                p.innerHTML = value
				div.appendChild(p);
				td.appendChild(div);
				return td
			} catch (error) {
				var td = document.createElement("td");
				var div = document.createElement("div");
				var p = document.createElement("p");
				div.setAttribute('class', 'input-group input-group-sm');
				p.innerHTML = error;
				div.appendChild(p);
				td.appendChild(div);
				return td 
			}
		}
		try {
            const standardSplitted = selectedStandard.split("(SPLIT)");
            var tbody = document.getElementById(idOfBody);

            while (tbody.hasChildNodes()) {
                tbody.removeChild(tbody.firstChild);
            }       

            for (let i = 0; i < standardSplitted.length; i++) {
                const e = standardSplitted[i];
                var filteredValues = filterDataDynamic(e,"serialNumber",standardArrayValues);

                var filteredSerialNumber = filterDataDynamic(document.getElementById('searchStandardSerialNumber').value,"serialNumber",filteredValues);
                var filteredNominalUnit = filterDataDynamic(document.getElementById('searchStandardUnit').value,"nominalUnit",filteredSerialNumber);
                var filteredNominalValue = filterDataDynamic(document.getElementById('searchStandard').value,"nominalValue",filteredNominalUnit);
                var filteredMarking = filterDataDynamic(document.getElementById('searchStandardUnitMarking').value,"marking",filteredNominalValue);

                for (let x = 0; x < filteredMarking.length; x++) {
                    
                    var tr = document.createElement("tr");
                    var td = document.createElement("td");
                    var idForButton = e+"(SPLIT)"+filteredMarking[x].id+"(SPLIT)"+filteredMarking[x].marking;
                    var button = useButtonState(idForButton);
                    
                    tr.appendChild(addNewTD(filteredMarking[x].nominalValue));
                    tr.appendChild(addNewTD(filteredMarking[x].nominalUnit));
                    tr.appendChild(addNewTD(filteredMarking[x].serialNumber));
                    tr.appendChild(addNewTD(filteredMarking[x].marking));
                    tr.appendChild(addNewTD(filteredMarking[x].conventionalMass));
                    tr.appendChild(addNewTD(filteredMarking[x].unit));
                    tr.appendChild(addNewTD(filteredMarking[x].uncertainty));
                    td.appendChild(button);
                    tr.appendChild(td);
                    tbody.appendChild(tr);
                }
            }
		} catch (e) {
			alert(e);
		}
    }

    function getValuesFromSelectedStandard(selected,convenMassID,uncertID,standardUsedID){
        var testPointSplitted = '';
        var testPointMarks = '';
        var addedConventionalMassToFloat = 0;
        var addedUncertaintyToFloat = 0;
        for (let x = 0; x < selected.length; x++) {
            var testPointMarkings = selected[x].split("(SPLIT)");
            testPointSplitted += testPointMarkings[1]+"(SPLIT)";
        } 
        for (let x = 0; x < selected.length; x++) {
            var testPointMarkings = selected[x].split("(SPLIT)");
            testPointMarks += testPointMarkings[2]+" + ";
        }
        var testPointIDS = testPointSplitted.split("(SPLIT)");
        for (let x = 0; x < testPointIDS.length - 1; x++) {
            var allValue = filterDataDynamic(testPointIDS[x], 'id', standardArrayValues);
            addedConventionalMassToFloat += parseFloat(allValue[0].conventionalMass);
            addedUncertaintyToFloat += parseFloat(allValue[0].uncertainty);
        }        

        document.getElementById(convenMassID).value = addedConventionalMassToFloat;
        document.getElementById(uncertID).value = addedUncertaintyToFloat;
        document.getElementById(standardUsedID).value = testPointMarks;
        console.log('addedConventionalMassToFloat ', addedConventionalMassToFloat)
        console.log('addedUncertaintyToFloat ', addedUncertaintyToFloat)
        console.log('testPointMarks ', testPointMarks)
    }

    function linearityTestGetRowNumber(row){
        lineraityTestSelectedRow = row.dataset.rownumber;
    }

    function calculate(){
        var sumOflinearityTestUN = 0;
        var calculatedArray = {"calculated":{}};

        
        for (let x = 1; x <= linearityTestNumberOfRow; x++) {
            var uncertainty = document.getElementById('UncertaintyRow'+x).value;
            sumOflinearityTestUN += linearityTestUN(uncertainty, kForFormula);
        }

        var uncertaintyReferenceWeightCalculated = uncertaintyReferenceWeights(sumOflinearityTestUN);
        var uncertaintyReferenceWeightsSensitivityTestCalculated = uncertaintyReferenceWeightsSensitivityTest();
        var uncertaintySDSensitivityTestCalculated = uncertaintySDSensitivityTest();
        var uncertaintySensitivityCalculated = uncertaintySensitivity(uncertaintyReferenceWeightsSensitivityTestCalculated,uncertaintySDSensitivityTestCalculated)
        var uncertaintyReadabilityCalculated = uncertaintyReadability();
        var uncertaintyEccenticityCalculated = uncertaintyEccenticity();
        var uncertaintyBalanceCalculated = uncertaintyBalance(uncertaintySensitivityCalculated, uncertaintyReadabilityCalculated, uncertaintyEccenticityCalculated);
        var uncertaintyRepeatabilityCalculated = uncertaintyRepeatability();
        var combinedUncertaintyCalculated = combinedUncertainty(uncertaintyReferenceWeightCalculated, uncertaintyBalanceCalculated, uncertaintyRepeatabilityCalculated);
        var expandedUncertaintyCalculated = expandedUncertainty(combinedUncertaintyCalculated);

        calculatedArray.calculated["uncertaintyReferenceWeightCalculated"] = uncertaintyReferenceWeightCalculated;
        calculatedArray.calculated["uncertaintyReferenceWeightsSensitivityTestCalculated"] = uncertaintyReferenceWeightsSensitivityTestCalculated;
        calculatedArray.calculated["uncertaintySDSensitivityTestCalculated"] = uncertaintySDSensitivityTestCalculated;
        calculatedArray.calculated["uncertaintySensitivityCalculated"] = uncertaintySensitivityCalculated;
        calculatedArray.calculated["uncertaintyReadabilityCalculated"] = uncertaintyReadabilityCalculated;
        calculatedArray.calculated["uncertaintyEccenticityCalculated"] = uncertaintyEccenticityCalculated;
        calculatedArray.calculated["uncertaintyBalanceCalculated"] = uncertaintyBalanceCalculated;
        calculatedArray.calculated["uncertaintyRepeatabilityCalculated"] = uncertaintyRepeatabilityCalculated;
        calculatedArray.calculated["combinedUncertaintyCalculated"] = combinedUncertaintyCalculated;
        calculatedArray.calculated["expandedUncertaintyCalculated"] = expandedUncertaintyCalculated;

        // console.log('uncertaintyReferenceWeights', uncertaintyReferenceWeightCalculated);
        // console.log('uncertaintyReferenceWeightsSensitivityTestCalculated', uncertaintyReferenceWeightsSensitivityTestCalculated);
        // console.log('uncertaintySDSensitivityTestCalculated', uncertaintySDSensitivityTestCalculated);
        // console.log('uncertaintySensitivityCalculated', uncertaintySensitivityCalculated);
        // console.log('uncertaintyReadabilityCalculated', uncertaintyReadabilityCalculated);    
        // console.log('uncertaintyEccenticityCalculated', uncertaintyEccenticityCalculated); 
        // console.log('uncertaintyBalanceCalculated', uncertaintyBalanceCalculated);   
        // console.log('uncertaintyRepeatabilityCalculated', uncertaintyRepeatabilityCalculated);     
        // console.log('combinedUncertaintyCalculated', combinedUncertaintyCalculated);   
        // console.log('expandedUncertaintyCalculated', expandedUncertaintyCalculated);  

        return calculatedArray;   
    }

    function getInputtedValuesFromSpecifications(){
        var equipmentDescription = document.getElementById('equipmentDescription');
        var manufacturer = document.getElementById('manufacturer');
        var modelNumber = document.getElementById('modelNumber');
        var serialNumber = document.getElementById('serialNumber');
        var equipmentNumber = document.getElementById('equipmentNumber');
        var maxCapacity = document.getElementById('maxCapacity');
        var maxCapacityMeasurement = document.getElementById('maxCapacityMeasurement');
        var readability = document.getElementById('readability');
        var readabilityUnit = document.getElementById('readabilityUnit');
        var readabilityX = document.getElementById('readabilityX');
        var e = document.getElementById('e');
        var equipmentRemarks = document.getElementById('equipmentRemarks');

        var specificationsArray = {"specifications":{}};

        specificationsArray.specifications["equipmentDescription"] = equipmentDescription.value;
        specificationsArray.specifications["manufacturer"] = manufacturer.value;
        specificationsArray.specifications["modelNumber"] = modelNumber.value;
        specificationsArray.specifications["serialNumber"] = serialNumber.value;
        specificationsArray.specifications["equipmentNumber"] = equipmentNumber.value;
        specificationsArray.specifications["maxCapacity"] = maxCapacity.value;
        specificationsArray.specifications["maxCapacityMeasurement"] = maxCapacityMeasurement.value;
        specificationsArray.specifications["readability"] = readability.value;
        specificationsArray.specifications["readabilityUnit"] = readabilityUnit.value;
        specificationsArray.specifications["readabilityX"] = readabilityX.value;
        specificationsArray.specifications["e"] = e.value;
        specificationsArray.specifications["equipmentRemarks"] = equipmentRemarks.value;

        return specificationsArray;
    }

    function getInputtedValuesFromEnvironment(){
        var startTemp = document.getElementById('startTemp');
        var endTemp = document.getElementById('endTemp');
        var averageTemp = document.getElementById('averageTemp');
        var startRH = document.getElementById('startRH');
        var endRH = document.getElementById('endRH');
        var averageRH = document.getElementById('averageRH');

        var environmentArray = {"environment":{}};

        environmentArray.environment["startTemp"] = startTemp.value;
        environmentArray.environment["endTemp"] = endTemp.value;
        environmentArray.environment["averageTemp"] = averageTemp.value;
        environmentArray.environment["startRH"] = startRH.value;
        environmentArray.environment["endRH"] = endRH.value;
        environmentArray.environment["averageRH"] = averageRH.value;

        return environmentArray;
    }

    function getInputtedValuesFromSpanCalibration(){
        var spanCalibrationTable = document.getElementById('spanCalibrationTable');
        var spanTableArray = {"spanCalibrationTable":{}};
		var inputs = spanCalibrationTable.getElementsByTagName('input');
		var selects = spanCalibrationTable.getElementsByTagName('select'); 

        spanTableArray.spanCalibrationTable["spanBeforeUnit"] = selects["spanBeforeUnit"].value;
        spanTableArray.spanCalibrationTable["spanAfterUnit"] = selects["spanAfterUnit"].value;
        spanTableArray.spanCalibrationTable["datas"] = {};

        for (let item of inputs) {
            spanTableArray.spanCalibrationTable.datas[item.id] = item.value;
        }

        return spanTableArray;
    }

    function getInputtedValuesFromSensitivityTest(){
        var sensitivityReferenceWeight = document.getElementById('sensitivityReferenceWeight');
        var sensitivityNominalValue = document.getElementById('sensitivityNominalValue');
        var sensitivityNominalUnit = document.getElementById('sensitivityNominalUnit');
        var sensitivityMarking = document.getElementById('sensitivityMarking');
        var sensitivityCM = document.getElementById('sensitivityCM');
        var sensitivityCMUnit = document.getElementById('sensitivityCMUnit');
        var sensitivityU = document.getElementById('sensitivityU');
        var sensitivityUUnit = document.getElementById('sensitivityUUnit');

        var sensitivityTable = document.getElementById('sensitivityTable');
        var sensitivityTableArray = {"sensitivityTable":{}};
		var inputs = sensitivityTable.getElementsByTagName('input');
		var selects = sensitivityTable.getElementsByTagName('select'); 

        sensitivityTableArray.sensitivityTable["sensitivityReferenceWeight"] = sensitivityReferenceWeight.value;
        sensitivityTableArray.sensitivityTable["sensitivityNominalValue"] = sensitivityNominalValue.value;
        sensitivityTableArray.sensitivityTable["sensitivityNominalUnit"] = sensitivityNominalUnit.value;
        sensitivityTableArray.sensitivityTable["sensitivityMarking"] = sensitivityMarking.value;
        sensitivityTableArray.sensitivityTable["sensitivityCM"] = sensitivityCM.value;
        sensitivityTableArray.sensitivityTable["sensitivityCMUnit"] = sensitivityCMUnit.value;
        sensitivityTableArray.sensitivityTable["sensitivityU"] = sensitivityU.value;
        sensitivityTableArray.sensitivityTable["sensitivityUUnit"] = sensitivityUUnit.value;
        sensitivityTableArray.sensitivityTable["sensitivityEmptyUnit"] = selects["sensitivityEmptyUnit"].value;
        sensitivityTableArray.sensitivityTable["sensitivityMaxUnit"] = selects["sensitivityMaxUnit"].value;
        sensitivityTableArray.sensitivityTable["sensitivityMaxNominalValue"] = inputs["sensitivityMaxNominalValue"].value;
        sensitivityTableArray.sensitivityTable["datas"] = {};

        for (let item of inputs) {
            if(item.id == 'sensitivityMaxNominalValue'){continue;}
            sensitivityTableArray.sensitivityTable.datas[item.id] = item.value;
        }

        return sensitivityTableArray;
    }
    
    function getInputtedValuesFromEccentricityTest(){
        var eccentricityTable = document.getElementById('eccentricityTable');
        var eccentricityTableArray = {"eccentricityTable":{}};
		var inputs = eccentricityTable.getElementsByTagName('input');
		var selects = eccentricityTable.getElementsByTagName('select'); 

        eccentricityTableArray.eccentricityTable["eccentricityIndicationUnit"] = selects["eccentricityIndicationUnit"].value;
        eccentricityTableArray.eccentricityTable["eccentricityErrorUnit"] = selects["eccentricityErrorUnit"].value;
        eccentricityTableArray.eccentricityTable["datas"] = {};

        for (let item of inputs) {
            eccentricityTableArray.eccentricityTable.datas[item.id] = item.value;
        }

        return eccentricityTableArray;
    }

    function getInputtedValuesFromLinearityTest(){
        var linearityTestTable = document.getElementById('linearityTestTable');
        var linearityTestTableArray = {"linearityTestTable":{}};
		var inputs = linearityTestTable.getElementsByTagName('input');
		var selects = linearityTestTable.getElementsByTagName('select'); 

        linearityTestTableArray.linearityTestTable["linearityNominalValueUnit"] = selects["linearityNominalValueUnit"].value;
        linearityTestTableArray.linearityTestTable["linearityIndicationUnit"] = selects["linearityIndicationUnit"].value;
        linearityTestTableArray.linearityTestTable["linearityConventionalMassUnit"] = selects["linearityConventionalMassUnit"].value;
        linearityTestTableArray.linearityTestTable["datas"] = {};

        for (let item of inputs) {
            linearityTestTableArray.linearityTestTable.datas[item.id] = item.value;
        }

        return linearityTestTableArray;
    } 

    function getInputtedValuesFromRepeatabilityTest(){
        var repeatabilityTable = document.getElementById('repeatabilityTable');
        var repeatabilityTableArray = {"repeatabilityTable":{}};
		var inputs = repeatabilityTable.getElementsByTagName('input');
		var selects = repeatabilityTable.getElementsByTagName('select'); 

        repeatabilityTableArray.repeatabilityTable["repeatabilityIndicationUnit"] = selects["repeatabilityIndicationUnit"].value;
        repeatabilityTableArray.repeatabilityTable["repeatabilityIndicationUnit2"] = selects["repeatabilityIndicationUnit2"].value;
        repeatabilityTableArray.repeatabilityTable["repeatabilitySUnit"] = selects["repeatabilitySUnit"].value;
        repeatabilityTableArray.repeatabilityTable["datas"] = {};

        for (let item of inputs) {
            repeatabilityTableArray.repeatabilityTable.datas[item.id] = item.value;
        }

        return repeatabilityTableArray;
    } 

    function storeToHiddens(){
        var specificationsArray = document.getElementById('specificationsArray');
        var environmentArray = document.getElementById('environmentArray');
        var spanTableArray = document.getElementById('spanTableArray');
        var sensitivityTableArray = document.getElementById('sensitivityTableArray');
        var eccentricityTableArray = document.getElementById('eccentricityTableArray');
        var linearityTestTableArray = document.getElementById('linearityTestTableArray');
        var repeatabilityTableArray = document.getElementById('repeatabilityTableArray');
        var calculatedValues = document.getElementById('calculatedValues');

        specificationsArray.value = JSON.stringify(getInputtedValuesFromSpecifications());
        environmentArray.value = JSON.stringify(getInputtedValuesFromEnvironment());
        spanTableArray.value = JSON.stringify(getInputtedValuesFromSpanCalibration());
        sensitivityTableArray.value = JSON.stringify(getInputtedValuesFromSensitivityTest());
        eccentricityTableArray.value = JSON.stringify(getInputtedValuesFromEccentricityTest());
        linearityTestTableArray.value = JSON.stringify(getInputtedValuesFromLinearityTest());
        repeatabilityTableArray.value = JSON.stringify(getInputtedValuesFromRepeatabilityTest());
        calculatedValues.value = JSON.stringify(calculate());
    }
    
    //Utilities

    var loadFile = function(event) {
		var output = document.getElementById('output');
		output.src = URL.createObjectURL(event.target.files[0]);
		output.onload = function() {
			URL.revokeObjectURL(output.src) // free memory
		}
	};

    function setDate() {
		let d = new Date(document.getElementById("sDate").value)
		let mon = +document.getElementById("mon").value;
		d.setMonth(d.getMonth()+mon)
		document.getElementById("eDate").valueAsDate = d;
	}

    function saveOnly(idOfForm){
		document.getElementById('completion').value = "Not Completed";
		try {
			storeToHiddens();
			document.getElementById(idOfForm).submit();
		} catch (error) {
			console.log(error)
			alert('Unable to Calculate \n'+error.message);
		}
		
		
	}

	function submitForm(idOfForm){
		document.getElementById('completion').value = "Pending";
		try {
			storeToHiddens();
			document.getElementById(idOfForm).submit();
		} catch (error) {
			console.log(error);
			alert('Unable to Calculate \n'+error.message);
		}
		
	}

    function copyValue(copyFrom,copyTo){
        var from = document.getElementById(copyFrom);
        var to = document.getElementById(copyTo);
        to.value = from.value
    }

    function copyFromDataset(copyFrom, copyTo, datasetName){
        var from = document.getElementById(copyFrom);
        var to = document.getElementById(copyTo);
        to.value = from.selectedOptions[0].dataset[datasetName];
    }

    function filterDataDynamic(searchingFor, searchIn, UnfilteredArray){
		let filteredDATA = UnfilteredArray.filter(function (e) {
		if (searchingFor != '' ) {
			return e[searchIn] == searchingFor;
			}else{
                return e[searchIn] != searchingFor;
            }
		});
		return filteredDATA;
	}

    function checkCertNum(){
		var search = document.getElementById('certificateNumber').value;
		var certNum = document.getElementById('certificateNumber');
		$.ajax({
			cache: false,
			type: "post",
			url: "<?= base_url('WeighingScaleController/checkCertNum')?>",
			data: {'q': search},
			success:function(result){
				if(result == 'true'){
					certNum.setAttribute('style','background-color:rgba(255,0,0,0.5)')
				}else{
					certNum.setAttribute('style','background-color:rgba(0,255,0,0.5)')
				}
				window.setTimeout(checkCertNum, 5000);
			},
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
		bind('startTemp','input',function(){
            document.getElementById('averageTemp').value = average([document.getElementById('startTemp').value,document.getElementById('endTemp').value])
        });
        bind('endTemp','input',function(){
            document.getElementById('averageTemp').value = average([document.getElementById('startTemp').value,document.getElementById('endTemp').value])
        });
        bind('startRH','input',function(){
            document.getElementById('averageRH').value = average([document.getElementById('startRH').value,document.getElementById('endRH').value])
        });
        bind('endRH','input',function(){
            document.getElementById('averageRH').value = average([document.getElementById('startRH').value,document.getElementById('endRH').value])
        });


        bind('spanBeforeUnit','change',function(){
            copyValue('spanBeforeUnit','spanAfterUnit')
        });
        bind('sensitivityEmptyUnit','change',function(){
            copyValue('sensitivityEmptyUnit','sensitivityMaxUnit')
        });
        bind('eccentricityIndicationUnit','change',function(){
            copyValue('eccentricityIndicationUnit','eccentricityErrorUnit')
        });
        bind('repeatabilityIndicationUnit','change',function(){
            copyValue('repeatabilityIndicationUnit','repeatabilityIndicationUnit2');
            copyValue('repeatabilityIndicationUnit','repeatabilitySUnit')
        });
        bind('sDate','change',function(){
            setDate()
        });
        bind('mon','change',function(){
            setDate()
        });
        bind('verifierList','change',function(){
            copyFromDataset('verifierList', 'verifierPositionList', 'verifierposition')
        });
        bind('verifierPositionList','change',function(){
            copyFromDataset('verifierPositionList', 'verifierList', 'verifiername')
        });


        bind('standardModalSelect','click',function(){
            getWeight();
            addRowToTestWeightSelectModal('testWeightSelectHead','testWeightSelectBody');
        });
        bind('linearityTestAddButton','click',function(){
            addRow('linearityTestTableBody')
        }); 
        bind('linearityTestDeleteButton','click',function(){
            deleteRow('linearityTestTableBody')
        }); 
        bind('generateDataButton','click',function(){
            storeToHiddens();
            submitForm('weighingScaleForm');
        }); 


        for (let i = 1; i <= 5; i++) {
            bind('sensitivityEmptyTrial'+i,'input',function(){
                document.getElementById('sensitivityEmptyStandardDev').value = convertUnit(stdDev([
                document.getElementById('sensitivityEmptyTrial1').value,
                document.getElementById('sensitivityEmptyTrial2').value,
                document.getElementById('sensitivityEmptyTrial3').value,
                document.getElementById('sensitivityEmptyTrial4').value,
                document.getElementById('sensitivityEmptyTrial5').value]),
                'g',document.getElementById('sensitivityEmptyUnit').value)
            });
            bind('sensitivityMaxTrial'+i,'input',function(){
                document.getElementById('sensitivityMaxStandardDev').value = convertUnit(stdDev([
                document.getElementById('sensitivityMaxTrial1').value,
                document.getElementById('sensitivityMaxTrial2').value,
                document.getElementById('sensitivityMaxTrial3').value,
                document.getElementById('sensitivityMaxTrial4').value,
                document.getElementById('sensitivityMaxTrial5').value]),
                'g',document.getElementById('sensitivityMaxUnit').value)
            });
        }

        for (let i = 2; i <= 5; i++) {
            bind('eccentricityIndicationPosition'+i,'input',function(){
                for (let x = 2; x <=5 ; x++) {
                    document.getElementById('eccentricityErrorPosition'+x).value = (document.getElementById('eccentricityIndicationPosition'+x).value) - (average([document.getElementById('eccentricityIndicationPosition1Start').value,document.getElementById('eccentricityIndicationPosition1End').value]))
                }
                document.getElementById('eccentricityErrorPosition1End').value = (document.getElementById('eccentricityIndicationPosition1End').value) - (average([document.getElementById('eccentricityIndicationPosition1Start').value,document.getElementById('eccentricityIndicationPosition1End').value]))
            });
            if(i==5){
                bind('eccentricityIndicationPosition1Start','input',function(){
                    for (let x = 2; x <=5 ; x++) {
                        document.getElementById('eccentricityErrorPosition'+x).value = (document.getElementById('eccentricityIndicationPosition'+x).value) - (average([document.getElementById('eccentricityIndicationPosition1Start').value,document.getElementById('eccentricityIndicationPosition1End').value]))
                    }
                    document.getElementById('eccentricityErrorPosition1End').value = (document.getElementById('eccentricityIndicationPosition1End').value) - (average([document.getElementById('eccentricityIndicationPosition1Start').value,document.getElementById('eccentricityIndicationPosition1End').value]))
                });
                bind('eccentricityIndicationPosition1End','input',function(){
                    for (let x = 2; x <=5 ; x++) {
                        document.getElementById('eccentricityErrorPosition'+x).value = (document.getElementById('eccentricityIndicationPosition'+x).value) - (average([document.getElementById('eccentricityIndicationPosition1Start').value,document.getElementById('eccentricityIndicationPosition1End').value]))
                    }
                    document.getElementById('eccentricityErrorPosition1End').value = (document.getElementById('eccentricityIndicationPosition1End').value) - (average([document.getElementById('eccentricityIndicationPosition1Start').value,document.getElementById('eccentricityIndicationPosition1End').value]))
                });
            }
        }

        for (let i = 1; i <= 10; i++) {
            bind('repeatabilityTrial'+i,'input',function(){
                document.getElementById('repeatabilitySD').value = 
                stdDev([
                    document.getElementById('repeatabilityTrial1').value,
                    document.getElementById('repeatabilityTrial2').value,
                    document.getElementById('repeatabilityTrial3').value,
                    document.getElementById('repeatabilityTrial4').value,
                    document.getElementById('repeatabilityTrial5').value,
                    document.getElementById('repeatabilityTrial6').value,
                    document.getElementById('repeatabilityTrial7').value,
                    document.getElementById('repeatabilityTrial8').value,
                    document.getElementById('repeatabilityTrial9').value,
                    document.getElementById('repeatabilityTrial10').value,
                ])
            });
        }
	}

	bindEventsToInputAndButtons();
</script>
<script src="/js/module4Formulas.js"></script>
<script src="/dashboardAsset/lib/jquery/jquery.min.js"></script>
<script src="/dashboardAsset/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/dashboardAsset/lib/feathericons/feather.min.js"></script>
<script src="/dashboardAsset/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/dashboardAsset/assets/js/script.js"></script>
</body>
</html>

