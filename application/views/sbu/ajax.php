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
				"url": "<?= base_url('sbu/getdata') ?>",
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
			title: "Berhasil!!!",
			text: text,
			icon: icon,
		});
	}

	function deleteQuestion(id_sbu, nama_sbu) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nama_sbu + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteData(id_sbu);
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
			url = "<?= base_url('sbu/add'); ?>"
		} else {
			url = "<?= base_url('sbu/update'); ?>"
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
					$(".nama-sbu-error").html(response.nama_sbu);
					$(".kode-sbu-error").html(response.kode_sbu);
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
		$.ajax({
			type: "GET",
			url: "<?= base_url('sbu/byid/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'edit') {
					modaltitle.text('Ubah Data');
					$('[name="id_sbu"]').val(response.id_sbu);
					$('[name="nama_sbu"]').val(response.nama_sbu);
					$('[name="kode_sbu"]').val(response.kode_sbu);
					modal.modal('show');
				} else {
					deleteQuestion(response.id_sbu, response.nama_sbu, response.kode_sbu);
				}
			}
		})
	}

	function deleteData(id) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('sbu/delete/') ?>" + id,
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
