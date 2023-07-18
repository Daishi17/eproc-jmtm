<script>
	var dattable_penawaran = $('#table_baru_administrasi_teknis');
	var btnsave = $('#btnSave');
	var modal_add_penawaran = $('#modal_add_penawaran');
	var modalData_edit_izin = $('#modalData_edit_izin');
	var kirim_file_administrasi_teknis = $('#kirim_file_administrasi_teknis');
	$(document).ready(function() {
		var id_paket = $('#id_paket_pada_penawaran_peserta').val();
		dattable_penawaran.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('buka_penawaran/data_get_administrasi_teknis_vendor/') ?>" + id_paket,
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
				"sZeroRecords": "Tidak Ada Data Unit Kerja Yang Di Cari",
				"sProcessing": "Memuat Data...."
			}
		});
	});


	function byid_id_penawaran_teknis(id, type) {
		if (type == 'edit_id_penawaran_teknis') {
			saveData = 'edit_id_penawaran_teknis';
		}
		if (type == 'edit_id_penawaran_teknis_cancel') {
			saveData = 'edit_id_penawaran_teknis_cancel';
		}
		if (type == 'edit_id_penawaran_tambahan') {
			saveData = 'edit_id_penawaran_tambahan';
		}
		var id_vendor = $('#id_vendor').val();
		var id_paket = $('#id_paket').val();
		$.ajax({
			type: "GET",
			url: "<?= base_url('buka_penawaran/get_administrasi_teknis_byid/'); ?>" + id_vendor + '/' + id + '/' + id_paket,
			data: kirim_file_administrasi_teknis.prop('files'),
			success: function(response) {
				if (type == 'edit_id_penawaran_tambahan') {
					modal_add_penawaran.modal('show');
					$('[name="nama_persyaratan"]').val(response['get_id_penawaran_teknis'].nama_persyaratan);
					$('[name="id_persyaratan_tender"]').val(response['get_id_penawaran_teknis'].id_persyaratan_tender);
					$('#nama_persyaratan').html(response['get_id_penawaran_teknis'].nama_persyaratan);
					var html = '';
					var i;
					for (i = 0; i < response['get_dokumen'].length; i++) {
						html += '<tr>' +
							'<td>' + '	<a href="<?= base_url("file_dokumen_penawaran/") ?>' + response['get_dokumen'][i].file_administrasi_teknis_vendor + '"><img src="<?= base_url('assets/img/pdf.png') ?>" alt="" width="60px"> ' + response['get_dokumen'][i].file_administrasi_teknis_vendor + '</a>' + '</td>' +
							'</tr>'
					}
					$('#detail_file').html(html);
				}
			}
		})
	}


	var saveData;
	var tabledata = $('#serverside_penawaran_peserta');
	var btnsave = $('#btnSave')
	$(document).ready(function() {
		var id_paket = $('#id_paket_pada_penawaran_peserta').val();
		tabledata.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('buka_penawaran/getdata_vendor_mengikuti_paket/') ?>" + id_paket,
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
				"sZeroRecords": "Tidak Ada Data Unit Kerja Yang Di Cari",
				"sProcessing": "Memuat Data...."
			}
		});
	});
	var Modal_penawaran = $('#Modal_penawaran');
	var Modal_persyaratan_tambahan = $('#modal_persyaratan_tambahan');
	var Modal_teknis = $('#modal_teknis');
	var id_paket_teknis_penwaran = $('#id_paket_pada_penawaran_peserta').val();

	function byid_penawaran(id, type) {
		if (type == 'lihat_harga_penawaran') {
			saveData = 'lihat_harga_penawaran';
		}
		if (type == 'lihat_teknis') {
			saveData = 'lihat_teknis';
		}
		if (type == 'lihat_teknis_dokumen_tambahan') {
			saveData = 'lihat_teknis_dokumen_tambahan';
		}

		$.ajax({
			type: "GET",
			url: "<?= base_url('buka_penawaran/byid_penawaran_harga/'); ?>" + id + '/' + id_paket_teknis_penwaran,
			dataType: "JSON",
			success: function(response) {
				if (type == 'lihat_harga_penawaran') {
					var total = response['get_rincian_paket'];

					var id_paket_teknis_penwaran = $('#id_paket_pada_penawaran_peserta').val();
					var hasil = 'Rp. ' + total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00';
					$('#total').html(hasil);
					Modal_penawaran.modal('show');

				}
				if (type == 'lihat_teknis_dokumen_tambahan') {
					$('[name="nama_persyaratan"]').val(response['ambil_paket_dan_vendor'].nama_persyaratan);
					$('[name="id_mengikuti_paket"]').val(response['ambil_paket_dan_vendor'].id_mengikuti_paket);
					$('[name="id_vendor"]').val(response['ambil_paket_dan_vendor'].id_mengikuti_vendor);
					Modal_persyaratan_tambahan.modal('show');
				}
			}
		})
	}
