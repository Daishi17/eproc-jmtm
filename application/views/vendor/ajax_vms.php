<script>
	$(function() {
		//Initialize Select2 Elements
		$('.select2').select2()

		//Initialize Select2 Elements
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})
	})
	//datatable
	$(document).ready(function() {
		$('#myTableIjinUsaha').DataTable();
		$('#myTablePemilik').DataTable();
		$('#myTableTenagaAhli').DataTable();
		$('#myTablePengurus').DataTable();
		$('#myTablePeralatan').DataTable();
		$('#myTablePengalaman').DataTable();
		$('#myTablePajak').DataTable();
	});

	//function ijin usaha
	$(document).ready(function() {
		$('.ijin-usaha').on('click', function() {
			$('#ijinusaha').show();
			$('#formijinusaha').hide();
		})

		$('.tambah_ijinusaha').on('click', function() {
			$('#ijinusaha').hide();
			$('#formijinusaha').show();
		})
	})
	//function kembali ke table ijin usaha
	function kembali6() {
		var x = document.getElementById("formijinusaha");
		if (x.style.display === "none") {
			$("#ijinusaha").show();
			x.style.display = "block";
		} else {
			$("#ijinusaha").hide();
			$("#ijinusaha").show();
			x.style.display = "none";
		}
	}

	//function pemilik
	$(document).ready(function() {
		$('.pemilik').on('click', function() {
			$('#pemilik').show();
			$('#formpemilik').hide();
		})

		$('.tambah_pemilik').on('click', function() {
			$('#pemilik').hide();
			$('#formpemilik').show();
		})
	})
	//function kembali ke table pemilik
	function kembali5() {
		var x = document.getElementById("formpemilik");
		if (x.style.display === "none") {
			$("#pemilik").show();
			x.style.display = "block";
		} else {
			$("#pemilik").hide();
			$("#pemilik").show();
			x.style.display = "none";
		}
	}

	//function pengurus
	$(document).ready(function() {
		$('.pengurus').on('click', function() {
			$('#pengurus').show();
			$('#formpengurus').hide();
		})

		$('.tambah_pengurus').on('click', function() {
			$('#pengurus').hide();
			$('#formpengurus').show();
		})
	})
	//function kembali ke table pengurus
	function kembali7() {
		var x = document.getElementById("formpengurus");
		if (x.style.display === "none") {
			$("#pengurus").show();
			x.style.display = "block";
		} else {
			$("#pengurus").hide();
			$("#pengurus").show();
			x.style.display = "none";
		}
	}


	//function tambah tenaga ahli
	$(document).ready(function() {
		$('.tenaga-ahli').on('click', function() {
			$('#tenagaAhli').show();
			$('#formTenagaAhli').hide();
		})

		$('.tambah_tenaga-ahli').on('click', function() {
			$('#tenagaAhli').hide();
			$('#formTenagaAhli').show();
		})
	})
	//function kembali ke table untuk tenaga ahli
	function kembali() {
		var x = document.getElementById("formTenagaAhli");
		if (x.style.display === "none") {
			$("#tenagaAhli").show();
			x.style.display = "block";
		} else {
			$("#formTenagaAhli").hide();
			$("#tenagaAhli").show();
			x.style.display = "none";
		}
	}

	//function tambah peralatan
	$(document).ready(function() {
		$('.peralatan').on('click', function() {
			$('#peralatan').show();
			$('#formPeralatan').hide();
		})

		$('.tambah_peralatan').on('click', function() {
			$('#peralatan').hide();
			$('#formPeralatan').show();
		})
	})

	//function kembali ke table peralatan
	function kembali2() {
		var x = document.getElementById("formPeralatan");
		if (x.style.display === "none") {
			$("#peralatan").show();
			x.style.display = "block";
		} else {
			$("#formPeralatan").hide();
			$("#peralatan").show();
			x.style.display = "none";
		}
	}

	//function tambah pengalaman
	$(document).ready(function() {
		$('.pengalaman').on('click', function() {
			$('#pengalaman').show();
			$('#formPengalaman').hide();
		})

		$('.tambah_pengalaman').on('click', function() {
			$('#pengalaman').hide();
			$('#formPengalaman').show();
		})
	})

	//function kembali ke table peralatan
	function kembali3() {
		var x = document.getElementById("formPengalaman");
		if (x.style.display === "none") {
			$("#pengalaman").show();
			x.style.display = "block";
		} else {
			$("#formPengalaman").hide();
			$("#pengalaman").show();
			x.style.display = "none";
		}
	}

	//function tambah pajak
	$(document).ready(function() {
		$('.pajak').on('click', function() {
			$('#pajak').show();
			$('#formPajak').hide();
		})

		$('.tambah_pajak').on('click', function() {
			$('#pajak').hide();
			$('#formPajak').show();
		})
	})

	//function kembali ke table peralatan
	function kembali4() {
		var x = document.getElementById("formPajak");
		if (x.style.display === "none") {
			$("#pajak").show();
			x.style.display = "block";
		} else {
			$("#formPajak").hide();
			$("#pajak").show();
			x.style.display = "none";
		}
	}
</script>


<script>
	function message(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}
	var form_identitas_perusahaan = $('#form_identitas_perusahaan');
	var btnsave = $('#btnSave');
	// sav Ijin Usaha
	function save_identitas() {
		$.ajax({
			method: "POST",
			url: "<?= base_url('vendor/add'); ?>",
			data: form_identitas_perusahaan.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Data Berhasil Di Simpan');
				} else {
					// $(".nama-unit-kerja-error").html(response.nama_unit_kerja);
					// $(".kode-unit-kerja-error").html(response.kode_unit_kerja);
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}
	// save ijin Usaha
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
</script>

<script>
	var dattable_izin_usaha = $('#dattable_izin_usaha');
	var modalData_tambah_izin = $('#modalData_tambah_izin');
	var modalIzinUsahaSesuai = $('#modalIzinUsahaSesuai');
	var modalIzinUsahaTidakSesuai = $('#modalIzinUsahaTidakSesuai');
	var form_approve_izin_usaha_sesuai = $('#form_approve_izin_usaha_sesuai');
	var form_approve_izin_usaha_tidak_sesuai = $('#form_approve_izin_usaha_tidak_sesuai');
	var id_vendor_reusable = $('#id_vendor_reusable').val();

	function reloddattable_izin_usaha() {
		dattable_izin_usaha.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		dattable_izin_usaha.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor/data_get_ijin_usaha/') ?>" + id_vendor_reusable,
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
				"sZeroRecords": "Tidak Ada DataYang Di Cari",
			},
		});

	});

	function message(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}

	form_approve_izin_usaha_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#izin_usaha_file').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_izin_usaha",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					modalIzinUsahaSesuai.modal('hide');
					form_approve_izin_usaha_sesuai[0].reset();
					reloddattable_izin_usaha();
					message('success', 'Data Berhasil Di Validasi')
				}
			});
		}
	});
	// edit kak
	form_approve_izin_usaha_tidak_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#izin_usaha_file2').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_izin_usaha2",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					modalIzinUsahaTidakSesuai.modal('hide');
					form_approve_izin_usaha_tidak_sesuai[0].reset();
					reloddattable_izin_usaha();
					message('success', 'Data Berhasil Di Validasi')
				}
			});
		}
	});

	// GET BY ID
	function byid_id_izin_usaha(id, type) {
		if (type == 'edit_id_izin_usaha') {
			saveData = 'edit_id_izin_usaha';

		}
		if (type == 'hapus_id_izin_usaha') {
			saveData = 'hapus_id_izin_usaha';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('vendor/get_byid_id_izin_usaha/'); ?>" + id,
			success: function(response) {
				if (type == 'edit_id_izin_usaha') {
					$('[name="id_izin_usaha"]').val(response['izin_usaha'].id_izin_usaha);
					modalIzinUsahaSesuai.modal('show');
				}
				if (type == 'hapus_id_izin_usaha') {
					$('[name="id_izin_usaha"]').val(response['izin_usaha'].id_izin_usaha);
					modalIzinUsahaTidakSesuai.modal('show');
				}
			}
		})
	}

	// HAPUS DATA
	function deleteQuestionizin(id_izin_usaha, nama_izin_usaha) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nama_izin_usaha + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteIzinUsaha(id_izin_usaha);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deleteIzinUsaha(id_izin_usaha) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('vendor/delete_izin_usaha/') ?>" + id_izin_usaha,
			dataType: "JSON",
			success: function(response) {
				reloddattable_izin_usaha();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}
</script>


<script>
	// ===========INI UNTUK AKTA
	var dattable_akta = $('#dattable_akta');
	var modalIzinAktaSesuai = $('#modalIzinAktaSesuai');
	var modalIzinAktaTidakSesuai = $('#modalIzinAktaTidakSesuai');
	var form_approve_akta_sesuai = $('#form_approve_akta_sesuai');
	var form_approve_akta_tidak_sesuai = $('#form_approve_akta_tidak_sesuai');
	var id_vendor_reusable2 = $('#id_vendor_reusable').val();

	function reloddattable_akta() {
		dattable_akta.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		dattable_akta.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor/data_get_akta/') ?>" + id_vendor_reusable2,
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
				"sZeroRecords": "Tidak Ada DataYang Di Cari",
			},
		});

	});

	function message(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}

	form_approve_akta_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_dokumen_akta_pendirian').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_akta",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					modalIzinAktaSesuai.modal('hide');
					reloddattable_akta();
					message('success', 'Data Berhasil Di Validasi')
				}
			});
		}
	});
	// edit 
	form_approve_akta_tidak_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_dokumen_akta_pendirian2').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_akta2",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					modalIzinAktaTidakSesuai.modal('hide');
					reloddattable_akta();
					message('success', 'Data Berhasil Di Update')
				}
			});
		}
	});

	// GET BY ID
	function byid_akta(id, type) {
		if (type == 'edit_akta') {
			saveData = 'edit_akta';

		}
		if (type == 'hapus_akta') {
			saveData = 'hapus_akta';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('vendor/get_byid_akta/'); ?>" + id,
			success: function(response) {
				if (type == 'edit_akta') {
					$('[name="id_akta_pendirian"]').val(response['akta'].id_akta_pendirian);
					modalIzinAktaSesuai.modal('show');
				}
				if (type == 'hapus_akta') {
					$('[name="id_akta_pendirian"]').val(response['akta'].id_akta_pendirian);
					modalIzinAktaTidakSesuai.modal('show');
				}
			}
		})
	}

	// HAPUS DATA
	function deleteQuestionakta(id_akta_pendirian, no_akta_pendirian) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + no_akta_pendirian + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteakta(id_akta_pendirian);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deleteakta(id_akta_pendirian) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('vendor/delete_akta/') ?>" + id_akta_pendirian,
			dataType: "JSON",
			success: function(response) {
				reloddattable_akta();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}
</script>


