<?php
    $path = 'image/dost.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>
<?php
    $pathPAB = 'image/pab logo.png';
    $typePAB = pathinfo($pathPAB, PATHINFO_EXTENSION);
    $dataPAB = file_get_contents($pathPAB);
    $base64PAB = 'data:image/' . $typePAB . ';base64,' . base64_encode($dataPAB);
?>
<?php
    $pathIllusA = 'image/SREBillustrationA.png';
    $typeIllusA = pathinfo($pathIllusA, PATHINFO_EXTENSION);
    $dataIllusA = file_get_contents($pathIllusA);
    $base64IllusA = 'data:image/' . $typeIllusA . ';base64,' . base64_encode($dataIllusA);
?>
<?php
    $pathIllusB = 'image/SREBillustrationB.png';
    $typeIllusB = pathinfo($pathIllusB, PATHINFO_EXTENSION);
    $dataIllusB = file_get_contents($pathIllusB);
    $base64IllusB = 'data:image/' . $typeIllusB . ';base64,' . base64_encode($dataIllusB);
?>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <!--FONTAWESOME CDN-->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
     <!--FONTAWESOME CDN-->
</head>
<body  style="background-color: #D0D3D4;">
<div class="container">
	<form action="guestTestWeightSensitivityTestAddValue" method="POST">
		<div class="card mt-5 shadow-lg p-3 mb-5 bg-white rounded">
			<div class="card-header">
				<h3>Adding Sensitivity Test</h3>
			</div>
			<div class="card-body">
						<table class="table">
							<thead>
								<tr>
									<th>Sensitivity Test : </th>
									<th colspan="2"><input type="text" class="form-control" name="balance"></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>No.</td>
									<td>Empty + ∆m</td>
									<td>Full Load + ∆m</td>
								</tr>
								<tr>
									<td>1</td>
									<td><input type="text" class="form-control" name="empty1" id="empty1" ></td>
									<td><input type="text" class="form-control" name="full1" id="full1" ></td>
								</tr>
								<tr>
									<td>2</td>
									<td><input type="text" class="form-control" name="empty2" id="empty2" ></td>
									<td><input type="text" class="form-control" name="full2" id="full2"></td>
								</tr>
								<tr>
									<td>3</td>
									<td><input type="text" class="form-control" name="empty3" id="empty3"></td>
									<td><input type="text" class="form-control" name="full3" id="full3" ></td>
								</tr>
								<tr>
									<td>4</td>
									<td><input type="text" class="form-control" name="empty4" id="empty4"></td>
									<td><input type="text" class="form-control" name="full4" id="full4" ></td>
								</tr>
								<tr>
									<td>5</td>
									<td><input type="text" class="form-control" name="empty5" id="empty5" onkeyup="stDev('empty')"></td>
									<td><input type="text" class="form-control" name="full5" id="full5"onkeyup="stDev('full')"></td>
								</tr>
								<tr>
									<td>Standard Deviation (SD)</td>
									<td><input type="text" class="form-control" name="emptySD" id="emptySD"></td>
									<td><input type="text" class="form-control" name="fullSD" id="fullSD"></td>
								</tr>
								<tr>
									<td> </td>
									<td></td>
									<td> </td>
								</tr>
								
								<tr>
									<td>change in the indication of the balance due to sensitivity weight (ΔIs)</td>
									<td><input type="text" class="form-control" name="sensitivityWeightDelta" id="sensitivityWeight"></td>
									<td>at larger SD</td>
								</tr>
								<tr>
									<td>standard uncertainty of u(ΔIs)</td>
									<td><input type="text" class="form-control" name="uncertSensitivityWeightDelta" id="uncertSensitivityWeight"></td>
									<td> </td>
								</tr>
								<tr>
									<td>sensitivity weight ms</td>
									<td><input type="text" class="form-control" name="sensitivityWeight" id="sensitivityWeight"></td>
									<td>at larger SD</td>
								</tr>
								<tr>
									<td>standard uncertainty of the sensitivity weight u(ms)</td>
									<td><input type="text" class="form-control" name="uncertSensitivityWeight" id="uncertSensitivityWeight"></td>
									<td> </td>
								</tr>
								<tr>
									<td>smallest nominal</td>
									<td></td>
									<td> </td>
								</tr>
								<tr>
									<td colspan="2">tare,,then&nbsp;&nbsp;&nbsp;place the smallest nominal</td>
									<td> </td>
								</tr>
								<tr>
									<td>Date of Calibration</td>
									<td><input type="date" class="form-control" name="dateCalibrated" id="dateCalibrated" value=''></td>
								</tr>
								<tr>
									<td>Maximum</td>
									<td><input type="text" oninput="testWeightDifference()" class="form-control" name="maximumValue" id="maximumValue" value=''></td>
								</tr>
								<tr>
									<td>Minimum</td>
									<td><input type="text" oninput="testWeightDifference()" class="form-control" name="minimumValue" id="minimumValue" value=''></td>
								</tr>
								<tr>
									<td>Difference</td>
									<td><input readonly style="background-color: yellow;"  type="text" class="form-control" name="differenceValue" id="differenceValue" value=''></td>
								</tr>
							</tbody>
						</table>	
						<div class="row">
							<div class="text-left col-6">
								<button type="submit" class="btn btn-success"><i class="far fa-plus-square"></i> Add Sensitivity Test</button>
							</div>
							<div class="text-right col-6">
								<a href="guestTestWeightSensitivityTestTable" class="btn btn-danger"><i class="fas fa-door-open"></i> Back</a>
							</div>
						</div>					
				
			</div>
		</div>					
	</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jstat@1.9.2/dist/jstat.min.js"></script> 
