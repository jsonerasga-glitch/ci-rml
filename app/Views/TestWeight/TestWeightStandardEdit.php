<?php
use App\Models\TestWeightStandardValuesModel;


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

    $pathicon7 = 'image/dashboard-images/person.png';
    $typeIcon7 = pathinfo($pathicon7, PATHINFO_EXTENSION);
    $dataIcon7 = file_get_contents($pathicon7);
    $base64Icon7 = 'data:image/' . $typeIcon7 . ';base64,' . base64_encode($dataIcon7);
	
    $pathicon5 = 'image/dashboard-images/male-user.png';
    $typeIcon5 = pathinfo($pathicon5, PATHINFO_EXTENSION);
    $dataIcon5 = file_get_contents($pathicon5);
    $base64Icon5 = 'data:image/' . $typeIcon5 . ';base64,' . base64_encode($dataIcon5);
?>
<!DOCTYPE html>
<style>
body {
    overflow-x: hidden;
}

#sidebar-wrapper {
	height: 100%;
	-webkit-transition: margin .25s ease-out;
	-moz-transition: margin .25s ease-out;
	-o-transition: margin .25s ease-out;
	transition: margin .25s ease-out;
	overflow-y: auto;
	width: 286px;
	position: fixed;
}

#sidebar-wrapper .sidebar-heading {
    padding: 0.875rem 1.25rem;
    font-size: 1.2rem;
}

#sidebar-wrapper .list-group {
    width: 15rem;
}

#page-content-wrapper {
    min-width: 100vw;
}

#wrapper.toggled #sidebar-wrapper {
    margin-left: 0;
}

@media (min-width: 768px) {
    #sidebar-wrapper {
        margin-left: 0;
    }

    #page-content-wrapper {
        min-width: 0;
        width: 100%;
    }

    #wrapper.toggled #sidebar-wrapper {
        margin-left: -15rem;
    }
}
[data-toggle="collapse"] .fa:before {  
  content: "\f107";
}

[data-toggle="collapse"].collapsed .fa:before {
  content: "\f104";
}
</style>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!--FONTAWESOME CDN-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
     <!--FONTAWESOME CDN-->
</head>  
<body style="margin: 0; padding: 0; font-family: Calibri; font-size: 14px;">

