<script>
	$(document).ready(function() {
		$('#paket_penyedia').DataTable({});
	});
	//    $(document).on("click", "ul li", function () {
	// 	$(this).addClass("active").siblings().removeClass("active");
	// });
	$(function() {
		//Initialize Select2 Elements
		$('.select2').select2()

		//Initialize Select2 Elements
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})
	})
	// var tabEl = document.querySelector('button[data-bs-toggle="tab"]')
	// tabEl.addEventListener('shown.bs.tab', function(event) {
	// 	event.target // newly activated tab
	// 	event.relatedTarget // previous active tab
	// })
</script>

<!-- get Provinsi Di bagian Edit Lokasi -->
<script>
	$(document).ready(function() {
		$('#provinsi2').change(function() {
			var id_provinsi = $('#provinsi2').val();
			$.ajax({
				type: 'GET',
				url: '<?= base_url('wilayah/dataKabupaten') ?>/' + id_provinsi,
				success: function(html) {
					$('#kabupaten2').html(html);
				}
			});
		})
	})
</script>
<!-- GET PER DIVISI -->
<script>
	var saveData;
	var modal = $('#modalData');
	var modalDetail = $('#modalDetail');
	var tabledata = $('#serverside');
	var tabledata2 = $('#serverside2');
	var tbl_transaksi_langsung_tambah_paket = $('#transaksi_langsung_tambah_paket');
	var formData = $('#formData');
	var paket = $('#paket');
	var modaltitle = $('#modalTitle');
	var btnsave = $('#btnSave')


	$(document).ready(function() {
		tabledata.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"info": false,
			// "searching": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url('paket/getdata_paket_tertender') ?>",
				"type": "POST",

			},
			"columnDefs": [{
				"target": [-1],
				"orderable": true
			}],
			"oLanguage": {
				"sSearch": "Pencarian : ",
				"sEmptyTable": "Data Tidak Tersedia",
				"sLoadingRecords": "Silahkan Tunggu - loading...",
				"sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
				"sZeroRecords": "Maaf Belum Ada Data Paket Tender",
				"sProcessing": "Memuat Data...."
			}
		});

	});

	function message101(icon, text) {
		swal({
			title: "Maaf!!!",
			text: text,
			icon: icon,
		});
	}


	$(document).ready(function() {
		fill_datatable_get_rup();

		function fill_datatable_get_rup(id_unit_kerja = '', id_jenis_pengadaan = '') {
			tabledata2.DataTable({
				"responsive": true,
				"autoWidth": false,
				"processing": true,
				"serverSide": true,
				"info": false,
				// "searching": false,
				"order": [],
				"ajax": {
					"url": "<?= base_url('paket/getdata_dari_rup') ?>",
					"type": "POST",
					//di gunakan untuk custom select data yg kita mau cari per apa
					data: {
						id_unit_kerja: id_unit_kerja,
						id_jenis_pengadaan: id_jenis_pengadaan
					}
				},
				"columnDefs": [{
					"target": [-1],
					"orderable": true
				}],
				"oLanguage": {
					"sSearch": "Pencarian : ",
					"sEmptyTable": "Data Tidak Tersedia",
					"sLoadingRecords": "Silahkan Tunggu - loading...",
					"sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
					"sZeroRecords": "Maaf Belum Ada Data Paket Tender",
					"sProcessing": "Memuat Data...."
				}
			});
		}
		// filtering select data per divisi dan per jenis pengadaan
		$('#filter3').click(function() {
			var id_unit_kerja = $('#id_unit_kerja').val();
			var id_jenis_pengadaan = $('#id_jenis_pengadaan').val();
			if (id_unit_kerja != '' && id_jenis_pengadaan != '') {
				tabledata2.DataTable().destroy();
				fill_datatable_get_rup(id_unit_kerja, id_jenis_pengadaan);
			} else {
				message101('warning', 'Pilih Filter Yang Benar!!')
				tabledata2.DataTable().destroy();
				fill_datatable_get_rup();
			}
		})
	});

	// untuk daftar paket tambah Transaksi Langsung


	$(document).ready(function() {
		fill_datatable();

		function fill_datatable(id_unit_kerja = '', id_jenis_pengadaan = '') {
			tbl_transaksi_langsung_tambah_paket.DataTable({
				"responsive": true,
				"autoWidth": false,
				"processing": true,
				"serverSide": true,
				"info": false,
				// "searching": false,
				"order": [],
				"ajax": {
					"url": "<?= base_url('paket/getdata_dari_rup_transaksi_langsung') ?>",
					"type": "POST",
					//di gunakan untuk custom select data yg kita mau cari per apa
					data: {
						id_unit_kerja: id_unit_kerja,
						id_jenis_pengadaan: id_jenis_pengadaan
					}
				},
				"columnDefs": [{
					"target": [-1],
					"orderable": true
				}],
				"oLanguage": {
					"sSearch": "Pencarian : ",
					"sEmptyTable": "Data Tidak Tersedia",
					"sLoadingRecords": "Silahkan Tunggu - loading...",
					"sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
					"sZeroRecords": "Maaf Belum Ada Data Paket Tender",
					"sProcessing": "Memuat Data...."
				}
			});
		}
		// filtering select data per divisi dan per jenis pengadaan
		$('#filter2').click(function() {
			var id_unit_kerja = $('#id_unit_kerja').val();
			var id_jenis_pengadaan = $('#id_jenis_pengadaan').val();
			if (id_unit_kerja != '' && id_jenis_pengadaan != '') {
				tbl_transaksi_langsung_tambah_paket.DataTable().destroy();
				fill_datatable(id_unit_kerja, id_jenis_pengadaan);
			} else {
				message101('warning', 'Pilih Filter Yang Benar!!')
				tbl_transaksi_langsung_tambah_paket.DataTable().destroy();
				fill_datatable();
			}
		})
	});


	$('#reload').click(function() {
		tabledata.DataTable().ajax.reload();
	})


	function relodTable() {
		tabledata.DataTable().ajax.reload();
	}

	function relodTable2() {
		tabledata2.DataTable().ajax.reload();
	}

	function message(icon, text) {
		swal({
			title: "success!!!",
			text: text,
			icon: icon,
		});
	}

	function deleteQuestion(id_paket, nama_paket) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nama_paket + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteDatanya(id_paket);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	// edit
	function edit() {
		$.ajax({
			method: "POST",
			url: '<?= base_url('paket/edit'); ?>',
			data: formData.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					formData[0].reset();
					message('success', 'Data Berhasil Di Tambah')
					location.replace('<?= base_url('paket/paket_penyedia') ?>');
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}

	function byid(id, type) {
		if (type == 'edit') {
			saveData = 'edit';
			// formData[0].reset();
		}
		if (type == 'hapus') {
			saveData = 'hapus';
			// formData[0].reset();
		}

		if (type == 'detail') {
			saveData = 'detail';
		}
		if (type == 'detail_transaksi') {
			saveData = 'detail_transaksi';
		}

		if (type == 'active') {
			saveData = 'active';
			formData[0].reset();
		}

		if (type == 'non_active') {
			saveData = 'non_active';
			formData[0].reset();
		}


		$.ajax({
			type: "GET",
			url: "<?= base_url('paket/byid/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'edit') {
					location.replace('<?= base_url('paket/edit/') ?>' + response['get_paket'].id_paket);
					$('[name="id_paket"]').val(response['get_paket'].id_paket);
					$('[name="nama_paket"]').val(response['get_paket'].nama_paket);
				}
				if (type == 'detail_transaksi') {
					modaltitle.text('Informasi Rencana Pelaksanaan Paket');
					$('#detail_kode_paket').html(response['get_paket'].kode_jenis_anggaran + response['get_paket'].kode_jenis_pengadaan + response['get_paket'].kode_metode_pemilihan + response['get_paket'].kode_unit_kerja + response['get_paket'].kode_produk_dl_negri);
					$('#detail_nama_paket').html(response['get_paket']['nama_paket']);
					$('#detail_divisi').html(response['get_paket'].nama_unit_kerja);
					$('#detail_program').html(response['get_paket'].program_paket);
					$('#detail_jenis_pengadaan').html(response['get_paket'].nama_jenis_pengadaan);
					$('#detail_metode_pemilihan').html(response['get_paket'].nama_metode_pemilihan);
					$('#detail_dalam_negri').html(response['get_paket'].keterangan);
					$('#detail_jenis_anggaran').html(response['get_paket'].nama_jenis_anggaran);
					$('#buat_paket').val(response['get_paket'].id_paket);

					// get sumber dana
					var html = '';
					var i;
					for (i = 0; i < response['get_sumberdana'].length; i++) {
						$hps = response['get_sumberdana'][i].hps;
						html += '<tr>' +
							'<td>' + response['get_sumberdana'][i].asal_dana + '</td>' +
							'<td>' + 'Rp. ' + $hps.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00' + '</td>' +
							'</tr>'
					}
					$('#detail_sumber_dana').html(html);

					// get lokasi pekerjaan
					var html = '';
					var i;
					for (i = 0; i < response['get_lokasi_kerja'].length; i++) {
						html += '<tr>' +
							'<td>' + response['get_lokasi_kerja'][i].nama_provinsi + '</td>' +
							'<td>' + response['get_lokasi_kerja'][i].nama_kabupaten + '</td>' +
							'<td>' + response['get_lokasi_kerja'][i].detail_lokasi + '</td>' +
							'</tr>'
					}
					$('#detail_lokasi_kerja').html(html);

					// get jadwal_pemilihan
					var html = '';
					var i;
					for (i = 0; i < response['get_jadwal_pemilihan'].length; i++) {
						html += '<tr>' +
							'<td>' + response['get_jadwal_pemilihan'][i].tahap + '</td>' +
							'<td>' + response['get_jadwal_pemilihan'][i].tanggal_mulai + '</td>' +
							'<td>' + response['get_jadwal_pemilihan'][i].tanggal_selesai + '</td>' +
							'</tr>'
					}
					$('#detail_jadwal_pemilihan').html(html);
					modalDetail.modal('show');


				}

				if (type == 'detail') {
					modaltitle.text('Informasi Rencana Pelaksanaan Paket');
					$('#detail_kode_paket').html(response['get_paket'].kode_jenis_anggaran + response['get_paket'].kode_jenis_pengadaan + response['get_paket'].kode_metode_pemilihan + response['get_paket'].kode_unit_kerja + response['get_paket'].kode_produk_dl_negri);
					$('#detail_nama_paket').html(response['get_paket']['nama_paket']);
					$('#detail_divisi').html(response['get_paket'].nama_unit_kerja);
					$('#detail_program').html(response['get_paket'].program_paket);
					$('#detail_jenis_pengadaan').html(response['get_paket'].nama_jenis_pengadaan);
					$('#detail_metode_pemilihan').html(response['get_paket'].nama_metode_pemilihan);
					$('#detail_dalam_negri').html(response['get_paket'].keterangan);
					$('#detail_jenis_anggaran').html(response['get_paket'].nama_jenis_anggaran);
					$('#buat_paket').val(response['get_paket'].id_paket);

					// get sumber dana
					var html = '';
					var i;
					for (i = 0; i < response['get_sumberdana'].length; i++) {
						$hps = response['get_sumberdana'][i].hps;
						html += '<tr>' +
							'<td>' + response['get_sumberdana'][i].asal_dana + '</td>' +
							'<td>' + 'Rp. ' + $hps.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00' + '</td>' +
							'</tr>'
					}
					$('#detail_sumber_dana').html(html);

					// get lokasi pekerjaan
					var html = '';
					var i;
					for (i = 0; i < response['get_lokasi_kerja'].length; i++) {
						html += '<tr>' +
							'<td>' + response['get_lokasi_kerja'][i].nama_provinsi + '</td>' +
							'<td>' + response['get_lokasi_kerja'][i].nama_kabupaten + '</td>' +
							'<td>' + response['get_lokasi_kerja'][i].detail_lokasi + '</td>' +
							'</tr>'
					}
					$('#detail_lokasi_kerja').html(html);

					// get jadwal_pemilihan
					var html = '';
					var i;
					for (i = 0; i < response['get_jadwal_pemilihan'].length; i++) {
						html += '<tr>' +
							'<td>' + response['get_jadwal_pemilihan'][i].tahap + '</td>' +
							'<td>' + response['get_jadwal_pemilihan'][i].tanggal_mulai + '</td>' +
							'<td>' + response['get_jadwal_pemilihan'][i].tanggal_selesai + '</td>' +
							'</tr>'
					}
					$('#detail_jadwal_pemilihan').html(html);
					modalDetail.modal('show');

				}
				if (type == 'hapus') {
					deleteQuestion(response['get_paket'].id_paket, response['get_paket'].nama_paket);
				}
			}
		})
	}


	function deleteDatanya(id) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('paket/delete/') ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (response == 'berhasil') {
					relodTable();
					message('success', 'Data Berhasil Di Hapus')
				}
			}
		})
	}


	// =====================================BATASS===============================================
	// ========
	// ================================== MENU EDIT paket LOKASI PEKERJAAN =======================================
	// ========
	var modal_lokasi_kerja = $('#modal_lokasi_kerja');
	var formDatalokasi = $('#formDataLokasiPekerjaan');
	var tablelokasikerja = $('#lokasi_kerja');
	// RELOAD TABLENYA
	function relodTable_lokasi() {
		tablelokasikerja.DataTable().ajax.reload();
	}

	// GET DATA LOKASI PEKERJAAN 
	$(document).ready(function() {
		var id_paket = $('#show_id_paket_lokasi_pekerjaan').val();
		tablelokasikerja.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"info": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url('paket/data_get_lokasi_pekerjaan/') ?>" + id_paket,
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
			}
		});
	});
	// TAMBAH DATA
	function add_lokasi_pekerjaan() {
		saveData = 'tambah';
		formDatalokasi[0].reset();
		modal_lokasi_kerja.modal('show');
		modaltitle.text('Tambah Lokasi');
	}

	function save_lokasi_kerja() {
		if (saveData == 'tambah') {
			url = "<?= base_url('paket/add_lokasi_kerja'); ?>"
		} else {
			url = "<?= base_url('paket/edit_lokasi_kerja'); ?>"
		}
		$.ajax({
			method: "POST",
			url: url,
			data: formDatalokasi.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'clear') {
					modal_lokasi_kerja.modal('hide');
					formDatalokasi[0].reset();
					relodTable_lokasi();
					if (saveData == 'tambah') {
						message('success', 'Data Berhasil Di Tambah')
					} else {
						modal_lokasi_kerja.modal('hide');
						formDatalokasi[0].reset();
						relodTable_lokasi();
						message('success', 'Data Berhasil Di Ubah');
					}
				} else {
					$(".provinsi-error").html(response.id_provinsi);
					$(".kabupaten-error").html(response.id_kabupaten);
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}
	// GET BY ID
	function byidLokasi(id, type) {
		if (type == 'editlokasi') {
			saveData = 'editlokasi';
			formDatalokasi[0].reset();
		}
		if (type == 'hapuslokasi') {
			saveData = 'hapuslokasi';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('paket/byidLokasi/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'editlokasi') {
					modaltitle.text('Ubah Data');
					$('[name="id_lokasi_pekerjaan"]').val(response.id_lokasi_pekerjaan);
					$('[name="id_provinsi"]').val(response.nama_provinsi);
					$('[name="id_kabupaten"]').val(response.nama_kabupaten);
					$('[name="detail_lokasi"]').val(response.detail_lokasi);
					modal_lokasi_kerja.modal('show');
				}
				if (type == 'hapuslokasi') {
					deleteQuestionlokasi(response.id_lokasi_pekerjaan, response.detail_lokasi);
				}
			}
		})
	}
	// EDIT DATA
	function edit_lokasi_pekerjaan() {
		$.ajax({
			method: "POST",
			url: '<?= base_url('paket/edit_lokasi_pekerjaan'); ?>',
			data: formDatalokasi.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					formDatalokasi[0].reset();
					message('success', 'Data Berhasil Di Tambah')
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}
	// HAPUS DATA
	function deleteQuestionlokasi(id_lokasi_pekerjaan, detail_lokasi) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + detail_lokasi + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteDatanyalokasi(id_lokasi_pekerjaan);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deleteDatanyalokasi(id_lokasi_pekerjaan) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('paket/delete_lokasi_pekerjaan/') ?>" + id_lokasi_pekerjaan,
			dataType: "JSON",
			success: function(response) {
				relodTable_lokasi();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}
	// ========
	// ==================================END MENU EDIT paket LOKASI PEKERJAAN =======================================
	// ========


	// =====================================BATASS===============================================
	// ========
	// ================================== MENU EDIT paket SUMBER DANA =======================================
	// ========
	var modal_lokasi_kerja = $('#modal_lokasi_kerja');
	var formDatalokasi = $('#formDataLokasiPekerjaan');
	var table_sumber_dana = $('#sumberdana_tbl');
	// RELOAD TABLENYA
	function relodTable_lokasi() {
		table_sumber_dana.DataTable().ajax.reload();
	}

	// GET DATA SUMBER DANA 
	$(document).ready(function() {
		var id_paket = $('#show_id_paket_sumber_dana').val();
		table_sumber_dana.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"info": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url('paket/data_get_sumberdana/') ?>" + id_paket,
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
		// $('#test').html(url);
	});
	// TAMBAH DATA
	function add_sumber_dana() {
		saveData = 'tambah';
		formDatalokasi[0].reset();
		modal_lokasi_kerja.modal('show');
		modaltitle.text('Tambah Lokasi');
	}

	function save_lokasi_kerja() {
		if (saveData == 'tambah') {
			url = "<?= base_url('paket/add_lokasi_kerja'); ?>"
		} else {
			url = "<?= base_url('paket/edit_lokasi_kerja'); ?>"
		}
		$.ajax({
			method: "POST",
			url: url,
			data: formDatalokasi.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'clear') {
					modal_lokasi_kerja.modal('hide');
					formDatalokasi[0].reset();
					relodTable_lokasi();
					if (saveData == 'tambah') {
						message('success', 'Data Berhasil Di Tambah')
					} else {
						modal_lokasi_kerja.modal('hide');
						formDatalokasi[0].reset();
						relodTable_lokasi();
						message('success', 'Data Berhasil Di Ubah');
					}
				} else {
					$(".provinsi-error").html(response.id_provinsi);
					$(".kabupaten-error").html(response.id_kabupaten);
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}
	// GET BY ID
	function byidLokasi(id, type) {
		if (type == 'editlokasi') {
			saveData = 'editlokasi';
			formDatalokasi[0].reset();
		}
		if (type == 'hapuslokasi') {
			saveData = 'hapuslokasi';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('paket/byidLokasi/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'editlokasi') {
					modaltitle.text('Ubah Data');
					$('[name="id_sumber_dana"]').val(response.id_sumber_dana);
					$('[name="id_provinsi"]').val(response.nama_provinsi);
					$('[name="id_kabupaten"]').val(response.nama_kabupaten);
					$('[name="detail_lokasi"]').val(response.detail_lokasi);
					modal_lokasi_kerja.modal('show');
				}
				if (type == 'hapuslokasi') {
					deleteQuestionlokasi(response.id_sumber_dana, response.detail_lokasi);
				}
			}
		})
	}
	// EDIT DATA
	function edit_sumber_dana() {
		var id_paket = $('#buat_paket').val();
		$.ajax({
			method: "POST",
			url: '<?= base_url('paket/edit_sumber_dana'); ?>',
			data: formDatalokasi.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					formDatalokasi[0].reset();
					message('success', 'Data Berhasil Di Tambah')
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}
	// HAPUS DATA
	function deleteQuestionlokasi(id_sumber_dana, detail_lokasi) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + detail_lokasi + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteDatanyalokasi(id_sumber_dana);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deleteDatanyalokasi(id_sumber_dana) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('paket/delete_sumber_dana/') ?>" + id_sumber_dana,
			dataType: "JSON",
			success: function(response) {
				relodTable_lokasi();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}
	// ========
	// ==================================END MENU EDIT paket SUMBER DANA =======================================
	// ========


	// ini function untuk di bagian paket
	function BuatPaket() {
		var id_paket = $('#buat_paket').val();
		$.ajax({
			type: "GET",
			url: "<?= base_url('paket/byBuatPaket/'); ?>" + id_paket,
			dataType: "JSON",
			success: function(response) {
				location.replace('<?= base_url('paket/edit/') ?>' + response['get_paket'].id_paket);
			},
			error: function() {
				console.log(error);
			}
		})
	}

	// buat rincian hps
	// GET RINCIAN HPSNYA
	var table_rincian_hps = $('#rincian_hps_tbl');
	var formDataHps = $('#formDataHps');
	var modalhps = $('#modalDataRincianHps');

	function relodTableRincianHps() {
		table_rincian_hps.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		var id_paket = $('#rincian_hps').val();
		table_rincian_hps.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"info": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url('paket/data_get_rincian_hps/') ?>" + id_paket,
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
			},
		});
		// $('#test').html(url);
	});


	function add_rincian_hps() {
		saveData = 'tambah';
		formDataHps[0].reset();
		modalhps.modal('show');
		modaltitle.text('Tambah Rincian Hps');
	}

	// save
	function save_rincian_hps() {
		if (saveData == 'tambah') {
			url = "<?= base_url('paket/add_rincian_hps'); ?>"
		} else {
			url = "<?= base_url('paket/edit_rincian_hps'); ?>"
		}
		$.ajax({
			method: "POST",
			url: url,
			data: formDataHps.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					modalhps.modal('hide');
					relodTableRincianHps();
					if (saveData == 'tambah') {
						formDataHps[0].reset();
						message('success', 'Data Berhasil Di Tambah')
					} else {
						formDataHps[0].reset();
						modalhps.modal('hide');
						relodTableRincianHps();
						message('success', 'Data Berhasil Di Ubah');
					}
				} else {
					$(".provinsi-error").html(response.id_provinsi);
					$(".kabupaten-error").html(response.id_kabupaten);
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}

	// GET BY ID
	function byidRincianHps(id, type) {
		if (type == 'editRincianHps') {
			saveData = 'editRincianHps';
			formDataHps[0].reset();
		}
		if (type == 'hapusRincianHps') {
			saveData = 'hapusRincianHps';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('paket/byRincianHps/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'editRincianHps') {
					modaltitle.text('Ubah Data');
					$('[name="id_rincian_hps"]').val(response['get_rincian_paket'].id_rincian_hps);
					$('[name="jenis_barang_jasa_rincian_hps"]').val(response['get_rincian_paket'].jenis_barang_jasa_rincian_hps);
					$('[name="satuan_rincian_hps"]').val(response['get_rincian_paket'].satuan_rincian_hps);
					$('[name="vol_rincian_hps"]').val(response['get_rincian_paket'].vol_rincian_hps);
					$('[name="keterangan_rincian_hps"]').val(response['get_rincian_paket'].keterangan_rincian_hps);
					$('[name="persen_rincian_hps"]').val(response['get_rincian_paket'].persen_rincian_hps);
					$('[name="harga_rincian_hps"]').val(response['get_rincian_paket'].harga_rincian_hps);
					modalhps.modal('show');
				}
				if (type == 'hapusRincianHps') {
					deleteQuestionlokasi(response['get_rincian_paket'].id_rincian_hps, response['get_rincian_paket'].jenis_barang_jasa_rincian_hps);
				}
			}
		})
	}

	// HAPUS DATA
	function deleteQuestionlokasi(id_rincian_hps, jenis_barang_jasa_rincian_hps) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + jenis_barang_jasa_rincian_hps + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteDatanyalokasi(id_rincian_hps);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deleteDatanyalokasi(id_rincian_hps) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('paket/delete_rincian_hps/') ?>" + id_rincian_hps,
			dataType: "JSON",
			success: function(response) {
				relodTableRincianHps();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}

	function BuatRincianHps() {
		var id_paket = $('#rincian_hps').val();
		$.ajax({
			type: "GET",
			url: "<?= base_url('paket/byRincianHps/'); ?>" + id_paket,
			dataType: "JSON",
			success: function(response) {
				location.replace('<?= base_url('paket/rincian_hps/') ?>' + response['get_paket'].id_paket);
			},
			error: function() {
				console.log(error);
			}
		})
	}

	// upload file kak
	// link nya
	function KerangkaAcuanKerja() {
		var id_paket = $('#kerangka_kerja').val();
		$.ajax({
			type: "GET",
			url: "<?= base_url('paket/getByIdKak/'); ?>" + id_paket,
			dataType: "JSON",
			success: function(response) {
				location.replace('<?= base_url('paket/Kerangka_Acuan_Kerja_Show/') ?>' + response['get_paket'].id_paket);
			},
			error: function() {
				console.log(error);
			}
		})
	}

	var table_kak_kerja_tbl = $('#kak_kerja_tbl');
	var formDataKak = $('#form-data-kak');
	var formDataKakEdit = $('#form-data-kak-edit');
	var modalkak = $('#modalDataKak');
	var modalkakedit = $('#modalDataKakEdit');

	function relodTableKak() {
		table_kak_kerja_tbl.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		var id_paket = $('#tbl_kak_get').val();
		table_kak_kerja_tbl.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"info": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url('paket/data_get_kak/') ?>" + id_paket,
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
				"sZeroRecords": "Tidak Ada KAK Yang Di Cari",
			},
		});
		// $('#test').html(url);
	});

	// add kak
	formDataKak.on('submit', function(e) {
		e.preventDefault();
		var id_paket = $('#kerangka_kerja').val();
		if ($('#file_kak').val() == '') {
			alert("Please Select the File");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>paket/add_kak/" + id_paket,
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					modalkak.modal('hide');
					relodTableKak();
					message('success', 'Data Berhasil Di Tambah')
				}
			});
		}
	});
	// edit kak
	formDataKakEdit.on('submit', function(e) {
		e.preventDefault();
		var id_kerangka_acuan_kerja = $('#id_kerangka_acuan_kerja').val();
		$.ajax({
			url: "<?php echo base_url(); ?>paket/edit_kak/" + id_kerangka_acuan_kerja,
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(data) {
				modalkakedit.modal('hide');
				relodTableKak();
				message('success', 'Data Berhasil Di Tambah')
			}
		});
	});

	// GET BY ID
	function byidKak(id, type) {
		if (type == 'editKak') {
			saveData = 'editKak';

		}
		if (type == 'hapusKak') {
			saveData = 'hapusKak';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('paket/getByIdKak/'); ?>" + id,
			data: formDataKakEdit.prop('files'),
			success: function(response) {
				if (type == 'editKak') {
					$('[name="id_kerangka_acuan_kerja"]').val(response['get_acuan_kerja'].id_kerangka_acuan_kerja);
					$('#nama_file_kak22').val(response['get_acuan_kerja'].nama_file_kak);
					$('#file_kak2').html(response['get_acuan_kerja'].file_kak);
					modalkakedit.modal('show');
				}
				if (type == 'hapusKak') {
					deleteQuestionkak(response['get_acuan_kerja'].id_kerangka_acuan_kerja, response['get_acuan_kerja'].nama_file_kak);
				}
			}
		})
	}

	// HAPUS DATA
	function deleteQuestionkak(id_kerangka_acuan_kerja, nama_file_kak) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nama_file_kak + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteDatanyakak(id_kerangka_acuan_kerja);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deleteDatanyakak(id_kerangka_acuan_kerja) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('paket/delete_kak/') ?>" + id_kerangka_acuan_kerja,
			dataType: "JSON",
			success: function(response) {
				relodTableKak();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}

	//===============================INI ADALAH AJAX UNTUK SYARAT KHUSUS KONTRAK===============================

	// upload file SYARAT KHUSUS KONTRAK
	// link nya
	function SyaratKhususKontrak() {
		var id_paket = $('#syarat_kontrak').val();
		$.ajax({
			type: "GET",
			url: "<?= base_url('paket/getByIdSyaratKontrak/'); ?>" + id_paket,
			dataType: "JSON",
			success: function(response) {
				location.replace('<?= base_url('paket/Syarat_Kontrak_Show/') ?>' + response['get_paket'].id_paket);
			},
			error: function() {
				console.log(error);
			}
		})
	}

	var table_syarat_kontrak = $('#tbl_syarat_kontrak');
	var formDataSyaratKontrak = $('#form-data-syarat-kontrak');
	var formDataSyaratKontrakEdit = $('#form-data-syarat-kontrak-edit');
	var modal_syarat_kontrak = $('#modalSyaratKontrak');
	var modal_syarat_kontra_kedit = $('#modalSyaratKontrakEdit');

	function relodTableSyaratKontrakbaru() {
		table_syarat_kontrak.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		var id_paket = $('#id_syarat_kontrak').val();
		table_syarat_kontrak.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"info": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url('paket/data_get_syarat_kontrak/') ?>" + id_paket,
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
				"sZeroRecords": "Tidak Ada Syarat2 Kontrak Yang Di Cari",
			},
		});
		// $('#test').html(url);
	});

	// SYARAT KHUSUS KONTRAK  Add
	formDataSyaratKontrak.on('submit', function(e) {
		e.preventDefault();
		var id_paket = $('#ambil_id_paket_skk').val();
		if ($('#file').val() == '') {
			alert("Pilih Filenya!!!");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>paket/add_syarat_kontrak/" + id_paket,
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					modal_syarat_kontrak.modal('hide');
					formDataSyaratKontrak[0].reset();
					relodTableSyaratKontrakbaru();
					message('success', 'Data Berhasil Di Tambah')
				}
			});
		}
	});

	//SYARAT KHUSUS KONTRAK _syarat_kontrak Edit
	formDataSyaratKontrakEdit.on('submit', function(e) {
		e.preventDefault();
		var id_syarat_khusus_kontrak = $('#id_syarat_khusus_kontrak').val();
		$.ajax({
			url: "<?php echo base_url(); ?>paket/edit_syarat_khusus_kontrak/" + id_syarat_khusus_kontrak,
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(data) {
				modal_syarat_kontra_kedit.modal('hide');
				relodTableSyaratKontrakbaru();
				message('success', 'Data Berhasil Di Tambah')
			}
		});
	});

	// SYARAT KHUSUS KONTRAK GET BY ID
	function byid_syarat_kontrak(id, type) {
		if (type == 'edit_syarat_kontrak') {
			saveData = 'edit_syarat_kontrak';

		}
		if (type == 'hapus_syarat_kontrak') {
			saveData = 'hapus_syarat_kontrak';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('paket/getByIdSyaratKontrak/'); ?>" + id,
			data: formDataSyaratKontrakEdit.prop('files'),
			success: function(response) {
				if (type == 'edit_syarat_kontrak') {
					$('[name="id_syarat_khusus_kontrak"]').val(response['syarat_kontrak'].id_syarat_khusus_kontrak);
					$('#syarat_aja').val(response['syarat_kontrak'].nama_file_syarat_khusus_kontrak);
					$('#syarat_aja2').html(response['syarat_kontrak'].file_syarat_khusus_kontrak);
					modal_syarat_kontra_kedit.modal('show');
				}
				if (type == 'hapus_syarat_kontrak') {
					deleteQuestion_syarat_kontrak(response['syarat_kontrak'].id_syarat_khusus_kontrak, response['syarat_kontrak'].nama_file_syarat_khusus_kontrak);
				}
			}
		})
	}

	// SYARAT KHUSUS KONTRAK HAPUS DATA
	function deleteQuestion_syarat_kontrak(id_syarat_khusus_kontrak, nama_file_syarat_khusus_kontrak) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nama_file_syarat_khusus_kontrak + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteDatanya_syarat_kontrak(id_syarat_khusus_kontrak);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deleteDatanya_syarat_kontrak(id_syarat_khusus_kontrak) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('paket/delete_syarat_kontrak/') ?>" + id_syarat_khusus_kontrak,
			dataType: "JSON",
			success: function(response) {
				relodTableSyaratKontrakbaru();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}




	// ===========INI UNTUK FILE INFORMASI LAINYA
	// upload INFORMASI LAINYA
	// link nya
	function Informasi_Lainya() {
		var id_paket = $('#id_paket_informasi_lainya').val();
		$.ajax({
			type: "GET",
			url: "<?= base_url('paket/get_byid_informasi_lainya/'); ?>" + id_paket,
			dataType: "JSON",
			success: function(response) {
				location.replace('<?= base_url('paket/informasi_lainya_show/') ?>' + response['get_paket'].id_paket);
			},
			error: function() {
				console.log(error);
			}
		})
	}

	var table_informasi_lainya = $('#informasi_lainya_tbl');
	var formData_informasi_lainya = $('#form_data_informasi_lainya_add');
	var formData_informasi_lainya_edit = $('#form_data_informasi_lainya_edit');
	var modal_add_informasi_lainya = $('#modalData_informasi_lainya');
	var modal_edit_informasi_lainya = $('#modalData_informasi_lainya_edit');

	function relodTable_informasi_lainya() {
		table_informasi_lainya.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		var id_paket = $('#tbl_informasi_lainya_get').val();
		table_informasi_lainya.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"info": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url('paket/data_get_informasi_lainya/') ?>" + id_paket,
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
				"sZeroRecords": "Tidak Ada KAK Yang Di Cari",
			},
		});
		// $('#test').html(url);
	});

	// add kak
	formData_informasi_lainya.on('submit', function(e) {
		e.preventDefault();
		var id_paket = $('#informasi_lainya_id_paket').val();
		if ($('#file_informasi_lainya_id').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>paket/add_informasi_lainya/" + id_paket,
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					modal_add_informasi_lainya.modal('hide');
					relodTable_informasi_lainya();
					message('success', 'Data Berhasil Di Tambah')
				}
			});
		}
	});
	// edit kak
	formData_informasi_lainya_edit.on('submit', function(e) {
		e.preventDefault();
		var id_informasi_lainya = $('#informasi_lainya2').val();
		if ($('#image').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>paket/edit_informasi_lainya/" + id_informasi_lainya,
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					modal_edit_informasi_lainya.modal('hide');
					relodTable_informasi_lainya();
					message('success', 'Data Berhasil Di Tambah')
				}
			});
		}
	});

	// GET BY ID
	function byid_informasi_lainya(id, type) {
		if (type == 'edit_informasi_lainya') {
			saveData = 'edit_informasi_lainya';

		}
		if (type == 'hapus_informasi_lainya') {
			saveData = 'hapus_informasi_lainya';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('paket/get_byid_informasi_lainya/'); ?>" + id,
			data: formData_informasi_lainya_edit.prop('files'),
			success: function(response) {
				if (type == 'edit_informasi_lainya') {
					$('[name="id_informasi_lainya"]').val(response['informasi_lainya'].id_informasi_lainya);
					$('#nama_file_informasi_lainya2').val(response['informasi_lainya'].nama_file_informasi_lainya);
					$('#file_informasi_lainya2').html(response['informasi_lainya'].file_informasi_lainya);
					modal_edit_informasi_lainya.modal('show');
				}
				if (type == 'hapus_informasi_lainya') {
					deleteQuestionkak(response['informasi_lainya'].id_informasi_lainya, response['informasi_lainya'].file_informasi_lainya);
				}
			}
		})
	}

	// HAPUS DATA
	function deleteQuestionkak(id_informasi_lainya, file_informasi_lainya) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + file_informasi_lainya + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteDatanyakak(id_informasi_lainya);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deleteDatanyakak(id_informasi_lainya) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('paket/delete_informasi_lainya/') ?>" + id_informasi_lainya,
			dataType: "JSON",
			success: function(response) {
				relodTable_informasi_lainya();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}
	// ======= END INFORMASI LAINYA

	// GET TABLE PILIH PANITIA

	var table_pilih_panitia = $('#tbl_id_pilih_panitia');
	var formDataPilihPanitia = $('#formDataPilihPanitia');
	var modal_id_pilih_panitia = $('#modalpanitia');

	function table_panita_reloadnya() {
		table_pilih_panitia.DataTable().ajax.reload();
	}
	// 
	$(document).ready(function() {
		var id_paketnya = $('#id_paketnya').val();
		table_pilih_panitia.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"info": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url('paket/get_panitia/') ?>" + id_paketnya,
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
				"sZeroRecords": "Tidak Ada Panitia Yang Di Cari",
			}
		});
	});



	function PilihPanitia() {
		var id_paket = $('#id_pilih_panitia').val();
		$.ajax({
			type: "GET",
			url: "<?= base_url('paket/getByIdPilihPanitia/'); ?>" + id_paket,
			dataType: "JSON",
			success: function(response) {
				location.replace('<?= base_url('paket/PilihPanitia_Show/') ?>' + response['get_paket'].id_paket);
			},
			error: function() {
				console.log(error);
			}
		})
	}
	var modalpanitia_update = $('#modalpanitia_update');

	function byidPIlihPanitiaUbah(id, type) {
		if (type == 'udate_panitia') {
			saveData = 'udate_panitia';

		}
		if (type == 'null') {
			saveData = 'null';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('paket/get_byid_panitia/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'udate_panitia') {
					$('[name="id_panitia"]').val(response['panitia'].id_panitia);
					$('[name="id_panita_mengikuti_paket"]').val(response['panitia'].id_panita_mengikuti_paket);
					$('#nama_panitia').html(response['panitia'].nama_panitia);
					modalpanitia_update.modal('show');
				}
				if (type == 'null') {
					deleteQuestionkak(response['informasi_lainya'].id_informasi_lainya, response['informasi_lainya'].file_informasi_lainya);
				}
			}
		})
	}

	function message101(icon, text) {
		swal({
			title: "Maaf!!!",
			text: text,
			icon: icon,
		});
	}

	var ubah_panitia = $('#ubah_panitia');
	ubah_panitia.on('submit', function(e) {
		e.preventDefault();
		var id_paket = $('#id_paket_pada_panitia').val();
		$.ajax({
			url: "<?php echo base_url(); ?>paket/update_panita_di_paket2/" + id_paket,
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(data) {
				modalpanitia_update.modal('hide');
				table_panita_reloadnya();
				messageUBAHPANITIA('success', 'Panitia Berhasil Di Ubah!!')
			}
		});
	});

	function messageUBAHPANITIA(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}

	var modal_detail_panitia = $('#modal_detail_panitia');
	// GET BY ID Panitia
	function byidPIlihPanitia2(id, type) {
		if (type == 'detailpanitia') {
			saveData = 'detailpanitia';

		}
		if (type == 'null') {
			saveData = 'null';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('paket/get_byid_panitia/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'detailpanitia') {
					modal_detail_panitia.modal('show');
					var html = '';
					var i;
					for (i = 0; i < response['detail'].length; i++) {
						html += '<tr>' +
							'<td>' + response['detail'][i].nama_pegawai + '</td>' +
							'<td>' + response['detail'][i].nama_role_panitia + '</td>' +
							'<td>' + response['detail'][i].nama_unit_kerja + '</td>' +
							'</tr>'
					}
					$('#detail_panitia').html(html);
				}
				if (type == 'null') {
					deleteQuestionkak(response['informasi_lainya'].id_informasi_lainya, response['informasi_lainya'].file_informasi_lainya);
				}
			}
		})
	}

	// GET BY ID Panitia
	function byidPIlihPanitia(id, type) {
		if (type == 'pilih_panitia') {
			saveData = 'pilih_panitia';

		}
		if (type == 'null') {
			saveData = 'null';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('paket/get_byid_panitia/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'pilih_panitia') {
					$('[name="id_panitia"]').val(response['panitia'].id_panitia);
					$('#nama_panitia').html(response['panitia'].nama_panitia);
					modal_id_pilih_panitia.modal('show');
				}
				if (type == 'null') {
					deleteQuestionkak(response['informasi_lainya'].id_informasi_lainya, response['informasi_lainya'].file_informasi_lainya);
				}
			}
		})
	}

	// action pilih panitianya
	// edit kak	
	formDataPilihPanitia.on('submit', function(e) {
		e.preventDefault();
		var id_paket = $('#id_paket_pada_panitia').val();
		$.ajax({
			url: "<?php echo base_url(); ?>paket/update_pilih_panitia_di_paket/" + id_paket,
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			beforeSend: function() {
				$("#bungkusbeliau").css('display', 'block');
			},
			success: function(data) {
				$("#bungkusbeliau").css('display', 'none');
				modal_id_pilih_panitia.modal('hide');
				table_panita_reloadnya();
				messagePANITIAPILIH('success', 'Panitia Berhasil Di Pilih!!')
			}
		});
	});

	function messagePANITIAPILIH(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}

	var Form_simpan_data_paket_tender = $('#form_data_tender');;

	// Simpan Dan Buat Paket Tender
	function SimpanPaketTender() {
		var id_paket = $('#id_paket_tender').val();
		$.ajax({
			method: "POST",
			url: '<?= base_url('paket/save_paket_tender/') ?>' + id_paket,
			data: Form_simpan_data_paket_tender.serialize(),
			dataType: "JSON",
			success: function(response) {
				Form_simpan_data_paket_tender[0].reset();
				message('success', 'Data Berhasil Di Tambah')
				location.replace('<?= base_url('paket/daftar_paket') ?>');
			},
			error: function() {
				console.log(error);
			}
		})
	}
