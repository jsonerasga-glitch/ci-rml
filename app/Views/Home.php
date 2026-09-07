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
?>

<div class="container">
	<div class="card mt-5">
		<div class="card-header">
			<!-- HEADER --> 
			<div class="row text-center mt-4">
				<div class="col-3">
					<img src="<?php echo $base64; ?>" alt="DOST LOGO" height='90px' style=" top:0"> 
				</div>
				<div class="col-6 mt-n4">
					<h6>Republic of the Philippines</h6>
					<h6>DEPARTMENT OF SCIENCE AND TECHNOLOGY</h6>
					<h6>CALABARZON</h6>
					<h6>Regional Metrology Laboratory</h6>
				</div>
				<div class="col-3">
					<img src="<?php echo $base64PAB; ?>" alt="PAB LOGO" height='90px' style="">
				</div>
			</div>
    <!-- HEADER -->	
		</div>
		<div class="card-body">
			<div class="row">
				<h5 class="text-center">RML Calibration Test <br> Bourdon Tube Industrial Pressure Gauge</h5>
			</div>
			<div class="row mt-2">
				<form action="<?= base_url('rml-store') ?>" method="POST">
					<div class='row'>
						<div class='col '>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-default">Certificate No.</span>
								<input name='certificateNumber' type="text" class="form-control text-break" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-default">Customer</span>
								<input name='customer' type="text" class="form-control text-break" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-default">Address</span>
								<textarea name='address' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" style="margin-top: 0px;margin-bottom: 0px;height: 80px;"></textarea>
							</div>
						</div>
						<div class='col '>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-default">Date Received</span>
								<input name='dateReceived' type="date" class="form-control text-break" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-default">Date Calibrated</span>
								<input name='dateCalibrated' type="date" class="form-control text-break" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-default">Recommended Due Date</span>
								<input name='recommendedDueDate' type="date" class="form-control text-break" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-default">Place of Calibration</span>
								<input name='placeOfCalibration' type="text" class="form-control text-break" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
							</div>
						</div>
					</div>
					<hr>
					<div class='row'>
						<div class='col'>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-default">Equipment Description</span>
								<input name='equipmentDescription' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-default">Manufacturer</span>
								<input name="manufacturer" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-default">Model No.</span>
								<input name='modelNumber' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-default">Serial No.</span>
								<input name='serialNumber' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-default">Equipment ID.</span>
								<input name='equipmentID' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-default">Accuracy</span>
								<input name='accuracy' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
								<span class="input-group-text" id="inputGroup-sizing-default">psi</span>
							</div>
						</div>
						<div class='col'>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-default">Capacity</span>
								<input name='capacity' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-default">Range</span>
								<input name='range' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
								<select name='measurement' class="form-select btn-outline-secondary" aria-label=".form-select-sm example">
									<option selected>Choose. . .</option>
									<option value="atm">atm</option>
									<option value="bar">bar</option>
									<option value="inH2O">inH2O</option>
									<option value="inHg">inHg</option>
									<option value="kg/cm2">kg/cm2</option>
									<option value="kPa">kPa</option>
									<option value="mbar">mbar</option>
									<option value="mH2O">mH2O</option>
									<option value="mmH2O">mmH2O</option>
									<option value="mmHG">mmHG</option>
									<option value="MPa">MPa</option>
									<option value="Pa">Pa</option>
									<option value="psi">psi</option>
								</select>
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-default">Resolution/Graduation</span>
								<input name='resolution' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-default">Readability</span>
								<input name='readability' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
							</div>
							<div class="row-2 input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-default">T<sub>amb</sub></span>
								<input name='tamb' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
								<span class="input-group-text" id="inputGroup-sizing-default">RH</span>
								<input name='rh' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
								<span class="input-group-text" id="inputGroup-sizing-default">P<sub>atm</sub></span>
								<div class='row form-control'>
									<input name='patm' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
									<span class="input-group-text" id="inputGroup-sizing-default">bar</span>
								</div>
							</div>
						</div>		
					</div>
					<hr>
					<div class='row'>
						<table class="table table-borderless">
							<thead>
								<tr>
								<th scope="col">Calibration Sequence</th>
								<th scope="col">Measurement uncertainty aimed at, in % of the measurement span</th>
								<th scope="col">No. of measurement points</th>
								<th scope="col">No. of pre-loadings</th>
								<th scope="col">Load change + waiting time </th>
								<th scope="col">Waiting time at upper limit of measurement range</th>
								<th scope="col">No. of measurement series</th>
								<th></th>
								</tr>
							</thead>
							<tbody>
								<thead>
									<tr>
										<th scope="row"></th>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<th>Up</th>
										<th>Down</th>	
									</tr>
								</thead>
								<tr>
									<th scope="row">A</th>
									<td>&lt 0,1</td>
									<td>9</td>
									<td>3</td>
									<td>&gt 30</td>
									<td>2</td>
									<td>2</td>
									<td>2</td>
								</tr>
								<tr>
									<th scope="row">B</th>
									<td>0,1 ... 0,6</td>
									<td>9</td>
									<td>1</td>
									<td>&gt 30</td>
									<td>2</td>
									<td>2</td>
									<td>1</td>
								</tr>
								<tr>
									<th scope="row">C</th>
									<td>&lt 0,6</td>
									<td>5</td>
									<td>1</td>
									<td>&gt 30</td>
									<td>2</td>
									<td>1</td>
									<td>1</td>
								</tr>
							</tbody>
						</table>
					</div>
					<hr>
					<br>
					<div class='position-relative'>
						<div class="position-absolute top-0 start-50 translate-middle">
							<h6>Preliminary Inspection</h6>
						</div>
						<br>
						<div class="start-50" style=>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="A" id="flexCheckA">
								<label class="form-check-label" for="flexCheckA">
								Visual Inspection (clean the equipment w/ soft cloth to remove dust and small particles)
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="B" id="flexCheckB">
								<label class="form-check-label" for="flexCheckB">
								Check the surface and edges of the equipment for any damages. (note in remarks)
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="C" id="flexCheckC">
								<label class="form-check-label" for="flexCheckC">
								Record all necessary and vital information
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="D" id="flexCheckD">
								<label class="form-check-label" for="flexCheckD">
								Check the protective window of the equipment for cracks/scratches, color change, and broken window
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="E" id="flexCheckE">
								<label class="form-check-label" for="flexCheckE">
								Check the thread coupling and seal of the equipment if it is in good condition
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="F" id="flexCheckF">
								<label class="form-check-label" for="flexCheckF">
								Check if the stylus or pointer move smoothly when applied with increasing and decreasing pressure
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="G" id="flexCheckG">
								<label class="form-check-label" for="flexCheckG">
								Apply increasing pressure (pre-loading) up to maximum capacity.
								</label>
							</div>
							<input name='preliminaryInspection' class="form-check-input" type="hidden" value="" id="prelimInspec">
						</div>
					</div>
					<hr>
					<br>
					<div class="position-relative">
						<div class="position-absolute top-0 start-50 translate-middle">
							<h6>Measurement Data</h6>
						</div>
						<br>

						<div class="float-end"> 
							<input type="button" value="Add Row" onclick="addRow('measurementTable')" />
							<input type="button" value="Delete Row" onclick="deleteRow('measurementTable')" />
						</div>
						
						<input name='MeasurementData' class="form-check-input" type="hidden" value="" id="measurementData">

						<table class="table " id="measurementTable">
							<thead>
								<tr>
								<th scope="col">1st Measurement Series</th>
								<th scope="col">psi</th>
								<th scope="col">2nd Measurement Series</th>
								<th scope="col">psi</th>
								<th scope="col">3rd Measurement Series</th>
								<th scope="col">psi</th>
								</tr>
								<tr>
								<th scope="col">UUC Reading</th>
								<th scope="col">STD Reading</th>
								<th scope="col">UUC Reading</th>
								<th scope="col">STD Reading</th>
								<th scope="col">UUC Reading</th>
								<th scope="col">STD Reading</th>	
								</tr>
							</thead>
							<tbody>
								
								<tr>
									<td>						
										<input type="text" class="form-control" id='uucReadingFirstRow1' oninput='SetuucReading({rowNumber:"1",value:this.value})'>
									</td>
									<td>						
										<input id='stdReadingFirstRow1'  type="text" class="form-control" >
									</td>
									<td>						
										<input type="text" class="form-control" disabled='true' id='uucReadingSecondRow1'>
									</td>
									<td>						
										<input id='stdReadingSecondRow1' type="text" class="form-control" >
									</td>
									<td>						
										<input type="text" class="form-control" disabled='true' id='uucReadingThirdRow1'>
									</td>
									<td>						
										<input id='stdReadingThirdRow1' type="text" class="form-control" >
									</td>
									
								</tr>
								
							</tbody>
						</table>
						<div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-default">h<sub>std</sub></span>
								<input name='hstd' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
								<span class="input-group-text" id="inputGroup-sizing-default">h<sub>uuc</sub></span>
								<input name='huuc' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
								<span class="input-group-text" id="inputGroup-sizing-default">Height Difference (+ when std. is higher)</span>
								<input name='heightDifference' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
								<span class="input-group-text" id="inputGroup-sizing-default">Medium</span>
								<input name='medium' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
							</div>
							<div class="input-group">
								<span class="input-group-text">Remarks</span>
								<textarea name='remarks' class="form-control" aria-label="With textarea"></textarea>
							</div>
						</div>
					</div>
					<hr>
					<br>
					<div class='position-relative'>
						<div class="position-absolute top-0 start-50 translate-middle">
							<h6>Standard Used</h6>
						</div>
						<br>
						<div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-default">Standard Description</span>
								<input name='standardDescription' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
								<span class="input-group-text" id="inputGroup-sizing-default">Manufacturer</span>
								<input name='standardManufacturer' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-default">Model No.</span>
								<input name='standardModelNumber' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
								<span class="input-group-text" id="inputGroup-sizing-default">Serial No.</span>
								<input name='standardSerialNumber' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-default">Date of Next Calibration</span>
								<input name='dateOfNextCalibration' type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text">Remarks</span>
								<textarea name='standardRemarks' class="form-control" aria-label="With textarea"></textarea>
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text">Accessories</span>
								<textarea name='standardAccessories' class="form-control" aria-label="With textarea"></textarea>
							</div>
						</div>
					</div>
					<hr>
					<div class="input-group mb-3">
						<span class="input-group-text" id="inputGroup-sizing-default">Time Started</span>
						<input name='timeStarted' type="time" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
						<span class="input-group-text" id="inputGroup-sizing-default">Time Finished</span>
						<input name='timeFinished' type="time" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text" id="inputGroup-sizing-default">Calibrated by</span>
						<input name='calibratedBy' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
						<span class="input-group-text" id="inputGroup-sizing-default">Checked by</span>
						<input name='checkedBy' type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
						<span class="input-group-text" id="inputGroup-sizing-default">Date</span>
						<input name='daten' type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
					</div>
					<br>
					<div class='position-relative'>
						<Button type='submit' class="btn btn-lg btn-primary position-absolute top-0 start-50 translate-middle" onclick='prelim();inputToArray()' >Add</Button>
					</div>
					<br>
				</form>
			</div>
		</div>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

	<script>

		var arr = [];
		var arr2;
	

		function measurementData(){
			var uuc = document.getElementById('uuc');
			var first = document.getElementById('first');
			var second = document.getElementById('second');
			var third = document.getElementById('third');
			

			arr.push({
				id:uuc.value,
				one:first.value,
				two:second.value,
				three:third.value
			});

			console.log(arr2 = btoa(JSON.stringify(arr)));
			console.log(arr);
			console.log(arr[0].id);
		}

		function decideArr(){
			console.log(JSON.parse(atob(arr2)));
		}

		function SetuucReading({rowNumber,value}){
			document.getElementById("uucReadingSecondRow"+rowNumber).value=value;
			document.getElementById("uucReadingThirdRow"+rowNumber).value=value;
		}

		function inputToArray(){
			var rowOfTable=document.getElementById('measurementTable').rows.length;
			for (let index = rowOfTable; index <= rowOfTable && index > 2; index--) {
				console.log('stdReadingFirstRow'+(index-2))
				arr.push({
					key:index-2,
					id:document.getElementById('uucReadingFirstRow'+(index-2)).value,
					one:document.getElementById('stdReadingFirstRow'+(index-2)).value,
					two:document.getElementById('stdReadingSecondRow'+(index-2)).value,
					three:document.getElementById('stdReadingThirdRow'+(index-2)).value
				});
			}
			arr2 = btoa(JSON.stringify(arr));
			document.getElementById('measurementData').value = JSON.stringify(arr);
			
		}

		function addRow(tableID) {

			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var rowNum = rowCount -1;
			var row = table.insertRow(rowCount);

			console.log(table.rows.length);
			rowOfTable = table.rows.length;

			var cell1 = row.insertCell(0);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="uucReadingFirstRow"+rowNum;
			
			element1.className="form-control";
			element1.setAttribute("oninput", 'SetuucReading({rowNumber:"'+rowNum+'",value:this.value})');
			cell1.appendChild(element1);
			
			var cell2 = row.insertCell(1);
			var element1 = document.createElement("input");
			element1.type = "text";
		
			element1.id="stdReadingFirstRow"+rowNum;
			element1.className="form-control";
			cell2.appendChild(element1);
			
			var cell3 = row.insertCell(2);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="uucReadingSecondRow"+rowNum;
			element1.className="form-control";
			element1.disabled="true"
			cell3.appendChild(element1);
			
			var cell4 = row.insertCell(3);
			var element1 = document.createElement("input");
			element1.type = "text";
			
			element1.id="stdReadingSecondRow"+rowNum;
			element1.className="form-control";
			cell4.appendChild(element1);
			
			var cell5 = row.insertCell(4);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.id="uucReadingThirdRow"+rowNum;
			element1.className="form-control";
			element1.disabled="true"
			cell5.appendChild(element1);
			
			var cell6 = row.insertCell(5);
			var element1 = document.createElement("input");
			element1.type = "text";
			
			element1.id="stdReadingThirdRow"+rowNum;
			element1.className="form-control";
			cell6.appendChild(element1);
			

		}

		function deleteRow(tableID) {
			try {
			var table = document.getElementById(tableID);
			var rowCount = table.rows.length;			
				if(rowCount==2){
					alert('No more row to delete')
				}else{
					table.deleteRow(rowCount-1);
					console.log(table.rows.length);
					rowOfTable = table.rows.length;
				}
			}catch(e) {
				alert(e);
			}
		}

		function prelim(){
			var A = document.getElementById("flexCheckA");
			var B = document.getElementById("flexCheckB");
			var C = document.getElementById("flexCheckC");
			var D = document.getElementById("flexCheckD");
			var E = document.getElementById("flexCheckE");
			var F = document.getElementById("flexCheckF");
			var G = document.getElementById("flexCheckG");
			var placeHere = document.getElementById("prelimInspec");
			var checkedBox = "";

			if(A.checked){
				checkedBox += A.value; 
				console.log(checkedBox);
			}
			if(B.checked){
				checkedBox +="0" + B.value; 
				console.log(checkedBox);
			}
			if(C.checked){
				checkedBox +="0" +  C.value; 
				console.log(checkedBox);
			}
			if(D.checked){
				checkedBox +="0" +  D.value; 
				console.log(checkedBox);
			}
			if(E.checked){
				checkedBox +="0" +  E.value; 
				console.log(checkedBox);
			}
			if(F.checked){
				checkedBox += "0" + F.value; 
				console.log(checkedBox);
			}
			if(G.checked){
				checkedBox += "0" + G.value; 
				console.log(checkedBox);
			}
			if(checkedBox.length >0){
				placeHere.value=checkedBox;
				
			}
			else{
				placeHere.value="N/A"
			}

		}
		
	</script>
	<!-- <script>
		function SetuucReading({rowNumber,value}){
			document.getElementById("uucReadingSecond"+rowNumber).value=value;
			document.getElementById("uucReadingThird"+rowNumber).value=value;
		}
	</script> -->


</body>
</html>
