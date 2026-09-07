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
        <link rel="stylesheet" href="/css/jquery.dataTables.min.css">

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
                'active' => 'standard5',
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
                                        <b>Thermo - Hygrometer</b>
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
                                    <table class="table table-bordered table-sm" id="standardTable">
                                        <thead>
                                            <tr>
                                                <th class="d-none">id</th>
                                                <th>Serial Number</th>
                                                <th>Certificate Number</th>
                                                <th>Description</th>
                                                <th>Provider</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">New Thermo - Hygrometer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" name='addNewForm'>
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
                                <label class=" control-label" for="brand">Brand</label>
                                <div class="">                     
                                    <textarea class="form-control" id="brand" name="brand"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class=" control-label" for="model">Model</label>
                                <div class="">                     
                                    <textarea class="form-control" id="model" name="model"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class=" control-label" for="provider">Provider</label>  
                                <div class="">
                                    <input id="provider" name="provider" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class=" control-label" for="dateOfCalibration">Date of Calibration</label>  
                                <div class="">
                                    <input id="dateOfCalibration" name="dateOfCalibration" type="date" placeholder="" class="form-control input-md">
                                </div>
                            </div>


                        </fieldset>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" id="newStandardButton" data-bs-dismiss="modal">Add</button>
                </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalEdit" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Temperature Recorder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <fieldset>
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
                                <label class=" control-label" for="brandEdit">Brand</label>
                                <div class="">                     
                                    <textarea class="form-control" id="brandEdit" name="brandEdit"></textarea>
                                </div>
                        </div>

                        <div class="form-group">
                                <label class=" control-label" for="modelEdit">Model</label>
                                <div class="">                     
                                    <textarea class="form-control" id="modelEdit" name="modelEdit"></textarea>
                                </div>
                        </div>

                        <div class="form-group">
                                <label class=" control-label" for="providerEdit">Provider</label>  
                                <div class="">
                                    <input id="providerEdit" name="providerEdit" type="text" placeholder="" class="form-control input-md">
                                </div>
                        </div>

                        <div class="form-group">
                                <label class=" control-label" for="dateOfCalibrationEdit">Date of Calibration</label>  
                                <div class="">
                                    <input id="dateOfCalibrationEdit" name="dateOfCalibrationEdit" type="date" placeholder="" class="form-control input-md">
                                </div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalMeasurements" data-bs-dismiss="modal">Add Measurements</button>
                    <button type="button" class="btn btn-success" id="updateStandardButton" data-bs-dismiss="modal">Update</button>
                </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalMeasurements" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable custom-size">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Standard</h5>
                    <div class="btn-toolbar mx-5" role="toolbar" >
                        <div class="btn-group me-2" role="group" >
                            <button type="button" class="btn btn-success" id="addMeasurement">ADD</button>
                            <button type="button" class="btn btn-danger" id="removeMeasurement">REMOVE</button>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="measurementDIV"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" id="updateMeasurements">Update</button>
                </div>
                </div>
            </div>
        </div>
        <datalist id='unitList'>
            <option value="Temperature">Temperature</option>
            <option value="Humidity">Humidity</option>
        </datalist>
    </body>
