<script>
	// In your Javascript (external .js resource or <script> tag)
	$('#mySelecttender').select2({
		closeOnSelect: false
	});
	$('#mySelectnontender').select2({
		closeOnSelect: false
	});

	// dattable
	$(document).ready(function() {
		$('#tender').DataTable({});
	});

	$(document).ready(function() {
		$('#nontender').DataTable({});
	});
</script>
<script>
	$(document).ready(function() {
		$('#table_syarat_syarat').DataTable({});
	});
</script>

<script>
	window.setTimeout(function() {
		$(".alert").fadeTo(500, 0).slideUp(500, function() {
			$(this).remove();
		});
	}, 2000)
</script>

<script>
	var saveData;
	var modal = $('#modalData');
	var tabledata = $('#tender_serverside');
	var tabledata2 = $('#nontender_serverside');
	var tabledata3 = $('#tender_terbatas');
	var formData = $('#formData');
	var modaltitle = $('#modalTitle');
	var btnsave = $('#btnSave')
	$(document).ready(function() {
		tabledata.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('panitiajmtm/daftarpaket/get_panitia') ?>",
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


	$(document).ready(function() {
		tabledata2.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('panitiajmtm/daftarpaket/get_panitia2') ?>",
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

	$(document).ready(function() {
		tabledata3.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('panitiajmtm/daftarpaket/get_panitia3') ?>",
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
		tabledata.DataTable().ajax.reload();
	}

	function message(icon, text) {
		swal({
			title: "Mantaps!!!",
			text: text,
			icon: icon,
		});
	}

	function deleteQuestion(id_unit_kerja, nama_unit_kerja) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nama_unit_kerja + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteData(id_unit_kerja);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function add() {
		saveData = 'tambah';
		formData[0].reset();
		modal.modal('show');
		modaltitle.text('Tambah Data');
	}

	function save() {
		if (saveData == 'tambah') {
			url = "<?= base_url('unit_kerja/add'); ?>"
		} else {
			url = "<?= base_url('unit_kerja/update'); ?>"
		}
		$.ajax({
			method: "POST",
			url: url,
			data: formData.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					modal.modal('hide');
					relodTable();
					if (saveData == 'tambah') {
						message('success', 'Data Berhasil Di Tambah')
					} else {
						modal.modal('hide');
						relodTable();
						message('success', 'Data Berhasil Di Ubah');
					}
				} else {
					$(".nama-unit-kerja-error").html(response.nama_unit_kerja);
					$(".kode-unit-kerja-error").html(response.kode_unit_kerja);
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}

	function byid(id, type) {
		if (type == 'buatpaket') {
			saveData = 'buatpaket';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('panitiajmtm/daftarpaket/get_by_id/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'buatpaket') {
					location.replace('<?= base_url('panitiajmtm/daftarpaket/tender/') ?>' + response['get_pegawai'].id_paket);
				}

			}
		})
	}

	function deleteData(id) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('unit_kerja/delete/') ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					relodTable();
					message('success', 'Data Berhasil Di Hapus')
				}
			}
		})
	}
</script>


<script>
	// add izinusaha buat paket
	$(document).ready(function() {
		// hapus data Ixin usaha
		$(document).on('click', '.removeBtn', function() {
			var obj = $(this)
			var value = obj.attr("value");
			if (value > 0) {
				var action = {
					url: function(args) {
						var pattern = 'url';
						for (var key in args) {
							pattern = pattern.replace(':' + key, args[key] || '');
						}
						return pattern;
					},
					method: 'GET'
				};
				$.get(action.url({
					id: 9076999,
					izinusahaId: value
				}), function() {
					// console.log("izinusaha berhasil di hapus")
					obj.parent().parent().remove()
				});
			} else {
				obj.parent().parent().remove()
			}
		})


		// tambah data javascript
		$("#tambahizin").click(function() {
			var options = $('#datakualifikasi tr input[name="jenisizinid"]').html();
			var ind = $('#datakualifikasi tr').length - 1
			// var izinusaha_id = $.cookie("edit_izin usaha");
			var addizin = "<tr>"
			addizin += '<td style="width:50%;"><input type="text" name="jenis_izin[]" class="form-control"></td>'
			addizin += '<td style="width:70%;"><input type="text" name="izin_kualifikasi[]" class="form-control"></td>'
			addizin += '<td><a href="javascript:void(0)" class="removeBtn"><i class="fas fa-trash-alt"></i></a></td>'
			addizin += "</tr>";
			$("#datakualifikasi").append(addizin);
		})

	});
	$(document).ready(function() {
		// hapus data Ixin usaha
		$(document).on('click', '.removeBtn', function() {
			var obj = $(this)
			var value = obj.attr("value");
			if (value > 0) {
				var action = {
					url: function(args) {
						var pattern = 'url';
						for (var key in args) {
							pattern = pattern.replace(':' + key, args[key] || '');
						}
						return pattern;
					},
					method: 'GET'
				};
				$.get(action.url({
					id: 9076999,
					izinusahaId: value
				}), function() {
					// console.log("izinusaha berhasil di hapus")
					obj.parent().parent().remove()
				});
			} else {
				obj.parent().parent().remove()
			}
		})


		// tambah data javascript
		$("#tambahizin2").click(function() {
			var options = $('#datakualifikasi tr input[name="jenisizinid"]').html();
			var ind = $('#datakualifikasi tr').length - 1
			var i = 1;
			// var izinusaha_id = $.cookie("edit_izin usaha");
			var addizin2 = "<tr>"
			addizin2 += '<td class="col-md-3"> <textarea name="syarat_tambahan[' + i++ + ']" id="" class="form-control"></textarea></td>'
			addizin2 += '<td><a href="javascript:void(0)" class="removeBtn"><i class="fas fa-trash-alt"></i></a></td>'
			addizin2 += "</tr>";
			$("#datakualifikasi2").append(addizin2);
		})

	});

	function simpanizin() {
		document.getElementById("demo").innerHTML = '<div class="alert alert-success" role="alert">Data Izin Usaha Telah Tersimpan !!</div>'
		setTimeout(() => {
			$('#demo').hide();
		}, 5000);
	}
</script>

<!-- rincian hps -->
<script>
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
				"sZeroRecords": "Tidak Ada Lokasi Kerja Yang Di Cari",
			},
		});
		$('#test').html(url);
	});

	$(function() {
		//Initialize Select2 Elements
		$('.select2').select2()

		//Initialize Select2 Elements
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})
	})
	$('#alamat_kedudukan').value();
</script>


