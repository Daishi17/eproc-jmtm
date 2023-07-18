<!------ Include the above in your HEAD tag ---------->
<style>
	.btn-grad5 {
		width: 100%;
		background-image: linear-gradient(to right, #000046 0%, #1CB5E0 51%, #000046 100%);
		text-transform: uppercase;
		transition: 0.5s;
		background-size: 200% auto;
		color: white;

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

		border-radius: 10px;
	}

	.btn-grad6:hover {
		background-position: right center;
		/* change the direction of the change here */
		color: #fff;
		box-shadow: 0 0 40px #1CB5E0;
		text-decoration: none;
	}

	.btn-grad15 {
		background-image: linear-gradient(to right, #fc00ff 0%, #00dbde 51%, #fc00ff 100%)
	}

	.btn-grad15 {
		text-transform: uppercase;
		transition: 0.5s;
		background-size: 200% auto;
		color: white;
		box-shadow: 0 0 20px #eee;

	}

	.btn-grad15:hover {
		background-position: right center;
		/* change the direction of the change here */
		color: #fff;
		text-decoration: none;
		box-shadow: 0 0 40px #fc00ff;
	}


	.user_img_msg {
		height: 100% !important;
		width: 100% !important;
		/* border: 1.5px solid #f5f6fa; */
	}

	#textnya {
		font-size: large;
		font: message-box;
		font-weight: bolder;
	}

	.profileku {
		width: 100% !important;
		height: 65%;
		border-radius: 10px;
		background: rgb(7, 6, 18);
		background: linear-gradient(90deg, rgba(30, 90, 40, 1) 0%, rgba(42, 41, 100, 1) 100%);
	}

	.user_img_ku {
		height: 40px;
		width: 40px;
		border: 1.5px solid #f5f6fa;
	}


	.chat {
		margin-top: auto;
		margin-bottom: auto;
	}




	.contacts_body {
		padding: 0.75rem 0 !important;
		overflow-y: auto;
		white-space: nowrap;
	}

	.msg_card_body {
		overflow-y: auto;
	}

	.card-header {
		border-radius: 15px 15px 0 0 !important;
		border-bottom: 0 !important;
	}

	.card-footer {
		border-radius: 0 0 15px 15px !important;
		border-top: 0 !important;
	}

	.container {
		align-content: center;
	}

	.search {
		border-radius: 15px 0 0 15px !important;
		background: rgb(209, 226, 227);
		background: linear-gradient(90deg, rgba(209, 226, 227, 1) 5%, rgba(255, 209, 0, 0.30015756302521013) 86%);
		border: 0 !important;
		color: black !important;
	}

	.search:focus {
		box-shadow: none !important;
		outline: 0px !important;
	}

	.type_msg {
		background: rgb(7, 6, 18);
		background: linear-gradient(90deg, rgba(30, 90, 40, 1) 0%, rgba(42, 41, 100, 1) 100%);
		border: 0 !important;
		color: white !important;
		height: 60px !important;
		overflow-y: auto;
	}

	.type_msg:focus {
		box-shadow: none !important;
		outline: 0px !important;
	}

	.attach_btn {
		border-radius: 15px 0 0 15px !important;
		background: rgb(7, 6, 18);
		background: linear-gradient(90deg, rgba(30, 90, 40, 1) 0%, rgba(42, 41, 100, 1) 100%);
		border: 0 !important;
		color: white !important;
		cursor: pointer;
	}

	.send_btn {
		border-radius: 0 15px 15px 0 !important;
		background: rgb(7, 6, 18);
		background: linear-gradient(90deg, rgba(30, 90, 40, 1) 0%, rgba(42, 41, 100, 1) 100%);
		border: 0 !important;
		color: white !important;
		cursor: pointer;
	}

	.search_btn {
		border-radius: 0 15px 15px 0 !important;
		background: rgb(7, 6, 18);
		background: linear-gradient(90deg, rgba(30, 90, 40, 1) 0%, rgba(42, 41, 100, 1) 100%);
		border: 0 !important;
		color: white !important;
		cursor: pointer;
	}

	.contacts {
		list-style: none;
		padding: 0;
	}

	.contacts li {
		width: 100% !important;
		padding: 5px 10px;
		margin-bottom: 15px !important;
	}

	.active-angga {
		background: rgb(7, 6, 18);
		background: linear-gradient(90deg, rgba(30, 90, 40, 1) 0%, rgba(42, 41, 100, 1) 100%);
	}

	.active-anggi {
		background-color: #c23616 !important;
	}

	.user_img {
		height: 70px;
		width: 70px;
		border: 1.5px solid #f5f6fa;

	}

	.user_img_msg {
		height: 40px;
		width: 40px;
		border: 1.5px solid #f5f6fa;

	}

	.img_cont {
		position: relative;
		height: 70px;
		width: 70px;
	}

	.img_cont_msg {
		height: 40px;
		width: 40px;
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

	.offline {
		background-color: #c23616 !important;
	}

	.user_info {
		margin-top: auto;
		margin-bottom: auto;
		margin-left: 15px;
	}

	.user_info_ku {
		/* margin-top: auto; */
		margin-bottom: auto;
		margin-left: 15px;
	}

	.user_info_ku span {
		font-size: 20px;
		color: white;
	}


	.user_info span {
		font-size: 20px;
		color: white;
	}

	.user_info_ku p {
		font-size: 10px;
		color: rgba(255, 255, 255, 0.6);
	}

	.user_info p {
		font-size: 10px;
		color: rgba(255, 255, 255, 0.6);
	}

	.video_cam {
		margin-left: 50px;
		margin-top: 5px;
	}

	.video_cam span {
		color: white;
		font-size: 20px;
		cursor: pointer;
		margin-right: 20px;
	}

	.msg_cotainer {
		margin-top: auto;
		margin-bottom: auto;
		margin-left: 10px;
		border-radius: 25px;
		background-color: #82ccdd;
		padding: 10px;
		position: relative;
	}

	.msg_cotainer_send {
		margin-top: auto;
		margin-bottom: auto;
		margin-right: 10px;
		border-radius: 25px;
		background-color: #78e08f;
		padding: 10px;
		position: relative;
	}

	.msg_time {
		position: absolute;
		left: 0;
		bottom: -17px;
		color: rgba(255, 255, 255, 0.5);
		font-size: 10px;
	}

	.msg_time_send {
		position: absolute;
		right: 0;
		bottom: -15px;
		color: rgba(255, 255, 255, 0.5);
		font-size: 10px;
	}

	.msg_head {
		position: relative;
	}

	#action_menu_btn {
		position: absolute;
		right: 10px;
		top: 10px;
		color: white;
		cursor: pointer;
		font-size: 20px;
	}

	.action_menu {
		z-index: 1;
		position: absolute;
		padding: 15px 0;
		background: white;
		color: white;
		border-radius: 15px;
		top: 30px;
		right: 15px;
		display: none;
	}

	.action_menu ul {
		list-style: none;
		padding: 0;
		margin: 0;
	}

	.action_menu ul li {
		width: 100%;
		padding: 10px 15px;
		margin-bottom: 5px;
	}

	.action_menu ul li i {
		padding-right: 10px;

	}

	.action_menu ul li:hover {
		cursor: pointer;
		background: white;
	}

	@media(max-width: 576px) {
		.contacts_card {
			margin-bottom: 15px !important;
		}
	}
</style>
<div class="preloader">
	<div class="loading">
		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
	</div>
</div>
<div id="main" class="container">
	<input type="hidden" name="id_paket" id="id_paket" value="<?= $ambil_paket['id_paket'] ?>">
	<div class="float-right p-3">
		<a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi" class="badge badge-danger navbar-badge"></span> Pesan Penjelasan </a>
		<a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca_negosiasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_negosiasi" class="badge badge-danger navbar-badge"></span> Pesan Negosiasi </a>

		<?php if ($ambil_paket['id_kualifikasi'] == 16 || $ambil_paket['id_kualifikasi'] == 15 || $ambil_paket['id_kualifikasi'] == 12 || $ambil_paket['id_kualifikasi'] == 14 || $ambil_paket['id_kualifikasi'] == 18) { ?>
		<?php } else { ?>
			<a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_prakualifikasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_prakualifikasi" class="badge badge-danger navbar-badge"></span> Sanggahan Prakualifikasi</a>

		<?php } ?>
		<a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_akhir"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_akhir" class="badge badge-danger navbar-badge"></span> Sanggahan Akhir</a>
	</div>
	<div class="breadcrumb bg-primary text-white" style="margin-top: 60px; color: white;"><a href="<?= base_url('beranda') ?>" style="color: white;">Beranda</a>&ensp;&raquo;&ensp;Informasi Tender</div>
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/informasitender/' . $paket['id_paket']) ?>">Informasi Tender</a>
		</li>
		<li class=" nav-item">
			<a class="nav-link bg-info text-white " href="<?= base_url('panitiajmtm/beranda/pertanyaantender/' . $paket['id_paket']) ?>">Pertanyaan</a>
		</li>

		<li class="nav-item">
			<a class="nav-link bg-info text-white active" href="<?= base_url('panitiajmtm/beranda/evaluasitender/' . $paket['id_paket']) ?>">Evaluasi</a>
		</li>
		<!-- <li class="nav-item">
			<a class="nav-link active " href="<?= base_url('panitiajmtm/beranda/reverseauctiontender/' . $paket['id_paket']) ?>">Reverse Auction</a>
		</li> -->
		<?php if ($paket['id_kualifikasi'] == 16 || $paket['id_kualifikasi'] == 18 || $paket['id_kualifikasi'] == 12 || $paket['id_kualifikasi'] == 14) { ?>

		<?php } else { ?>
			<li class="nav-item">
				<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggah_prakualifikasi/' . $paket['id_paket']) ?>">Sangahan Prakualifikasi</a>
			</li>
		<?php } ?>
		<?php if ($get_tahap_prakualfiikasi_satu_file_penetapan['tanggal_mulai_jadwal']  >= date('d-m-Y H:i')) { ?>
		<?php	} else if ($get_tahap_prakualfiikasi_satu_file_penetapan['tanggal_selesai_jadwal']  >= date('d-m-Y H:i') || $get_tahap_prakualfiikasi_satu_file_penetapan['tanggal_mulai_jadwal']  == date('d-m-Y H:i')) { ?>
			<li class="nav-item">
				<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Negosiasi</a>
			</li>
		<?php	} else { ?>
			<li class="nav-item">
				<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Negosiasi</a>
			</li>
		<?php	} ?>
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
		<li class="nav-item">
			<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/berita_acara/' . $paket['id_paket']) ?>">Berita Acara</a>
		</li>
	</ul>
	<div class="tab-content">
		<div class="card-body bg-white">
			<div class="container-fluid">
				<div class="row">
					<table class="table table-striped">
						<tbody>
							<tr>
								<th style="width: 200px;">Kode Tender</th>
								<td><?= $ambil_paket['kode_tender'] ?></td>
							</tr>
							<tr>
								<th>Nama Paket</th>
								<td><?= $ambil_paket['nama_paket'] ?></td>
							</tr>
							<tr>
								<th>Nama Jenis Pengadaan</th>
								<td><?= $ambil_paket['nama_jenis_pengadaan'] ?></td>
							</tr>
							<tr>
								<th>Nama Metode Pemilihan</th>
								<td><?= $ambil_paket['nama_metode_pemilihan'] ?></td>
							</tr>
							<tr>
								<th>Divisi</th>
								<td><?= $ambil_paket['nama_unit_kerja'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="card" style="margin-top: 30px;">
		<div class="card-header bg-primary" style="color:white;">
			<i class="fa fa-comment-alt"></i>
			File Sanggahan Yang Sudah Diupload
		</div>
		<!-- looping filenya dia -->
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Vendor</th>
					<th>Nama File</th>
					<th>Download File</th>
					<th>File Balasan Panitia</th>
					<th>Keterangan Panitia</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody class="bg-white">
				<?php $i = 1;
				foreach ($get_file_sanggah as $key => $value) { ?>
					<tr>
						<td><?= $i++ ?></td>
						<th><?= $value['username_vendor'] ?></th>
						<td><?= $value['nama_dokumen_sanggahan'] ?></td>
						<td><a target="_blank" href="https://vms.jmtm.co.id/file_dokumen_sanggahan_akhir/<?= $value['file_dokumen_sanggahan'] ?>"><img src="<?= base_url('assets/img/file-icon.png') ?>" style="width: 50px;" alt=""></a></td>
						<td>
							<?php if ($value['balasan_sanggahan_panitia'] == NULL) { ?>

							<?php } else { ?>
								<a target="_blank" href="<?= base_url('file_dokumen_sanggahan_akhir/' . $value['balasan_sanggahan_panitia']) ?>"><img src="<?= base_url('assets/img/file-icon.png') ?>" style="width: 50px;" alt=""></a>
							<?php } ?>
						</td>
						<td><?= $value['keterangan_panitia'] ?></td>
						<td><a href="javascript:;" data-toggle="modal" data-target="#balas_sanggahan_akhir<?= $value['id_dokumen_sanggahan_akhir'] ?>" class="btn btn-sm btn-primary">Balas</a></td>
					</tr>
				<?php    } ?>

			</tbody>

		</table>
	</div>
</div>
</div>
</div>
</div>

<!-- Modal Chat Lihat -->
<?php foreach ($get_file_sanggah as $key => $value) { ?> ?>
	<div class="modal fade" id="balas_sanggahan_akhir<?= $value['id_dokumen_sanggahan_akhir'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-info text-white">
					<h5 class="modal-title" id="modalTitle">Balas Sanggahan Akhir</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('panitiajmtm/beranda/balas_sanggahan_akhir/' . $paket['id_paket']) ?>" method="POST" enctype="multipart/form-data">
					<div class="modal-body">
						<input type="hidden" name="id_dokumen_sanggahan_akhir" value="<?= $value['id_dokumen_sanggahan_akhir'] ?>">
						<div class="form-group">
							<label for="exampleFormControlTextarea1">Keterangan</label>
							<textarea class="form-control" name="keterangan_panitia"></textarea>
						</div>
						<div class="form-group">
							<label for="exampleFormControlTextarea1">File Balasan Sanggahan Akhir</label>
							<input type="file" class="form-control" name="balasan_sanggahan_panitia">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Kirim</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php } ?>