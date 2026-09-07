<?php
    $path = 'image/dost.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    $pathPAB = 'image/pab logo.png';
    $typePAB = pathinfo($pathPAB, PATHINFO_EXTENSION);
    $dataPAB = file_get_contents($pathPAB);
    $base64PAB = 'data:image/' . $typePAB . ';base64,' . base64_encode($dataPAB);


    $pathicon5 = 'image/dashboard-images/male-user.png';
    $typeIcon5 = pathinfo($pathicon5, PATHINFO_EXTENSION);
    $dataIcon5 = file_get_contents($pathicon5);
    $base64Icon5 = 'data:image/' . $typeIcon5 . ';base64,' . base64_encode($dataIcon5);

    $pathicon7 = 'image/dashboard-images/person.png';
    $typeIcon7 = pathinfo($pathicon7, PATHINFO_EXTENSION);
    $dataIcon7 = file_get_contents($pathicon7);
    $base64Icon7 = 'data:image/' . $typeIcon7 . ';base64,' . base64_encode($dataIcon7);

    ?>

<!DOCTYPE html>
<head>
<title>RML ++</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=0.6, user-scalable=no ">
<style>
body {
    overflow-x: hidden;
}

#sidebar-wrapper {
    height: 100%;
    -webkit-transition: margin .25s ease-out;
    -moz-transition: margin .25s ease-out;
    -o-transition: margin .25s ease-out;
    transition: margin .25s ease-out;
    overflow-y: auto;
  width: 286px;
  position: fixed;
  
}

#sidebar-wrapper .sidebar-heading {
    padding: 0.875rem 1.25rem;
    font-size: 1.2rem;
}

#sidebar-wrapper .list-group {
    width: 15rem;
}

#page-content-wrapper {
    min-width: 100vw;
}

#wrapper.toggled #sidebar-wrapper {
    margin-left: 0;
}

@media (min-width: 768px) {
    #sidebar-wrapper {
        margin-left: 0;
    }

    #page-content-wrapper {
        min-width: 0;
        width: 100%;
    }

    #wrapper.toggled #sidebar-wrapper {
        margin-left: -15rem;
    }
}
[data-toggle="collapse"] .fa:before {  
  content: "\f107";
}

[data-toggle="collapse"].collapsed .fa:before {
  content: "\f104";
}

