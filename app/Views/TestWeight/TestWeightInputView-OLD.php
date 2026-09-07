<?php
	use App\Models\TestWeightStandardDetailsModel;
	use App\Models\TestWeightStandardValuesModel;
	use App\Models\TestWeightSensitivityTestModel;
	use App\Models\CustomersModel;

	$standardDetails = new TestWeightStandardDetailsModel();
	$standardValues = new TestWeightStandardValuesModel();

	$sensitivityTest = new TestWeightSensitivityTestModel();

	$arrStandardDetails[] = $standardDetails->findAll(); 
	$arrStandardValues[] = $standardValues->findAll(); 
	$sensitivityTestValues[] = $sensitivityTest->findAll(); 



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
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
  <script type="text/javascript">
   <?php 
   if(!isset($_GET['SN'])){
	   $sn="NULL";
	   echo " $(window).on('load', function() {
        $('#staticBackdrop').modal('show');
    });";
   }else{
	   $sn= isset($_GET['SN']) ? $_GET['SN'] : "NULL";
   }
 	
	
   ?>
   </script>



<!DOCTYPE html>
<style>
	body {
		overflow-x: hidden;
	}
	.modal-dialog{
    overflow-y: initial !important
	}
	#sidebar-wrapper {
		min-height: 100vh;
		margin-left: -15rem;
		-webkit-transition: margin .25s ease-out;
		-moz-transition: margin .25s ease-out;
		-o-transition: margin .25s ease-out;
		transition: margin .25s ease-out;
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

	.modal4TempInRow tbody tr td input{
		width: auto;
	}
	
	.table td{
		vertical-align:middle!important;
	}


	[data-toggle="collapse"] .fa:before {  
  content: "\f107";
}

[data-toggle="collapse"].collapsed .fa:before {
  content: "\f104";
}

.saveButton{
	position:fixed;
	top:8em;
	right:15;
}


input,
input::-webkit-input-placeholder {
    font-size: 12px;
    line-height: 3;
}

</style>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=0.5">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">  
  	<!--FONTAWESOME CDN-->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
     <!--FONTAWESOME CDN-->
</head>  
<body>
     
  <div class="d-flex " id="wrapper">
  <!-- Sidebar vh-100-->
  <div class="sidebar border-down vh-100" id="sidebar-wrapper" style="color: white; top: 0; position: sticky; background-color:#0f1a34; ">
        <div class="sidebar-heading " style="color: white; top: 0; position: sticky; background-color:#182444;">							
        <img src="<?php echo $base64; ?>" class="mr-2" alt="DOST LOGO" height='30px' style="border-radius:5px; ">
        <strong>RML Calibration</strong>
    </div>
        <div class="list-group list-group-flush overflow-auto">
            <h6 class="mt-3 ml-4">
			    <img src="<?php echo $base64Icon7; ?>" alt="DOST LOGO" height='30px' style="border-radius:5px;" class="mr-2">
                Admin <?= $user['name'] ?>
            </h6>
        <div class="card-header">
                <h2 class="mb-0">
                    <a href="dashboard" class="btn btn-block text-left " style="font-size: .5em; color: white;">
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
                        <a href="electHome" class="list-group-item list-group-item-action" style="font-size: .7rem; color: white; background-color:#091122;">
                            <i class="fas fa-folder-plus"></i>
                            New
                        </a>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <a href="electTable" class="list-group-item list-group-item-action" style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-clipboard"></i>
                            View Records
                        </a>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <a href="electStandard" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
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
                        <a href="thermoAdd" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-folder-plus"></i>
                            New
                        </a>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <a href="thermoTable" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-clipboard"></i>
                            View Records
                        </a>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <a href="thermoStandardTable" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
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
                        <button class="btn btn-block text-left collapsed bg-primary" style="color:white; font-size: 0.48em;" type="button" data-toggle="collapse" data-target="#collapseTwoTestWeight" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="fas fa-weight-hanging"></i>
                        &nbspTest Weight&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <i class="fa"></i>
                        </button>
                    </h2>
                    </div>
                    <div id="collapseTwoTestWeight" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExampleTEstWeight">
                        <a href="testWeightAddDataView" class="list-group-item list-group-item-action " style="font-size: .7rem; color: #091122; background-color: white;">
                            <i class="fas fa-folder-plus"></i>
                            New
                        </a>
                    </div>
                    <div id="collapseTwoTestWeight" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExampleTEstWeight">
                        <a href="testWeightTable" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-clipboard"></i>
                            View Records
                        </a>
                    </div>
                    <div id="collapseTwoTestWeight" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExampleTEstWeight">
                        <a href="testWeightStandardTable" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-table"></i>
                            View Standard
                        </a>
                    </div>
                    <div id="collapseTwoTestWeight" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExampleTEstWeight">
                        <a href="testWeightSensitivityTestTable" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
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
                        <a href="createUser" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-user-plus"></i>
                            New Admin
                        </a>
                    </div>
                    <div id="collapseThree" class="collapse " aria-labelledby="headingThree" data-parent="#accordionExample">
                        <a href="guestUserIndex" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-user-plus"></i>
                            New Guest User
                        </a>
                    </div>
                    <div id="collapseThree" class="collapse " aria-labelledby="headingThree" data-parent="#accordionExample">
                        <a href="manageUser" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-tasks"></i>
                            View Admin 
                        </a>
                    </div>
                    <div id="collapseThree" class="collapse " aria-labelledby="headingThree" data-parent="#accordionExample">
                        <a href="manageGuestUser" class="list-group-item list-group-item-action" style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-tasks"></i>
                            Manage Guest User 
                        </a>
                    </div>
                </div>
            </div>
            <!--a>USER MANAGEMENT<--> 

            
            
        </div>
    </div>

    
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow" style="color: white; top: 0; ">
            <button class="btn btn-light" id="menu-toggle">
                <i class="fas fa-bars"></i>    
                
            </button>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <!--li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li-->
                    <li class="nav-item">
						<img src="<?php echo $base64Icon5; ?>" alt="DOST LOGO" class="mr-2" height='40px'>
                    </li>
                    <li class="nav-item">
                        <h5 class="mt-2" style="color: black;"><?= $user['name'] ?></h5>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                            <i class="fas fa-sign-out-alt"></i> 
                        </a>
                        <div class="dropdown-menu dropdown-menu-right bg-white" aria-labelledby="navbarDropdown">
                            <h1 class="text-center">
                                <i class="fas fa-user-tie"></i>
                            </h1>
                            <p class="dropdown-item text-center "><?= $user['email'] ?></p>
                            <hr>
                            <a class="dropdown-item" href="logout">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid" style="background-color:#f9f9f9;">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <div class="page_title_left mt-2 mb-4">
                    <h4 class="">New Test Weight</h4>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <ul class="nav">
                                    <p>Home/Test Weight/<a href="thermoAdd">New</a></p>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        <div class="container-fluid">
            <!--h1 class="mt-4">Admin Dashboard</h1-->
			<div id="userTable"> </div>
		<div class="">
			<div class="card shadow p-3 mb-5 bg-white rounded">
				<div class="card-header">
						<!-- HEADER --> 
								<div class="row text-center mt-4">
									<div class="col-3">
										<img src="<?php echo $base64; ?>" alt="DOST LOGO" height='90px' style=" top:0"> 
									</div>
									<div class="col-6 mt-n4">
										<h6>Republic of the Philippines</h6>
										<h6>DEPARTMENT OF SCIENCE AND TECHNOLOGY</h6>
										<h6>CALABARZON</h6>
										<h6>Regional Metrology Laboratory</h6>
									</div>
									<div class="col-3">
										<img src="<?php echo $base64PAB; ?>" alt="PAB LOGO" height='90px' style="">
									</div>
									
								</div>
						<!-- HEADER -->	
							</div>
							<br>
