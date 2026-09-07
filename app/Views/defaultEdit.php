<?php
    $path = 'image/dost.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    $pathPAB = 'image/pab logo.png';
    $typePAB = pathinfo($pathPAB, PATHINFO_EXTENSION);
    $dataPAB = file_get_contents($pathPAB);
    $base64PAB = 'data:image/' . $typePAB . ';base64,' . base64_encode($dataPAB);

    $pathicon = 'image/dashboard-images/kitchen-scales.png';
    $typeIcon = pathinfo($pathicon, PATHINFO_EXTENSION);
    $dataIcon = file_get_contents($pathicon);
    $base64Icon = 'data:image/' . $typeIcon . ';base64,' . base64_encode($dataIcon);

    $pathicon2 = 'image/dashboard-images/hygrometer.png';
    $typeIcon2 = pathinfo($pathicon2, PATHINFO_EXTENSION);
    $dataIcon2 = file_get_contents($pathicon2);
    $base64Icon2 = 'data:image/' . $typeIcon2 . ';base64,' . base64_encode($dataIcon2);

    $pathicon3 = 'image/dashboard-images/account.png';
    $typeIcon3 = pathinfo($pathicon3, PATHINFO_EXTENSION);
    $dataIcon3 = file_get_contents($pathicon3);
    $base64Icon3 = 'data:image/' . $typeIcon3 . ';base64,' . base64_encode($dataIcon3);

    $pathicon4 = 'image/dashboard-images/data-admin.png';
    $typeIcon4 = pathinfo($pathicon4, PATHINFO_EXTENSION);
    $dataIcon4 = file_get_contents($pathicon4);
    $base64Icon4 = 'data:image/' . $typeIcon4 . ';base64,' . base64_encode($dataIcon4);

    $pathicon5 = 'image/dashboard-images/male-user.png';
    $typeIcon5 = pathinfo($pathicon5, PATHINFO_EXTENSION);
    $dataIcon5 = file_get_contents($pathicon5);
    $base64Icon5 = 'data:image/' . $typeIcon5 . ';base64,' . base64_encode($dataIcon5);

    $pathicon6 = 'image/dashboard-images/toolbox.png';
    $typeIcon6 = pathinfo($pathicon6, PATHINFO_EXTENSION);
    $dataIcon6 = file_get_contents($pathicon6);
    $base64Icon6 = 'data:image/' . $typeIcon6 . ';base64,' . base64_encode($dataIcon6);

    $pathicon7 = 'image/dashboard-images/person.png';
    $typeIcon7 = pathinfo($pathicon7, PATHINFO_EXTENSION);
    $dataIcon7 = file_get_contents($pathicon7);
    $base64Icon7 = 'data:image/' . $typeIcon7 . ';base64,' . base64_encode($dataIcon7);
