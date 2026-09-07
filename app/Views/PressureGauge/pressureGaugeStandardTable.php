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
    <link rel="stylesheet" href="/css/jquery.dataTables.min.css">
    <style>
      #standardTable {
        font-size: 1em;
        font-family: tahoma;
      }
    </style>
  </head>  
  <body class="skin-base animate">
    <?php
      $data = [
        'active' => 'standard2',
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
        <div class="container-fluid shadow bg-white mb-3">
            <div class="">
              <div class="btn-toolbar mb-md-0">  
                <div class="  container-fluid">
                  <div class="  p-3 mb-5 rounded">
                    <div class="mx-auto d-flex justify-content-center">
                        <h4 class="">Standards</h4>
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
                                    <a class="btn btn-info float-end" data-bs-toggle="modal" data-bs-target="#newStandardModal" >Add New Standard</a>
                                </div>
                        </div>
                        <div class="table-responsive">
                              <table class="table table-bordered" id="standardTable">
                                <thead>
                                          <tr>
                                              <th>Standard</th>
                                              <th>Model</th>
                                              <th>Serial No.</th>
                                              <th>Unit</th>
                                              <th>Certificate no.</th>
                                              <th>Laboratory</th>
                                              <th>Days Due</th>
                                              <th class="text-center">View</th>
                                              <th class="text-center">Delete</th>
                                          </tr>
                                </thead>
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
  </body>
  <div class="modal fade" id="newStandardModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New Standard</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/pressureGauge/addNewStandardDetails" method="post" name='formNewDetails' id='formNewDetails'>
            <div class="row">
              <div class="mb-2">
                <label for="">Standard</label>
                <input type="text" name="standardDescription" id="standardDescription" class="form-control">
              </div>
              <div class="mb-2">
                <label for="">Serial Number</label>
                <input type="text" name="serialNumber" id="serialNumber" class="form-control">
              </div>
              <div class="mb-2">
                <label for="">Model</label>
                <input type="text" name="model" id="model" class="form-control">
              </div>
              <div class="mb-2">
                <label for="">Calibration Certificate</label>
                <input type="text" name="calibrationCertificate" id="calibrationCertificate" class="form-control">
              </div>
              <div class="mb-2">
                <label for="">Lab</label>
                <input type="text" name="laboratory" id="laboratory" class="form-control">
              </div>
              <div class="mb-2">
                <label for="">Date Of Calibration</label>
                <input type="date" name="dateOfCalibration" id="dateOfCalibration" class="form-control">
              </div>
              <div class="mb-2">
                <label for="">Original Unit</label>
                <select name="unit_Original" id="unit_Original" class="form-control">
                  <option value="atm">atm</option>
                  <option value="bar">bar</option>
                  <option value="kPa">kPa</option>
                  <option value="psi">psi</option>
                  <option value="mmHG">mmHG</option>
                  <option value="Mpa">Mpa</option>
                  <option value="kg/cm2">kg/cm2</option>
                  <option value="inHg">inHg</option>
                  <option value="inH2O">inH2O</option>
                  <option value="mH2O">mH2O</option>
                  <option value="mmH2O">mmH2O</option>
                  <option value="mbar">mbar</option>
                  <option value="Pa">Pa</option>
                </select>
              </div>
              <div class="mb-2">
                <label for="">Converted Unit</label>
                <select name="unit_Converted" id="unit_Converted" class="form-control">
                  <option value="atm">atm</option>
                  <option value="bar">bar</option>
                  <option value="kPa">kPa</option>
                  <option value="psi">psi</option>
                  <option value="mmHG">mmHG</option>
                  <option value="Mpa">Mpa</option>
                  <option value="kg/cm2">kg/cm2</option>
                  <option value="inHg">inHg</option>
                  <option value="inH2O">inH2O</option>
                  <option value="mH2O">mH2O</option>
                  <option value="mmH2O">mmH2O</option>
                  <option value="mbar">mbar</option>
                  <option value="Pa">Pa</option>
                </select>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="addNewStandardDetails('formNewDetails')">Add</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="standardDetailsModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width:90%">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="descriptionStandardDetailsModal"></h5>
          <button type="button" class="btn btn-outline-primary" id="newStandardValueButton" onclick="toggleModal('standardDetailsModal');toggleModal('newStandardValue');" >Add New</button>
        </div>
        <div class="modal-body">
          <table class='table' id="standardValuesTable">
            
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="newStandardValue" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">New</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="alert alert-danger" role="alert">
            Input value of original unit
          </div>
          <form action="" method="post" name='formNewValues' id='formNewValues'>
            <input type="hidden" name="newValueSerialNumber" id="newValueSerialNumber">
            <div class="row">
              <div class="mb-2">
                <label for="">Applied</label>
                <input type="text" name="newValuesApplied" id="newValuesApplied" class="form-control" oninput="getCorrectionForNewStdValue();getDeviationForNewStdValue()">
              </div>
              <div class="mb-2">
                <label for="">Increasing</label>
                <input type="text" name="newValuesIncreasing" id="newValuesIncreasing" class="form-control">
              </div>
              <div class="mb-2">
                <label for="">Decreasing</label>
                <input type="text" name="newValuesDecreasing" id="newValuesDecreasing" class="form-control">
              </div>
              <div class="mb-2">
                <label for="">Mean (P ind)</label>
                <input type="text" name="newValuesMean" id="newValuesMean" class="form-control" oninput="getCorrectionForNewStdValue();getDeviationForNewStdValue()">
              </div>
              <div class="mb-2">
                <label for="">Deviation</label>
                <input type="text" name="newValuesDeviation" id="newValuesDeviation" class="form-control bg-warning" tabindex="-1">
              </div>
              <div class="mb-2">
                <label for="">Uncertainty</label>
                <input type="text" name="newValuesUncertainty" id="newValuesUncertainty" class="form-control">
              </div>
              <div class="mb-2">
                <label for="">Correction</label>
                <input type="text" name="newValuesCorrection" id="newValuesCorrection" class="form-control bg-warning" tabindex="-1">
              </div>
             
              
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="addNewStandardValues()">Add</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="editStandardValue" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="alert alert-danger" role="alert">
            Input value of original unit
          </div>
            <input type="hidden" name="editID" id="editID">
            <input type="hidden" name="editSerialNumber" id="editSerialNumber">
            <div class="row">
              <div class="mb-2">
                <label for="">Applied</label>
                <input type="text" name="editValuesApplied" id="editValuesApplied" class="form-control" oninput="getCorrectionForEditStdValue();getDeviationForEditStdValue()">
              </div>
              <div class="mb-2">
                <label for="">Increasing</label>
                <input type="text" name="editValuesIncreasing" id="editValuesIncreasing" class="form-control">
              </div>
              <div class="mb-2">
                <label for="">Decreasing</label>
                <input type="text" name="editValuesDecreasing" id="editValuesDecreasing" class="form-control">
              </div>
              <div class="mb-2">
                <label for="">Mean (P ind)</label>
                <input type="text" name="editValuesMean" id="editValuesMean" class="form-control" oninput="getCorrectionForEditStdValue();getDeviationForEditStdValue()">
              </div>
              <div class="mb-2">
                <label for="">Deviation</label>
                <input type="text" name="editValuesDeviation" id="editValuesDeviation" class="form-control bg-warning" tabindex="-1">
              </div>
              <div class="mb-2">
                <label for="">Uncertainty</label>
                <input type="text" name="editValuesUncertainty" id="editValuesUncertainty" class="form-control">
              </div>
              <div class="mb-2">
                <label for="">Correction</label>
                <input type="text" name="editValuesCorrection" id="editValuesCorrection" class="form-control bg-warning" tabindex="-1">
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="saveEditButton" onclick="editValue();">Save</button>
        </div>
      </div>
    </div>
  </div>
  <datalist id='unitList'>
    <option>atm</option>
    <option>bar</option>
    <option>kPa</option>
    <option>psi</option>
    <option>mmHG</option>
    <option>Mpa</option>
    <option>kg/cm2</option>
    <option>inHg</option>
    <option>inH2O</option>
    <option>mH2O</option>
    <option>mmH2O</option>
    <option>mbar</option>
    <option>Pa</option>
  </datalist>
</html>
<script src="/dashboardAsset/lib/jquery/jquery.min.js"></script>
<script src="/dashboardAsset/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/dashboardAsset/lib/feathericons/feather.min.js"></script>
<script src="/dashboardAsset/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/dashboardAsset/assets/js/script.js"></script>
<script src="/js/scripts/jquery.dataTables.min.js"></script> 
<script>


  $(document).ready( function () {
      $('#standardTable').DataTable();
    } );


  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });

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
<script>
  const standardDetails = JSON.parse('<?= json_encode($standardData);?>');
  var selectedSerialNumber = '';
  function addDetailsToTable(){
    let tbody = document.createElement('tbody');
    let today = new Date();
    standardDetails.forEach(items=>{


      let date_next_calibration = today;
      let dateCalibrated = items['dateOfCalibration']
      let suffix = 'days left before due date';
      if(dateCalibrated != ''){
        date_next_calibration = new Date(items['dateOfCalibration'])
        date_next_calibration.setFullYear(date_next_calibration.getFullYear() + 1);
      }
      let days_due = Math.round(Math.abs((today - date_next_calibration) / (24 * 60 * 60 * 1000)));

      let tr = document.createElement('tr');
      if(today > date_next_calibration){
          tr.setAttribute('style', 'background-color: rgba(255, 0, 0, 0.4)')
      }else if(today < date_next_calibration){
          tr.setAttribute('style', 'background-color: rgba(0, 255, 0, 0.4)')
          suffix = 'days over due date';
      }else{
          tr.setAttribute('style', 'background-color: rgba(255, 0, 0, 0.4)')
      }

     
      let standardDescription = document.createElement('td');
      standardDescription.innerHTML = items['standardDescription'];
      let model = document.createElement('td');
      model.innerHTML = items['model'];
      let serialNumber = document.createElement('td');
      serialNumber.innerHTML = items['serialNumber'];
      let unit = document.createElement('td');
      unit.innerHTML = items['unit_Original']+' → '+items['unit_Converted'];
      let calibrationCertificate = document.createElement('td');
      calibrationCertificate.innerHTML = items['calibrationCertificate'];
      let laboratory = document.createElement('td');
      laboratory.innerHTML = items['laboratory'];

      let days_DueTD = document.createElement('td');
      days_DueTD.innerHTML = days_due + ' ' + suffix;

      let ViewButtonTD = document.createElement('td');
      let ViewButton = document.createElement('button');
      ViewButton.setAttribute('class', 'btn btn-primary');
      ViewButton.setAttribute('data-bs-toggle', 'modal');
      ViewButton.setAttribute('data-bs-target', '#standardDetailsModal');
      ViewButton.setAttribute('onclick', 'addValuesToTable("'+items['serialNumber']+'")');
      ViewButton.innerHTML = 'View';
      ViewButtonTD.append(ViewButton);
      let DeleteButtonTD = document.createElement('td');
      let DeleteButton = document.createElement('button');
      DeleteButton.innerHTML = 'Delete';
      DeleteButton.addEventListener('click', function() {
        removeStandard(items['id'], items['serialNumber'])
      });
      DeleteButtonTD.append(DeleteButton);

      tr.append(standardDescription);
      tr.append(model);
      tr.append(serialNumber);
      tr.append(unit);
      tr.append(calibrationCertificate);
      tr.append(laboratory);
      tr.append(days_DueTD);
      tr.append(ViewButtonTD);
      tr.append(DeleteButtonTD);
      tbody.append(tr);

     
    })
    $('#standardTable tbody').remove()
    $('#standardTable').append(tbody);
  }
  addDetailsToTable();

  function addNewStandardDetails(formId){
    document.getElementById(formId).submit();
  }

  function addValuesToTable(serialNumber){
    $('#standardValuesTable').empty();
    selectedSerialNumber = serialNumber;
    $.ajax({
        cache: false,
        type: "post",
        url: "/pressureGauge/get_standard_value_by_serial",
        data: {
            'serialNumber': serialNumber
        },
        success: function(result) {
          let details = result['standardDetails'];
          //let title = details[0]['standardDescription'] + "<br>" + details[0]['model'] + "<br>" + details[0]['serialNumber'] + "<br>" + details[0]['unit_Original']+" → "+details[0]['unit_Converted'];

          let inputStandardDescription = $('<li>', {
            'class': 'list-group-item border-0',
            }).append(
              $('<div>', {
                'class': 'form-floating'
              }).append(
                $('<textarea>', {
                  'type': 'text',
                  'class': 'form-control border-0',
                  'id': 'detailsDescription',
                  'placeholder': 'Description',
                  'html': details[0]['standardDescription']
                }),
                $('<label>', {
                  for: 'detailsDescription',
                  text: 'Description'
                })
              )
          );

          let inputModel = $('<li>', {
            'class': 'list-group-item border-0',
            }).append(
              $('<div>', {
                'class': 'form-floating'
              }).append(
                $('<input>', {
                  'type': 'text',
                  'class': 'form-control border-0',
                  'id': 'detailsModel',
                  'placeholder': 'Model Number',
                  'value': details[0]['model']
                }),
                $('<label>', {
                  for: 'detailsModel',
                  text: 'Model Number'
                })
              )
          );

          let inputSerialNumber = $('<li>', {
            'class': 'list-group-item border-0',
            }).append(
              $('<div>', {
                'class': 'form-floating'
              }).append(
                $('<input>', {
                  'type': 'text',
                  'class': 'form-control border-0',
                  'id': 'detailsSerialNumber',
                  'placeholder': 'Serial Number',
                  'value': details[0]['serialNumber']
                }),
                $('<label>', {
                  for: 'detailsSerialNumber',
                  text: 'Serial Number'
                })
              )
          );

          let inputUnitOriginal = $('<li>', {
            'class': 'list-group-item border-0',
            }).append(
              $('<div>', {
                'class': 'form-floating'
              }).append(
                $('<input>', {
                  'type': 'text',
                  'class': 'form-control border-0',
                  'id': 'detailsUnitOriginal',
                  'placeholder': 'Original Unit',
                  'value': details[0]['unit_Original'],
                  'list':'unitList'
                }),
                $('<label>', {
                  for: 'detailsUnitOriginal',
                  text: 'Original Unit'
                })
              )
          );

          let inputUnitConverted = $('<li>', {
            'class': 'list-group-item border-0',
            }).append(
              $('<div>', {
                'class': 'form-floating'
              }).append(
                $('<input>', {
                  'type': 'text',
                  'class': 'form-control border-0',
                  'id': 'detailsUnitConverted',
                  'placeholder': 'Converted Unit (Unit for current values)',
                  'value': details[0]['unit_Converted'],
                  'list':'unitList',
                  'style':'min-width:22em',

                }),
                $('<label>', {
                  for: 'detailsUnitConverted',
                  text: 'Converted Unit (Unit for current values)'
                })
              )
          );

          let inputCalibrationCertificate = $('<li>', {
            'class': 'list-group-item border-0',
            }).append(
              $('<div>', {
                'class': 'form-floating'
              }).append(
                $('<input>', {
                  'type': 'text',
                  'class': 'form-control border-0',
                  'id': 'detailsCalibrationCertificate',
                  'placeholder': 'Calibration Certificate',
                  'value': details[0]['calibrationCertificate']
                }),
                $('<label>', {
                  for: 'detailsCalibrationCertificate',
                  text: 'Calibration Certificate'
                })
              )
          );
          
          let inputLaboratory = $('<li>', {
            'class': 'list-group-item border-0',
            }).append(
            $('<div>', {
              'class': 'form-floating'
            }).append(
              $('<input>', {
                'type': 'text',
                'class': 'form-control border-0',
                'id': 'detailsLaboratory',
                'placeholder': 'Laboratory',
                'value': details[0]['laboratory']
              }),
              $('<label>', {
                for: 'detailsLaboratory',
                text: 'Laboratory'
              })
            )
          );

          let inputDateOfCalibration = $('<li>', {
            'class': 'list-group-item border-0',
            }).append(
            $('<div>', {
              'class': 'form-floating'
            }).append(
              $('<input>', {
                'type': 'date',
                'class': 'form-control border-0',
                'id': 'detailsDateOfCalibration',
                'placeholder': 'Date Of Calibration',
                'value': details[0]['dateOfCalibration'],
                'style':'min-width:12em'
              }),
              $('<label>', {
                for: 'detailsDateOfCalibration',
                text: 'Date Of Calibration'
              })
            )
          );
          
          let inputCoverageFactor = $('<li>', {
            'class': 'list-group-item border-0',
            }).append(
            $('<div>', {
              'class': 'form-floating'
            }).append(
              $('<input>', {
                'type': 'text',
                'class': 'form-control border-0',
                'id': 'detailsCoverageFactor',
                'placeholder': 'Coverage Factor',
                'value': details[0]['coverageFactor']
              }),
              $('<label>', {
                for: 'detailsCoverageFactor',
                text: 'Coverage Factor'
              })
            )
          );

          let updateBtn = $('<li>', {
            'class': 'list-group-item border-0',
            }).append(
            $('<div>', {
              'class': 'form-floating'
            }).append(
              $('<button>', {
                'type': 'button',
                'class': 'form-control btn btn-outline-primary btn-lg',
                'id': 'updateDetailsBtn',
                'html': 'Update',
              }).click(function(){
                updateDetails()
              }),
            )
          );

          let inputID = $('<input>', {
            'type': 'hidden', 
            'id': 'detailsID',
            'value': details[0]['id']
          })
          let oldSerialNumber = $('<input>', {
            'type': 'hidden', 
            'id': 'detailsOldSerialNumber',
            'value': details[0]['serialNumber']
          })

          let divList1 = $('<ul>', {
            'class' : 'list-group list-group-flush list-group-horizontal'
            }).append(
              inputStandardDescription,
              inputModel,
              inputSerialNumber,
              inputCalibrationCertificate
          )
          let divList2 = $('<ul>', {
            'class' : 'list-group list-group-flush list-group-horizontal'
            }).append(
              inputUnitOriginal,
              inputUnitConverted,
              inputLaboratory,
              inputCoverageFactor,
              inputDateOfCalibration,
              updateBtn
          )
          
          
        
          // $('#descriptionStandardDetailsModal').html(title);
          $('#descriptionStandardDetailsModal').html('');
          $('#descriptionStandardDetailsModal').append(divList1,divList2,inputID, oldSerialNumber);

          $("#newStandardValueButton").click(function(){$("#newValueSerialNumber").val(details[0]['serialNumber'])})

          let thead = document.createElement('thead');
          let headTR = document.createElement('tr');
          let arrayForHead = ['Serial Number','Applied','Increasing','Decreasing','Mean (P ind)','Deviation','Uncertainty','Correction','Action'];
          for (let head = 0; head < arrayForHead.length; head++) {
            let th = document.createElement('th');
            th.innerHTML = arrayForHead[head];
            headTR.append(th);
          }
          thead.append(headTR);
          $('#standardValuesTable').append(thead);
        

          let tbody = document.createElement('tbody');
          let values = result['standardValue'];
          let arrayForValueKey = ['serialNumber','applied','increasing','decreasing','mean','deviation','uncertainty','correction'];
          let arrayOfUncertainty = [];
          values.forEach(item=>{
            let bodyTR = document.createElement('tr');
            for (let valueTD = 0; valueTD < arrayForValueKey.length; valueTD++) {
              let td = document.createElement('td');
              td.innerHTML = item[arrayForValueKey[valueTD]];
              bodyTR.append(td);
            }
            arrayOfUncertainty.push(Number(item['uncertainty']))
            
            tbody.append(bodyTR);

            $(bodyTR).append(
              $('<button>',{
                'html':'Edit',
              }).click(function() {
                $('#editID').val(item['id']);
                $('#editSerialNumber').val(item['serialNumber']);
                $('#editValuesApplied').val(item['applied']);
                $('#editValuesIncreasing').val(item['increasing']);
                $('#editValuesDecreasing').val(item['decreasing']);
                $('#editValuesMean').val(item['mean']);
                $('#editValuesDeviation').val(item['deviation']);
                $('#editValuesUncertainty').val(item['uncertainty']);
                $('#editValuesCorrection').val(item['correction']);
                
                toggleModal('standardDetailsModal')
                toggleModal('editStandardValue')

                $('#editStandardValue').on('hidden.bs.modal', function (event) {
                  toggleModal('standardDetailsModal')
                })
                
              }),
              $('<button>',{
                'html':'Delete',
              }).click(function() {
                removeStandardValue(item['id'], item['serialNumber'])
              })
            )
          });
          

          //console.log(arrayOfUncertainty);
          let tfoot = document.createElement('tfoot');
          let footTR = document.createElement('tr');
          let th = document.createElement('th');
          let td = document.createElement('td');
          th.innerHTML = 'Ustd(max)';
          th.setAttribute('colspan', 1);
          td.innerHTML = arrayOfUncertainty.reduce((a, b) => Math.max(a, b), -Infinity);
          td.setAttribute('colspan', 7);
          footTR.append(th);
          footTR.append(td);
          tfoot.append(footTR);
           

          $('#standardValuesTable').append(tbody);
          $('#standardValuesTable').append(tfoot);
        },
    })
  }
  function addNewStandardValues(){
    $.ajax({
      cache: false,
      type: "post",
      url: "/pressureGauge/addNewStandardValues",
      data: {
        newValueSerialNumber : document.getElementById('newValueSerialNumber').value,
        newValuesApplied : document.getElementById('newValuesApplied').value,
        newValuesIncreasing : document.getElementById('newValuesIncreasing').value,
        newValuesDecreasing : document.getElementById('newValuesDecreasing').value,
        newValuesMean : document.getElementById('newValuesMean').value,
        newValuesDeviation : document.getElementById('newValuesDeviation').value,
        newValuesUncertainty : document.getElementById('newValuesUncertainty').value,
        newValuesCorrection : document.getElementById('newValuesCorrection').value,
      },
      success: function(result) {
        toggleModal('newStandardValue');
        toggleModal('standardDetailsModal');
        addValuesToTable(selectedSerialNumber);
        document.getElementById('newValueSerialNumber').value = '';
        document.getElementById('newValuesApplied').value = '';
        document.getElementById('newValuesIncreasing').value = '';
        document.getElementById('newValuesDecreasing').value = '';
        document.getElementById('newValuesMean').value = '';
        document.getElementById('newValuesDeviation').value = '';
        document.getElementById('newValuesUncertainty').value = '';
        document.getElementById('newValuesCorrection').value = '';
      },
      error: function (error) {
          console.log(error);
      }
    })
  } 
  function removeStandard(id, serialNumber){
    $.ajax({
        cache: false,
        type: "post",
        url: "/pressureGauge/removeStandard",
        data: {
          'id': id,
          'serialNumber': serialNumber,
        },
        success: function(result) {
          location.reload();
        },
        error: function (error) {
          console.log(error);
        }
    })
  }
  function removeStandardValue(id, serialNumber){
    $.ajax({
        cache: false,
        type: "post",
        url: "/pressureGauge/removeStandardValue",
        data: {
          'id': id,
          'serialNumber': serialNumber,
        },
        success: function(result) {
          addValuesToTable(serialNumber);
        },
        error: function (error) {
          console.log(error);
        }
    })
  }

  function editValue(){
    let id = $('#editID').val();
    $.ajax({
      cache: false,
      type: "post",
      url: "/pressureGauge/updateStandardValues",
      data: {
        'editID' : id,
        'editValuesApplied' : $('#editValuesApplied').val(),
        'editValuesIncreasing' : $('#editValuesIncreasing').val(),
        'editValuesDecreasing' : $('#editValuesDecreasing').val(),
        'editValuesMean' : $('#editValuesMean').val(),
        'editValuesDeviation' : $('#editValuesDeviation').val(),
        'editValuesUncertainty' : $('#editValuesUncertainty').val(),
        'editValuesCorrection' : $('#editValuesCorrection').val(),
      },
      success: function(result) {
        toggleModal('editStandardValue');
        let serialNumber = $('#editSerialNumber').val()
        addValuesToTable(serialNumber);
      },
      error: function (error) {
          console.log(error);
      }
    })
  }

  function updateDetails(){
    let detailsID = $('#detailsID').val();
    let detailsDescription = $('#detailsDescription').val();
    let detailsModel = $('#detailsModel').val();
    let detailsOldSerialNumber = $('#detailsOldSerialNumber').val();
    let detailsSerialNumber = $('#detailsSerialNumber').val();
    let detailsUnitOriginal = $('#detailsUnitOriginal').val();
    let detailsUnitConverted = $('#detailsUnitConverted').val();
    let detailsCalibrationCertificate = $('#detailsCalibrationCertificate').val();
    let detailsLaboratory = $('#detailsLaboratory').val();
    let detailsDateOfCalibration = $('#detailsDateOfCalibration').val();
    let detailsCoverageFactor = $('#detailsCoverageFactor').val();

    $.ajax({
        cache: false,
        type: "post",
        url: "/pressureGauge/updateStandardDetails",
        data: {
          'detailsID': detailsID,
          'detailsDescription': detailsDescription,
          'detailsModel': detailsModel,
          'detailsSerialNumber': detailsSerialNumber,
          'detailsUnitOriginal': detailsUnitOriginal,
          'detailsUnitConverted': detailsUnitConverted,
          'detailsCalibrationCertificate' : detailsCalibrationCertificate,
          'detailsLaboratory' : detailsLaboratory,
          'detailsCoverageFactor':detailsCoverageFactor,
          'detailsOldSerialNumber' : detailsOldSerialNumber,
          'detailsDateOfCalibration': detailsDateOfCalibration,
        },
        success: function(result) {
          addValuesToTable(detailsSerialNumber);
          selectedSerialNumber = detailsSerialNumber;
          location.reload();
        },
        error: function (error) {
          console.log(error);
        }
    })

    
  }

  function getCorrectionForNewStdValue(){
    let applied = parseFloat(document.getElementById('newValuesApplied').value);
    let mean = parseFloat(document.getElementById('newValuesMean').value);
    document.getElementById('newValuesCorrection').value = applied-mean;
  }
  function getDeviationForNewStdValue(){
    let applied = parseFloat(document.getElementById('newValuesApplied').value);
    let mean = parseFloat(document.getElementById('newValuesMean').value);
    document.getElementById('newValuesDeviation').value = mean-applied;
  }

  function getCorrectionForEditStdValue(){
    let applied = parseFloat(document.getElementById('editValuesApplied').value);
    let mean = parseFloat(document.getElementById('editValuesMean').value);
    document.getElementById('editValuesCorrection').value = applied-mean;
  }
  function getDeviationForEditStdValue(){
    let applied = parseFloat(document.getElementById('editValuesApplied').value);
    let mean = parseFloat(document.getElementById('editValuesMean').value);
    document.getElementById('editValuesDeviation').value = mean-applied;
  }

  function toggleModal(idOfModal){
    let idWithhash = '#'+idOfModal;
    $(idWithhash).modal('toggle');
  }
</script>