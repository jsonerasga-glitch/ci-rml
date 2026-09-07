<?php 
ini_set('memory_limit', '1024M'); // or you could use 1G

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
    background-color: #ffffff;
    border-collapse: collapse;
    border-width: 1px;
    border-color: black;
    border-style: solid;
    color: #000000;
    }

    table.GeneratedTable td, table.GeneratedTable th {
    border-width: 1px;
    border-color: black;
    border-style: solid;
    padding: 2px;
    text-align:center;
    }

    table.GeneratedTable thead {
    background-color: #ffffff;
    }


    @font-face {
            font-family: "source_sans_proregular";           
            src: local("Calibri"), url("fonts/sourcesans/sourcesanspro-calibri.ttf") format("truetype");
            font-weight: normal;
            font-style: normal;

        }        
        body{
            font-family: "source_sans_proregular", Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;            
        }
        @media print {
        .myimage {
            image-resolution: 3200dpi;
        }
        }

        table{
            border:solid 1px;
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

<body style="padding: 15px; ">
    <div style="font-size: .5em; margin-top: 30px;">
        <center><p>Republic of the Philippines</p></center> 
        <center><h4>DEPARTMENT OF SCIENCE AND TECHNOLOGY</h4></center>
        <center>CALABARZON</center>
        <center><h4>Regional Metrology Laboratory</h4></center>
    </div>
    <div style="border: 1px solid black; font-size: .75em;">
        <h4><center>Calibration Worksheet</center></h4>
    </div>
    <div style="font-size: .5em;">
        <center>CP-010: Calibration Worksheet for Single Range Electronic Balance</center>
    </div>
    <div style="font-size: .6em;">
        <table class="table" style="font-weight: bold; text-align: right;">
            <tr>
                <td style="width: 15%;">Certificate No.</td>
                <td style="width: 40%;"><input type="text"></td>
                <td style="width: 15%;">Date Received</td>
                <td style="width: 15%;"><input type="text"></td>
            </tr>
            <tr>
                <td>Customer</td>
                <td><input type="text"></td>
                <td>Date Calibrated</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Place of Calibration</td>
                <td><input type="text"></td>
                <td>Recom. Due Date</td>
                <td><input type="text"></td>
            </tr>
        </table>
    </div>
    <div style="font-weight: bold;">
        <table class="table" style=" text-align: right;">
            <thead style="font-size: .75em;">
                <tr>
                    <td colspan="4"><center>Specifications of the Weighing Instrument</center></td>
                </tr>  
            </thead>
            <tbody style="font-size: .6em;">
                <tr>
                    <td style="width: 18%;">Equipment Description</td>
                    <td style="width: 32%;"></td>
                    <td style="width: 32%;">Maximum Capacity (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
                    <td style="width: 18%;"></td>
                </tr>
                <tr>
                    <td>Manufacturer</td>
                    <td></td>
                    <td>Minimum Capacity (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Model</td>
                    <td><input type="text"></td>
                    <td>Readability (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
                    <td><input type="text"></td>
                </tr>
                <tr>
                    <td>Serial No.</td>
                    <td></td>
                    <td>e (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Equipment ID</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div style="font-weight: bold;">
        <table class="table">
            <thead style="font-size: .75em;">
                <tr>
                    <th colspan="4"><center>Environment Condition</center></th>
                </tr>
             </thead>
             <tbody style="font-size: .6em;">
                <tr>
                    <td style="width: 18%;">Start Temp (°C)</td>
                    <td style="width: 32%;"></td>
                    <td style="width: 32%;">End Temp (°C)</td>
                    <td style="width: 18%;"></td>
                </tr>
                <tr>
                    <td>Start RH (% RH)</td>
                    <td></td>
                    <td>End RH (% RH)</td>
                    <td></td>
                </tr>
             </tbody>
        </table>
    </div>

    <div>
        <table class="table4" style="">
            <thead style="font-size: .75em;">
                <tr>
                    <td colspan="6"><center><b>Weights</b></center></td>
                </tr>
            </thead>
            <tbody style="font-size: .45em;">
                <tr>
                    <td colspan="3" style="width: 55%;">
                        <label>
                            <input type="checkbox">Troemner Class E2 / SN 91096 (200 g), SN 91095 (100 g), SN 91094 (50 g), SN 91093 (10 g)
                        </label> 
                    </td>
                    <td colspan="2" style="width: 15%;">
                        <label for="">
                            <input type="checkbox">Troemner Class F2 / SN 57249 / 2 mg to 1 kg
                        </label>
                    </td>
                    <td style="width: 18%;" rowspan="2">
                        <label for="">
                            <input type="checkbox">Haefner Class F1 / SN 7740119 / 1 mg 500 7
                        </label>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <label for="">
                           <input type="checkbox">Troemner Class E2 / SN 4000014940 / 1 mg to 5 kg 
                        </label>
                    </td>
                    <td colspan="2">
                        <label for="">
                           <input type="checkbox">Haefner Class F2 / SN 6021214 / 20 kg
                        </label>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <label for="">
                           <input type="checkbox">Troemner Class F2 / SN 57248 / 1 mg to 20 kg
                        </label></td>
                    <td colspan="2">
                        <label for="">
                           <input type="checkbox">Haefner Class F2 / SN 6031214 / 1 mg to 10 kg
                        </label>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <label for="">
                           <input type="checkbox">Fuji Class M1 / SN 09000800 / 500 g to 5 kg
                        </label>
                    </td>
                    <td colspan="2">
                        <label for="">
                           <input type="checkbox">Haefner Class M1 / SN 4640918 / 1 g to 10 kg</td>
                        </label>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="">
                           <input type="checkbox">Fuji Class M2 
                        </label>
                        </td>
                    <td>
                        <label for="">
                           <input type="checkbox">A S/N: 10002070 (5 kg)
                           </label>
                    </td>
                    <td>
                        <label for="">
                           <input type="checkbox">B S/N: 03TW10-1 (10 kg)
                           </label>
                    </td>
                           
                    <td>
                        <label for="">
                           <input type="checkbox">C S/N: 03TW10-2 (10 kg)
                           </label>
                    </td>
                    <td>
                        <label for="">
                           <input type="checkbox">D S/N: 10007155 (20 kg)
                           </label>
                    </td>
                    <td>
                        <label for="">
                           <input type="checkbox">E S/N: 10007181 (20 kg)
                           </label>
                        </td>
                </tr>
                <tr>
                    <td>
                        <label for="">
                           <input type="checkbox">F S/N: 10007173 (20 kg)</label>
                    </td>
                    <td>
                        <label for="">
                           <input type="checkbox">G S/N: 10002114 (20 kg)</label>
                    </td>
                    <td>
                        <label for="">
                           <input type="checkbox">H S/N: 10002765 (20 kg)</label>
                    </td>
                    <td>
                        <label for="">
                           <input type="checkbox">I S/N: 10002780 (20 kg)</label>
                    </td>
                    <td>
                        <label for="">
                           <input type="checkbox">J S/N: 10007177 (20 kg)</label>
                    </td>
                    <td>
                        <label for="">
                           <input type="checkbox">K S/N: 10007174 (20 kg)</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="">
                           <input type="checkbox">L S/N: 10002129 (20 kg)</label>
                    </td> 
                    <td>
                        <label for="">
                           <input type="checkbox">M S/N: 10002113 (20 kg)</label>
                    </td> 
                    <td>
                        <label for="">
                           <input type="checkbox">N S/N: 10007172 (20 kg)</label>
                    </td> 
                    <td>
                        <label for="">
                           <input type="checkbox">O S/N: 10007167 (20 kg)</label>
                    </td> 
                    <td>
                        <label for="">
                           <input type="checkbox">P S/N: 10002781 (20 kg)</label>
                    </td> 
                    <td>
                        <label for="">
                           <input type="checkbox">Q S/N: 10007169 (20 kg)</label>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <table class="table4" style="height: 50px;">
            <thead style="font-size: .75em;">
                <tr>
                    <td colspan="2"><center><b>Preliminary Inspection</b></center></td>
                </tr>
            </thead>
            <tbody style="font-size: .5em;">
                <tr>
                    <td style="width: 50%;">
                        <label>
                            <input type="checkbox">The equipment should be free from dust and dirt
                        </label>
                    </td>
                    <td style="width: 50%;">
                        <label>
                            <input type="checkbox">Level the instrument if indicating means is provided and note its conditions
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            <input type="checkbox">The weighing pan should be clean and in proper form
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox">Check the tare mechanism if available
                        </label>
                    </td>
                </tr>
                <tr>
                    <td rowspan="2">
                        <label>
                            <input type="checkbox">The readout display shall be without defects (such as color changes) that would impair the reading of the indication</td>
                    </label>
                    <td>
                        <label>
                            <input type="checkbox">Exercise the instrument by loading up to 80% of maximum capacity
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            <input type="checkbox">Record all necessary and vital information
                        </label>
                    </td>
                </tr>
            </tbody>

        </table>
    </div>
    <div>
        <table class="table5"  style="font-size: .6em;">
            <tr>
                <td colspan="4"><center><b>Eccentricity Test</b></center></td>
            </tr>
            <tr>
                <th>Position</th>
                <th>Indication ( )</th>
                <th style="vertical-align: top;" colspan="2">Illustration</th>
            </tr>
            <tr>
                <td>1</td>
                <td><input type="text"></td>
                <td rowspan="6"><input type="radio"><img src="<?= $base64;?>" style="height: 70px;" alt=""></td>
                <td rowspan="6"><input type="radio"><img src="<?= $base64PAB;?>" style="height: 70px;" alt=""></td>
            </tr>
            <tr>
                <td>2</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>3</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>4</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>5</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>1</td>
                <td><input type="text"></td>
            </tr>
        </table>
    </div>
    <div>
        <table class="table5"  style="font-size: .6em;">
            <tr>
                <td colspan="3"><center><b>Linearity Test</b></center></td>
            </tr>
            <tr>
                <th>Load ( )</th>
                <th>Test weights used ( )</th>
                <th>Indication ( )</th>
            </tr>
            <tr>
                <td></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
            </tr>
        </table>
    </div>
    <div style="border: 1px solid black; ">
        <b style="font-size: .6em;"><center>Repeatability Test</center></b>
    </div>
    <div>
        <table class="table2" style="font-size: .6em;">
        </table>
    </div>
    <div>
        <table class="table" style="font-size: .6em;">
            <tr>
                <th>Trial</th>
                <th>Indication ( )</th>
                <th>Trial</th>
                <th>Indication ( )</th>
            </tr>
            <tr>
                <th>1</th>
                <th></th>
                <th>6</th>
                <th></th>
            </tr>
            <tr>
                <th>2</th>
                <th></th>
                <th>7</th>
                <th></th>
            </tr>
            <tr>
                <th>3</th>
                <th></th>
                <th>8</th>
                <th></th>
            </tr>
            <tr>
                <th>4</th>
                <th></th>
                <th>9</th>
                <th></th>
            </tr>
            <tr>
                <th>5</th>
                <th></th>
                <th>10</th>
                <th></th>
            </tr>
        </table>
    </div>
    <div style="margin-top: 5px;">
        <table class="table3" >
            <thead style="font-size: .5em;">
                <tr>
                    <td colspan="3" style="border: 1px solid #000;"><center>Remarks</center></td>
                </tr>
            </thead>
            <tbody style="font-size: .5em;">
                <tr>
                    <td style="width: 45%;">
                            <label>
                                <input type="checkbox">
                                Calibration was performed
                            </label>
                        </td>
                    <td style="width: 28%;"></td>
                    <td style="width: 27%;"></td>
                </tr>
                <tr>
                    <td>
                        <label>
                            <input type="checkbox">
                            No adjustment was done 
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox">
                            Internal adjustment was done 
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox">
                            External adjustment was done
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            <input type="checkbox">
                            Standard/s, accessory/ies, and UUC are in good condition before and after calibration
                        </label>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <label>
                            <input type="checkbox">
                            Others: ___________________________________________________________
                        </label>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <table class="table">
            <tr>
                <th>Calibrated by</th>
                <td></td>
                <th>Encoded by</th>
                <td></td>
                <th>Checked by</th>
                <td></td>
            </tr>
        </table>
    </div>
    <div style="font-size: .35em;">
        <table style=" border-collapse: collapse; border: none; width: 100%; text-align: right;">
            <tr><td>CP-010-F1 Rev. 0</td></tr>
            <tr><td>Effectivity Date: 2 November 2015</td></tr>
        </table>
    
    
    </div>
 </body>
   <style>
    * {
      margin: 0;
    }
.table {
    table-layout: fixed; /* Use fixed table layout */
    border-collapse: collapse; /* Optional: Collapses the border into a single border */
    width: 100%; /* Optional: Set the table width */
    border: 1px solid #000; /* 1px solid black border for the whole table */
    text-align: right;
}
.table th, .table td {
    border: 1px solid #000; /* 1px solid black border for table cells */
    padding: 2px; /* Optional: Add padding to cells for spacing */
    height: 5px;
    vertical-align: middle; /* Vertically align content within the cell */
}
input[type="text"] {
  border: none; /* Remove the border */
  /* Additional styling if needed */
}
.table2 {
  border-collapse: collapse; /* Optional: Collapses the border into a single border */
  width: 100%; /* Optional: Set the table width */
}
.table3 {
  border-collapse: collapse; /* Optional: Collapses the border into a single border */
  width: 100%; /* Optional: Set the table width */
}
.table3 th, .table3 td {
    text-align: left;
    padding: 2px;
}
.table4 {
    table-layout: fixed; /* Use fixed table layout */
    border-collapse: collapse; /* Optional: Collapses the border into a single border */
    width: 100%; /* Optional: Set the table width */
    border: 1px solid #000; /* 1px solid black border for the whole table */
    text-align: left;
}
.table4 th, .table4 td {
    vertical-align: center;
    border: 1px solid #000; /* 1px solid black border for table cells */
}
input[type="checkbox"] {
      transform: scale(.4); /* Adjust the scale value for the desired size */
      vertical-align: middle; /* Vertically align label and checkbox */
    }
    label{
      display: inline-block;
      cursor: pointer;
      vertical-align: middle; /* Vertically align label and checkbox */
    }
    .table5 {
    table-layout: fixed; /* Use fixed table layout */
    border-collapse: collapse; /* Optional: Collapses the border into a single border */
    width: 100%; /* Optional: Set the table width */
    border: 1px solid #000; /* 1px solid black border for the whole table */
    text-align: center;
}
.table5 th, .table5 td {
    border: 1px solid #000; /* 1px solid black border for table cells */
    padding: 2px; /* Optional: Add padding to cells for spacing */
    height: 12px;
    vertical-align: middle; /* Vertically align content within the cell */
}
table td{
    padding: 0;
}


   </style>
</html>   