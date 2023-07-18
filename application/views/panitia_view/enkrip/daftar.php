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
  							<form action="<?= base_url('buka_penawaran/daftar') ?>" method="POST">
  								<div class="form-group">
  									<label for="exampleInputEmail1">Username</label>
  									<input type="text" class="form-control" name="username" placeholder="Username">
  									<small class="form-text text-danger"><?= form_error('username'); ?></small>
  									<label for="exampleInputPassword1" style="margin-top: 17px;">Password</label>
  									<input type="password" class="form-control" name="password" placeholder="Password">
  									<input type="hidden" class="form-control" name="id_vendor_enkripsi" value="<?= $this->session->userdata('id_vendor'); ?>">
  									<small class="form-text text-danger"><?= form_error('password'); ?></small>
  									<label for="exampleInputPassword1" style="margin-top: 17px;">Verifikasi Password</label>
  									<input type="password" class="form-control" name="password2" id="exampleInputPassword1" placeholder="Verifikasi Password">
  									<small class="form-text text-danger"><?= form_error('password'); ?></small>
  									<button type="submit" class="btn btn-success" style="margin-top: 25px;">Daftar</button>
  									<a href="<?= base_url('buka_penawaran') ?>" class="btn btn-primary" style="margin-top: 25px;">Kembali</a>
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