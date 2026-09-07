<?php
    $path = 'image/dost.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    $pathPAB = 'image/pab logo.png';
    $typePAB = pathinfo($pathPAB, PATHINFO_EXTENSION);
    $dataPAB = file_get_contents($pathPAB);
    $base64PAB = 'data:image/' . $typePAB . ';base64,' . base64_encode($dataPAB);

    $pathIllusA = 'image/SREBillustrationA.png';
    $typeIllusA = pathinfo($pathIllusA, PATHINFO_EXTENSION);
    $dataIllusA = file_get_contents($pathIllusA);
    $base64IllusA = 'data:image/' . $typeIllusA . ';base64,' . base64_encode($dataIllusA);

    $pathIllusB = 'image/SREBillustrationB.png';
    $typeIllusB = pathinfo($pathIllusB, PATHINFO_EXTENSION);
    $dataIllusB = file_get_contents($pathIllusB);
    $base64IllusB = 'data:image/' . $typeIllusB . ';base64,' . base64_encode($dataIllusB);

    $pathicon7 = 'image/dashboard-images/person.png';
    $typeIcon7 = pathinfo($pathicon7, PATHINFO_EXTENSION);
    $dataIcon7 = file_get_contents($pathicon7);
    $base64Icon7 = 'data:image/' . $typeIcon7 . ';base64,' . base64_encode($dataIcon7);
    
    $pathicon5 = 'image/dashboard-images/male-user.png';
    $typeIcon5 = pathinfo($pathicon5, PATHINFO_EXTENSION);
    $dataIcon5 = file_get_contents($pathicon5);
    $base64Icon5 = 'data:image/' . $typeIcon5 . ';base64,' . base64_encode($dataIcon5);
?>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<!DOCTYPE html>
<style>
.modal4TempInRow tbody tr td input {
    width: auto;
}

.table td {
    vertical-align: middle !important;
    width: 10px;
}

input,
input::-webkit-input-placeholder {
    font-size: 12px;
    line-height: 3;
}

.fadeIn {
    -webkit-animation-name: fadeIn;
    animation-name: fadeIn;
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
    visibility: visible;
}

@-webkit-keyframes fadeIn {
    0% {
        opacity: 0;
    }

    100% {
        opacity: 1;
    }
}

@keyframes fadeIn {
    0% {
        opacity: 0;
    }

    100% {
        opacity: 1;
    }
}

.fadeOut {
    -webkit-animation-name: fadeOut;
    animation-name: fadeOut;
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
    /* visibility: collapse; */
    display: none;
}

@-webkit-keyframes fadeOut {
    0% {
        opacity: 1;
    }

    100% {
        opacity: 0;
    }
}

@keyframes fadeOut {
    0% {
        opacity: 1;
    }

    100% {
        opacity: 0;
    }
}

.list-group-flush>.list-group-item {
    border-width: 0 0 0px !important;
}

.list-group-item {
    padding: 0.1rem 2rem !important;
}

/* floating label */
/* .field {
  display: flex;
  flex-flow: column-reverse;
}
label, input {
  transition: all 0.2s;
  touch-action: manipulation;
}
input {
  font-size: 1em;
  border: 0;
  border-bottom: 1px solid #ccc;
  font-family: inherit;
  -webkit-appearance: none;
  border-radius: 0;
  padding: 0;
  cursor: text;
}

input:focus {
  outline: 0;
  border-bottom: 1px solid #666;
}

.field label {
  padding-left:5px;
  margin-bottom:1rem
}

input:placeholder-shown + label {
  cursor: text;
  max-width: 66.66%;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  transform-origin: left bottom;
  transform: translate(0, 2.125rem) scale(1.5);
}::-webkit-input-placeholder {
  opacity: 0;
  transition: inherit;
}
input:focus::-webkit-input-placeholder {
  opacity: 1;
}
input:not(:placeholder-shown) + label,
input:focus + label {
  transform: translate(0, 0) scale(1);
  cursor: pointer;
} */

