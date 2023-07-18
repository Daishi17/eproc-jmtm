<!DOCTYPE html>
<html lang="en">

<head>
	<title>Summary Tender : <?= $angga['kode_tender'] ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="Shortcut Icon" href="<?= base_url('assets/img/unnamed.png') ?>" type="image/x-icon" sizes="96x96" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/boostrapnew/dist/css/bootstrap.min.css" type="text/css" media="all" />
	<!-- dataTables -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css" media="all">

	<!-- select2 -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css" media="all">
	<!-- custom -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/kintek.css" type="text/css" media="all">
	<!-- Sweetalert-->
	<link href="<?= base_url('assets/'); ?>sweetalert2/sweetalert2.min.css" rel="stylesheet" media="all">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css"> -->
	<link href="<?= base_url('assets/datetimepicekernew/plugins/'); ?>jquery.datetimepicker.min.css" rel="stylesheet" media="all">
	<script src="<?= base_url('assets/'); ?>js/sweetalert.min.js" media="all"></script>

	<script type="text/javascript" src="<?= base_url('assets/') ?>boostrapnew/dist/js/jquery.min.js" media="all"></script>
	<style>
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
			/* change tde direction of tde change here */
			color: #00d2ff;
			text-decoration: none;
			box-shadow: 0 0 40px #00d2ff;
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
	</style>
</head>

