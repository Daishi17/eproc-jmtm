<script>
	$(function() {
		//Initialize Select2 Elements
		$('.select2').select2()

		//Initialize Select2 Elements
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})
	})
</script>
<script>
	var saveData;
	var modal = $('#modalData');
	var tabledata = $('#serverside');
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
				"url": "<?= base_url('subagency/getdata') ?>",
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
		tabledata.DataTable().ajax.reload();
	}

	function message(icon, text) {
		swal({
			title: "VERY NICE!!!",
			text: text,
			icon: icon,
		});
	}

	function deleteQuestion(id_pegawai, nama_pegawai) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nama_pegawai + "?",
				icon: "warning",
				buttons: true,
				confirmButtonsText: '<i class="fa fa-thumbs-up"></i> Great!',
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteData(id_pegawai);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}


	function save() {
		$.ajax({
			method: "POST",
			url: "<?= base_url('subagency/add'); ?>",
			data: formData.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'berhasil') {
					location.replace('<?= base_url('subagency') ?>');
					relodTable();
					message('success', 'Data Berhasil Di Tambah')
				} else {
					$(".nama_pegawai-error").html(response.nama_pegawai);
					$(".username-error").html(response.username);
					$(".password-error").html(response.password);
					$(".email-error").html(response.email);
					$(".nip-error").html(response.nip);
					$(".alamat-error").html(response.alamat);
					$(".id_area-error").html(response.id_area);
					$(".id_provinsi-error").html(response.id_provinsi);
					$(".id_kabupaten-error").html(response.id_kabupaten);
					$(".telepon-error").html(response.telepon);
					$(".no_sk-error").html(response.no_sk);
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
			url: '<?= base_url('subagency/update'); ?>',
			data: formData.serialize(),
			dataType: "JSON",
			success: function(response) {
				if (response == 'berhasil') {
					location.replace('<?= base_url('subagency') ?>');
					relodTable();
					message('success', 'Data Berhasil Di Edit!!')
				} else {
					$(".nama_pegawai-error").html(response.nama_pegawai);
					$(".username-error").html(response.username);
					$(".password-error").html(response.password);
					$(".email-error").html(response.email);
					$(".nip-error").html(response.nip);
					$(".alamat-error").html(response.alamat);
					$(".id_area-error").html(response.id_area);
					$(".id_provinsi-error").html(response.id_provinsi);
					$(".id_kabupaten-error").html(response.id_kabupaten);
					$(".telepon-error").html(response.telepon);
					$(".no_sk-error").html(response.no_sk);
				}
			},
			error: function() {
				console.log(error);
			}
		})
	}

var modalDetail = $('#modaldetail');
	var modalTitle = $('#modalTitle');
	function byid(id, type) {
		if (type == 'edit') {
			saveData = 'edit';
			formData[0].reset();
		}
		if (type == 'detail') {
			saveData = 'detail';
			formData[0].reset();
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('subagency/byid/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'edit') {
					location.replace('<?= base_url('subagency/edit_sub_agency/') ?>' + response['get_sub_agency'].id_pegawai);

				} else if (type == 'detail') {
					modalTitle.text('Detail Data');
					$('#nama_pegawai').html(response['get_sub_agency'].nama_pegawai);
					$('#nip').html(response['get_sub_agency'].nip);
					$('#username').html(response['get_sub_agency'].username);
					$('#alamat').html(response['get_sub_agency'].alamat);
					$('#telepon').html(response['get_sub_agency'].telepon);
					$('#email').html(response['get_sub_agency'].email);
					$('#jabatan').html(response['get_sub_agency'].nama_unit_kerja);
					$('#role').html(response['get_sub_agency'].nama_role);
					$('#no_sk').html(response['get_sub_agency'].no_sk);
					$('#masa_berlaku_sk').html(response['get_sub_agency'].masa_berlaku_sk);
					modalDetail.modal('show');
				} else {
					deleteQuestion(response.id_pegawai, response.nama_pegawai);
				}
			}
		})
	}

	function deleteData(id) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('subagency/delete/') ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (response == 'success') {
					relodTable();
					message('success', 'Data Berhasil Di Hapus')
				}
			}
		})
	}

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

	// for edit
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

<script>
	function message300(icon, text) {
		swal({
			title: "WAJIB ANGKA!!!",
			text: text,
			icon: icon,
		});
	}

	document.getElementById("teleponku").onkeyup = function() {
		var validasiHuruf = /^[a-zA-Z ]+ $ /;
		var validasisimbol = /[^0-9]/;
		var teleponku = $('#teleponku').val();
		if (teleponku.match(validasiHuruf)) {
			$('#teleponku').css('border-color', 'red');
			$('#teleponku').val('');
			message300('warning', 'Isi Dengan Angka!!');
		} else if (teleponku.match(validasisimbol)) {
			$('#teleponku').css('border-color', 'red');
			$('#teleponku').val('');
			message300('warning', 'Isi Dengan Angka!!');
		} else {
			$('#teleponku').css('border-color', 'green');
			$('#teleponku').val(teleponku);

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

	document.getElementById("telppon_edit").onkeyup = function() {
		var validasiHuruf = /^[a-zA-Z ]+ $ /;
		var validasisimbol = /[^0-9]/;
		var telppon_edit = $('#telppon_edit').val();
		if (telppon_edit.match(validasiHuruf)) {
			$('#telppon_edit').css('border-color', 'red');
			message300('warning', 'Isi Dengan Angka!!');
		} else if (telppon_edit.match(validasisimbol)) {
			$('#telppon_edit').css('border-color', 'red');
			message300('warning', 'Isi Dengan Angka!!');
		} else {
			$('#telppon_edit').css('border-color', 'green');
			$('#telppon_edit').val(telppon_edit);

		}

	};
</script>