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
                'active' => 'standard8',
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
                                        <b>Multi-Product Calibrator</b>
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
                    <h5 class="modal-title" id="exampleModalLabel">New Multi-Product Calibrator</h5>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Multi-Product Calibrator</h5>
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

        <div class="modal fade" id="modalMeasurements" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable custom-size">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Standard</h5>
                    <div class="btn-toolbar mx-5" role="toolbar" >
                        <div class="btn-group me-2" role="group" >
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
                                    <th>Range Minimum</th>
                                    <th>Unit</th>
                                    <th>Range Maximun</th>
                                    <th>Unit</th>
                                    <th>Output Setting</th>
                                    <th>Unit</th>
                                    <th>Output Setting Frequency</th>
                                    <th>Unit</th>
                                    <th>Coverage Factor</th>
                                    <th>Measured Output Voltage</th>
                                    <th>Unit</th>
                                    <th>Uncertainty</th>
                                    <th>Unit</th>
                                    <th>Previous Measured Output Voltage</th>
                                    <th>Unit</th>
                                    <th>Drift</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody id="valueTableTbody"></tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalEdit"  data-bs-dismiss="modal">Cancel</button>
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
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class=" control-label" for="rangeMin">Range Minimum</label>  
                                        <div class="input-group">
                                            <input id="rangeMin" name="rangeMin" type="text" placeholder="" class="form-control input-md">
                                            <input id="rangeMinUnit" name="rangeMinUnit" type="text" placeholder="" class="form-control input-md" list='units'>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" control-label" for="rangeMax">Range Maximum</label>  
                                        <div class="input-group">
                                            <input id="rangeMax" name="rangeMax" type="text" placeholder="" class="form-control input-md">
                                            <input id="rangeMaxUnit" name="rangeMaxUnit" type="text" placeholder="" class="form-control input-md" list='units'>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" control-label" for="outputSetting">Output Setting</label>  
                                        
                                        <div class="row">
                                            <div class="col">
                                                <div class="input-group">
                                                    <input id="outputSetting" name="outputSetting" type="text" placeholder="" class="form-control input-md">
                                                    <input id="outputSettingUnit" name="outputSettingUnit" type="text" placeholder="" class="form-control input-md" list='units'>
                                                </div>
                                            </div>
                                            <div class="col d-none" id='hertzInput'>
                                                <div class="input-group">
                                                    <input id="outputSettingHertz" name="outputSettingHertz" type="text" placeholder="" class="form-control input-md">
                                                    <input id="outputSettingHertzUnit" name="outputSettingHertzUnit" type="text" placeholder="" class="form-control input-md" list='hertz'>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" control-label" for="coverageFactorValue">Coverage Factor</label>  
                                        <div class="">
                                            <input id="coverageFactorValue" name="coverageFactorValue" type="text" placeholder="" class="form-control input-md">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class=" control-label" for="measuredOutputVoltage">Measured Output Voltage</label>  
                                        <div class="input-group">
                                            <input id="measuredOutputVoltage" name="measuredOutputVoltage" type="text" placeholder="" class="form-control input-md">
                                            <input id="measuredOutputVoltageUnit" name="measuredOutputVoltageUnit" type="text" placeholder="" class="form-control input-md" list='units'>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" control-label" for="uncertainty">Uncertainty</label>  
                                        <div class="input-group">
                                            <input id="uncertainty" name="uncertainty" type="text" placeholder="" class="form-control input-md">
                                            <input id="uncertaintyUnit" name="uncertaintyUnit" type="text" placeholder="" class="form-control input-md" list='units'>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" control-label" for="previousMeasuredOutputVoltage">Previous Measured Output Voltage</label>  
                                        <div class="input-group">
                                            <input id="previousMeasuredOutputVoltage" name="previousMeasuredOutputVoltage" type="text" placeholder="" class="form-control input-md">
                                            <input id="previousMeasuredOutputVoltageUnit" name="previousMeasuredOutputVoltageUnit" type="text" placeholder="" class="form-control input-md" list='units'>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" control-label" for="drift">Drift</label>  
                                        <div class="">
                                            <input id="drift" name="drift" type="text" placeholder="" class="form-control input-md">
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
        // bind('addNewValueBtn','click',function(){
        //     updateValue()
        // })
        $('#addNewValueBtn').one('click', function(){
            updateValue()
        })

        let selectedStandardData = standardValues.find(o => o.id === ID);
        
        $("#valueID").val(selectedStandardData['id'])
        $('#type').val(selectedStandardData['type'])
        $('#function').val(selectedStandardData['function'])
        $('#rangeMin').val(selectedStandardData['rangeMin'])
        $('#rangeMinUnit').val(selectedStandardData['rangeMinUnit'])
        $('#rangeMax').val(selectedStandardData['rangeMax'])
        $('#rangeMaxUnit').val(selectedStandardData['rangeMaxUnit'])
        $('#outputSetting').val(selectedStandardData['outputSetting'])
        $('#outputSettingUnit').val(selectedStandardData['outputSettingUnit'])
        $('#outputSettingHertz').val(selectedStandardData['outputSettingHertz'])
        $('#outputSettingHertzUnit').val(selectedStandardData['outputSettingHertzUnit'])
        $('#coverageFactorValue').val(selectedStandardData['coverageFactorValue'])
        $('#measuredOutputVoltage').val(selectedStandardData['measuredOutputVoltage'])
        $('#measuredOutputVoltageUnit').val(selectedStandardData['measuredOutputVoltageUnit'])
        $('#uncertainty').val(selectedStandardData['uncertainty'])
        $('#uncertaintyUnit').val(selectedStandardData['uncertaintyUnit'])
        $('#previousMeasuredOutputVoltage').val(selectedStandardData['previousMeasuredOutputVoltage'])
        $('#previousMeasuredOutputVoltageUnit').val(selectedStandardData['previousMeasuredOutputVoltageUnit'])
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
        $('#rangeMin').val('')
        $('#rangeMinUnit').val('')
        $('#rangeMax').val('')
        $('#rangeMaxUnit').val('')
        $('#outputSetting').val('')
        $('#outputSettingUnit').val('')
        $('#outputSettingHertz').val('')
        $('#outputSettingHertzUnit').val('')
        $('#coverageFactorValue').val('')
        $('#measuredOutputVoltage').val('')
        $('#measuredOutputVoltageUnit').val('')
        $('#uncertainty').val('')
        $('#uncertaintyUnit').val('')
        $('#previousMeasuredOutputVoltage').val('')
        $('#previousMeasuredOutputVoltageUnit').val('')
        $('#drift').val('')

        $('#modalNewStandardValue').modal('show');

    }

    function addStandardToTable(){
        $('#standardTableTbody').html('');
        let today = new Date();
        standardData.forEach((item, index) => {
            let standardID = item.id;

            let suffix = 'days left before due date';
            let date_next_calibration = new Date(item.dateOfCalibration)
            date_next_calibration.setFullYear(date_next_calibration.getFullYear() + 1);
            let days_due = Math.round(Math.abs((today - date_next_calibration) / (24 * 60 * 60 * 1000)));
            
            let tr = $('<tr>');
            if(today > date_next_calibration){
                tr.attr('style', 'background-color: rgba(255, 0, 0, 0.4)')
                suffix = 'days over due date';
            }else{
                tr.attr('style', 'background-color: rgba(0, 255, 0, 0.4)')
            }

            let idTd = $('<td>', {
                'class': 'd-none',
                'html': standardID,
            });
            let serialNumberTd = $('<td>').html(item.serialNumber);
            let certificateNumberTd = $('<td>').html(item.certificateNumber);
            let descriptionTd = $('<td>').html(item.description);
            let providerTd = $('<td>').html(item.calibrationProvider);
            let daysDue = $('<td>').html(days_due + ' ' + suffix);
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
                deleteStandard(standardID)
            })

            tr.append(
                idTd,
                serialNumberTd,
                certificateNumberTd,
                descriptionTd,
                providerTd,
                daysDue,
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
            let rangeMinTD =$('<td>').html(item.rangeMin)
            let rangeMinUnitTD =$('<td>').html(item.rangeMinUnit)
            let rangeMaxTD =$('<td>').html(item.rangeMax)
            let rangeMaxUnitTD =$('<td>').html(item.rangeMaxUnit)
            let outputSettingTD =$('<td>').html(item.outputSetting)
            let outputSettingUnitTD =$('<td>').html(item.outputSettingUnit)
            let outputSettingHertzTD =$('<td>').html(item.outputSettingHertz)
            let outputSettingHertzUnitTD =$('<td>').html(item.outputSettingHertzUnit)
            let coverageFactorValueTD =$('<td>').html(item.coverageFactorValue)
            let measuredOutputVoltageTD =$('<td>').html(item.measuredOutputVoltage)
            let measuredOutputVoltageUnitTD =$('<td>').html(item.measuredOutputVoltageUnit)
            let uncertaintyTD =$('<td>').html(item.uncertainty)
            let uncertaintyUnitTD =$('<td>').html(item.uncertaintyUnit)
            let previousMeasuredOutputVoltageTD =$('<td>').html(item.previousMeasuredOutputVoltage)
            let previousMeasuredOutputVoltageUnitTD =$('<td>').html(item.previousMeasuredOutputVoltageUnit)
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
                deleteStandardValue(standardID)
            })

            tr.append(
                serialNumberTD,
                typeTD,
                functionTD,
                rangeMinTD,
                rangeMinUnitTD,
                rangeMaxTD,
                rangeMaxUnitTD,
                outputSettingTD,
                outputSettingUnitTD,
                outputSettingHertzTD,
                outputSettingHertzUnitTD,
                coverageFactorValueTD,
                measuredOutputVoltageTD,
                measuredOutputVoltageUnitTD,
                uncertaintyTD,
                uncertaintyUnitTD,
                previousMeasuredOutputVoltageTD,
                previousMeasuredOutputVoltageUnitTD,
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
            url: "/standard/multiProductCalibrator/getStandardDataMultiProductCalibrator",
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
            url: "/standard/multiProductCalibrator/getStandardValuesMultiProductCalibratorByDetailsID",
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
            url: "/standard/multiProductCalibrator/addMultiProductCalibrator",
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
            //async: false,
            type: "post",
            url: "/standard/multiProductCalibrator/updateMultiProductCalibrator",
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
        let rangeMin = $('#rangeMin').val()
        let rangeMinUnit = $('#rangeMinUnit').val()
        let rangeMax = $('#rangeMax').val()
        let rangeMaxUnit = $('#rangeMaxUnit').val()
        let outputSetting = $('#outputSetting').val()
        let outputSettingUnit = $('#outputSettingUnit').val()
        let outputSettingHertz = $('#outputSettingHertz').val()
        let outputSettingHertzUnit = $('#outputSettingHertzUnit').val()
        let coverageFactorValue = $('#coverageFactorValue').val()
        let measuredOutputVoltage = $('#measuredOutputVoltage').val()
        let measuredOutputVoltageUnit = $('#measuredOutputVoltageUnit').val()
        let uncertainty = $('#uncertainty').val()
        let uncertaintyUnit = $('#uncertaintyUnit').val()
        let previousMeasuredOutputVoltage = $('#previousMeasuredOutputVoltage').val()
        let previousMeasuredOutputVoltageUnit = $('#previousMeasuredOutputVoltageUnit').val()
        let drift = $('#drift').val()
        $.ajax({
            cache: false,
            //async: false,
            type: "post",
            url: "/standard/multiProductCalibrator/updateStandardValuesMultiProductCalibrator",
            data: {
                'valueID': valueID,
                'type': typeValue,
                'function': functionValue,
                'rangeMin': rangeMin,
                'rangeMinUnit': rangeMinUnit,
                'rangeMax': rangeMax,
                'rangeMaxUnit': rangeMaxUnit,
                'outputSetting': outputSetting,
                'outputSettingUnit': outputSettingUnit,
                'outputSettingHertz': outputSettingHertz,
                'outputSettingHertzUnit': outputSettingHertzUnit,
                'coverageFactorValue': coverageFactorValue,
                'measuredOutputVoltage': measuredOutputVoltage,
                'measuredOutputVoltageUnit': measuredOutputVoltageUnit,
                'uncertainty': uncertainty,
                'uncertaintyUnit': uncertaintyUnit,
                'previousMeasuredOutputVoltage': previousMeasuredOutputVoltage,
                'previousMeasuredOutputVoltageUnit': previousMeasuredOutputVoltageUnit,
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
        let rangeMin = $('#rangeMin').val()
        let rangeMinUnit = $('#rangeMinUnit').val()
        let rangeMax = $('#rangeMax').val()
        let rangeMaxUnit = $('#rangeMaxUnit').val()
        let outputSetting = $('#outputSetting').val()
        let outputSettingUnit = $('#outputSettingUnit').val()
        let outputSettingHertz = $('#outputSettingHertz').val()
        let outputSettingHertzUnit = $('#outputSettingHertzUnit').val()
        let coverageFactorValue = $('#coverageFactorValue').val()
        let measuredOutputVoltage = $('#measuredOutputVoltage').val()
        let measuredOutputVoltageUnit = $('#measuredOutputVoltageUnit').val()
        let uncertainty = $('#uncertainty').val()
        let uncertaintyUnit = $('#uncertaintyUnit').val()
        let previousMeasuredOutputVoltage = $('#previousMeasuredOutputVoltage').val()
        let previousMeasuredOutputVoltageUnit = $('#previousMeasuredOutputVoltageUnit').val()
        let drift = $('#drift').val()

        $.ajax({
            cache: false,
            // async: false,
            type: "post",
            url: "/standard/multiProductCalibrator/newStandardValuesMultiProductCalibrator",
            data: {
                'standardID':standardID,
                'serialNumber':serialNumberSelected,
                'type':typeValue,
                'function':functionValue,
                'rangeMin':rangeMin,
                'rangeMinUnit':rangeMinUnit,
                'rangeMax':rangeMax,
                'rangeMaxUnit':rangeMaxUnit,
                'outputSetting':outputSetting,
                'outputSettingUnit':outputSettingUnit,
                'outputSettingHertz':outputSettingHertz,
                'outputSettingHertzUnit':outputSettingHertzUnit,
                'coverageFactorValue':coverageFactorValue,
                'measuredOutputVoltage':measuredOutputVoltage,
                'measuredOutputVoltageUnit':measuredOutputVoltageUnit,
                'uncertainty':uncertainty,
                'uncertaintyUnit':uncertaintyUnit,
                'previousMeasuredOutputVoltage':previousMeasuredOutputVoltage,
                'previousMeasuredOutputVoltageUnit':previousMeasuredOutputVoltageUnit,
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
            //async: false,
            type: "post",
            url: "/standard/multiProductCalibrator/removeStandard",
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
    function deleteStandardValue(valID){
        let standardID = $("#standardID").val()
        let valueID = valID
        $.ajax({
            cache: false,
            //async: false,
            type: "post",
            url: "/standard/multiProductCalibrator/removeStandardValue",
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
    function setUnits(){
        let array_unit = ["µA", "mA", "A", "kA", "MA", "µV", "mV", "V", "kV", "MV", "µΩ", "mΩ", "Ω", "kΩ", "MΩ"];
        let array_hertz = ["µHz", "mHz", "Hz", "kHz", "MHz"];
    
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
    function addNewStandardValues(){
       



    }
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
        
        
        
        
    }
</script>