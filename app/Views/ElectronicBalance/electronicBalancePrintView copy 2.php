<?php
    use App\Models\ElectModel_image;
    use App\Models\ElectModel_2;
    $electStandardTable = new ElectModel_2();
    $arrayOfWeights = $datas['standard'];
    $pieces = explode("(SPLITHERE)", $arrayOfWeights);
    $elect_table_2[] = $electStandardTable->whereIn('serialNumber',  $pieces)->findAll();
   
    $electImageTable = new ElectModel_image();
    $image[] = $electImageTable->where('certificateNumber',  $datas['certificateNumber'])->first();

    $path = 'image/dost.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    $pathPAB = 'image/pab logo.png';
    $typePAB = pathinfo($pathPAB, PATHINFO_EXTENSION);
    $dataPAB = file_get_contents($pathPAB);
    $base64PAB = 'data:image/' . $typePAB . ';base64,' . base64_encode($dataPAB);


    $equipmentInfo = json_decode($datas['equipmentInfo']);
    $customerInfo = json_decode($datas['customerInfo']);
    $dataInputs = json_decode($datas['dataInputs']);
    $calculatedData = json_decode($datas['calculatedData']);
    

    $readabilityDecimalPoint = seeDecimal($equipmentInfo->readability);

    function addZeros($value,$numberOfZeros){
        return number_format($value,$numberOfZeros,'.','');
    }
    
    
    function sigFig($value, $digits){
        $value = floatval($value);
        $digits = floatval($digits);
        if ($value == 0) {
            $decimalPlaces = $digits - 1;
        } elseif ($value < 0) {
            $decimalPlaces = $digits - floor(log10($value * -1)) - 1;
        } else {
            $decimalPlaces = $digits - floor(log10($value)) - 1;
        }

        $answer = ($decimalPlaces > 0) ?
            number_format($value, $decimalPlaces) : round($value, $decimalPlaces);
        return $answer;
    }

    function roundTo($value, $digits){
        $decimalPoint = strlen(substr(strrchr(TrimTrailingZeroes($value), "."), 1));
        if($decimalPoint == 0){
            $answer = number_format((float)TrimTrailingZeroes($value), $digits, '.', ''); 
            return $answer;
        }else{
            $answer = round($value, $digits);
            return $answer;
        }
    }

    function seeDecimal($value){
        if ((int)$value == $value){
            return 0;
        }
        else if (! is_numeric($value)){
            return false;
        }

        return strlen($value) - strrpos($value, '.') - 1;
    }

    
    
    
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
       

        /* .form-control{
            border: 0;
            margin-top:-10;
            text-decoration:underline;
        } */
    </style>
