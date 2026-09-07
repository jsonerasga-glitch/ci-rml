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
        <link rel="stylesheet" href="/dashboardAsset/assets/css/style.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

        <style>
            table.dataTable {
            font-size: 1em;
            font-family: tahoma;
            }
        </style>
    </head>  
    <body class="skin-base animate">
        <?php
            $data = [
                'active' => 'standard7',
                'show' => 'standard',
            ];
            echo view('layouts/sidebarAdmin',$data)
        ?>

        <div class="content">
            <div class="content-header">
                <a id="contentMenu" href="#" class="content-menu d-none d-lg-flex"><i data-feather="menu"></i></a>
                <a id="mobileMenu" href="#" class="content-menu d-lg-none"><i data-feather="menu"></i></a>
            </div>
            <div class="content-body">
                <div class="container-fluid ">
                    <div class="btn-toolbar mb-2 mb-md-0">  
                        <div class="container-fluid">
                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                <div class="">
                                    <label class="content-label">
                                        <b>Barometer</b>
                                    </label>
                                </div>
                                <?php
                                    if(session()->getFlashdata('status')){
                                        echo "<div class='alert alert-primary' role='alert'>".session()->getFlashdata('status')."</div>";
                                    }
                                ?>
                                <div class="row">
                                    <div class="col mt-2 mb-3">
                                        <button type="button" class="btn btn-outline-dark content-label" data-bs-toggle="modal" data-bs-target="#modalNewStandard">Add New</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                            <tr>
                                                <th>Serial Number</th>
                                                <th>Certificate Number</th>
                                                <th>Description</th>
                                                <th>Provider</th>
                                                <th>Days Due</th>
                                                <th class="text-center"> View/Edit </th>
                                                <th class="text-center"> Delete </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($standardData as $row) : ?>
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
                                                <td><?= $row['serialNumber'];?></td>
                                                <td><?= $row['certificateNumber'];?></td>
                                                <td><?= $row['description'];?></td>
                                                <td><?= $row['provider'];?></td>
                                                <td><?= $days_due. " " . $suffix?></td>
                                                <td class="text-center">
                                                    <button type="button" class="btn" onclick="editAddData('<?= $row['id']?>');"> <i data-feather="clipboard"></i> </button>
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn" onclick="deleteConfirmation('/standard/barometer/deleteBarometer/<?= $row['id']?>')">
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
                </div>
            </div>
        </div>  

        <div class="modal fade" id="modalNewStandard" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Barometer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action='/standard/barometer/addBarometer' method="POST" name='addNewForm'>
                        <fieldset>
                            <div class="form-group">
                                <label class=" control-label" for="certificateNumber">Certificate Number</label>  
                                <div class="">
                                    <input id="certificateNumber" name="certificateNumber" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class=" control-label" for="serialNumber">Serial Number</label>  
                                <div class="">
                                    <input id="serialNumber" name="serialNumber" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class=" control-label" for="description">Description</label>
                                <div class="">                     
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class=" control-label" for="dateOfCalibration">Date Of Calibration</label>
                                <div class="">                     
                                    <input type='date' class="form-control" id="dateOfCalibration" name="dateOfCalibration">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class=" control-label" for="provider">Provider</label>  
                                <div class="">
                                    <input id="provider" name="provider" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class=" control-label" for="resolution">Resolution</label>  
                                <div class="">
                                    <input id="resolution" name="resolution" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class=" control-label" for="uncertaintyHPA">Uncertainty hPa</label>  
                                <div class="">
                                    <input id="uncertaintyHPA" name="uncertaintyHPA" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="uncertaintyRH">Uncertainty RH</label>  
                                <div class="">
                                    <input id="uncertaintyRH" name="uncertaintyRH" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="uncertaintyTEMPAIR">Uncertainty Temperature Air</label>  
                                <div class="">
                                    <input id="uncertaintyTEMPAIR" name="uncertaintyTEMPAIR" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>

                        </fieldset>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" onclick="document.addNewForm.submit()">Add</button>
                </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Barometer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action='/standard/barometer/updateBarometer' method="POST" name='updateForm'>
                        <fieldset>
                            <input type="hidden" name="standardID" id="standardID">

                            <div class="form-group">
                                <label class=" control-label" for="certificateNumberEdit">Certificate Number</label>  
                                <div class="">
                                    <input id="certificateNumberEdit" name="certificateNumberEdit" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class=" control-label" for="serialNumberEdit">Serial Number</label>  
                                <div class="">
                                    <input id="serialNumberEdit" name="serialNumberEdit" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class=" control-label" for="descriptionEdit">Description</label>
                                <div class="">                     
                                    <textarea class="form-control" id="descriptionEdit" name="descriptionEdit"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class=" control-label" for="dateOfCalibrationEdit">Date Of Calibration</label>
                                <div class="">                     
                                    <input type='date' class="form-control" id="dateOfCalibrationEdit" name="dateOfCalibrationEdit">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class=" control-label" for="providerEdit">Provider</label>  
                                <div class="">
                                    <input id="providerEdit" name="providerEdit" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class=" control-label" for="resolutionEdit">Resolution</label>  
                                <div class="">
                                    <input id="resolutionEdit" name="resolutionEdit" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class=" control-label" for="uncertaintyHPAEdit">Uncertainty hPa</label>  
                                <div class="">
                                    <input id="uncertaintyHPAEdit" name="uncertaintyHPAEdit" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="uncertaintyRHEdit">Uncertainty RH</label>  
                                <div class="">
                                    <input id="uncertaintyRHEdit" name="uncertaintyRHEdit" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="uncertaintyTEMPAIREdit">Uncertainty Temperature Air</label>  
                                <div class="">
                                    <input id="uncertaintyTEMPAIREdit" name="uncertaintyTEMPAIREdit" type="text" placeholder="" class="form-control input-md">
                                </div>
                            </div>

                        </fieldset>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" onclick="document.updateForm.submit()">Update</button>
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
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    const standardData = <?= json_encode($standardData)?>;

    $(document).ready( function () {
      $('.table').DataTable();
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

    function editAddData(ID){
        let selectedStandardData = standardData.find(o => o.id === ID);
        $("#standardID").val(selectedStandardData['id'])
        $("#certificateNumberEdit").val(selectedStandardData['certificateNumber'])
        $("#serialNumberEdit").val(selectedStandardData['serialNumber'])
        $("#descriptionEdit").val(selectedStandardData['description'])
        $("#dateOfCalibrationEdit").val(selectedStandardData['dateOfCalibration'])
        $("#providerEdit").val(selectedStandardData['provider'])
        $("#resolutionEdit").val(selectedStandardData['resolution'])
        $("#uncertaintyHPAEdit").val(selectedStandardData['uncertaintyHPA'])
        $("#uncertaintyRHEdit").val(selectedStandardData['uncertaintyRH'])
        $("#uncertaintyTEMPAIREdit").val(selectedStandardData['uncertaintyTEMPAIR'])
        $('#modalEdit').modal('show');
    }
</script>

<script>
    function bind(id, evt, func){
        var el = document.getElementById(id);
        if (el.addEventListener){
            el.addEventListener(evt, func);
        } else if (el.attachEvent) {
            el.attachEvent('on' + evt, func);
        }
    }
</script>