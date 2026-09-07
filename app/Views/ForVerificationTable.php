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
<?= view('layouts/head'); ?>
  <body class="skin-base animate">
  <?php
		$data = [
			'active' => 'verification',
			'show' => 'verification',
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
                <div class="mx-auto d-flex justify-content-center">
                    <h4 class="">For Verification</h4>
                </div>
                <div class="mx-auto d-flex justify-content-center">
                    <h6 class="">Calibration records</h6>
                </div>

                    <div class="row">
                        <div class="col-12">
                        <?php
                            if(session()->getFlashdata('status')){
                                echo "<div class='alert alert-primary' role='alert'>".session()->getFlashdata('status')."</div>";
                            }
                        ?>
                                <div class="text-center">
                                <table class="table table-bordered table-sm" id="users-list">
                                    <thead>
                                        <tr>
                                            <th style="display: none;">Date Added</th>
                                            <th style="display: none;">id</th>
                                            <th>TSR Number</th>
                                            <th>Certificate Number</th>
                                            <th>Customer</th>
                                            <th>Worksheet</th>
                                            <th>Date Added</th>
                                            <th>Progress</th>
                                            <th class='d-none'>Print</th>
                                            <th>Edit</th>
                                            <th class='d-none'>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 

                                            $worksheet_links = [
                                                "0" => "/electronicBalance/worksheet",
                                                "1" => "/thermohygrometer/worksheet",
                                                "2" => "/testWeight/worksheet",
                                                "3" => "/weighingScale/worksheet",
                                                "4" => "/digitalThermometer/worksheet",
                                                "5" => "/digitalTimer/worksheet",
                                                "6" => "/pressureGauge/worksheet",
                                                "7" => "/pHMeter/worksheet",
                                                "8" => "/glassware/worksheet",
                                                "9" => "/temperaturecontroll/worksheet",
                                                "10" => "/enclosure/worksheet",
                                                "11" => "/refractometer/worksheet",
                                                "12" => "/caliper/worksheet",
                                                "13" => "/electricalmeter/worksheet"
                                            ];

                                            $worksheet_titles = [
                                                "0" => "Electronic Balance",
                                                "1" => "Thermo-Hygrometer",
                                                "2" => "Test Weight",
                                                "3" => "Weighing Scale",
                                                "4" => "Digital Thermometer",
                                                "5" => "Digital Timer",
                                                "6" => "Pressure Gauge",
                                                "7" => "PH Meter",
                                                "8" => "Glassware / POVA",
                                                "9" => "Temperature Controller",
                                                "10" => "Enclosure / Water Bath / Autoclave",
                                                "11" => "Refractometer",
                                                "12" => "Caliper / Micrometer",
                                                "13" => "Electrical Meter",
                                            ];

                                            if(count($forverification) > 0){

                                            for ($i=0; $i < count($forverification); $i++) { 
                                                foreach($forverification[$i] as $row) : 
                                        ?>
                                        <tr >
                                            <td style="display: none;"><?= $row['dateTimeCalibrated'];?></td>
                                            <td style="display: none;"><?= $row['id'];?></td>
                                            <td><?= json_decode($row['customerInfo'])!= null? json_decode($row['customerInfo'])->tsrNumber: '';?></td>
                                            <td><?= json_decode($row['equipmentInfo'])!= null? property_exists(json_decode($row['equipmentInfo']), 'certificateNumber') ?json_decode($row['equipmentInfo'])->certificateNumber: $row['certificateNumber']: $row['certificateNumber'];?></td>
                                            <td><?= json_decode($row['customerInfo'])!= null? property_exists(json_decode($row['customerInfo']), 'customer') ?json_decode($row['customerInfo'])->customer: $row['customer']: $row['customer'];?></td>
                                            <td><?= $worksheet_titles[$i]?></td>
                                            <td><?= $row['dateTimeCalibrated'];?></td>
                                            <td style="background-color:<?php
                                        if($row['completion'] == "Not Completed"){echo 'rgba(255,0,0,0.5)';}
                                        if($row['completion'] == "For printing"){echo 'rgba(0,255,0,0.5)';}
                                        if($row['completion'] == "Pending"){echo 'rgba(255,255,0,0.5)';}
                                        if($row['completion'] == "On-going verification"){echo 'rgba(251, 192, 147, 0.5)';}
                                        if($row['completion'] == "For correction"){echo 'rgba(255, 87, 51, 0.5)';}
                                    ?>"><?= $row['completion'];?></td>
                                            <td  class='d-none'>
                                                <a href="#" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="View and print">
                                                <i data-feather="printer"></i>   
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?= $worksheet_links[$i].'/'.$row['id'];?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit and update">
                                                <i data-feather="edit"></i>  
                                            </a>
                                          
                                            </td>
                                            <td class='d-none'>
                                                <a href="#" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete Item">
                                                    <i data-feather="trash"></i>    
                                            </a>
                                            </td>
   
                                        </tr>   
                                        <?php endforeach; 
                                        }
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
        <!-- /#page-content-wrapper --> 
    </div>
  </body>
</html>
<?= view('layouts/footer'); ?>
<script>
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
        if (confirm("Do you want to logout?")) {
            location.href = url;
        }
    }

    $(document).ready( function () {
      $('#users-list').DataTable({
        "order": [[ 0, "desc" ]]
    });
  } );
</script>