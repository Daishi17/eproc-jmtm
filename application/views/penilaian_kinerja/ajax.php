<!-- INI BATAS PENILAIAN KONTRUKSI ===================================================================================================================================== -->

<!-- AJAX BARUUU TAMBAH REVISI -->
<script>
    function message2(icon, text) {
        swal({
            title: "Good Jobs!!!",
            text: text,
            icon: icon,
        });
    }

    function message5(icon, text) {
        swal({
            title: "Anda Berhasil Mereset Nilai!!!",
            text: text,
            icon: icon,
        });
    }
    var form_tambah_pekerjaan_kontruksi = $('#form_tambah_pekerjaan_kontruksi');

    function Simpan_pekerjaan_kontruksi() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('beranda/tambah_pekerjaan_kontruksisaya') ?>',
            data: form_tambah_pekerjaan_kontruksi.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message2('success', 'Penilaian Berhasil Di Buat!!');
                    location.reload();
                }
            },
        })
    }

    var form_tambah_pekerjaan_kontruksi = $('#form_tambah_pekerjaan_kontruksi');

    function Simpan_Warning_pekerjaan_kontruksi_warning() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('beranda/tambah_warning_pekerjaan_kontruksisaya') ?>',
            data: form_tambah_pekerjaan_kontruksi.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $("#kirim_ke_vendor").css('display', 'block');
            },
            success: function(response) {
                $("#kirim_ke_vendor").css('display', 'none');
                window.open('https://api.whatsapp.com/send?phone=+62' + response['telpon'] + '&text=Laporan Penilaian Kinerja Vendor Nama Paket  : ' + response['paket'].nama_paket + ' Dengan Metode Pemilihan : ' + response['paket'].nama_metode_pemilihan + '  Agency : ' + response['paket'].nama_unit_kerja + ', Info : ' + response['isi'] + '', '_blank');
                message2('success', 'Penilaian Berhasil Di Buat');
                location.reload();
            },
        })
    }

    var form_tambah_pekerjaan_kontruksi_reset = $('#form_tambah_pekerjaan_kontruksi');

    function Reset_nilai_pekerjaan_kontruksi() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('beranda/reset_penilaian_performance_pekerjaan_kontruksi') ?>',
            data: form_tambah_pekerjaan_kontruksi_reset.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $("#kirim_ke_vendor").css('display', 'block');
            },
            success: function(response) {
                $("#kirim_ke_vendor").css('display', 'none');
                window.open('https://api.whatsapp.com/send?phone=+62' + response['telpon'] + '&text=Laporan Penilaian Kinerja Vendor Nama Paket  : ' + response['paket'].nama_paket + ' Dengan Metode Pemilihan : ' + response['paket'].nama_metode_pemilihan + '  Agency : ' + response['paket'].nama_unit_kerja + ', Info : ' + response['isi'] + '', '_blank');
                message5('success', 'Penilaian Berhasil Di Reset');
                location.reload();
            },
        })
    }
</script>


<!-- INI UNTUK VALIDASI ANGKANYA Bagian UPDATE-->
<script>
    function message(icon, text) {
        swal({
            title: "Maaf Tidak Boleh Huruf Yaa !!!",
            text: text,
            icon: icon,
        });
    }

    function message_gak_boleh_lebih_angkanya(icon, text) {
        swal({
            title: "Maaf Angka Penilaian Tidak Boleh Lebih Dari 100 Yaa !!!",
            text: text,
            icon: icon,
        });
    }

    $('#penilaian_kontruksi_update1').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_update1').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_update1").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_update1 = $('#penilaian_kontruksi_update1').val();
                if (penilaian_kontruksi_update1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_update1').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi_update1').css('border-color', 'green');
                    $('#penilaian_kontruksi_update1').val(penilaian_kontruksi_update1);

                }

            };

        }
    });

    $('#penilaian_kontruksi_update2').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_update2').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_update2").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_update1 = $('#penilaian_kontruksi_update2').val();
                if (penilaian_kontruksi_update1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_update2').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi_update2').css('border-color', 'green');
                    $('#penilaian_kontruksi_update2').val(penilaian_kontruksi_update1);

                }

            };

        }
    });
    $('#penilaian_kontruksi_update3').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_update3').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_update3").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_update1 = $('#penilaian_kontruksi_update3').val();
                if (penilaian_kontruksi_update1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_update3').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi_update3').css('border-color', 'green');
                    $('#penilaian_kontruksi_update3').val(penilaian_kontruksi_update1);

                }

            };

        }
    });
    $('#penilaian_kontruksi_update4').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_update4').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_update4").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_update1 = $('#penilaian_kontruksi_update4').val();
                if (penilaian_kontruksi_update1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_update4').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi_update4').css('border-color', 'green');
                    $('#penilaian_kontruksi_update4').val(penilaian_kontruksi_update1);

                }

            };

        }
    });
    $('#penilaian_kontruksi_update5').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_update5').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_update5").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_update1 = $('#penilaian_kontruksi_update5').val();
                if (penilaian_kontruksi_update1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_update5').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi_update5').css('border-color', 'green');
                    $('#penilaian_kontruksi_update5').val(penilaian_kontruksi_update1);

                }

            };

        }
    });
    $('#penilaian_kontruksi_update6').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_update6').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_update6").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_update1 = $('#penilaian_kontruksi_update6').val();
                if (penilaian_kontruksi_update1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_update6').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi_update6').css('border-color', 'green');
                    $('#penilaian_kontruksi_update6').val(penilaian_kontruksi_update1);

                }

            };

        }
    });
    $('#penilaian_kontruksi_update7').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_update7').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_update7").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_update1 = $('#penilaian_kontruksi_update7').val();
                if (penilaian_kontruksi_update1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_update7').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi_update7').css('border-color', 'green');
                    $('#penilaian_kontruksi_update7').val(penilaian_kontruksi_update1);

                }

            };

        }
    });
    $('#penilaian_kontruksi_update8').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_update8').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_update8").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_update1 = $('#penilaian_kontruksi_update8').val();
                if (penilaian_kontruksi_update1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_update8').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi_update8').css('border-color', 'green');
                    $('#penilaian_kontruksi_update8').val(penilaian_kontruksi_update1);

                }

            };

        }
    });
    $('#penilaian_kontruksi_update9').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_update9').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_update9").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_update1 = $('#penilaian_kontruksi_update9').val();
                if (penilaian_kontruksi_update1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_update9').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi_update9').css('border-color', 'green');
                    $('#penilaian_kontruksi_update9').val(penilaian_kontruksi_update1);

                }

            };

        }
    });
    $('#penilaian_kontruksi_update10').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_update10').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_update10").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_update1 = $('#penilaian_kontruksi_update10').val();
                if (penilaian_kontruksi_update1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_update10').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi_update10').css('border-color', 'green');
                    $('#penilaian_kontruksi_update10').val(penilaian_kontruksi_update1);

                }

            };

        }
    });
    $('#penilaian_kontruksi_update11').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_update11').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_update11").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_update1 = $('#penilaian_kontruksi_update11').val();
                if (penilaian_kontruksi_update1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_update11').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi_update11').css('border-color', 'green');
                    $('#penilaian_kontruksi_update11').val(penilaian_kontruksi_update1);

                }

            };

        }
    });
    $('#penilaian_kontruksi_update12').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_update12').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_update12").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_update1 = $('#penilaian_kontruksi_update12').val();
                if (penilaian_kontruksi_update1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_update12').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi_update12').css('border-color', 'green');
                    $('#penilaian_kontruksi_update12').val(penilaian_kontruksi_update1);

                }

            };

        }
    });
    $('#penilaian_kontruksi_update13').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_update13').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_update13").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_update1 = $('#penilaian_kontruksi_update13').val();
                if (penilaian_kontruksi_update1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_update13').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi_update13').css('border-color', 'green');
                    $('#penilaian_kontruksi_update13').val(penilaian_kontruksi_update1);

                }

            };

        }
    });
    $('#penilaian_kontruksi_update14').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_update14').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_update14").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_update1 = $('#penilaian_kontruksi_update14').val();
                if (penilaian_kontruksi_update1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_update14').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi_update14').css('border-color', 'green');
                    $('#penilaian_kontruksi_update14').val(penilaian_kontruksi_update1);

                }

            };

        }
    });
    $('#penilaian_kontruksi_update15').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_update15').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_update15").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_update1 = $('#penilaian_kontruksi_update15').val();
                if (penilaian_kontruksi_update1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_update15').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi_update15').css('border-color', 'green');
                    $('#penilaian_kontruksi_update15').val(penilaian_kontruksi_update1);

                }

            };

        }
    });
    $('#penilaian_kontruksi_update16').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_update16').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_update16").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_update1 = $('#penilaian_kontruksi_update16').val();
                if (penilaian_kontruksi_update1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_update16').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi_update16').css('border-color', 'green');
                    $('#penilaian_kontruksi_update16').val(penilaian_kontruksi_update1);

                }

            };

        }
    });
    $('#penilaian_kontruksi_update17').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_update17').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_update17").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_update1 = $('#penilaian_kontruksi_update17').val();
                if (penilaian_kontruksi_update1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_update17').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi_update17').css('border-color', 'green');
                    $('#penilaian_kontruksi_update17').val(penilaian_kontruksi_update1);

                }

            };

        }
    });
</script>


<!-- INI UNTUK VALIDASI ANGKANYA Bagian tambah-->
<script>
    function message(icon, text) {
        swal({
            title: "Maaf Tidak Boleh Huruf Yaa !!!",
            text: text,
            icon: icon,
        });
    }

    function message_gak_boleh_lebih_angkanya(icon, text) {
        swal({
            title: "Maaf Angka Penilaian Tidak Boleh Lebih Dari 100 Yaa !!!",
            text: text,
            icon: icon,
        });
    }
    $('#penilaian_kontruksi1').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi1').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi1").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi1 = $('#penilaian_kontruksi1').val();
                if (penilaian_kontruksi1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi1').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi1').css('border-color', 'green');
                    $('#penilaian_kontruksi1').val(penilaian_kontruksi1);

                }

            };

        }
    });
    $('#penilaian_kontruksi2').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi2').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi2").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi2 = $('#penilaian_kontruksi2').val();
                if (penilaian_kontruksi2.match(validasiHuruf)) {
                    $('#penilaian_kontruksi2').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi2').css('border-color', 'green');
                    $('#penilaian_kontruksi2').val(penilaian_kontruksi2);

                }

            };

        }
    });
    $('#penilaian_kontruksi2').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi2').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi2").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi2 = $('#penilaian_kontruksi2').val();
                if (penilaian_kontruksi2.match(validasiHuruf)) {
                    $('#penilaian_kontruksi2').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi2').css('border-color', 'green');
                    $('#penilaian_kontruksi2').val(penilaian_kontruksi2);

                }

            };

        }
    });
    $('#penilaian_kontruksi3').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi3').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi3").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi3 = $('#penilaian_kontruksi3').val();
                if (penilaian_kontruksi3.match(validasiHuruf)) {
                    $('#penilaian_kontruksi3').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi3').css('border-color', 'green');
                    $('#penilaian_kontruksi3').val(penilaian_kontruksi3);

                }

            };

        }
    });
    $('#penilaian_kontruksi4').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi4').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi4").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi4 = $('#penilaian_kontruksi2').val();
                if (penilaian_kontruksi4.match(validasiHuruf)) {
                    $('#penilaian_kontruksi4').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi4').css('border-color', 'green');
                    $('#penilaian_kontruksi4').val(penilaian_kontruksi4);

                }

            };

        }
    });
    $('#penilaian_kontruksi5').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi5').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi5").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi5 = $('#penilaian_kontruksi2').val();
                if (penilaian_kontruksi5.match(validasiHuruf)) {
                    $('#penilaian_kontruksi5').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi5').css('border-color', 'green');
                    $('#penilaian_kontruksi5').val(penilaian_kontruksi5);

                }

            };

        }
    });
    $('#penilaian_kontruksi6').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi6').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi6").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi6 = $('#penilaian_kontruksi6').val();
                if (penilaian_kontruksi6.match(validasiHuruf)) {
                    $('#penilaian_kontruksi6').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi6').css('border-color', 'green');
                    $('#penilaian_kontruksi6').val(penilaian_kontruksi6);

                }

            };

        }
    });
    $('#penilaian_kontruksi7').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi7').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi7").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi7 = $('#penilaian_kontruksi7').val();
                if (penilaian_kontruksi7.match(validasiHuruf)) {
                    $('#penilaian_kontruksi7').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi7').css('border-color', 'green');
                    $('#penilaian_kontruksi7').val(penilaian_kontruksi7);

                }

            };

        }
    });
    $('#penilaian_kontruksi8').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi8').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi8").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi8 = $('#penilaian_kontruksi8').val();
                if (penilaian_kontruksi8.match(validasiHuruf)) {
                    $('#penilaian_kontruksi8').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi8').css('border-color', 'green');
                    $('#penilaian_kontruksi8').val(penilaian_kontruksi8);

                }

            };

        }
    });
    $('#penilaian_kontruksi9').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi9').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi9").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi9 = $('#penilaian_kontruksi9').val();
                if (penilaian_kontruksi9.match(validasiHuruf)) {
                    $('#penilaian_kontruksi9').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi9').css('border-color', 'green');
                    $('#penilaian_kontruksi9').val(penilaian_kontruksi9);

                }

            };

        }
    });
    $('#penilaian_kontruksi10').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi10').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi10").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi10 = $('#penilaian_kontruksi10').val();
                if (penilaian_kontruksi10.match(validasiHuruf)) {
                    $('#penilaian_kontruksi10').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi10').css('border-color', 'green');
                    $('#penilaian_kontruksi10').val(penilaian_kontruksi10);

                }

            };

        }
    });
    $('#penilaian_kontruksi11').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi11').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi11").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi11 = $('#penilaian_kontruksi11').val();
                if (penilaian_kontruksi11.match(validasiHuruf)) {
                    $('#penilaian_kontruksi11').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi11').css('border-color', 'green');
                    $('#penilaian_kontruksi11').val(penilaian_kontruksi11);

                }

            };

        }
    });
    $('#penilaian_kontruksi12').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi12').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi12").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi12 = $('#penilaian_kontruksi12').val();
                if (penilaian_kontruksi12.match(validasiHuruf)) {
                    $('#penilaian_kontruksi12').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi12').css('border-color', 'green');
                    $('#penilaian_kontruksi12').val(penilaian_kontruksi12);

                }

            };

        }
    });
    $('#penilaian_kontruksi13').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi13').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi13").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi13 = $('#penilaian_kontruksi13').val();
                if (penilaian_kontruksi13.match(validasiHuruf)) {
                    $('#penilaian_kontruksi13').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi13').css('border-color', 'green');
                    $('#penilaian_kontruksi13').val(penilaian_kontruksi13);

                }

            };

        }
    });
    $('#penilaian_kontruksi14').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi14').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi14").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi14 = $('#penilaian_kontruksi14').val();
                if (penilaian_kontruksi14.match(validasiHuruf)) {
                    $('#penilaian_kontruksi14').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi14').css('border-color', 'green');
                    $('#penilaian_kontruksi14').val(penilaian_kontruksi14);

                }

            };

        }
    });
    $('#penilaian_kontruksi15').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi15').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi15").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi15 = $('#penilaian_kontruksi15').val();
                if (penilaian_kontruksi15.match(validasiHuruf)) {
                    $('#penilaian_kontruksi15').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi15').css('border-color', 'green');
                    $('#penilaian_kontruksi15').val(penilaian_kontruksi15);

                }

            };

        }
    });
    $('#penilaian_kontruksi16').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi16').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi16").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi16 = $('#penilaian_kontruksi16').val();
                if (penilaian_kontruksi16.match(validasiHuruf)) {
                    $('#penilaian_kontruksi16').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi16').css('border-color', 'green');
                    $('#penilaian_kontruksi16').val(penilaian_kontruksi16);

                }

            };

        }
    });
    $('#penilaian_kontruksi17').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi17').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi17").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi17 = $('#penilaian_kontruksi17').val();
                if (penilaian_kontruksi17.match(validasiHuruf)) {
                    $('#penilaian_kontruksi17').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kontruksi17').css('border-color', 'green');
                    $('#penilaian_kontruksi17').val(penilaian_kontruksi17);

                }

            };

        }
    });
</script>


<!-- ININ UNTUK VALIDASI BUTTON dan nilaik akhir TAMBAH -->
<!-- keyup nilai pekerjaan kontruksi -->

<script>
    $(document).ready(function() {
        $("#penilaian_kontruksi1, #penilaian_kontruksi2, #penilaian_kontruksi3, #penilaian_kontruksi4,#penilaian_kontruksi5,#penilaian_kontruksi6,#penilaian_kontruksi7,#penilaian_kontruksi8,#penilaian_kontruksi9,#penilaian_kontruksi10,#penilaian_kontruksi11,#penilaian_kontruksi12,#penilaian_kontruksi13,#penilaian_kontruksi14,#penilaian_kontruksi15,#penilaian_kontruksi16,#penilaian_kontruksi17").keyup(function() {
            // 1
            var bobot_pekerjaan_kontruksi1 = $('#bobot_pekerjaan_kontruksi1').val();
            var penilaian_kontruksi1 = $('#penilaian_kontruksi1').val();
            var nilai_akhir_kontruksi1 = bobot_pekerjaan_kontruksi1 * penilaian_kontruksi1 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek1').val(parseFloat(nilai_akhir_kontruksi1));
            // 2
            var bobot_pekerjaan_kontruksi2 = $('#bobot_pekerjaan_kontruksi2').val();
            var penilaian_kontruksi2 = $('#penilaian_kontruksi2').val();
            var nilai_akhir_kontruksi2 = bobot_pekerjaan_kontruksi2 * penilaian_kontruksi2 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek2').val(parseFloat(nilai_akhir_kontruksi2));
            // 3
            var bobot_pekerjaan_kontruksi3 = $('#bobot_pekerjaan_kontruksi3').val();
            var penilaian_kontruksi3 = $('#penilaian_kontruksi3').val();
            var nilai_akhir_kontruksi3 = bobot_pekerjaan_kontruksi3 * penilaian_kontruksi3 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek3').val(parseFloat(nilai_akhir_kontruksi3));
            // 4
            var bobot_pekerjaan_kontruksi4 = $('#bobot_pekerjaan_kontruksi4').val();
            var penilaian_kontruksi4 = $('#penilaian_kontruksi4').val();
            var nilai_akhir_kontruksi4 = bobot_pekerjaan_kontruksi4 * penilaian_kontruksi4 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek4').val(parseFloat(nilai_akhir_kontruksi4));
            // 5
            var bobot_pekerjaan_kontruksi5 = $('#bobot_pekerjaan_kontruksi5').val();
            var penilaian_kontruksi5 = $('#penilaian_kontruksi5').val();
            var nilai_akhir_kontruksi5 = bobot_pekerjaan_kontruksi5 * penilaian_kontruksi5 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek5').val(parseFloat(nilai_akhir_kontruksi5));
            // 6
            var bobot_pekerjaan_kontruksi6 = $('#bobot_pekerjaan_kontruksi6').val();
            var penilaian_kontruksi6 = $('#penilaian_kontruksi6').val();
            var nilai_akhir_kontruksi6 = bobot_pekerjaan_kontruksi6 * penilaian_kontruksi6 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek6').val(parseFloat(nilai_akhir_kontruksi6));
            // 7
            var bobot_pekerjaan_kontruksi7 = $('#bobot_pekerjaan_kontruksi7').val();
            var penilaian_kontruksi7 = $('#penilaian_kontruksi7').val();
            var nilai_akhir_kontruksi7 = bobot_pekerjaan_kontruksi7 * penilaian_kontruksi7 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek7').val(parseFloat(nilai_akhir_kontruksi7));
            // 8
            var bobot_pekerjaan_kontruksi8 = $('#bobot_pekerjaan_kontruksi8').val();
            var penilaian_kontruksi8 = $('#penilaian_kontruksi8').val();
            var nilai_akhir_kontruksi8 = bobot_pekerjaan_kontruksi8 * penilaian_kontruksi8 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek8').val(parseFloat(nilai_akhir_kontruksi8));
            // 9
            var bobot_pekerjaan_kontruksi9 = $('#bobot_pekerjaan_kontruksi9').val();
            var penilaian_kontruksi9 = $('#penilaian_kontruksi9').val();
            var nilai_akhir_kontruksi9 = bobot_pekerjaan_kontruksi9 * penilaian_kontruksi9 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek9').val(parseFloat(nilai_akhir_kontruksi9));
            // 10
            var bobot_pekerjaan_kontruksi10 = $('#bobot_pekerjaan_kontruksi10').val();
            var penilaian_kontruksi10 = $('#penilaian_kontruksi10').val();
            var nilai_akhir_kontruksi10 = bobot_pekerjaan_kontruksi10 * penilaian_kontruksi10 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek10').val(parseFloat(nilai_akhir_kontruksi10));
            // 11
            var bobot_pekerjaan_kontruksi11 = $('#bobot_pekerjaan_kontruksi11').val();
            var penilaian_kontruksi11 = $('#penilaian_kontruksi11').val();
            var nilai_akhir_kontruksi11 = bobot_pekerjaan_kontruksi11 * penilaian_kontruksi11 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek11').val(parseFloat(nilai_akhir_kontruksi11));
            // 12
            var bobot_pekerjaan_kontruksi12 = $('#bobot_pekerjaan_kontruksi12').val();
            var penilaian_kontruksi12 = $('#penilaian_kontruksi12').val();
            var nilai_akhir_kontruksi12 = bobot_pekerjaan_kontruksi12 * penilaian_kontruksi12 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek12').val(parseFloat(nilai_akhir_kontruksi12));
            // 13
            var bobot_pekerjaan_kontruksi13 = $('#bobot_pekerjaan_kontruksi13').val();
            var penilaian_kontruksi13 = $('#penilaian_kontruksi13').val();
            var nilai_akhir_kontruksi13 = bobot_pekerjaan_kontruksi13 * penilaian_kontruksi13 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek13').val(parseFloat(nilai_akhir_kontruksi13));
            // 14
            var bobot_pekerjaan_kontruksi14 = $('#bobot_pekerjaan_kontruksi14').val();
            var penilaian_kontruksi14 = $('#penilaian_kontruksi14').val();
            var nilai_akhir_kontruksi14 = bobot_pekerjaan_kontruksi14 * penilaian_kontruksi14 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek14').val(parseFloat(nilai_akhir_kontruksi14));
            // 15
            var bobot_pekerjaan_kontruksi15 = $('#bobot_pekerjaan_kontruksi15').val();
            var penilaian_kontruksi15 = $('#penilaian_kontruksi15').val();
            var nilai_akhir_kontruksi15 = bobot_pekerjaan_kontruksi15 * penilaian_kontruksi15 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek15').val(parseFloat(nilai_akhir_kontruksi15));
            // 16
            var bobot_pekerjaan_kontruksi16 = $('#bobot_pekerjaan_kontruksi16').val();
            var penilaian_kontruksi16 = $('#penilaian_kontruksi16').val();
            var nilai_akhir_kontruksi16 = bobot_pekerjaan_kontruksi16 * penilaian_kontruksi16 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek16').val(parseFloat(nilai_akhir_kontruksi16));
            // 17
            var bobot_pekerjaan_kontruksi17 = $('#bobot_pekerjaan_kontruksi17').val();
            var penilaian_kontruksi17 = $('#penilaian_kontruksi17').val();
            var nilai_akhir_kontruksi17 = bobot_pekerjaan_kontruksi17 * penilaian_kontruksi17 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek17').val(parseFloat(nilai_akhir_kontruksi17));

            var total = parseFloat(nilai_akhir_kontruksi1) + parseFloat(nilai_akhir_kontruksi2) + parseFloat(nilai_akhir_kontruksi3) + parseFloat(nilai_akhir_kontruksi4) + parseFloat(nilai_akhir_kontruksi5) + parseFloat(nilai_akhir_kontruksi6) + parseFloat(nilai_akhir_kontruksi7) + parseFloat(nilai_akhir_kontruksi8) + parseFloat(nilai_akhir_kontruksi9) + parseFloat(nilai_akhir_kontruksi10) + parseFloat(nilai_akhir_kontruksi11) + parseFloat(nilai_akhir_kontruksi12) + parseFloat(nilai_akhir_kontruksi13) + parseFloat(nilai_akhir_kontruksi14) + parseFloat(nilai_akhir_kontruksi15) + parseFloat(nilai_akhir_kontruksi16) + parseFloat(nilai_akhir_kontruksi17);
            var total_button = $("#total_nilai_pekerjaan_kontruksi").val(total);
            if (total <= 50) {
                $('[name="rating_penilaian_vendor_pekerjaan_kontruksi"]').val(4);
                $('[name="status_rating_pekerjaan_kontruksi"]').val('sangat kurang');
                $('[name="status_nilai_akhir_pekerjaan_kontruksi"]').val(total);
                $('#status_pekerjaan_kontruksi').html('<label for="" class="badge badge-danger">Kurang Baik</label>');
                $('#warning_button').show();
                $('#save_button').hide();
                $('#bintang_pekerjaan_kontruksi').html('');
            } else if (total <= 70) {
                $('[name="rating_penilaian_vendor_pekerjaan_kontruksi"]').val(1);
                $('[name="status_rating_pekerjaan_kontruksi"]').val('cukup baik');
                $('[name="status_nilai_akhir_pekerjaan_kontruksi"]').val(total);
                $('#save_button').show();
                $('#warning_button').hide();
                $('#status_pekerjaan_kontruksi').html('<label for="" class="badge badge-warning">Cukup Baik</label>');
                $('#bintang_pekerjaan_kontruksi').html('<i class="fas fa fa-star text-warning"></i>');
            } else if (total <= 80) {
                $('[name="rating_penilaian_vendor_pekerjaan_kontruksi"]').val(2);
                $('[name="status_rating_pekerjaan_kontruksi"]').val('baik');
                $('[name="status_nilai_akhir_pekerjaan_kontruksi"]').val(total);
                $('#save_button').show();
                $('#warning_button').hide();
                $('#status_pekerjaan_kontruksi').html('<label for="" class="badge badge-warning">Baik</label>');
                $('#bintang_pekerjaan_kontruksi').html('<i class="fas fa fa-star text-warning"></i><i class="fas fa fa-star text-warning"></i>');
            } else {
                $('[name="rating_penilaian_vendor_pekerjaan_kontruksi"]').val(3);
                $('[name="status_rating_pekerjaan_kontruksi"]').val('sangat baik');
                $('[name="status_nilai_akhir_pekerjaan_kontruksi"]').val(total);
                $('#save_button').show();
                $('#warning_button').hide();
                $('#status_pekerjaan_kontruksi').html('<label for="" class="badge badge-success">Sangat Baik</label>');
                $('#bintang_pekerjaan_kontruksi').html('<i class="fas fa fa-star text-warning"></i><i class="fas fa fa-star text-warning"></i><i class="fas fa fa-star text-warning"></i>');
            }

        });
    });