</script>
<!-- ini untuk dokumen pemilihan -->
<script>
	var table_dokumen_rencana = $('#table_dokumen_rencana');
	var form_dokumen_rencana = $('#form_dokumen_rencana');
	var form_dokumen_rencana_edit = $('#form_dokumen_rencana_edit');
	var modalDataTambahDokumen = $('#modalDataTambahDokumen');
	var modalkakedit = $('#modalDataKakEdit');

	function relodTableKak() {
		table_dokumen_rencana.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		var id_paket = $('#id_paketkusaja').val();
		table_dokumen_rencana.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"info": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url('paket/data_dokumen_pemilihan_rencana/') ?>" + id_paket,
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
				"sZeroRecords": "Tidak Ada KAK Yang Di Cari",
			},
		});
		// $('#test').html(url);
	});

	// add kak
	form_dokumen_rencana.on('submit', function(e) {
		e.preventDefault();
		var id_paket = $('#id_paket_dokumenadd').val();
		if ($('#file_dokumen_persiapan').val() == '') {
			alert("Please Select the File");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>paket/add_Rencana_Dokumen/" + id_paket,
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					modalDataTambahDokumen.modal('hide');
					form_dokumen_rencana[0].reset();
					relodTableKak();
					message('success', 'Data Berhasil Di Tambah')
				}
			});
		}
	});
	// edit kak

	// GET BY ID
	function byidDokumenRencana(id, type) {

		if (type == 'hapusKak') {
			saveData = 'hapusKak';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('paket/getDokumenPersiapan/'); ?>" + id,
			data: formDataKakEdit.prop('files'),
			success: function(response) {
				if (type == 'hapusKak') {
					deleteQuestionkak(response['get_dokumen_periapan'].id_dokumen_persiapan, response['get_dokumen_periapan'].nama_file_dokumen_rencana);
				}
			}
		})
	}

	// HAPUS DATA
	function deleteQuestionkak(id_dokumen_persiapan, nama_file_dokumen_rencana) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nama_file_dokumen_rencana + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteDatanyakak(id_dokumen_persiapan);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deleteDatanyakak(id_dokumen_persiapan) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('paket/delete_Rencana_Dokumen/') ?>" + id_dokumen_persiapan,
			dataType: "JSON",
			success: function(response) {
				relodTableKak();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}


	function BuatPaketTransaksiLangsung() {
		var id_paket = $('#buat_paket').val();
		$.ajax({
			type: "GET",
			url: "<?= base_url('paket/byBuatPaket/'); ?>" + id_paket,
			dataType: "JSON",
			success: function(response) {
				location.replace('<?= base_url('paket/edit_transaksi_langsung/') ?>' + response['get_paket'].id_paket);
			},
			error: function() {
				console.log(error);
			}
		})
	}
