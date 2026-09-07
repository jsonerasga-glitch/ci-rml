<?php
    use App\Models\ElectModel_3;
    use App\Models\ElectModel_2;
    use App\Models\CustomersModel;

    $standardDetails = new ElectModel_2();
	$standardValues = new ElectModel_3();

	$arrStandardDetails[] = $standardDetails->findAll(); 
	$arrStandardValues[] = $standardValues->findAll(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RML ++</title>
    <link href="/dashboardAsset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/dashboardAsset/lib/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link href="/dashboardAsset/assets/css/style.min.css" rel="stylesheet">
    <style>
        .label {
            color:black;
            font-weight:bold;
        }
        .automatic {
            background-color:#F1C40F!important;
        }
    </style>
</head>
<body class="skin-base animate">
    <?php
		$data = [
			'active' => 'worksheet3',
			'show' => 'worksheet',
		];
		echo view('layouts/sidebarAdmin',$data)
    ?>
    <main class="content">
        <div class="card m-5">
            <div class="card-body">
            <form method="post" id="weighingScaleForm" enctype="multipart/form-data">
                <div class="card m-2 border-light">
                    <div class="card-header text-white bg-primary">
                        <h3 class="card-title d-flex justify-content-center">Customer information</h3>
                    </div>

                    <input type="hidden" name="idOfCertificate" id="idOfCertificate" value="<?= $id;?>">
                    <input type="hidden" name="standardUsed" id="standardUsed">
                    <input type="hidden" name="specificationsArray" id="specificationsArray">
                    <input type="hidden" name="environmentArray" id="environmentArray">
                    <input type="hidden" name="spanTableArray" id="spanTableArray">
                    <input type="hidden" name="sensitivityTableArray" id="sensitivityTableArray">
                    <input type="hidden" name="eccentricityTableArray" id="eccentricityTableArray">
                    <input type="hidden" name="linearityTestTableArray" id="linearityTestTableArray">
                    <input type="hidden" name="repeatabilityTableArray" id="repeatabilityTableArray">
                    <input type="hidden" name="calculatedValues" id="calculatedValues">
                    <input type="hidden" name="calculatedData" id="calculatedData">
                    <input type="hidden" name="completion" id="completion">

                    <div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)">
                        <div class="row ">
                            <div class="col">        
                                <div class="mb-2">
                                    <label class="">Customer</label>
                                    <!-- <input name='customer' id="customer" data-group="customer_information" type="text" class="form-control " tabindex='2'> -->
                                    <input name='customer' id="customer" data-group="customer_information" list='customerList' required type="text" class="form-control mt-n2 text-break" onchange="getCustomerDetails()">
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
                                </div>
                                <div class="mb-2">
                                    <label class="">Address</label>
                                    <input name='address' id="address" data-group="customer_information" type="text" class="form-control" style="height:130px" tabindex="3">
                                </div>
                            </div>
                            <div class="col">        
                                <div class="mb-2">
                                    <label class="">TSR Number:</label>
                                    <input name='tsrNumber' id="tsrNumber" data-group="customer_information" type="text" class="form-control" tabindex="3.1">
                                </div>                    
                                <div class="mb-3">
                                    <label>Date Received</label>
                                    <input name='dateReceived' id="dateReceived" data-group="customer_information" type="date" class="form-control mt-n2" tabindex="4">
                                </div>
                                
                                <div class="row mb-3">
									<div class="col-5">
										<label>Recommended Due Date</label>
										<select id="mon" class="form-control mt-n1" style="height: 50px;" data-group="customer_information">
											<option value="">N/A</option>
											<option value="6">6 Months</option>
											<option value="12">1 Year</option>
											<option value="24">2 Years</option>
										</select>
									</div>
									<div class="col mt-4">
										<input name='recommendedDueDate' id="eDate" data-group="customer_information" type="date" class="form-control text-break" tabindex="6">
									</div>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card m-2 border-light">
                    <div class="card-header text-white bg-primary">
                        <h3 class="card-title d-flex justify-content-center">Equipment information</h3>
                    </div>
                    <div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)">
                        <div class="row ">
                            <div class="col">       
                                <div class="mb-3">
                                    <label>Date calibrated</label>
                                    <input name='dateCalibrated' id="sDate"  data-group="equipment_information" type="date" class="form-control mt-n2" tabindex="5">
                                </div> 
                                <div class="mb-2">
                                    <label class="">Calibration Certificate Number</label>
                                    <input name='certificateNumber' id="certificateNumber"  data-group="equipment_information" type="text" class="form-control " tabindex='1'>
                                </div>
                                <div class="mb-2">
                                    <label class="">Description</label>
                                    <input name='equipmentDescription' id="equipmentDescription"  data-group="equipment_information" type="text" class="form-control " tabindex='8'>
                                </div>                    
                                <div class="mb-2">
                                    <label class="">Manufacturer/Brand/Make</label>
                                    <input name='manufacturer' id="manufacturer"  data-group="equipment_information" type="text" class="form-control " tabindex='9'>
                                </div>
                                <div class="mb-2">
                                    <label class="">Model</label>
                                    <input name='modelNumber' id="modelNumber"  data-group="equipment_information" type="text" class="form-control" style="" tabindex="10">
                                </div>
                                <div class="mb-2">
                                    <label class="">Serial Number</label>
                                    <input name='serialNumber' id="serialNumber"  data-group="equipment_information" type="text" class="form-control" style="" tabindex="11">
                                </div>
                                <div class="">
                                    <label class="">Equipment ID (Optional)</label>
                                    <input name='equipmentNumber' id="equipmentNumber"  data-group="equipment_information" type="text" class="form-control" style="" tabindex="12">
                                </div>
                            </div>
                            <div class="col my-auto"> 
                              
                                <div class=" mb-3">
									<label>Place of Calibration</label> <br>
									<select class="form-control" name="placeOfCalibration" id="placeOfCalibration"  data-group="equipment_information" tabindex="7">
										<option class="non" value="Mass Laboratory">Mass Laboratory</option>
										<option class="non" value="On site">On site</option>
										<option class="editable" value="">Type here..</option>
									</select>
									<input class="editOption form-control" id="onSite"  data-group="equipment_information" style="display:none;  width: 90%; position: relative; top: -38px"></input>
								
								</div>
                                <div class='col '>
								    <label>Maximum Capacity</label>
								    <div class="mb-2">
									    
                                        <div class="input-group">
                                            <input name='maxCapacity' id='maxCapacity'  type="text" class="form-control" data-group="equipment_information">
                                            <select name='maxCapacityMeasurement' id='maxCapacityMeasurement'  class="form-select btn-outline-secondary" data-group="equipment_information">
                                                <option selected>Choose. . .</option>
                                                <option value="mg">mg</option>
                                                <option value="g">g</option>
                                                <option value="kg">kg</option>
                                            </select>
                                        </div>
								    </div>
								    <label>Readability</label>
                                    <div class=" mb-2">
                                        <div class="input-group">
                                            <input name='readability' id='readability'  type="text" class="form-control" data-group="equipment_information">
                                            <select name='readabilityUnit' id='readabilityUnit'  class="form-control btn-outline-secondary " data-group="equipment_information">
                                                <option selected>Choose. . .</option>
                                                <option value="mg">mg</option>
                                                <option value="g">g</option>
                                                <option value="kg">kg</option>
                                            </select>
                                            <span class="input-group-text">x</span>
                                            <select name='readabilityX' id='readabilityX'  class="form-control btn-outline-secondary " data-group="equipment_information">
                                                <option selected>Choose. . .</option>
                                                <option value="0.5">1/2</option>
                                                <option value="0.2">1/5</option>
                                                <option value="0.1">1/10</option>
                                            </select>
                                        </div>
                                    </div>
								    <label>e</label>
                                    <div class="input-group mb-3">
                                        <input name='e' id='e'  type="text" class="form-control " data-group="equipment_information">
                                    </div>
                                    <label>Remarks</label>
                                    <div class="input-group mb-3">
                                        <input name='equipmentRemarks' id='equipmentRemarks'  type="text" class="form-control " data-group="equipment_information">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label class="label" for="illustrationTable">Illustration</label>
                            <table class='table table-hover mb-0 text-center' id="illustrationTable"></table>
                            <div class='row '>
                                <div class="form-check col d-flex justify-content-center mb-2">
                                    <div class="input-group-prepend">
                                        <input class="form-check-input me-3" type="radio" value="A" id="illusA" name="illustration" data-group="raw_data">
                                    </div>	
                                    <label class="form-check-label" for="illusA">
                                        <img src="/image/weighingScaleSquare.png" alt="DOST LOGO" height='90px' > 
                                    </label>
                                </div>
                                <div class="form-check col d-flex justify-content-center">
                                    <div class="input-group-prepend">
                                        <input class="form-check-input me-3" type="radio" value="B" id="illusB" name="illustration" data-group="raw_data">
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
                        </div>
                    </div>
                </div>
                <div class="card m-2 border-light">
                    <div class="card-header text-white bg-primary">
                        <div class="row">
                            <div class="mx-auto d-flex justify-content-center">
                                <h3>Environmental Condition</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)">
                        <div class='row'>
                            <div class="col">
                                <div class="row">
                                    <div class="">
                                        <label>Start:</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="">
                                        <label>Ambient Temperature:</label>
                                        <input  name='tempStart' id='tempStart' data-group="environmental_information" type="text" class="form-control  mt-n2 " />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="">
                                        <label>Relative Humidity:</label>
                                        <input name='rhStart' id='rhStart' data-group="environmental_information" type="text" class="form-control  mt-n2 " />
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Atmosperic Pressure (Optional)</label>
                                    <div class="input-group">
                                        <input  name='startAtmPressure' id='startAtmPressure' data-group="environmental_information" type="text" class="form-control  mt-n2 " />
                                        <select name="pAmbUnit" id="pAmbUnit" data-group="environmental_information" class="">
                                            <option>atm</option>
                                            <option selected>bar</option>
                                            <option>kPa</option>
                                            <option>psi</option>
                                            <option>mmHG</option>
                                            <option>Mpa</option>
                                            <option>kg/cm2</option>
                                            <option>inHg</option>
                                            <option>inH₂O</option>
                                            <option>mH₂O</option>
                                            <option>mmH₂O</option>
                                            <option>mbar</option>
                                            <option>Pa</option>
                                        </select>
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
                                    <div class="">
                                        <label>Ambient Temperature:</label>
                                        <input  name='tempEnd' id='tempEnd' data-group="environmental_information" type="text" class="form-control  mt-n2 "  oninput="getAverageOfEnvironment('tempStart', 'tempEnd', 'tempAmb')"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="">
                                        <label>Relative Humidity:</label>
                                        <input  name='rhEnd' id='rhEnd' data-group="environmental_information" type="text" class="form-control  mt-n2 "  oninput="getAverageOfEnvironment('rhStart', 'rhEnd', 'rhAmb')"/>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <label>Atmosperic Pressure (Optional)</label>
                                    <div class="input-group">
                                        <input name='endAtmPressure' id='endtAtmPressure' data-group="environmental_information" type="text" class="form-control  mt-n2 " oninput="getAverageOfEnvironment('rhSstartAtmPressuretart', 'endAtmPressure', 'pAmb')"/>
                                        <select name="" id="" class="">
                                            <option>atm</option>
                                            <option selected>bar</option>
                                            <option>kPa</option>
                                            <option>psi</option>
                                            <option>mmHG</option>
                                            <option>Mpa</option>
                                            <option>kg/cm2</option>
                                            <option>inHg</option>
                                            <option>inH₂O</option>
                                            <option>mH₂O</option>
                                            <option>mmH₂O</option>
                                            <option>mbar</option>
                                            <option>Pa</option>
                                        </select>
                                    </div>
                                </div>

                                <input type="hidden" name="tempAmb" id="tempAmb" data-group="environmental_information" value='22'>
                                <input type="hidden" name="rhAmb" id="rhAmb" data-group="environmental_information" value='66'>
                                <input type="hidden" name="pAmb" id="pAmb" data-group="environmental_information" value='0.1005'>

                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="card m-2 border-light">
                    <div class="card-header text-white bg-primary">
                        <div class="row">
                            <div class="mx-auto d-flex justify-content-center">
                                <h3>Standard</h3>
                            </div>
                        </div> 
                    </div>
                    <div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)"> 
                        <div class="row">
                            <div class="mx-auto d-flex justify-content-center">   		
                                <button type="button" class="btn btn-danger float-end btn-lg" style="right:0;top:0;" data-toggle="modal" data-target="#standardModal">
                                    Select Reference Weight
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card m-2 border-light">
                    <div class="card-header text-white bg-primary">
                        <h3 class="card-title mx-auto d-flex justify-content-center">Raw Data</h3> 
                    </div>
                    <div class="card-body table-responsive text-white" style="background-color:rgba(13, 110, 253, 0.36)">
                        
                        <div>
                            <label class="label" for="spanCalibrationTable">Span Calibration</label>
                            <table class='table table-hover table-striped table-bordered  mb-0 text-center' id="spanCalibrationTable">
                                <thead>
                                    <tr>
                                        <th>Load</th>
                                        <th>Trial</th>
                                        <th>
                                            Before adjustment 
                                            <select name='spanBeforeUnit' id="spanBeforeUnit" class="" data-group="raw_data">
                                                <option value="mg">mg</option>
                                                <option value="g" selected>g</option>
                                                <option value="kg">kg</option>
                                            </select>
                                        </th>
                                        <th>
                                            After adjustment
                                            <select name='spanAfterUnit' id='spanAfterUnit' class="" data-group="raw_data">
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
                                                <input type="text" name="spanBefore1" id="spanBefore1" class="form-control bg-transparent border-0" data-group="raw_data">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanAfter1" id="spanAfter1" class="form-control bg-transparent border-0" data-group="raw_data">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanBefore3" id="spanBefore3" class="form-control bg-transparent border-0" data-group="raw_data">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanAfter3" id="spanAfter3" class="form-control bg-transparent border-0" data-group="raw_data">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanBefore5" id="spanBefore5" class="form-control bg-transparent border-0" data-group="raw_data">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanAfter5" id="spanAfter5" class="form-control bg-transparent border-0" data-group="raw_data">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanBefore7" id="spanBefore7" class="form-control bg-transparent border-0" data-group="raw_data">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanAfter7" id="spanAfter7" class="form-control bg-transparent border-0" data-group="raw_data">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanBefore9" id="spanBefore9" class="form-control bg-transparent border-0" data-group="raw_data">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanAfter9" id="spanAfter9" class="form-control bg-transparent border-0" data-group="raw_data">
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
                                                <input type="text" name="spanBefore2" id="spanBefore2" class="form-control bg-transparent border-0" data-group="raw_data">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanAfter2" id="spanAfter2" class="form-control bg-transparent border-0" data-group="raw_data">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanBefore4" id="spanBefore4" class="form-control bg-transparent border-0" data-group="raw_data">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanAfter4" id="spanAfter4" class="form-control bg-transparent border-0" data-group="raw_data">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanBefore6" id="spanBefore6" class="form-control bg-transparent border-0" data-group="raw_data">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanAfter6" id="spanAfter6" class="form-control bg-transparent border-0" data-group="raw_data">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanBefore8" id="spanBefore8" class="form-control bg-transparent border-0" data-group="raw_data">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanAfter8" id="spanAfter8" class="form-control bg-transparent border-0" data-group="raw_data">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanBefore10" id="spanBefore10" class="form-control bg-transparent border-0" data-group="raw_data">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="spanAfter10" id="spanAfter10" class="form-control bg-transparent border-0" data-group="raw_data">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3 mb-0">
                            <label class="label" for="sensitivityTable">Sensitivity Test</label>
                            <div class="col" style='display:none'>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<label class="input-group-text">Reference weight</label>
									</div>
									<input name="sensitivityReferenceWeight" id="sensitivityReferenceWeight"  type="text" class="form-control" value='n/a' data-group="raw_data">
								</div>
							</div>
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="input-group bg-transparent">
                                                <label class="input-group-text bg-transparent border-0" for="sensitivityNominalValue">Nominal value</label>
                                                <input class="form-control bg-transparent border-0 border-bottom border-2" name="sensitivityNominalValue" id="sensitivityNominalValue"  type="text"  data-group="raw_data">
                                                <select class="form-control border-0" name="sensitivityNominalUnit" id="sensitivityNominalUnit"  data-group="raw_data">
                                                    <option value="mg">mg</option>
                                                    <option value="g" selected>g</option>
                                                    <option value="kg">kg</option>
                                                </select>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="input-group bg-transparent">
                                                <label class="input-group-text bg-transparent border-0" for="sensitivityNominalValue">Marking</label>
                                                <input name="sensitivityMarking" id="sensitivityMarking"  type="text" class="form-control bg-transparent border-0 border-bottom border-2" data-group="raw_data">
                                            </div>
                                        </th>
                                        <th>
                                            <div class="input-group bg-transparent">
                                                <label class="input-group-text bg-transparent border-0" for="sensitivityNominalValue">CM</label>
                                                <input name="sensitivityCM" id="sensitivityCM"  type="text" class="form-control bg-transparent border-0 border-bottom border-2" data-group="raw_data">
                                                <select name="sensitivityCMUnit" id="sensitivityCMUnit" class="form-control border-0" data-group="raw_data">
                                                    <option value="mg">mg</option>
                                                    <option value="g" selected>g</option>
                                                    <option value="kg">kg</option>
                                                </select>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="input-group bg-transparent">
                                                <label class="input-group-text bg-transparent border-0" for="sensitivityNominalValue">U</label>
                                                <input name="sensitivityU" id="sensitivityU"   type="text" class="form-control bg-transparent border-0 border-bottom border-2" data-group="raw_data">
                                                <select name="sensitivityUUnit" id="sensitivityUUnit" class="form-control border-0" data-group="raw_data">
                                                    <option value="mg">mg</option>
                                                    <option value="g" selected>g</option>
                                                    <option value="kg">kg</option>
                                                </select>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                            <table class="table table-bordered text-center" id="sensitivityTable">
                                <thead>
                                    <tr>
                                        <th>Trial</th>
                                        <th>
                                            <div class="input-group justify-content-center bg-transparent">
                                                <label class="input-group-text bg-transparent border-0" for="sensitivityEmptyUnit">Empty + Δm,</label>
                                                <select name="sensitivityEmptyUnit" id="sensitivityEmptyUnit" class="bg-transparent" data-group="raw_data">
                                                    <option value="mg">mg</option>
                                                    <option value="g" selected>g</option>
                                                    <option value="kg">kg</option>
                                                </select>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="input-group justify-content-center bg-transparent">
                                                <label class="input-group-text bg-transparent border-0" for="sensitivityEmptyUnit">Max(</label>
                                                <input name="sensitivityMaxNominalValue" id="sensitivityMaxNominalValue" type="text" class="form-control bg-transparent border-0 border-bottom border-2" style="max-Width:10%" data-group="raw_data">
                                                <label class="input-group-text bg-transparent border-0" for="sensitivityEmptyUnit">) + Δm,</label>
                                                <select name="sensitivityMaxUnit" id="sensitivityMaxUnit" class="bg-transparent" data-group="raw_data">
                                                    <option value="mg">mg</option>
                                                    <option value="g" selected>g</option>
                                                    <option value="kg">kg</option>
                                                </select>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody >
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="sensitivityEmptyTrial1" id="sensitivityEmptyTrial1" class="form-control" data-group="raw_data">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="sensitivityMaxTrial1" id="sensitivityMaxTrial1" class="form-control" data-group="raw_data">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="sensitivityEmptyTrial2" id="sensitivityEmptyTrial2" class="form-control" data-group="raw_data">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="sensitivityMaxTrial2" id="sensitivityMaxTrial2" class="form-control" data-group="raw_data">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="sensitivityEmptyTrial3" id="sensitivityEmptyTrial3" class="form-control" data-group="raw_data">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="sensitivityMaxTrial3" id="sensitivityMaxTrial3" class="form-control" data-group="raw_data">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="sensitivityEmptyTrial4" id="sensitivityEmptyTrial4" class="form-control" data-group="raw_data">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="sensitivityMaxTrial4" id="sensitivityMaxTrial4" class="form-control" data-group="raw_data">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="sensitivityEmptyTrial5" id="sensitivityEmptyTrial5" class="form-control" data-group="raw_data">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="sensitivityMaxTrial5" id="sensitivityMaxTrial5" class="form-control" data-group="raw_data">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Std. Dev. (g)</td>
                                        <td class="automatic">
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="sensitivityEmptyStandardDev" id="sensitivityEmptyStandardDev" class="form-control automatic border-0" tabindex="-1" data-group="raw_data">
                                            </div>
                                        </td>
                                        <td class="automatic">
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="sensitivityMaxStandardDev" id="sensitivityMaxStandardDev" class="form-control automatic border-0" tabindex="-1" data-group="raw_data">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div>
                            <label class="label" for="spanCalibrationTable">Eccentricity Test</label>
                            <table class='table table-hover table-striped table-bordered  mb-0 text-center' id="eccentricityTable">
                                <thead>
                                    <tr>
                                        <th>Position</th>
                                        <th>
										Indication,
                                            <select name="eccentricityIndicationUnit" id="eccentricityIndicationUnit" class="" data-group="raw_data">
                                                <option value="mg">mg</option>
                                                <option value="g" selected>g</option>
                                                <option value="kg">kg</option>
                                            </select>
                                        </th>
                                        <th>
										Error,
                                            <select name="eccentricityErrorUnit" id="eccentricityErrorUnit" class="" data-group="raw_data">
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
                                                <input type="text" name="eccentricityIndicationPosition1Start" id="eccentricityIndicationPosition1Start" class="form-control" data-group="raw_data">
                                            </div>
                                        </td>
                                        <td class="automatic">
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="eccentricityErrorPosition1Start" id="eccentricityErrorPosition1Start" class="form-control automatic" data-group="raw_data">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="eccentricityIndicationPosition2" id="eccentricityIndicationPosition2" class="form-control" data-group="raw_data">
                                            </div>
                                        </td>
                                        <td class="automatic">
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="eccentricityErrorPosition2" id="eccentricityErrorPosition2" class="form-control automatic" data-group="raw_data">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="eccentricityIndicationPosition3" id="eccentricityIndicationPosition3" class="form-control" data-group="raw_data">
                                            </div>
                                        </td>
                                        <td class="automatic">
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="eccentricityErrorPosition3" id="eccentricityErrorPosition3" class="form-control automatic" data-group="raw_data">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="eccentricityIndicationPosition4" id="eccentricityIndicationPosition4" class="form-control" data-group="raw_data">
                                            </div>
                                        </td>
                                        <td class="automatic">
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="eccentricityErrorPosition4" id="eccentricityErrorPosition4" class="form-control automatic" data-group="raw_data">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="eccentricityIndicationPosition5" id="eccentricityIndicationPosition5" class="form-control" data-group="raw_data">
                                            </div>
                                        </td>
                                        <td class="automatic">
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="eccentricityErrorPosition5" id="eccentricityErrorPosition5" class="form-control automatic" data-group="raw_data">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="eccentricityIndicationPosition1End" id="eccentricityIndicationPosition1End" class="form-control" data-group="raw_data">
                                            </div>
                                        </td>
                                        <td class="automatic">
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="eccentricityErrorPosition1End" id="eccentricityErrorPosition1End" class="form-control automatic" data-group="raw_data">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="my-4">
                            <label class="label" for="linearityTable">Linearity Test</label>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-outline-success" id="linearityTestAddButton" >Add</button>
								<button type="button" class="btn btn-outline-danger" id="linearityTestDeleteButton">Delete</button>
                            </div>
                            <table class="table table-bordered text-center" id="linearityTestTable">
                                <thead>
                                    <tr>
                                        <th rowspan='2'>
										Nominal value, 
                                            <select class="" name="linearityNominalValueUnit" id="linearityNominalValueUnit" data-group="raw_data">
                                                <option value="mg">mg</option>
                                                <option value="g" selected>g</option>
                                                <option value="kg">kg</option>
                                            </select>
                                        </th>
										<th colspan='1'>Test weight/s used</th>
                                        <th colspan='2'>
										Indication, 
                                            <select class="" name="linearityIndicationUnit" id="linearityIndicationUnit" data-group="raw_data">
                                                <option value="mg">mg</option>
                                                <option value="g" selected>g</option>
                                                <option value="kg">kg</option>
                                            </select>
                                        </th>
                                    </tr>
									<tr>
                                        <th>Standard used 
                                            <i>(Convertional Mass 
                                            <select class="" name="linearityConventionalMassUnit" id="linearityConventionalMassUnit" data-group="raw_data">
                                                <option value="mg">mg</option>
                                                <option value="g" selected>g</option>
                                                <option value="kg">kg</option>
                                            </select>)</i>
                                        </th>
									    <th class="d-none">Uncertainty</th>
									    <th>Upward</th>
									    <th>Downward</th>
                                    </tr>
                                </thead>
								<tbody id="linearityTestTableBody">
								</tbody>
                            </table>
                        </div>

                        <div>
                            <label class="label" for="repeatabilityTable" >Repeatability Test</label>
                            <table class="table table-bordered text-center" id="repeatabilityTable">
                                <thead>
                                    <tr>
                                            <th>Trial</th>
                                            <th>
                                                Indication,
                                                <select name='repeatabilityIndicationUnit' id='repeatabilityIndicationUnit' data-group="raw_data">
                                                    <option value="mg">mg</option>
                                                    <option value="g" selected>g</option>
                                                    <option value="kg">kg</option>
                                                </select>
                                            </th>
                                            <th>Trial</th>
                                            <th>
                                                Indication,
                                                <select name='repeatabilityIndicationUnit2' id='repeatabilityIndicationUnit2' data-group="raw_data">
                                                    <option value="mg">mg</option>
                                                    <option value="g" selected>g</option>
                                                    <option value="kg">kg</option>
                                                </select>
                                            </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                            <td>1</td>
                                            <td>
                                                <div class="input-group input-group-sm">
                                                    <input type="text" name="repeatabilityTrial1" id="repeatabilityTrial1" class="form-control" data-group="raw_data">
                                                </div>
                                            </td>
                                            <td>6</td>
                                            <td>
                                                <div class="input-group input-group-sm">
                                                    <input type="text" name="repeatabilityTrial6" id="repeatabilityTrial6" class="form-control" data-group="raw_data">
                                                </div>
                                            </td>
                                    </tr>
                                    <tr>
                                            <td>2</td>
                                            <td>
                                                <div class="input-group input-group-sm">
                                                    <input type="text" name="repeatabilityTrial2" id="repeatabilityTrial2" class="form-control" data-group="raw_data">
                                                </div>
                                            </td>
                                            <td>7</td>
                                            <td>
                                                <div class="input-group input-group-sm">
                                                    <input type="text" name="repeatabilityTrial7" id="repeatabilityTrial7" class="form-control" data-group="raw_data">
                                                </div>
                                            </td>
                                    </tr>
                                    <tr>
                                            <td>3</td>
                                            <td>
                                                <div class="input-group input-group-sm">
                                                    <input type="text" name="repeatabilityTrial3" id="repeatabilityTrial3" class="form-control" data-group="raw_data">
                                                </div>
                                            </td>
                                            <td>8</td>
                                            <td>
                                                <div class="input-group input-group-sm">
                                                    <input type="text" name="repeatabilityTrial8" id="repeatabilityTrial8" class="form-control" data-group="raw_data">
                                                </div>
                                            </td>
                                    </tr>
                                    <tr>
                                            <td>4</td>
                                            <td>
                                                <div class="input-group input-group-sm">
                                                    <input type="text" name="repeatabilityTrial4" id="repeatabilityTrial4" class="form-control" data-group="raw_data">
                                                </div>
                                            </td>
                                            <td>9</td>
                                            <td>
                                                <div class="input-group input-group-sm">
                                                    <input type="text" name="repeatabilityTrial9" id="repeatabilityTrial9" class="form-control" data-group="raw_data">
                                                </div>
                                            </td>
                                    </tr>
                                    <tr>
                                            <td>5</td>
                                            <td>
                                                <div class="input-group input-group-sm">
                                                    <input type="text" name="repeatabilityTrial5" id="repeatabilityTrial5" class="form-control" data-group="raw_data">
                                                </div>
                                            </td>
                                            <td>10</td>
                                            <td>
                                                <div class="input-group input-group-sm">
                                                    <input type="text" name="repeatabilityTrial10" id="repeatabilityTrial10" class="form-control" data-group="raw_data">
                                                </div>
                                            </td>
                                    </tr>
                                    <tr>
                                            <td colspan='2'>SD</td>
                                            <td colspan='2'>
                                                <div class="input-group input-group-sm">
                                                    <input type="text" name="repeatabilitySD" id="repeatabilitySD" class="form-control" data-group="raw_data">
                                                    <select  name="repeatabilitySUnit" id="repeatabilitySUnit" class="" data-group="raw_data">
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

                        <div class="row ">
                            <div class="row mx-auto mb-3 d-flex">
                                <button type='button' class="btn btn-success" onclick="storeToHiddens()">Calculate</button>
                            </div>
                        </div>
                        
                        <table id="measurementTable" class="table table-hover table-striped table-bordered  mb-0 d-none">
                            <thead>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>                        
                    </div>
                </div>
                <div class="card m-2 border-light">
                    <div class="card-header text-white bg-primary">
                        <h3 class="card-title mx-auto d-flex justify-content-center">Uncertainty Budget</h3> 
                    </div>
                    <div class="card-body table-responsive text-white" style="background-color:rgba(13, 110, 253, 0.36)">
                        <input type="hidden" name="calculatedData" id="calculatedData" value="{}">
                        <table id="uncertBudgetTable" class="table table-hover table-striped table-bordered text-center mb-0 align-middle">
                            <thead class='align-middle'>
                                <tr>
                                    <th>Uncertainty of Reference Weights</th>
                                    <th>Uncertainty of Reference Weights for Sensitivity Test</th>
                                    <th>Uncertainty due to SD of Sensitivity Test</th>
                                    <th>Uncertainty due to Sensitivity</th>
                                    <th>Uncertainty due to Readability</th>
                                    <th>Uncertainty due to Eccentricity</th>
                                    <th>Uncertainty of Balance</th>
                                    <th>Uncertainty due to Repeatability</th>
                                    <th>Combined Uncertainty</th>
                                    <th>Expanded Uncertainty</th>
                                </tr>
                            </thead>
                            <tbody id="uncertaintyBudgetTableTbody">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card m-2 border-light">
                    <div class="card-header text-white bg-primary">
                        <h3 class="card-title">Personnel</h3> 
                    </div>
                    <div class="card-body table-responsive text-white" style="background-color:rgba(13, 110, 253, 0.36)">
                        <input type="hidden" name="completion" id="completion" value="Pending">
                        <input type="hidden" name="calibratorAccountEmail" id="calibratorAccountEmail" value="<?= session('email')?>">
						<input type="hidden" name="calibratorAccountID" id="calibratorAccountID" value="<?= session('id')?>">
                        <input type="hidden" name="verifierEmail" id="verifierEmail">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="input-group input-group-sm">
                                            <select  name="calibrationOfficer" id="personnelList" class="form-control">
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group input-group-sm">
                                            <select  name="checkedBy" id="verifierList" class="form-control">
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
                                            <select  name="verifierPosition" id="verifierPositionList" class="form-control">
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>   
                <div class="card m-2 border-light">
                    <div class="card-header text-white bg-primary">
                        <div class="row">
                            <div class="mx-auto d-flex justify-content-center">
                                <h3>Actions</h3>
                            </div>
                        </div> 
                    </div>
                    <div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)"> 
                        <div class="row">
                            <div class='col text-center d-none'>
                                <button type="button" class="btn btn-lg btn-warning" id="generateDataButton"><i class="fas fa-plus-square"></i> Generate Data</button> 
                            </div> 
                            <div class="btn-group mb-3" role="group">
                                <a href="/worksheets/WeighingScale/<?= $id;?>" class="btn btn-warning" id="worksheetPDF" target="_blank">Generate Worksheet PDF</a>
                                <a href="/weighingScalePrint/<?= $id;?>" class="btn btn-warning" id="certificatePDF" target="_blank">Certificate PDF</a>
                            </div>
                            <div class="input-group mb-2">
                                <button class="btn btn-warning" type="button" id="imageUploadButton" onclick="uploadFiles()" >Upload</button>
                                <input type="file" class="form-control bg-warning" id="fileInput" multiple >
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
            <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
                <div id="toastSaved" class="toast hide d-flex align-items-center text-white bg-success border-0 " role="alert">
                    <div class="toast-body">
                    Saved
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-info position-fixed" style="bottom: 75px; right:20px; z-index:999" id="saveButton">
			Save
		</button>
    </main>
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
                            <table class="table table-sm table-hover" style="height:60%">
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

    <!-- Layout -->
    <script src="/dashboardAsset/lib/jquery/jquery.min.js"></script>
    <script src="/dashboardAsset/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/dashboardAsset/lib/feathericons/feather.min.js"></script>
    <script src="/dashboardAsset/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/dashboardAsset/assets/js/script.js"></script>
   
    <script src="/js/scripts/formula.min.js"></script>
    <script src="/js/scripts/jquery-3.6.3.min.js"></script>
    <script src="/js/scripts/bootstrap.bundle.min.js"></script>
    <script src="/js/scripts/jquery.dataTables.min.js"></script> 
    <script src="/js/scripts/popper.min.js"></script>
    <script src="/js/scripts/bootstrap5.min.js"></script>

    <script>
        var personnels = <?= json_encode($personnel)?>;
        var verifiers = <?= json_encode($verifier)?>;

        
        var standardArrayDetails = <?= json_encode($arrStandardDetails[0])?>;   
        var standardArrayValues = <?= json_encode($arrStandardValues[0])?>;

    </script>
    <script src="/js/module4.js"></script>
    <script src="/js/module4Formulas.js"></script>
</body>
</html>