</script>
<!-- INI UNTUK UPDATENYA -->
<script>
    function message2(icon, text) {
        swal({
            title: "Good Jobs!!!",
            text: text,
            icon: icon,
        });
    }
    var form_tambah_pekerjaan_kontruksi = $('#form_tambah_pekerjaan_kontruksi');

    function Update_pekerjaan_kontruksi() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('beranda/update_pekerjaan_kontruksisaya') ?>',
            data: form_tambah_pekerjaan_kontruksi.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message2('success', 'Penilaian Berhasil Di Update!!');
                    location.reload();
                }
            },
        })
    }
    var form_tambah_pekerjaan_kontruksi_awrningku = $('#form_tambah_pekerjaan_kontruksi');

    function Update_warning_pekerjaan_kontruksi() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('beranda/Update_warning_pekerjaan_kontruksi') ?>',
            data: form_tambah_pekerjaan_kontruksi_awrningku.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message2('success', 'Penilaian Berhasil Di Update!!');
                    location.reload();
                }
            },
        })
    }
</script>



<!-- ININ UNTUK VALIDASI BUTTON dan nilaik akhir Update -->
<!-- keyup nilai pekerjaan kontruksi -->
<!-- <script>
    $(document).ready(function() {
        $("#penilaian_kontruksi_update1, #penilaian_kontruksi_update2, #penilaian_kontruksi_update3, #penilaian_kontruksi_update4,#penilaian_kontruksi_update5,#penilaian_kontruksi_update6,#penilaian_kontruksi_update7,#penilaian_kontruksi_update8,#penilaian_kontruksi_update9,#penilaian_kontruksi_update10,#penilaian_kontruksi_update11,#penilaian_kontruksi_update12,#penilaian_kontruksi_update13,#penilaian_kontruksi_update14,#penilaian_kontruksi_update15,#penilaian_kontruksi_update16,#penilaian_kontruksi_update17").keyup(function() {
            // 1
            var bobot_pekerjaan_kontruksi1 = $('#bobot_pekerjaan_kontruksi_update1').val();
            var penilaian_kontruksi1 = $('#penilaian_kontruksi_update1').val();
            var nilai_akhir_kontruksi1 = bobot_pekerjaan_kontruksi1 * penilaian_kontruksi1 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek_update1').val(parseFloat(nilai_akhir_kontruksi1));
            // 2
            var bobot_pekerjaan_kontruksi2 = $('#bobot_pekerjaan_kontruksi_update2').val();
            var penilaian_kontruksi2 = $('#penilaian_kontruksi_update2').val();
            var nilai_akhir_kontruksi2 = bobot_pekerjaan_kontruksi2 * penilaian_kontruksi2 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek_update2').val(parseFloat(nilai_akhir_kontruksi2));
            // 3
            var bobot_pekerjaan_kontruksi3 = $('#bobot_pekerjaan_kontruksi_update3').val();
            var penilaian_kontruksi3 = $('#penilaian_kontruksi_update3').val();
            var nilai_akhir_kontruksi3 = bobot_pekerjaan_kontruksi3 * penilaian_kontruksi3 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek_update3').val(parseFloat(nilai_akhir_kontruksi3));
            // 4
            var bobot_pekerjaan_kontruksi4 = $('#bobot_pekerjaan_kontruksi_update4').val();
            var penilaian_kontruksi4 = $('#penilaian_kontruksi_update4').val();
            var nilai_akhir_kontruksi4 = bobot_pekerjaan_kontruksi4 * penilaian_kontruksi4 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek_update4').val(parseFloat(nilai_akhir_kontruksi4));
            // 5
            var bobot_pekerjaan_kontruksi5 = $('#bobot_pekerjaan_kontruksi_update5').val();
            var penilaian_kontruksi5 = $('#penilaian_kontruksi_update5').val();
            var nilai_akhir_kontruksi5 = bobot_pekerjaan_kontruksi5 * penilaian_kontruksi5 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek_update5').val(parseFloat(nilai_akhir_kontruksi5));
            // 6
            var bobot_pekerjaan_kontruksi6 = $('#bobot_pekerjaan_kontruksi_update6').val();
            var penilaian_kontruksi6 = $('#penilaian_kontruksi_update6').val();
            var nilai_akhir_kontruksi6 = bobot_pekerjaan_kontruksi6 * penilaian_kontruksi6 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek_update6').val(parseFloat(nilai_akhir_kontruksi6));
            // 7
            var bobot_pekerjaan_kontruksi7 = $('#bobot_pekerjaan_kontruksi_update7').val();
            var penilaian_kontruksi7 = $('#penilaian_kontruksi_update7').val();
            var nilai_akhir_kontruksi7 = bobot_pekerjaan_kontruksi7 * penilaian_kontruksi7 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek_update7').val(parseFloat(nilai_akhir_kontruksi7));
            // 8
            var bobot_pekerjaan_kontruksi8 = $('#bobot_pekerjaan_kontruksi_update8').val();
            var penilaian_kontruksi8 = $('#penilaian_kontruksi_update8').val();
            var nilai_akhir_kontruksi8 = bobot_pekerjaan_kontruksi8 * penilaian_kontruksi8 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek_update8').val(parseFloat(nilai_akhir_kontruksi8));
            // 9
            var bobot_pekerjaan_kontruksi9 = $('#bobot_pekerjaan_kontruksi_update9').val();
            var penilaian_kontruksi9 = $('#penilaian_kontruksi_update9').val();
            var nilai_akhir_kontruksi9 = bobot_pekerjaan_kontruksi9 * penilaian_kontruksi9 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek_update9').val(parseFloat(nilai_akhir_kontruksi9));
            // 10
            var bobot_pekerjaan_kontruksi10 = $('#bobot_pekerjaan_kontruksi_update10').val();
            var penilaian_kontruksi10 = $('#penilaian_kontruksi_update10').val();
            var nilai_akhir_kontruksi10 = bobot_pekerjaan_kontruksi10 * penilaian_kontruksi10 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek_update10').val(parseFloat(nilai_akhir_kontruksi10));
            // 11
            var bobot_pekerjaan_kontruksi11 = $('#bobot_pekerjaan_kontruksi_update11').val();
            var penilaian_kontruksi11 = $('#penilaian_kontruksi_update11').val();
            var nilai_akhir_kontruksi11 = bobot_pekerjaan_kontruksi11 * penilaian_kontruksi11 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek_update11').val(parseFloat(nilai_akhir_kontruksi11));
            // 12
            var bobot_pekerjaan_kontruksi12 = $('#bobot_pekerjaan_kontruksi_update12').val();
            var penilaian_kontruksi12 = $('#penilaian_kontruksi_update12').val();
            var nilai_akhir_kontruksi12 = bobot_pekerjaan_kontruksi12 * penilaian_kontruksi12 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek_update12').val(parseFloat(nilai_akhir_kontruksi12));
            // 13
            var bobot_pekerjaan_kontruksi13 = $('#bobot_pekerjaan_kontruksi_update13').val();
            var penilaian_kontruksi13 = $('#penilaian_kontruksi_update13').val();
            var nilai_akhir_kontruksi13 = bobot_pekerjaan_kontruksi13 * penilaian_kontruksi13 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek_update13').val(parseFloat(nilai_akhir_kontruksi13));
            // 14
            var bobot_pekerjaan_kontruksi14 = $('#bobot_pekerjaan_kontruksi_update14').val();
            var penilaian_kontruksi14 = $('#penilaian_kontruksi_update14').val();
            var nilai_akhir_kontruksi14 = bobot_pekerjaan_kontruksi14 * penilaian_kontruksi14 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek_update14').val(parseFloat(nilai_akhir_kontruksi14));
            // 15
            var bobot_pekerjaan_kontruksi15 = $('#bobot_pekerjaan_kontruksi_update15').val();
            var penilaian_kontruksi15 = $('#penilaian_kontruksi_update15').val();
            var nilai_akhir_kontruksi15 = bobot_pekerjaan_kontruksi15 * penilaian_kontruksi15 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek_update15').val(parseFloat(nilai_akhir_kontruksi15));
            // 16
            var bobot_pekerjaan_kontruksi16 = $('#bobot_pekerjaan_kontruksi_update16').val();
            var penilaian_kontruksi16 = $('#penilaian_kontruksi_update16').val();
            var nilai_akhir_kontruksi16 = bobot_pekerjaan_kontruksi16 * penilaian_kontruksi16 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek_update16').val(parseFloat(nilai_akhir_kontruksi16));
            // 17
            var bobot_pekerjaan_kontruksi17 = $('#bobot_pekerjaan_kontruksi_update17').val();
            var penilaian_kontruksi17 = $('#penilaian_kontruksi_update17').val();
            var nilai_akhir_kontruksi17 = bobot_pekerjaan_kontruksi17 * penilaian_kontruksi17 / 100;
            $('#nilai_akhir_pekerjaan_kontruksi_aspek_update17').val(parseFloat(nilai_akhir_kontruksi17));

            var total = parseFloat(nilai_akhir_kontruksi1) + parseFloat(nilai_akhir_kontruksi2) + parseFloat(nilai_akhir_kontruksi3) + parseFloat(nilai_akhir_kontruksi4) + parseFloat(nilai_akhir_kontruksi5) + parseFloat(nilai_akhir_kontruksi6) + parseFloat(nilai_akhir_kontruksi7) + parseFloat(nilai_akhir_kontruksi8) + parseFloat(nilai_akhir_kontruksi9) + parseFloat(nilai_akhir_kontruksi10) + parseFloat(nilai_akhir_kontruksi11) + parseFloat(nilai_akhir_kontruksi12) + parseFloat(nilai_akhir_kontruksi13) + parseFloat(nilai_akhir_kontruksi14) + parseFloat(nilai_akhir_kontruksi15) + parseFloat(nilai_akhir_kontruksi16) + parseFloat(nilai_akhir_kontruksi17);
            var total_button = $("#total_nilai_pekerjaan_kontruksi_update").val(total);
            if (total <= 51) {
                $('[name="rating_penilaian_vendor_pekerjaan_kontruksi_update"]').val(4);
                $('[name="status_nilai_akhir_pekerjaan_kontruksi_update"]').val(total);
                $('[name="status_rating_pekerjaan_kontruksi_update"]').val('kurang baik');
                $('#status_pekerjaan_kontruksi_update').html('<label for="" class="badge badge-danger">Kurang Baik</label>');
                $('#warning_button_update').show();
                $('#save_button_update').hide();
                $('#bintang_pekerjaan_kontruksi_update').html('');
            } else if (total <= 70) {
                $('[name="rating_penilaian_vendor_pekerjaan_kontruksi_update"]').val(1);
                $('[name="status_nilai_akhir_pekerjaan_kontruksi_update"]').val(total);
                $('[name="status_rating_pekerjaan_kontruksi_update"]').val('cukup baik');
                $('#save_button_update').show();
                $('#warning_button_update').hide();
                $('#status_pekerjaan_kontruksi_update').html('<label for="" class="badge badge-warning">Cukup Baik</label>');
                $('#bintang_pekerjaan_kontruksi_update').html('<i class="fas fa fa-star text-warning"></i>');
            } else if (total <= 80) {
                $('[name="rating_penilaian_vendor_pekerjaan_kontruksi_update"]').val(2);
                $('[name="status_nilai_akhir_pekerjaan_kontruksi_update"]').val(total);
                $('[name="status_rating_pekerjaan_kontruksi_update"]').val('baik');
                $('#save_button_update').show();
                $('#warning_button_update').hide();
                $('#status_pekerjaan_kontruksi_update').html('<label for="" class="badge badge-warning">Baik</label>');
                $('#bintang_pekerjaan_kontruksi_update').html('<i class="fas fa fa-star text-warning"></i><i class="fas fa fa-star text-warning"></i>');
            } else {
                $('[name="rating_penilaian_vendor_pekerjaan_kontruksi_update"]').val(3);
                $('[name="status_nilai_akhir_pekerjaan_kontruksi_update"]').val(total);
                $('[name="status_rating_pekerjaan_kontruksi_update"]').val('sangat baik');
                $('#save_button_update').show();
                $('#warning_button_update').hide();
                $('#status_pekerjaan_kontruksi_update').html('<label for="" class="badge badge-success">Sangat Baik</label>');
                $('#bintang_pekerjaan_kontruksi_update').html('<i class="fas fa fa-star text-warning"></i><i class="fas fa fa-star text-warning"></i><i class="fas fa fa-star text-warning"></i>');
            }

        });
    });
</script> -->

<!-- INI BATAS PENILAIAN KONTRUKSI ===================================================================================================================================== -->







<!-- INI BATAS PENILAIAN KONSULTAN KONTRUKSI ===================================================================================================================================== -->

<!-- AJAX BARUUU TAMBAH REVISI -->
<script>
    function message3(icon, text) {
        swal({
            title: "Good Jobs!!!",
            text: text,
            icon: icon,
        });
    }

    function message5(icon, text) {
        swal({
            title: "Anda Berhasil Mereset Nilai!!!",
            text: text,
            icon: icon,
        });
    }
    var form_tambah_pekerjaan_konsultan_kontruksi = $('#form_tambah_pekerjaan_konsultan_kontruksi');

    function Simpan_pekerjaan_konsultan_kontruksi() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('beranda/tambah_pekerjaan_konsultan_kontruksisaya') ?>',
            data: form_tambah_pekerjaan_konsultan_kontruksi.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message3('success', 'Penilaian Berhasil Di Buat!!');
                    location.reload();
                }
            },
        })
    }

    var form_tambah_pekerjaan_konsultan_kontruksi = $('#form_tambah_pekerjaan_konsultan_kontruksi');

    function Simpan_Warning_pekerjaan_konsultan_kontruksi_warning() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('beranda/tambah_warning_pekerjaan_konsultan_kontruksisaya') ?>',
            data: form_tambah_pekerjaan_konsultan_kontruksi.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $("#kirim_ke_vendor").css('display', 'block');
            },
            success: function(response) {
                $("#kirim_ke_vendor").css('display', 'none');
                window.open('https://api.whatsapp.com/send?phone=+62' + response['telpon'] + '&text=Laporan Penilaian Kinerja Vendor Nama Paket  : ' + response['paket'].nama_paket + ' Dengan Metode Pemilihan : ' + response['paket'].nama_metode_pemilihan + '  Agency : ' + response['paket'].nama_unit_kerja + ', Info : ' + response['isi'] + '', '_blank');
                message3('success', 'Penilaian Berhasil Di Buat');
                location.reload();
            },
        })
    }

    var form_tambah_pekerjaan_konsultan_kontruksi_reset = $('#form_tambah_pekerjaan_konsultan_kontruksi');

    function Reset_nilai_pekerjaan_konsultan_kontruksi() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('beranda/reset_penilaian_performance_pekerjaan_konsultan_kontruksi') ?>',
            data: form_tambah_pekerjaan_konsultan_kontruksi_reset.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $("#kirim_ke_vendor").css('display', 'block');
            },
            success: function(response) {
                $("#kirim_ke_vendor").css('display', 'none');
                window.open('https://api.whatsapp.com/send?phone=+62' + response['telpon'] + '&text=Laporan Penilaian Kinerja Vendor Nama Paket  : ' + response['paket'].nama_paket + ' Dengan Metode Pemilihan : ' + response['paket'].nama_metode_pemilihan + '  Agency : ' + response['paket'].nama_unit_kerja + ', Info : ' + response['isi'] + '', '_blank');
                message5('success', 'Penilaian Berhasil Di Reset');
                location.reload();
            },
        })
    }
</script>
<!-- INI UNTUK UPDATENYA -->
<script>
    function message3(icon, text) {
        swal({
            title: "Good Jobs!!!",
            text: text,
            icon: icon,
        });
    }
    var form_tambah_pekerjaan_konsultan_kontruksi = $('#form_tambah_pekerjaan_konsultan_kontruksi');

    function Update_pekerjaan_konsultan_kontruksi() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('beranda/update_pekerjaan_konsultan_kontruksisaya') ?>',
            data: form_tambah_pekerjaan_konsultan_kontruksi.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message3('success', 'Penilaian Berhasil Di Update!!');
                    location.reload();
                }
            },
        })
    }
</script>


<!-- INI UNTUK VALIDASI ANGKANYA Bagian UPDATE-->
<script>
    function message(icon, text) {
        swal({
            title: "Maaf Tidak Boleh Huruf Yaa !!!",
            text: text,
            icon: icon,
        });
    }

    function message_gak_boleh_lebih_angkanya(icon, text) {
        swal({
            title: "Maaf Angka Penilaian Tidak Boleh Lebih Dari 100 Yaa !!!",
            text: text,
            icon: icon,
        });
    }
    $('#penilaian_konsultan_kontruksi_update1').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_kontruksi_update1').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_kontruksi_update1").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_kontruksi_update1 = $('#penilaian_konsultan_kontruksi_update1').val();
                if (penilaian_konsultan_kontruksi_update1.match(validasiHuruf)) {
                    $('#penilaian_konsultan_kontruksi_update1').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_kontruksi_update1').css('border-color', 'green');
                    $('#penilaian_konsultan_kontruksi_update1').val(penilaian_konsultan_kontruksi_update1);

                }

            };

        }
    });
    $('#penilaian_konsultan_kontruksi_update2').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_kontruksi_update2').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_kontruksi_update2").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_kontruksi_update2 = $('#penilaian_konsultan_kontruksi_update2').val();
                if (penilaian_konsultan_kontruksi_update2.match(validasiHuruf)) {
                    $('#penilaian_konsultan_kontruksi_update2').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_kontruksi_update2').css('border-color', 'green');
                    $('#penilaian_konsultan_kontruksi_update2').val(penilaian_konsultan_kontruksi_update2);

                }

            };

        }
    });

    $('#penilaian_konsultan_kontruksi_update3').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_kontruksi_update3').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_kontruksi_update3").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_kontruksi_update3 = $('#penilaian_konsultan_kontruksi_update3').val();
                if (penilaian_konsultan_kontruksi_update3.match(validasiHuruf)) {
                    $('#penilaian_konsultan_kontruksi_update3').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_kontruksi_update3').css('border-color', 'green');
                    $('#penilaian_konsultan_kontruksi_update3').val(penilaian_konsultan_kontruksi_update3);

                }

            };

        }
    });
    $('#penilaian_konsultan_kontruksi_update4').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_kontruksi_update4').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_kontruksi_update4").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_kontruksi_update4 = $('#penilaian_konsultan_kontruksi_update4').val();
                if (penilaian_konsultan_kontruksi_update4.match(validasiHuruf)) {
                    $('#penilaian_konsultan_kontruksi_update4').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_kontruksi_update4').css('border-color', 'green');
                    $('#penilaian_konsultan_kontruksi_update4').val(penilaian_konsultan_kontruksi_update4);

                }

            };

        }
    });
    $('#penilaian_konsultan_kontruksi_update5').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_kontruksi_update5').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_kontruksi_update5").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_kontruksi_update5 = $('#penilaian_konsultan_kontruksi_update5').val();
                if (penilaian_konsultan_kontruksi_update5.match(validasiHuruf)) {
                    $('#penilaian_konsultan_kontruksi_update5').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_kontruksi_update5').css('border-color', 'green');
                    $('#penilaian_konsultan_kontruksi_update5').val(penilaian_konsultan_kontruksi_update5);

                }

            };

        }
    });
    $('#penilaian_konsultan_kontruksi_update6').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_kontruksi_update6').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_kontruksi_update6").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_kontruksi_update6 = $('#penilaian_konsultan_kontruksi_update6').val();
                if (penilaian_konsultan_kontruksi_update6.match(validasiHuruf)) {
                    $('#penilaian_konsultan_kontruksi_update6').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_kontruksi_update6').css('border-color', 'green');
                    $('#penilaian_konsultan_kontruksi_update6').val(penilaian_konsultan_kontruksi_update6);

                }

            };

        }
    });
    $('#penilaian_konsultan_kontruksi_update7').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_kontruksi_update7').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_kontruksi_update7").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_kontruksi_update7 = $('#penilaian_konsultan_kontruksi_update7').val();
                if (penilaian_konsultan_kontruksi_update7.match(validasiHuruf)) {
                    $('#penilaian_konsultan_kontruksi_update7').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_kontruksi_update7').css('border-color', 'green');
                    $('#penilaian_konsultan_kontruksi_update7').val(penilaian_konsultan_kontruksi_update7);

                }

            };

        }
    });
    $('#penilaian_konsultan_kontruksi_update8').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_kontruksi_update8').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_kontruksi_update8").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_kontruksi_update8 = $('#penilaian_konsultan_kontruksi_update8').val();
                if (penilaian_konsultan_kontruksi_update8.match(validasiHuruf)) {
                    $('#penilaian_konsultan_kontruksi_update8').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_kontruksi_update8').css('border-color', 'green');
                    $('#penilaian_konsultan_kontruksi_update8').val(penilaian_konsultan_kontruksi_update8);

                }

            };

        }
    });
    $('#penilaian_konsultan_kontruksi_update9').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_kontruksi_update9').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_kontruksi_update9").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_kontruksi_update9 = $('#penilaian_konsultan_kontruksi_update9').val();
                if (penilaian_konsultan_kontruksi_update9.match(validasiHuruf)) {
                    $('#penilaian_konsultan_kontruksi_update9').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_kontruksi_update9').css('border-color', 'green');
                    $('#penilaian_konsultan_kontruksi_update9').val(penilaian_konsultan_kontruksi_update9);

                }

            };

        }
    });
    $('#penilaian_konsultan_kontruksi_update10').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_kontruksi_update10').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_kontruksi_update10").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_kontruksi_update10 = $('#penilaian_konsultan_kontruksi_update10').val();
                if (penilaian_konsultan_kontruksi_update10.match(validasiHuruf)) {
                    $('#penilaian_konsultan_kontruksi_update10').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_kontruksi_update10').css('border-color', 'green');
                    $('#penilaian_konsultan_kontruksi_update10').val(penilaian_konsultan_kontruksi_update10);

                }

            };

        }
    });
    $('#penilaian_konsultan_kontruksi_update11').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_kontruksi_update11').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_kontruksi_update11").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_kontruksi_update11 = $('#penilaian_konsultan_kontruksi_update11').val();
                if (penilaian_konsultan_kontruksi_update11.match(validasiHuruf)) {
                    $('#penilaian_konsultan_kontruksi_update11').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_kontruksi_update11').css('border-color', 'green');
                    $('#penilaian_konsultan_kontruksi_update11').val(penilaian_konsultan_kontruksi_update11);

                }

            };

        }
    });
    $('#penilaian_konsultan_kontruksi_update12').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_kontruksi_update12').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_kontruksi_update12").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_kontruksi_update12 = $('#penilaian_konsultan_kontruksi_update12').val();
                if (penilaian_konsultan_kontruksi_update12.match(validasiHuruf)) {
                    $('#penilaian_konsultan_kontruksi_update12').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_kontruksi_update12').css('border-color', 'green');
                    $('#penilaian_konsultan_kontruksi_update12').val(penilaian_konsultan_kontruksi_update12);

                }

            };

        }
    });
    $('#penilaian_konsultan_kontruksi_update13').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_kontruksi_update13').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_kontruksi_update13").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_kontruksi_update13 = $('#penilaian_konsultan_kontruksi_update13').val();
                if (penilaian_konsultan_kontruksi_update13.match(validasiHuruf)) {
                    $('#penilaian_konsultan_kontruksi_update13').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_kontruksi_update13').css('border-color', 'green');
                    $('#penilaian_konsultan_kontruksi_update13').val(penilaian_konsultan_kontruksi_update13);

                }

            };

        }
    });
    $('#penilaian_konsultan_kontruksi_update14').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_kontruksi_update14').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_kontruksi_update14").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_kontruksi_update14 = $('#penilaian_konsultan_kontruksi_update14').val();
                if (penilaian_konsultan_kontruksi_update14.match(validasiHuruf)) {
                    $('#penilaian_konsultan_kontruksi_update14').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_kontruksi_update14').css('border-color', 'green');
                    $('#penilaian_konsultan_kontruksi_update14').val(penilaian_konsultan_kontruksi_update14);

                }

            };

        }
    });
    $('#penilaian_konsultan_kontruksi_update15').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_kontruksi_update15').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_kontruksi_update15").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_kontruksi_update15 = $('#penilaian_konsultan_kontruksi_update15').val();
                if (penilaian_konsultan_kontruksi_update15.match(validasiHuruf)) {
                    $('#penilaian_konsultan_kontruksi_update15').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_kontruksi_update15').css('border-color', 'green');
                    $('#penilaian_konsultan_kontruksi_update15').val(penilaian_konsultan_kontruksi_update15);

                }

            };

        }
    });
</script>


