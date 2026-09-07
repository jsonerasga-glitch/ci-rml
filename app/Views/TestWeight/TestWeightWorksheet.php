<?php

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

<script type="text/javascript">

</script>

<!DOCTYPE html>
<?= view('layouts/head'); ?>

<body class="skin-base animate">
    <?php
		$data = [
			'active' => 'worksheet1',
			'show' => 'worksheet',
		];
		echo view('layouts/sidebarAdmin',$data)?>


    <div class="content">
        <div class="content-header">
            <a id="contentMenu" href="#" class="content-menu d-none d-lg-flex"><i data-feather="menu"></i></a>
            <a id="mobileMenu" href="#" class="content-menu d-lg-none"><i data-feather="menu"></i></a>
        </div>
        <div class="content-body">
            <div class="container-fluid">
                <div id="userTable"></div>
                <div class="">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class="card-header bg-white">
                            <div class="row mt-2">
                                <label for="" class="content-label">
                                    <b>Test Weight</b>
                                </label>
                            </div>
                            <div class="row ">
                                <form id="testWeightForm" name="testWeightForm" enctype="multipart/form-data">
                                    <input type="hidden" name="completion" id="completion" value="Pending"> 
                                    <input name='allData' id='allData' type="hidden">
                                    <input type="hidden" name="calculatedData" id="calculatedData" value="{}">
                                    <input type="hidden" name="idOfCustomer" id="idOfCustomer">
                                    <input type="hidden" id='weight' name="weight">
                                    <input type="hidden" name="verifierEmail" id="verifierEmail">
                                    <input type="hidden" name="calibratorAccountEmail" id="calibratorAccountEmail" value="<?= session('email')?>">
						            <input type="hidden" name="calibratorAccountID" id="calibratorAccountID" value="<?= session('id')?>">
                                    <input type="hidden" name="idOfCertificate" id="idOfCertificate" value="<?= $id;?>">
                                    <input type="hidden" id="moduleNumber" value="3">
                                    <input type="hidden" id="isNew">
                                    <div class='row'>
                                        <div class="card m-2 border-light">
                                            <div class="card-header text-white bg-primary">
                                                <div class="row">
                                                    <div class="mx-auto d-flex justify-content-center">
                                                        <h3>Customer Information</h3>
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)"> 
                                                <div class="row">
                                                    <div class='col'>
                                                        <div class="mb-3">
                                                            <label>Name</label>
                                                            <input name='customer' id="customer" data-group="customer_information" list='customerList' required type="text" class="form-control mt-n2 text-break" onchange="getCustomerDetails()">
                                                            <datalist id="customerList">
                                                            </datalist>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label>Address</label>
                                                            <textarea name='address' id="address" data-group="customer_information" type="text" class="form-control" style="margin-top: 0px;margin-bottom: 0px;height: 80px;"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class='col'>
                                                        <div class="">
                                                            <label>TSR Number</label>
                                                            <input name='tsrNumber' id='tsrNumber' data-group="customer_information" type="text" class="form-control text-break mt-n2">
                                                        </div>
                                                        <div class=" mt-2">
                                                            <label>Date Received</label>
                                                            <input name='dateReceived' id='dateReceived' type="date" data-group="customer_information" class="form-control text-break">
                                                        </div>
                                                        <div class=" mt-2">
                                                            <label>Recommended Due Date</label>
                                                            <div class="input-group">
                                                                <select class="form-select" id="recommendedDueDateSelect" data-group="customer_information" >
                                                                    <option value="0" selected>N/A</option>
                                                                    <option value="6">Six Months</option>
                                                                    <option value="12">One Year</option>
                                                                    <option value="24">2 Years</option>
                                                                </select>
                                                                <input name='recommendedDueDate' id="eDate" data-group="customer_information" required type="date" class="form-control text-break">
                                                            </div>
                                                        </div>         
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card m-2 border-light">
                                            <div class="card-header text-white bg-primary">
                                                <div class="row">
                                                    <div class="mx-auto d-flex justify-content-center">
                                                        <h3>Equipment Information</h3>
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)"> 
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-1">
                                                            <label>Date Calibrated</label>
                                                            <input name='dateCalibrated' id="sDate" data-group="equipment_information" type="date" class="form-control text-break">
                                                        </div>
                                                        <div class="mb-1">
                                                            <label>Calibration Certificate Number</label>
                                                            <div class="input-group">
                                                                <input name='certificateNumber' data-group="equipment_information" id='certificateNumber' type="text" class="form-control text-break mt-n2">
                                                                <span class="input-group-text bg-white text-white d-none" id='certificateNumberValid'>
                                                                    <div class="spinner-border" id='loading'>
                                                                    </div>
                                                                    <div id='certificateNumberValidText'></div>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class='mb-1'>
                                                            <label>Description</label>
                                                            <input name='equipmentDescription' id='equipmentDescription' type="text" data-group="equipment_information" class="form-control">
                                                        </div>
                                                        <div class='mb-1'>
                                                            <label>Manufacturer</label>
                                                            <input name='manufacturer' id='manufacturer' type="text" data-group="equipment_information" class="form-control">
                                                        </div>
                                                        <div class='mb-1'>
                                                            <label>Model</label>
                                                            <input name='model' id='model' type="text" data-group="equipment_information" class="form-control">
                                                        </div>
                                                        <div class='mb-1'>
                                                            <label>Serial Number (Set "<i>See measurement result</i>" if set of weights)</label>
                                                            <input name='serialNumber' id='serialNumber' type="text" data-group="equipment_information" class="form-control">
                                                        </div>
                                                        <div class='mb-1'>
                                                            <label>Equipment ID</label>
                                                            <input name='equipmentID' id='equipmentID' type="text" data-group="equipment_information" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-1">
                                                            <label>Place of Calibration</label>
                                                            <select name="placeOfCalibration" id="placeOfCalibration" data-group="equipment_information" class="select-lg form-control" id="">
                                                                <option selected value="Mass Laboratory">Mass Laboratory</option>
                                                                <option value="On Site">On Site</option>
                                                            </select>
                                                        </div> 
                                                        <div class='mb-1'>
                                                            <label>Class</label>
                                                            <select class="custom-select form-control" data-group="equipment_information" id="classEquipment" name="Class">
                                                                <option value="None Indicated">None Indicated</option>
                                                                <option value="E2">E2</option>
                                                                <option value="F1">F1</option>
                                                                <option value="F2">F2</option>
                                                                <option value="M1">M1</option>
                                                                <option value="M2">M2</option>
                                                                <option value="M3">M3</option>
                                                                <option value="ASTM Class 4">ASTM Class 4</option>
                                                                <option value="ASTM Class 3">ASTM Class 3</option>
                                                                <option value="ME-9348">ME-9348</option>
                                                            </select>
                                                        </div>   
                                                        <div class='mb-1'>
                                                            <label>Approximated Class</label>
                                                            <select class="custom-select form-control" id="approxClass" data-group="equipment_information" name="approxClass" onchange="//setCycle(this.value)">
                                                                <option value="None Indicated">None Indicated</option>
                                                                <option value="E2">E2</option>
                                                                <option value="F1">F1</option>
                                                                <option value="F2">F2</option>
                                                                <option value="M1">M1</option>
                                                                <option value="M2">M2</option>
                                                                <option value="M3">M3</option>
                                                                <option value="FREE">FREE</option>
                                                            </select>
                                                        </div>                                    
                                                        <div class='mb-1'>
                                                            <label>Cycle</label>
                                                            <input name='cycle' id='cycle' type="text" data-group="equipment_information" data-required="true" class="form-control" tabindex="-1" >
                                                        </div>
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
                                                        <button type="button" class="btn btn-danger float-end btn-lg" style="right:0;top:0;" data-toggle="modal" data-target="#standardModal">Select Reference Weight</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card m-2 border-light">
                                            <div class="card-header text-white bg-primary">
                                                <div class="row">
                                                    <div class="mx-auto d-flex justify-content-center">
                                                        <h3>Raw Data</h3>
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)"> 
                                                <div class="row  justify-content-center  mb-4">
                                                    <div class="col mx-auto d-flex align-center"> 
                                                        <button type="button" class="btn btn-success" id="addNewTable" onclick="//addAnotherInfo()//tableCreate()">
                                                            <i class="fas fa-table"></i>
                                                            Add Table
                                                        </button>
                                                    </div>
                                                    <div class="col mx-auto d-flex">
                                                        <button type="button" class=" btn btn-success" id="removeTable" onclick="//deleteTable()//tableCreate()">
                                                            <i class="fas fa-table"></i>
                                                            Delete Table
                                                        </button>
                                                    </div>
                                                    <div class="col mx-auto d-flex">
                                                        <button type="button" class=" btn btn-success" id="calculateButton" onclick="calculateWithErrorHandling()//calculateTheAlert()">
                                                            <i class="fas fa-database"></i>
                                                            Calculate
                                                        </button>
                                                        <span id="cancelCalculate" style="display:none" onclick="cancelCalculate()">Cancel</span>
                                                    </div>
                                                </div>
                                                <div class="row text-center container-fluid">
                                                    <!-- Tables -->
                                                    <div id="TableDiv">

                                                    </div>
                                                    <div class="accordion" id='rawDataTables'>
        
                                                    </div>
                                                    </form>
                                                </div>
                                                
                                            </div>
                                        </div>

                                        <div class="card m-2 border-light">
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
                                                            <tr>
                                                                <th>Nominal Mass</th>
                                                                <th>m<sub>s</sub></th>
                                                                <th>u<sub>ms</sub></th>
                                                                <th>ΔI</th>
                                                                <th>u<sub>ΔI</sub></th>
                                                                <th>u<sub>s</sub></th>
                                                                <th>u<sub>d</sub></th>
                                                                <th>ρ<sub>a</sub></th>
                                                                <th>ρ<sub>0</sub></th>
                                                                <th>u<sub>ρuuc</sub></th>
                                                                <th>u<sub>ρstd</sub></th>
                                                                <th>u<sub>ρa</sub></th>
                                                                <th>u<sub>b<sup>2</sup></sub></th>
                                                                <th>u(m<sub>cr</sub>)</th>
                                                                <th>u<sub>w</sub>(Δm<sub>c</sub>)</th>
                                                                <th>u<sub>ba</sub></th>
                                                                <th>u<sub>c</sub></th>
                                                                <th>k</th>
                                                                <th>U</th>
                                                                <th>Unit</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="uncertBudgetTBody"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card m-2 border-light">
                                            <div class="card-header text-white bg-primary">
                                                <div class="row">
                                                    <div class="mx-auto d-flex justify-content-center">
                                                        <h3>Personnel</h3>
                                                    </div>
                                                </div> 
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
                                                                    <select  name="calibratedBy" id="calibratedBy" class="form-control">
                                                                    </select>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="input-group input-group-sm">
                                                                    <select  name="checkedBy" id="checkedBy" class="form-control">
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
                                                                    <select  name="verifierPosition" id="verifierPosition" class="form-control">
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
                                                <div class="btn-toolbar" role="toolbar">
                                                    <div class="btn-group me-2" role="group">
                                                        <button type="button" class="btn btn-success" id="worksheetPDF" data-group='tools'>Generate Worksheet PDF</button>
                                                    </div>
                                                    <input type="hidden" id="idDraft">
                                                    <input type="hidden" id="status">
                                                    <div class="btn-group me-2" role="group">
                                                        <button type="button" class="btn btn-warning" id="certificatePDF" data-group='tools' disabled>Certificate PDF</button>
                                                        <button type="button" class="btn btn-warning" id="certificatePDFDraft" data-group='tools'>Draft Certificate PDF</button>
                                                        <button type="button" class="btn btn-warning" id="certificatePDFDownload" data-group='tools'>Download Certificate PDF</button>
                                                    </div>
                                                    <form class='d-none' action="" method="POST" target="_blank" id="certificateForm" name="certificateForm" rel="noopener">
                                                        <input type="hidden" id="certificateId" name='certificateId'>
                                                        <input type="hidden" id="certificateDraft" name='certificateDraft'>
                                                        <input type="hidden" id="certificateDownload" name='certificateDownload'>
                                                        <input type="hidden" id="certificateLabel" name='certificateLabel'>
                                                    </form>
                                                    <div class="btn-group me-2" role="group">
                                                        <button type="button" class="btn btn-danger" id="editRemarks" data-group='tools'>Edit Remarks</button>
                                                    </div>
                                                    <div class="input-group">
                                                        <button class="btn btn-primary" type="button" id="imageUploadButton" onclick="//uploadFiles()" data-group='tools'>Upload</button>
                                                        <input type="file" class="form-control" id="fileInput" multiple data-group='tools'>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div>
                                                    <div class="col mt-2">
                                                        <div id='adminTools' class="row mb-3 d-none">
                                                            <label class="label mb-2">Admin Tools</label>
                                                            <div class="btn-toolbar" role="toolbar">
                                                                <div class="btn-group me-2" role="group">
                                                                    <button type="button" class="btn btn-success" data-group='tools' id='verifyButton'>Verify</button>
                                                                    <button type="button" class="btn btn-danger" data-group='tools' id='correctionButton'>For Correction</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-floating">
                                                                <textarea class="form-control" placeholder="Comments" id="correctionComments" style="height: 100px" data-group='tools'></textarea>
                                                                <label class="ps-4" for="correctionComments" style="color:black">Comments</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                        </div>

                        <div class="btn-toolbar position-fixed" style="bottom: 75px; right:20px; z-index:999" role="toolbar">
                            <div class="btn-group me-2" role="group">
                                <button type="button" class="btn btn-danger" id="submitButton">Submit</button>
                            </div>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-info" id="saveButton">Save</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col justify-content-right">
                                <a href="dashboard" class="btn btn-lg btn-danger mt-3 mx-3 float-right"><i
                                        data-feather="skip-back"></i> Back</a>
                            </div>
                            <div class="col">
                                <button type="button" class="float saveButton d-none" data-toggle="modal"
                                    data-target="#confirmationModal">
                                    <i data-feather="save" style="font-size: 50px;"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
                        <div id="toastSaved" class="toast hide d-flex align-items-center text-white bg-success border-0 " role="alert">
                            <div class="toast-body">
                            Saved
                            </div>
                        </div>
                    </div>
                    <!-- modal for Confirmation -->
                    <div class="modal fade" id="confirmationModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Changes have been made.</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Would you like to save?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Dismiss</button>
                                    <button type="button" class="btn btn-primary"
                                        onclick="confirmationSave('testWeightForm')">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal for Confirmation -->

               
            </div>
        </div>
        
    </div>
  
    <div class="position-fixed top-0 end-0 p-3" style="z-index:11">
        <div id="toastContainer" class="toast-container"></div>
    </div> 

    <div class="banner bg-warning d-none" id='oldBanner'>
        <h2>This is Using the Old Format and Structure</h2>
        <h4>Please Don't Calculate and Update</h4>
    </div>

    <div class="modal fade" id="standardModal" tabindex="-1" >
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Standard</h5>
                </div>
                <div class="modal-body">
                    <table class="table table-hover table-striped table-borderless" id="modalStandardTable"  style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Standard</th>
                                <th>Class</th>
                                <th>Serial No.</th>
                                <th>Type</th>
                                <th>Certificate no.</th>
                                <th>Laboratory</th>
                                <th>Days Due</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-dismiss="modal" onclick='processModalStandardCheckbox();'>Apply</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="standardValuesModal" tabindex="-1" >
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        <h5>Selected Standard</h5>
                        <table class="table table-borderless">
                            <tr>
                                <td><span class="fw-bold">Standard used: </span></td>
                                <td ><span id="marksUsed"></span></td>
                            </tr>
                            <tr>
                                <td><span class="fw-bold">Conventional Mass (g):</span></td>
                                <td><span id="convenMassTotalG"></span></td>
                                <td><span class="fw-bold">Uncertainty:</span></td>
                                <td><span id="uncertaintyTotal"></span></td>                            
                            </tr>
                            <tr>
                                <td><span class="fw-bold">Drift:</span></td>
                                <td><span id="driftTotalG"></span></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-body">
                    
                    <input type="hidden" id="idOfMarksUsed">
                    <table class="table table-hover table-striped table-borderless" id="modalStandardValueTable">
                        <thead>
                            <tr>
                                <th>Nominal Value</th>
                                <th>Serial Number</th>
                                <th>Marking</th>
                                <th>Class</th>
                                <th></th>
                                <th>Conventional Mass</th>
                                <th>Unit</th>
                                <th>Uncertainty (mg)</th>
                                <th>MPE</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="statementsModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Custom Statements</h5>
                    <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="" style="justify-content:center;">
                        <div class="form-group">
                            <label for="settingCalibrationProcedureAndTraceability">Calibration Procedure</label>
                            <textarea class="form-control" id="settingCalibrationProcedureAndTraceability" rows="3"></textarea>
                        </div> 
                        <div class="form-group">
                            <label for="settingUncertaintyOfMeasurement">Uncertainty of Measurement</label>
                            <textarea class="form-control" id="settingUncertaintyOfMeasurement" rows="3"></textarea>
                        </div> 
                        <div class="form-group">
                            <label for="settingCalibrationResults">Calibration Results</label>
                            <textarea class="form-control" id="settingCalibrationResults" rows="3"></textarea>
                        </div>
                        <div class="form-group d-none">
                            <label for="settingMeasurementCondition">Measurement Condition</label>
                            <textarea class="form-control" id="settingMeasurementCondition" rows="3"></textarea>
                        </div>
                        
                        <div class="form-group" id="remarksDiv"></div>
                        <input type="hidden" id="settingRemarks">
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-toolbar" role="toolbar">
                        <div class="btn-group me-2" role="group" id="remarksButton"></div>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-warning mb-2" id='modalUpdateRemarks'>Update Statements</button>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
    </div>
</body>

<script>
    const personnels = <?= json_encode($personnel)?>;
    const verifiers = <?= json_encode($verifier)?>;
    const customers = <?= json_encode($customers)?>;
    const alloyDetails = <?= json_encode($alloyDetails)?>;
    const sensitivityTest = <?= json_encode($sensitivityTest)?>;
    const standardDetails = <?= json_encode($standardData)?>;
    const arrStandardValues = <?= json_encode($standardValuesData)?>;
    const mpeArray = <?= json_encode($mpe)?>;
</script>

<script src="<?= base_url('/js/module3-v1.1.2.js')?>"></script>
<script src="<?= base_url('/js/module3Formulas.js')?>"></script>

<?= view('layouts/footer'); ?>

</html>