<script>
	$('.tanggal_mulai_pascakualifikasi').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-m-Y H:i',
		onShow: function(ct) {
			// this.setOptions({
			// 	minDate: $('.tanggal_selesai_pascakualifikasi').val() ? $('.tanggal_selesai_pascakualifikasi').val() : false
			// })
		}
	})

	$('.tanggal_selesai_pascakualifikasi').datetimepicker({
		timepicker: true,
		datetimepicker: true,
		format: 'd-m-Y H:i',
		onShow: function(ct) {
			// this.setOptions({
			// 	minDate: $('.tanggal_mulai_pascakualifikasi').val() ? $('.tanggal_mulai_pascakualifikasi').val() : false
			// })
		}
	})
	// $('.tanggal_mulai').keyup(function() {
	// 	$('span.error-keyup-2').remove();
	// 	var tanggal_mulai = $('#tanggal_mulai').val();
	// 	var tanggal_selesai = $('#tanggal_selesai').val();
	// 	if (tanggal_mulai <= tanggal_selesai) {
	// 		$(this).after('<span class="error error-keyup-2" style="color:red">No special characters and numbers allowed.</span>');
	// 	}
	// })

	// $(function() {
	// 	var i = 1;
	// 	$(".datepicker").datepicker({
	// 		format: 'yyyy-mm-dd',
	// 		autoclose: true,
	// 		todayHighlight: true,
	// 	});
	// 	var tanggal_selesai_pascakualifikasi = $(".tanggal_selesai_pascakualifikasi");
	// 	var tanggal_mulai_pascakualifikasi = $(".tanggal_mulai_pascakualifikasi");
	// 	$(tanggal_mulai_pascakualifikasi).on('changeDate', function(selected) {

	// 		var startDate = new Date(selected.date.valueOf());
	// 		$(tanggal_selesai_pascakualifikasi).datepicker('setStartDate', startDate);
	// 		if ($(tanggal_mulai_pascakualifikasi).val() > $(tanggal_selesai_pascakualifikasi).val()) {
	// 			$('#validasi').show();
	// 		}
	// 	});
	// });

	// $(function() {
	// 	var i = 1;
	// 	$(".datepicker").datepicker({
	// 		format: 'yyyy-mm-dd',
	// 		autoclose: true,
	// 		todayHighlight: true,
	// 	});
	// 	var tanggal_selesai_prakualifikasi = $(".tanggal_selesai_prakualifikasi");
	// 	var tanggal_mulai_prakualifikasi = $(".tanggal_mulai_prakualifikasi");
	// 	$(tanggal_mulai_prakualifikasi).on('changeDate', function(selected) {

	// 		var startDate = new Date(selected.date.valueOf());
	// 		$(tanggal_selesai_prakualifikasi).datepicker('setStartDate', startDate);
	// 		if ($(tanggal_mulai_prakualifikasi).val() > $(tanggal_selesai_prakualifikasi).val()) {

	// 		} else {

	// 		}
	// 	});
	// });
</script>

<!-- untuk Halaman tender -->
<script>
	var form_data_save_tender = $('#form_data_save_tender');

	function SimpanTender() {
		var id_paket_save_tender = $('#id_paket_save_tender').val()

		var id_kualifikasi_usaha = $('#id_kualifikasi_usaha').val()
		var bobot_teknis = $('#bobot_teknis').val()
		var bobot_biaya = $('#bobot_biaya').val()
		$.ajax({
			method: "POST",
			url: "<?= base_url("panitiajmtm/daftarpaket/update_save_tender/") ?>" + id_paket_save_tender,
			data: {
				bobot_teknis: bobot_teknis,
				bobot_biaya: bobot_biaya,
				kualifikasi_usaha: id_kualifikasi_usaha
			},
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Paket Tender Berhasil Di Umumkan')
					location.replace('<?= base_url('panitiajmtm/daftarpaket') ?>');
				} else {
					$("#kualifikasi_usaha_error").html(response.kualifikasi_usaha);
					$("#bobot_teknis_error").html(response.bobot_teknis);
					$("#bobot_biaya_error").html(response.bobot_biaya);
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}
</script>

<script>
	var form_umumkan_paket_penunjukan_langsung = $('#form_umumkan_paket_penunjukan_langsung');

	function SimpanTenderPenunjukanLangsung() {
		var id_paket_save_tender2 = $('#id_paket_penunjukan').val();
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/update_save_tender_penunjukan_langsung/') ?>' + id_paket_save_tender2,
			data: form_umumkan_paket_penunjukan_langsung.serialize(),
			dataType: "JSON",
			success: function(response) {
				message('success', 'Paket Tender Berhasil Di Umumkan')
				window.open('https://api.whatsapp.com/send?phone=+62' + response['telpon'] + '&text=Anda Mempunyai 1 Paket Penunjukan Langsung Silakan Login Dan Setujui Paket http://jmtm-eproc.kintekindo.net/ %20%0DLogin Dengan:%20%0DUsername:' + response['vendor']['username_vendor'] + '%20%0DPassword:' + response['vendor']['password_vendor'] + '', '_blank');
				location.replace('<?= base_url('panitiajmtm/daftarpaket') ?>');
			},
			error: function() {
				console.log(error);
			}
		})
	}
</script>

<script>
	function persyaratan_npwp1() {
		$('[name="status_checked_npwp"]').val(1);
	}

	function persyaratan_npwp2() {
		// $('[name="status_checked_npwp"]').val(1);
		var checkBox = document.getElementById("persyaratan_npwp")
		if (checkBox.checked == true) {
			$('[name="status_checked_npwp"]').val(1);
		} else {
			$('[name="status_checked_npwp"]').val(0);
		}
	}

	function persyaratan_pajak1() {
		var checkBox2 = document.getElementById("input_pajak")
		if (checkBox2.checked == true) {
			$('[name="status_checked_persyaratan_pajak"]').val(1);
			$('#keterangan_pajak').prop('disabled', false)
		} else {
			$('[name="status_checked_persyaratan_pajak"]').val(0);
			$('#keterangan_pajak').prop('disabled', true)
		}

	}

	function persyaratan_pajak_2() {
		// $('[name="status_checked_npwp"]').val(1);
		var checkBox2 = document.getElementById("persyaratan_pajak")
		if (checkBox2.checked == true) {
			$('[name="status_checked_persyaratan_pajak"]').val(1);
			$('#keterangan_pajak').prop('disabled', false)
		} else {
			$('[name="status_checked_persyaratan_pajak"]').val(0);
			$('#keterangan_pajak').prop('disabled', true)
		}
	}

	function persyaratan_pengadilan1() {
		$('[name="status_checked_pengadilan"]').val(1);
	}

	function persyaratan_pengadilan2() {
		// $('[name="status_checked_npwp"]').val(1);
		var checkBox = document.getElementById("persyaratan_pengadilan")
		if (checkBox.checked == true) {
			$('[name="status_checked_pengadilan"]').val(1);
		} else {
			$('[name="status_checked_pengadilan"]').val(0);
		}
	}


	function persyaratan_daftar_hitam1() {
		$('[name="status_checked_daftar_hitam"]').val(1);
	}

	function persyaratan_daftar_hitam2() {
		// $('[name="status_checked_npwp"]').val(1);
		var checkBox = document.getElementById("persyaratan_daftar_hitam_id")
		if (checkBox.checked == true) {
			$('[name="status_checked_daftar_hitam"]').val(1);
		} else {
			$('[name="status_checked_daftar_hitam"]').val(0);
		}
	}

	function persyaratan_pengalaman_pekerjaan() {
		var checkBox2 = document.getElementById("pengalaman_pekerjaan")
		if (checkBox2.checked == true) {
			$('[name="status_checked_pengalaman_pekerjaan"]').val(1);
			$('#keterangan_pengalaman_pekerjaan').prop('disabled', false)
		} else {
			$('[name="status_checked_pengalaman_pekerjaan"]').val(0);
			$('#keterangan_pengalaman_pekerjaan').prop('disabled', true)
		}

	}

	function persyaratan_pengalaman_pekerjaan2() {
		var checkBox = document.getElementById("persyaratan_pengalaman_pekerjaan")
		if (checkBox.checked == true) {
			$('[name="status_checked_pengalaman_pekerjaan"]').val(1);
			$('#persyaratan_pekerjaan').prop('disabled', false)
		} else {
			$('[name="status_checked_pengalaman_pekerjaan"]').val(0);
			$('#persyaratan_pekerjaan').prop('disabled', true)
		}
	}

	function tenaga_ahli1() {
		var checkBox2 = document.getElementById("tenaga_ahli")
		if (checkBox2.checked == true) {
			$('[name="status_checked_tenaga_ahli"]').val(1);
			$('#keterangan_tenaga_ahli').prop('disabled', false)
		} else {
			$('[name="status_checked_tenaga_ahli"]').val(0);
			$('#keterangan_tenaga_ahli').prop('disabled', true)
		}
	}

	function tenaga_ahli2() {
		var checkBox = document.getElementById("tenaga_ahli")
		if (checkBox.checked == true) {
			$('[name="status_checked_tenaga_ahli"]').val(1);
			$('#persyaratan_tenaga_ahli').prop('disabled', false)
		} else {
			$('[name="status_checked_tenaga_ahli"]').val(0);
			$('#persyaratan_tenaga_ahli').prop('disabled', true)
		}
	}

	function tenaga_teknis1() {
		var checkBox2 = document.getElementById("tenaga_teknis")
		if (checkBox2.checked == true) {
			$('[name="status_checked_tenaga_teknis"]').val(1);
			$('#keterangan_tenaga_teknis').prop('disabled', false)
		} else {
			$('[name="status_checked_tenaga_teknis"]').val(0);
			$('#keterangan_tenaga_teknis').prop('disabled', true)
		}
	}

	function tenaga_teknis2() {
		var checkBox = document.getElementById("tenaga_teknis")
		if (checkBox.checked == true) {
			$('[name="status_checked_tenaga_teknis"]').val(1);
			$('#persyaratan_tenaga_teknis').prop('disabled', false)
		} else {
			$('[name="status_checked_tenaga_teknis"]').val(0);
			$('#persyaratan_tenaga_teknis').prop('disabled', true)
		}
	}


	function fasilitas1() {
		var checkBox2 = document.getElementById("fasilitas")
		if (checkBox2.checked == true) {
			$('[name="status_checked_fasilitas"]').val(1);
			$('#keterangan_fasilitas').prop('disabled', false)
		} else {
			$('[name="status_checked_fasilitas"]').val(0);
			$('#keterangan_fasilitas').prop('disabled', true)
		}
	}

	function fasilitas2() {
		var checkBox = document.getElementById("fasilitias")
		if (checkBox.checked == true) {
			$('[name="status_checked_fasilitas"]').val(1);
			$('#keterangan_persyaratan_fasilitas').prop('disabled', false)
		} else {
			$('[name="status_checked_fasilitas"]').val(0);
			$('#keterangan_persyaratan_fasilitas').prop('disabled', true)
		}
	}
