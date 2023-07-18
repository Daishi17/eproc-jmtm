<script>
    //    $(document).on("click", "ul li", function () {
    // 	$(this).addClass("active").siblings().removeClass("active");
    // });
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })
    // var tabEl = document.querySelector('button[data-bs-toggle="tab"]')
    // tabEl.addEventListener('shown.bs.tab', function(event) {
    // 	event.target // newly activated tab
    // 	event.relatedTarget // previous active tab
    // })
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
                    "url": "<?= base_url('beranda/getdata_vendor_pemenang') ?>",
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
        if (type == 'kasih_penilaian') {}
        $.ajax({
            type: "GET",
            url: "<?= base_url('beranda/byid/'); ?>" + id,
            success: function(response) {
                if (type == 'kasih_penilaian') {

                    location.replace('<?= base_url('beranda/penilaian_kinerja_vendor/') ?>' + id);
                }
            }
        })
    }
</script>