<script>
	function message(icon, text) {
		swal({
			title: "success!!!",
			text: text,
			icon: icon,
		});
	}
	var tbl_penetapan_pemenang = $('#tbl_penetapan_pemenang');
	var id_paketkusaja_penetapan = $('#id_paketkusaja_penetapan').val();
	$(document).ready(function() {
		tbl_penetapan_pemenang.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"info": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url('paket/get_datatable_penetapan_pemenang/') ?>" + id_paketkusaja_penetapan,
				"type": "POST"
			},
			"columnDefs": [{
				"target": [-1],
				"orderable": false
			}],
			"oLanguage": {
				"sSearch": "Pencarian : ",
				"sEmptyTable": "Belum Ada File Yang Di Upload",
				"sLoadingRecords": "Silahkan Tunggu - loading...",
				"sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
				"sZeroRecords": "Belum Ada File Yang Di Upload",
				"sProcessing": "Memuat Data...."
			}
		});
	});

	function reload_tbl_penetapan_pemenang() {
		tbl_penetapan_pemenang.DataTable().ajax.reload();
	}
	var form_penetapan_pemenang = $('#form_penetapan_pemenang');
	form_penetapan_pemenang.on('submit', function(e) {
		e.preventDefault();
		var id_paket = $('#id_paket').val();
		if ($('.file_surat_penetapan_pemenang').val() == '') {
			$('#error_file_negosiasi').show();
			setTimeout(function() {
				$('#error_file_negosiasi').hide();
			}, 4000);
		} else if ($('#nama_surat_penetapan_pemenang').val() == '') {
			$('#error_nama_negosiasi').show();
			setTimeout(function() {
				$('#error_nama_negosiasi').hide();
			}, 4000);
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>paket/add_penetapan_pemenang/" + id_paket,
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				beforeSend: function() {
					$('#upload_negosiasi').attr('disabled', 'disabled');
					$('#process_negosiasi').css('display', 'block');
					$('#sedang_dikirim_negosisasi').show();
				},
				success: function(response) {
					var percentage = 0;
					var timer = setInterval(function() {
						percentage = percentage + 20;
						progress_bar_process(percentage, timer);
					}, 1000);
				}
			});
		}
	});



	function by_id_penetapan_pemenang(id, type) {
		if (type == 'hapus_penetapan_pemenang') {
			saveData = 'hapus_penetapan_pemenang';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('paket/by_id_penetapan_pemenang/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'hapus_penetapan_pemenang') {
					Question_delete_penetapan_pemenang(response['get_penetapan_pemenang'].id_penetapan_pemenanag, response['get_penetapan_pemenang'].nama_surat_penetapan_pemenang);
				}
			}
		})
	}

	// HAPUS DATA 
	function Question_delete_penetapan_pemenang(id_penetapan_pemenanag, nama_surat_penetapan_pemenang) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Surat " + nama_surat_penetapan_pemenang + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					delete_penetapan_pemenang(id_penetapan_pemenanag);
				} else {
					message('success', 'Surat Tidak Jadi Di Hapus, Surat Aman!!')
				}
			});
	}

	function delete_penetapan_pemenang(id_penetapan_pemenanag) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('paket/delete_penetapan_pemenang/') ?>" + id_penetapan_pemenanag,
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					reload_tbl_penetapan_pemenang();
					message('success', 'Surat Berhasil Di Delete');
				}
			}
		})
	}

	function progress_bar_process(percentage, timer) {
		$('.progress-bar').css('width', percentage + '%');
		if (percentage > 100) {
			clearInterval(timer);
			$('#form_penetapan_pemenang')[0].reset();
			$('#process_negosiasi').css('display', 'none');
			$('#sedang_dikirim_negosisasi').show();
			$('.progress-bar').css('width', percentage + '%');
			$('#upload_negosiasi').attr('disabled', false);
			message('success', 'Surat Berhasil Di Kirim');
			reload_tbl_penetapan_pemenang();
		}
	}
</script>
<!-- INI UNTUK  PEMBATALAN TENDER -->
<!-- INI UNTUK ABTALKAN TRANSKSI LANGSUNG -->
<script>
	var modal_batal_transaksi_langsung = $('#modal_batal_transaksi_langsung');
	var id_paket = $('#id_paket');
	var form_pembatalan_tender = $('#form_pembatalan_tender');

	function message(icon, text) {
		swal({
			title: "success!!!",
			text: text,
			icon: icon,
		});
	}

	function Batalkan_transaksi_langsung() {
		$.ajax({
			method: "POST",
			url: "<?= base_url('paket/batalkan_paket_transaksi_langsung') ?>",
			data: form_pembatalan_tender.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!');
					location.replace('<?= base_url('daftar_paket') ?>');
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}

	function byid_pembatalan_tender(id) {
		$.ajax({
			type: "GET",
			url: "<?= base_url('paket/get_by_id_paket_batalkan_transaksi_langsung/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				modal_batal_transaksi_langsung.modal('show');
			}
		})
	}
</script>
