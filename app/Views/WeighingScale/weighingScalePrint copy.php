<?php
    use App\Models\ElectModel_image;
    use App\Models\TestWeightStandardDetailsModel;
    use App\Models\ElectModel_2;
    $electStandardTable = new ElectModel_2();
    $arrayOfWeights = $weighingScaleData['standardUsed'];
    $pieces = explode(",", $arrayOfWeights);
    $elect_table_2[] = $electStandardTable->whereIn('serialNumber',  $pieces)->findAll();   
    $electImageTable = new ElectModel_image();
    $image[] = $electImageTable->where('certificateNumber',  $weighingScaleData['certificateNumber'])->first();

    $path = 'image/dost.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    $pathPAB = 'image/pab logo.png';
    $typePAB = pathinfo($pathPAB, PATHINFO_EXTENSION);
    $dataPAB = file_get_contents($pathPAB);
    $base64PAB = 'data:image/' . $typePAB . ';base64,' . base64_encode($dataPAB);

    $specific = json_decode($weighingScaleData['specificationData'],true);
    $environmentData = json_decode($weighingScaleData['environmentData'],true);
    $spanCalibration = json_decode($weighingScaleData['spanCalibrationData'],true);
    $sensitivity = json_decode($weighingScaleData['sensitivityTestData'],true);
    $eccentricity = json_decode($weighingScaleData['eccentricityTestData'],true);
    $repeatability = json_decode($weighingScaleData['repeatabilityTestData'],true);
?>
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
<!DOCTYPE html>
<html>
<head>
<title>RML ++</title>
<!--FONTAWESOME CDN-->
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
     <!--FONTAWESOME CDN-->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=0.6, user-scalable=no ">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">  
    <style>
        <?php include 'css/bootstrap.css'; ?>
    </style>
