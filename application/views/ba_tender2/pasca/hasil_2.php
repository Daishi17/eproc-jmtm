<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ba-02-PEMBERITAHUAN PERINGKAT TEKNIS</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="print.css" type="text/css" media="print" />
    <link rel="Shortcut Icon" href="<?= base_url('assets/img/unnamed.png') ?>" type="image/x-icon" sizes="96x96" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/boostrapnew/dist/css/bootstrap.min.css" type="text/css" media="all" />
    <!-- dataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css" media="all">

    <!-- select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css" media="all">
    <!-- custom -->
    <!-- Sweetalert-->
    <link href="<?= base_url('assets/'); ?>sweetalert2/sweetalert2.min.css" rel="stylesheet" media="all">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css"> -->
    <link href="<?= base_url('assets/datetimepicekernew/plugins/'); ?>jquery.datetimepicker.min.css" rel="stylesheet" media="all">
    <script src="<?= base_url('assets/'); ?>js/sweetalert.min.js" media="all"></script>

    <script type="text/javascript" src="<?= base_url('assets/') ?>boostrapnew/dist/js/jquery.min.js" media="all"></script>

</head>

<body style="font-size: 13px;">
    <div class="container">
        <form action="javascript:;" method="POST" id="form_ba_pasca2">
            <?php $id_paket = $paket['id_paket'] ?>
            <div class="container-fluid">
                <img class="pull-right" alt="LPSE" src="<?= base_url() ?>assets/img/jmtm2.png" width="30%" />
            </div>

            <center>
                <h4 class="text-uppercase font-weight-bold" style="line-height: 1;">Berita Acara</h4>
                <h5 class="text-uppercase font-weight-bold" style="line-height: 1;">PEMBUKAAN DAN EVALUASI DOKUMEN PENAWARAN (FILE I)</h5>
                <h5 class="text-uppercase font-weight-bold" style="line-height: 1;"><?= $paket['nama_paket'] ?></h5>
                <h5 class="text-uppercase font-weight-bold" style="line-height: 1;">PT JASA MARGA TOLLROAD MAINTENANCE</h5>
            </center>
            <hr size="5">
            <center>
                <div style="font-size:15px">
                    <label class="font-weight-bold">Nomor : <?= $data_ba_pasca2['nomor'] ?></label>
                    <br>
                    <label class="font-weight-bold">Tanggal : <?= $data_ba_pasca2['tanggal'] ?></label>
                </div>
            </center>
            <div class="container">
                <p style="text-align:justify; font-size:15px">
                    Pada Hari ini <b><?= $data_ba_pasca2['hari_terbilang'] ?></b> ,
                    Tanggal <b><?= $data_ba_pasca2['tgl_terbilang'] ?></b> ,
                    Bulan <b> <?= $data_ba_pasca2['bulan_terbilang'] ?></b> ,
                    <b> Tahun <?= $data_ba_pasca2['tahun_terbilang'] ?> , <?= $data_ba_pasca2['tgl'] ?> </b> , <b>Panitia <?= $paket['nama_panitia'] ?> </b> yang dibentuk melalui Surat Keputusan Direksi PT Jasa Marga Tollroad Maintenance Nomor : 115/SK.DIR/JMTM/IX/2021 tanggal 24 september 2021 tentang Pembentukan Panitia Pengadaan Barang/Jasa Lingkup Kontrak Manajemen dengan Metode Pemilihan Tender/seleksi Umum dan Penunjukan langsung dan Surat Keputusan Procurement General Manager Procurement Nomor 01/SK.GM.PROCUREMENT/JMTM/VIII/2021 tanggal 20 Agustus 2021 tentang Pembentukan panitia Pengadaan barang/Jasa Metode Pemilihan Tender/Seleksi Terbatas berdasarkan SK Pengadaan barang dan jasa yang berlaku di lingkungan perusahaan, telah melaksanakan evaluasi kualifikasi dan peringkat teknis dokumen pengadaan pada sesuai dengan jadwal pengadaan yang telah ditentukan dengan hasil sebagai berikut:
                </p>

                <ol type="a" style="text-align:justify; font-size:15px">
                    <li>Jumlah Peserta yang melakukan menyampaikan dokumen pengadaan adalah :</li>
                    <br>
                    <h6><?= $data_ba_pasca2['jml_peserta'] ?> Peserta</h6>
                    <br>
                    <p style=" text-align:justify; font-size:15px">Evaluasi Kualifikasi dilakukan terhadap (input dari jumlah peserta) Peserta yang mengupload Formulir Isian Kualifikasi sebagaimana dimaksud sesuai dengan kelengkapan persyaratan yang harus dilengkapai dalam daftar penyampaian Formulir Isian Kualifikasi terlampir. </p>

                    <li>Setelah dilakukan Evaluasi Kualifikasi dimaksud didapatkan hasil sebagaimana berikut:</li>
                    <ul>
                        <li><?= $data_ba_pasca2['jml_lulus'] ?> Peserta <b>Lulus</b> dalam Evaluasi Kualifikasi.</li>
                        <li><?= $data_ba_pasca2['jml_tdk_lulus'] ?> Peserta <b>Tidak Lulus</b> dalam Evaluasi Kualifikasi.</li>
                    </ul>
                    <br>
                    <li>
                        Evaluasi Kualifikasi dilakukan sesuai dengan Metode Evaluasi Kualifikasi yang telah disetujui oleh Pengguna Jasa, yang dilakukan secara bertahap sesuai tahapan Penilaian Kualifikasi sebagai berikut :

                    </li>
                </ol>
                <br>
                <h6 class="text-uppercase" style="text-align:justify; font-size:15px">metode evaluasi kualifikasi</h6>
                <br>
                <p style="text-align:justify; font-size:15px">Metode Evaluasi Kualifikasi mengacu pada Pedoman pengadaan barang dan jasa yang berlaku dilingkungan PT Jasa Marga Tollroad Maintenance.</p>
                <b style="text-align:justify; font-size:15px">Tahap 1. Evaluasi Administrasi</b>
                <br>
                <br>
                <ol style="text-align:justify; font-size:15px">
                    <li>Evaluasi Administrasi dilakukan terhadap kelengkapan Formulir Isian Kualifikasi yang telah ditetapkan;</li>
                    <li>Evaluasi Administrasi menghasilkan kesimpulan :</li>
                    <ul>
                        <li>LULUS (memenuhi syarat); atau</li>
                        <li>GUGUR (tidak memenuhi syarat). Bagi Peserta yang GUGUR tidak dilakukan tahap Penilaian Kualifikasi selanjutnya.</li>
                    </ul>
                </ol>
                <br>
                <b style="text-align:justify; font-size:15px">Tahap 2. Evaluasi Kemampuan Teknis</b>
                <br>
                <br>
                <ol style="text-align:justify; font-size:15px">
                    <li>Bobot Penilaian untuk Evaluasi Kemampuan Teknis adalah 100%;</li>
                    <li>Ambang batas nilai minimal untuk Evaluasi Kemampuan Teknis adalah <?= $data_ba_pasca2['kemampuan_teknis'] ?>;</li>
                    <li>Peserta dinyatakan LULUS Evaluasi Kemampuan Teknis jika nilai Evaluasi Kemampuan Teknis lebih dari atau sama dengan ambang batas nilai yang telah ditetapkan, dan dinyatakan GUGUR jika nilai Evaluasi Kemampuan Teknis kurang dari ambang batas nilai yang telah ditetapkan. Bagi Peserta yang GUGUR tidak dilakukan tahap Penilaian Kualifikasi selanjutnya;</li>
                    <li>Unsur yang dinilai pada Evaluasi Kemampuan Teknis adalah :</li>
                    <ol type="a" style="text-align:justify; font-size:15px">
                        <?php $id_paket = $data_ba_pasca2['id_paket'];
                        $unsur1 = $this->db->query("SELECT * FROM tbl_ba_unsur_pasca2 WHERE id_paket = $id_paket")->result_array(); ?>

                        <?php foreach ($unsur1 as $key => $value) { ?>
                            <li>
                                <?= $value['nama_unsur'] ?>
                                <br>
                                <ol>
                                    <?php $id_ba_unsur_pasca2 = $value['id_unsur_pasca2'];
                                    $unsur2 = $this->db->query("SELECT * FROM tb_ba_unsur_dtl_pasca2 WHERE id_ba_unsur_pasca2 = '$id_ba_unsur_pasca2'")->result_array(); ?>
                                    <?php foreach ($unsur2 as $key => $value2) { ?>

                                        <li> <?= $value2['nama_unsur2'] ?></li>

                                    <?php  } ?>
                                </ol>

                            </li>
                        <?php } ?>

                    </ol>
                </ol>
                <br>
                <p style="text-align:justify; font-size:15px"><b>Ambang Batas Nilai Total Minimal (Nilai Evaluasi Kemampuan Keuangan + Nilai Evaluasi Kemampuan Teknis) :</b></p>
                <ul>
                    <li>Ambang Batas Nilai Total Minimal (Nilai Evaluasi Kemampuan Keuangan + Nilai Evaluasi Kemampuan Teknis) :</li>
                    <li>Peserta dinyatakan LULUS Evaluasi Kualifikasi jika nilai total (Nilai Evaluasi Kemampuan Keuangan + Nilai Evaluasi Kemampuan Teknis) lebih dari atau sama dengan ambang batas nilai yang telah ditetapkan, dan dinyatakan GUGUR jika nilai total tersebut kurang dari ambang batas nilai yang telah ditetapkan.</li>
                </ul>
                <p style="text-align:justify; font-size:15px">Jika pada suatu tahapan Penilaian Kualifikasi dinyatakan Gugur, maka Evaluasi Kualifikasi langsung dihentikan dan tidak dilanjutkan pada tahap Penilaian Kualifikasi berikutnya</p>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="2" style="text-align: center;">Nomor</th>
                            <th rowspan="2" style="text-align: center;">Nama Perusahaan</th>
                            <th colspan="3" style="text-align: center;">Evaluasi</th>
                            <th rowspan="2" style="text-align: center;">Nilai Evaluasi Teknis</th>
                            <th rowspan="2" style="text-align: center;">Keterangan</th>
                            <th rowspan="2" style="text-align: center;">Peringkat</th>
                        </tr>
                        <tr>
                            <th style="text-align: center;">Administrasi</th>
                            <th style="text-align: center;">Keuangan</th>
                            <th style="text-align: center;">Teknis</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        $id_paket =  $paket['id_paket'];
                        $vendor_mengikuti  = $this->db->query("SELECT * FROM tbl_vendor_mengikuti_paket LEFT JOIN tbl_vendor ON tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor LEFT JOIN tbl_vendor_identitas_prusahaan ON tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor WHERE id_mengikuti_paket_vendor = $id_paket")->result_array();

                        foreach ($vendor_mengikuti as $key => $value) { ?>
                            <tr>
                                <td style="text-align: center;"><?= $i++ ?></td>
                                <td style="text-align: center;"><?= $value['nama_usaha'] ?></td>
                                <td style="text-align: center;">
                                    <?php if (!$value['ev_admin_pasca2']) { ?>
                                        Lulus / Gugur
                                    <?php } else if ($value['ev_admin_pasca2'] == 1) {  ?>
                                        Lulus
                                    <?php } else if ($value['ev_admin_pasca2'] == 2) {  ?>
                                        Gugur
                                    <?php } else {  ?>

                                    <?php }  ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php if (!$value['ev_keuangan_pasca2']) { ?>
                                        Lulus / Gugur
                                    <?php } else if ($value['ev_keuangan_pasca2'] == 1) {  ?>
                                        Lulus
                                    <?php } else if ($value['ev_keuangan_pasca2'] == 2) {  ?>
                                        Gugur
                                    <?php } else {  ?>

                                    <?php }  ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php if (!$value['ev_teknis_pasca2']) { ?>
                                        Lulus / Gugur
                                    <?php } else if ($value['ev_teknis_pasca2'] == 1) {  ?>
                                        Lulus
                                    <?php } else if ($value['ev_teknis_pasca2'] == 2) {  ?>
                                        Gugur
                                    <?php } else {  ?>

                                    <?php }  ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php if ($value['nilai_teknis']) { ?>
                                        <?= $value['nilai_teknis'] ?>
                                    <?php } else { ?>
                                        0
                                    <?php   }
                                    ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php if (!$value['ket_pasca2']) { ?>
                                        Lulus / Gugur
                                    <?php } else if ($value['ket_pasca2'] == 1) {  ?>
                                        Lulus
                                    <?php } else if ($value['ket_pasca2'] == 2) {  ?>
                                        Gugur
                                    <?php } else {  ?>

                                    <?php }  ?>
                                </td>
                                <td style="text-align:center;">
                                    <?php if (!$value['peringkat_pasca2']) { ?>

                                    <?php } else {  ?>
                                        <?= $value['peringkat_pasca2'] ?>
                                    <?php }  ?>
                                </td>
                            </tr>
                        <?php   } ?>
                    </tbody>
                </table>

                <p style="text-align:justify; font-size:15px">
                    Hasil Evaluasi Kualifikasi dimaksud sebagaimana terlampir menjadi satu kesatuan dan merupakan bagian tidak terpisahkan dari Berita Acara ini.
                </p style="text-align:justify; font-size:15px">
                <p>
                    Demikian Berita Acara ini dibuat dengan sebenarnya dan ditandatangani oleh Panitia Pengadaan.
                </p>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Nama</th>
                            <th style="text-align: center;">Kedudukan dalam Tim</th>
                            <th style="text-align: center;">Tanda Tangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        $query_panitia = $this->db->query("SELECT * FROM tbl_paket LEFT JOIN tbl_panitia ON tbl_paket.id_panitia = tbl_panitia.id_panitia
                                                LEFT JOIN tbl_detail_panitia ON tbl_panitia.id_panitia = tbl_detail_panitia.id_panitia
                                                LEFT JOIN tbl_pegawai ON tbl_detail_panitia.id_pegawai2 = tbl_pegawai.id_pegawai
                                                LEFT JOIN tbl_role_panitia ON tbl_detail_panitia.id_role_panitia = tbl_role_panitia.id_role_panitia
                                                WHERE tbl_paket.id_paket = $id_paket ORDER BY tbl_detail_panitia.id_role_panitia ASC")->result_array();
                        foreach ($query_panitia as $key => $value) { ?>
                            <tr>
                                <td style="text-align: center;"><?= $i++ ?></td>
                                <td style="text-align: center;" class="text-uppercase"><?= $value['nama_pegawai'] ?></td>
                                <td style="text-align: center;" class="text-uppercase"><?= $value['nama_role_panitia'] ?></td>
                                <td style="text-align: center;" class="text-uppercase">
                                    <a href="" class="btn btn-sm btn-success">Sudah Di Setujui dari Pakta Integritas</a>
                                </td>
                            </tr>
                        <?php  } ?>

                    </tbody>
                </table>
            </div>
        </form>
    </div>


    <!-- Jquery -->
    <!-- Bootstrap -->
    <script type="text/javascript" src="<?= base_url('assets/') ?>boostrapnew/dist/js/bootstrap.min.js" media="all"></script>
    <!-- dataTables -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" media="all"></script>
    <!-- select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" media="all"></script>

    <!-- custom js -->
    <script type="text/javascript" src="<?= base_url('assets/') ?>kintek.js" media="all"></script>

    <!-- datepicker -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js" integrity="sha512-ZrigzIl5MysuwHc2LaGI+uOLnLDdyYUth+pA5OuJC++WEleiYrztIc7nU/iBRWeP+ufmSGepuJULdgh/K0rIAA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <script media="all" type="text/javascript" src="<?= base_url('assets/datetimepicekernew/plugins/'); ?>jquery.datetimepicker.full.min.js"></script>


</body>

</html>
<script>
    window.print();
</script>