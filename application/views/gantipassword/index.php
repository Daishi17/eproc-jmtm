	<div class="preloader">
		<div class="loading">
			<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
		</div>
	</div>
	<div id="main" class="container">
		<br>
		<div class="breadcrumb">Mengganti Password
		</div>

		<div class="content">
			<div class="row">
				<div class="col-md-3">
					<img src="<?= base_url() ?>assets/img/lock.png" alt="" width="300px">
				</div>
				<div class="col-md-9">
					<div class="bs-callout bs-callout-warning" style="margin-top: 20px;">
						<b style="margin-left:20px">
							Saran:
						</b>
						<ol>
							<li>Panjang password sebaiknya minimal 8 karakter</li>
							<li>Terdiri atas kombinasi huruf dan angka <strong>Misal: asd123</strong></li>
							<!-- <li>Kealangan</li>
							<li>Kealangan</li>
							<li>Kealangan</li> -->
						</ol>
					</div>
					<?php $this->session->flashdata('message'); ?>
					<form action="<?= base_url('gantipassword/edit_password') ?>" method="post">
						<div class="row">
							<div class="col-md-4">
								<label for="password_lama" style="margin-top: 20px;">Username<span style="color:red;">*</span></label>
								<input type="text" readonly class="form-control" name="" value="<?= $this->session->userdata('username') ?>" id="">

							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<label for="password_baru" style="margin-top: 20px;">Password Baru<span style="color:red;">*</span></label>
								<input type="password" class="form-control" name="password" id="">
								<small class="form-text text-danger"><?= form_error('password'); ?></small>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<label for="password_baru" style="margin-top: 20px;">Ulangi Password Baru<span style="color:red;">*</span></label>
								<input type="password" class="form-control" name="password2" id="">
								<small class="form-text text-danger"><?= form_error('password2'); ?></small>
							</div>
						</div>
						<button type="submit" class="btn btn-success">Simpan</button>
					</form>
				</div>
			</div>
		</div>
	</div>