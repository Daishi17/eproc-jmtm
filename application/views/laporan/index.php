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

	.highcharts-data-table td,
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
		<li><a style="text-decoration: none; color:white;" href="#">Laporan Total</a></li>
	</ol>
	<div class="content" style="box-shadow: 2px 2px 10px 2px black;">
		<div>
			<div class="row">
				<div class="col-md-2"> <label for="" class="uppercasess">Unit </label></div>
				<div class="col-md-4">
					<div class="formline">
						<select name="id_unit_kerja" id="id_unit_kerja" class="form-control select2">
							<option value="">--Pilih--</option>
							<?php foreach ($getdivisi as $key => $value) { ?>
								<option value="<?= $value['id_unit_kerja'] ?>"><?= $value['nama_unit_kerja'] ?></option>
							<?php } ?>
						</select>
						<!-- <button class="btn btn-grad7 ml-3" id="reload"><i class="fas fa-sync-alt"></i></button> -->
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-2"> <label for="" class="uppercasess">Tahun</label></div>
				<div class="col-md-4">
					<div class="formline">
						<select name="tanggal_buat_rup" id="tanggal_buat_rup" class="form-control select2">
							<option value="">--Pilih--</option>
							<option value="2020">2020</option>
							<option value="2021">2021</option>
							<option value="2022">2022</option>
							<option value="2023">2023</option>
							<option value="2024">2024</option>
							<option value="2025">2025</option>
							<option value="2026">2026</option>
							<option value="2027">2027</option>
							<option value="2028">2028</option>
							<option value="2029">2029</option>
							<option value="2030">2030</option>
							<option value="2031">2031</option>
							<option value="2032">2032</option>
							<option value="2033">2033</option>
							<option value="2034">2034</option>
						</select>
						<!-- <button class="btn btn-grad7 ml-3" id="reload"><i class="fas fa-sync-alt"></i></button> -->
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-2"> <label for="" class="uppercasess">Jenis Pengadaan</label></div>
				<div class="col-md-4">
					<div class="formline">
						<select name="id_jenis_pengadaan" id="id_jenis_pengadaan" class="form-control select2">
							<option value="">--Pilih--</option>
							<?php foreach ($get_jenis_pengadaan as $key => $value) { ?>
								<option value="<?= $value['id_jenis_pengadaan'] ?>"><?= $value['nama_jenis_pengadaan'] ?></option>
							<?php } ?>
						</select>
						<!-- <button class="btn btn-grad7 ml-3" id="reload"><i class="fas fa-sync-alt"></i></button> -->
					</div>
				</div>
			</div>
			<br>
			<div>
				<button class="btn btn-sm btn-grad7" style="width: 100px;  color:white" name="filter" id="filter3" type="button"> <img src="<?= base_url('assets/img/perahu.png') ?>" style="width: 30px;" alt=""> Filter</button>
			</div>
		</div>
		<br>
		<?php $anggatotal = $total_nilai_hps_paket['hps'] - $total_nilai_negosiasi_paket['negosiasi'] ?>
		<div style="overflow-x: auto;">
			<table id="danang2" class="table table-bordered table-hover text-center" style="font-size:x-small">
				<thead>
					<tr>
						<th rowspan="3">No</th>
						<th rowspan="3">Kode</th>
						<th rowspan="3">Jenis Pengadaan</th>
						<th rowspan="3">Metode Pemilihan</th>
						<th colspan="2">Periode</th>
						<th rowspan="3">Nama Pekerjaan</th>
						<th rowspan="3">Unit</th>
						<th>HPS</th>
						<th rowspan="3">Penyedia Barang/Jasa</th>
						<th rowspan="3">Nilai Kontrak(Rp.)</th>
						<th colspan="2">Efisiensi Terhadap</th>
						<th rowspan="3">Penganggung Jawab</th>
						<th rowspan="3">Catatan</th>
					</tr>
					<tr>
						<th rowspan="2">Bulan</th>
						<th rowspan="2">Tahun</th>
						<th rowspan="2">Nilai(Rp.)</th>
						<th colspan="2">Anggaran</th>
					</tr>
					<tr>
						<th>Rp.</th>
						<th>%</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
				<tfoot>
					<tr>
						<th style="font-size: 20px;" colspan="8">TOTAL</th>
						<th><?= "Rp " . number_format($total_nilai_hps_paket['hps'], 2, ',', '.') ?></th>
						<th></th>
						<th><?= "Rp " . number_format($total_nilai_negosiasi_paket['negosiasi'], 2, ',', '.') ?></th>
						<th><?= "Rp " . number_format($total_nilai_hps_paket['hps'] - $total_nilai_negosiasi_paket['negosiasi'], 2, ',', '.') ?></th>
						<th>
							<?php
							if ($anggatotal == 0) {
								echo '0';
							} else {
								echo number_format($anggatotal / $total_nilai_hps_paket['hps'], 2);
							}

							?>
						</th>
						<th></th>
						<th></th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>