<!-- INI UNTUK VALIDASI ANGKANYA Bagian tambah-->
<script>
    function message(icon, text) {
        swal({
            title: "Maaf Tidak Boleh Huruf Yaa !!!",
            text: text,
            icon: icon,
        });
    }

    function message_gak_boleh_lebih_angkanya(icon, text) {
        swal({
            title: "Maaf Angka Penilaian Tidak Boleh Lebih Dari 100 Yaa !!!",
            text: text,
            icon: icon,
        });
    }
    $('#penilaian_konsultan_kontruksi1').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_kontruksi1').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_kontruksi1").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_kontruksi1 = $('#penilaian_konsultan_kontruksi1').val();
                if (penilaian_konsultan_kontruksi1.match(validasiHuruf)) {
                    $('#penilaian_konsultan_kontruksi1').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_kontruksi1').css('border-color', 'green');
                    $('#penilaian_konsultan_kontruksi1').val(penilaian_konsultan_kontruksi1);

                }

            };

        }
    });
    $('#penilaian_konsultan_kontruksi2').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_kontruksi2').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_kontruksi2").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_kontruksi2 = $('#penilaian_konsultan_kontruksi2').val();
                if (penilaian_konsultan_kontruksi2.match(validasiHuruf)) {
                    $('#penilaian_konsultan_kontruksi2').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_kontruksi2').css('border-color', 'green');
                    $('#penilaian_konsultan_kontruksi2').val(penilaian_konsultan_kontruksi2);

                }

            };

        }
    });

    $('#penilaian_konsultan_kontruksi3').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_kontruksi3').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_kontruksi3").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_kontruksi3 = $('#penilaian_konsultan_kontruksi3').val();
                if (penilaian_konsultan_kontruksi3.match(validasiHuruf)) {
                    $('#penilaian_konsultan_kontruksi3').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_kontruksi3').css('border-color', 'green');
                    $('#penilaian_konsultan_kontruksi3').val(penilaian_konsultan_kontruksi3);

                }

            };

        }
    });
    $('#penilaian_konsultan_kontruksi4').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_kontruksi4').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_kontruksi4").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_kontruksi4 = $('#penilaian_konsultan_kontruksi4').val();
                if (penilaian_konsultan_kontruksi4.match(validasiHuruf)) {
                    $('#penilaian_konsultan_kontruksi4').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_kontruksi4').css('border-color', 'green');
                    $('#penilaian_konsultan_kontruksi4').val(penilaian_konsultan_kontruksi4);

                }

            };

        }
    });
    $('#penilaian_konsultan_kontruksi5').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_kontruksi5').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_kontruksi5").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_kontruksi5 = $('#penilaian_konsultan_kontruksi5').val();
                if (penilaian_konsultan_kontruksi5.match(validasiHuruf)) {
                    $('#penilaian_konsultan_kontruksi5').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_kontruksi5').css('border-color', 'green');
                    $('#penilaian_konsultan_kontruksi5').val(penilaian_konsultan_kontruksi5);

                }

            };

        }
    });
    $('#penilaian_konsultan_kontruksi6').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_kontruksi6').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_kontruksi6").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_kontruksi6 = $('#penilaian_konsultan_kontruksi6').val();
                if (penilaian_konsultan_kontruksi6.match(validasiHuruf)) {
                    $('#penilaian_konsultan_kontruksi6').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_kontruksi6').css('border-color', 'green');
                    $('#penilaian_konsultan_kontruksi6').val(penilaian_konsultan_kontruksi6);

                }

            };

        }
    });
    $('#penilaian_konsultan_kontruksi7').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_kontruksi7').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_kontruksi7").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_kontruksi7 = $('#penilaian_konsultan_kontruksi7').val();
                if (penilaian_konsultan_kontruksi7.match(validasiHuruf)) {
                    $('#penilaian_konsultan_kontruksi7').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_kontruksi7').css('border-color', 'green');
                    $('#penilaian_konsultan_kontruksi7').val(penilaian_konsultan_kontruksi7);

                }

            };

        }
    });
    $('#penilaian_konsultan_kontruksi8').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_kontruksi8').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_kontruksi8").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_kontruksi8 = $('#penilaian_konsultan_kontruksi8').val();
                if (penilaian_konsultan_kontruksi8.match(validasiHuruf)) {
                    $('#penilaian_konsultan_kontruksi8').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_kontruksi8').css('border-color', 'green');
                    $('#penilaian_konsultan_kontruksi8').val(penilaian_konsultan_kontruksi8);

                }

            };

        }
    });
    $('#penilaian_konsultan_kontruksi9').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_kontruksi9').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_kontruksi9").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_kontruksi9 = $('#penilaian_konsultan_kontruksi9').val();
                if (penilaian_konsultan_kontruksi9.match(validasiHuruf)) {
                    $('#penilaian_konsultan_kontruksi9').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_kontruksi9').css('border-color', 'green');
                    $('#penilaian_konsultan_kontruksi9').val(penilaian_konsultan_kontruksi9);

                }

            };

        }
    });
    $('#penilaian_konsultan_kontruksi10').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_kontruksi10').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_kontruksi10").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_kontruksi10 = $('#penilaian_konsultan_kontruksi10').val();
                if (penilaian_konsultan_kontruksi10.match(validasiHuruf)) {
                    $('#penilaian_konsultan_kontruksi10').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_kontruksi10').css('border-color', 'green');
                    $('#penilaian_konsultan_kontruksi10').val(penilaian_konsultan_kontruksi10);

                }

            };

        }
    });
    $('#penilaian_konsultan_kontruksi11').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_kontruksi11').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_kontruksi11").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_kontruksi11 = $('#penilaian_konsultan_kontruksi11').val();
                if (penilaian_konsultan_kontruksi11.match(validasiHuruf)) {
                    $('#penilaian_konsultan_kontruksi11').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_kontruksi11').css('border-color', 'green');
                    $('#penilaian_konsultan_kontruksi11').val(penilaian_konsultan_kontruksi11);

                }

            };

        }
    });
    $('#penilaian_konsultan_kontruksi12').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_kontruksi12').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_kontruksi12").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_kontruksi12 = $('#penilaian_konsultan_kontruksi12').val();
                if (penilaian_konsultan_kontruksi12.match(validasiHuruf)) {
                    $('#penilaian_konsultan_kontruksi12').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_kontruksi12').css('border-color', 'green');
                    $('#penilaian_konsultan_kontruksi12').val(penilaian_konsultan_kontruksi12);

                }

            };

        }
    });
    $('#penilaian_konsultan_kontruksi13').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_kontruksi13').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_kontruksi13").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_kontruksi13 = $('#penilaian_konsultan_kontruksi13').val();
                if (penilaian_konsultan_kontruksi13.match(validasiHuruf)) {
                    $('#penilaian_konsultan_kontruksi13').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_kontruksi13').css('border-color', 'green');
                    $('#penilaian_konsultan_kontruksi13').val(penilaian_konsultan_kontruksi13);

                }

            };

        }
    });
    $('#penilaian_konsultan_kontruksi14').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_kontruksi14').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_kontruksi14").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_kontruksi14 = $('#penilaian_konsultan_kontruksi14').val();
                if (penilaian_konsultan_kontruksi14.match(validasiHuruf)) {
                    $('#penilaian_konsultan_kontruksi14').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_kontruksi14').css('border-color', 'green');
                    $('#penilaian_konsultan_kontruksi14').val(penilaian_konsultan_kontruksi14);

                }

            };

        }
    });
    $('#penilaian_konsultan_kontruksi15').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_kontruksi15').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_kontruksi15").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_kontruksi15 = $('#penilaian_konsultan_kontruksi15').val();
                if (penilaian_konsultan_kontruksi15.match(validasiHuruf)) {
                    $('#penilaian_konsultan_kontruksi15').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_kontruksi15').css('border-color', 'green');
                    $('#penilaian_konsultan_kontruksi15').val(penilaian_konsultan_kontruksi15);

                }

            };

        }
    });
</script>


<!-- ININ UNTUK VALIDASI BUTTON dan nilaik akhir TAMBAH -->
<!-- keyup nilai pekerjaan kontruksi -->
<script>
    $(document).ready(function() {
        $("#penilaian_konsultan_kontruksi1, #penilaian_konsultan_kontruksi2, #penilaian_konsultan_kontruksi3, #penilaian_konsultan_kontruksi4,#penilaian_konsultan_kontruksi5,#penilaian_konsultan_kontruksi6,#penilaian_konsultan_kontruksi7,#penilaian_konsultan_kontruksi8,#penilaian_konsultan_kontruksi9,#penilaian_konsultan_kontruksi10,#penilaian_konsultan_kontruksi11,#penilaian_konsultan_kontruksi12,#penilaian_konsultan_kontruksi13,#penilaian_konsultan_kontruksi14,#penilaian_konsultan_kontruksi15,#penilaian_konsultan_kontruksi16,#penilaian_konsultan_kontruksi17").keyup(function() {
            // 1
            var bobot_pekerjaan_kontruksi1 = $('#bobot_pekerjaan_konsultan_kontruksi1').val();
            var penilaian_kontruksi1 = $('#penilaian_konsultan_kontruksi1').val();
            var nilai_akhir_kontruksi1 = bobot_pekerjaan_kontruksi1 * penilaian_kontruksi1 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_kontruksi_aspek1').val(parseFloat(nilai_akhir_kontruksi1));
            // 2
            var bobot_pekerjaan_kontruksi2 = $('#bobot_pekerjaan_konsultan_kontruksi2').val();
            var penilaian_kontruksi2 = $('#penilaian_konsultan_kontruksi2').val();
            var nilai_akhir_kontruksi2 = bobot_pekerjaan_kontruksi2 * penilaian_kontruksi2 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_kontruksi_aspek2').val(parseFloat(nilai_akhir_kontruksi2));
            // 3
            var bobot_pekerjaan_kontruksi3 = $('#bobot_pekerjaan_konsultan_kontruksi3').val();
            var penilaian_kontruksi3 = $('#penilaian_konsultan_kontruksi3').val();
            var nilai_akhir_kontruksi3 = bobot_pekerjaan_kontruksi3 * penilaian_kontruksi3 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_kontruksi_aspek3').val(parseFloat(nilai_akhir_kontruksi3));
            // 4
            var bobot_pekerjaan_kontruksi4 = $('#bobot_pekerjaan_konsultan_kontruksi4').val();
            var penilaian_kontruksi4 = $('#penilaian_konsultan_kontruksi4').val();
            var nilai_akhir_kontruksi4 = bobot_pekerjaan_kontruksi4 * penilaian_kontruksi4 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_kontruksi_aspek4').val(parseFloat(nilai_akhir_kontruksi4));
            // 5
            var bobot_pekerjaan_kontruksi5 = $('#bobot_pekerjaan_konsultan_kontruksi5').val();
            var penilaian_kontruksi5 = $('#penilaian_konsultan_kontruksi5').val();
            var nilai_akhir_kontruksi5 = bobot_pekerjaan_kontruksi5 * penilaian_kontruksi5 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_kontruksi_aspek5').val(parseFloat(nilai_akhir_kontruksi5));
            // 6
            var bobot_pekerjaan_kontruksi6 = $('#bobot_pekerjaan_konsultan_kontruksi6').val();
            var penilaian_kontruksi6 = $('#penilaian_konsultan_kontruksi6').val();
            var nilai_akhir_kontruksi6 = bobot_pekerjaan_kontruksi6 * penilaian_kontruksi6 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_kontruksi_aspek6').val(parseFloat(nilai_akhir_kontruksi6));
            // 7
            var bobot_pekerjaan_kontruksi7 = $('#bobot_pekerjaan_konsultan_kontruksi7').val();
            var penilaian_kontruksi7 = $('#penilaian_konsultan_kontruksi7').val();
            var nilai_akhir_kontruksi7 = bobot_pekerjaan_kontruksi7 * penilaian_kontruksi7 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_kontruksi_aspek7').val(parseFloat(nilai_akhir_kontruksi7));
            // 8
            var bobot_pekerjaan_kontruksi8 = $('#bobot_pekerjaan_konsultan_kontruksi8').val();
            var penilaian_kontruksi8 = $('#penilaian_konsultan_kontruksi8').val();
            var nilai_akhir_kontruksi8 = bobot_pekerjaan_kontruksi8 * penilaian_kontruksi8 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_kontruksi_aspek8').val(parseFloat(nilai_akhir_kontruksi8));
            // 9
            var bobot_pekerjaan_kontruksi9 = $('#bobot_pekerjaan_konsultan_kontruksi9').val();
            var penilaian_kontruksi9 = $('#penilaian_konsultan_kontruksi9').val();
            var nilai_akhir_kontruksi9 = bobot_pekerjaan_kontruksi9 * penilaian_kontruksi9 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_kontruksi_aspek9').val(parseFloat(nilai_akhir_kontruksi9));
            // 10
            var bobot_pekerjaan_kontruksi10 = $('#bobot_pekerjaan_konsultan_kontruksi10').val();
            var penilaian_kontruksi10 = $('#penilaian_konsultan_kontruksi10').val();
            var nilai_akhir_kontruksi10 = bobot_pekerjaan_kontruksi10 * penilaian_kontruksi10 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_kontruksi_aspek10').val(parseFloat(nilai_akhir_kontruksi10));
            // 11
            var bobot_pekerjaan_kontruksi11 = $('#bobot_pekerjaan_konsultan_kontruksi11').val();
            var penilaian_kontruksi11 = $('#penilaian_konsultan_kontruksi11').val();
            var nilai_akhir_kontruksi11 = bobot_pekerjaan_kontruksi11 * penilaian_kontruksi11 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_kontruksi_aspek11').val(parseFloat(nilai_akhir_kontruksi11));
            // 12
            var bobot_pekerjaan_kontruksi12 = $('#bobot_pekerjaan_konsultan_kontruksi12').val();
            var penilaian_kontruksi12 = $('#penilaian_konsultan_kontruksi12').val();
            var nilai_akhir_kontruksi12 = bobot_pekerjaan_kontruksi12 * penilaian_kontruksi12 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_kontruksi_aspek12').val(parseFloat(nilai_akhir_kontruksi12));
            // 13
            var bobot_pekerjaan_kontruksi13 = $('#bobot_pekerjaan_konsultan_kontruksi13').val();
            var penilaian_kontruksi13 = $('#penilaian_konsultan_kontruksi13').val();
            var nilai_akhir_kontruksi13 = bobot_pekerjaan_kontruksi13 * penilaian_kontruksi13 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_kontruksi_aspek13').val(parseFloat(nilai_akhir_kontruksi13));
            // 14
            var bobot_pekerjaan_kontruksi14 = $('#bobot_pekerjaan_konsultan_kontruksi14').val();
            var penilaian_kontruksi14 = $('#penilaian_konsultan_kontruksi14').val();
            var nilai_akhir_kontruksi14 = bobot_pekerjaan_kontruksi14 * penilaian_kontruksi14 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_kontruksi_aspek14').val(parseFloat(nilai_akhir_kontruksi14));
            // 15
            var bobot_pekerjaan_kontruksi15 = $('#bobot_pekerjaan_konsultan_kontruksi15').val();
            var penilaian_kontruksi15 = $('#penilaian_konsultan_kontruksi15').val();
            var nilai_akhir_kontruksi15 = bobot_pekerjaan_kontruksi15 * penilaian_kontruksi15 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_kontruksi_aspek15').val(parseFloat(nilai_akhir_kontruksi15));

            var total = parseFloat(nilai_akhir_kontruksi1) + parseFloat(nilai_akhir_kontruksi2) + parseFloat(nilai_akhir_kontruksi3) + parseFloat(nilai_akhir_kontruksi4) + parseFloat(nilai_akhir_kontruksi5) + parseFloat(nilai_akhir_kontruksi6) + parseFloat(nilai_akhir_kontruksi7) + parseFloat(nilai_akhir_kontruksi8) + parseFloat(nilai_akhir_kontruksi9) + parseFloat(nilai_akhir_kontruksi10) + parseFloat(nilai_akhir_kontruksi11) + parseFloat(nilai_akhir_kontruksi12) + parseFloat(nilai_akhir_kontruksi13) + parseFloat(nilai_akhir_kontruksi14) + parseFloat(nilai_akhir_kontruksi15);
            var total_button = $("#total_nilai_pekerjaan_konsultan_kontruksi").val(total);
            if (total <= 51) {
                $('[name="rating_penilaian_vendor_pekerjaan_konsultan_kontruksi"]').val(4);
                $('[name="status_rating_pekerjaan_konsultan_kontruksi"]').val('kurang baik');
                $('[name="status_nilai_akhir_pekerjaan_konsultan_kontruksi"]').val(total);
                $('#status_pekerjaan_konsultan_kontruksi').html('<label for="" class="badge badge-danger">Kurang Baik</label>');
                $('#warning_button_konsultan_kontruksi').show();
                $('#save_button_konsultan_kontruksi').hide();
                $('#bintang_pekerjaan_konsultan_kontruksi').html('');
            } else if (total <= 70) {
                $('[name="rating_penilaian_vendor_pekerjaan_konsultan_kontruksi"]').val(1);
                $('[name="status_rating_pekerjaan_konsultan_kontruksi"]').val('cukup baik');
                $('[name="status_nilai_akhir_pekerjaan_konsultan_kontruksi"]').val(total);
                $('#save_button_konsultan_kontruksi').show();
                $('#warning_button_konsultan_kontruksi').hide();
                $('#status_pekerjaan_konsultan_kontruksi').html('<label for="" class="badge badge-warning">Cukup Baik</label>');
                $('#bintang_pekerjaan_konsultan_kontruksi').html('<i class="fas fa fa-star text-warning"></i>');
            } else if (total <= 80) {
                $('[name="rating_penilaian_vendor_pekerjaan_konsultan_kontruksi"]').val(2);
                $('[name="status_rating_pekerjaan_konsultan_kontruksi"]').val('baik');
                $('[name="status_nilai_akhir_pekerjaan_konsultan_kontruksi"]').val(total);
                $('#save_button_konsultan_kontruksi').show();
                $('#warning_button_konsultan_kontruksi').hide();
                $('#status_pekerjaan_konsultan_kontruksi').html('<label for="" class="badge badge-warning">Baik</label>');
                $('#bintang_pekerjaan_konsultan_kontruksi').html('<i class="fas fa fa-star text-warning"></i><i class="fas fa fa-star text-warning"></i>');
            } else {
                $('[name="rating_penilaian_vendor_pekerjaan_konsultan_kontruksi"]').val(3);
                $('[name="status_rating_pekerjaan_konsultan_kontruksi"]').val('sangat baik');
                $('[name="status_nilai_akhir_pekerjaan_konsultan_kontruksi"]').val(total);
                $('#save_button_konsultan_kontruksi').show();
                $('#warning_button_konsultan_kontruksi').hide();
                $('#status_pekerjaan_konsultan_kontruksi').html('<label for="" class="badge badge-success">Sangat Baik</label>');
                $('#bintang_pekerjaan_konsultan_kontruksi').html('<i class="fas fa fa-star text-warning"></i><i class="fas fa fa-star text-warning"></i><i class="fas fa fa-star text-warning"></i>');
            }

        });
    });
</script>







<!-- INI BATAS PENILAIAN KAJIAN KONSULTAN KONTRUKSI ===================================================================================================================================== -->

<!-- AJAX BARUUU TAMBAH REVISI -->
<script>
    function message3(icon, text) {
        swal({
            title: "Good Jobs!!!",
            text: text,
            icon: icon,
        });
    }

    function message5(icon, text) {
        swal({
            title: "Anda Berhasil Mereset Nilai!!!",
            text: text,
            icon: icon,
        });
    }
    var form_tambah_pekerjaan_kajian_konsultan_kontruksi = $('#form_tambah_pekerjaan_kajian_konsultan_kontruksi');

    function Simpan_pekerjaan_kajian_konsultan_kontruksi() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('beranda/tambah_pekerjaan_kajian_konsultan_kontruksisaya') ?>',
            data: form_tambah_pekerjaan_kajian_konsultan_kontruksi.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message3('success', 'Penilaian Berhasil Di Buat!!');
                    location.reload();
                }
            },
        })
    }

    var form_tambah_pekerjaan_kajian_konsultan_kontruksi = $('#form_tambah_pekerjaan_kajian_konsultan_kontruksi');

    function Simpan_Warning_pekerjaan_kajian_konsultan_kontruksi_warning() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('beranda/tambah_warning_pekerjaan_kajian_konsultan_kontruksisaya') ?>',
            data: form_tambah_pekerjaan_kajian_konsultan_kontruksi.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $("#kirim_ke_vendor").css('display', 'block');
            },
            success: function(response) {
                $("#kirim_ke_vendor").css('display', 'none');
                window.open('https://api.whatsapp.com/send?phone=+62' + response['telpon'] + '&text=Laporan Penilaian Kinerja Vendor Nama Paket  : ' + response['paket'].nama_paket + ' Dengan Metode Pemilihan : ' + response['paket'].nama_metode_pemilihan + '  Agency : ' + response['paket'].nama_unit_kerja + ', Info : ' + response['isi'] + '', '_blank');
                message3('success', 'Penilaian Berhasil Di Buat');
                location.reload();
            },
        })
    }

    var form_tambah_pekerjaan_kajian_konsultan_kontruksi_reset = $('#form_tambah_pekerjaan_kajian_konsultan_kontruksi');

    function Reset_nilai_pekerjaan_kajian_konsultan_kontruksi() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('beranda/reset_penilaian_performance_pekerjaan_kajian_konsultan_kontruksi') ?>',
            data: form_tambah_pekerjaan_kajian_konsultan_kontruksi_reset.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $("#kirim_ke_vendor").css('display', 'block');
            },
            success: function(response) {
                $("#kirim_ke_vendor").css('display', 'none');
                window.open('https://api.whatsapp.com/send?phone=+62' + response['telpon'] + '&text=Laporan Penilaian Kinerja Vendor Nama Paket  : ' + response['paket'].nama_paket + ' Dengan Metode Pemilihan : ' + response['paket'].nama_metode_pemilihan + '  Agency : ' + response['paket'].nama_unit_kerja + ', Info : ' + response['isi'] + '', '_blank');
                message5('success', 'Penilaian Berhasil Di Reset');
                location.reload();
            },
        })
    }
</script>
<!-- INI UNTUK UPDATENYA -->
<script>
    function message3(icon, text) {
        swal({
            title: "Good Jobs!!!",
            text: text,
            icon: icon,
        });
    }
    var form_tambah_pekerjaan_kajian_konsultan_kontruksi = $('#form_tambah_pekerjaan_kajian_konsultan_kontruksi');

    function Update_pekerjaan_kajian_konsultan_kontruksi() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('beranda/update_pekerjaan_kajian_konsultan_kontruksisaya') ?>',
            data: form_tambah_pekerjaan_kajian_konsultan_kontruksi.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message3('success', 'Penilaian Berhasil Di Update!!');
                    location.reload();
                }
            },
        })
    }
</script>


<!-- INI UNTUK VALIDASI ANGKANYA Bagian UPDATE-->
<script>
    function message(icon, text) {
        swal({
            title: "Maaf Tidak Boleh Huruf Yaa !!!",
            text: text,
            icon: icon,
        });
    }

    function message_gak_boleh_lebih_angkanya(icon, text) {
        swal({
            title: "Maaf Angka Penilaian Tidak Boleh Lebih Dari 100 Yaa !!!",
            text: text,
            icon: icon,
        });
    }
    $('#penilaian_kajian_konsultan_kontruksi_update1').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kajian_konsultan_kontruksi_update1').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kajian_konsultan_kontruksi_update1").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kajian_konsultan_kontruksi_update1 = $('#penilaian_kajian_konsultan_kontruksi_update1').val();
                if (penilaian_kajian_konsultan_kontruksi_update1.match(validasiHuruf)) {
                    $('#penilaian_kajian_konsultan_kontruksi_update1').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kajian_konsultan_kontruksi_update1').css('border-color', 'green');
                    $('#penilaian_kajian_konsultan_kontruksi_update1').val(penilaian_kajian_konsultan_kontruksi_update1);

                }

            };

        }
    });
    $('#penilaian_kajian_konsultan_kontruksi_update2').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kajian_konsultan_kontruksi_update2').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kajian_konsultan_kontruksi_update2").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kajian_konsultan_kontruksi_update2 = $('#penilaian_kajian_konsultan_kontruksi_update2').val();
                if (penilaian_kajian_konsultan_kontruksi_update2.match(validasiHuruf)) {
                    $('#penilaian_kajian_konsultan_kontruksi_update2').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kajian_konsultan_kontruksi_update2').css('border-color', 'green');
                    $('#penilaian_kajian_konsultan_kontruksi_update2').val(penilaian_kajian_konsultan_kontruksi_update2);

                }

            };

        }
    });

    $('#penilaian_kajian_konsultan_kontruksi_update3').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kajian_konsultan_kontruksi_update3').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kajian_konsultan_kontruksi_update3").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kajian_konsultan_kontruksi_update3 = $('#penilaian_kajian_konsultan_kontruksi_update3').val();
                if (penilaian_kajian_konsultan_kontruksi_update3.match(validasiHuruf)) {
                    $('#penilaian_kajian_konsultan_kontruksi_update3').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kajian_konsultan_kontruksi_update3').css('border-color', 'green');
                    $('#penilaian_kajian_konsultan_kontruksi_update3').val(penilaian_kajian_konsultan_kontruksi_update3);

                }

            };

        }
    });
    $('#penilaian_kajian_konsultan_kontruksi_update4').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kajian_konsultan_kontruksi_update4').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kajian_konsultan_kontruksi_update4").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kajian_konsultan_kontruksi_update4 = $('#penilaian_kajian_konsultan_kontruksi_update4').val();
                if (penilaian_kajian_konsultan_kontruksi_update4.match(validasiHuruf)) {
                    $('#penilaian_kajian_konsultan_kontruksi_update4').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kajian_konsultan_kontruksi_update4').css('border-color', 'green');
                    $('#penilaian_kajian_konsultan_kontruksi_update4').val(penilaian_kajian_konsultan_kontruksi_update4);

                }

            };

        }
    });
    $('#penilaian_kajian_konsultan_kontruksi_update5').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kajian_konsultan_kontruksi_update5').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kajian_konsultan_kontruksi_update5").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kajian_konsultan_kontruksi_update5 = $('#penilaian_kajian_konsultan_kontruksi_update5').val();
                if (penilaian_kajian_konsultan_kontruksi_update5.match(validasiHuruf)) {
                    $('#penilaian_kajian_konsultan_kontruksi_update5').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kajian_konsultan_kontruksi_update5').css('border-color', 'green');
                    $('#penilaian_kajian_konsultan_kontruksi_update5').val(penilaian_kajian_konsultan_kontruksi_update5);

                }

            };

        }
    });
    $('#penilaian_kajian_konsultan_kontruksi_update6').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kajian_konsultan_kontruksi_update6').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kajian_konsultan_kontruksi_update6").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kajian_konsultan_kontruksi_update6 = $('#penilaian_kajian_konsultan_kontruksi_update6').val();
                if (penilaian_kajian_konsultan_kontruksi_update6.match(validasiHuruf)) {
                    $('#penilaian_kajian_konsultan_kontruksi_update6').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kajian_konsultan_kontruksi_update6').css('border-color', 'green');
                    $('#penilaian_kajian_konsultan_kontruksi_update6').val(penilaian_kajian_konsultan_kontruksi_update6);

                }

            };

        }
    });
    $('#penilaian_kajian_konsultan_kontruksi_update7').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kajian_konsultan_kontruksi_update7').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kajian_konsultan_kontruksi_update7").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kajian_konsultan_kontruksi_update7 = $('#penilaian_kajian_konsultan_kontruksi_update7').val();
                if (penilaian_kajian_konsultan_kontruksi_update7.match(validasiHuruf)) {
                    $('#penilaian_kajian_konsultan_kontruksi_update7').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kajian_konsultan_kontruksi_update7').css('border-color', 'green');
                    $('#penilaian_kajian_konsultan_kontruksi_update7').val(penilaian_kajian_konsultan_kontruksi_update7);

                }

            };

        }
    });
    $('#penilaian_kajian_konsultan_kontruksi_update8').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kajian_konsultan_kontruksi_update8').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kajian_konsultan_kontruksi_update8").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kajian_konsultan_kontruksi_update8 = $('#penilaian_kajian_konsultan_kontruksi_update8').val();
                if (penilaian_kajian_konsultan_kontruksi_update8.match(validasiHuruf)) {
                    $('#penilaian_kajian_konsultan_kontruksi_update8').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kajian_konsultan_kontruksi_update8').css('border-color', 'green');
                    $('#penilaian_kajian_konsultan_kontruksi_update8').val(penilaian_kajian_konsultan_kontruksi_update8);

                }

            };

        }
    });
    $('#penilaian_kajian_konsultan_kontruksi_update9').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kajian_konsultan_kontruksi_update9').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kajian_konsultan_kontruksi_update9").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kajian_konsultan_kontruksi_update9 = $('#penilaian_kajian_konsultan_kontruksi_update9').val();
                if (penilaian_kajian_konsultan_kontruksi_update9.match(validasiHuruf)) {
                    $('#penilaian_kajian_konsultan_kontruksi_update9').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kajian_konsultan_kontruksi_update9').css('border-color', 'green');
                    $('#penilaian_kajian_konsultan_kontruksi_update9').val(penilaian_kajian_konsultan_kontruksi_update9);

                }

            };

        }
    });
    $('#penilaian_kajian_konsultan_kontruksi_update10').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kajian_konsultan_kontruksi_update10').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kajian_konsultan_kontruksi_update10").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kajian_konsultan_kontruksi_update10 = $('#penilaian_kajian_konsultan_kontruksi_update10').val();
                if (penilaian_kajian_konsultan_kontruksi_update10.match(validasiHuruf)) {
                    $('#penilaian_kajian_konsultan_kontruksi_update10').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kajian_konsultan_kontruksi_update10').css('border-color', 'green');
                    $('#penilaian_kajian_konsultan_kontruksi_update10').val(penilaian_kajian_konsultan_kontruksi_update10);

                }

            };

        }
    });
    $('#penilaian_kajian_konsultan_kontruksi_update11').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kajian_konsultan_kontruksi_update11').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kajian_konsultan_kontruksi_update11").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kajian_konsultan_kontruksi_update11 = $('#penilaian_kajian_konsultan_kontruksi_update11').val();
                if (penilaian_kajian_konsultan_kontruksi_update11.match(validasiHuruf)) {
                    $('#penilaian_kajian_konsultan_kontruksi_update11').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kajian_konsultan_kontruksi_update11').css('border-color', 'green');
                    $('#penilaian_kajian_konsultan_kontruksi_update11').val(penilaian_kajian_konsultan_kontruksi_update11);

                }

            };

        }
    });
    $('#penilaian_kajian_konsultan_kontruksi_update12').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kajian_konsultan_kontruksi_update12').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kajian_konsultan_kontruksi_update12").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kajian_konsultan_kontruksi_update12 = $('#penilaian_kajian_konsultan_kontruksi_update12').val();
                if (penilaian_kajian_konsultan_kontruksi_update12.match(validasiHuruf)) {
                    $('#penilaian_kajian_konsultan_kontruksi_update12').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kajian_konsultan_kontruksi_update12').css('border-color', 'green');
                    $('#penilaian_kajian_konsultan_kontruksi_update12').val(penilaian_kajian_konsultan_kontruksi_update12);

                }

            };

        }
    });
    $('#penilaian_kajian_konsultan_kontruksi_update13').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kajian_konsultan_kontruksi_update13').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kajian_konsultan_kontruksi_update13").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kajian_konsultan_kontruksi_update13 = $('#penilaian_kajian_konsultan_kontruksi_update13').val();
                if (penilaian_kajian_konsultan_kontruksi_update13.match(validasiHuruf)) {
                    $('#penilaian_kajian_konsultan_kontruksi_update13').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kajian_konsultan_kontruksi_update13').css('border-color', 'green');
                    $('#penilaian_kajian_konsultan_kontruksi_update13').val(penilaian_kajian_konsultan_kontruksi_update13);

                }

            };

        }
    });
    $('#penilaian_kajian_konsultan_kontruksi_update14').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kajian_konsultan_kontruksi_update14').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kajian_konsultan_kontruksi_update14").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kajian_konsultan_kontruksi_update14 = $('#penilaian_kajian_konsultan_kontruksi_update14').val();
                if (penilaian_kajian_konsultan_kontruksi_update14.match(validasiHuruf)) {
                    $('#penilaian_kajian_konsultan_kontruksi_update14').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kajian_konsultan_kontruksi_update14').css('border-color', 'green');
                    $('#penilaian_kajian_konsultan_kontruksi_update14').val(penilaian_kajian_konsultan_kontruksi_update14);

                }

            };

        }
    });