</head>
<body style="margin: 0; padding: 0; font-family: Calibri; font-size: 16px;">
    <div class="card mt-2 mx-auto text-center col-12" style="width: 100%;">
    <div class="">
	<!-- HEADER --> 
			<div class="row text-left mt-4">
				<div class="col mx-5 p-5">
                    <h1 class="card-title mt-4">Non-automatic Weighing Instrument</h1>
                    <h4 class="card-title mb-4">Calibration Certificate (View)</h4></div>
                    <div class="col-xl-2 col-md-2 col-sm-3 col-6 text-center float-center mr-5">
                    
                    <form action="/weighingScaleUpdatePab" method="POST" id="pabForm">
                        <div class="input-group mb-3">
                            <input type="hidden" value="<?php echo $weighingScaleData['id']; ?>" name="id">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                <?php if($weighingScaleData['PabLogo']=='true'){
                                    echo '<input type="checkbox" checked id="checkBoxPabLogo" onclick="pabLOGO(\''.$base64PAB.'\');">';
                                }else{
                                    echo '<input type="checkbox" id="checkBoxPabLogo" onclick="pabLOGO(\''.$base64PAB.'\');">';
                                }?>
                                    <input type="hidden" value="" name="pablogoValue" id="pablogoValue">
                                </div>
                            </div>
                            <Label for="checkBoxPabLogo">
                                <?php if($weighingScaleData['PabLogo']=='true'){
                                    echo '<img src="'.$base64PAB.'" alt="No PAB LOGO" id="pabLogo" height="150px">';
                                }else{
                                    echo ' <img src="" alt="No PAB LOGO" id="pabLogo" height="150px">';
                                }?>
                                   
                            </Label>
                            
                            </div>
                            <input type="submit" value="update">
                        </form>                               
				</div>
			</div>
    <!-- HEADER -->	
    </div> <hr>
        <div class="container">
        <form action="">   
            <div class="row">
                <div class="col col-sm-6 text-left">
                    <label class="">Certificate Number:</label> 
                    <h4 class="mt-n2"><?php echo $weighingScaleData['certificateNumber']?></h4>   
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-6 text-left">
                    <label>Customer:</label> 
                    <h4 class="mt-n2"><?php echo $weighingScaleData['customer']?></h4>   
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-6 text-left">
                    <label>Address:</label> 
                    <h4 class="mt-n2"><?php echo $weighingScaleData['address']?></h4>   
                </div>
            </div>

             <div class="row">
                    <div class="col-xl-6 col-sm-6 text-left">
                        <label>Equipment Description: </label>
                        <h4 class="mt-n2"><?php echo $specific['specifications']['equipmentDescription']?></h4>  
                    </div>
                    <div class="col-xl-2 col-sm-6 text-left">
                        <label class="">Date Received: </label>
                        <h4 class="mt-n2">
                        <?php 
                            $date = $weighingScaleData['dateReceived']; 
                            $mysql_date = date('Y-m-d G:i:s', strtotime($date));
                            $date2 = $weighingScaleData['dateCalibrated']; 
                            $mysql_date2 = date('Y-m-d G:i:s', strtotime($date2));
                            $date3 = $weighingScaleData['recommendedDueDate']; 
                            $mysql_date3 = date('Y-m-d G:i:s', strtotime($date3));
                        ?>
                        <?php echo date('d F Y', strtotime($mysql_date));?></h4> 
                    </div>
                </div>


                <div class="row text-left">
                    <div class="col-xl-6 col-sm-6">
                        <label>Manufacturer: </label>
                        <h4 class="mt-n2"><?php echo $specific['specifications']['manufacturer']?></h4>    
                    </div>
                    <div class="col-xl-2 col-sm-6">
                        <label class="">Date Calibrated: </label>
                        <h4 class="mt-n2"><?php echo date('d F Y', strtotime($mysql_date2));?></h4>    
                    </div>
                </div>
                <div class="row text-left">
                    <div class="col-xl-2 col-sm-6">
                        <label class="">Reccomended Due Date: </label>
                        <h4 class="mt-n2"><?php echo date('d F Y', strtotime($mysql_date3));?></h4>    
                    </div>
                </div>
                <div class="row text-left">
                    <div class="col-xl-6 col-sm-6">
                        <label>Serial Number: </label>
                        <h4 class="mt-n2"><?php echo $specific['specifications']['serialNumber']?></h4>    
                    </div>
                    <div class="col-xl-2 col-sm-6">
                        <label class="">Place of Calibration: </label>
                        <h4 class="mt-n2"><?php echo $weighingScaleData['placeOfCalibration']?></h4>    
                    </div>
                </div>
                
                <div class="row text-left">
                    <div class="col-xl-2 col-sm-6">
                        <label>Date of issue: </label>
                        <input type="date" class="form-control" id="datePicker" onchange="document.getElementById('datePrev').value = this.value; document.getElementById('datePrevDown').value = this.value; document.getElementById('datePrevFull').value = this.value;">
                    </div>
                </div>

                   
            
    <hr>

            <table class="table table-borderless d-none">
                <tr>
                    <td class="col-3"><u><b>Standard Used</b></u></td>
                    <td class="col-3"><u><b>Calibration Certificate No.</b></u></td>
                    <td class="col-3"><u><b>Issuing laboratory</b></u></td>
                </tr>
                 
                    <?php foreach($elect_table_2 as $value){
                       foreach($value as $serial){
                        echo 
                        "<tr><td class='col-3'>". $serial['serialNumber']."<br></td>"."<td class='col-3'>". $serial['certificateNumber']."<br></td>"."<td class='col-3'>". $serial['calibrationProvider']."<br></td>"."</tr>";
                    }}
                    ?>
            </table>
        </form>
    <hr>   

            <button type="button" class="btn btn-primary mt-3 d-none" data-toggle="modal" data-target="#imageModal">
                View Image of Unit
            </button>
    <br> 
    <div id="forVerificationButtons">
    </div>
    <hr> 
   
    <br>
    <div>
        <form name="verifyForm" action="/testWeightVerify" method="post">
            <input type="hidden" name="completion" id="" value="For printing">
            <input type="hidden" value="<?php echo $weighingScaleData['id']; ?>" name="idVerify" id="idVerify">
        </form>
        <form name="correctionForm" action="/testWeightCorrection" method="post">
            <input type="hidden" name="completion" id="" value="For correction">
            <input type="hidden" value="<?php echo $weighingScaleData['id']; ?>" name="idCorrection">
        </form>
    </div>

            <div class="btn-group" role="group" style="position:fixed;display:flex; flex-direction:row;align-content:center; bottom:0; z-index:99; border:solid 0px">
                <form class="btn" action="<?= base_url('weighingScalePDF/'.$weighingScaleData['id']) ?>" method="POST" target="iframeHere" id="prevForm" rel="noopener"><!--iframeHere-->
                    <input type="hidden" name="unitPrev" id="unitPrev" value="g">
                    <input type="hidden" name="pagerPrev" id="pagerPrev">
                    <input type="hidden" name="datePrev" id="datePrev">
                    <input type="hidden" name="bouyancyPrev" id="bouyancyPrev">
                    <input type="hidden" name="PDFState" value="Preview">
                    <input type="hidden" name="chart" id="chartPrev"> 
                    <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#previewModal">
                        <i class="far fa-eye"></i> Preview PDF
                    </button>
                </form>
                <form class="btn" action="<?= base_url('weighingScalePDF/'.$weighingScaleData['id']) ?>" method="POST" target="_blank" id="downForm" name="downForm" rel="noopener">
                    <input type="hidden" name="unitDown" id="unitDown">
                    <input type="hidden" name="datePrevDown" id="datePrevDown">
                    <input type="hidden" name="datePrev" id="Date">
                    <input type="hidden" name="bouyancyDown" id="bouyancyDown">
                    <input type="hidden" name="PDFState" value="Download">
                    <input type="hidden" name="imageDraftDown" id='imageDraftDown' value="false">
                    <input type="hidden" name="chart" id="chartDown"> 
                    <button type="button" class="btn btn-info" onclick="setToNotDraft()">
                        <i class="fas fa-file-download"></i>Download PDF
                    </button>
                </form>
                
                <div class="btn">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#EditModal">
                    <i class="fas fa-edit"></i>   
                    Edit Remarks
                    </button>
                </div>

                <div class="btn">
                    <button type="button" class="btn btn-success" onclick="setToDraft()">
                    <i class="fas fa-edit"></i>   
                    Download Draft
                    </button>
                </div>
                <div class="btn">
                    <a class="btn btn-danger" id='backButton'><i class="fas fa-arrow-circle-left"></i> Back</a>
                </div>
                <div class="btn" id='forverification'>
                </div>
            </div>
            <div id="lineChart" style="height:300px width:1338.68px; border: 0px solid black;justify-content:center;display:flex; z-index:1;" ></div>
            <!-- <div id="lineChart" style="height:3000 width:1338.68px; border: 0px solid black;justify-content:center;display:flex; z-index:1;" ></div> -->
    </div>
    </div>
    </div>
