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
  <body class="skin-dark animate">
    <div class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-logo"><span></span></a>
        <a href="#" class="sidebar-logo-text">RML<span>++</span></a>
      </div><!-- sidebar-header -->
      <div class="sidebar-body">
        <ul class="nav-sidebar">
          <li class="nav-item active show">
            <a href="" onclick="window.location.href = '/guestDashboard'" class="nav-link"><i data-feather="home"></i><span>Dashboard</span></a>              
          </li>
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i data-feather="clipboard"></i><span>Worksheets</span></a>
            <nav class="nav-sub">
              <a href="#" onclick="window.location.href = '/guestAddElect'"  class="sub-link" style="">Single Range E-balance</a>
              <a href="#" onclick="window.location.href = '/guestAddThermo'"  class="sub-link">Thermohygrometer</a>
              <a href="#" onclick="window.location.href = '/guestTestWeightAddDataView'"  class="sub-link">Test Weights</a>
            </nav>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i data-feather="monitor"></i><span>Certificates</span></a>
            <nav class="nav-sub">
              <a href="#" onclick="window.location.href = '/guestElectTable'"  class="sub-link">Single Range E-balance</a>
              <a href="#" onclick="window.location.href = '/guestThermoTable'"  class="sub-link">Thermohygrometer</a>
              <a href="#" onclick="window.location.href = '/guestTestWeightTable'"  class="sub-link">Test Weights</a>
            </nav>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i data-feather="archive"></i><span>Standards</span></a>
            <nav class="nav-sub">
              <a href="#" onclick="window.location.href = '/guestElectStandard'" class="sub-link">Single Range E-balance</a>
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
          <span>Calibration Officer</span>
        </div><!-- avatar-body -->
      </div><!-- sidebar-footer -->
    </div><!-- sidebar -->

    <div class="content">
      <div class="content-header">
        <a id="contentMenu" href="#" class="content-menu d-none d-lg-flex"><i data-feather="menu"></i></a>
        <a id="mobileMenu" href="#" class="content-menu d-lg-none"><i data-feather="menu"></i></a>
      </div><!-- content-header -->
      <div class="content-body">
        <label class="content-label"><b>Dashboard</b></label><!-- Content Row -->
        <!-- Content Row -->
        <hr>
        <br>
        <label class="content-label">Single Range E-balance</label>
        <nav id="" class="nav">
          <a href="#" onclick="window.location.href = '/guestAddElect'"  class="nav-link ">Create Certificate</a>
          <a href="#" onclick="window.location.href = '/guestElectTable'" class="nav-link">View Records</a>
          <a href="#" onclick="window.location.href = '/electStandard'" class="nav-link">Standards</a>
        </nav>
        <br>
        <label class="content-label">Thermohygrometer</label>
        <nav id="" class="nav">
          <a href="#" onclick="window.location.href = '/guestAddThermo'"  class="nav-link ">Create Certificate</a>
          <a href="#" onclick="window.location.href = '/guestThermoTable'" class="nav-link">View Records</a>
          <a href="#" onclick="window.location.href = '/thermoStandardTable'" class="nav-link">Standards</a>
        </nav>
        <br>
        <label class="content-label">Test weight</label>
        <nav id="" class="nav">
          <a href="#" onclick="window.location.href = '/guestTestWeightAddDataView'"  class="nav-link ">Create Certificate</a>
          <a href="#" onclick="window.location.href = '/guestTestWeightTable'" class="nav-link">View Records</a>
          <a href="#" onclick="window.location.href = '/guestTestWeightStandardTable'" class="nav-link">Standards</a>
        </nav>
        <br>
        <!-- <label class="content-label">Weighing scale </label>
        <nav id="" class="nav">
          <a href="#" onclick="window.location.href = '/weighingScaleAddNew'"  class="nav-link ">Create Certificate</a>
          <a href="#" onclick="window.location.href = '/testWeightTable'" class="nav-link">View Records</a>
          <a href="#" onclick="window.location.href = '/testWeightStandardTable'" class="nav-link">Standards</a>
        </nav> -->
        <hr>
        <br>
        <!--label class="content-label">Navigation Skins</label>
        <nav id="navigationSkins" class="nav">
          <a href="" data-skin="base" class="nav-link active">Base</a>
          <a href="" data-skin="blue" class="nav-link">Blue/White</a>
          <a href="" data-skin="dark" class="nav-link">Dark</a>
          <a href="" data-skin="red"class="nav-link">Red/Dark</a>
          <a href="" data-skin="indigo" class="nav-link">White/Indigo</a>
          <a href="" data-skin="gradient" class="nav-link">White/Gradient</a>
        </nav>
        <hr>
        <br>

        <label class="content-label">Navigation Styles</label>
        <nav id="navigationStyles" class="nav">
          <a href="" data-style="base" class="nav-link active">Base</a>
          <a href="" data-style="one" class="nav-link">Style 01</a>
          <a href="" data-style="two" class="nav-link">Style 02</a>
          <a href="" data-style="three" class="nav-link">Style 03</a>
        </nav-->

        <br>
        

      </div><!-- content-body -->
    </div><!-- content -->


    <script src="dashboardAsset/lib/jquery/jquery.min.js"></script>
    <script src="dashboardAsset/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dashboardAsset/lib/feathericons/feather.min.js"></script>
    <script src="dashboardAsset/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="dashboardAsset/assets/js/script.js"></script>
  </body>
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