</script>


<!-- INI UNTUK VALIDASI ANGKANYA Bagian tambah-->
<script>
    function message(icon, text) {
        swal({
            title: "Maaf Tidak Boleh Huruf Yaa !!!",
            text: text,
            icon: icon,
        });
    }

    function message_gak_boleh_lebih_angkanya(icon, text) {
        swal({
            title: "Maaf Angka Penilaian Tidak Boleh Lebih Dari 100 Yaa !!!",
            text: text,
            icon: icon,
        });
    }
    $('#penilaian_kajian_konsultan_kontruksi1').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kajian_konsultan_kontruksi1').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kajian_konsultan_kontruksi1").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kajian_konsultan_kontruksi1 = $('#penilaian_kajian_konsultan_kontruksi1').val();
                if (penilaian_kajian_konsultan_kontruksi1.match(validasiHuruf)) {
                    $('#penilaian_kajian_konsultan_kontruksi1').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kajian_konsultan_kontruksi1').css('border-color', 'green');
                    $('#penilaian_kajian_konsultan_kontruksi1').val(penilaian_kajian_konsultan_kontruksi1);

                }

            };

        }
    });
    $('#penilaian_kajian_konsultan_kontruksi2').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kajian_konsultan_kontruksi2').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kajian_konsultan_kontruksi2").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kajian_konsultan_kontruksi2 = $('#penilaian_kajian_konsultan_kontruksi2').val();
                if (penilaian_kajian_konsultan_kontruksi2.match(validasiHuruf)) {
                    $('#penilaian_kajian_konsultan_kontruksi2').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kajian_konsultan_kontruksi2').css('border-color', 'green');
                    $('#penilaian_kajian_konsultan_kontruksi2').val(penilaian_kajian_konsultan_kontruksi2);

                }

            };

        }
    });

    $('#penilaian_kajian_konsultan_kontruksi3').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kajian_konsultan_kontruksi3').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kajian_konsultan_kontruksi3").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kajian_konsultan_kontruksi3 = $('#penilaian_kajian_konsultan_kontruksi3').val();
                if (penilaian_kajian_konsultan_kontruksi3.match(validasiHuruf)) {
                    $('#penilaian_kajian_konsultan_kontruksi3').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kajian_konsultan_kontruksi3').css('border-color', 'green');
                    $('#penilaian_kajian_konsultan_kontruksi3').val(penilaian_kajian_konsultan_kontruksi3);

                }

            };

        }
    });
    $('#penilaian_kajian_konsultan_kontruksi4').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kajian_konsultan_kontruksi4').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kajian_konsultan_kontruksi4").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kajian_konsultan_kontruksi4 = $('#penilaian_kajian_konsultan_kontruksi4').val();
                if (penilaian_kajian_konsultan_kontruksi4.match(validasiHuruf)) {
                    $('#penilaian_kajian_konsultan_kontruksi4').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kajian_konsultan_kontruksi4').css('border-color', 'green');
                    $('#penilaian_kajian_konsultan_kontruksi4').val(penilaian_kajian_konsultan_kontruksi4);

                }

            };

        }
    });
    $('#penilaian_kajian_konsultan_kontruksi5').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kajian_konsultan_kontruksi5').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kajian_konsultan_kontruksi5").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kajian_konsultan_kontruksi5 = $('#penilaian_kajian_konsultan_kontruksi5').val();
                if (penilaian_kajian_konsultan_kontruksi5.match(validasiHuruf)) {
                    $('#penilaian_kajian_konsultan_kontruksi5').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kajian_konsultan_kontruksi5').css('border-color', 'green');
                    $('#penilaian_kajian_konsultan_kontruksi5').val(penilaian_kajian_konsultan_kontruksi5);

                }

            };

        }
    });
    $('#penilaian_kajian_konsultan_kontruksi6').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kajian_konsultan_kontruksi6').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kajian_konsultan_kontruksi6").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kajian_konsultan_kontruksi6 = $('#penilaian_kajian_konsultan_kontruksi6').val();
                if (penilaian_kajian_konsultan_kontruksi6.match(validasiHuruf)) {
                    $('#penilaian_kajian_konsultan_kontruksi6').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kajian_konsultan_kontruksi6').css('border-color', 'green');
                    $('#penilaian_kajian_konsultan_kontruksi6').val(penilaian_kajian_konsultan_kontruksi6);

                }

            };

        }
    });
    $('#penilaian_kajian_konsultan_kontruksi7').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kajian_konsultan_kontruksi7').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kajian_konsultan_kontruksi7").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kajian_konsultan_kontruksi7 = $('#penilaian_kajian_konsultan_kontruksi7').val();
                if (penilaian_kajian_konsultan_kontruksi7.match(validasiHuruf)) {
                    $('#penilaian_kajian_konsultan_kontruksi7').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kajian_konsultan_kontruksi7').css('border-color', 'green');
                    $('#penilaian_kajian_konsultan_kontruksi7').val(penilaian_kajian_konsultan_kontruksi7);

                }

            };

        }
    });
    $('#penilaian_kajian_konsultan_kontruksi8').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kajian_konsultan_kontruksi8').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kajian_konsultan_kontruksi8").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kajian_konsultan_kontruksi8 = $('#penilaian_kajian_konsultan_kontruksi8').val();
                if (penilaian_kajian_konsultan_kontruksi8.match(validasiHuruf)) {
                    $('#penilaian_kajian_konsultan_kontruksi8').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kajian_konsultan_kontruksi8').css('border-color', 'green');
                    $('#penilaian_kajian_konsultan_kontruksi8').val(penilaian_kajian_konsultan_kontruksi8);

                }

            };

        }
    });
    $('#penilaian_kajian_konsultan_kontruksi9').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kajian_konsultan_kontruksi9').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kajian_konsultan_kontruksi9").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kajian_konsultan_kontruksi9 = $('#penilaian_kajian_konsultan_kontruksi9').val();
                if (penilaian_kajian_konsultan_kontruksi9.match(validasiHuruf)) {
                    $('#penilaian_kajian_konsultan_kontruksi9').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kajian_konsultan_kontruksi9').css('border-color', 'green');
                    $('#penilaian_kajian_konsultan_kontruksi9').val(penilaian_kajian_konsultan_kontruksi9);

                }

            };

        }
    });
    $('#penilaian_kajian_konsultan_kontruksi10').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kajian_konsultan_kontruksi10').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kajian_konsultan_kontruksi10").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kajian_konsultan_kontruksi10 = $('#penilaian_kajian_konsultan_kontruksi10').val();
                if (penilaian_kajian_konsultan_kontruksi10.match(validasiHuruf)) {
                    $('#penilaian_kajian_konsultan_kontruksi10').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kajian_konsultan_kontruksi10').css('border-color', 'green');
                    $('#penilaian_kajian_konsultan_kontruksi10').val(penilaian_kajian_konsultan_kontruksi10);

                }

            };

        }
    });
    $('#penilaian_kajian_konsultan_kontruksi11').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kajian_konsultan_kontruksi11').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kajian_konsultan_kontruksi11").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kajian_konsultan_kontruksi11 = $('#penilaian_kajian_konsultan_kontruksi11').val();
                if (penilaian_kajian_konsultan_kontruksi11.match(validasiHuruf)) {
                    $('#penilaian_kajian_konsultan_kontruksi11').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kajian_konsultan_kontruksi11').css('border-color', 'green');
                    $('#penilaian_kajian_konsultan_kontruksi11').val(penilaian_kajian_konsultan_kontruksi11);

                }

            };

        }
    });
    $('#penilaian_kajian_konsultan_kontruksi12').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kajian_konsultan_kontruksi12').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kajian_konsultan_kontruksi12").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kajian_konsultan_kontruksi12 = $('#penilaian_kajian_konsultan_kontruksi12').val();
                if (penilaian_kajian_konsultan_kontruksi12.match(validasiHuruf)) {
                    $('#penilaian_kajian_konsultan_kontruksi12').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kajian_konsultan_kontruksi12').css('border-color', 'green');
                    $('#penilaian_kajian_konsultan_kontruksi12').val(penilaian_kajian_konsultan_kontruksi12);

                }

            };

        }
    });
    $('#penilaian_kajian_konsultan_kontruksi13').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kajian_konsultan_kontruksi13').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kajian_konsultan_kontruksi13").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kajian_konsultan_kontruksi13 = $('#penilaian_kajian_konsultan_kontruksi13').val();
                if (penilaian_kajian_konsultan_kontruksi13.match(validasiHuruf)) {
                    $('#penilaian_kajian_konsultan_kontruksi13').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kajian_konsultan_kontruksi13').css('border-color', 'green');
                    $('#penilaian_kajian_konsultan_kontruksi13').val(penilaian_kajian_konsultan_kontruksi13);

                }

            };

        }
    });
    $('#penilaian_kajian_konsultan_kontruksi14').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kajian_konsultan_kontruksi14').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kajian_konsultan_kontruksi14").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kajian_konsultan_kontruksi14 = $('#penilaian_kajian_konsultan_kontruksi14').val();
                if (penilaian_kajian_konsultan_kontruksi14.match(validasiHuruf)) {
                    $('#penilaian_kajian_konsultan_kontruksi14').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_kajian_konsultan_kontruksi14').css('border-color', 'green');
                    $('#penilaian_kajian_konsultan_kontruksi14').val(penilaian_kajian_konsultan_kontruksi14);

                }

            };

        }
    });
</script>


<!-- ININ UNTUK VALIDASI BUTTON dan nilaik akhir TAMBAH -->
<!-- keyup nilai pekerjaan kontruksi -->
<script>
    $(document).ready(function() {
        $("#penilaian_kajian_konsultan_kontruksi1, #penilaian_kajian_konsultan_kontruksi2, #penilaian_kajian_konsultan_kontruksi3, #penilaian_kajian_konsultan_kontruksi4,#penilaian_kajian_konsultan_kontruksi5,#penilaian_kajian_konsultan_kontruksi6,#penilaian_kajian_konsultan_kontruksi7,#penilaian_kajian_konsultan_kontruksi8,#penilaian_kajian_konsultan_kontruksi9,#penilaian_kajian_konsultan_kontruksi10,#penilaian_kajian_konsultan_kontruksi11,#penilaian_kajian_konsultan_kontruksi12,#penilaian_kajian_konsultan_kontruksi13,#penilaian_kajian_konsultan_kontruksi14").keyup(function() {
            // 1
            var bobot_pekerjaan_kontruksi1 = $('#bobot_pekerjaan_kajian_konsultan_kontruksi1').val();
            var penilaian_kontruksi1 = $('#penilaian_kajian_konsultan_kontruksi1').val();
            var nilai_akhir_kontruksi1 = bobot_pekerjaan_kontruksi1 * penilaian_kontruksi1 / 100;
            $('#nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek1').val(parseFloat(nilai_akhir_kontruksi1));
            // 2
            var bobot_pekerjaan_kontruksi2 = $('#bobot_pekerjaan_kajian_konsultan_kontruksi2').val();
            var penilaian_kontruksi2 = $('#penilaian_kajian_konsultan_kontruksi2').val();
            var nilai_akhir_kontruksi2 = bobot_pekerjaan_kontruksi2 * penilaian_kontruksi2 / 100;
            $('#nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek2').val(parseFloat(nilai_akhir_kontruksi2));
            // 3
            var bobot_pekerjaan_kontruksi3 = $('#bobot_pekerjaan_kajian_konsultan_kontruksi3').val();
            var penilaian_kontruksi3 = $('#penilaian_kajian_konsultan_kontruksi3').val();
            var nilai_akhir_kontruksi3 = bobot_pekerjaan_kontruksi3 * penilaian_kontruksi3 / 100;
            $('#nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek3').val(parseFloat(nilai_akhir_kontruksi3));
            // 4
            var bobot_pekerjaan_kontruksi4 = $('#bobot_pekerjaan_kajian_konsultan_kontruksi4').val();
            var penilaian_kontruksi4 = $('#penilaian_kajian_konsultan_kontruksi4').val();
            var nilai_akhir_kontruksi4 = bobot_pekerjaan_kontruksi4 * penilaian_kontruksi4 / 100;
            $('#nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek4').val(parseFloat(nilai_akhir_kontruksi4));
            // 5
            var bobot_pekerjaan_kontruksi5 = $('#bobot_pekerjaan_kajian_konsultan_kontruksi5').val();
            var penilaian_kontruksi5 = $('#penilaian_kajian_konsultan_kontruksi5').val();
            var nilai_akhir_kontruksi5 = bobot_pekerjaan_kontruksi5 * penilaian_kontruksi5 / 100;
            $('#nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek5').val(parseFloat(nilai_akhir_kontruksi5));
            // 6
            var bobot_pekerjaan_kontruksi6 = $('#bobot_pekerjaan_kajian_konsultan_kontruksi6').val();
            var penilaian_kontruksi6 = $('#penilaian_kajian_konsultan_kontruksi6').val();
            var nilai_akhir_kontruksi6 = bobot_pekerjaan_kontruksi6 * penilaian_kontruksi6 / 100;
            $('#nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek6').val(parseFloat(nilai_akhir_kontruksi6));
            // 7
            var bobot_pekerjaan_kontruksi7 = $('#bobot_pekerjaan_kajian_konsultan_kontruksi7').val();
            var penilaian_kontruksi7 = $('#penilaian_kajian_konsultan_kontruksi7').val();
            var nilai_akhir_kontruksi7 = bobot_pekerjaan_kontruksi7 * penilaian_kontruksi7 / 100;
            $('#nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek7').val(parseFloat(nilai_akhir_kontruksi7));
            // 8
            var bobot_pekerjaan_kontruksi8 = $('#bobot_pekerjaan_kajian_konsultan_kontruksi8').val();
            var penilaian_kontruksi8 = $('#penilaian_kajian_konsultan_kontruksi8').val();
            var nilai_akhir_kontruksi8 = bobot_pekerjaan_kontruksi8 * penilaian_kontruksi8 / 100;
            $('#nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek8').val(parseFloat(nilai_akhir_kontruksi8));
            // 9
            var bobot_pekerjaan_kontruksi9 = $('#bobot_pekerjaan_kajian_konsultan_kontruksi9').val();
            var penilaian_kontruksi9 = $('#penilaian_kajian_konsultan_kontruksi9').val();
            var nilai_akhir_kontruksi9 = bobot_pekerjaan_kontruksi9 * penilaian_kontruksi9 / 100;
            $('#nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek9').val(parseFloat(nilai_akhir_kontruksi9));
            // 10
            var bobot_pekerjaan_kontruksi10 = $('#bobot_pekerjaan_kajian_konsultan_kontruksi10').val();
            var penilaian_kontruksi10 = $('#penilaian_kajian_konsultan_kontruksi10').val();
            var nilai_akhir_kontruksi10 = bobot_pekerjaan_kontruksi10 * penilaian_kontruksi10 / 100;
            $('#nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek10').val(parseFloat(nilai_akhir_kontruksi10));
            // 11
            var bobot_pekerjaan_kontruksi11 = $('#bobot_pekerjaan_kajian_konsultan_kontruksi11').val();
            var penilaian_kontruksi11 = $('#penilaian_kajian_konsultan_kontruksi11').val();
            var nilai_akhir_kontruksi11 = bobot_pekerjaan_kontruksi11 * penilaian_kontruksi11 / 100;
            $('#nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek11').val(parseFloat(nilai_akhir_kontruksi11));
            // 12
            var bobot_pekerjaan_kontruksi12 = $('#bobot_pekerjaan_kajian_konsultan_kontruksi12').val();
            var penilaian_kontruksi12 = $('#penilaian_kajian_konsultan_kontruksi12').val();
            var nilai_akhir_kontruksi12 = bobot_pekerjaan_kontruksi12 * penilaian_kontruksi12 / 100;
            $('#nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek12').val(parseFloat(nilai_akhir_kontruksi12));
            // 13
            var bobot_pekerjaan_kontruksi13 = $('#bobot_pekerjaan_kajian_konsultan_kontruksi13').val();
            var penilaian_kontruksi13 = $('#penilaian_kajian_konsultan_kontruksi13').val();
            var nilai_akhir_kontruksi13 = bobot_pekerjaan_kontruksi13 * penilaian_kontruksi13 / 100;
            $('#nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek13').val(parseFloat(nilai_akhir_kontruksi13));
            // 14
            var bobot_pekerjaan_kontruksi14 = $('#bobot_pekerjaan_kajian_konsultan_kontruksi14').val();
            var penilaian_kontruksi14 = $('#penilaian_kajian_konsultan_kontruksi14').val();
            var nilai_akhir_kontruksi14 = bobot_pekerjaan_kontruksi14 * penilaian_kontruksi14 / 100;
            $('#nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek14').val(parseFloat(nilai_akhir_kontruksi14));
            // 15

            var total = parseFloat(nilai_akhir_kontruksi1) + parseFloat(nilai_akhir_kontruksi2) + parseFloat(nilai_akhir_kontruksi3) + parseFloat(nilai_akhir_kontruksi4) + parseFloat(nilai_akhir_kontruksi5) + parseFloat(nilai_akhir_kontruksi6) + parseFloat(nilai_akhir_kontruksi7) + parseFloat(nilai_akhir_kontruksi8) + parseFloat(nilai_akhir_kontruksi9) + parseFloat(nilai_akhir_kontruksi10) + parseFloat(nilai_akhir_kontruksi11) + parseFloat(nilai_akhir_kontruksi12) + parseFloat(nilai_akhir_kontruksi13) + parseFloat(nilai_akhir_kontruksi14);
            var total_button = $("#total_nilai_pekerjaan_kajian_konsultan_kontruksi").val(total);
            if (total <= 51) {
                $('[name="rating_penilaian_vendor_pekerjaan_kajian_konsultan_kontruksi"]').val(4);
                $('[name="status_rating_pekerjaan_kajian_konsultan_kontruksi"]').val('kurang baik');
                $('[name="status_nilai_akhir_pekerjaan_kajian_konsultan_kontruksi"]').val(total);
                $('#status_pekerjaan_kajian_konsultan_kontruksi').html('<label for="" class="badge badge-danger">Kurang Baik</label>');
                $('#warning_button_kajian_konsultan_kontruksi').show();
                $('#save_button_kajian_konsultan_kontruksi').hide();
                $('#bintang_pekerjaan_kajian_konsultan_kontruksi').html('');
            } else if (total <= 70) {
                $('[name="rating_penilaian_vendor_pekerjaan_kajian_konsultan_kontruksi"]').val(1);
                $('[name="status_rating_pekerjaan_kajian_konsultan_kontruksi"]').val('cukup baik');
                $('[name="status_nilai_akhir_pekerjaan_kajian_konsultan_kontruksi"]').val(total);
                $('#save_button_kajian_konsultan_kontruksi').show();
                $('#warning_button_kajian_konsultan_kontruksi').hide();
                $('#status_pekerjaan_kajian_konsultan_kontruksi').html('<label for="" class="badge badge-warning">Cukup Baik</label>');
                $('#bintang_pekerjaan_kajian_konsultan_kontruksi').html('<i class="fas fa fa-star text-warning"></i>');
            } else if (total <= 80) {
                $('[name="rating_penilaian_vendor_pekerjaan_kajian_konsultan_kontruksi"]').val(2);
                $('[name="status_rating_pekerjaan_kajian_konsultan_kontruksi"]').val('baik');
                $('[name="status_nilai_akhir_pekerjaan_kajian_konsultan_kontruksi"]').val(total);
                $('#save_button_kajian_konsultan_kontruksi').show();
                $('#warning_button_kajian_konsultan_kontruksi').hide();
                $('#status_pekerjaan_kajian_konsultan_kontruksi').html('<label for="" class="badge badge-warning">Baik</label>');
                $('#bintang_pekerjaan_kajian_konsultan_kontruksi').html('<i class="fas fa fa-star text-warning"></i><i class="fas fa fa-star text-warning"></i>');
            } else {
                $('[name="rating_penilaian_vendor_pekerjaan_kajian_konsultan_kontruksi"]').val(3);
                $('[name="status_rating_pekerjaan_kajian_konsultan_kontruksi"]').val('sangat baik');
                $('[name="status_nilai_akhir_pekerjaan_kajian_konsultan_kontruksi"]').val(total);
                $('#save_button_kajian_konsultan_kontruksi').show();
                $('#warning_button_kajian_konsultan_kontruksi').hide();
                $('#status_pekerjaan_kajian_konsultan_kontruksi').html('<label for="" class="badge badge-success">Sangat Baik</label>');
                $('#bintang_pekerjaan_kajian_konsultan_kontruksi').html('<i class="fas fa fa-star text-warning"></i><i class="fas fa fa-star text-warning"></i><i class="fas fa fa-star text-warning"></i>');
            }

        });
    });
</script>
<!-- END KAJIAN KOSULTAN KONTRUKSI -->









<!-- INI BATAS PENILAIAN KONSULTAN PENGAWAS KONTRUKSI ===================================================================================================================================== -->

<!-- AJAX BARUUU TAMBAH REVISI -->
<script>
    function message3(icon, text) {
        swal({
            title: "Good Jobs!!!",
            text: text,
            icon: icon,
        });
    }

    function message5(icon, text) {
        swal({
            title: "Anda Berhasil Mereset Nilai!!!",
            text: text,
            icon: icon,
        });
    }
    var form_tambah_pekerjaan_konsultan_pengawas_kontruksi = $('#form_tambah_pekerjaan_konsultan_pengawas_kontruksi');

    function Simpan_pekerjaan_konsultan_pengawas_kontruksi() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('beranda/tambah_pekerjaan_konsultan_pengawas_kontruksisaya') ?>',
            data: form_tambah_pekerjaan_konsultan_pengawas_kontruksi.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message3('success', 'Penilaian Berhasil Di Buat!!');
                    location.reload();
                }
            },
        })
    }

    var form_tambah_pekerjaan_konsultan_pengawas_kontruksi = $('#form_tambah_pekerjaan_konsultan_pengawas_kontruksi');

    function Simpan_Warning_pekerjaan_konsultan_pengawas_kontruksi_warning() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('beranda/tambah_warning_pekerjaan_konsultan_pengawas_kontruksisaya') ?>',
            data: form_tambah_pekerjaan_konsultan_pengawas_kontruksi.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $("#kirim_ke_vendor").css('display', 'block');
            },
            success: function(response) {
                $("#kirim_ke_vendor").css('display', 'none');
                window.open('https://api.whatsapp.com/send?phone=+62' + response['telpon'] + '&text=Laporan Penilaian Kinerja Vendor Nama Paket  : ' + response['paket'].nama_paket + ' Dengan Metode Pemilihan : ' + response['paket'].nama_metode_pemilihan + '  Agency : ' + response['paket'].nama_unit_kerja + ', Info : ' + response['isi'] + '', '_blank');
                message3('success', 'Penilaian Berhasil Di Buat');
                location.reload();
            },
        })
    }

    var form_tambah_pekerjaan_konsultan_pengawas_kontruksi_reset = $('#form_tambah_pekerjaan_konsultan_pengawas_kontruksi');

    function Reset_nilai_pekerjaan_konsultan_pengawas_kontruksi() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('beranda/reset_penilaian_performance_pekerjaan_konsultan_pengawas_kontruksi') ?>',
            data: form_tambah_pekerjaan_konsultan_pengawas_kontruksi_reset.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $("#kirim_ke_vendor").css('display', 'block');
            },
            success: function(response) {
                $("#kirim_ke_vendor").css('display', 'none');
                window.open('https://api.whatsapp.com/send?phone=+62' + response['telpon'] + '&text=Laporan Penilaian Kinerja Vendor Nama Paket  : ' + response['paket'].nama_paket + ' Dengan Metode Pemilihan : ' + response['paket'].nama_metode_pemilihan + '  Agency : ' + response['paket'].nama_unit_kerja + ', Info : ' + response['isi'] + '', '_blank');
                message5('success', 'Penilaian Berhasil Di Reset');
                location.reload();
            },
        })
    }
