<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<?php
    $path = 'image/dost.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>
<?php
    $pathPAB = 'image/pab logo.png';
    $typePAB = pathinfo($pathPAB, PATHINFO_EXTENSION);
    $dataPAB = file_get_contents($pathPAB);
    $base64PAB = 'data:image/' . $typePAB . ';base64,' . base64_encode($dataPAB);
?>
<div class="container">
    <div class="card mt-5 mx-auto shadow-lg p-3 mb-5 bg-white col-xl-4 col-s-10 col-l-4 col-md-6 col-xs-10">
        <div class=" bg-white" style="">
            <div class="text-center mt-4 mb-2">
                <img class="" src="<?= $base64?>" alt="DOST Logo" style="height: 45px;">
            </div>
            <h3 class="text-center" style="font-family: Tahoma;">
                <!--i class="fas fa-user-shield"></i-->
                <strong>Login</strong>
            </h3>
        </div>
        <div class="card-body">
            <div class="container">
                <?php if (isset($validation)) : ?>
                    <div class="col-12">
                        <div class="alert alert-danger" role="alert">
                            <?= $validation->listErrors() ?>
                        </div>
                    </div>
                <?php endif; ?>
                <form class="" action="<?= base_url('/') ?>" method="post" autocomplete="off">
                    <div class="row mb-2">
                        <div class="col">
                            <label for="">Email</label>
                            <input type="text" class="form-control mt-n2" placeholder="Email" name="email" id="email">
                        </div>
                     </div>    
                     <div class="row mb-2">
                        <div class="col">
                            <label for="">Password</label>
                            <input type="password" style="border-right: none;" class="form-control mt-n2" autocomplete="off" placeholder="Password" name="password" id="password">
                        </div>
                     </div> 
                     <div class="row mb-2">
                        <div class="col">
                            <div class="form-check form-switch mt-n2">
                                <input class="form-check-input" type="checkbox" id="checkbox_show_pw">
                                <label class="form-check-label" for="checkbox_show_pw">Show Password</label>
                            </div>
                        </div>
                     </div> 
                   
                    <hr>
                    <button type="submit" class="btn btn-primary btn-lg text-center form-control mb-3 ">Login</button>
                    <div class="text-center">
                        <a style="font-size: 12px;" href="/adminLogin" class="">Login as Admin</a> &middot; <a style="font-size: 12px;" href="<?= site_url('customer/login') ?>">Customer portal</a>
                    </div>
                    
                </form>
            </div>
        </div>     
    </div>
</div>
<script>
  function bind(id, evt, func) {
    var el = document.getElementById(id);
    if (el.addEventListener){
        el.addEventListener(evt, func);
    } else if (el.attachEvent) {
        el.attachEvent('on' + evt, func);
    }
}

function show_pass(){
    let current_type = $('#password').attr('type')
    if(current_type === 'password'){
        $('#password').attr('type', 'text')
    }else{
        $('#password').attr('type', 'password')
    }
}

bind('checkbox_show_pw', 'change', function(){
    show_pass()
})

</script>


<?= $this->endSection() ?>