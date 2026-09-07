<?php
    $path = 'image/dost.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    $pathPAB = 'image/pab logo.png';
    $typePAB = pathinfo($pathPAB, PATHINFO_EXTENSION);
    $dataPAB = file_get_contents($pathPAB);
    $base64PAB = 'data:image/' . $typePAB . ';base64,' . base64_encode($dataPAB);

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

<!-- Vendor CSS -->
<link href="dashboardAsset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="dashboardAsset/lib/remixicon/fonts/remixicon.css" rel="stylesheet">

<!-- Template CSS -->
<link rel="stylesheet" href="dashboardAsset/assets/css/style.min.css">

</head>  
  <body class="skin-base animate">
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
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div class="content">
      <div class="content-header">
        <a id="contentMenu" href="#" class="content-menu d-none d-lg-flex"><i data-feather="menu"></i></a>
        <a id="mobileMenu" href="#" class="content-menu d-lg-none"><i data-feather="menu"></i></a>
      </div><!-- content-header -->
      <div class="content-body">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                 </div>
        <div class="container-fluid">
             <div class="">
                  <div class="card" style="">
                    <div class="col mt-2 container-fluid">
                    <div class="">
                            <label class="content-label">
                                <b>Test Weight Standard</b>
                            </label>
                        </div>
                    <?php
                        if(session()->getFlashdata('status')){
                            echo "<div class='alert alert-primary' role='alert'>".session()->getFlashdata('status')."</div>";
                        }
                    ?>
                    
                    <table class="table-borderless text-center" style="width: 200px;">
                            <tr>
                                <td style="background-color:rgba(0,128,0,0.5);">Okay</td>
                                <td style="background-color:rgba(255,165,0,0.5);">Near Expiration</td>
                                <td style="background-color:rgba(255,0,0,0.5);">Expired</td>
                            </tr>
                        </table>
                                <div class="row mb-3">
                                    <div class="col mt-2">
                                        <a class="btn btn-primary float-end" href="/guestTestWeightStandardAddNew"><i class="far fa-plus-square"></i> Add Standard</a>
                                        <a class="btn btn-primary float-end" href="/guestTestWeightPABTable"><i class="far fa-plus-square"></i> View PAB</a>
                                        <a class="btn btn-primary float-end" href="/guestTestWeightMPETable"><i class="far fa-plus-square"></i> View MPE</a>
                                        <a class="btn btn-primary float-end" href="/guestTestWeightAlloyTable"><i class="far fa-plus-square"></i> View Alloy/Materails</a>
                                        <a class="btn btn-primary float-end" href="/guestTestWeightSensitivityTestTable"><i class="far fa-plus-square"></i> View Sensitivity Test</a>
                                    </div>
                                </div>
                              <!--h5>Standards</h5-->
                            </div>
                              <table class="table table-bordered" id="users-list">
                              <thead>
                                  <tr>
                                      <th>Description</th>
                                      <th>Manufacturer</th>
                                      <th>Type</th>
                                      <th>Serial Number</th>
                                      <th class="text-center">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php foreach($TestWeightStandardDetailsModel as $row) : ?>
                                  <tr
                                    <?php 
                                        date_default_timezone_set('Asia/Manila');
                                        $forComparisonToday = strtotime(date('Y-m-d'));
                                        $standardDue = $row['dateOfCalibration']; 
                                        $standardDue = strtotime($standardDue); 
                                        $standardDue_Date = strtotime('+ 1 year', $standardDue); 
                                        $standardDue_DateBefore = strtotime('+ 11 month', $standardDue); 
                                        $forComparisonStandardDue = strtotime(date('Y-m-d', $standardDue_Date));
                                        $forComparisonStandardDueBefore = strtotime(date('Y-m-d', $standardDue_DateBefore));
                                        $s = $forComparisonToday>$forComparisonStandardDueBefore;
                                        $t = $forComparisonStandardDueBefore<$forComparisonStandardDue;
                                        if($forComparisonToday>$forComparisonStandardDue){
                                            echo'style="background-color:rgba(255,0,0,0.5) "'; //red
                                            }elseif($s && $t ){
                                                echo'style="background-color:rgba(255,165,0,0.5)"'; //orange
                                            }else{
                                                echo'style="background-color:rgba(0,128,0,0.5)"'; //green
                                        }
                                        ?>>
                                      <td><?= $row['description'];?></td>
                                      <td><?= $row['manufacturer'];?></td>
                                      <td><?= $row['type'];?></td>
                                      <td><?= $row['serialNumber'];?></td>
                                      <td class="text-center"><a href="<?= base_url('guestElectStandardEdit/'.$row['id']) ?>" class="btn btn-info"><i class="far fa-eye"></i> View</a></td>
                                  </tr>   
                                  <?php endforeach; ?>          
                              </tbody>
                          </table>
                          </div>
                    </div>
                </div>
        </div>
      </div>
      <!-- /#page-content-wrapper -->
    </div>
  </body>
</html>
<!--script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script-->
<script src="dashboardAsset/lib/jquery/jquery.min.js"></script>
<script src="dashboardAsset/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dashboardAsset/lib/feathericons/feather.min.js"></script>
<script src="dashboardAsset/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="dashboardAsset/assets/js/script.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
      $('#users-list').DataTable();
  } );
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