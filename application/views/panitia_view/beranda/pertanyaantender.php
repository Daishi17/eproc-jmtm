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

	.card {

		height: 500px;
		border-radius: 15px !important;
		background-image: linear-gradient(to right, #000046 0%, #1CB5E0 51%, #000046 100%);
	}

	.card:hover {
		box-shadow: 0 0 40px #1CB5E0;
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
		width: 500px;
	}

	.msg_cotainer_send {
		width: 100px;
		margin-top: auto;
		margin-bottom: auto;
		margin-right: 10px;
		border-radius: 25px;
		background-color: #78e08f;
		padding: 10px;
		position: relative;
	}

	.msg_cotainer_send2 {
		margin-top: auto;
		margin-bottom: auto;
		margin-right: 10px;
		border-radius: 25px;
		background-color: #BDB76B;
		padding: 10px;
		position: relative;
		width: 500px;
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

<?php if ($ambil_paket['id_kualifikasi'] == 11 || $ambil_paket['id_kualifikasi'] == 7 || $ambil_paket['id_kualifikasi'] == 17 || $ambil_paket['id_kualifikasi'] == 22) { ?>
	<div id="main" class="container">
		<input type="hidden" name="id_paket" id="id_paket" value="<?= $ambil_paket['id_paket'] ?>">
		<div class="float-right p-3">
			<a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca_negosiasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_negosiasi" class="badge badge-danger navbar-badge"></span> Pesan Negosiasi </a>
			<?php if ($ambil_paket['id_kualifikasi'] == 22) { ?>

			<?php } else { ?>
				<a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_prakualifikasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_prakualifikasi" class="badge badge-danger navbar-badge"></span> Sanggahan Prakualifikasi</a>
				<a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_akhir"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_akhir" class="badge badge-danger navbar-badge"></span> Sanggahan Akhir</a>
			<?php } ?>
		</div>
		<div class="breadcrumb bg-primary text-white" style="margin-top: 60px; color: white;"><a href="<?= base_url('beranda') ?>" style="color: white;">Beranda</a>&ensp;&raquo;&ensp;Informasi Tender</div>
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/informasitender/' . $ambil_paket['id_paket']) ?>">Informasi Tender</a>
			</li>

			<li class=" nav-item">
				<a class="nav-link bg-primary text-white active" href="<?= base_url('panitiajmtm/beranda/pertanyaantender/' . $ambil_paket['id_paket']) ?>">Pertanyaan</a>
			</li>
			<?php if ($ambil_paket['id_kualifikasi'] == 22) { ?>

			<?php } else { ?>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/evaluasitender/' . $ambil_paket['id_paket']) ?>">Evaluasi</a>
				</li>
			<?php } ?>

			<?php if ($ambil_paket['id_kualifikasi'] == 22) { ?>

			<?php } else { ?>
				<?php if ($ambil_paket['id_kualifikasi'] == 16 || $ambil_paket['id_kualifikasi'] == 15 || $ambil_paket['id_kualifikasi'] == 12) { ?>
				<?php } else { ?>
					<?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_prakualifikasi['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>
					<?php	} else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_prakualifikasi['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_prakualifikasi['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
						<li class="nav-item">
							<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggah_prakualifikasi/' . $ambil_paket['id_paket']) ?>">Sangahan Prakualifikasi</a>
						</li>
					<?php	} else { ?>
						<li class="nav-item">
							<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggah_prakualifikasi/' . $ambil_paket['id_paket']) ?>">Sangahan Prakualifikasi</a>
						</li>
					<?php	} ?>
				<?php } ?>

			<?php } ?>

			<?php if ($ambil_paket['id_kualifikasi'] == 22) { ?>
				<?php if (date('Y-m-d H:i', strtotime($get_tahap_negosiasi_eauction['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>
				<?php	} else if (date('Y-m-d H:i', strtotime($get_tahap_negosiasi_eauction['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $ambil_paket['id_paket']) ?>">Negosiasi</a>
					</li>
				<?php	} else { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $ambil_paket['id_paket']) ?>">Negosiasi</a>
					</li>
				<?php	} ?>
			<?php } else { ?>
				<?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>
				<?php	} else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $ambil_paket['id_paket']) ?>">Negosiasi</a>
					</li>
				<?php	} else { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $ambil_paket['id_paket']) ?>">Negosiasi</a>
					</li>
				<?php	} ?>
			<?php } ?>

			<?php if ($ambil_paket['id_kualifikasi'] == 22) { ?>
			<?php	} else { ?>
				<?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>
				<?php	} else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $ambil_paket['id_paket']) ?>">Sangahan</a>
					</li>
				<?php	} else { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $ambil_paket['id_paket']) ?>">Sangahan</a>
					</li>
				<?php	} ?>
				<li class="nav-item">
					<a class="nav-link bg-primary text-white" href="<?= base_url('panitiajmtm/beranda/berita_acara/' . $paket['id_paket']) ?>">Berita Acara</a>
				</li>
			<?php	} ?>
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
				<div class="row">
					<div class="col-md-4">

						<table class="">
							<tr>
								<th>PANITIA</th>
								<th><span class="badge badge-primary" style="font-size: large;"> <img src="<?= base_url('assets/img/servant.png') ?>" class="rounded-circle user_img"> </span></th>
								<th>PENYEDIA</th>
								<th><span class="badge badge-danger" style="font-size: large;"> <img src="<?= base_url('assets/img/test1.png') ?>" class="rounded-circle user_img"></span></th>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- ini Untuk Yang Buat Vendor -->
		<div class="col-md-12 col-xl-12 chat">
			<div class="card">
				<div class="card-header btn-grad5">
					<div class="d-flex bd-highlight">
						<div class="img_cont">
							<img src="<?= base_url('assets/img/unnamed.png') ?>" class="rounded-circle user_img">
							<span class="online_icon"></span>
						</div>
						<div class="user_info">
							<span style="font-size: 13px;">Forum Chat Paket <?= $ambil_paket['nama_paket'] ?></span>
							<p>Kode Tender : <?= $ambil_paket['kode_tender'] ?></p>
						</div>
					</div>
					<span id="action_menu_btn"><img src="<?= base_url('assets/img/bumn.png') ?>" width="250px" alt=""><img src="<?= base_url('assets/img/jmtm2.png') ?>" width="250px" alt=""> </span>
				</div>
				<div class="card-body msg_card_body" id="letakpesan">

				</div>
				<div class="card-footer btn-grad5">
					<div class="replay_orang"></div>
					<form id="form_keuangan_add" enctype="multipart/form-data">
						<input type="hidden" name="replay_tujuan">
						<input type="hidden" name="replay_isi">
						<div class="nongol_dok" style="display: none;">
							<div class="bs-callout bs-callout-info ada_file" style="width: 300px;">
								<label class="fake_input_dok"></label>
								<a href="javascript:;" class="float-right" onclick="hapus_data_file()">X</a>
							</div>
						</div>
						<div class="input-group">
							<?php if ($data2 == null) { ?>

							<?php } else { ?>
								<input type="hidden" name="id_penerima" id="id_penerima" value="<?= $data2['id_mengikuti_vendor'] ?>">
							<?php } ?>
							<input type="hidden" name="id_pengirim" id="id_pengirim" value="<?= $this->session->userdata('id_pegawai'); ?>">
							<input type="hidden" name="id_paket" value="<?= $ambil_paket['id_paket'] ?>">
							<div class="input-group-append">
								<div class="input-group-text attach_btn">
									<button class="btn btn-danger btn-md btn-block" type="button" id="loadFileXml" value="loadXml" onclick="document.getElementById('file').click();"><i class="fas fa-paperclip"></i></button>
									<br>
									<button class="btn btn-primary btn-md btn-block" type="button" id="loadFileXml" value="loadXml" onclick="document.getElementById('file_img').click();"><i class="fas fa-camera-retro"></i></button>
								</div>
								<input type="file" style="display:none;" id="file" name="dokumen_chat" />
								<input type="file" style="display:none;" id="file_img" name="img_chat" />
							</div>
							<?php if ($ambil_paket['id_kualifikasi'] == 22) { ?>
								<?php if (date('Y-m-d H:i', strtotime($penjelasan_tender_eauction['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($penjelasan_tender_eauction['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>

									<?php $date2 = $penjelasan_tender_eauction['tanggal_selesai_jadwal'];
									$date20 = new DateTime($date2);
									$date_plus20 = $date20->modify("+3 hours");
									if (date('Y-m-d H:i', strtotime($penjelasan_tender_eauction['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

									<?php	} else if ($date_plus20->format("Y-m-d H:i") >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($penjelasan_tender_eauction['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
										<textarea name="isi" class="form-control type_msg" placeholder="Type your message..."></textarea>
										<div class="input-group-append">
											<button type="submit" id="upload" name="upload" class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></button>

										</div>
									<?php	} else { ?>
										<textarea disabled name="isi" class="form-control type_msg" placeholder="Waktu Penjelasan Dokumen Prakualifikasi Sudah Habis..."></textarea>
										<div class="input-group-append">
											<!-- <button type="submit" id="upload" name="upload" class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></button> -->
										</div>
									<?php	} ?>
								<?php } else { ?>
									<?php $date1 = $penjelasan_tender_eauction['tanggal_selesai_jadwal'];
									$date = new DateTime($date1);
									$date_plus = $date->modify("+3 hours");
									if (date('Y-m-d H:i', strtotime($penjelasan_tender_eauction['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

									<?php	} else if ($date_plus->format("Y-m-d H:i") >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($penjelasan_tender_eauction['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
										<textarea name="isi" class="form-control type_msg" placeholder="Type your message..."></textarea>
										<div class="input-group-append">
											<button type="submit" id="upload" name="upload" class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></button>

										</div>
									<?php	} else { ?>
										<textarea disabled name="isi" class="form-control type_msg" placeholder="Waktu Penjelasan Dokumen Pemilihan / Penawaran Sudah Habis..."></textarea>
										<div class="input-group-append">
											<!-- <button type="submit" id="upload" name="upload" class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></button> -->
										</div>
									<?php	} ?>
								<?php } ?>
							<?php } else { ?>
								<?php if (date('Y-m-d H:i', strtotime($get_tahap_penjelasan_prakualifikasi['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_penjelasan_prakualifikasi['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
									<?php $date2 = $get_tahap_penjelasan_prakualifikasi['tanggal_selesai_jadwal'];
									$date20 = new DateTime($date2);
									$date_plus20 = $date20->modify("+3 hours");
									if (date('Y-m-d H:i', strtotime($get_tahap_penjelasan_prakualifikasi['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

									<?php	} else if ($date_plus20->format("Y-m-d H:i") >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_penjelasan_prakualifikasi['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
										<textarea name="isi" class="form-control type_msg" placeholder="Type your message..."></textarea>
										<div class="input-group-append">
											<button type="submit" id="upload" name="upload" class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></button>

										</div>
									<?php	} else { ?>
										<textarea disabled name="isi" class="form-control type_msg" placeholder="Waktu Penjelasan Dokumen Prakualifikasi Sudah Habis..."></textarea>
										<div class="input-group-append">
											<!-- <button type="submit" id="upload" name="upload" class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></button> -->
										</div>
									<?php	} ?>
								<?php } else { ?>
									<?php $date1 = $get_tahap['tanggal_selesai_jadwal'];
									$date = new DateTime($date1);
									$date_plus = $date->modify("+3 hours");
									if (date('Y-m-d H:i', strtotime($get_tahap['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

									<?php	} else if ($date_plus->format("Y-m-d H:i") >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
										<textarea name="isi" class="form-control type_msg" placeholder="Type your message..."></textarea>
										<div class="input-group-append">
											<button type="submit" id="upload" name="upload" class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></button>

										</div>
									<?php	} else { ?>
										<textarea disabled name="isi" class="form-control type_msg" placeholder="Waktu Penjelasan Dokumen Pemilihan / Penawaran Sudah Habis..."></textarea>
										<div class="input-group-append">
											<!-- <button type="submit" id="upload" name="upload" class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></button> -->
										</div>
									<?php	} ?>
								<?php } ?>
							<?php } ?>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	</div>
<?php } else { ?>
	<div id="main" class="container">
		<input type="hidden" name="id_paket" id="id_paket" value="<?= $ambil_paket['id_paket'] ?>">
		<div class="float-right p-3">
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
				<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/informasitender/' . $ambil_paket['id_paket']) ?>">Informasi Tender</a>
			</li>
			<li class=" nav-item">
				<a class="nav-link bg-primary text-white active" href="<?= base_url('panitiajmtm/beranda/pertanyaantender/' . $ambil_paket['id_paket']) ?>">Pertanyaan</a>
			</li>

			<li class="nav-item">
				<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/evaluasitender/' . $ambil_paket['id_paket']) ?>">Evaluasi</a>
			</li>
			<!-- <li class="nav-item">
			<a class="nav-link active " href="<?= base_url('panitiajmtm/beranda/reverseauctiontender/' . $ambil_paket['id_paket']) ?>">Reverse Auction</a>
		</li> -->

			<?php if ($ambil_paket['id_kualifikasi'] == 16 || $ambil_paket['id_kualifikasi'] == 14 || $ambil_paket['id_kualifikasi'] == 15 || $ambil_paket['id_kualifikasi'] == 12 || $ambil_paket['id_kualifikasi'] == 18) { ?>

			<?php } else { ?>
				<?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_prakualifikasi['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>
				<?php	} else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_prakualifikasi['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_prakualifikasi['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggah_prakualifikasi/' . $ambil_paket['id_paket']) ?>">Sangahan Prakualifikasi</a>
					</li>
				<?php	} else { ?>
					<li class="nav-item">
						<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggah_prakualifikasi/' . $ambil_paket['id_paket']) ?>">Sangahan Prakualifikasi</a>
					</li>
				<?php	} ?>
			<?php } ?>
			<?php if (date('Y-m-d H:i', strtotime($get_tahap_prakualfiikasi_satu_file_penetapan['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>
			<?php	} else if (date('Y-m-d H:i', strtotime($get_tahap_prakualfiikasi_satu_file_penetapan['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_prakualfiikasi_satu_file_penetapan['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $ambil_paket['id_paket']) ?>">Negosiasi</a>
				</li>
			<?php	} else { ?>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $ambil_paket['id_paket']) ?>">Negosiasi</a>
				</li>
			<?php	} ?>
			<?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>
			<?php	} else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $ambil_paket['id_paket']) ?>">Sangahan</a>
				</li>
			<?php	} else { ?>
				<li class="nav-item">
					<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $ambil_paket['id_paket']) ?>">Sangahan</a>
				</li>
			<?php	} ?>
			<li class="nav-item">
				<a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/berita_acara/' . $ambil_paket['id_paket']) ?>">Berita Acara</a>
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
				<div class="row">
					<div class="col-md-4">

						<table class="">
							<tr>
								<th>PANITIA</th>
								<th><span class="badge badge-primary" style="font-size: large;"> <img src="<?= base_url('assets/img/servant.png') ?>" class="rounded-circle user_img"> </span></th>
								<th>PENYEDIA</th>
								<th><span class="badge badge-danger" style="font-size: large;"> <img src="<?= base_url('assets/img/test1.png') ?>" class="rounded-circle user_img"></span></th>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- ini Untuk Yang Buat Vendor -->
		<div class="col-md-12 col-xl-12 chat">
			<div class="card">
				<div class="card-header btn-grad5">
					<div class="d-flex bd-highlight">
						<div class="img_cont">
							<img src="<?= base_url('assets/img/unnamed.png') ?>" class="rounded-circle user_img">
							<span class="online_icon"></span>
						</div>
						<div class="user_info">
							<span style="font-size: 13px;">Forum Chat Paket <?= $ambil_paket['nama_paket'] ?></span>
							<p>Kode Tender : <?= $ambil_paket['kode_tender'] ?></p>
						</div>
					</div>
					<span id="action_menu_btn"><img src="<?= base_url('assets/img/bumn.png') ?>" width="250px" alt=""><img src="<?= base_url('assets/img/jmtm2.png') ?>" width="250px" alt=""> </span>
				</div>
				<div class="card-body msg_card_body" id="letakpesan">

				</div>

				<div class="card-footer btn-grad5">

					<div class="replay_orang"></div>
					<form id="form_keuangan_add" enctype="multipart/form-data">
						<input type="hidden" name="replay_tujuan">
						<input type="hidden" name="replay_isi">
						<div class="nongol_dok" style="display: none;">
							<div class="bs-callout bs-callout-info ada_file" style="width: 300px;">
								<label class="fake_input_dok"></label>
								<a href="javascript:;" class="float-right" onclick="hapus_data_file()">X</a>
							</div>
						</div>
						<div class="input-group">
							<?php if ($data2 == null) { ?>

							<?php } else { ?>
								<input type="hidden" name="id_penerima" id="id_penerima" value="<?= $data2['id_mengikuti_vendor'] ?>">
							<?php } ?>
							<input type="hidden" name="id_pengirim" id="id_pengirim" value="<?= $this->session->userdata('id_pegawai'); ?>">
							<input type="hidden" name="id_paket" value="<?= $ambil_paket['id_paket'] ?>">
							<div class="input-group-append">
								<div class="input-group-text attach_btn">
									<button class="btn btn-danger btn-md btn-block" type="button" id="loadFileXml" value="loadXml" onclick="document.getElementById('file').click();"><i class="fas fa-paperclip"></i></button>
									<br>
									<button class="btn btn-primary btn-md btn-block" type="button" id="loadFileXml" value="loadXml" onclick="document.getElementById('file_img').click();"><i class="fas fa-camera-retro"></i></button>
								</div>
								<input type="file" style="display:none;" id="file" name="dokumen_chat" />
								<input type="file" style="display:none;" id="file_img" name="img_chat" />
							</div>
							<?php $date1 = $get_tahap['tanggal_selesai_jadwal'];
							$date = new DateTime($date1);
							$date_plus = $date->modify("+3 hours");
							if (date('Y-m-d H:i', strtotime($get_tahap['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

							<?php	} else if ($date_plus->format("Y-m-d H:i") >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
								<textarea name="isi" class="form-control type_msg" placeholder="Type your message..."></textarea>
								<div class="input-group-append">
									<button type="submit" id="upload" name="upload" class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></button>

								</div>
							<?php	} else { ?>
								<textarea disabled name="isi" class="form-control type_msg" placeholder="Waktu Penjelasan Sudah Habis..."></textarea>
								<div class="input-group-append">
									<!-- <button type="submit" id="upload" name="upload" class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></button> -->
								</div>
							<?php	} ?>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	</div>
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