</head>
<body  style="margin: 0; padding: 0; font-family: Calibri; font-size: 16px;">
    <div class="card mt-2 shadow mx-auto text-center col-12 container-fluid" style="width: 100%;">
    <div class="">
			<!-- HEADER --> 
			<div class="row text-left mt-4">
                <div class="col mx-5 p-5">
                    <h1 class="card-title mt-4">Single Range Electronic balance</h1>
                    <h4 class="card-title mb-4">Calibration Certificate (View)</h4></div>
				<!--div class="col-xl-3 col-md-3 col-sm-3 col-12 mt-5">
					<img src="<?php# echo $base64; ?>" alt="DOST LOGO" height='120px' style=" top:0"> 
				</div>
				<div class="col-xl-6 col-md-6 col-sm-6 mt-5">
					<h6>Republic of the Philippines</h6>
					<h6>DEPARTMENT OF SCIENCE AND TECHNOLOGY</h6>
					<h6>CALABARZON</h6>
					<h6>Regional Metrology Laboratory</h6>
				</div-->
				<div class="col-xl-2 col-md-2 col-sm-3 col-6 text-center mr-5">
                        <form action="<?= base_url('UpdatePabLogo') ?>" method="POST" id="pabForm">
                        <div class="input-group mb-3">
                            <input type="hidden" value="<?php echo $datas['id']; ?>" name="id">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                <?php if($datas['PabLogo']=='true'){
                                    echo '<input type="checkbox" checked id="checkBoxPabLogo" onclick="pabLOGO(\''.$base64PAB.'\');">';
                                }else{
                                    echo '<input type="checkbox" id="checkBoxPabLogo" onclick="pabLOGO(\''.$base64PAB.'\');">';
                                }?>
                                    <input type="hidden" value="" name="pablogoValue" id="pablogoValue">
                                </div>
                            </div>
                            <Label for="checkBoxPabLogo" class="">
                                <?php if($datas['PabLogo']=='true'){
                                    echo '<img src="'.$base64PAB.'" alt="No Pab logo" id="pabLogo" height="150px" >';
                                }else{
                                    echo ' <img src="" alt="No Pab logo" id="pabLogo" height="150px" >';
                                }?>
                                   
                            </Label>
                            
                            </div>
                            <i style="font-size: 14px;">CLick the logo to add or remove</i>
                            <button type="submit" class="btn btn-success"><i class="fas fa-pencil-alt"></i> CLick here to Update logo</button>
                            
                            <!--input type="submit" value="Update PAB Logo" class="btn btn-success"-->
                        </form>                               
				</div>
			</div> <hr>
    <!-- HEADER -->	
    </div>
        <div class="container">
            <form action="">
                <div class="row mt-4">
                    <div class="col-xl-3 col-sm-6 text-left">
                        <label class="">Certificate Number:</label> 
                        <h4 class="mt-n2"><?php echo $datas['certificateNumber']?></h4>   
                    </div>
                </div>

                <div class="row">
                    <div class="col col-sm-6 text-left">
                        <label>Customer:</label> 
                        <h4 class="mt-n2"><?php echo $customerInfo->customer;?></h4>   
                    </div>
                </div>

                <div class="row">
                    <div class="col col-sm-6 text-left">
                        <label>Address:</label>
                        <h4 class="mt-n2"><?php echo $customerInfo->address; ?></h4>   
                    </div>
                </div>
                
                    <div class="row text-left">
                        <div class="col-xl-2 col-sm-6">
                            <label>Date of issue: </label>
                            <input type="date" id="datePicker" class="form-control" onchange="document.getElementById('datePrev').value = this.value; document.getElementById('datePrevDown').value = this.value; updateDateOfIssueHidden(this.valueAsDate)">
                            <button type="button" class="btn btn-success" onclick="saveIssuedDate()">Save Date</button>
                        </div>
                    
                    </div>

                    
               
                      
                
        <hr>
          

            </form>

    <hr>    

    <br>

    <div class="text-center">
            <table class="table">
                <thead>
                    <th></th>
                    <th>Test Load</th>
                    <th>Indication</th>
                    <th>Error</th>
                    <th>Uncertainty</th>
                </thead>
                <tbody>


                <?php
                
                    $dataInputs;
                    $calculatedData;

                    

                    for ($i=0; $i < count($calculatedData); $i++){ 
                        $x = $i+1;
                        $tr = '<tr>';
                        $trEnd = '</tr>';
                        $tdCheckbox = '<td><input type="checkbox" checked id="linear'.$x.'" name="linear" value="'.$x.'"></td>';
                        $load = '<td> <label for="linear'.$x.'">'. addZeros($dataInputs->{'linearLoad'.$x}, $readabilityDecimalPoint ) .'</label></td>';
                        $indication = '<td> <label for="linear'.$x.'">'. addZeros($dataInputs->{'indication'.$x}, $readabilityDecimalPoint ) .'</label></td>';
                        $error = '<td> <label for="linear'.$x.'">'. addZeros($dataInputs->{'linearError'.$x}, $readabilityDecimalPoint ) .'</label></td>';
                        $uncert = '<td id="uncert'.$x.'" data-value="'.sigFig($calculatedData[$i]->expandedUncertainty ,2).'"> <label for="linear'.$x.'">'. sigFig($calculatedData[$i]->expandedUncertainty,2).'</label></td>';

                        echo $tr. $tdCheckbox. $load. $indication. $error. $uncert. $trEnd;
                    };
                
                ?>
                            </tbody>
            </table>
    </div>
        <div class="text-center">
           <form action="/graphDataSave" method="post">
                <div class="input-group mt-3">
                    <div class="input-group-prepend">
                        <button class="btn btn-secondary" type="button" onclick="setPoints()">
                            <i class="fas fa-th-list"></i>
                                Filter
                        </button>
                        <button class="btn btn-secondary" type="button" onclick="MaximizeVaxis()">
                            <i class="fas fa-th-list"></i>
                                Optimize
                        </button>
                        <button class="btn btn-dark" type="button" id="checkbutton" onclick="setPoints()//customVaxis()">
                            <i class="far fa-check-square"></i>
                            Check
                        </button>
                    </div>
                    <input value="<?= $datas['graphMin']?>" type="text" id="min" name='graphMin' class="form-control" placeholder="Min" aria-label="Example text with button addon" aria-describedby="button-addon1" >
                    <input value="<?= $datas['graphMax']?>" type="text" id="max" name='graphMax' class="form-control" placeholder="Max" aria-label="Example text with button addon" aria-describedby="button-addon1">
                    <input value="0.000" type="text" id="vFormat" name='vFormat' class="form-control" placeholder="format" aria-label="Example text with button addon" aria-describedby="button-addon1">
                    <input value="<?= $datas['graphStep']?>" type="text" id="step" name='graphStep' class="form-control" placeholder="Step" tabindex="0" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Use -1 for default">
                    <input type="hidden" name="idOfData" value="<?= $datas['id']?>">
                    <button class="btn btn-secondary" type="submit">
                            Save
                    </button>
                </div>
            </form>

            <div id="chart_display" style="width:98%; height: 450px; image-resolution:1200dpi; border: 0px solid black;justify-content:center;display:flex;z-index:2;" ></div>
                <i>Figure 2. Graphical Representation of error with expanded uncertainties</i><br>
            <button type="button" class="btn btn-primary mt-3 grp" data-toggle="modal" data-target="#imageModal">
            <i class="fas fa-images"></i> View Image
            </button>
        </div>
        <div id='polyChart'></div>
       
        <img id="jpg-export"></img>

    <br> 
    <div id="forVerificationButtons">
    </div>       

    <div>
        <form name="verifyForm" action="/electVerify" method="post">
            <input type="hidden" name="completion" id="" value="For printing">
            <input type="hidden" value="<?php echo $datas['id']; ?>" name="idVerify" id="idVerify">
        </form>
        <form name="correctionForm" action="/electCorrection" method="post">
            <input type="hidden" name="completion" id="" value="For correction">
            <input type="hidden" value="<?php echo $datas['id']; ?>" name="idCorrection">
        </form>
        <form name="saveDateOfIssue" id="saveDateOfIssue"  method="post">
            <input type="hidden" name="dateOfIssue" id="dateOfIssue">
            <input type="hidden" value="<?php echo $datas['id']; ?>" name="idDateOfIssue" id="idDateOfIssue">
        </form>
    </div>
    
    <hr> <br>
    </div>
    </div>
    <!-- Hidden - this chart is sent to pdf -->
    <div class="row">
        <div class="col-12 col-xl-5 text-center" >
            <div id="chart_div" style="height:300px width:1338.68px; border: 0px solid black;justify-content:center;display:flex;visibility: hidden; z-index:1;" ></div>
        </div>
    </div>

        
    <div class="btn-group" role="group" style="position:fixed;display:flex; flex-direction:row;align-content:center; bottom:0; z-index:99; border:solid 0px">
        <form class="btn" action="<?= base_url('/electronicBalance/report/'.$datas['id']) ?>" method="POST" target="_blank" id="printForm" name="printForm" rel="noopener">
            <input type="hidden" name="datePrev" id="datePrev">
            <input type="hidden" name="typeOfPrint" id="typeOfPrint">
            <input type="hidden" name="imageDraftDown" id='imageDraftDown' value="false">
            <input type="hidden" name="chart_input" id="chart_input"> 
        </form>
        <div class="btn">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#previewModal" onclick="print('preview')">
                <i class="far fa-eye"></i> Preview PDF
            </button>
        </div>
        <div class="btn">
            <button type="button" class="btn btn-info" onclick="setToNotDraft();print('download')">
                <i class="fas fa-file-download"></i>Download PDF
            </button>
        </div>
        
        <div class="btn">
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#EditModal">
            <i class="fas fa-edit"></i>   
            Edit Remarks
            </button>
        </div>
        <div class="btn">
            <button type="button" class="btn btn-success" onclick="setToDraft();print('download')">
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
 
