<?php
                $path = 'image/dost.png';
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RML ++</title>	
    <!--style>
        <?php include 'css/bootstrap.css'; ?>
    </style-->
</head>
<body style="margin: 0; padding: 0;">
    <div class="container" >
    <form action="">
        <div class="row mt-5" style="display: flex;">
            <div class='col-md-2 '>
                <img src="<?php echo $base64; ?>" alt="" style=" height:100px; margin-top: 20px; margin-left: 350px;"> 
            </div>
            <div class='col-md-8' style="margin-left: 150px; text-align: center;">
                <p> Republic of the Philippines <br>
                Department of Science and Technology <br> 
                Calabarzon <br>
                Regional Metrology Laboratory	 <br>	<br>											
                Calibration Worksheet			<br>										
                Bourdon Tube Industrial Pressure Gauge	</p>												
            </div>
        </div>
        <div style="display: flex; text-align: center; margin-left: 350px; margin-top: 30px;">
        <table style="border-collapse: collapse; margin: 25px 0; font-size: 0.9em; min-width: 400px;">
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
        </form>
    </div>
    
</body>




</html>   