</html>
<script src="/dashboardAsset/lib/jquery/jquery.min.js"></script>
<script src="/dashboardAsset/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/dashboardAsset/lib/feathericons/feather.min.js"></script>
<script src="/dashboardAsset/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/dashboardAsset/assets/js/script.js"></script>
<script src="/js/scripts/jquery.dataTables.min.js"></script>
<script>

    var standardData;

    $(document).ready(function(){
        getStandardData();
        bind('newStandardButton','click',function(){
            newStandard()
        })
        bind('addMeasurement','click',function(){
            addNewTable()
        })
        bind('removeMeasurement','click',function(){
            removeTable()
        })
        
        bind('updateMeasurements','click',function(){
            updateStandardMeasurements()
        })

        
    });

    function getStandardData(){
        $.ajax({
            cache: false,
            async: false,
            type: "post",
            url: "/standard/thermoHygrometer/getStandardDataThermoHygrometer",
            success: function(result) {
                standardData = result.standardData;
                addStandardToTable();
                $('#standardTable').DataTable();
            },
            error: function (error) {
                console.log(error)
            },
        })
    }

    function addStandardToTable(){
        $('#standardTableTbody').html('');
        standardData.forEach((item, index) => {
            let tr = $('<tr>');
            let idTd = $('<td>');
            let serialNumberTd = $('<td>');
            let certificateNumberTd = $('<td>');
            let descriptionTd = $('<td>');
            let providerTd = $('<td>');
            let editTD = $('<td>').attr('class', 'text-center');
            let deleteTd = $('<td>').attr('class', 'text-center');

            let standardID = item.id;

            let editBtn = $('<button>');
            editBtn.attr('type', 'button').attr('class', 'btn btn-outline-primary').attr('onclick', 'editAddData('+standardID+')').html('Edit');

            let deleteBtn = $('<button>').attr('type', 'button').attr('class', 'btn btn-outline-danger').attr('onclick', 'deleteConfirmation("'+standardID+'")').html('Delete');

            idTd.html(standardID).attr('class', 'd-none');
            serialNumberTd.html(item.serialNumber);
            certificateNumberTd.html(item.certificateNumber);
            descriptionTd.html(item.description);
            providerTd.html(item.provider);

            tr.append(
                idTd,
                serialNumberTd,
                certificateNumberTd,
                descriptionTd,
                providerTd,
                editTD.append(editBtn),
                deleteTd.append(deleteBtn)
            )

            $('#standardTableTbody').append(tr)
        })
    }

    function deleteConfirmation(ID){
        if (confirm("Do you want to delete this Standard?")) {
            deleteStandard(ID);
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
        let selectedStandardData = standardData.find(o => o.id == ID);
        $("#standardID").val(selectedStandardData['id'])
        $("#certificateNumberEdit").val(selectedStandardData['certificateNumber'])
        $("#serialNumberEdit").val(selectedStandardData['serialNumber'])
        $("#descriptionEdit").val(selectedStandardData['description'])
        $("#brandEdit").val(selectedStandardData['brand'])
        $("#modelEdit").val(selectedStandardData['model'])
        $("#providerEdit").val(selectedStandardData['provider'])
        $("#dateOfCalibrationEdit").val(selectedStandardData['dateOfCalibration'])
        if(selectedStandardData['measurements'] != null && selectedStandardData['measurements'] != '' && selectedStandardData['measurements'] != '{}'){
            $('#modalMeasurements').on('hidden.bs.modal', function () {
                $('#measurementDIV').html('')
            });
            var parseMeasurement = JSON.parse(selectedStandardData['measurements']);
            var units = Object.keys(parseMeasurement);
            let countOftable = units.length;
            for (let table = 0; table < countOftable; table++) {
                let tableNumber = table+1;
                let tableName = 'table'+tableNumber;
                $('#addMeasurement').trigger('click')
                $('#unitTableNumber'+(tableNumber)).val(units[table])
                let testpoints = Object.keys(parseMeasurement[units[table]]);
                let countOfTestpoints = testpoints.length;
                for (let row = 0; row < countOfTestpoints; row++) {
                    let rowNumber = row + 1;
                    let rowName = 'row' + rowNumber;
                    $('#addRowtable'+(tableNumber)).trigger('click')
                    let testPointID = tableName + 'TESTPOINT' + rowName;
                    let rmlID = tableName + 'RML' + rowName;
                    let providerID = tableName + 'PROVIDER' + rowName;
                    let correctionID = tableName + 'CORRECTION' + rowName;
                    let uncertaintyID = tableName + 'UNCERTAINTY' + rowName;
                    let previousRMLID = tableName + 'PREVIOUSRML' + rowName;
                    let driftId = tableName + 'DRIFT' + rowName;
             
                    $('#' + testPointID).val(parseMeasurement[units[table]][testpoints[row]][testPointID])
                    $('#' + rmlID).val(parseMeasurement[units[table]][testpoints[row]][rmlID])
                    $('#' + providerID).val(parseMeasurement[units[table]][testpoints[row]][providerID])
                    $('#' + correctionID).val(parseMeasurement[units[table]][testpoints[row]][correctionID])
                    $('#' + uncertaintyID).val(parseMeasurement[units[table]][testpoints[row]][uncertaintyID])
                    $('#' + previousRMLID).val(parseMeasurement[units[table]][testpoints[row]][previousRMLID])
                    $('#' + driftId).val(parseMeasurement[units[table]][testpoints[row]][driftId])
                }
                
            }
            
        }else{
            $('#modalMeasurements').on('hidden.bs.modal', function () {
               
            });
        }
        $('#modalEdit').modal('show');        
    }

    function newStandard(){
        let certificateNumber = $('#certificateNumber').val()
        let serialNumber = $('#serialNumber').val()
        let description = $('#description').val()
        let brand = $('#brand').val()
        let model = $('#model').val()
        let provider = $('#provider').val()
        let dateOfCalibration = $('#dateOfCalibration').val()
        
        $.ajax({
            cache: false,
            // async: false,
            type: "post",
            url: "/standard/thermoHygrometer/addThermoHygrometer",
            data: {
                'certificateNumber' : certificateNumber,
                'serialNumber' : serialNumber,
                'description' : description,
                'brand' : brand,
                'model' : model,
                'provider' : provider,
                'dateOfCalibration' : dateOfCalibration,

            },
            success: function(result) {
                console.log(result)
                getStandardData();                
            },
            error: function (error) {
                console.log(error)
            },
        })

    }
    function deleteStandard(ID){
        $.ajax({
            cache: false,
            async: false,
            type: "post",
            url: "/standard/thermoHygrometer/deleteThermoHygrometer/"+ID+"",
            success: function(result) {
                getStandardData();
            },
            error: function (error) {
                console.log(error)
            },
        })
    }

    function addNewTable(){
        let numberOfTable = $("#measurementDIV").children().length;
        let tableNumber = numberOfTable + 1;
        
        let table = $('<table>',{
            'class': 'table',
            'id':'tableNumber' + tableNumber
        })
        let tableHead = $('<thead>');
        let tableBody = $('<tbody>');
        let headRow = $('<tr>')
        let title = $('<td>').attr('colspan', '5')
        
        let headInformation = $('<tr>', {
            'html': $('<td>', {
                'text': 'Test Point'
            }).add($('<td>', {
                'text': 'RML Reading'
            })).add($('<td>', {
                'text': 'Provider Reading'
            })).add($('<td>', {
                'text': 'Previous RML Reading'
            })).add($('<td>', {
                'text': 'Correction'
            })).add($('<td>', {
                'text': 'Uncertainty'
            })).add($('<td>', {
                'text': 'Drift'
            }))
        })

        let rowNumber = 0; 

        var unitWithButtons = 
        $("<div>",{
            "class":'input-group mb-3',
            "html": $("<div/>", {
                "class": "form-floating col-md-3",
                "html": $("<input/>", {
                    "type": "text",
                    "class": "form-control",
                    "id": 'unitTableNumber' + tableNumber,
                    "placeholder": "Unit",
                    'list':'unitList'
                }).add($("<label/>", {
                    "for": 'unitTableNumber'+ tableNumber,
                    "text": "Unit",
                }))
            }).add(
                $('<button>', {
                    'class':'btn btn-outline-secondary',
                    'text': "Add Row",
                    'id': 'addRowtable' + tableNumber,
                    'click': function(){
                        rowNumber += addNewMeasurementRow(tableNumber, rowNumber);
                    },

                })
            ).add(
                $('<button>', {
                    'class':'btn btn-outline-danger',
                    'text': "Remove Row",
                    'id': 'removeRowtable' + tableNumber,
                    'click': function(){
                        rowNumber > 0 ? rowNumber += removeMeasurementRow(tableNumber) : rowNumber = 0;
                    },

                })
            )
        })

      

        table.append(
            tableHead.append(
                headRow.append(
                    title.append(
                        unitWithButtons,
                    ),
                ),
                headInformation
            ), 
            tableBody
        )

        $("#measurementDIV").append(table)

    }
    function removeTable(){
        $("#measurementDIV").children().last().remove();
    }
    function addNewMeasurementRow(tableNumber, rowIndex){
        let rowNumber = rowIndex + 1
        let body = $('#tableNumber'+tableNumber+' tbody');
        let tr = $('<tr>');
        let testPointID = 'table'+tableNumber+'TESTPOINT'+'row'+rowNumber;
        let rmlID = 'table'+tableNumber+'RML'+'row'+rowNumber;
        let providerID = 'table'+tableNumber+'PROVIDER'+'row'+rowNumber;
        let previousRMLID = 'table'+tableNumber+'PREVIOUSRML'+'row'+rowNumber;
        let correctionID = 'table'+tableNumber+'CORRECTION'+'row'+rowNumber;
        let uncertaintyID = 'table'+tableNumber+'UNCERTAINTY'+'row'+rowNumber;
        let driftID = 'table'+tableNumber+'DRIFT'+'row'+rowNumber;
        
        let testPoint = $('<td>', {
                            'html': $('<input>', {
                                'type': 'text',
                                'id': testPointID,
                            })
        }) 
        let rml = $('<td>', {
                            'html': $('<input>', {
                                    'type': 'text',
                                    'id': rmlID,
                                })
        }) 
        let provider = $('<td>', {
                        'html': $('<input>', {
                                'type': 'text',
                                'id': providerID,
                                'on': {
                                    'input': function() {
                                        calculateCorrection(rmlID, providerID, correctionID, tableNumber);
                                    }
                                },
                            })
        }) 
        let previousRML = $('<td>', {
                        'html': $('<input>', {
                                'type': 'text',
                                'id': previousRMLID,
                                'on': {
                                    'input': function() {
                                        calculateDrift(previousRMLID, rmlID, driftID, tableNumber);
                                    }
                                },
                            })
        }) 
        let correction = $('<td>', {
                        'html': $('<input>', {
                                'type': 'text',
                                'id': correctionID,
                            })
        }) 
        let uncertainty = $('<td>', {
                        'html': $('<input>', {
                                'type': 'text',
                                'id': uncertaintyID,
                            })
        }) 
        let drift = $('<td>', {
                        'html': $('<input>', {
                                'type': 'text',
                                'id': driftID,
                                'class':'bg-transparent border-0',
                            }),
                        'class':'bg-warning',
        }) 
        
        body.append(
            tr.append(
                testPoint,
                rml,
                provider,
                previousRML,
                correction,
                uncertainty,
                drift,
            ), 
        )

        return 1;

    }
    function removeMeasurementRow(tableNumber){
        let body = $('#tableNumber'+tableNumber+' tbody');
        $(body).children().last().remove();

        return -1;
    }
    function calculateDrift(previousCorrectionID, correctionID, driftID, channelNumber){
        let previousCorrectionIDValue = $('#'+previousCorrectionID).val();
        let correctionIDValue = $('#'+correctionID).val();
        let result = 0;

        if(previousCorrectionIDValue != ''){
            let prevABS = parseFloat(previousCorrectionIDValue);
            let curABS = parseFloat(correctionIDValue);
            result = Math.abs(prevABS - curABS);
            $('#'+driftID).val(result);
        }else{
            $('#'+driftID).val('');
        }
    }
    function calculateCorrection(rmlID, providerID, correctionID, tableNumber){
        let rmlIDValue = $('#'+rmlID).val();
        let providerIDValue = $('#'+providerID).val();
        let result = 0;

        if(providerIDValue != ''){
            let rml = parseFloat(rmlIDValue);
            let provider = parseFloat(providerIDValue);
            result = provider - rml;
            $('#'+correctionID).val(result);
        }else{
            $('#'+correctionID).val('');
        }
    }

    function updateStandardMeasurements(){
        let standardID = $('#standardID').val()
        let measurements = processMeasurements();
        //let uncertainty = $("#uncertainty").val()

        $.ajax({
            cache: false,
            //async: false,
            type: "post",
            url: "/standard/thermoHygrometer/updateMeasurementsThermoHygrometer",
            data: {
                'standardID': standardID,
                //'uncertainty': uncertainty,
                'measurements': measurements,
            },
            success: function(result) {
                //console.log(result)
                getStandardData();        
                $('#modalMeasurements').modal('hide');           
            },
            error: function (error) {
                console.log(error)
            },
        })
    }

    function processMeasurements(){
        let numberOftable = $("#measurementDIV").children().length;
        let measurements = {};
        let arrayOfUncertainty = [];
        for (let i = 1; i <= numberOftable; i++) {
            let numberOfRows = $('#tableNumber'+i+' tbody').children().length;
            let tableNumber = 'table' + i;
         
            let arrayOfMeasurements = [];
            let unitTableNumberID = "unitTableNumber"+i;
            
            
            measurements[$('#'+unitTableNumberID).val()] = {};

            for (let x = 1; x <= numberOfRows; x++) {
                let testPointID = tableNumber+'TESTPOINT'+'row'+x;
                let rmlID = tableNumber+'RML'+'row'+x;
                let providerID = tableNumber+'PROVIDER'+'row'+x;
                let previousRMLID = tableNumber+'PREVIOUSRML'+'row'+x;
                let correctionID = tableNumber+'CORRECTION'+'row'+x;
                let uncertaintyID = tableNumber+'UNCERTAINTY'+'row'+x;
                let driftID = tableNumber+'DRIFT'+'row'+x;
                measurements[$('#'+unitTableNumberID).val()][$('#'+testPointID).val()] = {
                    [unitTableNumberID] : $('#'+unitTableNumberID).val(),
                    [testPointID] : $('#'+testPointID).val(),
                    [rmlID] : $('#'+rmlID).val(),
                    [providerID] : $('#'+providerID).val(),
                    [previousRMLID] : $('#'+previousRMLID).val(),
                    [correctionID] : $('#'+correctionID).val(),
                    [uncertaintyID] : $('#'+uncertaintyID).val(),
                    [driftID] : $('#'+driftID).val(),
                };
            }
        }
        return JSON.stringify(measurements)
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
</script>