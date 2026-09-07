<?php
    $path = 'image/dost.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>
<?php
    $pathPAB = 'image/pab logo.png';
    $typePAB = pathinfo($pathPAB, PATHINFO_EXTENSION);
    $dataPAB = file_get_contents($pathPAB);
    $base64PAB = 'data:image/' . $typePAB . ';base64,' . base64_encode($dataPAB);

    $pathIllusA = 'image/SREBillustrationA.png';
    $typeIllusA = pathinfo($pathIllusA, PATHINFO_EXTENSION);
    $dataIllusA = file_get_contents($pathIllusA);
    $base64IllusA = 'data:image/' . $typeIllusA . ';base64,' . base64_encode($dataIllusA);

    $pathIllusB = 'image/SREBillustrationB.png';
    $typeIllusB = pathinfo($pathIllusB, PATHINFO_EXTENSION);
    $dataIllusB = file_get_contents($pathIllusB);
    $base64IllusB = 'data:image/' . $typeIllusB . ';base64,' . base64_encode($dataIllusB);

    $pathicon7 = 'image/dashboard-images/person.png';
    $typeIcon7 = pathinfo($pathicon7, PATHINFO_EXTENSION);
    $dataIcon7 = file_get_contents($pathicon7);
    $base64Icon7 = 'data:image/' . $typeIcon7 . ';base64,' . base64_encode($dataIcon7);
    
    $pathicon5 = 'image/dashboard-images/male-user.png';
    $typeIcon5 = pathinfo($pathicon5, PATHINFO_EXTENSION);
    $dataIcon5 = file_get_contents($pathicon5);
    $base64Icon5 = 'data:image/' . $typeIcon5 . ';base64,' . base64_encode($dataIcon5);
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

    <title>RML++</title>

    <link href="../dashboardAsset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="../dashboardAsset/lib/remixicon/fonts/remixicon.css" rel="stylesheet">
    
    <!-- Template CSS -->
    <link rel="stylesheet" href="../dashboardAsset/assets/css/style.min.css">
 
