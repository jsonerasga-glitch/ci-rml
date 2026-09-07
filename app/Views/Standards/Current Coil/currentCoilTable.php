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
                'active' => 'standard19',
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
                                        <b>Current Coil</b>
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
                                                <th>Turns</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">New Current Coil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <fieldset>
                            <div class="form-group">
                                <label class=" control-label" for="description">Description</label>  
                                <div class="">
                                    <input id="description" name="description" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="serialNumber">Serial Number</label>
                                <div class="">                     
                                    <textarea class="form-control" id="serialNumber" name="serialNumber"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="turns">Turns</label>  
                                <div class="">
                                    <input id="turns" name="turns" type="text" placeholder="" class="form-control input-md">
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
        <div class="modal fade" id="modalEdit" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Current Coil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <input type="hidden" name="standardID" id="standardID">
                        <div class="form-group">
                            <label class=" control-label" for="descriptionEdit">Description</label>  
                            <div class="">
                                <input id="descriptionEdit" name="descriptionEdit" type="text" placeholder="" class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" control-label" for="serialNumberEdit">Serial Number</label>
                            <div class="">                     
                                <textarea class="form-control" id="serialNumberEdit" name="serialNumberEdit"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" control-label" for="turnsEdit">Turns</label>  
                            <div class="">
                                <input id="turnsEdit" name="turnsEdit" type="text" placeholder="" class="form-control input-md">
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


        <div>

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
        $("#descriptionEdit").val(selectedStandardData['description'])
        $("#serialNumberEdit").val(selectedStandardData['serialNumber'])
        $("#turnsEdit").val(selectedStandardData['turns'])
        
        $('#modalEdit').modal('show');
    }

    function addStandardToTable(){
        $('#standardTableTbody').html('');
        standardData.forEach((item, index) => {
            let standardID = item.id;

            let tr = $('<tr>');
            let idTd = $('<td>', {
                'class': 'd-none',
                'html': standardID,
            });
            let descriptionTD =$('<td>').html(item.description)
            let serialNumberTD =$('<td>').html(item.serialNumber)
            let turnsTD =$('<td>').html(item.turns)

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
                turnsTD,

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

            let descriptionTD =$('<td>').html(item.description)
            let serialNumberTD =$('<td>').html(item.serialNumber)
            let turnsTD =$('<td>').html(item.turns)

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
                descriptionTD,
                serialNumberTD,
                turnsTD,

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
            url: "/standard/currentCoil/getStandardDataCurrentCoil",
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
            url: "/standard/currentCoil/getStandardValuesCurrentCoilByDetailsID",
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
        let description = $('#description').val()
        let serialNumber = $('#serialNumber').val()
        let turns = $('#turns').val()

        $.ajax({
            cache: false,
            // async: false,
            type: "post",
            url: "/standard/currentCoil/addCurrentCoil",
            data: {
                'description' : description,
                'serialNumber' : serialNumber,
                'turns' : turns,

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

        let description = $('#descriptionEdit').val()
        let serialNumber = $('#serialNumberEdit').val()
        let turns = $('#turnsEdit').val()


        $.ajax({
            cache: false,
            //async: false,
            type: "post",
            url: "/standard/currentCoil/updateCurrentCoil",
            data: {
                'standardID': standardID,
                'description' : description,
                'serialNumber' : serialNumber,
                'turns' : turns,
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
            url: "/standard/currentCoil/removeStandard",
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
    }
</script>