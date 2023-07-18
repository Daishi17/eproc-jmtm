<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ba-01-BUKA DAN EVALUASI FILE 1</title>
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
        <form action="javascript:;" method="POST" id="form_ba_pasca1">
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
                    <label class="font-weight-bold">Nomor : <?= $data_ba_pasca1['nomor'] ?></label>
                    <br>
                    <label class="font-weight-bold">Tanggal : <?= $data_ba_pasca1['tanggal'] ?></label>
                </div>
            </center>
            <div class="container">
                <p style="text-align:justify; font-size:15px">
                    Pada Hari ini <b><?= $data_ba_pasca1['hari_terbilang'] ?></b> ,
                    Tanggal <b><?= $data_ba_pasca1['tgl_terbilang'] ?></b> ,
                    Bulan <b> <?= $data_ba_pasca1['bulan_terbilang'] ?></b> ,
                    <b> Tahun <?= $data_ba_pasca1['tahun_terbilang'] ?> , <?= $data_ba_pasca1['tgl'] ?> </b> , <b>Panitia <?= $paket['nama_panitia'] ?> </b>yang dibentuk melalui Surat Keputusan Direksi PT Jasa Marga Tollroad Maintenance Nomor : 34/SK.DIR/JMTM/III/2023 Tentang Perubahan atas Keputusan Direksi Nomor 79/SK.DIR/JMTM/VII/2022 Tentang Pembentukan Panitia Pengadaan Barang/Jasa Kontrak Manajemen, Non Kontrak Manajemen, Tim Evaluasi, Klarifikasi & Negosiasi Untuk Keperluan Project Construction, AMP & Heavy Equipment serta berdasarkan SK Pengadaan Barang dan Jasa yang berlaku di lingkungan perusahaan, telah melaksanakan pembukaan dan evaluasi dokumen pengadaan file I sesuai dengan jadwal pengadaan yang telah ditentukan.
                </p>

                <p style="text-align:justify; font-size:15px">Jumlah Peserta Penawaran yang menyampaikan Dokumen Penawaran adalah <b><?= $data_ba_pasca1['jml_peserta'] ?></b> Peserta Penawaran, dengan hasil sebagai berikut : </p>

                <table class="table table-bordered">
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
                            <td><?= $data_ba_pasca1['ymdp'] ?></td>
                            <td rowspan=" 3">Sesuai ketentuan yang berlaku, maka Pelelangan Terbatas dinyatakan:
                                <?php if ($data_ba_pasca1['ket_penyampaian'] == 'Sah') { ?>
                                    Sah
                                <?php  } else { ?>
                                    Gagal
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Tidak Menyampaikan Dokumen Penawaran</td>
                            <td><?= $data_ba_pasca1['tmdp'] ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Total</td>
                            <td><?= $data_ba_pasca1['ymdp'] +  $data_ba_pasca1['tmdp'] ?></td>
                        </tr>
                    </tbody>
                </table>

                <table class="table table-bordered">
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
                            <td><?= $data_ba_pasca1['dpyds'] ?></td>
                            <td rowspan="3">Sesuai ketentuan yang berlaku, maka Pelelangan Terbatas dinyatakan:
                                <?php if ($data_ba_pasca1['ket_pembukaan'] == 'Sah') { ?>
                                    Sah
                                <?php  } else { ?>
                                    Gagal
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Dokumen Penawaran yang dinyatakan GUGUR</td>
                            <td><?= $data_ba_pasca1['dpydg'] ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Total</td>
                            <td><?= $data_ba_pasca1['dpyds'] + $data_ba_pasca1['dpydg']   ?></td>
                        </tr>
                    </tbody>
                </table>

                <p style="text-align:justify; font-size:15px">
                    Hasil Pembukaan dan Evaluasi Dokumen Penawaran File I ini merupakan satu kesatuan dan bagian yang tidak terpisahkan dari Berita Acara ini.

                    Demikian Berita Acara ini dibuat dengan sebenarnya, ditandatangani oleh Panitia Pengadaan dan wakil dari Peserta Penawaran.

                </p>

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