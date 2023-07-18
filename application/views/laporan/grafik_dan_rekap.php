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
	<div class="content" style="box-shadow: 2px 2px 10px 2px black;">
		<br>
		<div class="row">
			<div class="col-md-6">
				<div id="table-filter" class="row mb-2 g-3 align-items-center">
					<div class="col-md-2">
						<label for="Divisi" style="font-weight: bold;" class="col-form-label">TAHUN</label>
					</div>
					<div class="col-md-6">
						<select class="form-control select2">
							<option value="">--PILIH TAHUN--</option>
							<option>2021</option>
							<option>2022</option>
							<option>2023</option>
							<option>2024</option>
							<option>2025</option>
							<option>2026</option>
							<option>2027</option>
							<option>2028</option>
							<option>2029</option>
							<option>2030</option>
						</select>
					</div>
				</div>
				<div class="mt-3 mb-2"></div>
				<div id="table-filter3" class="row g-3 mb-2 align-items-center">
					<div class="col-md-2">
						<label for="Divisi" style="font-weight: bold;" class="col-form-label">UNIT</label>
					</div>
					<div class="col-md-6">
						<select class="form-control select2">
							<option value="">--PILIH UNIT--</option>
							<option>AMP</option>
							<option>Aset Management & Technology Development</option>
							<option>Business Development</option>
							<option>Corporate Planning, Finance, Tax & Accounting</option>
							<option>Finance Taxi Accounting</option>
							<option>Human Capital General Affair</option>
							<option>Maintenance Service Area 1</option>
							<option>Maintenance Service Area 2</option>
							<option>Maintenance Service Area 3</option>
							<option>Operation 1</option>
							<option>Operation 2</option>
							<option>Operation 3</option>
							<option>Procurement</option>
							<option>Project Construction,AMP & Heavy Equipment</option>
							<option>Project Maintenance</option>
							<option>Risk Management & QHSE</option>
							<option>RMMS</option>
						</select>

					</div>

				</div>
			</div>
		</div>
		<div style="overflow-x: auto;">
			<table id="example" class="table table-hover table-bordered text-center" style="font-size: x-small;">
				<thead>
					<tr>
						<th rowspan="3">Unit</th>
						<th colspan="5" rowspan="2">Jenis Pengadaan (buah)</th>
						<th colspan="5" rowspan="2">Metode Pemilihan (buah)</th>
						<th colspan="5" rowspan="2">Nilai Kontrak (Rp.)</th>
						<th colspan="12">Efisiensi </th>
					</tr>
					<tr>
						<th colspan="2">Penunjukan Langsung</th>
						<th colspan="2">Transaksi Langsung</th>
						<th colspan="2">Penetapan Langsung</th>
						<th colspan="2">E-Tender</th>
						<th colspan="2">Total</th>
						<th colspan="2">Bulan & Tahun</th>
					</tr>
					<tr>
						<th>Barang</th>
						<th>Jasa Pemborongan</th>
						<th>Jasa Konsultasi</th>
						<th>Jasa Lain</th>
						<th>Total</th>
						<th>Penunjukkan Langsung</th>
						<th>Transaksi Langsung</th>
						<th>Penetapan Langsung</th>
						<th>E-Tender</th>
						<th>Total</th>
						<th>Penunjukkan Langsung</th>
						<th>Transaksi Langsung</th>
						<th>Penetapan Langsung</th>
						<th>E-Tender</th>
						<th>Total</th>
						<th>Rp.</th>
						<th>%</th>
						<th>Rp.</th>
						<th>%</th>
						<th>Rp.</th>
						<th>%</th>
						<th>Rp.</th>
						<th>%</th>
						<th>Rp.</th>
						<th>%</th>
						<th>Bulan</th>
						<th>Tahun</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th>Procurement</th>
						<td><?= $total_barang_pcr ?></td>
						<td><?= $total_jasa_pemborongan_pcr ?></td>
						<td><?= $total_jasa_konsultansi_pcr ?></td>
						<td><?= $total_jasa_lain_pcr ?></td>
						<td><?= $total_barang_pcr + $total_jasa_pemborongan_pcr + $total_jasa_konsultansi_pcr + $total_jasa_lain_pcr  ?></td>
						<th><?= $total_penunjukkan_langsung_pcr ?></th>
						<th><?= $total_transaksi_langsung_pcr ?></th>
						<th><?= $total_penetapan_langsung_pcr ?></th>
						<th><?= $total_tender_pcr ?></th>
						<th><?= $total_kesuluruhan_pcr ?></th>
						<!--  -->
						<th><?= number_format($total_kontrak_penunjukkan_langsung_pcr['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_transaksi_langsung_pcr['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_penetapan_langsung_pcr['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_tender_pcr['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_pcr['total_kontrak'], 2, ',', '.') ?></th>
						<!--  -->
						<th>
							<?php $total = $total_efisiensi_penunjukkan_langsung_pcr['total_hps'] - $total_kontrak_penunjukkan_langsung_pcr['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?>
						</th>

						<th>
							<?php $persen =  $total_efisiensi_penunjukkan_langsung_pcr['total_hps'] - $total_kontrak_penunjukkan_langsung_pcr['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else if ($persen < 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penunjukkan_langsung_pcr['total_hps'], 2);
							}
							?>
						</th>
						<th>
							<?php $total = $total_efisiensi_transaksi_langsung_pcr['total_hps'] - $total_kontrak_transaksi_langsung_pcr['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?>
						</th>
						<th>
							<?php $persen =  $total_efisiensi_transaksi_langsung_pcr['total_hps'] - $total_kontrak_transaksi_langsung_pcr['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else if ($persen < 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_transaksi_langsung_pcr['total_hps'], 2);
							}
							?>
						</th>
						<th>
							<?php $total = $total_efisiensi_penetapan_langsung_pcr['total_hps'] - $total_kontrak_penetapan_langsung_pcr['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?>
						</th>
						<th>
							<?php $persen =  $total_efisiensi_penetapan_langsung_pcr['total_hps'] - $total_kontrak_penetapan_langsung_pcr['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else if ($persen < 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penetapan_langsung_pcr['total_hps'], 2);
							}
							?>
						</th>
						<th>
							<?php
							if ($total_efisiensi_tender_pcr['total_hps']  == 0) {
								$total2 = $total_efisiensi_tender_pcr['total_hps'];
								echo number_format($total2, 2, ',', '.');
							} else {
								$total2 = $total_efisiensi_tender_pcr['total_hps'] - $total_kontrak_pcr['total_kontrak'];
								echo number_format($total2, 2, ',', '.');
							}


							?>
						</th>
						<th>
							<?php $persen =  $total_efisiensi_tender_pcr['total_hps'] - $total_kontrak_tender_pcr['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else if ($persen < 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_tender_pcr['total_hps'], 2);
							}
							?>
						</th>
						<th>
							<?= number_format($total_efisiensi_transaksi_langsung_pcr['total_hps'] + $total_efisiensi_penetapan_langsung_pcr['total_hps'] +  $total_efisiensi_penetapan_langsung_pcr['total_hps'] + $total_efisiensi_tender_pcr['total_hps'], 2, ',', '.') ?></th>
						<th>
							<?php
							$pcr1 =  $total_efisiensi_transaksi_langsung_pcr['total_hps'] + $total_efisiensi_penetapan_langsung_pcr['total_hps'] +  $total_efisiensi_penetapan_langsung_pcr['total_hps'] + $total_efisiensi_tender_pcr['total_hps'];
							$pcr2 =  $total_kontrak_pcr['total_kontrak'];
							$total_final =  $pcr1 - $pcr2;
							// echo $total_final2 = $total_final / $pcr1;
							if ($total_final == 0) {
								echo '0';
							} else {
								echo  number_format($total_final / $pcr1, 2);
							}

							?>
						</th>
						<th><?= date('F') ?></th>
						<th><?= date('Y') ?></th>
					</tr>
					<tr>
						<th>Human Capital General Affair</th>
						<td><?= $total_barang_hcga ?></td>
						<td><?= $total_jasa_pemborongan_hcga ?></td>
						<td><?= $total_jasa_konsultansi_hcga ?></td>
						<td><?= $total_jasa_lain_hcga ?></td>
						<td><?= $total_barang_hcga + $total_jasa_pemborongan_hcga + $total_jasa_konsultansi_hcga + $total_jasa_lain_hcga  ?></td>
						<th><?= $total_penunjukkan_langsung_hcga ?></th>
						<th><?= $total_transaksi_langsung_hcga ?></th>
						<th><?= $total_penetapan_langsung_hcga ?></th>
						<th><?= $total_tender_hcga ?></th>
						<th><?= $total_kesuluruhan_hcga ?></th>
						<!--  -->
						<th><?= number_format($total_kontrak_penunjukkan_langsung_hcga['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_transaksi_langsung_hcga['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_penetapan_langsung_hcga['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_tender_hcga['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_hcga['total_kontrak'], 2, ',', '.') ?></th>
						<!--  -->
						<th>
							<?php $total = $total_efisiensi_penunjukkan_langsung_hcga['total_hps'] - $total_kontrak_penunjukkan_langsung_pcr['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?>
						</th>

						<th>
							<?php
							if ($persen == 0) {
								echo '0';
							} else {
								$persen =  $total_efisiensi_penunjukkan_langsung_hcga['total_hps'] - $total_kontrak_penunjukkan_langsung_hcga['total_kontrak'];
								if ($persen == 0) {
									echo '0';
								} else {
									echo number_format($persen / $total_efisiensi_penunjukkan_langsung_hcga['total_hps'], 2);
								}
							}
							?>
						</th>

						<th>
							<?php $total = $total_efisiensi_transaksi_langsung_hcga['total_hps'] - $total_kontrak_transaksi_langsung_hcga['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?>
						</th>
						<th>
							<?php $persen99 =  $total_efisiensi_transaksi_langsung_hcga['total_hps'] - $total_kontrak_transaksi_langsung_hcga['total_kontrak'];
							if ($persen99 == 0) {
								echo '0';
							} else {
								echo number_format($persen99 / $total_efisiensi_transaksi_langsung_hcga['total_hps'], 2);
							}
							?>
						</th>
						<th>
							<?php $total = $total_efisiensi_penetapan_langsung_hcga['total_hps'] - $total_kontrak_penetapan_langsung_hcga['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?>
						</th>
						<th>
							<?php $persen =  $total_efisiensi_penetapan_langsung_hcga['total_hps'] - $total_kontrak_penetapan_langsung_hcga['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penetapan_langsung_hcga['total_hps'], 2);
							}
							?>
						</th>
						<th>
							<?php $total2 = $total_efisiensi_tender_hcga['total_hps'] - $total_kontrak_hcga['total_kontrak'];
							echo number_format($total2, 2, ',', '.') ?>
						</th>
						<th>
							<?php $persen =  $total_efisiensi_tender_hcga['total_hps'] - $total_kontrak_tender_hcga['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else if ($persen < 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_tender_hcga['total_hps'], 2);
							}
							?>
						</th>
						<th>
							<?= number_format($total_efisiensi_transaksi_langsung_hcga['total_hps'] + $total_efisiensi_penetapan_langsung_hcga['total_hps'] +  $total_efisiensi_penetapan_langsung_hcga['total_hps'] + $total_efisiensi_tender_hcga['total_hps'], 2, ',', '.') ?></th>
						<th>
							<?php
							$hcga1 =  $total_efisiensi_transaksi_langsung_hcga['total_hps'] + $total_efisiensi_penetapan_langsung_hcga['total_hps'] +  $total_efisiensi_penetapan_langsung_hcga['total_hps'] + $total_efisiensi_tender_hcga['total_hps'];
							$hcga2 =  $total_kontrak_hcga['total_kontrak'];
							$total_final =  $hcga1 - $hcga2;
							if ($total_final == 0) {
								echo '0';
							} else {
								// echo $total_final2 = $total_final / $hcga1;
								echo  number_format($total_final / $hcga1, 2);
							}

							?>
						</th>
						<th><?= date('F') ?></th>
						<th><?= date('Y') ?></th>
					</tr>
					<tr>
						<th>RMMS</th>
						<td><?= $total_barang_rmms ?></td>
						<td><?= $total_jasa_pemborongan_rmms ?></td>
						<td><?= $total_jasa_konsultansi_rmms ?></td>
						<td><?= $total_jasa_lain_rmms ?></td>
						<td><?= $total_barang_rmms + $total_jasa_pemborongan_rmms + $total_jasa_konsultansi_rmms + $total_jasa_lain_rmms  ?></td>
						<th><?= $total_penunjukkan_langsung_rmms ?></th>
						<th><?= $total_transaksi_langsung_rmms ?></th>
						<th><?= $total_penetapan_langsung_rmms ?></th>
						<th><?= $total_tender_rmms ?></th>
						<th><?= $total_kesuluruhan_rmms ?></th>
						<!--  -->
						<th><?= number_format($total_kontrak_penunjukkan_langsung_rmms['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_transaksi_langsung_rmms['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_penetapan_langsung_rmms['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_tender_rmms['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_rmms['total_kontrak'], 2, ',', '.') ?></th>
						<!--  -->
						<th>
							<?php $total = $total_efisiensi_penunjukkan_langsung_rmms['total_hps'] - $total_kontrak_penunjukkan_langsung_rmms['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?>
						</th>
						<th><?php $persen =  $total_efisiensi_penunjukkan_langsung_rmms['total_hps'] - $total_kontrak_penunjukkan_langsung_rmms['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penunjukkan_langsung_rmms['total_hps'], 2);
							}
							?>
						</th>
						<th><?php $total = $total_efisiensi_transaksi_langsung_rmms['total_hps'] - $total_kontrak_transaksi_langsung_rmms['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_transaksi_langsung_rmms['total_hps'] - $total_kontrak_transaksi_langsung_rmms['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_transaksi_langsung_rmms['total_hps'], 2);
							}
							?></th>
						<th><?php $total = $total_efisiensi_penetapan_langsung_rmms['total_hps'] - $total_kontrak_penetapan_langsung_rmms['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_penetapan_langsung_rmms['total_hps'] - $total_kontrak_penetapan_langsung_rmms['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penetapan_langsung_rmms['total_hps'], 2);
							}
							?></th>
						<th><?php $total2 = $total_efisiensi_tender_rmms['total_hps'] - $total_kontrak_rmms['total_kontrak'];
							echo number_format($total2, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_tender_rmms['total_hps'] - $total_kontrak_tender_rmms['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_tender_rmms['total_hps'], 2);
							}
							?></th>
						<th><?= number_format($total_efisiensi_transaksi_langsung_rmms['total_hps'] + $total_efisiensi_penetapan_langsung_rmms['total_hps'] +  $total_efisiensi_penetapan_langsung_rmms['total_hps'] + $total_efisiensi_tender_rmms['total_hps'], 2, ',', '.') ?></th>
						<th>
							<?php
							$rmms1 =  $total_efisiensi_transaksi_langsung_rmms['total_hps'] + $total_efisiensi_penetapan_langsung_rmms['total_hps'] +  $total_efisiensi_penetapan_langsung_rmms['total_hps'] + $total_efisiensi_tender_rmms['total_hps'];
							$rmms2 =  $total_kontrak_rmms['total_kontrak'];
							$total_final =  $rmms1 - $rmms2;
							// echo $total_final2 = $total_final / $rmms1;
							if ($total_final == 0) {
								echo '0';
							} else {
								echo  number_format($total_final / $rmms1, 2);
							}

							?>
						</th>
						<th><?= date('F') ?></th>
						<th><?= date('Y') ?></th>
					</tr>
					<tr>
						<th>AMP</th>
						<td><?= $total_barang_amp ?></td>
						<td><?= $total_jasa_pemborongan_amp ?></td>
						<td><?= $total_jasa_konsultansi_amp ?></td>
						<td><?= $total_jasa_lain_amp ?></td>
						<td><?= $total_barang_amp + $total_jasa_pemborongan_amp + $total_jasa_konsultansi_amp + $total_jasa_lain_amp  ?></td>
						<th><?= $total_penunjukkan_langsung_amp ?></th>
						<th><?= $total_transaksi_langsung_amp ?></th>
						<th><?= $total_penetapan_langsung_amp ?></th>
						<th><?= $total_tender_amp ?></th>
						<th><?= $total_kesuluruhan_amp ?></th>
						<!--  -->
						<th><?= number_format($total_kontrak_penunjukkan_langsung_amp['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_transaksi_langsung_amp['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_penetapan_langsung_amp['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_tender_amp['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_amp['total_kontrak'], 2, ',', '.') ?></th>
						<!--  -->
						<th>
							<?php $total = $total_efisiensi_penunjukkan_langsung_amp['total_hps'] - $total_kontrak_penunjukkan_langsung_amp['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?>
						</th>
						<th><?php $persen =  $total_efisiensi_penunjukkan_langsung_amp['total_hps'] - $total_kontrak_penunjukkan_langsung_amp['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penunjukkan_langsung_amp['total_hps'], 2);
							}
							?></th>
						<th><?php $total = $total_efisiensi_transaksi_langsung_amp['total_hps'] - $total_kontrak_transaksi_langsung_amp['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_transaksi_langsung_amp['total_hps'] - $total_kontrak_transaksi_langsung_amp['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_transaksi_langsung_amp['total_hps'], 2);
							}
							?></th>
						<th><?php $total = $total_efisiensi_penetapan_langsung_amp['total_hps'] - $total_kontrak_penetapan_langsung_amp['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_penetapan_langsung_amp['total_hps'] - $total_kontrak_penetapan_langsung_amp['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penetapan_langsung_amp['total_hps'], 2);
							}
							?></th>
						<th><?php $total2 = $total_efisiensi_tender_amp['total_hps'] - $total_kontrak_amp['total_kontrak'];
							echo number_format($total2, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_tender_amp['total_hps'] - $total_kontrak_tender_amp['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_tender_amp['total_hps'], 2);
							}
							?></th>
						<th><?= number_format($total_efisiensi_transaksi_langsung_amp['total_hps'] + $total_efisiensi_penetapan_langsung_amp['total_hps'] +  $total_efisiensi_penetapan_langsung_amp['total_hps'] + $total_efisiensi_tender_amp['total_hps'], 2, ',', '.') ?></th>
						<th>
							<?php
							$amp1 =  $total_efisiensi_transaksi_langsung_amp['total_hps'] + $total_efisiensi_penetapan_langsung_amp['total_hps'] +  $total_efisiensi_penetapan_langsung_amp['total_hps'] + $total_efisiensi_tender_amp['total_hps'];
							$amp2 =  $total_kontrak_amp['total_kontrak'];
							$total_final =  $amp1 - $amp2;
							// echo $total_final2 = $total_final / $amp1;
							if ($total_final == 0) {
								echo '0';
							} else {
								echo  number_format($total_final / $amp1, 2);
							}

							?>
						</th>
						<th><?= date('F') ?></th>
						<th><?= date('Y') ?></th>
					</tr>
					<tr>
						<th>Project Construction,AMP & Heavy Equipment</th>
						<td><?= $total_barang_pche ?></td>
						<td><?= $total_jasa_pemborongan_pche ?></td>
						<td><?= $total_jasa_konsultansi_pche ?></td>
						<td><?= $total_jasa_lain_pche ?></td>
						<td><?= $total_barang_pche + $total_jasa_pemborongan_pche + $total_jasa_konsultansi_pche + $total_jasa_lain_pche  ?></td>
						<th><?= $total_penunjukkan_langsung_pche ?></th>
						<th><?= $total_transaksi_langsung_pche ?></th>
						<th><?= $total_penetapan_langsung_pche ?></th>
						<th><?= $total_tender_pche ?></th>
						<th><?= $total_kesuluruhan_pche ?></th>
						<!--  -->
						<th><?= number_format($total_kontrak_penunjukkan_langsung_pche['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_transaksi_langsung_pche['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_penetapan_langsung_pche['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_tender_pche['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_pche['total_kontrak'], 2, ',', '.') ?></th>
						<!--  -->
						<th>
							<?php $total = $total_efisiensi_penunjukkan_langsung_pche['total_hps'] - $total_kontrak_penunjukkan_langsung_pche['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?>
						</th>
						<th><?php $persen =  $total_efisiensi_penunjukkan_langsung_pche['total_hps'] - $total_kontrak_penunjukkan_langsung_pche['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penunjukkan_langsung_pche['total_hps'], 2);
							}
							?></th>
						<th><?php $total = $total_efisiensi_transaksi_langsung_pche['total_hps'] - $total_kontrak_transaksi_langsung_pche['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_transaksi_langsung_pche['total_hps'] - $total_kontrak_transaksi_langsung_pche['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_transaksi_langsung_pche['total_hps'], 2);
							}
							?></th>
						<th><?php $total = $total_efisiensi_penetapan_langsung_pche['total_hps'] - $total_kontrak_penetapan_langsung_pche['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_penetapan_langsung_pche['total_hps'] - $total_kontrak_penetapan_langsung_pche['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penetapan_langsung_pche['total_hps'], 2);
							}
							?></th>
						<th><?php $total2 = $total_efisiensi_tender_pche['total_hps'] - $total_kontrak_pche['total_kontrak'];
							echo number_format($total2, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_tender_pche['total_hps'] - $total_kontrak_tender_pche['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_tender_pche['total_hps'], 2);
							}
							?></th>
						<th><?= number_format($total_efisiensi_transaksi_langsung_pche['total_hps'] + $total_efisiensi_penetapan_langsung_pche['total_hps'] +  $total_efisiensi_penetapan_langsung_pche['total_hps'] + $total_efisiensi_tender_pche['total_hps'], 2, ',', '.') ?></th>
						<th>
							<?php
							$pche1 =  $total_efisiensi_transaksi_langsung_pche['total_hps'] + $total_efisiensi_penetapan_langsung_pche['total_hps'] +  $total_efisiensi_penetapan_langsung_pche['total_hps'] + $total_efisiensi_tender_pche['total_hps'];
							$pche2 =  $total_kontrak_pche['total_kontrak'];
							$total_final =  $pche1 - $pche2;
							// echo $total_final2 = $total_final / $pche1;
							if ($total_final == 0) {
								echo '0';
							} else {
								echo  number_format($total_final / $pche1, 2);
							}

							?>
						</th>
						<th><?= date('F') ?></th>
						<th><?= date('Y') ?></th>
					</tr>
					<tr>
						<th>Aset Management & Technology Development</th>
						<td><?= $total_barang_amtd ?></td>
						<td><?= $total_jasa_pemborongan_amtd ?></td>
						<td><?= $total_jasa_konsultansi_amtd ?></td>
						<td><?= $total_jasa_lain_amtd ?></td>
						<td><?= $total_barang_amtd + $total_jasa_pemborongan_amtd + $total_jasa_konsultansi_amtd + $total_jasa_lain_amtd  ?></td>
						<th><?= $total_penunjukkan_langsung_amtd ?></th>
						<th><?= $total_transaksi_langsung_amtd ?></th>
						<th><?= $total_penetapan_langsung_amtd ?></th>
						<th><?= $total_tender_amtd ?></th>
						<th><?= $total_kesuluruhan_amtd ?></th>
						<!--  -->
						<th><?= number_format($total_kontrak_penunjukkan_langsung_amtd['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_transaksi_langsung_amtd['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_penetapan_langsung_amtd['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_tender_amtd['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_amtd['total_kontrak'], 2, ',', '.') ?></th>
						<!--  -->
						<th>
							<?php $total = $total_efisiensi_penunjukkan_langsung_amtd['total_hps'] - $total_kontrak_penunjukkan_langsung_amtd['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?>
						</th>
						<th><?php $persen =  $total_efisiensi_penunjukkan_langsung_amtd['total_hps'] - $total_kontrak_penunjukkan_langsung_amtd['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penunjukkan_langsung_amtd['total_hps'], 2);
							}
							?></th>
						<th><?php $total = $total_efisiensi_transaksi_langsung_amtd['total_hps'] - $total_kontrak_transaksi_langsung_amtd['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_transaksi_langsung_amtd['total_hps'] - $total_kontrak_transaksi_langsung_amtd['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_transaksi_langsung_amtd['total_hps'], 2);
							}
							?></th>
						<th><?php $total = $total_efisiensi_penetapan_langsung_amtd['total_hps'] - $total_kontrak_penetapan_langsung_amtd['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_penetapan_langsung_amtd['total_hps'] - $total_kontrak_penetapan_langsung_amtd['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penetapan_langsung_amtd['total_hps'], 2);
							}
							?></th>
						<th><?php $total2 = $total_efisiensi_tender_amtd['total_hps'] - $total_kontrak_amtd['total_kontrak'];
							echo number_format($total2, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_tender_amtd['total_hps'] - $total_kontrak_tender_amtd['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_tender_amtd['total_hps'], 2);
							}
							?></th>
						<th><?= number_format($total_efisiensi_transaksi_langsung_amtd['total_hps'] + $total_efisiensi_penetapan_langsung_amtd['total_hps'] +  $total_efisiensi_penetapan_langsung_amtd['total_hps'] + $total_efisiensi_tender_amtd['total_hps'], 2, ',', '.') ?></th>
						<th>
							<?php
							$amtd1 =  $total_efisiensi_transaksi_langsung_amtd['total_hps'] + $total_efisiensi_penetapan_langsung_amtd['total_hps'] +  $total_efisiensi_penetapan_langsung_amtd['total_hps'] + $total_efisiensi_tender_amtd['total_hps'];
							$amtd2 =  $total_kontrak_amtd['total_kontrak'];
							$total_final =  $amtd1 - $amtd2;
							// echo $total_final2 = $total_final / $amtd1;
							if ($total_final == 0) {
								echo '0';
							} else {
								echo  number_format($total_final / $amtd1, 2);
							}

							?>
						</th>
						<th><?= date('F') ?></th>
						<th><?= date('Y') ?></th>
					</tr>
					<tr>
						<th>Business Development</th>
						<td><?= $total_barang_bd ?></td>
						<td><?= $total_jasa_pemborongan_bd ?></td>
						<td><?= $total_jasa_konsultansi_bd ?></td>
						<td><?= $total_jasa_lain_bd ?></td>
						<td><?= $total_barang_bd + $total_jasa_pemborongan_bd + $total_jasa_konsultansi_bd + $total_jasa_lain_bd  ?></td>
						<th><?= $total_penunjukkan_langsung_bd ?></th>
						<th><?= $total_transaksi_langsung_bd ?></th>
						<th><?= $total_penetapan_langsung_bd ?></th>
						<th><?= $total_tender_bd ?></th>
						<th><?= $total_kesuluruhan_bd ?></th>
						<!--  -->
						<th><?= number_format($total_kontrak_penunjukkan_langsung_bd['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_transaksi_langsung_bd['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_penetapan_langsung_bd['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_tender_bd['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_bd['total_kontrak'], 2, ',', '.') ?></th>
						<!--  -->
						<th>
							<?php $total = $total_efisiensi_penunjukkan_langsung_bd['total_hps'] - $total_kontrak_penunjukkan_langsung_bd['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?>
						</th>
						<th><?php $persen =  $total_efisiensi_penunjukkan_langsung_bd['total_hps'] - $total_kontrak_penunjukkan_langsung_bd['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penunjukkan_langsung_bd['total_hps'], 2);
							}
							?></th>
						<th><?php $total = $total_efisiensi_transaksi_langsung_bd['total_hps'] - $total_kontrak_transaksi_langsung_bd['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_transaksi_langsung_bd['total_hps'] - $total_kontrak_transaksi_langsung_bd['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_transaksi_langsung_bd['total_hps'], 2);
							}
							?></th>
						<th><?php $total = $total_efisiensi_penetapan_langsung_bd['total_hps'] - $total_kontrak_penetapan_langsung_bd['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_penetapan_langsung_bd['total_hps'] - $total_kontrak_penetapan_langsung_bd['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penetapan_langsung_bd['total_hps'], 2);
							}
							?></th>
						<th><?php $total2 = $total_efisiensi_tender_bd['total_hps'] - $total_kontrak_bd['total_kontrak'];
							echo number_format($total2, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_tender_bd['total_hps'] - $total_kontrak_tender_bd['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_tender_bd['total_hps'], 2);
							}
							?></th>
						<th><?= number_format($total_efisiensi_transaksi_langsung_bd['total_hps'] + $total_efisiensi_penetapan_langsung_bd['total_hps'] +  $total_efisiensi_penetapan_langsung_bd['total_hps'] + $total_efisiensi_tender_bd['total_hps'], 2, ',', '.') ?></th>
						<th>
							<?php
							$bd1 =  $total_efisiensi_transaksi_langsung_bd['total_hps'] + $total_efisiensi_penetapan_langsung_bd['total_hps'] +  $total_efisiensi_penetapan_langsung_bd['total_hps'] + $total_efisiensi_tender_bd['total_hps'];
							$bd2 =  $total_kontrak_bd['total_kontrak'];
							$total_final =  $bd1 - $bd2;
							// echo $total_final2 = $total_final / $bd1;
							if ($total_final == 0) {
								echo '0';
							} else {
								echo  number_format($total_final / $bd1, 2);
							}

							?>
						</th>
						<th><?= date('F') ?></th>
						<th><?= date('Y') ?></th>
					</tr>
					<tr>
						<th>Operation 1</th>
						<td><?= $total_barang_op1 ?></td>
						<td><?= $total_jasa_pemborongan_op1 ?></td>
						<td><?= $total_jasa_konsultansi_op1 ?></td>
						<td><?= $total_jasa_lain_op1 ?></td>
						<td><?= $total_barang_op1 + $total_jasa_pemborongan_op1 + $total_jasa_konsultansi_op1 + $total_jasa_lain_op1  ?></td>
						<th><?= $total_penunjukkan_langsung_op1 ?></th>
						<th><?= $total_transaksi_langsung_op1 ?></th>
						<th><?= $total_penetapan_langsung_op1 ?></th>
						<th><?= $total_tender_op1 ?></th>
						<th><?= $total_kesuluruhan_op1 ?></th>
						<!--  -->
						<th><?= number_format($total_kontrak_penunjukkan_langsung_op1['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_transaksi_langsung_op1['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_penetapan_langsung_op1['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_tender_op1['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_op1['total_kontrak'], 2, ',', '.') ?></th>
						<!--  -->
						<th>
							<?php $total = $total_efisiensi_penunjukkan_langsung_op1['total_hps'] - $total_kontrak_penunjukkan_langsung_op1['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?>
						</th>
						<th><?php $persen =  $total_efisiensi_penunjukkan_langsung_op1['total_hps'] - $total_kontrak_penunjukkan_langsung_op1['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penunjukkan_langsung_op1['total_hps'], 2);
							}
							?></th>
						<th><?php $total = $total_efisiensi_transaksi_langsung_op1['total_hps'] - $total_kontrak_transaksi_langsung_op1['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_transaksi_langsung_op1['total_hps'] - $total_kontrak_transaksi_langsung_op1['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_transaksi_langsung_op1['total_hps'], 2);
							}
							?></th>
						<th><?php $total = $total_efisiensi_penetapan_langsung_op1['total_hps'] - $total_kontrak_penetapan_langsung_op1['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_penetapan_langsung_op1['total_hps'] - $total_kontrak_penetapan_langsung_op1['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penetapan_langsung_op1['total_hps'], 2);
							}
							?></th>
						<th><?php $total2 = $total_efisiensi_tender_op1['total_hps'] - $total_kontrak_op1['total_kontrak'];
							echo number_format($total2, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_tender_op1['total_hps'] - $total_kontrak_tender_op1['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_tender_op1['total_hps'], 2);
							}
							?></th>
						<th><?= number_format($total_efisiensi_transaksi_langsung_op1['total_hps'] + $total_efisiensi_penetapan_langsung_op1['total_hps'] +  $total_efisiensi_penetapan_langsung_op1['total_hps'] + $total_efisiensi_tender_op1['total_hps'], 2, ',', '.') ?></th>
						<th>
							<?php
							$op11 =  $total_efisiensi_transaksi_langsung_op1['total_hps'] + $total_efisiensi_penetapan_langsung_op1['total_hps'] +  $total_efisiensi_penetapan_langsung_op1['total_hps'] + $total_efisiensi_tender_op1['total_hps'];
							$op12 =  $total_kontrak_op1['total_kontrak'];
							$total_final =  $op11 - $op12;
							// echo $total_final2 = $total_final / $op11;
							if ($total_final == 0) {
								echo '0';
							} else {
								echo  number_format($total_final / $op11, 2);
							}

							?>
						</th>
						<th><?= date('F') ?></th>
						<th><?= date('Y') ?></th>
					</tr>
					<tr>
						<th>Operation 2</th>
						<td><?= $total_barang_op2 ?></td>
						<td><?= $total_jasa_pemborongan_op2 ?></td>
						<td><?= $total_jasa_konsultansi_op2 ?></td>
						<td><?= $total_jasa_lain_op2 ?></td>
						<td><?= $total_barang_op2 + $total_jasa_pemborongan_op2 + $total_jasa_konsultansi_op2 + $total_jasa_lain_op2  ?></td>
						<th><?= $total_penunjukkan_langsung_op2 ?></th>
						<th><?= $total_transaksi_langsung_op2 ?></th>
						<th><?= $total_penetapan_langsung_op2 ?></th>
						<th><?= $total_tender_op2 ?></th>
						<th><?= $total_kesuluruhan_op2 ?></th>
						<!--  -->
						<th><?= number_format($total_kontrak_penunjukkan_langsung_op2['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_transaksi_langsung_op2['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_penetapan_langsung_op2['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_tender_op2['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_op2['total_kontrak'], 2, ',', '.') ?></th>
						<!--  -->
						<th>
							<?php $total = $total_efisiensi_penunjukkan_langsung_op2['total_hps'] - $total_kontrak_penunjukkan_langsung_op2['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?>
						</th>
						<th><?php $persen =  $total_efisiensi_penunjukkan_langsung_op2['total_hps'] - $total_kontrak_penunjukkan_langsung_op2['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penunjukkan_langsung_op2['total_hps'], 2);
							}
							?></th>
						<th><?php $total = $total_efisiensi_transaksi_langsung_op2['total_hps'] - $total_kontrak_transaksi_langsung_op2['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_transaksi_langsung_op2['total_hps'] - $total_kontrak_transaksi_langsung_op2['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_transaksi_langsung_op2['total_hps'], 2);
							}
							?></th>
						<th><?php $total = $total_efisiensi_penetapan_langsung_op2['total_hps'] - $total_kontrak_penetapan_langsung_op2['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_penetapan_langsung_op2['total_hps'] - $total_kontrak_penetapan_langsung_op2['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penetapan_langsung_op2['total_hps'], 2);
							}
							?></th>
						<th><?php $total2 = $total_efisiensi_tender_op2['total_hps'] - $total_kontrak_op2['total_kontrak'];
							echo number_format($total2, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_tender_op2['total_hps'] - $total_kontrak_tender_op2['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_tender_op2['total_hps'], 2);
							}
							?></th>
						<th><?= number_format($total_efisiensi_transaksi_langsung_op2['total_hps'] + $total_efisiensi_penetapan_langsung_op2['total_hps'] +  $total_efisiensi_penetapan_langsung_op2['total_hps'] + $total_efisiensi_tender_op2['total_hps'], 2, ',', '.') ?></th>
						<th>
							<?php
							$op21 =  $total_efisiensi_transaksi_langsung_op2['total_hps'] + $total_efisiensi_penetapan_langsung_op2['total_hps'] +  $total_efisiensi_penetapan_langsung_op2['total_hps'] + $total_efisiensi_tender_op2['total_hps'];
							$op22 =  $total_kontrak_op2['total_kontrak'];
							$total_final =  $op21 - $op22;
							// echo $total_final2 = $total_final / $op21;

							if ($total_final == 0) {
								echo '0';
							} else {
								echo  number_format($total_final / $op21, 2);
							}
							?>
						</th>
						<th><?= date('F') ?></th>
						<th><?= date('Y') ?></th>
					</tr>
					<tr>
						<th>Opertion 3</th>
						<td><?= $total_barang_op3 ?></td>
						<td><?= $total_jasa_pemborongan_op3 ?></td>
						<td><?= $total_jasa_konsultansi_op3 ?></td>
						<td><?= $total_jasa_lain_op3 ?></td>
						<td><?= $total_barang_op3 + $total_jasa_pemborongan_op3 + $total_jasa_konsultansi_op3 + $total_jasa_lain_op3  ?></td>
						<th><?= $total_penunjukkan_langsung_op3 ?></th>
						<th><?= $total_transaksi_langsung_op3 ?></th>
						<th><?= $total_penetapan_langsung_op3 ?></th>
						<th><?= $total_tender_op3 ?></th>
						<th><?= $total_kesuluruhan_op3 ?></th>
						<!--  -->
						<th><?= number_format($total_kontrak_penunjukkan_langsung_op3['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_transaksi_langsung_op3['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_penetapan_langsung_op3['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_tender_op3['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_op3['total_kontrak'], 2, ',', '.') ?></th>
						<!--  -->
						<th>
							<?php $total = $total_efisiensi_penunjukkan_langsung_op3['total_hps'] - $total_kontrak_penunjukkan_langsung_op3['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?>
						</th>
						<th><?php $persen =  $total_efisiensi_penunjukkan_langsung_op3['total_hps'] - $total_kontrak_penunjukkan_langsung_op3['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penunjukkan_langsung_op3['total_hps'], 2);
							}
							?></th>

						<th><?php $total = $total_efisiensi_transaksi_langsung_op3['total_hps'] - $total_kontrak_transaksi_langsung_op3['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_transaksi_langsung_op3['total_hps'] - $total_kontrak_transaksi_langsung_op3['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_transaksi_langsung_op3['total_hps'], 2);
							}
							?></th>
						<th><?php $total = $total_efisiensi_penetapan_langsung_op3['total_hps'] - $total_kontrak_penetapan_langsung_op3['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_penetapan_langsung_op3['total_hps'] - $total_kontrak_penetapan_langsung_op3['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penetapan_langsung_op3['total_hps'], 2);
							}
							?></th>
						<th><?php $total2 = $total_efisiensi_tender_op3['total_hps'] - $total_kontrak_op3['total_kontrak'];
							echo number_format($total2, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_tender_op3['total_hps'] - $total_kontrak_tender_op3['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_tender_op3['total_hps'], 2);
							}
							?></th>
						<th><?= number_format($total_efisiensi_transaksi_langsung_op3['total_hps'] + $total_efisiensi_penetapan_langsung_op3['total_hps'] +  $total_efisiensi_penetapan_langsung_op3['total_hps'] + $total_efisiensi_tender_op3['total_hps'], 2, ',', '.') ?></th>
						<th>
							<?php
							$op31 =  $total_efisiensi_transaksi_langsung_op3['total_hps'] + $total_efisiensi_penetapan_langsung_op3['total_hps'] +  $total_efisiensi_penetapan_langsung_op3['total_hps'] + $total_efisiensi_tender_op3['total_hps'];
							$op32 =  $total_kontrak_op3['total_kontrak'];
							$total_final =  $op31 - $op32;
							// echo $total_final2 = $total_final / $op31;
							if ($total_final == 0) {
								echo '0';
							} else {
								echo  number_format($total_final / $op31, 2);
							}

							?>
						</th>
						<th><?= date('F') ?></th>
						<th><?= date('Y') ?></th>
					</tr>
					<tr>
						<th>Maintenance Service Area 1</th>
						<td><?= $total_barang_msa1 ?></td>
						<td><?= $total_jasa_pemborongan_msa1 ?></td>
						<td><?= $total_jasa_konsultansi_msa1 ?></td>
						<td><?= $total_jasa_lain_msa1 ?></td>
						<td><?= $total_barang_msa1 + $total_jasa_pemborongan_msa1 + $total_jasa_konsultansi_msa1 + $total_jasa_lain_msa1  ?></td>
						<th><?= $total_penunjukkan_langsung_msa1 ?></th>
						<th><?= $total_transaksi_langsung_msa1 ?></th>
						<th><?= $total_penetapan_langsung_msa1 ?></th>
						<th><?= $total_tender_msa1 ?></th>
						<th><?= $total_kesuluruhan_msa1 ?></th>
						<!--  -->
						<th><?= number_format($total_kontrak_penunjukkan_langsung_msa1['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_transaksi_langsung_msa1['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_penetapan_langsung_msa1['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_tender_msa1['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_msa1['total_kontrak'], 2, ',', '.') ?></th>
						<!--  -->
						<th>
							<?php $total = $total_efisiensi_penunjukkan_langsung_msa1['total_hps'] - $total_kontrak_penunjukkan_langsung_msa1['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?>
						</th>
						<th><?php $persen =  $total_efisiensi_penunjukkan_langsung_msa1['total_hps'] - $total_kontrak_penunjukkan_langsung_msa1['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penunjukkan_langsung_msa1['total_hps'], 2);
							}
							?></th>
						<th><?php $total = $total_efisiensi_transaksi_langsung_msa1['total_hps'] - $total_kontrak_transaksi_langsung_msa1['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_transaksi_langsung_msa1['total_hps'] - $total_kontrak_transaksi_langsung_msa1['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_transaksi_langsung_msa1['total_hps'], 2);
							}
							?></th>
						<th><?php $total = $total_efisiensi_penetapan_langsung_msa1['total_hps'] - $total_kontrak_penetapan_langsung_msa1['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_penetapan_langsung_msa1['total_hps'] - $total_kontrak_penetapan_langsung_msa1['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penetapan_langsung_msa1['total_hps'], 2);
							}
							?></th>
						<th><?php $total2 = $total_efisiensi_tender_msa1['total_hps'] - $total_kontrak_msa1['total_kontrak'];
							echo number_format($total2, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_tender_msa1['total_hps'] - $total_kontrak_tender_msa1['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_tender_msa1['total_hps'], 2);
							}
							?></th>
						<th><?= number_format($total_efisiensi_transaksi_langsung_msa1['total_hps'] + $total_efisiensi_penetapan_langsung_msa1['total_hps'] +  $total_efisiensi_penetapan_langsung_msa1['total_hps'] + $total_efisiensi_tender_msa1['total_hps'], 2, ',', '.') ?></th>
						<th>
							<?php
							$msa11 =  $total_efisiensi_transaksi_langsung_msa1['total_hps'] + $total_efisiensi_penetapan_langsung_msa1['total_hps'] +  $total_efisiensi_penetapan_langsung_msa1['total_hps'] + $total_efisiensi_tender_msa1['total_hps'];
							$msa12 =  $total_kontrak_msa1['total_kontrak'];
							$total_final =  $msa11 - $msa12;
							// echo $total_final2 = $total_final / $msa11;

							if ($total_final == 0) {
								echo '0';
							} else {
								echo  number_format($total_final / $msa11, 2);
							}
							?>
						</th>
						<th><?= date('F') ?></th>
						<th><?= date('Y') ?></th>
					</tr>
					<tr>
						<th>Maintenance Service Area 2</th>
						<td><?= $total_barang_msa2 ?></td>
						<td><?= $total_jasa_pemborongan_msa2 ?></td>
						<td><?= $total_jasa_konsultansi_msa2 ?></td>
						<td><?= $total_jasa_lain_msa2 ?></td>
						<td><?= $total_barang_msa2 + $total_jasa_pemborongan_msa2 + $total_jasa_konsultansi_msa2 + $total_jasa_lain_msa2  ?></td>
						<th><?= $total_penunjukkan_langsung_msa2 ?></th>
						<th><?= $total_transaksi_langsung_msa2 ?></th>
						<th><?= $total_penetapan_langsung_msa2 ?></th>
						<th><?= $total_tender_msa2 ?></th>
						<th><?= $total_kesuluruhan_msa2 ?></th>
						<!--  -->
						<th><?= number_format($total_kontrak_penunjukkan_langsung_msa2['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_transaksi_langsung_msa2['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_penetapan_langsung_msa2['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_tender_msa2['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_msa2['total_kontrak'], 2, ',', '.') ?></th>
						<!--  -->
						<th>
							<?php $total = $total_efisiensi_penunjukkan_langsung_msa2['total_hps'] - $total_kontrak_penunjukkan_langsung_msa2['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?>
						</th>
						<th><?php $persen =  $total_efisiensi_penunjukkan_langsung_msa2['total_hps'] - $total_kontrak_penunjukkan_langsung_msa2['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penunjukkan_langsung_msa2['total_hps'], 2);
							}
							?></th>
						<th><?php $total = $total_efisiensi_transaksi_langsung_msa2['total_hps'] - $total_kontrak_transaksi_langsung_msa2['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_transaksi_langsung_msa2['total_hps'] - $total_kontrak_transaksi_langsung_msa2['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_transaksi_langsung_msa2['total_hps'], 2);
							}
							?></th>
						<th><?php $total = $total_efisiensi_penetapan_langsung_msa2['total_hps'] - $total_kontrak_penetapan_langsung_msa2['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_penetapan_langsung_msa2['total_hps'] - $total_kontrak_penetapan_langsung_msa2['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penetapan_langsung_msa2['total_hps'], 2);
							}
							?></th>
						<th><?php $total2 = $total_efisiensi_tender_msa2['total_hps'] - $total_kontrak_msa2['total_kontrak'];
							echo number_format($total2, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_tender_msa2['total_hps'] - $total_kontrak_tender_msa2['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_tender_msa2['total_hps'], 2);
							}
							?></th>
						<th><?= number_format($total_efisiensi_transaksi_langsung_msa2['total_hps'] + $total_efisiensi_penetapan_langsung_msa2['total_hps'] +  $total_efisiensi_penetapan_langsung_msa2['total_hps'] + $total_efisiensi_tender_msa2['total_hps'], 2, ',', '.') ?></th>
						<th>
							<?php
							$msa21 =  $total_efisiensi_transaksi_langsung_msa2['total_hps'] + $total_efisiensi_penetapan_langsung_msa2['total_hps'] +  $total_efisiensi_penetapan_langsung_msa2['total_hps'] + $total_efisiensi_tender_msa2['total_hps'];
							$msa22 =  $total_kontrak_msa2['total_kontrak'];
							$total_final =  $msa21 - $msa22;
							// echo $total_final2 = $total_final / $msa21;
							if ($total_final == 0) {
								echo '0';
							} else {
								echo  number_format($total_final / $msa21, 2);
							}

							?>
						</th>
						<th><?= date('F') ?></th>
						<th><?= date('Y') ?></th>
					</tr>
					<tr>
						<th>Maintenance Service Area 3</th>
						<td><?= $total_barang_msa3 ?></td>
						<td><?= $total_jasa_pemborongan_msa3 ?></td>
						<td><?= $total_jasa_konsultansi_msa3 ?></td>
						<td><?= $total_jasa_lain_msa3 ?></td>
						<td><?= $total_barang_msa3 + $total_jasa_pemborongan_msa3 + $total_jasa_konsultansi_msa3 + $total_jasa_lain_msa3  ?></td>
						<th><?= $total_penunjukkan_langsung_msa3 ?></th>
						<th><?= $total_transaksi_langsung_msa3 ?></th>
						<th><?= $total_penetapan_langsung_msa3 ?></th>
						<th><?= $total_tender_msa3 ?></th>
						<th><?= $total_kesuluruhan_msa3 ?></th>
						<!--  -->
						<th><?= number_format($total_kontrak_penunjukkan_langsung_msa3['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_transaksi_langsung_msa3['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_penetapan_langsung_msa3['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_tender_msa3['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_msa3['total_kontrak'], 2, ',', '.') ?></th>
						<!--  -->
						<th>
							<?php $total = $total_efisiensi_penunjukkan_langsung_msa3['total_hps'] - $total_kontrak_penunjukkan_langsung_msa3['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?>
						</th>
						<th><?php $persen =  $total_efisiensi_penunjukkan_langsung_msa3['total_hps'] - $total_kontrak_penunjukkan_langsung_msa3['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penunjukkan_langsung_msa3['total_hps'], 2);
							}
							?></th>
						<th><?php $total = $total_efisiensi_transaksi_langsung_msa3['total_hps'] - $total_kontrak_transaksi_langsung_msa3['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_transaksi_langsung_msa3['total_hps'] - $total_kontrak_transaksi_langsung_msa3['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_transaksi_langsung_msa3['total_hps'], 2);
							}
							?></th>
						<th><?php $total = $total_efisiensi_penetapan_langsung_msa3['total_hps'] - $total_kontrak_penetapan_langsung_msa3['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_penetapan_langsung_msa3['total_hps'] - $total_kontrak_penetapan_langsung_msa3['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penetapan_langsung_msa3['total_hps'], 2);
							}
							?></th>
						<th><?php $total2 = $total_efisiensi_tender_msa3['total_hps'] - $total_kontrak_msa3['total_kontrak'];
							echo number_format($total2, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_tender_msa3['total_hps'] - $total_kontrak_tender_msa3['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_tender_msa3['total_hps'], 2);
							}
							?></th>
						<th><?= number_format($total_efisiensi_transaksi_langsung_msa3['total_hps'] + $total_efisiensi_penetapan_langsung_msa3['total_hps'] +  $total_efisiensi_penetapan_langsung_msa3['total_hps'] + $total_efisiensi_tender_msa3['total_hps'], 2, ',', '.') ?></th>
						<th>
							<?php
							$msa31 =  $total_efisiensi_transaksi_langsung_msa3['total_hps'] + $total_efisiensi_penetapan_langsung_msa3['total_hps'] +  $total_efisiensi_penetapan_langsung_msa3['total_hps'] + $total_efisiensi_tender_msa3['total_hps'];
							$msa32 =  $total_kontrak_msa3['total_kontrak'];
							$total_final =  $msa31 - $msa32;
							// echo $total_final2 = $total_final / $msa31;
							if ($total_final == 0) {
								echo '0';
							} else {
								echo  number_format($total_final / $msa31, 2);
							}

							?>
						</th>
						<th><?= date('F') ?></th>
						<th><?= date('Y') ?></th>
					</tr>
					<tr>
						<th>Project Maintenance</th>
						<td><?= $total_barang_pm ?></td>
						<td><?= $total_jasa_pemborongan_pm ?></td>
						<td><?= $total_jasa_konsultansi_pm ?></td>
						<td><?= $total_jasa_lain_pm ?></td>
						<td><?= $total_barang_pm + $total_jasa_pemborongan_pm + $total_jasa_konsultansi_pm + $total_jasa_lain_pm  ?></td>
						<th><?= $total_penunjukkan_langsung_pm ?></th>
						<th><?= $total_transaksi_langsung_pm ?></th>
						<th><?= $total_penetapan_langsung_pm ?></th>
						<th><?= $total_tender_pm ?></th>
						<th><?= $total_kesuluruhan_pm ?></th>
						<!--  -->
						<th><?= number_format($total_kontrak_penunjukkan_langsung_pm['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_transaksi_langsung_pm['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_penetapan_langsung_pm['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_tender_pm['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_pm['total_kontrak'], 2, ',', '.') ?></th>
						<!--  -->
						<th>
							<?php $total = $total_efisiensi_penunjukkan_langsung_pm['total_hps'] - $total_kontrak_penunjukkan_langsung_pm['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?>
						</th>
						<th><?php $persen =  $total_efisiensi_penunjukkan_langsung_pm['total_hps'] - $total_kontrak_penunjukkan_langsung_pm['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penunjukkan_langsung_pm['total_hps'], 2);
							}
							?></th>
						<th><?php $total = $total_efisiensi_transaksi_langsung_pm['total_hps'] - $total_kontrak_transaksi_langsung_pm['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_transaksi_langsung_pm['total_hps'] - $total_kontrak_transaksi_langsung_pm['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_transaksi_langsung_pm['total_hps'], 2);
							}
							?></th>
						<th><?php $total = $total_efisiensi_penetapan_langsung_pm['total_hps'] - $total_kontrak_penetapan_langsung_pm['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_penetapan_langsung_pm['total_hps'] - $total_kontrak_penetapan_langsung_pm['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penetapan_langsung_pm['total_hps'], 2);
							}
							?></th>
						<th><?php $total2 = $total_efisiensi_tender_pm['total_hps'] - $total_kontrak_pm['total_kontrak'];
							echo number_format($total2, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_tender_pm['total_hps'] - $total_kontrak_tender_pm['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_tender_pm['total_hps'], 2);
							}
							?></th>
						<th><?= number_format($total_efisiensi_transaksi_langsung_pm['total_hps'] + $total_efisiensi_penetapan_langsung_pm['total_hps'] +  $total_efisiensi_penetapan_langsung_pm['total_hps'] + $total_efisiensi_tender_pm['total_hps'], 2, ',', '.') ?></th>
						<th>
							<?php
							$pm1 =  $total_efisiensi_transaksi_langsung_pm['total_hps'] + $total_efisiensi_penetapan_langsung_pm['total_hps'] +  $total_efisiensi_penetapan_langsung_pm['total_hps'] + $total_efisiensi_tender_pm['total_hps'];
							$pm2 =  $total_kontrak_pm['total_kontrak'];
							$total_final =  $pm1 - $pm2;
							// echo $total_final2 = $total_final / $pm1;
							if ($total_final == 0) {
								echo '0';
							} else {
								echo  number_format($total_final / $pm1, 2);
							}
							?>
						</th>
						<th><?= date('F') ?></th>
						<th><?= date('Y') ?></th>
					</tr>
					<tr>
						<th>Finance Taxi Accounting</th>
						<td><?= $total_barang_fta ?></td>
						<td><?= $total_jasa_pemborongan_fta ?></td>
						<td><?= $total_jasa_konsultansi_fta ?></td>
						<td><?= $total_jasa_lain_fta ?></td>
						<td><?= $total_barang_fta + $total_jasa_pemborongan_fta + $total_jasa_konsultansi_fta + $total_jasa_lain_fta  ?></td>
						<th><?= $total_penunjukkan_langsung_fta ?></th>
						<th><?= $total_transaksi_langsung_fta ?></th>
						<th><?= $total_penetapan_langsung_fta ?></th>
						<th><?= $total_tender_fta ?></th>
						<th><?= $total_kesuluruhan_fta ?></th>
						<!--  -->
						<th><?= number_format($total_kontrak_penunjukkan_langsung_fta['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_transaksi_langsung_fta['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_penetapan_langsung_fta['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_tender_fta['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_fta['total_kontrak'], 2, ',', '.') ?></th>
						<!--  -->
						<th>
							<?php $total = $total_efisiensi_penunjukkan_langsung_fta['total_hps'] - $total_kontrak_penunjukkan_langsung_fta['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?>
						</th>
						<th><?php $persen =  $total_efisiensi_penunjukkan_langsung_fta['total_hps'] - $total_kontrak_penunjukkan_langsung_fta['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penunjukkan_langsung_fta['total_hps'], 2);
							}
							?></th>
						<th><?php $total = $total_efisiensi_transaksi_langsung_fta['total_hps'] - $total_kontrak_transaksi_langsung_fta['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_transaksi_langsung_fta['total_hps'] - $total_kontrak_transaksi_langsung_fta['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_transaksi_langsung_fta['total_hps'], 2);
							}
							?>
						</th>
						<th><?php $total = $total_efisiensi_penetapan_langsung_fta['total_hps'] - $total_kontrak_penetapan_langsung_fta['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_penetapan_langsung_fta['total_hps'] - $total_kontrak_penetapan_langsung_fta['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penetapan_langsung_fta['total_hps'], 2);
							}
							?></th>
						<th><?php $total2 = $total_efisiensi_tender_fta['total_hps'] - $total_kontrak_fta['total_kontrak'];
							echo number_format($total2, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_tender_fta['total_hps'] - $total_kontrak_tender_fta['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else if ($persen < 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_tender_fta['total_hps'], 2);
							}
							?></th>
						<th><?= number_format($total_efisiensi_transaksi_langsung_fta['total_hps'] + $total_efisiensi_penetapan_langsung_fta['total_hps'] +  $total_efisiensi_penetapan_langsung_fta['total_hps'] + $total_efisiensi_tender_fta['total_hps'], 2, ',', '.') ?></th>
						<th>
							<?php
							$fta1 =  $total_efisiensi_transaksi_langsung_fta['total_hps'] + $total_efisiensi_penetapan_langsung_fta['total_hps'] +  $total_efisiensi_penetapan_langsung_fta['total_hps'] + $total_efisiensi_tender_fta['total_hps'];
							$fta2 =  $total_kontrak_fta['total_kontrak'];
							$total_final =  $fta1 - $fta2;
							if ($persen == 0) {
								echo '0';
							} else if ($persen < 0) {
								echo '0';
							} else {
								echo  number_format($total_final / $fta1, 2);
							}
							// echo $total_final2 = $total_final / $fta1;

							?>
						</th>
						<th><?= date('F') ?></th>
						<th><?= date('Y') ?></th>
					</tr>
					<tr>
						<th>Risk Management & QHSE</th>
						<td><?= $total_barang_rmq ?></td>
						<td><?= $total_jasa_pemborongan_rmq ?></td>
						<td><?= $total_jasa_konsultansi_rmq ?></td>
						<td><?= $total_jasa_lain_rmq ?></td>
						<td><?= $total_barang_rmq + $total_jasa_pemborongan_rmq + $total_jasa_konsultansi_rmq + $total_jasa_lain_rmq  ?></td>
						<th><?= $total_penunjukkan_langsung_rmq ?></th>
						<th><?= $total_transaksi_langsung_rmq ?></th>
						<th><?= $total_penetapan_langsung_rmq ?></th>
						<th><?= $total_tender_rmq ?></th>
						<th><?= $total_kesuluruhan_rmq ?></th>
						<!--  -->
						<th><?= number_format($total_kontrak_penunjukkan_langsung_rmq['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_transaksi_langsung_rmq['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_penetapan_langsung_rmq['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_tender_rmq['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_rmq['total_kontrak'], 2, ',', '.') ?></th>
						<!--  -->
						<th>
							<?php $total = $total_efisiensi_penunjukkan_langsung_rmq['total_hps'] - $total_kontrak_penunjukkan_langsung_rmq['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?>
						</th>
						<th><?php $persen =  $total_efisiensi_penunjukkan_langsung_rmq['total_hps'] - $total_kontrak_penunjukkan_langsung_rmq['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penunjukkan_langsung_rmq['total_hps'], 2);
							}
							?></th>
						<th><?php $total = $total_efisiensi_transaksi_langsung_rmq['total_hps'] - $total_kontrak_transaksi_langsung_rmq['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_transaksi_langsung_rmq['total_hps'] - $total_kontrak_transaksi_langsung_rmq['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_transaksi_langsung_rmq['total_hps'], 2);
							}
							?></th>
						<th><?php $total = $total_efisiensi_penetapan_langsung_rmq['total_hps'] - $total_kontrak_penetapan_langsung_rmq['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_penetapan_langsung_rmq['total_hps'] - $total_kontrak_penetapan_langsung_rmq['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penetapan_langsung_rmq['total_hps'], 2);
							}
							?></th>
						<th><?php $total2 = $total_efisiensi_tender_rmq['total_hps'] - $total_kontrak_rmq['total_kontrak'];
							echo number_format($total2, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_tender_rmq['total_hps'] - $total_kontrak_tender_rmq['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_tender_rmq['total_hps'], 2);
							}
							?></th>
						<th><?= number_format($total_efisiensi_transaksi_langsung_rmq['total_hps'] + $total_efisiensi_penetapan_langsung_rmq['total_hps'] +  $total_efisiensi_penetapan_langsung_rmq['total_hps'] + $total_efisiensi_tender_rmq['total_hps'], 2, ',', '.') ?></th>
						<th>
							<?php
							$rmq1 =  $total_efisiensi_transaksi_langsung_rmq['total_hps'] + $total_efisiensi_penetapan_langsung_rmq['total_hps'] +  $total_efisiensi_penetapan_langsung_rmq['total_hps'] + $total_efisiensi_tender_rmq['total_hps'];
							$rmq2 =  $total_kontrak_rmq['total_kontrak'];
							$total_final =  $rmq1 - $rmq2;
							// echo $total_final2 = $total_final / $rmq1;
							if ($total_final == 0) {
								echo '0';
							} else {
								echo  number_format($total_final / $rmq1, 2);
							}

							?>
						</th>
						<th><?= date('F') ?></th>
						<th><?= date('Y') ?></th>
					</tr>
					<tr>
						<th>Corporate Planning, Finance, Tax & Accounting</th>
						<td><?= $total_barang_cpfta ?></td>
						<td><?= $total_jasa_pemborongan_cpfta ?></td>
						<td><?= $total_jasa_konsultansi_cpfta ?></td>
						<td><?= $total_jasa_lain_cpfta ?></td>
						<td><?= $total_barang_cpfta + $total_jasa_pemborongan_cpfta + $total_jasa_konsultansi_cpfta + $total_jasa_lain_cpfta  ?></td>
						<th><?= $total_penunjukkan_langsung_cpfta ?></th>
						<th><?= $total_transaksi_langsung_cpfta ?></th>
						<th><?= $total_penetapan_langsung_cpfta ?></th>
						<th><?= $total_tender_cpfta ?></th>
						<th><?= $total_kesuluruhan_cpfta ?></th>
						<!--  -->
						<th><?= number_format($total_kontrak_penunjukkan_langsung_cpfta['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_transaksi_langsung_cpfta['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_penetapan_langsung_cpfta['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_tender_cpfta['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_cpfta['total_kontrak'], 2, ',', '.') ?></th>
						<!--  -->
						<th>
							<?php $total = $total_efisiensi_penunjukkan_langsung_cpfta['total_hps'] - $total_kontrak_penunjukkan_langsung_cpfta['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?>
						</th>
						<th><?php $persen =  $total_efisiensi_penunjukkan_langsung_cpfta['total_hps'] - $total_kontrak_penunjukkan_langsung_cpfta['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penunjukkan_langsung_cpfta['total_hps'], 2);
							}
							?></th>
						<th><?php $total = $total_efisiensi_transaksi_langsung_cpfta['total_hps'] - $total_kontrak_transaksi_langsung_cpfta['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_transaksi_langsung_cpfta['total_hps'] - $total_kontrak_transaksi_langsung_cpfta['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_transaksi_langsung_cpfta['total_hps'], 2);
							}
							?>
						</th>
						<th><?php $total = $total_efisiensi_penetapan_langsung_cpfta['total_hps'] - $total_kontrak_penetapan_langsung_cpfta['total_kontrak'];
							echo number_format($total, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_penetapan_langsung_cpfta['total_hps'] - $total_kontrak_penetapan_langsung_cpfta['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_penetapan_langsung_cpfta['total_hps'], 2);
							}
							?></th>
						<th><?php $total2 = $total_efisiensi_tender_cpfta['total_hps'] - $total_kontrak_cpfta['total_kontrak'];
							echo number_format($total2, 2, ',', '.') ?></th>
						<th><?php $persen =  $total_efisiensi_tender_cpfta['total_hps'] - $total_kontrak_tender_cpfta['total_kontrak'];
							if ($persen == 0) {
								echo '0';
							} else {
								echo number_format($persen / $total_efisiensi_tender_cpfta['total_hps'], 2);
							}
							?></th>
						<th><?= number_format($total_efisiensi_transaksi_langsung_cpfta['total_hps'] + $total_efisiensi_penetapan_langsung_cpfta['total_hps'] +  $total_efisiensi_penetapan_langsung_cpfta['total_hps'] + $total_efisiensi_tender_cpfta['total_hps'], 2, ',', '.') ?></th>
						<th>
							<?php
							$cpfta1 =  $total_efisiensi_transaksi_langsung_cpfta['total_hps'] + $total_efisiensi_penetapan_langsung_cpfta['total_hps'] +  $total_efisiensi_penetapan_langsung_cpfta['total_hps'] + $total_efisiensi_tender_cpfta['total_hps'];
							$cpfta2 =  $total_kontrak_cpfta['total_kontrak'];
							$total_final =  $cpfta1 - $cpfta2;
							if ($persen == 0) {
								echo '0';
							} else {
								echo  number_format($total_final / $cpfta1, 2);
							}
							// echo $total_final2 = $total_final / $fta1;

							?>
						</th>
						<th><?= date('F') ?></th>
						<th><?= date('Y') ?></th>
					</tr>
					<tr>
						<th>Total</th>
						<th><?= $total_barang['total_paket'] ?></th>
						<td><?= $total_jasa_pemborongan['total_paket'] ?></td>
						<td><?= $total_jasa_konsultansi['total_paket'] ?></td>
						<th><?= $total_jasa_lain['total_paket'] ?></th>
						<th><?= $total_barang['total_paket'] + $total_jasa_pemborongan['total_paket'] + $total_jasa_konsultansi['total_paket'] + $total_jasa_lain['total_paket'] ?></th>
						<th><?= $penunjukkan_langsung['total_paket'] ?></th>
						<th><?= $transaksi_langsung['total_paket'] ?></th>
						<th><?= $penetapan_langsung['total_paket'] ?></th>
						<th><?= $tender['total_paket'] ?></th>
						<th><?= $penunjukkan_langsung['total_paket'] + $transaksi_langsung['total_paket'] + $penetapan_langsung['total_paket'] + $tender['total_paket'] ?></th>
						<th><?= number_format($total_kontrak_penunjukkan_langsung['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_transaksi_langsung['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_penetapan_langsung['total_kontrak'], 2, ',', '.')  ?></th>
						<th><?= number_format($total_kontrak_tender['total_kontrak'], 2, ',', '.') ?></th>
						<th><?= number_format($total_kontrak_penunjukkan_langsung['total_kontrak'] + $total_kontrak_transaksi_langsung['total_kontrak'] + $total_kontrak_penetapan_langsung['total_kontrak'] + $total_kontrak_tender['total_kontrak'], 2, ',', '.') ?></th>

						<th><?= number_format($total_hps_penunjukkan_langsung['total_hps'] - $total_kontrak_penunjukkan_langsung['total_kontrak'], 2, ',', '.') ?></th>
						<th><?php
							$nilai1 = $total_hps_penunjukkan_langsung['total_hps'] - $total_kontrak_penunjukkan_langsung['total_kontrak'];
							if ($nilai1 == 0) {
								echo '0';
							} else {
								$nilai2 = $nilai1 / $total_hps_penunjukkan_langsung['total_hps'];
								if ($nilai2 == 0) {
									echo '0';
								} else {
									echo number_format($nilai2, 2, ',', '.');
								}
							}




							?></th>
						<th><?= number_format($total_hps_transaksi_langsung['total_hps'] - $total_kontrak_transaksi_langsung['total_kontrak'], 2, ',', '.') ?></th>
						<th><?php
							$nilai1 = $total_hps_transaksi_langsung['total_hps'] - $total_kontrak_transaksi_langsung['total_kontrak'];
							if ($nilai1 == 0) {
								echo '0';
							} else {
								$nilai2 = $nilai1 / $total_hps_transaksi_langsung['total_hps'];
								if ($nilai2 == 0) {
									echo '0';
								} else {
									echo number_format($nilai2, 2, ',', '.');
								}
							}


							?></th>
						<th><?= number_format($total_hps_penetapan_langsung['total_hps'] - $total_kontrak_penetapan_langsung['total_kontrak'], 2, ',', '.') ?></th>
						<th><?php
							$nilai1 = $total_hps_penetapan_langsung['total_hps'] - $total_kontrak_penetapan_langsung['total_kontrak'];
							if ($nilai1 == 0) {
								echo '0';
							} else {
								$nilai2 = $nilai1 / $total_hps_penetapan_langsung['total_hps'];
								if ($nilai2 == 0) {
									echo '0';
								} else {
									echo number_format($nilai2, 2, ',', '.');
								}
							}

							?></th>
						<th><?= number_format($total_hps_tender['total_hps'] - $total_kontrak_tender['total_kontrak'], 2, ',', '.') ?></th>
						<th><?php
							$nilai1 = $total_hps_tender['total_hps'] - $total_kontrak_tender['total_kontrak'];
							if ($nilai1 == 0) {
								echo '0';
							} else {
								$nilai2 = $nilai1 / $total_hps_tender['total_hps'];
								if ($nilai2 == 0) {
									echo '0';
								} else {
									echo number_format($nilai2, 2, ',', '.');
								}
							}


							?></th>
						<th><?php
							$nilai1 = $total_hps_penunjukkan_langsung['total_hps'] - $total_kontrak_penunjukkan_langsung['total_kontrak'];
							$nilai2 = $total_hps_transaksi_langsung['total_hps'] - $total_kontrak_transaksi_langsung['total_kontrak'];
							$nilai3 = $total_hps_penetapan_langsung['total_hps'] - $total_kontrak_penetapan_langsung['total_kontrak'];
							$nilai4 =  $total_hps_tender['total_hps'] - $total_kontrak_tender['total_kontrak'];

							$nilai_final1 = $nilai1 + $nilai2 + $nilai3 + $nilai4;
							echo number_format($nilai_final1, 2, ',', '.');
							?></th>
						<th>
							<?php
							$nilai1 = $total_hps_penunjukkan_langsung['total_hps'] - $total_kontrak_penunjukkan_langsung['total_kontrak'];
							$nilai2 = $total_hps_transaksi_langsung['total_hps'] - $total_kontrak_transaksi_langsung['total_kontrak'];
							$nilai3 = $total_hps_penetapan_langsung['total_hps'] - $total_kontrak_penetapan_langsung['total_kontrak'];
							$nilai4 =  $total_hps_tender['total_hps'] - $total_kontrak_tender['total_kontrak'];

							$nilai_final1 = $nilai1 + $nilai2 + $nilai3 + $nilai4;
							if ($nilai_final1 == 0) {
								echo '0';
							} else {
								$final_nilai = $total_seluruh_kontrak['total_kontrak'] / $nilai_final1;
								if ($final_nilai == 0) {
									echo '0';
								} else {
									echo number_format($final_nilai, 2, ',', '.');
								}
							}




							?>
						</th>
						<th><?= date('F') ?></th>
						<th><?= date('Y') ?></th>
					</tr>
				</tbody>
			</table>
		</div>

		<center>
			<table class="table table-hover table-bordered text-center" style="font-size:x-small">
				<thead>
					<tr>
						<th rowspan="2">Jenis Pengadaan</th>
						<th rowspan="2">Jumlah</th>
						<th rowspan="2">Anggaran</th>
						<th rowspan="2">Nilai Kontrak</th>
						<th colspan="2">Efisiensi</th>
					</tr>
					<tr>
						<th>Rp.</th>
						<th>%</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th>Barang</th>
						<td><?= $total_barang_semua_paket ?></td>
						<td>Rp. <?= number_format($anggaran_barang['total_anggaran'], 2, ',', '.') ?></td>
						<td>Rp. <?= number_format($kontrak_barang['total_kontrak'], 2, ',', '.') ?></td>
						<td>Rp. <?= number_format($anggaran_barang['total_anggaran'] - $kontrak_barang['total_kontrak'], 2, ',', '.') ?></td>
						<td><?php
							$nilaibarang = $anggaran_barang['total_anggaran'] - $kontrak_barang['total_kontrak'];
							if ($nilaibarang != '0') {
								$final_barang = $nilaibarang / $anggaran_barang['total_anggaran'];
								echo number_format($final_barang, 2, ',', '.');
							} else {
								echo '0';
							}

							?>
						</td>
					</tr>
					<tr>
						<th>Jasa Pemborongan</th>
						<td><?= $total_pemborongan_semua_paket ?></td>
						<td>Rp. <?= number_format($anggaran_pemborongan['total_anggaran'], 2, ',', '.')  ?></td>
						<td>Rp. <?= number_format($kontrak_pemborongan['total_kontrak'], 2, ',', '.') ?></td>
						<td>Rp. <?= number_format($anggaran_pemborongan['total_anggaran'] - $kontrak_pemborongan['total_kontrak'], 2, ',', '.') ?></td>
						<td> <?php
								$nilaipemborongan = $anggaran_pemborongan['total_anggaran'] - $kontrak_pemborongan['total_kontrak'];
								if ($nilaipemborongan != '0') {
									$final_pemborongan = $nilaipemborongan / $anggaran_pemborongan['total_anggaran'];
									echo number_format($final_pemborongan, 2, ',', '.');
								} else {
									echo '0';
								}

								?>
						</td>
					</tr>
					<tr>
						<th>Jasa Konsultansi</th>
						<td><?= $total_konsultansi_semua_paket ?></td>
						<td>Rp. <?= number_format($anggaran_konsultansi['total_anggaran'], 2, ',', '.')  ?></td>
						<td>Rp. <?= number_format($kontrak_konsultansi['total_kontrak'], 2, ',', '.') ?></td>
						<td>Rp. <?= number_format($anggaran_konsultansi['total_anggaran'] - $kontrak_konsultansi['total_kontrak'], 2, ',', '.') ?></td>
						<td><?php
							$nilaikonsultansi = $anggaran_konsultansi['total_anggaran'] - $kontrak_konsultansi['total_kontrak'];
							if ($nilaikonsultansi != '0') {
								$final_konsultansi = $nilaikonsultansi / $anggaran_konsultansi['total_anggaran'];
								echo number_format($final_konsultansi, 2, ',', '.');
							} else {
								echo '0';
							}

							?></td>
					</tr>
					<tr>
						<th>Jasa Lain</th>
						<td><?= $total_lain_semua_paket ?></td>
						<td>Rp. <?= number_format($anggaran_lain['total_anggaran'], 2, ',', '.')  ?></td>
						<td>Rp. <?= number_format($kontrak_lain['total_kontrak'], 2, ',', '.') ?></td>
						<td>Rp. <?= number_format($anggaran_lain['total_anggaran'] - $kontrak_lain['total_kontrak'], 2, ',', '.') ?></td>
						<td><?php
							$nilaijasalain = $anggaran_lain['total_anggaran'] - $kontrak_lain['total_kontrak'];
							if ($nilaijasalain != '0') {
								$final_jasalain = $nilaijasalain / $anggaran_lain['total_anggaran'];
								echo number_format($final_jasalain, 2, ',', '.');
							} else {
								echo '0';
							}
							?></td>
					</tr>
					<tr>
						<th>Total</th>
						<td><?= $total_semua_paket_jenis_pengadaan ?></td>
						<td>Rp. <?= number_format($anggaran_barang['total_anggaran'] +  $anggaran_pemborongan['total_anggaran'] + $anggaran_konsultansi['total_anggaran'] + $anggaran_lain['total_anggaran'], 2, ',', '.')  ?></td>
						<td>Rp. <?= number_format($kontrak_barang['total_kontrak'] +  $kontrak_pemborongan['total_kontrak'] + $kontrak_konsultansi['total_kontrak'] + $kontrak_lain['total_kontrak'], 2, ',', '.')  ?></td>
						<td>Rp.
							<?php
							$nilai1 = $anggaran_barang['total_anggaran'] +  $anggaran_pemborongan['total_anggaran'] + $anggaran_konsultansi['total_anggaran'] + $anggaran_lain['total_anggaran'];
							$nilai2 = $kontrak_barang['total_kontrak'] +  $kontrak_pemborongan['total_kontrak'] + $kontrak_konsultansi['total_kontrak'] + $kontrak_lain['total_kontrak'];

							$final = $nilai1 - $nilai2;
							if ($final  == 0) {
								echo '0';
							} else {
								echo number_format($final, 2, ',', '.');
							}

							?>
						</td>
						<td>
							<?php
							$nilai1 = $anggaran_barang['total_anggaran'] +  $anggaran_pemborongan['total_anggaran'] + $anggaran_konsultansi['total_anggaran'] + $anggaran_lain['total_anggaran'];
							$nilai2 = $kontrak_barang['total_kontrak'] +  $kontrak_pemborongan['total_kontrak'] + $kontrak_konsultansi['total_kontrak'] + $kontrak_lain['total_kontrak'];

							$final1 = $nilai1 - $nilai2;
							if ($final1 == 0) {
								echo '0';
							} else {
								$final2 = $final1 / $nilai1;
								if ($final2 == 0) {
									echo '0';
								} else {
									echo number_format($final2, 2, ',', '.');
								}
							}

							?>
						</td>
					</tr>
				</tbody>
			</table>
		</center>
		<br><br>
		<div class="card" style="box-shadow: 2px 2px 10px 2px;">
			<div class="card-header btn-grad">Jenis Pengadaan</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-4">
						<div class="card" style="box-shadow: 2px 2px 10px 2px;">
							<div class="card-header btn-grad">Type Chart Jumlah Pengadaan</div>
							<div class="card-body">
								<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
									<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Doughnuts Chart</a>
									<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Bar Chart</a>
									<a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Polar Area Chart</a>
									<a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#pie-chart" role="tab" aria-controls="v-pills-messages" aria-selected="false">Pie Chart</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="tab-content" id="v-pills-tabContent">
							<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
								<div class="card" style="box-shadow: 2px 2px 10px 2px;">
									<div class="card-header btn-grad">Dougnuts Chart</div>
									<div class="card-body">
										<center>
											<a target="_blank" href="<?= base_url('laporan/jenis_pengadaan_doughnut_pdf') ?>" class="btn btn-sm btn-grad2">
												<img width="35px" src="<?= base_url('assets/img/pdfku.png') ?>" alt=""> Export PDF</a>
											<div style="width: 500px;height: 500px">
												<canvas id="myChart"></canvas>
											</div>
										</center>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
								<div class="card" style="box-shadow: 2px 2px 10px 2px;">
									<div class="card-header btn-grad">Bar Chart</div>
									<div class="card-body">
										<center>
											<a target="_blank" href="<?= base_url('laporan/jenis_pengadaan_bar_pdf') ?>" class="btn btn-sm btn-grad2">
												<img width="35px" src="<?= base_url('assets/img/pdfku.png') ?>" alt=""> Export PDF</a>
											<div style="width: 500px;height: 500px">
												<canvas id="myChart2"></canvas>
											</div>
										</center>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
								<div class="card" style="box-shadow: 2px 2px 10px 2px;">
									<div class="card-header btn-grad">Polar Area Chart</div>
									<div class="card-body">
										<center>
											<a target="_blank" href="<?= base_url('laporan/jenis_pengadaan_polar_pdf') ?>" class="btn btn-sm btn-grad2">
												<img width="35px" src="<?= base_url('assets/img/pdfku.png') ?>" alt=""> Export PDF</a>
											<div style="width: 500px;height: 500px">
												<canvas id="myChart5"></canvas>
											</div>
										</center>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="pie-chart" role="tabpanel" aria-labelledby="v-pills-messages-tab">
								<div class="card" style="box-shadow: 2px 2px 10px 2px;">
									<div class="card-header btn-grad">Pie Chart</div>
									<div class="card-body">
										<center>
											<a target="_blank" href="<?= base_url('laporan/jenis_pengadaan_pie_pdf') ?>" class="btn btn-sm btn-grad2">
												<img width="35px" src="<?= base_url('assets/img/pdfku.png') ?>" alt=""> Export PDF</a>
											<div style="width: 500px;height: 500px">
												<canvas id="myChart9"></canvas>
											</div>
										</center>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
		<br>
		<div class="card" style="box-shadow: 2px 2px 10px 2px;">
			<div class="card-header btn-grad"> Nilai Kontrak Pengadaan</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-4">
						<div class="card" style="box-shadow: 2px 2px 10px 2px;">
							<div class="card-header btn-grad">Type Chart Nilai Kontrak Pengadaan</div>
							<div class="card-body">
								<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
									<a class="nav-link active" id="v-pills-kontrak1-tab" data-toggle="pill" href="#v-pills-kontrak1" role="tab" aria-controls="v-pills-kontrak1" aria-selected="true">Doughnuts Chart</a>
									<a class="nav-link" id="v-pills-kontrak2-tab" data-toggle="pill" href="#v-pills-kontrak2" role="tab" aria-controls="v-pills-kontrak2" aria-selected="false">Bar Chart</a>
									<a class="nav-link" id="v-pills-kontrak3-tab" data-toggle="pill" href="#v-pills-kontrak3" role="tab" aria-controls="v-pills-kontrak3" aria-selected="false">Polar Area Chart</a>
									<a class="nav-link" id="v-pills-kontrak3-tab" data-toggle="pill" href="#v-pills-kontrak4" role="tab" aria-controls="v-pills-kontrak3" aria-selected="false">Pie Chart</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="tab-content" id="v-pills-tabContent">
							<div class="tab-pane fade show active" id="v-pills-kontrak1" role="tabpanel" aria-labelledby="v-pills-kontrak1-tab">
								<div class="card" style="box-shadow: 2px 2px 10px 2px;">
									<div class="card-header btn-grad">Dougnuts Chart</div>
									<div class="card-body">
										<center>
											<a target="_blank" href="<?= base_url('laporan/nilai_kontrak_doughnut_pdf') ?>" class="btn btn-sm btn-grad2">
												<img width="35px" src="<?= base_url('assets/img/pdfku.png') ?>" alt=""> Export PDF</a>
											<div style="width: 500px;height: 500px">
												<canvas id="myChart3"></canvas>
											</div>
										</center>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="v-pills-kontrak2" role="tabpanel" aria-labelledby="v-pills-kontrak2-tab">
								<div class="card" style="box-shadow: 2px 2px 10px 2px;">
									<div class="card-header btn-grad">Bar Chart</div>
									<div class="card-body">
										<center>
											<a target="_blank" href="<?= base_url('laporan/nilai_kontrak_bar_pdf') ?>" class="btn btn-sm btn-grad2">
												<img width="35px" src="<?= base_url('assets/img/pdfku.png') ?>" alt=""> Export PDF</a>
											<div style="width: 500px;height: 500px">
												<canvas id="myChart4"></canvas>
											</div>
										</center>

									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="v-pills-kontrak3" role="tabpanel" aria-labelledby="v-pills-kontrak3-tab">
								<div class="card" style="box-shadow: 2px 2px 10px 2px;">
									<div class="card-header btn-grad">Polar Area Chart</div>
									<div class="card-body">
										<center>
											<a target="_blank" href="<?= base_url('laporan/nilai_kontrak_polar_pdf') ?>" class="btn btn-sm btn-grad2">
												<img width="35px" src="<?= base_url('assets/img/pdfku.png') ?>" alt=""> Export PDF</a>
											<div style="width: 500px;height: 500px">
												<canvas id="myChart7"></canvas>
											</div>
										</center>

									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="v-pills-kontrak4" role="tabpanel" aria-labelledby="v-pills-kontrak3-tab">
								<div class="card" style="box-shadow: 2px 2px 10px 2px;">
									<div class="card-header btn-grad">Pie Chart</div>
									<div class="card-body">
										<center>
											<a target="_blank" href="<?= base_url('laporan/nilai_kontrak_pie_pdf') ?>" class="btn btn-sm btn-grad2">
												<img width="35px" src="<?= base_url('assets/img/pdfku.png') ?>" alt=""> Export PDF</a>
											<div style="width: 500px;height: 500px">
												<canvas id="myChart8"></canvas>
											</div>
										</center>

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