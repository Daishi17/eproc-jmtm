<script>
	window.print();
</script>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Laporan Kinerja Vendor</title>
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

				<div>
					<img class="pull-right" alt="LPSE" src="<?= base_url() ?>assets/img/jmtm2.png" width="15%" />
					<img class="pull-left" alt="LPSE" src="<?= base_url() ?>assets/img/bumn.png" width="15%" style="margin-left: 69%;" />
					<div class="row">
						<div class="col-md-10"></div>
					</div>


					<table class="table table-hover" style="font-size:smaller">
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
