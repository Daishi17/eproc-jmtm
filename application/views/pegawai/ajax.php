<script>
	// $(document).ready(function() {
	// 	$("#batalGanti").hide();
	// 	$("#batalSubmit").hide();
	// 	$("#gantiPass").hide();
	// 	$("#gantiPassword").click(function() {
	// 		$("#gantiPassword").hide();
	// 		$("#gantiPass").show();
	// 		$("#batalGanti").show();
	// 		$("#batalSubmit").show();
	// 	});

	// 	$("#batalGanti").click(function() {
	// 		$("#formPass").show();
	// 		$("#gantiPassword").show();
	// 		$("#gantiPass").hide();
	// 		$("#batalSubmit").hide();
	// 		$("#batalGanti").hide();
	// 	});
	// });

	$(function() {
		//Initialize Select2 Elements
		$('.select2').select2()

		//Initialize Select2 Elements
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})
	})

	var saveData;
	var table_pegawai = $('#table_pegawai');
	var modalDetail = $('#modaldetail');
	var modalTitle = $('#modaltitle');

	$(document).ready(function() {
		table_pegawai.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('pegawai/get_pegawai') ?>",
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
		table_pegawai.DataTable().ajax.reload();
	}

	function messageSwal(icon, text) {
		swal({
			title: "Success!!!",
			text: text,
			icon: icon
		})
	}

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
			url: "<?= base_url('pegawai/get_by_id/') ?>" + id,
			dataType: "JSON",
			success: function(response) {

				if (type == 'edit') {
					location.replace('<?= base_url('pegawai/editpegawai/') ?>' + response['get_pegawai'].id_pegawai)
				}
				if (type == 'hapus') {
					deleteQuestion(response['get_pegawai'].id_pegawai, response['get_pegawai'].nama_pegawai)
				}
				if (type == 'detail') {
					modalTitle.text('Detail Data');
					$('#nama_pegawai').html(response['get_pegawai'].nama_pegawai);
					$('#nip').html(response['get_pegawai'].nip);
					$('#username').html(response['get_pegawai'].username);
					$('#alamat').html(response['get_pegawai'].alamat);
					$('#telepon').html(response['get_pegawai'].telepon);
					$('#email').html(response['get_pegawai'].email);
					$('#jabatan').html(response['get_pegawai'].nama_unit_kerja);
					if (response['get_pegawai'].status == 0) {
						$('#status').html('Tidak Aktif');
					} else {
						$('#status').html('Aktif');
					}
					$('#role').html(response['get_pegawai'].nama_role);
					$('#no_sk').html(response['get_pegawai'].no_sk);
					$('#masa_berlaku_sk').html(response['get_pegawai'].masa_berlaku_sk);
					modalDetail.modal('show');
				}
			}
		})
	}

	function deleteQuestion(id_pegawai, nama_pegawai) {
		swal({
				title: "Apakah Anda Yakin!?",
				text: "Ingin Menghapus Data " + nama_pegawai + " ? ",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteData(id_pegawai);
				} else {
					messageSwal('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			})
	}

	function deleteData(id) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('pegawai/hapuspegawai/') ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (response == 'berhasil') {
					relodTable();
					messageSwal('success', 'Data Berhasil Di Hapus')
				}
			}
		})
	}

	$('.tanggal_mulai_pascakualifikasi').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-F-Y',
		onShow: function(ct) {
			this.setOptions({
				minDate: $('.tanggal_selesai_pascakualifikasi').val() ? $('.tanggal_selesai_pascakualifikasi').val() : false
			})
		}
	})
</script>

<script>
	// edit
	var saya_form = $('#form_saya');

	saya_form.on('submit', function(e) {
		e.preventDefault();
		$.ajax({
			url: "<?php echo base_url(); ?>pegawai/savepegawai",
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(response) {
				if (response == 'berhasil') {
					location.replace('<?= base_url('pegawai') ?>');
					message('success', 'Data Berhasil Di Edit!!')
				} else {
					$(".nama_pegawai-error").html(response.nama_pegawai);
					$(".username-error").html(response.username);
					$(".email-error").html(response.email);
					$(".nip-error").html(response.nip);
					$(".id_role-error").html(response.id_role);
					$(".telepon-error").html(response.telepon);
					$(".no_sk-error").html(response.no_sk);
				}
			}
		});
	});
</script>

<script>
	function message300(icon, text) {
		swal({
			title: "WAJIB ANGKA!!!",
			text: text,
			icon: icon,
		});
	}

	document.getElementById("noTelp").onkeyup = function() {
		var validasiHuruf = /^[a-zA-Z ]+ $ /;
		var validasisimbol = /[^0-9]/;
		var noTelp = $('#noTelp').val();
		if (noTelp.match(validasiHuruf)) {
			$('#noTelp').css('border-color', 'red');
			$('#noTelp').val('');
			message300('warning', 'Isi Dengan Angka!!');
		} else if (noTelp.match(validasisimbol)) {
			$('#noTelp').css('border-color', 'red');
			$('#noTelp').val('');
			message300('warning', 'Isi Dengan Angka!!');
		} else {
			$('#noTelp').css('border-color', 'green');
			$('#noTelp').val(noTelp);

		}

	};
</script>

<script>
	function message300(icon, text) {
		swal({
			title: "WAJIB ANGKA!!!",
			text: text,
			icon: icon,
		});
	}

	document.getElementById("noTelp").onkeyup = function() {
		var validasiHuruf = /^[a-zA-Z ]+ $ /;
		var validasisimbol = /[^0-9]/;
		var noTelp = $('#noTelp').val();
		if (noTelp.match(validasiHuruf)) {
			$('#noTelp').css('border-color', 'red');
			$('#noTelp').val('');
			message300('warning', 'Isi Dengan Angka!!');
		} else if (noTelp.match(validasisimbol)) {
			$('#noTelp').css('border-color', 'red');
			$('#noTelp').val('');
			message300('warning', 'Isi Dengan Angka!!');
		} else {
			$('#noTelp').css('border-color', 'green');
			$('#noTelp').val(noTelp);

		}

	};
</script>

<script>
	function message300(icon, text) {
		swal({
			title: "WAJIB ANGKA!!!",
			text: text,
			icon: icon,
		});
	}

	document.getElementById("telponku").onkeyup = function() {
		var validasiHuruf = /^[a-zA-Z ]+ $ /;
		var validasisimbol = /[^0-9]/;
		var telponku = $('#telponku').val();
		if (telponku.match(validasiHuruf)) {
			$('#telponku').css('border-color', 'red');
			message300('warning', 'Isi Dengan Angka!!');
		} else if (telponku.match(validasisimbol)) {
			$('#telponku').css('border-color', 'red');
			message300('warning', 'Isi Dengan Angka!!');
		} else {
			$('#telponku').css('border-color', 'green');
			$('#telponku').val(telponku);

		}

	};
</script>