</script>

<script>
	function masa_berlaku_penawaran1() {
		var checkBox = document.getElementById("masa_berlaku_penawaran")
		if (checkBox.checked == true) {
			$('[name="status_checked_masa_berlaku_penawaran"]').val(1);
		} else {
			$('[name="status_checked_masa_berlaku_penawaran"]').val(0);
		}
	}

	function penawaran1() {
		var checkBox = document.getElementById("penawaran")
		if (checkBox.checked == true) {
			$('[name="status_checked_penawaran"]').val(1);
		} else {
			$('[name="status_checked_penawaran"]').val(0);
		}
	}

	function spesifikasi1() {
		var checkBox = document.getElementById("spesifikasi")
		if (checkBox.checked == true) {
			$('[name="status_checked_spesifikasi"]').val(1);
		} else {
			$('[name="status_checked_spesifikasi"]').val(0);
		}
	}

	function penyerahan1() {
		var checkBox = document.getElementById("penyerahan")
		if (checkBox.checked == true) {
			$('[name="status_checked_penyerahan"]').val(1);
		} else {
			$('[name="status_checked_penyerahan"]').val(0);
		}
	}

	function bagian_pekerjaan1() {
		var checkBox = document.getElementById("bagian_pekerjaan")
		if (checkBox.checked == true) {
			$('[name="status_checked_bagian_pekerjaan"]').val(1);
		} else {
			$('[name="status_checked_bagian_pekerjaan"]').val(0);
		}
	}

	function browsur1() {
		var checkBox = document.getElementById("browsur")
		if (checkBox.checked == true) {
			$('[name="status_checked_browsur"]').val(1);
		} else {
			$('[name="status_checked_browsur"]').val(0);
		}
	}

	function jaminan1() {
		var checkBox = document.getElementById("jaminan")
		if (checkBox.checked == true) {
			$('[name="status_checked_jaminan"]').val(1);
		} else {
			$('[name="status_checked_jaminan"]').val(0);
		}
	}

	function asuransi1() {
		var checkBox = document.getElementById("asuransi")
		if (checkBox.checked == true) {
			$('[name="status_checked_asuransi"]').val(1);
		} else {
			$('[name="status_checked_asuransi"]').val(0);
		}
	}

	function tenagateknis1() {
		var checkBox = document.getElementById("tenaga_teknis")
		if (checkBox.checked == true) {
			$('[name="status_checked_tenaga_teknis"]').val(1);
		} else {
			$('[name="status_checked_tenaga_teknis"]').val(0);
		}
	}

	function rekapitulasi1() {
		var checkBox = document.getElementById("rekapitulasi")
		if (checkBox.checked == true) {
			$('[name="status_checked_rekapitulasi"]').val(1);
		} else {
			$('[name="status_checked_rekapitulasi"]').val(0);
		}
	}
</script>

<!-- INI Untuk Persyaratan Kualifikasi Add Izin -->

<script>
	$(document).ready(function() { // Ketika halaman sudah diload dan siap
		var i = 1;
		$('#add_izin_usaha').click(function() {
			$('#dynamic_field1').append('<tr id="row' + i + '">' +
				'<td><input class="form-control" name="nama_persyaratan_tambahan[]" required></input></td>' +
				'<td><textarea class="form-control" name="keterangan_tambahan[]" required></textarea></td>' +
				'<td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn-sm btn_remove"><i class="fas fa-trash-alt"></i></button></td>' +
				'</tr>');
			i++;
		});
		$(document).on('click', '.btn_remove', function() {
			var button_id = $(this).attr("id");
			$('#row' + button_id + '').remove();
		});

	});
</script>

<script>
	$(document).ready(function() { // Ketika halaman sudah diload dan siap
		var i = 1;
		$('#add_persyaratan_kualifikasi').click(function() {
			i++;
			$('#dynamic_field2').append(
				'<tr id="row3' + i + '">' +
				'<th><div class="form-inline"> <input type="checkbox" class="mr-3" name="status_checked_persyaratan[]" value="1" "><input type="text" name="nama_status[]" style="outline: none;width:300px;font-size:18px;font-weight:bold; border:none"></div></th>' +
				'</tr>' +
				'<tr id="row2' + i + '">' +
				'<td><textarea class="form-control" name="nama_persyaratan_kualifikasi[]" ></textarea></td>' +
				'<td><button type="button" name="remove2" id="' + i + '" class="btn btn-danger btn-sm btn_remove2"><i class="fas fa-trash-alt"></i></button></td>' +
				'</tr>');
		});
		$(document).on('click', '.btn_remove2', function() {
			var button_id = $(this).attr("id");
			$('#row2' + button_id + '').remove();
			$('#row3' + button_id + '').remove();
		});

	});
</script>

