<?php
use App\Models\ThermoStandardAddTestPointsModel;
use App\Models\ThermoStandardAddDriftModel;
use App\Models\ThermoStandardAddDriftPRTModel;



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
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RML ++</title>
    <link href="/dashboardAsset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/dashboardAsset/lib/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link href="/dashboardAsset/assets/css/style.min.css" rel="stylesheet">
    <link href="/css/jquery.dataTables.min.css" rel="stylesheet">

</head>  
<body class="skin-dark animate">
<?php
		$data = [
			'active' => 'standard3',
			'show' => 'standard',
		];
		echo view('layouts/sidebarAdmin',$data)?>

    <!-- Page Content -->
    <div class="content">
      <div class="content-header">
        <a id="contentMenu" href="#" class="content-menu d-none d-lg-flex"><i data-feather="menu"></i></a>
        <a id="mobileMenu" href="#" class="content-menu d-lg-none"><i data-feather="menu"></i></a>
      </div><!-- content-header -->
		<div class="content-body">
        	<div class="container ">
    		<div class="card shadow-sm">
			<form name="FormDelete" action="/thermoStandardDeleteTestPoint" method="post">
				<input type="hidden" name="selectedIDToDelete" id="selectedIDToDelete" >
				<input type="hidden" value="<?= $snID["id"]?>" name="snOfpage">
			</form>

			<form name="FormDeleteDrift" action="/thermoStandardDeleteDrift" method="post">
				<input type="hidden" name="selectedIDToDeleteDrift" id="selectedIDToDeleteDrift" >
				<input type="hidden" value="<?= $snID["id"]?>" name="snOfpageDrift">
			</form>
			<form action="<?= base_url('thermoStandardEditDetails') ?>" method="POST">
            <input type="hidden" value="<?php echo $thermostandardtable['id']?>" name="idTable2">
			<input type="hidden" value="<?php echo $thermostandardtable['serialNumber']?>" name="serialNumberTable">
			<div class="card shadow p-3">
				<div class="row">
					<div class="mb-3 col">
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-sm">Description:</span>
							</div>
							<input type="text"  name="standard" value="<?php echo $thermostandardtable['standard']?>" class="form-control">
						</div>
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-sm">Manufacturer:</span>
							</div>
							<input type="text"  name="manufacturer" value="<?php echo $thermostandardtable['manufacturer']?>" class="form-control">
						</div>
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-sm">Model No.:</span>
							</div>
							<input type="text"  name="modelNumber" value="<?php echo $thermostandardtable['modelNumber']?>" class="form-control">
						</div>
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-sm">Manufacturer:</span>
							</div>
							<input type="text"  name="manufacturer" value="<?php echo $thermostandardtable['manufacturer']?>" class="form-control">
						</div>
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-sm">Serial No.:</span>
							</div>
							<input type="text"  name="serialNumber" value="<?php echo $thermostandardtable['serialNumber']?>" class="form-control">
						</div>
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-sm">Current Calibration Cert. No.:</span>
							</div>
							<input type="text"  name="certificateNumber" value="<?php echo $thermostandardtable['certificateNumber']?>" class="form-control">
						</div>
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-sm">Coverage Factor</span>
							</div>
							<input type="text"  name="coverageFactor" value="<?php echo $thermostandardtable['coverageFactor']?>" class="form-control">
						</div>
						
					</div>
					<div class=" col">
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-sm">Date of Calibration:</span>
							</div>
							<input type="date"  name="dateOfCali" value="<?php echo $thermostandardtable['dateOfCali']?>" class="form-control">
						</div>
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-sm">Date of Next Calibration:</span>
							</div>
							<input type="date"  name="dateOfNextCali" value="<?php echo $thermostandardtable['dateOfNextCali']?>" class="form-control">
						</div>
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-sm">Standard Used:</span>
							</div>
							<input type="text"  name="standardUsed" value="<?php echo $thermostandardtable['standardUsed']?>" class="form-control">
							<i style="color: red;"><sub> (Will Display On The Certificate)</sub></i>
						</div>
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-sm">Standard Resolution Temperature:</span>
							</div>
							<input type="text"  name="stdResolutionTemp" value="<?php echo $thermostandardtable['stdResolutionTemp']?>" class="form-control">
						</div>
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-sm">Standard Resolution Relative Humidity:</span>
							</div>
							<input type="text"  name="stdResolutionRH" value="<?php echo $thermostandardtable['stdResolutionRH']?>" class="form-control">
						</div>
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-sm">Issuing Laboratory:</span>
							</div>
							<input type="text"  name="issuingLab" value="<?php echo $thermostandardtable['issuingLab']?>" class="form-control">
						</div>
						<a href="/thermoStandardTable" class="btn btn-danger float-right"><i data-feather="chevron-left"></i> Back</a>
						<button class="btn btn-secondary float-right" type="submit" id="button-addon1"><i data-feather="edit"></i>Update</button>
					</div>	
				</div>
			</form>
						
			<form id="addTestpointForm" action="<?= base_url('thermoStandardAddTestPoint') ?>" method="POST">		</div>			
	
			<input type="hidden" value="<?php echo $thermostandardtable['id']?>" name="idTable">		
			<table class="table table-sm shadow mt-2 table-bordered text-center" id="standardRows">
				<thead>
					<tr>
						<th >Test Point</th>
						<th >Unit</th>
						<th >RML</th>
						<th style="font-size:.9em">NML</th>
						<th >Correction</th>
						<th  style="font-size:.9em; text-align:center">Readout Standard Uncertainty from Certificate</th>
						<th style="font-size:.9em">Uncertainty</th>
						<th style="font-size:.9em">Previous RML</th>
						<th style="font-size:.9em">Drift (REMOVE VALUE IF NO DRIFT)</th>
						<th style="font-size:.9em">Coverage Factor</th>
						<th>Add</th>
					</tr>
				</thead>
				<tbody>
					<input type="hidden" name="serialNumber" value="<?php echo $thermostandardtable['serialNumber']?>">
					<tr>
						<td>						
							<input type="text" class="form-control" name='testPoint'>
						</td>
						<td>						
							<select  class="form-control" name='unit'>
								<option value="Temperature">Temperature</option>
								<option value="Relative Humidity">Humidity</option>
							</select>
						</td>
						<td>						
							<input name='RML' id='RML'  type="text" class="form-control" oninput='document.getElementById("correction").value = parseFloat(document.getElementById("NML").value)-parseFloat(this.value)' >
						</td>
						<td>						
							<input type="text" class="form-control"  name='NML' id='NML' oninput='document.getElementById("correction").value = parseFloat(this.value)-parseFloat(document.getElementById("RML").value)'>
						</td>
						<td>						
							<input name='correction' id='correction' type="text" class="form-control" >
						</td>
						<td>						
							<input type="text" class="form-control"  name='readoutStandardUncertaintyFromCertificate'>
						</td>
						<td>						
							<input name='uncertainty' type="text" class="form-control" >
						</td>

						<td>						
							<input name='prevRML' type="text" class="form-control" id='prevRMLADD'>
						</td>
						<td>						
							<input name='drift' type="text" class="form-control" id='driftADD'>
						</td>
						<td>						
							<input name='coverageFactor' type="text" class="form-control" >
						</td>
					
						<td>						
							<button type="submit" class="btn btn-primary" ><i data-feather="plus"></i></button>
							
						</td>
					</tr>
				</tbody>
			</table>
		</form>
	<form action="<?= base_url('thermoStandardAddDrift') ?>" method="POST">

		<input type="hidden" value="<?php echo $thermostandardtable['id']?>" name="idTable2">

		<table class="table table-sm shadow d-none" id="standardRows" style="
			<?php if(str_contains($thermostandardtable['standard'], 'PRT')||str_contains($thermostandardtable['standard'], 'P.R.T.')||str_contains($thermostandardtable['standard'], 'Platinum Resistance Thermometer with Digital Readout')){
						echo "display:none;";
					}
				?>">
			<thead>
				<tr>
					<th >Date Calibrated</th>
					<th >Unit</th>
					<th >Test Point</th>
					<th >Value</th>
					<th>Add</th>
				</tr>
			</thead>
			<tbody>
				<input type="hidden" name="serialNumber" value="<?php echo $thermostandardtable['serialNumber']?>">
				<tr>
					<td>						
						<input type="date" class="form-control" name='dateCalibrated'>
					</td>
					<td>						
						<select class="form-control" name="unit" >
							<option value="">Select Unit</option>
							<option value="Air Temperature">Air Temperature</option>
							<option value="Relative Humidity">Relative Humidity</option>
						</select>
					</td>
					<td>						
						<input type="text" class="form-control" name='testPoint'>
					</td>
					<td>						
						<input name='testPointValue' type="text" class="form-control" >
					</td>
								
					<td>						
						<button type="submit" class="btn btn-primary" ><i data-feather="plus"></i></button>
					</td>
				</tr>
			</tbody>
		</table>

	</form>

	<form action="<?= base_url('thermoStandardAddDriftPRT') ?>" method="POST">

		<input type="hidden" value="<?php echo $thermostandardtable['id']?>" name="idTable2">

		<table class="table table-sm mt-2 shadow d-none" id="standardRows" style="
			<?php if(str_contains($thermostandardtable['standard'], 'PRT') == false&&str_contains($thermostandardtable['standard'], 'P.R.T.') == false&&str_contains($thermostandardtable['standard'], 'Platinum Resistance Thermometer with Digital Readout') == false){
						echo "display:none;";
						
					}
				?>">
			<thead>
				<tr>
					<th >Test Point</th>
					<th >Previous Correction</th>
					<th >Current Correction</th>
					<th >Drift</th>
					<th>Add</th>
				</tr>
			</thead>
			<tbody>
				<input type="hidden" name="serialNumber" value="<?php echo $thermostandardtable['serialNumber']?>">
				<tr>
					<td>						
						<input type="text" class="form-control" name='testPoint'>
					</td>
					<td>						
						<input type="text" class="form-control" name='previousTest' id='editPrevTest' onkeyup="calculatePRTDriftEdit(document.getElementById('editCurTest').value)">
					</td>
					<td>						
						<input type="text" class="form-control" name='currentTest'  id='editCurTest' onkeyup="calculatePRTDriftEdit(this.value)">
					</td>
					<td>						
						<input type="text" class="form-control" name='drift' id="editDrift">
					</td>								
					<td>						
						<button type="submit" class="btn btn-primary" ><i data-feather="plus"></i></button>
					</td>
				</tr>
			</tbody>
		</table>

	</form>

	
	
		<table class="table table-sm table-bordered shadow text-center" id="standardRows">
			<thead>
				<tr>
					<th >Test Point</th>
					<th >Unit</th>
					<th >RML</th>
					<th style="font-size:.9em">NML</th>
					<th >Correction</th>
					<th  style="font-size:.9em; text-align:center">Readout Standard Uncertainty from Certificate</th>
					<th style="font-size:.9em">Uncertainty</th>
					<th style="font-size:.9em">Previous RML</th>
					<th style="font-size:.9em">Drift</th>
					<th style="font-size:.9em">Coverage Factor</th>
					<th>Edit|Delete</th>
				</tr>
			</thead>
			<tbody>
					<?php
					$rml = new ThermoStandardAddTestPointsModel();
					$arr[] = $rml->where('serialNumber', $thermostandardtable["serialNumber"])->findAll(); 
					$i = 0;	
					foreach($arr as $value){
						
						for ($i=0; $i < count($value); $i++) { 
					?>
				<tr>
					<td>						
					<?=  $value[$i]['testPoint'];?>
					</td>
					<td>						
					<?=  $value[$i]['unit'];?>
					</td>
					<td>						
					<?=  $value[$i]['RML'];?>
					</td>
					<td>						
					<?=  $value[$i]['NML'];?>
					</td>
					<td>						
					<?=  $value[$i]['correction'];?>
					</td>
					<td>						
					<?=  $value[$i]['readoutStandardUncertaintyFromCertificate'];?>
					</td>
					<td>						
					<?=  $value[$i]['uncertainty'];?>
					</td>
					<td>						
					<?=  $value[$i]['previousRML'];?>
					</td>
					<td>						
					<?=  $value[$i]['drift'];?>
					</td>
					<td>						
					<?=  $value[$i]['coverageFactor'];?>
					</td>
					<td>						
						<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="selectedStandard('<?=  $value[$i]['id'];?>','<?= $value[$i]['testPoint'];?>','<?=$value[$i]['unit'];?>','<?=$value[$i]['RML'];?>','<?=$value[$i]['NML'];?>','<?=$value[$i]['correction'];?>','<?=$value[$i]['readoutStandardUncertaintyFromCertificate'];?>','<?=$value[$i]['uncertainty'];?>','<?=$value[$i]['previousRML'];?>','<?=$value[$i]['drift'];?>','<?=$value[$i]['coverageFactor'];?>')"><i data-feather="edit"></i></button>
						<button type="button" onclick="toDelete(<?=  $value[$i]['id'];?>)" class="btn"><i data-feather="trash"></i></button>
					</td>
				</tr>	

					<?php
					}
							}
					?>
			</tbody>
		</table>
		
		<table class="table table-sm table-bordered text-center shadow mt-4 d-none" id="standardRows" style="
			<?php if(str_contains($thermostandardtable['standard'], 'PRT')||str_contains($thermostandardtable['standard'], 'P.R.T.')||str_contains($thermostandardtable['standard'], 'Platinum Resistance Thermometer with Digital Readout')){
					echo "display:none;";
				}
			?>">
			<thead>
				<tr>
					<th colspan='8' style="text-align:center">Drift (Air Temperature)</th>
				</tr>
				<tr>
					<th >Date Calibrated</th>
					<th >Test Point</th>
					<th >Value</th>
					<th >Unit</th>
					<th>Edit | Delete</th>
				</tr>
			</thead>
			<tbody id="bodyForDriftAirTemp">
				

				
		
			</tbody>
		</table>

		<table class="table table-sm table-bordered text-center shadow mt-4 d-none" id="standardRows" style="
			<?php if(str_contains($thermostandardtable['standard'], 'PRT')||str_contains($thermostandardtable['standard'], 'P.R.T.')||str_contains($thermostandardtable['standard'], 'Platinum Resistance Thermometer with Digital Readout')){
					echo "display:none;";
				}
			?>">
			<thead>
				<tr>
					<th colspan='8' style="text-align:center">Drift (Relative Humidity)</th>
				</tr>
				<tr>
					<th >Date Calibrated</th>
					<th >Test Point</th>
					<th >Value</th>
					<th >Unit</th>
					<th>Edit</th>
				</tr>
			</thead>
			<tbody id="bodyForDriftRelHum">
				

				
		
			</tbody>
		</table>

		<table class="table table-sm table-bordered text-center shadow d-none" id="standardRows" style="
			<?php if(str_contains($thermostandardtable['standard'], 'PRT') == false&&str_contains($thermostandardtable['standard'], 'P.R.T.') == false&&str_contains($thermostandardtable['standard'], 'Platinum Resistance Thermometer with Digital Readout') == false){
					echo "display:none;";
				}
			?>">
			<thead>
				<tr>
					<th colspan='8' style="text-align:center">Drift PRT</th>
				</tr>
				<tr>
					<th >Test Point</th>
					<th >Previous Correction</th>
					<th >Current Correction</th>
					<th >Drift</th>
					<th>Edit</th>
				</tr>
			</thead>
			<tbody id="bodyForDriftPRT">
				

				
		
			</tbody>
		</table>
		
	<!--Edit-->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Standard</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('thermoStandardEditValues/'.$i) ?>"  method="POST">
					
					
						<input type="hidden" value="<?= $snID["id"]?>" name="snID">
						<input type="hidden"  name="selectedID" id="selected">

						<table class="table " id="standardRows">
							<thead>
								<tr>
									<th >Test Point</th>
									<th >Unit</th>
									<th >RML</th>
									<th style="font-size:.9em">NML</th>
									<th >Correction</th>
									<th  style="font-size:.9em; text-align:center">Readout Standard Uncertainty from Certificate</th>
									<th style="font-size:.9em">Uncertainty</th>
									<th style="font-size:.9em">Previous RML</th>
									<th style="font-size:.9em">Drift </th>
									<th style="font-size:.9em">Coverage Factor</th>
									
									<th></th>
								</tr>
							</thead>
							<tbody>
								<input type="hidden" name="serialNumber" value="<?php echo $thermostandardtable['serialNumber']?>">
								
								

								<tr>
									<td>						
										<input type="text" class="form-control" name='testPoint' id="editTestPoint" >
									</td>
									<td>						
										<input type="text" class="form-control" name='unit' id="editUnit" >
									</td>
									<td>						
										<input name='rml'  type="text" class="form-control" id="editRML" oninput='document.getElementById("editCorrection").value = parseFloat(document.getElementById("editNML").value)-parseFloat(this.value)'>
									</td>
									<td>						
										<input type="text" class="form-control"  name='nml' id="editNML" oninput='document.getElementById("editCorrection").value = parseFloat(this.value)-parseFloat(document.getElementById("editRML").value)'>
									</td>
									<td>						
										<input name='correction' type="text" class="form-control" id="editCorrection">
									</td>
									<td>						
										<input type="text" class="form-control"  name='readOut' id="editReadOut">
									</td>
									<td>						
										<input name='uncert' type="text" class="form-control" id="editUncert">
									</td>

									<td>						
										<input name='prevRML' type="text" class="form-control" id="editPrevRML">
									</td>
									<td>						
										<input name='drift' type="text" class="form-control" id="editDriftABS">
									</td>
									<td>						
										<input name='coverageFactor' type="text" class="form-control" id="editCoverageFactor">
									</td>
								
									
								</tr>
							</tbody>
						</table>

					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
				</form>
				</div>
			</div>
		</div>
	<!--Edit-->

	<!--Edit Drift-->
		<div class="modal fade" id="exampleModalDrift" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Standard</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('thermoStandardEditDrift/'.$i) ?>"  method="POST">
					
					
						<input type="hidden" value="<?= $snID["id"]?>" name="snID">
						<input type="hidden"  name="selectedID" id="editSelectedDrift">

						<table class="table " id="standardRows">
							<thead>
								<tr>
									<th >Date Calibrated</th>
									<th >Unit</th>
									<th >Test Point</th>
									<th >Value</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<input type="hidden" name="serialNumber" value="<?php echo $thermostandardtable['serialNumber']?>">
								<tr>
									<td>						
										<input type="date" class="form-control" name='dateCali' id="editDateCaliDrift" >
									</td>
									<td>						
										<input type="text" class="form-control" name='unit' id="editUnitDrift" >
									</td>
									<td>						
										<input name='testpoint'  type="text" class="form-control" id="editTestPointDrift">
									</td>
									<td>						
										<input type="text" class="form-control"  name='value' id="editValueDrift">
									</td>								
								</tr>
							</tbody>
						</table>

					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
				</form>
				</div>
			</div>
		</div>
	<!--Edit Drift-->

	<!--Edit Drift PRT-->
		<div class="modal fade" id="exampleModalPRT" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Standard</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('thermoStandardEditDriftPRT/'.$i) ?>"  method="POST">
					
					
						<input type="hidden" value="<?= $snID["id"]?>" name="snID">
						<input type="hidden"  name="selectedID" id="selectedPRT">

						<table class="table " id="standardRows">
							<thead>
								<tr>
									<th >Test Point</th>
									<th >Previous Correction</th>
									<th >Current Correction</th>
									<th >Drift</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<input type="hidden" name="serialNumber" value="<?php echo $thermostandardtable['serialNumber']?>">
								

								<tr>
									<td>						
										<input type="text" class="form-control" name='testPoint' id="testPoint" >
									</td>
									<td>						
										<input type="text" class="form-control" name='previousTest' id="previousTest" onkeyup="calculatePRTDrift(document.getElementById('currentTest').value)">
									</td>
									<td>						
										<input name='currentTest'  type="text" class="form-control" id="currentTest" onkeyup="calculatePRTDrift(this.value)">
									</td>
									<td>						
										<input type="text" class="form-control"  name='drift' id="driftE">
									</td>
									
								</tr>
							</tbody>
						</table>

					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
				</form>
				</div>
			</div>
		</div>
	<!--Edit Drift-->
