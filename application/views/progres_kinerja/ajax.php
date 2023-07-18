<script>
    var form_selesai_tender = $('#form_selesai_tender');

    function selesai_progres_tender() {
        $.ajax({
            type: "post",
            url: "<?= base_url() ?>beranda/selesai_tender",
            data: form_selesai_tender.serialize(),
            dataType: "JSON",
            success: function(response) {
                message('success', 'Progres Pekerjaan Tendering Selesai 100% Berhasil Di Setujui');
                form_selesai_tender[0].reset();
                location.reload();
            }
        });
    }
</script>
<script>
    $(document).ready(function() {
        $('#nilai_tbl').DataTable({});
    });
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $(".select2bs4").select2({
            theme: 'bootstrap4'
        })
    })
</script>

<script>
    var saveData;
    var table_vendor_pemenang = $('#tbl_vendor_pemenang');

    $(document).ready(function() {
        fill_datatable();

        function fill_datatable(id_metode_pemilihan = '', id_jenis_pengadaan = '') {
            table_vendor_pemenang.DataTable({
                "responsive": true,
                "autoWidth": false,
                "processing": true,
                "serverSide": true,
                // "searching": false,
                "order": [],
                "ajax": {
                    "url": "<?= base_url('beranda/getdata_vendor_pemenang_progres_tender') ?>",
                    "type": "POST",
                    //di gunakan untuk custom select data yg kita mau cari per apa
                    data: {
                        id_metode_pemilihan: id_metode_pemilihan,
                        id_jenis_pengadaan: id_jenis_pengadaan
                    }
                },
                "columnDefs": [{
                    "target": [-1],
                    "orderable": true
                }],
                "oLanguage": {
                    "sSearch": "CARI NAMA VENDOR : ",
                    "sEmptyTable": "BELUM ADA VENDOR PEMENANG....",
                    "sLoadingRecords": "Silahkan Tunggu - loading...",
                    "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
                    "sZeroRecords": "BELUM ADA VENDOR PEMENANG....",
                    "sProcessing": "Memuat Data...."
                }
            });
        }
        // filtering select data per divisi dan per jenis pengadaan
        $('#cari_paket').click(function() {
            var id_metode_pemilihan = $('#id_metode_pemilihan').val();
            var id_jenis_pengadaan = $('#id_jenis_pengadaan').val();
            if (id_metode_pemilihan != '' && id_jenis_pengadaan != '') {
                table_vendor_pemenang.DataTable().destroy();
                fill_datatable(id_metode_pemilihan, id_jenis_pengadaan);
            } else {
                $('#laler').show();
                setTimeout(function() {
                    $('#laler').hide();
                }, 3000);
                table_vendor_pemenang.DataTable().destroy();
                fill_datatable();
            }
        })
    });
</script>

<script>
    function byid(id, type) {
        if (type == 'lihat_progres') {}
        $.ajax({
            type: "GET",
            url: "<?= base_url('beranda/byid/'); ?>" + id,
            success: function(response) {
                if (type == 'lihat_progres') {
                    location.replace('<?= base_url('beranda/detail_progres_pengerjaan_tender/') ?>' + id);
                }
            }
        })
    }
</script>

<script>
    function importpdf(id) {
        $.ajax({
            type: "GET",
            url: "<?= base_url('beranda/byid/'); ?>" + id,
            success: function(response) {
                location.replace('<?= base_url('beranda/export_pdf_progres/') ?>' + response['get_paket'].id_paket);
            }
        })
    }
</script>


