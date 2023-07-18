<script>
	var serverside = $('#serverside');
	var serverside2 = $('#serverside2');
	var serverside3 = $('#serverside3');
	var serverside4 = $('#serverside4');
	var saveData;
	var modalDetail = $('#modalDetail');
	var modalBan = $('#modalBan');
	var modalTitle = $('#modalTitle');
	var modalTitle2 = $('#modalTitle2');
	var modalTitle3 = $('#modalTitle3');
	var btnSave = $('#btnSave');
	var formData = $('#formData');

	$(document).ready(function() {
		$('#myLogAkses').DataTable();
	})

	$.fn.dataTable.ext.errMode = 'none';

	$(document).ready(function() {
		serverside.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor/get_vendor') ?>",
				"type": "POST"
			},
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
		serverside.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		serverside2.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor/get_vendor_aktif') ?>",
				"type": "POST"
			},
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

	function relodTable2() {
		serverside2.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		serverside3.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor/get_vendor_blacklist') ?>",
				"type": "POST"
			},
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

	function relodTable3() {
		serverside3.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		serverside4.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor/get_vendor_perorangan') ?>",
				"type": "POST"
			},
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

	function relodTable4() {
		serverside4.DataTable().ajax.reload();
	}

	function byid(id, type) {
		if (type == 'approve_vendor') {
			saveData = 'approve_vendor';
		}
		if (type == 'tolak_vendor') {
			saveData = 'tolak_vendor';
		}
		if (type == 'detail_vendor') {
			saveData = 'detail_vendor';
		}
		if (type == 'sbu') {
			saveData = 'sbu'
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('vendor/get_by_id/') ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'approve_vendor') {
					approveQuestion(response['get_vendor'].id_vendor, response['get_vendor'].username_vendor)
					relodTable();
					relodTable3();
				}
				if (type == 'tolak_vendor') {
					tolakQuestion(response['get_vendor'].id_vendor, response['get_vendor'].username_vendor)
					relodTable();
					relodTable3();
				}
				if (type == 'detail_vendor') {
					// modalTitle.text('Detail Vendor')
					// modalTitle3.text('Detail Vendor')
					// $('#username_vendor').html(response['get_vendor']['username_vendor']);
					// $('#npwp_usaha').html(response['get_vendor']['npwp_usaha']);
					// $('#alamat_usaha').html(response['get_vendor']['alamat_usaha']);
					// $('#bentuk_usaha').html(response['get_vendor']['bentuk_usaha']);
					// $('#tanggal_mendaftar').html(response['get_vendor']['tanggal_mendaftar']);
					// $('#tanggal_diterima').html(response['get_vendor']['tanggal_diterima']);
					// $('#email_vendor').html(response['get_vendor']['email_vendor']);
					// $('#kode_pos_usaha').html(response['get_vendor']['kode_pos_usaha']);
					// $('#provinsi').html(response['get_vendor']['nama_provinsi']);
					// $('#kabupaten').html(response['get_vendor']['nama_kabupaten']);
					// modalDetail.modal('show');
					location.replace('<?= base_url('vendor/detail/') ?>' + response['get_panitia'].id_panitia)
				}
				if (type == 'daftar_hitam') {
					modalTitle2.text('Alasan Daftar Hitam');
					$('#username_vendor2').html(response['get_vendor']['username_vendor']);
					$('#bentuk_usaha2').html(response['get_vendor']['bentuk_usaha']);
					$('#nama_usaha2').html(response['get_vendor']['nama_usaha']);
					$('#nib').html(response['get_vendor']['nib']);
					$('#id_vendor').val(response['get_vendor']['id_vendor']);
					modalBan.modal('show');
				}
				// new update
				if (type == 'sbu') {
					$('#modalsbu').modal('show')
					$('#nm_vendor').text('SBU ' + response['get_vendor'].nama_usaha)
					$(document).ready(function() {
						$('#table_sbu').DataTable({
							"responsive": true,
							"autoWidth": false,
							"processing": true,
							"serverSide": true,
							"bDestroy": true,
							"order": [],
							"ajax": {
								"url": "<?= base_url('vendor/data_get_sbu/') ?>" + response['get_vendor'].id_vendor,
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
					});
				}
			}
		})
	}


	function tolakQuestion(id_vendor, username_vendor) {
		swal({
				title: "Apakah Anda Yakin!?",
				text: "Ingin Menolak Vendor " + username_vendor + " ? ",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					menolak_vendor(id_vendor);
				}
			})
	}

	function menolak_vendor(id) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('vendor/menolak_vendor/') ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (response == 'berhasil') {
					relodTable();
					messageSwal('success', 'Vendor Berhasil Di Tolak')
				}
			}
		})
	}

	function byidDaftarHitam(id, type) {
		if (type == 'approve_vendor') {
			saveData = 'approve_vendor';
		}
		if (type == 'tolak_vendor') {
			saveData = 'tolak_vendor';
		}
		if (type == 'detail_vendor') {
			saveData = 'detail_vendor';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('vendor/get_by_id/') ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'approve_vendor') {
					approveQuestion(response['get_vendor'].id_vendor, response['get_vendor'].username_vendor)
					relodTable();
				}
				if (type == 'detail_vendor') {
					modalTitle.text('Detail Vendor')
					modalTitle3.text('Detail Vendor')
					$('#username_vendor').html(response['get_vendor']['username_vendor']);
					$('#npwp_usaha').html(response['get_vendor']['npwp_usaha']);
					$('#alamat_usaha').html(response['get_vendor']['alamat_usaha']);
					$('#bentuk_usaha').html(response['get_vendor']['bentuk_usaha']);
					$('#tanggal_mendaftar').html(response['get_vendor']['tanggal_mendaftar']);
					$('#tanggal_diterima').html(response['get_vendor']['tanggal_diterima']);
					$('#email_vendor').html(response['get_vendor']['email_vendor']);
					$('#kode_pos_usaha').html(response['get_vendor']['kode_pos_usaha']);
					$('#provinsi').html(response['get_vendor']['nama_provinsi']);
					$('#kabupaten').html(response['get_vendor']['nama_kabupaten']);
					$('#masa_berlaku_daftar_hitam').html(response['get_vendor']['masa_berlaku_daftar_hitam']);
					$('#alasan_daftar_hitam').html(response['get_vendor']['alasan_daftar_hitam']);
					modalDetail.modal('show');
				}
				if (type == 'daftar_hitam') {
					modalTitle2.text('Alasan Daftar Hitam');
					$('#username_vendor2').html(response['get_vendor']['username_vendor']);
					$('#bentuk_usaha2').html(response['get_vendor']['bentuk_usaha']);
					$('#nama_usaha2').html(response['get_vendor']['nama_usaha']);
					$('#nib').html(response['get_vendor']['nib']);
					$('#id_vendor').val(response['get_vendor']['id_vendor']);
					modalBan.modal('show');
				}
			}
		})
	}

	function save() {
		url = "<?= base_url('vendor/ban_vendor'); ?>"
		$.ajax({
			method: "POST",
			url: url,
			data: formData.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					modalBan.modal('hide');
					relodTable2();
					relodTable3();
					messageSwal('success', 'Vendor Berhasil Di Blacklist!')
				} else {
					$(".alasan-daftar-hitam-error ").html(response.alasan_daftar_hitam);
					$(".masa-berlaku-daftar-hitam-error").html(response.masa_berlaku_daftar_hitam);
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}

	function approveQuestion(id_vendor, username_vendor) {
		swal({
				title: "Apakah Anda Yakin!?",
				text: "Ingin Menerima Vendor " + username_vendor + " ? ",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					approve_vendor(id_vendor);
				}
			})
	}


	function approve_vendor(id) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('vendor/approve_vendor/') ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (response == 'berhasil') {
					relodTable();
					relodTable3();
					messageSwal('success', 'Vendor Di Terima')
				}
			}
		})
	}

	function messageSwal(icon, text) {
		swal({
			title: "Success!!!",
			text: text,
			icon: icon
		})
	}