<script>
	// ===========INI UNTUK Pemilik
	var dattable_pemilik = $('#dattable_pemilik');
	var modalIzinPemilikSesuai = $('#modalIzinPemilikSesuai');
	var modalIzinPemilikTidakSesuai = $('#modalIzinPemilikTidakSesuai');
	var form_approve_pemilik_sesuai = $('#form_approve_pemilik_sesuai');
	var form_approve_pemilik_tidak_sesuai = $('#form_approve_pemilik_tidak_sesuai');
	var id_vendor_reusable3 = $('#id_vendor_reusable').val();

	function reloddattable_pemilik() {
		dattable_pemilik.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		dattable_pemilik.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor/data_get_pemilik/') ?>" + id_vendor_reusable3,
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
				"sZeroRecords": "Tidak Ada DataYang Di Cari",
			},
		});

	});

	function message(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}

	form_approve_pemilik_sesuai.on('submit', function(e) {
		e.preventDefault();
		$.ajax({
			url: "<?php echo base_url(); ?>vendor/approve_pemilik",
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(data) {
				modalIzinPemilikSesuai.modal('hide');
				form_approve_pemilik_sesuai[0].reset();
				reloddattable_pemilik();
				message('success', 'Data Berhasil Di Validasi')
			}
		});
	});
	// edit 
	form_approve_pemilik_tidak_sesuai.on('submit', function(e) {
		e.preventDefault();
		$.ajax({
			url: "<?php echo base_url(); ?>vendor/approve_pemilik2",
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(data) {
				modalIzinPemilikTidakSesuai.modal('hide');
				form_approve_pemilik_tidak_sesuai[0].reset();
				reloddattable_pemilik();
				message('success', 'Data Berhasil Di Update')
			}
		});
	});

	// GET BY ID
	function byid_pemilik(id, type) {
		if (type == 'edit_pemilik') {
			saveData = 'edit_pemilik';

		}
		if (type == 'hapus_pemilik') {
			saveData = 'hapus_pemilik';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('vendor/get_byid_pemilik/'); ?>" + id,
			success: function(response) {
				if (type == 'edit_pemilik') {
					$('[name="id_pemilik"]').val(response['pemilik'].id_pemilik);
					modalIzinPemilikSesuai.modal('show');
				}
				if (type == 'hapus_pemilik') {
					$('[name="id_pemilik"]').val(response['pemilik'].id_pemilik);
					modalIzinPemilikTidakSesuai.modal('show');
				}
			}
		})
	}

	// HAPUS DATA
	function deleteQuestionpemilik(id_pemilik, nama_pemilik) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nama_pemilik + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deletepemilik(id_pemilik);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deletepemilik(id_pemilik) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('vendor/delete_pemilik/') ?>" + id_pemilik,
			dataType: "JSON",
			success: function(response) {
				reloddattable_pemilik();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}
</script>

<script>
	// ===========INI UNTUK Pengurus
	var dattable_pengurus = $('#dattable_pengurus');
	var modalIzinPengurusSesuai = $('#modalIzinPengurusSesuai');
	var modalIzinPengurusTidakSesuai = $('#modalIzinPengurusTidakSesuai');
	var form_approve_pengurus_sesuai = $('#form_approve_pengurus_sesuai');
	var form_approve_pengurus_tidak_sesuai = $('#form_approve_pengurus_tidak_sesuai');
	var id_vendor_reusable4 = $('#id_vendor_reusable').val();

	function reloddattable_pengurus() {
		dattable_pengurus.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		dattable_pengurus.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor/data_get_pengurus/') ?>" + id_vendor_reusable4,
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
				"sZeroRecords": "Tidak Ada DataYang Di Cari",
			},
		});

	});

	function message(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}

	form_approve_pengurus_sesuai.on('submit', function(e) {
		e.preventDefault();
		$.ajax({
			url: "<?php echo base_url(); ?>vendor/approve_pengurus",
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(data) {
				modalIzinPengurusSesuai.modal('hide');
				form_approve_pengurus_sesuai[0].reset();
				reloddattable_pengurus();
				message('success', 'Data Berhasil Di Validasi')
			}
		});
	});
	// edit 
	form_approve_pengurus_tidak_sesuai.on('submit', function(e) {
		e.preventDefault();
		$.ajax({
			url: "<?php echo base_url(); ?>vendor/approve_pengurus2",
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(data) {
				modalIzinPengurusTidakSesuai.modal('hide');
				form_approve_pengurus_tidak_sesuai[0].reset();
				reloddattable_pengurus();
				message('success', 'Data Berhasil Di Update')
			}
		});
	});

	// GET BY ID
	function byid_pengurus(id, type) {
		if (type == 'edit_pengurus') {
			saveData = 'edit_pengurus';

		}
		if (type == 'hapus_pengurus') {
			saveData = 'hapus_pengurus';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('vendor/get_byid_pengurus/'); ?>" + id,
			success: function(response) {
				if (type == 'edit_pengurus') {
					$('[name="id_pengurus"]').val(response['pengurus'].id_pengurus);
					modalIzinPengurusSesuai.modal('show');
				}
				if (type == 'hapus_pengurus') {
					$('[name="id_pengurus"]').val(response['pengurus'].id_pengurus);
					modalIzinPengurusTidakSesuai.modal('show');
				}
			}
		})
	}

	// HAPUS DATA
	function deleteQuestionpengurus(id_pengurus, nama_pengurus) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nama_pengurus + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deletepengurus(id_pengurus);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deletepengurus(id_pengurus) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('vendor/delete_pengurus/') ?>" + id_pengurus,
			dataType: "JSON",
			success: function(response) {
				reloddattable_pengurus();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}
</script>


<script>
	// ===========INI UNTUK Tenaga Ahli
	var dattable_tenaga_ahli = $('#dattable_tenaga_ahli');
	var modalIzintTenagaAhliSesuai = $('#modalIzintTenagaAhliSesuai');
	var modalIzintTenagaAhliTidakSesuai = $('#modalIzintTenagaAhliTidakSesuai');
	var form_approve_tenaga_ahli_sesuai = $('#form_approve_tenaga_ahli_sesuai');
	var form_approve_tenaga_ahli_tidak_sesuai = $('#form_approve_tenaga_ahli_tidak_sesuai');
	var id_vendor_reusable5 = $('#id_vendor_reusable').val();

	function reloddattable_tenaga_ahli() {
		dattable_tenaga_ahli.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		dattable_tenaga_ahli.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor/data_get_tenaga_ahli/') ?>" + id_vendor_reusable5,
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
				"sZeroRecords": "Tidak Ada DataYang Di Cari",
			},
		});

	});

	function message(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}

	form_approve_tenaga_ahli_sesuai.on('submit', function(e) {
		e.preventDefault();
		$.ajax({
			url: "<?php echo base_url(); ?>vendor/approve_tenaga_ahli",
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(data) {
				modalIzintTenagaAhliSesuai.modal('hide');
				reloddattable_tenaga_ahli();
				message('success', 'Data Berhasil Di Validasi')
			},
		});
	});
	// edit 
	form_approve_tenaga_ahli_tidak_sesuai.on('submit', function(e) {
		e.preventDefault();
		$.ajax({
			url: "<?php echo base_url(); ?>vendor/approve_tenaga_ahli2",
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(data) {
				modalIzintTenagaAhliTidakSesuai.modal('hide');
				reloddattable_tenaga_ahli();
				message('success', 'Data Berhasil Di Update');

			}
		});
	});

	// GET BY ID
	function byid_tenaga_ahli(id, type) {
		if (type == 'edit_tenaga_ahli') {
			saveData = 'edit_tenaga_ahli';

		}
		if (type == 'hapus_tenaga_ahli') {
			saveData = 'hapus_tenaga_ahli';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('vendor/get_byid_tenaga_ahli/'); ?>" + id,
			success: function(response) {
				if (type == 'edit_tenaga_ahli') {
					$('[name="id_tenaga_ahli"]').val(response['tenaga_ahli'].id_tenaga_ahli);
					modalIzintTenagaAhliSesuai.modal('show');
				}
				if (type == 'hapus_tenaga_ahli') {
					$('[name="id_tenaga_ahli"]').val(response['tenaga_ahli'].id_tenaga_ahli);
					modalIzintTenagaAhliTidakSesuai.modal('show');
				}
			}
		})
	}

	// HAPUS DATA
	function deleteQuestiontenaga_ahli(id_tenaga_ahli, nama_tenaga_ahli) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nama_tenaga_ahli + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deletetenaga_ahli(id_tenaga_ahli);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deletetenaga_ahli(id_tenaga_ahli) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('vendor/delete_tenaga_ahli/') ?>" + id_tenaga_ahli,
			dataType: "JSON",
			success: function(response) {
				reloddattable_tenaga_ahli();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}
</script>


<script>
	$(document).ready(function() { // Ketika halaman sudah diload dan siap
		var i = 1;
		$('#add_cv').click(function() {
			i++;
			$('#dynamic_field1').append('<tr id="row' + i + '">' +
				'<td><input type="date" name="tahun_cv[]" class="form-control"></td>' +
				'<td><textarea class="form-control" name="uraian_cv[]"></textarea></td>' +
				'<td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn-sm btn_remove"><i class="fas fa-trash-alt"></i></button></td>' +
				'</tr>');
		});
		$(document).on('click', '.btn_remove', function() {
			var button_id = $(this).attr("id");
			$('#row' + button_id + '').remove();
		});

	});
</script>

<!-- // ===========INI CRUD UNTUK CV -->
<script>
	var dattable_cv = $('#dattable_cv');
	var modalcv_add = $('#modalcv_add');
	var modalcv_edit = $('#modalcv_edit');
	var form_cv_add = $('#form_cv_add');
	var form_cv_edit = $('#form_cv_edit');
	// var id_vendor_reusable6 = $('#id_vendor_reusable');

	function reloddattable_cv() {
		dattable_cv.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		var id_tenaga_ahli = $('#tenaga_ahli').val();
		dattable_cv.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor/data_get_cv/') ?>" + id_tenaga_ahli,
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
				"sZeroRecords": "Tidak Ada DataYang Di Cari",
			},
		});

	});

	function message(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}

	form_cv_add.on('submit', function(e) {
		e.preventDefault();
		$.ajax({
			url: "<?php echo base_url(); ?>vendor/add_cv",
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(response) {
				modalcv_add.modal('hide');
				form_cv_add[0].reset();
				reloddattable_cv();
				message('success', 'Data Berhasil Di Validasi')
			},
		});
	});
	// edit 
	form_cv_edit.on('submit', function(e) {
		e.preventDefault();
		$.ajax({
			url: "<?php echo base_url(); ?>vendor/edit_cv",
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(data) {
				modalcv_edit.modal('hide');
				form_cv_edit[0].reset();
				reloddattable_cv();
				message('success', 'Data Berhasil Di Update')
			}
		});
	});

	// GET BY ID
	function byid_cv(id, type) {
		if (type == 'edit_cv') {
			saveData = 'edit_cv';

		}
		if (type == 'hapus_cv') {
			saveData = 'hapus_cv';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('vendor/get_byid_cv/'); ?>" + id,
			data: form_cv_edit.serialize(),
			success: function(response) {
				if (type == 'edit_cv') {
					$('[name="id_cv"]').val(response['cv'].id_cv);
					$('[name="uraian_cv"]').val(response['cv'].uraian_cv);
					$('[name="tahun_cv"]').val(response['cv'].tahun_cv);
					modalcv_edit.modal('show');
				}
				if (type == 'hapus_cv') {
					deleteQuestioncv(response['cv'].id_cv, response['cv'].uraian_cv);
				}
			}
		})
	}

	// HAPUS DATA
	function deleteQuestioncv(id_cv, uraian_cv) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + uraian_cv + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deletecv(id_cv);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deletecv(id_cv) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('vendor/delete_cv/') ?>" + id_cv,
			dataType: "JSON",
			success: function(response) {
				reloddattable_cv();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}
