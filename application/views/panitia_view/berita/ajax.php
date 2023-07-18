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
				"url": "<?= base_url('panitiajmtm/berita/getdata7') ?>",
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

	var formData = $('#formData');
	formData.on('submit', function(e) {
		if (saveData == 'tambah') {
			url = "<?= base_url('panitiajmtm/berita/add7'); ?>"
		} else {
			url = "<?= base_url('panitiajmtm/berita/update7'); ?>"
		}
		if ($('#file_berita').val() == '') {
			$('#error_file').show();
			setTimeout(() => {
				$('#error_file').hide();
			}, 5000);

		}
		e.preventDefault();
		$.ajax({
			url: url,
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(data) {
				if (data == 'success') {
					modal.modal('hide');
					relodTable();
					if (saveData == 'tambah') {
						message('success', 'Data Berhasil Di Tambah')
					} else {
						modal.modal('hide');
						relodTable();
						message('success', 'Data Berhasil Di Ubah');
					}
				}
			}
		});
	});


	function byid(id, type) {
		if (type == 'edit') {
			saveData = 'edit';
			formData[0].reset();
		}
		$.ajax({
			type: "GET",
			url: "<?= base_url('panitiajmtm/berita/byid7/'); ?>" + id,
			dataType: "JSON",
			success: function(response) {
				if (type == 'edit') {
					modaltitle.text('Ubah Data');
					$('[name="id_berita"]').val(response.id_berita);
					$('[name="nama_berita"]').val(response.nama_berita);
					modal.modal('show');
				} else {
					deleteQuestion(response.id_berita, response.nama_berita);
				}
			}
		})
	}

	function deleteData(id) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('panitiajmtm/berita/delete7/') ?>" + id,
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
