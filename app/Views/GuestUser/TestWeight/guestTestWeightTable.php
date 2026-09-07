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
          <li class="nav-item active show">
            <a href="" class="nav-link with-sub"><i data-feather="monitor"></i><span>Records</span></a>
            <nav class="nav-sub">
              <a href="#" onclick="window.location.href = '/guestElectTable'"  class="sub-link">Single Range E-balance</a>
              <a href="#" onclick="window.location.href = '/guestThermoTable'"  class="sub-link">Thermohygrometer</a>
              <a href="#" onclick="window.location.href = '/guestTestWeightTable'"  class="sub-link active">Test Weights</a>
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
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="mx-auto d-flex justify-content-center">
                    <h4 class="">Test Weight</h4>
                </div>
                <div class="mx-auto d-flex justify-content-center">
                    <h6 class="">Calibration records</h6>
                </div>

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
                                        if(count($TestWeightData) > 0){
                                        foreach($TestWeightData as $row) : ?>
                                        <tr style="background-color:<?php
                                            if($row['completion'] == "Not Completed"){echo 'rgba(255,0,0,0.5)';}else{echo 'rgba(0,255,0,0.5)';}
                                        ?>"
                                            >
                                            <td style="display: none;"><?= $row['id'];?></td>
                                            <td><?= $row['certificateNumber'];?></td>
                                            <td><?= $row['customer'];?></td>
                                            <td><?= $row['address'];?></td>
                                            <td><?= $row['completion'];?></td>
                                            <td>
                                                <a href="<?= base_url('guestTestWeightEdit/'.$row['id']) ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="View and print">
                                                <i data-feather="printer"></i>   
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('guestTestWeightEditDataView/'.$row['id']) ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit and update">
                                                <i data-feather="edit"></i>  
                                            </a>
                                            </td>
                                            <td>
                                                <a onclick="deleteConfirmation('<?= base_url('guestTestWeightDelete/'.$row['id']) ?>')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete Item">
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
<!--script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
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
        if (confirm("Do you want to logout?")) {
            location.href = url;
        }
    }

    function reload(){
        var search = document.getElementById('q').value;
        $.ajax({
            cache: false,
            type: "GET",
            url: "<?= base_url('TestWeightController/testWeightTableDATA')?>",
            data: {'q': search},
            success:function(result){
                $("#Data").html(result);
                window.setTimeout(reload, 5000);
            },
        });
    }


    $(document).ready( function () {
      $('#users-list').DataTable({
        "order": [[ 0, "desc" ]]
    });
  } );
</script>