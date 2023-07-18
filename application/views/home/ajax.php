<script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".preloader").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2000)
    })
</script>
<script>
    $(document).ready(function() {
        $('#table1').DataTable();
    });
    $(document).ready(function() {
        $('#table2').DataTable();
    });
    $(document).ready(function() {
        $('#table3').DataTable();
    });
    $(document).ready(function() {
        $('#table4').DataTable();
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
    $(document).ready(function() {
        var modaliklan = $('#modal_saya');
        modaliklan.modal('show');
    });
</script>
<script>
    var saveData;
    var tabledata2 = $('#serverside_home');
    var modalDetail = $('#modalDetail');
    var modal_sayang = $('#modal_sayang');


    $(document).ready(function() {
        var id_provinsi = $('#provinsi').val();
        fill_datatable();

        function fill_datatable(id_metode_pemilihan = '', id_jenis_pengadaan = '') {
            tabledata2.DataTable({
                "responsive": true,
                "autoWidth": false,
                "processing": true,
                "serverSide": true,
                // "searching": false,
                "order": [],
                "ajax": {
                    "url": "<?= base_url('home/datatable') ?>",
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
                    "sSearch": "CARI NAMA PAKET : ",
                    "sEmptyTable": "Data Tidak Tersedia",
                    "sLoadingRecords": "Silahkan Tunggu - loading...",
                    "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
                    "sZeroRecords": "Moho Maaf Tidak Ada Data Paket Yang Di Cari",
                    "sProcessing": "Memuat Data...."
                }
            });
        }
        // filtering select data per divisi dan per jenis pengadaan
        $('#cari_paket').click(function() {
            var id_metode_pemilihan = $('#id_metode_pemilihan').val();
            var id_jenis_pengadaan = $('#id_jenis_pengadaan').val();
            if (id_metode_pemilihan != '' && id_jenis_pengadaan != '') {
                tabledata2.DataTable().destroy();
                fill_datatable(id_metode_pemilihan, id_jenis_pengadaan);
            } else {
                $('#laler').show();
                setTimeout(function() {
                    $('#laler').hide();
                }, 3000);
                tabledata2.DataTable().destroy();
                fill_datatable();
            }
        })
    });

    $('#reload').click(function() {
        tabledata2.DataTable().ajax.reload();
    })


    function byid(id, type) {

        if (type == 'lihat_tahap') {
            saveData = 'lihat_tahap';
        }
        if (type == 'detail') {
            saveData = 'detail';
        }

        $.ajax({
            type: "GET",
            url: "<?= base_url('home/byid/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'detail') {
                    $('#nama_paket').html(response['get_paket'].nama_paket);
                    $('#metode_pemilihan').html(response['get_paket'].nama_metode_pemilihan);
                    $('#divisi').html(response['get_paket'].nama_unit_kerja);
                    $('#nama_jenis_pengadaan').html(response['get_paket'].nama_jenis_pengadaan);
                    $('#hps_manual').html('Rp. ' + response['total_hps'].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00' + '');
                    modal_sayang.modal('show');
                }
                if (type == 'lihat_tahap') {
                    var html = '';
                    var i;
                    for (i = 0; i < response['jadwal_saya'].length; i++) {
                        if (response['jadwal_saya'][i].status_perubahan == null) {
                            var alasan = 'Tidak Mengalami Perubahan';
                        } else {
                            var alasan = response['jadwal_saya'][i].alasan_perubahan;
                        }
                        if (response['jadwal_saya'][i].tanggal_mulai_jadwal >= new Date()) {
                            var nama_jadwal = '<b>' + response['jadwal_saya'][i].nama_jadwal_tender + '</b>'
                        } else if (response['jadwal_saya'][i].tanggal_mulai_jadwal >= new Date() || response['jadwal_saya'][i].tanggal_selesai_jadwal == new Date()) {
                            var nama_jadwal = '<b class="text-danger">' + response['jadwal_saya'][i].nama_jadwal_tender + '<small class = "badge badge-danger"> Tahap Sedang Berlangsung </small></b>';
                        } else {
                            var nama_jadwal = '<b class="text-success">' + response['jadwal_saya'][i].nama_jadwal_tender + ' Tahap Sudah Selesai <i class = "fa fa-check"> </i></small></b>';
                        }
                        html += '<tr>' +
                            '<td>' + nama_jadwal + '</td>' +
                            '<td>' + response['jadwal_saya'][i].tanggal_mulai_jadwal + '</td>' +
                            '<td>' + response['jadwal_saya'][i].tanggal_selesai_jadwal + '</td>' +
                            '<td>' + alasan + '</td>' +
                            '</tr>'
                    }
                    $('#tahap_jadwal').html(html);
                    modalDetail.modal('show');
                }
            }
        })
    }
</script>
<script>
    $(document).ready(function() {
        $('.table_jadwal_sakit').DataTable();
    });
</script>