<!-- PDF preview -->
    <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Preview <code class="h6">(May Not Work on Mobile Devices)</code> </h5>
                <!--button type="button" class="close" data-dismiss="modal" aria-label="Close"-->
                    
                <button type="button" class="btn btn-info" onclick="print('fullPreview')">View Pdf</button>
             
            </div>
            <div class="modal-body"style="height:50%">
                <div class="embed-responsive embed-responsive-1by1"  style="height:25em">
                    <iframe class="embed-responsive-item" name="iframeHere" title="description"></iframe>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-door-open"></i> Close</button>
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
                    <form name="updateRemarksForm" method="post" action="/electronicBalance/updatePlaceholder">
                        <input type="hidden" name="idHere" value="<?=$datas['id']?>">
                        <div class="form-group">
                            <label for="CalibrationProcedureandTraceability">Calibration Procedure and Traceability</label>
                            <textarea class="form-control" id="CalibrationProcedureandTraceability" rows="3" name="settingCalibrationProcedureAndTraceability"><?=$datas['settingCalibrationProcedureAndTraceability']?></textarea>
                        </div> 
                        <div class="form-group">
                            <label for="UncertaintyofMeasurement">Uncertainty of Measurement</label>
                            <textarea class="form-control" id="UncertaintyofMeasurement" rows="3" name="settingUncertaintyOfMeasurement"><?=$datas['settingUncertaintyOfMeasurement']?></textarea>
                        </div> 
                        <div class="form-group">
                            <label for="CalibrationResults">Calibration Results</label>
                            <textarea class="form-control" id="CalibrationResults" rows="3" name="settingCalibrationResults"><?=$datas['settingCalibrationResults']?></textarea>
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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/js/ElectEdit.js"></script>
    <script type="text/javascript" src="/js/scripts/plotly.min.js"></script>
    
    <script type="text/javascript">
        var countOfRemarks = 0;
        var remarkRaw = '<?=$datas['settingRemarks']?>';

        function createChart(data){
            let array_x = [];
            let array_y = [];
            let array_err = [];
            let array_label = [];
            let array_range = [$('#min').val(), $('#max').val()]

            var img_jpg= $('#jpg-export');

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
                    'tickformat': '.4f', // number of decimal points in y-axis label .4f = 0.0000, .5f = 0.00000
                    'showgrid': false,
                    'range': array_range,
                }
            };

            Plotly.newPlot('polyChart', data, layout).then(function(gd){
                Plotly.toImage(
                    gd,{
                        'format':'jpeg',
                    }
                ).then(
                    function(url){
                        img_jpg.attr("src", url);
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
        layoutRemarks()

        function mergeRemarks(){
            let remarksMerged = "";
            for (var i = 1; i <= countOfRemarks; i++) {
                if(i!=countOfRemarks){
                    remarksMerged += $('#remarks'+i).val() + "(splitHere)";
                }else{
                    remarksMerged += $('#remarks'+i).val();
                }
            }
            $('#remarkHere').val(remarksMerged.replace(/\n/g, ''));
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

        const deleteRemark = () =>{
            var remarksDiv = document.getElementById('remarksDiv');
            for (let i = 0; i < 2; i++) {
                var childCount = remarksDiv.childElementCount;
                // -3 because it starts at 0 and theres 2 button at the end
                remarksDiv.removeChild(remarksDiv.children[(childCount-1)]);      
            }
            countOfRemarks--;
        }


                
        function switchFromActionForHanging(){
            document.formPrev.action =  `<?= base_url('ElectToPdfPreviewHanging/'.$datas['id']) ?>`;
            document.formDown.action =  `<?= base_url('ElectToPdfHanging/'.$datas['id']) ?>`;
            document.formDraft.action =  `<?= base_url('ElectToDraftHanging/'.$datas['id']) ?>`;
        }
        function seeIfHanging(){
            var equipmentDesc = `<?php echo $equipmentInfo->equipmentDescription?>`;
            if(equipmentDesc.toString().toLowerCase().includes(`hanging`)){
				switchFromActionForHanging();
			}
        }
        seeIfHanging();

        var elect_table = <?= json_encode($datas)?>;
        var equipmentInfo = JSON.parse(elect_table['equipmentInfo']);
        var dataInputs = JSON.parse(elect_table['dataInputs']);
        var calculatedData = JSON.parse(elect_table['calculatedData']);

        $(function () {
            $('[data-toggle="popover"]').popover();
        })


       
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChartDisplay);
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawChart2);
        google.charts.setOnLoadCallback(drawChartDisplay);
        

        var array = [];

        function getDecimalOfUncert(){
            var vFormat = document.getElementById('vFormat');
            var max = 0;
            var format = '0.';
            for(var i = 1; i <= 8 ; i++){
                var value = String(document.getElementById('uncert'+i).dataset.value);
                var valueAsInt = String(parseInt(document.getElementById('uncert'+i).dataset.value));
                if(value == valueAsInt){
                    value +='.0';
                }
                var splittedValue = value.split('.');
                if(splittedValue[1].length > max){
                    max = splittedValue[1].length;
                }
            }
            for(i=1;i<=max;i++){
                format+= '0';
            }
            vFormat.value = format;           
        }
        getDecimalOfUncert();
    
        function drawChart(vMin,vMax,mode,step,vFormat) {
            if(vMin == null){
                vMin = 'auto';
            }
            if(vMax == null){
                vMax = 'auto';
            }
            if(mode == null){
                mode = false;
            }
            if(step == null){
                step = -1;
            }
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Load');
            data.addColumn('number', 'values');
            data.addColumn({id:'i0', type:'number', role:'interval'});
            data.addColumn({id:'i1', type:'number', role:'interval'});
        
            data.addRows(array);

            var options = {
                curveType: 'function',
                pointSize: 10,
                pointShape: { type: 'diamond', sides: 4 },
                chartArea: {
                    'left': '10%',
                    'width': '87%',
                    'height': '80%'},
                series: [{'color': '#01a8eb'}],
                intervals: { style: 'bars',
                 color: 'red' ,
                 },
                hAxis: {
                title: 'Load ('+equipmentInfo['unit']+')',
                textStyle : {
                    color: '#030201',
                }
                },
                vAxis: {
                    format: vFormat,
                    colors: '#33ac71',
                    textStyle : {
                        fontSize: '14',
                        color: '#030201', // DL
                    },
                    title: 'Error ('+equipmentInfo['unit']+')', 
                    viewWindow: {
                            min: vMin,
                            max: vMax
                        },
                    viewWindowMode: mode,
                    gridlines: {
                        count: step,
                        color: 'white' ,
                    }   
                },
                
                height: 370,
                width: 1000,
                legend: 'none',
            };

            var chart_div = document.getElementById('chart_div');
            var chart_input = document.getElementById('chart_input');
            var charta = new google.visualization.CandlestickChart(document.getElementById('chart_div'));
            var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));

            google.visualization.events.addListener(chart, 'ready', function () {
                chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
                chart_input.value = chart.getImageURI();
            });    

            chart.draw(data, options);
        }

        function drawChartDisplay(vMin,vMax,mode,step,vFormat) {
            if(vMin == null){
                vMin = 'auto';
            }
            if(vMax == null){
                vMax = 'auto';
            }
            if(mode == null){
                mode = false;
            }
            if(step == null){
                step = -1;
            }
            if(vFormat == null){
                vFormat = '0.0000';
            }
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Load');
            data.addColumn('number', 'values');
            data.addColumn({id:'i0', type:'number', role:'interval'});
            data.addColumn({id:'i1', type:'number', role:'interval'});
            data.addRows(array);

            var options = {
                curveType: 'function',
                pointSize: 10,
                pointShape: { type: 'diamond', sides: 4 },
                series: [{
                   // 'color': '#FF0000'
                }],
                
                pointShape: {
                    type: 'circle', 
                    
                },
                intervals: { 
                    style: 'bars',
                
                    color: 'red' ,
                },
                hAxis: {
                    title: 'Load ('+equipmentInfo['unit']+')',
                },
                vAxis: {
                    format: vFormat,
                    title: 'Error ('+equipmentInfo['unit']+')', 
                    viewWindow: {
                        min: vMin,
                        max: vMax,
                    },
                    viewWindowMode: mode,
                    gridlines: {
                        count: step,
                        color: 'white' ,
                    }
                },
                
                
    
                legend: 'none',
            };

            var chart_div = document.getElementById('chart_display');
            var charta = new google.visualization.CandlestickChart(document.getElementById('chart_display'));
            var chart = new google.visualization.ScatterChart(document.getElementById('chart_display'));

            chart.draw(data, options);
        }

        function drawChart2(vMin,vMax,mode,step,vFormat) {
            if(vMin == null){
                vMin = 'auto';
            }
            if(vMax == null){
                vMax = 'auto';
            }
            if(mode == null){
                mode = false;
            }
            if(step == null){
                step = -1;
            }
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Load');
            data.addColumn('number', 'values');
            data.addColumn({id:'i0', type:'number', role:'interval'});
            data.addColumn({id:'i1', type:'number', role:'interval'});
        
            data.addRows(array);

            var options = {
                curveType: 'function',
                pointSize: 10,
                pointShape: { type: 'diamond', sides: 4 },
                chartArea: {
                    'left': '10%',
                    'width': '87%',
                    'height': '80%'},
                series: [{'color': '#01a8eb'}],
                intervals: { style: 'bars',
                 color: 'red' ,
                 },
                hAxis: {
                title: 'Load ('+equipmentInfo['unit']+')',
                },
                vAxis: {
                    format: vFormat,
                    colors: '#33ac71',
                    textStyle : {
                        fontSize: '14', // preview
                    },
                    title: 'Error ('+equipmentInfo['unit']+')', 
                    viewWindow: {
                            min: vMin,
                            max: vMax
                        },
                    viewWindowMode: mode,
                    gridlines: {
                        count: step,
                        color: 'white' ,
                    } 
                },
                
                height: 370,
                width: 1000,
                legend: 'none',
            };

            var chart_div = document.getElementById('chart_div');
            var chart_input = document.getElementById('chart_inputPreview');
            var charta = new google.visualization.CandlestickChart(document.getElementById('chart_div'));
            var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));

            google.visualization.events.addListener(chart, 'ready', function () {
                chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
                chart_input.value = chart.getImageURI();
            });   

            chart.draw(data, options);
           
        }
        //draft
        function drawChartDraft(vMin,vMax,mode,step,vFormat) {
            if(vMin == null){
                vMin = 'auto';
            }
            if(vMax == null){
                vMax = 'auto';
            }
            if(mode == null){
                mode = false;
            }
            if(step == null){
                step = -1;
            }
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Load');
            data.addColumn('number', 'values');
            data.addColumn({id:'i0', type:'number', role:'interval'});
            data.addColumn({id:'i1', type:'number', role:'interval'});
        
            data.addRows(array);

            var options = {
                curveType: 'function',
                pointSize: 10,
                pointShape: { type: 'diamond', sides: 4 },
                chartArea: {
                    'left': '10%',
                    'width': '87%',
                    'height': '80%'},
                series: [{'color': '#01a8eb'}],
                intervals: { style: 'bars',
                 color: 'red' ,
                 },
                hAxis: {
                title: 'Load ('+equipmentInfo['unit']+')',
                },
                vAxis: {
                    format: vFormat,
                    colors: '#33ac71',
                    textStyle : {
                        fontSize: '14', // draft
                    },
                    title: 'Error ('+equipmentInfo['unit']+')', 
                    viewWindow: {
                            min: vMin,
                            max: vMax
                        },
                    viewWindowMode: mode,
                    gridlines: {
                        count: step,
                        color: 'white' ,
                    } 
                },
                
                height: 370,
                width: 1000,
                legend: 'none',
            };

            var chart_div = document.getElementById('chart_div');
            var chart_input = document.getElementById('chart_inputDraft');
            var charta = new google.visualization.CandlestickChart(document.getElementById('chart_div'));
            var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));

            google.visualization.events.addListener(chart, 'ready', function () {
                chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
                chart_input.value = chart.getImageURI();
            });   

            chart.draw(data, options);
           
        }

        function customVaxis(){
            var min = document.getElementById('min');
            var max = document.getElementById('max');
            var step = document.getElementById('step');
            var vFormat = document.getElementById('vFormat');
            google.charts.setOnLoadCallback(drawChartDisplay(parseFloat(min.value),parseFloat(max.value),null,parseFloat(step.value),(vFormat.value)));
            google.charts.setOnLoadCallback(drawChart2(parseFloat(min.value),parseFloat(max.value),null,parseFloat(step.value),(vFormat.value)));
            google.charts.setOnLoadCallback(drawChart(parseFloat(min.value),parseFloat(max.value),null,parseFloat(step.value),(vFormat.value)));
            google.charts.setOnLoadCallback(drawChartDraft(parseFloat(min.value),parseFloat(max.value),null,parseFloat(step.value),(vFormat.value)));
        }
        function MaximizeVaxis(){
            var step = document.getElementById('step');
            google.charts.setOnLoadCallback(drawChartDisplay(null,null,'maximized',step.value));
            google.charts.setOnLoadCallback(drawChart2(null,null,'maximized',step.value));
            google.charts.setOnLoadCallback(drawChart(null,null,'maximized',step.value));
        }

        var countDecimals = function(value) {
            let text = value.toString()
            arrayOfValue = text.split(".");
            // verify if number 0.000005 is represented as "5e-6"
            if (text.indexOf('e-') > -1) {
                let [base, trail] = text.split('e-');
                let deg = parseInt(trail, 10);
                return deg;
            }
            // count decimals for number in representation like "0.123456"
            if (Math.floor(value) !== value) {
                if(value.toString().split(".").length >= 2){
                    return value.toString().split(".")[1].length || 0;
                }
            }
            return 0;
        }

        function print(type){
            if(type == 'download'){
                var form = document.getElementById('printForm');
                form.setAttribute('target', '_blank');
                var typeElementHudden = document.getElementById('typeOfPrint');
                typeElementHudden.value = type;
                document.printForm.submit();
            }
            if(type == 'preview'){
                var form = document.getElementById('printForm');
                form.setAttribute('target', 'iframeHere');
                var typeElementHudden = document.getElementById('typeOfPrint');
                typeElementHudden.value = type;
                document.printForm.submit();
            }
            if(type == 'fullPreview'){
                var form = document.getElementById('printForm');
                form.setAttribute('target', '_blank');
                var typeElementHudden = document.getElementById('typeOfPrint');
                typeElementHudden.value = type;
                document.printForm.submit();
            }
        }