<script>
	var modal_persyartan = $('#modal_persyartan');

	function editPersyaratan(id) {
		$.ajax({
			type: "GET",
			url: "<?= base_url('panitiajmtm/daftarpaket/get_by_id_persyartaan/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				$('[name="id_persyaratan_kualifikasi"]').val(response['persyaratan'].id_persyaratan_kualifikasi);
				$('[name="nama_status"]').val(response['persyaratan'].nama_status);
				$('[name="nama_persyaratan_kualifikasi"]').val(response['persyaratan'].nama_persyaratan_kualifikasi);
				$('[name="status_checked_persyaratan"]').val(response['persyaratan'].status_checked_persyaratan);
				modal_persyartan.modal('show');
			}
		})
	}


	var form_edit_persyaratan = $('#form_edit_persyaratan')
	form_edit_persyaratan.on('submit', function(e) {
		var id_paket = $('#danang').val();
		e.preventDefault();
		$.ajax({
			url: "<?php echo base_url(); ?>panitiajmtm/daftarpaket/update_persyaratan2",
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(data) {
				modal_persyartan.modal('hide');
				form_edit_persyaratan[0].reset();
				location.replace('<?= base_url('panitiajmtm/daftarpaket/persyaratankualifikasi/') ?>' + id_paket);
				message('success', 'Data Berhasil Di Update')
			}
		});
	});


	// hapushnya
	function hapusPersyaratan(id) {
		$.ajax({
			type: "GET",
			url: "<?= base_url('panitiajmtm/daftarpaket/get_by_id_persyartaan/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				PertanyaanDelete(response['persyaratan'].id_persyaratan_kualifikasi, response['persyaratan'].nama_persyaratan_kualifikasi);
			}
		})
	}

	// HAPUS DATA
	function PertanyaanDelete(id_persyaratan_kualifikasi, nama_persyaratan_kualifikasi) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nama_persyaratan_kualifikasi + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deletepersyartanya(id_persyaratan_kualifikasi);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deletepersyartanya(id_persyaratan_kualifikasi) {
		var id_paket = $('#soyun').val();
		$.ajax({
			type: "POST",
			url: "<?= base_url('panitiajmtm/daftarpaket/delete_pesyaratan2/') ?>" + id_persyaratan_kualifikasi,
			dataType: "JSON",
			success: function(response) {
				location.replace('<?= base_url('panitiajmtm/daftarpaket/persyaratankualifikasi/') ?>' + id_paket);
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}
</script>


<script>
	$(document).ready(function() {
		$('#id_metode_pemilihan').change(function() {
			var id_metode_pemilihan = $('#id_metode_pemilihan').val();
			$.ajax({
				type: 'GET',
				url: '<?= base_url('rup/dataKualifikasi/') ?>' + id_metode_pemilihan,
				success: function(html) {
					$('#id_kualifikasi').html(html);
				}
			});
		})
	})
</script>

<script>
	function hanyaAngka(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57)) {
			return false;
		}
		return true;
	}
</script>


<script>
	function dokumen_lengkap() {
		var checkBox = document.getElementById("nama_persyaratan")
		if (checkBox.checked == true) {
			$('[name="nama_persyaratan_dokumen_lengkap"]').val('Dokumen Lengkap');
		} else {
			$('[name="nama_persyaratan_dokumen_lengkap"]').val('');
		}
	}
</script>

<!-- INI UNYUK UPDATE ALL CHANGE -->
<script>
	$(document).ready(function() {

		function message(icon, text) {
			swal({
				title: "success!!!",
				text: text,
				icon: icon,
			});
		}


		document.getElementById("id_kualifikasi_usaha").onchange = function() {
			var kategori = $('[name="kualifikasi_usaha"]').val();
			$('[name="id_kualifikasi_usaha_terselek"]').val(kategori);
			update_kualifikasi_usaha_ajax()
		};

		var update_kualifikasi = $('#update_kualifikasi');

		function update_kualifikasi_usaha_ajax() {
			var reusable = $('#reusable').val();
			$.ajax({
				method: "POST",
				url: '<?= base_url('panitiajmtm/daftarpaket/update_kualifikasi/') ?>' + reusable,
				data: update_kualifikasi.serialize(),
				dataType: "JSON",
				success: function(response) {
					if (response == 'success') {
						message('success', 'Kualifikasi Usaha Berhasil Di Update');
					}
				},
				error: function() {
					console.log(error);
				}
			})
		}

		document.getElementById("bobot_teknis").onkeyup = function() {
			var si_bobot_teknis = $('[name="bobot_teknis"]').val();
			$('[name="bobot_teknis_form_new"]').val(si_bobot_teknis);
			update_bobot_teknis_usaha_ajax()
		};

		var update_bobot_teknis = $('#update_bobot_teknis');

		function update_bobot_teknis_usaha_ajax() {
			var reusable = $('#reusable').val();
			$.ajax({
				method: "POST",
				url: '<?= base_url('panitiajmtm/daftarpaket/update_bobot_teknis/') ?>' + reusable,
				data: update_bobot_teknis.serialize(),
				dataType: "JSON",
				success: function(response) {
					if (response == 'success') {
						// message('success', 'Kualifikasi Usaha Berhasil Di Update');
					}
				},
				error: function() {
					console.log(error);
				}
			})
		}

		document.getElementById("bobot_biaya").onkeyup = function() {
			var si_bobot_biaya = $('[name="bobot_biaya"]').val();
			$('[name="bobot_biaya_form_new"]').val(si_bobot_biaya);
			update_bobot_biaya_usaha_ajax()
		};

		var update_bobot_biaya = $('#update_bobot_biaya');

		function update_bobot_biaya_usaha_ajax() {
			var reusable = $('#reusable').val();
			$.ajax({
				method: "POST",
				url: '<?= base_url('panitiajmtm/daftarpaket/update_bobot_biaya/') ?>' + reusable,
				data: update_bobot_biaya.serialize(),
				dataType: "JSON",
				success: function(response) {
					if (response == 'success') {
						// message('success', 'Kualifikasi Usaha Berhasil Di Update');
					}
				},
				error: function() {
					console.log(error);
				}
			})
		}
	});

	function messageNIB(icon, text) {
		swal({
			title: "Gagal!!!",
			text: text,
			icon: icon,
		});
	}


	document.getElementById("nib_persyaratan").onchange = function() {
		var soyun1 = $('#soyun').val();
		var nib_persyaratan = $('[name="nib_persyaratan"]').val();
		var nib_terselek = $('[name="nib_terselek"]').val(nib_persyaratan);

		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/ambil_nib') ?>' + '/' + soyun1 + '/' + nib_persyaratan,
			dataType: "JSON",
			success: function(response) {
				if (response['ambil_nib']) {
					messageNIB('warning', 'Nomor Nib Sudah Terpilih!')
				} else {
					update_nib_terselek_method()
				}
			},
		})
	};

	var update_nib_terselek_var = $('#update_nib_terselek');

	function update_nib_terselek_method() {
		var soyun = $('#soyun').val();
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/update_nib/') ?>' + soyun,
			data: update_nib_terselek_var.serialize(),
			dataType: "JSON",
			success: function(response) {},
			error: function() {
				console.log(error);
			}
		})
	}

	setInterval(() => {
		table_nib_persyaratan()
	}, 500);

	function table_nib_persyaratan() {
		var soyun60 = $('#soyun').val();
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/ambil_nib2/') ?>' + soyun60,
			dataType: "JSON",
			success: function(response) {
				var html = '';
				var x = 0;
				var i;
				for (i = 0; i < response['ambil_nib_result'].length; i++) {
					html += '<tr><th>' + response['ambil_nib_result'][i].nomor_nib_undangan + '</th>' +
						'<th><a href="javascript:;" onclick="haspus_nib(' + response['ambil_nib_result'][i].id_nib_undangan + ')"><i class="fas fa fa-trash text-danger"></i></a></th></tr>';

				}
				$('#table_nib').html(html);
			},

		})
	}

	function haspus_nib(id) {
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/delete_nib/') ?>' + id,
			dataType: "JSON",
			success: function(response) {
				message('success', 'Berhasil Di Hapus');
			},

		})
	}
</script>

