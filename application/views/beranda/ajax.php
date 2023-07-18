<script>
	$(document).ready(function() {
		window.setTimeout(function() {
			$(".preloader").fadeTo(500, 0).slideUp(500, function() {
				$(this).remove();
			});
		}, 2000)
	})
</script>
<script>
	$(document).ready(function() {
		var table = $('#table_ekontrak').DataTable({
			"responsive": true,
			"autoWidth": true,
			"processing": true,
			"serverSide": true,
			"order": [],

			"ajax": {
				url: "<?= base_url() . 'beranda/fetch_ekontrak'; ?>",
				type: "POST",
			},
			"columnDefs": [{
				"targets": [],
				"orderable": false,
			}],
			"oLanguage": {
				"sSearch": "Pencarian : ",
				"sEmptyTable": "Data Tidak Tersedia",
				"sLoadingRecords": "Silahkan Tunggu - loading...",
				"sLengthMenu": "Menampilkan_MENU_Data",
				"sZeroRecords": "Data Tidak Tersedia",
				"sProcessing": "Sedang Dimuat....."
			}
		});
	});
</script>
<script>
	Highcharts.chart('container_agency', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'INFO GRAFIS TENDER AGENCY'
		},
		subtitle: {
			text: '<?= date('Y') ?>'
		},
		xAxis: {
			categories: [
				<?php foreach ($tender_agency as $value) { ?> '<?= $value['nama_unit_kerja']; ?>',
				<?php	} ?>
			],
			crosshair: true
		},
		yAxis: {
			min: 0,
			title: {
				text: 'DATA PAKET'
			}
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		series: [{
			name: 'Jumlah',
			data: [2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 2, 2, 4, 3, 2, 3, 4]

		}, ]
	});
</script>

<script>
	Highcharts.chart('container_metopem', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'INFO GRAFIS METODE PEMILIHAN'
		},
		subtitle: {
			text: '<?= date('Y') ?>'
		},
		xAxis: {
			categories: [
				<?php foreach ($metode_pemilihan as $value) { ?> '<?= $value['nama_metode_pemilihan']; ?>',
				<?php	} ?>
			],
			crosshair: true
		},
		yAxis: {
			min: 0,
			title: {
				text: 'DATA PAKET'
			}
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		series: [{
			name: 'Jumlah',
			data: [2, 2, 2, 2, 2, 2, 3, 2, 2, 4, 3, 2, 3, 4]

		}, ]
	});
</script>

<script>
	Highcharts.chart('container_vendor', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'INFO GRAFIS STATUS VENDOR'
		},
		subtitle: {
			text: '<?= date('Y') ?>'
		},
		xAxis: {
			categories: [
				'Vendor Aktif',
				'Vendor Non Aktif',
				'Vendor Daftar Hitam'
			],
			crosshair: true
		},
		yAxis: {
			min: 0,
			title: {
				text: 'DATA PAKET'
			}
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		series: [{
			name: 'Jumlah',
			data: [<?= $get_vendor['vendor_aktif'] ?>, <?= $get_vendor2['vendor_non_aktif'] ?>, <?= $get_vendor3['vendor_daftar_hitam'] ?>]

		}, ]
	});
</script>

<script>
	Highcharts.chart('container2_agency', {
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie'
		},
		title: {
			text: 'INFO GRAFIS TENDER AGENCY'
		},
		tooltip: {
			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		},
		accessibility: {
			point: {
				valueSuffix: '%'
			}
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: true,
					format: '<b>{point.name}</b>: {point.percentage:.1f} %'
				}
			}
		},
		series: [{
			name: 'Nama Paket',
			colorByPoint: true,
			data: [<?php $i = 1;
					foreach ($tender_agency as $value) { ?> {

						name: '<?= $value['nama_unit_kerja']; ?>',
						y: 5.84

					},
				<?php	} ?>
			]
		}]
	});
</script>

