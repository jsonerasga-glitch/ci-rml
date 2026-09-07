<?php
    use App\Models\ThermoStandardAddTestPointsModel;
    use App\Models\ThermoStandard;
    use App\Models\TemperatureSource;
    use App\Models\CustomersModel;
    use App\Models\VerifierModel;

	$standardDetails = new ThermoStandard();
	$standardValues = new ThermoStandardAddTestPointsModel();
    $tempSource = new TemperatureSource();

	$arrStandardDetails[] = $standardDetails->findAll(); 
	$arrStandardValues[] = $standardValues->findAll(); 
    $arrTempSource[] = $tempSource->findAll(); 

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


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
    
    <link href="/dashboardAsset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>RML++</title>

    <!-- Vendor CSS -->
    <link href="/dashboardAsset/lib/remixicon/fonts/remixicon.css" rel="stylesheet">
    
    <!-- Template CSS -->
    <link rel="stylesheet" href="/dashboardAsset/assets/css/style.min.css">
<body class="skin-base animate">
    <!-- Sidebar vh-100-->
    <?php
		$data = [
			'active' => 'worksheet5',
			'show' => 'worksheet',
		];
		echo view('layouts/sidebarAdmin',$data)?>
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
    <div class="content">
      <div class="content-header">
        <a id="contentMenu" href="#" class="content-menu d-none d-lg-flex"><i data-feather="menu"></i></a>
        <a id="mobileMenu" href="#" class="content-menu d-lg-none"><i data-feather="menu"></i></a>
      </div><!-- content-header -->
        <form action="/digitalThermometer/update" method="post" name="thermometerForm" id="thermometerForm" enctype="multipart/form-data">

        <div class="container-fluid" style="background-color:#faf7f0;">
			<div class="container-fluid ">
				<div class="card shadow p-3 mb-5 mt-4 bg-white rounded">
					<div class="card-header bg-white">
						<!-- HEADER --> 
                            <div class="row mt-2">
								<h2 class="mx-auto d-flex justify-content-center">Thermometer</h2>
							</div>
						<!-- HEADER -->	
                    </div>
                    <div class="card-body bg-white">
                        <input type="hidden" name="idOfCertificate" value="">
						<input type="hidden" name="standardUsed" id="standardUsed" value="">
                        <input type="hidden" name="specificationsArray" id="specificationsArray" value="">
                        <input type="hidden" name="environmentArray" id="environmentArray" value=''>
                        <input type="hidden" name="calculatedValues" id="calculatedValues"  value=''>
                        <input type="hidden" name="completion" id="completion">
                        <input type="hidden" name="calibratorAccountEmail" id="calibratorAccountEmail" value="<?= session('email')?>">
						<input type="hidden" name="calibratorAccountID" id="calibratorAccountID" value="<?= session('id')?>">
                        <input type="hidden" name="verifierEmail" id="verifierEmail">
                        <input type="hidden" name="immersionDepth" id="immersionDepth">
                        <input type="hidden" name="sersorType" id="sersorType">
                        <input type="hidden" name="sensorManufacturer" id="sensorManufacturer">
                        <input type="hidden" name="sensorModelNumber" id="sensorModelNumber">
                        <input type="hidden" name="sensorSerialNumber" id="sensorSerialNumber">
                        <input type="hidden" name="sensorEquipmentNumber" id="sensorEquipmentNumber">


                        <div class="card">
                            <div class="card-header text-white bg-primary">
                                <div class="row">
                                    <div class="mx-auto my-auto d-flex justify-content-center">
                                        <h3>Customer information</h3>
                                    </div>
                                </div> 
                            </div>
                            <div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)">
                                <div class='row'>
                                    <div class='col'>
                                        <div class="mb-3">
                                            <label>Name:</label>
                                            <input name='customer' id="customer" data-group="customer_information" list='customerList'  type="text" class="form-control mt-n2 text-break" onchange="getCustomerDetails()">
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
                                            <label for="">Address:</label>
                                            <input type="text" name='address' id="address" data-group="customer_information" style=""  type="text" class="form-control mt-n2">
                                        </div>
                                    </div>
                                    <div class='col'>
                                        <div class="mb-3 ">
                                            <label for="">TSR Number:</label>
                                            <input name='tsrNumber' data-group="customer_information" type="text" class="form-control mt-n2 text-break">
                                        </div>
                                        <div class=" mb-3 ">
                                            <label>Date Received</label>
                                            <input name='dateReceived' id="sDate"data-group="customer_information" type="date" class="form-control mt-n2 text-break">
                                        </div>
                                        <div class="">
                                            <label>Recommended Due Date (Optional)</label>
                                            <input name='recommendedDueDate' id="eDate"  type="date" data-group="customer_information" class="form-control text-break">
                                        </div>									
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="card">
                            <div class="card-header text-white bg-primary">
                                <div class="row">
                                    <div class="mx-auto d-flex justify-content-center">
                                        <h3>Equipment information</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)">
                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="row">
                                            <div class="">
                                                <label>Date Calibrated</label>
                                                <input name='dateCalibrated' id="sDate" data-group="equipment_information" type="date" class="form-control mt-n2 text-break">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="">
                                                <label>Calibration Certificate Number: </label>
                                                <input oninput="checkCertNum()" name='certificateNumber' id='certificateNumber' data-group="equipment_information" type="text" class="form-control  mt-n2 "/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="">
                                                <label>Description:</label>
                                                <input  name='description' id='description' data-group="equipment_information" type="text" class="form-control  mt-n2 " />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="">
                                                <label>Manufacturer:</label>
                                                <input  name='manufacturer' id='manufacturer' data-group="equipment_information" type="text" class="form-control  mt-n2 " />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="">
                                                <label>Model:</label>
                                                <input name='modelNumber' id='modelNumber' data-group="equipment_information" type="text" class="form-control  mt-n2 " />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="">
                                                <label>Serial Number</label>
                                                <input  name='serialNumber' id='serialNumber' data-group="equipment_information" type="text" class="form-control  mt-n2 " />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="">
                                                <label>Place of Calibration:</label>
                                                <input  name="placeOfCalibration" value="" data-group="equipment_information" type="text" class="form-control  mt-n2 " />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="">
                                                <label>Equipment ID (Optional):</label>
                                                <input  name='equipmentNumber' id='equipmentNumber' data-group="equipment_information" type="text" class="form-control  mt-n2 " />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="">
                                                <label>Capacity / Range / Span:</label>
                                                <input  name='range' id='range' data-group="equipment_information" type="text" class="form-control  mt-n2 " />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="">
                                                <label>Resolution / Graduation</label>
                                                <input name='resolution' id='resolution' data-group="equipment_information" type="text" class="form-control  mt-n2 " />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="">
                                                <label>Readability (for graduation). Set 0.5 for resolution</label>
                                                <input  name='readability' id='readability' data-group="equipment_information" type="text" class="form-control  mt-n2 " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-2'>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                Immersion:
                                            </label>
                                        </div>
                                    </div>	
                                    <div class='col-10'>
                                        <div class="row">
                                            <div class='col-2'>
                                                <div class="form-check">
                                                    <input name="liquidInGlass" class="form-check-input" data-group="equipment_information" type="radio" value="total" id="liquidInGlassC">
                                                    <label class="form-check-label" for="liquidInGlassC">
                                                        Complete
                                                    </label>
                                                </div>
                                            </div>	
                                            <div class='col-1'>
                                                <div class="form-check">
                                                    <input name="liquidInGlass" class="form-check-input" data-group="equipment_information" type="radio" value="total" id="liquidInGlassT">
                                                    <label class="form-check-label" for="liquidInGlassT">
                                                        Total 
                                                    </label>
                                                </div>
                                            </div>	
                                            <div class='col'>
                                                <div class="form-check">
                                                    <input name="liquidInGlass" class="form-check-input" data-group="equipment_information" type="radio" value="partial" id="liquidInGlassP">
                                                    <label class="form-check-label" for="liquidInGlassP">
                                                        Partial: <input class="border-0 border-bottom bg-transparent" type="input" name="partialImmersion" id="partialImmersion" data-group="equipment_information">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class='col'>
                                                <div class="form-check">
                                                    <input name="liquidInGlass" class="form-check-input" type="radio" value="not" id="liquidInGlassN" data-group="equipment_information" checked>
                                                    <label class="form-check-label" for="liquidInGlassN">
                                                        others(specify depth): <input class="border-0 border-bottom bg-transparent" type="input" name="otherDepth" id="otherDepth" data-group="equipment_information">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <hr>
                       
                        <div class="card">
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
                                                <input  name='startTemp' id='startTemp' type="text" class="form-control  mt-n2 " data-group="environmental_information"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="">
                                                <label>Relative Humidity:</label>
                                                <input name='startRH' id='startRH' type="text" class="form-control  mt-n2 " data-group="environmental_information" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="">
                                                <label>Atmosperic Pressure (Optional)</label>
                                                <input  name='startAtmPressure' id='startAtmPressure' type="text" class="form-control  mt-n2 " ata-group="environmental_information" />
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
                                                <input  name='endTemp' id='endTemp' type="text" class="form-control  mt-n2 " data-group="environmental_information" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="">
                                                <label>Relative Humidity:</label>
                                                <input  name='endRH' id='endRH' type="text" class="form-control  mt-n2 " data-group="environmental_information"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="">
                                                <label>Atmosperic Pressure (Optional)</label>
                                                <input name='endAtmPressure' id='endtAtmPressure' type="text" class="form-control  mt-n2 " data-group="environmental_information" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<hr>

                        <div class="card">
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
                                            Select Reference Thermometer
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>



                        <div class="card">
                            <div class="card-header text-white bg-primary">
                                <h3>Title</h3>
                            </div>
                            <div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)"> 
                                <div class="row">
                                    //datas
                                </div>
                            </div>
                        </div>






                        
                        <div class="card">
                            <div class="card-header text-white bg-primary">
                                <div class="row">
                                    <div class="mx-auto d-flex justify-content-center">
                                        <h3>Raw Data</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)">
                                <div class="row">
                                    <div class="row mx-auto mb-3 d-flex">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-success" id='addButtonMeasurementTables' >Add</button>
                                            <button type="button" class="btn btn-danger" id='removeButtonMeasurementTables'>Remove</button>
                                            <button type="button" class="btn btn-warning" id='calculateButtonMeasurementTables' onclick="console.log(calculate());addToUncertaintyBudgetTable();">Calculate</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mx-auto justify-content-center" id="measurementDataTables"></div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="card">
                            <div class="card-header text-white bg-primary">
                                <div class="card-header text-white bg-primary">
                                    <div class="row">
                                        <div class="mx-auto d-flex justify-content-center">
                                            <h3>Uncertainty Budget</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)">
                                <div class="row table-responsive">
                                    <table class="table">
                                        <thead>
                                            <th>test point </th>
                                            <th>Unc due to UUC Resolution</th>
                                            <th>Unc due to repeatability of STD </th>
                                            <th>Unc due to repeatability of UUC</th>
                                            <th>Uncertainty due to Standard PRT</th>
                                            <th>Uncertainty due to Drift</th>
                                            <th>Bath Instability</th>
                                            <th>Axial Homogenity</th>
                                            <th>Radial Homogenity</th>
                                            <th>Hysteresis</th>
                                            <th>Combined Uncertainty</th>
                                            <th>Veffective</th>
                                            <th>k</th>
                                            <th>Expanded Uncertainty</th>
                                        
                                        </thead>
                                        <tbody id="uncertBudgetTBody">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>
                        
                        <div class="card">
                            <div class="card-header text-white bg-primary">
                                <div class="row">
                                    <div class="mx-auto d-flex justify-content-center">
                                        <h3>Personnel</h3>
                                    </div>
                                </div> 
                            </div>
                            <div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)"> 
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
                            </div>
                        </div>
                        <hr>
                       
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
                                        <input type="file" name="image" accept="image/*" id="imageInput" onchange="loadFile(event)">
                                        <img id="output"/>
                                    </div>	
                                </div>
                            </div>
                        </div>
                        <hr>
                       
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
                                    <div class='col text-center d-none'>
                                        <button type="button" class="btn btn-lg btn-warning" id="generateDataButton"><i class="fas fa-plus-square"></i> Generate Data</button>
                                    </div> 
                                    <br>	
                                    <div class="btn-group mb-3" role="group">
                                        <a class="btn btn-warning" id="worksheetPDF" target="_blank" >Generate Worksheet PDF</a>
                                        <a class="btn btn-warning" id="certificatePDF" target="_blank">Certificate PDF</a>
                                    </div>
                                    <div class="input-group mb-2">
                                        <button class="btn btn-warning" type="button" id="imageUploadButton" onclick="uploadFiles()" >Upload</button>
                                        <input type="file" class="form-control bg-warning" id="fileInput" multiple >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
					</div>
                </div>	
                <!-- <button type="button" class="btn btn-success saveButton" data-toggle="modal" data-target="#testWeightSelectModal" style="top: 350; right: 50;"> -->
                <button type="button" class="btn btn-success saveButton" onclick="saveOnly('thermometerForm')" style="top: 350; right: 50;">
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
									<th>Serial No.</th>
									<th>Description</th>
									<th>Calibration date</th>
									<th>Due date</th>
								</tr>
						</thead>
					
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/formulajs/formulajs@2.5.0/dist/formula.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jstat@latest/dist/jstat.min.js"></script>

