<style>
	.contacts {
		list-style: none;
		padding: 0;
	}

	.user_info {
		margin-top: auto;
		margin-bottom: auto;
		margin-left: 15px;
	}

	.online_icon {
		position: absolute;
		height: 15px;
		width: 15px;
		background-color: #4cd137;
		border-radius: 50%;
		bottom: 0.2em;
		right: 0.4em;
		border: 1.5px solid white;
	}

	.contacts li {
		width: 100% !important;
		padding: 5px 10px;
		margin-bottom: 15px !important;
	}

	.img_cont {
		position: relative;
		height: 70px;
		width: 70px;
	}

	.active-angga {
		background: rgb(7, 6, 18);
		background: linear-gradient(90deg, rgba(30, 90, 40, 1) 0%, rgba(42, 41, 100, 1) 100%);
	}

	.user_img {
		height: 70px;
		width: 70px;
		border: 1.5px solid #f5f6fa;

	}

	.contacts_body {
		padding: 0.75rem 0 !important;
		overflow-y: auto;
		white-space: nowrap;
	}
</style>
<div class="preloader">
	<div class="loading">
		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
	</div>
</div>


<!-- INI JADWAL PRAKUALIFIKASI DUA FILE YANG ID NYA  11 7 6 4 10 13 15 14 17 -->
<?php if ($paket['id_kualifikasi'] == 11 || $paket['id_kualifikasi'] == 7 || $paket['id_kualifikasi'] == 6 || $paket['id_kualifikasi'] == 4 || $paket['id_kualifikasi'] == 10  || $paket['id_kualifikasi'] == 17) { ?>
	<div id="main" class="container">
		<input type="hidden" id="id_paket_evaluasi" value="<?= $paket['id_paket'] ?>">
		<input type="hidden" id="id_paket" value="<?= $paket['id_paket'] ?>">
		<div class="float-right p-3">
			<a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi" class="badge badge-danger navbar-badge"></span> Pesan Penjelasan </a>
			<a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca_negosiasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_negosiasi" class="badge badge-danger navbar-badge"></span> Pesan Negosiasi </a>
			<a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_prakualifikasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_prakualifikasi" class="badge badge-danger navbar-badge"></span> Sanggahan Prakualifikasi</a>
			<a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_akhir"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_akhir" class="badge badge-danger navbar-badge"></span> Sanggahan Akhir</a>
		</div>
		<nav aria-label="breadcrumb" class="mt-3">
			<ol class="breadcrumb bg-primary">
				<li class="breadcrumb-item"><a style="color: white;" href="<?= base_url('informasitender') ?>">Beranda &raquo; Informasi Tender</a></li>
			</ol>
		</nav>
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/informasitender/' . $paket['id_paket']) ?>">Informasi Tender</a>
			</li>
			<li class=" nav-item">
				<a class="nav-link bg-info text-white " href="<?= base_url('panitiajmtm/beranda/pertanyaantender/' . $paket['id_paket']) ?>">Pertanyaan</a>
			</li>
			<li class="nav-item">
				<a class="nav-link bg-primary text-white active" href="<?= base_url('panitiajmtm/beranda/evaluasitender/' . $paket['id_paket']) ?>">Evaluasi</a>
			</li>
			<!-- <li class="nav-item">
			<a class="nav-link active " href="<?= base_url('panitiajmtm/beranda/reverseauctiontender/' . $paket['id_paket']) ?>">Reverse Auction</a>
		</li> -->
			<?php if ($paket['id_kualifikasi'] == 16 || $paket['id_kualifikasi'] == 14 || $paket['id_kualifikasi'] == 15 || $paket['id_kualifikasi'] == 12) { ?>

			<?php } else { ?>
				<?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_prakualifikasi['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>
				<?php	} else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_prakualifikasi['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_prakualifikasi['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggah_prakualifikasi/' . $paket['id_paket']) ?>">Sangahan Prakualifikasi</a>
					</li>
				<?php	} else { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggah_prakualifikasi/' . $paket['id_paket']) ?>">Sangahan Prakualifikasi</a>
					</li>
				<?php	} ?>
			<?php } ?>
			<?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>
			<?php	} else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Negosiasi</a>
				</li>
			<?php	} else { ?>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Negosiasi</a>
				</li>
			<?php	} ?>
			<?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>
			<?php	} else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $paket['id_paket']) ?>">Sangahan</a>
				</li>
			<?php	} else { ?>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $paket['id_paket']) ?>">Sangahan</a>
				</li>
			<?php	} ?>
			<li class="nav-item">
				<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/berita_acara/' . $paket['id_paket']) ?>">Berita Acara</a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="content">
				<div class="bs-callout bs-callout-info" style="margin-top: 20px;">
					Klik pada Nama Peserta untuk melakukan evaluasi
				</div>
				<div class="card border-primary mb-3">
					<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Hasil Evaluasi
						<?php if (date('Y-m-d H:i', strtotime($paket['selesai_semua_tender'])) > date('Y-m-d H:i')) { ?>

							<a href="<?= base_url('panitiajmtm/beranda/penetapanpemenangtender/' . $paket['id_paket']) ?>" class="btn btn-success btn-sm">Penetapan Pemenang</a>
						<?php } else { ?>

						<?php } ?>
					</div>
					<div class="card-body">
						<div style="overflow-x:auto;">
							<table class="table" id="tbl_evaluasi">
								<thead>
									<tr style="font-size: 11px;">
										<th>No</th>
										<th>Nama Peserta</th>
										<th>
											<span>Status Dokumen Kelengkapan</span>
										</th>
										<th>
											<span>Status Kelengkapan Dokumen Kualifikasi</span>
										</th>
										<th>
											<span>Hasil Prakualifikasi</span>
										</th>
										<th>
											<span>Hasil Teknis</span>
										</th>
										<th>Penawaran</th>
										<th>Penawaran Terkoreksi</th>
										<th>Negosiasi Harga</th>
										<th><span>Peringkat Teknis</span></th>
										<th>Nilai Akhir</th>
										<th>Sanggahan Prakualifikasi</th>
										<th>Sanggahan Akhir</th>
										<th><span>Pemenang</span></th>
										<th>Mengundurkan Diri</th>

									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
