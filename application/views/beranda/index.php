<?php
$this->role_login->cek_login();
?>
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

	.btn-grad17 {
		background-image: linear-gradient(to right, #000046 0%, #1CB5E0 51%, #000046 100%)
	}

	.btn-grad {
		text-align: center;
		text-transform: uppercase;
		transition: 0.5s;
		background-size: 200% auto;
		box-shadow: 0 0 20px white;
	}

	.btn-grad17 {
		text-transform: uppercase;
		transition: 0.5s;
		background-size: 200% auto;
		box-shadow: 0 0 20px white;
		color: white;
		/* color: white; */
	}

	.btn-grad17:hover {
		background-position: right center;
		/* change the direction of the change here */
		box-shadow: 0 0 20px yellow;
		text-decoration: none;
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
		color: white;
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
<?php if ($this->session->userdata('id_role') == 1) { ?>
	<div class="container">
		<br>
		<br>
		<ol class="breadcrumb btn-grad">
			<li><a style="text-decoration: none; color:white;" href="#">ADMIN</a></li>
		</ol>
		<div id="step1">
			<div class="content text-black">
				<section class=" text-black" id="cardhide">
					<div class="row">
						<div class="col-12 col-sm-6 col-md-3">
							<a href="<?= base_url('pegawai') ?>" style="text-decoration:none">
								<div class="info-box btn-grad17">
									<span class="info-box-icon bg-primary elevation-1">
										<i class="fas fa-user-tie" style="color: white;"></i>
									</span>
									<div class="info-box-content">
										<span class="info-box-text">Total Pegawai</span>
										<span class="info-box-number">
											<?= $hitung_pegawai['jumlah_pegawai'] ?>
										</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							<a href="<?= base_url('panitia') ?>" style="text-decoration: none;">
								<div class="info-box btn-grad8">
									<span class="info-box-icon bg-success elevation-1">
										<i class="fas fa-users" style="color: white;"></i>
									</span>
									<div class="info-box-content">
										<span class="info-box-text">Total Panitia</span>
										<span class="info-box-number">
											<?= $hitung_panitia['jumlah_panitia'] ?>
										</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							<a href="<?= base_url('index.php/vendor') ?>" style="text-decoration: none;">
								<div class="info-box btn-grad25">
									<span class="info-box-icon bg-secondary elevation-1">
										<i class="fas fa-building" style="color: white;"></i>
									</span>
									<div class="info-box-content">
										<span class="info-box-text">Total Vendor</span>
										<span class="info-box-number">
											<!-- masih statis -->
											<?= $total_vendor_fix ?>
										</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							<a href="<?= base_url('paket') ?>" style="text-decoration: none;">
								<div class="info-box btn-grad20">
									<span class="info-box-icon bg-danger elevation-1">
										<i class="fas fa-file-signature" style="color: white;"></i>
									</span>
									<div class="info-box-content">
										<span class="info-box-text">Total Paket</span>
										<span class="info-box-number">
											<?= $hitung_paket['jumlah_paket'] ?>
										</span>
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-12 col-sm-6 col-md-3">
							<a href="<?= base_url('unit_kerja') ?>" style="text-decoration: none;">
								<div class="info-box btn-grad21">
									<span class="info-box-icon bg-warning elevation-1">
										<i class="fas fa-network-wired" style="color: white;"></i>
									</span>
									<div class="info-box-content">
										<span class="info-box-text">Total Unit</span>
										<span class="info-box-number">
											<?= $hitung_divisi['jumlah_divisi'] ?>
										</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							<a href="<?= base_url('subagency') ?>" style="text-decoration: none;">
								<div class="info-box btn-grad7">
									<span class="info-box-icon bg-info elevation-1">
										<i class="fa fa-user" style="color: white;"></i>
									</span>
									<div class="info-box-content">
										<span class="info-box-text">Total Sub-Agency</span>
										<span class="info-box-number">
											<?= $hitung_agency['jumlah_agency'] ?>
										</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							<a href="<?= base_url('paket') ?>" style="text-decoration: none;">
								<div class="info-box btn-grad17">
									<span class="info-box-icon bg-danger elevation-1">
										<i class="fas fa-file-signature" style="color: white;"></i>
									</span>
									<div class="info-box-content">
										<span class="info-box-text">Total Tender</span>
										<span class="info-box-number">
											<?= $total_tender_fix  ?>
										</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							<a href="<?= base_url('paket') ?>" style="text-decoration: none;">
								<div class="info-box btn-grad20">
									<span class="info-box-icon bg-danger elevation-1">
										<i class="fas fa-file-signature" style="color: white;"></i>
									</span>
									<div class="info-box-content">
										<span class="info-box-text">Total Non Tender</span>
										<span class="info-box-number">
											<?= $total_nontender_fix ?>
										</span>
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-12 col-sm-6 col-md-3">
							<a href="<?= base_url('paket') ?>" style="text-decoration: none;">
								<div class="info-box btn-grad8">
									<span class="info-box-icon bg-danger elevation-1">
										<i class="fas fa-file-signature" style="color: white;"></i>
									</span>
									<div class="info-box-content">
										<span class="info-box-text">Tender Berlangsung</span>
										<span class="info-box-number">
											<?= $tender_berjalan_fix ?>
										</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							<a href="<?= base_url('paket') ?>" style="text-decoration: none;">
								<div class="info-box btn-grad20">
									<span class="info-box-icon bg-danger elevation-1">
										<i class="fas fa-file-signature" style="color: white;"></i>
									</span>
									<div class="info-box-content">
										<span class="info-box-text">Tender Sudah Selesai</span>
										<span class="info-box-number">
											<?= $tender_selesai_fix ?>
										</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							<a href="<?= base_url('paket') ?>" style="text-decoration: none;">
								<div class="info-box btn-grad21">
									<span class="info-box-icon bg-danger elevation-1">
										<i class="fas fa-file-signature" style="color: white;"></i>
									</span>
									<div class="info-box-content">
										<span class="info-box-text">Belum Diumumkan</span>
										<span class="info-box-number">
											<?= $status_belum_diumumkan ?>
										</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							<a href="<?= base_url('paket') ?>" style="text-decoration: none;">
								<div class="info-box btn-grad21">
									<span class="info-box-icon bg-danger elevation-1">
										<i class="fa fa-undo" style="color: white;"></i>
									</span>
									<div class="info-box-content">
										<span class="info-box-text">Tender Ulang/Batal</span>
										<span class="info-box-number">
											<?= $tender_ulang['total_paket'] ?>
										</span>
									</div>
								</div>
							</a>
						</div>
					</div>
				</section>
			</div>
		</div>
		<!-- <center>
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item mr-5" style="margin-left: 18%;">
					<a class="nav-link active btn-grad text-white" style="width: 200px;" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Bar</a>
				</li>
				<li class="nav-item  mr-5">
					<a class="nav-link  btn-grad8 text-white" style="width: 200px;" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Pie</a>
				</li>
				<li class="nav-item  mr-5">
					<a class="nav-link  btn-grad9 text-white" style="width: 200px;" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Line</a>
				</li>
			</ul>
		</center> -->
		<br>
		<div class="row">
			<div class="col-md-12 mb-2">
				<div class="card">
					<h5 class="card-header btn-grad">INFO GRAFIS VENDOR</h5>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div style="width: 500px;height: 300px">
									<canvas id="myChart7"></canvas>
								</div>
							</div>
							<div class="col-md-6">
								<center>
									<div style="width: 250px;height: 250px">
										<canvas id="myChart8"></canvas>
									</div>
								</center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<h5 class="card-header btn-grad">INFO GRAFIS TENDER AGENCY</h5>
									<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<div style="width: 500px;height: 500px">
													<canvas id="myChart"></canvas>
												</div>
											</div>
											<div class="col-md-12" style="margin-top: -200px;">
												<div style="width: 500px;height: 500px">
													<canvas id="myChart2"></canvas>
												</div>
											</div>
											<div class="col-md-12">
												<div style="width: 500px;height: 500px" style="margin-top: 200px;">
													<canvas id="myChart3"></canvas>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<h5 class="card-header btn-grad">INFO GRAFIS JENIS PENGADAAN</h5>
									<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<div style="width: 500px;height: 500px">
													<canvas id="myChart4"></canvas>
												</div>
											</div>
											<div class="col-md-12" style="margin-top: -200px;">
												<div style="width: 500px;height: 500px">
													<canvas id="myChart5"></canvas>
												</div>
											</div>
											<div class="col-md-12">
												<div style="width: 500px;height: 500px" style="margin-top: 200px;">
													<canvas id="myChart6"></canvas>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- <div class="row mt-5">
			<div class="card col-md-12" style="box-shadow: 2px 2px 10px 2px black;">
				<div class="card-body">
					<div class="card-header">
						<h4> TABLE INFO PROCUREMENT JASAMARGA TOLLROAD MAINTENANCE</h4>
					</div>
					<div style="overflow-x: auto;">
						<table class="table table-hover table-bordered" id="table_sayang">
							<tr class="text-center">
								<th>Divisi</th>
								<th colspan="3">Jenis Pengadaan</th>
								<th colspan="5">Metode Pemilihan</th>
							</tr>
							<tr>
								<th>Nama Divisi</th>
								<th>Barang</th>
								<th>Jasa</th>
								<th>Total</th>
								<th>PL</th>
								<th>TL</th>
								<th>SL</th>
								<th>Total</th>
							</tr>
							<tr>
								<td>PCR</td>
								<td><?= $total_barang_pcr ?></td>
								<td><?= $total_jasa_pcr ?></td>
								<td><?= $total_seluruh_jasa_barang_pcr ?></td>
								<td><?= $total_metode_pemilihan_langsung_pcr ?></td>
								<td><?= $total_metode_transaksi_langsung_pcr ?></td>
								<td><?= $total_metode_seleksi_langsung_pcr ?></td>
								<td><?= $total_metode_pemilhan_pcr ?></td>
							</tr>
							<tr>
								<td>HCGA</td>
								<td><?= $total_barang_hcga ?></td>
								<td><?= $total_jasa_hcga ?></td>
								<td><?= $total_seluruh_jasa_barang_hcga ?></td>
								<td><?= $total_metode_pemilihan_langsung_hcga ?></td>
								<td><?= $total_metode_transaksi_langsung_hcga ?></td>
								<td><?= $total_metode_seleksi_langsung_hcga ?></td>
								<td><?= $total_metode_pemilhan_hcga ?></td>
							</tr>
							<tr>
								<td>FTA</td>
								<td><?= $total_barang_fta ?></td>
								<td><?= $total_jasa_fta ?></td>
								<td><?= $total_seluruh_jasa_barang_fta ?></td>
								<td><?= $total_metode_pemilihan_langsung_fta ?></td>
								<td><?= $total_metode_transaksi_langsung_fta ?></td>
								<td><?= $total_metode_seleksi_langsung_fta ?></td>
								<td><?= $total_metode_pemilhan_fta ?></td>
							</tr>
							<tr>
								<td>RMMS</td>
								<td><?= $total_barang_rms ?></td>
								<td><?= $total_jasa_rms ?></td>
								<td><?= $total_seluruh_jasa_barang_rms ?></td>
								<td><?= $total_metode_pemilihan_langsung_rms ?></td>
								<td><?= $total_metode_transaksi_langsung_rms ?></td>
								<td><?= $total_metode_seleksi_langsung_rms ?></td>
								<td><?= $total_metode_pemilhan_rms ?></td>
							</tr>
							<tr>
								<td>AMP</td>
								<td><?= $total_barang_amp ?></td>
								<td><?= $total_jasa_amp ?></td>
								<td><?= $total_seluruh_jasa_barang_amp ?></td>
								<td><?= $total_metode_pemilihan_langsung_amp ?></td>
								<td><?= $total_metode_transaksi_langsung_amp ?></td>
								<td><?= $total_metode_seleksi_langsung_amp ?></td>
								<td><?= $total_metode_pemilhan_amp ?></td>
							</tr>
							<tr>
								<td>PCHAE</td>
								<td><?= $total_barang_pche ?></td>
								<td><?= $total_jasa_pche ?></td>
								<td><?= $total_seluruh_jasa_barang_pche ?></td>
								<td><?= $total_metode_pemilihan_langsung_pche ?></td>
								<td><?= $total_metode_transaksi_langsung_pche ?></td>
								<td><?= $total_metode_seleksi_langsung_pche ?></td>
								<td><?= $total_metode_pemilhan_pche ?></td>
							</tr>
							<tr>
								<td>AMTD</td>
								<td><?= $total_barang_amtd ?></td>
								<td><?= $total_jasa_amtd ?></td>
								<td><?= $total_seluruh_jasa_barang_amtd ?></td>
								<td><?= $total_metode_pemilihan_langsung_amtd ?></td>
								<td><?= $total_metode_transaksi_langsung_amtd ?></td>
								<td><?= $total_metode_seleksi_langsung_amtd ?></td>
								<td><?= $total_metode_pemilhan_amtd ?></td>
							</tr>
							<tr>
								<td>OP-1</td>
								<td><?= $total_barang_op1 ?></td>
								<td><?= $total_jasa_op1 ?></td>
								<td><?= $total_seluruh_jasa_barang_op1 ?></td>
								<td><?= $total_metode_pemilihan_langsung_op1 ?></td>
								<td><?= $total_metode_transaksi_langsung_op1 ?></td>
								<td><?= $total_metode_seleksi_langsung_op1 ?></td>
								<td><?= $total_metode_pemilhan_op1 ?></td>
							</tr>
							<tr>
								<td>OP-2</td>
								<td><?= $total_barang_op2 ?></td>
								<td><?= $total_jasa_op2 ?></td>
								<td><?= $total_seluruh_jasa_barang_op2 ?></td>
								<td><?= $total_metode_pemilihan_langsung_op2 ?></td>
								<td><?= $total_metode_transaksi_langsung_op2 ?></td>
								<td><?= $total_metode_seleksi_langsung_op2 ?></td>
								<td><?= $total_metode_pemilhan_op2 ?></td>
							</tr>
							<tr>
								<td>OP-3</td>
								<td><?= $total_barang_op3 ?></td>
								<td><?= $total_jasa_op3 ?></td>
								<td><?= $total_seluruh_jasa_barang_op3 ?></td>
								<td><?= $total_metode_pemilihan_langsung_op3 ?></td>
								<td><?= $total_metode_transaksi_langsung_op3 ?></td>
								<td><?= $total_metode_seleksi_langsung_op3 ?></td>
								<td><?= $total_metode_pemilhan_op3 ?></td>
							</tr>
							<tr>
								<td>MSA-1</td>
								<td><?= $total_barang_msa1 ?></td>
								<td><?= $total_jasa_msa1 ?></td>
								<td><?= $total_seluruh_jasa_barang_msa1 ?></td>
								<td><?= $total_metode_pemilihan_langsung_msa1 ?></td>
								<td><?= $total_metode_transaksi_langsung_msa1 ?></td>
								<td><?= $total_metode_seleksi_langsung_msa1 ?></td>
								<td><?= $total_metode_pemilhan_msa1 ?></td>
							</tr>
							<tr>
								<td>MSA-2</td>
								<td><?= $total_barang_msa2 ?></td>
								<td><?= $total_jasa_msa2 ?></td>
								<td><?= $total_seluruh_jasa_barang_msa2 ?></td>
								<td><?= $total_metode_pemilihan_langsung_msa2 ?></td>
								<td><?= $total_metode_transaksi_langsung_msa2 ?></td>
								<td><?= $total_metode_seleksi_langsung_msa2 ?></td>
								<td><?= $total_metode_pemilhan_msa2 ?></td>
							</tr>
							<tr>
								<td>MSA-3</td>
								<td><?= $total_barang_msa3 ?></td>
								<td><?= $total_jasa_msa3 ?></td>
								<td><?= $total_seluruh_jasa_barang_msa3 ?></td>
								<td><?= $total_metode_pemilihan_langsung_msa3 ?></td>
								<td><?= $total_metode_transaksi_langsung_msa3 ?></td>
								<td><?= $total_metode_seleksi_langsung_msa3 ?></td>
								<td><?= $total_metode_pemilhan_msa3 ?></td>
							</tr>
							<tr>
								<td>PM</td>
								<td><?= $total_barang_pm ?></td>
								<td><?= $total_jasa_pm ?></td>
								<td><?= $total_seluruh_jasa_barang_pm ?></td>
								<td><?= $total_metode_pemilihan_langsung_pm ?></td>
								<td><?= $total_metode_transaksi_langsung_pm ?></td>
								<td><?= $total_metode_seleksi_langsung_pm ?></td>
								<td><?= $total_metode_pemilhan_pm ?></td>
							</tr>
							<tr>
								<td>CPFTA</td>
								<td><?= $total_barang_cpfta ?></td>
								<td><?= $total_jasa_cpfta ?></td>
								<td><?= $total_seluruh_jasa_barang_cpfta ?></td>
								<td><?= $total_metode_pemilihan_langsung_cpfta ?></td>
								<td><?= $total_metode_transaksi_langsung_cpfta ?></td>
								<td><?= $total_metode_seleksi_langsung_cpfta ?></td>
								<td><?= $total_metode_pemilhan_cpfta ?></td>
							</tr>
							<tr>
								<td>RMQ</td>
								<td><?= $total_barang_rmq ?></td>
								<td><?= $total_jasa_rmq ?></td>
								<td><?= $total_seluruh_jasa_barang_rmq ?></td>
								<td><?= $total_metode_pemilihan_langsung_rmq ?></td>
								<td><?= $total_metode_transaksi_langsung_rmq ?></td>
								<td><?= $total_metode_seleksi_langsung_rmq ?></td>
								<td><?= $total_metode_pemilhan_rmq ?></td>
							</tr>
						</table>

					</div>
				</div>
			</div>
		</div> -->

	</div>
	</div>
<?php } else if ($this->session->userdata('id_role') == 2) { ?>
	<div class="container">
		<br>
		<br>
		<ol class="breadcrumb btn-grad">
			<li><a style="text-decoration: none; color:white;" href="#">Agency</a></li>
		</ol>
		<div id="step1">
			<div class="content btn-grad text-black">
				<section class=" text-black" id="cardhide">
					<div class="row">
						<!-- <div class="col-12 col-sm-6 col-md-3">
							<a href="<?= base_url('pegawai') ?>" style="text-decoration:none">
								<div class="info-box btn-grad">
									<span class="info-box-icon bg-primary elevation-1">
										<i class="fas fa-user-tie" style="color: white;"></i>
									</span>
									<div class="info-box-content">
										<span class="info-box-text">Total Pegawai</span>
										<span class="info-box-number">
											<?= $hitung_pegawai['jumlah_pegawai'] ?>
										</span>
									</div>
								</div>
							</a>
						</div> -->
						<div class="col-12 col-sm-6 col-md-3">
							<a href="<?= base_url('panitia') ?>" style="text-decoration: none;">
								<div class="info-box btn-grad8">
									<span class="info-box-icon bg-success elevation-1">
										<i class="fas fa-users" style="color: white;"></i>
									</span>
									<div class="info-box-content">
										<span class="info-box-text">Total Panitia</span>
										<span class="info-box-number">
											<?= $total_panitia_agency ?>
										</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							<a href="<?= base_url('index.php/vendor') ?>" style="text-decoration: none;">
								<div class="info-box btn-grad25">
									<span class="info-box-icon bg-secondary elevation-1">
										<i class="fas fa-building" style="color: white;"></i>
									</span>
									<div class="info-box-content">
										<span class="info-box-text">Total Vendor</span>
										<span class="info-box-number">
											<!-- masih statis -->
											<?= $total_vendor_fix ?>
										</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							<a href="<?= base_url('paket') ?>" style="text-decoration: none;">
								<div class="info-box btn-grad20">
									<span class="info-box-icon bg-danger elevation-1">
										<i class="fas fa-file-signature" style="color: white;"></i>
									</span>
									<div class="info-box-content">
										<span class="info-box-text">Total Paket</span>
										<span class="info-box-number">
											<?= $total_paket_agency ?>
										</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							<a href="<?= base_url('paket') ?>" style="text-decoration: none;">
								<div class="info-box btn-grad">
									<span class="info-box-icon bg-danger elevation-1">
										<i class="fas fa-file-signature" style="color: white;"></i>
									</span>
									<div class="info-box-content">
										<span class="info-box-text">Total Tender</span>
										<span class="info-box-number">
											<?= $total_tender_fix_agency ?>
										</span>
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="row">

						<div class="col-12 col-sm-6 col-md-3">
							<a href="<?= base_url('paket') ?>" style="text-decoration: none;">
								<div class="info-box btn-grad20">
									<span class="info-box-icon bg-danger elevation-1">
										<i class="fas fa-file-signature" style="color: white;"></i>
									</span>
									<div class="info-box-content">
										<span class="info-box-text">Total Non Tender</span>
										<span class="info-box-number">
											<?= $total_nontender_fix_agency ?>
										</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							<a href="<?= base_url('paket') ?>" style="text-decoration: none;">
								<div class="info-box btn-grad8">
									<span class="info-box-icon bg-danger elevation-1">
										<i class="fas fa-file-signature" style="color: white;"></i>
									</span>
									<div class="info-box-content">
										<span class="info-box-text">Tender Berlangsung</span>
										<span class="info-box-number">
											<?= $tender_berjalan_fix_agency ?>
										</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							<a href="<?= base_url('paket') ?>" style="text-decoration: none;">
								<div class="info-box btn-grad20">
									<span class="info-box-icon bg-danger elevation-1">
										<i class="fas fa-file-signature" style="color: white;"></i>
									</span>
									<div class="info-box-content">
										<span class="info-box-text">Tender Sudah Selesai</span>
										<span class="info-box-number">

											<?= $tender_selesai_fix_agency ?>
										</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							<a href="<?= base_url('paket') ?>" style="text-decoration: none;">
								<div class="info-box btn-grad21">
									<span class="info-box-icon bg-danger elevation-1">
										<i class="fas fa-file-signature" style="color: white;"></i>
									</span>
									<div class="info-box-content">
										<span class="info-box-text">Belum Diumumkan</span>
										<span class="info-box-number">
											<?= $status_belum_diumumkan_agency ?>
										</span>
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="row">

					</div>
				</section>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<h5 class="card-header btn-grad">INFO GRAFIS VENDOR</h5>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div style="width: 500px;height: 500px">
									<canvas id="myChart7"></canvas>
								</div>
							</div>
							<div class="col-md-6">
								<center>
									<div style="width: 250px;height: 250px">
										<canvas id="myChart8"></canvas>
									</div>
								</center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container" style="margin-top: -200px;">
			<div class="row">
				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<h5 class="card-header btn-grad">INFO GRAFIS TENDER AGENCY</h5>
									<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<div style="width: 500px;height: 500px">
													<canvas id="myChart"></canvas>
												</div>
											</div>
											<div class="col-md-12" style="margin-top: -200px;">
												<div style="width: 500px;height: 500px">
													<canvas id="myChart2"></canvas>
												</div>
											</div>
											<div class="col-md-12">
												<div style="width: 500px;height: 500px" style="margin-top: 200px;">
													<canvas id="myChart3"></canvas>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<h5 class="card-header btn-grad">INFO GRAFIS JENIS PENGADAAN</h5>
									<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<div style="width: 500px;height: 500px">
													<canvas id="myChart4"></canvas>
												</div>
											</div>
											<div class="col-md-12" style="margin-top: -200px;">
												<div style="width: 500px;height: 500px">
													<canvas id="myChart5"></canvas>
												</div>
											</div>
											<div class="col-md-12">
												<div style="width: 500px;height: 500px" style="margin-top: 200px;">
													<canvas id="myChart6"></canvas>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } else if ($this->session->userdata('id_role') == 6) { ?>
	<div class="container">
		<br>
		<br>
		<ol class="breadcrumb btn-grad">
			<li><a style="text-decoration: none; color:white;" href="#">Agency</a></li>
		</ol>
		<div id="step1">
			<div class="content btn-grad text-black">
				<section class=" text-black" id="cardhide">
					<div class="row">
						<!-- <div class="col-12 col-sm-6 col-md-3">
							<a href="<?= base_url('pegawai') ?>" style="text-decoration:none">
								<div class="info-box btn-grad">
									<span class="info-box-icon bg-primary elevation-1">
										<i class="fas fa-user-tie" style="color: white;"></i>
									</span>
									<div class="info-box-content">
										<span class="info-box-text">Total Pegawai</span>
										<span class="info-box-number">
											<?= $hitung_pegawai['jumlah_pegawai'] ?>
										</span>
									</div>
								</div>
							</a>
						</div> -->
						<div class="col-12 col-sm-6 col-md-3">
							<a href="<?= base_url('panitia') ?>" style="text-decoration: none;">
								<div class="info-box btn-grad8">
									<span class="info-box-icon bg-success elevation-1">
										<i class="fas fa-users" style="color: white;"></i>
									</span>
									<div class="info-box-content">
										<span class="info-box-text">Total Panitia</span>
										<span class="info-box-number">
											<?= $total_panitia_agency ?>
										</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							<a href="<?= base_url('index.php/vendor') ?>" style="text-decoration: none;">
								<div class="info-box btn-grad25">
									<span class="info-box-icon bg-secondary elevation-1">
										<i class="fas fa-building" style="color: white;"></i>
									</span>
									<div class="info-box-content">
										<span class="info-box-text">Total Vendor</span>
										<span class="info-box-number">
											<!-- masih statis -->
											<?= $total_vendor_fix ?>
										</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							<a href="<?= base_url('paket') ?>" style="text-decoration: none;">
								<div class="info-box btn-grad20">
									<span class="info-box-icon bg-danger elevation-1">
										<i class="fas fa-file-signature" style="color: white;"></i>
									</span>
									<div class="info-box-content">
										<span class="info-box-text">Total Paket</span>
										<span class="info-box-number">
											<?= $total_paket_agency ?>
										</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							<a href="<?= base_url('paket') ?>" style="text-decoration: none;">
								<div class="info-box btn-grad">
									<span class="info-box-icon bg-danger elevation-1">
										<i class="fas fa-file-signature" style="color: white;"></i>
									</span>
									<div class="info-box-content">
										<span class="info-box-text">Total Tender</span>
										<span class="info-box-number">
											<?= $total_tender_fix_agency ?>
										</span>
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="row">

						<div class="col-12 col-sm-6 col-md-3">
							<a href="<?= base_url('paket') ?>" style="text-decoration: none;">
								<div class="info-box btn-grad20">
									<span class="info-box-icon bg-danger elevation-1">
										<i class="fas fa-file-signature" style="color: white;"></i>
									</span>
									<div class="info-box-content">
										<span class="info-box-text">Total Non Tender</span>
										<span class="info-box-number">
											<?= $total_nontender_fix_agency ?>
										</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							<a href="<?= base_url('paket') ?>" style="text-decoration: none;">
								<div class="info-box btn-grad8">
									<span class="info-box-icon bg-danger elevation-1">
										<i class="fas fa-file-signature" style="color: white;"></i>
									</span>
									<div class="info-box-content">
										<span class="info-box-text">Tender Berlangsung</span>
										<span class="info-box-number">
											<?= $tender_berjalan_fix_agency ?>
										</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							<a href="<?= base_url('paket') ?>" style="text-decoration: none;">
								<div class="info-box btn-grad20">
									<span class="info-box-icon bg-danger elevation-1">
										<i class="fas fa-file-signature" style="color: white;"></i>
									</span>
									<div class="info-box-content">
										<span class="info-box-text">Tender Sudah Selesai</span>
										<span class="info-box-number">

											<?= $tender_selesai_fix_agency ?>
										</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							<a href="<?= base_url('paket') ?>" style="text-decoration: none;">
								<div class="info-box btn-grad21">
									<span class="info-box-icon bg-danger elevation-1">
										<i class="fas fa-file-signature" style="color: white;"></i>
									</span>
									<div class="info-box-content">
										<span class="info-box-text">Belum Diumumkan</span>
										<span class="info-box-number">
											<?= $status_belum_diumumkan_agency ?>
										</span>
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="row">

					</div>
				</section>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<h5 class="card-header btn-grad">INFO GRAFIS VENDOR</h5>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div style="width: 500px;height: 500px">
									<canvas id="myChart7"></canvas>
								</div>
							</div>
							<div class="col-md-6">
								<center>
									<div style="width: 250px;height: 250px">
										<canvas id="myChart8"></canvas>
									</div>
								</center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container" style="margin-top: -200px;">
			<div class="row">
				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<h5 class="card-header btn-grad">INFO GRAFIS TENDER AGENCY</h5>
									<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<div style="width: 500px;height: 500px">
													<canvas id="myChart"></canvas>
												</div>
											</div>
											<div class="col-md-12" style="margin-top: -200px;">
												<div style="width: 500px;height: 500px">
													<canvas id="myChart2"></canvas>
												</div>
											</div>
											<div class="col-md-12">
												<div style="width: 500px;height: 500px" style="margin-top: 200px;">
													<canvas id="myChart3"></canvas>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<h5 class="card-header btn-grad">INFO GRAFIS JENIS PENGADAAN</h5>
									<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<div style="width: 500px;height: 500px">
													<canvas id="myChart4"></canvas>
												</div>
											</div>
											<div class="col-md-12" style="margin-top: -200px;">
												<div style="width: 500px;height: 500px">
													<canvas id="myChart5"></canvas>
												</div>
											</div>
											<div class="col-md-12">
												<div style="width: 500px;height: 500px" style="margin-top: 200px;">
													<canvas id="myChart6"></canvas>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
