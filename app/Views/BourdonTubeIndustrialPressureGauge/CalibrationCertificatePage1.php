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
<style>
    .container{
        display: flex;
    }
    .borderYes{
        border-style: solid;
        border-width: 1px;
    }
    .padding{
        padding:10px
    }
    .head{
        flex-direction:row;
    }

    table.GeneratedTable {
  width: 100%;
  background-color: #ffffff;
  border-collapse: collapse;
  border-width: 2px;
  border-color: #c7c7c7;
  border-style: solid;
  color: #000000;
}

table.GeneratedTable td, table.GeneratedTable th {
  border-width: 2px;
  border-color: #c7c7c7;
  border-style: solid;
  padding: 3px;
}

table.GeneratedTable thead {
  background-color: #ffffff;
}
   </style>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RML ++</title>	
  
</head>
<body>
    <div class="container">
    <!-- HEADER --> 
        <div style="position:relative">
            <img src="<?php echo $base64; ?>" alt="DOST LOGO" height='90px' style="position: absolute; top:0"> 
            <p style="position: absolute; top:-10; left:80">Republic of the Philippines</p>
            <p style="position: absolute; top:8; left:80; color:blue">DEPARTMENT OF SCIENCE AND TECHNOLOGY</p>
            <p style="position: absolute; top:24; left:80">CALABARZON</p>
            <p style="position: absolute; top:40; left:80; font-weight:bold">Regional Metrology Laboratory</p>
            <img src="<?php echo $base64PAB; ?>" alt="PAB LOGO" height='90px' style="position: absolute; top:0; left:425">
        </div>
        <div style="position: absolute; top:70;">
            <hr>
            <hr>
        </div>
    <!-- HEADER -->
    <!-- Informations -->    
        <div style="position: absolute; top:90; left:23%">
            <p style='font-weight:bold;font-size:20'>CALIBRATION CERTIFICATE</p>
        </div>
        <div style="position: absolute; top:150; left:5%; font-size:9">
            <p style='position: absolute;'>Calibration Certificate No.</p>
            <p style='position: absolute; top:15'>Customer</p>
            <p style='position: absolute; top:30'>Address</p>
        </div>
        <div style="position: absolute; top:150; left:25%; font-size:9">
            <p style='position: absolute;'>: <?php echo $rml_table['ccno']?></p>
            <p style='position: absolute; top:15'>: <?php echo $rml_table['costumer']?></p>
            <p style='position: absolute; top:30'>: <?php echo $rml_table['address']?></p>
        </div>
        <div  style="position: absolute; top:200; left:5%; font-size:9">
            <p style='position: absolute; top:15'>Equipment</p>
            <p style='position: absolute; top:30'>Manufacturer</p>
            <p style='position: absolute; top:45'>Model No.</p>
            <p style='position: absolute; top:60'>Serial No.</p>
            <p style='position: absolute; top:75'>Equipment ID</p>
            <p style='position: absolute; top:90'>Range</p>
            <p style='position: absolute; top:105'>Graduation</p>
        </div>
        <div  style="position: absolute; top:200; left:25%; font-size:9">
            <p style='position: absolute; top:15'>: <?php echo $rml_table['equipment']?></p>
            <p style='position: absolute; top:30'>: <?php echo $rml_table['manufacturer']?></p>
            <p style='position: absolute; top:45'>: <?php echo $rml_table['modelno']?></p>
            <p style='position: absolute; top:60'>: <?php echo $rml_table['serialno']?></p>
            <p style='position: absolute; top:75'>: <?php echo $rml_table['equipid']?></p>
            <p style='position: absolute; top:90'>: <?php echo $rml_table['range_range']?></p>
            <p style='position: absolute; top:105'>: <?php echo $rml_table['graduation']?></p>
        </div>
        <div  style="position: absolute; top:200; left:50%; font-size:9">
            <p style='position: absolute; top:15'>Date Received</p>
            <p style='position: absolute; top:30'>Date Calibrated</p>
            <p style='position: absolute; top:45'>Recommended Due Date</p>
            <p style='position: absolute; top:60'>Place of Calibration</p>
            <p style='position: absolute; top:75'>Ambient Temperature</p>
            <p style='position: absolute; top:90'>Relative Humidity</p>
        </div>
        <div style="position: absolute; top:200; left:75%; font-size:9">
            <p style='position: absolute; top:15'>: <?php echo $rml_table['datereceived']?></p>
            <p style='position: absolute; top:30'>: <?php echo $rml_table['datecalibrated']?></p>
            <p style='position: absolute; top:45'>: <?php echo $rml_table['reccduedate']?></p>
            <p style='position: absolute; top:60'>: <?php echo $rml_table['placeofcalib']?></p>
            <p style='position: absolute; top:75'>: <?php echo $rml_table['ambtemp']?></p>
            <p style='position: absolute; top:90'>: <?php echo $rml_table['relhumidity']?></p>
        </div>
    <!-- Informations -->
    <!-- Calibration Procedure and Traceability -->
        <div style="position: absolute; top:350; left:5%; font-size:10;">
            <p style='position: absolute; top:0;font-weight:bold;text-decoration: underline;'>Calibration Procedure and Traceability</p>
            <p style='position: absolute; top:15; max-width:95%'>The unit under calibration (UUC) was calibrated in accordance with RML's CP-001 using the following reference standard/s that are traceable to SI Units as maintained by the issuing laboratory:</p>
        </div>
        <div style="position: absolute; top:400; left:10%; font-size:10;">
            <p style='position: absolute; top:0;text-decoration: underline;'>Standard Used</p>
            <p style='position: absolute; top:15;'>Digital Pressure Gauge</p>
        </div>
        <div style="position: absolute; top:400; left:39%; font-size:10;">
            <p style='position: absolute; top:0;text-decoration: underline;'>Calibration Certificate No.</p>
            <p style='position: absolute; top:15;text-align:center'>11-2019-PRES-0284</p>
        </div>
        <div style="position: absolute; top:400; left:70%; font-size:10;">
            <p style='position: absolute; top:0;text-decoration: underline;'>Issuing Laboratory</p>
            <p style='position: absolute; top:15;'>NML (Philippines)</p>
        </div>
    <!-- Calibration Procedure and Traceability -->
    <!-- Calibration Results -->
        <div style="position: absolute; top:440; left:5%; font-size:10;">
            <p style='position: absolute; top:0;font-weight:bold;text-decoration: underline;'>Calibration Results</p>
            <p style='position: absolute; top:15; max-width:95%'>The results of calibration are shown on page 2 of this certificate.</p>
        </div>
    <!-- Calibration Results -->
    <!-- Uncertainty of Measurement -->
        <div style="position: absolute; top:480; left:5%; font-size:10;">
            <p style='position: absolute; top:0;font-weight:bold;text-decoration: underline;'>Uncertainty of Measurement</p>
            <p style='position: absolute; top:15; max-width:95%'>The uncertainty stated in this calibration certificate is the expanded uncertainty estimated at a confidence level of 95% with a coverage factor of k=2.</p>
        </div>
    <!-- Uncertainty of Measurement --> 
    <!-- REMARKS --> 
        <div style="position: absolute; top:530; left:5%; font-size:10;">
            <p style='position: absolute; top:0;font-weight:bold;text-decoration: underline;'>Remarks:</p>
            <p style='position: absolute; top:15; max-width:95%'>1. The calibration results were those obtained at the time of calibration and refer only to the UUC specified herein. <br>2. No adjustments were performed on the UUC. The user should determine suitability of the UUC for its intended use<br>3. Should the UUC be modified, damaged, or develop inconsistent readings, the results may not be valid, and the unit will require recalibration.</p>
        </div>
    <!-- REMARKS --> 
    <!-- SIGNATURE -->     
        <div style="position: absolute; top:630; left:10%; font-size:10;">
            <p style='position: absolute; top:0;text-decoration: underline;'> <?php echo $rml_table['calibratedBy']?></p>
            <p style='position: absolute; top:15;'>Calibration Officer</p>
        </div>
        <div style="position: absolute; top:630; left:70%; font-size:10;">
            <p style='position: absolute; top:0;text-decoration: underline;'>Engr. Rogerson A. Esmeria</p>
            <p style='position: absolute; top:15;'>Laboratory Head</p>
        </div>
    <!-- SIGNATURE -->     
    <!-- FOOTER -->        
        <div style="position: absolute; top:700; left:45%; font-size:10;">
            <p style='position: absolute; top:0;'>-Page 1 of 2-</p>
        </div>
        <div style="position: absolute; top:719; left:8.9%; font-size:8;">
            <p style='position: absolute; top:0; font-style: italic;'>This Certificate shall not be reproduced in any form, except in full, without the written approval of the DOST CALABARZON RML</p>
        </div>
        <div style='position: absolute; top:738;width:100%;border-width:1;border:solid;'></div>
        <div style="position: absolute; top:734.5; left:33%; font-size:8;">
            <p style='position: absolute; font-style: italic;'>A joint program with the Laguna State Polytechnic University</p>
        </div>
        <div style='position: absolute; top:755; width:100%; border-width:1; border:solid;'></div>
        <div style="position: absolute; top:753; left:25%; font-size:7;">
            <p style='position: absolute;'>RML Bldg., DOST CALABARZON Complex, Jamboree Road, Timugan, Los Baños, Laguna 4030</p>
        </div>
        <div style="position: absolute; top:765;font-size:7;">
            <p style='position: absolute;left:10%'>Telefax Nos.: +63 49 536-8091</p>
            <p style='position: absolute;left:40%'>Email address: rml4a@dost.gov.ph</p>
            <p style='position: absolute;left:70%'>URL: http://region4a.dost.gov.ph</p>
        </div>
    <!-- FOOTER -->   
    <!-- PAGE 2 / PAGE BREAK -->
        <div style='page-break-after: always;'></div>
    <!-- PAGE 2 / PAGE BREAK-->
    <!-- HEADER --> 
        <div style="position:relative">
            <img src="<?php echo $base64; ?>" alt="DOST LOGO" height='90px' style="position: absolute; top:0"> 
            <p style="position: absolute; top:-10; left:80">Republic of the Philippines</p>
            <p style="position: absolute; top:8; left:80; color:blue">DEPARTMENT OF SCIENCE AND TECHNOLOGY</p>
            <p style="position: absolute; top:24; left:80">CALABARZON</p>
            <p style="position: absolute; top:40; left:80; font-weight:bold">Regional Metrology Laboratory</p>
            <img src="<?php echo $base64PAB; ?>" alt="PAB LOGO" height='90px' style="position: absolute; top:0; left:425">
        </div>
        <div style="position: absolute; top:70;">
            <hr>
            <hr>
        </div>
    <!-- HEADER -->
    <!-- INFORMATIONS -->
        <div style="position: absolute; top:90; left:23%">
            <p style='font-weight:bold;font-size:20'>CALIBRATION CERTIFICATE</p>
        </div>
        <div style="position: absolute; top:150; left:5%; font-size:9">
            <p style='position: absolute;'>Calibration Certificate No.</p>
            <p style='position: absolute; top:15'>Customer</p>
            <p style='position: absolute; top:30'>Address</p>
        </div>
        <div style="position: absolute; top:150; left:25%; font-size:9">
            <p style='position: absolute;'>: <?php echo $rml_table['ccno']?></p>
            <p style='position: absolute; top:15'>: <?php echo $rml_table['costumer']?></p>
            <p style='position: absolute; top:30'>: <?php echo $rml_table['address']?></p>
        </div>
        <div style="position: absolute; top:200; left:5%; font-size:10;">
            <p style='position: absolute; top:15;font-weight:bold;'>Calibration Results</p>
        </div>
    <!-- INFORMATIONS -->
    <!-- TABLE -->
        <div style="position: absolute; top:260; left:5%; font-size:10;">
            <table class="GeneratedTable">
                <thead>
                    <tr>
                        <th colspan='2' rowspan='2'>UUC Reading <br> (pUUC)</th>
                        <th colspan='3'>Standard Reading</th>
                        <th rowspan='2'>Deviation <br> (pUUC - pind)</th>
                        <th colspan='2' rowspan='2'>Uncertainty</th>
                    </tr>
                    <tr>
                    
                        <th>Increasing</th>
                        <th>Decreasing</th>
                        <th>Mean (pind)</th>
                    
                    
                    </tr>
                    <tr>
                        <td><?php echo $rml_table['measurement']?></td>
                        <td></td>
                        <td><?php echo $rml_table['measurement']?></td>
                        <td><?php echo $rml_table['measurement']?></td>
                        <td><?php echo $rml_table['measurement']?></td>
                        <td><?php echo $rml_table['measurement']?></td>
                        <td><?php echo $rml_table['measurement']?></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $json =  $rml_table['MeasurementData'];
                    $arr = json_decode($json, true);
                    $arrayLength = count($arr);

                    for ($i=$arrayLength-1; $i >= 0; $i--) { 
                    echo '<tr>
                        <td>'.$arr[$i]['id'].'</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                            </tr>';
                    };

                ?>
                </tbody>
            </table>
        </div>
    <!-- TABLE -->
    <!-- FOOTER -->        
        <div style="position: absolute; top:700; left:45%; font-size:10;">
            <p style='position: absolute; top:0;'>-Page 2 of 2-</p>
        </div>
        <div style="position: absolute; top:719; left:8.9%; font-size:8;">
            <p style='position: absolute; top:0; font-style: italic;'>This Certificate shall not be reproduced in any form, except in full, without the written approval of the DOST CALABARZON RML</p>
        </div>
        <div style='position: absolute; top:738;width:100%;border-width:1;border:solid;'></div>
        <div style="position: absolute; top:734.5; left:33%; font-size:8;">
            <p style='position: absolute; font-style: italic;'>A joint program with the Laguna State Polytechnic University</p>
        </div>
        <div style='position: absolute; top:755; width:100%; border-width:1; border:solid;'></div>
        <div style="position: absolute; top:753; left:25%; font-size:7;">
            <p style='position: absolute;'>RML Bldg., DOST CALABARZON Complex, Jamboree Road, Timugan, Los Baños, Laguna 4030</p>
        </div>
        <div style="position: absolute; top:765;font-size:7;">
            <p style='position: absolute;left:10%'>Telefax Nos.: +63 49 536-8091</p>
            <p style='position: absolute;left:40%'>Email address: rml4a@dost.gov.ph</p>
            <p style='position: absolute;left:70%'>URL: http://region4a.dost.gov.ph</p>
        </div>
    <!-- FOOTER -->  
    </div>     
</body>



</html>   