</script>

<!-- // ===========INI CRUD UNTUK SERTIFIKAT -->
<script>
	var dattable_sertifikat = $('#dattable_sertifikat');
	var modalsertifikat_add = $('#modalsertifikat_add');
	var modalsertifikat_edit = $('#modalsertifikat_edit');
	var form_sertifikat_add = $('#form_sertifikat_add');
	var form_sertifikat_edit = $('#form_sertifikat_edit');

	function reloddattable_sertifikat() {
		dattable_sertifikat.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		var id_tenaga_ahli = $('#tenaga_ahli').val();
		dattable_sertifikat.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor/data_get_sertifikat/') ?>" + id_tenaga_ahli,
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
				"sZeroRecords": "Tidak Ada DataYang Di Cari",
			},
		});

	});

	function message(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}

	form_sertifikat_add.on('submit', function(e) {
		e.preventDefault();
		$.ajax({
			url: "<?php echo base_url(); ?>vendor/add_sertifikat",
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(response) {
				modalsertifikat_add.modal('hide');
				form_sertifikat_add[0].reset();
				reloddattable_sertifikat();
				message('success', 'Data Berhasil Di Validasi')
			},
		});
	});
	// edit 
	form_sertifikat_edit.on('submit', function(e) {
		e.preventDefault();
		$.ajax({
			url: "<?php echo base_url(); ?>vendor/edit_sertifikat",
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(data) {
				modalsertifikat_edit.modal('hide');
				form_sertifikat_edit[0].reset();
				reloddattable_sertifikat();
				message('success', 'Data Berhasil Di Update')
			}
		});
	});

	// GET BY ID
	function byid_sertifikat(id, type) {
		if (type == 'edit_sertifikat') {
			saveData = 'edit_sertifikat';

		}
		if (type == 'hapus_sertifikat') {
			saveData = 'hapus_sertifikat';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('vendor/get_byid_sertifikat/'); ?>" + id,
			data: form_sertifikat_edit.serialize(),
			success: function(response) {
				if (type == 'edit_sertifikat') {
					$('[name="id_sertifikat"]').val(response['sertifikat'].id_sertifikat);
					$('[name="uraian_sertifikat"]').val(response['sertifikat'].uraian_sertifikat);
					$('[name="tahun_sertifikat"]').val(response['sertifikat'].tahun_sertifikat);
					modalsertifikat_edit.modal('show');
				}
				if (type == 'hapus_sertifikat') {
					deleteQuestionsertifikat(response['sertifikat'].id_sertifikat, response['sertifikat'].uraian_sertifikat);
				}
			}
		})
	}

	// HAPUS DATA
	function deleteQuestionsertifikat(id_sertifikat, uraian_sertifikat) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + uraian_sertifikat + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deletesertifikat(id_sertifikat);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deletesertifikat(id_sertifikat) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('vendor/delete_sertifikat/') ?>" + id_sertifikat,
			dataType: "JSON",
			success: function(response) {
				reloddattable_sertifikat();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}
</script>

<!-- // ===========INI CRUD UNTUK PENDIDIKAN -->
<script>
	var dattable_pendidikan = $('#dattable_pendidikan');
	var modalpendidikan_add = $('#modalpendidikan_add');
	var modalpendidikan_edit = $('#modalpendidikan_edit');
	var form_pendidikan_add = $('#form_pendidikan_add');
	var form_pendidikan_edit = $('#form_pendidikan_edit');

	function reloddattable_pendidikan() {
		dattable_pendidikan.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		var id_tenaga_ahli = $('#tenaga_ahli').val();
		dattable_pendidikan.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor/data_get_pendidikan/') ?>" + id_tenaga_ahli,
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
				"sZeroRecords": "Tidak Ada DataYang Di Cari",
			},
		});

	});

	function message(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}

	form_pendidikan_add.on('submit', function(e) {
		e.preventDefault();
		$.ajax({
			url: "<?php echo base_url(); ?>vendor/add_pendidikan",
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(response) {
				modalpendidikan_add.modal('hide');
				form_pendidikan_add[0].reset();
				reloddattable_pendidikan();
				message('success', 'Data Berhasil Di Validasi')
			},
		});
	});
	// edit 
	form_pendidikan_edit.on('submit', function(e) {
		e.preventDefault();
		$.ajax({
			url: "<?php echo base_url(); ?>vendor/edit_pendidikan",
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(data) {
				modalpendidikan_edit.modal('hide');
				form_pendidikan_edit[0].reset();
				reloddattable_pendidikan();
				message('success', 'Data Berhasil Di Update')
			}
		});
	});

	// GET BY ID
	function byid_pendidikan(id, type) {
		if (type == 'edit_pendidikan') {
			saveData = 'edit_pendidikan';

		}
		if (type == 'hapus_pendidikan') {
			saveData = 'hapus_pendidikan';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('vendor/get_byid_pendidikan/'); ?>" + id,
			data: form_pendidikan_edit.serialize(),
			success: function(response) {
				if (type == 'edit_pendidikan') {
					$('[name="id_pendidikan"]').val(response['pendidikan'].id_pendidikan);
					$('[name="uraian_pendidikan"]').val(response['pendidikan'].uraian_pendidikan);
					$('[name="tahun_pendidikan"]').val(response['pendidikan'].tahun_pendidikan);
					modalpendidikan_edit.modal('show');
				}
				if (type == 'hapus_pendidikan') {
					deleteQuestionpendidikan(response['pendidikan'].id_pendidikan, response['pendidikan'].uraian_pendidikan);
				}
			}
		})
	}

	// HAPUS DATA
	function deleteQuestionpendidikan(id_pendidikan, uraian_pendidikan) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + uraian_pendidikan + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deletependidikan(id_pendidikan);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deletependidikan(id_pendidikan) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('vendor/delete_pendidikan/') ?>" + id_pendidikan,
			dataType: "JSON",
			success: function(response) {
				reloddattable_pendidikan();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}
</script>


<!-- // ===========INI CRUD UNTUK BAHASA -->
<script>
	var dattable_bahasa = $('#dattable_bahasa');
	var modalbahasa_add = $('#modalbahasa_add');
	var modalbahasa_edit = $('#modalbahasa_edit');
	var form_bahasa_add = $('#form_bahasa_add');
	var form_bahasa_edit = $('#form_bahasa_edit');

	function reloddattable_bahasa() {
		dattable_bahasa.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		var id_tenaga_ahli = $('#tenaga_ahli').val();
		dattable_bahasa.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor/data_get_bahasa/') ?>" + id_tenaga_ahli,
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
				"sZeroRecords": "Tidak Ada DataYang Di Cari",
			},
		});

	});

	function message(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}

	form_bahasa_add.on('submit', function(e) {
		e.preventDefault();
		$.ajax({
			url: "<?php echo base_url(); ?>vendor/add_bahasa",
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(response) {
				modalbahasa_add.modal('hide');
				form_bahasa_add[0].reset();
				reloddattable_bahasa();
				message('success', 'Data Berhasil Di Validasi')
			},
		});
	});
	// edit 
	form_bahasa_edit.on('submit', function(e) {
		e.preventDefault();
		$.ajax({
			url: "<?php echo base_url(); ?>vendor/edit_bahasa",
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(data) {
				modalbahasa_edit.modal('hide');
				form_bahasa_edit[0].reset();
				reloddattable_bahasa();
				message('success', 'Data Berhasil Di Update')
			}
		});
	});

	// GET BY ID
	function byid_bahasa(id, type) {
		if (type == 'edit_bahasa') {
			saveData = 'edit_bahasa';

		}
		if (type == 'hapus_bahasa') {
			saveData = 'hapus_bahasa';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('vendor/get_byid_bahasa/'); ?>" + id,
			data: form_bahasa_edit.serialize(),
			success: function(response) {
				if (type == 'edit_bahasa') {
					$('[name="id_bahasa"]').val(response['bahasa'].id_bahasa);
					$('[name="uraian_bahasa"]').val(response['bahasa'].uraian_bahasa);
					modalbahasa_edit.modal('show');
				}
				if (type == 'hapus_bahasa') {
					deleteQuestionbahasa(response['bahasa'].id_bahasa, response['bahasa'].uraian_bahasa);
				}
			}
		})
	}

	// HAPUS DATA
	function deleteQuestionbahasa(id_bahasa, uraian_bahasa) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + uraian_bahasa + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deletebahasa(id_bahasa);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deletebahasa(id_bahasa) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('vendor/delete_bahasa/') ?>" + id_bahasa,
			dataType: "JSON",
			success: function(response) {
				reloddattable_bahasa();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}
</script>

<script>
	$(document).ready(function() { // Ketika halaman sudah diload dan siap
		var i = 1;
		$('#add_pendidikan').click(function() {
			i++;
			$('#dynamic_field2').append('<tr id="row2' + i + '">' +
				'<td><input type="date" name="tahun_pendidikan[]" class="form-control"></td>' +
				'<td><textarea class="form-control" name="uraian_pendidikan[]"></textarea></td>' +
				'<td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn-sm btn_remove2"><i class="fas fa-trash-alt"></i></button></td>' +
				'</tr>');
		});
		$(document).on('click', '.btn_remove2', function() {
			var button_id = $(this).attr("id");
			$('#row2' + button_id + '').remove();
		});

	});
</script>

<script>
	$(document).ready(function() { // Ketika halaman sudah diload dan siap
		var i = 1;
		$('#add_sertifikat').click(function() {
			i++;
			$('#dynamic_field3').append('<tr id="row3' + i + '">' +
				'<td><input type="date" name="tahun_sertifikat[]" class="form-control"></td>' +
				'<td><textarea class="form-control" name="uraian_sertifikat[]"></textarea></td>' +
				'<td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn-sm btn_remove3"><i class="fas fa-trash-alt"></i></button></td>' +
				'</tr>');
		});
		$(document).on('click', '.btn_remove3', function() {
			var button_id = $(this).attr("id");
			$('#row3' + button_id + '').remove();
		});

	});
</script>

