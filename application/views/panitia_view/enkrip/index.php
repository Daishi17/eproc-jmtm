  <div class="preloader">
  	<div class="loading">
  		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
  	</div>
  </div>
  <center>
  	<div class="login-box">
  		<?php if ($this->session->flashdata('salah')) {
				echo '  <div class="alert alert-danger alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <h5><i class="icon fas fa-exclamation-triangle"></i> Maaf !</h5>';
				echo  $this->session->flashdata('salah');
				echo ' </div>';
			} ?>
  		<?php if ($this->session->flashdata('tidakada')) {
				echo '  <div class="alert alert-danger alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <h5><i class="icon fas fa-exclamation-triangle"></i> Maaf !</h5>';
				echo  $this->session->flashdata('tidakada');
				echo ' </div>';
			} ?>
  		<br><br>
  		<div class="card card-outline card-primary shadow p-3 mb-5 bg-white rounded">
  			<div class="card-header text-center">
  				<img src="<?= base_url('assets/') ?>img/login.gif" width="200px" alt="AdminLTE Logo" class="brand-image" style="opacity: 1.8">
  				<br>
  			</div>
  			<br>
  			<div class="card-body">
  				<div class="tab-content" id="pills-tabContent">
  					<div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  						<form method="POST" action="<?= base_url('buka_penawaran/login') ?>">
  							<div class="form-group">
  								<label for="exampleInputEmail1">Username</label>
  								<input type="text" class="form-control" name="username" placeholder="Username" required>
  								<small class="form-text text-danger"><?= form_error('username'); ?></small>
  								<label for="exampleInputPassword1" style="margin-top: 17px;">Password</label>
  								<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
  								<small class="form-text text-danger"><?= form_error('username'); ?></small>
  								<button type="submit" class="btn btn-success col-md-5" style="margin-top: 25px;">Login</button>
  								<a href="<?= base_url('buka_penawaran/daftar') ?>" class="btn btn-primary col-md-6" style="margin-top: 25px;">Daftar</a>
  								<?php if ($this->session->userdata('id_role') == 2) { ?>
  									<a href="<?= base_url('paket/daftar_paket') ?>" class="btn btn-info col-md-10" style="margin-top: 25px;">Kembali Ke Beranda Paket</a>
  								<?php } else { ?>
  									<a href="<?= base_url('panitiajmtm/beranda') ?>" class="btn btn-info col-md-10" style="margin-top: 25px;">Kembali Ke Beranda Paket</a>
  								<?php	} ?>
  							</div>
  						</form>

  					</div>
  				</div>
  			</div>
  			<!-- /.card-body -->
  		</div>
  	</div>
  	<br><br>
  </center>