?>
<!DOCTYPE html>
<html lang="en">
<?= view('layouts/head-essential'); ?> 
  <body class="skin-dark animate">
  <?php
  	$data = [
		'active' => 'statements',
		'show' => 'statements',
	];
   echo view('layouts/sidebarAdmin',$data)?>



    <div class="content">
      <div class="content-header">
        <a id="contentMenu" href="#" class="content-menu d-none d-lg-flex"><i data-feather="menu"></i></a>
        <a id="mobileMenu" href="#" class="content-menu d-lg-none"><i data-feather="menu"></i></a>
      </div>
      <div class="content-body">
        <label class="content-label"><b>Statement Edit</b></label>
        <hr>
        <br>
        <div class="container">
            <div class="input-group mb-3">
                <div class="form-floating me-2">
                    <select class="form-select" id="moduleNumber">
                        <option selected>Select Module</option>
                        <option value="1">Electronic Balance</option>
                        <option value="2">Thermo-Hygrometer</option>
                        <option value="3">Test Weights</option>
                        <option value="4">Weight Scale</option>
                        <option value="5">Digital Thermometer</option>
                        <option value="6">Digital Timer </option>
                        <option value="7">Pressure Gauge</option>
                        <option value="8">pH Meter</option>
                        <option value="9">Volumetric</option>
                        <option value="10">Temperature Controller</option>
                        <option value="11">Enclosure / Water Bath / Autoclave</option>
                        <!-- <option value="12">water bath / autoclave</option> -->
                        <option value="13">Refractometer</option>
                        <option value="14">Caliper / Micrometer </option>
                        <option value="15">Electrical Meters</option>
                    </select>
                    <label for="moduleNumber">Module</label>
                </div>
                
                <div class="btn-toolbar" role="toolbar">
                    <div class="btn-group me-2" role="group">
                        <button class="btn btn-outline-secondary" type="button" id="moduleNumberConfirm">Select Module</button>
                    </div>
                    <div class="btn-group me-2" role="group">
                        <button type="button" class="btn btn-success" id="addRemarkButton">Add Remark</button>
                        <button type="button" class="btn btn-danger" id="removeRemarkButton">Remove Remark</button>
                    </div>
                    <div class="btn-group me-2" role="group">
                        <button type="button" class="btn btn-warning" id="updateStatementButton">Update</button>
                    </div>
                </div>
            </div>
            <hr>
            <div id='statementDiv'></div>
            <div id="remarksDiv"></div>
        </div>
      </div>
    </div>




  </body>
</html>
<?= view('layouts/footer-essential'); ?>