<script>
	$(document).ready(function() { // Ketika halaman sudah diload dan siap
		var i = 1;
		$('#add_bahasa').click(function() {
			i++;
			$('#dynamic_field4').append('<tr id="row4' + i + '">' +
				'<td><textarea class="form-control" name="uraian_bahasa[]"></textarea></td>' +
				'<td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn-sm btn_remove4"><i class="fas fa-trash-alt"></i></button></td>' +
				'</tr>');
		});
		$(document).on('click', '.btn_remove4', function() {
			var button_id = $(this).attr("id");
			$('#row4' + button_id + '').remove();
		});

	});
</script>

<!-- INI UNTUK PERALATAN -->
<script>
	var dattable_peralatan = $('#dattable_peralatan');
	var modalPeralatanSesuai = $('#modalPeralatanSesuai');
	var modalPeralatanTidakSesuai = $('#modalPeralatanTidakSesuai');
	var form_approve_peralatan_tidak_sesuai = $('#form_approve_peralatan_tidak_sesuai');
	var form_approve_peralatan_sesuai1 = $('#form_approve_peralatan_sesuai1');
	var id_vendor_reusable6 = $('#id_vendor_reusable').val();

	function reloddattable_peralatan() {
		dattable_peralatan.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		dattable_peralatan.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor/data_get_peralatan/') ?>" + id_vendor_reusable6,
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
				"sZeroRecords": "Tidak Ada DataYang Di Cari",
			},
		});

	});

	function message(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}

	form_approve_peralatan_sesuai1.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_bukti_kepemilikan_peralatan1').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_peralatan",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					modalPeralatanSesuai.modal('hide');
					reloddattable_peralatan();
					message('success', 'Data Berhasil Di Validasi')
				}
			});
		}
	});
	// edit 
	form_approve_peralatan_tidak_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_bukti_kepemilikan_peralatan2').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_peralatan2",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					modalPeralatanTidakSesuai.modal('hide');
					reloddattable_peralatan();
					message('success', 'Data Berhasil Di Update')
				}
			});
		}
	});

	// GET BY ID
	function byid_peralatan(id, type) {
		if (type == 'edit_peralatan') {
			saveData = 'edit_peralatan';

		}
		if (type == 'hapus_peralatan') {
			saveData = 'hapus_peralatan';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('vendor/get_byid_peralatan/'); ?>" + id,
			success: function(response) {
				if (type == 'edit_peralatan') {
					$('[name="id_peralatan"]').val(response['peralatan'].id_peralatan);
					modalPeralatanSesuai.modal('show');
				}
				if (type == 'hapus_peralatan') {
					$('[name="id_peralatan"]').val(response['peralatan'].id_peralatan);
					modalPeralatanTidakSesuai.modal('show');
				}
			}
		})
	}

	// HAPUS DATA
	function deleteQuestionperalatan(id_peralatan, nama_peralatan) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nama_peralatan + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteperalatan(id_peralatan);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deleteperalatan(id_peralatan) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('vendor/delete_peralatan/') ?>" + id_peralatan,
			dataType: "JSON",
			success: function(response) {
				reloddattable_peralatan();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}
</script>



<!-- INI UNTUK PENGALAMAN -->
<script>
	var dattable_pengalaman = $('#dattable_pengalaman');
	var modalPengalamanSesuai = $('#modalPengalamanSesuai');
	var modalPengalamanTidakSesuai = $('#modalPengalamanTidakSesuai');
	var form_approve_pengalaman_sesuai = $('#form_approve_pengalaman_sesuai');
	var form_approve_pengalaman_tidak_sesuai = $('#form_approve_pengalaman_tidak_sesuai');
	var id_vendor_reusable8 = $('#id_vendor_reusable').val();

	function reloddattable_pengalaman() {
		dattable_pengalaman.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		dattable_pengalaman.DataTable({
			dom: 'Bfrtip',
			buttons: [{
				extend: 'excel',
				text: 'Export Excel',
				className: 'btn btn-sm btn-success'
			}, {
				extend: 'pageLength',
				className: 'btn btn-sm btn-secondary'
			}],
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor/data_get_pengalaman/') ?>" + id_vendor_reusable8,
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
				"sZeroRecords": "Tidak Ada DataYang Di Cari",
			},

		});

	});

	function message(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}

	form_approve_pengalaman_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#bukti_pengalaman1').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_pengalaman",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					modalPengalamanSesuai.modal('hide');
					reloddattable_pengalaman();
					message('success', 'Data Berhasil Di Validasi')
				}
			});
		}
	});
	// edit 
	form_approve_pengalaman_tidak_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#bukti_pengalaman2').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_pengalaman2",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					modalPengalamanTidakSesuai.modal('hide');
					reloddattable_pengalaman();
					message('success', 'Data Berhasil Di Update')
				}
			});
		}
	});

	// GET BY ID
	function byid_pengalaman(id, type) {
		if (type == 'edit_pengalaman') {
			saveData = 'edit_pengalaman';

		}
		if (type == 'hapus_pengalaman') {
			saveData = 'hapus_pengalaman';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('vendor/get_byid_pengalaman/'); ?>" + id,
			success: function(response) {
				if (type == 'edit_pengalaman') {
					$('[name="id_pengalaman"]').val(response['pengalaman'].id_pengalaman);
					modalPengalamanSesuai.modal('show');
				}
				if (type == 'hapus_pengalaman') {
					$('[name="id_pengalaman"]').val(response['pengalaman'].id_pengalaman);
					modalPengalamanTidakSesuai.modal('show');
				}
			}
		})
	}

	// HAPUS DATA
	function deleteQuestionpengalaman(id_pengalaman, nama_pekerjaan_pengalaman) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nama_pekerjaan_pengalaman + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deletepengalaman(id_pengalaman);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deletepengalaman(id_pengalaman) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('vendor/delete_pengalaman/') ?>" + id_pengalaman,
			dataType: "JSON",
			success: function(response) {
				reloddattable_pengalaman();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}
</script>

<!-- INI UNTUK PAJAK -->
<script>
	var dattable_pajak = $('#dattable_pajak');
	var modalPajakSesuai = $('#modalPajakSesuai');
	var modalPajakTidakSesuai = $('#modalPajakTidakSesuai');
	var form_approve_pajak_sesuai = $('#form_approve_pajak_sesuai');
	var form_approve_pajak_tidak_sesuai = $('#form_approve_pajak_tidak_sesuai');
	var id_vendor_reusable7 = $('#id_vendor_reusable').val();

	function reloddattable_pajak() {
		dattable_pajak.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		dattable_pajak.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor/data_get_pajak/') ?>" + id_vendor_reusable7,
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
				"sZeroRecords": "Tidak Ada DataYang Di Cari",
			},
		});

	});

	function message(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}

	form_approve_pajak_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_bukti_pajak_vendor1').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_pajak",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					modalPajakSesuai.modal('hide');
					reloddattable_pajak();
					message('success', 'Data Berhasil Di Validasi')
				}
			});
		}
	});
	// edit 
	form_approve_pajak_tidak_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_bukti_pajak_vendor2').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_pajak2",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					modalPajakTidakSesuai.modal('hide');
					reloddattable_pajak();
					message('success', 'Data Berhasil Di Update')
				}
			});
		}
	});

	// GET BY ID
	function byid_pajak(id, type) {
		if (type == 'edit_pajak') {
			saveData = 'edit_pajak';

		}
		if (type == 'hapus_pajak') {
			saveData = 'hapus_pajak';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('vendor/get_byid_pajak/'); ?>" + id,
			success: function(response) {
				if (type == 'edit_pajak') {
					$('[name="id_pajak"]').val(response['pajak'].id_pajak);
					modalPajakSesuai.modal('show');
				}
				if (type == 'hapus_pajak') {
					$('[name="id_pajak"]').val(response['pajak'].id_pajak);
					modalPajakTidakSesuai.modal('show');
				}
			}
		})
	}

	// HAPUS DATA
	function deleteQuestionpajak(id_pajak, nama_pajak_vendor) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nama_pajak_vendor + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deletepajak(id_pajak);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deletepajak(id_pajak) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('vendor/delete_pajak/') ?>" + id_pajak,
			dataType: "JSON",
			success: function(response) {
				reloddattable_pajak();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}
</script>

<!-- INI UNTUK KEUANGAN -->
<script>
	var datatable_keuangan = $('#datatable_keuangan');
	var modalNeracaKeuanganSesuai = $('#modalNeracaKeuanganSesuai');
	var modalNeracaKeuanganTidakSesuai = $('#modalNeracaKeuanganTidakSesuai');
	var form_approve_neraca_keuangan_sesuai = $('#form_approve_neraca_keuangan_sesuai');
	var form_approve_neraca_keuangan_tidak_sesuai = $('#form_approve_neraca_keuangan_tidak_sesuai');
	var id_vendor_reusable9 = $('#id_vendor_reusable').val();

	function reloddattable_keuangan() {
		datatable_keuangan.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		datatable_keuangan.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor/data_get_keuangan/') ?>" + id_vendor_reusable9,
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
				"sZeroRecords": "Tidak Ada DataYang Di Cari",
			},
		});
	});

	function message(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}

	form_approve_neraca_keuangan_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_bukti_keuangan_vendor1').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_keuangan",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					modalNeracaKeuanganSesuai.modal('hide');
					reloddattable_keuangan();
					message('success', 'Data Berhasil Di Validasi')
				}
			});
		}
	});
	// edit 
	form_approve_neraca_keuangan_tidak_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_bukti_keuangan_vendor2').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_keuangan2",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					modalNeracaKeuanganTidakSesuai.modal('hide');
					reloddattable_keuangan();
					message('success', 'Data Berhasil Di Update')
				}
			});
		}
	});

	// GET BY ID
	function byid_keuangan(id, type) {
		if (type == 'edit_keuangan') {
			saveData = 'edit_keuangan';

		}
		if (type == 'hapus_keuangan') {
			saveData = 'hapus_keuangan';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('vendor/get_byid_keuangan/'); ?>" + id,
			success: function(response) {
				if (type == 'edit_keuangan') {
					$('[name="id_keuangan"]').val(response['keuangan'].id_keuangan);
					modalNeracaKeuanganSesuai.modal('show');
				}
				if (type == 'hapus_keuangan') {
					$('[name="id_keuangan"]').val(response['keuangan'].id_keuangan);
					modalNeracaKeuanganTidakSesuai.modal('show');
				}
			}
		})
	}

	// HAPUS DATA
	function deleteQuestionkeuangan(id_keuangan, tahun_audit) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + tahun_audit + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deletekeuangan(id_keuangan);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deletekeuangan(id_pajak) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('vendor/delete_keuangan/') ?>" + id_pajak,
			dataType: "JSON",
			success: function(response) {
				reloddattable_keuangan();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}
</script>


