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
				"url": "<?= base_url('jadwal_tender/getdata8') ?>",
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
			title: "Nice!!!",
			text: text,
			icon: icon,
		});
	}

	function deleteQuestion(id_jadwal_tender, nama_jadwal_tender) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nama_jadwal_tender + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteData(id_jadwal_tender);
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
			url = "<?= base_url('jadwal_tender/add8'); ?>"
		} else {
			url = "<?= base_url('jadwal_tender/update8'); ?>"
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
					$(".nama_jadwal_tender-error").html(response.nama_jadwal_tender);
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
			url: "<?= base_url('jadwal_tender/byid8/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'edit') {
					modaltitle.text('Ubah Data');
					$('[name="id_jadwal_tender"]').val(response.id_jadwal_tender);
					$('[name="nama_jadwal_tender"]').val(response.nama_jadwal_tender);
					modal.modal('show');
				} else {
					deleteQuestion(response.id_jadwal_tender, response.nama_jadwal_tender);
				}
			}
		})
	}

	function deleteData(id) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('jadwal_tender/delete8/') ?>" + id,
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
