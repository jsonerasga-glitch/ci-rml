<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dashboardAsset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/dashboardAsset/lib/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link href="/dashboardAsset/assets/css/style.min.css" rel="stylesheet">
    <title>RML ++</title>
</head>
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
                                    <label class="">Customer</label>
                                    <input name='customer' id="customer" data-group="customer_information" type="text" class="form-control " tabindex='2'>
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
                                
                                <div class="mb-3">
                                    <label>Recommended Due Date</label>
                                    <input name='recommendedDueDate' id="recommendedDueDate" data-group="customer_information" type="date" class="form-control mt-n2" tabindex="6">
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
                                <div class="mb-2">
                                    <label class="">Calibration Certificate Number</label>
                                    <input name='certificateNumber' id="certificateNumber"  data-group="equipment_information" type="text" class="form-control " tabindex='1'>
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
                                <div class="">
                                    <label>Procedure</label>
                                    <select name='calibrationProcedure' id="calibrationProcedure"  data-group="equipment_information" type="text" class="form-control mt-n2" tabindex="7">
                                        <option value="0">Select . . .</option>
                                        <option value="1">Chiller / Freezer / Incubator / Oven</option>
                                        <option value="2">Waterbath / Autoclave</option>
                                    </select>
                                </div> 
                                <div class="">
                                    <label>Center Channel</label>
                                    <input name='centerChannel' id="centerChannel"  data-group="equipment_information" type="text" class="form-control mt-n2" tabindex="7">
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
                                <input type="hidden" name="" id=""> 		
                                <button id="modalStandardButton" type="button" class="btn btn-success float-end btn-lg" style="right:0;top:0;" data-bs-toggle="modal" data-bs-target="#modalStandardList" >
                                    Select Standard
                                </button>
                                <input type="hidden" id="selectedStandard" data-group="raw_data">
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
                        <!-- <div class="row">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="csvFileInput" accept=".csv">
                                <button class="btn btn-success" type="button" id="convertButton">Upload</button>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col mx-auto mb-3 d-flex">
                                <button class="btn btn-success" id="addTable">New Table</button>
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
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Uncertainty Due To UUC Resolution</th>
                                    <th>Uncertainty Due To UUCRepeatability</th>
                                    <th>Uncertainty Due To STDResolution</th>
                                    <th>Uncertainty Due To STDRepeatability</th>
                                    <th>Uncertainty Reference Standard Used</th>
                                    <th>Uncertainty Drift Standard Used</th>
                                    <th>Uncertainty Temperature Instability</th>
                                    <th>Uncertainty Spatial Inhomogenity</th>
                                    <th>Uncertainty Radiation Effect</th>
                                    <th>Uncertainty Loading Effect</th>
                                    <th>Combined Uncertainty</th>
                                    <th>Effective Degree Of Freedom</th>
                                    <th>Calculate K</th>
                                    <th>Expanded Uncertainty</th>
                                </tr>
                            </thead>
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
                <datalist id="loadingEffectLIST">
                    <option value="UNLOADED">
                    <option value="LOADED">
                </datalist>
                <!-- Save Button -->
                <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
                    <div id="toastSaved" class="toast hide d-flex align-items-center text-white bg-success border-0 " role="alert">
                        <div class="toast-body">
                        Saved
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-info position-fixed" style="bottom: 75px; right:20px; z-index:999" id="saveButton">
                    Save
                </button>               
            </div>
        </div>
    </main>
    <div class="modal fade" id="modalStandardList">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Standard</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <table id='standardTable' class="table">
                    <thead>
                        <tr>
                            <td></td>
                            <td>serialNumber</td>
                            <td>certificateNumber</td>
                            <td>description</td>
                            <td>provider</td>
                            <td>brand</td>
                            <td>model</td>
                            <td>dateOfCalibration</td>
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
</body>
<script>
    
</script>
<script src="/dashboardAsset/lib/jquery/jquery.min.js"></script>
<script src="/dashboardAsset/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/dashboardAsset/lib/feathericons/feather.min.js"></script>
<script src="/dashboardAsset/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/dashboardAsset/assets/js/script.js"></script>

<script>
    const personnels = <?= json_encode($personnel)?>;
    const verifiers = <?= json_encode($verifier)?>;
    const standard = <?= json_encode($standard)?>;
</script>
<!-- <script src="/js/module11.js"></script>
<script src="/js/module12.js"></script> -->
<script src="/js/module5.js"></script>
<script src="/js/module5Formulas.js"></script>


<script>
   
</script>

<script src="https://cdn.jsdelivr.net/gh/formulajs/formulajs@2.5.0/dist/formula.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>