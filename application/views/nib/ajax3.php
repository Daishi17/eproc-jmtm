<script>
	var saveData;
	var modal = $('#modalData');
	var tabledata = $('#serverside');
	var formData = $('#formData');
	var modaltitle = $('#modalTitle');
	var btnsave = $('#btnSave');
	var id_sub_kategori = $('#id_sub_kategori').val();

	$(document).ready(function() {
		tabledata.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('nib/getdata3/') ?>" + id_sub_kategori,
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
			url = "<?= base_url('nib/add3'); ?>"
		} else {
			url = "<?= base_url('nib/update3'); ?>"
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
						modal.modal('hide');
						relodTable();
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
			url: "<?= base_url('nib/byid3/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'detail') {
					location.replace('<?= base_url('nib/detailkategori3/') ?>' + response.id_sub_kategori2)
				}
				if (type == 'edit') {
					modaltitle.text('Ubah Data');
					$('[name="id_sub_kategori"]').val(response.id_sub_kategori);
					$('[name="id_sub_kategori2"]').val(response.id_sub_kategori2);
					$('[name="sub_kategori_nib2"]').val(response.sub_kategori_nib2);
					modal.modal('show');
				}
				if (type == 'hapus') {
					deleteQuestion(response.id_sub_kategori2, response.sub_kategori_nib2);
				}
			}
		})
	}

	function deleteData(id) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('nib/delete3/') ?>" + id,
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
