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
				"url": "<?= base_url('panitiajmtm/beranda/table_penetapan_pemenanag/') ?>" + id_paket_evaluasi,
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

	function byid_evaluasi_tender_ku(id, type) {
		if (type == 'menangakan') {
			saveData = 'menangakan';
			url = "<?= base_url('panitiajmtm/beranda/menangakan/'); ?>" + id;
		}
		$.ajax({
			type: "GET",
			url: url,
			dataType: "JSON",
			success: function(response) {
				if (type == 'menangakan') {
					message('success', 'Pemenang Berhasil Di Pilih !!');
					relodTable();
					Gugurkan_pemenang_tender()
				} else {
					message('success', 'Pemenang Berhasil Dibatalkan !!');
					relodTable()
				}
			}
		})
	}
	var form_gugur_semua_vendor = $('#form_gugurin_vendor_semua');

	function Gugurkan_pemenang_tender() {
		$.ajax({
			type: "POST",
			url: "<?= base_url('panitiajmtm/beranda/gugurkan_pemenang_tender'); ?>",
			data: form_gugur_semua_vendor.serialize(),
			dataType: "JSON",
			success: function(response) {}
		})
	}
	var modal_alasan_batalkan_pemenang = $('#alasan_batalkan_pemanang');

	function byid_batal_1evaluasi_tender_ku(id, type) {
		if (type == 'batal_menangakan') {
			saveData = 'batal_menangakan';
			url = "<?= base_url('panitiajmtm/beranda/ambil_id_mengikuti_paket_vendor/'); ?>" + id;
		}
		$.ajax({
			type: "GET",
			url: url,
			dataType: "JSON",
			success: function(response) {
				if (type == 'batal_menangakan') {
					modal_alasan_batalkan_pemenang.modal('show');
					$('#id_ambil_mengikuti_paket').val(response['vendor']['id_mengikuti_paket'])
					$('#alasan_saya_batalkan_tender').val(response['vendor']['alasan_batalkan_pemenang'])
				} else {

				}
			}
		})
	}
	var form_saya_mau_batalkan = $('#form_saya_mau_batalkan')

	function Kirim_batalkan_pemenang() {
		$.ajax({
			type: "POST",
			url: "<?= base_url('panitiajmtm/beranda/batal_menangakan'); ?>",
			data: form_saya_mau_batalkan.serialize(),
			dataType: "JSON",
			success: function(response) {
				modal_alasan_batalkan_pemenang.modal('hide');
				message('success', 'Pemenang Berhasil Dibatalkan !!');
				relodTable()
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