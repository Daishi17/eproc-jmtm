<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ba-02-EVALUASI TEKNIS FILE I PRAKUALIFIKASI</title>
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
        <div class="container-fluid">
            <img class="pull-right" alt="LPSE" src="<?= base_url() ?>assets/img/jmtm2.png" width="30%" />
        </div>
        <form action="<?= base_url('panitiajmtm/beranda/simpan_ba_pra_2/' . $paket['id_paket']) ?>" method="POST">
            <?php $id_paket = $paket['id_paket'] ?>

            <center>
                <h4 class="text-uppercase font-weight-bold" style="line-height: 1;">Berita Acara</h4>
                <h5 class="text-uppercase font-weight-bold" style="line-height: 1;">PEMBUKAAN DAN EVALUASI DOKUMEN PENAWARAN (FILE I)</h5>
                <h5 class="text-uppercase font-weight-bold" style="line-height: 1;"><?= $paket['nama_paket'] ?></h5>
                <h5 class="text-uppercase font-weight-bold" style="line-height: 1;">PT JASA MARGA TOLLROAD MAINTENANCE</h5>
            </center>

            <hr size="5">
            <center>
                <div style="font-size:15px">
                    <label class="font-weight-bold">Nomor : <?= $data_ba_2['nomor'] ?></label>
                    <br>
                    <label class="font-weight-bold">Tanggal : <?= $data_ba_2['tanggal'] ?></label>
                </div>
            </center>
            <div class="container">
                <p style="text-align:justify; font-size:15px">
                    Pada Hari ini <b> <?= $data_ba_2['hari_terbilang'] ?></b> , Tanggal <b> <?= $data_ba_2['tgl_terbilang'] ?></b>, Bulan <b> <?= $data_ba_2['bulan_terbilang'] ?> </b>, <b> Tahun <?= $data_ba_2['tahun_terbilang'] ?>, <?= $data_ba_2['tgl'] ?> </b> , <b>Panitia <?= $paket['nama_panitia'] ?> </b> yang dibentuk melalui Surat Keputusan Direksi PT Jasa Marga Tollroad Maintenance Nomor : 115/SK.DIR/JMTM/IX/2021 tanggal 24 september 2021 tentang Pembentukan Panitia Pengadaan Barang/Jasa Lingkup Kontrak Manajemen dengan Metode Pemilihan Tender/seleksi Umum dan Penunjukan langsung dan Surat Keputusan Procurement General Manager Procurement Nomor 01/SK.GM.PROCUREMENT/JMTM/VIII/2021 tanggal 20 Agustus 2021 tentang Pembentukan panitia Pengadaan barang/Jasa Metode Pemilihan Tender/Seleksi Terbatas berdasarkan SK Pengadaan barang dan jasa yang berlaku di lingkungan perusahaan telah melaksanakan Evaluasi Penawaran Teknis untuk <?= $paket['nama_paket'] ?> dengan hasil sebagai berikut:
                </p>
                <table class="table">
                    <thead>
                        <tr>
                            <td><b> Kegiatan Penyampaian Dokumen Penawaran</b></td>
                            <td><b> Jumlah Peserta Penawaran </b></td>
                            <td><b> Keterangan</b></td>
                        </tr>
                        </tdead>
                    <tbody>
                        <tr>
                            <td>Yang Menyampaikan Dokumen Penawaran</td>
                            <td><?= $data_ba_2['ymdk'] ?></td>
                            <td rowspan="3">Sesuai ketentuan yang berlaku, maka Pelelangan Terbatas dinyatakan:
                                <?php if ($data_ba_2['ket_penyampaian'] == 'Sah') { ?>
                                    Sah
                                <?php  } else { ?>
                                    Gagal
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Tidak Menyampaikan Dokumen Penawaran</td>
                            <td><?= $data_ba_2['tmdp'] ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Total</td>
                            <td><?= $data_ba_2['ymdk'] + $data_ba_2['tmdp'] ?></td>
                        </tr>
                    </tbody>
                </table>

                <br>

                <table class="table">
                    <thead>
                        <tr>
                            <td><b> Kegiatan Pembukaan Dokumen Penawaran</b></td>
                            <td><b> Jumlah Peserta Penawaran </b></td>
                            <td><b> Keterangan</b></td>
                        </tr>
                        </tdead>
                    <tbody>
                        <tr>
                            <td>Dokumen Penawaran yang dinyatakan SAH</td>
                            <td><?= $data_ba_2['dpyds'] ?></td>
                            <td rowspan="3">Sesuai ketentuan yang berlaku, maka Pelelangan Terbatas dinyatakan:

                                <?php if ($data_ba_2['ket_penawaran'] == 'Sah') { ?>
                                    Sah
                                <?php  } else { ?>
                                    Gagal
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Dokumen Penawaran yang dinyatakan GUGUR</td>
                            <td><?= $data_ba_2['dpydg'] ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Total</td>
                            <td><?= $data_ba_2['dpyds'] + $data_ba_2['dpydg'] ?></td>
                        </tr>
                    </tbody>
                </table>

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
                                    <?php if (!$value['ev_admin_pra1']) { ?>
                                        Lulus / Gugur
                                    <?php } else if ($value['ev_admin_pra1'] == 1) {  ?>
                                        Lulus
                                    <?php } else if ($value['ev_admin_pra1'] == 2) {  ?>
                                        Gugur
                                    <?php } else {  ?>

                                    <?php }  ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php if (!$value['ev_keuangan_pra1']) { ?>
                                        Lulus / Gugur
                                    <?php } else if ($value['ev_keuangan_pra1'] == 1) {  ?>
                                        Lulus
                                    <?php } else if ($value['ev_keuangan_pra1'] == 2) {  ?>
                                        Gugur
                                    <?php } else {  ?>

                                    <?php }  ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php if (!$value['ev_teknis_pra1']) { ?>
                                        Lulus / Gugur
                                    <?php } else if ($value['ev_teknis_pra1'] == 1) {  ?>
                                        Lulus
                                    <?php } else if ($value['ev_teknis_pra1'] == 2) {  ?>
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
                                    <?php if (!$value['ket_pra1']) { ?>
                                        Lulus / Gugur
                                    <?php } else if ($value['ket_pra1'] == 1) {  ?>
                                        Lulus
                                    <?php } else if ($value['ket_pra1'] == 2) {  ?>
                                        Gugur
                                    <?php } else {  ?>

                                    <?php }  ?>
                                </td>
                                <td style="text-align:center;">
                                    <?php if (!$value['peringkat_pra2']) { ?>

                                    <?php } else {  ?>
                                        <?= $value['peringkat_pra2'] ?>
                                    <?php }  ?>
                                </td>
                            </tr>
                        <?php   } ?>
                    </tbody>
                </table>
                <br>
                <br>
                <b class="text-uppercase">panitia pengadaan : </b>
                <br>
                <br>
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
                                    Setuju
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