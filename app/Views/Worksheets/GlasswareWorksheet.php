<?php 
    ini_set('memory_limit', '1024M'); // or you could use 1G

    $path = 'image/dost.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    $pathPAB = 'image/pressure.png';
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
?>


<!DOCTYPE html>
<html lang="en">
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
            margin-top: 20px;    
            margin-bottom: 20px; 
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
            bottom: 10px;
            left: 0px;
            right: 0px;
            height: 10px;
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
    .fixed-underline1 {
        display: inline-block;
        width: 210px; /* Adjust the width as needed */
        border-bottom: 1px solid black;

    }
    .fixed-underline2 {
        display: inline-block;
        width: 50px; /* Adjust the width as needed */
        border-bottom: 1px solid black;

    }
    .fixed-underline3 {
        display: inline-block;
        width: 100px; /* Adjust the width as needed */
        border-bottom: 1px solid black;

    }
    .fixed-underline4 {
        display: inline-block;
        width: 120px; /* Adjust the width as needed */
        border-bottom: 1px solid black;

    }
    .table {
            font-size: .7em;
            margin-top: 1px; 
            margin-bottom: 1px;
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black; 
    }
    .table th,  {
            border: 1px solid black; /* Borders for specific th and td */
            padding: 0.5px;
    }
    .table td {
            vertical-align: top;
            border: 1px solid black; /* Borders for specific th and td */
            padding: 0.5px;
    }
    .table2 {
            font-size: .7em;
            margin-top: 4px; 
            margin-bottom: 6px;
            border-collapse: collapse;
            width: 100%;
    }
    .table2 th {
            margin-top: 5px; 
            margin-bottom: 5px;  
            padding: 1px;
            text-align: center;
    }
    .table2 td {
            margin-top: 5px;  
            margin-bottom: 5px;  
            padding: 1px;
            text-align: left;
    }
    input[type="checkbox"] {
            width: 16px;
            height: 16px;
            margin-left:4px;
            margin-right:10pxe;
    }