<!-- pilih penyedia -->
<script>
	var saveData;
	var table_pilih_penyedia_penunjukan_langsung = $('#table_pilih_penyedia_penunjukan_langsung');
	var btnsave = $('#btnSave');
	var id_paketkusaja = $('#id_paketkusaja').val();
	var table_pilih_penyedia_tender_terbatas = $('#table_pilih_penyedia_tender_terbatas');

	$(document).ready(function() {
		table_pilih_penyedia_tender_terbatas.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"info": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url('panitiajmtm/daftarpaket/getdata_all_vendor_tender_terbatas/') ?>" + id_paketkusaja,
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

	$(document).ready(function() {
		table_pilih_penyedia_penunjukan_langsung.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"info": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url('panitiajmtm/daftarpaket/getdata_all_vendor_penunjukan_langsung/') ?>" + id_paketkusaja,
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

	// UNTUK MELIHAT VENDOR LAMA DAN BARU YANG DI PILIH
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
				"url": "<?= base_url('panitiajmtm/daftarpaket/getdata_penyedia_baru/') ?>" + id_paketkusaja,
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
				"url": "<?= base_url('panitiajmtm/daftarpaket/getdata_penyedia_terplilih/') ?>" + id_paketkusaja,
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


	function relodtable_penyedia_baru() {
		table_penyedia_baru.DataTable().ajax.reload();
	}

	function relodtable_pilih_penyedia_tender_terbatas() {
		table_pilih_penyedia_tender_terbatas.DataTable().ajax.reload();
	}

	function relodtable_penyedia_lama() {
		table_penyedia_lama_dipilih.DataTable().ajax.reload();
	}

	var form_tambah_penyedia = $('#form_tambah_penyedia');

	function simpan_pilih_penyedia() {
		var id_paketkusaja = $('#id_paketkusaja').val();
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/save_pilih_penyedia_baru/') ?>' + id_paketkusaja,
			data: form_tambah_penyedia.serialize(),
			dataType: "JSON",
			beforeSend: function() {
				$('#btnSave').attr('disabled', 'disabled');
			},
			success: function(response) {
				if (response == 'success') {
					modal_tambah_penyedia.modal('hide');
					message('success', 'Vendor Baru Berhasil Di Tambah');
					relodtable_penyedia_baru();
					form_tambah_penyedia[0].reset();
					$('#btnSave').attr('disabled', false);
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

	var form_edit_penyedia = $('#form_edit_penyedia');

	function edit_pilih_penyedia() {
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/edit_pilih_penyedia_baru') ?>',
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
	function simpan_pilih_penyedia_lama() {
		var id_paketkusaja = $('#id_paketkusaja').val();
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/save_pilih_penyedia_lama/') ?>' + id_paketkusaja,
			data: form_tambah_penyedia_lama.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Vendor Berhasil Di Pilih');
					relodtable_penyedia_lama();
					relodtable_pilih_penyedia_tender_terbatas()
					form_tambah_penyedia_lama[0].reset();
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}




	function by_id_vendor_lama(id, type, id_mengikuti_paket) {
		var id_paketkusaja = $('#id_paketkusaja').val();
		if (type == 'tambah_vendor_lama') {
			saveData = 'tambah_vendor_lama';
		}
		if (type == 'hapus_vendor') {
			saveData = 'hapus_vendor';
		}
		if (type == 'hapus_vendor_terbatas') {
			saveData = 'hapus_vendor_terbatas';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('panitiajmtm/daftarpaket/by_id_vendor_lama/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'tambah_vendor_lama') {
					$('[name="id_mengikuti_vendor"]').val(response['get_vendor_lama'].id_vendor);
					simpan_pilih_penyedia_lama();
				}
				if (type == 'hapus_vendor') {
					delete_vendor_lama_question(id_paketkusaja, response['get_vendor_lama'].username_vendor);
				}
				if (type == 'hapus_vendor_terbatas') {
					delete_vendor_lama_question_terbatas(id_paketkusaja, response['get_vendor_lama'].username_vendor, id_mengikuti_paket);

				}
			}
		})
	}

	function delete_vendor_lama_question_terbatas(id_mengikuti_paket_vendor, username_vendor, id_mengikuti_paket) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Merevisi Vendor Terpilih   " + username_vendor + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					delete_vendor_lama_terbatas(id_mengikuti_paket);
				} else {
					message('success', 'Data Tidak Jadi Di Revisi, Vendor Aman!!')
				}
			});
	}

	function delete_vendor_lama_terbatas(id_mengikuti_paket) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('panitiajmtm/daftarpaket/delete_vendor_baru_terbatas/') ?>" + id_mengikuti_paket,
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					relodtable_penyedia_lama();
					relodtable_pilih_penyedia_tender_terbatas()
					message('success', 'Data Berhasil Di Hapus');
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
			url: "<?= base_url('panitiajmtm/daftarpaket/by_id_vendor_baru/'); ?>" + id,
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
			url: "<?= base_url('panitiajmtm/daftarpaket/delete_vendor_lama/') ?>" + id_mengikuti_paket_vendor,
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
			url: "<?= base_url('panitiajmtm/daftarpaket/delete_vendor_baru/') ?>" + id_mengikuti_vendor,
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

<script>
	var id_paket_penunjukan = $('#id_paket_penunjukan').val();

	function pilih_penyedia_penunjukan_langsung() {
		location.replace('<?= base_url('panitiajmtm/daftarpaket/tambah_penyedia/') ?>' + id_paket_penunjukan);
	}
</script>

<!-- INI UNTUK MEMBUAT RINCIAN HPS PENUNJUAN LANGSUNG -->
<script>
	function BuatRincianHps() {
		var id_paket = $('#id_paket_penunjukan').val();
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
</script>

<!-- INI UNTUK UPDATE  Kategori Penyedia dan alasan penunjukan-->
<script>
	$(document).ready(function() {

		function message(icon, text) {
			swal({
				title: "success!!!",
				text: text,
				icon: icon,
			});
		}
		document.getElementById("kategori_penyedia").onchange = function() {
			var kategori_penyedia_penunjukan = $('[name="kategori_penyedia"]').val();
			$('[name="kategori_penyedia_terselek"]').val(kategori_penyedia_penunjukan);
			update_kategori_penyedia_penunjukan_ajax()
		};

		var form_update_kategoti_penyedia_penunjukan = $('#form_update_kategoti_penyedia_penunjukan');

		function update_kategori_penyedia_penunjukan_ajax() {
			var data_id = $('#id_paket_penunjukan').val();
			$.ajax({
				method: "POST",
				url: '<?= base_url('panitiajmtm/daftarpaket/update_kategoti_penyedia_penunjukan/') ?>' + data_id,
				data: form_update_kategoti_penyedia_penunjukan.serialize(),
				dataType: "JSON",
				success: function(response) {
					if (response == 'success') {
						message('success', 'Kategori Penyedia Berhasil Di Update');
					}
				},
				error: function() {
					console.log(error);
				}
			})
		}

		document.getElementById("alasan_penunjukan_langsung").onkeyup = function() {
			var alasan_penunjukan_langsung = $('[name="alasan_penunjukan_langsung"]').val();
			$('[name="alasan_penunjukan_langsung_save"]').val(alasan_penunjukan_langsung);
			update_alasan_penunjukan_langsung()
		};

		var form_update_alasan_penunjukan_langsung = $('#form_update_alasan_penunjukan_langsung');

		function update_alasan_penunjukan_langsung() {
			var data_id2 = $('#id_paket_penunjukan').val();
			$.ajax({
				method: "POST",
				url: '<?= base_url('panitiajmtm/daftarpaket/update_alasan_penunjukan_langsung/') ?>' + data_id2,
				data: form_update_alasan_penunjukan_langsung.serialize(),
				dataType: "JSON",
				success: function(response) {
					if (response == 'success') {

					}
				},
				error: function() {
					console.log(error);
				}
			})
		}
	});
</script>

<!-- INNI UNTUK UPLOAD DOKUMEN PENUNJANG -->
<script>
	function message(icon, text) {
		swal({
			title: "success!!!",
			text: text,
			icon: icon,
		});
	}
	var table_dokumen_penunjang = $('#table_dokumen_penunjang');
	var id_paket_dokumen_penunjang = $('#id_paket_penunjukan').val();
	$(document).ready(function() {
		table_dokumen_penunjang.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"info": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url('panitiajmtm/daftarpaket/getdatatable_dokumen_penunjang/') ?>" + id_paket_dokumen_penunjang,
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

	function reload_table_dokumen_penunjang() {
		table_dokumen_penunjang.DataTable().ajax.reload();
	}
	var form_dokumen_penunjang = $('#form_dokumen_penunjang');
	form_dokumen_penunjang.on('submit', function(e) {
		e.preventDefault();
		var id_paket_dokumen_penunjang = $('#id_paket_penunjukan').val();
		if ($('.file_dokumen_penunjang').val() == '') {
			$('#error_file_penunjang').show();
			setTimeout(function() {
				$('#error_file_penunjang').hide();
			}, 4000);
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>panitiajmtm/daftarpaket/upload_dokumen_penunjang/" + id_paket_dokumen_penunjang,
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				beforeSend: function() {
					$('#upload_penunjang').attr('disabled', 'disabled');
					$('#process_penunjang').css('display', 'block');
					$('#sedang_dikirim_penunjang').show();
				},
				success: function(response) {
					var percentage = 0;
					var timer = setInterval(function() {
						percentage = percentage + 20;
						progress_bar_process_penunjang(percentage, timer);
					}, 1000);
				}
			});
		}
	});



	function by_id_dokumen_penunjang(id, type) {
		if (type == 'hapus_penunjang') {
			saveData = 'hapus_penunjang';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('panitiajmtm/daftarpaket/by_id_dokumen_penunjang/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'hapus_penunjang') {
					Question_delete_dokumen_penunjang(response['get_dokumen'].id_dokumen_penunjang, response['get_dokumen'].nama_dokumen_penunjang);
				}
			}
		})
	}

	// HAPUS DATA 
	function Question_delete_dokumen_penunjang(id_dokumen_penunjang, nama_dokumen_penunjang) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Dokumen " + nama_dokumen_penunjang + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					delete_dokumen_penunjang(id_dokumen_penunjang);
				} else {
					message('success', 'Dokumen Tidak Jadi Di Hapus, Dokumen Aman!!')
				}
			});
	}

	function delete_dokumen_penunjang(id_dokumen_penunjang) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('panitiajmtm/daftarpaket/delete_dokumen_penunjang/') ?>" + id_dokumen_penunjang,
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					reload_table_dokumen_penunjang();
					message('success', 'Dokumen Berhasil Di Delete');
				}
			}
		})
	}

	function progress_bar_process_penunjang(percentage, timer) {
		$('.progress-bar').css('width', percentage + '%');
		if (percentage > 100) {
			clearInterval(timer);
			$('#form_dokumen_penunjang')[0].reset();
			$('#process_penunjang').css('display', 'none');
			$('#sedang_dikirim_penunjang').show();
			$('.progress-bar').css('width', percentage + '%');
			$('#upload_penunjang').attr('disabled', false);
			message('success', 'Dokumen Berhasil Di Upload');
			reload_table_dokumen_penunjang();
		}
	}
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
				if (response == 'success') {
					message('success', 'Berhasil Mengirim Permintaan Persetujuan');
					location.reload();
				}
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
			success: function(response) {
				if (response == 'success') {
					message('success', 'Berhasil Menyetujui Paket');
					location.reload();
				}
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
				window.open('https://api.whatsapp.com/send?phone=+62' + response['telpon'].telepon + '&text=Permintaan Persetujuan Paket : ' + response['paket'].nama_paket + 'Metode Pemilihan : ' + response['paket'].nama_metode_pemilihan + 'Cek Detail Persetujuan https://eproc.jmtm.co.id/', '_blank');
				message('success', 'Berhasil Mengirim Ulang Persetujuan');
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
			success: function(response) {
				if (response == 'success') {
					message('success', 'Alasan / Pembatalan Berhasil Di Kirim');
					location.reload();
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}
</script>
<!-- 
<script>
	var form_umumkan_paket_transaksi_langsung = $('#form_umumkan_paket_transaksi_langsung');

	function Umumkan_paket_transaksi_langsung() {
		var id_paketkusaja = $('#id_paketkusaja').val();
		$.ajax({
			method: "POST",
			url: '<?= base_url('paket/umumkan_paket_transaksi_langsung/') ?>' + id_paketkusaja,
			data: form_umumkan_paket_transaksi_langsung.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Paket Berhasil Di Umumkan');
					location.reload();
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}
</script> -->
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
		var reusable = $('#reusable').val();
		$.ajax({
			method: "POST",
			url: '<?= base_url('paket/minta_persetujuan_manager/') ?>' + reusable,
			data: form_minta_persetujuan_manager.serialize(),
			dataType: "JSON",
			success: function(response) {
				message('success', 'Berhasil Mengirim Permintaan Persetujuan');
				window.open('https://api.whatsapp.com/send?phone=+62' + response['telpon'].telepon + '&text=Permintaan Persetujuan Paket : ' + response['paket'].nama_paket + ' Dengan Metode Pemilihan : ' + response['paket'].nama_metode_pemilihan + ' Cek Detail Persetujuan http://jmtm-eproc.kintekindo.net/', '_blank');
				location.reload();
			},
			error: function() {
				console.log(error);
			}
		})
	}

	function SetujuiPaketTransaksiLangsung() {
		var reusable = $('#reusable').val();
		$.ajax({
			method: "POST",
			url: '<?= base_url('paket/persetujuan_manager/') ?>' + reusable,
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Berhasil Menyetujui Paket');
					location.reload();
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}

	function Kirim_perintaan_persetujuan2() {
		var reusable = $('#reusable').val();
		$.ajax({
			method: "POST",
			url: '<?= base_url('paket/minta_persetujuan_manager/') ?>' + reusable,
			data: form_minta_persetujuan_manager.serialize(),
			dataType: "JSON",
			success: function(response) {
				message('success', 'Berhasil Mengirim Permintaan Persetujuan');
				window.open('https://api.whatsapp.com/send?phone=+62' + response['telpon'].telepon + '&text=Permintaan Persetujuan Paket : ' + response['paket'].nama_paket + ' Dengan Metode Pemilihan : ' + response['paket'].nama_metode_pemilihan + ' Cek Detail Persetujuan http://jmtm-eproc.kintekindo.net/', '_blank');
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
		var reusable = $('#reusable').val();
		$.ajax({
			method: "POST",
			url: '<?= base_url('paket/kirim_alasan_revisi_paket/') ?>' + reusable,
			data: form_kirim_alasan_revisi_paket.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Alasan / Pembatalan Berhasil Di Kirim');
					location.reload();
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}
</script>

<script>
	for (let i = 1; i < 99; i++) {
		document.getElementById("seumur_hidup" + i).onchange = function() {
			var sumur = $('#seumur_hidup' + i).val();
			if (sumur == 1) {
				$('#seumur_hidup' + i).val(1);
				$('#berlaku_mulai' + i).hide();
				$('#berlaku_selesai' + i).hide();
			} else {
				$('#seumur_hidup' + i).val(0);
				$('#berlaku_mulai' + i).show();
				$('#berlaku_selesai' + i).show();
			}
		};
	}
</script>
<!-- MULAI BERLAKU -->

<script>
	// INI UPDATE KELAKUAN
	function update_masa_berlaku(id) {
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/update_masa_berlaku/') ?>' + id,
			dataType: "JSON",
			success: function(response) {
				$('[name="id_persyaratan_vms_detail_second"]').val(response['get_row_persyartan'].id_persyaratan_vms_detail);
				seumur_hidup_diubah();
			}
		})
	}

	function message(icon, text) {
		swal({
			title: "success!!!",
			text: text,
			icon: icon,
		});
	}
	var update_ke_persyartan_seumur_hidup = $('#update_ke_persyartan_seumur_hidup');

	function seumur_hidup_diubah() {
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/update_seumur_idup') ?>',
			data: update_ke_persyartan_seumur_hidup.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					location.reload();
				}
			}
		})
	}
</script>

<script>
	// INI UPDATE KELAKUAN
	function update_masa_berlaku2(id) {
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/update_masa_berlaku/') ?>' + id,
			dataType: "JSON",
			success: function(response) {
				$('[name="id_persyaratan_vms_detail_second"]').val(response['get_row_persyartan'].id_persyaratan_vms_detail);
				seumur_hidup_diubah2();
			}
		})
	}

	function message(icon, text) {
		swal({
			title: "success!!!",
			text: text,
			icon: icon,
		});
	}
	var update_ke_persyartan_seumur_hidup2 = $('#update_ke_persyartan_seumur_hidup');

	function seumur_hidup_diubah2() {
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/update_seumur_idup2') ?>',
			data: update_ke_persyartan_seumur_hidup2.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					location.reload();
				}
			}
		})
	}