<!-- INI UNTUK NIB -->
<script>
	var table_nib = $('#table_nib');
	var modalNibSesuai = $('#modalNibSesuai');
	var modalNibTidakSesuai = $('#modalNibTidakSesuai');
	var form_approve_nib_sesuai = $('#form_approve_nib_sesuai');
	var form_approve_nib_tidak_sesuai = $('#form_approve_nib_tidak_sesuai');
	var id_vendor_reusable10 = $('#id_vendor_reusable').val();

	function reload_table_nib() {
		table_nib.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		table_nib.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor/data_get_nib/') ?>" + id_vendor_reusable10,
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
				"sZeroRecords": "Tidak Ada DataYang Di Cari",
			},
		});
	});

	function hideMasaBerlakuNIB() {
		var checkBox = document.getElementById("nib_seumur_hidup");
		var text = document.getElementById("nib_masa_berlaku");
		if (checkBox.checked == true) {
			text.style.display = "none";
		} else {
			text.style.display = "block";
		}
	}

	function message(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}

	form_approve_nib_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_bukti_nib_vendor1').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_nib",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					modalNibSesuai.modal('hide');
					reload_table_nib();
					message('success', 'Data Berhasil Di Validasi')
				}
			});
		}
	});

	form_approve_nib_tidak_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_bukti_nib_vendor1').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_nib2",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					modalNibTidakSesuai.modal('hide');
					reload_table_nib();
					message('success', 'Data Berhasil Di Validasi')
				}
			});
		}
	});

	// GET BY ID
	function byid_nib(id, type) {
		if (type == 'edit_nib') {
			saveData = 'edit_nib';

		}
		if (type == 'hapus_nib') {
			saveData = 'hapus_nib';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('vendor/get_byid_nib/'); ?>" + id,
			success: function(response) {
				if (type == 'edit_nib') {
					$('[name="id_nib"]').val(response['nib'].id_nib);
					modalNibSesuai.modal('show');
				}
				if (type == 'hapus_nib') {
					$('[name="id_nib"]').val(response['nib'].id_nib);
					modalNibTidakSesuai.modal('show');
				}
			}
		})
	}

	// HAPUS DATA
	function deleteQuestionNib(id_nib, nomor_nib) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nomor_nib + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deletenib(id_nib);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deletenib(id_nib) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('vendor/delete_nib/') ?>" + id_nib,
			dataType: "JSON",
			success: function(response) {
				reload_table_nib();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}

	$('.tanggal_mulai').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-m-Y',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('.tanggal_selesai').val() ? $('.tanggal_selesai').val() : false
			})
		}
	})

	$('.tanggal_selesai').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-m-Y',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('.tanggal_mulai').val() ? $('.tanggal_mulai').val() : false
			})
		}
	})
</script>
<!-- END NIB -->

<!-- INI UNTUK TDP -->
<script>
	var table_tdp = $('#table_tdp');
	var modalTdpSesuai = $('#modalTdpSesuai');
	var modalTdpTidakSesuai = $('#modalTdpTidakSesuai');
	var form_approve_tdp_sesuai = $('#form_approve_tdp_sesuai');
	var form_approve_tdp_tidak_sesuai = $('#form_approve_tdp_tidak_sesuai');
	var id_vendor_reusable11 = $('#id_vendor_reusable').val();
	// var form_pajak_edit = $('#form_pajak_edit');

	function reload_table_tdp() {
		table_tdp.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		table_tdp.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor/data_get_tdp/') ?>" + id_vendor_reusable11,
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

	function hideMasaBerlakuTDP() {
		var checkBox = document.getElementById("tdp_seumur_hidup");
		var text = document.getElementById("tdp_masa_berlaku");
		if (checkBox.checked == true) {
			text.style.display = "none";
		} else {
			text.style.display = "block";
		}
	}

	function message(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}

	form_approve_tdp_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_bukti_tdp_vendor1').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_tdp",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					reload_table_tdp();
					modalTdpSesuai.modal('hide');
					message('success', 'Data Berhasil Di Validasi')
				}
			});
		}
	});

	form_approve_tdp_tidak_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_bukti_tdp_vendor1').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_tdp2",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					reload_table_tdp();
					modalTdpTidakSesuai.modal('hide');
					message('success', 'Data Berhasil Di Validasi')
				}
			});
		}
	});

	// GET BY ID
	function byid_tdp(id, type) {
		if (type == 'edit_nib') {
			saveData = 'edit_nib';
		}
		if (type == 'hapus_tdp') {
			saveData = 'hapus_tdp';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('vendor/get_byid_tdp/'); ?>" + id,
			success: function(response) {
				if (type == 'edit_tdp') {
					$('[name="id_tdp"]').val(response['tdp'].id_tdp);
					modalTdpSesuai.modal('show');
				}
				if (type == 'hapus_tdp') {
					$('[name="id_tdp"]').val(response['tdp'].id_tdp);
					modalTdpTidakSesuai.modal('show');
				}
			}
		})
	}

	// HAPUS DATA
	function deleteQuestionTdp(id_tdp, nomor_nib) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nomor_nib + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteTdp(id_tdp);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deleteTdp(id_tdp) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('vendor/delete_tdp/') ?>" + id_tdp,
			dataType: "JSON",
			success: function(response) {
				reload_table_tdp();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}

	$('.tanggal_mulai').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-m-Y',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('.tanggal_selesai').val() ? $('.tanggal_selesai').val() : false
			})
		}
	})

	$('.tanggal_selesai').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-m-Y',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('.tanggal_mulai').val() ? $('.tanggal_mulai').val() : false
			})
		}
	})
</script>
<!-- END TDP -->

<!-- INI UNTUK SIUP -->
<script>
	var table_siup = $('#table_siup');
	var modalsiupSesuai = $('#modalsiupSesuai');
	var modalsiupTidakSesuai = $('#modalsiupTidakSesuai');
	var form_approve_siup_sesuai = $('#form_approve_siup_sesuai');
	var form_approve_siup_tidak_sesuai = $('#form_approve_siup_tidak_sesuai');
	var id_vendor_reusable12 = $('#id_vendor_reusable').val();
	// var form_pajak_edit = $('#form_pajak_edit');

	function reload_table_siup() {
		table_siup.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		table_siup.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor/data_get_siup/') ?>" + id_vendor_reusable12,
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

	function hideMasaBerlakuSIUP() {
		var checkBox = document.getElementById("siup_seumur_hidup");
		var text = document.getElementById("siup_masa_berlaku");
		if (checkBox.checked == true) {
			text.style.display = "none";
		} else {
			text.style.display = "block";
		}
	}

	function message(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}

	form_approve_siup_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_bukti_siup_vendor1').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_siup",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					reload_table_siup();
					modalsiupSesuai.modal('hide');
					message('success', 'Data Berhasil Di Validasi')
				}
			});
		}
	});

	form_approve_siup_tidak_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_bukti_siup_vendor1').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_siup2",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					reload_table_siup();
					modalsiupTidakSesuai.modal('hide');
					message('success', 'Data Berhasil Di Validasi')
				}
			});
		}
	});

	// GET BY ID
	function byid_siup(id, type) {
		if (type == 'edit_nib') {
			saveData = 'edit_nib';
		}
		if (type == 'hapus_siup') {
			saveData = 'hapus_siup';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('vendor/get_byid_siup/'); ?>" + id,
			success: function(response) {
				if (type == 'edit_siup') {
					$('[name="id_siup"]').val(response['siup'].id_siup);
					modalsiupSesuai.modal('show');
				}
				if (type == 'hapus_siup') {
					$('[name="id_siup"]').val(response['siup'].id_siup);
					modalsiupTidakSesuai.modal('show');
				}
			}
		})
	}

	// HAPUS DATA
	function deleteQuestionSiup(id_siup, nomor_nib) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nomor_nib + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteSiup(id_siup);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deleteSiup(id_siup) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('vendor/delete_siup/') ?>" + id_siup,
			dataType: "JSON",
			success: function(response) {
				reload_table_siup();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}

	$('.tanggal_mulai').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-m-Y',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('.tanggal_selesai').val() ? $('.tanggal_selesai').val() : false
			})
		}
	})

	$('.tanggal_selesai').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-m-Y',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('.tanggal_mulai').val() ? $('.tanggal_mulai').val() : false
			})
		}
	})
</script>
<!-- END SIUP -->

<!-- INI UNTUK NPWP -->
<script>
	var table_npwp = $('#table_npwp');
	var modalnpwpSesuai = $('#modalnpwpSesuai');
	var modalnpwpTidakSesuai = $('#modalnpwpTidakSesuai');
	var form_approve_npwp_sesuai = $('#form_approve_npwp_sesuai');
	var form_approve_npwp_tidak_sesuai = $('#form_approve_npwp_tidak_sesuai');
	var id_vendor_reusable13 = $('#id_vendor_reusable').val();
	// var form_pajak_edit = $('#form_pajak_edit');

	function reload_table_npwp() {
		table_npwp.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		table_npwp.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor/data_get_npwp/') ?>" + id_vendor_reusable13,
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

	function hideMasaBerlakuNPWP() {
		var checkBox = document.getElementById("npwp_seumur_hidup");
		var text = document.getElementById("npwp_masa_berlaku");
		if (checkBox.checked == true) {
			text.style.display = "none";
		} else {
			text.style.display = "block";
		}
	}

	function message(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}

	form_approve_npwp_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_bukti_npwp_vendor1').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_npwp",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					reload_table_npwp();
					modalnpwpSesuai.modal('hide');
					message('success', 'Data Berhasil Di Validasi')
				}
			});
		}
	});

	form_approve_npwp_tidak_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_bukti_npwp_vendor1').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_npwp2",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					reload_table_npwp();
					modalnpwpTidakSesuai.modal('hide');
					message('success', 'Data Berhasil Di Validasi')
				}
			});
		}
	});

	// GET BY ID
	function byid_npwp(id, type) {
		if (type == 'edit_npwp') {
			saveData = 'edit_npwp';
		}
		if (type == 'hapus_npwp') {
			saveData = 'hapus_npwp';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('vendor/get_byid_npwp/'); ?>" + id,
			success: function(response) {
				if (type == 'edit_npwp') {
					$('[name="id_npwp"]').val(response['npwp'].id_npwp);
					modalnpwpSesuai.modal('show');
				}
				if (type == 'hapus_npwp') {
					$('[name="id_npwp"]').val(response['npwp'].id_npwp);
					modalnpwpTidakSesuai.modal('show');
				}
			}
		})
	}

	// HAPUS DATA
	function deleteQuestionnpwp(id_npwp, nomor_nib) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nomor_nib + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deletenpwp(id_npwp);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deletenpwp(id_npwp) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('vendor/delete_npwp/') ?>" + id_npwp,
			dataType: "JSON",
			success: function(response) {
				reload_table_npwp();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}

	$('.tanggal_mulai').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-m-Y',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('.tanggal_selesai').val() ? $('.tanggal_selesai').val() : false
			})
		}
	})

	$('.tanggal_selesai').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-m-Y',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('.tanggal_mulai').val() ? $('.tanggal_mulai').val() : false
			})
		}
	})
