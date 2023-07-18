<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
   // Enable pusher logging - don't include this in production
   Pusher.logToConsole = true;

   var pusher = new Pusher('9bd692abd567cb77b94c', {
      cluster: 'ap1'
   });

   var channel = pusher.subscribe('my-channel');
   channel.bind('my-event', function(data) {
      addData(data);
   });

   function addData(data) {
      var str = '';
      for (var a in data) {
         str += '<table class="table table-striped"><tr><td>' + data[a].pesan + '<br><small><i class="fas fa-clock"></i> ' + data[a].waktu_kirim + '</small></td><td style="float: right;"><span class="badge badge-primary">R</span>&ensp;</td></tr></table>'
      }
      $('#pesanku').html(str);
   }
</script>
<script>
   var saveData;
   var modal = $('#modalData');
   var tabledata = $('#tbl_penerima');
   var formData = $('#formData');
   var modaltitle = $('#modalTitle');
   var btnsave = $('#btnSave')
   $(document).ready(function() {
      tabledata.DataTable({
         "paging": false,
         "searching": false,
         "info": false,
         "ordering": false,
         "responsive": true,
         "autoWidth": false,
         "processing": false,
         "serverSide": true,
         "order": [],
         "ajax": {
            "url": "<?= base_url('panitiajmtm/beranda/getdata_chat_penerima') ?>",
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

   function deleteQuestion(id_kualifikasi, nama_kualifikasi) {
      swal({
            title: "Apakah Anda Yakin!! ?",
            text: "Ingin Menghapus Data   " + nama_kualifikasi + "?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
         })
         .then((willDelete) => {
            if (willDelete) {
               deleteData(id_kualifikasi);
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
         url = "<?= base_url('jadwal_kualifikasi/add'); ?>"
      } else {
         url = "<?= base_url('jadwal_kualifikasi/update'); ?>"
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
               $(".nama_kualifikasi-error").html(response.nama_kualifikasi);
            }
         },
         error: function() {
            console.log(error);
         }
      })
   }

   var modal_pilih_chat = $('#pilih_chating');
   var modal_new_chat = $('#new_chat_panitiaku');

   function NewChatPanitia(id_new_chat_pegawai) {

      $.ajax({
         type: "GET",
         url: "<?= base_url('panitiajmtm/beranda/by_id_new_chat/'); ?>" + id_new_chat_pegawai,
         dataType: "JSON",
         success: function(response) {
            modaltitle.text('New Chat');
            $('[name="id_penerima"]').val(response.id_pegawai);
            modal_pilih_chat.modal('hide');
            modal_new_chat.modal('show');
         },
         error: function() {
            console.log(error);
         }
      })
   }

   function Kirim_pesan() {
      var value = {
         id_penerima: $('#id_penerima_chat').val(),
         pesan: $('#pesan_chat').val(),
      }
      $.ajax({
         method: "POST",
         url: url = "<?= base_url('panitiajmtm/beranda/kirim_pesan'); ?>",
         data: value,
         dataType: "JSON",
         success: function(response) {
            if (response == 'success') {
               modal_new_chat.modal('hide');
               relodTable();
               message('success', 'Pesan berhasil Dikirim')
            } else {
               $(".nama_kualifikasi-error").html(response.nama_kualifikasi);
            }
         },
         error: function() {
            console.log(error);
         }
      })
   }

   function deleteData(id) {
      $.ajax({
         type: "POST",
         url: "<?= base_url('jadwal_kualifikasi/delete/') ?>" + id,
         dataType: "JSON",
         success: function(response) {
            if (response == 'success') {
               relodTable();
               message('success', 'Data Berhasil Di Hapus')
            }
         }
      })
   }
   // jam digital
   function jam() {
      setInterval(function() {

         var waktu = new Date();
         var jam = document.getElementById('jam');
         var hours = waktu.getHours();
         var minutes = waktu.getMinutes();
         var seconds = waktu.getSeconds();

         if (waktu.getHours() < 10) {
            hours = '0' + waktu.getHours();
         }
         if (waktu.getMinutes() < 10) {
            minutes = '0' + waktu.getMinutes();
         }
         if (waktu.getSeconds() < 10) {
            seconds = '0' + waktu.getSeconds();
         }
         jam.innerHTML = '<span>' + hours + '</span>' +
            '<span>' + minutes + '</span>' +
            '<span>' + seconds + '</span>';

         var spans = jam.getElementsByTagName('span');
         animation(spans[2]);
         if (seconds == 0) animation(spans[1]);
         if (minutes == 0 && seconds == 0) animation(spans[0]);

      }, 1000);
   }

   jam();
</script>