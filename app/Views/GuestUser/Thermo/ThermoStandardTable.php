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
          <li class="nav-item ">
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
              <a href="#" onclick="window.location.href = '/guestThermoStandardTable'" class="sub-link active">Thermohygrometer</a>
              <a href="#" onclick="window.location.href = '/testWeightStandardTable'" class="sub-link">Test Weights</a>
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
    <div class="content">
      <div class="content-header">
        <a id="contentMenu" href="#" class="content-menu d-none d-lg-flex"><i data-feather="menu"></i></a>
        <a id="mobileMenu" href="#" class="content-menu d-lg-none"><i data-feather="menu"></i></a>
      </div><!-- content-header -->
      <div class="content-body">
            
        <div class="container-fluid shadow bg-white mb-3">
              <div class="">
                <!--h1 class="h2">Elect table</h1-->
                <div class="btn-toolbar mb-md-0">  
                <div class="  container-fluid">
                <div class="  p-3 mb-5 rounded">
                    <div class="mx-auto d-flex justify-content-center">
                        <h4 class="">Thermohygrometer Standards</h4>
                    </div> 
                <div class="row">
                    <div class="col-12">
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
                            <a class="btn btn-info float-end" href="guestThermoStandardAddView"><i class="fas fa-folder-plus"></i> Add New Standard</a>
                        </div>
                        <div class="col mt-2">
                            <a class="btn btn-secondary float-end" href="guestThermoStandardAddViewPRT"><i class="fas fa-folder-plus"></i> Add PRT Data</a>
                        </div>
                        <div class="col mt-2">
                            <a class="btn btn-primary float-end" href="guestThermoStandardAddChamber"><i class="fas fa-folder-plus"></i> Add New Chamber</a>
                        </div>
                        <!--form action="thermoStandardTable">
                            <div class="input-group mb-3 col mt-2">
                                <input type="text" name="q" required class="form-control" placeholder="Serial or Cert No." aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button name="" class="btn btn-success" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                                        <a name="" href="thermoStandardTable" class="btn btn-danger" type="" id="button-addon2"><i class="fas fa-undo-alt"></i></a>
                                    </div>
                            </div>
                        </form-->
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="users-list">
                                <thead>
                                    <tr>
                                        <th>Certificate no.</th>
                                        <th>Model No.</th>
                                        <th>Serial No.</th>
                                        <th>Standard</th>
                                        <th>Manufacturer</th>
                                        <th class="text-center">View</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($thermostandardtable as $row) : ?>
                                    <tr
                                    <?php 
                                            date_default_timezone_set('Asia/Manila');
                                            $forComparisonToday = strtotime(date('Y-m-d'));
                                            $standardDue = $row['dateOfCali']; 
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
                                        ?>
                                    >
                                        <td><?= $row['certificateNumber'];?></td>
                                        <td><?= $row['modelNumber'];?></td>
                                        <td><?= $row['serialNumber'];?></td>
                                        <td><?= $row['standard'];?></td>
                                        <td><?= $row['manufacturer'];?></td>
                                        <td class="text-center"><a href="<?= base_url('guestThermoStandardEdit/'.$row['id']) ?>" class="btn btn"><i data-feather="eye"></i></a></td>
                                        <td class="text-center"><a onclick="deleteConfirmation('<?= base_url('deleteThermoStd/'.$row['serialNumber']) ?>')" class="btn btn"><i data-feather="trash"></i></a></td>
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
            
          </div>
          </div>
        </div>
      </div>
      <!-- /#page-content-wrapper -->
    </div>
  </body>
</html>
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

</script>

<script>
    function deleteConfirmation(url){
       // windows.confirm("are u sure?");
       href="" 
        var txt;
        if (confirm("Do you want to delete?")) {
            location.href = url;
        }
    }

    function logoutConfirmation(url){
       // windows.confirm("are u sure?");
       href="" 
        var txt;
        if (confirm("Do you want to logout <?= session('name')?>?")) {
            location.href = url;
        }
    }
</script>