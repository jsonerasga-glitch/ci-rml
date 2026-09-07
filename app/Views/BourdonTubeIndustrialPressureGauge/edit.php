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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RML ++</title>	
    <style>
        <?php include 'css/bootstrap.css'; ?>
    </style>
</head>
<body style="margin: 0; padding: 0;">
    <div class="container" >
    <div class="card mt-5 text-center">
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
            <h5 class="card-title">Certificate info</h5>
    <form action="">
        <div style="">
        <table style="" class="table table-bordered">
            <tr>
                <td>Certificate No. </td>
                <td><?php echo $rml_table['ccno']?></td>
                <td>Date Received: </td>
                <td><?php echo $rml_table['datereceived']?></td>
            </tr>
            <tr>
                <td>Customer: </td>
                <td><?php echo $rml_table['costumer']?></td>
                <td>Date Calibrated: </td>
                <td><?php echo $rml_table['datecalibrated']?></td>
            </tr>
            <tr>
                <td>Address: </td>
                <td><?php echo $rml_table['address']?></td>
                <td>Recommended Due Date: </td>
                <td><?php echo $rml_table['reccduedate']?></td>
            </tr>
            <tr>
                <td>Equipment Description: </td>
                <td><?php echo $rml_table['equipment']?></td>
                <td>Place of Calibraton: </td>
                <td><?php echo $rml_table['placeofcalib']?></td>
            </tr>
            <tr>
                <td>Manufacturer: </td>
                <td><?php echo $rml_table['manufacturer']?></td>
                <td>Capacity: </td>
                <td><?php echo $rml_table['capacity']?></td>
            </tr>
            <tr>
                <td>Model No: </td>
                <td><?php echo $rml_table['modelno']?></td>
                <td>Range: </td>
                <td><?php echo $rml_table['range_range']?></td>
            </tr>
            <tr>
                <td>Serial No: </td>
                <td><?php echo $rml_table['serialno']?></td>
                <td>Resolution/Graduation: </td>
                <td><?php echo $rml_table['graduation']?></td>
            </tr>
            <tr>
                <td>Equipment ID: </td>
                <td><?php echo $rml_table['equipid']?></td>
                <td>Readability: </td>
                <td><?php echo $rml_table['readability']?></td>
            </tr>
            <tr>
                <td>Accuracy: </td>
                <td><?php echo $rml_table['accuracy']?></td>
                <td>Accuracy: </td>
                <td><?php echo $rml_table['accuracy']?></td>
            </tr>
        </table>
        <div class="row ">
            <div class="col-8"></div>
            <div class="col-4">
                <p><u><?php echo $rml_table['calibratedBy']?></u></p>
                <b>Calibration Officer</b>
            </div>
        </div>
        </form>
      <a href="<?php echo base_url('CrudController/htmlToPDF/'.$rml_table['id']) ?>" class="btn btn-primary">
        Print PDF
      </a>
        </div>
    </div>
    </div>
    <div class="text-center mt-4" style="">
        <a class="btn btn-danger" style="width:90px;" href="/table">Back</a> <br>   <br>
    </div>
    
</body>




</html>   