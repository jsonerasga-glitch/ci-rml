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
    <link href="/dashboardAsset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
    <!-- Vendor CSS -->
    <link href="/dashboardAsset/lib/remixicon/fonts/remixicon.css" rel="stylesheet">
    
    <!-- Template CSS -->
    <link rel="stylesheet" href="/dashboardAsset/assets/css/style.min.css">
   
</head>  
  <body class="skin-base animate">
  <?php
		$data = [
			'active' => 'standard1',
			'show' => 'standard',
		];
		echo view('layouts/sidebarAdmin',$data)?>

    <!-- Page Content -->
    <div class="content">
      <div class="content-header">
        <a id="contentMenu" href="#" class="content-menu d-none d-lg-flex"><i data-feather="menu"></i></a>
        <a id="mobileMenu" href="#" class="content-menu d-lg-none"><i data-feather="menu"></i></a>
      </div><!-- content-header -->
      <div class="content-body">
            
        <div class="container-fluid ">
                <!--h1 class="h2">Elect table</h1-->
                <div class="btn-toolbar mb-2 mb-md-0">  
                    <div class="container-fluid">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class="">
                            <label class="content-label">
                                <b>Digital Thermometer Temperature Source</b>
                            </label>
                        </div>
                    <?php
                        if(session()->getFlashdata('status')){
                            echo "<div class='alert alert-primary' role='alert'>".session()->getFlashdata('status')."</div>";
                        }
                    ?>
                    
                        
                            <div class="row">
                                <div class="col mt-2 mb-3">
                                    <button type="button" class="btn btn-outline-dark content-label" data-bs-toggle="modal" data-bs-target="#newSourceModal"> Add New Source</button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm " id="users-list">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Description</th>
                                        <th>Max Instability</th>
                                        <th>Max Axial</th>
                                        <th>Max Radial</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($TemperatureSource as $row) : ?>
                                    <tr>
                                        <td><?= $row['code'];?></td>
                                        <td><?= $row['description'];?></td>
                                        <td><?= $row['maxInstability'];?></td>
                                        <td><?= $row['maxAxial'];?></td>
                                        <td><?= $row['maxRadial'];?></td>
                                        <td class="text-center">
                                            <button class='btn' id="editStandard" data-standardId='<?= $row['id'];?>'><i data-feather="clipboard"></i></button>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn" onclick="deleteConfirmation('/digitalThermometer/deleteSource/<?= $row['id']?>')">
                                                <i data-feather="trash"></i>
                                            </a>
                                        </td>
                                      </tr>   
                                    <?php endforeach; ?>          
                                </tbody>
                            </table>
                            <form name="deleteForm" id="deleteForm" action="" method="post"></form>
                            </div>
                            
                          </div>
                    </div>
                </div>
                                    </div></div>
          </div>
      <!-- /#page-content-wrapper -->
    </div>
    <div class="modal fade" id="newSourceModal" tabindex="-1" aria-labelledby="newSourceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSourceModalLabel"><span id="identifier">New</span> Temperature Source</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal"  method="POST" name='sourceModalForm' id='sourceModalForm'>
                    <input type="hidden" name="standardID" id="standardID">
                    <fieldset>

                    <!-- Form Name -->
                    <legend></legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class=" control-label" for="Code">Code</label>  
                        <div class="">
                            <input id="code" name="code" type="text" placeholder="" class="form-control input-md">
                        </div>
                    </div>

                    <!-- Textarea -->
                    <div class="form-group">
                        <label class=" control-label" for="description">Description</label>
                    <div class="">                     
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class=" control-label" for="maxInstability">Max Instability</label>  
                    <div class="">
                        <input id="maxInstability" name="maxInstability" type="text" placeholder="" class="form-control input-md">
                    </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class=" control-label" for="maxAxial">Max Axial</label>  
                    <div class="">
                    <input id="maxAxial" name="maxAxial" type="text" placeholder="" class="form-control input-md">
                        
                    </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                    <label class=" control-label" for="maxRadial">Max Radial</label>  
                    <div class="">
                    <input id="maxRadial" name="maxRadial" type="text" placeholder="" class="form-control input-md">
                        
                    </div>
                    </div>

                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" onclick="document.sourceModalForm.submit()" id='submitButton'>Add</button>
            </div>
            </div>
        </div>
    </div>
    <form action=""></form>
  </body>
</html>
<script src="/dashboardAsset/lib/jquery/jquery.min.js"></script>
<script src="/dashboardAsset/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/dashboardAsset/lib/feathericons/feather.min.js"></script>
<script src="/dashboardAsset/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/dashboardAsset/assets/js/script.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script>
    var standardData;
    var standardValues;
    $(document).ready(function() {
        binds();
    });

    function bind(id, evt, func){
        var el = document.getElementById(id);
        if (el.addEventListener){
            el.addEventListener(evt, func);
        } else if (el.attachEvent) {
            el.attachEvent('on' + evt, func);
        }
    }

    function binds(){
        bind('editStandard','click',function(){
            let stdID = $(this).data('standardid')
            addDataToEdit(stdID);
        });
    }
    function NewUpdate(){
        // if new action='/digitalThermometer/addNewSource'
        // change to update if submitButton identifier
        /*
            
            selectedStandardID
            
            
            
        */

    }
    function addDataToEdit(stdID){
        let selectedStandardData = standardData.find(o => o.id === stdID);
        $('#standardID').val(stdID)
        $('#code')
        $('#description')
        $('#maxInstability')
        $('#maxAxial')
        $('#maxRadial')
        




    }
    function getStandardData(){
        $.ajax({
            cache: false,
            async: false,
            type: "post",
            url: "/digitalThermometer/getSourceStandard",
            success: function(result) {
                standardData = result.standardData;
            },
            error: function (error) {
                console.log(error)
            },
        }).then(function(){
            addStandardToTable();
            $('#standardTable').DataTable();
        })
    }
</script>

<script>
    $(document).ready( function () {
      $('#users-list').DataTable();
  } );

    function deleteConfirmation(url){
       // windows.confirm("are u sure?");
       href="" 
        var txt;
        if (confirm("Do you want to delete this Standard?")) {
            document.getElementById("deleteForm").setAttribute('action',url);
            document.deleteForm.submit();
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