//dataInputs
//calculatedData

        function setPoints(){
            array = [];
            var readabilityDecimal = countDecimals(equipmentInfo['readability']);
            var checkboxes = document.getElementsByName('linear');
            var objectArray = [];
            for (var i=0; i<checkboxes.length; i++) {
                var checkboxesChecked = [];
                var objectChecked = {};
                
                if (checkboxes[i].checked) {
                    objectChecked["x"] = dataInputs['linearLoad'+checkboxes[i].value];
                    objectChecked["y"] = parseFloat(parseFloat(dataInputs['linearError'+checkboxes[i].value]).toFixed(readabilityDecimal));
                    objectChecked["err"] = parseFloat(dataInputs['linearError'+checkboxes[i].value] ) + parseFloat(calculatedData[parseFloat(checkboxes[i].value)-1]['expandedUncertainty']);

                    checkboxesChecked.push(dataInputs['linearLoad'+checkboxes[i].value]);
                    //checkboxesChecked.push(parseFloat(elect_table['linearError'+checkboxes[i].value]));
                    checkboxesChecked.push(parseFloat(parseFloat(dataInputs['linearError'+checkboxes[i].value]).toFixed(readabilityDecimal)));
                    checkboxesChecked.push(parseFloat(dataInputs['linearError'+checkboxes[i].value] ) + parseFloat(calculatedData[parseFloat(checkboxes[i].value)-1]['expandedUncertainty']));
                    checkboxesChecked.push( (parseFloat(dataInputs['linearError'+checkboxes[i].value]) + (parseFloat(calculatedData[parseFloat(checkboxes[i].value)-1]['expandedUncertainty'])*-1)));
                    array.push(checkboxesChecked)
                    objectArray.push(objectChecked);
                }
                
            }

            // google.charts.load('current', {'packages':['corechart']});
            // google.charts.setOnLoadCallback(drawChartDisplay);
            // google.charts.setOnLoadCallback(drawChart);
            // google.charts.setOnLoadCallback(drawChart2);
            // google.charts.setOnLoadCallback(drawChartDraft);
            createChart(objectArray)

        }
        setPoints();

        function redirectOnAnewWindow(event) {
            document.formPrev.target = "_blank";
            document.formPrev.submit();
        }
        function redirectOnAnewWindowDraft(event) {
            document.formDraft.target = "_blank";
            document.formDraft.submit();
        }
        function redirectOnFrame(event) {
            document.formPrev.target = "iframeHere";
            document.formPrev.submit();
        }

        document.getElementById('datePicker').valueAsDate = new Date('<?php echo $datas['dateOfIssue']; ?>'); 
        document.getElementById('dateOfIssue').value = new Date(); 
        
        function updateDateOfIssueHidden(valueHere){
            document.getElementById('dateOfIssue').value = valueHere; 
        }
        // setTimeout(function(){customVaxis()}, 500);

    </script>

    <script>
        var role = '<?= $_SESSION['role'];?>';
        var page = '<?= $forVerification;?>';
        
        if(role == 'admin' && page == 'forVerification'){
            var div = document.getElementById('forverification');
            var buttonDiv = document.getElementById('forVerificationButtons');
            var backButton = document.getElementById('backButton');
            var saveDateOfIssue = document.getElementById('saveDateOfIssue');
            
            var a = document.createElement('a');
            a.setAttribute('class', 'btn btn-info')
            a.setAttribute('href', '<?= base_url('updateElect/'.$datas['id'].'/forVerification') ?>');
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

            saveDateOfIssue.setAttribute('action', '<?= base_url('electSaveDateOfIssue/'.$datas['id'].'/forVerification') ?>');

            verifyButton.innerHTML = "Verify";
            correctionButton.innerHTML = "For Correction";
            buttonDiv.appendChild(verifyButton);
            buttonDiv.appendChild(correctionButton);

        }   else {
            var backButton = document.getElementById('backButton');
            var saveDateOfIssue = document.getElementById('saveDateOfIssue');
            backButton.setAttribute('href','/electTable');   
            saveDateOfIssue.setAttribute('action', '/electSaveDateOfIssue/<?php echo $datas['id']; ?>');
         
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

        function saveIssuedDate(){
            if(confirm("Are you sure you want to proceed?") == true){
                document.saveDateOfIssue.submit();
            }
        }

        

    </script>


</html>   