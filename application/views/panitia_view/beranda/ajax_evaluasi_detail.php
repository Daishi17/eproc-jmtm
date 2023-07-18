<!-- INI Untuk Evaluasi Teknis-->
<script>
   var saveData;
   var tbl_evaluasi_administrasi = $('#tbl_evaluasi_administrasi');
   var modal_klarifikasi = $('#modal_klarifikasi');
   var btnsave = $('#btnSave');
   $(document).ready(function() {
      var id_paket_evaluasi = <?= $paket['id_paket'] ?>;
      tbl_evaluasi_administrasi.DataTable({
         "responsive": true,
         "autoWidth": false,
         "processing": true,
         "serverSide": true,
         "paging": false,
         "ordering": false,
         "filter": false,
         "info": false,
         "order": [],
         "ajax": {
            "url": "<?= base_url('panitiajmtm/beranda/getdata_evaluasi_administrasi/') ?>" + id_paket_evaluasi,
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
      tbl_evaluasi_administrasi.DataTable().ajax.reload();
   }

   function message(icon, text) {
      swal({
         title: "Mantaps!!!",
         text: text,
         icon: icon,
      });
   }

   function byid_klarifikasi(id, type) {
      var id_paket_klarifikasi = <?= $paket['id_paket'] ?>;
      var id_vendor_klarifikasi = <?= $vendor['id_vendor'] ?>;
      var id_penawaran = $('#id_penawaran_teknis');
      if (type == 'klarifikasi') {
         saveData = 'klarifikasi';
      }
      $.ajax({
         type: "GET",
         url: "<?= base_url('panitiajmtm/beranda/byid_klarifikasi/'); ?>" + id + '/' + id_vendor_klarifikasi + '/' + id_paket_klarifikasi,
         dataType: "JSON",
         success: function(response) {
            if (type == 'klarifikasi') {
               $('[name="nama_penawaran_teknis"]').val(response['administrasi'].nama_penawaran_teknis);
               $('[name="id_penawaran_teknis"]').val(response['administrasi'].id_penawaran_teknis);
               var tbl_klarifikasi_administrasi = $('#tbl_klarifikasi_administrasi');
               var id_paket_klarifikasi = <?= $paket['id_paket'] ?>;
               var id_vendor_klarifikasi = <?= $vendor['id_vendor'] ?>;
               $(document).ready(function() {
                  tbl_klarifikasi_administrasi.DataTable({
                     "responsive": true,
                     "autoWidth": false,
                     "processing": true,
                     "serverSide": true,
                     "paging": false,
                     "ordering": false,
                     "filter": false,
                     "info": false,
                     "order": [],
                     "ajax": {
                        "url": "<?= base_url('panitiajmtm/beranda/dokumen_klarifikasi_administrasi_vendor/') ?>" + response['administrasi'].id_penawaran_teknis + '/' + id_vendor_klarifikasi + '/' + id_paket_klarifikasi,
                        "type": "POST"
                     },
                     "columnDefs": [{
                        "target": [-1],
                        "orderable": false
                     }],
                     "oLanguage": {
                        "sSearch": "Pencarian : ",
                        "sEmptyTable": "Anda Belum Melakukan Aksi Apapun",
                        "sLoadingRecords": "Silahkan Tunggu - loading...",
                        "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
                        "sZeroRecords": "Anda Belum Melakukan Aksi Apapun",
                        "sProcessing": "Memuat Data...."
                     }
                  });
               });
               if (response['administrasi_klarifikasi'] == null) {
                  $('.tambah_lulus').show();
                  $('.kirimdantambah').show();
                  $('.tampil_kirim_klarifikasi').show();
               } else {
                  if (response['administrasi_klarifikasi'].id_penawaran_teknis_administrasi == response['administrasi_klarifikasi'].id_penawaran_teknis && response['administrasi_klarifikasi'].status_klarifikasi == 1 || 2 && response['administrasi_klarifikasi'].id_vendor_klarifikasi == id_vendor_klarifikasi && response['administrasi_klarifikasi'].id_paket_klarifikasi == id_paket_klarifikasi) {
                     $('.tambah_lulus_update').show();
                     $('.kirimdanupdate').show();
                     $('.tampil_kirim_klarifikasi').show();
                  }
               }
               modal_klarifikasi.modal('show');
               modal_klarifikasi.on('hidden.bs.modal', function() {
                  document.location.reload();
               })
            }
         }
      })
   }


   var form_setuju_klarifikasi = $('#setuju_klarifikasi');;
   // Simpan Dan Buat Paket Tender
   function Update_Setujui_persyartan_administarsi() {
      $.ajax({
         method: "POST",
         url: '<?= base_url('panitiajmtm/beranda/update_setujui_persyaratan_administrasi') ?>',
         data: form_setuju_klarifikasi.serialize(),
         dataType: "JSON",
         success: function(response) {
            form_setuju_klarifikasi[0].reset();
            modal_klarifikasi.modal('hide');
            message('success', 'Dokumen Persyaratan Berhasil Di Luluskan !!');
            Simpan_evaluasi_administrasi();
         },
         error: function() {
            console.log(error);
         }
      })
   }
   // INI UNTUK SETUJUI ADMINISTRASI
   var form_setuju_klarifikasi = $('#setuju_klarifikasi');;
   // Simpan Dan Buat Paket Tender
   function Setujui_persyartan_administarsi() {
      $.ajax({
         method: "POST",
         url: '<?= base_url('panitiajmtm/beranda/setujui_persyaratan_administrasi') ?>',
         data: form_setuju_klarifikasi.serialize(),
         dataType: "JSON",
         success: function(response) {
            form_setuju_klarifikasi[0].reset();
            modal_klarifikasi.modal('hide');
            message('success', 'Persyaratan Berhasil Luluskan !!');
            Simpan_evaluasi_administrasi();
         },
         error: function() {
            console.log(error);
         }
      })
   }

   var form_Kirim_klarifikasi = $('#kirim_klarifikasi');;
   // Simpan Dan Buat Paket Tender
   function Kirim_kualifikasi_tambah() {
      $.ajax({
         method: "POST",
         url: '<?= base_url('panitiajmtm/beranda/kirim_persyaratan_administrasi_tambah') ?>',
         data: form_Kirim_klarifikasi.serialize(),
         dataType: "JSON",
         success: function(response) {
            $("#kirim_klarifikasi2").hide();
            form_Kirim_klarifikasi[0].reset();
            modal_klarifikasi.modal('hide');
            message('success', 'Klarifikasi Berhasil Di Kirim !!');
            Simpan_evaluasi_administrasi();
         },
         error: function() {
            console.log(error);
         }
      })
   }

   var form_Kirim_klarifikasi = $('#kirim_klarifikasi');;
   // Simpan Dan Buat Paket Tender
   function Kirim_kualifikasi_update() {
      $.ajax({
         method: "POST",
         url: '<?= base_url('panitiajmtm/beranda/kirim_klarifikasi_update') ?>',
         data: form_Kirim_klarifikasi.serialize(),
         dataType: "JSON",
         success: function(response) {
            form_Kirim_klarifikasi[0].reset();
            modal_klarifikasi.modal('hide');
            $("#kirim_klarifikasi2").hide();
            message('success', 'Klarifikasi Berhasil Di Sampaikan!! ');
            Simpan_evaluasi_administrasi();
         },
         error: function() {
            console.log(error);
         }
      })
   }

   // Simpan Penilaian Administrasi
   var simpan_evaluasi_nilai_administrasi = $('#simpan_evaluasi_nilai_administrasi');
   // Simpan Dan Buat Paket Tender
   function Simpan_evaluasi_administrasi() {
      $.ajax({
         method: "POST",
         url: '<?= base_url('panitiajmtm/beranda/simpan_evaluasi_administrasi') ?>',
         data: simpan_evaluasi_nilai_administrasi.serialize(),
         dataType: "JSON",
         success: function(response) {},
         error: function() {
            console.log(error);
         }
      })
   }
</script>
<script>
   $(document).ready(function() {
      $("#sembunyikan_kirim_klarifikasi").click(function() {
         $("#sembunyikan_kirim_klarifikasi").hide();
         $("#kirim_klarifikasi2").hide();
         $(".lulus_tambah").show();
         $("#tampil_kirim_klarifikasi").show();
      });
      $("#tampil_kirim_klarifikasi").click(function() {
         $("#sembunyikan_kirim_klarifikasi").show();
         $("#kirim_klarifikasi2").show();
         $(".lulus_tambah").hide();
         $("#tampil_kirim_klarifikasi").hide();
      });
   });
</script>
<!--END INI Untuk Evaluasi Tekknis-->

<script>
   $("#harga_biasa_terkoreksi").keyup(function() {
      var harga = $("#harga_biasa_terkoreksi").val();
      var tanpa_rupiah = document.getElementById('tanpa-rupiah_terkoreksi');
      tanpa_rupiah.value = formatRupiah(this.value, 'Rp. ');
      /* Fungsi */
      function formatRupiah(angka, prefix) {
         var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

         if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
         }

         rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
         return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
      }
   });
   var saveData;
   var tbl_evaluasi_teknis = $('#tbl_evaluasi_teknis');
   var modal_evaluasi_teknis_penilaian = $('#modal_evaluasi_teknis_penilaian');
   var btnsave = $('#btnSave');
   $(document).ready(function() {
      var id_paket_evaluasi = <?= $paket['id_paket'] ?>;
      tbl_evaluasi_teknis.DataTable({
         "responsive": true,
         "autoWidth": false,
         "processing": true,
         "serverSide": true,
         "paging": false,
         "ordering": false,
         "filter": false,
         "info": false,
         "order": [],
         "ajax": {
            "url": "<?= base_url('panitiajmtm/beranda/getdata_evaluasi_teknis/') ?>" + id_paket_evaluasi,
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

   function byid_teknis(id, type) {
      var id_paket_teknis = <?= $paket['id_paket'] ?>;
      var id_vendor_teknis = <?= $vendor['id_vendor'] ?>;
      var id_penawaran_teknis_teknis = $('#id_penawaran_teknis_teknis');
      if (type == 'teknis') {
         saveData = 'teknis';
      }
      $.ajax({
         type: "GET",
         url: "<?= base_url('panitiajmtm/beranda/byid_teknis/'); ?>" + id + '/' + id_vendor_teknis + '/' + id_paket_teknis,
         dataType: "JSON",
         success: function(response) {
            if (type == 'teknis') {
               $('[name="nama_penawaran_teknis_teknis"]').val(response['data_penawaran_teknis'].nama_penawaran_teknis);
               $('[name="id_penawaran_teknis_teknis"]').val(response['data_penawaran_teknis'].id_penawaran_teknis);
               if (response['data_tbl_teknis_penilain'] == null) {
                  $('.kirim_tambah_teknis').show();
                  $('.nama_nilai').html(response['data_penawaran_teknis'].nama_penawaran_teknis);
                  $('.nilai_saat_ini').html('Belom Ada Nilai');
               } else {
                  if (response['data_tbl_teknis_penilain'].id_penawaran_teknis_penilaian == response['data_tbl_teknis_penilain'].id_penawaran_teknis && response['data_tbl_teknis_penilain'].status_teknis == 1 || 2 && response['data_tbl_teknis_penilain'].id_vendor_teknis_penilaian == id_vendor_teknis && response['data_tbl_teknis_penilain'].id_paket_teknis_penilaian == id_paket_teknis) {
                     $('.kirim_update_teknis').show();
                     $('[name="nilai_teknis"]').val(response['data_tbl_teknis_penilain'].nilai_teknis);
                     $('.nama_nilai').html(response['data_tbl_teknis_penilain'].jenis_penilaian_teknis);
                     $('.nilai_saat_ini').html(response['data_tbl_teknis_penilain'].nilai_teknis);
                  }
               }
               modal_evaluasi_teknis_penilaian.modal("show");
               modal_evaluasi_teknis_penilaian.on('hidden.bs.modal', function() {
                  document.location.reload();
               })
            }
         }
      })
   }


   var form_penilain_teknis = $('#form_penilain_teknis');
   // Simpan Dan Buat Paket Tender
   function Kirim_penilain_teknis_tambah() {
      $.ajax({
         method: "POST",
         url: '<?= base_url('panitiajmtm/beranda/add_nilai_teknis') ?>',
         data: form_penilain_teknis.serialize(),
         dataType: "JSON",
         success: function(response) {
            form_penilain_teknis[0].reset();
            modal_evaluasi_teknis_penilaian.modal('hide');
            message('success', 'Persyaratan Teknis Berhasil Di Luluskan Luluskan !!');
         },
         error: function() {
            console.log(error);
         }
      })
   }

   var form_penilain_teknis = $('#form_penilain_teknis');;
   // Simpan Dan Buat Paket Tender
   function Kirim_penilaian_teknis_update() {
      $.ajax({
         method: "POST",
         url: '<?= base_url('panitiajmtm/beranda/update_nilai_teknis') ?>',
         data: form_penilain_teknis.serialize(),
         dataType: "JSON",
         success: function(response) {
            form_penilain_teknis[0].reset();
            modal_evaluasi_teknis_penilaian.modal('hide');
            message('success', 'Persyaratan Teknis Berhasil Di Update !!');
         },
         error: function() {
            console.log(error);
         }
      })
   }


   function relodTable() {
      tbl_evaluasi_teknis.DataTable().ajax.reload();
   }

   function message(icon, text) {
      swal({
         title: "Mantap!!!",
         text: text,
         icon: icon,
      });
   }
</script>

<script>
   $('#myTab a').click(function(e) {
      e.preventDefault();
      $(this).tab('show');
   });
   $("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
      var id = $(e.target).attr("href").substr(1);
      window.location.hash = id;
   });
   var hash = window.location.hash;
   $('#myTab a[href="' + hash + '"]').tab('show');
</script>

<script>
   $(document).ready(function() {
      $("#button_tampil_tidak_lulus_teknis").click(function() {
         $("#tampil_tidak_lulus_teknis").show();
         $("#tampil_lulus_teknis").hide();
      });
      $("#button_tampil_lulus_teknis").click(function() {
         $("#tampil_lulus_teknis").show();
         $("#tampil_tidak_lulus_teknis").hide();
      });
   });
</script>

<!-- nilai Teknis -->
<script>
   var nilai_seluruh_teknis = $('#nilai_seluruh_teknis')
   // var id_paket_teknis = <?= $paket['id_paket'] ?>;
   // var id_vendor_teknis = <?= $vendor['id_vendor'] ?>;
   var btnsave = $('#btnSave')
   var saveData;

   function save_nilai_seluruh_teknis() {
      var id_paket_save_tender = $('#id_paket_save_tender').val()
      $.ajax({
         method: "POST",
         url: url = "<?= base_url("panitiajmtm/beranda/update_nilai_teknis_hanya_nilai") ?>",
         data: nilai_seluruh_teknis.serialize(),
         dataType: "JSON",
         success: function(response) {
            if (response == 'success') {
               message('success', 'Teknis Keseluruhan Berhasil Di Nilai');
            } else {
               $("#kualifikasi_usaha_error").html(response.kualifikasi_usaha);
               $("#bobot_teknis_error").html(response.bobot_teknis);
               $("#bobot_biaya_error").html(response.bobot_biaya);
            }
         },
         error: function() {
            console.log(error);
         }
      })
   }
</script>
<!-- Harga Penawaran -->
<script>
   var nilai_terkoreksi = $('#nilai_terkoreksi')
   // var id_paket_teknis = <?= $paket['id_paket'] ?>;
   // var id_vendor_teknis = <?= $vendor['id_vendor'] ?>;
   var btnsave = $('#btnSave')
   var saveData;

   function simpan_harga_terkoreksi() {
      $.ajax({
         method: "POST",
         url: url = "<?= base_url("panitiajmtm/beranda/update_nilai_terkoreksi") ?>",
         data: nilai_terkoreksi.serialize(),
         dataType: "JSON",
         success: function(response) {
            if (response == 'success') {
               message('success', 'Harga Terkoreksi Berhasil Di Nilai');
            } else {
               $("#kualifikasi_usaha_error").html(response.kualifikasi_usaha);
               $("#bobot_teknis_error").html(response.bobot_teknis);
               $("#bobot_biaya_error").html(response.bobot_biaya);
            }
         },
         error: function() {
            console.log(error);
         }
      })
   }
</script>

<!-- Peringkat Teknis -->
<script>
   var nilai_pringkat_teknis = $('#nilai_pringkat_teknis')
   var btnsave = $('#btnSave')
   var saveData;

   function save_nilai_pringkat_teknis() {
      $.ajax({
         method: "POST",
         url: url = "<?= base_url("panitiajmtm/beranda/update_nilai_pringkat_teknis") ?>",
         data: nilai_pringkat_teknis.serialize(),
         dataType: "JSON",
         success: function(response) {
            if (response == 'success') {
               message('success', 'Nilai Peringkat Teknis Berhasil Di Nilai');
            } else {
               $("#kualifikasi_usaha_error").html(response.kualifikasi_usaha);
               $("#bobot_teknis_error").html(response.bobot_teknis);
               $("#bobot_biaya_error").html(response.bobot_biaya);
            }
         },
         error: function() {
            console.log(error);
         }
      })
   }
</script>

<script>
   var nilai_metodologi = $('#nilai_metodologi')
   // var id_paket_teknis = <?= $paket['id_paket'] ?>;
   // var id_vendor_teknis = <?= $vendor['id_vendor'] ?>;
   var btnsave = $('#btnSave')
   var saveData;

   function save_nilai_metodelogi() {
      var id_paket_save_tender = $('#id_paket_save_tender').val()
      $.ajax({
         method: "POST",
         url: url = "<?= base_url("panitiajmtm/beranda/update_nilai_metodelogi") ?>",
         data: nilai_metodologi.serialize(),
         dataType: "JSON",
         success: function(response) {
            if (response == 'success') {
               message('success', 'Teknis Keseluruhan Berhasil Di Nilai');
            } else {
               $("#kualifikasi_usaha_error").html(response.kualifikasi_usaha);
               $("#bobot_teknis_error").html(response.bobot_teknis);
               $("#bobot_biaya_error").html(response.bobot_biaya);
            }
         },
         error: function() {
            console.log(error);
         }
      })
   }
</script>

<script>
   var nilai_akhir = $('#nilai_akhir')
   // var id_paket_teknis = <?= $paket['id_paket'] ?>;
   // var id_vendor_teknis = <?= $vendor['id_vendor'] ?>;
   var btnsave = $('#btnSave')
   var saveData;

   function save_nilai_akhir() {
      var id_paket_save_tender = $('#id_paket_save_tender').val()
      $.ajax({
         method: "POST",
         url: url = "<?= base_url("panitiajmtm/beranda/update_nilai_akhir") ?>",
         data: nilai_akhir.serialize(),
         dataType: "JSON",
         success: function(response) {
            if (response == 'success') {
               message('success', 'Teknis Keseluruhan Berhasil Di Nilai');
            } else {
               $("#kualifikasi_usaha_error").html(response.kualifikasi_usaha);
               $("#bobot_teknis_error").html(response.bobot_teknis);
               $("#bobot_biaya_error").html(response.bobot_biaya);
            }
         },
         error: function() {
            console.log(error);
         }
      })
   }
</script>

<!-- nilai Teknis -->
<script>
   var nilai_seluruh_prakualifikasi = $('#nilai_seluruh_prakualifikasi')
   // var id_paket_teknis = <?= $paket['id_paket'] ?>;
   // var id_vendor_teknis = <?= $vendor['id_vendor'] ?>;
   var btnsave = $('#btnSave')
   var saveData;

   function save_nilai_seluruh_prakualifikasi() {
      var id_paket_save_tender = $('#id_paket_save_tender').val()
      $.ajax({
         method: "POST",
         url: url = "<?= base_url("panitiajmtm/beranda/update_nilai_prakualifikasi") ?>",
         data: nilai_seluruh_prakualifikasi.serialize(),
         dataType: "JSON",
         success: function(response) {
            if (response == 'success') {
               message('success', 'Prakualifikasi Keseluruhan Berhasil Di Nilai');
            } else {
               $("#kualifikasi_usaha_error").html(response.kualifikasi_usaha);
               $("#bobot_teknis_error").html(response.bobot_teknis);
               $("#bobot_biaya_error").html(response.bobot_biaya);
            }
         },
         error: function() {
            console.log(error);
         }
      })
   }
</script>

<script>
   var nilai_negosiasi = $('#nilai_negosiasi')
   // var id_paket_teknis = <?= $paket['id_paket'] ?>;
   // var id_vendor_teknis = <?= $vendor['id_vendor'] ?>;
   var btnsave = $('#btnSave')
   var saveData;

   function simpan_harga_negosiasi() {
      $.ajax({
         method: "POST",
         url: url = "<?= base_url("panitiajmtm/beranda/update_nilai_negosiasi") ?>",
         data: nilai_negosiasi.serialize(),
         dataType: "JSON",
         success: function(response) {
            if (response == 'success') {
               message('success', 'Harga Negosiasi Berhasil Di Input');
            } else {
               $("#kualifikasi_usaha_error").html(response.kualifikasi_usaha);
               $("#bobot_teknis_error").html(response.bobot_teknis);
               $("#bobot_biaya_error").html(response.bobot_biaya);
            }
         },
         error: function() {
            console.log(error);
         }
      })
   }
   $("#harga_biasa_negosiasi").keyup(function() {
      var harga = $("#harga_biasa_negosiasi").val();
      var tanpa_rupiah = document.getElementById('tanpa-rupiah-negosiasi');
      tanpa_rupiah.value = formatRupiah(this.value, 'Rp. ');
      /* Fungsi */
      function formatRupiah(angka, prefix) {
         var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

         if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
         }

         rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
         return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
      }
   });
</script>


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
         notif()
      }, 5000);

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

<!-- Notifikasi Sanggahan Prakualifikasi -->
<script>
   $(document).ready(function() {

      function notif_sanggan_prakualifikasi() {
         var id_paket_sanggahan = $('#id_paket').val();
         $.ajax({
            type: "post",
            url: "<?= base_url() ?>panitiajmtm/beranda/ngeload_notif_sanggahan_prakualifikasi/" + id_paket_sanggahan,
            data: {},
            dataType: "json",
            success: function(r) {
               var n = r.data;
               $("#notifikasi_sangahan_prakualifikasi").html(n);
            }
         });

      }
      setInterval(() => {
         notif_sanggan_prakualifikasi()
      }, 5000);

      $('#sudahdibaca_sanggahan_prakualifikasi').on('click', function() {
         var id_paket_sanggahan = $('#id_paket').val();
         var id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
         $.ajax({
            type: "post",
            url: "<?= base_url() ?>panitiajmtm/beranda/sudah_dibaca_sanggahan_prakualifiaksi/" + id_paket_sanggahan,
            data: {
               id_pengirim: id_pengirim,
            },
            dataType: "json",
            success: function(data) {
               window.location.replace("<?= base_url() ?>panitiajmtm/beranda/sanggah_prakualifikasi/" + id_paket_sanggahan);

            }
         });
      });

   });
</script>

<!-- Notifikasi Sanggahan -->
<script>
   $(document).ready(function() {

      function notif_sanggan_akhir() {
         var id_paket_sanggahan_akhir = $('#id_paket').val();
         $.ajax({
            type: "post",
            url: "<?= base_url() ?>panitiajmtm/beranda/ngeload_notif_sanggahan_akhir/" + id_paket_sanggahan_akhir,
            data: {},
            dataType: "json",
            success: function(r) {
               var n = r.data;
               $("#notifikasi_sangahan_akhir").html(n);
            }
         });

      }
      setInterval(() => {
         notif_sanggan_akhir()
      }, 5000);

      $('#sudahdibaca_sanggahan_akhir').on('click', function() {
         var id_paket_sanggahan_akhir = $('#id_paket').val();
         var id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
         $.ajax({
            type: "post",
            url: "<?= base_url() ?>panitiajmtm/beranda/sudah_dibaca_sanggahan_akhir/" + id_paket_sanggahan_akhir,
            data: {
               id_pengirim: id_pengirim,
            },
            dataType: "json",
            success: function(data) {
               window.location.replace("<?= base_url() ?>panitiajmtm/beranda/sanggahantender/" + id_paket_sanggahan_akhir);

            }
         });
      });

   });
</script>

<!-- Notifikasi Negosiasi -->
<script>
   $(document).ready(function() {

      function notif_negosiasi() {
         var id_paket_negosiasi_tender = $('#id_paket').val();
         $.ajax({
            type: "post",
            url: "<?= base_url() ?>panitiajmtm/beranda/ngeload_notif_negosiasi_tender/" + id_paket_negosiasi_tender,
            data: {},
            dataType: "json",
            success: function(r) {
               var n = r.data;
               $("#notifikasi_negosiasi").html(n);
            }
         });

      }
      setInterval(() => {
         notif_negosiasi()
      }, 5000);

      $('#sudahdibaca_negosiasi').on('click', function() {
         var id_paket_negosiasi_tender = $('#id_paket').val();
         var id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
         $.ajax({
            type: "post",
            url: "<?= base_url() ?>panitiajmtm/beranda/sudah_dibaca_negosiasi_tender/" + id_paket_negosiasi_tender,
            data: {
               id_pengirim: id_pengirim,
            },
            dataType: "json",
            success: function(data) {
               window.location.replace("<?= base_url() ?>panitiajmtm/beranda/negosiasi/" + id_paket_negosiasi_tender);

            }
         });
      });

   });
</script>
<script>
   function message50(icon, text) {
      swal({
         title: "Good Jobs!!!",
         text: text,
         icon: icon,
      });
   }
   var form_kelulusan = $('#form_kelulusan')

   function tidak_lulus_kualifikasi() {
      $.ajax({
         method: "POST",
         url: url = "<?= base_url("panitiajmtm/beranda/tidak_lulus_kualifikasi_evaluasi") ?>",
         data: form_kelulusan.serialize(),
         dataType: "JSON",
         success: function(response) {
            if (response == 'success') {
               message50('success', 'Persyaratan Tambahan Berhasil Di Evaluasi');
               document.location.reload();
            }
         },
         error: function() {
            console.log(error);
         }
      })
   }

   function lulus_kualifikasi() {
      $.ajax({
         method: "POST",
         url: url = "<?= base_url("panitiajmtm/beranda/lulus_kualifikasi_evaluasi") ?>",
         data: form_kelulusan.serialize(),
         dataType: "JSON",
         success: function(response) {
            if (response == 'success') {
               message50('success', 'Persyaratan Tambahan Berhasil Di Evaluasi');
               document.location.reload();
            }
         },
         error: function() {
            console.log(error);
         }
      })
   }

   function batal_dievaluasi_kualifikasi_dan_batal() {
      $.ajax({
         method: "POST",
         url: url = "<?= base_url("panitiajmtm/beranda/batal_dievaluasi_kualifikasi_dan_batal") ?>",
         data: form_kelulusan.serialize(),
         dataType: "JSON",
         success: function(response) {
            if (response == 'success') {
               message50('success', 'Evaluasi Persyaratan Tambahan Berhasil Di Batalkan');
               document.location.reload();

            }
         },
         error: function() {
            console.log(error);
         }
      })
   }
</script>

<!-- Validasi Angka Ajah -->
<script>
   function message678(icon, text) {
      swal({
         title: "Hanya Angka !!!",
         text: text,
         icon: icon,
      });
   }
   document.getElementById("validasi_nilai_teknis_keseluruhan").onkeyup = function() {
      var validasiHuruf = /^[a-zA-Z ]+ $ /;
     // var validasisimbol = /[^0-9]/;
      var validasi_nilai_teknis_keseluruhan = $('#validasi_nilai_teknis_keseluruhan').val();
      if (validasi_nilai_teknis_keseluruhan.match(validasiHuruf)) {
         $('#validasi_nilai_teknis_keseluruhan').css('border-color', 'red');
         message678('warning', 'Isi Dengan Angka!!');
         $('#validasi_nilai_teknis_keseluruhan').val('');
      } 
    //   else if (validasi_nilai_teknis_keseluruhan.match(validasisimbol)) {
    //      $('#validasi_nilai_teknis_keseluruhan').css('border-color', 'red');
    //      message678('warning', 'Isi Dengan Angka!!');
    //      $('#validasi_nilai_teknis_keseluruhan').val('');
    //   } else {
    //      $('#validasi_nilai_teknis_keseluruhan').css('border-color', 'green');
    //      $('#validasi_nilai_teknis_keseluruhan').val(validasi_nilai_teknis_keseluruhan);

    //   }

   };
   document.getElementById("validasi_nilai_prakualifikasi").onkeyup = function() {
      var validasiHuruf = /^[a-zA-Z ]+ $ /;
     // var validasisimbol = /[^0-9]/;
      var validasi_nilai_prakualifikasi = $('#validasi_nilai_prakualifikasi').val();
      if (validasi_nilai_prakualifikasi.match(validasiHuruf)) {
         $('#validasi_nilai_prakualifikasi').css('border-color', 'red');
         $('#validasi_nilai_prakualifikasi').val('');
         message678('warning', 'Isi Dengan Angka!!');
      } 
    //   else if (validasi_nilai_prakualifikasi.match(validasisimbol)) {
    //      $('#validasi_nilai_prakualifikasi').css('border-color', 'red');
    //      $('#validasi_nilai_prakualifikasi').val('');
    //      message678('warning', 'Isi Dengan Angka!!');
    //   } else {
    //      $('#validasi_nilai_prakualifikasi').css('border-color', 'green');
    //      $('#validasi_nilai_prakualifikasi').val(validasi_nilai_prakualifikasi);

    //   }

   };

   document.getElementById("validasi_nilai_pringkat_teknis").onkeyup = function() {
      var validasiHuruf = /^[a-zA-Z ]+ $ /;
      var validasisimbol = /[^0-9]/;
      var validasi_nilai_pringkat_teknis = $('#validasi_nilai_pringkat_teknis').val();
      if (validasi_nilai_pringkat_teknis.match(validasiHuruf)) {
         $('#validasi_nilai_pringkat_teknis').css('border-color', 'red');
         $('#validasi_nilai_pringkat_teknis').val('');
         message678('warning', 'Isi Dengan Angka!!');
      }
    //   else if (validasi_nilai_pringkat_teknis.match(validasisimbol)) {
    //      $('#validasi_nilai_pringkat_teknis').css('border-color', 'red');
    //      $('#validasi_nilai_pringkat_teknis').val('');
    //      message678('warning', 'Isi Dengan Angka!!');
    //   } else {
    //      $('#validasi_nilai_pringkat_teknis').css('border-color', 'green');
    //      $('#validasi_nilai_pringkat_teknis').val(validasi_nilai_pringkat_teknis);

    //   }

   };

   document.getElementById("harga_biasa_terkoreksi").onkeyup = function() {
      var validasiHuruf = /^[a-zA-Z ]+ $ /;
      var validasisimbol = /[^0-9]/;
      var harga_biasa_terkoreksi = $('#harga_biasa_terkoreksi').val();
      if (harga_biasa_terkoreksi.match(validasiHuruf)) {
         $('#harga_biasa_terkoreksi').css('border-color', 'red');
         $('#harga_biasa_terkoreksi').val('');
         message678('warning', 'Isi Dengan Angka!!');
      } else if (harga_biasa_terkoreksi.match(validasisimbol)) {
         $('#harga_biasa_terkoreksi').css('border-color', 'red');
         $('#harga_biasa_terkoreksi').val('');
         message678('warning', 'Isi Dengan Angka!!');
      } else {
         $('#harga_biasa_terkoreksi').css('border-color', 'green');
         $('#harga_biasa_terkoreksi').val(harga_biasa_terkoreksi);

      }

   };

   document.getElementById("harga_biasa_negosiasi").onkeyup = function() {
      var validasiHuruf = /^[a-zA-Z ]+ $ /;
      var validasisimbol = /[^0-9]/;
      var harga_biasa_negosiasi = $('#harga_biasa_negosiasi').val();
      if (harga_biasa_negosiasi.match(validasiHuruf)) {
         $('#harga_biasa_negosiasi').css('border-color', 'red');
         $('#harga_biasa_negosiasi').val('');
         message678('warning', 'Isi Dengan Angka!!');
      } else if (harga_biasa_negosiasi.match(validasisimbol)) {
         $('#harga_biasa_negosiasi').css('border-color', 'red');
         $('#harga_biasa_negosiasi').val('');
         message678('warning', 'Isi Dengan Angka!!');
      } else {
         $('#harga_biasa_negosiasi').css('border-color', 'green');
         $('#harga_biasa_negosiasi').val(harga_biasa_negosiasi);

      }

   };
</script>