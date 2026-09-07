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
<?= view('layouts/head-essential'); ?>
<style>
    table.dataTable {
                font-size: 1em;
                font-family: tahoma;
    }
    .custom-size {
                max-width: 75%; /* Set your desired width */
                margin: 1.75rem auto; /* Center the modal */
    }
    .scrollable-table-modal {
                border: 1px solid black;
                height: 35vh;
                overflow: auto;
    }
</style> 
    <body class="skin-base animate">
        <?php
            $data = [
                'active' => 'standard12',
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
                                        <b>Gauge Block</b>
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
                                                <th>Description</th>
                                                <th>Serial Number</th>
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
                        <h5 class="modal-title" id="exampleModalLabel">New Gauge Block</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                                <div class="form-group">
                                    <label class=" control-label" for="description">description</label>  
                                    <div class="">
                                        <input id="description" name="description" type="text" placeholder="" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label" for="manufacturer">manufacturer</label>  
                                    <div class="">
                                        <input id="manufacturer" name="manufacturer" type="text" placeholder="" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label" for="material">material</label>  
                                    <div class="">
                                        <input id="material" name="material" type="text" placeholder="" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label" for="serialNumber">serialNumber</label>  
                                    <div class="">
                                        <input id="serialNumber" name="serialNumber" type="text" placeholder="" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label" for="certificateNumber">certificateNumber</label>  
                                    <div class="">
                                        <input id="certificateNumber" name="certificateNumber" type="text" placeholder="" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label" for="dateOfCalibration">dateOfCalibration</label>  
                                    <div class="">
                                        <input id="dateOfCalibration" name="dateOfCalibration" type="date" placeholder="" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label" for="coverageFactor">coverageFactor</label>  
                                    <div class="">
                                        <input id="coverageFactor" name="coverageFactor" type="text" placeholder="" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label" for="calibrationProvider">calibrationProvider</label>  
                                    <div class="">
                                        <input id="calibrationProvider" name="calibrationProvider" type="text" placeholder="" class="form-control input-md">
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
        <div class="modal fade" id="modalEditStandard" tabindex="-1">
            <div class="modal-dialog">  
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Gauge Block</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                                <input type="hidden" name="standardID" id="standardID">
                                <div class="form-group">
                                    <label class=" control-label" for="descriptionEdit">description</label>  
                                    <div class="">
                                        <input id="descriptionEdit" name="descriptionEdit" type="text" placeholder="" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label" for="manufacturerEdit">manufacturer</label>  
                                    <div class="">
                                        <input id="manufacturerEdit" name="manufacturerEdit" type="text" placeholder="" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label" for="materialEdit">material</label>  
                                    <div class="">
                                        <input id="materialEdit" name="materialEdit" type="text" placeholder="" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label" for="serialNumberEdit">serialNumber</label>  
                                    <div class="">
                                        <input id="serialNumberEdit" name="serialNumberEdit" type="text" placeholder="" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label" for="certificateNumberEdit">certificateNumber</label>  
                                    <div class="">
                                        <input id="certificateNumberEdit" name="certificateNumberEdit" type="text" placeholder="" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label" for="dateOfCalibrationEdit">dateOfCalibration</label>  
                                    <div class="">
                                        <input id="dateOfCalibrationEdit" name="dateOfCalibrationEdit" type="date" placeholder="" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label" for="coverageFactorEdit">coverageFactor</label>  
                                    <div class="">
                                        <input id="coverageFactorEdit" name="coverageFactorEdit" type="text" placeholder="" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label" for="calibrationProviderEdit">calibrationProvider</label>  
                                    <div class="">
                                        <input id="calibrationProviderEdit" name="calibrationProviderEdit" type="text" placeholder="" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mt-2">
                                        <button type="button" class="btn btn-success input-md" id="measurementBtn" data-bs-toggle="modal" data-bs-target="#modalMeasurements" data-bs-dismiss="modal">Measurement Data</button>
                                    </div>
                                </div>
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id='updateDetailsBtn' data-bs-dismiss="modal">Update</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalNewStandardValue" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><div id='labelUncertaintyValue' data-function="new">New</div> Uncertainty Value</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="valueID">
                    <fieldset>
                        <div class="form-group">
                            <label class=" control-label" for="rangeMin">Range Min</label>  
                            <div class="">
                                <input id="rangeMin" name="rangeMin" type="text" placeholder="" class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" control-label" for="rangeMax">Range Max</label>  
                            <div class="">
                                <input id="rangeMax" name="rangeMax" type="text" placeholder="" class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <label class=" control-label" for="uncertainty">Uncertainty (μm)</label>  
                            <div class="">
                                <input id="uncertainty" name="uncertainty" type="text" placeholder="" class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td colspan='2' style='text-align: center'>Grade 0</td>
                                        <td colspan='2' style='text-align: center'>Grade 1</td>
                                        <td colspan='2' style='text-align: center'>Grade 2</td>
                                    </tr>
                                    <tr>
                                        <td>Error (μm)</td>
                                        <td>Parallelism (μm)</td>
                                        <td>Error (μm)</td>
                                        <td>Parallelism (μm)</td>
                                        <td>Error (μm)</td>
                                        <td>Parallelism (μm)</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input id="errorGrade0" name="errorGrade0" type="text" placeholder="" class="form-control input-md"></td>
                                        <td><input id="parallelismGrade0" name="parallelismGrade0" type="text" placeholder="" class="form-control input-md"></td>
                                        <td><input id="errorGrade1" name="errorGrade1" type="text" placeholder="" class="form-control input-md"></td>
                                        <td><input id="parallelismGrade1" name="parallelismGrade1" type="text" placeholder="" class="form-control input-md"></td>
                                        <td><input id="errorGrade2" name="errorGrade2" type="text" placeholder="" class="form-control input-md"></td>
                                        <td><input id="parallelismGrade2" name="parallelismGrade2" type="text" placeholder="" class="form-control input-md"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalMeasurements" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" id='btnUncertaintyValue' data-bs-toggle="modal" data-bs-target="#modalMeasurements" data-bs-dismiss="modal">Add</button>
                </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalNewMeasurementValue" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><div id='labelMeasurementValue' data-function="new">New</div> Measurment Value</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="valueMeasurementID">
                    <fieldset>
                        <div class="form-group">
                            <label class=" control-label" for="nominalLength">Nominal length</label>  
                            <div class="">
                                <input id="nominalLength" name="nominalLength" type="text" placeholder="" class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" control-label" for="serialNumberError">Serial Number</label>  
                            <div class="">
                                <input id="serialNumberError" name="serialNumberError" type="text" placeholder="" class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" control-label" for="centLngError">Cent. Lng Error</label>  
                            <div class="">
                                <input id="centLngError" name="centLngError" type="text" placeholder="" class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" control-label" for="maxLngError">Max. Lng Error</label>  
                            <div class="">
                                <input id="maxLngError" name="maxLngError" type="text" placeholder="" class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" control-label" for="minLngError">Min. Lng Error</label>  
                            <div class="">
                                <input id="minLngError" name="minLngError" type="text" placeholder="" class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" control-label" for="parallel">Parallel</label>  
                            <div class="">
                                <input id="parallel" name="parallel" type="text" placeholder="" class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" control-label" for="calResult">Cal Result</label>  
                            <div class="">
                                <input id="calResult" name="calResult" type="text" placeholder="" class="form-control input-md">
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalMeasurements" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" id='btnMeasurementValue' data-bs-toggle="modal" data-bs-target="#modalMeasurements" data-bs-dismiss="modal">Add</button>
                </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalMeasurements" tabindex="-1" >
            <div class="modal-dialog modal-dialog-scrollable custom-size">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Standard</h5>
                    <div class="btn-toolbar mx-5" role="toolbar" >
                        <div class="btn-group me-2" role="group" >
                            <button type="button" class="btn btn-success" id="addUncertainty" data-bs-toggle="modal" data-bs-target="#modalNewStandardValue" data-bs-dismiss="modal">ADD UNCERTAINTY</button>
                            <button type="button" class="btn btn-success" id="addMeasurement" data-bs-toggle="modal" data-bs-target="#modalNewMeasurementValue" data-bs-dismiss="modal">ADD MEASUREMENT</button>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <div class="row scrollable-table-modal mb-2">
                            <table class="table table-bordered" id="tableUncertainty">
                                <thead class='sticky-top bg-white'>
                                    <tr>
                                        <td rowspan='2'>Nominal Length (mm)</td>
                                        <td colspan='2'>Grade 0</td>
                                        <td colspan='2'>Grade 1</td>
                                        <td colspan='2'>Grade 2</td>
                                        <td rowspan='2'>U @ 95% (μm)</td>
                                        <td rowspan='2'>Action</td>
                                    </tr>
                                    <tr>
                                        <td>Error (μm)</td>
                                        <td>Parallelism (μm)</td>
                                        <td>Error (μm)</td>
                                        <td>Parallelism (μm)</td>
                                        <td>Error (μm)</td>
                                        <td>Parallelism (μm)</td>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <div class="row scrollable-table-modal">
                            <table class="table table-bordered" id="tableMeasurements">
                                <thead class='sticky-top bg-white'> 
                                    <tr>
                                        <td>Nominal Length (mm)</td>
                                        <td>Serial Number</td>
                                        <td>Cent. Lng Error</td>
                                        <td>Max. Lng Error</td>
                                        <td>Min. Lng Error</td>
                                        <td>Parallel</td>
                                        <td>Cal Result</td>
                                        <td>Actions</td>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalEditStandard" data-bs-dismiss="modal">Cancel</button>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?= view('layouts/footer-essential'); ?>
<script>
    var standardData;
    var standardUncertaintyValues;
    var standardMeasurementValues;

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
        $('#descriptionEdit').val(selectedStandardData['description']);
        $('#manufacturerEdit').val(selectedStandardData['manufacturer']);
        $('#materialEdit').val(selectedStandardData['material']);
        $('#serialNumberEdit').val(selectedStandardData['serialNumber']);
        $('#certificateNumberEdit').val(selectedStandardData['certificateNumber']);
        $('#dateOfCalibrationEdit').val(selectedStandardData['dateOfCalibration']);
        $('#coverageFactorEdit').val(selectedStandardData['coverageFactor']);
        $('#calibrationProviderEdit').val(selectedStandardData['calibrationProvider']);
        
        $('#modalEditStandard').modal('show');
    }

    function editUncertaintyData(ID){
        let selectedStandardData = standardUncertaintyValues.find(o => o.id === ID);
        $("#standardID").val(selectedStandardData['standardID'])
        
        $('#labelUncertaintyValue').html('Edit')
        $('#btnUncertaintyValue').html('Edit')
        $('#labelUncertaintyValue').attr('data-function', 'edit')
        
        $('#valueID').val(selectedStandardData['id'])
        $('#rangeMin').val(selectedStandardData['rangeMin'])
        $('#rangeMax').val(selectedStandardData['rangeMax'])
        $('#uncertainty').val(selectedStandardData['uncertainty'])
        $('#errorGrade0').val(selectedStandardData['errorGrade0'])
        $('#parallelismGrade0').val(selectedStandardData['parallelismGrade0'])
        $('#errorGrade1').val(selectedStandardData['errorGrade1'])
        $('#parallelismGrade1').val(selectedStandardData['parallelismGrade1'])
        $('#errorGrade2').val(selectedStandardData['errorGrade2'])
        $('#parallelismGrade2').val(selectedStandardData['parallelismGrade2'])
        
        $('#modalMeasurements').modal('hide');
        $('#modalNewStandardValue').modal('show');
    }
    function editMeasurementData(ID){
        let selectedStandardData = standardMeasurementValues.find(o => o.id === ID);
        $("#standardID").val(selectedStandardData['standardID'])
        
        $('#labelMeasurementValue').html('Edit')
        $('#btnMeasurementValue').html('Edit')
        $('#labelMeasurementValue').attr('data-function', 'edit')
        
        $('#valueMeasurementID').val(selectedStandardData['id'])
        $('#nominalLength').val(selectedStandardData['nominalLength'])
        $('#serialNumberError').val(selectedStandardData['serialNumberError'])
        $('#centLngError').val(selectedStandardData['centLngError'])
        $('#maxLngError').val(selectedStandardData['maxLngError'])
        $('#minLngError').val(selectedStandardData['minLngError'])
        $('#parallel').val(selectedStandardData['parallel'])
        $('#calResult').val(selectedStandardData['calResult'])
        
        $('#modalMeasurements').modal('hide');
        $('#modalNewMeasurementValue').modal('show');
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
                // checkbox.attr('disabled', 'true')
                tr.attr('style', 'background-color: rgba(255, 0, 0, 0.4)')
                suffix = 'days over due date';
            }else{
                tr.attr('style', 'background-color: rgba(0, 255, 0, 0.4)')
            }

            let idTd = $('<td>', {
                'class': 'd-none',
                'html': standardID,
            });
            let descriptionTD =$('<td>').html(item.description)
            let serialNumberTD =$('<td>').html(item.serialNumber)
            let daysTD =$('<td>').html(days_due + ' ' + suffix)

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
                descriptionTD,
                serialNumberTD,
                daysTD,
                editTD.append(editBtn),
                deleteTd.append(deleteBtn)
            )

            $('#standardTableTbody').append(tr)
        })
    }


    function addStandardValuesToTable(){

        $('#tableUncertainty tbody').html('');
        standardUncertaintyValues.forEach((item, index) => {   
            let standardID = item.id;
            let tr = $('<tr>');
            let tdNominalLength = $('<td>').html(item.rangeMin + " to " + item.rangeMax);
            let tdError0 = $('<td>').html(item.errorGrade0);
            let tdParallel0 = $('<td>').html(item.parallelismGrade0);
            let tdError1 = $('<td>').html(item.errorGrade1);
            let tdParallel1 = $('<td>').html(item.parallelismGrade1);
            let tdError2 = $('<td>').html(item.errorGrade2);
            let tdParallel2 = $('<td>').html(item.parallelismGrade2);
            let tdUncertainty = $('<td>').html(item.uncertainty);
            let tdAction = $('<td>');

            let btnDiv = $('<div>').attr('class', 'btn-group').attr('role', 'group')
            let btnEdit = $('<button>',{
                'type':'button',
                'class':'btn btn-success',
                'html':'Edit'
            }).on('click', function(){
                editUncertaintyData(item.id)
            })
            let btnDelete = $('<button>',{
                'type':'button',
                'class':'btn btn-danger',
                'html':'Delete'
            }).on('click', function(){
                deleteUncertainty(item.id)
            })

            tdAction.append(btnDiv.append(btnEdit,btnDelete))

            tr.append(
                tdNominalLength,
                tdError0,
                tdParallel0,
                tdError1,
                tdParallel1,
                tdError2,
                tdParallel2,
                tdUncertainty,
                tdAction
            )
            $('#tableUncertainty tbody').append(tr)
        })
        $('#tableMeasurements tbody').html('');
        standardMeasurementValues.forEach((item, index) => {   
            let standardID = item.id;
            let tr = $('<tr>');
            let nominalLength = $('<td>').html(item.nominalLength);
            let serialNumberError = $('<td>').html(item.serialNumberError);
            let centLngError = $('<td>').html(item.centLngError);
            let maxLngError = $('<td>').html(item.maxLngError);
            let minLngError = $('<td>').html(item.minLngError);
            let parallel = $('<td>').html(item.parallel);
            let calResult = $('<td>').html(item.calResult);
            let tdAction = $('<td>');

            let btnDiv = $('<div>').attr('class', 'btn-group').attr('role', 'group')
            let btnEdit = $('<button>',{
                'type':'button',
                'class':'btn btn-success',
                'html':'Edit'
            }).on('click', function(){
                editMeasurementData(item.id)
            })
            let btnDelete = $('<button>',{
                'type':'button',
                'class':'btn btn-danger',
                'html':'Delete'
            }).on('click', function(){
                deleteMeasurement(item.id)
            })

            tdAction.append(btnDiv.append(btnEdit,btnDelete))

            tr.append(
                nominalLength,
                serialNumberError,
                centLngError,
                maxLngError,
                minLngError,
                parallel,
                calResult,
                tdAction
            )
            $('#tableMeasurements tbody').append(tr)
        })
    }

    function getStandardData(){
        $.ajax({
            cache: false,
            async: false,
            type: "post",
            url: "/standard/gaugeBlock/getStandardDataGaugeBlock",
        })
        .done(function(result){
            standardData = result.standardData;
            standardUncertaintyValues = result.standardUncertaintyData;
        })
        .fail(function(error){
            console.log(error)
            alert('Unable to fetch Standard data')
        })
        .always(function(){
            addStandardToTable();
            $('#standardTable').DataTable();
        })
    }
    function getStandardValues(selectedStandard){
        let standardID = [selectedStandard];
        $.ajax({
            cache: false,
            type: "post",
            url: "/standard/gaugeBlock/getStandardValuesGaugeBlockByDetailsID",
            data: {
                'selectedStandardID': standardID,
            }
        })
        .done(function(result) {
                standardUncertaintyValues = result.standardUncertaintyData;
                standardMeasurementValues = result.standardMeasurementData;
        })
        .fail(function (error) {
            console.log(error)
            alert('Unable to get Standard value of id: ' + selectedStandard)
        })
        .always(function(){
            addStandardValuesToTable();
        })
    }

    function newStandard(){
        let description = $('#description').val();
        let manufacturer = $('#manufacturer').val();
        let material = $('#material').val();
        let serialNumber = $('#serialNumber').val();
        let certificateNumber = $('#certificateNumber').val();
        let dateOfCalibration = $('#dateOfCalibration').val();
        let coverageFactor = $('#coverageFactor').val();
        let calibrationProvider = $('#calibrationProvider').val();
        
        $.ajax({
            cache: false,
            // async: false,
            type: "post",
            url: "/standard/gaugeBlock/addGaugeBlock",
            data: {
                'description': description,
                'manufacturer': manufacturer,
                'material': material,
                'serialNumber': serialNumber,
                'certificateNumber': certificateNumber,
                'dateOfCalibration': dateOfCalibration,
                'coverageFactor': coverageFactor,
                'calibrationProvider': calibrationProvider,

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

        let description = $('#descriptionEdit').val();
        let manufacturer = $('#manufacturerEdit').val();
        let material = $('#materialEdit').val();
        let serialNumber = $('#serialNumberEdit').val();
        let certificateNumber = $('#certificateNumberEdit').val();
        let dateOfCalibration = $('#dateOfCalibrationEdit').val();
        let coverageFactor = $('#coverageFactorEdit').val();
        let calibrationProvider = $('#calibrationProviderEdit').val();


        $.ajax({
            cache: false,
            //async: false,
            type: "post",
            url: "/standard/gaugeBlock/updateGaugeBlock",
            data: {
                'standardID': standardID,
                'description': description,
                'manufacturer': manufacturer,
                'material': material,
                'serialNumber': serialNumber,
                'certificateNumber': certificateNumber,
                'dateOfCalibration': dateOfCalibration,
                'coverageFactor': coverageFactor,
                'calibrationProvider': calibrationProvider,
            },
            success: function(result) {
                getStandardData();                
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
            url: "/standard/gaugeBlock/removeStandard",
            data: {
                'standardID': standardID,
            }
        })
        .fail(function(error){
            console.log(error)
            alert('Unable to Delete standard')
        })
        .always(function(){  
            getStandardData();       
        })
    }

    

    function newUncertainty(){
        let url, data;
        let standardID = $('#standardID').val();
        let valueID = $('#valueID').val()
        let rangeMin = $('#rangeMin').val();
        let rangeMax = $('#rangeMax').val();
        let uncertainty = $('#uncertainty').val();
        let errorGrade0 = $('#errorGrade0').val();
        let parallelismGrade0 = $('#parallelismGrade0').val();
        let errorGrade1 = $('#errorGrade1').val();
        let parallelismGrade1 = $('#parallelismGrade1').val();
        let errorGrade2 = $('#errorGrade2').val();
        let parallelismGrade2 = $('#parallelismGrade2').val();

        let url_new = '/standard/gaugeBlock/newUncertainty';
        let url_edit = '/standard/gaugeBlock/editUncertainty';

        let data_new = {
                'standardID' : standardID,
                'rangeMin' : rangeMin,
                'rangeMax' : rangeMax,
                'uncertainty' : uncertainty,
                'errorGrade0' : errorGrade0,
                'parallelismGrade0' : parallelismGrade0,
                'errorGrade1' : errorGrade1,
                'parallelismGrade1' : parallelismGrade1,
                'errorGrade2' : errorGrade2,
                'parallelismGrade2' : parallelismGrade2,
        }
        let data_edit = {
                'valueID' : valueID,
                'rangeMin' : rangeMin,
                'rangeMax' : rangeMax,
                'uncertainty' : uncertainty,
                'errorGrade0' : errorGrade0,
                'parallelismGrade0' : parallelismGrade0,
                'errorGrade1' : errorGrade1,
                'parallelismGrade1' : parallelismGrade1,
                'errorGrade2' : errorGrade2,
                'parallelismGrade2' : parallelismGrade2,
        }
        
        if($('#labelUncertaintyValue').attr('data-function') == 'edit'){
            url = url_edit;
            data = data_edit;
        }else{
            url = url_new;
            data = data_new;
        }
        
        $.ajax({
            cache: false,
            //async: false,
            type: "post",
            url: url,
            data: data,
        })
        .done(function(result){
            $('#rangeMin').val('');
            $('#rangeMax').val('');
            $('#uncertainty').val('');
            $('#errorGrade0').val('');
            $('#parallelismGrade0').val('');
            $('#errorGrade1').val('');
            $('#parallelismGrade1').val('');
            $('#errorGrade2').val('');
            $('#parallelismGrade2').val('');
        })
        .fail(function(error){
            console.log(error)
            alert('Unable to add / edit uncertainty value')
        })
        .always(function(){
            getStandardValues(standardID);           
        })
    }
    function deleteUncertainty(uncertaintyID){
        let valueID = uncertaintyID
        let standardID = $("#standardID").val()
        $.ajax({
            cache: false,
            type: "post",
            url: "/standard/gaugeBlock/removeUncertainty",
            data: {
                'valueID': valueID,
            }
        })
        .fail(function(error){
            console.log(error)
            alert('Unable to Delete uncertainty value')
        })
        .always(function(){  
            getStandardValues(standardID)
            addStandardValuesToTable()
        })

    }
    
    function newMeasurement(){
        let url, data;
        let standardID = $('#standardID').val();
        let valueMeasurementID = $('#valueMeasurementID').val()
        
        let nominalLength = $('#nominalLength').val()
        let serialNumberError = $('#serialNumberError').val()
        let centLngError = $('#centLngError').val()
        let maxLngError = $('#maxLngError').val()
        let minLngError = $('#minLngError').val()
        let parallel = $('#parallel').val()
        let calResult = $('#calResult').val()

        let url_new = '/standard/gaugeBlock/newMeasurement';
        let url_edit = '/standard/gaugeBlock/editMeasurement';

        let data_new = {
                'standardID' : standardID,
                'nominalLength': nominalLength,
                'serialNumberError': serialNumberError,
                'centLngError': centLngError,
                'maxLngError': maxLngError,
                'minLngError': minLngError,
                'parallel': parallel,
                'calResult': calResult,
        }
        let data_edit = {
                'valueID' : valueMeasurementID,
                'nominalLength': nominalLength,
                'serialNumberError': serialNumberError,
                'centLngError': centLngError,
                'maxLngError': maxLngError,
                'minLngError': minLngError,
                'parallel': parallel,
                'calResult': calResult,
        }
        
        if($('#labelMeasurementValue').attr('data-function') == 'edit'){
            url = url_edit;
            data = data_edit;
        }else{
            url = url_new;
            data = data_new;
        }
        
        $.ajax({
            cache: false,
            //async: false,
            type: "post",
            url: url,
            data: data,
        })
        .done(function(result){
            $('#nominalLength').val('')
            $('#serialNumberError').val('')
            $('#centLngError').val('')
            $('#maxLngError').val('')
            $('#minLngError').val('')
            $('#parallel').val('')
            $('#calResult').val('')
        })
        .fail(function(error){
            console.log(error)
            alert('Unable to add / edit Measurement value')
        })
        .always(function(){
            getStandardValues(standardID);           
        })
    }
    function deleteMeasurement(measurementID){
        let valueID = measurementID
        let standardID = $("#standardID").val()
        $.ajax({
            cache: false,
            type: "post",
            url: "/standard/gaugeBlock/removeMeasurement",
            data: {
                'valueID': valueID,
            }
        })
        .fail(function(error){
            console.log(error)
            alert('Unable to Delete measurement value')
        })
        .always(function(){
            getStandardValues(standardID)
            addStandardValuesToTable()
        })

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
        bind('btnUncertaintyValue','click',function(){
            newUncertainty()
        }) 
        bind('btnMeasurementValue','click',function(){
            newMeasurement()
        }) 
        
        bind('measurementBtn','click',function(){
            addStandardValuesToTable()
        })

        bind('addUncertainty','click',function(){
            $('#labelUncertaintyValue').html('New')
            $('#btnUncertaintyValue').html('Add')
            $('#labelUncertaintyValue').attr('data-function', 'new')
            $('#rangeMin').val('')
            $('#rangeMax').val('')
            $('#uncertainty').val('')
            $('#errorGrade0').val('')
            $('#parallelismGrade0').val('')
            $('#errorGrade1').val('')
            $('#parallelismGrade1').val('')
            $('#errorGrade2').val('')
            $('#parallelismGrade2').val('')
        })

        bind('addMeasurement','click',function(){
            $('#labelMeasurementValue').html('New')
            $('#btnMeasurementValue').html('Add')
            $('#labelMeasurementValue').attr('data-function', 'new')
            $('#nominalLength').val('')
            $('#serialNumberError').val('')
            $('#centLngError').val('')
            $('#maxLngError').val('')
            $('#minLngError').val('')
            $('#parallel').val('')
            $('#calResult').val('')
        })

        
        
    }
</script>




/*
nominalLength
serialNumberError
centLngError
maxLngError
minLngError
parallel
celResult

*/