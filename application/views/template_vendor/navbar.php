</head>
<?php
$this->role_login->cek_login();
?>

<body style="font-size: 13px;">
	<div class="container-fluid">
		<img class="pull-right" alt="LPSE" src="<?= base_url() ?>assets/img/jmtm2.png" width="15%" />
		<img class="pull-left" alt="LPSE" src="<?= base_url() ?>assets/img/bumn.png" width="15%" style="margin-left: 69%;" />
	</div>
	<!-- end header -->

	<!-- start navbar -->

	<div style="background-color:yellow;height:5px">
	</div>
	<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="container-fluid">
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="margin-bottom: 10px;">
				<ul class="navbar-nav">
					<?php if ($this->session->userdata('id_role') == 1) { ?>
						<li style="font-size:11px;font-weight:bold;"><a class="nav-link" href="<?= base_url('index.php/vendor') ?>"><i class=></i><i class="fa fa-check-square" aria-hidden="true"></i> VENDOR AKTIF</a></li>
						<li style="font-size:11px;font-weight:bold;"><a class="nav-link" href="<?= base_url('index.php/vendor/vendor_pendaftar') ?>"><i class="fa fa-user-plus" aria-hidden="true"></i> PENDAFTAR</a></li>

						<!-- Update -->
						<li style="font-size:11px;font-weight:bold;"><a class="nav-link" href="<?= base_url('index.php/vendor/vendor_kontraktor') ?>"><i class="fa fa-user-plus" aria-hidden="true"></i> VENDOR KONSTRUKSI & KONSULTANSI </a></li>
						<li style="font-size:11px;font-weight:bold;"><a class="nav-link" href="<?= base_url('index.php/vendor/vendor_nonkontraktor') ?>"><i class="fa fa-user-plus" aria-hidden="true"></i> VENDOR NON-KONSTRUKSI </a></li>
						<li style="font-size:11px;font-weight:bold;"><a class="nav-link" href="<?= base_url('index.php/vendor/vendor_perorangan') ?>"><i class="fa fa-user-plus" aria-hidden="true"></i> VENDOR PERORANGAN (KONSULTAN) </a></li>
						<!-- end update -->

						<li style="font-size:11px;font-weight:bold;"><a class="nav-link" href="<?= base_url('index.php/vendor/daftar_hitam') ?>"><i class="fa fa-ban" aria-hidden="true"></i> DAFTAR HITAM</a></li>
						<li style="font-size:11px;font-weight:bold;"><a class="nav-link" href="<?= base_url('beranda') ?>">KEMBALI MENU ADMIN</a></li> <?php } ?>
					<?php if ($this->session->userdata('id_role') == 2) { ?>
						<li style="font-size: 17px;font-weight:bold;"><a class="nav-link mr-3" href="<?= base_url('index.php/vendor') ?>"><i class="fa fa-check-square" aria-hidden="true"></i> VENDOR AKTIF</a></li>
						<li style="font-size: 17px;font-weight:bold;"><a class="nav-link mr-3" href="<?= base_url('index.php/vendor/vendor_pendaftar') ?>"><i class="fa fa-user-plus" aria-hidden="true"></i> PENDAFTAR</a></li>
						<li style="font-size: 17px;font-weight:bold;"><a class="nav-link mr-3" href="<?= base_url('index.php/vendor/daftar_hitam') ?>"><i class="fa fa-ban" aria-hidden="true"></i> DAFTAR HITAM</a></li>

						<li style="font-size: 17px;font-weight:bold;"><a class="nav-link mr-3" href="<?= base_url('beranda') ?>">KEMBALI MENU ADMIN</a></li>
					<?php } ?>
					<?php if ($this->session->userdata('id_role') == 4) { ?>
						<li style="font-size: 12px;font-weight:bold;"><a class="nav-link mr-2" href="<?= base_url('index.php/vendor/dashboard') ?>"><i class="fa fa-home" aria-hidden="true"></i> BERANDA</a></li>
						<li style="font-size: 12px;font-weight:bold;"><a class="nav-link mr-2" href="<?= base_url('index.php/vendor') ?>"><i class="fa fa-check-square" aria-hidden="true"></i> VENDOR AKTIF <span style="font-size: small;" id="notifku" class="badge badge-sm badge-danger"></span></a></li>
						<!-- Update -->
						<li style="font-size: 12px;font-weight:bold;"><a class="nav-link mr-2" href="<?= base_url('index.php/vendor/vendor_kontraktor') ?>"><i class="fa fa-user-plus" aria-hidden="true"></i> VENDOR KONSTRUKSI & KONSULTANSI </a></li>
						<li style="font-size: 12px;font-weight:bold;"><a class="nav-link mr-2" href="<?= base_url('index.php/vendor/vendor_nonkontraktor') ?>"><i class="fa fa-user-plus" aria-hidden="true"></i> VENDOR NON-KONSTRUKSI </a></li>
						<li style="font-size: 12px;font-weight:bold;"><a class="nav-link mr-2" href="<?= base_url('index.php/vendor/vendor_perorangan') ?>"><i class="fa fa-user-plus" aria-hidden="true"></i> VENDOR PERORANGAN (KONSULTAN) </a></li>
						<!-- end update -->

						<li style="font-size: 12px;font-weight:bold;"><a class="nav-link mr-2" href="<?= base_url('index.php/vendor/vendor_pendaftar') ?>"><i class="fa fa-user-plus" aria-hidden="true"></i> PENDAFTAR</a></li>
						<li style="font-size: 12px;font-weight:bold;"><a class="nav-link mr-2" href="<?= base_url('index.php/vendor/daftar_hitam') ?>"><i class="fa fa-ban" aria-hidden="true"></i> DAFTAR HITAM</a></li>
						<li style="font-size: 12px;font-weight:bold;"><a class="nav-link" href="<?= base_url('index.php/vendor/logakses') ?>"><i class="fas fa-user-lock"></i> LOG AKSES</a></li>
						<li style="font-size: 12px;font-weight:bold;"><a class="nav-link" href="<?= base_url('index.php/vendor/gantipassword') ?>"><i class="fas fa-lock"></i> GANTI PASSWORD</a></li>
						<!-- <li style="font-size: 17px;font-weight:bold;"><a class="nav-link" href="<?= base_url('uat') ?>"><i class="fas fa-eye"></i> UAT</a></li> -->
					<?php } ?>
					<?php if ($this->session->userdata('id_role') == 8) {  ?>
						<li style="font-size: 13px;font-weight:bold;"><a class="nav-link" href="<?= base_url('gm/beranda') ?>"><i class="fas fa-home"></i> BERANDA</a></li>
						<li style="font-size: 13px;font-weight:bold;"><a class="nav-link" href="<?= base_url('paket') ?>"><i class="fas fa-cubes"></i> PAKET</a></li>
						<li style="font-size: 13px;font-weight:bold;"><a class="nav-link" href="<?= base_url('index.php/vendor') ?>"><i class="fas fa-cubes"></i> VENDOR</a></li>
						<li style="font-size: 13px;font-weight:bold;"><a class="nav-link" href="<?= base_url('logakses') ?>"><i class="fas fa-unlock-alt"></i> LOG AKSES</a></li>
						<li style="font-size: 13px;font-weight:bold;"><a class="nav-link" href="<?= base_url('gantipassword') ?>"><i class="fas fa-lock"></i> GANTI PASSWORD</a></li>
					<?php } ?>
				</ul>
				<ul class="navbar-nav ml-auto">
					<li>
						<a href="<?= base_url('auth/logout') ?>" role="button" aria-haspopup="true" aria-expanded="false" class="nav-item btn btn-danger ml-auto" style="font-size: 14px;font-weight:bold;">LOGOUT</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div style="background-color: yellow;">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 mb-1">
					<?php if ($this->session->userdata('id_role') == 1) { ?>
						<a href="<?= base_url('assets/User_ADMIN.pdf') ?>" target="_blank">
							<span class="badge badge-primary">Petunjuk Penggunaan</span></a>
					<?php } else if ($this->session->userdata('id_role') == 2) { ?>
						<a href="<?= base_url('assets/User_AGENCY.pdf') ?>" target="_blank">
							<span class="badge badge-primary">Petunjuk Penggunaan</span></a>
					<?php } else if ($this->session->userdata('id_role') == 3) { ?>
						<a href="<?= base_url('assets/User_PANITIA.pdf') ?>" target="_blank">
							<span class="badge badge-primary">Petunjuk Penggunaan</span></a>
					<?php } else if ($this->session->userdata('id_role') == 4) { ?>
						<a href="<?= base_url('assets/User_VALIDATOR.pdf') ?>" target="_blank">
							<span class="badge badge-primary">Petunjuk Penggunaan</span></a>
					<?php } else if ($this->session->userdata('id_role') == 6) { ?>
						<a href="<?= base_url('assets/User_Manager.pdf') ?>">
							<span class="badge badge-primary">Petunjuk Penggunaan</span></a>
					<?php } ?>
					<a href=""> <span class="badge badge-primary">Aplikasi e-Procurement Lainnya</span></a>
					<label> <?php echo date('d F Y') ?>||</label>
					<label id="jam4"></label>
					<label for="">WIB</label>
				</div>
				<div class="col" style="color: black;">
					<a href=""><?= $this->session->userdata('username'); ?></a>
					<?= $this->session->userdata('nama_pegawai'); ?>
				</div>
			</div>
		</div>
	</div>