<div class="d-flex " id="wrapper">
    <!-- Sidebar vh-100-->
  <div class="sidebar border-down vh-100" id="sidebar-wrapper" style="color: white; top: 0; position: sticky; background-color:#0f1a34; ">
        <div class="sidebar-heading " style="color: white; top: 0; position: sticky; background-color:#182444; z-index: 1;">							
        <img src="<?php echo $base64; ?>" class="mr-2" alt="DOST LOGO" height='30px' style="border-radius:5px; ">
        <strong>RML Calibration</strong>
    </div>
        <div class="list-group list-group-flush overflow-auto">
            <h6 class="mt-3 ml-4">
			    <img src="<?php echo $base64Icon7; ?>" alt="DOST LOGO" height='30px' style="border-radius:5px;" class="mr-2">
                Admin <?#= $user['name'] ?>
            </h6>
        <div class="card-header">
                <h2 class="mb-0">
                    <a href="/dashboard" class="btn btn-block text-left " style="font-size: .5em; color: white;">
                        <i class="fas fa-home"></i>
                        Dashboard
                    </a> 
                </h2>
            </div>
          
            <!--a>SINLGE RANGE E BALANCE<-->          
            <div class="accordion" id="accordionExample">
                <div class="">
                    <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class=" btn btn-block text-left collapsed button" id="" style="color:white; font-size: 0.47em;" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <i class="fas fa-balance-scale-right"></i>
                        S.Range E-Balance&nbsp&nbsp&nbsp
                        <i class="fa"></i>
                        </button>
                    </h2>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <a href="/electHome" class="list-group-item list-group-item-action" style="font-size: .7rem; color: white; background-color:#091122;">
                            <i class="fas fa-folder-plus"></i>
                            New
                        </a>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <a href="/electTable" class="list-group-item list-group-item-action" style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-clipboard"></i>
                            View Records
                        </a>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <a href="/electStandard" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-table"></i>
                            View Standard
                        </a>
                    </div>
                </div>
            </div>
            <!--a>SINLGE RANGE E BALANCE<-->

            <!--a>THERMOHYGROMETER<-->           
            <div class="accordion" id="accordionExample">
                <div class="">
                    <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed" style="color:white; font-size: 0.48em;" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="fas fa-tachometer-alt"></i>
                        Thermohygrometer&nbsp
                        <i class="fa"></i>
                        </button>
                    </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <a href="/thermoAdd" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-folder-plus"></i>
                            New
                        </a>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <a href="/thermoTable" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-clipboard"></i>
                            View Records
                        </a>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <a href="/thermoStandardTable" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-table"></i>
                            View Standard
                        </a>
                    </div>
                </div>
            </div>
            <!--a>THERMOHYGROMETER<-->
             <!--a>Test weight<-->           
             <div class="accordion" id="accordionExampleTEstWeight">
                <div class="">
                    <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed " style="color:white; font-size: 0.48em;" type="button" data-toggle="collapse" data-target="#collapseTwoTestWeight" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="fas fa-weight-hanging"></i>
                        &nbspTest Weight&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <i class="fa"></i>
                        </button>
                    </h2>
                    </div>
                    <div id="collapseTwoTestWeight" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExampleTEstWeight">
                        <a href="/testWeightAddDataView" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-folder-plus"></i>
                            New
                        </a>
                    </div>
                    <div id="collapseTwoTestWeight" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExampleTEstWeight">
                        <a href="/testWeightTable" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-clipboard"></i>
                            View Records
                        </a>
                    </div>
                    <div id="collapseTwoTestWeight" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExampleTEstWeight">
                        <a href="/testWeightStandardTable" class="list-group-item list-group-item-action " style="font-size: .7rem; color: #091122; background-color: white;">
                            <i class="fas fa-table"></i>
                            View Standard
                        </a>
                    </div>
                    <div id="collapseTwoTestWeight" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExampleTEstWeight">
                        <a href="/testWeightSensitivityTestTable" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-table"></i>
                            View Sensitivity Test
                        </a>
                    </div>
                </div>
            </div>
            <!--a>Test weight<-->

            <!--a>USER MANAGEMENT<--> 
            <div class="accordion" id="accordionExample">
                <div class=" ">
                    <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed " style="color:white; " type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <i class="fas fa-user-cog"></i>
                        User Management&nbsp
                        <i class="fa"></i>
                        </button>
                    </h2>
                    </div>
                    <div id="collapseThree" class="collapse " aria-labelledby="headingThree" data-parent="#accordionExample">
                        <a href="/createUser" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-user-plus"></i>
                            New Admin
                        </a>
                    </div>
                    <div id="collapseThree" class="collapse " aria-labelledby="headingThree" data-parent="#accordionExample">
                        <a href="/guestUserIndex" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-user-plus"></i>
                            New Guest User
                        </a>
                    </div>
                    <div id="collapseThree" class="collapse " aria-labelledby="headingThree" data-parent="#accordionExample">
                        <a href="/manageUser" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-tasks"></i>
                            View Admin 
                        </a>
                    </div>
                    <div id="collapseThree" class="collapse " aria-labelledby="headingThree" data-parent="#accordionExample">
                        <a href="/manageGuestUser" class="list-group-item list-group-item-action" style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-tasks"></i>
                            Manage Guest User 
                        </a>
                    </div>
                </div>
            </div>
            <!--a>USER MANAGEMENT<--> 
            <div class="" id="">
                <div class=" ">
                    <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <a href="/customerTable" class="btn btn-block text-left  " style="color: white; " type="button">
                            <i class="fas fa-user-chart"></i>
                            Customer
                            <i class="fa"></i>
                        </a>
                    </h2>
                    </div>
                </div>
            </div>

            <div class="" id="">
                <div class=" ">
                    <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <a href="/about" class="btn btn-block text-left  " style=" color: white; " type="button">
                            <i class="far fa-info-circle"></i>
                            About
                            <i class="fa"></i>
                        </a>
                    </h2>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>

    
    <!-- /#sidebar-wrapper -->
 
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow" style="color: white; top: 0; position: sticky; z-index: 1; ">
            <button class="btn btn-light" id="menu-toggle">
                <i class="fas fa-bars"></i>    
            </button>
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item ">
                        <a class="nav-link" onclick="logoutConfirmation('<?= base_url('logout') ?>')" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                            <h6 class="" style="color: blue;">
                                <!--img src="<?php #echo $base64Icon5; ?>" alt="DOST LOGO" class="" height='20px'-->
                            <?= session('name')?> <?= session('lname')?>
                            <i class="far fa-angle-down mx-1"></i>
                        </h6>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="container-fluid mt-5" style="background-color:white;">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <div class="mx-auto d-flex justify-content-center">
                    <h4 class="">Test Weight Standard</h4>
                </div>

            </div>
