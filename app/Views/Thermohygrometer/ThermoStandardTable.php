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
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RML ++</title>
    <link href="/dashboardAsset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/dashboardAsset/lib/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link href="/dashboardAsset/assets/css/style.min.css" rel="stylesheet">
    <link href="/css/jquery.dataTables.min.css" rel="stylesheet">
   
</head>  
<body class="skin-base animate">
  <?php
      $data = [
        'active' => 'standard5',
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
            
        <div class="container-fluid shadow bg-white mb-3">
              <div class="">
                <!--h1 class="h2">Elect table</h1-->
                <div class="btn-toolbar mb-md-0">  
                <div class="  container-fluid">
                <div class="  p-3 mb-5 rounded">
                    <div class="mx-auto d-flex justify-content-center">
                        <h4 class="">Reference Thermometer / Thermo-Hygrometer</h4>
                    </div> 
                <div class="row">
                    <div class="col-12">
                    <?php
                        if(session()->getFlashdata('status')){
                            echo "<div class='alert alert-primary' role='alert'>".session()->getFlashdata('status')."</div>";
                        }
                    ?>
                    <table class="table-borderless text-center" style="width: 200px;">
                        <tr>
                            <td style="background-color:rgba(0,128,0,0.5);">Okay</td>
                            <td style="background-color:rgba(255,165,0,0.5);">Near Expiration</td>
                            <td style="background-color:rgba(255,0,0,0.5);">Expired</td>
                        </tr>
                    </table>
                    <div class="row mb-3">
                        <div class="col mt-2">
                            <a class="btn btn-info float-end" href="thermoStandardAddView"><i class="fas fa-folder-plus"></i> Add New Standard</a>
                        </div>
                        <div class="col mt-2 d-none">
                            <a class="btn btn-secondary float-end" href="thermoStandardAddViewPRT"><i class="fas fa-folder-plus"></i> Add PRT Data</a>
                        </div>
                        <div class="col mt-2 d-none">
                            <a class="btn btn-primary float-end" href="thermoStandardAddChamber"><i class="fas fa-folder-plus"></i> Add New Chamber</a>
                        </div>
                        <!--form action="thermoStandardTable">
                            <div class="input-group mb-3 col mt-2">
                                <input type="text" name="q" required class="form-control" placeholder="Serial or Cert No." aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button name="" class="btn btn-success" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                                        <a name="" href="thermoStandardTable" class="btn btn-danger" type="" id="button-addon2"><i class="fas fa-undo-alt"></i></a>
                                    </div>
                            </div>
                        </form-->
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="users-list">
                                <thead>
                                    <tr>
                                        <th>Certificate no.</th>
                                        <th>Model No.</th>
                                        <th>Serial No.</th>
                                        <th>Standard</th>
                                        <th>Manufacturer</th>
                                        <th>Days Due</th>
                                        <th class="text-center">View</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($thermostandardtable as $row) : ?>
                                    <tr
                                    <?php 
                                            date_default_timezone_set('Asia/Manila');
                                            $forComparisonToday = strtotime(date('Y-m-d'));
                                            $standardDue = $row['dateOfCali']; 
                                            $standardDue = strtotime($standardDue); 
                                            $standardDue_Date = strtotime('+ 1 year', $standardDue); 
                                            $standardDue_DateBefore = strtotime('+ 11 month', $standardDue); 
                                            $forComparisonStandardDue = strtotime(date('Y-m-d', $standardDue_Date));
                                            $forComparisonStandardDueBefore = strtotime(date('Y-m-d', $standardDue_DateBefore));
                                            $s = $forComparisonToday>$forComparisonStandardDueBefore;
                                            $t = $forComparisonStandardDueBefore<$forComparisonStandardDue;
                                            $suffix = 'days left before due date';
                                            if($forComparisonToday>$forComparisonStandardDue){
                                                $suffix = 'days over due date';
                                                echo'style="background-color:rgba(255,0,0,0.5) "'; //red
                                                }elseif($s && $t ){
                                                    $suffix = 'days left before due date';
                                                    echo'style="background-color:rgba(255,165,0,0.5)"'; //orange
                                                }else{
                                                    $suffix = 'days left before due date';
                                                    echo'style="background-color:rgba(0,128,0,0.5)"'; //green
                                            }
                                            $days_due = abs(($forComparisonToday - $forComparisonStandardDue) / (60 * 60 * 24));
                                        ?>
                                    >
                                        <td><?= $row['certificateNumber'];?></td>
                                        <td><?= $row['modelNumber'];?></td>
                                        <td><?= $row['serialNumber'];?></td>
                                        <td><?= $row['standard'];?></td>
                                        <td><?= $row['manufacturer'];?></td>
                                        <td><?= $days_due. " " . $suffix?></td>
                                        <td class="text-center"><a href="<?= base_url('thermoStandardEdit/'.$row['id']) ?>" class="btn btn"><i data-feather="eye"></i></a></td>
                                        <td class="text-center"><a onclick="deleteConfirmation('<?= base_url('deleteThermoStd/'.$row['serialNumber']) ?>')" class="btn btn"><i data-feather="trash"></i></a></td>
                                    </tr>   
                                    <?php endforeach; ?>          
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
<script src="/js/scripts/jquery.dataTables.min.js"></script>

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
        if (confirm("Do you want to logout <?= session('name')?>?")) {
            location.href = url;
        }
    }
</script>