<script>

    $( document ).ready(function() {
        
        bind_to_elements()
    });

    
    async function get_placeholder(){
        let data;
        await $.ajax({
        cache: false,
        type: "post",
        url: "/placeholder/get_placeholders",
        })
        .done(function(result){
            data = result.data[0]
        })
        .fail(function(error){
            console.error(error)
        })
        return data;
        // module1CalibrationProcedureAndTraceability
        // module4CalibrationProcedureAndTraceability2

        // module1UncertaintyOfMeasurement
        // module1CalibrationResults
        // module7MeasurementCondition
        // module1Remarks


    }

    function module1_ignored(val){
        let array_ignore = ["module10", "module11", "module12", "module13", "module14", "module15"];
        if(val.startsWith(array_ignore[0])){
            return true;
        }
        if(val.startsWith(array_ignore[1])){
            return true;
        }
        if(val.startsWith(array_ignore[2])){
            return true;
        }
        if(val.startsWith(array_ignore[3])){
            return true;
        }
        if(val.startsWith(array_ignore[4])){
            return true;
        }
        if(val.startsWith(array_ignore[5])){
            return true;
        }

        return false;
    }

    async function get_module_statement(){
        $('#statementDiv').html("");
        $('#remarksDiv').html("");
        let moduleNumber = $('#moduleNumber').val();
        let moduleKey = "module" + moduleNumber;
        let statement_full = await get_placeholder();

        let array_keys = Object.keys(statement_full);
        let array_filtered_key = []

        array_keys.forEach(item => {
            if(item.startsWith(moduleKey)){
                array_filtered_key.push(item);
            }
        })

        if(moduleNumber === "1"){
            let array_temp = []
            
            array_filtered_key.forEach(item => {
                let is_ignored = module1_ignored(item)
                if(!is_ignored){
                    array_temp.push(item)
                }
            })

            array_filtered_key = array_temp;
        }

        let module_statement_count = array_filtered_key.length;

        for (let i = 0; i < module_statement_count; i++) {
            let key_no_moduleNumber = array_filtered_key[i].replace(moduleKey, "");

            if(array_filtered_key[i].includes('Remarks')){
                let full_remarks = statement_full[array_filtered_key[i]];
                let array_remarks = full_remarks.split('(splitHere)')
                for (let ii = 0; ii < array_remarks.length; ii++) {
                    let text_input = $("<div>", {
                        "class" : "form-floating mb-4",
                    }).append($("<textarea>", {
                        "class": "form-control",
                        'id':"remark"+(ii+1),
                        'html':array_remarks[ii],
                        'rows':"4",
                        'style' : "height: 100%;" 
                    }), $("<label>", {
                        'for':"remark"+(ii+1),
                        "html":"Remark "+ (ii+1)
                    }))

                    $('#remarksDiv').append(text_input);
                    
                }
                let remark_textarea = $("<div>", {
                    "class" : "form-floating mb-4 d-none",
                }).append($("<textarea>", {
                    "class": "form-control",
                    'id':array_filtered_key[i],
                    'html':statement_full[array_filtered_key[i]],
                    'rows':"4",
                    'style' : "height: 100%;" 
                }), $("<label>", {
                    'for':array_filtered_key[i],
                    "html":key_no_moduleNumber
                }))

                $('#statementDiv').append(remark_textarea);
            }else{
                let text_input = $("<div>", {
                    "class" : "form-floating mb-4",
                }).append($("<textarea>", {
                    "class": "form-control",
                    'id':array_filtered_key[i],
                    'html':statement_full[array_filtered_key[i]],
                    'rows':"4",
                    'style' : "height: 100%;" 
                }), $("<label>", {
                    'for':array_filtered_key[i],
                    "html":key_no_moduleNumber
                }))

                $('#statementDiv').append(text_input);
            }
        }

        
    }

    function new_remark(){
        let remarks_count = $('#remarksDiv').children().length

        let text_input = $("<div>", {
            "class" : "form-floating mb-4",
        }).append($("<textarea>", {
            "class": "form-control",
            'id':"remark"+(remarks_count + 1),
            'html':"",
            'rows':"4",
            'style' : "height: 100%;" 
        }), $("<label>", {
            'for':"remark"+(remarks_count + 1),
            "html":"Remark "+ (remarks_count + 1)
        }))

            $('#remarksDiv').append(text_input);
    }

    function remove_remark(){
        if($('#remarksDiv').children().length>0){
            $('#remarksDiv').children().last().remove()
        }else{
            alert("No Remark to remove")
        }
    }

    function compress_remark(){
        let remarks_count = $('#remarksDiv').children().length
        let array_remarks = [];
        for (let i = 1; i <= remarks_count; i++) {
            let remarkID = "remark" + i;
            array_remarks.push($('#'+remarkID).val())
        }
        let concat = array_remarks.join('(splitHere)')

        $('#statementDiv textarea').each(function(){
            if(this.id.includes('Remarks')){
                $(this).html(concat)
            }
        })

        return concat;
    }

    async function update_statements(){
        $('#statementDiv textarea')
        let moduleNumber = $('#moduleNumber').val();
        let moduleKey = "module" + moduleNumber;
        let remarks = compress_remark()
        let object_statements = {
            [moduleKey+"Remarks"] : remarks
        }
        $('#statementDiv textarea').each(function(){
            object_statements[this.id] = $(this).val()
        })

        await $.ajax({
            cache: false,
            type: "post",
            url: "/placeholder/update_statements",
            data: {
                "statement" : JSON.stringify(object_statements)
            }
        })
        .done(function(result){
            alert('Statement Updated')
        })
        .fail(function(error){
            console.error(error)
        })
    }

    function bind(id, evt, func){
        var el = document.getElementById(id);
        if (el.addEventListener){
            el.addEventListener(evt, func);
        } else if (el.attachEvent) {
            el.attachEvent('on' + evt, func);
        }
    }


    function bind_to_elements(){
        bind('moduleNumberConfirm', 'click', function(){
            get_module_statement()
        })
        bind('addRemarkButton', 'click', function(){
            new_remark()
        })
        bind('removeRemarkButton', 'click', function(){
            remove_remark()
        })
        bind('updateStatementButton', 'click', function(){
            update_statements()
        })
        
        
    }
    
</script>


<script>
   function logoutConfirmation(url){
       href="" 
        var txt;
        if (confirm("Do you want to logout <?= session('name')?>?")) {
            location.href = url;
        }
    }
</script>
