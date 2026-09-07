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
                'active' => 'standard6',
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
                                        <b>Balance</b>
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
                                                <th class='d-none'>id</th>
                                                <th>Balance</th>
                                                <th class="text-center"> View / Edit </th>
                                                <th class="text-center"> Delete </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($standardData as $row) : ?>
                                            <tr>
                                                <td class='d-none'><?= $row['id'];?></td>
                                                <td><?= $row['balance'];?></td>
                                                <td class="text-center">
                                                    <button type="button" class="btn" onclick="editAddData('<?= $row['id']?>');"> <i data-feather="clipboard"></i> </button>
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn" onclick="deleteConfirmation('/standard/barometer/deleteBarometer/<?= $row['id']?>')">
                                                        <i data-feather="trash"></i>
                                                    </a>
                                                </td>
                                            </tr>   
                                            <?php endforeach; ?>          
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
                    <h5 class="modal-title" id="exampleModalLabel">New Balance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action='/standard/balance/addBalance' method="POST" name='addNewForm'>
                        <fieldset>
                            <div class="form-group">
                                <label class=" control-label" for="balance">Sensitivity Test</label>  
                                <div class="">
                                    <input id="balance" name="balance" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="description">Description</label>  
                                <div class="">
                                    <input id="description" name="description" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="certificateNumber">Certificate Number</label>  
                                <div class="">
                                    <input id="certificateNumber" name="certificateNumber" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="provider">Provider</label>  
                                <div class="">
                                    <input id="provider" name="provider" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            
                        
                            <div class="form-group">
                                <label class=" control-label" for="dateCalibrated">Date Of Calibration</label>  
                                <div class="">
                                    <input id="dateCalibrated" name="dateCalibrated" type="date" placeholder="" class="form-control input-md">
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="form-group col">
                                    <label class=" control-label" for="nominalEmpty">Nominal Value (for EMPTY)</label>  
                                    <div class="">
                                        <input id="nominalEmpty" name="nominalEmpty" type="text" placeholder="" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label class=" control-label" for="nominalFull">Nominal Value (for Full Load)</label>  
                                    <div class="">
                                        <input id="nominalFull" name="nominalFull" type="text" placeholder="" class="form-control input-md">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mt-3">
                                <div class="col">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Empty + ∆m</th>
                                            <th>Full Load + ∆m</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><input type="text" class="form-control" name="empty1" id="empty1"></td>
                                            <td><input type="text" class="form-control" name="full1" id="full1"></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td><input type="text" class="form-control" name="empty2" id="empty2"></td>
                                            <td><input type="text" class="form-control" name="full2" id="full2"></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><input type="text" class="form-control" name="empty3" id="empty3"></td>
                                            <td><input type="text" class="form-control" name="full3" id="full3"></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td><input type="text" class="form-control" name="empty4" id="empty4"></td>
                                            <td><input type="text" class="form-control" name="full4" id="full4"></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td><input type="text" class="form-control" name="empty5" id="empty5" onkeyup="stDev('empty');addValuesToDelta()"></td>
                                            <td><input type="text" class="form-control" name="full5" id="full5" onkeyup="stDev('full');addValuesToDelta()"></td>
                                        </tr>
                                        <tr>
                                            <td>Standard Deviation (SD)</td>
                                            <td><input type="text" class="form-control" name="emptySD" id="emptySD"></td>
                                            <td><input type="text" class="form-control" name="fullSD" id="fullSD"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                                <div class="col">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr><th> </th> <th><br></th></tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>change in the indication of the balance due to sensitivity weight (ΔIs)</td>
                                                <td><input type="text" class="form-control" name="sensitivityWeightDelta" id="sensitivityWeightDelta"></td>
                                            </tr>
                                            <tr>
                                                <td>standard uncertainty of u(ΔIs)</td>
                                                <td><input type="text" class="form-control" name="uncertSensitivityWeightDelta" id="uncertSensitivityWeightDelta"></td>
                                            </tr>
                                            <tr>
                                                <td>sensitivity weight ms</td>
                                                <td><input type="text" class="form-control" name="sensitivityWeight" id="sensitivityWeight"></td>
                                            </tr>
                                            <tr>
                                                <td>standard uncertainty of the sensitivity weight u(ms)</td>
                                                <td><input type="text" class="form-control" name="uncertSensitivityWeight" id="uncertSensitivityWeight"></td>
                                            </tr>
                                            <tr>
                                                <td>Pooled Standard Deviation</td>
                                                <td><input type="text" class="form-control" name="pooledValue" id="pooledValue"></td>
                                            </tr>
                                        </tbody>
                                    </table>    
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col">
                                    <label class=" control-label" for="maximumValue">Maximum</label>  
                                    <div class="">
                                        <input id="maximumValue" name="maximumValue" type="text" oninput="testWeightDifference()" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label class=" control-label" for="minimumValue">Minimum</label>  
                                    <div class="">
                                        <input id="minimumValue" name="minimumValue" type="text" oninput="testWeightDifference()" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label class=" control-label" for="differenceValue">Difference</label>  
                                    <div class="">
                                        <input id="differenceValue" name="differenceValue" type="text" class="form-control input-md" readonly style="background-color: yellow;">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col">
                                    <label class=" control-label" for="resolution1"><br>Resolution</label>  
                                    <div class="">
                                        <input id="resolution1" name="resolution1" type="text" placeholder="" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label class=" control-label" for="conditionForResolution">Condition (Sample Nominal value <= condition in grams = Resolution 2)</label>  
                                    <div class="">
                                        <input id="conditionForResolution" name="conditionForResolution" type="text" placeholder="" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label class=" control-label" for="resolution2"><br>Resolution 2</label>  
                                    <div class="">
                                        <input id="resolution2" name="resolution2" type="text" placeholder="" class="form-control input-md">
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" onclick="document.addNewForm.submit()">Add</button>
                </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalEdit" tabindex="-1" >
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Balance</h5>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalMeasurement">Measurement Data</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action='/standard/balance/updateBalance' method="POST" id='updateForm' name='updateForm'>
                        <fieldset>
                            <input type="hidden" name="standardID" id="standardID" >
                            <input type="hidden" name="measurements" id="measurements">

                            <div class="form-group">
                                <label class=" control-label" for="balanceEdit">Sensitivity Test</label>  
                                <div class="">
                                    <input id="balanceEdit" name="balanceEdit" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="descriptionEdit">Description</label>  
                                <div class="">
                                    <input id="descriptionEdit" name="descriptionEdit" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="certificateNumberEdit">Certificate Number</label>  
                                <div class="">
                                    <input id="certificateNumberEdit" name="certificateNumberEdit" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="providerEdit">Provider</label>  
                                <div class="">
                                    <input id="providerEdit" name="providerEdit" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            
                            

                            <div class="form-group">
                                <label class=" control-label" for="dateCalibratedEdit">Date Of Calibration</label>  
                                <div class="">
                                    <input id="dateCalibratedEdit" name="dateCalibratedEdit" type="date" placeholder="" class="form-control input-md">
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="form-group col">
                                    <label class=" control-label" for="nominalEmptyEdit">Nominal Value (for EMPTY)</label>  
                                    <div class="">
                                        <input id="nominalEmptyEdit" name="nominalEmptyEdit" type="text" placeholder="" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label class=" control-label" for="nominalFullEdit">Nominal Value (for Full Load)</label>  
                                    <div class="">
                                        <input id="nominalFullEdit" name="nominalFullEdit" type="text" placeholder="" class="form-control input-md">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mt-3">
                                <div class="col">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Empty + ∆m</th>
                                            <th>Full Load + ∆m</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><input type="text" class="form-control" name="empty1Edit" id="empty1Edit"></td>
                                            <td><input type="text" class="form-control" name="full1Edit" id="full1Edit"></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td><input type="text" class="form-control" name="empty2Edit" id="empty2Edit"></td>
                                            <td><input type="text" class="form-control" name="full2Edit" id="full2Edit"></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><input type="text" class="form-control" name="empty3Edit" id="empty3Edit"></td>
                                            <td><input type="text" class="form-control" name="full3Edit" id="full3Edit"></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td><input type="text" class="form-control" name="empty4Edit" id="empty4Edit"></td>
                                            <td><input type="text" class="form-control" name="full4Edit" id="full4Edit"></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td><input type="text" class="form-control" name="empty5Edit" id="empty5Edit" onkeyup="stDevEdit('empty');addValuesToDeltaEdit()"></td>
                                            <td><input type="text" class="form-control" name="full5Edit" id="full5Edit" onkeyup="stDevEdit('full');addValuesToDeltaEdit()"></td>
                                        </tr>
                                        <tr>
                                            <td>Standard Deviation (SD)</td>
                                            <td><input type="text" class="form-control" name="emptySDEdit" id="emptySDEdit"></td>
                                            <td><input type="text" class="form-control" name="fullSDEdit" id="fullSDEdit"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                                <div class="col">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr><th> </th> <th><br></th></tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>change in the indication of the balance due to sensitivity weight (ΔIs)</td>
                                                <td><input type="text" class="form-control" name="sensitivityWeightDeltaEdit" id="sensitivityWeightDeltaEdit"></td>
                                            </tr>
                                            <tr>
                                                <td>standard uncertainty of u(ΔIs)</td>
                                                <td><input type="text" class="form-control" name="uncertSensitivityWeightDeltaEdit" id="uncertSensitivityWeightDeltaEdit"></td>
                                            </tr>
                                            <tr>
                                                <td>sensitivity weight ms</td>
                                                <td><input type="text" class="form-control" name="sensitivityWeightEdit" id="sensitivityWeightEdit"></td>
                                            </tr>
                                            <tr>
                                                <td>standard uncertainty of the sensitivity weight u(ms)</td>
                                                <td><input type="text" class="form-control" name="uncertSensitivityWeightEdit" id="uncertSensitivityWeightEdit"></td>
                                            </tr>
                                            <tr>
                                                <td>Pooled Standard Deviation</td>
                                                <td><input type="text" class="form-control" name="pooledValueEdit" id="pooledValueEdit"></td>
                                            </tr>
                                        </tbody>
                                    </table>    
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col">
                                    <label class=" control-label" for="maximumValueEdit">Maximum</label>  
                                    <div class="">
                                        <input id="maximumValueEdit" name="maximumValueEdit" type="text" oninput="testWeightDifferenceEdit()" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label class=" control-label" for="minimumValueEdit">Minimum</label>  
                                    <div class="">
                                        <input id="minimumValueEdit" name="minimumValueEdit" type="text" oninput="testWeightDifferenceEdit()" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label class=" control-label" for="differenceValueEdit">Difference</label>  
                                    <div class="">
                                        <input id="differenceValueEdit" name="differenceValueEdit" type="text" class="form-control input-md" readonly style="background-color: yellow;">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col">
                                    <label class=" control-label" for="resolution1Edit"><br>Resolution</label>  
                                    <div class="">
                                        <input id="resolution1Edit" name="resolution1Edit" type="text" placeholder="" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label class=" control-label" for="conditionForResolutionEdit">Condition (Sample Nominal value <= condition in grams = Resolution 2)</label>  
                                    <div class="">
                                        <input id="conditionForResolutionEdit" name="conditionForResolutionEdit" type="text" placeholder="" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label class=" control-label" for="resolution2Edit"><br>Resolution 2</label>  
                                    <div class="">
                                        <input id="resolution2Edit" name="resolution2Edit" type="text" placeholder="" class="form-control input-md">
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" onclick="document.updateForm.submit()">Update</button>
                </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalMeasurement" tabindex="-1" data-bs-backdrop="static" style="background-color:rgba(0,0,0,0.5)">
            <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable ">
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
                                        <th>Measurement Number</th>
                                        <th>Test Load</th>
                                        <th>Indication</th>
                                        <th>Error</th>
                                        <th>Uncertainty of Measurement</th>
                                    </tr>
                                </thead>
                                <tbody id="measurementDIVTableTbody"></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success" onclick="updateValuesBySubmitingForm()">Update</button>
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
    const standardData = <?= json_encode($standardData)?>;

	function stDev(mark){
		var emptyResult = 0;
		var fullResult = 0;
		var sensitivityWeight;
		if(mark == 'empty'){
			var data1 = convertToFloat(document.getElementById('empty1').value);
			var data2 = convertToFloat(document.getElementById('empty2').value);
			var data3 = convertToFloat(document.getElementById('empty3').value);
			var data4 = convertToFloat(document.getElementById('empty4').value);
			var data5 = convertToFloat(document.getElementById('empty5').value);
			var result = formulajs.STDEVS([data1,data2,data3,data4,data5]);
			emptyResult = result;
			document.getElementById('emptySD').value = result;
		}
		if(mark == 'full'){
			var data1 = convertToFloat(document.getElementById('full1').value);
			var data2 = convertToFloat(document.getElementById('full2').value);
			var data3 = convertToFloat(document.getElementById('full3').value);
			var data4 = convertToFloat(document.getElementById('full4').value);
			var data5 = convertToFloat(document.getElementById('full5').value);
			var result = formulajs.STDEVS([data1,data2,data3,data4,data5]);
			fullResult = result;
			document.getElementById('fullSD').value = result;
		}
	}

    function stDevEdit(mark){
		var emptyResult = 0;
		var fullResult = 0;
		var sensitivityWeight;
		if(mark == 'empty'){
			var data1 = convertToFloat(document.getElementById('empty1Edit').value);
			var data2 = convertToFloat(document.getElementById('empty2Edit').value);
			var data3 = convertToFloat(document.getElementById('empty3Edit').value);
			var data4 = convertToFloat(document.getElementById('empty4Edit').value);
			var data5 = convertToFloat(document.getElementById('empty5Edit').value);
			var result = formulajs.STDEVS([data1,data2,data3,data4,data5]);
			emptyResult = result;
			document.getElementById('emptySDEdit').value = result;
		}
		if(mark == 'full'){
			var data1 = convertToFloat(document.getElementById('full1Edit').value);
			var data2 = convertToFloat(document.getElementById('full2Edit').value);
			var data3 = convertToFloat(document.getElementById('full3Edit').value);
			var data4 = convertToFloat(document.getElementById('full4Edit').value);
			var data5 = convertToFloat(document.getElementById('full5Edit').value);
			var result = formulajs.STDEVS([data1,data2,data3,data4,data5]);
			fullResult = result;
			document.getElementById('fullSDEdit').value = result;
		}
	}

	function addValuesToDelta(){
		let emptySD = convertToFloat($('#emptySD').val());
		let fullSD = convertToFloat($('#fullSD').val());

        let emptyValuesArray = [
            convertToFloat($('#empty1').val()),
            convertToFloat($('#empty2').val()),
            convertToFloat($('#empty3').val()),
            convertToFloat($('#empty4').val()),
            convertToFloat($('#empty5').val()),
        ]
        let fullValuesArray = [
            convertToFloat($('#full1').val()),
            convertToFloat($('#full2').val()),
            convertToFloat($('#full3').val()),
            convertToFloat($('#full4').val()),
            convertToFloat($('#full5').val()),
        ]

        let averageEmpty = emptyValuesArray.reduce((a, b) => a + b) / emptyValuesArray.length;
        let averageFull = fullValuesArray.reduce((a, b) => a + b) / fullValuesArray.length;

        let emptyDeltaI = convertToFloat($('#nominalEmpty').val()) - averageEmpty;
        let fullDeltaI = convertToFloat($('#nominalFull').val()) - averageFull;

        $('#sensitivityWeightDelta').val(emptySD>fullSD?emptyDeltaI:fullDeltaI);
        $('#uncertSensitivityWeightDelta').val(emptySD>fullSD?(emptySD/Math.sqrt(5)):(fullSD/(Math.sqrt(5))));
	}
    function addValuesToDeltaEdit(){
		let emptySD = convertToFloat($('#emptySDEdit').val());
		let fullSD = convertToFloat($('#fullSDEdit').val());

        let emptyValuesArray = [
            convertToFloat($('#empty1Edit').val()),
            convertToFloat($('#empty2Edit').val()),
            convertToFloat($('#empty3Edit').val()),
            convertToFloat($('#empty4Edit').val()),
            convertToFloat($('#empty5Edit').val()),
        ]
        let fullValuesArray = [
            convertToFloat($('#full1Edit').val()),
            convertToFloat($('#full2Edit').val()),
            convertToFloat($('#full3Edit').val()),
            convertToFloat($('#full4Edit').val()),
            convertToFloat($('#full5Edit').val()),
        ]

        let averageEmpty = emptyValuesArray.reduce((a, b) => a + b) / emptyValuesArray.length;
        let averageFull = fullValuesArray.reduce((a, b) => a + b) / fullValuesArray.length;

        let emptyDeltaI = convertToFloat($('#nominalEmptyEdit').val()) - averageEmpty;
        let fullDeltaI = convertToFloat($('#nominalFullEdit').val()) - averageFull;

        $('#sensitivityWeightDeltaEdit').val(emptySD>fullSD?emptyDeltaI:fullDeltaI);
        $('#uncertSensitivityWeightDeltaEdit').val(emptySD>fullSD?(emptySD/Math.sqrt(5)):(fullSD/(Math.sqrt(5))));
	}
	
    function testWeightDifference(){
		var minTest = document.getElementById('minimumValue').value;
		var maxTest = document.getElementById('maximumValue').value;
		var diffTest = document.getElementById('differenceValue');
		var diffTestResult= convertToFloat(maxTest)-convertToFloat(minTest);
		diffTest.value = (diffTestResult);  
	}
    function testWeightDifferenceEdit(){
		var minTest = document.getElementById('minimumValueEdit').value;
		var maxTest = document.getElementById('maximumValueEdit').value;
		var diffTest = document.getElementById('differenceValueEdit');
		var diffTestResult= convertToFloat(maxTest)-convertToFloat(minTest);
		diffTest.value = (diffTestResult);  
	}

    function editAddData(ID){
        let selectedStandardData = standardData.find(o => o.id === ID);
        $("#standardID").val(selectedStandardData['id'])
        $("#measurements").val(selectedStandardData['measurements'])
        $('#balanceEdit').val(selectedStandardData['balance'])
        $('#descriptionEdit').val(selectedStandardData['description'])
        $('#certificateNumberEdit').val(selectedStandardData['certificateNumber'])
        $('#providerEdit').val(selectedStandardData['provider'])
        

        $('#dateCalibratedEdit').val(selectedStandardData['dateCalibrated'])
        $('#nominalEmptyEdit').val(selectedStandardData['nominalEmpty'])
        $('#nominalFullEdit').val(selectedStandardData['nominalFull'])
        $('#empty1Edit').val(selectedStandardData['empty1'])
        $('#full1Edit').val(selectedStandardData['full1'])
        $('#empty2Edit').val(selectedStandardData['empty2'])
        $('#full2Edit').val(selectedStandardData['full2'])
        $('#empty3Edit').val(selectedStandardData['empty3'])
        $('#full3Edit').val(selectedStandardData['full3'])
        $('#empty4Edit').val(selectedStandardData['empty4'])
        $('#full4Edit').val(selectedStandardData['full4'])
        $('#empty5Edit').val(selectedStandardData['empty5'])
        $('#full5Edit').val(selectedStandardData['full5'])
        $('#emptySDEdit').val(selectedStandardData['emptySD'])
        $('#fullSDEdit').val(selectedStandardData['fullSD'])
        $('#sensitivityWeightDeltaEdit').val(selectedStandardData['sensitivityWeightDelta'])
        $('#uncertSensitivityWeightDeltaEdit').val(selectedStandardData['uncertSensitivityWeightDelta'])
        $('#sensitivityWeightEdit').val(selectedStandardData['sensitivityWeight'])
        $('#uncertSensitivityWeightEdit').val(selectedStandardData['uncertSensitivityWeight'])
        $('#pooledValueEdit').val(selectedStandardData['pooledValue'])
        $('#maximumValueEdit').val(selectedStandardData['maximumValue'])
        $('#minimumValueEdit').val(selectedStandardData['minimumValue'])
        $('#differenceValueEdit').val(selectedStandardData['differenceValue'])
        $('#resolution1Edit').val(selectedStandardData['resolution1'])
        $('#conditionForResolutionEdit').val(selectedStandardData['conditionForResolution'])
        $('#resolution2Edit').val(selectedStandardData['resolution2'])
        $('#modalEdit').modal('show');

        let haveMeasurements = selectedStandardData['measurements'] != null && selectedStandardData['measurements'] != '[]';
        console.log(haveMeasurements)
        if(haveMeasurements){
            const idsForMeasurement = ['measurementNumber', 'testLoad', 'indication', 'error', 'uncertaintyMeasurement'];
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
    }

    function addRowToMeasurementTable(){
        let countOfRows = $('#measurementDIVTableTbody').children().length + 1;
        let tr = $('<tr>');
        let ids = ['measurementNumber', 'testLoad', 'indication', 'error', 'uncertaintyMeasurement'];
        for (var i = 0; i < 5; i++) {
            let td = $('<td>');
            let input = $('<input>').attr('type', 'text').attr('class', 'form-control').attr('id',  ids[i]+ 'Row' + countOfRows);
            i == 0?input.val(countOfRows):'';
            td.append(input);
            tr.append(td);
        }
        $('#measurementDIVTableTbody').append(tr);

    }

    function deleteFromMeasurementTable(){
        $('#measurementDIVTableTbody').children().last().remove();
    }

    function addMeasurementsToInput(){
        let countOfRows = $('#measurementDIVTableTbody').children().length;
        let ids = ['measurementNumber', 'testLoad', 'indication', 'error', 'uncertaintyMeasurement'];
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

    function updateValuesBySubmitingForm(){
        let formName = 'updateForm';
        addMeasurementsToInput();
        document.getElementById(formName).submit();
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

</script>