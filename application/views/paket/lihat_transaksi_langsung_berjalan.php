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
<style>
	#kirim_ke_vendor {
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		z-index: 9999;
		background-color: #fff;
	}

	#kirim_ke_vendor #dikirim_ke_vendor {
		position: absolute;
		left: 50%;
		top: 50%;
		transform: translate(-50%, -50%);
		font: 14px arial;
	}
</style>
<div id="kirim_ke_vendor" style="display: none;">
	<div id="dikirim_ke_vendor">
		<img src="<?= base_url('assets/img/info_penyedia.gif') ?>" width="100%">
	</div>
</div>
<div class="preloader">
	<div class="loading">
		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
	</div>
</div>
<?php if ($this->session->userdata('id_role') == 1 || $this->session->userdata('id_role') == 2) { ?>
	<div class="text-center mt-3">
		<a class="btn btn-grad" href="<?= base_url('paket/daftar_paket') ?>">KEMBALI KE DAFTAR PAKET</a>
	</div>
<?php } ?>
<div id="main" class="container">
	<input type="hidden" id="id_paket" value="<?= $paket['id_paket'] ?>">
	<input type="hidden" id="id_paketku" value="<?= $paket['id_paket'] ?>">
	<nav aria-label="breadcrumb" class="mt-3">
		<ol class="breadcrumb btn-grad100">
			<li class="breadcrumb-item"><a style="color: white;" href="<?= base_url('paket/lihat_transaksi_langsung_berjalan/' . $paket['id_paket']) ?>">Beranda &raquo; Informasi Tender</a></li>
		</ol>
	</nav>
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link btn-grad100 text-white" href="<?= base_url('paket/lihat_transaksi_langsung_berjalan/' . $paket['id_paket']) ?>">Informasi Paket Transaksi Langsung</a>
		</li>
		<?php if ($this->session->userdata('id_role') == 1) { ?>
		<?php	} else { ?>
			<?php
			if (date('Y-m-d H:i', strtotime($get_tahap_negosiasi_transaksi_langsung['tanggal_mulai']))  >= date('Y-m-d H:i')) { ?>

			<?php   } else if (date('Y-m-d H:i', strtotime($get_tahap_negosiasi_transaksi_langsung['tanggal_mulai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_negosiasi_transaksi_langsung['tanggal_mulai']))  == date('Y-m-d H:i')) { ?>
				<li class=" nav-item">
					<a class="nav-link btn-grad100 text-white ml-2 active" href="<?= base_url('paket/negosiasi_transaksi_langsung/' . $paket['id_paket']) ?>">Negosiasi</a>
				</li>
			<?php   } else { ?>
				<li class=" nav-item">
					<a class="nav-link btn-grad100 text-white ml-2 active" href="<?= base_url('paket/negosiasi_transaksi_langsung/' . $paket['id_paket']) ?>">Negosiasi</a>
				</li>
			<?php   } ?>
		<?php } ?>
	</ul>
	<div class="tab-content p-2 card">
		<!-- tender -->
		<div class="tab-pane active" id="informasi-tender" role="tabpanel" aria-labelledby="tender-tab">
			<div class="content">

				<div class="container-fluid">
					<div style="overflow-x:auto">
						<table class="table table-bordered">
							<tbody>
								<tr>
									<th>Kode Tender</th>
									<td><?= $paket['kode_tender'] ?> <a target="_blank" href="<?= base_url('paket/summary_transaksi_langsung/' . $paket['id_paket']) ?>" class="float-right badge badge-primary" style="height: 20px;">Summary Tender</a></td>
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
										<a href="javascipt:;" class="btn btn-sm btn-grad100" data-toggle="modal" data-target="#modal_lihat_tahap"><img src="<?= base_url('assets/img/icon-jadwal.png') ?>" width="25px" alt=""> Lihat Tahap Tender Saat Ini</a>
									</td>
								</tr>
								<tr>

									<th>Jumlah Peserta</th>
									<td><b><?= $jumlah_peserta ?> Peserta</b></td>
								</tr>
								<?php if (date('Y-m-d H:i', strtotime($get_tahap_upload_penawaran['tanggal_mulai']))  >= date('Y-m-d H:i')) { ?>

								<?php   } else if (date('Y-m-d H:i', strtotime($get_tahap_upload_penawaran['tanggal_selesai']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_upload_penawaran['tanggal_mulai']))  == date('Y-m-d H:i')) { ?>
									<tr>
										<div class="row">
											<th>Pembukaan Penawaran</th>
											<td>
												<div class="card">
													<div class="card-header btn-grad100 text-white">
														<label for="">Pembukaan Dokumen Penawaran</label>
													</div>
													<div class="card-body">
														<img src="<?= base_url('assets/img/6100RjKShtL.png') ?>" width="50px" alt=""> <a href="<?= base_url('buka_penawaran') ?>" class="btn btn-grad100 btn-sm" style="color: white;"> Buka Dokumen Penawaran <i class="fa fa-download"></i></a>
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
								<?php   } else { ?>
									<tr>
										<div class="row">
											<th>Pembukaan Penawaran</th>
											<td>
												<div class="card">
													<div class="card-header btn-grad100 text-white">
														<label for="">Pembukaan Dokumen Penawaran</label>
													</div>
													<div class="card-body">
														<img src="<?= base_url('assets/img/6100RjKShtL.png') ?>" width="50px" alt=""> <a href="<?= base_url('buka_penawaran') ?>" class="btn btn-grad100 btn-sm" style="color: white;"> Buka Dokumen Penawaran <i class="fa fa-download"></i></a>
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
								<?php   } ?>


								<?php if (date('Y-m-d H:i', strtotime($get_tahap_upload_ba_nego['tanggal_mulai']))  >= date('Y-m-d H:i')) { ?>

								<?php   } else if (date('Y-m-d H:i', strtotime($get_tahap_upload_ba_nego['tanggal_selesai']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_upload_ba_nego['tanggal_mulai']))  == date('Y-m-d H:i')) { ?>
									<tr>
										<th>Pembukaan BA Negosiasi</th>
										<td>
											<div class="card">
												<div class="card-header btn-grad100">Download BA NEGOSIASI</div>
												<div class="card-body">
													<table class="table table-hover" id="tbl_bukti_negosiasi_vendor2">
														<thead>
															<tr class="btn-grad100">
																<th>No</th>
																<th>Nama Vendor</th>
																<th>File BA Negosiasi</th>
																<th>File</th>
																<th>Download</th>
															</tr>
														</thead>
														<tbody>

														</tbody>
													</table>
												</div>
											</div>
										</td>
									</tr>
								<?php   } else { ?>
									<tr>
										<th>Pembukaan BA Negosiasi</th>
										<td>
											<div class="card">
												<div class="card-header btn-grad100">Download BA NEGOSIASI</div>
												<div class="card-body">
													<table class="table table-hover" id="tbl_bukti_negosiasi_vendor2">
														<thead>
															<tr class="btn-grad100">
																<th>No</th>
																<th>Nama Vendor</th>
																<th>File BA Negosiasi</th>
																<th>File</th>
																<th>Download</th>
															</tr>
														</thead>
														<tbody>

														</tbody>
													</table>
												</div>
											</div>
										</td>
									</tr>
								<?php   } ?>



								<?php if (date('Y-m-d H:i', strtotime($get_tahap_penetapan_pemenang['tanggal_mulai']))  >= date('Y-m-d H:i')) { ?>

								<?php   } else if (date('Y-m-d H:i', strtotime($get_tahap_penetapan_pemenang['tanggal_selesai']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_penetapan_pemenang['tanggal_mulai']))  == date('Y-m-d H:i')) { ?>
									<tr>
										<th>Penetapan Pemenang</th>
										<td><a href="<?= base_url('paket/penetapan_pemenang_transaksi_langsung/' . $paket['id_paket']) ?>" class="btn btn-grad100 btn-sm" style="color: white;"><i class="fas fa-signature"></i> Tetapkan Pemenang</a></td>
									</tr>
								<?php   } else { ?>
									<tr>
										<th>Penetapan Pemenang</th>
										<td><a href="<?= base_url('paket/penetapan_pemenang_transaksi_langsung/' . $paket['id_paket']) ?>" class="btn btn-grad100 btn-sm" style="color: white;"><i class="fas fa-signature"></i> Tetapkan Pemenang</a></td>
									</tr>
								<?php   } ?>

								<!-- <tr>
                           <th>Pengumuman</th>
                           <td><a href="<?= base_url('panitiajmtm/beranda/pengumumanpemenangtender/' . $paket['id_paket']) ?>" style="color: white;height:20px;" class="badge badge-warning">Pengumuman Pemenang</a></td>
                        </tr> -->
								<tr>
							</tbody>
						</table>
						<div>
							<?php if ($paket['alasan_tender_batal']) { ?>
								<div>
									<button type="button" class="btn btn-grad100 btn-block"> Tender Sudah Di batalkan</button>
								</div>
							<?php } else { ?>
								<div>
									<button type=" button" class="btn btn-grad100 btn-block" data-toggle="modal" data-target="#batalkan_tender_penetapan_langsung"><i class="fas fa-redo"></i> Batalkan Paket Tender</button>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="batalkan_tender_penetapan_langsung" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Apakah Anda Ingin Membatalkan Tender Ini ??</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" id="form_batalkan_paket_transaksi_ajh_langsung">
					<label for="">Alasan Pembatalan Tender</label>
					<textarea name="alasan_batal_tender" class="form-control" cols="30" rows="10"></textarea>
					<?php foreach ($vendor_terpilih as  $value2) { ?>
						<?php if ($value2['jenis_pemilihan'] == 'vendor baru') { ?>
							<input type="hidden" name="kirim_email" value="<?= $value2['email_vendor'] ?>">
							<input type="hidden" name="telpon" value="<?= $value2['telpon_vendor'] ?>">
						<?php  } else { ?>
							<input type="hidden" name="kirim_email" value="<?= $value2['email_usaha'] ?>">
							<input type="hidden" name="telpon" value="<?= $value2['telpon_usaha'] ?>">
						<?php  } ?>
						<input type="hidden" name="username_vendor" value="<?= $value2['username_vendor'] ?>">
						<input type="hidden" name="password_vendor" value="<?= $value2['password_vendor'] ?>">
						<input type="hidden" name="id_vendor" value="<?= $value2['id_vendor'] ?>">
					<?php  } ?>
				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Tidak</button>
				<button type="button" class="btn btn-grad8 btn-block" onclick="bataltendertransaksijahlangsung()">Iya</button>
			</div>
		</div>
	</div>
</div>


<!-- Modal Chat Lihat -->
<div class="modal fade" id="modal_liha_chat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header btn-grad100 text-white">
				<h5 class="modal-title" id="modalTitle">Pesan Baru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p id="pesan_kosong"></p>
				<div class="card-header btn-grad100 text-white p-2">
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
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitleDokumenVendor">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table">
					<thead>
						<tr>
							<th>Nama Persyaratan Tambahan</th>
							<th>Keterangan Persyaratan Tambahan</th>
							<th>Nama Persyaratan Tambahan</th>
							<th>File Persyaratan Tambahan</th>
						</tr>
					</thead>
					<tbody id="table_persyaratan_tambahan">

					</tbody>

				</table>

				<div class="modal-footer">
					<form method="POST" action="<?= base_url('panitiajmtm/beranda/flaging_lulus') ?>">
						<input type="hidden" name="id_vendor_persyaratan">
						<input type="hidden" name="id_paket_persyaratan">

						<button type="submit" class="btn btn-success" id="lulus">Lulus</button>
					</form>
					<button type="button" class="btn btn-danger" id="tutup_tidak_lulus" onclick="tutup_tidak_lulus()" style="display: none;" id="tutup_tidak_lulus">Batal</button>
					<button type="button" class="btn btn-danger" onclick="buka_tidak_lulus()" id="buka_tidak_lulus">Tidak Lulus</button>
				</div>

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
								<th>Dibuat Oleh</th>
								<th>Alasan Perubahan</th>
							</tr>
							<?php $i = 1;
							//  $datetime = DateTime::createFromFormat('Y-m-d', $date);
							//  return $datetime->format('d F Y');
							foreach ($jadwal_tahap1 as $jadwal) { ?>
								<tr>
									<td><?= $i++ ?></td>
									<td>
										<?php if (date('Y-m-d H:i', strtotime($jadwal['tanggal_mulai']))  >= date('Y-m-d H:i')) { ?>
											<b class="text-secondary"> <?= $jadwal['nama_jadwal_transaksi_langsung_detail'] ?></b>
										<?php   } else if (date('Y-m-d H:i', strtotime($jadwal['tanggal_selesai'])) >= date('Y-m-d H:i') || $jadwal['tanggal_mulai'] == date('Y-m-d H:i')) { ?>
											<b class="text-danger"> <?= $jadwal['nama_jadwal_transaksi_langsung_detail'] ?> <small class="badge badge-danger">Tahap Sedang Berlangsung</small></b>
										<?php   } else { ?>
											<b class="text-success"> <?= $jadwal['nama_jadwal_transaksi_langsung_detail'] ?> <small class="badge badge-success">Tahap Sudah Selesai <i class="fa fa-check"></i> </small></b>
										<?php   } ?>
									</td>
									<td><?php if (date('Y-m-d H:i', strtotime($jadwal['tanggal_mulai'])) >= date('Y-m-d H:i')) { ?>
											<b><?= date('Y-m-d H:i', strtotime($jadwal['tanggal_mulai'])) ?></b>
										<?php   } else if (date('Y-m-d H:i', strtotime($jadwal['tanggal_mulai']))  >= date('Y-m-d H:i')) { ?>
											<b><?= date('Y-m-d H:i', strtotime($jadwal['tanggal_mulai'])) ?></b>
										<?php   } else { ?>

											<b><?= date('Y-m-d H:i', strtotime($jadwal['tanggal_mulai'])) ?></b>
										<?php   } ?>
									</td>
									<td>
										<?php if (date('Y-m-d H:i', strtotime($jadwal['tanggal_selesai']))  >= date('Y-m-d H:i')) { ?>
											<b><?= date('Y-m-d H:i', strtotime($jadwal['tanggal_selesai'])) ?></b>
										<?php   } else if ($jadwal['tanggal_selesai'] >= date('Y-m-d H:i')) { ?>
											<b><?= date('Y-m-d H:i', strtotime($jadwal['tanggal_selesai'])) ?></b>
										<?php   } else { ?>

											<b><?= date('Y-m-d H:i', strtotime($jadwal['tanggal_selesai'])) ?></b>
										<?php   } ?>
									</td>
									<td>
										<?php if (date('Y-m-d H:i', strtotime($jadwal['tanggal_mulai'])) >= date('Y-m-d H:i')) { ?>
											<b><?= $jadwal['user_created'] ?></b>
										<?php   } else if (date('Y-m-d H:i', strtotime($jadwal['tanggal_selesai'])) >= date('Y-m-d H:i')) { ?>
											<b><?= $jadwal['user_created'] ?></b>
										<?php   } else { ?>
											<b><?= $jadwal['user_created'] ?></b>
										<?php   } ?>
									</td>
									<td>
										<?php if (date('Y-m-d H:i', strtotime($jadwal['tanggal_mulai']))  >= date('Y-m-d H:i')) { ?>
											<b><?= $jadwal['alasan_jadwal'] ?></b>
										<?php   } else if (date('Y-m-d H:i', strtotime($jadwal['tanggal_selesai'])) >= date('Y-m-d H:i')) { ?>
											<b><?= $jadwal['alasan_jadwal'] ?></b>
										<?php   } else { ?>
											<b><?= $jadwal['alasan_jadwal'] ?></b>
										<?php   } ?>
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

<!-- INI UNTUK BATAL TRANSKASI LANGSUNG NYA -->
<!-- Modal -->
<div class="modal fade" id="modal_batal_transaksi_langsung" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header btn-grad100">
				<h5 class="modal-title" id="modalTitle">Pembatalan tender Transaksi Langsung</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="#" id="form_pembatalan_tender">
					<input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>">
					<input type="hidden" name="nama_pembatal_transaksi_langsung" value="<?= $this->session->userdata('nama_pegawai'); ?>">
					<input type="hidden" name="nama_vendor">
					<div class="form-group">
						<label for="">Alasan Pembatalan Tender</label>
						<textarea name="alasan_batal_paket_transaksi_langsung" class="form-control" id="" cols="30" rows="10"></textarea>
						<!-- <input type="text" class="form-control" name="alasan_batal_paket_transaksi_langsung" id="alasan_batal_paket_transaksi_langsung" placeholder="Alasan Pembatalan Tender"> -->
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="btnSave" onclick="Batalkan_transaksi_langsung()">Batalkan Tender</button>
			</div>
		</div>
	</div>
</div>