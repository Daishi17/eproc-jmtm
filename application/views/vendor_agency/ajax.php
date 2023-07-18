<script>
	var serverside = $('#serverside');
	var serverside2 = $('#serverside2');
	var serverside3 = $('#serverside3');
	var saveData;
	var modalDetail = $('#modalDetail');
	var modalBan = $('#modalBan');
	var modalTitle = $('#modalTitle');
	var modalTitle2 = $('#modalTitle2');
	var modalTitle3 = $('#modalTitle3');
	var btnSave = $('#btnSave');
	var formData = $('#formData');


	$(document).ready(function() {
		serverside.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor_agency/get_vendor') ?>",
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
				"url": "<?= base_url('vendor_agency/get_vendor_aktif') ?>",
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
				"url": "<?= base_url('vendor_agency/get_vendor_blacklist') ?>",
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
		$.ajax({
			type: "GET",
			url: "<?= base_url('vendor_agency/get_by_id/') ?>" + id,
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
			url: "<?= base_url('vendor_agency/get_by_id/') ?>" + id,
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
		url = "<?= base_url('vendor_agency/ban_vendor'); ?>"
		$.ajax({
			method: "POST",
			url: url,
			data: formData.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					modalBan.modal('hide');
					relodTable2();
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
			url: "<?= base_url('vendor_agency/approve_vendor/') ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (response == 'berhasil') {
					relodTable();
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
