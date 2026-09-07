<?php
	use App\Models\TestWeightStandardDetailsModel;
	use App\Models\TestWeightStandardValuesModel;
	use App\Models\ElectModel_2;
	use App\Models\ElectModel_3;
	use App\Models\TestWeightSensitivityTestModel;
	use App\Models\TestWeightAlloyModel;
	use App\Models\CustomersModel;

	$standardDetails = new ElectModel_2();
	$standardValues = new ElectModel_3();
	$TestWeightAlloyModel = new TestWeightAlloyModel();
	$sensitivityTest = new TestWeightSensitivityTestModel();

	$arrStandardDetails[] = $standardDetails->findAll(); 
	$arrStandardValues[] = $standardValues->findAll(); 
	$sensitivityTestValues[] = $sensitivityTest->findAll(); 
	$alloyDetails[] = $TestWeightAlloyModel->findAll();
	

	$addDataArray = json_decode($testWeightData['allData'],true);
	try {
		$countOfAllDataArray = count($addDataArray);
	} catch (\Throwable $th) {
		$countOfAllDataArray = 0;
	}
	

    $path = 'image/dost.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

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
	
    $pathicon5 = 'image/dashboard-images/male-user.png';
    $typeIcon5 = pathinfo($pathicon5, PATHINFO_EXTENSION);
    $dataIcon5 = file_get_contents($pathicon5);
    $base64Icon5 = 'data:image/' . $typeIcon5 . ';base64,' . base64_encode($dataIcon5);

	$pathicon7 = 'image/dashboard-images/person.png';
    $typeIcon7 = pathinfo($pathicon7, PATHINFO_EXTENSION);
    $dataIcon7 = file_get_contents($pathicon7);
    $base64Icon7 = 'data:image/' . $typeIcon7 . ';base64,' . base64_encode($dataIcon7);


	function contains($str, array $arr){
		foreach($arr as $a) {
			if (stripos($str,$a) !== false) return true;
		}
		return false;
	}

	$sn = $testWeightData['weight']; 
	$SNARRAY;
	if($sn == null){
		$sn = '0,0';
		$SNARRAY = explode(",", $sn);
	}else{
		$SNARRAY = explode(",", $sn);
	}

?>
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
  <script type="text/javascript">
  
</script>

<!DOCTYPE html>
<style>
	.modal4TempInRow tbody tr td input{
		width: auto;
	}
	.table td{
		vertical-align:middle!important;
		width:10px;
	
	}
	input,
	input::-webkit-input-placeholder {
		font-size: 12px;
		line-height: 3;
	}
	.fadeIn {
  -webkit-animation-name: fadeIn;
  animation-name: fadeIn;
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
  visibility: visible;
  }
  @-webkit-keyframes fadeIn {
  0% {opacity: 0;}
  100% {opacity: 1;}
  }
  @keyframes fadeIn {
  0% {opacity: 0;}
  100% {opacity: 1;}
  } 
  .fadeOut {
  -webkit-animation-name: fadeOut;
  animation-name: fadeOut;
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
  visibility: collapse;
  }
  @-webkit-keyframes fadeOut {
  0% {opacity: 1;}
  100% {opacity: 0;}
  }
  @keyframes fadeOut {
  0% {opacity: 1;}
  100% {opacity: 0;}
  } 
	.list-group-flush>.list-group-item {
	    border-width: 0 0 0px!important;
	}
	.list-group-item {
		padding: 0.1rem 2rem!important;
	}

	/* floating label */
	/* .field {
		display: flex;
		flex-flow: column-reverse;
		}
		label, input {
		transition: all 0.2s;
		touch-action: manipulation;
		}
		input {
		font-size: 1em;
		border: 0;
		border-bottom: 1px solid #ccc;
		font-family: inherit;
		-webkit-appearance: none;
		border-radius: 0;
		padding: 0;
		cursor: text;
		}

		input:focus {
		outline: 0;
		border-bottom: 1px solid #666;
		}

		.field label {
		padding-left:5px;
		margin-bottom:1rem
		}

		input:placeholder-shown + label {
		cursor: text;
		max-width: 66.66%;
		white-space: nowrap;
		overflow: hidden;
		text-overflow: ellipsis;
		transform-origin: left bottom;
		transform: translate(0, 2.125rem) scale(1.5);
		}::-webkit-input-placeholder {
		opacity: 0;
		transition: inherit;
		}
		input:focus::-webkit-input-placeholder {
		opacity: 1;
		}
		input:not(:placeholder-shown) + label,
		input:focus + label {
		transform: translate(0, 0) scale(1);
		cursor: pointer;
		} */

	.float{
		position:fixed;
		width:60px;
		height:60px;
		bottom:40px;
		right:40px;
		background-color:#0C9;
		color:#FFF;
		border-radius:50px;
		text-align:center;
		box-shadow: 2px 2px 3px #999;
	}
</style>

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
    
    <link href="/dashboardAsset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="/dashboardAsset/lib/remixicon/fonts/remixicon.css" rel="stylesheet">
    
    <!-- Template CSS -->
    <link rel="stylesheet" href="/dashboardAsset/assets/css/style.min.css">
  
</head>  
  <body class="skin-base animate">
  <?php
		$data = [
			'active' => 'certificate1',
			'show' => 'certificate',
		];
		echo view('layouts/sidebarAdmin',$data)?>

<?php
		if($forVerification == 'forCorrection'){
			$data = [
				'comment' => $testWeightData['comment'],
				'verifier' => $testWeightData['encodedBy'],
			];
			echo view('layouts/comments',$data);
		}?>

   
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div class="content">
      <div class="content-header">
        <a id="contentMenu" href="#" class="content-menu d-none d-lg-flex"><i data-feather="menu"></i></a>
        <a id="mobileMenu" href="#" class="content-menu d-lg-none"><i data-feather="menu"></i></a>
      </div><!-- content-header -->
        <div class="content-body">
        <div class="container-fluid">
		<div class="">
			<div class="card shadow p-3 mb-5 bg-white rounded">
				<div class="card-header bg-white">
					<div class="row">
						<form id="testWeightForm" action="<?= base_url('testWeightUpdateData')?>" method="post" enctype="multipart/form-data">
							<input type="hidden" name="idTable2" value="<?= $testWeightData['id']?>">
							<input type="hidden" name="completion" id="completion"> 
                            <input name='allData' id='allData' type="hidden" value="<?php $testWeightData['allData']?>">
                            <input type="hidden" name="idOfCustomer" id="idOfCustomer">
                            <input type="hidden" id='weight' name="weight">
                            <input type="hidden" name="verifierEmail" id="verifierEmail">
							<div class="card m-2 border-light">
                                            <div class="card-header text-white bg-primary">
                                                <div class="row">
                                                    <div class="mx-auto d-flex justify-content-center">
                                                        <h3>Customer Information</h3>
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)"> 
                                                <div class="row">
                                                    <div class='col'>
                                                        <div class="mb-3">
                                                                <label>Name</label>
                                                                <input name='customer' id="customer" list='customerList' required type="text" class="form-control mt-n2 text-break" value="<?= $testWeightData['customer']?>" onchange="getCustomerDetails()">
                                                                <datalist id="customerList">
                                                                    <option selected>
                                                                        Customers
                                                                    </option>
                                                                        <?php
                                                                            try {
                                                                                $customers = new CustomersModel();			
                                                                                $arrCustomer[] = $customers->findAll(); 
                                                                                foreach($arrCustomer as $value){		
                                                                                    for ($i=0; $i < count($value); $i++) { 
                                                                        ?>
                                                                    <option value="<?=  $arrCustomer[0][$i]['customer'];?> @ <?=  $arrCustomer[0][$i]['address'];?>">
                                                                        <?php
                                                                            }}
                                                                            } catch (\Throwable $th) {
                                                                        ?>
                                                                    <option>
                                                                        <?=  $th;?>
                                                                    </option>
                                                                    <?php
                                                                            }
                                                                        ?>
                                                                </datalist>
                                                        </div>
                                                        <div class="mb-3">
                                                                <label>Address</label>
                                                                <textarea name='address' id="address" type="text" class="form-control"
                                                                    aria-label="Sizing example input"
                                                                    aria-describedby="inputGroup-sizing-default"
                                                                    style="margin-top: 0px;margin-bottom: 0px;height: 80px;"><?= $testWeightData['address']?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class='col'>
                                                        <div class="">
                                                            <label>TSR Number</label>
                                                            <input name='tsrNumber' id='tsrNumber   ' type="text" class="form-control text-break mt-n2">
                                                        </div>
                                                        <div class=" mt-2">
                                                            <label>Date Received</label>
                                                            <input name='dateReceived' type="date" class="form-control text-break" value="<?= $testWeightData['dateReceived']?>">
                                                         </div>
                                                         <div class=" mt-2">
                                                            <label>Recommended Due Date</label>
                                                            <input name='recommendedDueDate' id="eDate" required type="date" class="form-control text-break" value="<?= $testWeightData['recommendedDueDate']?>">
                                                         </div>                                                       
                                                    </div>
                                                </div>
                                            </div>
                            </div>

                            <div class="card m-2 border-light">
                                            <div class="card-header text-white bg-primary">
                                                <div class="row">
                                                    <div class="mx-auto d-flex justify-content-center">
                                                        <h3>Equipment Information</h3>
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)"> 
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-1">
                                                            <label>Date Calibrated</label>
                                                            <input name='dateCalibrated' id="sDate" type="date" class="form-control text-break" value="<?= $testWeightData['dateCalibrated']?>">
                                                        </div>
                                                        <div class="mb-1">
                                                            <label>Calibration Certificate Number</label>
                                                            <input oninput="checkCertNum()" name='certificateNumber' id='certificateNumber' type="text" class="form-control text-break mt-n2" value="<?= $testWeightData['certificateNumber']?>">
                                                        </div>
                                                        <div class='mb-1'>
                                                            <label>Description</label>
                                                            <input name='equipmentDescription' type="text" class="form-control" value="<?= $testWeightData['equipmentDescription']?>">
                                                        </div>
                                                        <div class='mb-1'>
                                                            <label>Manufacturer</label>
                                                            <input name='manufacturer' type="text" class="form-control" value="<?= $testWeightData['manufacturer']?>">
                                                        </div>
                                                        <div class='mb-1'>
                                                            <label>Model</label>
                                                            <input name='model' type="text" class="form-control" value="<?= $testWeightData['model']?>" >
                                                        </div>
                                                        <div class='mb-1'>
                                                            <label>Serial Number (Set "<i>See measurement result</i>" if set of weights)</label>
                                                            <input name='serialNumber' type="text" class="form-control" value="<?= $testWeightData['serialNumber']?>">
                                                        </div>
                                                        <div class='mb-1'>
                                                            <label>Equipment ID (Optional)</label>
                                                            <input name='equipmentID' type="text" class="form-control" value="<?= $testWeightData['equipmentID']?>">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-1">
                                                            <label>Place of Calibration</label>
                                                            <select name="placeOfCalibration" class="select-lg form-control" id="">
															<?php if($testWeightData['placeOfCalibration'] == 'Mass Laboratory'){
																echo '<option selected value="Mass Laboratory">Mass Laboratory</option>
                                                                <option value="On Site">On Site</option>';
																}else{
																	echo '<option selected value="Mass Laboratory">Mass Laboratory</option>
																	<option value="On Site">On Site</option>';
																}
															?>
                                                            </select>
                                                        </div> 
                                                        <div class='mb-1'>
                                                            <label>Class</label>
                                                            <select class="custom-select form-control" id="inputGroupSelect01" name="Class" value="<?= $testWeightData['Class']?>">
																<option value="none" <?php if($testWeightData['Class'] == 'None Indicated'){echo 'selected';}?>>None Indicated</option>
																<option value="E2" <?php if($testWeightData['Class'] == 'E2'){echo 'selected';}?>>E2</option>
																<option value="F1" <?php if($testWeightData['Class'] == 'F1'){echo 'selected';}?>>F1</option>
																<option value="F2" <?php if($testWeightData['Class'] == 'F2'){echo 'selected';}?>>F2</option>
																<option value="M1" <?php if($testWeightData['Class'] == 'M1'){echo 'selected';}?>>M1</option>
																<option value="M2" <?php if($testWeightData['Class'] == 'M2'){echo 'selected';}?>>M2</option>
																<option value="M3" <?php if($testWeightData['Class'] == 'M3'){echo 'selected';}?>>M3</option>
																<option value="ASTM Class 4" <?php if($testWeightData['Class'] == 'ASTM Class 4'){echo 'selected';}?>>ASTM Class 4</option>
																<option value="ASTM Class 3" <?php if($testWeightData['Class'] == 'ASTM Class 3'){echo 'selected';}?>>ASTM Class 3</option>
																<option value="ME-9348" <?php if($testWeightData['Class'] == 'ME-9348'){echo 'selected';}?>>ME-9348</option>
                                                            </select>
                                                        </div>   
                                                        <div class='mb-1'>
                                                            <label>Approximated Class</label>
                                                            <select class="custom-select form-control" id="approxClass" name="approxClass" onchange="setCycle(this.value)">
																<option value="none" <?php if($testWeightData['approxClass'] == 'none'){echo 'selected';}?>>None Indicated</option>
																<option value="E2" <?php if($testWeightData['approxClass'] == 'E2'){echo 'selected';}?>>E2</option>
																<option value="F1" <?php if($testWeightData['approxClass'] == 'F1'){echo 'selected';}?>>F1</option>
																<option value="F2" <?php if($testWeightData['approxClass'] == 'F2'){echo 'selected';}?>>F2</option>
																<option value="M1" <?php if($testWeightData['approxClass'] == 'M1'){echo 'selected';}?>>M1</option>
																<option value="M2" <?php if($testWeightData['approxClass'] == 'M2'){echo 'selected';}?>>M2</option>
																<option value="M3" <?php if($testWeightData['approxClass'] == 'M3'){echo 'selected';}?>>M3</option>
                                                            </select>
                                                        </div>                                    
                                                        <div class='mb-1'>
                                                            <label>Cycle</label>
                                                            <input name='cycle' id='cycle' type="text" class="form-control" tabindex="-1" value="<?= $testWeightData['cycle']?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            </div>
                            <div class="card m-2 border-light">
                                            <div class="card-header text-white bg-primary">
                                                <div class="row">
                                                    <div class="mx-auto d-flex justify-content-center">
                                                        <h3>Standard</h3>
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)"> 
                                                <div class="row">
                                                    <div class="mx-auto d-flex justify-content-center">   		
                                                        <button type="button" class="btn btn-danger float-end btn-lg" style="right:0;top:0;"
                                                            data-toggle="modal" data-target="#exampleModal">
                                                            Select Reference Weight
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                            </div>
                            <div class="card m-2 border-light">
                                            <div class="card-header text-white bg-primary">
                                                <div class="row">
                                                    <div class="mx-auto d-flex justify-content-center">
                                                        <h3>Raw Data and Uncertainty Budget</h3>
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)"> 
                                                <div class="row  justify-content-center  mb-4">
                                                    <div class="col mx-auto d-flex align-center"> 
                                                        <button type="button" class=" btn btn-success" onclick="addAnotherInfoForButton()//tableCreate()">
                                                            <i class="fas fa-table"></i>
                                                            Add Table
                                                        </button>
                                                    </div>
                                                    <div class="col mx-auto d-flex">
                                                        <button type="button" class=" btn btn-success" onclick="deleteTable()//tableCreate()">
                                                            <i class="fas fa-table"></i>
                                                            Delete Table
                                                        </button>
                                                    </div>
                                                    <div class="col mx-auto d-flex">
                                                        <button type="button" class=" btn btn-success" id="calculateButton" onclick="calculateTheAlert()">
                                                            <i class="fas fa-database"></i>
                                                            Calculate
                                                        </button>
                                                        <span id="cancelCalculate" style="display:none" onclick="cancelCalculate()">Cancel</span>
                                                    </div>
                                                </div>
                                                <div class="row text-center container-fluid">
                                                        <!-- Tables -->
                                                        <div id="TableDiv">

                                                        </div>
                                                        </form>
                                                </div>
                                                
                                            </div>
                            </div>

                            <div class="card m-2 border-light">
                                            <div class="card-header text-white bg-primary">
                                                <div class="row">
                                                    <div class="mx-auto d-flex justify-content-center">
                                                        <h3>Image</h3>
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)"> 
                                                <div class="row">
                                                    <div class="mx-auto d-flex justify-content-center">   		
                                                        <div class="row mb-4">
                                                            <div class="col-12">
                                                                <input type="file" name="imageInput[]" accept="image/*" id="imageInput"
                                                                    onchange="loadFile(event)" multiple>
                                                                <img id="output" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            </div>

                            <div class="card m-2 border-light">
                                            <div class="card-header text-white bg-primary">
                                                <div class="row">
                                                    <div class="mx-auto d-flex justify-content-center">
                                                        <h3>Personnel</h3>
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)"> 
                                                <div class="row">
                                                    <div class="mx-auto d-flex justify-content-center">   		
                                                        <table class="table table-borderless">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div class="input-group input-group-sm">
                                                                            <select name="calibratedBy" id="calibratedBy" class="form-control">
                                                                            </select>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="input-group input-group-sm">
                                                                            <select name="encodedBy" id="encodedBy" class="form-control">
                                                                            </select>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="input-group input-group-sm">
                                                                            <input type='text' name="" id="" class="form-control"
                                                                                value="Calibration Officer" disabled>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="input-group input-group-sm">
                                                                            <select name="checkedby" id="checkedby" class="form-control">
                                                                            </select>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                            </div>

                            <div class="card m-2 border-light">
                                            <div class="card-header text-white bg-primary">
                                                <div class="row">
                                                    <div class="mx-auto d-flex justify-content-center">
                                                        <h3>Actions</h3>
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="card-body text-white" style="background-color:rgba(13, 110, 253, 0.36)"> 
                                                <div class="row">
                                                    <div class="mx-auto d-flex justify-content-center">   		
                                                        <div class='row mb-4'>
                                                            <div class="col-12">
                                                                <Button type="button" class="btn btn-lg btn-primary"
                                                                    onclick="submitForm('testWeightForm')">
                                                                    <i class="fas fa-folder-plus"></i>
                                                                    Save and Generate Data
                                                                </Button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            </div>
							<div class="container">
									<div  id="forVerificationButtons" class="row justify-content-md-center">
										<div class="col-sm-1 text-center" id='verifyButtonDIV'>
										
										</div>
										<div class="col-sm-2 text-center" id='correctionButtonDIV'>
										
										</div>
										<div class="row">
											<div class="col text-center" id='commentDIV'>
											
											</div>
										</div>
									</div>
							</div>
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<button type="button" class=" float" data-toggle="modal" data-target="#confirmationModal" >
						<i data-feather="save" style="font-size: 50px;"></i>
						</button>
					</div>
				</div>
					<form name="correctionForm" action="/testWeightCorrection" method="post">
						<input type="hidden" name="completion" id="" value="For correction">
						<input type="hidden" value="<?php echo $testWeightData['id']; ?>" name="idCorrection">
						<input type="hidden" name="comment" id="commentHidden"></input>
					</form>
				<!-- modal for Confirmation -->
							<div class="modal fade" id="confirmationModal" tabindex="-1">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Changes have been made.</h5>
											<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											Would you like to save? 
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Dismiss</button>
											<button type="button" class="btn btn-primary" onclick="confirmationSave('testWeightForm')">Save changes</button>
										</div>
									</div>
								</div>
							</div>
				<!-- modal for Confirmation -->
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-xl modal-dialog-scrollable" style="width:100%">
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Standard</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<table class="table table-sm " style="height:60%">
									<thead>
										<tr>
											<th>Checkbox</th>
											<th>Manufacturer</th>
											<th>Class</th>
											<th>Serial No.</th>
											<th>Description</th>
											<th>Calibration date</th>
											<th>Due date</th>
										</tr>

									</thead>
									<tbody id="tableTbodyWeights">
										<?php
										
											$arrStandard[] = $standardDetails->findAll();
											foreach($arrStandard as $value){
												for ($i=0; $i < count($value); $i++) {
									
										?>
											<tr 
												<?php 
													date_default_timezone_set('Asia/Manila');
													$forComparisonToday = strtotime(date('Y-m-d'));
													$standardDue = $arrStandard[0][$i]['dateOfCalibration']; 
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
												<td>
													<div class="form-check">
														<input class="form-check" <?php if(contains($arrStandard[0][$i]['serialNumber'],$SNARRAY)){echo 'checked';};?> type="checkbox" name="weightCheckbox" value="<?=  $arrStandard[0][$i]['serialNumber'];?>" id="flexCheck<?=$i?>">
													</div>
												</td>
												<td>
													<label for="flexCheck<?=$i?>"><?= $arrStandard[0][$i]['manufacturer'];?></label>
												</td>
												<td>
												<label for="flexCheck<?=$i?>"><?=  $arrStandard[0][$i]['class'];?></label>
												</td>
												<td>
												<label for="flexCheck<?=$i?>"><?=  $arrStandard[0][$i]['serialNumber'];?></label>
												</td>
												<td>
												<label for="flexCheck<?=$i?>"><?=  $arrStandard[0][$i]['description'];?></td></label>
												<td>
												<label for="flexCheck<?=$i?>"><?php $date = $arrStandard[0][$i]['dateOfCalibration'];  $new_date = strtotime($date); echo date('M d, Y', $new_date); ?></label>
												</td>
												<td>
												<label for="flexCheck<?=$i?>"><?php $date = $arrStandard[0][$i]['dateOfCalibration']; $date = strtotime($date); $new_date = strtotime('+ 1 year', $date); echo date('M d, Y', $new_date); ?></label>
												</td>
											</tr>
										<?php				
													
												}	}
										?>

									</tbody>
										</div>
									</div>
								</div>
							</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-success" onclick=" getWeight()" data-dismiss="modal">Select</button>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<!--Formula.js-->
<script src="https://cdn.jsdelivr.net/npm/jstat@1.9.2/dist/jstat.min.js"></script> 
<script src="https://cdn.jsdelivr.net/gh/formulajs/formulajs@2.5.0/dist/formula.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<script src="/dashboardAsset/lib/jquery/jquery.min.js"></script>
<script src="/dashboardAsset/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/dashboardAsset/lib/feathericons/feather.min.js"></script>
<script src="/dashboardAsset/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>

<script src="/dashboardAsset/assets/js/script.js"></script>
<script>
	$("#menu-toggle").click(function(e) {
	e.preventDefault();
	$("#wrapper").toggleClass("toggled");
	});

	var isSubmitting = false

	$(document).ready(function () {
		$('#testWeightForm').submit(function(){
			isSubmitting = true
		})

		$('#testWeightForm').data('initial-state', $('#testWeightForm').serialize());

		$(window).on('beforeunload', function(e) {
			if (!isSubmitting && $('#testWeightForm').serialize() != $('#testWeightForm').data('initial-state')){
				return 'You have unsaved changes which will not be saved.'
			}
		});
	})

	function openModal(modalId){
		$(modalId).modal('toggle');
	}
	
	function confirmationSave(idOfForm){
		document.getElementById('completion').value = "Not Completed";
		try {
			getInputValueFromTables();
			alert('Calculation Successful');
			document.getElementById('calculateButton').setAttribute('class', 'btn btn-success');
			document.getElementById('calculateButton').setAttribute('disabled', 'true');
			document.getElementById('cancelCalculate').setAttribute('style', 'display:initial');

			document.getElementById(idOfForm).submit();
		} catch (error) {
			console.log(error)
			alert('Unable to Calculate \n'+error.message);
		}
		
		
	}

	function submitForm(idOfForm){
		document.getElementById('completion').value = "Pending";
		try {
			getInputValueFromTables();
			alert('Calculation Successful');
			document.getElementById('calculateButton').setAttribute('class', 'btn btn-success');
			document.getElementById('calculateButton').setAttribute('disabled', 'true');
			document.getElementById('cancelCalculate').setAttribute('style', 'display:initial');

			document.getElementById(idOfForm).submit();
		} catch (error) {
			console.log(error);
			alert('Unable to Calculate \n'+error.message);
		}
		
	}

	const calculateTheAlert = () => {
		try {
			getInputValueFromTables();
			document.getElementById('calculateButton').setAttribute('class', 'btn btn-success');
			document.getElementById('calculateButton').setAttribute('disabled', 'true');
			document.getElementById('cancelCalculate').setAttribute('style', 'display:initial');
			
			alert('Calculation Successful');
		} catch (error) {
			console.log(error);
			alert('Unable to Calculate \n'+error.message);
		}
	}
	const cancelCalculate = () => {
		document.getElementById('calculateButton').setAttribute('class', 'btn btn-warning');
		document.getElementById('calculateButton').removeAttribute('disabled');
		document.getElementById('cancelCalculate').setAttribute('style', 'display:none');
	}
	