</script>

<script>
	function message(icon, text) {
		swal({
			title: "God Jobs!!!",
			text: text,
			icon: icon,
		});
	}
	// GET BY ID

	kirim_file_administrasi_teknis.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_administrasi_teknis_vendor1').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>buka_penawaran/tambah_file_administrasi_teknis",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					modal_add_penawaran.modal('hide');
					relodtable_baru_administrasi_teknis();
					message('success', 'Data Berhasil Di Tambah')
				}
			});
		}
	});

	function delete_cancel(id_administrasi_teknis_vendor) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('buka_penawaran/delete_cancel/') ?>" + id_administrasi_teknis_vendor,
			dataType: "JSON",
			success: function(response) {
				relodtable_baru_administrasi_teknis();
				location.replace('<?= base_url('buka_penawaran/upload/') ?>');
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}
</script>

<!-- INI UNTUK BUKA RINCIAN HPS PDF TRANSKASI LANGSUNG -->
<script>
	function message(icon, text) {
		swal({
			title: "success!!!",
			text: text,
			icon: icon,
		});
	}
	var tbl_rincian_hps_via_pdf_vendor = $('#tbl_rincian_hps_via_pdf_vendor');
	var id_paket = $('#id_paket').val();
	$(document).ready(function() {
		tbl_rincian_hps_via_pdf_vendor.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"info": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url('buka_penawaran/getdatatbl_rincian_hps_via_pdf_vendor/') ?>" + id_paket,
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
</script>
<!-- PEMBUKAAN DOKUMEN PENGADAAN DARI VENDOR -->
<script>
	var table_dokumen_pengadaan_transaksi_langsung_vendor = $('#table_dokumen_pengadaan_transaksi_langsung_vendor');
	var id_paket = $('#id_paket').val();
	$(document).ready(function() {
		table_dokumen_pengadaan_transaksi_langsung_vendor.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"info": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url('buka_penawaran/getdatatable_dokumen_pengadaan_transaksi_langsung_vendor/') ?>" + id_paket,
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
</script>

<!-- PEMBUKAAN RINCIAN HPS DARI VENDOR -->
<script>
	// INI UNTUK RINCIAN HPS PADA VENDOR
	var rincian_hps_tbl_vendor_manual = $('#rincian_hps_tbl_vendor_manual');
	$(document).ready(function() {
		var id_paket = $('#id_paket').val();
		rincian_hps_tbl_vendor_manual.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('buka_penawaran/data_get_rincian_hps_vendor_manual/') ?>" + id_paket,
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
				"sZeroRecords": "Tidak Ada Lokasi Kerja Yang Di Cari",
			},
		});
		$('#test').html(url);
	});
</script>


<!-- INI UNTUK NAMPILIN SEMUA PESERTANYA -->
<script>
	var saveData;
	var modal_evaluasi = $('#modal_evaluasiData');
	var tbl_pembukaan_peserta = $('#tbl_pembukaan_peserta');
	var formData = $('#formData');
	var modal_evaluasititle = $('#modal_evaluasiTitle');
	var btnsave = $('#btnSave');
	$(document).ready(function() {
		var id_paket = $('#id_paket').val();
		tbl_pembukaan_peserta.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('buka_penawaran/getdata_peserta_vendor/') ?>" + id_paket,
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
				"sZeroRecords": "Tidak Ada Data Unit Kerja Yang Di Cari",
				"sProcessing": "Memuat Data...."
			}
		});
	});

	function relodTable() {
		tbl_pembukaan_peserta.DataTable().ajax.reload();
	}

	function message(icon, text) {
		swal({
			title: "Mantaps!!!",
			text: text,
			icon: icon,
		});
	}
	var id_paket = $('#id_paket').val();

	var modal_buka_dokumen_lelang = $('#modal_buka_dokumen_lelang');
	var table_dokumen_lelang = $('#table_dokumen_lelang');
	var id_paket = $('#id_paket').val();

	function byid_peserta_vendor_tender(id, type) {
		if (type == 'lihat_dokumen_lelang') {
			saveData = 'lihat_dokumen_lelang';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('buka_penawaran/byid_peserta_vendor_tender/'); ?>" + id + '/' + id_paket,
			dataType: "JSON",
			success: function(response) {
				if (type == 'lihat_dokumen_lelang') {
					var id_vendor = response['vendor'].id_mengikuti_vendor;
					var id_paket = response['vendor'].id_mengikuti_paket_vendor;
					$('#nama_vendor').html(response['vendor'].username_vendor);
					$(document).ready(function() {
						table_dokumen_lelang.DataTable({
							"responsive": true,
							"autoWidth": false,
							"processing": true,
							"serverSide": true,
							"info": false,
							"bDestroy": true,
							"order": [],
							"ajax": {
								"url": "<?= base_url('buka_penawaran/getdatatable_dokumen_lelang/') ?>" + id_vendor + '/' + id_paket,
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
					modal_buka_dokumen_lelang.modal('show');
					// modal_buka_dokumen_lelang.on('hidden.bs.modal', function() {
					// 	document.location.reload();
					// })
				}
			}
		})
	}
</script>


<!-- pembukaan penawaran harga -->
<script>
	var saveData;
	var modal_evaluasi = $('#modal_evaluasiData');
	var tbl_pembukaan_peserta1 = $('#tbl_pembukaan_peserta1');
	var formData = $('#formData');
	var modal_evaluasititle = $('#modal_evaluasiTitle');
	var btnsave = $('#btnSave');
	$(document).ready(function() {
		var id_paket = $('#id_paket').val();
		tbl_pembukaan_peserta1.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('buka_penawaran/getdata_peserta_vendor_pdf/') ?>" + id_paket,
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
				"sZeroRecords": "Tidak Ada Data Unit Kerja Yang Di Cari",
				"sProcessing": "Memuat Data...."
			}
		});
	});


	var modal_harga_rincian_hps_pdf = $('#modal_harga_rincian_hps_pdf');
	var id_paket = $('#id_paket').val();

	function byid_peserta_vendor_tender_pdf(id, type) {
		if (type == 'lihat_harga_pdf') {
			saveData = 'lihat_harga_pdf';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('buka_penawaran/byid_peserta_vendor_tender_pdf/'); ?>" + id + '/' + id_paket,
			dataType: "JSON",
			success: function(response) {
				if (type == 'lihat_harga_pdf') {
					$('#nama_vendor').html(response['vendor'].username_vendor);
					$('[name="id_vendor_lempar"]').val(response['vendor'].id_vendor);
					$('[name="nilai_hps_vendor_pdf_lempar"]').val(response['get_harga_pdf'].total_rincian_hps_pdf);
					$('[name="rincian_harga_pdf"]').val(response['get_harga_pdf'].total_rincian_hps_pdf);
					update_penawaran_pdf_lempar()
					var html = '';
					var i;
					for (i = 0; i < response['get_harga_pdf_result'].length; i++) {
						html += '<tr>' +
							'<td>' + response['get_harga_pdf_result'][i].nama_rincian_hps_pdf + '</td>' +

							'<td>Rp. ' + response['get_harga_pdf_result'][i].total_rincian_hps_pdf.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00</td>' +
							'<td>' + '	<a target="_blank" href="https://vms.jmtm.co.id/rincian_hps_pdf_file_vendor/' + response['get_harga_pdf_result'][i].file_rincian_hps_pdf_vendor + '"><img src="<?= base_url('assets/img/pdf.png') ?>" alt="" width="60px"></a>' + '</td>' +
							'</tr>'
					}
					$('#lihat_harga_pdf_saya').html(html);
					modal_harga_rincian_hps_pdf.modal('show');
					// modal_harga_rincian_hps_pdf.on('hidden.bs.modal', function() {
					// 	document.location.reload();
					// })
				} else {

				}
			}
		})
	}

	var form_lempar_penawaran_pdf = $('#form_lempar_penawaran_pdf');

	function update_penawaran_pdf_lempar() {
		$.ajax({
			method: "POST",
			url: '<?= base_url('buka_penawaran/update_penawaran_pdf_lempar') ?>',
			data: form_lempar_penawaran_pdf.serialize(),
			dataType: "JSON",
			success: function(response) {

			}
		})
	}
