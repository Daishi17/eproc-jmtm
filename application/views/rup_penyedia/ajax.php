<script>
	$(document).ready(function() {
		$('#rup_penyedia').DataTable({});
	});
	//    $(document).on("click", "ul li", function () {
	// 	$(this).addClass("active").siblings().removeClass("active");
	// });
	$(function() {
		//Initialize Select2 Elements
		$('.select2').select2()

		//Initialize Select2 Elements
		$(".select2bs4").select2({
			theme: 'bootstrap4'
		})
	})
	$(document).ready(function() {
		window.setTimeout(function() {
			$(".preloader").fadeTo(500, 0).slideUp(500, function() {
				$(this).remove();
			});
		}, 2000)
	})
</script>
<!-- fade alert -->
<script>
	window.setTimeout(function() {
		$(".alert").fadeTo(500, 0).slideUp(500, function() {
			$(this).remove();
		});
	}, 2000)
</script>

<script>
	$(function() {
		var Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000
		});

		$('.swalDefaultSuccess').click(function() {
			Toast.fire({
				icon: 'success',
				title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
			})
		});
		$('.swalDefaultInfo').click(function() {
			Toast.fire({
				icon: 'info',
				title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
			})
		});
		$('.swalDefaultError').click(function() {
			Toast.fire({
				icon: 'error',
				title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
			})
		});
		$('.swalDefaultWarning').click(function() {
			Toast.fire({
				icon: 'warning',
				title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
			})
		});
		$('.swalDefaultQuestion').click(function() {
			Toast.fire({
				icon: 'question',
				title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
			})
		});


		$('.toastrDefaultSuccess').click(function() {
			toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
		});
		$('.toastrDefaultInfo').click(function() {
			toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
		});
		$('.toastrDefaultError').click(function() {
			toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
		});
		$('.toastrDefaultWarning').click(function() {
			toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
		});

		$('.toastsDefaultDefault').click(function() {
			$(document).Toasts('create', {
				title: 'Toast Title',
				body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
			})
		});
		$('.toastsDefaultTopLeft').click(function() {
			$(document).Toasts('create', {
				title: 'Toast Title',
				position: 'topLeft',
				body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
			})
		});
		$('.toastsDefaultBottomRight').click(function() {
			$(document).Toasts('create', {
				title: 'Toast Title',
				position: 'bottomRight',
				body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
			})
		});
		$('.toastsDefaultBottomLeft').click(function() {
			$(document).Toasts('create', {
				title: 'Toast Title',
				position: 'bottomLeft',
				body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
			})
		});
		$('.toastsDefaultAutohide').click(function() {
			$(document).Toasts('create', {
				title: 'Toast Title',
				autohide: true,
				delay: 750,
				body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
			})
		});
		$('.toastsDefaultNotFixed').click(function() {
			$(document).Toasts('create', {
				title: 'Toast Title',
				fixed: false,
				body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
			})
		});
		$('.toastsDefaultFull').click(function() {
			$(document).Toasts('create', {
				body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
				title: 'Toast Title',
				subtitle: 'Subtitle',
				icon: 'fas fa-envelope fa-lg',
			})
		});
		$('.toastsDefaultFullImage').click(function() {
			$(document).Toasts('create', {
				body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
				title: 'Toast Title',
				subtitle: 'Subtitle',
				image: '../../dist/img/user3-128x128.jpg',
				imageAlt: 'User Picture',
			})
		});
		$('.toastsDefaultSuccess').click(function() {
			$(document).Toasts('create', {
				class: 'bg-success',
				title: 'Toast Title',
				subtitle: 'Subtitle',
				body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
			})
		});
		$('.toastsDefaultInfo').click(function() {
			$(document).Toasts('create', {
				class: 'bg-info',
				title: 'Toast Title',
				subtitle: 'Subtitle',
				body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
			})
		});
		$('.toastsDefaultWarning').click(function() {
			$(document).Toasts('create', {
				class: 'bg-warning',
				title: 'Toast Title',
				subtitle: 'Subtitle',
				body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
			})
		});

	});
