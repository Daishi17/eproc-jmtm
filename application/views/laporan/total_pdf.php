<script>
	window.print();
</script>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Rekap Pengadaan</title>
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


					<table id="total" class="table table-bordered table-hover text-center" style="font-size:x-small; table-layout: fixed; width: 100%;">
						<thead>
							<tr>
								<th rowspan="3">No</th>
								<th rowspan="3">Kode</th>
								<th rowspan="3">Jenis Pengadaan</th>
								<th rowspan="3">Metode Pemilihan</th>
								<th colspan="2">Periode</th>
								<th rowspan="3">Nama Pekerjaan</th>
								<th rowspan="3">Divisi</th>
								<th>PPA</th>
								<th rowspan="3">Penyedia Barang/Jasa</th>
								<th rowspan="3">Nilai Kontrak(Rp.)</th>
								<th colspan="2">Efisiensi Terhadap</th>
								<th rowspan="3">Pasar</th>
								<th rowspan="3">SKK Keuangan dan PAsar</th>
								<th rowspan="3">Penganggung Jawab</th>
								<th rowspan="3">Catatan</th>
							</tr>
							<tr>
								<th rowspan="2">Tahun</th>
								<th rowspan="2">Bulan</th>
								<th rowspan="2">Nilai(Rp.)</th>
								<th colspan="2">Anggaran</th>
							</tr>
							<tr>
								<th>Rp.</th>
								<th>%</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($laporan as $key => $value) { ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $value['kode_tender'] ?></td>
									<td><?= $value['nama_jenis_pengadaan'] ?></td>
									<td><?= $value['nama_metode_pemilihan'] ?></td>
									<td><?= date('F', strtotime($value['tanggal_buat_rup'])) ?></td>
									<td><?= date('Y', strtotime($value['tanggal_buat_rup'])) ?></td>
									<td><?= $value['nama_paket'] ?></td>
									<td><?= $value['nama_unit_kerja'] ?></td>
									<td><?= number_format($value['hps'], 2, ',', '.') ?></td>
									<td><?= $value['username_vendor'] ?></td>
									<td><?= number_format($value['negosiasi'], 2, ',', '.') ?></td>
									<td><?= number_format($value['hps'] - $value['negosiasi'], 2, ',', '.') ?></td>
									<td><?php $total = $value['hps'] - $value['negosiasi'];
										echo number_format($total / $value['hps'], 2) ?> %</td>
									<td>100%</td>
									<td>120%</td>
									<td><?= $value['pembuat_paket'] ?></td>
									<td></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
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

</body>

</html>
<script>
	window.print();
</script>