</script>

<!-- TRANSAKSI LANGSUNG -->
<script>
	var saveData;
	var btnsave = $('#btnSave');
	var table_transaksi_langsung = $('#serverside_transaksi_langsung');
	var modalTransaksiLangsung = $('#modalDetailTransaksiLangsung')

	$(document).ready(function() {
		table_transaksi_langsung.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"info": false,
			// "searching": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url('paket/getdata_paket_tertender_transaksi_langsung') ?>",
				"type": "POST",

			},
			"columnDefs": [{
				"target": [-1],
				"orderable": true
			}],
			"oLanguage": {
				"sSearch": "Pencarian : ",
				"sEmptyTable": "Data Tidak Tersedia",
				"sLoadingRecords": "Silahkan Tunggu - loading...",
				"sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
				"sZeroRecords": "Maaf Belum Ada Data Transaksi Langsung",
				"sProcessing": "Memuat Data...."
			}
		});

	});

	function byidTransaksiLangsung(id, type) {
		if (type == 'edit') {
			saveData = 'edit';
			// formData[0].reset();
		}
		if (type == 'hapus') {
			saveData = 'hapus';
			// formData[0].reset();
		}

		if (type == 'detail_transaksi_langsung') {
			saveData = 'detail_transaksi_langsung';
		}

		if (type == 'active') {
			saveData = 'active';
			formData[0].reset();
		}

		if (type == 'non_active') {
			saveData = 'non_active';
			formData[0].reset();
		}


		$.ajax({
			type: "GET",
			url: "<?= base_url('paket/byid/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'edit') {
					location.replace('<?= base_url('paket/edit/') ?>' + response['get_paket'].id_paket);
					$('[name="id_paket"]').val(response['get_paket'].id_paket);
					$('[name="nama_paket"]').val(response['get_paket'].nama_paket);
				}

				if (type == 'detail_transaksi_langsung') {
					location.replace('<?= base_url('paket/detail_paket/') ?>' + response['get_paket'].id_paket)

				}
				if (type == 'hapus') {
					deleteQuestion(response['get_paket'].id_paket, response['get_paket'].nama_paket);
				}
			}
		})
	}
</script>

<script>
	var saveData;
	var btnsave2 = $('#btnSave');
	var table_penunjukan_langsung = $('#serverside_penunjukan_langsung');

	$(document).ready(function() {
		table_penunjukan_langsung.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"info": false,
			// "searching": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url('paket/getdata_paket_tertender_penunjukan_langsung') ?>",
				"type": "POST",

			},
			"columnDefs": [{
				"target": [-1],
				"orderable": true
			}],
			"oLanguage": {
				"sSearch": "Pencarian : ",
				"sEmptyTable": "Data Tidak Tersedia",
				"sLoadingRecords": "Silahkan Tunggu - loading...",
				"sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
				"sZeroRecords": "Maaf Belum Ada Data Penunjukan Langsung",
				"sProcessing": "Memuat Data...."
			}
		});

	});

	function byidPenunjukanLangsung(id, type) {
		if (type == 'edit') {
			saveData = 'edit';
			// formData[0].reset();
		}
		if (type == 'hapus') {
			saveData = 'hapus';
			// formData[0].reset();
		}

		if (type == 'detail_penunjukan_langsung') {
			saveData = 'detail_penunjukan_langsung';
		}

		$.ajax({
			type: "GET",
			url: "<?= base_url('paket/byid/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'edit') {
					location.replace('<?= base_url('paket/edit/') ?>' + response['get_paket'].id_paket);
					$('[name="id_paket"]').val(response['get_paket'].id_paket);
					$('[name="nama_paket"]').val(response['get_paket'].nama_paket);
				}

				if (type == 'detail_penunjukan_langsung') {
					location.replace('<?= base_url('paket/detail_paket_penunjukan_langsung/') ?>' + response['get_paket'].id_paket)

				}
				if (type == 'hapus') {
					deleteQuestion(response['get_paket'].id_paket, response['get_paket'].nama_paket);
				}
			}
		})
	}