</style>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>  
<body style="margin: 0; padding: 0; font-family: Calibri; font-size: 14px; background-color:#faf7f0;">
    <div class="d-flex " id="wrapper">
        <div class="sidebar border-down vh-100 " id="sidebar-wrapper" style="color: white; top: 0; position: sticky; background-color:#0f1a34; ">
            <div class="sidebar-heading " style="color: white; top: 0;  position: sticky; background-color:#182444; z-index: 1;">							
                <img src="<?php echo $base64; ?>" class="mr-2" alt="DOST LOGO" height='30px' style="border-radius:5px; ">
                <strong>RML Calibration</strong>
            </div>
            <div class="list-group list-group-flush overflow-auto" >
                <h6 class="mt-3 text-center">
                    <img src="<?php echo $base64Icon7; ?>" alt="DOST LOGO" height='30px' style="border-radius:5px;" class="mr-2">
                    Admin <?= session('name') ?>
                </h6>
                <div class="card-header">
                    <h2 class="mb-0">
                        <a href="dashboard" class="btn btn-block text-left " style="font-size: .5em; color: white;">
                            <i class="fas fa-home"></i>
                            Dashboard
                        </a> 
                    </h2>
                </div>
            
                <!--a>SINLGE RANGE E BALANCE<-->          
                <div class="accordion" id="accordionExample">
                    <div class="">
                        <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class=" btn btn-block text-left collapsed button" id="" style="color:white; font-size: 0.47em;" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            <i class="fas fa-balance-scale-right"></i>
                            S.Range E-Balance&nbsp&nbsp&nbsp
                            <i class="fa"></i>
                            </button>
                        </h2>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <a href="electHome" class="list-group-item list-group-item-action" style="font-size: .7rem; color: white; background-color:#091122;">
                                <i class="fas fa-folder-plus"></i>
                                New
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <a href="electTable" class="list-group-item list-group-item-action" style="font-size: .7rem; color: white; background-color: #091122;">
                                <i class="fas fa-clipboard"></i>
                                View Records
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <a href="electStandard" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                                <i class="fas fa-table"></i>
                                View Standard
                            </a>
                        </div>
                    </div>
                </div>
                <!--a>SINLGE RANGE E BALANCE<-->

                <!--a>THERMOHYGROMETER<-->           
                <div class="accordion" id="accordionExample">
                    <div class="">
                        <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-block text-left collapsed" style="color:white; font-size: 0.48em;" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="fas fa-tachometer-alt"></i>
                            Thermohygrometer&nbsp
                            <i class="fa"></i>
                            </button>
                        </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <a href="thermoAdd" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                                <i class="fas fa-folder-plus"></i>
                                New
                            </a>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <a href="thermoTable" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                                <i class="fas fa-clipboard"></i>
                                View Records
                            </a>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <a href="thermoStandardTable" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                                <i class="fas fa-table"></i>
                                View Standard
                            </a>
                        </div>
                    </div>
                </div>
                <!--a>THERMOHYGROMETER<-->
                <!--a>Test weight<-->           
                <div class="accordion" id="accordionExampleTEstWeight">
                    <div class="">
                        <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-block text-left collapsed" style="color:white; font-size: 0.48em;" type="button" data-toggle="collapse" data-target="#collapseTwoTestWeight" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="fas fa-weight-hanging"></i>
                            &nbspTest Weight&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <i class="fa"></i>
                            </button>
                        </h2>
                        </div>
                        <div id="collapseTwoTestWeight" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExampleTEstWeight">
                            <a href="testWeightAddDataView" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                                <i class="fas fa-folder-plus"></i>
                                New
                            </a>
                        </div>
                        <div id="collapseTwoTestWeight" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExampleTEstWeight">
                            <a href="testWeightTable" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                                <i class="fas fa-clipboard"></i>
                                View Records
                            </a>
                        </div>
                        <div id="collapseTwoTestWeight" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExampleTEstWeight">
                            <a href="testWeightStandardTable" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                                <i class="fas fa-table"></i>
                                View Standard
                            </a>
                        </div>
                        <div id="collapseTwoTestWeight" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExampleTEstWeight">
                            <a href="testWeightSensitivityTestTable" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                                <i class="fas fa-table"></i>
                                View Sensitivity Test
                            </a>
                        </div>
                    </div>
                </div>
                <!--a>Test weight<-->

                <!--a>USER MANAGEMENT<--> 
                <div class="accordion" id="accordionExample">
                    <div class=" ">
                        <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-block text-left collapsed " style="color:white; " type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <i class="fas fa-user-cog"></i>
                            User Management
                            <i class="fa"></i>
                            </button>
                        </h2>
                        </div>
                        <div id="collapseThree" class="collapse " aria-labelledby="headingThree" data-parent="#accordionExample">
                            <a href="createUser" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                                <i class="fas fa-user-plus"></i>
                                New Admin
                            </a>
                        </div>
                        <div id="collapseThree" class="collapse " aria-labelledby="headingThree" data-parent="#accordionExample">
                            <a href="guestUserIndex" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                                <i class="fas fa-user-plus"></i>
                                New Guest User
                            </a>
                        </div>
                        <div id="collapseThree" class="collapse " aria-labelledby="headingThree" data-parent="#accordionExample">
                            <a href="manageUser" class="list-group-item list-group-item-action " style="font-size: .7rem; color: white; background-color: #091122;">
                                <i class="fas fa-tasks"></i>
                                View Admin 
                            </a>
                        </div>
                        <div id="collapseThree" class="collapse " aria-labelledby="headingThree" data-parent="#accordionExample">
                            <a href="manageGuestUser" class="list-group-item list-group-item-action" style="font-size: .7rem; color: white; background-color: #091122;">
                                <i class="fas fa-tasks"></i>
                                Manage Guest User 
                            </a>
                        </div>
                    </div>
                </div>
                <!--a>USER MANAGEMENT<--> 
            
                <div class="" id="">
                    <div class=" ">
                        <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <a href="customerTable" class="btn btn-block text-left  " style="color: white;" type="button">
                                <i class="fas fa-user-chart"></i>
                                Customer
                                <i class="fa"></i>
                            </a>
                        </h2>
                        </div>
                    </div>
                </div>

                <div class="" id="">
                    <div class=" ">
                        <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <a href="about" class="btn btn-block text-left  " style=" color: white; " type="button">
                                <i class="far fa-info-circle"></i>
                                About
                                <i class="fa"></i>
                            </a>
                        </h2>
                        </div>
                    </div>
                </div>

                <div class="" id="">
                    <div class=" ">
                        <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <a href="personnelTable" class="btn btn-block text-left  "  style="background-color:white; color: #091122; border-radius:15px; " type="button">
                            <i class="far fa-user-secret"></i>
                                Personnel
                                <i class="fa"></i>
                            </a>
                        </h2>
                        </div>
                    </div>
                </div>
                
                <div class="" id="">
                    <div class=" ">
                        <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <a href="profile" class="btn btn-block text-left  " style="color:white; " type="button">
                                <i class="far fa-id-badge"></i>
                                My Profile
                                <i class="fa"></i>
                            </a>
                        </h2>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow" style="color: white; top: 0; position: sticky; z-index: 1;">
                <button class="btn btn-light" id="menu-toggle">
                    <i class="fas fa-bars"></i>    
                </button>
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item ">
                            <a class="nav-link" onclick="logoutConfirmation('<?= base_url('logout') ?>')" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                <h6 class="" style="color: blue;">
                                <?= session('name')?> <?= session('lname')?> 
                                <i class="fas fa-angle-down"></i>
                            </h6>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="container-fluid" style="background-color:#faf7f0; ">
                <div class="btn-toolbar mb-2 mb-md-0">  
                    <div class="container-fluid mt-4">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#singleRangeDefaultModal">Single Range Electronic Balance</button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#thermohygrometerModal">Thermohygrometer</button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#testWeightModal">Test Weights</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="singleRangeDefaultModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="singleRangeDefaultModalLabel">Single Range Electronic Balance</h5>
                <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id=''>
                <form action="/saveModule1" method="post" name='module1Form' id='module1modalBody'></form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="processRemarks(1)">Save changes</button>
            </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="thermohygrometerModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="thermohygrometerModal">Thermohygrometer</h5>
                <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id=''>
                <form action="/saveModule2" method="post" name='module2Form' id='module2modalBody'></form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="processRemarks(2)">Save changes</button>
            </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="testWeightModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="testWeightModal">Test Weight</h5>
                <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id=''>
                <form action="/saveModule3" method="post" name='module3Form' id='module3modalBody'></form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="processRemarks(3)">Save changes</button>
            </div>
            </div>
        </div>
    </div>
  </body>