</script>
<!-- END NPWP -->

<!-- INI UNTUK SKPKP -->
<script>
	var table_skpkp = $('#table_skpkp');
	var modalskpkpSesuai = $('#modalskpkpSesuai');
	var modalskpkpTidakSesuai = $('#modalskpkpTidakSesuai');
	var form_approve_skpkp_sesuai = $('#form_approve_skpkp_sesuai');
	var form_approve_skpkp_tidak_sesuai = $('#form_approve_skpkp_tidak_sesuai');
	var id_vendor_reusable14 = $('#id_vendor_reusable').val();
	// var form_pajak_edit = $('#form_pajak_edit');

	function reload_table_skpkp() {
		table_skpkp.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		table_skpkp.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor/data_get_skpkp/') ?>" + id_vendor_reusable14,
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

	function hideMasaBerlakuSKPKP() {
		var checkBox = document.getElementById("skpkp_seumur_hidup");
		var text = document.getElementById("skpkp_masa_berlaku");
		if (checkBox.checked == true) {
			text.style.display = "none";
		} else {
			text.style.display = "block";
		}
	}

	function message(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}

	form_approve_skpkp_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_bukti_skpkp_vendor1').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_skpkp",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					reload_table_skpkp();
					modalskpkpSesuai.modal('hide');
					message('success', 'Data Berhasil Di Validasi')
				}
			});
		}
	});


	form_approve_skpkp_tidak_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_bukti_skpkp_vendor1').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_skpkp2",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					reload_table_skpkp();
					modalskpkpTidakSesuai.modal('hide');
					message('success', 'Data Berhasil Di Validasi')
				}
			});
		}
	});

	// GET BY ID
	function byid_skpkp(id, type) {
		if (type == 'edit_skpkp') {
			saveData = 'edit_skpkp';
		}
		if (type == 'hapus_skpkp') {
			saveData = 'hapus_skpkp';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('vendor/get_byid_skpkp/'); ?>" + id,
			success: function(response) {
				if (type == 'edit_skpkp') {
					$('[name="id_skpkp"]').val(response['skpkp'].id_skpkp);
					modalskpkpSesuai.modal('show');
				}
				if (type == 'hapus_skpkp') {
					$('[name="id_skpkp"]').val(response['skpkp'].id_skpkp);
					modalskpkpTidakSesuai.modal('show');
				}
			}
		})
	}

	// HAPUS DATA
	function deleteQuestionSKPKP(id_skpkp, nomor_nib) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nomor_nib + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteSKPKP(id_skpkp);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deleteSKPKP(id_skpkp) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('vendor/delete_skpkp/') ?>" + id_skpkp,
			dataType: "JSON",
			success: function(response) {
				reload_table_skpkp();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}

	$('.tanggal_mulai').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-m-Y',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('.tanggal_selesai').val() ? $('.tanggal_selesai').val() : false
			})
		}
	})

	$('.tanggal_selesai').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-m-Y',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('.tanggal_mulai').val() ? $('.tanggal_mulai').val() : false
			})
		}
	})
</script>
<!-- END SKPKP -->

<!-- INI UNTUK SPPT -->
<script>
	var table_sppt = $('#table_sppt');
	var modalspptSesuai = $('#modalspptSesuai');
	var modalspptTidakSesuai = $('#modalspptTidakSesuai');
	var form_approve_sppt_sesuai = $('#form_approve_sppt_sesuai');
	var form_approve_sppt_tidak_sesuai = $('#form_approve_sppt_tidak_sesuai');
	var id_vendor_reusable15 = $('#id_vendor_reusable').val();
	// var form_pajak_edit = $('#form_pajak_edit');

	function reload_table_sppt() {
		table_sppt.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		table_sppt.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor/data_get_sppt/') ?>" + id_vendor_reusable15,
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

	function hideMasaBerlakuSPPT() {
		var checkBox = document.getElementById("sppt_seumur_hidup");
		var text = document.getElementById("sppt_masa_berlaku");
		if (checkBox.checked == true) {
			text.style.display = "none";
		} else {
			text.style.display = "block";
		}
	}

	function message(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}

	form_approve_sppt_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_bukti_sppt_vendor1').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_sppt",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					reload_table_sppt();
					modalspptSesuai.modal('hide');
					message('success', 'Data Berhasil Di Validasi')
				}
			});
		}
	});

	form_approve_sppt_tidak_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_bukti_sppt_vendor1').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_sppt2",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					reload_table_sppt();
					modalspptTidakSesuai.modal('hide');
					message('success', 'Data Berhasil Di Validasi')
				}
			});
		}
	});

	// GET BY ID
	function byid_sppt(id, type) {
		if (type == 'edit_sppt') {
			saveData = 'edit_sppt';
		}
		if (type == 'hapus_sppt') {
			saveData = 'hapus_sppt';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('vendor/get_byid_sppt/'); ?>" + id,
			success: function(response) {
				if (type == 'edit_sppt') {
					$('[name="id_sppt"]').val(response['sppt'].id_sppt);
					modalspptSesuai.modal('show');
				}
				if (type == 'hapus_sppt') {
					$('[name="id_sppt"]').val(response['sppt'].id_sppt);
					modalspptTidakSesuai.modal('show');
				}
			}
		})
	}

	// HAPUS DATA
	function deleteQuestionSPPT(id_sppt, nomor_nib) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nomor_nib + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteSPPT(id_sppt);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deleteSPPT(id_sppt) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('vendor/delete_sppt/') ?>" + id_sppt,
			dataType: "JSON",
			success: function(response) {
				reload_table_sppt();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}

	$('.tanggal_mulai').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-m-Y',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('.tanggal_selesai').val() ? $('.tanggal_selesai').val() : false
			})
		}
	})

	$('.tanggal_selesai').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-m-Y',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('.tanggal_mulai').val() ? $('.tanggal_mulai').val() : false
			})
		}
	})
</script>
<!-- END SPPT -->


<!-- INI UNTUK SIUJK -->
<script>
	var table_siujk = $('#table_siujk');
	var modalsiujkSesuai = $('#modalsiujkSesuai');
	var modalsiujkTidakSesuai = $('#modalsiujkTidakSesuai');
	var form_approve_siujk_sesuai = $('#form_approve_siujk_sesuai');
	var form_approve_siujk_tidak_sesuai = $('#form_approve_siujk_tidak_sesuai');
	var id_vendor_reusable16 = $('#id_vendor_reusable').val();
	// var form_pajak_edit = $('#form_pajak_edit');

	function reload_table_siujk() {
		table_siujk.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		table_siujk.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor/data_get_siujk/') ?>" + id_vendor_reusable16,
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

	function hideMasaBerlakuSIUJK() {
		var checkBox = document.getElementById("siujk_seumur_hidup");
		var text = document.getElementById("siujk_masa_berlaku");
		if (checkBox.checked == true) {
			text.style.display = "none";
		} else {
			text.style.display = "block";
		}
	}

	function message(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}

	form_approve_siujk_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_bukti_siujk_vendor1').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_siujk",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					reload_table_siujk();
					modalsiujkSesuai.modal('hide');
					message('success', 'Data Berhasil Di Validasi')
				}
			});
		}
	});

	form_approve_siujk_tidak_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_bukti_siujk_vendor1').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_siujk2",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					reload_table_siujk();
					modalsiujkTidakSesuai.modal('hide');
					message('success', 'Data Berhasil Di Validasi')
				}
			});
		}
	});

	// GET BY ID
	function byid_siujk(id, type) {
		if (type == 'edit_siujk') {
			saveData = 'edit_siujk';
		}
		if (type == 'hapus_siujk') {
			saveData = 'hapus_siujk';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('vendor/get_byid_siujk/'); ?>" + id,
			success: function(response) {
				if (type == 'edit_siujk') {
					$('[name="id_siujk"]').val(response['siujk'].id_siujk);
					modalsiujkSesuai.modal('show');
				}
				if (type == 'hapus_siujk') {
					$('[name="id_siujk"]').val(response['siujk'].id_siujk);
					modalsiujkTidakSesuai.modal('show');
				}
			}
		})
	}

	// HAPUS DATA
	function deleteQuestionSIUJK(id_siujk, nomor_nib) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nomor_nib + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteSIUJK(id_siujk);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deleteSIUJK(id_siujk) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('vendor/delete_siujk/') ?>" + id_siujk,
			dataType: "JSON",
			success: function(response) {
				reload_table_siujk();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}

	$('.tanggal_mulai').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-m-Y',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('.tanggal_selesai').val() ? $('.tanggal_selesai').val() : false
			})
		}
	})

	$('.tanggal_selesai').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-m-Y',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('.tanggal_mulai').val() ? $('.tanggal_mulai').val() : false
			})
		}
	})
</script>
<!-- END SIUJK -->

<!-- INI UNTUK KTP -->
<script>
	var table_ktp = $('#table_ktp');
	var modalktpSesuai = $('#modalktpSesuai');
	var modalktpTidakSesuai = $('#modalktpTidakSesuai');
	var form_approve_ktp_sesuai = $('#form_approve_ktp_sesuai');
	var form_approve_ktp_tidak_sesuai = $('#form_approve_ktp_tidak_sesuai');
	var id_vendor_reusable17 = $('#id_vendor_reusable').val();
	// var form_pajak_edit = $('#form_pajak_edit');

	function reload_table_ktp() {
		table_ktp.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		table_ktp.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor/data_get_ktp/') ?>" + id_vendor_reusable17,
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

	function hideMasaBerlakuKTP() {
		var checkBox = document.getElementById("ktp_seumur_hidup");
		var text = document.getElementById("ktp_masa_berlaku");
		if (checkBox.checked == true) {
			text.style.display = "none";
		} else {
			text.style.display = "block";
		}
	}

	function message(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}

	form_approve_ktp_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_bukti_ktp_vendor1').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_ktp",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					reload_table_ktp();
					modalktpSesuai.modal('hide');
					message('success', 'Data Berhasil Di Validasi')
				}
			});
		}
	});


	form_approve_ktp_tidak_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_bukti_ktp_vendor1').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_ktp2",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					reload_table_ktp();
					modalktpTidakSesuai.modal('hide');
					message('success', 'Data Berhasil Di Validasi')
				}
			});
		}
	});

	// GET BY ID
	function byid_ktp(id, type) {
		if (type == 'edit_ktp') {
			saveData = 'edit_ktp';
		}
		if (type == 'hapus_ktp') {
			saveData = 'hapus_ktp';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('vendor/get_byid_ktp/'); ?>" + id,
			success: function(response) {
				if (type == 'edit_ktp') {
					$('[name="id_ktp"]').val(response['ktp'].id_ktp);
					modalktpSesuai.modal('show');
				}
				if (type == 'hapus_ktp') {
					$('[name="id_ktp"]').val(response['ktp'].id_ktp);
					modalktpTidakSesuai.modal('show');
				}
			}
		})
	}

	// HAPUS DATA
	function deleteQuestionSIUJK(id_ktp, nomor_nib) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nomor_nib + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteSIUJK(id_ktp);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deleteSIUJK(id_ktp) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('vendor/delete_ktp/') ?>" + id_ktp,
			dataType: "JSON",
			success: function(response) {
				reload_table_ktp();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}

	$('.tanggal_mulai').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-m-Y',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('.tanggal_selesai').val() ? $('.tanggal_selesai').val() : false
			})
		}
	})

	$('.tanggal_selesai').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-m-Y',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('.tanggal_mulai').val() ? $('.tanggal_mulai').val() : false
			})
		}
	})
