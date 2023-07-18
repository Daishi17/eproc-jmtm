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
</script>
<!-- fade alert -->
<script>
	window.setTimeout(function() {
		$(".alert").fadeTo(500, 0).slideUp(500, function() {
			$(this).remove();
		});
	}, 2000)
</script>

<!-- komen -->
<!-- <script>
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
</script> -->

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
				'<td><input type="text" name="hps[]" id="harga_biasa' + i + '" class="form-control form-control-sm"><input type="text" disabled class="float-right form-control form-control-sm mt-1" style="width: 200px;" id="tanpa-rupiah' + i + '"></td>' +
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
	var formPaketPenetapan = $('#formPaketPenetapan');
	var paket = $('#paket');
	var modaltitle = $('#modalTitle');
	var btnsave = $('#btnSave')


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
				alert('select Bosth Filter option');
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

	function deleteQuestion2(id_paket, nama_paket) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nama_paket + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteDatanyaRUP(id_paket);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deleteDatanyaRUP(id) {
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




	function add() {
		saveData = 'tambah';
		formPaketPenetapan[0].reset();
		modal.modal('show');
		modaltitle.text('Tambah Data');
	}


	function save() {
		$.ajax({
			method: "POST",
			url: '<?= base_url('penetapanlangsung/save'); ?>',
			data: formPaketPenetapan.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					formPaketPenetapan[0].reset();
					message('success', 'Data Berhasil Di Tambah')
					location.replace('<?= base_url('penetapanlangsung/daftarpaket') ?>');

				}
			},
			error: function() {
				console.log(error);
			}
		})
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
					$('[name="id_paket"]').val(response['get_paket'].id_paket);
					$('#detail_kode_rup').html(response['get_paket'].kode_jenis_anggaran + response['get_paket'].kode_jenis_pengadaan + response['get_paket'].kode_metode_pemilihan + response['get_paket'].kode_unit_kerja + response['get_paket'].kode_produk_dl_negri);
					$('#detail_nama_paket').html(response['get_paket']['nama_paket']);
					$('#detail_divisi').html(response['get_paket'].nama_unit_kerja);
					$('#detail_program').html(response['get_paket'].program_paket);
					$('#detail_jenis_pengadaan').html(response['get_paket'].nama_jenis_pengadaan);
					$('#tahun_jamak').html(response['get_paket'].tahun_mulai_jamak + ' s/d ' + response['get_paket'].tahun_selesai_jamak);
					$('#detail_metode_pemilihan').html(response['get_paket'].nama_metode_pemilihan);
					$('#detail_dalam_negri').html(response['get_paket'].keterangan);
					$('#detail_jenis_anggaran').html(response['get_paket'].nama_jenis_anggaran);
					$('[name="alasan_penetapan_langsung"]').val(response['get_paket'].alasan_penetapan_langsung);

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
					deleteQuestion2(response['get_paket'].id_paket, response['get_paket'].nama_paket);
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
		var id_paketkusaja1 = $('#id_paketkusaja').val();
		tablelokasikerja.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('rup/data_get_lokasi_pekerjaan/') ?>" + id_paketkusaja1,
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
		// $('#test').html(url);
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

<!-- datepicker -->
<script>
	$(function() {
		var i = 1;
		$(".datepicker").datetimepicker({
			format: 'd-m-Y',
			autoclose: true,
			todayHighlight: true,
		});
		var tanggal_selesai_prakualifikasi = $(".tahun_jamak_selesai");
		var tanggal_mulai_prakualifikasi = $(".tahun_jamak_mulai");
		$(tanggal_mulai_prakualifikasi).on('changeDate', function(selected) {
			var startDate = new Date(selected.date.valueOf());
			$(tanggal_selesai_prakualifikasi).datepicker('setStartDate', startDate);
			if ($(tanggal_mulai_prakualifikasi).val() > $(tanggal_selesai_prakualifikasi).val()) {} else {}
		});
	});
</script>


