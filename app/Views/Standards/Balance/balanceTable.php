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


        <div class="modal fade" id="modalNewStandard" tabindex="-1" >
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Balance</h5>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalMeasurement">Measurement Data</button>
                </div>
                <div class="modal-body">
                        <fieldset>
                            <div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <div class="card" style="">
                                            <div class="card-body">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="description" placeholder="Standard Description">
                                                    <label for="description">Standard Description</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="serialNumber" placeholder="Serial Number">
                                                    <label for="serialNumber">Serial Number</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="certificateNumber" placeholder="Certificate Number">
                                                    <label for="certificateNumber">Certificate Number</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="provider" placeholder="Provider">
                                                    <label for="provider">Provider</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="date" class="form-control" id="dateCalibrated" placeholder="Date Of Calibration">
                                                    <label for="dateCalibrated">Date Of Calibration</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="card" style="">
                                            <div class="card-body">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="resolution" placeholder="Resolution">
                                                    <label for="resolution">Resolution</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="resolution2" placeholder="Resolution">
                                                    <label for="resolution2">Resolution 2</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="conditionResolution" placeholder="Resolution">
                                                    <label for="conditionResolution">Condition for Resolution 2 (Test Point > Conditon = Resolution 2)</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="tempCoefficient" placeholder="Temperature Coefficient of Sensitivity">
                                                    <label for="tempCoefficient">Temperature Coefficient of Sensitivity</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="uncertainty" placeholder="Uncertainty">
                                                    <label for="uncertainty">Uncertainty</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="coverageFactor" placeholder="Coverage Factor">
                                                    <label for="coverageFactor">Coverage Factor</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="card" style="">
                                            <div class="card-body">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="sensitivityWeightDelta" placeholder="Change in the indication of the balance due to sensitivity weight (ΔIs)">
                                                    <label for="sensitivityWeightDelta">Change in the indication of the balance due to sensitivity weight (ΔIs)</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="uncertSensitivityWeightDelta" placeholder="Standard Uncertainty of u(ΔIs)">
                                                    <label for="uncertSensitivityWeightDelta">Standard Uncertainty of u(ΔIs)</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="sensitivityWeight" placeholder="Mass of Sensitivity Weight">
                                                    <label for="sensitivityWeight">Mass of Sensitivity Weight</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="uncertSensitivityWeight" placeholder="Standard Uncertainty of Sensitivity Weight">
                                                    <label for="uncertSensitivityWeight">Standard Uncertainty of Sensitivity Weight</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="pooledValue" placeholder="Pooled Standard Deviation">
                                                    <label for="pooledValue">Pooled Standard Deviation</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="card" style="">
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td rowspan='2'>Number</td>
                                                            <td>
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control" id="nominalValueEmpty" placeholder="Nominal Value (for EMPTY)">
                                                                    <label for="nominalValueEmpty">Nominal Value (for EMPTY)</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control" id="nominalValueFullLoad" placeholder="Nominal Value (for FULL LOAD)">
                                                                    <label for="nominalValueFullLoad">Nominal Value (for FULL LOAD)</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Empty + ∆m</td>
                                                            <td>Full Load + ∆m</td>
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
                                                            <td>Standard Deviation</td>
                                                            <td><input type="text" class="form-control" name="emptySD" id="emptySD"></td>
                                                            <td><input type="text" class="form-control" name="fullSD" id="fullSD"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Balance</h5>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalMeasurement">Measurement Data</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action='/standard/balance/updateBalance' method="POST" id='updateForm' name='updateForm'>
                        <fieldset>
                            <input type="hidden" name="standardID" id="standardID" >
                            <input type="hidden" name="measurements" id="measurements">

                            <div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <div class="card" style="">
                                            <div class="card-body">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="descriptionEdit" placeholder="Standard Description">
                                                    <label for="descriptionEdit">Standard Description</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="serialNumberEdit" placeholder="Serial Number">
                                                    <label for="serialNumberEdit">Serial Number</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="certificateNumberEdit" placeholder="Certificate Number">
                                                    <label for="certificateNumberEdit">Certificate Number</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="providerEdit" placeholder="Provider">
                                                    <label for="providerEdit">Provider</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="date" class="form-control" id="dateCalibratedEdit" placeholder="Date Of Calibration">
                                                    <label for="dateCalibratedEdit">Date Of Calibration</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="card" style="">
                                            <div class="card-body">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="resolutionEdit" placeholder="Resolution">
                                                    <label for="resolutionEdit">Resolution</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="resolution2Edit" placeholder="Resolution">
                                                    <label for="resolution2Edit">Resolution 2</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="conditionResolutionEdit" placeholder="Resolution">
                                                    <label for="conditionResolutionEdit">Condition for Resolution 2 (Test Point > Conditon = Resolution 2)</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="tempCoefficientEdit" placeholder="Temperature Coefficient of Sensitivity">
                                                    <label for="tempCoefficientEdit">Temperature Coefficient of Sensitivity</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="uncertaintyEdit" placeholder="Uncertainty">
                                                    <label for="uncertaintyEdit">Uncertainty</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="coverageFactorEdit" placeholder="Coverage Factor">
                                                    <label for="coverageFactorEdit">Coverage Factor</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="card" style="">
                                            <div class="card-body">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="sensitivityWeightDeltaEdit" placeholder="Change in the indication of the balance due to sensitivity weight (ΔIs)">
                                                    <label for="sensitivityWeightDeltaEdit">Change in the indication of the balance due to sensitivity weight (ΔIs)</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="uncertSensitivityWeightDeltaEdit" placeholder="Standard Uncertainty of u(ΔIs)">
                                                    <label for="uncertSensitivityWeightDeltaEdit">Standard Uncertainty of u(ΔIs)</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="sensitivityWeightEdit" placeholder="Mass of Sensitivity Weight">
                                                    <label for="sensitivityWeightEdit">Mass of Sensitivity Weight</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="uncertSensitivityWeightEdit" placeholder="Standard Uncertainty of Sensitivity Weight">
                                                    <label for="uncertSensitivityWeightEdit">Standard Uncertainty of Sensitivity Weight</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="pooledValueEdit" placeholder="Pooled Standard Deviation">
                                                    <label for="pooledValueEdit">Pooled Standard Deviation</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="card" style="">
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td rowspan='2'>Number</td>
                                                            <td>
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control" id="nominalValueEmptyEdit" placeholder="Nominal Value (for EMPTY)">
                                                                    <label for="nominalValueEmptyEdit">Nominal Value (for EMPTY)</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control" id="nominalValueFullLoadEdit" placeholder="Nominal Value (for FULL LOAD)">
                                                                    <label for="nominalValueFullLoadEdit">Nominal Value (for FULL LOAD)</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Empty + ∆m</td>
                                                            <td>Full Load + ∆m</td>
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
                                                            <td><input type="text" class="form-control" name="empty5Edit" id="empty5Edit" onkeyup="stDev('empty');addValuesToDeltaEdit()"></td>
                                                            <td><input type="text" class="form-control" name="full5Edit" id="full5Edit" onkeyup="stDev('full');addValuesToDeltaEdit()"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Standard Deviation</td>
                                                            <td><input type="text" class="form-control" name="emptySDEdit" id="emptySDEdit"></td>
                                                            <td><input type="text" class="form-control" name="fullSDEdit" id="fullSDEdit"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
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
                                        <th>Nominal Load</th>
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

        let emptyDeltaI = convertToFloat($('#nominalValueEmpty').val()) - averageEmpty;
        let fullDeltaI = convertToFloat($('#nominalValueFullLoad').val()) - averageFull;

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

        let emptyDeltaI = convertToFloat($('#nominalValueEmptyEdit').val()) - averageEmpty;
        let fullDeltaI = convertToFloat($('#nominalValueFullLoadEdit').val()) - averageFull;

        $('#sensitivityWeightDeltaEdit').val(emptySD>fullSD?emptyDeltaI:fullDeltaI);
        $('#uncertSensitivityWeightDeltaEdit').val(emptySD>fullSD?(emptySD/Math.sqrt(5)):(fullSD/(Math.sqrt(5))));
	}
    function addMeasurementsToInput(){
        let countOfRows = $('#measurementDIVTableTbody').children().length;
        let ids = ['measurementNumber','nominalLoad', 'testLoad', 'indication', 'error', 'uncertaintyMeasurement'];
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
        let ids = ['measurementNumber', 'nominalLoad', 'testLoad', 'indication', 'error', 'uncertaintyMeasurement'];
        for (var i = 0; i < ids.length; i++) {
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
    function updateMeasurements(){
        addMeasurementsToInput()
        let standardID = $('#standardID').val();
        let measurements = $('#measurements').val()

        $.ajax({
            cache: false,
            type: "post",
            url: "/standard/balance/updateMeasurementsBalance",
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
        let description = $('#description');
        let serialNumber = $('#serialNumber');
        let certificateNumber = $('#certificateNumber');
        let provider = $('#provider');
        let dateCalibrated = $('#dateCalibrated');
        let resolution = $('#resolution');

        let resolution2 = $('#resolution2');
        let conditionResolution = $('#conditionResolution');
        
        let tempCoefficient = $('#tempCoefficient');
        let uncertainty = $('#uncertainty');
        let coverageFactor = $('#coverageFactor');
        let sensitivityWeightDelta = $('#sensitivityWeightDelta');
        let uncertSensitivityWeightDelta = $('#uncertSensitivityWeightDelta');
        let sensitivityWeight = $('#sensitivityWeight');
        let uncertSensitivityWeight = $('#uncertSensitivityWeight');
        let pooledValue = $('#pooledValue');

        let nominalValueEmpty = $('#nominalValueEmpty');
        let nominalValueFullLoad = $('#nominalValueFullLoad');
        let empty1 = $('#empty1');
        let full1 = $('#full1');
        let empty2 = $('#empty2');
        let full2 = $('#full2');
        let empty3 = $('#empty3');
        let full3 = $('#full3');
        let empty4 = $('#empty4');
        let full4 = $('#full4');
        let empty5 = $('#empty5');
        let full5 = $('#full5');
        let emptySD = $('#emptySD');
        let fullSD = $('#fullSD');
        let sdValues = {
            "nominalValueEmpty": nominalValueEmpty.val(),
            "nominalValueFullLoad": nominalValueFullLoad.val(),
            "empty1": empty1.val(),
            "full1": full1.val(),
            "empty2": empty2.val(),
            "full2": full2.val(),
            "empty3": empty3.val(),
            "full3": full3.val(),
            "empty4": empty4.val(),
            "full4": full4.val(),
            "empty5": empty5.val(),
            "full5": full5.val(),
            "emptySD": emptySD.val(),
            "fullSD": fullSD.val(),
        }

        $.ajax({
            cache: false,
            type: "post",
            url: "/standard/balance/addBalance",
            data: {
                'description': description.val(),
                'serialNumber': serialNumber.val(),
                'certificateNumber': certificateNumber.val(),
                'provider': provider.val(),
                'dateCalibrated': dateCalibrated.val(),
                'resolution': resolution.val(),
                'resolution2': resolution2.val(),
                'conditionForResolution': conditionResolution.val(),
                'tempCoefficient': tempCoefficient.val(),
                'uncertainty': uncertainty.val(),
                'coverageFactor': coverageFactor.val(),
                'sensitivityWeightDelta': sensitivityWeightDelta.val(),
                'uncertSensitivityWeightDelta': uncertSensitivityWeightDelta.val(),
                'sensitivityWeight': sensitivityWeight.val(),
                'uncertSensitivityWeight': uncertSensitivityWeight.val(),
                'pooledValue': pooledValue.val(),
                'sdValues': JSON.stringify(sdValues),
            },
        })
        .done(function(result){
            getStandardData();               
            console.log(result)
            description.val('')
            serialNumber.val('')
            certificateNumber.val('')
            provider.val('')
            dateCalibrated.val('')
            resolution.val('')
            resolution2.val('')
            conditionResolution.val('')
            tempCoefficient.val('')
            uncertainty.val('')
            coverageFactor.val('')
            sensitivityWeightDelta.val('')
            uncertSensitivityWeightDelta.val('')
            sensitivityWeight.val('')
            uncertSensitivityWeight.val('')
            pooledValue.val('')
            nominalValueEmpty.val('')
            nominalValueFullLoad.val('')
            empty1.val('')
            full1.val('')
            empty2.val('')
            full2.val('')
            empty3.val('')
            full3.val('')
            empty4.val('')
            full4.val('')
            empty5.val('')
            full5.val('')
            emptySD.val('')
            fullSD.val('')
        })
        .fail(function(error){
            console.log(error);
            alert("Unable to add to database");
        })
    }

    function updateStandard(){
        let standardID = $('#standardID');
        let description = $('#descriptionEdit');
        let serialNumber = $('#serialNumberEdit');
        let certificateNumber = $('#certificateNumberEdit');
        let provider = $('#providerEdit');
        let dateCalibrated = $('#dateCalibratedEdit');
        let resolution = $('#resolutionEdit');
        let resolution2 = $('#resolution2Edit');
        let conditionResolution = $('#conditionResolutionEdit');

        let tempCoefficient = $('#tempCoefficientEdit');
        let uncertainty = $('#uncertaintyEdit');
        let coverageFactor = $('#coverageFactorEdit');
        let sensitivityWeightDelta = $('#sensitivityWeightDeltaEdit');
        let uncertSensitivityWeightDelta = $('#uncertSensitivityWeightDeltaEdit');
        let sensitivityWeight = $('#sensitivityWeightEdit');
        let uncertSensitivityWeight = $('#uncertSensitivityWeightEdit');
        let pooledValue = $('#pooledValueEdit');

        let nominalValueEmpty = $('#nominalValueEmptyEdit');
        let nominalValueFullLoad = $('#nominalValueFullLoadEdit');
        let empty1 = $('#empty1Edit');
        let full1 = $('#full1Edit');
        let empty2 = $('#empty2Edit');
        let full2 = $('#full2Edit');
        let empty3 = $('#empty3Edit');
        let full3 = $('#full3Edit');
        let empty4 = $('#empty4Edit');
        let full4 = $('#full4Edit');
        let empty5 = $('#empty5Edit');
        let full5 = $('#full5Edit');
        let emptySD = $('#emptySDEdit');
        let fullSD = $('#fullSDEdit');
        let sdValues = {
            "nominalValueEmpty": nominalValueEmpty.val(),
            "nominalValueFullLoad": nominalValueFullLoad.val(),
            "empty1": empty1.val(),
            "full1": full1.val(),
            "empty2": empty2.val(),
            "full2": full2.val(),
            "empty3": empty3.val(),
            "full3": full3.val(),
            "empty4": empty4.val(),
            "full4": full4.val(),
            "empty5": empty5.val(),
            "full5": full5.val(),
            "emptySD": emptySD.val(),
            "fullSD": fullSD.val(),
        }

        $.ajax({
            cache: false,
            type: "post",
            url: "/standard/balance/updateBalance",
            data: {
                'standardID':standardID.val(),
                'description': description.val(),
                'serialNumber': serialNumber.val(),
                'certificateNumber': certificateNumber.val(),
                'provider': provider.val(),
                'dateCalibrated': dateCalibrated.val(),
                'resolution': resolution.val(),
                'resolution2': resolution2.val(),
                'conditionForResolution': conditionResolution.val(),
                'tempCoefficient': tempCoefficient.val(),
                'uncertainty': uncertainty.val(),
                'coverageFactor': coverageFactor.val(),
                'sensitivityWeightDelta': sensitivityWeightDelta.val(),
                'uncertSensitivityWeightDelta': uncertSensitivityWeightDelta.val(),
                'sensitivityWeight': sensitivityWeight.val(),
                'uncertSensitivityWeight': uncertSensitivityWeight.val(),
                'pooledValue': pooledValue.val(),
                'sdValues': JSON.stringify(sdValues),
            },
        })
        .done(function(result){
            getStandardData();               
            console.log(result)
            standardID.val('')
            description.val('')
            serialNumber.val('')
            certificateNumber.val('')
            provider.val('')
            dateCalibrated.val('')
            resolution.val('')
            resolution2.val('')
            conditionResolution.val('')
            tempCoefficient.val('')
            uncertainty.val('')
            coverageFactor.val('')
            sensitivityWeightDelta.val('')
            uncertSensitivityWeightDelta.val('')
            sensitivityWeight.val('')
            uncertSensitivityWeight.val('')
            pooledValue.val('')
            nominalValueEmpty.val('')
            nominalValueFullLoad.val('')
            empty1.val('')
            full1.val('')
            empty2.val('')
            full2.val('')
            empty3.val('')
            full3.val('')
            empty4.val('')
            full4.val('')
            empty5.val('')
            full5.val('')
            emptySD.val('')
            fullSD.val('')
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
            url: "/standard/balance/removeStandard",
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
        let today = new Date();
        standardData.forEach((item, index) => {
            let suffix = 'days left before due date';
            let date_next_calibration = today;
            let dateCalibrated = item.dateCalibrated;
            if(dateCalibrated != ''){
                date_next_calibration = new Date(item.dateCalibrated)
                date_next_calibration.setFullYear(date_next_calibration.getFullYear() + 1);
            }
            let days_due = Math.round(Math.abs((today - date_next_calibration) / (24 * 60 * 60 * 1000)));

            let standardID = item.id;

            let tr = $('<tr>');
            if(today > date_next_calibration){
                tr.attr('style', 'background-color: rgba(255, 0, 0, 0.4)')
                suffix = 'days over due date';
            }else if(today < date_next_calibration){
                tr.attr('style', 'background-color: rgba(0, 255, 0, 0.4)')
            }

           
            let idTd = $('<td>', {
                'class': 'd-none',
                'html': standardID,
            });
            let descriptionTD =$('<td>').html(item.description)
            let serialNumberTD =$('<td>').html(item.serialNumber)
            let daysDue =$('<td>').html(days_due + ' ' + suffix)

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
                descriptionTD,
                serialNumberTD,
                daysDue,
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
            url: "/standard/balance/getStandardDataBalance",
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
            url: "/standard/balance/getStandardValuesBalanceByDetailsID",
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
        $("#descriptionEdit").val(selectedStandardData['description'])
        $("#serialNumberEdit").val(selectedStandardData['serialNumber'])
        
        $('#descriptionEdit').val(selectedStandardData['description'])
        $('#serialNumberEdit').val(selectedStandardData['serialNumber'])
        $('#certificateNumberEdit').val(selectedStandardData['certificateNumber'])
        $('#providerEdit').val(selectedStandardData['provider'])
        $('#dateCalibratedEdit').val(selectedStandardData['dateCalibrated'])
        $('#resolutionEdit').val(selectedStandardData['resolution'])
        $('#resolution2Edit').val(selectedStandardData['resolution2'])
        $('#conditionResolutionEdit').val(selectedStandardData['conditionForResolution'])
        

        $('#tempCoefficientEdit').val(selectedStandardData['tempCoefficient'])
        $('#uncertaintyEdit').val(selectedStandardData['uncertainty'])
        $('#coverageFactorEdit').val(selectedStandardData['coverageFactor'])
        $('#sensitivityWeightDeltaEdit').val(selectedStandardData['sensitivityWeightDelta'])
        $('#uncertSensitivityWeightDeltaEdit').val(selectedStandardData['uncertSensitivityWeightDelta'])
        $('#sensitivityWeightEdit').val(selectedStandardData['sensitivityWeight'])
        $('#uncertSensitivityWeightEdit').val(selectedStandardData['uncertSensitivityWeight'])
        $('#pooledValueEdit').val(selectedStandardData['pooledValue'])

        let sdValues = JSON.parse(selectedStandardData['sdValues'])
        Object.keys(sdValues).forEach(items=>{
            let idEdit = items + "Edit";
            $('#'+idEdit).val(sdValues[items])
        })

        let haveMeasurements = selectedStandardData['measurements'] != null && selectedStandardData['measurements'] != '[]';
        console.log(haveMeasurements)
        if(haveMeasurements){
            $('#measurementDIVTableTbody').text('');
            const idsForMeasurement = ['measurementNumber', 'nominalLoad', 'testLoad', 'indication', 'error', 'uncertaintyMeasurement'];
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