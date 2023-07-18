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
				"url": "<?= base_url('nib/getdata') ?>",
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
		modaltitle.text('Tambah Kategori');
	}

	function message(icon, text) {
		swal({
			title: "Success!!!",
			text: text,
			icon: icon,
		});
	}

	function deleteQuestion(id_nib, nib) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nib + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteData(id_nib);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function save() {
		if (saveData == 'tambah') {
			url = "<?= base_url('nib/add'); ?>"
		} else {
			url = "<?= base_url('nib/update'); ?>"
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
					$(".nib-error").html(response.nib);
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
		if (type == 'detail') {
			saveData = 'detail';
		}
		if (type == 'hapus') {
			saveData = 'hapus';
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('nib/byid/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'detail') {
					location.replace('<?= base_url('nib/detailkategori/') ?>' + response.id_nib)
				}
				if (type == 'edit') {
					modaltitle.text('Ubah Data');
					$('[name="id_nib"]').val(response.id_nib);
					$('[name="nib"]').val(response.nib);
					modal.modal('show');
				}
				if (type == 'hapus') {
					deleteQuestion(response.id_nib, response.nib);
				}
			}
		})
	}

	function deleteData(id) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('nib/delete/') ?>" + id,
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
