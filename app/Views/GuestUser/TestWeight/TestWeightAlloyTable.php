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

    <title>RML++</title>

    <link href="dashboardAsset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="dashboardAsset/lib/remixicon/fonts/remixicon.css" rel="stylesheet">
    
    <!-- Template CSS -->
    <link rel="stylesheet" href="dashboardAsset/assets/css/style.min.css">
 
</head>  
  <body class="skin-dark animate">    <!-- Sidebar vh-100-->
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
              <a href="#" onclick="window.location.href = '/guestElectStandard'" class="sub-link">Single Range E-balance</a>
              <a href="#" onclick="window.location.href = '/guestThermoStandardTable'" class="sub-link">Thermohygrometer</a>
              <a href="#" onclick="window.location.href = '/guestTestWeightStandardTable'" class="sub-link active show">Test Weights</a>
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
          <span>Calibration Officer</span>
        </div><!-- avatar-body -->
      </div><!-- sidebar-footer -->
    </div><!-- sidebar -->

    <!-- Page Content -->
    <div class="container-fluid">
      <div class="content">
        <div class="content-header">
          <a id="contentMenu" href="#" class="content-menu d-none d-lg-flex"><i data-feather="menu"></i></a>
          <a id="mobileMenu" href="#" class="content-menu d-lg-none"><i data-feather="menu"></i></a>
        </div><!-- content-header -->
        <div class="content-body">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="container">
                    <?php
                    if(session()->getFlashdata('status')){
                        echo "<div class='alert alert-primary' role='alert'>".session()->getFlashdata('status')."</div>";
                        }
                        ?>
                        <div class="row">
                            <div class="col mt-2 mb-3 ">
                                <a class="btn btn-primary float-end" href="guestTestWeightAlloyAddNew">
                                    <i class="far fa-plus-square"></i> Add New Material
                                </a>
                            </div>
                        </div>
                        <table class="table table-bordered text-center" id="users-list">
                            <thead>
                                <tr>
                                    <th>Alloy/Material</th>
                                    <th>Assumed Density</th>
                                    <th>Uncertainty (k=2)</th>
                                    <th>Unit</th>
                                    <th class="text-center">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($TestWeightAlloy as $row) : ?>
                                  <tr>
                                    <td><?= $row['material'];?></td>
                                    <td><?= $row['density'];?></td>
                                    <td><?= $row['uncertainty'];?></td>
                                    <td><?= $row['unit'];?></td>
                                    <td class="text-center"><button type="button" onclick="dataToModal(<?= '\''.$row['id'].'\''?>,<?='\''.$row['material'].'\''?>,<?='\''.$row['density'].'\''?>,<?='\''.$row['uncertainty'].'\''?>,<?='\''.$row['unit'].'\''?>)" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="far fa-eye"></i> View</button></td>
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
    <!-- /#page-content-wrapper -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="guestTestWeightAlloyUpdateDetails" method="post">
                        <input type="hidden" name="id" id="id">
                        <table class="table table-borderless mt-3">
                            <tbody>
                                <tr>
                                    <td>Alloy/Material</td>
                                    <td><input type="text" class="form-control" id="material" name="material" placeholder="Alloy/Material" aria-label="Username" aria-describedby="basic-addon1"></td>
					            </tr>
                                <tr>
                                    <td>Assumed Density</td>
                                    <td><input type="text" class="form-control" id="density" name="density" placeholder="Assumed Density" aria-label="Username" aria-describedby="basic-addon1"></td>
					            </tr>
                                <tr>
                                    <td>Uncertainty(k=2)</td>
                                    <td><input type="text" class="form-control" id="uncertainty" name="uncertainty" placeholder="Uncertainty" aria-label="Username" aria-describedby="basic-addon1"></td>
					            </tr>
                                <tr>
						            <td>Unit</td>
						            <td><input type="text" class="form-control" id="unit" name="unit" placeholder="Unit" aria-label="Username" aria-describedby="basic-addon1"></td>
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
<script src="dashboardAsset/lib/jquery/jquery.min.js"></script>
<script src="dashboardAsset/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dashboardAsset/lib/feathericons/feather.min.js"></script>
<script src="dashboardAsset/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="dashboardAsset/assets/js/script.js"></script>
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
        document.getElementById('material').value = classes;
        document.getElementById('density').value = nominalValue;
        document.getElementById('uncertainty').value = nominalUnit;
        document.getElementById('unit').value = mpe;
}
</script>