</div>

<script src="https://cdn.jsdelivr.net/npm/jstat@1.9.2/dist/jstat.min.js"></script> 
<script src="/js/scripts/formula.min.js"></script>

<script src="../dashboardAsset/lib/jquery/jquery.min.js"></script>
<script src="../dashboardAsset/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dashboardAsset/lib/feathericons/feather.min.js"></script>
<script src="../dashboardAsset/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../dashboardAsset/assets/js/script.js"></script>
<script>

	<?php
		$rml = new ThermoStandardAddDriftModel();
		$arrDrift[] = $rml->where('serialNumber', $thermostandardtable["serialNumber"])->where('unit', 'Air Temperature')->orderBy('testpoint', 'ASC')->findAll(); 
		$arrDriftRH[] = $rml->where('serialNumber', $thermostandardtable["serialNumber"])->where('unit', 'Relative Humidity')->orderBy('testpoint', 'ASC')->findAll(); 
		$rmlPRT = new ThermoStandardAddDriftPRTModel();
		$arrDriftPRT[] = $rmlPRT->where('serialNumber', $thermostandardtable["serialNumber"])->findAll(); 

	?>
	var arrDriftAirTemp = <?=json_encode($arrDrift);?>;
	var arrDriftRelHum = <?=json_encode($arrDriftRH);?>;
	var arrDriftPRT = <?=json_encode($arrDriftPRT);?>;
	var selectedID = 0;
	var testPointArrayAirTemp = [];
	var testPointArrayRelHum = [];
	function selectedStandard(id, testPoint, unit, RML, NML,correction,readOut,uncertain,prevRML, drift, coverageFactor){
		selectedID = id;
		document.getElementById("selected").value = selectedID;
		document.getElementById("editTestPoint").value = testPoint;
		document.getElementById("editUnit").value = unit;
		document.getElementById("editRML").value = RML;
		document.getElementById("editNML").value = NML;
		document.getElementById("editCorrection").value = correction;
		document.getElementById("editReadOut").value = readOut;
		document.getElementById("editUncert").value = uncertain;


		document.getElementById("editPrevRML").value = prevRML;
		document.getElementById("editDriftABS").value = drift;
		document.getElementById("editCoverageFactor").value = coverageFactor;
	
	}
	function selectedStandardDrift(id, dateCali, unit, testPoint, value){
		selectedID = id;
		document.getElementById("editSelectedDrift").value = selectedID;
		document.getElementById("editDateCaliDrift").value = dateCali;
		document.getElementById("editUnitDrift").value = unit;
		document.getElementById("editTestPointDrift").value = testPoint;
		document.getElementById("editValueDrift").value = value;	
	}
	function selectedStandardPRT(id, testPoint, previousTest, currentTest, drift){
		selectedID = id;
		document.getElementById("selectedPRT").value = selectedID;
		document.getElementById("testPoint").value = testPoint;
		document.getElementById("previousTest").value = previousTest;
		document.getElementById("currentTest").value = currentTest;
		document.getElementById("driftE").value = drift;
	}
	function calculatePRTDrift(curVal){
		var prevtest = document.getElementById('previousTest').value;
		var curtest = curVal;
		console.log(prevtest,curtest)
		if (prevtest == '' || curtest == '') {
			document.getElementById('driftE').value = "";
		}else{
			prevtest = parseFloat(document.getElementById('previousTest').value);
			curtest = parseFloat(curVal);
			document.getElementById('driftE').value = Math.abs(prevtest-curtest);
		}
	}
	function calculatePRTDriftEdit(curVal){
		var prevtest = document.getElementById('editPrevTest').value;
		var curtest = curVal;
		console.log(prevtest,curtest)
		if (prevtest == '' || curtest == '') {
			document.getElementById('editDrift').value = "";
		}else{
			prevtest = parseFloat(document.getElementById('editPrevTest').value);
			curtest = parseFloat(curVal);
			document.getElementById('editDrift').value = Math.abs(prevtest-curtest);
		}
	}
	function slopeDriftNotPRT(driftArray, searchingFor){
		var Tbody = document.getElementById('bodyForDriftAirTemp');
		console.log('driftArray ',driftArray)
		var UnfilteredArray = driftArray;
		var arr= [];
		var arrDateValue = [];
		var arrTestValue = [];

		for(x=0;x<UnfilteredArray.length;x++){
			arrDateValue.push(formulajs.DATEVALUE(UnfilteredArray[0][x].dateCalibrated));
			arrTestValue.push(parseFloat(UnfilteredArray[0][x].testValue));
		}
		
		var perday = formulajs.SLOPE(arrTestValue, arrDateValue);
		var peryear = (formulajs.SLOPE(arrTestValue, arrDateValue)*365.25);
		var roundedperYear = formulajs.ROUNDUP(peryear, 3);

		var tr = document.createElement('tr');
		var Total = document.createElement('td');
		var perDay = document.createElement('td');
		var perYear = document.createElement('td');
		Total.innerHTML = 'Total';
		perDay.innerHTML = perday;
		perYear.innerHTML = peryear;
		tr.appendChild(Total);
		tr.appendChild(perDay);
		tr.appendChild(perYear);
		Tbody.appendChild(tr);	
	}
	function getTestPoint(){
		arrDriftAirTemp.forEach(Elements => {
			Elements.forEach(DataItem => {
				if(!testPointArrayAirTemp.includes(DataItem['testPoint'])){
					testPointArrayAirTemp.push(DataItem['testPoint']);
				}
			})
		})
		arrDriftRelHum.forEach(Elements => {
			Elements.forEach(DataItem => {
				if(!testPointArrayRelHum.includes(DataItem['testPoint'])){
					testPointArrayRelHum.push(DataItem['testPoint']);
				}
			})
		})
	}
	

	const addDriftToBodyAirTemp = () => {
		var Tbody = document.getElementById('bodyForDriftAirTemp');
		for (let index = 0; index < testPointArrayAirTemp.length; index++) {
			var arrDateValue = [];
			var arrTestValue = [];
			let filteredArray = [arrDriftAirTemp[0].filter(function (e) {
				return e.testPoint == testPointArrayAirTemp[index];
			})];
			console.log('addDriftToBodyAirTemp',filteredArray)
			filteredArray.forEach(Elements => {
				Elements.forEach(DataItem => {
					var tr = document.createElement('tr');
					var dateCalibrated = document.createElement('td');
					var testPoint = document.createElement('td');
					var testPointValue = document.createElement('td');
					var unit = document.createElement('td');
					var Action = document.createElement('Button');
					var Delete = document.createElement('Button');
					dateCalibrated.innerHTML = DataItem['dateCalibrated'];
					testPoint.innerHTML = DataItem['testPoint'];
					testPointValue.innerHTML = DataItem['testPointValue'];
					unit.innerHTML = DataItem['unit'];
					Action.innerHTML = '<i class="far fa-edit"></i>';
					Action.setAttribute('type',"button");
					Action.setAttribute('class',"btn");
					Action.setAttribute('data-bs-toggle','modal');
					Action.setAttribute('data-bs-target','#exampleModalDrift');
					Action.setAttribute('onclick','selectedStandardDrift('+DataItem['id']+', "'+DataItem['dateCalibrated']+'", "'+DataItem['unit']+'", '+DataItem['testPoint']+', '+DataItem['testPointValue']+')');
				
					Delete.setAttribute('type',"button");
					Delete.setAttribute('class',"btn");
					Delete.setAttribute('onclick','toDeleteDrift('+DataItem['id']+')');
					Delete.innerHTML = '<i class="fas fa-trash"></i>';

					tr.appendChild(dateCalibrated);
					tr.appendChild(testPoint);
					tr.appendChild(testPointValue);
					tr.appendChild(unit);
					tr.appendChild(Action);
					tr.appendChild(Delete);
					Tbody.appendChild(tr);	
					arrDateValue.push(formulajs.DATEVALUE(DataItem['dateCalibrated']));
					arrTestValue.push(parseFloat(DataItem['testPointValue']));
				})
			})



			var perday = formulajs.SLOPE(arrTestValue, arrDateValue);
			var peryear = (formulajs.SLOPE(arrTestValue, arrDateValue)*365.25);
			var roundedperYear = formulajs.ROUNDUP(peryear, 3);

			if(filteredArray.length === 1){
				perday = 0;
				peryear = 0;
				roundedperYear = formulajs.ROUNDUP(peryear, 3);
			}

			var tr = document.createElement('tr');
			var labelperDay = document.createElement('td');
			var perDay = document.createElement('td');
			var perYear = document.createElement('td');
			var labelPerYear = document.createElement('td');
			tr.setAttribute('style','background-color:rgba(255,255,0,0.5)');
			labelperDay.innerHTML = 'per Day';
			labelPerYear.innerHTML = 'per year';
			perDay.innerHTML = perday;
			perYear.innerHTML = peryear;
			
			tr.appendChild(labelperDay);
			tr.appendChild(perDay);
			tr.appendChild(labelPerYear);
			tr.appendChild(perYear);
			Tbody.appendChild(tr);	
		}	
	}

	const addDriftToBodyRelHum = () => {
		var Tbody = document.getElementById('bodyForDriftRelHum');
		for (let index = 0; index < testPointArrayRelHum.length; index++) {
			var arrDateValue = [];
			var arrTestValue = [];
			let filteredArray = [arrDriftRelHum[0].filter(function (e) {
				return e.testPoint == testPointArrayRelHum[index];
			})];
			filteredArray.forEach(Elements => {
				Elements.forEach(DataItem => {
					var tr = document.createElement('tr');
					var dateCalibrated = document.createElement('td');
					var testPoint = document.createElement('td');
					var testPointValue = document.createElement('td');
					var unit = document.createElement('td');
					var Action = document.createElement('Button');
					dateCalibrated.innerHTML = DataItem['dateCalibrated'];
					testPoint.innerHTML = DataItem['testPoint'];
					testPointValue.innerHTML = DataItem['testPointValue'];
					unit.innerHTML = DataItem['unit'];
					Action.innerHTML = '<i class="far fa-edit"></i>';
					Action.setAttribute('type',"button");
					Action.setAttribute('class',"btn");
					Action.setAttribute('data-bs-toggle','modal');
					Action.setAttribute('data-bs-target','#exampleModalDrift');
					Action.setAttribute('onclick','selectedStandardDrift('+DataItem['id']+', "'+DataItem['dateCalibrated']+'", "'+DataItem['unit']+'", '+DataItem['testPoint']+', '+DataItem['testPointValue']+')');

					tr.appendChild(dateCalibrated);
					tr.appendChild(testPoint);
					tr.appendChild(testPointValue);
					tr.appendChild(unit);
					tr.appendChild(Action);
					Tbody.appendChild(tr);	
					arrDateValue.push(formulajs.DATEVALUE(DataItem['dateCalibrated']));
					arrTestValue.push(parseFloat(DataItem['testPointValue']));
				})
			})
			var perday = formulajs.SLOPE(arrTestValue, arrDateValue);
			var peryear = (formulajs.SLOPE(arrTestValue, arrDateValue)*365.25);
			var roundedperYear = formulajs.ROUNDUP(peryear, 3);

			
			if(filteredArray.length === 1){
				perday = 0;
				peryear = 0;
				roundedperYear = formulajs.ROUNDUP(peryear, 3);
			}

			var tr = document.createElement('tr');
			var labelperDay = document.createElement('td');
			var perDay = document.createElement('td');
			var perYear = document.createElement('td');
			var labelPerYear = document.createElement('td');
			tr.setAttribute('style','background-color:rgba(255,255,0,0.5)');
			labelperDay.innerHTML = 'per Day';
			labelPerYear.innerHTML = 'per year';
			perDay.innerHTML = perday;
			perYear.innerHTML = peryear;
		
			tr.appendChild(labelperDay);
			tr.appendChild(perDay);
			tr.appendChild(labelPerYear);
			tr.appendChild(perYear);
			Tbody.appendChild(tr);	
		}	
	}

	const addDriftToBodyPRT = () => {
		var Tbody = document.getElementById('bodyForDriftPRT');
		console.log('arrDriftPRT[0] ',arrDriftPRT[0]);
		var arrOfDrift = [];
		arrDriftPRT[0].forEach(DataItem => {
			var tr = document.createElement('tr');
			var testPoint = document.createElement('td');
			var prevCorr = document.createElement('td');
			var currCorr = document.createElement('td');
			var drift = document.createElement('td');
			var Action = document.createElement('Button');
			testPoint.innerHTML = DataItem['testPoint'];
			prevCorr.innerHTML = DataItem['previousTest'];
			currCorr.innerHTML = DataItem['currentTest'];
			drift.innerHTML = DataItem['drift'];
			Action.innerHTML = '<i class="far fa-edit"></i>';
			Action.setAttribute('type',"button");
			Action.setAttribute('class',"btn btn-success");
			Action.setAttribute('data-bs-toggle','modal');
			Action.setAttribute('data-bs-target','#exampleModalPRT');
			Action.setAttribute('onclick','selectedStandardPRT('+DataItem['id']+', "'+DataItem['testPoint']+'", "'+DataItem['previousTest']+'", '+DataItem['currentTest']+', '+DataItem['drift']+')');

			tr.appendChild(testPoint);
			tr.appendChild(prevCorr);
			tr.appendChild(currCorr);
			tr.appendChild(drift);
			tr.appendChild(Action);
			Tbody.appendChild(tr);	
			if(DataItem['drift'] != ''){
				arrOfDrift.push(parseFloat(DataItem['drift']));
			}else{
				arrOfDrift.push(DataItem['drift']);
			}
		})
		var max = Math.max.apply(null, arrOfDrift);
		var tr = document.createElement('tr');
		var cell1 = document.createElement('td');
		var cell2 = document.createElement('td');
		var maxLabel = document.createElement('td');
		var maxDrift = document.createElement('td');
		tr.setAttribute('style','background-color:rgba(255,255,0,0.5)');
		maxLabel.innerHTML = 'Max' ;
		maxDrift.innerHTML = max;
		tr.appendChild(cell1);
		tr.appendChild(cell2);
		tr.appendChild(maxLabel);
		tr.appendChild(maxDrift)
		Tbody.appendChild(tr);	
		console.log('arrOfDrift ',arrOfDrift);
	}
	getTestPoint();
	addDriftToBodyAirTemp();
	addDriftToBodyRelHum();
	addDriftToBodyPRT();

	function toDelete(id){
        document.getElementById("selectedIDToDelete").value = id;
        document.FormDelete.submit()
    }

	function toDeleteDrift(id){
        document.getElementById("selectedIDToDeleteDrift").value = id;
        document.FormDeleteDrift.submit()
    }

	$( document ).ready(function() {
		$('#prevRMLADD').on('input', function(){
			let currentRML = Number($('#RML').val());
			let prevRML = Number($(this).val());
			let result = Math.abs(currentRML - prevRML);
			$('#driftADD').val(result)
		});
		$('#editPrevRML').on('input', function(){
			let currentRML = Number($('#editRML').val());
			let prevRML = Number($(this).val());
			let result = Math.abs(currentRML - prevRML);
			$('#editDriftABS').val(result)
		})
	});

	
	
</script>

</body>

</html>

<script>
$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});

function logoutConfirmation(url){
       // windows.confirm("are u sure?");
       href="" 
        var txt;
        if (confirm("Do you want to logout?")) {
            location.href = url;
        }
    }



</script>

