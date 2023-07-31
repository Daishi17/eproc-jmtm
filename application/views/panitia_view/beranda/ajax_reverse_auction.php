<script>
    var timer2 = $('.time_waktu_binding').val();
    var interval = setInterval(function() {
        var timer = timer2.split(':');
        //by parsing integer, I avoid all extra string processing
        var minutes = parseInt(timer[0], 10);
        var seconds = parseInt(timer[1], 10);
        --seconds;
        minutes = (seconds < 0) ? --minutes : minutes;
        if (minutes == 1) {
            $('.warning_binding2').css('display', 'block');
            seconds = (seconds < 0) ? 59 : seconds;
            seconds = (seconds < 10) ? '0' + seconds : seconds;
            //minutes = (minutes < 10) ?  minutes : minutes;
            $('.countdown').html(minutes + ':' + seconds);
            timer2 = minutes + ':' + seconds;
        } else {
            if (minutes < 0) {
                $('.binding_tahap_2').css('display', 'block');
                $('.danger_binding2').css('display', 'block');
                $('.tahap_3_binding').css('display', 'block');
                $('.input_binding_2').css('display', 'none');
                $('.input_binding_2_biasa').css('display', 'block');
                clearInterval(interval)
            } else {
                seconds = (seconds < 0) ? 59 : seconds;
                seconds = (seconds < 10) ? '0' + seconds : seconds;
                //minutes = (minutes < 10) ?  minutes : minutes;
                $('.countdown').html(minutes + ':' + seconds);
                timer2 = minutes + ':' + seconds;
            }
        }
    }, 1000);


    var timer3 = $('.time_waktu_binding3').val();
    var interval2 = setInterval(function() {
        var timer2 = timer3.split(':');
        //by parsing integer, I avoid all extra string processing
        var minute2 = parseInt(timer2[0], 10);
        var seconds2 = parseInt(timer2[1], 10);
        --seconds2;
        minute2 = (seconds2 < 0) ? --minute2 : minute2;
        if (minute2 == 1) {
            $('.warning_binding').css('display', 'block');
            seconds2 = (seconds2 < 0) ? 59 : seconds2;
            seconds2 = (seconds2 < 10) ? '0' + seconds2 : seconds2;
            //minute2 = (minute2 < 10) ?  minute2 : minute2;
            $('.countdown3').html(minute2 + ':' + seconds2);
            timer3 = minute2 + ':' + seconds2;
        } else {
            if (minute2 < 0) {
                $('.binding_tahap_3').css('display', 'block');
                $('.danger_binding3').css('display', 'block');
                $('.input_binding_3').css('display', 'none');
                $('.input_binding_3_biasa').css('display', 'block');
                clearInterval(interval2)
            } else {
                seconds2 = (seconds2 < 0) ? 59 : seconds2;
                seconds2 = (seconds2 < 10) ? '0' + seconds2 : seconds2;
                //minute2 = (minute2 < 10) ?  minute2 : minute2;
                $('.countdown3').html(minute2 + ':' + seconds2);
                timer3 = minute2 + ':' + seconds2;
            }
        }
    }, 1000);
</script>