</script>


<!-- pilih penyedia -->
<script>
	var saveData;
	var modal_pilih_penyedia = $('#modal_pilih_penyedia');
	var table_pilih_penyedia = $('#table_pilih_penyedia');
	var btnsave = $('#btnSave');
	var id_paketkusaja = $('#id_paketkusaja').val();

	$(document).ready(function() {
		table_pilih_penyedia.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"info": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url('paket/getdata_all_vendor') ?>",
				"type": "POST"
			},
			"columnDefs": [{
				"target": [-1],
				"orderable": false
			}],
			"oLanguage": {
				"sSearch": "Pencarian : ",
				"sEmptyTable": "Anda Belum Menunjuk Penyedia",
				"sLoadingRecords": "Silahkan Tunggu - loading...",
				"sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
				"sZeroRecords": "Anda Belum Menunjuk Penyedia",
				"sProcessing": "Memuat Data...."
			}
		});
	});

	function pilih_penyedia() {
		location.replace('<?= base_url('paket/tambah_penyedia_baru/') ?>' + id_paketkusaja);
	}
</script>



<!-- TRANSAKSI LANGSUNG -->
<script>
	function message(icon, text) {
		swal({
			title: "success!!!",
			text: text,
			icon: icon,
		});
	}
	var saveData;
	var modal_tambah_penyedia = $('#modal_tambah_penyedia');
	var modal_edit_penyedia = $('#modal_edit_penyedia');
	var table_penyedia_baru = $('#table_penyedia_baru');
	var table_penyedia_lama_dipilih = $('#table_penyedia_lama');
	var btnsave = $('#btnSave');
	var id_paketkusaja = $('#id_paketkusaja').val();

	$(document).ready(function() {
		table_penyedia_baru.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"info": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url('paket/getdata_penyedia_baru/') ?>" + id_paketkusaja,
				"type": "POST"
			},
			"columnDefs": [{
				"target": [-1],
				"orderable": false
			}],
			"oLanguage": {
				"sSearch": "Pencarian : ",
				"sEmptyTable": "Tambah Penyedia Baru",
				"sLoadingRecords": "Silahkan Tunggu - loading...",
				"sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
				"sZeroRecords": "Belum Mendaftarkan Penyedia Baru",
				"sProcessing": "Memuat Data...."
			}
		});
	});

	$(document).ready(function() {
		table_penyedia_lama_dipilih.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"info": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url('paket/getdata_penyedia_terplilih/') ?>" + id_paketkusaja,
				"type": "POST"
			},
			"columnDefs": [{
				"target": [-1],
				"orderable": false
			}],
			"oLanguage": {
				"sSearch": "Pencarian : ",
				"sEmptyTable": "Tambah Penyedia Baru",
				"sLoadingRecords": "Silahkan Tunggu - loading...",
				"sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
				"sZeroRecords": "Belum Mendaftarkan Penyedia Baru",
				"sProcessing": "Memuat Data...."
			}
		});
	});

	function message30(icon, text) {
		swal({
			title: "success!!!",
			text: text,
			icon: icon,
		});
	}

	function relodtable_penyedia_baru() {
		table_penyedia_baru.DataTable().ajax.reload();
	}

	function relodtable_penyedia_lama() {
		table_penyedia_lama_dipilih.DataTable().ajax.reload();
	}
	var form_tambah_penyedia = $('#form_tambah_penyedia');;

	// Simpan Dan Buat Paket Tender
	function simpan_pilih_penyedia() {
		var id_paketkusaja = $('#id_paketkusaja').val();
		$.ajax({
			method: "POST",
			url: '<?= base_url('paket/save_pilih_penyedia_baru/') ?>' + id_paketkusaja,
			data: form_tambah_penyedia.serialize(),
			dataType: "JSON",
			beforeSend: function() {
				$('#btnSave').attr('disabled', 'disabled');
			},
			success: function(response) {
				if (response == 'success') {
					modal_tambah_penyedia.modal('hide');
					message30('success', 'Vendor Baru Berhasil Di Tambah');
					relodtable_penyedia_baru();
					form_tambah_penyedia[0].reset();
					$('#btnSave').attr('disabled', false);
				} else {
					$(".username_vendor-error").html(response.username_vendor);
					$(".password_vendor-error").html(response.password_vendor);
					$(".email_vendor-error").html(response.email_vendor);
					$(".alamat_vendor-error").html(response.alamat_vendor);
					$(".no_ktp_vendor-error").html(response.no_ktp_vendor);
					$(".telpon_vendor-error").html(response.telpon_vendor);
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}

	// Edit Dan Buat Paket Transaksi Langsung
	var form_edit_penyedia = $('#form_edit_penyedia');

	function edit_pilih_penyedia() {
		$.ajax({
			method: "POST",
			url: '<?= base_url('paket/edit_pilih_penyedia_baru') ?>',
			data: form_edit_penyedia.serialize(),
			dataType: "JSON",
			beforeSend: function() {
				$('#prosess').attr('disabled', 'disabled');
			},
			success: function(response) {
				if (response == 'success') {
					modal_edit_penyedia.modal('hide');
					message('success', 'Vendor Baru Berhasil Di Edit');
					relodtable_penyedia_baru();
					$('#prosess').attr('disabled', false);
					form_tambah_penyedia[0].reset();
					form_edit_penyedia[0].reset();

				}
			},
			error: function() {
				console.log(error);
			}
		})
	}

	var form_tambah_penyedia_lama = $('#form_tambah_penyedia_lama');

	// Simpan Dan Buat Paket Tender
	function simpan_pilih_penyedia_lama(id_paket) {
		$.ajax({
			method: "POST",
			url: '<?= base_url('paket/save_pilih_penyedia_lama/') ?>' + id_paket,
			data: form_tambah_penyedia_lama.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Vendor Berhasil Di Pilih');
					relodtable_penyedia_lama();
					form_tambah_penyedia_lama[0].reset();
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}


	function status_vendor() {
		var id_paketkusaja = $('#id_paketkusaja').val();
		$.ajax({
			type: "GET",
			url: "<?= base_url('paket/status_vendor/'); ?>" + id_paketkusaja,
			dataType: "JSON",
			success: function(response) {
				if (response['status_vendor'] == null) {
					$('#status_vendor').show();
					$('#home-tab').show();
					$('#profile-tab').hide();
				} else if (response['status_vendor'].jenis_pemilihan == 'vendor baru') {
					$('#status_vendor').hide();
					$('#home-tab').hide();
					$('#home').hide();
					$('#profile-tab').hide();
				} else if (response['status_vendor'].jenis_pemilihan == 'vendor lama') {
					$('#profile-tab').show();
					$('#profile').show();
					$('#status_vendor').hide();
					$('#home-tab').hide();
					$('#home').hide();
					$('#contact-tab').hide();
				} else {
					$('#status_vendor').hide();
					$('#home-tab').hide();
				}
			}
		})
	}
	setInterval(() => {
		status_vendor();
	}, 500);


	function by_id_vendor_lama(id, type) {
		var id_paketkusaja = $('#id_paketkusaja').val();
		if (type == 'tambah_vendor_lama') {
			saveData = 'tambah_vendor_lama';
		}
		if (type == 'hapus_vendor') {
			saveData = 'hapus_vendor';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('paket/by_id_vendor_lama/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'tambah_vendor_lama') {
					$('[name="id_mengikuti_vendor"]').val(response['get_vendor_lama'].id_vendor);
					simpan_pilih_penyedia_lama(id_paketkusaja);
				}
				if (type == 'hapus_vendor') {
					delete_vendor_lama_question(id_paketkusaja, response['get_vendor_lama'].username_vendor);
				}
			}
		})
	}


	function byid_vendor_baru(id, type) {
		if (type == 'edit_vendor') {
			saveData = 'edit_vendor';
		}
		if (type == 'hapus_vendor') {
			saveData = 'hapus_vendor';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('paket/by_id_vendor_baru/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'edit_vendor') {
					$('[name="id_mengikuti_vendor"]').val(response['get_vendor_baru'].id_mengikuti_vendor);
					$('[name="username_vendor"]').val(response['get_vendor_baru'].username_vendor);
					$('[name="password_vendor"]').val(response['get_vendor_baru'].password_vendor);
					$('[name="email_vendor"]').val(response['get_vendor_baru'].email_vendor);
					$('[name="telpon_vendor"]').val(response['get_vendor_baru'].telpon_vendor);
					$('[name="alamat_vendor"]').val(response['get_vendor_baru'].alamat_vendor);
					$('[name="no_ktp_vendor"]').val(response['get_vendor_baru'].no_ktp_vendor);
					modal_edit_penyedia.modal('show');
					modal_edit_penyedia.on('hidden.bs.modal', function() {
						form_tambah_penyedia[0].reset();
					})
				}
				if (type == 'hapus_vendor') {
					delete_vendor_baru_question(response['get_vendor_baru'].id_mengikuti_vendor, response['get_vendor_baru'].username_vendor);
				}
			}
		})
	}

	// HAPUS DATA Vendor Bukan batch
	function delete_vendor_lama_question(id_mengikuti_paket_vendor, username_vendor) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Merevisi Vendor Terpilih   " + username_vendor + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					delete_vendor_lama(id_mengikuti_paket_vendor);
				} else {
					message('success', 'Data Tidak Jadi Di Revisi, Vendor Aman!!')
				}
			});
	}

	function delete_vendor_lama(id_mengikuti_paket_vendor) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('paket/delete_vendor_lama/') ?>" + id_mengikuti_paket_vendor,
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					relodtable_penyedia_lama();
					message('success', 'Data Berhasil Di Revisi');
					location.reload();
				}
			}
		})
	}

	// HAPUS DATA
	function delete_vendor_baru_question(id_mengikuti_vendor, username_vendor) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Merevisi Vendor Terpilih   " + username_vendor + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					delete_vendor_baru(id_mengikuti_vendor);
				} else {
					message('success', 'Data Tidak Jadi Di Revisi, Vendor Aman!!')
				}
			});
	}

	function delete_vendor_baru(id_mengikuti_vendor) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('paket/delete_vendor_baru/') ?>" + id_mengikuti_vendor,
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					relodtable_penyedia_baru();
					message('success', 'Data Berhasil Di Revisi');
					location.reload();
				}
			}
		})
	}
</script>
<!-- upload dokumen pengadaan -->
<script>
	function message(icon, text) {
		swal({
			title: "success!!!",
			text: text,
			icon: icon,
		});
	}
	var table_dokumen_pengadaan_transaksi_langsung = $('#table_dokumen_pengadaan_transaksi_langsung');
	var id_paketkusaja = $('#id_paketkusaja').val();
	$(document).ready(function() {
		table_dokumen_pengadaan_transaksi_langsung.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"info": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url('paket/getdatatable_dokumen_pengadaan_transaksi_langsung/') ?>" + id_paketkusaja,
				"type": "POST"
			},
			"columnDefs": [{
				"target": [-1],
				"orderable": false
			}],
			"oLanguage": {
				"sSearch": "Pencarian : ",
				"sEmptyTable": "Belum Ada File Dokumen Pengadaan",
				"sLoadingRecords": "Silahkan Tunggu - loading...",
				"sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
				"sZeroRecords": "Belum Ada File Dokumen Pengadaan",
				"sProcessing": "Memuat Data...."
			}
		});
	});

	function reload_table_dokumen_pengadaan_transaksi_langsung() {
		table_dokumen_pengadaan_transaksi_langsung.DataTable().ajax.reload();
	}
	var form_dokumen_pengadaan_transaksi_langsung = $('#form_dokumen_pengadaan_transaksi_langsung');
	form_dokumen_pengadaan_transaksi_langsung.on('submit', function(e) {
		e.preventDefault();
		var id_paketkusaja = $('#id_paketkusaja').val();
		if ($('.file_dokumen_pengadaan_transaksi_langsung').val() == '') {
			$('#error_file_pengadaan_lelang1').show();
			setTimeout(function() {
				$('#error_file_pengadaan_lelang1').hide();
			}, 4000);
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>paket/upload_dokumen_pengadaan_transaksi_langsung/" + id_paketkusaja,
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				beforeSend: function() {
					$('#upload_pengadaan_lelang1').attr('disabled', 'disabled');
					$('#process_pengadaan_lelang1').css('display', 'block');
					$('#sedang_dikirim_pengadaan_lelang1').show();
				},
				success: function(response) {
					var percentage = 0;
					var timer = setInterval(function() {
						percentage = percentage + 20;
						progress_bar_process_dokumen_lelang(percentage, timer);
					}, 1000);
				}
			});
		}
	});



	function by_id_dokumen_pengadaan(id, type) {
		if (type == 'hapus_dokumen_vendor') {
			saveData = 'hapus_dokumen_vendor';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('paket/by_id_dokumen_pengadaan/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'hapus_dokumen_vendor') {
					Question_delete_dokumen_pengadaan_transaksi_langsung(response['get_dokumen_transaksi_langsung'].id_dokumen_pengadaan_transaksi_langsung, response['get_dokumen_transaksi_langsung'].nama_file_dokumen_pengadaan);
				}
			}
		})
	}

	// HAPUS DATA 
	function Question_delete_dokumen_pengadaan_transaksi_langsung(id_dokumen_pengadaan_transaksi_langsung, nama_file_dokumen_pengadaan) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Dokumen " + nama_file_dokumen_pengadaan + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					delete_dokumen_pengadaan_transaksi_langsung(id_dokumen_pengadaan_transaksi_langsung);
				} else {
					message('success', 'Dokumen Tidak Jadi Di Hapus, Dokumen Aman!!')
				}
			});
	}

	function delete_dokumen_pengadaan_transaksi_langsung(id_dokumen_pengadaan_transaksi_langsung) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('paket/delete_dokumen_pengadaan_transaksi_langsung/') ?>" + id_dokumen_pengadaan_transaksi_langsung,
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					reload_table_dokumen_pengadaan_transaksi_langsung();
					message('success', 'Dokumen Berhasil Di Delete');
				}
			}
		})
	}

	function progress_bar_process_dokumen_lelang(percentage, timer) {
		$('.progress-bar').css('width', percentage + '%');
		if (percentage > 100) {
			clearInterval(timer);
			$('#form_dokumen_pengadaan_transaksi_langsung')[0].reset();
			$('#process_pengadaan_lelang1').css('display', 'none');
			$('#sedang_dikirim_pengadaan_lelang1').show();
			$('.progress-bar').css('width', percentage + '%');
			$('#upload_pengadaan_lelang1').attr('disabled', false);
			message('success', 'Dokumen Berhasil Di Upload');
			reload_table_dokumen_pengadaan_transaksi_langsung();
		}
	}
</script>

