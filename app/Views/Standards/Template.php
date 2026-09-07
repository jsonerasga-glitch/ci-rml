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
                                        <b>Temperature Recorder</b>
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
                    <h5 class="modal-title" id="exampleModalLabel">New Temperature Recorder</h5>
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
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" id="updateStandardButton" data-bs-dismiss="modal">Update</button>
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