</script>
<!-- script with formulas -->
<script>
	var sensitivityTest = <?= json_encode($sensitivityTestValues)?>;
	var arrStandardDetails = <?= json_encode($arrStandardDetails[0])?>;
	var arrStandardValues = <?= json_encode($arrStandardValues[0])?>;
	var arrAlloyDetails = <?= json_encode($alloyDetails[0])?>;
	var mpeArray = <?= json_encode($mpe)?>;
	var numberOfTables = 0;
	var weight;
	var weightSplit=[];
	
	function filterData(searchingFor, UnfilteredArray){

		let filteredDATA = UnfilteredArray.filter(function (e) {
				if (searchingFor == searchingFor ) {
					return e.serialNumber == searchingFor;
				}
			});

		return filteredDATA;
	}
	function filterDataBasedOnUnit(searchingFor, unit,UnfilteredArray){

		let filteredDATA = UnfilteredArray.filter(function (e) {
				if (searchingFor == searchingFor ) {
					return e.serialNumber == searchingFor && e.nominalUnit == unit;
				}
			});

		return filteredDATA;
	}
	function filterDataBasedOnId(searchingFor, id,UnfilteredArray){

		let filteredDATA = UnfilteredArray.filter(function (e) {
				if (searchingFor == searchingFor ) {
					return e.id == id ;
				}
			});

		return filteredDATA;
	}
	function filterDataDynamic(searchingFor, searchIn, UnfilteredArray){
		let filteredDATA = UnfilteredArray.filter(function (e) {
		if (searchingFor == searchingFor ) {
			return e[searchIn] == searchingFor;
			}
		});
		return filteredDATA;
	}


	function getWeight(
		tableNumber, 
		STDaValue,
		STDbValue,
		STDcValue,
		STDdValue,
		STDeValue,
		){
		var markedCheckbox = document.getElementsByName('weightCheckbox');  
		var PlaceholderWeight;
		for (var checkbox of markedCheckbox) {  
			if (checkbox.checked){
				if(PlaceholderWeight == null){
					PlaceholderWeight = checkbox.value ;  
				}else {
					if(!PlaceholderWeight.includes(checkbox.value)){
						PlaceholderWeight += ','+checkbox.value;}
				}
					
			}  
		
		}  
		weight = PlaceholderWeight;
		weightSplit = weight.split(",");
		console.log(weightSplit);
		addStandard('STDa'+tableNumber, STDaValue);
		addStandard('STDb'+tableNumber, STDbValue);
		addStandard('STDc'+tableNumber, STDcValue);
		addStandard('STDd'+tableNumber, STDdValue);
		addStandard('STDe'+tableNumber, STDeValue);
		document.getElementById('weight').value = weight;
		getDataOfSelectedWeight();
	}

	var dataOfSelectedWeight;
	const getDataOfSelectedWeight = () => {
		var tempArray = [];
		for (let i = 0; i < weightSplit.length; i++) {
			tempArray.push(filterData(weightSplit[i],arrStandardValues));
		}
		dataOfSelectedWeight = tempArray;
		
	}

	const addto1=()=>{
		addStandard('STDa1');	
		addStandard('STDb1');
		addStandard('STDc1');
		addStandard('STDd1');
		addStandard('STDe1');
	}

	function stringReplace(find, replace, valueString) {
        var replaceString = valueString;
        for (var i = 0; i < find.length; i++) {
            replaceString = replaceString.replace(find[i], replace[i]);
        }
        return replaceString;
    };

	function addStandard(tableNumber, value){
		var dateToday = new Date();
		var dd = String(dateToday.getDate()).padStart(2, '0');
		var mm = String(dateToday.getMonth() + 1).padStart(2, '0'); //January is 0!
		var yyyy = dateToday.getFullYear();
		dateToday = yyyy + '-' + mm + '-' + dd;

		var select = document.getElementById(tableNumber);
		var tableDIV = select.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.id;
		var table = document.getElementById(tableDIV);
		var tableSelect = table.getElementsByTagName('select')

		var unitOfSample = tableSelect.SampleNominalUnit.value;
		for(var i = select.childElementCount; i > 1; i--){
			select.removeChild(select.lastElementChild);
			}

		var forComparison = [];
		if(weightSplit.length == 0){
			console.log("No Standard Selected")
		}else{
			for (let i = 0; i < weightSplit.length; i++) {
				forComparison.push(filterDataBasedOnUnit(weightSplit[i],unitOfSample,arrStandardValues));
			}
		}
		
		for (let x = 0; x < forComparison.length;x++) {
			for (let i = 0; i < forComparison[x].length; i++) {

				if (forComparison[x].length == 0) x++;

				var dateOfCalibration = arrStandardDetails.filter(function (e) {
					return e.serialNumber == forComparison[x][i]['serialNumber'];
				});

				for (let i = 1; i <= numberOfTables; i++) {
					var tables = document.getElementById('Table'+i);
					var input = tables.getElementsByTagName('input');
					input["prevAirDensity"].value = dateOfCalibration[0]['prevAirDensity'];
				}

				const classesOfStandard = ['E1', 'E2', 'F1', 'F2', 'M1', 'M2', 'M3'];

                let actualClass = null;

                if (forComparison[x][i]['class'] != null) {
                    let textClass = forComparison[x][i]['class'];
                    let find = ["₁","₂","₃","₄","₅","₆","₇","₈","₉","₀"];
                    let replace = ["1","2","3","4","5","6","7","8","9","0"];
                    let newClass = stringReplace(find, replace, textClass);
                    classesOfStandard.forEach(c => {
                        if(newClass.includes(c)){
                            actualClass = c
                        }
                    })
                }else{
                    let textClass = forComparison[x][i]['type'];
                    let find = ["₁","₂","₃","₄","₅","₆","₇","₈","₉","₀"];
                    let replace = ["1","2","3","4","5","6","7","8","9","0"];
                    let newClass = stringReplace(find, replace, textClass);
                    classesOfStandard.forEach(c => {
                        if(newClass.includes(c)){
                            actualClass = c
                        }
                    })
                }
				let valueOfOPtion = forComparison[x][i]['conventionalMass'] + "," + forComparison[x][i]['uncertainty'] + "," + forComparison[x][i]['id'];
				var opt = document.createElement('option');
                opt.value = valueOfOPtion;
                opt.innerHTML = actualClass + "-" + forComparison[x][i]['serialNumber'] + "-" + forComparison[x][i]['marking'] + "(" + forComparison[x][i]['nominalValue'] + " " + forComparison[x][i]['nominalUnit'] + ")";
                opt.setAttribute('data-ID', forComparison[x][i]['id']);
                opt.setAttribute('data-forMPE', actualClass + "@" + forComparison[x][i]['nominalUnit'] + "@" + forComparison[x][i]['nominalValue']);
                opt.setAttribute('data-prevAirDensity', dateOfCalibration[0]['prevAirDensity']);
                if (dateOfCalibration[0]['dateOfCalibration'] < dateToday) {
                    opt.setAttribute('style', "background-color:rgba(255,0,0, 0.5)");
                } else {
                    opt.setAttribute('style', "background-color:rgba(0,255,0, 0.5)");
                }
				if(value == valueOfOPtion){
					opt.setAttribute('selected', "");
				}
                select.appendChild(opt);
			}
		}		
	}

	function GetElementInsideContainer(containerID, childID) {
		var elm = {};
		var elms = document.getElementById(containerID).getElementsByTagName("*");
		for (var i = 0; i < elms.length; i++) {
			if (elms[i].id === childID) {
				elm = elms[i];
				break;
			}
		}
		return elm;
	}

	function setBalanceReso(TableID){	
		console.log('sensitivityTest ',sensitivityTest[0]);
		var SampleNominalValue = GetElementInsideContainer(TableID, 'SampleNominalValue');
		var SampleNominalUnit = GetElementInsideContainer(TableID, 'SampleNominalUnit');
		var balanceReso = GetElementInsideContainer(TableID, 'balanceReso');
		var comparator = GetElementInsideContainer(TableID, 'comparator');
		var convertedKGtoG;
		var convertedMGtoG;
		var convertedToG;

		console.log(SampleNominalUnit);
		if(SampleNominalUnit.value == 'kg'){
			convertedToG = parseFloat(SampleNominalValue.value)*1000
		}
		if(SampleNominalUnit.value == 'mg'){
			convertedToG = parseFloat(SampleNominalValue.value)/1000
		}
		if(SampleNominalUnit.value == 'g'){
			convertedToG = parseFloat(SampleNominalValue.value)
		}

		////
			// //xpe2006		
			// if(comparator.value == 'XPE2006 DR' && SampleNominalUnit.value == 'kg'){
			// 	if(convertedKGtoG <= 81){
			// 		balanceReso.value = 0.000005;
			// 	}else{
			// 		balanceReso.value = 0.00001;
			// 	}
			// }
			// if(comparator.value == 'XPE2006 DR' && SampleNominalUnit.value == 'mg'){
			// 	if(convertedMGtoG <= 81){
			// 		balanceReso.value = 0.000005;
			// 	}else{
			// 		balanceReso.value = 0.00001;
			// 	}
			// }
			// if(comparator.value == 'XPE2006 DR' && SampleNominalUnit.value == 'g'){
			// 	if(convertedG <= 81){
			// 		balanceReso.value = 0.000005;  
			// 	}else{
			// 		balanceReso.value = 0.00001;
			// 	}
			// }

			// //MCM2004
			// if(comparator.value == 'MCM2004'){
			// 	balanceReso.value = 0.0001;
			// }

			// //MCM60K3
			// if(comparator.value == 'MCM60K3'){
			// 	balanceReso.value = 0.001;
			// }
		////

		for (let x = 0; x < sensitivityTest[0].length; x++) {
			const sensitivity = sensitivityTest[0][x];
			if(comparator.value == sensitivity.balance){
				if(sensitivity.conditionForResolution!=null){
					if(convertedToG<=sensitivity.conditionForResolution){
						balanceReso.value = sensitivity.resolution2
					}else{
						balanceReso.value = sensitivity.resolution1
					}
				}else{
					balanceReso.value = sensitivity.resolution1;
				}
			}
		}
	
	}

	// in excel is missing
	//M N O P Q R X Y Z AA in excel is Inputted

	function differenceMCI(T1,T2,S1,S2){
		//A in excel
		return ((parseFloat(T1)+parseFloat(T2))/2)-((parseFloat(S1)+parseFloat(S2))/2);
	}
	function differenceAve(values){
		//B in excel
		//values must be array
		var average = 0;
		for(i=0;i<values.length;i++){
			average += values[i];
		}
		return average/values.length;
	}
	function standardDeviationOfMCI(values){
		//C in excel
		//values must be array
		var approxClass = document.getElementById('approxClass').value;
		if(approxClass != 'E2' && approxClass != 'F1'){
			var Max = Math.max.apply(null,values);
			var Min = Math.min.apply(null,values);		
			var Result = (Max-Min)/(2 * Math.sqrt(3));
			return Result;
		}else{
			var Result = stdDev(values);
			return Result;
		}
		
	}
	function stdDev(data){
        var meanOfArray = 0;
        var distanceFromMean = [];
        var sumOfDistance = 0;
        var sumDividedByLength = 0;
        var standardDeviation = 0;
        for (let i = 0; i < data.length; i++) {
            meanOfArray += parseFloat(data[i]);
            if(i==(data.length-1)){
                meanOfArray = meanOfArray/data.length;
            }
        }
        for (let i = 0; i < data.length; i++) {
            var distance = Math.pow((parseFloat(data[i])-meanOfArray),2);
            distanceFromMean.push(distance);
        }
        for (let i = 0; i < distanceFromMean.length; i++) {
            sumOfDistance += distanceFromMean[i];
        }
        sumDividedByLength = sumOfDistance/(data.length - 1);
        standardDeviation = Math.sqrt(sumDividedByLength);
        return standardDeviation;
    }
	function CMSample(unit,CMofStandard,correctionAirBuoyancy,AverageOfDmc){	
		//D in excel 
		// old formula CMofStandard+AverageOfDmc before convert
		// old formula before convert ((CMofStandard*correctionAirBuoyancy)+AverageOfDmc)
		var result;
		if(unit=="kg"){
			//result = ((CMofStandard*correctionAirBuoyancy)+AverageOfDmc)/1000;
			result = (CMofStandard*(1+correctionAirBuoyancy)+AverageOfDmc)/1000;
		}
		if(unit=="g"){
			//result = ((CMofStandard*correctionAirBuoyancy)+AverageOfDmc);
			result = (CMofStandard*(1+correctionAirBuoyancy)+AverageOfDmc);
		}
		if(unit=="mg"){
			//result = ((CMofStandard*correctionAirBuoyancy)+AverageOfDmc)*1000;
			result = (CMofStandard*(1+correctionAirBuoyancy)+AverageOfDmc)*1000;
		}
		return result;
	}
	function airBuoyancyCorrection(densityReference,densitySample,computedDensityUsingMeasuredPressureTempRH,conventionalAirDensity){
		// if(densityReference == densitySample){
		// 	return 1;
		// }
		// else{
		// 	//old formula return (1+((computedDensityUsingMeasuredPressureTempRH-conventionalAirDensity)*((1/densitySample)-(1/densityReference))))
		// 	return ((computedDensityUsingMeasuredPressureTempRH-conventionalAirDensity)*((1/densitySample)-(1/densityReference)))
		// }
        return ((computedDensityUsingMeasuredPressureTempRH - conventionalAirDensity) * ((1 / densitySample) - (1 /
            densityReference)))

	}
	//(1+((AS31-AT31)*((1/AV31)-(1/AW31))))
	//Correction
	function deviation(CMSample,nominalValue){
		//E in excel
		var result = CMSample - nominalValue;
		return result;
	}

    function uncertSensitivityOfBalanceU(differenceAve, uncertSensitivityWeight, sensivitivyWeight,
        uncertSensitivityWeightDelta, sensivitivyWeightDelta) {
		//I in excel
		//old formula var iable UWeighingProcess,standardUncertOfSensitivityWeight,sensitivityWeight,standardDevOfMCI,cycle formula for result = ((Math.pow(UWeighingProcess,2))*(((Math.pow(standardUncertOfSensitivityWeight,2))/(Math.pow(sensitivityWeight,2)))+(standardDevOfMCI/Math.sqrt(cycle)/sensitivityWeight)))
		//var result = Math.pow(differenceAve,2)*((Math.pow(uncertSensitivityWeight,2)/(Math.pow(sensivitivyWeight,2)))+(Math.pow((uncertSensitivityWeightDelta),2)/(Math.pow((sensivitivyWeightDelta),2))));
		var result = Math.sqrt(Math.pow(differenceAve, 2) * ((Math.pow(uncertSensitivityWeight, 2) / (Math.pow(
            sensivitivyWeight, 2))) + (Math.pow((uncertSensitivityWeightDelta), 2) / (Math.pow((
            sensivitivyWeightDelta), 2)))));
        return result;		
	}
	function uncertResolutionOfBalanceU(balanceReso){
		var result = (((balanceReso/2)/(Math.sqrt(3))))*(Math.sqrt(2));
		return result;
	}
	function uncertEccentricLoadingU(difBetMaxMinVal){
		var result = difBetMaxMinVal / (2*Math.sqrt(3));
		return result;
	}
	function TempAve(tempStart, tempFinish){
		var result = (tempStart + tempFinish)/2
		return result;
	}
	function RHAve(RHStart, RHFinish){
		var result = (RHStart + RHFinish)/2
		return result;
	}
	function APAve(APStart, APFinish){
		var result = (APStart + APFinish)/2
		return result;
	}
	function computedDensityUsingMeasuredPressureTempRH(AP,RH,Temp){
		var result = ((0.34848*AP-(0.009*RH)*Math.exp((0.061*Temp)))/(273.15+Temp))
		return result;
	}
	function standardUncertDensityOfSampleWeight(uncertOfStandarSample){
		var result = uncertOfStandarSample/2
		return result;
	}
	function standardUncertDensityOfReferenceWeight(uncertOfStandarReference){
		var result = uncertOfStandarReference/2
		return result;
	}
	function standardUncertApproxAirDensity(computedDensity){
		var result = (2*(Math.exp(-4))) * computedDensity;
		return result;
	}
	function standardUncertaintyAirBuoyancyCorrectionFactor(
		conventionalMassOfStandard,
		densityOfReference,
		densityOfSample, 
		standardUncertApproxAirDensity,
		computedDensity,
		conventionalAirDensity,
		standardUncertDensitySample,
		standardUncertDensityReference,
		prevAirDensity
		) {
			/*
				r	conventionalMassOfStandard,
				aw	densityOfReference,
				av	densityOfSample, 
				bb	standardUncertApproxAirDensity,
				as	computedDensity,
				at	conventionalAirDensity,
				az	standardUncertDensitySample,
				ba	standardUncertDensityReference,
				au	prevAirDensity
			*/
		//AE in excel ((((R*((AW-AV)/(AW*AV))*(BB)))^2)+(((R*(AS-AT))^2)*((AZ^2)/(AV^4)))+((((R^2)*(AS-AT))*((AS-AT)-(2*(AU-AT)))*((BA^2)/(AW^4)))))
		/*
			old formula
			var result = Math.sqrt(((conventionalMassOfStandard*
				Math.pow((((densityOfReference-densityOfSample)/densityOfReference*densityOfSample)*standardUncertApproxAirDensity),2)
				+(Math.pow((conventionalMassOfStandard*(computedDensity-conventionalAirDensity)),2)
				*(Math.pow(standardUncertDensitySample,2))/(Math.pow(densityOfSample,4)))
				+Math.pow(conventionalMassOfStandard,2)*(computedDensity-conventionalAirDensity)*
				((computedDensity-conventionalAirDensity)-2*(conventionalAirDensity-conventionalAirDensity))*
				(Math.pow(standardUncertDensityReference,2)/Math.pow(densityOfReference,4)))))

			old formula
			((Math.pow((conventionalMassOfStandard*((densityOfReference-densityOfSample)/(densityOfReference*densityOfSample))*(standardUncertApproxAirDensity)),2))+((Math.pow((conventionalMassOfStandard*(computedDensity-conventionalAirDensity)),2))*(((Math.pow(standardUncertDensitySample,2))/(Math.pow(densityOfSample,4)))))+((((Math.pow(conventionalMassOfStandard,2))*(computedDensity-conventionalAirDensity))*((computedDensity-conventionalAirDensity)-(2*(prevAirDensity-conventionalAirDensity)))*((Math.pow(standardUncertDensityReference,2))/(Math.pow(densityOfReference,4))))))	
			((Math.pow((R*((AW-AV)/(AW*AV))*(BB)),2))+((Math.pow((R*(AS-AT)),2))*(((Math.pow(AZ,2))/(Math.pow(AV,4)))))+((((Math.pow(R,2))*(AS-AT))*((AS-AT)-(2*(AU-AT)))*((Math.pow(BA,2))/(Math.pow(AW,4))))))

			var result = ((Math.pow((conventionalMassOfStandard*
			((densityOfReference-densityOfSample)/(densityOfReference*densityOfSample))
			*(standardUncertApproxAirDensity)),2))+((Math.pow((conventionalMassOfStandard*
			(computedDensity-conventionalAirDensity)),2))*(((Math.pow(standardUncertDensitySample,2))/
			(Math.pow(densityOfSample,4)))))+
			((((Math.pow(conventionalMassOfStandard,2))*
			(computedDensity-conventionalAirDensity))*
			((computedDensity-conventionalAirDensity)-
			(2*(prevAirDensity-conventionalAirDensity)))*
			((Math.pow(standardUncertDensityReference,2))/(Math.pow(densityOfReference,4))))))
					

			new formula
			=SQRT(((((AE28*((AB28-Z28)/(AB28*Z28))*(BH28)))^2)+(((AE28*(BD28-BE28))^2)*((BF28^2)/(Z28^4)))+((((AE28^2)*(BD28-BE28))*((BD28-BE28)-(2*(X28-BE28)))*((BG28^2)/(AB28^4))))))
			SQRT(((((conventionalMassOfStandard*((densityOfReference-densityOfSample)/(densityOfReference*densityOfSample))*(standardUncertApproxAirDensity)))^2)+(((conventionalMassOfStandard*(computedDensity-conventionalAirDensity))^2)*((standardUncertDensitySample^2)/(densityOfSample^4)))+((((conventionalMassOfStandard^2)*(computedDensity-conventionalAirDensity))*((computedDensity-conventionalAirDensity)-(2*(prevAirDensity-conventionalAirDensity)))*((standardUncertDensityReference^2)/(densityOfReference^4))))))
		
		*/
        // var result = Math.sqrt(((Math.pow((conventionalMassOfStandard*((densityOfReference-densityOfSample)/(densityOfReference*densityOfSample))*(standardUncertApproxAirDensity)),2))
        // +(Math.pow((conventionalMassOfStandard*(computedDensity-conventionalAirDensity)),2)
        // *((Math.pow(standardUncertDensitySample,2))/(Math.pow(densityOfSample,4))))
        // +((((Math.pow(conventionalMassOfStandard,2))*(computedDensity-conventionalAirDensity))
        // *((computedDensity-conventionalAirDensity)-(2*(prevAirDensity-conventionalAirDensity)))
        // *((Math.pow(standardUncertDensityReference,2))/(Math.pow(densityOfReference,4)))))));
        var result = (Math.pow((conventionalMassOfStandard * ((densityOfReference - densityOfSample) / (
                densityOfReference * densityOfSample)) * (standardUncertApproxAirDensity)), 2)) +
            (Math.pow((conventionalMassOfStandard * (computedDensity - conventionalAirDensity)), 2) *
                ((Math.pow(standardUncertDensitySample, 2)) / (Math.pow(densityOfSample, 4)))) +
            ((((Math.pow(conventionalMassOfStandard, 2)) * (computedDensity - conventionalAirDensity)) *
                ((computedDensity - conventionalAirDensity) - (2 * (prevAirDensity - conventionalAirDensity))) *
                ((Math.pow(standardUncertDensityReference, 2)) / (Math.pow(densityOfReference, 4)))));

		return result;
	}

    function standardUncertConventionalMassOfReference(uncertReferenceWeightUsed, k) {
        //function standardUncertConventionalMassOfReference(MPEOfUUCUncertaityofStandard,k,MPEOneThird){
		//AF in excel
		// old formula Math.sqrt(Math.pow((MPEOfUUCUncertaityofStandard/k),2)+(Math.pow((MPEOfUUCUncertaityofStandard/k),2)))
		// old formula (MPEOfUUCUncertaityofStandard/k)/ 1000;
        //var result = Math.sqrt(Math.pow((MPEOfUUCUncertaityofStandard/k),2))+(Math.pow((MPEOneThird/3),2));
        var result = parseFloat(uncertReferenceWeightUsed) / parseFloat(k)
        return result;
	}
	function uncertaintyReferenceWeight(uncReferenceWeight,k){
		let uncReferenceWeightValue = parseFloat(uncReferenceWeight);
		let kValue = parseFloat(k);
		var result = uncReferenceWeightValue/kValue;
		return result;
	}

	function standardUncertaintyWeighingProcess(standardDeviationOfMCI, cycle, pooledValue) {
		//AG in excel
		// old formula standardDeviationOfMCI/(Math.sqrt(cycle))
        //var result = Math.sqrt(((Math.pow((standardDeviationOfMCI/(Math.sqrt(cycle))),2))+(Math.pow((pooledValue/(Math.sqrt(cycle))),2))))
        var result = pooledValue / Math.sqrt(cycle)
		return result;
	
	}

	function standardUncertaintyBalance(uncertSensiBalance, uncertResoBalance, uncertEccentLoading,
		uncertMagneticSusceptibility) {
		//AH in excel
        //var result = Math.sqrt(Math.pow(uncertSensiBalance,2)+Math.pow(uncertResoBalance,2)+Math.pow(uncertEccentLoading,2)+Math.pow(uncertMagneticSusceptibility,2))
        var result = Math.sqrt(sumOfSquare([uncertSensiBalance, uncertResoBalance]));
		return result;
	}

	function uc(airBuoyVal, uncertRefWeightVal, uncertWeighProcessVal, uncertBalVal) {
        
        let airBuoy = airBuoyVal.toFixed(5);
        let uncertRefWeight = uncertRefWeightVal.toFixed(5);
        let uncertWeighProcess = uncertWeighProcessVal.toFixed(5);
        let uncertBal = uncertBalVal.toFixed(5);
        // array
        //return Math.sqrt(sumOfSquare(array))


        return Math.sqrt(parseFloat(airBuoy) + parseFloat(Math.pow(uncertRefWeight, 2)) + parseFloat(Math.pow(uncertWeighProcess, 2)) + parseFloat(Math.pow(uncertBal, 2)))
    }
	function ue(uc,k){
		return uc*k; 
	}
	function ueINmg(ue,unit){
		var result;
		if(unit == "kg"){
			result = ue*1000000;
		}
		if(unit == "g"){
			result = ue*1000;
		}
		if(unit == "mg"){
			result = ue;
		}
		return result; 
	}

	function tableCreate(densitySample,
		densityReference,
		uncertDensitySample,
		uncertDensityReference,
		prevAirDensity,
		k,
		balanceReso,
		sc,
		comparator,
		StandardNominalValue,
		StandardNominalUnit,
		StandardMarking,
		StandardSerialNumber,
		StandardIdNumber,
		StandardManufacturer,
		SampleNominalValue,
		SampleNominalUnit,
		SampleMarking,
		SampleSerialNumber,
		SampleIdNumber,
		SampleManufacturer,
		DateStart,
		DateFinish,
		TimeStart,
		TimeFinish,
		TemperatureStart,
		TemperatureFinish,
		HumidityStart,
		HumidityFinish,
		PressureStart,
		PressureFinish,
		STDA,
		ConventionalMassSTDa,
		UncertaintySTDa,
		STDB,
		ConventionalMassSTDb,
		UncertaintySTDb,
		STDC,
		ConventionalMassSTDc,
		UncertaintySTDc,
		STDD,
		ConventionalMassSTDd,
		UncertaintySTDd,
		STDE,
		ConventionalMassSTDe,
		UncertaintySTDe,
		ConventionalMassTotal,
		UncertaintySTDTotal) {
		numberOfTables += 1;
		var approxClass = document.getElementById('approxClass').value;
		var body = document.getElementById('TableDiv');

		var tbl = document.createElement('table');
		tbl.className = 'table text-center table-bordered table-sm';
		tbl.setAttribute('id', 'Table'+numberOfTables);

		var thead = document.createElement('thead');
		var trHead = document.createElement('tr');
		var thHead = document.createElement('th');
		thHead.setAttribute('colspan','7');
		thHead.setAttribute('onclick','hideRow("TableBody'+numberOfTables+'")');
		
		thHead.innerHTML = "<h4>Calibration Information #"+numberOfTables+"</h4>";

		trHead.appendChild(thHead);
		thead.appendChild(trHead);

		var tbdy = document.createElement('tbody');
		tbdy.setAttribute('id','TableBody'+numberOfTables);
		tbdy.setAttribute('class','fadeIn');
		var hr = document.createElement('hr');
		//new row density label
			var trDensityLabel = document.createElement('tr');
			var tdNewDensitya = document.createElement('td');
			var tdNewDensityb = document.createElement('td');
			var tdNewDensityc = document.createElement('td');
			var tdNewDensityd = document.createElement('td');
			var tdNewDensitye = document.createElement('td');
			var tdNewDensityaa = document.createElement('td');
			var tdNewDensitybb = document.createElement('td');
			tdNewDensitye.innerHTML = "Air density during the (previous) calibration of the reference (kg/m3):";
			tdNewDensitya.innerHTML = "Density of Sample  (kg/m3)";
			tdNewDensityb.innerHTML = "Densty of Reference  (kg/m3)";
			tdNewDensityc.innerHTML = "Uncertainty of Density Sample";
			tdNewDensityd.innerHTML = "Uncertainty of Density Reference";

			

			trDensityLabel.appendChild(tdNewDensityaa);
			trDensityLabel.appendChild(tdNewDensitye);
			trDensityLabel.appendChild(tdNewDensitya);
			trDensityLabel.appendChild(tdNewDensityb);
			trDensityLabel.appendChild(tdNewDensityc);
			trDensityLabel.appendChild(tdNewDensityd);
			trDensityLabel.appendChild(tdNewDensitybb);
		
		//new row density label
		//new row density input
			var trDensityInput = document.createElement('tr');
			var tdNewDensityInputa = document.createElement('td');
			var tdNewDensityInputb = document.createElement('td');
			var tdNewDensityInputc = document.createElement('td');
			var tdNewDensityInputd = document.createElement('td');
			var tdNewDensityInpute = document.createElement('td');
			var tdNewDensityInputaa = document.createElement('td');
			var tdNewDensityInputbb = document.createElement('td');
			var tdNewDensityInputaI = document.createElement('input');
			var tdNewDensityInputbI = document.createElement('input');
			var tdNewDensityInputcI = document.createElement('input');
			var tdNewDensityInputdI = document.createElement('input');
			var tdNewDensityInputeI = document.createElement('input');
			var tdNewDensitySelect = document.createElement('select');
			var tdNewDensitySelect2 = document.createElement('select');

			tdNewDensityInputaI.setAttribute('type',"text");
			tdNewDensityInputbI.setAttribute('type',"text");
			tdNewDensityInputcI.setAttribute('type',"text");
			tdNewDensityInputdI.setAttribute('type',"text");
			tdNewDensityInputeI.setAttribute('type',"text");
			tdNewDensityInputaI.setAttribute('class',"form-control");
			tdNewDensityInputbI.setAttribute('class',"form-control");
			tdNewDensityInputcI.setAttribute('class',"form-control");
			tdNewDensityInputdI.setAttribute('class',"form-control");
			tdNewDensityInputeI.setAttribute('class',"form-control");
			tdNewDensityInputaI.setAttribute('placeholder',"Density of Sample  (kg/m3)");
			tdNewDensityInputbI.setAttribute('placeholder',"Densty of Reference  (kg/m3)");
			tdNewDensityInputcI.setAttribute('placeholder',"Uncertainty of Density Sample");
			tdNewDensityInputdI.setAttribute('placeholder',"Uncertainty of Density Reference");
			tdNewDensityInputeI.setAttribute('placeholder',"Previous Air Density");
			tdNewDensityInputaI.setAttribute('id',"densitySample");
			tdNewDensityInputbI.setAttribute('id',"densityReference");
			tdNewDensityInputaI.setAttribute('tabindex',"-1");
			tdNewDensityInputbI.setAttribute('tabindex',"-1");
			
			tdNewDensityInputcI.setAttribute('id',"uncertDensitySample");
			tdNewDensityInputdI.setAttribute('id',"uncertDensityReference");
			tdNewDensityInputcI.setAttribute('tabindex',"-1");
			tdNewDensityInputdI.setAttribute('tabindex',"-1");
			tdNewDensityInputeI.setAttribute('id',"prevAirDensity");
			tdNewDensitySelect.setAttribute('class',"form-control");
			tdNewDensitySelect.setAttribute('id',"inputGroupSelect01");
			tdNewDensitySelect.setAttribute('onchange',"densityUncertaintySample("+numberOfTables+",this.value)");
			tdNewDensitySelect2.setAttribute('class',"form-control");
			tdNewDensitySelect2.setAttribute('id',"inputGroupSelect01");
			tdNewDensitySelect2.setAttribute('onchange',"densityUncertaintyReference("+numberOfTables+",this.value)");
			
			<?php
				echo "var tdNewDensityOptionChoose = document.createElement('option');tdNewDensityOptionChoose.setAttribute('selected','');tdNewDensityOptionChoose.innerHTML = 'Choose';tdNewDensitySelect.appendChild(tdNewDensityOptionChoose);";
				for($alloyLoop = 0; $alloyLoop < count($alloyDetails[0]); $alloyLoop++){
					echo 'var tdNewDensityOption'.$alloyLoop.'= document.createElement("option");';
					echo 'tdNewDensityOption'.$alloyLoop.'.setAttribute("value","'.$alloyDetails[0][$alloyLoop]['density'].','.$alloyDetails[0][$alloyLoop]['uncertainty'].'");';
					echo 'tdNewDensityOption'.$alloyLoop.'.innerHTML ="'.$alloyDetails[0][$alloyLoop]['material'].'";';
					echo 'tdNewDensitySelect.appendChild(tdNewDensityOption'.$alloyLoop.');';
				}
			?>
			<?php
				echo "var tdNewDensityOptionChoose2 = document.createElement('option');tdNewDensityOptionChoose2.setAttribute('selected','');tdNewDensityOptionChoose2.innerHTML = 'Choose';tdNewDensitySelect2.appendChild(tdNewDensityOptionChoose2);";
				for($alloyloop2 = 0; $alloyloop2 < count($alloyDetails[0]); $alloyloop2++){
					echo 'var tdNewDensityOption2'.$alloyloop2.'= document.createElement("option");';
					echo 'tdNewDensityOption2'.$alloyloop2.'.setAttribute("value","'.$alloyDetails[0][$alloyloop2]['density'].','.$alloyDetails[0][$alloyloop2]['uncertainty'].'");';
					echo 'tdNewDensityOption2'.$alloyloop2.'.innerHTML ="'.$alloyDetails[0][$alloyloop2]['material'].'";';
					echo 'tdNewDensitySelect2.appendChild(tdNewDensityOption2'.$alloyloop2.');';
				}
			?>

			tdNewDensityInputa.appendChild(tdNewDensitySelect);
			tdNewDensityInputb.appendChild(tdNewDensitySelect2);
			tdNewDensityInputa.appendChild(tdNewDensityInputaI);
			tdNewDensityInputb.appendChild(tdNewDensityInputbI);
			tdNewDensityInputc.appendChild(tdNewDensityInputcI);
			tdNewDensityInputd.appendChild(tdNewDensityInputdI);
			tdNewDensityInpute.appendChild(tdNewDensityInputeI);
			trDensityInput.appendChild(tdNewDensityInputaa);
			trDensityInput.appendChild(tdNewDensityInpute);
			trDensityInput.appendChild(tdNewDensityInputa);
			trDensityInput.appendChild(tdNewDensityInputb);
			trDensityInput.appendChild(tdNewDensityInputc);
			trDensityInput.appendChild(tdNewDensityInputd);
			trDensityInput.appendChild(tdNewDensityInputbb);
		//new row density input
		//new row k balanceReso SC
			var trNew = document.createElement('tr');
			var tdNewa = document.createElement('td');
			var tdNewb = document.createElement('td');
			var tdNewc = document.createElement('td');
			var tdNewd = document.createElement('td');
			var tdNewe = document.createElement('td');
			var tdNewf = document.createElement('td');
			var tdNewaa = document.createElement('input');
			var tdNewab = document.createElement('input');
			var tdNewac = document.createElement('input');
			tdNewa.innerHTML = "K";
			tdNewc.innerHTML = "Balance Resolution";
			tdNewe.innerHTML = "SC";
			tdNewd.setAttribute('colspan','2');
			tdNewaa.setAttribute('type','text');
			tdNewab.setAttribute('type','text');
			tdNewac.setAttribute('type','text');
			tdNewaa.setAttribute('class','form-control');
			tdNewab.setAttribute('class','form-control');
			tdNewac.setAttribute('class','form-control');
			tdNewaa.setAttribute('placeholder','k');
			tdNewab.setAttribute('placeholder','Balance Resolution');
			tdNewac.setAttribute('placeholder','SC');
			tdNewaa.setAttribute('id','k');
			tdNewab.setAttribute('id','balanceReso');
			tdNewac.setAttribute('id','sc');
			tdNewaa.setAttribute('value','2');

			tdNewb.appendChild(tdNewaa);
			tdNewd.appendChild(tdNewab);
			tdNewf.appendChild(tdNewac);
			trNew.appendChild(tdNewa);
			trNew.appendChild(tdNewb);
			trNew.appendChild(tdNewc);
			trNew.appendChild(tdNewd);
			trNew.appendChild(tdNewe);
			trNew.appendChild(tdNewf);
		//new row k balanceReso SC
		//1st row
			var tr1 = document.createElement('tr');
			var td1a = document.createElement('td');
			var td1b = document.createElement('td');
			var select1 = document.createElement('select');
			var option1 = document.createElement('option');
			var option2 = document.createElement('option');
			var option3 = document.createElement('option');
			var option4 = document.createElement('option');
			td1a.innerHTML = "Comparator";
			td1b.setAttribute('colspan','6');
			select1.className = 'form-control';
			select1.setAttribute('id','comparator');
			select1.setAttribute('onchange','setBalanceReso()');
			option1.setAttribute('selected','');
			option2.setAttribute('value','XPE2006 DR');
			option3.setAttribute('value','MCM2004');
			option4.setAttribute('value','MCM60K3');
			option1.innerHTML = "Choose . . .";
			option2.innerHTML = "XPE2006 DR";
			option3.innerHTML = "MCM2004";
			option4.innerHTML = "MCM60K3";

			select1.appendChild(option1);
			select1.appendChild(option2);
			select1.appendChild(option3);
			select1.appendChild(option4);
			td1b.appendChild(select1);
			tr1.appendChild(td1a);
			tr1.appendChild(td1b);
		//1st row
		//2nd row
			var tr2 = document.createElement('tr');
			var td2a = document.createElement('td');
			var td2b = document.createElement('td');
			var td2c = document.createElement('td');
			var td2d = document.createElement('td');
			var td2e = document.createElement('td');
			var td2f = document.createElement('td');
			var td2g = document.createElement('td');
			td2b.innerHTML = "Nominal Value";
			td2c.innerHTML = "Nominal Unit";
			td2d.innerHTML = "Marking";
			td2e.innerHTML = "Serial#";
			td2f.innerHTML = "Identification #";
			td2g.innerHTML = "Manufacturer";

			tr2.appendChild(td2a);
			tr2.appendChild(td2b);
			tr2.appendChild(td2c);
			tr2.appendChild(td2d);
			tr2.appendChild(td2e);
			tr2.appendChild(td2f);
			tr2.appendChild(td2g);
		//2nd row
		//3rd row
			var tr3 = document.createElement('tr');
			var td3a = document.createElement('td');
			var td3b = document.createElement('td');
			var td3c = document.createElement('td');
			var td3d = document.createElement('td');
			var td3e = document.createElement('td');
			var td3f = document.createElement('td');
			var td3g = document.createElement('td');
			var td3aa = document.createElement('input');
			var td3ab = document.createElement('input');
			var td3ac = document.createElement('input');
			var td3ad = document.createElement('input');
			var td3ae = document.createElement('input');
			var td3af = document.createElement('input');
			td3a.innerHTML = "Standard :";
			tr3.setAttribute('style','display:none');
			td3aa.setAttribute('type','hidden');
			td3ab.setAttribute('type','hidden');
			td3ac.setAttribute('type','hidden');
			td3ad.setAttribute('type','hidden');
			td3ae.setAttribute('type','hidden');
			td3af.setAttribute('type','hidden');
			td3aa.setAttribute('class','form-control');
			td3ab.setAttribute('class','form-control');
			td3ac.setAttribute('class','form-control');
			td3ad.setAttribute('class','form-control');
			td3ae.setAttribute('class','form-control');
			td3af.setAttribute('class','form-control');
			td3aa.setAttribute('placeholder','Nominal Value');
			td3ab.setAttribute('placeholder','Nominal Unit');
			td3ac.setAttribute('placeholder','Marking');
			td3ad.setAttribute('placeholder','Serial Number');
			td3ae.setAttribute('placeholder','Identification Number');
			td3af.setAttribute('placeholder','Manufacturer');
			td3aa.setAttribute('id','StandardNominalValue');
			td3ab.setAttribute('id','StandardNominalUnit');
			td3ac.setAttribute('id','StandardMarking');
			td3ad.setAttribute('id','StandardSerialNumber');
			td3ae.setAttribute('id','StandardIdNumber');
			td3af.setAttribute('id','StandardManufacturer');

			td3b.appendChild(td3aa);
			td3c.appendChild(td3ab);
			td3d.appendChild(td3ac);
			td3e.appendChild(td3ad);
			td3f.appendChild(td3ae);
			td3g.appendChild(td3af);
			tr3.appendChild(td3a);
			tr3.appendChild(td3b);
			tr3.appendChild(td3c);
			tr3.appendChild(td3d);
			tr3.appendChild(td3e);
			tr3.appendChild(td3f);
			tr3.appendChild(td3g);
		//3rd row
		//4th row
			var tr4 = document.createElement('tr');
			var td4a = document.createElement('td');
			var td4b = document.createElement('td');
			var td4c = document.createElement('td');
			var td4d = document.createElement('td');
			var td4e = document.createElement('td');
			var td4f = document.createElement('td');
			var td4g = document.createElement('td');
			var td4aa = document.createElement('input');
			var td4ab = document.createElement('input');
			var td4ac = document.createElement('input');
			var td4ad = document.createElement('input');
			var td4ae = document.createElement('input');
			var td4af = document.createElement('input');
			td4a.innerHTML = "Standard :";
			td4aa.setAttribute('type','text');
			td4ab.setAttribute('type','text');
			td4ac.setAttribute('type','text');
			td4ad.setAttribute('type','text');
			td4ae.setAttribute('type','text');
			td4af.setAttribute('type','text');
			td4aa.setAttribute('class','form-control');
			td4ab.setAttribute('class','form-control');
			td4ac.setAttribute('class','form-control');
			td4ad.setAttribute('class','form-control');
			td4ae.setAttribute('class','form-control');
			td4af.setAttribute('class','form-control');
			td4aa.setAttribute('placeholder','Nominal Value');
			td4ab.setAttribute('placeholder','Nominal Unit');
			td4ac.setAttribute('placeholder','Marking');
			td4ad.setAttribute('placeholder','Serial Number');
			td4ae.setAttribute('placeholder','Identification Number');
			td4af.setAttribute('placeholder','Manufacturer');
			td4aa.setAttribute('id','SampleNominalValue');
			td4ab.setAttribute('id','SampleNominalUnit');
			td4ac.setAttribute('id','SampleMarking');
			td4ad.setAttribute('id','SampleSerialNumber');
			td4ae.setAttribute('id','SampleIdNumber');
			td4af.setAttribute('id','SampleManufacturer');
			td4aa.setAttribute('onchange','setBalanceReso()');
			td4ab.setAttribute('onchange','setBalanceReso()');

			td4b.appendChild(td4aa);
			td4c.appendChild(td4ab);
			td4d.appendChild(td4ac);
			td4e.appendChild(td4ad);
			td4f.appendChild(td4ae);
			td4g.appendChild(td4af);
			tr4.appendChild(td4a);
			tr4.appendChild(td4b);
			tr4.appendChild(td4c);
			tr4.appendChild(td4d);
			tr4.appendChild(td4e);
			tr4.appendChild(td4f);
			tr4.appendChild(td4g);
		//4th row
		//5th row
			var tr5 = document.createElement('tr');
			var td5a = document.createElement('td');
			var td5b = document.createElement('td');		
			var td5c = document.createElement('td');
			td5b.setAttribute('colspan','3');
			td5c.setAttribute('colspan','3');
			td5b.innerHTML = "Start";
			td5c.innerHTML = "Finish";

			tr5.appendChild(td5a);
			tr5.appendChild(td5b);
			tr5.appendChild(td5c);
		//5th row
		//6th row
			var tr6 = document.createElement('tr');
			var td6a = document.createElement('td');
			var td6b = document.createElement('td');		
			var td6c = document.createElement('td');
			var td6aa = document.createElement('input');
			var td6ab = document.createElement('input');
			td6a.innerHTML = "Date:";
			td6b.setAttribute('colspan','3');
			td6c.setAttribute('colspan','3');
			td6aa.setAttribute('type','date');
			td6ab.setAttribute('type','date');
			td6aa.setAttribute('class','form-control');
			td6ab.setAttribute('class','form-control');
			td6aa.setAttribute('placeholder','Date Start');
			td6ab.setAttribute('placeholder','Date Finish');
			td6aa.setAttribute('id','DateStart');
			td6ab.setAttribute('id','DateFinish');

			td6b.appendChild(td6aa);
			td6c.appendChild(td6ab);
			tr6.appendChild(td6a);
			tr6.appendChild(td6b);
			tr6.appendChild(td6c);
		//6th row
		//7th row
			var tr7 = document.createElement('tr');
			var td7a = document.createElement('td');
			var td7b = document.createElement('td');		
			var td7c = document.createElement('td');
			var td7aa = document.createElement('input');
			var td7ab = document.createElement('input');
			td7a.innerHTML = "Time:";
			td7b.setAttribute('colspan','3');
			td7c.setAttribute('colspan','3');
			td7aa.setAttribute('type','time');
			td7ab.setAttribute('type','time');
			td7aa.setAttribute('class','form-control');
			td7ab.setAttribute('class','form-control');
			td7aa.setAttribute('placeholder','Time Start');
			td7ab.setAttribute('placeholder','Time Finish');
			td7aa.setAttribute('id','TimeStart');
			td7ab.setAttribute('id','TimeFinish');

			td7b.appendChild(td7aa);
			td7c.appendChild(td7ab);
			tr7.appendChild(td7a);
			tr7.appendChild(td7b);
			tr7.appendChild(td7c);
		//7th row
		//8th row
			var tr8 = document.createElement('tr');
			var td8a = document.createElement('td');
			var td8b = document.createElement('td');		
			var td8c = document.createElement('td');
			var td8aa = document.createElement('input');
			var td8ab = document.createElement('input');
			td8a.innerHTML = "Temperature (C):";
			td8b.setAttribute('colspan','3');
			td8c.setAttribute('colspan','3');
			td8aa.setAttribute('type','text');
			td8ab.setAttribute('type','text');
			td8aa.setAttribute('class','form-control');
			td8ab.setAttribute('class','form-control');
			td8aa.setAttribute('placeholder','Temperature Start');
			td8ab.setAttribute('placeholder','Temperature Finish');
			td8aa.setAttribute('id','TemperatureStart');
			td8ab.setAttribute('id','TemperatureFinish');

			td8b.appendChild(td8aa);
			td8c.appendChild(td8ab);
			tr8.appendChild(td8a);
			tr8.appendChild(td8b);
			tr8.appendChild(td8c);
		//8th row
		//9th row
			var tr9 = document.createElement('tr');
			var td9a = document.createElement('td');
			var td9b = document.createElement('td');		
			var td9c = document.createElement('td');
			var td9aa = document.createElement('input');
			var td9ab = document.createElement('input');
			td9a.innerHTML = "Humidity (%RH):";
			td9b.setAttribute('colspan','3');
			td9c.setAttribute('colspan','3');
			td9aa.setAttribute('type','text');
			td9ab.setAttribute('type','text');
			td9aa.setAttribute('class','form-control');
			td9ab.setAttribute('class','form-control');
			td9aa.setAttribute('placeholder','Humidity Start');
			td9ab.setAttribute('placeholder','Humidity Finish');
			td9aa.setAttribute('id','HumidityStart');
			td9ab.setAttribute('id','HumidityFinish');

			td9b.appendChild(td9aa);
			td9c.appendChild(td9ab);
			tr9.appendChild(td9a);
			tr9.appendChild(td9b);
			tr9.appendChild(td9c);
		//9th row
		//10th row
			var tr10 = document.createElement('tr');
			var td10a = document.createElement('td');
			var td10b = document.createElement('td');		
			var td10c = document.createElement('td');
			var td10aa = document.createElement('input');
			var td10ab = document.createElement('input');
			td10a.innerHTML = "Pressure (hPa):";
			td10b.setAttribute('colspan','3');
			td10c.setAttribute('colspan','3');
			td10aa.setAttribute('type','text');
			td10ab.setAttribute('type','text');
			td10aa.setAttribute('class','form-control');
			td10ab.setAttribute('class','form-control');
			td10aa.setAttribute('placeholder','Pressure Start');
			td10ab.setAttribute('placeholder','Pressure Finish');
			td10aa.setAttribute('id','PressureStart');
			td10ab.setAttribute('id','PressureFinish');

			td10b.appendChild(td10aa);
			td10c.appendChild(td10ab);
			tr10.appendChild(td10a);
			tr10.appendChild(td10b);
			tr10.appendChild(td10c);
		//10th row
		//11th row
			var tr11 = document.createElement('tr');
			var td11a = document.createElement('td');
			var td11b = document.createElement('td');
			var td11aa = document.createElement('td');
			var td11bb = document.createElement('td');
			var selecttr11 = document.createElement('select');
			var optiontr111 = document.createElement('option');
			var optiontr112 = document.createElement('option');
			var optiontr113 = document.createElement('option');
			selecttr11.setAttribute('id','unitRawData');
			optiontr112.setAttribute('selected','');
			optiontr111.setAttribute('value','mg');
			optiontr112.setAttribute('value','g');
			optiontr113.setAttribute('value','kg');
			td11aa.setAttribute('colspan',"3");
			td11bb.setAttribute('colspan',"2");
			optiontr111.innerHTML = "mg";
			optiontr112.innerHTML = "g";
			optiontr113.innerHTML = "kg";
			selecttr11.appendChild(optiontr111);
			selecttr11.appendChild(optiontr112);
			selecttr11.appendChild(optiontr113);
			td11a.innerHTML = "Raw Data";

			td11b.appendChild(selecttr11)
			tr11.appendChild(td11aa);
			tr11.appendChild(td11a);
			tr11.appendChild(td11b);
			tr11.appendChild(td11bb);
		//11th row
		//12th row
			var tr12 = document.createElement('tr');
			var td12a = document.createElement('td');
			var td12b = document.createElement('td');
			var td12c = document.createElement('td');
			var td12d = document.createElement('td');
			var td12e = document.createElement('td');
			var td12f = document.createElement('td');
			var td12g = document.createElement('td');
			td12b.innerHTML = "Cycle";
			td12c.innerHTML = "S";
			td12d.innerHTML = "T";
			td12e.innerHTML = "T";
			td12f.innerHTML = "S";

			tr12.appendChild(td12a);
			tr12.appendChild(td12b);
			tr12.appendChild(td12c);
			tr12.appendChild(td12d);
			tr12.appendChild(td12e);
			tr12.appendChild(td12f);
			tr12.appendChild(td12g);
		//12th row
		//standard header row
			var trSTD1 = document.createElement('tr');
			var tdSTD1a = document.createElement('td');
			tdSTD1a.setAttribute('colspan','7');
			tdSTD1a.innerHTML = "Standard Used";

			trSTD1.appendChild(tdSTD1a);

		//standard header row
		//standard header row
			var trSTD2 = document.createElement('tr');
			var tdSTD2a = document.createElement('td');
			var tdSTD2b = document.createElement('td');
			var tdSTD2c = document.createElement('td');
			tdSTD2a.setAttribute('colspan','3');
			tdSTD2b.setAttribute('colspan','2');
			tdSTD2c.setAttribute('colspan','2');
			tdSTD2a.innerHTML = "Std. Code";
			tdSTD2b.innerHTML = "Conventional Mass of Standard";
			tdSTD2c.innerHTML = "Uncertainty of Measurement of  Std.";

			trSTD2.appendChild(tdSTD2a);
			trSTD2.appendChild(tdSTD2b);
			trSTD2.appendChild(tdSTD2c);
		//standard header row
		//standard row 1
			var trSTD3 = document.createElement('tr');
			var tdSTD3a = document.createElement('td');
			var tdSTD3b = document.createElement('td');
			var tdSTD3c = document.createElement('td');
			var select1 = document.createElement('select');
			var option11 = document.createElement('option');
			var inputa1 = document.createElement('input');
			var inputb1 = document.createElement('input');
			tdSTD3a.setAttribute('colspan','3');
			tdSTD3b.setAttribute('colspan','2');
			tdSTD3c.setAttribute('colspan','2');
			inputa1.setAttribute('type','text');
			inputb1.setAttribute('type','text');
			inputa1.setAttribute('class','form-control');
			inputb1.setAttribute('class','form-control');
			inputa1.setAttribute('placeholder','Conventional Mass of Standard');
			inputb1.setAttribute('placeholder','Uncertainty of Measurement of  Std.');
			inputa1.setAttribute('id','ConventionalMassSTDa'+numberOfTables);
			inputb1.setAttribute('id','UncertaintySTDa'+numberOfTables);
			select1.setAttribute('class','form-control');
			select1.setAttribute('id','STDa'+numberOfTables);
			select1.setAttribute('onchange',"standardChangeToInput(this.value,'ConventionalMassSTDa"+numberOfTables+"','UncertaintySTDa"+numberOfTables+"')");
			option11.setAttribute('value',',,');
			option11.setAttribute('selected','');
			option11.innerHTML = "Choose...";

			select1.appendChild(option11);
			tdSTD3a.appendChild(select1);
			tdSTD3b.appendChild(inputa1);
			tdSTD3c.appendChild(inputb1);
			trSTD3.appendChild(tdSTD3a);
			trSTD3.appendChild(tdSTD3b);
			trSTD3.appendChild(tdSTD3c);
		//standard row 1
		//standard row 2
			var trSTD4 = document.createElement('tr');
			var tdSTD4a = document.createElement('td');
			var tdSTD4b = document.createElement('td');
			var tdSTD4c = document.createElement('td');
			var select2 = document.createElement('select');
			var option21 = document.createElement('option');
			var inputa2 = document.createElement('input');
			var inputb2 = document.createElement('input');
			tdSTD4a.setAttribute('colspan','3');
			tdSTD4b.setAttribute('colspan','2');
			tdSTD4c.setAttribute('colspan','2');
			inputa2.setAttribute('type','text');
			inputb2.setAttribute('type','text');
			inputa2.setAttribute('class','form-control');
			inputb2.setAttribute('class','form-control');
			inputa2.setAttribute('placeholder','Conventional Mass of Standard');
			inputb2.setAttribute('placeholder','Uncertainty of Measurement of  Std.');
			inputa2.setAttribute('id','ConventionalMassSTDb'+numberOfTables);
			inputb2.setAttribute('id','UncertaintySTDb'+numberOfTables);
			select2.setAttribute('class','form-control');
			select2.setAttribute('id','STDb'+numberOfTables);
			select2.setAttribute('onchange',"standardChangeToInput(this.value,'ConventionalMassSTDb"+numberOfTables+"','UncertaintySTDb"+numberOfTables+"')");
			option21.setAttribute('value',',,');
			option21.setAttribute('selected','');
			option21.innerHTML = "Choose...";

			select2.appendChild(option21);
			tdSTD4a.appendChild(select2);
			tdSTD4b.appendChild(inputa2);
			tdSTD4c.appendChild(inputb2);
			trSTD4.appendChild(tdSTD4a);
			trSTD4.appendChild(tdSTD4b);
			trSTD4.appendChild(tdSTD4c);
		//standard row 2
		//standard row 3
			var trSTD5 = document.createElement('tr');
			var tdSTD5a = document.createElement('td');
			var tdSTD5b = document.createElement('td');
			var tdSTD5c = document.createElement('td');
			var select3 = document.createElement('select');
			var option31 = document.createElement('option');
			var inputa3 = document.createElement('input');
			var inputb3 = document.createElement('input');
			tdSTD5a.setAttribute('colspan','3');
			tdSTD5b.setAttribute('colspan','2');
			tdSTD5c.setAttribute('colspan','2');
			inputa3.setAttribute('type','text');
			inputb3.setAttribute('type','text');
			inputa3.setAttribute('class','form-control');
			inputb3.setAttribute('class','form-control');
			inputa3.setAttribute('placeholder','Conventional Mass of Standard');
			inputb3.setAttribute('placeholder','Uncertainty of Measurement of  Std.');
			inputa3.setAttribute('id','ConventionalMassSTDc'+numberOfTables);
			inputb3.setAttribute('id','UncertaintySTDc'+numberOfTables);
			select3.setAttribute('class','form-control');
			select3.setAttribute('id','STDc'+numberOfTables);
			select3.setAttribute('onchange',"standardChangeToInput(this.value,'ConventionalMassSTDc"+numberOfTables+"','UncertaintySTDc"+numberOfTables+"')");
			option31.setAttribute('value',',,');
			option31.setAttribute('selected','');
			option31.innerHTML = "Choose...";

			select3.appendChild(option31);
			tdSTD5a.appendChild(select3);
			tdSTD5b.appendChild(inputa3);
			tdSTD5c.appendChild(inputb3);
			trSTD5.appendChild(tdSTD5a);
			trSTD5.appendChild(tdSTD5b);
			trSTD5.appendChild(tdSTD5c);
		//standard row 3
		//standard row 4
			var trSTD6 = document.createElement('tr');
			var tdSTD6a = document.createElement('td');
			var tdSTD6b = document.createElement('td');
			var tdSTD6c = document.createElement('td');
			var select4 = document.createElement('select');
			var option41 = document.createElement('option');
			var inputa4 = document.createElement('input');
			var inputb4 = document.createElement('input');
			tdSTD6a.setAttribute('colspan','3');
			tdSTD6b.setAttribute('colspan','2');
			tdSTD6c.setAttribute('colspan','2');
			inputa4.setAttribute('type','text');
			inputb4.setAttribute('type','text');
			inputa4.setAttribute('class','form-control');
			inputb4.setAttribute('class','form-control');
			inputa4.setAttribute('placeholder','Conventional Mass of Standard');
			inputb4.setAttribute('placeholder','Uncertainty of Measurement of  Std.');
			inputa4.setAttribute('id','ConventionalMassSTDd'+numberOfTables);
			inputb4.setAttribute('id','UncertaintySTDd'+numberOfTables);
			select4.setAttribute('class','form-control');
			select4.setAttribute('id','STDd'+numberOfTables);
			select4.setAttribute('onchange',"standardChangeToInput(this.value,'ConventionalMassSTDd"+numberOfTables+"','UncertaintySTDd"+numberOfTables+"')");
			option41.setAttribute('value',',,');
			option41.setAttribute('selected','');
			option41.innerHTML = "Choose...";

			select4.appendChild(option41);
			tdSTD6a.appendChild(select4);
			tdSTD6b.appendChild(inputa4);
			tdSTD6c.appendChild(inputb4);
			trSTD6.appendChild(tdSTD6a);
			trSTD6.appendChild(tdSTD6b);
			trSTD6.appendChild(tdSTD6c);
		//standard row 4
		//standard row 5
			var trSTD7 = document.createElement('tr');
			var tdSTD7a = document.createElement('td');
			var tdSTD7b = document.createElement('td');
			var tdSTD7c = document.createElement('td');
			var select5 = document.createElement('select');
			var option51 = document.createElement('option');
			var inputa5 = document.createElement('input');
			var inputb5 = document.createElement('input');
			tdSTD7a.setAttribute('colspan','3');
			tdSTD7b.setAttribute('colspan','2');
			tdSTD7c.setAttribute('colspan','2');
			inputa5.setAttribute('type','text');
			inputb5.setAttribute('type','text');
			inputa5.setAttribute('class','form-control');
			inputb5.setAttribute('class','form-control');
			inputa5.setAttribute('placeholder','Conventional Mass of Standard');
			inputb5.setAttribute('placeholder','Uncertainty of Measurement of  Std.');
			inputa5.setAttribute('id','ConventionalMassSTDe'+numberOfTables);
			inputb5.setAttribute('id','UncertaintySTDe'+numberOfTables);
			select5.setAttribute('class','form-control');
			select5.setAttribute('id','STDe'+numberOfTables);
			select5.setAttribute('onchange',"standardChangeToInput(this.value,'ConventionalMassSTDe"+numberOfTables+"','UncertaintySTDe"+numberOfTables+"')");
			option51.setAttribute('value',',,');
			option51.setAttribute('selected','');
			option51.innerHTML = "Choose...";

			select5.appendChild(option51);
			tdSTD7a.appendChild(select5);
			tdSTD7b.appendChild(inputa5);
			tdSTD7c.appendChild(inputb5);
			trSTD7.appendChild(tdSTD7a);
			trSTD7.appendChild(tdSTD7b);
			trSTD7.appendChild(tdSTD7c);
		//standard row 5
		//standard row 6
			var trSTD8 = document.createElement('tr');
			var tdSTD8a = document.createElement('td');
			var tdSTD8b = document.createElement('td');
			var tdSTD8c = document.createElement('td');
			var tdSTD8d = document.createElement('td');
			var inputa6 = document.createElement('input');
			var inputb6 = document.createElement('input');
			var button1 = document.createElement('button');
			tdSTD8a.innerHTML = 'Total';
			button1.innerHTML = 'Add';
			tdSTD8a.setAttribute('colspan','2');
			tdSTD8c.setAttribute('colspan','2');
			tdSTD8d.setAttribute('colspan','2');
			inputa6.setAttribute('type','text');
			inputb6.setAttribute('type','text');
			inputa6.setAttribute('class','form-control');
			inputb6.setAttribute('class','form-control');
			inputa6.setAttribute('placeholder','Conventional Mass of Standard');
			inputb6.setAttribute('placeholder','Uncertainty of Measurement of  Std.');
			inputa6.setAttribute('id','ConventionalMassTotal'+numberOfTables);
			inputb6.setAttribute('id','UncertaintySTDTotal'+numberOfTables);
			button1.setAttribute('type','button');
			button1.setAttribute('class','btn btn-warning');
			button1.setAttribute('onclick',"totalConventionalUncertainty('"+numberOfTables+"')");

			tdSTD8b.appendChild(button1);
			tdSTD8c.appendChild(inputa6);
			tdSTD8d.appendChild(inputb6);
			trSTD8.appendChild(tdSTD8a);
			trSTD8.appendChild(tdSTD8b);
			trSTD8.appendChild(tdSTD8c);
			trSTD8.appendChild(tdSTD8d);
		//standard row 6
		//append all	
			tbdy.appendChild(trDensityLabel);
			tbdy.appendChild(trDensityInput);
			tbdy.appendChild(trNew);
			tbdy.appendChild(tr1);
			tbdy.appendChild(tr2);
			tbdy.appendChild(tr3);
			tbdy.appendChild(tr4);
			tbdy.appendChild(tr5);
			tbdy.appendChild(tr6);
			tbdy.appendChild(tr7);
			tbdy.appendChild(tr8);
			tbdy.appendChild(tr9);
			tbdy.appendChild(tr10);

			tbdy.appendChild(trSTD1);
			tbdy.appendChild(trSTD2);
			tbdy.appendChild(trSTD3);
			tbdy.appendChild(trSTD4);
			tbdy.appendChild(trSTD5);
			tbdy.appendChild(trSTD6);
			tbdy.appendChild(trSTD7);
			tbdy.appendChild(trSTD8);

			tbdy.appendChild(tr11);
			tbdy.appendChild(tr12);
			tbl.appendChild(thead);
			tbl.appendChild(tbdy);
			body.appendChild(hr)
			body.appendChild(tbl)
		//append all
			addStandard('STDa'+numberOfTables);
			addStandard('STDb'+numberOfTables);
			addStandard('STDc'+numberOfTables);
			addStandard('STDd'+numberOfTables);
			addStandard('STDe'+numberOfTables);

			var cycleCount = document.getElementById('cycle').value;
			for (var i = 1; i <= cycleCount; i++) {
                var cycle = addCycles(i);
                tbdy.appendChild(cycle)
            }


			// if(approxClass == 'E2' || approxClass == 'F1'){
			// 	for(var i = 1; i <= 5; i++){
			// 		var cycle = addCycles(i);
			// 		tbdy.appendChild(cycle)
			// 	}
			// }else{
			// 	for(var i = 1; i <= 3; i++){
			// 		var cycle = addCycles(i);
			// 		tbdy.appendChild(cycle)
			// 	}
			// }
			setDefaultTo0(numberOfTables);
			
	}
	function addCycles(number,Sa,Tb,Tc,Sd){
		if(Sa == null){Sa = ''};
		if(Tb == null){Tb = ''};
		if(Tc == null){Tc = ''};
		if(Sd == null){Sd = ''};
		var tr = document.createElement('tr');
		var td1 = document.createElement('td');
		var td2 = document.createElement('td');
		var td3 = document.createElement('td');
		var td4 = document.createElement('td');
		var td5 = document.createElement('td');
		var td6 = document.createElement('td');
		var td7 = document.createElement('td');
		var i1 = document.createElement('input');
		var i2 = document.createElement('input');
		var i3 = document.createElement('input');
		var i4 = document.createElement('input');
		td2.innerHTML = number;
		i1.setAttribute('type','text');
		i2.setAttribute('type','text');
		i3.setAttribute('type','text');
		i4.setAttribute('type','text');
		i1.setAttribute('class','form-control');
		i2.setAttribute('class','form-control');
		i3.setAttribute('class','form-control');
		i4.setAttribute('class','form-control');
		i1.setAttribute('placeholder','S');
		i2.setAttribute('placeholder','T');
		i3.setAttribute('placeholder','T');
		i4.setAttribute('placeholder','S');
		i1.setAttribute('id','Sa'+number);
		i2.setAttribute('id','Tb'+number);
		i3.setAttribute('id','Tc'+number);
		i4.setAttribute('id','Sd'+number);
		i1.setAttribute('value', Sa);
		i2.setAttribute('value', Tb);
		i3.setAttribute('value', Tc);
		i4.setAttribute('value', Sd);
		
		td3.appendChild(i1);
		td4.appendChild(i2);
		td5.appendChild(i3);
		td6.appendChild(i4);
		tr.appendChild(td1);
		tr.appendChild(td2);
		tr.appendChild(td3);
		tr.appendChild(td4);
		tr.appendChild(td5);
		tr.appendChild(td6);
		tr.appendChild(td7);

		return tr;
	}
	
	var allData = {};
	const getInputValueFromTables = () => {
		for(var x = 1; x <= numberOfTables; x++){
			var data2 = {}; 
			var arrayForDifferenceAverage = [];

			var cycle = document.getElementById('cycle').value; 
			var table = document.getElementById('Table'+x); 
			var input = table.getElementsByTagName('input');
			var select = table.getElementsByTagName('select'); 

			var comparator = select["comparator"].value;
			var unitRawData = select["unitRawData"].value;
			var balanceResolution = input['balanceReso'].value;
			var nominalUnit = select["SampleNominalUnit"].value;
			var prevAirDensity = parseFloat(input["prevAirDensity"].value) != null? parseFloat(input["prevAirDensity"].value):0;
			
			var nominalValue = parseFloat(input["SampleNominalValue"].value);
			var cmOfStandard = parseFloat(input["ConventionalMassTotal"+x].value)
			var mpeOfStandard = parseFloat(input["MPESTDTotal"+x].value)
			var uncertDensitySampleValue = parseFloat(input["uncertDensitySample"].value);
			var uncertDensityReferenceValue = parseFloat(input["uncertDensityReference"].value);
			var densityReferenceValue = parseFloat(input["densityReference"].value);
			var densitySampleValue = parseFloat(input["densitySample"].value);
			var kValue	 = parseFloat(input["k"].value);
			var uncertaintySTDTotalValue = parseFloat(input["UncertaintySTDTotal"+x].value);

			var arrayForuncertSensitivityOfBalanceU = searchForSensitivityTest(comparator) // G, H in excel
			
			var aveOfDifference = 0;	
			var standardDeviationOfMCIValue = 0;
			var CMSampleValue = 0;		
			var airBuoyancyCorrectionValue = 0
			var standardUncertaintyWeighingProcessValue = 0;
			var uncertSensitivityOfBalanceUValue = 0;
			var uncertResolutionOfBalanceUValue = 0;
			var uncertEccentricLoadingUValue = 0;
			var differenceBetweenMaximumAndMinimum = arrayForuncertSensitivityOfBalanceU.differenceValue;
			var pooledValue = arrayForuncertSensitivityOfBalanceU.pooledValue;
			var sensitivityWeightValue = arrayForuncertSensitivityOfBalanceU.sensitivityWeight;
			var standardUncertaintySensitivityWeightValue = arrayForuncertSensitivityOfBalanceU.uncertSensitivityWeight;
			var sensitivityWeightDeltaValue = arrayForuncertSensitivityOfBalanceU.sensitivityWeightDelta;
			var uncertaintyOfMagneticSusceptibilityUMA = 0; // L in excel. no formula
			var aveOfTemp = 0;	
			var aveOfRH = 0;
			var aveOfAP = 0;	
			var conventionalAirDensity = 1.2; // W in excel. no formula
			var computedDensityUsingMeasuredPressureTempRHValue = 0;
			var standardUncertApproxAirDensityValue = 0;
			var standardUncertDensityOfSampleWeightValue = 0;
			var standardUncertDensityOfReferenceWeightValue = 0;
			var standardUncertaintyAirBuoyancyCorrectionFactorValue = 0
			var standardUncertConventionalMassOfReferenceValue = 0
			let uncertReferenceWeightValue = 0;
			var standardUncertaintyBalanceValue = 0;
			var ucValue = 0;
			var ueValue = 0;

			var arrayForUC;

			data2["sensitivityWeight"] = {
				"value" : sensitivityWeightValue,
			}
			data2["standardUncertaintySensitivityWeight"] = {
				"value" : standardUncertaintySensitivityWeightValue,
			}
			data2["sensitivityWeightDelta"] = {
				"value" : sensitivityWeightDeltaValue,
			}			

			for (var i = 0; i < input.length; i++) { 
				data2[input[i].id] = {
					"value": input[i].value,
				}
			}

			for (var i = 0; i < select.length; i++) { 
				data2[select[i].id] = {
					"value": select[i].value,
				}
			}

			data2["cycleDifferences"] = {					
				"difference1": input['Sa1'] != null? differenceMCI(input['Tb1'].value,input['Tc1'].value,input['Sa1'].value,input['Sd1'].value):null,
				"difference2": input['Sa2'] != null? differenceMCI(input['Tb2'].value,input['Tc2'].value,input['Sa2'].value,input['Sd2'].value):null,
				"difference3": input['Sa3'] != null? differenceMCI(input['Tb3'].value,input['Tc3'].value,input['Sa3'].value,input['Sd3'].value):null,
				"difference4": input['Sa4'] != null? differenceMCI(input['Tb4'].value,input['Tc4'].value,input['Sa4'].value,input['Sd4'].value):null,
				"difference5": input['Sa5'] != null? differenceMCI(input['Tb5'].value,input['Tc5'].value,input['Sa5'].value,input['Sd5'].value):null,
			}	
			
			for(var i = 0; i <=5 ; i++){
				if(data2.cycleDifferences['difference'+i] != null){
					arrayForDifferenceAverage.push(data2.cycleDifferences['difference'+i]);
				}
			}

			data2["differenceAve"] = {
				"value" : differenceAve(arrayForDifferenceAverage),
			}
			aveOfDifference = differenceAve(arrayForDifferenceAverage);

			data2["standardDeviationOfMCI"] = {
				"value" : standardDeviationOfMCI(arrayForDifferenceAverage),
			}
			standardDeviationOfMCIValue = standardDeviationOfMCI(arrayForDifferenceAverage);
			
			aveOfTemp = TempAve(parseFloat(input["TemperatureStart"].value),parseFloat(input["TemperatureFinish"].value));
			data2["TempAve"] = {
				"value" : aveOfTemp,
			}
			
			aveOfRH = RHAve(parseFloat(input["HumidityStart"].value),parseFloat(input["HumidityFinish"].value));
			data2["RHAve"] = {
				"value" : aveOfRH,
			}

			aveOfAP = APAve(parseFloat(input["PressureStart"].value),parseFloat(input["PressureFinish"].value));
			data2["APAve"] = {
				"value" : aveOfAP,
			}	

			computedDensityUsingMeasuredPressureTempRHValue =  computedDensityUsingMeasuredPressureTempRH(aveOfAP,aveOfRH,aveOfTemp);
			data2["computedDensityUsingMeasuredPressureTempRH"] = {
				"value" : computedDensityUsingMeasuredPressureTempRHValue,
			}

			airBuoyancyCorrectionValue = airBuoyancyCorrection(densityReferenceValue,densitySampleValue,computedDensityUsingMeasuredPressureTempRHValue,conventionalAirDensity)
			data2["airBuoyancyCorrection"] = {
				"value" : airBuoyancyCorrectionValue,
			}
			
			data2["CMSample"] = {
				"value" : CMSample(nominalUnit,cmOfStandard,airBuoyancyCorrectionValue,aveOfDifference),
			}
			CMSampleValue = CMSample(nominalUnit,cmOfStandard,airBuoyancyCorrectionValue,aveOfDifference);

			data2["deviation"] = {
				"value" : deviation(CMSampleValue,nominalValue),
			}

			data2["differenceBetweenMaximumAndMinimum"] = {
				"value" : differenceBetweenMaximumAndMinimum,
			}

			data2["standardUncertaintyWeighingProcess"] = {
				//"value" : standardUncertaintyWeighingProcess(standardDeviationOfMCIValue,cycle),
				"value" : standardUncertaintyWeighingProcess(standardDeviationOfMCIValue,cycle,pooledValue),
			}
			standardUncertaintyWeighingProcessValue = standardUncertaintyWeighingProcess(standardDeviationOfMCIValue,cycle,pooledValue);

			//uncertSensitivityOfBalanceUValue = uncertSensitivityOfBalanceU(standardUncertaintyWeighingProcessValue,parseFloat(arrayForuncertSensitivityOfBalanceU.uncertSensitivityWeight),parseFloat(arrayForuncertSensitivityOfBalanceU.sensitivityWeight),standardDeviationOfMCIValue,cycle)
			uncertSensitivityOfBalanceUValue = uncertSensitivityOfBalanceU(aveOfDifference,arrayForuncertSensitivityOfBalanceU.uncertSensitivityWeight,arrayForuncertSensitivityOfBalanceU.sensitivityWeight,arrayForuncertSensitivityOfBalanceU.uncertSensitivityWeightDelta,arrayForuncertSensitivityOfBalanceU.sensitivityWeightDelta) 
			data2["uncertSensitivityOfBalanceU"] = {
				"value" : uncertSensitivityOfBalanceUValue.toFixed(20),
			}

			var uncertResolutionOfBalanceUValue = uncertResolutionOfBalanceU(balanceResolution) 
			data2["uncertResolutionOfBalanceU"] = {
				"value" : uncertResolutionOfBalanceUValue.toFixed(20),
			}

			data2["pooledValue"] = {
				"value" : arrayForuncertSensitivityOfBalanceU.pooledValue,
			}

			uncertEccentricLoadingUValue = uncertEccentricLoadingU(differenceBetweenMaximumAndMinimum)
			data2["uncertEccentricLoadingU"] = {
				"value" : uncertEccentricLoadingUValue,
			}

			data2["uncertaintyOfMagneticSusceptibilityUMA"] = {
				"value" : uncertaintyOfMagneticSusceptibilityUMA,
			}

			data2["conventionalAirDensity"] = {
				"value" : conventionalAirDensity,
			}

			standardUncertDensityOfSampleWeightValue = standardUncertDensityOfSampleWeight(uncertDensitySampleValue)
			data2["standardUncertDensityOfSampleWeight"] = {
				"value" : standardUncertDensityOfSampleWeightValue,
			}

			standardUncertDensityOfReferenceWeightValue = standardUncertDensityOfReferenceWeight(uncertDensityReferenceValue)
			data2["standardUncertDensityOfReferenceWeight"] = {
				"value" : standardUncertDensityOfReferenceWeightValue,
			}

			standardUncertApproxAirDensityValue = standardUncertApproxAirDensity(computedDensityUsingMeasuredPressureTempRHValue);
			data2["standardUncertApproxAirDensity"] = {
				"value" : standardUncertApproxAirDensityValue,
			}
			standardUncertaintyAirBuoyancyCorrectionFactorValue = standardUncertaintyAirBuoyancyCorrectionFactor(cmOfStandard,densityReferenceValue,densitySampleValue, standardUncertApproxAirDensityValue,computedDensityUsingMeasuredPressureTempRHValue,conventionalAirDensity,standardUncertDensityOfSampleWeightValue,standardUncertDensityOfReferenceWeightValue,prevAirDensity)
			data2["standardUncertaintyAirBuoyancyCorrectionFactor"] = {
				"value" : standardUncertaintyAirBuoyancyCorrectionFactorValue.toFixed(20),
			}

			standardUncertConventionalMassOfReferenceValue = standardUncertConventionalMassOfReference(uncertaintySTDTotalValue,kValue,mpeOfStandard);
			data2["standardUncertConventionalMassOfReference"] = {
				"value" : standardUncertConventionalMassOfReferenceValue,
			}

			standardUncertaintyBalanceValue = standardUncertaintyBalance(uncertSensitivityOfBalanceUValue.toFixed(20),uncertResolutionOfBalanceUValue.toFixed(20),uncertEccentricLoadingUValue,uncertaintyOfMagneticSusceptibilityUMA)
			data2["standardUncertaintyBalance"] = {
				"value" : standardUncertaintyBalanceValue,
			}

			uncertReferenceWeightValue = uncertaintyReferenceWeight(uncertaintySTDTotalValue,kValue);
			data2["uncertReferenceWeight"] = {
				"value" : uncertReferenceWeightValue,
			}

			//OLD arrayForUC = [standardUncertaintyAirBuoyancyCorrectionFactorValue,standardUncertConventionalMassOfReferenceValue,standardUncertaintyWeighingProcessValue,standardUncertaintyBalanceValue];
			//arrayForUC = [standardUncertaintyAirBuoyancyCorrectionFactorValue,uncertReferenceWeightValue,standardUncertaintyWeighingProcessValue,standardUncertaintyBalanceValue];
			//ucValue = uc(arrayForUC)
            ucValue = uc(standardUncertaintyAirBuoyancyCorrectionFactorValue,uncertReferenceWeightValue,standardUncertaintyWeighingProcessValue,standardUncertaintyBalanceValue)
			data2["uc"] = {
				"value" : ucValue,
			}
			
			ueValue = ue(ucValue,kValue);
			data2["ue"] = {
				"value" : ueValue,
			}
			
			data2["ueINmg"] = {
				"value" : ueINmg(ueValue,unitRawData),
			}
			
			allData["Table"+x] = data2;

			let tbodyUncertBalacne = document.getElementById('uncertBalanceTBody');
			//tbodyUncertBalacne.lastChild.remove();
			let trOfValues = document.createElement("tr");
			let headersValues =[
				"SampleNominalValue",
				// "SampleNominalUnit",
				
				"sensitivityWeight",
				"standardUncertaintySensitivityWeight",
				"sensitivityWeightDelta",
				"uncertSensitivityOfBalanceU",
				"uncertResolutionOfBalanceU",
				"computedDensityUsingMeasuredPressureTempRH",
				"conventionalAirDensity",
				"standardUncertDensityOfSampleWeight",
				"standardUncertDensityOfReferenceWeight",
				"standardUncertApproxAirDensity",
				"standardUncertaintyAirBuoyancyCorrectionFactor",
				"uncertReferenceWeight",
				"standardUncertaintyWeighingProcess",
				"standardUncertaintyBalance",
				"uc",
				"k",
				"ue",
				"unitRawData",
			];

			for (let i = 0; i < headersValues.length; i++) {
				let tdValues = document.createElement("td");
				tdValues.innerHTML = allData["Table"+x][headersValues[i]]['value'] ;
				trOfValues.append(tdValues);
			}
			tbodyUncertBalacne.append(trOfValues);
		}

		//document.getElementById('allData').value = JSON.stringify(allData);
		document.getElementById('allData').value = JSON.stringify(allData); 
		console.log(allData);

		
	}
			/*  comment in getInputValueFromTables adding to allData as array 
				for ( var i = 0; i < input.length; i++ ) { 
					data.push({
						"id": input[i].id,
						"value": input[i].value,
					}); 
			
				}
				data.push({
					cycleDifferences :{				
						"difference1": input['Sa1'] != null? differenceMCI(input['Sa1'].value,input['Sd1'].value,input['Tb1'].value,input['Tc1'].value):0,
						"difference2": input['Sa2'] != null? differenceMCI(input['Sa2'].value,input['Sd2'].value,input['Tb2'].value,input['Tc2'].value):0,
						"difference3": input['Sa3'] != null? differenceMCI(input['Sa3'].value,input['Sd3'].value,input['Tb3'].value,input['Tc3'].value):0,
						"difference4": input['Sa4'] != null? differenceMCI(input['Sa4'].value,input['Sd4'].value,input['Tb4'].value,input['Tc4'].value):0,
						"difference5": input['Sa5'] != null? differenceMCI(input['Sa5'].value,input['Sd5'].value,input['Tb5'].value,input['Tc5'].value):0,
					}
				}); 
				console.log('data.cycleDifferences.difference1 ', data.cycleDifferences['difference1'])
				for ( var i = 0; i < select.length; i++ ) { 
					data.push({
						id: select[i].id,
						value: select[i].value
					}); 
				}
			*/

	const setDefaultTo0 = (TableNumber) => {
		var table = document.getElementById('Table' + TableNumber); 
		var input = table.getElementsByTagName('input');
		
		for (let index = 0; index < input.length; index++) {
			input[index].defaultValue = 0;
			input['k'].defaultValue = 2;
			input['SampleNominalUnit'].defaultValue = 'g';
			$("input:text").focus(function() { 
				$(this).select();
			});
		}

		
	}

	const sumOfSquare = (array) => {
		var sum = 0;
		for(i=0;i<array.length;i++){
			num = new Number(array[i]);
			sum += Number(Math.pow(num,2));
		}
		return sum.toFixed(21);
	}

	const addCycleToFirstTable = (approx, tableNumber) => {

			var TableBody = document.getElementById('cycleTable'+tableNumber);
			var cycleCount = document.getElementById('cycle').value;
			for(var i = TableBody.rows.length; i > 1; i--){
				console.log(TableBody.rows.length)
				TableBody.removeChild(TableBody	.lastElementChild);
			}
			// if(approx == 'E2' || approx == 'F1'){
			// 	for(var i = 1; i <= 5; i++){
			// 		var cycle = addCycles(i);
			// 		TableBody.appendChild(cycle)
			// 	}
			// }else{
			// 	for(var i = 1; i <= 3; i++){
			// 		var cycle = addCycles(i);
			// 		TableBody.appendChild(cycle)
			// 	}
			// } 
			for (var i = 1; i <= cycleCount; i++) {
                var cycle = addCycles(i);
                TableBody.appendChild(cycle)
            }
			
		
	}

	const hideRow = (tableId) => {
		var table = document.getElementById(tableId)
		if(table.className == 'fadeIn'){
			table.setAttribute('class','fadeOut')
		}else{
			table.setAttribute('class','fadeIn')
		}
	

	}

	const setCycle = (approx) => {
		if(approx == 'E2' || approx == 'F1'){
			document.getElementById('cycle').value = '5';
		}else{
			document.getElementById('cycle').value = '3';
		}
	}

	function standardChangeToInput(valueOfSelect, conventional, uncertainty){
		var value = valueOfSelect.split(',');
		var con = value[0];
		var unc = value[1];
		document.getElementById(conventional).value = con;
		document.getElementById(uncertainty).value = unc;
	}

	const totalConventionalUncertainty = (tableNumber) => {
		var value1 = parseFloat(document.getElementById('ConventionalMassSTDa' + tableNumber).value) || 0;
		var value2 = parseFloat(document.getElementById('ConventionalMassSTDb' + tableNumber).value) || 0;
		var value3 = parseFloat(document.getElementById('ConventionalMassSTDc' + tableNumber).value) || 0;
		var value4 = parseFloat(document.getElementById('ConventionalMassSTDd' + tableNumber).value) || 0;
		var value5 = parseFloat(document.getElementById('ConventionalMassSTDe' + tableNumber).value) || 0;
		var value6 = parseFloat(document.getElementById('UncertaintySTDa' + tableNumber).value) / 1000 || 0;
		var value7 = parseFloat(document.getElementById('UncertaintySTDb' + tableNumber).value) / 1000 || 0;
		var value8 = parseFloat(document.getElementById('UncertaintySTDc' + tableNumber).value) / 1000 || 0;
		var value9 = parseFloat(document.getElementById('UncertaintySTDd' + tableNumber).value) / 1000 || 0;
		var value10 = parseFloat(document.getElementById('UncertaintySTDe' + tableNumber).value) / 1000 || 0;
		// var value11 = parseFloat(document.getElementById('MPESTDa' + tableNumber).value) || 0;
		// var value12 = parseFloat(document.getElementById('MPESTDb' + tableNumber).value) || 0;
		// var value13 = parseFloat(document.getElementById('MPESTDc' + tableNumber).value) || 0;
		// var value14 = parseFloat(document.getElementById('MPESTDd' + tableNumber).value) || 0;
		// var value15 = parseFloat(document.getElementById('MPESTDe' + tableNumber).value) || 0;
		document.getElementById('ConventionalMassTotal' + tableNumber).value = value1 + value2 + value3 + value4 +
		value5;
		document.getElementById('UncertaintySTDTotal' + tableNumber).value = value6 + value7 + value8 + value9 +
		value10;
		// document.getElementById('MPESTDTotal' + tableNumber).value = value11 + value12 + value13 + value14 + 
		// value15;
	}

	const searchForSensitivityTest = (balance) => {
		var testArray = sensitivityTest;
		var resultArray;
		testArray[0].filter(function(e) {
			if(e.balance == balance){
				resultArray = e;
			}
		})	
		return resultArray;

	}

	const differenceBetweenMaximumAndMinimumValues = () => {
		// F in excel
		// in excel, its not link with other cells
		var result = 0.00049-(-0.00037);
		return result;
	}

	const checkCalibrationData = (dateOfCalibStandard) => {
		var x = new Date(dateOfCalibStandard);
		var today = new Date();
		var dd = String(today.getDate()).padStart(2, '0');
		var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
		var yyyy = today.getFullYear();

		today = yyyy + '-' + mm + '-' + dd;

	}

	const densityUncertaintySample = (tableNumber, value) => {
			var table = document.getElementById('Table'+tableNumber); 
			var input = table.getElementsByTagName('input');
			const valueArray = value.split(",");
			input["uncertDensitySample"].value = valueArray[1];
			input["densitySample"].value = valueArray[0];
	}
	const densityUncertaintyReference = (tableNumber, value) => {
			var table = document.getElementById('Table'+tableNumber); 
			var input = table.getElementsByTagName('input');
			const valueArray = value.split(",");
			input["uncertDensityReference"].value = valueArray[1];
			input["densityReference"].value = valueArray[0];
	}

	// load image
	var loadFile = function(event) {
		var output = document.getElementById('output');
		output.src = URL.createObjectURL(event.target.files[0]);
		output.onload = function() {
			URL.revokeObjectURL(output.src) // free memory
		}
	};


	function setDate() {
		let d = new Date(document.getElementById("sDate").value)
		let mon = +document.getElementById("mon").value;
		d.setMonth(d.getMonth()+mon)
		document.getElementById("eDate").valueAsDate = d;
	}

	function getStandardDetails(selectNumber,tableNumber){
		var tableNum = selectNumber;
		var idOfSelected = tableNum.options[tableNum.selectedIndex].getAttribute('data-id');
		var dataOfSelected = filterDataDynamic(idOfSelected,'id',arrStandardValues);
		var table = document.getElementById('Table'+tableNumber); 
		var input = table.getElementsByTagName('input')
		input['StandardIdNumber'].value	 = dataOfSelected[0]['class'] ;
		input['StandardSerialNumber'].value = dataOfSelected[0]['serialNumber'] ;
		input['StandardNominalValue'].value = dataOfSelected[0]['nominalValue'] ;
		input['StandardNominalUnit'].value = dataOfSelected[0]['nominalUnit'] ;		
	}

	document.getElementById("sDate").addEventListener("change",setDate)
	document.getElementById("mon").addEventListener("change",setDate)

	function getMPE(filterClass, unit, value){
		var classOfStandard = '';
		const classes = ['E1', 'E2', 'F1', 'F2', 'M1', 'M2'];

		filterClass = filterClass.replace('₀','0');
		filterClass = filterClass.replace('₁','1');
		filterClass = filterClass.replace('₂','2');
		filterClass = filterClass.replace('₃','3');
		filterClass = filterClass.replace('₄','4');
		filterClass = filterClass.replace('₅','5');
		filterClass = filterClass.replace('₆','6');
		filterClass = filterClass.replace('₇','7');
		filterClass = filterClass.replace('₈','8');
		filterClass = filterClass.replace('₉','9');

		for (let i = 0; i < classes.length; i++) {
			if(filterClass.includes(classes[i])){
				classOfStandard = classes[i];
			}
		}

		var dataClass = filterDataDynamic(classOfStandard, 'class', mpeArray);
		var dataUnit = filterDataDynamic(unit, 'nominalUnit', dataClass);
		var dataValue = filterDataDynamic(value, 'nominalValue', dataUnit);

		if(dataValue[0].MPE == null){
			return 0;
		}else{
			return dataValue[0].MPE;
		}
	}

	function selectMPE(id, tableNumber){
		var selection = document.getElementById(id);
		var formpe = selection.options[selection.selectedIndex].dataset.formpe;
		var formpeArray = formpe.split('@');
		var mpeValue = getMPE(formpeArray[0], formpeArray[1], formpeArray[2]);
		//document.getElementById(tableNumber).value = (mpeValue/1000)/3;		
		document.getElementById(tableNumber).value = mpeValue;
	}


	function logoutConfirmation(url){
       // windows.confirm("are u sure?");
       href="" 
        var txt;
        if (confirm("Do you want to logout?")) {
            location.href = url;
        }
    }
