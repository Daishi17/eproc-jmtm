<!-- RINCIAN HPS PDF -->
<script>
	function message(icon, text) {
		swal({
			title: "success!!!",
			text: text,
			icon: icon,
		});
	}

	function warning_validasi(icon, text) {
		swal({
			title: "Maaf!!!",
			text: text,
			icon: icon,
		});
	}
	var tbl_beranda_tender_terbatas = $('#tbl_beranda_tender_terbatas');
	$(document).ready(function() {
		tbl_beranda_tender_terbatas.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('tender_spm/data_get_tender_spm') ?>",
				"type": "POST"
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
	});


	function relodTable() {
		tbl_beranda_tender_terbatas.DataTable().ajax.reload();
	}


	function by_id(id, type) {
		if (type == 'konfirmasi') {
			saveData = 'konfirmasi';
		}

		if (type == 'batal_konfirmasi') {
			saveData = 'batal_konfirmasi';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('Tender_spm/by_id/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				Question_delete_konfirmasi(response['get_paket'].id_paket, response['get_paket'].nama_paket, type);
			}
		})
	}




	// HAPUS DATA 
	function Question_delete_konfirmasi(id_paket, nama_paket, type) {
		if (type == 'konfirmasi') {
			swal({
					title: "Apakah Anda Yakin!! ?",
					text: "Ingin Konfirmasi Paket Spm  " + nama_paket + "?",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						konfirmasi(id_paket, type);
					} else {
						message('success', 'Paket Tidak Jadi Di Konfirmasi !!')
					}
				});
		} else {
			swal({
					title: "Apakah Anda Yakin!! ?",
					text: "Ingin Batal Konfirmasi Paket Spm  " + nama_paket + "?",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						konfirmasi(id_paket, type);
					} else {
						message('success', 'Paket Berhasil Batal Di Konfirmasi !!')
					}
				});
		}

	}

	function konfirmasi(id_paket, type) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('tender_spm/konfirmasi/') ?>" + id_paket,
			data: {
				type: type
			},
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					relodTable();
					if (type == 'konfirmasi') {
						message('success', 'Paket Berhasil Di Konfirmasi !!')
					} else {
						message('success', 'Paket Berhasil Di Batal Konfirmasi !!')
					}

				}
			}
		})
	}
</script>