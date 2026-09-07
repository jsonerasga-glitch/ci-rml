<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R3 CMS</title>
    <link href="/dashboardAsset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/dashboardAsset/lib/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link href="/dashboardAsset/assets/css/style.min.css" rel="stylesheet">
    <style>
      
         
    </style>
</head>
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
                <h5 class="card-title">Pressure Gauge</h5>
                <div class="card m-2 border-light">
                    <div class="card-body">
                        <h5 class="card-title">Customer Details</h5>
                        <div class="row ">
                            <div class="col">        
                                <div class="mb-2">
                                    <label class="">Certificate Number</label>
                                    <input name='certificateNumber' id="certificateNumber" type="text" class="form-control " tabindex='1'>
                                </div>                    
                                <div class="mb-2">
                                    <label class="">Customer</label>
                                    <input name='customer' id="customer" type="text" class="form-control " tabindex='2'>
                                </div>
                                <div class="mb-2">
                                    <label class="">Address</label>
                                    <input name='address' id="address" type="text" class="form-control" style="height:130px" tabindex="3">
                                </div>
                            </div>
                            <div class="col">                            
                                <div class="mb-3">
                                    <label>Date Received</label>
                                    <input name='dateReceived' id="dateReceived" type="date" class="form-control mt-n2" tabindex="4">
                                </div>
                                <div class="mb-3">
                                    <label>Date calibrated</label>
                                    <input name='dateCalibrated' id="dateCalibrated" type="date" class="form-control mt-n2" tabindex="5">
                                </div>
                                <div class="mb-3">
                                    <label>Recommended Due Date</label>
                                    <input name='recommendedDueDate' id="recommendedDueDate" type="date" class="form-control mt-n2" tabindex="6">
                                </div>
                                <div class="">
                                    <label>Place of Calibration</label>
                                    <input name='placeOfCalibration' id="placeOfCalibration" type="text" class="form-control mt-n2" tabindex="7">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card m-2 border-light">
                    <div class="card-body">
                        <h5 class="card-title">Equipment Details</h5>
                        <div class="row ">
                            <div class="col">        
                                <div class="mb-2">
                                    <label class="">Equipment Description</label>
                                    <input name='equipmentDescription' id="equipmentDescription" type="text" class="form-control " tabindex='8'>
                                </div>                    
                                <div class="mb-2">
                                    <label class="">Manufacturer</label>
                                    <input name='manufacturer' id="manufacturer" type="text" class="form-control " tabindex='9'>
                                </div>
                                <div class="mb-2">
                                    <label class="">Model Number</label>
                                    <input name='modelNumber' id="modelNumber" type="text" class="form-control" style="" tabindex="10">
                                </div>
                                <div class="mb-2">
                                    <label class="">Serial Number</label>
                                    <input name='serialNumber' id="serialNumber" type="text" class="form-control" style="" tabindex="11">
                                </div>
                                <div class="">
                                    <label class="">Equipment ID</label>
                                    <input name='equipmentId' id="equipmentId" type="text" class="form-control" style="" tabindex="12">
                                </div>
                            </div>
                            <div class="col my-auto">  
                                <div class="input-group mb-2">
                                    <label class="input-group-text bg-transparent col-5">Accuracy</label>
                                    <input name='accuracy' id="accuracy" type="text" class="form-control col-6" tabindex="12.2">
                                    <select name="accuracyUnit" id="accuracyUnit" class="form-control col-1" tabindex="12.3">
                                        <option>atm</option>
                                        <option>bar</option>
                                        <option>kPa</option>
                                        <option selected>psi</option>
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
                                <div class="input-group mb-2">
                                    <label class="input-group-text bg-transparent col-5">Capacity</label>
                                    <input name='capacity' id="capacity" type="text" class="form-control col-6" tabindex="13">
                                    <select name="capacityUnit" id="capacityUnit" class="form-control col-1" tabindex="13.5">
                                        <option>atm</option>
                                        <option>bar</option>
                                        <option>kPa</option>
                                        <option selected>psi</option>
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
                                <div class="input-group mb-2">
                                    <label class="input-group-text bg-transparent col-5">Range</label>
                                    <input name='range' id="range" type="text" class="form-control col-6" tabindex="14">
                                    <select name="rangeUnit" id="rangeUnit" class="form-control col-1" tabindex="14.5">
                                        <option>atm</option>
                                        <option>bar</option>
                                        <option>kPa</option>
                                        <option selected>psi</option>
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
                                <div class="input-group mb-2">
                                    <label class="input-group-text bg-transparent col-5">Resolution / Graduation (uuc)</label>
                                    <input name='resolution' id="resolution" type="text" class="form-control col-6" tabindex="15">
                                    <select name="resolutionUnit" id="resolutionUnit" class="form-control col-1" tabindex="15.5">
                                        <option>atm</option>
                                        <option>bar</option>
                                        <option>kPa</option>
                                        <option selected>psi</option>
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
                                    <label class="input-group-text bg-transparent col-5">Resolution / Graduation (standard)</label>
                                    <input name='resolutionSTD' id="resolutionSTD" type="text" class="form-control col-6" tabindex="15.6">
                                    <select name="resolutionUnitSTD" id="resolutionUnitSTD" class="form-control col-1" tabindex="15.7">
                                        <option>atm</option>
                                        <option>bar</option>
                                        <option>kPa</option>
                                        <option selected>psi</option>
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
                                <div class="input-group mb-2">
                                    <label class="input-group-text bg-transparent col-5">Readability (uuc)</label>
                                    <input name='readability' id="readability" type="text" class="form-control col-6" tabindex="16">
                                    <select name="readabilityUnit" id="readabilityUnit" class="form-control col-1" tabindex="16.1">
                                        <option>atm</option>
                                        <option>bar</option>
                                        <option>kPa</option>
                                        <option selected>psi</option>
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
                                    <label class="input-group-text bg-transparent col-5">Readability (standard)</label>
                                    <input name='readabilitySTD' id="readabilitySTD" type="text" class="form-control col-6" tabindex="16.2">
                                    <select name="readabilityUnitSTD" id="readabilityUnitSTD" class="form-control col-1" tabindex="16.3">
                                        <option>atm</option>
                                        <option>bar</option>
                                        <option>kPa</option>
                                        <option selected>psi</option>
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
                                
                                <div class="input-group mb-2">
                                    <label class="input-group-text bg-transparent">Temperature</label>
                                    <input name='tempStart' id="tempStart" type="text" class="form-control" tabindex="17.1">
                                    <input name='tempEnd' id="tempEnd" type="text" class="form-control" tabindex="17.2">
                                    <label class="input-group-text bg-transparent">Relative Humidity</label>
                                    <input name='rhStart' id="rhStart" type="text" class="form-control" tabindex="18.1">
                                    <input name='rhEnd' id="rhEnd" type="text" class="form-control" tabindex="18.2">
                                </div>
                                <div class="input-group " >
                                    <span class="input-group-text bg-transparent">T<sub>amb</sub></span>
                                    <input name='tempAmb' id="tempAmb" type="text" class="form-control" style="background-color:rgba(252,196,57,0.5)" tabindex="-1">
                                    <span class="input-group-text bg-transparent">RH</span>
                                    <input name='rhAmb' id="rhAmb" type="text" class="form-control" style="background-color:rgba(252,196,57,0.5)" tabindex="-1">
                                    <span class="input-group-text bg-transparent">P<sub>atm</sub></span>
                                    <input name='pAmb' id="pAmb" type="text" class="form-control" tabindex="19">
                                    <select name="pAmbUnit" id="pAmbUnit" class="form-control col-1" tabindex="19.1">
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
                    </div>
                </div>
                <div class="card m-2 border-light">
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
                    <div class="card-body table-responsive">
                        <h5 class="card-title">Measurement Data</h5>
                        <button onclick="calculateValues()">Calculate</button>
                        <table id="measurementTable" class="table table-hover table-striped table-bordered  mb-0">
                            <thead>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="row">
                                <div class="input-group mt-3">
                                    <label class="input-group-text bg-transparent">h<sub>std</sub></label>
                                    <input name='hStd' id="hStd" type="text" class="form-control col-6" tabindex="99">
                                    <label class="input-group-text bg-transparent">h<sub>uuc</sub></label>  
                                    <input name='hUUC' id="hUUC" type="text" class="form-control col-6" tabindex="99.1">
                                    <label class="input-group-text bg-transparent">Height Difference (+ when std. is higher)</label>
                                    <input name='hDiff' id="hDiff" type="text" class="form-control col-6" tabindex="99.2">
                                    <label class="input-group-text bg-transparent">Medium</label>
                                    <input name='medium' id="medium" type="text" class="form-control col-6" tabindex="99.3">
                                </div> 
                            </div>
                            <div class="row">
                                <div class="input-group mt-4">
                                    <span class="input-group-text bg-transparent">Remarks</span>
                                    <textarea class="form-control" aria-label="With textarea"></textarea>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="card m-2 border-light">
                    <div class="card-body table-responsive">
                        <h5 class="card-title">Uncertainty Budget</h5>
                        <table id="uncertBudgetTable" class="table table-hover table-striped table-bordered text-center mb-0">
                            <thead>
                                <tr>
                                    <th rowspan='2'>Test Point</th>
                                    <th colspan='2'>U<sub>std</sub></th>
                                    <th colspan='2'>U<sub>res_std</sub></th>
                                    <th colspan='2'>U<sub>res_uuc</sub></th>
                                    <th colspan='2'>U<sub>z</sub></th>
                                    <th colspan='2'>U<sub>hys</sub></th>
                                    <th colspan='2'>U<sub>rep(max)</sub></th>
                                    <th colspan='2'>uc</th>
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
                    <div class="card-body table-responsive">
                        <h5 class="card-title">Personnel</h5>
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
                                            <select  name="encodedBy" id="encodedBy" class="form-control">
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
                                            <select  name="checkedby" id="checkedby" class="form-control">
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>                
            </div>
        </div>
    </main>
    <div class="modal fade" id="standardModal" tabindex="-1" >
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
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
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick='processModalStandardCheckbox();'>Apply</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Layout -->
    <script src="/dashboardAsset/lib/jquery/jquery.min.js"></script>
    <script src="/dashboardAsset/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/dashboardAsset/lib/feathericons/feather.min.js"></script>
    <script src="/dashboardAsset/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/dashboardAsset/assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/formulajs/formulajs@2.5.0/dist/formula.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" type="text/javascript"></script>

    <script>
        var personnels = <?= json_encode($personnel)?>;
        var verifiers = <?= json_encode($verifier)?>;
        const standardDetails = <?= json_encode($standardData)?>;
        var standardValues;
    </script>
    <script src="/js/module7.js"></script>
    <script src="/js/pressureConvert.js"></script>
</body>
</html>