<!-- form -->
							<form action="testWeightStoreData" method="post" id="testWeightForm" enctype="multipart/form-data">
								<input type="hidden" name="completion" id="completion">
						<!-- INFORMATION-->
							<div class='row'>
								<div class='col '>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroup-sizing-default">Certificate No.</span>
										</div>
										<input name='certificateNumber' type="text" class="form-control text-break" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
									</div>
									<input name='allData' id='allData' type="hidden" >
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroup-sizing-default">Customer</span>
										</div>
										<input name='customer' id="customer" type="text" class="form-control text-break" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroup-sizing-default">Address</span>
										</div>
										<textarea name='address' id="address" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" style="margin-top: 0px;margin-bottom: 0px;height: 80px;"></textarea>
									</div>

								</div>
								<div class='col '>
									<div class="input-group mb-3">
										<span class="input-group-text" id="inputGroup-sizing-default">Date Received</span>
										<input name='dateReceived' type="date" class="form-control text-break" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
									</div>
									<div class="input-group mb-3">
										<span class="input-group-text" id="inputGroup-sizing-default">Date Calibrated</span>
										<input name='dateCalibrated' type="date" class="form-control text-break" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
									</div>
									<div class="input-group mb-3">
										<span class="input-group-text" id="inputGroup-sizing-default">Recommended Due Date</span>
										<input name='recommendedDueDate' type="date" class="form-control text-break" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
									</div>
									<div class="input-group mb-3">
										<span class="input-group-text" id="inputGroup-sizing-default">Place of Calibration</span>
										<input name='placeOfCalibration' value="Mass Lab" type="text" class="form-control text-break" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
									</div>
								</div>							
							</div>
							
						<!-- INFORMATION -->
						<!-- SPECIFICATION -->	
							<div class='row'>
								<div class='col'>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroup-sizing-default">Equipment Description</span>
										</div>
										<input name='equipmentDescription' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroup-sizing-default">Manufacturer</span>
										</div>
										<input name="manufacturer" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroup-sizing-default">Class</span>
										</div>										
										<select class="custom-select" id="inputGroupSelect01" name="Class">
											<option value="none">None Indicated</option>
											<option value="E2">E2</option>
											<option value="F1">F1</option>
											<option value="F2">F2</option>
											<option value="M1">M1</option>
											<option value="M2">M2</option>
											<option value="M3">M3</option>
											<option value="ASTM Class 4">ASTM Class 4</option>
											<option value="ASTM Class 3">ASTM Class 3</option>
											<option value="ME-9348">ME-9348</option>
										</select>
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroup-sizing-default">Serial No.</span>
										</div>
										<input name='serialNumber' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroup-sizing-default">Equipment ID.</span>
										</div>
										<input name='equipmentID' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroup-sizing-default">Approximated Class</span>
										</div>
										<select class="custom-select" id="approxClass" name="approxClass" onchange="addCycleToFirstTable(this.value)">
											<option value="none">None Indicated</option>
											<option value="E2">E2</option>
											<option value="F1">F1</option>
											<option value="F2">F2</option>
											<option value="M1">M1</option>
											<option value="M2">M2</option>
											<option value="M3">M3</option>
										</select>
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroup-sizing-default">Cycle</span>
											<input name='cycle' id='cycle'  type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
										</div>
									</div>
								</div>	
							</div>
						<!-- SPECIFICATION -->
						<!-- STANDARD -->
							<table class="table table-borderless shadow card">
								<thead>
									<tr>
										<th colspan="4">Standard Used</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Standard Description:</td>
										<td><input name='standardDescrition' placeholder="Standard Description" type="text" class="form-control text-break"></td>
										<td>Accessories:</td>
										<td><input name='accessories' placeholder="Accessories" type="text" class="form-control text-break"></td>
									</tr>
									<tr>
										<td>Make:</td>
										<td><input name='maker' placeholder="Make" type="text" class="form-control text-break"></td>
										<td>Remarks:</td>
										<td colspan="2" rowspan="3"><textarea class="form-control" placeholder="Remarks" name="remarks" id="remarks" cols="60" rows="5"></textarea></td>
									</tr>
									<tr>
										<td>Class:</td>
										<td colspan="1"><input name='classStandard' placeholder="Class" type="text" class="form-control text-break"></td>
										<!--td colspan="2" rowspan="3"><textarea class="form-control" placeholder="Remarks" name="remarks" id="remarks" cols="60" rows="5"></textarea></td-->
									</tr>
									<tr>
										<td>Serial No.:</td>
										<td colspan="1"><input name='serialNumberStandard' placeholder="Serial No" type="text" class="form-control text-break"></td>
									</tr>
									<tr>
										<td>Date of Next Calibration:</td>
										<td colspan="1"><input name='dateOfNextCalib' placeholder="Date of Next Calibration" type="text" class="form-control text-break"></td>
									</tr>
									<tr>
										<td>Time Started</td>
										<td><input name='timeStart' placeholder="Time Started" type="time" class="form-control text-break"></td>
										<td>Time Finished</td>
										<td><input name='timeFinished' placeholder="Time Finished" type="time" class="form-control text-break"></td>
									</tr>
									<tr>
										<td>Calibrated by:</td>
										<td><input name='calibratedBy' placeholder="Calibrated by" type="text" class="form-control text-break"></td>
										<td>Checked by:</td>
										<td><input name='checkedBy' placeholder="Checked by" type="text" class="form-control text-break"></td>
									</tr>
									<tr>
										<td>Date:</td>
										<td><input name='dateCalibratedBy' placeholder="Date" type="date" class="form-control text-break"></td>
										<td>Date:</td>
										<td><input name='dateCheckedBy' placeholder="Date" type="date" class="form-control text-break"></td>
									</tr>
								</tbody>
							</table>
						<!-- STANDARD -->
						<!-- Tables -->
							<div class="card shadow text-center container-fluid">
								<div class="row mt-2">
									<div class="col-2">
										<h5 class="text-center">Test Weight</h5>
									</div>
									<div class="col-2 float-left">
										<button type="button" class="btn btn-primary" onclick="tableCreate()">
										<i class="fas fa-table"></i>
											Add Table
										</button>
									</div>
									<div class="col-2">
										<button type="button" class="btn btn-primary" onclick="getInputValueFromTables()">
											<i class="fas fa-database"></i>	
											Add Data
										</button>
									</div>
								</div>
								<div class="row mt-2">
									<form action="" method="POST" id='formMain' enctype="multipart/form-data">
									
									<table class="table text-center table-bordered table-sm " id="Table1">
										<thead>
											<tr>
												<th colspan="7"><h4>Calibration Information #1</h4></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td colspan="3">Air density during the (previous) calibration of the reference (kg/m3):</td>
												<td colspan="2">Density of Sample  (kg/m3)</td>
												<td colspan="2">Densty of Reference  (kg/m3)</td>
											</tr>
											<tr class="mb-4">
												<td colspan="3"><input type="text" class="form-control" placeholder="Air density during the (previous) calibration of the reference (kg/m3):" id="prevAirDensity"></td>
												<td colspan="2"><input type="text" class="form-control" placeholder="Density of Sample  (kg/m3)" id="densitySample"></td>
												<td colspan="2"><input type="text" class="form-control" placeholder="Density of Reference  (kg/m3)" id="densityReference"></td>
												
											</tr>
											<tr>
												<td colspan="7">&nbsp</td>
												</tr>
											<tr>
												<td colspan="2">Uncertainty of Density Sample</td>
												<td colspan="2">Uncertainty of Density Reference</td>
												<td colspan="">SC</td>
												<td colspan="2">K</td>
											</tr>
											<tr>
												<td colspan="2"><input type="text" class="form-control" placeholder="Uncertainty of Density Sample" id="uncertDensitySample"></td>
												<td colspan="2"><input type="text" class="form-control" placeholder="Uncertainty of Density Reference" id="uncertDensityReference"></td>
												<td colspan=""><input type="text" class="form-control" placeholder="SC" id="sc"></td>
												<td colspan="2"><input type="text" class="form-control" placeholder="k" id="k"></td>
											</tr>
											<tr>
												<td colspan="7">&nbsp</td>
											</tr>
											<tr>
												<!--td>Balance Resolution</td-->
												<td>Balance Resolution</td>
												<td colspan="2"><input type="text" class="form-control" placeholder="Balance Resolution" id="balanceReso"></td>
												<td>Comparator:</td>
												<td colspan="3">
												<select class="custom-select" id="comparator" >
														<option selected>Choose...</option>
														<option value="XPE2006 DR" selected>XPE2006 DR</option>
														<option value="MCM2004">MCM2004</option>
														<option value="MCM60K3">MCM60K3</option>
													</select>
												</td>
											</tr>
											<tr>
												<td colspan="7">&nbsp</td>
											</tr>
											<!--tr>
												<td>Comparator</td>
												<td colspan="6"> 
													<select class="custom-select" id="comparator" >
														<option selected>Choose...</option>
														<option value="XPE2006 DR">XPE2006 DR</option>
														<option value="MCM2004">MCM2004</option>
														<option value="MCM60K3">MCM60K3</option>
													</select>
												</td>
											</tr-->
											<tr>
												<td></td>
												<td>Nominal Value</td>
												<td>Nominal Unit</td>
												<td>Marking</td>
												<td>Serial#</td>
												<td>Identification #</td>
												<td>Manufacturer</td>
											</tr>
											<tr>
												<td>Standard :</td>
												<td><input type="text" class="form-control" placeholder="Nominal Value" id="StandardNominalValue"></td>
												<td><input type="text" class="form-control" placeholder="Nominal Unit" id="StandardNominalUnit"></td>
												<td><input type="text" class="form-control" placeholder="Marking" id="StandardMarking"></td>
												<td><input type="text" class="form-control" placeholder="Serial Number" id="StandardSerialNumber"></td>
												<td><input type="text" class="form-control" placeholder="Identification Number" id="StandardIdNumber"></td>
												<td><input type="text" class="form-control" placeholder="Manufacturer" id="StandardManufacturer"></td>
											</tr>
											<tr>
												<td>Sample :</td>
												<td><input type="text" class="form-control" placeholder="Nominal Value" id="SampleNominalValue"></td>
												<td><input type="text" class="form-control" placeholder="Nominal Unit" id="SampleNominalUnit"></td>
												<td><input type="text" class="form-control" placeholder="Marking" id="SampleMarking"></td>
												<td><input type="text" class="form-control" placeholder="Serial Number" id="SampleSerialNumber"></td>
												<td><input type="text" class="form-control" placeholder="Identification Number" id="SampleIdNumber"></td>
												<td><input type="text" class="form-control" placeholder="Manufacturer" id="SampleManufacturer"></td>
											</tr>
											<tr>
												<td colspan="7">&nbsp</td>
											</tr>
											<tr>
												<td></td>
												<td colspan="3" style="color: green;"><h5>Start</h5></td>
												<td colspan="3" style="color: red;"><h5>Finish</h5></td>
											</tr>
											<tr>
												<td>Date:</td>
												<td colspan="3"><input type="date" class="form-control" placeholder="Date Start" id="DateStart"></td>
												<td colspan="3"><input type="date" class="form-control" placeholder="Date Finish" id="DateFinish"></td>
											</tr>
											<tr>
												<td>Time:</td>
												<td colspan="3"><input type="time" class="form-control" placeholder="Time Start" id="TimeStart"></td>
												<td colspan="3"><input type="time" class="form-control" placeholder="Time Finish" id="TimeFinish"></td>
											</tr>
											<tr>
												<td>Temperature (C):</td>
												<td colspan="3"><input type="text" class="form-control" placeholder="Temperature Start" id="TemperatureStart"></td>
												<td colspan="3"><input type="text" class="form-control" placeholder="Temperature Finish" id="TemperatureFinish"></td>
											</tr>
											<tr>
												<td>Humidity (%RH):</td>
												<td colspan="3"><input type="text" class="form-control" placeholder="Humidity Start" id="HumidityStart"></td>
												<td colspan="3"><input type="text" class="form-control" placeholder="Humidity Finish" id="HumidityFinish"></td>
											</tr>
											<tr>
												<td>Pressure (hPa):</td>
												<td colspan="3"><input type="text" class="form-control" placeholder="Pressure Start" id="PressureStart"></td>
												<td colspan="3"><input type="text" class="form-control" placeholder="Pressure Finish" id="PressureFinish"></td>
											</tr>
											<tr>
												<td colspan="7">&nbsp</td>
											</tr>
											<tr>
												<td colspan="7"><h4>Standard Used</h4></td>
											</tr>
											<tr>
												<td colspan="3">Std. Code</td>
												<td colspan="2">Conventional Mass of Standard</td>
												<td colspan="2">Uncertainty of Measurement of  Std.</td>
											</tr>
											<tr>
												<td colspan="3">
													<select class="custom-select" id="STDa1" onchange="standardChangeToInput(this.value,'ConventionalMassSTDa1','UncertaintySTDa1')">
														<option value="," selected>Choose...</option>
														<?php
															// $today = date('Y-m-d');
															// for($i = 0; $i < count($arrStandardDetails[0]); $i++){
															// 	$calibrationPlus1Year = date('Y-m-d', strtotime('+1 year', strtotime($arrStandardDetails[0][$i]['dateOfCalibration'])) );
															// 	for($i = 0; $i < count($arrStandardValues[0]); $i++){
															// 		if ($today > $calibrationPlus1Year){
															// 			echo '<option style="background-color:rgba(255,0,0, 0.5)" value="'.$arrStandardValues[0][$i]['conventionalMass'].','.$arrStandardValues[0][$i]['uncertainty'].'">'.$arrStandardValues[0][$i]['class']."-".$arrStandardValues[0][$i]['serialNumber']."-".$arrStandardValues[0][$i]['marking']."</option>";
															// 		}
															// 		else{
															// 			echo '<option style="background-color:rgba(0,255,0, 0.5)" value="'.$arrStandardValues[0][$i]['conventionalMass'].','.$arrStandardValues[0][$i]['uncertainty'].'">'.$arrStandardValues[0][$i]['class']."-".$arrStandardValues[0][$i]['serialNumber']."-".$arrStandardValues[0][$i]['marking']."</option>";
															// 		}																
															// 	}
															// }
														?>

													</select>
												</td>
												<td colspan="2"><input type="text" class="form-control" placeholder="Conventional Mass of Standard" id="ConventionalMassSTDa1"></td>
												<td colspan="2"><input type="text" class="form-control" placeholder="Uncertainty of Measurement of  Std." id="UncertaintySTDa1"></td>
											</tr>
											<tr>
												<td colspan="3">
													<select class="custom-select" id="STDb1" onchange="standardChangeToInput(this.value,'ConventionalMassSTDb1','UncertaintySTDb1')">
														<option value="," selected>Choose...</option>
														<?php
															// $today = date('Y-m-d');
															// for($i = 0; $i < count($arrStandardDetails[0]); $i++){
															// 	$calibrationPlus1Year = date('Y-m-d', strtotime('+1 year', strtotime($arrStandardDetails[0][$i]['dateOfCalibration'])) );
															// 	for($i = 0; $i < count($arrStandardValues[0]); $i++){
															// 		if ($today > $calibrationPlus1Year){
															// 			echo '<option style="background-color:rgba(255,0,0, 0.5)" value="'.$arrStandardValues[0][$i]['conventionalMass'].','.$arrStandardValues[0][$i]['uncertainty'].'">'.$arrStandardValues[0][$i]['class']."-".$arrStandardValues[0][$i]['serialNumber']."-".$arrStandardValues[0][$i]['marking']."</option>";
															// 		}
															// 		else{
															// 			echo '<option style="background-color:rgba(0,255,0, 0.5)" value="'.$arrStandardValues[0][$i]['conventionalMass'].','.$arrStandardValues[0][$i]['uncertainty'].'">'.$arrStandardValues[0][$i]['class']."-".$arrStandardValues[0][$i]['serialNumber']."-".$arrStandardValues[0][$i]['marking']."</option>";
															// 		}																
															// 	}
															// }
														?>
													</select>
												</td>
												<td colspan="2"><input type="text" class="form-control" placeholder="Conventional Mass of Standard" id="ConventionalMassSTDb1"></td>
												<td colspan="2"><input type="text" class="form-control" placeholder="Uncertainty of Measurement of  Std." id="UncertaintySTDb1"></td>
											</tr>
											<tr>
												<td colspan="3">
													<select class="custom-select" id="STDc1" onchange="standardChangeToInput(this.value,'ConventionalMassSTDc1','UncertaintySTDc1')">
														<option value="," selected>Choose...</option>
														<?php
															// $today = date('Y-m-d');
															// for($i = 0; $i < count($arrStandardDetails[0]); $i++){
															// 	$calibrationPlus1Year = date('Y-m-d', strtotime('+1 year', strtotime($arrStandardDetails[0][$i]['dateOfCalibration'])) );
															// 	for($i = 0; $i < count($arrStandardValues[0]); $i++){
															// 		if ($today > $calibrationPlus1Year){
															// 			echo '<option style="background-color:rgba(255,0,0, 0.5)" value="'.$arrStandardValues[0][$i]['conventionalMass'].','.$arrStandardValues[0][$i]['uncertainty'].'">'.$arrStandardValues[0][$i]['class']."-".$arrStandardValues[0][$i]['serialNumber']."-".$arrStandardValues[0][$i]['marking']."</option>";
															// 		}
															// 		else{
															// 			echo '<option style="background-color:rgba(0,255,0, 0.5)" value="'.$arrStandardValues[0][$i]['conventionalMass'].','.$arrStandardValues[0][$i]['uncertainty'].'">'.$arrStandardValues[0][$i]['class']."-".$arrStandardValues[0][$i]['serialNumber']."-".$arrStandardValues[0][$i]['marking']."</option>";
															// 		}																
															// 	}
															// }
														?>
													</select>
												</td>
												<td colspan="2"><input type="text" class="form-control" placeholder="Conventional Mass of Standard" id="ConventionalMassSTDc1"></td>
												<td colspan="2"><input type="text" class="form-control" placeholder="Uncertainty of Measurement of  Std." id="UncertaintySTDc1"></td>
											</tr>
											<tr>
												<td colspan="3">
													<select class="custom-select" id="STDd1" onchange="standardChangeToInput(this.value,'ConventionalMassSTDd1','UncertaintySTDd1')">
														<option value="," selected>Choose...</option>
														<?php
															// $today = date('Y-m-d');
															// for($i = 0; $i < count($arrStandardDetails[0]); $i++){
															// 	$calibrationPlus1Year = date('Y-m-d', strtotime('+1 year', strtotime($arrStandardDetails[0][$i]['dateOfCalibration'])) );
															// 	for($i = 0; $i < count($arrStandardValues[0]); $i++){
															// 		if ($today > $calibrationPlus1Year){
															// 			echo '<option style="background-color:rgba(255,0,0, 0.5)" value="'.$arrStandardValues[0][$i]['conventionalMass'].','.$arrStandardValues[0][$i]['uncertainty'].'">'.$arrStandardValues[0][$i]['class']."-".$arrStandardValues[0][$i]['serialNumber']."-".$arrStandardValues[0][$i]['marking']."</option>";
															// 		}
															// 		else{
															// 			echo '<option style="background-color:rgba(0,255,0, 0.5)" value="'.$arrStandardValues[0][$i]['conventionalMass'].','.$arrStandardValues[0][$i]['uncertainty'].'">'.$arrStandardValues[0][$i]['class']."-".$arrStandardValues[0][$i]['serialNumber']."-".$arrStandardValues[0][$i]['marking']."</option>";
															// 		}																
															// 	}
															// }
														?>
													</select>
												</td>
												<td colspan="2"><input type="text" class="form-control" placeholder="Conventional Mass of Standard" id="ConventionalMassSTDd1"></td>
												<td colspan="2"><input type="text" class="form-control" placeholder="Uncertainty of Measurement of  Std." id="UncertaintySTDd1"></td>
											</tr>
											<tr>
												<td colspan="3">
													<select class="custom-select" id="STDe1" onchange="standardChangeToInput(this.value,'ConventionalMassSTDe1','UncertaintySTDe1')">
														<option value="," selected>Choose...</option>
														<?php
															// $today = date('Y-m-d');
															// for($i = 0; $i < count($arrStandardDetails[0]); $i++){
															// 	$calibrationPlus1Year = date('Y-m-d', strtotime('+1 year', strtotime($arrStandardDetails[0][$i]['dateOfCalibration'])) );
															// 	for($i = 0; $i < count($arrStandardValues[0]); $i++){
															// 		if ($today > $calibrationPlus1Year){
															// 			echo '<option style="background-color:rgba(255,0,0, 0.5)" value="'.$arrStandardValues[0][$i]['conventionalMass'].','.$arrStandardValues[0][$i]['uncertainty'].'">'.$arrStandardValues[0][$i]['class']."-".$arrStandardValues[0][$i]['serialNumber']."-".$arrStandardValues[0][$i]['marking']."</option>";
															// 		}
															// 		else{
															// 			echo '<option style="background-color:rgba(0,255,0, 0.5)" value="'.$arrStandardValues[0][$i]['conventionalMass'].','.$arrStandardValues[0][$i]['uncertainty'].'">'.$arrStandardValues[0][$i]['class']."-".$arrStandardValues[0][$i]['serialNumber']."-".$arrStandardValues[0][$i]['marking']."</option>";
															// 		}																
															// 	}
															// }
														?>
													</select>
												</td>
												<td colspan="2"><input type="text" class="form-control" placeholder="Conventional Mass of Standard" id="ConventionalMassSTDe1"></td>
												<td colspan="2"><input type="text" class="form-control" placeholder="Uncertainty of Measurement of  Std." id="UncertaintySTDe1"></td>
											</tr>
											<tr>
												<td colspan="2">Total</td>
												<td>
													<button type="button" class="btn btn-warning" onclick="totalConventionalUncertainty('1')">
													<i class="fas fa-calculator"></i>	
													Add
													</button>
												</td>
												<td colspan="2"><input type="text" class="form-control" placeholder="Conventional Mass of Standard Total" id="ConventionalMassTotal1"></td>
												<td colspan="2"><input type="text" class="form-control" placeholder="Uncertainty of Measurement of  Std. Total" id="UncertaintySTDTotal1"></td>
											</tr>
											<tr>
												<td colspan="7">&nbsp</td>
											</tr>
											<tr>
												<td colspan="3"></td>
												<td>Raw Data</td>
												<td><select id="unitRawData"><option value="mg">mg</option><option value="g" selected>g</option><option value="kg">kg</option></select></td>
												<td colspan="2"></td>
											</tr>
											<tr>
												<td></td>
												<td>Cycle</td>
												<td>S</td>
												<td>T</td>
												<td>T</td>
												<td>S</td>
												<td></td>
											</tr>
											
										</tbody>
									</table>
									

									<div id="TableDiv">

									</div>
									
					</div>
						<!-- Tables -->
						<!-- IMAGE -->
							
							<div class="row">
								<div class="col-12">
									<input type="file" name="image" accept="image/*" id="imageInput" onchange="loadFile(event)">
									<img id="output"/>
								</div>	
							</div>
						<!-- IMAGE -->
							<br>
							<div class='row'>
								<div class="col">
									<Button type="button" class="btn btn-lg btn-primary translate-middle" onclick="submitForm('testWeightForm')">
										<i class="fas fa-folder-plus"></i> 
										Insert Data
									</Button>
								</div>
							</div> 
							<br>
						</form>

						
				</div>
			</div>
			<div class="row">
				<div class="col-12">
				<button type="button" class="btn btn-warning saveButton" data-toggle="modal" data-target="#confirmationModal" style="top: 350; right: 50;">
					<i class="fas fa-save" style="font-size: 50px;"></i>
				</button>
				</div>
			</div>
