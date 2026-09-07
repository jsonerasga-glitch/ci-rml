<?php
    $path = 'image/dost.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    $pathPAB = 'image/pab logo.png';
    $typePAB = pathinfo($pathPAB, PATHINFO_EXTENSION);
    $dataPAB = file_get_contents($pathPAB);
    $base64PAB = 'data:image/' . $typePAB . ';base64,' . base64_encode($dataPAB);

    $pathicon5 = 'image/dashboard-images/male-user.png';
    $typeIcon5 = pathinfo($pathicon5, PATHINFO_EXTENSION);
    $dataIcon5 = file_get_contents($pathicon5);
    $base64Icon5 = 'data:image/' . $typeIcon5 . ';base64,' . base64_encode($dataIcon5);

    $pathicon7 = 'image/dashboard-images/person.png';
    $typeIcon7 = pathinfo($pathicon7, PATHINFO_EXTENSION);
    $dataIcon7 = file_get_contents($pathicon7);
    $base64Icon7 = 'data:image/' . $typeIcon7 . ';base64,' . base64_encode($dataIcon7);

?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>RML++</title>
        <link href="/dashboardAsset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/dashboardAsset/lib/remixicon/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="/dashboardAsset/assets/css/style.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

        <style>
            table.dataTable {
                font-size: 1em;
                font-family: tahoma;
            }
            .custom-size {
                max-width: 75%; /* Set your desired width */
                margin: 1.75rem auto; /* Center the modal */
            }
        </style>
    </head>  
    <body class="skin-base animate">
        <?php
            $data = [
                'active' => 'standard17',
                'show' => 'standard',
            ];
            echo view('layouts/sidebarAdmin',$data)
        ?>

        <div class="content">
            <div class="content-header">
                <a id="contentMenu" href="#" class="content-menu d-none d-lg-flex"><i data-feather="menu"></i></a>
                <a id="mobileMenu" href="#" class="content-menu d-lg-none"><i data-feather="menu"></i></a>
            </div>
            <div class="content-body">
                <div class="container-fluid ">
                    <div class="btn-toolbar mb-2 mb-md-0">  
                        <div class="container-fluid">
                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                <div class="">
                                    <label class="content-label">
                                        <b>Documenting Process Calibrator</b>
                                    </label>
                                </div>
                                <?php
                                    if(session()->getFlashdata('status')){
                                        echo "<div class='alert alert-primary' role='alert'>".session()->getFlashdata('status')."</div>";
                                    }
                                ?>
                                <div class="row">
                                    <div class="col mt-2 mb-3">
                                        <button type="button" class="btn btn-outline-dark content-label" data-bs-toggle="modal" data-bs-target="#modalNewStandard">Add New</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm table-hover" id="standardTable">
                                        <thead>
                                            <tr>
                                                <th class="d-none">id</th>
                                                <th>Serial Number</th>
                                                <th>Certificate Number</th>
                                                <th>Description</th>
                                                <th>Provider</th>
                                                <th>Days Due</th>
                                                <th class="text-center"> View/Edit </th>
                                                <th class="text-center"> Delete </th>
                                            </tr>
                                        </thead>
                                        <tbody id="standardTableTbody">
                                          
                                        </tbody>
                                    </table>
                                    <form name="deleteForm" id="deleteForm" action="" method="post"></form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  

        <div class="modal fade" id="modalNewStandard" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Documenting Process Calibrator</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <fieldset>
                            <div class="form-group">
                                <label class=" control-label" for="certificateNumber">Certificate Number</label>  
                                <div class="">
                                    <input id="certificateNumber" name="certificateNumber" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="serialNumber">Serial Number</label>  
                                <div class="">
                                    <input id="serialNumber" name="serialNumber" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="description">Description</label>
                                <div class="">                     
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="provider">Calibration Provider</label>  
                                <div class="">
                                    <input id="provider" name="provider" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="brand">Brand</label>  
                                <div class="">
                                    <input id="brand" name="brand" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="model">Make / Model Number</label>  
                                <div class="">
                                    <input id="model" name="model" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="dateOfCalibration">Date Of Calibration</label>  
                                <div class="">
                                    <input id="dateOfCalibration" name="dateOfCalibration" type="date" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                          
                            <div class="form-group">
                                <label class=" control-label" for="coverageFactor">Coverage Factor</label>  
                                <div class="">
                                    <input id="coverageFactor" name="coverageFactor" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id='addNewDetailsBtn' data-bs-dismiss="modal">Add</button>
                </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Documenting Calibrator</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <fieldset>
                            <input type="hidden" name="standardID" id="standardID">
                            <input type="hidden" name="serialNumberSelected" id="serialNumberSelected">
                            <div class="form-group">
                                <label class=" control-label" for="certificateNumberEdit">Certificate Number</label>  
                                <div class="">
                                    <input id="certificateNumberEdit" name="certificateNumberEdit" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="serialNumberEdit">Serial Number</label>  
                                <div class="">
                                    <input id="serialNumberEdit" name="serialNumberEdit" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="descriptionEdit">Description</label>
                                <div class="">                     
                                    <textarea class="form-control" id="descriptionEdit" name="descriptionEdit"></textarea>
                                </div>
                            </div>
                         
                            <div class="form-group">
                                <label class=" control-label" for="providerEdit">Calibration Provider</label>  
                                <div class="">
                                    <input id="providerEdit" name="providerEdit" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                          
                            <div class="form-group">
                                <label class=" control-label" for="brandEdit">Brand</label>  
                                <div class="">
                                    <input id="brandEdit" name="brandEdit" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="modelEdit">Make / Model Number</label>  
                                <div class="">
                                    <input id="modelEdit" name="modelEdit" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="dateOfCalibrationEdit">Date Of Calibration</label>  
                                <div class="">
                                    <input id="dateOfCalibrationEdit" name="dateOfCalibrationEdit" type="date" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                                                     
                            <div class="form-group">
                                <label class=" control-label" for="coverageFactorEdit">Coverage Factor</label>  
                                <div class="">
                                    <input id="coverageFactorEdit" name="coverageFactorEdit" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mt-2">
                                    <button type="button" class="btn btn-success input-md" id='measurementBtn' data-bs-toggle="modal" data-bs-target="#modalMeasurements" data-bs-dismiss="modal">Measurement Data</button>
                                </div>
                            </div>
                        </fieldset>
                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" id='updateDetailsBtn' data-bs-dismiss="modal">Update</button>
                </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="modalNewStandardValue" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><div id='labelStandardValue'>New</div> Standard Value</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="valueID">
                    <fieldset>

                       

                          
                        

                            <div class="row">
                                <div class="col">
                         
                                <div class="form-group">
                                
                                    <label class=" control-label" for="type">Type</label>  
                                    <div class="">
                                        <select id="type" class="form-control input-md">
                                            <option selected>Select . . .</option>
                                            <option value="AC">AC</option>
                                            <option value="DC">DC</option>
                                            <option value="Resistance">Resistance</option>
                                        </select>
                                    </div>
                                </div>                           
                                <div class="form-group">
                                    <label class=" control-label" for="function">Function</label>  
                                    <div class="">
                                        <select id="function" class="form-control input-md">
                                        <option selected>Select . . .</option>
                                            <option value="Voltage">Voltage</option>
                                            <option value="Current">Current</option>
                                            <option value="Resistance">Resistance</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label class=" control-label" for="functionType">Function Type</label>  
                                        <div class="">
                                            <select id="functionType" class="form-control input-md">
                                            <option selected>Select . . .</option>
                                            <option value="source">Source</option>
                                            <option value="measure">Measure</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label class=" control-label" for="sensorType">Sensor Type</label>  
                                        <div class="">
                                            <select id="sensorType" class="form-control input-md">
                                            <option selected>Select . . .</option>
                                            <option value="Thermocouple Type K">Thermocouple Type K</option>
                                            <option value="Thermocouple Type T">Thermocouple Type T</option>
                                            <option value="Thermocouple Type J">Thermocouple Type J</option>
                                            <option value="RTD Pt100">RTD Pt100</option>
                                            <option value="DC Voltage">DC Voltage</option>
                                            <option value="DC Current">DC Current</option>
                                            </select>
                                        </div>
                                </div>    

                                    <div class="form-group">
                                            <label class=" control-label" for="coverageFactorValue">Coverage Factor</label>  
                                            <div class="">
                                                <input id="coverageFactorValue" name="coverageFactorValue" type="text" placeholder="" class="form-control input-md">
                                            </div>
                                    </div>

                                    <div class="form-group">
                                            <label class=" control-label" for="standardResolution">Standard Resolution</label>  
                                            <div class="">
                                                <input id="standardResolution" name="standardResolution" type="text" placeholder="" class="form-control input-md">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label class=" control-label" for="standardReadability">Standard Readability</label>  
                                            <div class="">
                                                <input id="standardReadability" name="standardReadability" type="text" placeholder="" class="form-control input-md">
                                            </div>
                                    </div>
                            

                                    <div class="form-group">
                                            <label class=" control-label" for="uncertainty">uncertainty</label>  
                                            <div class="input-group">
                                                <input id="uncertainty" name="uncertainty" type="text" placeholder="" class="form-control input-md">
                                                <input id="uncertaintyUnit" name="uncertaintyUnit" type="text" placeholder="" class="form-control input-md" list='units'>
                                            </div>
                                </div>


                             

                                </div>
                                <div class="col">

                                <div class="form-group" id='influenceFactorInput'>
                                            <label class=" control-label" for="influenceFactorValue">Influence Factor Value</label>  
                                            <div class="input-group">
                                                <input id="influenceFactorValue" name="influenceFactorValue" type="text" placeholder="" class="form-control input-md" >
                                            </div>
                                </div>
                                
                                <div class="form-group" id='percentageValueInput'>
                                            <label class=" control-label" for="percentageValue">Percentage Value</label>  
                                            <div class="input-group">
                                                <input id="percentageValue" name="percentageValue" type="text" placeholder="" class="form-control input-md" >
                                            </div>
                                </div> 
                                    
                                <div class="form-group" id='rangeInput'> 
                                            <label class=" control-label" for="rangeValue">Range</label>  
                                        
                                            <div class="input-group">
                                                <select id="rangeValue" class="form-control input-md">
                                                <option selected>Select . . .</option>
                                                    <option value="100.00">100.00 mV</option>
                                                    <option value="1.00000">1.000 00 V</option>
                                                    <option value="15.0000">15.000 0 V</option>
                                                    <option value="22">22 mA</option>
                                                </select>
                                                <input id="rangeValueUnit" name="rangeValueUnit" type="text" placeholder="" class="form-control input-md" list='units'>
                                            </div>
                                </div>  
                                    

                                    <div class="form-group"> 
                                            <div class="row">
                                            <label class=" control-label" for="settingValue">Setting Value</label> 
                                                <div class="col">
                                                    <div class="input-group">
                                                        <input id="settingValue" name="settingValue" type="text" placeholder="" class="form-control input-md">
                                                        <input id="settingValueUnit" name="settingValueUnit" type="text" placeholder="" class="form-control input-md" list='units'>
                                                    </div>
                                                </div>
                                       
                                           
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label class=" control-label" for="indicatedValue">Indicated Value</label>  
                                            <div class="input-group">
                                                <input id="indicatedValue" name="indicatedValue" type="text" placeholder="" class="form-control input-md">
                                                <input id="indicatedValueUnit" name="indicatedValueUnit" type="text" placeholder="" class="form-control input-md" list='units'>
                                            </div>
                                    </div>                                  
                              

                                        <div class="form-group" id='previousIndicatedValueInput'>
                                            <label class=" control-label" for="drift">Previous Indicated Valu  </label>  
                                            <div class="input-group">
                                                <input id="previousIndicatedValue" name="previousIndicatedValue" type="text" placeholder="" class="form-control input-md" >
                                                <input id="previousIndicatedValueUnit" name="previousIndicatedValueUnit" type="text" placeholder="" class="form-control input-md" list='units'>
                                         
                                            </div>
                                        </div>

                            

                                        <div class="form-group" id='driftInput'>
                                            <label class=" control-label" for="drift">Drift  </label>  
                                            <div class="input-group">
                                                <input id="drift" name="influendriftceFactorValue" type="text" placeholder="" class="form-control input-md bg-warning" >
                                            </div>
                                        </div>


                                    </div>
                            </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalMeasurements" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" id='addNewValueBtn' data-bs-toggle="modal" data-bs-target="#modalMeasurements" data-bs-dismiss="modal">Add</button>
                </div>
                </div>
            </div>
        </div> 