</script>


<script>

	function addAnotherInfo(	
			densitySampleIn,
			densityReferenceIn,
			uncertDensitySampleIn,
			uncertDensityReferenceIn,
			prevAirDensityIn,
			kIn,
			balanceResoIn,
			scIn,
			comparatorIn,
			SampleNominalValueIn,
			SampleNominalUnitIn,
			SampleMarkingIn,
			SampleSerialNumberIn,
			SampleIdNumberIn,
			SampleManufacturerIn,
			TemperatureStartIn,
			TemperatureFinishIn,
			HumidityStartIn,
			HumidityFinishIn,
			PressureStartIn,
			PressureFinishIn,
			STDAIn,
			ConventionalMassSTDaIn,
			UncertaintySTDaIn,
			STDBIn,
			ConventionalMassSTDbIn,
			UncertaintySTDbIn,
			STDCIn,
			ConventionalMassSTDcIn,
			UncertaintySTDcIn,
			STDDIn,
			ConventionalMassSTDdIn,
			UncertaintySTDdIn,
			STDEIn,
			ConventionalMassSTDeIn,
			UncertaintySTDeIn,
			ConventionalMassTotalIn,
			UncertaintySTDTotalIn,
			MPESTDaIn,
			MPESTDbIn,
			MPESTDcIn,
			MPESTDdIn,
			MPESTDeIn,
			MPESTDTotalIn,
			sampleSelected,
			referenceSelected,
			DataArray,
		) {
		numberOfTables +=1;
		var approxClass = document.getElementById('approxClass').value;
		var MainDiv = document.getElementById('TableDiv');
		var container = document.createElement("div");
		container.setAttribute("style", "margin-top:20px");
		container.setAttribute("id", "Table"+numberOfTables);


		var FirstP = document.createElement("p");
		FirstP.setAttribute("class", "h3");
		FirstP.innerHTML = "Calibration Information #" + numberOfTables;

		container.appendChild(FirstP);
		//firstDiv
			var firstDivInside = document.createElement("div");
			firstDivInside.setAttribute(
				"style",
				"display:flex;flex-direction: row;margin-bottom:25px;display:flex;justify-content:center"
			);

			var ul = document.createElement("ul");
			ul.setAttribute("class", "list-group list-group-flush");
			var li1 = document.createElement("li");
			li1.setAttribute("class", "list-group-item");
			li1.innerHTML = "Previous Air Density";
			var li2 = document.createElement("li");
			li2.setAttribute("class", "list-group-item");
			var prevAirDensity = document.createElement("input");
			prevAirDensity.setAttribute("class", "form-control");
			prevAirDensity.setAttribute("type", "text");
			prevAirDensity.setAttribute("id", "prevAirDensity");
			prevAirDensity.setAttribute("name", "prevAirDensity");
			prevAirDensity.setAttribute("tabindex", "-1");
			prevAirDensity.setAttribute(
				"style",
				"background-color:#F1C40F;border-radius:5px"
			);
			prevAirDensity.setAttribute('value',prevAirDensityIn);

			li2.appendChild(prevAirDensity);
			ul.appendChild(li1);
			ul.appendChild(li2);
			firstDivInside.appendChild(ul);

			var ul = document.createElement("ul");
			ul.setAttribute("class", "list-group list-group-flush");
			var li1 = document.createElement("li");
			li1.setAttribute("class", "list-group-item");
			li1.innerHTML = "K";
			var li2 = document.createElement("li");
			li2.setAttribute("class", "list-group-item");
			var k = document.createElement("input");
			k.setAttribute("class", "form-control");
			k.setAttribute("type", "text");
			k.setAttribute("id", "k");
			k.setAttribute("name", "k");
			k.setAttribute("tabindex", "-1");
			k.setAttribute("value", "2");
			k.setAttribute(
				"style",
				"background-color:#F1C40F;border-radius:5px"
			);
			k.setAttribute('value',kIn);

			li2.appendChild(k);
			ul.appendChild(li1);
			ul.appendChild(li2);
			firstDivInside.appendChild(ul);

			var ul = document.createElement("ul");
			ul.setAttribute("class", "list-group list-group-flush");
			var li1 = document.createElement("li");
			li1.setAttribute("class", "list-group-item");
			li1.innerHTML = "SC";
			var li2 = document.createElement("li");
			li2.setAttribute("class", "list-group-item");
			var sc = document.createElement("input");
			sc.setAttribute("class", "form-control");
			sc.setAttribute("type", "text");
			sc.setAttribute("id", "sc");
			sc.setAttribute("name", "sc");
			sc.setAttribute("tabindex", "-1");
			sc.setAttribute("value", "1");
			sc.setAttribute(
				"style",
				"background-color:#F1C40F;border-radius:5px"
			);
			sc.setAttribute('value',scIn);

			li2.appendChild(sc);
			ul.appendChild(li1);
			ul.appendChild(li2);
			firstDivInside.appendChild(ul);

			container.appendChild(firstDivInside);
		//firstDiv
		//secondDiv
			var secondDivInside = document.createElement("div");
			secondDivInside.setAttribute(
				"style",
				"display:flex;flex-direction: row;margin-bottom:5px;display:flex;justify-content:space-around;align-items:center"
			);

			var div1 = document.createElement("div");
			div1.setAttribute(
				"style",
				"margin-bottom:20px;display:flex;justify-content:center"
			);

			var table = document.createElement("table");
			var tbody = document.createElement("tbody");

			var tr = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var td4 = document.createElement("td");
			td2.innerHTML = "Material";
			td3.innerHTML = "Density(kg/m3)";
			td4.innerHTML = "Uncertainty of Density";
			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tr.appendChild(td4);
			tbody.appendChild(tr);

			var tr = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var td4 = document.createElement("td");
			var select = document.createElement("select");
			td1.innerHTML = "Sample: ";
			select.setAttribute("class", "form-control");
			select.setAttribute("id", "sampleSelected");
			select.setAttribute('onchange',"densityUncertaintySample("+numberOfTables+",this.value)");

			<?php
				// echo "var tdNewDensityOptionChoose = document.createElement('option');tdNewDensityOptionChoose.setAttribute('selected','');tdNewDensityOptionChoose.innerHTML = 'Choose';select.appendChild(tdNewDensityOptionChoose);";
				// for($alloyLoop = 0; $alloyLoop < count($alloyDetails[0]); $alloyLoop++){
				// 	echo 'var tdNewDensityOption'.$alloyLoop.'= document.createElement("option");';
				// 	echo 'tdNewDensityOption'.$alloyLoop.'.setAttribute("value","'.$alloyDetails[0][$alloyLoop]['density'].','.$alloyDetails[0][$alloyLoop]['uncertainty'].'");';
				// 	echo 'tdNewDensityOption'.$alloyLoop.'.innerHTML ="'.$alloyDetails[0][$alloyLoop]['material'].'";';
				// 	echo 'select.appendChild(tdNewDensityOption'.$alloyLoop.');';
				// }
			?>

			for (let index = 0; index < arrAlloyDetails.length; index++) {
				var value = sampleSelected ;
				if(value == (arrAlloyDetails[index]['density']+','+arrAlloyDetails[index]['uncertainty']+','+arrAlloyDetails[index]['material']) ){
					var name = index;
					name = document.createElement("option");
					name.setAttribute("value",arrAlloyDetails[index]['density']+','+arrAlloyDetails[index]['uncertainty']+','+arrAlloyDetails[index]['material']);
					name.setAttribute("selected","")
					name.innerHTML = arrAlloyDetails[index]['material'];
					select.appendChild(name);
				}else{
					var name = index;
					name = document.createElement("option");
					name.setAttribute("value",arrAlloyDetails[index]['density']+','+arrAlloyDetails[index]['uncertainty']+','+arrAlloyDetails[index]['material']);
					name.innerHTML = arrAlloyDetails[index]['material'];
					select.appendChild(name);
				}
			}

			var densitySample = document.createElement("input");
			densitySample.setAttribute("class", "form-control");
			densitySample.setAttribute("type", "text");
			densitySample.setAttribute("id", "densitySample");
			densitySample.setAttribute("name", "densitySample");
			densitySample.setAttribute("tabindex", "-1");
			densitySample.setAttribute(
				"style",
				"background-color:#F1C40F;border-radius:5px"
			);
			densitySample.setAttribute('value',densitySampleIn);
			var uncertDensitySample = document.createElement("input");
			uncertDensitySample.setAttribute("class", "form-control");
			uncertDensitySample.setAttribute("type", "text");
			uncertDensitySample.setAttribute("id", "uncertDensitySample");
			uncertDensitySample.setAttribute("name", "uncertDensitySample");
			uncertDensitySample.setAttribute("tabindex", "-1");
			uncertDensitySample.setAttribute(
				"style",
				"background-color:#F1C40F;border-radius:5px"
			);
			uncertDensitySample.setAttribute('value',uncertDensitySampleIn);

			td2.appendChild(select);
			td3.appendChild(densitySample);
			td4.appendChild(uncertDensitySample);
			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tr.appendChild(td4);
			tbody.appendChild(tr);

			var tr = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var td4 = document.createElement("td");
			var select = document.createElement("select");
			td1.innerHTML = "Reference: ";
			select.setAttribute("class", "form-control");
			select.setAttribute("id", "referenceSelected");
			select.setAttribute('onchange',"densityUncertaintyReference("+numberOfTables+",this.value)");
			<?php
				// echo "var tdNewDensityOptionChoose = document.createElement('option');tdNewDensityOptionChoose.setAttribute('selected','');tdNewDensityOptionChoose.innerHTML = 'Choose';select.appendChild(tdNewDensityOptionChoose);";
				// for($alloyLoop = 0; $alloyLoop < count($alloyDetails[0]); $alloyLoop++){
				// 	echo 'var tdNewDensityOption'.$alloyLoop.'= document.createElement("option");';
				// 	echo 'tdNewDensityOption'.$alloyLoop.'.setAttribute("value","'.$alloyDetails[0][$alloyLoop]['density'].','.$alloyDetails[0][$alloyLoop]['uncertainty'].'");';
				// 	echo 'tdNewDensityOption'.$alloyLoop.'.innerHTML ="'.$alloyDetails[0][$alloyLoop]['material'].'";';
				// 	echo 'select.appendChild(tdNewDensityOption'.$alloyLoop.');';
				// }
			?>

			for (let index = 0; index < arrAlloyDetails.length; index++) {
				var value = referenceSelected;
				var name = index;
				name = document.createElement("option");
				name.setAttribute("value",arrAlloyDetails[index]['density']+','+arrAlloyDetails[index]['uncertainty']+','+arrAlloyDetails[index]['material']);
				if(value == (arrAlloyDetails[index]['density']+','+arrAlloyDetails[index]['uncertainty']+','+arrAlloyDetails[index]['material']) ){
					name.setAttribute("selected","")
				}
				name.innerHTML = arrAlloyDetails[index]['material'];
				select.appendChild(name);
			}

			var densityReference = document.createElement("input");
			densityReference.setAttribute("class", "form-control");
			densityReference.setAttribute("type", "text");
			densityReference.setAttribute("id", "densityReference");
			densityReference.setAttribute("name", "densityReference");
			densityReference.setAttribute("tabindex", "-1");
			densityReference.setAttribute(
				"style",
				"background-color:#F1C40F;border-radius:5px"
			);
			densityReference.setAttribute('value',densityReferenceIn);
			var uncertDensityReference = document.createElement("input");
			uncertDensityReference.setAttribute("class", "form-control");
			uncertDensityReference.setAttribute("type", "text");
			uncertDensityReference.setAttribute("id", "uncertDensityReference");
			uncertDensityReference.setAttribute("name", "uncertDensityReference");
			uncertDensityReference.setAttribute("tabindex", "-1");
			uncertDensityReference.setAttribute(
				"style",
				"background-color:#F1C40F;border-radius:5px"
			);
			uncertDensityReference.setAttribute('value',uncertDensityReferenceIn);

			td2.appendChild(select);
			td3.appendChild(densityReference);
			td4.appendChild(uncertDensityReference);
			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tr.appendChild(td4);
			tbody.appendChild(tr);

			var div2 = document.createElement("div");
			div2.setAttribute(
				"style",
				"margin-bottom:20px;display:flex;justify-content:center"
			);

			var ul = document.createElement("ul");
			ul.setAttribute("class", "list-group list-group-flush");
			var li1 = document.createElement("li");
			li1.setAttribute("class", "list-group-item");
			li1.innerHTML = "Comparator:";
			var li2 = document.createElement("li");
			li2.setAttribute("class", "list-group-item");
			var select = document.createElement("select");
			var option1 = document.createElement("option");

			select.setAttribute ('class','form-control');
			select.setAttribute('id','comparator');
			select.setAttribute('onchange','setBalanceReso("Table'+numberOfTables+'")');
			option1.setAttribute('selected','');
			option1.innerHTML = "Choose...";
			select.appendChild(option1);
			for (let i = 0; i < sensitivityTest[0].length; i++) {
				var option = document.createElement("option");
				option.setAttribute('value',sensitivityTest[0][i]['balance']);	
				if(sensitivityTest[0][i]['balance']==comparatorIn){
					option.setAttribute('selected','');
				}
				option.innerHTML = sensitivityTest[0][i]['balance'];
				select.appendChild(option);
			}		
			
			li2.appendChild(select);
			ul.appendChild(li1);
			ul.appendChild(li2);
			div2.appendChild(ul);
			select.toggleAttribute(onchange)
			var ul = document.createElement("ul");
			ul.setAttribute("class", "list-group list-group-flush");
			var li1 = document.createElement("li");
			li1.setAttribute("class", "list-group-item");
			li1.innerHTML = "Balance Resolution";
			var li2 = document.createElement("li");
			li2.setAttribute("class", "list-group-item");
			var balanceReso = document.createElement("input");
			balanceReso.setAttribute("class", "form-control");
			balanceReso.setAttribute("type", "text");
			balanceReso.setAttribute("id", "balanceReso");
			balanceReso.setAttribute("name", "balanceReso");
			balanceReso.setAttribute("tabindex", "-1");
			balanceReso.setAttribute(
				"style",
				"background-color:#F1C40F;border-radius:5px"
			);
			balanceReso.setAttribute('value',balanceResoIn);

			li2.appendChild(balanceReso);
			ul.appendChild(li1);
			ul.appendChild(li2);
			div2.appendChild(ul);

			table.appendChild(tbody);
			div1.appendChild(table);
			secondDivInside.appendChild(div1);
			secondDivInside.appendChild(div2);
			container.appendChild(secondDivInside);

		//secondDiv
		//thirdDiv
			var thirdDivInside = document.createElement("div");
			thirdDivInside.setAttribute(
				"style",
				"margin-bottom:5px;display:flex;justify-content:center"
			);

			var div1 = document.createElement("div");
			div1.setAttribute("class","input-group mb-3");
			var div2 = document.createElement("div");
			div2.setAttribute("class","input-group-prepend");
			var span = document.createElement("span");
			span.setAttribute("class","input-group-text");
			span.innerHTML = "Sample:"
			div2.appendChild(span);
			var input1 = document.createElement("input");
			input1.setAttribute("type","text");
			input1.setAttribute("class","form-control");
			input1.setAttribute("id","SampleNominalValue");
			input1.setAttribute("placeholder","Nominal Value");
			input1.setAttribute("onchange","setBalanceReso('Table"+numberOfTables+"')");
			input1.setAttribute('value',SampleNominalValueIn);
			var select = document.createElement("select");
			var option2 = document.createElement("option");
			var option3 = document.createElement("option");
			var option4 = document.createElement("option");
			option2.setAttribute('value','mg');
			option3.setAttribute('value','g');
			option4.setAttribute('value','kg');
			option2.innerHTML = "mg"
			option3.innerHTML = "g"
			option4.innerHTML = "kg"
			
			if(SampleNominalUnitIn == 'mg'){
				option2.setAttribute('selected','');
			}
			if(SampleNominalUnitIn == 'g'){
				option3.setAttribute('selected','');
			}
			if(SampleNominalUnitIn == 'kg'){
				option4.setAttribute('selected','');
			}

			select.setAttribute("class","form-control input-group-append");
			select.setAttribute("id","SampleNominalUnit");
			select.setAttribute("onchange","setBalanceReso('Table"+numberOfTables+"');getWeight("+numberOfTables+")");
			var input2 = document.createElement("input");
			input2.setAttribute("type","text");
			input2.setAttribute("class","form-control");
			input2.setAttribute("id","SampleMarking");
			input2.setAttribute("placeholder","Marking");
			input2.setAttribute('value',SampleMarkingIn);
			var input3 = document.createElement("input");
			input3.setAttribute("type","text");
			input3.setAttribute("class","form-control");
			input3.setAttribute("hidden","");
			input3.setAttribute("id","SampleSerialNumber");
			input3.setAttribute("placeholder","Serial Number");
			input3.setAttribute('value',SampleSerialNumberIn);
			var input4 = document.createElement("input");
			input4.setAttribute("type","text");
			input4.setAttribute("class","form-control");
			input4.setAttribute("hidden","");
			input4.setAttribute("id","SampleIdNumber");
			input4.setAttribute("placeholder","Identification Number");
			input4.setAttribute('value',SampleIdNumberIn);
			var input5 = document.createElement("input");
			input5.setAttribute("type","text");
			input5.setAttribute("class","form-control");
			input5.setAttribute("hidden","");
			input5.setAttribute("id","SampleManufacturer");
			input5.setAttribute("placeholder","Manufacturer");
			input5.setAttribute('value',SampleManufacturerIn);


			select.appendChild(option2);
			select.appendChild(option3);
			select.appendChild(option4);
			div1.appendChild(div2);
			div1.appendChild(input1);
			div1.appendChild(select);
			div1.appendChild(input2);
			div1.appendChild(input3);
			div1.appendChild(input4);
			div1.appendChild(input5);

			thirdDivInside.appendChild(div1);

			container.appendChild(thirdDivInside);
		//thirdDiv
		//fourthDiv
			var fourthDivInside = document.createElement("div");
			fourthDivInside.setAttribute(
				"style",
				"display:flex;flex-direction: row;margin-bottom:5px;display:flex;justify-content:space-around;align-items:center"
			);

			var div = document.createElement("div");
			div.setAttribute(
				"style",
				"margin-bottom:20px;display:flex;justify-content:center"
			);

			var table = document.createElement("table");
			var tbody = document.createElement("tbody");

			var tr = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			td2.innerHTML = "Start";
			td3.innerHTML = "Finish";
			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tbody.appendChild(tr);

			var tr = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var input1 = document.createElement("input");
			var input2 = document.createElement("input");
			input1.setAttribute('id','TemperatureStart');
			input1.setAttribute('style','border-radius:5px');
			input1.setAttribute('type','text');
			input1.setAttribute('class','form-control');
			input2.setAttribute('id','TemperatureFinish');
			input2.setAttribute('style','border-radius:5px');
			input2.setAttribute('type','text');
			input2.setAttribute('class','form-control');
			input1.setAttribute('value',TemperatureStartIn);
			input2.setAttribute('value',TemperatureFinishIn);
			td1.innerHTML = "Temparature (C):";
			td2.appendChild(input1);
			td3.appendChild(input2);
			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tbody.appendChild(tr);

			var tr = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var input1 = document.createElement("input");
			var input2 = document.createElement("input");
			input1.setAttribute('id','HumidityStart');
			input1.setAttribute('style','border-radius:5px');
			input1.setAttribute('type','text');
			input1.setAttribute('class','form-control');
			input2.setAttribute('id','HumidityFinish');
			input2.setAttribute('style','border-radius:5px');
			input2.setAttribute('type','text');
			input2.setAttribute('class','form-control');
			input1.setAttribute('value',HumidityStartIn);
			input2.setAttribute('value',HumidityFinishIn);
			td1.innerHTML = "Humidity (%RH):";
			td2.appendChild(input1);
			td3.appendChild(input2);
			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tbody.appendChild(tr);

			var tr = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var input1 = document.createElement("input");
			var input2 = document.createElement("input");
			input1.setAttribute('id','PressureStart');
			input1.setAttribute('style','border-radius:5px');
			input1.setAttribute('type','text');
			input1.setAttribute('class','form-control');
			input2.setAttribute('id','PressureFinish');
			input2.setAttribute('style','border-radius:5px');
			input2.setAttribute('type','text');
			input2.setAttribute('class','form-control');
			input1.setAttribute('value',PressureStartIn);
			input2.setAttribute('value',PressureFinishIn);
			td1.innerHTML = "Pressure (hPa):";
			td2.appendChild(input1);
			td3.appendChild(input2);
			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tbody.appendChild(tr);

			table.appendChild(tbody);
			div.appendChild(table)
			fourthDivInside.appendChild(div);
			container.appendChild(fourthDivInside);

			var div = document.createElement("div");
			div.setAttribute(
				"style",
				"margin-bottom:20px;display:flex;justify-content:center"
			);

			var table = document.createElement("table");
			var thead = document.createElement("thead");
			var tbody = document.createElement("tbody");

			var tr = document.createElement("tr");
			tr.setAttribute('style','text-align:center');
			var th = document.createElement("th");
			th.setAttribute('col','3');
			th.innerHTML = '<h4>Standard Used</h4>';
			tr.appendChild(th);
			thead.appendChild(tr);

			var tr = document.createElement("tr");
			var th1 = document.createElement("th");
			var th2 = document.createElement("th");
			var th3 = document.createElement("th");
			//var th4 = document.createElement("th");
			th1.innerHTML = 'Std. Code';
			th2.innerHTML = 'Conventional Mass';
			th3.innerHTML = 'Uncertainty of Measurement (mg)';
			//th4.innerHTML = '1/3 of MPE of Standard (mg converted to g)';
			tr.appendChild(th1);
			tr.appendChild(th2);
			tr.appendChild(th3);
			//tr.appendChild(th4);
			thead.appendChild(tr);
			table.appendChild(thead);

			var tr = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var select = document.createElement("select");
			var option = document.createElement("option");
			select.setAttribute('class','form-control');
			select.setAttribute('id','STDa'+numberOfTables);
			select.setAttribute('onchange',"selectMPE(this.id,'MPESTDa"+numberOfTables+"');getStandardDetails(this,"+numberOfTables+");standardChangeToInput(this.value,'ConventionalMassSTDa"+numberOfTables+"','UncertaintySTDa"+numberOfTables+"');totalConventionalUncertainty('"+numberOfTables+"')");			option.setAttribute('value',',,');
			option.setAttribute('value', ',,');
			option.setAttribute('selected','');
			option.innerHTML = "Choose...";
			var input1 = document.createElement("input");
			input1.setAttribute('id','ConventionalMassSTDa'+numberOfTables);
			input1.setAttribute('value',ConventionalMassSTDaIn);
			input1.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input1.setAttribute('type','text');
			input1.setAttribute('class','form-control');
			input1.setAttribute('tabindex','-1');
			var input2 = document.createElement("input");
			input2.setAttribute('id','UncertaintySTDa'+numberOfTables);
			input2.setAttribute('value',UncertaintySTDaIn);
			input2.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input2.setAttribute('type','text');
			input2.setAttribute('class','form-control');
			input2.setAttribute('tabindex','-1');

			var td4 = document.createElement("td");
			var input3 = document.createElement("input");
			input3.setAttribute('id','MPESTDa'+numberOfTables);
			input3.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input3.setAttribute('type','hidden');
			input3.setAttribute('class','form-control');
			input3.setAttribute('tabindex','-1');

			input3.setAttribute('value',MPESTDaIn);

			select.appendChild(option);
			td1.appendChild(select);
			td2.appendChild(input1);
			td3.appendChild(input2);
			td4.appendChild(input3);

			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tr.appendChild(td4);
			tbody.appendChild(tr);
			table.appendChild(tbody);

			var tr = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var select = document.createElement("select");
			var option = document.createElement("option");
			select.setAttribute('class','form-control');
			select.setAttribute('id','STDb'+numberOfTables);
			select.setAttribute('onchange',"selectMPE(this.id,'MPESTDb"+numberOfTables+"');standardChangeToInput(this.value,'ConventionalMassSTDb"+numberOfTables+"','UncertaintySTDb"+numberOfTables+"');totalConventionalUncertainty('"+numberOfTables+"')");
			option.setAttribute('value',',,');
			option.setAttribute('selected','');
			option.innerHTML = "Choose...";
			var input1 = document.createElement("input");
			input1.setAttribute('id','ConventionalMassSTDb'+numberOfTables);
			input1.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input1.setAttribute('type','text');
			input1.setAttribute('class','form-control');
			input1.setAttribute('tabindex','-1');
			var input2 = document.createElement("input");
			input2.setAttribute('id','UncertaintySTDb'+numberOfTables);
			input2.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input2.setAttribute('type','text');
			input2.setAttribute('class','form-control');
			input2.setAttribute('tabindex','-1');
			var td4 = document.createElement("td");
			var input3 = document.createElement("input");
			input3.setAttribute('id','MPESTDb'+numberOfTables);
			input3.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input3.setAttribute('type','hidden');
			input3.setAttribute('class','form-control');
			input3.setAttribute('tabindex','-1');

			input1.setAttribute('value',ConventionalMassSTDbIn);
			input2.setAttribute('value',UncertaintySTDbIn);
			input3.setAttribute('value',MPESTDbIn);


			select.appendChild(option);
			td1.appendChild(select);
			td2.appendChild(input1);
			td3.appendChild(input2);
			td4.appendChild(input3);

			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tr.appendChild(td4);
			tbody.appendChild(tr);
			table.appendChild(tbody);

			var tr = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var select = document.createElement("select");
			var option = document.createElement("option");
			select.setAttribute('class','form-control');
			select.setAttribute('id','STDc'+numberOfTables);
			select.setAttribute('onchange',"selectMPE(this.id,'MPESTDc"+numberOfTables+"');standardChangeToInput(this.value,'ConventionalMassSTDc"+numberOfTables+"','UncertaintySTDc"+numberOfTables+"');totalConventionalUncertainty('"+numberOfTables+"')");			option.setAttribute('value',',,');
			option.setAttribute('value', ',,');
			option.setAttribute('selected','');
			option.innerHTML = "Choose...";
			var input1 = document.createElement("input");
			input1.setAttribute('id','ConventionalMassSTDc'+numberOfTables);
			input1.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input1.setAttribute('type','text');
			input1.setAttribute('class','form-control');
			input1.setAttribute('tabindex','-1');
			var input2 = document.createElement("input");
			input2.setAttribute('id','UncertaintySTDc'+numberOfTables);
			input2.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input2.setAttribute('type','text');
			input2.setAttribute('class','form-control');
			input2.setAttribute('tabindex','-1');

			var td4 = document.createElement("td");
			var input3 = document.createElement("input");
			input3.setAttribute('id','MPESTDc'+numberOfTables);
			input3.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input3.setAttribute('type','hidden');
			input3.setAttribute('class','form-control');
			input3.setAttribute('tabindex','-1');

			input1.setAttribute('value',ConventionalMassSTDcIn);
			input2.setAttribute('value',UncertaintySTDcIn);
			input3.setAttribute('value',MPESTDcIn);


			select.appendChild(option);
			td1.appendChild(select);
			td2.appendChild(input1);
			td3.appendChild(input2);
			td4.appendChild(input3);

			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tr.appendChild(td4);
			tbody.appendChild(tr);
			table.appendChild(tbody);

			var tr = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var select = document.createElement("select");
			var option = document.createElement("option");
			select.setAttribute('class','form-control');
			select.setAttribute('id','STDd'+numberOfTables);
			select.setAttribute('onchange',"selectMPE(this.id,'MPESTDd"+numberOfTables+"');standardChangeToInput(this.value,'ConventionalMassSTDd"+numberOfTables+"','UncertaintySTDd"+numberOfTables+"');totalConventionalUncertainty('"+numberOfTables+"')");			option.setAttribute('value',',,');
			option.setAttribute('value', ',,');
			option.setAttribute('selected','');
			option.innerHTML = "Choose...";
			var input1 = document.createElement("input");
			input1.setAttribute('id','ConventionalMassSTDd'+numberOfTables);
			input1.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input1.setAttribute('type','text');
			input1.setAttribute('class','form-control');
			input1.setAttribute('tabindex','-1');
			var input2 = document.createElement("input");
			input2.setAttribute('id','UncertaintySTDd'+numberOfTables);
			input2.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input2.setAttribute('type','text');
			input2.setAttribute('class','form-control');
			input2.setAttribute('tabindex','-1');

			var td4 = document.createElement("td");
			var input3 = document.createElement("input");
			input3.setAttribute('id','MPESTDd'+numberOfTables);
			input3.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input3.setAttribute('type','hidden');
			input3.setAttribute('class','form-control');
			input3.setAttribute('tabindex','-1');

			input1.setAttribute('value',ConventionalMassSTDdIn);
			input2.setAttribute('value',UncertaintySTDdIn);
			input3.setAttribute('value',MPESTDdIn);


			select.appendChild(option);
			td1.appendChild(select);
			td2.appendChild(input1);
			td3.appendChild(input2);
			td4.appendChild(input3);

			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tr.appendChild(td4);
			tbody.appendChild(tr);
			table.appendChild(tbody);

			var tr = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var select = document.createElement("select");
			var option = document.createElement("option");
			select.setAttribute('class','form-control');
			select.setAttribute('id','STDe'+numberOfTables);
			select.setAttribute('onchange',"selectMPE(this.id,'MPESTDe"+numberOfTables+"');standardChangeToInput(this.value,'ConventionalMassSTDe"+numberOfTables+"','UncertaintySTDe"+numberOfTables+"');totalConventionalUncertainty('"+numberOfTables+"')");			option.setAttribute('value',',,');
			option.setAttribute('value', ',,');
			option.setAttribute('selected','');
			option.innerHTML = "Choose...";
			var input1 = document.createElement("input");
			input1.setAttribute('id','ConventionalMassSTDe'+numberOfTables);
			input1.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input1.setAttribute('type','text');
			input1.setAttribute('class','form-control');
			input1.setAttribute('tabindex','-1');
			var input2 = document.createElement("input");
			input2.setAttribute('id','UncertaintySTDe'+numberOfTables);
			input2.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input2.setAttribute('type','text');
			input2.setAttribute('class','form-control');
			input2.setAttribute('tabindex','-1');
			var td4 = document.createElement("td");
			var input3 = document.createElement("input");
			input3.setAttribute('id','MPESTDe'+numberOfTables);
			input3.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input3.setAttribute('type','hidden');
			input3.setAttribute('class','form-control');
			input3.setAttribute('tabindex','-1');


			input1.setAttribute('value',ConventionalMassSTDeIn);
			input2.setAttribute('value',UncertaintySTDeIn);
			input3.setAttribute('value',MPESTDeIn);


			select.appendChild(option);
			td1.appendChild(select);
			td2.appendChild(input1);
			td3.appendChild(input2);
			td4.appendChild(input3);

			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tr.appendChild(td4);
			tbody.appendChild(tr);
			table.appendChild(tbody);

			var tr = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			td1.innerHTML = "Total";
			var input1 = document.createElement("input");
			input1.setAttribute('id','ConventionalMassTotal'+numberOfTables);
			input1.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input1.setAttribute('type','text');
			input1.setAttribute('class','form-control');
			input1.setAttribute('tabindex','-1');
			var input2 = document.createElement("input");
			input2.setAttribute('id','UncertaintySTDTotal'+numberOfTables);
			input2.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input2.setAttribute('type','text');
			input2.setAttribute('class','form-control');
			input2.setAttribute('tabindex','-1');
			var td4 = document.createElement("td");
			var input3 = document.createElement("input");
			input3.setAttribute('id','MPESTDTotal'+numberOfTables);
			input3.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input3.setAttribute('type','hidden');
			input3.setAttribute('class','form-control');
			input3.setAttribute('tabindex','-1');

			input1.setAttribute('value', ConventionalMassTotalIn);
			input2.setAttribute('value', UncertaintySTDTotalIn);
			input3.setAttribute('value',MPESTDTotalIn);
			

			td2.appendChild(input1);
			td3.appendChild(input2);
			td4.appendChild(input3);

			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tr.appendChild(td4);
			tbody.appendChild(tr);
			table.appendChild(tbody);

			div.appendChild(table)
			fourthDivInside.appendChild(div);
			container.appendChild(fourthDivInside);

		//fourthDiv
		//fifthDiv
			var fifthDivInside = document.createElement("div");
			fifthDivInside.setAttribute(
				"style",
				"margin-bottom:50px;display:flex;justify-content:center"
			);
			var table = document.createElement("table");
			var tbody = document.createElement("tbody");
			tbody.setAttribute('id','cycleTable'+numberOfTables);
			var tr = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var td4 = document.createElement("td");
			var td5 = document.createElement("td");
			var tdEnd = document.createElement("td");
			var tdFront = document.createElement("td");

			var hiddenInput1 = document.createElement("input");
			var hiddenInput2 = document.createElement("input");
			var hiddenInput3 = document.createElement("input");
			var hiddenInput4 = document.createElement("input");

			var select = document.createElement('select');
			var option1 = document.createElement('option');
			var option2 = document.createElement('option');
			var option3 = document.createElement('option');
			select.setAttribute('id','unitRawData');
			option2.setAttribute('selected','');
			option1.setAttribute('value','mg');
			option2.setAttribute('value','g');
			option3.setAttribute('value','kg');
			option1.innerHTML = "mg";
			option2.innerHTML = "g";
			option3.innerHTML = "kg";
			hiddenInput1.setAttribute("type",'hidden');
			hiddenInput1.setAttribute("id",'StandardIdNumber');
			hiddenInput2.setAttribute("type",'hidden');
			hiddenInput2.setAttribute("id",'StandardSerialNumber');
			hiddenInput3.setAttribute("type",'hidden');
			hiddenInput3.setAttribute("id",'StandardNominalValue');
			hiddenInput4.setAttribute("type",'hidden');
			hiddenInput4.setAttribute("id",'StandardNominalUnit');


			select.appendChild(option1);
			select.appendChild(option2);
			select.appendChild(option3);

			td1.setAttribute('style','width:50px');
			td1.appendChild(select);
			td2.innerHTML = 'A1';
			td3.innerHTML = 'B1';
			td4.innerHTML = 'B2';
			td5.innerHTML = 'A2';

			tr.appendChild(tdFront);
			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tr.appendChild(td4);
			tr.appendChild(td5);
			tr.appendChild(tdEnd);
			tbody.appendChild(tr);
			table.appendChild(tbody);
			
			fifthDivInside.appendChild(table);
			fifthDivInside.appendChild(hiddenInput1);
			fifthDivInside.appendChild(hiddenInput2);
			fifthDivInside.appendChild(hiddenInput3);
			fifthDivInside.appendChild(hiddenInput4);
			container.appendChild(fifthDivInside);
		//fifthDiv
		//sixthDIv
			// let headers = [
			// 	"Nominal Weight",
			// 	"sensitivity weight ms",
			// 	"standard uncertainty of the sensitivity weight u(ms), (g)",
			// 	"change in the indication of the balance due to sensitivity weight (DIs), (g)",
			// 	"uncertainty of the sensitivity of the balance us",
			// 	"uncertainty of the resolution of the balance ud",
			// 	"ρa computed density (kg/m3): approximation of air density using measured pressure, temperature & humidity",
			// 	"ρ0 conventional air density (kg/m3):",
			// 	"u(ρt) standard uncertainty of the density of the sample weight (kg/m3)",
			// 	"u(ρr) standard uncertainty of the density of the reference weight (kg/m3)",
			// 	"u(ρa) standard uncertainty of the approximation of air density",
			// 	"standard uncertainty of the air buoyancy correction, u2b",
			// 	"Ucr uncertainty of the reference weight, (g)",
			// 	"uncertainty of the weighing process",
			// 	"Uba standard uncertainty of the balance",
			// 	"Uc",
			// 	"K",
			// 	"Ue",
			// 	"Unit",
			// ];
			let headers = [
				"Nominal Mass",
				"m<sub>s</sub>",
				"u<sub>ms</sub>",
				"ΔI",
				"u<sub>ΔI</sub>",
				"u<sub>d</sub>",
				"ρ<sub>a</sub>",
				"ρ<sub>0</sub>",
				"u<sub>ρuuc</sub>",
				"u<sub>ρstd</sub>",
				"u<sub>ρa</sub>",
				"u<sub>b<sup>2</sup></sub>",
				"u(m<sub>cr</sub>)",
				"u<sub>w</sub>(Δm<sub>c</sub>)",
				"u<sub>ba</sub>",
				"u<sub>c</sub>",
                "k",
				"U",
				"Unit",
			];

			let headersValues =[
			"SampleNominalValue",
			// "SampleNominalUnit",
			
			"sensitivityWeight",
			"standardUncertaintySensitivityWeight",
			"sensitivityWeightDelta",
			"uncertSensitivityOfBalanceU",
			"uncertResolutionOfBalanceU",
			"computedDensityUsingMeasuredPressureTempRH",
			"conventionalAirDensity",
			"standardUncertDensityOfSampleWeight",
			"standardUncertDensityOfReferenceWeight",
			"standardUncertApproxAirDensity",
			"standardUncertaintyAirBuoyancyCorrectionFactor",
			"uncertReferenceWeight",
			"standardUncertaintyWeighingProcess",
			"standardUncertaintyBalance",
			"uc",
			"k",
			"ue",
			"unitRawData",
		];
			

			var sixthDivInside = document.createElement("div");
			
			sixthDivInside.setAttribute(
				"class",
				"table-responsive hidden"
			);
			let uncertBalanceTable = document.createElement("table");
			let uncertBalanceTableTbody = document.createElement("tbody");
			uncertBalanceTable.setAttribute('class', 'table table-bordered');
			uncertBalanceTableTbody.setAttribute('id','uncertBalanceTBody')
			let uncertBalanceTableTbodytr = document.createElement("tr");
			let trOfValues = document.createElement("tr");
			for (let i = 0; i < headers.length; i++) {
				let uncertBalanceTableTbodytd = document.createElement("td");
				uncertBalanceTableTbodytd.innerHTML = headers[i];
				uncertBalanceTableTbodytr.append(uncertBalanceTableTbodytd);
			}
			for (let i = 0; i < headersValues.length; i++) {
				let tdValues = document.createElement("td");
				tdValues.innerHTML = DataArray[headersValues[i]]['value'] ;
				trOfValues.append(tdValues);
				
			}
			uncertBalanceTableTbody.append(uncertBalanceTableTbodytr);
			uncertBalanceTableTbody.append(trOfValues);
			uncertBalanceTable.append(uncertBalanceTableTbody);
			sixthDivInside.appendChild(uncertBalanceTable);
			container.appendChild(sixthDivInside);
		//sixthDIv

		MainDiv.appendChild(container);
		getWeight(
			numberOfTables,
			STDAIn,
			STDBIn,
			STDCIn,
			STDDIn,
			STDEIn,
		);		
	}

	function getCustomerDetails(){
			var customerDetails = document.getElementById('CustomerDetails');
			var customer = document.getElementById('customer');
			var address = document.getElementById('address');
			var idOfCustomer = document.getElementById('idOfCustomer');
			
			const detailsSplit = customer.value.split(' @ ');
			if(detailsSplit.length > 1){
				customer.value = detailsSplit[0];
				address.value = detailsSplit[1];
			}else{
				address.value = ''
			}
	}



	function addAnotherInfoForButton() {
		numberOfTables +=1;
		var approxClass = document.getElementById('approxClass').value;
		var MainDiv = document.getElementById('TableDiv');
		var container = document.createElement("div");
		container.setAttribute("style", "margin-top:20px");
		container.setAttribute("id", "Table"+numberOfTables);

		var FirstP = document.createElement("p");

		FirstP.setAttribute('onclick','hideRow("Table'+numberOfTables+'")');
		container.setAttribute('class','fadeIn');

		
		FirstP.setAttribute("class", "h3");
		FirstP.innerHTML = "Calibration Information #" + numberOfTables;

			//   container.appendChild(FirstP);
		//firstDiv
			var firstDivInside = document.createElement("div");
			firstDivInside.setAttribute(
				"style",
				"display:flex;flex-direction: row;margin-bottom:25px;display:flex;justify-content:center"
			);

			var ul = document.createElement("ul");
			ul.setAttribute("class", "list-group list-group-flush");
			var li1 = document.createElement("li");
			li1.setAttribute("class", "list-group-item");
			li1.innerHTML = "Previous Air Density";
			var li2 = document.createElement("li");
			li2.setAttribute("class", "list-group-item");
			var prevAirDensity = document.createElement("input");
			prevAirDensity.setAttribute("class", "form-control");
			prevAirDensity.setAttribute("type", "text");
			prevAirDensity.setAttribute("id", "prevAirDensity");
			prevAirDensity.setAttribute("name", "prevAirDensity");
			prevAirDensity.setAttribute("tabindex", "-1");
			prevAirDensity.setAttribute(
				"style",
				"background-color: #F1C40F; 1;border-radius:5px"
			);

			li2.appendChild(prevAirDensity);
			ul.appendChild(li1);
			ul.appendChild(li2);
			firstDivInside.appendChild(ul);

			var ul = document.createElement("ul");
			ul.setAttribute("class", "list-group list-group-flush");
			var li1 = document.createElement("li");
			li1.setAttribute("class", "list-group-item");
			li1.innerHTML = "K";
			var li2 = document.createElement("li");
			li2.setAttribute("class", "list-group-item");
			var k = document.createElement("input");
			k.setAttribute("class", "form-control");
			k.setAttribute("type", "text");
			k.setAttribute("id", "k");
			k.setAttribute("name", "k");
			k.setAttribute("tabindex", "-1");
			k.setAttribute("value", "2");
			k.setAttribute(
				"style",
				"background-color: #F1C40F;border-radius:5px"
			);

			li2.appendChild(k);
			ul.appendChild(li1);
			ul.appendChild(li2);
			firstDivInside.appendChild(ul);

			var ul = document.createElement("ul");
			ul.setAttribute("class", "list-group list-group-flush");
			var li1 = document.createElement("li");
			li1.setAttribute("class", "list-group-item");
			li1.innerHTML = "SC";
			var li2 = document.createElement("li");
			li2.setAttribute("class", "list-group-item");
			var sc = document.createElement("input");
			sc.setAttribute("class", "form-control");
			sc.setAttribute("type", "text");
			sc.setAttribute("id", "sc");
			sc.setAttribute("name", "sc");
			sc.setAttribute("tabindex", "-1");
			sc.setAttribute("value", "1");
			sc.setAttribute(
				"style",
				"background-color:#F1C40F;border-radius:5px"
			);

			li2.appendChild(sc);
			ul.appendChild(li1);
			ul.appendChild(li2);
			firstDivInside.appendChild(ul);

			container.appendChild(firstDivInside);
		//firstDiv
		//secondDiv
			var secondDivInside = document.createElement("div");
			secondDivInside.setAttribute(
				"style",
				"display:flex;flex-direction: row;margin-bottom:5px;display:flex;justify-content:space-around;align-items:center"
			);

			var div1 = document.createElement("div");
			div1.setAttribute(
				"style",
				"margin-bottom:20px;display:flex;justify-content:center"
			);

			var table = document.createElement("table");
			var tbody = document.createElement("tbody");

			var tr = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var td4 = document.createElement("td");
			td2.innerHTML = "Material";
			td3.innerHTML = "Density(kg/m3)";
			td4.innerHTML = "Uncertainty of Density";
			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tr.appendChild(td4);
			tbody.appendChild(tr);

			var tr = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var td4 = document.createElement("td");
			var select = document.createElement("select");
			td1.innerHTML = "Sample: ";
			select.setAttribute("class", "form-control");
			select.setAttribute("id", "sampleSelected");
			select.setAttribute('onchange',"densityUncertaintySample("+numberOfTables+",this.value)");

			<?php
				echo "var tdNewDensityOptionChoose = document.createElement('option');tdNewDensityOptionChoose.setAttribute('selected','');tdNewDensityOptionChoose.innerHTML = 'Choose';select.appendChild(tdNewDensityOptionChoose);";
				for($alloyLoop = 0; $alloyLoop < count($alloyDetails[0]); $alloyLoop++){
					echo 'var tdNewDensityOption'.$alloyLoop.'= document.createElement("option");';
					echo 'tdNewDensityOption'.$alloyLoop.'.setAttribute("value","'.$alloyDetails[0][$alloyLoop]['density'].','.$alloyDetails[0][$alloyLoop]['uncertainty'].','.$alloyDetails[0][$alloyLoop]['material'].'");';
					echo 'tdNewDensityOption'.$alloyLoop.'.innerHTML ="'.$alloyDetails[0][$alloyLoop]['material'].'";';
					echo 'select.appendChild(tdNewDensityOption'.$alloyLoop.');';
				}
			?>

			var densitySample = document.createElement("input");
			densitySample.setAttribute("class", "form-control");
			densitySample.setAttribute("type", "text");
			densitySample.setAttribute("id", "densitySample");
			densitySample.setAttribute("name", "densitySample");
			densitySample.setAttribute("tabindex", "-1");
			densitySample.setAttribute(
				"style",
				"background-color:#F1C40F;border-radius:5px"
			);
			var uncertDensitySample = document.createElement("input");
			uncertDensitySample.setAttribute("class", "form-control");
			uncertDensitySample.setAttribute("type", "text");
			uncertDensitySample.setAttribute("id", "uncertDensitySample");
			uncertDensitySample.setAttribute("name", "uncertDensitySample");
			uncertDensitySample.setAttribute("tabindex", "-1");
			uncertDensitySample.setAttribute(
				"style",
				"background-color:#F1C40F;border-radius:5px"
			);

			td2.appendChild(select);
			td3.appendChild(densitySample);
			td4.appendChild(uncertDensitySample);
			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tr.appendChild(td4);
			tbody.appendChild(tr);

			var tr = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var td4 = document.createElement("td");
			var select = document.createElement("select");
			td1.innerHTML = "Reference: ";
			select.setAttribute("class", "form-control");
			select.setAttribute("id", "referenceSelected");
			select.setAttribute('onchange',"densityUncertaintyReference("+numberOfTables+",this.value)");
			<?php
				echo "var tdNewDensityOptionChoose = document.createElement('option');tdNewDensityOptionChoose.setAttribute('selected','');tdNewDensityOptionChoose.innerHTML = 'Choose';select.appendChild(tdNewDensityOptionChoose);";
				for($alloyLoop = 0; $alloyLoop < count($alloyDetails[0]); $alloyLoop++){
					echo 'var tdNewDensityOption'.$alloyLoop.'= document.createElement("option");';
					echo 'tdNewDensityOption'.$alloyLoop.'.setAttribute("value","'.$alloyDetails[0][$alloyLoop]['density'].','.$alloyDetails[0][$alloyLoop]['uncertainty'].','.$alloyDetails[0][$alloyLoop]['material'].'");';
					echo 'tdNewDensityOption'.$alloyLoop.'.innerHTML ="'.$alloyDetails[0][$alloyLoop]['material'].'";';
					echo 'select.appendChild(tdNewDensityOption'.$alloyLoop.');';
				}
			?>

			var densityReference = document.createElement("input");
			densityReference.setAttribute("class", "form-control");
			densityReference.setAttribute("type", "text");
			densityReference.setAttribute("id", "densityReference");
			densityReference.setAttribute("name", "densityReference");
			densityReference.setAttribute("tabindex", "-1");
			densityReference.setAttribute(
				"style",
				"background-color:#F1C40F;border-radius:5px"
			);
			var uncertDensityReference = document.createElement("input");
			uncertDensityReference.setAttribute("class", "form-control");
			uncertDensityReference.setAttribute("type", "text");
			uncertDensityReference.setAttribute("id", "uncertDensityReference");
			uncertDensityReference.setAttribute("name", "uncertDensityReference");
			uncertDensityReference.setAttribute("tabindex", "-1");
			uncertDensityReference.setAttribute(
				"style",
				"background-color:#F1C40F;border-radius:5px"
			);

			td2.appendChild(select);
			td3.appendChild(densityReference);
			td4.appendChild(uncertDensityReference);
			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tr.appendChild(td4);
			tbody.appendChild(tr);

			var div2 = document.createElement("div");
			div2.setAttribute(
				"style",
				"margin-bottom:20px;display:flex;justify-content:center"
			);

			var ul = document.createElement("ul");
			ul.setAttribute("class", "list-group list-group-flush");
			var li1 = document.createElement("li");
			li1.setAttribute("class", "list-group-item");
			li1.innerHTML = "Comparator:";
			var li2 = document.createElement("li");
			li2.setAttribute("class", "list-group-item");
			var select = document.createElement("select");
			var option1 = document.createElement("option");

			select.setAttribute ('class','form-control');
			select.setAttribute('id','comparator');
			select.setAttribute('onchange','setBalanceReso("Table'+numberOfTables+'")');
			option1.setAttribute('selected','');
			option1.innerHTML = "Choose...";
			select.appendChild(option1);
			for (let i = 0; i < sensitivityTest[0].length; i++) {
				var option = document.createElement("option");
				option.setAttribute('value',sensitivityTest[0][i]['balance']);	
				option.innerHTML = sensitivityTest[0][i]['balance'];
				select.appendChild(option);
			}
			li2.appendChild(select);
			ul.appendChild(li1);
			ul.appendChild(li2);
			div2.appendChild(ul);

			var ul = document.createElement("ul");
			ul.setAttribute("class", "list-group list-group-flush");
			var li1 = document.createElement("li");
			li1.setAttribute("class", "list-group-item");
			li1.innerHTML = "Balance Resolution";
			var li2 = document.createElement("li");
			li2.setAttribute("class", "list-group-item");
			var balanceReso = document.createElement("input");
			balanceReso.setAttribute("class", "form-control");
			balanceReso.setAttribute("type", "text");
			balanceReso.setAttribute("id", "balanceReso");
			balanceReso.setAttribute("name", "balanceReso");
			balanceReso.setAttribute("tabindex", "-1");
			balanceReso.setAttribute(
				"style",
				"background-color:#F1C40F;border-radius:5px"
			);

			li2.appendChild(balanceReso);
			ul.appendChild(li1);
			ul.appendChild(li2);
			div2.appendChild(ul);

			table.appendChild(tbody);
			div1.appendChild(table);
			secondDivInside.appendChild(div1);
			secondDivInside.appendChild(div2);
			container.appendChild(secondDivInside);

		//secondDiv
		//thirdDiv
			var thirdDivInside = document.createElement("div");
			thirdDivInside.setAttribute(
				"style",
				"margin-bottom:5px;display:flex;justify-content:center"
			);

			var div1 = document.createElement("div");
			div1.setAttribute("class","input-group mb-3");
			var div2 = document.createElement("div");
			div2.setAttribute("class","input-group-prepend");
			var span = document.createElement("span");
			span.setAttribute("class","input-group-text");
			span.innerHTML = "Sample:"
			div2.appendChild(span);
			var input1 = document.createElement("input");
			input1.setAttribute("type","text");
			input1.setAttribute("class","form-control");
			input1.setAttribute("id","SampleNominalValue");
			input1.setAttribute("placeholder","Nominal Value");
			input1.setAttribute("onchange","setBalanceReso('Table"+numberOfTables+"')");
			var select = document.createElement("select");
			var option2 = document.createElement("option");
			var option3 = document.createElement("option");
			var option4 = document.createElement("option");
			option2.setAttribute('value','mg');
			option3.setAttribute('value','g');
			option4.setAttribute('value','kg');
			option2.innerHTML = "mg"
			option3.innerHTML = "g"
			option4.innerHTML = "kg"
			select.setAttribute("class","form-control input-group-append");
			select.setAttribute("id","SampleNominalUnit");
			select.setAttribute("onchange","setBalanceReso('Table"+numberOfTables+"');getWeight("+numberOfTables+")");
			var input2 = document.createElement("input");
			input2.setAttribute("type","text");
			input2.setAttribute("class","form-control");
			input2.setAttribute("id","SampleMarking");
			input2.setAttribute("placeholder","Marking");
			var input3 = document.createElement("input");
			input3.setAttribute("type","text");
			input3.setAttribute("hidden","");
			input3.setAttribute("class","form-control");
			input3.setAttribute("id","SampleSerialNumber");
			input3.setAttribute("placeholder","Serial Number");
			var input4 = document.createElement("input");
			input4.setAttribute("type","text");
			input4.setAttribute("hidden","");
			input4.setAttribute("class","form-control");
			input4.setAttribute("id","SampleIdNumber");
			input4.setAttribute("placeholder","Identification Number");
			var input5 = document.createElement("input");
			input5.setAttribute("type","text");
			input5.setAttribute("hidden","");
			input5.setAttribute("class","form-control");
			input5.setAttribute("id","SampleManufacturer");
			input5.setAttribute("placeholder","Manufacturer");


			select.appendChild(option2);
			select.appendChild(option3);
			select.appendChild(option4);
			div1.appendChild(div2);
			div1.appendChild(input1);
			div1.appendChild(select);
			div1.appendChild(input2);
			div1.appendChild(input3);
			div1.appendChild(input4);
			div1.appendChild(input5);

			thirdDivInside.appendChild(div1);

			container.appendChild(thirdDivInside);
		//thirdDiv
		//fourthDiv
			var fourthDivInside = document.createElement("div");
			fourthDivInside.setAttribute(
				"style",
				"display:flex;flex-direction: row;margin-bottom:5px;display:flex;justify-content:space-around;align-items:center"
			);

			var div = document.createElement("div");
			div.setAttribute(
				"style",
				"margin-bottom:20px;display:flex;justify-content:center"
			);

			var table = document.createElement("table");
			var tbody = document.createElement("tbody");

			var tr = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			td2.innerHTML = "Start";
			td3.innerHTML = "Finish";
			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tbody.appendChild(tr);

			var tr = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var input1 = document.createElement("input");
			var input2 = document.createElement("input");
			input1.setAttribute('id','TemperatureStart');
			input1.setAttribute('style','border-radius:5px');
			input1.setAttribute('type','text');
			input1.setAttribute('class','form-control');
			input2.setAttribute('id','TemperatureFinish');
			input2.setAttribute('style','border-radius:5px');
			input2.setAttribute('type','text');
			input2.setAttribute('class','form-control');
			td1.innerHTML = "Temparature (C):";
			td2.appendChild(input1);
			td3.appendChild(input2);
			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tbody.appendChild(tr);

			var tr = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var input1 = document.createElement("input");
			var input2 = document.createElement("input");
			input1.setAttribute('id','HumidityStart');
			input1.setAttribute('style','border-radius:5px');
			input1.setAttribute('type','text');
			input1.setAttribute('class','form-control');
			input2.setAttribute('id','HumidityFinish');
			input2.setAttribute('style','border-radius:5px');
			input2.setAttribute('type','text');
			input2.setAttribute('class','form-control');
			td1.innerHTML = "Humidity (%RH):";
			td2.appendChild(input1);
			td3.appendChild(input2);
			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tbody.appendChild(tr);

			var tr = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var input1 = document.createElement("input");
			var input2 = document.createElement("input");
			input1.setAttribute('id','PressureStart');
			input1.setAttribute('style','border-radius:5px');
			input1.setAttribute('type','text');
			input1.setAttribute('class','form-control');
			input2.setAttribute('id','PressureFinish');
			input2.setAttribute('style','border-radius:5px');
			input2.setAttribute('type','text');
			input2.setAttribute('class','form-control');
			td1.innerHTML = "Pressure (hPa):";
			td2.appendChild(input1);
			td3.appendChild(input2);
			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tbody.appendChild(tr);

			table.appendChild(tbody);
			div.appendChild(table)
			fourthDivInside.appendChild(div);
			container.appendChild(fourthDivInside);

			var div = document.createElement("div");
			div.setAttribute(
				"style",
				"margin-bottom:20px;display:flex;justify-content:center"
			);

			var table = document.createElement("table");
			var thead = document.createElement("thead");
			var tbody = document.createElement("tbody");

			var tr = document.createElement("tr");
			tr.setAttribute('style','text-align:center');
			var th = document.createElement("th");
			th.setAttribute('col','3');
			th.innerHTML = '<h4>Standard Used</h4>';
			tr.appendChild(th);
			thead.appendChild(tr);

			var tr = document.createElement("tr");
			var th1 = document.createElement("th");
			var th2 = document.createElement("th");
			var th3 = document.createElement("th");
			var th4 = document.createElement("th");
			th1.innerHTML = 'Std. Code';
			th2.innerHTML = 'Conventional Mass';
			th3.innerHTML = 'Uncertainty of Measurement (mg)';
			th4.innerHTML = '1/3 of MPE of Standard (mg converted to g)';
			tr.appendChild(th1);
			tr.appendChild(th2);
			tr.appendChild(th3);
			thead.appendChild(tr);
			table.appendChild(thead);

			var tr = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var select = document.createElement("select");
			var option = document.createElement("option");
			select.setAttribute('class','form-control');
			select.setAttribute('id','STDa'+numberOfTables);
			// select.setAttribute('onchange',"standardChangeToInput(this.value,'ConventionalMassSTDa"+numberOfTables+"','UncertaintySTDa"+numberOfTables+"');totalConventionalUncertainty('"+numberOfTables+"')");
			select.setAttribute('onchange',"selectMPE(this.id,'MPESTDa"+numberOfTables+"');getStandardDetails(this,"+numberOfTables+");standardChangeToInput(this.value,'ConventionalMassSTDa"+numberOfTables+"','UncertaintySTDa"+numberOfTables+"');totalConventionalUncertainty('"+numberOfTables+"')");
			option.setAttribute('value', ',,');
			option.innerHTML = "Choose...";
			var input1 = document.createElement("input");
			input1.setAttribute('id','ConventionalMassSTDa'+numberOfTables);
			input1.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input1.setAttribute('type','text');
			input1.setAttribute('class','form-control');
			input1.setAttribute('tabindex','-1');
			var input2 = document.createElement("input");
			input2.setAttribute('id','UncertaintySTDa'+numberOfTables);
			input2.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input2.setAttribute('type','text');
			input2.setAttribute('class','form-control');
			input2.setAttribute('tabindex','-1');

			var td4 = document.createElement("td");
			var input3 = document.createElement("input");
			input3.setAttribute('id','MPESTDa'+numberOfTables);
			input3.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input3.setAttribute('type','hidden');
			input3.setAttribute('class','form-control');
			input3.setAttribute('tabindex','-1');

			select.appendChild(option);
			td1.appendChild(select);
			td2.appendChild(input1);
			td3.appendChild(input2);
			td4.appendChild(input3);

			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tr.appendChild(td4);
			tbody.appendChild(tr);
			table.appendChild(tbody);

			var tr = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var select = document.createElement("select");
			var option = document.createElement("option");
			select.setAttribute('class','form-control');
			select.setAttribute('id','STDb'+numberOfTables);
			select.setAttribute('onchange',"selectMPE(this.id,'MPESTDb"+numberOfTables+"');standardChangeToInput(this.value,'ConventionalMassSTDb"+numberOfTables+"','UncertaintySTDb"+numberOfTables+"');totalConventionalUncertainty('"+numberOfTables+"')");
			option.setAttribute('value',',,');
			option.innerHTML = "Choose...";
			var input1 = document.createElement("input");
			input1.setAttribute('id','ConventionalMassSTDb'+numberOfTables);
			input1.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input1.setAttribute('type','text');
			input1.setAttribute('class','form-control');
			input1.setAttribute('tabindex','-1');
			var input2 = document.createElement("input");
			input2.setAttribute('id','UncertaintySTDb'+numberOfTables);
			input2.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input2.setAttribute('type','text');
			input2.setAttribute('class','form-control');
			input2.setAttribute('tabindex','-1');

			var td4 = document.createElement("td");
			var input3 = document.createElement("input");
			input3.setAttribute('id','MPESTDb'+numberOfTables);
			input3.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input3.setAttribute('type','hidden');
			input3.setAttribute('class','form-control');
			input3.setAttribute('tabindex','-1');
			
			select.appendChild(option);
			td1.appendChild(select);
			td2.appendChild(input1);
			td3.appendChild(input2);
			td4.appendChild(input3);

			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tr.appendChild(td4);
			tbody.appendChild(tr);
			table.appendChild(tbody);

			var tr = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var select = document.createElement("select");
			var option = document.createElement("option");
			select.setAttribute('class','form-control');
			select.setAttribute('id','STDc'+numberOfTables);
			select.setAttribute('onchange',"selectMPE(this.id,'MPESTDc"+numberOfTables+"');standardChangeToInput(this.value,'ConventionalMassSTDc"+numberOfTables+"','UncertaintySTDc"+numberOfTables+"');totalConventionalUncertainty('"+numberOfTables+"')");
			option.setAttribute('value',',,');
			option.innerHTML = "Choose...";
			var input1 = document.createElement("input");
			input1.setAttribute('id','ConventionalMassSTDc'+numberOfTables);
			input1.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input1.setAttribute('type','text');
			input1.setAttribute('class','form-control');
			input1.setAttribute('tabindex','-1');
			var input2 = document.createElement("input");
			input2.setAttribute('id','UncertaintySTDc'+numberOfTables);
			input2.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input2.setAttribute('type','text');
			input2.setAttribute('class','form-control');
			input2.setAttribute('tabindex','-1');
			var td4 = document.createElement("td");
			var input3 = document.createElement("input");
			input3.setAttribute('id','MPESTDc'+numberOfTables);
			input3.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input3.setAttribute('type','hidden');
			input3.setAttribute('class','form-control');
			input3.setAttribute('tabindex','-1');

			select.appendChild(option);
			td1.appendChild(select);
			td2.appendChild(input1);
			td3.appendChild(input2);
			td4.appendChild(input3);

			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tr.appendChild(td4);
			tbody.appendChild(tr);
			table.appendChild(tbody);

			var tr = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var select = document.createElement("select");
			var option = document.createElement("option");
			select.setAttribute('class','form-control');
			select.setAttribute('id','STDd'+numberOfTables);
			select.setAttribute('onchange',"selectMPE(this.id,'MPESTDd"+numberOfTables+"');standardChangeToInput(this.value,'ConventionalMassSTDd"+numberOfTables+"','UncertaintySTDd"+numberOfTables+"');totalConventionalUncertainty('"+numberOfTables+"')");
			option.setAttribute('value',',,');
			option.innerHTML = "Choose...";
			var input1 = document.createElement("input");
			input1.setAttribute('id','ConventionalMassSTDd'+numberOfTables);
			input1.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input1.setAttribute('type','text');
			input1.setAttribute('class','form-control');
			input1.setAttribute('tabindex','-1');
			var input2 = document.createElement("input");
			input2.setAttribute('id','UncertaintySTDd'+numberOfTables);
			input2.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input2.setAttribute('type','text');
			input2.setAttribute('class','form-control');
			input2.setAttribute('tabindex','-1');
			var td4 = document.createElement("td");
			var input3 = document.createElement("input");
			input3.setAttribute('id','MPESTDd'+numberOfTables);
			input3.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input3.setAttribute('type','hidden');
			input3.setAttribute('class','form-control');
			input3.setAttribute('tabindex','-1');

			select.appendChild(option);
			td1.appendChild(select);
			td2.appendChild(input1);
			td3.appendChild(input2);
			td4.appendChild(input3);

			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tr.appendChild(td4);
			tbody.appendChild(tr);
			table.appendChild(tbody);

			var tr = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var select = document.createElement("select");
			var option = document.createElement("option");
			select.setAttribute('class','form-control');
			select.setAttribute('id','STDe'+numberOfTables);
			select.setAttribute('onchange',"selectMPE(this.id,'MPESTDe"+numberOfTables+"');standardChangeToInput(this.value,'ConventionalMassSTDe"+numberOfTables+"','UncertaintySTDe"+numberOfTables+"');totalConventionalUncertainty('"+numberOfTables+"')");
			option.setAttribute('value',',,');
			option.innerHTML = "Choose...";
			var input1 = document.createElement("input");
			input1.setAttribute('id','ConventionalMassSTDe'+numberOfTables);
			input1.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input1.setAttribute('type','text');
			input1.setAttribute('class','form-control');
			input1.setAttribute('tabindex','-1');
			var input2 = document.createElement("input");
			input2.setAttribute('id','UncertaintySTDe'+numberOfTables);
			input2.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input2.setAttribute('type','text');
			input2.setAttribute('class','form-control');
			input2.setAttribute('tabindex','-1');
			var td4 = document.createElement("td");
			var input3 = document.createElement("input");
			input3.setAttribute('id','MPESTDe'+numberOfTables);
			input3.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input3.setAttribute('type','hidden');
			input3.setAttribute('class','form-control');
			input3.setAttribute('tabindex','-1');


			select.appendChild(option);
			td1.appendChild(select);
			td2.appendChild(input1);
			td3.appendChild(input2);
			td4.appendChild(input3);

			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tr.appendChild(td4);
			tbody.appendChild(tr);
			table.appendChild(tbody);

			var tr = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			td1.innerHTML = "Total";
			var input1 = document.createElement("input");
			input1.setAttribute('id','ConventionalMassTotal'+numberOfTables);
			input1.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input1.setAttribute('type','text');
			input1.setAttribute('class','form-control');
			input1.setAttribute('tabindex','-1');
			var input2 = document.createElement("input");
			input2.setAttribute('id','UncertaintySTDTotal'+numberOfTables);
			input2.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input2.setAttribute('type','text');
			input2.setAttribute('class','form-control');
			input2.setAttribute('tabindex','-1');
			var td4 = document.createElement("td");
			var input3 = document.createElement("input");
			input3.setAttribute('id','MPESTDTotal'+numberOfTables);
			input3.setAttribute('style','background-color:#F1C40F;border-radius:5px');
			input3.setAttribute('type','hidden');
			input3.setAttribute('class','form-control');
			input3.setAttribute('tabindex','-1');

			td2.appendChild(input1);
			td3.appendChild(input2);
			td4.appendChild(input3);

			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tr.appendChild(td4);
			tbody.appendChild(tr);
			table.appendChild(tbody);

			div.appendChild(table)
			fourthDivInside.appendChild(div);
			container.appendChild(fourthDivInside);

		//fourthDiv
		//fifthDiv
			var fifthDivInside = document.createElement("div");
			fifthDivInside.setAttribute(
				"style",
				"margin-bottom:50px;display:flex;justify-content:center"
			);
			var table = document.createElement("table");
			var tbody = document.createElement("tbody");
			tbody.setAttribute('id','cycleTable'+numberOfTables);
			var tr = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var td4 = document.createElement("td");
			var td5 = document.createElement("td");
			var tdEnd = document.createElement("td");
			var tdFront = document.createElement("td");

			var hiddenInput1 = document.createElement("input");
			var hiddenInput2 = document.createElement("input");
			var hiddenInput3 = document.createElement("input");
			var hiddenInput4 = document.createElement("input");


			var select = document.createElement('select');
			var option1 = document.createElement('option');
			var option2 = document.createElement('option');
			var option3 = document.createElement('option');
			select.setAttribute('id','unitRawData');
			option2.setAttribute('selected','');
			option1.setAttribute('value','mg');
			option2.setAttribute('value','g');
			option3.setAttribute('value','kg');
			option1.innerHTML = "mg";
			option2.innerHTML = "g";
			option3.innerHTML = "kg";
			hiddenInput1.setAttribute("type",'hidden');
			hiddenInput1.setAttribute("id",'StandardIdNumber');
			hiddenInput2.setAttribute("type",'hidden');
			hiddenInput2.setAttribute("id",'StandardSerialNumber');
			hiddenInput3.setAttribute("type",'hidden');
			hiddenInput3.setAttribute("id",'StandardNominalValue');
			hiddenInput4.setAttribute("type",'hidden');
			hiddenInput4.setAttribute("id",'StandardNominalUnit');

			select.appendChild(option1);
			select.appendChild(option2);
			select.appendChild(option3);

			td1.setAttribute('style','width:50px');
			td1.appendChild(select);
			td2.innerHTML = 'A1';
			td3.innerHTML = 'B1';
			td4.innerHTML = 'B2';
			td5.innerHTML = 'A2';

			tr.appendChild(tdFront);
			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tr.appendChild(td4);
			tr.appendChild(td5);
			tr.appendChild(tdEnd);
			tbody.appendChild(tr);
			table.appendChild(tbody);
			fifthDivInside.appendChild(table);
			fifthDivInside.appendChild(hiddenInput1);
			fifthDivInside.appendChild(hiddenInput2);
			fifthDivInside.appendChild(hiddenInput3);
			fifthDivInside.appendChild(hiddenInput4);
			container.appendChild(fifthDivInside);
		//fifthDiv
		//sixthDIv
			let headers = [
				"Nominal Mass",
				"m<sub>s</sub>",
				"u<sub>ms</sub>",
				"ΔI",
				"u<sub>ΔI</sub>",
				"u<sub>d</sub>",
				"ρ<sub>a</sub>",
				"ρ<sub>0</sub>",
				"u<sub>ρuuc</sub>",
				"u<sub>ρstd</sub>",
				"u<sub>ρa</sub>",
				"u<sub>b<sup>2</sup></sub>",
				"u(m<sub>cr</sub>)",
				"u<sub>w</sub>(Δm<sub>c</sub>)",
				"u<sub>ba</sub>",
				"u<sub>c</sub>",
                "k",
				"U",
				"Unit",
			];
			
			var sixthDivInside = document.createElement("div");
			sixthDivInside.setAttribute(
				"style",
				""
			);
			sixthDivInside.setAttribute(
				"class",
				"table-responsive hidden"
			);
			let uncertBalanceTable = document.createElement("table");
			let uncertBalanceTableTbody = document.createElement("tbody");
			uncertBalanceTable.setAttribute('class', 'table');
			uncertBalanceTableTbody.setAttribute('id','uncertBalanceTBody')
			let uncertBalanceTableTbodytr = document.createElement("tr");
			for (let i = 0; i < headers.length; i++) {
				let uncertBalanceTableTbodytd = document.createElement("td");
				uncertBalanceTableTbodytd.innerHTML = headers[i];
				uncertBalanceTableTbodytr.append(uncertBalanceTableTbodytd);
			}
			uncertBalanceTableTbody.append(uncertBalanceTableTbodytr);
			uncertBalanceTable.append(uncertBalanceTableTbody);
			sixthDivInside.appendChild(uncertBalanceTable);
			container.appendChild(sixthDivInside);
		//sixthDIv
		MainDiv.appendChild(FirstP);
		MainDiv.appendChild(container);
		addCycleToFirstTable(approxClass, numberOfTables);
		getWeight(numberOfTables,',,',',,',',,',',,',',,');
		
	}

	var addDataArray = [<?= json_encode($addDataArray)?>];
	for(var x = 1	; x <= Object.keys(addDataArray[0]).length; x++ ){
		addAnotherInfo(
			addDataArray[0]["Table"+(x)]['densitySample']['value'],
			addDataArray[0]["Table"+(x)]['densityReference']['value'],
			addDataArray[0]["Table"+(x)]['uncertDensitySample']['value'],
			addDataArray[0]["Table"+(x)]['uncertDensityReference']['value'],
			addDataArray[0]["Table"+(x)]['prevAirDensity']['value'],
			addDataArray[0]["Table"+(x)]['k']['value'],
			addDataArray[0]["Table"+(x)]['balanceReso']['value'],
			addDataArray[0]["Table"+(x)]['sc']['value'],
			addDataArray[0]["Table"+(x)]['comparator']['value'],
			
			addDataArray[0]["Table"+(x)]['SampleNominalValue']['value'],
			addDataArray[0]["Table"+(x)]['SampleNominalUnit']['value'],
			addDataArray[0]["Table"+(x)]['SampleMarking']['value'],
			addDataArray[0]["Table"+(x)]['SampleSerialNumber']['value'],
			addDataArray[0]["Table"+(x)]['SampleIdNumber']['value'],
			addDataArray[0]["Table"+(x)]['SampleManufacturer']['value'],
			addDataArray[0]["Table"+(x)]['TemperatureStart']['value'],
			addDataArray[0]["Table"+(x)]['TemperatureFinish']['value'],
			addDataArray[0]["Table"+(x)]['HumidityStart']['value'],
			addDataArray[0]["Table"+(x)]['HumidityFinish']['value'],
			addDataArray[0]["Table"+(x)]['PressureStart']['value'],
			addDataArray[0]["Table"+(x)]['PressureFinish']['value'],
			addDataArray[0]["Table"+(x)]['STDa'+(x)]['value'],
			addDataArray[0]["Table"+(x)]['ConventionalMassSTDa'+(x)]['value'],
			addDataArray[0]["Table"+(x)]['UncertaintySTDa'+(x)]['value'],
			addDataArray[0]["Table"+(x)]['STDb'+(x)]['value'],
			addDataArray[0]["Table"+(x)]['ConventionalMassSTDb'+(x)]['value'],
			addDataArray[0]["Table"+(x)]['UncertaintySTDb'+(x)]['value'],
			addDataArray[0]["Table"+(x)]['STDc'+(x)]['value'],
			addDataArray[0]["Table"+(x)]['ConventionalMassSTDc'+(x)]['value'],
			addDataArray[0]["Table"+(x)]['UncertaintySTDc'+(x)]['value'],
			addDataArray[0]["Table"+(x)]['STDd'+(x)]['value'],
			addDataArray[0]["Table"+(x)]['ConventionalMassSTDd'+(x)]['value'],
			addDataArray[0]["Table"+(x)]['UncertaintySTDd'+(x)]['value'],
			addDataArray[0]["Table"+(x)]['STDe'+(x)]['value'],
			addDataArray[0]["Table"+(x)]['ConventionalMassSTDe'+(x)]['value'],
			addDataArray[0]["Table"+(x)]['UncertaintySTDe'+(x)]['value'],
			addDataArray[0]["Table"+(x)]['ConventionalMassTotal'+(x)]['value'],
			addDataArray[0]["Table"+(x)]['UncertaintySTDTotal'+(x)]['value'],

			addDataArray[0]["Table"+(x)]['MPESTDa'+(x)]['value'],
			addDataArray[0]["Table"+(x)]['MPESTDb'+(x)]['value'],
			addDataArray[0]["Table"+(x)]['MPESTDc'+(x)]['value'],
			addDataArray[0]["Table"+(x)]['MPESTDd'+(x)]['value'],
			addDataArray[0]["Table"+(x)]['MPESTDe'+(x)]['value'],
			addDataArray[0]["Table"+(x)]['MPESTDTotal'+(x)]['value'],

			addDataArray[0]["Table"+(x)]['sampleSelected']['value'],
			addDataArray[0]["Table"+(x)]['referenceSelected']['value'],
			
			addDataArray[0]["Table"+(x)],
		)
		
		var tableName = document.getElementById('cycleTable'+x);
		var approxClass = document.getElementById('approxClass').value;
		var cycleCount = document.getElementById('cycle').value;
			for (var i = 1; i <= cycleCount; i++) {
		 		var cycle = addCycles(i,addDataArray[0]["Table"+(x)]['Sa'+i]['value'],addDataArray[0]["Table"+(x)]['Tb'+i]['value'],addDataArray[0]["Table"+(x)]['Tc'+i]['value'],addDataArray[0]["Table"+(x)]['Sd'+i]['value'])
				tableName.appendChild(cycle)
            }
		// if(approxClass == 'E2' || approxClass == 'F1'){
		// 	for(var i = 1; i <= 5 ; i++ ){
		// 		var cycle = addCycles(i,addDataArray[0]["Table"+(x)]['Sa'+i]['value'],addDataArray[0]["Table"+(x)]['Tb'+i]['value'],addDataArray[0]["Table"+(x)]['Tc'+i]['value'],addDataArray[0]["Table"+(x)]['Sd'+i]['value'])
		// 		tableName.appendChild(cycle)
		// 	}
		// }else{
		// 	for(var i = 1; i <= 3 ; i++ ){
		// 		var cycle = addCycles(i,addDataArray[0]["Table"+(x)]['Sa'+i]['value'],addDataArray[0]["Table"+(x)]['Tb'+i]['value'],addDataArray[0]["Table"+(x)]['Tc'+i]['value'],addDataArray[0]["Table"+(x)]['Sd'+i]['value'])
		// 		tableName.appendChild(cycle)
		// 	}
		// }
		
	}

	function deleteTable(){
		var tablediv = document.getElementById('TableDiv');
		for (let index = 0; index < 2; index++) {
			var lastChild = tablediv.lastElementChild;
			tablediv.removeChild(lastChild);
		}
		numberOfTables -= 1;
	}

	var personnels = <?= json_encode($personnel)?>;
    var verifiers = <?= json_encode($verifier)?>;

	$(document).ready(function(){
        addPersonnel();
    });

	function addPersonnel(){
        var calibrationOfficer = document.getElementById('calibratedBy');
        var verifier = document.getElementById('encodedBy');
        var verifierPosition = document.getElementById('checkedBy');
		var selected = '<?= $testWeightData['calibratedBy']?>';
		var encodedBy = '<?= $testWeightData['encodedBy']?>';
        personnels.forEach(item => {
            var option = document.createElement('option');
            option.setAttribute('value', item.personnelName);
            option.innerHTML = item.personnelName;
			if(item.personnelName == selected){
				option.setAttribute('selected', '');
			}
            calibrationOfficer.appendChild(option);
			
        })
        verifiers.forEach(item => {
            var option = document.createElement('option');
            option.setAttribute('value', item.verifierName);
            option.setAttribute('data-verifierposition', item.verifierPosition);
			option.setAttribute('data-email', item.verifierEmail);
            option.innerHTML = item.verifierName;
			if(item.verifierName == encodedBy){
				option.setAttribute('selected', '');
			}
            verifier.appendChild(option);

            var option = document.createElement('option');
            option.setAttribute('value', item.verifierPosition);
            option.setAttribute('data-verifiername', item.verifierName);
			option.setAttribute('data-email', item.verifierEmail);
            option.innerHTML = item.verifierPosition;
			if(item.verifierName == encodedBy){
				option.setAttribute('selected', '');
			}
            verifierPosition.appendChild(option);
        })
		getEmailOfVerifier('encodedBy');
    }

	function bind(id, evt, func) {
		var el = document.getElementById(id);
		if (el.addEventListener){
			el.addEventListener(evt, func);
		} else if (el.attachEvent) {
			el.attachEvent('on' + evt, func);
		}
	}

	function bindEventsToInputAndButtons(){
        bind('encodedBy','change',function(){
            copyFromDataset('encodedBy', 'checkedBy', 'verifierposition');
			getEmailOfVerifier('encodedBy');
        });
        bind('checkedBy','change',function(){
            copyFromDataset('checkedBy', 'encodedBy', 'verifiername')
        });
	}
	bindEventsToInputAndButtons()

	function copyFromDataset(copyFrom, copyTo, datasetName){
        var from = document.getElementById(copyFrom);
        var to = document.getElementById(copyTo);
        to.value = from.selectedOptions[0].dataset[datasetName];
    }
	function getEmailOfVerifier(copyFrom){
		var from = document.getElementById(copyFrom);
		var verifierEmail = document.getElementById('verifierEmail');
		verifierEmail.value = from.selectedOptions[0].dataset['email'];
	}


