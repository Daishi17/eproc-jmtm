<div class="container">
    <form action="javascript:;" method="POST" id="form_ba_pra4">
        <?php $id_paket = $paket['id_paket'] ?>
        <button type="button" onclick="simpan_ba_pra4('<?= $paket['id_paket'] ?>')" class="btn btn-success">Simpan</button>

        <a target="_blank" href="<?= base_url('panitiajmtm/beranda/hasil_ba_pra_4/' . $paket['id_paket']) ?>" class="btn btn-primary">Lihat Hasil</a>
        <center>
            <h4 class=" text-uppercase font-weight-bold" style="line-height: 1;">Berita Acara</h4>
            <h5 class="text-uppercase font-weight-bold" style="line-height: 1;">KOREKSI ARITMATIK HARGA TIMPANG DAN NEGOSIASI</h5>
            <h5 class="text-uppercase font-weight-bold" style="line-height: 1;"><?= $paket['nama_paket'] ?></h5>
            <h5 class="text-uppercase font-weight-bold" style="line-height: 1;">PT JASA MARGA TOLLROAD MAINTENANCE</h5>
        </center>

        <hr size="5">
        <center>
            <div style="font-size:15px">
                <label class="font-weight-bold">Nomor : <input type="text" name="nomor" class="form-control form-control-sm" value="<?= $data_ba_4['nomor'] ?>"></label>
                <br>
                <label class=" font-weight-bold">Tanggal : <input type="text" name="tanggal" class="form-control form-control-sm" value="<?= $data_ba_4['tanggal'] ?>"></label>
            </div>
        </center>
        <div class="container">
            <p style="text-align:justify; font-size:15px">
                Pada Hari ini <b> <input type="text" name="hari_terbilang" value="<?= $data_ba_4['hari_terbilang'] ?>"></b>, Tanggal <b> <input type="text" name="tgl_terbilang" value="<?= $data_ba_4['tgl_terbilang'] ?>"></b>, Bulan <b> <input type="text" name="bulan_terbilang" value="<?= $data_ba_4['bulan_terbilang'] ?>"> </b>, <b> Tahun <input type="text" name="tahun_terbilang" value="<?= $data_ba_4['tahun_terbilang'] ?>">,<input type="date" name="tgl" value="<?= $data_ba_4['tgl'] ?>"> </b> , <b>Panitia <?= $paket['nama_panitia'] ?> </b> yang dibentuk melalui Surat Keputusan Direksi PT Jasa Marga Tollroad Maintenance Nomor : 115/SK.DIR/JMTM/IX/2021 tanggal 24 september 2021 tentang Pembentukan Panitia Pengadaan Barang/Jasa Lingkup Kontrak Manajemen dengan Metode Pemilihan Tender/seleksi Umum dan Penunjukan langsung dan Surat Keputusan Procurement General Manager Procurement Nomor: 01/SK.GM.PROCUREMENT/JMTM/VIII/2021 tanggal 20 Agustus 2021 tentang Pembentukan panitia Pengadaan barang/Jasa Metode Pemilihan Tender/Seleksi Terbatas berdasarkan SK Pengadaan barang dan jasa yang berlaku di lingkungan perusahaan, telah melaksanakan koreksi aritmatika, harga timpang dan negosiasi pada peserta peringkat 1 (pertama) pengadaan sesuai dengan jadwal pengadaan yang telah ditentukan dengan hasil sebagai berikut:
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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="table_vendor4">

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


<div class="modal fade" id="edit_nilai_pra4" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Evaluasi <label id="nm_vendor4"></label></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:;" id="save_ba4_vendor_form_pra">
                <input type="hidden" name="id_mengikuti_paket4" id="id_mengikuti_paket4">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id_mengikuti_paket" id="id_mengikuti_paket4">
                        <div class="col-md-12">
                            <label for="">HPS</label>
                            <input type="text" name="hps_pra4" class="form-control form-control-sm">

                            <label for="">Nilai harga Penawaran (NHP)</label>
                            <input type="text" name="nhp_pra4" class="form-control form-control-sm">

                            <label for="">Peringkat Sementara</label>
                            <input type="text" name="peringkat_pra4" class="form-control form-control-sm">


                            <label for="">Keterangan</label>
                            <select name="ket_pra4" id="" class="form-control form-control-sm">
                                <option value="Lulus">Lulus</option>
                                <option value="Gugur">Gugur</option>
                            </select>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" onclick="save_ba4_vendor_pra()" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>