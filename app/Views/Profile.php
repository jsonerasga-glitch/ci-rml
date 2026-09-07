<?php
    $path = 'image/dost.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

?>
<!DOCTYPE html>
<html lang="en">
<?= view('layouts/head-essential'); ?>
  <body class="skin-dark animate">
  <?php
  	$data = [
		'active' => 'profile',
		'show' => 'profile',
	];
   echo view('layouts/sidebarAdmin',$data)?>



    <div class="content">
      <div class="content-header">
        <a id="contentMenu" href="#" class="content-menu d-none d-lg-flex"><i data-feather="menu"></i></a>
        <a id="mobileMenu" href="#" class="content-menu d-lg-none"><i data-feather="menu"></i></a>
      </div>
      <div class="content-body">
        <label class="content-label"><b>Profile</b></label>
        <hr>
        <br>
        <div class="container">
            <div class="row">
                <div class="card border-success">
                    <div class="card-header bg-transparent border-success mt-4"><h1><?php echo session('name');?> <?php echo session('lname');?></h1></div>
                    <div class="card-body text-success">
                        <?php
                            if(session()->getFlashdata('status')){
                                echo "<div class='alert alert-primary' role='alert'>".session()->getFlashdata('status')."</div>";
                            }
                        ?>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><h5 class="card-title">ID: </h5><p class="card-text"><?php echo session('id');?></p></li>
                            <li class="list-group-item"><h5 class="card-title">ROLE: </h5><p class="card-text"><?php echo session('role');?></p></li>
                            <li class="list-group-item"><h5 class="card-title">EMAIL: </h5><p class="card-text"><?php echo session('email');?></p></li>
                        </ul>
                    </div>
                    <div class="card-footer bg-transparent border-success"><button type="button" class="btn btn-danger btn-lg" data-bs-toggle="modal" data-bs-target="#passChangeModal">Change password</button></div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="modal fade" id="passChangeModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Password Change</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <?php $validation = \Config\Services::validation(); ?>
                <form action="<?= base_url('/profile/change_pass') ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" id="acc_id" name="acc_id" value='<?php echo session('id');?>'>
                        <input type="hidden" id="acc_role" name="acc_role" value='<?php echo session('role');?>'>
                        <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><h5 class="card-title">ENTER YOUR EMAIL: </h5>
                                        <p class="card-text">
                                            <div class="input-group mb-3">
                                                <input type="email" class="form-control" id='email' name="email">
                                            </div>
                                        </p>
                                    </li>
                                    <li class="list-group-item"><h5 class="card-title">OLD PASSWORD: </h5>
                                        <p class="card-text">
                                            <div class="input-group mb-3">
                                                <input type="password" class="form-control" id='old_pas' name="password">
                                                <div class="input-group-text">
                                                    <div class="form-check form-switch mt-n2">
                                                        <input class="form-check-input" type="checkbox" id="checkbox_show_pw_old">
                                                        <label class="form-check-label" for="checkbox_show_pw_old">Show</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </p>
                                    </li>
                                    <li class="list-group-item"><h5 class="card-title mt-2  ">NEW PASSWORD: </h5>
                                        <p class="card-text">
                                            <div class="input-group mb-3">
                                                <input type="password" class="form-control" id="new_pas" name="password_new">
                                                <div class="input-group-text">
                                                    <div class="form-check form-switch mt-n2">
                                                        <input class="form-check-input" type="checkbox" id="checkbox_show_pw_new">
                                                        <label class="form-check-label" for="checkbox_show_pw_new">Show</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </p>
                                    </li>
                                    <!-- <li class="list-group-item"><h5 class="card-title nt-2">CONFIRM NEW PASSWORD: </h5>
                                        <p class="card-text">
                                            <div class="input-group mb-3">
                                                <input type="password" class="form-control">
                                                <div class="input-group-text">
                                                    <div class="form-check form-switch mt-n2">
                                                        <input class="form-check-input" type="checkbox" id="checkbox_show_pw_confirm_new">
                                                        <label class="form-check-label" for="checkbox_show_pw_confirm_new">Show</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </p>
                                    </li> -->
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id='change_pass_btn'>Save</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </body>
</html>

<?= view('layouts/footer-essential'); ?>

<script>
      function bind(id, evt, func) {
        var el = document.getElementById(id);
        if (el.addEventListener){
            el.addEventListener(evt, func);
        } else if (el.attachEvent) {
            el.attachEvent('on' + evt, func);
        }
    }

    function show_pass(id){
        let current_type = $('#'+id).attr('type')
        if(current_type === 'password'){
            $('#'+id).attr('type', 'text')
        }else{
            $('#'+id).attr('type', 'password')
        }
    }

    bind('checkbox_show_pw_old', 'change', function(){
        show_pass('old_pas')
    })
    bind('checkbox_show_pw_new', 'change', function(){
        show_pass('new_pas')
    })
    // bind('change_pass_btn', 'click', function(){
    //     if(confirm('Are you sure you want to update your PASSWORD?') === true){
    //         change_pass()
    //     }else{
    //         alert('Canceled')
    //     }
    // })
    

    function change_pass(){
        console.log('changeHere')
        $.ajax({
            cache: false,
            type: "post",
            url: "/profile/change_pass",
            enctype: 'multipart/form-data',

            data: {
                'acc_id': $('#acc_id').val(),
                'email': $('#email').val(),
                'password': $('#old_pas').val(),
                'new_password': $('#new_pas').val(),
            },
        })
        .done(function(result){
            alert('Successfully Changed')
        })
        .fail(function(error){
            console.log(error);
            alert("Unable to change password");
        })
    }
    
    
</script>