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

    <title>RML ++</title>

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
          <li class="nav-item show">
            <a href="" onclick="window.location.href = '/guestDashboard'" class="nav-link"><i data-feather="home"></i><span>Dashboard</span></a>              
          </li>
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i data-feather="clipboard"></i><span>Certificates</span></a>
            <nav class="nav-sub">
              <a href="#" onclick="window.location.href = '/guestAddElect'"  class="sub-link" style="">Single Range E-balance</a>
              <a href="#" onclick="window.location.href = '/guestAddThermo'"  class="sub-link">Thermohygrometer</a>
              <a href="#" onclick="window.location.href = ''"  class="sub-link">Test Weights</a>
            </nav>
          </li>
          <li class="nav-item active show">
            <a href="" class="nav-link with-sub"><i data-feather="monitor"></i><span>Records</span></a>
            <nav class="nav-sub">
              <a href="#" onclick="window.location.href = '/guestElectTable'"  class="sub-link active">Single Range E-balance</a>
              <a href="#" onclick="window.location.href = '/guestThermoTable'"  class="sub-link">Thermohygrometer</a>
              <a href="#" onclick="window.location.href = ''"  class="sub-link">Test Weights</a>
            </nav>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i data-feather="archive"></i><span>Standards</span></a>
            <nav class="nav-sub">
              <a href="#" onclick="window.location.href = '/guestElectStandard'" class="sub-link">Single Range E-balance</a>
              <a href="#" onclick="window.location.href = '/guestThermoStandardTable'" class="sub-link">Thermohygrometer</a>
              <a href="#" onclick="window.location.href = '/testWeightStandardTable'" class="sub-link">Test Weights</a>
            </nav>
          </li> 
        </ul>
        <hr>
         <hr>
        <hr>
        <ul class="nav-sidebar">
          <li class="nav-item"><a href="" class="nav-link" onclick="window.location.href = '/profile'"><i data-feather="smartphone"></i><span>My Profile</span></a></li>
          <li class="nav-item"><a href="" class="nav-link" onclick="window.location.href = '/about'"><i data-feather="align-justify"></i><span>About</span></a></li>
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
        <div class="container-fluid">
                <!--h1 class="h2">Elect table</h1-->
                <div class="btn-toolbar mb-2 mb-md-0">  
                  <div class="container-fluid">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        
                    <div class="">
                        <label class="content-label"><b>Single Range Electronic balance Calibration records</b></label>
                    </div>
                        <div class="row">
                            <div class="col-12">
                                <?php
                                    if(session()->getFlashdata('status')){
                                        echo "<div class='alert alert-primary' role='alert'>".session()->getFlashdata('status')."</div>";
                                    }
                                ?>
                                        <div class="row float-right">
                                            <!--form action="electTable">
                                                <div class="input-group mb-3 col">
                                                    <input type="text" name="searchTable" required class="form-control" placeholder="Name or Cert No." aria-label="" aria-describedby="button-addon2">
                                                    <div class="input-group-append">
                                                        <button name="" class="btn btn-success" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                                                        <a name="" href="electTable" class="btn btn-danger" type="" id="button-addon2"><i class="fas fa-undo"></i></a>
                                                    </div>
                                                </div>
                                            </form-->
                                        </div>
                                    <div class=" text-center table-responsive">
                                        <table class="table table-bordered" id="users-list">
                                            <thead class="">
                                                <tr>
                                                    <th style="display: none;">id</th>
                                                    <th>Certificate no.</th>
                                                    <th>Customer</th>
                                                    <th>Address</th>
                                                    <th>Date Received</th>
                                                    <th>Status</th>
                                                    <th>Print</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                if(count($elect_table_1) > 0){
                                                    foreach($elect_table_1 as $row) : ?>
                                                <tr 
                                        >           
                                                    <td style="display: none;"><?= $row['id'];?></td>                                                                
                                                    <td><?= $row['certificateNumber'];?></td>
                                                    <td><?= $row['customer'];?></td>
                                                    <td><?= $row['address'];?></td>
                                                    <td><?php
                                                        date_default_timezone_set('Asia/Manila');
                                                        $dateCalibrated = $row['dateReceived']; 
                                                        $dateCalibrated = strtotime($dateCalibrated);
                                                    
                                                        echo date('M d, Y', $dateCalibrated); ?>
                                                    </td>
                                                    <td style="background-color:<?php
                                                        if($row['completion'] == "Not Completed"){echo 'rgba(255,0,0,0.5)';}
                                                        if($row['completion'] == "For printing"){echo 'rgba(0,255,0,0.5)';}
                                                        if($row['completion'] == "Pending"){echo 'rgba(255,255,0,0.5)';}
                                                        if($row['completion'] == "On-going verification"){echo 'rgba(251, 192, 147, 0.5)';}
                                                        if($row['completion'] == "For correction"){echo 'rgba(255, 87, 51, 0.5)';}
                                                    ?>"><?= $row['completion'];?></td>
                                                    <td>
                                                        <a href="<?= base_url('guestEditElect/'.$row['id']) ?>" class="btn" data-toggle="tooltip" data-placement="top" title="View and print">
                                                            <i data-feather="printer"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url('guestElectEdit/'.$row['id']) ?>" class="btn" data-toggle="tooltip" data-placement="top" title="Edit and Update">
                                                            <i data-feather="edit"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a onclick="deleteConfirmation('<?= base_url('guestDeleteElect/'.$row['certificateNumber']) ?>','<?= $row['certificateNumber']?>')" class="btn" data-toggle="tooltip" data-placement="top" title="Delete Item">
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
      $('#users-list').DataTable({
        "order": [[ 0, "desc" ]]
    });
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

    function logoutConfirmation(url){
       // windows.confirm("are u sure?");
       href="" 
        var txt;
        if (confirm("Do you want to logout <?= session('name');?>?")) {
            location.href = url;
        }
    }
</script>
<style>
    table.dataTable {
    font-size: 1em;
    font-family: tahoma;
    }
</style>