<br>
<br>
<br>
<br>
  

 
<!-- PDF preview -->
    <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Preview <code class="h6">(May Not Work on Mobile Devices)</code> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <form class="btn" action="<?= base_url('weighingScalePDF/'.$weighingScaleData['id']) ?>" method="POST" target="_blank" id="downForm" rel="noopener">
                    <input type="hidden" name="unitFull" id="unitFull" value="g">
                    <input type="hidden" name="pagerFull" id="pagerFull">
                    <input type="hidden" name="datePrevFull" id="datePrevFull">
                    <input type="hidden" name="bouyancyPrev" id="bouyancyPrevFull">
                    <input type="hidden" name="PDFState" value="PreviewFull">
                    <input type="hidden" name="chart" id="chartPrevFull"> 
                    <button type="submit" class="btn btn-info">
                       View PDF
                    </button>
                </form>
                </button>
            </div>
            <div class="modal-body"style="height:50%">
                <div class="embed-responsive embed-responsive-1by1"  style="height:25em">
                    <iframe class="embed-responsive-item" name="iframeHere" title="description"></iframe>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
<!-- PDF preview -->
<!-- Image preview -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Image of Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="" style="justify-content:center;">
                <img src="/<?php if($image[0]!=null){echo "uploads/".$image[0]['image'];}else{echo " ";}?>" width="100%" height="100%" style="border:1px solid black"alt="No Image">
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
<!-- Image preview -->
<!-- Edit Words -->
    <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Fixed Sentences</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="" style="justify-content:center;">
                    <form name="updateRemarksForm" method="post" action="<?php echo base_URL('weighingScaleUpdateWord')?>">
                        <input type="hidden" name="idHere" value="<?=$weighingScaleData['id']?>">
                        <div class="form-group">
                            <label for="CalibrationProcedureandTraceability">Calibration Procedure and Traceability</label>
                            <textarea class="form-control" id="CalibrationProcedureandTraceability" rows="3" name="settingCalibrationProcedureAndTraceability"><?=$weighingScaleData['settingCalibrationProcedureAndTraceability']?></textarea>
                        </div> 
                        <div class="form-group">
                            <label for="UncertaintyofMeasurement">Uncertainty of Measurement</label>
                            <textarea class="form-control" id="UncertaintyofMeasurement" rows="3" name="settingUncertaintyOfMeasurement"><?=$weighingScaleData['settingUncertaintyOfMeasurement']?></textarea>
                        </div> 
                        <div class="form-group">
                            <label for="CalibrationResults">Calibration Results</label>
                            <textarea class="form-control" id="CalibrationResults" rows="3" name="settingCalibrationResults"><?=$weighingScaleData['settingCalibrationResults']?></textarea>
                        </div>
                        <div class="form-group" id="remarksDiv">
                            
                        </div>
                        <div class="form-group" id="remarksButton">

                        </div>
                        <input type="hidden" name="remarkHere" id="remarkHere">
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" onclick="mergeRemarks()">Update</button>
            </div>
        </form>
            </div>
        </div>
    </div>