<script>
	var saveData;
	var btnsave = $('#btnSave');
	var modalTransaksiLangsung = $('#modalDetailTransaksiLangsung')
	var table_penetapan_langsung = $('#table_penetapan_langsung');

	$(document).ready(function() {
		table_penetapan_langsung.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			// "searching": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url('penetapanlangsung/get_all_paket') ?>",
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
	function buatpaketpenetapanlangsung() {
		var id_paket = $('#buat_paket').val();
		$.ajax({
			type: "GET",
			url: "<?= base_url('penetapanlangsung/byidDetail/'); ?>" + id_paket,
			dataType: "JSON",
			success: function(response) {
				location.replace('<?= base_url('penetapanlangsung/detailpaket/') ?>' + response['get_paket'].id_paket);
			},
			error: function() {
				console.log(error);
			}
		})
	}
</script>

<!-- INI UNTUK SUMBERDANA -->
<script>
	var sumberdana_tbl = $('#sumberdana_tbl');
	var id_paketkusaja1 = $('#id_paket_tender').val();
	$(document).ready(function() {
		sumberdana_tbl.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			// "searching": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url('penetapanlangsung/data_get_sumberdana/') ?>" + id_paketkusaja1,
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
				"sZeroRecords": "Maaf Belum Ada Data Penetapan Langsung",
				"sProcessing": "Memuat Data...."
			}
		});

	});
</script>
<!-- INI UNTUK RINCIAN HPS -->
<script>
	function BuatRincianHps() {
		var id_paketkusaja = $('#id_paketkusaja').val();
		$.ajax({
			type: "GET",
			url: "<?= base_url('paket/byRincianHps/'); ?>" + id_paketkusaja,
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
<!-- INI UNTUK PEMILIHAN PENYEDIA BARU ATAU LAMA -->
<!-- <script>
	const id_paketkusaja3 = getElementById('id_paketwoy');

	function pilih_penyedia() {
		location.replace('<?= base_url('') ?>' + id_paketkusaja3);
	}
</script> -->


<script>
	var table_dokumen_penetapan_langsung = $('#table_dokumen_penetapan_langsung');
	var form_dokumen_pengadaan_penetapan_langsung = $('#form_dokumen_pengadaan_penetapan_langsung');
	var id_paketkusaja5 = $('#id_paketkusaja').val();

	$(document).ready(function() {

		table_dokumen_penetapan_langsung.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			// "searching": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url('penetapanlangsung/get_dokumen_pengadaan/') ?>" + id_paketkusaja5,
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
				"sZeroRecords": "Maaf Belum Ada Data Penetapan Langsung",
				"sProcessing": "Memuat Data...."
			}
		});

	});

	form_dokumen_pengadaan_penetapan_langsung.on('submit', function(e) {
		e.preventDefault();
		if ($('.file_dokumen_penetapan_langsung').val() == '') {
			message('warning', 'Silahkan Pilih Dokumen!', 'Dokumen Belum Dipilih!!!')
		} else {
			$.ajax({
				url: "<?php echo base_url(); ?>penetapanlangsung/upload_dokumen_pengadaan/" + id_paketkusaja5,
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				beforeSend: function() {
					$('#upload').attr('disabled', 'disabled');
					$('#process').css('display', 'block');
					$('#sedang_dikirim').show();
				},
				success: function(data) {
					var percentage = 0;
					var timer = setInterval(function() {
						percentage = percentage + 20;
						progress_bar_process(percentage, timer);
					}, 1000);
				}
			});
		}
	});

	function reload_table_dokumen_pengadaan_penetapan_langsung() {
		table_dokumen_penetapan_langsung.DataTable().ajax.reload();
	}

	function progress_bar_process(percentage, timer) {
		$('.progress-bar').css('width', percentage + '%');
		if (percentage > 100) {
			clearInterval(timer);
			$('#form_dokumen_pengadaan_penetapan_langsung')[0].reset();
			$('#process').css('display', 'none');
			$('#sedang_dikirim').show();
			$('.progress-bar').css('width', percentage + '%');
			$('#upload').attr('disabled', false);
			message('success', 'Dokumen Berhasil Di Upload');
			reload_table_dokumen_pengadaan_penetapan_langsung();
		}
	}

	function message(icon, text, title) {
		swal({
			title: title,
			text: text,
			icon: icon,
		});
	}

	function byid_penetapan_langsung_delete(id, type) {
		if (type == 'hapus') {
			saveData = 'hapus';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('penetapanlangsung/by_id_dokumen_pengadaan/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'hapus') {
					Question_delete_dokumen_pengadaan_penetapan_langsung(response["get_dokumen_penetapan_langsung"].id_dokumen_penetapan_langsung, response['get_dokumen_penetapan_langsung'].nama_file_dokumen_pengadaan);
				}
			}
		})
	}

	// HAPUS DATA 
	function Question_delete_dokumen_pengadaan_penetapan_langsung(id_dokumen_penetapan_langsung, nama_file_dokumen_pengadaan) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Dokumen " + nama_file_dokumen_pengadaan + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					delete_dokumen_pengadaan_penetapan_langsung(id_dokumen_penetapan_langsung);
				} else {
					message('success', 'Dokumen Tidak Jadi Di Hapus, Dokumen Aman!!')
				}
			});
	}

	function delete_dokumen_pengadaan_penetapan_langsung(id_dokumen_penetapan_langsung) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('penetapanlangsung/delete_dokumen_pengadaan_dokumen_pengadaan/') ?>" + id_dokumen_penetapan_langsung,
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					reload_table_dokumen_pengadaan_penetapan_langsung()
					message('success', 'Dokumen Berhasil Di Hapus', 'Berhasil!');
				}
			}
		})
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
	// document.getElementById("selesai7").onchange = function() {
	// 	validasi_selesai7()
	// };
	// document.getElementById("mulai7").onchange = function() {
	// 	validasi_mulai7()
	// };
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

	// document.getElementById("selesai8").onchange = function() {
	// 	validasi_selesai8()
	// };

	// document.getElementById("mulai8").onchange = function() {
	// 	validasi_mulai8()
	// };
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
			url: '<?= base_url('penetapanlangsung/save_jadwal_penetapan_langsung/') ?>' + id_paketkusaja,
			data: form_jadwal_penetapan_langsung.serialize(),
			dataType: "JSON",
			beforeSend: function() {
				$('#btnSave').attr('disabled', 'disabled');
			},
			success: function(response) {
				if (response == 'success') {
					message('success', 'Jadwal Berhasil Di Buat');
					location.reload();
					form_jadwal_transaksi_langsung[0].reset();
					$('#btnSave').attr('disabled', false);


				}
			},
			error: function() {
				console.log(error);
			}
		})
	}

	// update jadwal
