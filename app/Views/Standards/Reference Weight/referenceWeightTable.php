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
        </style>
    <body class="skin-base animate">
        <?php
            $data = [
                'active' => 'standard1',
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
                                        <b>Reference Weight</b>
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
                    <h5 class="modal-title" id="exampleModalLabel">New Reference Weight</h5>
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
                                <label class=" control-label" for="provider">Provider</label>  
                                <div class="">
                                    <input id="provider" name="provider" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="class">Class</label>  
                                <div class="">
                                    <input id="class" name="class" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="type">Type</label>  
                                <div class="">
                                    <input id="type" name="type" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="manufacturer">Manufacturer</label>  
                                <div class="">
                                    <input id="manufacturer" name="manufacturer" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="dateOfCalibration">Date Of Calibration</label>  
                                <div class="">
                                    <input id="dateOfCalibration" name="dateOfCalibration" type="date" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="prevAirDensity">Prevous Air Density</label>  
                                <div class="">
                                    <input id="prevAirDensity" name="prevAirDensity" type="text" placeholder="" class="form-control input-md">
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Reference Weight</h5>
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
                                <label class=" control-label" for="classEdit">Class</label>  
                                <div class="">
                                    <input id="classEdit" name="classEdit" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="providerEdit">Provider</label>  
                                <div class="">
                                    <input id="providerEdit" name="providerEdit" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="typeEdit">Type</label>  
                                <div class="">
                                    <input id="typeEdit" name="typeEdit" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="manufacturerEdit">Manufacturer</label>  
                                <div class="">
                                    <input id="manufacturerEdit" name="manufacturerEdit" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="dateOfCalibrationEdit">Date Of Calibration</label>  
                                <div class="">
                                    <input id="dateOfCalibrationEdit" name="dateOfCalibrationEdit" type="date" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="prevAirDensityEdit">Prevous Air Density</label>  
                                <div class="">
                                    <input id="prevAirDensityEdit" name="prevAirDensityEdit" type="text" placeholder="" class="form-control input-md">
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
            <div class="modal-dialog modal-dialog-scrollable modal-xl custom-size">
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
                                    <th>Nominal Value</th>
                                    <th>Unit</th>
                                    <th>Marking</th>
                                    <th>Conventional Mass <i>(Current)</i></th>
                                    <th>Unit</th>
                                    <th>Uncertainty of Measurement (mg)</th>
                                    <th>Maximum Permissible Error (mg)</th>
                                    <th>Drift</th>
                                    <th>Conventional Mass <i>(Previous)</i></th>
                                    <th>Coverage Factor</th>
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
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><div id='labelStandardValue'>New</div> Standard Value</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="valueID">
                    <fieldset>
                            <div class="form-group">
                                <label class=" control-label" for="nominalValue">nominalValue</label>  
                                <div class="">
                                    <input id="nominalValue" name="nominalValue" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="nominalUnit">nominalUnit</label>  
                                <div class="">
                                    <select name="nominalUnit" id="nominalUnit" class="form-control input-md">
                                        <option value="kg">kg</option>
                                        <option value="g">g</option>
                                        <option value="mg">mg</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="marking">marking</label>  
                                <div class="">
                                    <input id="marking" name="marking" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="conventionalMass">conventionalMass</label>  
                                <div class="">
                                    <input id="conventionalMass" name="conventionalMass" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="unit">unit</label>  
                                <div class="">
                                    <select name="unit" id="unit" class="form-control input-md">
                                        <option value="kg">kg</option>
                                        <option value="g" selected>g</option>
                                        <option value="mg">mg</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="uncertainty">uncertainty</label>  
                                <div class="">
                                    <input id="uncertainty" name="uncertainty" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="mpe">mpe</label>  
                                <div class="">
                                    <input id="mpe" name="mpe" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="drift">drift</label>  
                                <div class="">
                                    <input id="drift" name="drift" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="previousConventionalMass">previousConventionalMass</label>  
                                <div class="">
                                    <input id="previousConventionalMass" name="previousConventionalMass" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="coverageFactorValue">coverageFactor</label>  
                                <div class="">
                                    <input id="coverageFactorValue" name="coverageFactorValue" type="text" placeholder="" class="form-control input-md">
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
       
    </body>
</html>
<?= view('layouts/footer-essential'); ?>
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
        $("#serialNumberSelected").val(selectedStandardData['serialNumber'])
        $("#certificateNumberEdit").val(selectedStandardData['certificateNumber'])
        $("#serialNumberEdit").val(selectedStandardData['serialNumber'])
        $("#descriptionEdit").val(selectedStandardData['description'])
        $("#providerEdit").val(selectedStandardData['calibrationProvider'])
        $("#classEdit").val(selectedStandardData['class'])
        $("#typeEdit").val(selectedStandardData['type'])
        $("#manufacturerEdit").val(selectedStandardData['manufacturer'])
        $("#dateOfCalibrationEdit").val(selectedStandardData['dateOfCalibration'])
        $("#prevAirDensityEdit").val(selectedStandardData['prevAirDensity'])
        $("#coverageFactorEdit").val(selectedStandardData['coverageFactor'])
        
        $('#modalEdit').modal('show');

    }
    function editAddValueData(ID){
        $("#labelStandardValue").html('Update')
        $("#addNewValueBtn").html('Update')
        
        $("#addNewValueBtn").off('click')
        $("#conventionalMass").off('change')
        $("#previousConventionalMass").off('change')
        // bind('addNewValueBtn','click',function(){
        //     updateValue()
        // })
        $('#addNewValueBtn').one('click', function(){
            updateValue()
        })

        let selectedStandardData = standardValues.find(o => o.id === ID);
        
        $("#valueID").val(selectedStandardData['id'])
        $("#nominalValue").val(selectedStandardData['nominalValue'])
        $("#nominalUnit").val(selectedStandardData['nominalUnit'])
        $("#marking").val(selectedStandardData['marking'])
        $("#conventionalMass").val(selectedStandardData['conventionalMass']).on('change', function(){
            calculateDrift('conventionalMass', 'previousConventionalMass', 'drift')
        })
        $("#unit").val(selectedStandardData['unit'])
        $("#uncertainty").val(selectedStandardData['uncertainty'])
        $("#mpe").val(selectedStandardData['mpe'])
        $("#drift").val(selectedStandardData['drift'])
        $("#previousConventionalMass").val(selectedStandardData['previousConventionalMass']).on('change', function(){
            calculateDrift('conventionalMass', 'previousConventionalMass', 'drift')
        })
        $("#coverageFactorValue").val(selectedStandardData['coverageFactor'])
        
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
        $("#nominalValue").val('')
        $("#nominalUnit").val('')
        $("#marking").val('')
        $("#conventionalMass").val('')
        $("#unit").val('')
        $("#uncertainty").val('')
        $("#mpe").val('')
        $("#drift").val('')
        $("#previousConventionalMass").val('')
        $("#coverageFactor").val('')

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

            let bgColor = 'background-color:rgba(0,128,0,0.5)';
            let disabled = false;
            let suffix = 'days left before due date';
            if (today.getFullYear() === oneMonthBeforeDue.getFullYear() && today.getMonth() === oneMonthBeforeDue.getMonth()) {
                bgColor = 'background-color:rgba(255,165,0,0.5)';
                suffix = 'days left before due date';
            } 
            else if (today.getFullYear() === dueDate.getFullYear() && today.getMonth() === dueDate.getMonth() && today.getDate() === dueDate.getDate()) {
                bgColor = 'background-color:rgba(255,0,0,0.5)';
                disabled = true;
                suffix = 'days left before due date';
            }
            else if (today > dueDate) {
                bgColor = 'background-color:rgba(255,0,0,0.5)';
                disabled = true;
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
                deleteStandard(standardID)
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

            let serialNumberTD = $('<td>').html(item.serialNumber)
            let typeTD = $('<td>').html(item.type)
            let classTD = $('<td>').html(item.class)
            let nominalValueTD = $('<td>').html(item.nominalValue)
            let nominalUnitTD = $('<td>').html(item.nominalUnit)
            let markingTD = $('<td>').html(item.marking)
            let conventionalMassTD = $('<td>').html(item.conventionalMass)
            let unitTD = $('<td>').html(item.unit)
            let uncertaintyTD = $('<td>').html(item.uncertainty)
            let mpeTD = $('<td>').html(item.mpe)
            let driftTD = $('<td>').html(item.drift)
            let previousConventionalMassTD = $('<td>').html(item.previousConventionalMass)
            let coverageFactorTD = $('<td>').html(item.coverageFactor)
            let calibrationProviderTD = $('<td>').html(item.calibrationProvider)

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
                nominalValueTD,
                nominalUnitTD,
                markingTD,
                conventionalMassTD,
                unitTD,
                uncertaintyTD,
                mpeTD,
                driftTD,
                previousConventionalMassTD,
                coverageFactorTD,
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
            url: "/standard/referenceWeight/getStandardDataReferenceWeight",
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
            url: "/standard/referenceWeight/getStandardValuesReferenceWeightByDetailsID",
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
        let equipmentClass = $('#class').val()
        let type = $('#type').val()
        let manufacturer = $('#manufacturer').val()
        let dateOfCalibration = $('#dateOfCalibration').val()
        let prevAirDensity = $('#prevAirDensity').val()
        let coverageFactor = $('#coverageFactor').val()
        

        $.ajax({
            cache: false,
            // async: false,
            type: "post",
            url: "/standard/referenceWeight/addReferenceWeight",
            data: {

                'certificateNumber' : certificateNumber,
                'serialNumber' : serialNumber,
                'description' : description,
                'provider' : provider,
                'equipmentClass' : equipmentClass,
                'type' : type,
                'manufacturer' : manufacturer,
                'dateOfCalibration' : dateOfCalibration,
                'prevAirDensity' : prevAirDensity,
                'coverageFactor' : coverageFactor,


            },
            success: function(result) {
                getStandardData();               
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
        let equipmentClass = $('#classEdit').val()
        let type = $('#typeEdit').val()
        let manufacturer = $('#manufacturerEdit').val()
        let dateOfCalibration = $('#dateOfCalibrationEdit').val()
        let prevAirDensity = $('#prevAirDensityEdit').val()
        let coverageFactor = $('#coverageFactorEdit').val()
        
        $.ajax({
            cache: false,
            //async: false,
            type: "post",
            url: "/standard/referenceWeight/updateReferenceWeight",
            data: {
                'standardID': standardID,
                'certificateNumber' : certificateNumber,
                'serialNumber' : serialNumber,
                'description' : description,
                'provider' : provider,
                'equipmentClass' : equipmentClass,
                'type' : type,
                'manufacturer' : manufacturer,
                'dateOfCalibration' : dateOfCalibration,
                'prevAirDensity' : prevAirDensity,
                'coverageFactor' : coverageFactor,
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
        let nominalValue = $("#nominalValue").val()
        let nominalUnit = $("#nominalUnit").val()
        let marking = $("#marking").val()
        let conventionalMass = $("#conventionalMass").val()
        let unit = $("#unit").val()
        let uncertainty = $("#uncertainty").val()
        let mpe = $("#mpe").val()
        let drift = $("#drift").val()
        let previousConventionalMass = $("#previousConventionalMass").val()
        let coverageFactor = $('#coverageFactorValue').val()
        $.ajax({
            cache: false,
            //async: false,
            type: "post",
            url: "/standard/referenceWeight/updateStandardValuesReferenceWeight",
            data: {
                'valueID': valueID,
                'nominalValue': nominalValue,
                'nominalUnit': nominalUnit,
                'marking': marking,
                'conventionalMass': conventionalMass,
                'unit': unit,
                'uncertainty': uncertainty,
                'mpe': mpe,
                'drift': drift,
                'previousConventionalMass': previousConventionalMass,
                'coverageFactor' : coverageFactor,
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
        let nominalValue = $("#nominalValue").val()
        let nominalUnit = $("#nominalUnit").val()
        let marking = $("#marking").val()
        let conventionalMass = $("#conventionalMass").val()
        let unit = $("#unit").val()
        let uncertainty = $("#uncertainty").val()
        let mpe = $("#mpe").val()
        let drift = $("#drift").val()
        let previousConventionalMass = $("#previousConventionalMass").val()
        let coverageFactor = $('#coverageFactorValue').val()
        $.ajax({
            cache: false,
            // async: false,
            type: "post",
            url: "/standard/referenceWeight/newStandardValuesReferenceWeight",
            data: {
                'standardID':standardID,
                'serialNumber':serialNumberSelected,
                'nominalValue':nominalValue,
                'nominalUnit':nominalUnit,
                'marking':marking,
                'conventionalMass':conventionalMass,
                'unit':unit,
                'uncertainty':uncertainty,
                'mpe':mpe,
                'drift':drift,
                'previousConventionalMass':previousConventionalMass,
                'coverageFactor' : coverageFactor,
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
            url: "/standard/referenceWeight/removeStandard",
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
            url: "/standard/referenceWeight/removeStandardValue",
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
    function calculateDrift(curr, prev, drift){
        let currValue = parseFloat($('#'+curr).val());
        let prevValue = parseFloat($('#'+prev).val());
        let result = Math.abs(currValue - prevValue)
        $('#'+drift).val(result)
    }
    // 
    // 
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