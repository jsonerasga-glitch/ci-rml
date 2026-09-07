<!DOCTYPE html>
<html lang="en">
<?= view('layouts/head'); ?>
<body class="skin-base animate">
    <?php
		$data = [
			'active' => 'worksheet4',
			'show' => 'worksheet',
		];
		echo view('layouts/sidebarAdmin',$data)
    ?>
    <main class="content">
        <div class="card m-5">
            <div class="card-body">
                <h2 class="card-title d-flex justify-content-center">Pressure Gauge</h2>
                <input type="hidden" id="moduleNumber" value="7">
                <div class="card m-2 border-light">
                    <div class="card-header text-white bg-primary">
                        <h3 class="card-title d-flex justify-content-center">Customer information</h3>
                    </div>
                    <input type="hidden" name="idOfCertificate" id="idOfCertificate" value="<?= $id;?>">
                    <div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)">
                        <div class="row ">
                            <div class="col">        
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
                                    <label class="">Model</label>
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
                                    <input name='placeOfCalibration' id="placeOfCalibration"  data-group="equipment_information" type="text" class="form-control mt-n2" tabindex="7" list="listPlaceOfCalibration">
                                    <datalist id='listPlaceOfCalibration'>
                                        <option value="Pressure Laboratory">Pressure Laboratory</option>
                                        <option value="On-site">On-site</option>
                                    </datalist>
                                </div> 
                               
                                <label class="">Capacity</label>
                                <div class=" input-group">
                                    <input name='capacity' id="capacity"  data-group="equipment_information" type="text" class="form-control" style="" tabindex="12">
                                    <select name="capacityUnit" id="capacityUnit"  data-group="equipment_information" class="" tabindex="13.5">
                                        <option>atm</option>
                                        <option>bar</option>
                                        <option>kPa</option>
                                        <option selected>psi</option>
                                        <option>mmHg</option>
                                        <option>MPa</option>
                                        <option>kg/cm2</option>
                                        <option>inHg</option>
                                        <option>inH₂O</option>
                                        <option>mH₂O</option>
                                        <option>mmH₂O</option>
                                        <option>mbar</option>
                                        <option>Pa</option>
                                    </select>
                                </div>
                                <label class="">Range</label>
                                <div class=" input-group">
                                    <input name='range' id="range"  data-group="equipment_information" type="text" class="form-control" style="" tabindex="12">
                                    <select name="rangeUnit" id="rangeUnit"  data-group="equipment_information" class="" tabindex="13.5">
                                        <option>atm</option>
                                        <option>bar</option>
                                        <option>kPa</option>
                                        <option selected>psi</option>
                                        <option>mmHg</option>
                                        <option>MPa</option>
                                        <option>kg/cm2</option>
                                        <option>inHg</option>
                                        <option>inH₂O</option>
                                        <option>mH₂O</option>
                                        <option>mmH₂O</option>
                                        <option>mbar</option>
                                        <option>Pa</option>
                                    </select>
                                </div>
                                <label class="">Span</label>
                                <div class=" input-group">
                                    <input name='span' id="span"  data-group="equipment_information" type="text" class="form-control" style="" tabindex="12">
                                    <select name="spanUnit" id="spanUnit"  data-group="equipment_information" class="" tabindex="13.5">
                                        <option>atm</option>
                                        <option>bar</option>
                                        <option>kPa</option>
                                        <option selected>psi</option>
                                        <option>mmHg</option>
                                        <option>MPa</option>
                                        <option>kg/cm2</option>
                                        <option>inHg</option>
                                        <option>inH₂O</option>
                                        <option>mH₂O</option>
                                        <option>mmH₂O</option>
                                        <option>mbar</option>
                                        <option>Pa</option>
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label class="">Resolution / Graduation (uuc)</label>
                                        <div class=" input-group">
                                            <input name='resolution' id="resolution" data-group="equipment_information" data-required="true" type="text" class="form-control" style="" tabindex="12">
                                            <select name="resolutionUnit" id="resolutionUnit" data-group="equipment_information" class="" tabindex="13.5">
                                                <option>atm</option>
                                                <option>bar</option>
                                                <option>kPa</option>
                                                <option selected>psi</option>
                                                <option>mmHg</option>
                                                <option>MPa</option>
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
                                    <div class="col">
                                        <label class="">Resolution / Graduation (std)</label>
                                        <div class=" input-group">
                                            <input name='resolutionSTD' id="resolutionSTD"  data-group="equipment_information" type="text" class="form-control" style="" tabindex="12">
                                            <select name="resolutionUnitSTD" id="resolutionUnitSTD"  data-group="equipment_information" class="" tabindex="13.5">
                                                <option>atm</option>
                                                <option>bar</option>
                                                <option>kPa</option>
                                                <option selected>psi</option>
                                                <option>mmHg</option>
                                                <option>MPa</option>
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

                                <div class="row">
                                    <div class="col">
                                        <label class="">Readability (uuc)</label>
                                        <div class=" input-group">
                                            <input name='readability' id="readability"  data-group="equipment_information" data-required="true" type="text" class="form-control" style="" tabindex="12">
                                            <select name="readabilityUnit" id="readabilityUnit"  data-group="equipment_information" class="" tabindex="13.5">
                                                <option>atm</option>
                                                <option>bar</option>
                                                <option>kPa</option>
                                                <option selected>psi</option>
                                                <option>mmHg</option>
                                                <option>MPa</option>
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
                                    <div class="col">
                                        <label class="">Readability (std)</label>
                                        <div class=" input-group">
                                            <input name='readabilitySTD' id="readabilitySTD"  data-group="equipment_information" type="text" class="form-control" style="" tabindex="12">
                                            <select name="readabilitySTDUnit" id="readabilitySTDUnit"  data-group="equipment_information" class="" tabindex="13.5">
                                                <option>atm</option>
                                                <option>bar</option>
                                                <option>kPa</option>
                                                <option selected>psi</option>
                                                <option>mmHg</option>
                                                <option>MPa</option>
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

                                <label class="">Medium</label>
                                <div class=" input-group">
                                    <input name='medium' id="medium"  data-group="equipment_information" type="text" class="form-control" style="" tabindex="12">
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
                                            <option>mmHg</option>
                                            <option>MPa</option>
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
                                            <option>mmHg</option>
                                            <option>MPa</option>
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
                <div class="card m-2 border-light d-none">
                    <div class="card-body table-responsive">
                        <input type="hidden" name="sequenceSelected" id="sequenceSelected">
                        <table class="table table-hover table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th rowspan="2">Calibration Sequence</th>
                                    <th rowspan="2">Measurement uncertainty aimed at, in % of the measurement span</th>
                                    <th rowspan="2">No. of measurement points</th>
                                    <th rowspan="2">No. of pre-loadings</th>
                                    <th rowspan="2">Load change + waiting time</th>
                                    <th rowspan="2">Waiting time at upper limit of measurement range</th>
                                    <th colspan="2">No. of measurement series</th>
                                </tr>
                                <tr>
                                    <th>Up</th>
                                    <th>Down</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id='sequenceA'>
                                    <td>A</td>
                                    <td>< 0,1</td>
                                    <td>9</td>
                                    <td>3</td>
                                    <td>> 30</td>
                                    <td>2</td>
                                    <td>2</td>
                                    <td>2</td>
                                </tr>
                                <tr id='sequenceB' class="table-active">
                                    <td>B</td>
                                    <td>0,1 ... 0,6</td>
                                    <td>9</td>
                                    <td>2</td>
                                    <td>> 30</td>
                                    <td>2</td>
                                    <td>2</td>
                                    <td>1</td>
                                </tr>
                                <tr id='sequenceC'>
                                    <td>C</td>
                                    <td>> 0,6</td>
                                    <td>5</td>
                                    <td>1</td>
                                    <td>> 30</td>
                                    <td>2</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                            </tbody>
                        </table>
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
                                    Select Test Gauge
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card m-2 border-light d-none">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col">       
                                <h5 class="card-title">Preliminary Inspection</h5>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="prelimA" tabindex="20">
                                    <label class="form-check-label" for="prelimA">
                                        Visual Inspection (clean the equipment w/ soft cloth to remove dust and small particles)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="prelimB" tabindex="21">
                                    <label class="form-check-label" for="prelimB">
                                        Check the surface and edges of the equipment for any damages. (note in remarks)
                                    </label>
                                </div>  
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="prelimC" tabindex="22">
                                    <label class="form-check-label" for="prelimC">
                                        Record all necessary and vital information
                                    </label>
                                </div>   
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="prelimD" tabindex="23">
                                    <label class="form-check-label" for="prelimD">
                                        Check the protective window of the equipment for cracks/scratches, color change, and broken window
                                    </label>
                                </div>                             
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="prelimE" tabindex="24">
                                    <label class="form-check-label" for="prelimE">
                                        Check the thread coupling and seal of the equipment if it is in good condition
                                    </label>
                                </div>   
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="prelimF" tabindex="25">
                                    <label class="form-check-label" for="prelimF">
                                        Check if the stylus or pointer move smoothly when applied with increasing and decreasing pressure
                                    </label>
                                </div>   
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="prelimG" tabindex="26">
                                    <label class="form-check-label" for="prelimG">
                                        Apply increasing pressure (pre-loading) up to maximum capacity.
                                    </label>
                                </div>   
                            </div>
                            <div class="col">       
                                <h5 class="card-title">Standard</h5>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#standardModal">
                                    Select Standard
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
                        <div class="row">
                            <div class="row mx-auto mb-3 d-flex">
                                <button class="btn btn-success" onclick="calculateWithErrorHandling()//calculateValues()">Calculate</button>
                            </div>
                        </div>
                        
                        <table id="measurementTable" class="table table-hover table-striped table-bordered  mb-0">
                            <thead>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="row">
                                <div class="input-group mt-3">
                                    <!-- <label class="input-group-text bg-transparent">h<sub>std</sub></label>
                                    <input name='hStd' id="hStd" type="text" class="form-control col-6" tabindex="99">
                                    <label class="input-group-text bg-transparent">h<sub>uuc</sub></label>  
                                    <input name='hUUC' id="hUUC" type="text" class="form-control col-6" tabindex="99.1">
                                    <label class="input-group-text bg-transparent">Height Difference (+ when std. is higher)</label>
                                    <input name='hDiff' id="hDiff" type="text" class="form-control col-6" tabindex="99.2">
                                    <label class="input-group-text bg-transparent">Medium</label>
                                    <input name='medium' id="medium" type="text" class="form-control col-6" tabindex="99.3"> -->
                                    <input name='hDiff' id="hDiff" type="hidden" value="0">
                                </div> 
                            </div>
                            
                        </div>
                        
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
                                    <th rowspan='2'>Test Point</th>
                                    <th colspan='2'>u<sub>std</sub></th>
                                    <th colspan='2'>u<sub>res_std</sub></th>
                                    <th colspan='2'>u<sub>res_uuc</sub></th>
                                    <th colspan='2'>u<sub>z</sub></th>
                                    <th colspan='2'>u<sub>hys</sub></th>
                                    <th colspan='2'>u<sub>rep(max)</sub></th>
                                    <th colspan='2'>u<sub>c</sub></th>
                                    <th rowspan='2'>k</th>
                                    <th colspan='2'>U</th>
                                </tr>
                                <tr id='uncertBudgetTableTheadTr'>
                                    
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
                                <th>Model</th>
                                <th>Serial No.</th>
                                <th>Unit</th>
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

    <script>
        var personnels = <?= json_encode($personnel)?>;
        var verifiers = <?= json_encode($verifier)?>;
        const standardDetails = <?= json_encode($standardData)?>;
        var standardValues;
    </script>
    <script src="<?= base_url('/js/module7-v1.1.js')?>"></script>
    <script src="<?= base_url('/js/module7Formulas-v1.3.js')?>"></script>
    <script src="<?= base_url('/js/pressureConvert.js')?>"></script>

    <?= view('layouts/footer'); ?>
</body>
</html>