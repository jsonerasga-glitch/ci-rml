
<!DOCTYPE html>
<html lang="en">
<?= view('layouts/head'); ?>
<body class="skin-base animate">
    <?php
		$data = [
			'active' => 'worksheet14',
			'show' => 'worksheet',
		];
		echo view('layouts/sidebarAdmin',$data)
    ?>
    <main class="content">
        <input type="hidden" name="idOfCertificate" id="idOfCertificate" value="<?= $id;?>">
        <input type="hidden" name="calculatedData" id="calculatedData">
        <input type="hidden" id="moduleNumber" value="8">
        <div class="card m-5">
            <div class="card-body">
            <h2 class="card-title d-flex justify-content-center">PH Meter</h2>
                        <!-- Customer information -->
                        <div class="card m-2 border-light">
                            <div class="card-header text-white bg-primary">
                                <h3 class="card-title d-flex justify-content-center">Customer information</h3>
                            </div>
                            <div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)"> 
                                <div class="row">
                                    <!-- // -->
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
                                                    <input name='tsrNumber' id="tsrNumber" data-group="customer_information" data-required="false" type="text" class="form-control">
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

                                    <!-- // -->
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
                                            <input name='dateCalibrated' id="dateCalibrated"  data-group="equipment_information" data-required="false" type="date" class="form-control mt-n2">
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
                                            <input name='equipmentDescription' id="equipmentDescription"  data-group="equipment_information" data-required="false" type="text" class="form-control">
                                        </div>                    
                                        <div class="mb-2">
                                            <label class="">Manufacturer</label>
                                            <input name='manufacturer' id="manufacturer"  data-group="equipment_information" data-required="false" type="text" class="form-control">
                                        </div>
                                        <div class="mb-2">
                                            <label class="">Identifying Marks / Model</label>
                                            <input name='modelNumber' id="modelNumber"  data-group="equipment_information" data-required="false" type="text" class="form-control">
                                        </div>
                                        <div class="mb-2">
                                            <label class="">Serial Number</label>
                                            <input name='serialNumber' id="serialNumber"  data-group="equipment_information" data-required="false" type="text" class="form-control">
                                        </div>
                                        <div class="mb-2">
                                            <label class="">Equipment ID (Optional)</label>
                                            <input name='equipmentId' id="equipmentId"  data-group="equipment_information" data-required="false" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col ">                                       
                                        <div class="mb-3">
                                            <label>Place of Calibration</label>
                                            <input name='placeOfCalibration' id="placeOfCalibration"  data-group="equipment_information" data-required="false" type="text" class="form-control mt-n2">
                                        </div> 
                                        <div class="mb-2">
                                            <label>Resolution of pH</label>
                                            <input name='resolutionOfPH' id="resolutionOfPH"  data-group="equipment_information" data-required="false" type="text" class="form-control mt-n2">
                                        </div> 
                                        <div class="mb-2">
                                            <label>Resolution of Temperature °C</label>
                                            <input name='resolutionOfTempC' id="resolutionOfTempC"  data-group="equipment_information" data-required="false" type="text" class="form-control mt-n2" >
                                        </div>         
                                        <div class="mb-2">
                                            <label class="">Maker</label>
                                            <input name='electrodeMaker' id="electrodeMaker"  data-group="equipment_information" data-required="false" type="text" class="form-control mt-n2">
                                        </div>
                                        <div class="mb-2">
                                            <label class="">Model</label>
                                            <input name='electrodeModel' id="electrodeModel"  data-group="equipment_information" data-required="false" type="text" class="form-control mt-n2">
                                        </div>
                                        <div class="mb-2">
                                            <label class="">Serial Number</label>
                                            <input name='electrodeSN' id="electrodeSN"  data-group="equipment_information" data-required="false" type="text" class="form-control mt-n2">
                                        </div>
                                        <div class="mb-2">
                                            <label class="">Equipment ID</label>
                                            <input name='electrodeID' id="electrodeID"  data-group="equipment_information" data-required="false" type="text" class="form-control mt-n2">
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
                                                <input  name='tempStart' id='tempStart' data-group="environmental_information" data-required="false" type="text" class="form-control  mt-n2 " required/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="">
                                                <label>Relative Humidity:</label>
                                                <input name='rhStart' id='rhStart' data-group="environmental_information" data-required="false" type="text" class="form-control  mt-n2 " required/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label>Atmosperic Pressure (Optional)</label>
                                            <div class="input-group">
                                                <input  name='startAtmPressure' id='startAtmPressure' data-group="environmental_information" data-required="false" type="text" class="form-control  mt-n2 " />
                                                <select name="pAmbUnit" id="pAmbUnit" data-group="environmental_information" data-required="false" class="">
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
                                                <input  name='tempEnd' id='tempEnd' data-group="environmental_information" data-required="false" type="text" class="form-control  mt-n2 " required oninput="getAverageOfEnvironment('tempStart', 'tempEnd', 'tempAmb')"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="">
                                                <label>Relative Humidity:</label>
                                                <input  name='rhEnd' id='rhEnd' data-group="environmental_information" data-required="false" type="text" class="form-control  mt-n2 " required oninput="getAverageOfEnvironment('rhStart', 'rhEnd', 'rhAmb')"/>
                                            </div>
                                        </div>
                                        <div class="row"> 
                                            <label>Atmosperic Pressure (Optional)</label>
                                            <div class="input-group">
                                                <input name='endAtmPressure' id='endtAtmPressure' data-group="environmental_information" data-required="false" type="text" class="form-control  mt-n2 " oninput="getAverageOfEnvironment('rhSstartAtmPressuretart', 'endAtmPressure', 'pAmb')"/>
                                                <select name="" id="" class="">
                                                    <option selected>hPa</option>
                                                </select>
                                            </div>
                                        </div>

                                        <input type="hidden" name="tempAmb" id="tempAmb" data-group="environmental_information" data-required="false" value='22'>
                                        <input type="hidden" name="rhAmb" id="rhAmb" data-group="environmental_information" data-required="false" value='66'>
                                        <input type="hidden" name="pAmb" id="pAmb" data-group="environmental_information" data-required="false" value='0.1005'>

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
                                    <input type="hidden" id="selectedStandardCalibrator" data-group="raw_data">
                                    <div class="col mx-auto d-flex justify-content-center">  
                                        <input type="hidden" name="selectedStandardCalibrator" id="selectedStandardCalibrator" value=""> 		
                                        <button id="modalStandardButtonCalibrator" type="button" class="btn btn-success float-end btn-lg" style="right:0;top:0;" >
                                            Select Calibrator Standard
                                        </button>
                                    </div>
                                    <input type="hidden" id="selectedStandard" data-group="raw_data">
                                    <div class="col mx-auto d-flex justify-content-center">  
                                        <input type="hidden" name="selectedStandard" id="selectedStandard" value=""> 		
                                        <button id="modalStandardButton" type="button" class="btn btn-success float-end btn-lg" style="right:0;top:0;" >
                                            Select Buffer Solution Standard
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
                                    <div class="row mx-auto mb-3 d-flex">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-success" id='addTable'>New Table</button>
                                            <button type="button" class="btn btn-danger" id='deleteTable'>Remove Table</button>
                                            <button type="button" class="btn btn-warning" id='calculateButton'>Calculate</button>
                                        </div>
                                    </div>
                                </div>
                                <div id="divForTables" class="table-responsive">
                                </div>
                            </div>
                        </div>
                        <!-- Uncertainty Budget -->
                        <div class="card m-2 border-light">
                            <div class="card-header text-white bg-primary">
                                <h3 class="card-title mx-auto d-flex justify-content-center">Uncertainty Budget</h3> 
                            </div>
                            <div class="card-body table-responsive text-white" style="background-color:rgba(13, 110, 253, 0.36)">
                                <table class="table">
                                    <tbody id="uncertaintyBudgetTbodyForMeter"></tbody>
                                </table>
                                <table class="table">
                                    <tbody id="uncertaintyBudgetTbodyForElectrode"></tbody>
                                </table> 
                           </div>    
                        </div>          
                        <!-- Personnel -->                      
                        <div class="card m-2 border-light">
                            <div class="card-header text-white bg-primary">
                                <div class="card-header text-white bg-primary">
                                <h3 class="card-title mx-auto d-flex justify-content-center">Personnel</h3> 
                                </div>
                            </div>
                             <div class="card-body table-responsive text-white" style="background-color:rgba(13, 110, 253, 0.36)">
                                <div class="row">
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
                        </div>
                        <!-- actions -->
                        <!-- <div class="card m-2 border-light">
                            <div class="card-header text-white bg-primary">
                                <div class="row">
                                    <div class="mx-auto d-flex justify-content-center">
                                        <h3>Actions</h3>
                                    </div>
                                </div> 
                            </div>
                            <div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)"> 
                                <div class="btn-toolbar" role="toolbar">
                                
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
                        </div>   -->
                        <!-- Save Button -->
                        <!-- <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
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
                        </div> -->
                        <!-- Actions  -->
                        <div class="card m-2 border-light">
                            <div class="card-header text-white bg-primary">
                                <div class="row">
                                    <div class="mx-auto d-flex justify-content-center">
                                        <h3>Actions</h3>
                                        <input type="hidden" id="moduleNumber" value="10">
                                    </div>
                                </div> 
                            </div>
                            <div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)"> 
                                <div class="btn-toolbar" role="toolbar">
                                    <div class="btn-group me-2" role="group">
                                        <button type="button" class="btn btn-success" id="worksheetPDF" data-group='tools'>Generate Worksheet PDF</button>
                                    </div>
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

                </div>
            </div>
    </main>
    <div class="modal fade" id="modalStandard">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Standard</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover table-striped table-borderless" id="modalStandardTable">
                        <thead>
                            <tr>
                                <th></th>
                                <th>pH Buffer Solution</th>               
                                <th>Certificate no.</th>
                                <th>Description</th>
                                <th>Laboratory</th>
                                <th>Days Due</th>
                            </tr>
                        </thead>
                            <tbody id='standardTableTbody'></tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="modalStandardSelect">Select</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
    </div>
    <div class="modal fade" id="modalStandardCalibrator">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Calibrator Standard </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover table-striped table-borderless" id="modalStandardTableCalibrator">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Standard</th>               
                                <th>Certificate no.</th>
                                <th>Description</th>
                                <th>Laboratory</th>
                                <th>Days Due</th>
                            </tr>
                        </thead>
                            <tbody id='standardTableTbodyCalibrator'></tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="modalStandardSelectCalibrator">Select</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                                    <label for="settingCalibrationResults">Calibration Results</label>
                                    <textarea class="form-control" id="settingCalibrationResults" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="settingUncertaintyOfMeasurement">Uncertainty of Measurement</label>
                                    <textarea class="form-control" id="settingUncertaintyOfMeasurement" rows="3"></textarea>
                                </div> 
                                <div class="form-group">
                                    <label for="settingCalibrationAdditionalInfo">Calibration Additional Info</label>
                                    <textarea class="form-control" id="settingCalibrationAdditionalInfo" rows="3"></textarea>
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
    <div class="position-fixed top-0 end-0 p-3" style="z-index:11">
                <div id="toastContainer" class="toast-container"></div>
    </div> 
</body>

<script>
    const personnels = <?= json_encode($personnel)?>;
    const verifiers = <?= json_encode($verifier)?>;
    const customers = <?= json_encode($customers)?>;
    const placeholders = <?= json_encode($placeholders)?>;
</script>

<script src="<?= base_url('/js/module8-v.1.1.js')?>"></script>
<script src="<?= base_url('/js/module8Formulas.js')?>"></script> 

<?= view('layouts/footer'); ?>

</html>