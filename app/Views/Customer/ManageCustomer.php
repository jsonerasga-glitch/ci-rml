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
			'active' => 'customerSidebar',
			'show' => 'customerSidebar',
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
        <div class="container-fluid" style="background-color:#faf7f0; ">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Enter Customer details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        
                                    <form action="customerStore" method="post">
                                        <label for="">Customer / Company Name</label>
                                        <input type="text" name="customer"  class="form-control mb-3" style="height: 50px;" placeholder="Name">
                                        <label for="">Address</label>
                                        <input type="text" name="address" class="form-control" style="height: 50px;" placeholder="Address">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

              <!-- Update User Modal -->
                <div id="updateModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    
                        <!-- User Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Update </h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="update" name="update" action="<?php echo site_url('Customer/update');?>" method="post">
                                    <input type="hidden" name="id" id="id"/>
                                    <div class="form-group">
                                        <label for="txtFirstName">Customer:</label>
                                        <input type="text" class="form-control" id="customer" placeholder="Customer/Company Name" name="customer">
                                    </div>
                                    <div class="form-group">
                                        <label for="txtLastName">Address:</label>
                                        <input type="text" class="form-control" id="address" placeholder="Enter Address " name="address">
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
                          <label class="content-label">CUSTOMER RECORDS</label> 
                            <div class="col-12">
                                <?php
                                    if(session()->getFlashdata('status')){
                                        echo "<div class='alert alert-primary' role='alert'>".session()->getFlashdata('status')."</div>";
                                    }
                                ?>
                                        <div class="row float-right">
                                                <div class="input-group mb-3 col">
                                                  <button type="button" class="btn btn-outline-secondary content-label" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                      Add New
                                                  </button>
                                                </div>
                                                
                                           
                                        </div>
                                    <div class=" text-center">
                                    <table class="hover" id="users-list">
                                        <thead class="">
                                            <tr>
                                                <th>Customer</th>
                                                <th>Address</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                if(count($customerdetails) > 0){
                                                    foreach($customerdetails as $row) : ?>
                                                <tr id="<?php echo $row['id'] ?>">
                                                    <td><?= $row['customer'];?></td>
                                                    <td><?= $row['address'];?></td>
                                                    <td>
                                                        <a data-id="<?php echo $row['id'] ?>" class="btn btnEdit" >
                                                            <i data-feather="edit"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a onclick="deleteConfirmation('<?= base_url('deleteCus/'.$row['id']) ?>','<?= $row['customer']?>')" class="btn " data-toggle="tooltip" data-placement="top" title="Delete Item">
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
      <!-- /#page-content-wrapper -->
    </div>
  </body>
  <script src="dashboardAsset/lib/jquery/jquery.min.js"></script>
  <script src="dashboardAsset/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="dashboardAsset/lib/feathericons/feather.min.js"></script>
  <script src="dashboardAsset/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="dashboardAsset/assets/js/script.js"></script>
</html>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
      $('#users-list').DataTable();
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
        if (confirm("Do you want to logout <?= session('name')?>?")) {
            location.href = url;
        }
    }

   //When click edit 
   $('body').on('click', '.btnEdit', function () {
        var id = $(this).attr('data-id');
           $.ajax({
                url: 'Customer/edit/'+id,
                type: "GET",
                dataType: 'json',
                success: function (res) {
                $('#updateModal').modal('show');
                $('#update #id').val(res.data.id); 
                $('#update #customer').val(res.data.customer);
                $('#update #address').val(res.data.address);
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
</script>
<style>
    table.dataTable {
    font-size: 1em;
    font-family: tahoma;
    }
</style>
