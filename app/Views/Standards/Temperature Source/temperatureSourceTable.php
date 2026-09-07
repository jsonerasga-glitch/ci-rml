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
                'active' => 'standard4',
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
                                        <b>Temperature Source</b>
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
                                                <th>Code</th>
                                                <th>Max Instability</th>
                                                <th>Max Axial</th>
                                                <th>Max Radial</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">New Temperature Source</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <fieldset>
                            <div class="form-group">
                                <label class=" control-label" for="code">code</label>  
                                <div class="">
                                    <input id="code" name="code" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="description">description</label>
                                <div class="">                     
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="maxInstability">maxInstability</label>  
                                <div class="">
                                    <input id="maxInstability" name="maxInstability" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="maxAxial">maxAxial</label>  
                                <div class="">
                                    <input id="maxAxial" name="maxAxial" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="maxRadial">maxRadial</label>  
                                <div class="">
                                    <input id="maxRadial" name="maxRadial" type="text" placeholder="" class="form-control input-md">
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Temperature Source</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <input type="hidden" name="standardID" id="standardID">
                            <div class="form-group">
                                <label class=" control-label" for="codeEdit">code</label>  
                                <div class="">
                                    <input id="codeEdit" name="codeEdit" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="descriptionEdit">description</label>
                                <div class="">                     
                                    <textarea class="form-control" id="descriptionEdit" name="descriptionEdit"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="maxInstabilityEdit">maxInstability</label>  
                                <div class="">
                                    <input id="maxInstabilityEdit" name="maxInstabilityEdit" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="maxAxialEdit">maxAxial</label>  
                                <div class="">
                                    <input id="maxAxialEdit" name="maxAxialEdit" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="maxRadialEdit">maxRadial</label>  
                                <div class="">
                                    <input id="maxRadialEdit" name="maxRadialEdit" type="text" placeholder="" class="form-control input-md">
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
        $("#codeEdit").val(selectedStandardData['code'])
        $("#descriptionEdit").val(selectedStandardData['description'])
        $("#maxInstabilityEdit").val(selectedStandardData['maxInstability'])
        $("#maxAxialEdit").val(selectedStandardData['maxAxial'])
        $("#maxRadialEdit").val(selectedStandardData['maxRadial'])

        
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
            let codeTd = $('<td>').html(item.code);
            let maxInstabilityTd = $('<td>').html(item.maxInstability);
            let maxAxialTd = $('<td>').html(item.maxAxial);
            let maxRadialTd = $('<td>').html(item.maxRadial);
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
                codeTd,
                maxInstabilityTd,
                maxAxialTd,
                maxRadialTd,
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
            url: "/standard/temperatureSource/getStandardDataTemperatureSource",
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
            url: "/standard/temperatureSource/getStandardValuesTemperatureSourceByDetailsID",
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
        let code = $('#code').val()
        let description = $('#description').val()
        let maxInstability = $('#maxInstability').val()
        let maxAxial = $('#maxAxial').val()
        let maxRadial = $('#maxRadial').val()

        $.ajax({
            cache: false,
            // async: false,
            type: "post",
            url: "/standard/temperatureSource/addTemperatureSource",
            data: {
                'code' : code,
                'description' : description,
                'maxInstability' : maxInstability,
                'maxAxial' : maxAxial,
                'maxRadial' : maxRadial,
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

        let code = $('#codeEdit').val()
        let description = $('#descriptionEdit').val()
        let maxInstability = $('#maxInstabilityEdit').val()
        let maxAxial = $('#maxAxialEdit').val()
        let maxRadial = $('#maxRadialEdit').val()

        $.ajax({
            cache: false,
            //async: false,
            type: "post",
            url: "/standard/temperatureSource/updateTemperatureSource",
            data: {
                'standardID': standardID,
                'code' : code,
                'description' : description,
                'maxInstability' : maxInstability,
                'maxAxial' : maxAxial,
                'maxRadial' : maxRadial,
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
            url: "/standard/temperatureSource/removeStandard",
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