<div class="container">
    <form action="javascript:;" method="POST" id="form_ba_pasca2">
        <?php $id_paket = $paket['id_paket'] ?>
        <button type="submit" onclick="simpan_ba_pasca2('<?= $id_paket ?>')" class="btn btn-success">Simpan</button>

        <a target="_blank" href="<?= base_url('panitiajmtm/beranda/hasil_ba_pasca_2/' . $paket['id_paket']) ?>" class="btn btn-primary">Lihat Hasil</a>

        <center>
            <h4 class="text-uppercase font-weight-bold" style="line-height: 1;">Berita Acara</h4>
            <h5 class="text-uppercase font-weight-bold" style="line-height: 1;">PEMBUKAAN DAN EVALUASI DOKUMEN PENAWARAN (FILE I)</h5>
            <h5 class="text-uppercase font-weight-bold" style="line-height: 1;"><?= $paket['nama_paket'] ?></h5>
            <h5 class="text-uppercase font-weight-bold" style="line-height: 1;">PT JASA MARGA TOLLROAD MAINTENANCE</h5>
        </center>
        <hr size="5">
        <center>
            <div style="font-size:15px">
                <label class="font-weight-bold">Nomor : <input type="text" name="nomor" class="form-control form-control-sm" value="<?= $data_ba_pasca2['nomor'] ?>"></label>
                <br>
                <label class="font-weight-bold">Tanggal : <input type="text" name="tanggal" class="form-control form-control-sm" value="<?= $data_ba_pasca2['tanggal'] ?>"></label>
            </div>
        </center>
        <div class="container">
            <p style="text-align:justify; font-size:15px">
                Pada Hari ini <b> <input type="text" name="hari_terbilang" value="<?= $data_ba_pasca2['hari_terbilang'] ?>"></b> , Tanggal <b> <input type="text" name="tgl_terbilang" value="<?= $data_ba_pasca2['tgl_terbilang'] ?>"></b>, Bulan <b> <input type="text" name="bulan_terbilang" value="<?= $data_ba_pasca2['bulan_terbilang'] ?>"> </b>, <b> Tahun <input type="text" name="tahun_terbilang" value="<?= $data_ba_pasca2['tahun_terbilang'] ?>">, <input type="date" name="tgl" value="<?= $data_ba_pasca2['tgl'] ?>"> </b> , <b>Panitia <?= $paket['nama_panitia'] ?> </b> yang dibentuk melalui Surat Keputusan Direksi PT Jasa Marga Tollroad Maintenance Nomor : 115/SK.DIR/JMTM/IX/2021 tanggal 24 september 2021 tentang Pembentukan Panitia Pengadaan Barang/Jasa Lingkup Kontrak Manajemen dengan Metode Pemilihan Tender/seleksi Umum dan Penunjukan langsung dan Surat Keputusan Procurement General Manager Procurement Nomor 01/SK.GM.PROCUREMENT/JMTM/VIII/2021 tanggal 20 Agustus 2021 tentang Pembentukan panitia Pengadaan barang/Jasa Metode Pemilihan Tender/Seleksi Terbatas berdasarkan SK Pengadaan barang dan jasa yang berlaku di lingkungan perusahaan, telah melaksanakan evaluasi kualifikasi dan peringkat teknis dokumen pengadaan pada sesuai dengan jadwal pengadaan yang telah ditentukan dengan hasil sebagai berikut:
            </p>

            <ol type="a" style="text-align:justify; font-size:15px">
                <li>Jumlah Peserta yang melakukan menyampaikan dokumen pengadaan adalah :</li>
                <br>
                <input type="text" name="jml_peserta" value="<?= $data_ba_pasca2['jml_peserta'] ?>">
                <br>
                <p style=" text-align:justify; font-size:15px">Evaluasi Kualifikasi dilakukan terhadap (input dari jumlah peserta) Peserta yang mengupload Formulir Isian Kualifikasi sebagaimana dimaksud sesuai dengan kelengkapan persyaratan yang harus dilengkapai dalam daftar penyampaian Formulir Isian Kualifikasi terlampir. </p>

                <li>Setelah dilakukan Evaluasi Kualifikasi dimaksud didapatkan hasil sebagaimana berikut:</li>
                <ul>
                    <li><input type="text" name="jml_lulus" value="<?= $data_ba_pasca2['jml_lulus'] ?>">Peserta <b>Lulus</b> dalam Evaluasi Kualifikasi.</li>
                    <li><input type="text" name="jml_tdk_lulus" value="<?= $data_ba_pasca2['jml_tdk_lulus'] ?>">Peserta <b>Tidak Lulus</b> dalam Evaluasi Kualifikasi.</li>
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
                <li>Ambang batas nilai minimal untuk Evaluasi Kemampuan Teknis adalah <input type="text" name="kemampuan_teknis" value="<?= $data_ba_pasca2['kemampuan_teknis'] ?>">;</li>
                <li>Peserta dinyatakan LULUS Evaluasi Kemampuan Teknis jika nilai Evaluasi Kemampuan Teknis lebih dari atau sama dengan ambang batas nilai yang telah ditetapkan, dan dinyatakan GUGUR jika nilai Evaluasi Kemampuan Teknis kurang dari ambang batas nilai yang telah ditetapkan. Bagi Peserta yang GUGUR tidak dilakukan tahap Penilaian Kualifikasi selanjutnya;</li>
                <li>Unsur yang dinilai pada Evaluasi Kemampuan Teknis adalah : <a href="javascript:;" class="btn btn-success btn-sm" onclick="add_unsur('<?= $id_paket ?>')">Tambah Unsur +</a></li>
                <div id="tampil_unsur">

                </div>
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
                        <th rowspan="2" style="text-align: center;">Aksi</th>
                    </tr>
                    <tr>
                        <th style="text-align: center;">Administrasi</th>
                        <th style="text-align: center;">Keuangan</th>
                        <th style="text-align: center;">Teknis</th>
                    </tr>
                </thead>
                <tbody id="table_vendor2">



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

