<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EPROC - JMTM | LOGIN</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="Shortcut Icon" href="<?= base_url('assets/img/unnamed.png') ?>" type="image/x-icon" sizes="96x96" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">
	<!-- select 2 -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<style>
		.btn-grad70 {
			background-image: linear-gradient(to right, #fc00ff 0%, #00dbde 51%, #fc00ff 100%)
		}

		.btn-grad70 {
			text-transform: uppercase;
			transition: 0.5s;
			background-size: 200% auto;
			color: white;
		}

		.btn-grad70:hover {
			background-position: right center;
			/* change the direction of the change here */
			color: #fff;
			box-shadow: 0 0 30px #fc00ff;
			text-decoration: none;
		}

		.btn-grad5 {
			width: 100%;
			background-image: linear-gradient(to right, #000046 0%, #1CB5E0 51%, #000046 100%);
			text-transform: uppercase;
			transition: 0.5s;
			background-size: 200% auto;
			color: white;
			box-shadow: 0 0 40px #eee;
			border-radius: 10px;
		}

		.btn-grad5:hover {
			background-position: right center;
			/* change the direction of the change here */
			color: #fff;
			box-shadow: 0 0 40px yellow;
			text-decoration: none;
		}

		.btn-grad65 {
			width: 100%;
			background-image: linear-gradient(to right, #000046 0%, #1CB5E0 51%, #000046 100%);
			text-transform: uppercase;
			transition: 0.5s;
			background-size: 200% auto;
			color: white;
			border-radius: 10px;
		}

		.btn-gra65:hover {
			background-position: right center;
			/* change the direction of the change here */
			color: #fff;
			text-decoration: none;
		}
	</style>
</head>
<!--  class="hold-transition login-page" style=" background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;asdads" -->

<body style="background-image: url('assets/img/login page.png');background-repeat: no-repeat;
			background-size: cover;">
	<center>
		<div class="login-box" style="margin-top:100px">
			<!-- /.login-logo -->
			<?php if ($this->session->flashdata('pesan')) {
				echo '  <div class="alert alert-warning alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <h5><i class="icon fas fa-exclamation-triangle"></i> Maaf!</h5>';
				echo  $this->session->flashdata('pesan');
				echo ' </div>';
			} ?>

			<?php if ($this->session->flashdata('salah')) {
				echo '  <div class="alert alert-danger alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <h5><i class="icon fas fa-exclamation-triangle"></i> Maaf !</h5>';
				echo  $this->session->flashdata('salah');
				echo ' </div>';
			} ?>

            <?php if ($this->session->flashdata('tidak_aktif')) {
				echo '  <div class="alert alert-danger alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <h5><i class="icon fas fa-exclamation-triangle"></i> Maaf !</h5>';
				echo  $this->session->flashdata('tidak_aktif');
				echo ' </div>';
			} ?>
			<?php if ($this->session->flashdata('berhasil')) {
				echo '  <div class="alert alert-success alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <h5><i class="icon fas fa-exclamation-triangle"></i> Berhasil !</h5>';
				echo  $this->session->flashdata('berhasil');
				echo ' </div>';
			} ?>
			<div class="card card-outline card-primary btn-grad5">
				<div class="card-header text-center">
					<img src="<?= base_url('assets/') ?>img/jmtm2.png" width="200px" alt="AdminLTE Logo" width="50%" class="brand-image" style="opacity: 1.8">
					<img class="pull-left" alt="LPSE" src="<?= base_url() ?>assets/img/bumn.png" width="50%" style="opacity: 1.8" />
					<br>
				</div>
				<div class="card-body">
					<div class="tab-content" id="pills-tabContent">
						<?php if ($this->session->flashdata('notif')) {
							echo $this->session->flashdata('notif');
						} ?>
						<div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
							<div class="card p-1 btn-grad65" style="max-width: 25rem;">
								<?= form_open('auth'); ?>
								<div class="p-3">
									<div class=" form-group">
										<input type="text" class="form-control" placeholder="Username" name="username" />
										<small class="text-danger"><?= form_error('username') ?></small>
									</div>
									<div class="form-group">
										<input type="password" class="form-control" placeholder="Password" name="password" />
										<small class="text-danger"><?= form_error('password') ?></small>
									</div>
								</div>
								<center>
									<?php echo $widget; ?>
									<?php echo $script; ?>
								</center>
								<br>
								<input class="btn btn-block btn-md btn-grad70 mb-3 p-2" type="submit" value="Login" />
								<!-- <button type="submit">Login</button> -->
								<?= form_close(); ?>
							</div>
						</div>
					</div>
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
	</center>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
	<!-- select2 -->
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>

</html>