<body style="font-size: 13px;">
	<div class="container">
		<input type="hidden" value="<?= $paket['id_paket'] ?>" id="id_paketkusaja">
		<input type="hidden" value="<?= $paket['id_paket'] ?>" id="id_paket">
		<br>
		<form action="" id="form_data_tender">
			<input type="hidden" value="<?= $paket['id_paket'] ?>" id="id_paket_tender">
			<input type="hidden" name="tanggal_buat_paket_tender" value="<?php echo date('d F Y || H:i:s') ?>">
			<div class="content">
				<div class="container-fluid">
					<img class="pull-right" alt="LPSE" src="<?= base_url() ?>assets/img/jmtm2.png" width="15%" />
					<img class="pull-left" alt="LPSE" src="<?= base_url() ?>assets/img/bumn.png" width="15%" style="margin-left: 69%;" />
				</div>
				<div class="content tab-content">
					<table class="table table-bordered">
						<h4 class="text-center">INFORMASI LELANG</h4>
						<tr>
							<th>Kode Tender</th>
							<td><?= $angga['kode_tender'] ?></td>
						</tr>
						<tr>
							<th>Nama Paket</th>
							<td><?= $angga['nama_paket'] ?></td>
						</tr>
						<tr>
							<th>Agency</th>
							<td><?= $angga['nama_pegawai'] ?></td>
						</tr>
						<tr>
							<th>Divisi</th>
							<td><?= $angga['nama_unit_kerja'] ?></td>
						</tr>
						<tr>
							<th>Jenis Pengadaan</th>
							<td><?= $angga['nama_jenis_pengadaan'] ?></td>
						</tr>
						<tr>
							<th>Metode Pemilihan</th>
							<td><?= $angga['nama_metode_pemilihan'] ?></td>
						</tr>
						<tr>
							<th>Nilai Pagu Paket</th>
							<td><?= "Rp " . number_format($total_hps['hps'], 2, ',', '.') ?></td>
						</tr>
						<tr>
							<th>Nilai Hps Paket</th>
							<td><?php if ($total_rincian_hps_pdf == null) { ?>
									<?php $total = 0;
									foreach ($total_rincian_hps as $key => $value) { ?>
										<?php
										$total +=  $value['satuan_rincian_hps'] * $value['harga_rincian_hps'] + ($value['persen_rincian_hps'] / 100) * $value['satuan_rincian_hps'] * $value['harga_rincian_hps'];
										?>
									<?php } ?>
									<?= "Rp " . number_format($total, 2, ',', '.') ?>
								<?php  } else { ?>
									<?= "Rp " . number_format($total_hps_pdf_ada['total_rincian_hps_pdf'], 2, ',', '.')  ?>
								<?php } ?></td>
						</tr>
						<!-- <tr>
							<th>Jenis Kontrak</th>
							<td>
								<?php foreach ($jenis_kontrak as $value) { ?>
									<table>
										<tr>
											<th>Cara Pembayaran</th>
											<td><?= $value['cara_pembayaran'] ?></td>
										</tr>
										<tr>
											<th>Pembebanan Tahun Anggaran</th>
											<td><?= $value['pembebanan_tahun_anggaran'] ?></td>
										</tr>
										<tr>
											<th>Sumber Pendanaan</th>
											<td><?= $value['sumber_pendanaan'] ?></td>
										</tr>
									</table>
								<?php } ?>
							</td>
						</tr> -->
						<tr>
							<th>Anggaran</th>
							<td>
								<?php foreach ($sumber_dana as $key => $value) { ?>
									<?= $value['tahun_anggaran'] ?> - BUMN - <?= $angga['nama_jenis_anggaran'] ?>
									<br>
								<?php } ?>
							</td>
						</tr>
						<tr>
							<th>Lokasi Pekerjaan</th>
							<td>
								<table>
									<tr>
										<th>Provinsi</th>
										<th>Kabupaten</th>
										<th>Detail Lokasi</th>
									</tr>
									<?php foreach ($lokasi_pekerjaan as $value) { ?>
										<tr>
											<td><?= $value['nama_provinsi'] ?></td>
											<td><?= $value['nama_kabupaten'] ?></td>
											<td><?= $value['detail_lokasi'] ?></td>
										</tr>
									<?php } ?>
								</table>
							</td>
						</tr>
						<tr>
							<th>Kualifikasi Usaha</th>
							<td><?= $angga['kualifikasi_usaha'] ?></td>
						</tr>
						<!-- <tr>
							<th>Bobot Teknis</th>
							<td><?= $angga['bobot_teknis'] ?></td>
						</tr>
						<tr>
							<th>Bobot Biaya</th>
							<td><?= $angga['bobot_biaya'] ?></td>
						</tr> -->
						<tr>

						</tr>
						<tr>
							<th>Tanggal Pembuatan</th>
							<td><?= $angga['tanggal_buat_rup'] ?> Oleh <?= $angga['nama_pegawai'] ?></td>
						</tr>

						<tr>
							<th>Alasan Pembatalan</th>
							<td><?= $angga['alasan_revisi_paket_atau_batalkan_paket'] ?></td>
						</tr>
					</table>
					<br>
					<h4 class="text-center">DOKUMEN PENGADAAN</h4>
					<table class="table table-bordered">
						<tr>
							<th>Nama Dokumen</th>
							<th>Tanggal Upload</th>
							<th>Pengirim</th>
						</tr>
						<?php foreach ($dokumen_pengadaan as $key => $value) { ?>
							<tr>
								<td><?= $value['nama_file_dokumen_pengadaan'] ?></td>
								<td><?= $value['date_created'] ?></td>
								<td><?= $value['user_created'] ?></td>
							</tr>
						<?php } ?>
					</table>
					<!-- <h4 class="text-center">BA NEGOSIASI</h4>
					<table class="table table-bordered">
						<tr>
							<th>Nama Vendor</th>
							<th>Nama File</th>
							<th>Pengirim</th>
						</tr>
						<?php foreach ($ba_negosiasi as $key => $value) { ?>
							<tr>
								<td><?= $value['nama_file_negosiasi'] ?></td>
								<td><?= $value['file_negosisasi'] ?></td>
								<td><?= $value['user_created'] ?></td>
							</tr>
						<?php } ?>
					</table> -->
					<h4 class="text-center">PERSYARATAN PENETAPAN LANGSUNG</h4>
					<table class="table table-bordered">
						<tr>
							<th>Nama Persyaratan</th>
							<th>Keterangan</th>
							<!-- <th>Pengirim</th> -->
						</tr>
						<?php foreach ($persyaratan_penetapan_langsung as $key => $value) { ?>
							<tr>
								<td><?= $value['nama_persyaratan_penetapan_langsung'] ?></td>
								<td><?= $value['keterangan_persyaratan_penetapan_langsung'] ?></td>
								<!-- <td><?= $value['user_created'] ?></td> -->
							</tr>
						<?php } ?>
					</table>
					<br>
					<h4 class="text-center">PERSYARATAN YANG DI PENUHI</h4>
					<table class="table table-bordered">
						<tr>
							<th>Nama Persyaratan</th>
							<th>Keterangan</th>
							<th>Status</th>
						</tr>
						<?php foreach ($persyaratan_terpenuhi as $key => $value) { ?>
							<tr>
								<td><?= $value['nama_persyaratan_penetapan_langsung'] ?></td>
								<td><?= $value['keterangan_persyaratan_penetapan_langsung'] ?></td>
								<?php if ($value['status_lengkap'] == 1) { ?>
									<td><span class="text-success">Lengkap <i class="fa fa-check"></i></span></td>
								<?php } else { ?>
									<td><span class="text-danger">Belum Lengkap <i class="fa fa-times"></i></span></td>
								<?php } ?>
							</tr>
						<?php } ?>
					</table>
					<br>
					<h4 class="text-center">JADWAL LELANG</h4>
					<table class="table table-bordered">
						<tr>
							<th>Nama Tahap</th>
							<th>Tanggal Mulai</th>
							<th>Tanggal Selesai</th>
							<th>Diubah Oleh</th>
							<th>Alasan Perubahan</th>
						</tr>
						<?php
						foreach ($result_data_jadwal_detail as $jadwal) { ?>
							<tr>
								<td style="width: 30%;">
									<?php if ($jadwal['tanggal_mulai']  >= date('d-m-Y H:i')) { ?>
										<b class="text-secondary"> <?= $jadwal['nama_jadwal_penetapan_langsung_detail'] ?></b>
									<?php   } else if ($jadwal['tanggal_selesai'] >= date('d-m-Y H:i') || $jadwal['tanggal_mulai'] == date('d-m-Y H:i')) { ?>
										<b class="text-danger"> <?= $jadwal['nama_jadwal_penetapan_langsung_detail'] ?> <small class="text text-danger">Tahap Sedang Berlangsung</small></b>
									<?php   } else { ?>

										<b class="text-success"> <?= $jadwal['nama_jadwal_penetapan_langsung_detail'] ?> <small class="text text-success">Tahap Sudah Selesai <i class="fa fa-check"></i> </small></b>
									<?php   } ?>
								</td>
								<td><?php if ($jadwal['tanggal_mulai'] >= date('d-m-Y H:i')) { ?>
										<b><?= date('d F Y H:i', strtotime($jadwal['tanggal_mulai']))  ?> </b>
									<?php   } else if ($jadwal['tanggal_selesai']  >= date('d-m-Y H:i')) { ?>
										<b><?= date('d F Y H:i', strtotime($jadwal['tanggal_mulai']))  ?> </b>
									<?php   } else { ?>

										<b><?= date('d F Y H:i', strtotime($jadwal['tanggal_mulai']))  ?> </b>
									<?php   } ?>
								</td>
								<td>
									<?php if ($jadwal['tanggal_mulai']  >= date('d-m-Y H:i')) { ?>
										<b><?= date('d F Y H:i', strtotime($jadwal['tanggal_selesai'])) ?></b>
									<?php   } else if ($jadwal['tanggal_selesai'] >= date('d-m-Y H:i')) { ?>
										<b><?= date('d F Y H:i', strtotime($jadwal['tanggal_selesai'])) ?></b>
									<?php   } else { ?>
										<b><?= date('d F Y H:i', strtotime($jadwal['tanggal_selesai'])) ?></b>
									<?php   } ?>
								</td>
								<td>
									<?php if ($jadwal['tanggal_mulai']  >= date('d-m-Y H:i')) { ?>
										<b><?= $jadwal['user_created'] ?></b>
									<?php   } else if ($jadwal['tanggal_selesai'] >= date('d-m-Y H:i')) { ?>
										<b><?= $jadwal['user_created'] ?></b>
									<?php   } else { ?>
										<b><?= $jadwal['user_created'] ?></b>
									<?php   } ?>
								</td>
								<td>
									<?php if ($jadwal['tanggal_mulai']  >= date('d-m-Y H:i')) { ?>
										<b><?= $jadwal['alasan_jadwal'] ?></b>
									<?php   } else if ($jadwal['tanggal_selesai'] >= date('d-m-Y H:i')) { ?>
										<b><?= $jadwal['alasan_jadwal'] ?></b>
									<?php   } else { ?>
										<b><?= $jadwal['alasan_jadwal'] ?></b>
									<?php   } ?>
								</td>
							<?php } ?>
					</table>
					<br>
					<h4 class="text-center">PESERTA LELANG</h4>
					<table class="table table-bordered">
						<tr>
							<th>Nama Peserta</th>
							<th>Tanggal Daftar</th>
						</tr>
						<?php foreach ($peserta_tender as $key => $value) { ?>
							<tr>
								<td><?= $value['username_vendor'] ?></td>
								<td><?= $value['tanggal_mendaftar_mengikuti_vendor'] ?></td>
							</tr>
						<?php } ?>
					</table>
					<!-- <h4 class="text-center">KEPANITIAAN</h4>
					<table class="table table-bordered">
						<tr>
							<th>Nama Kepanitiaan</th>
							<th><?= $row_panitia['nama_panitia'] ?></th>
						</tr>
						<tr>
							<th>No. SK</th>
							<td><?= $row_panitia['no_sk'] ?></td>
						</tr>
					</table> -->
					<!-- <table class="table table-bordered">
						<tr>
							<th>Nama</th>
							<th>NIP</th>
							<th>Jabatan</th>
						</tr>

						<?php foreach ($ambil_panitia as $key => $value) { ?>
							<tr>
								<td><?= $value['nama_pegawai'] ?></td>
								<td><?= $value['nip'] ?></td>
								<td><?= $value['nama_role_panitia'] ?></td>
							</tr>
						<?php  } ?>
					</table> -->
					<h4 class="text-center">HASIL EVALUASI</h4>
					<table class="table table-bordered">
						<tr style="font-size: 11px;">
							<th>Nama Peserta</th>
							<!-- <th>Penawaran</th>
							<th>Penawaran Terkoreksi</th> -->
							<th>Negosiasi Harga</th>
							<!-- <th>Verifikasi</span></th> -->
						</tr>

						<?php $i = 1;
						foreach ($evaluasi as $key => $value) { ?>
							<tr>
								<td><?= $value['username_vendor'] ?></td>

								<!-- <?php if ($value['nilai_penawaran'] == NULL) { ?>
									<td> </td>
								<?php } else { ?>
									<td>Rp. <?= number_format($value['nilai_penawaran'], 2, ',', '.') ?></td>
								<?php } ?>

								<?php if ($value['nilai_terkoreksi'] == NULL) { ?>
									<td> </td>
								<?php } else { ?>
									<td>Rp. <?= number_format($value['nilai_terkoreksi'], 2, ',', '.') ?></td>
								<?php } ?> -->

								<?php if ($value['negosiasi'] == NULL) { ?>
									<td> </td>
								<?php } else { ?>
									<td>Rp. <?= number_format($value['negosiasi'], 2, ',', '.') ?></td>
								<?php } ?>

							</tr>
						<?php  } ?>
					</table>
					<table class="table table-bordered">
						<tr style="font-size: 11px;">
							<th>Nama Peserta</th>
							<th>
								<span>Status Dokumen Kelengkapan</span>
							</th>
							<!-- <th>
								<span>Hasil Teknis</span>
							</th>
							<th>
								<span>Hasil Prakualifikasi</span>
							</th>
							<th><span>Peringkat</span></th>
							<th>Nilai Akhir</th>
							<th><span>Pemenang</span></th> -->
							<!-- <th>Verifikasi</span></th> -->
						</tr>
						<?php $i = 1;
						foreach ($evaluasi as $key => $value) { ?>
							<tr>
								<td><?= $value['username_vendor'] ?></td>
								<td>
									<div class="text-success"><i class="fa fa-check"></i> Dokumen Lengkap</div>
								</td>
								<!-- <td><?= $value['nilai_teknis'] ?></td>
								<td><?= $value['nilai_prakualifikasi'] ?></td>
								<td><?= $value['nilai_pringkat_teknis'] ?></td>
								<td><?= $value['nilai_akhir'] ?></td>
								<?php if ($value['pemenang_tender'] == 1) { ?>
									<td>
										<div class="text-warning"><i class="fa fa-star"></i> </div>
									</td>
								<?php } else { ?>
									<td></td>
								<?php } ?> -->

							</tr>
						<?php  } ?>
					</table>

					<!-- INI UNTUK PENJELASAN LELANG -->
					<br>
					<div class="row">
						<!-- <div class="col-md-6">
							<div class="card">
								<div class="card-header bg-primary text-white">
									PENJELASAN LELANG CHAT
								</div>
								<div class="card-body" id="letakpesan">

								</div>
							</div>
						</div> -->
						<!-- <label for=""><?= $data2['id_mengikuti_vendor'] ?></label> -->
						<div class="col-md-12">
							<div class="card">
								<div class="card-header bg-primary text-white">
									NEGOSIASI CHAT
								</div>
								<div class="card-body" id="letakpesan2">

								</div>
							</div>
						</div>
					</div>
				</div>
		</form>
	</div>


	<!-- Jquery -->
	<!-- Bootstrap -->
	<script type="text/javascript" src="<?= base_url('assets/') ?>boostrapnew/dist/js/bootstrap.min.js" media="all"></script>
	<!-- dataTables -->
	<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" media="all"></script>
	<!-- select2 -->
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" media="all"></script>

	<!-- custom js -->
	<script type="text/javascript" src="<?= base_url('assets/') ?>kintek.js" media="all"></script>

	<!-- datepicker -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js" integrity="sha512-ZrigzIl5MysuwHc2LaGI+uOLnLDdyYUth+pA5OuJC++WEleiYrztIc7nU/iBRWeP+ufmSGepuJULdgh/K0rIAA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
	<script media="all" type="text/javascript" src="<?= base_url('assets/datetimepicekernew/plugins/'); ?>jquery.datetimepicker.full.min.js"></script>

	<script>
		$(document).ready(function() {
			pesan2()

			function pesan2() {
				var id_penerima = '<?= $data2['id_mengikuti_vendor'] ?>';
				var id_paket2 = $('#id_paket').val();
				var id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
				$.ajax({
					type: "post",
					url: "<?= base_url() ?>paket/ngeload_chat_transaksi_langsung/" + <?= $paket['id_paket'] ?>,
					data: {
						id_pengirim: id_pengirim,
						id_penerima: id_penerima,
					},
					dataType: "json",
					success: function(r) {
						var html = "";
						var d = r.data;
						id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
						d.forEach(d => {

							var today = new Date();
							var dd = String(today.getDate()).padStart(2, '0');
							var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
							var yyyy = today.getFullYear();

							today = dd + '-' + mm + '-' + yyyy;
							// console.log(today);

							var times = new Date(d.waktu)
							var time = times.toLocaleTimeString()
							var tanggal = String(times.getDate()).padStart(2, '0');
							var bulan = String(times.getMonth() + 1).padStart(2, '0');
							var tahun = times.getFullYear()
							var lengkapDB = tanggal + '-' + bulan + '-' + tahun
							// console.log(lengkapDB == today)
							var kapan = "Today"
							var tanggal_bulan = tanggal + "-" + bulan
							if (lengkapDB != today) {
								kapan = tanggal_bulan
							}
							// console.log(kapan)
							if (parseInt(d.id_pengirim) == id_pengirim) {
								if (d.dokumen_chat == null) {
									html += '<div class="d-flex justify-content-end mb-4">' +
										'<div class="msg_cotainer_send">' +
										'' + d.isi + '' +
										'<span class="msg_time">' + kapan + ',' + time + '</span>' +
										'</div>' +
										'</div>';
								} else if (d.dokumen_chat) {
									html += '<div class="d-flex justify-content-end mb-4">' +
										'<div class="msg_cotainer_send">' +
										// '<img width="100px" src="<?= base_url('file_chat/') ?>' + d.img_chat + '">' +
										'<a  class="text-primary" href="<?= base_url('/file_chat/') ?>' + d.dokumen_chat + '">' + d.dokumen_chat + '</a>' +
										'<br>' + d.isi + '' +
										'<span class="msg_time">' + kapan + ',' + time + '</span>' +
										'</div>' +
										'</div>';

								} else if (d.img_chat) {
									html += '<div class="d-flex justify-content-end mb-4">' +
										'<div class="msg_cotainer_send">' +
										'<img width="100px" src="<?= base_url('file_chat/') ?>' + d.img_chat + '">' +
										// '<a  class="text-primary" href="<?= base_url('/file_chat/') ?>' + d.dokumen_chat + '">' + d.dokumen_chat + '</a>' +
										'<br>' + d.isi + '' +
										'<span class="msg_time">' + kapan + ',' + time + '</span>' +
										'</div>' +
										'</div>';

								} else {
									html += '<div class="d-flex justify-content-end mb-4">' +
										'<div class="msg_cotainer_send">' +
										'' + d.isi + '' +
										'<span class="msg_time">' + kapan + ',' + time + '</span>' +
										'</div>' +
										'</div>';
								}
							} else if (parseInt(d.id_penerima) == id_penerima) {
								if (d.dokumen_chat == null) {
									html += `<label class="badge badge-primary ml-5" >${d.nama_pegawai}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div> </div>`;
								} else if (d.dokumen_chat) {
									html += `<label class="badge badge-primary ml-5" >${d.nama_pegawai}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                        <a href="<?= base_url('/file_chat/') ?>${d.dokumen_chat}"> ${d.dokumen_chat}</a> <br>
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                     </div>`;
								} else if (d.img_chat) {
									html += `<label class="badge badge-primary ml-5" >${d.nama_pegawai}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
								<img width="100px" src="<?= base_url('file_chat/') ?>${d.img_chat}"> <br>
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                      
                     </div>`;
								} else {
									html += `<label class="badge badge-primary ml-5" >${d.nama_pegawai}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                      
                     </div>`;
								}
							} else {
								if (d.dokumen_chat == null) {
									html += `<label class="badge badge-danger ml-5" >${d.username_vendor}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div> </div>`;
								} else if (d.dokumen_chat) {
									html += `<label class="badge badge-danger ml-5" >${d.username_vendor}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                        <a href="https://vms.jmtm.co.id/file_chat/${d.dokumen_chat}"> ${d.dokumen_chat}</a> <br>
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                     </div>`;
								} else if (d.img_chat) {
									html += `<label class="badge badge-danger ml-5" >${d.username_vendor}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
								<img width="100px" src="https://vms.jmtm.co.id/file_chat/${d.img_chat}"> <br>
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                      
                     </div>`;
								} else {
									html += `<label class="badge badge-danger ml-5" >${d.username_vendor}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                      
                     </div>`;
								}
							}
							// notifikasis
						});
						// console.log(html)

						$('#letakpesan2').html(html);
					}
				});

			}


		});
	</script>
</body>

</html>
<script>
	setTimeout(function() {
		window.print();
	}, 5000);
</script>