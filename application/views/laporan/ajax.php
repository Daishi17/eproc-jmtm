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
		fill_datatable_get_rup()

		function fill_datatable_get_rup(id_unit_kerja = '', id_jenis_pengadaan = '', tanggal_buat_rup = '') {
			$('#danang2').DataTable({
				dom: 'Bfrtip',
				buttons: [{
					extend: 'excel',
					text: 'Export Excel',
					className: 'btn btn-grad8'
				}, {
					extend: 'print',
					text: 'Export PDF',
					className: 'btn btn-grad2',
					customize: function(win) {
						$(win.document.body)
							.css('font-size', '6pt')
						$(win.document.body).find('table')
							.addClass('compact')
							.css('font-size', 'inherit');
					}
				}],
				"responsive": true,
				"autoWidth": false,
				"processing": true,
				"serverSide": true,
				"order": [],
				"ajax": {
					"url": "<?= base_url('laporan/getdata') ?>",
					"type": "POST",
					//di gunakan untuk custom select data yg kita mau cari per apa
					data: {
						id_unit_kerja: id_unit_kerja,
						id_jenis_pengadaan: id_jenis_pengadaan,
						tanggal_buat_rup: tanggal_buat_rup

					}
				},
				"columnDefs": [{
					"target": [-1],
					"orderable": false
				}],
				"oLanguage": {
					"sSearch": "Pencarian : ",
					"sEmptyTable": "Data Tidak Tersedia",
					"sLoadingRecords": "Silahkan Tunggu - loading...",
					"sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
					"sZeroRecords": "Tidak Ada Data Yang Di Cari",
					"sProcessing": "Memuat Data...."
				}
			});
		}
		$('#filter3').click(function() {
			var id_unit_kerja = $('#id_unit_kerja').val();
			var id_jenis_pengadaan = $('#id_jenis_pengadaan').val();
			var tanggal_buat_rup = $('#tanggal_buat_rup').val();
			if (id_unit_kerja != '' && id_jenis_pengadaan != '' && tanggal_buat_rup != '') {
				$('#danang2').DataTable().destroy();
				fill_datatable_get_rup(id_unit_kerja, id_jenis_pengadaan, tanggal_buat_rup);
			} else {
				// alert('select Bosth Filter option');
				$('#danang2').DataTable().destroy();
				fill_datatable_get_rup();
			}
		})

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
		var ctx = document.getElementById("myChart9").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ["Barang", "Jasa Pemborongan", "Jasa Konsultansi", "Jasa Lain"],
				datasets: [{
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
		var ctx = document.getElementById("myChart8").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
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

<script>
	$(function() {
		//Initialize Select2 Elements
		$('.select2').select2()

		//Initialize Select2 Elements
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})

	})
</script>
<!-- 
<script>
	$(document).ready(function() {
		$('#example').DataTable({
			initComplete: function() {
				this.api().columns().every(function() {
					var column = this;
					var select = $('<select><option value=""></option></select>')
						.appendTo($(column.footer()).empty())
						.on('change', function() {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
							);

							column
								.search(val ? '^' + val + '$' : '', true, false)
								.draw();
						});

					column.data().unique().sort().each(function(d, j) {
						select.append('<option value="' + d + '">' + d + '</option>')
					});
				});
			},
			dom: 'Bfrtip',
			buttons: [{
				extend: 'excel',
				text: 'Export Excel',
				className: 'btn btn-grad8'
			}, {
				extend: 'print',
				text: 'Export PDF',
				className: 'btn btn-grad2',
				customize: function(win) {
					$(win.document.body)
						.css('font-size', '6pt')
					$(win.document.body).find('table')
						.addClass('compact')
						.css('font-size', 'inherit');
				}
			}],
		});
	});
</script> -->

<script>
	$(document).ready(function() {
		var table = $('#example').DataTable({
			"bPaginate": false,
			"bInfo": false,
			dom: 'lr<"table-filter-container">tip' + 'Bfrtip',
			buttons: [{
				extend: 'excel',
				text: 'Export Excel',
				className: 'btn btn-grad8'
			}, {
				extend: 'print',
				text: 'Export PDF',
				className: 'btn btn-grad2',
				customize: function(win) {
					$(win.document.body)
						.css('font-size', '6pt')
					$(win.document.body).find('table')
						.addClass('compact')
						.css('font-size', 'inherit');
				}
			}],
			initComplete: function(settings) {
				var api = new $.fn.dataTable.Api(settings);
				$('.table-filter-container', api.table().container()).append(
					$('#table-filter').detach().show(),
				);
				$('.table-filter-container', api.table().container()).append(
					$('#table-filter3').detach().show(),
				);
				$('.table-filter-container', api.table().container()).append(
					$('#table-filter4').detach().show(),
				);
				$('.table-filter-container', api.table().container()).append(
					$('#table-filter6').detach().show(),
				);

				$('#table-filter6 select').on('change', function() {
					table.search(this.value).draw();
				});
				$('#table-filter select').on('change', function() {
					table.search(this.value).draw();
				});
				$('#table-filter3 select').on('change', function() {
					table.search(this.value).draw();
				});
				$('#table-filter4 select').on('change', function() {
					table.search(this.value).draw();
				});
			}
		});

	});
</script>