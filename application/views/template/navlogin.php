<?php
$this->role_login->cek_login();
?>
</head>

<body style="font-size: 13px;" oncontextmenu="return false;">
	<div class="container-fluid">
		<img class="pull-right" alt="LPSE" src="<?= base_url() ?>assets/img/jmtm2.png" width="15%" />
		<img class="pull-left" alt="LPSE" src="<?= base_url() ?>assets/img/bumn.png" width="15%" style="margin-left: 69%;" />
	</div>
	<!-- end header -->

	<!-- start navbar -->

	<div style="background-color:yellow;height:5px">
	</div>
	<nav class="navbar navbar-expand-lg navbar-light bg-light" style=" background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="container-fluid" style="font-size:medium">
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="margin-bottom: 10px;">
				<ul class="navbar-nav">
					<?php if ($this->session->userdata('id_role') == 1) { ?>
						<li style="font-size: 11px;font-weight:bold;"><a class="nav-link" href="<?= base_url('beranda') ?>"><i class="fas fa-home"></i> BERANDA</a></li>
						<li style="font-size: 11px;font-weight:bold;"><a class="nav-link" href="<?= base_url('pegawai') ?>"><i class="fas fa-user"></i> PEGAWAI</a></li>
						<!-- EndKarimCode -->
						<li style="font-size: 11px;font-weight:bold;"><a class="nav-link" href="<?= base_url('manager') ?>"><i class="fas fa-user-tie"></i> MANAGER</a></li>
						<!-- <li style="font-size: 11px;font-weight:bold;"><a class="nav-link" href="<?= base_url('validator') ?>">VALIDATOR</a></li> -->
						<li style="font-size: 11px;font-weight:bold;"><a class="nav-link" href="<?= base_url('subagency') ?>"><i class="fas fa-user-tie"></i> SUB-AGENCY</a></li>
						<li style="font-size: 11px;font-weight:bold;"><a class="nav-link" href="<?= base_url('panitia') ?>"><i class="fas fa-users"></i> PANITIA</a></li>
						<!-- ini sirup nanti di kondisian hak aksesnya -->
						<li style="font-size: 11px;font-weight:bold;"><a class="nav-link" href="<?= base_url('sirup') ?>"><i class="fas fa-file-signature"></i> SIRUP</a></li>
						<li style="font-size: 11px;font-weight:bold;"><a class="nav-link" href="<?= base_url('paket') ?>"><i class="fas fa-box-open"></i> PAKET</a></li>
						<li style="font-size: 11px;font-weight:bold;"><a class="nav-link" href="<?= base_url('index.php/vendor') ?>"><i class="fas fa-building"></i> VENDOR</a></li>
						<li class="nav-item dropdown" style="font-size: 11px;font-weight:bold;">
							<a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fab fa-pied-piper-hat"></i> MASTER <i class="fas fa-angle-down"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="<?= base_url('nib') ?>">NIB</a>
								<a class="dropdown-item" href="<?= base_url('jadwal_paket_tender') ?>">Jenis Jadwal</a>
								<!-- <a class="dropdown-item" href="<?= base_url('jadwal_transaksi_langsung') ?>">Jadwal Transaksi Langsung</a> -->
								<a class="dropdown-item" href="<?= base_url('unit_kerja') ?>">Unit </a>
								<a class="dropdown-item" href="<?= base_url('jenis_anggaran') ?>">Jenis Anggaran</a>
								<a class="dropdown-item" href="<?= base_url('metode_pemilihan') ?>">Metode Pemilihan</a>
								<a class="dropdown-item" href="<?= base_url('metode_dokumen') ?>">Metode Dokumen</a>
								<!-- <a class="dropdown-item" href="<?= base_url('metode_evaluasi') ?>">Metode Evaluasi</a> -->
								<a class="dropdown-item" href="<?= base_url('produk_dalam_negri') ?>">Jenis Produk Pemilihan</a>
								<a class="dropdown-item" href="<?= base_url('jenis_pengadaan') ?>">Jenis Pengadaan</a>
								<a class="dropdown-item" href="<?= base_url('tahun_anggaran') ?>">Tahun Anggaran</a>
								<!-- <a class="dropdown-item" href="<?= base_url('tahun_anggaran') ?>">Role Panitia Pemilihan</a>
								<a class="dropdown-item" href="<?= base_url('tahun_anggaran') ?>">Role Pegawai</a> -->
								<a class="dropdown-item" href="<?= base_url('area') ?>">Unit Area</a>
								<a class="dropdown-item" href="<?= base_url('sbu') ?>">SBU</a>
								<!-- <a class="dropdown-item" href="<?= base_url('jadwal_kualifikasi') ?>">Kualifikasi</a> -->
							</div>
						</li>
						<li class="nav-item dropdown" style="font-size: 11px;font-weight:bold;">
							<a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-chart-pie"></i> LAPORAN <i class="fas fa-angle-down"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="<?= base_url('laporan') ?>">TOTAL</a>
								<a class="dropdown-item" href="<?= base_url('laporan/grafik_dan_rekap') ?>">GRAFIK & REKAP</a>
								<a class="dropdown-item" href="<?= base_url('laporan/kinerja_vendor') ?>">KINERJA VENDOR</a>
								<a class="dropdown-item" href="<?= base_url('laporan/daftarhitam') ?>">DAFTAR HITAM</a>
								<!-- <a class="dropdown-item" href="<?= base_url('laporan') ?>">PENYEDIA</a>
								<a class="dropdown-item" href="<?= base_url('laporan') ?>">DIVISI</a> -->
							</div>
						</li>
						<li style="font-size: 11px;font-weight:bold;"><a class="nav-link" href="<?= base_url('logakses') ?>"><i class="fas fa-user-lock"></i> LOG AKSES</a></li>
						<li style="font-size: 11px;font-weight:bold;"><a class="nav-link" href="<?= base_url('gantipassword') ?>"><i class="fas fa-lock"></i> GANTI PASSWORD</a></li>
												<li style="font-size: 13px;font-weight:bold;"><a class="nav-link" href="<?= base_url('upload_kontrak') ?>"><i class="fas fa-file"></i> UPLOAD KONTRAK</a></li>
						<!-- <li style="font-size: 11px;font-weight:bold;"><a class="nav-link" href="<?= base_url('uat') ?>"><i class="fas fa-eye"></i> UAT</a></li> -->
					<?php } ?>
					<?php if ($this->session->userdata('id_role') == 2) { ?>
						<li style="font-size: 13px;font-weight:bold;"><a class="nav-link" href="<?= base_url('beranda') ?>"><i class="fas fa-home"></i> BERANDA</a></li>
						<li style="font-size: 13px;font-weight:bold;"><a class="nav-link" href="<?= base_url('paket') ?>"><i class="fas fa-cubes"></i> PAKET</a></li>
						<!-- <li style="font-size: 13px;font-weight:bold;"><a class="nav-link" href="<?= base_url('panitia') ?>"><i class="fas fa fa-users"></i> PANITIA PEMILHAN</a></li> -->
						<li style="font-size: 13px;font-weight:bold;"><a class="nav-link" href="<?= base_url('beranda/penilaian_kinerja') ?>"><i class="fas fa-chart-line"></i> PENILAIAN KINERJA</a></li>
						<li style="font-size: 13px;font-weight:bold;"><a class="nav-link" href="<?= base_url('beranda/progres_kinerja_vendor') ?>"><i class="far fa-chart-bar"></i> PROGRES KINERJA</a></li>
						<li style="font-size: 13px;font-weight:bold;"><a class="nav-link" href="<?= base_url('index.php/vendor_agency') ?>"><i class="fas fa-chalkboard-teacher"></i> VENDOR</a></li>
						<li style="font-size: 13px;font-weight:bold;"><a class="nav-link" href="<?= base_url('panitiajmtm/logakses') ?>"><i class="fas fa-user-lock"></i> LOG AKSES</a></li>
						<li style="font-size: 13px;font-weight:bold;"><a class="nav-link" href="<?= base_url('gantipassword') ?>"><i class="fas fa-lock"></i> GANTI PASSWORD</a></li>
						<li style="font-size: 13px;font-weight:bold;"><a class="nav-link" href="<?= base_url('upload_kontrak') ?>"><i class="fas fa-file"></i> UPLOAD KONTRAK</a></li>
					<?php } ?>
					<?php if ($this->session->userdata('id_role') == 6) { ?>
						<li style="font-size: 13px;font-weight:bold;"><a class="nav-link" href="<?= base_url('beranda') ?>"><i class="fas fa-home"></i> BERANDA</a></li>
						<li style="font-size: 13px;font-weight:bold;"><a class="nav-link" onclick="sudah_dibaca_notifikasi_manager()" href="#"><i class="fas fa-file-signature"></i> APPROVAL PAKET <span id="notifku" class="badge badge-danger"></span></a></li>
						<li style="font-size: 13px;font-weight:bold;"><a class="nav-link" href="<?= base_url('panitiajmtm/logakses') ?>"><i class="fas fa-user-lock"></i> LOG AKSES</a></li>
						<li style="font-size: 13px;font-weight:bold;"><a class="nav-link" href="<?= base_url('gantipassword') ?>"><i class="fas fa-lock"></i> GANTI PASSWORD</a></li>
						<!-- <li style="font-size: 13px;font-weight:bold;"><a class="nav-link" href="<?= base_url('uat') ?>"><i class="fas fa-eye"></i> UAT</a></li> -->
					<?php } ?>
					<?php if ($this->session->userdata('id_role') == 3) { ?>
						<li style="font-size: 13px;font-weight:bold;"><a class="nav-link" href="<?= base_url('panitiajmtm/beranda') ?>"><i class="fas fa-home"></i> BERANDA</a></li>
						<li style="font-size: 13px;font-weight:bold;"><a class="nav-link" href="<?= base_url('panitiajmtm/daftarpaket') ?>"><i class="fas fa-cubes"></i> DAFTAR PAKET</a></li>
						<li style="font-size: 13px;font-weight:bold;"><a class="nav-link" href="<?= base_url('panitiajmtm/berita') ?>"><i class="far fa-newspaper"></i> BERITA</a></li>
						<?php if ($status_penetapan_langsung) { ?>
							<li style="font-size: 13px;font-weight:bold;"><a class="nav-link" href="<?= base_url('penetapanlangsung') ?>"><i class="far fa-handshake"></i> PENETAPAN LANGSUNG</a></li>
						<?php } ?>
						<li style="font-size: 13px;font-weight:bold;"><a class="nav-link" href="<?= base_url('panitiajmtm/logakses') ?>"><i class="fas fa-unlock-alt"></i> LOG AKSES</a></li>
						<li style="font-size: 13px;font-weight:bold;"><a class="nav-link" href="<?= base_url('gantipassword') ?>"><i class="fas fa-lock"></i> GANTI PASSWORD</a></li>
						<!-- <li style="font-size: 13px;font-weight:bold;"><a class="nav-link" href="<?= base_url('uat') ?>"><i class="fas fa-eye"></i> UAT</a></li> -->
					<?php } ?>
					<?php if ($this->session->userdata('id_role') == 4) { ?>
						<li style="font-size: 17px;font-weight:bold;"><a class="nav-link mr-3" href="<?= base_url('index.php/vendor/dashboard') ?>"><i class="fa fa-home" aria-hidden="true"></i> BERANDA</a></li>
						<li style="font-size: 17px;font-weight:bold;"><a class="nav-link mr-3" href="<?= base_url('index.php/vendor') ?>"><i class="fa fa-check-square" aria-hidden="true"></i> VENDOR AKTIF</a></li>
						<li style="font-size: 17px;font-weight:bold;"><a class="nav-link mr-3" href="<?= base_url('index.php/vendor/vendor_pendaftar') ?>"><i class="fa fa-user-plus" aria-hidden="true"></i> PENDAFTAR</a></li>
						<li style="font-size: 17px;font-weight:bold;"><a class="nav-link mr-3" href="<?= base_url('index.php/vendor/daftar_hitam') ?>"><i class="fa fa-ban" aria-hidden="true"></i> DAFTAR HITAM</a></li>
						<li style="font-size: 17px;font-weight:bold;"><a class="nav-link" href="<?= base_url('index.php/vendor/logakses') ?>"><i class="fas fa-user-lock"></i> LOG AKSES</a></li>
						<li style="font-size: 17px;font-weight:bold;"><a class="nav-link" href="<?= base_url('index.php/vendor/gantipassword') ?>"><i class="fas fa-lock"></i> GANTI PASSWORD</a></li>
						<!-- <li style="font-size: 17px;font-weight:bold;"><a class="nav-link" href="<?= base_url('uat') ?>"><i class="fas fa-eye"></i> UAT</a></li> -->
					<?php } ?>
					<?php if ($this->session->userdata('id_role') == 8) {  ?>
						<li style="font-size: 13px;font-weight:bold;"><a class="nav-link" href="<?= base_url('gm/beranda') ?>"><i class="fas fa-home"></i> BERANDA</a></li>
						<li style="font-size: 13px;font-weight:bold;"><a class="nav-link" href="<?= base_url('paket') ?>"><i class="fas fa-cubes"></i> PAKET</a></li>
						<li style="font-size: 13px;font-weight:bold;"><a class="nav-link" href="<?= base_url('index.php/vendor') ?>"><i class="fas fa-cubes"></i> VENDOR</a></li>
						<!-- <li style="font-size: 13px;font-weight:bold;"><a class="nav-link" href="<?= base_url('logakses') ?>"><i class="fas fa-unlock-alt"></i> LOG AKSES</a></li>  -->
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
					<label> <?php echo date('d F Y ') ?>||</label>
					<label id="jam2"></label>
					<label id="jam3"></label>
					<label for="">WIB</label>

				</div>
				<div class="col" style="color: black;">
					
					<?= $this->session->userdata('nama_pegawai'); ?> - <?= $this->session->userdata('nama_unit_kerja'); ?>
				</div>

			</div>
		</div>
	</div>
