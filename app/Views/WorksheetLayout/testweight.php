<?php 
ini_set('memory_limit', '1024M'); // or you could use 1G

    $path = 'image/dost smaller.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    $pathPAB = 'image/pab logo.png';
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
        <center><b>DOST CALABARZON</b></center>
        <center><p>Regional Metrology Laboratory</p></center>
        <center><b>TEST WEIGHTS AND MASS STANDARDS CALIBRATION WORKSHEET</b></center>
     </div>
    <div style="font-size: .6em;">
        <table class="table">
            <tr>
                <td style="width: 60%;">Certificate No.:________________________________________________</td>
                <td></td>
                <td style="width: 40%;">Date Received:_________________________________</td>
                <td></td>
            </tr>
            <tr>
                <td>Customer:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;________________________________________________</td>
                <td></td>
                <td>Laboratory:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_________________________________</td>
                <td colspan="2"></td>
            </tr>
        </table>
    </div>
    <div style="margin-top: 5px;">
        <table class="table4" >
            <thead style="font-size: .75em;">
                <tr>
                    <th colspan="5"><center>Calibration information</center></th>
                </tr>  
            </thead>
            <tbody style="font-size: .6em;">
                <tr>
                    <td style="width: 18%; vertical-align: middle; text-align: right;">Balance/Mass Comparator:</td>
                    <td style="width: 15%;">
                        <label>
                            <input type="checkbox">MCM2004
                        </label> 
                    </td>
                    <td style="width: 15%;">
                        <label>
                            <input type="checkbox">MCM60K3
                        </label> 
                    </td>
                    <td style="width: 25%;">
                        <label>
                            <input type="checkbox">XPE206DR
                        </label> 
                    </td>
                    <td></td>
                </tr>
                <tr style="font-size: .6em; text-align: center; font-style: italic;">
                    <td></td>
                    <td>Nominal Value</td>
                    <td>Marking</td>
                    <td colspan="2">Serial Number / Identification Number / Manufacturer / Description</td>
                </tr>
                <tr>
                    <td style="text-align: right;">Unit Under Calibration (UUC) :</td>
                    <td></td>
                    <td></td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td style="text-align: right;">Calibration standard :</td>
                    <td colspan="2"></td>
                    <td colspan="2" style="text-align: center; font-style: italic;">tick the box for standard used</td>
                </tr>
                <tr style="font-size: .6em; text-align: center; font-style: italic;">
                    <td></td>
                    <td>Start</td>
                    <td>Finish</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td style="text-align: right;">Date:</td>
                    <td></td>
                    <td></td>
                    <td>
                        <label>
                            <input type="checkbox">E2 / Troemner / 10 g / 91093</td>
                        </label> 
                    <td>
                        <label>
                            <input type="checkbox">E2 / Troemner / 50 g / 91094</td>
                        </label> 
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right;">Time:</td>
                    <td></td>
                    <td></td>
                    <td>
                        <label><input type="checkbox">E2 / Troemner / 100 g / 91095</label>
                    </td>
                    <td><label><input type="checkbox">E2 / Troemner / 200 g / 91096</label></td>
                </tr>
                <tr>
                    <td style="text-align: right;">Temperature (°C):</td>
                    <td></td>
                    <td></td>
                    <td><label><input type="checkbox">E2 / Troemner / 4000014940</label></td>
                    <td><label><input type="checkbox">F1 / Haefner / 7740119</label></td>
                </tr>
                <tr>
                    <td style="text-align: right;">Humidity (%RH):</td>
                    <td></td>
                    <td></td>
                    <td><label><input type="checkbox">F2 / Haefner / 6031214</label></td>
                    <td><label><input type="checkbox">F2 / Haefner / 20 kg / 6021214</label></td>
                </tr>
                <tr>
                    <td style="text-align: right;">Pressure (hPa):</td>
                    <td></td>
                    <td></td>
                    <td><label><input type="checkbox">F2 / Troemner / 57248</label></td>
                    <td><label><input type="checkbox">F2 / Troemner / 57249</label></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <table class="table4" style="">
            <thead style="font-size: .75em;">
                <tr>
                    <td colspan="6"><center>Raw data (g)</center></td>
                </tr>
                <tr style="text-align: center;">
                    <td colspan="2">material of UUC*<br><i style="font-size: .75em;">(for density of material used)</i></td>
                    <td><b>A<sub>1</sub></b><i>(standard)</i></td>
                    <td><b>B<sub>1</sub></b><i>(UUC)</i></td>
                    <td><b>B<sub>2</sub></b><i>(UUC)</i></td>
                    <td><b>A<sub>1</sub></b><i>(standard)</i></td>
                </tr>
            </thead>
            <tbody style="font-size: .5em;">
                <tr>
                    <td><label><input type="checkbox">Platinum</label></td>
                    <td><label><input type="checkbox">Iron</label></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox">Nickel silver</label></td>
                    <td><label><input type="checkbox">Cast iron (white)</label></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox">Brass</label></td>
                    <td><label><input type="checkbox">Cast iron (gray)</label></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox">Stainless steel</label></td>
                    <td><label><input type="checkbox">Aluminum</label></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox">Carbon steel</label></td>
                    <td style="font-size: .6em; vertical-align: bottom; text-align: right; padding: 1px;"><i>*OIML R 111-1 Table B.7</i></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div style="margin-top: 5px;">
        <table class="table4" >
            <thead style="font-size: .75em;">
                <tr>
                    <th colspan="5"><center>Calibration information</center></th>
                </tr>  
            </thead>
            <tbody style="font-size: .6em;">
                <tr>
                    <td style="width: 18%; vertical-align: middle; text-align: right;">Balance/Mass Comparator:</td>
                    <td style="width: 15%;">
                        <label>
                            <input type="checkbox">MCM2004
                        </label> 
                    </td>
                    <td style="width: 15%;">
                        <label>
                            <input type="checkbox">MCM60K3
                        </label> 
                    </td>
                    <td style="width: 25%;">
                        <label>
                            <input type="checkbox">XPE206DR
                        </label> 
                    </td>
                    <td></td>
                </tr>
                <tr style="font-size: .6em; text-align: center; font-style: italic;">
                    <td></td>
                    <td>Nominal Value</td>
                    <td>Marking</td>
                    <td colspan="2">Serial Number / Identification Number / Manufacturer / Description</td>
                </tr>
                <tr>
                    <td style="text-align: right;">Unit Under Calibration (UUC) :</td>
                    <td></td>
                    <td></td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td style="text-align: right;">Calibration standard :</td>
                    <td colspan="2"></td>
                    <td colspan="2" style="text-align: center; font-style: italic;">tick the box for standard used</td>
                </tr>
                <tr style="font-size: .6em; text-align: center; font-style: italic;">
                    <td></td>
                    <td>Start</td>
                    <td>Finish</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td style="text-align: right;">Date:</td>
                    <td></td>
                    <td></td>
                    <td>
                        <label>
                            <input type="checkbox">E2 / Troemner / 10 g / 91093</td>
                        </label> 
                    <td>
                        <label>
                            <input type="checkbox">E2 / Troemner / 50 g / 91094</td>
                        </label> 
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right;">Time:</td>
                    <td></td>
                    <td></td>
                    <td>
                        <label><input type="checkbox">E2 / Troemner / 100 g / 91095</label>
                    </td>
                    <td><label><input type="checkbox">E2 / Troemner / 200 g / 91096</label></td>
                </tr>
                <tr>
                    <td style="text-align: right;">Temperature (°C):</td>
                    <td></td>
                    <td></td>
                    <td><label><input type="checkbox">E2 / Troemner / 4000014940</label></td>
                    <td><label><input type="checkbox">F1 / Haefner / 7740119</label></td>
                </tr>
                <tr>
                    <td style="text-align: right;">Humidity (%RH):</td>
                    <td></td>
                    <td></td>
                    <td><label><input type="checkbox">F2 / Haefner / 6031214</label></td>
                    <td><label><input type="checkbox">F2 / Haefner / 20 kg / 6021214</label></td>
                </tr>
                <tr>
                    <td style="text-align: right;">Pressure (hPa):</td>
                    <td></td>
                    <td></td>
                    <td><label><input type="checkbox">F2 / Troemner / 57248</label></td>
                    <td><label><input type="checkbox">F2 / Troemner / 57249</label></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <table class="table4" style="">
            <thead style="font-size: .75em;">
                <tr>
                    <td colspan="6"><center>Raw data (g)</center></td>
                </tr>
                <tr style="text-align: center;">
                    <td colspan="2">material of UUC*<br><i style="font-size: .75em;">(for density of material used)</i></td>
                    <td><b>A<sub>1</sub></b><i>(standard)</i></td>
                    <td><b>B<sub>1</sub></b><i>(UUC)</i></td>
                    <td><b>B<sub>2</sub></b><i>(UUC)</i></td>
                    <td><b>A<sub>1</sub></b><i>(standard)</i></td>
                </tr>
            </thead>
            <tbody style="font-size: .5em;">
                <tr>
                    <td><label><input type="checkbox">Platinum</label></td>
                    <td><label><input type="checkbox">Iron</label></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox">Nickel silver</label></td>
                    <td><label><input type="checkbox">Cast iron (white)</label></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox">Brass</label></td>
                    <td><label><input type="checkbox">Cast iron (gray)</label></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox">Stainless steel</label></td>
                    <td><label><input type="checkbox">Aluminum</label></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox">Carbon steel</label></td>
                    <td style="font-size: .6em; vertical-align: bottom; text-align: right; padding: 1px;"><i>*OIML R 111-1 Table B.7</i></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

    
    <div style="margin-top: 5px;">
        <table class="table4" >
            <thead style="font-size: .75em;">
                <tr>
                    <th colspan="5"><center>Calibration information</center></th>
                </tr>  
            </thead>
            <tbody style="font-size: .6em;">
                <tr>
                    <td style="width: 18%; vertical-align: middle; text-align: right;">Balance/Mass Comparator:</td>
                    <td style="width: 15%;">
                        <label>
                            <input type="checkbox">MCM2004
                        </label> 
                    </td>
                    <td style="width: 15%;">
                        <label>
                            <input type="checkbox">MCM60K3
                        </label> 
                    </td>
                    <td style="width: 25%;">
                        <label>
                            <input type="checkbox">XPE206DR
                        </label> 
                    </td>
                    <td></td>
                </tr>
                <tr style="font-size: .6em; text-align: center; font-style: italic;">
                    <td></td>
                    <td>Nominal Value</td>
                    <td>Marking</td>
                    <td colspan="2">Serial Number / Identification Number / Manufacturer / Description</td>
                </tr>
                <tr>
                    <td style="text-align: right;">Unit Under Calibration (UUC) :</td>
                    <td></td>
                    <td></td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td style="text-align: right;">Calibration standard :</td>
                    <td colspan="2"></td>
                    <td colspan="2" style="text-align: center; font-style: italic;">tick the box for standard used</td>
                </tr>
                <tr style="font-size: .6em; text-align: center; font-style: italic;">
                    <td></td>
                    <td>Start</td>
                    <td>Finish</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td style="text-align: right;">Date:</td>
                    <td></td>
                    <td></td>
                    <td>
                        <label>
                            <input type="checkbox">E2 / Troemner / 10 g / 91093</td>
                        </label> 
                    <td>
                        <label>
                            <input type="checkbox">E2 / Troemner / 50 g / 91094</td>
                        </label> 
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right;">Time:</td>
                    <td></td>
                    <td></td>
                    <td>
                        <label><input type="checkbox">E2 / Troemner / 100 g / 91095</label>
                    </td>
                    <td><label><input type="checkbox">E2 / Troemner / 200 g / 91096</label></td>
                </tr>
                <tr>
                    <td style="text-align: right;">Temperature (°C):</td>
                    <td></td>
                    <td></td>
                    <td><label><input type="checkbox">E2 / Troemner / 4000014940</label></td>
                    <td><label><input type="checkbox">F1 / Haefner / 7740119</label></td>
                </tr>
                <tr>
                    <td style="text-align: right;">Humidity (%RH):</td>
                    <td></td>
                    <td></td>
                    <td><label><input type="checkbox">F2 / Haefner / 6031214</label></td>
                    <td><label><input type="checkbox">F2 / Haefner / 20 kg / 6021214</label></td>
                </tr>
                <tr>
                    <td style="text-align: right;">Pressure (hPa):</td>
                    <td></td>
                    <td></td>
                    <td><label><input type="checkbox">F2 / Troemner / 57248</label></td>
                    <td><label><input type="checkbox">F2 / Troemner / 57249</label></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <table class="table4" style="">
            <thead style="font-size: .75em;">
                <tr>
                    <td colspan="6"><center>Raw data (g)</center></td>
                </tr>
                <tr style="text-align: center;">
                    <td colspan="2">material of UUC*<br><i style="font-size: .75em;">(for density of material used)</i></td>
                    <td><b>A<sub>1</sub></b><i>(standard)</i></td>
                    <td><b>B<sub>1</sub></b><i>(UUC)</i></td>
                    <td><b>B<sub>2</sub></b><i>(UUC)</i></td>
                    <td><b>A<sub>1</sub></b><i>(standard)</i></td>
                </tr>
            </thead>
            <tbody style="font-size: .5em;">
                <tr>
                    <td><label><input type="checkbox">Platinum</label></td>
                    <td><label><input type="checkbox">Iron</label></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox">Nickel silver</label></td>
                    <td><label><input type="checkbox">Cast iron (white)</label></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox">Brass</label></td>
                    <td><label><input type="checkbox">Cast iron (gray)</label></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox">Stainless steel</label></td>
                    <td><label><input type="checkbox">Aluminum</label></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox">Carbon steel</label></td>
                    <td style="font-size: .6em; vertical-align: bottom; text-align: right; padding: 1px;"><i>*OIML R 111-1 Table B.7</i></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>



    <div style="font-size: .7em; margin-top: 5px;">
        <table class="table">
            <tr>
                <td>Calibrated by: _______________________</td>
                <td>Encoded by: _______________________</td>
                <td>Checked by: _______________________</td>
            </tr>
        </table>
    </div>
    <div style="font-size: .5em; margin-top: 15px;">
        <table style=" border-collapse: collapse; border: none; width: 100%; text-align: right;">
            <tr><td>CP-003-F1 Rev.1</td></tr>
            <tr><td>Effectivity date: 12 November 2021</td></tr>
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
    border: 1px solid white; /* 1px solid black border for the whole table */
    text-align: left;
}
.table th, .table td {
    border: 1px solid white; /* 1px solid black border for table cells */
    padding: 2px; /* Optional: Add padding to cells for spacing */
    height: 5px;
    
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
    height: 5px;
    overflow: auto;
    position: absolute;
}


   </style>
</html>   