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
            "url": "<?= base_url('tahun_anggaran/getdata') ?>",
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
         title: "Mantaps!!!",
         text: text,
         icon: icon,
      });
   }

   function deleteQuestion(id_tahun_anggaran, nama_tahun_anggaran) {
      swal({
            title: "Apakah Anda Yakin!! ?",
            text: "Ingin Menghapus Data   " + nama_tahun_anggaran + "?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
         })
         .then((willDelete) => {
            if (willDelete) {
               deleteData(id_tahun_anggaran);
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
         url = "<?= base_url('tahun_anggaran/add'); ?>"
      }
      if (saveData == 'edit') {
         url = "<?= base_url('tahun_anggaran/update'); ?>"
      }
      if (saveData == 'active') {
         url = "<?= base_url('tahun_anggaran/active'); ?>"
      }
      if (saveData == 'non_active') {
         url = "<?= base_url('tahun_anggaran/non_active'); ?>"
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
               }
               if (saveData == 'edit') {
                  modal.modal('hide');
                  relodTable();
                  message('success', 'Data Berhasil Di Ubah');
               }
               if (saveData == 'active') {
                  modal.modal('hide');
                  relodTable();
                  message('success', 'status active !!');
               }
               if (saveData == 'non_active') {
                  modal.modal('hide');
                  relodTable();
                  message('warning', 'status NonActive !!');
               }
            } else {
               $(".nama_tahun_anggaran-error").html(response.nama_tahun_anggaran);
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

      if (type == 'active') {
         saveData = 'active';
         formData[0].reset();
      }
      if (type == 'non_active') {
         saveData = 'non_active';
         formData[0].reset();
      }
      $.ajax({
         type: "GET",
         url: "<?= base_url('tahun_anggaran/byid/'); ?>" + id,
         dataType: "JSON",
         success: function(response) {
            if (type == 'edit') {
               modaltitle.text('Ubah Data');
               $('[name="id_tahun_anggaran"]').val(response.id_tahun_anggaran);
               $('[name="nama_tahun_anggaran"]').val(response.nama_tahun_anggaran);
               modal.modal('show');
            }
            if (type == 'active') {
               $('[name="id_tahun_anggaran"]').val(response.id_tahun_anggaran);
               $('[name="status_tahun_anggaran"]').val(response.status_tahun_anggaran);
               save();
            }
            if (type == 'non_active') {
               $('[name="id_tahun_anggaran"]').val(response.id_tahun_anggaran);
               $('[name="status_tahun_anggaran"]').val(response.status_tahun_anggaran);
               save();
            }
            if (type == 'hapus') {
               deleteQuestion(response.id_tahun_anggaran, response.nama_tahun_anggaran);
            }
         }
      })
   }


   function deleteData(id) {
      $.ajax({
         type: "POST",
         url: "<?= base_url('tahun_anggaran/delete/') ?>" + id,
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