<!-- JADWAL TRANSAKSI LANGSUNG -->
<script>
	var id_paketkusaja = $('#id_paketkusaja').val();

	function buat_jadwal_transaksi_langsung() {
		location.replace('<?= base_url('paket/jadwal_transaksi_langsung/') ?>' + id_paketkusaja);
	}

	var tbl_jadwal_transaksi_langsung = $('#tbl_jadwal_transaksi_langsung');
	var form_jadwal_transaksi_langsung_tambah = $('#form_jadwal_transaksi_langsung_tambah');
	var btnsave = $('#btnSave')

	$(document).ready(function() {
		tbl_jadwal_transaksi_langsung.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('paket/getdata_jadwal_transaksi_langsung') ?>",
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
				"sZeroRecords": "Tidak Ada Data Area Yang Di Cari",
				"sProcessing": "Memuat Data...."
			}
		});
	});
</script>

<script>
	$('#mulai1').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-F-Y H:i',
		onShow: function(ct) {
			this.setOptions({
				maxDate: $('#selesai1').val() ? $('#selesai1').val() : false
			})
		}

	})
	$('#selesai1').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-F-Y H:i',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('#mulai1').val() ? $('#mulai1').val() : false
			})
		}
	})
	document.getElementById("selesai1").onchange = function() {
		validasi_selesai()
	};


	function validasi_selesai() {
		const mulai1 = new Date($('#mulai1').val());
		const selesai1 = new Date($('#selesai1').val());
		if (mulai1.getTime() > selesai1.getTime()) {
			$('#error-jadwal1').show();
			$("#erorr_jadwal_row1").css("background-color", "red");
			$("#erorr_jadwal_row1").css("color", "white");
		} else {
			$('#error-jadwal1').hide();
			$("#erorr_jadwal_row1").css("background-color", "transparent");
			$("#erorr_jadwal_row1").css("color", "black");
		}
	}
</script>

<!-- row ke 2 -->
<script>
	$('#mulai2').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-F-Y H:i',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('#selesai1').val() ? $('#selesai1').val() : false
			})
		}
	})

	$('#selesai2').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-F-Y H:i',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('#mulai2').val() ? $('#mulai2').val() : false
			})
		}
	})
	document.getElementById("selesai2").onchange = function() {
		validasi_selesai2()
	};
	document.getElementById("mulai2").onchange = function() {
		validasi_mulai2()
	};
	// validasi mulai
	function validasi_mulai2() {
		const mulai2 = new Date($('#mulai2').val());
		const selesai1 = new Date($('#selesai1').val());
		if (mulai2.getTime() < selesai1.getTime()) {
			$('#error-jadwal2').show();
			$("#erorr_jadwal_row2").css("background-color", "red");
			$("#erorr_jadwal_row2").css("color", "white");
		} else {
			$('#error-jadwal2').hide();
			$("#erorr_jadwal_row2").css("background-color", "transparent");
			$("#erorr_jadwal_row2").css("color", "black");
		}
	}

	// validasi selesai
	function validasi_selesai2() {
		const mulai2 = new Date($('#mulai2').val());
		const selesai2 = new Date($('#selesai2').val());
		if (mulai2.getTime() > selesai2.getTime()) {
			$('#error-jadwal2').show();
			$("#erorr_jadwal_row2").css("background-color", "red");
			$("#erorr_jadwal_row2").css("color", "white");
		} else {
			$('#error-jadwal2').hide();
			$("#erorr_jadwal_row2").css("background-color", "transparent");
			$("#erorr_jadwal_row2").css("color", "black");
		}
	}
</script>

<!-- row ke 3 -->
<script>
	$('#mulai3').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-F-Y H:i',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('#selesai2').val() ? $('#selesai2').val() : false
			})
		}
	})

	$('#selesai3').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-F-Y H:i',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('#mulai3').val() ? $('#mulai3').val() : false
			})
		}
	})
	document.getElementById("selesai3").onchange = function() {
		validasi_selesai3()
	};
	document.getElementById("mulai3").onchange = function() {
		validasi_mulai3()
	};
	// validasi mulai
	function validasi_mulai3() {
		const mulai3 = new Date($('#mulai3').val());
		const selesai2 = new Date($('#selesai2').val());
		if (mulai3.getTime() < selesai2.getTime()) {
			$('#error-jadwal3').show();
			$("#erorr_jadwal_row3").css("background-color", "red");
			$("#erorr_jadwal_row3").css("color", "white");
		} else {
			$('#error-jadwal3').hide();
			$("#erorr_jadwal_row3").css("background-color", "transparent");
			$("#erorr_jadwal_row3").css("color", "black");
		}
	}

	// validasi selesai
	function validasi_selesai3() {
		const mulai3 = new Date($('#mulai3').val());
		const selesai3 = new Date($('#selesai3').val());
		if (mulai3.getTime() > selesai3.getTime()) {
			$('#error-jadwal3').show();
			$("#erorr_jadwal_row3").css("background-color", "red");
			$("#erorr_jadwal_row3").css("color", "white");
		} else {
			$('#error-jadwal3').hide();
			$("#erorr_jadwal_row3").css("background-color", "transparent");
			$("#erorr_jadwal_row3").css("color", "black");
		}
	}
</script>

<!-- row ke 4 -->
<script>
	$('#mulai4').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-F-Y H:i',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('#selesai4').val() ? $('#selesai4').val() : false
			})
		}
	})

	$('#selesai4').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-F-Y H:i',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('#mulai4').val() ? $('#mulai4').val() : false
			})
		}
	})
	document.getElementById("selesai4").onchange = function() {
		validasi_selesai4()
	};
	document.getElementById("mulai4").onchange = function() {
		validasi_mulai4()
	};
	// validasi mulai
	function validasi_mulai4() {
		const mulai4 = new Date($('#mulai4').val());
		const selesai3 = new Date($('#selesai3').val());
		if (mulai4.getTime() < selesai3.getTime()) {
			$('#error-jadwal4').show();
			$("#erorr_jadwal_row4").css("background-color", "red");
			$("#erorr_jadwal_row4").css("color", "white");
		} else {
			$('#error-jadwal4').hide();
			$("#erorr_jadwal_row4").css("background-color", "transparent");
			$("#erorr_jadwal_row4").css("color", "black");
		}
	}

	// validasi selesai
	function validasi_selesai4() {
		const mulai4 = new Date($('#mulai4').val());
		const selesai4 = new Date($('#selesai4').val());
		if (mulai4.getTime() > selesai4.getTime()) {
			$('#error-jadwal4').show();
			$("#erorr_jadwal_row4").css("background-color", "red");
			$("#erorr_jadwal_row4").css("color", "white");
		} else {
			$('#error-jadwal4').hide();
			$("#erorr_jadwal_row4").css("background-color", "transparent");
			$("#erorr_jadwal_row4").css("color", "black");
		}
	}
</script>

<!-- row ke 5 -->
<script>
	$('#mulai5').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-F-Y H:i',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('#selesai5').val() ? $('#selesai5').val() : false
			})
		}
	})

	$('#selesai5').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-F-Y H:i',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('#mulai5').val() ? $('#mulai5').val() : false
			})
		}
	})
	document.getElementById("selesai5").onchange = function() {
		validasi_selesai5()
	};
	document.getElementById("mulai5").onchange = function() {
		validasi_mulai5()
	};
	// validasi mulai
	function validasi_mulai5() {
		const mulai5 = new Date($('#mulai5').val());
		const selesai4 = new Date($('#selesai4').val());
		if (mulai5.getTime() < selesai4.getTime()) {
			$('#error-jadwal5').show();
			$("#erorr_jadwal_row5").css("background-color", "red");
			$("#erorr_jadwal_row5").css("color", "white");
		} else {
			$('#error-jadwal5').hide();
			$("#erorr_jadwal_row5").css("background-color", "transparent");
			$("#erorr_jadwal_row5").css("color", "black");
		}
	}

	// validasi selesai
	function validasi_selesai5() {
		const mulai5 = new Date($('#mulai5').val());
		const selesai5 = new Date($('#selesai5').val());
		if (mulai5.getTime() > selesai5.getTime()) {
			$('#error-jadwal5').show();
			$("#erorr_jadwal_row5").css("background-color", "red");
			$("#erorr_jadwal_row5").css("color", "white");
		} else {
			$('#error-jadwal5').hide();
			$("#erorr_jadwal_row5").css("background-color", "transparent");
			$("#erorr_jadwal_row5").css("color", "black");
		}
	}
</script>

<!-- row ke 6 -->
<script>
	$('#mulai6').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-F-Y H:i',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('#selesai6').val() ? $('#selesai6').val() : false
			})
		}
	})

	$('#selesai6').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-F-Y H:i',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('#mulai6').val() ? $('#mulai6').val() : false
			})
		}
	})

	document.getElementById("selesai6").onchange = function() {
		validasi_selesai6()
	};
	document.getElementById("mulai6").onchange = function() {
		validasi_mulai6()
	};
	// validasi mulai
	function validasi_mulai6() {
		const mulai6 = new Date($('#mulai6').val());
		const selesai5 = new Date($('#selesai5').val());
		if (mulai6.getTime() < selesai5.getTime()) {
			$('#error-jadwal6').show();
			$("#erorr_jadwal_row6").css("background-color", "red");
			$("#erorr_jadwal_row6").css("color", "white");
		} else {
			$('#error-jadwal6').hide();
			$("#erorr_jadwal_row6").css("background-color", "transparent");
			$("#erorr_jadwal_row6").css("color", "black");
		}
	}

	// validasi selesai
	function validasi_selesai6() {
		const mulai6 = new Date($('#mulai6').val());
		const selesai6 = new Date($('#selesai6').val());
		if (mulai6.getTime() > selesai6.getTime()) {
			$('#error-jadwal6').show();
			$("#erorr_jadwal_row6").css("background-color", "red");
			$("#erorr_jadwal_row6").css("color", "white");
		} else {
			$('#error-jadwal6').hide();
			$("#erorr_jadwal_row6").css("background-color", "transparent");
			$("#erorr_jadwal_row6").css("color", "black");
		}
	}
</script>

<!-- row ke 7 -->
<script>
	$('#mulai7').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-F-Y H:i',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('#selesai7').val() ? $('#selesai7').val() : false
			})
		}
	})

	$('#selesai7').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-F-Y H:i',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('#mulai7').val() ? $('#mulai7').val() : false
			})
		}
	})
	document.getElementById("selesai7").onchange = function() {
		validasi_selesai7()
	};
	document.getElementById("mulai7").onchange = function() {
		validasi_mulai7()
	};
	// validasi mulai
	function validasi_mulai7() {
		const mulai7 = new Date($('#mulai7').val());
		const selesai6 = new Date($('#selesai6').val());
		if (mulai7.getTime() < selesai6.getTime()) {
			$('#error-jadwal7').show();
			$("#erorr_jadwal_row7").css("background-color", "red");
			$("#erorr_jadwal_row7").css("color", "white");
		} else {
			$('#error-jadwal7').hide();
			$("#erorr_jadwal_row7").css("background-color", "transparent");
			$("#erorr_jadwal_row7").css("color", "black");
		}
	}

	// validasi selesai
	function validasi_selesai7() {
		const mulai7 = new Date($('#mulai7').val());
		const selesai7 = new Date($('#selesai7').val());
		if (mulai7.getTime() > selesai7.getTime()) {
			$('#error-jadwal7').show();
			$("#erorr_jadwal_row7").css("background-color", "red");
			$("#erorr_jadwal_row7").css("color", "white");
		} else {
			$('#error-jadwal7').hide();
			$("#erorr_jadwal_row7").css("background-color", "transparent");
			$("#erorr_jadwal_row7").css("color", "black");
		}
	}
</script>

