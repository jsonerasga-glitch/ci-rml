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
    $base64Icon5 = 'data:image/' . $typeIcon5 . ';base64,' . base64_encode($dataIcon5);?>

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
    
    <link href="dashboardAsset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="dashboardAsset/lib/remixicon/fonts/remixicon.css" rel="stylesheet">
    
    <!-- Template CSS -->
    <link rel="stylesheet" href="dashboardAsset/assets/css/style.min.css">
</head>  
  <body class="skin-dark animate">
  <?php
		$data = [
			'active' => 'createadmin',
			'show' => 'account',
		];
		echo view('layouts/sidebarAdmin',$data)?> 

    <!-- Page Content -->
    <div class="content">
      <div class="content-header">
        <a id="contentMenu" href="#" class="content-menu d-none d-lg-flex"><i data-feather="menu"></i></a>
        <a id="mobileMenu" href="#" class="content-menu d-lg-none"><i data-feather="menu"></i></a>
      </div><!-- content-header -->
            <div class="content-body">
                <?php $validation = \Config\Services::validation(); ?>
                <form action="<?= base_url('register') ?>" method="post" enctype="multipart/form-data">
                    <div class="container">
						<div class="">
                            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <h1 class="card-title">Create Admin User</h1>
                    <h5 class="card-title">Please fill with User's details</h5>
                    <div class="row ">
                        <div class="col mb-3">
                            <input type="hidden" name="role" value="admin">
                            <label for="">First Name</label><br>
                            <input type="text" value="" style=" " placeholder="(First Name)" class="form-control  " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  name="name" id="name">
                            <?php if($validation->getError('name')) {?>
                                <div class='text-danger mt-n1'>
                                <?= $error = $validation->getError('name'); ?>
                                </div>
                            <?php }?>
                        </div>
                        <div class="col mb-3">
                            <label for="">Last Name</label> <br>
                            <input type="text" value="" placeholder="(Last Name)" class="form-control  " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  name="lname" id="lname">
                            <?php if($validation->getError('lname')) {?>
                                <div class='text-danger mt-n1'>
                                <?= $error = $validation->getError('lname'); ?>
                                </div>
                            <?php }?>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-xl-6 col-12  mb-3">
                            <label for="">Email</label> <br>
                            <input type="text" value="" style=" " placeholder="username@website.com" class="form-control input-lg" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  name="email" id="email">
                            <?php if($validation->getError('email')) {?>
                                <div class='text-danger mt-n1'>
                                <?= $error = $validation->getError('email'); ?>
                                </div>
                            <?php }?>
                        </div>
                        <div class="col-xl-6 col-12 mb-3">
                            <label for="">Mobile No.</label> <br>
                            <input type="number" value="" style=" " placeholder="0909xxxxxxx" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  name="phone_no" id="phone_no">
                            <?php if($validation->getError('phone_no')) {?>
                                <div class='text-danger mt-n1'>
                                <?= $error = $validation->getError('phone_no'); ?>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-xl-6 col-12 mb-3">
                        <label for="">Password</label> <br>
                        <input type="password" value="" style=" " class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  name="password" id="password">
                        <?php if($validation->getError('password')) {?>
                        <div class='text-danger mt-n1'>
                            <?= $error = $validation->getError('password'); ?>
                        </div>
                        <?php }?>
                    </div>
                    <div class="col-xl-6 col-12 mb-3">
                        <label for="">Confirm Password</label> <br>
                        <input type="password" value="" style="" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  name="password_confirm" id="password_confirm">
                        <?php if($validation->getError('password_confirm')) {?>
                            <div class='text-danger mt-n1'>
                            <?= $error = $validation->getError('password_confirm'); ?>
                            </div>
                         <?php }?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-12 mb-3">
                        <label for="">Profile Picture</label> <br>
                        <input type="file" accept="image/*" name="profile_image" id="imageInput" onchange="loadFile(event)" style="" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" >
                        <img id="output" alt="Profile Image" style="height: 200px;"/>
                    </div>
                    <div class="col-xl-6 col-12 mb-3">
                        <label for="">Signature</label> <br>
                        <input type="file" accept="image/*" name="signature" id="SignInput" onchange="loadFileSign(event)" style="" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" >
                        <img id="signOutput" alt="Signature Image" style="height: 200px;"/>
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-lg" style="width: 200px;">Submit</button>
            </form>
            <a type="submit" href="dashboard" class="btn btn-danger btn-lg float-right" style="width: 200px;">Back</a>
            </div>

            <!--sample-->


            <div class="form_wrapper">
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
<script>
$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});

function logoutConfirmation(url){
       // windows.confirm("are u sure?");
       href="" 
        var txt;
        if (confirm("Do you want to logout <?= session('name')?>?")) {
            location.href = url;
        }
    }

    
    var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
            }
        };
    var loadFileSign = function(event) {
            var output = document.getElementById('signOutput');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
            }
        };
</script>