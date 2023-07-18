  <div class="preloader">
  	<div class="loading">
  		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
  	</div>
  </div>
  <center>
  	<div class="login-box">
  		<br><br>
  		<div class="card card-outline card-primary">
  			<div class="card-header text-center">
  				<img src="<?= base_url('assets/') ?>img/login.gif" width="200px" alt="AdminLTE Logo" class="brand-image" style="opacity: 1.8">
  				<br>
  			</div>
  			<br>
  			<div class="card-body">
  				<div class="tab-content" id="pills-tabContent">
  					<div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  						<div class="form-group">
  							<?= $this->session->flashdata('message'); ?>
  							<form action="<?= base_url('buka_penawaran/cektoken') ?>" method="POST">
  								<div class="form-group">
  									<label for="exampleInputEmail1">
  										<h6>Token</h6>
  									</label>
  									<textarea id="" class="form-control" name="token" placeholder="Silahkan Paste Disini"></textarea>
  									<!-- <input type="text" name="token" class="form-control" placeholder="Generate Token..."> -->
  									<small class="form-text text-danger"><?= form_error('token'); ?></small>

  									<button type="submit" class="btn btn-success" style="margin-top: 20px;">
  										<h4> Kirim Token</h4>
  									</button>
  								</div>
  							</form>
  						</div>
  					</div>
  				</div>
  			</div>
  			<!-- /.card-body -->
  		</div>
  	</div>
  	<br><br>
  </center>