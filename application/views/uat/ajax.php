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
                "url": "<?= base_url('uat/getdata') ?>",
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
            title: "Success",
            text: text,
            icon: icon,
        });
    }

    function deleteQuestion(id_uat, nama_uat) {
        swal({
                title: "Apakah Anda Yakin!! ?",
                text: "Ingin Menghapus Data   " + nama_uat + "?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    deleteData(id_uat);
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
            url = "<?= base_url('uat/add'); ?>"
        } else {
            url = "<?= base_url('uat/update'); ?>"
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
                    $(".nama-unit-kerja-error").html(response.nama_uat);
                    $(".kode-unit-kerja-error").html(response.kode_uat);
                }
            },
            error: function() {
                console.log(error);
            }
        })
    }

    function byidberhasil(id, type) {
        if (type == 'berhasil') {
            saveData = 'berhasil';
        }
        $.ajax({
            type: "GET",
            url: "<?= base_url('uat/byid/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'berhasil') {
                    berhasil(response.id_uat)
                }
            }
        })
    }

    function byidgagal(id, type) {
        if (type == 'gagal') {
            saveData = 'gagal';
        }
        $.ajax({
            type: "GET",
            url: "<?= base_url('uat/byid/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'gagal') {
                    gagal(response.id_uat)
                }
            }
        })
    }




    function berhasil(id) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('uat/berhasil/') ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    relodTable();
                    message('success', 'Data Berhasil Di Simpan')
                }
            }
        })
    }

    function gagal(id) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('uat/gagal/') ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    relodTable();
                    message('success', 'Data Berhasil Di Simpan')
                }
            }
        })
    }
</script>

<script>
    var modal_note = $('#modal_note');

    function byinoted(id, type) {
        if (type == 'kirim_note') {
            saveData = 'kirim_note';
        }
        $.ajax({
            type: "GET",
            url: "<?= base_url('uat/byid/') ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'kirim_note') {
                    $('#id_uat').val(response.id_uat)
                    modal_note.modal('show')
                }
            }
        })
    }


    function message(icon, text) {
        swal({
            title: "Success",
            text: text,
            icon: icon,
        });
    }


    var simpan_note = $('#simpan_note');

    function Catatan_save() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('uat/save_note/') ?>",
            data: simpan_note.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    modal_note.modal('hide')
                    relodTable();
                    message('success', 'Data Berhasil Di Simpan')
                }
            },
        })
    }
</script>