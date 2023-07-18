<script>
    $(document).ready(function() {
        $('#klik_file').click(function() {
            $('#file').toggle();
        });
    })


    $('#file').change(function() {
        var a = $('#file').val().toString().split('\\');
        $('.fake_input_dok').text(a[a.length - 1]);
        $('.nongol_dok').css("display", "block");
    });
    $('#file_img').change(function() {
        var a = $('#file_img').val().toString().split('\\');
        $('.fake_input_dok').text(a[a.length - 1]);
        $('.nongol_dok').css("display", "block");
    });




    $(document).ready(function() {

        $('#action_menu_btn').click(function() {
            $('.action_menu').toggle();
        }); // ini Untuk Menu Pengaturan
        pesan()

        function pesan() {
            var id_penerima = $('#id_penerima').val();
            var id_paket = $('#id_paket').val();
            var id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
            $.ajax({
                type: "post",
                url: "<?= base_url() ?>panitiajmtm/beranda/ngeload_chatnya_auction/" + id_paket,
                data: {
                    id_pengirim: id_pengirim,
                    id_penerima: id_penerima,
                },
                dataType: "json",
                success: function(r) {
                    var html = "";
                    var d = r.data;
                    id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
                    d.forEach(d => {

                        var today = new Date();
                        var dd = String(today.getDate()).padStart(2, '0');
                        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                        var yyyy = today.getFullYear();

                        today = dd + '-' + mm + '-' + yyyy;
                        // console.log(today);

                        var times = new Date(d.waktu)
                        var time = times.toLocaleTimeString()
                        var tanggal = String(times.getDate()).padStart(2, '0');
                        var bulan = String(times.getMonth() + 1).padStart(2, '0');
                        var tahun = times.getFullYear()
                        var lengkapDB = tanggal + '-' + bulan + '-' + tahun
                        // console.log(lengkapDB == today)
                        var kapan = "Today"
                        var tanggal_bulan = tanggal + "-" + bulan
                        if (lengkapDB != today) {
                            kapan = tanggal_bulan
                        }
                        // console.log(kapan)
                        if (parseInt(d.id_pengirim) == id_pengirim) {
                            if (d.dokumen_chat == null) {
                                html += '<div class="d-flex justify-content-end mb-4">' +
                                    '<div class="msg_cotainer_send">' +
                                    '' + d.isi + '' +
                                    '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                    '</div>' +
                                    '</div>';
                            } else if (d.dokumen_chat) {
                                html += '<div class="d-flex justify-content-end mb-4">' +
                                    '<div class="msg_cotainer_send">' +
                                    // '<img width="100px" src="<?= base_url('file_chat/') ?>' + d.img_chat + '">' +
                                    '<a  class="text-primary" href="<?= base_url('/file_chat/') ?>' + d.dokumen_chat + '">' + d.dokumen_chat + '</a>' +
                                    '<br>' + d.isi + '' +
                                    '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                    '</div>' +
                                    '</div>';

                            } else if (d.img_chat) {
                                html += '<div class="d-flex justify-content-end mb-4">' +
                                    '<div class="msg_cotainer_send">' +
                                    '<img width="100px" src="<?= base_url('file_chat/') ?>' + d.img_chat + '">' +
                                    // '<a  class="text-primary" href="<?= base_url('/file_chat/') ?>' + d.dokumen_chat + '">' + d.dokumen_chat + '</a>' +
                                    '<br>' + d.isi + '' +
                                    '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                    '</div>' +
                                    '</div>';

                            } else if (d.replay_tujuan) {
                                if (d.dokumen_chat == null) {
                                    html += '<div class="d-flex justify-content-end mb-4">' +
                                        '<div class="msg_cotainer_send">' +
                                        '<div class="bs-callout bs-callout-info">' +
                                        '' + d.replay_tujuan + '<br>' +
                                        '' + d.replay_isi + '' +
                                        '</div>' +
                                        '' + d.isi + '' +
                                        '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                        '</div>' +
                                        '</div>';
                                } else if (d.dokumen_chat) {
                                    html += '<div class="d-flex justify-content-end mb-4">' +
                                        '<div class="msg_cotainer_send">' +
                                        '<div class="bs-callout bs-callout-info">' +
                                        '' + d.replay_tujuan + '<br>' +
                                        '' + d.replay_isi + '' +
                                        '</div>' +
                                        // '<img width="100px" src="<?= base_url('file_chat/') ?>' + d.img_chat + '">' +
                                        '<a  class="text-primary" href="<?= base_url('/file_chat/') ?>' + d.dokumen_chat + '">' + d.dokumen_chat + '</a>' +
                                        '<br>' + d.isi + '' +
                                        '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                        '</div>' +
                                        '</div>';
                                } else if (d.img_chat) {
                                    html += '<div class="d-flex justify-content-end mb-4">' +
                                        '<div class="msg_cotainer_send">' +
                                        '<div class="bs-callout bs-callout-info">' +
                                        '' + d.replay_tujuan + '<br>' +
                                        '' + d.replay_isi + '' +
                                        '</div>' +
                                        '<img width="100px" src="<?= base_url('file_chat/') ?>' + d.img_chat + '">' +
                                        // '<a  class="text-primary" href="<?= base_url('/file_chat/') ?>' + d.dokumen_chat + '">' + d.dokumen_chat + '</a>' +
                                        '<br>' + d.isi + '' +
                                        '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                        '</div>' +
                                        '</div>';
                                } else {
                                    html += '<div class="d-flex justify-content-end mb-4">' +
                                        '<div class="msg_cotainer_send">' +
                                        '<div class="bs-callout bs-callout-info">' +
                                        '' + d.replay_tujuan + '<br>' +
                                        '' + d.replay_isi + '' +
                                        '</div>' +
                                        '' + d.isi + '' +
                                        '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                        '</div>' +
                                        '</div>';
                                }

                            } else {
                                html += '<div class="d-flex justify-content-end mb-4">' +
                                    '<div class="msg_cotainer_send">' +
                                    '' + d.isi + '' +
                                    '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                    '</div>' +
                                    '</div>';
                            }
                        } else if (parseInt(d.id_penerima) == id_penerima) {
                            if (d.dokumen_chat == null) {
                                html += `<label class="badge badge-primary ml-5" >Panitia</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div> </div>`;
                            } else if (d.dokumen_chat) {
                                html += `<label class="badge badge-primary ml-5" >Panitia</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                        <a href="<?= base_url('/file_chat/') ?>${d.dokumen_chat}"> ${d.dokumen_chat}</a> <br>
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                     </div>`;
                            } else if (d.img_chat) {
                                html += `<label class="badge badge-primary ml-5" >Panitia</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
								<img width="100px" src="<?= base_url('file_chat/') ?>${d.img_chat}"> <br>
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                      
                     </div>`;
                            } else {
                                html += `<label class="badge badge-primary ml-5" >Panitia</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}	</span>
                        </div>
                      
                     </div>`;
                            }
                        } else {
                            if (d.dokumen_chat == null) {
                                html += `<label class="badge badge-danger ml-5" >${d.username_vendor}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div> </div>`;
                            } else if (d.dokumen_chat) {
                                html += `<label class="badge badge-danger ml-5" >${d.username_vendor}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                        <a href="https://vms.jmtm.co.id/file_chat/${d.dokumen_chat}"> ${d.dokumen_chat}</a> <br>
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                     </div>`;
                            } else if (d.img_chat) {
                                html += `<label class="badge badge-danger ml-5" >${d.username_vendor}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
								<img width="100px" src="https://vms.jmtm.co.id/file_chat/${d.img_chat}"> <br>
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                      
                     </div>`;
                            } else {
                                html += '<label class="badge badge-danger ml-5" >' + d.username_vendor + '</label><div class="d-flex justify-content-start mb-4">' +
                                    '<div class="img_cont_msg">' +
                                    '<img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">' +
                                    '</div>' +
                                    '<div class="msg_cotainer">' +
                                    '' + d.isi + '' +
                                    '<span class="msg_time">' +
                                    '' + kapan + '' +
                                    '' + time + '' +
                                    '<a onClick="Replay(' + "'" + d.id_pengirim + "','" + d.isi + "','" + d.username_vendor + "'" + ')" href="javascript:;" class="badge badge-sm badge-warning">replay</a>	</span>' +
                                    '</div>' +
                                    '</div>';
                            }
                        }
                        // notifikasis
                    });
                    // console.log(html)
                    $('#letakpesan').html(html);

                }
            });

        }
        setInterval(() => {
            pesan()
        }, 1000);
        var form_penjelasan_lelang = $('#form_keuangan_add');
        $('#form_keuangan_add').on('submit', function(e) {
            e.preventDefault();
            var isi = $('.type_msg').val();
            var id_paket = $('#id_paket').val();
            // var id_pengirim = <?= $this->session->userdata('id_pegawai') ?> //ini sessionya si vendor
            // var id_penerima = '<?= $data2['id_mengikuti_vendor'] ?>'; // ini untuk pegawai
            if (isi != "") {
                $.ajax({
                    type: "post",
                    url: "<?= base_url() ?>panitiajmtm/beranda/kirim_pesanya/" + id_paket,
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(r) {
                        form_penjelasan_lelang[0].reset();
                        $('.replay_orang').hide();
                        $('[name="replay_tujuan"]').val('');
                        $('[name="replay_isi"]').val('');
                        if (r.status) {
                            $('.search_btn').trigger('click');
                            $('.type_msg').val('');
                            scrollToBottom()

                        }

                    }
                });
            }


        });
        scrollToBottom()

        function scrollToBottom() {
            $("#letakpesan").animate({
                scrollToBottom: 0
            }, "slow");

        }


        pesan()
        $('.search_btn').click(function(e) {
            pesan()
        });
        orang()

        function orang() {
            var id_penerima = '<?= $data2['id_mengikuti_vendor'] ?>';
            var id_paket = $('#id_paket').val();
            $.ajax({
                type: "post",
                url: "<?= base_url() ?>panitiajmtm/beranda/GetAllVendorAuction/" + id_paket + '/' + id_penerima,
                dataType: "json",
                success: function(response) {
                    var html = '';
                    var x = 0;
                    var i;
                    for (i = 0; i < response['vendor'].length; i++) {
                        html +=
                            '<li class="active-angga coba" data-id="' + response['vendor'][i].id_mengikuti_vendor + '">' +
                            '<div class="d-flex bd-highlight ">' +
                            '<div class="img_cont ">' +
                            '<img src="<?= base_url('assets/img/servant.png') ?>" alt="" class="rounded-circle user_img_msg">' +
                            '<span class="online_icon " ></span>' +
                            '</div>' +
                            '<div class="user_info">' +
                            '<span class="">' + response['vendor'][i].username_vendor + '</a>' + '</span>' +
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
            // var id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
            window.location.replace("<?= base_url() ?>panitiajmtm/beranda/chat_auction_detail/" + id_paket + '/' + id);
        });
    });
</script>
<script>
    var form_auction = $('#form_auction');
    $('#form_auction').on('submit', function(e) {
        e.preventDefault();
        var isi = $('.type_msg').val();
        if (isi != "") {
            $.ajax({
                type: "post",
                url: "<?= base_url() ?>panitiajmtm/beranda/kirim_pesanya_auction",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(r) {
                    form_auction[0].reset();
                    if (r.status) {
                        $('.search_btn').trigger('click');
                        $('.type_msg').val('');
                        scrollToBottom()

                    }

                }
            });
        }


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
    function hapus_data_file() {
        $('.replay_orang').hide();
        $('[name="img_chat"]').val('');
        $('[name="dokumen_chat"]').val('');
    }

    function Replay(id_pengirim, isi, username) {
        $.ajax({
            type: "post",
            url: "<?= base_url() ?>panitiajmtm/beranda/replaychat_auction",
            data: {
                id_pengirim: id_pengirim,
                isi: isi,
                username: username
            },
            dataType: "json",
            success: function(response) {
                $('[name="replay_tujuan"]').val(response.username_replay);
                $('[name="replay_isi"]').val(response.isi_replay);
                var html = '';
                html += '<div class="d-flex justify-content-end mb-4">' +
                    '<img src="<?= base_url('assets/img/test1.png') ?>" alt="" style="width:60px">' +
                    '<div class="msg_cotainer_send2">' +
                    ' <a href="javascript:;" class="badge badge-sm btn-danger ml-2 float-right" onclick="Hapus_replay()">X</a>' +
                    '' + response.username_replay + '' +
                    '<br> ' + response.isi_replay + '' +
                    '</div>' +
                    '</div>';
                $('.replay_orang').html(html);
                $('.replay_orang').show();
            }
        });
    }

    function Hapus_replay() {
        $('.replay_orang').hide();
        $('[name="replay_tujuan"]').val('');
        $('[name="replay_isi"]').val('');
    }
</script>
<script>
    $(".penawaran_binding1").keyup(function() {
        var harga = $(".penawaran_binding1").val();
        var tanpa_rupiah = document.getElementById('tanpa-rupiah1');
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

    $(".penawaran_binding2").keyup(function() {
        var harga = $(".penawaran_binding2").val();
        var tanpa_rupiah = document.getElementById('tanpa-rupiah2');
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

    $(".penawaran_binding3").keyup(function() {
        var harga = $(".penawaran_binding3").val();
        var tanpa_rupiah = document.getElementById('tanpa-rupiah3');
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

    function message509(icon, text) {
        swal({
            title: "Hanya Angka !!!",
            text: text,
            icon: icon,
        });
    }
    document.getElementById("harga_produk").onkeyup = function() {
        var validasiHuruf = /^[a-zA-Z ]+ $ /;
        var validasisimbol = /[^0-9]/;
        var harga_produk = $('#harga_produk').val();
        if (harga_produk.match(validasiHuruf)) {
            $('#harga_produk').css('border-color', 'red');
            message509('warning', 'Isi Dengan Angka!!');
            $('#harga_produk').val('');
        } else if (harga_produk.match(validasisimbol)) {
            $('#harga_produk').css('border-color', 'red');
            message509('warning', 'Isi Dengan Angka!!');
            $('#harga_produk').val('');
        } else {
            $('#harga_produk').css('border-color', 'green');
            $('#harga_produk').val(harga_produk);

        }

    };
</script>

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
            $('.warning_binding').css('display', 'block');
            seconds = (seconds < 0) ? 59 : seconds;
            seconds = (seconds < 10) ? '0' + seconds : seconds;
            //minutes = (minutes < 10) ?  minutes : minutes;
            $('.countdown').html(minutes + ':' + seconds);
            timer2 = minutes + ':' + seconds;
        } else {
            if (minutes < 0) {
                $('.binding_tahap_1').css('display', 'block');
                $('.danger_binding').css('display', 'block');
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
</script>

<script>
    function berhasil_buat_penawaran(icon, text) {
        swal({
            title: "Berhasil Menyimpan !!!",
            text: text,
            icon: icon,
        });
    }

    function Simpan_harga_penawaran() {
        var id_paket = $('[name="id_paket"]').val();
        var id_vendor = $('[name="id_vendor"]').val();
        var nama_vendor = $('[name="nama_vendor"]').val();
        var tahap_binding = $('[name="tahap_binding"]').val();
        var penawaran_binding = $('[name="penawaran_binding"]').val();
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>panitiajmtm/beranda/simpan_harga_penawaran_binding",
            data: {
                id_vendor: id_vendor,
                tahap_binding: tahap_binding,
                penawaran_binding: penawaran_binding,
                id_paket: id_paket
            },
            dataType: "json",
            success: function(data) {
                berhasil_buat_penawaran('success', 'Penawaran Binding Vendor ' + nama_vendor + '!');
            }
        });
    }

    function Tahap_binding() {
        var id_paket = $('[name="id_paket"]').val();
        var tahap_binding_next = $('[name="tahap_binding_next"]').val();
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>panitiajmtm/beranda/next_tahap_binding",
            data: {
                id_paket: id_paket,
                tahap_binding_next: tahap_binding_next
            },
            dataType: "json",
            success: function(data) {
                berhasil_buat_penawaran('success', 'Anda Memasuki Tahap Binding Ke ' + tahap_binding_next + '');
                window.location.replace("<?= base_url() ?>panitiajmtm/beranda/reverseauctiontender/" + id_paket);
            }
        });
    }

    function lihat_sumary_binding(id) {
        $.ajax({
            type: "GET",
            url: "<?= base_url('panitiajmtm/beranda/by_id_lihat_vendor/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                $('#modal_lihat_vendor_mengikuti').modal('show');
                var html = '';
                var html2 = '';
                var html3 = '';
                var harga_terkecil = null;
                var i;
                for (i = 0; i < response['vendor'].length; i++) {
                    var harga_terkecil = Math.min(response['vendor'][i].harga_penawaran_binding_1);
                    if (response['vendor'][i].harga_penawaran_binding_1 == response['min_binding_1']) {
                        var menang = '<i class="fa fa-star text-warning" style="font-size:20px; aria-hidden="true"></i>';
                    } else {
                        var menang = '';
                    }
                    html += '<tr>' +
                        '<td>' + response['vendor'][i].username_vendor + '</td>' +
                        '<td>' + formatRupiah(response['vendor'][i].harga_penawaran_binding_1, 'Rp. ') + menang + '</td>' +
                        '</tr>'
                }

                for (i = 0; i < response['vendor'].length; i++) {
                    var harga_terkecil = Math.min(response['vendor'][i].harga_penawaran_binding_2);
                    if (response['vendor'][i].harga_penawaran_binding_2 == response['min_binding_2']) {
                        var menang = '<i class="fa fa-star text-warning" style="font-size:20px; aria-hidden="true"></i>';
                    } else {
                        var menang = '';
                    }
                    html2 += '<tr>' +
                        '<td>' + response['vendor'][i].username_vendor + '</td>' +
                        '<td>' + formatRupiah(response['vendor'][i].harga_penawaran_binding_2, 'Rp. ') + menang + '</td>' +
                        '</tr>'
                }

                for (i = 0; i < response['vendor'].length; i++) {
                    var harga_terkecil = Math.min(response['vendor'][i].harga_penawaran_binding_3);
                    if (response['vendor'][i].harga_penawaran_binding_3 == response['min_binding_3']) {
                        var menang = '<i class="fa fa-star text-warning" style="font-size:20px; aria-hidden="true"></i>';
                    } else {
                        var menang = '';
                    }
                    html3 += '<tr>' +
                        '<td>' + response['vendor'][i].username_vendor + '</td>' +
                        '<td>' + formatRupiah(response['vendor'][i].harga_penawaran_binding_3, 'Rp. ') + menang + '</td>' +
                        '</tr>'
                }
                $('#binding_sumaary_1').html(html);
                $('#binding_sumaary_2').html(html2);
                $('#binding_sumaary_3').html(html3);

                $('#modal_lihat_vendor_mengikuti').on('hidden.bs.modal', function() {})

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