</script>
<!-- END KTP -->


<!-- INI UNTUK SBU -->
<script>
	var table_sbu = $('#table_sbu');
	var modalsbuSesuai = $('#modalsbuSesuai');
	var modalsbuTidakSesuai = $('#modalsbuTidakSesuai');
	var form_approve_sbu_sesuai = $('#form_approve_sbu_sesuai');
	var form_approve_sbu_tidak_sesuai = $('#form_approve_sbu_tidak_sesuai');
	var id_vendor_reusable18 = $('#id_vendor_reusable').val();
	// var form_pajak_edit = $('#form_pajak_edit');

	function reload_table_sbu() {
		table_sbu.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		table_sbu.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor/data_get_sbu/') ?>" + id_vendor_reusable18,
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

	function hideMasaBerlakuSBU() {
		var checkBox = document.getElementById("sbu_seumur_hidup");
		var text = document.getElementById("sbu_masa_berlaku");
		if (checkBox.checked == true) {
			text.style.display = "none";
		} else {
			text.style.display = "block";
		}
	}

	function message(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}

	form_approve_sbu_sesuai.on('submit', function(e) {
		$.ajax({
			url: "<?php echo base_url(); ?>vendor/approve_sbu",
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(data) {
				reload_table_sbu();
				modalsbuSesuai.modal('hide');
				message('success', 'Data Berhasil Di Validasi')
			}
		});
	});

	form_approve_sbu_tidak_sesuai.on('submit', function(e) {
		$.ajax({
			url: "<?php echo base_url(); ?>vendor/approve_sbu2",
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(data) {
				reload_table_sbu();
				modalsbuTidakSesuai.modal('hide');
				message('success', 'Data Berhasil Di Validasi')
			}
		});
	});

	// new update 30-juni-2022

	function lihat_sbu() {
		var file_bukti_sbu_vendor = $('[name="file_bukti_sbu_vendor_uploaded"]').val();
		console.log(file_bukti_sbu_vendor)
		window.open('https://vms.jmtm.co.id/file_bukti_sbu/' + file_bukti_sbu_vendor, '_blank');
	}
	// GET BY ID
	function byid_sbu(id, type) {
		var modalsbu_add = $('#modalsbu_add');
		if (type == 'edit_sbu') {
			saveData = 'edit_sbu';
		}
		if (type == 'hapus_sbu') {
			saveData = 'hapus_sbu';
		}
		if (type == 'ubah_sbu') {
			saveData = 'ubah_sbu';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('vendor/get_byid_sbu/'); ?>" + id,
			success: function(response) {
				if (type == 'edit_sbu') {
					$('[name="id_sbu"]').val(response['sbu'].id_sbu_vendor);
					modalsbuSesuai.modal('show');
				}
				if (type == 'hapus_sbu') {
					$('[name="id_sbu"]').val(response['sbu'].id_sbu_vendor);
					modalsbuTidakSesuai.modal('show');
				}
				if (type == 'ubah_sbu') {
					$('#id_vendor_reusable2').val()
					$('[name="id_sbu"]').val(response['sbu'].id_sbu_vendor);
					$('[name="id_sbu_vendor"]').val(response['sbu'].id_sbu_vendor);
					$('[name="kualifikasi_usaha_sbu"]').val(response['sbu'].kualifikasi_usaha_sbu);
					$('[name="id_sbu"]').val(response['sbu'].id_sbu_master);
					$('[name="file_bukti_sbu_vendor_uploaded"]').val(response['sbu'].file_bukti_sbu_vendor);
					$('#file_bukti_sbu_vendor').text(response['sbu'].file_bukti_sbu_vendor);
					modalsbu_add.modal('show')
				}
			}
		})
	}
	var form_sbu_tambah = $('#form_sbu_tambah')
	var modalsbu_add = $('#modalsbu_add');
	form_sbu_tambah.on('submit', function(e) {
		e.preventDefault();
		$.ajax({
			url: "<?php echo base_url(); ?>vendor/update_sbu",
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(data) {
				reload_table_sbu();
				modalsbu_add.modal('hide');
				message('success', 'Data Berhasil Di Tambah')
			}
		});
	});

	// bates tanggal 30 
	// HAPUS DATA
	function deleteQuestionSBU(id_sbu, nomor_nib) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nomor_nib + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteSBU(id_sbu);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deleteSBU(id_sbu) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('vendor/delete_sbu/') ?>" + id_sbu,
			dataType: "JSON",
			success: function(response) {
				reload_table_sbu();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}

	$('.tanggal_mulai').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-m-Y',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('.tanggal_selesai').val() ? $('.tanggal_selesai').val() : false
			})
		}
	})

	$('.tanggal_selesai').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-m-Y',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('.tanggal_mulai').val() ? $('.tanggal_mulai').val() : false
			})
		}
	})
</script>
<!-- END SBU -->

<!-- INI UNTUK DOMISILI -->
<script>
	var tbl_domisili = $('#tbl_domisili');
	var modaldomisiliSesuai = $('#modaldomisiliSesuai');
	var modaldomisiliTidakSesuai = $('#modaldomisiliTidakSesuai');
	var form_approve_domisili_sesuai = $('#form_approve_domisili_sesuai');
	var form_approve_domisili_tidak_sesuai = $('#form_approve_domisili_tidak_sesuai');
	var id_vendor_reusable19 = $('#id_vendor_reusable').val();
	// var form_pajak_edit = $('#form_pajak_edit');

	function reload_table_domisili() {
		tbl_domisili.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		tbl_domisili.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor/data_get_domisili/') ?>" + id_vendor_reusable19,
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

	function hideMasaBerlakuDOMISILI() {
		var checkBox = document.getElementById("domisili_seumur_hidup");
		var text = document.getElementById("domisili_masa_berlaku");
		if (checkBox.checked == true) {
			text.style.display = "none";
		} else {
			text.style.display = "block";
		}
	}

	function message(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}

	form_approve_domisili_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_bukti_domisili_vendor1').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_domisili",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					reload_table_domisili();
					modaldomisiliSesuai.modal('hide');
					message('success', 'Data Berhasil Di Validasi')
				}
			});
		}
	});

	form_approve_domisili_tidak_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_bukti_domisili_vendor1').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_domisili2",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					reload_table_domisili();
					modaldomisiliTidakSesuai.modal('hide');
					message('success', 'Data Berhasil Di Validasi')
				}
			});
		}
	});

	// GET BY ID
	function byid_domisili(id, type) {
		if (type == 'edit_domisili') {
			saveData = 'edit_domisili';
		}
		if (type == 'hapus_domisili') {
			saveData = 'hapus_domisili';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('vendor/get_byid_domisili/'); ?>" + id,
			success: function(response) {
				if (type == 'edit_domisili') {
					$('[name="id_domisili"]').val(response['domisili'].id_domisili);
					modaldomisiliSesuai.modal('show');
				}
				if (type == 'hapus_domisili') {
					$('[name="id_domisili"]').val(response['domisili'].id_domisili);
					modaldomisiliTidakSesuai.modal('show');
				}
			}
		})
	}

	// HAPUS DATA
	function deleteQuestionDOMISILI(id_domisili, nomor_nib) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nomor_nib + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteDOMISILI(id_domisili);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deleteDOMISILI(id_domisili) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('vendor/delete_domisili/') ?>" + id_domisili,
			dataType: "JSON",
			success: function(response) {
				reload_table_domisili();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}

	$('.tanggal_mulai').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-m-Y',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('.tanggal_selesai').val() ? $('.tanggal_selesai').val() : false
			})
		}
	})

	$('.tanggal_selesai').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-m-Y',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('.tanggal_mulai').val() ? $('.tanggal_mulai').val() : false
			})
		}
	})
</script>
<!-- END DOMISILI -->

<!-- INI UNTUK BAGAN -->
<script>
	var tbl_bagan = $('#tbl_bagan');
	var modalbaganSesuai = $('#modalbaganSesuai');
	var modalbaganTidakSesuai = $('#modalbaganTidakSesuai');
	var form_approve_bagan_sesuai = $('#form_approve_bagan_sesuai');
	var form_approve_bagan_tidak_sesuai = $('#form_approve_bagan_tidak_sesuai');
	var id_vendor_reusable20 = $('#id_vendor_reusable').val();
	// var form_pajak_edit = $('#form_pajak_edit');

	function reload_table_bagan() {
		tbl_bagan.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		tbl_bagan.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor/data_get_bagan/') ?>" + id_vendor_reusable20,
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

	function hideMasaBerlakuBAGAN() {
		var checkBox = document.getElementById("bagan_seumur_hidup");
		var text = document.getElementById("bagan_masa_berlaku");
		if (checkBox.checked == true) {
			text.style.display = "none";
		} else {
			text.style.display = "block";
		}
	}

	function message(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}

	form_approve_bagan_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_bukti_bagan_vendor1').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_bagan",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					reload_table_bagan();
					modalbaganSesuai.modal('hide');
					message('success', 'Data Berhasil Di Validasi')
				}
			});
		}
	});

	form_approve_bagan_tidak_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_bukti_bagan_vendor1').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_bagan2",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					reload_table_bagan();
					modalbaganTidakSesuai.modal('hide');
					message('success', 'Data Berhasil Di Validasi')
				}
			});
		}
	});

	// GET BY ID
	function byid_bagan(id, type) {
		if (type == 'edit_bagan') {
			saveData = 'edit_bagan';
		}
		if (type == 'hapus_bagan') {
			saveData = 'hapus_bagan';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('vendor/get_byid_bagan/'); ?>" + id,
			success: function(response) {
				if (type == 'edit_bagan') {
					$('[name="id_bagan"]').val(response['bagan'].id_bagan);
					modalbaganSesuai.modal('show');
				}
				if (type == 'hapus_bagan') {
					$('[name="id_bagan"]').val(response['bagan'].id_bagan);
					modalbaganTidakSesuai.modal('show');
				}
			}
		})
	}

	// HAPUS DATA
	function deleteQuestionbagan(id_bagan, nomor_nib) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nomor_nib + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deletebagan(id_bagan);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deletebagan(id_bagan) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('vendor/delete_bagan/') ?>" + id_bagan,
			dataType: "JSON",
			success: function(response) {
				reload_table_bagan();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}

	$('.tanggal_mulai').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-m-Y',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('.tanggal_selesai').val() ? $('.tanggal_selesai').val() : false
			})
		}
	})

	$('.tanggal_selesai').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-m-Y',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('.tanggal_mulai').val() ? $('.tanggal_mulai').val() : false
			})
		}
	})
