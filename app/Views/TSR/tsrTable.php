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
    <?= view('layouts/head-essential'); ?>
    <style>
            #sampleDetailsTable td{
                text-align:left
            }
    </style>
  <body class="skin-base animate">
   <!-- sidebar -->
   <?php
		$data = [
			'active' => 'TSR',
			'show' => 'TSR',
		];
		echo view('layouts/sidebarAdmin',$data)?>
    <!-- Page Content -->
    <div class="content">
        <div class="content-header">
            <a id="contentMenu" href="#" class="content-menu d-none d-lg-flex"><i data-feather="menu"></i></a>
            <a id="mobileMenu" href="#" class="content-menu d-lg-none"><i data-feather="menu"></i></a>
            <div id='exportDiv' class=''></div>
        </div><!-- content-header -->
        <div class="content-body">    
            
            <div class="card m-2 border-light">
              <div class="card-header text-white bg-primary">
                  <div class="row">
                      <div class="mx-auto d-flex justify-content-center">
                            <div class="row">
                                <div class="col" style="align-content:center">
                                    <h3>TSR</h3>
                                </div>
                                <button type="button" class="btn btn-danger d-none" disabled id="importButton" data-bs-toggle="modal" data-bs-target="#modalImport">Import Data</button>
                                <button type="button" class="btn btn-danger d-none" id="updateAdd" data-bs-toggle="modal" data-bs-target="#modalUpdate">Export Updated Data</button>
                                <div class="col btn-group" role="group" >
                                    <button type="button" class="btn btn-danger" id="updateAdd" data-bs-toggle="modal" data-bs-target="#modalImportUpdated">Import Offline Data</button>
                                </div>
                                <div class="col d-grid gap-2" role="group" >
                                    <button type="button" class="btn btn-danger" id="getStandardButton" >Export Standard Data</button>
                                    <a class="btn btn-warning disabled" href="#" role="button" id='exportStandardButton'>Download standard data</a>
                                </div>
                            </div>
                      </div>
                  </div> 
              </div>
              <div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)"> 
                <div class="row">
                  <div class="col-12">
                    <?php
                      if(session()->getFlashdata('status')){
                          echo "<div class='alert alert-primary' role='alert'>".session()->getFlashdata('status')."</div>";
                      }
                    ?>
                    <div class="text-center ">
                        <table class="table table-bordered table-striped table-hover table-sm datatable" id="requestTable">
                                  <thead>
                                      <tr>
                                          <!-- <th style="display: none;">id</th> -->
                                          <th>Request Reference Number</th>
                                          <th>Customer Name</th>
                                          <th>Address</th>
                                          <th>Request Date</th>
                                          <th>Number Of Samples</th>
                                          <th>View</th>
                                          <!-- <th>Delete</th> -->
                                      </tr>
                                  </thead>
                                  <tbody>
       
                                  </tbody>
                        </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade" id="modalSamples" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalSamplesRequestNumber"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" ></button>
                        </div>
                        <div class="modal-body">
                            <table class="table" id="sampleTable">
                                <thead>
                                    <th>Sample Code</th>
                                    <th>Sample Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalRequestData" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Request Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" ></button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <div class="row">
                                    <div class="col">
                                        <table class="requestDetailsTable">
                                            <tr>
                                                <th>Request Reference Number</th>
                                                <th>:</th>
                                                <td id='requestRefNum'></td>
                                            </tr>
                                            <tr>
                                                <th>Request date</th>
                                                <th>:</th>
                                                <td id='requestDate'></td>
                                            </tr>
                                            <tr>
                                                <th>Customer Name</th>
                                                <th>:</th>
                                                <td id='customerName'></td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <th>:</th>
                                                <td id='address'></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col">
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-primary" type="button" id='addToDatabaseButton'>Add to Database</button>
                                            <button class="btn btn-primary" type="button" id='exportProcess'>Process data for download</button>
                                            <a class="btn btn-primary" href="#" role="button" id='exportButton'>Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <div class="row">
                                    <div class="col" style="height:25em; overflow-y:scroll;">
                                        <table class="table  table-hover" id="requestSamplesTable">
                                            <thead>
                                                <th>id</th>
                                                <th>Sample Code</th>
                                                <th>Sample Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col">
                                        <table class="table" id="sampleDetailsTable">
                                            <thead>
                                                <tr>
                                                    <th style="width:13em">id</th>
                                                    <th>:</th>
                                                    <td id='id'></td>
                                                </tr>
                                                <tr>
                                                    <th>Sample code</th>
                                                    <th>:</th>
                                                    <td id='sampleCode'></td>
                                                </tr>
                                                <tr>
                                                    <th>Sample Name</th>
                                                    <th>:</th>
                                                    <td id='sampleName'></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th colspan="3" style="text-align:center">Description</th>
                                                </tr>
                                                <tr>
                                                    <th>Calibration Procedure</th>
                                                    <th>:</th>
                                                    <td id='cp'></td>
                                                </tr>
                                                <tr>
                                                    <th>Certificate Number</th>
                                                    <th>:</th>
                                                    <td id='certNo'></td>
                                                </tr>
                                                <tr>
                                                    <th>Serial Number</th>
                                                    <th>:</th>
                                                    <td id='serialNumber'></td>
                                                </tr>
                                                <tr>
                                                    <th>Manufacturer</th>
                                                    <th>:</th>
                                                    <td id='manufacturer'></td>
                                                </tr>
                                                <tr>
                                                    <th>Model</th>
                                                    <th>:</th>
                                                    <td id='model'></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalImport" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="tsrFileJson" class="form-label">Select File . . .</label>
                            <input class="form-control" type="file" id="tsrFileJson" accept=".json">>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="importFromFile">Import</button>
                    </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modalUpdate" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Export Updated Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table" id="in_db_table">
                            <thead>
                                <tr>
                                    <th>Request Reference Number</th>
                                    <th>Type Of Worksheet</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="exportUpdated">Process data for download</button>
                        <a class="btn btn-primary" href="#" role="button" id='exportUpdatedDownload'>Download</a>
                    </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modalImportUpdated" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Data Offline</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="offlineFile" class="form-label">Select File . . .</label>
                            <input class="form-control" type="file" id="offlineFile" accept=".json">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="importFromOffline">Import</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->      
  </body>

    <?= view('layouts/footer-essential'); ?>
    <script src="<?= base_url('/js/api.js')?>"></script>
    <script src="<?= base_url('/js/importExport.js')?>"></script>

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
    table.datatable {
    font-size: 1em;
    font-family: tahoma;
    }
</style>
