<?php
use App\Models\ElectModel_3;


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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="">
    <meta name="author" content="Themepixels">

    <!-- Favicon -->
    <!-- <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png"> -->

    <title>RML++</title>
    <link href="../dashboardAsset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="../dashboardAsset/lib/remixicon/fonts/remixicon.css" rel="stylesheet">
    
    <!-- Template CSS -->
    <link rel="stylesheet" href="../dashboardAsset/assets/css/style.min.css">
</head>  
<body class="skin-dark animate">
    <div class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-logo"><span></span></a>
        <a href="#" class="sidebar-logo-text">RML<span>++</span></a>
      </div><!-- sidebar-header -->
      <div class="sidebar-body">
        <ul class="nav-sidebar">
          <li class="nav-item">
            <a href="" onclick="window.location.href = '/guestDashboard'" class="nav-link"><i data-feather="home"></i><span>Dashboard</span></a>              
          </li>
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i data-feather="clipboard"></i><span>Certificates</span></a>
            <nav class="nav-sub">
              <a href="#" onclick="window.location.href = '/guestAddElect'"  class="sub-link" style="">Single Range E-balance</a>
              <a href="#" onclick="window.location.href = '/guestAddThermo'"  class="sub-link">Thermohygrometer</a>
              <a href="#" onclick="window.location.href = '/guestTestWeightAddDataView'"  class="sub-link">Test Weights</a>
            </nav>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i data-feather="monitor"></i><span>Records</span></a>
            <nav class="nav-sub">
              <a href="#" onclick="window.location.href = '/guestElectTable'"  class="sub-link">Single Range E-balance</a>
              <a href="#" onclick="window.location.href = '/guestThermoTable'"  class="sub-link">Thermohygrometer</a>
              <a href="#" onclick="window.location.href = '/guestTestWeightTable'"  class="sub-link">Test Weights</a>
            </nav>
          </li>
          <li class="nav-item active show">
            <a href="" class="nav-link with-sub"><i data-feather="archive"></i><span>Standards</span></a>
            <nav class="nav-sub">
              <a href="#" onclick="window.location.href = '/guestElectStandard'" class="sub-link active show">Single Range E-balance</a>
              <a href="#" onclick="window.location.href = '/guestThermoStandardTable'" class="sub-link">Thermohygrometer</a>
              <a href="#" onclick="window.location.href = '/guestTestWeightStandardTable'" class="sub-link">Test Weights</a>
            </nav>
          </li> 
        </ul>
        <hr>
         <hr>
        <hr>
        <ul class="nav-sidebar">
          <li class="nav-item"><a href="#" onclick="window.location.href = '/pendingTable'" class="nav-link"><i data-feather="user-check"></i><span>Pending/For Correction</span></a></li>
          <li class="nav-item"><a href="#" class="nav-link" onclick="window.location.href = '/guestProfile'"><i data-feather="smartphone"></i><span>My Profile</span></a></li>
          <li class="nav-item"><a href="#" class="nav-link" onclick="window.location.href = '/guestAbout'"><i data-feather="align-justify"></i><span>About</span></a></li>
        </ul>
        <hr>
      </div><!-- sidebar-body -->
      <div class="sidebar-footer">
        <a href="#" class="avatar online" onclick="logoutConfirmation('<?= base_url('logout') ?>')">
            <span class="avatar-initial">
                <?php $user1 = session('name'); $fstchar = $user1[0]; echo $fstchar;?>
            </span>
        </a>
        <div class="avatar-body">
          <div class="d-flex align-items-center justify-content-between">
            <h6><?= session('name')?> <?= session('lname')?></h6>
          </div>
          <span><?= session('role')?></span>
        </div><!-- avatar-body -->
      </div><!-- sidebar-footer -->
    </div><!-- sidebar -->

    <!-- Page Content -->
    <div class="content">
      <div class="content-header">
        <a id="contentMenu" href="#" class="content-menu d-none d-lg-flex"><i data-feather="menu"></i></a>
        <a id="mobileMenu" href="#" class="content-menu d-lg-none"><i data-feather="menu"></i></a>
      </div><!-- content-header -->
      <div class="content-body"> 
    <div class="card shadow-sm ">
        <form action="<?= base_url('guestElectStandardUpdate') ?>" method="POST">
        <?php $rml = new ElectModel_3();
		$arr2[] = $rml->where('serialNumber', $elect_table_2["serialNumber"])->findAll(); 
		$i = 0;	
		foreach($arr2 as $value){
			
			for ($i=0; $i < count($value); $i++) { ?>
                
        <input type="hidden" name="standardID" value="<?php echo $value[$i]['standardID']?>">
          <?php  }}
                ?>
            <input type="hidden" value="<?php echo $elect_table_2['id']?>" name="idTable2">
            <div class="modal-body row">
                <div class="mb-3 col">
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Description:</span>
                        </div>
                        <input type="text"  name="description" value="<?php echo $elect_table_2['description']?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" >
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Manufacturer:</span>
                        </div>
                        <input type="text"  name="manufacturer" value="<?php echo $elect_table_2['manufacturer']?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" >
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Type:</span>
                        </div>
                        <input type="text"  name="type" value="<?php echo $elect_table_2['type']?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" >
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Class:</span>
                        </div>
                        <input type="text"  name="class" value="<?php echo $elect_table_2['class']?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" >
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Serial Number:</span>
                        </div>
                        <input type="text"  name="serialNumber" value="<?php echo $elect_table_2['serialNumber']?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" >
                    </div>
                </div>
                <div class=" mb-3 col">
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Certificate Number:</span>
                        </div>
                        <input type="text"  name="certificateNumber" value="<?php echo $elect_table_2['certificateNumber']?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" >
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Date of Calibration:</span>
                        </div>
                        <input type="date" name="dateOfCalibration" value="<?php echo $elect_table_2['dateOfCalibration']?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" >
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Calibration Provider:</span>
                        </div>
                        <input type="text" name="calibrationProvider" value="<?php echo $elect_table_2['calibrationProvider']?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" >
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Previous Air Density:</span>
                        </div>
                        <input type="text" name="prevAirDensity" value="<?php echo $elect_table_2['prevAirDensity']?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" >
                    </div>
                    <button class="btn btn-secondary h5" type="submit" id="button-addon1"><i data-feather="edit"></i></i>Update</button>
                    <a href="/guestElectStandard" class="btn btn-danger h5"><i data-feather="chevron-left"></i></i>Back</a>
                    <i class="float-right" style="font-size: 11px;">Press update to save changes</i> 
                </div>						
            </div>	
        </form>
    </div>
	<form action="<?= base_url('guestElectStandardStore') ?>" method="POST">		
		<input type="hidden" value="<?php echo $elect_table_2['id']?>" name="idTable2">		
    <div class="table-responsive">
		<table class="table table-sm shadow-sm text-center table-bordered bg-white" id="standardRows">
			<thead>
				<tr>
					<th >Nominal Value</th>
					<th >Nominal Unit</th>
					<th >Marking</th>
					<th style="font-size:.9em">Conventional Mass</th>
					<th >Unit</th>
					<th  style="font-size:.9em; text-align:center">Uncertainty of Measurement mg</th>
					<th style="font-size:.9em">MPE (mg)</th>
					<th>Calibration Provider</th>
					<th>Add</th>
				</tr>
			</thead>
			<tbody>
				<input type="hidden" name="serialNumber" value="<?php echo $elect_table_2['serialNumber']?>">
				<input type="hidden" name="type" value="<?php echo $elect_table_2['type']?>">
				<input type="hidden" name="standardID" value="<?php echo $elect_table_2['id']?>">

				<tr>
					<td>						
						<input type="text" class="form-control" name='nominalValue' required>
					</td>
					<td>						
						<input type="text" class="form-control" name='nominalUnit' required>
					</td>
					<td>						
						<input name='marking'  type="text" class="form-control" required>
					</td>
					<td>						
						<input type="text" class="form-control"  name='conventionalMass' required>
					</td>
					<td>						
						<input name='unit' type="text" class="form-control" required>
					</td>
					<td>						
						<input type="text" class="form-control"  name='uncertainty' required>
					</td>
					<td>						
						<input name='mpe' type="text" class="form-control" required>
					</td>
					<td>						
						<input name='calibrationProvider' type="text" class="form-control" required>
					</td>
					<td>						
						<button type="submit" class="btn btn-primary" ><i data-feather="plus"></i></button>
					</td>
				</tr>
			</tbody>
		</table>
    </div>

	</form>
    
    <form name="FormDelete" action="/guestElectStandardDeleteTestPoint" method="post">
        <input type="hidden" name="selectedIDToDelete" id="selectedIDToDelete" >
        <input type="hidden" value="<?= $snID["id"]?>" name="snOfpage">
    </form>
	
    <div class="table-responsive  shadow-sm">
	<table class="table table-bordered table-sm text-center bg-white" id="standardRows">
			<thead>
				<tr>
					<th >Nominal Value</th>
					<th >Nominal Unit</th>
					<th >Marking</th>
					<th style="font-size:.9em">Conventional Mass</th>
					<th >Unit</th>
					<th  style="font-size:.9em;">Uncertainty of Measurement mg</th>
					<th style="font-size:.9em">MPE (mg)</th>
					<th>Calibration Provider</th>
					<th>Edit | Delete</th>
				</tr>
			</thead>
			<tbody>
				

		<?php
		$rml = new ElectModel_3();
		$arr[] = $rml->where('serialNumber', $elect_table_2["serialNumber"])->findAll(); 
		$i = 0;	
		foreach($arr as $value){
			
			for ($i=0; $i < count($value); $i++) { 
		?>
			<tr>
					<td>						
					<?=  $value[$i]['nominalValue'];?>
					</td>
					<td>						
					<?=  $value[$i]['nominalUnit'];?>
					</td>
					<td>						
					<?=  $value[$i]['marking'];?>
					</td>
					<td>						
					<?=  $value[$i]['conventionalMass'];?>
					</td>
					<td>						
					<?=  $value[$i]['unit'];?>
					</td>
					<td>						
					<?=  $value[$i]['uncertainty'];?>
					</td>
					<td>						
					<?=  $value[$i]['mpe'];?>
					</td>
					<td>						
					<?=  $value[$i]['calibrationProvider'];?>
					</td>
					<td>						
						<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="selectedStandard('<?=  $value[$i]['id'];?>','<?=  $value[$i]['nominalValue'];?>','<?=  $value[$i]['nominalUnit'];?>','<?=  $value[$i]['marking'];?>','<?=  $value[$i]['conventionalMass'];?>','<?=  $value[$i]['unit'];?>','<?=  $value[$i]['uncertainty'];?>','<?=  $value[$i]['mpe'];?>','<?=  $value[$i]['calibrationProvider'];?>')"><i data-feather="edit"></i></button>
            <button type="button" onclick="toDelete(<?=  $value[$i]['id'];?>)" class="btn btn-danger"><i data-feather="trash"></i></button>
          </td>
			</tr>	

			<?php
			}
					}
			?>
			</tbody>
		</table>
        </div>
		
	<!--Edit-->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Standard</h5>
					<!--button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times</button-->
				</div>
				<div class="modal-body">
					<form action="<?= base_url('guestStandardTableEditValues/'.$i) ?>"  method="POST">
					
					
						<input type="hidden" value="<?= $snID["id"]?>" name="snID">
						<input type="hidden"  name="selectedID" id="selected">

						<table class="table " id="standardRows">
							<thead>
								<tr>
									<th >Nominal Value</th>
									<th >Nominal Unit</th>
									<th >Marking</th>
									<th style="font-size:.9em">Conventional Mass</th>
									<th >Unit</th>
									<th  style="font-size:.9em; text-align:center">Uncertainty of Measurement mg</th>
									<th style="font-size:.9em">MPE (mg)</th>
									<th>Calibration Provider</th>
								</tr>
							</thead>
							<tbody>
								<input type="hidden" name="serialNumber" value="<?php echo $elect_table_2['serialNumber']?>">
								<input type="hidden" name="type" value="<?php echo $elect_table_2['type']?>">

								<tr>
									<td>						
										<input type="text" class="form-control" name='nominalValue' id="editNominal" required>
									</td>
									<td>						
										<input type="text" class="form-control" name='nominalUnit' id="editNominalUnit" required>
									</td>
									<td>						
										<input name='marking'  type="text" class="form-control" id="editMarking" required>
									</td>
									<td>						
										<input type="text" class="form-control"  name='conventionalMass' id="editConventional" required>
									</td>
									<td>						
										<input name='unit' type="text" class="form-control" id="editUnit" required>
									</td>
									<td>						
										<input type="text" class="form-control"  name='uncertainty' id="editUncertainty" required>
									</td>
									<td>						
										<input name='mpe' type="text" class="form-control"id="editMpe" >
									</td>
									<td>						
										<input name='calibrationProvider' type="text" class="form-control" id="editProvider" required>
									</td>
									
								</tr>
							</tbody>
						</table>

					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
					<button type="submit" class="btn btn-primary"><i class="far fa-thumbs-up"></i> Save changes</button>
				</div>
				</form>
				</div>
			</div>
		</div>
	<!--Edit-->
