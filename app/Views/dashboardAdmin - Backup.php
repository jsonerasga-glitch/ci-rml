<?php
    $path = 'image/dost.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    $pathPAB = 'image/pab logo.png';
    $typePAB = pathinfo($pathPAB, PATHINFO_EXTENSION);
    $dataPAB = file_get_contents($pathPAB);
    $base64PAB = 'data:image/' . $typePAB . ';base64,' . base64_encode($dataPAB);

    $pathicon = 'image/dashboard-images/kitchen-scales.png';
    $typeIcon = pathinfo($pathicon, PATHINFO_EXTENSION);
    $dataIcon = file_get_contents($pathicon);
    $base64Icon = 'data:image/' . $typeIcon . ';base64,' . base64_encode($dataIcon);

    $pathicon2 = 'image/dashboard-images/hygrometer.png';
    $typeIcon2 = pathinfo($pathicon2, PATHINFO_EXTENSION);
    $dataIcon2 = file_get_contents($pathicon2);
    $base64Icon2 = 'data:image/' . $typeIcon2 . ';base64,' . base64_encode($dataIcon2);

    $pathicon3 = 'image/dashboard-images/account.png';
    $typeIcon3 = pathinfo($pathicon3, PATHINFO_EXTENSION);
    $dataIcon3 = file_get_contents($pathicon3);
    $base64Icon3 = 'data:image/' . $typeIcon3 . ';base64,' . base64_encode($dataIcon3);

    $pathicon4 = 'image/dashboard-images/data-admin.png';
    $typeIcon4 = pathinfo($pathicon4, PATHINFO_EXTENSION);
    $dataIcon4 = file_get_contents($pathicon4);
    $base64Icon4 = 'data:image/' . $typeIcon4 . ';base64,' . base64_encode($dataIcon4);

    $pathicon5 = 'image/dashboard-images/male-user.png';
    $typeIcon5 = pathinfo($pathicon5, PATHINFO_EXTENSION);
    $dataIcon5 = file_get_contents($pathicon5);
    $base64Icon5 = 'data:image/' . $typeIcon5 . ';base64,' . base64_encode($dataIcon5);

    $pathicon6 = 'image/dashboard-images/toolbox.png';
    $typeIcon6 = pathinfo($pathicon6, PATHINFO_EXTENSION);
    $dataIcon6 = file_get_contents($pathicon6);
    $base64Icon6 = 'data:image/' . $typeIcon6 . ';base64,' . base64_encode($dataIcon6);

    $pathicon7 = 'image/dashboard-images/person.png';
    $typeIcon7 = pathinfo($pathicon7, PATHINFO_EXTENSION);
    $dataIcon7 = file_get_contents($pathicon7);
    $base64Icon7 = 'data:image/' . $typeIcon7 . ';base64,' . base64_encode($dataIcon7);
?>

  <script type="text/javascript">
    // Set timeout variables.
    //var timoutNow = 1800000; // Timeout of 30 mins - time in ms
    var timoutNow = 14400000;
    var logoutUrl = "<?php echo base_url('logout') ?>"; // URL to logout page.

    var timeoutTimer;

    // Start timer
    function StartTimers() {
      timeoutTimer = setTimeout("IdleTimeout()", timoutNow);
    }

    // Reset timer
    function ResetTimers() {
      clearTimeout(timeoutTimer);
      StartTimers();
    }

    // Logout user
    function IdleTimeout() {
      window.location = logoutUrl;
    }
$(document).ready(function(){
        // Add down arrow icon for collapse element which is open by default
        $(".collapse.show").each(function(){
        	$(this).prev(".card-header").find(".fa").addClass("fa-angle-down").removeClass("fa-angle-right");
        });
        
        // Toggle right and down arrow icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-angle-right").addClass("fa-angle-down");
        }).on('hide.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-angle-down").addClass("fa-angle-right");
        });
    });
</script>

<style>

body {
    overflow-x: hidden;
}