<!-- modal for Confirmation -->
			<div class="modal fade" id="confirmationModal" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Changes have been made.</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							Would you like to save? 
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Dismiss</button>
							<button type="button" class="btn btn-primary" onclick="confirmationSave('testWeightForm')">Save changes</button>
						</div>
					</div>
				</div>
			</div>
<!-- modal for Confirmation -->

</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<!--Formula.js-->
<script src="https://cdn.jsdelivr.net/npm/jstat@1.9.2/dist/jstat.min.js"></script> 
<script src="https://cdn.jsdelivr.net/gh/formulajs/formulajs@2.5.0/dist/formula.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script>
	$("#menu-toggle").click(function(e) {
	e.preventDefault();
	$("#wrapper").toggleClass("toggled");
	});

	var isSubmitting = false

	$(document).ready(function () {
		$('#testWeightForm').submit(function(){
			isSubmitting = true
		})

		$('#testWeightForm').data('initial-state', $('#testWeightForm').serialize());

		$(window).on('beforeunload', function(e) {
			if (!isSubmitting && $('#testWeightForm').serialize() != $('#testWeightForm').data('initial-state')){
				return 'You have unsaved changes which will not be saved.'
			}
		});
	})

	function openModal(modalId){
		$(modalId).modal('toggle');
	}
	
	function confirmationSave(idOfForm){
		document.getElementById('completion').value = "Not Completed";
		try {
			getInputValueFromTables();
		} catch (error) {
			console.log(error)
		}
		
		document.getElementById(idOfForm).submit();
	}

	function submitForm(idOfForm){
		document.getElementById('completion').value = "Complete";
		document.getElementById(idOfForm).submit();
	}

