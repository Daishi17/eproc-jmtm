<script>
	var tbl_prakualifikasi = $('#tbl_prakualifikasi');
	var modal = $('#modalData');
	var formData = $('#formData');
	var modaltitle = $('#modalTitle');
	var btnsave = $('#btnSave')

	$(document).ready(function() {
		tbl_prakualifikasi.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('jadwal_prakualifikasi/getdata') ?>",
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

	function add() {
		saveData = 'tambah';
		formData[0].reset();
		modal.modal('show');
		modaltitle.text('Tambah Data');
	}

	function save() {
		if (saveData == 'tambah') {
			url = "<?= base_url('jadwal_prakualifikasi/add'); ?>"
		} else {
			url = "<?= base_url('jadwal_prakualifikasi/update'); ?>"
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
					$(".nama-jadwal-error").html(response.nama_jadwal_prakualifikasi);
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
			url: "<?= base_url('jadwal_prakualifikasi/byid/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'edit') {
					modaltitle.text('Ubah Data');
					$('[name="id_jadwal_prakualifikasi"]').val(response.id_jadwal_prakualifikasi);
					$('[name="nama_jadwal_prakualifikasi"]').val(response.nama_jadwal_prakualifikasi);
					modal.modal('show');
				} else {
					deleteQuestion(response.id_jadwal_prakualifikasi, response.nama_jadwal_prakualifikasi);
				}
			}
		})
	}

	function relodTable() {
		tbl_prakualifikasi.DataTable().ajax.reload();
	}

	function message(icon, text) {
		swal({
			title: "Success!!!",
			text: text,
			icon: icon,
		});
	}

	function deleteQuestion(id_jadwal_prakualifikasi, nama_jadwal_prakualifikasi) {
		swal({
				title: "Apakah Anda Yakin!! ?",
				text: "Ingin Menghapus Data   " + nama_jadwal_prakualifikasi + "?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					deleteData(id_jadwal_prakualifikasi);
				} else {
					message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
				}
			});
	}

	function deleteData(id_jadwal_prakualifikasi) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('jadwal_prakualifikasi/delete/') ?>" + id_jadwal_prakualifikasi,
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