</script>

<script>
	var role = '<?= $_SESSION['role'];?>';
    var page = '<?= $forVerification;?>';

	const getComment = () => {
		var hiddenComment = document.getElementById('commentHidden');
		var displayedComment = document.getElementById('displayedComment');
		hiddenComment.value = displayedComment.value
	}
    
    if(role == 'admin' && page == 'forVerification'){
        var verifyButtonDIV = document.getElementById('verifyButtonDIV');
		var correctionButtonDIV = document.getElementById('correctionButtonDIV');
		var commentDIV = document.getElementById('commentDIV');
		var hiddenComment = document.getElementById('commentHidden');
		
		var verifyButton = document.createElement('button');
		var correctionButton = document.createElement('button');
		var backButton = document.getElementById('backButton');
		var textArea = document.createElement('textarea');

		textArea.setAttribute('rows','4');
		textArea.setAttribute('cols','50');
		textArea.setAttribute('placeholder','Comments');
		textArea.setAttribute('class','mt-3');
		textArea.setAttribute('oninput', 'getComment()')
		textArea.setAttribute('id','displayedComment')

		verifyButton.setAttribute('type', 'button');
		correctionButton.setAttribute('type', 'button');
		verifyButton.setAttribute('class', 'btn btn-success mr-3');
		correctionButton.setAttribute('class', 'btn btn-danger');
		verifyButton.setAttribute('onclick', 'toggleAlert();verify("formMain")');
		correctionButton.setAttribute('onclick', 'correction()');

		backButton.setAttribute('href','/testWeightEditDataView/'+<?=$testWeightData['id']?>+'/forVerification');	

		verifyButton.innerHTML = "Verify";
		correctionButton.innerHTML = "For Correction";
		verifyButtonDIV.appendChild(verifyButton);
		correctionButtonDIV.appendChild(correctionButton);
		commentDIV.appendChild(textArea);
    } else{
		var buttonDiv = document.getElementById('forVerificationButtons');
		var updateButton = document.createElement('button');
		updateButton.setAttribute('type', 'button');
		updateButton.setAttribute('id', 'updateButton');
		updateButton.setAttribute('class', 'btn btn-lg btn-primary');
		updateButton.setAttribute('onclick', 'submitForm("testWeightForm")');
		updateButton.innerHTML = "<i class='fas fa-save'></i> Update";
		buttonDiv.appendChild(updateButton);
	}
	function verify(idOfForm){
		if(confirm("Are you sure you want to proceed?") == true){
			document.getElementById('completion').value = "For printing";
			try {
				getInputValueFromTables();
				alert('Calculation Successful');
				document.getElementById('calculateButton').setAttribute('class', 'btn btn-success');
				document.getElementById('calculateButton').setAttribute('disabled', 'true');
				document.getElementById('cancelCalculate').setAttribute('style', 'display:initial');

				document.getElementById(idOfForm).submit();
			} catch (error) {
				console.log(error);
				alert('Unable to Calculate \n'+error.message);
			}
			document.getElementById(idOfForm).submit();
        }
	}
    function correction(){
        if(confirm("Are you sure you want to proceed?") == true){
            document.correctionForm.submit();
        }
    }
</script>


        </div>
      </div>
      <!-- /#page-content-wrapper -->
    </div>
  </body>
</html>






</body>
</html>