#sidebar-wrapper {
    height: 100%;
    -webkit-transition: margin .25s ease-out;
    -moz-transition: margin .25s ease-out;
    -o-transition: margin .25s ease-out;
    transition: margin .25s ease-out;
    overflow-y: auto;
    width: 286px;
    position: fixed;
  
}

#sidebar-wrapper .sidebar-heading {
    padding: 0.875rem 1.25rem;
    font-size: 1.2rem;
}

#sidebar-wrapper .list-group {
    width: 15rem;
}

#page-content-wrapper {
    min-width: 100vw;
}

#wrapper.toggled #sidebar-wrapper {
    margin-left: 0;
}

@media (min-width: 768px) {
    #sidebar-wrapper {
        margin-left: 0;
    }

    #page-content-wrapper {
        min-width: 0;
        width: 100%;
    }

    #wrapper.toggled #sidebar-wrapper {
        margin-left: -15rem;
    }
}


[data-toggle="collapse"] .fa:before {  
  content: "\f107";
}

[data-toggle="collapse"].collapsed .fa:before {
  content: "\f104";
}


</style>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=0.6">
    
<title>RML ++</title>
    <!-- CSS only -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!--FONTAWESOME CDN-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
     <!--FONTAWESOME CDN-->
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
    <script type="text/javascript">
        google.charts.load('visualization', "1", {
            packages: ['corechart']
        });
    </script>