</script>

<script>
	var modal_tahun_update = $('#modal_update_masa_berlaku')

	function update_masa_tahun(id) {
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/update_masa_berlaku/') ?>' + id,
			dataType: "JSON",
			success: function(response) {
				$('[name="id_persyaratan_vms_detail_for_tahun"]').val(response['get_row_persyartan'].id_persyaratan_vms_detail);
				$('[name="tanggal_berlaku_awal_for_tahun"]').val(response['get_row_persyartan'].tanggal_berlaku_awal);
				$('[name="tanggal_berlaku_selesai_for_tahun"]').val(response['get_row_persyartan'].tanggal_berlaku_selesai);
				$('[name="tanggal_berlaku_awal_for_tahun"]').html(
					'<option value="' + response['get_row_persyartan'].tanggal_berlaku_awal + '">' + response['get_row_persyartan'].tanggal_berlaku_awal + '</option>' +
					'<option value="2018">2018</option>' +
					'<option value="2019">2019</option>' +
					'<option value="2020">2020</option>' +
					'<option value="2021">2021</option>' +
					'<option value = "2022"> 2022 </option>' +
					'<option value = "2023"> 2023 </option> ' +
					'<option value = "2024"> 2024 </option> ' +
					'<option value = "2025"> 2025 </option> ' +
					'<option value = "2026"> 2026 </option> ' +
					'<option value = "2027"> 2027 </option>' +
					'<option value = "2028"> 2028 </option> ' +
					'<option value = "2029"> 2029 </option> ' +
					'<option value = "2030"> 2030 </option>'
				);
				$('[name="tanggal_berlaku_selesai_for_tahun"]').html(
					'<option value="' + response['get_row_persyartan'].tanggal_berlaku_selesai + '">' + response['get_row_persyartan'].tanggal_berlaku_selesai + '</option>' +
					'<option value="2018">2018</option>' +
					'<option value="2019">2019</option>' +
					'<option value="2020">2020</option>' +
					'<option value="2021">2021</option>' +
					'<option value = "2022"> 2022 </option>' +
					'<option value = "2023"> 2023 </option> ' +
					'<option value = "2024"> 2024 </option> ' +
					'<option value = "2025"> 2025 </option> ' +
					'<option value = "2026"> 2026 </option> ' +
					'<option value = "2027"> 2027 </option>' +
					'<option value = "2028"> 2028 </option> ' +
					'<option value = "2029"> 2029 </option> ' +
					'<option value = "2030"> 2030 </option>'
				);
				modal_tahun_update.modal('show');
				// Modal hide reload
			}
		})
	}

	var form_update_tahun_persyaratan = $('#form_update_tahun_persyaratan')
	form_update_tahun_persyaratan.on('submit', function(e) {
		e.preventDefault();
		$.ajax({
			url: "<?php echo base_url(); ?>panitiajmtm/daftarpaket/update_tahun_berlaku",
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(data) {
				modal_tahun_update.modal('hide');
				location.reload();
			}
		});
	});