</script>

<script>
	$('#select-all').click(function(event) {
		if (this.checked) {
			// Iterate each checkbox
			$(':checkbox').each(function() {
				this.checked = true;
			});
		} else {
			$(':checkbox').each(function() {
				this.checked = false;
			});
		}
	});
</script>
<script>
	$('#select-all2').click(function(event) {
		if (this.checked) {
			// Iterate each checkbox
			$(':checkbox').each(function() {
				this.checked = true;
			});
		} else {
			$(':checkbox').each(function() {
				this.checked = false;
			});
		}
	});
</script>

<script>
	$('#gridCheck1').click(function(event) {
		if (this.checked) {
			$('#gridCheck1').val(1)
		} else {
			$('#gridCheck1').val(0)
		}
	})

	$('#gridCheck2').click(function(event) {
		if (this.checked) {
			$('#gridCheck2').val(1)
		} else {
			$('#gridCheck2').val(0)
		}
	})
	$('#gridCheck3').click(function(event) {
		if (this.checked) {
			$('#gridCheck3').val(1)
		} else {
			$('#gridCheck3').val(0)
		}
	})
	$('#gridCheck4').click(function(event) {
		if (this.checked) {
			$('#gridCheck4').val(1)
		} else {
			$('#gridCheck4').val(0)
		}
	})
	$('#gridCheck5').click(function(event) {
		if (this.checked) {
			$('#gridCheck5').val(1)
		} else {
			$('#gridCheck5').val(0)
		}
	})
	$('#gridCheck6').click(function(event) {
		if (this.checked) {
			$('#gridCheck6').val(1)
		} else {
			$('#gridCheck6').val(0)
		}
	})
	$('#gridCheck7').click(function(event) {
		if (this.checked) {
			$('#gridCheck7').val(1)
		} else {
			$('#gridCheck7').val(0)
		}
	})
	$('#gridCheck8').click(function(event) {
		if (this.checked) {
			$('#gridCheck8').val(1)
		} else {
			$('#gridCheck8').val(0)
		}
	})
	$('#gridCheck9').click(function(event) {
		if (this.checked) {
			$('#gridCheck9').val(1)
		} else {
			$('#gridCheck1').val(0)
		}
	})
	$('#gridCheck10').click(function(event) {
		if (this.checked) {
			$('#gridCheck10').val(1)
		} else {
			$('#gridCheck10').val(0)
		}
	})
	$('#gridCheck11').click(function(event) {
		if (this.checked) {
			$('#gridCheck11').val(1)
		} else {
			$('#gridCheck11').val(0)
		}
	})
	$('#gridCheck12').click(function(event) {
		if (this.checked) {
			$('#gridCheck12').val(1)
		} else {
			$('#gridCheck12').val(0)
		}
	})
	$('#gridCheck13').click(function(event) {
		if (this.checked) {
			$('#gridCheck13').val(1)
		} else {
			$('#gridCheck13').val(0)
		}
	})
	$('#gridCheck14').click(function(event) {
		if (this.checked) {
			$('#gridCheck14').val(1)
		} else {
			$('#gridCheck14').val(0)
		}
	})
	$('#gridCheck15').click(function(event) {
		if ($('#gridCheck15').checked) {
			$('#gridCheck15').val(1)
		} else {
			$('#gridCheck15').val(0)
		}
	})
	$('#gridCheck16').click(function(event) {
		if (this.checked) {
			$('#gridCheck16').val(1)
		} else {
			$('#gridCheck16').val(0)
		}
	})
	$('#gridCheck17').click(function(event) {
		if (this.checked) {
			$('#gridCheck17').val(1)
		} else {
			$('#gridCheck17').val(0)
		}
	})
	$('#gridCheck18').click(function(event) {
		if (this.checked) {
			$('#gridCheck18').val(1)
		} else {
			$('#gridCheck18').val(0)
		}
	})
	$('#gridCheck19').click(function(event) {
		if (this.checked) {
			$('#gridCheck19').val(1)
		} else {
			$('#gridCheck19').val(0)
		}
	})
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







	// new update
	$(document).ready(function() {
		var tbl_kontraktor = $('#tbl_kontraktor');
		dataTable_kontraktor();

		function dataTable_kontraktor(filter_sbu = '', kualifikasi_usaha_sbu = '') {
			$(document).ready(function() {
				tbl_kontraktor.DataTable({
					"responsive": true,
					"autoWidth": false,
					"processing": true,
					"serverSide": true,
					"order": [],
					"ajax": {
						"url": "<?= base_url('vendor/get_vendor_kontraktor') ?>",
						"type": "POST",
						data: {
							id_sbu: filter_sbu,
							kualifikasi_usaha_sbu: kualifikasi_usaha_sbu,
						}
					},
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
		}

		$('#filter3').click(function() {
			var filter_sbu = $('[name="filter_sbu"]').val();
			var kualifikasi_usaha_sbu = $('[name="kualifikasi_usaha_sbu"]').val()
			if (filter_sbu, kualifikasi_usaha_sbu) {
				$('#tbl_kontraktor').DataTable().destroy();
				dataTable_kontraktor(filter_sbu, kualifikasi_usaha_sbu);
			} else {
				// alert('select Bosth Filter option');
				$('#tbl_kontraktor').DataTable().destroy();
				dataTable_kontraktor();
			}
		})
	});


	function relodTableSbu() {
		tbl_kontraktor.DataTable().ajax.reload();
	}

	var tbl_nonkontraktor = $('#tbl_nonkontraktor');
	$(document).ready(function() {
		tbl_nonkontraktor.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor/get_vendor_nonkontraktor') ?>",
				"type": "POST"
			},
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
	// end new update

	// table blacklist
	function relodTable3() {
		serverside3.DataTable().ajax.reload();
	}
	var form_tambah_DF = $('#form_tambah_DF')

	form_tambah_DF.on('submit', function(e) {
		e.preventDefault();
		url = "<?= base_url('vendor/tambah_daftar_hitam'); ?>"
		$.ajax({
			url: url,
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(response) {
				if (response == 'success') {
					form_tambah_DF[0].reset();
					messageSwal('success', 'Data Berhasil Di Simpan')
					relodTable3()
					$('#tambah_daftar_hitam').modal('hide')

				}
			}
		});
	});
</script>