</script>
<!-- INI UNTUK UPDATENYA -->
<script>
    function message3(icon, text) {
        swal({
            title: "Good Jobs!!!",
            text: text,
            icon: icon,
        });
    }
    var form_tambah_pekerjaan_konsultan_pengawas_kontruksi = $('#form_tambah_pekerjaan_konsultan_pengawas_kontruksi');

    function Update_pekerjaan_konsultan_pengawas_kontruksi() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('beranda/update_pekerjaan_konsultan_pengawas_kontruksisaya') ?>',
            data: form_tambah_pekerjaan_konsultan_pengawas_kontruksi.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message3('success', 'Penilaian Berhasil Di Update!!');
                    location.reload();
                }
            },
        })
    }
</script>


<!-- INI UNTUK VALIDASI ANGKANYA Bagian UPDATE-->
<script>
    function message(icon, text) {
        swal({
            title: "Maaf Tidak Boleh Huruf Yaa !!!",
            text: text,
            icon: icon,
        });
    }

    function message_gak_boleh_lebih_angkanya(icon, text) {
        swal({
            title: "Maaf Angka Penilaian Tidak Boleh Lebih Dari 100 Yaa !!!",
            text: text,
            icon: icon,
        });
    }
    $('#penilaian_konsultan_pengawas_kontruksi_update1').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_pengawas_kontruksi_update1').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_pengawas_kontruksi_update1").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_pengawas_kontruksi_update1 = $('#penilaian_konsultan_pengawas_kontruksi_update1').val();
                if (penilaian_konsultan_pengawas_kontruksi_update1.match(validasiHuruf)) {
                    $('#penilaian_konsultan_pengawas_kontruksi_update1').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_pengawas_kontruksi_update1').css('border-color', 'green');
                    $('#penilaian_konsultan_pengawas_kontruksi_update1').val(penilaian_konsultan_pengawas_kontruksi_update1);

                }

            };

        }
    });
    $('#penilaian_konsultan_pengawas_kontruksi_update2').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_pengawas_kontruksi_update2').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_pengawas_kontruksi_update2").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_pengawas_kontruksi_update2 = $('#penilaian_konsultan_pengawas_kontruksi_update2').val();
                if (penilaian_konsultan_pengawas_kontruksi_update2.match(validasiHuruf)) {
                    $('#penilaian_konsultan_pengawas_kontruksi_update2').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_pengawas_kontruksi_update2').css('border-color', 'green');
                    $('#penilaian_konsultan_pengawas_kontruksi_update2').val(penilaian_konsultan_pengawas_kontruksi_update2);

                }

            };

        }
    });

    $('#penilaian_konsultan_pengawas_kontruksi_update3').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_pengawas_kontruksi_update3').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_pengawas_kontruksi_update3").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_pengawas_kontruksi_update3 = $('#penilaian_konsultan_pengawas_kontruksi_update3').val();
                if (penilaian_konsultan_pengawas_kontruksi_update3.match(validasiHuruf)) {
                    $('#penilaian_konsultan_pengawas_kontruksi_update3').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_pengawas_kontruksi_update3').css('border-color', 'green');
                    $('#penilaian_konsultan_pengawas_kontruksi_update3').val(penilaian_konsultan_pengawas_kontruksi_update3);

                }

            };

        }
    });
    $('#penilaian_konsultan_pengawas_kontruksi_update4').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_pengawas_kontruksi_update4').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_pengawas_kontruksi_update4").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_pengawas_kontruksi_update4 = $('#penilaian_konsultan_pengawas_kontruksi_update4').val();
                if (penilaian_konsultan_pengawas_kontruksi_update4.match(validasiHuruf)) {
                    $('#penilaian_konsultan_pengawas_kontruksi_update4').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_pengawas_kontruksi_update4').css('border-color', 'green');
                    $('#penilaian_konsultan_pengawas_kontruksi_update4').val(penilaian_konsultan_pengawas_kontruksi_update4);

                }

            };

        }
    });
    $('#penilaian_konsultan_pengawas_kontruksi_update5').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_pengawas_kontruksi_update5').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_pengawas_kontruksi_update5").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_pengawas_kontruksi_update5 = $('#penilaian_konsultan_pengawas_kontruksi_update5').val();
                if (penilaian_konsultan_pengawas_kontruksi_update5.match(validasiHuruf)) {
                    $('#penilaian_konsultan_pengawas_kontruksi_update5').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_pengawas_kontruksi_update5').css('border-color', 'green');
                    $('#penilaian_konsultan_pengawas_kontruksi_update5').val(penilaian_konsultan_pengawas_kontruksi_update5);

                }

            };

        }
    });
    $('#penilaian_konsultan_pengawas_kontruksi_update6').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_pengawas_kontruksi_update6').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_pengawas_kontruksi_update6").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_pengawas_kontruksi_update6 = $('#penilaian_konsultan_pengawas_kontruksi_update6').val();
                if (penilaian_konsultan_pengawas_kontruksi_update6.match(validasiHuruf)) {
                    $('#penilaian_konsultan_pengawas_kontruksi_update6').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_pengawas_kontruksi_update6').css('border-color', 'green');
                    $('#penilaian_konsultan_pengawas_kontruksi_update6').val(penilaian_konsultan_pengawas_kontruksi_update6);

                }

            };

        }
    });
    $('#penilaian_konsultan_pengawas_kontruksi_update7').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_pengawas_kontruksi_update7').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_pengawas_kontruksi_update7").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_pengawas_kontruksi_update7 = $('#penilaian_konsultan_pengawas_kontruksi_update7').val();
                if (penilaian_konsultan_pengawas_kontruksi_update7.match(validasiHuruf)) {
                    $('#penilaian_konsultan_pengawas_kontruksi_update7').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_pengawas_kontruksi_update7').css('border-color', 'green');
                    $('#penilaian_konsultan_pengawas_kontruksi_update7').val(penilaian_konsultan_pengawas_kontruksi_update7);

                }

            };

        }
    });
    $('#penilaian_konsultan_pengawas_kontruksi_update8').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_pengawas_kontruksi_update8').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_pengawas_kontruksi_update8").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_pengawas_kontruksi_update8 = $('#penilaian_konsultan_pengawas_kontruksi_update8').val();
                if (penilaian_konsultan_pengawas_kontruksi_update8.match(validasiHuruf)) {
                    $('#penilaian_konsultan_pengawas_kontruksi_update8').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_pengawas_kontruksi_update8').css('border-color', 'green');
                    $('#penilaian_konsultan_pengawas_kontruksi_update8').val(penilaian_konsultan_pengawas_kontruksi_update8);

                }

            };

        }
    });
    $('#penilaian_konsultan_pengawas_kontruksi_update9').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_pengawas_kontruksi_update9').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_pengawas_kontruksi_update9").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_pengawas_kontruksi_update9 = $('#penilaian_konsultan_pengawas_kontruksi_update9').val();
                if (penilaian_konsultan_pengawas_kontruksi_update9.match(validasiHuruf)) {
                    $('#penilaian_konsultan_pengawas_kontruksi_update9').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_pengawas_kontruksi_update9').css('border-color', 'green');
                    $('#penilaian_konsultan_pengawas_kontruksi_update9').val(penilaian_konsultan_pengawas_kontruksi_update9);

                }

            };

        }
    });
    $('#penilaian_konsultan_pengawas_kontruksi_update10').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_pengawas_kontruksi_update10').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_pengawas_kontruksi_update10").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_pengawas_kontruksi_update10 = $('#penilaian_konsultan_pengawas_kontruksi_update10').val();
                if (penilaian_konsultan_pengawas_kontruksi_update10.match(validasiHuruf)) {
                    $('#penilaian_konsultan_pengawas_kontruksi_update10').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_pengawas_kontruksi_update10').css('border-color', 'green');
                    $('#penilaian_konsultan_pengawas_kontruksi_update10').val(penilaian_konsultan_pengawas_kontruksi_update10);

                }

            };

        }
    });
    $('#penilaian_konsultan_pengawas_kontruksi_update11').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_pengawas_kontruksi_update11').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_pengawas_kontruksi_update11").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_pengawas_kontruksi_update11 = $('#penilaian_konsultan_pengawas_kontruksi_update11').val();
                if (penilaian_konsultan_pengawas_kontruksi_update11.match(validasiHuruf)) {
                    $('#penilaian_konsultan_pengawas_kontruksi_update11').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_pengawas_kontruksi_update11').css('border-color', 'green');
                    $('#penilaian_konsultan_pengawas_kontruksi_update11').val(penilaian_konsultan_pengawas_kontruksi_update11);

                }

            };

        }
    });
    $('#penilaian_konsultan_pengawas_kontruksi_update12').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_pengawas_kontruksi_update12').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_pengawas_kontruksi_update12").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_pengawas_kontruksi_update12 = $('#penilaian_konsultan_pengawas_kontruksi_update12').val();
                if (penilaian_konsultan_pengawas_kontruksi_update12.match(validasiHuruf)) {
                    $('#penilaian_konsultan_pengawas_kontruksi_update12').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_pengawas_kontruksi_update12').css('border-color', 'green');
                    $('#penilaian_konsultan_pengawas_kontruksi_update12').val(penilaian_konsultan_pengawas_kontruksi_update12);

                }

            };

        }
    });
    $('#penilaian_konsultan_pengawas_kontruksi_update13').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_pengawas_kontruksi_update13').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_pengawas_kontruksi_update13").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_pengawas_kontruksi_update13 = $('#penilaian_konsultan_pengawas_kontruksi_update13').val();
                if (penilaian_konsultan_pengawas_kontruksi_update13.match(validasiHuruf)) {
                    $('#penilaian_konsultan_pengawas_kontruksi_update13').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_pengawas_kontruksi_update13').css('border-color', 'green');
                    $('#penilaian_konsultan_pengawas_kontruksi_update13').val(penilaian_konsultan_pengawas_kontruksi_update13);

                }

            };

        }
    });
    $('#penilaian_konsultan_pengawas_kontruksi_update14').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_pengawas_kontruksi_update14').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_pengawas_kontruksi_update14").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_pengawas_kontruksi_update14 = $('#penilaian_konsultan_pengawas_kontruksi_update14').val();
                if (penilaian_konsultan_pengawas_kontruksi_update14.match(validasiHuruf)) {
                    $('#penilaian_konsultan_pengawas_kontruksi_update14').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_pengawas_kontruksi_update14').css('border-color', 'green');
                    $('#penilaian_konsultan_pengawas_kontruksi_update14').val(penilaian_konsultan_pengawas_kontruksi_update14);

                }

            };

        }
    });
    $('#penilaian_konsultan_pengawas_kontruksi_update15').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_pengawas_kontruksi_update15').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_pengawas_kontruksi_update15").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_pengawas_kontruksi_update15 = $('#penilaian_konsultan_pengawas_kontruksi_update15').val();
                if (penilaian_konsultan_pengawas_kontruksi_update15.match(validasiHuruf)) {
                    $('#penilaian_konsultan_pengawas_kontruksi_update15').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_pengawas_kontruksi_update15').css('border-color', 'green');
                    $('#penilaian_konsultan_pengawas_kontruksi_update15').val(penilaian_konsultan_pengawas_kontruksi_update15);

                }

            };

        }
    });
</script>


<!-- INI UNTUK VALIDASI ANGKANYA Bagian tambah-->
<script>
    function message(icon, text) {
        swal({
            title: "Maaf Tidak Boleh Huruf Yaa !!!",
            text: text,
            icon: icon,
        });
    }

    function message_gak_boleh_lebih_angkanya(icon, text) {
        swal({
            title: "Maaf Angka Penilaian Tidak Boleh Lebih Dari 100 Yaa !!!",
            text: text,
            icon: icon,
        });
    }
    $('#penilaian_konsultan_pengawas_kontruksi1').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_pengawas_kontruksi1').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_pengawas_kontruksi1").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_pengawas_kontruksi1 = $('#penilaian_konsultan_pengawas_kontruksi1').val();
                if (penilaian_konsultan_pengawas_kontruksi1.match(validasiHuruf)) {
                    $('#penilaian_konsultan_pengawas_kontruksi1').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_pengawas_kontruksi1').css('border-color', 'green');
                    $('#penilaian_konsultan_pengawas_kontruksi1').val(penilaian_konsultan_pengawas_kontruksi1);

                }

            };

        }
    });
    $('#penilaian_konsultan_pengawas_kontruksi2').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_pengawas_kontruksi2').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_pengawas_kontruksi2").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_pengawas_kontruksi2 = $('#penilaian_konsultan_pengawas_kontruksi2').val();
                if (penilaian_konsultan_pengawas_kontruksi2.match(validasiHuruf)) {
                    $('#penilaian_konsultan_pengawas_kontruksi2').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_pengawas_kontruksi2').css('border-color', 'green');
                    $('#penilaian_konsultan_pengawas_kontruksi2').val(penilaian_konsultan_pengawas_kontruksi2);

                }

            };

        }
    });

    $('#penilaian_konsultan_pengawas_kontruksi3').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_pengawas_kontruksi3').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_pengawas_kontruksi3").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_pengawas_kontruksi3 = $('#penilaian_konsultan_pengawas_kontruksi3').val();
                if (penilaian_konsultan_pengawas_kontruksi3.match(validasiHuruf)) {
                    $('#penilaian_konsultan_pengawas_kontruksi3').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_pengawas_kontruksi3').css('border-color', 'green');
                    $('#penilaian_konsultan_pengawas_kontruksi3').val(penilaian_konsultan_pengawas_kontruksi3);

                }

            };

        }
    });
    $('#penilaian_konsultan_pengawas_kontruksi4').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_pengawas_kontruksi4').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_pengawas_kontruksi4").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_pengawas_kontruksi4 = $('#penilaian_konsultan_pengawas_kontruksi4').val();
                if (penilaian_konsultan_pengawas_kontruksi4.match(validasiHuruf)) {
                    $('#penilaian_konsultan_pengawas_kontruksi4').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_pengawas_kontruksi4').css('border-color', 'green');
                    $('#penilaian_konsultan_pengawas_kontruksi4').val(penilaian_konsultan_pengawas_kontruksi4);

                }

            };

        }
    });
    $('#penilaian_konsultan_pengawas_kontruksi5').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_pengawas_kontruksi5').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_pengawas_kontruksi5").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_pengawas_kontruksi5 = $('#penilaian_konsultan_pengawas_kontruksi5').val();
                if (penilaian_konsultan_pengawas_kontruksi5.match(validasiHuruf)) {
                    $('#penilaian_konsultan_pengawas_kontruksi5').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_pengawas_kontruksi5').css('border-color', 'green');
                    $('#penilaian_konsultan_pengawas_kontruksi5').val(penilaian_konsultan_pengawas_kontruksi5);

                }

            };

        }
    });
    $('#penilaian_konsultan_pengawas_kontruksi6').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_pengawas_kontruksi6').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_pengawas_kontruksi6").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_pengawas_kontruksi6 = $('#penilaian_konsultan_pengawas_kontruksi6').val();
                if (penilaian_konsultan_pengawas_kontruksi6.match(validasiHuruf)) {
                    $('#penilaian_konsultan_pengawas_kontruksi6').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_pengawas_kontruksi6').css('border-color', 'green');
                    $('#penilaian_konsultan_pengawas_kontruksi6').val(penilaian_konsultan_pengawas_kontruksi6);

                }

            };

        }
    });
    $('#penilaian_konsultan_pengawas_kontruksi7').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_pengawas_kontruksi7').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_pengawas_kontruksi7").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_pengawas_kontruksi7 = $('#penilaian_konsultan_pengawas_kontruksi7').val();
                if (penilaian_konsultan_pengawas_kontruksi7.match(validasiHuruf)) {
                    $('#penilaian_konsultan_pengawas_kontruksi7').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_pengawas_kontruksi7').css('border-color', 'green');
                    $('#penilaian_konsultan_pengawas_kontruksi7').val(penilaian_konsultan_pengawas_kontruksi7);

                }

            };

        }
    });
    $('#penilaian_konsultan_pengawas_kontruksi8').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_pengawas_kontruksi8').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_pengawas_kontruksi8").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_pengawas_kontruksi8 = $('#penilaian_konsultan_pengawas_kontruksi8').val();
                if (penilaian_konsultan_pengawas_kontruksi8.match(validasiHuruf)) {
                    $('#penilaian_konsultan_pengawas_kontruksi8').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_pengawas_kontruksi8').css('border-color', 'green');
                    $('#penilaian_konsultan_pengawas_kontruksi8').val(penilaian_konsultan_pengawas_kontruksi8);

                }

            };

        }
    });
    $('#penilaian_konsultan_pengawas_kontruksi9').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_pengawas_kontruksi9').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_pengawas_kontruksi9").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_pengawas_kontruksi9 = $('#penilaian_konsultan_pengawas_kontruksi9').val();
                if (penilaian_konsultan_pengawas_kontruksi9.match(validasiHuruf)) {
                    $('#penilaian_konsultan_pengawas_kontruksi9').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_pengawas_kontruksi9').css('border-color', 'green');
                    $('#penilaian_konsultan_pengawas_kontruksi9').val(penilaian_konsultan_pengawas_kontruksi9);

                }

            };

        }
    });
    $('#penilaian_konsultan_pengawas_kontruksi10').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_pengawas_kontruksi10').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_pengawas_kontruksi10").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_pengawas_kontruksi10 = $('#penilaian_konsultan_pengawas_kontruksi10').val();
                if (penilaian_konsultan_pengawas_kontruksi10.match(validasiHuruf)) {
                    $('#penilaian_konsultan_pengawas_kontruksi10').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_pengawas_kontruksi10').css('border-color', 'green');
                    $('#penilaian_konsultan_pengawas_kontruksi10').val(penilaian_konsultan_pengawas_kontruksi10);

                }

            };

        }
    });
    $('#penilaian_konsultan_pengawas_kontruksi11').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_pengawas_kontruksi11').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_pengawas_kontruksi11").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_pengawas_kontruksi11 = $('#penilaian_konsultan_pengawas_kontruksi11').val();
                if (penilaian_konsultan_pengawas_kontruksi11.match(validasiHuruf)) {
                    $('#penilaian_konsultan_pengawas_kontruksi11').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_pengawas_kontruksi11').css('border-color', 'green');
                    $('#penilaian_konsultan_pengawas_kontruksi11').val(penilaian_konsultan_pengawas_kontruksi11);

                }

            };

        }
    });
    $('#penilaian_konsultan_pengawas_kontruksi12').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_pengawas_kontruksi12').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_pengawas_kontruksi12").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_pengawas_kontruksi12 = $('#penilaian_konsultan_pengawas_kontruksi12').val();
                if (penilaian_konsultan_pengawas_kontruksi12.match(validasiHuruf)) {
                    $('#penilaian_konsultan_pengawas_kontruksi12').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_pengawas_kontruksi12').css('border-color', 'green');
                    $('#penilaian_konsultan_pengawas_kontruksi12').val(penilaian_konsultan_pengawas_kontruksi12);

                }

            };

        }
    });
    $('#penilaian_konsultan_pengawas_kontruksi13').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_pengawas_kontruksi13').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_pengawas_kontruksi13").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_pengawas_kontruksi13 = $('#penilaian_konsultan_pengawas_kontruksi13').val();
                if (penilaian_konsultan_pengawas_kontruksi13.match(validasiHuruf)) {
                    $('#penilaian_konsultan_pengawas_kontruksi13').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_pengawas_kontruksi13').css('border-color', 'green');
                    $('#penilaian_konsultan_pengawas_kontruksi13').val(penilaian_konsultan_pengawas_kontruksi13);

                }

            };

        }
    });
    $('#penilaian_konsultan_pengawas_kontruksi14').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_pengawas_kontruksi14').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_pengawas_kontruksi14").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_pengawas_kontruksi14 = $('#penilaian_konsultan_pengawas_kontruksi14').val();
                if (penilaian_konsultan_pengawas_kontruksi14.match(validasiHuruf)) {
                    $('#penilaian_konsultan_pengawas_kontruksi14').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_pengawas_kontruksi14').css('border-color', 'green');
                    $('#penilaian_konsultan_pengawas_kontruksi14').val(penilaian_konsultan_pengawas_kontruksi14);

                }

            };

        }
    });
    $('#penilaian_konsultan_pengawas_kontruksi15').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_pengawas_kontruksi15').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_pengawas_kontruksi15").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_pengawas_kontruksi15 = $('#penilaian_konsultan_pengawas_kontruksi15').val();
                if (penilaian_konsultan_pengawas_kontruksi15.match(validasiHuruf)) {
                    $('#penilaian_konsultan_pengawas_kontruksi15').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_pengawas_kontruksi15').css('border-color', 'green');
                    $('#penilaian_konsultan_pengawas_kontruksi15').val(penilaian_konsultan_pengawas_kontruksi15);

                }

            };

        }
    });
</script>


