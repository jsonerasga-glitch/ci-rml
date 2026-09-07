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
        </style>
    </head>  
    <body class="skin-base animate">
        <?php
            $data = [
                'active' => 'standard18',
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
                                        <b>Chamber</b>
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
                                    <table class="table table-bordered table-sm tableMain">
                                        <thead>
                                            <tr>
                                                <th class="d-none">id</th>
                                                <th>Serial Number</th>
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


        <div class="modal fade" id="modalNewStandard" tabindex="-1" >
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Chamber</h5>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="description" placeholder="Description">
                                <label for="description">Description</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="serialNumber" placeholder="Serial Number">
                                <label for="serialNumber">Serial Number</label>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" id="addNewDetailsBtn" data-bs-dismiss="modal">Add</button>
                </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalEdit" tabindex="-1" >
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Chamber</h5>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalMeasurement">Measurement Data</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action='/standard/chamber/updateChamber' method="POST" id='updateForm' name='updateForm'>

                        <fieldset>
                            <input type="hidden" name="standardID" id="standardID" >
                            <input type="hidden" name="measurements" id="measurements">
                            <div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="descriptionEdit" placeholder="Description">
                                    <label for="descriptionEdit">Description</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="serialNumberEdit" placeholder="Serial Number">
                                    <label for="serialNumberEdit">Serial Number</label>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" id="updateDetailsBtn" data-bs-dismiss="modal">Update</button>
                </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalMeasurement" tabindex="-1" data-bs-backdrop="static" style="background-color:rgba(0,0,0,0.5)">
            <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable ">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Measurement Data</h5>
                        <button type="button" class="btn btn-success ml-5" style="margin-left:1em" onclick="addRowToMeasurementTable()">ADD</button>
                        <button type="button" class="btn btn-danger ml-5" style="margin-left:.5em" onclick="deleteFromMeasurementTable()">REMOVE</button>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="height:40em">
                       

                        <div id="measurementDIV">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Unit</th>
                                        <th>Setting</th>
                                        <th>Value</th>
                                    </tr>
                                </thead>
                                <tbody id="measurementDIVTableTbody"></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success" onclick="updateMeasurements()">Update</button>
                    </div>
                </div>
            </div>
        </div>
       
        <form action=""></form>
    </body>
</html>
<script src="/dashboardAsset/lib/jquery/jquery.min.js"></script>
<script src="/dashboardAsset/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/dashboardAsset/lib/feathericons/feather.min.js"></script>
<script src="/dashboardAsset/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/dashboardAsset/assets/js/script.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jstat@1.9.2/dist/jstat.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/formulajs/formulajs@2.5.0/dist/formula.min.js"></script>

<script>
    var standardData;

    $(document).ready(function(){
        getStandardData()
        bindToElements()
    });

    function addMeasurementsToInput(){
        let countOfRows = $('#measurementDIVTableTbody').children().length;
        let ids = ['type', 'unit', 'setting', 'value'];
        let arrayOfObjects = [];
        for (let i = 1; i <= countOfRows; i++) {
            let measurementValuesObject = {};
            for (let x = 0; x < ids.length; x++) {
                let IDs = ids[x] + "Row" + i;
                measurementValuesObject[ids[x]] =  $('#'+IDs).val()
            }
            arrayOfObjects.push(measurementValuesObject);
        }
        $('#measurements').val(JSON.stringify(arrayOfObjects));
    }
    function addRowToMeasurementTable(){
        let countOfRows = $('#measurementDIVTableTbody').children().length + 1;
        let tr = $('<tr>');
        let ids = ['type', 'unit', 'setting', 'value'];
        for (var i = 0; i < ids.length; i++) {
            let td = $('<td>');
            let input = $('<input>').attr('type', 'text').attr('class', 'form-control').attr('id',  ids[i]+ 'Row' + countOfRows);
            if(ids[i] == 'type'){
                input = $('<select>').attr('class', 'form-control').attr('id',  ids[i]+ 'Row' + countOfRows).append($('<option>').html('Spatial Inhomogeneity').attr('value', 'inhomogeneity')).append($('<option>').html('Temporal Instability').attr('value', 'instability'));
            }
            if(ids[i] == 'unit'){
                input = $('<select>').attr('class', 'form-control').attr('id',  ids[i]+ 'Row' + countOfRows).append($('<option>').html('Temperature').attr('value', 'Temperature')).append($('<option>').html('Relative Humidity').attr('value', 'Relative Humidity'));
            }
            td.append(input);
            tr.append(td);
        }
        
        $('#measurementDIVTableTbody').append(tr);

    }
    function deleteFromMeasurementTable(){
        $('#measurementDIVTableTbody').children().last().remove();
    }
    function updateMeasurements(){
        addMeasurementsToInput()
        let standardID = $('#standardID').val();
        let measurements = $('#measurements').val()

        $.ajax({
            cache: false,
            type: "post",
            url: "/standard/chamber/updateMeasurementsChamber",
            data: {
                'standardID':standardID,
                'measurements': measurements,
            },
        })
        .done(function(result){
            getStandardData();               
        })
        .fail(function(error){
            console.log(error);
            alert("Unable to add measurements to database");
        })



        
    }
    function convertToFloat(value){
        let result;
        if(value === ''){
            result = 0;
        }else{
            result = parseFloat(value)
        }
        return result;
    }

    function newStandard(){
        let serialNumber = $('#serialNumber');
        let description = $('#description');
        $.ajax({
            cache: false,
            type: "post",
            url: "/standard/chamber/addChamber",
            data: {
                'serialNumber': serialNumber.val(),
                'description': description.val(),
            },
        })
        .done(function(result){
            getStandardData();               
            serialNumber.val('')
        })
        .fail(function(error){
            console.log(error);
            alert("Unable to add to database");
        })
    }

    function updateStandard(){
        let standardID = $('#standardID');
        let serialNumber = $('#serialNumberEdit');
        let description = $('#descriptionEdit');
        $.ajax({
            cache: false,
            type: "post",
            url: "/standard/chamber/updateChamber",
            data: {
                'standardID':standardID.val(),
                'serialNumber': serialNumber.val(),
                'description': description.val(),
            },
        })
        .done(function(result){
            getStandardData();               
            serialNumber.val('')
            description.val('')
        })
        .fail(function(error){
            console.log(error);
            alert("Unable to update" + standardID.val());
        })
    }

    function deleteStandard(detailsID){
        let standardID = detailsID
        $.ajax({
            cache: false,
            //async: false,
            type: "post",
            url: "/standard/chamber/removeStandard",
            data: {
                'standardID': standardID,
            },
        })
        .done(function(result){
            alert("Successfully deleted");
            getStandardData();               
        })
        .fail(function(error){
            console.log(error);
            alert("Unable to delete" + standardID);
        })
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
            let serialNumberTD =$('<td>').html(item.serialNumber)

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
                let deleteConfirmed = confirm("Do you want to delete "+item.serialNumber+"?");
                if (deleteConfirmed) {
                    deleteStandard(standardID)
                }
            })

            tr.append(
                idTd,
                serialNumberTD,
                editTD.append(editBtn),
                deleteTd.append(deleteBtn)
            )

            $('#standardTableTbody').append(tr)
        })
    }

    function getStandardData(){
        $.ajax({
            cache: false,
            async: false,
            type: "post",
            url: "/standard/chamber/getStandardDataChamber",
        })
        .done(function(result){
            standardData = result.standardData;
        })
        .fail(function(error){
            console.log(error)
            alert('Unable to retrieve data');
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
            async: false,
            type: "post",
            url: "/standard/chamber/getStandardValuesChamberByDetailsID",
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

    function bind(id, evt, func){
        var el = document.getElementById(id);
        if (el.addEventListener){
            el.addEventListener(evt, func);
        } else if (el.attachEvent) {
            el.attachEvent('on' + evt, func);
        }
    }

    function editAddData(ID){
        let selectedStandardData = standardData.find(o => o.id === ID);
        $("#standardID").val(selectedStandardData['id'])
        $("#serialNumberEdit").val(selectedStandardData['serialNumber'])
        $("#descriptionEdit").val(selectedStandardData['description'])

        $('#measurementDIVTableTbody').html("");
        let haveMeasurements = selectedStandardData['measurements'] != null && selectedStandardData['measurements'] != '[]';
       
        if(haveMeasurements){
            const idsForMeasurement = ['type', 'unit', 'setting', 'value'];
            const measurementArray = JSON.parse(selectedStandardData['measurements']);
            measurementArray.forEach((itemObject, index) => {
                addRowToMeasurementTable()
                let rowNumber = index + 1;
                for (let x = 0; x < idsForMeasurement.length; x++) {
                    let measurementsInputsID = idsForMeasurement[x]+ 'Row' + rowNumber;
                    $('#'+measurementsInputsID).val(itemObject[idsForMeasurement[x]]);
                }
            })
        }else{
            $('#measurementDIVTableTbody').text('');
        }

        $('#modalEdit').modal('show');
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