</script>

<!-- multi insert Lokasi -->

<script>
	$(document).ready(function() { // Ketika halaman sudah diload dan siap

		var i = 1;
		$('#add').click(function() {
			i++;
			$('#dynamic_field').append('<tr id="row' + i + '">' +
				'<td> <select name="id_provinsi[]" id="provinsitambah' + i + '"  class="form-control select2' + i + '">' +
				'<option value="">--Provinsi--</option>' +
				'<?php foreach ($provinsi as $key => $value) { ?>' +
				'<option value="<?= $value['id_provinsi'] ?>"><?= $value['nama_provinsi'] ?></option>' +
				'<?php  } ?>' +
				'</select></td>' +
				'<td> <select name="id_kabupaten[]" id="kabupatentambah' + i + '"  class="form-control select2' + i + '">' +
				'<option value="">--kabupaten--</option>' +
				'</select></td > ' +
				'<td><input type="text" name="detail_lokasi[]" class="form-control form-control-sm"></td>' +
				'<td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn-sm btn_remove"><i class="fas fa-trash-alt"></i></button></td>' +
				'</tr>');
			$(function() {
				//Initialize Select2 Elements
				$(".select2" + i + "").select2()
			})
			$("#provinsitambah" + i + "").change(function() {
				var id_provinsi = $("#provinsitambah" + i + "").val();
				$.ajax({
					type: 'GET',
					url: '<?= base_url('wilayah/dataKabupaten') ?>/' + id_provinsi,
					success: function(html) {
						$("#kabupatentambah" + i + "").html(html);
					}
				});
			})
		});
		// tanpa Javas script looping
		$("#provinsitambah").change(function() {
			var id_provinsi = $("#provinsitambah").val();
			$.ajax({
				type: 'GET',
				url: '<?= base_url('wilayah/dataKabupaten') ?>/' + id_provinsi,
				success: function(html) {
					$("#kabupatentambah").html(html);
				}
			});
		})
		$(document).on('click', '.btn_remove', function() {
			var button_id = $(this).attr("id");
			$('#row' + button_id + '').remove();
		});

	});
</script>

<!-- multi insert sumber dan -->