<!-- ININ UNTUK VALIDASI BUTTON dan nilaik akhir TAMBAH -->
<!-- keyup nilai pekerjaan kontruksi -->
<script>
    $(document).ready(function() {
        $("#penilaian_konsultan_pengawas_kontruksi1, #penilaian_konsultan_pengawas_kontruksi2, #penilaian_konsultan_pengawas_kontruksi3, #penilaian_konsultan_pengawas_kontruksi4,#penilaian_konsultan_pengawas_kontruksi5,#penilaian_konsultan_pengawas_kontruksi6,#penilaian_konsultan_pengawas_kontruksi7,#penilaian_konsultan_pengawas_kontruksi8,#penilaian_konsultan_pengawas_kontruksi9,#penilaian_konsultan_pengawas_kontruksi10,#penilaian_konsultan_pengawas_kontruksi11,#penilaian_konsultan_pengawas_kontruksi12,#penilaian_konsultan_pengawas_kontruksi13,#penilaian_konsultan_pengawas_kontruksi14,#penilaian_konsultan_pengawas_kontruksi15,#penilaian_konsultan_pengawas_kontruksi16,#penilaian_konsultan_pengawas_kontruksi17").keyup(function() {
            // 1
            var bobot_pekerjaan_kontruksi1 = $('#bobot_pekerjaan_konsultan_pengawas_kontruksi1').val();
            var penilaian_kontruksi1 = $('#penilaian_konsultan_pengawas_kontruksi1').val();
            var nilai_akhir_kontruksi1 = bobot_pekerjaan_kontruksi1 * penilaian_kontruksi1 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek1').val(parseFloat(nilai_akhir_kontruksi1));
            // 2
            var bobot_pekerjaan_kontruksi2 = $('#bobot_pekerjaan_konsultan_pengawas_kontruksi2').val();
            var penilaian_kontruksi2 = $('#penilaian_konsultan_pengawas_kontruksi2').val();
            var nilai_akhir_kontruksi2 = bobot_pekerjaan_kontruksi2 * penilaian_kontruksi2 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek2').val(parseFloat(nilai_akhir_kontruksi2));
            // 3
            var bobot_pekerjaan_kontruksi3 = $('#bobot_pekerjaan_konsultan_pengawas_kontruksi3').val();
            var penilaian_kontruksi3 = $('#penilaian_konsultan_pengawas_kontruksi3').val();
            var nilai_akhir_kontruksi3 = bobot_pekerjaan_kontruksi3 * penilaian_kontruksi3 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek3').val(parseFloat(nilai_akhir_kontruksi3));
            // 4
            var bobot_pekerjaan_kontruksi4 = $('#bobot_pekerjaan_konsultan_pengawas_kontruksi4').val();
            var penilaian_kontruksi4 = $('#penilaian_konsultan_pengawas_kontruksi4').val();
            var nilai_akhir_kontruksi4 = bobot_pekerjaan_kontruksi4 * penilaian_kontruksi4 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek4').val(parseFloat(nilai_akhir_kontruksi4));
            // 5
            var bobot_pekerjaan_kontruksi5 = $('#bobot_pekerjaan_konsultan_pengawas_kontruksi5').val();
            var penilaian_kontruksi5 = $('#penilaian_konsultan_pengawas_kontruksi5').val();
            var nilai_akhir_kontruksi5 = bobot_pekerjaan_kontruksi5 * penilaian_kontruksi5 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek5').val(parseFloat(nilai_akhir_kontruksi5));
            // 6
            var bobot_pekerjaan_kontruksi6 = $('#bobot_pekerjaan_konsultan_pengawas_kontruksi6').val();
            var penilaian_kontruksi6 = $('#penilaian_konsultan_pengawas_kontruksi6').val();
            var nilai_akhir_kontruksi6 = bobot_pekerjaan_kontruksi6 * penilaian_kontruksi6 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek6').val(parseFloat(nilai_akhir_kontruksi6));
            // 7
            var bobot_pekerjaan_kontruksi7 = $('#bobot_pekerjaan_konsultan_pengawas_kontruksi7').val();
            var penilaian_kontruksi7 = $('#penilaian_konsultan_pengawas_kontruksi7').val();
            var nilai_akhir_kontruksi7 = bobot_pekerjaan_kontruksi7 * penilaian_kontruksi7 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek7').val(parseFloat(nilai_akhir_kontruksi7));
            // 8
            var bobot_pekerjaan_kontruksi8 = $('#bobot_pekerjaan_konsultan_pengawas_kontruksi8').val();
            var penilaian_kontruksi8 = $('#penilaian_konsultan_pengawas_kontruksi8').val();
            var nilai_akhir_kontruksi8 = bobot_pekerjaan_kontruksi8 * penilaian_kontruksi8 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek8').val(parseFloat(nilai_akhir_kontruksi8));
            // 9
            var bobot_pekerjaan_kontruksi9 = $('#bobot_pekerjaan_konsultan_pengawas_kontruksi9').val();
            var penilaian_kontruksi9 = $('#penilaian_konsultan_pengawas_kontruksi9').val();
            var nilai_akhir_kontruksi9 = bobot_pekerjaan_kontruksi9 * penilaian_kontruksi9 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek9').val(parseFloat(nilai_akhir_kontruksi9));
            // 10
            var bobot_pekerjaan_kontruksi10 = $('#bobot_pekerjaan_konsultan_pengawas_kontruksi10').val();
            var penilaian_kontruksi10 = $('#penilaian_konsultan_pengawas_kontruksi10').val();
            var nilai_akhir_kontruksi10 = bobot_pekerjaan_kontruksi10 * penilaian_kontruksi10 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek10').val(parseFloat(nilai_akhir_kontruksi10));
            // 11
            var bobot_pekerjaan_kontruksi11 = $('#bobot_pekerjaan_konsultan_pengawas_kontruksi11').val();
            var penilaian_kontruksi11 = $('#penilaian_konsultan_pengawas_kontruksi11').val();
            var nilai_akhir_kontruksi11 = bobot_pekerjaan_kontruksi11 * penilaian_kontruksi11 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek11').val(parseFloat(nilai_akhir_kontruksi11));
            // 12
            var bobot_pekerjaan_kontruksi12 = $('#bobot_pekerjaan_konsultan_pengawas_kontruksi12').val();
            var penilaian_kontruksi12 = $('#penilaian_konsultan_pengawas_kontruksi12').val();
            var nilai_akhir_kontruksi12 = bobot_pekerjaan_kontruksi12 * penilaian_kontruksi12 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek12').val(parseFloat(nilai_akhir_kontruksi12));
            // 13
            var bobot_pekerjaan_kontruksi13 = $('#bobot_pekerjaan_konsultan_pengawas_kontruksi13').val();
            var penilaian_kontruksi13 = $('#penilaian_konsultan_pengawas_kontruksi13').val();
            var nilai_akhir_kontruksi13 = bobot_pekerjaan_kontruksi13 * penilaian_kontruksi13 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek13').val(parseFloat(nilai_akhir_kontruksi13));
            // 14
            var bobot_pekerjaan_kontruksi14 = $('#bobot_pekerjaan_konsultan_pengawas_kontruksi14').val();
            var penilaian_kontruksi14 = $('#penilaian_konsultan_pengawas_kontruksi14').val();
            var nilai_akhir_kontruksi14 = bobot_pekerjaan_kontruksi14 * penilaian_kontruksi14 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek14').val(parseFloat(nilai_akhir_kontruksi14));
            // 15
            var bobot_pekerjaan_kontruksi15 = $('#bobot_pekerjaan_konsultan_pengawas_kontruksi15').val();
            var penilaian_kontruksi15 = $('#penilaian_konsultan_pengawas_kontruksi15').val();
            var nilai_akhir_kontruksi15 = bobot_pekerjaan_kontruksi15 * penilaian_kontruksi15 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek15').val(parseFloat(nilai_akhir_kontruksi15));

            var total = parseFloat(nilai_akhir_kontruksi1) + parseFloat(nilai_akhir_kontruksi2) + parseFloat(nilai_akhir_kontruksi3) + parseFloat(nilai_akhir_kontruksi4) + parseFloat(nilai_akhir_kontruksi5) + parseFloat(nilai_akhir_kontruksi6) + parseFloat(nilai_akhir_kontruksi7) + parseFloat(nilai_akhir_kontruksi8) + parseFloat(nilai_akhir_kontruksi9) + parseFloat(nilai_akhir_kontruksi10) + parseFloat(nilai_akhir_kontruksi11) + parseFloat(nilai_akhir_kontruksi12) + parseFloat(nilai_akhir_kontruksi13) + parseFloat(nilai_akhir_kontruksi14) + parseFloat(nilai_akhir_kontruksi15);
            var total_button = $("#total_nilai_pekerjaan_konsultan_pengawas_kontruksi").val(total);
            if (total <= 51) {
                $('[name="rating_penilaian_vendor_pekerjaan_konsultan_pengawas_kontruksi"]').val(4);
                $('[name="status_rating_pekerjaan_konsultan_pengawas_kontruksi"]').val('kurang baik');
                $('[name="status_nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi"]').val(total);
                $('#status_pekerjaan_konsultan_pengawas_kontruksi').html('<label for="" class="badge badge-danger">Kurang Baik</label>');
                $('#warning_button_konsultan_pengawas_kontruksi').show();
                $('#save_button_konsultan_pengawas_kontruksi').hide();
                $('#bintang_pekerjaan_konsultan_pengawas_kontruksi').html('');
            } else if (total <= 70) {
                $('[name="rating_penilaian_vendor_pekerjaan_konsultan_pengawas_kontruksi"]').val(1);
                $('[name="status_rating_pekerjaan_konsultan_pengawas_kontruksi"]').val('cukup baik');
                $('[name="status_nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi"]').val(total);
                $('#save_button_konsultan_pengawas_kontruksi').show();
                $('#warning_button_konsultan_pengawas_kontruksi').hide();
                $('#status_pekerjaan_konsultan_pengawas_kontruksi').html('<label for="" class="badge badge-warning">Cukup Baik</label>');
                $('#bintang_pekerjaan_konsultan_pengawas_kontruksi').html('<i class="fas fa fa-star text-warning"></i>');
            } else if (total <= 80) {
                $('[name="rating_penilaian_vendor_pekerjaan_konsultan_pengawas_kontruksi"]').val(2);
                $('[name="status_rating_pekerjaan_konsultan_pengawas_kontruksi"]').val('baik');
                $('[name="status_nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi"]').val(total);
                $('#save_button_konsultan_pengawas_kontruksi').show();
                $('#warning_button_konsultan_pengawas_kontruksi').hide();
                $('#status_pekerjaan_konsultan_pengawas_kontruksi').html('<label for="" class="badge badge-warning">Baik</label>');
                $('#bintang_pekerjaan_konsultan_pengawas_kontruksi').html('<i class="fas fa fa-star text-warning"></i><i class="fas fa fa-star text-warning"></i>');
            } else {
                $('[name="rating_penilaian_vendor_pekerjaan_konsultan_pengawas_kontruksi"]').val(3);
                $('[name="status_rating_pekerjaan_konsultan_pengawas_kontruksi"]').val('sangat baik');
                $('[name="status_nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi"]').val(total);
                $('#save_button_konsultan_pengawas_kontruksi').show();
                $('#warning_button_konsultan_pengawas_kontruksi').hide();
                $('#status_pekerjaan_konsultan_pengawas_kontruksi').html('<label for="" class="badge badge-success">Sangat Baik</label>');
                $('#bintang_pekerjaan_konsultan_pengawas_kontruksi').html('<i class="fas fa fa-star text-warning"></i><i class="fas fa fa-star text-warning"></i><i class="fas fa fa-star text-warning"></i>');
            }

        });
    });
</script>










<!-- INI BAGIAN UNTUK PENILAIAN PEKERJAAN JASA LAINYA -->

<!-- INI BATAS PENILAIAN PEKERJAAN JASA LAINYA ===================================================================================================================================== -->

<!-- AJAX BARUUU TAMBAH REVISI -->
<script>
    function message3(icon, text) {
        swal({
            title: "Good Jobs!!!",
            text: text,
            icon: icon,
        });
    }

    function message5(icon, text) {
        swal({
            title: "Anda Berhasil Mereset Nilai!!!",
            text: text,
            icon: icon,
        });
    }
    var form_tambah_pekerjaan_konsultan_jasa_lainya_kontruksi = $('#form_tambah_pekerjaan_konsultan_jasa_lainya_kontruksi');

    function Simpan_pekerjaan_konsultan_jasa_lainya_kontruksi() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('beranda/tambah_pekerjaan_konsultan_jasa_lainya_kontruksisaya') ?>',
            data: form_tambah_pekerjaan_konsultan_jasa_lainya_kontruksi.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message3('success', 'Penilaian Berhasil Di Buat!!');
                    location.reload();
                }
            },
        })
    }

    var form_tambah_pekerjaan_konsultan_jasa_lainya_kontruksi = $('#form_tambah_pekerjaan_konsultan_jasa_lainya_kontruksi');

    function Simpan_Warning_pekerjaan_konsultan_jasa_lainya_kontruksi_warning() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('beranda/tambah_warning_pekerjaan_konsultan_jasa_lainya_kontruksisaya') ?>',
            data: form_tambah_pekerjaan_konsultan_jasa_lainya_kontruksi.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $("#kirim_ke_vendor").css('display', 'block');
            },
            success: function(response) {
                $("#kirim_ke_vendor").css('display', 'none');
                window.open('https://api.whatsapp.com/send?phone=+62' + response['telpon'] + '&text=Laporan Penilaian Kinerja Vendor Nama Paket  : ' + response['paket'].nama_paket + ' Dengan Metode Pemilihan : ' + response['paket'].nama_metode_pemilihan + '  Agency : ' + response['paket'].nama_unit_kerja + ', Info : ' + response['isi'] + '', '_blank');
                message3('success', 'Penilaian Berhasil Di Buat');
                location.reload();
            },
        })
    }

    var form_tambah_pekerjaan_konsultan_jasa_lainya_kontruksi_reset = $('#form_tambah_pekerjaan_konsultan_jasa_lainya_kontruksi');

    function Reset_nilai_pekerjaan_konsultan_jasa_lainya_kontruksi() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('beranda/reset_penilaian_performance_pekerjaan_konsultan_jasa_lainya_kontruksi') ?>',
            data: form_tambah_pekerjaan_konsultan_jasa_lainya_kontruksi_reset.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $("#kirim_ke_vendor").css('display', 'block');
            },
            success: function(response) {
                $("#kirim_ke_vendor").css('display', 'none');
                window.open('https://api.whatsapp.com/send?phone=+62' + response['telpon'] + '&text=Laporan Penilaian Kinerja Vendor Nama Paket  : ' + response['paket'].nama_paket + ' Dengan Metode Pemilihan : ' + response['paket'].nama_metode_pemilihan + '  Agency : ' + response['paket'].nama_unit_kerja + ', Info : ' + response['isi'] + '', '_blank');
                message5('success', 'Penilaian Berhasil Di Reset');
                location.reload();
            },
        })
    }
</script>
<!-- INI UNTUK UPDATENYA -->
<script>
    function message3(icon, text) {
        swal({
            title: "Good Jobs!!!",
            text: text,
            icon: icon,
        });
    }
    var form_tambah_pekerjaan_konsultan_jasa_lainya_kontruksi = $('#form_tambah_pekerjaan_konsultan_jasa_lainya_kontruksi');

    function Update_pekerjaan_konsultan_jasa_lainya_kontruksi() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('beranda/update_pekerjaan_konsultan_jasa_lainya_kontruksisaya') ?>',
            data: form_tambah_pekerjaan_konsultan_jasa_lainya_kontruksi.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message3('success', 'Penilaian Berhasil Di Update!!');
                    location.reload();
                }
            },
        })
    }
</script>


<!-- INI UNTUK VALIDASI ANGKANYA Bagian UPDATE-->
<script>
    function message(icon, text) {
        swal({
            title: "Maaf Tidak Boleh Huruf Yaa !!!",
            text: text,
            icon: icon,
        });
    }

    function message_gak_boleh_lebih_angkanya(icon, text) {
        swal({
            title: "Maaf Angka Penilaian Tidak Boleh Lebih Dari 100 Yaa !!!",
            text: text,
            icon: icon,
        });
    }
    $('#penilaian_konsultan_jasa_lainya_kontruksi_update1').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_jasa_lainya_kontruksi_update1').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_jasa_lainya_kontruksi_update1").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_jasa_lainya_kontruksi_update1 = $('#penilaian_konsultan_jasa_lainya_kontruksi_update1').val();
                if (penilaian_konsultan_jasa_lainya_kontruksi_update1.match(validasiHuruf)) {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update1').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update1').css('border-color', 'green');
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update1').val(penilaian_konsultan_jasa_lainya_kontruksi_update1);

                }

            };

        }
    });
    $('#penilaian_konsultan_jasa_lainya_kontruksi_update2').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_jasa_lainya_kontruksi_update2').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_jasa_lainya_kontruksi_update2").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_jasa_lainya_kontruksi_update2 = $('#penilaian_konsultan_jasa_lainya_kontruksi_update2').val();
                if (penilaian_konsultan_jasa_lainya_kontruksi_update2.match(validasiHuruf)) {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update2').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update2').css('border-color', 'green');
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update2').val(penilaian_konsultan_jasa_lainya_kontruksi_update2);

                }

            };

        }
    });

    $('#penilaian_konsultan_jasa_lainya_kontruksi_update3').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_jasa_lainya_kontruksi_update3').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_jasa_lainya_kontruksi_update3").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_jasa_lainya_kontruksi_update3 = $('#penilaian_konsultan_jasa_lainya_kontruksi_update3').val();
                if (penilaian_konsultan_jasa_lainya_kontruksi_update3.match(validasiHuruf)) {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update3').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update3').css('border-color', 'green');
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update3').val(penilaian_konsultan_jasa_lainya_kontruksi_update3);

                }

            };

        }
    });
    $('#penilaian_konsultan_jasa_lainya_kontruksi_update4').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_jasa_lainya_kontruksi_update4').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_jasa_lainya_kontruksi_update4").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_jasa_lainya_kontruksi_update4 = $('#penilaian_konsultan_jasa_lainya_kontruksi_update4').val();
                if (penilaian_konsultan_jasa_lainya_kontruksi_update4.match(validasiHuruf)) {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update4').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update4').css('border-color', 'green');
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update4').val(penilaian_konsultan_jasa_lainya_kontruksi_update4);

                }

            };

        }
    });
    $('#penilaian_konsultan_jasa_lainya_kontruksi_update5').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_jasa_lainya_kontruksi_update5').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_jasa_lainya_kontruksi_update5").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_jasa_lainya_kontruksi_update5 = $('#penilaian_konsultan_jasa_lainya_kontruksi_update5').val();
                if (penilaian_konsultan_jasa_lainya_kontruksi_update5.match(validasiHuruf)) {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update5').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update5').css('border-color', 'green');
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update5').val(penilaian_konsultan_jasa_lainya_kontruksi_update5);

                }

            };

        }
    });
    $('#penilaian_konsultan_jasa_lainya_kontruksi_update6').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_jasa_lainya_kontruksi_update6').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_jasa_lainya_kontruksi_update6").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_jasa_lainya_kontruksi_update6 = $('#penilaian_konsultan_jasa_lainya_kontruksi_update6').val();
                if (penilaian_konsultan_jasa_lainya_kontruksi_update6.match(validasiHuruf)) {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update6').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update6').css('border-color', 'green');
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update6').val(penilaian_konsultan_jasa_lainya_kontruksi_update6);

                }

            };

        }
    });
    $('#penilaian_konsultan_jasa_lainya_kontruksi_update7').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_jasa_lainya_kontruksi_update7').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_jasa_lainya_kontruksi_update7").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_jasa_lainya_kontruksi_update7 = $('#penilaian_konsultan_jasa_lainya_kontruksi_update7').val();
                if (penilaian_konsultan_jasa_lainya_kontruksi_update7.match(validasiHuruf)) {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update7').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update7').css('border-color', 'green');
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update7').val(penilaian_konsultan_jasa_lainya_kontruksi_update7);

                }

            };

        }
    });
    $('#penilaian_konsultan_jasa_lainya_kontruksi_update8').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_jasa_lainya_kontruksi_update8').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_jasa_lainya_kontruksi_update8").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_jasa_lainya_kontruksi_update8 = $('#penilaian_konsultan_jasa_lainya_kontruksi_update8').val();
                if (penilaian_konsultan_jasa_lainya_kontruksi_update8.match(validasiHuruf)) {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update8').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update8').css('border-color', 'green');
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update8').val(penilaian_konsultan_jasa_lainya_kontruksi_update8);

                }

            };

        }
    });
    $('#penilaian_konsultan_jasa_lainya_kontruksi_update9').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_jasa_lainya_kontruksi_update9').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_jasa_lainya_kontruksi_update9").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_jasa_lainya_kontruksi_update9 = $('#penilaian_konsultan_jasa_lainya_kontruksi_update9').val();
                if (penilaian_konsultan_jasa_lainya_kontruksi_update9.match(validasiHuruf)) {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update9').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update9').css('border-color', 'green');
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update9').val(penilaian_konsultan_jasa_lainya_kontruksi_update9);

                }

            };

        }
    });
    $('#penilaian_konsultan_jasa_lainya_kontruksi_update10').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_jasa_lainya_kontruksi_update10').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_jasa_lainya_kontruksi_update10").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_jasa_lainya_kontruksi_update10 = $('#penilaian_konsultan_jasa_lainya_kontruksi_update10').val();
                if (penilaian_konsultan_jasa_lainya_kontruksi_update10.match(validasiHuruf)) {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update10').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update10').css('border-color', 'green');
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update10').val(penilaian_konsultan_jasa_lainya_kontruksi_update10);

                }

            };

        }
    });
    $('#penilaian_konsultan_jasa_lainya_kontruksi_update11').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_jasa_lainya_kontruksi_update11').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_jasa_lainya_kontruksi_update11").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_jasa_lainya_kontruksi_update11 = $('#penilaian_konsultan_jasa_lainya_kontruksi_update11').val();
                if (penilaian_konsultan_jasa_lainya_kontruksi_update11.match(validasiHuruf)) {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update11').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update11').css('border-color', 'green');
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update11').val(penilaian_konsultan_jasa_lainya_kontruksi_update11);

                }

            };

        }
    });
    $('#penilaian_konsultan_jasa_lainya_kontruksi_update12').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_jasa_lainya_kontruksi_update12').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_jasa_lainya_kontruksi_update12").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_jasa_lainya_kontruksi_update12 = $('#penilaian_konsultan_jasa_lainya_kontruksi_update12').val();
                if (penilaian_konsultan_jasa_lainya_kontruksi_update12.match(validasiHuruf)) {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update12').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update12').css('border-color', 'green');
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update12').val(penilaian_konsultan_jasa_lainya_kontruksi_update12);

                }

            };

        }
    });
    $('#penilaian_konsultan_jasa_lainya_kontruksi_update13').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_jasa_lainya_kontruksi_update13').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_jasa_lainya_kontruksi_update13").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_jasa_lainya_kontruksi_update13 = $('#penilaian_konsultan_jasa_lainya_kontruksi_update13').val();
                if (penilaian_konsultan_jasa_lainya_kontruksi_update13.match(validasiHuruf)) {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update13').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update13').css('border-color', 'green');
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update13').val(penilaian_konsultan_jasa_lainya_kontruksi_update13);

                }

            };

        }
    });
    $('#penilaian_konsultan_jasa_lainya_kontruksi_update14').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_jasa_lainya_kontruksi_update14').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_jasa_lainya_kontruksi_update14").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_jasa_lainya_kontruksi_update14 = $('#penilaian_konsultan_jasa_lainya_kontruksi_update14').val();
                if (penilaian_konsultan_jasa_lainya_kontruksi_update14.match(validasiHuruf)) {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update14').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update14').css('border-color', 'green');
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update14').val(penilaian_konsultan_jasa_lainya_kontruksi_update14);

                }

            };

        }
    });
    $('#penilaian_konsultan_jasa_lainya_kontruksi_update15').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_jasa_lainya_kontruksi_update15').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_jasa_lainya_kontruksi_update15").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_jasa_lainya_kontruksi_update15 = $('#penilaian_konsultan_jasa_lainya_kontruksi_update15').val();
                if (penilaian_konsultan_jasa_lainya_kontruksi_update15.match(validasiHuruf)) {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update15').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update15').css('border-color', 'green');
                    $('#penilaian_konsultan_jasa_lainya_kontruksi_update15').val(penilaian_konsultan_jasa_lainya_kontruksi_update15);

                }

            };

        }
    });
</script>


<!-- INI UNTUK VALIDASI ANGKANYA Bagian tambah-->
<script>
    function message(icon, text) {
        swal({
            title: "Maaf Tidak Boleh Huruf Yaa !!!",
            text: text,
            icon: icon,
        });
    }

    function message_gak_boleh_lebih_angkanya(icon, text) {
        swal({
            title: "Maaf Angka Penilaian Tidak Boleh Lebih Dari 100 Yaa !!!",
            text: text,
            icon: icon,
        });
    }
    $('#penilaian_konsultan_jasa_lainya_kontruksi1').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_jasa_lainya_kontruksi1').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_jasa_lainya_kontruksi1").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_jasa_lainya_kontruksi1 = $('#penilaian_konsultan_jasa_lainya_kontruksi1').val();
                if (penilaian_konsultan_jasa_lainya_kontruksi1.match(validasiHuruf)) {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi1').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi1').css('border-color', 'green');
                    $('#penilaian_konsultan_jasa_lainya_kontruksi1').val(penilaian_konsultan_jasa_lainya_kontruksi1);

                }

            };

        }
    });
    $('#penilaian_konsultan_jasa_lainya_kontruksi2').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_jasa_lainya_kontruksi2').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_jasa_lainya_kontruksi2").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_jasa_lainya_kontruksi2 = $('#penilaian_konsultan_jasa_lainya_kontruksi2').val();
                if (penilaian_konsultan_jasa_lainya_kontruksi2.match(validasiHuruf)) {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi2').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi2').css('border-color', 'green');
                    $('#penilaian_konsultan_jasa_lainya_kontruksi2').val(penilaian_konsultan_jasa_lainya_kontruksi2);

                }

            };

        }
    });

    $('#penilaian_konsultan_jasa_lainya_kontruksi3').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_jasa_lainya_kontruksi3').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_jasa_lainya_kontruksi3").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_jasa_lainya_kontruksi3 = $('#penilaian_konsultan_jasa_lainya_kontruksi3').val();
                if (penilaian_konsultan_jasa_lainya_kontruksi3.match(validasiHuruf)) {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi3').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi3').css('border-color', 'green');
                    $('#penilaian_konsultan_jasa_lainya_kontruksi3').val(penilaian_konsultan_jasa_lainya_kontruksi3);

                }

            };

        }
    });
    $('#penilaian_konsultan_jasa_lainya_kontruksi4').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_jasa_lainya_kontruksi4').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_jasa_lainya_kontruksi4").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_jasa_lainya_kontruksi4 = $('#penilaian_konsultan_jasa_lainya_kontruksi4').val();
                if (penilaian_konsultan_jasa_lainya_kontruksi4.match(validasiHuruf)) {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi4').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi4').css('border-color', 'green');
                    $('#penilaian_konsultan_jasa_lainya_kontruksi4').val(penilaian_konsultan_jasa_lainya_kontruksi4);

                }

            };

        }
    });
    $('#penilaian_konsultan_jasa_lainya_kontruksi5').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_jasa_lainya_kontruksi5').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_jasa_lainya_kontruksi5").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_jasa_lainya_kontruksi5 = $('#penilaian_konsultan_jasa_lainya_kontruksi5').val();
                if (penilaian_konsultan_jasa_lainya_kontruksi5.match(validasiHuruf)) {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi5').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi5').css('border-color', 'green');
                    $('#penilaian_konsultan_jasa_lainya_kontruksi5').val(penilaian_konsultan_jasa_lainya_kontruksi5);

                }

            };

        }
    });
    $('#penilaian_konsultan_jasa_lainya_kontruksi6').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_jasa_lainya_kontruksi6').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_jasa_lainya_kontruksi6").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_jasa_lainya_kontruksi6 = $('#penilaian_konsultan_jasa_lainya_kontruksi6').val();
                if (penilaian_konsultan_jasa_lainya_kontruksi6.match(validasiHuruf)) {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi6').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi6').css('border-color', 'green');
                    $('#penilaian_konsultan_jasa_lainya_kontruksi6').val(penilaian_konsultan_jasa_lainya_kontruksi6);

                }

            };

        }
    });
    $('#penilaian_konsultan_jasa_lainya_kontruksi7').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_jasa_lainya_kontruksi7').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_jasa_lainya_kontruksi7").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_jasa_lainya_kontruksi7 = $('#penilaian_konsultan_jasa_lainya_kontruksi7').val();
                if (penilaian_konsultan_jasa_lainya_kontruksi7.match(validasiHuruf)) {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi7').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi7').css('border-color', 'green');
                    $('#penilaian_konsultan_jasa_lainya_kontruksi7').val(penilaian_konsultan_jasa_lainya_kontruksi7);

                }

            };

        }
    });
    $('#penilaian_konsultan_jasa_lainya_kontruksi8').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_jasa_lainya_kontruksi8').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_jasa_lainya_kontruksi8").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_jasa_lainya_kontruksi8 = $('#penilaian_konsultan_jasa_lainya_kontruksi8').val();
                if (penilaian_konsultan_jasa_lainya_kontruksi8.match(validasiHuruf)) {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi8').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi8').css('border-color', 'green');
                    $('#penilaian_konsultan_jasa_lainya_kontruksi8').val(penilaian_konsultan_jasa_lainya_kontruksi8);

                }

            };

        }
    });
    $('#penilaian_konsultan_jasa_lainya_kontruksi9').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_jasa_lainya_kontruksi9').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_jasa_lainya_kontruksi9").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_jasa_lainya_kontruksi9 = $('#penilaian_konsultan_jasa_lainya_kontruksi9').val();
                if (penilaian_konsultan_jasa_lainya_kontruksi9.match(validasiHuruf)) {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi9').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi9').css('border-color', 'green');
                    $('#penilaian_konsultan_jasa_lainya_kontruksi9').val(penilaian_konsultan_jasa_lainya_kontruksi9);

                }

            };

        }
    });
    $('#penilaian_konsultan_jasa_lainya_kontruksi10').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_jasa_lainya_kontruksi10').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_jasa_lainya_kontruksi10").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_jasa_lainya_kontruksi10 = $('#penilaian_konsultan_jasa_lainya_kontruksi10').val();
                if (penilaian_konsultan_jasa_lainya_kontruksi10.match(validasiHuruf)) {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi10').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi10').css('border-color', 'green');
                    $('#penilaian_konsultan_jasa_lainya_kontruksi10').val(penilaian_konsultan_jasa_lainya_kontruksi10);

                }

            };

        }
    });
    $('#penilaian_konsultan_jasa_lainya_kontruksi11').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_jasa_lainya_kontruksi11').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_jasa_lainya_kontruksi11").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_jasa_lainya_kontruksi11 = $('#penilaian_konsultan_jasa_lainya_kontruksi11').val();
                if (penilaian_konsultan_jasa_lainya_kontruksi11.match(validasiHuruf)) {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi11').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi11').css('border-color', 'green');
                    $('#penilaian_konsultan_jasa_lainya_kontruksi11').val(penilaian_konsultan_jasa_lainya_kontruksi11);

                }

            };

        }
    });
    $('#penilaian_konsultan_jasa_lainya_kontruksi12').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_jasa_lainya_kontruksi12').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_jasa_lainya_kontruksi12").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_jasa_lainya_kontruksi12 = $('#penilaian_konsultan_jasa_lainya_kontruksi12').val();
                if (penilaian_konsultan_jasa_lainya_kontruksi12.match(validasiHuruf)) {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi12').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi12').css('border-color', 'green');
                    $('#penilaian_konsultan_jasa_lainya_kontruksi12').val(penilaian_konsultan_jasa_lainya_kontruksi12);

                }

            };

        }
    });
    $('#penilaian_konsultan_jasa_lainya_kontruksi13').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_jasa_lainya_kontruksi13').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_jasa_lainya_kontruksi13").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_jasa_lainya_kontruksi13 = $('#penilaian_konsultan_jasa_lainya_kontruksi13').val();
                if (penilaian_konsultan_jasa_lainya_kontruksi13.match(validasiHuruf)) {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi13').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_jasa_lainya_kontruksi13').css('border-color', 'green');
                    $('#penilaian_konsultan_jasa_lainya_kontruksi13').val(penilaian_konsultan_jasa_lainya_kontruksi13);

                }

            };

        }
    });