<!-- row ke 8 -->
<script>
	$('#mulai8').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-F-Y H:i',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('#selesai8').val() ? $('#selesai8').val() : false
			})
		}
	})

	$('#selesai8').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-F-Y H:i',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('#mulai8').val() ? $('#mulai8').val() : false
			})
		}
	})
	document.getElementById("selesai8").onchange = function() {
		validasi_selesai8()
	};
	document.getElementById("mulai8").onchange = function() {
		validasi_mulai8()
	};
	// validasi mulai
	function validasi_mulai8() {
		const mulai8 = new Date($('#mulai8').val());
		const selesai7 = new Date($('#selesai7').val());
		if (mulai8.getTime() < selesai7.getTime()) {
			$('#error-jadwal8').show();
			$("#erorr_jadwal_row8").css("background-color", "red");
			$("#erorr_jadwal_row8").css("color", "white");
		} else {
			$('#error-jadwal8').hide();
			$("#erorr_jadwal_row8").css("background-color", "transparent");
			$("#erorr_jadwal_row8").css("color", "black");
		}
	}

	// validasi selesai
	function validasi_selesai8() {
		const mulai8 = new Date($('#mulai8').val());
		const selesai8 = new Date($('#selesai8').val());
		if (mulai8.getTime() > selesai8.getTime()) {
			$('#error-jadwal8').show();
			$("#erorr_jadwal_row8").css("background-color", "red");
			$("#erorr_jadwal_row8").css("color", "white");
		} else {
			$('#error-jadwal8').hide();
			$("#erorr_jadwal_row8").css("background-color", "transparent");
			$("#erorr_jadwal_row8").css("color", "black");
		}
	}


	function message(icon, text) {
		swal({
			title: "success!!!",
			text: text,
			icon: icon,
		});
	}
	// SIMPAN JADWAL


	function simpan_jadwal() {
		var id_paketkusaja = $('#id_paketkusaja').val();
		$.ajax({
			method: "POST",
			url: '<?= base_url('paket/save_jadwal_transaksi_langsung/') ?>' + id_paketkusaja,
			data: form_jadwal_transaksi_langsung.serialize(),
			dataType: "JSON",
			beforeSend: function() {
				$('#btnSave').attr('disabled', 'disabled');
			},
			success: function(response) {
				if (response == 'success') {
					message('success', 'Jadwal Berhasil Di Buat');
					form_jadwal_transaksi_langsung[0].reset();
					$('#btnSave').attr('disabled', false);
					location.reload();
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}

	// update jadwal


	var form_jadwal_transaksi_langsung = $('#form_jadwal_transaksi_langsung');
	form_jadwal_transaksi_langsung.on('submit', function(e) {
		e.preventDefault();
		var id_paketkusaja = $('#id_paketkusaja').val();
		$.ajax({
			url: '<?= base_url('paket/save_jadwal_transaksi_langsung/') ?>' + id_paketkusaja,
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			beforeSend: function() {
				$('#btnSave').attr('disabled', 'disabled');
			},
			success: function(response) {
				if (response == 'success') {
					message('success', 'Jadwal Berhasil Di Buat');
					form_jadwal_transaksi_langsung[0].reset();
					$('#btnSave').attr('disabled', false);
					location.reload();
				}
			}
		});
	});
</script>

<script>
	$("#harga_rincian_hps2").keyup(function() {
		var harga = $("#harga_rincian_hps2").val();
		var tanpa_rupiah = document.getElementById('tanpa-rupiah');
		tanpa_rupiah.value = formatRupiah(this.value, 'Rp. ');
		/* Fungsi */
		function formatRupiah(angka, prefix) {
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
				split = number_string.split(','),
				sisa = split[0].length % 3,
				rupiah = split[0].substr(0, sisa),
				ribuan = split[0].substr(sisa).match(/\d{3}/gi);

			if (ribuan) {
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}

			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
	});
</script>

<script>
	var form_update_jadwal_transaksi_langsung = $('#form_update_jadwal_transaksi_langsung');
	form_update_jadwal_transaksi_langsung.on('submit', function(e) {
		e.preventDefault();
		var id_paketkusaja = $('#id_paketkusaja').val();
		$.ajax({
			url: '<?= base_url('paket/update_jadwal_transaksi_langsung/') ?>' + id_paketkusaja,
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			beforeSend: function() {
				$('#btnSave').attr('disabled', 'disabled');
			},
			success: function(response) {
				if (response == 'success') {
					message('success', 'Jadwal Berhasil Di Update');
					$('#btnSave').attr('disabled', false);
					location.reload();
				}
			}
		});
	});

	setInterval(() => {
		const mulai1 = new Date($('#mulai1').val());
		const selesai1 = new Date($('#selesai1').val());

		const mulai2 = new Date($('#mulai2').val());
		const selesai2 = new Date($('#selesai2').val());

		const mulai3 = new Date($('#mulai3').val());
		const selesai3 = new Date($('#selesai3').val());

		const mulai4 = new Date($('#mulai4').val());
		const selesai4 = new Date($('#selesai4').val());

		const mulai5 = new Date($('#mulai5').val());
		const selesai5 = new Date($('#selesai5').val());

		const mulai6 = new Date($('#mulai6').val());
		const selesai6 = new Date($('#selesai6').val());

		const mulai7 = new Date($('#mulai7').val());
		const selesai7 = new Date($('#selesai7').val());

		const mulai8 = new Date($('#mulai8').val());
		const selesai8 = new Date($('#selesai8').val());

		if (selesai1.getTime() < mulai1.getTime()) {
			$('#error-jadwal1').show();
			// $("#erorr_jadwal_row1").css("background-color", "red");
			// $("#erorr_jadwal_row1").css("color", "white");
			// $('#btnSave').attr('disabled', 'disabled');
		} else if (selesai2.getTime() < mulai2.getTime()) {
			$('#error-jadwal2').show();
			// $("#erorr_jadwal_row2").css("background-color", "red");
			// $("#erorr_jadwal_row2").css("color", "white");
			// $('#btnSave').attr('disabled', 'disabled');
		} else if (mulai2.getTime() < selesai1.getTime()) {
			$('#error-jadwal2').show();
			// $("#erorr_jadwal_row2").css("background-color", "red");
			// $("#erorr_jadwal_row2").css("color", "white");
			// $('#btnSave').attr('disabled', 'disabled');
		} else if (selesai3.getTime() < mulai3.getTime()) {
			$('#error-jadwal3').show();
			// $("#erorr_jadwal_row3").css("background-color", "red");
			// $("#erorr_jadwal_row3").css("color", "white");
			// $('#btnSave').attr('disabled', 'disabled');
		} else if (mulai3.getTime() < selesai2.getTime()) {
			$('#error-jadwal3').show();
			// $("#erorr_jadwal_row3").css("background-color", "red");
			// $("#erorr_jadwal_row3").css("color", "white");
			// $('#btnSave').attr('disabled', 'disabled');
		}
		if (selesai4.getTime() < mulai4.getTime()) {
			$('#error-jadwal4').show();
			// $("#erorr_jadwal_row4").css("background-color", "red");
			// $("#erorr_jadwal_row4").css("color", "white");
			// $('#btnSave').attr('disabled', 'disabled');
		} else if (mulai4.getTime() < selesai3.getTime()) {
			$('#error-jadwal4').show();
			// $("#erorr_jadwal_row4").css("background-color", "red");
			// $("#erorr_jadwal_row4").css("color", "white");
			// $('#btnSave').attr('disabled', 'disabled');
		} else if (selesai5.getTime() < mulai5.getTime()) {
			$('#error-jadwal5').show();
			// $("#erorr_jadwal_row5").css("background-color", "red");
			// $("#erorr_jadwal_row5").css("color", "white");
			// $('#btnSave').attr('disabled', 'disabled');
		} else if (mulai5.getTime() < selesai4.getTime()) {
			$('#error-jadwal5').show();
			// $("#erorr_jadwal_row5").css("background-color", "red");
			// $("#erorr_jadwal_row5").css("color", "white");
			// $('#btnSave').attr('disabled', 'disabled');
		} else if (selesai6.getTime() < mulai6.getTime()) {
			$('#error-jadwal6').show();
			// $("#erorr_jadwal_row6").css("background-color", "red");
			// $("#erorr_jadwal_row6").css("color", "white");
			// $('#btnSave').attr('disabled', 'disabled');
		} else if (mulai6.getTime() < selesai5.getTime()) {
			$('#error-jadwal6').show();
			// $("#erorr_jadwal_row6").css("background-color", "red");
			// $("#erorr_jadwal_row6").css("color", "white");
			// $('#btnSave').attr('disabled', 'disabled');
		} else if (selesai7.getTime() < mulai7.getTime()) {
			$('#error-jadwal7').show();
			// $("#erorr_jadwal_row7").css("background-color", "red");
			// $("#erorr_jadwal_row7").css("color", "white");
			// $('#btnSave').attr('disabled', 'disabled');
		} else if (mulai7.getTime() < selesai6.getTime()) {
			$('#error-jadwal7').show();
			// $("#erorr_jadwal_row7").css("background-color", "red");
			// $("#erorr_jadwal_row7").css("color", "white");
			// $('#btnSave').attr('disabled', 'disabled');
		} else if (selesai8.getTime() < mulai8.getTime()) {
			$('#error-jadwal8').show();
			// $("#erorr_jadwal_row8").css("background-color", "red");
			// $("#erorr_jadwal_row8").css("color", "white");
			// $('#btnSave').attr('disabled', 'disabled');
		} else if (mulai8.getTime() < selesai7.getTime()) {
			$('#error-jadwal8').show();
			// $("#erorr_jadwal_row8").css("background-color", "red");
			// $("#erorr_jadwal_row8").css("color", "white");
			// $('#btnSave').attr('disabled', 'disabled');
		} else {
			$('#btnSave').attr('disabled', false);
		}
	}, 500);
</script>

<script>
	$(document).ready(function() {

		function message(icon, text) {
			swal({
				title: "success!!!",
				text: text,
				icon: icon,
			});
		}
		document.getElementById("pilih_kategori_penyedia").onchange = function() {
			var kategori = $('[name="kategori_penyedia"]').val();
			$('[name="kategori_penyedia_terpilih"]').val(kategori);
			update_kategori_pemilihan()
		};

		var update_kategori_penyedia = $('#update_kategori_penyedia');

		function update_kategori_pemilihan() {
			var id_paketkusaja = $('#id_paketkusaja').val();
			$.ajax({
				method: "POST",
				url: '<?= base_url('paket/update_kategori_penyedia/') ?>' + id_paketkusaja,
				data: update_kategori_penyedia.serialize(),
				dataType: "JSON",
				success: function(response) {
					if (response == 'success') {
						message('success', 'Kategori Berhasil Di Pilih Di Update');
						location.reload();
					}
				},
				error: function() {
					console.log(error);
				}
			})
		}
	});
</script>

<!-- kirim permintaan persetujuan -->
<script>
	function message(icon, text) {
		swal({
			title: "success!!!",
			text: text,
			icon: icon,
		});
	}

	var saveData;
	var btnsave = $('#btnSave');
	var form_minta_persetujuan_manager = $('#form_minta_persetujuan_manager');

	function Kirim_perintaan_persetujuan() {
		var id_paketkusaja = $('#id_paketkusaja').val();
		$.ajax({
			method: "POST",
			url: '<?= base_url('paket/minta_persetujuan_manager/') ?>' + id_paketkusaja,
			data: form_minta_persetujuan_manager.serialize(),
			dataType: "JSON",
			success: function(response) {
				message('success', 'Berhasil Mengirim Permintaan Persetujuan');
				window.open('https://api.whatsapp.com/send?phone=+62' + response['telpon'].telepon + '&text=Permintaan Persetujuan Paket : ' + response['paket'].nama_paket + ' Metode Pemilihan : ' + response['paket'].nama_metode_pemilihan + ' Cek Detail Persetujuan http://jmtm-eproc.kintekindo.net/', '_blank');
				location.reload();

			},
			error: function() {
				console.log(error);
			}
		})
	}

	function SetujuiPaketTransaksiLangsung() {
		var id_paketkusaja = $('#id_paketkusaja').val();
		$.ajax({
			method: "POST",
			url: '<?= base_url('paket/persetujuan_manager/') ?>' + id_paketkusaja,
			dataType: "JSON",
			beforeSend: function() {
				$("#bungkusbeliau").css('display', 'block');
			},
			success: function(response) {
				$("#bungkusbeliau").css('display', 'none');
				window.open('https://api.whatsapp.com/send?phone=+62' + response['telpon'].telepon + '&text=Berhasil Di Setujui Nama Paket  : ' + response['paket'].nama_paket + ' Dengan Metode Pemilihan : ' + response['paket'].nama_metode_pemilihan + ' Login Dan Segera Umumkan Paket http://jmtm-eproc.kintekindo.net/', '_blank');
				message('success', 'Paket Berhasil Di Setujui');
				location.reload();
			},
			error: function() {
				console.log(error);
			}
		})
	}

	function Kirim_perintaan_persetujuan2() {
		var id_paketkusaja = $('#id_paketkusaja').val();
		$.ajax({
			method: "POST",
			url: '<?= base_url('paket/minta_persetujuan_manager/') ?>' + id_paketkusaja,
			data: form_minta_persetujuan_manager.serialize(),
			dataType: "JSON",
			success: function(response) {
				message('success', 'Berhasil Mengirim Permintaan Persetujuan Ulang');
				window.open('https://api.whatsapp.com/send?phone=+62' + response['telpon'].telepon + '&text=Permintaan Persetujuan Ulang Paket : ' + response['paket'].nama_paket + ' Metode Pemilihan : ' + response['paket'].nama_metode_pemilihan + ' Cek Detail Persetujuan http://jmtm-eproc.kintekindo.net/', '_blank');
				location.reload();
			},
			error: function() {
				console.log(error);
			}
		})
	}
</script>
<!-- modal revisi paket -->
<script>
	var modal_revisi_paket = $('#modal_revisi_paket');
	var exampleModal = $('#exampleModal');

	function revisi_paket_transaksi_langsung() {
		modal_revisi_paket.modal('show');
		exampleModal.modal('hide');
	}
</script>

<script>
	function message(icon, text) {
		swal({
			title: "success!!!",
			text: text,
			icon: icon,
		});
	}

	var form_kirim_alasan_revisi_paket = $('#form_kirim_alasan_revisi_paket');

	function kirim_alasan_revisi_paket() {
		var id_paketkusaja = $('#id_paketkusaja').val();
		$.ajax({
			method: "POST",
			url: '<?= base_url('paket/kirim_alasan_revisi_paket/') ?>' + id_paketkusaja,
			data: form_kirim_alasan_revisi_paket.serialize(),
			dataType: "JSON",
			beforeSend: function() {
				$("#bungkusbeliau").css('display', 'block');
			},
			success: function(response) {
				$("#bungkusbeliau").css('display', 'none');
				window.open('https://api.whatsapp.com/send?phone=+62' + response['telpon'].telepon + '&text=Revisi Persetujuan Nama Paket  : ' + response['paket'].nama_paket + ' Dengan Metode Pemilihan : ' + response['paket'].nama_metode_pemilihan + 'Isi Alasan Revisi : ' + response['alasan_revisi'] + ', ' + 'Cek Revisi Login http://jmtm-eproc.kintekindo.net/', '_blank');
				message('success', 'Alasan / Pembatalan Berhasil Di Kirim');
				location.reload();
			},
			error: function() {
				console.log(error);
			}
		})
	}
</script>

<script>
	function message(icon, text) {
		swal({
			title: "success!!!",
			text: text,
			icon: icon,
		});
	}

	var form_batalkan_paket_transaksi_ajh_langsung = $('#form_batalkan_paket_transaksi_ajh_langsung');

	function bataltendertransaksijahlangsung() {
		var id_paketkusaja_umumkan = $('#id_paketku').val();
		$.ajax({
			method: "POST",
			url: '<?= base_url('paket/batalkan_paket_transaksi_langsung_okeee/') ?>' + id_paketkusaja_umumkan,
			data: form_batalkan_paket_transaksi_ajh_langsung.serialize(),
			dataType: "JSON",
			beforeSend: function() {
				$("#kirim_ke_vendor").css('display', 'block');
			},
			success: function(response) {
				$("#kirim_ke_vendor").css('display', 'none');
				window.open('https://api.whatsapp.com/send?phone=+62' + response['telpon'] + '&text=Pembatalan Paket Transaksi Langsung Nama Paket  : ' + response['paket'] + ' Alasan : ' + response['alasan'] + '_blank');
				message('success', 'Paket Berhasil Di Batalkan');
				location.reload();
			},
			error: function() {
				console.log(error);
			}
		})
	}
</script>

<script>
	function message90(icon, text) {
		swal({
			title: "success!!!",
			text: text,
			icon: icon,
		});
	}
	var form_umumkan_paket_transaksi_langsung = $('#form_umumkan_paket_transaksi_langsung');

	function Umumkan_paket_transaksi_langsung() {
		var id_paketkusaja = $('#id_paketkusaja').val();
		$.ajax({
			method: "POST",
			url: '<?= base_url('paket/umumkan_paket_transaksi_langsung/') ?>' + id_paketkusaja,
			data: form_umumkan_paket_transaksi_langsung.serialize(),
			dataType: "JSON",
			beforeSend: function() {
				$("#umumdah").css('display', 'block');
			},
			success: function(response) {
				$("#umumdah").css('display', 'none');
				message90('success', 'Paket Berhasil Di Umumkan')
				window.open('https://api.whatsapp.com/send?phone=+62' + response['telpon'] + '&text=Anda Mempunyai 1 Paket Transaksi Langsung Silakan Login Dan Setujui Paket http://jmtm-eproc.kintekindo.net/ %20%0DLogin Dengan:%20%0DUsername:' + response['vendor']['username_vendor'] + '%20%0DPassword:' + response['password_vendor'] + '', '_blank');
				location.replace('<?= base_url('paket/tambah_transaksi_langsung') ?>');
			},
		})
	}
</script>

<!-- RINCIAN HPS PDF -->
<script>
	function message(icon, text) {
		swal({
			title: "success!!!",
			text: text,
			icon: icon,
		});
	}
	var tbl_rincian_hps_via_pdf = $('#tbl_rincian_hps_via_pdf');
	var rincian_hps = $('#rincian_hps').val();
	$(document).ready(function() {
		tbl_rincian_hps_via_pdf.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"info": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url('paket/data_get_rincian_hps_pdf/') ?>" + rincian_hps,
				"type": "POST"
			},
			"columnDefs": [{
				"target": [-1],
				"orderable": false
			}],
			"oLanguage": {
				"sSearch": "Pencarian : ",
				"sEmptyTable": "Belum Ada File Rincian Hps",
				"sLoadingRecords": "Silahkan Tunggu - loading...",
				"sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
				"sZeroRecords": "Belum Ada File Rincian Hps",
				"sProcessing": "Memuat Data...."
			}
		});
	});

	function message_warning_total_hps(icon, text) {
		swal({
			title: "Maaf!!!",
			text: text,
			icon: icon,
		});
	}

	function reload_tbl_rincian_hps_via_pdf() {
		tbl_rincian_hps_via_pdf.DataTable().ajax.reload();
	}
	var form_file_rincian_hps_pdf = $('#form_file_rincian_hps_pdf');
	form_file_rincian_hps_pdf.on('submit', function(e) {
		e.preventDefault();
		var rincian_hps = $('#rincian_hps').val();
		if ($('.file_rincian_hps_pdf').val() == '') {
			$('#error_file').show();
			setTimeout(function() {
				$('#error_file').hide();
			}, 4000);
		} else if ($('#total_rincian_hps_pdf').val() == '') {
			message_warning_total_hps('warning', 'Harap isi Total Hps Yaa!!!')
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>paket/add_rincian_hps_pdf/" + rincian_hps,
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



	function byidRincianHps_pdf(id, type) {
		if (type == 'hapus_rincian_hps_pdf') {
			saveData = 'hapus_rincian_hps_pdf';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('paket/byidRincianHps_pdf/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'hapus_rincian_hps_pdf') {
					Question_delete_hapus_rincian_hps_pdf(response['get_rincian_hps_pdf'].id_rincian_hps_pdf, response['get_rincian_hps_pdf'].nama_rincian_hps_pdf);
				}
			}
		})
	}




	// HAPUS DATA 
	function Question_delete_hapus_rincian_hps_pdf(id_rincian_hps_pdf, nama_rincian_hps_pdf) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Dokumen " + nama_rincian_hps_pdf + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					hapus_rincian_hps_pdf(id_rincian_hps_pdf);
				} else {
					message('success', 'Dokumen Tidak Jadi Di Hapus, Dokumen Aman!!')
				}
			});
	}

	function hapus_rincian_hps_pdf(id_rincian_hps_pdf) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('paket/hapus_rincian_hps_pdf/') ?>" + id_rincian_hps_pdf,
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					reload_tbl_rincian_hps_via_pdf();
					message('success', 'Dokumen Berhasil Di Delete');
				}
			}
		})
	}

	$(document).ready(function() {
		function sudah_di_kirim_hpsnya() {
			var rincian_hps = $('#rincian_hps').val();
			$.ajax({
				type: "post",
				url: "<?= base_url() ?>paket/hps_pdf_sudah_di_buat/" + rincian_hps,
				data: {},
				dataType: "json",
				success: function(response) {
						// if (response['sudah_dibuat_hps'] == null) {
					// 	$("#sudah_di_buat_hps_pdf").show();
					// 	$("#sudah_di_buat_hps_mamual").show();
					// 	$("#sudah_di_buat_hps_pdf_form").show();
					// } else {
					// 	$("#sudah_di_buat_hps_pdf_form").hide();
					// 	$("#sudah_di_buat_hps_mamual").hide();
					// }
				}
			});

		}
		setInterval(() => {
			sudah_di_kirim_hpsnya()
		}, 1000);
	});

	function progress_bar_process_manual(percentage, timer) {
		$('.progress-bar').css('width', percentage + '%');
		if (percentage > 100) {
			clearInterval(timer);
			$('#form_file_rincian_hps_pdf')[0].reset();
			$('#process_manual').css('display', 'none');
			$('#sedang_dikirim_manual').show();
			$('.progress-bar').css('width', percentage + '%');
			$('#upload_manual').attr('disabled', false);
			message('success', 'Dokumen Berhasil Di Upload');
			reload_tbl_rincian_hps_via_pdf();
		}
	}
