<script>
    function message(icon, text) {
        swal({
            title: "Success!!!",
            text: text,
            icon: icon,
        });
    }

    var form_batal_atau_tender_ulang = $('#form_batal_atau_tender_ulang');

    function Mengulang_tender() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('panitiajmtm/beranda/tender_ulang') ?>',
            data: form_batal_atau_tender_ulang.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $('#batal_tender').addClass('disabled');
                $("#kirim_ke_vendor").css('display', 'block');
            },
            success: function(response) {
                if (response == 'success') {
                    $("#kirim_ke_vendor").css('display', 'none');
                    message('success', 'Tender Berhasil Di Ulang!!')
                    location.replace('<?= base_url('panitiajmtm/beranda') ?>');
                    $('#batal_tender').removeClass('disabled');
                }
            },
        })
    }

    function Batal_tender() {
        var id_paket_save_tender = $('#id_paket').val()
        $.ajax({
            method: "POST",
            url: '<?= base_url('panitiajmtm/beranda/batal_ulang') ?>',
            data: form_batal_atau_tender_ulang.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $('#ulang').addClass('disabled');
                $("#kirim_ke_vendor").css('display', 'block');
            },
            success: function(response) {
                if (response == 'success') {
                    $("#kirim_ke_vendor").css('display', 'none');
                    message('success', 'Tender Berhasil Di Batalkan!!')
                    location.replace('<?= base_url('panitiajmtm/beranda') ?>');
                    $('#ulang').removeClass('disabled');
                }
            },
        })
    }
</script>