</script>
<!-- script with formulas -->
<script>
	var sensitivityTest = <?= json_encode($sensitivityTestValues)?>;
	var arrStandardDetails = <?= json_encode($arrStandardDetails[0])?>;
	var arrStandardValues = <?= json_encode($arrStandardValues[0])?>;
	var numberOfTables = 1;
	

	function filterData(searchingFor, UnfilteredArray){
		let filteredDATA = UnfilteredArray.filter(function (e) {
				if (searchingFor == searchingFor) {
					return e.serialNumber == searchingFor;
				}
			});

		return filteredDATA;
	}

	function addStandard(tableNumber){
		var dateToday = new Date();
		var dd = String(dateToday.getDate()).padStart(2, '0');
		var mm = String(dateToday.getMonth() + 1).padStart(2, '0'); //January is 0!
		var yyyy = dateToday.getFullYear();
		dateToday = yyyy + '-' + mm + '-' + dd;

		var select = document.getElementById(tableNumber);

		for (let index = 0; index < arrStandardDetails.length; index++) {
			var forComparison = filterData(arrStandardDetails[index]['serialNumber'],arrStandardValues)
			if(arrStandardDetails[index]['dateOfCalibration'] < dateToday){
				for (let i = 0; i < forComparison.length; i++) {
					var opt = document.createElement('option');
					opt.value = forComparison[i]['conventionalMass']+","+forComparison[i]['uncertainty'];
					opt.innerHTML = forComparison[i]['class']+"-"+forComparison[i]['serialNumber']+"-"+forComparison[i]['nominalValue']+"-"+forComparison[i]['nominalUnit'];
					opt.setAttribute('style',"background-color:rgba(255,0,0, 0.5)");
					select.appendChild(opt);
				}
			}else{
				for (let i = 0; i < forComparison.length; i++) {
					var opt = document.createElement('option');
					opt.value = forComparison[i]['conventionalMass']+","+forComparison[i]['uncertainty'];
					opt.innerHTML = forComparison[i]['class']+"-"+forComparison[i]['serialNumber']+"-"+forComparison[i]['nominalValue']+"-"+forComparison[i]['nominalUnit'];
					opt.setAttribute('style',"background-color:rgba(0,255,0, 0.5)");
					select.appendChild(opt);
				}
			}
		}
	}

	addStandard('STDa1');	
	addStandard('STDb1');
	addStandard('STDc1');
	addStandard('STDd1');
	addStandard('STDe1');

	// in excel is missing
	//M N O P Q R X Y Z AA in excel is Inputted

	function differenceMCI(T1,T2,S1,S2){
		//A in excel
		return ((parseFloat(T1)+parseFloat(T2))/2)-((parseFloat(S1)+parseFloat(S2))/2);
	}
	function differenceAve(values){
		//B in excel
		//values must be array
		var average = 0;
		for(i=0;i<values.length;i++){
			average += values[i];
		}
		return average/values.length;
	}
	function standardDeviationOfMCI(values){
		//C in excel
		//values must be array
		var Max = Math.max.apply(null,values);
		var Min = Math.min.apply(null,values);		
		var Result = (Max-Min)/(2 * Math.sqrt(3));
		return Result;
	}
	function CMSample(unit,CMofStandard,correctionAirBuoyancy,AverageOfDmc){
		//D in excel 
		// old formula CMofStandard+AverageOfDmc before convert
		var result;
		if(unit=="kg"){
			result = ((CMofStandard*correctionAirBuoyancy)+AverageOfDmc)/1000;
		}
		if(unit=="g"){
			result = ((CMofStandard*correctionAirBuoyancy)+AverageOfDmc);
		}
		if(unit=="mg"){
			result = ((CMofStandard*correctionAirBuoyancy)+AverageOfDmc)*1000;
		}
		return result;
	}
	function airBuoyancyCorrection(densityReference,densitySample,computedDensityUsingMeasuredPressureTempRH,conventionalAirDensity){
		if(densityReference == densitySample){
			return 1;
		}
		else{
			return (1+((computedDensityUsingMeasuredPressureTempRH-conventionalAirDensity)*((1/densitySample)-(1/densityReference))))
		}
	}
	//(1+((AS31-AT31)*((1/AV31)-(1/AW31))))
	function deviation(CMSample,nominalValue){
		//E in excel
		var result = CMSample - nominalValue;
		return result;
	}
	function uncertSensitivityOfBalanceU(UWeighingProcess,standardUncertOfSensitivityWeight,sensitivityWeight,standardDevOfMCI,cycle){
		//I in excel
		var result = ((Math.pow(UWeighingProcess,2))*(((Math.pow(standardUncertOfSensitivityWeight,2))/(Math.pow(sensitivityWeight,2)))+(standardDevOfMCI/Math.sqrt(cycle)/sensitivityWeight)))
		return result;
	}
	function uncertResolutionOfBalanceU(balanceReso){
		//J in excel
		var result = (((balanceReso/2)/(Math.sqrt(3))))*(Math.sqrt(2));
		return result;
	}
	function uncertEccentricLoadingU(difBetMaxMinVal){
		//K in excel
		var result = difBetMaxMinVal / (2*Math.sqrt(3));
		return result;
	}
	function TempAve(tempStart, tempFinish){
		//S in excel
		var result = (tempStart + tempFinish)/2
		return result;
	}
	function RHAve(RHStart, RHFinish){
		//T in excel
		var result = (RHStart + RHFinish)/2
		return result;
	}
	function APAve(APStart, APFinish){
		//U in excel
		var result = (APStart + APFinish)/2
		return result;
	}
	function computedDensityUsingMeasuredPressureTempRH(AP,RH,Temp){
		//V in excel
		var result = ((0.34848*AP-(0.009*RH)*Math.exp((0.061*Temp)))/(273.15+Temp))
		return result;
	}
	function standardUncertDensityOfSampleWeight(uncertOfStandarSample){
		//AB in excel
		var result = uncertOfStandarSample/2
		return result;
	}
	function standardUncertDensityOfReferenceWeight(uncertOfStandarReference){
		//AC in excel
		var result = uncertOfStandarReference/2
		return result;
	}
	function standardUncertApproxAirDensity(computedDensity){
		//AD in excel
		var result = (2*(Math.exp(-4))) * computedDensity;
		return result;
	}
	function standardUncertaintyAirBuoyancyCorrectionFactor(
		conventionalMassOfStandard,
		densityOfReference,
		densityOfSample, 
		standardUncertApproxAirDensity,
		computedDensity,
		conventionalAirDensity,
		standardUncertDensitySample,
		standardUncertDensityReference,
		prevAirDensity
		){
			/*
				r	conventionalMassOfStandard,
				aw	densityOfReference,
				av	densityOfSample, 
				bb	standardUncertApproxAirDensity,
				as	computedDensity,
				at	conventionalAirDensity,
				az	standardUncertDensitySample,
				ba	standardUncertDensityReference,
				au	prevAirDensity
			*/
		//AE in excel ((((R*((AW-AV)/(AW*AV))*(BB)))^2)+(((R*(AS-AT))^2)*((AZ^2)/(AV^4)))+((((R^2)*(AS-AT))*((AS-AT)-(2*(AU-AT)))*((BA^2)/(AW^4)))))
		/*
			old formula
			var result = Math.sqrt(((conventionalMassOfStandard*
				Math.pow((((densityOfReference-densityOfSample)/densityOfReference*densityOfSample)*standardUncertApproxAirDensity),2)
				+(Math.pow((conventionalMassOfStandard*(computedDensity-conventionalAirDensity)),2)
				*(Math.pow(standardUncertDensitySample,2))/(Math.pow(densityOfSample,4)))
				+Math.pow(conventionalMassOfStandard,2)*(computedDensity-conventionalAirDensity)*
				((computedDensity-conventionalAirDensity)-2*(conventionalAirDensity-conventionalAirDensity))*
				(Math.pow(standardUncertDensityReference,2)/Math.pow(densityOfReference,4)))))

			new formula
			((Math.pow((conventionalMassOfStandard*((densityOfReference-densityOfSample)/(densityOfReference*densityOfSample))*(standardUncertApproxAirDensity)),2))+((Math.pow((conventionalMassOfStandard*(computedDensity-conventionalAirDensity)),2))*(((Math.pow(standardUncertDensitySample,2))/(Math.pow(densityOfSample,4)))))+((((Math.pow(conventionalMassOfStandard,2))*(computedDensity-conventionalAirDensity))*((computedDensity-conventionalAirDensity)-(2*(prevAirDensity-conventionalAirDensity)))*((Math.pow(standardUncertDensityReference,2))/(Math.pow(densityOfReference,4))))))	
			((Math.pow((R*((AW-AV)/(AW*AV))*(BB)),2))+((Math.pow((R*(AS-AT)),2))*(((Math.pow(AZ,2))/(Math.pow(AV,4)))))+((((Math.pow(R,2))*(AS-AT))*((AS-AT)-(2*(AU-AT)))*((Math.pow(BA,2))/(Math.pow(AW,4))))))
			*/
		var result = ((Math.pow((conventionalMassOfStandard*((densityOfReference-densityOfSample)/(densityOfReference*densityOfSample))*(standardUncertApproxAirDensity)),2))+((Math.pow((conventionalMassOfStandard*(computedDensity-conventionalAirDensity)),2))*(((Math.pow(standardUncertDensitySample,2))/(Math.pow(densityOfSample,4)))))+((((Math.pow(conventionalMassOfStandard,2))*(computedDensity-conventionalAirDensity))*((computedDensity-conventionalAirDensity)-(2*(prevAirDensity-conventionalAirDensity)))*((Math.pow(standardUncertDensityReference,2))/(Math.pow(densityOfReference,4))))))
		return result;
	}
	function standardUncertConventionalMassOfReference(MPEOfUUCUncertaityofStandard,k){
		//AF in excel
		// old formula Math.sqrt(Math.pow((MPEOfUUCUncertaityofStandard/k),2)+(Math.pow((MPEOfUUCUncertaityofStandard/k),2)))
		var result = MPEOfUUCUncertaityofStandard/k;
		return result;
	}
	function standardUncertaintyWeighingProcess(standardDeviationOfMCI,cycle){
		//AG in excel
		var result = standardDeviationOfMCI/(Math.sqrt(cycle))
		return result;
	}
	function standardUncertaintyBalance(uncertSensiBalance,uncertResoBalance,uncertEccentLoading,uncertMagneticSusceptibility){
		//AH in excel
		var result = Math.sqrt(Math.pow(uncertSensiBalance,2)+Math.pow(uncertResoBalance,2)+Math.pow(uncertEccentLoading,2)+Math.pow(uncertMagneticSusceptibility,2))
		return result;
	}
	function uc(array){
		return sumOfSquare(array)
	}
	function ue(uc,k){
		return uc*k; 
	}
	function ueINmg(ue,unit){
		var result;
		if(unit == "kg"){
			result = ue*1000000;
		}
		if(unit == "g"){
			result = ue*1000;
		}
		if(unit == "mg"){
			result = ue;
		}
		return result; 
	}

	function tableCreate() {
		numberOfTables += 1;
		var approxClass = document.getElementById('approxClass').value;
		var body = document.getElementById('TableDiv');

		var tbl = document.createElement('table');
		tbl.className = 'table text-center table-bordered table-sm';
		tbl.setAttribute('id', 'Table'+numberOfTables);

		var thead = document.createElement('thead');
		var trHead = document.createElement('tr');
		var thHead = document.createElement('th');
		thHead.setAttribute('colspan','7');
		thHead.innerHTML = "Calibration Information #"+numberOfTables;

		trHead.appendChild(thHead);
		thead.appendChild(trHead);

		var tbdy = document.createElement('tbody');

		var hr = document.createElement('hr');
		//new row density label
			var trDensityLabel = document.createElement('tr');
			var tdNewDensitya = document.createElement('td');
			var tdNewDensityb = document.createElement('td');
			var tdNewDensityc = document.createElement('td');
			var tdNewDensityd = document.createElement('td');
			var tdNewDensitye = document.createElement('td');
			var tdNewDensityaa = document.createElement('td');
			var tdNewDensitybb = document.createElement('td');
			tdNewDensitye.innerHTML = "Air density during the (previous) calibration of the reference (kg/m3):";
			tdNewDensitya.innerHTML = "Density of Sample  (kg/m3)";
			tdNewDensityb.innerHTML = "Densty of Reference  (kg/m3)";
			tdNewDensityc.innerHTML = "Uncertainty of Density Sample";
			tdNewDensityd.innerHTML = "Uncertainty of Density Reference";

			trDensityLabel.appendChild(tdNewDensityaa);
			trDensityLabel.appendChild(tdNewDensitye);
			trDensityLabel.appendChild(tdNewDensitya);
			trDensityLabel.appendChild(tdNewDensityb);
			trDensityLabel.appendChild(tdNewDensityc);
			trDensityLabel.appendChild(tdNewDensityd);
			trDensityLabel.appendChild(tdNewDensitybb);
		
		//new row density label
		//new row density input
			var trDensityInput = document.createElement('tr');
			var tdNewDensityInputa = document.createElement('td');
			var tdNewDensityInputb = document.createElement('td');
			var tdNewDensityInputc = document.createElement('td');
			var tdNewDensityInputd = document.createElement('td');
			var tdNewDensityInpute = document.createElement('td');
			var tdNewDensityInputaa = document.createElement('td');
			var tdNewDensityInputbb = document.createElement('td');
			var tdNewDensityInputaI = document.createElement('input');
			var tdNewDensityInputbI = document.createElement('input');
			var tdNewDensityInputcI = document.createElement('input');
			var tdNewDensityInputdI = document.createElement('input');
			var tdNewDensityInputeI = document.createElement('input');

			tdNewDensityInputaI.setAttribute('type',"text");
			tdNewDensityInputbI.setAttribute('type',"text");
			tdNewDensityInputcI.setAttribute('type',"text");
			tdNewDensityInputdI.setAttribute('type',"text");
			tdNewDensityInputeI.setAttribute('type',"text");
			tdNewDensityInputaI.setAttribute('class',"form-control");
			tdNewDensityInputbI.setAttribute('class',"form-control");
			tdNewDensityInputcI.setAttribute('class',"form-control");
			tdNewDensityInputdI.setAttribute('class',"form-control");
			tdNewDensityInputeI.setAttribute('class',"form-control");
			tdNewDensityInputaI.setAttribute('placeholder',"Density of Sample  (kg/m3)");
			tdNewDensityInputbI.setAttribute('placeholder',"Densty of Reference  (kg/m3)");
			tdNewDensityInputcI.setAttribute('placeholder',"Uncertainty of Density Sample");
			tdNewDensityInputdI.setAttribute('placeholder',"Uncertainty of Density Reference");
			tdNewDensityInputeI.setAttribute('placeholder',"Previous Air Density");
			tdNewDensityInputaI.setAttribute('id',"densitySample");
			tdNewDensityInputbI.setAttribute('id',"densityReference");
			tdNewDensityInputcI.setAttribute('id',"uncertDensitySample");
			tdNewDensityInputdI.setAttribute('id',"uncertDensityReference");
			tdNewDensityInputeI.setAttribute('id',"prevAirDensity");

			tdNewDensityInputa.appendChild(tdNewDensityInputaI);
			tdNewDensityInputb.appendChild(tdNewDensityInputbI);
			tdNewDensityInputc.appendChild(tdNewDensityInputcI);
			tdNewDensityInputd.appendChild(tdNewDensityInputdI);
			tdNewDensityInpute.appendChild(tdNewDensityInputeI);
			trDensityInput.appendChild(tdNewDensityInputaa);
			trDensityInput.appendChild(tdNewDensityInpute);
			trDensityInput.appendChild(tdNewDensityInputa);
			trDensityInput.appendChild(tdNewDensityInputb);
			trDensityInput.appendChild(tdNewDensityInputc);
			trDensityInput.appendChild(tdNewDensityInputd);
			trDensityInput.appendChild(tdNewDensityInputbb);
		//new row density input
		//new row k balanceReso SC
			var trNew = document.createElement('tr');
			var tdNewa = document.createElement('td');
			var tdNewb = document.createElement('td');
			var tdNewc = document.createElement('td');
			var tdNewd = document.createElement('td');
			var tdNewe = document.createElement('td');
			var tdNewf = document.createElement('td');
			var tdNewaa = document.createElement('input');
			var tdNewab = document.createElement('input');
			var tdNewac = document.createElement('input');
			tdNewa.innerHTML = "K";
			tdNewc.innerHTML = "Balance Resolution";
			tdNewe.innerHTML = "SC";
			tdNewd.setAttribute('colspan','2');
			tdNewaa.setAttribute('type','text');
			tdNewab.setAttribute('type','text');
			tdNewac.setAttribute('type','text');
			tdNewaa.setAttribute('class','form-control');
			tdNewab.setAttribute('class','form-control');
			tdNewac.setAttribute('class','form-control');
			tdNewaa.setAttribute('placeholder','k');
			tdNewab.setAttribute('placeholder','Balance Resolution');
			tdNewac.setAttribute('placeholder','SC');
			tdNewaa.setAttribute('id','k');
			tdNewab.setAttribute('id','balanceReso');
			tdNewac.setAttribute('id','sc');

			tdNewb.appendChild(tdNewaa);
			tdNewd.appendChild(tdNewab);
			tdNewf.appendChild(tdNewac);
			trNew.appendChild(tdNewa);
			trNew.appendChild(tdNewb);
			trNew.appendChild(tdNewc);
			trNew.appendChild(tdNewd);
			trNew.appendChild(tdNewe);
			trNew.appendChild(tdNewf);
		//new row k balanceReso SC
		//1st row
			var tr1 = document.createElement('tr');
			var td1a = document.createElement('td');
			var td1b = document.createElement('td');
			var select1 = document.createElement('select');
			var option1 = document.createElement('option');
			var option2 = document.createElement('option');
			var option3 = document.createElement('option');
			var option4 = document.createElement('option');
			td1a.innerHTML = "Comparator";
			td1b.setAttribute('colspan','6');
			select1.className = 'custom-select';
			select1.setAttribute('id','comparator');
			option1.setAttribute('selected','');
			option2.setAttribute('value','XPE2006 DR');
			option3.setAttribute('value','MCM2004');
			option4.setAttribute('value','MCM60K3');
			option1.innerHTML = "Choose . . .";
			option2.innerHTML = "XPE2006 DR";
			option3.innerHTML = "MCM2004";
			option4.innerHTML = "MCM60K3";

			select1.appendChild(option1);
			select1.appendChild(option2);
			select1.appendChild(option3);
			select1.appendChild(option4);
			td1b.appendChild(select1);
			tr1.appendChild(td1a);
			tr1.appendChild(td1b);
		//1st row
		//2nd row
			var tr2 = document.createElement('tr');
			var td2a = document.createElement('td');
			var td2b = document.createElement('td');
			var td2c = document.createElement('td');
			var td2d = document.createElement('td');
			var td2e = document.createElement('td');
			var td2f = document.createElement('td');
			var td2g = document.createElement('td');
			td2b.innerHTML = "Nominal Value";
			td2c.innerHTML = "Nominal Unit";
			td2d.innerHTML = "Marking";
			td2e.innerHTML = "Serial#";
			td2f.innerHTML = "Identification #";
			td2g.innerHTML = "Manufacturer";

			tr2.appendChild(td2a);
			tr2.appendChild(td2b);
			tr2.appendChild(td2c);
			tr2.appendChild(td2d);
			tr2.appendChild(td2e);
			tr2.appendChild(td2f);
			tr2.appendChild(td2g);
		//2nd row
		//3rd row
			var tr3 = document.createElement('tr');
			var td3a = document.createElement('td');
			var td3b = document.createElement('td');
			var td3c = document.createElement('td');
			var td3d = document.createElement('td');
			var td3e = document.createElement('td');
			var td3f = document.createElement('td');
			var td3g = document.createElement('td');
			var td3aa = document.createElement('input');
			var td3ab = document.createElement('input');
			var td3ac = document.createElement('input');
			var td3ad = document.createElement('input');
			var td3ae = document.createElement('input');
			var td3af = document.createElement('input');
			td3a.innerHTML = "Standard :";
			td3aa.setAttribute('type','text');
			td3ab.setAttribute('type','text');
			td3ac.setAttribute('type','text');
			td3ad.setAttribute('type','text');
			td3ae.setAttribute('type','text');
			td3af.setAttribute('type','text');
			td3aa.setAttribute('class','form-control');
			td3ab.setAttribute('class','form-control');
			td3ac.setAttribute('class','form-control');
			td3ad.setAttribute('class','form-control');
			td3ae.setAttribute('class','form-control');
			td3af.setAttribute('class','form-control');
			td3aa.setAttribute('placeholder','Nominal Value');
			td3ab.setAttribute('placeholder','Nominal Unit');
			td3ac.setAttribute('placeholder','Marking');
			td3ad.setAttribute('placeholder','Serial Number');
			td3ae.setAttribute('placeholder','Identification Number');
			td3af.setAttribute('placeholder','Manufacturer');
			td3aa.setAttribute('id','StandardNominalValue');
			td3ab.setAttribute('id','StandardNominalUnit');
			td3ac.setAttribute('id','StandardMarking');
			td3ad.setAttribute('id','StandardSerialNumber');
			td3ae.setAttribute('id','StandardIdNumber');
			td3af.setAttribute('id','StandardManufacturer');

			td3b.appendChild(td3aa);
			td3c.appendChild(td3ab);
			td3d.appendChild(td3ac);
			td3e.appendChild(td3ad);
			td3f.appendChild(td3ae);
			td3g.appendChild(td3af);
			tr3.appendChild(td3a);
			tr3.appendChild(td3b);
			tr3.appendChild(td3c);
			tr3.appendChild(td3d);
			tr3.appendChild(td3e);
			tr3.appendChild(td3f);
			tr3.appendChild(td3g);
		//3rd row
		//4th row
			var tr4 = document.createElement('tr');
			var td4a = document.createElement('td');
			var td4b = document.createElement('td');
			var td4c = document.createElement('td');
			var td4d = document.createElement('td');
			var td4e = document.createElement('td');
			var td4f = document.createElement('td');
			var td4g = document.createElement('td');
			var td4aa = document.createElement('input');
			var td4ab = document.createElement('input');
			var td4ac = document.createElement('input');
			var td4ad = document.createElement('input');
			var td4ae = document.createElement('input');
			var td4af = document.createElement('input');
			td4a.innerHTML = "Standard :";
			td4aa.setAttribute('type','text');
			td4ab.setAttribute('type','text');
			td4ac.setAttribute('type','text');
			td4ad.setAttribute('type','text');
			td4ae.setAttribute('type','text');
			td4af.setAttribute('type','text');
			td4aa.setAttribute('class','form-control');
			td4ab.setAttribute('class','form-control');
			td4ac.setAttribute('class','form-control');
			td4ad.setAttribute('class','form-control');
			td4ae.setAttribute('class','form-control');
			td4af.setAttribute('class','form-control');
			td4aa.setAttribute('placeholder','Nominal Value');
			td4ab.setAttribute('placeholder','Nominal Unit');
			td4ac.setAttribute('placeholder','Marking');
			td4ad.setAttribute('placeholder','Serial Number');
			td4ae.setAttribute('placeholder','Identification Number');
			td4af.setAttribute('placeholder','Manufacturer');
			td4aa.setAttribute('id','SampleNominalValue');
			td4ab.setAttribute('id','SampleNominalUnit');
			td4ac.setAttribute('id','SampleMarking');
			td4ad.setAttribute('id','SampleSerialNumber');
			td4ae.setAttribute('id','SampleIdNumber');
			td4af.setAttribute('id','SampleManufacturer');

			td4b.appendChild(td4aa);
			td4c.appendChild(td4ab);
			td4d.appendChild(td4ac);
			td4e.appendChild(td4ad);
			td4f.appendChild(td4ae);
			td4g.appendChild(td4af);
			tr4.appendChild(td4a);
			tr4.appendChild(td4b);
			tr4.appendChild(td4c);
			tr4.appendChild(td4d);
			tr4.appendChild(td4e);
			tr4.appendChild(td4f);
			tr4.appendChild(td4g);
		//4th row
		//5th row
			var tr5 = document.createElement('tr');
			var td5a = document.createElement('td');
			var td5b = document.createElement('td');		
			var td5c = document.createElement('td');
			td5b.setAttribute('colspan','3');
			td5c.setAttribute('colspan','3');
			td5b.innerHTML = "Start";
			td5c.innerHTML = "Finish";

			tr5.appendChild(td5a);
			tr5.appendChild(td5b);
			tr5.appendChild(td5c);
		//5th row
		//6th row
			var tr6 = document.createElement('tr');
			var td6a = document.createElement('td');
			var td6b = document.createElement('td');		
			var td6c = document.createElement('td');
			var td6aa = document.createElement('input');
			var td6ab = document.createElement('input');
			td6a.innerHTML = "Date:";
			td6b.setAttribute('colspan','3');
			td6c.setAttribute('colspan','3');
			td6aa.setAttribute('type','date');
			td6ab.setAttribute('type','date');
			td6aa.setAttribute('class','form-control');
			td6ab.setAttribute('class','form-control');
			td6aa.setAttribute('placeholder','Date Start');
			td6ab.setAttribute('placeholder','Date Finish');
			td6aa.setAttribute('id','DateStart');
			td6ab.setAttribute('id','DateFinish');

			td6b.appendChild(td6aa);
			td6c.appendChild(td6ab);
			tr6.appendChild(td6a);
			tr6.appendChild(td6b);
			tr6.appendChild(td6c);
		//6th row
		//7th row
			var tr7 = document.createElement('tr');
			var td7a = document.createElement('td');
			var td7b = document.createElement('td');		
			var td7c = document.createElement('td');
			var td7aa = document.createElement('input');
			var td7ab = document.createElement('input');
			td7a.innerHTML = "Time:";
			td7b.setAttribute('colspan','3');
			td7c.setAttribute('colspan','3');
			td7aa.setAttribute('type','time');
			td7ab.setAttribute('type','time');
			td7aa.setAttribute('class','form-control');
			td7ab.setAttribute('class','form-control');
			td7aa.setAttribute('placeholder','Time Start');
			td7ab.setAttribute('placeholder','Time Finish');
			td7aa.setAttribute('id','TimeStart');
			td7ab.setAttribute('id','TimeFinish');

			td7b.appendChild(td7aa);
			td7c.appendChild(td7ab);
			tr7.appendChild(td7a);
			tr7.appendChild(td7b);
			tr7.appendChild(td7c);
		//7th row
		//8th row
			var tr8 = document.createElement('tr');
			var td8a = document.createElement('td');
			var td8b = document.createElement('td');		
			var td8c = document.createElement('td');
			var td8aa = document.createElement('input');
			var td8ab = document.createElement('input');
			td8a.innerHTML = "Temperature (C):";
			td8b.setAttribute('colspan','3');
			td8c.setAttribute('colspan','3');
			td8aa.setAttribute('type','text');
			td8ab.setAttribute('type','text');
			td8aa.setAttribute('class','form-control');
			td8ab.setAttribute('class','form-control');
			td8aa.setAttribute('placeholder','Temperature Start');
			td8ab.setAttribute('placeholder','Temperature Finish');
			td8aa.setAttribute('id','TemperatureStart');
			td8ab.setAttribute('id','TemperatureFinish');

			td8b.appendChild(td8aa);
			td8c.appendChild(td8ab);
			tr8.appendChild(td8a);
			tr8.appendChild(td8b);
			tr8.appendChild(td8c);
		//8th row
		//9th row
			var tr9 = document.createElement('tr');
			var td9a = document.createElement('td');
			var td9b = document.createElement('td');		
			var td9c = document.createElement('td');
			var td9aa = document.createElement('input');
			var td9ab = document.createElement('input');
			td9a.innerHTML = "Humidity (%RH):";
			td9b.setAttribute('colspan','3');
			td9c.setAttribute('colspan','3');
			td9aa.setAttribute('type','text');
			td9ab.setAttribute('type','text');
			td9aa.setAttribute('class','form-control');
			td9ab.setAttribute('class','form-control');
			td9aa.setAttribute('placeholder','Humidity Start');
			td9ab.setAttribute('placeholder','Humidity Finish');
			td9aa.setAttribute('id','HumidityStart');
			td9ab.setAttribute('id','HumidityFinish');

			td9b.appendChild(td9aa);
			td9c.appendChild(td9ab);
			tr9.appendChild(td9a);
			tr9.appendChild(td9b);
			tr9.appendChild(td9c);
		//9th row
		//10th row
			var tr10 = document.createElement('tr');
			var td10a = document.createElement('td');
			var td10b = document.createElement('td');		
			var td10c = document.createElement('td');
			var td10aa = document.createElement('input');
			var td10ab = document.createElement('input');
			td10a.innerHTML = "Pressure (hPa):";
			td10b.setAttribute('colspan','3');
			td10c.setAttribute('colspan','3');
			td10aa.setAttribute('type','text');
			td10ab.setAttribute('type','text');
			td10aa.setAttribute('class','form-control');
			td10ab.setAttribute('class','form-control');
			td10aa.setAttribute('placeholder','Pressure Start');
			td10ab.setAttribute('placeholder','Pressure Finish');
			td10aa.setAttribute('id','PressureStart');
			td10ab.setAttribute('id','PressureFinish');

			td10b.appendChild(td10aa);
			td10c.appendChild(td10ab);
			tr10.appendChild(td10a);
			tr10.appendChild(td10b);
			tr10.appendChild(td10c);
		//10th row
		//11th row
			var tr11 = document.createElement('tr');
			var td11a = document.createElement('td');
			var td11b = document.createElement('td');
			var td11aa = document.createElement('td');
			var td11bb = document.createElement('td');
			var selecttr11 = document.createElement('select');
			var optiontr111 = document.createElement('option');
			var optiontr112 = document.createElement('option');
			var optiontr113 = document.createElement('option');
			selecttr11.setAttribute('id','unitRawData');
			optiontr112.setAttribute('selected','');
			optiontr111.setAttribute('value','mg');
			optiontr112.setAttribute('value','g');
			optiontr113.setAttribute('value','kg');
			td11aa.setAttribute('colspan',"3");
			td11bb.setAttribute('colspan',"2");
			optiontr111.innerHTML = "mg";
			optiontr112.innerHTML = "g";
			optiontr113.innerHTML = "kg";
			selecttr11.appendChild(optiontr111);
			selecttr11.appendChild(optiontr112);
			selecttr11.appendChild(optiontr113);
			td11a.innerHTML = "Raw Data";

			td11b.appendChild(selecttr11)
			tr11.appendChild(td11aa);
			tr11.appendChild(td11a);
			tr11.appendChild(td11b);
			tr11.appendChild(td11bb);
		//11th row
		//12th row
			var tr12 = document.createElement('tr');
			var td12a = document.createElement('td');
			var td12b = document.createElement('td');
			var td12c = document.createElement('td');
			var td12d = document.createElement('td');
			var td12e = document.createElement('td');
			var td12f = document.createElement('td');
			var td12g = document.createElement('td');
			td12b.innerHTML = "Cycle";
			td12c.innerHTML = "S";
			td12d.innerHTML = "T";
			td12e.innerHTML = "T";
			td12f.innerHTML = "S";

			tr12.appendChild(td12a);
			tr12.appendChild(td12b);
			tr12.appendChild(td12c);
			tr12.appendChild(td12d);
			tr12.appendChild(td12e);
			tr12.appendChild(td12f);
			tr12.appendChild(td12g);
		//12th row
		//standard header row
			var trSTD1 = document.createElement('tr');
			var tdSTD1a = document.createElement('td');
			tdSTD1a.setAttribute('colspan','7');
			tdSTD1a.innerHTML = "Standard Used";

			trSTD1.appendChild(tdSTD1a);

		//standard header row
		//standard header row
			var trSTD2 = document.createElement('tr');
			var tdSTD2a = document.createElement('td');
			var tdSTD2b = document.createElement('td');
			var tdSTD2c = document.createElement('td');
			tdSTD2a.setAttribute('colspan','3');
			tdSTD2b.setAttribute('colspan','2');
			tdSTD2c.setAttribute('colspan','2');
			tdSTD2a.innerHTML = "Std. Code";
			tdSTD2b.innerHTML = "Conventional Mass of Standard";
			tdSTD2c.innerHTML = "Uncertainty of Measurement of  Std.";

			trSTD2.appendChild(tdSTD2a);
			trSTD2.appendChild(tdSTD2b);
			trSTD2.appendChild(tdSTD2c);
		//standard header row
		//standard row 1
			var trSTD3 = document.createElement('tr');
			var tdSTD3a = document.createElement('td');
			var tdSTD3b = document.createElement('td');
			var tdSTD3c = document.createElement('td');
			var select1 = document.createElement('select');
			var option11 = document.createElement('option');
			var inputa1 = document.createElement('input');
			var inputb1 = document.createElement('input');
			tdSTD3a.setAttribute('colspan','3');
			tdSTD3b.setAttribute('colspan','2');
			tdSTD3c.setAttribute('colspan','2');
			inputa1.setAttribute('type','text');
			inputb1.setAttribute('type','text');
			inputa1.setAttribute('class','form-control');
			inputb1.setAttribute('class','form-control');
			inputa1.setAttribute('placeholder','Conventional Mass of Standard');
			inputb1.setAttribute('placeholder','Uncertainty of Measurement of  Std.');
			inputa1.setAttribute('id','ConventionalMassSTDa'+numberOfTables);
			inputb1.setAttribute('id','UncertaintySTDa'+numberOfTables);
			select1.setAttribute('class','custom-select');
			select1.setAttribute('id','STDa'+numberOfTables);
			select1.setAttribute('onchange',"standardChangeToInput(this.value,'ConventionalMassSTDa"+numberOfTables+"','UncertaintySTDa"+numberOfTables+"')");
			option11.setAttribute('value',',');
			option11.setAttribute('selected','');
			option11.innerHTML = "Choose...";

			select1.appendChild(option11);
			tdSTD3a.appendChild(select1);
			tdSTD3b.appendChild(inputa1);
			tdSTD3c.appendChild(inputb1);
			trSTD3.appendChild(tdSTD3a);
			trSTD3.appendChild(tdSTD3b);
			trSTD3.appendChild(tdSTD3c);
		//standard row 1
		//standard row 2
			var trSTD4 = document.createElement('tr');
			var tdSTD4a = document.createElement('td');
			var tdSTD4b = document.createElement('td');
			var tdSTD4c = document.createElement('td');
			var select2 = document.createElement('select');
			var option21 = document.createElement('option');
			var inputa2 = document.createElement('input');
			var inputb2 = document.createElement('input');
			tdSTD4a.setAttribute('colspan','3');
			tdSTD4b.setAttribute('colspan','2');
			tdSTD4c.setAttribute('colspan','2');
			inputa2.setAttribute('type','text');
			inputb2.setAttribute('type','text');
			inputa2.setAttribute('class','form-control');
			inputb2.setAttribute('class','form-control');
			inputa2.setAttribute('placeholder','Conventional Mass of Standard');
			inputb2.setAttribute('placeholder','Uncertainty of Measurement of  Std.');
			inputa2.setAttribute('id','ConventionalMassSTDb'+numberOfTables);
			inputb2.setAttribute('id','UncertaintySTDb'+numberOfTables);
			select2.setAttribute('class','custom-select');
			select2.setAttribute('id','STDb'+numberOfTables);
			select2.setAttribute('onchange',"standardChangeToInput(this.value,'ConventionalMassSTDb"+numberOfTables+"','UncertaintySTDb"+numberOfTables+"')");
			option21.setAttribute('value',',');
			option21.setAttribute('selected','');
			option21.innerHTML = "Choose...";

			select2.appendChild(option21);
			tdSTD4a.appendChild(select2);
			tdSTD4b.appendChild(inputa2);
			tdSTD4c.appendChild(inputb2);
			trSTD4.appendChild(tdSTD4a);
			trSTD4.appendChild(tdSTD4b);
			trSTD4.appendChild(tdSTD4c);
		//standard row 2
		//standard row 3
			var trSTD5 = document.createElement('tr');
			var tdSTD5a = document.createElement('td');
			var tdSTD5b = document.createElement('td');
			var tdSTD5c = document.createElement('td');
			var select3 = document.createElement('select');
			var option31 = document.createElement('option');
			var inputa3 = document.createElement('input');
			var inputb3 = document.createElement('input');
			tdSTD5a.setAttribute('colspan','3');
			tdSTD5b.setAttribute('colspan','2');
			tdSTD5c.setAttribute('colspan','2');
			inputa3.setAttribute('type','text');
			inputb3.setAttribute('type','text');
			inputa3.setAttribute('class','form-control');
			inputb3.setAttribute('class','form-control');
			inputa3.setAttribute('placeholder','Conventional Mass of Standard');
			inputb3.setAttribute('placeholder','Uncertainty of Measurement of  Std.');
			inputa3.setAttribute('id','ConventionalMassSTDc'+numberOfTables);
			inputb3.setAttribute('id','UncertaintySTDc'+numberOfTables);
			select3.setAttribute('class','custom-select');
			select3.setAttribute('id','STDc'+numberOfTables);
			select3.setAttribute('onchange',"standardChangeToInput(this.value,'ConventionalMassSTDc"+numberOfTables+"','UncertaintySTDc"+numberOfTables+"')");
			option31.setAttribute('value',',');
			option31.setAttribute('selected','');
			option31.innerHTML = "Choose...";

			select3.appendChild(option31);
			tdSTD5a.appendChild(select3);
			tdSTD5b.appendChild(inputa3);
			tdSTD5c.appendChild(inputb3);
			trSTD5.appendChild(tdSTD5a);
			trSTD5.appendChild(tdSTD5b);
			trSTD5.appendChild(tdSTD5c);
		//standard row 3
		//standard row 4
			var trSTD6 = document.createElement('tr');
			var tdSTD6a = document.createElement('td');
			var tdSTD6b = document.createElement('td');
			var tdSTD6c = document.createElement('td');
			var select4 = document.createElement('select');
			var option41 = document.createElement('option');
			var inputa4 = document.createElement('input');
			var inputb4 = document.createElement('input');
			tdSTD6a.setAttribute('colspan','3');
			tdSTD6b.setAttribute('colspan','2');
			tdSTD6c.setAttribute('colspan','2');
			inputa4.setAttribute('type','text');
			inputb4.setAttribute('type','text');
			inputa4.setAttribute('class','form-control');
			inputb4.setAttribute('class','form-control');
			inputa4.setAttribute('placeholder','Conventional Mass of Standard');
			inputb4.setAttribute('placeholder','Uncertainty of Measurement of  Std.');
			inputa4.setAttribute('id','ConventionalMassSTDd'+numberOfTables);
			inputb4.setAttribute('id','UncertaintySTDd'+numberOfTables);
			select4.setAttribute('class','custom-select');
			select4.setAttribute('id','STDd'+numberOfTables);
			select4.setAttribute('onchange',"standardChangeToInput(this.value,'ConventionalMassSTDd"+numberOfTables+"','UncertaintySTDd"+numberOfTables+"')");
			option41.setAttribute('value',',');
			option41.setAttribute('selected','');
			option41.innerHTML = "Choose...";

			select4.appendChild(option41);
			tdSTD6a.appendChild(select4);
			tdSTD6b.appendChild(inputa4);
			tdSTD6c.appendChild(inputb4);
			trSTD6.appendChild(tdSTD6a);
			trSTD6.appendChild(tdSTD6b);
			trSTD6.appendChild(tdSTD6c);
		//standard row 4
		//standard row 5
			var trSTD7 = document.createElement('tr');
			var tdSTD7a = document.createElement('td');
			var tdSTD7b = document.createElement('td');
			var tdSTD7c = document.createElement('td');
			var select5 = document.createElement('select');
			var option51 = document.createElement('option');
			var inputa5 = document.createElement('input');
			var inputb5 = document.createElement('input');
			tdSTD7a.setAttribute('colspan','3');
			tdSTD7b.setAttribute('colspan','2');
			tdSTD7c.setAttribute('colspan','2');
			inputa5.setAttribute('type','text');
			inputb5.setAttribute('type','text');
			inputa5.setAttribute('class','form-control');
			inputb5.setAttribute('class','form-control');
			inputa5.setAttribute('placeholder','Conventional Mass of Standard');
			inputb5.setAttribute('placeholder','Uncertainty of Measurement of  Std.');
			inputa5.setAttribute('id','ConventionalMassSTDe'+numberOfTables);
			inputb5.setAttribute('id','UncertaintySTDe'+numberOfTables);
			select5.setAttribute('class','custom-select');
			select5.setAttribute('id','STDe'+numberOfTables);
			select5.setAttribute('onchange',"standardChangeToInput(this.value,'ConventionalMassSTDe"+numberOfTables+"','UncertaintySTDe"+numberOfTables+"')");
			option51.setAttribute('value',',');
			option51.setAttribute('selected','');
			option51.innerHTML = "Choose...";

			select5.appendChild(option51);
			tdSTD7a.appendChild(select5);
			tdSTD7b.appendChild(inputa5);
			tdSTD7c.appendChild(inputb5);
			trSTD7.appendChild(tdSTD7a);
			trSTD7.appendChild(tdSTD7b);
			trSTD7.appendChild(tdSTD7c);
		//standard row 5
		//standard row 6
			var trSTD8 = document.createElement('tr');
			var tdSTD8a = document.createElement('td');
			var tdSTD8b = document.createElement('td');
			var tdSTD8c = document.createElement('td');
			var tdSTD8d = document.createElement('td');
			var inputa6 = document.createElement('input');
			var inputb6 = document.createElement('input');
			var button1 = document.createElement('button');
			tdSTD8a.innerHTML = 'Total';
			button1.innerHTML = 'Add';
			tdSTD8a.setAttribute('colspan','2');
			tdSTD8c.setAttribute('colspan','2');
			tdSTD8d.setAttribute('colspan','2');
			inputa6.setAttribute('type','text');
			inputb6.setAttribute('type','text');
			inputa6.setAttribute('class','form-control');
			inputb6.setAttribute('class','form-control');
			inputa6.setAttribute('placeholder','Conventional Mass of Standard');
			inputb6.setAttribute('placeholder','Uncertainty of Measurement of  Std.');
			inputa6.setAttribute('id','ConventionalMassTotal'+numberOfTables);
			inputb6.setAttribute('id','UncertaintySTDTotal'+numberOfTables);
			button1.setAttribute('type','button');
			button1.setAttribute('class','btn btn-warning');
			button1.setAttribute('onclick',"totalConventionalUncertainty('"+numberOfTables+"')");

			tdSTD8b.appendChild(button1);
			tdSTD8c.appendChild(inputa6);
			tdSTD8d.appendChild(inputb6);
			trSTD8.appendChild(tdSTD8a);
			trSTD8.appendChild(tdSTD8b);
			trSTD8.appendChild(tdSTD8c);
			trSTD8.appendChild(tdSTD8d);
		//standard row 6
		//append all	
			tbdy.appendChild(trDensityLabel);
			tbdy.appendChild(trDensityInput);
			tbdy.appendChild(trNew);
			tbdy.appendChild(tr1);
			tbdy.appendChild(tr2);
			tbdy.appendChild(tr3);
			tbdy.appendChild(tr4);
			tbdy.appendChild(tr5);
			tbdy.appendChild(tr6);
			tbdy.appendChild(tr7);
			tbdy.appendChild(tr8);
			tbdy.appendChild(tr9);
			tbdy.appendChild(tr10);

			tbdy.appendChild(trSTD1);
			tbdy.appendChild(trSTD2);
			tbdy.appendChild(trSTD3);
			tbdy.appendChild(trSTD4);
			tbdy.appendChild(trSTD5);
			tbdy.appendChild(trSTD6);
			tbdy.appendChild(trSTD7);
			tbdy.appendChild(trSTD8);

			tbdy.appendChild(tr11);
			tbdy.appendChild(tr12);
			tbl.appendChild(thead);
			tbl.appendChild(tbdy);
			body.appendChild(hr)
			body.appendChild(tbl)
		//append all
			addStandard('STDa'+numberOfTables);
			addStandard('STDb'+numberOfTables);
			addStandard('STDc'+numberOfTables);
			addStandard('STDd'+numberOfTables);
			addStandard('STDe'+numberOfTables);

			if(approxClass == 'E2' || approxClass == 'F1'){
				for(var i = 1; i <= 5; i++){
					var cycle = addCycles(i);
					tbl.appendChild(cycle)
				}
			}else{
				for(var i = 1; i <= 3; i++){
					var cycle = addCycles(i);
					tbl.appendChild(cycle)
				}
			}
			setDefaultTo0(numberOfTables);
			
	}
	function addCycles(number){
		var tr = document.createElement('tr');
		var td1 = document.createElement('td');
		var td2 = document.createElement('td');
		var td3 = document.createElement('td');
		var td4 = document.createElement('td');
		var td5 = document.createElement('td');
		var td6 = document.createElement('td');
		var td7 = document.createElement('td');
		var i1 = document.createElement('input');
		var i2 = document.createElement('input');
		var i3 = document.createElement('input');
		var i4 = document.createElement('input');
		td2.innerHTML = number;
		i1.setAttribute('type','text');
		i2.setAttribute('type','text');
		i3.setAttribute('type','text');
		i4.setAttribute('type','text');
		i1.setAttribute('class','form-control');
		i2.setAttribute('class','form-control');
		i3.setAttribute('class','form-control');
		i4.setAttribute('class','form-control');
		i1.setAttribute('placeholder','S');
		i2.setAttribute('placeholder','T');
		i3.setAttribute('placeholder','T');
		i4.setAttribute('placeholder','S');
		i1.setAttribute('id','Sa'+number);
		i2.setAttribute('id','Tb'+number);
		i3.setAttribute('id','Tc'+number);
		i4.setAttribute('id','Sd'+number);
		
		td3.appendChild(i1);
		td4.appendChild(i2);
		td5.appendChild(i3);
		td6.appendChild(i4);
		tr.appendChild(td1);
		tr.appendChild(td2);
		tr.appendChild(td3);
		tr.appendChild(td4);
		tr.appendChild(td5);
		tr.appendChild(td6);
		tr.appendChild(td7);

		return tr;
	}



	var allData = {};
	const getInputValueFromTables = () => {
		for(var x = 1; x <= numberOfTables; x++){
			var data2 = {}; 
			var arrayForDifferenceAverage = [];

			var cycle = document.getElementById('cycle').value; 
			var table = document.getElementById('Table'+x); 
			var input = table.getElementsByTagName('input');
			var select = table.getElementsByTagName('select'); 

			var comparator = select["comparator"].value;
			var unitRawData = select["unitRawData"].value;
			var balanceResolution = input['balanceReso'].value;
			var nominalUnit = input["SampleNominalUnit"].value;
			var prevAirDensity = parseFloat(input["prevAirDensity"].value) != null? parseFloat(input["prevAirDensity"].value):0;
			
			var nominalValue = parseFloat(input["SampleNominalValue"].value);
			var cmOfStandard = parseFloat(input["ConventionalMassTotal"+x].value)
			var uncertDensitySampleValue = parseFloat(input["uncertDensitySample"].value);
			var uncertDensityReferenceValue = parseFloat(input["uncertDensityReference"].value);
			var densityReferenceValue = parseFloat(input["densityReference"].value);
			var densitySampleValue = parseFloat(input["densitySample"].value);
			var kValue	 = parseFloat(input["k"].value);
			var uncertaintySTDTotalValue = parseFloat(input["UncertaintySTDTotal"+x].value);

			var arrayForuncertSensitivityOfBalanceU = searchForSensitivityTest(comparator) // G, H in excel
			
			var aveOfDifference = 0;	
			var standardDeviationOfMCIValue = 0;
			var CMSampleValue = 0;		
			var airBuoyancyCorrectionValue = 0
			var standardUncertaintyWeighingProcessValue = 0;
			var uncertSensitivityOfBalanceUValue = 0;
			var uncertResolutionOfBalanceUValue = 0;
			var uncertEccentricLoadingUValue = 0;
			var differenceBetweenMaximumAndMinimum = differenceBetweenMaximumAndMinimumValues();
			var uncertaintyOfMagneticSusceptibilityUMA = 0; // L in excel. no formula
			var aveOfTemp = 0;	
			var aveOfRH = 0;
			var aveOfAP = 0;	
			var conventionalAirDensity = 1.2; // W in excel. no formula
			var computedDensityUsingMeasuredPressureTempRHValue = 0;
			var standardUncertApproxAirDensityValue = 0;
			var standardUncertDensityOfSampleWeightValue = 0;
			var standardUncertDensityOfReferenceWeightValue = 0;
			var standardUncertaintyAirBuoyancyCorrectionFactorValue = 0
			var standardUncertConventionalMassOfReferenceValue = 0
			var standardUncertaintyBalanceValue = 0;
			var ucValue = 0;
			var ueValue = 0;

			var arrayForUC;
			

			for (var i = 0; i < input.length; i++) { 
				data2[input[i].id] = {
					"value": input[i].value,
				}
			}

			for (var i = 0; i < select.length; i++) { 
				data2[select[i].id] = {
					"value": select[i].value,
				}
			}

			data2["cycleDifferences"] = {					
				"difference1": input['Sa1'] != null? differenceMCI(input['Tb1'].value,input['Tc1'].value,input['Sa1'].value,input['Sd1'].value):null,
				"difference2": input['Sa2'] != null? differenceMCI(input['Tb2'].value,input['Tc2'].value,input['Sa2'].value,input['Sd2'].value):null,
				"difference3": input['Sa3'] != null? differenceMCI(input['Tb3'].value,input['Tc3'].value,input['Sa3'].value,input['Sd3'].value):null,
				"difference4": input['Sa4'] != null? differenceMCI(input['Tb4'].value,input['Tc4'].value,input['Sa4'].value,input['Sd4'].value):null,
				"difference5": input['Sa5'] != null? differenceMCI(input['Tb5'].value,input['Tc5'].value,input['Sa5'].value,input['Sd5'].value):null,
			}	
			
			for(var i = 0; i <=5 ; i++){
				if(data2.cycleDifferences['difference'+i] != null){
					arrayForDifferenceAverage.push(data2.cycleDifferences['difference'+i]);
				}
			}

			data2["differenceAve"] = {
				"value" : differenceAve(arrayForDifferenceAverage),
			}
			aveOfDifference = differenceAve(arrayForDifferenceAverage);

			data2["standardDeviationOfMCI"] = {
				"value" : standardDeviationOfMCI(arrayForDifferenceAverage),
			}
			standardDeviationOfMCIValue = standardDeviationOfMCI(arrayForDifferenceAverage);
			
			aveOfTemp = TempAve(parseFloat(input["TemperatureStart"].value),parseFloat(input["TemperatureFinish"].value));
			data2["TempAve"] = {
				"value" : aveOfTemp,
			}
			
			aveOfRH = RHAve(parseFloat(input["HumidityStart"].value),parseFloat(input["HumidityFinish"].value));
			data2["RHAve"] = {
				"value" : aveOfRH,
			}

			aveOfAP = APAve(parseFloat(input["PressureStart"].value),parseFloat(input["PressureFinish"].value));
			data2["APAve"] = {
				"value" : aveOfAP,
			}	

			computedDensityUsingMeasuredPressureTempRHValue =  computedDensityUsingMeasuredPressureTempRH(aveOfAP,aveOfRH,aveOfTemp);
			data2["computedDensityUsingMeasuredPressureTempRH"] = {
				"value" : computedDensityUsingMeasuredPressureTempRHValue,
			}

			airBuoyancyCorrectionValue = airBuoyancyCorrection(densityReferenceValue,densitySampleValue,computedDensityUsingMeasuredPressureTempRHValue,conventionalAirDensity)
			data2["airBuoyancyCorrection"] = {
				"value" : airBuoyancyCorrectionValue,
			}
			
			data2["CMSample"] = {
				"value" : CMSample(nominalUnit,cmOfStandard,airBuoyancyCorrectionValue,aveOfDifference),
			}
			CMSampleValue = CMSample(nominalUnit,cmOfStandard,airBuoyancyCorrectionValue,aveOfDifference);

			data2["deviation"] = {
				"value" : deviation(CMSampleValue,nominalValue),
			}

			data2["differenceBetweenMaximumAndMinimum"] = {
				"value" : differenceBetweenMaximumAndMinimum,
			}

			data2["standardUncertaintyWeighingProcess"] = {
				"value" : standardUncertaintyWeighingProcess(standardDeviationOfMCIValue,cycle),
			}
			standardUncertaintyWeighingProcessValue = standardUncertaintyWeighingProcess(standardDeviationOfMCIValue,cycle);

			uncertSensitivityOfBalanceUValue = uncertSensitivityOfBalanceU(standardUncertaintyWeighingProcessValue,parseFloat(arrayForuncertSensitivityOfBalanceU.uncertSensitivityWeight),parseFloat(arrayForuncertSensitivityOfBalanceU.sensitivityWeight),standardDeviationOfMCIValue,cycle
			) 
			data2["uncertSensitivityOfBalanceU"] = {
				"value" : uncertSensitivityOfBalanceUValue.toFixed(20),
			}

			var uncertResolutionOfBalanceUValue = uncertResolutionOfBalanceU(balanceResolution) 
			data2["uncertResolutionOfBalanceU"] = {
				"value" : uncertResolutionOfBalanceUValue.toFixed(20),
			}

			uncertEccentricLoadingUValue = uncertEccentricLoadingU(differenceBetweenMaximumAndMinimum)
			data2["uncertEccentricLoadingU"] = {
				"value" : uncertEccentricLoadingUValue,
			}

			data2["uncertaintyOfMagneticSusceptibilityUMA"] = {
				"value" : uncertaintyOfMagneticSusceptibilityUMA,
			}

			data2["conventionalAirDensity"] = {
				"value" : conventionalAirDensity,
			}

			standardUncertDensityOfSampleWeightValue = standardUncertDensityOfSampleWeight(uncertDensitySampleValue)
			data2["standardUncertDensityOfSampleWeight"] = {
				"value" : standardUncertDensityOfSampleWeightValue,
			}

			standardUncertDensityOfReferenceWeightValue = standardUncertDensityOfReferenceWeight(uncertDensityReferenceValue)
			data2["standardUncertDensityOfReferenceWeight"] = {
				"value" : standardUncertDensityOfReferenceWeightValue,
			}

			standardUncertApproxAirDensityValue = standardUncertApproxAirDensity(computedDensityUsingMeasuredPressureTempRHValue);
			data2["standardUncertApproxAirDensity"] = {
				"value" : standardUncertApproxAirDensityValue,
			}
			standardUncertaintyAirBuoyancyCorrectionFactorValue = standardUncertaintyAirBuoyancyCorrectionFactor(cmOfStandard,densityReferenceValue,densitySampleValue, standardUncertApproxAirDensityValue,computedDensityUsingMeasuredPressureTempRHValue,conventionalAirDensity,standardUncertDensityOfSampleWeightValue,standardUncertDensityOfReferenceWeightValue,prevAirDensity)
			data2["standardUncertaintyAirBuoyancyCorrectionFactor"] = {
				"value" : standardUncertaintyAirBuoyancyCorrectionFactorValue.toFixed(20),
			}

			standardUncertConventionalMassOfReferenceValue = standardUncertConventionalMassOfReference(uncertaintySTDTotalValue,kValue);
			data2["standardUncertConventionalMassOfReference"] = {
				"value" : standardUncertConventionalMassOfReferenceValue,
			}

			standardUncertaintyBalanceValue = standardUncertaintyBalance(uncertSensitivityOfBalanceUValue.toFixed(20),uncertResolutionOfBalanceUValue.toFixed(20),uncertEccentricLoadingUValue,uncertaintyOfMagneticSusceptibilityUMA)
			data2["standardUncertaintyBalance"] = {
				"value" : standardUncertaintyBalanceValue,
			}
			
			arrayForUC = [standardUncertaintyAirBuoyancyCorrectionFactorValue,standardUncertConventionalMassOfReferenceValue,standardUncertaintyWeighingProcessValue,standardUncertaintyBalanceValue];
			ucValue = uc(arrayForUC)
			data2["uc"] = {
				"value" : ucValue,
			}
			
			ueValue = ue(ucValue,kValue);
			data2["ue"] = {
				"value" : ueValue,
			}
			
			data2["ueINmg"] = {
				"value" : ueINmg(ueValue,unitRawData),
			}
			
			allData["Table"+x] = data2;
		}

		//document.getElementById('allData').value = JSON.stringify(allData);
		document.getElementById('allData').value = JSON.stringify(allData); 
	}

	

			/*  comment in getInputValueFromTables adding to allData as array 
				for ( var i = 0; i < input.length; i++ ) { 
					data.push({
						"id": input[i].id,
						"value": input[i].value,
					}); 
			
				}
				data.push({
					cycleDifferences :{				
						"difference1": input['Sa1'] != null? differenceMCI(input['Sa1'].value,input['Sd1'].value,input['Tb1'].value,input['Tc1'].value):0,
						"difference2": input['Sa2'] != null? differenceMCI(input['Sa2'].value,input['Sd2'].value,input['Tb2'].value,input['Tc2'].value):0,
						"difference3": input['Sa3'] != null? differenceMCI(input['Sa3'].value,input['Sd3'].value,input['Tb3'].value,input['Tc3'].value):0,
						"difference4": input['Sa4'] != null? differenceMCI(input['Sa4'].value,input['Sd4'].value,input['Tb4'].value,input['Tc4'].value):0,
						"difference5": input['Sa5'] != null? differenceMCI(input['Sa5'].value,input['Sd5'].value,input['Tb5'].value,input['Tc5'].value):0,
					}
				}); 
				console.log('data.cycleDifferences.difference1 ', data.cycleDifferences['difference1'])
				for ( var i = 0; i < select.length; i++ ) { 
					data.push({
						id: select[i].id,
						value: select[i].value
					}); 
				}
			*/

	const setDefaultTo0 = (TableNumber) =>{
		var table = document.getElementById('Table'+TableNumber); 
		var input = table.getElementsByTagName('input');
		
		for (let index = 0; index < input.length; index++) {
			input[index].defaultValue = 0
		}
		
	}
	

	const sumOfSquare = (array) => {
		var sum = 0;
		for(i=0;i<array.length;i++){
			sum += Number(Math.pow(array[i],2).toFixed(20));
		}
		return Math.sqrt(sum.toFixed(21));
	}

	const addCycleToFirstTable = (approx) => {
		var Table1 = document.getElementById('Table1');
		if(approx == 'E2' || approx == 'F1'){
			for(var i = 1; i <= 5; i++){
				var cycle = addCycles(i);
				Table1.appendChild(cycle)
			}
		}else{
			for(var i = 1; i <= 3; i++){
				var cycle = addCycles(i);
				Table1.appendChild(cycle)
			}
		}
		setDefaultTo0(1);
	}

	const standardChangeToInput = (valueOfSelect, conventional, uncertainty) => {
		var value = valueOfSelect.split(',');
		var con = value[0];
		var unc = value[1];
		document.getElementById(conventional).value = con;
		document.getElementById(uncertainty).value = unc;
	}

	const totalConventionalUncertainty = (tableNumber) => {
		var value1 = parseFloat(document.getElementById('ConventionalMassSTDa'+tableNumber).value) || 0;
		var value2 = parseFloat(document.getElementById('ConventionalMassSTDb'+tableNumber).value) || 0;
		var value3 = parseFloat(document.getElementById('ConventionalMassSTDc'+tableNumber).value) || 0;
		var value4 = parseFloat(document.getElementById('ConventionalMassSTDd'+tableNumber).value) || 0;
		var value5 = parseFloat(document.getElementById('ConventionalMassSTDe'+tableNumber).value) || 0;
		var value6 = parseFloat(document.getElementById('UncertaintySTDa'+tableNumber).value) || 0;
		var value7 = parseFloat(document.getElementById('UncertaintySTDb'+tableNumber).value) || 0;
		var value8 = parseFloat(document.getElementById('UncertaintySTDc'+tableNumber).value) || 0;
		var value9 = parseFloat(document.getElementById('UncertaintySTDd'+tableNumber).value) || 0;
		var value10 = parseFloat(document.getElementById('UncertaintySTDe'+tableNumber).value) || 0;
		document.getElementById('ConventionalMassTotal'+tableNumber).value = value1+value2+value3+value4+value5;
		document.getElementById('UncertaintySTDTotal'+tableNumber).value = value6+value7+value8+value9+value10;
	}

	const searchForSensitivityTest = (balance) => {
		var testArray = sensitivityTest;
		var resultArray;
		testArray[0].filter(function (e) {
			if(e.balance == balance){
				resultArray = e;
			}
		})	
		return resultArray;
	}

	const differenceBetweenMaximumAndMinimumValues = () => {
		// F in excel
		// in excel, its not link with other cells
		var result = 0.00049-(-0.00037);
		return result;
	}

	const checkCalibrationData = (dateOfCalibStandard) => {
		var x = new Date(dateOfCalibStandard);
		var today = new Date();
		var dd = String(today.getDate()).padStart(2, '0');
		var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
		var yyyy = today.getFullYear();

		today = yyyy + '-' + mm + '-' + dd;

	}

	// load image
	var loadFile = function(event) {
		var output = document.getElementById('output');
		output.src = URL.createObjectURL(event.target.files[0]);
		output.onload = function() {
			URL.revokeObjectURL(output.src) // free memory
		}
	};
</script>


        </div>
      </div>
      <!-- /#page-content-wrapper -->
    </div>
  </body>
</html>






</body>
</html>
