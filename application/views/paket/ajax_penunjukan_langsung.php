<!-- kirim permintaan persetujuan -->
<script>
    function message(icon, text) {
        swal({
            title: "success!!!",
            text: text,
            icon: icon,
        });
    }

    var saveData;
    var btnsave = $('#btnSave');
    var form_minta_persetujuan_manager = $('#form_minta_persetujuan_manager');

    function Kirim_perintaan_persetujuan() {
        var reusable = $('#reusable').val();
        $.ajax({
            method: "POST",
            url: '<?= base_url('paket/minta_persetujuan_manager/') ?>' + reusable,
            data: form_minta_persetujuan_manager.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('success', 'Berhasil Mengirim Permintaan Persetujuan');
                    location.reload();
                }
            },
            error: function() {
                console.log(error);
            }
        })
    }

    function SetujuiPaketTransaksiLangsung() {
        var reusable = $('#reusable').val();
        $.ajax({
            method: "POST",
            url: '<?= base_url('paket/persetujuan_manager/') ?>' + reusable,
            dataType: "JSON",
            beforeSend: function() {
                $("#bungkusbeliau").css('display', 'block');
            },
            success: function(response) {
                $("#bungkusbeliau").css('display', 'none');
                message('success', 'Berhasil Menyetujui Paket');
                window.open('https://api.whatsapp.com/send?phone=+62' + response['telpon'].telepon + '&text=Berhasil Di Setujui Nama Paket  : ' + response['paket'].nama_paket + ' Dengan Metode Pemilihan : ' + response['paket'].nama_metode_pemilihan + '  Login Dan Umumkan Paket http://jmtm-eproc.kintekindo.net/', '_blank');
                location.reload();
            },
            error: function() {
                console.log(error);
            }
        })
    }

    function Kirim_perintaan_persetujuan2() {
        var reusable = $('#reusable').val();
        $.ajax({
            method: "POST",
            url: '<?= base_url('paket/minta_persetujuan_manager/') ?>' + reusable,
            data: form_minta_persetujuan_manager.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('success', 'Berhasil Mengirim Ulang Persetujuan');
                    location.reload();
                }
            },
            error: function() {
                console.log(error);
            }
        })
    }
</script>
<!-- modal revisi paket -->
<script>
    var modal_revisi_paket = $('#modal_revisi_paket');
    var exampleModal = $('#exampleModal');

    function revisi_paket_transaksi_langsung() {
        modal_revisi_paket.modal('show');
        exampleModal.modal('hide');
    }
</script>

<script>
    function message(icon, text) {
        swal({
            title: "success!!!",
            text: text,
            icon: icon,
        });
    }

    var form_kirim_alasan_revisi_paket = $('#form_kirim_alasan_revisi_paket');

    function kirim_alasan_revisi_paket() {
        var reusable = $('#reusable').val();
        $.ajax({
            method: "POST",
            url: '<?= base_url('paket/kirim_alasan_revisi_paket/') ?>' + reusable,
            data: form_kirim_alasan_revisi_paket.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $("#bungkusbeliau").css('display', 'block');
            },
            success: function(response) {
                $("#bungkusbeliau").css('display', 'none');
                message('success', 'Alasan / Pembatalan Berhasil Di Kirim');
                window.open('https://api.whatsapp.com/send?phone=+62' + response['telpon'].telepon + '&text=Revisi Persetujuan Nama Paket  : ' + response['paket'].nama_paket + ' Dengan Metode Pemilihan : ' + response['paket'].nama_metode_pemilihan + 'Isi Alasan Revisi : ' + response['alasan_revisi'] + ', ' + 'Cek Revisi Login http://jmtm-eproc.kintekindo.net/', '_blank');
                location.reload();
            },
            error: function() {
                console.log(error);
            }
        })
    }
</script>