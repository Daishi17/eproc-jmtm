<div class="container">
    <form action="javascript:;" method="POST" id="form_ba_pasca3">
        <?php $id_paket = $paket['id_paket'] ?>
        <button type="submit" onclick="simpan_ba_pasca3('<?= $id_paket ?>')" class="btn btn-success">Simpan</button>

        <a target="_blank" href="<?= base_url('panitiajmtm/beranda/hasil_ba_pasca_3/' . $paket['id_paket']) ?>" class="btn btn-primary">Lihat Hasil</a>

        <center>
            <h4 class="text-uppercase font-weight-bold" style="line-height: 1;">Berita Acara</h4>
            <h5 class="text-uppercase font-weight-bold" style="line-height: 1;">PEMBUKAAN DAN EVALUASI DOKUMEN PENAWARAN (FILE II)</h5>
            <h5 class="text-uppercase font-weight-bold" style="line-height: 1;"><?= $paket['nama_paket'] ?></h5>
            <h5 class="text-uppercase font-weight-bold" style="line-height: 1;">PT JASA MARGA TOLLROAD MAINTENANCE</h5>
        </center>

        <hr size="5">
        <center>
            <div style="font-size:15px">
                <label class="font-weight-bold">Nomor : <input type="text" name="nomor" class="form-control form-control-sm" value="<?= $data_ba_pasca3['nomor'] ?>"></label>
                <br>
                <label class="font-weight-bold">Tanggal : <input type="text" name="tanggal" class="form-control form-control-sm" value="<?= $data_ba_pasca3['tanggal'] ?>"></label>
            </div>
        </center>

        <div class="container">
            <p style="text-align:justify; font-size:15px">
                Pada Hari ini <b> <input type="text" name="hari_terbilang" value="<?= $data_ba_pasca3['hari_terbilang'] ?>"></b> , Tanggal <b> <input type="text" name="tgl_terbilang" value="<?= $data_ba_pasca3['tgl_terbilang'] ?>"></b>, Bulan <b> <input type="text" name="bulan_terbilang" value="<?= $data_ba_pasca3['bulan_terbilang'] ?>"> </b>, <b> Tahun <input type="text" name="tahun_terbilang" value="<?= $data_ba_pasca3['tahun_terbilang'] ?>">, <input type="date" name="tgl" value="<?= $data_ba_pasca3['tgl'] ?>"> </b> , <b>Panitia <?= $paket['nama_panitia'] ?> </b>yang dibentuk melalui Surat Keputusan Direksi PT Jasa Marga Tollroad Maintenance Nomor : 34/SK.DIR/JMTM/III/2023 Tentang Perubahan atas Keputusan Direksi Nomor 79/SK.DIR/JMTM/VII/2022 Tentang Pembentukan Panitia Pengadaan Barang/Jasa Kontrak Manajemen, Non Kontrak Manajemen, Tim Evaluasi, Klarifikasi & Negosiasi Untuk Keperluan Project Construction, AMP & Heavy Equipment serta berdasarkan SK Pengadaan Barang dan Jasa yang berlaku di lingkungan perusahaan, telah melaksanakan pembukaan dan evaluasi dokumen pengadaan file I sesuai dengan jadwal pengadaan yang telah ditentukan.
            </p>

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
                        <td><input type="text" name="ymdp" value="<?= $data_ba_pasca3['ymdp'] ?>"></td>
                        <td rowspan="3">Sesuai ketentuan yang berlaku, maka Pelelangan Terbatas dinyatakan:
                            <select name="ket_penyampaian" id="">
                                <?php if ($data_ba_pasca3['ket_penyampaian'] == 'Sah') { ?>
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
                        <td><input type="text" name="tmdp" value="<?= $data_ba_pasca3['tmdp'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Jumlah Total</td>
                        <td>Otomatis Terhitung</td>
                    </tr>
                </tbody>
            </table>

            <br>

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
                        <td>Dokumen Penawaran yang dinyatakan SAH</td>
                        <td><input type="text" name="dpyds" value="<?= $data_ba_pasca3['dpyds'] ?>"></td>
                        <td rowspan="3">Sesuai ketentuan yang berlaku, maka Pelelangan Terbatas dinyatakan:
                            <select name="ket_pembukaan" id="" value="<?= $data_ba_pasca3['ket_penawaran'] ?>">
                                <?php if ($data_ba_pasca3['ket_pembukaan'] == 'Sah') { ?>
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
                        <td><input type="text" name="dpydg" value="<?= $data_ba_pasca3['dpydg'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Jumlah Total</td>
                        <td>Otomatis Terhitung</td>
                    </tr>
                </tbody>
            </table>

            <br>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td><b> Kegiatan Pembukaan Harga Penawaran</b></td>
                        <td><b> Jumlah Harga Penawaran </b></td>
                        <td><b> Keterangan</b></td>
                    </tr>
                    </tdead>
                <tbody>
                    <tr>
                        <td>Harga Penawaran yang dinyatakan SAH</td>
                        <td><input type="text" name="hpyds" value="<?= $data_ba_pasca3['hpyds'] ?>"></td>
                        <td rowspan="3">Sesuai ketentuan yang berlaku, maka Pelelangan Terbatas dinyatakan:
                            <select name="ket_harga" id="">
                                <?php if ($data_ba_pasca3['ket_harga'] == 'Sah') { ?>
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
                        <td>Harga Penawaran yang dinyatakan GUGUR</td>
                        <td><input type="text" name="hpydg" value="<?= $data_ba_pasca3['hpydg'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Jumlah Total</td>
                        <td>Otomatis Terhitung</td>
                    </tr>
                </tbody>
            </table>

            <br>

            <table class="table table-bordered">
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
                            <td style="text-align: center;"></td>
                            <td style="text-align: center;"></td>
                            <td style="text-align: center;">Rp. <?= $value['negosiasi'] ?></td>
                        </tr>
                    <?php   } ?>

                </tbody>
            </table>
            <br>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align:center;" rowspan="2">Nomor</th>
                        <th style="text-align:center;" rowspan="2">Nama Perusahaan</th>
                        <th style="text-align:center;" colspan="5">FILE II DOKUMEN PENAWARAN HARGA</th>
                        <th style="text-align:center;">Keterangan</th>
                        <th style="text-align:center;" rowspan="2">Aksi</th>
                    </tr>
                    <tr>
                        <th style="text-align:center;">Surat Penawaran</th>
                        <th style="text-align:center;">Rekapitulasi Daftar Kuantitas Dan Harga</th>
                        <th style="text-align:center;">Daftar Kuantitas dan Harga</th>
                        <th style="text-align:center;">Harga Penawaran</th>
                        <th style="text-align:center;">% HPS</th>
                        <th style="text-align:center;">SAH/GUGUR</th>
                    </tr>
                </thead>
                <tbody id="table_vendor3">


                </tbody>
                <tfoot>

                    <td colspan="2">Harga Perkiraan <br> Sendiri</td>
                    <td colspan="7">Rp. </td>
                </tfoot>
            </table>
            <br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Nama Perusahaan</th>
                        <th>Nilai Teknis</th>
                        <th>
                            Harga Penawaran
                            <br>
                            Terkoreksi
                        </th>
                        <th>% HPS</th>
                        <th>
                            Nilai Harga <br>
                            Penawaran (NHP)
                        </th>
                        <th>Nilai Akhir</th>
                        <th>Peringkat Sementara</th>
                        <th>
                            Keterangan <br>
                            Sah/Gugur
                        </th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="table_vendor3_2">

                </tbody>
                <tfoot>

                    <td colspan="3">Harga Perkiraan <br> Sendiri</td>
                    <td colspan="7">Rp. </td>
                </tfoot>
            </table>
            <br>
            <p style="text-align:justify; font-size:15px">
                Hasil Pembukaan Dokumen Penawaran merupakan satu kesatuan dan bagian yang tidak terpisahkan dari Berita Acara ini.
            </p>
            <p style="text-align:justify; font-size:15px">
                Demikian Berita Acara ini dibuat dengan sebenarnya, ditandatangani oleh Panitia Pengadaan dan wakil dari Peserta Penawaran.
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


<div class="modal fade" id="edit_nilai_pasca3" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Evaluasi <label id="nm_vendor3"></label></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:;" id="save_ba3_vendor_form_pasca">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id_mengikuti_paket" id="id_mengikuti_paket_pasca3">
                        <div class="col-md-12">
                            <label for="">Surat Penawaran</label>
                            <select name="sp_pasca3" id="" class="form-control form-control-sm">
                                <option value="1">Ada</option>
                                <option value="2">Tidak Ada</option>
                            </select>

                            <label for="">Rekapitulasi Daftar Kuantitas Dan Harga</label>
                            <select name="rdkh_pasca3" id="" class="form-control form-control-sm">
                                <option value="1">Ada</option>
                                <option value="2">Tidak Ada</option>
                            </select>

                            <label for="">Daftar Kuantitas dan Harga</label>
                            <select name="dkh_pasca3" id="" class="form-control form-control-sm">
                                <option value="1">Ada</option>
                                <option value="2">Tidak Ada</option>
                            </select>

                            <label for="">HPS</label>
                            <input type="text" name="hps_pasca3_1" class="form-control form-control-sm">

                            <label for="">Keterangan</label>
                            <select name="ket_pasca3_1" id="" class="form-control form-control-sm">
                                <option value="Sah">Sah</option>
                                <option value="Gugur">Gugur</option>
                            </select>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" onclick="save_ba3_vendor_pasca()" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_nilai_pasca3_2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Evaluasi <label id="nm_vendor3_2"></label></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:;" id="save_ba3_vendor_form_pasca2">
                <input type="hidden" name="id_mengikuti_paket3_2" id="id_mengikuti_paket3_3">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id_mengikuti_paket" id="id_mengikuti_paket3">
                        <div class="col-md-12">
                            <label for="">HPS</label>
                            <input type="text" name="hps_pasca3_2" class="form-control form-control-sm">

                            <label for="">Nilai harga Penawaran (NHP)</label>
                            <input type="text" name="nhp_pasca3" class="form-control form-control-sm">

                            <label for="">Peringkat Sementara</label>
                            <input type="text" name="peringkat_pasca3" class="form-control form-control-sm">


                            <label for="">Keterangan</label>
                            <select name="ket_pasca3_2" id="" class="form-control form-control-sm">
                                <option value="Sah">Sah</option>
                                <option value="Gugur">Gugur</option>
                            </select>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" onclick="save_ba3_vendor_pasca2()" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>