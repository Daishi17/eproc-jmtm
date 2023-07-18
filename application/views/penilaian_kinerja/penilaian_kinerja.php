<?php
$this->role_login->cek_login();
?>
<style>
    #kirim_ke_vendor {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background-color: #fff;
    }

    #kirim_ke_vendor #dikirim_ke_vendor {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        font: 14px arial;
    }
</style>
<div id="kirim_ke_vendor" style="display: none;">
    <div id="dikirim_ke_vendor">
        <img src="<?= base_url('assets/img/info_penyedia.gif') ?>" width="100%">
    </div>
</div>
<div class="preloader">
    <div class="loading">
        <img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
    </div>
</div>
<form id="form_update_tanggal_kontrak">
    <input type="hidden" name="tanggal_nomor_kontak">
</form>
<form id="form_update_nomor_kontrak">
    <input type="hidden" name="nomor_kontrak">
</form>
<form id="form_update_jangka_mulai">
    <input type="hidden" name="jangka_mulai">
</form>
<form id="form_update_jangka_selesai">
    <input type="hidden" name="jangka_selesai">
</form>
<div class="container">
    <br>
    <div class="card" style="box-shadow: 2px 2px 10px 2px black;">
        <div class="card-header btn-grad">
            <i class="fas fa-chart-line"></i> Form Penilaian Kinerja Vendor
        </div>
        <input type="hidden" name="id_paket" id="id_paket" value="<?= $data_pemenang['id_mengikuti_paket_vendor'] ?>">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="card" style="box-shadow: 2px 2px 10px 2px black;">
                        <div class="card-header btn-grad">
                            <i class="fas fa-chart-line"></i> Jenis Penilaian
                        </div>
                        <div class="card-body">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <?php if ($data_pemenang['status_jenis_penilayan'] == 'kontruksi') { ?>
                                    <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Kinerja Pekerjaan Konstruksi</a>
                                <?php  } elseif ($data_pemenang['status_jenis_penilayan'] == 'konsultan kontruksi') { ?>
                                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Kinerja Konsultan Perencana Konstruksi</a>
                                <?php  } elseif ($data_pemenang['status_jenis_penilayan'] == 'kajian konsultan kontruksi') { ?>
                                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Kinerja Konsultan Kajian/Studi/Sistem Informatika</a>
                                <?php  } elseif ($data_pemenang['status_jenis_penilayan'] == 'konsultan pengawas kontruksi') { ?>
                                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Kinerja Konsultan Pengawas Konstruksi</a>
                                <?php  } elseif ($data_pemenang['status_jenis_penilayan'] == 'konsultan jasa laianya kontruksi') { ?>
                                    <a class="nav-link" id="v-pills-jasa_lainya-tab" data-toggle="pill" href="#v-pills-jasa_lainya" role="tab" aria-controls="v-pills-jasa_lainya" aria-selected="false">Kinerja Jasa Lainya</a>
                                <?php  } elseif ($data_pemenang['status_jenis_penilayan'] == 'konsultan penyedia barang kontruksi') { ?>
                                    <a class="nav-link" id="v-pills-penyedia_barang-tab" data-toggle="pill" href="#v-pills-penyedia_barang" role="tab" aria-controls="v-pills-penyedia_barang" aria-selected="false">Kinerja Penyedia Barang</a>
                                <?php  } else { ?>
                                    <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Kinerja Pekerjaan Konstruksi</a>
                                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Kinerja Konsultan Perencana Konstruksi</a>
                                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Kinerja Konsultan Kajian/Studi/Sistem Informatika</a>
                                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Kinerja Konsultan Pengawas Konstruksi</a>
                                    <a class="nav-link" id="v-pills-jasa_lainya-tab" data-toggle="pill" href="#v-pills-jasa_lainya" role="tab" aria-controls="v-pills-jasa_lainya" aria-selected="false">Kinerja Jasa Lainya</a>
                                    <a class="nav-link" id="v-pills-penyedia_barang-tab" data-toggle="pill" href="#v-pills-penyedia_barang" role="tab" aria-controls="v-pills-penyedia_barang" aria-selected="false">Kinerja Penyedia Barang</a>
                                <?php  } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <!-- INI PEKERJAAN KONTRUKSI -->
                        <?php if ($data_pemenang['status_jenis_penilayan'] == 'kontruksi') { ?>
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <?php  } else { ?>
                                <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <?php  } ?>
                                <div class="card" style="box-shadow: 2px 2px 10px 2px black;">
                                    <div class="card-header btn-grad">
                                        <i class="fas fa-chart-line"></i> Penilaian Kinerja Pekerjaan Konstruksi
                                    </div>
                                    <div class="card-body">
                                        <div style="overflow-x: auto;">
                                            <table class="table" style="font-size: 12px;">
                                                <tr>
                                                    <th>Kode Tender</th>
                                                    <th>: <?= $data_pemenang['kode_tender'] ?></th>
                                                </tr>
                                                <tr>
                                                    <th>Nama Paket</th>
                                                    <th>: <?= $data_pemenang['nama_paket'] ?></th>
                                                </tr>
                                                <tr>
                                                    <th>Divisi</th>
                                                    <th>: <?= $data_pemenang['nama_unit_kerja'] ?></th>
                                                </tr>
                                                <tr>
                                                    <th>Nama Vendor</th>
                                                    <th>: <?= $data_pemenang['username_vendor'] ?></th>
                                                </tr>
                                                <tr>
                                                    <th>Alamat Perusahaan</th>
                                                    <?php if ($data_pemenang['alamat_vendor'] == null) { ?>
                                                        <th>: <?= $data_pemenang['alamat_usaha'] ?></th>
                                                    <?php  } else { ?>
                                                        <th>: <?= $data_pemenang['alamat_vendor'] ?></th>
                                                    <?php } ?>
                                                </tr>
                                                <?php $no = 1;
                                                foreach ($lokasi_kerja as $key => $value) { ?>
                                                    <tr>
                                                        <th>Lokasi Pekerjaan <?= $no++ ?></th>
                                                        <th>: Provinsi : <?= $value['nama_provinsi'] ?>
                                                            <br> : Kabupaten : <?= $value['nama_kabupaten'] ?>
                                                            <br> : Alamat : <?= $value['detail_lokasi'] ?>
                                                        </th>
                                                    </tr>
                                                <?php } ?>
                                                <tr>
                                                    <th>Nilai Kontrak</th>
                                                    <th>: <?= "Rp " . number_format($data_pemenang['negosiasi'], 2, ',', '.') ?></th>
                                                </tr>
                                                <tr>
                                                    <th>Nomor Kontrak</th>
                                                    <th>&nbsp;
                                                        <div class="row">
                                                            <input style="width: 200px;height:30px" type="text" name="nomor_kontrak1" value="<?= $data_pemenang['nomor_kontrak'] ?>" id="nomor_kontrak1" placeholder="Nomor Kontrak..." class="form-control form-control-sm ml-2"><input style="width: 200px;height:30px" type="text" name="tanggal_nomor_kontak1" value="<?= $data_pemenang['tanggal_nomor_kontak'] ?>" id="tanggal_nomor_kontak1" placeholder="Tanggal" class="form-control form-control-sm ml-1">
                                                        </div>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>Jangka Waktu Pelaksanaan</th>
                                                    <th>
                                                        <div class="row">
                                                            <input style="width: 200px;height:30px" type="text" name="jangka_mulai1" placeholder="Tanggal Mulai" value="<?= $data_pemenang['jangka_mulai'] ?>" id="jangka_mulai1" class="form-control form-control-sm ml-2 mr-1"><label for="" class="text-small mt-1">S/D</label> <input style="width: 200px;height:30px" type="text" value="<?= $data_pemenang['jangka_selesai'] ?>" name="jangka_selesai1" id="jangka_selesai1" placeholder="Tanggal Selesai" class="form-control form-control-sm ml-1">
                                                        </div>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>Metode Pemilihan</th>
                                                    <th>: <?= $data_pemenang['nama_metode_pemilihan'] ?></th>
                                                </tr>
                                            </table><br>
                                            <?php if ($data_pemenang['status_warning_vendor'] == 1) { ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <img src="<?= base_url('assets/img/warning.png') ?>" width="70px" alt="">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <label for="">Vendor Telah Memiliki 1 Kali Warning Maka Jika Vendor Mendapatkan Warning ke-2 Vendor Akan Di Blacklist Otomatis Oleh Sistem Selama 2 Tahun !!!</label>
                                                        </div>
                                                    </div>

                                                </div>
                                            <?php } else if ($data_pemenang['status_warning_vendor'] == 2) { ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <img src="<?= base_url('assets/img/blacklist.png') ?>" width="70px" alt="">
                                                    <label for="">Vendor Telah TerBlacklist Oleh Sistem Selama 2 Tahun !!!</label>
                                                </div>
                                            <?php   } else { ?>
                                                <div class="alert alert-success" role="alert">
                                                    <img src="<?= base_url('assets/img/aman2.png') ?>" width="70px" alt="">
                                                    <label for="">Vendor Ini Aman / Tiadak Memiliki Warning !!!</label>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="card" style="box-shadow: 2px 2px 10px 2px black;">
                                    <div class="card-header btn-grad">
                                        <i class="fas fa-chart-line"></i> Table Penilaian Kinerja Pekerjaan Konstruksi
                                    </div>
                                    <div class="card-body">
                                        <div style="overflow-x: auto;">
                                            <form action="" id="form_tambah_pekerjaan_kontruksi">
                                                <input type="hidden" name="id_paket" value="<?= $data_pemenang['id_paket'] ?>">
                                                <input type="hidden" name="id_vendor" value="<?= $data_pemenang['id_mengikuti_vendor'] ?>">
                                                <table id="nilai_tbl" class="table table-bordered">
                                                    <tr class="btn-grad">
                                                        <th>No</th>
                                                        <th>Aspek Kerja</th>
                                                        <th>Indikator</th>
                                                        <th>Bobot(%)</th>
                                                        <th>Penilaian</th>
                                                        <th>Nilai Akhir</th>
                                                    </tr>
                                                    <tr>

                                                        <td rowspan="3">1</td>
                                                        <td rowspan="3">Administrasi
                                                            (20%)</td>
                                                        <!-- ketika update  -->
                                                        <?php if ($cek_jika_ada_pekerjaan_kontruksi_aspek1) { ?>
                                                            <td>
                                                                <?= $indikator1 ?>
                                                                <textarea id="indikator_pekerjaan_kontruksi_update1" hidden name="indikator_pekerjaan_kontruksi_update[]"><?= $indikator1 ?></textarea>
                                                            </td>
                                                            <td>10
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi_update1" name="bobot_pekerjaan_kontruksi_update[]" value="<?= $boobot_pekerjaan_kontruksi1 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek1['penilaian_kontruksi_detail'] ?>" id="penilaian_kontruksi_update1" name="penilaian_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek1['nilai_akhir_pekerjaan_kontruksi_detail'] ?>" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek1['nilai_akhir_pekerjaan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_kontruksi_update[]" id="nilai_akhir_pekerjaan_kontruksi_aspek_update1" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                            <!-- ketika tambah -->
                                                        <?php } else { ?>
                                                            <td>
                                                                <?= $indikator1 ?>
                                                                <textarea id="indikator_pekerjaan_kontruksi1" hidden name="indikator_pekerjaan_kontruksi[]"><?= $indikator1 ?></textarea>
                                                            </td>
                                                            <td>10
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi1" name="bobot_pekerjaan_kontruksi[]" value="<?= $boobot_pekerjaan_kontruksi1 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" id="penilaian_kontruksi1" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_pekerjaan_kontruksi_aspek1" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                        <?php   } ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if ($cek_jika_ada_pekerjaan_kontruksi_aspek2) { ?>
                                                            <td>
                                                                <?= $indikator2 ?>
                                                                <textarea id="indikator_pekerjaan_kontruksi_update2" name="indikator_pekerjaan_kontruksi_update[]" hidden><?= $indikator2 ?>
                                                    </textarea>
                                                            </td>
                                                            <td>5
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi_update2" name="bobot_pekerjaan_kontruksi_update[]" value="<?= $boobot_pekerjaan_kontruksi2 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek2['penilaian_kontruksi_detail'] ?>" id="penilaian_kontruksi_update2" name="penilaian_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek2['nilai_akhir_pekerjaan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_kontruksi_update[]" id="nilai_akhir_pekerjaan_kontruksi_aspek_update2" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                        <?php    } else { ?>
                                                            <td>
                                                                <?= $indikator2 ?>
                                                                <textarea id="indikator_pekerjaan_kontruksi2" name="indikator_pekerjaan_kontruksi[]" hidden><?= $indikator2 ?>
                                                    </textarea>
                                                            </td>
                                                            <td>5
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi2" name="bobot_pekerjaan_kontruksi[]" value="<?= $boobot_pekerjaan_kontruksi2 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" id="penilaian_kontruksi2" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_pekerjaan_kontruksi_aspek2" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                        <?php   } ?>


                                                    </tr>
                                                    <tr>
                                                        <?php if ($cek_jika_ada_pekerjaan_kontruksi_aspek3) { ?>
                                                            <td><?= $indikator3 ?>
                                                                <textarea hidden id="indikator_pekerjaan_kontruksi_update3" name="indikator_pekerjaan_kontruksi_update[]"><?= $indikator3 ?></textarea>
                                                            </td>
                                                            <td>5
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi_update3" name="bobot_pekerjaan_kontruksi_update[]" value="<?= $boobot_pekerjaan_kontruksi3 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek3['penilaian_kontruksi_detail'] ?>" id="penilaian_kontruksi_update3" name="penilaian_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type=" text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek3['nilai_akhir_pekerjaan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_kontruksi_update[]" id="nilai_akhir_pekerjaan_kontruksi_aspek_update3" class="form-control form-control-sm" readonly style="width: 60px;">
                                                            </td>
                                                        <?php    } else { ?>
                                                            <td><?= $indikator3 ?>
                                                                <textarea hidden id="indikator_pekerjaan_kontruksi3" name="indikator_pekerjaan_kontruksi[]"><?= $indikator3 ?></textarea>
                                                            </td>
                                                            <td>5
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi3" name="bobot_pekerjaan_kontruksi[]" value="<?= $boobot_pekerjaan_kontruksi3 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" id="penilaian_kontruksi3" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type=" text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_pekerjaan_kontruksi_aspek3" class="form-control form-control-sm" readonly style="width: 60px;">
                                                            </td>
                                                        <?php   } ?>
                                                    </tr>
                                                    <!-- Kedua -->
                                                    <tr>

                                                        <td rowspan="2">2</td>
                                                        <td rowspan="2">Jadwal Dan
                                                            Waktu (10%)</td>


                                                        <?php if ($cek_jika_ada_pekerjaan_kontruksi_aspek4) { ?>
                                                            <td><?= $indikator4 ?>
                                                                <textarea hidden id="indikator_pekerjaan_kontruksi_update4" name="indikator_pekerjaan_kontruksi_update[]"><?= $indikator4 ?></textarea>
                                                            </td>
                                                            <td>5
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi_update4" name="bobot_pekerjaan_kontruksi_update[]" value="<?= $boobot_pekerjaan_kontruksi4 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek4['penilaian_kontruksi_detail'] ?>" id="penilaian_kontruksi_update4" name="penilaian_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type=" text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek4['nilai_akhir_pekerjaan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_kontruksi_update[]" id="nilai_akhir_pekerjaan_kontruksi_aspek_update4" class="form-control form-control-sm" readonly style="width: 60px;">
                                                            </td>
                                                        <?php    } else { ?>
                                                            <td><?= $indikator4 ?>
                                                                <textarea hidden id="indikator_pekerjaan_kontruksi4" name="indikator_pekerjaan_kontruksi[]"><?= $indikator4 ?></textarea>
                                                            </td>
                                                            <td>5
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi4" name="bobot_pekerjaan_kontruksi[]" value="<?= $boobot_pekerjaan_kontruksi4 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" id="penilaian_kontruksi4" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type=" text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_pekerjaan_kontruksi_aspek4" class="form-control form-control-sm" readonly style="width: 60px;">
                                                            </td>
                                                        <?php   } ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if ($cek_jika_ada_pekerjaan_kontruksi_aspek5) { ?>

                                                            <td><?= $indikator5 ?>
                                                                <textarea hidden id="indikator_pekerjaan_kontruksi_update5" name="indikator_pekerjaan_kontruksi_update[]"><?= $indikator5 ?></textarea>
                                                            </td>
                                                            <td>5
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi_update5" name="bobot_pekerjaan_kontruksi_update[]" value="<?= $boobot_pekerjaan_kontruksi5 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek5['penilaian_kontruksi_detail'] ?>" id="penilaian_kontruksi_update5" name="penilaian_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek5['nilai_akhir_pekerjaan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_kontruksi_update[]" id="nilai_akhir_pekerjaan_kontruksi_aspek_update5" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                        <?php    } else { ?>
                                                            <td><?= $indikator5 ?>
                                                                <textarea hidden id="indikator_pekerjaan_kontruksi5" name="indikator_pekerjaan_kontruksi[]"><?= $indikator5 ?></textarea>
                                                            </td>
                                                            <td>5
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi5" name="bobot_pekerjaan_kontruksi[]" value="<?= $boobot_pekerjaan_kontruksi5 ?>">
                                                            </td>
                                                            <td>

                                                                <input type="text" id="penilaian_kontruksi5" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_pekerjaan_kontruksi_aspek5" class="form-control form-control-sm" readonly style="width: 60px;"></td>

                                                        <?php   } ?>
                                                    </tr>
                                                    <!-- Ketiga -->
                                                    <tr>

                                                        <td rowspan="3">3</td>
                                                        <td rowspan="3">Kualitas Dan Kuantitas
                                                            (25%)
                                                        </td>
                                                        <?php if ($cek_jika_ada_pekerjaan_kontruksi_aspek6) { ?>
                                                            <td><?= $indikator6 ?>
                                                                <textarea hidden id="indikator_pekerjaan_kontruksi_update6" name="indikator_pekerjaan_kontruksi_update[]"><?= $indikator6 ?></textarea>
                                                            </td>
                                                            <td>5
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi_update6" name="bobot_pekerjaan_kontruksi_update[]" value="<?= $boobot_pekerjaan_kontruksi6 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek6['penilaian_kontruksi_detail'] ?>" id="penilaian_kontruksi_update6" name="penilaian_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek6['nilai_akhir_pekerjaan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_kontruksi_update[]" id="nilai_akhir_pekerjaan_kontruksi_aspek_update6" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                        <?php    } else { ?>
                                                            <td><?= $indikator6 ?>
                                                                <textarea hidden id="indikator_pekerjaan_kontruksi6" name="indikator_pekerjaan_kontruksi[]"><?= $indikator6 ?></textarea>
                                                            </td>
                                                            <td>5
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi6" name="bobot_pekerjaan_kontruksi[]" value="<?= $boobot_pekerjaan_kontruksi6 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" id="penilaian_kontruksi6" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_pekerjaan_kontruksi_aspek6" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                        <?php   } ?>

                                                    </tr>
                                                    <tr>

                                                        <?php if ($cek_jika_ada_pekerjaan_kontruksi_aspek7) { ?>
                                                            <td><?= $indikator7 ?>
                                                                <textarea hidden id="indikator_pekerjaan_kontruksi_update7" name="indikator_pekerjaan_kontruksi_update[]"><?= $indikator7 ?></textarea>
                                                            </td>
                                                            <td>10
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi_update7" name="bobot_pekerjaan_kontruksi_update[]" value="<?= $boobot_pekerjaan_kontruksi7 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek7['penilaian_kontruksi_detail'] ?>" id="penilaian_kontruksi_update7" name="penilaian_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek7['nilai_akhir_pekerjaan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_kontruksi_update[]" id="nilai_akhir_pekerjaan_kontruksi_aspek_update7" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                        <?php    } else { ?>
                                                            <td><?= $indikator7 ?>
                                                                <textarea hidden id="indikator_pekerjaan_kontruksi7" name="indikator_pekerjaan_kontruksi[]"><?= $indikator7 ?></textarea>
                                                            </td>
                                                            <td>10
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi7" name="bobot_pekerjaan_kontruksi[]" value="<?= $boobot_pekerjaan_kontruksi7 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" id="penilaian_kontruksi7" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_pekerjaan_kontruksi_aspek7" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                        <?php   } ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if ($cek_jika_ada_pekerjaan_kontruksi_aspek8) { ?>

                                                            <td><?= $indikator8 ?>
                                                                <textarea hidden id="indikator_pekerjaan_kontruksi_update8" name="indikator_pekerjaan_kontruksi_update[]"><?= $indikator8 ?></textarea>
                                                            </td>
                                                            <td>10
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi_update8" name="bobot_pekerjaan_kontruksi_update[]" value="<?= $boobot_pekerjaan_kontruksi8 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek8['penilaian_kontruksi_detail'] ?>" id="penilaian_kontruksi_update8" name="penilaian_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek8['nilai_akhir_pekerjaan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_kontruksi_update[]" id="nilai_akhir_pekerjaan_kontruksi_aspek_update8" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                        <?php    } else { ?>
                                                            <td><?= $indikator8 ?>
                                                                <textarea hidden id="indikator_pekerjaan_kontruksi8" name="indikator_pekerjaan_kontruksi[]"><?= $indikator8 ?></textarea>
                                                            </td>
                                                            <td>10
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi8" name="bobot_pekerjaan_kontruksi[]" value="<?= $boobot_pekerjaan_kontruksi8 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" id="penilaian_kontruksi8" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_pekerjaan_kontruksi_aspek8" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                        <?php   } ?>
                                                    </tr>
                                                    <!-- Ke empat -->
                                                    <tr>

                                                        <td rowspan="2">4</td>
                                                        <td rowspan="2">Material
                                                            (10%)
                                                        </td>
                                                        <?php if ($cek_jika_ada_pekerjaan_kontruksi_aspek9) { ?>
                                                            <td><?= $indikator9 ?>
                                                                <textarea hidden id="indikator_pekerjaan_kontruksi_update9" name="indikator_pekerjaan_kontruksi_update[]"><?= $indikator9 ?></textarea>
                                                            </td>
                                                            <td>5
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi_update9" name="bobot_pekerjaan_kontruksi_update[]" value="<?= $boobot_pekerjaan_kontruksi9 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek9['penilaian_kontruksi_detail'] ?>" id="penilaian_kontruksi_update9" name="penilaian_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek9['nilai_akhir_pekerjaan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_kontruksi_update[]" id="nilai_akhir_pekerjaan_kontruksi_aspek_update9" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                        <?php    } else { ?>
                                                            <td><?= $indikator9 ?>
                                                                <textarea hidden id="indikator_pekerjaan_kontruksi9" name="indikator_pekerjaan_kontruksi[]"><?= $indikator9 ?></textarea>
                                                            </td>
                                                            <td>5
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi9" name="bobot_pekerjaan_kontruksi[]" value="<?= $boobot_pekerjaan_kontruksi9 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" id="penilaian_kontruksi9" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_pekerjaan_kontruksi_aspek9" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                        <?php   } ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if ($cek_jika_ada_pekerjaan_kontruksi_aspek10) { ?>
                                                            <td><?= $indikator10 ?>
                                                                <textarea hidden id="indikator_pekerjaan_kontruksi_update10" name="indikator_pekerjaan_kontruksi_update[]"><?= $indikator10 ?></textarea>
                                                            </td>
                                                            <td>5
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi_update10" name="bobot_pekerjaan_kontruksi_update[]" value="<?= $boobot_pekerjaan_kontruksi10 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek10['penilaian_kontruksi_detail'] ?>" id="penilaian_kontruksi_update10" name="penilaian_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek10['nilai_akhir_pekerjaan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_kontruksi_update[]" id="nilai_akhir_pekerjaan_kontruksi_aspek_update10" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                        <?php    } else { ?>
                                                            <td><?= $indikator10 ?>
                                                                <textarea hidden id="indikator_pekerjaan_kontruksi10" name="indikator_pekerjaan_kontruksi[]"><?= $indikator10 ?></textarea>
                                                            </td>
                                                            <td>5
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi10" name="bobot_pekerjaan_kontruksi[]" value="<?= $boobot_pekerjaan_kontruksi10 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" id="penilaian_kontruksi10" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_pekerjaan_kontruksi_aspek10" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                        <?php   } ?>
                                                    </tr>

                                                    <!-- Ke lima -->
                                                    <tr>

                                                        <td rowspan="3">5</td>
                                                        <td rowspan="3">Tenaga Kerja dan Peralatan (15%)
                                                        </td>
                                                        <?php if ($cek_jika_ada_pekerjaan_kontruksi_aspek11) { ?>
                                                            <td><?= $indikator11 ?>
                                                                <textarea hidden id="indikator_pekerjaan_kontruksi_update11" name="indikator_pekerjaan_kontruksi_update[]"><?= $indikator11 ?></textarea>
                                                            </td>
                                                            <td>5
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi_update11" name="bobot_pekerjaan_kontruksi_update[]" value="<?= $boobot_pekerjaan_kontruksi11 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek11['penilaian_kontruksi_detail'] ?>" id="penilaian_kontruksi_update11" name="penilaian_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek11['nilai_akhir_pekerjaan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_kontruksi_update[]" id="nilai_akhir_pekerjaan_kontruksi_aspek_update11" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                        <?php    } else { ?>
                                                            <td><?= $indikator11 ?>
                                                                <textarea hidden id="indikator_pekerjaan_kontruksi11" name="indikator_pekerjaan_kontruksi[]"><?= $indikator11 ?></textarea>
                                                            </td>
                                                            <td>5
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi11" name="bobot_pekerjaan_kontruksi[]" value="<?= $boobot_pekerjaan_kontruksi11 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" id="penilaian_kontruksi11" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_pekerjaan_kontruksi_aspek11" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                        <?php   } ?>

                                                    </tr>
                                                    <tr>
                                                        <?php if ($cek_jika_ada_pekerjaan_kontruksi_aspek12) { ?>
                                                            <td><?= $indikator12 ?>
                                                                <textarea hidden id="indikator_pekerjaan_kontruksi_update12" name="indikator_pekerjaan_kontruksi_update[]"><?= $indikator12 ?></textarea>
                                                            </td>
                                                            <td>5
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi_update12" name="bobot_pekerjaan_kontruksi_update[]" value="<?= $boobot_pekerjaan_kontruksi12 ?>">
                                                            </td>
                                                            <td>

                                                                <input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek12['penilaian_kontruksi_detail'] ?>" id="penilaian_kontruksi_update12" name="penilaian_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek12['nilai_akhir_pekerjaan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_kontruksi_update[]" id="nilai_akhir_pekerjaan_kontruksi_aspek_update12" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                        <?php    } else { ?>
                                                            <td><?= $indikator12 ?>
                                                                <textarea hidden id="indikator_pekerjaan_kontruksi12" name="indikator_pekerjaan_kontruksi[]"><?= $indikator12 ?></textarea>
                                                            </td>
                                                            <td>5
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi12" name="bobot_pekerjaan_kontruksi[]" value="<?= $boobot_pekerjaan_kontruksi12 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" id="penilaian_kontruksi12" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_pekerjaan_kontruksi_aspek12" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                        <?php   } ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if ($cek_jika_ada_pekerjaan_kontruksi_aspek13) { ?>
                                                            <td><?= $indikator13 ?>
                                                                <textarea hidden id="indikator_pekerjaan_kontruksi_update13" name="indikator_pekerjaan_kontruksi_update[]"><?= $indikator13 ?></textarea>
                                                            </td>
                                                            <td>5
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi_update13" name="bobot_pekerjaan_kontruksi_update[]" value="<?= $boobot_pekerjaan_kontruksi13 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek13['penilaian_kontruksi_detail'] ?>" id="penilaian_kontruksi_update13" name="penilaian_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek13['nilai_akhir_pekerjaan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_kontruksi_update[]" id="nilai_akhir_pekerjaan_kontruksi_aspek_update13" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                        <?php    } else { ?>
                                                            <td><?= $indikator13 ?>
                                                                <textarea hidden id="indikator_pekerjaan_kontruksi13" name="indikator_pekerjaan_kontruksi[]"><?= $indikator13 ?></textarea>
                                                            </td>
                                                            <td>5
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi13" name="bobot_pekerjaan_kontruksi[]" value="<?= $boobot_pekerjaan_kontruksi13 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" id="penilaian_kontruksi13" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_pekerjaan_kontruksi_aspek13" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                        <?php   } ?>
                                                    </tr>

                                                    <!-- Ke enam -->
                                                    <tr>

                                                        <td rowspan="2">4</td>
                                                        <td rowspan="2">Keselamatan dan Kesehatan Kerja (10%)
                                                        </td>
                                                        <?php if ($cek_jika_ada_pekerjaan_kontruksi_aspek14) { ?>
                                                            <td><?= $indikator14 ?>
                                                                <textarea hidden id="indikator_pekerjaan_kontruksi_update14" name="indikator_pekerjaan_kontruksi_update[]"><?= $indikator14 ?></textarea>
                                                            </td>
                                                            <td>5
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi_update14" name="bobot_pekerjaan_kontruksi_update[]" value="<?= $boobot_pekerjaan_kontruksi14 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek14['penilaian_kontruksi_detail'] ?>" id="penilaian_kontruksi_update14" name="penilaian_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek14['nilai_akhir_pekerjaan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_kontruksi_update[]" id="nilai_akhir_pekerjaan_kontruksi_aspek_update14" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                        <?php    } else { ?>
                                                            <td><?= $indikator14 ?>
                                                                <textarea hidden id="indikator_pekerjaan_kontruksi14" name="indikator_pekerjaan_kontruksi[]"><?= $indikator14 ?></textarea>
                                                            </td>
                                                            <td>5
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi14" name="bobot_pekerjaan_kontruksi[]" value="<?= $boobot_pekerjaan_kontruksi14 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" id="penilaian_kontruksi14" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_pekerjaan_kontruksi_aspek14" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                        <?php   } ?>
                                                    </tr>
                                                    <tr>

                                                        <?php if ($cek_jika_ada_pekerjaan_kontruksi_aspek15) { ?>
                                                            <td><?= $indikator15 ?>
                                                                <textarea hidden id="indikator_pekerjaan_kontruksi_update15" name="indikator_pekerjaan_kontruksi_update[]"><?= $indikator15 ?></textarea>
                                                            </td>
                                                            <td>5
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi_update15" name="bobot_pekerjaan_kontruksi_update[]" value="<?= $boobot_pekerjaan_kontruksi15 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek15['penilaian_kontruksi_detail'] ?>" id="penilaian_kontruksi_update15" name="penilaian_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek15['nilai_akhir_pekerjaan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_kontruksi_update[]" id="nilai_akhir_pekerjaan_kontruksi_aspek_update15" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                        <?php    } else { ?>
                                                            <td><?= $indikator15 ?>
                                                                <textarea hidden id="indikator_pekerjaan_kontruksi15" name="indikator_pekerjaan_kontruksi[]"><?= $indikator15 ?></textarea>
                                                            </td>
                                                            <td>5
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi15" name="bobot_pekerjaan_kontruksi[]" value="<?= $boobot_pekerjaan_kontruksi15 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" id="penilaian_kontruksi15" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_pekerjaan_kontruksi_aspek15" class="form-control form-control-sm" readonly style="width: 60px;"></td>

                                                        <?php   } ?>
                                                    </tr>


                                                    <!-- Ke tuju -->
                                                    <tr>

                                                        <td rowspan="2">7</td>
                                                        <td rowspan="2">Lingkungan
                                                            (10%)
                                                        </td>
                                                        <?php if ($cek_jika_ada_pekerjaan_kontruksi_aspek16) { ?>
                                                            <td><?= $indikator16 ?>
                                                                <textarea hidden id="indikator_pekerjaan_kontruksi_update16" name="indikator_pekerjaan_kontruksi_update[]"><?= $indikator16 ?></textarea>
                                                            </td>
                                                            <td>5
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi_update16" name="bobot_pekerjaan_kontruksi_update[]" value="<?= $boobot_pekerjaan_kontruksi16 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek16['penilaian_kontruksi_detail'] ?>" id="penilaian_kontruksi_update16" name="penilaian_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek16['nilai_akhir_pekerjaan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_kontruksi_update[]" id="nilai_akhir_pekerjaan_kontruksi_aspek_update16" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                        <?php    } else { ?>
                                                            <td><?= $indikator16 ?>
                                                                <textarea hidden id="indikator_pekerjaan_kontruksi16" name="indikator_pekerjaan_kontruksi[]"><?= $indikator16 ?></textarea>
                                                            </td>
                                                            <td>5
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi16" name="bobot_pekerjaan_kontruksi[]" value="<?= $boobot_pekerjaan_kontruksi16 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" id="penilaian_kontruksi16" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_pekerjaan_kontruksi_aspek16" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                        <?php   } ?>
                                                    </tr>
                                                    <tr>

                                                        <?php if ($cek_jika_ada_pekerjaan_kontruksi_aspek17) { ?>
                                                            <td><?= $indikator17 ?>
                                                                <textarea hidden id="indikator_pekerjaan_kontruksi_update17" name="indikator_pekerjaan_kontruksi_update[]"><?= $indikator17 ?></textarea>
                                                            </td>
                                                            <td>5
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi_update17" name="bobot_pekerjaan_kontruksi_update[]" value="<?= $boobot_pekerjaan_kontruksi17 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek17['penilaian_kontruksi_detail'] ?>" id="penilaian_kontruksi_update17" name="penilaian_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_kontruksi_aspek17['nilai_akhir_pekerjaan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_kontruksi_update[]" id="nilai_akhir_pekerjaan_kontruksi_aspek_update17" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                        <?php    } else { ?>
                                                            <td><?= $indikator17 ?>
                                                                <textarea hidden id="indikator_pekerjaan_kontruksi17" name="indikator_pekerjaan_kontruksi[]"><?= $indikator17 ?></textarea>
                                                            </td>
                                                            <td>5
                                                                <input type="hidden" id="bobot_pekerjaan_kontruksi17" name="bobot_pekerjaan_kontruksi[]" value="<?= $boobot_pekerjaan_kontruksi17 ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" id="penilaian_kontruksi17" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                            </td>
                                                            <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_pekerjaan_kontruksi_aspek17" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                        <?php   } ?>
                                                    </tr>
                                                    <?php if ($jika_sudah_di_tambah_pekerjaan_kontruksi) { ?>
                                                        <?php foreach ($jika_sudah_di_tambah_pekerjaan_kontruksi as $key => $value) { ?>
                                                            <input type="hidden" name="id_penilaian_pekerjaan_kontruksi_detail[]" value="<?= $value['id_penilaian_pekerjaan_kontruksi_detail'] ?>">
                                                        <?php } ?>
                                                        <tfoot>
                                                            <tr class="text-center">
                                                                <td></td>
                                                                <td><b> RATING </b></td>
                                                                <td>
                                                                    <div id="status_pekerjaan_kontruksi_update">
                                                                        <?php if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 51) { ?>
                                                                            <label for="" class="badge badge-danger">kurang Baik</label>
                                                                        <?php   } else if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 70) { ?>
                                                                            <label for="" class="badge badge-warning">cukup Baik</label>
                                                                        <?php } else if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 80) { ?>
                                                                            <label for="" class="badge badge-warning">Baik</label>
                                                                        <?php  } else { ?>
                                                                            <label for="" class="badge badge-success">Sangat Baik</label>
                                                                        <?php   } ?>

                                                                    </div>
                                                                </td>
                                                                <td colspan="3">
                                                                    <div id="bintang_pekerjaan_kontruksi_update">
                                                                        <?php if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 51) { ?>
                                                                            ''
                                                                        <?php   } else if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 70) { ?>
                                                                            <i class="fas fa fa-star text-warning"></i>
                                                                        <?php } else if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 80) { ?>
                                                                            <i class="fas fa fa-star text-warning"></i><i class="fas fa fa-star text-warning"></i>
                                                                        <?php  } else { ?>
                                                                            <i class="fas fa fa-star text-warning"></i> <i class="fas fa fa-star text-warning"></i> <i class="fas fa fa-star text-warning"></i>
                                                                        <?php   } ?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                        <tfoot>
                                                            <tr class="text-center">
                                                                <td></td>
                                                                <td colspan="2"><b> TOTAL NILAI AKHIR </b></td>
                                                                <td><b>100</b></td>
                                                                <td></td>
                                                                <td><input type="number" style="width: 80px;" class="form-control form-control-sm" readonly value="<?= $vendor_mengikuti_paket['rating_nilai_akhir'] ?>" id="total_nilai_pekerjaan_kontruksi_update"></td>
                                                            </tr>
                                                        </tfoot>

                                                        <br>
                                                </table>
                                            </form>
                                        </div><br>
                                        <center>
                                            <div class="row">
                                                <div class="col">
                                                    <a class="btn btn-grad7 text-white btn-sm btn-block" style="box-shadow: 2px 2px 8px 2px black;" href="<?= base_url('beranda/penilaian_kinerja') ?>"><i class="fas fa fa-arrow-left"></i> Kembali</a>
                                                </div>
                                                <div class="col">
                                                    <div> <button type="button" onclick="Reset_nilai_pekerjaan_kontruksi()" class="btn btn-danger text-white btn-sm btn-block">Reset Penilaian</button></div>
                                                </div>
                                            </div>
                                        </center>
                                    <?php    } else { ?>
                                        <input type="hidden" name="rating_penilaian_vendor_pekerjaan_kontruksi">
                                        <input type="hidden" name="status_rating_pekerjaan_kontruksi">
                                        <input type="hidden" name="status_nilai_akhir_pekerjaan_kontruksi">
                                        <tfoot>
                                            <tr class="text-center">
                                                <td></td>
                                                <td><b> RATING </b></td>
                                                <td>
                                                    <div id="status_pekerjaan_kontruksi">

                                                    </div>
                                                </td>
                                                <td colspan="3">
                                                    <div id="bintang_pekerjaan_kontruksi"></div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                        <tfoot>
                                            <tr class="text-center">
                                                <td></td>
                                                <td colspan="2"><b> TOTAL NILAI AKHIR </b></td>
                                                <td><b>100</b></td>
                                                <td></td>
                                                <td><input type="number" style="width: 80px;" class="form-control form-control-sm" readonly id="total_nilai_pekerjaan_kontruksi"></td>
                                            </tr>
                                        </tfoot>

                                        <br>
                                        </table>
                                        </form>
                                    </div><br>
                                    <center>
                                        <div class="row">
                                            <div class="col">
                                                <a class="btn btn-grad7 text-white btn-sm btn-block" style="box-shadow: 2px 2px 8px 2px black;" href="<?= base_url('beranda/penilaian_kinerja') ?>"><i class="fas fa fa-arrow-left"></i> Kembali</a>
                                            </div>
                                            <div class="col">
                                                <div id="save_button" style="display: none;"> <button type="button" onclick="Simpan_pekerjaan_kontruksi()" class="btn btn-grad8 text-white btn-sm btn-block">Simpan Penilaian</button></div>
                                                <div id="warning_button" style="display: none;"> <button type="button" onclick="Simpan_Warning_pekerjaan_kontruksi_warning()" class="btn btn-grad10 text-white btn-sm btn-block">warning Penilaian</button></div>
                                            </div>
                                        </div>
                                    </center>
                                <?php   } ?>
                                </div>
                                </div>
                            </div>
                            <!-- END PEKERJAAN KONTRUKSI -->





                            <!-- INI KONSULTAN PRENCANAAN KONTRUKSI -->
                            <?php if ($data_pemenang['status_jenis_penilayan'] == 'konsultan kontruksi') { ?>
                                <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <?php  } else { ?>
                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <?php  } ?>
                                    <div class="card" style="box-shadow: 2px 2px 10px 2px black;">
                                        <div class="card-header btn-grad">
                                            <i class="fas fa-chart-line"></i> Penilaian Kinerja Konsultan Perencana Konstruksi
                                        </div>
                                        <div class="card-body">
                                            <div style="overflow-x: auto;">
                                                <table class="table" style="font-size: 12px;">
                                                    <tr>
                                                        <th>Kode Tender</th>
                                                        <th>: <?= $data_pemenang['kode_tender'] ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Nama Paket</th>
                                                        <th>: <?= $data_pemenang['nama_paket'] ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Divisi</th>
                                                        <th>: <?= $data_pemenang['nama_unit_kerja'] ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Nama Vendor</th>
                                                        <th>: <?= $data_pemenang['username_vendor'] ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Alamat Perusahaan</th>
                                                        <?php if ($data_pemenang['alamat_vendor'] == null) { ?>
                                                            <th>: <?= $data_pemenang['alamat_usaha'] ?></th>
                                                        <?php  } else { ?>
                                                            <th>: <?= $data_pemenang['alamat_vendor'] ?></th>
                                                        <?php } ?>
                                                    </tr>
                                                    <?php $no = 1;
                                                    foreach ($lokasi_kerja as $key => $value) { ?>
                                                        <tr>
                                                            <th>Lokasi Pekerjaan <?= $no++ ?></th>
                                                            <th>: Provinsi : <?= $value['nama_provinsi'] ?>
                                                                <br> : Kabupaten : <?= $value['nama_kabupaten'] ?>
                                                                <br> : Alamat : <?= $value['detail_lokasi'] ?>
                                                            </th>
                                                        </tr>
                                                    <?php } ?>
                                                    <tr>
                                                        <th>Nilai Kontrak</th>
                                                        <th>: <?= "Rp " . number_format($data_pemenang['negosiasi'], 2, ',', '.') ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Nomor Kontrak</th>
                                                        <th>&nbsp;
                                                            <div class="row">
                                                                <input style="width: 200px;height:30px" type="text" name="nomor_kontrak2" value="<?= $data_pemenang['nomor_kontrak'] ?>" id="nomor_kontrak2" placeholder="Nomor Kontrak..." class="form-control form-control-sm ml-2"><input style="width: 200px;height:30px" type="text" name="tanggal_nomor_kontak2" value="<?= $data_pemenang['tanggal_nomor_kontak'] ?>" id="tanggal_nomor_kontak2" placeholder="Tanggal" class="form-control form-control-sm ml-1">
                                                            </div>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>Jangka Waktu Pelaksanaan</th>
                                                        <th>
                                                            <div class="row">
                                                                <input style="width: 200px;height:30px" type="text" name="jangka_mulai2" placeholder="Tanggal Mulai" value="<?= $data_pemenang['jangka_mulai'] ?>" id="jangka_mulai2" class="form-control form-control-sm ml-2 mr-1"><label for="" class="text-small mt-1">S/D</label> <input style="width: 200px;height:30px" type="text" value="<?= $data_pemenang['jangka_selesai'] ?>" name="jangka_selesai2" id="jangka_selesai2" placeholder="Tanggal Selesai" class="form-control form-control-sm ml-1">
                                                            </div>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>Metode Pemilihan</th>
                                                        <th>: <?= $data_pemenang['nama_metode_pemilihan'] ?></th>
                                                    </tr>
                                                </table><br>
                                                <?php if ($data_pemenang['status_warning_vendor'] == 1) { ?>
                                                    <div class="alert alert-warning" role="alert">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <img src="<?= base_url('assets/img/warning.png') ?>" width="70px" alt="">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <label for="">Vendor Telah Memiliki 1 Kali Warning Maka Jika Vendor Mendapatkan Warning ke-2 Vendor Akan Di Blacklist Otomatis Oleh Sistem Selama 2 Tahun !!!</label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                <?php } else if ($data_pemenang['status_warning_vendor'] == 2) { ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <img src="<?= base_url('assets/img/blacklist.png') ?>" width="70px" alt="">
                                                        <label for="">Vendor Telah TerBlacklist Oleh Sistem Selama 2 Tahun !!!</label>
                                                    </div>
                                                <?php   } else { ?>
                                                    <div class="alert alert-success" role="alert">
                                                        <img src="<?= base_url('assets/img/aman2.png') ?>" width="70px" alt="">
                                                        <label for="">Vendor Ini Aman / Tiadak Memiliki Warning !!!</label>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="card" style="box-shadow: 2px 2px 10px 2px black;">
                                        <div class="card-header btn-grad">
                                            <i class="fas fa-chart-line"></i> Table Penilaian Kinerja Konsultan Perencana Konstruksi
                                        </div>
                                        <div class="card-body">
                                            <div style="overflow-x: auto;">
                                                <form action="" id="form_tambah_pekerjaan_konsultan_kontruksi">
                                                    <input type="hidden" name="id_paket" value="<?= $data_pemenang['id_paket'] ?>">
                                                    <input type="hidden" name="id_vendor" value="<?= $data_pemenang['id_mengikuti_vendor'] ?>">
                                                    <table id="nilai_tbl" class="table table-bordered">
                                                        <tr class="btn-grad">
                                                            <th>No</th>
                                                            <th>Aspek Kerja</th>
                                                            <th>Indikator</th>
                                                            <th>Bobot(%)</th>
                                                            <th>Penilaian</th>
                                                            <th>Nilai Akhir</th>
                                                        </tr>
                                                        <tr>

                                                            <td rowspan="3">1</td>
                                                            <td rowspan="3">Administrasi
                                                                (15%)</td>
                                                            <!-- ketika update  -->
                                                            <?php if ($cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek1) { ?>
                                                                <td>
                                                                    <?= $indikator_pekerjaan_konsultan_kontruksi1 ?>
                                                                    <textarea id="indikator_pekerjaan_konsultan_kontruksi_update1" hidden name="indikator_pekerjaan_konsultan_kontruksi_update[]"><?= $indikator_pekerjaan_konsultan_kontruksi1 ?></textarea>
                                                                </td>
                                                                <td>5
                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_kontruksi_update1" name="bobot_pekerjaan_konsultan_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_kontruksi1 ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek1['penilaian_konsultan_kontruksi_detail'] ?>" id="penilaian_konsultan_kontruksi_update1" name="penilaian_konsultan_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                </td>
                                                                <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek1['nilai_akhir_pekerjaan_konsultan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_kontruksi_aspek_update1" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                <!-- ketika tambah -->
                                                            <?php } else { ?>
                                                                <td>
                                                                    <?= $indikator_pekerjaan_konsultan_kontruksi1 ?>
                                                                    <textarea id="indikator_pekerjaan_konsultan_kontruksi1" hidden name="indikator_pekerjaan_konsultan_kontruksi[]"><?= $indikator_pekerjaan_konsultan_kontruksi1 ?></textarea>
                                                                </td>
                                                                <td>5
                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_kontruksi1" name="bobot_pekerjaan_konsultan_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_kontruksi1 ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="penilaian_konsultan_kontruksi1" name="penilaian_konsultan_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                </td>
                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_kontruksi_aspek1" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                            <?php   } ?>
                                                        </tr>
                                                        <tr>
                                                            <?php if ($cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek2) { ?>
                                                                <td>
                                                                    <?= $indikator_pekerjaan_konsultan_kontruksi2 ?>
                                                                    <textarea id="indikator_pekerjaan_konsultan_kontruksi_update2" name="indikator_pekerjaan_konsultan_kontruksi_update[]" hidden><?= $indikator_pekerjaan_konsultan_kontruksi2 ?>
                                                    </textarea>
                                                                </td>
                                                                <td>5
                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_kontruksi_update2" name="bobot_pekerjaan_konsultan_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_kontruksi2 ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek2['penilaian_konsultan_kontruksi_detail'] ?>" id="penilaian_konsultan_kontruksi_update2" name="penilaian_konsultan_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                </td>
                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_kontruksi_update[]" value="<?= $cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek2['nilai_akhir_pekerjaan_konsultan_kontruksi_detail'] ?>" id="nilai_akhir_pekerjaan_konsultan_kontruksi_aspek_update2" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                            <?php    } else { ?>
                                                                <td>
                                                                    <?= $indikator_pekerjaan_konsultan_kontruksi2 ?>
                                                                    <textarea id="indikator_pekerjaan_konsultan_kontruksi2" name="indikator_pekerjaan_konsultan_kontruksi[]" hidden><?= $indikator_pekerjaan_konsultan_kontruksi2 ?>
                                                    </textarea>
                                                                </td>
                                                                <td>5
                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_kontruksi2" name="bobot_pekerjaan_konsultan_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_kontruksi2 ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="penilaian_konsultan_kontruksi2" name="penilaian_konsultan_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                </td>
                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_kontruksi_aspek2" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                            <?php   } ?>


                                                        </tr>
                                                        <tr>
                                                            <?php if ($cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek3) { ?>
                                                                <td><?= $indikator_pekerjaan_konsultan_kontruksi3 ?>
                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_kontruksi_update3" name="indikator_pekerjaan_konsultan_kontruksi_update[]"><?= $indikator_pekerjaan_konsultan_kontruksi3 ?></textarea>
                                                                </td>
                                                                <td>5
                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_kontruksi_update3" name="bobot_pekerjaan_konsultan_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_kontruksi3 ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek3['penilaian_konsultan_kontruksi_detail'] ?>" id="penilaian_konsultan_kontruksi_update3" name="penilaian_konsultan_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                </td>
                                                                <td><input type=" text" name="nilai_akhir_pekerjaan_konsultan_kontruksi_update[]" value="<?= $cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek3['nilai_akhir_pekerjaan_konsultan_kontruksi_detail'] ?>" id="nilai_akhir_pekerjaan_konsultan_kontruksi_aspek_update3" class="form-control form-control-sm" readonly style="width: 60px;">
                                                                </td>
                                                            <?php    } else { ?>
                                                                <td><?= $indikator_pekerjaan_konsultan_kontruksi3 ?>
                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_kontruksi3" name="indikator_pekerjaan_konsultan_kontruksi[]"><?= $indikator_pekerjaan_konsultan_kontruksi3 ?></textarea>
                                                                </td>
                                                                <td>5
                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_kontruksi3" name="bobot_pekerjaan_konsultan_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_kontruksi3 ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="penilaian_konsultan_kontruksi3" name="penilaian_konsultan_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                </td>
                                                                <td><input type=" text" name="nilai_akhir_pekerjaan_konsultan_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_kontruksi_aspek3" class="form-control form-control-sm" readonly style="width: 60px;">
                                                                </td>
                                                            <?php   } ?>
                                                        </tr>
                                                        <!-- Kedua -->
                                                        <tr>

                                                            <td rowspan="2">2</td>
                                                            <td rowspan="2">Jadwal Dan
                                                                Waktu (25%)</td>

                                                            <?php if ($cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek4) { ?>
                                                                <td><?= $indikator_pekerjaan_konsultan_kontruksi4 ?>
                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_kontruksi_update4" name="indikator_pekerjaan_konsultan_kontruksi_update[]"><?= $indikator_pekerjaan_konsultan_kontruksi4 ?></textarea>
                                                                </td>
                                                                <td>15
                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_kontruksi_update4" name="bobot_pekerjaan_konsultan_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_kontruksi4 ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek4['penilaian_konsultan_kontruksi_detail'] ?>" id="penilaian_konsultan_kontruksi_update4" name="penilaian_konsultan_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                </td>
                                                                <td><input type=" text" name="nilai_akhir_pekerjaan_konsultan_kontruksi_update[]" value="<?= $cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek4['nilai_akhir_pekerjaan_konsultan_kontruksi_detail'] ?>" id="nilai_akhir_pekerjaan_konsultan_kontruksi_aspek_update4" class="form-control form-control-sm" readonly style="width: 60px;">
                                                                </td>
                                                            <?php    } else { ?>
                                                                <td><?= $indikator_pekerjaan_konsultan_kontruksi4 ?>
                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_kontruksi4" name="indikator_pekerjaan_konsultan_kontruksi[]"><?= $indikator_pekerjaan_konsultan_kontruksi4 ?></textarea>
                                                                </td>
                                                                <td>15
                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_kontruksi4" name="bobot_pekerjaan_konsultan_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_kontruksi4 ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="penilaian_konsultan_kontruksi4" name="penilaian_konsultan_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                </td>
                                                                <td><input type=" text" name="nilai_akhir_pekerjaan_konsultan_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_kontruksi_aspek4" class="form-control form-control-sm" readonly style="width: 60px;">
                                                                </td>
                                                            <?php   } ?>
                                                        </tr>
                                                        <tr>
                                                            <?php if ($cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek5) { ?>

                                                                <td><?= $indikator_pekerjaan_konsultan_kontruksi5 ?>
                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_kontruksi_update5" name="indikator_pekerjaan_konsultan_kontruksi_update[]"><?= $indikator_pekerjaan_konsultan_kontruksi5 ?></textarea>
                                                                </td>
                                                                <td>10
                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_kontruksi_update5" name="bobot_pekerjaan_konsultan_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_kontruksi5 ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek5['penilaian_konsultan_kontruksi_detail'] ?>" id="penilaian_konsultan_kontruksi_update5" name="penilaian_konsultan_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                </td>
                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_kontruksi_update[]" value="<?= $cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek5['nilai_akhir_pekerjaan_konsultan_kontruksi_detail'] ?>" id="nilai_akhir_pekerjaan_konsultan_kontruksi_aspek_update5" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                            <?php    } else { ?>
                                                                <td><?= $indikator_pekerjaan_konsultan_kontruksi5 ?>
                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_kontruksi5" name="indikator_pekerjaan_konsultan_kontruksi[]"><?= $indikator_pekerjaan_konsultan_kontruksi5 ?></textarea>
                                                                </td>
                                                                <td>10
                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_kontruksi5" name="bobot_pekerjaan_konsultan_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_kontruksi5 ?>">
                                                                </td>
                                                                <td>

                                                                    <input type="text" id="penilaian_konsultan_kontruksi5" name="penilaian_konsultan_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                </td>
                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_kontruksi_aspek5" class="form-control form-control-sm" readonly style="width: 60px;"></td>

                                                            <?php   } ?>
                                                        </tr>
                                                        <!-- Ketiga -->
                                                        <tr>

                                                            <td rowspan="4">3</td>
                                                            <td rowspan="4">Kualitas Dan Kuantitas Produk
                                                                (30%)
                                                            </td>
                                                            <?php if ($cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek6) { ?>
                                                                <td><?= $indikator_pekerjaan_konsultan_kontruksi6 ?>
                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_kontruksi_update6" name="indikator_pekerjaan_konsultan_kontruksi_update[]"><?= $indikator_pekerjaan_konsultan_kontruksi6 ?></textarea>
                                                                </td>
                                                                <td>10
                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_kontruksi_update6" name="bobot_pekerjaan_konsultan_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_kontruksi6 ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek6['penilaian_konsultan_kontruksi_detail'] ?>" id="penilaian_konsultan_kontruksi_update6" name="penilaian_konsultan_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                </td>
                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_kontruksi_update[]" value="<?= $cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek6['nilai_akhir_pekerjaan_konsultan_kontruksi_detail'] ?>" id="nilai_akhir_pekerjaan_konsultan_kontruksi_aspek_update6" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                            <?php    } else { ?>
                                                                <td><?= $indikator_pekerjaan_konsultan_kontruksi6 ?>
                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_kontruksi6" name="indikator_pekerjaan_konsultan_kontruksi[]"><?= $indikator_pekerjaan_konsultan_kontruksi6 ?></textarea>
                                                                </td>
                                                                <td>10
                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_kontruksi6" name="bobot_pekerjaan_konsultan_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_kontruksi6 ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="penilaian_konsultan_kontruksi6" name="penilaian_konsultan_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                </td>
                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_kontruksi_aspek6" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                            <?php   } ?>

                                                        </tr>
                                                        <tr>

                                                            <?php if ($cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek7) { ?>
                                                                <td><?= $indikator_pekerjaan_konsultan_kontruksi7 ?>
                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_kontruksi_update7" name="indikator_pekerjaan_konsultan_kontruksi_update[]"><?= $indikator_pekerjaan_konsultan_kontruksi7 ?></textarea>
                                                                </td>
                                                                <td>5
                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_kontruksi_update7" name="bobot_pekerjaan_konsultan_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_kontruksi7 ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek7['penilaian_konsultan_kontruksi_detail'] ?>" id="penilaian_konsultan_kontruksi_update7" name="penilaian_konsultan_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                </td>
                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_kontruksi_update[]" value="<?= $cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek7['nilai_akhir_pekerjaan_konsultan_kontruksi_detail'] ?>" id="nilai_akhir_pekerjaan_konsultan_kontruksi_aspek_update7" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                            <?php    } else { ?>
                                                                <td><?= $indikator_pekerjaan_konsultan_kontruksi7 ?>
                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_kontruksi7" name="indikator_pekerjaan_konsultan_kontruksi[]"><?= $indikator_pekerjaan_konsultan_kontruksi7 ?></textarea>
                                                                </td>
                                                                <td>5
                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_kontruksi7" name="bobot_pekerjaan_konsultan_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_kontruksi7 ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="penilaian_konsultan_kontruksi7" name="penilaian_konsultan_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                </td>
                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_kontruksi_aspek7" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                            <?php   } ?>
                                                        </tr>
                                                        <tr>
                                                            <?php if ($cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek8) { ?>

                                                                <td><?= $indikator_pekerjaan_konsultan_kontruksi8 ?>
                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_kontruksi_update8" name="indikator_pekerjaan_konsultan_kontruksi_update[]"><?= $indikator_pekerjaan_konsultan_kontruksi8 ?></textarea>
                                                                </td>
                                                                <td>10
                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_kontruksi_update8" name="bobot_pekerjaan_konsultan_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_kontruksi8 ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek8['penilaian_konsultan_kontruksi_detail'] ?>" id="penilaian_konsultan_kontruksi_update8" name="penilaian_konsultan_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                </td>
                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_kontruksi_update[]" value="<?= $cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek8['nilai_akhir_pekerjaan_konsultan_kontruksi_detail'] ?>" id="nilai_akhir_pekerjaan_konsultan_kontruksi_aspek_update8" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                            <?php    } else { ?>
                                                                <td><?= $indikator_pekerjaan_konsultan_kontruksi8 ?>
                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_kontruksi8" name="indikator_pekerjaan_konsultan_kontruksi[]"><?= $indikator_pekerjaan_konsultan_kontruksi8 ?></textarea>
                                                                </td>
                                                                <td>10
                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_kontruksi8" name="bobot_pekerjaan_konsultan_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_kontruksi8 ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="penilaian_konsultan_kontruksi8" name="penilaian_konsultan_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                </td>
                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_kontruksi_aspek8" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                            <?php   } ?>
                                                        </tr>
                                                        <tr>
                                                            <?php if ($cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek9) { ?>
                                                                <td><?= $indikator_pekerjaan_konsultan_kontruksi9 ?>
                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_kontruksi_update9" name="indikator_pekerjaan_konsultan_kontruksi_update[]"><?= $indikator_pekerjaan_konsultan_kontruksi9 ?></textarea>
                                                                </td>
                                                                <td>5
                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_kontruksi_update9" name="bobot_pekerjaan_konsultan_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_kontruksi9 ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek9['penilaian_konsultan_kontruksi_detail'] ?>" id="penilaian_konsultan_kontruksi_update9" name="penilaian_konsultan_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                </td>
                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_kontruksi_update[]" value="<?= $cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek9['nilai_akhir_pekerjaan_konsultan_kontruksi_detail'] ?>" id="nilai_akhir_pekerjaan_konsultan_kontruksi_aspek_update9" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                            <?php    } else { ?>
                                                                <td><?= $indikator_pekerjaan_konsultan_kontruksi9 ?>
                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_kontruksi9" name="indikator_pekerjaan_konsultan_kontruksi[]"><?= $indikator_pekerjaan_konsultan_kontruksi9 ?></textarea>
                                                                </td>
                                                                <td>5
                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_kontruksi9" name="bobot_pekerjaan_konsultan_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_kontruksi9 ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="penilaian_konsultan_kontruksi9" name="penilaian_konsultan_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                </td>
                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_kontruksi_aspek9" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                            <?php   } ?>
                                                        </tr>
                                                        <!-- Ke empat -->
                                                        <tr>

                                                            <td rowspan="2">4</td>
                                                            <td rowspan="2">Jadwal Dan Waktu
                                                                (10%)
                                                            </td>
                                                            <?php if ($cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek10) { ?>
                                                                <td><?= $indikator_pekerjaan_konsultan_kontruksi10 ?>
                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_kontruksi_update10" name="indikator_pekerjaan_konsultan_kontruksi_update[]"><?= $indikator_pekerjaan_konsultan_kontruksi10 ?></textarea>
                                                                </td>
                                                                <td>5
                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_kontruksi_update10" name="bobot_pekerjaan_konsultan_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_kontruksi10 ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek10['penilaian_konsultan_kontruksi_detail'] ?>" id="penilaian_konsultan_kontruksi_update10" name="penilaian_konsultan_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                </td>
                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_kontruksi_update[]" value="<?= $cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek10['nilai_akhir_pekerjaan_konsultan_kontruksi_detail'] ?>" id="nilai_akhir_pekerjaan_konsultan_kontruksi_aspek_update10" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                            <?php    } else { ?>
                                                                <td><?= $indikator_pekerjaan_konsultan_kontruksi10 ?>
                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_kontruksi10" name="indikator_pekerjaan_konsultan_kontruksi[]"><?= $indikator_pekerjaan_konsultan_kontruksi10 ?></textarea>
                                                                </td>
                                                                <td>5
                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_kontruksi10" name="bobot_pekerjaan_konsultan_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_kontruksi10 ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="penilaian_konsultan_kontruksi10" name="penilaian_konsultan_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                </td>
                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_kontruksi_aspek10" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                            <?php   } ?>
                                                        </tr>
                                                        <tr>
                                                            <?php if ($cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek11) { ?>
                                                                <td><?= $indikator_pekerjaan_konsultan_kontruksi11 ?>
                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_kontruksi_update11" name="indikator_pekerjaan_konsultan_kontruksi_update[]"><?= $indikator_pekerjaan_konsultan_kontruksi11 ?></textarea>
                                                                </td>
                                                                <td>5
                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_kontruksi_update11" name="bobot_pekerjaan_konsultan_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_kontruksi11 ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek11['penilaian_konsultan_kontruksi_detail'] ?>" id="penilaian_konsultan_kontruksi_update11" name="penilaian_konsultan_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                </td>
                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_kontruksi_update[]" value="<?= $cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek11['nilai_akhir_pekerjaan_konsultan_kontruksi_detail'] ?>" id="nilai_akhir_pekerjaan_konsultan_kontruksi_aspek_update11" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                            <?php    } else { ?>
                                                                <td><?= $indikator_pekerjaan_konsultan_kontruksi11 ?>
                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_kontruksi11" name="indikator_pekerjaan_konsultan_kontruksi[]"><?= $indikator_pekerjaan_konsultan_kontruksi11 ?></textarea>
                                                                </td>
                                                                <td>5
                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_kontruksi11" name="bobot_pekerjaan_konsultan_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_kontruksi11 ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="penilaian_konsultan_kontruksi11" name="penilaian_konsultan_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                </td>
                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_kontruksi_aspek11" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                            <?php   } ?>
                                                        </tr>

                                                        <!-- Ke lima -->
                                                        <tr>

                                                            <td rowspan="4">5</td>
                                                            <td rowspan="4">Pelaksanaa Pekerjaan (20%)
                                                            </td>
                                                            <?php if ($cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek12) { ?>
                                                                <td><?= $indikator_pekerjaan_konsultan_kontruksi12 ?>
                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_kontruksi_update12" name="indikator_pekerjaan_konsultan_kontruksi_update[]"><?= $indikator_pekerjaan_konsultan_kontruksi12 ?></textarea>
                                                                </td>
                                                                <td>5
                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_kontruksi_update12" name="bobot_pekerjaan_konsultan_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_kontruksi12 ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek12['penilaian_konsultan_kontruksi_detail'] ?>" id="penilaian_konsultan_kontruksi_update12" name="penilaian_konsultan_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                </td>
                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_kontruksi_update[]" value="<?= $cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek12['nilai_akhir_pekerjaan_konsultan_kontruksi_detail'] ?>" id="nilai_akhir_pekerjaan_konsultan_kontruksi_aspek_update12" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                            <?php    } else { ?>
                                                                <td><?= $indikator_pekerjaan_konsultan_kontruksi12 ?>
                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_kontruksi12" name="indikator_pekerjaan_konsultan_kontruksi[]"><?= $indikator_pekerjaan_konsultan_kontruksi12 ?></textarea>
                                                                </td>
                                                                <td>5
                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_kontruksi12" name="bobot_pekerjaan_konsultan_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_kontruksi12 ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="penilaian_konsultan_kontruksi12" name="penilaian_konsultan_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                </td>
                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_kontruksi_aspek12" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                            <?php   } ?>

                                                        </tr>
                                                        <tr>
                                                            <?php if ($cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek13) { ?>
                                                                <td><?= $indikator_pekerjaan_konsultan_kontruksi13 ?>
                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_kontruksi_update13" name="indikator_pekerjaan_konsultan_kontruksi_update[]"><?= $indikator_pekerjaan_konsultan_kontruksi13 ?></textarea>
                                                                </td>
                                                                <td>5
                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_kontruksi_update13" name="bobot_pekerjaan_konsultan_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_kontruksi13 ?>">
                                                                </td>
                                                                <td>

                                                                    <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek13['penilaian_konsultan_kontruksi_detail'] ?>" id="penilaian_konsultan_kontruksi_update13" name="penilaian_konsultan_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                </td>
                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_kontruksi_update[]" value="<?= $cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek13['nilai_akhir_pekerjaan_konsultan_kontruksi_detail'] ?>" id="nilai_akhir_pekerjaan_konsultan_kontruksi_aspek_update13" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                            <?php    } else { ?>
                                                                <td><?= $indikator_pekerjaan_konsultan_kontruksi13 ?>
                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_kontruksi13" name="indikator_pekerjaan_konsultan_kontruksi[]"><?= $indikator_pekerjaan_konsultan_kontruksi13 ?></textarea>
                                                                </td>
                                                                <td>5
                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_kontruksi13" name="bobot_pekerjaan_konsultan_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_kontruksi13 ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="penilaian_konsultan_kontruksi13" name="penilaian_konsultan_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                </td>
                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_kontruksi_aspek13" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                            <?php   } ?>
                                                        </tr>
                                                        <tr>
                                                            <?php if ($cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek14) { ?>
                                                                <td><?= $indikator_pekerjaan_konsultan_kontruksi14 ?>
                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_kontruksi_update14" name="indikator_pekerjaan_konsultan_kontruksi_update[]"><?= $indikator_pekerjaan_konsultan_kontruksi14 ?></textarea>
                                                                </td>
                                                                <td>5
                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_kontruksi_update14" name="bobot_pekerjaan_konsultan_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_kontruksi14 ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek14['penilaian_konsultan_kontruksi_detail'] ?>" id="penilaian_konsultan_kontruksi_update14" name="penilaian_konsultan_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                </td>
                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_kontruksi_update[]" value="<?= $cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek14['nilai_akhir_pekerjaan_konsultan_kontruksi_detail'] ?>" id="nilai_akhir_pekerjaan_konsultan_kontruksi_aspek_update14" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                            <?php    } else { ?>
                                                                <td><?= $indikator_pekerjaan_konsultan_kontruksi14 ?>
                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_kontruksi14" name="indikator_pekerjaan_konsultan_kontruksi[]"><?= $indikator_pekerjaan_konsultan_kontruksi14 ?></textarea>
                                                                </td>
                                                                <td>5
                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_kontruksi14" name="bobot_pekerjaan_konsultan_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_kontruksi14 ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="penilaian_konsultan_kontruksi14" name="penilaian_konsultan_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                </td>
                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_kontruksi_aspek14" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                            <?php   } ?>
                                                        </tr>
                                                        <tr>
                                                            <?php if ($cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek15) { ?>
                                                                <td><?= $indikator_pekerjaan_konsultan_kontruksi15 ?>
                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_kontruksi_update15" name="indikator_pekerjaan_konsultan_kontruksi_update[]"><?= $indikator_pekerjaan_konsultan_kontruksi15 ?></textarea>
                                                                </td>
                                                                <td>5
                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_kontruksi_update15" name="bobot_pekerjaan_konsultan_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_kontruksi15 ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek15['penilaian_konsultan_kontruksi_detail'] ?>" id="penilaian_konsultan_kontruksi_update15" name="penilaian_konsultan_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                </td>
                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_kontruksi_update[]" value="<?= $cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek15['nilai_akhir_pekerjaan_konsultan_kontruksi_detail'] ?>" id="nilai_akhir_pekerjaan_konsultan_kontruksi_aspek_update15" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                            <?php    } else { ?>
                                                                <td><?= $indikator_pekerjaan_konsultan_kontruksi15 ?>
                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_kontruksi15" name="indikator_pekerjaan_konsultan_kontruksi[]"><?= $indikator_pekerjaan_konsultan_kontruksi15 ?></textarea>
                                                                </td>
                                                                <td>5
                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_kontruksi15" name="bobot_pekerjaan_konsultan_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_kontruksi15 ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="penilaian_konsultan_kontruksi15" name="penilaian_konsultan_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                </td>
                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_kontruksi_aspek15" class="form-control form-control-sm" readonly style="width: 60px;"></td>

                                                            <?php   } ?>
                                                        </tr>

                                                        <?php if ($jika_sudah_di_tambah_pekerjaan_konsultan_kontruksi) { ?>
                                                            <?php foreach ($jika_sudah_di_tambah_pekerjaan_konsultan_kontruksi as $key => $value) { ?>
                                                                <input type="hidden" name="id_detail_penilaian_pekerjaan_konsultan_kontruksi[]" value="<?= $value['id_detail_penilaian_pekerjaan_konsultan_kontruksi'] ?>">
                                                            <?php } ?>
                                                            <tfoot>
                                                                <tr class="text-center">
                                                                    <td></td>
                                                                    <td><b> RATING </b></td>
                                                                    <td>
                                                                        <div id="status_pekerjaan_konsultan_kontruksi_update">
                                                                            <?php if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 51) { ?>
                                                                                <label for="" class="badge badge-danger">kurang Baik</label>
                                                                            <?php   } else if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 70) { ?>
                                                                                <label for="" class="badge badge-warning">cukup Baik</label>
                                                                            <?php } else if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 80) { ?>
                                                                                <label for="" class="badge badge-warning">Baik</label>
                                                                            <?php  } else { ?>
                                                                                <label for="" class="badge badge-success">Sangat Baik</label>
                                                                            <?php   } ?>
                                                                        </div>
                                                                    </td>
                                                                    <td colspan="3">
                                                                        <div id="bintang_pekerjaan_konsultan_kontruksi_update">
                                                                            <?php if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 51) { ?>
                                                                                ''
                                                                            <?php   } else if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 70) { ?>
                                                                                <i class="fas fa fa-star text-warning"></i>
                                                                            <?php } else if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 80) { ?>
                                                                                <i class="fas fa fa-star text-warning"></i><i class="fas fa fa-star text-warning"></i>
                                                                            <?php  } else { ?>
                                                                                <i class="fas fa fa-star text-warning"></i> <i class="fas fa fa-star text-warning"></i> <i class="fas fa fa-star text-warning"></i>
                                                                            <?php   } ?>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                            <tfoot>
                                                                <tr class="text-center">
                                                                    <td></td>
                                                                    <td colspan="2"><b> TOTAL NILAI AKHIR </b></td>
                                                                    <td><b>100</b></td>
                                                                    <td></td>
                                                                    <td><input type="number" style="width: 80px;" value="<?= $vendor_mengikuti_paket['rating_nilai_akhir'] ?>" class="form-control form-control-sm" readonly id="total_nilai_pekerjaan_konsultan_kontruksi_update"></td>
                                                                </tr>
                                                            </tfoot>

                                                            <br>
                                                    </table>
                                                </form>
                                            </div><br>
                                            <center>
                                                <div class="row">
                                                    <div class="col">
                                                        <a class="btn btn-grad7 text-white btn-sm btn-block" style="box-shadow: 2px 2px 8px 2px black;" href="<?= base_url('beranda/penilaian_kinerja') ?>"><i class="fas fa fa-arrow-left"></i> Kembali</a>
                                                    </div>
                                                    <div class="col">
                                                        <div> <button type="button" onclick="Reset_nilai_pekerjaan_konsultan_kontruksi()" class="btn btn-danger text-white btn-sm btn-block">Reset Penilaian</button></div>
                                                    </div>
                                                </div>
                                            </center>
                                        <?php    } else { ?>
                                            <input type="hidden" name="rating_penilaian_vendor_pekerjaan_konsultan_kontruksi">
                                            <input type="hidden" name="status_rating_pekerjaan_konsultan_kontruksi">
                                            <input type="hidden" name="status_nilai_akhir_pekerjaan_konsultan_kontruksi">
                                            <tfoot>
                                                <tr class="text-center">
                                                    <td></td>
                                                    <td><b> RATING </b></td>
                                                    <td>
                                                        <div id="status_pekerjaan_konsultan_kontruksi">

                                                        </div>
                                                    </td>
                                                    <td colspan="3">
                                                        <div id="bintang_pekerjaan_konsultan_kontruksi"></div>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                            <tfoot>
                                                <tr class="text-center">
                                                    <td></td>
                                                    <td colspan="2"><b> TOTAL NILAI AKHIR </b></td>
                                                    <td><b>100</b></td>
                                                    <td></td>
                                                    <td><input type="number" style="width: 80px;" class="form-control form-control-sm" readonly id="total_nilai_pekerjaan_konsultan_kontruksi"></td>
                                                </tr>
                                            </tfoot>

                                            <br>
                                            </table>
                                            </form>
                                        </div><br>
                                        <center>
                                            <div class="row">
                                                <div class="col">
                                                    <a class="btn btn-grad7 text-white btn-sm btn-block" style="box-shadow: 2px 2px 8px 2px black;" href="<?= base_url('beranda/penilaian_kinerja') ?>"><i class="fas fa fa-arrow-left"></i> Kembali</a>
                                                </div>
                                                <div class="col">
                                                    <div id="save_button_konsultan_kontruksi" style="display: none;"> <button type="button" onclick="Simpan_pekerjaan_konsultan_kontruksi()" class="btn btn-grad8 text-white btn-sm btn-block">Simpan konsultan Penilaian</button></div>
                                                    <div id="warning_button_konsultan_kontruksi" style="display: none;"> <button type="button" onclick="Simpan_Warning_pekerjaan_konsultan_kontruksi_warning()" class="btn btn-grad10 text-white btn-sm btn-block">warning konsultan Penilaian</button></div>
                                                </div>
                                            </div>
                                        </center>
                                    <?php   } ?>
                                    </div>
                                    </div>
                                </div>
                                <!-- END INI KONSULTAN PRENCANAAN KONTRUKSI -->


                                <!-- INI BAGIAN PEKERJAAN KONSULTAN KAJIAN -->
                                <?php if ($data_pemenang['status_jenis_penilayan'] == 'kajian konsultan kontruksi') { ?>
                                    <div class="tab-pane fade show active" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                    <?php  } else { ?>
                                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                        <?php  } ?>
                                        <div class="card" style="box-shadow: 2px 2px 10px 2px black;">
                                            <div class="card-header btn-grad">
                                                <i class="fas fa-chart-line"></i> Penilaian Kinerja Konsultan Kajian/Studi/Sistem Informatika
                                            </div>
                                            <div class="card-body">
                                                <div style="overflow-x: auto;">
                                                    <table class="table" style="font-size: 12px;">
                                                        <tr>
                                                            <th>Kode Tender</th>
                                                            <th>: <?= $data_pemenang['kode_tender'] ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Nama Paket</th>
                                                            <th>: <?= $data_pemenang['nama_paket'] ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Divisi</th>
                                                            <th>: <?= $data_pemenang['nama_unit_kerja'] ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Nama Vendor</th>
                                                            <th>: <?= $data_pemenang['username_vendor'] ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Alamat Perusahaan</th>
                                                            <?php if ($data_pemenang['alamat_vendor'] == null) { ?>
                                                                <th>: <?= $data_pemenang['alamat_usaha'] ?></th>
                                                            <?php  } else { ?>
                                                                <th>: <?= $data_pemenang['alamat_vendor'] ?></th>
                                                            <?php } ?>
                                                        </tr>
                                                        <?php $no = 1;
                                                        foreach ($lokasi_kerja as $key => $value) { ?>
                                                            <tr>
                                                                <th>Lokasi Pekerjaan <?= $no++ ?></th>
                                                                <th>: Provinsi : <?= $value['nama_provinsi'] ?>
                                                                    <br> : Kabupaten : <?= $value['nama_kabupaten'] ?>
                                                                    <br> : Alamat : <?= $value['detail_lokasi'] ?>
                                                                </th>
                                                            </tr>
                                                        <?php } ?>
                                                        <tr>
                                                            <th>Nilai Kontrak</th>
                                                            <th>: <?= "Rp " . number_format($data_pemenang['negosiasi'], 2, ',', '.') ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Nomor Kontrak</th>
                                                            <th>&nbsp;
                                                                <div class="row">
                                                                    <input style="width: 200px;height:30px" type="text" name="nomor_kontrak3" value="<?= $data_pemenang['nomor_kontrak'] ?>" id="nomor_kontrak3" placeholder="Nomor Kontrak..." class="form-control form-control-sm ml-2"><input style="width: 200px;height:30px" type="text" name="tanggal_nomor_kontak3" value="<?= $data_pemenang['tanggal_nomor_kontak'] ?>" id="tanggal_nomor_kontak3" placeholder="Tanggal" class="form-control form-control-sm ml-1">
                                                                </div>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>Jangka Waktu Pelaksanaan</th>
                                                            <th>
                                                                <div class="row">
                                                                    <input style="width: 200px;height:30px" type="text" name="jangka_mulai3" placeholder="Tanggal Mulai" value="<?= $data_pemenang['jangka_mulai'] ?>" id="jangka_mulai3" class="form-control form-control-sm ml-2 mr-1"><label for="" class="text-small mt-1">S/D</label> <input style="width: 200px;height:30px" type="text" value="<?= $data_pemenang['jangka_selesai'] ?>" name="jangka_selesai3" id="jangka_selesai3" placeholder="Tanggal Selesai" class="form-control form-control-sm ml-1">
                                                                </div>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>Metode Pemilihan</th>
                                                            <th>: <?= $data_pemenang['nama_metode_pemilihan'] ?></th>
                                                        </tr>
                                                    </table>
                                                    <br>
                                                    <?php if ($data_pemenang['status_warning_vendor'] == 1) { ?>
                                                        <div class="alert alert-warning" role="alert">
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <img src="<?= base_url('assets/img/warning.png') ?>" width="70px" alt="">
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <label for="">Vendor Telah Memiliki 1 Kali Warning Maka Jika Vendor Mendapatkan Warning ke-2 Vendor Akan Di Blacklist Otomatis Oleh Sistem Selama 2 Tahun !!!</label>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    <?php } else if ($data_pemenang['status_warning_vendor'] == 2) { ?>
                                                        <div class="alert alert-danger" role="alert">
                                                            <img src="<?= base_url('assets/img/blacklist.png') ?>" width="70px" alt="">
                                                            <label for="">Vendor Telah TerBlacklist Oleh Sistem Selama 2 Tahun !!!</label>
                                                        </div>
                                                    <?php   } else { ?>
                                                        <div class="alert alert-success" role="alert">
                                                            <img src="<?= base_url('assets/img/aman2.png') ?>" width="70px" alt="">
                                                            <label for="">Vendor Ini Aman / Tiadak Memiliki Warning !!!</label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="card" style="box-shadow: 2px 2px 10px 2px black;">
                                            <div class="card-header btn-grad">
                                                <i class="fas fa-chart-line"></i> Table PENILAIAN KINERJA KONSULTAN KAJIAN/STUDI/SISTEM INFORMATIKA
                                            </div>
                                            <div class="card-body">
                                                <div style="overflow-x: auto;">
                                                    <form action="" id="form_tambah_pekerjaan_kajian_konsultan_kontruksi">
                                                        <input type="hidden" name="id_paket" value="<?= $data_pemenang['id_paket'] ?>">
                                                        <input type="hidden" name="id_vendor" value="<?= $data_pemenang['id_mengikuti_vendor'] ?>">
                                                        <table id="nilai_tbl" class="table table-bordered">
                                                            <tr class="btn-grad">
                                                                <th>No</th>
                                                                <th>Aspek Kerja</th>
                                                                <th>Indikator</th>
                                                                <th>Bobot(%)</th>
                                                                <th>Penilaian</th>
                                                                <th>Nilai Akhir</th>
                                                            </tr>
                                                            <tr>

                                                                <td rowspan="3">1</td>
                                                                <td rowspan="3">Administrasi
                                                                    (15%)</td>
                                                                <!-- ketika update  -->
                                                                <?php if ($cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek1) { ?>
                                                                    <td>
                                                                        <?= $indikator_pekerjaan_kajian_konsultan_kontruksi1 ?>
                                                                        <textarea id="indikator_pekerjaan_kajian_konsultan_kontruksi_update1" hidden name="indikator_pekerjaan_kajian_konsultan_kontruksi_update[]"><?= $indikator_pekerjaan_kajian_konsultan_kontruksi1 ?></textarea>
                                                                    </td>
                                                                    <td>5
                                                                        <input type="hidden" id="bobot_pekerjaan_kajian_konsultan_kontruksi_update1" name="bobot_pekerjaan_kajian_konsultan_kontruksi_update[]" value="<?= $bobot_pekerjaan_kajian_konsultan_kontruksi1 ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" value="<?= $cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek1['penilaian_konsultan_kajian_kontruksi_detail'] ?>" id="penilaian_kajian_konsultan_kontruksi_update1" name="penilaian_kajian_konsultan_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                    </td>
                                                                    <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek1['nilai_akhir_pekerjaan_konsultan_kajian_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_update[]" id="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek_update1" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                    <!-- ketika tambah -->
                                                                <?php } else { ?>
                                                                    <td>
                                                                        <?= $indikator_pekerjaan_kajian_konsultan_kontruksi1 ?>
                                                                        <textarea id="indikator_pekerjaan_kajian_konsultan_kontruksi1" hidden name="indikator_pekerjaan_kajian_konsultan_kontruksi[]"><?= $indikator_pekerjaan_kajian_konsultan_kontruksi1 ?></textarea>
                                                                    </td>
                                                                    <td>5
                                                                        <input type="hidden" id="bobot_pekerjaan_kajian_konsultan_kontruksi1" name="bobot_pekerjaan_kajian_konsultan_kontruksi[]" value="<?= $bobot_pekerjaan_kajian_konsultan_kontruksi1 ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="penilaian_kajian_konsultan_kontruksi1" name="penilaian_kajian_konsultan_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                    </td>
                                                                    <td><input type="text" name="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi[]" id="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek1" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                <?php   } ?>
                                                            </tr>
                                                            <tr>
                                                                <?php if ($cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek2) { ?>
                                                                    <td>
                                                                        <?= $indikator_pekerjaan_kajian_konsultan_kontruksi2 ?>
                                                                        <textarea id="indikator_pekerjaan_kajian_konsultan_kontruksi_update2" name="indikator_pekerjaan_kajian_konsultan_kontruksi_update[]" hidden><?= $indikator_pekerjaan_kajian_konsultan_kontruksi2 ?>
                                                    </textarea>
                                                                    </td>
                                                                    <td>5
                                                                        <input type="hidden" id="bobot_pekerjaan_kajian_konsultan_kontruksi_update2" name="bobot_pekerjaan_kajian_konsultan_kontruksi_update[]" value="<?= $bobot_pekerjaan_kajian_konsultan_kontruksi2 ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" value="<?= $cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek2['penilaian_konsultan_kajian_kontruksi_detail'] ?>" id="penilaian_kajian_konsultan_kontruksi_update2" name="penilaian_kajian_konsultan_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                    </td>
                                                                    <td><input type="text" name="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_update[]" value="<?= $cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek2['nilai_akhir_pekerjaan_konsultan_kajian_kontruksi_detail'] ?>" id="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek_update2" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                <?php    } else { ?>
                                                                    <td>
                                                                        <?= $indikator_pekerjaan_kajian_konsultan_kontruksi2 ?>
                                                                        <textarea id="indikator_pekerjaan_kajian_konsultan_kontruksi2" name="indikator_pekerjaan_kajian_konsultan_kontruksi[]" hidden><?= $indikator_pekerjaan_kajian_konsultan_kontruksi2 ?>
                                                    </textarea>
                                                                    </td>
                                                                    <td>5
                                                                        <input type="hidden" id="bobot_pekerjaan_kajian_konsultan_kontruksi2" name="bobot_pekerjaan_kajian_konsultan_kontruksi[]" value="<?= $bobot_pekerjaan_kajian_konsultan_kontruksi2 ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="penilaian_kajian_konsultan_kontruksi2" name="penilaian_kajian_konsultan_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                    </td>
                                                                    <td><input type="text" name="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi[]" id="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek2" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                <?php   } ?>


                                                            </tr>
                                                            <tr>
                                                                <?php if ($cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek3) { ?>
                                                                    <td><?= $indikator_pekerjaan_kajian_konsultan_kontruksi3 ?>
                                                                        <textarea hidden id="indikator_pekerjaan_kajian_konsultan_kontruksi_update3" name="indikator_pekerjaan_kajian_konsultan_kontruksi_update[]"><?= $indikator_pekerjaan_kajian_konsultan_kontruksi3 ?></textarea>
                                                                    </td>
                                                                    <td>5
                                                                        <input type="hidden" id="bobot_pekerjaan_kajian_konsultan_kontruksi_update3" name="bobot_pekerjaan_kajian_konsultan_kontruksi_update[]" value="<?= $bobot_pekerjaan_kajian_konsultan_kontruksi3 ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" value="<?= $cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek3['penilaian_konsultan_kajian_kontruksi_detail'] ?>" id="penilaian_kajian_konsultan_kontruksi_update3" name="penilaian_kajian_konsultan_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                    </td>
                                                                    <td><input type=" text" name="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_update[]" value="<?= $cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek3['nilai_akhir_pekerjaan_konsultan_kajian_kontruksi_detail'] ?>" id="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek_update3" class="form-control form-control-sm" readonly style="width: 60px;">
                                                                    </td>
                                                                <?php    } else { ?>
                                                                    <td><?= $indikator_pekerjaan_kajian_konsultan_kontruksi3 ?>
                                                                        <textarea hidden id="indikator_pekerjaan_kajian_konsultan_kontruksi3" name="indikator_pekerjaan_kajian_konsultan_kontruksi[]"><?= $indikator_pekerjaan_kajian_konsultan_kontruksi3 ?></textarea>
                                                                    </td>
                                                                    <td>5
                                                                        <input type="hidden" id="bobot_pekerjaan_kajian_konsultan_kontruksi3" name="bobot_pekerjaan_kajian_konsultan_kontruksi[]" value="<?= $bobot_pekerjaan_kajian_konsultan_kontruksi3 ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="penilaian_kajian_konsultan_kontruksi3" name="penilaian_kajian_konsultan_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                    </td>
                                                                    <td><input type=" text" name="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi[]" id="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek3" class="form-control form-control-sm" readonly style="width: 60px;">
                                                                    </td>
                                                                <?php   } ?>
                                                            </tr>
                                                            <!-- Kedua -->
                                                            <tr>

                                                                <td rowspan="2">2</td>
                                                                <td rowspan="2">
                                                                    Tenaga Ahli dan Tenaga Teknis (30%)
                                                                </td>
                                                                <?php if ($cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek4) { ?>
                                                                    <td><?= $indikator_pekerjaan_kajian_konsultan_kontruksi4 ?>
                                                                        <textarea hidden id="indikator_pekerjaan_kajian_konsultan_kontruksi_update4" name="indikator_pekerjaan_kajian_konsultan_kontruksi_update[]"><?= $indikator_pekerjaan_kajian_konsultan_kontruksi4 ?></textarea>
                                                                    </td>
                                                                    <td>15
                                                                        <input type="hidden" id="bobot_pekerjaan_kajian_konsultan_kontruksi_update4" name="bobot_pekerjaan_kajian_konsultan_kontruksi_update[]" value="<?= $bobot_pekerjaan_kajian_konsultan_kontruksi4 ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" value="<?= $cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek4['penilaian_konsultan_kajian_kontruksi_detail'] ?>" id="penilaian_kajian_konsultan_kontruksi_update4" name="penilaian_kajian_konsultan_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                    </td>
                                                                    <td><input type=" text" name="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_update[]" value="<?= $cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek4['nilai_akhir_pekerjaan_konsultan_kajian_kontruksi_detail'] ?>" id="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek_update4" class="form-control form-control-sm" readonly style="width: 60px;">
                                                                    </td>
                                                                <?php    } else { ?>
                                                                    <td><?= $indikator_pekerjaan_kajian_konsultan_kontruksi4 ?>
                                                                        <textarea hidden id="indikator_pekerjaan_kajian_konsultan_kontruksi4" name="indikator_pekerjaan_kajian_konsultan_kontruksi[]"><?= $indikator_pekerjaan_kajian_konsultan_kontruksi4 ?></textarea>
                                                                    </td>
                                                                    <td>15
                                                                        <input type="hidden" id="bobot_pekerjaan_kajian_konsultan_kontruksi4" name="bobot_pekerjaan_kajian_konsultan_kontruksi[]" value="<?= $bobot_pekerjaan_kajian_konsultan_kontruksi4 ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="penilaian_kajian_konsultan_kontruksi4" name="penilaian_kajian_konsultan_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                    </td>
                                                                    <td><input type=" text" name="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi[]" id="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek4" class="form-control form-control-sm" readonly style="width: 60px;">
                                                                    </td>
                                                                <?php   } ?>
                                                            </tr>
                                                            <tr>
                                                                <?php if ($cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek5) { ?>

                                                                    <td><?= $indikator_pekerjaan_kajian_konsultan_kontruksi5 ?>
                                                                        <textarea hidden id="indikator_pekerjaan_kajian_konsultan_kontruksi_update5" name="indikator_pekerjaan_kajian_konsultan_kontruksi_update[]"><?= $indikator_pekerjaan_kajian_konsultan_kontruksi5 ?></textarea>
                                                                    </td>
                                                                    <td>15
                                                                        <input type="hidden" id="bobot_pekerjaan_kajian_konsultan_kontruksi_update5" name="bobot_pekerjaan_kajian_konsultan_kontruksi_update[]" value="<?= $bobot_pekerjaan_kajian_konsultan_kontruksi5 ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" value="<?= $cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek5['penilaian_konsultan_kajian_kontruksi_detail'] ?>" id="penilaian_kajian_konsultan_kontruksi_update5" name="penilaian_kajian_konsultan_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                    </td>
                                                                    <td><input type="text" name="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_update[]" value="<?= $cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek5['nilai_akhir_pekerjaan_konsultan_kajian_kontruksi_detail'] ?>" id="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek_update5" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                <?php    } else { ?>
                                                                    <td><?= $indikator_pekerjaan_kajian_konsultan_kontruksi5 ?>
                                                                        <textarea hidden id="indikator_pekerjaan_kajian_konsultan_kontruksi5" name="indikator_pekerjaan_kajian_konsultan_kontruksi[]"><?= $indikator_pekerjaan_kajian_konsultan_kontruksi5 ?></textarea>
                                                                    </td>
                                                                    <td>15
                                                                        <input type="hidden" id="bobot_pekerjaan_kajian_konsultan_kontruksi5" name="bobot_pekerjaan_kajian_konsultan_kontruksi[]" value="<?= $bobot_pekerjaan_kajian_konsultan_kontruksi5 ?>">
                                                                    </td>
                                                                    <td>

                                                                        <input type="text" id="penilaian_kajian_konsultan_kontruksi5" name="penilaian_kajian_konsultan_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                    </td>
                                                                    <td><input type="text" name="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi[]" id="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek5" class="form-control form-control-sm" readonly style="width: 60px;"></td>

                                                                <?php   } ?>
                                                            </tr>
                                                            <!-- Ketiga -->
                                                            <tr>

                                                                <td rowspan="4">3</td>
                                                                <td rowspan="4">Kualitas Dan Kuantitas Produk
                                                                    (30%)
                                                                </td>
                                                                <?php if ($cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek6) { ?>
                                                                    <td><?= $indikator_pekerjaan_kajian_konsultan_kontruksi6 ?>
                                                                        <textarea hidden id="indikator_pekerjaan_kajian_konsultan_kontruksi_update6" name="indikator_pekerjaan_kajian_konsultan_kontruksi_update[]"><?= $indikator_pekerjaan_kajian_konsultan_kontruksi6 ?></textarea>
                                                                    </td>
                                                                    <td>10
                                                                        <input type="hidden" id="bobot_pekerjaan_kajian_konsultan_kontruksi_update6" name="bobot_pekerjaan_kajian_konsultan_kontruksi_update[]" value="<?= $bobot_pekerjaan_kajian_konsultan_kontruksi6 ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" value="<?= $cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek6['penilaian_konsultan_kajian_kontruksi_detail'] ?>" id="penilaian_kajian_konsultan_kontruksi_update6" name="penilaian_kajian_konsultan_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                    </td>
                                                                    <td><input type="text" name="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_update[]" value="<?= $cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek6['nilai_akhir_pekerjaan_konsultan_kajian_kontruksi_detail'] ?>" id="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek_update6" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                <?php    } else { ?>
                                                                    <td><?= $indikator_pekerjaan_kajian_konsultan_kontruksi6 ?>
                                                                        <textarea hidden id="indikator_pekerjaan_kajian_konsultan_kontruksi6" name="indikator_pekerjaan_kajian_konsultan_kontruksi[]"><?= $indikator_pekerjaan_kajian_konsultan_kontruksi6 ?></textarea>
                                                                    </td>
                                                                    <td>10
                                                                        <input type="hidden" id="bobot_pekerjaan_kajian_konsultan_kontruksi6" name="bobot_pekerjaan_kajian_konsultan_kontruksi[]" value="<?= $bobot_pekerjaan_kajian_konsultan_kontruksi6 ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="penilaian_kajian_konsultan_kontruksi6" name="penilaian_kajian_konsultan_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                    </td>
                                                                    <td><input type="text" name="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi[]" id="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek6" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                <?php   } ?>

                                                            </tr>
                                                            <tr>

                                                                <?php if ($cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek7) { ?>
                                                                    <td><?= $indikator_pekerjaan_kajian_konsultan_kontruksi7 ?>
                                                                        <textarea hidden id="indikator_pekerjaan_kajian_konsultan_kontruksi_update7" name="indikator_pekerjaan_kajian_konsultan_kontruksi_update[]"><?= $indikator_pekerjaan_kajian_konsultan_kontruksi7 ?></textarea>
                                                                    </td>
                                                                    <td>5
                                                                        <input type="hidden" id="bobot_pekerjaan_kajian_konsultan_kontruksi_update7" name="bobot_pekerjaan_kajian_konsultan_kontruksi_update[]" value="<?= $bobot_pekerjaan_kajian_konsultan_kontruksi7 ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" value="<?= $cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek7['penilaian_konsultan_kajian_kontruksi_detail'] ?>" id="penilaian_kajian_konsultan_kontruksi_update7" name="penilaian_kajian_konsultan_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                    </td>
                                                                    <td><input type="text" name="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_update[]" value="<?= $cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek7['nilai_akhir_pekerjaan_konsultan_kajian_kontruksi_detail'] ?>" id="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek_update7" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                <?php    } else { ?>
                                                                    <td><?= $indikator_pekerjaan_kajian_konsultan_kontruksi7 ?>
                                                                        <textarea hidden id="indikator_pekerjaan_kajian_konsultan_kontruksi7" name="indikator_pekerjaan_kajian_konsultan_kontruksi[]"><?= $indikator_pekerjaan_kajian_konsultan_kontruksi7 ?></textarea>
                                                                    </td>
                                                                    <td>5
                                                                        <input type="hidden" id="bobot_pekerjaan_kajian_konsultan_kontruksi7" name="bobot_pekerjaan_kajian_konsultan_kontruksi[]" value="<?= $bobot_pekerjaan_kajian_konsultan_kontruksi7 ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="penilaian_kajian_konsultan_kontruksi7" name="penilaian_kajian_konsultan_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                    </td>
                                                                    <td><input type="text" name="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi[]" id="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek7" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                <?php   } ?>
                                                            </tr>
                                                            <tr>
                                                                <?php if ($cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek8) { ?>

                                                                    <td><?= $indikator_pekerjaan_kajian_konsultan_kontruksi8 ?>
                                                                        <textarea hidden id="indikator_pekerjaan_kajian_konsultan_kontruksi_update8" name="indikator_pekerjaan_kajian_konsultan_kontruksi_update[]"><?= $indikator_pekerjaan_kajian_konsultan_kontruksi8 ?></textarea>
                                                                    </td>
                                                                    <td>10
                                                                        <input type="hidden" id="bobot_pekerjaan_kajian_konsultan_kontruksi_update8" name="bobot_pekerjaan_kajian_konsultan_kontruksi_update[]" value="<?= $bobot_pekerjaan_kajian_konsultan_kontruksi8 ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" value="<?= $cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek8['penilaian_konsultan_kajian_kontruksi_detail'] ?>" id="penilaian_kajian_konsultan_kontruksi_update8" name="penilaian_kajian_konsultan_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                    </td>
                                                                    <td><input type="text" name="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_update[]" value="<?= $cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek8['nilai_akhir_pekerjaan_konsultan_kajian_kontruksi_detail'] ?>" id="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek_update8" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                <?php    } else { ?>
                                                                    <td><?= $indikator_pekerjaan_kajian_konsultan_kontruksi8 ?>
                                                                        <textarea hidden id="indikator_pekerjaan_kajian_konsultan_kontruksi8" name="indikator_pekerjaan_kajian_konsultan_kontruksi[]"><?= $indikator_pekerjaan_kajian_konsultan_kontruksi8 ?></textarea>
                                                                    </td>
                                                                    <td>10
                                                                        <input type="hidden" id="bobot_pekerjaan_kajian_konsultan_kontruksi8" name="bobot_pekerjaan_kajian_konsultan_kontruksi[]" value="<?= $bobot_pekerjaan_kajian_konsultan_kontruksi8 ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="penilaian_kajian_konsultan_kontruksi8" name="penilaian_kajian_konsultan_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                    </td>
                                                                    <td><input type="text" name="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi[]" id="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek8" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                <?php   } ?>
                                                            </tr>
                                                            <tr>
                                                                <?php if ($cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek9) { ?>
                                                                    <td><?= $indikator_pekerjaan_kajian_konsultan_kontruksi9 ?>
                                                                        <textarea hidden id="indikator_pekerjaan_kajian_konsultan_kontruksi_update9" name="indikator_pekerjaan_kajian_konsultan_kontruksi_update[]"><?= $indikator_pekerjaan_kajian_konsultan_kontruksi9 ?></textarea>
                                                                    </td>
                                                                    <td>5
                                                                        <input type="hidden" id="bobot_pekerjaan_kajian_konsultan_kontruksi_update9" name="bobot_pekerjaan_kajian_konsultan_kontruksi_update[]" value="<?= $bobot_pekerjaan_kajian_konsultan_kontruksi9 ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" value="<?= $cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek9['penilaian_konsultan_kajian_kontruksi_detail'] ?>" id="penilaian_kajian_konsultan_kontruksi_update9" name="penilaian_kajian_konsultan_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                    </td>
                                                                    <td><input type="text" name="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_update[]" value="<?= $cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek9['nilai_akhir_pekerjaan_konsultan_kajian_kontruksi_detail'] ?>" id="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek_update9" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                <?php    } else { ?>
                                                                    <td><?= $indikator_pekerjaan_kajian_konsultan_kontruksi9 ?>
                                                                        <textarea hidden id="indikator_pekerjaan_kajian_konsultan_kontruksi9" name="indikator_pekerjaan_kajian_konsultan_kontruksi[]"><?= $indikator_pekerjaan_kajian_konsultan_kontruksi9 ?></textarea>
                                                                    </td>
                                                                    <td>5
                                                                        <input type="hidden" id="bobot_pekerjaan_kajian_konsultan_kontruksi9" name="bobot_pekerjaan_kajian_konsultan_kontruksi[]" value="<?= $bobot_pekerjaan_kajian_konsultan_kontruksi9 ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="penilaian_kajian_konsultan_kontruksi9" name="penilaian_kajian_konsultan_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                    </td>
                                                                    <td><input type="text" name="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi[]" id="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek9" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                <?php   } ?>
                                                            </tr>
                                                            <!-- Ke empat -->
                                                            <tr>

                                                                <td rowspan="2">4</td>
                                                                <td rowspan="2">Jadwal Dan Waktu
                                                                    (10%)
                                                                </td>
                                                                <?php if ($cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek10) { ?>
                                                                    <td><?= $indikator_pekerjaan_kajian_konsultan_kontruksi10 ?>
                                                                        <textarea hidden id="indikator_pekerjaan_kajian_konsultan_kontruksi_update10" name="indikator_pekerjaan_kajian_konsultan_kontruksi_update[]"><?= $indikator_pekerjaan_kajian_konsultan_kontruksi10 ?></textarea>
                                                                    </td>
                                                                    <td>5
                                                                        <input type="hidden" id="bobot_pekerjaan_kajian_konsultan_kontruksi_update10" name="bobot_pekerjaan_kajian_konsultan_kontruksi_update[]" value="<?= $bobot_pekerjaan_kajian_konsultan_kontruksi10 ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" value="<?= $cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek10['penilaian_konsultan_kajian_kontruksi_detail'] ?>" id="penilaian_kajian_konsultan_kontruksi_update10" name="penilaian_kajian_konsultan_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                    </td>
                                                                    <td><input type="text" name="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_update[]" value="<?= $cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek10['nilai_akhir_pekerjaan_konsultan_kajian_kontruksi_detail'] ?>" id="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek_update10" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                <?php    } else { ?>
                                                                    <td><?= $indikator_pekerjaan_kajian_konsultan_kontruksi10 ?>
                                                                        <textarea hidden id="indikator_pekerjaan_kajian_konsultan_kontruksi10" name="indikator_pekerjaan_kajian_konsultan_kontruksi[]"><?= $indikator_pekerjaan_kajian_konsultan_kontruksi10 ?></textarea>
                                                                    </td>
                                                                    <td>5
                                                                        <input type="hidden" id="bobot_pekerjaan_kajian_konsultan_kontruksi10" name="bobot_pekerjaan_kajian_konsultan_kontruksi[]" value="<?= $bobot_pekerjaan_kajian_konsultan_kontruksi10 ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="penilaian_kajian_konsultan_kontruksi10" name="penilaian_kajian_konsultan_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                    </td>
                                                                    <td><input type="text" name="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi[]" id="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek10" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                <?php   } ?>
                                                            </tr>
                                                            <tr>
                                                                <?php if ($cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek11) { ?>
                                                                    <td><?= $indikator_pekerjaan_kajian_konsultan_kontruksi11 ?>
                                                                        <textarea hidden id="indikator_pekerjaan_kajian_konsultan_kontruksi_update11" name="indikator_pekerjaan_kajian_konsultan_kontruksi_update[]"><?= $indikator_pekerjaan_kajian_konsultan_kontruksi11 ?></textarea>
                                                                    </td>
                                                                    <td>5
                                                                        <input type="hidden" id="bobot_pekerjaan_kajian_konsultan_kontruksi_update11" name="bobot_pekerjaan_kajian_konsultan_kontruksi_update[]" value="<?= $bobot_pekerjaan_kajian_konsultan_kontruksi11 ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" value="<?= $cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek11['penilaian_konsultan_kajian_kontruksi_detail'] ?>" id="penilaian_kajian_konsultan_kontruksi_update11" name="penilaian_kajian_konsultan_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                    </td>
                                                                    <td><input type="text" name="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_update[]" value="<?= $cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek11['nilai_akhir_pekerjaan_konsultan_kajian_kontruksi_detail'] ?>" id="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek_update11" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                <?php    } else { ?>
                                                                    <td><?= $indikator_pekerjaan_kajian_konsultan_kontruksi11 ?>
                                                                        <textarea hidden id="indikator_pekerjaan_kajian_konsultan_kontruksi11" name="indikator_pekerjaan_kajian_konsultan_kontruksi[]"><?= $indikator_pekerjaan_kajian_konsultan_kontruksi11 ?></textarea>
                                                                    </td>
                                                                    <td>5
                                                                        <input type="hidden" id="bobot_pekerjaan_kajian_konsultan_kontruksi11" name="bobot_pekerjaan_kajian_konsultan_kontruksi[]" value="<?= $bobot_pekerjaan_kajian_konsultan_kontruksi11 ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="penilaian_kajian_konsultan_kontruksi11" name="penilaian_kajian_konsultan_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                    </td>
                                                                    <td><input type="text" name="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi[]" id="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek11" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                <?php   } ?>
                                                            </tr>

                                                            <!-- Ke lima -->
                                                            <tr>

                                                                <td rowspan="3">5</td>
                                                                <td rowspan="3">Presentasi Laporan (15%)
                                                                </td>
                                                                <?php if ($cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek12) { ?>
                                                                    <td><?= $indikator_pekerjaan_kajian_konsultan_kontruksi12 ?>
                                                                        <textarea hidden id="indikator_pekerjaan_kajian_konsultan_kontruksi_update12" name="indikator_pekerjaan_kajian_konsultan_kontruksi_update[]"><?= $indikator_pekerjaan_kajian_konsultan_kontruksi12 ?></textarea>
                                                                    </td>
                                                                    <td>5
                                                                        <input type="hidden" id="bobot_pekerjaan_kajian_konsultan_kontruksi_update12" name="bobot_pekerjaan_kajian_konsultan_kontruksi_update[]" value="<?= $bobot_pekerjaan_kajian_konsultan_kontruksi12 ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" value="<?= $cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek12['penilaian_konsultan_kajian_kontruksi_detail'] ?>" id="penilaian_kajian_konsultan_kontruksi_update12" name="penilaian_kajian_konsultan_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                    </td>
                                                                    <td><input type="text" name="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_update[]" value="<?= $cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek12['nilai_akhir_pekerjaan_konsultan_kajian_kontruksi_detail'] ?>" id="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek_update12" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                <?php    } else { ?>
                                                                    <td><?= $indikator_pekerjaan_kajian_konsultan_kontruksi12 ?>
                                                                        <textarea hidden id="indikator_pekerjaan_kajian_konsultan_kontruksi12" name="indikator_pekerjaan_kajian_konsultan_kontruksi[]"><?= $indikator_pekerjaan_kajian_konsultan_kontruksi12 ?></textarea>
                                                                    </td>
                                                                    <td>5
                                                                        <input type="hidden" id="bobot_pekerjaan_kajian_konsultan_kontruksi12" name="bobot_pekerjaan_kajian_konsultan_kontruksi[]" value="<?= $bobot_pekerjaan_kajian_konsultan_kontruksi12 ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="penilaian_kajian_konsultan_kontruksi12" name="penilaian_kajian_konsultan_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                    </td>
                                                                    <td><input type="text" name="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi[]" id="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek12" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                <?php   } ?>

                                                            </tr>
                                                            <tr>
                                                                <?php if ($cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek13) { ?>
                                                                    <td><?= $indikator_pekerjaan_kajian_konsultan_kontruksi13 ?>
                                                                        <textarea hidden id="indikator_pekerjaan_kajian_konsultan_kontruksi_update13" name="indikator_pekerjaan_kajian_konsultan_kontruksi_update[]"><?= $indikator_pekerjaan_kajian_konsultan_kontruksi13 ?></textarea>
                                                                    </td>
                                                                    <td>5
                                                                        <input type="hidden" id="bobot_pekerjaan_kajian_konsultan_kontruksi_update13" name="bobot_pekerjaan_kajian_konsultan_kontruksi_update[]" value="<?= $bobot_pekerjaan_kajian_konsultan_kontruksi13 ?>">
                                                                    </td>
                                                                    <td>

                                                                        <input type="text" value="<?= $cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek13['penilaian_konsultan_kajian_kontruksi_detail'] ?>" id="penilaian_kajian_konsultan_kontruksi_update13" name="penilaian_kajian_konsultan_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                    </td>
                                                                    <td><input type="text" name="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_update[]" value="<?= $cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek13['nilai_akhir_pekerjaan_konsultan_kajian_kontruksi_detail'] ?>" id="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek_update13" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                <?php    } else { ?>
                                                                    <td><?= $indikator_pekerjaan_kajian_konsultan_kontruksi13 ?>
                                                                        <textarea hidden id="indikator_pekerjaan_kajian_konsultan_kontruksi13" name="indikator_pekerjaan_kajian_konsultan_kontruksi[]"><?= $indikator_pekerjaan_kajian_konsultan_kontruksi13 ?></textarea>
                                                                    </td>
                                                                    <td>5
                                                                        <input type="hidden" id="bobot_pekerjaan_kajian_konsultan_kontruksi13" name="bobot_pekerjaan_kajian_konsultan_kontruksi[]" value="<?= $bobot_pekerjaan_kajian_konsultan_kontruksi13 ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="penilaian_kajian_konsultan_kontruksi13" name="penilaian_kajian_konsultan_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                    </td>
                                                                    <td><input type="text" name="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi[]" id="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek13" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                <?php   } ?>
                                                            </tr>
                                                            <tr>
                                                                <?php if ($cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek14) { ?>
                                                                    <td><?= $indikator_pekerjaan_kajian_konsultan_kontruksi14 ?>
                                                                        <textarea hidden id="indikator_pekerjaan_kajian_konsultan_kontruksi_update14" name="indikator_pekerjaan_kajian_konsultan_kontruksi_update[]"><?= $indikator_pekerjaan_kajian_konsultan_kontruksi14 ?></textarea>
                                                                    </td>
                                                                    <td>5
                                                                        <input type="hidden" id="bobot_pekerjaan_kajian_konsultan_kontruksi_update14" name="bobot_pekerjaan_kajian_konsultan_kontruksi_update[]" value="<?= $bobot_pekerjaan_kajian_konsultan_kontruksi14 ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" value="<?= $cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek14['penilaian_konsultan_kajian_kontruksi_detail'] ?>" id="penilaian_kajian_konsultan_kontruksi_update14" name="penilaian_kajian_konsultan_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                    </td>
                                                                    <td><input type="text" name="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_update[]" value="<?= $cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek14['nilai_akhir_pekerjaan_konsultan_kajian_kontruksi_detail'] ?>" id="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek_update14" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                <?php    } else { ?>
                                                                    <td><?= $indikator_pekerjaan_kajian_konsultan_kontruksi14 ?>
                                                                        <textarea hidden id="indikator_pekerjaan_kajian_konsultan_kontruksi14" name="indikator_pekerjaan_kajian_konsultan_kontruksi[]"><?= $indikator_pekerjaan_kajian_konsultan_kontruksi14 ?></textarea>
                                                                    </td>
                                                                    <td>5
                                                                        <input type="hidden" id="bobot_pekerjaan_kajian_konsultan_kontruksi14" name="bobot_pekerjaan_kajian_konsultan_kontruksi[]" value="<?= $bobot_pekerjaan_kajian_konsultan_kontruksi14 ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="penilaian_kajian_konsultan_kontruksi14" name="penilaian_kajian_konsultan_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                    </td>
                                                                    <td><input type="text" name="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi[]" id="nilai_akhir_pekerjaan_kajian_konsultan_kontruksi_aspek14" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                <?php   } ?>
                                                            </tr>
                                                            <?php if ($jika_sudah_di_tambah_pekerjaan_kajian_konsultan_kontruksi) { ?>
                                                                <?php foreach ($jika_sudah_di_tambah_pekerjaan_kajian_konsultan_kontruksi as $key => $value) { ?>
                                                                    <input type="hidden" name="id_detail_penilaian_pekerjaan_kajian_konsultan_kontruksi[]" value="<?= $value['id_penilaian_pekerjaan_konsultan_kajian_kontruksi_detail'] ?>">
                                                                <?php } ?>
                                                                <tfoot>
                                                                    <tr class="text-center">
                                                                        <td></td>
                                                                        <td><b> RATING </b></td>
                                                                        <td>
                                                                            <div id="status_pekerjaan_kajian_konsultan_kontruksi_update">
                                                                                <?php if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 51) { ?>
                                                                                    <label for="" class="badge badge-danger">kurang Baik</label>
                                                                                <?php   } else if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 70) { ?>
                                                                                    <label for="" class="badge badge-warning">cukup Baik</label>
                                                                                <?php } else if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 80) { ?>
                                                                                    <label for="" class="badge badge-warning">Baik</label>
                                                                                <?php  } else { ?>
                                                                                    <label for="" class="badge badge-success">Sangat Baik</label>
                                                                                <?php   } ?>
                                                                            </div>
                                                                        </td>
                                                                        <td colspan="3">
                                                                            <div id="bintang_pekerjaan_kajian_konsultan_kontruksi_update">
                                                                                <?php if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 51) { ?>
                                                                                    ''
                                                                                <?php   } else if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 70) { ?>
                                                                                    <i class="fas fa fa-star text-warning"></i>
                                                                                <?php } else if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 80) { ?>
                                                                                    <i class="fas fa fa-star text-warning"></i><i class="fas fa fa-star text-warning"></i>
                                                                                <?php  } else { ?>
                                                                                    <i class="fas fa fa-star text-warning"></i> <i class="fas fa fa-star text-warning"></i> <i class="fas fa fa-star text-warning"></i>
                                                                                <?php   } ?>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tfoot>
                                                                <tfoot>
                                                                    <tr class="text-center">
                                                                        <td></td>
                                                                        <td colspan="2"><b> TOTAL NILAI AKHIR </b></td>
                                                                        <td><b>100</b></td>
                                                                        <td></td>
                                                                        <td><input type="number" style="width: 80px;" value="<?= $vendor_mengikuti_paket['rating_nilai_akhir'] ?>" class="form-control form-control-sm" readonly id="total_nilai_pekerjaan_kajian_konsultan_kontruksi_update"></td>
                                                                    </tr>
                                                                </tfoot>

                                                                <br>
                                                        </table>
                                                    </form>
                                                </div><br>
                                                <center>
                                                    <div class="row">
                                                        <div class="col">
                                                            <a class="btn btn-grad7 text-white btn-sm btn-block" style="box-shadow: 2px 2px 8px 2px black;" href="<?= base_url('beranda/penilaian_kinerja') ?>"><i class="fas fa fa-arrow-left"></i> Kembali</a>
                                                        </div>
                                                        <div class="col">
                                                            <div> <button type="button" onclick="Reset_nilai_pekerjaan_kajian_konsultan_kontruksi()" class="btn btn-danger text-white btn-sm btn-block">Reset Penilaian</button></div>
                                                        </div>
                                                    </div>
                                                </center>
                                            <?php    } else { ?>
                                                <input type="hidden" name="rating_penilaian_vendor_pekerjaan_kajian_konsultan_kontruksi">
                                                <input type="hidden" name="status_rating_pekerjaan_kajian_konsultan_kontruksi">
                                                <input type="hidden" name="status_nilai_akhir_pekerjaan_kajian_konsultan_kontruksi">
                                                <tfoot>
                                                    <tr class="text-center">
                                                        <td></td>
                                                        <td><b> RATING </b></td>
                                                        <td>
                                                            <div id="status_pekerjaan_kajian_konsultan_kontruksi">

                                                            </div>
                                                        </td>
                                                        <td colspan="3">
                                                            <div id="bintang_pekerjaan_kajian_konsultan_kontruksi"></div>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                                <tfoot>
                                                    <tr class="text-center">
                                                        <td></td>
                                                        <td colspan="2"><b> TOTAL NILAI AKHIR </b></td>
                                                        <td><b>100</b></td>
                                                        <td></td>
                                                        <td><input type="number" style="width: 80px;" class="form-control form-control-sm" readonly id="total_nilai_pekerjaan_kajian_konsultan_kontruksi"></td>
                                                    </tr>
                                                </tfoot>
                                                </table>
                                                </form>
                                            </div><br>
                                            <center>
                                                <div class="row">
                                                    <div class="col">
                                                        <a class="btn btn-grad7 text-white btn-sm btn-block" style="box-shadow: 2px 2px 8px 2px black;" href="<?= base_url('beranda/penilaian_kinerja') ?>"><i class="fas fa fa-arrow-left"></i> Kembali</a>
                                                    </div>
                                                    <div class="col">
                                                        <div id="save_button_kajian_konsultan_kontruksi" style="display: none;"> <button type="button" onclick="Simpan_pekerjaan_kajian_konsultan_kontruksi()" class="btn btn-grad8 text-white btn-sm btn-block">Simpan kajian konsultan Penilaian</button></div>
                                                        <div id="warning_button_kajian_konsultan_kontruksi" style="display: none;"> <button type="button" onclick="Simpan_Warning_pekerjaan_kajian_konsultan_kontruksi_warning()" class="btn btn-grad10 text-white btn-sm btn-block">warning kajian konsultan Penilaian</button></div>
                                                    </div>
                                                </div>
                                            </center>
                                        <?php   } ?>
                                        </div>
                                        </div>
                                    </div>

                                    <!-- END PENILAIAN KKONSULTAN KAJIAN KONTRUKSI -->


                                    <!-- BAGIAN KONSULTAN PENGAWAS KONTRUKSI -->
                                    <?php if ($data_pemenang['status_jenis_penilayan'] == 'konsultan pengawas kontruksi') { ?>
                                        <div class="tab-pane fade show active" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                        <?php  } else { ?>
                                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                            <?php  } ?>
                                            <div class="card" style="box-shadow: 2px 2px 10px 2px black;">
                                                <div class="card-header btn-grad">
                                                    <i class="fas fa-chart-line"></i> Penilaian Konsultan Pengawas Kontruksi
                                                </div>
                                                <div class="card-body">
                                                    <div style="overflow-x: auto;">
                                                        <table class="table" style="font-size: 12px;">
                                                            <tr>
                                                                <th>Kode Tender</th>
                                                                <th>: <?= $data_pemenang['kode_tender'] ?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Nama Paket</th>
                                                                <th>: <?= $data_pemenang['nama_paket'] ?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Divisi</th>
                                                                <th>: <?= $data_pemenang['nama_unit_kerja'] ?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Nama Vendor</th>
                                                                <th>: <?= $data_pemenang['username_vendor'] ?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Alamat Perusahaan</th>
                                                                <?php if ($data_pemenang['alamat_vendor'] == null) { ?>
                                                                    <th>: <?= $data_pemenang['alamat_usaha'] ?></th>
                                                                <?php  } else { ?>
                                                                    <th>: <?= $data_pemenang['alamat_vendor'] ?></th>
                                                                <?php } ?>
                                                            </tr>
                                                            <?php $no = 1;
                                                            foreach ($lokasi_kerja as $key => $value) { ?>
                                                                <tr>
                                                                    <th>Lokasi Pekerjaan <?= $no++ ?></th>
                                                                    <th>: Provinsi : <?= $value['nama_provinsi'] ?>
                                                                        <br> : Kabupaten : <?= $value['nama_kabupaten'] ?>
                                                                        <br> : Alamat : <?= $value['detail_lokasi'] ?>
                                                                    </th>
                                                                </tr>
                                                            <?php } ?>
                                                            <tr>
                                                                <th>Nilai Kontrak</th>
                                                                <th>: <?= "Rp " . number_format($data_pemenang['negosiasi'], 2, ',', '.') ?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Nomor Kontrak</th>
                                                                <th>&nbsp;
                                                                    <div class="row">
                                                                        <input style="width: 200px;height:30px" type="text" name="nomor_kontrak4" value="<?= $data_pemenang['nomor_kontrak'] ?>" id="nomor_kontrak4" placeholder="Nomor Kontrak..." class="form-control form-control-sm ml-2"><input style="width: 200px;height:30px" type="text" name="tanggal_nomor_kontak4" value="<?= $data_pemenang['tanggal_nomor_kontak'] ?>" id="tanggal_nomor_kontak4" placeholder="Tanggal" class="form-control form-control-sm ml-1">
                                                                    </div>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th>Jangka Waktu Pelaksanaan</th>
                                                                <th>
                                                                    <div class="row">
                                                                        <input style="width: 200px;height:30px" type="text" name="jangka_mulai4" placeholder="Tanggal Mulai" value="<?= $data_pemenang['jangka_mulai'] ?>" id="jangka_mulai4" class="form-control form-control-sm ml-2 mr-1"><label for="" class="text-small mt-1">S/D</label> <input style="width: 200px;height:30px" type="text" value="<?= $data_pemenang['jangka_selesai'] ?>" name="jangka_selesai4" id="jangka_selesai4" placeholder="Tanggal Selesai" class="form-control form-control-sm ml-1">
                                                                    </div>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th>Metode Pemilihan</th>
                                                                <th>: <?= $data_pemenang['nama_metode_pemilihan'] ?></th>
                                                            </tr>
                                                        </table><br>
                                                        <?php if ($data_pemenang['status_warning_vendor'] == 1) { ?>
                                                            <div class="alert alert-warning" role="alert">
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <img src="<?= base_url('assets/img/warning.png') ?>" width="70px" alt="">
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <label for="">Vendor Telah Memiliki 1 Kali Warning Maka Jika Vendor Mendapatkan Warning ke-2 Vendor Akan Di Blacklist Otomatis Oleh Sistem Selama 2 Tahun !!!</label>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        <?php } else if ($data_pemenang['status_warning_vendor'] == 2) { ?>
                                                            <div class="alert alert-danger" role="alert">
                                                                <img src="<?= base_url('assets/img/blacklist.png') ?>" width="70px" alt="">
                                                                <label for="">Vendor Telah TerBlacklist Oleh Sistem Selama 2 Tahun !!!</label>
                                                            </div>
                                                        <?php   } else { ?>
                                                            <div class="alert alert-success" role="alert">
                                                                <img src="<?= base_url('assets/img/aman2.png') ?>" width="70px" alt="">
                                                                <label for="">Vendor Ini Aman / Tiadak Memiliki Warning !!!</label>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="card" style="box-shadow: 2px 2px 10px 2px black;">
                                                <div class="card-header btn-grad">
                                                    <i class="fas fa-chart-line"></i> Table Penilaian Konsultan Pengawas Kontruksi
                                                </div>
                                                <div class="card-body">
                                                    <div style="overflow-x: auto;">
                                                        <form action="" id="form_tambah_pekerjaan_konsultan_pengawas_kontruksi">
                                                            <input type="hidden" name="id_paket" value="<?= $data_pemenang['id_paket'] ?>">
                                                            <input type="hidden" name="id_vendor" value="<?= $data_pemenang['id_mengikuti_vendor'] ?>">
                                                            <table id="nilai_tbl" class="table table-bordered">
                                                                <tr class="btn-grad">
                                                                    <th>No</th>
                                                                    <th>Aspek Kerja</th>
                                                                    <th>Indikator</th>
                                                                    <th>Bobot(%)</th>
                                                                    <th>Penilaian</th>
                                                                    <th>Nilai Akhir</th>
                                                                </tr>
                                                                <tr>

                                                                    <td rowspan="3">1</td>
                                                                    <td rowspan="3">Administrasi
                                                                        (15%)</td>
                                                                    <!-- ketika update  -->
                                                                    <?php if ($cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek1) { ?>
                                                                        <td>
                                                                            <?= $indikator_konsultan_pengawas_kontruksi1 ?>
                                                                            <textarea id="indikator_pekerjaan_konsultan_pengawas_kontruksi_update1" hidden name="indikator_pekerjaan_konsultan_pengawas_kontruksi_update[]"><?= $indikator_konsultan_pengawas_kontruksi1 ?></textarea>
                                                                        </td>
                                                                        <td>5
                                                                            <input type="hidden" id="bobot_pekerjaan_konsultan_pengawas_kontruksi_update1" name="bobot_pekerjaan_konsultan_pengawas_kontruksi_update[]" value="<?= $bobot_pekerjaan_konsultan_pengawas_kontruksi1 ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek1['penilaian_konsultan_pengawasan_kontruksi_detail'] ?>" id="penilaian_konsultan_pengawas_kontruksi_update1" name="penilaian_konsultan_pengawas_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                        </td>
                                                                        <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek1['nilai_akhir_pekerjaan_konsultan_pengawasan_kontruksi_detail'] ?>" value="<?= $cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek1['nilai_akhir_pekerjaan_konsultan_pengawasan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek_update1" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                        <!-- ketika tambah -->
                                                                    <?php } else { ?>
                                                                        <td>
                                                                            <?= $indikator_konsultan_pengawas_kontruksi1 ?>
                                                                            <textarea id="indikator_pekerjaan_konsultan_pengawas_kontruksi1" hidden name="indikator_pekerjaan_konsultan_pengawas_kontruksi[]"><?= $indikator_konsultan_pengawas_kontruksi1 ?></textarea>
                                                                        </td>
                                                                        <td>5
                                                                            <input type="hidden" id="bobot_pekerjaan_konsultan_pengawas_kontruksi1" name="bobot_pekerjaan_konsultan_pengawas_kontruksi[]" value="<?= $bobot_pekerjaan_konsultan_pengawas_kontruksi1 ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="penilaian_konsultan_pengawas_kontruksi1" name="penilaian_konsultan_pengawas_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                        </td>
                                                                        <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek1" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                    <?php   } ?>
                                                                </tr>
                                                                <tr>
                                                                    <?php if ($cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek2) { ?>
                                                                        <td>
                                                                            <?= $indikator_konsultan_pengawas_kontruksi2 ?>
                                                                            <textarea id="indikator_pekerjaan_konsultan_pengawas_kontruksi_update2" name="indikator_pekerjaan_konsultan_pengawas_kontruksi_update[]" hidden><?= $indikator_konsultan_pengawas_kontruksi2 ?>
                                                    </textarea>
                                                                        </td>
                                                                        <td>5
                                                                            <input type="hidden" id="bobot_pekerjaan_konsultan_pengawas_kontruksi_update2" name="bobot_pekerjaan_konsultan_pengawas_kontruksi_update[]" value="<?= $bobot_pekerjaan_konsultan_pengawas_kontruksi2 ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek2['penilaian_konsultan_pengawasan_kontruksi_detail'] ?>" id="penilaian_konsultan_pengawas_kontruksi_update2" name="penilaian_konsultan_pengawas_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                        </td>
                                                                        <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek2['nilai_akhir_pekerjaan_konsultan_pengawasan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek_update2" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                    <?php    } else { ?>
                                                                        <td>
                                                                            <?= $indikator_konsultan_pengawas_kontruksi2 ?>
                                                                            <textarea id="indikator_pekerjaan_konsultan_pengawas_kontruksi2" name="indikator_pekerjaan_konsultan_pengawas_kontruksi[]" hidden><?= $indikator_konsultan_pengawas_kontruksi2 ?>
                                                    </textarea>
                                                                        </td>
                                                                        <td>5
                                                                            <input type="hidden" id="bobot_pekerjaan_konsultan_pengawas_kontruksi2" name="bobot_pekerjaan_konsultan_pengawas_kontruksi[]" value="<?= $bobot_pekerjaan_konsultan_pengawas_kontruksi2 ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="penilaian_konsultan_pengawas_kontruksi2" name="penilaian_konsultan_pengawas_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                        </td>
                                                                        <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek2" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                    <?php   } ?>


                                                                </tr>
                                                                <tr>
                                                                    <?php if ($cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek3) { ?>
                                                                        <td><?= $indikator_konsultan_pengawas_kontruksi3 ?>
                                                                            <textarea hidden id="indikator_pekerjaan_konsultan_pengawas_kontruksi_update3" name="indikator_pekerjaan_konsultan_pengawas_kontruksi_update[]"><?= $indikator_konsultan_pengawas_kontruksi3 ?></textarea>
                                                                        </td>
                                                                        <td>5
                                                                            <input type="hidden" id="bobot_pekerjaan_konsultan_pengawas_kontruksi_update3" name="bobot_pekerjaan_konsultan_pengawas_kontruksi_update[]" value="<?= $bobot_pekerjaan_konsultan_pengawas_kontruksi3 ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek3['penilaian_konsultan_pengawasan_kontruksi_detail'] ?>" id="penilaian_konsultan_pengawas_kontruksi_update3" name="penilaian_konsultan_pengawas_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                        </td>
                                                                        <td><input type=" text" value="<?= $cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek3['nilai_akhir_pekerjaan_konsultan_pengawasan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek_update3" class="form-control form-control-sm" readonly style="width: 60px;">
                                                                        </td>
                                                                    <?php    } else { ?>
                                                                        <td><?= $indikator_konsultan_pengawas_kontruksi3 ?>
                                                                            <textarea hidden id="indikator_pekerjaan_konsultan_pengawas_kontruksi3" name="indikator_pekerjaan_konsultan_pengawas_kontruksi[]"><?= $indikator_konsultan_pengawas_kontruksi3 ?></textarea>
                                                                        </td>
                                                                        <td>5
                                                                            <input type="hidden" id="bobot_pekerjaan_konsultan_pengawas_kontruksi3" name="bobot_pekerjaan_konsultan_pengawas_kontruksi[]" value="<?= $bobot_pekerjaan_konsultan_pengawas_kontruksi3 ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="penilaian_konsultan_pengawas_kontruksi3" name="penilaian_konsultan_pengawas_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                        </td>
                                                                        <td><input type=" text" name="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek3" class="form-control form-control-sm" readonly style="width: 60px;">
                                                                        </td>
                                                                    <?php   } ?>
                                                                </tr>
                                                                <!-- Kedua -->
                                                                <tr>

                                                                    <td rowspan="2">2</td>
                                                                    <td rowspan="2">Tenaga Ahli Dan Tenaga Teknis (25%)</td>


                                                                    <?php if ($cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek4) { ?>
                                                                        <td><?= $indikator_konsultan_pengawas_kontruksi4 ?>
                                                                            <textarea hidden id="indikator_pekerjaan_konsultan_pengawas_kontruksi_update4" name="indikator_pekerjaan_konsultan_pengawas_kontruksi_update[]"><?= $indikator_konsultan_pengawas_kontruksi4 ?></textarea>
                                                                        </td>
                                                                        <td>15
                                                                            <input type="hidden" id="bobot_pekerjaan_konsultan_pengawas_kontruksi_update4" name="bobot_pekerjaan_konsultan_pengawas_kontruksi_update[]" value="<?= $bobot_pekerjaan_konsultan_pengawas_kontruksi4 ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek4['penilaian_konsultan_pengawasan_kontruksi_detail'] ?>" id="penilaian_konsultan_pengawas_kontruksi_update4" name="penilaian_konsultan_pengawas_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                        </td>
                                                                        <td><input type=" text" value="<?= $cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek4['nilai_akhir_pekerjaan_konsultan_pengawasan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek_update4" class="form-control form-control-sm" readonly style="width: 60px;">
                                                                        </td>
                                                                    <?php    } else { ?>
                                                                        <td><?= $indikator_konsultan_pengawas_kontruksi4 ?>
                                                                            <textarea hidden id="indikator_pekerjaan_konsultan_pengawas_kontruksi4" name="indikator_pekerjaan_konsultan_pengawas_kontruksi[]"><?= $indikator_konsultan_pengawas_kontruksi4 ?></textarea>
                                                                        </td>
                                                                        <td>15
                                                                            <input type="hidden" id="bobot_pekerjaan_konsultan_pengawas_kontruksi4" name="bobot_pekerjaan_konsultan_pengawas_kontruksi[]" value="<?= $bobot_pekerjaan_konsultan_pengawas_kontruksi4 ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="penilaian_konsultan_pengawas_kontruksi4" name="penilaian_konsultan_pengawas_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                        </td>
                                                                        <td><input type=" text" name="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek4" class="form-control form-control-sm" readonly style="width: 60px;">
                                                                        </td>
                                                                    <?php   } ?>
                                                                </tr>
                                                                <tr>
                                                                    <?php if ($cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek5) { ?>

                                                                        <td><?= $indikator_konsultan_pengawas_kontruksi5 ?>
                                                                            <textarea hidden id="indikator_pekerjaan_konsultan_pengawas_kontruksi_update5" name="indikator_pekerjaan_konsultan_pengawas_kontruksi_update[]"><?= $indikator_konsultan_pengawas_kontruksi5 ?></textarea>
                                                                        </td>
                                                                        <td>10
                                                                            <input type="hidden" id="bobot_pekerjaan_konsultan_pengawas_kontruksi_update5" name="bobot_pekerjaan_konsultan_pengawas_kontruksi_update[]" value="<?= $bobot_pekerjaan_konsultan_pengawas_kontruksi5 ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek5['penilaian_konsultan_pengawasan_kontruksi_detail'] ?>" id="penilaian_konsultan_pengawas_kontruksi_update5" name="penilaian_konsultan_pengawas_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                        </td>
                                                                        <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek5['nilai_akhir_pekerjaan_konsultan_pengawasan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek_update5" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                    <?php    } else { ?>
                                                                        <td><?= $indikator_konsultan_pengawas_kontruksi5 ?>
                                                                            <textarea hidden id="indikator_pekerjaan_konsultan_pengawas_kontruksi5" name="indikator_pekerjaan_konsultan_pengawas_kontruksi[]"><?= $indikator_konsultan_pengawas_kontruksi5 ?></textarea>
                                                                        </td>
                                                                        <td>10
                                                                            <input type="hidden" id="bobot_pekerjaan_konsultan_pengawas_kontruksi5" name="bobot_pekerjaan_konsultan_pengawas_kontruksi[]" value="<?= $bobot_pekerjaan_konsultan_pengawas_kontruksi5 ?>">
                                                                        </td>
                                                                        <td>

                                                                            <input type="text" id="penilaian_konsultan_pengawas_kontruksi5" name="penilaian_konsultan_pengawas_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                        </td>
                                                                        <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek5" class="form-control form-control-sm" readonly style="width: 60px;"></td>

                                                                    <?php   } ?>
                                                                </tr>
                                                                <!-- Ketiga -->
                                                                <tr>

                                                                    <td rowspan="4">3</td>
                                                                    <td rowspan="4">Kualitas Dan Kuantitas Produk
                                                                        (30%)
                                                                    </td>
                                                                    <?php if ($cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek6) { ?>
                                                                        <td><?= $indikator_konsultan_pengawas_kontruksi6 ?>
                                                                            <textarea hidden id="indikator_pekerjaan_konsultan_pengawas_kontruksi_update6" name="indikator_pekerjaan_konsultan_pengawas_kontruksi_update[]"><?= $indikator_konsultan_pengawas_kontruksi6 ?></textarea>
                                                                        </td>
                                                                        <td>10
                                                                            <input type="hidden" id="bobot_pekerjaan_konsultan_pengawas_kontruksi_update6" name="bobot_pekerjaan_konsultan_pengawas_kontruksi_update[]" value="<?= $bobot_pekerjaan_konsultan_pengawas_kontruksi6 ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek6['penilaian_konsultan_pengawasan_kontruksi_detail'] ?>" id="penilaian_konsultan_pengawas_kontruksi_update6" name="penilaian_konsultan_pengawas_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                        </td>
                                                                        <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek6['nilai_akhir_pekerjaan_konsultan_pengawasan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek_update6" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                    <?php    } else { ?>
                                                                        <td><?= $indikator_konsultan_pengawas_kontruksi6 ?>
                                                                            <textarea hidden id="indikator_pekerjaan_konsultan_pengawas_kontruksi6" name="indikator_pekerjaan_konsultan_pengawas_kontruksi[]"><?= $indikator_konsultan_pengawas_kontruksi6 ?></textarea>
                                                                        </td>
                                                                        <td>10
                                                                            <input type="hidden" id="bobot_pekerjaan_konsultan_pengawas_kontruksi6" name="bobot_pekerjaan_konsultan_pengawas_kontruksi[]" value="<?= $bobot_pekerjaan_konsultan_pengawas_kontruksi6 ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="penilaian_konsultan_pengawas_kontruksi6" name="penilaian_konsultan_pengawas_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                        </td>
                                                                        <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek6" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                    <?php   } ?>

                                                                </tr>
                                                                <tr>

                                                                    <?php if ($cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek7) { ?>
                                                                        <td><?= $indikator_konsultan_pengawas_kontruksi7 ?>
                                                                            <textarea hidden id="indikator_pekerjaan_konsultan_pengawas_kontruksi_update7" name="indikator_pekerjaan_konsultan_pengawas_kontruksi_update[]"><?= $indikator_konsultan_pengawas_kontruksi7 ?></textarea>
                                                                        </td>
                                                                        <td>5
                                                                            <input type="hidden" id="bobot_pekerjaan_konsultan_pengawas_kontruksi_update7" name="bobot_pekerjaan_konsultan_pengawas_kontruksi_update[]" value="<?= $bobot_pekerjaan_konsultan_pengawas_kontruksi7 ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek7['penilaian_konsultan_pengawasan_kontruksi_detail'] ?>" id="penilaian_konsultan_pengawas_kontruksi_update7" name="penilaian_konsultan_pengawas_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                        </td>
                                                                        <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek7['nilai_akhir_pekerjaan_konsultan_pengawasan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek_update7" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                    <?php    } else { ?>
                                                                        <td><?= $indikator_konsultan_pengawas_kontruksi7 ?>
                                                                            <textarea hidden id="indikator_pekerjaan_konsultan_pengawas_kontruksi7" name="indikator_pekerjaan_konsultan_pengawas_kontruksi[]"><?= $indikator_konsultan_pengawas_kontruksi7 ?></textarea>
                                                                        </td>
                                                                        <td>5
                                                                            <input type="hidden" id="bobot_pekerjaan_konsultan_pengawas_kontruksi7" name="bobot_pekerjaan_konsultan_pengawas_kontruksi[]" value="<?= $bobot_pekerjaan_konsultan_pengawas_kontruksi7 ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="penilaian_konsultan_pengawas_kontruksi7" name="penilaian_konsultan_pengawas_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                        </td>
                                                                        <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek7" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                    <?php   } ?>
                                                                </tr>
                                                                <tr>
                                                                    <?php if ($cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek8) { ?>

                                                                        <td><?= $indikator_konsultan_pengawas_kontruksi8 ?>
                                                                            <textarea hidden id="indikator_pekerjaan_konsultan_pengawas_kontruksi_update8" name="indikator_pekerjaan_konsultan_pengawas_kontruksi_update[]"><?= $indikator_konsultan_pengawas_kontruksi8 ?></textarea>
                                                                        </td>
                                                                        <td>10
                                                                            <input type="hidden" id="bobot_pekerjaan_konsultan_pengawas_kontruksi_update8" name="bobot_pekerjaan_konsultan_pengawas_kontruksi_update[]" value="<?= $bobot_pekerjaan_konsultan_pengawas_kontruksi8 ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek8['penilaian_konsultan_pengawasan_kontruksi_detail'] ?>" id="penilaian_konsultan_pengawas_kontruksi_update8" name="penilaian_konsultan_pengawas_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                        </td>
                                                                        <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek8['nilai_akhir_pekerjaan_konsultan_pengawasan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek_update8" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                    <?php    } else { ?>
                                                                        <td><?= $indikator_konsultan_pengawas_kontruksi8 ?>
                                                                            <textarea hidden id="indikator_pekerjaan_konsultan_pengawas_kontruksi8" name="indikator_pekerjaan_konsultan_pengawas_kontruksi[]"><?= $indikator_konsultan_pengawas_kontruksi8 ?></textarea>
                                                                        </td>
                                                                        <td>10
                                                                            <input type="hidden" id="bobot_pekerjaan_konsultan_pengawas_kontruksi8" name="bobot_pekerjaan_konsultan_pengawas_kontruksi[]" value="<?= $bobot_pekerjaan_konsultan_pengawas_kontruksi8 ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="penilaian_konsultan_pengawas_kontruksi8" name="penilaian_konsultan_pengawas_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                        </td>
                                                                        <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek8" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                    <?php   } ?>
                                                                </tr>
                                                                <tr>
                                                                    <?php if ($cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek9) { ?>

                                                                        <td><?= $indikator_konsultan_pengawas_kontruksi9 ?>
                                                                            <textarea hidden id="indikator_pekerjaan_konsultan_pengawas_kontruksi_update9" name="indikator_pekerjaan_konsultan_pengawas_kontruksi_update[]"><?= $indikator_konsultan_pengawas_kontruksi9 ?></textarea>
                                                                        </td>
                                                                        <td>10
                                                                            <input type="hidden" id="bobot_pekerjaan_konsultan_pengawas_kontruksi_update9" name="bobot_pekerjaan_konsultan_pengawas_kontruksi_update[]" value="<?= $bobot_pekerjaan_konsultan_pengawas_kontruksi9 ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek9['penilaian_konsultan_pengawasan_kontruksi_detail'] ?>" id="penilaian_konsultan_pengawas_kontruksi_update9" name="penilaian_konsultan_pengawas_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                        </td>
                                                                        <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek9['nilai_akhir_pekerjaan_konsultan_pengawasan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek_update9" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                    <?php    } else { ?>
                                                                        <td><?= $indikator_konsultan_pengawas_kontruksi9 ?>
                                                                            <textarea hidden id="indikator_pekerjaan_konsultan_pengawas_kontruksi9" name="indikator_pekerjaan_konsultan_pengawas_kontruksi[]"><?= $indikator_konsultan_pengawas_kontruksi9 ?></textarea>
                                                                        </td>
                                                                        <td>10
                                                                            <input type="hidden" id="bobot_pekerjaan_konsultan_pengawas_kontruksi9" name="bobot_pekerjaan_konsultan_pengawas_kontruksi[]" value="<?= $bobot_pekerjaan_konsultan_pengawas_kontruksi9 ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="penilaian_konsultan_pengawas_kontruksi9" name="penilaian_konsultan_pengawas_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                        </td>
                                                                        <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek9" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                    <?php   } ?>
                                                                </tr>
                                                                <!-- Ke empat -->
                                                                <tr>

                                                                    <td rowspan="2">4</td>
                                                                    <td rowspan="2">Jadwal Dan Waktu
                                                                        (10%)
                                                                    </td>
                                                                    <?php if ($cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek10) { ?>
                                                                        <td><?= $indikator_konsultan_pengawas_kontruksi10 ?>
                                                                            <textarea hidden id="indikator_pekerjaan_konsultan_pengawas_kontruksi_update10" name="indikator_pekerjaan_konsultan_pengawas_kontruksi_update[]"><?= $indikator_konsultan_pengawas_kontruksi10 ?></textarea>
                                                                        </td>
                                                                        <td>5
                                                                            <input type="hidden" id="bobot_pekerjaan_konsultan_pengawas_kontruksi_update10" name="bobot_pekerjaan_konsultan_pengawas_kontruksi_update[]" value="<?= $bobot_pekerjaan_konsultan_pengawas_kontruksi10 ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek10['penilaian_konsultan_pengawasan_kontruksi_detail'] ?>" id="penilaian_konsultan_pengawas_kontruksi_update10" name="penilaian_konsultan_pengawas_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                        </td>
                                                                        <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek10['nilai_akhir_pekerjaan_konsultan_pengawasan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek_update10" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                    <?php    } else { ?>
                                                                        <td><?= $indikator_konsultan_pengawas_kontruksi10 ?>
                                                                            <textarea hidden id="indikator_pekerjaan_konsultan_pengawas_kontruksi10" name="indikator_pekerjaan_konsultan_pengawas_kontruksi[]"><?= $indikator_konsultan_pengawas_kontruksi10 ?></textarea>
                                                                        </td>
                                                                        <td>5
                                                                            <input type="hidden" id="bobot_pekerjaan_konsultan_pengawas_kontruksi10" name="bobot_pekerjaan_konsultan_pengawas_kontruksi[]" value="<?= $bobot_pekerjaan_konsultan_pengawas_kontruksi10 ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="penilaian_konsultan_pengawas_kontruksi10" name="penilaian_konsultan_pengawas_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                        </td>
                                                                        <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek10" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                    <?php   } ?>
                                                                </tr>
                                                                <tr>
                                                                    <?php if ($cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek11) { ?>
                                                                        <td><?= $indikator_konsultan_pengawas_kontruksi11 ?>
                                                                            <textarea hidden id="indikator_pekerjaan_konsultan_pengawas_kontruksi_update11" name="indikator_pekerjaan_konsultan_pengawas_kontruksi_update[]"><?= $indikator_konsultan_pengawas_kontruksi11 ?></textarea>
                                                                        </td>
                                                                        <td>5
                                                                            <input type="hidden" id="bobot_pekerjaan_konsultan_pengawas_kontruksi_update11" name="bobot_pekerjaan_konsultan_pengawas_kontruksi_update[]" value="<?= $bobot_pekerjaan_konsultan_pengawas_kontruksi11 ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek11['penilaian_konsultan_pengawasan_kontruksi_detail'] ?>" id="penilaian_konsultan_pengawas_kontruksi_update11" name="penilaian_konsultan_pengawas_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                        </td>
                                                                        <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek11['nilai_akhir_pekerjaan_konsultan_pengawasan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek_update11" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                    <?php    } else { ?>
                                                                        <td><?= $indikator_konsultan_pengawas_kontruksi11 ?>
                                                                            <textarea hidden id="indikator_pekerjaan_konsultan_pengawas_kontruksi11" name="indikator_pekerjaan_konsultan_pengawas_kontruksi[]"><?= $indikator_konsultan_pengawas_kontruksi11 ?></textarea>
                                                                        </td>
                                                                        <td>5
                                                                            <input type="hidden" id="bobot_pekerjaan_konsultan_pengawas_kontruksi11" name="bobot_pekerjaan_konsultan_pengawas_kontruksi[]" value="<?= $bobot_pekerjaan_konsultan_pengawas_kontruksi11 ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="penilaian_konsultan_pengawas_kontruksi11" name="penilaian_konsultan_pengawas_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                        </td>
                                                                        <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek11" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                    <?php   } ?>
                                                                </tr>

                                                                <!-- Ke lima -->
                                                                <tr>

                                                                    <td rowspan="4">5</td>
                                                                    <td rowspan="4">Pendampingan Pelaksanaan Pekerjaan Konstruks (20%)
                                                                    </td>
                                                                    <?php if ($cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek12) { ?>
                                                                        <td><?= $indikator_konsultan_pengawas_kontruksi12 ?>
                                                                            <textarea hidden id="indikator_pekerjaan_konsultan_pengawas_kontruksi_update12" name="indikator_pekerjaan_konsultan_pengawas_kontruksi_update[]"><?= $indikator_konsultan_pengawas_kontruksi12 ?></textarea>
                                                                        </td>
                                                                        <td>5
                                                                            <input type="hidden" id="bobot_pekerjaan_konsultan_pengawas_kontruksi_update12" name="bobot_pekerjaan_konsultan_pengawas_kontruksi_update[]" value="<?= $bobot_pekerjaan_konsultan_pengawas_kontruksi12 ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek12['penilaian_konsultan_pengawasan_kontruksi_detail'] ?>" id="penilaian_konsultan_pengawas_kontruksi_update12" name="penilaian_konsultan_pengawas_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                        </td>
                                                                        <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek12['nilai_akhir_pekerjaan_konsultan_pengawasan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek_update12" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                    <?php    } else { ?>
                                                                        <td><?= $indikator_konsultan_pengawas_kontruksi12 ?>
                                                                            <textarea hidden id="indikator_pekerjaan_konsultan_pengawas_kontruksi12" name="indikator_pekerjaan_konsultan_pengawas_kontruksi[]"><?= $indikator_konsultan_pengawas_kontruksi12 ?></textarea>
                                                                        </td>
                                                                        <td>5
                                                                            <input type="hidden" id="bobot_pekerjaan_konsultan_pengawas_kontruksi12" name="bobot_pekerjaan_konsultan_pengawas_kontruksi[]" value="<?= $bobot_pekerjaan_konsultan_pengawas_kontruksi12 ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="penilaian_konsultan_pengawas_kontruksi12" name="penilaian_konsultan_pengawas_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                        </td>
                                                                        <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek12" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                    <?php   } ?>

                                                                </tr>
                                                                <tr>
                                                                    <?php if ($cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek13) { ?>
                                                                        <td><?= $indikator_konsultan_pengawas_kontruksi13 ?>
                                                                            <textarea hidden id="indikator_pekerjaan_konsultan_pengawas_kontruksi_update13" name="indikator_pekerjaan_konsultan_pengawas_kontruksi_update[]"><?= $indikator_konsultan_pengawas_kontruksi13 ?></textarea>
                                                                        </td>
                                                                        <td>5
                                                                            <input type="hidden" id="bobot_pekerjaan_konsultan_pengawas_kontruksi_update13" name="bobot_pekerjaan_konsultan_pengawas_kontruksi_update[]" value="<?= $bobot_pekerjaan_konsultan_pengawas_kontruksi13 ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek13['penilaian_konsultan_pengawasan_kontruksi_detail'] ?>" id="penilaian_konsultan_pengawas_kontruksi_update13" name="penilaian_konsultan_pengawas_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                        </td>
                                                                        <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek13['nilai_akhir_pekerjaan_konsultan_pengawasan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek_update13" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                    <?php    } else { ?>
                                                                        <td><?= $indikator_konsultan_pengawas_kontruksi13 ?>
                                                                            <textarea hidden id="indikator_pekerjaan_konsultan_pengawas_kontruksi13" name="indikator_pekerjaan_konsultan_pengawas_kontruksi[]"><?= $indikator_konsultan_pengawas_kontruksi13 ?></textarea>
                                                                        </td>
                                                                        <td>5
                                                                            <input type="hidden" id="bobot_pekerjaan_konsultan_pengawas_kontruksi13" name="bobot_pekerjaan_konsultan_pengawas_kontruksi[]" value="<?= $bobot_pekerjaan_konsultan_pengawas_kontruksi13 ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="penilaian_konsultan_pengawas_kontruksi13" name="penilaian_konsultan_pengawas_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                        </td>
                                                                        <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek13" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                    <?php   } ?>
                                                                </tr>
                                                                <tr>
                                                                    <?php if ($cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek14) { ?>
                                                                        <td><?= $indikator_konsultan_pengawas_kontruksi14 ?>
                                                                            <textarea hidden id="indikator_pekerjaan_konsultan_pengawas_kontruksi_update14" name="indikator_pekerjaan_konsultan_pengawas_kontruksi_update[]"><?= $indikator_konsultan_pengawas_kontruksi14 ?></textarea>
                                                                        </td>
                                                                        <td>5
                                                                            <input type="hidden" id="bobot_pekerjaan_konsultan_pengawas_kontruksi_update14" name="bobot_pekerjaan_konsultan_pengawas_kontruksi_update[]" value="<?= $bobot_pekerjaan_konsultan_pengawas_kontruksi14 ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek14['penilaian_konsultan_pengawasan_kontruksi_detail'] ?>" id="penilaian_konsultan_pengawas_kontruksi_update14" name="penilaian_konsultan_pengawas_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                        </td>
                                                                        <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek14['nilai_akhir_pekerjaan_konsultan_pengawasan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek_update14" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                    <?php    } else { ?>
                                                                        <td><?= $indikator_konsultan_pengawas_kontruksi14 ?>
                                                                            <textarea hidden id="indikator_pekerjaan_konsultan_pengawas_kontruksi14" name="indikator_pekerjaan_konsultan_pengawas_kontruksi[]"><?= $indikator_konsultan_pengawas_kontruksi14 ?></textarea>
                                                                        </td>
                                                                        <td>5
                                                                            <input type="hidden" id="bobot_pekerjaan_konsultan_pengawas_kontruksi14" name="bobot_pekerjaan_konsultan_pengawas_kontruksi[]" value="<?= $bobot_pekerjaan_konsultan_pengawas_kontruksi14 ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="penilaian_konsultan_pengawas_kontruksi14" name="penilaian_konsultan_pengawas_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                        </td>
                                                                        <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek14" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                    <?php   } ?>
                                                                </tr>

                                                                <tr>
                                                                    <?php if ($cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek15) { ?>
                                                                        <td><?= $indikator_konsultan_pengawas_kontruksi15 ?>
                                                                            <textarea hidden id="indikator_pekerjaan_konsultan_pengawas_kontruksi_update15" name="indikator_pekerjaan_konsultan_pengawas_kontruksi_update[]"><?= $indikator_konsultan_pengawas_kontruksi15 ?></textarea>
                                                                        </td>
                                                                        <td>5
                                                                            <input type="hidden" id="bobot_pekerjaan_konsultan_pengawas_kontruksi_update15" name="bobot_pekerjaan_konsultan_pengawas_kontruksi_update[]" value="<?= $bobot_pekerjaan_konsultan_pengawas_kontruksi15 ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek15['penilaian_konsultan_pengawasan_kontruksi_detail'] ?>" id="penilaian_konsultan_pengawas_kontruksi_update15" name="penilaian_konsultan_pengawas_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                        </td>
                                                                        <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek15['nilai_akhir_pekerjaan_konsultan_pengawasan_kontruksi_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek_update15" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                    <?php    } else { ?>
                                                                        <td><?= $indikator_konsultan_pengawas_kontruksi15 ?>
                                                                            <textarea hidden id="indikator_pekerjaan_konsultan_pengawas_kontruksi15" name="indikator_pekerjaan_konsultan_pengawas_kontruksi[]"><?= $indikator_konsultan_pengawas_kontruksi15 ?></textarea>
                                                                        </td>
                                                                        <td>5
                                                                            <input type="hidden" id="bobot_pekerjaan_konsultan_pengawas_kontruksi15" name="bobot_pekerjaan_konsultan_pengawas_kontruksi[]" value="<?= $bobot_pekerjaan_konsultan_pengawas_kontruksi15 ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="penilaian_konsultan_pengawas_kontruksi15" name="penilaian_konsultan_pengawas_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                        </td>
                                                                        <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi_aspek15" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                    <?php   } ?>
                                                                </tr>
                                                                <?php if ($jika_sudah_di_tambah_pekerjaan_konsultan_pengawas_kontruksi) { ?>
                                                                    <?php foreach ($jika_sudah_di_tambah_pekerjaan_konsultan_pengawas_kontruksi as $key => $value) { ?>
                                                                        <input type="hidden" name="id_penilaian_pekerjaan_konsultan_pengawasan_kontruksi_detail[]" value="<?= $value['id_penilaian_pekerjaan_konsultan_pengawasan_kontruksi_detail'] ?>">
                                                                    <?php } ?>
                                                                    <tfoot>
                                                                        <tr class="text-center">
                                                                            <td></td>
                                                                            <td><b> RATING </b></td>
                                                                            <td>
                                                                                <div id="status_pekerjaan_konsultan_pengawas_kontruksi_update">
                                                                                    <?php if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 51) { ?>
                                                                                        <label for="" class="badge badge-danger">kurang Baik</label>
                                                                                    <?php   } else if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 70) { ?>
                                                                                        <label for="" class="badge badge-warning">cukup Baik</label>
                                                                                    <?php } else if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 80) { ?>
                                                                                        <label for="" class="badge badge-warning">Baik</label>
                                                                                    <?php  } else { ?>
                                                                                        <label for="" class="badge badge-success">Sangat Baik</label>
                                                                                    <?php   } ?>

                                                                                </div>
                                                                            </td>
                                                                            <td colspan="3">
                                                                                <div id="bintang_pekerjaan_konsultan_pengawas_kontruksi_update">
                                                                                    <?php if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 51) { ?>
                                                                                        ''
                                                                                    <?php   } else if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 70) { ?>
                                                                                        <i class="fas fa fa-star text-warning"></i>
                                                                                    <?php } else if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 80) { ?>
                                                                                        <i class="fas fa fa-star text-warning"></i><i class="fas fa fa-star text-warning"></i>
                                                                                    <?php  } else { ?>
                                                                                        <i class="fas fa fa-star text-warning"></i> <i class="fas fa fa-star text-warning"></i> <i class="fas fa fa-star text-warning"></i>
                                                                                    <?php   } ?>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tfoot>
                                                                    <tfoot>
                                                                        <tr class="text-center">
                                                                            <td></td>
                                                                            <td colspan="2"><b> TOTAL NILAI AKHIR </b></td>
                                                                            <td><b>100</b></td>
                                                                            <td></td>
                                                                            <td><input type="number" style="width: 80px;" class="form-control form-control-sm" readonly value="<?= $vendor_mengikuti_paket['rating_nilai_akhir'] ?>" id="total_nilai_pekerjaan_konsultan_pengawas_kontruksi_update"></td>
                                                                        </tr>
                                                                    </tfoot>

                                                                    <br>
                                                            </table>
                                                        </form>
                                                    </div><br>
                                                    <center>
                                                        <div class="row">
                                                            <div class="col">
                                                                <a class="btn btn-grad7 text-white btn-sm btn-block" style="box-shadow: 2px 2px 8px 2px black;" href="<?= base_url('beranda/penilaian_kinerja') ?>"><i class="fas fa fa-arrow-left"></i> Kembali</a>
                                                            </div>
                                                            <div class="col">
                                                                <div> <button type="button" onclick="Reset_nilai_pekerjaan_konsultan_pengawas_kontruksi()" class="btn btn-danger text-white btn-sm btn-block">Reset Penilaian</button></div>
                                                            </div>
                                                        </div>
                                                    </center>
                                                <?php    } else { ?>
                                                    <input type="hidden" name="rating_penilaian_vendor_pekerjaan_konsultan_pengawas_kontruksi">
                                                    <input type="hidden" name="status_rating_pekerjaan_konsultan_pengawas_kontruksi">
                                                    <input type="hidden" name="status_nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi">
                                                    <tfoot>
                                                        <tr class="text-center">
                                                            <td></td>
                                                            <td><b> RATING </b></td>
                                                            <td>
                                                                <div id="status_pekerjaan_konsultan_pengawas_kontruksi">

                                                                </div>
                                                            </td>
                                                            <td colspan="3">
                                                                <div id="bintang_pekerjaan_konsultan_pengawas_kontruksi"></div>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                    <tfoot>
                                                        <tr class="text-center">
                                                            <td></td>
                                                            <td colspan="2"><b> TOTAL NILAI AKHIR </b></td>
                                                            <td><b>100</b></td>
                                                            <td></td>
                                                            <td><input type="number" style="width: 80px;" class="form-control form-control-sm" readonly id="total_nilai_pekerjaan_konsultan_pengawas_kontruksi"></td>
                                                        </tr>
                                                    </tfoot>

                                                    <br>
                                                    </table>
                                                    </form>
                                                </div><br>
                                                <center>
                                                    <div class="row">
                                                        <div class="col">
                                                            <a class="btn btn-grad7 text-white btn-sm btn-block" style="box-shadow: 2px 2px 8px 2px black;" href="<?= base_url('beranda/penilaian_kinerja') ?>"><i class="fas fa fa-arrow-left"></i> Kembali</a>
                                                        </div>
                                                        <div class="col">
                                                            <div id="save_button_konsultan_pengawas_kontruksi" style="display: none;"> <button type="button" onclick="Simpan_pekerjaan_konsultan_pengawas_kontruksi()" class="btn btn-grad8 text-white btn-sm btn-block">Simpan Penilaian</button></div>
                                                            <div id="warning_button_konsultan_pengawas_kontruksi" style="display: none;"> <button type="button" onclick="Simpan_Warning_pekerjaan_konsultan_pengawas_kontruksi_warning()" class="btn btn-grad10 text-white btn-sm btn-block">warning Penilaian</button></div>
                                                        </div>
                                                    </div>
                                                </center>
                                            <?php   } ?>
                                            </div>
                                            </div>
                                        </div>

                                        <!-- INI UNTUK JENIS JASA LAINYA -->
                                        <?php if ($data_pemenang['status_jenis_penilayan'] == 'konsultan jasa laianya kontruksi') { ?>
                                            <div class="tab-pane fade show active" id="v-pills-jasa_lainya" role="tabpanel" aria-labelledby="v-pills-jasa_lainya-tab">
                                            <?php  } else { ?>
                                                <div class="tab-pane fade" id="v-pills-jasa_lainya" role="tabpanel" aria-labelledby="v-pills-jasa_lainya-tab">
                                                <?php  } ?>
                                                <div class="card" style="box-shadow: 2px 2px 10px 2px black;">
                                                    <div class="card-header btn-grad">
                                                        <i class="fas fa-chart-line"></i> Penilaian Kinerja Jasa Lainya
                                                    </div>
                                                    <div class="card-body">
                                                        <div style="overflow-x: auto;">
                                                            <table class="table" style="font-size: 12px;">
                                                                <tr>
                                                                    <th>Kode Tender</th>
                                                                    <th>: <?= $data_pemenang['kode_tender'] ?></th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Nama Paket</th>
                                                                    <th>: <?= $data_pemenang['nama_paket'] ?></th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Divisi</th>
                                                                    <th>: <?= $data_pemenang['nama_unit_kerja'] ?></th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Nama Vendor</th>
                                                                    <th>: <?= $data_pemenang['username_vendor'] ?></th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Alamat Perusahaan</th>
                                                                    <?php if ($data_pemenang['alamat_vendor'] == null) { ?>
                                                                        <th>: <?= $data_pemenang['alamat_usaha'] ?></th>
                                                                    <?php  } else { ?>
                                                                        <th>: <?= $data_pemenang['alamat_vendor'] ?></th>
                                                                    <?php } ?>
                                                                </tr>
                                                                <?php $no = 1;
                                                                foreach ($lokasi_kerja as $key => $value) { ?>
                                                                    <tr>
                                                                        <th>Lokasi Pekerjaan <?= $no++ ?></th>
                                                                        <th>: Provinsi : <?= $value['nama_provinsi'] ?>
                                                                            <br> : Kabupaten : <?= $value['nama_kabupaten'] ?>
                                                                            <br> : Alamat : <?= $value['detail_lokasi'] ?>
                                                                        </th>
                                                                    </tr>
                                                                <?php } ?>
                                                                <tr>
                                                                    <th>Nilai Kontrak</th>
                                                                    <th>: <?= "Rp " . number_format($data_pemenang['negosiasi'], 2, ',', '.') ?></th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Nomor Kontrak</th>
                                                                    <th>&nbsp;
                                                                        <div class="row">
                                                                            <input style="width: 200px;height:30px" type="text" name="nomor_kontrak5" value="<?= $data_pemenang['nomor_kontrak'] ?>" id="nomor_kontrak5" placeholder="Nomor Kontrak..." class="form-control form-control-sm ml-2"><input style="width: 200px;height:30px" type="text" name="tanggal_nomor_kontak5" value="<?= $data_pemenang['tanggal_nomor_kontak'] ?>" id="tanggal_nomor_kontak5" placeholder="Tanggal" class="form-control form-control-sm ml-1">
                                                                        </div>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Jangka Waktu Pelaksanaan</th>
                                                                    <th>
                                                                        <div class="row">
                                                                            <input style="width: 200px;height:30px" type="text" name="jangka_mulai5" placeholder="Tanggal Mulai" value="<?= $data_pemenang['jangka_mulai'] ?>" id="jangka_mulai5" class="form-control form-control-sm ml-2 mr-1"><label for="" class="text-small mt-1">S/D</label> <input style="width: 200px;height:30px" type="text" value="<?= $data_pemenang['jangka_selesai'] ?>" name="jangka_selesai5" id="jangka_selesai5" placeholder="Tanggal Selesai" class="form-control form-control-sm ml-1">
                                                                        </div>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Metode Pemilihan</th>
                                                                    <th>: <?= $data_pemenang['nama_metode_pemilihan'] ?></th>
                                                                </tr>
                                                            </table><br>
                                                            <?php if ($data_pemenang['status_warning_vendor'] == 1) { ?>
                                                                <div class="alert alert-warning" role="alert">
                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <img src="<?= base_url('assets/img/warning.png') ?>" width="70px" alt="">
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <label for="">Vendor Telah Memiliki 1 Kali Warning Maka Jika Vendor Mendapatkan Warning ke-2 Vendor Akan Di Blacklist Otomatis Oleh Sistem Selama 2 Tahun !!!</label>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            <?php } else if ($data_pemenang['status_warning_vendor'] == 2) { ?>
                                                                <div class="alert alert-danger" role="alert">
                                                                    <img src="<?= base_url('assets/img/blacklist.png') ?>" width="70px" alt="">
                                                                    <label for="">Vendor Telah TerBlacklist Oleh Sistem Selama 2 Tahun !!!</label>
                                                                </div>
                                                            <?php   } else { ?>
                                                                <div class="alert alert-success" role="alert">
                                                                    <img src="<?= base_url('assets/img/aman2.png') ?>" width="70px" alt="">
                                                                    <label for="">Vendor Ini Aman / Tiadak Memiliki Warning !!!</label>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="card" style="box-shadow: 2px 2px 10px 2px black;">
                                                    <div class="card-header btn-grad">
                                                        <i class="fas fa-chart-line"></i> Table Penilaian Kinerja Jasa Lainya
                                                    </div>
                                                    <div class="card-body">
                                                        <div style="overflow-x: auto;">
                                                            <form action="" id="form_tambah_pekerjaan_konsultan_jasa_lainya_kontruksi">
                                                                <input type="hidden" name="id_paket" value="<?= $data_pemenang['id_paket'] ?>">
                                                                <input type="hidden" name="id_vendor" value="<?= $data_pemenang['id_mengikuti_vendor'] ?>">
                                                                <table id="nilai_tbl" class="table table-bordered">
                                                                    <tr class="btn-grad">
                                                                        <th>No</th>
                                                                        <th>Aspek Kerja</th>
                                                                        <th>Indikator</th>
                                                                        <th>Bobot(%)</th>
                                                                        <th>Penilaian</th>
                                                                        <th>Nilai Akhir</th>
                                                                    </tr>
                                                                    <tr>

                                                                        <td rowspan="3">1</td>
                                                                        <td rowspan="3">Administrasi
                                                                            (15%)</td>
                                                                        <!-- ketika update  -->
                                                                        <?php if ($cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek1) { ?>
                                                                            <td>
                                                                                <?= $indikator_konsultan_jasa_lainya_kontruksi1 ?>
                                                                                <textarea id="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi_update1" hidden name="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]"><?= $indikator_konsultan_jasa_lainya_kontruksi1 ?></textarea>
                                                                            </td>
                                                                            <td>5
                                                                                <input type="hidden" id="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi_update1" name="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_jasa_lainya_kontruksi1 ?>">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek1['penilaian_jasa_lainya_detail'] ?>" id="penilaian_konsultan_jasa_lainya_kontruksi_update1" name="penilaian_konsultan_jasa_lainya_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                            </td>
                                                                            <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek1['nilai_akhir_pekerjaan_jasa_lainya_detail'] ?>" value="<?= $cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek1['nilai_akhir_pekerjaan_jasa_lainya_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek_update1" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                            <!-- ketika tambah -->
                                                                        <?php } else { ?>
                                                                            <td>
                                                                                <?= $indikator_konsultan_jasa_lainya_kontruksi1 ?>
                                                                                <textarea id="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi1" hidden name="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi[]"><?= $indikator_konsultan_jasa_lainya_kontruksi1 ?></textarea>
                                                                            </td>
                                                                            <td>5
                                                                                <input type="hidden" id="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi1" name="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_jasa_lainya_kontruksi1 ?>">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" id="penilaian_konsultan_jasa_lainya_kontruksi1" name="penilaian_konsultan_jasa_lainya_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                            </td>
                                                                            <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek1" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                        <?php   } ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <?php if ($cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek2) { ?>
                                                                            <td>
                                                                                <?= $indikator_konsultan_jasa_lainya_kontruksi2 ?>
                                                                                <textarea id="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi_update2" name="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]" hidden><?= $indikator_konsultan_jasa_lainya_kontruksi2 ?>
                                                    </textarea>
                                                                            </td>
                                                                            <td>5
                                                                                <input type="hidden" id="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi_update2" name="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_jasa_lainya_kontruksi2 ?>">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek2['penilaian_jasa_lainya_detail'] ?>" id="penilaian_konsultan_jasa_lainya_kontruksi_update2" name="penilaian_konsultan_jasa_lainya_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                            </td>
                                                                            <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek2['nilai_akhir_pekerjaan_jasa_lainya_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek_update2" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                        <?php    } else { ?>
                                                                            <td>
                                                                                <?= $indikator_konsultan_jasa_lainya_kontruksi2 ?>
                                                                                <textarea id="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi2" name="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi[]" hidden><?= $indikator_konsultan_jasa_lainya_kontruksi2 ?>
                                                    </textarea>
                                                                            </td>
                                                                            <td>5
                                                                                <input type="hidden" id="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi2" name="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_jasa_lainya_kontruksi2 ?>">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" id="penilaian_konsultan_jasa_lainya_kontruksi2" name="penilaian_konsultan_jasa_lainya_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                            </td>
                                                                            <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek2" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                        <?php   } ?>


                                                                    </tr>
                                                                    <tr>
                                                                        <?php if ($cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek3) { ?>
                                                                            <td><?= $indikator_konsultan_jasa_lainya_kontruksi3 ?>
                                                                                <textarea hidden id="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi_update3" name="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]"><?= $indikator_konsultan_jasa_lainya_kontruksi3 ?></textarea>
                                                                            </td>
                                                                            <td>5
                                                                                <input type="hidden" id="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi_update3" name="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_jasa_lainya_kontruksi3 ?>">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek3['penilaian_jasa_lainya_detail'] ?>" id="penilaian_konsultan_jasa_lainya_kontruksi_update3" name="penilaian_konsultan_jasa_lainya_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                            </td>
                                                                            <td><input type=" text" value="<?= $cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek3['nilai_akhir_pekerjaan_jasa_lainya_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek_update3" class="form-control form-control-sm" readonly style="width: 60px;">
                                                                            </td>
                                                                        <?php    } else { ?>
                                                                            <td><?= $indikator_konsultan_jasa_lainya_kontruksi3 ?>
                                                                                <textarea hidden id="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi3" name="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi[]"><?= $indikator_konsultan_jasa_lainya_kontruksi3 ?></textarea>
                                                                            </td>
                                                                            <td>5
                                                                                <input type="hidden" id="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi3" name="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_jasa_lainya_kontruksi3 ?>">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" id="penilaian_konsultan_jasa_lainya_kontruksi3" name="penilaian_konsultan_jasa_lainya_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                            </td>
                                                                            <td><input type=" text" name="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek3" class="form-control form-control-sm" readonly style="width: 60px;">
                                                                            </td>
                                                                        <?php   } ?>
                                                                    </tr>
                                                                    <!-- Kedua -->
                                                                    <tr>

                                                                        <td rowspan="3">2</td>
                                                                        <td rowspan="3">Tenaga Ahli Dan Tenaga Teknis (30%)</td>

                                                                        <?php if ($cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek4) { ?>
                                                                            <td><?= $indikator_konsultan_jasa_lainya_kontruksi4 ?>
                                                                                <textarea hidden id="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi_update4" name="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]"><?= $indikator_konsultan_jasa_lainya_kontruksi4 ?></textarea>
                                                                            </td>
                                                                            <td>10
                                                                                <input type="hidden" id="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi_update4" name="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_jasa_lainya_kontruksi4 ?>">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek4['penilaian_jasa_lainya_detail'] ?>" id="penilaian_konsultan_jasa_lainya_kontruksi_update4" name="penilaian_konsultan_jasa_lainya_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                            </td>
                                                                            <td><input type=" text" value="<?= $cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek4['nilai_akhir_pekerjaan_jasa_lainya_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek_update4" class="form-control form-control-sm" readonly style="width: 60px;">
                                                                            </td>
                                                                        <?php    } else { ?>
                                                                            <td><?= $indikator_konsultan_jasa_lainya_kontruksi4 ?>
                                                                                <textarea hidden id="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi4" name="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi[]"><?= $indikator_konsultan_jasa_lainya_kontruksi4 ?></textarea>
                                                                            </td>
                                                                            <td>10
                                                                                <input type="hidden" id="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi4" name="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_jasa_lainya_kontruksi4 ?>">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" id="penilaian_konsultan_jasa_lainya_kontruksi4" name="penilaian_konsultan_jasa_lainya_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                            </td>
                                                                            <td><input type=" text" name="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek4" class="form-control form-control-sm" readonly style="width: 60px;">
                                                                            </td>
                                                                        <?php   } ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <?php if ($cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek5) { ?>

                                                                            <td><?= $indikator_konsultan_jasa_lainya_kontruksi5 ?>
                                                                                <textarea hidden id="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi_update5" name="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]"><?= $indikator_konsultan_jasa_lainya_kontruksi5 ?></textarea>
                                                                            </td>
                                                                            <td>10
                                                                                <input type="hidden" id="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi_update5" name="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_jasa_lainya_kontruksi5 ?>">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek5['penilaian_jasa_lainya_detail'] ?>" id="penilaian_konsultan_jasa_lainya_kontruksi_update5" name="penilaian_konsultan_jasa_lainya_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                            </td>
                                                                            <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek5['nilai_akhir_pekerjaan_jasa_lainya_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek_update5" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                        <?php    } else { ?>
                                                                            <td><?= $indikator_konsultan_jasa_lainya_kontruksi5 ?>
                                                                                <textarea hidden id="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi5" name="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi[]"><?= $indikator_konsultan_jasa_lainya_kontruksi5 ?></textarea>
                                                                            </td>
                                                                            <td>10
                                                                                <input type="hidden" id="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi5" name="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_jasa_lainya_kontruksi5 ?>">
                                                                            </td>
                                                                            <td>

                                                                                <input type="text" id="penilaian_konsultan_jasa_lainya_kontruksi5" name="penilaian_konsultan_jasa_lainya_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                            </td>
                                                                            <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek5" class="form-control form-control-sm" readonly style="width: 60px;"></td>

                                                                        <?php   } ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <?php if ($cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek6) { ?>

                                                                            <td><?= $indikator_konsultan_jasa_lainya_kontruksi6 ?>
                                                                                <textarea hidden id="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi_update6" name="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]"><?= $indikator_konsultan_jasa_lainya_kontruksi6 ?></textarea>
                                                                            </td>
                                                                            <td>10
                                                                                <input type="hidden" id="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi_update6" name="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_jasa_lainya_kontruksi6 ?>">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek6['penilaian_jasa_lainya_detail'] ?>" id="penilaian_konsultan_jasa_lainya_kontruksi_update6" name="penilaian_konsultan_jasa_lainya_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                            </td>
                                                                            <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek6['nilai_akhir_pekerjaan_jasa_lainya_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek_update6" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                        <?php    } else { ?>
                                                                            <td><?= $indikator_konsultan_jasa_lainya_kontruksi6 ?>
                                                                                <textarea hidden id="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi6" name="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi[]"><?= $indikator_konsultan_jasa_lainya_kontruksi6 ?></textarea>
                                                                            </td>
                                                                            <td>10
                                                                                <input type="hidden" id="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi6" name="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_jasa_lainya_kontruksi6 ?>">
                                                                            </td>
                                                                            <td>

                                                                                <input type="text" id="penilaian_konsultan_jasa_lainya_kontruksi6" name="penilaian_konsultan_jasa_lainya_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                            </td>
                                                                            <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek6" class="form-control form-control-sm" readonly style="width: 60px;"></td>

                                                                        <?php   } ?>
                                                                    </tr>
                                                                    <!-- Ketiga -->
                                                                    <tr>

                                                                        <td rowspan="2">3</td>
                                                                        <td rowspan="2">Bahan
                                                                            (10%)
                                                                        </td>
                                                                        <?php if ($cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek7) { ?>
                                                                            <td><?= $indikator_konsultan_jasa_lainya_kontruksi7 ?>
                                                                                <textarea hidden id="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi_update7" name="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]"><?= $indikator_konsultan_jasa_lainya_kontruksi7 ?></textarea>
                                                                            </td>
                                                                            <td>5
                                                                                <input type="hidden" id="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi_update7" name="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_jasa_lainya_kontruksi7 ?>">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek7['penilaian_jasa_lainya_detail'] ?>" id="penilaian_konsultan_jasa_lainya_kontruksi_update7" name="penilaian_konsultan_jasa_lainya_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                            </td>
                                                                            <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek7['nilai_akhir_pekerjaan_jasa_lainya_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek_update7" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                        <?php    } else { ?>
                                                                            <td><?= $indikator_konsultan_jasa_lainya_kontruksi7 ?>
                                                                                <textarea hidden id="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi7" name="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi[]"><?= $indikator_konsultan_jasa_lainya_kontruksi7 ?></textarea>
                                                                            </td>
                                                                            <td>5
                                                                                <input type="hidden" id="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi7" name="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_jasa_lainya_kontruksi7 ?>">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" id="penilaian_konsultan_jasa_lainya_kontruksi7" name="penilaian_konsultan_jasa_lainya_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                            </td>
                                                                            <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek7" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                        <?php   } ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <?php if ($cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek8) { ?>

                                                                            <td><?= $indikator_konsultan_jasa_lainya_kontruksi8 ?>
                                                                                <textarea hidden id="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi_update8" name="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]"><?= $indikator_konsultan_jasa_lainya_kontruksi8 ?></textarea>
                                                                            </td>
                                                                            <td>5
                                                                                <input type="hidden" id="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi_update8" name="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_jasa_lainya_kontruksi8 ?>">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek8['penilaian_jasa_lainya_detail'] ?>" id="penilaian_konsultan_jasa_lainya_kontruksi_update8" name="penilaian_konsultan_jasa_lainya_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                            </td>
                                                                            <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek8['nilai_akhir_pekerjaan_jasa_lainya_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek_update8" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                        <?php    } else { ?>
                                                                            <td><?= $indikator_konsultan_jasa_lainya_kontruksi8 ?>
                                                                                <textarea hidden id="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi8" name="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi[]"><?= $indikator_konsultan_jasa_lainya_kontruksi8 ?></textarea>
                                                                            </td>
                                                                            <td>5
                                                                                <input type="hidden" id="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi8" name="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_jasa_lainya_kontruksi8 ?>">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" id="penilaian_konsultan_jasa_lainya_kontruksi8" name="penilaian_konsultan_jasa_lainya_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                            </td>
                                                                            <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek8" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                        <?php   } ?>
                                                                    </tr>
                                                                    <!-- Ke empat -->
                                                                    <tr>

                                                                        <td rowspan="2">4</td>
                                                                        <td rowspan="2">Peralatan
                                                                            (10%)
                                                                        </td>
                                                                        <?php if ($cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek9) { ?>
                                                                            <td><?= $indikator_konsultan_jasa_lainya_kontruksi9 ?>
                                                                                <textarea hidden id="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi_update9" name="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]"><?= $indikator_konsultan_jasa_lainya_kontruksi9 ?></textarea>
                                                                            </td>
                                                                            <td>5
                                                                                <input type="hidden" id="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi_update9" name="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_jasa_lainya_kontruksi9 ?>">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek9['penilaian_jasa_lainya_detail'] ?>" id="penilaian_konsultan_jasa_lainya_kontruksi_update9" name="penilaian_konsultan_jasa_lainya_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                            </td>
                                                                            <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek9['nilai_akhir_pekerjaan_jasa_lainya_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek_update9" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                        <?php    } else { ?>
                                                                            <td><?= $indikator_konsultan_jasa_lainya_kontruksi9 ?>
                                                                                <textarea hidden id="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi9" name="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi[]"><?= $indikator_konsultan_jasa_lainya_kontruksi9 ?></textarea>
                                                                            </td>
                                                                            <td>5
                                                                                <input type="hidden" id="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi9" name="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_jasa_lainya_kontruksi9 ?>">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" id="penilaian_konsultan_jasa_lainya_kontruksi9" name="penilaian_konsultan_jasa_lainya_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                            </td>
                                                                            <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek9" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                        <?php   } ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <?php if ($cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek10) { ?>
                                                                            <td><?= $indikator_konsultan_jasa_lainya_kontruksi10 ?>
                                                                                <textarea hidden id="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi_update10" name="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]"><?= $indikator_konsultan_jasa_lainya_kontruksi10 ?></textarea>
                                                                            </td>
                                                                            <td>5
                                                                                <input type="hidden" id="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi_update10" name="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_jasa_lainya_kontruksi10 ?>">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek10['penilaian_jasa_lainya_detail'] ?>" id="penilaian_konsultan_jasa_lainya_kontruksi_update10" name="penilaian_konsultan_jasa_lainya_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                            </td>
                                                                            <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek10['nilai_akhir_pekerjaan_jasa_lainya_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek_update10" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                        <?php    } else { ?>
                                                                            <td><?= $indikator_konsultan_jasa_lainya_kontruksi10 ?>
                                                                                <textarea hidden id="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi10" name="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi[]"><?= $indikator_konsultan_jasa_lainya_kontruksi10 ?></textarea>
                                                                            </td>
                                                                            <td>5
                                                                                <input type="hidden" id="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi10" name="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_jasa_lainya_kontruksi10 ?>">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" id="penilaian_konsultan_jasa_lainya_kontruksi10" name="penilaian_konsultan_jasa_lainya_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                            </td>
                                                                            <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek10" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                        <?php   } ?>
                                                                    </tr>

                                                                    <!-- Ke lima -->
                                                                    <tr>
                                                                        <td rowspan="2">5</td>
                                                                        <td rowspan="2">Jadwal Dan Waktu (10%)
                                                                        </td>
                                                                        <?php if ($cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek11) { ?>
                                                                            <td><?= $indikator_konsultan_jasa_lainya_kontruksi11 ?>
                                                                                <textarea hidden id="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi_update11" name="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]"><?= $indikator_konsultan_jasa_lainya_kontruksi11 ?></textarea>
                                                                            </td>
                                                                            <td>5
                                                                                <input type="hidden" id="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi_update11" name="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_jasa_lainya_kontruksi11 ?>">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek11['penilaian_jasa_lainya_detail'] ?>" id="penilaian_konsultan_jasa_lainya_kontruksi_update11" name="penilaian_konsultan_jasa_lainya_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                            </td>
                                                                            <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek11['nilai_akhir_pekerjaan_jasa_lainya_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek_update11" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                        <?php    } else { ?>
                                                                            <td><?= $indikator_konsultan_jasa_lainya_kontruksi11 ?>
                                                                                <textarea hidden id="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi11" name="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi[]"><?= $indikator_konsultan_jasa_lainya_kontruksi11 ?></textarea>
                                                                            </td>
                                                                            <td>5
                                                                                <input type="hidden" id="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi11" name="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_jasa_lainya_kontruksi11 ?>">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" id="penilaian_konsultan_jasa_lainya_kontruksi11" name="penilaian_konsultan_jasa_lainya_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                            </td>
                                                                            <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek11" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                        <?php   } ?>

                                                                    </tr>
                                                                    <tr>
                                                                        <?php if ($cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek12) { ?>
                                                                            <td><?= $indikator_konsultan_jasa_lainya_kontruksi12 ?>
                                                                                <textarea hidden id="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi_update12" name="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]"><?= $indikator_konsultan_jasa_lainya_kontruksi12 ?></textarea>
                                                                            </td>
                                                                            <td>5
                                                                                <input type="hidden" id="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi_update12" name="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_jasa_lainya_kontruksi12 ?>">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek12['penilaian_jasa_lainya_detail'] ?>" id="penilaian_konsultan_jasa_lainya_kontruksi_update12" name="penilaian_konsultan_jasa_lainya_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                            </td>
                                                                            <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek12['nilai_akhir_pekerjaan_jasa_lainya_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek_update12" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                        <?php    } else { ?>
                                                                            <td><?= $indikator_konsultan_jasa_lainya_kontruksi12 ?>
                                                                                <textarea hidden id="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi12" name="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi[]"><?= $indikator_konsultan_jasa_lainya_kontruksi12 ?></textarea>
                                                                            </td>
                                                                            <td>5
                                                                                <input type="hidden" id="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi12" name="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_jasa_lainya_kontruksi12 ?>">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" id="penilaian_konsultan_jasa_lainya_kontruksi12" name="penilaian_konsultan_jasa_lainya_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                            </td>
                                                                            <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek12" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                        <?php   } ?>
                                                                    </tr>
                                                                    <!-- Enam -->
                                                                    <tr>
                                                                        <td rowspan="1">6</td>
                                                                        <td rowspan="1">Kualitas Hasil Pekerjaan (25%)
                                                                        </td>
                                                                        <?php if ($cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek13) { ?>
                                                                            <td><?= $indikator_konsultan_jasa_lainya_kontruksi13 ?>
                                                                                <textarea hidden id="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi_update13" name="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]"><?= $indikator_konsultan_jasa_lainya_kontruksi13 ?></textarea>
                                                                            </td>
                                                                            <td>25
                                                                                <input type="hidden" id="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi_update13" name="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_jasa_lainya_kontruksi13 ?>">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek13['penilaian_jasa_lainya_detail'] ?>" id="penilaian_konsultan_jasa_lainya_kontruksi_update13" name="penilaian_konsultan_jasa_lainya_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                            </td>
                                                                            <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek13['nilai_akhir_pekerjaan_jasa_lainya_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek_update13" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                        <?php    } else { ?>
                                                                            <td><?= $indikator_konsultan_jasa_lainya_kontruksi13 ?>
                                                                                <textarea hidden id="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi13" name="indikator_pekerjaan_konsultan_jasa_lainya_kontruksi[]"><?= $indikator_konsultan_jasa_lainya_kontruksi13 ?></textarea>
                                                                            </td>
                                                                            <td>25
                                                                                <input type="hidden" id="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi13" name="bobot_pekerjaan_konsultan_jasa_lainya_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_jasa_lainya_kontruksi13 ?>">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" id="penilaian_konsultan_jasa_lainya_kontruksi13" name="penilaian_konsultan_jasa_lainya_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                            </td>
                                                                            <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek13" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                        <?php   } ?>
                                                                    </tr>
                                                                    <?php if ($jika_sudah_di_tambah_pekerjaan_konsultan_jasa_lainya_kontruksi) { ?>
                                                                        <?php foreach ($jika_sudah_di_tambah_pekerjaan_konsultan_jasa_lainya_kontruksi as $key => $value) { ?>
                                                                            <input type="hidden" name="id_penilaian_pekerjaan_jasa_lainya_detail[]" value="<?= $value['id_penilaian_pekerjaan_jasa_lainya_detail'] ?>">
                                                                        <?php } ?>
                                                                        <tfoot>
                                                                            <tr class="text-center">
                                                                                <td></td>
                                                                                <td><b> RATING </b></td>
                                                                                <td>
                                                                                    <div id="status_pekerjaan_konsultan_jasa_lainya_kontruksi_update">
                                                                                        <?php if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 51) { ?>
                                                                                            <label for="" class="badge badge-danger">kurang Baik</label>
                                                                                        <?php   } else if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 70) { ?>
                                                                                            <label for="" class="badge badge-warning">cukup Baik</label>
                                                                                        <?php } else if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 80) { ?>
                                                                                            <label for="" class="badge badge-warning">Baik</label>
                                                                                        <?php  } else { ?>
                                                                                            <label for="" class="badge badge-success">Sangat Baik</label>
                                                                                        <?php   } ?>

                                                                                    </div>
                                                                                </td>
                                                                                <td colspan="3">
                                                                                    <div id="bintang_pekerjaan_konsultan_jasa_lainya_kontruksi_update">
                                                                                        <?php if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 51) { ?>
                                                                                            ''
                                                                                        <?php   } else if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 70) { ?>
                                                                                            <i class="fas fa fa-star text-warning"></i>
                                                                                        <?php } else if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 80) { ?>
                                                                                            <i class="fas fa fa-star text-warning"></i><i class="fas fa fa-star text-warning"></i>
                                                                                        <?php  } else { ?>
                                                                                            <i class="fas fa fa-star text-warning"></i> <i class="fas fa fa-star text-warning"></i> <i class="fas fa fa-star text-warning"></i>
                                                                                        <?php   } ?>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tfoot>
                                                                        <tfoot>
                                                                            <tr class="text-center">
                                                                                <td></td>
                                                                                <td colspan="2"><b> TOTAL NILAI AKHIR </b></td>
                                                                                <td><b>100</b></td>
                                                                                <td></td>
                                                                                <td><input type="number" style="width: 80px;" class="form-control form-control-sm" readonly value="<?= $vendor_mengikuti_paket['rating_nilai_akhir'] ?>" id="total_nilai_pekerjaan_konsultan_jasa_lainya_kontruksi_update"></td>
                                                                            </tr>
                                                                        </tfoot>

                                                                        <br>
                                                                </table>
                                                            </form>
                                                        </div><br>
                                                        <center>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <a class="btn btn-grad7 text-white btn-sm btn-block" style="box-shadow: 2px 2px 8px 2px black;" href="<?= base_url('beranda/penilaian_kinerja') ?>"><i class="fas fa fa-arrow-left"></i> Kembali</a>
                                                                </div>
                                                                <div class="col">
                                                                    <div> <button type="button" onclick="Reset_nilai_pekerjaan_konsultan_jasa_lainya_kontruksi()" class="btn btn-danger text-white btn-sm btn-block">Reset Penilaian</button></div>
                                                                </div>
                                                            </div>
                                                        </center>
                                                    <?php    } else { ?>
                                                        <input type="hidden" name="rating_penilaian_vendor_pekerjaan_konsultan_jasa_lainya_kontruksi">
                                                        <input type="hidden" name="status_rating_pekerjaan_konsultan_jasa_lainya_kontruksi">
                                                        <input type="hidden" name="status_nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi">
                                                        <tfoot>
                                                            <tr class="text-center">
                                                                <td></td>
                                                                <td><b> RATING </b></td>
                                                                <td>
                                                                    <div id="status_pekerjaan_konsultan_jasa_lainya_kontruksi">

                                                                    </div>
                                                                </td>
                                                                <td colspan="3">
                                                                    <div id="bintang_pekerjaan_konsultan_jasa_lainya_kontruksi"></div>
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                        <tfoot>
                                                            <tr class="text-center">
                                                                <td></td>
                                                                <td colspan="2"><b> TOTAL NILAI AKHIR </b></td>
                                                                <td><b>100</b></td>
                                                                <td></td>
                                                                <td><input type="number" style="width: 80px;" class="form-control form-control-sm" readonly id="total_nilai_pekerjaan_konsultan_jasa_lainya_kontruksi"></td>
                                                            </tr>
                                                        </tfoot>

                                                        <br>
                                                        </table>
                                                        </form>
                                                    </div><br>
                                                    <center>
                                                        <div class="row">
                                                            <div class="col">
                                                                <a class="btn btn-grad7 text-white btn-sm btn-block" style="box-shadow: 2px 2px 8px 2px black;" href="<?= base_url('beranda/penilaian_kinerja') ?>"><i class="fas fa fa-arrow-left"></i> Kembali</a>
                                                            </div>
                                                            <div class="col">
                                                                <div id="save_button_konsultan_jasa_lainya_kontruksi" style="display: none;"> <button type="button" onclick="Simpan_pekerjaan_konsultan_jasa_lainya_kontruksi()" class="btn btn-grad8 text-white btn-sm btn-block">Simpan Penilaian</button></div>
                                                                <div id="warning_button_konsultan_jasa_lainya_kontruksi" style="display: none;"> <button type="button" onclick="Simpan_Warning_pekerjaan_konsultan_jasa_lainya_kontruksi_warning()" class="btn btn-grad10 text-white btn-sm btn-block">warning Penilaian</button></div>
                                                            </div>
                                                        </div>
                                                    </center>
                                                <?php   } ?>
                                                </div>
                                                </div>
                                            </div>


                                            <!-- INI UNTUK BAGIAN PENYEDIA BARANG DAN JASA -->
                                            <?php if ($data_pemenang['status_jenis_penilayan'] == 'konsultan penyedia barang kontruksi') { ?>
                                                <div class="tab-pane fade show active" id="v-pills-penyedia_barang" role="tabpanel" aria-labelledby="v-pills-penyedia_barang-tab">
                                                <?php  } else { ?>
                                                    <div class="tab-pane fade" id="v-pills-penyedia_barang" role="tabpanel" aria-labelledby="v-pills-penyedia_barang-tab">
                                                    <?php  } ?>
                                                    <div class="card" style="box-shadow: 2px 2px 10px 2px black;">
                                                        <div class="card-header btn-grad">
                                                            <i class="fas fa-chart-line"></i> Penilaian Penyedia Barang
                                                        </div>
                                                        <div class="card-body">
                                                            <div style="overflow-x: auto;">
                                                                <table class="table" style="font-size: 12px;">
                                                                    <tr>
                                                                        <th>Kode Tender</th>
                                                                        <th>: <?= $data_pemenang['kode_tender'] ?></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Nama Paket</th>
                                                                        <th>: <?= $data_pemenang['nama_paket'] ?></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Divisi</th>
                                                                        <th>: <?= $data_pemenang['nama_unit_kerja'] ?></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Nama Vendor</th>
                                                                        <th>: <?= $data_pemenang['username_vendor'] ?></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Alamat Perusahaan</th>
                                                                        <?php if ($data_pemenang['alamat_vendor'] == null) { ?>
                                                                            <th>: <?= $data_pemenang['alamat_usaha'] ?></th>
                                                                        <?php  } else { ?>
                                                                            <th>: <?= $data_pemenang['alamat_vendor'] ?></th>
                                                                        <?php } ?>
                                                                    </tr>
                                                                    <?php $no = 1;
                                                                    foreach ($lokasi_kerja as $key => $value) { ?>
                                                                        <tr>
                                                                            <th>Lokasi Pekerjaan <?= $no++ ?></th>
                                                                            <th>: Provinsi : <?= $value['nama_provinsi'] ?>
                                                                                <br> : Kabupaten : <?= $value['nama_kabupaten'] ?>
                                                                                <br> : Alamat : <?= $value['detail_lokasi'] ?>
                                                                            </th>
                                                                        </tr>
                                                                    <?php } ?>
                                                                    <tr>
                                                                        <th>Nilai Kontrak</th>
                                                                        <th>: <?= "Rp " . number_format($data_pemenang['negosiasi'], 2, ',', '.') ?></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Nomor Kontrak</th>
                                                                        <th>&nbsp;
                                                                            <div class="row">
                                                                                <input style="width: 200px;height:30px" type="text" name="nomor_kontrak6" value="<?= $data_pemenang['nomor_kontrak'] ?>" id="nomor_kontrak6" placeholder="Nomor Kontrak..." class="form-control form-control-sm ml-2"><input style="width: 200px;height:30px" type="text" name="tanggal_nomor_kontak6" value="<?= $data_pemenang['tanggal_nomor_kontak'] ?>" id="tanggal_nomor_kontak6" placeholder="Tanggal" class="form-control form-control-sm ml-1">
                                                                            </div>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Jangka Waktu Pelaksanaan</th>
                                                                        <th>
                                                                            <div class="row">
                                                                                <input style="width: 200px;height:30px" type="text" name="jangka_mulai6" placeholder="Tanggal Mulai" value="<?= $data_pemenang['jangka_mulai'] ?>" id="jangka_mulai6" class="form-control form-control-sm ml-2 mr-1"><label for="" class="text-small mt-1">S/D</label> <input style="width: 200px;height:30px" type="text" value="<?= $data_pemenang['jangka_selesai'] ?>" name="jangka_selesai6" id="jangka_selesai6" placeholder="Tanggal Selesai" class="form-control form-control-sm ml-1">
                                                                            </div>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Metode Pemilihan</th>
                                                                        <th>: <?= $data_pemenang['nama_metode_pemilihan'] ?></th>
                                                                    </tr>
                                                                </table><br>
                                                                <?php if ($data_pemenang['status_warning_vendor'] == 1) { ?>
                                                                    <div class="alert alert-warning" role="alert">
                                                                        <div class="row">
                                                                            <div class="col-md-2">
                                                                                <img src="<?= base_url('assets/img/warning.png') ?>" width="70px" alt="">
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <label for="">Vendor Telah Memiliki 1 Kali Warning Maka Jika Vendor Mendapatkan Warning ke-2 Vendor Akan Di Blacklist Otomatis Oleh Sistem Selama 2 Tahun !!!</label>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                <?php } else if ($data_pemenang['status_warning_vendor'] == 2) { ?>
                                                                    <div class="alert alert-danger" role="alert">
                                                                        <img src="<?= base_url('assets/img/blacklist.png') ?>" width="70px" alt="">
                                                                        <label for="">Vendor Telah TerBlacklist Oleh Sistem Selama 2 Tahun !!!</label>
                                                                    </div>
                                                                <?php   } else { ?>
                                                                    <div class="alert alert-success" role="alert">
                                                                        <img src="<?= base_url('assets/img/aman2.png') ?>" width="70px" alt="">
                                                                        <label for="">Vendor Ini Aman / Tiadak Memiliki Warning !!!</label>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="card" style="box-shadow: 2px 2px 10px 2px black;">
                                                        <div class="card-header btn-grad">
                                                            <i class="fas fa-chart-line"></i> Table Penilaian Penyedia Barang
                                                        </div>
                                                        <div class="card-body">
                                                            <div style="overflow-x: auto;">
                                                                <form action="" id="form_tambah_pekerjaan_konsultan_penyedia_barang_kontruksi">
                                                                    <input type="hidden" name="id_paket" value="<?= $data_pemenang['id_paket'] ?>">
                                                                    <input type="hidden" name="id_vendor" value="<?= $data_pemenang['id_mengikuti_vendor'] ?>">
                                                                    <table id="nilai_tbl" class="table table-bordered">
                                                                        <tr class="btn-grad">
                                                                            <th>No</th>
                                                                            <th>Aspek Kerja</th>
                                                                            <th>Indikator</th>
                                                                            <th>Bobot(%)</th>
                                                                            <th>Penilaian</th>
                                                                            <th>Nilai Akhir</th>
                                                                        </tr>
                                                                        <tr>

                                                                            <td rowspan="3">1</td>
                                                                            <td rowspan="3">Administrasi
                                                                                (15%)</td>
                                                                            <!-- ketika update  -->
                                                                            <?php if ($cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek1) { ?>
                                                                                <td>
                                                                                    <?= $indikator_konsultan_penyedia_barang_kontruksi1 ?>
                                                                                    <textarea id="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi_update1" hidden name="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi_update[]"><?= $indikator_konsultan_penyedia_barang_kontruksi1 ?></textarea>
                                                                                </td>
                                                                                <td>5
                                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi_update1" name="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_penyedia_barang_kontruksi1 ?>">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek1['penilaian_penyedia_barang_detail'] ?>" id="penilaian_konsultan_penyedia_barang_kontruksi_update1" name="penilaian_konsultan_penyedia_barang_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                                </td>
                                                                                <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek1['nilai_akhir_pekerjaan_penyedia_barang_detail'] ?>" value="<?= $cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek1['nilai_akhir_pekerjaan_penyedia_barang_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek_update1" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                                <!-- ketika tambah -->
                                                                            <?php } else { ?>
                                                                                <td>
                                                                                    <?= $indikator_konsultan_penyedia_barang_kontruksi1 ?>
                                                                                    <textarea id="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi1" hidden name="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi[]"><?= $indikator_konsultan_penyedia_barang_kontruksi1 ?></textarea>
                                                                                </td>
                                                                                <td>5
                                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi1" name="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_penyedia_barang_kontruksi1 ?>">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" id="penilaian_konsultan_penyedia_barang_kontruksi1" name="penilaian_konsultan_penyedia_barang_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                                </td>
                                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek1" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                            <?php   } ?>
                                                                        </tr>
                                                                        <tr>
                                                                            <?php if ($cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek2) { ?>
                                                                                <td>
                                                                                    <?= $indikator_konsultan_penyedia_barang_kontruksi2 ?>
                                                                                    <textarea id="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi_update2" name="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi_update[]" hidden><?= $indikator_konsultan_penyedia_barang_kontruksi2 ?>
                                                    </textarea>
                                                                                </td>
                                                                                <td>5
                                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi_update2" name="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_penyedia_barang_kontruksi2 ?>">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek2['penilaian_penyedia_barang_detail'] ?>" id="penilaian_konsultan_penyedia_barang_kontruksi_update2" name="penilaian_konsultan_penyedia_barang_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                                </td>
                                                                                <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek2['nilai_akhir_pekerjaan_penyedia_barang_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek_update2" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                            <?php    } else { ?>
                                                                                <td>
                                                                                    <?= $indikator_konsultan_penyedia_barang_kontruksi2 ?>
                                                                                    <textarea id="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi2" name="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi[]" hidden><?= $indikator_konsultan_penyedia_barang_kontruksi2 ?>
                                                    </textarea>
                                                                                </td>
                                                                                <td>5
                                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi2" name="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_penyedia_barang_kontruksi2 ?>">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" id="penilaian_konsultan_penyedia_barang_kontruksi2" name="penilaian_konsultan_penyedia_barang_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                                </td>
                                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek2" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                            <?php   } ?>


                                                                        </tr>
                                                                        <tr>
                                                                            <?php if ($cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek3) { ?>
                                                                                <td><?= $indikator_konsultan_penyedia_barang_kontruksi3 ?>
                                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi_update3" name="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi_update[]"><?= $indikator_konsultan_penyedia_barang_kontruksi3 ?></textarea>
                                                                                </td>
                                                                                <td>5
                                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi_update3" name="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_penyedia_barang_kontruksi3 ?>">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek3['penilaian_penyedia_barang_detail'] ?>" id="penilaian_konsultan_penyedia_barang_kontruksi_update3" name="penilaian_konsultan_penyedia_barang_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                                </td>
                                                                                <td><input type=" text" value="<?= $cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek3['nilai_akhir_pekerjaan_penyedia_barang_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek_update3" class="form-control form-control-sm" readonly style="width: 60px;">
                                                                                </td>
                                                                            <?php    } else { ?>
                                                                                <td><?= $indikator_konsultan_penyedia_barang_kontruksi3 ?>
                                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi3" name="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi[]"><?= $indikator_konsultan_penyedia_barang_kontruksi3 ?></textarea>
                                                                                </td>
                                                                                <td>5
                                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi3" name="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_penyedia_barang_kontruksi3 ?>">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" id="penilaian_konsultan_penyedia_barang_kontruksi3" name="penilaian_konsultan_penyedia_barang_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                                </td>
                                                                                <td><input type=" text" name="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek3" class="form-control form-control-sm" readonly style="width: 60px;">
                                                                                </td>
                                                                            <?php   } ?>
                                                                        </tr>
                                                                        <!-- Kedua -->
                                                                        <tr>

                                                                            <td rowspan="2">2</td>
                                                                            <td rowspan="2">Tenaga Ahli Dan Tenaga Teknis (10%)</td>
                                                                            <?php if ($cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek4) { ?>
                                                                                <td><?= $indikator_konsultan_penyedia_barang_kontruksi4 ?>
                                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi_update4" name="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi_update[]"><?= $indikator_konsultan_penyedia_barang_kontruksi4 ?></textarea>
                                                                                </td>
                                                                                <td>5
                                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi_update4" name="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_penyedia_barang_kontruksi4 ?>">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek4['penilaian_penyedia_barang_detail'] ?>" id="penilaian_konsultan_penyedia_barang_kontruksi_update4" name="penilaian_konsultan_penyedia_barang_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                                </td>
                                                                                <td><input type=" text" value="<?= $cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek4['nilai_akhir_pekerjaan_penyedia_barang_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek_update4" class="form-control form-control-sm" readonly style="width: 60px;">
                                                                                </td>
                                                                            <?php    } else { ?>
                                                                                <td><?= $indikator_konsultan_penyedia_barang_kontruksi4 ?>
                                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi4" name="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi[]"><?= $indikator_konsultan_penyedia_barang_kontruksi4 ?></textarea>
                                                                                </td>
                                                                                <td>5
                                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi4" name="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_penyedia_barang_kontruksi4 ?>">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" id="penilaian_konsultan_penyedia_barang_kontruksi4" name="penilaian_konsultan_penyedia_barang_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                                </td>
                                                                                <td><input type=" text" name="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek4" class="form-control form-control-sm" readonly style="width: 60px;">
                                                                                </td>
                                                                            <?php   } ?>
                                                                        </tr>
                                                                        <tr>
                                                                            <?php if ($cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek5) { ?>

                                                                                <td><?= $indikator_konsultan_penyedia_barang_kontruksi5 ?>
                                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi_update5" name="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi_update[]"><?= $indikator_konsultan_penyedia_barang_kontruksi5 ?></textarea>
                                                                                </td>
                                                                                <td>5
                                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi_update5" name="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_penyedia_barang_kontruksi5 ?>">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek5['penilaian_penyedia_barang_detail'] ?>" id="penilaian_konsultan_penyedia_barang_kontruksi_update5" name="penilaian_konsultan_penyedia_barang_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                                </td>
                                                                                <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek5['nilai_akhir_pekerjaan_penyedia_barang_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek_update5" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                            <?php    } else { ?>
                                                                                <td><?= $indikator_konsultan_penyedia_barang_kontruksi5 ?>
                                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi5" name="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi[]"><?= $indikator_konsultan_penyedia_barang_kontruksi5 ?></textarea>
                                                                                </td>
                                                                                <td>5
                                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi5" name="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_penyedia_barang_kontruksi5 ?>">
                                                                                </td>
                                                                                <td>

                                                                                    <input type="text" id="penilaian_konsultan_penyedia_barang_kontruksi5" name="penilaian_konsultan_penyedia_barang_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                                </td>
                                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek5" class="form-control form-control-sm" readonly style="width: 60px;"></td>

                                                                            <?php   } ?>
                                                                        </tr>
                                                                        <!-- Ketiga -->
                                                                        <tr>

                                                                            <td rowspan="3">3</td>
                                                                            <td rowspan="3">BaKualitas Dan Kuantitas Produk
                                                                                (60%)
                                                                            </td>
                                                                            <?php if ($cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek6) { ?>
                                                                                <td><?= $indikator_konsultan_penyedia_barang_kontruksi6 ?>
                                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi_update6" name="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi_update[]"><?= $indikator_konsultan_penyedia_barang_kontruksi6 ?></textarea>
                                                                                </td>
                                                                                <td>25
                                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi_update6" name="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_penyedia_barang_kontruksi6 ?>">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek6['penilaian_penyedia_barang_detail'] ?>" id="penilaian_konsultan_penyedia_barang_kontruksi_update6" name="penilaian_konsultan_penyedia_barang_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                                </td>
                                                                                <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek6['nilai_akhir_pekerjaan_penyedia_barang_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek_update6" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                            <?php    } else { ?>
                                                                                <td><?= $indikator_konsultan_penyedia_barang_kontruksi6 ?>
                                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi6" name="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi[]"><?= $indikator_konsultan_penyedia_barang_kontruksi6 ?></textarea>
                                                                                </td>
                                                                                <td>25
                                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi6" name="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_penyedia_barang_kontruksi6 ?>">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" id="penilaian_konsultan_penyedia_barang_kontruksi6" name="penilaian_konsultan_penyedia_barang_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                                </td>
                                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek6" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                            <?php   } ?>
                                                                        </tr>
                                                                        <tr>
                                                                            <?php if ($cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek7) { ?>

                                                                                <td><?= $indikator_konsultan_penyedia_barang_kontruksi7 ?>
                                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi_update7" name="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi_update[]"><?= $indikator_konsultan_penyedia_barang_kontruksi7 ?></textarea>
                                                                                </td>
                                                                                <td>25
                                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi_update7" name="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_penyedia_barang_kontruksi7 ?>">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek7['penilaian_penyedia_barang_detail'] ?>" id="penilaian_konsultan_penyedia_barang_kontruksi_update7" name="penilaian_konsultan_penyedia_barang_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                                </td>
                                                                                <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek7['nilai_akhir_pekerjaan_penyedia_barang_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek_update7" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                            <?php    } else { ?>
                                                                                <td><?= $indikator_konsultan_penyedia_barang_kontruksi7 ?>
                                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi7" name="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi[]"><?= $indikator_konsultan_penyedia_barang_kontruksi7 ?></textarea>
                                                                                </td>
                                                                                <td>25
                                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi7" name="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_penyedia_barang_kontruksi7 ?>">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" id="penilaian_konsultan_penyedia_barang_kontruksi7" name="penilaian_konsultan_penyedia_barang_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                                </td>
                                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek7" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                            <?php   } ?>
                                                                        </tr>
                                                                        <tr>
                                                                            <?php if ($cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek8) { ?>

                                                                                <td><?= $indikator_konsultan_penyedia_barang_kontruksi8 ?>
                                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi_update8" name="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi_update[]"><?= $indikator_konsultan_penyedia_barang_kontruksi8 ?></textarea>
                                                                                </td>
                                                                                <td>10
                                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi_update8" name="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_penyedia_barang_kontruksi8 ?>">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek8['penilaian_penyedia_barang_detail'] ?>" id="penilaian_konsultan_penyedia_barang_kontruksi_update8" name="penilaian_konsultan_penyedia_barang_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                                </td>
                                                                                <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek8['nilai_akhir_pekerjaan_penyedia_barang_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek_update8" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                            <?php    } else { ?>
                                                                                <td><?= $indikator_konsultan_penyedia_barang_kontruksi8 ?>
                                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi8" name="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi[]"><?= $indikator_konsultan_penyedia_barang_kontruksi8 ?></textarea>
                                                                                </td>
                                                                                <td>10
                                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi8" name="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_penyedia_barang_kontruksi8 ?>">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" id="penilaian_konsultan_penyedia_barang_kontruksi8" name="penilaian_konsultan_penyedia_barang_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                                </td>
                                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek8" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                            <?php   } ?>
                                                                        </tr>
                                                                        <!-- Ke empat -->
                                                                        <tr>

                                                                            <td rowspan="2">4</td>
                                                                            <td rowspan="2">Jadwal Dan Waktu
                                                                                (10%)
                                                                            </td>
                                                                            <?php if ($cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek9) { ?>
                                                                                <td><?= $indikator_konsultan_penyedia_barang_kontruksi9 ?>
                                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi_update9" name="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi_update[]"><?= $indikator_konsultan_penyedia_barang_kontruksi9 ?></textarea>
                                                                                </td>
                                                                                <td>5
                                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi_update9" name="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_penyedia_barang_kontruksi9 ?>">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek9['penilaian_penyedia_barang_detail'] ?>" id="penilaian_konsultan_penyedia_barang_kontruksi_update9" name="penilaian_konsultan_penyedia_barang_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                                </td>
                                                                                <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek9['nilai_akhir_pekerjaan_penyedia_barang_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek_update9" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                            <?php    } else { ?>
                                                                                <td><?= $indikator_konsultan_penyedia_barang_kontruksi9 ?>
                                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi9" name="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi[]"><?= $indikator_konsultan_penyedia_barang_kontruksi9 ?></textarea>
                                                                                </td>
                                                                                <td>5
                                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi9" name="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_penyedia_barang_kontruksi9 ?>">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" id="penilaian_konsultan_penyedia_barang_kontruksi9" name="penilaian_konsultan_penyedia_barang_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                                </td>
                                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek9" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                            <?php   } ?>
                                                                        </tr>
                                                                        <tr>
                                                                            <?php if ($cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek10) { ?>
                                                                                <td><?= $indikator_konsultan_penyedia_barang_kontruksi10 ?>
                                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi_update10" name="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi_update[]"><?= $indikator_konsultan_penyedia_barang_kontruksi10 ?></textarea>
                                                                                </td>
                                                                                <td>5
                                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi_update10" name="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi_update[]" value="<?= $boobot_pekerjaan_konsultan_penyedia_barang_kontruksi10 ?>">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek10['penilaian_penyedia_barang_detail'] ?>" id="penilaian_konsultan_penyedia_barang_kontruksi_update10" name="penilaian_konsultan_penyedia_barang_kontruksi_update[]" class="form-control form-control-sm" style="width: 60px;">
                                                                                </td>
                                                                                <td><input type="text" value="<?= $cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek10['nilai_akhir_pekerjaan_penyedia_barang_detail'] ?>" name="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_update[]" id="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek_update10" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                            <?php    } else { ?>
                                                                                <td><?= $indikator_konsultan_penyedia_barang_kontruksi10 ?>
                                                                                    <textarea hidden id="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi10" name="indikator_pekerjaan_konsultan_penyedia_barang_kontruksi[]"><?= $indikator_konsultan_penyedia_barang_kontruksi10 ?></textarea>
                                                                                </td>
                                                                                <td>5
                                                                                    <input type="hidden" id="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi10" name="bobot_pekerjaan_konsultan_penyedia_barang_kontruksi[]" value="<?= $boobot_pekerjaan_konsultan_penyedia_barang_kontruksi10 ?>">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" id="penilaian_konsultan_penyedia_barang_kontruksi10" name="penilaian_konsultan_penyedia_barang_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                                                </td>
                                                                                <td><input type="text" name="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi[]" id="nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek10" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                                            <?php   } ?>
                                                                        </tr>
                                                                        <?php if ($jika_sudah_di_tambah_pekerjaan_konsultan_penyedia_barang_kontruksi) { ?>
                                                                            <?php foreach ($jika_sudah_di_tambah_pekerjaan_konsultan_penyedia_barang_kontruksi as $key => $value) { ?>
                                                                                <input type="hidden" name="id_penilaian_pekerjaan_penyedia_barang_detail[]" value="<?= $value['id_penilaian_pekerjaan_penyedia_barang_detail'] ?>">
                                                                            <?php } ?>
                                                                            <tfoot>
                                                                                <tr class="text-center">
                                                                                    <td></td>
                                                                                    <td><b> RATING </b></td>
                                                                                    <td>
                                                                                        <div id="status_pekerjaan_konsultan_penyedia_barang_kontruksi_update">
                                                                                            <?php if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 51) { ?>
                                                                                                <label for="" class="badge badge-danger">kurang Baik</label>
                                                                                            <?php   } else if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 70) { ?>
                                                                                                <label for="" class="badge badge-warning">cukup Baik</label>
                                                                                            <?php } else if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 80) { ?>
                                                                                                <label for="" class="badge badge-warning">Baik</label>
                                                                                            <?php  } else { ?>
                                                                                                <label for="" class="badge badge-success">Sangat Baik</label>
                                                                                            <?php   } ?>

                                                                                        </div>
                                                                                    </td>
                                                                                    <td colspan="3">
                                                                                        <div id="bintang_pekerjaan_konsultan_penyedia_barang_kontruksi_update">
                                                                                            <?php if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 51) { ?>
                                                                                                ''
                                                                                            <?php   } else if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 70) { ?>
                                                                                                <i class="fas fa fa-star text-warning"></i>
                                                                                            <?php } else if ($vendor_mengikuti_paket['rating_nilai_akhir'] <= 80) { ?>
                                                                                                <i class="fas fa fa-star text-warning"></i><i class="fas fa fa-star text-warning"></i>
                                                                                            <?php  } else { ?>
                                                                                                <i class="fas fa fa-star text-warning"></i> <i class="fas fa fa-star text-warning"></i> <i class="fas fa fa-star text-warning"></i>
                                                                                            <?php   } ?>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tfoot>
                                                                            <tfoot>
                                                                                <tr class="text-center">
                                                                                    <td></td>
                                                                                    <td colspan="2"><b> TOTAL NILAI AKHIR </b></td>
                                                                                    <td><b>100</b></td>
                                                                                    <td></td>
                                                                                    <td><input type="number" style="width: 80px;" class="form-control form-control-sm" readonly value="<?= $vendor_mengikuti_paket['rating_nilai_akhir'] ?>" id="total_nilai_pekerjaan_konsultan_penyedia_barang_kontruksi_update"></td>
                                                                                </tr>
                                                                            </tfoot>

                                                                            <br>
                                                                    </table>
                                                                </form>
                                                            </div><br>
                                                            <center>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <a class="btn btn-grad7 text-white btn-sm btn-block" style="box-shadow: 2px 2px 8px 2px black;" href="<?= base_url('beranda/penilaian_kinerja') ?>"><i class="fas fa fa-arrow-left"></i> Kembali</a>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div> <button type="button" onclick="Reset_nilai_pekerjaan_konsultan_penyedia_barang_kontruksi()" class="btn btn-danger text-white btn-sm btn-block">Reset Penilaian</button></div>
                                                                    </div>
                                                                </div>
                                                            </center>
                                                        <?php    } else { ?>
                                                            <input type="hidden" name="rating_penilaian_vendor_pekerjaan_konsultan_penyedia_barang_kontruksi">
                                                            <input type="hidden" name="status_rating_pekerjaan_konsultan_penyedia_barang_kontruksi">
                                                            <input type="hidden" name="status_nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi">
                                                            <tfoot>
                                                                <tr class="text-center">
                                                                    <td></td>
                                                                    <td><b> RATING </b></td>
                                                                    <td>
                                                                        <div id="status_pekerjaan_konsultan_penyedia_barang_kontruksi">

                                                                        </div>
                                                                    </td>
                                                                    <td colspan="3">
                                                                        <div id="bintang_pekerjaan_konsultan_penyedia_barang_kontruksi"></div>
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                            <tfoot>
                                                                <tr class="text-center">
                                                                    <td></td>
                                                                    <td colspan="2"><b> TOTAL NILAI AKHIR </b></td>
                                                                    <td><b>100</b></td>
                                                                    <td></td>
                                                                    <td><input type="number" style="width: 80px;" class="form-control form-control-sm" readonly id="total_nilai_pekerjaan_konsultan_penyedia_barang_kontruksi"></td>
                                                                </tr>
                                                            </tfoot>

                                                            <br>
                                                            </table>
                                                            </form>
                                                        </div><br>
                                                        <center>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <a class="btn btn-grad7 text-white btn-sm btn-block" style="box-shadow: 2px 2px 8px 2px black;" href="<?= base_url('beranda/penilaian_kinerja') ?>"><i class="fas fa fa-arrow-left"></i> Kembali</a>
                                                                </div>
                                                                <div class="col">
                                                                    <div id="save_button_konsultan_penyedia_barang_kontruksi" style="display: none;"> <button type="button" onclick="Simpan_pekerjaan_konsultan_penyedia_barang_kontruksi()" class="btn btn-grad8 text-white btn-sm btn-block">Simpan Penilaian</button></div>
                                                                    <div id="warning_button_konsultan_penyedia_barang_kontruksi" style="display: none;"> <button type="button" onclick="Simpan_Warning_pekerjaan_konsultan_penyedia_barang_kontruksi_warning()" class="btn btn-grad10 text-white btn-sm btn-block">warning Penilaian</button></div>
                                                                </div>
                                                            </div>
                                                        </center>
                                                    <?php   } ?>
                                                    </div>
                                                    </div>
                                                </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>