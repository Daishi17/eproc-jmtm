<script>
	var saveData;
	var modal = $('#modalData');
	var tabledata = $('#serverside');
	var formData = $('#formData');
	var modaltitle = $('#modalTitle');
	var btnsave = $('#btnSave')
	$(document).ready(function() {
		tabledata.DataTable({
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
			title: "Nice!!!",
			text: text,
			icon: icon,
		});
	}

	function deleteQuestion(id_jadwal_paket_tender, jenis_jadwal) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + jenis_jadwal + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteData(id_jadwal_paket_tender);
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

	function add_alter_jadwal_tender() {
		location.replace('<?= base_url('Jadwal_paket_tender/alter_table_jadwal') ?>');
	}

	function save() {
		if (saveData == 'tambah') {
			url = "<?= base_url('Jadwal_paket_tender/add'); ?>"
		} else {
			url = "<?= base_url('Jadwal_paket_tender/update'); ?>"
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
					$(".jenis_jadwal-error").html(response.jenis_jadwal);
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
			formData[0].reset();
		}
		if (type == 'setting') {
			saveData = 'setting';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('Jadwal_paket_tender/byid/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'edit') {
					modaltitle.text('Ubah Data');
					$('[name="id_jadwal_paket_tender"]').val(response.id_jadwal_paket_tender);
					$('[name="jenis_jadwal"]').val(response.jenis_jadwal);
					modal.modal('show');
				} else if (type == 'setting') {
					location.replace('<?= base_url('Jadwal_paket_tender/setting_jadwal/') ?>' + response.id_jadwal_paket_tender);
				} else {
					deleteQuestion(response.id_jadwal_paket_tender, response.jenis_jadwal);
				}
			}
		})
	}

	function deleteData(id) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('Jadwal_paket_tender/delete/') ?>" + id,
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