<?php } else if ($paket['id_kualifikasi'] == 8 || $paket['id_kualifikasi'] == 13 || $paket['id_kualifikasi'] == 15) { ?>
	<!-- INI JADWAL PRAKUALIFIKASI SATU FILE -->
	<div id="main" class="container">
		<input type="hidden" id="id_paket_evaluasi" value="<?= $paket['id_paket'] ?>">
		<input type="hidden" id="id_paket" value="<?= $paket['id_paket'] ?>">
		<div class="float-right p-3">
			<a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi" class="badge badge-danger navbar-badge"></span> Pesan Penjelasan </a>
			<a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca_negosiasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_negosiasi" class="badge badge-danger navbar-badge"></span> Pesan Negosiasi </a>
			<a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_prakualifikasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_prakualifikasi" class="badge badge-danger navbar-badge"></span> Sanggahan Prakualifikasi</a>
			<a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_akhir"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_akhir" class="badge badge-danger navbar-badge"></span> Sanggahan Akhir</a>
		</div>
		<nav aria-label="breadcrumb" class="mt-3">
			<ol class="breadcrumb bg-primary">
				<li class="breadcrumb-item"><a style="color: white;" href="<?= base_url('informasitender') ?>">Beranda &raquo; Informasi Tender</a></li>
			</ol>
		</nav>
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/informasitender/' . $paket['id_paket']) ?>">Informasi Tender</a>
			</li>
			<li class=" nav-item">
				<a class="nav-link bg-info text-white " href="<?= base_url('panitiajmtm/beranda/pertanyaantender/' . $paket['id_paket']) ?>">Pertanyaan</a>
			</li>
			<li class="nav-item">
				<a class="nav-link bg-primary text-white active" href="<?= base_url('panitiajmtm/beranda/evaluasitender/' . $paket['id_paket']) ?>">Evaluasi</a>
			</li>
			<!-- <li class="nav-item">
			<a class="nav-link active " href="<?= base_url('panitiajmtm/beranda/reverseauctiontender/' . $paket['id_paket']) ?>">Reverse Auction</a>
		</li> -->
			<?php if ($paket['id_kualifikasi'] == 16 || $paket['id_kualifikasi'] == 12) { ?>

			<?php } else { ?>
				<?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_prakualifikasi['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>
				<?php	} else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_prakualifikasi['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_prakualifikasi['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggah_prakualifikasi/' . $paket['id_paket']) ?>">Sangahan Prakualifikasi</a>
					</li>
				<?php	} else { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggah_prakualifikasi/' . $paket['id_paket']) ?>">Sangahan Prakualifikasi</a>
					</li>
				<?php	} ?>
			<?php } ?>
			<?php if (date('Y-m-d H:i', strtotime($get_tahap_prakualfiikasi_satu_file_penetapan['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>
			<?php	} else if (date('Y-m-d H:i', strtotime($get_tahap_prakualfiikasi_satu_file_penetapan['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_prakualfiikasi_satu_file_penetapan['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Negosiasi</a>
				</li>
			<?php	} else { ?>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Negosiasi</a>
				</li>
			<?php	} ?>
			<?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>
			<?php	} else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $paket['id_paket']) ?>">Sangahan</a>
				</li>
			<?php	} else { ?>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $paket['id_paket']) ?>">Sangahan</a>
				</li>
			<?php	} ?>
			<li class="nav-item">
				<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/berita_acara/' . $paket['id_paket']) ?>">Berita Acara</a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="content">
				<div class="bs-callout bs-callout-info" style="margin-top: 20px;">
					Klik pada Nama Peserta untuk melakukan evaluasi
				</div>
				<div class="card border-primary mb-3">
					<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Hasil Evaluasi
						<?php if (date('Y-m-d H:i', strtotime($paket['selesai_semua_tender'])) > date('Y-m-d H:i')) { ?>

							<a href="<?= base_url('panitiajmtm/beranda/penetapanpemenangtender/' . $paket['id_paket']) ?>" class="btn btn-success btn-sm">Penetapan Pemenang</a>
						<?php } else { ?>

						<?php } ?>
					</div>
					<div class="card-body">
						<div style="overflow-x:auto;">
							<table class="table" id="tbl_evaluasi">
								<thead>
									<tr style="font-size: 11px;">
										<th>No</th>
										<th>Nama Peserta</th>
										<th>
											<span>Status Dokumen Kelengkapan</span>
										</th>
										<th>
											<span>Status Kelengkapan Dokumen Kualifikasi</span>
										</th>
										<th>
											<span>Hasil Prakualifikasi</span>
										</th>
										<th>
											<span>Hasil Teknis</span>
										</th>
										<th>Penawaran</th>
										<th>Penawaran Terkoreksi</th>
										<th>Negosiasi Harga</th>
										<th><span>Peringkat Teknis</span></th>
										<th>Nilai Akhir</th>
										<th>Sanggahan Prakualifikasi</th>
										<th>Sanggahan Akhir</th>
										<th><span>Pemenang</span></th>
										<th>Mengundurkan Diri</th>

									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } else if ($paket['id_kualifikasi'] == 12 || $paket['id_kualifikasi'] == 9 || $paket['id_kualifikasi'] == 14 || $paket['id_kualifikasi'] == 18 || $paket['id_kualifikasi'] == 20 || $paket['id_kualifikasi'] == 21) { ?>
	<!-- INI JADWAL PASCAKUALIFIKASI -->
	<div id="main" class="container">
		<input type="hidden" id="id_paket_evaluasi" value="<?= $paket['id_paket'] ?>">
		<input type="hidden" id="id_paket" value="<?= $paket['id_paket'] ?>">
		<div class="float-right p-3">
			<a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi" class="badge badge-danger navbar-badge"></span> Pesan Penjelasan </a>
			<a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca_negosiasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_negosiasi" class="badge badge-danger navbar-badge"></span> Pesan Negosiasi </a>

			<a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_akhir"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_akhir" class="badge badge-danger navbar-badge"></span> Sanggahan Akhir</a>
		</div>
		<nav aria-label="breadcrumb" class="mt-3">
			<ol class="breadcrumb bg-primary">
				<li class="breadcrumb-item"><a style="color: white;" href="<?= base_url('informasitender') ?>">Beranda &raquo; Informasi Tender</a></li>
			</ol>


		</nav>
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/informasitender/' . $paket['id_paket']) ?>">Informasi Tender</a>
			</li>
			<li class=" nav-item">
				<a class="nav-link bg-info text-white " href="<?= base_url('panitiajmtm/beranda/pertanyaantender/' . $paket['id_paket']) ?>">Pertanyaan</a>
			</li>
			<li class="nav-item">
				<a class="nav-link bg-primary text-white active" href="<?= base_url('panitiajmtm/beranda/evaluasitender/' . $paket['id_paket']) ?>">Evaluasi</a>
			</li>
			<!-- <li class="nav-item">
			<a class="nav-link active " href="<?= base_url('panitiajmtm/beranda/reverseauctiontender/' . $paket['id_paket']) ?>">Reverse Auction</a>
		</li> -->
			<?php if ($paket['id_kualifikasi'] == 16 || $paket['id_kualifikasi'] == 15 || $paket['id_kualifikasi'] == 12 || $paket['id_kualifikasi'] == 14 || $paket['id_kualifikasi'] == 18 || $paket['id_kualifikasi'] == 20 || $paket['id_kualifikasi'] == 21) { ?>

			<?php } else { ?>
				<?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_prakualifikasi['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>
				<?php	} else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_prakualifikasi['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_prakualifikasi['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggah_prakualifikasi/' . $paket['id_paket']) ?>">Sangahan Prakualifikasi</a>
					</li>
				<?php	} else { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggah_prakualifikasi/' . $paket['id_paket']) ?>">Sangahan Prakualifikasi</a>
					</li>
				<?php	} ?>
			<?php } ?>
			<?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>
			<?php	} else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Negosiasi</a>
				</li>
			<?php	} else { ?>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Negosiasi</a>
				</li>
			<?php	} ?>
			<?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>
			<?php	} else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $paket['id_paket']) ?>">Sangahan</a>
				</li>
			<?php	} else { ?>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $paket['id_paket']) ?>">Sangahan</a>
				</li>
			<?php	} ?>
			<li class="nav-item">
				<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/berita_acara/' . $paket['id_paket']) ?>">Berita Acara</a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="content">
				<div class="bs-callout bs-callout-info" style="margin-top: 20px;">
					Klik pada Nama Peserta untuk melakukan evaluasi
				</div>
				<div class="card border-primary mb-3">
					<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Hasil Evaluasi
						<?php if (date('Y-m-d H:i', strtotime($paket['selesai_semua_tender'])) > date('Y-m-d H:i')) { ?>

							<a href="<?= base_url('panitiajmtm/beranda/penetapanpemenangtender/' . $paket['id_paket']) ?>" class="btn btn-success btn-sm">Penetapan Pemenang</a>
						<?php } else { ?>

						<?php } ?>
					</div>
					<div class="card-body">
						<div style="overflow-x:auto;">
							<?php if ($ketika_kosong_vendor_dievaluasi == null) { ?>
								<table class="table">
								<?php	} else { ?>
									<table class="table" id="tbl_evaluasi">
									<?php 	} ?>
									<thead>
										<tr style="font-size: 11px;">
											<th>No</th>
											<th>Nama Peserta</th>
											<th>
												<span>Status Dokumen Kelengkapan</span>
											</th>
											<th>
												<span>Status Kelengkapan Dokumen Kualifikasi</span>
											</th>
											<th>Penawaran</th>
											<th>Penawaran Terkoreksi</th>
											<th>Negosiasi Harga</th>

											<th>
												<span>Hasil Teknis</span>
											</th>
											<th><span>Peringkat Teknis</span></th>
											<th>Nilai Akhir</th>
											<th>Sanggahan Akhir</th>
											<th><span>Pemenang</span></th>
											<th>Mengundurkan Diri</th>

										</tr>
									</thead>
									<tbody>

									</tbody>
									</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } else { ?>


<?php } ?>


