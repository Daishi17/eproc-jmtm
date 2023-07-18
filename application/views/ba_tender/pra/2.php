<div class="container">
    <form action="javascript:;" method="POST" id="form_ba_pra2">
        <?php $id_paket = $paket['id_paket'] ?>
        <button type="submit" onclick="simpan_ba_pra2('<?= $id_paket ?>')" class="btn btn-success">Simpan</button>

        <a target="_blank" href="<?= base_url('panitiajmtm/beranda/hasil_ba_pra_2/' . $paket['id_paket']) ?>" class="btn btn-primary">Lihat Hasil</a>
        <center>
            <h4 class="text-uppercase font-weight-bold" style="line-height: 1;">Berita Acara</h4>
            <h5 class="text-uppercase font-weight-bold" style="line-height: 1;">PEMBUKAAN DAN EVALUASI DOKUMEN PENAWARAN (FILE I)</h5>
            <h5 class="text-uppercase font-weight-bold" style="line-height: 1;"><?= $paket['nama_paket'] ?></h5>
            <h5 class="text-uppercase font-weight-bold" style="line-height: 1;">PT JASA MARGA TOLLROAD MAINTENANCE</h5>
        </center>

        <hr size="5">
        <center>
            <div style="font-size:15px">
                <label class="font-weight-bold">Nomor : <input type="text" name="nomor" class="form-control form-control-sm" value="<?= $data_ba_2['nomor'] ?>"></label>
                <br>
                <label class="font-weight-bold">Tanggal : <input type="text" name="tanggal" class="form-control form-control-sm" value="<?= $data_ba_2['tanggal'] ?>"></label>
            </div>
        </center>
        <div class="container">
            <p style="text-align:justify; font-size:15px">
                Pada Hari ini <b> <input type="text" name="hari_terbilang" value="<?= $data_ba_2['hari_terbilang'] ?>"></b> , Tanggal <b> <input type="text" name="tgl_terbilang" value="<?= $data_ba_2['tgl_terbilang'] ?>"></b>, Bulan <b> <input type="text" name="bulan_terbilang" value="<?= $data_ba_2['bulan_terbilang'] ?>"> </b>, <b> Tahun <input type="text" name="tahun_terbilang" value="<?= $data_ba_2['tahun_terbilang'] ?>">, <input type="date" name="tgl" value="<?= $data_ba_2['tgl'] ?>"> </b> , <b>Panitia <?= $paket['nama_panitia'] ?> </b> yang dibentuk melalui Surat Keputusan Direksi PT Jasa Marga Tollroad Maintenance Nomor : 34/SK.DIR/JMTM/III/2023 Tentang Perubahan atas Keputusan Direksi Nomor 79/SK.DIR/JMTM/VII/2022 Tentang Pembentukan Panitia Pengadaan Barang/Jasa Kontrak Manajemen, Non Kontrak Manajemen, Tim Evaluasi, Klarifikasi & Negosiasi Untuk Keperluan Project Construction, AMP & Heavy Equipment serta berdasarkan SK Pengadaan Barang dan Jasa yang berlaku di lingkungan perusahaan telah melaksanakan Evaluasi Penawaran Teknis untuk <?= $paket['nama_paket'] ?> dengan hasil sebagai berikut:
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
                        <td><input type="text" name="ymdk" value="<?= $data_ba_2['ymdk'] ?>"></td>
                        <td rowspan=" 3">Sesuai ketentuan yang berlaku, maka Pelelangan Terbatas dinyatakan:
                            <select name="ket_penyampaian" id="">
                                <?php if ($data_ba_2['ket_penyampaian'] == 'Sah') { ?>
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
                        <td><input type="text" name="tmdp" value="<?= $data_ba_2['tmdp'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Jumlah Total</td>
                        <td>Otomatis Terhitung</td>
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
                        <td><input type="text" name="dpyds" value="<?= $data_ba_2['dpyds'] ?>"></td>
                        <td rowspan="3">Sesuai ketentuan yang berlaku, maka Pelelangan Terbatas dinyatakan:
                            <select name="ket_pembukaan" id="" value="<?= $data_ba_2['ket_penawaran'] ?>">
                                <?php if ($data_ba_2['ket_pembukaan'] == 'Sah') { ?>
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
                        <td><input type="text" name="dpydg" value="<?= $data_ba_2['dpydg'] ?>"></td>
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
                <tbody id="table_vendor_pra2">



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
                                <a href="" class="btn btn-sm btn-success">Sudah Di Setujui dari Pakta Integritas</a>
                            </td>
                        </tr>
                    <?php  } ?>

                </tbody>
            </table>
        </div>
    </form>
</div>


<div class="modal fade" id="edit_nilai_pra2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Evaluasi <label id="nm_vendor2"></label></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:;" id="save_ba2_vendor_form_pra">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id_mengikuti_paket" id="id_mengikuti_paket2">
                        <div class="col-md-12">
                            <label for="">Evaluasi Administrasi</label>
                            <select name="ev_admin_pra2" id="" class="form-control form-control-sm">
                                <option value="1">Lulus</option>
                                <option value="2">Gugur</option>
                            </select>

                            <label for="">Evaluasi Keuangan</label>
                            <select name="ev_keuangan_pra2" id="" class="form-control form-control-sm">
                                <option value="1">Lulus</option>
                                <option value="2">Gugur</option>
                            </select>

                            <label for="">Evaluasi Teknis</label>
                            <select name="ev_teknis_pra2" id="" class="form-control form-control-sm">
                                <option value="1">Lulus</option>
                                <option value="2">Gugur</option>
                            </select>

                            <label for="">Keterangan</label>
                            <select name="ket_pra2" id="" class="form-control form-control-sm">
                                <option value="1">Lulus</option>
                                <option value="2">Gugur</option>
                            </select>

                            <label for="">Peringkat</label>
                            <input type="text" name="peringkat_pra2" class="form-control form-control-sm">
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" onclick="save_ba2_vendor_pra()" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>