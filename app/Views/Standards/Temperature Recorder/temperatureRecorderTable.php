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
                'active' => 'standard14',
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
                                        <b>Temperature Recorder / Wireless Temperature Logger</b>
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
                    <h5 class="modal-title" id="exampleModalLabel">New standard</h5>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Standard</h5>
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="standardID">
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

                        <div class="form-group">
                            <div class="mt-2">
                                <button type="button" class="btn btn-success input-md" data-bs-toggle="modal" data-bs-target="#modalMeasurements" data-bs-dismiss="modal">Measurement Data</button>
                            </div>
                        </div>

                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" id="updateStandardButton" data-bs-dismiss="modal">Update</button>
                </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalMeasurements" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-scrollable custom-size" >
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Standard</h5>
                    <div class="btn-toolbar mx-5" role="toolbar" >
                        <div class="btn-group me-2" role="group" >
                            <button type="button" class="btn btn-success" id="addMeasurement">ADD</button>
                            <button type="button" class="btn btn-danger" id="removeMeasurement">REMOVE</button>
                        </div>
                        <div class="input-group">
                            <div class="input-group-text">Uncertainty (MAX)</div>
                            <input type="text" class="form-control" id="uncertainty">
                        </div>
                        <div class="input-group">
                            <div class="input-group-text">Drift (MAX)</div>
                            <input type="text" class="form-control" id="driftMax">
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
            addNewChannel()
        })
        bind('removeMeasurement','click',function(){
            removeChannel()
        })
        bind('updateStandardButton','click',function(){
            updateStandard()
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
            url: "/standard/tempRecorder/getStandardDataTempRecorder",
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
        let today = new Date();
        standardData.forEach((item, index) => {
            let suffix = 'days left before due date';
            let date_next_calibration = new Date(item.dateOfCalibration)
            date_next_calibration.setFullYear(date_next_calibration.getFullYear() + 1);
            let days_due = Math.round(Math.abs((today - date_next_calibration) / (24 * 60 * 60 * 1000)));
            
            let standardID = item.id;

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
            let providerTd = $('<td>').html(item.provider);
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
                daysDue,
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
        $("#uncertainty").val(selectedStandardData['uncertainty'])
        

        if(selectedStandardData['measurements'] != null && selectedStandardData['measurements'] != '' && selectedStandardData['measurements'] != '{}'){
            $('#modalMeasurements').on('hidden.bs.modal', function () {
                $('#measurementDIV').html('')
            });
            $('#measurementDIV').html('')
            let parseMeasurement = JSON.parse(selectedStandardData['measurements']);
            let countOfChannel = parseMeasurement.length;
            for (let i = 0; i < countOfChannel; i++) {
                addNewChannel();
                let numberOfRow = parseMeasurement[i].length;
                let channelNumber = i+1;
                for (let x = 0; x < numberOfRow; x++) {
                    let rowNumber = x+1;
                    $('#addRowChannel'+channelNumber).trigger('click');

                    let channelKeyID = 'channelKey'+channelNumber;
                    let testPointID = 'channel'+channelNumber+'TESTPOINT'+'row'+rowNumber;
                    let standardID = 'channel'+channelNumber+'STANDARD'+'row'+rowNumber;
                    let uucID = 'channel'+channelNumber+'UUC'+'row'+rowNumber;
                    let previousCorrectionID = 'channel'+channelNumber+'PREVIOUSCORRECTION'+'row'+rowNumber;
                    let correctionID = 'channel'+channelNumber+'CORRECTION'+'row'+rowNumber;
                    let uncertaintyID = 'channel'+channelNumber+'UNCERTAINTY'+'row'+rowNumber;
                    let driftID = 'channel'+channelNumber+'DRIFT'+'row'+rowNumber;
                    
                    $('#'+channelKeyID).val(parseMeasurement[i][x][channelKeyID]);
                    $('#'+testPointID).val(parseMeasurement[i][x][testPointID]);
                    $('#'+standardID).val(parseMeasurement[i][x][standardID]);
                    $('#'+uucID).val(parseMeasurement[i][x][uucID]);
                    $('#'+previousCorrectionID).val(parseMeasurement[i][x][previousCorrectionID]);
                    $('#'+correctionID).val(parseMeasurement[i][x][correctionID]);
                    $('#'+previousCorrectionID).trigger('input');
                    $('#'+uncertaintyID).val(parseMeasurement[i][x][uncertaintyID]);
                    $('#'+driftID).val(parseMeasurement[i][x][driftID]);
                }
            }
        }else{
            $('#modalMeasurements').on('hidden.bs.modal', function () {
               
            });
        }
        $('#modalEdit').modal('show');        
    }

    function addNewChannel(){
        let numberOfChannel = $("#measurementDIV").children().length;
        let channelNumber = numberOfChannel + 1;
        let table = $('<table>').attr('class', 'table').attr('id', "channel" + channelNumber);
        let tableHead = $('<thead>');
        let tableBody = $('<tbody>');

        let headRow = $('<tr>')
        let title = $('<td>').attr('colspan', '5')

        let headInformation = $('<tr>', {
            'html': $('<td>', {
                'text': 'Test Point'
            }).add($('<td>', {
                'text': 'STD Rdg. (ᵒC)'
            })).add($('<td>', {
                'text': 'UUC Rdg. (ᵒC)'
            })).add($('<td>', {
                'text': 'Previous UUC Reading (ᵒC)'
            })).add($('<td>', {
                'text': 'Correction (ᵒC)'
            })).add($('<td>', {
                'text': 'Uncertainty (ᵒC)'
            })).add($('<td>', {
                'text': 'Drift'
            }))
        })

        let rowNumber = 0; 

        var channelNumberInput = 
        $("<div>",{
            "class":'input-group mb-3',
            "html": $("<div/>", {
                "class": "form-floating col-md-3",
                "html": $("<input/>", {
                    "type": "text",
                    "class": "form-control",
                    "id": 'channelKey' + channelNumber,
                    "placeholder": "Channel Number / Serial Number",
                    "value": channelNumber,
                }).add($("<label/>", {
                    "for": 'Channel#'+ channelNumber,
                    "text": "Channel Number / Serial Number",
                }))
            }).add(
                $('<button>', {
                    'class':'btn btn-outline-secondary',
                    'text': "Add Row",
                    'id': 'addRowChannel' + channelNumber,
                    'click': function(){
                        rowNumber += addNewMeasurementRow(channelNumber, rowNumber);
                    },

                })
            ).add(
                $('<button>', {
                    'class':'btn btn-outline-danger',
                    'text': "Remove Row",
                    'id': 'removeRowChannel' + channelNumber,
                    'click': function(){
                        rowNumber > 0 ? rowNumber += removeMeasurementRow(channelNumber) : rowNumber = 0;
                    },

                })
            ).add(
                $("<div/>", {
                "class": "form-floating",
                "html": $("<input/>", {
                    "type": "text",
                    "class": "form-control",
                    "id": 'maxDriftChannel' + channelNumber,
                    "placeholder": "Channel Max Drift",
                }).add($("<label/>", {
                    "for": 'maxDriftChannel'+ channelNumber,
                    "text": "Channel Max Drift",
                }))
                })
            )
        })

        

        table.append(
            tableHead.append(
                headRow.append(
                    title.append(
                        channelNumberInput,
                    ),
                ),
                headInformation
            ), 
            tableBody
        )

        $("#measurementDIV").append(table)
    }
    function removeChannel(){
        $("#measurementDIV").children().last().remove();
    }

    function addNewMeasurementRow(channelNumber, rowIndex){
        let rowNumber = rowIndex + 1
        let body = $('#channel'+channelNumber+' tbody');
        let tr = $('<tr>');
        let testPointID = 'channel'+channelNumber+'TESTPOINT'+'row'+rowNumber;
        let standardID = 'channel'+channelNumber+'STANDARD'+'row'+rowNumber;
        let uucID = 'channel'+channelNumber+'UUC'+'row'+rowNumber;
        let previousCorrectionID = 'channel'+channelNumber+'PREVIOUSCORRECTION'+'row'+rowNumber;
        let correctionID = 'channel'+channelNumber+'CORRECTION'+'row'+rowNumber;
        let uncertaintyID = 'channel'+channelNumber+'UNCERTAINTY'+'row'+rowNumber;
        let driftID = 'channel'+channelNumber+'DRIFT'+'row'+rowNumber;
        
        let testPoint = $('<td>', {
                            'html': $('<input>', {
                                'type': 'text',
                                'id': testPointID,
                            })
        }) 
        let standard = $('<td>', {
                            'html': $('<input>', {
                                    'type': 'text',
                                    'id': standardID,
                                })
        }) 
        let uuc = $('<td>', {
                        'html': $('<input>', {
                                'type': 'text',
                                'id': uucID,
                            })
        }) 
        let prevCorrection = $('<td>', {
                        'html': $('<input>', {
                                'type': 'text',
                                'id': previousCorrectionID,
                                'on': {
                                    'input': function() {
                                        calculateDrift(previousCorrectionID, uucID, driftID, channelNumber);
                                        setMaxDrift(channelNumber, driftID);
                                        setMaxDriftALL();
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
                            })
        }) 
        
        body.append(
            tr.append(
                testPoint,
                standard,
                uuc,
                prevCorrection,
                correction,
                uncertainty,
                drift,
            ), 
        )

        return 1;

    }
    function removeMeasurementRow(channelNumber){
        let body = $('#channel'+channelNumber+' tbody');
        $(body).children().last().remove();

        return -1;
    }
    function calculateDrift(previousCorrectionID, correctionID, driftID, channelNumber){
        let previousCorrectionIDValue = $('#'+previousCorrectionID).val();
        let correctionIDValue = $('#'+correctionID).val();
        let maxDriftChannel = $('#maxDriftChannel'+channelNumber).val();
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

    function setMaxDrift(channelNumber, driftID){
        let channelMax = $('#'+driftID).val();
        let inputID = 'channel'+channelNumber+'DRIFTrow';
        let maxValue = -Infinity;
        
        $('input[id^="' + inputID + '"]').each(function() {
            let value = parseFloat($(this).val()); 
            if (!isNaN(value) && value > maxValue) {
                maxValue = value;
            }
        });

        $('#maxDriftChannel'+channelNumber).val(maxValue);
        
    }

    function setMaxDriftALL(){
        let numberOfChannel = $("#measurementDIV").children().length;
        let maxValue = -Infinity;

        for (let i = 1; i <= numberOfChannel; i++) {
            let inputID = 'maxDriftChannel' + i;
            let value = parseFloat($('#'+inputID).val()); 
            if (!isNaN(value) && value > maxValue) {
                maxValue = value;
            }
        }

        $('#driftMax').val(maxValue);
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
            url: "/standard/tempRecorder/addTempRecorder",
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
    function updateStandard(){
        let standardID = $('#standardID').val()
        let certificateNumber = $('#certificateNumberEdit').val()
        let serialNumber = $('#serialNumberEdit').val()
        let description = $('#descriptionEdit').val()
        let brand = $('#brandEdit').val()
        let model = $('#modelEdit').val()
        let provider = $('#providerEdit').val()
        let dateOfCalibration = $('#dateOfCalibrationEdit').val()
        //let measurements = processMeasurements();
        
        
        $.ajax({
            cache: false,
            //async: false,
            type: "post",
            url: "/standard/tempRecorder/updateTempRecorder",
            data: {
                'standardID': standardID,
                'certificateNumber' : certificateNumber,
                'serialNumber' : serialNumber,
                'description' : description,
                'brand' : brand,
                'model' : model,
                'provider' : provider,
                'dateOfCalibration' : dateOfCalibration,
                //'measurements': measurements,
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
    function updateStandardMeasurements(){
        let standardID = $('#standardID').val()
        let measurements = processMeasurements();
        let uncertainty = $("#uncertainty").val()

        $.ajax({
            cache: false,
            //async: false,
            type: "post",
            url: "/standard/tempRecorder/updateMeasurementsTempRecorder",
            data: {
                'standardID': standardID,
                'uncertainty': uncertainty,
                'measurements': measurements,
            },
            success: function(result) {
                console.log(result)
                getStandardData();        
                //$('#modalMeasurements').modal('hide');           
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
            url: "/standard/tempRecorder/deleteTempRecorder/"+ID+"",
            success: function(result) {
                getStandardData();
            },
            error: function (error) {
                console.log(error)
            },
        })
    }

    function processMeasurements(){
        let numberOfChannel = $("#measurementDIV").children().length;
        let measurements = [];
        let arrayOfUncertainty = [];
        for (let i = 1; i <= numberOfChannel; i++) {
            let numberOfRows = $('#channel'+i+' tbody').children().length;
            let channelNumber = 'channel' + i;
            let channelN = 'channel' + i;
            let arrayOfMeasurements = [];
            let channelKeyID = "channelKey"+i;
            for (let x = 1; x <= numberOfRows; x++) {
                let channelMeasurement = {};
                let testPointID = channelNumber+'TESTPOINT'+'row'+x;
                let standardID = channelNumber+'STANDARD'+'row'+x;
                let uucID = channelNumber+'UUC'+'row'+x;
                let previousCorrectionID = channelNumber+'PREVIOUSCORRECTION'+'row'+x;
                let correctionID = channelNumber+'CORRECTION'+'row'+x;
                let uncertaintyID = channelNumber+'UNCERTAINTY'+'row'+x;
                let driftID = channelNumber+'DRIFT'+'row'+x;

                channelMeasurement = {
                    "channelName": $('#'+channelKeyID).val(),
                    "channelNumber": channelNumber,
                    [channelKeyID] : $('#'+channelKeyID).val(),
                    [testPointID] : $('#'+testPointID).val(),
                    [standardID] : $('#'+standardID).val(),
                    [uucID] : $('#'+uucID).val(),
                    [previousCorrectionID] : $('#'+previousCorrectionID).val(),
                    [correctionID] : $('#'+correctionID).val(),
                    [uncertaintyID] : $('#'+uncertaintyID).val(),
                    [driftID] : $('#'+driftID).val(),
                };

                arrayOfMeasurements.push(channelMeasurement);
                arrayOfUncertainty.push(parseFloat($('#'+uncertaintyID).val()));
            }
            measurements.push(arrayOfMeasurements);
        }
        $('#uncertainty').val(Math.max(...arrayOfUncertainty))
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




