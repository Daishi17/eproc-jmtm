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
            "url": "<?= base_url('jenis_pengadaan/getdata') ?>",
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

   function deleteQuestion(id_jenis_pengadaan, nama_jenis_pengadaan) {
      swal({
            title: "Apakah Anda Yakin!! ?",
            text: "Ingin Menghapus Data   " + nama_jenis_pengadaan + "?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
         })
         .then((willDelete) => {
            if (willDelete) {
               deleteData(id_jenis_pengadaan);
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
         url = "<?= base_url('jenis_pengadaan/add'); ?>"
      } else {
         url = "<?= base_url('jenis_pengadaan/update'); ?>"
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
               $(".nama_jenis_pengadaan_error").html(response.nama_jenis_pengadaan);
               $(".kode_jenis_pengadaan_error").html(response.kode_jenis_pengadaan);
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
         url: "<?= base_url('jenis_pengadaan/byid/'); ?>" + id,
         dataType: "JSON",
         success: function(response) {
            if (type == 'edit') {
               modaltitle.text('Ubah Data');
               $('[name="id_jenis_pengadaan"]').val(response.id_jenis_pengadaan);
               $('[name="nama_jenis_pengadaan"]').val(response.nama_jenis_pengadaan);
               $('[name="kode_jenis_pengadaan"]').val(response.kode_jenis_pengadaan);
               modal.modal('show');
            } else {
               deleteQuestion(response.id_jenis_pengadaan, response.nama_jenis_pengadaan, response.kode_jenis_pengadaan);
            }
         }
      })
   }

   function deleteData(id) {
      $.ajax({
         type: "POST",
         url: "<?= base_url('jenis_pengadaan/delete/') ?>" + id,
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