<script>
	$(document).ready(function() { // Ketika halaman sudah diload dan siap

		var i = 1;
		$('#add2').click(function() {
			i++;
			$('#dynamic_field2').append('<tr id="row' + i + '">' +
				'<td><input value="BUMN" name="asal_dana[]"  class="form-control form-control-sm" readonly></input></td>' +
				'<td><input type="text" name="pagu[]" id="harga_pagu' + i + '" class="form-control form-control-sm"><input type="text" disabled class="float-right form-control form-control-sm mt-1" style="width: 200px;" id="tanpa-rupiah-pagu' + i + '"></td>' + '<td><input type="text" name="hps[]" id="harga_biasa' + i + '" class="form-control form-control-sm"><input type="text" disabled class="float-right form-control form-control-sm mt-1" style="width: 200px;" id="tanpa-rupiah' + i + '"></td>' + '<td><input name="tahun_anggaran[]"  class="form-control form-control-sm"></input></td>' +
				'<td><button type="button" name="remove2" id="' + i + '" class="btn btn-danger btn-sm btn_remove2"><i class="fas fa-trash-alt"></i></button></td>' +
				'</tr>');

			$("#harga_biasa" + i + "").keyup(function() {
				var harga = $('#harga_biasa' + i + "").val();
				var tanpa_rupiah = document.getElementById('tanpa-rupiah' + i + '');
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

			$("#harga_pagu" + i + "").keyup(function() {
				var harga = $('#harga_biasa' + i + "").val();
				var tanpa_rupiah = document.getElementById('tanpa-rupiah-pagu' + i + '');
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
		});
		$(document).on('click', '.btn_remove2', function() {
			var button_id2 = $(this).attr("id");
			$('#row' + button_id2 + '').remove();
		});

	});
	$("#harga_biasa").keyup(function() {
		var harga = $("#harga_biasa").val();
		var total = $('#total_hpsnya').val(harga);
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

	$("#harga_pagu").keyup(function() {
		var harga = $("#harga_pagu").val();
		var total = $('#total_hpsnya').val(harga);
		var tanpa_rupiah = document.getElementById('tanpa-rupiah-pagu');
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


<!-- multi insert sumber dana -->
<script>
	$(document).ready(function() { // Ketika halaman sudah diload dan siap
		$("#btn-tambah-jadwal").click(function() { // Ketika tombol Tambah Data jadwal di klik
			var jumlah = parseInt($("#jumlah-jadwal").val()); // Ambil jumlah data jadwal pada textbox jumlah-jadwal
			var nextjadwal = jumlah + 1; // Tambah 1 untuk jumlah jadwal nya
			// Kita akan menambahkan jadwal dengan menggunakan append
			// pada sebuah tag div yg kita beri id insert-jadwal
			$("#insert-jadwal").append(
				'<table class="table table table-bordered table-striped">' +
				'<thead class="text-center">' +
				'<tr>' +
				'</tr>' +
				'</thead>' +
				'<tbody class="text-center">' +
				'<tr>' +
				'<td><input type="text" name="tahap[]" class="form-control" placeholder="Nama Tahap"></td>' +
				'<td><input type="date" name="tanggal_mulai[]" class="form-control"></td>' +
				'<td><input type="date" name="tanggal_selesai[]" class="form-control"></td>' +
				'</tr>' +
				'</tbody>' +
				'</table>');
			//   ini get jadwal beda dengan yg utama
			// end get jadwal
			$("#jumlah-jadwal").val(nextjadwal); // Ubah value textbox jumlah-jadwal dengan variabel nextjadwal
		});
		// Buat fungsi untuk mereset jadwal ke semula
		$("#btn-reset-jadwal").click(function() {
			$("#insert-jadwal").html(""); // Kita kosongkan isi dari div insert-jadwal
			$("#jumlah-jadwal").val("1"); // Ubah kembali value jumlah jadwal menjadi 1
		});

	});
</script>

<!-- get Provinsi Di bagian Add -->
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
	var Modal_Setuju_Revisi = $('#Modal_Setuju_Revisi');
	var Modal_Revisi = $('#Modal_Revisi');
	var tabledata = $('#serverside');
	var tabledata2 = $('#serverside2');
	var formData = $('#formData');
	var paket = $('#paket');
	var modaltitle = $('#modalTitle');
	var btnsave = $('#btnSave')

	function message5000(icon, text) {
		swal({
			title: "Maaf!!!",
			text: text,
			icon: icon,
		});
	}
	$(document).ready(function() {
		var id_provinsi = $('#provinsi').val();
		fill_datatable();

		function fill_datatable(id_unit_kerja = '', id_jenis_pengadaan = '') {
			tabledata.DataTable({
				"responsive": true,
				"autoWidth": false,
				"processing": true,
				"serverSide": true,
				// "searching": false,
				"order": [],
				"ajax": {
					"url": "<?= base_url('rup/getdata') ?>",
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
					"sZeroRecords": "Moho Maaf Tidak Ada Data Paket Yang Di Cari",
					"sProcessing": "Memuat Data...."
				}
			});
		}
		// filtering select data per divisi dan per jenis pengadaan
		$('#filter').click(function() {
			var id_unit_kerja = $('#id_unit_kerja').val();
			var id_jenis_pengadaan = $('#id_jenis_pengadaan').val();
			if (id_unit_kerja != '' && id_jenis_pengadaan != '') {
				tabledata.DataTable().destroy();
				fill_datatable(id_unit_kerja, id_jenis_pengadaan);
			} else {
				message5000('warning', 'Pilih Filter Yang Benar!!')
				tabledata.DataTable().destroy();
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




	function add() {
		saveData = 'tambah';
		formData[0].reset();
		modal.modal('show');
		modaltitle.text('Tambah Data');
	}


	function gakbolehkosong_name(icon, text) {
		swal({
			title: "Ada Yang Belum Di Isi !!!",
			text: text,
			icon: icon,
		});
	}

	function save() {
		if ($('[name="id_unit_kerja"]').val() == '') {
			gakbolehkosong_name('warning', 'DIVISI Paket Harap Di Isi !!!');
		} else if ($('[name="nama_paket"]').val() == '') {
			gakbolehkosong_name('warning', 'NAMA PAKET Harap Di Isi !!!');
		} else if ($('[name="program_paket"]').val() == '') {
			gakbolehkosong_name('warning', 'PROGRAM Harap Di Isi !!!');
		} else if ($('[name="id_jenis_anggaran"]').val() == '') {
			gakbolehkosong_name('warning', 'JENIS ANGGARAN Harap Di Isi !!!');
		} else if ($('[name="sepesifikasi_paket"]').val() == '') {
			gakbolehkosong_name('warning', 'SEPESIFIKASI PAKET Harap Di Isi !!!');
		} else if ($('[name="kualifikasi_usaha"]').val() == '') {
			gakbolehkosong_name('warning', 'KUALIFIKASI USAHA Harap Di Isi !!!');
		} else if ($('[name="id_metode_pemilihan"]').val() == '') {
			gakbolehkosong_name('warning', 'METODE PEMILIHAN Harap Di Isi !!!');
		} else if ($('[name="id_jenis_pengadaan"]').val() == '') {
			gakbolehkosong_name('warning', 'JENIS PENGADAAN Harap Di Isi !!!');
		} else if ($('[name="uraian_pekerjaan_paket"]').val() == '') {
			gakbolehkosong_name('warning', 'URAIAN PEKERJAAN Harap Di Isi !!!');
		} else if ($('[name="hps"]').val() == '') {
			gakbolehkosong_name('warning', 'HPS Harap Di Isi !!!');
		} else if ($('[name="tahun_anggaran"]').val() == '') {
			gakbolehkosong_name('warning', 'TAHUN ANGGARAN Harap Di Isi !!!');
		} else {
			$.ajax({
				method: "POST",
				url: '<?= base_url('rup/save'); ?>',
				data: formData.serialize(),
				dataType: "JSON",
				beforeSend: function() {
					$('#simpan_rup_paket_new').attr('disabled', 'disabled');
				},
				success: function(response) {
					if (response == 'success') {
						formData[0].reset();
						message('success', 'Data Berhasil Di Tambah')
						$('#simpan_rup_paket_new').attr('disabled', false);
						location.replace('<?= base_url('rup/rup_penyedia') ?>');
					}
				},
				error: function() {
					console.log(error);
				}
			})
		}
	}

	var formDataEditRup = $('#formDataEditRup');

	function edit_rup() {
		$.ajax({
			method: "POST",
			url: '<?= base_url('rup/update_rup'); ?>',
			data: formDataEditRup.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Data Berhasil Di Edit')
					location.replace('<?= base_url('rup/rup_penyedia') ?>');
				} else {
					$(".id_unit_kerja-error").html(response.id_unit_kerja);
					$(".nama_paket-error").html(response.nama_paket);
					$(".program_paket-error").html(response.program_paket);
					$(".id_jenis_pengadaan-error").html(response.id_jenis_pengadaan);
					$(".id_jenis_anggaran-error").html(response.id_jenis_anggaran);
					$(".id_metode_pemilihan-error").html(response.id_metode_pemilihan);
					$(".id_produk_dl_negri-error").html(response.id_produk_dl_negri);
					$(".uraian_pekerjaan_paket-error").html(response.uraian_pekerjaan_paket);
					$(".kualifikasi_usaha-error").html(response.kualifikasi_usaha);
					$(".sepesifikasi_paket-error").html(response.sepesifikasi_paket);
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}

	function edit_rup2() {
		$.ajax({
			method: "POST",
			url: '<?= base_url('rup/update_rup'); ?>',
			data: formDataEditRup.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Data Berhasil Di Edit')
					location.replace('<?= base_url('penetapanlangsung/daftarpaket') ?>');
				} else {
					$(".id_unit_kerja-error").html(response.id_unit_kerja);
					$(".nama_paket-error").html(response.nama_paket);
					$(".program_paket-error").html(response.program_paket);
					$(".id_jenis_pengadaan-error").html(response.id_jenis_pengadaan);
					$(".id_jenis_anggaran-error").html(response.id_jenis_anggaran);
					$(".id_metode_pemilihan-error").html(response.id_metode_pemilihan);
					$(".id_produk_dl_negri-error").html(response.id_produk_dl_negri);
					$(".uraian_pekerjaan_paket-error").html(response.uraian_pekerjaan_paket);
					$(".kualifikasi_usaha-error").html(response.kualifikasi_usaha);
					$(".sepesifikasi_paket-error").html(response.sepesifikasi_paket);
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}


	var Form_permintaan_revisi = $('#Form_permintaan_revisi');
	var Form_penyetujuan_revisi = $('#Form_penyetujuan_revisi');

	function save_setujui_revisi() {
		$.ajax({
			method: "POST",
			url: '<?= base_url('rup/setuji_revisi') ?>',
			data: Form_penyetujuan_revisi.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					Form_penyetujuan_revisi[0].reset();
					message('success', 'Berhasil Menyetujui Revisi!!')
					Modal_Setuju_Revisi.modal('hide');
					relodTable();
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}


	function save_permintaan_revisi() {
		$.ajax({
			method: "POST",
			url: '<?= base_url('rup/kirim_revisi_paket') ?>',
			data: Form_permintaan_revisi.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					Form_permintaan_revisi[0].reset();
					message('success', 'Revisi Paket Berhasil Dikirim!!')
					Modal_Revisi.modal('hide');
					relodTable();
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}

	function active_finalisasi_draf(finalisasi_id) {
		$.ajax({
			method: "POST",
			url: '<?= base_url('rup/finalisasi_draft/'); ?>' + finalisasi_id,
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					formData[0].reset();
					message('success', 'Data Berhasil Di Finalisasi')
					relodTable();
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}

	// edit
	function edit() {
		$.ajax({
			method: "POST",
			url: '<?= base_url('rup/edit'); ?>',
			data: formData.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					formData[0].reset();
					message('success', 'Data Berhasil Di Tambah')
					location.replace('<?= base_url('rup/rup_penyedia') ?>');
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

		if (type == 'revisi_paket') {
			saveData = 'revisi_paket';
		}
		if (type == 'setujui_paket') {
			saveData = 'setujui_paket';
		}
		if (type == 'detail') {
			saveData = 'detail';
		}

		if (type == 'finalisasi') {
			saveData = 'finalisasi';
		}

		$.ajax({
			type: "GET",
			url: "<?= base_url('rup/byid/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'edit') {
					location.replace('<?= base_url('rup/rup_penyedia_edit/') ?>' + response['get_paket'].id_paket);
					$('[name="id_paket"]').val(response['get_paket'].id_paket);
					$('[name="nama_paket"]').val(response['get_paket'].nama_paket);
				}
				if (type == 'finalisasi') {
					$('[name="id_paket"]').val(response['get_paket'].id_paket);
					$('[name="status_finalisasi_draft"]').val(response['get_paket'].status_finalisasi_draft);
					active_finalisasi_draf(response['get_paket'].id_paket);
				}
				if (type == 'detail') {
					modaltitle.text('Detail Data');
					$('#detail_kode_rup').html(response['get_paket'].kode_jenis_anggaran + response['get_paket'].kode_jenis_pengadaan + response['get_paket'].kode_metode_pemilihan + response['get_paket'].kode_unit_kerja + response['get_paket'].kode_produk_dl_negri);
					$('#detail_nama_paket').html(response['get_paket']['nama_paket']);
					$('#detail_divisi').html(response['get_paket'].nama_unit_kerja);
					$('#detail_program').html(response['get_paket'].program_paket);
					$('#detail_jenis_pengadaan').html(response['get_paket'].nama_jenis_pengadaan);
					$('#tahun_jamak').html(response['get_paket'].tahun_mulai_jamak + ' s/d ' + response['get_paket'].tahun_selesai_jamak);
					$('#detail_metode_pemilihan').html(response['get_paket'].nama_metode_pemilihan);
					$('#detail_dalam_negri').html(response['get_paket'].keterangan);
					$('#detail_jenis_anggaran').html(response['get_paket'].nama_jenis_anggaran);

					// get sumber dana
					var html = '';
					var i;
					for (i = 0; i < response['get_sumberdana'].length; i++) {
						$hps = response['get_sumberdana'][i].hps;
						$pagu = response['get_sumberdana'][i].pagu;
						html += '<tr>' +
							'<td>' + response['get_sumberdana'][i].asal_dana + '</td>' +
							'<td>' + 'Rp. ' + $pagu.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00' + '</td>' +
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

				if (type == 'revisi_paket') {
					$('[name="id_paket"]').val(response['get_paket'].id_paket);
					Modal_Revisi.modal('show');
				}
				if (type == 'setujui_paket') {
					$('[name="id_paket"]').val(response['get_paket'].id_paket);
					$('[name="alasan_revisi_paket"]').val(response['get_paket'].alasan_revisi_paket);
					$('[name="nama_peminta_revisi"]').val(response['get_paket'].nama_peminta_revisi);
					Modal_Setuju_Revisi.modal('show');
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
			url: "<?= base_url('rup/delete/') ?>" + id,
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
	// ================================== MENU EDIT RUP LOKASI PEKERJAAN =======================================
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
		var id_paket = $('#paketdilokasi').val();
		tablelokasikerja.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('rup/data_get_lokasi_pekerjaan/') ?>" + id_paket,
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
			url = "<?= base_url('rup/add_lokasi_kerja'); ?>"
		} else {
			url = "<?= base_url('rup/edit_lokasi_kerja'); ?>"
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
			url: "<?= base_url('rup/byidLokasi/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'editlokasi') {
					modaltitle.text('Ubah Data');
					$('[name="id_lokasi_pekerjaan"]').val(response.id_lokasi_pekerjaan);
					$('[name="id_provinsi"]').val(response.id_provinsi);
					$('[name="id_kabupaten"]').val(response.id_kabupaten);
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
			url: '<?= base_url('rup/edit_lokasi_pekerjaan'); ?>',
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
			url: "<?= base_url('rup/delete_lokasi_pekerjaan/') ?>" + id_lokasi_pekerjaan,
			dataType: "JSON",
			success: function(response) {
				relodTable_lokasi();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}
	// ========
	// ==================================END MENU EDIT RUP LOKASI PEKERJAAN =======================================
	// ========


	// =====================================BATASS===============================================
	// ========
	// ================================== MENU EDIT RUP SUMBER DANA =======================================
	// ========
	var modal_sumber_dana = $('#modal_sumber_dana');
	var form_sumber_dana = $('#FormDataSumberDana');
	var table_sumber_dana = $('#sumber_dana');
	// RELOAD TABLENYA
	function relodTable_sumber_dana() {
		table_sumber_dana.DataTable().ajax.reload();
	}

	// GET DATA SUMBER DANA 
	$(document).ready(function() {
		var id_paket = $('#paketdisumberdana').val();
		table_sumber_dana.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('rup/data_get_sumberdana/') ?>" + id_paket,
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
	// TAMBAH DATA
	function add_sumber_dana() {
		saveData = 'tambah';
		form_sumber_dana[0].reset();
		modal_sumber_dana.modal('show');
		modaltitle.text('Tambah Sumber Dana');
	}

	function save_sumber_dana() {
		if (saveData == 'tambah') {
			url = "<?= base_url('rup/add_sumberdana'); ?>"
		} else {
			url = "<?= base_url('rup/edit_sumberdana'); ?>"
		}
		$.ajax({
			method: "POST",
			url: url,
			data: form_sumber_dana.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'clear') {
					modal_sumber_dana.modal('hide');
					form_sumber_dana[0].reset();
					relodTable_sumber_dana();
					if (saveData == 'tambah') {
						message('success', 'Data Berhasil Di Tambah')
					} else {
						modal_sumber_dana.modal('hide');
						form_sumber_dana[0].reset();
						relodTable_sumber_dana();
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
	function byidSumberdana(id, type) {
		if (type == 'editsumberdana') {
			saveData = 'editsumberdana';
			form_sumber_dana[0].reset();
		}
		if (type == 'hapusumberdana') {
			saveData = 'hapusumberdana';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('rup/byidSumberdana/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'editsumberdana') {
					modaltitle.text('Ubah Data');
					$('[name="id_sumber_dana"]').val(response.id_sumber_dana);
					$('[name="asal_dana"]').val(response.asal_dana);
					$('[name="hps"]').val(response.hps);
					$('[name="pagu"]').val(response.pagu);
					$('[name="tahun_anggaran"]').val(response.tahun_anggaran);
					modal_sumber_dana.modal('show');
				}
				if (type == 'hapussumberdana') {
					deleteQuestionsumber_dana(response.id_sumber_dana, response.asal_dana);
				}
			}
		})
	}
	// EDIT DATA
	function edit_sumber_dana() {
		$.ajax({
			method: "POST",
			url: '<?= base_url('rup/edit_sumberdana'); ?>',
			data: form_sumber_dana.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					form_sumber_dana[0].reset();
					message('success', 'Data Berhasil Di Tambah')
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}
	// HAPUS DATA
	function deleteQuestionsumber_dana(id_sumber_dana, asal_dana) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + asal_dana + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteDatanyasumberdana(id_sumber_dana);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deleteDatanyasumberdana(id_sumber_dana) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('rup/delete_sumberdana/') ?>" + id_sumber_dana,
			dataType: "JSON",
			success: function(response) {
				relodTable_sumber_dana();
				message('success', 'Data Berhasil Di Hapus')
			}
		})
	}
	// ========
	// ==================================END MENU EDIT RUP SUMBER DANA =======================================
	// ========
</script>
<script>
	$(document).ready(function() {
		$('#id_metode_pemilihan').change(function() {
			var id_metode_pemilihan = $('#id_metode_pemilihan').val();
			// console.log(id_metode_pemilihan)
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
	$(function() {
		var i = 1;
		$(".datepicker2").datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true,
			todayHighlight: true,
		});
		var tanggal_selesai_prakualifikasi = $(".tahun_jamak_selesai");
		var tanggal_mulai_prakualifikasi = $(".tahun_jamak_mulai");
		$(tanggal_mulai_prakualifikasi).on('changeDate', function(selected) {

			var startDate = new Date(selected.date.valueOf());
			$(tanggal_selesai_prakualifikasi).datepicker('setStartDate', startDate);
			if ($(tanggal_mulai_prakualifikasi).val() > $(tanggal_selesai_prakualifikasi).val()) {

			} else {

			}
		});
	});
</script>

<script>
	function message300(icon, text) {
		swal({
			title: "Hanya Angka !!!",
			text: text,
			icon: icon,
		});
	}
	document.getElementById("harga_biasa").onkeyup = function() {
		var validasiHuruf = /^[a-zA-Z ]+ $ /;
		var validasisimbol = /[^0-9]/;
		var harga_biasa = $('#harga_biasa').val();
		if (harga_biasa.match(validasiHuruf)) {
			$('#harga_biasa').css('border-color', 'red');
			message300('warning', 'Isi Dengan Angka!!');
		} else if (harga_biasa.match(validasisimbol)) {
			$('#harga_biasa').css('border-color', 'red');
			message300('warning', 'Isi Dengan Angka!!');
		} else {
			$('#harga_biasa').css('border-color', 'green');
			$('#harga_biasa').val(harga_biasa);

		}

	};
</script>