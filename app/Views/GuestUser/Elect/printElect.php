<?php
    $path = 'image/dost.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>
<?php
    $pathPAB = 'image/pab logo.png';
    $typePAB = pathinfo($pathPAB, PATHINFO_EXTENSION);
    $dataPAB = file_get_contents($pathPAB);
    $base64PAB = 'data:image/' . $typePAB . ';base64,' . base64_encode($dataPAB);
?>

<style>
body {
    overflow-x: hidden;
}

#sidebar-wrapper {
    min-height: 100vh;
    margin-left: -15rem;
    -webkit-transition: margin .25s ease-out;
    -moz-transition: margin .25s ease-out;
    -o-transition: margin .25s ease-out;
    transition: margin .25s ease-out;
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

</style>
<script>
</script>
<!DOCTYPE html>
<html>
<head>
<title>RML ++</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!--FONTAWESOME CDN-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
     <!--FONTAWESOME CDN-->
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>  
<body>
     
  <div class="d-flex " id="wrapper">
    <!-- Sidebar -->
    <div class="bg-dark border-down vh-100 " id="sidebar-wrapper" style="color: white; top: 0; position: sticky;">
        <div class="sidebar-heading text-center" style="color: white; top: 0; position: sticky;">RML Calibration</div>
        <div class="list-group list-group-flush overflow-auto h-100">
          <!--h6 class="text-center">Admin <?#= $user['name'] ?></h6-->
          <div class="card-header">
                <h2 class="mb-0">
                    <a href="guestDashboard" class="btn btn-block text-left" style="font-size: .5em; color: white;">
                        <i class="fas fa-home"></i>
                        Dashboard
                    </a> 
                </h2>
            </div>
          
            <!--a>SINLGE RANGE E BALANCE<-->          
            <div class="accordion" id="accordionExample">
                <div class="card  bg-dark">
                    <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-block text-left bg-primary collapsed" style="color:white; font-size: 0.47em;" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <i class="fas fa-balance-scale-right"></i>
                        S.Range E-Balance
                        </button>
                    </h2>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <a href="guestAddElect" class="list-group-item list-group-item-action bg-dark" style="font-size: .7rem; color: white;">
                            <i class="fas fa-folder-plus"></i>
                            New
                        </a>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <a href="guestPrintElect" class="list-group-item list-group-item-action bg-white" style="font-size: .7rem; color: black;">
                            <i class="fas fa-clipboard"></i>
                            Print Records
                        </a>
                    </div>
                </div>
            </div>
            <!--a>SINLGE RANGE E BALANCE<-->

            <!--a>THERMOHYGROMETER<-->           
            <div class="accordion" id="accordionExample">
                <div class="card  bg-dark">
                    <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed" style="color:white; font-size: 0.48em;" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="fas fa-tachometer-alt"></i>
                        Thermohygrometer
                        </button>
                    </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <a href="thermoAdd" class="list-group-item list-group-item-action bg-dark" style="font-size: .7rem; color: white;">
                            <i class="fas fa-folder-plus"></i>
                            New
                        </a>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <a href="thermoTable" class="list-group-item list-group-item-action bg-dark" style="font-size: .7rem; color: white;">
                            <i class="fas fa-clipboard"></i>
                            Print Records
                        </a>
                    </div>
                </div>
            </div>
            <!--a>THERMOHYGROMETER<-->


            <a href="#" class="list-group-item list-group-item-action bg-dark" style="font-size: .7rem; color: white;">button</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark" style="font-size: .7rem; color: white;">button</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark" style="font-size: .7rem; color: white;">button</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark" style="font-size: .7rem; color: white;">button</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark" style="font-size: .7rem; color: white;">button</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark" style="font-size: .7rem; color: white;">button</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark" style="font-size: .7rem; color: white;">button</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark" style="font-size: .7rem; color: white;">button</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark" style="font-size: .7rem; color: white;">button</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark" style="font-size: .7rem; color: white;">button</a>
            
            
        </div>
    </div>
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-secondary border-bottom" style="color: white; top: 0; ">
            <button class="btn btn-dark" id="menu-toggle">
                <i class="fas fa-bars"></i>    
                Menu
            </button>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <!--li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li-->
                        
                    <li class="nav-item">
                        <!--h5 class="mt-2" style="color: black;"><?#= $user['name'] ?></h5-->
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                            <i class="fas fa-sign-out-alt"></i> 
                        </a>
                        <div class="dropdown-menu dropdown-menu-right bg-white" aria-labelledby="navbarDropdown">
                            <h1 class="text-center">
                                <i class="fas fa-user-tie"></i>
                            </h1>
                            <!--p class="dropdown-item text-center "><?#= $user['email'] ?></p-->
                            <hr>
                            <a class="dropdown-item" href="logout">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        
        <div class="container-fluid mb-1">
            <h1 class=" ">Single Range Electronic Balance</h1>
              <div class="mt-1">
                <!--h1 class="h2">Elect table</h1-->
                <div class="btn-toolbar mb-2 mb-md-0">  
                  <div class="container mt-4">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class="card-header">
                        <!-- HEADER --> 
                            <div class="row text-center mt-4">
                                <div class="col-3">
                                    <img src="<?php echo $base64; ?>" alt="DOST LOGO" height='90px' style=" top:0"> 
                                </div>
                            <div class="col-6 mt-n4 ">
                                <h6>Republic of the Philippines</h6>
                                <h6>DEPARTMENT OF SCIENCE AND TECHNOLOGY</h6>
                                <h6>CALABARZON</h6>
                                <h6>Regional Metrology Laboratory</h6>
                            </div>
                            <div class="col-3">
                                <img src="<?php echo $base64PAB; ?>" alt="PAB LOGO" height='90px' style="">
                            </div>
                        </div>
            <!-- HEADER -->	
                    </div>
                        <div class="row">
                            <div class="col-12 mt-2">
                                <?php
                                    if(session()->getFlashdata('status')){
                                        echo "<div class='alert alert-primary' role='alert'>".session()->getFlashdata('status')."</div>";
                                    }
                                ?>
                                <!--MOdal-->
							    <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="background: rgba(255, 255, 255, 0.8); ">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <!--button type="button" class="close" data-dismiss="modal">&times;</button-->
                                            <h4 class="modal-title">Enter the Certificate No.</h4>
                                        </div>
                                        <div class="modal-body text-center">
                                            <form action="guestPrintElect">
                                                <div class="input-group mb-3">
                                                    <input type="text" name="q" required class="form-control" placeholder="Certificate number" aria-label="Recipient's username" aria-describedby="button-addon2">
                                                    <div class="input-group-append">
                                                        <button name="" class="btn btn-success" type="submit" id="button-addon2">Search</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="guestDashboard" type="button" class="btn btn-danger">Cancel</a>
                                        </div>
                                        </div>

                                    </div>
                                </div>
                                <!--MODal-->
                                    <div class="">
                                    <!--a class="btn btn-primary float-end" href="Home">Add Data</a-->
                                        <h5>Calibration Records</h5>
                                    </div>
                                    <div class=" text-center">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Certificate no.</th>
                                                    <th>Customer</th>
                                                    <th>Address</th>
                                                    <th colspan="2" class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                if(count($elect_table_1) > 0){
                                                foreach($elect_table_1 as $row): ?>
                                                <tr>
                                                    <td><?= $row['certificateNumber'];?></td>
                                                    <td><?= $row['customer'];?></td>
                                                    <td><?= $row['address'];?></td>
                                                    <td class="text-center"><a href="<?= base_url('viewPrint/'.$row['id']) ?>" class="btn btn-primary">View</a></td>
                                                  </tr>   
                                                <?php endforeach; 
                                                }else{ ?>
                                                    <tr>
                                                    <td colspan="7" class="text-center"><strong>No Record found</strong></td>
                                                    </tr>
                                                <?php }
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
<?php 
   if(!isset($_GET['q'])){
	   $q=NULL;
	   echo " $(window).on('load', function() {
        $('#staticBackdrop').modal('show');
    });";
   }else{
	   $q= isset($_GET['q']) ? $_GET['q'] : NULL;
   }
   ?>
</script>