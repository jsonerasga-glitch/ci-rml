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

    <title>RML ++</title>
    
    <link href="dashboardAsset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="dashboardAsset/lib/remixicon/fonts/remixicon.css" rel="stylesheet">
    
    <!-- Template CSS -->
    <link rel="stylesheet" href="dashboardAsset/assets/css/style.min.css">
   
</head>  
  <body class="skin-base animate">
  <?php
  	$data = [
		'active' => 'personnel',
		'show' => 'personnel',
	];
   echo view('layouts/sidebarAdmin',$data)?>
    <!-- Page Content -->
    <div class="content">
      <div class="content-header">
        <a id="contentMenu" href="#" class="content-menu d-none d-lg-flex"><i data-feather="menu"></i></a>
        <a id="mobileMenu" href="#" class="content-menu d-lg-none"><i data-feather="menu"></i></a>
      </div><!-- content-header -->
      <div class="content-body">    
        <div class="card shadow p-3 mb-5 bg-white rounded">
                <!--Add calibration officer Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Enter Calibration officer details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="personnelStore" method="post">
                                    <label for="">Calibration Officer Name</label>
                                    <input type="text" name="personnelName"  class="form-control mb-3" style="height: 50px;" placeholder="Name">
                                    <label for="">Position</label>
                                    <input type="text" name="position" class="form-control" style="height: 50px;" placeholder="Posiiton">
                                    <label for="">Email</label>
                                    <input type="text" name="email" class="form-control" style="height: 50px;" placeholder="Email">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Add calibration officer Modal -->

                 <!--Add Verifier officer Modal -->
                <div class="modal fade" id="exampleModalVerifier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Enter Verifier details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="verifierStore" method="post">
                                    <label for="">Verifier Name</label>
                                    <input type="text" name="verifierName"  class="form-control mb-3" style="height: 50px;" placeholder="Name">
                                    <label for="">Position</label>
                                    <input type="text" name="verifierPosition" class="form-control" style="height: 50px;" placeholder="Posiiton">
                                    <label for="">Email</label>
                                    <input type="text" name="verifierEmail" class="form-control" style="height: 50px;" placeholder="Email">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Add Verifier officer Modal -->
                        <div class="row">
                            <div class="col-12">
                                <?php
                                    if(session()->getFlashdata('status')){
                                        echo "<div class='alert alert-primary' role='alert'>".session()->getFlashdata('status')."</div>";
                                    }

                                ?>
                                <div class="mx-auto d-flex justify-content-center">
                                    <h4 class="">List of Calibration Officer</h4>
                                </div>
                                <div class="row float-right">
                                    <div class="input-group mb-3 col"> 
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-outline-secondary content-label" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Add New
                                        </button>
                                    </div>
                                </div>
                                    <div class=" text-center">
                                    <table class="table table-sm table-bordered display" id="">
                                        <thead class="">
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Email</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                if(count($personnel) > 0){
                                                    foreach($personnel as $row) : ?>
                                                <tr id="<?php echo $row['id'] ?>">
                                                    <td><?= $row['personnelName'];?></td>
                                                    <td><?= $row['position'];?></td>
                                                    <td><?= $row['email'];?></td>
                                                    <td>
                                                        <a onclick="deleteConfirmation('<?= base_url('deletePerson/'.$row['id']) ?>','<?= $row['personnelName']?>')" class="btn " data-toggle="tooltip" data-placement="top" title="Delete Item">
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
                                <div class="mx-auto d-flex justify-content-center mt-5">
                                    <h4 class="">List of Verifier</h4>
                                </div>
                                <div class="row float-right">
                                    <div class="input-group mb-3 col"> 
                                        <button type="button" class="btn btn-outline-secondary content-label" data-bs-toggle="modal" data-bs-target="#exampleModalVerifier">
                                            Add New
                                        </button>
                                    </div>
                                </div>
                                
                                <div class=" text-center">
                                    <table class="table table-sm table-bordered display" id="">
                                        <thead class="">
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Email</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                if(count($verifier) > 0){
                                                    foreach($verifier as $row) : ?>
                                                <tr id="<?php echo $row['verifier_id'] ?>">
                                                    <td><?= $row['verifierName'];?></td>
                                                    <td><?= $row['verifierPosition'];?></td>
                                                    <td><?= $row['verifierEmail'];?></td>
                                                    <td>
                                                        <a onclick="deleteConfirmationVer('<?= base_url('deleteVerifier/'.$row['verifier_id']) ?>','<?= $row['verifierName']?>')" class="btn " data-toggle="tooltip" data-placement="top" title="Delete Item">
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
        </div>
      <!-- /#page-content-wrapper -->
      </div>
      
  </body>
    <script src="dashboardAsset/lib/jquery/jquery.min.js"></script>
    <script src="dashboardAsset/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dashboardAsset/lib/feathericons/feather.min.js"></script>
    <script src="dashboardAsset/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="dashboardAsset/assets/js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
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
</script>
<style>
    table.dataTable {
    font-size: 1em;
    font-family: tahoma;
    }
</style>
