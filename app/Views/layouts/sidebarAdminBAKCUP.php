<?php 
header("X-Frame-Options: SAMEORIGIN");
?>

<link href="/dashboardAsset/assets/css/notification.css" rel="stylesheet">


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
    <a href="#" class="sidebar-logo bordered"><span></span></a>
    <a href="#" class="sidebar-logo-text">RML<span>++</span></a>
    <a href="" class="sidebar-logo-text" style="margin-left:40%" data-toggle="modal" data-target="#exampleModal"></a>
  </div><!-- sidebar-header -->
  <div class="sidebar-body">
    <ul class="nav-sidebar">
      <li class="nav-item" id='dashboard'>
        <a href="" onclick="window.location.href = '/dashboard'" class="nav-link"><i data-feather="home"></i><span>Dashboard</span></a>              
      </li>
      <li class="nav-item " id='worksheet'>
        <a href="" class="nav-link with-sub"><i data-feather="clipboard"></i><span>Worksheets</span></a>
        <nav class="nav-sub">
          <a href="#" onclick="window.location.href = '/electHome'"  class="sub-link" style="" id='worksheet1'>Single Range E-balance</a>
          <a href="#" onclick="window.open('/thermoAdd','_blank')" target="_blank" class="sub-link" id='worksheet2'>Thermohygrometer</a>
          <a href="#" onclick="window.location.href = '/testWeightAddDataView'"  class="sub-link" id='worksheet3'>Test Weights</a>
          <a href="#" onclick="window.location.href = '/weighingScaleAddNew'"  class="sub-link " id='worksheet4' >Weighing Scale</a>
          <a href="#" onclick="window.location.href = '/digitalThermometer/new'"  class="sub-link " id='worksheet5' >Digital Thermometer</a>
          <a href="#" onclick="window.location.href = '/digitalTimerInputView'"  class="sub-link " id='worksheet6' >Digital Timer</a>
        </nav>
      </li>
      <li class="nav-item " id='certificate'>
        <a href="" class="nav-link with-sub"><i data-feather="monitor"></i><span>Certificates</span></a>
        <nav class="nav-sub">
          <a href="#" onclick="window.location.href = '/electTable'"  class="sub-link" id='certificate1'>Single Range E-balance</a>
          <a href="#" onclick="window.location.href = '/thermoTable'"  class="sub-link" id='certificate2'>Thermohygrometer</a>
          <a href="#" onclick="window.location.href = '/testWeightTable'"  class="sub-link" id='certificate3'>Test Weights</a>
          <a href="#" onclick="window.location.href = '/weighingScaleTable'"  class="sub-link" id='certificate4' >Weighing Scale</a>
          <a href="#" onclick="window.location.href = '/digitalThermometer/table'"  class="sub-link " id='certificate5' >Digital Thermometer</a>
          <a href="#" onclick="window.location.href = '/timerTable'"  class="sub-link " id='certificate6' >Digital Timer</a>
        </nav>
      </li>
      <li class="nav-item" id='standard'>
        <a href="" class="nav-link with-sub"><i data-feather="archive"></i><span>Standards</span></a>
        <nav class="nav-sub">
          <a href="#" onclick="window.location.href = '/electStandard'" class="sub-link" id='standard1'>Single Range E-balance</a>
          <a href="#" onclick="window.location.href = '/thermoStandardTable'" class="sub-link" id='standard2'>Thermohygrometer</a>
          <a href="#" onclick="window.location.href = '/testWeightStandardTable'" class="sub-link" id='standard3'>Test Weights</a>
          <a href="#" onclick="window.location.href = '/electStandard'" class="sub-link " id='standard4' >Weighing Scale</a>
          <a href="#" onclick="window.location.href = '/digitalThermometer/standardTable'"  class="sub-link " id='standard5' >Digital Thermometer</a>

          
        </nav>
      </li> 
    </ul>
    <hr>
    <ul class="nav-sidebar">
      <li class="nav-item" id='verification'><a href="#" onclick="window.location.href = '/forVerifyTable'" class="nav-link"><i data-feather="check-square"></i><span>For verification</span></a></li>
      <li class="nav-item" id='pending'><a href="#" onclick="window.location.href = '/pendingTable'" class="nav-link"><i data-feather="clock"></i><span>Pending / For Correction</span></a></li>
      <li class="nav-item" id='customerSidebar'><a href="#" onclick="window.location.href = '/customerTable'" class="nav-link"><i data-feather="user-check"></i><span>Customers</span></a></li>
      <li class="nav-item" id='personnel'><a href="#" onclick="window.location.href = '/personnelTable'" class="nav-link"><i data-feather="smile"></i><span>Personnel</span></a></li>
    </ul>
     <hr>
    <ul class="nav-sidebar">
      <li class="nav-item"   id="account">
        <a href="" class="nav-link with-sub"><i data-feather="users"></i><span>Manage Accounts</span></a>
        <nav class="nav-sub">
          <a href="" id='createadmin' onclick="window.location.href = '/createUser'" class="sub-link">Create Admin</a>
          <a href="" id='createguest' onclick="window.location.href = '/guestUserIndex'" class="sub-link">Create User</a>
          <a href="" id='manageadmin' onclick="window.location.href = '/manageUser'" class="sub-link">Manage Admin</a>
          <a href="" id='manageguest' onclick="window.location.href = '/manageGuestUser'" class="sub-link">Manage User</a>
        </nav>
      </li>
    </ul>
    <hr>
    <ul class="nav-sidebar">
      <li class="nav-item"><a href="" id='profile' class="nav-link" onclick="window.location.href = '/profile'"><i data-feather="smartphone"></i><span>My Profile</span></a></li>
      <li class="nav-item"><a href="" id='about' class="nav-link" onclick="window.location.href = '/about'"><i data-feather="align-justify"></i><span>About</span></a></li>
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
      <div class="d-flex align-items-center justify-content-between">
        <h6><?= session('name')?> <?= session('lname')?></h6><br>
      </div>
      <div class="d-flex align-items-center justify-content-between">
        <h6><?= session('email')?></h6>
      </div>
      <span><?= session('role')?></span>
    </div><!-- avatar-body -->
  </div><!-- sidebar-footer -->
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