<!-- TAMBAH LAPORAN -->
<script>
    function message(icon, text) {
        swal({
            title: "Good Jobs!!!",
            text: text,
            icon: icon,
        });
    }

    var form_tambah_progres_kinerja = $('#form_tambah_progres_kinerja');
    form_tambah_progres_kinerja.on('submit', function(e) {
        e.preventDefault();
        var id_paket = $('#id_paket').val();
        if ($('.file_bukti_progres_kinerja').val() == '') {
            $('#error_file_bukti_progres_kinerja').show();
            setTimeout(function() {
                $('#error_file_bukti_progres_kinerja').hide();
            }, 4000);
        } else
            $.ajax({
                url: "<?php echo base_url(); ?>beranda/tambah_progres_pekerjaan/" + id_paket,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#upload_progres_pekerjaan').attr('disabled', 'disabled');
                },
                success: function(response) {
                    $('#form_tambah_progres_kinerja')[0].reset();
                    $('#process_file_bukti_progres_kinerja').css('display', 'none');
                    $('#sedang_dikirim_file_bukti_progres_kinerja').show();
                    $('#tambah_laporan').modal('hide');
                    $('#upload_progres_pekerjaan').attr('disabled', false);
                    message('success', 'Progres Berhasil Di Update');
                    location.reload();
                }
            });

    });

    // load progres
    setInterval(() => {
        load_progres_kinerja_tender()
    }, 1000);

    function load_progres_kinerja_tender() {
        var id_paket = $('#id_paket').val();
        $.ajax({
            type: "post",
            url: "<?= base_url() ?>beranda/load_progres_kinerja_tender/" + id_paket,
            dataType: "json",
            success: function(response) {
                var html = '';
                var x = 0;
                var i;
                for (i = 0; i < response['kinerja'].length; i++) {
                    var wakjtu = new Date(response['kinerja'][i].waktu_kirim_progres);
                    var tahun = wakjtu.getFullYear();
                    var bulan = wakjtu.getMonth();
                    var tanggal = wakjtu.getDate();
                    var hari = wakjtu.getDay();
                    var jam = wakjtu.getHours();
                    var menit = wakjtu.getMinutes();
                    var detik = wakjtu.getSeconds();
                    switch (hari) {
                        case 0:
                            hari = "Minggu";
                            break;
                        case 1:
                            hari = "Senin";
                            break;
                        case 2:
                            hari = "Selasa";
                            break;
                        case 3:
                            hari = "Rabu";
                            break;
                        case 4:
                            hari = "Kamis";
                            break;
                        case 5:
                            hari = "Jum'at";
                            break;
                        case 6:
                            hari = "Sabtu";
                            break;
                    }
                    switch (bulan) {
                        case 0:
                            bulan = "Januari";
                            break;
                        case 1:
                            bulan = "Februari";
                            break;
                        case 2:
                            bulan = "Maret";
                            break;
                        case 3:
                            bulan = "April";
                            break;
                        case 4:
                            bulan = "Mei";
                            break;
                        case 5:
                            bulan = "Juni";
                            break;
                        case 6:
                            bulan = "Juli";
                            break;
                        case 7:
                            bulan = "Agustus";
                            break;
                        case 8:
                            bulan = "September";
                            break;
                        case 9:
                            bulan = "Oktober";
                            break;
                        case 10:
                            bulan = "November";
                            break;
                        case 11:
                            bulan = "Desember";
                            break;
                    }
                    var kehidupan = hari + ", " + tanggal + " " + bulan + " " + tahun;
                    var tampilWaktu = 'Jam :  ' + jam + ":" + menit + ":" + detik;
                    html += '<div class="row no-gutters">' +
                        '<div class="col-sm-4 text-center flex-column d-none d-sm-flex">' +
                        ' <div class="row h-100"><div class="col">&nbsp;</div> <div class="col">&nbsp;</div></div>' +
                        '<h5 class="m-2">' +
                        '<span class="badge badge-pill btn-grad text-white border">&nbsp;' + kehidupan + '&nbsp;&nbsp;' + tampilWaktu + '</span> </h5>' +
                        '<div class="row h-100">' +
                        '<div class="col border-right text-danger">&nbsp;</div>' +
                        ' <div class="col">&nbsp;</div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-sm py-1">' +
                        '<div class="card" style="box-shadow:2px 2px 10px 2px black">' +
                        '<div class="card-body">' + '<div class="float-right text-muted small">' + kehidupan + '&nbsp;&nbsp;' + tampilWaktu + '</div>' +
                        '<h4 class="card-title">' + response['kinerja'][i].judul_progres + '</h4>' +
                        '<p class="card-text">' + response['kinerja'][i].isi_progres + '</p>' +
                        '<a  class="text-primary" target="_blank" href="https://vms.jmtm.co.id/file_progres_kinerja_vendor/' + response['kinerja'][i].file_bukti_progres_kinerja + '">' + '<img src="<?= base_url('assets/img/pdfku.png') ?>" style="width:50px" alt="">' + '</a>' +
                        '<br><br>' +
                        '<div class="float-right text-muted">' +
                        '<a href="javascript:;" class="btn btn-sm btn-success" onClick="komentar(' + response['kinerja'][i].id_progres_pekerjaan_tender + ')"><i class="far fa-comment-dots text-white"> Berikan Komentar</i></a>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div> <br>';
                    $('#load_data_progres').html(html);
                }
            }
        });
    }
