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
          <li class="nav-item"><a href="" class="nav-link" onclick="window.location.href = '/guestProfile'"><i data-feather="smartphone"></i><span>My Profile</span></a></li>
          <li class="nav-item active show"><a href="" class="nav-link" onclick="window.location.href = '/guestAbout'"><i data-feather="align-justify"></i><span>About</span></a></li>
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
                <div class="container-fluid">
            
                <div class="btn-toolbar mb-2 mb-md-0">  
                  <div class="container-fluid mt-4">
                    <div class="card shadow-sm p-3 mb-5 bg-white rounded">
                        
                    <!-- Update About Modal -->
                <div id="updateModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    
                        <!-- User Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Update details</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="update" name="update" action="<?php echo site_url('Customer/updateAbout');?>" method="post">
                                    <input type="hidden" name="id" id="id"/>
                                    <h4>Contact Info</h4>
                                    <div class="form-group">
                                        <label for="txtFirstName">Telefax:</label>
                                        <input type="text" class="form-control" id="tel" placeholder="Telefax" name="tel">
                                    </div>
                                    <div class="form-group">
                                        <label for="txtLastName">Email:</label>
                                        <input type="text" class="form-control" id="email" placeholder="Email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="txtLastName">URL:</label>
                                        <input type="text" class="form-control" id="url" placeholder="URL" name="url">
                                    </div>
                                    <hr>
                                    <!--h4>Thermohygrometer chamber</h4>
                                    <div class="row">
                                        <div class="form-group col">
                                            <label for="">Inhomogeneity</label>
                                            <input type="text" class="form-control mt-n2" id="inhomogeneity" placeholder="inhomogeneity" name="inhomogeneity">
                                        </div>
                                        <div class="form-group col">
                                            <label for="">Instability</label>
                                            <input type="text" class="form-control mt-n2" id="instability" placeholder="instability" name="instability">
                                        </div>
                                    </div-->
                                    
                            </div>
                            <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 

                    
                    <div class=" d-flex ">
                        <h4 class="text-left ">Contact info</h4>
                    </div>  <hr>
                        <div class="row">
                            <div class="col-12">
                                <?php
                                    if(session()->getFlashdata('status')){
                                        echo "<div class='alert alert-primary' role='alert'>".session()->getFlashdata('status')."</div>";
                                    }
                                ?>
                                      <div class="text-left ">
                                            <?php 
                                                if(count($about) > 0){
                                                    foreach($about as $row) : ?>
                                                    <h4 class="mb-3">Telefax #: <a href="tel:<?= $row['tel'];?>"><?= $row['tel'];?></a></h4>
                                                    <h4 class="mb-3">Email:<a href="mailto:<?= $row['email'];?>"> <?= $row['email'];?></a></h4>
                                                    <h4 class="mb-3">URL: <a href="<?= $row['url'];?>"><?= $row['url'];?></a></h4>
                                                    <i>Note: This will display at the bottom of each certificate.</i> <hr>
                                                   
                                                    <!--h4 class="text-left ">Thermohygrometer Chamber</h4>
                                                    <label for="">Chamber inhomogeneity</label>
                                                        <h3 class="mt-n2"><?php# echo $row['inhomogeneity'] ?></h3>
                                                    <label for="">Chamber instability</label>
                                                        <h3 class="mt-n2"><?php# echo $row['instability'] ?></h3--><br> 
                                                        <a data-id="<?php echo $row['id'] ?>" class="btn btn-warning btnEdit" >
                                                            <i class="fas fa-pencil"></i> Edit
                                                        </a>
                                                <?php endforeach; 
                                                }
                                                ?>     
                                    </div>
                            </div>
                    </div>
            </div>
            <a href="/defaultEdit">Edit Defaults</a>
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
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script>
//When click edit 
$('body').on('click', '.btnEdit', function () {
    var id = $(this).attr('data-id');
       $.ajax({
            url: 'Customer/aboutEdit/'+id,
            type: "GET",
            dataType: 'json',
            success: function (res) {
            $('#updateModal').modal('show');
            $('#update #id').val(res.data.id); 
            $('#update #tel').val(res.data.tel);
            $('#update #email').val(res.data.email);
            $('#update #url').val(res.data.url);
           // $('#update #instability').val(res.data.instability);
           // $('#update #inhomogeneity').val(res.data.inhomogeneity);
            },
            error: function (data) {
            }
            });
       });           
    // Update 
    $("#update").validate({
        rules: {
                customer: "required",
                address: "required"
                },
            messages: {
                },
            submitHandler: function(form) {
            var form_action = $("#update").attr("action");
            $.ajax({
                data: $('#update').serialize(),
                url: form_action,
                type: "POST",
                dataType: 'json',
            
                error: function (data) {
            }
    });
}
});  

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
        if (confirm("Do you want to logout <?= session('name')?>?")) {
            location.href = url;
        }
    }
</script>
