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
            "url": "<?= base_url('metode_pemilihan/getdata') ?>",
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

   function deleteQuestion(id_metode_pemilihan, nama_metode_pemilihan) {
      swal({
            title: "Apakah Anda Yakin!! ?",
            text: "Ingin Menghapus Data   " + nama_metode_pemilihan + "?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
         })
         .then((willDelete) => {
            if (willDelete) {
               deleteData(id_metode_pemilihan);
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
         url = "<?= base_url('metode_pemilihan/add'); ?>"
      } else {
         url = "<?= base_url('metode_pemilihan/update'); ?>"
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
               $(".nama_metode_pemilihan_error").html(response.nama_metode_pemilihan);
               $(".kode_metode_pemilihan_error").html(response.kode_metode_pemilihan);
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
         url: "<?= base_url('metode_pemilihan/byid/'); ?>" + id,
         dataType: "JSON",
         success: function(response) {
            if (type == 'edit') {
               modaltitle.text('Ubah Data');
               $('[name="id_metode_pemilihan"]').val(response.id_metode_pemilihan);
               $('[name="nama_metode_pemilihan"]').val(response.nama_metode_pemilihan);
               $('[name="kode_metode_pemilihan"]').val(response.kode_metode_pemilihan);
               modal.modal('show');
            } else {
               deleteQuestion(response.id_metode_pemilihan, response.nama_metode_pemilihan, response.kode_metode_pemilihan);
            }
         }
      })
   }

   function deleteData(id) {
      $.ajax({
         type: "POST",
         url: "<?= base_url('metode_pemilihan/delete/') ?>" + id,
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