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
    $tableData = [];

    ?>

<!DOCTYPE html>

<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <!-- <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png"> -->

    <title>RML ++</title>
    
    <link href="/dashboardAsset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="/dashboardAsset/lib/remixicon/fonts/remixicon.css" rel="stylesheet">
    
    <!-- Template CSS -->
    <link rel="stylesheet" href="/dashboardAsset/assets/css/style.min.css">

    <!-- Datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

   
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
          <li class="nav-item active show"><a href="#" onclick="window.location.href = '/pendingTable'" class="nav-link"><i data-feather="user-check"></i><span>Pending/For Correction</span></a></li>
          <li class="nav-item"><a href="" class="nav-link" onclick="window.location.href = '/profile'"><i data-feather="smartphone"></i><span>My Profile</span></a></li>
          <li class="nav-item"><a href="" class="nav-link" onclick="window.location.href = '/about'"><i data-feather="align-justify"></i><span>About</span></a></li>
        </ul>
        <hr>
      </div><!-- sidebar-body -->
      <div class="sidebar-footer">
        <a href="" class="avatar online" onclick="logoutConfirmation('<?= base_url('logout') ?>')">
            <span class="avatar-initial">
                <?php $user1 = session('name'); $fstchar = $user1[0]; echo $fstchar;?>
            </span>
        </a>
        <div class="avatar-body">
          <div class="d-flex align-items-center justify-content-between">
            <h6><?= session('name')?> <?= session('lname')?></h6>
          </div>
          <span>Administrator</span>
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
            <div class="row">
                <div class="col-12">
                        <?php
                                if(session()->getFlashdata('status')){
                                    echo "<div class='alert alert-primary' role='alert'>".session()->getFlashdata('status')."</div>";
                                }
                        ?>
                    <div class="text-center">
                        <table class="table table-bordered table-sm" id="users-list">
                            <thead>
                                <tr>
                                    <th style="display: none;">id</th>
                                    <th></th>
                                    <th>Certificate no.</th>
                                    <th>Customer</th>
                                    <th>Progress</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if(count($forverification) > 0){
                                    $Module = '';
                                    $editing = '';
                                for ($i=0; $i < count($forverification); $i++) { 
                                   if($i == 0){
                                        $Module = 'Single range electronic balance';
                                        $editing = 'guestElectViewPrint/';
                                   }
                                   if($i == 1){
                                        $Module = 'Thermohygrometer';
                                        $editing = 'guestThermoPreview/';
                                   }
                                   if($i == 2){
                                        $Module = 'Test weights';
                                        $editing = '/';
                                    }
                                foreach($forverification[$i] as $row) : ?>
                                <tr 
                                    >
                                    <td style="display: none;"><?= $row['id'];?></td>
                                    <td style="font-weight: bold;"><?= $Module;?></td>
                                    <td><?= $row['certificateNumber'];?></td>
                                    <td><?= $row['customer'];?></td>
                                    <td style="background-color:<?php
                                    if($row['completion'] == "Pending"){echo 'rgba(255,255,0,0.5)';}
                                    if($row['completion'] == "On-going verification"){echo 'rgba(251, 192, 147, 0.5)';}
                                    if($row['completion'] == "For correction"){echo 'rgba(255, 87, 51, 0.5)';}
                                     
                                ?>"><?= $row['completion'];?></td>
                                    
                                    <td>
                                        <a href="/<?= $editing.$row['id'];?>/forCorrection" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit and update">
                                            <i data-feather="edit"></i>        
                                        </a>
                                    </td>
                                   
                                </tr>   
                                <?php endforeach; 
                                };
                                }else{ ?>  
                                    <tr>
                                    <td colspan="7" class="text-center"><strong>No Record found</strong></td>
                                    </tr>
                                <?php 
                                }
                                ?>          
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->      
  </body>
    <script src="/dashboardAsset/lib/jquery/jquery.min.js"></script>
    <script src="/dashboardAsset/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/dashboardAsset/lib/feathericons/feather.min.js"></script>
    <script src="/dashboardAsset/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/dashboardAsset/assets/js/script.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script>
   $(document).ready(function() {
    $('table.display').DataTable();
} );



    function deleteConfirmation(url,id){
       // windows.confirm("are u sure?");
       href="" 
        var txt;
        var id;
        if (confirm("Do you want to delete "+id+"?")) {
            location.href = url;
        }
    }
    function deleteConfirmationVer(url,id){
       // windows.confirm("are u sure?");
       href="" 
        var txt;
        var id;
        if (confirm("Do you want to delete "+id+"?")) {
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
    $(document).ready( function () {
      $('#users-list').DataTable({
            "order": [[ 0, "desc" ]]
        });
    })
</script>
<style>
    table.dataTable {
    font-size: 1em;
    font-family: tahoma;
    }
</style>
