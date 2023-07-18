<script>
	var ctx = document.getElementById('myChart');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ['Vendor Aktif', 'Vendor Pending'],
			datasets: [{
				label: 'Vendor Aktif',
				data: [<?= $vendor_aktif['total_vendor_aktif'] ?>, <?= $vendor_pending['total_vendor_pending'] ?>],
				backgroundColor: [
					'rgba(75, 192, 192, 0.2)',
					'rgba(255, 99, 132, 0.2)',
				],
				borderColor: [
					'rgba(75, 192, 192, 1)',
					'rgba(255, 99, 132, 1)',
				],
				borderWidth: 1
			}]
		},
		options: {
			plugins: {
				legend: {
					display: false
				}
			}
		}
	});
</script>

<script>
	var ctx = document.getElementById('myChart2');
	var myChart = new Chart(ctx, {
		type: 'doughnut',
		data: {
			labels: ['Vendor Aktif', 'Vendor Pending'],
			datasets: [{
				data: [<?= $vendor_aktif['total_vendor_aktif'] ?>, <?= $vendor_pending['total_vendor_pending'] ?>],
				backgroundColor: [
					'rgba(75, 192, 192, 0.2)',
					'rgba(255, 99, 132, 0.2)',
				],
				borderColor: [
					'rgba(75, 192, 192, 1)',
					'rgba(255, 99, 132, 1)',
				],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				y: {
					beginAtZero: 1
				}
			}
		}
	});
</script>

<script>
	var ctx = document.getElementById('myChart3');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ['Sudah Tervalidasi', 'Belum Tervalidasi'],
			datasets: [{
				label: 'Vendor Aktif',
				data: [<?= $status_vendor_tervalidasi ?>, <?= $status_vendor_belum_tervalidasi ?>],
				backgroundColor: [
					'rgba(75, 192, 192, 0.2)',
					'rgba(255, 99, 132, 0.2)',
				],
				borderColor: [
					'rgba(75, 192, 192, 1)',
					'rgba(255, 99, 132, 1)',
				],
				borderWidth: 1
			}]
		},
		options: {
			plugins: {
				legend: {
					display: false
				}
			}
		}
	});
</script>

<script>
	var ctx = document.getElementById('myChart4');
	var myChart = new Chart(ctx, {
		type: 'doughnut',
		data: {
			labels: ['Sudah Tervalidasi', 'Belum Tervalidasi'],
			datasets: [{
				data: [<?= $status_vendor_tervalidasi ?>, <?= $status_vendor_belum_tervalidasi ?>],
				backgroundColor: [
					'rgba(75, 192, 192, 0.2)',
					'rgba(255, 99, 132, 0.2)',
				],
				borderColor: [
					'rgba(75, 192, 192, 1)',
					'rgba(255, 99, 132, 1)',
				],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				y: {
					beginAtZero: 1
				}
			}
		}
	});
</script>

<!-- notifikasi_validator -->
<script>
	$(document).ready(function() {

		function notifikasi_paket_validator() {
			$.ajax({
				type: "post",
				url: "<?= base_url() ?>vendor/notifikasi_validator",
				dataType: "json",
				success: function(response) {
					var nnn = response.dataku;
					$("#notifku").html(nnn);
				}
			});

		}
		setInterval(() => {
			notifikasi_paket_validator()
		}, 1000);
	});

	function sudah_dibaca_notifikasi_validator(id_vendor) {
		$.ajax({
			type: "post",
			url: "<?= base_url() ?>vendor/notifikasi_validator_sudah_dibaca/" + id_vendor,
			dataType: "json",
			success: function(response) {
				location.replace("<?= base_url() ?>vendor/detail_vendor_aktif/" + id_vendor)
			}
		});
	}
</script>
