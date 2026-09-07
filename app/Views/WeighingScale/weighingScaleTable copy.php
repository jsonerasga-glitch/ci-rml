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
          <li class="nav-item">
            <a href="" onclick="window.location.href = '/dashboard'" class="nav-link"><i data-feather="home"></i><span>Dashboard</span></a>              
          </li>
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i data-feather="clipboard"></i><span>Certificates</span></a>
            <nav class="nav-sub">
              <a href="#" onclick="window.location.href = '/electHome'"  class="sub-link" style="">Single Range E-balance</a>
              <a href="#" onclick="window.location.href = '/thermoAdd'"  class="sub-link">Thermohygrometer</a>
              <a href="" onclick="window.location.href = '/electTable'"  class="sub-link">Test Weights</a>
            </nav>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i data-feather="monitor"></i><span>Records</span></a>
            <nav class="nav-sub">
              <a href="#" onclick="window.location.href = '/electTable'"  class="sub-link">Single Range E-balance</a>
              <a href="#" onclick="window.location.href = '/thermoTable'"  class="sub-link">Thermohygrometer</a>
              <a href="#" onclick="window.location.href = '/testWeightTable'"  class="sub-link">Test Weights</a>
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
        <ul class="nav-sidebar">
            <li class="nav-item">
                <a href="#" onclick="window.location.href = '/customerTable'" class="nav-link"><i data-feather="user-check"></i><span>Customers</span></a>
            </li>
            <li class="nav-item active show">
                <a href="#" onclick="window.location.href = '/personnelTable'" class="nav-link"><i data-feather="smile"></i><span>Personnel</span></a>
            </li>
        </ul>
         <hr>
        <ul class="nav-sidebar">
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i data-feather="users"></i><span>Manage Accounts</span></a>
            <nav class="nav-sub">
              <a href="" onclick="window.location.href = '/manageUser'" class="sub-link">Admin</a>
              <a href="" onclick="window.location.href = '/manageGuestUser'" class="sub-link ">Users</a>
            </nav>
          </li>
        </ul>
        <hr>
        <ul class="nav-sidebar">
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
                                    <th>Certificate no.</th>
                                    <th>Customer</th>
                                    <th>Address</th>
                                    <th>Progress</th>
                                    <th>Print</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if(count($tableData) > 0){
                                foreach($tableData as $row) : ?>
                                <tr>
                                    <td style="display: none;"><?= $row['id'];?></td>
                                    <td><?= $row['certificateNumber'];?></td>
                                    <td><?= $row['customer'];?></td>
                                    <td><?= $row['address'];?></td>
                                    <td style="background-color:<?php
                                        if($row['completion'] == "Not Completed"){echo 'rgba(255,0,0,0.5)';}
                                        if($row['completion'] == "For printing"){echo 'rgba(0,255,0,0.5)';}
                                        if($row['completion'] == "Pending"){echo 'rgba(255,255,0,0.5)';}
                                        if($row['completion'] == "On-going verification"){echo 'rgba(251, 192, 147, 0.5)';}
                                        if($row['completion'] == "For correction"){echo 'rgba(255, 87, 51, 0.5)';}
                                    ?>"><?= $row['completion'];?></td>
                                    <td>
                                        <a href="/weighingScalePrint/<?= $row['id'];?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="View and print">
                                            <i data-feather="printer"></i>        
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/weighingScale/worksheet/<?= $row['id'];?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit and update">
                                            <i data-feather="edit"></i>        
                                        </a>
                                    </td>
                                    <td>
                                        <a onclick="" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete Item">
                                            <i data-feather="trash"></i>    
                                        </a>
                                    </td>
                                </tr>   
                                <?php endforeach; 
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
