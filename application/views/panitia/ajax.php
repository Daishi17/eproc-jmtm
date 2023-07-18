<script>
	$(function() {
		//Initialize Select2 Elements
		$('.select2').select2()

		//Initialize Select2 Elements
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})
	})

	var saveData;
	var table_panitia = $('#table_panitia');
	var table_anggota = $('#table_anggota');
	var tbl_tambah_anggota = $('#tbl_tambah_anggota');
	var tbl_tambah_anggota2 = $('#tbl_tambah_anggota2');
	var tbl_tambah_panitia = $('#tbl_tambah_panitia');
	var modalDetail = $('#modaldetail');
	var modalTitle = $('#modaltitle');
	var formEditRole = $('#formEditRole');

	$(document).ready(function() {
		$('#anggota').show();
		$('#formpemilik').hide();

		$('.tambah_pemilik').on('click', function() {
			$('#anggota').hide();
			$('#formpemilik').show();
		})
	})

	function kembali5() {
		var x = document.getElementById("formpemilik");
		if (x.style.display === "none") {
			$("#anggota").show();
			x.style.display = "block";
		} else {
			$("#anggota").hide();
			$("#anggota").show();
			x.style.display = "none";
		}
	}

	$(document).ready(function() {
		tbl_tambah_panitia.DataTable();
	})

	$(document).ready(function() {
		tbl_tambah_anggota.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('panitia/get_anggota_baru') ?>",
				"type": "POST"
			},
			"oLanguage": {
				"sSearch": "Pencarian : ",
				"sEmptyTable": "Data Tidak Tersedia",
				"sLoadingRecords": "Silahkan Tunggu - loading...",
				"sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
				"sZeroRecords": "Tidak Ada Data Unit Kerja Yang Di Cari",
				"sProcessing": "Memuat Data...."
			},
			"columnDefs": [{
					"targets": [0], //first column
					"orderable": false, //set not orderable
				},
				{
					"targets": [-1], //last column
					"orderable": false, //set not orderable
				},

			]
		});
	})

	$(document).ready(function() {
		tbl_tambah_anggota2.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('panitia/get_anggota_baru') ?>",
				"type": "POST"
			},
			"oLanguage": {
				"sSearch": "Pencarian : ",
				"sEmptyTable": "Data Tidak Tersedia",
				"sLoadingRecords": "Silahkan Tunggu - loading...",
				"sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
				"sZeroRecords": "Tidak Ada Data Unit Kerja Yang Di Cari",
				"sProcessing": "Memuat Data...."
			},
			"columnDefs": [{
					"targets": [0], //first column
					"orderable": false, //set not orderable
				},
				{
					"targets": [-1], //last column
					"orderable": false, //set not orderable
				},

			]
		});
	})



	//ini table menampilkan semua panitia
	$(document).ready(function() {
		table_panitia.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('panitia/get_panitia') ?>",
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


	//ini table menampilkan anggota sesuai panitianya
	$(document).ready(function() {
		var id_panitia = $('#id_anggota_panitia').val();
		table_anggota.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('panitia/get_anggota/') ?>" + id_panitia,
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
	})

	//ini ngeload table panitia
	function relodTable() {
		table_panitia.DataTable().ajax.reload();
	}

	//ini ngeload table anggota
	function relodTable2() {
		table_anggota.DataTable().ajax.reload();
	}

	//function sweetalert
	function messageSwal(icon, text) {
		swal({
			title: "Success!!!",
			text: text,
			icon: icon
		})
	}

	function warning_ketua(icon, text) {
		swal({
			title: "Maaf!!!",
			text: text,
			icon: icon
		})
	}


	//function ngeget by id panitia
	function byid(id, type) {
		if (type == 'edit') {
			saveData = 'edit';
		}
		if (type == 'hapus') {
			saveData = 'hapus';
		}
		if (type == 'detail') {
			saveData = 'detail';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('panitia/get_by_id/') ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'edit') {
					location.replace('<?= base_url('panitia/show/') ?>' + response['get_panitia'].id_panitia)
				}
				if (type == 'hapus') {
					deleteQuestion2(response['get_panitia'].id_panitia, response['get_panitia'].nama_panitia)
				}
			}
		})
	}

	var modalRole = $('#modalRole')
	//function ngeget table anggota panitia didalam detail panitia
	function byidanggota(id, type) {
		if (type == 'hapusanggota') {
			saveData = 'hapusanggota';
		}
		if (type == 'edit_role') {
			saveData = 'edit_role';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('panitia/get_by_id/') ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'hapusanggota') {
					deleteQuestion(response['get_anggota'].id_detail_panitia, response['get_anggota'].nama_pegawai)
					relodTable2()
				}
				if (type == 'edit_role') {
					modalRole.modal('show');
					$('[name="id_detail_panitia"]').val(response['get_anggota'].id_detail_panitia)
					$('[name="username"]').val(response['get_anggota'].username)
					$('[name="nama_pegawai"]').val(response['get_anggota'].nama_pegawai)
					$('[name="id_role_panitia"]').val(response['get_anggota'].id_role_panitia)
				} else {
					$(".id_role_validasi-error").html(response.id_role_panitia);
				}
			}
		})
	}


	//ngedit role panitia
	function editRole() {
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitia/editRole_byid'); ?>',
			data: formEditRole.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					modalRole.modal('hide');
					relodTable2();
					messageSwal('success', 'Data Berhasil Di Edit');
				} else {
					warning_ketua('warning', 'Role Ketua Atau Sekertaris Sudah Ada !!!');
				}
			},
			error: function() {
				modalRole.modal('hide');
				messageSwal('success', 'Data Berhasil Di Edit');
				relodTable2();
			}
		})
	}

	//tambah anggota
	var formTambahAnggota = $('#formTambahAnggota');

	function tambahanggota() {
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitia/tambah_anggota') ?>',
			dataType: "JSON",
			data: formTambahAnggota.serialize(),
			success: function(response) {
				if (response == 'success') {
					relodTable();
					relodTable2();
					$('#anggota').show();
					$('#formpemilik').hide();
					messageSwal('success', 'Data Berhasil Di Tambah');
					location.reload();
				}
			}
		})
	}

	//delete question table panitia
	function deleteQuestion2(id_panitia, nama_panitia) {
		swal({
				title: "Apakah Anda Yakin!?",
				text: "Ingin Menghapus Data " + nama_panitia + " ? ",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deletePanitia(id_panitia);
				} else {
					messageSwal('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			})
	}

	//delete panitianya
	function deletePanitia(id) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('panitia/deletepanitia/') ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (response == 'berhasil') {
					relodTable();
					messageSwal('success', 'Data Berhasil Di Hapus')
				}
			}
		})
	}

	//delete question anggota panitianya
	function deleteQuestion(id_detail_panitia, nama_pegawai) {
		swal({
				title: "Apakah Anda Yakin!?",
				text: "Ingin Menghapus Data " + nama_pegawai + " ? ",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteData(id_detail_panitia);
				} else {
					messageSwal('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			})
	}

	//delete anggota panitianya
	function deleteData(id) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('panitia/hapus_anggota/') ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (response == 'berhasil') {
					relodTable2();
					messageSwal('success', 'Data Berhasil Di Hapus')
				}
			}
		})
	}
</script>


<script>
	$(document).ready(function() {
		$('#provinsi').change(function() {
			var id_provinsi = $('#provinsi').val();
			$.ajax({
				type: 'GET',
				url: '<?= base_url('wilayah/dataKabupaten') ?>/' + id_provinsi,
				success: function(html) {
					$('#kabupaten').html(html);
				}
			});
		})
	})


	//edit
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

	// test 
	function update_role_anggota() {
		var id_titi = $('#id_detailnya').val();
		$.ajax({
			type: "GET",
			url: "<?= base_url('panitia/get_by_id/'); ?>" + id_titi,
			dataType: "JSON",
			success: function(response) {
				saveeditpanitia();
			},
			error: function() {
				console.log(error);
			}
		})
	}
</script>
<script>
	function ambilvalue() {
		var x = document.getElementById("id_role_panitia4").value;
		$('#bijipeler').val(x);
	}
</script>