</head>  
<body onload="StartTimers();" onmousemove="ResetTimers();" style="font-family: Calibri; background-color:#faf7f0;">     

  <div class="d-flex " id="wrapper" style="">
    <!-- Sidebar vh-100-->
    <div class="sidebar border-down vh-100 " id="sidebar-wrapper" style="color: white; top: 0; position: sticky; background-color:#0f1a34; ">
        <div class="sidebar-heading " style="color: white; top: 0; position: sticky; background-color:#182444; z-index: 1;">							
            <img src="<?php echo $base64; ?>" class="mr-2" alt="DOST LOGO" height='30px' style="border-radius:5px; ">
            <strong>RML Calibration</strong>
        </div>
        <div class="list-group list-group-flush overflow-auto">
            <h6 class="mt-3 text-center">
			    <img src="/<?= "ProfilePics/".$user['profile_image']; ?>" alt="DOST LOGO" height='30px' width='30px' style="border-radius:50%; image-resolution: 300dpi;" class="mr-2">
                Admin <?= session('name') ?>
            </h6>
        <div class="card-header">
                <h2 class="mb-0">
                    <a href="dashboard" class="btn btn-block text-left"  style="background-color:white; color: #091122; border-radius:15px; ">
                        <i class="fas fa-home"></i>
                        Dashboard
                    </a> 
                </h2>
            </div>
          
            <!--a>SINLGE RANGE E BALANCE<-->          
            <div class="accordion" id="accordionExample">
                <div class="">
                    <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class=" btn btn-block text-left collapsed button" id="" style="color:white; font-size: 0.47em;" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <i class="fas fa-balance-scale-right"></i>
                        S.Range E-Balance&nbsp&nbsp&nbsp
                        <i class="fa"></i>
                        </button>
                    </h2>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <a href="electHome" class="list-group-item list-group-item-action" style="font-size: .7rem; color: white; background-color:#091122;">
                            <i class="fas fa-folder-plus"></i>
                            New
                        </a>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <a href="electTable" class="list-group-item list-group-item-action" style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-clipboard"></i>
                            View Records
                        </a>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <a href="electStandard" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-table"></i>
                            View Standard
                        </a>
                    </div>
                </div>
            </div>
            <!--a>SINLGE RANGE E BALANCE<-->

            <!--a>THERMOHYGROMETER<-->           
            <div class="accordion" id="accordionExample">
                <div class="">
                    <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed" style="color:white; font-size: 0.48em;" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="fas fa-tachometer-alt"></i>
                        Thermohygrometer&nbsp
                        <i class="fa"></i>
                        </button>
                    </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <a href="thermoAdd" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-folder-plus"></i>
                            New
                        </a>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <a href="thermoTable" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-clipboard"></i>
                            View Records
                        </a>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <a href="thermoStandardTable" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-table"></i>
                            View Standard
                        </a>
                    </div>
                </div>
            </div>
            <!--a>THERMOHYGROMETER<-->
             <!--a>Test weight<-->           
             <div class="accordion" id="accordionExampleTEstWeight">
                <div class="">
                    <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed" style="color:white; font-size: 0.48em;" type="button" data-toggle="collapse" data-target="#collapseTwoTestWeight" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="fas fa-weight-hanging"></i>
                        &nbspTest Weight&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <i class="fa"></i>
                        </button>
                    </h2>
                    </div>
                    <div id="collapseTwoTestWeight" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExampleTEstWeight">
                        <a href="testWeightAddDataView" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-folder-plus"></i>
                            New
                        </a>
                    </div>
                    <div id="collapseTwoTestWeight" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExampleTEstWeight">
                        <a href="testWeightTable" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-clipboard"></i>
                            View Records
                        </a>
                    </div>
                    <div id="collapseTwoTestWeight" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExampleTEstWeight">
                        <a href="testWeightStandardTable" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-table"></i>
                            View Standard
                        </a>
                    </div>
                    <div id="collapseTwoTestWeight" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExampleTEstWeight">
                        <a href="testWeightSensitivityTestTable" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-table"></i>
                            View Sensitivity Test
                        </a>
                    </div>
                </div>
            </div>
            <!--a>Test weight<-->

            <!--a>USER MANAGEMENT<--> 
            <div class="accordion" id="accordionExample">
                <div class=" ">
                    <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed " style="color:white; " type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <i class="fas fa-user-cog"></i>
                        User Management
                        <i class="fa"></i>
                        </button>
                    </h2>
                    </div>
                    <div id="collapseThree" class="collapse " aria-labelledby="headingThree" data-parent="#accordionExample">
                        <a href="createUser" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-user-plus"></i>
                            New Admin
                        </a>
                    </div>
                    <div id="collapseThree" class="collapse " aria-labelledby="headingThree" data-parent="#accordionExample">
                        <a href="guestUserIndex" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-user-plus"></i>
                            New Guest User
                        </a>
                    </div>
                    <div id="collapseThree" class="collapse " aria-labelledby="headingThree" data-parent="#accordionExample">
                        <a href="manageUser" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-tasks"></i>
                            View Admin 
                        </a>
                    </div>
                    <div id="collapseThree" class="collapse " aria-labelledby="headingThree" data-parent="#accordionExample">
                        <a href="manageGuestUser" class="list-group-item list-group-item-action" style="font-size: .7rem; color: white; background-color: #091122;">
                            <i class="fas fa-tasks"></i>
                            Manage Guest User 
                        </a>
                    </div>
                </div>
            </div>
            <!--a>USER MANAGEMENT<--> 
            <div class="" id="">
                <div class=" ">
                    <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <a href="customerTable" class="btn btn-block text-left  " style="color: white; " type="button">
                            <i class="fas fa-user-chart"></i>
                            Customer
                            <i class="fa"></i>
                        </a>
                    </h2>
                    </div>
                </div>
            </div>
            
            <div class="" id="">
                <div class=" ">
                    <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <a href="about" class="btn btn-block text-left  " style="color:white; " type="button">
                            <i class="far fa-info-circle"></i>
                            About
                            <i class="fa"></i>
                        </a>
                    </h2>
                    </div>
                </div>
            </div>

            <div class="" id="">
                <div class=" ">
                    <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <a href="personnelTable" class="btn btn-block text-left  " style="color:white; " type="button">
                        <i class="far fa-user-secret"></i>
                            Personnel
                            <i class="fa"></i>
                        </a>
                    </h2>
                    </div>
                </div>
            </div>
            
            <div class="" id="">
                <div class=" ">
                    <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <a href="profile" class="btn btn-block text-left  " style="color:white; " type="button">
                            <i class="far fa-id-badge"></i>
                            My Profile
                            <i class="fa"></i>
                        </a>
                    </h2>
                    </div>
                </div>
            </div>


        </div>
    </div>

    
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow" style="color: white; top: 0; position: sticky; z-index: 1;">
            <button class="btn btn-light" id="menu-toggle">
                <i class="fas fa-bars"></i>    
            </button>
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item ">
                        <a class="nav-link" onclick="logoutConfirmation('<?= base_url('logout') ?>')" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                            <h6 class="" style="color: blue;">
                                <!--img src="<?php #echo $base64Icon5; ?>" alt="DOST LOGO" class="" height='20px'-->
                            <?= session('name')?> <?= session('lname')?> 
                            <i class="far fa-angle-down mx-1"></i>
                        </h6>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="container-fluid" style="background-color:#faf7f0;">
            <!--div class="d-flex flex-wrap align-items-center justify-content-between">
                <div class="page_title_left mt-2 mb-4">
                    <h4 class="mt-4 ml-4" style="font-family: Calibri;">Welcome back, <#?= session('name')?>!</h4>
                    <h6 class="ml-4 mt-n2" style="font-family: Calibri;"><?php #date_default_timezone_set('Asia/Manila'); echo "Today is " . date("l") .", ". date("F d, Y");?></h6>
                </div>

            </div-->

            <!-- SECTION 1 ><-->
            <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-12 col-md-6 col-xl-3" style="">
                    <a href="electHome" style="text-decoration:none; " data-toggle="tooltip" data-placement="top" title="Go to S.R.E.B New form">
                    <div class="mb-3 p-2 shadow-sm " style=" background-color: #fefeff; height: 100; display:flex; border-radius: 5px;">
                        <div class="">
							<img src="<?php echo $base64Icon6; ?>" alt="DOST LOGO" height='80px' style="border-radius:5px; ">
                        </div>
                        <div class="p-4">
                            <h4 style="color: #d37b4a;">S.R.E.B</h4>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-12 col-xl-3 col-md-6 ">
                    <a href="thermoAdd" style="text-decoration:none;"data-toggle="tooltip" data-placement="top" title="Go to Thermo New form">
                    <div class="mb-3 p-2 shadow-sm " style=" background-color: white; height: 100; display:flex;">
                        <div class="">
							<img src="<?php echo $base64Icon2; ?>" alt="DOST LOGO" height='80px' style="border-radius:5px; ">
                        </div>
                        <div class="p-4">
                            <h5 style="color: red;">Thermo Hygrometer</h5>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-xl-3">
                    <a href="testWeightAddDataView" style="text-decoration:none;"data-toggle="tooltip" data-placement="top" title="Go to Test weight New form">
                    <div class="mb-3 p-2 shadow-sm " style=" background-color: white; height: 100; display:flex;">
                        <div class="">
							<img src="<?php echo $base64Icon; ?>" alt="DOST LOGO" height='80px' style="border-radius:5px; ">
                        </div>
                        <div class="p-4">
                            <h4 style="color: #ffc61b;">Test Weight</h4>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-xl-3">
                    <a href="createUser" style="text-decoration:none;"data-toggle="tooltip" data-placement="top" title="Go to S.R.E.B New admin">
                    <div class="mb-3 p-2 shadow-sm " style=" background-color: white; height: 100; display:flex; ">
                        <div class="" >
							<img src="<?php echo $base64Icon3; ?>" alt="DOST LOGO" height='80px' style="border-radius:5px; ">
                        </div>
                        <div class="p-4">
                            <h4 style="color: #80c76d;">Accounts</h4>
                        </div>
                    </div>
                    </a>
                </div>
                
            </div>  
            <!-- SECTION 1 ><-->

           
            <!-- SECTION 2 ><-->
            
            <div class="row text-center">
                <div class="col-12 col-md-6 col-xl-3 col-l-6" style="">
                    <a href="electTable" style="text-decoration:none; " data-toggle="tooltip" data-placement="top" title="Go to S.R.E.B table">
                    <div class="mb-3 p-2 shadow-sm " style=" background-color: #fefeff; height: 100; display:flex; border-radius: 5px;">
                        <div class="">
							<!--img src="<?php #echo $base64Icon6; ?>" alt="DOST LOGO" height='80px' style="border-radius:5px; "-->
                            <i  class="fab fa-cloudscale fa-5x mx-3" style=" color: #9FE2BF;"></i>
                        </div>
                        <div class="p-3 text-center">
                            <h7>SREB Data</h7>
                            <h4 style=""> <?=$count;?></h4>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-12 col-xl-3 col-md-6 ">
                    <a href="thermoTable" style="text-decoration:none;"data-toggle="tooltip" data-placement="top" title="Go to Thermo table">
                    <div class="mb-3 p-2 shadow-sm " style=" background-color: white; height: 100; display:flex;">
                        <div class="">
							<!--img src="<?php #echo $base64Icon2; ?>" alt="DOST LOGO" height='80px' style="border-radius:5px; "-->
                            <i  class="fas fa-thermometer-empty fa-5x mx-3" style=" color: #40E0D0;"></i>
                        </div>
                        <div class="p-3 text-center ">
                            <h7>Thermo Data</h7>
                            <h4><?=$count2;?></h4>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-xl-3">
                    <a href="testWeightTable" style="text-decoration:none;"data-toggle="tooltip" data-placement="top" title="Go to Testweight table">
                    <div class="mb-3 p-2  shadow-sm" style=" background-color: white; height: 100; display:flex;">
                        <div class="">
							<!--img src="<?php# echo $base64Icon; ?>" alt="DOST LOGO" height='80px' style="border-radius:5px; "-->
                            <i  class="fas fa-weight fa-4x mt-1 mx-3" style=" color: #6495ED;"></i>
                        </div>
                        <div class="p-3 text-center">
                            <h7>TestWeight</h7>
                            <h4><?=$count3;?></h4>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-xl-3">
                    <a href="manageGuestUser" style="text-decoration:none;"data-toggle="tooltip" data-placement="top" title="Go to Manage guest user">
                    <div class="mb-3 p-2 shadow-sm " style=" background-color: white; height: 100; display:flex;">
                        <div class="">
							<!--img src="<?php #echo $base64Icon3; ?>" alt="DOST LOGO" height='80px' style="border-radius:5px; "-->
                            <i class="fas fa-users fa-5x mx-3" style=" color: #CCCCFF;"></i>
                        </div>
                        <div class="p-3 text-center">
                            <h7>Users</h7>
                            <h4><?=$count4;?></h7>
                        </div>
                    </div>
                    </a>
                </div>
                
            </div>  
            <!-- SECTION 2 ><-->
            
            <!-- SECTION 3 ><-->
            
            <div class="row text-center">
                <div class="col-12 col-md-6 col-xl-3 col-l-6" style="">
                    <a href="electStandard" style="text-decoration:none; " data-toggle="tooltip" data-placement="top" title="Go to S.R.E.B Std">
                    <div class="mb-3 p-2 shadow-sm " style=" background-color: #fefeff; height: 100; display:flex; border-radius: 5px;">
                        <div class="">
							<!--img src="<?php #echo $base64Icon6; ?>" alt="DOST LOGO" height='80px' style="border-radius:5px; "-->
                            <i class="fas fa-chart-bar fa-5x mx-3 " style="color: #DFFF00;"></i>
                        </div>
                        <div class="p-3 text-center">
                            <h7>SREB Std</h7>
                            <h4 style=""> <?=$count5;?></h4>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-12 col-xl-3 col-md-6 ">
                    <a href="thermoStandardTable" style="text-decoration:none;"data-toggle="tooltip" data-placement="top" title="Go to Thermo Std">
                    <div class="mb-3 p-2 shadow-sm " style=" background-color: white; height: 100; display:flex;">
                        <div class="">
							<!--img src="<?php #echo $base64Icon2; ?>" alt="DOST LOGO" height='80px' style="border-radius:5px; "-->
                            <i class="fas fa-file-invoice fa-5x mx-3" style="color: #FFBF00;"></i>
                        </div>
                        <div class="p-3 text-center ">
                            <h7>Thermo Std</h7>
                            <h4><?=$count6;?></h4>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-xl-3">
                    <a href="testWeightStandardTable" style="text-decoration:none;"data-toggle="tooltip" data-placement="top" title="Go to Test weight std">
                    <div class="mb-3 p-2  shadow-sm" style=" background-color: white; height: 100; display:flex;">
                        <div class="">
							<!--img src="<?php# echo $base64Icon; ?>" alt="DOST LOGO" height='80px' style="border-radius:5px; "-->
                            <i class="fas fa-chart-pie fa-5x mx-3" style="color: #FF7F50;"></i>
                        </div>
                        <div class="p-3 text-center">
                            <h7>TestWeight Std</h7>
                            <h4><?=$count7;?></h4>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-xl-3">
                    <a href="manageUser" style="text-decoration:none;"data-toggle="tooltip" data-placement="top" title="Go to View admin">
                    <div class="mb-3 p-2 shadow-sm " style=" background-color: white; height: 100; display:flex;">
                        <div class="">
							<!--img src="<?php #echo $base64Icon3; ?>" alt="DOST LOGO" height='80px' style="border-radius:5px; "-->
                  
                            <i class="fas fa-user-shield fa-5x mx-3" style="color: #DE3163;"></i>
                        </div>
                        <div class="p-3 text-center">
                            <h7>View Admin </h7>
                            <h4><?=$count8;?></h7>
                        </div>
                    </div>
                    </a>
                </div>
                
            </div>  
            <!-- SECTION 3 ><-->
           
            <div class="row mt-2 mb-2">            
                <div class="col-md-6 col-12" style="">
                    <div id="GoogleLineChart" class="p-2 mb-3 shadow" style="background-color: white; height: 340px; border-radius: 5px;">
                    </div>
                </div>
                <div class=" col-12 col-md-6">
                    <div id="GoogleBarChart" class="p-2 mb-3 shadow" style="background-color: white;  height: 340px; border-radius: 5px;">
                    </div> 
                </div>
            </div>
            
      <!-- /#page-content-wrapper -->
    </div>
  </body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script>