</head>  
  <body class="skin-dark animate"><div class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-logo"><span></span></a>
        <a href="#" class="sidebar-logo-text">RML<span>++</span></a>
      </div><!-- sidebar-header -->
      <div class="sidebar-body">
        <ul class="nav-sidebar">
          <li class="nav-item">
            <a href="" onclick="window.location.href = '/guestDashboard'" class="nav-link"><i data-feather="home"></i><span>Dashboard</span></a>              
          </li>
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i data-feather="clipboard"></i><span>Certificates</span></a>
            <nav class="nav-sub">
              <a href="#" onclick="window.location.href = '/guestAddElect'"  class="sub-link" style="">Single Range E-balance</a>
              <a href="#" onclick="window.location.href = '/guestAddThermo'"  class="sub-link">Thermohygrometer</a>
              <a href="#" onclick="window.location.href = '/guestTestWeightAddDataView'"  class="sub-link">Test Weights</a>
            </nav>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i data-feather="monitor"></i><span>Records</span></a>
            <nav class="nav-sub">
              <a href="#" onclick="window.location.href = '/guestElectTable'"  class="sub-link">Single Range E-balance</a>
              <a href="#" onclick="window.location.href = '/guestThermoTable'"  class="sub-link">Thermohygrometer</a>
              <a href="#" onclick="window.location.href = '/guestTestWeightTable'"  class="sub-link">Test Weights</a>
            </nav>
          </li>
          <li class="nav-item active show">
            <a href="" class="nav-link with-sub"><i data-feather="archive"></i><span>Standards</span></a>
            <nav class="nav-sub">
              <a href="#" onclick="window.location.href = '/guestElectStandard'" class="sub-link">Single Range E-balance</a>
              <a href="#" onclick="window.location.href = '/guestThermoStandardTable'" class="sub-link">Thermohygrometer</a>
              <a href="#" onclick="window.location.href = '/guestTestWeightStandardTable'" class="sub-link active show">Test Weights</a>
            </nav>
          </li> 
        </ul>
        <hr>
         <hr>
        <hr>
        <ul class="nav-sidebar">
          <li class="nav-item"><a href="#" onclick="window.location.href = '/pendingTable'" class="nav-link"><i data-feather="user-check"></i><span>Pending/For Correction</span></a></li>
          <li class="nav-item"><a href="#" class="nav-link" onclick="window.location.href = '/guestProfile'"><i data-feather="smartphone"></i><span>My Profile</span></a></li>
          <li class="nav-item"><a href="#" class="nav-link" onclick="window.location.href = '/guestAbout'"><i data-feather="align-justify"></i><span>About</span></a></li>
        </ul>
        <hr>
      </div><!-- sidebar-body -->
      <div class="sidebar-footer">
        <a href="#" class="avatar online" onclick="logoutConfirmation('<?= base_url('logout') ?>')">
            <span class="avatar-initial">
                <?php $user1 = session('name'); $fstchar = $user1[0]; echo $fstchar;?>
            </span>
        </a>
        <div class="avatar-body">
          <div class="d-flex align-items-center justify-content-between">
            <h6><?= session('name')?> <?= session('lname')?></h6>
          </div>
          <span>Calibration Officer</span>
        </div><!-- avatar-body -->
      </div><!-- sidebar-footer -->
    </div><!-- sidebar -->
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div class="content">
      <div class="content-header">
        <a id="contentMenu" href="#" class="content-menu d-none d-lg-flex"><i data-feather="menu"></i></a>
        <a id="mobileMenu" href="#" class="content-menu d-lg-none"><i data-feather="menu"></i></a>
      </div><!-- content-header -->
   
        <div class="container-fluid" style="background-color:#f9f9f9;">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <div class="page_title_left mt-2 mb-4">
                    <h4 class="">Test Weight Sensitivity Test</h4>
                </div>
             </div>
                <div class="container">
                    <form action="<?= base_url('guestTestWeightSensitivityTestUpdateInfo') ?>" method="post">
                        <input type="hidden" name="idTable2" value="<?= $snID['id']?>">
                        <table class="table">
							<thead>
								<tr>
									<th>Sensitivity Test : </th>
									<th colspan="2"><input type="text" class="form-control" name="balance" value='<?= $TestWeightSensitivityTestModel['balance']?>'></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>No.</td>
									<td>Empty + ∆m</td>
									<td>Full Load + ∆m</td>
                                    <td></td>
                                    <td></td>
								</tr>
								<tr>
									<td>1</td>
									<td><input type="text" class="form-control" name="empty1" id="empty1" value='<?= $TestWeightSensitivityTestModel['empty1']?>'></td>
									<td><input type="text" class="form-control" name="full1" id="full1" value='<?= $TestWeightSensitivityTestModel['full1']?>'></td>
								</tr>
								<tr>
									<td>2</td>
									<td><input type="text" class="form-control" name="empty2" id="empty2" value='<?= $TestWeightSensitivityTestModel['empty2']?>'></td>
									<td><input type="text" class="form-control" name="full2" id="full2" value='<?= $TestWeightSensitivityTestModel['full2']?>'></td>
								</tr>
								<tr>
									<td>3</td>
									<td><input type="text" class="form-control" name="empty3" id="empty3" value='<?= $TestWeightSensitivityTestModel['empty3']?>'></td>
									<td><input type="text" class="form-control" name="full3" id="full3" value='<?= $TestWeightSensitivityTestModel['full3']?>'></td>
								</tr>
								<tr>
									<td>4</td>
									<td><input type="text" class="form-control" name="empty4" id="empty4" value='<?= $TestWeightSensitivityTestModel['empty4']?>'></td>
									<td><input type="text" class="form-control" name="full4" id="full4" value='<?= $TestWeightSensitivityTestModel['full4']?>'></td>
								</tr>
								<tr>
									<td>5</td>
									<td><input type="text" class="form-control" name="empty5" id="empty5" value='<?= $TestWeightSensitivityTestModel['empty5']?>' onkeyup="stDev('empty')"></td>
									<td><input type="text" class="form-control" name="full5" id="full5" value='<?= $TestWeightSensitivityTestModel['full5']?>' onkeyup="stDev('full')"></td>
								</tr>
								<tr>
									<td>Standard Deviation (SD)</td>
									<td><input type="text" class="form-control" name="emptySD" id="emptySD" value='<?= $TestWeightSensitivityTestModel['emptySD']?>'></td>
									<td><input type="text" class="form-control" name="fullSD" id="fullSD" value='<?= $TestWeightSensitivityTestModel['fullSD']?>'></td>
								</tr>
								<tr>
									<td> </td>
									<td></td>
									<td> </td>
								</tr>
                                <tr>
									<td>change in the indication of the balance due to sensitivity weight (ΔIs)</td>
									<td><input type="text" class="form-control" name="sensitivityWeightDelta" id="sensitivityWeightDelta" value='<?= $TestWeightSensitivityTestModel['sensitivityWeightDelta']?>'></td>
									<td>at larger SD</td>
								</tr>
								<tr>
									<td>standard uncertainty of u(ΔIs)</td>
									<td><input type="text" class="form-control" name="uncertSensitivityWeightDelta" id="uncertSensitivityWeightDelta" value='<?= $TestWeightSensitivityTestModel['uncertSensitivityWeightDelta']?>'></td>
									<td> </td>
								</tr>
								<tr>
									<td>sensitivity weight ms</td>
									<td><input type="text" class="form-control" name="sensitivityWeight" id="sensitivityWeight" value='<?= $TestWeightSensitivityTestModel['sensitivityWeight']?>'></td>
								</tr>
								<tr>
									<td>standard uncertainty of the sensitivity weight u(ms)</td>
									<td><input type="text" class="form-control" name="uncertSensitivityWeight" id="uncertSensitivityWeight" value='<?= $TestWeightSensitivityTestModel['uncertSensitivityWeight']?>'></td>
								</tr>
                                <tr>
									<td>Average pooled standard deviation of balance / mass comparator for three (3) consecutive</td>
									<td><input type="text" class="form-control" name="pooledValue" id="pooledValue" value='<?= $TestWeightSensitivityTestModel['pooledValue']?>'></td>
								</tr>
								<tr>
									<td>Date of Calibration</td>
									<td><input type="date" class="form-control" name="dateCalibrated" id="dateCalibrated" value='<?= $TestWeightSensitivityTestModel['dateCalibrated']?>'></td>
								</tr>
								<tr>
									<td>Maximum</td>
									<td><input type="text" oninput="testWeightDifference()" class="form-control" name="maximumValue" id="maximumValue"  value='<?= $TestWeightSensitivityTestModel['maximumValue']?>'></td>
								</tr>
								<tr>
									<td>Minimum</td>
									<td><input type="text" oninput="testWeightDifference()" class="form-control" name="minimumValue" id="minimumValue"  value='<?= $TestWeightSensitivityTestModel['minimumValue']?>'></td>
								</tr>
								<tr>
									<td>Difference</td>
									<td><input readonly style="background-color: yellow;"  type="text" class="form-control" name="differenceValue" id="differenceValue"  value='<?= $TestWeightSensitivityTestModel['differenceValue']?>'></td>
								</tr>
                                
								<tr>
									<td>smallest nominal</td>
									<td></td>
									<td> </td>
								</tr>

                                <tr>
                                    <td><div><p>Resolution</p><input style=""  type="text" class="form-control" name="resolution1" id="resolution1" value='<?= $TestWeightSensitivityTestModel['resolution1']?>'></div></td>
                                    <td><div><p>Condition (Sample Nominal value <= condition in grams = Resolution 2)</p><input style=""  type="text" class="form-control" name="conditionForResolution" id="conditionForResolution" value='<?= $TestWeightSensitivityTestModel['conditionForResolution']?>'></div></td>
                                    <td><div><p>Resolution 2</p><input style=""  type="text" class="form-control" name="resolution2" id="resolution2" value='<?= $TestWeightSensitivityTestModel['resolution2']?>'></div></td>
								</tr>
								<tr>
									<td colspan="2">tare,,then&nbsp;&nbsp;&nbsp;place the smallest nominal</td>
									<td> </td>
								</tr>
							</tbody>
						</table>
                        <button type="submit" class="btn btn-primary mb-3">Update</button>
                    </form>
                        
                    </div>

