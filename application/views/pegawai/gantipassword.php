  <div class="preloader">
  	<div class="loading">
  		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
  	</div>
  </div>
  <div id="main" class="container">
  	<br>
  	<br>
  	<ol class="breadcrumb" style=" background-image: linear-gradient(to top,rgb(35, 32, 223),rgba(11, 76, 255, 0.63)) !important;">
  		<li><a style="text-decoration: none; color:white;" href="#">Ganti Password Pegawai</a></li>
  	</ol>

  	<div class="content">
  		<div class="row">
  			<div class="col-md-3">
  				<img src="<?= base_url() ?>assets/img/lock.png" alt="" width="300px">
  			</div>
  			<div class="col-md-9">

  				<form action="<?= base_url('pegawai/gantipassword/' . $pegawai['id_pegawai']) ?>" method="POST">
  					<input type="hidden" name="id_pegawai" value="<?= $pegawai['id_pegawai'] ?>">
  					<div class="row">
  						<div class="col-md-4">
  							<label for="password_lama" style="margin-top: 20px;">Nama Pegawai<span style="color:red;">*</span></label>
  							<input type="text" value="<?= $pegawai['nama_pegawai'] ?>" class="form-control" name="" id="" disabled>

  						</div>
  					</div>
  					<div class="row">
  						<div class="col-md-4">
  							<label for="password_lama" style="margin-top: 20px;">Username<span style="color:red;">*</span></label>
  							<input type="text" value="<?= $pegawai['username'] ?>" class="form-control" name="" id="" disabled>
  						</div>
  					</div>
  					<div class="row">
  						<div class="col-md-4">
  							<label for="password_baru" style="margin-top: 20px;">Password Baru<span style="color:red;">*</span></label>
  							<input type="password" class="form-control" name="password" id="">
  							<small class="text-danger"><?= form_error('password') ?></small>
  						</div>
  					</div>
  					<div class="row">
  						<div class="col-md-4">
  							<label for="password_baru" style="margin-top: 20px;">Ulangi Password Baru<span style="color:red;">*</span></label>
  							<input type="password" class="form-control" name="password2" id="">
  							<small class="text-danger"><?= form_error('password2') ?></small>
  						</div>
  					</div>
  					<button type="submit" class="btn btn-success" style="margin-top: 20px;">Simpan</button>
  				</form>
  			</div>
  		</div>
  	</div>
  </div>