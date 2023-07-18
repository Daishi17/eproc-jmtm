<script>
	window.print();
</script>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Grafik Dan Rekap</title>
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
	<script src="<?= base_url('assets/'); ?>js/sweetalert.min.js"></script>

	<script type="text/javascript" src="<?= base_url('assets/') ?>boostrapnew/dist/js/jquery.min.js"></script>
	<style type="text/css" media="print">
		@media print {
			/* @page {
				size: landscape
			} */

			table {
				page-break-inside: auto
			}

			tr {
				page-break-inside: avoid;
				page-break-after: auto
			}

			thead {
				display: table-header-group
			}

			tfoot {
				display: table-footer-group
			}
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
	</style>
</head>

<body style="font-size: 13px;">
	<div class="container">
		<div id="main" class="container">
			<br>
			<div class="content">
				<div style="display: block; margin: 0; width: 700mm; height: 700mm; transform: rotate(270deg) translate(-700mm, 0);
    transform-origin: 0 0;">
					<img class="pull-right" alt="LPSE" src="<?= base_url() ?>assets/img/jmtm2.png" width="15%" />
					<img class="pull-left" alt="LPSE" src="<?= base_url() ?>assets/img/bumn.png" width="15%" style="margin-left: 69%;" />
					<div class="row">
						<div class="col-md-10"></div>
					</div>
					<table id="rekap" class="table table-hover table-bordered text-center" style="font-size: x-small;table-layout: fixed; width: 100%;">
						<thead>
							<tr>
								<th rowspan="3">Divisi</th>
								<th colspan="5" rowspan="2">Jenis Pengadaan (buah)</th>
								<th colspan="5" rowspan="2">Metode Pemilihan (buah)</th>
								<th colspan="5" rowspan="2">Nilai Kontrak (Rp.)</th>
								<th colspan="10">Efisiensi </th>
							</tr>
							<tr>
								<th colspan="2">Penunjukan Langsung</th>
								<th colspan="2">Transaksi Langsung</th>
								<th colspan="2">Penetapan Langsung</th>
								<th colspan="2">E-Tender</th>
								<th colspan="2">Total</th>
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
							</tr>
						</thead>
						<tbody>
							<tr>
								<th>PCR</th>
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
								<th><?php $persen =  $total_efisiensi_penunjukkan_langsung_pcr['total_hps'] - $total_kontrak_penunjukkan_langsung_pcr['total_kontrak'];
									echo number_format($persen / $total_efisiensi_penunjukkan_langsung_pcr['total_hps'], 2) ?></th>
								<th><?php $total = $total_efisiensi_transaksi_langsung_pcr['total_hps'] - $total_kontrak_transaksi_langsung_pcr['total_kontrak'];
									echo number_format($total, 2, ',', '.') ?></th>
								<th><?php $persen =  $total_efisiensi_transaksi_langsung_pcr['total_hps'] - $total_kontrak_transaksi_langsung_pcr['total_kontrak'];
									echo number_format($persen / $total_efisiensi_transaksi_langsung_pcr['total_hps'], 2) ?></th>
								<th><?php $total = $total_efisiensi_penetapan_langsung_pcr['total_hps'] - $total_kontrak_penetapan_langsung_pcr['total_kontrak'];
									echo number_format($total, 2, ',', '.') ?></th>
								<th><?php $persen =  $total_efisiensi_penetapan_langsung_pcr['total_hps'] - $total_kontrak_penetapan_langsung_pcr['total_kontrak'];
									echo number_format($persen / $total_efisiensi_penetapan_langsung_pcr['total_hps'], 2) ?></th>
								<th><?php $total2 = $total_efisiensi_tender_pcr['total_hps'] - $total_kontrak_pcr['total_kontrak'];
									echo number_format($total2, 2, ',', '.') ?></th>
								<th><?php $persen =  $total_efisiensi_transaksi_langsung_pcr['total_hps'] - $total_kontrak_transaksi_langsung_pcr['total_kontrak'];
									if ($persen == 0) {
										echo '0';
									} else if ($persen < 0) {
										echo '0';
									} else {
										echo number_format($persen / $total_efisiensi_penunjukkan_langsung_pcr['total_hps'], 2);
									}
									?></th>
								<th><?= number_format($total_efisiensi_transaksi_langsung_pcr['total_hps'] + $total_efisiensi_penetapan_langsung_pcr['total_hps'] +  $total_efisiensi_penetapan_langsung_pcr['total_hps'] + $total_efisiensi_tender_pcr['total_hps'], 2, ',', '.') ?></th>
								<th>
									<?php
									$pcr1 =  $total_efisiensi_transaksi_langsung_pcr['total_hps'] + $total_efisiensi_penetapan_langsung_pcr['total_hps'] +  $total_efisiensi_penetapan_langsung_pcr['total_hps'] + $total_efisiensi_tender_pcr['total_hps'];
									$pcr2 =  $total_kontrak_pcr['total_kontrak'];
									$total_final =  $pcr1 - $pcr2;
									// echo $total_final2 = $total_final / $pcr1;
									echo  number_format($total_final / $pcr1, 2);
									?>
								</th>
							</tr>
							<tr>
								<th>HCGA</th>
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
									<?php $persen =  $total_efisiensi_penunjukkan_langsung_hcga['total_hps'] - $total_kontrak_penunjukkan_langsung_hcga['total_kontrak'];
									echo number_format($persen / $total_efisiensi_penunjukkan_langsung_hcga['total_hps'], 2) ?>
								</th>

								<th>
									<?php $total = $total_efisiensi_transaksi_langsung_hcga['total_hps'] - $total_kontrak_transaksi_langsung_hcga['total_kontrak'];
									echo number_format($total, 2, ',', '.') ?>
								</th>
								<th>
									<?php $persen =  $total_efisiensi_transaksi_langsung_hcga['total_hps'] - $total_kontrak_transaksi_langsung_hcga['total_kontrak'];
									if ($persen == 0) {
										echo '0';
									} else {
										echo number_format($persen / $total_efisiensi_penunjukkan_langsung_hcga['total_hps'], 2);
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
									// echo $total_final2 = $total_final / $hcga1;
									echo  number_format($total_final / $hcga1, 2);
									?>
								</th>
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
							</tr>
							<tr>
								<th>PCHE</th>
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
							</tr>
							<tr>
								<th>AMTD</th>
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
							</tr>
							<tr>
								<th>BD</th>
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
							</tr>
							<tr>
								<th>OP-1</th>
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
							</tr>
							<tr>
								<th>OP-2</th>
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
							</tr>
							<tr>
								<th>OP-3</th>
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
							</tr>
							<tr>
								<th>MSA-1</th>
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
							</tr>
							<tr>
								<th>MSA-2</th>
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
							</tr>
							<tr>
								<th>MSA-3</th>
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
							</tr>
							<tr>
								<th>PM</th>
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
							</tr>
							<tr>
								<th>FTA</th>
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
									} else {
										echo  number_format($total_final / $fta1, 2);
									}
									// echo $total_final2 = $total_final / $fta1;

									?>
								</th>
							</tr>
							<tr>
								<th>RMQ</th>
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
							</tr>
							<tr>
								<th>CPFTA</th>
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
									$nilai2 = $nilai1 / $total_hps_penunjukkan_langsung['total_hps'];
									echo number_format($nilai2, 2, ',', '.');
									?></th>
								<th><?= number_format($total_hps_transaksi_langsung['total_hps'] - $total_kontrak_transaksi_langsung['total_kontrak'], 2, ',', '.') ?></th>
								<th><?php
									$nilai1 = $total_hps_transaksi_langsung['total_hps'] - $total_kontrak_transaksi_langsung['total_kontrak'];
									$nilai2 = $nilai1 / $total_hps_transaksi_langsung['total_hps'];
									echo number_format($nilai2, 2, ',', '.');
									?></th>
								<th><?= number_format($total_hps_penetapan_langsung['total_hps'] - $total_kontrak_penetapan_langsung['total_kontrak'], 2, ',', '.') ?></th>
								<th><?php
									$nilai1 = $total_hps_penetapan_langsung['total_hps'] - $total_kontrak_penetapan_langsung['total_kontrak'];
									$nilai2 = $nilai1 / $total_hps_penetapan_langsung['total_hps'];
									echo number_format($nilai2, 2, ',', '.');
									?></th>
								<th><?= number_format($total_hps_tender['total_hps'] - $total_kontrak_tender['total_kontrak'], 2, ',', '.') ?></th>
								<th><?php
									$nilai1 = $total_hps_tender['total_hps'] - $total_kontrak_tender['total_kontrak'];
									$nilai2 = $nilai1 / $total_hps_tender['total_hps'];
									echo number_format($nilai2, 2, ',', '.');
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
									$final_nilai = $total_seluruh_kontrak['total_kontrak'] / $nilai_final1;
									echo number_format($final_nilai, 2, ',', '.');
									?>
								</th>
							</tr>
						</tbody>
					</table>
				</div>
				<center>
					<div style="width: 500px;height: 500px">
						<canvas id="myChart7"></canvas>
					</div>
				</center>
				<center>
					<div style="width: 500px;height: 500px">
						<canvas id="myChart4"></canvas>
					</div>
				</center>
				<center>
					<div style="width: 500px;height: 500px">
						<canvas id="myChart2"></canvas>
					</div>
				</center>
				<center>
					<div style="width: 500px;height: 500px">
						<canvas id="myChart"></canvas>
					</div>
				</center>
				<center>
					<div style="width: 500px;height: 500px">
						<canvas id="myChart5"></canvas>
					</div>
				</center>
				<center>
					<div style="width: 500px;height: 500px">
						<canvas id="myChart3"></canvas>
					</div>
				</center>
			</div>
		</div>
	</div>
	<!-- Jquery -->
	<!-- Bootstrap -->
	<script type="text/javascript" src="<?= base_url('assets/') ?>boostrapnew/dist/js/bootstrap.min.js"></script>
	<!-- dataTables -->
	<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<!-- select2 -->
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	<!-- custom js -->
	<script type="text/javascript" src="<?= base_url('assets/') ?>kintek.js"></script>

	<!-- datepicker -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js" integrity="sha512-ZrigzIl5MysuwHc2LaGI+uOLnLDdyYUth+pA5OuJC++WEleiYrztIc7nU/iBRWeP+ufmSGepuJULdgh/K0rIAA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
	<script type="text/javascript" src="<?= base_url('assets/datetimepicekernew/plugins/'); ?>jquery.datetimepicker.full.min.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>
	<script src="https://code.highcharts.com/modules/accessibility.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<script>
		$(document).ready(function() {
			$('#total').DataTable();
		});
	</script>
	<script>
		$(document).ready(function() {
			$('#danang').DataTable({
				dom: 'Bfrtip',
				buttons: [{
					extend: 'excel',
					text: 'Export Excel',
					className: 'btn btn-grad8'
				}]
			});
		});
	</script>
	<script>
		$(document).ready(function() {
			$('#danang2').DataTable({
				dom: 'Bfrtip',
				buttons: [{
					extend: 'excel',
					text: 'Export Excel',
					className: 'btn btn-grad8'
				}]
			});
		});
	</script>
	<script>
		$(document).ready(function() {
			$('#rekap').DataTable({
				dom: 'Bfrtip',
				buttons: [{
					extend: 'excel',
					text: 'Export Excel',
					className: 'btn btn-grad8'
				}]
			});
		});
	</script>
	<script>
		$(document).ready(function() {
			$('#kinerja').DataTable({
				dom: 'Bfrtip',
				buttons: [{
					extend: 'excel',
					text: 'Export Excel',
					className: 'btn btn-grad8'
				}]
			});
		});
	</script>




	<script>
		$(document).ready(function() {
			var ctx = document.getElementById("myChart").getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'doughnut',
				data: {
					labels: ["Barang", "Jasa Pemborongan", "Jasa Konsultansi", "Jasa Lain"],
					datasets: [{
						label: '# of Votes',
						data: [<?= $total_barang_semua_paket ?>, <?= $total_pemborongan_semua_paket ?>, <?= $total_konsultansi_semua_paket ?>, <?= $total_lain_semua_paket ?>],
						backgroundColor: [
							'rgba(54, 162, 235, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(153, 102, 255, 1)',
							'rgba(255, 159, 64, 1)'
						],
						hoverOffset: 4
					}]
				},
			});
		});
	</script>

	<script>
		$(document).ready(function() {
			var ctx = document.getElementById("myChart5").getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'polarArea',
				data: {
					labels: ["Barang", "Jasa Pemborongan", "Jasa Konsultansi", "Jasa Lain"],
					datasets: [{
						label: '# of Votes',
						data: [<?= $total_barang_semua_paket ?>, <?= $total_pemborongan_semua_paket ?>, <?= $total_konsultansi_semua_paket ?>, <?= $total_lain_semua_paket ?>],
						backgroundColor: [
							'rgba(54, 162, 235, 0.5)',
							'rgba(75, 192, 192, 0.5)',
							'rgba(153, 102, 255, 0.5)',
							'rgba(255, 159, 64, 0.5)'
						],
						hoverOffset: 4
					}]
				},
			});
		});
	</script>

	<script>
		$(document).ready(function() {
			var ctx2 = document.getElementById("myChart2").getContext('2d');
			var myChart2 = new Chart(ctx2, {
				type: 'bar',
				data: {
					labels: ["Barang", "Jasa Pemborongan", "Jasa Konsultansi", "Jasa Lain"],
					datasets: [{
						label: '# of Votes',
						data: [<?= $total_barang_semua_paket ?>, <?= $total_pemborongan_semua_paket ?>, <?= $total_konsultansi_semua_paket ?>, <?= $total_lain_semua_paket ?>],
						backgroundColor: [
							'rgba(54, 162, 235, 0.2)',
							'rgba(75, 192, 192, 0.2)',
							'rgba(153, 102, 255, 0.2)',
							'rgba(255, 159, 64, 0.2)'
						],
						borderColor: [
							'rgba(54, 162, 235, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(153, 102, 255, 1)',
							'rgba(255, 159, 64, 1)'
						],
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true
							}
						}]
					}
				}
			});
		});
	</script>

	<script>
		$(document).ready(function() {
			var ctx = document.getElementById("myChart3").getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'doughnut',
				data: {
					labels: ["Barang", "Jasa Pemborongan", "Jasa Konsultansi", "Jasa Lain"],
					datasets: [{
						label: '# of Votes',
						data: [<?= $kontrak_barang['total_kontrak'] ?>, <?= $kontrak_pemborongan['total_kontrak'] ?>, <?= $kontrak_konsultansi['total_kontrak'] ?>, <?= $kontrak_lain['total_kontrak'] ?>],
						backgroundColor: [
							'rgba(54, 162, 235, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(153, 102, 255, 1)',
							'rgba(255, 159, 64, 1)'
						],
						hoverOffset: 4
					}]
				},
			});
		});
	</script>

	<script>
		$(document).ready(function() {
			var ctx = document.getElementById("myChart7").getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'polarArea',
				data: {
					labels: ["Barang", "Jasa Pemborongan", "Jasa Konsultansi", "Jasa Lain"],
					datasets: [{
						label: '# of Votes',
						data: [<?= $kontrak_barang['total_kontrak'] ?>, <?= $kontrak_pemborongan['total_kontrak'] ?>, <?= $kontrak_konsultansi['total_kontrak'] ?>, <?= $kontrak_lain['total_kontrak'] ?>],
						backgroundColor: [
							'rgba(54, 162, 235, 0.5)',
							'rgba(75, 192, 192, 0.5)',
							'rgba(153, 102, 255, 0.5)',
							'rgba(255, 159, 64, 0.5)'
						],
						hoverOffset: 4
					}]
				},
			});
		});
	</script>

	<script>
		$(document).ready(function() {
			var ctx2 = document.getElementById("myChart4").getContext('2d');
			var myChart2 = new Chart(ctx2, {
				type: 'bar',
				data: {
					labels: ["Barang", "Jasa Pemborongan", "Jasa Konsultansi", "Jasa Lain"],
					datasets: [{
						label: '# of Votes',
						data: [<?= $kontrak_barang['total_kontrak'] ?>, <?= $kontrak_pemborongan['total_kontrak'] ?>, <?= $kontrak_konsultansi['total_kontrak'] ?>, <?= $kontrak_lain['total_kontrak'] ?>],
						backgroundColor: [
							'rgba(54, 162, 235, 0.2)',
							'rgba(75, 192, 192, 0.2)',
							'rgba(153, 102, 255, 0.2)',
							'rgba(255, 159, 64, 0.2)'
						],
						borderColor: [
							'rgba(54, 162, 235, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(153, 102, 255, 1)',
							'rgba(255, 159, 64, 1)'
						],
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true
							}
						}]
					}
				}
			});
		});
	</script>
</body>

</html>
<script>
	window.print();
</script>