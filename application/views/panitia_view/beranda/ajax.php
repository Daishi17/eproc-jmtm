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
		$('#tender').DataTable({
			"scrollY": 200,
			"scrollX": true
		});
	});

	$(document).ready(function() {
		$('#nontender').DataTable({
			"scrollY": 200,
			"scrollX": true
		});
	});

	function animation(span) {
		span.className = "turn";
		setTimeout(function() {
			span.className = ""
		}, 700);
	}
</script>
<script>
	$(document).ready(function() {
		$('#penawaran').DataTable({});
	});
	//    $(document).on("click", "ul li", function () {
	// 	$(this).addClass("active").siblings().removeClass("active");
	// });
</script>
<script>
	$(document).ready(function() {
		$("#table_penawaran").DataTable({
			oLanguage: {
				sSearch: "Pencarian",
				sEmptyTable: "Data Tidak Tersedia",
				sLoadingRecords: "Silahkan Tunggu - loading...",
				sLengthMenu: "Menampilkan_MENU_Data",
				sZeroRecords: "Data Tidak Tersedia",
				sProcessing: "Sedang Dimuat.....",
			},
		});

		$(function() {
			$("#upload_syarat").on('click', function(e) {
				e.preventDefault();
				$("#upload_file:hidden").trigger('click');
				$("#show_span").append('<span class="fas fa-check pull-right"></span>');
			});
		});
		$(function() {
			$("#upload_masa_berlaku").on('click', function(e) {
				e.preventDefault();
				$("#upload_file2:hidden").trigger('click');
				$("#show_span2").append('<span class="fas fa-check pull-right"></span>');
			});
		});
		$(function() {
			$("#upload_dokumen_penawaran").on('click', function(e) {
				e.preventDefault();
				$("#upload_file3:hidden").trigger('click');
				$("#show_span3").append('<span class="fas fa-check pull-right"></span>');
			});
		});
		$(function() {
			$("#upload_rincian_hps").on('click', function(e) {
				e.preventDefault();
				$("#upload_file4:hidden").trigger('click');
				$("#show_span4").append('<span class="fas fa-check pull-right"></span>');
			});
		});
		$(function() {
			$("#upload_kak").on('click', function(e) {
				e.preventDefault();
				$("#upload_file5:hidden").trigger('click');
				$("#show_span5").append('<span class="fas fa-check pull-right"></span>');
			});
		});

		$(function() {
			$("#upload_adendum").on('click', function(e) {
				e.preventDefault();
				$("#upload_file6:hidden").trigger('click');
			});
		});
		$(function() {
			$("#informasi_lainya").on('click', function(e) {
				e.preventDefault();
				$("#upload_file7:hidden").trigger('click');
				$("#show_span7").append('<a href=""><span><i class="fas fa-download"> New Berkas</i></span></a> - 96 KB (19 maret 2021)');
			});
		});

	});
</script>


<script>
	$(function() {
		$("#lihat_pembukaan").on('click', function(e) {
			e.preventDefault();
			$("#pembukaan").hide();
			$("#hasil_akhir").show();
		});
	});

	$(function() {
		$("#lihat_pembukaan2").on('click', function(e) {
			e.preventDefault();
			$("#pembukaan").show();
			$("#hasil_akhir").hide();
		});
	});
</script>

<script>
	// dattable
	$(document).ready(function() {
		$('#tender_pengumuman').DataTable({});
	});

	function kirm_pengumuman() {
		document.getElementById("demo").innerHTML =
			'<div class="alert alert-success" role="alert">Penguman Pemenang Tender Berhasil Dikirimkan !!</div>';
		setTimeout(() => {
			$("#demo").hide();
		}, 5000);
	}
</script>