</script>

<script>
	$("#total_rincian_hps_pdf").keyup(function() {
		var harga = $("#total_rincian_hps_pdf").val();
		var tanpa_rupiah = document.getElementById('tanpa_rupiah_pdf');
		tanpa_rupiah.value = formatRupiah(this.value, 'Rp. ');
		/* Fungsi */
		function formatRupiah(angka, prefix) {
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
				split = number_string.split(','),
				sisa = split[0].length % 3,
				rupiah = split[0].substr(0, sisa),
				ribuan = split[0].substr(sisa).match(/\d{3}/gi);

			if (ribuan) {
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}

			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
	});
</script>

<!-- pindahalaman -->
<script>
	function byid_paket_transaksi_berlangsung(id, type) {
		if (type == 'lihat_transaksi_langsung') {
			saveData = 'lihat_transaksi_langsung';
		}
		if (type == 'lihat_paket_penetapan_biasa') {
			saveData = 'lihat_paket_penetapan_biasa';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('paket/byid_paket_transaksi_berlangsung/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'lihat_transaksi_langsung') {
					location.replace('<?= base_url('paket/lihat_transaksi_langsung_berjalan/') ?>' + response['get_paket'].id_paket);
				}
				if (type == 'lihat_paket_penetapan_biasa') {
					location.replace('<?= base_url('penetapanlangsung/informasipaket/') ?>' + response['get_paket'].id_paket);
				}
			}
		})
	}
</script>

<script>
	var modal_alasan_batal = $('#modal_alasan_batal')
	function byid_paket_tender_biasa_berlangsung(id, type) {
		if (type == 'lihat_paket_tender_biasa') {
			saveData = 'lihat_paket_tender_biasa';
		}
		if (type == 'lihat_alasan_batal') {
			saveData = 'lihat_alasan_batal';
		}
		if (type == 'lihat_tahap_tender') {
			saveData = 'lihat_tahap_tender';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('paket/byid_paket_transaksi_berlangsung/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'lihat_paket_tender_biasa') {
					location.replace('<?= base_url('panitiajmtm/beranda/informasitender/') ?>' + response['get_paket'].id_paket);
				}
				if (type == 'lihat_alasan_batal') {
					$('#nm_paket').text(response['get_paket'].nama_paket)
					$('#alasan_batal').text(response['get_paket'].alasan_tender_pengulanagan)
					$('#alasan_tender_batal_ku').text(response['get_paket'].alasan_tender_batal)

					modal_alasan_batal.modal('show')
				}
				// 18 oktober 2022
				if (type == 'lihat_tahap_tender') {
					var modal_lihat_tahap = $('#modal_lihat_tahap');
					var table_tahap_tender_saat_ini = $('#table_tahap_tender_saat_ini');
					$(document).ready(function() {
						table_tahap_tender_saat_ini.DataTable({
							"responsive": true,
							"autoWidth": false,
							"processing": true,
							"serverSide": true,
							"bDestroy": true,
							"order": [],
							"ajax": {
								"url": "<?= base_url('panitiajmtm/beranda/lihat_tahap_tender_di_beranda/') ?>" + response['get_paket'].id_paket,
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
								"sProcessing": "Memuat Data....",

							}
						});
					});
					modal_lihat_tahap.modal('show');
				}
			}
		})
	}
</script>

<script>
	function byid_paket_penunjukan_berlangsung(id, type) {
		if (type == 'lihat_penunjukan_langsung') {
			saveData = 'lihat_penunjukan_langsung';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('paket/byid_paket_penunjukan_berlangsung/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'lihat_penunjukan_langsung') {
					location.replace('<?= base_url('paket/lihat_penunjukan_langsung_berjalan/') ?>' + response['get_paket'].id_paket);
				}
			}
		})
	}
</script>

<!-- INI UNTUK CHAT NEGOSIASI  Transaksi Langsung-->
<script>
	$(document).ready(function() {
		$('#klik_file').click(function() {
			$('#file').toggle();
		});
	})
	$(document).ready(function() {
		$('#action_menu_btn').click(function() {
			$('.action_menu').toggle();
		}); // ini Untuk Menu Pengaturan
		pesan()

		function pesan() {
			var id_penerima = '<?= $data2['id_mengikuti_vendor'] ?>';
			var id_paket = $('#id_paket').val();
			var id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
			$.ajax({
				type: "post",
				url: "<?= base_url() ?>paket/ngeload_chat_transaksi_langsung/" + id_paket,
				data: {
					id_pengirim: id_pengirim,
					id_penerima: id_penerima,
				},
				dataType: "json",
				success: function(r) {
					var html = "";
					var d = r.data;
					id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
					d.forEach(d => {

						var today = new Date();
						var dd = String(today.getDate()).padStart(2, '0');
						var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
						var yyyy = today.getFullYear();

						today = dd + '-' + mm + '-' + yyyy;
						// console.log(today);

						var times = new Date(d.waktu)
						var time = times.toLocaleTimeString()
						var tanggal = String(times.getDate()).padStart(2, '0');
						var bulan = String(times.getMonth() + 1).padStart(2, '0');
						var tahun = times.getFullYear()
						var lengkapDB = tanggal + '-' + bulan + '-' + tahun
						// console.log(lengkapDB == today)
						var kapan = "Today"
						var tanggal_bulan = tanggal + "-" + bulan
						if (lengkapDB != today) {
							kapan = tanggal_bulan
						}
						// console.log(kapan)
						if (parseInt(d.id_pengirim) == id_pengirim) {
							if (d.dokumen_chat == null) {
								html += '<div class="d-flex justify-content-end mb-4">' +
									'<div class="msg_cotainer_send">' +
									'' + d.isi + '' +
									'<span class="msg_time">' + kapan + ',' + time + '</span>' +
									'</div>' +
									'</div>';
							} else if (d.dokumen_chat) {
								html += '<div class="d-flex justify-content-end mb-4">' +
									'<div class="msg_cotainer_send">' +
									// '<img width="100px" src="<?= base_url('file_chat/') ?>' + d.img_chat + '">' +
									'<a  class="text-primary" href="<?= base_url('/file_chat/') ?>' + d.dokumen_chat + '">' + d.dokumen_chat + '</a>' +
									'<br>' + d.isi + '' +
									'<span class="msg_time">' + kapan + ',' + time + '</span>' +
									'</div>' +
									'</div>';

							} else if (d.img_chat) {
								html += '<div class="d-flex justify-content-end mb-4">' +
									'<div class="msg_cotainer_send">' +
									'<img width="100px" src="<?= base_url('file_chat/') ?>' + d.img_chat + '">' +
									// '<a  class="text-primary" href="<?= base_url('/file_chat/') ?>' + d.dokumen_chat + '">' + d.dokumen_chat + '</a>' +
									'<br>' + d.isi + '' +
									'<span class="msg_time">' + kapan + ',' + time + '</span>' +
									'</div>' +
									'</div>';

							} else {
								html += '<div class="d-flex justify-content-end mb-4">' +
									'<div class="msg_cotainer_send">' +
									'' + d.isi + '' +
									'<span class="msg_time">' + kapan + ',' + time + '</span>' +
									'</div>' +
									'</div>';
							}
						} else if (parseInt(d.id_penerima) == id_penerima) {
							if (d.dokumen_chat == null) {
								html += `<label class="badge badge-primary ml-5" >${d.username_vendor}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/servant.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                     </div>`;
							} else {
								html += `<label class="badge badge-primary ml-5" >${d.username_vendor}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/servant.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                        <a href="<?= base_url('base') ?>"> ${d.dokumen_chat}</a>
                        <br>
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                     </div>`;
							}
						} else {
							if (d.dokumen_chat == null) {
								html += `<label class="badge badge-danger ml-5" >${d.username_vendor}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div> </div>`;
							} else if (d.dokumen_chat) {
								html += `<label class="badge badge-danger ml-5" >${d.username_vendor}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                        <a href="https://vms.jmtm.co.id/file_chat/${d.dokumen_chat}"> ${d.dokumen_chat}</a> <br>
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                      
                     </div>`;
							} else if (d.img_chat) {
								html += `<label class="badge badge-danger ml-5" >${d.username_vendor}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
								<img width="100px" src="https://vms.jmtm.co.id/file_chat/${d.img_chat}"> <br>
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                      
                     </div>`;
							} else {
								html += `<label class="badge badge-danger ml-5" >${d.username_vendor}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                      
                     </div>`;
							}
						}
						// notifikasis
					});
					// console.log(html)
					$('#letakpesan').html(html);

				}
			});

		}

		function notif() {
			var id_penerima = '<?= $data2['id_mengikuti_vendor'] ?>';
			var id_paket = $('#id_paket').val();
			var id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
			$.ajax({
				type: "post",
				url: "<?= base_url() ?>paket/ngeload_notif_transaksi_langsung/" + id_paket,
				data: {
					id_pengirim: id_pengirim,
					id_penerima: id_penerima,
				},
				dataType: "json",
				success: function(r) {
					var n = r.data;
					$("#notifikasi").html(n);
				}
			});

		}
		setInterval(() => {
			pesan()
			notif()
		}, 1000);
		var form_kirim_chat_transaksi_langsung = $('#form_kirim_chat_transaksi_langsung');
		$('#form_kirim_chat_transaksi_langsung').on('submit', function(e) {
			e.preventDefault();
			var isi = $('.type_msg').val();
			var id_paket = $('#id_paket').val();
			if (isi != "") {
				$.ajax({
					type: "post",
					url: "<?= base_url() ?>paket/kirim_pesan_transaksi_langsung/" + id_paket,
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					success: function(r) {
						form_kirim_chat_transaksi_langsung[0].reset();
						if (r.status) {
							$('.search_btn').trigger('click');
							$('.type_msg').val('');
							scrollToBottom()
						}

					}
				});
			}


		});
		scrollToBottom()

		function scrollToBottom() {
			$("#letakpesan").animate({
				scrollTop: 200000000000000000000
			}, "slow");
		}


		pesan()
		$('.search_btn').click(function(e) {
			pesan()
		});
		orang()

		function orang() {
			var id_penerima = '<?= $data2['id_mengikuti_vendor'] ?>';
			var id_paket = $('#id_paket').val();
			$.ajax({
				type: "post",
				url: "<?= base_url() ?>paket/GetAllVendor_transaksi_langsung/" + id_paket + '/' + id_penerima,
				dataType: "json",
				success: function(response) {
					var html = '';
					var x = 0;
					var i;
					for (i = 0; i < response['vendor'].length; i++) {

						html +=
							'<li class="active-angga coba" data-id="' + response['vendor'][i].id_mengikuti_vendor + '">' +
							'<div class="d-flex bd-highlight ">' +
							'<div class="img_cont ">' +
							'<img src="<?= base_url('assets/img/servant.png') ?>" alt="" class="rounded-circle user_img_msg">' +
							'<span class="online_icon " ></span>' +
							'</div>' +
							'<div class="user_info">' +
							'<span class="">' + response['vendor'][i].username_vendor + '</a>' + '</span>' +
							'<p class="">' + response['vendor'][i].username_vendor + ' is online</p>' +
							'</div>' +
							'</div>' +
							'</li>';
					}
					$('#yangAktif').html(html);
				}
			});
		}

		// $('#sudahdibaca').on('click', function() {
		// 	var id_paket = $('#id_paket').val();
		// 	var id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
		// 	$.ajax({
		// 		type: "post",
		// 		url: "<?= base_url() ?>panitiajmtm/beranda/sudah_dibaca2/" + id_paket,
		// 		data: {
		// 			id_pengirim: id_pengirim,
		// 		},
		// 		dataType: "json",
		// 		success: function(data) {
		// 			window.location.replace("<?= base_url() ?>panitiajmtm/beranda/pertanyaantender/" + id_paket);

		// 		}
		// 	});
		// });
	});
</script>

