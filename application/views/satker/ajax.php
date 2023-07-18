<script>
	$(document).ready(function() {
		var table = $('#table_satker').DataTable({
			"responsive": true,
			"autoWidth": true,
			"processing": true,
			"serverSide": true,
			"ajax": {
				url: "<?= base_url() . 'satker/fetch_satker'; ?>",
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
				"sZeroRecords": "Tidak ada Data untuk ditampilkan",
				"sProcessing": "Sedang Dimuat....."
			}
		});
	});
</script>;