<div class="container">
    
    <form name="FormDelete" action="<?= base_url('TestWeightController/deleteTestWeightValues') ?>" method="post">
        <input type="hidden" name="selectedIdtestWeight" id="selectedIdtestWeight" >
        <input type="hidden" value="<?= $snID["id"]?>" name="snOfpageTestWeight">
    </form>
	<form action="<?= base_url('testWeightStandardUpdate') ?>" method="POST">
		<input type="hidden" value="<?php echo $TestWeightStandardDetailsModel['id']?>" name="idTable2">
		<div class="modal-body row">
			<div class="mb-3 col">
				<p class="h6">Description:&nbsp; </p>
                <input class="h5" type="text" name="description" value="<?php echo $TestWeightStandardDetailsModel['description']?>">
				<p class="h6">Manufacturer:&nbsp; </p>
                <input class="h5" type="text" name="manufacturer" value="<?php echo $TestWeightStandardDetailsModel['manufacturer']?>">
				<p class="h6">Type:&nbsp; </p>
                <input class="h5" type="text" name="type" value="<?php echo $TestWeightStandardDetailsModel['type']?>">
			</div>
			<div class=" mb-3 col">
				<p class="h6">Serial Number:&nbsp; </p>
                <input class="h5" type="text" name="serialNumber" value="<?php echo $TestWeightStandardDetailsModel['serialNumber']?>">
				<p class="h6">Previous Air Density:&nbsp; </p>
				<input class="h5" type="text" name="prevAirDensity" value="<?php echo $TestWeightStandardDetailsModel['prevAirDensity']?>">
				<p class="h6">Certificate Number:&nbsp; </p>
				<input class="h5" type="text" name="certificateNumber" value="<?php echo $TestWeightStandardDetailsModel['certificateNumber']?>">
				<p class="h6">Date of Calibration:&nbsp; </p>
				<input class="h5" type="date" name="dateOfCalibration" value="<?php echo $TestWeightStandardDetailsModel['dateOfCalibration']?>">
				<button class="btn btn-secondary h5" type="submit" id="button-addon1"><i class="far fa-edit"></i> Update</button>
			</div>						
		</div>	
	</form>
    <?php
        if(session()->getFlashdata('status')){
            echo "<div class='alert alert-primary' role='alert'>".session()->getFlashdata('status')."</div>";
            }
        ?>
	<form action="<?= base_url('testWeightStandardStore') ?>" method="POST">		
		<input type="hidden" value="<?php echo $TestWeightStandardDetailsModel['id']?>" name="idTable2">		
		<table class="table table-sm " id="standardRows">
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
					<th></th>
				</tr>
			</thead>
			<tbody>
				<input type="hidden" name="serialNumber" value="<?php echo $TestWeightStandardDetailsModel['serialNumber']?>">
                <input type="hidden" name='class' value="<?php echo $TestWeightStandardDetailsModel['class']?>">
				<tr>
					<td>						
						<input type="text" class="form-control" name='nominalValue'>
					</td>
					<td>						
						<input type="text" class="form-control" name='nominalUnit'>
					</td>
					<td>						
						<input name='marking'  type="text" class="form-control" >
					</td>
					<td>						
						<input type="text" class="form-control"  name='conventionalMass'>
					</td>
					<td>						
						<input name='unit' type="text" class="form-control" >
					</td>
					<td>						
						<input type="text" class="form-control"  name='uncertainty'>
					</td>
					<td>						
						<input name='mpe' type="text" class="form-control" >
					</td>
					<td>						
						<input name='calibrationProvider' type="text" class="form-control" >
					</td>
					<td>						
						<button type="submit" class="btn btn-primary" >Add</button>
					</td>
				</tr>
			</tbody>
		</table>

	</form>
	
	<table class="table table-bordered table-sm" id="standardRows">
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
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				

		<?php
		$rml = new TestWeightStandardValuesModel();
		$arr[] = $rml->where('serialNumber', $TestWeightStandardDetailsModel["serialNumber"])->findAll(); 
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
					<?=  $value[$i]['issuer'];?>
					</td>
					<td>						
						<button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="selectedStandard('<?=  $value[$i]['id'];?>','<?=  $value[$i]['nominalValue'];?>','<?=  $value[$i]['nominalUnit'];?>','<?=  $value[$i]['marking'];?>','<?=  $value[$i]['conventionalMass'];?>','<?=  $value[$i]['unit'];?>','<?=  $value[$i]['uncertainty'];?>','<?=  $value[$i]['mpe'];?>','<?=  $value[$i]['issuer'];?>')"><i class="far fa-edit"></i></button>
					</td>
                    <td>
                    <button type="button" onclick="toDelete(<?=  $value[$i]['id'];?>)" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    
                    </td>
			</tr>	

			<?php
			}
					}
			?>
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
					<form action="<?= base_url('testWeightStandardTableEditValues/'.$i) ?>"  method="POST">
					
					
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
								<input type="hidden" name="serialNumber" value="<?php echo $TestWeightStandardDetailsModel['serialNumber']?>">

								<tr>
									<td>						
										<input type="text" class="form-control" name='nominalValue' id="editNominal" >
									</td>
									<td>						
										<input type="text" class="form-control" name='nominalUnit' id="editNominalUnit" >
									</td>
									<td>						
										<input name='marking'  type="text" class="form-control" id="editMarking">
									</td>
									<td>						
										<input type="text" class="form-control"  name='conventionalMass' id="editConventional">
									</td>
									<td>						
										<input name='unit' type="text" class="form-control" id="editUnit">
									</td>
									<td>						
										<input type="text" class="form-control"  name='uncertainty' id="editUncertainty">
									</td>
									<td>						
										<input name='mpe' type="text" class="form-control"id="editMpe" >
									</td>
									<td>						
										<input name='calibrationProvider' type="text" class="form-control" id="editProvider">
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
</div>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

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
    function calculateDrift(curr, prev, drift){
            let currValue = parseFloat($('#'+curr).val());
            let prevValue = parseFloat($('#'+prev).val());
            let result = Math.abs(currValue - prevValue)
            $('#'+drift).val(result)
        }
</script>

</body>

</html>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script>
    $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    });

    function deleteConfirmation(url,id){
        // windows.confirm("are u sure?");
        href="" 
            var txt;
            var id;
            if (confirm("Do you want to delete "+id+"?")) {
                location.href = url;
            }
        }
        function toDelete(id){
            document.getElementById("selectedIdtestWeight").value = id;
            document.FormDelete.submit()
        }
    function logoutConfirmation(url){
        // windows.confirm("are u sure?");
        href="" 
            var txt;
            if (confirm("Do you want to logout?")) {
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
