<script>
   $(document).ready(function() {

      function notif() {
         var id_paket = $('#id_paket').val();
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
         notif();
         orang2();
      }, 1000);
      orang()

      function orang2() {
         var id_paket = $('#id_paket').val();
         $.ajax({
            type: "post",
            url: "<?= base_url() ?>panitiajmtm/beranda/GetAllVendor_pesan_baru/" + id_paket,
            dataType: "json",
            success: function(response) {

               var html = '';
               var i;
               for (i = 0; i < response['vendor'].length; i++) {
                  html += '<li class="active-angga coba2" data-id2="' + response['vendor'][i].id_mengikuti_vendor + '">' +
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
               $('#yangAktif2').html(html);
            }
         });
      }
      $('body').on('click', '.coba2', function() {
         var id = $(this).attr('data-id2');
         var id_paket = $('#id_paket').val();
         window.location.replace("<?= base_url() ?>panitiajmtm/beranda/pertanyaantender/" + id_paket + '/' + id);

      });

      function orang() {
         var id_paket = $('#id_paket').val();
         $.ajax({
            type: "post",
            url: "<?= base_url() ?>panitiajmtm/beranda/GetAllVendor/" + id_paket,
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
                     '<span class="">' + response['vendor'][i].username_vendor + '</span>' +
                     '<p class="">' + response['vendor'][i].username_vendor + ' is online</p>' +
                     '</div>' +
                     '</div>' +
                     '</li>';
               }
               $('#yangAktif').html(html);
            }
         });
      }
      $('body').on('click', '.coba', function() {
         var id = $(this).attr('data-id');
         var id_paket = $('#id_paket').val();
         window.location.replace("<?= base_url() ?>panitiajmtm/beranda/pertanyaantender/" + id_paket + '/' + id);

      });

   });
</script>