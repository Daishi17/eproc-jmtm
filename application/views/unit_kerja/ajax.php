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
            "url": "<?= base_url('unit_kerja/getdata') ?>",
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

   function deleteQuestion(id_unit_kerja, nama_unit_kerja) {
      swal({
            title: "Apakah Anda Yakin!! ?",
            text: "Ingin Menghapus Data   " + nama_unit_kerja + "?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
         })
         .then((willDelete) => {
            if (willDelete) {
               deleteData(id_unit_kerja);
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
         url = "<?= base_url('unit_kerja/add'); ?>"
      } else {
         url = "<?= base_url('unit_kerja/update'); ?>"
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
               $(".nama-unit-kerja-error").html(response.nama_unit_kerja);
               $(".kode-unit-kerja-error").html(response.kode_unit_kerja);
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
         url: "<?= base_url('unit_kerja/byid/'); ?>" + id,
         dataType: "JSON",
         success: function(response) {
            if (type == 'edit') {
               modaltitle.text('Ubah Data');
               $('[name="id_unit_kerja"]').val(response.id_unit_kerja);
               $('[name="nama_unit_kerja"]').val(response.nama_unit_kerja);
               $('[name="kode_unit_kerja"]').val(response.kode_unit_kerja);
               modal.modal('show');
            } else {
               deleteQuestion(response.id_unit_kerja, response.nama_unit_kerja, response.kode_unit_kerja);
            }
         }
      })
   }

   function deleteData(id) {
      $.ajax({
         type: "POST",
         url: "<?= base_url('unit_kerja/delete/') ?>" + id,
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