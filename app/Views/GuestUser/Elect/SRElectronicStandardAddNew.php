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
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=0.6, user-scalable=no ">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <!--FONTAWESOME CDN-->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
     <!--FONTAWESOME CDN-->
</head>

<style>
	input[type="text"]{
		height: 50px;
	}
	input[type="date"]{
		height: 50px;
	}
</style>

<body  style="margin: 0; padding: 0; font-family: Calibri; font-size: 14px; background-color:#faf7f0;">
<div class="container">
	<br> <br>
	<form action="guestElectStandardAddNewDetails" method="POST" style="top: 50%;">
		<div class="card mt-5 shadow-lg p-3 mb-5 bg-white rounded col-xl-10 mx-auto">
			<div class="mx-auto d-flex justify-content-center mt-2 text-center">
				<h4>New Single Range Electronic Balance Standard</h4>	
			
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-xl-6 col-12 mb-3">
						<label>Description</label>
						<input type="text" class="form-control mt-n2" id="description" name="description" placeholder="Description" aria-label="Username" aria-describedby="basic-addon1" required>
					</div>

					<div class="col-xl-6 col-12 mb-3">
						<label>Manufacturer</label>
						<input type="text" class="form-control mt-n2" id="manufacturer" name="manufacturer" placeholder="Manufacturer" aria-label="Username" aria-describedby="basic-addon1" required>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-6 col-12 mb-3">
						<label>Type</label>
						<input type="text" class="form-control mt-n2" id="type" name="type" placeholder="type" aria-label="Username" aria-describedby="basic-addon1" required>
					</div>

					<div class="col-xl-6 col-12 mb-3">
						<label>Class</label>
						<input type="text" class="form-control mt-n2" id="class" name="class" placeholder="class" aria-label="Username" aria-describedby="basic-addon1" required>
					</div>
				</div>

				<div class="row">
					<div class="col-xl-6 col-12 mb-3">
						<label>Previous Air Density</label>
						<input type="text" class="form-control mt-n2" id="prevAirDensity" name="prevAirDensity" placeholder="Previous Air Density" aria-label="Username" aria-describedby="basic-addon1" required>
					</div>
					<div class="col-xl-6 col-12 mb-3">
						<label>Serial Number</label>
						<input type="text" class="form-control mt-n2" id="serialNumber" name="serialNumber" placeholder="Serial Number" aria-label="Username" aria-describedby="basic-addon1" required>
					</div>
					<?= "<strong> ".\Config\Services::validation()->listErrors()."</strong>"; ?>	
			

					<div class="col-xl-6 col-12 mb-3">
						<label>Certificate Number</label>
						<input type="text" class="form-control mt-n2" id="certificateNumber" name="certificateNumber" placeholder="Certificate Number" aria-label="Username" aria-describedby="basic-addon1" required>
					</div>
				</div>
				
				<div class="row">
					<div class="col-xl-6 col-12 mb-3">
						<label>Date Of Calibration</label>
						<input type="date" class="form-control mt-n2" id="dateOfCali" name="dateOfCali" placeholder="Date Of Calibration" aria-label="Username" aria-describedby="basic-addon1" required>
					</div>
					<div class="col-xl-6 col-12 mb-3">
						<label>Calibration Provider</label>
						<input type="text" class="form-control mt-n2" id="dateOfCali" name="calibrationProvider" placeholder="Calibration Provider" aria-label="Username" aria-describedby="basic-addon1" required>
					</div>
				</div>
				
				<div class="row mt-3">
						<div class="text-left col-6">
							<button type="submit" class="btn btn-success btn-lg"><i class="far fa-plus-square"></i> Insert New Standard</button>
						</div>
						<div class="text-right col-6">
							<a href="guestElectStandard" class="btn btn-danger btn-lg"><i class="fas fa-door-open"></i> Back</a>
						</div>

					</div>

			</div>
		</div>					
	</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

</body>
</html>




<!-- 

name of inputs

certificateNumber
customer
address
dateReceived
dateCalibrated
recommendedDueDate
placeOfCalibration
equipmentDescription
manufacturer
modelNumber
serialNumber
equipmentID
maxCapacity
maxCapacityMeasurement
minCapacity
minCapacityMeasurement
readability
readabilityMeasurement
startTemp
endTemp
aveTemp
startRh
endRh
AveRh
weights
preliminaryInspection
repeat1
repeat2
repeat3
repeat4
repeat5
repeat6
repeat7
repeat8
repeat9
repeat10
stDev
remarksA
remarksB
remarksC
remarksD
remarksE
remarksF
calibratedBy
encodedBy
checkedby
-->