<script src="https://cdn.jsdelivr.net/gh/formulajs/formulajs@2.5.0/dist/formula.min.js"></script>
<script>
	function stDev(mark){
		var emptyResult = 0;
		var fullResult = 0;
		var sensitivityWeight;
		if(mark == 'empty'){
			var data1 = parseFloat(document.getElementById('empty1').value);
			var data2 = parseFloat(document.getElementById('empty2').value);
			var data3 = parseFloat(document.getElementById('empty3').value);
			var data4 = parseFloat(document.getElementById('empty4').value);
			var data5 = parseFloat(document.getElementById('empty5').value);
			var result = formulajs.STDEVS([data1,data2,data3,data4,data5]);
			console.log('[data1,data2,data3,data4,data5] ', [data1,data2,data3,data4,data5]);
			emptyResult = result;
			document.getElementById('emptySD').value = result;
		}
		if(mark == 'full'){
			var data1 = parseFloat(document.getElementById('full1').value);
			var data2 = parseFloat(document.getElementById('full2').value);
			var data3 = parseFloat(document.getElementById('full3').value);
			var data4 = parseFloat(document.getElementById('full4').value);
			var data5 = parseFloat(document.getElementById('full5').value);
			var result = formulajs.STDEVS([data1,data2,data3,data4,data5]);
			fullResult = result;
			document.getElementById('fullSD').value = result;
		}

		if(emptyResult > fullResult){
			sensitivityWeight = emptyResult;
			document.getElementById('sensitivityWeight').value = emptyResult;
		}
		if(fullResult > emptyResult){
			sensitivityWeight = fullResult;
			document.getElementById('sensitivityWeight').value = fullResult;
		}

		document.getElementById('uncertSensitivityWeight').value = ((parseFloat(sensitivityWeight))/Math.sqrt(5))
	}

	
    function testWeightDifference(){
		var minTest = document.getElementById('minimumValue').value;
		var maxTest = document.getElementById('maximumValue').value;
		var diffTest = document.getElementById('differenceValue');
		var diffTestResult= parseFloat(maxTest)-parseFloat(minTest);
		diffTest.value = (diffTestResult);
		}
</script>
</body>
</html>
