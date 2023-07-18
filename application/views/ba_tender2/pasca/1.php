<div class="container">
    <form action="javascript:;" method="POST" id="form_ba_pasca1">
        <?php $id_paket = $paket['id_paket'] ?>
        <button type="submit" onclick="simpan_ba_pasca1('<?= $id_paket ?>')" class="btn btn-success">Simpan</button>

        <a target="_blank" href="<?= base_url('panitiajmtm/beranda/hasil_ba_pasca_1/' . $paket['id_paket']) ?>" class="btn btn-primary">Lihat Hasil</a>

        <center>
            <h4 class="text-uppercase font-weight-bold" style="line-height: 1;">Berita Acara</h4>
            <h5 class="text-uppercase font-weight-bold" style="line-height: 1;">PEMBUKAAN DAN EVALUASI DOKUMEN PENAWARAN (FILE I)</h5>
            <h5 class="text-uppercase font-weight-bold" style="line-height: 1;"><?= $paket['nama_paket'] ?></h5>
            <h5 class="text-uppercase font-weight-bold" style="line-height: 1;">PT JASA MARGA TOLLROAD MAINTENANCE</h5>
        </center>
        <hr size="5">
        <center>
            <div style="font-size:15px">
                <label class="font-weight-bold">Nomor : <input type="text" name="nomor" class="form-control form-control-sm" value="<?= $data_ba_pasca1['nomor'] ?>"></label>
                <br>
                <label class="font-weight-bold">Tanggal : <input type="text" name="tanggal" class="form-control form-control-sm" value="<?= $data_ba_pasca1['tanggal'] ?>"></label>
            </div>
        </center>
        <div class="container">
            <p style="text-align:justify; font-size:15px">
                Pada Hari ini <b> <input type="text" name="hari_terbilang" value="<?= $data_ba_pasca1['hari_terbilang'] ?>"></b> , Tanggal <b> <input type="text" name="tgl_terbilang" value="<?= $data_ba_pasca1['tgl_terbilang'] ?>"></b>, Bulan <b> <input type="text" name="bulan_terbilang" value="<?= $data_ba_pasca1['bulan_terbilang'] ?>"> </b>, <b> Tahun <input type="text" name="tahun_terbilang" value="<?= $data_ba_pasca1['tahun_terbilang'] ?>">, <input type="date" name="tgl" value="<?= $data_ba_pasca1['tgl'] ?>"> </b> , <b>Panitia <?= $paket['nama_panitia'] ?> </b>yang dibentuk melalui Surat Keputusan Direksi PT Jasa Marga Tollroad Maintenance Nomor : 115/SK.DIR/JMTM/IX/2021 tanggal 24 september 2021 tentang Pembentukan Panitia Pengadaan Barang/Jasa Lingkup Kontrak Manajemen dengan Metode Pemilihan Tender/seleksi Umum dan Penunjukan langsung dan Surat Keputusan Procurement General Manager Procurement Nomor 01/SK.GM.PROCUREMENT/JMTM/VIII/2021 tanggal 20 Agustus 2021 tentang Pembentukan panitia Pengadaan barang/Jasa Metode Pemilihan Tender/Seleksi Terbatas berdasarkan SK Pengadaan barang dan jasa yang berlaku di lingkungan perusahaan, telah melaksanakan pembukaan dan evaluasi dokumen pengadaan file I sesuai dengan jadwal pengadaan yang telah ditentukan.
            </p>

            <p style="text-align:justify; font-size:15px">Jumlah Peserta Penawaran yang menyampaikan Dokumen Penawaran adalah <input type="text" name="jml_peserta" value="<?= $data_ba_pasca1['jml_peserta'] ?>"> Peserta Penawaran, dengan hasil sebagai berikut : </p>

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
                        <td><input type="text" name="ymdp" value="<?= $data_ba_pasca1['ymdp'] ?>"></td>
                        <td rowspan=" 3">Sesuai ketentuan yang berlaku, maka Pelelangan Terbatas dinyatakan:
                            <select name="ket_penyampaian" id="">
                                <?php if ($data_ba_pasca1['ket_penyampaian'] == 'Sah') { ?>
                                    <option value="Sah">Sah</option>
                                    <option value="Gagal">Gagal</option>
                                <?php  } else { ?>
                                    <option value="Gagal">Gagal</option>
                                    <option value="Sah">Sah</option>
                                <?php } ?>

                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Tidak Menyampaikan Dokumen Penawaran</td>
                        <td><input type="text" name="tmdp" value="<?= $data_ba_pasca1['tmdp'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Jumlah Total</td>
                        <td>Otomatis Terhitung</td>
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
                        <td><input type="text" name="dpyds" value="<?= $data_ba_pasca1['dpyds'] ?>"></td>
                        <td rowspan="3">Sesuai ketentuan yang berlaku, maka Pelelangan Terbatas dinyatakan:
                            <select name="ket_pembukaan" id="" value="<?= $data_ba_pasca1['ket_penawaran'] ?>">
                                <?php if ($data_ba_pasca1['ket_pembukaan'] == 'Sah') { ?>
                                    <option value="Sah">Sah</option>
                                    <option value="Gagal">Gagal</option>
                                <?php  } else { ?>
                                    <option value="Gagal">Gagal</option>
                                    <option value="Sah">Sah</option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Dokumen Penawaran yang dinyatakan GUGUR</td>
                        <td><input type="text" name="dpydg" value="<?= $data_ba_pasca1['dpydg'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Jumlah Total</td>
                        <td>Otomatis Terhitung</td>
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