<!-- Modal for Measurements -->
<div class="modal fade" id="modalMeasurements" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable custom-size">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Standard</h5>
                <div class="btn-toolbar mx-5" role="toolbar">
                    <div class="btn-group me-2" role="group">
                        <button type="button" class="btn btn-success" id="addMeasurement" data-bs-toggle="modal" data-bs-target="#modalNewStandardValue" data-bs-dismiss="modal">ADD NEW</button>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="measurementDIV">
                    <table class="table table-hover" id="valueTable">
                        <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Type</th>
                                <th>Function</th>
                                <th>Function Type</th>
                                <th>Sensor Type</th>
                                <th>Coverage Factor</th>
                                <th>Standard Resolution</th>
                                <th>Standard Readability</th>
                                <th>Influence Factor</th>
                                <th>Percentage</th>
                                <th>Uncertainty</th>
                                <th>Unit</th>
                                <th>Range</th>
                                <th>Unit</th>
                                <th>Setting Value</th>
                                <th>Unit</th>
                              
                                <th>Indicated Value</th>
                                <th>Unit</th>
                                <th>Previous Indicated Value</th>
                                <th>Unit</th>
                                <th>Drift</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody id="valueTableTbody">
                            <!-- Sample row (replace with actual data using JavaScript) -->
                            <tr>
                                <td contenteditable="false">12345</td>
                                <td contenteditable="false">DC</td>
                                <td contenteditable="false">Voltage</td>
                                <td contenteditable="false">Source</td>
                                <td contenteditable="false">DC Voltage</td>
                                <td contenteditable="false">0.95</td>
                                <td contenteditable="false">1.05</td>
                                <td contenteditable="false">0.01</td>
                                <td contenteditable="false">mV</td>
                                <td contenteditable="false">15.0000</td>
                                <td contenteditable="false">V</td>
                                <td contenteditable="false">12.50</td>
                                <td contenteditable="false">mA</td>
                                <td contenteditable="false">60.00</td>
                                <td contenteditable="false">Hz</td>
                                <td contenteditable="false">12.40</td>
                                <td contenteditable="false">mA</td>
                                <td contenteditable="false">12.30</td>
                                <td contenteditable="false">mA</td>
                                <td contenteditable="false">0.01</td>
                                <td><button class="btn btn-primary btn-sm edit-row">Edit</button></td>
                                <td><button class="btn btn-danger btn-sm delete-row">Delete</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalEdit" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
        <div>
        </div>
       <datalist id="units"></datalist>
       <datalist id="hertz"></datalist>
    </body>
