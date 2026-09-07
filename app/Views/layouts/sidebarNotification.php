<?= view('layouts/head-essential'); ?> 
<link href="<?= base_url('/dashboardAsset/assets/css/notification.css')?>" rel="stylesheet">

<style>
    .pHover:hover {
        color:blue;
    }
</style>

<div class='notificationIcon' onclick='openNotif(document.getElementById("notificationBox"))'>
    <i data-feather="bell" style="height:3em;width:3em;color:white"></i><span class="badge badgePosition bg-danger" id='countOfNotification'></span>
</div>



<div class='card notification close' id='notificationBox' onclick='openNotif(document.getElementById("notificationBox"))'>
    <div class="card-body">
        <h5 class='card-title'>Notifications</h5>
        <hr class='my-3'>
        <div id='adminNotifs'>
        </div>
        <hr id="adminNotifsHR" class='my-3'>
        <div id='notifs'>
        </div>

    </div>
</div> 


<script src="<?= base_url('/js/scripts/jquery-3.5.1.slim.min.js')?>"></script>

<script defer>
  var role = '<?= $_SESSION['role'];?>';

  var notificationCount = 0;

  if(role!='admin'){
    document.getElementById('adminNotifs').setAttribute('style','display:none')
    document.getElementById('adminNotifsHR').setAttribute('style','display:none')
  }

  function getNotif() {
  $.ajax({
    cache: false,
    type: "post",
    dataType:'json',
    data: {'ID': <?= $_SESSION['id'];?>},
    url: "<?= base_url('Dashboard/forNotification')?>",
    success: function (result) {
        addNotification(result.user)
        if(role=='admin'){
            addNotificationAdmin(result.admin)
        }
        // window.setTimeout(getNotif, 10000);
    },
  });
}

function openNotif(notif) {
    getNotif();
    if (notif.classList.contains("open")) {
        notif.classList.remove("open");
        notif.classList.add("close");
    } else {
        notif.classList.remove("close");
        notif.classList.add("open");
    }
}

function addNotification(data){
    notificationEmpty('notifs');
    var notifs = document.getElementById('notifs');
    var count = document.getElementById('countOfNotification');
    var countOfNotification = 0;
    if(data.length > 0){
        for (let i=0; i < data.length; i++) { 
            countOfNotification += data[i].length;
            for (let index = 0; index < data[i].length; ++index) {
                // <p class="card-text">Notification 5</p>
                var p = document.createElement('p');
                p.setAttribute('class', 'card-text pHover');
                if(data[i][index].completion == 'Pending'){
                    p.innerHTML =  data[i][index].certificateNumber+' is Pending, submitted to '+ data[i][index].verifierEmail;
                }
                if(data[i][index].completion == 'On-going verification'){
                    p.innerHTML =  data[i][index].certificateNumber+' is under verification by '+ data[i][index].verifierEmail;
                }
                if(data[i][index].completion == 'For correction'){
                    p.innerHTML =  data[i][index].certificateNumber+' sent back by '+ data[i][index].verifierEmail+' due to '+ data[i][index].comment;
                }
                p.setAttribute('onclick', "window.location.href = '<?= base_url('/pendingTable')?>'");
                p.setAttribute('style', 'cursor: default; hov')
                notifs.appendChild(p);
                
            }
        }
        count.innerHTML = countOfNotification;
    }
}


// $worksheet_links = [
//     "0" => "/electronicBalance/worksheet",
//     "1" => "/thermohygrometer/worksheet",
//     "2" => "/testWeight/worksheet",
//     "3" => "/weighingScale/worksheet",
//     "4" => "/digitalThermometer/worksheet",
//     "5" => "/digitalTimer/worksheet",
//     "6" => "/pressureGauge/worksheet",
//     "7" => "/pHMeter/worksheet",
//     "8" => "/glassware/worksheet",
//     "9" => "/temperaturecontroll/worksheet",
//     "10" => "/enclosure/worksheet",
//     "11" => "/refractometer/worksheet",
//     "12" => "/caliper/worksheet",
//     "13" => "/electricalmeter/worksheet"
// ];

// $worksheet_titles = [
//     "0" => "Electronic Balance",
//     "1" => "Thermo-Hygrometer",
//     "2" => "Test Weight",
//     "3" => "Weighing Scale",
//     "4" => "Digital Thermometer",
//     "5" => "Digital Timer",
//     "6" => "Pressure Gauge",
//     "7" => "PH Meter",
//     "8" => "Glassware / POVA",
//     "9" => "Temperature Controller",
//     "10" => "Enclosure / Water Bath / Autoclave",
//     "11" => "Refractometer",
//     "12" => "Caliper / Micrometer",
//     "13" => "Electrical Meter",
// ];


function addNotificationAdmin(data){
    notificationEmpty('adminNotifs');
    var notifs = document.getElementById('adminNotifs');
    var count = document.getElementById('countOfNotification');
    var countOfNotification = 0;
    if(data.length > 0){
        for (let i=0; i < data.length; i++) { 
            countOfNotification += data[i].length;
            for (let index = 0; index < data[i].length; ++index) {
                // <p class="card-text">Notification 5</p>
                var p = document.createElement('p');
                p.setAttribute('class', 'card-text');
                if(data[i][index].completion == 'For Verification'){
                    p.innerHTML =  data[i][index].certificateNumber+' is For Verification, submitted by '+ data[i][index].calibratorAccountEmail;
                }
                if(data[i][index].completion == 'On-going verification'){
                    p.innerHTML =  'Currently verifiying '+data[i][index].certificateNumber;
                }
                notifs.appendChild(p);
                
            }
        }
        count.innerHTML = parseInt(count.innerHTML) + parseInt(countOfNotification);
    }
}

function notificationEmpty(notifs) {
    var e = document.getElementById(notifs);
    var first = e.firstElementChild;
    while (first) {
        first.remove();
        first = e.firstElementChild;
    }
}

$( document ).ready(function() {
    getNotif();
});

</script>