</script>


<!-- ININ UNTUK VALIDASI BUTTON dan nilaik akhir TAMBAH -->
<!-- keyup nilai pekerjaan kontruksi -->
<script>
    $(document).ready(function() {
        $("#penilaian_konsultan_jasa_lainya_kontruksi1, #penilaian_konsultan_jasa_lainya_kontruksi2, #penilaian_konsultan_jasa_lainya_kontruksi3, #penilaian_konsultan_jasa_lainya_kontruksi4,#penilaian_konsultan_jasa_lainya_kontruksi5,#penilaian_konsultan_jasa_lainya_kontruksi6,#penilaian_konsultan_jasa_lainya_kontruksi7,#penilaian_konsultan_jasa_lainya_kontruksi8,#penilaian_konsultan_jasa_lainya_kontruksi9,#penilaian_konsultan_jasa_lainya_kontruksi10,#penilaian_konsultan_jasa_lainya_kontruksi11,#penilaian_konsultan_jasa_lainya_kontruksi12,#penilaian_konsultan_jasa_lainya_kontruksi13").keyup(function() {
            // 1
            var bobot_pekerjaan_kontruksi1 = $('#bobot_pekerjaan_konsultan_jasa_lainya_kontruksi1').val();
            var penilaian_kontruksi1 = $('#penilaian_konsultan_jasa_lainya_kontruksi1').val();
            var nilai_akhir_kontruksi1 = bobot_pekerjaan_kontruksi1 * penilaian_kontruksi1 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek1').val(parseFloat(nilai_akhir_kontruksi1));
            // 2
            var bobot_pekerjaan_kontruksi2 = $('#bobot_pekerjaan_konsultan_jasa_lainya_kontruksi2').val();
            var penilaian_kontruksi2 = $('#penilaian_konsultan_jasa_lainya_kontruksi2').val();
            var nilai_akhir_kontruksi2 = bobot_pekerjaan_kontruksi2 * penilaian_kontruksi2 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek2').val(parseFloat(nilai_akhir_kontruksi2));
            // 3
            var bobot_pekerjaan_kontruksi3 = $('#bobot_pekerjaan_konsultan_jasa_lainya_kontruksi3').val();
            var penilaian_kontruksi3 = $('#penilaian_konsultan_jasa_lainya_kontruksi3').val();
            var nilai_akhir_kontruksi3 = bobot_pekerjaan_kontruksi3 * penilaian_kontruksi3 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek3').val(parseFloat(nilai_akhir_kontruksi3));
            // 4
            var bobot_pekerjaan_kontruksi4 = $('#bobot_pekerjaan_konsultan_jasa_lainya_kontruksi4').val();
            var penilaian_kontruksi4 = $('#penilaian_konsultan_jasa_lainya_kontruksi4').val();
            var nilai_akhir_kontruksi4 = bobot_pekerjaan_kontruksi4 * penilaian_kontruksi4 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek4').val(parseFloat(nilai_akhir_kontruksi4));
            // 5
            var bobot_pekerjaan_kontruksi5 = $('#bobot_pekerjaan_konsultan_jasa_lainya_kontruksi5').val();
            var penilaian_kontruksi5 = $('#penilaian_konsultan_jasa_lainya_kontruksi5').val();
            var nilai_akhir_kontruksi5 = bobot_pekerjaan_kontruksi5 * penilaian_kontruksi5 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek5').val(parseFloat(nilai_akhir_kontruksi5));
            // 6
            var bobot_pekerjaan_kontruksi6 = $('#bobot_pekerjaan_konsultan_jasa_lainya_kontruksi6').val();
            var penilaian_kontruksi6 = $('#penilaian_konsultan_jasa_lainya_kontruksi6').val();
            var nilai_akhir_kontruksi6 = bobot_pekerjaan_kontruksi6 * penilaian_kontruksi6 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek6').val(parseFloat(nilai_akhir_kontruksi6));
            // 7
            var bobot_pekerjaan_kontruksi7 = $('#bobot_pekerjaan_konsultan_jasa_lainya_kontruksi7').val();
            var penilaian_kontruksi7 = $('#penilaian_konsultan_jasa_lainya_kontruksi7').val();
            var nilai_akhir_kontruksi7 = bobot_pekerjaan_kontruksi7 * penilaian_kontruksi7 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek7').val(parseFloat(nilai_akhir_kontruksi7));
            // 8
            var bobot_pekerjaan_kontruksi8 = $('#bobot_pekerjaan_konsultan_jasa_lainya_kontruksi8').val();
            var penilaian_kontruksi8 = $('#penilaian_konsultan_jasa_lainya_kontruksi8').val();
            var nilai_akhir_kontruksi8 = bobot_pekerjaan_kontruksi8 * penilaian_kontruksi8 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek8').val(parseFloat(nilai_akhir_kontruksi8));
            // 9
            var bobot_pekerjaan_kontruksi9 = $('#bobot_pekerjaan_konsultan_jasa_lainya_kontruksi9').val();
            var penilaian_kontruksi9 = $('#penilaian_konsultan_jasa_lainya_kontruksi9').val();
            var nilai_akhir_kontruksi9 = bobot_pekerjaan_kontruksi9 * penilaian_kontruksi9 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek9').val(parseFloat(nilai_akhir_kontruksi9));
            // 10
            var bobot_pekerjaan_kontruksi10 = $('#bobot_pekerjaan_konsultan_jasa_lainya_kontruksi10').val();
            var penilaian_kontruksi10 = $('#penilaian_konsultan_jasa_lainya_kontruksi10').val();
            var nilai_akhir_kontruksi10 = bobot_pekerjaan_kontruksi10 * penilaian_kontruksi10 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek10').val(parseFloat(nilai_akhir_kontruksi10));
            // 11
            var bobot_pekerjaan_kontruksi11 = $('#bobot_pekerjaan_konsultan_jasa_lainya_kontruksi11').val();
            var penilaian_kontruksi11 = $('#penilaian_konsultan_jasa_lainya_kontruksi11').val();
            var nilai_akhir_kontruksi11 = bobot_pekerjaan_kontruksi11 * penilaian_kontruksi11 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek11').val(parseFloat(nilai_akhir_kontruksi11));
            // 12
            var bobot_pekerjaan_kontruksi12 = $('#bobot_pekerjaan_konsultan_jasa_lainya_kontruksi12').val();
            var penilaian_kontruksi12 = $('#penilaian_konsultan_jasa_lainya_kontruksi12').val();
            var nilai_akhir_kontruksi12 = bobot_pekerjaan_kontruksi12 * penilaian_kontruksi12 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek12').val(parseFloat(nilai_akhir_kontruksi12));
            // 13
            var bobot_pekerjaan_kontruksi13 = $('#bobot_pekerjaan_konsultan_jasa_lainya_kontruksi13').val();
            var penilaian_kontruksi13 = $('#penilaian_konsultan_jasa_lainya_kontruksi13').val();
            var nilai_akhir_kontruksi13 = bobot_pekerjaan_kontruksi13 * penilaian_kontruksi13 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek13').val(parseFloat(nilai_akhir_kontruksi13));

            var total = parseFloat(nilai_akhir_kontruksi1) + parseFloat(nilai_akhir_kontruksi2) + parseFloat(nilai_akhir_kontruksi3) + parseFloat(nilai_akhir_kontruksi4) + parseFloat(nilai_akhir_kontruksi5) + parseFloat(nilai_akhir_kontruksi6) + parseFloat(nilai_akhir_kontruksi7) + parseFloat(nilai_akhir_kontruksi8) + parseFloat(nilai_akhir_kontruksi9) + parseFloat(nilai_akhir_kontruksi10) + parseFloat(nilai_akhir_kontruksi11) + parseFloat(nilai_akhir_kontruksi12) + parseFloat(nilai_akhir_kontruksi13);
            var total_button = $("#total_nilai_pekerjaan_konsultan_jasa_lainya_kontruksi").val(total);
            if (total <= 51) {
                $('[name="rating_penilaian_vendor_pekerjaan_konsultan_jasa_lainya_kontruksi"]').val(4);
                $('[name="status_rating_pekerjaan_konsultan_jasa_lainya_kontruksi"]').val('kurang baik');
                $('[name="status_nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi"]').val(total);
                $('#status_pekerjaan_konsultan_jasa_lainya_kontruksi').html('<label for="" class="badge badge-danger">Kurang Baik</label>');
                $('#warning_button_konsultan_jasa_lainya_kontruksi').show();
                $('#save_button_konsultan_jasa_lainya_kontruksi').hide();
                $('#bintang_pekerjaan_konsultan_jasa_lainya_kontruksi').html('');
            } else if (total <= 70) {
                $('[name="rating_penilaian_vendor_pekerjaan_konsultan_jasa_lainya_kontruksi"]').val(1);
                $('[name="status_rating_pekerjaan_konsultan_jasa_lainya_kontruksi"]').val('cukup baik');
                $('[name="status_nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi"]').val(total);
                $('#save_button_konsultan_jasa_lainya_kontruksi').show();
                $('#warning_button_konsultan_jasa_lainya_kontruksi').hide();
                $('#status_pekerjaan_konsultan_jasa_lainya_kontruksi').html('<label for="" class="badge badge-warning">Cukup Baik</label>');
                $('#bintang_pekerjaan_konsultan_jasa_lainya_kontruksi').html('<i class="fas fa fa-star text-warning"></i>');
            } else if (total <= 80) {
                $('[name="rating_penilaian_vendor_pekerjaan_konsultan_jasa_lainya_kontruksi"]').val(2);
                $('[name="status_rating_pekerjaan_konsultan_jasa_lainya_kontruksi"]').val('baik');
                $('[name="status_nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi"]').val(total);
                $('#save_button_konsultan_jasa_lainya_kontruksi').show();
                $('#warning_button_konsultan_jasa_lainya_kontruksi').hide();
                $('#status_pekerjaan_konsultan_jasa_lainya_kontruksi').html('<label for="" class="badge badge-warning">Baik</label>');
                $('#bintang_pekerjaan_konsultan_jasa_lainya_kontruksi').html('<i class="fas fa fa-star text-warning"></i><i class="fas fa fa-star text-warning"></i>');
            } else {
                $('[name="rating_penilaian_vendor_pekerjaan_konsultan_jasa_lainya_kontruksi"]').val(3);
                $('[name="status_rating_pekerjaan_konsultan_jasa_lainya_kontruksi"]').val('sangat baik');
                $('[name="status_nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi"]').val(total);
                $('#save_button_konsultan_jasa_lainya_kontruksi').show();
                $('#warning_button_konsultan_jasa_lainya_kontruksi').hide();
                $('#status_pekerjaan_konsultan_jasa_lainya_kontruksi').html('<label for="" class="badge badge-success">Sangat Baik</label>');
                $('#bintang_pekerjaan_konsultan_jasa_lainya_kontruksi').html('<i class="fas fa fa-star text-warning"></i><i class="fas fa fa-star text-warning"></i><i class="fas fa fa-star text-warning"></i>');
            }

        });
    });
</script>





<!-- INI BAGIAN UNTUK PENILAIAN Penyedia Barang -->

<!-- INI BATAS PENILAIAN Penyedia Barang ===================================================================================================================================== -->

<!-- AJAX BARUUU TAMBAH REVISI -->
<script>
    function message3(icon, text) {
        swal({
            title: "Good Jobs!!!",
            text: text,
            icon: icon,
        });
    }

    function message5(icon, text) {
        swal({
            title: "Anda Berhasil Mereset Nilai!!!",
            text: text,
            icon: icon,
        });
    }
    var form_tambah_pekerjaan_konsultan_penyedia_barang_kontruksi = $('#form_tambah_pekerjaan_konsultan_penyedia_barang_kontruksi');

    function Simpan_pekerjaan_konsultan_penyedia_barang_kontruksi() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('beranda/tambah_pekerjaan_konsultan_penyedia_barang_kontruksisaya') ?>',
            data: form_tambah_pekerjaan_konsultan_penyedia_barang_kontruksi.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message3('success', 'Penilaian Berhasil Di Buat!!');
                    location.reload();
                }
            },
        })
    }
    var form_tambah_pekerjaan_konsultan_penyedia_barang_kontruksi = $('#form_tambah_pekerjaan_konsultan_penyedia_barang_kontruksi');

    function Simpan_Warning_pekerjaan_konsultan_penyedia_barang_kontruksi_warning() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('beranda/tambah_warning_pekerjaan_konsultan_penyedia_barang_kontruksisaya') ?>',
            data: form_tambah_pekerjaan_konsultan_penyedia_barang_kontruksi.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $("#kirim_ke_vendor").css('display', 'block');
            },
            success: function(response) {
                $("#kirim_ke_vendor").css('display', 'none');
                window.open('https://api.whatsapp.com/send?phone=+62' + response['telpon'] + '&text=Laporan Penilaian Kinerja Vendor Nama Paket  : ' + response['paket'].nama_paket + ' Dengan Metode Pemilihan : ' + response['paket'].nama_metode_pemilihan + '  Agency : ' + response['paket'].nama_unit_kerja + ', Info : ' + response['isi'] + '', '_blank');
                message3('success', 'Penilaian Berhasil Di Buat');
                location.reload();
            },
        })
    }

    var form_tambah_pekerjaan_konsultan_penyedia_barang_kontruksi_reset = $('#form_tambah_pekerjaan_konsultan_penyedia_barang_kontruksi');

    function Reset_nilai_pekerjaan_konsultan_penyedia_barang_kontruksi() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('beranda/reset_penilaian_performance_pekerjaan_konsultan_penyedia_barang_kontruksi') ?>',
            data: form_tambah_pekerjaan_konsultan_penyedia_barang_kontruksi_reset.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $("#kirim_ke_vendor").css('display', 'block');
            },
            success: function(response) {
                $("#kirim_ke_vendor").css('display', 'none');
                window.open('https://api.whatsapp.com/send?phone=+62' + response['telpon'] + '&text=Laporan Penilaian Kinerja Vendor Nama Paket  : ' + response['paket'].nama_paket + ' Dengan Metode Pemilihan : ' + response['paket'].nama_metode_pemilihan + '  Agency : ' + response['paket'].nama_unit_kerja + ', Info : ' + response['isi'] + '', '_blank');
                message5('success', 'Penilaian Berhasil Di Reset');
                location.reload();
            },
        })
    }
</script>
<!-- INI UNTUK UPDATENYA -->
<script>
    function message3(icon, text) {
        swal({
            title: "Good Jobs!!!",
            text: text,
            icon: icon,
        });
    }
    var form_tambah_pekerjaan_konsultan_penyedia_barang_kontruksi = $('#form_tambah_pekerjaan_konsultan_penyedia_barang_kontruksi');

    function Update_pekerjaan_konsultan_penyedia_barang_kontruksi() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('beranda/update_pekerjaan_konsultan_penyedia_barang_kontruksisaya') ?>',
            data: form_tambah_pekerjaan_konsultan_penyedia_barang_kontruksi.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message3('success', 'Penilaian Berhasil Di Update!!');
                    location.reload();
                }
            },
        })
    }
</script>


<!-- INI UNTUK VALIDASI ANGKANYA Bagian UPDATE-->
<script>
    function message(icon, text) {
        swal({
            title: "Maaf Tidak Boleh Huruf Yaa !!!",
            text: text,
            icon: icon,
        });
    }

    function message_gak_boleh_lebih_angkanya(icon, text) {
        swal({
            title: "Maaf Angka Penilaian Tidak Boleh Lebih Dari 100 Yaa !!!",
            text: text,
            icon: icon,
        });
    }
    $('#penilaian_konsultan_penyedia_barang_kontruksi_update1').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_penyedia_barang_kontruksi_update1').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_penyedia_barang_kontruksi_update1").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_penyedia_barang_kontruksi_update1 = $('#penilaian_konsultan_penyedia_barang_kontruksi_update1').val();
                if (penilaian_konsultan_penyedia_barang_kontruksi_update1.match(validasiHuruf)) {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update1').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update1').css('border-color', 'green');
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update1').val(penilaian_konsultan_penyedia_barang_kontruksi_update1);

                }

            };

        }
    });
    $('#penilaian_konsultan_penyedia_barang_kontruksi_update2').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_penyedia_barang_kontruksi_update2').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_penyedia_barang_kontruksi_update2").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_penyedia_barang_kontruksi_update2 = $('#penilaian_konsultan_penyedia_barang_kontruksi_update2').val();
                if (penilaian_konsultan_penyedia_barang_kontruksi_update2.match(validasiHuruf)) {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update2').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update2').css('border-color', 'green');
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update2').val(penilaian_konsultan_penyedia_barang_kontruksi_update2);

                }

            };

        }
    });

    $('#penilaian_konsultan_penyedia_barang_kontruksi_update3').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_penyedia_barang_kontruksi_update3').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_penyedia_barang_kontruksi_update3").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_penyedia_barang_kontruksi_update3 = $('#penilaian_konsultan_penyedia_barang_kontruksi_update3').val();
                if (penilaian_konsultan_penyedia_barang_kontruksi_update3.match(validasiHuruf)) {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update3').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update3').css('border-color', 'green');
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update3').val(penilaian_konsultan_penyedia_barang_kontruksi_update3);

                }

            };

        }
    });
    $('#penilaian_konsultan_penyedia_barang_kontruksi_update4').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_penyedia_barang_kontruksi_update4').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_penyedia_barang_kontruksi_update4").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_penyedia_barang_kontruksi_update4 = $('#penilaian_konsultan_penyedia_barang_kontruksi_update4').val();
                if (penilaian_konsultan_penyedia_barang_kontruksi_update4.match(validasiHuruf)) {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update4').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update4').css('border-color', 'green');
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update4').val(penilaian_konsultan_penyedia_barang_kontruksi_update4);

                }

            };

        }
    });
    $('#penilaian_konsultan_penyedia_barang_kontruksi_update5').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_penyedia_barang_kontruksi_update5').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_penyedia_barang_kontruksi_update5").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_penyedia_barang_kontruksi_update5 = $('#penilaian_konsultan_penyedia_barang_kontruksi_update5').val();
                if (penilaian_konsultan_penyedia_barang_kontruksi_update5.match(validasiHuruf)) {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update5').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update5').css('border-color', 'green');
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update5').val(penilaian_konsultan_penyedia_barang_kontruksi_update5);

                }

            };

        }
    });
    $('#penilaian_konsultan_penyedia_barang_kontruksi_update6').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_penyedia_barang_kontruksi_update6').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_penyedia_barang_kontruksi_update6").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_penyedia_barang_kontruksi_update6 = $('#penilaian_konsultan_penyedia_barang_kontruksi_update6').val();
                if (penilaian_konsultan_penyedia_barang_kontruksi_update6.match(validasiHuruf)) {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update6').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update6').css('border-color', 'green');
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update6').val(penilaian_konsultan_penyedia_barang_kontruksi_update6);

                }

            };

        }
    });
    $('#penilaian_konsultan_penyedia_barang_kontruksi_update7').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_penyedia_barang_kontruksi_update7').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_penyedia_barang_kontruksi_update7").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_penyedia_barang_kontruksi_update7 = $('#penilaian_konsultan_penyedia_barang_kontruksi_update7').val();
                if (penilaian_konsultan_penyedia_barang_kontruksi_update7.match(validasiHuruf)) {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update7').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update7').css('border-color', 'green');
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update7').val(penilaian_konsultan_penyedia_barang_kontruksi_update7);

                }

            };

        }
    });
    $('#penilaian_konsultan_penyedia_barang_kontruksi_update8').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_penyedia_barang_kontruksi_update8').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_penyedia_barang_kontruksi_update8").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_penyedia_barang_kontruksi_update8 = $('#penilaian_konsultan_penyedia_barang_kontruksi_update8').val();
                if (penilaian_konsultan_penyedia_barang_kontruksi_update8.match(validasiHuruf)) {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update8').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update8').css('border-color', 'green');
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update8').val(penilaian_konsultan_penyedia_barang_kontruksi_update8);

                }

            };

        }
    });
    $('#penilaian_konsultan_penyedia_barang_kontruksi_update9').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_penyedia_barang_kontruksi_update9').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_penyedia_barang_kontruksi_update9").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_penyedia_barang_kontruksi_update9 = $('#penilaian_konsultan_penyedia_barang_kontruksi_update9').val();
                if (penilaian_konsultan_penyedia_barang_kontruksi_update9.match(validasiHuruf)) {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update9').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update9').css('border-color', 'green');
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update9').val(penilaian_konsultan_penyedia_barang_kontruksi_update9);

                }

            };

        }
    });
    $('#penilaian_konsultan_penyedia_barang_kontruksi_update10').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_penyedia_barang_kontruksi_update10').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_penyedia_barang_kontruksi_update10").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_penyedia_barang_kontruksi_update10 = $('#penilaian_konsultan_penyedia_barang_kontruksi_update10').val();
                if (penilaian_konsultan_penyedia_barang_kontruksi_update10.match(validasiHuruf)) {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update10').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update10').css('border-color', 'green');
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update10').val(penilaian_konsultan_penyedia_barang_kontruksi_update10);

                }

            };

        }
    });
    $('#penilaian_konsultan_penyedia_barang_kontruksi_update11').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_penyedia_barang_kontruksi_update11').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_penyedia_barang_kontruksi_update11").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_penyedia_barang_kontruksi_update11 = $('#penilaian_konsultan_penyedia_barang_kontruksi_update11').val();
                if (penilaian_konsultan_penyedia_barang_kontruksi_update11.match(validasiHuruf)) {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update11').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update11').css('border-color', 'green');
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update11').val(penilaian_konsultan_penyedia_barang_kontruksi_update11);

                }

            };

        }
    });
    $('#penilaian_konsultan_penyedia_barang_kontruksi_update12').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_penyedia_barang_kontruksi_update12').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_penyedia_barang_kontruksi_update12").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_penyedia_barang_kontruksi_update12 = $('#penilaian_konsultan_penyedia_barang_kontruksi_update12').val();
                if (penilaian_konsultan_penyedia_barang_kontruksi_update12.match(validasiHuruf)) {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update12').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update12').css('border-color', 'green');
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update12').val(penilaian_konsultan_penyedia_barang_kontruksi_update12);

                }

            };

        }
    });
    $('#penilaian_konsultan_penyedia_barang_kontruksi_update13').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_penyedia_barang_kontruksi_update13').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_penyedia_barang_kontruksi_update13").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_penyedia_barang_kontruksi_update13 = $('#penilaian_konsultan_penyedia_barang_kontruksi_update13').val();
                if (penilaian_konsultan_penyedia_barang_kontruksi_update13.match(validasiHuruf)) {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update13').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update13').css('border-color', 'green');
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update13').val(penilaian_konsultan_penyedia_barang_kontruksi_update13);

                }

            };

        }
    });
    $('#penilaian_konsultan_penyedia_barang_kontruksi_update14').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_penyedia_barang_kontruksi_update14').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_penyedia_barang_kontruksi_update14").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_penyedia_barang_kontruksi_update14 = $('#penilaian_konsultan_penyedia_barang_kontruksi_update14').val();
                if (penilaian_konsultan_penyedia_barang_kontruksi_update14.match(validasiHuruf)) {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update14').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update14').css('border-color', 'green');
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update14').val(penilaian_konsultan_penyedia_barang_kontruksi_update14);

                }

            };

        }
    });
    $('#penilaian_konsultan_penyedia_barang_kontruksi_update15').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_penyedia_barang_kontruksi_update15').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_penyedia_barang_kontruksi_update15").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_penyedia_barang_kontruksi_update15 = $('#penilaian_konsultan_penyedia_barang_kontruksi_update15').val();
                if (penilaian_konsultan_penyedia_barang_kontruksi_update15.match(validasiHuruf)) {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update15').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update15').css('border-color', 'green');
                    $('#penilaian_konsultan_penyedia_barang_kontruksi_update15').val(penilaian_konsultan_penyedia_barang_kontruksi_update15);

                }

            };

        }
    });
</script>


