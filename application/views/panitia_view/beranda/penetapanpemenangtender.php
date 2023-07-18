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
<form id="form_gugurin_vendor_semua">
	<input type="hidden" name="ambil_id_paket" value="<?= $paket['id_paket'] ?>">
</form>
<div id="main" class="container">
	<input type="hidden" id="id_paket_evaluasi" value="<?= $paket['id_paket'] ?>">
	<input type="hidden" id="id_paket" value="<?= $paket['id_paket'] ?>">
	<div class="float-right p-3">
		<a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi" class="badge badge-danger navbar-badge"></span> Pesan Penjelasan </a>
		<a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca_negosiasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_negosiasi" class="badge badge-danger navbar-badge"></span> Pesan Negosiasi </a>

		<?php if ($paket['id_kualifikasi'] == 12 || $paket['id_kualifikasi'] == 9 || $paket['id_kualifikasi'] == 14 || $paket['id_kualifikasi'] == 18) { ?>

		<?php } else { ?>
			<a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_prakualifikasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_prakualifikasi" class="badge badge-danger navbar-badge"></span> Sanggahan Prakualifikasi</a>
		<?php } ?>
		<a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_akhir"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_akhir" class="badge badge-danger navbar-badge"></span> Sanggahan Akhir</a>
	</div>
	<nav aria-label="breadcrumb" class="mt-3">
		<ol class="breadcrumb bg-primary">
			<li class="breadcrumb-item"><a style="color: white;" href="<?= base_url('informasitender') ?>">Beranda &raquo; Informasi Tender</a></li>
		</ol>
	</nav>
	<div id="demo"></div>
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
		<?php if ($paket['id_kualifikasi'] == 16  || $paket['id_kualifikasi'] == 12 || $paket['id_kualifikasi'] == 14 || $paket['id_kualifikasi'] == 18) { ?>

		<?php } else { ?>
			<?php if ($get_tahap_dokumen_sangahan_prakualifikasi['tanggal_mulai_jadwal']  >= date('d-m-Y H:i')) { ?>
			<?php	} else if ($get_tahap_dokumen_sangahan_prakualifikasi['tanggal_selesai_jadwal']  >= date('d-m-Y H:i') || $get_tahap_dokumen_sangahan_prakualifikasi['tanggal_mulai_jadwal']  == date('d-m-Y H:i')) { ?>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggah_prakualifikasi/' . $paket['id_paket']) ?>">Sangahan Prakualifikasi</a>
				</li>
			<?php	} else { ?>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggah_prakualifikasi/' . $paket['id_paket']) ?>">Sangahan Prakualifikasi</a>
				</li>
			<?php	} ?>
		<?php } ?>
		<?php if ($paket['id_kualifikasi'] == 8 || $paket['id_kualifikasi'] == 13 || $paket['id_kualifikasi'] == 15) { ?>
			<?php if ($evaluasi_penawaran_satu_file_prakualfikasi['tanggal_mulai_jadwal']  >= date('d-m-Y H:i')) { ?>
			<?php	} else if ($evaluasi_penawaran_satu_file_prakualfikasi['tanggal_selesai_jadwal']  >= date('d-m-Y H:i') || $evaluasi_penawaran_satu_file_prakualfikasi['tanggal_mulai_jadwal']  == date('d-m-Y H:i')) { ?>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Negosiasi</a>
				</li>
			<?php	} else { ?>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Negosiasi</a>
				</li>
			<?php	} ?>
		<?php } else { ?>
			<?php if ($get_tahap_dokumen_negosiasi['tanggal_mulai_jadwal']  >= date('d-m-Y H:i')) { ?>
			<?php	} else if ($get_tahap_dokumen_negosiasi['tanggal_selesai_jadwal']  >= date('d-m-Y H:i') || $get_tahap_dokumen_negosiasi['tanggal_mulai_jadwal']  == date('d-m-Y H:i')) { ?>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Negosiasi</a>
				</li>
			<?php	} else { ?>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Negosiasi</a>
				</li>
			<?php	} ?>
		<?php 	} ?>




		<?php if ($get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal']  >= date('d-m-Y H:i')) { ?>
		<?php	} else if ($get_tahap_dokumen_sangahan_akhir['tanggal_selesai_jadwal']  >= date('d-m-Y H:i') || $get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal']  == date('d-m-Y H:i')) { ?>
			<li class="nav-item">
				<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $paket['id_paket']) ?>">Sangahan</a>
			</li>
		<?php	} else { ?>
			<li class="nav-item">
				<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $paket['id_paket']) ?>">Sangahan</a>
			</li>
		<?php	} ?>
	</ul>
	<br>
	<div class="tab-content">
		<div class="content">
			<div class="card border-primary mb-3">
				<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Penetapan Pemenang
				</div>
				<div class="card-body">
					<div style="overflow-x:auto;">
						<?php if ($vendor == null) { ?>
							<table class="table">
							<?php	} else { ?>
								<table class="table" id="tbl_evaluasi">
								<?php } ?>
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Peserta</th>
										<th>Harga Terkoreksi (Rp)</th>
										<th>Kelengkapan Syarat Dokumen Kualifikasi</th>
										<th>Aksi</th>
										<th>Alasan Pembatalan</th>
									</tr>
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
<input type="hidden" id="id_paket" value="<?= $paket['id_paket'] ?>">
<!-- Modal Chat Lihat -->
<div class="modal fade" id="alasan_batalkan_pemanang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-danger text-white">
				<h5 class="modal-title" id="exampleModalLabel">Alasan Batalkan Pemenang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" id="form_saya_mau_batalkan">
					<input type="hidden" id="id_ambil_mengikuti_paket" name="saya_ambil_id_mengikuti_paket">
					<textarea name="alasan_saya_batalkan_tender" class="form-control" id="alasan_saya_batalkan_tender" cols="30" rows="10"></textarea>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa fa-times"></i> Batal</button>
				<button type="button" class="btn btn-success" onclick="Kirim_batalkan_pemenang()"> <i class="fas fa fa-papper-plane"></i> Kirim Pembatalan</button>
			</div>
		</div>
	</div>
</div>