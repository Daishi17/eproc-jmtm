<script>
	$(document).ready(function() {
		var table = $('#table_ukpbj').DataTable({
			"responsive": true,
			"autoWidth": true,
			"processing": true,
			"serverSide": true,
			"ajax": {
				url: "<?= base_url() . 'ukpbj/fetch_ukpbj'; ?>",
				type: "POST",
			},
			"columnDefs": [{
				"targets": [],
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
</script>;
