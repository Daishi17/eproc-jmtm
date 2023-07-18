<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ba-04-KOREKSI ARITMATIK HARGA TIMPANG DAN NEGOSIASI PRAKUALIFIKASI</title>
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
        <form action="javascript:;" method="POST" id="form_ba_pra4">
            <?php $id_paket = $paket['id_paket'] ?>
            <div class="container-fluid">
                <img class="pull-right" alt="LPSE" src="<?= base_url() ?>assets/img/jmtm2.png" width="30%" />
            </div>
            <center>
                <h4 class=" text-uppercase font-weight-bold" style="line-height: 1;">Berita Acara</h4>
                <h5 class="text-uppercase font-weight-bold" style="line-height: 1;">KOREKSI ARITMATIK HARGA TIMPANG DAN NEGOSIASI</h5>
                <h5 class="text-uppercase font-weight-bold" style="line-height: 1;"><?= $paket['nama_paket'] ?></h5>
                <h5 class="text-uppercase font-weight-bold" style="line-height: 1;">PT JASA MARGA TOLLROAD MAINTENANCE</h5>
            </center>

            <hr size="5">
            <center>
                <div style="font-size:15px">
                    <label class="font-weight-bold">Nomor : <?= $data_ba_4['nomor'] ?>></label>
                    <br>
                    <label class=" font-weight-bold">Tanggal : <?= $data_ba_4['tanggal'] ?></label>
                </div>
            </center>
            <div class="container">
                <p style="text-align:justify; font-size:15px">
                    Pada Hari ini <b> <?= $data_ba_4['hari_terbilang'] ?></b>, Tanggal <b> <?= $data_ba_4['tgl_terbilang'] ?></b>, Bulan <b> <?= $data_ba_4['bulan_terbilang'] ?></b>, <b> Tahun <?= $data_ba_4['tahun_terbilang'] ?>,<?= $data_ba_4['tgl'] ?> </b> , <b>Panitia <?= $paket['nama_panitia'] ?> </b> yang dibentuk melalui Surat Keputusan Direksi PT Jasa Marga Tollroad Maintenance Nomor : 34/SK.DIR/JMTM/III/2023 Tentang Perubahan atas Keputusan Direksi Nomor 79/SK.DIR/JMTM/VII/2022 Tentang Pembentukan Panitia Pengadaan Barang/Jasa Kontrak Manajemen, Non Kontrak Manajemen, Tim Evaluasi, Klarifikasi & Negosiasi Untuk Keperluan Project Construction, AMP & Heavy Equipment serta berdasarkan SK Pengadaan Barang dan Jasa yang berlaku di lingkungan perusahaan, telah melaksanakan koreksi aritmatika, harga timpang dan negosiasi pada peserta peringkat 1 (pertama) pengadaan sesuai dengan jadwal pengadaan yang telah ditentukan dengan hasil sebagai berikut:
                </p>

                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">NAMA PERUSAHAAN</th>
                            <th style="text-align: center;">HARGA PENAWARAN AWAL TERMASUK PPN 11%</th>
                            <th style="text-align: center;">HARGA PENAWARAN TERKOREKSI TERMASUK PPN 11%</th>
                            <th style="text-align: center;">NILAI HEA (HASIL EVALUASI AKHIR)</th>
                            <th style="text-align: center;">% TKDN (TINGKAT KOMPONEN DALAM NEGERI)</th>
                            <th style="text-align: center;">HARGA NEGOSIASI TERMASUK PPN 11%</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 1;
                        $id_paket =  $paket['id_paket'];
                        $vendor_mengikuti  = $this->db->query("SELECT * FROM tbl_vendor_mengikuti_paket LEFT JOIN tbl_vendor ON tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor LEFT JOIN tbl_vendor_identitas_prusahaan ON tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor WHERE id_mengikuti_paket_vendor = $id_paket AND nilai_pringkat_teknis = 1")->result_array();

                        foreach ($vendor_mengikuti as $key => $value) { ?>
                            <tr>
                                <td style="text-align: center;"><?= $i++ ?></td>
                                <td style="text-align: center;"><?= $value['nama_usaha'] ?></td>
                                <td style="text-align: center;">Rp. <?= $value['nilai_penawaran'] ?></td>
                                <td style="text-align: center;">Rp. <?= $value['nilai_terkoreksi'] ?></td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">Rp. <?= $value['negosiasi'] ?></td>
                            </tr>
                        <?php   } ?>

                    </tbody>
                </table>
                <br>

                <br>
                <p style="text-align:justify; font-size:15px">
                    Dalam kegiatan Penilaian Kewajaran Harga terhadap semua Harga Satuan Penawaran dari Peserta Penawaran. Selanjutnya Panitia Pengadaan melakukan klarifikasi terhadap Harga Satuan Penawaran yang lebih dari 110% terhadap Harga Satuan dalam Harga Perkiraan Sendiri (HPS) yang dinyatakan sebagai Harga Satuan Timpang (Terlampir).
                </p>

                <div style="text-align:justify; font-size:15px">Dari hasil klarifikasi yang telah dilakukan, maka :</div>
                <ol type="a" style="text-align:justify; font-size:15px">
                    <li>Harga Satuan Penawaran yang dinyatakan sebagai Harga Satuan Timpang lebih dari 110% terhadap Harga Satuan dalam HPS</li>
                </ol>

                <p style="text-align:justify; font-size:15px">
                    Harga Satuan Timpang dimaksud hanya berlaku untuk Kuantitas Awal sebagaimana dimaksud dalam Daftar Kuantitas dan Harga. Selanjutnya jika dalam pelaksanaan Kontrak terjadi pertambahan Kuantitas terhadap Kuantitas Awal dimaksud, maka akan diberlakukan Harga Satuan yang baru untuk pertambahan Kuantitas tersebut sesuai kesepakatan antara Para Pihak sebagaimana dimaksud dalam Kontrak.
                </p>

                <p style="text-align:justify; font-size:15px">
                    Selanjutnya dari hasil penilaian kewajaran harga yang telah dilakukan terhadap Harga Satuan Penawaran (ada / tidak ada (coret yang tidak perlu)) harga yang lebih 110% terhadap Harga Satuan dalam Harga Perkiraan Sendiri
                </p>

                <ol type="a" start="2" style="text-align:justify; font-size:15px">
                    <li>Harga Satuan Penawaran yang dinyatakan sebagai Harga Satuan Timpang lebih dari 110% terhadap Harga Satuan dalam HPS</li>
                </ol>

                <br>

                <div style="text-align:justify; font-size:15px">
                    Dari hasil Koreksi Aritmatik yang telah dilakukan, didapatkan <b>Daftar Peringkat</b> sebagai berikut:
                </div>

                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align:justify">No</th>
                            <th style="text-align:justify">Nama Perusahaan</th>
                            <th style="text-align:justify">Nilai Teknis</th>
                            <th style="text-align:justify">Penawaran harga <br>Terkoreksi</th>
                            <th style="text-align:justify">%HPS</th>
                            <th style="text-align:justify">Nilai Harga <br>
                                Penawaran(NHP)</th>
                            <th style="text-align:justify">Nilai Akhir</th>
                            <th style="text-align:justify">Peringkat Sementara</th>
                            <th style="text-align:justify">Harga Negosiasi <br>
                                (jika ada)</th>
                            <th style="text-align:justify">
                                Keterangan
                                <br>
                                Lulus/Gugur
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 1;
                        $id_paket =  $paket['id_paket'];
                        $vendor_mengikuti  = $this->db->query("SELECT * FROM tbl_vendor_mengikuti_paket LEFT JOIN tbl_vendor ON tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor LEFT JOIN tbl_vendor_identitas_prusahaan ON tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor WHERE id_mengikuti_paket_vendor = $id_paket AND nilai_pringkat_teknis = 1")->result_array();

                        foreach ($vendor_mengikuti as $key => $value) { ?>
                            <tr>
                                <td style="text-align: center;"><?= $i++ ?></td>
                                <td style="text-align: center;"><?= $value['nama_usaha'] ?></td>
                                <td style="text-align: center;">
                                    <?php if (!$value['nilai_teknis']) { ?>
                                        0
                                    <?php } else {  ?>
                                        <?= $value['nilai_teknis'] ?>
                                    <?php }  ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php if (!$value['nilai_terkoreksi']) { ?>
                                        0
                                    <?php } else {  ?>
                                        <?= $value['nilai_terkoreksi'] ?>
                                    <?php }  ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php if (!$value['hps_pra4']) { ?>
                                        Tidak Ada
                                    <?php } else {  ?>
                                        <?= $value['hps_pra4'] ?>
                                    <?php }  ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php if (!$value['nhp_pra4']) { ?>
                                        Tidak Ada
                                    <?php } else {  ?>
                                        <?= $value['nhp_pra4'] ?>
                                    <?php }  ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php if (!$value['nilai_akhir']) { ?>
                                        0
                                    <?php } else {  ?>
                                        <?= $value['nilai_akhir'] ?>
                                    <?php }  ?>
                                </td>
                                <td style="text-align:center;">
                                    <?php if (!$value['peringkat_pra4']) { ?>
                                        0
                                    <?php } else {  ?>
                                        <?= $value['peringkat_pra4'] ?>
                                    <?php }  ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php if (!$value['negosiasi']) { ?>
                                        0
                                    <?php } else {  ?>
                                        <?= $value['negosiasi'] ?>
                                    <?php }  ?>
                                </td>
                                <td style="text-align:center;">
                                    <?php if ($value['ket_pra4'] == 'Lulus') { ?>
                                        Lulus
                                    <?php } else {  ?>
                                        Gugur
                                    <?php }  ?>
                                </td>
                            </tr>
                        <?php   } ?>

                    </tbody>
                </table>

                <br>

                <p style="text-align:justify; font-size:15px">
                    Hasil evaluasi diatas sebagaimana terlampir menjadi satu kesatuan dan merupakan bagian yang tidak terpisahkan dari Berita Acara ini.
                    <br>
                    <br>
                    Demikian Berita Acara ini dibuat dengan sebenarnya, ditandatangani oleh Panitia Pengadaan
                </p>

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