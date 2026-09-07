<?php 
header("X-Frame-Options: SAMEORIGIN");
?>

<link href="<?= base_url('/dashboardAsset/assets/css/notification.css')?>" rel="stylesheet">

<style>
  .disabled {
    pointer-events: none;
    cursor: default;
    text-decoration: line-through;
  }
  .bordered{
    border:1px solid;
  }
  .modal-backdrop {
    background-color: rgba(255,255,255, 0.9);
  }
  .badgeNumber{
    color:rgba(255,255,255, 0.9)!important;
    margin-left:-20%;
  }
  .badgeNumberRed{
    color:rgba(255,0,0, 0.9)!important;
    margin-left:-20%;
  }
  .subBadge{
    display: inline-block;
    padding: 0.35em 0.65em;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 0.25rem;
  }

</style>


<div class="sidebar">
  <div class="sidebar-header">
    <a href="#" class="sidebar-logo-text"><img src = "/image/logoTEST.svg" alt="Logo" width="100%" height="100%" /></a>
    <a href="" class="sidebar-logo-text" style="margin-left:40%" data-toggle="modal" data-target="#exampleModal"></a>
  </div><!-- sidebar-header -->
  <div class="sidebar-body">
    <ul class="nav-sidebar">
      <li class="nav-item" id='dashboard'>
        <a href="" onclick="window.location.href = '<?= base_url('/dashboard')?>'" class="nav-link"><i data-feather="home"></i><span>Dashboard</span></a>              
      </li>
      <li class="nav-item " id='TSR'>
        <a href="" class="nav-link" onclick="window.location.href = '<?= base_url('/TSR/requests')?>'" ><i data-feather="clipboard"></i><span>TSR</span></a>
      </li>
      <li class="nav-item " id='worksheet'>
        <a href="" class="nav-link with-sub"><i data-feather="clipboard"></i><span>Worksheets</span></a>
        <nav class="nav-sub">
          <!-- <a href="#" onclick="window.location.href = '<?= base_url('/testWeightAddDataView')?>'"  class="sub-link " id='worksheet1' >Test Weight</a> -->
          <a href="#" onclick="window.location.href = '<?= base_url('/testWeight/worksheet')?>'"  class="sub-link " id='worksheet1' >Test Weight</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/electronicBalance/worksheet')?>'"  class="sub-link " id='worksheet2' >Electronic Balance</a>
          <!-- <a href="#" onclick="window.location.href = '<?= base_url('/electHome')?>'"  class="sub-link " id='worksheet2' >Electronic Balance</a> -->
          <!-- <a href="#" onclick="window.location.href = '<?= base_url('/weighingScaleAddNew')?>'"  class="sub-link " id='worksheet3' >Weighing Scale</a> -->
          <a href="#" onclick="window.location.href = '<?= base_url('/weighingScale/worksheet')?>'"  class="sub-link " id='worksheet3' >Weighing Scale</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/pressureGauge/worksheet')?>'"  class="sub-link " id='worksheet4' >Pressure Gauge</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/digitalThermometer/worksheet')?>'"  class="sub-link " id='worksheet5' >Thermometer</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/dashboard')?>'"  class="sub-link disabled d-none" id='worksheet6' >LIG Thermometer</a>
          <!-- <a href="#" onclick="window.location.href = '<?= base_url('/thermoAdd')?>'"  class="sub-link " id='worksheet7' >Thermo-Hygrometer</a> -->
          <a href="#" onclick="window.location.href = '<?= base_url('/thermohygrometer/worksheet')?>'"  class="sub-link " id='worksheet7' >Thermo-Hygrometer</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/enclosure/worksheet')?>'"  class="sub-link my-2" id='worksheet8' >Enclosure / Autoclave / Waterbath</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/glassware/worksheet')?>'"  class="sub-link" id='worksheet9' >Glassware / POVA</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/dashboard')?>'"  class="sub-link disabled d-none" id='worksheet10' >POVA</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/electricalmeter/worksheet')?>'"  class="sub-link" id='worksheet11' >Electrical Meters / DMM</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/dashboard')?>'"  class="sub-link disabled d-none" id='worksheet12' >DMM</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/digitalTimer/worksheet')?>'"  class="sub-link " id='worksheet13' >Timer / Stopwatch</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/pHMeter/worksheet')?>'"  class="sub-link my-2" id='worksheet14' >pH Meter</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/refractometer/worksheet')?>'"  class="sub-link" id='worksheet15' >Refractometer</a>

          <a href="#" onclick="window.location.href = '<?= base_url('/temperaturecontroll/worksheet')?>' "  class="sub-link my-2" id='worksheet16' >Temperature Controller</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/caliper/worksheet')?>'"  class="sub-link" id='worksheet17' >Caliper / Micrometer</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/dashboard')?>'"  class="sub-link disabled d-none" id='worksheet18' >Micrometer</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/dashboard')?>'"  class="sub-link disabled d-none" id='worksheet19' >Rule</a>

        </nav>
      </li>
      <li class="nav-item " id='certificate'>
        <a href="" class="nav-link with-sub"><i data-feather="monitor"></i><span>Certificates</span></a>
        <nav class="nav-sub">
          <a href="#" onclick="window.location.href = '<?= base_url('/testWeightTable')?>'"  class="sub-link " id='certificate1' >Test Weight</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/electronicBalance/certificates')?>'"  class="sub-link " id='certificate2' >Electronic Balance</a> 
          <!-- <a href="#" onclick="window.location.href = '<?= base_url('/electTable')?>'"  class="sub-link " id='certificate2' >Electronic Balance</a> -->
          <a href="#" onclick="window.location.href = '<?= base_url('/weighingScaleTable')?>'"  class="sub-link " id='certificate3' >Weighing Scale</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/pressureGauge/certificates')?>'"  class="sub-link " id='certificate4' >Pressure Gauge</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/digitalThermometer/certificates')?>'"  class="sub-link " id='certificate5' >Thermometer</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/dashboard')?>'"  class="sub-link disabled d-none" id='certificate6' >LIG Thermometer</a>
          <!-- <a href="#" onclick="window.location.href = '<?= base_url('/thermoTable')?>'"  class="sub-link " id='certificate7' >Thermo-Hygrometer</a> -->
          <a href="#" onclick="window.location.href = '<?= base_url('/thermohygrometer/certificates')?>'"  class="sub-link " id='certificate7' >Thermo-Hygrometer</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/enclosure/certificates')?>'"  class="sub-link my-2" id='certificate8' >Enclosure / Autoclave / Waterbath</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/glassware/certificates')?>'"  class="sub-link" id='certificate9' >Glassware / POVA</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/dashboard')?>'"  class="sub-link disabled d-none" id='certificate10' >POVA</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/electricalmeter/certificates')?>'"  class="sub-link" id='certificate11' >Electrical Meters</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/dashboard')?>'"  class="sub-link disabled d-none" id='certificate12' >DMM</a> 
          <a href="#" onclick="window.location.href = '<?= base_url('/digitalTimer/certificates')?>'"  class="sub-link " id='certificate13' >Timer / Stopwatch</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/pHMeter/certificates')?>'"  class="sub-link" id='certificate14' >pH Meter</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/refractometer/certificates')?>'"  class="sub-link" id='certificate15' >Refractometer</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/temperaturecontroll/certificates')?>'"  class="sub-link" id='certificate16' >Temperature Controller</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/caliper/certificates')?>'"  class="sub-link" id='certificate17' >Caliper / Micrometer</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/dashboard')?>'"  class="sub-link disabled d-none" id='certificate18' >Micrometer</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/dashboard')?>'"  class="sub-link disabled d-none" id='certificate19' >Rule</a>
        </nav>
      </li>
      <li class="nav-item" id='standard'>
        <a href="" class="nav-link with-sub"><i data-feather="archive"></i><span>Standards</span></a>
        <nav class="nav-sub"> 
          <a href="#" onclick="window.location.href = '<?= base_url('/standard/referenceWeight')?>'" class="sub-link" id='standard1'>Reference Weight</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/pressureGauge/standardTable')?>'" class="sub-link" id='standard2'>Test Gauge</a>
          <!-- <a href="#" onclick="window.location.href = '<?= base_url('/thermoStandardTable')?>'" class="sub-link" id='standard3'>Reference Thermometer</a> -->
          <a href="#" onclick="window.location.href = '<?= base_url('/standard/temperatureSource')?>'" class="sub-link" id='standard4'>Temperature Source</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/standard/chamber')?>'" class="sub-link" id='standard18'>Chamber</a>
          <!-- <a href="#" onclick="window.location.href = '<?= base_url('/standard/thermoHygrometer')?>'" class="sub-link my-2" id='standard5'>Reference Thermo-Hygrometer</a> -->
          <!-- <a href="#" onclick="window.location.href = '<?= base_url('/thermoStandardTable')?>'" class="sub-link my-2" id='standard5'>Reference Thermo-Hygrometer</a> -->
          <a href="#" onclick="window.location.href = '<?= base_url('/thermoStandardTable')?>'" class="sub-link my-2" id='standard5'>Reference Thermometer / Thermo-Hygrometer</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/standard/balance')?>'" class="sub-link " id='standard6'>Balance</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/standard/barometer')?>'" class="sub-link" id='standard7'>Barometer</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/standard/multiProductCalibrator')?>'" class="sub-link" id='standard8'>Multi-Product Calibrator</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/dashboard')?>'" class="sub-link disabled d-none" id='standard9'>Proom Calibrator</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/standard/digitalTimer')?>'" class="sub-link my-2" id='standard10'>High Res Programmable Timer / Counter</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/dashboard')?>'" class="sub-link disabled d-none" id='standard11'>Reference Stopwatch</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/standard/gaugeBlock')?>'" class="sub-link" id='standard12'>Gauge Block</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/dashboard')?>'" class="sub-link disabled d-none" id='standard13'>Reference Rule</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/standard/tempRecorder')?>'" class="sub-link my-3" id='standard14'>Temperature Recorder / Wireless Temperature Logger</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/standard/wirelessTempLogger')?>'" class="sub-link d-none" id='standard15'>Wireless Temperature Logger</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/standard/bufferSolution')?>'" class="sub-link my-2" id='standard16'>Buffer Solution</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/standard/documentingProcessCalibrator')?>'" class="sub-link my-2" id='standard17'>Documenting Process Calibrator</a>
          <a href="#" onclick="window.location.href = '<?= base_url('/standard/currentCoil')?>'" class="sub-link my-2" id='standard19'>Current Coil</a>
          
        </nav>
      </li> 
    </ul>
    <hr>
    <ul class="nav-sidebar">
      <li class="nav-item d-none" id='verification'><a href="#" onclick="window.location.href = '<?= base_url('/forVerifyTable')?>'" class="nav-link"><i data-feather="check-square"></i><span>For verification</span></a></li>
      <li class="nav-item" id='pending'><a href="#" onclick="window.location.href = '<?= base_url('/pendingTable')?>'" class="nav-link"><i data-feather="clock"></i><span>Pending / For Correction</span></a></li>
      <li class="nav-item" id='customerSidebar'><a href="#" onclick="window.location.href = '<?= base_url('/customerTable')?>'" class="nav-link"><i data-feather="user-check"></i><span>Customers</span></a></li>
      <li class="nav-item" id='personnel'><a href="#" onclick="window.location.href = '<?= base_url('/personnelTable')?>'" class="nav-link"><i data-feather="smile"></i><span>Personnel</span></a></li>
    </ul>
     <hr>
    <ul class="nav-sidebar">
      <li class="nav-item"   id="account">
        <a href="" class="nav-link with-sub"><i data-feather="users"></i><span>Manage Accounts</span></a>
        <nav class="nav-sub">
          <a href="" id='createadmin' onclick="window.location.href = '<?= base_url('/createUser')?>'" class="sub-link">Create Admin</a>
          <a href="" id='createguest' onclick="window.location.href = '<?= base_url('/guestUserIndex')?>'" class="sub-link">Create User</a>
          <a href="" id='manageadmin' onclick="window.location.href = '<?= base_url('/manageUser')?>'" class="sub-link">Manage Admin</a>
          <a href="" id='manageguest' onclick="window.location.href = '<?= base_url('/manageGuestUser')?>'" class="sub-link">Manage User</a>
        </nav>
      </li>
    </ul>
    <hr>
    <ul class="nav-sidebar">
      <li class="nav-item"><a href="" id='profile' class="nav-link" onclick="window.location.href = '<?= base_url('/profile')?>'"><i data-feather="smartphone"></i><span>My Profile</span></a></li>
      <li class="nav-item"><a href="" id='about' class="nav-link" onclick="window.location.href = '<?= base_url('/about')?>'"><i data-feather="align-justify"></i><span>About</span></a></li>
      <li class="nav-item"><a href="" id='statements' class="nav-link" onclick="window.location.href = '<?= base_url('/defaultEdit')?>'"><i data-feather="align-justify"></i><span>Edit Statements</span></a></li>
      <li class="nav-item"><a href="" id='cmc' class="nav-link" onclick="window.location.href = '<?= base_url('/cmc')?>'"><i data-feather="align-justify"></i><span>Edit CMC</span></a></li>

    </ul>
    <hr>
  </div>
  <!-- NOTIFICATION MODAL -->
  <?php
		echo view('layouts/sidebarNotification')?>
  <!-- NOTIFICATION MODAL -->
  <!-- sidebar-body -->
  <div class="sidebar-footer">
    <a href="#" class="avatar online" onclick="logoutConfirmation('<?= base_url('logout') ?>')">
        <span class="avatar-initial">
            <?php $user1 = session('name'); $fstchar = $user1[0]; echo $fstchar;?>
        </span>
    </a>
    <div class="avatar-body">
      <input type="hidden" id='sessionID' value='<?= session('id')?>'>
      <div class="d-flex align-items-center justify-content-between">
        <h6><?= session('name')?> <?= session('lname')?></h6><br>
      </div>
      <div class="d-flex align-items-center justify-content-between">
        <h6><?= session('email')?></h6>
      </div>
      <span id="sesrol"><?= session('role')?></span>
    </div><!-- avatar-body -->
  </div><!-- sidebar-footer -->
  <p style="font-size:0.7em;color:white;position:fixed;bottom:-1em;left:1em">r3cms v1.4</p>

</div>


<script defer>
  var active = '<?= $active?>';
  var show = '<?= $show?>';
  
  document.getElementById(active).classList.add("active");
  document.getElementById(show).classList.add("active");
  document.getElementById(show).classList.add("show");
</script>

<script defer>
  var role = '<?= $_SESSION['role'];?>';

  if(role!='admin'){
    document.getElementById('account').setAttribute('style','display:none')
    document.getElementById('verification').setAttribute('style','display:none')
    document.getElementById('personnel').setAttribute('style','display:none')
    

  }
</script>

<script>
   function logoutConfirmation(url){
       // windows.confirm("are u sure?");
       href="" 
        var txt;
        if (confirm("Do you want to logout <?= session('name')?>?")) {
            location.href = url;
        }
    }
</script>