<!-- Modal -->
<div class="modal fade" id="modal_unsur" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Unsur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:;" id="form_unsur">
                <input type="hidden" name="id_paket_unsur">
                <div class="modal-body">
                    <div class="container-fluid">
                        <input type="text" name="nama_unsur" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" onclick="simpan_unsur()" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_unsur2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Unsur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:;" id="form_unsur2">
                <input type="hidden" name="id_paket_unsur2">
                <input type="hidden" name="id_ba_unsur_pasca2">
                <div class="modal-body">
                    <div class="container-fluid">
                        <input type="text" name="nama_unsur2" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" onclick="simpan_unsur2()" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_nilai_pasca2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Evaluasi <label id="nm_vendor_pasca2"></label></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:;" id="save_ba2_vendor_form_pasca">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id_mengikuti_paket" id="paket_pasca2">
                        <div class="col-md-12">
                            <label for="">Evaluasi Administrasi</label>
                            <select name="ev_admin_pasca2" id="" class="form-control form-control-sm">
                                <option value="1">Lulus</option>
                                <option value="2">Gugur</option>
                            </select>

                            <label for="">Evaluasi Keuangan</label>
                            <select name="ev_keuangan_pasca2" id="" class="form-control form-control-sm">
                                <option value="1">Lulus</option>
                                <option value="2">Gugur</option>
                            </select>

                            <label for="">Evaluasi Teknis</label>
                            <select name="ev_teknis_pasca2" id="" class="form-control form-control-sm">
                                <option value="1">Lulus</option>
                                <option value="2">Gugur</option>
                            </select>

                            <label for="">Keterangan</label>
                            <select name="ket_pasca2" id="" class="form-control form-control-sm">
                                <option value="1">Lulus</option>
                                <option value="2">Gugur</option>
                            </select>

                            <label for="">Peringkat</label>
                            <input type="text" name="peringkat_pasca2" class="form-control form-control-sm">
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" onclick="save_ba2_vendor_pasca()" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>