</script>

<!-- BAR PROGRES KERJA -->
<script>
    setInterval(() => {
        load_presentasi();
    }, 2000);

    function load_presentasi() {
        var id_paket = $('#id_paket').val();
        $.ajax({
            type: "post",
            url: "<?= base_url() ?>beranda/load_progres_kinerja_tender/" + id_paket,
            dataType: "json",
            success: function(response) {
                $('#nilai_prsenteasi').html('<i class="fas fa-chart-line text-white">  ' + response['persentasi'].persen_progres + '%' + '</i> ');
                if (response['persentasi'].persen_progres <= 50) {
                    $('.angga').addClass('btn-danger');
                    $('.progress-bar').addClass('bg-danger');
                } else if (response['persentasi'].persen_progres <= 60) {
                    $('.angga').removeClass("btn-danger").addClass("btn-warning");
                    $('.progress-bar').removeClass("bg-danger").addClass("bg-warning");
                } else {
                    $('.angga').removeClass("btn-warning").addClass("btn-success");
                    $('.progress-bar').removeClass("bg-warning").addClass("bg-success");
                }
                var percentage = 0;
                var timer = setInterval(function() {
                    percentage = percentage + response['persentasi'].persen_progres;
                    tampil_progress_bar_process_kinerja(percentage, timer);
                }, 2000);
            }
        });
    }

    function tampil_progress_bar_process_kinerja(percentage, timer) {
        if (percentage) {
            clearInterval(timer);
            $('.progress-bar').css('width', percentage + '%');
        }
    }
</script>
<!-- HAPUS -->
<script>
    // HAPUS DATA
    function message(icon, text) {
        swal({
            title: "Good Jobs!!!",
            text: text,
            icon: icon,
        });
    }

    var modal_komentar = $('#modal_komentar');
    var form_komentar = $('#form_komentar');

    function komentar(id) {
        $.ajax({
            type: "post",
            url: "<?= base_url() ?>beranda/by_id_progres_vendor/" + id,
            dataType: "JSON",
            success: function(response) {
                $('#id_progres_pekerjaan_tender').val(response['peogres_pekerjaan'].id_progres_pekerjaan_tender)
                modal_komentar.modal('show');
            }
        });
    }

    function Kirim_komentar() {
        var id_paket = $('#id_paket_vendor').val();
        $.ajax({
            type: "post",
            url: "<?= base_url() ?>beranda/kirim_komentar/" + id_paket,
            data: form_komentar.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $("#kirim_ke_vendor").css('display', 'block');
            },
            success: function(response) {
                $("#kirim_ke_vendor").css('display', 'none');
                window.open('https://api.whatsapp.com/send?phone=+62' + response['telpon'] + '&text=Laporan Progres Kinerja Vendor Nama Paket  : ' + response['paket'].nama_paket + ' Dengan Metode Pemilihan : ' + response['paket'].nama_metode_pemilihan + '  Agency : ' + response['paket'].nama_unit_kerja + ', Isi Komentar : ' + response['isi_komentar'] + ', Login Dan Cek Progres Kinerja https://eproc.jmtm.co.id/', '_blank');
                message('success', 'Progres Berhasil Di Update');
                modal_komentar.modal('hide');
                form_komentar[0].reset();
                location.reload();
            }
        });
    }
</script>