<!DOCTYPE html>
<html lang="en">
<?= view('layouts/head'); ?>
<body class="skin-base animate">
    <?php
		$data = [
			'active' => 'worksheet9',
			'show' => 'worksheet',
		];
		echo view('layouts/sidebarAdmin',$data)
    ?>
    <main class="content">
        <input type="hidden" name="idOfCertificate" id="idOfCertificate" value="<?= $id;?>">
        <input type="hidden" name="calculatedData" id="calculatedData">
        <input type="hidden" id="moduleNumber" value="9">
        <div class="card m-5 border-light bg-transparent">
            <div class="card-body">
                <!-- Customer information -->
                <div class="card m-2 border-light">
                    <div class="card-header text-white bg-primary">
                        <h3 class="card-title d-flex justify-content-center">Customer information</h3>
                    </div>
                    <div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)">
                        <div class="row ">
                            <div class="col">        
                                <div class="mb-2">
                                    <label>Customer:</label>
                                    <input name='customer' id="customer" data-group="customer_information" data-required="false" list='customerList'  type="text" class="form-control mt-n2 text-break" onchange="getCustomerDetails()">
                                    <datalist id="customerList">
                                        <option value='Customers' selected></option>
                                    </datalist>
                                    <input type="hidden" name="idOfCustomer" id="idOfCustomer">
                                </div>
                                <div class="mb-2">
                                    <label class="">Address</label>
                                    <input name='address' id="address" data-group="customer_information" data-required="false" type="text" class="form-control" style="height:130px">
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
                                
                                <div class="mb-3">
                                    <label>Recommended Due Date</label>
                                    <div class="input-group">
                                        <select class="form-select" id="recommendedDueDateSelect" data-group="customer_information">
                                            <option value="0" selected>N/A</option>
                                            <option value="6">Six Months</option>
                                            <option value="12">One Year</option>
                                            <option value="24">2 Years</option>
                                        </select>
                                        <input name='recommendedDueDate' id="recommendedDueDate" data-group="customer_information" required type="date" class="form-control text-break">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Equipment information -->
                <div class="card m-2 border-light">
                    <div class="card-header text-white bg-primary">
                        <h3 class="card-title d-flex justify-content-center">Equipment information</h3>
                    </div>
                    <div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)">
                        <div class="row ">
                            <div class="col">       
                                <div class="mb-3">
                                    <label>Date calibrated</label>
                                    <input name='dateCalibrated' id="dateCalibrated"  data-group="equipment_information" type="date" class="form-control mt-n2" tabindex="5">
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
                                <div class="mb-2">
                                    <label class="">Description</label>
                                    <input name='equipmentDescription' id="equipmentDescription"  data-group="equipment_information" type="text" class="form-control " tabindex='8'>
                                </div>                    
                                <div class="mb-2">
                                    <label class="">Manufacturer</label>
                                    <input name='manufacturer' id="manufacturer"  data-group="equipment_information" type="text" class="form-control " tabindex='9'>
                                </div>
                                <div class="mb-2">
                                    <label class="">Identifying Marks / Model</label>
                                    <input name='modelNumber' id="modelNumber"  data-group="equipment_information" type="text" class="form-control" style="" tabindex="10">
                                </div>
                                <div class="mb-2">
                                    <label class="">Serial Number</label>
                                    <input name='serialNumber' id="serialNumber"  data-group="equipment_information" type="text" class="form-control" style="" tabindex="11">
                                </div>
                                <div class="">
                                    <label class="">Equipment ID (Optional)</label>
                                    <input name='equipmentId' id="equipmentId"  data-group="equipment_information" type="text" class="form-control" style="" tabindex="12">
                                </div>
                            </div>
                            <div class="col my-auto"> 
                                <div class="">
                                    <label>Place of Calibration</label>
                                    <input name='placeOfCalibration' id="placeOfCalibration"  data-group="equipment_information" type="text" class="form-control mt-n2" tabindex="7">
                                </div>

                                <label class="">Equipment Type</label>
                                <div class="input-group">
                                    <select name="equipmentType" id="equipmentType"  data-group="equipment_information" class="form-control" tabindex="7">
                                        <option value="0">Select . . . </option>
                                        <option value="1">Volumetric glass and plastic ware</option>
                                        <option value="2">Piston-operated volumetric apparatus (piston pipette with variable volume)</option>
                                        <option value="4">Piston-operated volumetric apparatus (piston pipette with fixed volume)</option>
                                        <option value="3">Piston-operated volumetric apparatus (others)</option>
                                    </select>
                                </div>

                                <div class="" id="typeDiv">
                                    <label>Type</label>
                                    <div class="input-group">
                                        <select name="pipetteType" id="pipetteType"  data-group="equipment_information" class="form-control" tabindex="13.5">
                                            <option value="0">Select . . . </option>
                                            <option value="1">To Deliver</option>
                                            <option value="2">To Contain</option>
                                        </select>
                                    </div>
                                </div>
                               
                                <label class="">Capacity <i>(use maximum if NOT range)</i></label>
                                <div class="input-group" id="">
                                    <input name='capacityMin' id="capacityMin" data-group="equipment_information" type="text" class="form-control" style="" tabindex="12.1" placeholder="Minimum">
                                    <select class="form-select" id="capacityMinUnit" data-group="equipment_information" tabindex="12.2">
                                        <option selected>Select . . . </option>
                                        <option value="1">µL</option>
                                        <option value="2">mL</option>
                                    </select>
                                    <label class="input-group-text" style="background-color:white;">to</label>
                                    <input name='capacityMax' id="capacityMax" data-group="equipment_information" type="text" class="form-control" style="" tabindex="12.3" placeholder="Maximum">
                                    <select class="form-select" id="capacityMaxUnit" data-group="equipment_information" tabindex="12.4">
                                        <option selected>Select . . . </option>
                                        <option value="1">µL</option>
                                        <option value="2">mL</option>
                                    </select>
                                </div>


                                
                                
                                <div class="d-none" id="caseDiv">
                                    <label>Case</label>
                                    <div class=" input-group">
                                        <select name="case" id="case"  data-group="equipment_information" class="form-control" tabindex="13.5">
                                            <option value="0">Select . . . </option>
                                            <option value="1">Case 1 - Graduated Pipette</option>
                                            <option value="2">Case 2 - One Mark Pipette</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-none" id="case1Div">
                                    <label>Graduated (Case 1)</label>
                                    <div class=" input-group">
                                        <input name='graduation' id="graduation"  data-group="equipment_information" type="text" class="form-control" style="" tabindex="14">
                                        <select name="graduationUnit" id="graduationUnit"  data-group="equipment_information" class="" tabindex="14">
                                            <option value="0">Select . . . </option>
                                            <option value="1">µL</option>
                                            <option value="2" selected>mL</option>
                                        </select>
                                    </div> 
                                </div>
                                <div class="d-none" id="case2Div">
                                    <label>One Mark (Case 2)</label>
                                    <div class="row">
                                        <div class="col">
                                            <label>Neck Diameter (mm)</label>
                                            <input name='neckDiameter' id="neckDiameter"  data-group="equipment_information" type="text" class="form-control mt-n2" tabindex="14">
                                        </div>
                                        <div class="col">
                                            <label>Graduation Height (mm)</label>
                                            <input name='graduationHeight' id="graduationHeight"  data-group="equipment_information" type="text" class="form-control mt-n2" tabindex="14">
                                        </div>
                                    </div> 
                                </div>
                                <div class="" id="resolutionDiv">
                                    <label>Resolution</label>
                                    <div class="input-group">
                                        <input name='resolution' id="resolution"  data-group="equipment_information" type="text" class="form-control" style="" tabindex="14">
                                    </div> 
                                </div>
                                <div class="" id="settingDiv">
                                    <label>Setting</label>
                                    <div class="input-group">
                                        <input name='setting' id="setting"  data-group="equipment_information" type="text" class="form-control" style="" tabindex="14">
                                    </div> 
                                </div>
                                <div class="d-none" id="MPREDiv">
                                    <label>MPRE</label>
                                    <div class="input-group">
                                        <input name='mpre' id="mpre"  data-group="equipment_information" type="text" class="form-control" style="" tabindex="14">
                                    </div> 
                                </div>
                                <label class="">Material</label>
                                <div class="input-group">
                                    <select name="selectedMaterial" id="selectedMaterial" data-group="equipment_information" class="form-control" tabindex="15">
                                        <option value="">Select . . .</option>
                                    </select>
                                </div>
                                <div class="d-none">
                                    <input type="hidden" name="selectedMaterial" id="selectedMaterial">  		
                                    <button id="modalMaterial" type="button" class="btn btn-success">
                                        Select Material
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Environmental Condition -->
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
                                        <input  name='tempStart' id='tempStart' data-group="environmental_information" type="text" class="form-control  mt-n2 " required/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="">
                                        <label>Relative Humidity:</label>
                                        <input name='rhStart' id='rhStart' data-group="environmental_information" type="text" class="form-control  mt-n2 " required/>
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Atmosperic Pressure (Optional)</label>
                                    <div class="input-group">
                                        <input  name='startAtmPressure' id='startAtmPressure' data-group="environmental_information" type="text" class="form-control  mt-n2 " />
                                        <select name="pAmbUnit" id="pAmbUnit" data-group="environmental_information" class="">
                                            <option selected>hPa</option>
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
                                        <input  name='tempEnd' id='tempEnd' data-group="environmental_information" type="text" class="form-control  mt-n2 " required oninput="getAverageOfEnvironment('tempStart', 'tempEnd', 'tempAmb')"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="">
                                        <label>Relative Humidity:</label>
                                        <input  name='rhEnd' id='rhEnd' data-group="environmental_information" type="text" class="form-control  mt-n2 " required oninput="getAverageOfEnvironment('rhStart', 'rhEnd', 'rhAmb')"/>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <label>Atmosperic Pressure (Optional)</label>
                                    <div class="input-group">
                                        <input name='endAtmPressure' id='endtAtmPressure' data-group="environmental_information" type="text" class="form-control  mt-n2 " oninput="getAverageOfEnvironment('rhSstartAtmPressuretart', 'endAtmPressure', 'pAmb')"/>
                                        <select name="" id="" class="">
                                            <option selected>hPa</option>
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
                <!-- Standard -->
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
                            <div class="col mx-auto d-flex justify-content-center">  
                                <input type="hidden" name="selectedBalance" id="selectedBalance"> 		
                                <button id="modalBalanceButton" type="button" class="btn btn-success float-end btn-lg" style="right:0;top:0;" >
                                    Select Balance
                                </button>
                            </div>
                            <div class="col mx-auto d-flex justify-content-center">   		
                                <input type="hidden" name="selectedBarometer" id="selectedBarometer">
                                <button id="modalBarometerButton" type="button" class="btn btn-success float-end btn-lg" style="right:0;top:0;">
                                    Select Barometer
                                </button>
                            </div>
                            <div class="col mx-auto d-flex justify-content-center"> 
                                <input type="hidden" name="selectedThermometer" id="selectedThermometer">  		
                                <button id="modalThermometerButton" type="button" class="btn btn-success float-end btn-lg" style="right:0;top:0;">
                                    Select Thermometer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Raw Data -->
                <div class="card m-2 border-light">
                    <div class="card-header text-white bg-primary">
                        <h3 class="card-title mx-auto d-flex justify-content-center">Raw Data</h3> 
                    </div>
                    <div class="card-body table-responsive text-white" style="background-color:rgba(13, 110, 253, 0.36)">
                        <div class="row">
                            <div class="col mx-auto mb-3 d-flex">
                                <button class="btn btn-success" onclick="addRawDataTable()">New Table</button>
                            </div>
                            <div class="col mx-auto mb-3 d-flex">
                                <button class="btn btn-success" id="deleteTable">Delete Table</button>
                            </div>
                            <div class="col mx-auto mb-3 d-flex">
                                <button class="btn btn-success" id="calculateButton">Calculate</button>
                            </div>
                        </div>
                        <div id="divForTables" class="table-responsive"></div>
                    </div>
                </div>
                <!-- Uncertainty Budget -->
                <div class="card m-2 border-light">
                    <div class="card-header text-white bg-primary">
                        <h3 class="card-title mx-auto d-flex justify-content-center">Uncertainty Budget</h3> 
                    </div>
                    <div class="card-body table-responsive text-white" style="background-color:rgba(13, 110, 253, 0.36)">
                        <table class="table" id="uncertaintyBudgetTable">
                            <thead id="uncertaintyBudgetThead"></thead>
                            <tbody id="uncertaintyBudgetTbody"></tbody>
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
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#imagesModal">View Images</button>
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
                <!-- Save Button -->
                <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
                    <div id="toastSaved" class="toast hide d-flex align-items-center text-white bg-success border-0 " role="alert">
                        <div class="toast-body">
                        Saved
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
                <!-- Modal Balance -->
                <div class="modal fade" id="modalBalanceList">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Balance</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table id='standardTableBalance' class="">
                                <thead>
                                    <th></th>
                                    <th>Serial Number</th>
                                    <th>Days Due</th>
                                </thead>
                                <tbody id='standardTableTbodyBalance'></tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="modalBalanceSelect">Select</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Barometer -->
                <div class="modal fade" id="modalBarometerList">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Barometer</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table id='standardTableBarometer' class="">
                                <thead>
                                    <th></th>
                                    <th>Serial Number</th>
                                    <th>Days Due</th>
                                </thead>
                                <tbody id='standardTableTbodyBarometer'></tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="modalBarometerSelect">Select</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Thermometer -->
                <div class="modal fade" id="modalThermometerList">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Thermometer</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table id='standardTableThermometer' class="">
                                <thead>
                                    <th></th>
                                    <th>Serial Number</th>
                                    <th>Description</th>
                                    <th>Days Due</th>
                                </thead>
                                <tbody id='standardTableTbodyThermometer'></tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="modalThermometerSelect">Select</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Materials -->
                <div class="modal fade" id="modalMaterialList">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Materials</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <span>SPACE FOR ADDING NEW MATERIAL</span>
                            </div>
                            <div class="row">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Material</th>
                                            <th colspan="3">Coefficient of cubic thermal expansion</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="">Select</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Statements -->
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
                                    <div class="form-group">
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
                <!-- Modal Images -->
                <div class="modal fade" id="imagesModal" tabindex="-1">
                   
                </div>
            </div>
        </div>
    </main>
</body>

<script>
    const personnels = <?= json_encode($personnel)?>;
    const verifiers = <?= json_encode($verifier)?>;
    const customers = <?= json_encode($customers)?>;
    const standardBalance = <?= json_encode($standardBalance)?>;
    const standardBarometer = <?= json_encode($standardBarometer)?>;

    const standardThermometerDetails = <?= json_encode($standardThermometerDetails)?>;
    //const standardThermometerDrift = <?= json_encode($standardThermometerDrift)?>;
    const standardThermometerDriftPRT = <?= json_encode($standardThermometerDriftPRT)?>;
    const standardThermometerTestpoint = <?= json_encode($standardThermometerTestpoint)?>;
</script>

<script src="<?= base_url('/js/module9-v1.5.js')?>"></script>
<script src="<?= base_url('/js/module9FormulasRev2-v2.0.1.js')?>"></script>

<?= view('layouts/footer'); ?>

</html>