</script>
<!-- END BAGAN -->

<!-- INI UNTUK BPJSKETENAGAKERJAAN -->
<script>
	var tbl_bpjs_ketenagakerjaan = $('#tbl_bpjs_ketenagakerjaan');
	var modalbpjs_ketenagakerjaanSesuai = $('#modalbpjs_ketenagakerjaanSesuai');
	var modalbpjs_ketenagakerjaanTidakSesuai = $('#modalbpjs_ketenagakerjaanTidakSesuai');
	var form_approve_bpjs_ketenagakerjaan_sesuai = $('#form_approve_bpjs_ketenagakerjaan_sesuai');
	var form_approve_bpjs_ketenagakerjaan_tidak_sesuai = $('#form_approve_bpjs_ketenagakerjaan_tidak_sesuai');
	var id_vendor_reusable21 = $('#id_vendor_reusable').val();
	// var form_pajak_edit = $('#form_pajak_edit');

	function reload_table_bpjs_ketenagakerjaan() {
		tbl_bpjs_ketenagakerjaan.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		tbl_bpjs_ketenagakerjaan.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor/data_get_bpjs_ketenagakerjaan/') ?>" + id_vendor_reusable21,
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

	function hideMasaBerlakuBPJSKETENAGAKERJAAN() {
		var checkBox = document.getElementById("bpjsketenagakerjaan_seumur_hidup");
		var text = document.getElementById("bpjsketenagakerjaan_masa_berlaku");
		if (checkBox.checked == true) {
			text.style.display = "none";
		} else {
			text.style.display = "block";
		}
	}

	function message(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}

	form_approve_bpjs_ketenagakerjaan_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_bukti_bpjs_ketenagakerjaan_vendor1').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_bpjsketenagakerjaan",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					reload_table_bpjs_ketenagakerjaan();
					modalbpjs_ketenagakerjaanSesuai.modal('hide');
					message('success', 'Data Berhasil Di Validasi')
				}
			});
		}
	});

	form_approve_bpjs_ketenagakerjaan_tidak_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_bukti_bpjs_ketenagakerjaan_vendor1').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_bpjsketenagakerjaan2",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					reload_table_bpjs_ketenagakerjaan();
					modalbpjs_ketenagakerjaanTidakSesuai.modal('hide');
					message('success', 'Data Berhasil Di Validasi')
				}
			});
		}
	});

	// GET BY ID
	function byid_bpjs_ketenagakerjaan(id, type) {
		if (type == 'edit_bpjs_ketenagakerjaan') {
			saveData = 'edit_bpjs_ketenagakerjaan';
		}
		if (type == 'hapus_bpjs_ketenagakerjaan') {
			saveData = 'hapus_bpjs_ketenagakerjaan';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('vendor/get_byid_bpjs_ketenagakerjaan/'); ?>" + id,
			success: function(response) {
				if (type == 'edit_bpjs_ketenagakerjaan') {
					$('[name="id_bpjs_ketenagakerjaan"]').val(response['id_bpjs_ketenagakerjaan'].id_bpjs_ketenagakerjaan);
					modalbpjs_ketenagakerjaanSesuai.modal('show');
				}
				if (type == 'hapus_bpjs_ketenagakerjaan') {
					$('[name="id_bpjs_ketenagakerjaan"]').val(response['id_bpjs_ketenagakerjaan'].id_bpjs_ketenagakerjaan);
					modalbpjs_ketenagakerjaanTidakSesuai.modal('show');
				}
			}
		})
	}

	// HAPUS DATA
	function deleteQuestionbpjsketenagakerjaan(id_bpjs_ketenagakerjaan, nomor_nib) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nomor_nib + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deletebpjsketenagakerjaan(id_bpjs_ketenagakerjaan);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deletebpjsketenagakerjaan(id_bpjs_ketenagakerjaan) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('vendor/delete_bpjs_ketenagakerjaan/') ?>" + id_bpjs_ketenagakerjaan,
			dataType: "JSON",
			success: function(response) {
				reload_table_bpjs_ketenagakerjaan();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}

	$('.tanggal_mulai').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-m-Y',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('.tanggal_selesai').val() ? $('.tanggal_selesai').val() : false
			})
		}
	})

	$('.tanggal_selesai').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-m-Y',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('.tanggal_mulai').val() ? $('.tanggal_mulai').val() : false
			})
		}
	})
</script>
<!-- END BPJSKETENAGAKERJAAN -->


<!-- INI UNTUK BPJSKESEHATAN -->
<script>
	var tbl_bpjs_sehatan = $('#tbl_bpjs_sehatan');
	var modalbpjs_kesehatanSesuai = $('#modalbpjs_kesehatanSesuai');
	var modalbpjs_kesehatanTidakSesuai = $('#modalbpjs_kesehatanTidakSesuai');
	var form_approve_bpjs_kesehatan_sesuai = $('#form_approve_bpjs_kesehatan_sesuai');
	var form_approve_bpjs_kesehatan_tidak_sesuai = $('#form_approve_bpjs_kesehatan_tidak_sesuai');
	var id_vendor_reusable22 = $('#id_vendor_reusable').val();
	// var form_pajak_edit = $('#form_pajak_edit');

	function reload_table_bpjs_kesehatan() {
		tbl_bpjs_sehatan.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		tbl_bpjs_sehatan.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('vendor/data_get_bpjs_kesehatan/') ?>" + id_vendor_reusable22,
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

	function hideMasaBerlakuBPJSKESEHATAN() {
		var checkBox = document.getElementById("bpjskesehatan_seumur_hidup");
		var text = document.getElementById("bpjskesehatan_masa_berlaku");
		if (checkBox.checked == true) {
			text.style.display = "none";
		} else {
			text.style.display = "block";
		}
	}

	function message(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}

	form_approve_bpjs_kesehatan_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_bukti_bpjs_kesehatan_vendor1').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_bpjskesehatan",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					reload_table_bpjs_kesehatan();
					modalbpjs_kesehatanSesuai.modal('hide');
					message('success', 'Data Berhasil Di Validasi')
				}
			});
		}
	});

	form_approve_bpjs_kesehatan_tidak_sesuai.on('submit', function(e) {
		e.preventDefault();
		if ($('#file_bukti_bpjs_kesehatan_vendor1').val() == '') {
			alert("Pilih File Kembali");
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>vendor/approve_bpjskesehatan2",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					reload_table_bpjs_kesehatan();
					modalbpjs_kesehatanTidakSesuai.modal('hide');
					message('success', 'Data Berhasil Di Validasi')
				}
			});
		}
	});

	// GET BY ID
	function byid_bpjs_kesehatan(id, type) {
		if (type == 'edit_bpjs_kesehatan') {
			saveData = 'edit_bpjs_kesehatan';
		}
		if (type == 'hapus_bpjs_kesehatan') {
			saveData = 'hapus_bpjs_kesehatan';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('vendor/get_byid_bpjs_kesehatan/'); ?>" + id,
			success: function(response) {
				if (type == 'edit_bpjs_kesehatan') {
					$('[name="id_bpjs_kesehatan"]').val(response['id_bpjs_kesehatan'].id_bpjs_kesehatan);
					modalbpjs_kesehatanSesuai.modal('show');
				}
				if (type == 'hapus_bpjs_kesehatan') {
					$('[name="id_bpjs_kesehatan"]').val(response['id_bpjs_kesehatan'].id_bpjs_kesehatan);
					modalbpjs_kesehatanTidakSesuai.modal('show');
				}
			}
		})
	}

	// HAPUS DATA
	function deleteQuestionKESEHATAN(id_bpjs_kesehatan, nomor_nib) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nomor_nib + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteKESEHATAN(id_bpjs_kesehatan);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deleteKESEHATAN(id_bpjs_kesehatan) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('vendor/delete_bpjs_kesehatan/') ?>" + id_bpjs_kesehatan,
			dataType: "JSON",
			success: function(response) {
				reload_table_bpjs_kesehatan();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}

	$('.tanggal_mulai').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-m-Y H:i',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('.tanggal_selesai').val() ? $('.tanggal_selesai').val() : false
			})
		}
	})

	$('.tanggal_selesai').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-m-Y',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('.tanggal_mulai').val() ? $('.tanggal_mulai').val() : false
			})
		}
	})
</script>
<!-- END BPJSKESEHATAN -->

<script>
	var formKirimVendor = $('#formKirimVendor')

	formKirimVendor.on('submit', function(e) {
		e.preventDefault();
		$.ajax({
			url: "<?php echo base_url(); ?>vendor/kirim_email_pembuktian",
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(response) {
				formKirimVendor[0].reset();
				message('success', 'Undangan Berhasil Dikirim!')
				setInterval(function() {
					window.location.reload()
				}, 3000);
			},
		});
	});

	var formKirimVendor_terundang = $('#formKirimVendor_terundang')

	formKirimVendor_terundang.on('submit', function(e) {
		e.preventDefault();
		$.ajax({
			url: "<?php echo base_url(); ?>vendor/dokumen_tervalidasi",
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(response) {
				formKirimVendor_terundang[0].reset();
				message('success', 'Berhasil Dikirim!')
			},
		});
	});
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

	function messageGantiPw(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}

	function messageGantiPw2(icon, text) {
		swal({
			title: "Gagal!!!",
			text: text,
			icon: icon,
		});
	}
	var formGantiPasswordVendor = $('#form_mauganti');
	var btnsave = $('#btnSave');
	var gantiPassword = $('#gantiPassword')
	// sav Ijin Usaha
	var id_vendor_reusable_999 = $('#id_vendor_reusable').val();

	function save_ganti_password_vendor() {
		$.ajax({
			method: "POST",
			url: "<?= base_url('vendor/ganti_password_vendor/'); ?>" + id_vendor_reusable_999,
			data: formGantiPasswordVendor.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					messageGantiPw('success', 'Password Berhasil Di Ganti');
					gantiPassword.modal('hide')
				} else if (response == 'gagal') {
					messageGantiPw2('warning', 'Isi Password Terlebih Dahulu!!!');
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}


	// 2 juli 2022
	var form_update_jenis_pengadaan = $('#form_update_jenis_pengadaan');
	var modal_ubah_pengadaan = $('#ubah_jenis_pengadaan');

	function ubah_jenis_pengadaan() {
		$.ajax({
			method: "POST",
			url: "<?= base_url('vendor/ganti_jenis_pengadaan'); ?>",
			data: form_update_jenis_pengadaan.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Berhasil', 'Berhasil Di Ubah');
					modal_ubah_pengadaan.modal('hide')
					location.reload();
				} else if (response == 'gagal') {
					message('warning', 'Maaf', 'gagal Di Ubah!!!');
				}
			},
		})
	}
</script>