</html>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
   $(document).ready(function() {
        $('table.display').DataTable();
    } );

    $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    });

</script>

<script>
    function deleteConfirmation(url,id){
       // windows.confirm("are u sure?");
       href="" 
        var txt;
        var id;
        if (confirm("Do you want to delete "+id+"?")) {
            location.href = url;
        }
    }
    function deleteConfirmationVer(url,id){
       // windows.confirm("are u sure?");
       href="" 
        var txt;
        var id;
        if (confirm("Do you want to delete "+id+"?")) {
            location.href = url;
        }
    }

   function logoutConfirmation(url){
       // windows.confirm("are u sure?");
       href="" 
        var txt;
        if (confirm("Do you want to logout <?= session('name')?>?")) {
            location.href = url;
        }
    }


    

   

    
</script>

<script>
    var module1Default = <?= json_encode($module1Defaults);?>;
    var module2Default = <?= json_encode($module2Defaults);?>;
    var module3Default = <?= json_encode($module3Defaults);?>;

    const getDefaults = (moduleArray) => {
        var array = [];
        moduleArray.forEach((e)=>{
            if(e.default != null){
                array[e.name] = e.default.slice(1,-1);
            }
        });
        return array;
    }

    var defaultsModule1 = getDefaults(module1Default);
    var remarksModule1 = defaultsModule1['settingRemarks1'].split('(splitHere)');
    var remarksLenghtModule1 = remarksModule1.length;

    var defaultsModule2 = getDefaults(module2Default);
    var remarksModule2 = defaultsModule2['settingRemarks1'].split('(splitHere)');
    var remarksLenghtModule2 = remarksModule2.length;

    var defaultsModule3 = getDefaults(module3Default);
    var remarksModule3 = defaultsModule3['settingRemarks1'].split('(splitHere)');
    var remarksLenghtModule3 = remarksModule3.length;

    function setModule1(){
        var defaults = defaultsModule1;
        var modalBody = document.getElementById('module1modalBody');

        var input = document.createElement('input');
        input.setAttribute('id','settingRemarks1Module1');
        input.setAttribute('name','settingRemarks1Module1');
        input.setAttribute('type','hidden');
        modalBody.appendChild(input);

        var p = document.createElement('p');
        var textarea = document.createElement('textarea');
        p.innerHTML = `Calibration Procedure And Traceability`;
        textarea.setAttribute('class','form-control');
        textarea.setAttribute('name','settingCalibrationProcedureAndTraceabilityModule1');
        textarea.setAttribute('rows','3');
        textarea.innerHTML = defaults['settingCalibrationProcedureAndTraceability']
        modalBody.appendChild(p);
        modalBody.appendChild(textarea);

        var p = document.createElement('p');
        var textarea = document.createElement('textarea');
        p.innerHTML = `Uncertainty Of Measurement`;
        textarea.setAttribute('class','form-control');
        textarea.setAttribute('name','settingUncertaintyOfMeasurementModule1');
        textarea.setAttribute('rows','3');
        textarea.innerHTML = defaults['settingUncertaintyOfMeasurement']
        modalBody.appendChild(p);
        modalBody.appendChild(textarea);

        var p = document.createElement('p');
        var textarea = document.createElement('textarea');
        p.innerHTML = `Calibration Results`;
        textarea.setAttribute('class','form-control');
        textarea.setAttribute('name','settingCalibrationResultsModule1');
        textarea.setAttribute('rows','3');
        textarea.innerHTML = defaults['settingCalibrationResults']
        modalBody.appendChild(p);
        modalBody.appendChild(textarea);

        var remarks = remarksModule1;

        for (let i = 0; i < remarks.length; i++) {
            const element = remarks[i];
            var p = document.createElement('p');
            p.innerHTML = `Remark `+(i+1);
            var textarea = addRemarks(remarks[i],i+1,1);
            modalBody.appendChild(p);
            modalBody.appendChild(textarea);
        }

        var button = document.createElement('button');
        button.setAttribute('class','btn btn-warning mt-3');
        button.setAttribute('type','button');
        button.setAttribute('id','AddRemarksButtonModule1');
        button.setAttribute('onclick', `newRemark('module1modalBody',1, this.id); remarksLenghtModule1++;`)
        button.innerHTML = `Add Remark`;
        modalBody.appendChild(button);

        var button = document.createElement('button');
        button.setAttribute('class','btn btn-danger mt-3');
        button.setAttribute('type','button');
        button.setAttribute('id','deleteRemarksButtonModule1');
        button.setAttribute('onclick', `deleteRemark(1); remarksLenghtModule1--;`)
        button.innerHTML = `Delete Remark`;
        modalBody.appendChild(button);
        
    }
    function setModule2(){
        var defaults = defaultsModule2;
        var modalBody = document.getElementById('module2modalBody');

        var input = document.createElement('input');
        input.setAttribute('id','settingRemarks1Module2');
        input.setAttribute('name','settingRemarks1Module2');
        input.setAttribute('type','hidden');
        modalBody.appendChild(input);

        var p = document.createElement('p');
        var textarea = document.createElement('textarea');
        p.innerHTML = `Calibration Procedure And Traceability`;
        textarea.setAttribute('class','form-control');
        textarea.setAttribute('name','settingCalibrationProcedureAndTraceabilityModule2');
        textarea.setAttribute('rows','3');
        textarea.innerHTML = defaults['settingCalibrationProcedureAndTraceability']
        modalBody.appendChild(p);
        modalBody.appendChild(textarea);

        var p = document.createElement('p');
        var textarea = document.createElement('textarea');
        p.innerHTML = `Uncertainty Of Measurement`;
        textarea.setAttribute('class','form-control');
        textarea.setAttribute('name','settingUncertaintyOfMeasurementModule2');
        textarea.setAttribute('rows','3');
        textarea.innerHTML = defaults['settingUncertaintyOfMeasurement']
        modalBody.appendChild(p);
        modalBody.appendChild(textarea);

        var p = document.createElement('p');
        var textarea = document.createElement('textarea');
        p.innerHTML = `Calibration Results`;
        textarea.setAttribute('class','form-control');
        textarea.setAttribute('name','settingCalibrationResultsModule2');
        textarea.setAttribute('rows','3');
        textarea.innerHTML = defaults['settingCalibrationResults']
        modalBody.appendChild(p);
        modalBody.appendChild(textarea);

        var remarks = remarksModule2;

        for (let i = 0; i < remarks.length; i++) {
            const element = remarks[i];
            var p = document.createElement('p');
            p.innerHTML = `Remark `+(i+1);
            var textarea = addRemarks(remarks[i],i+1,2);
            modalBody.appendChild(p);
            modalBody.appendChild(textarea);
        }

        var button = document.createElement('button');
        button.setAttribute('class','btn btn-warning mt-3');
        button.setAttribute('type','button');
        button.setAttribute('id','AddRemarksButtonModule2');
        button.setAttribute('onclick', `newRemark('module2modalBody',2, this.id); remarksLenghtModule2++;`)
        button.innerHTML = `Add Remark`;
        modalBody.appendChild(button);

        var button = document.createElement('button');
        button.setAttribute('class','btn btn-danger mt-3');
        button.setAttribute('type','button');
        button.setAttribute('id','deleteRemarksButtonModule2');
        button.setAttribute('onclick', `deleteRemark(2); remarksLenghtModule2--;`)
        button.innerHTML = `Add Remark`;
        modalBody.appendChild(button);
        
    }
    function setModule3(){
        var defaults = defaultsModule3;
        var modalBody = document.getElementById('module3modalBody');

        var input = document.createElement('input');
        input.setAttribute('id','settingRemarks1Module3');
        input.setAttribute('name','settingRemarks1Module3');
        input.setAttribute('type','hidden');
        modalBody.appendChild(input);

        var p = document.createElement('p');
        var textarea = document.createElement('textarea');
        p.innerHTML = `Calibration Procedure And Traceability`;
        textarea.setAttribute('class','form-control');
        textarea.setAttribute('name','settingCalibrationProcedureAndTraceabilityModule3');
        textarea.setAttribute('rows','3');
        textarea.innerHTML = defaults['settingCalibrationProcedureAndTraceability']
        modalBody.appendChild(p);
        modalBody.appendChild(textarea);

        var p = document.createElement('p');
        var textarea = document.createElement('textarea');
        p.innerHTML = `Uncertainty Of Measurement`;
        textarea.setAttribute('class','form-control');
        textarea.setAttribute('name','settingUncertaintyOfMeasurementModule3');
        textarea.setAttribute('rows','3');
        textarea.innerHTML = defaults['settingUncertaintyOfMeasurement']
        modalBody.appendChild(p);
        modalBody.appendChild(textarea);

        var p = document.createElement('p');
        var textarea = document.createElement('textarea');
        p.innerHTML = `Calibration Results`;
        textarea.setAttribute('class','form-control');
        textarea.setAttribute('name','settingCalibrationResultsModule3');
        textarea.setAttribute('rows','3');
        textarea.innerHTML = defaults['settingCalibrationResults']
        modalBody.appendChild(p);
        modalBody.appendChild(textarea);

        var remarks = remarksModule2;

        for (let i = 0; i < remarks.length; i++) {
            const element = remarks[i];
            var p = document.createElement('p');
            p.innerHTML = `Remark `+(i+1);
            var textarea = addRemarks(remarks[i],i+1,1);
            modalBody.appendChild(p);
            modalBody.appendChild(textarea);
        }

        var button = document.createElement('button');
        button.setAttribute('class','btn btn-warning mt-3');
        button.setAttribute('type','button');
        button.setAttribute('id','AddRemarksButtonModule3');
        button.setAttribute('onclick', `newRemark('module3modalBody',2, this.id); remarksLenghtModule3++;`)
        button.innerHTML = `Add Remark`;
        modalBody.appendChild(button);

        var button = document.createElement('button');
        button.setAttribute('class','btn btn-danger mt-3');
        button.setAttribute('type','button');
        button.setAttribute('id','deleteRemarksButtonModule3');
        button.setAttribute('onclick', `deleteRemark(3); remarksLenghtModule3--;`)
        button.innerHTML = `Add Remark`;
        modalBody.appendChild(button);
        
    }

    const addRemarks = (data, count, number) => {
        var textarea = document.createElement('textarea');
        textarea.setAttribute('class','form-control');
        textarea.setAttribute('id','remarks'+count+'Module'+number);
        textarea.setAttribute('rows','3');
        textarea.innerHTML = data;
        return textarea;
    }

    const newRemark = (modalNumber, number, buttonID) =>{
        var modalBody = document.getElementById(modalNumber);
        var button = document.getElementById(buttonID);
        var textarea = document.createElement('textarea');
        var p = document.createElement('p')
        switch (number) {
            case 1:
                var remarksLenght = remarksLenghtModule1;
                break;
            case 2:
                var remarksLenght = remarksLenghtModule2;
                break;
            default:
                break;
        }
        p.innerHTML = `Remark `+(remarksLenght+1);
        textarea.setAttribute('class','form-control');
        textarea.setAttribute('id','remarks'+(remarksLenght+1)+'Module'+number);
        textarea.setAttribute('rows','3');
        modalBody.insertBefore(p,button)
        modalBody.insertBefore(textarea,button)
    }

    const deleteRemark = (moduleNumber) =>{
        var modalBody = document.getElementById('module'+moduleNumber+'modalBody');
        for (let i = 0; i < 2; i++) {
            var childCount = modalBody.childElementCount;
            // -3 because it starts at 0 and theres 2 button at the end
            modalBody.removeChild(modalBody.children[(childCount-3)]);      
        }
    }

    const processRemarks = (moduleNumber) => {
        try {
            switch (moduleNumber) {
                case 1:
                    var count = remarksLenghtModule1;
                    break;
                case 2:
                    var count = remarksLenghtModule2;
                    break;
                default:
                    break;
            }

            var processedRemarks = document.getElementById('remarks1Module'+moduleNumber).value;
            for (let i = 2; i <= count; i++) {
                processedRemarks += '(splitHere)'+(document.getElementById('remarks'+i+'Module'+moduleNumber).value)
            }

            switch (moduleNumber) {
                case 1:
                    document.getElementById('settingRemarks1Module1').value = processedRemarks;
                    document.module1Form.submit();
                    alert('Successfully Saved');
                    break;
                case 2:
                    document.getElementById('settingRemarks1Module2').value = processedRemarks;
                    document.module2Form.submit();
                    alert('Successfully Saved');
                    break;
                default:
                    break;
            }
            
        } catch (error) {
            alert('unable to save\n'+error.message);
        }
        
        
    }

    setModule1();
    setModule2();
    setModule3();
</script>

