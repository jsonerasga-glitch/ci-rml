<?php 
    $path = 'image/SREBillustrationA.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    $pathPAB = 'image/SREBillustrationB.png';
    $typePAB = pathinfo($pathPAB, PATHINFO_EXTENSION);
    $dataPAB = file_get_contents($pathPAB);
    $base64PAB = 'data:image/' . $typePAB . ';base64,' . base64_encode($dataPAB);

    $pathIllusa = 'image/SREBillustrationA.png';
    $typeIllusa = pathinfo($pathIllusa, PATHINFO_EXTENSION);
    $dataIllusa = file_get_contents($pathIllusa);
    $base64Illusa = 'data:image/' . $typeIllusa . ';base64,' . base64_encode($dataIllusa);

    $pathIllusB = 'image/SREBillustrationB.png';
    $typeIllusB = pathinfo($pathIllusB, PATHINFO_EXTENSION);
    $dataIllusB = file_get_contents($pathIllusB);
    $base64IllusB = 'data:image/' . $typeIllusB . ';base64,' . base64_encode($dataIllusB);

    $pathIllusDraft = 'image/draft.png';
    $typeIllusDraft = pathinfo($pathIllusDraft, PATHINFO_EXTENSION);
    $dataIllusDraft = file_get_contents($pathIllusDraft);
    $base64IllusDraft = 'data:image/' . $typeIllusDraft . ';base64,' . base64_encode($dataIllusDraft);

    $customerInfo = json_decode($WorksheetData['customerInfo']);
    $equipmentInfo = json_decode($WorksheetData['equipmentInfo']);
    $environmentInfo = json_decode($WorksheetData['environmentInfo']);
    $dataInputs = json_decode($WorksheetData['dataInputs']);
    $calculatedData = json_decode($WorksheetData['calculatedData']);
    
    function countStringInKeys($object, $pattern){
        $count = 0;
    
        foreach ($object as $key => $value) {
            if($pattern == 'repeat'){
                if($key != 'repeatabilityRaw'){
                    if (strpos($key, $pattern) !== false) {
                        $count++;
                    }
                }
            }else{
                if (strpos($key, $pattern) !== false) {
                    $count++;
                }
            }
        }
    
        return $count;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RML ++</title>
    <style>
        @font-face {
            font-family: "source_sans_proregular";           
            src: local("Calibri"), url("fonts/sourcesans/sourcesanspro-calibri.ttf") format("truetype");
            font-weight: normal;
            font-style: normal;
        }        
        body {
            font-family: "source_sans_proregular", Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        @page {
            margin-top: 100px;    
            margin-bottom: 50px; 
            margin-left: 25px;  
            margin-right: 25px;   
            border: 0px red solid; 
                }

        header {
            position: fixed;
            top: -90px;
            left: 0px;
            right: 0px;
        }
        footer {
            position: fixed;
            bottom: 5px;
            left: 0px;
            right: 0px;
            height: 2px;
        }
        .page {
            page-break-after: always;
        }
        .page:last-child {
            page-break-after: never;
        }
        .textLeft {
             text-align: left;
        }
        .textCenter {
             text-align: center;
        }
        .table {
            font-size: .6em;
            margin-top: 4px; 
            margin-bottom: 1px;
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black; 
        }
        .table th,  {
            border: 1px solid black;
        }
        .table td {
            vertical-align: top;
            border: 1px solid black;        
        }
        .table1 {
            font-size: .7em;
            margin: 0px; 
            margin-top: 6px;  
            margin-bottom: 6px;
            border-collapse: collapse;
            width: 100%;
            /* border: 1px solid black;  */
        }
        .table1 th{
            padding: 1px;
        }
        .table1 td {
            padding: 1px;
        }
        .table2 {
            font-size: .7em;
            margin-top: 1px; 
            margin-bottom: 1px;
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black; 
        }
        .table2 th,  {
            border: 1px solid black; /* Borders for specific th and td */
            padding: 1px;
            text-align: center; */
        }
        .table2 td {
            border: 1px solid black; /* Borders for specific th and td */
            padding: 1px;
            text-align: left;
        }
        .fixed-underline1 {
            display: inline-block;
            width: 250px; 
            border-bottom: 1px solid black;
        }
        input[type="checkbox"] {
            width: 16px;
            height: 16px;
        }
    </style>
</head>
<body>
    <header>
        <div style="text-align: center; border: 0px line-height: 1;">
            <h5 style="margin: 0; ">DOST CALABARZON</h5>
            <h5 style="margin: 0;">Regional Metrology Laboratory</h5>
            <h5 style="margin: 0;">TEST WEIGHTS AND MASS STANDARDS CALIBRATION WORKSHEET</h5>
        

            <table class="table1">
                    <tr>
                        <td class="td textLeft" style="width:15%;">Certificate Number:</td>
                        <td class="td textLeft underlined" ><span class="fixed-underline1"><?= $equipmentInfo->certificateNumber?></span></td>
                        <td class="td textLeft" style="width:13%;">Date Received:</td>
                        <td class="td textLeft underlined"><span class="fixed-underline1"><?= $customerInfo->dateReceived?></span></td>
                    </tr>
                    <tr>
                        <td class="td textLeft">Customer:</td>
                        <td class="td textLeft underlined"><span class="fixed-underline1"><?= $customerInfo->customer?></span></td>
                        <td class="td textLeft">Laboratory:</td>
                        <td class="td textLeft underlined"><span class="fixed-underline1"><?= $equipmentInfo->placeOfCalibration?></span></td>
                    </tr>
        </table>
        </div>


    </header>
    <footer>
    <div >
        <table class="table1">
            <tr>
                <td>Calibrated by: _______________________</td>
                <td>Encoded by: _______________________</td>
                <td>Checked by: _______________________</td>
            </tr>
            <tr>
                <td>&nbsp:</td>
                <td></td>
                <td style="font-size: .8em; text-align: right; vertical-align: bottom;">CP-003-F1 Rev.1</td>
            </tr>
            <tr>
                <td>Page _____ of _____</td>
                <td></td>
                <td style="font-size: .8em; text-align: right; vertical-align: bottom;">Effectivity date: 12 November 2021</td>
            </tr>
        </table>
    </div>
    </footer>

    <div class="page">
    <!-- Measurement Data  Table    -->
        <?php
            $numberOfItems = 1;
            while (isset($dataInputs->{'table' .  ($numberOfItems + 1)})) {
                $numberOfItems++;
            }
            for ($i = 1; $i <= $numberOfItems; $i++) {
        
                $tableName = "table" . $i;
                $comparatorKey = "comparatorTable" . $i;
                $SampleNominalValueKey = "SampleNominalValueTable" . $i;
                $SampleNominalUnitKey = "SampleNominalUnitTable" . $i;
                $SampleMarkingKey = "SampleMarkingTable" . $i;
                $stdMarkingKey = "standardUsedIDsTable" . $i;
                $tempStartKey = "TemperatureStart" ;
                $rhStartKey = "HumidityStart" ;
                $pressureStartKey = "PressureStart" ;
                $tempFinishKey = "TemperatureFinish" ;
                $rhFinishKey = "HumidityFinish" ;
                $pressureFinishKey = "PressureFinish" ;
                $materialuucKey = "sampleSelectedTable" . $i;

                echo '<table class="table"  >';
                echo '<thead>';
                    echo '<tr>';
                    echo '<th class="td textCenter" colspan="10">Calibration Information </th>';
                    echo '</tr>';
                   
                    echo '<tr>';
                        echo '<td " colspan="2" style="text-align: right;">Balance/Mass Comparator </td>';
                        echo '<td colspan="8"  style="text-align: left;">' . $dataInputs->$tableName->$comparatorKey . '</td>';
                    echo '</tr>';

                    echo '<tr style="font-size: .7em; text-align: center;">';
                        echo '<td class="td textCenter" colspan="2" ></td>';
                        echo '<td class="td textCenter" colspan="2">Nominal Value</td>';
                        echo '<td class="td textCenter" colspan="2">Marking </td>';
                        echo '<td class="td textCenter" colspan="4">Serial Number / Identification Number / Manufacturer / Description </td>';
                        
                    echo '</tr>';

                    echo '<tr>';
                        echo '<td  colspan="2" style="text-align: right;">Unit Under Calibration (UUC) : </td>';
                        echo '<td colspan="2"  style="text-align: center;">' . $dataInputs->$tableName->$SampleNominalValueKey .' ' . $dataInputs->$tableName->$SampleNominalUnitKey . '</td>';

                        echo '<td  colspan="2" style="text-align: center;">' . $dataInputs->$tableName->$SampleMarkingKey .'</td>';
                        echo '<td  colspan="4" style="text-align: center;"> </td>';
                    
                    echo '</tr>';
                    echo '<tr>';
                        echo '<td  colspan="2" style="text-align: right;">Calibration standard : </td>';
                        echo '<td  colspan="2" style="text-align: center;">' . $dataInputs->$tableName->$SampleNominalValueKey .' ' . $dataInputs->$tableName->$SampleNominalUnitKey . ' </td>';
                        $inputString = $dataInputs->$tableName->$stdMarkingKey;
                        $rows = explode(" + ", $inputString);
                        echo '<td colspan="2" style="text-align: center;">' . implode('<br>', $rows) . '</td>';
                        echo '<td  colspan="4" style="font-size: .7em; text-align: center;">tick the box for standard used </td>';
                       
                    echo '</tr>';

                    echo '<tr >';
                        echo '<td class="td textCenter" colspan="2" > </td>';
                        echo '<td class="td textCenter" colspan="2" style="font-size: .7em; text-align: center;">Start </td>';
                        echo '<td class="td textCenter" colspan="2" style="font-size: .7em; text-align: center;">Finish </td>';
                        echo '<td class="td textCenter" colspan="4" > </td>';
                     
                    echo '</tr>';

                    echo '<tr>';
                        echo '<td colspan="2" style="text-align: right;">Date:</td>';
                        echo '<td class="td textCenter" colspan="2" >'.$equipmentInfo->sDate.' </td>';
                        echo '<td class="td textCenter" colspan="2" >'.$equipmentInfo->sDate.' </td>';
                        echo '<td class="td2 left" colspan="2" style="font-size: .8em; text-align: left;"> <label><input type="checkbox">E2 / Troemner / 10 g / 91093 <label></td>';
                        echo '<td class="td2 left" colspan="2" style="font-size: .8em; text-align: left;"> <label><input type="checkbox">E2 / Troemner / 50 g / 91094 <label></td>';
                    echo '</tr>';

                    echo '<tr>';
                        echo '<td colspan="2" style="text-align: right;">Time: </td>';
                        echo '<td class="td textCenter" colspan="2" > </td>';
                        echo '<td class="td textCenter" colspan="2" > </td>';
                        echo '<td  colspan="2" style="font-size: .8em; text-align: left;"> <label><input type="checkbox">E2 / Troemner / 100 g / 91095 <label></td>';
                        echo '<td  colspan="2" style="font-size: .8em; text-align: left;"> <label><input type="checkbox">E2 / Troemner / 200 g / 91096 <label></td>';
                    echo '</tr>';

                    echo '<tr>';
                        echo '<td  colspan="2" style="text-align: right;">Temperature (°C) </td>';
                        echo '<td class="td textCenter" colspan="2" >' . $dataInputs->$tableName->$tempStartKey .'  </td>';
                        echo '<td class="td textCenter" colspan="2" > ' . $dataInputs->$tableName->$tempFinishKey .' </td>';
                        echo '<td  colspan="2" style="font-size: .8em; text-align: left;"> <label><input type="checkbox">E2 / Troemner / 4000014940  <label></td>';
                        echo '<td  colspan="2" style="font-size: .8em; text-align: left;"> <label><input type="checkbox">F1 / Haefner / 7740119 <label></td>';
                    echo '</tr>';

                    echo '<tr>';
                        echo '<td  colspan="2" style="text-align: right;">Humidity (%RH):  </td>';
                        echo '<td class="td textCenter" colspan="2" >' . $dataInputs->$tableName->$rhStartKey .'  </td>';
                        echo '<td class="td textCenter" colspan="2" >' . $dataInputs->$tableName->$rhFinishKey .'  </td>';
                        echo '<td  colspan="2" style="font-size: .8em; text-align: left;"> <label><input type="checkbox">F2 / Haefner / 6031214 <label></td>';
                        echo '<td  colspan="2" style="font-size: .8em; text-align: left;"> <label><input type="checkbox">F2/ Haefner / 20 kg / 6021214 <label></td>';
                    echo '</tr>';

                    echo '<tr>';
                        echo '<td  colspan="2" style="text-align: right;">Pressure (hPa): </td>';
                        echo '<td class="td textCenter" colspan="2" >'. $dataInputs->$tableName->$pressureStartKey .'  </td>';
                        echo '<td class="td textCenter" colspan="2" >'. $dataInputs->$tableName->$pressureFinishKey .'  </td>';
                        echo '<td  colspan="2" style="font-size: .8em; text-align: left;"> <label><input type="checkbox">F2 / Troemner / 57248 <label></td>';
                        echo '<td  colspan="2" style="font-size: .8em; text-align: left;"> <label><input type="checkbox">F2 / Troemner / 57249 <label></td>';
                    echo '</tr>';

                    echo '<tr>';
                    echo '<td class="td textCenter" colspan="10" >Raw data (g)  </td>';
                    echo '</tr>';


                    echo '<tr>';
                    echo '<td class="td textCenter" colspan="2" >material of UUC* <br>(for density of material used) </td>';
                    echo '<td class="td textCenter" colspan="2" >A1(standard) </td>';
                    echo '<td class="td textCenter" colspan="2" >B1(UUC) </td>';
                    echo '<td class="td textCenter" colspan="2" >B2(UUC) </td>';
                    echo '<td class="td textCenter" colspan="2" >A2(standard) </td>';
                    echo '</tr>';

                
                echo '</thead>';
                echo '<tbody>';
            
                    $materials = [
                        ['<label style="font-size: .8em;text-align: left;"><input type="checkbox"> Platinum </label>', '<label style="font-size: .8em;text-align: left;"><input type="checkbox"> Iron </label>'],
                        ['<label style="font-size: .8em;text-align: left;"><input type="checkbox"> Nickel silver </label>', '<label style="font-size: .8em;text-align: left;"><input type="checkbox"> Cast iron (white) </label>'],
                        ['<label style="font-size: .8em;text-align: left;"><input type="checkbox"> Brass </label>', '<label style="font-size: .8em;text-align: left;"><input type="checkbox"> Cast iron (gray) </label>'],
                        ['<label style="font-size: .8em;text-align: left;"><input type="checkbox"> Stainless steel </label>', '<label style="font-size: .8em;text-align: left;"><input type="checkbox"> Aluminum </label>'],
                        ['<label style="font-size: .8em; text-align: left;"><input type="checkbox"> Carbon steel </label>', '<label style="font-size: .8em; text-align: left;"><input type="checkbox"> *OIML R 111-1 Table B.7 </label>']
                    ];
                
                    $numRows = 1;
                    while (isset($dataInputs->{'table' . $i}->{'Sa' . ($numRows + 1)})) {
                        $numRows++;
                    }
                
                    for ($rowIndex = 0; $rowIndex < count($materials); $rowIndex++) {
                        echo '<tr>';
                        echo '<td class="td textCenter" colspan="1">' . $materials[$rowIndex][0] . '</td>';
                        echo '<td class="td textCenter" colspan="1">' . $materials[$rowIndex][1] . '</td>';
                    
                        $SaKey = 'Sa' . ($rowIndex + 1);
                        $TbKey = 'Tb' . ($rowIndex + 1);
                        $TcKey = 'Tc' . ($rowIndex + 1);
                        $SdKey = 'Sd' . ($rowIndex + 1);
                    
                        $SaValue = isset($dataInputs->{'table' . $i}->$SaKey) ? $dataInputs->{'table' . $i}->$SaKey : '';
                        $TbValue = isset($dataInputs->{'table' . $i}->$TbKey) ? $dataInputs->{'table' . $i}->$TbKey : '';
                        $TcValue = isset($dataInputs->{'table' . $i}->$TcKey) ? $dataInputs->{'table' . $i}->$TcKey : '';
                        $SdValue = isset($dataInputs->{'table' . $i}->$SdKey) ? $dataInputs->{'table' . $i}->$SdKey : '';
                    
                        echo '<td class="textCenter" colspan="2">' . $SaValue . '</td>';
                        echo '<td class="textCenter" colspan="2">' . $TbValue . '</td>';
                        echo '<td class="textCenter" colspan="2">' . $TcValue . '</td>';
                        echo '<td class="textCenter" colspan="2">' . $SdValue . '</td>';
                    
                        echo '</tr>';
                    }
                
                    for ($x = count($materials) + 1; $x <= $numRows; $x++) {
                        $SaKey = 'Sa' . $x;
                        $TbKey = 'Tb' . $x;
                        $TcKey = 'Tc' . $x;
                        $SdKey = 'Sd' . $x;
                    
                        $SaValue = isset($dataInputs->{'table' . $i}->$SaKey) ? $dataInputs->{'table' . $i}->$SaKey : '';
                        $TbValue = isset($dataInputs->{'table' . $i}->$TbKey) ? $dataInputs->{'table' . $i}->$TbKey : '';
                        $TcValue = isset($dataInputs->{'table' . $i}->$TcKey) ? $dataInputs->{'table' . $i}->$TcKey : '';
                        $SdValue = isset($dataInputs->{'table' . $i}->$SdKey) ? $dataInputs->{'table' . $i}->$SdKey : '';
                    
                        echo '<tr>';
                        echo '<td class="textCenter" colspan="2"></td>';
                        echo '<td class="textCenter" colspan="2">' . $SaValue . '</td>';
                        echo '<td class="textCenter" colspan="2">' . $TbValue . '</td>';
                        echo '<td class="textCenter" colspan="2">' . $TcValue . '</td>';
                        echo '<td class="textCenter" colspan="2">' . $SdValue . '</td>';
                        echo '</tr>';
                    }

                echo '</tbody>'; 
                echo '</table>';
            }
        ?>
    </div>
    <!-- uncertainty budget table -->
    <div class="page">

            <?php

                $calculatedDataArray = json_decode(json_encode($calculatedData), true);

                // Define the possible headers and keys
                $possibleHeaders = [
                    "Nominal Mass" => "SampleNominalValueTable", 
                    "Sensitivity Weight" => "comparatorSensitivityWeight", 
                    "Uncertainty Sensitivity Weight" => "comparatorUncertaintySensitivityWeight", 
                    "Sensitivity Weight Delta" => "comparatorSensitivityWeightDelta", 
                    "Uncertainty Sensitivity Weight Delta" => "comparatorUncertaintySensitivityWeightDelta", 
                    "Uncertainty Sensitivity Balance" => "uncertaintySensitivityBalance", 
                    "Uncertainty Resolution Balance" => "uncertaintyResolutionBalance",
                    "Computed Density" => "computedDensity",
                    "Air Density" => "airDensity",
                    "Standard Uncertainty Density Sample" => "standardUncertaintyDensitySample",
                    "Standard Uncertainty Density Reference" => "standardUncertaintyDensityReference",
                    "Standard Uncertainty Approximation Air Density" => "standardUncertaintyApproximationAirDensity",
                    "Standard Uncertainty Air Buoyancy Correction" => "standardUncertaintyAirBuoyancyCorrection",
                    "Uncertainty of Reference Weight" => "uncertaintyOfReferenceWeight",
                    "Uncertainty Weighing Process" => "uncertaintyWeighingProcess",
                    "Uncertainty Balance" => "uncertaintyBalance",
                    "Combined Uncertainty" => "combinedUncertainty",
                    "k" => "k",
                    "Expanded Uncertainty" => "expandedUncertainty",
                    "Unit" => "unitRawDataTable"
                ];

                // Determine the actual headers and keys based on available data
                $headers = [];
                $keys = [];

                // Checking for available keys in the data array
                if (!empty($calculatedDataArray)) {
                    foreach ($possibleHeaders as $header => $key) {
                        // Check if at least one data row has this key
                        foreach ($calculatedDataArray as $data) {
                            if (isset($data[$key]['value'])) {
                                $headers[] = $header;
                                $keys[] = $key;
                                break;
                            }
                        }
                    }
                }

                // Number of columns per table
                $columnsPerTable = 7;
                $totalColumns = count($headers);
                $numberOfTables = ceil($totalColumns / $columnsPerTable);

                // Iterate over each table
                for ($i = 0; $i < $numberOfTables; $i++) {
                    // Start the table
                    echo '<table class="table" style="text-align: left; font-size: .6em;">';
                    echo '<thead>';
                    echo '<tr><th class="textCenter" colspan="' . min($columnsPerTable, $totalColumns - $i * $columnsPerTable) . '">Uncertainty Budget Table</th></tr>';
                    echo '<tr>';

                    // Determine the range of headers and keys for this table
                    $start = $i * $columnsPerTable;
                    $end = min($start + $columnsPerTable, $totalColumns);

                    // Print the headers
                    for ($j = $start; $j < $end; $j++) {
                        echo '<th class="textCenter">' . $headers[$j] . '</th>';
                    }

                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    // Loop through each row of data
                    foreach ($calculatedDataArray as $data) {
                        echo '<tr>';
                        // Print the data for the current range of columns
                        for ($j = $start; $j < $end; $j++) {
                            $key = $keys[$j];
                            echo '<td class="textCenter">' . ($data[$key]['value'] ?? '') . '</td>';
                        }
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                }
            ?>
    </div>
</body>
</html>


