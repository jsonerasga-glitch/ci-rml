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
                'active' => 'standard10',
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
                                        <b>Digital Timer</b>
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
                    <h5 class="modal-title" id="exampleModalLabel">Digital Timer</h5>
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

                               
                            <div class="form-group">
                                <label class=" control-label" for="standardResolution">Standard Resolution</label>  
                                <div class="">
                                    <input id="standardResolution" name="standardResolution" type="text" placeholder="" class="form-control input-md">
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Digital Timer</h5>
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
                                <label class=" control-label" for="standardResolutionEdit">Standard Resolution</label>  
                                <div class="">
                                    <input id="standardResolutionEdit" name="standardResolutionEdit" type="text" placeholder="" class="form-control input-md">
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
                                   
                                    <th>RML Reading</th>
                                    <th>NML Reading</th>
                             
                                    <th>Correction ,s</th>
                                    <th>Previous Correction ,s</th>
                         
                                    <th>Drift ,s</th>
                                    <th>Uncertainty ,s</th>
                               
                                
                                    <th>Measured ,Hz</th>
                                    <th>Previous Measured ,Hz</th>
                                    <th>Deviation ,Hz</th>
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
                                <option selected>Select Type </option>
                                <option value="time">Standard in Time</option>
                                <option value="frequency">Standard in Frequency</option>
                            </select>
                        </div>
                    </div> 
                                    
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class=" control-label" for="rmlReading">Reading (RML ), s</label>  
                                <div class="">
                                    <input id="rmlReading" name="rmlReading" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="nmlReading">Reading (NML ), s</label>  
                                <div class="">
                                    <input id="nmlReading" name="nmlReading" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="correctionSecond">Correction ,s</label>  
                                <div class="">
                                    <input id="correctionSecond" name="correctionSecond" type="text" placeholder="" class="form-control input-md bg-warning">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="previousCorrectionSecond">Previous Correction ,s</label>  
                                <div class="">
                                    <input id="previousCorrectionSecond" name="previousCorrectionSecond" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="driftSecond">Drift ,s</label>  
                                <div class="">
                                    <input id="driftSecond" name="driftSecond" type="text" placeholder="" class="form-control input-md bg-warning">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="uncertaintySecond">Uncertainty ,s</label>  
                                <div class="">
                                    <input id="uncertaintySecond" name="uncertaintySecond" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class=" control-label" for="measuredFrequency">Measured 10 MHz Time Base Output Frequency, Hz</label>  
                                <div class="input-group">
                                    <input id="measuredFrequency" name="measuredFrequency" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="previousMeasuredFrequency">Previous Measured 10 MHz Time Base Output Frequency, Hz</label>  
                                <div class="input-group">
                                    <input id="previousMeasuredFrequency" name="previousMeasuredFrequency" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="deviationHertz">Deviation ,Hz</label>  
                                <div class="input-group">
                                    <input id="deviationHertz" name="deviationHertz" type="text" placeholder="" class="form-control input-md bg-warning">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="uncertaintyHertz">Uncertainty ,Hz</label>  
                                <div class="input-group">
                                    <input id="uncertaintyHertz" name="uncertaintyHertz" type="text" placeholder="" class="form-control input-md">
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
        $("#standardResolutionEdit").val(selectedStandardData['standardResolution'])
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


        $('#rmlReading').val(selectedStandardData['rmlReading'])
        $('#nmlReading').val(selectedStandardData['nmlReading'])
        $('#correctionSecond').val(selectedStandardData['correctionSecond'])
        $('#previousCorrectionSecond').val(selectedStandardData['previousCorrectionSecond'])
        $('#driftSecond').val(selectedStandardData['driftSecond'])
        $('#uncertaintySecond').val(selectedStandardData['uncertaintySecond'])


        $('#measuredFrequency').val(selectedStandardData['measuredFrequency'])
        $('#previousMeasuredFrequency').val(selectedStandardData['previousMeasuredFrequency'])
        $('#deviationHertz').val(selectedStandardData['deviationHertz'])
        $('#uncertaintyHertz').val(selectedStandardData['uncertaintyHertz'])

        
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
        $('#rmlReading').val('')
        $('#rmlReadingUnit').val('')

        $('#nmlReading').val('')
        $('#nmlReadingUnit').val('')
        $('#correctionSecond').val('')
        $('#previousCorrectionSecond').val('')
        
        $('#measuredFrequency').val('')
        $('#previousMeasuredFrequency').val('')
        $('#deviationHertz').val('')
        $('#uncertaintyHertz').val('')

        $('#modalNewStandardValue').modal('show');

    }

    function addStandardToTable(){
        $('#standardTableTbody').html('');
        let today = new Date();
        standardData.forEach((item, index) => {
            let standardID = item.id;


            let dateOfCalibration = new Date(item.dateOfCalibration);
            let dueDate = new Date(dateOfCalibration.setFullYear(dateOfCalibration.getFullYear() + 1));
            let oneMonthBeforeDue = new Date(dueDate);
            oneMonthBeforeDue.setMonth(oneMonthBeforeDue.getMonth() - 1);
    
            let bgColor = 'background-color:rgba(0,128,0,0.5)'; // Default color
            let disabled = false;
            let suffix = 'days left before due date';

            if (today >= oneMonthBeforeDue && today < dueDate) {
                bgColor = 'background-color:rgba(255,165,0,0.5)'; // Warning color
            } else if (today >= dueDate) {
                bgColor = 'background-color:rgba(255,0,0,0.5)'; // Overdue color
                disabled = false;
                suffix = 'days over due date';
            }

            let days_due = Math.round(Math.abs((today - dueDate) / (24 * 60 * 60 * 1000)));
           
            let tr = $('<tr>').attr('style', bgColor);
            let idTd = $('<td>', {
                'class': 'd-none',
                'html': standardID,
            });
            let serialNumberTd = $('<td>').html(item.serialNumber);
            let certificateNumberTd = $('<td>').html(item.certificateNumber);
            let descriptionTd = $('<td>').html(item.description);
            let providerTd = $('<td>').html(item.calibrationProvider);
            let days_due_Td = $('<td>').html(days_due + ' ' + suffix);
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
                serialNumberTd,
                certificateNumberTd,
                descriptionTd,
                providerTd,
                days_due_Td,
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
      
            let rmlReadingTD =$('<td>').html(item.rmlReading)
            let nmlReadingTD =$('<td>').html(item.nmlReading)
    
            let correctionSecondTD =$('<td>').html(item.correctionSecond)
            let previousCorrectionSecondTD =$('<td>').html(item.previousCorrectionSecond)
            let driftSecondTD =$('<td>').html(item.driftSecond)
            let uncertaintySecondTD =$('<td>').html(item.uncertaintySecond)
 
            let measuredFrequencyTD =$('<td>').html(item.measuredFrequency)
            let previousMeasuredFrequencyTD =$('<td>').html(item.previousMeasuredFrequency)
            let deviationHertzTD =$('<td>').html(item.deviationHertz)
            let uncertaintyHertzTD =$('<td>').html(item.uncertaintyHertz)


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
         
                rmlReadingTD,
                nmlReadingTD,
                correctionSecondTD,
                previousCorrectionSecondTD,
                driftSecondTD,
                uncertaintySecondTD,
         
                measuredFrequencyTD,
                previousMeasuredFrequencyTD,
                deviationHertzTD,
                uncertaintyHertzTD,

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
            url: "/standard/digitalTimer/getStandardDataDigitalTimer",
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
            url: "/standard/digitalTimer/getStandardValuesDigitalTimerByDetailsID",
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
        let standardResolution = $('#standardResolution').val()

        $.ajax({
            cache: false,
            // async: false,
            type: "post",
            url: "/standard/digitalTimer/addDigitalTimer",
            data: {

                'certificateNumber' : certificateNumber,
                'serialNumber' : serialNumber,
                'description' : description,
                'provider' : provider,
                'brand' : brand,
                'model' : model,
                'dateOfCalibration' : dateOfCalibration,
                'coverageFactor' : coverageFactor,
                'standardResolution' : standardResolution,


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
        let standardResolution = $('#standardResolutionEdit').val()
        $.ajax({
            cache: false,
            //async: false,
            type: "post",
            url: "/standard/digitalTimer/updateDigitalTimer",
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
                'standardResolution':standardResolution,
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

        let rmlReading = $('#rmlReading').val()
        let nmlReading = $('#nmlReading').val()
        let correctionSecond = $('#correctionSecond').val()
        let previousCorrectionSecond = $('#previousCorrectionSecond').val()
        let driftSecond = $('#driftSecond').val()
        let uncertaintySecond = $('#uncertaintySecond').val()
 
        let measuredFrequency = $('#measuredFrequency').val()
        let previousMeasuredFrequency = $('#previousMeasuredFrequency').val()
        let deviationHertz = $('#deviationHertz').val()
        let uncertaintyHertz = $('#uncertaintyHertz').val()

        $.ajax({
            cache: false,
            //async: false,
            type: "post",
            url: "/standard/digitalTimer/updateStandardValuesDigitalTimer",
            data: {
                'valueID': valueID,
                'type': typeValue,
          
                'rmlReading': rmlReading,
                'nmlReading': nmlReading,
                'correctionSecond': correctionSecond,
                'previousCorrectionSecond': previousCorrectionSecond,
                'driftSecond': driftSecond,
                'uncertaintySecond': uncertaintySecond,
      

                'measuredFrequency': measuredFrequency,
                'previousMeasuredFrequency': previousMeasuredFrequency,
                'deviationHertz': deviationHertz,
                'uncertaintyHertz': uncertaintyHertz,

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

        let rmlReading = $('#rmlReading').val()
        let nmlReading = $('#nmlReading').val()
        let correctionSecond = $('#correctionSecond').val()
        let previousCorrectionSecond = $('#previousCorrectionSecond').val()
        let driftSecond = $('#driftSecond').val()
        let uncertaintySecond = $('#uncertaintySecond').val()

        let measuredFrequency = $('#measuredFrequency').val()
        let previousMeasuredFrequency = $('#previousMeasuredFrequency').val()
        let deviationHertz = $('#deviationHertz').val()
        let uncertaintyHertz = $('#uncertaintyHertz').val()

        $.ajax({
            cache: false,
            // async: false,
            type: "post",
            url: "/standard/digitalTimer/newStandardValuesDigitalTimer",
            data: {
                'standardID':standardID,
                'serialNumber':serialNumberSelected,
                'type':typeValue,

                'rmlReading':rmlReading,
                'nmlReading':nmlReading,
                'correctionSecond':correctionSecond,
                'previousCorrectionSecond':previousCorrectionSecond,
                'driftSecond':driftSecond,
                'uncertaintySecond':uncertaintySecond,
   
                'measuredFrequency':measuredFrequency,
                'previousMeasuredFrequency':previousMeasuredFrequency,
                'deviationHertz':deviationHertz,
                'uncertaintyHertz':uncertaintyHertz,
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
            url: "/standard/digitalTimer/removeStandard",
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
            //async: false,
            type: "post",
            url: "/standard/digitalTimer/removeStandardValue",
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
 
    function calculateCorrectionSecond() {
      const rmlReading = parseFloat($('#rmlReading').val());
      const nmlReading = parseFloat($('#nmlReading').val());
      let correctionSecond =  nmlReading - rmlReading;
      correctionSecond = Math.round(correctionSecond * 10000) / 10000;
      $('#correctionSecond').val(correctionSecond);
    }
    $('#rmlReading, #nmlReading').on('input', calculateCorrectionSecond);

    function calculateDriftSecond() {
       const correctionSecond = parseFloat($('#correctionSecond').val());
      const previousCorrectionSecond = parseFloat($('#previousCorrectionSecond').val());
      let drift = Math.abs(correctionSecond - previousCorrectionSecond) ;
       drift = Math.round(drift * 10000) / 10000;
      $('#driftSecond').val(drift);
    }
    $('#correctionSecond, #previousCorrectionSecond').on('input', calculateDriftSecond);

    function calculateDeviationHertz() {
      const measuredFrequency = parseFloat($('#measuredFrequency').val());
      const previousIndicatedValue = 10000000
      let deviation = measuredFrequency - previousIndicatedValue;
      deviation = Math.round(deviation * 1000) / 1000;
      $('#deviationHertz').val(deviation);
    }
    $('#measuredFrequency').on('input', calculateDeviationHertz);



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