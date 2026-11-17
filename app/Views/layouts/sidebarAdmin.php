<?php
  // Which modules/standards are listed: app/Config/CalibrationModules.php
  $calConfig    = config('CalibrationModules');
  $calModules   = $calConfig->visible();
  $calStandards = $calConfig->visibleStandards();
?>
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
      <li class="nav-item" id='kpi'><a href="" onclick="window.location.href = '<?= base_url('/kpi')?>'" class="nav-link"><i data-feather="bar-chart-2"></i><span>KPI Dashboard</span></a></li>
      <li class="nav-item " id='TSR'>
        <a href="" class="nav-link" onclick="window.location.href = '<?= base_url('/TSR/requests')?>'" ><i data-feather="clipboard"></i><span>TSR</span></a>
      </li>
      <li class="nav-item " id='worksheet'>
        <a href="" class="nav-link with-sub"><i data-feather="clipboard"></i><span>Worksheets</span></a>
        <nav class="nav-sub">
          <?php foreach ($calModules as $m): ?>
          <a href="#" onclick="window.location.href = '<?= base_url($m['worksheet'])?>'" class="sub-link" id='worksheet<?= $m['n'] ?>'><?= esc($m['label']) ?></a>
          <?php endforeach; ?>

        </nav>
      </li>
      <li class="nav-item " id='certificate'>
        <a href="" class="nav-link with-sub"><i data-feather="monitor"></i><span>Certificates</span></a>
        <nav class="nav-sub">
          <?php foreach ($calModules as $m): ?>
          <a href="#" onclick="window.location.href = '<?= base_url($m['certificates'])?>'" class="sub-link" id='certificate<?= $m['n'] ?>'><?= esc($m['label']) ?></a>
          <?php endforeach; ?>
        </nav>
      </li>
      <li class="nav-item" id='standard'>
        <a href="" class="nav-link with-sub"><i data-feather="archive"></i><span>Standards</span></a>
        <nav class="nav-sub">
          <?php foreach ($calStandards as $sd): ?>
          <a href="#" onclick="window.location.href = '<?= base_url($sd[1])?>'" class="sub-link" id='<?= $sd[2] ?>'><?= esc($sd[0]) ?></a>
          <?php endforeach; ?>
          
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
  
  // Pages of hidden modules still pass their menu ids, so guard against missing elements.
  if (document.getElementById(active)) document.getElementById(active).classList.add("active");
  if (document.getElementById(show)) {
    document.getElementById(show).classList.add("active");
    document.getElementById(show).classList.add("show");
  }
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