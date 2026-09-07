<?php
    $path = 'image/dost.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    $pathicon7 = 'image/dashboard-images/person.png';
    $typeIcon7 = pathinfo($pathicon7, PATHINFO_EXTENSION);
    $dataIcon7 = file_get_contents($pathicon7);
    $base64Icon7 = 'data:image/' . $typeIcon7 . ';base64,' . base64_encode($dataIcon7);

  $pathPAB = 'image/pab logo.png';
    $typePAB = pathinfo($pathPAB, PATHINFO_EXTENSION);
    $dataPAB = file_get_contents($pathPAB);
    $base64PAB = 'data:image/' . $typePAB . ';base64,' . base64_encode($dataPAB);

    
    $pathicon5 = 'image/dashboard-images/male-user.png';
    $typeIcon5 = pathinfo($pathicon5, PATHINFO_EXTENSION);
    $dataIcon5 = file_get_contents($pathicon5);
    $base64Icon5 = 'data:image/' . $typeIcon5 . ';base64,' . base64_encode($dataIcon5);

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

    <!-- Vendor CSS -->
    <link href="dashboardAsset/lib/remixicon/fonts/remixicon.css" rel="stylesheet">
    
    <!-- Template CSS -->
    <link rel="stylesheet" href="dashboardAsset/assets/css/style.min.css">
   
</head>  
  <body class="skin-base animate">
  <?php
		$data = [
			'active' => 'manageguest',
			'show' => 'account',
		];
		echo view('layouts/sidebarAdmin',$data)?> 

    <div class="content">
      <div class="content-header">
        <a id="contentMenu" href="#" class="content-menu d-none d-lg-flex"><i data-feather="menu"></i></a>
        <a id="mobileMenu" href="#" class="content-menu d-lg-none"><i data-feather="menu"></i></a>
      </div><!-- content-header -->
      <div class="content-body">
      <div class="row">
        <div class="col-12">
            <div class="card shadow p-3">
                <div class="card-header">
                    <div class="row mt-2">
                    <label class="content-label"><b>Manage Guest</b></label>
                    </div>
                    <div class="col-12 mt-2">
                        <?php
                            if(session()->getFlashdata('status')){
                                echo "<div class='alert alert-primary' role='alert'>".session()->getFlashdata('status')."</div>";
                            }
                        ?>
                    </div>
                    <div class="table-responsive">
                        <table class="hover" id="users-list">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone No.</th>
                                    <th>User Since</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(count($tbl_users_guest) > 0){
                                    foreach($tbl_users_guest as $row) : 
                                ?>
                                <tr>
                                    <td><?= $row['name'];?></td>
                                    <td><?= $row['email'];?></td>
                                    <td><?= $row['phone_no'];?></td>
                                    <td><?= $row['created_at'];?></td>
                                    <td>
                                      <a class="btn" onclick="deleteConfirmation('<?= base_url('deleteGuest/'.$row['id']) ?>')">
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
        $('#users-list').DataTable();
    } );

        function deleteConfirmation(url){
        // windows.confirm("are u sure?");
        href="" 
            var txt;
            if (confirm("Do you want to delete this data?")) {
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