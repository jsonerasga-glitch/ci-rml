<!DOCTYPE html>
<html lang="en">
<?= view('layouts/head'); ?>
<body class="skin-base animate">
    <?php
		$data = [
			'active' => 'worksheet2',
			'show' => 'worksheet',
		];
		echo view('layouts/sidebarAdmin',$data)
    ?>
    <main class="content">
        <div class="card m-5">
            <div class="card-body">
                <h2 class="card-title d-flex justify-content-center">Electronic Balance</h2>
                <div class="card m-2 border-light">
                    <div class="card-header text-white bg-primary">
                        <h3 class="card-title d-flex justify-content-center">Customer information</h3>
                    </div>
                    <input type="hidden" name="idOfCertificate" id="idOfCertificate" value="<?= $id;?>">
                    <input type="hidden" id="moduleNumber" value="1">
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
                                    <input name='dateReceived' id="dateReceived" data-group="customer_information" data-required="false" type="date" class="form-control mt-n2">
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
                <div class="card m-2 border-light">
                    <div class="card-header text-white bg-primary">
                        <h3 class="card-title d-flex justify-content-center">Equipment information</h3>
                    </div>
                    <div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)">
                        <div class="row ">
                            <div class="col">       
                                <div class="mb-3">
                                    <label>Date calibrated</label>
                                    <input name='dateCalibrated' id="dateCalibrated"  data-group="equipment_information" data-required="false" type="date" class="form-control mt-n2" tabindex="5">
                                </div> 
                                <!-- <div class="mb-2">
                                    <label class="">Calibration Certificate Number</label>
                                    <input name='certificateNumber' id="certificateNumber"  data-group="equipment_information" data-required="true" type="text" class="form-control " tabindex='1'>
                                </div> -->
                                
                                <div class="mb-1">
                                    <label>Calibration Certificate Number</label>
                                    <div class="input-group">
                                        <input name='certificateNumber' data-group="equipment_information" id='certificateNumber' data-required="true"  type="text" class="form-control text-break mt-n2">
                                        <span class="input-group-text bg-white text-white d-none" id='certificateNumberValid'>
                                            <div class="spinner-border" id='loading'>
                                            </div>
                                            <div id='certificateNumberValidText'></div>
                                        </span>
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <label class="">Description</label>
                                    <input name='equipmentDescription' id="equipmentDescription"  data-group="equipment_information" data-required="false" type="text" class="form-control " tabindex='8'>
                                </div>                    
                                <div class="mb-2">
                                    <label class="">Manufacturer / Brand / Make</label>
                                    <input name='manufacturer' id="manufacturer"  data-group="equipment_information" data-required="true" type="false" class="form-control " tabindex='9'>
                                </div>
                                <div class="mb-2">
                                    <label class="">Model</label>
                                    <input name='modelNumber' id="modelNumber"  data-group="equipment_information" data-required="true" type="false" class="form-control" style="" tabindex="10">
                                </div>
                                <div class="mb-2">
                                    <label class="">Serial Number</label>
                                    <input name='serialNumber' id="serialNumber"  data-group="equipment_information" data-required="true" type="false" class="form-control" style="" tabindex="11">
                                </div>
                                <div class="">
                                    <label class="">Equipment ID (Optional)</label>
                                    <input name='equipmentId' id="equipmentId"  data-group="equipment_information" data-required="false" type="false" class="form-control" style="" tabindex="12">
                                </div>
                            </div>
                            <div class="col my-auto"> 
                                <div class="">
                                    <label>Place of Calibration</label>
                                    <input name='placeOfCalibration' id="placeOfCalibration"  data-group="equipment_information" data-required="false" type="text" class="form-control mt-n2" tabindex="7">
                                </div> 
                                <div class="">
                                    <label>Type</label>
                                    <select name="equipmentType" id="equipmentType" data-group="equipment_information" data-required="false" type="text" class="form-control mt-n2" tabindex="7">
                                        <option>Select</option>
                                        <option value="digital">Digital</option>
                                        <option value="analog">Analog</option>
                                    </select>
                                </div> 
                                <div class="" id="capacityDiv">
                                    <label>Capacity</label>
                                    <div class="row">
                                        <div class="col">
                                            <label>Maximum</label>
                                            <input name='maxCapacity' id="maxCapacity"  data-group="equipment_information" data-required="true" type="text" class="form-control mt-n2">
                                        </div>
                                        <div class="col">
                                            <label>Minimum (Optional)</label>
                                            <input name='minCapacity' id="minCapacity"  data-group="equipment_information" data-required="false" type="text" class="form-control mt-n2">
                                        </div>
                                    </div> 
                                </div>
                                <div class="unitDiv">
                                    <label class="">Unit</label>
                                    <select name="unit" id="unit"  data-group="equipment_information" data-required="true" class="form-select" tabindex="13.5">
                                        <option>mg</option>
                                        <option selected>g</option>
                                        <option>kg</option>
                                    </select>
                                </div>
                                <!-- <div class="resolutionDiv">
                                    <label>Resolution / Graduation</label>
                                    <input name='resolution' id="resolution"  data-group="equipment_information" data-required="false" type="text" class="form-control mt-n2" tabindex="7">
                                </div> 
                                <div class="readabilityDiv">
                                    <label>resolution</label>
                                    <input name='readability' id="readability"  data-group="equipment_information" data-required="true" type="text" class="form-control mt-n2" tabindex="7">
                                </div>  -->
                                <div class="resolutionDiv">
                                    <label>Resolution / Graduation</label>
                                    <input name='resolution' id="resolution"  data-group="equipment_information" data-required="true" type="text" class="form-control mt-n2" tabindex="7">
                                </div> 
                                <div class="readabilityDiv">
                                    <label>Readability</label>
                                    
                                    <select name="readability" id="readability" data-group="equipment_information" data-required="true" type="text" class="form-control mt-n2" tabindex="7">
                                        
                                    </select>
                                </div> 
                                <div class="kDiv d-none">
                                    <label>k</label>
                                    <input name='kForCompute' id="kForCompute"  data-group="equipment_information" data-required="true" type="text" class="form-control mt-n2" tabindex="7" value="2">
                                </div> 
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label class="label" for="illustrationTable">Illustration</label>
                            <table class='table table-hover mb-0 text-center' id="illustrationTable"></table>
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
                                <button type="button" class="btn btn-danger float-end btn-lg" style="right:0;top:0;" data-toggle="modal" data-target="#standardModal" data-group='tools'>Select Reference Weight</button>
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
                            <label class="label" for="eccentricityTable">Eccentricity Test</label>
                            <table class='table table-hover table-striped table-bordered  mb-0 text-center' id="eccentricityTable">
                                <thead>
                                    <tr>
                                        <th colspan="3">
                                            <div class="col-4 offset-lg-0 d-flex d-sm-flex justify-content-center align-items-sm-center ">
                                                <label>Applied Load:</label>
                                                <input id="load" data-group="raw_data" data-required="true" type="text" class="form-control mx-2">
                                            </div>                                        
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Load Position</th>
                                        <th>UUC Indication</th>
                                        <th>Error</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="my-4">
                            <label class="label" for="linearityTable">Linearity Test</label>
                            <div class="btn-group" role="group">
                                <button class="btn btn-success" type="button" id="linearityAddButton">Add Row</button>
                                <button class="btn btn-success" type="button" id="linearityDeleteButton">Delete Row</button>
                            </div>
                            <table class="table"id="linearityTable">
                                <thead>
                                    <tr>
                                        <th>UUC Load</th>
                                        <th>Indication</th>
                                        <th>Standard Used</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>

                        <div>
                            <div class="col-6  d-flex d-sm-flex justify-content-center align-items-sm-center ">
                                 <label class="label" for="repeatabilityRaw" >Repeatability Test:</label>
                                 <input id="repeatabilityRaw" data-group="raw_data" data-required="true" type="text" class="form-control mx-2">
                                 <label class="label" for="repeatabilityRaw" >Number Of Repeatability:</label>
                                 <input id="numberOfRepeatability" data-group="raw_data" data-required="true" type="text" class="form-control mx-2">
                                 <button class="btn btn-success" id='numberOfRepeatabilityAdd'>Add Repeatability</button>
                                
                             </div>  
                            <table class="table"id="repeatabilityTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">Trial</th>
                                        <th class="text-center">Indication</th>
                                        <th class="text-center">Trial</th>
                                        <th class="text-center">Indication</th>
                                    </tr>
                                </thead>
                                <tbody id="repeatabilityTableTbody"></tbody>
                            </table>
                        </div>

                        <div class="row ">
                            <div class="row mx-auto mb-3 d-flex">
                                <button class="btn btn-success" onclick="calculateWithErrorHandling()//calculateValues()">Calculate</button>
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
                                    <th>Nominal Value</th>
                                    <th>Uncertainty Due to Reference Mass</th>
                                    <th>Uncertainty Due to Air Buoyancy</th>
                                    <th>Uncertainty Due to Drift Of Weight</th>
                                    <th>Uncertainty Due to Convection Effects</th>
                                    <th>Uncertainty Due to Rounding Error (Without Load)</th>
                                    <th>Uncertainty Due to Rounding Error (With Load)</th>
                                    <th>Uncertainty Due to Eccentricity</th>
                                    <th>Uncertainty Due to Repeatability</th>
                                    <th>Combined Uncertainty</th>
                                    <th>k</th>
                                    <th>Expanded Uncertainty</th>
                                </tr>
                            </thead>
                            <tbody id="uncertBudgetTBody">
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
                                <button type="button" class="btn btn-success" id="chartButton" data-toggle="modal" data-target="#modalChart" data-group='tools'>View Chart</button>
                            </div>
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
                                <input type="hidden" id="chart_input" name="chart_input"> 
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
            </div>
            <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
                <div id="toastSaved" class="toast hide d-flex align-items-center text-white bg-success border-0 " role="alert">
                    <div class="toast-body">
                    Saved
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
       
    </main>
    <div class="modal fade" id="standardModal" tabindex="-1" >
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Standard</h5>
                </div>
                <div class="modal-body">
                    <table class="table table-hover table-striped table-borderless" id="modalStandardTable">
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
                                <td><span class="fw-bold">Indication: </span></td>
                                <td ><span id="indicationCurrent"></span></td>
                            </tr>
                            <tr>
                                <td><span class="fw-bold">Class:</span></td>
                                <td><span id="standardClass"></span></td>
                                <td><span class="fw-bold">Convection:</span></td>
                                <td><span id="convection"></span></td>
                            </tr>
                            <tr>
                                <td><span class="fw-bold">Conventional Mass (g):</span></td>
                                <td><span id="convenMassTotalG"></span></td>
                                <td><span class="fw-bold">Conventional Mass (<span id='currentUnit'></span>):</span></td>
                                <td><span id="convenMassTotalCurrent"></span></td>
                                <td><span class="fw-bold">Linearity Error:</span></td>
                                <td><span id="linearErrorTotal"></span></td>
                            </tr>
                            <tr>
                                <td><span class="fw-bold">Uncertainty:</span></td>
                                <td><span id="uncertaintyTotal"></span></td>
                                <td><span class="fw-bold">MPE:</span></td>
                                <td><span id="mpeTotal"></span></td>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-dismiss="modal" data-group='tools'>Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="statementsModal" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Custom Statements</h5>
                    <button type="button" class="close" data-dismiss="modal" data-group='tools'>
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
    <div class="modal fade" id="modalChart">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" data-dismiss="modal"  data-group='tools'></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <table class="table" id='chartTable'>
                        <thead>
                            <th></th>
                            <th>Test Load</th>
                            <th>Indication</th>
                            <th>Error</th>
                            <th>Uncertainty</th>
                        </thead>
                    </table>
                </div>
                <div class="input-group-prepend">
                        <button class="btn btn-secondary" type="button" onclick="setPoints()">
                            <i class="fas fa-th-list"></i>
                                Format Graph
                        </button>
                        <div>
                            <sub class="text-danger"><i>Click the Save/Update button to save current configuration</i></sub>
                        </div>

                        <!-- <button class="btn btn-dark" type="button" id="checkbutton" onclick="setPoints()//customVaxis()">
                            <i class="far fa-check-square"></i> 
                            Check
                        </button> -->
                    </div>
                <input value="" type="text" id="min" name='graphMin' class="form-control" data-group="graph_data" placeholder="Min">
                <input value="" type="text" id="max" name='graphMax' class="form-control" data-group="graph_data" placeholder="Max">
                <input value="" type="text" id="start_at" name='graph_start_at' class="form-control" data-group="graph_data" placeholder="Start step at (default = 0)">
                <input value="" type="text" id="step_size" name='graph_step_size' class="form-control" data-group="graph_data" placeholder="Step size (major unit)">
                <input value="4" type="text" id="vFormat" name='vFormat' class="form-control" data-group="graph_data" placeholder="Decimal Places">

                <img class="d-none" id="chartImage" style='border:1px solid black'></img>
                
                <div id='polyChart'></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-dismiss="modal"  data-group='tools'>Close</button>
            </div>
            </div>
        </div>
    </div>
    <!-- Modal Images -->
    <div class="modal fade" id="imagesModal" tabindex="-1">
    </div>
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div id="toastContainer" class="toast-container"></div>
    </div>
</body>
    <script>
        const personnels = <?= json_encode($personnel)?>;
        const verifiers = <?= json_encode($verifier)?>;
        const customers = <?= json_encode($customers)?>;
        const standardDetails = <?= json_encode($standardData)?>;
        const placeholders = <?= json_encode($placeholders)?>;

        var standardValues;

    </script>
    <script src="<?= base_url('/js/module1-v1.2.6.js')?>"></script>
    <script src="<?= base_url('/js/module1Formulas.js')?>"></script>
    <script src="<?= base_url('/js/worksheet.js')?>"></script>

    <?= view('layouts/footer'); ?>

</html>