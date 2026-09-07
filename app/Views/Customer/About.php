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

<html lang="en">
<?= view('layouts/head-essential'); ?>
  <body class="skin-base animate">
  <?php
		$data = [
			'active' => 'about',
			'show' => 'about',
		];
		echo view('layouts/sidebarAdmin',$data)?> 
    <!-- Page Content -->
    <div class="content">
      <div class="content-header">
        <a id="contentMenu" href="#" class="content-menu d-none d-lg-flex"><i data-feather="menu"></i></a>
        <a id="mobileMenu" href="#" class="content-menu d-lg-none"><i data-feather="menu"></i></a>
      </div><!-- content-header -->
      <div class="content-body">    
        <div class="container-fluid">
                <div class="container-fluid">
            
                <div class="btn-toolbar mb-2 mb-md-0">  
                  <div class="container-fluid mt-4">
                    <div class="card shadow-sm p-3 mb-5 bg-white rounded">
                <div id="updateModal" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Update details</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                                <div class="modal-body">
                                        <input type="hidden" name="id" id="id"/>
                                        <h4>Contact Info</h4>
                                        <div class="form-group">
                                            <label for="tel">Telefax:</label>
                                            <input type="text" class="form-control" id="tel" placeholder="Telefax" name="tel">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="text" class="form-control" id="email" placeholder="Email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="url">URL:</label>
                                            <input type="text" class="form-control" id="url" placeholder="URL" name="url">
                                        </div>
                                        <hr>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" onclick="update_info();">Submit</button>
                                </div>
                        </div>
                    </div>
                </div> 

                    
                    <div class=" d-flex ">
                        <h4 class="text-left ">Contact info</h4>
                    </div>  <hr>
                        <div class="row">
                            <div class="col-12">
                                <?php
                                    if(session()->getFlashdata('status')){
                                        echo "<div class='alert alert-primary' role='alert'>".session()->getFlashdata('status')."</div>";
                                    }
                                ?>
                                      <div class="text-left ">
                                            <h4 class="mb-3">Telefax #: <span id="span_tel"></span></h4>
                                            <h4 class="mb-3">Email: <span id="span_email"></span></h4>
                                            <h4 class="mb-3">URL: <span id="span_url"></span></h4>
                                            <i>Note: This will display at the bottom of each certificate.</i> <hr>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateModal">Edit</button>

                                    </div>
                            </div>
                    </div>
            </div>
          </div>
          </div>
        </div>
       

        </div>
      <!-- /#page-content-wrapper -->
    </div>
  </body>
  <?= view('layouts/footer-essential'); ?>
  <script>

    get_info()

    function update_info(){
        $.ajax({
            cache: false,
            type: "post",
            url: "/about/update",
            data: {
                "id" : '1',
                "tel": $('#tel').val(),
                "email": $('#email').val(),
                "url": $('#url').val(),
            },
            success: function(result) {
                alert('Update Successful')
                location.reload();
            },
            error: function (error) {
                console.log(error);
            },
        })
    }
    
    function get_info(){
        let about = <?= json_encode($about)?>;
        let tel = about[0].tel
        let email = about[0].email
        let url = about[0].url
        $('#span_tel').html(tel)
        $('#span_email').html(email)
        $('#span_url').html(url)
    }
</script>