<!-- INI UNTUK VALIDASI ANGKANYA Bagian tambah-->
<script>
    function message(icon, text) {
        swal({
            title: "Maaf Tidak Boleh Huruf Yaa !!!",
            text: text,
            icon: icon,
        });
    }

    function message_gak_boleh_lebih_angkanya(icon, text) {
        swal({
            title: "Maaf Angka Penilaian Tidak Boleh Lebih Dari 100 Yaa !!!",
            text: text,
            icon: icon,
        });
    }
    $('#penilaian_konsultan_penyedia_barang_kontruksi1').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_penyedia_barang_kontruksi1').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_penyedia_barang_kontruksi1").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_penyedia_barang_kontruksi1 = $('#penilaian_konsultan_penyedia_barang_kontruksi1').val();
                if (penilaian_konsultan_penyedia_barang_kontruksi1.match(validasiHuruf)) {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi1').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi1').css('border-color', 'green');
                    $('#penilaian_konsultan_penyedia_barang_kontruksi1').val(penilaian_konsultan_penyedia_barang_kontruksi1);

                }

            };

        }
    });
    $('#penilaian_konsultan_penyedia_barang_kontruksi2').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_penyedia_barang_kontruksi2').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_penyedia_barang_kontruksi2").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_penyedia_barang_kontruksi2 = $('#penilaian_konsultan_penyedia_barang_kontruksi2').val();
                if (penilaian_konsultan_penyedia_barang_kontruksi2.match(validasiHuruf)) {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi2').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi2').css('border-color', 'green');
                    $('#penilaian_konsultan_penyedia_barang_kontruksi2').val(penilaian_konsultan_penyedia_barang_kontruksi2);

                }

            };

        }
    });

    $('#penilaian_konsultan_penyedia_barang_kontruksi3').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_penyedia_barang_kontruksi3').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_penyedia_barang_kontruksi3").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_penyedia_barang_kontruksi3 = $('#penilaian_konsultan_penyedia_barang_kontruksi3').val();
                if (penilaian_konsultan_penyedia_barang_kontruksi3.match(validasiHuruf)) {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi3').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi3').css('border-color', 'green');
                    $('#penilaian_konsultan_penyedia_barang_kontruksi3').val(penilaian_konsultan_penyedia_barang_kontruksi3);

                }

            };

        }
    });
    $('#penilaian_konsultan_penyedia_barang_kontruksi4').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_penyedia_barang_kontruksi4').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_penyedia_barang_kontruksi4").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_penyedia_barang_kontruksi4 = $('#penilaian_konsultan_penyedia_barang_kontruksi4').val();
                if (penilaian_konsultan_penyedia_barang_kontruksi4.match(validasiHuruf)) {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi4').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi4').css('border-color', 'green');
                    $('#penilaian_konsultan_penyedia_barang_kontruksi4').val(penilaian_konsultan_penyedia_barang_kontruksi4);

                }

            };

        }
    });
    $('#penilaian_konsultan_penyedia_barang_kontruksi5').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_penyedia_barang_kontruksi5').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_penyedia_barang_kontruksi5").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_penyedia_barang_kontruksi5 = $('#penilaian_konsultan_penyedia_barang_kontruksi5').val();
                if (penilaian_konsultan_penyedia_barang_kontruksi5.match(validasiHuruf)) {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi5').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi5').css('border-color', 'green');
                    $('#penilaian_konsultan_penyedia_barang_kontruksi5').val(penilaian_konsultan_penyedia_barang_kontruksi5);

                }

            };

        }
    });
    $('#penilaian_konsultan_penyedia_barang_kontruksi6').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_penyedia_barang_kontruksi6').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_penyedia_barang_kontruksi6").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_penyedia_barang_kontruksi6 = $('#penilaian_konsultan_penyedia_barang_kontruksi6').val();
                if (penilaian_konsultan_penyedia_barang_kontruksi6.match(validasiHuruf)) {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi6').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi6').css('border-color', 'green');
                    $('#penilaian_konsultan_penyedia_barang_kontruksi6').val(penilaian_konsultan_penyedia_barang_kontruksi6);

                }

            };

        }
    });
    $('#penilaian_konsultan_penyedia_barang_kontruksi7').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_penyedia_barang_kontruksi7').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_penyedia_barang_kontruksi7").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_penyedia_barang_kontruksi7 = $('#penilaian_konsultan_penyedia_barang_kontruksi7').val();
                if (penilaian_konsultan_penyedia_barang_kontruksi7.match(validasiHuruf)) {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi7').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi7').css('border-color', 'green');
                    $('#penilaian_konsultan_penyedia_barang_kontruksi7').val(penilaian_konsultan_penyedia_barang_kontruksi7);

                }

            };

        }
    });
    $('#penilaian_konsultan_penyedia_barang_kontruksi8').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_penyedia_barang_kontruksi8').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_penyedia_barang_kontruksi8").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_penyedia_barang_kontruksi8 = $('#penilaian_konsultan_penyedia_barang_kontruksi8').val();
                if (penilaian_konsultan_penyedia_barang_kontruksi8.match(validasiHuruf)) {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi8').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi8').css('border-color', 'green');
                    $('#penilaian_konsultan_penyedia_barang_kontruksi8').val(penilaian_konsultan_penyedia_barang_kontruksi8);

                }

            };

        }
    });
    $('#penilaian_konsultan_penyedia_barang_kontruksi9').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_penyedia_barang_kontruksi9').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_penyedia_barang_kontruksi9").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_penyedia_barang_kontruksi9 = $('#penilaian_konsultan_penyedia_barang_kontruksi9').val();
                if (penilaian_konsultan_penyedia_barang_kontruksi9.match(validasiHuruf)) {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi9').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi9').css('border-color', 'green');
                    $('#penilaian_konsultan_penyedia_barang_kontruksi9').val(penilaian_konsultan_penyedia_barang_kontruksi9);

                }

            };

        }
    });
    $('#penilaian_konsultan_penyedia_barang_kontruksi10').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_konsultan_penyedia_barang_kontruksi10').css('border-color', 'red');
            message_gak_boleh_lebih_angkanya('warning', 'Beri Penilaian 1 => 100!!');
            $(this).val('100');
        } else {
            document.getElementById("penilaian_konsultan_penyedia_barang_kontruksi10").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_konsultan_penyedia_barang_kontruksi10 = $('#penilaian_konsultan_penyedia_barang_kontruksi10').val();
                if (penilaian_konsultan_penyedia_barang_kontruksi10.match(validasiHuruf)) {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi10').css('border-color', 'red');
                    message('warning', 'Beri Penilaian Dengan Angka Yaa!!');
                } else {
                    $('#penilaian_konsultan_penyedia_barang_kontruksi10').css('border-color', 'green');
                    $('#penilaian_konsultan_penyedia_barang_kontruksi10').val(penilaian_konsultan_penyedia_barang_kontruksi10);

                }

            };

        }
    });
</script>


<!-- ININ UNTUK VALIDASI BUTTON dan nilaik akhir TAMBAH -->
<!-- keyup nilai pekerjaan kontruksi -->
<script>
    $(document).ready(function() {
        $("#penilaian_konsultan_penyedia_barang_kontruksi1, #penilaian_konsultan_penyedia_barang_kontruksi2, #penilaian_konsultan_penyedia_barang_kontruksi3, #penilaian_konsultan_penyedia_barang_kontruksi4,#penilaian_konsultan_penyedia_barang_kontruksi5,#penilaian_konsultan_penyedia_barang_kontruksi6,#penilaian_konsultan_penyedia_barang_kontruksi7,#penilaian_konsultan_penyedia_barang_kontruksi8,#penilaian_konsultan_penyedia_barang_kontruksi9,#penilaian_konsultan_penyedia_barang_kontruksi10,#penilaian_konsultan_penyedia_barang_kontruksi11,#penilaian_konsultan_penyedia_barang_kontruksi12,#penilaian_konsultan_penyedia_barang_kontruksi13").keyup(function() {
            // 1
            var bobot_pekerjaan_kontruksi1 = $('#bobot_pekerjaan_konsultan_penyedia_barang_kontruksi1').val();
            var penilaian_kontruksi1 = $('#penilaian_konsultan_penyedia_barang_kontruksi1').val();
            var nilai_akhir_kontruksi1 = bobot_pekerjaan_kontruksi1 * penilaian_kontruksi1 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek1').val(parseFloat(nilai_akhir_kontruksi1));
            // 2
            var bobot_pekerjaan_kontruksi2 = $('#bobot_pekerjaan_konsultan_penyedia_barang_kontruksi2').val();
            var penilaian_kontruksi2 = $('#penilaian_konsultan_penyedia_barang_kontruksi2').val();
            var nilai_akhir_kontruksi2 = bobot_pekerjaan_kontruksi2 * penilaian_kontruksi2 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek2').val(parseFloat(nilai_akhir_kontruksi2));
            // 3
            var bobot_pekerjaan_kontruksi3 = $('#bobot_pekerjaan_konsultan_penyedia_barang_kontruksi3').val();
            var penilaian_kontruksi3 = $('#penilaian_konsultan_penyedia_barang_kontruksi3').val();
            var nilai_akhir_kontruksi3 = bobot_pekerjaan_kontruksi3 * penilaian_kontruksi3 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek3').val(parseFloat(nilai_akhir_kontruksi3));
            // 4
            var bobot_pekerjaan_kontruksi4 = $('#bobot_pekerjaan_konsultan_penyedia_barang_kontruksi4').val();
            var penilaian_kontruksi4 = $('#penilaian_konsultan_penyedia_barang_kontruksi4').val();
            var nilai_akhir_kontruksi4 = bobot_pekerjaan_kontruksi4 * penilaian_kontruksi4 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek4').val(parseFloat(nilai_akhir_kontruksi4));
            // 5
            var bobot_pekerjaan_kontruksi5 = $('#bobot_pekerjaan_konsultan_penyedia_barang_kontruksi5').val();
            var penilaian_kontruksi5 = $('#penilaian_konsultan_penyedia_barang_kontruksi5').val();
            var nilai_akhir_kontruksi5 = bobot_pekerjaan_kontruksi5 * penilaian_kontruksi5 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek5').val(parseFloat(nilai_akhir_kontruksi5));
            // 6
            var bobot_pekerjaan_kontruksi6 = $('#bobot_pekerjaan_konsultan_penyedia_barang_kontruksi6').val();
            var penilaian_kontruksi6 = $('#penilaian_konsultan_penyedia_barang_kontruksi6').val();
            var nilai_akhir_kontruksi6 = bobot_pekerjaan_kontruksi6 * penilaian_kontruksi6 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek6').val(parseFloat(nilai_akhir_kontruksi6));
            // 7
            var bobot_pekerjaan_kontruksi7 = $('#bobot_pekerjaan_konsultan_penyedia_barang_kontruksi7').val();
            var penilaian_kontruksi7 = $('#penilaian_konsultan_penyedia_barang_kontruksi7').val();
            var nilai_akhir_kontruksi7 = bobot_pekerjaan_kontruksi7 * penilaian_kontruksi7 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek7').val(parseFloat(nilai_akhir_kontruksi7));
            // 8
            var bobot_pekerjaan_kontruksi8 = $('#bobot_pekerjaan_konsultan_penyedia_barang_kontruksi8').val();
            var penilaian_kontruksi8 = $('#penilaian_konsultan_penyedia_barang_kontruksi8').val();
            var nilai_akhir_kontruksi8 = bobot_pekerjaan_kontruksi8 * penilaian_kontruksi8 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek8').val(parseFloat(nilai_akhir_kontruksi8));
            // 9
            var bobot_pekerjaan_kontruksi9 = $('#bobot_pekerjaan_konsultan_penyedia_barang_kontruksi9').val();
            var penilaian_kontruksi9 = $('#penilaian_konsultan_penyedia_barang_kontruksi9').val();
            var nilai_akhir_kontruksi9 = bobot_pekerjaan_kontruksi9 * penilaian_kontruksi9 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek9').val(parseFloat(nilai_akhir_kontruksi9));
            // 10
            var bobot_pekerjaan_kontruksi10 = $('#bobot_pekerjaan_konsultan_penyedia_barang_kontruksi10').val();
            var penilaian_kontruksi10 = $('#penilaian_konsultan_penyedia_barang_kontruksi10').val();
            var nilai_akhir_kontruksi10 = bobot_pekerjaan_kontruksi10 * penilaian_kontruksi10 / 100;
            $('#nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek10').val(parseFloat(nilai_akhir_kontruksi10));

            var total = parseFloat(nilai_akhir_kontruksi1) + parseFloat(nilai_akhir_kontruksi2) + parseFloat(nilai_akhir_kontruksi3) + parseFloat(nilai_akhir_kontruksi4) + parseFloat(nilai_akhir_kontruksi5) + parseFloat(nilai_akhir_kontruksi6) + parseFloat(nilai_akhir_kontruksi7) + parseFloat(nilai_akhir_kontruksi8) + parseFloat(nilai_akhir_kontruksi9) + parseFloat(nilai_akhir_kontruksi10);
            var total_button = $("#total_nilai_pekerjaan_konsultan_penyedia_barang_kontruksi").val(total);
            if (total <= 51) {
                $('[name="rating_penilaian_vendor_pekerjaan_konsultan_penyedia_barang_kontruksi"]').val(4);
                $('[name="status_rating_pekerjaan_konsultan_penyedia_barang_kontruksi"]').val('kurang baik');
                $('[name="status_nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi"]').val(total);
                $('#status_pekerjaan_konsultan_penyedia_barang_kontruksi').html('<label for="" class="badge badge-danger">Kurang Baik</label>');
                $('#warning_button_konsultan_penyedia_barang_kontruksi').show();
                $('#save_button_konsultan_penyedia_barang_kontruksi').hide();
                $('#bintang_pekerjaan_konsultan_penyedia_barang_kontruksi').html('');
            } else if (total <= 70) {
                $('[name="rating_penilaian_vendor_pekerjaan_konsultan_penyedia_barang_kontruksi"]').val(1);
                $('[name="status_rating_pekerjaan_konsultan_penyedia_barang_kontruksi"]').val('cukup baik');
                $('[name="status_nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi"]').val(total);
                $('#save_button_konsultan_penyedia_barang_kontruksi').show();
                $('#warning_button_konsultan_penyedia_barang_kontruksi').hide();
                $('#status_pekerjaan_konsultan_penyedia_barang_kontruksi').html('<label for="" class="badge badge-warning">Cukup Baik</label>');
                $('#bintang_pekerjaan_konsultan_penyedia_barang_kontruksi').html('<i class="fas fa fa-star text-warning"></i>');
            } else if (total <= 80) {
                $('[name="rating_penilaian_vendor_pekerjaan_konsultan_penyedia_barang_kontruksi"]').val(2);
                $('[name="status_rating_pekerjaan_konsultan_penyedia_barang_kontruksi"]').val('baik');
                $('[name="status_nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi"]').val(total);
                $('#save_button_konsultan_penyedia_barang_kontruksi').show();
                $('#warning_button_konsultan_penyedia_barang_kontruksi').hide();
                $('#status_pekerjaan_konsultan_penyedia_barang_kontruksi').html('<label for="" class="badge badge-warning">Baik</label>');
                $('#bintang_pekerjaan_konsultan_penyedia_barang_kontruksi').html('<i class="fas fa fa-star text-warning"></i><i class="fas fa fa-star text-warning"></i>');
            } else {
                $('[name="rating_penilaian_vendor_pekerjaan_konsultan_penyedia_barang_kontruksi"]').val(3);
                $('[name="status_rating_pekerjaan_konsultan_penyedia_barang_kontruksi"]').val('sangat baik');
                $('[name="status_nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi"]').val(total);
                $('#save_button_konsultan_penyedia_barang_kontruksi').show();
                $('#warning_button_konsultan_penyedia_barang_kontruksi').hide();
                $('#status_pekerjaan_konsultan_penyedia_barang_kontruksi').html('<label for="" class="badge badge-success">Sangat Baik</label>');
                $('#bintang_pekerjaan_konsultan_penyedia_barang_kontruksi').html('<i class="fas fa fa-star text-warning"></i><i class="fas fa fa-star text-warning"></i><i class="fas fa fa-star text-warning"></i>');
            }

        });
    });
</script>



<!-- INI UNTUK NILAI KONTRAK -->
<script>
    $('#tanggal_nomor_kontak1').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'd-F-Y H:i',
        onShow: function(ct) {
            this.setOptions({
                maxDate: $('#tanggal_nomor_kontak1').val() ? $('#tanggal_nomor_kontak1').val() : false
            })
        }

    })

    $('#jangka_mulai1').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'd-F-Y H:i',
        onShow: function(ct) {
            this.setOptions({
                maxDate: $('#jangka_mulai1').val() ? $('#jangka_mulai1').val() : false
            })
        }

    })

    $('#jangka_selesai1').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'd-F-Y H:i',
        onShow: function(ct) {
            this.setOptions({
                maxDate: $('#jangka_selesai1').val() ? $('#jangka_selesai1').val() : false
            })
        }

    })
    // Ini Tanggal Kontrak
    document.getElementById("tanggal_nomor_kontak1").onchange = function() {
        var tanggal_kontarak = $('[name="tanggal_nomor_kontak1"]').val();
        $('[name="tanggal_nomor_kontak"]').val(tanggal_kontarak);
        update_tanggal_kontrak()
    };
    // Ini Nomor Kontrak
    $(document).ready(function() {
        $("#nomor_kontrak1 ").keyup(function() {
            var nomor_kontrak = $('[name="nomor_kontrak1"]').val();
            $('[name="nomor_kontrak"]').val(nomor_kontrak);
            update_nomor_kontrak()
        })
    })

    // Ini Untuk Jangka Waktu Mulai
    document.getElementById("jangka_mulai1").onchange = function() {
        var jangka_mulai = $('[name="jangka_mulai1"]').val();
        $('[name="jangka_mulai"]').val(jangka_mulai);
        update_jangka_mulai()
    };

    // Ini Untuk Jangka Waktu Selesai
    document.getElementById("jangka_selesai1").onchange = function() {
        var jangka_selesai = $('[name="jangka_selesai1"]').val();
        $('[name="jangka_selesai"]').val(jangka_selesai);
        update_jangka_selesai()
    };


    // INI KE DUA
    $('#tanggal_nomor_kontak2').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'd-F-Y H:i',
        onShow: function(ct) {
            this.setOptions({
                maxDate: $('#tanggal_nomor_kontak2').val() ? $('#tanggal_nomor_kontak2').val() : false
            })
        }

    })

    $('#jangka_mulai2').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'd-F-Y H:i',
        onShow: function(ct) {
            this.setOptions({
                maxDate: $('#jangka_mulai2').val() ? $('#jangka_mulai2').val() : false
            })
        }

    })

    $('#jangka_selesai2').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'd-F-Y H:i',
        onShow: function(ct) {
            this.setOptions({
                maxDate: $('#jangka_selesai2').val() ? $('#jangka_selesai2').val() : false
            })
        }

    })
    // Ini Tanggal Kontrak
    document.getElementById("tanggal_nomor_kontak2").onchange = function() {
        var tanggal_kontarak = $('[name="tanggal_nomor_kontak2"]').val();
        $('[name="tanggal_nomor_kontak"]').val(tanggal_kontarak);
        update_tanggal_kontrak()
    };
    // Ini Nomor Kontrak
    $(document).ready(function() {
        $("#nomor_kontrak2 ").keyup(function() {
            var nomor_kontrak = $('[name="nomor_kontrak2"]').val();
            $('[name="nomor_kontrak"]').val(nomor_kontrak);
            update_nomor_kontrak()
        })
    })

    // Ini Untuk Jangka Waktu Mulai
    document.getElementById("jangka_mulai2").onchange = function() {
        var jangka_mulai = $('[name="jangka_mulai2"]').val();
        $('[name="jangka_mulai"]').val(jangka_mulai);
        update_jangka_mulai()
    };

    // Ini Untuk Jangka Waktu Selesai
    document.getElementById("jangka_selesai2").onchange = function() {
        var jangka_selesai = $('[name="jangka_selesai2"]').val();
        $('[name="jangka_selesai"]').val(jangka_selesai);
        update_jangka_selesai()
    };



    // INI KE 3
    $('#tanggal_nomor_kontak3').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'd-F-Y H:i',
        onShow: function(ct) {
            this.setOptions({
                maxDate: $('#tanggal_nomor_kontak3').val() ? $('#tanggal_nomor_kontak3').val() : false
            })
        }

    })

    $('#jangka_mulai3').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'd-F-Y H:i',
        onShow: function(ct) {
            this.setOptions({
                maxDate: $('#jangka_mulai3').val() ? $('#jangka_mulai3').val() : false
            })
        }

    })

    $('#jangka_selesai3').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'd-F-Y H:i',
        onShow: function(ct) {
            this.setOptions({
                maxDate: $('#jangka_selesai3').val() ? $('#jangka_selesai3').val() : false
            })
        }

    })
    // Ini Tanggal Kontrak
    document.getElementById("tanggal_nomor_kontak3").onchange = function() {
        var tanggal_kontarak = $('[name="tanggal_nomor_kontak3"]').val();
        $('[name="tanggal_nomor_kontak"]').val(tanggal_kontarak);
        update_tanggal_kontrak()
    };
    // Ini Nomor Kontrak
    $(document).ready(function() {
        $("#nomor_kontrak3 ").keyup(function() {
            var nomor_kontrak = $('[name="nomor_kontrak3"]').val();
            $('[name="nomor_kontrak"]').val(nomor_kontrak);
            update_nomor_kontrak()
        })
    })

    // Ini Untuk Jangka Waktu Mulai
    document.getElementById("jangka_mulai3").onchange = function() {
        var jangka_mulai = $('[name="jangka_mulai3"]').val();
        $('[name="jangka_mulai"]').val(jangka_mulai);
        update_jangka_mulai()
    };

    // Ini Untuk Jangka Waktu Selesai
    document.getElementById("jangka_selesai3").onchange = function() {
        var jangka_selesai = $('[name="jangka_selesai3"]').val();
        $('[name="jangka_selesai"]').val(jangka_selesai);
        update_jangka_selesai()
    };


    // INI KE 4
    $('#tanggal_nomor_kontak4').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'd-F-Y H:i',
        onShow: function(ct) {
            this.setOptions({
                maxDate: $('#tanggal_nomor_kontak4').val() ? $('#tanggal_nomor_kontak4').val() : false
            })
        }

    })

    $('#jangka_mulai4').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'd-F-Y H:i',
        onShow: function(ct) {
            this.setOptions({
                maxDate: $('#jangka_mulai4').val() ? $('#jangka_mulai4').val() : false
            })
        }

    })

    $('#jangka_selesai4').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'd-F-Y H:i',
        onShow: function(ct) {
            this.setOptions({
                maxDate: $('#jangka_selesai4').val() ? $('#jangka_selesai4').val() : false
            })
        }

    })
    // Ini Tanggal Kontrak
    document.getElementById("tanggal_nomor_kontak4").onchange = function() {
        var tanggal_kontarak = $('[name="tanggal_nomor_kontak4"]').val();
        $('[name="tanggal_nomor_kontak"]').val(tanggal_kontarak);
        update_tanggal_kontrak()
    };
    // Ini Nomor Kontrak
    $(document).ready(function() {
        $("#nomor_kontrak4 ").keyup(function() {
            var nomor_kontrak = $('[name="nomor_kontrak4"]').val();
            $('[name="nomor_kontrak"]').val(nomor_kontrak);
            update_nomor_kontrak()
        })
    })

    // Ini Untuk Jangka Waktu Mulai
    document.getElementById("jangka_mulai4").onchange = function() {
        var jangka_mulai = $('[name="jangka_mulai4"]').val();
        $('[name="jangka_mulai"]').val(jangka_mulai);
        update_jangka_mulai()
    };

    // Ini Untuk Jangka Waktu Selesai
    document.getElementById("jangka_selesai4").onchange = function() {
        var jangka_selesai = $('[name="jangka_selesai4"]').val();
        $('[name="jangka_selesai"]').val(jangka_selesai);
        update_jangka_selesai()
    };



    // INI KE 5
    $('#tanggal_nomor_kontak5').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'd-F-Y H:i',
        onShow: function(ct) {
            this.setOptions({
                maxDate: $('#tanggal_nomor_kontak5').val() ? $('#tanggal_nomor_kontak5').val() : false
            })
        }

    })

    $('#jangka_mulai5').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'd-F-Y H:i',
        onShow: function(ct) {
            this.setOptions({
                maxDate: $('#jangka_mulai5').val() ? $('#jangka_mulai5').val() : false
            })
        }

    })

    $('#jangka_selesai5').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'd-F-Y H:i',
        onShow: function(ct) {
            this.setOptions({
                maxDate: $('#jangka_selesai5').val() ? $('#jangka_selesai5').val() : false
            })
        }

    })
    // Ini Tanggal Kontrak
    document.getElementById("tanggal_nomor_kontak5").onchange = function() {
        var tanggal_kontarak = $('[name="tanggal_nomor_kontak5"]').val();
        $('[name="tanggal_nomor_kontak"]').val(tanggal_kontarak);
        update_tanggal_kontrak()
    };
    // Ini Nomor Kontrak
    $(document).ready(function() {
        $("#nomor_kontrak5 ").keyup(function() {
            var nomor_kontrak = $('[name="nomor_kontrak5"]').val();
            $('[name="nomor_kontrak"]').val(nomor_kontrak);
            update_nomor_kontrak()
        })
    })

    // Ini Untuk Jangka Waktu Mulai
    document.getElementById("jangka_mulai5").onchange = function() {
        var jangka_mulai = $('[name="jangka_mulai5"]').val();
        $('[name="jangka_mulai"]').val(jangka_mulai);
        update_jangka_mulai()
    };

    // Ini Untuk Jangka Waktu Selesai
    document.getElementById("jangka_selesai5").onchange = function() {
        var jangka_selesai = $('[name="jangka_selesai5"]').val();
        $('[name="jangka_selesai"]').val(jangka_selesai);
        update_jangka_selesai()
    };



    // INI KE 6
    $('#tanggal_nomor_kontak6').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'd-F-Y H:i',
        onShow: function(ct) {
            this.setOptions({
                maxDate: $('#tanggal_nomor_kontak6').val() ? $('#tanggal_nomor_kontak6').val() : false
            })
        }

    })

    $('#jangka_mulai6').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'd-F-Y H:i',
        onShow: function(ct) {
            this.setOptions({
                maxDate: $('#jangka_mulai6').val() ? $('#jangka_mulai6').val() : false
            })
        }

    })

    $('#jangka_selesai6').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'd-F-Y H:i',
        onShow: function(ct) {
            this.setOptions({
                maxDate: $('#jangka_selesai6').val() ? $('#jangka_selesai6').val() : false
            })
        }

    })
    // Ini Tanggal Kontrak
    document.getElementById("tanggal_nomor_kontak6").onchange = function() {
        var tanggal_kontarak = $('[name="tanggal_nomor_kontak6"]').val();
        $('[name="tanggal_nomor_kontak"]').val(tanggal_kontarak);
        update_tanggal_kontrak()
    };
    // Ini Nomor Kontrak
    $(document).ready(function() {
        $("#nomor_kontrak6 ").keyup(function() {
            var nomor_kontrak = $('[name="nomor_kontrak6"]').val();
            $('[name="nomor_kontrak"]').val(nomor_kontrak);
            update_nomor_kontrak()
        })
    })

    // Ini Untuk Jangka Waktu Mulai
    document.getElementById("jangka_mulai6").onchange = function() {
        var jangka_mulai = $('[name="jangka_mulai6"]').val();
        $('[name="jangka_mulai"]').val(jangka_mulai);
        update_jangka_mulai()
    };

    // Ini Untuk Jangka Waktu Selesai
    document.getElementById("jangka_selesai6").onchange = function() {
        var jangka_selesai = $('[name="jangka_selesai6"]').val();
        $('[name="jangka_selesai"]').val(jangka_selesai);
        update_jangka_selesai()
    };







    // ini untuk update tanggal kontrak
    var form_update_tanggal_kontrak = $('#form_update_tanggal_kontrak');

    function update_tanggal_kontrak() {
        var reusable = $('#id_paket').val();
        $.ajax({
            method: "POST",
            url: '<?= base_url('beranda/update_tanggal_kontrak/') ?>' + reusable,
            data: form_update_tanggal_kontrak.serialize(),
            dataType: "JSON",
            success: function(response) {

            },
            error: function() {
                console.log(error);
            }
        })
    }

    // ini untuk update Nomor kontrak
    var form_update_nomor_kontrak = $('#form_update_nomor_kontrak');

    function update_nomor_kontrak() {
        var reusable = $('#id_paket').val();
        $.ajax({
            method: "POST",
            url: '<?= base_url('beranda/update_nomor_kontrak/') ?>' + reusable,
            data: form_update_nomor_kontrak.serialize(),
            dataType: "JSON",
            success: function(response) {

            },
            error: function() {
                console.log(error);
            }
        })
    }

    // ini untuk jangan mulai
    var form_update_jangka_mulai = $('#form_update_jangka_mulai');

    function update_jangka_mulai() {
        var reusable = $('#id_paket').val();
        $.ajax({
            method: "POST",
            url: '<?= base_url('beranda/update_jangka_mulai/') ?>' + reusable,
            data: form_update_jangka_mulai.serialize(),
            dataType: "JSON",
            success: function(response) {

            },
            error: function() {
                console.log(error);
            }
        })
    }
    // ini untuk jangan selesai
    var form_update_jangka_selesai = $('#form_update_jangka_selesai');

    function update_jangka_selesai() {
        var reusable = $('#id_paket').val();
        $.ajax({
            method: "POST",
            url: '<?= base_url('beranda/update_jangka_selesai/') ?>' + reusable,
            data: form_update_jangka_selesai.serialize(),
            dataType: "JSON",
            success: function(response) {

            },
            error: function() {
                console.log(error);
            }
        })
    }
</script>