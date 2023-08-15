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

<!-- PRAKUALIFIKASI DUA FILE -->
<?php if ($paket['id_kualifikasi'] == 11 || $paket['id_kualifikasi'] == 7 || $paket['id_kualifikasi'] == 6 || $paket['id_kualifikasi'] == 4 || $paket['id_kualifikasi'] == 10 || $paket['id_kualifikasi'] == 17 || $paket['id_kualifikasi'] == 23) { ?>
	<div id="main" class="container">
		<input type="hidden" value="<?= $paket['id_paket'] ?>" id="id_paket">
		<div class="float-right p-3">
			<a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi" class="badge badge-danger navbar-badge"></span> Pesan Penjelasan </a>
			<a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca_negosiasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_negosiasi" class="badge badge-danger navbar-badge"></span> Pesan Negosiasi </a>
			<a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_prakualifikasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_prakualifikasi" class="badge badge-danger navbar-badge"></span> Sanggahan Prakualifikasi</a>
			<a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_akhir"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_akhir" class="badge badge-danger navbar-badge"></span> Sanggahan Akhir</a>
		</div>
		<nav aria-label="breadcrumb" class="mt-3">
			<input type="hidden" id="id_penawaran_teknis" class="form-control" readonly name="id_penawaran_teknis">
			<ol class="breadcrumb bg-primary">
				<li class="breadcrumb-item"><a style="color: white;" href="#">Beranda &raquo; Informasi Tender</a></li>
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
			<?php if ($paket['id_kualifikasi'] == 16 || $paket['id_kualifikasi'] == 15 || $paket['id_kualifikasi'] == 14 || $paket['id_kualifikasi'] == 12 || $paket['id_kualifikasi'] == 18 || $paket['id_kualifikasi'] == 20 || $paket['id_kualifikasi'] == 21) { ?>

			<?php } else { ?>
				<?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_prakualifikasi['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>
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
			<?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>
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
		</ul>
		<div class="tab-content">
			<div class="content">
				<table class="table table-striped">
					<tr>
						<th style="background-color: bisque; width:20%">Nama Peserta</th>
						<td style="width:60%"><?= $vendor['username_vendor'] ?></td>
						<td><a href="<?= base_url('panitiajmtm/beranda/evaluasitender/' . $paket['id_paket']) ?>"><span class="badge badge-secondary"><i class="glyphicon glyphicon-arrow-left"></i> Kembali ke Hasil Evaluasi</span></a> </td>
					</tr>
					<tr>
						<th style="background-color: bisque; width:15%">Penawaran Harga</th>
						<td><?php if ($total_rincian_hps_pdf == null) { ?>
								<label><?= "Rp " . number_format($total_hps_vendor, 2, ",", ".") ?></label>
							<?php  } else { ?>
								<?php if ($vendor['nilai_penawaran'] == null) { ?>
									<label id="harga_biasa"></label>
								<?php } else { ?>
									<label><?= "Rp " . number_format($vendor['nilai_penawaran'], 2, ',', '.')  ?></label>
								<?php } ?>
							<?php } ?>
						</td>
						<td></td>
					</tr>
				</table>


				<ul class="nav nav-tabs" id="myTab" style="margin-top: 50px;">
					<li>
						<a class="nav-link" href="#administrasi">1. Evaluasi Dokumen Administrasi</a>
					</li>
					<?php if (date('Y-m-d H:i', strtotime($get_tahap_keluar_dokumen_kualifikasi['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

					<?php	} else if (date('Y-m-d H:i', strtotime($get_tahap_keluar_dokumen_kualifikasi['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_keluar_dokumen_kualifikasi['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
						<li class="nav-item">
							<a class="nav-link" href="#dokumentambahan">2. Evaluasi Persyaratan Dokumen Tambahan</a>
						</li>
					<?php	} else { ?>
						<li class="nav-item">
							<a class="nav-link" href="#dokumentambahan">2. Evaluasi Persyaratan Dokumen Tambahan</a>
						</li>
					<?php	} ?>


					<?php if (date('Y-m-d H:i', strtotime($get_penetapan_hasil_prakualifkasi['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

					<?php	} else if (date('Y-m-d H:i', strtotime($get_penetapan_hasil_prakualifkasi['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_penetapan_hasil_prakualifkasi['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
						<li class="nav-item">
							<a class="nav-link" href="#nilaiprakualifikasi">3. Evaluasi Nilai Prakualifikasi</a>
						</li>
					<?php	} else { ?>
						<li class="nav-item">
							<a class="nav-link" href="#nilaiprakualifikasi">3. Evaluasi Nilai Prakualifikasi</a>
						</li>
					<?php	} ?>


					<?php if ($paket['id_kualifikasi'] == 7 || $paket['id_kualifikasi'] == 11 || $paket['id_kualifikasi'] == 17) { ?>
						<?php if (date('Y-m-d H:i', strtotime($get_untuk_tahap_penetapan_peringkat_teknisku_seleksi['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

						<?php	} else if (date('Y-m-d H:i', strtotime($get_untuk_tahap_penetapan_peringkat_teknisku_seleksi['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_untuk_tahap_penetapan_peringkat_teknisku_seleksi['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
							<li class="nav-item">
								<a class="nav-link" href="#teknis">4. Evaluasi Teknis Penawaran</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#peringkat">5. Peringkat Teknis</a>
							</li>
						<?php	} else { ?>

							<li class="nav-item">
								<a class="nav-link" href="#teknis">4. Evaluasi Teknis Penawaran</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#peringkat">5. Peringkat Teknis</a>
							</li>
						<?php	} ?>
					<?php	} else { ?>
						<?php if (date('Y-m-d H:i', strtotime($get_untuk_tahap_peringkat_teknisku['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

						<?php	} else if (date('Y-m-d H:i', strtotime($get_untuk_tahap_peringkat_teknisku['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_untuk_tahap_peringkat_teknisku['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
							<li class="nav-item">
								<a class="nav-link" href="#teknis">4. Evaluasi Teknis Penawaran</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#peringkat">5. Peringkat Teknis</a>
							</li>
						<?php	} else { ?>

							<li class="nav-item">
								<a class="nav-link" href="#teknis">4. Evaluasi Teknis Penawaran</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#peringkat">5. Peringkat Teknis</a>
							</li>
						<?php	} ?>
					<?php	} ?>

					<?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

					<?php	} else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
						<li class="nav-item">
							<a class="nav-link" href="#harga">6. Evaluasi Harga Terkoreksi</a>
						</li>
					<?php	} else { ?>
						<li class="nav-item">
							<a class="nav-link" href="#harga">6. Evaluasi Harga Terkoreksi</a>
						</li>
					<?php	} ?>

					<?php if (date('Y-m-d H:i', strtotime($get_tahap_penetapan_pemenang['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>
						<li class="nav-item">
							<a class="nav-link" href="#negosiasi">7. Negosiasi Harga</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#evaluasinilaiakhir">8. Evaluasi Nilai Akhir</a>
						</li>


					<?php	} else if (date('Y-m-d H:i', strtotime($get_tahap_penetapan_pemenang['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_penetapan_pemenang['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
						<li class="nav-item">
							<a class="nav-link" href="#negosiasi">7. Negosiasi Harga</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#evaluasinilaiakhir">8. Evaluasi Nilai Akhir</a>
						</li>
					<?php	} else { ?>
						<li class="nav-item">
							<a class="nav-link" href="#negosiasi">7. Negosiasi Harga</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#evaluasinilaiakhir">8. Evaluasi Nilai Akhir</a>
						</li>
					<?php	} ?>


					<!-- <li class="nav-item">
						<a class="nav-link" href="#kualifikasi">Kirim Undangan Pembuktian</a>
					</li> -->

					<!-- <li class="nav-item">
						<a class="nav-link" href="#pembuktian">Pembuktian Kualifikasi</a>
					</li> -->
				</ul>

				<div class="tab-content">
					<div class="tab-pane active" id="administrasi">
						<div class="content">
							<?= $this->session->flashdata('message'); ?>
							<div class="card mt-4">
								<div class="card-header bg-primary text-white">
									Evaluasi Dokumen Administrasi,Teknis & Kualifikasi
								</div>
								<form action="<?= base_url('panitiajmtm/beranda/save_evaluasi_administrasi') ?>" method="POST">
									<input type="hidden" id="id_vendor" value="<?= $vendor['id_mengikuti_vendor'] ?>" name="id_vendor">
									<input type="hidden" id="id_paket_evaluasi" value="<?= $paket['id_paket'] ?>" name="id_paket">
									<div class="card-body">
										<div style="overflow-x: auto;">
											<table class=" table table-hover">
												<thead>
													<tr>
														<th>Status Dokumen Persyaratan Dari Vms</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Dokumen Sesuai Vms/Dokumen Lengkap</td>
														<td><a href="javascript:;" class="btn btn-sm btn-success"> <i class="fas fa fa-check"></i></a></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<br>
								</form>
								<form action="" id="simpan_evaluasi_nilai_administrasi">
									<input type="hidden" class="form-control" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
									<input type="hidden" class="form-control" name="id_paket" value="<?= $paket['id_paket'] ?>">
								</form><br>
							</div>
						</div>
					</div>

					<div class="tab-pane fade" id="teknis">
						<div class="content">
							<center>
								<form action="" id="nilai_seluruh_teknis">
									<label for="">Nilai Teknis Keseluruhan</label>
									<div class="col-md-2">
										<input type="number" value="<?= $vendor['nilai_teknis'] ?>" id="validasi_nilai_teknis_keseluruhan" name="nilai_teknis_vendor" min="1" max="100" required class="form-control">
										<input type="hidden" id="id_vendor" class="form-control" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
										<input type="hidden" id="id_paket" class="form-control" name="id_paket" value="<?= $paket['id_paket'] ?>"><br>
										<i class="text-danger">Nilai Tidak Boleh Lebih 100 !!!</i>
									</div>
									<!-- <table class=" table table-striped" id="tbl_evaluasi_teknis">
									<thead>
										<tr>
											<th>No</th>
											<th style=" width: 60%;">Evaluasi Teknis</th>
											<th>Nilai Teknis</th>
										</tr>
									</thead>
									<tbody>

									</tbody>
								</table>
								<div class="form-group">
									<label for="exampleFormControlTextarea1">Alasan Tidak Lulus</label>
									<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
								</div> -->
								</form><br>
								<button type="button" onclick="save_nilai_seluruh_teknis()" id="btnSave" style="width: 200px;" class="btn btn-success"><i class="fa fa-save"></i>
									Simpan
								</button>
							</center>
						</div>
					</div>

					<div class="tab-pane fade" id="nilaiprakualifikasi">
						<div class="content">
							<center>
								<form action="" id="nilai_seluruh_prakualifikasi">
									<label for="">Nilai Prakualifikasi</label>
									<div class="col-md-2">
										<input type="text" value="<?= $vendor['nilai_prakualifikasi'] ?>" id="validasi_nilai_prakualifikasi" name="nilai_prakualifikasi" required class="form-control">
										<input type="hidden" id="id_vendor" class="form-control" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
										<input type="hidden" id="id_paket" class="form-control" name="id_paket" value="<?= $paket['id_paket'] ?>"><br>
										<i class="text-danger">Nilai Tidak Boleh Lebih 100 !!!</i>
									</div>
								</form><br>
								<button type="button" onclick="save_nilai_seluruh_prakualifikasi()" id="btnSave" style="width: 200px;" class="btn btn-success"><i class="fa fa-save"></i>
									Simpan
								</button>
							</center>
						</div>
					</div>

					<div class="tab-pane fade" id="harga">
						<div class="content p-5">
							<form action="javascript:;" id="nilai_terkoreksi">
								<input type="hidden" class="form-control" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
								<input type="hidden" class="form-control" name="id_paket" value="<?= $paket['id_paket'] ?>">
								<table class=" table">
									<tr>
										<td>
											<h6>Harga Penawaran (Rp.)</h6>
										</td>
										<td><?php if ($total_rincian_hps_pdf == null) { ?>
												<input type="text" class="form-control" value="<?= "Rp " . number_format($total_hps_vendor, 2, ",", ".") ?>" readonly>
											<?php  } else { ?>
												<?php if ($vendor['nilai_penawaran'] == null) { ?>
													<input type="text" name="nilai_terkoreksi" class="form-control" id="harga_biasa" readonly value="RP.0">
												<?php } else { ?>
													<input type="text" name="nilai_terkoreksi" class="form-control" id="harga_biasa" readonly value="<?= "Rp " . number_format($vendor['nilai_penawaran'], 2, ',', '.')  ?>">
												<?php } ?>
											<?php } ?>
										</td>
									</tr>
									<tr>
										<td>
											<h6>Harga Terkoreksi (Rp.)</h6>
										</td>
										<td>
											<input type="text" value="<?= $vendor['nilai_terkoreksi'] ?>" name="nilai_terkoreksi" class="form-control" id="harga_biasa_terkoreksi" value="<?= $vendor['nilai_terkoreksi'] ?>">
											<input type="text" disabled class="float-right form-control form-control-sm mt-1" style="width: 400px;" id="tanpa-rupiah_terkoreksi">
										</td>
									</tr>
								</table>
							</form>
							<button type="button" onclick="simpan_harga_terkoreksi()" id="btnSave" style="width: 200px;" class="btn btn-success"><i class="fa fa-save"></i>
								Simpan
							</button>
						</div>
					</div>

					<div class="tab-pane fade" id="peringkat">
						<div class="content p-5">
							<center>
								<form action="" id="nilai_pringkat_teknis">
									<label for="">Nilai Peringkat Teknis</label>
									<div class="col-md-2">
										<input type="number" value="<?= $vendor['nilai_pringkat_teknis'] ?>" id="validasi_nilai_pringkat_teknis" name="nilai_pringkat_teknis" min="1" max="100" required class="form-control">
										<input type="hidden" id="id_vendor" class="form-control" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
										<input type="hidden" id="id_paket" class="form-control" name="id_paket" value="<?= $paket['id_paket'] ?>"><br>
										<!-- <i class="text-danger">Nilai Tidak Boleh Lebih 100 !!!</i> -->
									</div>

								</form><br>
								<button type="button" onclick="save_nilai_pringkat_teknis()" id="btnSave" style="width: 200px;" class="btn btn-success"><i class="fa fa-save"></i>
									Simpan
								</button>
							</center>
						</div>
					</div>

					<div class="tab-pane fade" id="kualifikasi">
						<div class="content">
							<div class="card">
								<div class="card-header bg-primary text-white">KIRIM UNDANGAN PEMBUKTIAN</div>
								<div class="card-body">
									<form action="<?= base_url('panitiajmtm/beranda/simpan_undangan') ?>" method="POST">
										<h3 style="text-align:center">ISI UNDANGAN PEMBUKTIAN</h3>
										<i>
											Kepada Yth.
											<br>
											<b> <?= $vendor['username_vendor'] ?></b>
											<br>
											di
											<br>
											Tempat
										</i>

										<i>
											Kami mengundang Anda untuk menghadiri pembuktian kualifikasi terhadap tender
											<br>
											Kode tender : <b><?= $paket['kode_tender'] ?></b>,
											<br>
											Nama Tender: <b><?= $paket['nama_paket'] ?></b>,
											<br>
											dengan infromasi terkait pembuktian sebagai berikut:
											<br>
											<table>
												<input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>">
												<input type="hidden" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
												<tr>
													<th width="200px">Waktu Mulai</th>
													<th> <input type="input" style="width: 300px;" class="form-control form-control-sm" name="waktu_mulai" id="tanggal_mulai_pascakualifikasi"></th>
												</tr>
												<tr>
													<th width="200px">Waktu Selesai</th>
													<th> <input type="input" style="width: 300px;" class="form-control  form-control-sm" name="waktu_selesai" id="tanggal_selesai_pascakualifikasi"></th>
												</tr>
												<br>
												<tr>
													<th>Tempat</th>
													<th><textarea name="tempat" style="width: 300px;" class="form-control form-control-sm"></textarea></th>
												</tr>
												<tr>
													<th>Yang harus dibawa</th>
													<th><textarea name="yang_harus_dibawa" style="width: 300px;" class="form-control form-control-sm"></textarea></th>
												</tr>
												<tr>
													<th>Yang harus hadir</th>
													<th><textarea name="yang_harus_hadir" style="width: 300px;" class="form-control form-control-sm"></textarea></th>
												</tr>
											</table>
											<br>
											<br>
											<br>
											<br>
											Demikian penjelasan kami, atas perhatian dan kerjasama yang baik diucapkan terima kasih.
											<br>
											<br>
											Hormat kami,
										</i>
										<div style="margin-left: 200px;" class="mt-3">
											<button type="submit" style="width:300px" class="btn btn-success"><i class="fa fa-save"></i>
												Simpan Undangan
											</button>
										</div>
									</form>


									<table id="konten_undangan" class="table table-striped" style="margin-top: 20px">
										<thead>
											<?php foreach ($get_all_undangan as $key => $value) { ?>
												<tr>
													<th>Nama Undangan</th>
													<th>Detail Undangan</th>
												</tr>
												<tr>
													<td>UNDANGAN PEMBUKTIAN</td>
													<td> <i>
															Kepada Yth.
															<br>
															<b> <?= $vendor['username_vendor'] ?></b>
															<br>
															di
															<br>
															Tempat
														</i>

														<i>
															Kami mengundang Anda untuk menghadiri pembuktian kualifikasi terhadap tender
															<br>
															Kode tender : <b><?= $paket['kode_tender'] ?></b>,
															<br>
															Nama Tender: <b><?= $paket['nama_paket'] ?></b>,
															<br>
															dengan infromasi terkait pembuktian sebagai berikut:
															<br>
															<br>
															Waktu Mulai : <b><?= $value['waktu_mulai'] ?></b> S/D <b><?= $value['waktu_selesai'] ?></b>,
															<br>
															Tempat : <b><?= $value['tempat'] ?></b>,
															<br>
															Yang harus dibawa: <b><?= $value['yang_harus_dibawa'] ?></b>,
															<br>
															Yang harus hadir: <b><?= $value['yang_harus_hadir'] ?></b>,
													</td>
												</tr>
											<?php	 } ?>

										</thead>
										<tbody></tbody>
									</table>
								</div>
							</div>
						</div>
					</div>


					<div class="tab-pane fade" id="dokumentambahan">
						<div class="content">
							<div class="card mt-3">
								<div class="card-header bg-primary text-white"">
										Evaluasi Persyaratan Dokumen Tambahan
									</div>
									<div class=" card-body">
									<table class="table">
										<tr>
											<th>Nama Persyaratan Tambahan</th>
											<th>Status</th>
										</tr>
										<?php foreach ($cek_dokumen_tambahan as $key => $value) { ?>
											<tr>
												<td><?= $value['nama_persyaratan_tambahan'] ?></td>
												<td><?php if ($value['status_lengkap'] == 'tidak lulus') { ?>
														<label for="" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></label>
													<?php	} else if ($value['status_lengkap'] == 'lulus') { ?>
														<label for="" class="btn btn-sm btn-success"><i class="fa fa-check"></i></label>
													<?php } else { ?>
														<label for="" class="btn btn-sm btn-warning">Dokumen Belum Di Periksa</label>
													<?php } ?>
												</td>
											</tr>
										<?php } ?>
									</table>

								</div>
							</div>
							<form action="" id="form_kelulusan">
								<input type="hidden" name="vendor_id" value="<?= $vendor['id_vendor'] ?>">
								<input type="hidden" name="paket_id" value="<?= $paket['id_paket'] ?>">
							</form>
							<?php if ($vendor['status_evaluasi_syarat_tambahan'] == null) { ?>
								<center>
									<div class="row mt-5">
										<div class="col-md-6">
											<a href="javascript:;" onclick="tidak_lulus_kualifikasi()" class="btn btn-sm btn-danger"><i class="fas fa fa-times"></i> Tidak Lulus Persyaratan Kualifikasi</a>
										</div>
										<div class="col-md-6">
											<a href="javascript:;" onclick="lulus_kualifikasi()" class="btn btn-sm btn-success"><i class="fas fa fa-check"></i> Lulus Persyaratan Kualifikasi</a>
										</div>
									</div>
								</center>
							<?php	} else { ?>
								<center>
									<div class="row mt-5">
										<div class="col-md-12">
											<a href="javascript:;" onclick="batal_dievaluasi_kualifikasi_dan_batal()" class="btn btn-sm btn-danger"><i class="fas fa fa-sync"></i> Batal Evaluasi</a>
										</div>
									</div>
								</center>
							<?php	} ?>

						</div>
					</div>

					<div class="tab-pane fade" id="evaluasipersentasi">
						<div class="content">
							<center>
								<form action="" id="nilai_metodologi">
									<label for="">Nilai Evaluasi Persentasi Metodelogi</label>
									<div class="col-md-2">
										<input type="number" name="nilai_metodelogi" value="<?= $vendor['nilai_metodelogi'] ?>" min="1" max="100" required class="form-control">
										<input type="hidden" id="id_vendor" class="form-control" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
										<input type="hidden" id="id_paket" class="form-control" name="id_paket" value="<?= $paket['id_paket'] ?>"><br>
										<i class="text-danger">Nilai Tidak Boleh Lebih 100 !!!</i>
									</div>
								</form><br>
								<button type="button" onclick="save_nilai_metodelogi()" id="btnSave" style="width: 200px;" class="btn btn-success"><i class="fa fa-save"></i>
									Simpan
								</button>
							</center>
						</div>
					</div>

					<div class="tab-pane fade" id="evaluasinilaiakhir">
						<div class="content">
							<center>
								<form action="" id="nilai_akhir">
									<label for="">Evaluasi Nilai Akhir</label>
									<div class="col-md-2">
										<input type="number" id="validasi_nilai_akhir" name="nilai_akhir" value="<?= $vendor['nilai_akhir'] ?>" min="1" max="100" required class="form-control">
										<input type="hidden" id="id_vendor" class="form-control" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
										<input type="hidden" id="id_paket" class="form-control" name="id_paket" value="<?= $paket['id_paket'] ?>"><br>
										<i class="text-danger">Nilai Tidak Boleh Lebih 100 !!!</i>
									</div>
								</form><br>
								<button type="button" onclick="save_nilai_akhir()" id="btnSave" style="width: 200px;" class="btn btn-success"><i class="fa fa-save"></i>
									Simpan
								</button>
							</center>
						</div>
					</div>
					<div class="tab-pane fade" id="negosiasi">
						<div class="content p-5">
							<form action="javascript:;" id="nilai_negosiasi">
								<input type="hidden" class="form-control" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
								<input type="hidden" class="form-control" name="id_paket" value="<?= $paket['id_paket'] ?>">
								<table class=" table">
									<tr>
										<td>
											<h6>Harga Penawaran (Rp.)</h6>
										</td>
										<td><?php if ($total_rincian_hps_pdf == null) { ?>
												<input type="text" class="form-control" value="<?= "Rp " . number_format($total_hps_vendor, 2, ",", ".") ?>" readonly>
											<?php  } else { ?>
												<?php if ($vendor['nilai_penawaran'] == null) { ?>
													<input type="text" name="nilai_terkoreksi" class="form-control" id="harga_biasa" readonly value="RP.0">
												<?php } else { ?>
													<input type="text" name="nilai_terkoreksi" class="form-control" id="harga_biasa" readonly value="<?= "Rp " . number_format($vendor['nilai_penawaran'], 2, ',', '.')  ?>">
												<?php } ?>
											<?php } ?>
										</td>
									</tr>
									<tr>
										<td>
											<h6>Harga Negosiasi (Rp.)</h6>
										</td>
										<input type="hidden" name="nilai_penawaran" value="<?= $total_hps_vendor ?>">
										<td><input type="text" name="negosiasi" class="form-control" id="harga_biasa_negosiasi" value="<?= $vendor['negosiasi'] ?>">
											<input type="text" disabled class="float-right form-control form-control-sm mt-1" style="width: 400px;" id="tanpa-rupiah-negosiasi">
										</td>
									</tr>
								</table>
							</form>
							<button type="button" onclick="simpan_harga_negosiasi()" id="btnSave" style="width: 200px;" class="btn btn-success"><i class="fa fa-save"></i>
								Simpan
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php } else if ($paket['id_kualifikasi'] == 8 || $paket['id_kualifikasi'] == 13 || $paket['id_kualifikasi'] == 15) { ?>
	<!-- PRAKUALIFIKASI SATU FILE -->
	<div id="main" class="container">
		<nav aria-label="breadcrumb" class="mt-3">
			<input type="hidden" id="id_penawaran_teknis" class="form-control" readonly name="id_penawaran_teknis">
			<input type="hidden" value="<?= $paket['id_paket'] ?>" id="id_paket">
			<div class="float-right p-3">
				<a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi" class="badge badge-danger navbar-badge"></span> Pesan Penjelasan </a>
				<a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca_negosiasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_negosiasi" class="badge badge-danger navbar-badge"></span> Pesan Negosiasi </a>
				<a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_prakualifikasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_prakualifikasi" class="badge badge-danger navbar-badge"></span> Sanggahan Prakualifikasi</a>
				<a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_akhir"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_akhir" class="badge badge-danger navbar-badge"></span> Sanggahan Akhir</a>
			</div>
			<ol class="breadcrumb bg-primary">
				<li class="breadcrumb-item"><a style="color: white;" href="#">Beranda &raquo; Informasi Tender</a></li>
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
			<?php if ($paket['id_kualifikasi'] == 16 ||  $paket['id_kualifikasi'] == 14 || $paket['id_kualifikasi'] == 12 || $paket['id_kualifikasi'] == 18 || $paket['id_kualifikasi'] == 20 || $paket['id_kualifikasi'] == 21) { ?>

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
			<?php if (date('Y-m-d H:i', strtotime($get_tahap_prakualfiikasi_satu_file_penetapan['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>
			<?php	} else if (date('Y-m-d H:i', strtotime($get_tahap_prakualfiikasi_satu_file_penetapan['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_prakualfiikasi_satu_file_penetapan['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Negosiasi</a>
				</li>
			<?php	} else { ?>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Negosiasi</a>
				</li>
			<?php	} ?>
			<?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>
			<?php	} else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $paket['id_paket']) ?>">Sangahan</a>
				</li>
			<?php	} else { ?>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $paket['id_paket']) ?>">Sangahan</a>
				</li>
			<?php	} ?>
		</ul>
		<div class="tab-content">
			<div class="content">
				<table class="table table-striped">
					<tr>
						<th style="background-color: bisque; width:20%">Nama Peserta</th>
						<td style="width:60%"><?= $vendor['username_vendor'] ?></td>
						<td><a href="<?= base_url('panitiajmtm/beranda/evaluasitender/' . $paket['id_paket']) ?>"><span class="badge badge-secondary"><i class="glyphicon glyphicon-arrow-left"></i> Kembali ke Hasil Evaluasi</span></a> </td>
					</tr>

					<tr>
						<th style="background-color: bisque; width:15%">Penawaran Harga</th>
						<td><?php if ($total_rincian_hps_pdf == null) { ?>
								<label><?= "Rp " . number_format($total_hps_vendor, 2, ",", ".") ?></label>
							<?php  } else { ?>
								<?php if ($vendor['nilai_penawaran'] == null) { ?>
									<label id="harga_biasa"></label>
								<?php } else { ?>
									<label><?= "Rp " . number_format($vendor['nilai_penawaran'], 2, ',', '.')  ?></label>
								<?php } ?>
							<?php } ?>
						</td>
						<td></td>
					</tr>
				</table>


				<ul class="nav nav-tabs" id="myTab" style="margin-top: 50px;">
					<li>
						<a class="nav-link" href="#administrasi">1. Evaluasi Dokumen Administrasi</a>
					</li>

					<?php if (date('Y-m-d H:i', strtotime($get_tahap_keluar_dokumen_kualifikasi['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

					<?php	} else if (date('Y-m-d H:i', strtotime($get_tahap_keluar_dokumen_kualifikasi['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_keluar_dokumen_kualifikasi['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
						<li class="nav-item">
							<a class="nav-link" href="#dokumentambahan">2. Evaluasi Persyaratan Dokumen Tambahan</a>
						</li>
					<?php	} else { ?>
						<li class="nav-item">
							<a class="nav-link" href="#dokumentambahan">2. Evaluasi Persyaratan Dokumen Tambahan</a>
						</li>
					<?php	} ?>


					<?php if (date('Y-m-d H:i', strtotime($get_penetapan_hasil_prakualifkasi['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

					<?php	} else if (date('Y-m-d H:i', strtotime($get_penetapan_hasil_prakualifkasi['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_penetapan_hasil_prakualifkasi['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
						<li class="nav-item">
							<a class="nav-link" href="#nilaiprakualifikasi">3. Evaluasi Nilai Prakualifikasi</a>
						</li>
					<?php	} else { ?>
						<li class="nav-item">
							<a class="nav-link" href="#nilaiprakualifikasi">3. Evaluasi Nilai Prakualifikasi</a>
						</li>
					<?php	} ?>



					<?php if (date('Y-m-d H:i', strtotime($evaluasi_penawaran_satu_file_prakualfikasi['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

					<?php	} else if (date('Y-m-d H:i', strtotime($evaluasi_penawaran_satu_file_prakualfikasi['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($evaluasi_penawaran_satu_file_prakualfikasi['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
						<li class="nav-item">
							<a class="nav-link" href="#teknis">4. Evaluasi Teknis Penawaran</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#peringkat">5. Peringkat Teknis</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#harga">6. Evaluasi Harga Terkoreksi</a>
						</li>
					<?php	} else { ?>

						<li class="nav-item">
							<a class="nav-link" href="#teknis">4. Evaluasi Teknis Penawaran</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#peringkat">5. Peringkat Teknis</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#harga">6. Evaluasi Harga Terkoreksi</a>
						</li>
					<?php	} ?>

					<?php if (date('Y-m-d H:i', strtotime($get_tahap_penetapan_pemenang['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

					<?php	} else if (date('Y-m-d H:i', strtotime($get_tahap_penetapan_pemenang['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_penetapan_pemenang['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
						<li class="nav-item">
							<a class="nav-link" href="#negosiasi">7. Negosiasi Harga</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#evaluasinilaiakhir">8. Evaluasi Nilai Akhir</a>
						</li>
					<?php	} else { ?>
						<li class="nav-item">
							<a class="nav-link" href="#negosiasi">7. Negosiasi Harga</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#evaluasinilaiakhir">8. Evaluasi Nilai Akhir</a>
						</li>
					<?php	} ?>
				</ul>

				<div class="tab-content">
					<div class="tab-pane active" id="administrasi">
						<div class="content">
							<?= $this->session->flashdata('message'); ?>
							<div class="card mt-4">
								<div class="card-header bg-primary text-white">
									Evaluasi Dokumen Administrasi,Teknis & Kualifikasi
								</div>
								<form action="<?= base_url('panitiajmtm/beranda/save_evaluasi_administrasi') ?>" method="POST">
									<input type="hidden" id="id_vendor" value="<?= $vendor['id_mengikuti_vendor'] ?>" name="id_vendor">
									<input type="hidden" id="id_paket_evaluasi" value="<?= $paket['id_paket'] ?>" name="id_paket">
									<div class="card-body">
										<div style="overflow-x: auto;">
											<table class=" table table-hover">
												<thead>
													<tr>
														<th>Status Dokumen Persyaratan Dari Vms</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Dokumen Sesuai Vms/Dokumen Lengkap</td>
														<td><a href="javascript:;" class="btn btn-sm btn-success"> <i class="fas fa fa-check"></i></a></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<br>
								</form>
								<form action="" id="simpan_evaluasi_nilai_administrasi">
									<input type="hidden" class="form-control" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
									<input type="hidden" class="form-control" name="id_paket" value="<?= $paket['id_paket'] ?>">
								</form><br>
							</div>
						</div>
					</div>

					<div class="tab-pane fade" id="teknis">
						<div class="content">
							<center>
								<form action="" id="nilai_seluruh_teknis">
									<label for="">Nilai Teknis Keseluruhan</label>
									<div class="col-md-2">
										<input type="number" id="validasi_nilai_teknis_keseluruhan" value="<?= $vendor['nilai_teknis'] ?>" name="nilai_teknis_vendor" min="1" max="100" required class="form-control">
										<input type="hidden" id="id_vendor" class="form-control" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
										<input type="hidden" id="id_paket" class="form-control" name="id_paket" value="<?= $paket['id_paket'] ?>"><br>
										<i class="text-danger">Nilai Tidak Boleh Lebih 100 !!!</i>
									</div>
								</form><br>
								<button type="button" onclick="save_nilai_seluruh_teknis()" id="btnSave" style="width: 200px;" class="btn btn-success"><i class="fa fa-save"></i>
									Simpan
								</button>
							</center>
						</div>
					</div>

					<div class="tab-pane fade" id="nilaiprakualifikasi">
						<div class="content">
							<center>
								<form action="" id="nilai_seluruh_prakualifikasi">
									<label for="">Nilai Prakualifikasi</label>
									<div class="col-md-2">
										<input type="text" id="validasi_nilai_prakualifikasi" value="<?= $vendor['nilai_prakualifikasi'] ?>" name="nilai_prakualifikasi" required class="form-control">
										<input type="hidden" id="id_vendor" class="form-control" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
										<input type="hidden" id="id_paket" class="form-control" name="id_paket" value="<?= $paket['id_paket'] ?>"><br>
										<i class="text-danger">Nilai Tidak Boleh Lebih 100 !!!</i>
									</div>
								</form><br>
								<button type="button" onclick="save_nilai_seluruh_prakualifikasi()" id="btnSave" style="width: 200px;" class="btn btn-success"><i class="fa fa-save"></i>
									Simpan
								</button>
							</center>
						</div>
					</div>

					<div class="tab-pane fade" id="harga">
						<div class="content p-5">
							<form action="javascript:;" id="nilai_terkoreksi">
								<input type="hidden" class="form-control" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
								<input type="hidden" class="form-control" name="id_paket" value="<?= $paket['id_paket'] ?>">
								<table class=" table">
									<tr>
										<td>
											<h6>Harga Penawaran (Rp.)</h6>
										</td>
										<td><?php if ($total_rincian_hps_pdf == null) { ?>
												<input type="text" class="form-control" value="<?= "Rp " . number_format($total_hps_vendor, 2, ",", ".") ?>" readonly>
											<?php  } else { ?>
												<?php if ($vendor['nilai_penawaran'] == null) { ?>
													<input type="text" name="nilai_terkoreksi" class="form-control" id="harga_biasa" readonly value="RP.0">
												<?php } else { ?>
													<input type="text" name="nilai_terkoreksi" class="form-control" id="harga_biasa" readonly value="<?= "Rp " . number_format($vendor['nilai_penawaran'], 2, ',', '.')  ?>">
												<?php } ?>
											<?php } ?>
										</td>
									</tr>
									<tr>
										<td>
											<h6>Harga Terkoreksi (Rp.)</h6>
										</td>
										<td>
											<input type="text" value="<?= $vendor['nilai_terkoreksi'] ?>" name="nilai_terkoreksi" class="form-control" id="harga_biasa_terkoreksi" value="<?= $vendor['nilai_terkoreksi'] ?>">
											<input type="text" disabled class="float-right form-control form-control-sm mt-1" style="width: 400px;" id="tanpa-rupiah_terkoreksi">
										</td>
									</tr>
								</table>
							</form>
							<button type="button" onclick="simpan_harga_terkoreksi()" id="btnSave" style="width: 200px;" class="btn btn-success"><i class="fa fa-save"></i>
								Simpan
							</button>
						</div>
					</div>

					<div class="tab-pane fade" id="peringkat">
						<div class="content p-5">
							<center>
								<form action="" id="nilai_pringkat_teknis">
									<label for="">Nilai Peringkat Teknis</label>
									<div class="col-md-2">
										<input type="number" id="validasi_nilai_pringkat_teknis" value="<?= $vendor['nilai_pringkat_teknis'] ?>" name="nilai_pringkat_teknis" min="1" max="100" required class="form-control">
										<input type="hidden" id="id_vendor" class="form-control" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
										<input type="hidden" id="id_paket" class="form-control" name="id_paket" value="<?= $paket['id_paket'] ?>"><br>
										<!-- <i class="text-danger">Nilai Tidak Boleh Lebih 100 !!!</i> -->
									</div>
								</form><br>
								<button type="button" onclick="save_nilai_pringkat_teknis()" id="btnSave" style="width: 200px;" class="btn btn-success"><i class="fa fa-save"></i>
									Simpan
								</button>
							</center>
						</div>
					</div>

					<div class="tab-pane fade" id="kualifikasi">
						<div class="content">
							<div class="card">
								<div class="card-header bg-primary text-white">KIRIM UNDANGAN PEMBUKTIAN</div>
								<div class="card-body">
									<form action="<?= base_url('panitiajmtm/beranda/simpan_undangan') ?>" method="POST">
										<h3 style="text-align:center">ISI UNDANGAN PEMBUKTIAN</h3>
										<i>
											Kepada Yth.
											<br>
											<b> <?= $vendor['username_vendor'] ?></b>
											<br>
											di
											<br>
											Tempat
										</i>

										<i>
											Kami mengundang Anda untuk menghadiri pembuktian kualifikasi terhadap tender
											<br>
											Kode tender : <b><?= $paket['kode_tender'] ?></b>,
											<br>
											Nama Tender: <b><?= $paket['nama_paket'] ?></b>,
											<br>
											dengan infromasi terkait pembuktian sebagai berikut:
											<br>
											<table>
												<input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>">
												<input type="hidden" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
												<tr>
													<th width="200px">Waktu Mulai</th>
													<th> <input type="input" style="width: 300px;" class="form-control form-control-sm" name="waktu_mulai" id="tanggal_mulai_pascakualifikasi"></th>
												</tr>
												<tr>
													<th width="200px">Waktu Selesai</th>
													<th> <input type="input" style="width: 300px;" class="form-control  form-control-sm" name="waktu_selesai" id="tanggal_selesai_pascakualifikasi"></th>
												</tr>
												<br>
												<tr>
													<th>Tempat</th>
													<th><textarea name="tempat" style="width: 300px;" class="form-control form-control-sm"></textarea></th>
												</tr>
												<tr>
													<th>Yang harus dibawa</th>
													<th><textarea name="yang_harus_dibawa" style="width: 300px;" class="form-control form-control-sm"></textarea></th>
												</tr>
												<tr>
													<th>Yang harus hadir</th>
													<th><textarea name="yang_harus_hadir" style="width: 300px;" class="form-control form-control-sm"></textarea></th>
												</tr>
											</table>
											<br>
											<br>
											<br>
											<br>
											Demikian penjelasan kami, atas perhatian dan kerjasama yang baik diucapkan terima kasih.
											<br>
											<br>
											Hormat kami,
										</i>
										<div style="margin-left: 200px;" class="mt-3">
											<button type="submit" style="width:300px" class="btn btn-success"><i class="fa fa-save"></i>
												Simpan Undangan
											</button>
										</div>
									</form>


									<table id="konten_undangan" class="table table-striped" style="margin-top: 20px">
										<thead>
											<?php foreach ($get_all_undangan as $key => $value) { ?>
												<tr>
													<th>Nama Undangan</th>
													<th>Detail Undangan</th>
												</tr>
												<tr>
													<td>UNDANGAN PEMBUKTIAN</td>
													<td> <i>
															Kepada Yth.
															<br>
															<b> <?= $vendor['username_vendor'] ?></b>
															<br>
															di
															<br>
															Tempat
														</i>

														<i>
															Kami mengundang Anda untuk menghadiri pembuktian kualifikasi terhadap tender
															<br>
															Kode tender : <b><?= $paket['kode_tender'] ?></b>,
															<br>
															Nama Tender: <b><?= $paket['nama_paket'] ?></b>,
															<br>
															dengan infromasi terkait pembuktian sebagai berikut:
															<br>
															<br>
															Waktu Mulai : <b><?= $value['waktu_mulai'] ?></b> S/D <b><?= $value['waktu_selesai'] ?></b>,
															<br>
															Tempat : <b><?= $value['tempat'] ?></b>,
															<br>
															Yang harus dibawa: <b><?= $value['yang_harus_dibawa'] ?></b>,
															<br>
															Yang harus hadir: <b><?= $value['yang_harus_hadir'] ?></b>,
													</td>
												</tr>
											<?php	 } ?>

										</thead>
										<tbody></tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

					<div class="tab-pane fade" id="pembuktian">
						<div class="content">
							<form action="">
								<table class=" table table-striped">
									<tr>
										<th style="width: 100%;">Undangan Pembuktian</th>
										<th></th>
									</tr>
									<tr>
										<td>Sudah Dikirim (04 September 2018 11:28)</td>
										<td><a href="#"><span class="badge badge-warning"><i class="fas fa fa-download"></i> Cetak</a></span></td>
									</tr>
									<tr>
										<th style="width: 100%;">Persyaratan Kualifikasi</th>
										<th>Memenuhi</th>
									</tr>
									<tr>
										<td>
											SIUP
											<br>
											Klasifikasi: kecil dan non kecil
										</td>
										<td><input type="checkbox"></td>
									</tr>
									<tr>
										<td>Memiliki NPWP</td>
										<td><input type="checkbox"></td>
									</tr>
									<tr>
										<td>Telah Melunasi Kewajiban Pajak Tahun Terakhir</td>
										<td><input type="checkbox"></td>
									</tr>
									<tr>
										<td>Yang bersangkutan dan manajemennya tidak dalam pengawalan pengadilan, tidak palit, dan kegiatan usaha</td>
										<td><input type="checkbox"></td>
									</tr>
									<tr>
										<td>Tidak Masuk dalam Daftar Hitam</td>
										<td><input type="checkbox"></td>
									</tr>
								</table>
								<div class="form-group">
									<label for="exampleFormControlTextarea1">Alasan Tidak Lulus</label>
									<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
								</div>
								<button class="btn btn-success"><i class="fa fa-save"></i>
									Simpan
								</button>
							</form>
						</div>
					</div>

					<div class="tab-pane fade" id="dokumentambahan">
						<div class="content">
							<div class="card mt-3">
								<div class="card-header bg-primary text-white"">
										Evaluasi Persyaratan Dokumen Tambahan
									</div>
									<div class=" card-body">
									<table class="table">
										<tr>
											<th>Nama Persyaratan Tambahan</th>
											<th>Status</th>
										</tr>
										<?php foreach ($cek_dokumen_tambahan as $key => $value) { ?>
											<tr>
												<td><?= $value['nama_persyaratan_tambahan'] ?></td>
												<td><?php if ($value['status_lengkap'] == 'tidak lulus') { ?>
														<label for="" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></label>
													<?php	} else if ($value['status_lengkap'] == 'lulus') { ?>
														<label for="" class="btn btn-sm btn-success"><i class="fa fa-check"></i></label>
													<?php } else { ?>
														<label for="" class="btn btn-sm btn-warning">Dokumen Belum Di Periksa</label>
													<?php } ?>
												</td>
											</tr>
										<?php } ?>
									</table>

								</div>
							</div>
							<form action="" id="form_kelulusan">
								<input type="hidden" name="vendor_id" value="<?= $vendor['id_vendor'] ?>">
								<input type="hidden" name="paket_id" value="<?= $paket['id_paket'] ?>">
							</form>
							<?php if ($vendor['status_evaluasi_syarat_tambahan'] == null) { ?>
								<center>
									<div class="row mt-5">
										<div class="col-md-6">
											<a href="javascript:;" onclick="tidak_lulus_kualifikasi()" class="btn btn-sm btn-danger"><i class="fas fa fa-times"></i> Tidak Lulus Persyaratan Kualifikasi</a>
										</div>
										<div class="col-md-6">
											<a href="javascript:;" onclick="lulus_kualifikasi()" class="btn btn-sm btn-success"><i class="fas fa fa-check"></i> Lulus Persyaratan Kualifikasi</a>
										</div>
									</div>
								</center>
							<?php	} else { ?>
								<center>
									<div class="row mt-5">
										<div class="col-md-12">
											<a href="javascript:;" onclick="batal_dievaluasi_kualifikasi_dan_batal()" class="btn btn-sm btn-danger"><i class="fas fa fa-sync"></i> Batal Evaluasi</a>
										</div>
									</div>
								</center>
							<?php	} ?>

						</div>
					</div>

					<div class="tab-pane fade" id="evaluasipersentasi">
						<div class="content">
							<center>
								<form action="" id="nilai_metodologi">
									<label for="">Nilai Evaluasi Persentasi Metodelogi</label>
									<div class="col-md-2">
										<input type="number" name="nilai_metodelogi" value="<?= $vendor['nilai_metodelogi'] ?>" min="1" max="100" required class="form-control">
										<input type="hidden" id="id_vendor" class="form-control" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
										<input type="hidden" id="id_paket" class="form-control" name="id_paket" value="<?= $paket['id_paket'] ?>"><br>
										<i class="text-danger">Nilai Tidak Boleh Lebih 100 !!!</i>
									</div>
								</form><br>
								<button type="button" onclick="save_nilai_metodelogi()" id="btnSave" style="width: 200px;" class="btn btn-success"><i class="fa fa-save"></i>
									Simpan
								</button>
							</center>
						</div>
					</div>

					<div class="tab-pane fade" id="evaluasinilaiakhir">
						<div class="content">
							<center>
								<form action="" id="nilai_akhir">
									<label for="">Evaluasi Nilai Akhir</label>
									<div class="col-md-2">
										<input type="number" id="validasi_nilai_akhir" name="nilai_akhir" value="<?= $vendor['nilai_akhir'] ?>" min="1" max="100" required class="form-control">
										<input type="hidden" id="id_vendor" class="form-control" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
										<input type="hidden" id="id_paket" class="form-control" name="id_paket" value="<?= $paket['id_paket'] ?>"><br>
										<i class="text-danger">Nilai Tidak Boleh Lebih 100 !!!</i>
									</div>
								</form><br>
								<button type="button" onclick="save_nilai_akhir()" id="btnSave" style="width: 200px;" class="btn btn-success"><i class="fa fa-save"></i>
									Simpan
								</button>
							</center>
						</div>
					</div>
					<div class="tab-pane fade" id="negosiasi">
						<div class="content p-5">
							<form action="javascript:;" id="nilai_negosiasi">
								<input type="hidden" class="form-control" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
								<input type="hidden" class="form-control" name="id_paket" value="<?= $paket['id_paket'] ?>">
								<table class=" table">
									<tr>
										<td>
											<h6>Harga Penawaran (Rp.)</h6>
										</td>
										<td><?php if ($total_rincian_hps_pdf == null) { ?>
												<input type="text" class="form-control" value="<?= "Rp " . number_format($total_hps_vendor, 2, ",", ".") ?>" readonly>
											<?php  } else { ?>
												<?php if ($vendor['nilai_penawaran'] == null) { ?>
													<input type="text" name="nilai_terkoreksi" class="form-control" id="harga_biasa" readonly value="RP.0">
												<?php } else { ?>
													<input type="text" name="nilai_terkoreksi" class="form-control" id="harga_biasa" readonly value="<?= "Rp " . number_format($vendor['nilai_penawaran'], 2, ',', '.')  ?>">
												<?php } ?>
											<?php } ?>
										</td>
									</tr>
									<tr>
										<td>
											<h6>Harga Negosiasi (Rp.)</h6>
										</td>
										<input type="hidden" name="nilai_penawaran" value="<?= $total_hps_vendor ?>">
										<td><input type="text" name="negosiasi" class="form-control" id="harga_biasa_negosiasi" value="<?= $vendor['negosiasi'] ?>">
											<input type="text" disabled class="float-right form-control form-control-sm mt-1" style="width: 400px;" id="tanpa-rupiah-negosiasi">
										</td>
									</tr>
								</table>
							</form>
							<button type="button" onclick="simpan_harga_negosiasi()" id="btnSave" style="width: 200px;" class="btn btn-success"><i class="fa fa-save"></i>
								Simpan
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php } else if ($paket['id_kualifikasi'] == 12 || $paket['id_kualifikasi'] == 9 || $paket['id_kualifikasi'] == 14 || $paket['id_kualifikasi'] == 18 || $paket['id_kualifikasi'] == 20 || $paket['id_kualifikasi'] == 21) { ?>
	<!-- PASCAKUALIFIKASI  -->
	<div id="main" class="container">
		<nav aria-label="breadcrumb" class="mt-3">
			<input type="hidden" id="id_penawaran_teknis" class="form-control" readonly name="id_penawaran_teknis">
			<input type="hidden" value="<?= $paket['id_paket'] ?>" id="id_paket">
			<div class="float-right p-3">
				<a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi" class="badge badge-danger navbar-badge"></span> Pesan Penjelasan </a>
				<a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca_negosiasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_negosiasi" class="badge badge-danger navbar-badge"></span> Pesan Negosiasi </a>
				<!-- <a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_prakualifikasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_prakualifikasi" class="badge badge-danger navbar-badge"></span> Sanggahan Prakualifikasi</a> -->
				<a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_akhir"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_akhir" class="badge badge-danger navbar-badge"></span> Sanggahan Akhir</a>
			</div>
			<ol class="breadcrumb bg-primary">
				<li class="breadcrumb-item"><a style="color: white;" href="#">Beranda &raquo; Informasi Tender</a></li>
			</ol>
			<div class="float-right">

			</div>
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
			<?php if ($paket['id_kualifikasi'] == 16 || $paket['id_kualifikasi'] == 14 || $paket['id_kualifikasi'] == 15 || $paket['id_kualifikasi'] == 12 || $paket['id_kualifikasi'] == 18 || $paket['id_kualifikasi'] == 20 || $paket['id_kualifikasi'] == 21) { ?>

			<?php } else { ?>
				<?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_prakualifikasi['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>
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
			<?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>
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
		</ul>
		<div class="tab-content">
			<div class="content">
				<table class="table table-striped">
					<tr>
						<th style="background-color: bisque; width:20%">Nama Peserta</th>
						<td style="width:60%"><?= $vendor['username_vendor'] ?></td>
						<td><a href="<?= base_url('panitiajmtm/beranda/evaluasitender/' . $paket['id_paket']) ?>"><span class="badge badge-secondary"><i class="glyphicon glyphicon-arrow-left"></i> Kembali ke Hasil Evaluasi</span></a> </td>
					</tr>
					<tr>
						<th style="background-color: bisque; width:15%">Penawaran Harga</th>
						<td>
						<td><?php if ($total_rincian_hps_pdf == null) { ?>
								<label><?= "Rp " . number_format($total_hps_vendor, 2, ",", ".") ?></label>
							<?php  } else { ?>
								<?php if ($vendor['nilai_penawaran'] == null) { ?>
									<label id="harga_biasa"></label>
								<?php } else { ?>
									<label><?= "Rp " . number_format($vendor['nilai_penawaran'], 2, ',', '.')  ?></label>
								<?php } ?>
							<?php } ?>
						</td>
						</td>
						<td></td>
					</tr>
				</table>


				<ul class="nav nav-tabs" id="myTab" style="margin-top: 50px;">
					<li>
						<a class="nav-link" href="#administrasi">1. Evaluasi Dokumen Administrasi</a>
					</li>
					<?php if (date('Y-m-d H:i', strtotime($get_tahap_id_11_7_17['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

					<?php	} else if (date('Y-m-d H:i', strtotime($get_tahap_id_11_7_17['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_id_11_7_17['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
						<li class="nav-item">
							<a class="nav-link" href="#dokumentambahan">2. Evaluasi Persyaratan Dokumen Tambahan</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#teknis">3. Evaluasi Teknis Penawaran</a>
						</li>
					<?php	} else { ?>
						<li class="nav-item">
							<a class="nav-link" href="#dokumentambahan">2. Evaluasi Persyaratan Dokumen Tambahan</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#teknis">3. Evaluasi Teknis Penawaran</a>
						</li>
					<?php	} ?>

					<?php if (date('Y-m-d H:i', strtotime($get_untuk_tahap_peringkat_teknisku['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

					<?php	} else if (date('Y-m-d H:i', strtotime($get_untuk_tahap_peringkat_teknisku['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_untuk_tahap_peringkat_teknisku['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
						<li class="nav-item">
							<a class="nav-link" href="#peringkat">4. Peringkat Teknis</a>
						</li>
					<?php	} else { ?>
						<li class="nav-item">
							<a class="nav-link" href="#peringkat">4. Peringkat Teknis</a>
						</li>
					<?php	} ?>


					<?php if (date('Y-m-d H:i', strtotime($get_tahap_keluar_dokumen_kualifikasi['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>
						<!-- <li class="nav-item">
									<a class="nav-link" href="#harga">5. Evaluasi Harga Terkoreksi</a>
								</li> -->
					<?php	} else if (date('Y-m-d H:i', strtotime($get_tahap_keluar_dokumen_kualifikasi['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_keluar_dokumen_kualifikasi['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>

						<li class="nav-item">
							<a class="nav-link" href="#harga">5. Evaluasi Harga Terkoreksi</a>
						</li>
					<?php	} else { ?>
						<li class="nav-item">
							<a class="nav-link" href="#harga">5. Evaluasi Harga Terkoreksi</a>
						</li>
					<?php	} ?>


					<?php if (date('Y-m-d H:i', strtotime($get_tahap_penetapan_pemenang['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>
						<!-- <li class="nav-item">
									<a class="nav-link" href="#negosiasi">6. Negosiasi Harga</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#evaluasinilaiakhir">7. Evaluasi Nilai Akhir</a>
								</li> -->
					<?php	} else if (date('Y-m-d H:i', strtotime($get_tahap_penetapan_pemenang['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_penetapan_pemenang['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>

						<li class="nav-item">
							<a class="nav-link" href="#negosiasi">6. Negosiasi Harga</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#evaluasinilaiakhir">7. Evaluasi Nilai Akhir</a>
						</li>
					<?php	} else { ?>

						<li class="nav-item">
							<a class="nav-link" href="#negosiasi">6. Negosiasi Harga</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#evaluasinilaiakhir">7. Evaluasi Nilai Akhir</a>
						</li>
					<?php	} ?>


				</ul>

				<div class="tab-content">
					<div class="tab-pane active" id="administrasi">
						<div class="content">
							<?= $this->session->flashdata('message'); ?>
							<div class="card mt-4">
								<div class="card-header bg-primary text-white">
									Evaluasi Dokumen Administrasi,Teknis & Kualifikasi
								</div>
								<form action="<?= base_url('panitiajmtm/beranda/save_evaluasi_administrasi') ?>" method="POST">
									<input type="hidden" id="id_vendor" value="<?= $vendor['id_mengikuti_vendor'] ?>" name="id_vendor">
									<input type="hidden" id="id_paket_evaluasi" value="<?= $paket['id_paket'] ?>" name="id_paket">
									<div class="card-body">
										<div style="overflow-x: auto;">
											<table class=" table table-hover">
												<thead>
													<tr>
														<th>Status Dokumen Persyaratan Dari Vms</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Dokumen Sesuai Vms/Dokumen Lengkap</td>
														<td><a href="javascript:;" class="btn btn-sm btn-success"> <i class="fas fa fa-check"></i></a></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<br>
								</form>
								<form action="" id="simpan_evaluasi_nilai_administrasi">
									<input type="hidden" class="form-control" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
									<input type="hidden" class="form-control" name="id_paket" value="<?= $paket['id_paket'] ?>">
								</form><br>
							</div>
						</div>
					</div>

					<div class="tab-pane fade" id="teknis">
						<div class="content">
							<center>
								<form action="" id="nilai_seluruh_teknis">
									<label for="">Nilai Teknis Keseluruhan</label>
									<div class="col-md-2">
										<input type="number" id="validasi_nilai_teknis_keseluruhan" value="<?= $vendor['nilai_teknis'] ?>" name="nilai_teknis_vendor" min="1" max="100" required class="form-control">
										<input type="hidden" id="id_vendor" class="form-control" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
										<input type="hidden" id="id_paket" class="form-control" name="id_paket" value="<?= $paket['id_paket'] ?>"><br>
										<i class="text-danger">Nilai Tidak Boleh Lebih 100 !!!</i>
									</div>

								</form><br>
								<button type="button" onclick="save_nilai_seluruh_teknis()" id="btnSave" style="width: 200px;" class="btn btn-success"><i class="fa fa-save"></i>
									Simpan
								</button>
							</center>
						</div>
					</div>

					<div class="tab-pane fade" id="nilaiprakualifikasi">
						<div class="content">
							<center>
								<form action="" id="nilai_seluruh_prakualifikasi">
									<label for="">Nilai Prakualifikasi</label>
									<div class="col-md-2">
										<input type="text" id="validasi_nilai_prakualifikasi" value="<?= $vendor['nilai_prakualifikasi'] ?>" name="nilai_prakualifikasi" required class="form-control">
										<input type="hidden" id="id_vendor" class="form-control" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
										<input type="hidden" id="id_paket" class="form-control" name="id_paket" value="<?= $paket['id_paket'] ?>"><br>
										<i class="text-danger">Nilai Tidak Boleh Lebih 100 !!!</i>
									</div>

								</form><br>
								<button type="button" onclick="save_nilai_seluruh_prakualifikasi()" id="btnSave" style="width: 200px;" class="btn btn-success"><i class="fa fa-save"></i>
									Simpan
								</button>
							</center>
						</div>
					</div>

					<div class="tab-pane fade" id="harga">
						<div class="content p-5">
							<form action="javascript:;" id="nilai_terkoreksi">
								<input type="hidden" class="form-control" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
								<input type="hidden" class="form-control" name="id_paket" value="<?= $paket['id_paket'] ?>">
								<table class=" table">
									<tr>
										<td>
											<h6>Harga Penawaran (Rp.)</h6>
										</td>
										<td><?php if ($total_rincian_hps_pdf == null) { ?>
												<input type="text" class="form-control" value="<?= "Rp " . number_format($total_hps_vendor, 2, ",", ".") ?>" readonly>
											<?php  } else { ?>
												<?php if ($vendor['nilai_penawaran'] == null) { ?>
													<input type="text" name="nilai_terkoreksi" class="form-control" id="harga_biasa" readonly value="RP.0">
												<?php } else { ?>
													<input type="text" name="nilai_terkoreksi" class="form-control" id="harga_biasa" readonly value="<?= "Rp " . number_format($vendor['nilai_penawaran'], 2, ',', '.')  ?>">
												<?php } ?>
											<?php } ?>
										</td>
									</tr>
									<tr>
										<td>
											<h6>Harga Terkoreksi (Rp.)</h6>
										</td>
										<td>
											<input type="text" value="<?= $vendor['nilai_terkoreksi'] ?>" name="nilai_terkoreksi" class="form-control" id="harga_biasa_terkoreksi" value="<?= $vendor['nilai_terkoreksi'] ?>">
											<input type="text" disabled class="float-right form-control form-control-sm mt-1" style="width: 400px;" id="tanpa-rupiah_terkoreksi">
										</td>
									</tr>
								</table>
							</form>
							<button type="button" onclick="simpan_harga_terkoreksi()" id="btnSave" style="width: 200px;" class="btn btn-success"><i class="fa fa-save"></i>
								Simpan
							</button>
						</div>
					</div>

					<div class="tab-pane fade" id="peringkat">
						<div class="content p-5">
							<center>
								<form action="" id="nilai_pringkat_teknis">
									<label for="">Nilai Peringkat Teknis</label>
									<div class="col-md-2">
										<input type="number" id="validasi_nilai_pringkat_teknis" value="<?= $vendor['nilai_pringkat_teknis'] ?>" name="nilai_pringkat_teknis" min="1" max="100" required class="form-control">
										<input type="hidden" id="id_vendor" class="form-control" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
										<input type="hidden" id="id_paket" class="form-control" name="id_paket" value="<?= $paket['id_paket'] ?>"><br>

									</div>

								</form><br>
								<button type="button" onclick="save_nilai_pringkat_teknis()" id="btnSave" style="width: 200px;" class="btn btn-success"><i class="fa fa-save"></i>
									Simpan
								</button>
							</center>
						</div>
					</div>

					<div class="tab-pane fade" id="kualifikasi">
						<div class="content">
							<div class="card">
								<div class="card-header bg-primary text-white">KIRIM UNDANGAN PEMBUKTIAN</div>
								<div class="card-body">
									<form action="<?= base_url('panitiajmtm/beranda/simpan_undangan') ?>" method="POST">
										<h3 style="text-align:center">ISI UNDANGAN PEMBUKTIAN</h3>
										<i>
											Kepada Yth.
											<br>
											<b> <?= $vendor['username_vendor'] ?></b>
											<br>
											di
											<br>
											Tempat
										</i>

										<i>
											Kami mengundang Anda untuk menghadiri pembuktian kualifikasi terhadap tender
											<br>
											Kode tender : <b><?= $paket['kode_tender'] ?></b>,
											<br>
											Nama Tender: <b><?= $paket['nama_paket'] ?></b>,
											<br>
											dengan infromasi terkait pembuktian sebagai berikut:
											<br>
											<table>
												<input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>">
												<input type="hidden" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
												<tr>
													<th width="200px">Waktu Mulai</th>
													<th> <input type="input" style="width: 300px;" class="form-control form-control-sm" name="waktu_mulai" id="tanggal_mulai_pascakualifikasi"></th>
												</tr>
												<tr>
													<th width="200px">Waktu Selesai</th>
													<th> <input type="input" style="width: 300px;" class="form-control  form-control-sm" name="waktu_selesai" id="tanggal_selesai_pascakualifikasi"></th>
												</tr>
												<br>
												<tr>
													<th>Tempat</th>
													<th><textarea name="tempat" style="width: 300px;" class="form-control form-control-sm"></textarea></th>
												</tr>
												<tr>
													<th>Yang harus dibawa</th>
													<th><textarea name="yang_harus_dibawa" style="width: 300px;" class="form-control form-control-sm"></textarea></th>
												</tr>
												<tr>
													<th>Yang harus hadir</th>
													<th><textarea name="yang_harus_hadir" style="width: 300px;" class="form-control form-control-sm"></textarea></th>
												</tr>
											</table>
											<br>
											<br>
											<br>
											<br>
											Demikian penjelasan kami, atas perhatian dan kerjasama yang baik diucapkan terima kasih.
											<br>
											<br>
											Hormat kami,
										</i>
										<div style="margin-left: 200px;" class="mt-3">
											<button type="submit" style="width:300px" class="btn btn-success"><i class="fa fa-save"></i>
												Simpan Undangan
											</button>
										</div>
									</form>


									<table id="konten_undangan" class="table table-striped" style="margin-top: 20px">
										<thead>
											<?php foreach ($get_all_undangan as $key => $value) { ?>
												<tr>
													<th>Nama Undangan</th>
													<th>Detail Undangan</th>
												</tr>
												<tr>
													<td>UNDANGAN PEMBUKTIAN</td>
													<td> <i>
															Kepada Yth.
															<br>
															<b> <?= $vendor['username_vendor'] ?></b>
															<br>
															di
															<br>
															Tempat
														</i>

														<i>
															Kami mengundang Anda untuk menghadiri pembuktian kualifikasi terhadap tender
															<br>
															Kode tender : <b><?= $paket['kode_tender'] ?></b>,
															<br>
															Nama Tender: <b><?= $paket['nama_paket'] ?></b>,
															<br>
															dengan infromasi terkait pembuktian sebagai berikut:
															<br>
															<br>
															Waktu Mulai : <b><?= $value['waktu_mulai'] ?></b> S/D <b><?= $value['waktu_selesai'] ?></b>,
															<br>
															Tempat : <b><?= $value['tempat'] ?></b>,
															<br>
															Yang harus dibawa: <b><?= $value['yang_harus_dibawa'] ?></b>,
															<br>
															Yang harus hadir: <b><?= $value['yang_harus_hadir'] ?></b>,
													</td>
												</tr>
											<?php	 } ?>

										</thead>
										<tbody></tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

					<div class="tab-pane fade" id="pembuktian">
						<div class="content">
							<form action="">
								<table class=" table table-striped">
									<tr>
										<th style="width: 100%;">Undangan Pembuktian</th>
										<th></th>
									</tr>
									<tr>
										<td>Sudah Dikirim (04 September 2018 11:28)</td>
										<td><a href="#"><span class="badge badge-warning"><i class="fas fa fa-download"></i> Cetak</a></span></td>
									</tr>
									<tr>
										<th style="width: 100%;">Persyaratan Kualifikasi</th>
										<th>Memenuhi</th>
									</tr>
									<tr>
										<td>
											SIUP
											<br>
											Klasifikasi: kecil dan non kecil
										</td>
										<td><input type="checkbox"></td>
									</tr>
									<tr>
										<td>Memiliki NPWP</td>
										<td><input type="checkbox"></td>
									</tr>
									<tr>
										<td>Telah Melunasi Kewajiban Pajak Tahun Terakhir</td>
										<td><input type="checkbox"></td>
									</tr>
									<tr>
										<td>Yang bersangkutan dan manajemennya tidak dalam pengawalan pengadilan, tidak palit, dan kegiatan usaha</td>
										<td><input type="checkbox"></td>
									</tr>
									<tr>
										<td>Tidak Masuk dalam Daftar Hitam</td>
										<td><input type="checkbox"></td>
									</tr>
								</table>
								<div class="form-group">
									<label for="exampleFormControlTextarea1">Alasan Tidak Lulus</label>
									<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
								</div>
								<button class="btn btn-success"><i class="fa fa-save"></i>
									Simpan
								</button>
							</form>
						</div>
					</div>

					<div class="tab-pane fade" id="dokumentambahan">
						<div class="content">
							<div class="card mt-3">
								<div class="card-header bg-primary text-white"">
										Evaluasi Persyaratan Dokumen Tambahan
									</div>
									<div class=" card-body">
									<table class="table">
										<tr>
											<th>Nama Persyaratan Tambahan</th>
											<th>Status</th>
										</tr>
										<?php foreach ($cek_dokumen_tambahan as $key => $value) { ?>
											<tr>
												<td><?= $value['nama_persyaratan_tambahan'] ?></td>
												<td><?php if ($value['status_lengkap'] == 'tidak lulus') { ?>
														<label for="" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></label>
													<?php	} else if ($value['status_lengkap'] == 'lulus') { ?>
														<label for="" class="btn btn-sm btn-success"><i class="fa fa-check"></i></label>
													<?php } else { ?>
														<label for="" class="btn btn-sm btn-warning">Dokumen Belum Di Periksa</label>
													<?php } ?>
												</td>
											</tr>
										<?php } ?>
									</table>

								</div>
							</div>
							<form action="" id="form_kelulusan">
								<input type="hidden" name="vendor_id" value="<?= $vendor['id_vendor'] ?>">
								<input type="hidden" name="paket_id" value="<?= $paket['id_paket'] ?>">
							</form>
							<?php if ($vendor['status_evaluasi_syarat_tambahan'] == null) { ?>
								<center>
									<div class="row mt-5">
										<div class="col-md-6">
											<a href="javascript:;" onclick="tidak_lulus_kualifikasi()" class="btn btn-sm btn-danger"><i class="fas fa fa-times"></i> Tidak Lulus Persyaratan Kualifikasi</a>
										</div>
										<div class="col-md-6">
											<a href="javascript:;" onclick="lulus_kualifikasi()" class="btn btn-sm btn-success"><i class="fas fa fa-check"></i> Lulus Persyaratan Kualifikasi</a>
										</div>
									</div>
								</center>
							<?php	} else { ?>
								<center>
									<div class="row mt-5">
										<div class="col-md-12">
											<a href="javascript:;" onclick="batal_dievaluasi_kualifikasi_dan_batal()" class="btn btn-sm btn-danger"><i class="fas fa fa-sync"></i> Batal Evaluasi</a>
										</div>
									</div>
								</center>
							<?php	} ?>

						</div>
					</div>

					<div class="tab-pane fade" id="evaluasipersentasi">
						<div class="content">
							<center>
								<form action="" id="nilai_metodologi">
									<label for="">Nilai Evaluasi Persentasi Metodelogi</label>
									<div class="col-md-2">
										<input type="number" name="nilai_metodelogi" value="<?= $vendor['nilai_metodelogi'] ?>" min="1" max="100" required class="form-control">
										<input type="hidden" id="id_vendor" class="form-control" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
										<input type="hidden" id="id_paket" class="form-control" name="id_paket" value="<?= $paket['id_paket'] ?>"><br>
										<i class="text-danger">Nilai Tidak Boleh Lebih 100 !!!</i>
									</div>
								</form><br>
								<button type="button" onclick="save_nilai_metodelogi()" id="btnSave" style="width: 200px;" class="btn btn-success"><i class="fa fa-save"></i>
									Simpan
								</button>
							</center>
						</div>
					</div>

					<div class="tab-pane fade" id="evaluasinilaiakhir">
						<div class="content">
							<center>
								<form action="" id="nilai_akhir">
									<label for="">Evaluasi Nilai Akhir</label>
									<div class="col-md-2">
										<input type="number" id="validasi_nilai_akhir" name="nilai_akhir" value="<?= $vendor['nilai_akhir'] ?>" min="1" max="100" required class="form-control">
										<input type="hidden" id="id_vendor" class="form-control" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
										<input type="hidden" id="id_paket" class="form-control" name="id_paket" value="<?= $paket['id_paket'] ?>"><br>
										<i class="text-danger">Nilai Tidak Boleh Lebih 100 !!!</i>
									</div>
								</form><br>
								<button type="button" onclick="save_nilai_akhir()" id="btnSave" style="width: 200px;" class="btn btn-success"><i class="fa fa-save"></i>
									Simpan
								</button>
							</center>
						</div>
					</div>
					<div class="tab-pane fade" id="negosiasi">
						<div class="content p-5">
							<form action="javascript:;" id="nilai_negosiasi">
								<input type="hidden" class="form-control" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
								<input type="hidden" class="form-control" name="id_paket" value="<?= $paket['id_paket'] ?>">
								<table class=" table">
									<tr>
										<td>
											<h6>Harga Penawaran (Rp.)</h6>
										</td>
										<td><?php if ($total_rincian_hps_pdf == null) { ?>
												<input type="text" class="form-control" value="<?= "Rp " . number_format($total_hps_vendor, 2, ",", ".") ?>" readonly>
											<?php  } else { ?>
												<?php if ($vendor['nilai_penawaran'] == null) { ?>
													<input type="text" name="nilai_terkoreksi" class="form-control" id="harga_biasa" readonly value="RP.0">
												<?php } else { ?>
													<input type="text" name="nilai_terkoreksi" class="form-control" id="harga_biasa" readonly value="<?= "Rp " . number_format($vendor['nilai_penawaran'], 2, ',', '.')  ?>">
												<?php } ?>
											<?php } ?>
										</td>
									</tr>
									<tr>
										<td>
											<h6>Harga Negosiasi (Rp.)</h6>
										</td>
										<input type="hidden" name="nilai_penawaran" value="<?= $total_hps_vendor ?>">
										<td><input type="text" name="negosiasi" class="form-control" id="harga_biasa_negosiasi" value="<?= $vendor['negosiasi'] ?>">
											<input type="text" disabled class="float-right form-control form-control-sm mt-1" style="width: 400px;" id="tanpa-rupiah-negosiasi">
										</td>
									</tr>
								</table>
							</form>
							<button type="button" onclick="simpan_harga_negosiasi()" id="btnSave" style="width: 200px;" class="btn btn-success"><i class="fa fa-save"></i>
								Simpan
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } else { ?>
<?php } ?>

<input type="hidden" id="id_paket" value="<?= $paket['id_paket'] ?>">
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

<!-- modal untuk evaluasi administrasi -->

<!-- Modal -->
<div class="modal fade" id="modal_klarifikasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info text-white">
				<h5 class="modal-title" id="modalTitle">Klarifikasi Persyaratan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" id="myTabdanang" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Lulus</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Status Persyaratan <?= $vendor['username_vendor'] ?></a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
						<form action="#" id="setuju_klarifikasi">
							<div class="form-group">
								<label for=""><b>Jenis Persyaratan</b></label>
								<input type="text" class="form-control" readonly name="nama_penawaran_teknis">
								<input type="hidden" id="id_penawaran_teknis" class="form-control" readonly name="id_penawaran_teknis">
								<input type="hidden" class="form-control" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
								<input type="hidden" class="form-control" name="id_paket" value="<?= $paket['id_paket'] ?>">
								<br>
							</div>
						</form>
						<div class="modal-footer">
							<button id="tampil_kirim_klarifikasi" class="btn btn-primary btn-sm tampil_kirim_klarifikasi">Klarifikasi</button>
							<button type="button" style="display: none;" class="btn btn-success btn-sm tambah_lulus_update" id="btnSave" onclick="Update_Setujui_persyartan_administarsi()">Lulus Persyaratan</button>
							<button type="button" style="display: none;" class="btn btn-success btn-sm tambah_lulus" id="btnSave" onclick="Setujui_persyartan_administarsi()">Lulus Persyaratan</button>
						</div>
						<br><br>
						<div class="card" id="kirim_klarifikasi2" style="display: none;">
							<div class="card-header bg-info text-white">
								<label for="">Sampaikan Kelarifikasi</label>
							</div>
							<div class="card-body">
								<form action="#" id="kirim_klarifikasi">
									<div class="form-group">
										<input type="text" class="form-control" readonly name="nama_penawaran_teknis">
										<input type="hidden" id="id_penawaran_teknis" class="form-control" readonly name="id_penawaran_teknis">
										<input type="hidden" id="id_vendor" class="form-control" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
										<input type="hidden" id="id_paket" class="form-control" name="id_paket" value="<?= $paket['id_paket'] ?>">
										<br>
										<label for="alasan_klarifikasi"><b> Alasan Klarifikasi</b></label>
										<textarea name="alasan_klarifikasi" class="form-control"></textarea>
									</div>
								</form>
								<div class="modal-footer">
									<button class="btn btn-danger btn-sm" id="sembunyikan_kirim_klarifikasi">Batal Klarifikasi</button>
									<button type="button" style="display: none;" class="btn btn-primary btn-sm kirimdantambah" id="btnSave" onclick="Kirim_kualifikasi_tambah()">Kirim Klarifikasi</button>
									<button type="button" style="display: none;" class="btn btn-primary btn-sm kirimdanupdate" id="btnSave" onclick="Kirim_kualifikasi_update()">Kirim Klarifikasi</button>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
						<br>
						<div class="card">
							<di class="card-header bg-info text-white">
								Log Dokumen Persyaratan
							</di>
							<div class="card-body">
								<table class="table table-hover" id="tbl_klarifikasi_administrasi">
									<thead>
										<tr>
											<th>No</th>
											<th>Jenis Persyaratan</th>
											<th>Status / Revisi Dokumen Persyaratan</th>
											<th>Status / Alasan Dokumen Persyaratan</th>
											<th>File Revisi Dari <?= $vendor['username_vendor'] ?></th>
										</tr>
									</thead>
									<tbody>

									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">...</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Evaluasi Teknis -->

<!-- Modal -->
<div class="modal fade" id="modal_evaluasi_teknis_penilaian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info text-white">
				<h5 class="modal-title" id="modalTitle">Penilain Teknis</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="card">
					<div class="card-header bg-light text-white">
						<button id="button_tampil_lulus_teknis" class="btn btn-success btn-sm">Penilaian Lulus Persyaratan & Alasan</button>
						<button id="button_tampil_tidak_lulus_teknis" class="btn btn-danger btn-sm">Penilain Tidak Lulus Persyaratan & Alasan</button>
						<button class="btn btn-info btn-sm">Keterangan Persyaratan</button>
					</div>
					<div class="card-body">
						<div style="display: none;" id="tampil_lulus_teknis">
							<div class="card">
								<div class="card-header bg-success text-white">
									Penilaian Lulus Persyaratan & Alasan
								</div>

								<form action="#" id="form_penilain_teknis">
									<div class="form-group">
										<input type="hidden" class="form-control" readonly name="nama_penawaran_teknis_teknis">
										<input type="hidden" id="id_penawaran_teknis_teknis" class="form-control" readonly name="id_penawaran_teknis_teknis">
										<input type="hidden" id="id_vendor" class="form-control" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
										<input type="hidden" id="id_paket" class="form-control" name="id_paket" value="<?= $paket['id_paket'] ?>">
										<br>
										<label for="alasan_klarifikasi"><b> Nilai Teknis Lulus Persyaratan</b></label>
										<input type="text" id="nilai_teknis" class="form-control" name="nilai_teknis">
										<label for="alasan_klarifikasi"><b> Alasan Penilaian Lulus Persyaratan</b></label>
										<textarea name="alasan_tidak_lulus" class="form-control"></textarea>
									</div>
								</form>
								<div class="col-md-6">
									<div class="card">
										<div class="card-header bg-primary text-white">Nilai <label class="nama_nilai"></label> Saat Ini</div>
										<div class="card-body text-center">
											<h3 class="nilai_saat_ini"></h3>
										</div>
									</div>
								</div>
								<br>
								<div class="modal-footer">
									<div class="bs-callout-info col-md-9">
										Berikan Alasan Penilaian Untuk Log Penilaian Teknis<br>
										Ketika Persyaratan Memenuhi Atau Tidak Memenuhi !!!
									</div>
									<button style="display: none;" type="button" class="btn btn-success btn-sm kirim_tambah_teknis" id="btnSave" onclick="Kirim_penilain_teknis_tambah()">Simpan Penilaian</button>
									<button style="display: none;" type="button" class="btn btn-success btn-sm kirim_update_teknis" id="btnSave" onclick="Kirim_penilaian_teknis_update()">Update Simpan Penilaian</button>
								</div>
							</div>
						</div>
						<div style="display: none;" id="tampil_tidak_lulus_teknis">
							<div class="card">
								<div class="card-header bg-danger text-white">
									Penilain Tidak Lulus Persyaratan & Alasan
								</div>
								<form action="#" id="form_penilain_teknis">
									<div class="form-group">
										<input type="hidden" class="form-control" readonly name="nama_penawaran_teknis_teknis">
										<input type="hidden" id="id_penawaran_teknis_teknis" class="form-control" readonly name="id_penawaran_teknis_teknis">
										<input type="hidden" id="id_vendor" class="form-control" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
										<input type="hidden" id="id_paket" class="form-control" name="id_paket" value="<?= $paket['id_paket'] ?>">
										<br>
										<label for="alasan_klarifikasi"><b> Nilai Teknis Tidak Lulus Persyaratan</b></label>
										<input type="text" id="nilai_teknis" class="form-control" name="nilai_teknis">
										<label for="alasan_klarifikasi"><b> Alasan Penilaian Tidak Lulus Persyaratan</b></label>
										<textarea name="alasan_tidak_lulus" class="form-control"></textarea>
									</div>
								</form>
								<div class="col-md-6">
									<div class="card">
										<div class="card-header bg-primary text-white">Nilai <label class="nama_nilai"></label> Saat Ini</div>
										<div class="card-body text-center">
											<h3 class="nilai_saat_ini"></h3>
										</div>
									</div>
								</div>
								<br>
								<div class="modal-footer">
									<div class="bs-callout-info col-md-9">
										Berikan Alasan Penilaian Untuk Log Penilaian Teknis<br>
										Ketika Persyaratan Memenuhi Atau Tidak Memenuhi !!!
									</div>
									<button style="display: none;" type="button" class="btn btn-danger btn-sm kirim_tambah_teknis" id="btnSave" onclick="Kirim_penilain_teknis_tambah()">Simpan Penilaian</button>
									<button style="display: none;" type="button" class="btn btn-danger btn-sm kirim_update_teknis" id="btnSave" onclick="Kirim_penilaian_teknis_update()">Update Simpan Penilaian</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>