<!-- INI UNTUK CHAT NEGOSIASI  Transaksi Langsung-->
<script>
	$(document).ready(function() {
		$('#klik_file').click(function() {
			$('#file').toggle();
		});
	})
	$(document).ready(function() {
		$('#action_menu_btn').click(function() {
			$('.action_menu').toggle();
		}); // ini Untuk Menu Pengaturan
		pesan()

		function pesan() {
			var id_penerima = '<?= $data2['id_mengikuti_vendor'] ?>';
			var id_paket = $('#id_paket').val();
			var id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
			$.ajax({
				type: "post",
				url: "<?= base_url() ?>penetapanlangsung/ngeload_chat_transaksi_langsung/" + id_paket,
				data: {
					id_pengirim: id_pengirim,
					id_penerima: id_penerima,
				},
				dataType: "json",
				success: function(r) {
					var html = "";
					var d = r.data;
					id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
					d.forEach(d => {

						var today = new Date();
						var dd = String(today.getDate()).padStart(2, '0');
						var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
						var yyyy = today.getFullYear();

						today = dd + '-' + mm + '-' + yyyy;
						// console.log(today);

						var times = new Date(d.waktu)
						var time = times.toLocaleTimeString()
						var tanggal = String(times.getDate()).padStart(2, '0');
						var bulan = String(times.getMonth() + 1).padStart(2, '0');
						var tahun = times.getFullYear()
						var lengkapDB = tanggal + '-' + bulan + '-' + tahun
						// console.log(lengkapDB == today)
						var kapan = "Today"
						var tanggal_bulan = tanggal + "-" + bulan
						if (lengkapDB != today) {
							kapan = tanggal_bulan
						}
						// console.log(kapan)
						if (parseInt(d.id_pengirim) == id_pengirim) {
							if (d.dokumen_chat == null) {
								html += '<div class="d-flex justify-content-end mb-4">' +
									'<div class="msg_cotainer_send">' +
									'' + d.isi + '' +
									'<span class="msg_time">' + kapan + ',' + time + '</span>' +
									'</div>' +
									'</div>';
							} else if (d.dokumen_chat) {
								html += '<div class="d-flex justify-content-end mb-4">' +
									'<div class="msg_cotainer_send">' +
									// '<img width="100px" src="<?= base_url('file_chat/') ?>' + d.img_chat + '">' +
									'<a  class="text-primary" href="<?= base_url('/file_chat/') ?>' + d.dokumen_chat + '">' + d.dokumen_chat + '</a>' +
									'<br>' + d.isi + '' +
									'<span class="msg_time">' + kapan + ',' + time + '</span>' +
									'</div>' +
									'</div>';

							} else if (d.img_chat) {
								html += '<div class="d-flex justify-content-end mb-4">' +
									'<div class="msg_cotainer_send">' +
									'<img width="100px" src="<?= base_url('file_chat/') ?>' + d.img_chat + '">' +
									// '<a  class="text-primary" href="<?= base_url('/file_chat/') ?>' + d.dokumen_chat + '">' + d.dokumen_chat + '</a>' +
									'<br>' + d.isi + '' +
									'<span class="msg_time">' + kapan + ',' + time + '</span>' +
									'</div>' +
									'</div>';

							} else {
								html += '<div class="d-flex justify-content-end mb-4">' +
									'<div class="msg_cotainer_send">' +
									'' + d.isi + '' +
									'<span class="msg_time">' + kapan + ',' + time + '</span>' +
									'</div>' +
									'</div>';
							}
						} else if (parseInt(d.id_penerima) == id_penerima) {
							if (d.dokumen_chat == null) {
								html += `<label class="badge badge-primary ml-5" >Agency</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/servant.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time} </span>
                        </div>
                     </div>`;
							} else {
								html += `<label class="badge badge-primary ml-5" >Agency</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/servant.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                        <a href="<?= base_url('base') ?>"> ${d.dokumen_chat}</a>
                        <br>
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                     </div>`;
							}
						} else {
							if (d.dokumen_chat == null) {
								html += `<label class="badge badge-danger ml-5" >${d.username_vendor}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div> </div>`;
							} else if (d.dokumen_chat) {
								html += `<label class="badge badge-danger ml-5" >${d.username_vendor}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                        <a href="https://vms.jmtm.co.id/file_chat/${d.dokumen_chat}"> ${d.dokumen_chat}</a> <br>
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                      
                     </div>`;
							} else if (d.img_chat) {
								html += `<label class="badge badge-danger ml-5" >${d.username_vendor}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
								<img width="100px" src="https://vms.jmtm.co.id/file_chat/${d.img_chat}"> <br>
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                      
                     </div>`;
							} else {
								html += `<label class="badge badge-danger ml-5" >${d.username_vendor}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}</span>
                        </div>
                      
                     </div>`;
							}
						}
						// notifikasis
					});
					// console.log(html)
					$('#letakpesan').html(html);

				}
			});

		}

		function notif() {
			var id_penerima = '<?= $data2['id_mengikuti_vendor'] ?>';
			var id_paket = $('#id_paket').val();
			var id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
			$.ajax({
				type: "post",
				url: "<?= base_url() ?>penetapanlangsung/ngeload_notif_transaksi_langsung/" + id_paket,
				data: {
					id_pengirim: id_pengirim,
					id_penerima: id_penerima,
				},
				dataType: "json",
				success: function(r) {
					var n = r.data;
					$("#notifikasi").html(n);
				}
			});

		}
		setInterval(() => {
			pesan()
			notif()
		}, 1000);
		var form_kirim_chat_penetapan_langsung = $('#form_kirim_chat_penetapan_langsung');
		$('#form_kirim_chat_penetapan_langsung').on('submit', function(e) {
			e.preventDefault();
			var isi = $('.type_msg').val();
			var id_paket = $('#id_paket').val();
			if (isi != "") {
				$.ajax({
					type: "post",
					url: "<?= base_url() ?>penetapanlangsung/kirim_pesan_transaksi_langsung/" + id_paket,
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					success: function(r) {
						form_kirim_chat_penetapan_langsung[0].reset();
						if (r.status) {
							$('.search_btn').trigger('click');
							$('.type_msg').val('');
							scrollToBottom()
						}

					}
				});
			}


		});
		scrollToBottom()

		function scrollToBottom() {
			$("#letakpesan").animate({
				scrollTop: 200000000000000000000
			}, "slow");
		}


		pesan()
		$('.search_btn').click(function(e) {
			pesan()
		});
		orang()

		function orang() {
			var id_penerima = '<?= $data2['id_mengikuti_vendor'] ?>';
			var id_paket = $('#id_paket').val();
			$.ajax({
				type: "post",
				url: "<?= base_url() ?>paket/GetAllVendor_transaksi_langsung/" + id_paket + '/' + id_penerima,
				dataType: "json",
				success: function(response) {
					var html = '';
					var x = 0;
					var i;
					for (i = 0; i < response['vendor'].length; i++) {

						html +=
							'<li class="active-angga coba" data-id="' + response['vendor'][i].id_mengikuti_vendor + '">' +
							'<div class="d-flex bd-highlight ">' +
							'<div class="img_cont ">' +
							'<img src="<?= base_url('assets/img/servant.png') ?>" alt="" class="rounded-circle user_img_msg">' +
							'<span class="online_icon " ></span>' +
							'</div>' +
							'<div class="user_info">' +
							'<span class="">' + response['vendor'][i].username_vendor + '</a>' + '</span>' +
							'<p class="">' + response['vendor'][i].username_vendor + ' is online</p>' +
							'</div>' +
							'</div>' +
							'</li>';
					}
					$('#yangAktif').html(html);
				}
			});
		}

		// $('#sudahdibaca').on('click', function() {
		// 	var id_paket = $('#id_paket').val();
		// 	var id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
		// 	$.ajax({
		// 		type: "post",
		// 		url: "<?= base_url() ?>panitiajmtm/beranda/sudah_dibaca2/" + id_paket,
		// 		data: {
		// 			id_pengirim: id_pengirim,
		// 		},
		// 		dataType: "json",
		// 		success: function(data) {
		// 			window.location.replace("<?= base_url() ?>panitiajmtm/beranda/pertanyaantender/" + id_paket);

		// 		}
		// 	});
		// });
	});
</script>
<!-- INI UNTUK DOWNLOAD BA NEGOSIASI DARI VENDOR -->
<script>
	var tbl_bukti_negosiasi_vendor2 = $('#tbl_bukti_negosiasi_vendor2');
	var id_paketku = $('#id_paketku').val();
	$(document).ready(function() {
		tbl_bukti_negosiasi_vendor2.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"info": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url('paket/getdatatbl_bukti_negosiasi_transaksi_langsung_vendor/') ?>" + id_paketku,
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

<!-- Dokumen Penunjnag Untuk Manager Penunjukan Langsung -->
<script>
	var table_dokumen_penunjang = $('#table_dokumen_penunjang');
	var reusable = $('#reusable').val();
	$(document).ready(function() {
		table_dokumen_penunjang.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"info": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url('panitiajmtm/daftarpaket/getdatatable_dokumen_penunjang/') ?>" + reusable,
				"type": "POST"
			},
			"columnDefs": [{
				"target": [-1],
				"orderable": false
			}],
			"oLanguage": {
				"sSearch": "Pencarian : ",
				"sEmptyTable": "Belum Ada File Dokumen Penunjang",
				"sLoadingRecords": "Silahkan Tunggu - loading...",
				"sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
				"sZeroRecords": "Belum Ada File Dokumen Penunjang",
				"sProcessing": "Memuat Data...."
			}
		});
	});
</script>

<script>
	function message(icon, text) {
		swal({
			title: "success!!!",
			text: text,
			icon: icon,
		});
	}

	$("#harga_negosiasi_ku").keyup(function() {
		var harga = $('#harga_negosiasi_ku').val();
		var tanpa_rupiah = document.getElementById('tanpa-rupiah20');
		tanpa_rupiah.value = formatRupiah(this.value, 'Rp. ');
		/* Fungsi */
		function formatRupiah(angka, prefix) {
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
				split = number_string.split(','),
				sisa = split[0].length % 3,
				rupiah = split[0].substr(0, sisa),
				ribuan = split[0].substr(sisa).match(/\d{3}/gi);

			if (ribuan) {
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}

			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
	});

	var form_hasil_negosisasi_sepakat = $('#form_hasil_negosisasi_sepakat');

	function simpan_negosiassi_harga() {
		$.ajax({
			method: "POST",
			url: '<?= base_url('penetapanlangsung/kirim_harga_negosiasi_kesepakatan') ?>',
			data: form_hasil_negosisasi_sepakat.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Kesepakatan Negosiasi Berhasil Di Simpan');
					location.reload();
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}
</script>

<!-- Validasi Angka Ajah -->
<script>
	function message509(icon, text) {
		swal({
			title: "Hanya Angka !!!",
			text: text,
			icon: icon,
		});
	}
	document.getElementById("vol_rincian_hps").onkeyup = function() {
		var validasiHuruf = /^[a-zA-Z ]+ $ /;
		var validasisimbol = /[^0-9]/;
		var vol_rincian_hps = $('#vol_rincian_hps').val();
		if (vol_rincian_hps.match(validasiHuruf)) {
			$('#vol_rincian_hps').css('border-color', 'red');
			message509('warning', 'Isi Dengan Angka!!');
			$('#vol_rincian_hps').val('');
		} else if (vol_rincian_hps.match(validasisimbol)) {
			$('#vol_rincian_hps').css('border-color', 'red');
			message509('warning', 'Isi Dengan Angka!!');
			$('#vol_rincian_hps').val('');
		} else {
			$('#vol_rincian_hps').css('border-color', 'green');
			$('#vol_rincian_hps').val(vol_rincian_hps);

		}

	};
	document.getElementById("harga_rincian_hps2").onkeyup = function() {
		var validasiHuruf = /^[a-zA-Z ]+ $ /;
		var validasisimbol = /[^0-9]/;
		var harga_rincian_hps2 = $('#harga_rincian_hps2').val();
		if (harga_rincian_hps2.match(validasiHuruf)) {
			$('#harga_rincian_hps2').css('border-color', 'red');
			$('#harga_rincian_hps2').val('');
			message509('warning', 'Isi Dengan Angka!!');
		} else if (harga_rincian_hps2.match(validasisimbol)) {
			$('#harga_rincian_hps2').css('border-color', 'red');
			$('#harga_rincian_hps2').val('');
			message509('warning', 'Isi Dengan Angka!!');
		} else {
			$('#harga_rincian_hps2').css('border-color', 'green');
			$('#harga_rincian_hps2').val(harga_rincian_hps2);

		}

	};

	document.getElementById("persen_rincian_hps").onkeyup = function() {
		var validasiHuruf = /^[a-zA-Z ]+ $ /;
		var validasisimbol = /[^0-9]/;
		var persen_rincian_hps = $('#persen_rincian_hps').val();
		if (persen_rincian_hps.match(validasiHuruf)) {
			$('#persen_rincian_hps').css('border-color', 'red');
			$('#persen_rincian_hps').val('');
			message509('warning', 'Isi Dengan Angka!!');
		} else if (persen_rincian_hps.match(validasisimbol)) {
			$('#persen_rincian_hps').css('border-color', 'red');
			$('#persen_rincian_hps').val('');
			message509('warning', 'Isi Dengan Angka!!');
		} else {
			$('#persen_rincian_hps').css('border-color', 'green');
			$('#persen_rincian_hps').val(persen_rincian_hps);

		}

	};
</script>

<!-- PENUNJUKAN LANGSUNG -->
<script>
	var saveData;
	var btnsave = $('#btnSave');
	var serverside_beranda_paket_penunjukan = $('#serverside_beranda_paket_penunjukan');
	$(document).ready(function() {
		serverside_beranda_paket_penunjukan.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"info": false,
			// "searching": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url('paket/getdata_paket_tertender_penunjukan_langsung') ?>",
				"type": "POST",

			},
			"columnDefs": [{
				"target": [-1],
				"orderable": true
			}],
			"oLanguage": {
				"sSearch": "Pencarian : ",
				"sEmptyTable": "Data Tidak Tersedia",
				"sLoadingRecords": "Silahkan Tunggu - loading...",
				"sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
				"sZeroRecords": "Maaf Belum Ada Data",
				"sProcessing": "Memuat Data...."
			}
		});

	});
</script>

<!-- serverside_beranda_paket_penetapan -->
<script>
	var saveData;
	var btnsave = $('#btnSave');
	var serverside_beranda_paket_penetapan = $('#serverside_beranda_paket_penetapan');
	$(document).ready(function() {
		serverside_beranda_paket_penetapan.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"info": false,
			// "searching": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url('paket/getdata_paket_tertender_penetapan_langsung_beranda') ?>",
				"type": "POST",

			},
			"columnDefs": [{
				"target": [-1],
				"orderable": true
			}],
			"oLanguage": {
				"sSearch": "Pencarian : ",
				"sEmptyTable": "Data Tidak Tersedia",
				"sLoadingRecords": "Silahkan Tunggu - loading...",
				"sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
				"sZeroRecords": "Maaf Belum Ada Data Transaksi Langsung",
				"sProcessing": "Memuat Data...."
			}
		});

	});
</script>
<script>
	function message801(icon, text) {
		swal({
			title: "Hanya Angka !!!",
			text: text,
			icon: icon,
		});
	}
	document.getElementById("total_rincian_hps_pdf").onkeyup = function() {
		var validasiHuruf = /^[a-zA-Z ]+ $ /;
		var validasisimbol = /[^0-9]/;
		var total_rincian_hps_pdf = $('#total_rincian_hps_pdf').val();
		if (total_rincian_hps_pdf.match(validasiHuruf)) {
			$('#total_rincian_hps_pdf').css('border-color', 'red');
			$('#total_rincian_hps_pdf').val('');
			message801('warning', 'Isi Dengan Angka!!');
		} else if (total_rincian_hps_pdf.match(validasisimbol)) {
			$('#total_rincian_hps_pdf').css('border-color', 'red');
			$('#total_rincian_hps_pdf').val('');
			message801('warning', 'Isi Dengan Angka!!');
		} else {
			$('#total_rincian_hps_pdf').css('border-color', 'green');
			$('#total_rincian_hps_pdf').val(total_rincian_hps_pdf);
		}

	};
</script>
<!-- validasi huruf aja -->



<!-- pemilihan langsung/tender terbatas -->
<script>
	var saveData;
	var btnsave = $('#btnSave');
	var serverside_beranda_paket_pemilihanlangsung = $('#serverside_beranda_paket_pemilihanlangsung');
	$(document).ready(function() {
		serverside_beranda_paket_pemilihanlangsung.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"info": false,
			// "searching": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url('paket/getdata_paket_pemilihan_langsung') ?>",
				"type": "POST",

			},
			"columnDefs": [{
				"target": [-1],
				"orderable": true
			}],
			"oLanguage": {
				"sSearch": "Pencarian : ",
				"sEmptyTable": "Data Tidak Tersedia",
				"sLoadingRecords": "Silahkan Tunggu - loading...",
				"sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
				"sZeroRecords": "Maaf Belum Ada Data",
				"sProcessing": "Memuat Data...."
			}
		});

	});
</script>