.float {
    position: fixed;
    width: 60px;
    height: 60px;
    bottom: 40px;
    right: 40px;
    background-color: #0C9;
    color: #FFF;
    border-radius: 50px;
    text-align: center;
    box-shadow: 2px 2px 3px #999;
}
</style>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="">
    <meta name="author" content="Themepixels">

    <!-- Favicon -->
    <!-- <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png"> -->

    <title>RML ++</title>

    <link href="/dashboardAsset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="/dashboardAsset/lib/remixicon/fonts/remixicon.css" rel="stylesheet">

    <!-- Template CSS -->
    <link rel="stylesheet" href="/dashboardAsset/assets/css/style.min.css">
    <link href="/dashboardAsset/assets/css/notification.css" rel="stylesheet">

</head>

<body class="animate skin-dark">
    <?php
        $data = [
            'active' => 'standard6',
            'show' => 'standard',
        ];
    echo view('layouts/sidebarAdmin',$data)?>
    <div class="content " id="">

        <!-- Page Content -->


        <div class="content-body" style="background-color:#f9f9f9;">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <div class="page_title_left mt-2 mb-4">
                    <h4 class="">Test Weight Sensitivity Test</h4>
                </div>
            </div>
            <div class="container">
                <form action="<?= base_url('testWeightSensitivityTestUpdateInfo') ?>" method="post" name="formToUpdate" id="formToUpdate">
                    <input type="hidden" name="idTable2" value="<?= $snID['id']?>">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sensitivity Test : </th>
                                <th colspan="2"><input type="text" class="form-control" name="balance"
                                        value='<?= $TestWeightSensitivityTestModel['balance']?>'></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>No.</td>
                                <td>Empty + ∆m</td>
                                <td>Full Load + ∆m</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td><input type="text" class="form-control" name="empty1" id="empty1"
                                        value='<?= $TestWeightSensitivityTestModel['empty1']?>'></td>
                                <td><input type="text" class="form-control" name="full1" id="full1"
                                        value='<?= $TestWeightSensitivityTestModel['full1']?>'></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><input type="text" class="form-control" name="empty2" id="empty2"
                                        value='<?= $TestWeightSensitivityTestModel['empty2']?>'></td>
                                <td><input type="text" class="form-control" name="full2" id="full2"
                                        value='<?= $TestWeightSensitivityTestModel['full2']?>'></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><input type="text" class="form-control" name="empty3" id="empty3"
                                        value='<?= $TestWeightSensitivityTestModel['empty3']?>'></td>
                                <td><input type="text" class="form-control" name="full3" id="full3"
                                        value='<?= $TestWeightSensitivityTestModel['full3']?>'></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td><input type="text" class="form-control" name="empty4" id="empty4"
                                        value='<?= $TestWeightSensitivityTestModel['empty4']?>'></td>
                                <td><input type="text" class="form-control" name="full4" id="full4"
                                        value='<?= $TestWeightSensitivityTestModel['full4']?>'></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td><input type="text" class="form-control" name="empty5" id="empty5"
                                        value='<?= $TestWeightSensitivityTestModel['empty5']?>'
                                        onkeyup="stDev('empty')"></td>
                                <td><input type="text" class="form-control" name="full5" id="full5"
                                        value='<?= $TestWeightSensitivityTestModel['full5']?>' onkeyup="stDev('full')">
                                </td>
                            </tr>
                            <tr>
                                <td>Standard Deviation (SD)</td>
                                <td><input type="text" class="form-control" name="emptySD" id="emptySD"
                                        value='<?= $TestWeightSensitivityTestModel['emptySD']?>'></td>
                                <td><input type="text" class="form-control" name="fullSD" id="fullSD"
                                        value='<?= $TestWeightSensitivityTestModel['fullSD']?>'></td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td></td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td>change in the indication of the balance due to sensitivity weight (ΔIs)</td>
                                <td><input type="text" class="form-control" name="sensitivityWeightDelta"
                                        id="sensitivityWeightDelta"
                                        value='<?= $TestWeightSensitivityTestModel['sensitivityWeightDelta']?>'>
                                </td>
                                <td>at larger SD</td>
                            </tr>
                            <tr>
                                <td>standard uncertainty of u(ΔIs)</td>
                                <td><input type="text" class="form-control" name="uncertSensitivityWeightDelta"
                                        id="uncertSensitivityWeightDelta"
                                        value='<?= $TestWeightSensitivityTestModel['uncertSensitivityWeightDelta']?>'>
                                </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td>sensitivity weight ms</td>
                                <td><input type="text" class="form-control" name="sensitivityWeight"
                                        id="sensitivityWeight"
                                        value='<?= $TestWeightSensitivityTestModel['sensitivityWeight']?>'></td>
                            </tr>
                            <tr>
                                <td>standard uncertainty of the sensitivity weight u(ms)</td>
                                <td><input type="text" class="form-control" name="uncertSensitivityWeight"
                                        id="uncertSensitivityWeight"
                                        value='<?= $TestWeightSensitivityTestModel['uncertSensitivityWeight']?>'>
                                </td>
                            </tr>
                            <tr>
                                <td>Pooled Standard Deviation</td>
                                <td><input type="text" class="form-control" name="pooledValue" id="pooledValue"
                                        value='<?= $TestWeightSensitivityTestModel['pooledValue']?>'></td>
                            </tr>
                            <tr>
                                <td>Date of Calibration</td>
                                <td><input type="date" class="form-control" name="dateCalibrated" id="dateCalibrated"
                                        value='<?= $TestWeightSensitivityTestModel['dateCalibrated']?>'></td>
                            </tr>
                            <tr>
                                <td>Maximum</td>
                                <td><input type="text" oninput="testWeightDifference()" class="form-control"
                                        name="maximumValue" id="maximumValue"
                                        value='<?= $TestWeightSensitivityTestModel['maximumValue']?>'></td>
                            </tr>
                            <tr>
                                <td>Minimum</td>
                                <td><input type="text" oninput="testWeightDifference()" class="form-control"
                                        name="minimumValue" id="minimumValue"
                                        value='<?= $TestWeightSensitivityTestModel['minimumValue']?>'></td>
                            </tr>
                            <tr>
                                <td>Difference</td>
                                <td><input readonly style="background-color: yellow;" type="text" class="form-control"
                                        name="differenceValue" id="differenceValue"
                                        value='<?= $TestWeightSensitivityTestModel['differenceValue']?>'></td>
                            </tr>

                            <tr>
                                <td>smallest nominal</td>
                                <td></td>
                                <td> </td>
                            </tr>

                            <tr>
                                <td>
                                    <div>
                                        <p>Resolution</p><input style="" type="text" class="form-control"
                                            name="resolution1" id="resolution1"
                                            value='<?= $TestWeightSensitivityTestModel['resolution1']?>'>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <p>Condition (Sample Nominal value <= condition in grams=Resolution 2)</p>
                                                <input style="" type="text" class="form-control"
                                                    name="conditionForResolution" id="conditionForResolution"
                                                    value='<?= $TestWeightSensitivityTestModel['conditionForResolution']?>'>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <p>Resolution 2</p><input style="" type="text" class="form-control"
                                            name="resolution2" id="resolution2"
                                            value='<?= $TestWeightSensitivityTestModel['resolution2']?>'>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">tare,,then&nbsp;&nbsp;&nbsp;place the smallest nominal</td>
                                <td> </td>
                            </tr>
                        </tbody>
                    </table>
                    <input type="hidden" name="measurements" id="measurements" value=<?= $TestWeightSensitivityTestModel['measurements']?> >
                </form>
                <button type="button" class="btn btn-success mt-3" onclick="addRowToMeasurementTable()">ADD Measurements</button>
                <button type="button" class="btn btn-danger mt-3" onclick="deleteFromMeasurementTable()">REMOVE Measurements</button>

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
                <button type="button" class="btn btn-primary mb-3" onclick="updateValuesBySubmitingForm()">Update</button>
            </div>
        </div>
    </div>

    <!--Formula.js-->
    <script src="https://cdn.jsdelivr.net/npm/jstat@1.9.2/dist/jstat.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/formulajs/formulajs@2.5.0/dist/formula.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>


    <script src="/dashboardAsset/lib/jquery/jquery.min.js"></script>
    <script src="/dashboardAsset/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/dashboardAsset/lib/feathericons/feather.min.js"></script>
    <script src="/dashboardAsset/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script>
        function stDev(mark) {
            var emptyResult = <?= $TestWeightSensitivityTestModel['emptySD']?>;
            var fullResult = <?= $TestWeightSensitivityTestModel['fullSD']?>;
            var sensitivityWeightDelta;
            if (mark == 'empty') {
                var data1 = parseFloat(document.getElementById('empty1').value);
                var data2 = parseFloat(document.getElementById('empty2').value);
                var data3 = parseFloat(document.getElementById('empty3').value);
                var data4 = parseFloat(document.getElementById('empty4').value);
                var data5 = parseFloat(document.getElementById('empty5').value);
                var result = formulajs.STDEVS([data1, data2, data3, data4, data5]);
                console.log('[data1,data2,data3,data4,data5] ', [data1, data2, data3, data4, data5]);
                emptyResult = result;
                document.getElementById('emptySD').value = result;
            }
            if (mark == 'full') {
                var data1 = parseFloat(document.getElementById('full1').value);
                var data2 = parseFloat(document.getElementById('full2').value);
                var data3 = parseFloat(document.getElementById('full3').value);
                var data4 = parseFloat(document.getElementById('full4').value);
                var data5 = parseFloat(document.getElementById('full5').value);
                var result = formulajs.STDEVS([data1, data2, data3, data4, data5]);
                fullResult = result;
                document.getElementById('fullSD').value = result;
            }

            if (emptyResult > fullResult) {
                sensitivityWeightDelta = emptyResult;
                document.getElementById('sensitivityWeightDelta').value = emptyResult;
            }
            if (fullResult > emptyResult) {
                sensitivityWeightDelta = fullResult;
                document.getElementById('sensitivityWeightDelta').value = fullResult;
            }

            console.log('sensitivityWeightDelta ', sensitivityWeightDelta)
            document.getElementById('uncertSensitivityWeightDelta').value = ((parseFloat(sensitivityWeightDelta)) /
                Math.sqrt(5))
        }

        function testWeightDifference() {
            var minTest = document.getElementById('minimumValue').value;
            var maxTest = document.getElementById('maximumValue').value;
            var diffTest = document.getElementById('differenceValue');
            var diffTestResult = parseFloat(maxTest) - parseFloat(minTest);
            diffTest.value = (diffTestResult);
        }

        function addRowToMeasurementTable(){
            let countOfRows = $('#measurementDIVTableTbody').children().length + 1;
            let tr = $('<tr>');
            let ids = ['measurementNumber', 'testLoad', 'indication', 'error', 'uncertaintyMeasurement'];
            for (var i = 0; i < 5; i++) {
                let td = $('<td>');
                let input = $('<input>').attr('type', 'text').attr('class', 'form-control').attr('id',  ids[i]+ 'Row' + countOfRows);

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
            let formName = 'formToUpdate';
            addMeasurementsToInput();
            document.getElementById(formName).submit();
        }

        $( document ).ready(function() {
            let haveMeasurements = $('#measurements').val() != '';
            let ids = ['measurementNumber', 'testLoad', 'indication', 'error', 'uncertaintyMeasurement'];
            if(haveMeasurements){
                const measurementArray = JSON.parse($('#measurements').val());
                measurementArray.forEach((itemObject, index) => {
                    addRowToMeasurementTable()
                    let rowNumber = index + 1;
                    for (let x = 0; x < ids.length; x++) {
                        let measurementsInputsID = ids[x]+ 'Row' + rowNumber;
                        $('#'+measurementsInputsID).val(itemObject[ids[x]]);
                    }
                })
            }
        });

    </script>

    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        function logoutConfirmation(url) {
            // windows.confirm("are u sure?");
            href = ""
            var txt;
            if (confirm("Do you want to logout <?= session('name')?>?")) {
                location.href = url;
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>

</html>