<!-- INI UNTUK BERANDA PAKET Tender Dan Penunjukan Langsung DI PANITIA -->
<script>
	var saveData;
	var modal = $('#modalData');
	var tbl_beranda_tender = $('#tabel_beranda_tender');
	var tbl_beranda_penunjukan_langsung = $('#tbl_beranda_penunjukan_langsung');
	var tbl_beranda_tender_terbatas = $('#tbl_beranda_tender_terbatas');
	var formData = $('#formData');
	var modaltitle = $('#modalTitle');
	var btnsave = $('#btnSave')
	$(document).ready(function() {
		tbl_beranda_tender.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('panitiajmtm/beranda/get_panitia_beranda') ?>",
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
		tbl_beranda_tender.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		tbl_beranda_penunjukan_langsung.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('panitiajmtm/beranda/get_panitia_beranda_penunjukan_langsung') ?>",
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
		tbl_beranda_penunjukan_langsung.DataTable().ajax.reload();
	}

	$(document).ready(function() {
		tbl_beranda_tender_terbatas.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('panitiajmtm/beranda/get_panitia_beranda_tender_terbatas') ?>",
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


	function relodTableTenderTerbatas() {
		tbl_beranda_tender_terbatas.DataTable().ajax.reload();
	}

	function message(icon, text) {
		swal({
			title: "Mantaps!!!",
			text: text,
			icon: icon,
		});
	}

	var modal_lihat_tahap = $('#modal_lihat_tahap');

	function byid(id, type) {
		if (type == 'lihat_tender') {
			saveData = 'lihat_tender';
		}
		if (type == 'lihat_tahap_tender') {
			saveData = 'lihat_tahap_tender';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('panitiajmtm/daftarpaket/get_by_id/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'lihat_tender') {
					location.replace('<?= base_url('panitiajmtm/beranda/informasitender/') ?>' + response['get_pegawai'].id_paket);
				}
				if (type == 'lihat_tahap_tender') {
					var table_tahap_tender_saat_ini = $('#table_tahap_tender_saat_ini');
					$(document).ready(function() {
						table_tahap_tender_saat_ini.DataTable({
							"responsive": true,
							"autoWidth": false,
							"processing": true,
							"serverSide": true,
							"order": [],
							"ajax": {
								"url": "<?= base_url('panitiajmtm/beranda/lihat_tahap_tender_di_beranda/') ?>" + response['get_pegawai'].id_paket,
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
					modal_lihat_tahap.modal('show');
					modal_lihat_tahap.on('hidden.bs.modal', function() {
						document.location.reload();
					})
				}
			}
		})
	}
</script>
<script>
	var form_data_save_tender = $('#form_data_save_tender')

	function SimpanTender() {
		var id_paket_save_tender = $('#id_paket_save_tender').val()
		$.ajax({
			method: "POST",
			url: url = "<?= base_url("panitiajmtm/daftarpaket/update_save_tender/") ?>" + id_paket_save_tender,
			data: form_data_save_tender.serialize(),
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


<!-- INI Untuk Evaluasi -->
<script>
	var saveData;
	var modal_evaluasi = $('#modal_evaluasiData');
	var tbl_evaluasi = $('#tbl_evaluasi');
	var formData = $('#formData');
	var modal_evaluasititle = $('#modal_evaluasiTitle');
	var btnsave = $('#btnSave');
	$(document).ready(function() {
		var id_paket_evaluasi = $('#id_paket_evaluasi').val();
		tbl_evaluasi.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('panitiajmtm/beranda/getdata_evaluasi/') ?>" + id_paket_evaluasi,
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
		tbl_evaluasi.DataTable().ajax.reload();
	}

	function message(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}
	var id_paket_evaluasi = $('#id_paket_evaluasi').val();

	function byid_evaluasi_tender(id, type) {
		if (type == 'evaluasi_nilai') {
			saveData = 'evaluasi_nilai';
		}
		if (type == 'lihat_prakualifiaksi') {
			saveData = 'lihat_prakualifiaksi';
		}
		if (type == 'lihat_sangahan_akhir') {
			saveData = 'lihat_sangahan_akhir';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('panitiajmtm/beranda/byid_evaluasi_tender/'); ?>" + id + '/' + id_paket_evaluasi,
			dataType: "JSON",
			success: function(response) {
				if (type == 'evaluasi_nilai') {
					location.replace('<?= base_url('panitiajmtm/beranda/evaluasidetail/') ?>' + response['vendor'].id_mengikuti_paket_vendor + '/' + response['vendor'].id_mengikuti_vendor);
				} else if (type == 'lihat_prakualifiaksi') {
					$('#modal_lihat_sanggahan_prakualifikasi').modal('show');
					var html = '';
					var i;
					for (i = 0; i < response['pra_sanggah'].length; i++) {
						html += '<tr>' +
							'<td>' + response['pra_sanggah'][i].username_vendor + '</td>' +
							'<td>' + response['pra_sanggah'][i].nama_dokumen_sanggahan + '</td>' +
							'<td><a target="_blank" href="https://vms.jmtm.co.id/file_dokumen_sanggahan/' + response['pra_sanggah'][i].file_dokumen_sanggahan + '"><img src="<?= base_url('assets/img/pdf.png') ?>" style="width: 50px;" alt=""></a></td>' +
							'</tr>'
					}
					$('#lihat_sanggahan_prakualifiaksi').html(html);
					$('#modal_lihat_sanggahan_prakualifikasi').on('hidden.bs.modal', function() {
						document.location.reload();
					})
				} else if (type == 'lihat_sangahan_akhir') {
					$('#modal_lihat_sanggahan_akhir').modal('show');
					var html = '';
					var i;
					for (i = 0; i < response['sanggahan_akhir'].length; i++) {
						html += '<tr>' +
							'<td>' + response['sanggahan_akhir'][i].username_vendor + '</td>' +
							'<td>' + response['sanggahan_akhir'][i].nama_dokumen_sanggahan + '</td>' +
							'<td><a target="_blank" href="https://vms.jmtm.co.id/file_dokumen_sanggahan_akhir/' + response['sanggahan_akhir'][i].file_dokumen_sanggahan + '"><img src="<?= base_url('assets/img/pdf.png') ?>" style="width: 50px;" alt=""></a></td>' +
							'</tr>'
					}
					$('#lihat_sanggahan_akhir').html(html);
					$('#modal_lihat_sanggahan_akhir').on('hidden.bs.modal', function() {
						document.location.reload();
					})
				} else {
					deleteQuestion(response.id_unit_kerja, response.nama_unit_kerja, response.kode_unit_kerja);
				}
			}
		})
	}
</script>

<script>
	var modal_lihat_dokumen_tambahan = $('#lihat_dokumen_tambahan');
	var modalTitleDokumenVendor = $('#modalTitleDokumenVendor');

	function lihat_dokumen_vendor(id) {
		var id_paket = $('#id_paket').val();
		$.ajax({
			type: "POST",
			url: "<?= base_url('panitiajmtm/beranda/by_id_lihat_dokumen_tambahan/'); ?>" + id + '/' + id_paket,
			dataType: "JSON",
			success: function(response) {
				$('[name="id_persyaratan_tambahan"]').val(response['row_dokumen_persyaratan_tambahan'].id_persyaratan_tambahan);
				$('[name="id_vendor_persyaratan"]').val(response['row_dokumen_persyaratan_tambahan'].id_vendor);
				$('[name="id_paket_persyaratan"]').val(response['row_dokumen_persyaratan_tambahan'].id_paket);
				var html = '';
				var i;
				for (i = 0; i < response['dokumen_persyaratan_tambahan'].length; i++) {
					if (response['dokumen_persyaratan_tambahan'][i].status_lengkap == 'lulus') {
						var hasilnya = '<a href="javascript:;" class="btn btn-success btn-sm" onclick="hide_sementara(' + response['dokumen_persyaratan_tambahan'][i].id_persyaratan_tambahan + ');">Lulus</a>'
					} else if (response['dokumen_persyaratan_tambahan'][i].status_lengkap == 'tidak lulus') {
						var hasilnya = '<a href="javascript:;" class="btn btn-danger btn-sm" onclick="hide_sementara(' + response['dokumen_persyaratan_tambahan'][i].id_persyaratan_tambahan + ');">Tidak Lulus</a>'
					} else {
						var hasilnya = '<a class="btn btn-primary btn-sm text-white">Belum Di Periksa</a>'

					}
					html += '<tr>' +
						'<td>' + response['dokumen_persyaratan_tambahan'][i].nama_persyaratan_tambahan + '</td>' +
						'<td>' + response['dokumen_persyaratan_tambahan'][i].keterangan_persyaratan_tambahan + '</td>' +
						'<td>' + response['dokumen_persyaratan_tambahan'][i].nama_file_persyaratan_tambahan + '</td>' +
						'<td>' +
						'<a target="_blank" class="text-primary" href="https://vms.jmtm.co.id/file_persyaratan_tambahan/' +
						response['dokumen_persyaratan_tambahan'][i].file_persyaratan_tambahan + '">' +
						'<img style="width: 35px;" src="<?= base_url('assets/img/file-icon.png') ?>' + '">' + '</a>' +
						'</td>' +
						'<td>' + hasilnya + '</td>' +
						'<td>' + '<a href="javascript:;" class="btn btn-primary btn-sm" onclick="modal_periksa_check(' + response['dokumen_persyaratan_tambahan'][i].id_persyaratan_tambahan + ');">Periksa</a>' + '</td>' +
						'</tr>'
				}
				$('#table_persyaratan_tambahan').html(html);
				modal_lihat_dokumen_tambahan.modal('show');
				modalTitleDokumenVendor.text('Persyaratan Tambahan  ' + response['row_dokumen_persyaratan_tambahan'].username_vendor)
				// modal_lihat_dokumen_tambahan.on('hidden.bs.modal', function() {
				// 	document.location.reload();
				// })
			}
		})
	}

	function buka_tidak_lulus() {
		$('#form_tidak_lulus').show();
		$('#tutup_tidak_lulus').show();
		$('#buka_tidak_lulus').hide();
		$('#lulus').hide();
	}

	function tutup_tidak_lulus() {
		$('#form_tidak_lulus').hide();
		$('#buka_tidak_lulus').show();
		$('#lulus').show();
		$('#tutup_tidak_lulus').hide();
	}
</script>

<script>
	var tenaga_ahli = $('#tenaga_ahli')
	var modalTitleTenagaAhli = $('#modalTitleTenagaAhli')
	var table_tenaga_ahli_table = $('#table_tenaga_ahli_table')

	function lihat_tenaga_ahli(id_vendor) {
		$.ajax({
			type: "GET",
			url: "<?= base_url('panitiajmtm/beranda/tenaga_ahli_vendor/'); ?>" + id_vendor,
			dataType: "JSON",
			success: function(response) {
				$(document).ready(function() {
					table_tenaga_ahli_table.DataTable({
						dom: 'Bfrtip',
						buttons: [{
							extend: 'excel',
							text: 'Export Excel',
							title: 'Tenaga Ahli ' + response['vendor_tenaga_ahli_row'].username_vendor,
							className: 'btn btn-sm btn-success'
						}, {
							extend: 'pageLength',
							className: 'btn btn-sm btn-secondary'
						}],
						"responsive": true,
						"autoWidth": false,
						"processing": true,
						"serverSide": true,
						"bDestroy": true,
						"order": [],
						"ajax": {
							"url": "<?= base_url('panitiajmtm/beranda/tenaga_ahli_vendor_table/') ?>" + id_vendor,
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
				tenaga_ahli.modal('show');
				modalTitleTenagaAhli.text('Tenaga Ahli Penyedia  ' + response['vendor_tenaga_ahli_row'].username_vendor)
			}
		})
	}
</script>

<script>
	var neraca_keuangan = $('#neraca_keuangan')
	var modalTitleNeracaKeuangan = $('#modalTitleNeracaKeuangan')
	var table_neraca_keuangan = $('#table_neraca_keuangan')

	function lihat_neraca_keuangan(id_vendor) {
		$.ajax({
			type: "GET",
			url: "<?= base_url('panitiajmtm/beranda/vendor_neraca_keuangan/'); ?>" + id_vendor,
			dataType: "JSON",
			success: function(response) {
				$(document).ready(function() {
					table_neraca_keuangan.DataTable({
						"responsive": true,
						"autoWidth": false,
						"processing": true,
						"serverSide": true,
						"bDestroy": true,
						"order": [],
						"ajax": {
							"url": "<?= base_url('panitiajmtm/beranda/neraca_keuangan_vendor_table/') ?>" + id_vendor,
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
				neraca_keuangan.modal('show');
				modalTitleNeracaKeuangan.text('Neraca Keuangan Penyedia  ' + response['vendor_neraca_keuangan_row'].username_vendor)
			}
		})
	}
</script>

<script>
	var pengalaman = $('#pengalaman')
	var modalTitlePengalaman = $('#modalTitlePengalaman')
	var table_pengalaman = $('#table_pengalaman')

	function lihat_pengalaman(id_vendor) {
		$.ajax({
			type: "GET",
			url: "<?= base_url('panitiajmtm/beranda/vendor_pengalaman_row/'); ?>" + id_vendor,
			dataType: "JSON",
			success: function(response) {
				$(document).ready(function() {
					table_pengalaman.DataTable({
						dom: 'Bfrtip',
						buttons: [{
							extend: 'excel',
							text: 'Export Excel',
							title: 'Pengalaman Penyedia ' + response['vendor_pengalaman_row'].username_vendor,
							className: 'btn btn-sm btn-success'
						}, {
							extend: 'pageLength',
							className: 'btn btn-sm btn-secondary'
						}],
						"responsive": true,
						"autoWidth": false,
						"processing": true,
						"serverSide": true,
						"bDestroy": true,
						"order": [],
						"ajax": {
							"url": "<?= base_url('panitiajmtm/beranda/pengalaman_vendor_table/') ?>" + id_vendor,
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
				pengalaman.modal('show');
				modalTitlePengalaman.text('Pengalaman Penyedia ' + response['vendor_pengalaman_row'].username_vendor)
			}
		})
	}
</script>

<!--END INI Untuk Evaluasi -->


<!-- ini bagian Melihat Nilai -->

<!-- Nilai Administrasi Teknis -->
<script>
	var id_paket_evaluasi = $('#id_paket_evaluasi').val();

	function cek_dokumen_nilai(id, type) {
		if (type == 'lihat_evaluasi_administrasi') {
			saveData = 'lihat_evaluasi_administrasi';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('panitiajmtm/beranda/lihat_nilai_administrasi/'); ?>" + id + '/' + id_paket_evaluasi,
			dataType: "JSON",
			success: function(response) {
				if (type == 'lihat_evaluasi_administrasi') {
					var id_vendor = response['lihat_nilai_administrasi'].id_vendor_klarifikasi;
					var tbl_lihat_nilai_administrasi = $('#tbl_lihat_nilai_administrasi');
					var id_paket_evaluasi = $('#id_paket_evaluasi').val();
					var modal_lihat_nilai_administrasi = $('#modal_lihat_nilai_administrasi');
					$(document).ready(function() {
						tbl_lihat_nilai_administrasi.DataTable({
							"responsive": true,
							"autoWidth": false,
							"processing": true,
							"serverSide": true,
							"paging": false,
							"ordering": false,
							"filter": false,
							"info": false,
							"order": [],
							"ajax": {
								"url": "<?= base_url('panitiajmtm/beranda/table_lihat_nilai_administarsi/') ?>" + id_vendor + '/' + id_paket_evaluasi,
								"type": "POST"
							},
							"columnDefs": [{
								"target": [-1],
								"orderable": false
							}],
							"oLanguage": {
								"sSearch": "Pencarian : ",
								"sEmptyTable": "Anda Belum Melakukan Aksi Apapun",
								"sLoadingRecords": "Silahkan Tunggu - loading...",
								"sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
								"sZeroRecords": "Anda Belum Melakukan Aksi Apapun",
								"sProcessing": "Memuat Data...."
							}
						});
					});
					modal_lihat_nilai_administrasi.modal('show');
					modal_lihat_nilai_administrasi.on('hidden.bs.modal', function() {
						document.location.reload();
					})
				} else {}
			}
		})
	}
</script>

<!-- INI UNTUK EVALUASI TAMBAHAN -->
<script>
	function message(icon, text) {
		swal({
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}
	var modal_tidak_lulus_evaluasi_tambahan = $('#modal_tidak_lulus_evaluasi_tambahan');
	var lihat_dokumen_tambahan = $('#lihat_dokumen_tambahan');
	var modal_periksa = $('#modal_periksa');
	var modal_periksa_revisi_kelulusan = $('#modal_periksa_revisi_kelulusan');
	var id_paket = $('#id_paket').val();
	var form_lulus_dokumen_tambahan = $('#form_lulus_dokumen_tambahan');
	var form_tidak_lulus_dokumen_tambahan = $('#form_tidak_lulus_dokumen_tambahan');
	var form_revisi_lulus_dokumen_tambahan = $('#form_revisi_lulus_dokumen_tambahan');

	function Dokumentidaklengkap() {
		modal_tidak_lulus_evaluasi_tambahan.modal('show');
		modal_periksa.modal('hide')
		lihat_dokumen_tambahan.modal('hide')
	}

	// function modal_periksa_check() {
	// 	modal_tidak_lulus_evaluasi_tambahan.modal('hide');
	// 	modal_periksa.modal('show')
	// 	lihat_dokumen_tambahan.modal('hide')
	// }
	function modal_periksa_check(id) {
		$.ajax({
			type: "GET",
			url: "<?= base_url('panitiajmtm/beranda/get_by_id_dokumen_persyaratan_vendor_baris/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				$('[name="id_persyaratan_tambahan_lulus"]').val(response['ambil_id_detail_persyaratan_tambahan_vendor'].id_persyaratan_tambahan);
				$('[name="id_vendor_persyaratan_lulus"]').val(response['ambil_id_detail_persyaratan_tambahan_vendor'].id_vendor);
				$('[name="id_paket_persyaratan_lulus"]').val(response['ambil_id_detail_persyaratan_tambahan_vendor'].id_paket);
				modal_tidak_lulus_evaluasi_tambahan.modal('hide');
				modal_periksa.modal('show')
				lihat_dokumen_tambahan.modal('hide')
			}
		})
	}

	function modal_revisi_lulus(id) {
		$.ajax({
			type: "GET",
			url: "<?= base_url('panitiajmtm/beranda/get_by_id_dokumen_persyaratan_vendor_baris/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				$('[name="id_persyaratan_tambahan_lulus"]').val(response['ambil_id_detail_persyaratan_tambahan_vendor'].id_persyaratan_tambahan);
				$('[name="id_vendor_persyaratan_lulus"]').val(response['ambil_id_detail_persyaratan_tambahan_vendor'].id_vendor);
				$('[name="id_paket_persyaratan_lulus"]').val(response['ambil_id_detail_persyaratan_tambahan_vendor'].id_paket);
				modal_tidak_lulus_evaluasi_tambahan.modal('hide');
				modal_periksa_revisi_kelulusan.modal('show')
				lihat_dokumen_tambahan.modal('hide')
			}
		})
	}


	function Dokumenlengkap() {
		var id_paket = $('#id_paket').val()
		$.ajax({
			method: "POST",
			url: "<?= base_url("panitiajmtm/beranda/flaging_lulus/") ?>" + id_paket,
			data: form_lulus_dokumen_tambahan.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Dokumen Berhasil Di Luluskan!!')
					location.reload();
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}



	function DokumenTidaklengkap3() {
		var id_paket = $('#id_paket').val()
		$.ajax({
			method: "POST",
			url: "<?= base_url("panitiajmtm/beranda/flaging_tidak_lulus/") ?>" + id_paket,
			data: form_lulus_dokumen_tambahan.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Dokumen Tidak Di Luluskan!!')
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
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}
	var modal_periksa_revisi_kelulusan = $('#modal_periksa_revisi_kelulusan');
	document.getElementById("alasan_tidak_lulus_dokumen").onkeyup = function() {
		var alasan_tidak_lulus_dokumen = $('[name="alasan_tidak_lulus_dokumen"]').val();
		$('[name="alasan_tidak_lulus_new"]').val(alasan_tidak_lulus_dokumen);
		tidak_lulus_dokumen()
	};

	var form_tidak_lulus_dokumen_tambahan = $('#form_tidak_lulus_dokumen_tambahan');

	function tidak_lulus_dokumen() {
		var id_paket2 = $('#id_paket').val()
		$.ajax({
			method: "POST",
			url: '<?= base_url('panitiajmtm/beranda/flaging_tidak_lulus/') ?>' + id_paket2,
			data: form_tidak_lulus_dokumen_tambahan.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {}
			},
			error: function() {
				console.log(error);
			}
		})
	}
</script>


<script>
	function lihat_vendor_mengikuti(id) {
		$.ajax({
			type: "GET",
			url: "<?= base_url('panitiajmtm/beranda/by_id_lihat_vendor/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				$('#modal_lihat_vendor_mengikuti').modal('show');
				var html = '';
				var i;
				for (i = 0; i < response['vendor'].length; i++) {

					if (response['vendor'][i].status_vendor_baru) {
						var email_vendor = response['vendor'][i].email_vendor
						var telpon_vendor = response['vendor'][i].telpon_vendor
					} else {
						var email_vendor = response['vendor'][i].email_usaha
						var telpon_vendor = response['vendor'][i].telpon_usaha
					}
					html += '<tr>' +
						'<td>' + response['vendor'][i].username_vendor + '</td>' +
						'<td>' + email_vendor + '</td>' +
						'<td>' + telpon_vendor + '</td>' +
						'</tr>'
				}
				$('#lihat_vendor_mengikuti').html(html);
				$('#modal_lihat_vendor_mengikuti').on('hidden.bs.modal', function() {})

			}
		})
	}
</script>
<script>
	$(document).ready(function() {

		function notif() {
			var id_paket = $('#id_paket').val();
			$.ajax({
				type: "post",
				url: "<?= base_url() ?>panitiajmtm/beranda/ngeload_notif/" + id_paket,
				data: {},
				dataType: "json",
				success: function(r) {
					var n = r.data;
					$("#notifikasi").html(n);
				}
			});

		}
		setInterval(() => {
			notif()
		}, 5000);

		$('#sudahdibaca').on('click', function() {
			var id_paket = $('#id_paket').val();
			var id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
			$.ajax({
				type: "post",
				url: "<?= base_url() ?>panitiajmtm/beranda/sudah_dibaca2/" + id_paket,
				data: {
					id_pengirim: id_pengirim,
				},
				dataType: "json",
				success: function(data) {
					window.location.replace("<?= base_url() ?>panitiajmtm/beranda/pertanyaantender/" + id_paket);

				}
			});
		});

	});
</script>

<!-- Notifikasi Sanggahan Prakualifikasi -->
<script>
	$(document).ready(function() {

		function notif_sanggan_prakualifikasi() {
			var id_paket_sanggahan = $('#id_paket').val();
			$.ajax({
				type: "post",
				url: "<?= base_url() ?>panitiajmtm/beranda/ngeload_notif_sanggahan_prakualifikasi/" + id_paket_sanggahan,
				data: {},
				dataType: "json",
				success: function(r) {
					var n = r.data;
					$("#notifikasi_sangahan_prakualifikasi").html(n);
				}
			});

		}
		setInterval(() => {
			notif_sanggan_prakualifikasi()
		}, 5000);

		$('#sudahdibaca_sanggahan_prakualifikasi').on('click', function() {
			var id_paket_sanggahan = $('#id_paket').val();
			var id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
			$.ajax({
				type: "post",
				url: "<?= base_url() ?>panitiajmtm/beranda/sudah_dibaca_sanggahan_prakualifiaksi/" + id_paket_sanggahan,
				data: {
					id_pengirim: id_pengirim,
				},
				dataType: "json",
				success: function(data) {
					window.location.replace("<?= base_url() ?>panitiajmtm/beranda/sanggah_prakualifikasi/" + id_paket_sanggahan);

				}
			});
		});

	});
</script>

<!-- Notifikasi Sanggahan -->
<script>
	$(document).ready(function() {

		function notif_sanggan_akhir() {
			var id_paket_sanggahan_akhir = $('#id_paket').val();
			$.ajax({
				type: "post",
				url: "<?= base_url() ?>panitiajmtm/beranda/ngeload_notif_sanggahan_akhir/" + id_paket_sanggahan_akhir,
				data: {},
				dataType: "json",
				success: function(r) {
					var n = r.data;
					$("#notifikasi_sangahan_akhir").html(n);
				}
			});

		}
		setInterval(() => {
			notif_sanggan_akhir()
		}, 5000);

		$('#sudahdibaca_sanggahan_akhir').on('click', function() {
			var id_paket_sanggahan_akhir = $('#id_paket').val();
			var id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
			$.ajax({
				type: "post",
				url: "<?= base_url() ?>panitiajmtm/beranda/sudah_dibaca_sanggahan_akhir/" + id_paket_sanggahan_akhir,
				data: {
					id_pengirim: id_pengirim,
				},
				dataType: "json",
				success: function(data) {
					window.location.replace("<?= base_url() ?>panitiajmtm/beranda/sanggahantender/" + id_paket_sanggahan_akhir);

				}
			});
		});

	});
</script>

<!-- Notifikasi Negosiasi -->
<script>
	$(document).ready(function() {

		function notif_negosiasi() {
			var id_paket_negosiasi_tender = $('#id_paket').val();
			$.ajax({
				type: "post",
				url: "<?= base_url() ?>panitiajmtm/beranda/ngeload_notif_negosiasi_tender/" + id_paket_negosiasi_tender,
				data: {},
				dataType: "json",
				success: function(r) {
					var n = r.data;
					$("#notifikasi_negosiasi").html(n);
				}
			});

		}
		setInterval(() => {
			notif_negosiasi()
		}, 5000);

		$('#sudahdibaca_negosiasi').on('click', function() {
			var id_paket_negosiasi_tender = $('#id_paket').val();
			var id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
			$.ajax({
				type: "post",
				url: "<?= base_url() ?>panitiajmtm/beranda/sudah_dibaca_negosiasi_tender/" + id_paket_negosiasi_tender,
				data: {
					id_pengirim: id_pengirim,
				},
				dataType: "json",
				success: function(data) {
					window.location.replace("<?= base_url() ?>panitiajmtm/beranda/negosiasi/" + id_paket_negosiasi_tender);

				}
			});
		});

	});
</script>

<script>
	// 30 juni 2022
	var id_paket_pra30juni = $('[name="id_paket"]').val()
	var peralatan = $('#peralatan')
	var tbl_peralatan_tender = $('#tbl_peralatan_tender')
	var modalTitlePeralatan = $('#modalTitlePeralatan')

	function lihat_peralatan(id_vendor, id_paket) {
		$.ajax({
			type: "GET",
			url: "<?= base_url('panitiajmtm/beranda/peralatan_tender_vendor/'); ?>" + id_vendor,
			dataType: "JSON",
			success: function(response) {
				$(document).ready(function() {
					tbl_peralatan_tender.DataTable({
						dom: 'Bfrtip',
						buttons: [{
							extend: 'excel',
							text: 'Export Excel',
							title: 'Peralatan ' + response['vendor_peralatan_tender_row'].username_vendor,
							className: 'btn btn-sm btn-success'
						}, {
							extend: 'pageLength',
							className: 'btn btn-sm btn-secondary'
						}],
						"responsive": true,
						"autoWidth": false,
						"processing": true,
						"serverSide": true,
						"bDestroy": true,
						"order": [],
						"ajax": {
							"type": "POST",
							"data": {
								id_paket: id_paket_pra30juni
							},
							"url": "<?= base_url('panitiajmtm/beranda/get_data_peralatan_tender/') ?>" + id_vendor,

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
				peralatan.modal('show');
				modalTitlePeralatan.text('Peralatan Penyedia  ' + response['vendor_peralatan_tender_row'].username_vendor)
			}
		})
	}

	var tenagaahlimodal = $('#tenagaahlimodal')
	var tbl_tenaga_ahli_tender = $('#tbl_tenaga_ahli_tender')
	var modalTitletenagaahli = $('#modalTitletenagaahli')

	function lihat_tenaga_ahli(id_vendor) {
		$.ajax({
			type: "GET",
			url: "<?= base_url('panitiajmtm/beranda/tenaga_ahli_tender_row/'); ?>" + id_vendor,
			dataType: "JSON",
			success: function(response) {
				$(document).ready(function() {
					tbl_tenaga_ahli_tender.DataTable({
						dom: 'Bfrtip',
						buttons: [{
							extend: 'excel',
							text: 'Export Excel',
							title: 'Tenaga Ahli ' + response['row_tenaga_ahli_tender'].username_vendor,
							className: 'btn btn-sm btn-success'
						}, {
							extend: 'pageLength',
							className: 'btn btn-sm btn-secondary'
						}],
						"responsive": true,
						"autoWidth": false,
						"processing": true,
						"serverSide": true,
						"bDestroy": true,
						"order": [],
						"ajax": {
							"type": "POST",
							"data": {
								id_paket: id_paket_pra30juni
							},
							"url": "<?= base_url('panitiajmtm/beranda/get_data_tenaga_ahli_tender/') ?>" + id_vendor,

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
				tenagaahlimodal.modal('show');
				modalTitletenagaahli.text('Tenaga Ahli Penyedia  ' + response['row_tenaga_ahli_tender'].username_vendor)
			}

		})
	}



	var modal_tambah_riwayat_pekerjaan = $('#modal_tambah_riwayat');
	var tbl_riwayat_pekerjaan = $('#tbl_riwayat_pekerjaan');

	function byid_tenaga_ahli_tender(id, type) {
		console.log('tenaga id ', id)
		if (type == 'detail') {}
		$.ajax({
			type: "GET",
			url: "<?= base_url('panitiajmtm/beranda/by_id_tenaga_ahli_tender/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'detail') {
					modal_tambah_riwayat_pekerjaan.modal('show');
					$(document).ready(function() {
						tbl_riwayat_pekerjaan.DataTable({
							// "responsive": true,
							"autoWidth": false,
							"processing": true,
							"serverSide": true,
							"bDestroy": true,
							// "scrollX": true,
							"order": [],
							"ajax": {
								"url": "<?= base_url('panitiajmtm/beranda/get_data_riwayat_tenaga_ahli_tender') ?>",
								"type": "POST",
								"data": {
									id_tenaga_ahli_tender: id
								},
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
					// NANTI INI BUAT RESULT TABLE AJXNYA
				}
			}
		})
	}
</script>


<!-- BERITA ACARA PRAKUALIFIKASI 2023 -->
<script>
	function ba_pra() {
		test = $('#select_ba_pra').val();
		if (test == 1) {
			$('#ba-pra1').show();
			$('#ba-pra2').hide();
			$('#ba-pra3').hide();
			$('#ba-pra4').hide();
			$('#ba-pra5').hide();
		} else if (test == 2) {
			$('#ba-pra1').hide();
			$('#ba-pra2').show();
			$('#ba-pra3').hide();
			$('#ba-pra4').hide();
			$('#ba-pra5').hide();
		} else if (test == 3) {
			$('#ba-pra1').hide();
			$('#ba-pra2').hide();
			$('#ba-pra3').show();
			$('#ba-pra4').hide();
			$('#ba-pra5').hide();
		} else if (test == 4) {
			$('#ba-pra1').hide();
			$('#ba-pra2').hide();
			$('#ba-pra3').hide();
			$('#ba-pra4').show();
			$('#ba-pra5').hide();
		} else if (test == 5) {
			$('#ba-pra1').hide();
			$('#ba-pra2').hide();
			$('#ba-pra3').hide();
			$('#ba-pra4').hide();
			$('#ba-pra5').show();
		}
	}

	// BA PRA 1 
	tampil_data_vendor();

	function tampil_data_vendor() {
		var paket_id = $('#paket_id').val()
		$.ajax({
			type: 'ajax',
			url: '<?= base_url('panitiajmtm/beranda/get_vendor_ba1/') ?>' + paket_id,
			async: false,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i;
				var j = 1;

				for (i = 0; i < data.length; i++) {
					if (!data[i].nilai_prakualifikasi) {
						var nilai_prakualifikasi = '0';
					} else {
						var nilai_prakualifikasi = data[i].nilai_prakualifikasi;
					}

					if (!data[i].ev_admin_pra1) {
						var ev_admin_pra1 = 'Lulus / Gugur';
					} else if (data[i].ev_admin_pra1 == 1) {
						var ev_admin_pra1 = 'Lulus';
					} else if (data[i].ev_admin_pra1 == 2) {
						var ev_admin_pra1 = 'Gugur';
					} else {
						var ev_admin_pra1 = data[i].ev_admin_pra1;
					}

					if (!data[i].ev_keuangan_pra1) {
						var ev_keuangan_pra1 = 'Lulus / Gugur';
					} else if (data[i].ev_keuangan_pra1 == 1) {
						var ev_keuangan_pra1 = 'Lulus';
					} else if (data[i].ev_keuangan_pra1 == 2) {
						var ev_keuangan_pra1 = 'Gugur';
					} else {
						var ev_keuangan_pra1 = data[i].ev_keuangan_pra1;
					}


					if (!data[i].ev_teknis_pra1) {
						var ev_teknis_pra1 = 'Lulus / Gugur';
					} else if (data[i].ev_teknis_pra1 == 1) {
						var ev_teknis_pra1 = 'Lulus';
					} else if (data[i].ev_teknis_pra1 == 2) {
						var ev_teknis_pra1 = 'Gugur';
					} else {
						var ev_teknis_pra1 = data[i].ev_teknis_pra1;
					}

					if (!data[i].ket_pra1) {
						var ket_pra1 = 'Lulus / Gugur';
					} else if (data[i].ket_pra1 == 1) {
						var ket_pra1 = 'Lulus';
					} else if (data[i].ket_pra1 == 2) {
						var ket_pra1 = 'Gugur';
					} else {
						var ket_pra1 = data[i].ket_pra1;
					}

					html += '<tr>' +
						'<td style="text-align: center;">' + j++ + '</td>' +
						'<td style="text-align: center;">' + data[i].nama_usaha + '</td>' +
						'<td style="text-align: center;">' + ev_admin_pra1 + '</td>' +
						'<td style="text-align: center;">' + ev_keuangan_pra1 + '</td>' +
						'<td style="text-align: center;">' + ev_teknis_pra1 + '</td>' +
						'<td style="text-align: center;">' + nilai_prakualifikasi + '</td>' +
						'<td style="text-align: center;">' + ket_pra1 + '</td>' +
						'<td style="text-align: center;">' + '<a href="javascript:;" onclick="edit_pra1_vendor(' + data[i].id_mengikuti_vendor + ',' + paket_id + ')" class="btn btn-sm btn-warning">Edit</a>' + '</td>' +
						'</tr>';
				}
				$('#table_vendor').html(html);
			}

		});
	}

	function edit_pra1_vendor(id_vendor, id_paket) {
		$.ajax({
			type: 'ajax',
			url: '<?= base_url('panitiajmtm/beranda/get_vendor_ba1_row') ?>',
			async: false,
			method: 'POST',
			data: {
				id_vendor: id_vendor,
				id_paket: id_paket
			},
			dataType: 'json',
			success: function(data) {
				$('#nm_vendor').html(data.nama_usaha)
				$('#edit_nilai_pra1').modal('show')
				$('#id_mengikuti_paket').val(data.id_mengikuti_paket)
				$('[name="ev_admin_pra1"').val(data.ev_admin_pra1)
				$('[name="ev_keuangan_pra1"').val(data.ev_keuangan_pra1)
				$('[name="ev_teknis_pra1"').val(data.ev_teknis_pra1)
				$('[name="ket_pra1"').val(data.ket_pra1)
			}
		})
	}

	function save_ba1_vendor() {
		var save_ba1_vendor_form = $('#save_ba1_vendor_form')
		$.ajax({
			method: "POST",
			url: url = "<?= base_url("panitiajmtm/beranda/save_pra_1_vendor/") ?>",
			data: save_ba1_vendor_form.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Data Berhasil Di Simpan!')
					$('#edit_nilai_pra1').modal('hide')
					tampil_data_vendor();
				}
			},
			error: function() {
				console.log(error);
			}
		})

	}

	tampil_data_panitia()

	function tampil_data_panitia() {
		var paket_id = $('#paket_id').val()
		$.ajax({
			type: 'ajax',
			url: '<?= base_url('panitiajmtm/beranda/get_panitia_ba1/') ?>' + paket_id,
			async: false,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i;
				var j = 1;

				for (i = 0; i < data.length; i++) {

					html += '<tr>' +
						'<td style="text-align: center;">' + j++ + '</td>' +
						'<td style="text-align: center;">' + data[i].nama_pegawai + '</td>' +
						'<td style="text-align: center;">' + data[i].nama_role_panitia + '</td>' +
						'<td style="text-align: center;">' + '<a href="javascript:;" class="btn btn-sm btn-success">Sudah Di Setujui dari Pakta Integritas</a>  ' + '</td>' +
						'</tr>';
				}
				$('#table_panitia').html(html);
			}

		});
	}

	function simpan_ba_pra1(id_paket) {
		var form_ba_pra1 = $('#form_ba_pra1')
		$.ajax({
			method: "POST",
			url: url = "<?= base_url("panitiajmtm/beranda/simpan_ba_pra_1/") ?>" + id_paket,
			data: form_ba_pra1.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Data Berhasil Di Simpan!')
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}
	// END BA PRA 1


	// BA PRA 2 

	function simpan_ba_pra2(id_paket) {
		var form_ba_pra2 = $('#form_ba_pra2')
		$.ajax({
			method: "POST",
			url: url = "<?= base_url("panitiajmtm/beranda/simpan_ba_pra_2/") ?>" + id_paket,
			data: form_ba_pra2.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Data Berhasil Di Simpan!')
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}

	function edit_pra2_vendor(id_vendor, id_paket) {

		$.ajax({
			type: 'ajax',
			url: '<?= base_url('panitiajmtm/beranda/get_vendor_ba2_row') ?>',
			async: false,
			method: 'POST',
			data: {
				id_vendor: id_vendor,
				id_paket: id_paket
			},
			dataType: 'json',
			success: function(data) {
				$('#nm_vendor2').html(data.nama_usaha)
				$('#edit_nilai_pra2').modal('show')
				$('#id_mengikuti_paket2').val(data.id_mengikuti_paket)
				$('[name="ev_admin_pra2"').val(data.ev_admin_pra2)
				$('[name="ev_keuangan_pra2"').val(data.ev_keuangan_pra2)
				$('[name="ev_teknis_pra2"').val(data.ev_teknis_pra2)
				$('[name="ket_pra2"').val(data.ket_pra2)
				$('[name="peringkat_pra2"').val(data.peringkat_pra2)
			}
		})
	}

	function save_ba2_vendor_pra() {
		var save_ba2_vendor_form_pra = $('#save_ba2_vendor_form_pra')
		$.ajax({
			method: "POST",
			url: url = "<?= base_url("panitiajmtm/beranda/save_pra_2_vendor/") ?>",
			data: save_ba2_vendor_form_pra.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Data Berhasil Di Simpan!')
					$('#edit_nilai_pra2').modal('hide')
					tampil_data_vendor_pra2();
				}
			},
			error: function() {
				console.log(error);
			}
		})

	}

	tampil_data_vendor_pra2();

	function tampil_data_vendor_pra2() {
		var paket_id = $('#paket_id').val()
		$.ajax({
			type: 'ajax',
			url: '<?= base_url('panitiajmtm/beranda/get_vendor_ba1/') ?>' + paket_id,
			async: false,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i;
				var j = 1;

				for (i = 0; i < data.length; i++) {
					if (!data[i].nilai_teknis) {
						var nilai_teknis = '0';
					} else {
						var nilai_teknis = data[i].nilai_teknis;
					}

					if (!data[i].ev_admin_pra2) {
						var ev_admin_pra2 = 'Lulus / Gugur';
					} else if (data[i].ev_admin_pra2 == 1) {
						var ev_admin_pra2 = 'Lulus';
					} else if (data[i].ev_admin_pra2 == 2) {
						var ev_admin_pra2 = 'Gugur';
					} else {
						var ev_admin_pra2 = data[i].ev_admin_pra2;
					}

					if (!data[i].ev_keuangan_pra2) {
						var ev_keuangan_pra2 = 'Lulus / Gugur';
					} else if (data[i].ev_keuangan_pra2 == 1) {
						var ev_keuangan_pra2 = 'Lulus';
					} else if (data[i].ev_keuangan_pra2 == 2) {
						var ev_keuangan_pra2 = 'Gugur';
					} else {
						var ev_keuangan_pra2 = data[i].ev_keuangan_pra2;
					}


					if (!data[i].ev_teknis_pra2) {
						var ev_teknis_pra2 = 'Lulus / Gugur';
					} else if (data[i].ev_teknis_pra2 == 1) {
						var ev_teknis_pra2 = 'Lulus';
					} else if (data[i].ev_teknis_pra2 == 2) {
						var ev_teknis_pra2 = 'Gugur';
					} else {
						var ev_teknis_pra2 = data[i].ev_teknis_pra2;
					}

					if (!data[i].ket_pra2) {
						var ket_pra2 = 'Lulus / Gugur';
					} else if (data[i].ket_pra2 == 1) {
						var ket_pra2 = 'Lulus';
					} else if (data[i].ket_pra2 == 2) {
						var ket_pra2 = 'Gugur';
					} else {
						var ket_pra2 = data[i].ket_pra2;
					}

					if (!data[i].peringkat_pra2) {
						var peringkat_pra2 = ''
					} else {
						var peringkat_pra2 = data[i].peringkat_pra2
					}

					html += '<tr>' +
						'<td style="text-align: center;">' + j++ + '</td>' +
						'<td style="text-align: center;">' + data[i].nama_usaha + '</td>' +
						'<td style="text-align: center;">' + ev_admin_pra2 + '</td>' +
						'<td style="text-align: center;">' + ev_keuangan_pra2 + '</td>' +
						'<td style="text-align: center;">' + ev_teknis_pra2 + '</td>' +
						'<td style="text-align: center;">' + nilai_teknis + '</td>' +
						'<td style="text-align: center;">' + ket_pra2 + '</td>' +
						'<td style="text-align: center;">' + peringkat_pra2 + '</td>' +
						'<td style="text-align: center;">' + '<a href="javascript:;" onclick="edit_pra2_vendor(' + data[i].id_mengikuti_vendor + ',' + paket_id + ')" class="btn btn-sm btn-warning">Edit</a>' + '</td>' +
						'</tr>';
				}
				$('#table_vendor_pra2').html(html);
			}

		});
	}
	// END BA PRA 2

	// BA PRA 3
	function simpan_ba_pra3(id_paket) {
		var form_ba_pra3 = $('#form_ba_pra3')
		$.ajax({
			method: "POST",
			url: url = "<?= base_url("panitiajmtm/beranda/save_ba_pra3/") ?>" + id_paket,
			data: form_ba_pra3.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Data Berhasil Di Simpan!')
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}

	tampil_data_vendor_pra3();

	function tampil_data_vendor_pra3() {
		var paket_id = $('#paket_id').val()
		$.ajax({
			type: 'ajax',
			url: '<?= base_url('panitiajmtm/beranda/get_vendor_ba1/') ?>' + paket_id,
			async: false,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i;
				var j = 1;

				for (i = 0; i < data.length; i++) {

					if (!data[i].sp_pra3) {
						var sp_pra3 = 'Ada / Tidak Ada';
					} else if (data[i].sp_pra3 == 1) {
						var sp_pra3 = 'Ada';
					} else if (data[i].sp_pra3 == 2) {
						var sp_pra3 = 'Tidak Ada';
					} else {
						var sp_pra3 = data[i].sp_pra3;
					}

					if (!data[i].rdkh_pra3) {
						var rdkh_pra3 = 'Ada / Tidak Ada';
					} else if (data[i].rdkh_pra3 == 1) {
						var rdkh_pra3 = 'Ada';
					} else if (data[i].rdkh_pra3 == 2) {
						var rdkh_pra3 = 'Tidak Ada';
					} else {
						var rdkh_pra3 = data[i].rdkh_pra3;
					}


					if (!data[i].dkh_pra3) {
						var dkh_pra3 = 'Ada / Tidak Ada';
					} else if (data[i].dkh_pra3 == 1) {
						var dkh_pra3 = 'Ada';
					} else if (data[i].dkh_pra3 == 2) {
						var dkh_pra3 = 'Tidak Ada';
					} else {
						var dkh_pra3 = data[i].dkh_pra3;
					}

					if (!data[i].ket_pra3) {
						var ket_pra3 = 'Sah / Gugur';
					} else if (data[i].ket_pra3 == 1) {
						var ket_pra3 = 'Sah';
					} else if (data[i].ket_pra3 == 2) {
						var ket_pra3 = 'Gugur';
					} else {
						var ket_pra3 = data[i].ket_pra3;
					}

					if (!data[i].hps_pra3_1) {
						var hps_pra3_1 = ''
					} else {
						var hps_pra3_1 = data[i].hps_pra3_1
					}

					if (!data[i].nilai_penawaran) {
						var nilai_penawaran = 'Tidak Ada Penawaran'
					} else {
						var nilai_penawaran = data[i].nilai_penawaran
					}

					html += '<tr>' +
						'<td style="text-align: center;">' + j++ + '</td>' +
						'<td style="text-align: center;">' + data[i].nama_usaha + '</td>' +
						'<td style="text-align: center;">' + sp_pra3 + '</td>' +
						'<td style="text-align: center;">' + rdkh_pra3 + '</td>' +
						'<td style="text-align: center;">' + dkh_pra3 + '</td>' +
						'<td style="text-align: center;">' + formatRupiah(nilai_penawaran, 'Rp. ') + '</td>' +
						'<td style="text-align: center;">' + hps_pra3_1 + '</td>' +
						'<td style="text-align: center;">' + ket_pra3 + '</td>' +
						'<td style="text-align: center;">' + '<a href="javascript:;" onclick="edit_pra3_vendor(' + data[i].id_mengikuti_vendor + ',' + paket_id + ')" class="btn btn-sm btn-warning">Edit</a>' + '</td>' +
						'</tr>';
				}
				$('#table_vendor3_pra').html(html);
			}

		});
	}


	tampil_data_vendor_pra3_2()

	function tampil_data_vendor_pra3_2() {
		var paket_id = $('#paket_id').val()
		$.ajax({
			type: 'ajax',
			url: '<?= base_url('panitiajmtm/beranda/get_vendor_ba1/') ?>' + paket_id,
			async: false,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i;
				var j = 1;

				for (i = 0; i < data.length; i++) {

					if (!data[i].sp_pra3) {
						var sp_pra3 = 'Ada / Tidak Ada';
					} else if (data[i].sp_pra3 == 1) {
						var sp_pra3 = 'Ada';
					} else if (data[i].sp_pra3 == 2) {
						var sp_pra3 = 'Tidak Ada';
					} else {
						var sp_pra3 = data[i].sp_pra3;
					}



					if (!data[i].nilai_teknis) {
						var nilai_teknis = '0'
					} else {
						var nilai_teknis = data[i].nilai_teknis
					}

					if (!data[i].nilai_terkoreksi) {
						var nilai_terkoreksi = 'Tidak Ada Penawaran'
					} else {
						var nilai_terkoreksi = data[i].nilai_terkoreksi
					}

					if (!data[i].hps_pra3_2) {
						var hps_pra3_2 = '0'
					} else {
						var hps_pra3_2 = data[i].hps_pra3_2
					}

					if (!data[i].nhp_pra3) {
						var nhp_pra3 = '0'
					} else {
						var nhp_pra3 = data[i].nhp_pra3
					}


					if (!data[i].nilai_akhir) {
						var nilai_akhir = '0'
					} else {
						var nilai_akhir = data[i].nilai_akhir
					}

					if (!data[i].peringkat_pra3) {
						var peringkat_pra3 = 'Tidak Ada Peringkat'
					} else {
						var peringkat_pra3 = data[i].peringkat_pra3
					}

					if (!data[i].ket_pra3_2) {
						var ket_pra3_2 = 'Sah / Gugur';
					} else if (data[i].ket_pra3_2 == 1) {
						var ket_pra3_2 = 'Sah';
					} else if (data[i].ket_pra3_2 == 2) {
						var ket_pra3_2 = 'Gugur';
					} else {
						var ket_pra3_2 = data[i].ket_pra3_2;
					}

					html += '<tr>' +
						'<td style="text-align: center;">' + j++ + '</td>' +
						'<td style="text-align: center;">' + data[i].nama_usaha + '</td>' +
						'<td style="text-align: center;">' + nilai_teknis + '</td>' +
						'<td style="text-align: center;">' + formatRupiah(nilai_terkoreksi, 'Rp. ') + '</td>' +
						'<td style="text-align: center;">' + hps_pra3_2 + '</td>' +
						'<td style="text-align: center;">' + nhp_pra3 + '</td>' +
						'<td style="text-align: center;">' + nilai_akhir + '</td>' +
						'<td style="text-align: center;">' + peringkat_pra3 + '</td>' +
						'<td style="text-align: center;">' + ket_pra3_2 + '</td>' +
						'<td style="text-align: center;">' + '<a href="javascript:;" onclick="edit_pra3_vendor2(' + data[i].id_mengikuti_vendor + ',' + paket_id + ')" class="btn btn-sm btn-warning">Edit</a>' + '</td>' +
						'</tr>';
				}
				$('#table_vendor3_2_pra').html(html);
			}

		});
	}

	function edit_pra3_vendor(id_vendor, id_paket) {

		$.ajax({
			type: 'ajax',
			url: '<?= base_url('panitiajmtm/beranda/get_vendor_ba1_row') ?>',
			async: false,
			method: 'POST',
			data: {
				id_vendor: id_vendor,
				id_paket: id_paket
			},
			dataType: 'json',
			success: function(data) {
				$('#nm_vendor3').html(data.nama_usaha)
				$('#edit_nilai_pra3').modal('show')
				$('#id_mengikuti_paket3').val(data.id_mengikuti_paket)
				$('[name="sp_pra3"').val(data.sp_pra3)
				$('[name="rdkh_pra3"').val(data.rdkh_pra3)
				$('[name="dkh_pra3"').val(data.dkh_pra3)
				$('[name="hps_pra3_1"').val(data.hps_pra3_1)
				$('[name="ket_pra3_1"').val(data.ket_pra3)
			}
		})
	}

	function edit_pra3_vendor2(id_vendor, id_paket) {

		$.ajax({
			type: 'ajax',
			url: '<?= base_url('panitiajmtm/beranda/get_vendor_ba1_row') ?>',
			async: false,
			method: 'POST',
			data: {
				id_vendor: id_vendor,
				id_paket: id_paket
			},
			dataType: 'json',
			success: function(data) {
				$('#nm_vendor3_2').html(data.nama_usaha)
				$('#edit_nilai_pra3_2').modal('show')
				$('#id_mengikuti_paket3_2').val(data.id_mengikuti_paket)
				$('[name="hps_pra3_2"').val(data.hps_pra3_2)
				$('[name="nhp_pra3"').val(data.nhp_pra3)
				$('[name="peringkat_pra3"').val(data.peringkat_pra3)
				$('[name="ket_pra3_2"').val(data.ket_pra3_2)
			}
		})
	}

	function save_ba3_vendor_pra() {
		var save_ba3_vendor_form_pra = $('#save_ba3_vendor_form_pra')
		$.ajax({
			method: "POST",
			url: url = "<?= base_url("panitiajmtm/beranda/save_pra_3_vendor/") ?>",
			data: save_ba3_vendor_form_pra.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Data Berhasil Di Simpan!')
					$('#edit_nilai_pra3').modal('hide')
					tampil_data_vendor_pra3();
				}
			},
			error: function() {
				console.log(error);
			}
		})

	}

	function save_ba3_vendor_pra2() {
		var save_ba3_vendor_form_pra2 = $('#save_ba3_vendor_form_pra2')
		$.ajax({
			method: "POST",
			url: url = "<?= base_url("panitiajmtm/beranda/save_pra_3_vendor2/") ?>",
			data: save_ba3_vendor_form_pra2.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Data Berhasil Di Simpan!')
					$('#edit_nilai_pra3_2').modal('hide')
					tampil_data_vendor_pra3_2()
				}
			},
			error: function() {
				console.log(error);
			}
		})

	}

	// END BA PRA 3

	// BA PRA 4
	function simpan_ba_pra4(id_paket) {
		var form_ba_pra4 = $('#form_ba_pra4')
		$.ajax({
			method: "POST",
			url: url = "<?= base_url("panitiajmtm/beranda/save_ba_pra4/") ?>" + id_paket,
			data: form_ba_pra4.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Data Berhasil Di Simpan!')
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}

	tampil_data_vendor_pra4()

	function tampil_data_vendor_pra4() {
		var paket_id = $('#paket_id').val()
		$.ajax({
			type: 'ajax',
			url: '<?= base_url('panitiajmtm/beranda/get_vendor_ba1/') ?>' + paket_id,
			async: false,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i;
				var j = 1;

				for (i = 0; i < data.length; i++) {


					if (!data[i].nilai_teknis) {
						var nilai_teknis = '0'
					} else {
						var nilai_teknis = data[i].nilai_teknis
					}

					if (!data[i].nilai_terkoreksi) {
						var nilai_terkoreksi = 'Tidak Ada Penawaran'
					} else {
						var nilai_terkoreksi = data[i].nilai_terkoreksi
					}

					if (!data[i].hps_pra4) {
						var hps_pra4 = '0'
					} else {
						var hps_pra4 = data[i].hps_pra4
					}

					if (!data[i].nph_pra4) {
						var nph_pra4 = '0'
					} else {
						var nph_pra4 = data[i].nph_pra4
					}


					if (!data[i].nilai_akhir) {
						var nilai_akhir = '0'
					} else {
						var nilai_akhir = data[i].nilai_akhir
					}

					if (!data[i].peringkat_pra4) {
						var peringkat_pra4 = 'Tidak Ada Peringkat'
					} else {
						var peringkat_pra4 = data[i].peringkat_pra4
					}

					if (!data[i].negosiasi) {
						var negosiasi = 'Tidak Ada Negosiasi'
					} else {
						var negosiasi = data[i].negosiasi
					}

					if (!data[i].ket_pra4) {
						var ket_pra4 = 'Lulus / Gugur';
					} else if (data[i].ket_pra4 == 1) {
						var ket_pra4 = 'Lulus';
					} else if (data[i].ket_pra4 == 2) {
						var ket_pra4 = 'Gugur';
					} else {
						var ket_pra4 = data[i].ket_pra4;
					}

					html += '<tr>' +
						'<td style="text-align: center;">' + j++ + '</td>' +
						'<td style="text-align: center;">' + data[i].nama_usaha + '</td>' +
						'<td style="text-align: center;">' + nilai_teknis + '</td>' +
						'<td style="text-align: center;">' + formatRupiah(nilai_terkoreksi, 'Rp. ') + '</td>' +
						'<td style="text-align: center;">' + hps_pra4 + '</td>' +
						'<td style="text-align: center;">' + nph_pra4 + '</td>' +
						'<td style="text-align: center;">' + nilai_akhir + '</td>' +
						'<td style="text-align: center;">' + peringkat_pra4 + '</td>' +
						'<td style="text-align: center;">' + formatRupiah(negosiasi, 'Rp. ') + '</td>' +
						'<td style="text-align: center;">' + ket_pra4 + '</td>' +
						'<td style="text-align: center;">' + '<a href="javascript:;" onclick="edit_pra4_vendor(' + data[i].id_mengikuti_vendor + ',' + paket_id + ')" class="btn btn-sm btn-warning">Edit</a>' + '</td>' +
						'</tr>';
				}
				$('#table_vendor4').html(html);
			}

		});
	}


	function edit_pra4_vendor(id_vendor, id_paket) {

		$.ajax({
			type: 'ajax',
			url: '<?= base_url('panitiajmtm/beranda/get_vendor_ba1_row') ?>',
			async: false,
			method: 'POST',
			data: {
				id_vendor: id_vendor,
				id_paket: id_paket
			},
			dataType: 'json',
			success: function(data) {
				$('#nm_vendor4').html(data.nama_usaha)
				$('#edit_nilai_pra4').modal('show')
				$('#id_mengikuti_paket4').val(data.id_mengikuti_paket)
				$('[name="hps_pra4"').val(data.hps_pra4)
				$('[name="nhp_pra4"').val(data.nhp_pra4)
				$('[name="peringkat_pra4"').val(data.peringkat_pra4)
				$('[name="ket_pra4"').val(data.ket_pra4)
			}
		})
	}

	function save_ba4_vendor_pra() {
		var save_ba4_vendor_form_pra = $('#save_ba4_vendor_form_pra')
		$.ajax({
			method: "POST",
			url: url = "<?= base_url("panitiajmtm/beranda/save_pra_4_vendor/") ?>",
			data: save_ba4_vendor_form_pra.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Data Berhasil Di Simpan!')
					$('#edit_nilai_pra4').modal('hide')
					tampil_data_vendor_pra4();
				}
			},
			error: function() {
				console.log(error);
			}
		})

	}
	// END BA PRA 4

	// BA PRA 5
	function simpan_ba_pra5(id_paket) {
		var form_ba_pra5 = $('#form_ba_pra5')
		$.ajax({
			method: "POST",
			url: url = "<?= base_url("panitiajmtm/beranda/save_ba_pra5/") ?>" + id_paket,
			data: form_ba_pra5.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Data Berhasil Di Simpan!')
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}
	// END BA PRA 5
</script>

<!-- BERITA ACARA PASCA 2023-->
<script>
	// BA PASCA 1
	function ba_pasca() {
		pasca = $('#select_ba_pasca').val();
		if (pasca == 1) {
			$('#ba-pasca1').show();
			$('#ba-pasca2').hide();
			$('#ba-pasca3').hide();
			$('#ba-pasca4').hide();
			$('#ba-pasca5').hide();
		} else if (pasca == 2) {
			$('#ba-pasca1').hide();
			$('#ba-pasca2').show();
			$('#ba-pasca3').hide();
			$('#ba-pasca4').hide();
			$('#ba-pasca5').hide();
		} else if (pasca == 3) {
			$('#ba-pasca1').hide();
			$('#ba-pasca2').hide();
			$('#ba-pasca3').show();
			$('#ba-pasca4').hide();
			$('#ba-pasca5').hide();
		} else if (pasca == 4) {
			$('#ba-pasca1').hide();
			$('#ba-pasca2').hide();
			$('#ba-pasca3').hide();
			$('#ba-pasca4').show();
			$('#ba-pasca5').hide();
		} else if (pasca == 5) {
			$('#ba-pasca1').hide();
			$('#ba-pasca2').hide();
			$('#ba-pasca3').hide();
			$('#ba-pasca4').hide();
			$('#ba-pasca5').show();
		}
	}

	function simpan_ba_pasca1(id_paket) {
		var form_ba_pasca1 = $('#form_ba_pasca1')
		$.ajax({
			method: "POST",
			url: url = "<?= base_url("panitiajmtm/beranda/save_ba_pasca1/") ?>" + id_paket,
			data: form_ba_pasca1.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Data Berhasil Di Simpan!')
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}

	// END BA PASCA 1

	// BA PASCA 2

	function add_unsur(id_paket) {
		$('#modal_unsur').modal('show')
		$('[name="id_paket_unsur"]').val(id_paket)
	}

	function simpan_unsur() {
		var form_unsur = $('#form_unsur')
		var id_paket = $('[name="id_paket_unsur"]').val()
		$.ajax({
			method: "POST",
			url: url = "<?= base_url("panitiajmtm/beranda/simpan_unsur/") ?>" + id_paket,
			data: form_unsur.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					form_unsur[0].reset;
					tampil_data_unsur()
					$('#modal_unsur').modal('hide')
					message('success', 'Data Berhasil Di Simpan!')
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}

	tampil_data_unsur()

	function tampil_data_unsur() {
		var paket_id = $('#paket_id').val()
		$.ajax({
			type: 'ajax',
			url: '<?= base_url('panitiajmtm/beranda/get_unsur/') ?>' + paket_id,
			async: false,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i;
				var j = 1;

				for (i = 0; i < data.length; i++) {
					if (i == 0) {
						var j = 'a'
					} else if (i == 1) {
						var j = 'b'
					} else if (i == 2) {
						var j = 'c'
					} else if (i == 3) {
						var j = 'd'
					} else if (i == 4) {
						var j = 'f'
					} else if (i == 5) {
						var j = 'g'
					} else if (i == 6) {
						var j = 'h'
					} else if (i == 7) {
						var j = 'i'
					} else if (i == 8) {
						var j = 'j'
					} else if (i == 9) {
						var j = 'k'
					} else if (i == 10) {
						var j = 'l'
					} else if (i == 11) {
						var j = 'm'
					} else if (i == 12) {
						var j = 'n'
					} else if (i == 13) {
						var j = 'o'
					} else if (i == 14) {
						var j = 'p'
					} else if (i == 15) {
						var j = 'q'
					} else if (i == 16) {
						var j = 'r'
					} else if (i == 17) {
						var j = 's'
					} else if (i == 18) {
						var j = 't'
					} else if (i == 19) {
						var j = 'u'
					} else if (i == 20) {
						var j = 'v'
					} else if (i == 21) {
						var j = 'w'
					} else if (i == 22) {
						var j = 'x'
					} else if (i == 23) {
						var j = 'y'
					} else if (i == 24) {
						var j = 'z'
					}

					var nm_unsur = data[i].nama_unsur
					var id_unsur_pasca2 = data[i].id_unsur_pasca2
					$.ajax({
						type: 'ajax',
						url: '<?= base_url('panitiajmtm/beranda/get_unsur2/') ?>' + data[i].id_unsur_pasca2,
						async: false,
						dataType: 'json',
						success: function(data) {
							var html2 = '';
							var lm;
							for (lm = 0; lm < data.length; lm++) {

								html2 += '<p style="margin-left:20px">' + (lm + 1) + ' . ' + data[lm].nama_unsur2 + '<p>'
							}
							html += '<p>' + j + ' . ' + nm_unsur + ' <a href="javascript:;" onclick="tambah_detail_unsur(' + id_unsur_pasca2 + ')" class="btn btn-success btn-sm">+ Tambah Detail</a><p> ' + html2 + '';
						}

					});
				}
				$('#tampil_unsur').html(html);
			}

		});
	}

	function tambah_detail_unsur(id_ba_unsur_pasca2) {
		$('#modal_unsur2').modal('show')
		var form_unsur2 = $('#form_unsur2')
		form_unsur2[0].reset;
		var paket_id = $('#paket_id').val()
		$('[name="id_paket_unsur2"]').val(paket_id)
		$('[name="id_ba_unsur_pasca2"]').val(id_ba_unsur_pasca2)
	}

	function simpan_unsur2() {
		var form_unsur2 = $('#form_unsur2')
		$.ajax({
			method: "POST",
			url: url = "<?= base_url("panitiajmtm/beranda/simpan_unsur2/") ?>",
			data: form_unsur2.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					form_unsur2[0].reset;
					tampil_data_unsur()
					$('#modal_unsur2').modal('hide')
					message('success', 'Data Berhasil Di Simpan!')
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}
	tampil_data_vendor_pasca2()

	function tampil_data_vendor_pasca2() {
		var paket_id = $('#paket_id').val()
		$.ajax({
			type: 'ajax',
			url: '<?= base_url('panitiajmtm/beranda/get_vendor_ba1/') ?>' + paket_id,
			async: false,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i;
				var j = 1;

				for (i = 0; i < data.length; i++) {
					if (!data[i].nilai_teknis) {
						var nilai_teknis = '0';
					} else {
						var nilai_teknis = data[i].nilai_teknis;
					}

					if (!data[i].ev_admin_pasca2) {
						var ev_admin_pasca2 = 'Lulus / Gugur';
					} else if (data[i].ev_admin_pasca2 == 1) {
						var ev_admin_pasca2 = 'Lulus';
					} else if (data[i].ev_admin_pasca2 == 2) {
						var ev_admin_pasca2 = 'Gugur';
					} else {
						var ev_admin_pasca2 = data[i].ev_admin_pasca2;
					}

					if (!data[i].ev_keuangan_pasca2) {
						var ev_keuangan_pasca2 = 'Lulus / Gugur';
					} else if (data[i].ev_keuangan_pasca2 == 1) {
						var ev_keuangan_pasca2 = 'Lulus';
					} else if (data[i].ev_keuangan_pasca2 == 2) {
						var ev_keuangan_pasca2 = 'Gugur';
					} else {
						var ev_keuangan_pasca2 = data[i].ev_keuangan_pasca2;
					}


					if (!data[i].ev_teknis_pasca2) {
						var ev_teknis_pasca2 = 'Lulus / Gugur';
					} else if (data[i].ev_teknis_pasca2 == 1) {
						var ev_teknis_pasca2 = 'Lulus';
					} else if (data[i].ev_teknis_pasca2 == 2) {
						var ev_teknis_pasca2 = 'Gugur';
					} else {
						var ev_teknis_pasca2 = data[i].ev_teknis_pasca2;
					}

					if (!data[i].ket_pasca2) {
						var ket_pasca2 = 'Lulus / Gugur';
					} else if (data[i].ket_pasca2 == 1) {
						var ket_pasca2 = 'Lulus';
					} else if (data[i].ket_pasca2 == 2) {
						var ket_pasca2 = 'Gugur';
					} else {
						var ket_pasca2 = data[i].ket_pasca2;
					}

					if (!data[i].peringkat_pasca2) {
						var peringkat_pasca2 = ''
					} else {
						var peringkat_pasca2 = data[i].peringkat_pasca2
					}

					html += '<tr>' +
						'<td style="text-align: center;">' + j++ + '</td>' +
						'<td style="text-align: center;">' + data[i].nama_usaha + '</td>' +
						'<td style="text-align: center;">' + ev_admin_pasca2 + '</td>' +
						'<td style="text-align: center;">' + ev_keuangan_pasca2 + '</td>' +
						'<td style="text-align: center;">' + ev_teknis_pasca2 + '</td>' +
						'<td style="text-align: center;">' + nilai_teknis + '</td>' +
						'<td style="text-align: center;">' + ket_pasca2 + '</td>' +
						'<td style="text-align: center;">' + peringkat_pasca2 + '</td>' +
						'<td style="text-align: center;">' + '<a href="javascript:;" onclick="edit_pasca2_vendor(' + data[i].id_mengikuti_vendor + ',' + paket_id + ')" class="btn btn-sm btn-warning">Edit</a>' + '</td>' +
						'</tr>';
				}
				$('#table_vendor2').html(html);
			}

		});
	}

	function edit_pasca2_vendor(id_vendor, id_paket) {
		$('#edit_nilai_pasca2').modal('show')
		$.ajax({
			type: 'ajax',
			url: '<?= base_url('panitiajmtm/beranda/get_vendor_ba1_row') ?>',
			async: false,
			method: 'POST',
			data: {
				id_vendor: id_vendor,
				id_paket: id_paket
			},
			dataType: 'json',
			success: function(data) {
				$('#nm_vendor_pasca2').html(data.nama_usaha)
				$('#edit_nilai_pasca2').modal('show')
				$('#paket_pasca2').val(data.id_mengikuti_paket)
				$('[name="ev_admin_pasca2"').val(data.ev_admin_pasca2)
				$('[name="ev_keuangan_pasca2"').val(data.ev_keuangan_pasca2)
				$('[name="ev_teknis_pasca2"').val(data.ev_teknis_pasca2)
				$('[name="ket_pasca2"').val(data.ket_pasca2)
				$('[name="peringkat_pasca2"').val(data.peringkat_pasca2)
			}
		})
	}

	function save_ba2_vendor_pasca() {
		var save_ba2_vendor_form_pasca = $('#save_ba2_vendor_form_pasca')
		$.ajax({
			method: "POST",
			url: url = "<?= base_url("panitiajmtm/beranda/save_pasca_2_vendor/") ?>",
			data: save_ba2_vendor_form_pasca.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Data Berhasil Di Simpan!')
					$('#edit_nilai_pasca2').modal('hide')
					tampil_data_vendor_pasca2();
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}

	function simpan_ba_pasca2(id_paket) {
		var form_ba_pasca2 = $('#form_ba_pasca2')
		$.ajax({
			method: "POST",
			url: url = "<?= base_url("panitiajmtm/beranda/save_ba_pasca2/") ?>" + id_paket,
			data: form_ba_pasca2.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Data Berhasil Di Simpan!')
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}

	//END BA PASCA 2

	// BA PASCA 3
	function simpan_ba_pasca3(id_paket) {
		var form_ba_pasca3 = $('#form_ba_pasca3')
		$.ajax({
			method: "POST",
			url: url = "<?= base_url("panitiajmtm/beranda/save_ba_pasca3/") ?>" + id_paket,
			data: form_ba_pasca3.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Data Berhasil Di Simpan!')
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}

	tampil_data_vendor_pasca3();


	function tampil_data_vendor_pasca3() {
		var paket_id = $('#paket_id').val()
		$.ajax({
			type: 'ajax',
			url: '<?= base_url('panitiajmtm/beranda/get_vendor_ba1/') ?>' + paket_id,
			async: false,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i;
				var j = 1;

				for (i = 0; i < data.length; i++) {

					if (!data[i].sp_pasca3) {
						var sp_pasca3 = 'Ada / Tidak Ada';
					} else if (data[i].sp_pasca3 == 1) {
						var sp_pasca3 = 'Ada';
					} else if (data[i].sp_pasca3 == 2) {
						var sp_pasca3 = 'Tidak Ada';
					} else {
						var sp_pasca3 = data[i].sp_pasca3;
					}

					if (!data[i].rdkh_pasca3) {
						var rdkh_pasca3 = 'Ada / Tidak Ada';
					} else if (data[i].rdkh_pasca3 == 1) {
						var rdkh_pasca3 = 'Ada';
					} else if (data[i].rdkh_pasca3 == 2) {
						var rdkh_pasca3 = 'Tidak Ada';
					} else {
						var rdkh_pasca3 = data[i].rdkh_pasca3;
					}


					if (!data[i].dkh_pasca3) {
						var dkh_pasca3 = 'Ada / Tidak Ada';
					} else if (data[i].dkh_pasca3 == 1) {
						var dkh_pasca3 = 'Ada';
					} else if (data[i].dkh_pasca3 == 2) {
						var dkh_pasca3 = 'Tidak Ada';
					} else {
						var dkh_pasca3 = data[i].dkh_pasca3;
					}

					if (!data[i].ket_pasca3_1) {
						var ket_pasca3_1 = 'Sah / Gugur';
					} else if (data[i].ket_pasca3_1 == 1) {
						var ket_pasca3_1 = 'Sah';
					} else if (data[i].ket_pasca3_1 == 2) {
						var ket_pasca3_1 = 'Gugur';
					} else {
						var ket_pasca3_1 = data[i].ket_pasca3_1;
					}

					if (!data[i].hps_pasca3_1) {
						var hps_pasca3_1 = ''
					} else {
						var hps_pasca3_1 = data[i].hps_pasca3_1
					}

					if (!data[i].nilai_penawaran) {
						var nilai_penawaran = 'Tidak Ada Penawaran'
					} else {
						var nilai_penawaran = data[i].nilai_penawaran
					}

					html += '<tr>' +
						'<td style="text-align: center;">' + j++ + '</td>' +
						'<td style="text-align: center;">' + data[i].nama_usaha + '</td>' +
						'<td style="text-align: center;">' + sp_pasca3 + '</td>' +
						'<td style="text-align: center;">' + rdkh_pasca3 + '</td>' +
						'<td style="text-align: center;">' + dkh_pasca3 + '</td>' +
						'<td style="text-align: center;">' + formatRupiah(nilai_penawaran, 'Rp. ') + '</td>' +
						'<td style="text-align: center;">' + hps_pasca3_1 + '</td>' +
						'<td style="text-align: center;">' + ket_pasca3_1 + '</td>' +
						'<td style="text-align: center;">' + '<a href="javascript:;" onclick="edit_pasca3_vendor(' + data[i].id_mengikuti_vendor + ',' + paket_id + ')" class="btn btn-sm btn-warning">Edit</a>' + '</td>' +
						'</tr>';
				}
				$('#table_vendor3').html(html);
			}

		});
	}

	function edit_pasca3_vendor(id_vendor, id_paket) {

		$.ajax({
			type: 'ajax',
			url: '<?= base_url('panitiajmtm/beranda/get_vendor_ba1_row') ?>',
			async: false,
			method: 'POST',
			data: {
				id_vendor: id_vendor,
				id_paket: id_paket
			},
			dataType: 'json',
			success: function(data) {
				$('#nm_vendor_pasca3').html(data.nama_usaha)
				$('#edit_nilai_pasca3').modal('show')
				$('#id_mengikuti_paket_pasca3').val(data.id_mengikuti_paket)
				$('[name="sp_pasca3"').val(data.sp_pasca3)
				$('[name="rdkh_pasca3"').val(data.rdkh_pasca3)
				$('[name="dkh_pasca3"').val(data.dkh_pasca3)
				$('[name="hps_pasca3_1"').val(data.hps_pasca3_1)
				$('[name="ket_pasca3_1"').val(data.ket_pasca3_1)
			}
		})
	}

	function save_ba3_vendor_pasca() {
		var save_ba3_vendor_form_pasca = $('#save_ba3_vendor_form_pasca')
		$.ajax({
			method: "POST",
			url: url = "<?= base_url("panitiajmtm/beranda/save_pasca_3_vendor/") ?>",
			data: save_ba3_vendor_form_pasca.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Data Berhasil Di Simpan!')
					$('#edit_nilai_pasca3').modal('hide')
					tampil_data_vendor_pasca3();
				}
			},
			error: function() {
				console.log(error);
			}
		})

	}

	tampil_data_vendor_pasca3_2()

	function tampil_data_vendor_pasca3_2() {
		var paket_id = $('#paket_id').val()
		$.ajax({
			type: 'ajax',
			url: '<?= base_url('panitiajmtm/beranda/get_vendor_ba1/') ?>' + paket_id,
			async: false,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i;
				var j = 1;

				for (i = 0; i < data.length; i++) {



					if (!data[i].nilai_teknis) {
						var nilai_teknis = '0'
					} else {
						var nilai_teknis = data[i].nilai_teknis
					}

					if (!data[i].nilai_terkoreksi) {
						var nilai_terkoreksi = 'Tidak Ada Penawaran'
					} else {
						var nilai_terkoreksi = data[i].nilai_terkoreksi
					}

					if (!data[i].hps_pasca3_2) {
						var hps_pasca3_2 = '0'
					} else {
						var hps_pasca3_2 = data[i].hps_pasca3_2
					}

					if (!data[i].nhp_pasca3) {
						var nhp_pasca3 = '0'
					} else {
						var nhp_pasca3 = data[i].nhp_pasca3
					}


					if (!data[i].nilai_akhir) {
						var nilai_akhir = '0'
					} else {
						var nilai_akhir = data[i].nilai_akhir
					}

					if (!data[i].peringkat_pasca3) {
						var peringkat_pasca3 = 'Tidak Ada Peringkat'
					} else {
						var peringkat_pasca3 = data[i].peringkat_pasca3
					}

					if (!data[i].ket_pasca3_2) {
						var ket_pasca3_2 = 'Sah / Gugur';
					} else if (data[i].ket_pasca3_2 == 1) {
						var ket_pasca3_2 = 'Sah';
					} else if (data[i].ket_pasca3_2 == 2) {
						var ket_pasca3_2 = 'Gugur';
					} else {
						var ket_pasca3_2 = data[i].ket_pasca3_2;
					}

					html += '<tr>' +
						'<td style="text-align: center;">' + j++ + '</td>' +
						'<td style="text-align: center;">' + data[i].nama_usaha + '</td>' +
						'<td style="text-align: center;">' + nilai_teknis + '</td>' +
						'<td style="text-align: center;">' + formatRupiah(nilai_terkoreksi, 'Rp. ') + '</td>' +
						'<td style="text-align: center;">' + hps_pasca3_2 + '</td>' +
						'<td style="text-align: center;">' + nhp_pasca3 + '</td>' +
						'<td style="text-align: center;">' + nilai_akhir + '</td>' +
						'<td style="text-align: center;">' + peringkat_pasca3 + '</td>' +
						'<td style="text-align: center;">' + ket_pasca3_2 + '</td>' +
						'<td style="text-align: center;">' + '<a href="javascript:;" onclick="edit_pasca3_vendor2(' + data[i].id_mengikuti_vendor + ',' + paket_id + ')" class="btn btn-sm btn-warning">Edit</a>' + '</td>' +
						'</tr>';
				}
				$('#table_vendor3_2').html(html);
			}

		});
	}

	function edit_pasca3_vendor2(id_vendor, id_paket) {

		$.ajax({
			type: 'ajax',
			url: '<?= base_url('panitiajmtm/beranda/get_vendor_ba1_row') ?>',
			async: false,
			method: 'POST',
			data: {
				id_vendor: id_vendor,
				id_paket: id_paket
			},
			dataType: 'json',
			success: function(data) {
				$('#nm_vendor3_2').html(data.nama_usaha)
				$('#edit_nilai_pasca3_2').modal('show')
				$('#id_mengikuti_paket3_3').val(data.id_mengikuti_paket)
				$('[name="hps_pasca3_2"').val(data.hps_pasca3_2)
				$('[name="nhp_pasca3"').val(data.nhp_pasca3)
				$('[name="peringkat_pasca3"').val(data.peringkat_pasca3)
				$('[name="ket_pasca3_2"').val(data.ket_pasca3_2)
			}
		})
	}

	function save_ba3_vendor_pasca2() {
		var save_ba3_vendor_form_pasca2 = $('#save_ba3_vendor_form_pasca2')
		$.ajax({
			method: "POST",
			url: url = "<?= base_url("panitiajmtm/beranda/save_pasca_3_vendor2/") ?>",
			data: save_ba3_vendor_form_pasca2.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Data Berhasil Di Simpan!')
					$('#edit_nilai_pasca3_2').modal('hide')
					tampil_data_vendor_pasca3_2()
				}
			},
			error: function() {
				console.log(error);
			}
		})

	}
	// END BA PASCA 3


	// BA PASCA 4

	tampil_data_vendor_pasca4()

	function tampil_data_vendor_pasca4() {
		var paket_id = $('#paket_id').val()
		$.ajax({
			type: 'ajax',
			url: '<?= base_url('panitiajmtm/beranda/get_vendor_ba1/') ?>' + paket_id,
			async: false,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i;
				var j = 1;

				for (i = 0; i < data.length; i++) {


					if (!data[i].nilai_teknis) {
						var nilai_teknis = '0'
					} else {
						var nilai_teknis = data[i].nilai_teknis
					}

					if (!data[i].nilai_terkoreksi) {
						var nilai_terkoreksi = 'Tidak Ada Penawaran'
					} else {
						var nilai_terkoreksi = data[i].nilai_terkoreksi
					}

					if (!data[i].hps_pasca4) {
						var hps_pasca4 = '0'
					} else {
						var hps_pasca4 = data[i].hps_pasca4
					}

					if (!data[i].nph_pasca4) {
						var nph_pasca4 = '0'
					} else {
						var nph_pasca4 = data[i].nph_pasca4
					}


					if (!data[i].nilai_akhir) {
						var nilai_akhir = '0'
					} else {
						var nilai_akhir = data[i].nilai_akhir
					}

					if (!data[i].peringkat_pasca4) {
						var peringkat_pasca4 = 'Tidak Ada Peringkat'
					} else {
						var peringkat_pasca4 = data[i].peringkat_pasca4
					}

					if (!data[i].negosiasi) {
						var negosiasi = 'Tidak Ada Negosiasi'
					} else {
						var negosiasi = data[i].negosiasi
					}

					if (!data[i].ket_pasca4) {
						var ket_pasca4 = 'Lulus / Gugur';
					} else if (data[i].ket_pasca4 == 1) {
						var ket_pasca4 = 'Lulus';
					} else if (data[i].ket_pasca4 == 2) {
						var ket_pasca4 = 'Gugur';
					} else {
						var ket_pasca4 = data[i].ket_pasca4;
					}

					html += '<tr>' +
						'<td style="text-align: center;">' + j++ + '</td>' +
						'<td style="text-align: center;">' + data[i].nama_usaha + '</td>' +
						'<td style="text-align: center;">' + nilai_teknis + '</td>' +
						'<td style="text-align: center;">' + formatRupiah(nilai_terkoreksi, 'Rp. ') + '</td>' +
						'<td style="text-align: center;">' + hps_pasca4 + '</td>' +
						'<td style="text-align: center;">' + nph_pasca4 + '</td>' +
						'<td style="text-align: center;">' + nilai_akhir + '</td>' +
						'<td style="text-align: center;">' + peringkat_pasca4 + '</td>' +
						'<td style="text-align: center;">' + formatRupiah(negosiasi, 'Rp. ') + '</td>' +
						'<td style="text-align: center;">' + ket_pasca4 + '</td>' +
						'<td style="text-align: center;">' + '<a href="javascript:;" onclick="edit_pasca4_vendor(' + data[i].id_mengikuti_vendor + ',' + paket_id + ')" class="btn btn-sm btn-warning">Edit</a>' + '</td>' +
						'</tr>';
				}
				$('#table_vendor_pasca4').html(html);
			}

		});
	}

	function edit_pasca4_vendor(id_vendor, id_paket) {
		$.ajax({
			type: 'ajax',
			url: '<?= base_url('panitiajmtm/beranda/get_vendor_ba1_row') ?>',
			async: false,
			method: 'POST',
			data: {
				id_vendor: id_vendor,
				id_paket: id_paket
			},
			dataType: 'json',
			success: function(data) {
				$('#nm_vendor4_pasca').html(data.nama_usaha)
				$('#edit_nilai_pasca4').modal('show')
				$('#id_mengikuti_paket4_pasca').val(data.id_mengikuti_paket)
				$('[name="hps_pasca4"').val(data.hps_pasca4)
				$('[name="nhp_pasca4"').val(data.nhp_pasca4)
				$('[name="peringkat_pasca4"').val(data.peringkat_pasca4)
				$('[name="ket_pasca4"').val(data.ket_pasca4)
			}
		})
	}



	function save_ba4_vendor_pasca() {
		var save_ba4_vendor_form_pasca = $('#save_ba4_vendor_form_pasca')
		$.ajax({
			method: "POST",
			url: url = "<?= base_url("panitiajmtm/beranda/save_pasca_4_vendor/") ?>",
			data: save_ba4_vendor_form_pasca.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Data Berhasil Di Simpan!')
					$('#edit_nilai_pasca4').modal('hide')
					tampil_data_vendor_pasca4();
				}
			},
			error: function() {
				console.log(error);
			}
		})

	}


	function simpan_ba_pasca4(id_paket) {
		var form_ba_pasca4 = $('#form_ba_pasca4')
		$.ajax({
			method: "POST",
			url: url = "<?= base_url("panitiajmtm/beranda/save_ba_pasca4/") ?>" + id_paket,
			data: form_ba_pasca4.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Data Berhasil Di Simpan!')
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}

	// END BA PASCA 4
</script>

<!-- BA PASCA 5 -->
<script>
	function simpan_ba_pasca5(id_paket) {
		var form_ba_pasca5 = $('#form_ba_pasca5')
		$.ajax({
			method: "POST",
			url: url = "<?= base_url("panitiajmtm/beranda/save_ba_pasca5/") ?>" + id_paket,
			data: form_ba_pasca5.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					message('success', 'Data Berhasil Di Simpan!')
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}
</script>

<!-- END BA PASCA 5 -->


<!-- chat untuk ba -->
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
				url: "<?= base_url() ?>panitiajmtm/beranda/ngeload_chatnya/" + id_paket,
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
								html += `<label class="badge badge-primary ml-5" ></label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div> </div>`;
							} else if (d.dokumen_chat) {
								html += `<label class="badge badge-primary ml-5" >${d.nama_pegawai}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                        <a href="<?= base_url('/file_chat/') ?>${d.dokumen_chat}"> ${d.dokumen_chat}</a> <br>
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                     </div>`;
							} else if (d.img_chat) {
								html += `<label class="badge badge-primary ml-5" >${d.nama_pegawai}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
								<img width="100px" src="<?= base_url('file_chat/') ?>${d.img_chat}"> <br>
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                      
                     </div>`;
							} else {
								html += `<label class="badge badge-primary ml-5" >${d.nama_pegawai}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
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



	});
</script>
<script>
	$(document).ready(function() {
		pesan2()

		function pesan2() {
			var id_penerima = '<?= $data2['id_mengikuti_vendor'] ?>';
			var id_paket2 = $('#id_paket').val();
			var id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
			$.ajax({
				type: "post",
				url: "<?= base_url() ?>panitiajmtm/beranda/ngeload_chatnya_negosiasi_tender/" + id_paket2,
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
								html += `<label class="badge badge-primary ml-5" >${d.nama_pegawai}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div> </div>`;
							} else if (d.dokumen_chat) {
								html += `<label class="badge badge-primary ml-5" >${d.nama_pegawai}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                        <a href="<?= base_url('/file_chat/') ?>${d.dokumen_chat}"> ${d.dokumen_chat}</a> <br>
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                     </div>`;
							} else if (d.img_chat) {
								html += `<label class="badge badge-primary ml-5" >${d.nama_pegawai}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
								<img width="100px" src="<?= base_url('file_chat/') ?>${d.img_chat}"> <br>
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                      
                     </div>`;
							} else {
								html += `<label class="badge badge-primary ml-5" >${d.nama_pegawai}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
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

					$('#letakpesan2').html(html);
				}
			});

		}


	});
</script>

<!-- END CHAT BA -->

<script>
	// upload ba prakualifikasi
	function upload_ba_pra(pra) {
		$('#modal_upload_pra').modal('show')
		$('[name="no_ba"]').val(pra)
	}

	var form_dok_pra = $('#form_dok_pra')

	form_dok_pra.on('submit', function(e) {
		e.preventDefault();
		url = "<?= base_url('panitiajmtm/beranda/add_dokumen_prakualifikasi/'); ?>"
		$.ajax({
			url: url,
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			beforeSend: function() {
				$('#upload_dok').attr('disabled', 'disabled');
			},
			success: function(response) {
				if (response == 'success') {
					form_dok_pra[0].reset();
					message('success', 'Data Berhasil Di Simpan')
					$('#modal_upload_pra').modal('hide')
					tampil_ba_prakualifikasi();
				}
			}
		});
	});

	tampil_ba_prakualifikasi();

	function tampil_ba_prakualifikasi() {
		var paket_id = $('#paket_id').val();
		$.ajax({
			type: 'ajax',
			url: '<?= base_url('panitiajmtm/beranda/get_paket/') ?>' + paket_id,
			async: false,
			dataType: 'json',
			success: function(data) {
				if (!data.ba_pra1) {
					var ba_prakualifikasi1 = '<span class="badge badge-danger">Belum Upload</span>'
				} else {
					var ba_prakualifikasi1 = '<a target="_blank" href="<?= base_url('file_berita_acara/ba_prakualifikasi/pra1/') ?>' + data.ba_pra1 + '"><img width="25" src="<?= base_url('assets/img/pdfku.png') ?>"></a>'
				}
				if (!data.ba_pra2) {
					var ba_prakualifikasi2 = '<span class="badge badge-danger">Belum Upload</span>'
				} else {
					var ba_prakualifikasi2 = '<a target="_blank" href="<?= base_url('file_berita_acara/ba_prakualifikasi/pra2/') ?>' + data.ba_pra2 + '"><img width="25" src="<?= base_url('assets/img/pdfku.png') ?>"></a>'
				}
				if (!data.ba_pra3) {
					var ba_prakualifikasi3 = '<span class="badge badge-danger">Belum Upload</span>'
				} else {
					var ba_prakualifikasi3 = '<a target="_blank" href="<?= base_url('file_berita_acara/ba_prakualifikasi/pra3/') ?>' + data.ba_pra3 + '"><img width="25" src="<?= base_url('assets/img/pdfku.png') ?>"></a>'
				}
				if (!data.ba_pra4) {
					var ba_prakualifikasi4 = '<span class="badge badge-danger">Belum Upload</span>'
				} else {
					var ba_prakualifikasi4 = '<a target="_blank" href="<?= base_url('file_berita_acara/ba_prakualifikasi/pra4/') ?>' + data.ba_pra4 + '"><img width="25" src="<?= base_url('assets/img/pdfku.png') ?>"></a>'
				}
				if (!data.ba_pra5) {
					var ba_prakualifikasi5 = '<span class="badge badge-danger">Belum Upload</span>'
				} else {
					var ba_prakualifikasi5 = '<a target="_blank" href="<?= base_url('file_berita_acara/ba_prakualifikasi/pra5/') ?>' + data.ba_pra5 + '"><img width="25" src="<?= base_url('assets/img/pdfku.png') ?>"></a>'
				}
				var prak = '';
				var i;
				prak += '<tr>' +
					'<td>1</td>' +
					'<td>Ba-01-HASIL EVALUASI PRAKUALIFIKASI</td>' +
					'<td>' + ba_prakualifikasi1 + '</td>' +
					'<td><a href="javascript:;" class="btn btn-sm btn-primary" onclick="upload_ba_pra(' + 1 + ')">Upload</a></td>' +
					'</tr>' +
					'<tr>' +
					'<td>2</td>' +
					'<td>Ba-02-EVALUASI TEKNIS FILE I PRAKUALIFIKASI</td>' +
					'<td>' + ba_prakualifikasi2 + '</td>' +
					'<td><a href="javascript:;" class="btn btn-sm btn-primary"  onclick="upload_ba_pra(' + 2 + ')">Upload</a></td>' +
					'</tr>' +
					'<td>3</td>' +
					'<td>Ba-03-EVALUASI HARGA FILE II PRAKUALIFIKASI</td>' +
					'<td>' + ba_prakualifikasi3 + '</td>' +
					'<td><a href="javascript:;" class="btn btn-sm btn-primary"  onclick="upload_ba_pra(' + 3 + ')">Upload</a></td>' +
					'</tr>' +
					'<td>4</td>' +
					'<td>Ba-04-KOREKSI ARITMATIK HARGA TIMPANG DAN NEGOSIASI PRAKUALIFIKASI</td>' +
					'<td>' + ba_prakualifikasi4 + '</td>' +
					'<td><a href="javascript:;" class="btn btn-sm btn-primary"  onclick="upload_ba_pra(' + 4 + ')">Upload</a></td>' +
					'</tr>' +
					'<td>5</td>' +
					'<td>Ba-05-SERAH TERIMA HASIL PENGADAAN PRAKUALIFIKASI</td>' +
					'<td>' + ba_prakualifikasi5 + '</td>' +
					'<td><a href="javascript:;" class="btn btn-sm btn-primary"  onclick="upload_ba_pra(' + 5 + ')">Upload</a></td>' +
					'</tr>';

				$('.tbl_ba_prakualifikasi').html(prak);
			}

		});
	}


	// upload ba pascakualifikasi

	function upload_ba_pasca(pasca) {
		$('#modal_upload_pasca').modal('show')
		$('[name="no_ba"]').val(pasca)
	}

	var form_dok_pasca = $('#form_dok_pasca')

	form_dok_pasca.on('submit', function(e) {
		e.preventDefault();
		url = "<?= base_url('panitiajmtm/beranda/add_dokumen_pascakualifikasi/'); ?>"
		$.ajax({
			url: url,
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			beforeSend: function() {
				$('#upload_dok').attr('disabled', 'disabled');
			},
			success: function(response) {
				if (response == 'success') {
					form_dok_pasca[0].reset();
					message('success', 'Data Berhasil Di Simpan')
					$('#modal_upload_pasca').modal('hide')
					tampil_ba_pascakualifikasi();
				}
			}
		});
	});

	tampil_ba_pascakualifikasi();

	function tampil_ba_pascakualifikasi() {
		var paket_id = $('#paket_id').val();
		$.ajax({
			type: 'ajax',
			url: '<?= base_url('panitiajmtm/beranda/get_paket/') ?>' + paket_id,
			async: false,
			dataType: 'json',
			success: function(data) {
				if (!data.ba_pasca1) {
					var ba_pascakualifikasi1 = '<span class="badge badge-danger">Belum Upload</span>'
				} else {
					var ba_pascakualifikasi1 = '<a target="_blank" href="<?= base_url('file_berita_acara/ba_pascakualifikasi/pasca1/') ?>' + data.ba_pasca1 + '"><img width="25" src="<?= base_url('assets/img/pdfku.png') ?>"></a>'
				}
				if (!data.ba_pasca2) {
					var ba_pascakualifikasi2 = '<span class="badge badge-danger">Belum Upload</span>'
				} else {
					var ba_pascakualifikasi2 = '<a target="_blank" href="<?= base_url('file_berita_acara/ba_pascakualifikasi/pasca2/') ?>' + data.ba_pasca2 + '"><img width="25" src="<?= base_url('assets/img/pdfku.png') ?>"></a>'
				}
				if (!data.ba_pasca3) {
					var ba_pascakualifikasi3 = '<span class="badge badge-danger">Belum Upload</span>'
				} else {
					var ba_pascakualifikasi3 = '<a target="_blank" href="<?= base_url('file_berita_acara/ba_pascakualifikasi/pasca3/') ?>' + data.ba_pasca3 + '"><img width="25" src="<?= base_url('assets/img/pdfku.png') ?>"></a>'
				}
				if (!data.ba_pasca4) {
					var ba_pascakualifikasi4 = '<span class="badge badge-danger">Belum Upload</span>'
				} else {
					var ba_pascakualifikasi4 = '<a target="_blank" href="<?= base_url('file_berita_acara/ba_pascakualifikasi/pasca4/') ?>' + data.ba_pasca4 + '"><img width="25" src="<?= base_url('assets/img/pdfku.png') ?>"></a>'
				}
				if (!data.ba_pasca5) {
					var ba_pascakualifikasi5 = '<span class="badge badge-danger">Belum Upload</span>'
				} else {
					var ba_pascakualifikasi5 = '<a target="_blank" href="<?= base_url('file_berita_acara/ba_pascakualifikasi/pasca5/') ?>' + data.ba_pasca5 + '"><img width="25" src="<?= base_url('assets/img/pdfku.png') ?>"></a>'
				}
				var pasca = '';
				var i;
				pasca += '<tr>' +
					'<td>1</td>' +
					'<td>Ba-01-BUKA DAN EVALUASI FILE 1</td>' +
					'<td>' + ba_pascakualifikasi1 + '</td>' +
					'<td><a href="javascript:;" class="btn btn-sm btn-primary" onclick="upload_ba_pasca(' + 1 + ')">Upload</a></td>' +
					'</tr>' +
					'<tr>' +
					'<td>2</td>' +
					'<td>Ba-02-PEMBERITAHUAN PERINGKAT TEKNIS</td>' +
					'<td>' + ba_pascakualifikasi2 + '</td>' +
					'<td><a href="javascript:;" class="btn btn-sm btn-primary"  onclick="upload_ba_pasca(' + 2 + ')">Upload</a></td>' +
					'</tr>' +
					'<td>3</td>' +
					'<td>Ba-03-BUKA DAN EVALUASI FILE 2</td>' +
					'<td>' + ba_pascakualifikasi3 + '</td>' +
					'<td><a href="javascript:;" class="btn btn-sm btn-primary"  onclick="upload_ba_pasca(' + 3 + ')">Upload</a></td>' +
					'</tr>' +
					'<td>4</td>' +
					'<td>Ba-04-KOREKSI ARITMATIK HARGA TIMPANG DAN NEGOSIASI</td>' +
					'<td>' + ba_pascakualifikasi4 + '</td>' +
					'<td><a href="javascript:;" class="btn btn-sm btn-primary"  onclick="upload_ba_pasca(' + 4 + ')">Upload</a></td>' +
					'</tr>' +
					'<td>5</td>' +
					'<td>Ba-05-SERAH TERIMA HASIL PENGADAAN</td>' +
					'<td>' + ba_pascakualifikasi5 + '</td>' +
					'<td><a href="javascript:;" class="btn btn-sm btn-primary"  onclick="upload_ba_pasca(' + 5 + ')">Upload</a></td>' +
					'</tr>';

				$('.tbl_ba_pascakualifikasi').html(pasca);
			}

		});
	}
	// end upload ba prakualifikasi

	function lihat_sumary_binding(id) {
		$.ajax({
			type: "GET",
			url: "<?= base_url('panitiajmtm/beranda/by_id_lihat_vendor/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				$('#modal_lihat_vendor_mengikuti_binding').modal('show');
				var html = '';
				var html2 = '';
				var html3 = '';
				var harga_terkecil = null;
				var no1 = 1;
				var no2 = 1;
				var no3 = 1;
				var i;
				for (i = 0; i < response['vendor1'].length; i++) {
					var harga_terkecil = Math.min(response['vendor1'][i].harga_penawaran_binding_1);
					if (response['vendor1'][i].harga_penawaran_binding_1 == response['min_binding_1']) {
						var menang = '' + formatRupiah(response['vendor1'][i].harga_penawaran_binding_1, 'Rp. ') + ' <i style="font-size:20px" class="fa fa-flag-checkered" aria-hidden="true"></i>';
					} else {
						// var menang = '' + formatRupiah(response['vendor1'][i].harga_penawaran_binding_1, 'Rp. ');
						var menang = '-';
					}
					html += '<tr>' +
						'<td>' + response['vendor1'][i].username_vendor + '</td>' +
						'<td>' + menang + '</td>' +
						'<td>' + no1++ + '</td>' +
						'</tr>'
				}

				for (i = 0; i < response['vendor2'].length; i++) {
					var harga_terkecil = Math.min(response['vendor2'][i].harga_penawaran_binding_2);
					if (response['vendor2'][i].harga_penawaran_binding_2 == response['min_binding_2']) {
						var menang = '' + formatRupiah(response['vendor2'][i].harga_penawaran_binding_2, 'Rp. ') + ' <i style="font-size:20px" class="fa fa-flag-checkered" aria-hidden="true"></i>';
					} else {
						// var menang = '' + formatRupiah(response['vendor1'][i].harga_penawaran_binding_1, 'Rp. ');
						var menang = '-';
					}
					html2 += '<tr>' +
						'<td>' + response['vendor2'][i].username_vendor + '</td>' +
						'<td>' + menang + '</td>' +
						'<td>' + no2++ + '</td>' +
						'</tr>'
				}

				for (i = 0; i < response['vendor3'].length; i++) {
					var harga_terkecil = Math.min(response['vendor3'][i].harga_penawaran_binding_3);
					if (response['vendor3'][i].harga_penawaran_binding_3 == response['min_binding_3']) {
						var menang = '' + formatRupiah(response['vendor3'][i].harga_penawaran_binding_3, 'Rp. ') + ' <i style="font-size:20px" class="fa fa-flag-checkered" aria-hidden="true"></i>';
					} else {
						// var menang = '' + formatRupiah(response['vendor1'][i].harga_penawaran_binding_1, 'Rp. ');
						var menang = '-';
					}
					html3 += '<tr>' +
						'<td>' + response['vendor3'][i].username_vendor + '</td>' +
						'<td>' + menang + '</td>' +
						'<td>' + no3++ + '</td>' +
						'</tr>'
				}
				$('#binding_sumaary_1').html(html);
				$('#binding_sumaary_2').html(html2);
				$('#binding_sumaary_3').html(html3);

				$('#modal_lihat_vendor_mengikuti_binding').on('hidden.bs.modal', function() {})

			}
		})
	}
	function formatRupiah(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split = number_string.split(','),
			sisa = split[0].length % 3,
			rupiah = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}

		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	}
</script>