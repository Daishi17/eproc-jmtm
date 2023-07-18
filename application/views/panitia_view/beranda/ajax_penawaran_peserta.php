<script>
   var saveData;
   var tabledata = $('#serverside_penawaran_peserta');
   var btnsave = $('#btnSave')
   $(document).ready(function() {
      var id_paket = $('#id_paket_pada_penawaran_peserta').val();
      tabledata.DataTable({
         "responsive": true,
         "autoWidth": false,
         "processing": true,
         "serverSide": true,
         "order": [],
         "ajax": {
            "url": "<?= base_url('panitiajmtm/beranda/getdata_vendor_mengikuti_paket/') ?>" + id_paket,
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

   function byid(id, type) {
      if (type == 'dokumen_kualifikasi_vendor') {
         saveData = 'dokumen_kualifikasi_vendor';
      }
      $.ajax({
         type: "GET",
         url: "<?= base_url('panitiajmtm/beranda/getbyid_penawaran_peserta/'); ?>" + id,
         dataType: "JSON",
         success: function(response) {
            if (type == 'dokumen_kualifikasi_vendor') {
               $('[name="dapetin_id_paket"]').val(response['dapetin_paket_dan_vendornya'].id_paket);
               location.replace('<?= base_url('penawaranpeserta/penawaran_peserta/get_data_peserta/') ?>' + response['dapetin_paket_dan_vendornya'].id_mengikuti_paket);
            }
            if (type == 'edit') {

            }
         }
      })
   }
</script>

<!-- DETAIL TENAGA AHLI -->
<script>
   var modal_detail_tenaga_ahli = $('#modal_detail_tenaga_ahli');

   function detail_tenaga_ahli(id) {
      $.ajax({
         type: "GET",
         url: "<?= base_url('penawaranpeserta/penawaran_peserta/get_detail_tenaga_ahli/'); ?>" + id,
         dataType: "JSON",
         success: function(response) {
            modal_detail_tenaga_ahli.modal('show');
            var html = '';
            var i;
            for (i = 0; i < response['get_detail_tenaga_ahli'].length; i++) {
               html += '<tr>' +
                  '<td>' + response['get_detail_tenaga_ahli'][i].tahun_cv + '</td>' +
                  '<td>' + response['get_detail_tenaga_ahli'][i].uraian_cv + '</td>' +
                  '</tr>'
            }
            $('#detail_ahli').html(html);
            // ===================
            var html = '';
            var i;
            for (i = 0; i < response['get_detail_tenaga_ahli_pendidikan'].length; i++) {
               html += '<tr>' +
                  '<td>' + response['get_detail_tenaga_ahli_pendidikan'][i].tahun_pendidikan + '</td>' +
                  '<td>' + response['get_detail_tenaga_ahli_pendidikan'][i].uraian_pendidikan + '</td>' +
                  '</tr>'
            }
            $('#detail_ahli_pendidikan').html(html);
            // =================
            var html = '';
            var i;
            for (i = 0; i < response['get_detail_tenaga_ahli_sertifikat'].length; i++) {
               html += '<tr>' +
                  '<td>' + response['get_detail_tenaga_ahli_sertifikat'][i].tahun_sertifikat + '</td>' +
                  '<td>' + response['get_detail_tenaga_ahli_sertifikat'][i].uraian_sertifikat + '</td>' +
                  '</tr>'
            }
            $('#detail_ahli_sertifikat').html(html);
            // =================
            var html = '';
            var i;
            for (i = 0; i < response['get_detail_tenaga_ahli_bahasa'].length; i++) {
               html += '<tr>' +
                  '<td>' + response['get_detail_tenaga_ahli_bahasa'][i].uraian_bahasa + '</td>' +
                  '</tr>'
            }
            $('#detail_ahli_bahasa').html(html);
         }
      })
   }
</script>

<script>
   $(document).ready(function() {

      function notif() {
         var id_paket = $('#id_paket_pada_penawaran_peserta').val();
         $.ajax({
            type: "post",
            url: "<?= base_url() ?>panitiajmtm/beranda/ngeload_notif/" + id_paket,
            data: {},
            dataType: "json",
            success: function(r) {
               var n = r.data;
               $("#notifikasi").html(n);
            }
         });

      }
      setInterval(() => {
         orang()
         notif()
      }, 1000);

      function orang() {
         var id_paket = $('#id_paket_pada_penawaran_peserta').val();
         $.ajax({
            type: "post",
            url: "<?= base_url() ?>panitiajmtm/beranda/GetAllVendor_pesan_baru/" + id_paket,
            dataType: "json",
            success: function(response) {

               var html = '';
               var i;
               for (i = 0; i < response['vendor'].length; i++) {
                  html += '<li class="active-angga coba" data-id="' + response['vendor'][i].id_mengikuti_vendor + '">' +
                     '<div class="d-flex bd-highlight ">' +
                     '<div class="img_cont ">' +
                     '<img src="<?= base_url('assets/img/servant.png') ?>" class="rounded-circle user_img">' +
                     '<span class="online_icon " ></span>' +
                     '</div>' +
                     '<div class="user_info">' +
                     '<p class="text-white">' + response['vendor'][i].username_vendor + '</p>' +
                     '<p class="text-white">' + response['vendor'][i].isi + '</p>' +
                     '</div>' +
                     '</div>' +
                     '<small class="text-white float-right" style="margin-top:-15px;">' + response['vendor'][i].waktu + '</small>' +
                     '</li>';
               }
               $('#yangAktif').html(html);
            }
         });
      }
      $('body').on('click', '.coba', function() {
         var id = $(this).attr('data-id');
         var id_paket = $('#id_paket').val();
         var id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
         $.ajax({
            type: "post",
            url: "<?= base_url() ?>panitiajmtm/beranda/sudah_dibaca/" + id_paket + '/' + id,
            data: {
               id_pengirim: id_pengirim,
            },
            dataType: "json",
            success: function(data) {
               window.location.replace("<?= base_url() ?>panitiajmtm/beranda/pertanyaantender/" + id_paket + '/' + id);

            }
         });


      });

      $('#sudahdibaca').on('click', function() {
         var id_paket = $('#id_paket').val();
         var id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
         $.ajax({
            type: "post",
            url: "<?= base_url() ?>panitiajmtm/beranda/sudah_dibaca2/" + id_paket,
            data: {
               id_pengirim: id_pengirim,
            },
            dataType: "json",
            success: function(data) {
               window.location.replace("<?= base_url() ?>panitiajmtm/beranda/pertanyaantender/" + id_paket);

            }
         });
      });

   });
</script>