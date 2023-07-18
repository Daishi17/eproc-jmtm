<!DOCTYPE html>
<html lang="en">

<head>
	<title>EPROC - JMTM</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="Shortcut Icon" href="<?= base_url('assets/img/unnamed.png') ?>" type="image/x-icon" sizes="96x96" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/boostrapnew/dist/css/bootstrap.min.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/boostrapnew/DataTables/media/css/jquery.dataTables.min.css" type="text/css" media="screen" />
	<!-- dataTables -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
	<!-- select2 -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<!-- custom -->
	<link rel="stylesheet" href="<?= base_url('assets/kintek.css') ?>" type="text/css" media="screen">
	<link rel="stylesheet" href="<?= base_url('assets/css_baruku.css') ?>" type="text/css" media="all">
	<link href="<?= base_url('assets/'); ?>sweetalert2/sweetalert2.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css">
	<script src="<?= base_url('assets/'); ?>js/sweetalert.min.js"></script>
	<script type="text/javascript" src="<?= base_url('assets/') ?>boostrapnew/dist/js/jquery.min.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>
	<script src="https://code.highcharts.com/modules/accessibility.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"></script>
	<style>
		.preloader {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			z-index: 9999;
			background-color: #fff;
		}

		.preloader .loading {
			position: absolute;
			left: 50%;
			top: 50%;
			transform: translate(-50%, -50%);
			font: 14px arial;
		}
	</style>