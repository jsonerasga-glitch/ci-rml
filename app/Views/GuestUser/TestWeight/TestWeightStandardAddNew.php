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
	<form action="guestTestWeightStandardTableAddNewDetails" method="POST">
		<div class="card mt-5 shadow-lg p-3 mb-5 bg-white rounded">
			<div class="card-header">
				<h3>Adding New Standard</h3>
			</div>
			<div class="card-body">
				<div class="col">
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">Description</span>
						<input type="text" class="form-control" id="description" name="description" placeholder="Description" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">Manufacturer</span>
						<input type="text" class="form-control" id="manufacturer" name="manufacturer" placeholder="Manufacturer" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">Type</span>
						<input type="text" class="form-control" id="type" name="type" placeholder="type" aria-label="Username" aria-describedby="basic-addon1">
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">Class</span>
						<input type="text" class="form-control" id="class" name="class" placeholder="class" aria-label="Username" aria-describedby="basic-addon1">
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">Previous Air Density</span>
						<input type="text" class="form-control" id="prevAirDensity" name="prevAirDensity" placeholder="Previous Air Density" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">Serial Number</span>
						<input type="text" class="form-control" id="serialNumber" name="serialNumber" placeholder="Serial Number" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">Certificate Number</span>
						<input type="text" class="form-control" id="certificateNumber" name="certificateNumber" placeholder="Certificate Number" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">Date Of Calibration</span>
						<input type="date" class="form-control" id="dateOfCali" name="dateOfCali" placeholder="Date Of Calibration" aria-label="Username" aria-describedby="basic-addon1">
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">Issuing Laboratory</span>
						<input type="text" class="form-control" id="dateOfCali" name="calibrationProvider" placeholder="Calibration Provider" aria-label="Username" aria-describedby="basic-addon1">
					</div>
					<div class="row">
						<div class="text-left col-6">
							<button type="submit" class="btn btn-success"><i class="far fa-plus-square"></i> Add Standard Description</button>
						</div>
						<div class="text-right col-6">
							<a href="guestTestWeightStandardTable" class="btn btn-danger"><i class="fas fa-door-open"></i> Back</a>
						</div>

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
