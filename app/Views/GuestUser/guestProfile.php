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
    $base64Icon7 = 'data:image/' . $typeIcon7 . ';base64,' . base64_encode($dataIcon7);?>

<!DOCTYPE html>
<html lang="en">
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
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i data-feather="archive"></i><span>Standards</span></a>
            <nav class="nav-sub">
              <a href="#" onclick="window.location.href = '/electStandard'" class="sub-link">Single Range E-balance</a>
              <a href="#" onclick="window.location.href = '/thermoStandardTable'" class="sub-link">Thermohygrometer</a>
              <a href="#" onclick="window.location.href = '/testWeightStandardTable'" class="sub-link">Test Weights</a>
            </nav>
          </li> 
        </ul>
        <hr>
         <hr>
        <hr>
        <ul class="nav-sidebar">
          <li class="nav-item"><a href="#" onclick="window.location.href = '/pendingTable'" class="nav-link"><i data-feather="user-check"></i><span>Pending/For Correction</span></a></li>
          <li class="nav-item active show"><a href="#" class="nav-link" onclick="window.location.href = '/guestProfile'"><i data-feather="smartphone"></i><span>My Profile</span></a></li>
          <li class="nav-item"><a href="" class="nav-link" onclick="window.location.href = '/guestAbout'"><i data-feather="align-justify"></i><span>About</span></a></li>
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
        <div class="container-fluid" style="background-color:#f9f9f9;">
            <!--h1 class="mt-4">Create Users</h1-->
            <?php $validation = \Config\Services::validation(); ?>
           
            <form action="<?= base_url('registerGuest') ?>" method="post">
            <div class="card shadow p-3 mb-5 bg-white rounded ">
                <div class="container">
                    <div class="row justify-content-evenly">
                        <div class="col-5 text-center" height='' style="height: 600px; border-radius: 10px; color: white;  background-color:#C0C0C0;"> <br> <br> <br>
                            <img src="/<?= "ProfilePics/".$user['profile_image']; ?>" alt="DOST LOGO" height='200px' width='200px' style="border-radius: 50%;" class="mr-2 mt-5 mb-4">
                            <h3 for=""><?php echo $user['name'];?> <?php echo $user['lname'];?></h3>
                            <h4><?php echo $user['position'];?></h4>
                        </div>
                        <div class="col-5 p-5">
                            <h4 class="card-title">Information</h4> <hr> <br>
                            <div class="row">
                                <div class="col">
                                    <h3 for="">Contact No.</h3>
                                </div>
                                <div class="col">
                                    <h3 for="">Email</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5 style="color: grey;"><?php echo $user['phone_no'];?></h5>
                                </div>
                                <div class="col">
                                    <h5 style="color: grey;"><?php echo $user['email'];?></h5>
                                </div>
                            </div>
                            <br> <br>
                            <hr> <br>
                            <div class="row">
                                <div class="col-6">
                                    <h3>Date Register</h3>
                                </div>
                                <div class="col">
                                    <h3 for="">Signature</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5 style="color: grey;">
                                        <?php 
                                            $date = $user['created_at']; 
                                            $mysql_date = date('Y-m-d G:i:s', strtotime($date));
                                            echo date('F d Y', strtotime($mysql_date));
                                        ?> 
                                    </h5>
                                </div>
                                <div class="col">
                                    <img src="/<?= "Signature/".$user['signature']; ?>" alt="Signature" height='150px' width='200px' style="" class="mt-n4">
                                </div>  
                            </div>
                            <hr>
                        </div>
                    </div>
                    </div>
                    
                        
                <a href="#">Change Password<i class="fas fa-question"></i></a>
            </form>
                <!--a type="submit" href="dashboard" class="btn btn-danger btn-lg float-left" style="width: 200px;">Back</a-->
            </div>
                
            </div>
            </div> 
        </div>
      </div>
      <!-- /#page-content-wrapper -->
    </div>
  </body>
  <script src="dashboardAsset/lib/jquery/jquery.min.js"></script>
  <script src="dashboardAsset/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="dashboardAsset/lib/feathericons/feather.min.js"></script>
  <script src="dashboardAsset/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="dashboardAsset/assets/js/script.js"></script>
</html>
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