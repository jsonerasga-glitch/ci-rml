<?php
    $path = 'image/dost.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    $pathPAB = 'image/pab logo.png';
    $typePAB = pathinfo($pathPAB, PATHINFO_EXTENSION);
    $dataPAB = file_get_contents($pathPAB);
    $base64PAB = 'data:image/' . $typePAB . ';base64,' . base64_encode($dataPAB);

    
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
<title>Standard table</title>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <!--FONTAWESOME CDN-->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
     <!--FONTAWESOME CDN-->
</head>  
<body  style="margin: 0; padding: 0; font-family: Calibri; font-size: 14px;">
     
  <div class="d-flex " id="wrapper">
     <!-- Sidebar vh-100-->
  <div class="sidebar border-down vh-100" id="sidebar-wrapper" style="color: white; top: 0; position: sticky; background-color:#0f1a34; ">
        <div class="sidebar-heading " style="color: white; top: 0; position: sticky; background-color:#182444; z-index: 1;">							
        <img src="<?php echo $base64; ?>" class="mr-2" alt="DOST LOGO" height='30px' style="border-radius:5px; ">
        <strong>RML Calibration</strong>
    </div>
        <div class="list-group list-group-flush overflow-auto">
            <h6 class="mt-3 text-center">
			    <img src="<?php echo $base64Icon7; ?>" alt="DOST LOGO" height='30px' style="border-radius:5px;" class="mr-2">
                
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
                        <button class="btn btn-block text-left collapsed" style="color:white; font-size: 0.48em;" type="button" data-toggle="collapse" data-target="#collapseTwoTestWeight" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="fas fa-weight-hanging"></i>
                        &nbspTest Weight&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <i class="fa"></i>
                        </button>
                    </h2>
                    </div>
                    <div id="collapseTwoTestWeight" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExampleTEstWeight">
                        <a href="testWeightAddDataView" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
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
                        <a href="testWeightStandardTable" class="list-group-item list-group-item-action " style="font-size: .7rem; color: #091122; background-color: white;">
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
        <div class="container-fluid" style="background-color:#f9f9f9;">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <div class="mx-auto d-flex justify-content-center mt-4">
                    <h4 class="">Test Weight Standard MPE</h4>
                </div>

              

            </div>
        <div class="container-fluid">
             <div class="">
                <div class="btn-toolbar mb-2 ">  
                  <div class="container-fluid">
                  <div class="card" style="">
                   
                    <div class="col mt-2 container-fluid">
                        <?php
                            if(session()->getFlashdata('status')){
                                echo "<div class='alert alert-primary' role='alert'>".session()->getFlashdata('status')."</div>";
                            }
                        ?>
                                <div class="row">
                                    <div class="col mt-2 mb-3 ">
                                        <a class="btn btn-primary float-end" href="guestTestWeightMPEAddNew"><i class="far fa-plus-square"></i> Add New MPE</a>
                                    </div>
                                   
                                </div>
                              <!--h5>Standards</h5-->
                            </div>
                              <table class="table table-bordered " ID="users-list">
                              <thead>
                                  <tr>
                                      <th>Nominal Value</th>
                                      <th>Class</th>
                                      <th>MPE</th>
                                      <th class="text-center">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php foreach($TestWeightMPE as $row) : ?>
                                  <tr>
                                      <td><?= $row['nominalValue']." ".$row['nominalUnit'];?></td>
                                      <td><?= $row['class'];?></td>
                                      <td><?= $row['MPE'];?></td>
                                      <td class="text-center"><button type="button" onclick="dataToModal(<?= '\''.$row['id'].'\''?>,<?='\''.$row['class'].'\''?>,<?='\''.$row['nominalValue'].'\''?>,<?='\''.$row['nominalUnit'].'\''?>,<?='\''.$row['MPE'].'\''?>)" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="far fa-eye"></i> View</button></td>
                                  </tr>   
                                  <?php endforeach; ?>          
                              </tbody>
                          </table>
                          </div>
                    </div>
                </div>
            
          </div>
          </div>
        </div>
      </div>
      <!-- /#page-content-wrapper -->
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit PAB</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('guestTestWeightPABUpdateDetails')?>" method="post">
                    <input type="hidden" name="id" id="id">
                    <table class="table table-borderless mt-3">
				<tbody>
					<tr>
						<td>Class</td>
						<td>
							<select class="custom-select" name="class" id="class">
								<option selected>Choose...</option>
								<option value="E1">E₁</option>
								<option value="E2">E₂</option>
								<option value="F1">F₁</option>
								<option value="F2">F₂</option>
								<option value="M1">M₁</option>
								<option value="M1-2">M₁-₂</option>
								<option value="M2">M₂</option>
								<option value="M2-3">M₂-₃</option>
								<option value="M3">M₃</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Nominal Value</td>
						<td><input type="text" class="form-control" id="nominalValue" name="nominalValue" placeholder="Nominal Value" aria-label="Username" aria-describedby="basic-addon1"></td>
					</tr>
					<tr>
						<td>Nominal Unit</td>
						<td>
							<select class="custom-select" name="nominalUnit" id="nominalUnit">
								<option value='kg' selected>kg</option>
								<option value="g">g</option>
								<option value="mg">mg</option>
							</select>						
						</td>
					</tr>
					<tr>
						<td>MPE</td>
						<td><input type="text" class="form-control" id="mpe" name="mpe" placeholder="MPE" aria-label="Username" aria-describedby="basic-addon1"></td>
					</tr>
				</tbody>
			</table>
               
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
            </div>
        </div>
    </div>
  </body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
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

    
    $(document).ready( function () {
      $('#users-list').DataTable();
  } );

    function dataToModal(id, classes, nominalValue, nominalUnit, mpe){
        document.getElementById('id').value = id;
        document.getElementById('class').value = classes;
        document.getElementById('nominalValue').value = nominalValue;
        document.getElementById('nominalUnit').value = nominalUnit;
        document.getElementById('mpe').value = mpe;
    }
</script>