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
  <div class="card mt-5">
    <div class="card-header">
			<!-- HEADER --> 
			<div class="row text-center mt-4">
				<div class="col-3">
					<img src="<?php echo $base64; ?>" alt="DOST LOGO" height='90px' style=" top:0"> 
				</div>
				<div class="col-6 mt-n4">
					<h6>Republic of the Philippines</h6>
					<h6>DEPARTMENT OF SCIENCE AND TECHNOLOGY</h6>
					<h6>CALABARZON</h6>
					<h6>Regional Metrology Laboratory</h6>
				</div>
				<div class="col-3">
					<img src="<?php echo $base64PAB; ?>" alt="PAB LOGO" height='90px' style="">
				</div>
			</div>
    <!-- HEADER -->	
    </div>
    <div class="card-body">
      <div class="row">
          <div class="col-12 mt-2">
          <?php
              if(session()->getFlashdata('status')){
                  echo "<div class='alert alert-primary' role='alert'>".session()->getFlashdata('status')."</div>";
              }
          ?>
              <div class="card">
                  <div class="card-header">
                      <!--a class="btn btn-primary float-end" href="Home">Add Data</a-->
                    <h5>Calibration Records</h5>
                      </div>
                    <div class="card-body">
                  <table class="table table-bordered">
                      <thead>
                          <tr>
                              <th>Certificate no.</th>
                              <th>Customer</th>
                              <th>Address</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php foreach($rml_table as $row) : ?>
                          <tr>
                              <td><?= $row['ccno'];?></td>
                              <td><?= $row['costumer'];?></td>
                              <td><?= $row['address'];?></td>
                              <td><a href="<?= base_url('edit/'.$row['id']) ?>" class="btn btn-primary">View</a></td>
                          </tr>   
                          <?php endforeach; ?>          
                      </tbody>
                  </table>
                </div>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
    
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
