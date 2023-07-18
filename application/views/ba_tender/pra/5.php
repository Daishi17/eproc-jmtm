<form action="javascript:;" method="POST" id="form_ba_pra5">
    <div class="container">
        <?php $id_paket = $paket['id_paket'] ?>
        <button type="button" onclick="simpan_ba_pra5('<?= $paket['id_paket'] ?>')" class="btn btn-success">Simpan</button>

        <a target="_blank" href="<?= base_url('panitiajmtm/beranda/hasil_ba_pra_5/' . $paket['id_paket']) ?>" class="btn btn-primary">Lihat Hasil</a>
        <center>
            <h4 class="text-uppercase font-weight-bold" style="line-height: 1;">Berita Acara</h4>
            <h5 class="text-uppercase font-weight-bold" style="line-height: 1;">SERAH TERIMA DOKUMEN HASIL PELAKSANAAN PENGADAAN </h5>
            <h5 class="text-uppercase font-weight-bold" style="line-height: 1;"><?= $paket['nama_panitia'] ?></h5>
            <h5 class="text-uppercase font-weight-bold" style="line-height: 1;">PT JASA MARGA TOLLROAD MAINTENANCE</h5>
        </center>

        <hr size="5">
        <center>
            <div style="font-size:15px">
                <label class="font-weight-bold">Nomor : <input type="text" name="nomor" class="form-control form-control-sm" value="<?= $data_ba_5['nomor'] ?>"></label>
                <br>
                <label class=" font-weight-bold">Tanggal : <input type="text" name="tanggal" class="form-control form-control-sm" value="<?= $data_ba_5['tanggal'] ?>"></label>
            </div>
        </center>
        <div class="container">
            <p style="text-align:justify; font-size:15px">
                Pada Hari ini <b> <input type="text" name="hari_terbilang" value="<?= $data_ba_5['hari_terbilang'] ?>"></b>, Tanggal <b> <input type="text" name="tgl_terbilang" value="<?= $data_ba_5['tgl_terbilang'] ?>"></b>, Bulan <b> <input type="text" name="bulan_terbilang" value="<?= $data_ba_5['bulan_terbilang'] ?>"> </b>, <b> Tahun <input type="text" name="tahun_terbilang" value="<?= $data_ba_5['tahun_terbilang'] ?>">,<input type="date" name="tgl" value="<?= $data_ba_5['tgl'] ?>"> </b>, <b>Panitia <?= $paket['nama_paket'] ?> </b> yang dibentuk melalui Surat Keputusan Direksi PT Jasa Marga Tollroad Maintenance Nomor : 34/SK.DIR/JMTM/III/2023 Tentang Perubahan atas Keputusan Direksi Nomor 79/SK.DIR/JMTM/VII/2022 Tentang Pembentukan Panitia Pengadaan Barang/Jasa Kontrak Manajemen, Non Kontrak Manajemen, Tim Evaluasi, Klarifikasi & Negosiasi Untuk Keperluan Project Construction, AMP & Heavy Equipment serta berdasarkan SK Pengadaan Barang dan Jasa yang berlaku di lingkungan perusahaan telah melaksanakan <b><?= $paket['nama_paket'] ?></b> , mulai dari penyusunan dokumen sampai dengan pengumuman pemenang.
            </p>

            <p style="text-align:justify; font-size:15px">
                Berdasarkan hal tersebut diatas, Tugas dan Tanggung Jawab Panitia dinyatakan telah selesai dan dapat diterima dengan baik, oleh karena itu Laporan hasil pertanggungjawaban Panitia diserahterimakan kembali kepada Pengguna Jasa
            </p>

            <p style="text-align:justify; font-size:15px">
                Demikian Berita Acara ini dibuat dengan sebenarnya, ditandatangani oleh Ketua Panitia Pengadaan.
            </p>

            <div style="float:right;text-align:justify">
                <center>
                    Panitia Pengadaan
                    <br>
                    <br>
                    <br>
                    <br>
                    <?php $id_paket = $paket['id_paket'];
                    $query_panitia = $this->db->query("SELECT * FROM tbl_paket LEFT JOIN tbl_panitia ON tbl_paket.id_panitia = tbl_panitia.id_panitia
                                                LEFT JOIN tbl_detail_panitia ON tbl_panitia.id_panitia = tbl_detail_panitia.id_panitia
                                                LEFT JOIN tbl_pegawai ON tbl_detail_panitia.id_pegawai2 = tbl_pegawai.id_pegawai
                                                LEFT JOIN tbl_role_panitia ON tbl_detail_panitia.id_role_panitia = tbl_role_panitia.id_role_panitia
                                                WHERE tbl_paket.id_paket = $id_paket AND tbl_role_panitia.id_role_panitia = 1")->row_array();

                    ?>

                    <b><u class="text-capitalize"><?= $query_panitia['nama_pegawai']; ?> </u></b>
                    <br>
                    <b>Ketua</b>
                </center>
            </div>
            <div style="margin-top:200px"></div>
            <input type="hidden" value="<?= $paket['id_paket'] ?>" id="id_paketkusaja">
            <input type="hidden" value="<?= $paket['id_paket'] ?>" id="id_paket">
            <br>
            <input type="hidden" value="<?= $paket['id_paket'] ?>" id="id_paket_tender">
            <input type="hidden" name="tanggal_buat_paket_tender" value="<?php echo date('d F Y || H:i:s') ?>">
            <div class="content">
                <div class="container-fluid">
                    <img class="pull-right" alt="LPSE" src="<?= base_url() ?>assets/img/jmtm2.png" width="15%" />
                    <img class="pull-left" alt="LPSE" src="<?= base_url() ?>assets/img/bumn.png" width="15%" style="float:right" />
                </div>
                <div class="content tab-content">
                    <table class="table table-bordered">
                        <h4 class="text-center">INFORMASI LELANG</h4>
                        <tr>
                            <th>Kode Tender</th>
                            <td><?= $angga['kode_tender'] ?></td>
                        </tr>
                        <tr>
                            <th>Nama Paket</th>
                            <td><?= $angga['nama_paket'] ?></td>
                        </tr>
                        <tr>
                            <th>Agency</th>
                            <td><?= $angga['nama_pegawai'] ?></td>
                        </tr>
                        <tr>
                            <th>Unit</th>
                            <td><?= $angga['nama_unit_kerja'] ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Pengadaan</th>
                            <td><?= $angga['nama_jenis_pengadaan'] ?></td>
                        </tr>
                        <tr>
                            <th>Metode Pemilihan</th>
                            <td><?= $angga['nama_metode_pemilihan'] ?></td>
                        </tr>
                        <tr>
                            <th>Nilai Pagu Paket</th>
                            <td><?= "Rp " . number_format($total_hps['hps'], 2, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <th>Nilai Hps Paket</th>
                            <td><?php if ($total_rincian_hps_pdf == null) { ?>
                                    <?php $total = 0;
                                    foreach ($total_rincian_hps as $key => $value) { ?>
                                        <?php
                                        $total +=  $value['vol_rincian_hps'] * $value['harga_rincian_hps'] + ($value['persen_rincian_hps'] / 100) * $value['vol_rincian_hps'] * $value['harga_rincian_hps'];
                                        ?>
                                    <?php } ?>
                                    <?= "Rp " . number_format($total, 2, ',', '.') ?>
                                <?php  } else { ?>
                                    <?= "Rp " . number_format($total_hps_pdf_ada['total_rincian_hps_pdf'], 2, ',', '.')  ?>
                                <?php } ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kontrak</th>
                            <td>
                                <?php foreach ($jenis_kontrak as $value) { ?>
                                    <table>
                                        <tr>
                                            <th>Cara Pembayaran</th>
                                            <td><?= $value['cara_pembayaran'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Pembebanan Tahun Anggaran</th>
                                            <td><?= $value['pembebanan_tahun_anggaran'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Sumber Pendanaan</th>
                                            <td><?= $value['sumber_pendanaan'] ?></td>
                                        </tr>
                                    </table>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Anggaran</th>
                            <td>
                                <?php foreach ($sumber_dana as $key => $value) { ?>
                                    <?= $value['tahun_anggaran'] ?> - BUMN - <?= $angga['nama_jenis_anggaran'] ?>
                                    <br>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Lokasi Pekerjaan</th>
                            <td>
                                <table>
                                    <tr>
                                        <th>Provinsi</th>
                                        <th>Kabupaten</th>
                                        <th>Detail Lokasi</th>
                                    </tr>
                                    <?php foreach ($lokasi_pekerjaan as $value) { ?>
                                        <tr>
                                            <td><?= $value['nama_provinsi'] ?></td>
                                            <td><?= $value['nama_kabupaten'] ?></td>
                                            <td><?= $value['detail_lokasi'] ?></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <th>Kualifikasi Usaha</th>
                            <td><?= $angga['kualifikasi_usaha'] ?></td>
                        </tr>
                        <tr>
                            <th>Bobot Teknis</th>
                            <td><?= $angga['bobot_teknis'] ?></td>
                        </tr>
                        <tr>
                            <th>Bobot Biaya</th>
                            <td><?= $angga['bobot_biaya'] ?></td>
                        </tr>
                        <tr>

                        </tr>
                        <tr>
                            <th>Tanggal Pembuatan</th>
                            <td><?= $angga['tanggal_buat_rup'] ?> Oleh <?= $angga['nama_pegawai'] ?></td>
                        </tr>

                        <tr>
                            <th>Alasan Pembatalan</th>
                            <td><?= $angga['alasan_revisi_paket_atau_batalkan_paket'] ?></td>
                        </tr>
                    </table>
                    <br>
                    <h4 class="text-center">DOKUMEN LELANG</h4>
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Dokumen</th>
                            <th>Tanggal Upload</th>
                            <th>Pengirim</th>
                        </tr>
                        <?php foreach ($get_pdf_dokumen_kualifikasi_lelang as $key => $value) { ?>
                            <tr>
                                <td><?= $value['file_dokumen_lelang'] ?></td>
                                <td><?= $value['create_file_lelang'] ?></td>
                                <td>Panitia</td>
                            </tr>
                        <?php } ?>
                    </table>
                    <br>
                    <br>
                    <h4 class="text-center">JADWAL LELANG</h4>
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Tahap</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Diubah Oleh</th>
                            <th>Alasan Perubahan</th>
                        </tr>
                        <?php $i = 1;
                        foreach ($jadwal_tahap1 as $jadwal) { ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td>
                                    <?php if (date('Y-m-d H:i', strtotime($jadwal['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>
                                        <b class="text-secondary"> <?= $jadwal['nama_jadwal_tender'] ?></b>
                                    <?php    } else if (date('Y-m-d H:i', strtotime($jadwal['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
                                        <b class="text-danger"> <?= $jadwal['nama_jadwal_tender'] ?> <small class="badge badge-danger">Tahap Sedang Berlangsung</small></b>
                                    <?php    } else { ?>

                                        <b class="text-success"> <?= $jadwal['nama_jadwal_tender'] ?> <small class="badge badge-success">Tahap Sudah Selesai <i class="fa fa-check"></i> </small></b>
                                    <?php    } ?>
                                </td>
                                <td><?php if ($jadwal['tanggal_mulai_jadwal'] >= date('d-m-Y H:i')) { ?>
                                        <b><?= date('d F Y H:i', strtotime($jadwal['tanggal_mulai_jadwal']))  ?> </b>
                                    <?php    } else if ($jadwal['tanggal_selesai_jadwal']  >= date('d-m-Y H:i')) { ?>
                                        <b><?= date('d F Y H:i', strtotime($jadwal['tanggal_mulai_jadwal']))  ?> </b>
                                    <?php    } else { ?>

                                        <b><?= date('d F Y H:i', strtotime($jadwal['tanggal_mulai_jadwal']))  ?> </b>
                                    <?php    } ?>
                                </td>
                                <td>
                                    <?php if ($jadwal['tanggal_mulai_jadwal']  >= date('d-m-Y H:i')) { ?>
                                        <b><?= date('d F Y H:i', strtotime($jadwal['tanggal_selesai_jadwal'])) ?></b>
                                    <?php    } else if ($jadwal['tanggal_selesai_jadwal'] >= date('d-m-Y H:i')) { ?>
                                        <b><?= date('d F Y H:i', strtotime($jadwal['tanggal_selesai_jadwal'])) ?></b>
                                    <?php    } else { ?>
                                        <b><?= date('d F Y H:i', strtotime($jadwal['tanggal_selesai_jadwal'])) ?></b>
                                    <?php    } ?>
                                </td>
                                <td>
                                    <?php if ($jadwal['tanggal_mulai_jadwal']  >= date('d-m-Y H:i')) { ?>
                                        <b><?= $jadwal['user_created'] ?></b>
                                    <?php    } else if ($jadwal['tanggal_selesai_jadwal'] >= date('d-m-Y H:i')) { ?>
                                        <b><?= $jadwal['user_created'] ?></b>
                                    <?php    } else { ?>
                                        <b><?= $jadwal['user_created'] ?></b>
                                    <?php    } ?>
                                </td>
                                <td>
                                    <?php if ($jadwal['tanggal_mulai_jadwal']  >= date('d-m-Y H:i')) { ?>
                                        <b><?= $jadwal['alasan_perubahan'] ?></b>
                                    <?php    } else if ($jadwal['tanggal_selesai_jadwal'] >= date('d-m-Y H:i')) { ?>
                                        <b><?= $jadwal['alasan_perubahan'] ?></b>
                                    <?php    } else { ?>
                                        <b><?= $jadwal['alasan_perubahan'] ?></b>
                                    <?php    } ?>
                                </td>
                            <?php } ?>
                    </table>
                    <br>
                    <h4 class="text-center">PESERTA LELANG</h4>
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Peserta</th>
                            <th>Tanggal Daftar</th>
                        </tr>
                        <?php foreach ($peserta_tender as $key => $value) { ?>
                            <tr>
                                <td><?= $value['username_vendor'] ?></td>
                                <td><?= $value['tanggal_mendaftar_mengikuti_vendor'] ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                    <h4 class="text-center">KEPANITIAAN</h4>
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Kepanitiaan</th>
                            <th><?= $row_panitia['nama_panitia'] ?></th>
                        </tr>
                        <tr>
                            <th>No. SK</th>
                            <td><?= $row_panitia['no_sk'] ?></td>
                        </tr>
                    </table>
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Jabatan</th>
                        </tr>

                        <?php foreach ($ambil_panitia as $key => $value) { ?>
                            <tr>
                                <td><?= $value['nama_pegawai'] ?></td>
                                <td><?= $value['nip'] ?></td>
                                <td><?= $value['nama_role_panitia'] ?></td>
                            </tr>
                        <?php  } ?>
                    </table>

                    <h4 class="text-center">HASIL EVALUASI</h4>
                    <table class="table table-bordered">
                        <tr style="font-size: 11px;">
                            <th>Nama Peserta</th>
                            <th>
                                <span>Dokumen Kelengkapan</span>
                            </th>
                            <th>Syarat Dokumen Tambahan</th>
                            <?php if ($paket['id_kualifikasi'] == 12 || $paket['id_kualifikasi'] == 9 || $paket['id_kualifikasi'] == 14 || $paket['id_kualifikasi'] == 18 || $paket['id_kualifikasi'] == 20  || $paket['id_kualifikasi'] == 21) { ?>
                            <?php } else { ?>
                                <th>
                                    <span>Hasil Prakualifikasi</span>
                                </th>
                            <?php } ?>

                            <th>
                                <span>Hasil Teknis</span>
                            </th>
                            <th><span>Peringkat</span></th>

                            <!-- <th>Verifikasi</span></th> -->
                        </tr>
                        <?php $i = 1;
                        foreach ($evaluasi as $key => $value) { ?>
                            <tr>
                                <td><?= $value['username_vendor'] ?></td>
                                <td>
                                    <div class="text-success"><i class="fa fa-check"></i> Dokumen Lengkap</div>
                                </td>
                                <td>
                                    <?php if ($value['status_evaluasi_syarat_tambahan'] == 0) { ?>
                                        <div class="text-danger"><i class="fa fa-ban"></i> Gugur</div>
                                    <?php } else { ?>
                                        <div class="text-success"><i class="fa fa-check"></i> Dokumen Lengkap</div>
                                    <?php } ?>
                                </td>
                                <?php if ($paket['id_kualifikasi'] == 12 || $paket['id_kualifikasi'] == 9 || $paket['id_kualifikasi'] == 14 || $paket['id_kualifikasi'] == 18 || $paket['id_kualifikasi'] == 20  || $paket['id_kualifikasi'] == 21) { ?>
                                <?php } else { ?>
                                    <td>
                                        <?php if ($value['nilai_prakualifikasi'] == null) { ?>
                                            <div class="text-danger"><i class="fa fa-ban"></i> Gugur</div>
                                        <?php } else if ($value['nilai_prakualifikasi'] == 0) { ?>
                                            <div class="text-danger"><i class="fa fa-ban"></i> Gugur</div>
                                        <?php } else { ?>
                                            <?= $value['nilai_prakualifikasi'] ?>
                                        <?php } ?>
                                    </td>
                                <?php } ?>

                                <td>
                                    <?php if ($value['nilai_teknis'] == null) { ?>
                                        <?php if ($value['status_evaluasi_syarat_tambahan'] == null) { ?>
                                            <div class="text-danger"><i class="fa fa-ban"></i> Gugur</div>
                                        <?php } else if ($value['status_evaluasi_syarat_tambahan'] == 0) { ?>
                                            <div class="text-danger"><i class="fa fa-ban"></i> Gugur</div>
                                        <?php } ?>
                                    <?php } else if ($value['nilai_teknis'] == 0) { ?>
                                        <div class="text-danger"><i class="fa fa-ban"></i> Gugur</div>
                                    <?php } else { ?>
                                        <?= $value['nilai_teknis'] ?>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($value['nilai_pringkat_teknis'] == null) { ?>
                                        <div class="text-danger"><i class="fa fa-ban"></i> Gugur</div>
                                    <?php } else if ($value['nilai_pringkat_teknis'] == 0) { ?>
                                        <div class="text-danger"><i class="fa fa-ban"></i> Gugur</div>
                                    <?php } else { ?>
                                        <?= $value['nilai_pringkat_teknis'] ?>
                                    <?php } ?>
                                </td>


                            </tr>
                        <?php  } ?>
                    </table>
                    <table class="table table-bordered">
                        <tr style="font-size: 11px;">
                            <th>Nama Peserta</th>
                            <th>Penawaran</th>
                            <th>Penawaran Terkoreksi</th>
                            <th>Negosiasi Harga</th>
                            <th>Nilai Akhir</th>
                            <th><span>Pemenang</span></th>
                            <!-- <th>Verifikasi</span></th> -->
                        </tr>

                        <?php $i = 1;
                        foreach ($evaluasi as $key => $value) { ?>
                            <tr>
                                <td><?= $value['username_vendor'] ?></td>

                                <td>
                                    <?php if ($value['nilai_penawaran'] == NULL) { ?>
                                        <div class="text-danger"><i class="fa fa-ban"></i> Gugur</div>
                                    <?php } else if ($value['nilai_penawaran'] == 0) { ?>
                                        <div class="text-danger"><i class="fa fa-ban"></i> Gugur</div>
                                    <?php } else { ?>
                                        Rp. <?= number_format($value['nilai_penawaran'], 2, ',', '.') ?>
                                </td>
                            <?php }    ?>
                            <td>
                                <?php if ($value['nilai_terkoreksi'] == NULL) { ?>
                                    <div class="text-danger"><i class="fa fa-ban"></i> Gugur</div>
                                <?php } else if ($value['nilai_terkoreksi'] == 0) { ?>
                                    <div class="text-danger"><i class="fa fa-ban"></i> Gugur</div>
                                <?php } else { ?>
                                    Rp. <?= number_format($value['nilai_terkoreksi'], 2, ',', '.') ?>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($value['negosiasi'] == NULL) { ?>
                                    <div class="text-danger"><i class="fa fa-ban"></i> Belum di Negosiasi</div>
                                <?php } else if ($value['negosiasi'] == 0) { ?>
                                    <div class="text-danger"><i class="fa fa-ban"></i> Belum di Negosiasi</div>
                                <?php } else { ?>
                                    Rp. <?= number_format($value['negosiasi'], 2, ',', '.') ?>
                                <?php } ?>
                            </td>

                            <td>
                                <?php if ($value['nilai_akhir'] == null) { ?>
                                    <?php if ($value['status_evaluasi_syarat_tambahan'] == null) { ?>
                                        <div class="text-danger"><i class="fa fa-ban"></i> Gugur</div>
                                    <?php } else if ($value['status_evaluasi_syarat_tambahan'] == 0) { ?>
                                        <div class="text-danger"><i class="fa fa-ban"></i> Gugur</div>
                                    <?php } else { ?>
                                        <?php if ($value['nilai_teknis'] == null) { ?>
                                            <div class="text-danger"> Belum Dievaluasi</div>
                                        <?php } else { ?>
                                            <div class="text-danger"><i class="fa fa-ban"></i> Gugur</div>
                                        <?php } ?>

                                    <?php } ?>
                                <?php } else { ?>
                                    <?= $value['nilai_akhir']  ?>
                                <?php } ?>

                            </td>
                            <td>
                                <?php if ($value['pemenang_tender'] == 1) { ?>
                                    <div class="text-warning"><i class="fa fa-star"></i> </div>
                                <?php } else { ?>

                                <?php } ?>
                            </td>

                            </tr>
                        <?php  } ?>
                    </table>

                    <h4 class="text-center">SANGGAHAN</h4>
                    <table class="table table-bordered">
                        <tr>
                            <th>SANGGAHAN</th>
                            <th>PENGIRIM</th>
                        </tr>
                        <?php foreach ($sanggahan as $key => $value) { ?>
                            <tr>
                                <td><?= $value['nama_dokumen_sanggahan'] ?></td>
                                <td><?= $value['username_vendor'] ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                    <!-- INI UNTUK PENJELASAN LELANG -->
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    PENJELASAN LELANG
                                </div>
                                <div class="card-body" id="letakpesan">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    NEGOSIASI
                                </div>
                                <div class="card-body" id="letakpesan2">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
</form>