</script>



<!-- INI UNTUK NAMPILIN SEMUA PESERTANYA -->
<script>
	var saveData;
	var modal_evaluasi = $('#modal_evaluasiData');
	var tbl_pembukaan_peserta_penetapan = $('#tbl_pembukaan_peserta_penetapan');
	var formData = $('#formData');
	var modal_evaluasititle = $('#modal_evaluasiTitle');
	var btnsave = $('#btnSave');
	$(document).ready(function() {
		var id_paket = $('#id_paket').val();
		tbl_pembukaan_peserta_penetapan.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('buka_penawaran/getdata_peserta_vendor_penetapan/') ?>" + id_paket,
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
				"sZeroRecords": "Tidak Ada Data Unit Kerja Yang Di Cari",
				"sProcessing": "Memuat Data...."
			}
		});
	});

	function relodTable() {
		tbl_pembukaan_peserta_penetapan.DataTable().ajax.reload();
	}

	function message(icon, text) {
		swal({
			title: "Mantaps!!!",
			text: text,
			icon: icon,
		});
	}
	var id_paket = $('#id_paket').val();

	var modal_buka_dokumen_lelang_penetapan = $('#modal_buka_dokumen_lelang_penetapan');
	var table_dokumen_lelang_penetapan = $('#table_dokumen_lelang_penetapan');
	var id_paket = $('#id_paket').val();

	function byid_peserta_vendor_tender2(id, type) {
		if (type == 'lihat_dokumen_lelang') {
			saveData = 'lihat_dokumen_lelang';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('buka_penawaran/byid_peserta_vendor_tender/'); ?>" + id + '/' + id_paket,
			dataType: "JSON",
			success: function(response) {
				if (type == 'lihat_dokumen_lelang') {
					var id_vendor = response['vendor'].id_mengikuti_vendor;
					var id_paket = response['vendor'].id_mengikuti_paket_vendor;
					$('#nama_vendor').html(response['vendor'].username_vendor);
					$(document).ready(function() {
						table_dokumen_lelang_penetapan.DataTable({
							"responsive": true,
							"autoWidth": false,
							"processing": true,
							"serverSide": true,
							"info": false,
							"order": [],
							"ajax": {
								"url": "<?= base_url('buka_penawaran/getdatatable_dokumen_lelang_penetapan/') ?>" + id_vendor + '/' + id_paket,
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
					modal_buka_dokumen_lelang_penetapan.modal('show');
					modal_buka_dokumen_lelang_penetapan.on('hidden.bs.modal', function() {
						document.location.reload();
					})


				}
			}
		})
	}
</script>

<script>
	var tbl_pembukaan_peserta_tender_biasa = $('#tbl_pembukaan_peserta_tender_biasa');
	$(document).ready(function() {
		var id_paket = $('#id_paket').val();
		tbl_pembukaan_peserta_tender_biasa.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('buka_penawaran/getdata_peserta_vendor_rincian_hps_tender_biasa/') ?>" + id_paket,
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
				"sZeroRecords": "Tidak Ada Data Unit Kerja Yang Di Cari",
				"sProcessing": "Memuat Data...."
			}
		});
	});

	var id_paket = $('#id_paket').val();

	var modal_lihat_harga_penawaran_vendor = $('#modal_lihat_harga_penawaran_vendor');
	var table_lihat_rincian_hps_biasa_semua_vendor = $('#table_lihat_rincian_hps_biasa_semua_vendor');
	var id_paket = $('#id_paket').val();

	function byid_peserta_vendor_tender_rincian_hps_manual(id, type) {
		if (type == 'lihat_penawaran_harga_tender_biasa') {
			saveData = 'lihat_penawaran_harga_tender_biasa';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('buka_penawaran/byid_peserta_vendor_tender/'); ?>" + id + '/' + id_paket,
			dataType: "JSON",
			success: function(response) {
				if (type == 'lihat_penawaran_harga_tender_biasa') {
					var id_vendor = response['vendor'].id_mengikuti_vendor;
					var id_paket = response['vendor'].id_mengikuti_paket_vendor;
					$('#nama_vendor_tender_biasa').html(response['vendor'].username_vendor);
					$(document).ready(function() {
						table_lihat_rincian_hps_biasa_semua_vendor.DataTable({
							"responsive": true,
							"autoWidth": false,
							"processing": true,
							"serverSide": true,
							"info": false,
							"order": [],
							"ajax": {
								"url": "<?= base_url('buka_penawaran/getdatatable_lihat_rincian_hps_semua_vendor/') ?>" + id_vendor + '/' + id_paket,
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
					var html = '';
					var i;
					for (i = 0; i < response['total_hps'].length; i++) {
						$total_hps_terdeteksi = response['total_hps'][i].vol_rincian_hps_vendor * response['total_hps'][i].harga_rincian_hps_vendor + (response['total_hps'][i].persen_rincian_hps_vendor / 100) * response['total_hps'][i].vol_rincian_hps_vendor * response['total_hps'][i].harga_rincian_hps_vendor;
						html += 'Rp. ' + $total_hps_terdeteksi.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00'
					}
					$('#total_hps_per_vendor').val($total_hps_terdeteksi);
					$('#total_hps_per_vendor_nampil').val(html);
					var id_total_hps_pervendor = $('#id_total_hps_pervendor')
					$.ajax({
						type: "POST",
						url: "<?= base_url('buka_penawaran/update_ke_evaluasi/') ?>" + response['vendor'].id_mengikuti_vendor + '/' + response['vendor'].id_mengikuti_paket_vendor,
						data: id_total_hps_pervendor.serialize(),
						dataType: "JSON",
						success: function(response) {

						}
					})
					modal_lihat_harga_penawaran_vendor.modal('show');
					modal_lihat_harga_penawaran_vendor.on('hidden.bs.modal', function() {
						document.location.reload();
					})

				}
			}
		})
	}
</script>