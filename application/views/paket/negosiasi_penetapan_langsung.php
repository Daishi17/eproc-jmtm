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
<div id="main" class="container">
	<input type="hidden" id="id_paket" value="<?= $paket['id_paket'] ?>">
	<nav aria-label="breadcrumb btn-grad20" class="mt-3">
		<ol class="breadcrumb btn-grad20">
			<li class="breadcrumb-item"><a style="color: white;" href="<?= base_url('penetapanlangsung/informasipaket/' . $paket['id_paket']) ?>">Beranda &raquo; Informasi Tender</a></li>
		</ol>
	</nav>
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link btn-grad20 text-white" href="<?= base_url('penetapanlangsung/informasipaket/' . $paket['id_paket']) ?>">Informasi Paket Transaksi Langsung</a>
		</li>
		<li class=" nav-item">
			<a class="nav-link btn-grad20 text-white ml-2 active" href="<?= base_url('penetapanlangsung/negosiasi_penetapan_langsung/' . $paket['id_paket']) ?>">Negosiasi</a>
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
								<td><?= $paket['kode_tender'] ?></td>
							</tr>
							<tr>
								<th>Nama Paket</th>
								<td><?= $paket['nama_paket'] ?></td>
							</tr>
							<tr>
								<th>Nama Jenis Pengadaan</th>
								<td><?= $paket['nama_jenis_pengadaan'] ?></td>
							</tr>
							<tr>
								<th>Nama Metode Pemilihan</th>
								<td><?= $paket['nama_metode_pemilihan'] ?></td>
							</tr>
							<tr>
								<th>Divisi</th>
								<td><?= $paket['nama_unit_kerja'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<table class="">
						<tr>
							<th>AGENCY</th>
							<th><span class="badge badge-primary" style="font-size: large;"> <img src="<?= base_url('assets/img/servant.png') ?>" class="rounded-circle user_img"> </span></th>
							<th>PENYEDIA</th>
							<th><span class="badge badge-danger" style="font-size: large;"> <img src="<?= base_url('assets/img/test1.png') ?>" class="rounded-circle user_img"></span></th>
						</tr>
					</table>
				</div>
				<?php
				if (date('Y-m-d H:i', strtotime($get_tahap_negosiasi_penetapan_langsung['tanggal_mulai']))  >= date('Y-m-d H:i')) { ?>

				<?php   } else if (date('Y-m-d H:i', strtotime($get_tahap_negosiasi_penetapan_langsung['tanggal_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_negosiasi_penetapan_langsung['tanggal_mulai']))  == date('Y-m-d H:i')) { ?>
					<div class="col-md-8">
						<div class="form-group">
							<form action="" id="form_hasil_negosisasi_sepakat">
								<input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>">
								<label for="">Harga Kesepakatan Ngosisasi</label>
								<?php if ($vendor_terpilih_detail['negosiasi'] == null) { ?>
									<input type="text" name="harga_negosiasi_sepakat" id="harga_negosiasi_ku" style="width: 300px;" id="id_kesepakatan_negosiasi" class="form-control" placeholder="Masukan Harga Negosiasi" aria-describedby="helpId">
									<input type="text" disabled class="form-control form-control-sm mt-1" style="width: 200px;" id="tanpa-rupiah20">
									<small id="helpId" class="text-danger">Masukan Harga Negosiasi Ketika Kedua Belah Pihak Menyetujui Harga Negosiasinya</small>
								<?php } else { ?>
									<input type="text" value="<?= $vendor_terpilih_detail['negosiasi'] ?>" name="harga_negosiasi_sepakat" id="harga_negosiasi_ku" style="width: 300px;" id="id_kesepakatan_negosiasi" class="form-control" placeholder="Masukan Harga Negosiasi" aria-describedby="helpId">
									<input type="text" disabled class="form-control form-control-sm mt-1" style="width: 200px;" id="tanpa-rupiah20">
									<small id="helpId" class="text-danger">Masukan Harga Negosiasi Ketika Kedua Belah Pihak Menyetujui Harga Negosiasinya</small>
								<?php } ?>
							</form>
							<button type="submit" onclick="simpan_negosiassi_harga()" class="btn btn-sm btn-primary">Simpan Negosiasi Harga</button>
						</div>
					</div>
				<?php   } else { ?>

					<div class="col-md-8">
						<div class="form-group">
							<form action="" id="form_hasil_negosisasi_sepakat">
								<input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>">
								<label for="">Harga Kesepakatan Ngosisasi</label>
								<?php if ($vendor_terpilih_detail['negosiasi'] == null) { ?>
									<input type="text" name="harga_negosiasi_sepakat" id="harga_negosiasi_ku" style="width: 300px;" id="id_kesepakatan_negosiasi" class="form-control" placeholder="Masukan Harga Negosiasi" aria-describedby="helpId">
									<input type="text" disabled class="form-control form-control-sm mt-1" style="width: 200px;" id="tanpa-rupiah20">
									<small id="helpId" class="text-danger">Masukan Harga Negosiasi Ketika Kedua Belah Pihak Menyetujui Harga Negosiasinya</small>
								<?php } else { ?>
									<input type="text" readonly value="<?= $vendor_terpilih_detail['negosiasi'] ?>" name="harga_negosiasi_sepakat" id="harga_negosiasi_ku" style="width: 300px;" id="id_kesepakatan_negosiasi" class="form-control" placeholder="Masukan Harga Negosiasi" aria-describedby="helpId">
									<input type="text" disabled class="form-control form-control-sm mt-1" style="width: 200px;" id="tanpa-rupiah20">
									<small id="helpId" class="text-danger">Masukan Harga Negosiasi Ketika Kedua Belah Pihak Menyetujui Harga Negosiasinya</small>
								<?php } ?>
							</form>
						</div>
					</div>
				<?php   } ?>
			</div>
		</div>
	</div>
	<br><br>
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
						<span style="font-size: 18px;"><?= $paket['nama_paket'] ?></span>
						<p>Kode Tender : <?= $paket['kode_tender'] ?></p>
					</div>
				</div>
				<span id="action_menu_btn"><img src="<?= base_url('assets/img/bumn.png') ?>" width="250px" alt=""><img src="<?= base_url('assets/img/jmtm2.png') ?>" width="250px" alt=""> </span>

			</div>
			<div class="card-body msg_card_body" id="letakpesan">

			</div>
			<div class="card-footer btn-grad5">
				<form id="form_kirim_chat_penetapan_langsung" enctype="multipart/form-data">
					<div class="input-group">
						<input type="hidden" name="id_penerima" id="id_penerima" value="<?= $data2['id_mengikuti_vendor'] ?>">
						<input type="hidden" name="id_pengirim" id="id_pengirim" value="<?= $this->session->userdata('id_pegawai'); ?>">
						<input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>">
						<div class="input-group-append">
							<div class="input-group-text attach_btn">
								<button class="btn btn-danger btn-md btn-block" type="button" id="loadFileXml" value="loadXml" onclick="document.getElementById('file').click();"><i class="fas fa-paperclip"></i></button>
								<br>
								<button class="btn btn-primary btn-md btn-block" type="button" id="loadFileXml" value="loadXml" onclick="document.getElementById('file_img').click();"><i class="fas fa-camera-retro"></i></button>
							</div>
							<input type="file" style="display:none;" id="file" name="dokumen_chat" />
							<input type="file" style="display:none;" id="file_img" name="img_chat" />
						</div>

						<?php
						if (date('Y-m-d H:i', strtotime($get_tahap_negosiasi_penetapan_langsung['tanggal_mulai'])) >= date('Y-m-d H:i')) { ?>

						<?php   } else if (date('Y-m-d H:i', strtotime($get_tahap_negosiasi_penetapan_langsung['tanggal_selesai']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_negosiasi_penetapan_langsung['tanggal_mulai']))  == date('Y-m-d H:i')) { ?>
							<textarea name="isi" class="form-control type_msg" placeholder="Type your message..."></textarea>
							<div class="input-group-append">
								<button type="submit" id="upload" name="upload" class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></button>
							</div>
						<?php   } else { ?>
							<textarea disabled name="isi" class="form-control type_msg" placeholder="Waktu Sudaah Habis..."></textarea>
							<div class="input-group-append">
								<!-- <button type="submit" id="upload" name="upload" class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></button> -->
							</div>
						<?php   } ?>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>