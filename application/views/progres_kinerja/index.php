<?php
$this->role_login->cek_login();
?>
<div class="preloader">
    <div class="loading">
        <img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
    </div>
</div>
<div class="container">
    <br>
    <div class="content">
        <div class="card" style="box-shadow: 2px 2px 10px 2px black;">
            <div class="card-header btn-grad">
                <i class="far fa-chart-bar"></i> Progres Kinerja Vendor
            </div>
            <div class="card-body">
                <div style="display: none;" class="alert alert-danger" id="laler" role="alert">
                    Pilih Kedua Field Yang Benar !!
                </div>
                <div class="bs-callout btn-grad5" style="box-shadow: 2px 2px 10px 2px black;">
                    <div class="row mb-2 g-3 align-items-center">
                        <div class="col-md-2">
                            <label for="Divisi" style="font-weight: bold;" class="col-form-label">Metode Pemilihan</label>
                        </div>
                        <div class="col-md-4">
                            <select style="font-size: 10px;" name="id_metode_pemilihan" id="id_metode_pemilihan" class="form-control select2">
                                <option value=""></option>
                                <option value=""></option>
                                <?php foreach ($metode_pemilihan as $key => $value) { ?>
                                    <option value="<?= $value['id_metode_pemilihan'] ?>"><?= $value['nama_metode_pemilihan'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="mt-3 mb-2"></div>
                    <div class="row mb-5 g-3 align-items-center">
                        <div class="col-md-2">
                            <label for="Divisi" style="font-weight: bold;" class="col-form-label">Jenis Pengadaan</label>
                        </div>
                        <div class="col-md-4">
                            <select name="id_jenis_pengadaan" id="id_jenis_pengadaan" class="form-control select2">
                                <option value=""></option>
                                <option value=""></option>
                                <?php foreach ($get_jenis_pengadaan as $key => $value) { ?>
                                    <option value="<?= $value['id_jenis_pengadaan'] ?>"><?= $value['nama_jenis_pengadaan'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <center>
                        <div class="col-auto">
                            <button class="btn btn-sm btn-grad9 text-white" style="width: 150px;" name="cari_paket" id="cari_paket" type="button"> Fillter</button>
                        </div>
                    </center>

                </div>
                <br>
                <div class="card" style="box-shadow: 2px 2px 10px 2px black;">
                    <div class="card-header btn-grad">
                        <i class="fas fa-chalkboard-teacher"></i> Data Vendor Dalam Tahap Pengerjaan
                    </div>
                    <div class="card-body">
                        <div style="overflow-x: auto;">
                            <table id="tbl_vendor_pemenang" class="table table-hover table-bordered">
                                <thead class="btn-grad">
                                    <tr style="font-size: 11px;">
                                        <th>No</th>
                                        <th>Nama Vendor</th>
                                        <th>Harga Negosiasi</th>
                                        <th>Jenis Pengadaan</th>
                                        <th>Metode Pemilihan</th>
                                        <th>Tahap</th>
                                        <th>Report</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;" class="text-center">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>