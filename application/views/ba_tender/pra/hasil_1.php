<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ba-01-HASIL EVALUASI PRAKUALIFIKASI</title>
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
        <form action="<?= base_url('panitiajmtm/beranda/simpan_ba_pra_1/' . $paket['id_paket']) ?>" method="POST">

            <center>
                <h4 class="text-uppercase font-weight-bold" style="line-height: 1;">Berita Acara</h4>
                <h5 class="text-uppercase font-weight-bold" style="line-height: 1;">Evaluasi Prakualifikasi</h5>
                <h5 class="text-uppercase font-weight-bold" style="line-height: 1;"><?= $paket['nama_paket'] ?></h5>
                <h5 class="text-uppercase font-weight-bold" style="line-height: 1;">PT JASA MARGA TOLLROAD MAINTENANCE</h5>
            </center>

            <hr size="5">
            <center>
                <div style="font-size:15px">
                    <label class="font-weight-bold">Nomor : <?= $data_ba_1['nomor'] ?></label>
                    <br>
                    <label class="font-weight-bold">Tanggal : <?= $data_ba_1['tanggal'] ?></label>
                </div>
            </center>
            <div class="container">
                <p style="text-align:justify; font-size:15px">
                    Pada Hari ini <b><?= $data_ba_1['hari_terbilang'] ?></b> ,
                    Tanggal <b><?= $data_ba_1['tgl_terbilang'] ?></b> ,
                    Bulan <b> <?= $data_ba_1['bulan_terbilang'] ?></b> ,
                    <b> Tahun <?= $data_ba_1['tahun_terbilang'] ?> , <?= $data_ba_1['tgl'] ?> </b> ,
                    <b>Panitia <?= $paket['nama_panitia'] ?> </b> yang dibentuk melalui Surat Keputusan Direksi PT Jasa Marga Tollroad Maintenance Nomor : 34/SK.DIR/JMTM/III/2023 Tentang Perubahan atas Keputusan Direksi Nomor 79/SK.DIR/JMTM/VII/2022 Tentang Pembentukan Panitia Pengadaan Barang/Jasa Kontrak Manajemen, Non Kontrak Manajemen, Tim Evaluasi, Klarifikasi & Negosiasi Untuk Keperluan Project Construction, AMP & Heavy Equipment serta berdasarkan SK Pengadaan Barang dan Jasa yang berlaku di lingkungan perusahaan, telah melaksanakan evaluasi Prakualifikasi dokumen pengadaan sesuai dengan jadwal pengadaan yang telah ditentukan dengan hasil sebagai berikut:
                </p>
                <ol type="a">
                    <li>Jumlah Peserta yang melakukan menyampaikan dokumen pengadaan adalah :</li>
                    <b> <?= $data_ba_1['jml_peserta'] ?> Peserta</b>
                    <p>Evaluasi Kualifikasi dilakukan terhadap <?= $data_ba_1['jml_peserta'] ?> Peserta yang mengupload Formulir Isian Kualifikasi sebagaimana dimaksud sesuai dengan kelengkapan persyaratan yang harus dilengkapai dalam daftar penyampaian Formulir Isian Kualifikasi terlampir. </p>

                    <li>
                        Setelah dilakukan Evaluasi Kualifikasi dimaksud didapatkan hasil sebagaimana berikut:
                        <ul>
                            <li><b><?= $data_ba_1['jml_peserta_lulus'] ?> </b> Peserta <b>Lulus </b> dalam Evaluasi Kualifikasi. </li>
                            <li><b><?= $data_ba_1['jml_peserta_tdk_lulus'] ?></b> Peserta tidak Lulus dalam Evaluasi Kualifikasi</li>
                        </ul>
                    </li>
                    <br>
                    <li>Evaluasi Kualifikasi dilakukan sesuai dengan Metode Evaluasi Kualifikasi yang telah disetujui oleh Pengguna Jasa, yang dilakukan secara bertahap sesuai tahapan Penilaian Kualifikasi sebagai berikut :</li>
                </ol>
                <br>
                <br>

                <h6 class="font-weight-bold">METODE EVALUASI KUALIFIKASI</h6>
                <p style="text-align:justify;margin-left:20px">Metode Evaluasi Kualifikasi mengacu pada Pedoman pengadaan barang dan jasa yang berlaku dilingkungan PT Jasa Marga Tollroad Maintenance.</p>

                <ol style="text-align:justify">
                    <li class="font-weight-bold text-uppercase">Ketentuan Umum</li>
                    <ol>
                        <li>Penyedia Jasa yang berhak mengikuti Tender adalah penyedia jasa yang terdaftar pada VMS (Vendor Manajemen Sistem) di PT Jasa Marga Tollroad Maintenance dan tidak / sedang dimasukan dalam <b>Daftar Hitam</b> di PT Jasa Marga Group,</li>
                        <li>Penyedia Jasa yang masuk dalam <b>Daftar Hitam</b> tersebut diatas tidak dapat mengikuti kegiatan Pengadaan dan langsung dinyatakan <b>GUGUR</b> tanpa perlu dilakukan Evaluasi Kualifikasi;</li>
                        <li>Evaluasi Kualifikasi dilakukan secara bertahap sesuai tahapan Penilaian Kualifikasi sebagai berikut :</li>
                        <ul>
                            <li>Tahap 1. Evaluasi Administrasi</li>
                            <li>Tahap 2. Evaluasi Kemampuan Keuangan</li>
                            <li>Tahap 3. Evaluasi Kemampuan Teknis</li>
                        </ul>
                        Jika pada suatu tahapan Penilaian Kualifikasi dinyatakan <b>GUGUR</b>, maka Evaluasi Kualifikasi langsung dihentikan dan tidak perlu dilanjutkan pada tahap Penilaian Kualifikasi berikutnya;
                    </ol>
                    <br>
                    <li class="font-weight-bold text-uppercase">PENILAIAN DAN BOBOT PENILAIAN KUALIFIKASI</li>
                    <b>Tahap 1. Evaluasi Administrasi</b>
                    <br>
                    <ol>
                        <li>Evaluasi Administrasi dilakukan terhadap kelengkapan Formulir Isian Kualifikasi yang telah ditetapkan;</li>
                        <li>Evaluasi Administrasi menghasilkan kesimpulan</li>
                        <ul>
                            <li>LULUS (memenuhi syarat); atau</li>
                            <li>GUGUR (tidak memenuhi syarat). Bagi Peserta yang GUGUR tidak dilakukan tahap Penilaian Kualifikasi selanjutnya.</li>
                        </ul>
                    </ol>
                    <br>
                    <b>Tahap 2. Evaluasi Administrasi</b>
                    <ol>
                        <li>Bobot Penilaian untuk Evaluasi Kemampuan Keuangan adalah <b>50%;</b></li>
                        <li>Ambang batas nilai minimal untuk Evaluasi Kemampuan Keuangan adalah <b> 60;</b></li>
                        <li>Peserta dinyatakan LULUS Evaluasi Kemampuan Keuangan jika nilai Evaluasi Kemampuan Keuangan lebih dari atau sama dengan ambang batas nilai yang telah ditetapkan, dan dinyatakan GUGUR jika nilai Evaluasi Kemampuan Keuangan kurang dari ambang batas nilai yang telah ditetapkan. Bagi Peserta yang GUGUR tidak dilakukan tahap Penilaian Kualifikasi selanjutnya;</li>
                        <li>
                            Unsur yang dinilai pada Evaluasi Kemampuan Keuangan adalah :
                            <ol type="a">
                                <li>Jumlah Kas dan Bank (KB) dengan Bobot Penilaian adalah <b> <?= $data_ba_1['kb'] ?>;</b></li>
                                <li>Sisa Kemampuan Keuangan (SKK) dengan Bobot Penilaian adalah <b><?= $data_ba_1['skk'] ?> ;</b> </li>
                                <li><i>Debt Equity Ratio </i> (DER) dengan Bobot Penilaian adalah <b> <?= $data_ba_1['der'] ?> .</b></li>
                            </ol>
                        </li>
                    </ol>
                    <br>
                    <b>Tahap 3. Evaluasi Kemampuan Teknis</b>
                    <ol>
                        <li>Bobot Penilaian untuk Evaluasi Kemampuan Teknis adalah <b> 50%;</b></li>
                        <li>Ambang batas nilai minimal untuk Evaluasi Kemampuan Teknis adalah <b> 60;</b></li>
                        <li>Peserta dinyatakan LULUS Evaluasi Kemampuan Teknis jika nilai Evaluasi Kemampuan Teknis lebih dari atau sama dengan ambang batas nilai yang telah ditetapkan, dan dinyatakan GUGUR jika nilai Evaluasi Kemampuan Teknis kurang dari ambang batas nilai yang telah ditetapkan. Bagi Peserta yang GUGUR tidak dilakukan tahap Penilaian Kualifikasi selanjutnya;</li>
                    </ol>
                    <ol>
                        Unsur yang dinilai pada Evaluasi Kemampuan Teknis adalah :
                        <ol type="a">
                            <li>Kemampuan Dasar (KD) dengan Bobot Penilaian adalah <b><?= $data_ba_1['kd'] ?> ;</b></li>
                            <li>Nilai Paket Pekerjaan Tertinggi (NPT) dengan Bobot Penilaian adalah <b><?= $data_ba_1['npt'] ?>.</b></li>
                        </ol>
                    </ol>
                    <br>
                    <b>Ambang Batas Nilai Total Minimal (Nilai Evaluasi Kemampuan Keuangan + Nilai Evaluasi Kemampuan Teknis) :</b>
                    <ul>
                        <li>Ambang batas nilai total minimal (Nilai Evaluasi Kemampuan Keuangan + Nilai Evaluasi Kemampuan Teknis) adalah <b>60;</b></li>
                        <li>Peserta dinyatakan LULUS Evaluasi Kualifikasi jika nilai total (Nilai Evaluasi Kemampuan Keuangan + Nilai Evaluasi Kemampuan Teknis) lebih dari atau sama dengan ambang batas nilai yang telah ditetapkan, dan dinyatakan GUGUR jika nilai total tersebut kurang dari ambang batas nilai yang telah ditetapkan.</li>
                    </ul>
                    <p>Jika pada suatu tahapan Penilaian Kualifikasi dinyatakan Gugur, maka Evaluasi Kualifikasi langsung dihentikan dan tidak dilanjutkan pada tahap Penilaian Kualifikasi berikutnya</p>
                    <p>Hasil Evaluasi Kualifikasi dimaksud sebagaimana terlampir yang menjadi satu kesatuan dan merupakan bagian yang tidak terpisahkan dari Berita Acara ini.</p>
                    <p>Jika pada suatu tahapan Penilaian Kualifikasi dinyatakan Gugur, maka Evaluasi Kualifikasi langsung dihentikan dan tidak dilanjutkan pada tahap Penilaian Kualifikasi berikutnya</p>

                    <table class="table table-bordered" id="tbl_vendor_ba_1">
                        <thead>
                            <tr>
                                <th rowspan="2" style="text-align: center;">Nomor</th>
                                <th rowspan="2" style="text-align: center;">Nama Perusahaan</th>
                                <th colspan="3" style="text-align: center;">Evaluasi</th>
                                <th rowspan="2" style="text-align: center;">Nilai Evaluasi Teknis</th>
                                <th rowspan="2" style="text-align: center;">Keterangan</th>
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
                                        <?php if ($value['nilai_prakualifikasi']) { ?>
                                            <?= $value['nilai_prakualifikasi'] ?>
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
                                </tr>
                            <?php   } ?>
                        </tbody>
                    </table>

                    <p>
                        Hasil Evaluasi Kualifikasi dimaksud sebagaimana terlampir menjadi satu kesatuan dan merupakan bagian tidak terpisahkan dari Berita Acara ini.
                    </p>

                    <p>
                        Demikian Berita Acara ini dibuat dengan sebenarnya dan ditandatangani oleh Panitia Pengadaan
                    </p>

                    <b class="text-uppercase">panitia pengadaan : </b>
                    <table class="table table-bordered" id="tbl_panitia_ba_1">
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
                </ol>
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