</style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calibration Woorksheet</title>   
</head>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@3.4.1/dist/chart.min.js "></script> 
<body >
    <footer>
            <div style="font-size: .5em;">
                <table style="border-collapse: collapse; border: none; width: 100%; text-align: right; z-index: -1;">
                    <tr><td>Page ____ of ____</td></tr>
                    <tr><td>CP-015-F1 Rev. 1</td></tr>
                    <tr><td>Effectivity Date: 24 April 2023</td></tr>
                </table>
            </div>
    </footer>
    <!-- first page -->
    <div class="page">
        <!-- Customer and Equipment Info -->
        <div >
                    <table class="table2" style=" text-align: left; ">
                        <tr>
                            <th colspan="5">DATA SHEET FOR CALIBRATION OF VOLUMETRIC APPARATUS</th>
                            <td colspan="3"></td>
                            <td colspan="2" style=" text-align: right;">For glassware only</td>
                    
                        </tr>
                        <tr>      
                            <td colspan="2">Request Reference No.</td>
                            <td colspan="4"><span class="fixed-underline1"><?= $equipmentInfo->certificateNumber?></span></td>
                            <td colspan="2" style=" text-align: center;">☐ for graduated (Case 1)</td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td colspan="2" rowspan="2" style="vertical-align: top;">Customer</td>
                            <td colspan="4" rowspan="2"><span class="fixed-underline1"><?= $customerInfo->customer?></span></td>
                            <td colspan="1" ></td>
                            <td colspan="3"> a+ <span class="fixed-underline2"></span> a- <span class="fixed-underline2"></span></td>
                        
                        </tr>
                        <tr>
                            <td colspan="2" style=" text-align: center;">☐ For one-mark (Case 2)</td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td colspan="2">Place of Calibraton</td>
                            <td colspan="4" style="vertical-align: top;"><span class="fixed-underline1"><?= $equipmentInfo->placeOfCalibration?></span></td>
                            <td colspan="2" style=" text-align: right;">Neck Diameter</td>
                            <td colspan="2"><span class="fixed-underline4"></td>
                        </tr>
                        <tr>
                            <td colspan="2">Date Received</span></td>
                            <td colspan="4"><span class="fixed-underline1"><?= $customerInfo->dateReceived?></td>
                            <td colspan="2" rowspan="2" style="vertical-align: top;  text-align: right"  >Graduation Height:</td>
                            <td colspan="2" rowspan="2"><span class="fixed-underline4" style="vertical-align: top;"></span></td>
                        </tr>
                        <tr>
                            <td colspan="2">Date Calibrated</td>
                            <td colspan="4" ><span class="fixed-underline1"><?= $equipmentInfo->dateCalibrated?></span></td>

                        </tr>
                        <tr>
                            <td colspan="2">Recommended Dute Date</td>
                            <td colspan="4" > <span class="fixed-underline1"><?= $customerInfo->recommendedDueDate?></span></td>
                            <td colspan="2" style=" text-align: right;">Count of Repeatability (n)</td>
                            <td colspan="2"><span class="fixed-underline4"></span></td>
                        </tr>
                        <tr>
                            <td colspan="2">Equipment Description / Sample</td>
                            <td colspan="5"> <span class="fixed-underline1"><?= $equipmentInfo->equipmentDescription?></span></td>
                            <td colspan="1" style=" text-align: right;">Start Temp (°C)</td>
                            <td colspan="2"><span class="fixed-underline4"><?= $environmentInfo->tempStart?></span></td>
                        </tr>

                            <?php
                                $key = 'equipmentType';
                                $selectFunctions = isset($equipmentInfo->$key) ? $equipmentInfo->$key : null;
                            ?>

                        <tr>
                            <td colspan="1"></td>
                            <td colspan="1" style="vertical-align: top;">Type</td>
                            <td colspan="5" > 
                                <input  type="checkbox" id="type1" name="type1" <?= $selectFunctions === '1' ? 'checked' : '' ?>>
                                <label for="type1">To Deliver</label>
                            </td>
                            <td colspan="1" style=" text-align: right;">Start RH (%)</td>
                            <td colspan="2"><span class="fixed-underline4"><?= $environmentInfo->rhStart?></span></td>
                        </tr>
                        <tr>                      
                            <td colspan="1"></td>
                            <td colspan="1"></td>
                            <td colspan="5"> 
                            <input  type="checkbox" id="type2" name="type2" <?= $selectFunctions === '2' ? 'checked' : '' ?>>
                            <label for="type2">To Contain</label>
                        </td>
                            <td colspan="1" style=" text-align: right;">End Temp (°C)</td>
                            <td colspan="2"><span class="fixed-underline4"><?= $environmentInfo->tempEnd?></span></td>
                        </tr>
                        <tr>
                            <td colspan="1"></td>
                            <td colspan="1">Manufacturer</td>
                            <td colspan="5"><span class="fixed-underline1"><?= $equipmentInfo->manufacturer?></span></td>
                            <td colspan="1" style=" text-align: right;">End RH (%)</td>
                            <td colspan="2"><span class="fixed-underline4"><?= $environmentInfo->rhEnd?></span></td>
                        </tr>
                        <tr>
                            <td colspan="1"></td>
                            <td colspan="1" style=" font-size: .9em;text-align: left; " >Identifying Mark</td>
                            <td colspan="4"><span class="fixed-underline1"><?= $equipmentInfo->equipmentDescription?></span></td>
                            <td colspan="2">For piston pipette only</td>
                            <td colspan="2" class="textCenter">Ranges</td>
                        </tr>
                        <tr>
                            <td colspan="1"></td>
                            <td colspan="1">Capacity</td>
                            <td colspan="4"><span class="fixed-underline1"><?= $equipmentInfo->capacityMin?>
                            <?php
                                if ($equipmentInfo->capacityMinUnit == 1) {
                                    echo 'µL';
                                } elseif ($equipmentInfo->capacityMinUnit == 2) {
                                    echo 'mL';
                                }
                            ?> 
                            - <?= $equipmentInfo->capacityMax?> 
                            <?php
                                if ($equipmentInfo->capacityMaxUnit == 1) {
                                    echo 'µL';
                                } elseif ($equipmentInfo->capacityMaxUnit == 2) {
                                    echo 'mL';
                                }
                            ?>
                            </span>
                            </td>
                        
                            <td colspan="2">Single Channel</td>
                            <th colspan="2">Nominal Volume, µL</th>
                        </tr>
                        <tr>
                            <td colspan="1"></td>
                            <td colspan="1">Material</td>
                            <td colspan="4" > <span class="fixed-underline1"><?= $equipmentInfo->selectedMaterial?></span></td>
                            <td colspan="2">Single w/ varialble volume</td>
                            <td colspan="2">>5000 to 10000</td>
                        </tr>
                  

                        <tr>
                            <td colspan="1"></td>
                            <td colspan="1">Serial No.</td>
                            <td colspan="4" > <span class="fixed-underline1"><?= $equipmentInfo->serialNumber?></span></td>
                            <td colspan="2">Multi-Channel</td>
                            <td colspan="2">>1000 to 5000</td>
                        </tr>
                        <tr>
                            <td colspan="1"></td>
                            <td colspan="1">Equipment ID</td>
                            <td colspan="4" > <span class="fixed-underline1"><?= $equipmentInfo->equipmentId?></span></td>
                            <td colspan="2"></td>
                            <td colspan="2">>300 to 1000</td>
                        </tr>

            

                    <tr>
                        <td colspan="1" style="padding: 0;"></td>
                        <td colspan="1" style="padding: 0;"></td>
                        <td colspan="6"  style=" font-size: .9em;text-align: left;">
                        <label >
                                <input type="checkbox">Visual Inspection (clean the equipment w/ soft cloth to remove dust and small particles)
                            </label>
                        </td>
                        <td colspan="2" >>100 to 300</td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding: 0;"></td>
                        <td colspan="1" style="padding: 0;"></td>
                        <td colspan="6"  style=" font-size: .9em;text-align: left;">
                        <label >
                                <input type="checkbox">Check the surface and edges of the equipment for any damages. (note in remarks)
                            </label>
                        </td>
                        <td colspan="2" >>10 to 100</td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding: 0;"></td>
                        <td colspan="1" style="padding: 0;"></td>
                        <td colspan="6"  style=" font-size: .9em;text-align: left;">
                        <label >
                                <input type="checkbox">Note any crack/scratch, color change, or broken parts of the equipment
                            </label>
                        </td>
                        <td colspan="2" >>1 to 10</td>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding: 0;"></td>
                        <td colspan="1" style="padding: 0;"></td>
                        <td colspan="6"  style=" font-size: .9em;text-align: left;">
                        <label >
                                <input type="checkbox">Record all necessary and vital information
                            </label>
                        </td>
                        <td colspan="2" ></td>
                    </tr>


                    </table>
        </div>
        <!-- calculation obs period table -->
        <table class="table" style="text-align: center;">
            <thead>
                <tr>
                    <th colspan='2'><?= 'Capacity' ?></th>
                    <th colspan='2'><?= 'Trial' ?></th>
                    <th colspan='2'><?= 'Temperature' ?></th>
                    <th colspan='2'><?= 'Humidity' ?></th>
                    <th colspan='2'><?= 'Pressure' ?></th>
                    <th colspan='2'><?= 'Water Temperature' ?></th>
                    <th colspan='2'><?= 'Reading Vessel' ?></th>
                    <th colspan='2'><?= 'Reading Vessel Water' ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $tableName = 'TABLE';
                $rowName = 'ROW';

                $numberOfItems = 1;
                // Count rows dynamically based on available data
                while (isset($dataInputs->{'percentageValue' . 'Table' . ($numberOfItems + 1)})) {
                    $numberOfItems++;
                }

                $dataInputsArray = json_decode(json_encode($dataInputs), true);

                for ($i = 1; $i <= $numberOfItems; $i++) {
                    $estimatedEvaporationKey = 'estimatedEvaporation' . 'Table' . $i;
                    $nominalValueKey = 'nominalValue' . 'Table' . $i;

               
                    $nominalValue = $dataInputs->$nominalValueKey ?? '';
                    
                    
                    // Define ranges
                    $ranges = [
                        ['min' => 5000, 'max' => 10000],
                        ['min' => 1000, 'max' => 5000],
                        ['min' => 300, 'max' => 1000],
                        ['min' => 100, 'max' => 300],
                        ['min' => 10, 'max' => 100],
                        ['min' => 1, 'max' => 10]
                    ];
                    $maxValue = null;

                // Retrieve the appropriate max value if nominalValue is within the range
                    foreach ($ranges as $range) {
                        if ($nominalValue >= $range['min'] && $nominalValue <= $range['max']) {
                            $maxValue = $range['max'];
                            break;
                        }
                    }
                    $countOfRow = 1;
                    // Count rows dynamically based on available data
                    while (isset($dataInputs->{'n' . $tableName . $i . $rowName . ($countOfRow + 1)})) {
                        $countOfRow++;
                    }

                    for ($x = 1; $x <= $countOfRow; $x++) {
                        $tempKey = 'temperature' . $tableName . $i . $rowName . $x;
                        $humidKey = 'humidity' . $tableName . $i . $rowName . $x;
                        $pressureKey = 'pressure' . $tableName . $i . $rowName . $x;
                        $waterTempKey = 'waterTemperature' . $tableName . $i . $rowName . $x;
                        $readingvesselKey = 'readingVessel' . $tableName . $i . $rowName . $x;
                        $readingvesselWaterKey = 'readingVesselWater' . $tableName . $i . $rowName . $x;
                ?>
                        <tr>
                            <td class="textCenter" colspan='2'></td>
                            <td class="textCenter" colspan='2'><?= $x ?></td>
                            <td class="textCenter" colspan='2'><?= $dataInputs->$tempKey ?? '' ?></td>
                            <td class="textCenter" colspan='2'><?= $dataInputs->$humidKey ?? ''?></td>
                            <td class="textCenter" colspan='2'><?= $dataInputs->$pressureKey ?? ''?></td>
                            <td class="textCenter" colspan='2'><?= $dataInputs->$waterTempKey ?? ''?></td>
                            <td class="textCenter" colspan='2'><?= $dataInputs->$readingvesselKey ?? ''?></td>
                            <td class="textCenter" colspan='2'><?= $dataInputs->$readingvesselWaterKey ?? ''?></td>
                        </tr>
                <?php
                    }
                ?>
                    <tr>
                        <td class='textCenter' colspan='2'>Range</td>
                        <td class='textLeft' colspan='4'>min &nbsp;<?= $dataInputs->$nominalValueKey ?? ''?></td>
                        <td class='textLeft' colspan='4'>
                            <?= $maxValue !== null ? "max &nbsp;" . $maxValue : '' ?>
                        </td>
                        <td class='textLeft' colspan='6'>(evap.loss) <?= $dataInputs->$estimatedEvaporationKey ?? ''?></td>
                    </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>
        <!-- Remarks -->
        <table class="table2" style=" font-size: .6em; text-align: left; ">
            <tr>
                <th colspan="2" rowspan= "3" style="padding: 1;vertical-align: top; text-align: left; ">
                Remarks
                </th>
                <td colspan="6" style="padding: 0;">
                    <label>
                        <input type="checkbox">Standard/s, accessory/ies, and UUC are in good condition before and after calibration
                    </label>
                </td>
            </tr>
            <tr>
            
                <td colspan="6" style="padding: 0;">
                    <label>
                        <input type="checkbox">No Adjustement was done.
                    </label>
                </td>
        
            </tr>
            <tr>
                <td colspan="2" style="padding: 0;">
                    <label>
                        <input type="checkbox">Others:
                    </label>
                </td>
                <td colspan="4" style="padding: 0;">
                _____________________
                </td>
        
            </tr>

            
        </table>
        <!-- standard used -->
        <table class="table2" style=" font-size: .6em; text-align: left; ">
            
                    <tr>
                        <th colspan="2" style="padding: 0;">
                            Standards and Accessories Used
                        </th>
                        <td colspan="2" style="padding: 0;">
                        RH & Air Pressure
                        </td>
                        <td colspan="2" style="padding: 0;">
                        Temperature for Air
                        </td>
                        <td colspan="2" style="padding: 0;">
                        Temperature for Water
                        </td>
                        <td colspan="2" style="padding: 0;">
                        H2O Conductivity Result
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" style="padding: 0;">
                            <label>
                                <input type="checkbox">XS2002S
                            </label>
                        </td>
                        <td colspan="2" style="padding: 0;">
                            <label>
                                <input type="checkbox">A17110063
                            </label>
                        </td>
                        <td colspan="2" style="padding: 0;">
                            <label>
                                <input type="checkbox">A0006380 DT
                            </label>
                        </td>
                        <td colspan="2" style="padding: 0;">
                            <label>
                                <input type="checkbox">A0006380 DT
                            </label>
                        </td>

                        <td colspan="2" style="padding: 0;">
                        _____________________
                        </td>

                    </tr>
                    <tr>
                        <td colspan="2" style="padding: 0;">
                            <label>
                                <input type="checkbox">XPE206
                            </label>
                        </td>
                        <td colspan="2" style="padding: 0;">
                            <label>
                                <input type="checkbox">A17110002
                            </label>
                        </td>
                        <td colspan="2" style="padding: 0;">
                            <label>
                                <input type="checkbox">4010016 DT
                            </label>
                        </td>
                        <td colspan="2" style="padding: 0;">
                            <label>
                                <input type="checkbox">4010016 DT
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" style="padding: 0;">
                            <label>
                                <input type="checkbox">CC5001
                            </label>
                        </td>
                        <td colspan="2" style="padding: 0;">
                            <label>
                                <input type="checkbox">
                            </label>
                        </td>
                        <td colspan="2" style="padding: 0;">
                            <label>
                                <input type="checkbox">
                            </label>
                        </td>
                        <td colspan="2" style="padding: 0;">
                            <label>
                                <input type="checkbox">
                            </label>
                        </td>
                    </tr>
        </table>
        <!-- personnel calibration performed        -->
        <table class="table2" style=" text-align: left; ">
                        <tr>
                            <td >Calibrated by: <span class="fixed-underline3"> </span></td>
                            <td >Encoded by:  <span class="fixed-underline3"> </span></td>
                            <td >Checked by:  <span class="fixed-underline3"> </span></td>
                        </tr>
        </table>
    </div>
    <!-- uncertainty budget table -->
    <div class="page">
        <br>   
        <?php
            $calculatedDataArray = json_decode(json_encode($calculatedData), true);
            // Define the column headers and their corresponding data keys
        

            $equipmentDataArray = json_decode(json_encode($equipmentInfo), true);
            $equipmentType = $equipmentDataArray['equipmentType'];
            
            if ($equipmentType != '1') {
                $columns = [
                    'computed_uncertainty_balance_u' => 'Computed Uncertainty Balance U',
                    'computed_uncertainty_evaporation' => 'Computed Uncertainty Evaporation',
                    'computed_uncertainty_thermo_water' => 'Computed Uncertainty Thermo Water',
                    'computed_uncertainty_water_dens' => 'Computed Uncertainty Water Dens',
                    'computed_uncertainty_air_dens' => 'Computed Uncertainty Air Dens',
                    'computed_uncertainty_weight_pova' => 'Computed Uncertainty Weight Pova',
                    'computed_uncertainty_pressureVariation' => 'Computed Uncertainty Pressure Variation',
                    'computed_uncertainty_humidityVariation' => 'Computed Uncertainty Humidity Variation',
                    'computed_uncertainty_temperatureVariation' => 'Computed Uncertainty Temperature Variation',
                    'computed_uncertainty_cubicExpansionCoefficent' => 'Computed Uncertainty Cubic Expansion Coefficient',
                    'computed_uncertainty_resolutionUUC' => 'Computed Uncertainty Resolution UUC',
                    'computed_uncertainty_setting' => 'Computed Uncertainty Setting',
                    'computed_uncertainty_reproducibility' => 'Computed Uncertainty Reproducibility',
                    'computed_uncertainty_repeatability' => 'Computed Uncertainty Repeatability',
                    'computed_uncertainty_combined' => 'Computed Uncertainty Combined',
                    'computed_uncertainty_expanded' => 'Computed Uncertainty Expanded'
                ];
            } else {
                $columns = [
                    'computed_uncertainty_mass' => 'Computed Uncertainty Mass',
                    'computed_uncertainty_temp' => 'Computed Uncertainty Temp',
                    'computed_uncertainty_ρW' => 'Computed Uncertainty ρW',
                    'computed_uncertainty_ρA' => 'Computed Uncertainty ρA',
                    'computed_uncertainty_weight_volumetric' => 'Computed Uncertainty Weight Volumetric',
                    'computed_uncertainty_y' => 'Computed Uncertainty y',
                    'computed_uncertainty_meniscus' => 'Computed Uncertainty Meniscus',
                    'computed_uncertainty_repeatability' => 'Computed Uncertainty Repeatability',
                    'computed_uncertainty_combined' => 'Computed Uncertainty Combined',
                    'computed_uncertainty_expanded' => 'Computed Uncertainty Expanded',
                    'computed_uncertainty_expanded_rounded' => 'Computed Uncertainty Rounded',
                ];
            }
            

            // Define the columns without combined and expanded uncertainties
            $dataColumns = array_filter($columns, function($key) {
                return !in_array($key, ['computed_uncertainty_combined', 'computed_uncertainty_expanded']);
            }, ARRAY_FILTER_USE_KEY);

            // Number of columns per table
            $columnsPerTable = 4;
            $totalColumns = count($dataColumns);
            $numberOfTables = ceil($totalColumns / $columnsPerTable);

            for ($i = 0; $i < $numberOfTables; $i++) {
                echo '<table class="table" style="text-align: center; font-size: .6em;">';
                echo '<thead>';
                echo '<tr><th class="textCenter" colspan="' . $columnsPerTable . '">Uncertainty Budget Table</th></tr>';
                echo '<tr>';

                $start = $i * $columnsPerTable;
                $end = min($start + $columnsPerTable, $totalColumns);

                // Print headers
                for ($j = $start; $j < $end; $j++) {
                    $key = array_keys($dataColumns)[$j];
                    echo '<th class="textCenter">' . $dataColumns[$key] . '</th>';
                }

                // Add additional headers for combined and expanded uncertainties if this is the last table
                if ($i == $numberOfTables - 1) {
                    echo '<th class="textCenter">' . $columns['computed_uncertainty_combined'] . '</th>';
                    echo '<th class="textCenter">' . $columns['computed_uncertainty_expanded'] . '</th>';
                    echo '<th class="textCenter"></th>';
                }

                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                foreach ($calculatedDataArray as $tableKey => $tableData) {
                    $dataUncertainty = $tableData['computed_uncertainty'];

                    echo '<tr>';
                    // Print the data for the current range of columns
                    for ($j = $start; $j < $end; $j++) {
                        $key = array_keys($dataColumns)[$j];
                        echo '<td class="textCenter">' . ($dataUncertainty[$key]['value'] ?? '') . '</td>';
                    }

                    // Print combined and expanded uncertainties only in the last table
                    if ($i == $numberOfTables - 1) {
                        echo '<td class="textCenter">' . ($dataUncertainty['computed_uncertainty_combined'] ?? '') . '</td>';
                        echo '<td class="textCenter">' . ($dataUncertainty['computed_uncertainty_expanded'] ?? '') . '</td>';
                        echo '<th class="textCenter"></th>';
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