<script>
	Highcharts.chart('container2_metopem', {
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie'
		},
		title: {
			text: 'INFO GRAFIS METODE PEMILIHAN'
		},
		tooltip: {
			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		},
		accessibility: {
			point: {
				valueSuffix: '%'
			}
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: true,
					format: '<b>{point.name}</b>: {point.percentage:.1f} %'
				}
			}
		},
		series: [{
			name: 'Nama Paket',
			colorByPoint: true,
			data: [<?php
					foreach ($metode_pemilihan as $value) { ?> {
						name: '<?= $value['nama_metode_pemilihan']; ?>',
						y: 5.84
					},
				<?php	} ?>
			]
		}]
	});
</script>

<script>
	Highcharts.chart('container2_vendor', {
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie'
		},
		title: {
			text: 'INFO GRAFIS VENDOR'
		},
		tooltip: {
			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		},
		accessibility: {
			point: {
				valueSuffix: '%'
			}
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: true,
					format: '<b>{point.name}</b>: {point.percentage:.1f} %'
				}
			}
		},
		series: [{
			name: 'Nama Paket',
			colorByPoint: true,
			data: [{
				name: 'Vendor Aktif',
				y: <?= $get_vendor['vendor_aktif'] ?>,
			}, {
				name: 'Vendor Non Aktif',
				y: <?= $get_vendor2['vendor_non_aktif'] ?>
			}, {
				name: 'Vendor Daftar Hitam',
				y: <?= $get_vendor3['vendor_daftar_hitam'] ?>
			}]
		}]
	});
</script>

<script>
	Highcharts.chart('container3_agency', {

		title: {
			text: 'INFO GRAFIS TENDER AGENCY'
		},

		xAxis: {
			categories: [
				<?php foreach ($all_paket as $value) { ?> '<?= $value['nama_paket']; ?>',
				<?php	} ?>
			],
			crosshair: true
		},

		yAxis: {
			min: 0,
			title: {
				text: 'DATA PAKET'
			}
		},

		series: [
			<?php $i = 1;
			foreach ($all_paket as $value) { ?> {
					name: '<?= $value['nama_paket']; ?>',
					data: [2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 2, 2, 4, 3, 2, 3, 4],
				},
			<?php	} ?>
		]
	});
</script>

<script>
	Highcharts.chart('container3_metopem', {

		title: {
			text: 'INFO GRAFIS METODE PEMILIHAN'
		},

		xAxis: {
			categories: [
				<?php foreach ($metode_pemilihan as $value) { ?> '<?= $value['nama_metode_pemilihan']; ?>',
				<?php	} ?>
			],
			crosshair: true
		},

		yAxis: {
			min: 0,
			title: {
				text: 'DATA PAKET'
			}
		},

		series: [
			<?php $i = 1;
			foreach ($metode_pemilihan as $value) { ?> {
					name: '<?= $value['nama_metode_pemilihan']; ?>',
					data: [2, 2, 2, 2, 2, 2, 3, 2, 2, 4, 3, 2, 3, 4],
				},
			<?php	} ?>
		]
	});
</script>

<script>
	Highcharts.chart('container3_vendor', {

		title: {
			text: 'INFO GRAFIS VENDOR'
		},

		xAxis: {
			categories: [
				'Vendor Aktif',
				'Vendor Non Aktif',
				// 'Vendor Daftar Hitam'
			],
			crosshair: true
		},

		yAxis: {
			min: 0,
			title: {
				text: 'DATA PAKET'
			}
		},

		// data: [{
		// 		name: 'Vendor Aktif',
		// 		y: <?= $get_vendor['vendor_aktif'] ?>,
		// 	}, {
		// 		name: 'Vendor Non Aktif',
		// 		y: <?= $get_vendor2['vendor_non_aktif'] ?>
		// 	}, {
		// 		name: 'Vendor Daftar Hitam',
		// 		y: <?= $get_vendor3['vendor_daftar_hitam'] ?>
		// 	}]

		series: [{
			name: 'Vendor Aktif',
			data: [<?= $get_vendor['vendor_aktif'] ?>],
		}, {
			name: 'Vendor Non Aktif',
			data: [<?= $get_vendor2['vendor_non_aktif'] ?>],
		}, {
			name: 'Vendor Daftar Hitam',
			data: [<?= $get_vendor3['vendor_daftar_hitam'] ?>],
		}]
	});
</script>
<script>
	$(document).ready(function() {
		$('#table_sayang').DataTable();
	});
</script>