<script>
    $(".penawaran_binding2").keyup(function() {
        var harga = $(".penawaran_binding2").val();
        var tanpa_rupiah = document.getElementById('tanpa-rupiah2');
        tanpa_rupiah.value = formatRupiah(this.value, 'Rp. ') + ' <i style="font-size:15px" class="fa fa-flag-checkered" aria-hidden="true"></i>';
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

    $(".penawaran_binding3").keyup(function() {
        var harga = $(".penawaran_binding3").val();
        var tanpa_rupiah = document.getElementById('tanpa-rupiah3');
        tanpa_rupiah.value = formatRupiah(this.value, 'Rp. ') + ' <i style="font-size:15px" class="fa fa-flag-checkered" aria-hidden="true"></i>';
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

    function message509(icon, text) {
        swal({
            title: "Hanya Angka !!!",
            text: text,
            icon: icon,
        });
    }
    document.getElementById("penawaran_binding1").onkeyup = function() {
        var validasiHuruf = /^[a-zA-Z ]+ $ /;
        var validasisimbol = /[^0-9]/;
        var penawaran_binding1 = $('#penawaran_binding1').val();
        if (penawaran_binding1.match(validasiHuruf)) {
            $('#penawaran_binding1').css('border-color', 'red');
            message509('warning', 'Isi Dengan Angka!!');
            $('#penawaran_binding1').val('');
        } else if (penawaran_binding1.match(validasisimbol)) {
            $('#penawaran_binding1').css('border-color', 'red');
            message509('warning', 'Isi Dengan Angka!!');
            $('#penawaran_binding1').val('');
        } else {
            $('#penawaran_binding1').css('border-color', 'green');
            $('#penawaran_binding1').val(penawaran_binding1);

        }

    };

    document.getElementById("penawaran_binding2").onkeyup = function() {
        var validasiHuruf = /^[a-zA-Z ]+ $ /;
        var validasisimbol = /[^0-9]/;
        var penawaran_binding2 = $('#penawaran_binding2').val();
        if (penawaran_binding2.match(validasiHuruf)) {
            $('#penawaran_binding2').css('border-color', 'red');
            message509('warning', 'Isi Dengan Angka!!');
            $('#penawaran_binding2').val('');
        } else if (penawaran_binding2.match(validasisimbol)) {
            $('#penawaran_binding2').css('border-color', 'red');
            message509('warning', 'Isi Dengan Angka!!');
            $('#penawaran_binding2').val('');
        } else {
            $('#penawaran_binding2').css('border-color', 'green');
            $('#penawaran_binding2').val(penawaran_binding2);

        }

    };

    document.getElementById("penawaran_binding3").onkeyup = function() {
        var validasiHuruf = /^[a-zA-Z ]+ $ /;
        var validasisimbol = /[^0-9]/;
        var penawaran_binding3 = $('#penawaran_binding3').val();
        if (penawaran_binding3.match(validasiHuruf)) {
            $('#penawaran_binding3').css('border-color', 'red');
            message509('warning', 'Isi Dengan Angka!!');
            $('#penawaran_binding3').val('');
        } else if (penawaran_binding3.match(validasisimbol)) {
            $('#penawaran_binding3').css('border-color', 'red');
            message509('warning', 'Isi Dengan Angka!!');
            $('#penawaran_binding3').val('');
        } else {
            $('#penawaran_binding3').css('border-color', 'green');
            $('#penawaran_binding3').val(penawaran_binding3);

        }

    };
</script>

<script>
    var id = $('#id_paket').val();
    setInterval(() => {
        lihat_sumary_binding(id);
        lihat_sumary_binding_biasa(id);
    }, 3000);

    function lihat_sumary_binding(id) {
        $.ajax({
            type: "GET",
            url: "<?= base_url('panitiajmtm/beranda/by_id_lihat_vendor/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                var html = '';
                var html2 = '';
                var html3 = '';
                var harga_terkecil = null;
                var no1 = 1;
                var no2 = 1;
                var no3 = 1;
                var i;
                for (i = 0; i < response['vendor1'].length; i++) {
                    var peringkat = '<label for="" style="font-size: 15px;">' + no1++ + '</label>';
                    var harga_terkecil = Math.min(response['vendor1'][i].harga_penawaran_binding_1);
                    if (response['vendor1'][i].harga_penawaran_binding_1 == response['min_binding_1']) {
                        var menang = '' + response['vendor1'][i].username_vendor + '';
                        var input_sendiri = formatRupiah(response['vendor1'][i].harga_penawaran_binding_1, 'Rp. ') + ' <i style="font-size:15px" class="fa fa-flag-checkered" aria-hidden="true"></i>';
                    } else {
                        var input_sendiri = formatRupiah(response['vendor1'][i].harga_penawaran_binding_1, 'Rp. ');
                        var menang = '' + response['vendor1'][i].username_vendor;
                    }
                    html += '<tr>' +
                        '<td>' + menang + '</td>' +
                        '<td>' + input_sendiri + '</td>' +
                        '<td><a target="__blank" href="https://jmtm-vendor.kintekindo.net/file_vendor_binding/' + response['vendor1'][i].file_penawaran_binding_1 + '"><img width="20px" src="<?= base_url('assets/img/pdf.png') ?>" alt=""></a></td>' +
                        '<td>' + peringkat + '</td>' +
                        '</tr>'
                }

                for (i = 0; i < response['vendor2'].length; i++) {

                    var peringkat = '<label for=""  style="font-size: 15px;">' + no2++ + ' </label>';
                    var posisi = '';
                    var harga_terkecil = Math.min(response['vendor2'][i].harga_penawaran_binding_2);
                    if (response['vendor2'][i].harga_penawaran_binding_2 == response['min_binding_2']) {
                        var input_sendiri = formatRupiah(response['vendor2'][i].harga_penawaran_binding_2, 'Rp. ') + ' <i style="font-size:15px" class="fa fa-flag-checkered" aria-hidden="true"></i>';
                        var menang = '' + response['vendor2'][i].username_vendor + '';
                    } else {
                        var input_sendiri = formatRupiah(response['vendor2'][i].harga_penawaran_binding_2, 'Rp. ');
                        var menang = '' + response['vendor2'][i].username_vendor;
                    }
                    html2 += '<tr>' +
                        '<td>' + menang + '</td>' +
                        '<td>' + input_sendiri + '</td>' +
                        '<td>' + peringkat + '</td>' +
                        '</tr>'
                }

                for (i = 0; i < response['vendor3'].length; i++) {

                    var peringkat = '<label for=""  style="font-size: 15px;">' + no3++ + ' </label>';
                    var posisi = '';
                    var harga_terkecil = Math.min(response['vendor3'][i].harga_penawaran_binding_3);
                    if (response['vendor3'][i].harga_penawaran_binding_3 == response['min_binding_3']) {
                        var input_sendiri = formatRupiah(response['vendor3'][i].harga_penawaran_binding_3, 'Rp. ') + ' <i style="font-size:15px" class="fa fa-flag-checkered" aria-hidden="true"></i>';
                        var menang = '' + response['vendor3'][i].username_vendor + '';
                    } else {
                        var menang = '' + response['vendor3'][i].username_vendor;
                        var input_sendiri = formatRupiah(response['vendor3'][i].harga_penawaran_binding_3, 'Rp. ');
                    }
                    html3 += '<tr>' +
                        '<td>' + menang + '</td>' +
                        '<td>' + input_sendiri + '</td>' +
                        '<td>' + peringkat + '</td>' +
                        '</tr>'
                }
                $('#binding_sumaary_1').html(html);
                $('#binding_sumaary_2').html(html2);
                $('#binding_sumaary_3').html(html3);
            }
        })
    }

    function lihat_sumary_binding_3(id) {
        $.ajax({
            type: "GET",
            url: "<?= base_url('panitiajmtm/beranda/by_id_lihat_vendor/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                var html3 = '';
                var harga_terkecil = null;
                var no3 = 1;
                var i;

                for (i = 0; i < response['vendor3'].length; i++) {
                    var peringkat = '<label for=""  style="font-size: 15px;">' + no3++ + ' </label>';
                    var posisi = '';
                    var harga_terkecil = Math.min(response['vendor3'][i].harga_penawaran_binding_3);
                    if (response['vendor3'][i].harga_penawaran_binding_3 == response['min_binding_3']) {
                        var input_sendiri = formatRupiah(response['vendor3'][i].harga_penawaran_binding_3, 'Rp. ') + ' <i style="font-size:15px" class="fa fa-flag-checkered" aria-hidden="true"></i>';
                        var menang = '' + response['vendor3'][i].username_vendor + '';
                    } else {
                        var menang = '' + response['vendor3'][i].username_vendor;
                        var input_sendiri = formatRupiah(response['vendor3'][i].harga_penawaran_binding_3, 'Rp. ');
                    }
                    html3 += '<tr>' +
                        '<td>' + menang + '</td>' +
                        '<td>' + input_sendiri + '</td>' +
                        '<td>' + peringkat + '</td>' +
                        '</tr>'
                }
                $('#binding_sumaary_3').html(html3);
            }
        })
    }

    function lihat_sumary_binding_biasa(id) {
        $.ajax({
            type: "GET",
            url: "<?= base_url('panitiajmtm/beranda/by_id_lihat_vendor/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                var html = '';
                var html2 = '';
                var html3 = '';
                var harga_terkecil = null;
                var no1 = 1;
                var no2 = 1;
                var no3 = 1;
                var i;
                for (i = 0; i < response['vendor1'].length; i++) {
                    var peringkat = '<label for="" style="font-size: 15px;">' + no1++ + '</label>';
                    var posisi = '';
                    var harga_terkecil = Math.min(response['vendor1'][i].harga_penawaran_binding_1);
                    if (response['vendor1'][i].harga_penawaran_binding_1 == response['min_binding_1']) {
                        var input_sendiri = formatRupiah(response['vendor1'][i].harga_penawaran_binding_1, 'Rp. ') + ' <i style="font-size:15px" class="fa fa-flag-checkered" aria-hidden="true"></i>';
                        var menang = '' + response['vendor1'][i].username_vendor + '';
                    } else {
                        var menang = '' + response['vendor1'][i].username_vendor;
                        var input_sendiri = formatRupiah(response['vendor1'][i].harga_penawaran_binding_1, 'Rp. ');
                    }
                    html += '<tr>' +
                        '<td>' + menang + '</td>' +
                        '<td>' + input_sendiri + '</td>' +
                        '<td>' + peringkat + '</td>' +
                        '</tr>'
                }

                for (i = 0; i < response['vendor2'].length; i++) {
                    var peringkat = '<label for="" style="font-size: 15px;">' + no2++ + '</label>';
                    var posisi = '';
                    var harga_terkecil = Math.min(response['vendor2'][i].harga_penawaran_binding_2);
                    if (response['vendor2'][i].harga_penawaran_binding_2 == response['min_binding_2']) {
                        var input_sendiri = formatRupiah(response['vendor2'][i].harga_penawaran_binding_2, 'Rp. ') + ' <i style="font-size:15px" class="fa fa-flag-checkered" aria-hidden="true"></i>';
                        var menang = '' + response['vendor2'][i].username_vendor + '';
                    } else {
                        var menang = '' + response['vendor2'][i].username_vendor;
                        var input_sendiri = formatRupiah(response['vendor2'][i].harga_penawaran_binding_2, 'Rp. ');
                    }
                    html2 += '<tr>' +
                        '<td>' + menang + '</td>' +
                        '<td>' + input_sendiri + '</td>' +
                        '<td>' + peringkat + '</td>' +
                        '</tr>'
                }

                for (i = 0; i < response['vendor3'].length; i++) {
                    var peringkat = '<label for="" style="font-size: 15px;">' + no3++ + '</label>';
                    var posisi = '';
                    var harga_terkecil = Math.min(response['vendor3'][i].harga_penawaran_binding_3);
                    if (response['vendor3'][i].harga_penawaran_binding_3 == response['min_binding_3']) {
                        var input_sendiri = formatRupiah(response['vendor3'][i].harga_penawaran_binding_3, 'Rp. ') + ' <i style="font-size:15px" class="fa fa-flag-checkered" aria-hidden="true"></i>';
                        var menang = '' + response['vendor3'][i].username_vendor + '';
                    } else {
                        var menang = '' + response['vendor3'][i].username_vendor;
                        var input_sendiri = formatRupiah(response['vendor3'][i].harga_penawaran_binding_3, 'Rp. ');
                    }
                    html3 += '<tr>' +
                        '<td>' + menang + '</td>' +
                        '<td>' + input_sendiri + '</td>' +
                        '<td>' + peringkat + '</td>' +
                        '</tr>'
                }
                $('#binding_sumaary_1_biasa').html(html);
                $('#binding_sumaary_2_biasa').html(html2);
                $('#binding_sumaary_3_biasa').html(html3);
            }
        })
    }


    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>