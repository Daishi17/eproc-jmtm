<div class="container">
    <input type="hidden" value="<?= $paket['id_paket'] ?>" id="reusable">
    <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb btn-grad100">
            <li class="breadcrumb-item"><a style="color: white;" href="#">Beranda &raquo; Daftar Paket &raquo; Edit Tender</a></li>
        </ol>
    </nav>
    <div id="demo"></div>
    <div class="content" style="box-shadow: 2px 2px 10px black;" id="hps-content">
        <div class="bs-callout bs-callout-info">
            <b>Penting:</b><br />
            1. Paket Tender Belum Bisa Diumumkan Jika Isian Blum Lengkap.<br />
            2. E-tender Harus Dilakukan Menyeluruh Jika Ada Tahap Yang Tidak Dilalui(misalnya dilakukan secara manual) <br>
            akan menyebabkan status tender menggantung dan berpontensi sebagai temuan audiator.
            <br /><br />
        </div>
        <div class="clearfix"></div>
        <div class="content">
            <div class="content tab-content">
                <input type="hidden" name="step" value="2" />
                <div style="overflow-x:auto;">

                    <table class="table">
                        <tr>
                            <th class="bgwarning">Paket Detail</th>
                            <td>
                                <table class="table table-hover">
                                    <tr class="btn-grad100">
                                        <th>Kode Tender</th>
                                        <th>Nama Paket</th>
                                        <th>Jenis Pengadaan</th>
                                        <th>Jenis Anggaran</th>
                                    </tr>
                                    <tr>
                                        <td><?= $paket['kode_tender'] ?></td>
                                        <td><?= $paket['nama_paket'] ?></td>

                                        <td><?= $paket['nama_jenis_pengadaan'] ?></td>
                                        <td width="150px">
                                            <?php
                                            if (!$paket['tahun_mulai_jamak']) { ?>
                                                <?= $paket['nama_tahun_anggaran'] ?> - <?= $paket['nama_jenis_anggaran'] ?> - BUMN
                                            <?php } else { ?>
                                                <?= date('Y',  strtotime($paket['tahun_mulai_jamak'])) ?> - <?= date('Y',  strtotime($paket['tahun_selesai_jamak']))  ?> - <?= $paket['nama_jenis_anggaran'] ?> - BUMN
                                            <?php } ?>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <th width="20%">Unit Pelaksana<span class="warning">*</span></th>
                            <td><?= $paket['nama_unit_kerja'] ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Alasan Pemilihan Penyedia<span class="warning">*</span></th>
                            <td><textarea name="alasan_penunjukan_langsung" id="alasan_penunjukan_langsung" class="form-control form-control-sm"><?= $paket['alasan_penunjukan_langsung'] ?></textarea></td>
                        </tr>
                        <tr>
                            <th class="bgwarning">Nilai HPS <span class="warning">*</span></th>
                            <td>
                                <form action="#" id="formDataRincianHps">
                                    <?php if ($total_rincian_hps_pdf == null) { ?>
                                        <?php $total = 0;
                                        foreach ($total_rincian_hps as $key => $value) { ?>
                                            <?php
                                            $total += $value['vol_rincian_hps'] * $value['harga_rincian_hps'] + ($value['persen_rincian_hps'] / 100) * $value['vol_rincian_hps'] * $value['harga_rincian_hps'];
                                            ?>
                                        <?php } ?>
                                        <?= "Rp " . number_format($total, 2, ',', '.') ?>
                                    <?php } else { ?>
                                        <?= "Rp " . number_format($total_hps_pdf_ada['total_rincian_hps_pdf'], 2, ',', '.') ?>
                                    <?php } ?>
                                    <input type="hidden" value="<?= $paket['id_paket'] ?>" id="rincian_hps">
                                    <!--sangat Krusial Bansat  -->
                                    <a href="#" id="btnSave" onclick="BuatRincianHps()" class="btn btn-grad100 btn-sm">Rincian Hps</a>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <th class="bgwarning">Nilai Pagu Paket</th>
                            <td><?= "Rp " . number_format($total_hps['hps'], 2, ',', '.') ?> </td>
                        </tr>
                        <tr>
                            <th>Jenis Pengadaan</th>
                            <td>
                                <a href="<?= base_url('panitiajmtm/daftarpaket/jenispengadaan/' . $paket['id_paket']) ?>" class="badge badge-pill btn-grad100"><?= $paket['nama_jenis_pengadaan'] ?> - <?= $paket['nama_metode_pemilihan'] ?> -<br> <?= $paket['nama_kualifikasi'] ?> <?= $paket['nama_metode_dokumen'] ?>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th class="bgwarning">Upload Dokumen Penunjang (Persetujuan Izin Prinsip)<span class="warning">*</span></th>
                            <td colspan="3">
                                <div class="card">
                                    <div class="card-header btn-grad100">Upload Dokumen Penunjang (Persetujuan Izin Prinsip)</div>
                                    <div class="card-body">
                                        <center>
                                            <form id="form_dokumen_penunjang" enctype="multipart/form-data">
                                                <div class="input-group col-md-6">
                                                    <div class="input-group-append">
                                                        <button class="input-group-text attach_btn btn-grad100" type="button" id="loadFileXml" value="loadXml" onclick="document.getElementById('file_penunjang').click();"><i class="fas fa-paperclip"></i></button>
                                                        <input type="file" accept="application/pdf" style="display:none;" id="file_penunjang" class="file_dokumen_penunjang" name="file_dokumen_penunjang" />
                                                    </div>
                                                    <input type="text" name="nama_dokumen_penunjang" class="form-control form-control-sm" placeholder="Nama File....">
                                                    <div class="input-group-append">
                                                        <button type="submit" id="upload_penunjang" name="upload" class="input-group-text  btn-grad100"><i class="fas fa-upload"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                            <br>
                                            <div style="display: none;" id="error_file_penunjang" class="alert alert-danger" role="alert">
                                                ANDA BELUM MENGISI FILE !!!
                                            </div>
                                        </center>
                                        <br>
                                        <center>
                                            <div class="form-group col-md-6" id="process_penunjang" style="display:none;">
                                                <small for="" style="display:none;" id="sedang_dikirim_penunjang">Sedang Mengupload....</small>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-striped active progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                </div>
                                            </div>
                                        </center>
                                        <table class="table table-hover" id="table_dokumen_penunjang">
                                            <thead>
                                                <tr class="btn-grad100">
                                                    <th>No</th>
                                                    <th>Nama Dokumen Penunjang</th>
                                                    <th>File</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th>Dokumen Lelang</th>
                            <td>
                                <div class="card mb-3">
                                    <div class="card-header btn-grad100" style="color: white;">Dokumen Lelang</div>
                                    <div class="card-body text-primary">
                                        <div class="row">
                                            <?php if ($paket['id_kualifikasi'] == 20 ||  $paket['id_kualifikasi'] == 22 || $paket['id_kualifikasi'] == 21) { ?>

                                            <?php } else { ?>
                                                <div class="col-md-6">
                                                    <div class="card">
                                                        <div class="card-header btn-grad100">
                                                            <label for="" class="text-white">Dokumen Prakualifikasi</label>
                                                        </div>
                                                        <?= form_open_multipart('panitiajmtm/daftarpaket/add_dokumen_kualifikasi_pdf') ?>
                                                        <div class="card-body">
                                                            <input type="text" name="nama_dokumen_kualifikasi_pdf" placeholder="Nama File Dokumen" class="form-control form-control-sm mb-3">
                                                            <div class="input-group">
                                                                <input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>">
                                                                <input type="file" accept="application/pdf" class="form-control form-control-sm" aria-describedby="inputGroupFileAddon04" accept=".pdf" name="file_dokumen_kualifikasi_pdf" aria-label="Upload">
                                                                <button class="btn btn-sm btn-danger" type="submit" id="inputGroupFileAddon04"><img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt=""> UPLOAD</button>
                                                            </div>
                                                            <?= form_close(); ?>
                                                            <br><br>
                                                            <table>
                                                                <?php foreach ($get_pdf_dokumen_kualifikasi as $key => $value) { ?>
                                                                    <tr>
                                                                        <td><?= $value['nama_dokumen_kualifikasi_pdf'] ?></td>
                                                                        <td><a href="<?= base_url('dokumen_file_dokumen_kualifikasi_pdf/' . $value['file_dokumen_kualifikasi_pdf']) ?>"><img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt=""></a></td>
                                                                        <td><a class="text-danger" href="<?= base_url('panitiajmtm/daftarpaket/delete_dokumen_kualifikasi/' . $value['id_dokumen_kualifikasi_pdf']) ?>"><i class="fas fa-trash-alt"></i></a></td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header btn-grad100">
                                                        <label for="" class="text-white"> Dokumen Lelang</label>
                                                    </div>
                                                    <div class="card-body">
                                                        <?= form_open_multipart('panitiajmtm/daftarpaket/add_dokumen_kualifikasi_pdf_lelang') ?>
                                                        <input type="text" name="nama_dokumen_lelang" placeholder="Nama File Dokumen" class="form-control form-control-sm mb-3">
                                                        <div class="input-group">
                                                            <input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>">
                                                            <input type="file" accept="application/pdf" class="form-control form-control-sm" aria-describedby="inputGroupFileAddon04" accept=".pdf" name="file_dokumen_lelang" aria-label="Upload">
                                                            <button class="btn btn-sm btn-danger" type="submit" id="inputGroupFileAddon04"><img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt=""> UPLOAD</button>
                                                        </div>
                                                        <?= form_close(); ?>
                                                        <br><br>
                                                        <table>
                                                            <?php foreach ($get_pdf_dokumen_kualifikasi_lelang as $key => $value) { ?>
                                                                <tr>
                                                                    <td><?= $value['nama_dokumen_lelang'] ?></td>
                                                                    <td><a href="<?= base_url('file_dokumen_lelang/' . $value['file_dokumen_lelang']) ?>"><img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt=""></a></td>
                                                                    <td><a class="text-danger" href="<?= base_url('panitiajmtm/daftarpaket/delete_dokumen_kualifikasi_lelang/' . $value['id_dokumen_lelang_pdf']) ?>"><i class="fas fa-trash-alt"></i></a></td>

                                                                </tr>

                                                            <?php } ?>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <?php if ($paket['id_kualifikasi'] == 22) { ?>
                                <th>Dokumen Persyaratan Tender E-auction<span class="warning">*</span></th>
                                <td>
                                    <a class="btn btn-sm btn-grad100" href="<?= base_url('panitiajmtm/daftarpaket/persyaratankualifikasi/' . $paket['id_paket']) ?>">isi Persyaratan Tender E-auction<span class="warning">*</span></a>
                                </td>
                            <?php } else { ?>
                                <th>Dokumen Persyaratan Tender Terbatas / Seleksi Terbatas (Pemilihan Langsung)<span class="warning">*</span></th>
                                <td>
                                    <a class="btn btn-sm btn-grad100" href="<?= base_url('panitiajmtm/daftarpaket/persyaratankualifikasi/' . $paket['id_paket']) ?>">isi Persyaratan Tender Terbatas / Seleksi Terbatas (Pemilihan Langsung)<span class="warning">*</span></a>
                                </td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <th>Jenis Kontrak<span class="warning">*</span></th>
                            <td>
                                <?php if ($jenis_kontrak == null) { ?>
                                    <form action="<?= base_url('panitiajmtm/daftarpaket/simpan_jenis_kontrak') ?>" method="POST">
                                        <input type="hidden" value="<?= $paket['id_paket'] ?>" name="id_paket">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <center>Cara Pembayaran</center>
                                                <select name="cara_pembayaran" id="" class="select2 form-control">
                                                    <option value="Lump Sum">Lump Sum</option>
                                                    <option value="Harga Satuan">Harga Satuan</option>
                                                    <option value="Gabungan Lum Sum dan Harga Satuan">Gabungan Lum Sum dan Harga Satuan</option>
                                                    <option value="Terima Jadi (Turnkey)">Terima Jadi (Turnkey)</option>
                                                    <option value="Presentase">Presentase</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <center>Pembebanan Tahun Anggaran</center>
                                                <select name="pembebanan_tahun_anggaran" id="" class="select2 form-control">
                                                    <option value="Tahun Tunggal">Tahun Tunggal</option>
                                                    <option value="Tahun Jamak">Tahun Jamak</option>
                                                </select>
                                                <center>
                                                    <button type="submit" class="btn btn-sm btn-grad100" style="margin-top: 10px;">Simpan</button>
                                                </center>
                                            </div>
                                            <div class="col-md-4">
                                                <center>Sumber Pendanaan</center>
                                                <select name="sumber_pendanaan" id="" class="select2 form-control">
                                                    <option value="Pengadaan Bersama">Pengadaan Bersama</option>
                                                    <option value="Pengadaan Tunggal">Pengadaan Tunggal</option>
                                                    <option value="Kontrak Payung (Framework Contract)">Kontrak Payung (Framework Contract)</option>
                                            </div>
                                        </div>
                                    </form>
                                <?php } else { ?>
                                    <form action="<?= base_url('panitiajmtm/daftarpaket/update_jenis_kontrak') ?>" method="POST">
                                        <input type="hidden" value="<?= $paket['id_paket'] ?>" name="id_paket">
                                        <input type="hidden" value="<?= $jenis_kontrak['id_jenis_kontrak'] ?>" name="id_jenis_kontrak">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <center>Cara Pembayaran</center>
                                                <select name="cara_pembayaran" id="" class="select2 form-control">
                                                    <option value="<?= $jenis_kontrak['cara_pembayaran'] ?>"><?= $jenis_kontrak['cara_pembayaran'] ?></option>
                                                    <option value="Lump Sum">Lump Sum</option>
                                                    <option value="Harga Satuan">Harga Satuan</option>
                                                    <option value="Gabungan Lum Sum dan Harga Satuan">Gabungan Lum Sum dan Harga Satuan</option>
                                                    <option value="Terima Jadi (Turnkey)">Terima Jadi (Turnkey)</option>
                                                    <option value="Presentase">Presentase</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <center>Pembebanan Tahun Anggaran</center>
                                                <select name="pembebanan_tahun_anggaran" id="" class="select2 form-control">
                                                    <option value="<?= $jenis_kontrak['pembebanan_tahun_anggaran'] ?>"><?= $jenis_kontrak['pembebanan_tahun_anggaran'] ?></option>
                                                    <option value="Tahun Tunggal">Tahun Tunggal</option>
                                                    <option value="Tahun Jamak">Tahun Jamak</option>
                                                </select>
                                                <center>
                                                    <button type="submit" class="btn btn-sm btn-grad100" style="margin-top: 10px;">Update</button>
                                                </center>
                                            </div>
                                            <div class="col-md-4">
                                                <center>Sumber Pendanaan</center>
                                                <select name="sumber_pendanaan" id="" class="select2 form-control">
                                                    <option value="<?= $jenis_kontrak['sumber_pendanaan'] ?>"><?= $jenis_kontrak['sumber_pendanaan'] ?></option>
                                                    <option value="Pengadaan Bersama">Pengadaan Bersama</option>
                                                    <option value="Pengadaan Tunggal">Pengadaan Tunggal</option>
                                                    <option value="Kontrak Payung (Framework Contract)">Kontrak Payung (Framework Contract)</option>
                                            </div>
                                        </div>
                                    </form>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php if ($paket['id_kualifikasi'] == 23) { ?>
                            <?php if ($paket['sts_spm'] == 1) { ?>
                                <tr>
                                    <th>Buat Jadwal<span class="warning">*</span></th>
                                    <td>
                                        <a class="btn btn-sm btn-grad100 text-white">Menunggu Konfirmasi Admin Mengenai Tender Spm</a>
                                    </td>
                                </tr>
                            <?php } else { ?>
                                <tr>
                                    <th>Buat Jadwal<span class="warning">*</span></th>
                                    <td>
                                        <a href="<?= base_url('panitiajmtm/daftarpaket/jadwaltender/' . $paket['id_paket']) ?>" class="btn btn-sm btn-grad100">Edit Jadwal</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <th>Buat Jadwal<span class="warning">*</span></th>
                                <td>
                                    <a href="<?= base_url('panitiajmtm/daftarpaket/jadwaltender/' . $paket['id_paket']) ?>" class="btn btn-sm btn-grad100">Edit Jadwal</a>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <th class="bgwarning">Pilih Penyedia<span class="warning">*</span></th>
                            <td colspan="3">
                                <div style="max-width: 250px;">
                                    <a href="javascript:;" onclick="pilih_penyedia_penunjukan_langsung()" class="btn btn-grad100 btn-sm"> <i class="fas fa fa-users"></i> Pilih Penyedia</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th width="20%">Pilih Kategori Penyedia<span class="warning">*</span></th>
                            <td colspan="3"><select style="max-width: 250px;" class="form-control form-control-sm select2" name="kategori_penyedia" id="kategori_penyedia">
                                    <option value="<?= $paket['kategori_penyedia_penunjukan_langsung'] ?>"><?= $paket['kategori_penyedia_penunjukan_langsung'] ?></option>
                                    <option value="Penyedia Barang">Penyedia Barang</option>
                                    <option value="Penyedia Perorangan">Penyedia Perorangan</option>
                                    <option value="Konsultan Perorangan">Konsultan Perorangan</option>
                                    <option value="Konsultan Hukum Perorangan">Konsultan Hukum Perorangan</option>
                                    <option value="Konsultan Hukum Badan Usaha">Konsultan Hukum Badan Usaha</option>
                                    <option value="Konsultan Badan Usaha">Konsultan Badan Usaha</option>
                                    <option value="Jasa Pemborongan">Jasa Pemborongan</option>
                                    <option value="Jasa Kontruksi">Jasa Kontruksi</option>
                                    <option value="Jasa Lain">Jasa Lain</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th class="bgwarning" width="20%">Kualifikasi Usaha<span class="warning">*</span></th>
                            <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="kualifikasi_usaha" id="id_kualifikasi_usaha" class="form-control form-control-sm select2">
                                            <option value="<?= $paket['kualifikasi_usaha'] ?>"> <?= $paket['kualifikasi_usaha'] ?></option>
                                            <option value="Kualifikasi Besar (B1)">Kualifikasi Besar (B1)</option>
                                            <option value="Kualifikasi Besar (B2)">Kualifikasi Besar (B2)</option>
                                            <option value="Kualifikasi Menengah (M1)">Kualifikasi Menengah (M1)</option>
                                            <option value="Kualifikasi Menengah (M2)">Kualifikasi Menengah (M2)</option>
                                            <option value="Kualifikasi Kecil (K1)">Kualifikasi Kecil (K1)</option>
                                            <option value="Kualifikasi Kecil (K2)">Kualifikasi Kecil (K2)</option>
                                            <option value="Kualifikasi Kecil (K3)">Kualifikasi Kecil (K3)</option>
                                        </select>
                                        <p class="text-danger" id="kualifikasi_usaha_error"></p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <form action="#" id="form_data_save_tender">
                            <?php if ($paket['id_jenis_pengadaan'] == 2 || $paket['id_jenis_pengadaan'] == 3) { ?>
                                <tr>
                                    <th>SBU<span class="warning">*</span></th>
                                    <td colspan="3">
                                        <div class="row">
                                            <?php if ($paket['status_paket_tender'] == 2) { ?>
                                                <div style="max-width: 100%; margin-top: 15px">
                                                    <table id="table_sbu" class="table table-hover">

                                                    </table>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-md-6">
                                                    <div style="max-width: 250px;">
                                                        <select name="id_sbu" id="id_sbu" class="form-control form-control-sm select2">
                                                            <option value="">-- Pilih --</option>
                                                            <?php foreach ($sbu as $key => $value) { ?>
                                                                <option value="<?= $value['id_sbu'] ?>"><?= $value['kode_sbu'] ?> | <?= $value['nama_sbu'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <select name="kualifikasi_usaha_sbu_detail" id="sbu_kualifikasi_usaha_sbu" class="form-control form-control-sm select2">
                                                        <option value="">--Pilih Kualifikasi Usaha Sbu--</option>
                                                        <option value="Kualifikasi Besar (B1)">Kualifikasi Besar (B1)</option>
                                                        <option value="Kualifikasi Besar (B2)">Kualifikasi Besar (B2)</option>
                                                        <option value="Kualifikasi Menengah (M1)">Kualifikasi Menengah (M1)</option>
                                                        <option value="Kualifikasi Menengah (M2)">Kualifikasi Menengah (M2)</option>
                                                        <option value="Kualifikasi Kecil (K1)">Kualifikasi Kecil (K1)</option>
                                                        <option value="Kualifikasi Kecil (K2)">Kualifikasi Kecil (K2)</option>
                                                        <option value="Kualifikasi Kecil (K3)">Kualifikasi Kecil (K3)</option>
                                                    </select>
                                                </div>
                                                <div style="max-width: 100%; margin-top: 15px">
                                                    <table id="table_sbu" class="table table-hover">

                                                    </table>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php } else { ?>


                            <?php } ?>

                            <?php if ($paket['id_kualifikasi'] == 22) { ?>
                                <input type="hidden" maxlength="2" class="form-control" id="bobot_teknis" value="50" onkeyup="bobot_teknis_ajax()" name="bobot_teknis" onkeypress="return hanyaAngka(event)">
                                <p class="text-danger" id="bobot_teknis_error"></p>
                                <input type="hidden" maxlength="2" class="form-control" id="bobot_biaya" name="bobot_biaya" value="50">
                                <p class="text-danger" id="bobot_biaya_error" onkeypress="return hanyaAngka(event)"></p>
                            <?php } else { ?>
                                <tr>
                                    <th class="bgwarning" width="20%">Bobot Teknis<span class="warning">*</span></th>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input type="text" maxlength="2" class="form-control" id="bobot_teknis" value="<?= $paket['bobot_teknis'] ?>" onkeyup="bobot_teknis_ajax()" name="bobot_teknis" onkeypress="return hanyaAngka(event)">
                                                <p class="text-danger" id="bobot_teknis_error"></p>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <th class="bgwarning" width="20%">Bobot Biaya<span class="warning">*</span></th>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input type="text" maxlength="2" class="form-control" id="bobot_biaya" name="bobot_biaya" value="<?= $paket['bobot_biaya'] ?>">
                                                <p class="text-danger" id="bobot_biaya_error" onkeypress="return hanyaAngka(event)"></p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </form>
                    </table>
                </div>
                <div class="card mb-3 mt-4">
                    <div class="card-header btn-grad100" style="color: white;">Status Persetujuan</div>
                    <div class="card-body">
                        <div style="overflow-x:auto;">

                            <table class="table ">
                                <tr>
                                    <th>Anggota Panitia/Pokja</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Alasan Tidak Setuju</th>
                                </tr>
                                <?php foreach ($status_persetujuan as $key => $value) { ?>
                                    <tr>
                                        <td><?= $value['nama_penyetuju'] ?></td>
                                        <?php if ($value['status_persetujuan'] == 1) { ?>
                                            <td><i class="fas fa fa-check text-success"></i></td>
                                        <?php } ?>
                                        <?php if ($value['status_persetujuan'] == 2) { ?>
                                            <td><i class="fas fa fa-times text-danger"></i></td>
                                        <?php } ?>
                                        <td><?= $value['created_at'] ?></td>
                                        <?php if ($value['status_persetujuan'] == 2) { ?>
                                            <td><?= $value['alasan'] ?></td>
                                        <?php } ?>
                                        <td></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>


                <?php if ($cek_status_persetjuan) { ?>
                    <?php if ($paket['id_metode_dokumen'] == NULL) { ?>

                    <?php } else { ?>
                        <form action="<?= base_url('panitiajmtm/daftarpaket/persetujuantender') ?>" method="post" accept-charset="utf-8">
                            <input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>">
                            <div class=" card border-primary mb-3">
                                <div class="card-header bg-primary" style="color: white;">Persetujuan </div>
                                <div class="card-body">
                                    <h6 style="text-align: center;">PAKTA INTEGRITAS</h6>
                                    <label for="">Saya yang bertanda tangan di bawah ini :</label>
                                    <div class="ml-3">
                                        <label for="">Nama &ensp;&ensp;&ensp; : </label> <label for=""> <?= $this->session->userdata('nama_pegawai') ?></label>
                                        <input type="hidden" name="nama_penyetuju" value="<?= $this->session->userdata('nama_pegawai') ?>">
                                        <br>
                                        <label for="">Jabatan &ensp;&ensp;: Panitia</label>
                                        <input type="hidden" name="jabatan" value="<?= $this->session->userdata('jabatan') ?>">
                                        <br>
                                        <label for="">Selaku &ensp;&ensp;&ensp;: Ketua Panitia</label> <?= $this->session->userdata('nama_role_panitia') ?>
                                        <input type="hidden" name="selaku" value="<?= $this->session->userdata('nama_role_panitia') ?>">
                                    </div>
                                    <div>
                                        <label for="">Sesuai Dengan Anggaran Dasar dan Peraturan Perusahaan, Berwenang bertindak untuk dan atas nama :</label>
                                        <div class="ml-3">
                                            <label for="">Perusahaan &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;:</label> <label for=""> PT. Jasamarga Tollroad Maintenance.</label>
                                            <br>
                                            <label for="">Alamat Kedudukan &ensp;&ensp;: </label> <input type="text" class="form-control" name="alamat_kedudukan">
                                        </div>
                                    </div>
                                    <label for="">Dengan ini mentakan dengan sebenarnya bahwa :</label>
                                    <div class="ml-3">
                                        <ol>
                                            <li>Kami telah melaksanakan proses pengadaan di PT Jasamarga Tollroad Maintenance, sesuai dengan kewenangan yang di berikan oleh anggaran dasar dan peraturan perusahaan seta peraturan perundang-undangan, berdasarkan prinsip-prinsip itikad baik, dengan kecermatan yang tinggi, dan dalam keadaan bebas, mandiri atau tidak dibawah tekanan, maupun pengaruh dari pihak lain (<i>independency</i>)</li>
                                            <li>Kami telah mengambil keputusan sehubungan dengan hal - hal sebagaimana tersebut di atas dengan penuh kehati - hatian (<i>duty of care and loyalty</i>) demi kepentingan yang terbaik bagi Perusahaan, dengan mengindahkan berbagai sumber informasi, keterangan dan telah melakukan perbandingan yang cukup, sebagaimana layaknya kami mempertimbangkan keputusan bagi kepentingan diri kami sendiri(<i> prudent person rule</i>)</li>
                                            <li>Dalam mengambil keputusan, kami tidak memiliki kepentingan pribadi atau tujuan untuk melakukan sesuatu untuk manfaat diri sendiri, maupun kepentingan pihak yang terkait dengan diri kami, atau pihak yang terafiliasi dengan kamim dan dengan demikian tidak memiliki posisi yang mengandung potensi benturan kepentingan (<i>conflict of interest rule</i>), termasuk dengan seluruh pihak yang terlibat dengan tindakan di atas</li>
                                            <li>Kami telah melaksanakan proses tersebut dengan pemahaman yang cukup tentang berbagai peraturan dan kewajiban normatif lainnya yang terkait, dan memenuhi seluruh ketentuan dan peraturan perundang - undangan, termasuk mempertimbangkan <i>best practice</i> yang dipandang perlu, penting, dan kritikal dalam proses tersebut (<i>duty abiding the laws</i>)</li>
                                        </ol>
                                        <p>Demikian pernyataan ini kami sampaikan dengan sebenar - benarnya, tanpa menyembunyikan fakta dan hal material apapun, dan dengan demikian kami akan bertanggung jawab sepenuhnya atas kebenaran dari hal - hal yang kami nyatakan di sini, demikian pula akan bersedia bertanggung jawab baik secara perdata maupun pidana, apabila laporan dan pernyataan ini tidak sesuai dengan keadaan sebenarnya</p>
                                        <p>Demikian pernyataan ini kami buat untuk digunakan sebagaimana mestinya</p>
                                    </div>

                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-success btn-sm">Setuju</button>
                                        <a href="javascript:;" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#status_gak_setuju">Tidak Setuju</a>
                                    </div>

                                </div>
                            </div>
                        </form>
                    <?php } ?>
                <?php } else { ?>
                    <?php if ($cek_status_persetjuan2) { ?>

                    <?php } else { ?>
                        <?php if ($id_role_panitia) { ?>
                            <?php if ($paket['id_metode_dokumen'] == NULL) { ?>

                            <?php } else { ?>
                                <form action="<?= base_url('panitiajmtm/daftarpaket/persetujuantender') ?>" method="post" accept-charset="utf-8">
                                    <input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>">
                                    <div class=" card border-primary mb-3">
                                        <div class="card-header bg-primary" style="color: white;">Persetujuan </div>
                                        <div class="card-body">
                                            <h6 style="text-align: center;">PAKTA INTEGRITAS</h6>
                                            <label for="">Saya yang bertanda tangan di bawah ini :</label>
                                            <div class="ml-3">
                                                <label for="">Nama &ensp;&ensp;&ensp; : </label> <label for=""> <?= $this->session->userdata('nama_pegawai') ?></label>
                                                <input type="hidden" name="nama_penyetuju" value="<?= $this->session->userdata('nama_pegawai') ?>">
                                                <br>
                                                <label for="">Jabatan &ensp;&ensp;: Panitia</label>
                                                <input type="hidden" name="jabatan" value="<?= $this->session->userdata('jabatan') ?>">
                                                <br>
                                                <label for="">Selaku &ensp;&ensp;&ensp;: Ketua Panitia</label> <?= $this->session->userdata('nama_role_panitia') ?>
                                                <input type="hidden" name="selaku" value="<?= $this->session->userdata('nama_role_panitia') ?>">
                                            </div>
                                            <div>
                                                <label for="">Sesuai Dengan Anggaran Dasar dan Peraturan Perusahaan, Berwenang bertindak untuk dan atas nama :</label>
                                                <div class="ml-3">
                                                    <label for="">Perusahaan &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;:</label> <label for=""> PT. Jasamarga Tollroad Maintenance.</label>
                                                    <br>
                                                    <label for="">Alamat Kedudukan &ensp;&ensp;: </label> <input type="text" class="form-control" name="alamat_kedudukan">
                                                </div>
                                            </div>
                                            <label for="">Dengan ini mentakan dengan sebenarnya bahwa :</label>
                                            <div class="ml-3">
                                                <ol>
                                                    <li>Kami telah melaksanakan proses pengadaan di PT Jasamarga Tollroad Maintenance, sesuai dengan kewenangan yang di berikan oleh anggaran dasar dan peraturan perusahaan seta peraturan perundang-undangan, berdasarkan prinsip-prinsip itikad baik, dengan kecermatan yang tinggi, dan dalam keadaan bebas, mandiri atau tidak dibawah tekanan, maupun pengaruh dari pihak lain (<i>independency</i>)</li>
                                                    <li>Kami telah mengambil keputusan sehubungan dengan hal - hal sebagaimana tersebut di atas dengan penuh kehati - hatian (<i>duty of care and loyalty</i>) demi kepentingan yang terbaik bagi Perusahaan, dengan mengindahkan berbagai sumber informasi, keterangan dan telah melakukan perbandingan yang cukup, sebagaimana layaknya kami mempertimbangkan keputusan bagi kepentingan diri kami sendiri(<i> prudent person rule</i>)</li>
                                                    <li>Dalam mengambil keputusan, kami tidak memiliki kepentingan pribadi atau tujuan untuk melakukan sesuatu untuk manfaat diri sendiri, maupun kepentingan pihak yang terkait dengan diri kami, atau pihak yang terafiliasi dengan kamim dan dengan demikian tidak memiliki posisi yang mengandung potensi benturan kepentingan (<i>conflict of interest rule</i>), termasuk dengan seluruh pihak yang terlibat dengan tindakan di atas</li>
                                                    <li>Kami telah melaksanakan proses tersebut dengan pemahaman yang cukup tentang berbagai peraturan dan kewajiban normatif lainnya yang terkait, dan memenuhi seluruh ketentuan dan peraturan perundang - undangan, termasuk mempertimbangkan <i>best practice</i> yang dipandang perlu, penting, dan kritikal dalam proses tersebut (<i>duty abiding the laws</i>)</li>
                                                </ol>
                                                <p>Demikian pernyataan ini kami sampaikan dengan sebenar - benarnya, tanpa menyembunyikan fakta dan hal material apapun, dan dengan demikian kami akan bertanggung jawab sepenuhnya atas kebenaran dari hal - hal yang kami nyatakan di sini, demikian pula akan bersedia bertanggung jawab baik secara perdata maupun pidana, apabila laporan dan pernyataan ini tidak sesuai dengan keadaan sebenarnya</p>
                                                <p>Demikian pernyataan ini kami buat untuk digunakan sebagaimana mestinya</p>
                                            </div>

                                            <div class="mt-3">
                                                <button type="submit" class="btn btn-success btn-sm">Setuju</button>
                                                <a href="javascript:;" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#status_gak_setuju">Tidak Setuju</a>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            <?php } ?>
                        <?php } else { ?>

                        <?php } ?>

                    <?php } ?>

                <?php } ?>
                <?php if ($paket['status_paket_tender'] == 1) { ?>
                    <?php if ($paket['id_metode_pemilihan'] == 8) { ?>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?= base_url('panitiajmtm/daftarpaket') ?>" class="btn btn-danger btn-block">Batal</a>
                            </div>
                            <div class="col-md-6">
                                <?php if ($id_role_panitia) { ?>
                                    <form method="post" action="#">
                                        <input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>" id="id_paket_save_tender">
                                        <a href="javascript:;" id="btnSave" onclick="SimpanTenderPenunjukanLangsung()" class="btn btn-success btn-block">Umumkan Paket Penunjukan Langsung</a>
                                    </form>
                                <?php } else { ?>

                                <?php } ?>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?= base_url('panitiajmtm/daftarpaket') ?>" class="btn btn-danger btn-block">Batal</a>
                            </div>
                            <div class="col-md-6">
                                <?php if ($id_role_panitia) { ?>
                                    <?php if ($paket['status_pembatalan_atau_pengulangan'] == 1) { ?>
                                        <?php if ($paket['id_metode_dokumen'] == NULL) { ?>

                                        <?php } else { ?>
                                            <?php if ($paket['id_kualifikasi'] == 23) { ?>
                                                <?php if ($paket['sts_spm'] == 1) { ?>
                                                    <td>
                                                        <a class="btn btn-sm btn-grad100 text-white">Menunggu Konfirmasi Admin Mengenai Tender Spm</a>
                                                    </td>
                                                <?php } else { ?>
                                                    <form method="post" action="#">
                                                        <input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>" id="id_paket_save_tender">
                                                        <a href="#id_kualifikasi_usaha" id="btnSave" onclick="SimpanTender_ulang()" class="btn btn-success btn-block">Umumkan Paket Tender Ulang</a>
                                                    </form>
                                                <?php  }  ?>
                                            <?php } else { ?>
                                                <form method="post" action="#">
                                                    <input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>" id="id_paket_save_tender">
                                                    <a href="#id_kualifikasi_usaha" id="btnSave" onclick="SimpanTender_ulang()" class="btn btn-success btn-block">Umumkan Paket Tender Ulang</a>
                                                </form>
                                            <?php  }  ?>


                                        <?php } ?>
                                    <?php } else { ?>
                                        <?php if ($paket['id_metode_dokumen'] == NULL) { ?>

                                        <?php } else { ?>
                                            <?php if (!$cek_pakta_integritas) { ?>

                                            <?php } else { ?>
                                                <?php if ($paket['id_kualifikasi'] == 23) { ?>
                                                    <?php if ($paket['sts_spm'] == 1) { ?>
                                                        <form method="post" action="#">
                                                            <input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>" id="id_paket_save_tender">
                                                            <a href="#id_kualifikasi_usaha" id="btnSave" onclick="SimpanTender()" class="btn btn-success btn-block">Umumkan Paket Tender</a>
                                                        </form>
                                                    <?php } else { ?>
                                                        <td>
                                                            <a class="btn btn-sm btn-grad100 text-white">Menunggu Konfirmasi Admin Mengenai Tender Spm</a>
                                                        </td>
                                                    <?php  }  ?>
                                                <?php } else { ?>
                                                    <form method="post" action="#">
                                                        <input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>" id="id_paket_save_tender">
                                                        <a href="#id_kualifikasi_usaha" id="btnSave" onclick="SimpanTender()" class="btn btn-success btn-block">Umumkan Paket Tender</a>
                                                    </form>
                                                <?php  } ?>


                                            <?php } ?>

                                        <?php } ?>
                                    <?php } ?>
                                <?php } else { ?>

                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else if ($paket['status_paket_tender'] == 2) { ?>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?= base_url('panitiajmtm/daftarpaket') ?>" class="btn btn-info btn-block">Kembali</a>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>

</div>