<script>
    //Datas

    var tempSource = <?= json_encode($temperatureSource)?>;
    var driftArray = <?= json_encode($driftValuePRT)?>;
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

    function changeStandardUsedWhenUpdated(){
        var selected = document.getElementById('standardUsed').value;
        var selectedSplit = selected.split('(SPLIT)');
        
        $("select[id*='standardUsedTbody']").each( function (e){
			$(this).empty(); 	
			selectedSplit.forEach(element => {
				$(this).append($("<option></option>").text(element));
			});
        });       
    }

    function addTablesToDiv(divId){
        var div = document.getElementById(divId);
        var divTable = document.createElement('div');
        divTable.setAttribute('class', 'row');
        var tableCount = (div.childElementCount + 1);
        var table = document.createElement('table');
        var tbody = document.createElement('tbody');
        table.setAttribute('class', 'table table-bordered align-middle text-center');
        table.setAttribute('id', 'table'+tableCount);
        tbody.setAttribute('id', 'TbodyTable'+tableCount);


        
        const thead = function(tableNumber){
            var head = document.createElement('thead');
            var tr1 = document.createElement('tr');
            var tr2 = document.createElement('tr');
            var trButton = document.createElement('tr');
            var buttonsDiv = document.createElement('div');
            var h3 = document.createElement('h3');

            buttonsDiv.setAttribute('class', 'btn-group float-end');
            buttonsDiv.setAttribute('role', 'group');
            var button = document.createElement('button');
            button.setAttribute('type', 'button');
            button.setAttribute('class', 'btn btn-success');
            button.innerHTML = 'Add';
            button.setAttribute('onclick', 'addRow("TbodyTable'+tableNumber+'")');
            buttonsDiv.appendChild(button);
            var button = document.createElement('button');
            button.setAttribute('type', 'button');
            button.setAttribute('class', 'btn btn-danger');
            button.innerHTML = 'Remove';
            button.setAttribute('onclick', 'deleteRow("TbodyTable'+tableNumber+'")');
            buttonsDiv.appendChild(button);

            h3.innerHTML = 'Channel #'+tableNumber;
            h3.setAttribute('class', 'align-bottom display-6 m-0');
            h3.appendChild(buttonsDiv);

            var th = document.createElement('th');
            th.setAttribute('colspan', '9');
            th.appendChild(h3);
            trButton.appendChild(th);


            var th = document.createElement('th');
            th.innerHTML = 'Test Points, °C';
            th.setAttribute('rowspan', '2');
            tr1.appendChild(th);

            var th = document.createElement('th');
            th.innerHTML = 'Standard Used';
            th.setAttribute('rowspan', '2');
            tr1.appendChild(th);

            var th = document.createElement('th');
            th.innerHTML = 'Temperature Source';
            th.setAttribute('rowspan', '2');
            tr1.appendChild(th);

            var th = document.createElement('th');
            th.innerHTML = 'UUC reading, °C';
            th.setAttribute('colspan', '3');
            tr1.appendChild(th);

            var th = document.createElement('th');
            th.innerHTML = 'Standard reading, °C';
            th.setAttribute('colspan', '3');
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
            th.innerHTML = 'Trial 1';
            tr2.appendChild(th);

            var th = document.createElement('th');
            th.innerHTML = 'Trial 2';
            tr2.appendChild(th);

            var th = document.createElement('th');
            th.innerHTML = 'Trial 3';
            tr2.appendChild(th);

            
            head.appendChild(trButton);
            head.appendChild(tr1);
            head.appendChild(tr2);

            return head;
        }

        table.appendChild(thead(tableCount));
        table.appendChild(tbody);
        divTable.appendChild(table);
        div.appendChild(divTable);

        
    }

    function addTablesWithData(){
        var calculatedDatas = JSON.parse(datas['calculatedValues']);
        var countofTable = calculatedDatas != null ? calculatedDatas.length : 0;
        for (let i = 0; i < countofTable; i++) {
            addTablesToDiv("measurementDataTables");
            var tableName = 'table'+(i+1);
            var tbodyOfTable = 'TbodyTable'+(i+1);
            var countOfRows = Object.keys(calculatedDatas[i][tableName]).length;
            for (let x = 1; x <= countOfRows; x++) {
                var rowName = 'row'+x;
                // addRowWithData(tbodyOfTable);
                var testpoint = calculatedDatas[i][tableName][rowName].testPoint;
                var uucTrial1 = calculatedDatas[i][tableName][rowName]['uucTrialArray'][0];
                var uucTrial2 = calculatedDatas[i][tableName][rowName]['uucTrialArray'][1];
                var uucTrial3 = calculatedDatas[i][tableName][rowName]['uucTrialArray'][2];
                var standardTrial1 = calculatedDatas[i][tableName][rowName]['standardTrialArray'][0];
                var standardTrial2 = calculatedDatas[i][tableName][rowName]['standardTrialArray'][1];
                var standardTrial3 = calculatedDatas[i][tableName][rowName]['standardTrialArray'][2];
                var selectedStandard = calculatedDatas[i][tableName][rowName]['standardUsed'];
                var selectedTempSource = calculatedDatas[i][tableName][rowName]['tempSourceId'];
                
                addRowWithData(
                    tbodyOfTable, 
                    testpoint,
                    selectedStandard,
                    selectedTempSource,
                    uucTrial1,
                    uucTrial2,
                    uucTrial3,
                    standardTrial1,
                    standardTrial2,
                    standardTrial3,
                );
                let uncBudgetTbody = document.getElementById('uncertBudgetTBody');
               
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

                
                td1.innerHTML = calculatedDatas[i][tableName][rowName]['testPoint']
                td2.innerHTML = calculatedDatas[i][tableName][rowName]['uncUUCResolution']
                td3.innerHTML = calculatedDatas[i][tableName][rowName]['UncRepeatabilityStandard']
                td4.innerHTML = calculatedDatas[i][tableName][rowName]['UncRepeatabilityUUC']
                td5.innerHTML = calculatedDatas[i][tableName][rowName]['uncStandardPRT']
                td6.innerHTML = calculatedDatas[i][tableName][rowName]['UncDrift']
                td7.innerHTML = calculatedDatas[i][tableName][rowName]['bathInstability']
                td8.innerHTML = calculatedDatas[i][tableName][rowName]['axialHomogenity']
                td9.innerHTML = calculatedDatas[i][tableName][rowName]['radialHomogenity']
                td10.innerHTML = calculatedDatas[i][tableName][rowName]['hysteresis']
                td11.innerHTML = calculatedDatas[i][tableName][rowName]['combinedUncertainty']
                td12.innerHTML = calculatedDatas[i][tableName][rowName]['veffect']
                td13.innerHTML = calculatedDatas[i][tableName][rowName]['k']
                td14.innerHTML = calculatedDatas[i][tableName][rowName]['expandedUncertainty']
 
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
                uncBudgetTbody.append(tr)


            }
            
        }
    }
    //addTablesWithData()

    //Object.keys(OBJECT).length get length of object
    
    function addValuesToInputs(){
        var specificationData = JSON.parse(datas['specificationsArray']);
        var environmentData = JSON.parse(datas['environmentArray']);
        Object.keys(specificationData['specifications']).forEach(item =>{
            if(item == 'liquidInGlass'){
                if(specificationData['specifications'][item] == 'total'){
                    document.getElementById('liquidInGlassT').setAttribute('checked', '');
                }
                if(specificationData['specifications'][item] == 'partial'){
                    document.getElementById('liquidInGlassP').setAttribute('checked', '');
                }
                if(specificationData['specifications'][item] == 'Not'){
                    document.getElementById('liquidInGlassN').setAttribute('checked', '');
                }
            }else{
                document.getElementById(item).value = specificationData['specifications'][item];
            }
        });
        Object.keys(environmentData['environment']).forEach(item =>{
            document.getElementById(item).value = environmentData['environment'][item];
        });
    }
    //addValuesToInputs();

  
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
				input.setAttribute('name', nameID+id+"Row"+rowNumber);
				input.setAttribute('id', nameID+id+"Row"+rowNumber);
                // if(nameID == 'ConventionalMass' || nameID == 'Uncertainty'){
                //     input.setAttribute('style', 'background-color:yellow');
				//     input.setAttribute('tabindex', '-1');
                // }
                
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
            var selected = document.getElementById('standardUsed').value;
            var selectedSplit = selected.split('(SPLIT)');
			try {
				var td = document.createElement("td");
				var div = document.createElement("div");
				var input = document.createElement("select");
				div.setAttribute('class', 'input-group');
				input.setAttribute('class', 'form-control');
				input.setAttribute('type', 'text');
                input.setAttribute('data-rowNumber', rowNumber);
				//Edit after adding db
				input.setAttribute('name', nameID+id+"Row"+rowNumber);
				input.setAttribute('id', nameID+id+"Row"+rowNumber);
                
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
                var p = document.createElement("p");
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
                var p = document.createElement("p");
				div.setAttribute('class', 'input-group');
				p.innerHTML = error;
				div.appendChild(p);
				td.appendChild(div);
				return td 
			}
		}
		try {
			var tbody = document.getElementById(id);
			var tr = document.createElement("tr");
            var numberOfRow = (tbody.childElementCount+1);
            var rowNumber = numberOfRow;
            tr.appendChild(addNewTD(rowNumber,'testPoint'));
            tr.appendChild(addNewSTDUsed(rowNumber,'standardUsed'));
			tr.appendChild(addNewTempSource(rowNumber,'tempSource'));
			tr.appendChild(addNewTD(rowNumber,'UUCtrial1'));
			tr.appendChild(addNewTD(rowNumber,'UUCtrial2'));
            tr.appendChild(addNewTD(rowNumber,'UUCtrial3'));
            tr.appendChild(addNewTD(rowNumber,'standardTrial1'));
			tr.appendChild(addNewTD(rowNumber,'standardTrial2'));
            tr.appendChild(addNewTD(rowNumber,'standardTrial3'));
			tbody.appendChild(tr);
		} catch (e) {
			console.log(e);
		}
	}

    function addRowWithData(id, testPoint, selectedStandardUsed, selectedTempSource, UUCtrial1, UUCtrial2, UUCtrial3,standardTrial1, standardTrial2, standardTrial3){    
		function addNewTD(rowNumber, nameID, value){
			try {
				var td = document.createElement("td");
				var div = document.createElement("div");
				var input = document.createElement("input");
				div.setAttribute('class', 'input-group');
				input.setAttribute('class', 'form-control');
				input.setAttribute('type', 'text');
                input.setAttribute('data-rowNumber', rowNumber);
				input.setAttribute('name', nameID+id+"Row"+rowNumber);
				input.setAttribute('id', nameID+id+"Row"+rowNumber);
                input.setAttribute('value', value);
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
            var selected = document.getElementById('standardUsed').value;
            var selectedSplit = selected.split('(SPLIT)');
			try {
				var td = document.createElement("td");
				var div = document.createElement("div");
				var input = document.createElement("select");
				div.setAttribute('class', 'input-group');
				input.setAttribute('class', 'form-control');
				input.setAttribute('type', 'text');
                input.setAttribute('data-rowNumber', rowNumber);
				//Edit after adding db
				input.setAttribute('name', nameID+id+"Row"+rowNumber);
				input.setAttribute('id', nameID+id+"Row"+rowNumber);
                
                for (let i = 0; i < selectedSplit.length; i++) {
                    var option = document.createElement("option");
                    option.innerHTML = selectedSplit[i];
                    if(selectedStandardUsed == selectedSplit[i]){
                     option.setAttribute('selected', "");   
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
                var p = document.createElement("p");
				div.setAttribute('class', 'input-group');
				p.innerHTML = error;
				div.appendChild(p);
				td.appendChild(div);
				return td 
			}
		}
        function addNewTempSource(rowNumber, nameID, value){
			try {
				var td = document.createElement("td");
				var div = document.createElement("div");
				var input = document.createElement("select");
				div.setAttribute('class', 'input-group');
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
                    if(selectedTempSource == tempSource[i].id){
                     option.setAttribute('selected', "");   
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
                var p = document.createElement("p");
				div.setAttribute('class', 'input-group');
				p.innerHTML = error;
				div.appendChild(p);
				td.appendChild(div);
				return td 
			}
		}
		try {
			var tbody = document.getElementById(id);
			var tr = document.createElement("tr");
            var numberOfRow = (tbody.childElementCount+1);
            var rowNumber = numberOfRow;
            tr.appendChild(addNewTD(rowNumber,'testPoint', testPoint));
            tr.appendChild(addNewSTDUsed(rowNumber,'standardUsed', selectedStandardUsed));
			tr.appendChild(addNewTempSource(rowNumber,'tempSource', selectedTempSource));
			tr.appendChild(addNewTD(rowNumber,'UUCtrial1', UUCtrial1));
			tr.appendChild(addNewTD(rowNumber,'UUCtrial2', UUCtrial2));
            tr.appendChild(addNewTD(rowNumber,'UUCtrial3', UUCtrial3));
            tr.appendChild(addNewTD(rowNumber,'standardTrial1', standardTrial1));
			tr.appendChild(addNewTD(rowNumber,'standardTrial2', standardTrial2));
            tr.appendChild(addNewTD(rowNumber,'standardTrial3', standardTrial3));
			tbody.appendChild(tr);
		} catch (e) {
			console.log(e);
		}
	}

	function deleteRow(tableID) {
		try {
			var table = document.getElementById(tableID);
			var rowCount = table.rows.length;			
			if(rowCount==0){
				console.log('No more row to delete')
			}else{
				table.deleteRow(rowCount-1);
				console.log("table.rows.length "+table.rows.length);
				rowOfTable = table.rows.length;
                linearityTestNumberOfRow -= 1;
			}
		}catch(e) {
			console.log(e);
		}
	}
    function deleteTable(divID){
		try {
			var div = document.getElementById(divID);
			var tableCount = div.childElementCount;			
			if(tableCount==0){
				console.log('No more table to delete')
			}else{
				div.lastChild.remove();
				tableCount = div.childElementCount;
			}
		}catch(e) {
			console.log(e);
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
        changeStandardUsedWhenUpdated();
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
			console.log(e);
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
			console.log(e);
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

    function correctionFromCert(midValue, serialNum, standardArray){	

        var details = filterDataDynamic(serialNum,'serialNumber',ArrayOfStandardDetails)
        if(!details[0].standard.includes('PRT') && !details[0].standard.includes('Platinum Resistance Thermometer with Digital Readout')){
            console.log('Check Standard Used: Not PRT (Correction From Certificate)');
            return 0;
        }

		var arrayofTemp = [];
		var sortedArrayofTemp = [];
		let mid = midValue;
		let midIndex;
		var arrayOfSet = filterDataDynamic(serialNum,'serialNumber',standardArray)
		
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
			return interpolationCorr(midValue, serialNum, standardArray);
		}else{
			return sortedArrayofTemp[midIndex].Corr;
		}
	}

    function getReadout(serialNum, standardArray){
        var arrayOfReadout = [];
        for(x=0;x<standardArray.length;x++){
			if (standardArray[x].serialNumber == serialNum) {
				if (standardArray[x].unit == "Temperature") {
					arrayOfReadout.push(
						parseFloat(standardArray[x].readoutStandardUncertaintyFromCertificate)
					);
				}
			}
		};
        return Math.max(...arrayOfReadout);
    }

    function getPRTstandardUncertainty(serialNum, standardArray){
        var arrayOfPrtUncert = [];
        for(x=0;x<standardArray.length;x++){
			if (standardArray[x].serialNumber == serialNum) {
				if (standardArray[x].unit == "Temperature") {
                    var uncert = standardArray[x].uncertainty;
                    if(uncert.length > 0){
                        arrayOfPrtUncert.push(
    						parseFloat(standardArray[x].uncertainty)
    					);
                    }
				}
			}
		};
        return Math.max(...arrayOfPrtUncert);
    }

    function getDriftPRT(serialNum, driftArray, detailsArray, rowNumber){

        var details = filterDataDynamic(serialNum,'serialNumber',detailsArray)
        if(!details[0].standard.includes('PRT') && !details[0].standard.includes('Platinum Resistance Thermometer with Digital Readout')){
            console.log('Check Standard Used in Row '+rowNumber+': Not PRT (Drift)');
            return 0;
        }

        var arrayOfPrtDrift = [];
        for(x=0;x<driftArray.length;x++){
			if (driftArray[x].serialNumber == serialNum) {
                var drift = driftArray[x].drift;
                if(drift.length > 0){
                    arrayOfPrtDrift.push(
    					parseFloat(driftArray[x].drift)
    				);
                }
			}
		};
        return Math.max(...arrayOfPrtDrift);

    }

    function getBathInstability(code, tempSource){
        for(x=0;x<tempSource.length;x++){
			if (tempSource[x].id == code) {
                return parseFloat(tempSource[x].maxInstability)/Math.sqrt(3);
			}
		};
    }
    function getAxialHomo(code, tempSource){
        for(x=0;x<tempSource.length;x++){
			if (tempSource[x].id == code) {
                return parseFloat(tempSource[x].maxAxial)/Math.sqrt(3);
			}
		};
    }
    function getRadialHomo(code, tempSource){
        for(x=0;x<tempSource.length;x++){
			if (tempSource[x].id == code) {
                return parseFloat(tempSource[x].maxRadial)/Math.sqrt(3);
			}
		};
    }

    function calculate(){
        var calculatedArray = [];

        var divOfTables = document.getElementById('measurementDataTables');
        var countOfTables = divOfTables.childElementCount;

        for (let i = 1; i <= countOfTables; i++) {
            var tableArray = {};
            var table = document.getElementById('table'+i); 
            var tbody = table.children['TbodyTable'+i]
            var tableNumberOfRows = tbody.childElementCount;

            tableArray['table'+i] = {};

            for (let x = 0; x < tableNumberOfRows; x++) {
                var tbodyRow = tbody.childNodes[x];
                var tbodyRowStart = tbody.childNodes[0];
                var tbodyRowEnd = tbody.childNodes[tableNumberOfRows-1];

                var uucTrialArray = [
                    Number(tbodyRow.querySelector('#UUCtrial1TbodyTable'+i+'Row'+(x+1)).value),
                    Number(tbodyRow.querySelector('#UUCtrial2TbodyTable'+i+'Row'+(x+1)).value),
                    Number(tbodyRow.querySelector('#UUCtrial3TbodyTable'+i+'Row'+(x+1)).value),
                ];
                var standardTrialArray = [
                    Number(tbodyRow.querySelector('#standardTrial1TbodyTable'+i+'Row'+(x+1)).value),
                    Number(tbodyRow.querySelector('#standardTrial2TbodyTable'+i+'Row'+(x+1)).value),
                    Number(tbodyRow.querySelector('#standardTrial3TbodyTable'+i+'Row'+(x+1)).value),
                ];

                var uucTrialArrayStart = [
                    Number(tbodyRowStart.querySelector('#UUCtrial1TbodyTable'+i+'Row'+(1)).value),
                    Number(tbodyRowStart.querySelector('#UUCtrial2TbodyTable'+i+'Row'+(1)).value),
                    Number(tbodyRowStart.querySelector('#UUCtrial3TbodyTable'+i+'Row'+(1)).value),
                ];
                var uucTrialArrayEnd = [
                    Number(tbodyRowEnd.querySelector('#UUCtrial1TbodyTable'+i+'Row'+(tableNumberOfRows)).value),
                    Number(tbodyRowEnd.querySelector('#UUCtrial2TbodyTable'+i+'Row'+(tableNumberOfRows)).value),
                    Number(tbodyRowEnd.querySelector('#UUCtrial3TbodyTable'+i+'Row'+(tableNumberOfRows)).value),
                ];

                var standardTrialArrayStart = [
                    Number(tbodyRowStart.querySelector('#standardTrial1TbodyTable'+i+'Row'+(1)).value),
                    Number(tbodyRowStart.querySelector('#standardTrial2TbodyTable'+i+'Row'+(1)).value),
                    Number(tbodyRowStart.querySelector('#standardTrial3TbodyTable'+i+'Row'+(1)).value),
                ];
                var standardTrialArrayEnd = [
                    Number(tbodyRowEnd.querySelector('#standardTrial1TbodyTable'+i+'Row'+(tableNumberOfRows)).value),
                    Number(tbodyRowEnd.querySelector('#standardTrial2TbodyTable'+i+'Row'+(tableNumberOfRows)).value),
                    Number(tbodyRowEnd.querySelector('#standardTrial3TbodyTable'+i+'Row'+(tableNumberOfRows)).value),
                ];

                var uucResolution = document.getElementById('resolution').value;
                var readability = document.getElementById('readability').value;
                var testPoint = Number(tbodyRow.querySelector('#testPointTbodyTable'+i+'Row'+(x+1)).value);
                var standardUsed = tbodyRow.querySelector('#standardUsedTbodyTable'+i+'Row'+(x+1)).value;
                var tempSourceId = tbodyRow.querySelector('#tempSourceTbodyTable'+i+'Row'+(x+1)).value;

                var testPointStart = Number(tbodyRowStart.querySelector('#testPointTbodyTable'+i+'Row'+(1)).value);
                var testPointEnd = Number(tbodyRowEnd.querySelector('#testPointTbodyTable'+i+'Row'+(tableNumberOfRows)).value);
                var standardUsedStart = tbodyRowStart.querySelector('#standardUsedTbodyTable'+i+'Row'+(1)).value;
                var standardUsedEnd = tbodyRowEnd.querySelector('#standardUsedTbodyTable'+i+'Row'+(tableNumberOfRows)).value;
                                
                var correctionFromCertificate = correctionFromCert(testPoint, standardUsed, ArrayOfStandardValues); // interpolation calculated if correction not found
                var readoutStandardUncertainty = getReadout(standardUsed, ArrayOfStandardValues); //**not confirmed** get largest readout from standard
                var PRTstandardUncertainty = getPRTstandardUncertainty(standardUsed, ArrayOfStandardValues); //get largest uncertainty from standard
                var drift = getDriftPRT(standardUsed, driftArray, ArrayOfStandardDetails,x); //get largest drift from standard

                var bathInstability = getBathInstability(tempSourceId, tempSource);
                var axialHomogenity = getAxialHomo(tempSourceId, tempSource);
                var radialHomogenity = getRadialHomo(tempSourceId, tempSource);
                
                var uucTrialAverage = average(uucTrialArray);
                var standardTrialAverage = average(standardTrialArray);

                var uncUUCResolution = UncUUCReso(uucResolution, readability);
                var uncStandardPRT = PRTstandardUncertainty/2;

                var uucStdDev = standardDev(uucTrialArray);
                var standardStdDev = standardDev(standardTrialArray);
                var correctedOfValue = correctedValue(standardTrialAverage, correctionFromCertificate);
                var UncRepeatabilityUUC = UncRepeatability(uucStdDev);
                var UncRepeatabilityStandard = UncRepeatability(standardStdDev);
                var UncReadoutStandardUncertainty = UncStandardReadout(readoutStandardUncertainty);
                var UncertaintyDrift = UncDrift(drift);

                const hysteresisValue = (arrayUUCStart,arrayUUCEnd,arraySTDStart,arraySTDEnd,startPoint,endPoint,standardUsedStart,standardUsedEnd,arrayStandardValues) => {
                    var uucAverageStart = average(arrayUUCStart);
                    var uucAverageEnd = average(arrayUUCEnd);

                    var standardAverageStart = average(arraySTDStart);
                    var standardAverageEnd = average(arraySTDEnd);

                    var correctionFromCertificateStart = correctionFromCert(startPoint, standardUsedStart, arrayStandardValues); 
                    var correctionFromCertificateEnd = correctionFromCert(endPoint, standardUsedEnd, arrayStandardValues); 

                    var correctedValueStart = correctedValue(standardAverageStart, correctionFromCertificateStart);
                    var correctedValueEnd = correctedValue(standardAverageEnd, correctionFromCertificateEnd);

                    return hysteresis({
                    uucReadingAve1:Number(uucAverageStart),
                    uucReadingAve2:Number(uucAverageEnd),
                    correctedValue1:Number(correctedValueStart),
                    correctedValue2:Number(correctedValueEnd),
                    });

                }

                var hyst = hysteresisValue(uucTrialArrayStart,uucTrialArrayEnd,standardTrialArrayStart,standardTrialArrayEnd,testPointStart,testPointEnd,standardUsedStart,standardUsedEnd,ArrayOfStandardValues);
                var combinedUncert = combinedUncertainty(uncUUCResolution,UncRepeatabilityStandard,UncRepeatabilityUUC,UncReadoutStandardUncertainty,UncertaintyDrift,bathInstability,axialHomogenity,radialHomogenity,hyst,uncStandardPRT)
                var veffect = vEffective(combinedUncert,uncUUCResolution,UncRepeatabilityStandard,UncRepeatabilityUUC,uncStandardPRT,UncertaintyDrift,bathInstability,axialHomogenity,radialHomogenity,hyst)
                var k = calculateK(veffect);
                var expandUncert = expandedUncertainty(combinedUncert, k);

                tableArray['table'+i]['row'+(x+1)] = {};
                tableArray['table'+i]['row'+(x+1)]['testPoint'] = testPoint;
                tableArray['table'+i]['row'+(x+1)]['uucTrialArray'] = uucTrialArray;
                tableArray['table'+i]['row'+(x+1)]['standardTrialArray'] = standardTrialArray;
                tableArray['table'+i]['row'+(x+1)]['uucTrialAverage'] = uucTrialAverage;
                tableArray['table'+i]['row'+(x+1)]['standardTrialAverage'] = standardTrialAverage;
                tableArray['table'+i]['row'+(x+1)]['uucStdDev'] = uucStdDev;
                tableArray['table'+i]['row'+(x+1)]['uncStandardPRT'] = uncStandardPRT;
                tableArray['table'+i]['row'+(x+1)]['standardStdDev'] = standardStdDev;
                tableArray['table'+i]['row'+(x+1)]['uncUUCResolution'] = uncUUCResolution;
                tableArray['table'+i]['row'+(x+1)]['UncRepeatabilityUUC'] = UncRepeatabilityUUC;
                tableArray['table'+i]['row'+(x+1)]['UncRepeatabilityStandard'] = UncRepeatabilityStandard;
                tableArray['table'+i]['row'+(x+1)]['correctionFromCertificate'] = correctionFromCertificate;
                tableArray['table'+i]['row'+(x+1)]['correctedValue'] = correctedOfValue;
                tableArray['table'+i]['row'+(x+1)]['readoutStandardUncertainty'] = readoutStandardUncertainty;
                tableArray['table'+i]['row'+(x+1)]['UncReadoutStandardUncertainty'] = UncReadoutStandardUncertainty;
                tableArray['table'+i]['row'+(x+1)]['PRTstandardUncertainty'] = PRTstandardUncertainty;
                tableArray['table'+i]['row'+(x+1)]['drift'] = drift;
                tableArray['table'+i]['row'+(x+1)]['UncDrift'] = UncertaintyDrift;
                tableArray['table'+i]['row'+(x+1)]['bathInstability'] = bathInstability;
                tableArray['table'+i]['row'+(x+1)]['axialHomogenity'] = axialHomogenity;
                tableArray['table'+i]['row'+(x+1)]['radialHomogenity'] = radialHomogenity;
                tableArray['table'+i]['row'+(x+1)]['hysteresis'] = hyst;
                tableArray['table'+i]['row'+(x+1)]['combinedUncertainty'] = combinedUncert;
                tableArray['table'+i]['row'+(x+1)]['veffect'] = veffect; 
                tableArray['table'+i]['row'+(x+1)]['k'] = k;  
                tableArray['table'+i]['row'+(x+1)]['expandedUncertainty'] = expandUncert; 
                tableArray['table'+i]['row'+(x+1)]['tempSourceId'] = tempSourceId; 
                tableArray['table'+i]['row'+(x+1)]['standardUsed'] = standardUsed; 

                
            }
            calculatedArray.push(tableArray);
        }
        

        return calculatedArray;   
    }



    function getInputtedValuesFromSpecifications(){
        var range = document.getElementById('range');
        var resolution = document.getElementById('resolution');
        var readability = document.getElementById('readability');
        var manufacturer = document.getElementById('manufacturer');
        var modelNumber = document.getElementById('modelNumber');
        var serialNumber = document.getElementById('serialNumber');
        var equipmentNumber = document.getElementById('equipmentNumber');
        var immersionDepth = document.getElementById('immersionDepth');
        var sersorType = document.getElementById('sersorType');
        var sensorManufacturer = document.getElementById('sensorManufacturer');
        var sensorModelNumber = document.getElementById('sensorModelNumber');
        var sensorSerialNumber = document.getElementById('sensorSerialNumber');
        var sensorEquipmentNumber = document.getElementById('sensorEquipmentNumber');
        var liquidInGlass = document.querySelector('input[name="liquidInGlass"]:checked');
        var partialImmersion = document.getElementById('partialImmersion');
        var description = document.getElementById('description');
        

        var specificationsArray = {"specifications":{}};

        specificationsArray.specifications["range"] = range.value;
        specificationsArray.specifications["resolution"] = resolution.value;
        specificationsArray.specifications["readability"] = readability.value;
        specificationsArray.specifications["manufacturer"] = manufacturer.value;
        specificationsArray.specifications["modelNumber"] = modelNumber.value;
        specificationsArray.specifications["serialNumber"] = serialNumber.value;
        specificationsArray.specifications["equipmentNumber"] = equipmentNumber.value;
        specificationsArray.specifications["immersionDepth"] = immersionDepth.value;
        specificationsArray.specifications["sersorType"] = sersorType.value;
        specificationsArray.specifications["sensorManufacturer"] = sensorManufacturer.value;
        specificationsArray.specifications["sensorModelNumber"] = sensorModelNumber.value;
        specificationsArray.specifications["sensorSerialNumber"] = sensorSerialNumber.value;
        specificationsArray.specifications["sensorEquipmentNumber"] = sensorEquipmentNumber.value;
        specificationsArray.specifications["liquidInGlass"] = liquidInGlass.value;
        specificationsArray.specifications["partialImmersion"] = partialImmersion.value;
        specificationsArray.specifications["description"] = description.value;
        
        return specificationsArray;
    }

    function getInputtedValuesFromEnvironment(){
        var startTemp = document.getElementById('startTemp');
        var endTemp = document.getElementById('endTemp');
        var startRH = document.getElementById('startRH');
        var endRH = document.getElementById('endRH');
        var startAtmPressure = document.getElementById('startAtmPressure');
        var endtAtmPressure = document.getElementById('endtAtmPressure');

        var environmentArray = {"environment":{}};

        environmentArray.environment["startTemp"] = startTemp.value;
        environmentArray.environment["endTemp"] = endTemp.value;
        environmentArray.environment["startRH"] = startRH.value;
        environmentArray.environment["endRH"] = endRH.value;
        environmentArray.environment["startAtmPressure"] = startAtmPressure.value;
        environmentArray.environment["endtAtmPressure"] = endtAtmPressure.value;

        return environmentArray;
    }


    // function storeToHiddens(){
    //     var specificationsArray = document.getElementById('specificationsArray');
    //     var environmentArray = document.getElementById('environmentArray');
    //     var calculatedValues = document.getElementById('calculatedValues');

    //     specificationsArray.value = JSON.stringify(getInputtedValuesFromSpecifications());
    //     environmentArray.value = JSON.stringify(getInputtedValuesFromEnvironment());
    //     calculatedValues.value = "";
    //     calculatedValues.value = JSON.stringify(calculate());
    // }
    
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
			console.log('Unable to Calculate \n'+error.message);
		}
		
		
	}

	function submitForm(idOfForm){
		document.getElementById('completion').value = "Pending";
		try {
			storeToHiddens();
			document.getElementById(idOfForm).submit();
		} catch (error) {
			console.log(error);
			console.log('Unable to Calculate \n'+error.message);
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

    function getEmailOfVerifier(copyFrom){
		var from = document.getElementById(copyFrom);
		var verifierEmail = document.getElementById('verifierEmail');
		verifierEmail.value = from.selectedOptions[0].dataset['email'];
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

        bind('standardModalSelect','click',function(){
            getWeight();
            // addRowToTestWeightSelectModal('testWeightSelectHead','testWeightSelectBody');
        });
        bind('generateDataButton','click',function(){
            storeToHiddens();
            submitForm('thermometerForm');
        }); 
        bind('addButtonMeasurementTables','click',function(){
            addTablesToDiv("measurementDataTables")
        }); 
        
        bind('removeButtonMeasurementTables','click',function(){
            deleteTable("measurementDataTables")
        }); 
	}

	bindEventsToInputAndButtons();
    let calculateButtonClicked = false;
    function calculateCancelCalculate() {
        calculateButtonClicked = !calculateButtonClicked;

        const calculateButton = $("#calculateButtonMeasurementTables").first();
        const addButtons = $("button[id*='addButton']");
        const removeButtons = $("button[id*='removeButton']");

        if (calculateButtonClicked) {
            calculateButton.html("Cancel");
            addButtons.attr("disabled", "disabled").removeClass("btn-success").addClass("btn-secondary");
            removeButtons.attr("disabled", "disabled").removeClass("btn-danger").addClass("btn-secondary");
        } else {
            calculateButton.html("Calculate");
            addButtons.removeAttr("disabled").removeClass("btn-secondary").addClass("btn-success");
            removeButtons.removeAttr("disabled").removeClass("btn-secondary").addClass("btn-danger");
        }
    }
    $("#calculateButtonMeasurementTables").click(calculateCancelCalculate);


    // function getInputtedValuesFromSpecifications(){
    //     var range = document.getElementById('range');
    //     var resolution = document.getElementById('resolution');
    //     var readability = document.getElementById('readability');
    //     var manufacturer = document.getElementById('manufacturer');
    //     var modelNumber = document.getElementById('modelNumber');
    //     var serialNumber = document.getElementById('serialNumber');
    //     var equipmentNumber = document.getElementById('equipmentNumber');
    //     var immersionDepth = document.getElementById('immersionDepth');
    //     var sersorType = document.getElementById('sersorType');
    //     var sensorManufacturer = document.getElementById('sensorManufacturer');
    //     var sensorModelNumber = document.getElementById('sensorModelNumber');
    //     var sensorSerialNumber = document.getElementById('sensorSerialNumber');
    //     var sensorEquipmentNumber = document.getElementById('sensorEquipmentNumber');
    //     var liquidInGlass = document.querySelector('input[name="liquidInGlass"]:checked');
    //     var partialImmersion = document.getElementById('partialImmersion');
    //     var description = document.getElementById('description');

    //     var specificationsArray = {"specifications":{}};

    //     specificationsArray.specifications["range"] = range.value;
    //     specificationsArray.specifications["resolution"] = resolution.value;
    //     specificationsArray.specifications["readability"] = readability.value;
    //     specificationsArray.specifications["manufacturer"] = manufacturer.value;
    //     specificationsArray.specifications["modelNumber"] = modelNumber.value;
    //     specificationsArray.specifications["serialNumber"] = serialNumber.value;
    //     specificationsArray.specifications["equipmentNumber"] = equipmentNumber.value;
    //     specificationsArray.specifications["immersionDepth"] = immersionDepth.value;
    //     specificationsArray.specifications["sersorType"] = sersorType.value;
    //     specificationsArray.specifications["sensorManufacturer"] = sensorManufacturer.value;
    //     specificationsArray.specifications["sensorModelNumber"] = sensorModelNumber.value;
    //     specificationsArray.specifications["sensorSerialNumber"] = sensorSerialNumber.value;
    //     specificationsArray.specifications["sensorEquipmentNumber"] = sensorEquipmentNumber.value;
    //     specificationsArray.specifications["liquidInGlass"] = liquidInGlass.value;
    //     specificationsArray.specifications["partialImmersion"] = partialImmersion.value;
    //     specificationsArray.specifications["description"] = description.value;

    //     return specificationsArray;
    // }

    // function getInputtedValuesFromEnvironment(){
    //     var startTemp = document.getElementById('startTemp');
    //     var endTemp = document.getElementById('endTemp');
    //     var startRH = document.getElementById('startRH');
    //     var endRH = document.getElementById('endRH');
    //     var startRH = document.getElementById('startAtmPressure');
    //     var endRH = document.getElementById('endRH');

    //     var environmentArray = {"environment":{}};

    //     environmentArray.environment["startTemp"] = startTemp.value;
    //     environmentArray.environment["endTemp"] = endTemp.value;
    //     environmentArray.environment["startRH"] = startRH.value;
    //     environmentArray.environment["endRH"] = endRH.value;

    //     return environmentArray;
    // }


    function storeToHiddens(){
        var specificationsArray = document.getElementById('specificationsArray');
        var environmentArray = document.getElementById('environmentArray');
        var calculatedValues = document.getElementById('calculatedValues');

        specificationsArray.value = JSON.stringify(getInputtedValuesFromSpecifications());
        environmentArray.value = JSON.stringify(getInputtedValuesFromEnvironment());
        calculatedValues.value = JSON.stringify(calculate());
        addToUncertaintyBudgetTable()
    }

    var CalData;
    function addToUncertaintyBudgetTable(){
        let tbody = document.getElementById('uncertBudgetTBody');
        CalData = JSON.parse(document.getElementById('calculatedValues').value);

        var countofTable = calculatedDatas.length;
        for (let i = 0; i < countofTable; i++) {
            for (let x = 1; x <= countOfRows; x++) {
                let uncBudgetTbody = document.getElementById('uncertBudgetTBody');
               
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

               
               td1.innerHTML = calculatedDatas[i][tableName][rowName]['testPoint']
               td2.innerHTML = calculatedDatas[i][tableName][rowName]['uncUUCResolution']
               td3.innerHTML = calculatedDatas[i][tableName][rowName]['UncRepeatabilityStandard']
               td4.innerHTML = calculatedDatas[i][tableName][rowName]['UncRepeatabilityUUC']
               td5.innerHTML = calculatedDatas[i][tableName][rowName]['uncStandardPRT']
               td6.innerHTML = calculatedDatas[i][tableName][rowName]['UncDrift']
               td7.innerHTML = calculatedDatas[i][tableName][rowName]['bathInstability']
               td8.innerHTML = calculatedDatas[i][tableName][rowName]['axialHomogenity']
               td9.innerHTML = calculatedDatas[i][tableName][rowName]['radialHomogenity']
               td10.innerHTML = calculatedDatas[i][tableName][rowName]['hysteresis']
               td11.innerHTML = calculatedDatas[i][tableName][rowName]['combinedUncertainty']
               td12.innerHTML = calculatedDatas[i][tableName][rowName]['veffect']
               td13.innerHTML = calculatedDatas[i][tableName][rowName]['k']
               td14.innerHTML = calculatedDatas[i][tableName][rowName]['expandedUncertainty']

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
               uncBudgetTbody.append(tr)
            }
        }
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

    function getEmailOfVerifier(copyFrom){
		var from = document.getElementById(copyFrom);
		var verifierEmail = document.getElementById('verifierEmail');
		verifierEmail.value = from.selectedOptions[0].dataset['email'];
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
        bind('sDate','change',function(){
            setDate()
        });
       
        bind('verifierList','change',function(){
            copyFromDataset('verifierList', 'verifierPositionList', 'verifierposition')
            getEmailOfVerifier('verifierList');
        });
        bind('verifierPositionList','change',function(){
            copyFromDataset('verifierPositionList', 'verifierList', 'verifiername')
        });

        bind('standardModalSelect','click',function(){
            getWeight();
            // addRowToTestWeightSelectModal('testWeightSelectHead','testWeightSelectBody');
        });
        bind('generateDataButton','click',function(){
            storeToHiddens();
            submitForm('thermometerForm');
        }); 
        bind('addButtonMeasurementTables','click',function(){
            addTablesToDiv("measurementDataTables")
        }); 
        
        bind('removeButtonMeasurementTables','click',function(){
            deleteTable("measurementDataTables")
        }); 

        //addGenerateLink()
	}

    function addGenerateLink(){
        let worksheetPDFhref = '/worksheets/DigitalThermometer/' + datas.id;
        let certificatePDFhref = '/testWeightEdit/' + datas.id;
        $("#worksheetPDF").attr('href', worksheetPDFhref);
        $("#certificatePDF").attr('href', certificatePDFhref);
    }

	bindEventsToInputAndButtons();

    
</script>
<script src="/dashboardAsset/lib/jquery/jquery.min.js"></script>
<script src="/dashboardAsset/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/dashboardAsset/lib/feathericons/feather.min.js"></script>
<script src="/dashboardAsset/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/dashboardAsset/assets/js/script.js"></script>
<script src="/js/module5Formulas.js"></script>
</body>
</html>

