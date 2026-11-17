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
		'active' => 'dashboard',
		'show' => 'dashboard',
	];
   echo view('layouts/sidebarAdmin',$data)?>



    <div class="content">
      <div class="content-header">
        <a id="contentMenu" href="#" class="content-menu d-none d-lg-flex"><i data-feather="menu"></i></a>
        <a id="mobileMenu" href="#" class="content-menu d-lg-none"><i data-feather="menu"></i></a>
      </div>
      <div class="content-body">
        <label class="content-label"><b>Dashboard</b></label>
        <hr>
        <br>
        <?php $calModules = config('CalibrationModules')->visible(); /* edit app/Config/CalibrationModules.php */ ?>
        <div class="container">
            <div class="row g-3">
                <?php foreach ($calModules as $m): ?>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($m['label']) ?></h5>
                            <p class="card-text"></p>
                            <div class="btn-group" role="group">
                                <a type="button" class="btn btn-primary" href="<?= base_url($m['worksheet'])?>" target="_blank">Worksheet</a>
                                <a type="button" class="btn btn-primary" href="<?= base_url($m['certificates'])?>" target="_blank">Certificates</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <br>
        <br>
      </div>
    </div>
  </body>
</html>
<?= view('layouts/footer-essential'); ?>