<!-- Edit Words -->

</body>
</html>  
    <script src="/js/scripts/loader.js"></script>
    <script src="/js/scripts/chart.min.js"></script>
    <script src="/js/scripts/jquery-3.6.3.min.js"></script>
    <script src="/js/scripts/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="/js/scripts/plotly.min.js"></script>

    <script type="text/javascript" src="/js/ElectEdit.js"></script>
    <script>
        var countOfRemarks = 0;
        var remarkRaw = '<?=$weighingScaleData['settingRemarks']?>';
        const dataInputs = <?=$weighingScaleData['dataInputs']?>;

        function createChart(data){
            let array_x = [];
            let array_y = [];
            let array_err = [];
            let array_label = [];
            let array_range = [$('#min').val(), $('#max').val()];
            let tickFormat = '.'+ $('#vFormat').val() +'f';

            var chartImage= $('#chartImage');

            data.forEach(element => {
                array_x.push(parseFloat(element.x));
                array_y.push(parseFloat(element.y));
                array_err.push(parseFloat((element.err).toPrecision(2)));
                array_label.push(element.x);
            });

            const trace = {
                x: array_x,
                y: array_y,
                error_y: {
                    type: 'data',
                    array: array_err,
                    visible: true,
                    color: 'red',
                },
                type: 'scatter',
                mode: 'markers',
                marker: {
                    size: 12, 
                },    
            };

            var data = [trace];

            const layout = {
                xaxis : {
                    'type':'category',
                    'title': '<i>Load ('+equipmentInfo['unit']+')</i>',
                    'tickmode': 'array',
                    'tickvals': array_x,
                    'ticktext': array_label,
                    'showgrid': false,
                },  
                yaxis : {
                    'title': {
                        'text':'<i>Error ('+equipmentInfo['unit']+')</i>',
                        'standoff': 10
                    },
                    'tickformat': tickFormat, // number of decimal points in y-axis label .4f = 0.0000, .5f = 0.00000
                    'showgrid': false,
                    'range': array_range,
                },
                margin : {
                    t:50,
                    l:100,
                    r:30
                }
            };

            Plotly.newPlot('polyChart', data, layout).then(function(gd){
                Plotly.toImage(
                    gd,{
                        'format':'png',
                    }
                ).then(
                    function(url){
                        chartImage.attr("src", url);
                        $('#chart_input').val(url)
                    }
                )
            })
        }

        function layoutRemarks(){
            var remarksDiv = document.getElementById('remarksDiv');
            var remarksButton = document.getElementById('remarksButton');
            const remarkSplited = remarkRaw.split('(splitHere)');
            remarkSplited.forEach((value,index)=>{
                var label = document.createElement('label');
                var textarea = document.createElement('textarea');
                label.setAttribute('for','remarks'+(index+1));
                label.innerHTML='Remark '+(index+1);
                textarea.setAttribute('class','form-control');
                textarea.setAttribute('id','remarks'+(index+1));
                textarea.setAttribute('rows','3');
                textarea.innerHTML = value;
                remarksDiv.appendChild(label);
                remarksDiv.appendChild(textarea);
                countOfRemarks++;
            })

            
            var button = document.createElement('button');
            button.setAttribute('class','btn btn-warning mt-3');
            button.setAttribute('type','button');
            button.setAttribute('id','AddRemarksButton');
            button.setAttribute('onclick', `addRemark();`)
            button.innerHTML = `Add Remark`;
            remarksButton.appendChild(button);

            var button = document.createElement('button');
            button.setAttribute('class','btn btn-danger mt-3');
            button.setAttribute('type','button');
            button.setAttribute('id','deleteRemarksButton');
            button.setAttribute('onclick', `deleteRemark();`)
            button.innerHTML = `Delete Remark`;
            remarksButton.appendChild(button);
        }      

        function mergeRemarks(){
            var input = document.getElementById('remarkHere').value;
            for (var i = 1; i <= countOfRemarks; i++) {
                if(i!=countOfRemarks){
                    document.getElementById('remarkHere').value += document.getElementById('remarks'+i).value+"(splitHere)";
                }else{
                    document.getElementById('remarkHere').value += document.getElementById('remarks'+i).value;
                }
            }
            document.updateRemarksForm.submit();
        }

        function addRemark(){
            var remarksDiv = document.getElementById('remarksDiv');
            var label = document.createElement('label');
            var textarea = document.createElement('textarea');
            label.setAttribute('for','remarks'+(countOfRemarks+1));
            label.innerHTML='Remark '+(countOfRemarks+1);
            textarea.setAttribute('class','form-control');
            textarea.setAttribute('id','remarks'+(countOfRemarks+1));
            textarea.setAttribute('rows','3');
            remarksDiv.appendChild(label);
            remarksDiv.appendChild(textarea);
            countOfRemarks++;
        }
        function countKeysWithPattern(data, pattern){
            let count = 0;
            // let json_data = JSON.parse(data);
            let json_data = data;
            for (let key in json_data) {
            if (key.startsWith(pattern)) {
                count++;
            }
            }
            return count;
        }
        function findMinMaxInArrayOfArrays(arrayOfArrays){
            var flatArray = $.map(arrayOfArrays, function (value) {
                return $.grep(value, function (item) {
                    return typeof item === 'number';
                });
            });

            var min = Math.min.apply(null, flatArray);
            var max = Math.max.apply(null, flatArray);

            var objectMinMax = {};

            for (var i = 0; i < flatArray.length; i++) {
                if (typeof flatArray[i] === 'object') {
                    for (var prop in flatArray[i]) {
                        if (flatArray[i].hasOwnProperty(prop)) {
                            if (objectMinMax[prop]) {
                                objectMinMax[prop].min = Math.min(objectMinMax[prop].min, flatArray[i][prop]);
                                objectMinMax[prop].max = Math.max(objectMinMax[prop].max, flatArray[i][prop]);
                            } else {
                                objectMinMax[prop] = {
                                    min: flatArray[i][prop],
                                    max: flatArray[i][prop]
                                };
                            }
                        }
                    }
                }
            }

            return {
                min: min,
                max: max,
                objectMinMax: objectMinMax
            };
        }

        const deleteRemark = () =>{
            var remarksDiv = document.getElementById('remarksDiv');
            for (let i = 0; i < 2; i++) {
                var childCount = remarksDiv.childElementCount;
                // -3 because it starts at 0 and theres 2 button at the end
                remarksDiv.removeChild(remarksDiv.children[(childCount-1)]);      
            }
            countOfRemarks--;
        }
        layoutRemarks()

        //blue = upward
        //red = downward

        function getDataPointsForCharts(){
            let numberOftestPoint = countKeysWithPattern(dataInputs, 'NominalValueRow')
            //let array_datapoints = [['Nominal Value', 'Upward', 'Downward']];
            let array_datapoints = [];
            for (let index = 1; index < numberOftestPoint; index++) {
                let datapoints = [];
                let NominalValueRowkey = 'NominalValueRow'+index;
                let ConventionalMassRowkey = 'ConventionalMassRow'+index;
                let UpwardRowkey = 'UpwardRow'+index;
                let DownwardRowkey = 'DownwardRow'+index;

                let conventionalMassValue = Number(dataInputs[ConventionalMassRowkey]);
                let conventionalMassValuecompute = Number(conventionalMassValue.toFixed(1))/1000;
                let indicationUpward = Number(dataInputs[UpwardRowkey]);
                let indicationDownward = Number(dataInputs[DownwardRowkey]);
                let errorUpward = Number((indicationUpward - conventionalMassValuecompute).toPrecision(2));
                let errorDownward = Number((indicationDownward - conventionalMassValuecompute).toPrecision(2));

                

                datapoints.push((dataInputs[NominalValueRowkey]));
                datapoints.push(errorUpward);
                datapoints.push(errorDownward);

                array_datapoints.push(datapoints);
            }
            console.log(array_datapoints)
            return array_datapoints;

        }

        function getDataPointsForxAxis(){
            let numberOftestPoint = countKeysWithPattern(dataInputs, 'NominalValueRow')
            let array_datapoints = [];
            for (let index = 1; index < numberOftestPoint; index++) {
                let datapoints = [];
                let NominalValueRowkey = 'NominalValueRow'+index;
                if(index == numberOftestPoint){
                    array_datapoints.push('null');
                }else{
                    array_datapoints.push(Number(dataInputs[NominalValueRowkey]));
                }
            }

            return array_datapoints;
        }

        function createIntervals(min, max, n){
            const intervalSize = (max - min) / (n - 1);
            const intervals = [];
            for (let i = 0; i < n; i++) {
                intervals.push(Number((min + i * intervalSize).toPrecision(2)));
            }
            return intervals;
        }

        function makeChart(){
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            let dataPoints = getDataPointsForCharts();
            let minMax = findMinMaxInArrayOfArrays(dataPoints);

            let errorPoints = createIntervals(minMax.min, minMax.max, 10);
           

            function drawChart(){
                //var data = google.visualization.arrayToDataTable(getDataPointsForCharts());
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Nominal Value');
                data.addColumn('number', 'Upward');
                data.addColumn('number', 'Downward');

                data.addRows(dataPoints);

               var options = {
                    curveType: 'function',
                    legend: { position: 'right' },
                    series: {
                        0: { color: 'blue', pointSize: 8, pointShape:'square' },
                        1: { color: 'red', lineDashStyle: [4, 4], pointSize: 8, pointShape:'square' } 
                    },
                    vAxis: {
                        format: '0.00',
                        title: 'Error',

                        ticks: errorPoints,

                    },
                 
                };

                var chart = new google.visualization.LineChart(document.getElementById('lineChart'));
                
                var lineChart = document.getElementById('lineChart');
                var chartPrev = document.getElementById('chartPrev');
                var chartDown = document.getElementById('chartDown');
                var chartPrevFull = document.getElementById('chartPrevFull');
                
                google.visualization.events.addListener(chart, 'ready', function () {
                    chartPrev.value = chart.getImageURI();
                    chartDown.value = chart.getImageURI();
                    chartPrevFull.value = chart.getImageURI();
                }); 

                chart.draw(data, options);
               
            }
        }
        makeChart()
          
        document.getElementById('datePicker').valueAsDate = new Date(); 
    </script>
    <script>
        var role = '<?= $_SESSION['role'];?>';
        var page = '<?= $forVerification;?>';
        
        if(role == 'admin' && page == 'forVerification'){
            var div = document.getElementById('forverification');
            var buttonDiv = document.getElementById('forVerificationButtons');
            var backButton = document.getElementById('backButton');

            
            var a = document.createElement('a');
            a.setAttribute('class', 'btn btn-info')
            a.setAttribute('href', '<?= base_url('testWeightEditDataView/'.$weighingScaleData['id'].'/forVerification') ?>');
            a.innerHTML = '<i class="fas fa-clipboard-list-check"></i> Check Input';
            div.appendChild(a);

            var verifyButton = document.createElement('button');
            var correctionButton = document.createElement('button');

            verifyButton.setAttribute('type', 'button');
            correctionButton.setAttribute('type', 'button');
            verifyButton.setAttribute('class', 'btn btn-success mr-3');
            correctionButton.setAttribute('class', 'btn btn-danger');
            verifyButton.setAttribute('onclick', 'verify()');
            correctionButton.setAttribute('onclick', 'correction()');

            backButton.setAttribute('href','/forVerifyTable');

            verifyButton.innerHTML = "Verify";
            correctionButton.innerHTML = "For Correction";
            buttonDiv.appendChild(verifyButton);
            buttonDiv.appendChild(correctionButton);
        }   else {
            var backButton = document.getElementById('backButton');
            backButton.setAttribute('href','/testWeightTable');            
        }

        function verify(){
            if(confirm("Are you sure you want to proceed?") == true){
                document.verifyForm.submit();
            }
        }
        function correction(){
            if(confirm("Are you sure you want to proceed?") == true){
                document.correctionForm.submit();
            }
        }

        

    </script>

 