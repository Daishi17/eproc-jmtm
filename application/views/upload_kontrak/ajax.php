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
	var tbl_upload_kontrak = $('#tbl_upload_kontrak');
	fill_datatable();
		function fill_datatable(id_unit_kerja = '') {
			tbl_upload_kontrak.DataTable({
				"responsive": true,
				"autoWidth": false,
				"processing": true,
				"serverSide": true,
				"info": false,
				"order": [],
				"ajax": {
					"url": "<?= base_url('Upload_kontrak/data_get_doukumen_kontrak_pdf') ?>",
					"type": "POST",
					data: {
						id_unit_kerja: id_unit_kerja
					}
				},
				"columnDefs": [{
					"target": [-1],
					"orderable": false
				}],
				"oLanguage": {
					"sSearch": "Pencarian : ",
					"sEmptyTable": "Belum Ada File Dokumen Kontrak",
					"sLoadingRecords": "Silahkan Tunggu - loading...",
					"sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
					"sZeroRecords": "Belum Ada File Dokumen Kontrak",
					"sProcessing": "Memuat Data...."
				}
			});
		}
	function Pilih_unit() {
			var id_unit_kerja = $('#id_unit_kerja').val();
			console.log(id_unit_kerja);
			if (id_unit_kerja != '') {
				tbl_upload_kontrak.DataTable().destroy();
				fill_datatable(id_unit_kerja);
			} else {
				message('warning', 'Pilih Filter Yang Benar!!')
				tbl_upload_kontrak.DataTable().destroy();
				fill_datatable();
			}
		}

	function reload_tbl_upload_kontrak() {
		tbl_upload_kontrak.DataTable().ajax.reload();
	}
	var form_file_dokumen_kontrak = $('#form_file_dokumen_kontrak');
	form_file_dokumen_kontrak.on('submit', function(e) {
		e.preventDefault();
		if ($('.file_dokumen_kontrak').val() == '') {
            warning_validasi('warning', 'File Belum Diisi!!!');
		} else if ($('#nama_file_dokumen_kontrak').val() == '') {
			warning_validasi('warning', 'Harap isi Nama File!!!');
        } else if ($('#nama_pengadaaan_kontrak').val() == '') {
			warning_validasi('warning', 'Harap isi Pengadaan!!!')
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>Upload_kontrak/add_doukumen_kontrak_pdf",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				beforeSend: function() {
					$('#upload_manual').attr('disabled', 'disabled');
					$('#process_manual').css('display', 'block');
					$('#sedang_dikirim_manual').show();
				},
				success: function(response) {
					var percentage = 0;
					var timer = setInterval(function() {
						percentage = percentage + 20;
						progress_bar_process_manual(percentage, timer);
					}, 1000);
				}
			});
		}
	});



	function by_id(id, type) {
		if (type == 'hapus_dokumen') {
			saveData = 'hapus_dokumen';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('Upload_kontrak/by_id/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'hapus_dokumen') {
					Question_delete_hapus_dokumen(response['get_dokumen_kontrak'].id_dokumen_kontrak, response['get_dokumen_kontrak'].nama_file_dokumen_kontrak);
				}
			}
		})
	}




	// HAPUS DATA 
	function Question_delete_hapus_dokumen(id_dokumen_kontrak, nama_file_dokumen_kontrak) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Dokumen " + nama_file_dokumen_kontrak + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					hapus_dokumen(id_dokumen_kontrak);
				} else {
					message('success', 'Dokumen Tidak Jadi Di Hapus, Dokumen Aman!!')
				}
			});
	}

	function hapus_dokumen(id_dokumen_kontrak) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('Upload_kontrak/hapus_dokumen/') ?>" + id_dokumen_kontrak,
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					reload_tbl_upload_kontrak();
					message('success', 'Dokumen Berhasil Di Delete');
				}
			}
		})
	}


	function progress_bar_process_manual(percentage, timer) {
		$('.progress-bar').css('width', percentage + '%');
		if (percentage > 100) {
			clearInterval(timer);
			$('#form_file_dokumen_kontrak')[0].reset();
			$('#process_manual').css('display', 'none');
			$('#sedang_dikirim_manual').show();
			$('.progress-bar').css('width', percentage + '%');
			$('#upload_manual').attr('disabled', false);
			message('success', 'Dokumen Berhasil Di Upload');
			reload_tbl_upload_kontrak();
		}
	}
</script>