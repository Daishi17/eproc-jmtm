<style>
	.info-box {
		box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
		border-radius: .25rem;
		background-color: #fff;
		display: -webkit-flex;
		display: -ms-flexbox;
		display: flex;
		margin-bottom: 1rem;
		min-height: 80px;
		padding: .5rem;
		position: relative;
		width: 100%;
	}

	.info-box .info-box-icon {
		border-radius: .25rem;
		-webkit-align-items: center;
		-ms-flex-align: center;
		align-items: center;
		display: -webkit-flex;
		display: -ms-flexbox;
		display: flex;
		font-size: 1.875rem;
		-webkit-justify-content: center;
		-ms-flex-pack: center;
		justify-content: center;
		text-align: center;
		width: 70px;
	}


	.info-box .info-box-content {
		display: -webkit-flex;
		display: -ms-flexbox;
		display: flex;
		-webkit-flex-direction: column;
		-ms-flex-direction: column;
		flex-direction: column;
		-webkit-justify-content: center;
		-ms-flex-pack: center;
		justify-content: center;
		line-height: 1.8;
		-webkit-flex: 1;
		-ms-flex: 1;
		flex: 1;
		padding: 0 10px;
	}

	.info-box-text {
		display: block;
		overflow: hidden;
		text-overflow: ellipsis;
		white-space: nowrap;
	}

	.info-box .info-box-number {
		display: block;
		margin-top: .25rem;
		font-weight: 700;
	}

	.highcharts-figure,
	.highcharts-data-table table {
		min-width: 310px;
		max-width: 800px;
		margin: 1em auto;
	}

	#container {
		height: 400px;
	}

	.highcharts-data-table table {
		font-family: Verdana, sans-serif;
		border-collapse: collapse;
		border: 1px solid #EBEBEB;
		margin: 10px auto;
		text-align: center;
		width: 100%;
		max-width: 500px;
	}

	.highcharts-data-table caption {
		padding: 1em 0;
		font-size: 1.2em;
		color: #555;
	}

	.highcharts-data-table th {
		font-weight: 600;
		padding: 0.5em;
	}

	.highcharts-data-table th,
	.highcharts-data-table th,
	.highcharts-data-table caption {
		padding: 0.5em;
	}

	.highcharts-data-table thead tr,
	.highcharts-data-table tr:nth-child(even) {
		background: #f8f8f8;
	}

	.highcharts-data-table tr:hover {
		background: #f1f7ff;
	}

	.btn-grad {
		background-image: linear-gradient(to right, #000046 0%, #1CB5E0 51%, #000046 100%)
	}

	.btn-grad {
		text-align: center;
		text-transform: uppercase;
		transition: 0.5s;
		background-size: 200% auto;
		box-shadow: 0 0 20px white;
	}

	.btn-grad:hover {
		background-position: right center;
		/* change the direction of the change here */
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
		color: black;
		box-shadow: 0 0 20px #eee;
	}

	.btn-grad7:hover {
		background-position: right center;
		/* change the direction of the change here */
		color: black;
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
		background-image: linear-gradient(to right, #F7971E 0%, #FFD200 51%, #F7971E 100%)
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
		border-radius: 10px;
	}

	.btn-grad20:hover {
		background-position: right center;
		/* change the direction of the change here */
		color: #fff;
		box-shadow: 0 0 40px #FD746C;
		text-decoration: none;
	}

	.btn-grad25 {
		width: 100%;
		background-image: linear-gradient(to right, #778899 0%, #778899 51%, #778899 100%)
	}

	.btn-grad25 {
		text-transform: uppercase;
		transition: 0.5s;
		background-size: 200% auto;
		color: white;
		box-shadow: 0 0 20px #eee;
		border-radius: 10px;
	}

	.btn-grad25:hover {
		background-position: right center;
		/* change the direction of the change here */
		color: white;
		box-shadow: 0 0 40px #F0CB35;
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
</style>
<div class="preloader">
	<div class="loading">
		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
	</div>
</div>
<div id="main" class="container">
	<br>
	<ol class="breadcrumb btn-grad">
		<li><a style="text-decoration: none; color:white;" href="#">Grafik Dan Rekap</a></li>
	</ol>
	<div class="content">

		<a target="_blank" href="<?= base_url('laporan/kinerja_vendor_pdf') ?>" class="btn btn-sm btn-grad2">
			<img width="35px" src="<?= base_url('assets/img/pdfku.png') ?>" alt=""> Export PDF</a>
		<br>
		<br>
		<div style="overflow-x: auto;">
			<table class="table table-hover" id="kinerja" style="font-size:smaller">
				<thead>
					<tr>
						<th style="width: 5%;">No</th>
						<th>Vendor</th>
						<th>Agency</th>
						<th>Nilai Kontrak</th>
						<th>Jenis Pengadaan</th>
						<th>Nama Paket</th>
						<th>Rating</th>
						<th>Performa</th>
						<th>Nilai Akhir</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1;
					foreach ($laporan_kinerja as $key => $value) { ?>
						<tr>
							<td><?= $i++ ?></td>
							<td><?= $value['nama_usaha'] ?></td>
							<td><?= $value['pembuat_paket'] ?></td>
							 <?php if ($value['negosiasi'] == 0 || $value['negosiasi'] == 'null') { ?>
                                <td> <?= "Rp " . number_format($value['nilai_terkoreksi'], 2, ',', '.') ?></td>
                            <?php   } else { ?>
                                <td> <?= "Rp " . number_format($value['negosiasi'], 2, ',', '.') ?></td>
                            <?php  }
                            ?>
							<td><?= $value['nama_jenis_pengadaan'] ?></td>
							<td><?= $value['nama_paket'] ?></td>
							<!-- RATING -->
							<?php if ($value['rating_penilaian_vendor'] == 3) { ?>
								<td><i class="fas fa-star text-warning"></i> <i class="fas fa-star text-warning"></i> <i class="fas fa-star text-warning"></i></td>
							<?php } else if ($value['rating_penilaian_vendor'] == 2) { ?>
								<td><i class="fas fa-star text-warning"></i> <i class="fas fa-star text-warning"></i></td>
							<?php } else if ($value['rating_penilaian_vendor'] == 1) { ?>
								<td><i class="fas fa-star text-warning"></i></td>
							<?php } else if ($value['rating_penilaian_vendor'] == 4) { ?>
								<td><a class="badge badge-danger text-white">Kurang Baik</a></td>
							<?php } else { ?>
								<td><a class="badge badge-info text-white">Belum Di Nilai</a></td>
							<?php } ?>
							<!-- STATUS -->
							<?php if ($value['rating_penilaian_vendor'] == 3) { ?>
								<td><a class="badge badge-success text-white">Sangat Baik</a></td>
							<?php } else if ($value['rating_penilaian_vendor'] == 2) { ?>
								<td><a class="badge badge-warning">Baik</a></td>
							<?php } else if ($value['rating_penilaian_vendor'] == 1) { ?>
								<td><a class="badge badge-warning text-white">Cukup Baik</a></td>
							<?php } else if ($value['rating_penilaian_vendor'] == 4) { ?>
								<td><a class="badge badge-danger text-white">Kurang Baik</a></td>
							<?php } else { ?>
								<td><a class="badge badge-info text-white">Belum Di Nilai</a></td>
							<?php } ?>
							<!-- nilai akhir -->
							<td><?= $value['rating_nilai_akhir'] ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>