</html>
<script src="/dashboardAsset/lib/jquery/jquery.min.js"></script>
<script src="/dashboardAsset/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/dashboardAsset/lib/feathericons/feather.min.js"></script>
<script src="/dashboardAsset/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/dashboardAsset/assets/js/script.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    var standardData;
    var standardValues;


    $(document).ready(function(){
        getStandardData()
        bindToElements()
        setUnits();
    });

    function deleteConfirmation(url){
       // windows.confirm("are u sure?");
       href="" 
        var txt;
        if (confirm("Do you want to delete this Standard?")) {
            document.getElementById("deleteForm").setAttribute('action',url);
            document.deleteForm.submit();
        }
    }

    function logoutConfirmation(url){
       // windows.confirm("are u sure?");
       href="" 
        var txt;
        if (confirm("Do you want to logout <?= session('name')?>?")) {
            location.href = url;
        }
    }

    function editAddData(ID){
        let selectedStandardData = standardData.find(o => o.id === ID);
        $("#standardID").val(selectedStandardData['id'])
        $("#serialNumberSelected").val(selectedStandardData['serialNumber'])
        $("#certificateNumberEdit").val(selectedStandardData['certificateNumber'])
        $("#serialNumberEdit").val(selectedStandardData['serialNumber'])
        $("#descriptionEdit").val(selectedStandardData['description'])
        $("#providerEdit").val(selectedStandardData['calibrationProvider'])
        $("#brandEdit").val(selectedStandardData['brand'])
        $("#modelEdit").val(selectedStandardData['model'])
        $("#dateOfCalibrationEdit").val(selectedStandardData['dateOfCalibration'])
        $("#coverageFactorEdit").val(selectedStandardData['coverageFactor'])
        
        $('#modalEdit').modal('show');
    }

    function editAddValueData(ID){
        $("#labelStandardValue").html('Update')
        $("#addNewValueBtn").html('Update')
        $("#addNewValueBtn").off('click')
        $('#addNewValueBtn').one('click', function(){
            updateValue()
        })

        let selectedStandardData = standardValues.find(o => o.id === ID);
        
        $("#valueID").val(selectedStandardData['id'])
        $('#type').val(selectedStandardData['type'])
        $('#function').val(selectedStandardData['function'])
        $('#functionType').val(selectedStandardData['functionType'])
        $('#sensorType').val(selectedStandardData['sensorType'])
        $('#settingValue').val(selectedStandardData['settingValue'])
        $('#settingValueUnit').val(selectedStandardData['settingValueUnit'])
        $('#coverageFactorValue').val(selectedStandardData['coverageFactorValue'])
        $('#standardResolution').val(selectedStandardData['standardResolution'])
        $('#standardReadability').val(selectedStandardData['standardReadability'])
        $('#influenceFactorValue').val(selectedStandardData['influenceFactorValue'])
        $('#percentageValue').val(selectedStandardData['percentageValue'])
        $('#uncertainty').val(selectedStandardData['uncertainty'])
        $('#uncertaintyUnit').val(selectedStandardData['uncertaintyUnit'])

        $('#rangeValue').val(selectedStandardData['rangeValue'])
        $('#rangeValueUnit').val(selectedStandardData['rangeValueUnit'])

        $('#indicatedValue').val(selectedStandardData['indicatedValue'])
        $('#indicatedValueUnit').val(selectedStandardData['indicatedValueUnit'])
        $('#previousIndicatedValue').val(selectedStandardData['previousIndicatedValue'])
        $('#previousIndicatedValueUnit').val(selectedStandardData['previousIndicatedValueUnit'])
        $('#drift').val(selectedStandardData['drift'])

        
        $('#modalNewStandardValue').modal('show');

    }

    function newValueData(){
        $("#labelStandardValue").html('New')
        $("#addNewValueBtn").html('Add')

        $("#addNewValueBtn").off('click')

        $('#addNewValueBtn').one('click', function(){
            newValue()
        })

        $("#valueID").val('')
        $('#type').val('')
        $('#function').val('')
        $('#functionType').val('')
        $('#sensorType').val('')

        $('#settingValue').val('')
        $('#settingValueUnit').val('')
        $('#coverageFactorValue').val('')
        $('#standardResolution').val('')
        $('#standardReadability').val('')
        $('#influenceFactorValue').val('')
        $('#percentageValue').val('')
        $('#uncertainty').val('')
        $('#uncertaintyUnit').val('')

        $('#rangeValue').val('')
        $('#rangeValueUnit').val('')

        $('#indicatedValue').val('')
        $('#indicatedValueUnit').val('')
        $('#previousIndicatedValue').val('')
        $('#previousIndicatedValueUnit').val('')
        $('#drift').val('')

        $('#modalNewStandardValue').modal('show');

    }

    function addStandardToTable(){
        $('#standardTableTbody').html('');
        let today = new Date();
        standardData.forEach((item, index) => {
            let dateOfCalibration = new Date(item.dateOfCalibration);
            let dueDate = new Date(dateOfCalibration.setFullYear(dateOfCalibration.getFullYear() + 1));
            let oneMonthBeforeDue = new Date(dueDate);
            oneMonthBeforeDue.setMonth(oneMonthBeforeDue.getMonth() - 1);
            let suffix = 'days left before due date';

            let bgColor = 'background-color:rgba(0,128,0,0.5)'; // Default color
            let disabled = false;

            if (today >= oneMonthBeforeDue && today < dueDate) {
                bgColor = 'background-color:rgba(255,165,0,0.5)'; // Warning color
            } else if (today >= dueDate) {
                bgColor = 'background-color:rgba(255,0,0,0.5)'; // Overdue color
                disabled = false;
                suffix = 'days over due date';
            }

            let days_due = Math.round(Math.abs((today - dueDate) / (24 * 60 * 60 * 1000)));


            let standardID = item.id;

            let tr = $('<tr>').attr('style', bgColor);;
            let idTd = $('<td>', {
                'class': 'd-none',
                'html': standardID,
            });
            let serialNumberTd = $('<td>').html(item.serialNumber);
            let certificateNumberTd = $('<td>').html(item.certificateNumber);
            let descriptionTd = $('<td>').html(item.description);
            let providerTd = $('<td>').html(item.calibrationProvider);
            let daysDueTd = $('<td>').html(days_due + ' ' + suffix);
            let editTD = $('<td>').attr('class', 'text-center');
            let deleteTd = $('<td>').attr('class', 'text-center');            

            let editBtn = $('<button>',{
                'type':'button',
                'class': 'btn btn-outline-primary',
                'type':'button',
                'html':'Edit',
            });
            editBtn.click(function(){
                editAddData(standardID)
                getStandardValues(standardID)
            })

            let deleteBtn = $('<button>',{
                'type':'button',
                'class': 'btn btn-outline-danger',
                'type':'button',
                'html':'Delete',
            });
            deleteBtn.click(function(){
                deleteConfirmation(standardID)
                // deleteStandard(standardID)
            })

            tr.append(
                idTd,
                serialNumberTd,
                certificateNumberTd,
                descriptionTd,
                providerTd,
                daysDueTd,
                editTD.append(editBtn),
                deleteTd.append(deleteBtn)
            )

            $('#standardTableTbody').append(tr)
        })
    }

    function addStandardValuesToTable(){
        $('#valueTableTbody').html('');
        standardValues.forEach((item, index) => {   
            let standardID = item.id;

            let serialNumberTD =$('<td>').html(item.serialNumber)
            let typeTD =$('<td>').html(item.type)
            let functionTD =$('<td>').html(item.function)
            let functionTypeTD =$('<td>').html(item.functionType)
            let sensorTypeTD =$('<td>').html(item.sensorType)

            let coverageFactorValueTD =$('<td>').html(item.coverageFactorValue)
            let standardResolutionTD =$('<td>').html(item.standardResolution)
            let standardReadabilityTD =$('<td>').html(item.standardReadability)
            let influenceFactorValueTD =$('<td>').html(item.influenceFactorValue)
            let percentageValueTD =$('<td>').html(item.percentageValue)
            let uncertaintyTD =$('<td>').html(item.uncertainty)
            let uncertaintyUnitTD =$('<td>').html(item.uncertaintyUnit)

            let rangeValueTD =$('<td>').html(item.rangeValue)
            let rangeValueUnitTD =$('<td>').html(item.rangeValueUnit)

            let settingValueTD =$('<td>').html(item.settingValue)
            let settingValueUnitTD =$('<td>').html(item.settingValueUnit)
        
            let indicatedValueTD =$('<td>').html(item.indicatedValue)
            let indicatedValueUnitTD =$('<td>').html(item.indicatedValueUnit)
        
            let previousIndicatedValueTD =$('<td>').html(item.previousIndicatedValue)
            let previousIndicatedValueUnitTD =$('<td>').html(item.previousIndicatedValueUnit)
            let driftTD =$('<td>').html(item.drift)



            let tr = $('<tr>');
            let idTd = $('<td>', {
                'class': 'd-none',
                'html': standardID,
            });

            let editTD = $('<td>').attr('class', 'text-center');
            let deleteTd = $('<td>').attr('class', 'text-center');            

            let editBtn = $('<button>',{
                'type':'button',
                'class': 'btn btn-outline-primary',
                'type':'button',
                'html':'Edit',
                'data-bs-dismiss':'modal'
            });
            editBtn.click(function(){
                editAddValueData(standardID)
            })

            let deleteBtn = $('<button>',{
                'type':'button',
                'class': 'btn btn-outline-danger',
                'type':'button',
                'html':'Delete',
            });
            deleteBtn.click(function(){
                deleteConfirmationValue(standardID)
         
            })

            tr.append(
                serialNumberTD,
                typeTD,
                functionTD,
                functionTypeTD,
                sensorTypeTD,

                coverageFactorValueTD,
                standardResolutionTD,
                standardReadabilityTD,
                influenceFactorValueTD,
                percentageValueTD,
                uncertaintyTD,
                uncertaintyUnitTD,

                rangeValueTD,
                rangeValueUnitTD,

                settingValueTD,
                settingValueUnitTD,
  
              
                indicatedValueTD,
                indicatedValueUnitTD,
                
                previousIndicatedValueTD,
                previousIndicatedValueUnitTD,
                driftTD,
                editTD.append(editBtn),
                deleteTd.append(deleteBtn)
            )

            $('#valueTableTbody').append(tr)
        })
    }

    function getStandardData(){
        $.ajax({
            cache: false,
            async: false,
            type: "post",
            url: "/standard/documentingProcessCalibrator/getStandardDataDocumentingProcessCalibrator",
            success: function(result) {
                standardData = result.standardData;
            },
            error: function (error) {
                console.log(error)
            },
        }).then(function(){
            addStandardToTable();
            $('#standardTable').DataTable();
        })
    }
    function getStandardValues(selectedStandard){
        let standardID = [selectedStandard];
        $.ajax({
            cache: false,
            async: false,
            type: "post",
            url: "/standard/documentingProcessCalibrator/getStandardValuesDocumentingProcessCalibratorByDetailsID",
            data: {
                'selectedStandardID': standardID,
            },
            success: function(result) {
                standardValues = result.standardValues;
               
            },
            error: function (error) {
                console.log(error)
            },
        })
    }

    function newStandard(){
        let certificateNumber = $('#certificateNumber').val()
        let serialNumber = $('#serialNumber').val()
        let description = $('#description').val()
        let provider = $('#provider').val()
        let brand = $('#brand').val()
        let model = $('#model').val()
        let dateOfCalibration = $('#dateOfCalibration').val()
        let coverageFactor = $('#coverageFactor').val()

        $.ajax({
            cache: false,
            // async: false,
            type: "post",
            url: "/standard/documentingProcessCalibrator/addDocumentingProcessCalibrator",
            data: {

                'certificateNumber' : certificateNumber,
                'serialNumber' : serialNumber,
                'description' : description,
                'provider' : provider,
                'brand' : brand,
                'model' : model,
                'dateOfCalibration' : dateOfCalibration,
                'coverageFactor' : coverageFactor,


            },
            success: function(result) {
                getStandardData();               
                console.log(result)
            },
            error: function (error) {
                console.log(error)
            },
        })

    }
    function updateStandard(){
        let standardID = $('#standardID').val()

        let certificateNumber = $('#certificateNumberEdit').val()
        let serialNumber = $('#serialNumberEdit').val()
        let description = $('#descriptionEdit').val()
        let provider = $('#providerEdit').val()
        let brand = $('#brandEdit').val()
        let model = $('#modelEdit').val()
        let dateOfCalibration = $('#dateOfCalibrationEdit').val()
        let coverageFactor = $('#coverageFactorEdit').val()
        $.ajax({
            cache: false,
            async: false,
            type: "post",
            url: "/standard/documentingProcessCalibrator/updateDocumentingProcessCalibrator",
                  
            data: {
                'standardID': standardID,
                'certificateNumber':certificateNumber,
                'serialNumber':serialNumber,
                'description':description,
                'provider':provider,
                'brand':brand,
                'model':model,
                'dateOfCalibration':dateOfCalibration,
                'coverageFactor':coverageFactor,
            },
            success: function(result) {
                getStandardData();                
            },
            error: function (error) {
                console.log(error)
            },
        })

    }

    function updateValue(){ 
        let standardID = $("#standardID").val()
        let serialNumberSelected = $("#serialNumberSelected").val()
        let valueID = $("#valueID").val()
        let typeValue = $('#type').val()
        let functionValue = $('#function').val()
        let functionTypeValue = $('#functionType').val()
        let sensorTypeValue = $('#sensorType').val()

        let coverageFactorValue = $('#coverageFactorValue').val()
        let standardResolution = $('#standardResolution').val()
        let standardReadability = $('#standardReadability').val()

        let influenceFactorValue = $('#influenceFactorValue').val()
        let percentageValue = $('#percentageValue').val()
        let uncertainty = $('#uncertainty').val()
        let uncertaintyUnit = $('#uncertaintyUnit').val()

        let rangeValue = $('#rangeValue').val()
        let rangeValueUnit = $('#rangeValueUnit').val()

        let settingValue = $('#settingValue').val() 
        let settingValueUnit = $('#settingValueUnit').val()
 
 
        let indicatedValue = $('#indicatedValue').val() 
        let indicatedValueUnit = $('#indicatedValueUnit').val()
    
        let previousIndicatedValue = $('#previousIndicatedValue').val()
        let previousIndicatedValueUnit = $('#previousIndicatedValueUnit').val()
        let drift = $('#drift').val()
        $.ajax({
            cache: false,
            async: false,
            type: "post",
            url: "/standard/documentingProcessCalibrator/updateStandardValuesDocumentingProcessCalibrator",
            data: {
                'valueID': valueID,
                'type': typeValue,
                'function': functionValue,
                'functionType': functionTypeValue,
                'sensorType': sensorTypeValue,

                'coverageFactorValue': coverageFactorValue,
                'standardResolution': standardResolution,
                'standardReadability': standardReadability,

                'influenceFactorValue': influenceFactorValue,
                'percentageValue': percentageValue,
                'uncertainty': uncertainty,
                'uncertaintyUnit': uncertaintyUnit,

                'rangeValue': rangeValue,
                'rangeValueUnit': rangeValueUnit,

                'settingValue': settingValue,
                'settingValueUnit': settingValueUnit,
         
               
                'indicatedValue': indicatedValue,
                'indicatedValueUnit': indicatedValueUnit,
                'previousIndicatedValue': previousIndicatedValue,
                'previousIndicatedValueUnit': previousIndicatedValueUnit,
                'drift': drift,
            },
            success: function(result) {
                getStandardValues(standardID)
                addStandardValuesToTable()
            },
            error: function (error) {
                console.log(error)
            },
        })
    }

    function newValue(){
        let standardID = $("#standardID").val()
        let serialNumberSelected = $("#serialNumberSelected").val()
        

        let typeValue = $('#type').val()
        let functionValue = $('#function').val()
        let functionTypeValue = $('#functionType').val()
        let sensorTypeValue = $('#sensorType').val()

        let coverageFactorValue = $('#coverageFactorValue').val()
        let standardResolution = $('#standardResolution').val()
        let standardReadability = $('#stadnardReadability').val()

        let influenceFactorValue = $('#influenceFactorValue').val()
        let percentageValue = $('#percentageValue').val()
        let uncertainty = $('#uncertainty').val()
        let uncertaintyUnit = $('#uncertaintyUnit').val()

        let rangeValue = $('#rangeValue').val()
        let rangeValueUnit = $('#rangeValueUnit').val()

        let settingValue = $('#settingValue').val()
        let settingValueUnit = $('#settingValueUnit').val()
 
      
        let indicatedValue = $('#indicatedValue').val()
        let indicatedValueUnit = $('#indicatedValueUnit').val()
        let previousIndicatedValue = $('#previousIndicatedValue').val()
        let previousIndicatedValueUnit = $('#previousIndicatedValueUnit').val()
        let drift = $('#drift').val()

        $.ajax({
            cache: false,
            async: false,
            type: "post",
            url: "/standard/documentingProcessCalibrator/newStandardValuesDocumentingProcessCalibrator",
            data: {
                'standardID':standardID,
                'serialNumber':serialNumberSelected,
                'type':typeValue,
                'function':functionValue,
                'functionType':functionTypeValue,
                'sensorType':sensorTypeValue,


                'coverageFactorValue':coverageFactorValue,
                'standardResolution':standardResolution,
                'standardReadability':standardReadability,

                'influenceFactorValue':influenceFactorValue,
                'percentageValue':percentageValue,
                'uncertainty':uncertainty,
                'uncertaintyUnit':uncertaintyUnit,

                'rangeValue':rangeValue,
                'rangeValueUnit':rangeValueUnit,

                'settingValue':settingValue,
                'settingValueUnit':settingValueUnit,
             
             
                'indicatedValue':indicatedValue,
                'indicatedValueUnit':indicatedValueUnit,
                'previousIndicatedValue':previousIndicatedValue,
                'previousIndicatedValueUnit':previousIndicatedValueUnit,
                'drift':drift,
            },
            success: function(result) {
                getStandardValues(standardID)
                addStandardValuesToTable()
            },
            error: function (error) {
                console.log(error)
            },
        })

    }
    function deleteStandard(detailsID){
        let standardID = detailsID
        $.ajax({
            cache: false,
            async: false,
            type: "post",
            url: "/standard/documentingProcessCalibrator/removeStandard",
            data: {
                'standardID': standardID,
            },
            success: function(result) {
                getStandardData();       
            },
            error: function (error) {
                console.log(error)
            },
        })
    }
    function deleteConfirmation(ID){
                if (confirm("Do you want to delete this Standard?")) {
                    deleteStandard(ID);
                }
            }

    function deleteStandardValue(valID){
        let standardID = $("#standardID").val()
        let valueID = valID
        $.ajax({
            cache: false,
            async: false,
            type: "post",
            url: "/standard/documentingProcessCalibrator/removeStandardValue",
            data: {
                'valID': valueID,
            },
            success: function(result) {
                getStandardValues(standardID)
                addStandardValuesToTable()
            },
            error: function (error) {
                console.log(error)
            },
        })
    }
    function deleteConfirmationValue(ID){
                if (confirm("Do you want to delete this Standard?")) {
                    deleteStandardValue(ID);
                }
            }

    function setUnits(){
        let array_unit = ["°C","µA", "mA", "A", "kA", "MA", "µV", "mV", "V", "kV", "MV", "µΩ", "mΩ", "Ω", "kΩ", "MΩ"];
        let array_hertz = ["°C","µHz", "mHz", "Hz", "kHz", "MHz"];
    
        array_unit.forEach(items => {
        let option = $('<option>').val(items)
        $('#units').append(option)
        })
        array_hertz.forEach(items => {
        let option = $('<option>').val(items)
        $('#hertz').append(option)
        })
    }

    function ACType(){
        let type = $('#type').val()

        if(type === 'AC'){
            $('#hertzInput').removeClass('d-none')
        }else{
            let hertzHasClass = $('#hertzInput').hasClass('d-none')
            if(!hertzHasClass){
                $('#hertzInput').addClass('d-none')
            }
        }
  
    }


    function DCType(){
        let type = $('#type').val()

        if(type === 'DC'){
            $('#rangeInput').removeClass('d-none')
        }else{
            let rangeValueHasClass = $('#rangeInput').hasClass('d-none')
            if(!rangeValueHasClass){
                $('#rangeInput').addClass('d-none')
            }
        }
  
    }


    function SensorTypeDC() {
        let sensorType = $('#sensorType').val();
        // Define the valid sensor types
        const validSensorTypes = [
            'DC Voltage',
            'DC Current',
        
        ];
        
        // Check if the sensor type contains any of the valid sensor types
        let isValidSensorType = validSensorTypes.some(type => sensorType.includes(type));
        
        if (isValidSensorType) {
            $('#rangeInput').removeClass('d-none');
        } else {
            let rangeValueHasClass = $('#rangeInput').hasClass('d-none');
            if (!rangeValueHasClass) {
                $('#rangeInput').addClass('d-none');
            }
        }
    }



    // function SensorType() {
    //     let sensorType = $('#sensorType').val();
    //     // Define the valid sensor types
    //     const validSensorTypes = [
    //         'Thermocouple Type K',
    //         'Thermocouple Type J',
    //         'Thermocouple Type T',
    //         'RTD Pt100'
    //     ];
    //     // Check if the sensor type contains any of the valid sensor types
    //     let isValidSensorType = validSensorTypes.some(type => sensorType.includes(type));
        
    //     if (isValidSensorType) {
    //         $('#influenceFactorInput').removeClass('d-none');
    //         $('#previousIndicatedValueInput').removeClass('d-none');
    //         $('#driftInput').removeClass('d-none');

    //     } else {
    //         let TypeHasClass1 = $('#influenceFactorInput').hasClass('d-none');
    //         if (!TypeHasClass1) {
    //             $('#influenceFactorInput').addClass('d-none');
    //         },
    //         let TypeHasClass2 = $('#previousIndicatedValueInput').hasClass('d-none');
    //         if (!TypeHasClass2) {
    //             $('#previousIndicatedValueInput').addClass('d-none');
    //         },
    //         let TypeHasClass3 = $('#driftInput').hasClass('d-none');
    //         if (!TypeHasClass3) {
    //             $('#driftInput').addClass('d-none');
    //         },
    //     }
    // }

    // function SensorType() {
    //     let sensorType = $('#sensorType').val();
    //     // Define the valid sensor types
    //     const validSensorTypes = [
    //         'Thermocouple Type K',
    //         'Thermocouple Type J',
    //         'Thermocouple Type T',
    //         'RTD Pt100'
    //     ];
        
    //     // Check if the sensor type contains any of the valid sensor types
    //     let isValidSensorType = validSensorTypes.some(type => sensorType.includes(type));
        
    //     if (isValidSensorType) {
        
    //         $('#influenceFactorInput').removeClass('d-none');
    //         $('#previousIndicatedValueInput').removeClass('d-none');
    //         $('#driftInput').removeClass('d-none');
    //     } else {
        
    //         if (!$('#influenceFactorInput').hasClass('d-none')) {
    //             $('#influenceFactorInput').addClass('d-none');
    //         }
    //         if (!$('#previousIndicatedValueInput').hasClass('d-none')) {
    //             $('#previousIndicatedValueInput').addClass('d-none');
    //         }
    //         if (!$('#driftInput').hasClass('d-none')) {
    //             $('#driftInput').addClass('d-none');
    //         }
    //     }
    // }

    // // Call the function whenever the sensor type changes
    // $('#sensorType').on('change', SensorType);


    function calculateDrift() {
        const indicatedValue = parseFloat($('#indicatedValue').val());
        const previousIndicatedValue = parseFloat($('#previousIndicatedValue').val());
        let drift = Math.abs(indicatedValue - previousIndicatedValue);
        // Round the result to two decimal places
        drift = Math.round(drift * 100) / 100;
        $('#drift').val(drift);
    }
    $('#indicatedValue, #previousIndicatedValue').on('input', calculateDrift);

</script>

<script>
    function bind(id, evt, func){
        var el = document.getElementById(id);
        if (el.addEventListener){
            el.addEventListener(evt, func);
        } else if (el.attachEvent) {
            el.attachEvent('on' + evt, func);
        }
    }
    function bindToElements(){
        bind('addNewDetailsBtn', 'click', function() {
            newStandard()
        });
        bind('updateDetailsBtn','click',function(){
            updateStandard()
        })
        bind('measurementBtn','click',function(){
            addStandardValuesToTable()
        })
        bind('addMeasurement','click',function(){
            newValueData()
        })
        bind('type','change',function(){
            ACType()
        })
        // bind('sensorType','change',function(){
        //     SensorTypeDC()
        // })
        // bind('sensorType','change',function(){
        //     SensorType()
        // })
    }
</script>