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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>RML++</title>
        <link href="/dashboardAsset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/dashboardAsset/lib/remixicon/fonts/remixicon.css" rel="stylesheet">
        <link href="/dashboardAsset/assets/css/style.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    </head>  
    <body class="skin-base animate">
        <?php
            $data = [
                'active' => 'standard1',
                'show' => 'standard',
            ];
            echo view('layouts/sidebarAdmin',$data)
        ?>
        <div class="content">
            <div class="content-body">
                <div class="container-fluid ">
                    <div class="btn-toolbar mb-2 mb-md-0">  
                        <div class="container-fluid">
                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                <div class="">
                                    <label class="content-label">
                                        <b>Reference Weight</b>
                                    </label>
                                </div>
                                <?php
                                    if(session()->getFlashdata('status')){
                                        echo "<div class='alert alert-primary' role='alert'>".session()->getFlashdata('status')."</div>";
                                    }
                                ?>
                                <div class="row">
                                    <table class="table-borderless text-center" style="width: 200px;">
                                        <tr>
                                            <td style="background-color:rgba(0,128,0,0.5);">Okay</td>
                                            <td style="background-color:rgba(255,165,0,0.5);">Near Expiration</td>
                                            <td style="background-color:rgba(255,0,0,0.5);">Expired</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col mt-2 mb-3">
                                        <button type="button" class="btn btn-outline-dark content-label"  onclick="window.location.href = '/electStandardAddNew'"> Add Standard</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="users-list">
                                        <thead>
                                            <tr>
                                                <th>Serial Number</th>
                                                <th>Description</th>
                                                <th>Manufacturer</th>
                                                <th>Class</th>
                                                <th>Date of Calibration</th>
                                                <th>Date of Expiry</th>
                                                <th class="text-center">View</th>
                                                <th class="text-center">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($elect_table_2 as $row) : ?>
                                            <tr
                                            <?php 
                                                date_default_timezone_set('Asia/Manila');
                                                $forComparisonToday = strtotime(date('Y-m-d'));
                                                $standardDue = $row['dateOfCalibration']; 
                                                $standardDue = strtotime($standardDue); 
                                                $standardDue_Date = strtotime('+ 1 year', $standardDue); 
                                                $standardDue_DateBefore = strtotime('+ 11 month', $standardDue); 
                                                $forComparisonStandardDue = strtotime(date('Y-m-d', $standardDue_Date));
                                                $forComparisonStandardDueBefore = strtotime(date('Y-m-d', $standardDue_DateBefore));
                                                $s = $forComparisonToday>$forComparisonStandardDueBefore;
                                                $t = $forComparisonStandardDueBefore<$forComparisonStandardDue;
                                                if($forComparisonToday>$forComparisonStandardDue){
                                                    echo'style="background-color:rgba(255,0,0,0.5) "'; //red
                                                }elseif($s && $t ){
                                                        echo'style="background-color:rgba(255,165,0,0.5)"'; //orange
                                                }else{
                                                        echo'style="background-color:rgba(0,128,0,0.5)"'; //green
                                                }
                                            ?>
                                            >
                                                <td><?= $row['serialNumber'];?></td>
                                                <td><?= $row['description'];?></td>
                                                <td><?= $row['manufacturer'];?></td>
                                                <td><?= $row['type'];?></td>
                                                <td><?php $date = $row['dateOfCalibration']; $new_date = strtotime($date); echo date('M d, Y', $new_date);?></td>
                                                <td><?php $date2 = $row['dateOfCalibration']; $new_date2 = strtotime($date2); $new_date3 = strtotime('+ 1 year', $new_date2); echo date('M d, Y', $new_date3);?></td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('electStandardEdit/'.$row['id']) ?>" class="btn"><i data-feather="eye"></i></a>
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn" onclick="deleteConfirmation('<?= $row['id']?>', '<?= $row['serialNumber']?>')"><i data-feather="trash"></i></button>
                                                </td>
                                            </tr>   
                                            <?php endforeach; ?>          
                                        </tbody>
                                    </table>
                                </div>
                                <form name="deleteForm" id="deleteForm" action="" method="post">
                                    <input type="hidden" name="deleteId" id="deleteId">
                                    <input type="hidden" name="deleteSerialNumber" id="deleteSerialNumber">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script src="/dashboardAsset/lib/jquery/jquery.min.js"></script>
<script src="/dashboardAsset/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/dashboardAsset/lib/feathericons/feather.min.js"></script>
<script src="/dashboardAsset/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/dashboardAsset/assets/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" type="text/javascript"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script>
    $(document).ready( function () {
      $('#users-list').DataTable();
    } );

    function deleteConfirmation(id, serialNumber){
        $.ajax({
                cache: false,
                type: "post",
                url: '/electronicBalance/deleteStandard',
                data: {
                    'deleteId' : id,
                    'deleteSerialNumber' :serialNumber,
                }, 
                success: function(result) {
                    console.log(result)
                    location.reload();
                },
                error: function (error) {
                    console.log(error);
                },
            });
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