$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});

$(".rotate").click(function () {
    $(this).toggleClass("down");
})
</script>
<script>
            google.charts.load('current', {'packages':['corechart', 'bar']});
            google.charts.setOnLoadCallback(drawLineChart);
            google.charts.setOnLoadCallback(drawBarChart);
            // Line Chart
            function drawLineChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Date', 'No. of Calibrated'],
                    <?php 
                        foreach ($inputs as $row){
                            echo "['".$row['day']."',".$row['name']."],";
                          // echo "['".$row['day']."',".$row['name']."],";
                    } ?>
                ]);
                var options = {
                curveType: 'function',
                pointSize: 10,
                    colors: ['#6495ED'],
                    backgroundColor: 'white',
                    chartArea: {
                    'bottom': '10%',
                    'top': '20%',
                    'left': '10%',
                    'width': '87%',
                    'height': '90%'},
                    title: 'Calibration per day',
                    //curveType: 'function',
                    hAxis: { 
                        //title: 'Load (g)',
                        textPosition: 'none' },
                    legend: {
                        position: 'top'
                    }
                };
                var chart = new google.visualization.LineChart(document.getElementById('GoogleLineChart'));
                chart.draw(data, options);
            }
            
            // Bar Chart
            google.charts.setOnLoadCallback(showBarChart);
            function drawBarChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Date', 'No. of Entry'], 
                    <?php 
                        foreach ($inputs as $row){
                           echo "['".$row['day']."',".$row['name']."],";
                        }
                    ?>
                ]);
                var options = {
                    colors: ['#40E0D0'],
    //backgroundColor: 'white',
                    chartArea: {
                    'left': '15%',
                    'width': '70%',
                    'height': '80%'},
                    title: ' Date received',
                    hAxis: { textPosition: 'none' },
                    is3D: true
                };
                var chart = new google.visualization.BarChart(document.getElementById('GoogleBarChart'));
                chart.draw(data, options);
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
        