<!-- Modal Chat Lihat -->
<div class="modal fade" id="modal_liha_chat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info text-white">
				<h5 class="modal-title" id="modalTitle">Pesan Baru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p id="pesan_kosong"></p>
				<div class="card-header bg-primary text-white p-2">
					<label for=""> PESAN DARI PENYEDIA</label>
				</div>
				<div class="card contacts_body" style="height: 500px;
		border-radius: 15px !important;
		background: rgb(7, 6, 18);
		background: linear-gradient(90deg, rgba(7, 6, 18, 1) 0%, rgba(42, 41, 136, 1) 100%);">
					<ui class="contacts" id="yangAktif">
					</ui>
				</div>
			</div>
			<div class="modal-footer">
				<div class="bs-callout-info col-md-12">
					Balas Pesan Dengan Mengklik Pesan Baru<br>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Chat Lihat -->
<div class="modal fade" id="modal_lihat_nilai_administrasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info text-white">
				<h5 class="modal-title" id="modalTitle">Dokumen Lulus & Sedang Kelarifikasi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="card">
					<div class="card-header bg-info text-white">Status Dokumen Persyaratan</div>
					<div class="card-body">
						<table class="table table-hover" id="tbl_lihat_nilai_administrasi">
							<thead>
								<tr>
									<th>No</th>
									<th>Jenis Persyaratan</th>
									<th>Status / Revisi Dokumen Persyaratan</th>
									<th>Status / Alasan Dokumen Persyaratan</th>
									<th>File Revisi Dari </th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- modal lihat sangahan pra -->
<div class="modal fade" id="modal_lihat_sanggahan_prakualifikasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header btn-grad">
				<h5 class="modal-title" id="exampleModalLabel">Detail Sanggahan Prakualifikasi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table table-striped">
					<tr>
						<th>Nama Vendor</th>
						<th>Nama Dokumen</th>
						<th>File</th>
					</tr>
					<tbody id="lihat_sanggahan_prakualifiaksi">

					</tbody>
				</table>
				<div id="blom_ada_sanggahan"></div>
			</div>
		</div>
	</div>
</div>

<!-- modal lihat sangahan pra -->
<div class="modal fade" id="modal_lihat_sanggahan_akhir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header btn-grad">
				<h5 class="modal-title" id="exampleModalLabel">Detail Sanggahan Akhir</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table table-striped">
					<tr>
						<th>Nama Vendor</th>
						<th>Nama Dokumen</th>
						<th>File</th>
					</tr>
					<tbody id="lihat_sanggahan_akhir">

					</tbody>
				</table>
				<div id="blom_ada_sanggahan"></div>
			</div>
		</div>
	</div>
</div>