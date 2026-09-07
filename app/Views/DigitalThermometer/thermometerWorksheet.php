v<?php 
    use App\Models\CustomersModel;
?>
<!DOCTYPE html>
<html lang="en">
<?= view('layouts/head'); ?>
<body class="skin-base animate">
    <?php
		$data = [
			'active' => 'worksheet5',
			'show' => 'worksheet',
		];
		echo view('layouts/sidebarAdmin',$data)
    ?>
    <main class="content">
        <input type="hidden" name="idOfCertificate" id="idOfCertificate" value="<?= $id;?>">
        <input type="hidden" name="calculatedData" id="calculatedData">
		<input type="hidden" name="standardUsed" id="standardUsed" value="">
        <input type="hidden" name="specificationsArray" id="specificationsArray" value="">
        <input type="hidden" name="environmentArray" id="environmentArray" value=''>
        <input type="hidden" name="calculatedValues" id="calculatedValues"  value=''>
        <input type="hidden" name="completion" id="completion" value="Pending">
        <input type="hidden" name="calibratorAccountEmail" id="calibratorAccountEmail" value="<?= session('email')?>">
		<input type="hidden" name="calibratorAccountID" id="calibratorAccountID" value="<?= session('id')?>">
        <input type="hidden" name="verifierEmail" id="verifierEmail">
        <input type="hidden" name="immersionDepth" id="immersionDepth">
        <input type="hidden" name="sersorType" id="sersorType">
        <input type="hidden" name="sensorManufacturer" id="sensorManufacturer">
        <input type="hidden" name="sensorModelNumber" id="sensorModelNumber">
        <input type="hidden" name="sensorSerialNumber" id="sensorSerialNumber">
        <input type="hidden" name="sensorEquipmentNumber" id="sensorEquipmentNumber">

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
                                <div class="mb-3">
                                    <label>Customer:</label>
                                    <input name='customer' id="customer" data-group="customer_information" data-required="false" list='customerList'  type="text" class="form-control mt-n2 text-break" onchange="getCustomerDetails()">
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
                                <div class="mb-2">
                                    <label class="">Address</label>
                                    <input name='address' id="address" data-group="customer_information" data-required="false" type="text" class="form-control" style="height:130px" tabindex="3">
                                </div>
                            </div>
                            <div class="col">        
                                <div class="mb-2">
                                    <label class="">TSR Number:</label>
                                    <input name='tsrNumber' id="tsrNumber" data-group="customer_information" data-required="false" type="text" class="form-control" tabindex="3.1">
                                </div>                    
                                <div class="mb-3">
                                    <label>Date Received</label>
                                    <input name='dateReceived' id="dateReceived" data-group="customer_information" data-required="false" type="date" class="form-control mt-n2" tabindex="4">
                                </div>
                                <div class="row mb-3">
									<div class="col-5">
										<label>Recommended Due Date (Optional)</label>
										<select id="recommendedDueDateInterval" class="form-control mt-n1" style="height: 50px;" data-group="customer_information" data-required="false">
											<option value="">N/A</option>
											<option value="6">6 Months</option>
											<option value="12">1 Year</option>
											<option value="24">2 Years</option>
										</select>
									</div>
									<div class="col mt-4">
										<input name='recommendedDueDate' id="recommendedDueDate" data-group="customer_information" data-required="false" type="date" class="form-control text-break" tabindex="6">
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
                        <div class="row mb-3">
                            <div class="col">
                               <div class="row">
                                   <div class="">
                                       <label>Date Calibrated</label>
                                       <input name='dateCalibrated' id="dateCalibrated" data-group="equipment_information" data-required="false" type="date" class="form-control mt-n2 text-break">
                                   </div>
                               </div>
                               <!-- <div class="row">
                                   <div class="">
                                       <label>Calibration Certificate Number: </label>
                                       <input oninput="checkCertNum()" name='certificateNumber' id='certificateNumber' data-group="equipment_information" data-required="false" type="text" class="form-control  mt-n2 "/>
                                   </div>
                               </div> -->
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
                               <div class="row">
                                   <div class="">
                                       <label>Description:</label>
                                       <input  name='description' id='description' data-group="equipment_information" data-required="false" type="text" class="form-control  mt-n2 " />
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="">
                                       <label>Manufacturer:</label>
                                       <input  name='manufacturer' id='manufacturer' data-group="equipment_information" data-required="false" type="text" class="form-control  mt-n2 " />
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="">
                                       <label>Model:</label>
                                       <input name='modelNumber' id='modelNumber' data-group="equipment_information" data-required="false" type="text" class="form-control  mt-n2 " />
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="">
                                       <label>Serial Number</label>
                                       <input  name='serialNumber' id='serialNumber' data-group="equipment_information" data-required="false" type="text" class="form-control  mt-n2 " />
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="">
                                       <label>Number of Decimal points (set to -1 if Not Applicable)</label>
                                       <input  name='customDecimal' id='customDecimal' data-group="equipment_information" value="-1" data-required="false" type="text" class="form-control  mt-n2 " />
                                   </div>
                               </div>
                            </div>
                            <div class="col">
                                 <div class="row">
                                     <div class="">
                                         <label>Place of Calibration:</label>
                                         <input  name="placeOfCalibration" id="placeOfCalibration" value="" data-group="equipment_information" data-required="false" type="text" class="form-control  mt-n2 " />
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="">
                                         <label>Calibration Procedure:</label>
                                            <select name="calibrationProcedure" id="calibrationProcedure" data-group="equipment_information" data-required="false" class="form-control  mt-n2">
                                                <option selected>Select . . </option>
                                                <option value="1">CP-008</option>
                                                <option value="2">CP-011</option>
                                            </select>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="">
                                         <label>Type:</label>
                                            <select name="type" id="type" data-group="equipment_information" data-required="false" class="form-control  mt-n2">
                                                <option selected>Select . . </option>
                                                <option value="digital">Digital</option>
                                                <option value="analog">Analog</option>
                                            </select>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="">
                                         <label>Classification:</label>
                                            <select name="classification" id="classification" data-group="equipment_information" data-required="true" class="form-control  mt-n2">
                                                <option value="1">Digital Temperature Indicator Systems</option>
                                                <option value="2">Liquid-in-Glass Thermometer</option>
                                                <option value="3">Bimetallic System</option>
                                            </select>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="">
                                         <label>Immersion Depth (cm):</label>
                                         <input  name='statement_immersionDepth' id='statement_immersionDepth' data-group="equipment_information" data-required="false" type="text" class="form-control  mt-n2 " />
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="">
                                         <label>Equipment ID (Optional):</label>
                                         <input  name='equipmentNumber' id='equipmentNumber' data-group="equipment_information" data-required="false" type="text" class="form-control  mt-n2 " />
                                     </div>
                                 </div>
                                 <div class="row">
                                     <!-- <div class="">
                                         <label>Capacity / Range / Span:</label>
                                         
                                         <div class="input-group">
                                            <input  name='range' id='range' data-group="equipment_information" data-required="false" type="text" class="form-control  mt-n2 " />
                                            <select name="rangeUnit" id="rangeUnit" data-group="equipment_information" data-required="false" class="">
                                                <option selected>°C</option>
                                            </select>
                                            <input  name='rangeMax' id='rangeMax' data-group="equipment_information" data-required="false" type="text" class="form-control  mt-n2 " />
                                            <select name="rangeMaxUnit" id="rangeMaxUnit" data-group="equipment_information" data-required="false" class="">
                                                <option selected>°C</option>
                                            </select>
                                        </div>
                                     </div> -->

                                        <label class="">Capacity / Range / Span <i>(use maximum if NOT range)</i></label>
                                        <div class="input-group" id="">
                                            <input name='range' id="range" data-group="equipment_information" data-required="false" type="text" class="form-control" style="" tabindex="12.1" placeholder="Minimum">
                                            <select name="rangeUnit" id="rangeUnit" data-group="equipment_information" data-required="false" class="">
                                                <option selected>°C</option>
                                            </select>
                                            <label class="input-group-text" style="background-color:white;">to</label>
                                            <input name='rangeMax' id="rangeMax" data-group="equipment_information" data-required="false" type="text" class="form-control" style="" tabindex="12.3" placeholder="Maximum">
                                            <select name="rangeMaxUnit" id="rangeMaxUnit" data-group="equipment_information" data-required="false" class="">
                                                <option selected>°C</option>
                                            </select>
                                        </div>

                                 </div>
                                 <div class="row">
                                     <div class="">
                                         <label>Resolution / Graduation</label>
                                         <input name='resolution' id='resolution' data-group="equipment_information" data-required="true" type="text" class="form-control  mt-n2 " />
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="">
                                         <label>Readability</label>
                                         <select name="readability" id="readability" data-group="equipment_information" data-required="true" type="text" class="form-control mt-n2" tabindex="7">
                                        
                                        </select>
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
                                                    <input name="liquidInGlass" class="form-check-input" data-group="equipment_information" data-required="false" type="radio" value="total" id="liquidInGlassC" checked>
                                                    <label class="form-check-label" for="liquidInGlassC">
                                                        Complete
                                                    </label>
                                                </div>
                                            </div>	
                                            <div class='col-1'>
                                                <div class="form-check">
                                                    <input name="liquidInGlass" class="form-check-input" data-group="equipment_information" data-required="false" type="radio" value="total" id="liquidInGlassT">
                                                    <label class="form-check-label" for="liquidInGlassT">
                                                        Total 
                                                    </label>
                                                </div>
                                            </div>	
                                            <div class='col'>
                                                <div class="form-check">
                                                    <input name="liquidInGlass" class="form-check-input" data-group="equipment_information" data-required="false" type="radio" value="partial" id="liquidInGlassP">
                                                    <label class="form-check-label" for="liquidInGlassP">
                                                        Partial: <input class="border-0 border-bottom bg-transparent" type="input" name="partialImmersion" id="partialImmersion" data-group="equipment_information" data-required="false">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class='col'>
                                                <div class="form-check">
                                                    <input name="liquidInGlass" class="form-check-input" type="radio" value="not" id="liquidInGlassN" data-group="equipment_information" data-required="false" >
                                                    <label class="form-check-label" for="liquidInGlassN">
                                                        others(specify depth): <input class="border-0 border-bottom bg-transparent" type="input" name="otherDepth" id="otherDepth" data-group="equipment_information" data-required="false">
                                                    </label>
                                                </div>
                                            </div>
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
                            <div class="col mx-auto d-flex justify-content-center">  
                                <input type="hidden" name="" id=""> 		
                                <button id="modalStandardButton" type="button" class="btn btn-success float-end btn-lg" style="right:0;top:0;" data-bs-toggle="modal" data-bs-target="#modalStandardList" >
                                    Select Reference Thermometer
                                </button>
                                <input type="hidden" id="selectedStandard" data-resolutiontemp='' data-resolutionrh='' data-group="raw_data">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Raw Data -->
                <div class="card m-2 border-light">
                    <div class="card-header text-white bg-primary">
                        <h3 class="card-title mx-auto d-flex justify-content-center">Raw Data</h3> 
                    </div>
                    <div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)">
                        <div class="row">
                            <div class="row mx-auto mb-3 d-flex">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-success" id='addButtonMeasurementTables' >Add</button>
                                    <button type="button" class="btn btn-danger" id='removeButtonMeasurementTables'>Remove</button>
                                    <button type="button" class="btn btn-warning" id='calculateButtonMeasurementTables' onclick="calculateWithErrorHandling();//console.log(calculate());addToUncertaintyBudgetTable();">Calculate</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mx-auto justify-content-center" id="measurementDataTables"></div>
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
                            <tbody id="uncertBudgetTBody"></tbody>
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
                                <input type="hidden" id="moduleNumber" value="5">
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
                        <button type="button" class="btn btn-info positio" id="previousDataButton" data-bs-toggle="modal" data-bs-target="#previousDataModal">Use Previous Data</button>
                    </div>
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
    <div class="modal fade" id="modalStandardList">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Standard</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <table id='standardTable' class="table" style='width:100%;'>
                    <thead>
                        <tr>
                            <td></td>
                            <td>Serial Number</td>
                            <td>Certificate Number</td>
                            <td>Description</td>
                            <td>Provider</td>
                            <!-- <td>brand</td> -->
                            <td>Model</td>
                            <td>Days Due</td>
                        </tr>
                    </thead>
                    <tbody id='standardTableTbody'></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="modalStandardSelect" data-bs-dismiss="modal">Select</button>
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
    <div class="modal fade" id="previousDataModal" tabindex="-1" >
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Previous Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-hover table-xl text-center" id='previousDataModalTable' style="width:100%;">
                    <thead>
                        <tr>
                            <th class="d-none">id</th>
                            <th>Certificate Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id='previousDataModalTableTbody'>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
    const standard = <?= json_encode($standard)?>;
    const standardValue = <?= json_encode($standardValue)?>;
    const temperatureSource = <?= json_encode($temperatureSource)?>;
    const driftValuePRT = <?= json_encode($driftValuePRT)?>;
</script>

<script src="<?= base_url('/js/module5-v1.4.1.js')?>"></script>
<script src="<?= base_url('/js/module5Formulas-v1.1.js')?>"></script>

<?= view('layouts/footer'); ?>
</html>