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
    
    <link href="../dashboardAsset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="../dashboardAsset/lib/remixicon/fonts/remixicon.css" rel="stylesheet">
    
    <!-- Template CSS -->
    <link rel="stylesheet" href="../dashboardAsset/assets/css/style.min.css">
</head>  
<body class="skin-base animate">
  <?php
		$data = [
			'active' => 'standard2',
			'show' => 'standard',
		];
		echo view('layouts/sidebarAdmin',$data)?>
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div class="content">
      <div class="content-header">
        <a id="contentMenu" href="#" class="content-menu d-none d-lg-flex"><i data-feather="menu"></i></a>
        <a id="mobileMenu" href="#" class="content-menu d-lg-none"><i data-feather="menu"></i></a>
      </div><!-- content-header -->
        <div class="content-body">
                <!--h1 class="h2">Elect table</h1-->
                <div class="btn-toolbar mb-2 mb-md-0">  
                  <div class="container-fluid mt-4">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        
                    <div class="mx-auto d-flex justify-content-center">
                        <h4 class="">Thermo chamber</h4>
                    </div>

                        <!-- Modal add new -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Enter Customer details</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        
                                    <form action="thermoStandardStoreChamber" method="post">
                                        <label for="">Serial No</label>
                                        <input type="text" name="serialNumber"  class="form-control mb-3" style="height: 50px;" placeholder="Serial No.">
                                        <label for="">Temperature Chamber Instability:</label>
                                        <input type="text" name="tempInstability" class="form-control mb-3" style="height: 50px;" placeholder="Chamber Instability">
                                        <label for="">Temperature Chamber inhomogeneity:</label>
                                        <input type="text" name="tempInhomogeneity" class="form-control" style="height: 50px;" placeholder="Chamber inhomogeneity">
                                        <label for="">Relative Humidity Chamber Instability:</label>
                                        <input type="text" name="RHInstability" class="form-control mb-3" style="height: 50px;" placeholder="Chamber Instability">
                                        <label for="">Relative Humidity Chamber inhomogeneity:</label>
                                        <input type="text" name="RHInhomogeneity" class="form-control" style="height: 50px;" placeholder="Chamber inhomogeneity">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

              <!-- Update  Modal -->
                <div id="updateModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    
                        <!-- Update  Modal-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Update </h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>  
                            </div>
                            <div class="modal-body">
                                <form id="update" name="update" action="<?php echo base_URL('ThermoController/thermoChamberUpdate');?>" method="post">
                                    <input type="hidden" name="id" id="idEdit"/>
                                    <input type="hidden" name="snOfSelected" id="snOfSelected">
                                   
                                    <div class="form-group">
                                        <label for="txtFirstName">Chamber Instability:</label>
                                        <input type="text" class="form-control" id="instabilityEdit" placeholder="Chamber Instability" name="Instability">
                                    </div>
                                    <div class="form-group">
                                        <label for="txtLastName">Chamber inhomogeneity:</label>
                                        <input type="text" class="form-control" id="inhomogeneityEdit" placeholder="Chamber inhomogeneity" name="inhomogeneity">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 


                        <div class="row">
                            <div class="col-12">
                                <?php
                                    if(session()->getFlashdata('status')){
                                        echo "<div class='alert alert-primary' role='alert'>".session()->getFlashdata('status')."</div>";
                                    }
                                ?>
                                        <div class="row float-right">
                                                <div class="input-group mb-3 col">
                                                    <!--input type="text" name="searchTable" required class="form-control" placeholder="Name or Cert No." aria-label="" aria-describedby="button-addon2"-->
                                                    <div class="input-group-append">
                                                        <!--button name="" class="btn btn-success" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                                                        <a name="" href="electTable" class="btn btn-danger" type="" id="button-addon2"><i class="fas fa-undo"></i></a-->
                                                       
                                                    </div> 
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                                        Add New
                                                    </button>
                                                </div>
                                                
                                           
                                        </div>
                                     
                                    <div class=" text-center">
                                    <table class="table table-sm table-bordered" id="users-list">
                                        <thead class="">
                                            <tr>
                                                <th>Serial No.</th>
                                                <th>Unit</th>
                                                <th>Instability</th>
                                                <th>Inhomogeneity</th>
                                                <th>View</th>
                                                <th>Delete</th>
                                            </tr>
                                            
                                        </thead>
                                        <tbody>

                                        <?php 
                                                if(count($thermochamber) > 0){
                                                    foreach($thermochamber as $row) : ?>

                                                <tr id="<?php echo $row['id'] ?>">
                                                       
                                                    <td><?= $row['serialNumber'];?></td>
                                                    <td><?= $row['unit'];?></td>
                                                    <td><?= $row['Instability'];?></td>
                                                    <td><?= $row['inhomogeneity'];?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#updateModal" onclick="sendDataToEdit(<?= $row['id'];?>,'<?= $row['serialNumber'];?>','<?= $row['Instability'];?>','<?= $row['inhomogeneity'];?>')">
                                                            <i data-feather="eye"></i>
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <a  class="btn btn-light" onclick="deleteConfirmation('<?= base_url('deleteChamber/'.$row['id']) ?>','<?= $row['serialNumber']?>')" class="btn " data-toggle="tooltip" data-placement="top" title="Delete Item">
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="../dashboardAsset/lib/jquery/jquery.min.js"></script>
<script src="../dashboardAsset/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dashboardAsset/lib/feathericons/feather.min.js"></script>
<script src="../dashboardAsset/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../dashboardAsset/assets/js/script.js"></script>
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

    


function sendDataToEdit(id, sn, insta, inho) {
    document.getElementById('instabilityEdit').value = insta;
    document.getElementById('inhomogeneityEdit').value = inho;
    document.getElementById('idEdit').value = id;
    document.getElementById('snOfSelected').value = sn;

    
}


    
</script>
