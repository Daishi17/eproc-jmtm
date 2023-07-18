<div class="container">

    <form action="javascript:;" method="POST" id="form_ba_pra1">
        <?php $id_paket = $paket['id_paket'] ?>
        <button type="button" onclick="simpan_ba_pra1('<?= $id_paket ?>')" class="btn btn-success">Simpan</button>

        <a target="_blank" href="<?= base_url('panitiajmtm/beranda/hasil_ba_pra_1/' . $paket['id_paket']) ?>" class="btn btn-primary">Lihat Hasil</a>
        <center>
            <h4 class="text-uppercase font-weight-bold" style="line-height: 1;">Berita Acara</h4>
            <h5 class="text-uppercase font-weight-bold" style="line-height: 1;">Evaluasi Prakualifikasi</h5>
            <h5 class="text-uppercase font-weight-bold" style="line-height: 1;"><?= $paket['nama_paket'] ?></h5>
            <h5 class="text-uppercase font-weight-bold" style="line-height: 1;">PT JASA MARGA TOLLROAD MAINTENANCE</h5>
        </center>

        <hr size="5">
        <center>
            <div style="font-size:15px">
                <label class="font-weight-bold">Nomor : <input value="<?= $data_ba_1['nomor'] ?>" type="text" name="nomor" class="form-control form-control-sm"></label>
                <br>
                <label class="font-weight-bold">Tanggal : <input value="<?= $data_ba_1['tanggal'] ?>" type="text" name="tanggal" class="form-control form-control-sm"></label>
            </div>
        </center>
        <div class="container">
            <p style="text-align:justify; font-size:15px">
                Pada Hari ini <b><input type="text" name="hari_terbilang" value="<?= $data_ba_1['hari_terbilang'] ?>"></b> ,
                Tanggal <b><input type="text" name="tgl_terbilang" value="<?= $data_ba_1['tgl_terbilang'] ?>"></b> ,
                Bulan <b> <input type="text" name="bulan_terbilang" value="<?= $data_ba_1['bulan_terbilang'] ?>"></b> ,
                <b> Tahun <input type="text" name="tahun_terbilang" value="<?= $data_ba_1['tahun_terbilang'] ?>"> , <input type="date" name="tgl" value="<?= $data_ba_1['tgl'] ?>"> </b> ,
                <b>Panitia <?= $paket['nama_panitia'] ?> </b> yang dibentuk melalui Surat Keputusan Direksi PT Jasa Marga Tollroad Maintenance Nomor :79/SK.DIR/JMTM/VII/2022 TENTANG PEMBENTUKAN PANITIA PENGADAAN BARANG/JASA KONTRAK MANAJEMEN, NON KONTRAK MANAJEMEN, TIM EVALUASI, KLARIFIKASI & NEGOSIASI UNTUK KEPERLUAN PROJECTT CONSTRUCTION, AMP & HEAVY EQUIPMENT berdasarkan SK Pengadaan barang dan jasa yang berlaku di lingkungan perusahaan, telah melaksanakan evaluasi Prakualifikasi dokumen pengadaan sesuai dengan jadwal pengadaan yang telah ditentukan dengan hasil sebagai berikut:
            </p>
            <ol type="a">
                <li>Jumlah Peserta yang melakukan menyampaikan dokumen pengadaan adalah :</li>
                <b> <input type="text" name="jml_peserta" value="<?= $data_ba_1['jml_peserta'] ?>"> Peserta</b>
                <p>Evaluasi Kualifikasi dilakukan terhadap ... Peserta yang mengupload Formulir Isian Kualifikasi sebagaimana dimaksud sesuai dengan kelengkapan persyaratan yang harus dilengkapai dalam daftar penyampaian Formulir Isian Kualifikasi terlampir. </p>

                <li>
                    Setelah dilakukan Evaluasi Kualifikasi dimaksud didapatkan hasil sebagaimana berikut:
                    <ul>
                        <li><b><input type="text" name="jml_peserta_lulus" value="<?= $data_ba_1['jml_peserta_lulus'] ?>"> </b> Peserta <b>Lulus </b> dalam Evaluasi Kualifikasi. </li>
                        <li><b> <input type="text" name="jml_peserta_tdk_lulus" value="<?= $data_ba_1['jml_peserta_tdk_lulus'] ?>"></b> Peserta tidak Lulus dalam Evaluasi Kualifikasi</li>
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
                            <li>Jumlah Kas dan Bank (KB) dengan Bobot Penilaian adalah <b> <input type="text" name="kb" value="<?= $data_ba_1['kb'] ?>"> ;</b></li>
                            <li>Sisa Kemampuan Keuangan (SKK) dengan Bobot Penilaian adalah <b><input type="text" name="skk" value="<?= $data_ba_1['skk'] ?>"> ;</b> </li>
                            <li><i>Debt Equity Ratio </i> (DER) dengan Bobot Penilaian adalah <b> <input type="text" name="der" value="<?= $data_ba_1['der'] ?>"> .</b></li>
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
                        <li>Kemampuan Dasar (KD) dengan Bobot Penilaian adalah <b><input type="text" name="kd" value="<?= $data_ba_1['kd'] ?>"> ;</b></li>
                        <li>Nilai Paket Pekerjaan Tertinggi (NPT) dengan Bobot Penilaian adalah <b><input type="text" name="npt" value="<?= $data_ba_1['npt'] ?>">.</b></li>
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

                <table class="table table-bordered">
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
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="table_vendor">

                    </tbody>
                </table>

                <p>
                    Hasil Evaluasi Kualifikasi dimaksud sebagaimana terlampir menjadi satu kesatuan dan merupakan bagian tidak terpisahkan dari Berita Acara ini.
                </p>

                <p>
                    Demikian Berita Acara ini dibuat dengan sebenarnya dan ditandatangani oleh Panitia Pengadaan
                </p>

                <b class="text-uppercase">panitia pengadaan : </b>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Nama</th>
                            <th style="text-align: center;">Kedudukan dalam Tim</th>
                            <th style="text-align: center;">Tanda Tangan</th>
                        </tr>
                    </thead>
                    <tbody id="table_panitia">
                        <!-- 
                    <a href="" class="btn btn-sm btn-success">Setuju</a>
                                        /
                                        <a href="" class="btn btn-sm btn-danger">Tidak Setuju</a> -->
                    </tbody>
                </table>
            </ol>
        </div>
    </form>
</div>



<!-- Modal -->
<div class="modal fade" id="edit_nilai_pra1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Evaluasi <label id="nm_vendor"></label></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:;" id="save_ba1_vendor_form">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id_mengikuti_paket" id="id_mengikuti_paket">
                        <div class="col-md-12">
                            <label for="">Evaluasi Administrasi</label>
                            <select name="ev_admin_pra1" id="" class="form-control form-control-sm">
                                <option value="1">Lulus</option>
                                <option value="2">Gugur</option>
                            </select>

                            <label for="">Evaluasi Keuangan</label>
                            <select name="ev_keuangan_pra1" id="" class="form-control form-control-sm">
                                <option value="1">Lulus</option>
                                <option value="2">Gugur</option>
                            </select>

                            <label for="">Evaluasi Teknis</label>
                            <select name="ev_teknis_pra1" id="" class="form-control form-control-sm">
                                <option value="1">Lulus</option>
                                <option value="2">Gugur</option>
                            </select>

                            <label for="">Keterangan</label>
                            <select name="ket_pra1" id="" class="form-control form-control-sm">
                                <option value="1">Lulus</option>
                                <option value="2">Gugur</option>
                            </select>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" onclick="save_ba1_vendor()" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>