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
<style>
	.btn-grad {
		background-image: linear-gradient(to right, #000046 0%, #1CB5E0 51%, #000046 100%)
	}

	.btn-grad {
		text-transform: uppercase;
		transition: 0.5s;
		background-size: 200% auto;
		color: white;
		box-shadow: 0 0 20px white;
	}

	.btn-grad:hover {
		background-position: right center;
		/* change the direction of the change here */
		color: #fff;
		box-shadow: 0 0 20px yellow;
		text-decoration: none;
	}


	.btn-grad2 {
		background-image: linear-gradient(to right, #ee0979 0%, #ff6a00 51%, #ee0979 100%)
	}

	.btn-grad2 {
		text-align: center;
		text-transform: uppercase;
		transition: 0.5s;
		background-size: 200% auto;
		color: white;
		box-shadow: 0 0 10px #ee0979;
		border-radius: 5px;
	}

	.btn-grad2:hover {
		background-position: right center;
		/* change the direction of the change here */
		color: #fff;
		box-shadow: 0 0 10px yellow;
		text-decoration: none;
	}

	.btn-grad3 {
		background-image: linear-gradient(to right, #1D976C 0%, #93F9B9 51%, #1D976C 100%)
	}

	.btn-grad3 {
		text-align: center;
		text-transform: uppercase;
		transition: 0.5s;
		background-size: 200% auto;
		color: white;
		box-shadow: 0 0 10px #1D976C;
		border-radius: 5px;
		display: block;
	}

	.btn-grad3:hover {
		background-position: right center;
		/* change the direction of the change here */
		color: #fff;
		box-shadow: 0 0 10px yellow;
		text-decoration: none;
	}

	.btn-grad4 {
		background-image: linear-gradient(to right, #000428 0%, #004e92 51%, #000428 100%);
		margin: 2px;
		text-align: center;
		text-transform: uppercase;
		transition: 0.5s;
		background-size: 200% auto;
		color: white;
		box-shadow: 0 0 20px #eee;
		border-radius: 30px;
		display: block;
	}

	.btn-grad4:hover {
		background-position: right center;
		/* change the direction of the change here */
		color: #fff;
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
		box-shadow: 0 0 40px #1CB5E0;
		text-decoration: none;
	}

	.btn-grad6 {
		width: 100%;
		background-image: linear-gradient(to right, #000046 0%, #1CB5E0 51%, #000046 100%);
		text-transform: uppercase;
		transition: 0.5s;
		background-size: 200% auto;
		color: white;
		box-shadow: 0 0 40px #eee;
	}

	.btn-grad6:hover {
		background-position: right center;
		/* change the direction of the change here */
		color: #fff;
		box-shadow: 0 0 10px yellow;
		text-decoration: none;
	}


	.btn-grad7 {
		background-image: linear-gradient(to right, #00d2ff 0%, #3a7bd5 51%, #00d2ff 100%)
	}

	.btn-grad7 {
		text-transform: uppercase;
		transition: 0.5s;
		background-size: 200% auto;
		color: white;
		box-shadow: 0 0 20px #eee;
	}

	.btn-grad7:hover {
		background-position: right center;
		/* change the direction of the change here */
		color: #00d2ff;
		text-decoration: none;
		box-shadow: 0 0 40px #00d2ff;
	}


	.btn-grad8 {
		background-image: linear-gradient(to right, #1D976C 0%, #93F9B9 51%, #1D976C 100%)
	}

	.btn-grad8 {
		text-transform: uppercase;
		transition: 0.5s;
		background-size: 200% auto;
		color: white;
		box-shadow: 0 0 20px #eee;

	}

	.btn-grad8:hover {
		background-position: right center;
		/* change the direction of the change here */
		color: #1D976C;
		text-decoration: none;
		box-shadow: 0 0 40px #1D976C;
	}

	.btn-grad9 {
		background-image: linear-gradient(to right, #ee0979 0%, #ff6a00 51%, #ee0979 100%)
	}

	.btn-grad9 {

		text-transform: uppercase;
		transition: 0.5s;
		background-size: 200% auto;
		color: white;
		box-shadow: 0 0 20px #eee;

	}

	.btn-grad9:hover {
		background-position: right center;
		/* change the direction of the change here */
		color: #ee0979;
		text-decoration: none;
		box-shadow: 0 0 40px #ee0979;
	}

	.btn-grad10 {
		background-image: linear-gradient(to right, #ce150f 20%, #ff6a00 51%, #cf2323 100%)
	}

	.btn-grad10 {

		text-transform: uppercase;
		transition: 0.5s;
		background-size: 200% auto;
		color: white;
		box-shadow: 0 0 20px #eee;

	}

	.btn-grad10:hover {
		background-position: right center;
		/* change the direction of the change here */
		color: #F7971E;
		text-decoration: none;
		box-shadow: 0 0 40px #F7971E;
	}

	.btn-grad20 {
		width: 100%;
		background-image: linear-gradient(to right, #2C3E50 0%, #FD746C 51%, #2C3E50 100%)
	}

	.btn-grad20 {
		text-transform: uppercase;
		transition: 0.5s;
		background-size: 200% auto;
		color: white;
		box-shadow: 0 0 20px #eee;
	}

	.btn-grad20:hover {
		background-position: right center;
		/* change the direction of the change here */
		color: #fff;
		box-shadow: 0 0 40px #FD746C;
		text-decoration: none;
	}

	.btn-grad21 {
		width: 100%;
		background-image: linear-gradient(to right, #C02425 0%, #F0CB35 51%, #C02425 100%)
	}

	.btn-grad21 {
		text-transform: uppercase;
		transition: 0.5s;
		background-size: 200% auto;
		color: white;
		box-shadow: 0 0 20px #eee;
		border-radius: 10px;
	}

	.btn-grad21:hover {
		background-position: right center;
		/* change the direction of the change here */
		color: #fff;
		box-shadow: 0 0 40px #F0CB35;
		text-decoration: none;
	}

	.btn-grad100 {
		background-image: linear-gradient(to right, #ee0979 0%, #ff6a00 51%, #ee0979 100%)
	}

	.btn-grad100 {
		text-transform: uppercase;
		transition: 0.5s;
		background-size: 200% auto;
		color: white;
		box-shadow: 0 0 20px #eee;
	}

	.btn-grad100:hover {
		background-position: right center;
		color: #fff;
		box-shadow: 0 0 30px #ee0979;
		text-decoration: none;
	}

	.btn-grad101 {
		background-image: linear-gradient(to right, #ee0979 0%, #ff6a00 51%, #ee0979 100%)
	}

	.btn-grad101 {
		width: 30px;
		height: 30px;
		text-transform: uppercase;
		transition: 0.5s;
		background-size: 200% auto;
		color: white;
		box-shadow: 0 0 20px #eee;
		border-radius: 5px;
		display: block;
		border: none;
	}

	.btn-grad101:hover {
		background-position: right center;
		color: #fff;
		box-shadow: 0 0 30px #ee0979;
		text-decoration: none;
	}
</style>
<div class="preloader">
	<div class="loading">
		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
	</div>
</div>
<!-- INI JADWAL PRAKUALIFIKASI DUA FILE YANG ID NYA  11 7 6 4 10 13 15 17 -->
<?php if ($this->session->userdata('id_role') == 1 || $this->session->userdata('id_role') == 2) { ?>
	<div class="text-center mt-3">
		<a class="btn btn-grad" href="<?= base_url('paket/daftar_paket') ?>">KEMBALI KE DAFTAR PAKET</a>
	</div>
<?php } ?>

<?php if ($paket['id_kualifikasi'] == 6 || $paket['id_kualifikasi'] == 4 ||  $paket['id_kualifikasi'] == 10 ||  $paket['id_kualifikasi'] == 24) { ?>
	<div id="main" class="container">
		<form action="javascript:;" id="form_tidak_lulus_dokumen_tambahan">
			<input type="hidden" name="id_persyaratan_tambahan_lulus">
			<input type="hidden" name="id_vendor_persyaratan_lulus">
			<input type="hidden" name="id_paket_persyaratan_lulus">
			<textarea hidden name="alasan_tidak_lulus_new"></textarea>
		</form>
		<input type="hidden" id="id_paket" value="<?= $paket['id_paket'] ?>">
		<?php if ($this->session->userdata('id_role') == 1 || $this->session->userdata('id_role') == 2) { ?>

		<?php    } else { ?>
			<div class="float-right p-3">
				<a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi" class="badge badge-danger navbar-badge"></span> Pesan Penjelasan </a>
				<a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca_negosiasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_negosiasi" class="badge badge-danger navbar-badge"></span> Pesan Negosiasi </a>
				<a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_prakualifikasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_prakualifikasi" class="badge badge-danger navbar-badge"></span> Sanggahan Prakualifikasi</a>
				<a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_akhir"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_akhir" class="badge badge-danger navbar-badge"></span> Sanggahan Akhir</a>
			</div>
		<?php    } ?>
		<nav aria-label="breadcrumb" class="mt-3">
			<ol class="breadcrumb bg-primary">
				<li class="breadcrumb-item"><a style="color: white;" href="<?= base_url('panitiajmtm/beranda/informasitender/' . $paket['id_paket']) ?>">Beranda &raquo; Informasi Tender</a></li>
			</ol>
		</nav>
		<?php if ($this->session->userdata('id_role') == 1 || $this->session->userdata('id_role') == 2) { ?>
		<?php    } else { ?>
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a class="nav-link bg-primary text-white" href="<?= base_url('panitiajmtm/beranda/informasitender/' . $paket['id_paket']) ?>">Informasi Tender</a>
				</li>
				<?php if ($paket['id_kualifikasi'] == 22) { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/reverseauctiontender/' . $paket['id_paket']) ?>">Reverse Auction / Bidding Harga</a>
					</li>
				<?php } else { ?>

				<?php } ?>
				<li class=" nav-item">
					<a class="nav-link bg-info text-white active" href="<?= base_url('panitiajmtm/beranda/pertanyaantender/' . $paket['id_paket']) ?>">Pertanyaan</a>
				</li>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/evaluasitender/' . $paket['id_paket']) ?>">Evaluasi</a>
				</li>
				<?php if ($paket['id_kualifikasi'] == 16 || $paket['id_kualifikasi'] == 15 || $paket['id_kualifikasi'] == 12 || $paket['id_kualifikasi'] == 14 || $paket['id_kualifikasi'] == 18 || $paket['id_kualifikasi'] == 20 || $paket['id_kualifikasi'] == 21) { ?>
				<?php } else { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggah_prakualifikasi/' . $paket['id_paket']) ?>">Sangahan Prakualifikasi</a>
					</li>
				<?php } ?>
				<?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>
				<?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Negosiasi</a>
					</li>
				<?php    } else { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Negosiasi</a>
					</li>
				<?php    } ?>
				<?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>
				<?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $paket['id_paket']) ?>">Sangahan</a>
					</li>
				<?php    } else { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $paket['id_paket']) ?>">Sangahan</a>
					</li>
				<?php    } ?>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/berita_acara/' . $paket['id_paket']) ?>">Berita Acara</a>
				</li>
			</ul>
		<?php    } ?>
		<div class="tab-content p-2 card">
			<!-- tender -->
			<div class="tab-pane active" id="informasi-tender" role="tabpanel" aria-labelledby="tender-tab">
				<div class="content">
					<?= $this->session->flashdata('berita_acara_penawaran'); ?>
					<?= $this->session->flashdata('berita_acara_tender'); ?>
					<?= $this->session->flashdata('berita_acara_peringkat'); ?>
					<div class="container-fluid">
						<div style="overflow-x:auto">
							<?= $this->session->flashdata('status_tahap_tender'); ?>
							<table class="table table-bordered">
								<tbody>
									<tr>
										<th>Kode Tender</th>
										<td><?= $paket['kode_tender'] ?> <a target="_blank" href="<?= base_url('panitiajmtm/beranda/summary_tender/' . $paket['id_paket']) ?>" class="float-right badge badge-secondary" style="height: 20px;">Summary Tender</a></td>
									</tr>
									<tr>
										<th>Nama Tender</th>
										<div>
											<td>
												<b>
													<?= $paket['nama_paket'] ?>
												</b>
												<!-- <a href="" class="badge badge-secondary">Detil</a> -->
											</td>
										</div>
									</tr>
									<tr>
										<div>
											<th>Tahap Tender</th>
										</div>

										<td>
											<a href="javascipt:;" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_lihat_tahap"><img src="<?= base_url('assets/img/icon-jadwal.png') ?>" width="25px" alt=""> Lihat Tahap Tender Saat Ini</a>
										</td>
									</tr>
									<tr>
										<th>Jumlah Peserta</th>
										<td> <a href="javascript:;" onclick="lihat_vendor_mengikuti(<?= $paket['id_paket'] ?>)" class="btn btn-sm btn-primary"> <b><?= $jumlah_peserta ?> Peserta</b></a></td>
									</tr>
									<tr>
										<th>Dokumen Lelang</th>
										<td>
											<div class="row">
												<div class="col-md-6">
													<div class="card border-primary mb-3">
														<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Dokumen Lelang
														</div>
														<div class="card-body">
															<table class="table table table-striped">
																<?php foreach ($get_pdf_dokumen_kualifikasi_lelang as $key => $value) { ?>
																	<tr>
																		<td>
																			<a target="_blank" href="<?= base_url('file_dokumen_lelang/' . $value['file_dokumen_lelang']) ?>">
																				<?= $value['nama_dokumen_lelang'] ?>
																				<img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4">
																			</a>
																		</td>
																		<td>
																			<!-- <a class="text-danger ml-3" href="<?= base_url('panitiajmtm/beranda/delete_dokumen_kualifikasi_lelang/' . $value['id_dokumen_lelang_pdf']) ?>"><i class="fas fa-trash-alt"></i></a> -->
																		</td>
																		<!-- <td>
																														Di Kirim : <?= $value['create_file_lelang'] ?>
																													</td> -->
																	</tr>
																<?php    } ?>
															</table>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="card border-primary mb-3">
														<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Dokumen Prakualifikasi
														</div>
														<div class="card-body">
															<table class="table table table-striped">
																<?php foreach ($get_pdf_dokumen_kualifikasi as $key => $value) { ?>
																	<tr>
																		<td>
																			<a target="_blank" href="<?= base_url('dokumen_file_dokumen_kualifikasi_pdf/' . $value['file_dokumen_kualifikasi_pdf']) ?>">
																				<?= $value['nama_dokumen_kualifikasi_pdf'] ?>
																				<img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4">
																			</a>
																		</td>
																		<td>
																			<!-- <a class="text-danger" href="<?= base_url('panitiajmtm/daftarpaket/delete_dokumen_kualifikasi/' . $value['id_dokumen_kualifikasi_pdf']) ?>"><i class="fas fa-trash-alt"></i></a> -->
																		</td>
																	</tr>
																<?php    } ?>
															</table>
														</div>
													</div>
												</div>
											</div>
											<?php if (date('Y-m-d H:i', strtotime($evaluasi_dokumen_prakualifiaksi_2_file['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

											<?php    } else if (date('Y-m-d H:i', strtotime($evaluasi_dokumen_prakualifiaksi_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($evaluasi_dokumen_prakualifiaksi_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
												<div class="card border-primary mb-3">
													<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
														Persyaratan Tambahan
													</div>
													<div class="card-body">
														<table class="table">
															<tr>
																<th>Nama Persyaratan</th>
																<th>Keterangan</th>
																<th>File</th>
															</tr>
															<?php foreach ($persyaratan_tambahan as $key => $value) { ?>
																<tr>
																	<td><?= $value['nama_persyaratan'] ?></td>
																	<td><?= $value['keterangan'] ?></td>
																	<td>
																		<?php
																		if ($value['file_persyaratan_tambahan'] == NULL) { ?>
																			<p>Tidak ada File</p>
																		<?php } else { ?>
																			<a href="<?= base_url('file_persyaratan_tambahan/' . $value['file_persyaratan_tambahan']) ?>">
																				<img width="30px" src="<?= base_url('assets/img/file-icon.png') ?>" alt=""></a>
																		<?php } ?>
																	</td>
																</tr>
															<?php } ?>
														</table>
													</div>
												</div>
												<div class="card border-primary mb-3">
													<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
														Penyedia Yang Sudah Mengirim Persyaratan Tambahan
													</div>
													<div class="card-body">
														<table class="table">
															<tr>
																<th style="width:50px">Nama Penyedia</th>
																<th>Aksi</th>
																<th>Status</th>
															</tr>
															<?php foreach ($vendor_mengikuti_paket as $key => $value) { ?>
																<tr>
																	<td><?= $value['username_vendor'] ?></td>
																	<td>
																		<a href="javascript:;" onclick="lihat_dokumen_vendor(<?= $value['id_mengikuti_vendor'] ?>)" class="btn btn-sm btn-info">Lihat Dokumen Persyaratan Tambahan <i class="fa fa-eye"></i><i class="fa fa-eye"></i></a>
																		<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_neraca_keuangan(<?= $value['id_mengikuti_vendor'] ?>)">Neraca Keuangan </a>
																		<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_pengalaman(<?= $value['id_mengikuti_vendor'] ?>)">Pengalaman </a>
																	</td>
																	<td>
																		<?php if ($value['status_evaluasi_syarat_tambahan'] == 0) { ?>
																			<label for="" class="badge badge-danger">Dokumen Belum Lengkap</label>
																		<?php } else if ($value['status_evaluasi_syarat_tambahan'] == 1) { ?>
																			<label for="" class="badge badge-success">Sudah Lengkap</label>
																		<?php } else { ?>
																			<label for="" class="badge badge-warning">Belum Di Periksa</label>
																		<?php } ?>
																	</td>
																</tr>
															<?php } ?>
														</table>
													</div>
												</div>
												<!-- 30 juni 2022 -->
												<?php if ($paket['sts_tenaga_ahli'] == 1 || $paket['sts_peralatan'] == 1) { ?>

													<div class="card border-primary mb-3">
														<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
															Peralatan & Tenaga Ahli Penyedia
														</div>
														<div class="card-body">
															<table class="table">
																<?php foreach ($get_vendor as $key => $value) { ?>
																	<tr>
																		<td><?= $value['username_vendor'] ?></td>
																		<td>
																			<a href="javascript:;" onclick="lihat_peralatan(<?= $value['id_mengikuti_vendor'] ?>, <?= $paket['id_paket'] ?>)" class="btn btn-sm btn-info">Peralatan</a>
																			<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_tenaga_ahli(<?= $value['id_mengikuti_vendor'] ?>)">Tenaga Ahli</a>
																		</td>
																	</tr>
																<?php } ?>
															</table>
														</div>
													</div>
												<?php } else { ?>

												<?php }
												?>
												<!-- end 30 juni 2022 -->
											<?php    } else { ?>
												<div class="card border-primary mb-3">
													<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
														Persyaratan Tambahan
													</div>
													<div class="card-body">
														<table class="table">
															<tr>
																<th>Nama Persyaratan</th>
																<th>Keterangan</th>
																<th>File</th>
															</tr>
															<?php foreach ($persyaratan_tambahan as $key => $value) { ?>
																<tr>
																	<td><?= $value['nama_persyaratan'] ?></td>
																	<td><?= $value['keterangan'] ?></td>
																	<td>
																		<?php
																		if ($value['file_persyaratan_tambahan'] == NULL) { ?>
																			<p>Tidak ada File</p>
																		<?php } else { ?>
																			<a href="<?= base_url('file_persyaratan_tambahan/' . $value['file_persyaratan_tambahan']) ?>">
																				<img width="30px" src="<?= base_url('assets/img/file-icon.png') ?>" alt=""></a>
																		<?php } ?>
																	</td>
																</tr>
															<?php } ?>
														</table>
													</div>
												</div>
												<div class="card border-primary mb-3">
													<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
														Penyedia Yang Sudah Mengirim Persyaratan Tambahan
													</div>
													<div class="card-body">
														<table class="table">
															<tr>
																<th style="width:50px">Nama Penyedia</th>
																<th>Aksi</th>
																<th>Status</th>
															</tr>
															<?php foreach ($vendor_mengikuti_paket as $key => $value) { ?>
																<tr>
																	<td><?= $value['username_vendor'] ?></td>
																	<td>
																		<a href="javascript:;" onclick="lihat_dokumen_vendor(<?= $value['id_mengikuti_vendor'] ?>)" class="btn btn-sm btn-info">Lihat Dokumen Persyaratan Tambahan <i class="fa fa-eye"></i><i class="fa fa-eye"></i></a>
																		<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_neraca_keuangan(<?= $value['id_mengikuti_vendor'] ?>)">Neraca Keuangan </a>
																		<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_pengalaman(<?= $value['id_mengikuti_vendor'] ?>)">Pengalaman </a>
																	</td>
																	<td>
																		<?php if ($value['status_evaluasi_syarat_tambahan'] == 0) { ?>
																			<label for="" class="badge badge-danger">Dokumen Belum Lengkap</label>
																		<?php } else if ($value['status_evaluasi_syarat_tambahan'] == 1) { ?>
																			<label for="" class="badge badge-success">Sudah Lengkap</label>
																		<?php } else { ?>
																			<label for="" class="badge badge-warning">Belum Di Periksa</label>
																		<?php } ?>
																	</td>
																</tr>
															<?php } ?>
														</table>
													</div>
												</div>
												<!-- 30 juni 2022 -->

												<!-- tanda -->
												<?php if (date('Y-m-d H:i', strtotime($get_tahap_id_11_7_17['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

												<?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_id_11_7_17['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_id_11_7_17['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
													<?php if ($paket['sts_tenaga_ahli'] == 1 || $paket['sts_peralatan'] == 1) { ?>
														<div class="card border-primary mb-3">
															<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
																Peralatan & Tenaga Ahli Penyedia
															</div>
															<div class="card-body">
																<table class="table">
																	<tr>
																		<th style="width:50px">Nama Penyedia</th>
																		<th>Aksi</th>
																	</tr>
																	<?php foreach ($get_vendor as $key => $value) { ?>
																		<tr>
																			<td><?= $value['username_vendor'] ?></td>
																			<td>
																				<a href="javascript:;" onclick="lihat_peralatan(<?= $value['id_mengikuti_vendor'] ?>, <?= $paket['id_paket'] ?>)" class="btn btn-sm btn-info">Peralatan</a>
																				<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_tenaga_ahli(<?= $value['id_mengikuti_vendor'] ?>)">Tenaga Ahli</a>
																			</td>
																		</tr>
																	<?php } ?>
																</table>
															</div>
														</div>
													<?php } else { ?>

													<?php } ?>
												<?php    } else { ?>
													<?php if ($paket['sts_tenaga_ahli'] == 1 || $paket['sts_peralatan'] == 1) { ?>
														<div class="card border-primary mb-3">
															<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
																Peralatan & Tenaga Ahli Penyedia
															</div>
															<div class="card-body">
																<table class="table">
																	<tr>
																		<th style="width:50px">Nama Penyedia</th>
																		<th>Aksi</th>
																	</tr>
																	<?php foreach ($get_vendor as $key => $value) { ?>
																		<tr>
																			<td><?= $value['username_vendor'] ?></td>
																			<td>
																				<a href="javascript:;" onclick="lihat_peralatan(<?= $value['id_mengikuti_vendor'] ?>, <?= $paket['id_paket'] ?>)" class="btn btn-sm btn-info">Peralatan</a>
																				<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_tenaga_ahli(<?= $value['id_mengikuti_vendor'] ?>)">Tenaga Ahli</a>
																			</td>
																		</tr>
																	<?php } ?>
																</table>
															</div>
														</div>
													<?php } else { ?>

													<?php } ?>
												<?php    } ?>


											<?php    } ?>
									<tr>
										<?php if (date('Y-m-d H:i', strtotime($get_tahap_pembuktian_kualifikasi['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

										<?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_pembuktian_kualifikasi['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_pembuktian_kualifikasi['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
											<th>Undangan Pembuktian</th>
											<td>
												<a href="javascript:;" style="text-decoration: none; color:white;" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#uploadUndangan"><i style="color: white;" class="fas fa-upload"></i> UPLOAD UNDANGAN PEMBUKTIAN KUALIFIKASI</a>
												<?php if ($paket['dokumen_undangan_pembuktian'] == NULL) { ?>

												<?php } else { ?>
													<a class="btn btn-sm btn-info" href="<?= base_url('file_undangan_pembuktian/' . $paket['dokumen_undangan_pembuktian']) ?>"><i class="fa fa-eye"></i> Lihat Dokumen</a>
												<?php } ?>


											</td>
										<?php    } else { ?>
											<th>Undangan Pembuktian</th>
											<td>
												<a href="javascript:;" style="text-decoration: none; color:white;" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#uploadUndangan"><i style="color: white;" class="fas fa-upload"></i> UPLOAD UNDANGAN PEMBUKTIAN KUALIFIKASI</a>
												<?php if ($paket['dokumen_undangan_pembuktian'] == NULL) { ?>

												<?php } else { ?>
													<a class="btn btn-sm btn-info" href="<?= base_url('file_undangan_pembuktian/' . $paket['dokumen_undangan_pembuktian']) ?>"><i class="fa fa-eye"></i> Lihat Dokumen</a>
												<?php } ?>

											</td>
										<?php } ?>

									</tr>



									<tr>
										<?php if (date('Y-m-d H:i', strtotime($pengumuman_hasil_prakualifikasi['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

										<?php    } else if (date('Y-m-d H:i', strtotime($pengumuman_hasil_prakualifikasi['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($pengumuman_hasil_prakualifikasi['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
											<th>Pengumuman Hasil Prakualifikasi</th>
											<td>
												<a href="javascript:;" style="text-decoration: none; color:white;" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#pengumuman_prakualifikasi"><i style="color: white;" class="fas fa-upload"></i> UPLOAD HASIL EVALUASI PRAKUALIFIKASI</a>
												<?php if ($paket['dokumen_pengumuman_hasil_prakualifikasi'] == NULL) { ?>

												<?php } else { ?>
													<a class="btn btn-sm btn-info" href="<?= base_url('file_pengumuman_prakualifikasi/' . $paket['dokumen_pengumuman_hasil_prakualifikasi']) ?>"><i class="fa fa-eye"></i> Lihat Dokumen</a>
												<?php } ?>
											</td>
										<?php    } else { ?>
											<th>Pengumuman Hasil Prakualifikasi</th>
											<td>
												<a href="javascript:;" style="text-decoration: none; color:white;" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#pengumuman_prakualifikasi"><i style="color: white;" class="fas fa-upload"></i> UPLOAD HASIL EVALUASI PRAKUALIFIKASI</a>
												<?php if ($paket['dokumen_pengumuman_hasil_prakualifikasi'] == NULL) { ?>

												<?php } else { ?>
													<a class="btn btn-sm btn-info" href="<?= base_url('file_pengumuman_prakualifikasi/' . $paket['dokumen_pengumuman_hasil_prakualifikasi']) ?>"><i class="fa fa-eye"></i> Lihat Dokumen</a>
												<?php } ?>
											</td>
										<?php } ?>

									</tr>

									<!-- 8 september -->
									<tr>
										<?php if (date('Y-m-d H:i', strtotime($cek_waktu2['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

										<?php    } else if (date('Y-m-d H:i', strtotime($cek_waktu2['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($cek_waktu2['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
											<th>Undangan Penawaran</th>
											<td>
												<a href="javascript:;" style="text-decoration: none; color:white;" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#undangan_penawaran"><i style="color: white;" class="fas fa-upload"></i> UPLOAD UNDANGAN PENAWARAN</a>
												<?php if ($paket['undangan_penawaran'] == NULL) { ?>

												<?php } else { ?>
													<a class="btn btn-sm btn-info" href="<?= base_url('file_undangan_penawaran/' . $paket['undangan_penawaran']) ?>"><i class="fa fa-eye"></i> Lihat Dokumen</a>
												<?php } ?>
											</td>
										<?php    } else { ?>
											<th>Undangan Penawaran</th>
											<td>
												<a href="javascript:;" style="text-decoration: none; color:white;" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#undangan_penawaran"><i style="color: white;" class="fas fa-upload"></i> UPLOAD UNDANGAN PENAWARAN</a>
												<?php if ($paket['undangan_penawaran'] == NULL) { ?>

												<?php } else { ?>
													<a class="btn btn-sm btn-info" href="<?= base_url('file_undangan_penawaran/' . $paket['undangan_penawaran']) ?>"><i class="fa fa-eye"></i> Lihat Dokumen</a>
												<?php } ?>
											</td>
										<?php } ?>

									</tr>
									<!-- end 8 september -->

									<tr>
										<th class="bgwarning" width="20%">Bobot Teknis<span class="warning">*</span></th>
										<td>
											<div class="row">
												<div class="col-md-2">
													<input type="number" class="form-control" id="bobot_teknis" value="<?= $paket['bobot_teknis'] ?>" name="bobot_teknis" readonly>
													<p class="text-danger" id="bobot_teknis_error"></p>
												</div>
											</div>

										</td>
									</tr>
									<tr>
										<th class="bgwarning" width="20%">Bobot Biaya<span class="warning">*</span></th>
										<td>
											<div class="row">
												<div class="col-md-2">
													<input type="number" class="form-control" id="bobot_biaya" name="bobot_biaya" value="<?= $paket['bobot_biaya'] ?>" readonly>
													<p class="text-danger" id="bobot_biaya_error"></p>
												</div>
											</div>
										</td>
									</tr>
									<?php ?>

									<?php if (date('Y-m-d H:i', strtotime($get_tahap_id_11_7_17['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

									<?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_id_11_7_17['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_id_11_7_17['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
										<tr>
											<div class="row">
												<th>Pembukaan Penawaran</th>
												<td>
													<div class="card">
														<div class="card-header bg-primary text-white">
															<label for="">Pembukaan Dokumen Penawaran</label>
														</div>
														<div class="card-body">
															<?php if (!$cek_vendor_mengikuti_tender) { ?>
																<label for="" class="text-danger">BELUM ADA YANG MENGIKUTI TENDER!</label>
															<?php } else { ?>
																<img src="<?= base_url('assets/img/6100RjKShtL.png') ?>" width="50px" alt=""> <a target="blank_" href="<?= base_url('buka_penawaran') ?>" class="btn btn-info btn-sm" style="color: white;"> Buka Dokumen Penawaran <i class="fa fa-upload"></i></a>

															<?php } ?>
														</div>
													</div>
													<br>
													<input type="text" class="form-control" value="<?= $paket['token'] ?>" disabled>
													<div class="bs-callout bs-callout-info">
														Silahkan Copy Paste Token Untuk Membuka Dokumen Penawaran Peserta
													</div>

												</td>
											</div>
										</tr>
									<?php    } else { ?>
										<tr>
											<div class="row">
												<th>Pembukaan Penawaran</th>
												<td>
													<div class="card">
														<div class="card-header bg-primary text-white">
															<label for="">Pembukaan Dokumen Penawaran</label>
														</div>
														<div class="card-body">
															<?php if (!$cek_vendor_mengikuti_tender) { ?>
																<label for="" class="text-danger">BELUM ADA YANG MENGIKUTI TENDER!</label>
															<?php } else { ?>
																<img src="<?= base_url('assets/img/6100RjKShtL.png') ?>" width="50px" alt=""> <a target="blank_" href="<?= base_url('buka_penawaran') ?>" class="btn btn-info btn-sm" style="color: white;"> Buka Dokumen Penawaran <i class="fa fa-upload"></i></a>

															<?php } ?>
														</div>
													</div>
													<br>
													<input type="text" class="form-control" value="<?= $paket['token'] ?>" disabled>
													<div class="bs-callout bs-callout-info">
														Silahkan Copy Paste Token Untuk Membuka Dokumen Penawaran Peserta
													</div>

												</td>
											</div>
										</tr>
									<?php    } ?>

									<?php ?>
									<tr>
										<th>Berita Acara</th>
										<td>
											<div class="card border-primary mb-3">
												<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
													<div class="row">
														<div class="col-md-10">
															Peringkat Teknis
														</div>
														<div class="col-md-2" style="margin-left:700px;margin-top:-20px;">
															<a href="" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#beritaAcaraPeringkat"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
														</div>
														<div class="col-md-10">
															Peringkat Penawaran Harga
														</div>
														<div class="col-md-2" style="margin-left:700px;margin-top:-20px;">
															<a href="" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#beritaAcaraPeringkat"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
														</div>
														<div class="col-md-10">
															Pengumuman Pemenang
														</div>
														<div class="col-md-2" style="margin-left:700px;margin-top:-20px;">
															<a href="" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#beritaAcaraPeringkat"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
														</div>
														<div class="col-md-10">
															Undangan Presentasi
														</div>
														<div class="col-md-2" style="margin-left:700px;margin-top:-20px;">
															<a href="" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#beritaAcaraPeringkat"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
														</div>
														<div class="col-md-10">
															Addendum Dokumen Pengadaan
														</div>
														<div class="col-md-2" style="margin-left:700px;margin-top:-20px;">
															<a href="" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#beritaAcaraPeringkat"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
														</div>

													</div>
												</div>
												<div class="card-body">
													<?php foreach ($get_berita_acara_peringkat as $key => $value) { ?>
														<a style="text-decoration: none;" href="<?= base_url('berita_acara_tender/' . $value['file_berita_acara_peringkat']) ?>" target="_blank">
															<img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4">
															<?= $value['nama_file'] ?>
														</a>
														<a class="text-danger ml-3" href="<?= base_url('panitiajmtm/beranda/delete_berita_acara_hasil_peringkat/' . $value['id_berita_acara_peringkat']) ?>"><i class="fas fa-trash-alt"></i></a> | Tanggal Upload : <?= $value['create_at'] ?>
														<br>
													<?php } ?>
												</div>
											</div>
											<div class="card border-primary mb-3">
												<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Berita Acara Evaluasi Hasil Penawaran
													<a href="javascript:;" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#beritaAcaraPenawaran"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
												</div>
												<div class="card-body">
													<?php foreach ($get_berita_acara_penawaran as $key => $value) { ?>
														<a style="text-decoration: none;" href="<?= base_url('berita_acara_penawaran/' . $value['file_berita_acara_penawaran']) ?>" target="_blank">
															<img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4">
															<?= $value['nama_file'] ?>
														</a>
														<a class="text-danger ml-3" href="<?= base_url('panitiajmtm/beranda/delete_berita_acara_hasil_penawaran/' . $value['id_berita_acara_penawaran']) ?>"><i class="fas fa-trash-alt"></i></a> | Tanggal Upload : <?= $value['create_at'] ?>
														<br>
													<?php } ?>

												</div>
											</div>

											<div class="card border-primary mb-3">
												<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Berita Acara Evaluasi Hasil Tender
													<a href="" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger " data-toggle="modal" data-target="#beritaAcaraTender"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
												</div>
												<div class="card-body">
													<?php foreach ($get_berita_acara_tender as $key => $value) { ?>
														<a style="text-decoration: none;" href="<?= base_url('berita_acara_tender/' . $value['file_berita_acara_tender']) ?>" target="_blank">
															<img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4">
															<?= $value['nama_file'] ?>
														</a>
														<a class="text-danger ml-3" href="<?= base_url('panitiajmtm/beranda/delete_berita_acara_hasil_tender/' . $value['id_berita_acara_tender']) ?>"><i class="fas fa-trash-alt"></i></a> | Tanggal Upload : <?= $value['create_at'] ?>
														<br>
													<?php } ?>

												</div>
											</div>
											<div class="card border-primary mb-3">
												<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Informasi Lainnya
													<a href="" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#beritaAcaraLainnya"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
												</div>
												<div class="card-body">
													<?php foreach ($get_berita_acara_lainnya as $key => $value) { ?>
														<a style="text-decoration: none;" href="<?= base_url('berita_acara_lainnya/' . $value['file_berita_acara_lainnya']) ?>" target="_blank">
															<img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4">
															<?= $value['nama_file'] ?>
														</a>
														<a class="text-danger ml-3" href="<?= base_url('panitiajmtm/beranda/delete_berita_acara_hasil_lainnya/' . $value['id_berita_acara_lainnya']) ?>"><i class="fas fa-trash-alt"></i></a> | Tanggal Upload : <?= $value['create_at'] ?>
														<br>
													<?php } ?>
												</div>
											</div>
											<div class="bs-callout bs-callout-info">
												Informasi Lainya Dapat Berupa Berita Acara Lain yang di tujukan kepada semua peserta jika terdapat kendala di luar kendali Panitia Pemilihan
											</div>
										</td>
									</tr>

									<tr>
										<th>Pengumuman</th>
										<td><a href="<?= base_url('panitiajmtm/beranda/pengumumanpemenangtender/' . $paket['id_paket']) ?>" style="color: white;height:20px;" class="badge badge-warning">Pengumuman Pemenang</a></td>
									</tr>
									<tr>
									<tr>
										<th>Surat Penunjukan</th>
										<td>
											<a href="javascript:;" style="text-decoration: none; color:white;" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#uploadSuratPenunjukan"><i class="far fa-paper-plane"></i> KIRIM SURAT PENUNJUKAN</a>
											<?php if ($paket['surat_penunjukan'] == NULL) { ?>

											<?php } else { ?>
												<a class="btn btn-sm btn-info" href="<?= base_url('file_surat_penunjukan/' . $paket['surat_penunjukan']) ?>"><i class="fa fa-eye"></i> Lihat Dokumen</a>
											<?php } ?>
										</td>
									</tr>
									<?php if ($this->session->userdata('id_role') == 1) { ?>
										<tr>
											<th>Pakta Integritas</th>
											<td>
												<div class="row">
													<div class="col-md-6">
														<table>
															<thead>
																<tr>
																	<th>Panitia</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<th><a target="_blank" href="<?= base_url('panitiajmtm/beranda/paktaintegritas_panitia/' . $paket['id_paket']) ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Panitia</a></th>
																</tr>
															</tbody>
														</table>
													</div>
													<div class="col-md-6">
														<table>
															<thead>
																<tr>
																	<th>Penyedia</th>
																</tr>
															</thead>
															<tbody>
																<?php foreach ($vendor_mengikuti as $key => $value) { ?>
																	<tr>
																		<th>
																			<a target="_blank" href="<?= base_url('panitiajmtm/beranda/paktaintegritas_vendor/' . $value['id_mengikuti_paket_vendor'] . '/' . $value['id_mengikuti_vendor']) ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> <?= $value['username_vendor'] ?></a>
																		</th>
																	</tr>
																<?php } ?>
															</tbody>
														</table>
													</div>
												</div>
											</td>
										</tr>
									<?php } else { ?>
									<?php } ?>
								</tbody>
							</table>
							<div>
								<a href="<?= base_url('panitiajmtm/beranda/bataltender/' . $paket['id_paket']) ?>" class="btn btn-danger mb-3">Membatalkan Tender Atau Mengulang Tender</a>

								<!-- 20 september 2022 -->
								<a href="javascript:;" data-toggle="modal" data-target="#upload_dokumen_pembatalan" class="btn btn-warning mb-3 text-white">Upload Dokumen Pembatalan</a>


								<?php if ($this->session->userdata('id_role') == 1 || $this->session->userdata('id_role') == 2) { ?>
								<?php } else { ?>
									<a href="<?= base_url('panitiajmtm/beranda/evaluasitender/' . $paket['id_paket']) ?>" class="btn btn-success ml-2 mb-3">Evaluasi Tender</a>

								<?php } ?>
								<!-- <a href="" class="btn btn-success mb-3">Pemasukan Penawaran Ulang</a> -->
								<!-- <a href="" class="btn btn-primary ml-2 mb-3">Forensik Penawaran Peserta</a> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } else if ($paket['id_kualifikasi'] == 13 || $paket['id_kualifikasi'] == 8 || $paket['id_kualifikasi'] == 15) { ?>
	<!-- INI JADWAL PRAKUALIFIKASI SATU FILE -->
	<div id="main" class="container">
		<form action="javascript:;" id="form_tidak_lulus_dokumen_tambahan">
			<input type="hidden" name="id_persyaratan_tambahan_lulus">
			<input type="hidden" name="id_vendor_persyaratan_lulus">
			<input type="hidden" name="id_paket_persyaratan_lulus">
			<textarea hidden name="alasan_tidak_lulus_new"></textarea>
		</form>
		<input type="hidden" id="id_paket" value="<?= $paket['id_paket'] ?>">
		<?php if ($this->session->userdata('id_role') == 1 || $this->session->userdata('id_role') == 2) { ?>

		<?php    } else { ?>
			<div class="float-right p-3">
				<a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi" class="badge badge-danger navbar-badge"></span> Pesan Penjelasan </a>
				<a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca_negosiasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_negosiasi" class="badge badge-danger navbar-badge"></span> Pesan Negosiasi </a>
				<a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_prakualifikasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_prakualifikasi" class="badge badge-danger navbar-badge"></span> Sanggahan Prakualifikasi</a>
				<a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_akhir"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_akhir" class="badge badge-danger navbar-badge"></span> Sanggahan Akhir</a>
			</div>
		<?php    } ?>
		<nav aria-label="breadcrumb" class="mt-3">
			<ol class="breadcrumb bg-primary">
				<li class="breadcrumb-item"><a style="color: white;" href="<?= base_url('panitiajmtm/beranda/informasitender/' . $paket['id_paket']) ?>">Beranda &raquo; Informasi Tender</a></li>
			</ol>
		</nav>
		<?php if ($this->session->userdata('id_role') == 1 || $this->session->userdata('id_role') == 2) { ?>
		<?php    } else { ?>
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a class="nav-link bg-primary text-white" href="<?= base_url('panitiajmtm/beranda/informasitender/' . $paket['id_paket']) ?>">Informasi Tender</a>
				</li>
				<li class=" nav-item">
					<a class="nav-link bg-info text-white active" href="<?= base_url('panitiajmtm/beranda/pertanyaantender/' . $paket['id_paket']) ?>">Pertanyaan</a>
				</li>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/evaluasitender/' . $paket['id_paket']) ?>">Evaluasi</a>
				</li>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggah_prakualifikasi/' . $paket['id_paket']) ?>">Sangahan Prakualifikasi</a>
				</li>
				<?php if (date('Y-m-d H:i', strtotime($get_tahap_prakualfiikasi_satu_file_penetapan['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>
				<?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_prakualfiikasi_satu_file_penetapan['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_prakualfiikasi_satu_file_penetapan['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Negosiasi</a>
					</li>
				<?php    } else { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Negosiasi</a>
					</li>
				<?php    } ?>
				<?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>
				<?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $paket['id_paket']) ?>">Sangahan</a>
					</li>
				<?php    } else { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $paket['id_paket']) ?>">Sangahan</a>
					</li>
				<?php    } ?>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/berita_acara/' . $paket['id_paket']) ?>">Berita Acara</a>
				</li>
			</ul>
		<?php    } ?>
		<div class="tab-content p-2 card">
			<!-- tender -->
			<div class="tab-pane active" id="informasi-tender" role="tabpanel" aria-labelledby="tender-tab">
				<div class="content">
					<?= $this->session->flashdata('berita_acara_penawaran'); ?>
					<?= $this->session->flashdata('berita_acara_tender'); ?>
					<?= $this->session->flashdata('berita_acara_peringkat'); ?>
					<div class="container-fluid">
						<div style="overflow-x:auto">
							<?= $this->session->flashdata('status_tahap_tender'); ?>
							<table class="table table-bordered">
								<tbody>
									<tr>
										<th>Kode Tender</th>
										<td><?= $paket['kode_tender'] ?> <a target="_blank" href="<?= base_url('panitiajmtm/beranda/summary_tender/' . $paket['id_paket']) ?>" class="float-right badge badge-secondary" style="height: 20px;">Summary Tender</a></td>
									</tr>
									<tr>
										<th>Nama Tender</th>
										<div>
											<td>
												<b>
													<?= $paket['nama_paket'] ?>
												</b>
												<!-- <a href="" class="badge badge-secondary">Detil</a> -->
											</td>
										</div>
									</tr>
									<tr>
										<div>
											<th>Tahap Tender</th>
										</div>

										<td>
											<a href="javascipt:;" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_lihat_tahap"><img src="<?= base_url('assets/img/icon-jadwal.png') ?>" width="25px" alt=""> Lihat Tahap Tender Saat Ini</a>
										</td>
									</tr>
									<tr>
										<th>Jumlah Peserta</th>
										<td> <a href="javascript:;" onclick="lihat_vendor_mengikuti(<?= $paket['id_paket'] ?>)" class="btn btn-sm btn-primary"> <b><?= $jumlah_peserta ?> Peserta</b></a></td>
									</tr>
									<tr>
										<th>Dokumen Lelang</th>
										<td>
											<div class="row">
												<?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_pemilihan['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

												<?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_pemilihan['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_pemilihan['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
													<div class="col-md-6">
														<div class="card border-primary mb-3">
															<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Dokumen Lelang
															</div>
															<div class="card-body">
																<table class="table table table-striped">
																	<?php foreach ($get_pdf_dokumen_kualifikasi_lelang as $key => $value) { ?>
																		<tr>
																			<td>
																				<a target="_blank" href="<?= base_url('file_dokumen_lelang/' . $value['file_dokumen_lelang']) ?>">
																					<?= $value['nama_dokumen_lelang'] ?>
																					<img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4">
																				</a>
																			</td>
																			<td>
																				<!-- <a class="text-danger ml-3" href="<?= base_url('panitiajmtm/beranda/delete_dokumen_kualifikasi_lelang/' . $value['id_dokumen_lelang_pdf']) ?>"><i class="fas fa-trash-alt"></i></a> -->
																			</td>
																			<!-- <td>
																																				Di Kirim : <?= $value['create_file_lelang'] ?>
																																			</td> -->
																		</tr>
																	<?php    } ?>
																</table>
															</div>
														</div>
													</div>
												<?php    } else { ?>
													<div class="col-md-6">
														<div class="card border-primary mb-3">
															<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Dokumen Lelang
															</div>
															<div class="card-body">
																<table class="table table table-striped">
																	<?php foreach ($get_pdf_dokumen_kualifikasi_lelang as $key => $value) { ?>
																		<tr>
																			<td>
																				<a target="_blank" href="<?= base_url('file_dokumen_lelang/' . $value['file_dokumen_lelang']) ?>">
																					<?= $value['nama_dokumen_lelang'] ?>
																					<img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4">
																				</a>
																			</td>
																			<td>
																				<!-- <a class="text-danger ml-3" href="<?= base_url('panitiajmtm/beranda/delete_dokumen_kualifikasi_lelang/' . $value['id_dokumen_lelang_pdf']) ?>"><i class="fas fa-trash-alt"></i></a> -->
																			</td>
																			<!-- <td>
																																				Di Kirim : <?= $value['create_file_lelang'] ?>
																																			</td> -->
																		</tr>
																	<?php    } ?>
																</table>
															</div>
														</div>
													</div>
												<?php    } ?>
												<?php if ($paket['id_kualifikasi'] == 15 || $paket['id_kualifikasi'] == 13 ||  $paket['id_kualifikasi'] == 11 ||  $paket['id_kualifikasi'] == 10 ||  $paket['id_kualifikasi'] == 8 ||  $paket['id_kualifikasi'] == 7 ||  $paket['id_kualifikasi'] == 6 ||  $paket['id_kualifikasi'] == 5 ||  $paket['id_kualifikasi'] == 24) { ?>
													<div class="col-md-6">
														<div class="card border-primary mb-3">
															<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Dokumen Prakualifikasi
															</div>
															<div class="card-body">
																<table class="table table table-striped">
																	<?php foreach ($get_pdf_dokumen_kualifikasi as $key => $value) { ?>
																		<tr>
																			<td>
																				<a target="_blank" href="<?= base_url('dokumen_file_dokumen_kualifikasi_pdf/' . $value['file_dokumen_kualifikasi_pdf']) ?>">
																					<?= $value['nama_dokumen_kualifikasi_pdf'] ?>
																					<img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4">
																				</a>
																			</td>
																			<td>
																				<!-- <a class="text-danger" href="<?= base_url('panitiajmtm/daftarpaket/delete_dokumen_kualifikasi/' . $value['id_dokumen_kualifikasi_pdf']) ?>"><i class="fas fa-trash-alt"></i></a> -->
																			</td>
																		</tr>
																	<?php    } ?>
																</table>
															</div>
														</div>
													</div>
												<?php } ?>
											</div>

											<?php if (date('Y-m-d H:i', strtotime($evaluasi_dokumen_prakualifiaksi_2_file['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

											<?php    } else if (date('Y-m-d H:i', strtotime($evaluasi_dokumen_prakualifiaksi_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($evaluasi_dokumen_prakualifiaksi_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
												<div class="card border-primary mb-3">
													<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
														Persyaratan Tambahan
													</div>
													<div class="card-body">
														<table class="table">
															<tr>
																<th>Nama Persyaratan</th>
																<th>Keterangan</th>
																<th>File</th>
															</tr>
															<?php foreach ($persyaratan_tambahan as $key => $value) { ?>
																<tr>
																	<td><?= $value['nama_persyaratan'] ?></td>
																	<td><?= $value['keterangan'] ?></td>
																	<td>
																		<?php
																		if ($value['file_persyaratan_tambahan'] == NULL) { ?>
																			<p>Tidak ada File</p>
																		<?php } else { ?>
																			<a href="<?= base_url('file_persyaratan_tambahan/' . $value['file_persyaratan_tambahan']) ?>">
																				<img width="30px" src="<?= base_url('assets/img/file-icon.png') ?>" alt=""></a>
																		<?php } ?>
																	</td>
																</tr>
															<?php } ?>
														</table>
													</div>
												</div>
												<div class="card border-primary mb-3">
													<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
														Penyedia Yang Sudah Mengirim Persyaratan Tambahan
													</div>
													<div class="card-body">
														<table class="table">
															<tr>
																<th style="width:50px">Nama Penyedia</th>
																<th>Aksi</th>
																<th>Status</th>
															</tr>
															<?php foreach ($vendor_mengikuti_paket as $key => $value) { ?>
																<tr>
																	<td><?= $value['username_vendor'] ?></td>
																	<td>
																		<a href="javascript:;" onclick="lihat_dokumen_vendor(<?= $value['id_mengikuti_vendor'] ?>)" class="btn btn-sm btn-info">Lihat Dokumen Persyaratan Tambahan <i class="fa fa-eye"></i><i class="fa fa-eye"></i></a>
																		<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_neraca_keuangan(<?= $value['id_mengikuti_vendor'] ?>)">Neraca Keuangan </a>
																		<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_pengalaman(<?= $value['id_mengikuti_vendor'] ?>)">Pengalaman </a>
																	</td>
																	<td>
																		<?php if ($value['status_evaluasi_syarat_tambahan'] == 0) { ?>
																			<label for="" class="badge badge-danger">Dokumen Belum Lengkap</label>
																		<?php } else if ($value['status_evaluasi_syarat_tambahan'] == 1) { ?>
																			<label for="" class="badge badge-success">Sudah Lengkap</label>
																		<?php } else { ?>
																			<label for="" class="badge badge-warning">Belum Di Periksa</label>
																		<?php } ?>
																	</td>
																</tr>
															<?php } ?>
														</table>
													</div>
												</div>
												<!-- 30 juni 2022 -->
												<?php if ($paket['sts_tenaga_ahli'] == 1 || $paket['sts_peralatan'] == 1) { ?>

													<div class="card border-primary mb-3">
														<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
															Peralatan & Tenaga Ahli Penyedia
														</div>
														<div class="card-body">
															<table class="table">
																<?php foreach ($get_vendor as $key => $value) { ?>
																	<tr>
																		<td><?= $value['username_vendor'] ?></td>
																		<td>
																			<a href="javascript:;" onclick="lihat_peralatan(<?= $value['id_mengikuti_vendor'] ?>, <?= $paket['id_paket'] ?>)" class="btn btn-sm btn-info">Peralatan</a>
																			<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_tenaga_ahli(<?= $value['id_mengikuti_vendor'] ?>)">Tenaga Ahli</a>
																		</td>
																	</tr>
																<?php } ?>
															</table>
														</div>
													</div>
												<?php } else { ?>

												<?php }
												?>
												<!-- end 30 juni 2022 -->
											<?php    } else { ?>
												<div class="card border-primary mb-3">
													<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
														Persyaratan Tambahan
													</div>
													<div class="card-body">
														<table class="table">
															<tr>
																<th>Nama Persyaratan</th>
																<th>Keterangan</th>
																<th>File</th>
															</tr>
															<?php foreach ($persyaratan_tambahan as $key => $value) { ?>
																<tr>
																	<td><?= $value['nama_persyaratan'] ?></td>
																	<td><?= $value['keterangan'] ?></td>
																	<td>
																		<?php
																		if ($value['file_persyaratan_tambahan'] == NULL) { ?>
																			<p>Tidak ada File</p>
																		<?php } else { ?>
																			<a href="<?= base_url('file_persyaratan_tambahan/' . $value['file_persyaratan_tambahan']) ?>">
																				<img width="30px" src="<?= base_url('assets/img/file-icon.png') ?>" alt=""></a>
																		<?php } ?>
																	</td>
																</tr>
															<?php } ?>
														</table>
													</div>
												</div>
												<div class="card border-primary mb-3">
													<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
														Penyedia Yang Sudah Mengirim Persyaratan Tambahan
													</div>
													<div class="card-body">
														<table class="table">
															<tr>
																<th style="width:50px">Nama Penyedia</th>
																<th>Aksi</th>
																<th>Status</th>
															</tr>
															<?php foreach ($vendor_mengikuti_paket as $key => $value) { ?>
																<tr>
																	<td><?= $value['username_vendor'] ?></td>
																	<td>
																		<a href="javascript:;" onclick="lihat_dokumen_vendor(<?= $value['id_mengikuti_vendor'] ?>)" class="btn btn-sm btn-info">Lihat Dokumen Persyaratan Tambahan <i class="fa fa-eye"></i><i class="fa fa-eye"></i></a>
																		<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_neraca_keuangan(<?= $value['id_mengikuti_vendor'] ?>)">Neraca Keuangan </a>
																		<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_pengalaman(<?= $value['id_mengikuti_vendor'] ?>)">Pengalaman </a>
																	</td>
																	<td>
																		<?php if ($value['status_evaluasi_syarat_tambahan'] == 0) { ?>
																			<label for="" class="badge badge-danger">Dokumen Belum Lengkap</label>
																		<?php } else if ($value['status_evaluasi_syarat_tambahan'] == 1) { ?>
																			<label for="" class="badge badge-success">Sudah Lengkap</label>
																		<?php } else { ?>
																			<label for="" class="badge badge-warning">Belum Di Periksa</label>
																		<?php } ?>
																	</td>
																</tr>
															<?php } ?>
														</table>
													</div>
												</div>
												<!-- 30 juni 2022 -->

												<!-- tanda -->
												<?php if (date('Y-m-d H:i', strtotime($get_tahap['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

												<?php    } else if (date('Y-m-d H:i', strtotime($get_tahap['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
													<?php if ($paket['sts_tenaga_ahli'] == 1 || $paket['sts_peralatan'] == 1) { ?>

														<div class="card border-primary mb-3">
															<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
																Peralatan & Tenaga Ahli Penyedia
															</div>
															<div class="card-body">
																<table class="table">
																	<?php foreach ($get_vendor as $key => $value) { ?>
																		<tr>
																			<td><?= $value['username_vendor'] ?></td>
																			<td>
																				<a href="javascript:;" onclick="lihat_peralatan(<?= $value['id_mengikuti_vendor'] ?>, <?= $paket['id_paket'] ?>)" class="btn btn-sm btn-info">Peralatan</a>
																				<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_tenaga_ahli(<?= $value['id_mengikuti_vendor'] ?>)">Tenaga Ahli</a>
																			</td>
																		</tr>
																	<?php } ?>
																</table>
															</div>
														</div>
													<?php } else { ?>
														<?php if ($paket['sts_tenaga_ahli'] == 1 || $paket['sts_peralatan'] == 1) { ?>

															<div class="card border-primary mb-3">
																<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
																	Peralatan & Tenaga Ahli Penyedia
																</div>
																<div class="card-body">
																	<table class="table">
																		<?php foreach ($get_vendor as $key => $value) { ?>
																			<tr>
																				<td><?= $value['username_vendor'] ?></td>
																				<td>
																					<a href="javascript:;" onclick="lihat_peralatan(<?= $value['id_mengikuti_vendor'] ?>, <?= $paket['id_paket'] ?>)" class="btn btn-sm btn-info">Peralatan</a>
																					<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_tenaga_ahli(<?= $value['id_mengikuti_vendor'] ?>)">Tenaga Ahli</a>
																				</td>
																			</tr>
																		<?php } ?>
																	</table>
																</div>
															</div>
														<?php } else { ?>

														<?php } ?>
													<?php } ?>
												<?php    } else { ?>

												<?php    } ?>

											<?php    } ?>

									<tr>
										<?php if (date('Y-m-d H:i', strtotime($get_tahap_pembuktian_kualifikasi['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

										<?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_pembuktian_kualifikasi['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_pembuktian_kualifikasi['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
											<th>Undangan Pembuktian</th>
											<td>
												<a href="javascript:;" style="text-decoration: none; color:white;" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#uploadUndangan"><i style="color: white;" class="fas fa-upload"></i> UPLOAD UNDANGAN PEMBUKTIAN KUALIFIKASI</a>
												<?php if ($paket['dokumen_undangan_pembuktian'] == NULL) { ?>

												<?php } else { ?>
													<a class="btn btn-sm btn-info" href="<?= base_url('file_undangan_pembuktian/' . $paket['dokumen_undangan_pembuktian']) ?>"><i class="fa fa-eye"></i> Lihat Dokumen</a>
												<?php } ?>


											</td>
										<?php    } else { ?>
											<th>Undangan Pembuktian</th>
											<td>
												<a href="javascript:;" style="text-decoration: none; color:white;" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#uploadUndangan"><i style="color: white;" class="fas fa-upload"></i> UPLOAD UNDANGAN PEMBUKTIAN KUALIFIKASI</a>
												<?php if ($paket['dokumen_undangan_pembuktian'] == NULL) { ?>

												<?php } else { ?>
													<a class="btn btn-sm btn-info" href="<?= base_url('file_undangan_pembuktian/' . $paket['dokumen_undangan_pembuktian']) ?>"><i class="fa fa-eye"></i> Lihat Dokumen</a>
												<?php } ?>

											</td>
										<?php } ?>

									</tr>

									<tr>
										<?php if (date('Y-m-d H:i', strtotime($pengumuman_hasil_prakualifikasi['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

										<?php    } else if (date('Y-m-d H:i', strtotime($pengumuman_hasil_prakualifikasi['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d', strtotime($pengumuman_hasil_prakualifikasi['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
											<th>Pengumuman Hasil Prakualifikasi</th>
											<td>
												<a href="javascript:;" style="text-decoration: none; color:white;" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#pengumuman_prakualifikasi"><i style="color: white;" class="fas fa-upload"></i> UPLOAD HASIL EVALUASI PRAKUALIFIKASI</a>
												<?php if ($paket['dokumen_pengumuman_hasil_prakualifikasi'] == NULL) { ?>

												<?php } else { ?>
													<a class="btn btn-sm btn-info" href="<?= base_url('file_pengumuman_prakualifikasi/' . $paket['dokumen_pengumuman_hasil_prakualifikasi']) ?>"><i class="fa fa-eye"></i> Lihat Dokumen</a>
												<?php } ?>
											</td>
										<?php    } else { ?>
											<th>Pengumuman Hasil Prakualifikasi</th>
											<td>
												<a href="javascript:;" style="text-decoration: none; color:white;" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#pengumuman_prakualifikasi"><i style="color: white;" class="fas fa-upload"></i> UPLOAD HASIL EVALUASI PRAKUALIFIKASI</a>
												<?php if ($paket['dokumen_pengumuman_hasil_prakualifikasi'] == NULL) { ?>

												<?php } else { ?>
													<a class="btn btn-sm btn-info" href="<?= base_url('file_pengumuman_prakualifikasi/' . $paket['dokumen_pengumuman_hasil_prakualifikasi']) ?>"><i class="fa fa-eye"></i> Lihat Dokumen</a>
												<?php } ?>
											</td>
										<?php } ?>

									</tr>

									<!-- 8 september -->
									<tr>
										<?php if (date('Y-m-d H:i', strtotime($cek_waktu2['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

										<?php    } else if (date('Y-m-d H:i', strtotime($cek_waktu2['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($cek_waktu2['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
											<th>Undangan Penawaran</th>
											<td>
												<a href="javascript:;" style="text-decoration: none; color:white;" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#undangan_penawaran"><i style="color: white;" class="fas fa-upload"></i> UPLOAD UNDANGAN PENAWARAN</a>
												<?php if ($paket['undangan_penawaran'] == NULL) { ?>

												<?php } else { ?>
													<a class="btn btn-sm btn-info" href="<?= base_url('file_undangan_penawaran/' . $paket['undangan_penawaran']) ?>"><i class="fa fa-eye"></i> Lihat Dokumen</a>
												<?php } ?>
											</td>
										<?php    } else { ?>
											<th>Undangan Penawaran</th>
											<td>
												<a href="javascript:;" style="text-decoration: none; color:white;" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#undangan_penawaran"><i style="color: white;" class="fas fa-upload"></i> UPLOAD UNDANGAN PENAWARAN</a>
												<?php if ($paket['undangan_penawaran'] == NULL) { ?>

												<?php } else { ?>
													<a class="btn btn-sm btn-info" href="<?= base_url('file_undangan_penawaran/' . $paket['undangan_penawaran']) ?>"><i class="fa fa-eye"></i> Lihat Dokumen</a>
												<?php } ?>
											</td>
										<?php } ?>

									</tr>
									<!-- end 8 september -->


									<tr>
										<th class="bgwarning" width="20%">Bobot Teknis<span class="warning">*</span></th>
										<td>
											<div class="row">
												<div class="col-md-2">
													<input type="number" class="form-control" id="bobot_teknis" value="<?= $paket['bobot_teknis'] ?>" name="bobot_teknis" readonly>
													<p class="text-danger" id="bobot_teknis_error"></p>
												</div>
											</div>

										</td>
									</tr>
									<tr>
										<th class="bgwarning" width="20%">Bobot Biaya<span class="warning">*</span></th>
										<td>
											<div class="row">
												<div class="col-md-2">
													<input type="number" class="form-control" id="bobot_biaya" name="bobot_biaya" value="<?= $paket['bobot_biaya'] ?>" readonly>
													<p class="text-danger" id="bobot_biaya_error"></p>
												</div>
											</div>
										</td>
									</tr>
									<?php ?>

									<?php if (date('Y-m-d H:i', strtotime($get_tahap['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

									<?php    } else if (date('Y-m-d H:i', strtotime($get_tahap['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
										<tr>
											<div class="row">
												<th>Pembukaan Penawaran</th>
												<td>
													<div class="card">
														<div class="card-header bg-primary text-white">
															<label for="">Pembukaan Dokumen Penawaran</label>
														</div>
														<div class="card-body">
															<?php if (!$cek_vendor_mengikuti_tender) { ?>
																<label for="" class="text-danger">BELUM ADA YANG MENGIKUTI TENDER!</label>
															<?php } else { ?>
																<img src="<?= base_url('assets/img/6100RjKShtL.png') ?>" width="50px" alt=""> <a target="blank_" href="<?= base_url('buka_penawaran') ?>" class="btn btn-info btn-sm" style="color: white;"> Buka Dokumen Penawaran <i class="fa fa-upload"></i></a>

															<?php } ?>
														</div>
													</div>
													<br>
													<input type="text" class="form-control" value="<?= $paket['token'] ?>" disabled>
													<div class="bs-callout bs-callout-info">
														Silahkan Copy Paste Token Untuk Membuka Dokumen Penawaran Peserta
													</div>

												</td>
											</div>
										</tr>
									<?php    } else { ?>
										<tr>
											<div class="row">
												<th>Pembukaan Penawaran</th>
												<td>
													<div class="card">
														<div class="card-header bg-primary text-white">
															<label for="">Pembukaan Dokumen Penawaran</label>
														</div>
														<div class="card-body">
															<?php if (!$cek_vendor_mengikuti_tender) { ?>
																<label for="" class="text-danger">BELUM ADA YANG MENGIKUTI TENDER!</label>
															<?php } else { ?>
																<img src="<?= base_url('assets/img/6100RjKShtL.png') ?>" width="50px" alt=""> <a target="blank_" href="<?= base_url('buka_penawaran') ?>" class="btn btn-info btn-sm" style="color: white;"> Buka Dokumen Penawaran <i class="fa fa-upload"></i></a>

															<?php } ?>
														</div>
													</div>
													<br>
													<input type="text" class="form-control" value="<?= $paket['token'] ?>" disabled>
													<div class="bs-callout bs-callout-info">
														Silahkan Copy Paste Token Untuk Membuka Dokumen Penawaran Peserta
													</div>

												</td>
											</div>
										</tr>
									<?php    } ?>

									<?php ?>
									<tr>
										<th>Berita Acara</th>
										<td>
											<div class="card border-primary mb-3">
												<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
													<div class="row">
														<div class="col-md-10">
															Peringkat Teknis
														</div>
														<div class="col-md-2" style="margin-left:700px;margin-top:-20px;">
															<a href="" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#beritaAcaraPeringkat"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
														</div>
														<div class="col-md-10">
															Peringkat Penawaran Harga
														</div>
														<div class="col-md-2" style="margin-left:700px;margin-top:-20px;">
															<a href="" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#beritaAcaraPeringkat"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
														</div>
														<div class="col-md-10">
															Pengumuman Pemenang
														</div>
														<div class="col-md-2" style="margin-left:700px;margin-top:-20px;">
															<a href="" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#beritaAcaraPeringkat"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
														</div>
														<div class="col-md-10">
															Undangan Presentasi
														</div>
														<div class="col-md-2" style="margin-left:700px;margin-top:-20px;">
															<a href="" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#beritaAcaraPeringkat"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
														</div>
														<div class="col-md-10">
															Addendum Dokumen Pengadaan
														</div>
														<div class="col-md-2" style="margin-left:700px;margin-top:-20px;">
															<a href="" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#beritaAcaraPeringkat"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
														</div>
													</div>

												</div>
												<div class="card-body">
													<?php foreach ($get_berita_acara_peringkat as $key => $value) { ?>
														<a style="text-decoration: none;" href="<?= base_url('berita_acara_tender/' . $value['file_berita_acara_peringkat']) ?>" target="_blank">
															<img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4">
															<?= $value['nama_file'] ?>
														</a>
														<a class="text-danger ml-3" href="<?= base_url('panitiajmtm/beranda/delete_berita_acara_hasil_peringkat/' . $value['id_berita_acara_peringkat']) ?>"><i class="fas fa-trash-alt"></i></a> | Tanggal Upload : <?= $value['create_at'] ?>
														<br>
													<?php } ?>
												</div>
											</div>
											<div class="card border-primary mb-3">
												<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Berita Acara Evaluasi Hasil Penawaran
													<a href="javascript:;" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#beritaAcaraPenawaran"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
												</div>
												<div class="card-body">
													<?php foreach ($get_berita_acara_penawaran as $key => $value) { ?>
														<a style="text-decoration: none;" href="<?= base_url('berita_acara_penawaran/' . $value['file_berita_acara_penawaran']) ?>" target="_blank">
															<img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4">
															<?= $value['nama_file'] ?>
														</a>
														<a class="text-danger ml-3" href="<?= base_url('panitiajmtm/beranda/delete_berita_acara_hasil_penawaran/' . $value['id_berita_acara_penawaran']) ?>"><i class="fas fa-trash-alt"></i></a> | Tanggal Upload : <?= $value['create_at'] ?>
														<br>
													<?php } ?>

												</div>
											</div>

											<div class="card border-primary mb-3">
												<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Berita Acara Evaluasi Hasil Tender
													<a href="" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger " data-toggle="modal" data-target="#beritaAcaraTender"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
												</div>
												<div class="card-body">
													<?php foreach ($get_berita_acara_tender as $key => $value) { ?>
														<a style="text-decoration: none;" href="<?= base_url('berita_acara_tender/' . $value['file_berita_acara_tender']) ?>" target="_blank">
															<img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4">
															<?= $value['nama_file'] ?>
														</a>
														<a class="text-danger ml-3" href="<?= base_url('panitiajmtm/beranda/delete_berita_acara_hasil_tender/' . $value['id_berita_acara_tender']) ?>"><i class="fas fa-trash-alt"></i></a> | Tanggal Upload : <?= $value['create_at'] ?>
														<br>
													<?php } ?>

												</div>
											</div>

											<div class="card border-primary mb-3">
												<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Informasi Lainnya
													<a href="" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#beritaAcaraLainnya"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
												</div>
												<div class="card-body">
													<?php foreach ($get_berita_acara_lainnya as $key => $value) { ?>
														<a style="text-decoration: none;" href="<?= base_url('berita_acara_lainnya/' . $value['file_berita_acara_lainnya']) ?>" target="_blank">
															<img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4">
															<?= $value['nama_file'] ?>
														</a>
														<a class="text-danger ml-3" href="<?= base_url('panitiajmtm/beranda/delete_berita_acara_hasil_lainnya/' . $value['id_berita_acara_lainnya']) ?>"><i class="fas fa-trash-alt"></i></a> | Tanggal Upload : <?= $value['create_at'] ?>
														<br>
													<?php } ?>
												</div>
											</div>
											<div class="bs-callout bs-callout-info">
												Informasi Lainya Dapat Berupa Berita Acara Lain yang di tujukan kepada semua peserta jika terdapat kendala di luar kendali Panitia Pemilihan
											</div>
										</td>
									</tr>

									<tr>
										<th>Pengumuman</th>
										<td><a href="<?= base_url('panitiajmtm/beranda/pengumumanpemenangtender/' . $paket['id_paket']) ?>" style="color: white;height:20px;" class="badge badge-warning">Pengumuman Pemenang</a></td>
									</tr>
									<tr>
									<tr>
										<th>Surat Penunjukan</th>
										<td>
											<a href="javascript:;" style="text-decoration: none; color:white;" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#uploadSuratPenunjukan"><i class="far fa-paper-plane"></i> KIRIM SURAT PENUNJUKAN</a>
											<?php if ($paket['surat_penunjukan'] == NULL) { ?>

											<?php } else { ?>
												<a class="btn btn-sm btn-info" href="<?= base_url('file_surat_penunjukan/' . $paket['surat_penunjukan']) ?>"><i class="fa fa-eye"></i> Lihat Dokumen</a>
											<?php } ?>

										</td>
									</tr>
									<?php if ($this->session->userdata('id_role') == 1) { ?>
										<tr>
											<th>Pakta Integritas</th>
											<td>
												<div class="row">
													<div class="col-md-6">
														<table>
															<thead>
																<tr>
																	<th>Panitia</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<th><a target="_blank" href="<?= base_url('panitiajmtm/beranda/paktaintegritas_panitia/' . $paket['id_paket']) ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Panitia</a></th>
																</tr>
															</tbody>
														</table>
													</div>
													<div class="col-md-6">
														<table>
															<thead>
																<tr>
																	<th>Penyedia</th>
																</tr>
															</thead>
															<tbody>
																<?php foreach ($vendor_mengikuti as $key => $value) { ?>
																	<tr>
																		<th>
																			<a target="_blank" href="<?= base_url('panitiajmtm/beranda/paktaintegritas_vendor/' . $value['id_mengikuti_paket_vendor'] . '/' . $value['id_mengikuti_vendor']) ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> <?= $value['username_vendor'] ?></a>
																		</th>
																	</tr>
																<?php } ?>
															</tbody>
														</table>
													</div>
												</div>
											</td>
										</tr>
									<?php } else { ?>
									<?php } ?>
								</tbody>
							</table>
							<div>
								<a href="<?= base_url('panitiajmtm/beranda/bataltender/' . $paket['id_paket']) ?>" class="btn btn-danger mb-3">Membatalkan Tender Atau Mengulang Tender</a>

								<!-- 20 september 2022 -->
								<a href="javascript:;" data-toggle="modal" data-target="#upload_dokumen_pembatalan" class="btn btn-warning mb-3 text-white">Upload Dokumen Pembatalan</a>

								<?php if ($this->session->userdata('id_role') == 1 || $this->session->userdata('id_role') == 2) { ?>
								<?php } else { ?>
									<a href="<?= base_url('panitiajmtm/beranda/evaluasitender/' . $paket['id_paket']) ?>" class="btn btn-success ml-2 mb-3">Evaluasi Tender</a>

								<?php } ?>
								<!-- <a href="" class="btn btn-success mb-3">Pemasukan Penawaran Ulang</a> -->
								<!-- <a href="" class="btn btn-primary ml-2 mb-3">Forensik Penawaran Peserta</a> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } else if ($paket['id_kualifikasi'] == 12 || $paket['id_kualifikasi'] == 9 || $paket['id_kualifikasi'] == 14 || $paket['id_kualifikasi'] == 18 || $paket['id_kualifikasi'] == 20 || $paket['id_kualifikasi'] == 21 || $paket['id_kualifikasi'] == 23) { ?>
	<!-- INI JADWAL PASCAKUALIFIKASI -->
	<div id="main" class="container">
		<form action="javascript:;" id="form_tidak_lulus_dokumen_tambahan">
			<input type="hidden" name="id_persyaratan_tambahan_lulus">
			<input type="hidden" name="id_vendor_persyaratan_lulus">
			<input type="hidden" name="id_paket_persyaratan_lulus">
			<textarea hidden name="alasan_tidak_lulus_new"></textarea>
		</form>
		<input type="hidden" id="id_paket" value="<?= $paket['id_paket'] ?>">
		<?php if ($this->session->userdata('id_role') == 1 || $this->session->userdata('id_role') == 2) { ?>

		<?php    } else { ?>
			<div class="float-right p-3">
				<a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi" class="badge badge-danger navbar-badge"></span> Pesan Penjelasan </a>
				<a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca_negosiasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_negosiasi" class="badge badge-danger navbar-badge"></span> Pesan Negosiasi </a>
				<a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_akhir"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_akhir" class="badge badge-danger navbar-badge"></span> Sanggahan Akhir</a>
			</div>
		<?php    } ?>
		<nav aria-label="breadcrumb" class="mt-3">
			<ol class="breadcrumb bg-primary">
				<li class="breadcrumb-item"><a style="color: white;" href="<?= base_url('panitiajmtm/beranda/informasitender/' . $paket['id_paket']) ?>">Beranda &raquo; Informasi Tender</a></li>
			</ol>
		</nav>
		<?php if ($this->session->userdata('id_role') == 1 || $this->session->userdata('id_role') == 2) { ?>
		<?php    } else { ?>
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a class="nav-link bg-primary text-white" href="<?= base_url('panitiajmtm/beranda/informasitender/' . $paket['id_paket']) ?>">Informasi Tender</a>
				</li>
				<li class=" nav-item">
					<a class="nav-link bg-info text-white active" href="<?= base_url('panitiajmtm/beranda/pertanyaantender/' . $paket['id_paket']) ?>">Pertanyaan</a>
				</li>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/evaluasitender/' . $paket['id_paket']) ?>">Evaluasi</a>
				</li>
				<!-- <li class="nav-item">
																<a class="nav-link active " href="<?= base_url('panitiajmtm/beranda/reverseauctiontender/' . $paket['id_paket']) ?>">Reverse Auction</a>
															</li> -->
				<?php if ($paket['id_kualifikasi'] == 16 || $paket['id_kualifikasi'] == 15 || $paket['id_kualifikasi'] == 12 || $paket['id_kualifikasi'] == 14 || $paket['id_kualifikasi'] == 18 || $paket['id_kualifikasi'] == 20 || $paket['id_kualifikasi'] == 21) { ?>
				<?php } else { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggah_prakualifikasi/' . $paket['id_paket']) ?>">Sangahan Prakualifikasi</a>
					</li>
				<?php } ?>
				<?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>
				<?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Negosiasi</a>
					</li>
				<?php    } else { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Negosiasi</a>
					</li>
				<?php    } ?>
				<?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>
				<?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $paket['id_paket']) ?>">Sangahan</a>
					</li>
				<?php    } else { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $paket['id_paket']) ?>">Sangahan</a>
					</li>
				<?php    } ?>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/berita_acara/' . $paket['id_paket']) ?>">Berita Acara</a>
				</li>
			</ul>
		<?php    } ?>
		<div class="tab-content p-2 card">
			<!-- tender -->
			<div class="tab-pane active" id="informasi-tender" role="tabpanel" aria-labelledby="tender-tab">
				<div class="content">
					<?= $this->session->flashdata('berita_acara_penawaran'); ?>
					<?= $this->session->flashdata('berita_acara_tender'); ?>
					<?= $this->session->flashdata('berita_acara_peringkat'); ?>
					<div class="container-fluid">
						<div style="overflow-x:auto">
							<?= $this->session->flashdata('status_tahap_tender'); ?>
							<table class="table table-bordered">
								<tbody>
									<tr>
										<th>Kode Tender</th>
										<td><?= $paket['kode_tender'] ?> <a target="_blank" href="<?= base_url('panitiajmtm/beranda/summary_tender/' . $paket['id_paket']) ?>" class="float-right badge badge-secondary" style="height: 20px;">Summary Tender</a></td>
									</tr>
									<tr>
										<th>Nama Tender</th>
										<div>
											<td>
												<b>
													<?= $paket['nama_paket'] ?>
												</b>
												<!-- <a href="" class="badge badge-secondary">Detil</a> -->
											</td>
										</div>
									</tr>
									<tr>
										<div>
											<th>Tahap Tender</th>
										</div>

										<td>
											<a href="javascipt:;" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_lihat_tahap"><img src="<?= base_url('assets/img/icon-jadwal.png') ?>" width="25px" alt=""> Lihat Tahap Tender Saat Ini</a>
										</td>
									</tr>
									<tr>
										<th>Jumlah Peserta</th>
										<td> <a href="javascript:;" onclick="lihat_vendor_mengikuti(<?= $paket['id_paket'] ?>)" class="btn btn-sm btn-primary"> <b><?= $jumlah_peserta ?> Peserta</b></a></td>
									</tr>
									<tr>
										<th>Dokumen Lelang</th>
										<td>
											<div class="row">
												<?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_pemilihan['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

												<?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_pemilihan['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_pemilihan['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
													<div class="col-md-6">
														<div class="card border-primary mb-3">
															<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Dokumen Lelang
															</div>
															<div class="card-body">
																<table class="table table table-striped">
																	<?php foreach ($get_pdf_dokumen_kualifikasi_lelang as $key => $value) { ?>
																		<tr>
																			<td>
																				<a target="_blank" href="<?= base_url('file_dokumen_lelang/' . $value['file_dokumen_lelang']) ?>">
																					<?= $value['nama_dokumen_lelang'] ?>
																					<img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4">
																				</a>
																			</td>
																			<td>
																				<!-- <a class="text-danger ml-3" href="<?= base_url('panitiajmtm/beranda/delete_dokumen_kualifikasi_lelang/' . $value['id_dokumen_lelang_pdf']) ?>"><i class="fas fa-trash-alt"></i></a> -->
																			</td>
																			<!-- <td>
																																				Di Kirim : <?= $value['create_file_lelang'] ?>
																																			</td> -->
																		</tr>
																	<?php    } ?>
																</table>
															</div>
														</div>
													</div>
												<?php    } else { ?>
													<div class="col-md-6">
														<div class="card border-primary mb-3">
															<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Dokumen Lelang
															</div>
															<div class="card-body">
																<table class="table table table-striped">
																	<?php foreach ($get_pdf_dokumen_kualifikasi_lelang as $key => $value) { ?>
																		<tr>
																			<td>
																				<a target="_blank" href="<?= base_url('file_dokumen_lelang/' . $value['file_dokumen_lelang']) ?>">
																					<?= $value['nama_dokumen_lelang'] ?>
																					<img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4">
																				</a>
																			</td>
																			<td>
																				<!-- <a class="text-danger ml-3" href="<?= base_url('panitiajmtm/beranda/delete_dokumen_kualifikasi_lelang/' . $value['id_dokumen_lelang_pdf']) ?>"><i class="fas fa-trash-alt"></i></a> -->
																			</td>
																			<!-- <td>
																																				Di Kirim : <?= $value['create_file_lelang'] ?>
																																			</td> -->
																		</tr>
																	<?php    } ?>
																</table>
															</div>
														</div>
													</div>
												<?php    } ?>
												<?php if ($paket['id_kualifikasi'] == 15 || $paket['id_kualifikasi'] == 13 ||  $paket['id_kualifikasi'] == 11 ||  $paket['id_kualifikasi'] == 10 ||  $paket['id_kualifikasi'] == 8 ||  $paket['id_kualifikasi'] == 7 ||  $paket['id_kualifikasi'] == 6 ||  $paket['id_kualifikasi'] == 5 ||  $paket['id_kualifikasi'] == 24) { ?>
													<div class="col-md-6">
														<div class="card border-primary mb-3">
															<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Dokumen Prakualifikasi
															</div>
															<div class="card-body">
																<table class="table table table-striped">
																	<?php foreach ($get_pdf_dokumen_kualifikasi as $key => $value) { ?>
																		<tr>
																			<td>
																				<a target="_blank" href="<?= base_url('dokumen_file_dokumen_kualifikasi_pdf/' . $value['file_dokumen_kualifikasi_pdf']) ?>">
																					<?= $value['nama_dokumen_kualifikasi_pdf'] ?>
																					<img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4">
																				</a>
																			</td>
																			<td>
																				<!-- <a class="text-danger" href="<?= base_url('panitiajmtm/daftarpaket/delete_dokumen_kualifikasi/' . $value['id_dokumen_kualifikasi_pdf']) ?>"><i class="fas fa-trash-alt"></i></a> -->
																			</td>
																		</tr>
																	<?php    } ?>
																</table>
															</div>
														</div>
													</div>
												<?php } ?>
											</div>
											<div class="card border-primary mb-3">
												<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
													Persyaratan Tambahan
												</div>
												<div class="card-body">
													<table class="table">
														<tr>
															<th>Nama Persyaratan</th>
															<th>Keterangan</th>
															<th>File</th>
														</tr>
														<?php foreach ($persyaratan_tambahan as $key => $value) { ?>
															<tr>
																<td><?= $value['nama_persyaratan'] ?></td>
																<td><?= $value['keterangan'] ?></td>
																<td>
																	<?php
																	if ($value['file_persyaratan_tambahan'] == NULL) { ?>
																		<p>Tidak ada File</p>
																	<?php } else { ?>
																		<a href="<?= base_url('file_persyaratan_tambahan/' . $value['file_persyaratan_tambahan']) ?>">
																			<img width="30px" src="<?= base_url('assets/img/file-icon.png') ?>" alt=""></a>
																	<?php } ?>
																</td>
															</tr>
														<?php } ?>
													</table>
												</div>
											</div>

											<?php if (date('Y-m-d H:i', strtotime($get_tahap_id_11_7_17['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

											<?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_id_11_7_17['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_id_11_7_17['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
												<div class="card border-primary mb-3">
													<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
														Penyedia Yang Sudah Mengirim Persyaratan Tambahan
													</div>
													<div class="card-body">
														<table class="table">
															<tr>
																<th style="width:50px">Nama Penyedia</th>
																<th>Aksi</th>
																<th>Status</th>
															</tr>
															<?php foreach ($vendor_mengikuti_paket as $key => $value) { ?>
																<tr>
																	<td><?= $value['username_vendor'] ?></td>
																	<td>
																		<a href="javascript:;" onclick="lihat_dokumen_vendor(<?= $value['id_mengikuti_vendor'] ?>)" class="btn btn-sm btn-info">Lihat Dokumen Persyaratan Tambahan <i class="fa fa-eye"></i><i class="fa fa-eye"></i></a>
																		<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_neraca_keuangan(<?= $value['id_mengikuti_vendor'] ?>)">Neraca Keuangan </a>
																		<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_pengalaman(<?= $value['id_mengikuti_vendor'] ?>)">Pengalaman </a>
																	</td>
																	<td>
																		<?php if ($value['status_evaluasi_syarat_tambahan'] == 0) { ?>
																			<label for="" class="badge badge-danger">Dokumen Belum Lengkap</label>
																		<?php } else if ($value['status_evaluasi_syarat_tambahan'] == 1) { ?>
																			<label for="" class="badge badge-success">Sudah Lengkap</label>
																		<?php } else { ?>
																			<label for="" class="badge badge-warning">Belum Di Periksa</label>
																		<?php } ?>
																	</td>
																</tr>
															<?php } ?>
														</table>
													</div>
												</div>

												<!-- tanda -->
												<?php if ($paket['sts_tenaga_ahli'] == 1 || $paket['sts_peralatan'] == 1) { ?>

													<div class="card border-primary mb-3">
														<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
															Peralatan & Tenaga Ahli Penyedia
														</div>
														<div class="card-body">
															<table class="table">
																<?php foreach ($get_vendor as $key => $value) { ?>
																	<tr>
																		<td><?= $value['username_vendor'] ?></td>
																		<td>
																			<a href="javascript:;" onclick="lihat_peralatan(<?= $value['id_mengikuti_vendor'] ?>, <?= $paket['id_paket'] ?>)" class="btn btn-sm btn-info">Peralatan</a>
																			<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_tenaga_ahli(<?= $value['id_mengikuti_vendor'] ?>)">Tenaga Ahli</a>
																		</td>
																	</tr>
																<?php } ?>
															</table>
														</div>
													</div>
												<?php } else { ?>

												<?php }
												?>
											<?php    } else { ?>
												<div class="card border-primary mb-3">
													<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
														Penyedia Yang Sudah Mengirim Persyaratan Tambahan
													</div>
													<div class="card-body">
														<table class="table">
															<tr>
																<th style="width:50px">Nama Penyedia</th>
																<th>Aksi</th>
																<th>Status</th>
															</tr>
															<?php foreach ($vendor_mengikuti_paket as $key => $value) { ?>
																<tr>
																	<td><?= $value['username_vendor'] ?></td>
																	<td>
																		<a href="javascript:;" onclick="lihat_dokumen_vendor(<?= $value['id_mengikuti_vendor'] ?>)" class="btn btn-sm btn-info">Lihat Dokumen Persyaratan Tambahan <i class="fa fa-eye"></i><i class="fa fa-eye"></i></a>
																		<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_neraca_keuangan(<?= $value['id_mengikuti_vendor'] ?>)">Neraca Keuangan </a>
																		<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_pengalaman(<?= $value['id_mengikuti_vendor'] ?>)">Pengalaman </a>
																	</td>
																	<td>
																		<?php if ($value['status_evaluasi_syarat_tambahan'] == 0) { ?>
																			<label for="" class="badge badge-danger">Dokumen Belum Lengkap</label>
																		<?php } else if ($value['status_evaluasi_syarat_tambahan'] == 1) { ?>
																			<label for="" class="badge badge-success">Sudah Lengkap</label>
																		<?php } else { ?>
																			<label for="" class="badge badge-warning">Belum Di Periksa</label>
																		<?php } ?>
																	</td>
																</tr>
															<?php } ?>
														</table>
													</div>
												</div>
												<!-- tanda -->
												<?php if (date('Y-m-d H:i', strtotime($get_tahap_id_11_7_17['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

												<?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_id_11_7_17['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_id_11_7_17['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
													<?php if ($paket['sts_tenaga_ahli'] == 1 || $paket['sts_peralatan'] == 1) { ?>

														<div class="card border-primary mb-3">
															<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
																Peralatan & Tenaga Ahli Penyedia
															</div>
															<div class="card-body">
																<table class="table">
																	<?php foreach ($get_vendor as $key => $value) { ?>
																		<tr>
																			<td><?= $value['username_vendor'] ?></td>
																			<td>
																				<a href="javascript:;" onclick="lihat_peralatan(<?= $value['id_mengikuti_vendor'] ?>, <?= $paket['id_paket'] ?>)" class="btn btn-sm btn-info">Peralatan</a>
																				<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_tenaga_ahli(<?= $value['id_mengikuti_vendor'] ?>)">Tenaga Ahli</a>
																			</td>
																		</tr>
																	<?php } ?>
																</table>
															</div>
														</div>
													<?php } else { ?>

													<?php } ?>
												<?php    } else { ?>
													<?php if ($paket['sts_tenaga_ahli'] == 1 || $paket['sts_peralatan'] == 1) { ?>

														<div class="card border-primary mb-3">
															<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
																Peralatan & Tenaga Ahli Penyedia
															</div>
															<div class="card-body">
																<table class="table">
																	<?php foreach ($get_vendor as $key => $value) { ?>
																		<tr>
																			<td><?= $value['username_vendor'] ?></td>
																			<td>
																				<a href="javascript:;" onclick="lihat_peralatan(<?= $value['id_mengikuti_vendor'] ?>, <?= $paket['id_paket'] ?>)" class="btn btn-sm btn-info">Peralatan</a>
																				<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_tenaga_ahli(<?= $value['id_mengikuti_vendor'] ?>)">Tenaga Ahli</a>
																			</td>
																		</tr>
																	<?php } ?>
																</table>
															</div>
														</div>
													<?php } else { ?>

													<?php } ?>
												<?php    } ?>
											<?php    } ?>

										</td>
									</tr>

									<!-- <tr>
															<th>Jumlah Penawaran</th>
															<td>5 Penawaran</td>
														</tr> -->


									<?php if (date('Y-m-d H:i', strtotime($get_tahap_pembuktian_kualifikasi['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>
									<?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_pembuktian_kualifikasi['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_pembuktian_kualifikasi['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
										<tr>
											<th>Undangan Pembuktian</th>
											<td>
												<a href="javascript:;" style="text-decoration: none; color:white;" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#uploadUndangan"><i style="color: white;" class="fas fa-upload"></i> UPLOAD UNDANGAN PEMBUKTIAN KUALIFIKASI</a>
												<?php if ($paket['dokumen_undangan_pembuktian'] == NULL) { ?>

												<?php } else { ?>
													<a class="btn btn-sm btn-info" href="<?= base_url('file_undangan_pembuktian/' . $paket['dokumen_undangan_pembuktian']) ?>"><i class="fa fa-eye"></i> Lihat Dokumen</a>
												<?php } ?>
											</td>
										</tr>
									<?php    } else { ?>
										<tr>
											<th>Undangan Pembuktian</th>
											<td>
												<a href="javascript:;" style="text-decoration: none; color:white;" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#uploadUndangan"><i style="color: white;" class="fas fa-upload"></i> UPLOAD UNDANGAN PEMBUKTIAN KUALIFIKASI</a>
												<?php if ($paket['dokumen_undangan_pembuktian'] == NULL) { ?>

												<?php } else { ?>
													<a class="btn btn-sm btn-info" href="<?= base_url('file_undangan_pembuktian/' . $paket['dokumen_undangan_pembuktian']) ?>"><i class="fa fa-eye"></i> Lihat Dokumen</a>
												<?php } ?>
											</td>
										</tr>

									<?php    } ?>

									<tr>
										<th class="bgwarning" width="20%">Bobot Teknis<span class="warning">*</span></th>
										<td>
											<div class="row">
												<div class="col-md-2">
													<input type="number" class="form-control" id="bobot_teknis" value="<?= $paket['bobot_teknis'] ?>" name="bobot_teknis" readonly>
													<p class="text-danger" id="bobot_teknis_error"></p>
												</div>
											</div>

										</td>
									</tr>
									<tr>
										<th class="bgwarning" width="20%">Bobot Biaya<span class="warning">*</span></th>
										<td>
											<div class="row">
												<div class="col-md-2">
													<input type="number" class="form-control" id="bobot_biaya" name="bobot_biaya" value="<?= $paket['bobot_biaya'] ?>" readonly>
													<p class="text-danger" id="bobot_biaya_error"></p>
												</div>
											</div>
										</td>
									</tr>
									<?php ?>

									<?php if (date('Y-m-d H:i', strtotime($get_tahap_id_11_7_17['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

									<?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_id_11_7_17['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_id_11_7_17['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
										<tr>
											<div class="row">
												<th>Pembukaan Penawaran</th>
												<td>
													<div class="card">
														<div class="card-header bg-primary text-white">
															<label for="">Pembukaan Dokumen Penawaran</label>
														</div>
														<div class="card-body">
															<?php if (!$cek_vendor_mengikuti_tender) { ?>
																<label for="" class="text-danger">BELUM ADA YANG MENGIKUTI TENDER!</label>
															<?php } else { ?>
																<img src="<?= base_url('assets/img/6100RjKShtL.png') ?>" width="50px" alt=""> <a target="blank_" href="<?= base_url('buka_penawaran') ?>" class="btn btn-info btn-sm" style="color: white;"> Buka Dokumen Penawaran <i class="fa fa-upload"></i></a>

															<?php } ?>
														</div>
													</div>
													<br>
													<input type="text" class="form-control" value="<?= $paket['token'] ?>" disabled>
													<div class="bs-callout bs-callout-info">
														Silahkan Copy Paste Token Untuk Membuka Dokumen Penawaran Peserta
													</div>

												</td>
											</div>
										</tr>
									<?php    } else { ?>
										<tr>
											<div class="row">
												<th>Pembukaan Penawaran</th>
												<td>
													<div class="card">
														<div class="card-header bg-primary text-white">
															<label for="">Pembukaan Dokumen Penawaran</label>
														</div>
														<div class="card-body">
															<?php if (!$cek_vendor_mengikuti_tender) { ?>
																<label for="" class="text-danger">BELUM ADA YANG MENGIKUTI TENDER!</label>
															<?php } else { ?>
																<img src="<?= base_url('assets/img/6100RjKShtL.png') ?>" width="50px" alt=""> <a target="blank_" href="<?= base_url('buka_penawaran') ?>" class="btn btn-info btn-sm" style="color: white;"> Buka Dokumen Penawaran <i class="fa fa-upload"></i></a>

															<?php } ?>
														</div>
													</div>
													<br>
													<input type="text" class="form-control" value="<?= $paket['token'] ?>" disabled>
													<div class="bs-callout bs-callout-info">
														Silahkan Copy Paste Token Untuk Membuka Dokumen Penawaran Peserta
													</div>

												</td>
											</div>
										</tr>
									<?php    } ?>

									<?php ?>
									<tr>
										<th>Berita Acara</th>
										<td>
											<div class="card border-primary mb-3">
												<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
													<div class="row">
														<div class="col-md-10">
															Peringkat Teknis
														</div>
														<div class="col-md-2" style="margin-left:700px;margin-top:-20px;">
															<a href="" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#beritaAcaraPeringkat"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
														</div>
														<div class="col-md-10">
															Peringkat Penawaran Harga
														</div>
														<div class="col-md-2" style="margin-left:700px;margin-top:-20px;">
															<a href="" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#beritaAcaraPeringkat"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
														</div>
														<div class="col-md-10">
															Pengumuman Pemenang
														</div>
														<div class="col-md-2" style="margin-left:700px;margin-top:-20px;">
															<a href="" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#beritaAcaraPeringkat"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
														</div>
														<div class="col-md-10">
															Undangan Presentasi
														</div>
														<div class="col-md-2" style="margin-left:700px;margin-top:-20px;">
															<a href="" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#beritaAcaraPeringkat"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
														</div>
														<div class="col-md-10">
															Addendum Dokumen Pengadaan
														</div>
														<div class="col-md-2" style="margin-left:700px;margin-top:-20px;">
															<a href="" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#beritaAcaraPeringkat"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
														</div>
													</div>
												</div>
												<div class="card-body">
													<?php foreach ($get_berita_acara_peringkat as $key => $value) { ?>
														<a style="text-decoration: none;" href="<?= base_url('berita_acara_tender/' . $value['file_berita_acara_peringkat']) ?>" target="_blank">
															<img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4">
															<?= $value['nama_file'] ?>
														</a>
														<a class="text-danger ml-3" href="<?= base_url('panitiajmtm/beranda/delete_berita_acara_hasil_peringkat/' . $value['id_berita_acara_peringkat']) ?>"><i class="fas fa-trash-alt"></i></a> | Tanggal Upload : <?= $value['create_at'] ?>
														<br>
													<?php } ?>
												</div>
											</div>
											<div class="card border-primary mb-3">
												<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Berita Acara Evaluasi Hasil Penawaran
													<a href="javascript:;" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#beritaAcaraPenawaran"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
												</div>
												<div class="card-body">
													<?php foreach ($get_berita_acara_penawaran as $key => $value) { ?>
														<a style="text-decoration: none;" href="<?= base_url('berita_acara_penawaran/' . $value['file_berita_acara_penawaran']) ?>" target="_blank">
															<img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4">
															<?= $value['nama_file'] ?>
														</a>
														<a class="text-danger ml-3" href="<?= base_url('panitiajmtm/beranda/delete_berita_acara_hasil_penawaran/' . $value['id_berita_acara_penawaran']) ?>"><i class="fas fa-trash-alt"></i></a> | Tanggal Upload : <?= $value['create_at'] ?>
														<br>
													<?php } ?>

												</div>
											</div>

											<div class="card border-primary mb-3">
												<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Berita Acara Evaluasi Hasil Tender
													<a href="" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger " data-toggle="modal" data-target="#beritaAcaraTender"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
												</div>
												<div class="card-body">
													<?php foreach ($get_berita_acara_tender as $key => $value) { ?>
														<a style="text-decoration: none;" href="<?= base_url('berita_acara_tender/' . $value['file_berita_acara_tender']) ?>" target="_blank">
															<img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4">
															<?= $value['nama_file'] ?>
														</a>
														<a class="text-danger ml-3" href="<?= base_url('panitiajmtm/beranda/delete_berita_acara_hasil_tender/' . $value['id_berita_acara_tender']) ?>"><i class="fas fa-trash-alt"></i></a> | Tanggal Upload : <?= $value['create_at'] ?>
														<br>
													<?php } ?>

												</div>
											</div>
											<div class="card border-primary mb-3">
												<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Informasi Lainnya
													<a href="" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#beritaAcaraLainnya"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
												</div>
												<div class="card-body">
													<?php foreach ($get_berita_acara_lainnya as $key => $value) { ?>
														<a style="text-decoration: none;" href="<?= base_url('berita_acara_lainnya/' . $value['file_berita_acara_lainnya']) ?>" target="_blank">
															<img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4">
															<?= $value['nama_file'] ?>
														</a>
														<a class="text-danger ml-3" href="<?= base_url('panitiajmtm/beranda/delete_berita_acara_hasil_lainnya/' . $value['id_berita_acara_lainnya']) ?>"><i class="fas fa-trash-alt"></i></a> | Tanggal Upload : <?= $value['create_at'] ?>
														<br>
													<?php } ?>
												</div>
											</div>
											<div class="bs-callout bs-callout-info">
												Informasi Lainya Dapat Berupa Berita Acara Lain yang di tujukan kepada semua peserta jika terdapat kendala di luar kendali Panitia Pemilihan
											</div>
										</td>
									</tr>

									<tr>
										<th>Pengumuman</th>
										<td><a href="<?= base_url('panitiajmtm/beranda/pengumumanpemenangtender/' . $paket['id_paket']) ?>" style="color: white;height:20px;" class="badge badge-warning">Pengumuman Pemenang</a></td>
									</tr>
									<tr>
									<tr>
										<th>Surat Penunjukan</th>
										<td>
											<a href="javascript:;" style="text-decoration: none; color:white;" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#uploadSuratPenunjukan"><i class="far fa-paper-plane"></i> KIRIM SURAT PENUNJUKAN</a>
											<?php if ($paket['surat_penunjukan'] == NULL) { ?>

											<?php } else { ?>
												<a class="btn btn-sm btn-info" href="<?= base_url('file_surat_penunjukan/' . $paket['surat_penunjukan']) ?>"><i class="fa fa-eye"></i> Lihat Dokumen</a>
											<?php } ?>

										</td>
									</tr>
									<?php if ($this->session->userdata('id_role') == 1) { ?>
										<tr>
											<th>Pakta Integritas</th>
											<td>
												<div class="row">
													<div class="col-md-6">
														<table>
															<thead>
																<tr>
																	<th>Panitia</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<th><a target="_blank" href="<?= base_url('panitiajmtm/beranda/paktaintegritas_panitia/' . $paket['id_paket']) ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Panitia</a></th>
																</tr>
															</tbody>
														</table>
													</div>
													<div class="col-md-6">
														<table>
															<thead>
																<tr>
																	<th>Penyedia</th>
																</tr>
															</thead>
															<tbody>
																<?php foreach ($vendor_mengikuti as $key => $value) { ?>
																	<tr>
																		<th>
																			<a target="_blank" href="<?= base_url('panitiajmtm/beranda/paktaintegritas_vendor/' . $value['id_mengikuti_paket_vendor'] . '/' . $value['id_mengikuti_vendor']) ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> <?= $value['username_vendor'] ?></a>
																		</th>
																	</tr>
																<?php } ?>
															</tbody>
														</table>
													</div>
												</div>
											</td>
										</tr>
									<?php } else { ?>
									<?php } ?>
								</tbody>
							</table>
							<div>
								<a href="<?= base_url('panitiajmtm/beranda/bataltender/' . $paket['id_paket']) ?>" class="btn btn-danger mb-3">Membatalkan Tender Atau Mengulang Tender</a>

								<!-- 20 september 2022 -->
								<a href="javascript:;" data-toggle="modal" data-target="#upload_dokumen_pembatalan" class="btn btn-warning mb-3 text-white">Upload Dokumen Pembatalan</a>

								<?php if ($this->session->userdata('id_role') == 1 || $this->session->userdata('id_role') == 2) { ?>
								<?php } else { ?>
									<a href="<?= base_url('panitiajmtm/beranda/evaluasitender/' . $paket['id_paket']) ?>" class="btn btn-success ml-2 mb-3">Evaluasi Tender</a>

								<?php } ?>
								<!-- <a href="" class="btn btn-success mb-3">Pemasukan Penawaran Ulang</a> -->
								<!-- <a href="" class="btn btn-primary ml-2 mb-3">Forensik Penawaran Peserta</a> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } else if ($paket['id_kualifikasi'] == 17 || $paket['id_kualifikasi'] == 11 || $paket['id_kualifikasi'] == 7) { ?>
	<div id="main" class="container">
		<form action="javascript:;" id="form_tidak_lulus_dokumen_tambahan">
			<input type="hidden" name="id_persyaratan_tambahan_lulus">
			<input type="hidden" name="id_vendor_persyaratan_lulus">
			<input type="hidden" name="id_paket_persyaratan_lulus">
			<textarea hidden name="alasan_tidak_lulus_new"></textarea>
		</form>
		<input type="hidden" id="id_paket" value="<?= $paket['id_paket'] ?>">
		<?php if ($this->session->userdata('id_role') == 1 || $this->session->userdata('id_role') == 2) { ?>
		<?php    } else { ?>
			<div class="float-right p-3">
				<a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi" class="badge badge-danger navbar-badge"></span> Pesan Penjelasan </a>
				<a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca_negosiasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_negosiasi" class="badge badge-danger navbar-badge"></span> Pesan Negosiasi </a>
				<a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_prakualifikasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_prakualifikasi" class="badge badge-danger navbar-badge"></span> Sanggahan Prakualifikasi</a>
				<a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_akhir"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_akhir" class="badge badge-danger navbar-badge"></span> Sanggahan Akhir</a>
			</div>
		<?php    } ?>
		<nav aria-label="breadcrumb" class="mt-3">
			<ol class="breadcrumb bg-primary">
				<li class="breadcrumb-item"><a style="color: white;" href="<?= base_url('panitiajmtm/beranda/informasitender/' . $paket['id_paket']) ?>">Beranda &raquo; Informasi Tender</a></li>
			</ol>
		</nav>
		<?php if ($this->session->userdata('id_role') == 1 || $this->session->userdata('id_role') == 2) { ?>
		<?php    } else { ?>
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a class="nav-link bg-primary text-white" href="<?= base_url('panitiajmtm/beranda/informasitender/' . $paket['id_paket']) ?>">Informasi Tender</a>
				</li>
				<li class=" nav-item">
					<a class="nav-link bg-info text-white active" href="<?= base_url('panitiajmtm/beranda/pertanyaantender/' . $paket['id_paket']) ?>">Pertanyaan</a>
				</li>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/evaluasitender/' . $paket['id_paket']) ?>">Evaluasi</a>
				</li>
				<!-- <li class="nav-item">
																<a class="nav-link active " href="<?= base_url('panitiajmtm/beranda/reverseauctiontender/' . $paket['id_paket']) ?>">Reverse Auction</a>
															</li> -->
				<?php if ($paket['id_kualifikasi'] == 16 || $paket['id_kualifikasi'] == 15 || $paket['id_kualifikasi'] == 12) { ?>
				<?php } else { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggah_prakualifikasi/' . $paket['id_paket']) ?>">Sangahan Prakualifikasi</a>
					</li>
				<?php } ?>
				<?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>
				<?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Negosiasi</a>
					</li>
				<?php    } else { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Negosiasi</a>
					</li>
				<?php    } ?>
				<?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>
				<?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $paket['id_paket']) ?>">Sangahan</a>
					</li>
				<?php    } else { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $paket['id_paket']) ?>">Sangahan</a>
					</li>
				<?php    } ?>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/berita_acara/' . $paket['id_paket']) ?>">Berita Acara</a>
				</li>
			</ul>
		<?php    } ?>
		<div class="tab-content p-2 card">
			<!-- tender -->
			<div class="tab-pane active" id="informasi-tender" role="tabpanel" aria-labelledby="tender-tab">
				<div class="content">
					<?= $this->session->flashdata('berita_acara_penawaran'); ?>
					<?= $this->session->flashdata('berita_acara_tender'); ?>
					<?= $this->session->flashdata('berita_acara_peringkat'); ?>
					<div class="container-fluid">
						<div style="overflow-x:auto">
							<?= $this->session->flashdata('status_tahap_tender'); ?>
							<table class="table table-bordered">
								<tbody>
									<tr>
										<th>Kode Tender</th>
										<td><?= $paket['kode_tender'] ?> <a target="_blank" href="<?= base_url('panitiajmtm/beranda/summary_tender/' . $paket['id_paket']) ?>" class="float-right badge badge-secondary" style="height: 20px;">Summary Tender</a></td>
									</tr>
									<tr>
										<th>Nama Tender</th>
										<div>
											<td>
												<b>
													<?= $paket['nama_paket'] ?>
												</b>
												<!-- <a href="" class="badge badge-secondary">Detil</a> -->
											</td>
										</div>
									</tr>
									<tr>
										<div>
											<th>Tahap Tender</th>
										</div>

										<td>
											<a href="javascipt:;" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_lihat_tahap"><img src="<?= base_url('assets/img/icon-jadwal.png') ?>" width="25px" alt=""> Lihat Tahap Tender Saat Ini</a>
										</td>
									</tr>
									<tr>
										<th>Jumlah Peserta</th>
										<td> <a href="javascript:;" onclick="lihat_vendor_mengikuti(<?= $paket['id_paket'] ?>)" class="btn btn-sm btn-primary"> <b><?= $jumlah_peserta ?> Peserta</b></a></td>
									</tr>
									<tr>
										<th>Dokumen Lelang</th>
										<td>
											<div class="row">
												<div class="col-md-6">
													<div class="card border-primary mb-3">
														<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Dokumen Lelang
														</div>
														<div class="card-body">
															<table class="table table table-striped">
																<?php foreach ($get_pdf_dokumen_kualifikasi_lelang as $key => $value) { ?>
																	<tr>
																		<td>
																			<a target="_blank" href="<?= base_url('file_dokumen_lelang/' . $value['file_dokumen_lelang']) ?>">
																				<?= $value['nama_dokumen_lelang'] ?>
																				<img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4">
																			</a>
																		</td>
																		<td>
																			<!-- <a class="text-danger ml-3" href="<?= base_url('panitiajmtm/beranda/delete_dokumen_kualifikasi_lelang/' . $value['id_dokumen_lelang_pdf']) ?>"><i class="fas fa-trash-alt"></i></a> -->
																		</td>
																		<!-- <td>
																														Di Kirim : <?= $value['create_file_lelang'] ?>
																													</td> -->
																	</tr>
																<?php    } ?>
															</table>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="card border-primary mb-3">
														<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Dokumen Prakualifikasi
														</div>
														<div class="card-body">
															<table class="table table table-striped">
																<?php foreach ($get_pdf_dokumen_kualifikasi as $key => $value) { ?>
																	<tr>
																		<td>
																			<a target="_blank" href="<?= base_url('dokumen_file_dokumen_kualifikasi_pdf/' . $value['file_dokumen_kualifikasi_pdf']) ?>">
																				<?= $value['nama_dokumen_kualifikasi_pdf'] ?>
																				<img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4">
																			</a>
																		</td>
																		<td>
																			<!-- <a class="text-danger" href="<?= base_url('panitiajmtm/daftarpaket/delete_dokumen_kualifikasi/' . $value['id_dokumen_kualifikasi_pdf']) ?>"><i class="fas fa-trash-alt"></i></a> -->
																		</td>
																	</tr>
																<?php    } ?>
															</table>
														</div>
													</div>
												</div>
											</div>
											<?php if (date('Y-m-d H:i', strtotime($evaluasi_dokumen_prakualifiaksi_2_file['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

											<?php    } else if (date('Y-m-d H:i', strtotime($evaluasi_dokumen_prakualifiaksi_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($evaluasi_dokumen_prakualifiaksi_2_file['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
												<div class="card border-primary mb-3">
													<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
														Persyaratan Tambahan
													</div>
													<div class="card-body">
														<table class="table">
															<tr>
																<th>Nama Persyaratan</th>
																<th>Keterangan</th>
																<th>File</th>
															</tr>
															<?php foreach ($persyaratan_tambahan as $key => $value) { ?>
																<tr>
																	<td><?= $value['nama_persyaratan'] ?></td>
																	<td><?= $value['keterangan'] ?></td>
																	<td>
																		<?php
																		if ($value['file_persyaratan_tambahan'] == NULL) { ?>
																			<p>Tidak ada File</p>
																		<?php } else { ?>
																			<a href="<?= base_url('file_persyaratan_tambahan/' . $value['file_persyaratan_tambahan']) ?>">
																				<img width="30px" src="<?= base_url('assets/img/file-icon.png') ?>" alt=""></a>
																		<?php } ?>
																	</td>
																</tr>
															<?php } ?>
														</table>
													</div>
												</div>

												<div class="card border-primary mb-3">
													<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
														Penyedia Yang Sudah Mengirim Persyaratan Tambahan
													</div>
													<div class="card-body">
														<table class="table">
															<tr>
																<th style="width:50px">Nama Penyedia</th>
																<th>Aksi</th>
																<th>Status</th>
															</tr>
															<?php foreach ($vendor_mengikuti_paket as $key => $value) { ?>
																<tr>
																	<td><?= $value['username_vendor'] ?></td>
																	<td>
																		<a href="javascript:;" onclick="lihat_dokumen_vendor(<?= $value['id_mengikuti_vendor'] ?>)" class="btn btn-sm btn-info">Lihat Dokumen Persyaratan Tambahan <i class="fa fa-eye"></i><i class="fa fa-eye"></i></a>
																		<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_neraca_keuangan(<?= $value['id_mengikuti_vendor'] ?>)">Neraca Keuangan </a>
																		<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_pengalaman(<?= $value['id_mengikuti_vendor'] ?>)">Pengalaman </a>
																	</td>
																	<td>
																		<?php if ($value['status_evaluasi_syarat_tambahan'] == 0) { ?>
																			<label for="" class="badge badge-danger">Dokumen Belum Lengkap</label>
																		<?php } else if ($value['status_evaluasi_syarat_tambahan'] == 1) { ?>
																			<label for="" class="badge badge-success">Sudah Lengkap</label>
																		<?php } else { ?>
																			<label for="" class="badge badge-warning">Belum Di Periksa</label>
																		<?php } ?>
																	</td>
																</tr>
															<?php } ?>
														</table>
													</div>
												</div>

												<!-- tanda -->
												<?php if ($paket['sts_tenaga_ahli'] == 1 || $paket['sts_peralatan'] == 1) { ?>

													<div class="card border-primary mb-3">
														<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
															Peralatan & Tenaga Ahli Penyedia
														</div>
														<div class="card-body">
															<table class="table">
																<?php foreach ($get_vendor as $key => $value) { ?>
																	<tr>
																		<td><?= $value['username_vendor'] ?></td>
																		<td>
																			<a href="javascript:;" onclick="lihat_peralatan(<?= $value['id_mengikuti_vendor'] ?>, <?= $paket['id_paket'] ?>)" class="btn btn-sm btn-info">Peralatan</a>
																			<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_tenaga_ahli(<?= $value['id_mengikuti_vendor'] ?>)">Tenaga Ahli</a>
																		</td>
																	</tr>
																<?php } ?>
															</table>
														</div>
													</div>
												<?php } else { ?>

												<?php }
												?>

											<?php    } else { ?>
												<div class="card border-primary mb-3">
													<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
														Persyaratan Tambahan
													</div>
													<div class="card-body">
														<table class="table">
															<tr>
																<th>Nama Persyaratan</th>
																<th>Keterangan</th>
																<th>File</th>
															</tr>
															<?php foreach ($persyaratan_tambahan as $key => $value) { ?>
																<tr>
																	<td><?= $value['nama_persyaratan'] ?></td>
																	<td><?= $value['keterangan'] ?></td>
																	<td>
																		<?php
																		if ($value['file_persyaratan_tambahan'] == NULL) { ?>
																			<p>Tidak ada File</p>
																		<?php } else { ?>
																			<a href="<?= base_url('file_persyaratan_tambahan/' . $value['file_persyaratan_tambahan']) ?>">
																				<img width="30px" src="<?= base_url('assets/img/file-icon.png') ?>" alt=""></a>
																		<?php } ?>
																	</td>
																</tr>
															<?php } ?>
														</table>
													</div>
												</div>
												<div class="card border-primary mb-3">
													<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
														Penyedia Yang Sudah Mengirim Persyaratan Tambahan
													</div>
													<div class="card-body">
														<table class="table">
															<tr>
																<th style="width:50px">Nama Penyedia</th>
																<th>Aksi</th>
																<th>Status</th>
															</tr>
															<?php foreach ($vendor_mengikuti_paket as $key => $value) { ?>
																<tr>
																	<td><?= $value['username_vendor'] ?></td>
																	<td>
																		<a href="javascript:;" onclick="lihat_dokumen_vendor(<?= $value['id_mengikuti_vendor'] ?>)" class="btn btn-sm btn-info">Lihat Dokumen Persyaratan Tambahan <i class="fa fa-eye"></i><i class="fa fa-eye"></i></a>
																		<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_neraca_keuangan(<?= $value['id_mengikuti_vendor'] ?>)">Neraca Keuangan </a>
																		<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_pengalaman(<?= $value['id_mengikuti_vendor'] ?>)">Pengalaman </a>
																	</td>
																	<td>
																		<?php if ($value['status_evaluasi_syarat_tambahan'] == 0) { ?>
																			<label for="" class="badge badge-danger">Dokumen Belum Lengkap</label>
																		<?php } else if ($value['status_evaluasi_syarat_tambahan'] == 1) { ?>
																			<label for="" class="badge badge-success">Sudah Lengkap</label>
																		<?php } else { ?>
																			<label for="" class="badge badge-warning">Belum Di Periksa</label>
																		<?php } ?>
																	</td>
																</tr>
															<?php } ?>
														</table>
													</div>
												</div>

												<!-- tanda -->
												<?php if (date('Y-m-d H:i', strtotime($get_tahap_id_11_7_17['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

												<?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_id_11_7_17['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_id_11_7_17['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
													<?php if ($paket['sts_tenaga_ahli'] == 1 || $paket['sts_peralatan'] == 1) { ?>

														<div class="card border-primary mb-3">
															<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
																Peralatan & Tenaga Ahli Penyedia
															</div>
															<div class="card-body">
																<table class="table">
																	<?php foreach ($get_vendor as $key => $value) { ?>
																		<tr>
																			<td><?= $value['username_vendor'] ?></td>
																			<td>
																				<a href="javascript:;" onclick="lihat_peralatan(<?= $value['id_mengikuti_vendor'] ?>, <?= $paket['id_paket'] ?>)" class="btn btn-sm btn-info">Peralatan</a>
																				<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_tenaga_ahli(<?= $value['id_mengikuti_vendor'] ?>)">Tenaga Ahli</a>
																			</td>
																		</tr>
																	<?php } ?>
																</table>
															</div>
														</div>
													<?php } else { ?>

													<?php } ?>
												<?php    } else { ?>
													<?php if ($paket['sts_tenaga_ahli'] == 1 || $paket['sts_peralatan'] == 1) { ?>

														<div class="card border-primary mb-3">
															<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
																Peralatan & Tenaga Ahli Penyedia
															</div>
															<div class="card-body">
																<table class="table">
																	<?php foreach ($get_vendor as $key => $value) { ?>
																		<tr>
																			<td><?= $value['username_vendor'] ?></td>
																			<td>
																				<a href="javascript:;" onclick="lihat_peralatan(<?= $value['id_mengikuti_vendor'] ?>, <?= $paket['id_paket'] ?>)" class="btn btn-sm btn-info">Peralatan</a>
																				<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_tenaga_ahli(<?= $value['id_mengikuti_vendor'] ?>)">Tenaga Ahli</a>
																			</td>
																		</tr>
																	<?php } ?>
																</table>
															</div>
														</div>
													<?php } else { ?>

													<?php } ?>
												<?php    } ?>

											<?php    } ?>
									<tr>
										<?php if (date('Y-m-d H:i', strtotime($get_tahap_pembuktian_kualifikasi['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

										<?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_pembuktian_kualifikasi['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_pembuktian_kualifikasi['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
											<th>Undangan Pembuktian</th>
											<td>
												<a href="javascript:;" style="text-decoration: none; color:white;" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#uploadUndangan"><i style="color: white;" class="fas fa-upload"></i> UPLOAD UNDANGAN PEMBUKTIAN KUALIFIKASI</a>
												<?php if ($paket['dokumen_undangan_pembuktian'] == NULL) { ?>

												<?php } else { ?>
													<a class="btn btn-sm btn-info" href="<?= base_url('file_undangan_pembuktian/' . $paket['dokumen_undangan_pembuktian']) ?>"><i class="fa fa-eye"></i> Lihat Dokumen</a>
												<?php } ?>


											</td>
										<?php    } else { ?>
											<th>Undangan Pembuktian</th>
											<td>
												<a href="javascript:;" style="text-decoration: none; color:white;" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#uploadUndangan"><i style="color: white;" class="fas fa-upload"></i> UPLOAD UNDANGAN PEMBUKTIAN KUALIFIKASI</a>
												<?php if ($paket['dokumen_undangan_pembuktian'] == NULL) { ?>

												<?php } else { ?>
													<a class="btn btn-sm btn-info" href="<?= base_url('file_undangan_pembuktian/' . $paket['dokumen_undangan_pembuktian']) ?>"><i class="fa fa-eye"></i> Lihat Dokumen</a>
												<?php } ?>

											</td>
										<?php } ?>

									</tr>



									<tr>
										<?php if (date('Y-m-d H:i', strtotime($pengumuman_hasil_prakualifikasi['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

										<?php    } else if (date('Y-m-d H:i', strtotime($pengumuman_hasil_prakualifikasi['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($pengumuman_hasil_prakualifikasi['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
											<th>Pengumuman Hasil Prakualifikasi</th>
											<td>
												<a href="javascript:;" style="text-decoration: none; color:white;" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#pengumuman_prakualifikasi"><i style="color: white;" class="fas fa-upload"></i> UPLOAD HASIL EVALUASI PRAKUALIFIKASI</a>
												<?php if ($paket['dokumen_pengumuman_hasil_prakualifikasi'] == NULL) { ?>

												<?php } else { ?>
													<a class="btn btn-sm btn-info" href="<?= base_url('file_pengumuman_prakualifikasi/' . $paket['dokumen_pengumuman_hasil_prakualifikasi']) ?>"><i class="fa fa-eye"></i> Lihat Dokumen</a>
												<?php } ?>
											</td>
										<?php    } else { ?>
											<th>Pengumuman Hasil Prakualifikasi</th>
											<td>
												<a href="javascript:;" style="text-decoration: none; color:white;" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#pengumuman_prakualifikasi"><i style="color: white;" class="fas fa-upload"></i> UPLOAD HASIL EVALUASI PRAKUALIFIKASI</a>
												<?php if ($paket['dokumen_pengumuman_hasil_prakualifikasi'] == NULL) { ?>

												<?php } else { ?>
													<a class="btn btn-sm btn-info" href="<?= base_url('file_pengumuman_prakualifikasi/' . $paket['dokumen_pengumuman_hasil_prakualifikasi']) ?>"><i class="fa fa-eye"></i> Lihat Dokumen</a>
												<?php } ?>
											</td>
										<?php } ?>

									</tr>

									<!-- 8 september -->
									<tr>
										<?php if (date('Y-m-d H:i', strtotime($cek_waktu2['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

										<?php    } else if (date('Y-m-d H:i', strtotime($cek_waktu2['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($cek_waktu2['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
											<th>Undangan Penawaran</th>
											<td>
												<a href="javascript:;" style="text-decoration: none; color:white;" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#undangan_penawaran"><i style="color: white;" class="fas fa-upload"></i> UPLOAD UNDANGAN PENAWARAN</a>
												<?php if ($paket['undangan_penawaran'] == NULL) { ?>

												<?php } else { ?>
													<a class="btn btn-sm btn-info" href="<?= base_url('file_undangan_penawaran/' . $paket['undangan_penawaran']) ?>"><i class="fa fa-eye"></i> Lihat Dokumen</a>
												<?php } ?>
											</td>
										<?php    } else { ?>
											<th>Undangan Penawaran</th>
											<td>
												<a href="javascript:;" style="text-decoration: none; color:white;" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#undangan_penawaran"><i style="color: white;" class="fas fa-upload"></i> UPLOAD UNDANGAN PENAWARAN</a>
												<?php if ($paket['undangan_penawaran'] == NULL) { ?>

												<?php } else { ?>
													<a class="btn btn-sm btn-info" href="<?= base_url('file_undangan_penawaran/' . $paket['undangan_penawaran']) ?>"><i class="fa fa-eye"></i> Lihat Dokumen</a>
												<?php } ?>
											</td>
										<?php } ?>

									</tr>
									<!-- end 8 september -->

									<tr>
										<th class="bgwarning" width="20%">Bobot Teknis<span class="warning">*</span></th>
										<td>
											<div class="row">
												<div class="col-md-2">
													<input type="number" class="form-control" id="bobot_teknis" value="<?= $paket['bobot_teknis'] ?>" name="bobot_teknis" readonly>
													<p class="text-danger" id="bobot_teknis_error"></p>
												</div>
											</div>

										</td>
									</tr>
									<tr>
										<th class="bgwarning" width="20%">Bobot Biaya<span class="warning">*</span></th>
										<td>
											<div class="row">
												<div class="col-md-2">
													<input type="number" class="form-control" id="bobot_biaya" name="bobot_biaya" value="<?= $paket['bobot_biaya'] ?>" readonly>
													<p class="text-danger" id="bobot_biaya_error"></p>
												</div>
											</div>
										</td>
									</tr>
									<?php if (date('Y-m-d H:i', strtotime($get_tahap_id_11_7_17['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

									<?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_id_11_7_17['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_id_11_7_17['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
										<tr>
											<div class="row">
												<th>Pembukaan Penawaran</th>
												<td>
													<div class="card">
														<div class="card-header bg-primary text-white">
															<label for="">Pembukaan Dokumen Penawaran</label>
														</div>
														<div class="card-body">
															<?php if (!$cek_vendor_mengikuti_tender) { ?>
																<label for="" class="text-danger">BELUM ADA YANG MENGIKUTI TENDER!</label>
															<?php } else { ?>
																<img src="<?= base_url('assets/img/6100RjKShtL.png') ?>" width="50px" alt=""> <a target="blank_" href="<?= base_url('buka_penawaran') ?>" class="btn btn-info btn-sm" style="color: white;"> Buka Dokumen Penawaran <i class="fa fa-upload"></i></a>

															<?php } ?>
														</div>
													</div>
													<br>
													<input type="text" class="form-control" value="<?= $paket['token'] ?>" disabled>
													<div class="bs-callout bs-callout-info">
														Silahkan Copy Paste Token Untuk Membuka Dokumen Penawaran Peserta
													</div>
												</td>
											</div>
										</tr>
									<?php    } else { ?>
										<tr>
											<div class="row">
												<th>Pembukaan Penawaran</th>
												<td>
													<div class="card">
														<div class="card-header bg-primary text-white">
															<label for="">Pembukaan Dokumen Penawaran</label>
														</div>
														<div class="card-body">
															<?php if (!$cek_vendor_mengikuti_tender) { ?>
																<label for="" class="text-danger">BELUM ADA YANG MENGIKUTI TENDER!</label>
															<?php } else { ?>
																<img src="<?= base_url('assets/img/6100RjKShtL.png') ?>" width="50px" alt=""> <a target="blank_" href="<?= base_url('buka_penawaran') ?>" class="btn btn-info btn-sm" style="color: white;"> Buka Dokumen Penawaran <i class="fa fa-upload"></i></a>

															<?php } ?>
														</div>
													</div>
													<br>
													<input type="text" class="form-control" value="<?= $paket['token'] ?>" disabled>
													<div class="bs-callout bs-callout-info">
														Silahkan Copy Paste Token Untuk Membuka Dokumen Penawaran Peserta
													</div>

												</td>
											</div>
										</tr>
									<?php    } ?>

									<?php ?>
									<tr>
										<th>Berita Acara</th>
										<td>
											<div class="card border-primary mb-3">
												<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
													<div class="row">
														<div class="col-md-10">
															Peringkat Teknis
														</div>
														<div class="col-md-2" style="margin-left:700px;margin-top:-20px;">
															<a href="" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#beritaAcaraPeringkat"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
														</div>
														<div class="col-md-10">
															Peringkat Penawaran Harga
														</div>
														<div class="col-md-2" style="margin-left:700px;margin-top:-20px;">
															<a href="" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#beritaAcaraPeringkat"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
														</div>
														<div class="col-md-10">
															Pengumuman Pemenang
														</div>
														<div class="col-md-2" style="margin-left:700px;margin-top:-20px;">
															<a href="" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#beritaAcaraPeringkat"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
														</div>
														<div class="col-md-10">
															Undangan Presentasi
														</div>
														<div class="col-md-2" style="margin-left:700px;margin-top:-20px;">
															<a href="" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#beritaAcaraPeringkat"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
														</div>
														<div class="col-md-10">
															Addendum Dokumen Pengadaan
														</div>
														<div class="col-md-2" style="margin-left:700px;margin-top:-20px;">
															<a href="" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#beritaAcaraPeringkat"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
														</div>
													</div>

												</div>
												<div class="card-body">
													<?php foreach ($get_berita_acara_peringkat as $key => $value) { ?>
														<a style="text-decoration: none;" href="<?= base_url('berita_acara_tender/' . $value['file_berita_acara_peringkat']) ?>" target="_blank">
															<img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4">
															<?= $value['nama_file'] ?>
														</a>
														<a class="text-danger ml-3" href="<?= base_url('panitiajmtm/beranda/delete_berita_acara_hasil_peringkat/' . $value['id_berita_acara_peringkat']) ?>"><i class="fas fa-trash-alt"></i></a> | Tanggal Upload : <?= $value['create_at'] ?>
														<br>
													<?php } ?>
												</div>
											</div>
											<div class="card border-primary mb-3">
												<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Berita Acara Evaluasi Hasil Penawaran
													<a href="javascript:;" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#beritaAcaraPenawaran"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
												</div>
												<div class="card-body">
													<?php foreach ($get_berita_acara_penawaran as $key => $value) { ?>
														<a style="text-decoration: none;" href="<?= base_url('berita_acara_penawaran/' . $value['file_berita_acara_penawaran']) ?>" target="_blank">
															<img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4">
															<?= $value['nama_file'] ?>
														</a>
														<a class="text-danger ml-3" href="<?= base_url('panitiajmtm/beranda/delete_berita_acara_hasil_penawaran/' . $value['id_berita_acara_penawaran']) ?>"><i class="fas fa-trash-alt"></i></a> | Tanggal Upload : <?= $value['create_at'] ?>
														<br>
													<?php } ?>

												</div>
											</div>

											<div class="card border-primary mb-3">
												<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Berita Acara Evaluasi Hasil Tender
													<a href="" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger " data-toggle="modal" data-target="#beritaAcaraTender"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
												</div>
												<div class="card-body">
													<?php foreach ($get_berita_acara_tender as $key => $value) { ?>
														<a style="text-decoration: none;" href="<?= base_url('berita_acara_tender/' . $value['file_berita_acara_tender']) ?>" target="_blank">
															<img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4">
															<?= $value['nama_file'] ?>
														</a>
														<a class="text-danger ml-3" href="<?= base_url('panitiajmtm/beranda/delete_berita_acara_hasil_tender/' . $value['id_berita_acara_tender']) ?>"><i class="fas fa-trash-alt"></i></a> | Tanggal Upload : <?= $value['create_at'] ?>
														<br>
													<?php } ?>

												</div>
											</div>

											<div class="card border-primary mb-3">
												<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Informasi Lainnya
													<a href="" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#beritaAcaraLainnya"><i style="color: white;" class="fas fa-upload"></i> UPLOAD</a>
												</div>
												<div class="card-body">
													<?php foreach ($get_berita_acara_lainnya as $key => $value) { ?>
														<a style="text-decoration: none;" href="<?= base_url('berita_acara_lainnya/' . $value['file_berita_acara_lainnya']) ?>" target="_blank">
															<img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4">
															<?= $value['nama_file'] ?>
														</a>
														<a class="text-danger ml-3" href="<?= base_url('panitiajmtm/beranda/delete_berita_acara_hasil_lainnya/' . $value['id_berita_acara_lainnya']) ?>"><i class="fas fa-trash-alt"></i></a> | Tanggal Upload : <?= $value['create_at'] ?>
														<br>
													<?php } ?>
												</div>
											</div>
											<div class="bs-callout bs-callout-info">
												Informasi Lainya Dapat Berupa Berita Acara Lain yang di tujukan kepada semua peserta jika terdapat kendala di luar kendali Panitia Pemilihan
											</div>
										</td>
									</tr>
									<tr>
										<th>Pengumuman</th>
										<td><a href="<?= base_url('panitiajmtm/beranda/pengumumanpemenangtender/' . $paket['id_paket']) ?>" style="color: white;height:20px;" class="badge badge-warning">Pengumuman Pemenang</a></td>
									</tr>
									<tr>
									<tr>
										<th>Surat Penunjukan</th>
										<td>
											<a href="javascript:;" style="text-decoration: none; color:white;" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#uploadSuratPenunjukan"><i class="far fa-paper-plane"></i> KIRIM SURAT PENUNJUKAN</a>
											<?php if ($paket['surat_penunjukan'] == NULL) { ?>

											<?php } else { ?>
												<a class="btn btn-sm btn-info" href="<?= base_url('file_surat_penunjukan/' . $paket['surat_penunjukan']) ?>"><i class="fa fa-eye"></i> Lihat Dokumen</a>
											<?php } ?>

										</td>
									</tr>
									<?php if ($this->session->userdata('id_role') == 1) { ?>
										<tr>
											<th>Pakta Integritas</th>
											<td>
												<div class="row">
													<div class="col-md-6">
														<table>
															<thead>
																<tr>
																	<th>Panitia</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<th><a target="_blank" href="<?= base_url('panitiajmtm/beranda/paktaintegritas_panitia/' . $paket['id_paket']) ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Panitia</a></th>
																</tr>
															</tbody>
														</table>
													</div>
													<div class="col-md-6">
														<table>
															<thead>
																<tr>
																	<th>Penyedia</th>
																</tr>
															</thead>
															<tbody>
																<?php foreach ($vendor_mengikuti as $key => $value) { ?>
																	<tr>
																		<th>
																			<a target="_blank" href="<?= base_url('panitiajmtm/beranda/paktaintegritas_vendor/' . $value['id_mengikuti_paket_vendor'] . '/' . $value['id_mengikuti_vendor']) ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> <?= $value['username_vendor'] ?></a>
																		</th>
																	</tr>
																<?php } ?>
															</tbody>
														</table>
													</div>
												</div>
											</td>
										</tr>
									<?php } else { ?>
									<?php } ?>
								</tbody>
							</table>
							<div>
								<a href="<?= base_url('panitiajmtm/beranda/bataltender/' . $paket['id_paket']) ?>" class="btn btn-danger mb-3">Membatalkan Tender Atau Mengulang Tender</a>

								<!-- 20 september 2022 -->
								<a href="javascript:;" data-toggle="modal" data-target="#upload_dokumen_pembatalan" class="btn btn-warning mb-3 text-white">Upload Dokumen Pembatalan</a>

								<?php if ($this->session->userdata('id_role') == 1 || $this->session->userdata('id_role') == 2) { ?>
								<?php } else { ?>
									<a href="<?= base_url('panitiajmtm/beranda/evaluasitender/' . $paket['id_paket']) ?>" class="btn btn-success ml-2 mb-3">Evaluasi Tender</a>

								<?php } ?>
								<!-- <a href="" class="btn btn-success mb-3">Pemasukan Penawaran Ulang</a> -->
								<!-- <a href="" class="btn btn-primary ml-2 mb-3">Forensik Penawaran Peserta</a> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } else if ($paket['id_kualifikasi'] == 22) { ?>
	<div id="main" class="container">
		<form action="javascript:;" id="form_tidak_lulus_dokumen_tambahan">
			<input type="hidden" name="id_persyaratan_tambahan_lulus">
			<input type="hidden" name="id_vendor_persyaratan_lulus">
			<input type="hidden" name="id_paket_persyaratan_lulus">
			<textarea hidden name="alasan_tidak_lulus_new"></textarea>
		</form>
		<input type="hidden" id="id_paket" value="<?= $paket['id_paket'] ?>">
		<?php if ($this->session->userdata('id_role') == 1 || $this->session->userdata('id_role') == 2) { ?>

		<?php    } else { ?>
			<div class="float-right p-3">
				<a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca_negosiasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_negosiasi" class="badge badge-danger navbar-badge"></span> Pesan Klarifikasi Pemenang </a>
				<?php if (date('Y-m-d H:i', strtotime($penjelasan_tender_eauction['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>
				<?php    } else if (date('Y-m-d H:i', strtotime($penjelasan_tender_eauction['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($penjelasan_tender_eauction['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
					<a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi" class="badge badge-danger navbar-badge"></span> Pesan Penjelasan </a>
				<?php    } else { ?>
					<a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi" class="badge badge-danger navbar-badge"></span> Pesan Penjelasan </a>
				<?php    } ?>
			</div>
		<?php    } ?>
		<nav aria-label="breadcrumb" class="mt-3">
			<ol class="breadcrumb bg-primary">
				<li class="breadcrumb-item"><a style="color: white;" href="<?= base_url('panitiajmtm/beranda/informasitender/' . $paket['id_paket']) ?>">Beranda &raquo; Informasi Tender</a></li>
			</ol>
		</nav>
		<?php if ($this->session->userdata('id_role') == 1 || $this->session->userdata('id_role') == 2) { ?>
		<?php    } else { ?>
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a class="nav-link bg-primary text-white" href="<?= base_url('panitiajmtm/beranda/informasitender/' . $paket['id_paket']) ?>">Informasi Tender</a>
				</li>
				<?php if (date('Y-m-d H:i', strtotime($penjelasan_tender_eauction['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>
				<?php    } else if (date('Y-m-d H:i', strtotime($penjelasan_tender_eauction['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($penjelasan_tender_eauction['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
					<li class=" nav-item">
						<a class="nav-link bg-info text-white active" href="<?= base_url('panitiajmtm/beranda/pertanyaantender/' . $paket['id_paket']) ?>">Penjelasan Tender</a>
					</li>
				<?php    } else { ?>
					<li class=" nav-item">
						<a class="nav-link bg-info text-white active" href="<?= base_url('panitiajmtm/beranda/pertanyaantender/' . $paket['id_paket']) ?>">Penjelasan Tender</a>
					</li>
				<?php    } ?>
				<?php if (date('Y-m-d H:i', strtotime($tahap_jadwal_binding['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>
				<?php    } else if (date('Y-m-d H:i', strtotime($tahap_jadwal_binding['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($tahap_jadwal_binding['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/reverseauctiontender_binding/' . $paket['id_paket']) ?>"> Auction / Bidding Harga</a>
					</li>
				<?php    } else { ?>
					<!-- <li class="nav-item">
																								<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/reverseauctiontender_binding/' . $paket['id_paket']) ?>">Reverse Auction / Bidding Harga</a>
																							</li> -->
				<?php    } ?>
				<?php if ($paket['penetapan_pemenang'] == 1) { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Klarifikasi Pemenang</a>
					</li>
				<?php	} else { ?>

				<?php	}
				?>
			</ul>
		<?php    } ?>
		<div class="tab-content p-2 card">
			<!-- tender -->
			<div class="tab-pane active" id="informasi-tender" role="tabpanel" aria-labelledby="tender-tab">
				<div class="content">
					<?= $this->session->flashdata('berita_acara_penawaran'); ?>
					<?= $this->session->flashdata('berita_acara_tender'); ?>
					<?= $this->session->flashdata('berita_acara_peringkat'); ?>
					<?= $this->session->flashdata('berita_acara_negosiasi'); ?>
					<div class="container-fluid">
						<div style="overflow-x:auto">
							<?= $this->session->flashdata('status_tahap_tender'); ?>
							<table class="table table-bordered">
								<tbody>
									<tr>
										<th>Kode Tender</th>
										<td><?= $paket['kode_tender'] ?> <a target="_blank" href="<?= base_url('panitiajmtm/beranda/summary_tender/' . $paket['id_paket']) ?>" class="float-right badge badge-secondary" style="height: 20px;">Summary Tender</a></td>
									</tr>
									<tr>
										<th>Nama Tender</th>
										<div>
											<td>
												<b>
													<?= $paket['nama_paket'] ?>
												</b>
												<!-- <a href="" class="badge badge-secondary">Detil</a> -->
											</td>
										</div>
									</tr>
									<tr>
										<div>
											<th>Tahap Tender</th>
										</div>

										<td>
											<a href="javascipt:;" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_lihat_tahap"><img src="<?= base_url('assets/img/icon-jadwal.png') ?>" width="25px" alt=""> Lihat Tahap Tender Saat Ini</a>
										</td>
									</tr>
									<tr>
										<th>Jumlah Peserta</th>
										<td> <a href="javascript:;" onclick="lihat_vendor_mengikuti(<?= $paket['id_paket'] ?>)" class="btn btn-sm btn-primary"> <b><?= $jumlah_peserta ?> Peserta</b></a></td>
									</tr>
									<tr>
										<th>Hasil Bidding</th>
										<td> <a href="javascript:;" class="btn btn-sm btn-primary" onclick="lihat_sumary_binding(<?= $paket['id_paket'] ?>)"> <i class="fa fa-file" aria-hidden="true"></i> Lihat Hasil Bidding</a></td>
									</tr>
									<tr>
										<th>Dokumen Lelang</th>
										<td>
											<div class="row">
												<div class="col-md-6">
													<div class="card border-primary mb-3">
														<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Dokumen Lelang
														</div>
														<div class="card-body">
															<table class="table table table-striped">
																<?php foreach ($get_pdf_dokumen_kualifikasi_lelang as $key => $value) { ?>
																	<tr>
																		<td>
																			<a target="_blank" href="<?= base_url('file_dokumen_lelang/' . $value['file_dokumen_lelang']) ?>">
																				<?= $value['nama_dokumen_lelang'] ?>
																				<img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4">
																			</a>
																		</td>
																		<td>
																			<!-- <a class="text-danger ml-3" href="<?= base_url('panitiajmtm/beranda/delete_dokumen_kualifikasi_lelang/' . $value['id_dokumen_lelang_pdf']) ?>"><i class="fas fa-trash-alt"></i></a> -->
																		</td>
																		<!-- <td>
																														Di Kirim : <?= $value['create_file_lelang'] ?>
																													</td> -->
																	</tr>
																<?php    } ?>
															</table>
														</div>
													</div>
												</div>
											</div>
											<?php if (date('Y-m-d H:i', strtotime($tahap_evaluasi_eauction['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

											<?php    } else if (date('Y-m-d H:i', strtotime($tahap_evaluasi_eauction['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($tahap_evaluasi_eauction['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
												<div class="card border-primary mb-3">
													<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
														Persyaratan Tambahan
													</div>
													<div class="card-body">
														<table class="table">
															<tr>
																<th>Nama Persyaratan</th>
																<th>Keterangan</th>
																<th>File</th>
															</tr>
															<?php foreach ($persyaratan_tambahan as $key => $value) { ?>
																<tr>
																	<td><?= $value['nama_persyaratan'] ?></td>
																	<td><?= $value['keterangan'] ?></td>
																	<td>
																		<?php
																		if ($value['file_persyaratan_tambahan'] == NULL) { ?>
																			<p>Tidak ada File</p>
																		<?php } else { ?>
																			<a href="<?= base_url('file_persyaratan_tambahan/' . $value['file_persyaratan_tambahan']) ?>">
																				<img width="30px" src="<?= base_url('assets/img/file-icon.png') ?>" alt=""></a>
																		<?php } ?>
																	</td>
																</tr>
															<?php } ?>
														</table>
													</div>
												</div>
												<div class="card border-primary mb-3">
													<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
														Penyedia Yang Sudah Mengirim Persyaratan Tambahan
													</div>
													<div class="card-body">
														<table class="table">
															<tr>
																<th style="width:50px">Nama Penyedia</th>
																<th>Aksi</th>
																<th>Status</th>
															</tr>
															<?php foreach ($vendor_mengikuti_paket as $key => $value) { ?>
																<tr>
																	<td><?= $value['username_vendor'] ?></td>
																	<td>
																		<a href="javascript:;" onclick="lihat_dokumen_vendor(<?= $value['id_mengikuti_vendor'] ?>)" class="btn btn-sm btn-info">Lihat Dokumen Persyaratan Tambahan <i class="fa fa-eye"></i><i class="fa fa-eye"></i></a>
																		<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_neraca_keuangan(<?= $value['id_mengikuti_vendor'] ?>)">Neraca Keuangan </a>
																		<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_pengalaman(<?= $value['id_mengikuti_vendor'] ?>)">Pengalaman </a>
																	</td>
																	<td>
																		<?php if ($value['status_evaluasi_syarat_tambahan'] == 0) { ?>
																			<label for="" class="badge badge-danger">Dokumen Belum Lengkap</label>
																		<?php } else if ($value['status_evaluasi_syarat_tambahan'] == 1) { ?>
																			<label for="" class="badge badge-success">Sudah Lengkap</label>
																		<?php } else { ?>
																			<label for="" class="badge badge-warning">Belum Di Periksa</label>
																		<?php } ?>
																	</td>
																</tr>
															<?php } ?>
														</table>
													</div>
												</div>
												<!-- 30 juni 2022 -->
												<?php if ($paket['sts_tenaga_ahli'] == 1 || $paket['sts_peralatan'] == 1) { ?>

													<div class="card border-primary mb-3">
														<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
															Peralatan & Tenaga Ahli Penyedia
														</div>
														<div class="card-body">
															<table class="table">
																<?php foreach ($get_vendor as $key => $value) { ?>
																	<tr>
																		<td><?= $value['username_vendor'] ?></td>
																		<td>
																			<a href="javascript:;" onclick="lihat_peralatan(<?= $value['id_mengikuti_vendor'] ?>, <?= $paket['id_paket'] ?>)" class="btn btn-sm btn-info">Peralatan</a>
																			<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_tenaga_ahli(<?= $value['id_mengikuti_vendor'] ?>)">Tenaga Ahli</a>
																		</td>
																	</tr>
																<?php } ?>
															</table>
														</div>
													</div>
												<?php } else { ?>

												<?php }
												?>
												<!-- end 30 juni 2022 -->
											<?php    } else { ?>
												<div class="card border-primary mb-3">
													<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
														Persyaratan Tambahan
													</div>
													<div class="card-body">
														<table class="table">
															<tr>
																<th>Nama Persyaratan</th>
																<th>Keterangan</th>
																<th>File</th>
															</tr>
															<?php foreach ($persyaratan_tambahan as $key => $value) { ?>
																<tr>
																	<td><?= $value['nama_persyaratan'] ?></td>
																	<td><?= $value['keterangan'] ?></td>
																	<td>
																		<?php
																		if ($value['file_persyaratan_tambahan'] == NULL) { ?>
																			<p>Tidak ada File</p>
																		<?php } else { ?>
																			<a href="<?= base_url('file_persyaratan_tambahan/' . $value['file_persyaratan_tambahan']) ?>">
																				<img width="30px" src="<?= base_url('assets/img/file-icon.png') ?>" alt=""></a>
																		<?php } ?>
																	</td>
																</tr>
															<?php } ?>
														</table>
													</div>
												</div>
												<div class="card border-primary mb-3">
													<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
														Penyedia Yang Sudah Mengirim Persyaratan Tambahan
													</div>
													<div class="card-body">
														<table class="table">
															<tr>
																<th style="width:50px">Nama Penyedia</th>
																<th>Aksi</th>
																<th>Status</th>
															</tr>
															<?php foreach ($vendor_mengikuti_paket as $key => $value) { ?>
																<tr>
																	<td><?= $value['username_vendor'] ?></td>
																	<td>
																		<a href="javascript:;" onclick="lihat_dokumen_vendor(<?= $value['id_mengikuti_vendor'] ?>)" class="btn btn-sm btn-info">Lihat Dokumen Persyaratan Tambahan <i class="fa fa-eye"></i><i class="fa fa-eye"></i></a>
																		<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_neraca_keuangan(<?= $value['id_mengikuti_vendor'] ?>)">Neraca Keuangan </a>
																		<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_pengalaman(<?= $value['id_mengikuti_vendor'] ?>)">Pengalaman </a>
																	</td>
																	<td>
																		<?php if ($value['status_evaluasi_syarat_tambahan'] == 0) { ?>
																			<label for="" class="badge badge-danger">Dokumen Belum Lengkap</label>
																		<?php } else if ($value['status_evaluasi_syarat_tambahan'] == 1) { ?>
																			<label for="" class="badge badge-success">Sudah Lengkap</label>
																		<?php } else { ?>
																			<label for="" class="badge badge-warning">Belum Di Periksa</label>
																		<?php } ?>
																	</td>
																</tr>
															<?php } ?>
														</table>
													</div>
												</div>
												<!-- 30 juni 2022 -->

												<!-- tanda -->
												<?php if (date('Y-m-d H:i', strtotime($tahap_evaluasi_eauction['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>
												<?php    } else if (date('Y-m-d H:i', strtotime($tahap_evaluasi_eauction['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($tahap_evaluasi_eauction['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
													<?php if ($paket['sts_tenaga_ahli'] == 1 || $paket['sts_peralatan'] == 1) { ?>
														<div class="card border-primary mb-3">
															<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
																Peralatan & Tenaga Ahli Penyedia
															</div>
															<div class="card-body">
																<table class="table">
																	<tr>
																		<th style="width:50px">Nama Penyedia</th>
																		<th>Aksi</th>
																	</tr>
																	<?php foreach ($get_vendor as $key => $value) { ?>
																		<tr>
																			<td><?= $value['username_vendor'] ?></td>
																			<td>
																				<a href="javascript:;" onclick="lihat_peralatan(<?= $value['id_mengikuti_vendor'] ?>, <?= $paket['id_paket'] ?>)" class="btn btn-sm btn-info">Peralatan</a>
																				<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_tenaga_ahli(<?= $value['id_mengikuti_vendor'] ?>)">Tenaga Ahli</a>
																			</td>
																		</tr>
																	<?php } ?>
																</table>
															</div>
														</div>
													<?php } else { ?>

													<?php } ?>
												<?php    } else { ?>
													<?php if ($paket['sts_tenaga_ahli'] == 1 || $paket['sts_peralatan'] == 1) { ?>
														<div class="card border-primary mb-3">
															<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
																Peralatan & Tenaga Ahli Penyedia
															</div>
															<div class="card-body">
																<table class="table">
																	<tr>
																		<th style="width:50px">Nama Penyedia</th>
																		<th>Aksi</th>
																	</tr>
																	<?php foreach ($get_vendor as $key => $value) { ?>
																		<tr>
																			<td><?= $value['username_vendor'] ?></td>
																			<td>
																				<a href="javascript:;" onclick="lihat_peralatan(<?= $value['id_mengikuti_vendor'] ?>, <?= $paket['id_paket'] ?>)" class="btn btn-sm btn-info">Peralatan</a>
																				<a href="javascript:;" class="btn btn-sm btn-info" onclick="lihat_tenaga_ahli(<?= $value['id_mengikuti_vendor'] ?>)">Tenaga Ahli</a>
																			</td>
																		</tr>
																	<?php } ?>
																</table>
															</div>
														</div>
													<?php } else { ?>
													<?php } ?>
												<?php    } ?>
											<?php    } ?>


											<?php if (date('Y-m-d H:i', strtotime($tahap_penetapan_pemenang_eauction['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>
											<?php    } else if (date('Y-m-d H:i', strtotime($tahap_penetapan_pemenang_eauction['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($tahap_penetapan_pemenang_eauction['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
										<tr>
											<th>Upload Ba Negosiasi</th>
											<td>
												<a href="javascript:;" style="text-decoration: none; color:white;" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ba_negosiasi_auction"><i style="color: white;" class="fas fa-upload"></i> UPLOAD BA NEGOSIASI</a>
												<?php if ($paket['ba_negosiasi_auction'] == NULL) { ?>

												<?php } else { ?>
													<a class="btn btn-sm btn-info" href="<?= base_url('file_undangan_penawaran/' . $paket['ba_negosiasi_auction']) ?>"><i class="fa fa-eye"></i> Lihat Dokumen</a>
												<?php } ?>
											</td>
										</tr>
										<tr>
											<th>Download Ba Negosiasi Vendor</th>
											<td>
												<?php if ($paket['ba_negosiasi_auction_vendor'] == NULL) { ?>

												<?php } else { ?>
													<a class="btn btn-sm btn-info" href="https://jmtm-vms.kinteindo.net/"><i class="fa fa-eye"></i> Lihat Dokumen</a>
												<?php } ?>
											</td>
										</tr>
										<tr>
											<th>Penetapan Pemenang</th>
											<td> <a href="<?= base_url('panitiajmtm/beranda/penetapan_pemenang_auction/' . $paket['id_paket']) ?>" class="btn btn-sm btn-primary"> <i class="fa fa-users" aria-hidden="true"></i> Penetapan Pemenang</a></td>
										</tr>
									<?php    } else { ?>
										<tr>
											<th>Upload Ba Negosiasi</th>
											<td>
												<a href="javascript:;" style="text-decoration: none; color:white;" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ba_negosiasi_auction"><i style="color: white;" class="fas fa-upload"></i> UPLOAD BA NEGOSIASI</a>
												<?php if ($paket['ba_negosiasi_auction'] == NULL) { ?>

												<?php } else { ?>
													<a class="btn btn-sm btn-info" href="<?= base_url('file_undangan_penawaran/' . $paket['ba_negosiasi_auction']) ?>"><i class="fa fa-eye"></i> Lihat Dokumen</a>
												<?php } ?>
											</td>
										</tr>
										<tr>
											<th>Download Ba Negosiasi Vendor</th>
											<td>
												<?php if ($paket['ba_negosiasi_auction_vendor'] == NULL) { ?>

												<?php } else { ?>
													<a class="btn btn-sm btn-info" href="https://jmtm-vms.kinteindo.net/"><i class="fa fa-eye"></i> Lihat Dokumen</a>
												<?php } ?>
											</td>
										</tr>
										<tr>
											<th>Penetapan Pemenang</th>
											<td> <a href="<?= base_url('panitiajmtm/beranda/penetapan_pemenang_auction/' . $paket['id_paket']) ?>" class="btn btn-sm btn-primary"> <i class="fa fa-users" aria-hidden="true"></i> Penetapan Pemenang</a></td>
										</tr>
									<?php    } ?>
									<?php if (date('Y-m-d H:i', strtotime($tahap_pengumuman_pemenang_eauction['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>
									<?php    } else if (date('Y-m-d H:i', strtotime($tahap_pengumuman_pemenang_eauction['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($tahap_pengumuman_pemenang_eauction['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
										<tr>
											<th>Pengumuman</th>
											<td><a href="<?= base_url('panitiajmtm/beranda/pengumumanpemenangtender/' . $paket['id_paket']) ?>" style="color: white;height:20px;" class="badge badge-warning">Pengumuman Pemenang</a></td>
										</tr>
									<?php    } else { ?>
										<tr>
											<th>Pengumuman</th>
											<td><a href="<?= base_url('panitiajmtm/beranda/pengumumanpemenangtender/' . $paket['id_paket']) ?>" style="color: white;height:20px;" class="badge badge-warning">Pengumuman Pemenang</a></td>
										</tr>
									<?php    } ?>
									<tr>
										<?php if ($this->session->userdata('id_role') == 1) { ?>
										<tr>
											<th>Pakta Integritas</th>
											<td>
												<div class="row">
													<div class="col-md-6">
														<table>
															<thead>
																<tr>
																	<th>Panitia</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<th><a target="_blank" href="<?= base_url('panitiajmtm/beranda/paktaintegritas_panitia/' . $paket['id_paket']) ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Panitia</a></th>
																</tr>
															</tbody>
														</table>
													</div>
													<div class="col-md-6">
														<table>
															<thead>
																<tr>
																	<th>Penyedia</th>
																</tr>
															</thead>
															<tbody>
																<?php foreach ($vendor_mengikuti as $key => $value) { ?>
																	<tr>
																		<th>
																			<a target="_blank" href="<?= base_url('panitiajmtm/beranda/paktaintegritas_vendor/' . $value['id_mengikuti_paket_vendor'] . '/' . $value['id_mengikuti_vendor']) ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> <?= $value['username_vendor'] ?></a>
																		</th>
																	</tr>
																<?php } ?>
															</tbody>
														</table>
													</div>
												</div>
											</td>
										</tr>
									<?php } else { ?>
									<?php } ?>
								</tbody>
							</table>
							<div>
								<a href="<?= base_url('panitiajmtm/beranda/bataltender/' . $paket['id_paket']) ?>" class="btn btn-danger mb-3">Membatalkan Tender Atau Mengulang Tender</a>

								<!-- 20 september 2022 -->
								<a href="javascript:;" data-toggle="modal" data-target="#upload_dokumen_pembatalan" class="btn btn-warning mb-3 text-white">Upload Dokumen Pembatalan</a>
								<!-- <a href="" class="btn btn-success mb-3">Pemasukan Penawaran Ulang</a> -->
								<!-- <a href="" class="btn btn-primary ml-2 mb-3">Forensik Penawaran Peserta</a> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } else { ?>
<?php } ?>


<!-- modal edit tahap tender saat Ini -->
<div class="modal fade" id="tahap_tender_saat_ini" tabindex="-1" role="dialog" aria-labelledby="tahap_tender_saat_iniLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tahap_tender_saat_iniLabel">Edit Tahapan Tender Saat Ini</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('panitiajmtm/beranda/update_status_tender') ?>" id="form_tahap_tender_saat_ini" method="post">
					<div class="form-group">
						<div class="form-check">
							<input type="hidden" value="<?= $paket['id_paket'] ?>" name="id_paket">
							<?php if ($paket['status_tahap_tender'] == 2) { ?>
								<input class="form-check-input" type="radio" name="status_tahap_tender" id="exampleRadios1" value="<?= $paket['status_tahap_tender'] ?>" checked>
								<label class="form-check-label" for="exampleRadios1">
									Pemberian Penjelasn
								</label>
							<?php } else { ?>
								<input class="form-check-input" type="radio" name="status_tahap_tender" value="2">
								<label class="form-check-label" for="exampleRadios1">
									Pemberian Penjelasn
								</label>
							<?php } ?>
						</div>
						<div class="form-check">
							<?php if ($paket['status_tahap_tender'] == 3) { ?>
								<input class="form-check-input" type="radio" name="status_tahap_tender" value="<?= $paket['status_tahap_tender'] ?>" checked>
								<label class="form-check-label" for="exampleRadios2">
									Evaluasi Paket
								</label>
							<?php } else { ?>
								<input class="form-check-input" type="radio" name="status_tahap_tender" value="3">
								<label class="form-check-label" for="exampleRadios2">
									Evaluasi Paket
								</label>
							<?php } ?>
						</div>
						<div class="form-check">
							<?php if ($paket['status_tahap_tender'] == 4) { ?>
								<input class="form-check-input" type="radio" name="status_tahap_tender" value="<?= $paket['status_tahap_tender'] ?>" checked>
								<label class="form-check-label" for="exampleRadios3">
									Pengiriman Dokumen Penawaran
								</label>
							<?php } else { ?>
								<input class="form-check-input" type="radio" name="status_tahap_tender" value="4">
								<label class="form-check-label" for="exampleRadios3">
									Pengiriman Dokumen Penawaran
								</label>
							<?php } ?>
						</div>
						<div class="form-check">
							<?php if ($paket['status_tahap_tender'] == 5) { ?>
								<input class="form-check-input" type="radio" name="status_tahap_tender" value="<?= $paket['status_tahap_tender'] ?>" checked>
								<label class="form-check-label" for="exampleRadios4">
									Masa Sanggahan
								</label>
							<?php } else { ?>
								<input class="form-check-input" type="radio" name="status_tahap_tender" value="5">
								<label class="form-check-label" for="exampleRadios4">
									Masa Sanggahan
								</label>
							<?php } ?>
						</div>
						<div class="form-check">
							<?php if ($paket['status_tahap_tender'] == 6) { ?>
								<input class="form-check-input" type="radio" name="status_tahap_tender" value="<?= $paket['status_tahap_tender'] ?>" checked>
								<label class="form-check-label" for="exampleRadios5">
									Penetapan Pemenan
								</label>
							<?php } else { ?>
								<input class="form-check-input" type="radio" name="status_tahap_tender" value="6">
								<label class="form-check-label" for="exampleRadios5">
									Penetapan Pemenang
								</label>
							<?php } ?>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
						<button type="submit" id="btnsave" class="btn btn-success btn-sm">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal_lihat_tahap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitle">Tahap Tender Saat Ini</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="#" id="formData">
					<div style="overflow-x: auto;">
						<table class="table table-hover" style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
							<tr>
								<th>No</th>
								<th>Nama Tahap</th>
								<th>Tanggal Mulai</th>
								<th>Tanggal Selesai</th>
								<th>Diubah Oleh</th>
								<th>Alasan Perubahan</th>
							</tr>
							<?php $i = 1;
							foreach ($jadwal_tahap1 as $jadwal) { ?>
								<tr>
									<td><?= $i++ ?></td>
									<td>
										<?php if (date('Y-m-d H:i', strtotime($jadwal['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>
											<b class="text-secondary"> <?= $jadwal['nama_jadwal_tender'] ?></b>
										<?php    } else if (date('Y-m-d H:i', strtotime($jadwal['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
											<b class="text-danger"> <?= $jadwal['nama_jadwal_tender'] ?> <small class="badge badge-danger">Tahap Sedang Berlangsung</small></b>
										<?php    } else { ?>

											<b class="text-success"> <?= $jadwal['nama_jadwal_tender'] ?> <small class="badge badge-success">Tahap Sudah Selesai <i class="fa fa-check"></i> </small></b>
										<?php    } ?>
									</td>
									<td><?php if ($jadwal['tanggal_mulai_jadwal'] >= date('d-m-Y H:i')) { ?>
											<b><?= date('d F Y H:i', strtotime($jadwal['tanggal_mulai_jadwal']))  ?> </b>
										<?php    } else if ($jadwal['tanggal_selesai_jadwal']  >= date('d-m-Y H:i')) { ?>
											<b><?= date('d F Y H:i', strtotime($jadwal['tanggal_mulai_jadwal']))  ?> </b>
										<?php    } else { ?>

											<b><?= date('d F Y H:i', strtotime($jadwal['tanggal_mulai_jadwal']))  ?> </b>
										<?php    } ?>
									</td>
									<td>
										<?php if ($jadwal['tanggal_mulai_jadwal']  >= date('d-m-Y H:i')) { ?>
											<b><?= date('d F Y H:i', strtotime($jadwal['tanggal_selesai_jadwal'])) ?></b>
										<?php    } else if ($jadwal['tanggal_selesai_jadwal'] >= date('d-m-Y H:i')) { ?>
											<b><?= date('d F Y H:i', strtotime($jadwal['tanggal_selesai_jadwal'])) ?></b>
										<?php    } else { ?>
											<b><?= date('d F Y H:i', strtotime($jadwal['tanggal_selesai_jadwal'])) ?></b>
										<?php    } ?>
									</td>
									<td>
										<?php if ($jadwal['tanggal_mulai_jadwal']  >= date('d-m-Y H:i')) { ?>
											<b><?= $jadwal['user_created'] ?></b>
										<?php    } else if ($jadwal['tanggal_selesai_jadwal'] >= date('d-m-Y H:i')) { ?>
											<b><?= $jadwal['user_created'] ?></b>
										<?php    } else { ?>
											<b><?= $jadwal['user_created'] ?></b>
										<?php    } ?>
									</td>
									<td>
										<?php if ($jadwal['tanggal_mulai_jadwal']  >= date('d-m-Y H:i')) { ?>
											<b><?= $jadwal['alasan_perubahan'] ?></b>
										<?php    } else if ($jadwal['tanggal_selesai_jadwal'] >= date('d-m-Y H:i')) { ?>
											<b><?= $jadwal['alasan_perubahan'] ?></b>
										<?php    } else { ?>
											<b><?= $jadwal['alasan_perubahan'] ?></b>
										<?php    } ?>
									</td>
								<?php } ?>
						</table>
					</div>
					<div>

					</div>
				</form>
			</div>
		</div>
	</div>
</div>


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
				<div class="card contacts_body" style=" height: 500px;
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

<!-- Modal -->
<!-- modal berita cara penawraran -->
<div class="modal fade" id="beritaAcaraPenawaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Berita Acara Evaluasi Hasil Penawaran</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open_multipart('panitiajmtm/beranda/berita_acara_hasil_penawaran') ?>
			<div class="modal-body">
				<input type="text" name="nama_file" placeholder="Nama File" class="form-control mb-3">
				<div class="input-group">
					<input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>">
					<input type="file" class="form-control form-control-sm" aria-describedby="inputGroupFileAddon04" accept=".pdf" name="berita_acara_penawaran" aria-label="Upload">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<button class="btn btn-sm btn-danger" type="submit" id="inputGroupFileAddon04"><img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt=""> UPLOAD</button>

			</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>


<!-- berita acara tender -->
<div class="modal fade" id="beritaAcaraTender" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Berita Acara Evaluasi Hasil Tender</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open_multipart('panitiajmtm/beranda/berita_acara_tender') ?>
			<div class="modal-body">
				<input type="text" name="nama_file" placeholder="Nama File" class="form-control mb-3">
				<div class="input-group">
					<input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>">
					<input type="file" class="form-control form-control-sm" aria-describedby="inputGroupFileAddon04" accept=".pdf" name="berita_acara_tender" aria-label="Upload">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<button class="btn btn-sm btn-danger" type="submit" id="inputGroupFileAddon04"><img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt=""> UPLOAD</button>

			</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>

<!-- berita acara peringkat -->
<div class="modal fade" id="beritaAcaraPeringkat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Berita Acara Evaluasi Peringkat Teknis</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open_multipart('panitiajmtm/beranda/berita_acara_peringkat') ?>
			<div class="modal-body">
				<input type="text" name="nama_file" placeholder="Nama File" class="form-control mb-3">
				<div class="input-group">
					<input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>">
					<input type="file" class="form-control form-control-sm" aria-describedby="inputGroupFileAddon04" accept=".pdf" name="berita_acara_peringkat" aria-label="Upload">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<button class="btn btn-sm btn-danger" type="submit" id="inputGroupFileAddon04"><img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt=""> UPLOAD</button>

			</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>


<!-- berita acara lainnya -->
<div class="modal fade" id="beritaAcaraLainnya" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Informasi Lainnya</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open_multipart('panitiajmtm/beranda/berita_acara_lainnya') ?>
			<div class="modal-body">
				<input type="text" name="nama_file" placeholder="Nama File" class="form-control mb-3">
				<div class="input-group">
					<input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>">
					<input type="file" class="form-control form-control-sm" aria-describedby="inputGroupFileAddon04" accept=".pdf" name="berita_acara_lainnya" aria-label="Upload">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<button class="btn btn-sm btn-danger" type="submit" id="inputGroupFileAddon04"><img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt=""> UPLOAD</button>

			</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>


<div class="modal fade" id="lihat_dokumen_tambahan" tabindex="-1" role="dialog" aria-labelledby="lihat_dokumen_tambahanTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info text-white">
				<h5 class="modal-title" id="modalTitleDokumenVendor"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div style="overflow-x: auto;">
					<table class="table">
						<thead class="text-center">
							<tr>
								<th>Nama Persyaratan Tambahan</th>
								<th>Keterangan Persyaratan Tambahan</th>
								<th>Nama Persyaratan Tambahan</th>
								<th>File Persyaratan Tambahan</th>
								<th>Status Kelengkapan</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody id="table_persyaratan_tambahan" class="text-center">

						</tbody>
					</table>
					<div id="form_tidak_lulus" style="display: none;">
						<form method="POST" action="<?= base_url('panitiajmtm/beranda/flaging_tidak_lulus') ?>">
							<input type="hidden" name="id_vendor_persyaratan">
							<input type="hidden" name="id_paket_persyaratan">
							<label for="">Alasan Tidak Lulus</label>
							<textarea name="alasan_tidak_lulus" required class="form-control"></textarea>
							<br>
							<button class="btn btn-sm btn-danger" type="submit">Kirim Alasan</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- berita acara lainnya -->
<div class="modal fade" id="modal_periksa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info  text-white">
				<h5 class="modal-title" id="exampleModalLabel">Status Dokumen</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<label for="">Apakah Dokumen Ini Sudah Lengkap ??</label>
				<form action="" id="form_lulus_dokumen_tambahan">
					<input type="hidden" name="id_persyaratan_tambahan_lulus">
					<input type="hidden" name="id_vendor_persyaratan_lulus">
					<input type="hidden" name="id_paket_persyaratan_lulus">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" onclick="Dokumenlengkap();"> <i class="fas fa fa-check"></i> Dokumen Lengkap</button>
				<button class="btn btn-sm btn-danger" onclick="DokumenTidaklengkap3();" type="submit" id="inputGroupFileAddon04"><img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt=""> Tidak Lengkap</button>

			</div>
		</div>
	</div>
</div>


<!-- berita acara lainnya -->
<div class="modal fade" id="modal_periksa_revisi_kelulusan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info  text-white">
				<h5 class="modal-title" id="exampleModalLabel">Alasan Mengirim Revisi Dokumen</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" id="form_revisi_dokumen_tambahan">
					<textarea name="alasan_revisi_dokumen_tambahan" class="form-control" id="" cols="30" rows="10"></textarea>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa fa-times"></i> Batal</button>
				<button type="button" class="btn btn-success" onclick="Kirim_alasan_revisi_dokumen();"> <i class="fas fa fa-papper-plane"></i> Kirim Alasan</button>
			</div>
		</div>
	</div>
</div>


<!-- berita acara lainnya -->



<!-- berita acara peringkat -->
<div class="modal fade" id="uploadUndangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Upload Undangan Pembuktian</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('panitiajmtm/beranda/upload_undangan_pembuktian') ?>" enctype="multipart/form-data" method="post">
				<div class="modal-body">
					<div class="input-group">
						<input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>">
						<input type="file" class="form-control form-control-sm" aria-describedby="inputGroupFileAddon04" accept=".pdf" name="dokumen_undangan_pembuktian" aria-label="Upload">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button class="btn btn-sm btn-danger" name="upload" type="submit" id="inputGroupFileAddon04"><img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt=""> UPLOAD</button>

				</div>
			</form>
		</div>
	</div>
</div>
<!-- pengumuman hasil prakualifikasi -->
<div class="modal fade" id="pengumuman_prakualifikasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Upload Undangan Pembuktian</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('panitiajmtm/beranda/upload_pengumuman_prakualifikasi') ?>" enctype="multipart/form-data" method="post">
				<div class="modal-body">
					<div class="input-group">
						<input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>">
						<input type="file" class="form-control form-control-sm" aria-describedby="inputGroupFileAddon04" accept=".pdf" name="dokumen_pengumuman_hasil_prakualifikasi" aria-label="Upload">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button class="btn btn-sm btn-danger" name="upload" type="submit" id="inputGroupFileAddon04"><img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt=""> UPLOAD</button>

				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="uploadSuratPenunjukan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Kirim Surat Penunjukan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('panitiajmtm/beranda/kirim_surat_penunjukan') ?>" enctype="multipart/form-data" method="post">
				<div class="modal-body">
					<div class="input-group">
						<input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>">
						<input type="file" class="form-control form-control-sm" aria-describedby="inputGroupFileAddon04" accept=".pdf" name="surat_penunjukan" aria-label="Upload">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button class="btn btn-sm btn-danger" name="upload" type="submit" id="inputGroupFileAddon04"><img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt=""> UPLOAD</button>

				</div>
			</form>
		</div>
	</div>
</div>


<div class="modal fade" id="modal_tidak_lulus_evaluasi_tambahan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-danger text-white">
				<h5 class="modal-title" id="exampleModalLabel">Alasan Dokumen Tidak Lengkap</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<textarea name="alasan_tidak_lulus_dokumen" class="form-control" id="alasan_tidak_lulus_dokumen" cols="30" rows="10"></textarea>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa fa-times"></i> Batal</button>
				<button type="button" class="btn btn-success" onclick="Test_kirim()"> <i class="fas fa fa-papper-plane"></i> Kirim Alasan</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="modal_lihat_vendor_mengikuti" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-danger text-white">
				<h5 class="modal-title" id="exampleModalLabel">Perserta Tender</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Nama Vendor</th>
							<th>Email Vendor</th>
							<th>Telepon Vendor</th>
						</tr>
					</thead>
					<tbody id="lihat_vendor_mengikuti"></tbody>

				</table>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="tenaga_ahli" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitleTenagaAhli"> </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div style="overflow-x: auto;">
					<table class="table table-hover" id="table_tenaga_ahli_table">
						<thead>
							<tr>
								<th rowspan="2">No</th>
								<th rowspan="2">Nama Lengkap</th>
								<th rowspan="2">Tanggal Lahir</th>
								<th colspan="3" style="text-align: center;">Pendidikan Formal</th>
								<th colspan="3" style="text-align: center;">Sertifikasi Keahlian</th>
								<th rowspan="2">Pengalaman Kerja (Jumlah Tahun)</th>
								<th rowspan="2">Jabatan Saat Ini</th>
								<th rowspan="2">Rencana Jabatan Dalam Pekerjaan Ini</th>
							</tr>
							<tr>
								<th>Program Studi</th>
								<th>Perguruan Tinggi/Sekolah</th>
								<th>Tahun Lulus</th>
								<th>Badan Sertifikasi Asoasi</th>
								<th>Kualifikasi Keahlian</th>
								<th>Tanggal Masa Berlaku</th>
							</tr>
						</thead>

						<tbody id="show_data_tenaga_ahli">

						</tbody>
					</table>
				</div>
			</div>
			<!-- <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div> -->
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="pengalaman" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitlePengalaman"> </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div style="overflow-x: auto;">
					<table class="table table-hover" id="table_pengalaman">
						<thead>
							<tr>
								<th rowspan="3">No</th>
								<th rowspan="3">Nama Pekerjaan</th>
								<th rowspan="3">Pemberi Kerja/Tugas</th>
								<th colspan="3" style="text-align:center">KONTRAK</th>
								<th colspan="2" style="text-align:center">PELAKSANAAN PEKERJAAN</th>
								<th rowspan="2" style="text-align:center">Referensi Kontrak atau Pemberi Kerja/Tugas</th>
							</tr>
							<tr>
								<th rowspan="2">Nomor dan Tanggal</th>
								<th>Nilai Kontrak Terakhir</th>
								<th>Nilai Sharing Badan Usaha bersangkutan</th>
								<th colspan="2" style="text-align:center">Jangka Waktu Pelaksanaan</th>
							</tr>
							<tr>
								<th style="text-align:center">Rp</th>
								<th style="text-align:center">Rp</th>
								<th>Awal Pekerjaan (tgl,bln,thn)</th>
								<th>Akhir Pekerjaan (tgl,bln,thn)</th>
								<th>Ada/Tidak Ada</th>
							</tr>
						</thead>
						<div style="overflow-x: auto;">
							<tbody id="show_data_tenaga_ahli">

							</tbody>
						</div>
					</table>
				</div>
			</div>
			<!-- <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div> -->
		</div>
	</div>
</div>

<div class="modal fade" id="neraca_keuangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitleNeracaKeuangan"> </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div style="overflow-x: auto;">
					<table class="table table-hover" id="table_neraca_keuangan">
						<thead>
							<tr>
								<th>No</th>
								<th>Status Audit</th>
								<th>Bukti</th>
							</tr>
						</thead>

						<tbody>

						</tbody>
					</table>
				</div>
			</div>
			<!-- <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div> -->
		</div>
	</div>
</div>


<!-- 30 juni 2022 -->
<div class="modal fade" id="peralatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitlePeralatan"> </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div style="overflow-x: auto;">
					<table class="table" id="tbl_peralatan_tender">
						<thead>
							<tr>
								<th style="font-size: 12px;" rowspan="2">No</th>
								<th style="font-size: 12px;" rowspan="2">Jenis Peralatan</th>
								<th style="font-size: 12px;" rowspan="2">Merk Dan Tipe</th>
								<th style="font-size: 12px;" rowspan="2">Jumlah Peralatan</th>
								<th style="font-size: 12px;" rowspan="2">Kapasitas Produksi</th>
								<th style="font-size: 12px;" rowspan="2">Volume dan Satuan</th>
								<th style="font-size: 12px;" rowspan="2">Tahun Pembuatan Peralatan</th>
								<th>Status Kepemilikan Peralatan</th>
								<th style="font-size: 12px;" rowspan="2">Data Dukung Kepemilkan Alat</th>
								<th style="font-size: 12px;" rowspan="2">Lokasi Alat Saat ini</th>
								<th style="font-size: 12px;" rowspan="2">Jarak Lokasi Alat Ke Lokasi Pekerjaan (KM)</th>
								<th style="font-size: 12px;" rowspan="2">Bukti Kepemilikan Alat</th>
								<!-- <th style="font-size: 12px;" rowspan="2">Aksi </th> -->
							</tr>
							<tr>
								<th style="font-size: 12px;">Milik Sendiri/Sewa</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
			<!-- <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div> -->
		</div>
	</div>
</div>

<!-- modal tenaga ahli -->
<div class="modal fade" id="tenagaahlimodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitletenagaahli"> </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div style="overflow-x: auto;">
					<table class="table" id="tbl_tenaga_ahli_tender">
						<thead>
							<tr>
								<th rowspan="2">No</th>
								<th rowspan="2">Nama Lengkap dengan Gelar</th>
								<th rowspan="2">Rencana Jabatan dalam Pekerjaan Ini</th>
								<th>Kelahiran</th>
								<th colspan="3">Pendidikan Formal</th>
								<th colspan="3">Sertifikasi Keahlian</th>
								<th colspan="2">Pengalaman</th>
								<th rowspan="2">Aksi</th>
							</tr>
							<tr>
								<th>Tgl/Bln/Thn</th>
								<th>Program Studi</th>
								<th>Perguruan Tinggi/Sekolah</th>
								<th>Tahun Lulus</th>
								<th>Asosiasi (BSA)</th>
								<th>Kualifikasi Keahlian</th>
								<th>Tanggal masa berlaku</th>
								<th>Jumlah Tahun</th>
								<th>Jabatan Terakhir</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
			<!-- <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div> -->
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal_tambah_riwayat" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Riwayat Pekerjaan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="card">
				<div class="container">
					<div class="card-header">
						Data Riwayat Pekerjaan
					</div>
					<div class="card-body">
						<div style="overflow-x: auto;">
							<table class="table" id="tbl_riwayat_pekerjaan">
								<thead>
									<tr>
										<th>No</th>
										<th>Tahun</th>
										<th>Pekrjaan Proyek</th>
										<th>jabatan / Posisi</th>
										<th>Bukti Refrensi Dari Pemberi Kerja</th>
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
</div>


<!-- undangan penawaran 8 september -->
<div class="modal fade" id="undangan_penawaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Upload Undangan Penawaran</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('panitiajmtm/beranda/upload_undangan_penawaran') ?>" enctype="multipart/form-data" method="post">
				<div class="modal-body">
					<div class="input-group">
						<input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>">
						<input type="file" class="form-control form-control-sm" aria-describedby="inputGroupFileAddon04" accept=".pdf" name="undangan_penawaran" aria-label="Upload">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button class="btn btn-sm btn-danger" name="upload" type="submit" id="inputGroupFileAddon04"><img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt=""> UPLOAD</button>

				</div>
			</form>
		</div>
	</div>
</div>


<!-- undangan penawaran 8 september -->
<div class="modal fade" id="upload_dokumen_pembatalan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Upload Dokumen Pembatalan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('panitiajmtm/beranda/upload_dokumen_pembatalan') ?>" enctype="multipart/form-data" method="post">
				<div class="modal-body">
					<div class="input-group">
						<input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>">
						<input type="file" class="form-control form-control-sm" aria-describedby="inputGroupFileAddon04" accept=".pdf" name="dokumen_pembatalan" aria-label="Upload">
					</div>
					<br>

					<?php if (!$paket['dokumen_pembatalan']) { ?>

					<?php } else { ?>
						<label for="">File Yang Sudah Di Upload</label>
						<a style="text-decoration: none;" href="<?= base_url('file_pembatalan_tender/' . $paket['dokumen_pembatalan']) ?>" target="_blank">
							<img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4">
							<?= $value['nama_file'] ?>
						</a>
					<?php } ?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button class="btn btn-sm btn-danger" name="upload" type="submit" id="inputGroupFileAddon04"><img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt=""> UPLOAD</button>

				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modal_lihat_vendor_mengikuti_binding" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-danger text-white">
				<h5 class="modal-title" id="exampleModalLabel">Summary Bidding</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<h3>Tahap Bidding 1</h3>

				<table class="table table-striped">
					<thead>
						<tr>
							<th>Nama Vendor</th>
							<th>Harga Penawaran</th>
							<th>Peringkat</th>
						</tr>
					</thead>
					<tbody id="binding_sumaary_1"></tbody>
				</table>

				<h3>Tahap Bidding 2</h3>

				<table class="table table-striped">
					<thead>
						<tr>
							<th>Nama Vendor</th>
							<th>Harga Penawaran</th>
							<th>Peringkat</th>
						</tr>
					</thead>
					<tbody id="binding_sumaary_2"></tbody>
				</table>

				<h3>Tahap Bidding 3</h3>

				<table class="table table-striped">
					<thead>
						<tr>
							<th>Nama Vendor</th>
							<th>Harga Penawaran</th>
							<th>Peringkat</th>
						</tr>
					</thead>
					<tbody id="binding_sumaary_3"></tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- undangan penawaran 8 september -->
<div class="modal fade" id="ba_negosiasi_auction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Upload BA Negosiasi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('panitiajmtm/beranda/upload_ba_negosiasi_auction') ?>" enctype="multipart/form-data" method="post">
				<div class="modal-body">
					<div class="input-group">
						<input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>">
						<input type="file" class="form-control form-control-sm" aria-describedby="inputGroupFileAddon04" accept=".pdf" name="ba_negosiasi_auction" aria-label="Upload">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button class="btn btn-sm btn-danger" name="upload" type="submit" id="inputGroupFileAddon04"><img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt=""> UPLOAD</button>

				</div>
			</form>
		</div>
	</div>
</div>