</div>


<script src="../dashboardAsset/lib/jquery/jquery.min.js"></script>
<script src="../dashboardAsset/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dashboardAsset/lib/feathericons/feather.min.js"></script>
<script src="../dashboardAsset/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../dashboardAsset/assets/js/script.js"></script>
 
<script src="https://cdn.jsdelivr.net/npm/jstat@1.9.2/dist/jstat.min.js"></script> 
<script src="https://cdn.jsdelivr.net/gh/formulajs/formulajs@2.5.0/dist/formula.min.js"></script>

<script>
	function stDev(mark){
		var emptyResult = <?= $TestWeightSensitivityTestModel['emptySD']?>;
		var fullResult = <?= $TestWeightSensitivityTestModel['fullSD']?>;
		var sensitivityWeightDelta;
		if(mark == 'empty'){
			var data1 = parseFloat(document.getElementById('empty1').value);
			var data2 = parseFloat(document.getElementById('empty2').value);
			var data3 = parseFloat(document.getElementById('empty3').value);
			var data4 = parseFloat(document.getElementById('empty4').value);
			var data5 = parseFloat(document.getElementById('empty5').value);
			var result = formulajs.STDEVS([data1,data2,data3,data4,data5]);
			console.log('[data1,data2,data3,data4,data5] ', [data1,data2,data3,data4,data5]);
			emptyResult = result;
			document.getElementById('emptySD').value = result;
		}
		if(mark == 'full'){
			var data1 = parseFloat(document.getElementById('full1').value);
			var data2 = parseFloat(document.getElementById('full2').value);
			var data3 = parseFloat(document.getElementById('full3').value);
			var data4 = parseFloat(document.getElementById('full4').value);
			var data5 = parseFloat(document.getElementById('full5').value);
			var result = formulajs.STDEVS([data1,data2,data3,data4,data5]);
			fullResult = result;
			document.getElementById('fullSD').value = result;
		}

		if(emptyResult > fullResult){
			sensitivityWeightDelta = emptyResult;
			document.getElementById('sensitivityWeightDelta').value = emptyResult;
		}
		if(fullResult > emptyResult){
			sensitivityWeightDelta = fullResult;
			document.getElementById('sensitivityWeightDelta').value = fullResult;
		}

        console.log('sensitivityWeightDelta ',sensitivityWeightDelta)
		document.getElementById('uncertSensitivityWeightDelta').value = ((parseFloat(sensitivityWeightDelta))/Math.sqrt(5))
	}

    function testWeightDifference(){
		var minTest = document.getElementById('minimumValue').value;
		var maxTest = document.getElementById('maximumValue').value;
		var diffTest = document.getElementById('differenceValue');
		var diffTestResult= parseFloat(maxTest)-parseFloat(minTest);
		diffTest.value = (diffTestResult);
		}
</script>

</body>

</html>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script>
$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});

function logoutConfirmation(url){
			// windows.confirm("are u sure?");
			href="" 
			var txt;
			if (confirm("Do you want to logout <?= session('name')?>?")) {
				location.href = url;
			}
		}

</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



<!-- 

name of inputs

certificateNumber
customer
address
dateReceived
dateCalibrated
recommendedDueDate
placeOfCalibration
equipmentDescription
manufacturer
modelNumber
serialNumber
equipmentID
maxCapacity
maxCapacityMeasurement
minCapacity
minCapacityMeasurement
readability
readabilityMeasurement
startTemp
endTemp
aveTemp
startRh
endRh
AveRh
weights
preliminaryInspection
repeat1
repeat2
repeat3
repeat4
repeat5
repeat6
repeat7
repeat8
repeat9
repeat10
stDev
remarksA
remarksB
remarksC
remarksD
remarksE
remarksF
calibratedBy
encodedBy
checkedby
-->