</script>

<script>
	function lihat_vendor_ke_undang(id) {
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/by_id_persyaratan_vendor_ke_undang/') ?>' + id,
			dataType: "JSON",
			success: function(response) {
				var vendor_ke_undang = $('#vendor_ke_undang');
				var table_vendor_terundang_persyaratan = $('#table_vendor_terundang_persyaratan');
				$(document).ready(function() {
					table_vendor_terundang_persyaratan.DataTable({
						"responsive": true,
						"autoWidth": false,
						"processing": true,
						"serverSide": true,
						"info": false,
						"order": [],
						"ajax": {
							"url": "<?= base_url('panitiajmtm/daftarpaket/datatable_vendor_persyaratan_terundang/') ?>" + response['vendor'].id_paket,
							"type": "POST"
						},
						"columnDefs": [{
							"target": [-1],
							"orderable": false
						}],
						"oLanguage": {
							"sSearch": "Pencarian : ",
							"sEmptyTable": "Tidak Ada Vendor Yang Sesuai Persyaratan",
							"sLoadingRecords": "Silahkan Tunggu - loading...",
							"sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
							"sZeroRecords": "Tidak Ada Vendor Yang Sesuai Persyaratan",
							"sProcessing": "Memuat Data...."
						}
					});
				});
				vendor_ke_undang.modal('show');
				vendor_ke_undang.on('hidden.bs.modal', function() {
					location.reload();
				})
			}
		})
	}
</script>

<script>
	var form_data_save_tender_ulang = $('#form_data_save_tender');

	function SimpanTender_ulang() {
		var id_paket_save_tender_ulang = $('#id_paket_save_tender').val()

		var id_kualifikasi_usaha = $('#id_kualifikasi_usaha').val()
		var bobot_teknis = $('#bobot_teknis').val()
		var bobot_biaya = $('#bobot_biaya').val()
		$.ajax({
			method: "POST",
			url: "<?= base_url("panitiajmtm/daftarpaket/update_save_tender_ulang/") ?>" + id_paket_save_tender_ulang,
			data: {
				bobot_teknis: bobot_teknis,
				bobot_biaya: bobot_biaya,
				kualifikasi_usaha: id_kualifikasi_usaha
			},
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Paket Tender Berhasil Di Umumkan Ulang')
					location.replace('<?= base_url('panitiajmtm/daftarpaket') ?>');
				} else {
					$("#kualifikasi_usaha_error").html(response.kualifikasi_usaha);
					$("#bobot_teknis_error").html(response.bobot_teknis);
					$("#bobot_biaya_error").html(response.bobot_biaya);
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}
</script>

<script>
	table_sbu()

	function table_sbu() {
		var reusable = $('#reusable').val();
		console.log(reusable);
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/ambil_sbu/') ?>' + reusable,
			dataType: "JSON",
			success: function(response) {
				var html2 = '';
				var x = 0;
				var i;
				for (i = 0; i < response['sbu_paket'].length; i++) {
					html2 += '<tr><td>' + response['sbu_paket'][i].kode_sbu + ' | ' + response['sbu_paket'][i].nama_sbu + '</td>' +
						'<td>' + response['sbu_paket'][i].kualifikasi_usaha_sbu_detail + '</td>' +
						'<td> <?php if ($paket['status_paket_tender'] == 2) { ?><?php } else { ?> <a href="javascript:;" onclick="hapus_sbu(' + response['sbu_paket'][i].id_paket_sbu_detail + ')"><i class="fas fa fa-trash text-danger"></i></a>  <?php } ?><td><tr>';

				}
				$('#table_sbu').html(html2);
			},

		})
	}

	function hapus_sbu(id) {
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/delete_sbu/') ?>' + id,
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message_deleteSBU('success', 'Berhasil Di Hapus');
					table_sbu()
				} else {

				}

			},
		})

	}

	function message_deleteSBU(icon, text) {
		swal({
			title: "success!!!",
			text: text,
			icon: icon,
		});
	}

	function messagegagalsbu(icon, text) {
		swal({
			title: "Gagal!!!",
			text: text,
			icon: icon,
		});
	}


	document.getElementById("id_sbu").onchange = function() {
		var id_sbu = $('[name="id_sbu"]').val();
		$('[name="id_sbu_selected"]').val(id_sbu);

	};
	document.getElementById("sbu_kualifikasi_usaha_sbu").onchange = function() {
		var value_kaulifikasi_usaha_detail = $('[name="kualifikasi_usaha_sbu_detail"]').val();
		$('[name="kualifikasi_usaha_sbu_detail_selected"]').val(value_kaulifikasi_usaha_detail);
		insert_sbu()
	};



	function insert_sbu() {
		var reusable = $('#reusable').val();
		var sbu_form_real = $('#sbu_form_real')
		if ($('[name="id_sbu_selected"]').val() == '') {
			messagegagalsbu('warning', 'Anda Belum Memilih Sbu!');
		} else {
			$.ajax({
				method: "POST",
				url: '<?= base_url('panitiajmtm/daftarpaket/insert_sbu/') ?>' + reusable,
				data: sbu_form_real.serialize(),
				dataType: "JSON",
				success: function(response) {
					if (response == 'success') {
						message('success', 'Data Berhasil Dipilih!');
						sbu_form_real[0].reset();
						table_sbu()
					} else if (response == 'gagal') {
						messagegagalsbu('warning', 'Data Sudah Dipilih Silahkan Pilih Yang Lain!');
						sbu_form_real[0].reset();
						table_sbu()
					}
				},
				error: function() {
					console.log(error);
				}
			})
		}

	}