</script>

<script>
	var id_paketkusaja6 = $('#id_paketkusaja').val();
	var form_jadwal_penetapan_langsung = $('#form_jadwal_penetapan_langsung');
	form_jadwal_penetapan_langsung.on('submit', function(e) {
		e.preventDefault();
		$.ajax({
			url: '<?= base_url('penetapanlangsung/update_jadwal_penetapan_langsung/') ?>' + id_paketkusaja6,
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
					form_jadwal_penetapan_langsung[0].reset();
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
	var form_jadwal_penetapan_langsung = $('#form_jadwal_penetapan_langsung');
	form_jadwal_penetapan_langsung.on('submit', function(e) {
		e.preventDefault();
		var id_paketkusaja = $('#id_paketkusaja').val();
		$.ajax({
			url: '<?= base_url('penetapanlangsung/update_jadwal_penetapan_langsung/') ?>' + id_paketkusaja,
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

		if (selesai2.getTime() < mulai2.getTime()) {
			$('#error-jadwal2').show();
			$("#erorr_jadwal_row2").css("background-color", "red");
			$("#erorr_jadwal_row2").css("color", "white");
			$('#btnSave').attr('disabled', 'disabled');
		} else if (mulai2.getTime() < selesai1.getTime()) {
			$('#error-jadwal2').show();
			$("#erorr_jadwal_row2").css("background-color", "red");
			$("#erorr_jadwal_row2").css("color", "white");
			$('#btnSave').attr('disabled', 'disabled');
		} else if (selesai3.getTime() < mulai3.getTime()) {
			$('#error-jadwal3').show();
			$("#erorr_jadwal_row3").css("background-color", "red");
			$("#erorr_jadwal_row3").css("color", "white");
			$('#btnSave').attr('disabled', 'disabled');
		} else if (mulai3.getTime() < selesai2.getTime()) {
			$('#error-jadwal3').show();
			$("#erorr_jadwal_row3").css("background-color", "red");
			$("#erorr_jadwal_row3").css("color", "white");
			$('#btnSave').attr('disabled', 'disabled');
		} else if (selesai4.getTime() < mulai4.getTime()) {
			$('#error-jadwal4').show();
			$("#erorr_jadwal_row4").css("background-color", "red");
			$("#erorr_jadwal_row4").css("color", "white");
			$('#btnSave').attr('disabled', 'disabled');
		} else if (mulai4.getTime() < selesai3.getTime()) {
			$('#error-jadwal4').show();
			$("#erorr_jadwal_row4").css("background-color", "red");
			$("#erorr_jadwal_row4").css("color", "white");
			$('#btnSave').attr('disabled', 'disabled');
		} else if (selesai5.getTime() < mulai5.getTime()) {
			$('#error-jadwal5').show();
			$("#erorr_jadwal_row5").css("background-color", "red");
			$("#erorr_jadwal_row5").css("color", "white");
			$('#btnSave').attr('disabled', 'disabled');
		} else if (mulai5.getTime() < selesai4.getTime()) {
			$('#error-jadwal5').show();
			$("#erorr_jadwal_row5").css("background-color", "red");
			$("#erorr_jadwal_row5").css("color", "white");
			$('#btnSave').attr('disabled', 'disabled');
		} else if (selesai6.getTime() < mulai6.getTime()) {
			$('#error-jadwal6').show();
			$("#erorr_jadwal_row6").css("background-color", "red");
			$("#erorr_jadwal_row6").css("color", "white");
			$('#btnSave').attr('disabled', 'disabled');
		} else if (mulai6.getTime() < selesai5.getTime()) {
			$('#error-jadwal6').show();
			$("#erorr_jadwal_row6").css("background-color", "red");
			$("#erorr_jadwal_row6").css("color", "white");
			$('#btnSave').attr('disabled', 'disabled');
		} else if (selesai7.getTime() < mulai7.getTime()) {
			$('#error-jadwal7').show();
			$("#erorr_jadwal_row7").css("background-color", "red");
			$("#erorr_jadwal_row7").css("color", "white");
			$('#btnSave').attr('disabled', 'disabled');
		} else if (mulai7.getTime() < selesai6.getTime()) {
			$('#error-jadwal7').show();
			$("#erorr_jadwal_row7").css("background-color", "red");
			$("#erorr_jadwal_row7").css("color", "white");
			$('#btnSave').attr('disabled', 'disabled');
		} else if (selesai8.getTime() < mulai8.getTime()) {
			$('#error-jadwal8').show();
			$("#erorr_jadwal_row8").css("background-color", "red");
			$("#erorr_jadwal_row8").css("color", "white");
			$('#btnSave').attr('disabled', 'disabled');
		} else if (mulai8.getTime() < selesai7.getTime()) {
			$('#error-jadwal8').show();
			$("#erorr_jadwal_row8").css("background-color", "red");
			$("#erorr_jadwal_row8").css("color", "white");
			$('#btnSave').attr('disabled', 'disabled');
		} else {
			$('#btnSave').attr('disabled', false);
		}
	}, 500);
</script>

<script>
	var form_umumkan_paket_transaksi_langsung = $('#form_umumkan_paket_transaksi_langsung');

	function Umumkan_paket_transaksi_langsung() {
		var id_paketkusaja_umumkan = $('#id_paketkusaja').val();
		$.ajax({
			method: "POST",
			url: '<?= base_url('penetapanlangsung/umumkan_paket_transaksi_langsung/') ?>' + id_paketkusaja_umumkan,
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
</script>
<script>
	function message(icon, text) {
		swal({
			title: "success!!!",
			text: text,
			icon: icon,
		});
	}

	var form_batalkan_paket_penetapan_langsung = $('#form_batalkan_paket_penetapan_langsung');

	function bataltenderpenetapan_langsung() {
		var id_paketkusaja_umumkan = $('#id_paket').val();
		$.ajax({
			method: "POST",
			url: '<?= base_url('penetapanlangsung/batalkan_paket_transaksi_langsung/') ?>' + id_paketkusaja_umumkan,
			data: form_batalkan_paket_penetapan_langsung.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Paket Berhasil Di Batalkan');
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
	var form_persyaratan_penetapan_langsung = $('#form_persyaratan_penetapan_langsung');
	var tambah_persyaratan = $('#tambah_persyaratan');
	var tbl_persyaratan_penetapan_langsung = $('#tbl_persyaratan_penetapan_langsung')
	var saveData;
	var btnsave = $('#btnSave')
	var id_paketkusaja2 = $('#id_paketkusaja').val();


	function message(icon, text) {
		swal({
			title: "success!!!",
			text: text,
			icon: icon,
		});
	}

	$(document).ready(function() {
		tbl_persyaratan_penetapan_langsung.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('penetapanlangsung/getpersyaratan/') ?>" + id_paketkusaja2,
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
		tbl_persyaratan_penetapan_langsung.DataTable().ajax.reload();
	}

	function tambah_persyaratan_modal() {
		saveData = 'tambah';
		tambah_persyaratan.modal('show');
		modaltitle.text('Tambah Data');
	}

	function simpan_persyaratan_penetapan_langsung() {
		if (saveData == 'tambah') {
			url = "<?= base_url('penetapanlangsung/add_persyaratan'); ?>"
		} else {
			url = "<?= base_url('penetapanlangsung/update_persyaratan'); ?>"
		}
		$.ajax({
			method: "POST",
			url: url,
			data: form_persyaratan_penetapan_langsung.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					if (saveData == 'tambah') {
						tambah_persyaratan.modal('hide');
						relodTable();
						message('success', 'Data Berhasil Di Tambah')
					} else {
						tambah_persyaratan.modal('hide');
						relodTable();
						message('success', 'Data Berhasil Di Ubah');
					}
				} else {

				}
			},
			error: function() {
				console.log(error);
			}
		})
	}

	function byid_penetapan_langsung(id, type) {
		if (type == 'edit') {
			saveData = 'edit';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('penetapanlangsung/byid_persyaratan_penetapan_langsung/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'edit') {
					// modaltitle.text('Ubah Data');
					$('[name="id_persyaratan_penetapan_langsung"]').val(response.id_persyaratan_penetapan_langsung);
					$('[name="nama_persyaratan_penetapan_langsung"]').val(response.nama_persyaratan_penetapan_langsung);
					$('[name="keterangan_persyaratan_penetapan_langsung"]').val(response.keterangan_persyaratan_penetapan_langsung);
					tambah_persyaratan.modal('show');
				} else {
					deleteQuestion(response.id_persyaratan_penetapan_langsung, response.nama_persyaratan_penetapan_langsung);
				}
			}
		})
	}

	function deleteQuestion(id_persyaratan_penetapan_langsung, nama_persyaratan_penetapan_langsung) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nama_persyaratan_penetapan_langsung + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteData(id_persyaratan_penetapan_langsung);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deleteData(id_persyaratan_penetapan_langsung) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('penetapanlangsung/delete_persyaratan_penetapan_langsung/') ?>" + id_persyaratan_penetapan_langsung,
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
	var file_persyaratan_uploaded = $('#file_persyaratan_uploaded');

	var id_paketkusaja = $('#id_paket').val();

	$(document).ready(function() {
		file_persyaratan_uploaded.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('penetapanlangsung/get_dokumen_persyaratan_penetapan_langsung/') ?>" + id_paketkusaja,
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

	function relodTable_dokumen_vendor() {
		file_persyaratan_uploaded.DataTable().ajax.reload();
	}

	var form_approval_dokumen = $('#form_approval_dokumen');
	var modalTolakDokumen = $('#modalTolakDokumen')
	var formTidakSetujuiDokumen = $('#formTidakSetujuiDokumen')

	function byid_penetapan_langsung_uploaded(id, type) {
		if (type == 'salah') {
			saveData = 'salah';
		}
		if (type == 'benar') {
			saveData = 'benar';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('penetapanlangsung/by_id_dokumen_penetapan_langsung/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'benar') {
					$.ajax({
						method: "POST",
						url: '<?= base_url('penetapanlangsung/approve_dokumen_persyaratan/') ?>' + response['get_dokumen_penetapan_langsung'].id_vendor_dokumen_persyaratan_penetapan_langsung,
						data: form_approval_dokumen.serialize(),
						dataType: "JSON",
						success: function(response) {
							if (response == 'success') {
								form_approval_dokumen[0].reset();
								message('success', 'Dokumen Berhasil Di Approve!')
								relodTable_dokumen_vendor()
							}
						},
						error: function() {
							console.log(error);
						}
					});

				} else if (type == 'salah') {
					$('[name="id_vendor_dokumen_persyaratan_penetapan_langsung"]').val(response["get_dokumen_penetapan_langsung"].id_vendor_dokumen_persyaratan_penetapan_langsung);
					$('[name="nama_persyaratan_penetapan_langsung"]').val(response["get_dokumen_penetapan_langsung"].nama_persyaratan_penetapan_langsung);
					modalTolakDokumen.modal('show')
				}
			}
		})
	}

	function save_tidaksetuju() {
		$.ajax({
			method: "POST",
			url: '<?= base_url('penetapanlangsung/approve_dokumen_tidak_setuju') ?>',
			data: formTidakSetujuiDokumen.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					formTidakSetujuiDokumen[0].reset();
					modalTolakDokumen.modal('hide')
					message('success', 'Dokumen Berhasil Di Approve!')
					relodTable_dokumen_vendor()
				}
			},
			error: function() {
				console.log(error);
			}
		});
	}
</script>