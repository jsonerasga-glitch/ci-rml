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
                'active' => 'standard16',
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
                                        <b>Buffer Solution</b>
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
                    <h5 class="modal-title" id="exampleModalLabel">New Buffer Solution</h5>
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
                                <label class=" control-label" for="pHValue">pH Value</label>  
                                <div class="">
                                    <input id="pHValue" name="pHValue" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label class=" control-label" for="serialNumber">Serial Number</label>  
                                <div class="">
                                    <input id="serialNumber" name="serialNumber" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div> -->
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
                    
                            <!-- <div class="form-group">
                                <label class=" control-label" for="model">Make / Model Number</label>  
                                <div class="">
                                    <input id="model" name="model" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label class=" control-label" for="dateOfCalibration">Date Of Calibration</label>  
                                <div class="">
                                    <input id="dateOfCalibration" name="dateOfCalibration" type="date" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                          
                            <div class="form-group">
                                <label class=" control-label" for="uncertaintypH">Uncertainty of pH Standard</label>  
                                <div class="">
                                    <input id="uncertaintypH" name="uncertaintypH" type="text" placeholder="" class="form-control input-md">
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Buffer Solution</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <fieldset>
                            <input type="hidden" name="standardID" id="standardID">
                              <input type="hidden" name="certificateNumberSelected" id="certificateNumberSelected">
                              <!-- <input type="hidden" name="pHValueSelected" id="pHValueSelected"> -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="certificateNumberEdit" name="certificateNumberEdit" placeholder="Certificate Number">
                                <label for="certificateNumberEdit">Certificate Number</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="pHValueEdit" name="pHValueEdit" placeholder="pH">
                                <label for="pHValueEdit">pH Value</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="descriptionEdit" name="descriptionEdit" placeholder="Description">
                                <label for="descriptionEdit">Description</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="providerEdit" name="providerEdit" placeholder="Calibration Provider">
                                <label for="providerEdit">Calibration Provider</label>
                            </div>

                         
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="dateOfCalibrationEdit" name="dateOfCalibrationEdit" placeholder="Date Of Calibration">
                                <label for="dateOfCalibrationEdit">Date Of Calibration</label>
                            </div>
                           
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="uncertaintypHEdit" name="uncertaintypHEdit" placeholder="Uncertainty of pH Standard">
                                <label for="uncertaintypHEdit">Uncertainty of pH Standard</label>
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
                                    <th>Certificate Number</th>
                                    <th>Buffer Solution Reading</th>
                                    <th>Next Buffer Solution Reading</th>
                                    <th>Drift of Buffer Solution Reading</th>
                                    <th>Temperature</th>
                                    <th>Next Temperature</th>
                                    <th>Change in Temperature</th>
                                    <th>Sensitivity Coefficient</th>
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
                            <div class="row">
                                <div class="col">                          
                                    <div class="form-group">
                                            <label class=" control-label" for="bufferSolutionReading">Buffer Solution Reading</label>  
                                            <div class="">
                                                <input id="bufferSolutionReading" name="bufferSolutionReading" type="text" placeholder="" class="form-control input-md">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label class=" control-label" for="nextBufferSolutionReading">Next Buffer Solution Reading</label>  
                                            <div class="">
                                                <input id="nextBufferSolutionReading" name="nextBufferSolutionReading" type="text" placeholder="" class="form-control input-md">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label class=" control-label" for="driftOfBufferSolutionReading">Drift of Buffer Reading</label>  
                                            <div class="">
                                                <input id="driftOfBufferSolutionReading" name="driftOfBufferSolutionReading" type="text" placeholder="" class="form-control input-md bg-warning">
                                            </div>
                                    </div>
                              
                                </div>
                                <div class="col">
                                        <div class="form-group">
                                            <label class=" control-label" for="temperature">Temperature</label>  
                                            <div class="">
                                                <input id="temperature" name="temperature" type="text" placeholder="" class="form-control input-md">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class=" control-label" for="nextTemperature">Next Temperature</label>  
                                            <div class="">
                                                <input id="nextTemperature" prevtemperature="nextTemperature" type="text" placeholder="" class="form-control input-md ">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class=" control-label" for="changeInTemperature">Change in Temperature</label>  
                                            <div class="">
                                                <input id="changeInTemperature" name="changeInTemperature" type="text" placeholder="" class="form-control input-md bg-warning">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class=" control-label" for="sensitivityCoefficient">Sensitivity Coefficient</label>  
                                            <div class="">
                                                <input id="sensitivityCoefficient" name="sensitivityCoefficient" type="text" placeholder="" class="form-control input-md bg-warning">
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
        $("#certificateNumberSelected").val(selectedStandardData['certificateNumber'])
        // $("#pHValueSelected").val(selectedStandardData['pHValue'])
        $("#certificateNumberEdit").val(selectedStandardData['certificateNumber'])
        $("#descriptionEdit").val(selectedStandardData['description'])
        $("#providerEdit").val(selectedStandardData['calibrationProvider'])
        $("#pHValueEdit").val(selectedStandardData['pHValue'])
        $("#dateOfCalibrationEdit").val(selectedStandardData['dateOfCalibration'])
        $("#uncertaintypHEdit").val(selectedStandardData['uncertaintypH'])
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
        $('#bufferSolutionReading').val(selectedStandardData['bufferSolutionReading'])
        $('#nextBufferSolutionReading').val(selectedStandardData['nextBufferSolutionReading'])
        $('#driftOfBufferSolutionReading').val(selectedStandardData['driftOfBufferSolutionReading'])
        $('#temperature').val(selectedStandardData['temperature'])
        $('#nextTemperature').val(selectedStandardData['nextTemperature'])
        $('#changeInTemperature').val(selectedStandardData['changeInTemperature'])
        $('#sensitivityCoefficient').val(selectedStandardData['sensitivityCoefficient'])
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
        $('#bufferSolutionReading').val('')
        $('#nextBufferSolutionReading').val('')
        $('#driftOfBufferSolutionReading').val('')
        $('#temperature').val('')
        $('#nextTemperature').val('')
        $('#changeInTemperature').val('')
        $('#sensitivityCoefficient').val('')
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
            let tr = $('<tr>').attr('style', bgColor);
            let idTd = $('<td>', {
                'class': 'd-none',
                'html': standardID,
            });
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
            })
            tr.append(
                idTd,
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
            let certificateNumberTD =$('<td>').html(item.certificateNumber)
            // let pHValueTD =$('<td>').html(item.pHValue)
            let bufferSolutionReadingTD =$('<td>').html(item.bufferSolutionReading)
            let nextBufferSolutionReadingTD =$('<td>').html(item.nextBufferSolutionReading)
            let driftOfBufferSolutionReadingTD =$('<td>').html(item.driftOfBufferSolutionReading)
            let temperatureTD =$('<td>').html(item.temperature)
            let nextTemperatureTD =$('<td>').html(item.nextTemperature)
            let changeInTemperatureTD =$('<td>').html(item.changeInTemperature)
            let sensitivityCoefficientTD =$('<td>').html(item.sensitivityCoefficient)
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
                certificateNumberTD,
                // pHValueTD,
                bufferSolutionReadingTD,
                nextBufferSolutionReadingTD,
                driftOfBufferSolutionReadingTD,
                temperatureTD,
                nextTemperatureTD,
                changeInTemperatureTD,
                sensitivityCoefficientTD,
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
            url: "/standard/bufferSolution/getStandardDataBufferSolution",
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
            url: "/standard/bufferSolution/getStandardValuesBufferSolutionByDetailsID",
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
        let description = $('#description').val()
        let provider = $('#provider').val()
        let pHValue = $('#pHValue').val()
        let dateOfCalibration = $('#dateOfCalibration').val()
         let uncertaintypH = $('#uncertaintypH').val()

        $.ajax({
            cache: false,
            async: false,
            type: "post",
            url: "/standard/bufferSolution/addBufferSolution",
            data: {
                'certificateNumber' : certificateNumber,
                'description' : description,
                'provider' : provider,
                'pHValue' : pHValue,
                'dateOfCalibration' : dateOfCalibration,
                 'uncertaintypH' : uncertaintypH,
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
        let description = $('#descriptionEdit').val()
        let provider = $('#providerEdit').val()
        let pHValue = $('#pHValueEdit').val()
        let dateOfCalibration = $('#dateOfCalibrationEdit').val()
         let uncertaintypH = $('#uncertaintypHEdit').val()
        $.ajax({
            cache: false,
            async: false,
            type: "post",
            url: "/standard/bufferSolution/updateBufferSolution",
                  
            data: {
                'standardID': standardID,
                'certificateNumber':certificateNumber,
                'description':description,
                'provider':provider,
                'pHValue':pHValue,
                'dateOfCalibration':dateOfCalibration,
                'uncertaintypH':uncertaintypH,
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
        let certificateNumberSelected = $("#certificateNumberSelected").val()
        // let pHValueSelected = $("#pHValueSelected").val()
        let valueID = $("#valueID").val()
      
     
        let bufferSolutionReading = $('#bufferSolutionReading').val()
        let nextBufferSolutionReading = $('#nextBufferSolutionReading').val()
        let driftOfBufferSolutionReading = $('#driftOfBufferSolutionReading').val()

        let temperature = $('#temperature').val()
        let nextTemperature = $('#nextTemperature').val()
        let changeInTemperature = $('#changeInTemperature').val()
        let sensitivityCoefficient = $('#sensitivityCoefficient').val()
        
        $.ajax({
            cache: false,
            async: false,
            type: "post",
            url: "/standard/bufferSolution/updateStandardValuesBufferSolution",
            data: {
                'valueID': valueID,
        
                'bufferSolutionReading': bufferSolutionReading,
                'nextBufferSolutionReading': nextBufferSolutionReading,
                'driftOfBufferSolutionReading': driftOfBufferSolutionReading,
           
                'temperature': temperature,
                'nextTemperature': nextTemperature,
                'changeInTemperature': changeInTemperature,
                'sensitivityCoefficient': sensitivityCoefficient,
         
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

        let certificateNumberSelected = $("#certificateNumberSelected").val()
        // let pHValueSelected = $("#pHValueSelected").val()

        let pHValue = $('#pHValue').val()
        let bufferSolutionReading = $('#bufferSolutionReading').val()
        let nextBufferSolutionReading = $('#nextBufferSolutionReading').val()
        let driftOfBufferSolutionReading = $('#driftOfBufferSolutionReading').val()

        let temperature = $('#temperature').val()
        let nextTemperature = $('#nextTemperature').val()
        let changeInTemperature = $('#changeInTemperature').val()
        let sensitivityCoefficient = $('#sensitivityCoefficient').val()
        $.ajax({
            cache: false,
            async: false,
            type: "post",
            url: "/standard/bufferSolution/newStandardValuesBufferSolution",
            data: {
                'standardID':standardID,
                'certificateNumber':certificateNumberSelected,
                // 'pHValue':pHValueSelected,
                'bufferSolutionReading':bufferSolutionReading,
                'nextBufferSolutionReading':nextBufferSolutionReading,
                'driftOfBufferSolutionReading':driftOfBufferSolutionReading,
                'temperature':temperature,
                'nextTemperature':nextTemperature,
                'changeInTemperature':changeInTemperature,
                'sensitivityCoefficient':sensitivityCoefficient,

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
            url: "/standard/bufferSolution/removeStandard",
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
            url: "/standard/bufferSolution/removeStandardValue",
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





    function calculateDriftBufferSolutionReading() {
        const bufferValue = parseFloat($('#bufferSolutionReading').val());
        const nextBufferValue = parseFloat($('#nextBufferSolutionReading').val());
        let readingdiff = Math.abs(bufferValue - nextBufferValue);
        /**Round the result to two decimal places */
        readingdiff = Math.round(readingdiff * 100) / 100;
        $('#driftOfBufferSolutionReading').val(readingdiff);
    }
    $('#bufferSolutionReading, #nextBufferSolutionReading').on('input', calculateDriftBufferSolutionReading);

    function calculateChangeInTemperature() {
        const temperatureValue = parseFloat($('#temperature').val());
        const nextTemperatureValue = parseFloat($('#nextTemperature').val());
        let changeInTemp = nextTemperatureValue - temperatureValue;
        $('#changeInTemperature').val(changeInTemp);
    }
    $('#temperature, #nextTemperature').on('input', calculateChangeInTemperature);

    function calculateSensitivityCoefficient() {
        const readingDiffValue = parseFloat($('#driftOfBufferSolutionReading').val());
        const tempDriftValue = parseFloat($('#changeInTemperature').val());
        let sensitivityCoefficient = readingDiffValue / tempDriftValue;
        $('#sensitivityCoefficient').val(sensitivityCoefficient);
    }
    $('#nextBufferSolutionReading, #nextTemperature, #driftOfBufferSolutionReading, #changeInTemperature').on('input', calculateSensitivityCoefficient);



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
    
    }
</script>