</script>

<!-- buat checked persyaratan detail -->
<script>
	$("#persyaratan_checked1").click(function() {
		var get_id_persyaratan_detail = $('#id_persyaratan_vms_detail1').val()
		var form_update_perysaratan = $('#form_update_perysaratan');
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/update_persyaratan_vms_detail/') ?>' + get_id_persyaratan_detail,
			data: form_update_perysaratan.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					// message('success', 'Data Berhasil Diubah!');
				} else if (response == 'gagal') {

				}
			}
		})
	});

	$("#persyaratan_checked2").click(function() {
		var get_id_persyaratan_detail = $('#id_persyaratan_vms_detail2').val()
		var form_update_perysaratan = $('#form_update_perysaratan');
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/update_persyaratan_vms_detail/') ?>' + get_id_persyaratan_detail,
			data: form_update_perysaratan.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					// message('success', 'Data Berhasil Diubah!');
				} else if (response == 'gagal') {

				}
			}
		})
	});

	$("#persyaratan_checked3").click(function() {
		var get_id_persyaratan_detail = $('#id_persyaratan_vms_detail3').val()
		var form_update_perysaratan = $('#form_update_perysaratan');
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/update_persyaratan_vms_detail/') ?>' + get_id_persyaratan_detail,
			data: form_update_perysaratan.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					// message('success', 'Data Berhasil Diubah!');
				} else if (response == 'gagal') {

				}
			}
		})
	});

	$("#persyaratan_checked4").click(function() {
		var get_id_persyaratan_detail = $('#id_persyaratan_vms_detail4').val()
		var form_update_perysaratan = $('#form_update_perysaratan');
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/update_persyaratan_vms_detail/') ?>' + get_id_persyaratan_detail,
			data: form_update_perysaratan.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					// message('success', 'Data Berhasil Diubah!');
				} else if (response == 'gagal') {

				}
			}
		})
	});

	$("#persyaratan_checked5").click(function() {
		var get_id_persyaratan_detail = $('#id_persyaratan_vms_detail5').val()
		var form_update_perysaratan = $('#form_update_perysaratan');
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/update_persyaratan_vms_detail/') ?>' + get_id_persyaratan_detail,
			data: form_update_perysaratan.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					// message('success', 'Data Berhasil Diubah!');
				} else if (response == 'gagal') {

				}
			}
		})
	});

	$("#persyaratan_checked6").click(function() {
		var get_id_persyaratan_detail = $('#id_persyaratan_vms_detail6').val()
		var form_update_perysaratan = $('#form_update_perysaratan');
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/update_persyaratan_vms_detail/') ?>' + get_id_persyaratan_detail,
			data: form_update_perysaratan.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					// message('success', 'Data Berhasil Diubah!');
				} else if (response == 'gagal') {

				}
			}
		})
	});

	$("#persyaratan_checked7").click(function() {
		var get_id_persyaratan_detail = $('#id_persyaratan_vms_detail7').val()
		var form_update_perysaratan = $('#form_update_perysaratan');
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/update_persyaratan_vms_detail/') ?>' + get_id_persyaratan_detail,
			data: form_update_perysaratan.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					// message('success', 'Data Berhasil Diubah!');
				} else if (response == 'gagal') {

				}
			}
		})
	});

	$("#persyaratan_checked8").click(function() {
		var get_id_persyaratan_detail = $('#id_persyaratan_vms_detail8').val()
		var form_update_perysaratan = $('#form_update_perysaratan');
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/update_persyaratan_vms_detail/') ?>' + get_id_persyaratan_detail,
			data: form_update_perysaratan.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					// message('success', 'Data Berhasil Diubah!');
				} else if (response == 'gagal') {

				}
			}
		})
	});

	$("#persyaratan_checked9").click(function() {
		var get_id_persyaratan_detail = $('#id_persyaratan_vms_detail9').val()
		var form_update_perysaratan = $('#form_update_perysaratan');
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/update_persyaratan_vms_detail/') ?>' + get_id_persyaratan_detail,
			data: form_update_perysaratan.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					// message('success', 'Data Berhasil Diubah!');
				} else if (response == 'gagal') {

				}
			}
		})
	});

	$("#persyaratan_checked10").click(function() {
		var get_id_persyaratan_detail = $('#id_persyaratan_vms_detail10').val()
		var form_update_perysaratan = $('#form_update_perysaratan');
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/update_persyaratan_vms_detail/') ?>' + get_id_persyaratan_detail,
			data: form_update_perysaratan.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					// message('success', 'Data Berhasil Diubah!');
				} else if (response == 'gagal') {

				}
			}
		})
	});

	$("#persyaratan_checked11").click(function() {
		var get_id_persyaratan_detail = $('#id_persyaratan_vms_detail11').val()
		var form_update_perysaratan = $('#form_update_perysaratan');
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/update_persyaratan_vms_detail/') ?>' + get_id_persyaratan_detail,
			data: form_update_perysaratan.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					// message('success', 'Data Berhasil Diubah!');
				} else if (response == 'gagal') {

				}
			}
		})
	});

	$("#persyaratan_checked12").click(function() {
		var get_id_persyaratan_detail = $('#id_persyaratan_vms_detail12').val()
		var form_update_perysaratan = $('#form_update_perysaratan');
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/update_persyaratan_vms_detail/') ?>' + get_id_persyaratan_detail,
			data: form_update_perysaratan.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					// message('success', 'Data Berhasil Diubah!');
				} else if (response == 'gagal') {

				}
			}
		})
	});

	$("#persyaratan_checked13").click(function() {
		var get_id_persyaratan_detail = $('#id_persyaratan_vms_detail13').val()
		var form_update_perysaratan = $('#form_update_perysaratan');
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/update_persyaratan_vms_detail/') ?>' + get_id_persyaratan_detail,
			data: form_update_perysaratan.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					// message('success', 'Data Berhasil Diubah!');
				} else if (response == 'gagal') {

				}
			}
		})
	});

	function message(icon, text) {
		swal({
			title: "success!!!",
			text: text,
			icon: icon,
		});
	}

	// 30-juni-2022 update_kualifikasi
	function update_status_peralatan(id) {
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/update_sts_peralatan/') ?>' + id,
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Berhasil', 'Berhasil Menambah Persyaratan');
					location.reload()
				}
			},
		})
	}

	function unupdate_status_peralatan(id) {
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/unupdate_sts_peralatan/') ?>' + id,
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Berhasil', 'Batal Menambah Persyaratan');
					location.reload()
				}
			},
		})
	}

	function update_status_tenaga_ahli(id) {
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/update_sts_tenaga_ahli/') ?>' + id,
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Berhasil', 'Berhasil Menambah Persyaratan');
					location.reload()
				}
			},
		})
	}

	function unupdate_status_tenaga_ahli(id) {
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/daftarpaket/unupdate_sts_tenaga_ahli/') ?>' + id,
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Berhasil', 'Batal Menambah Persyaratan');
					location.reload()
				}
			},
		})
	}
</script>