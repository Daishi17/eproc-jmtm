<script>
	var saveData;
	var modal = $('#modalData');
	var tabledata = $('#serverside');
	var formData = $('#formData');
	var modaltitle = $('#modalTitle');
	var btnsave = $('#btnSave');

	$(document).ready(function() {
		tabledata.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('metode_dokumen/getdata') ?>",
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

	function relodTable() {
		tabledata.DataTable().ajax.reload();
	}

	function add() {
		saveData = 'tambah';
		formData[0].reset();
		modal.modal('show');
		modaltitle.text('Tambah Data');
	}

	function message(icon, text) {
		swal({
			title: "Success!!!",
			text: text,
			icon: icon,
		});
	}

	function deleteQuestion(id_metode_dokumen, nama_metode_dokumen) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nama_metode_dokumen + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteData(id_metode_dokumen);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function save() {
		if (saveData == 'tambah') {
			url = "<?= base_url('metode_dokumen/add'); ?>"
		} else {
			url = "<?= base_url('metode_dokumen/update'); ?>"
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
					$(".nama-metodedokumen-error").html(response.nama_area);
					$(".kode-metodedokumen-error").html(response.kode_area);
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
			url: "<?= base_url('metode_dokumen/byid/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'edit') {
					modaltitle.text('Ubah Data');
					$('[name="id_metode_dokumen"]').val(response.id_metode_dokumen);
					$('[name="nama_metode_dokumen"]').val(response.nama_metode_dokumen);
					modal.modal('show');
				} else {
					deleteQuestion(response.id_metode_dokumen, response.nama_metode_dokumen);
				}
			}
		})
	}

	function deleteData(id) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('metode_dokumen/delete/') ?>" + id,
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