</div>



<script>
	var selectedID = 0;
	function selectedStandard(id, nominalVal, nominalUnit, Marking, conventionalMass,unit, Uncertainty, Mpe,Provider){
		selectedID = id;
		document.getElementById("selected").value = selectedID;
		document.getElementById("editNominal").value = nominalVal;
		document.getElementById("editNominalUnit").value = nominalUnit;
		document.getElementById("editMarking").value = Marking;
		document.getElementById("editConventional").value = conventionalMass;
		document.getElementById("editUnit").value = unit;
		document.getElementById("editUncertainty").value = Uncertainty;
		document.getElementById("editMpe").value = Mpe;
		document.getElementById("editProvider").value = Provider;
	}

    function toDelete(id){
        document.getElementById("selectedIDToDelete").value = id;
        document.FormDelete.submit()
    }
</script>

</body>

</html>
<script src="../dashboardAsset/lib/jquery/jquery.min.js"></script>
<script src="../dashboardAsset/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dashboardAsset/lib/feathericons/feather.min.js"></script>
<script src="../dashboardAsset/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../dashboardAsset/assets/js/script.js"></script>

<script>
function logoutConfirmation(url){
       // windows.confirm("are u sure?");
       href="" 
        var txt;
        if (confirm("Do you want to logout <?= session('name')?>?")) {
            location.href = url;
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



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
